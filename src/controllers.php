<?php

require_once "buisness.php";
require_once "utils.php";

function showGallery(&$model) {
	$images = getAllImages();
	$return = [];
	if (isset($_SESSION["userID"])) {
		$UID = $_SESSION["userID"];
	} else {
		$UID = null;
	}
	foreach ($images as $image) {
		if ($image["publicity"] === "public" || ($image["publicity"] == $UID)) {
			$id = (string)$image["_id"];
			if (isset($_SESSION["selectedImages"][(string)$id])) {
				$image["selected"] = "selected";
			}
			$return[] = $image;
		}
	}
	$model["images"] = $return;
	if (isset($_SESSION["logged"])) {
		$model["logged"] = "logged";
		$model["loggedUser"] = $_SESSION["loggedUser"];
	}

	return "galleryView";
}

function selectedImages(&$model) {
	if (isset($_SESSION["logged"])) {
		$model["logged"] = "logged";
	}
	if (isset($_SESSION["logged"]) && count($_SESSION["selectedImages"]) > 0) {
		$test = getAllImages();
		foreach ($_SESSION["selectedImages"] as $selected) {
			$images[] = getImage($selected);
		}
		$model["images"] = $images;
		return "onlySelectedView";
	} else {
		return "redirect:/gallery";
	}
}

function index(&$model) {
	return "indexView";
}

function clearDB() {
	foreach (glob("images/*") as $dirName) {
		foreach (glob($dirName."/*") as $file) {
			unlink($file);
		}
		rmdir("{$dirName}");
	}
	removeAll();
	return logout();
}

function register() {
	if (isset($_SESSION["logged"])) {
		return "redirect:/";
	} else {
		return "registerView";
	}
}

function showLogin() {
	if (isset($_SESSION["logged"])) {
		return "redirect:/";
	} else {
		return "loginView";
	}
}

function search() {
	return "searchView";
}

function uploadImage(&$model) {
	$model["typeError"] = null;
	$model["sizeError"] = null;


	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mimeType = finfo_file($finfo, $_FILES["image"]["tmp_name"]);
	if (($mimeType == "image/jpeg" || $mimeType == "image/png") && $_FILES["image"]["size"] <= 1024*1024) {
		$uploadDir = "images/";
		$file = $_FILES["image"];

		$fileName = basename($file["name"]);
		$tmpPath = $file["tmp_name"];

		if ($mimeType == "image/jpeg") {
			$type = ".jpg";
		} else {
			$type = ".png";
		}

		if (isset($_POST["publicitySetting"])) {
			if ($_POST["publicitySetting"] === "private") {
				$publicity = (string)$_SESSION["userID"];
			} else {
				$publicity = "public";
			}
		} else {
			$publicity = "public";
		}

		$info = [
			"author" => $_POST["author"],
			"title" => $_POST["title"],
			"type" => $type,
			"publicity" => $publicity
		];

		if ($id = saveImageInfo($info)) {
			$target = "{$uploadDir}./{$id}/original{$type}";
			mkdir("images/{$id}");
			move_uploaded_file($tmpPath, $target);
			imageMagic($id, $type);
			return "uploadSuccesView";
		}
	} else {
		if (!$mimeType) {
			$model["sizeError"] = true;
		} else {
			if ($mimeType != "image/jpeg" && $mimeType != "image/png") {
				$model["typeError"] = true;
			}
		}
		if ($_FILES["image"]["size"] > 1024*1024) {
			$model["sizeError"] = true;
		}
		return "uploadErrorView";
	}
}


function newUser(&$model) {
	if (isset($_SESSION["logged"])) {
		return "redirect:/";
	} else {
		$email = htmlspecialchars($_POST["email"]);
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
		$passwordRepeat = htmlspecialchars($_POST["passRep"]);

		if (findUser($username)) {
			$model["userExists"] = 1;
			$model["user"] = $username;
		}
		if ($password !== $passwordRepeat) {
			$model["passwordError"] = 1;
		}
		if ($password === $passwordRepeat && !findUser($username)) {
			$newUser = [
				"username" => $username,
				"password" => password_hash($password, PASSWORD_DEFAULT),
				"email" => $email
			];

			addUser($newUser);
			$model["registerSucces"] = 1;
			$model["user"] = $newUser["username"];
			return "registerSuccesView";
		} else {
			return "registerView";
		}
	}
}

function login(&$model) {
	if (isset($_SESSION["logged"])) {
		return "redirect:/";
	} else {
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);

		$user = findUser($username);

		if (!$user) {
			$model["nouser"] = 1;
			return "loginView";
		} else {
			if (password_verify($password, $user["password"])) {
				$_SESSION["logged"] = "logged";
				$_SESSION["loggedUser"] = $username;
				$_SESSION["userID"] = (string)$user["_id"];
				$model["username"] = $username;
				return "loginSuccesView";
			} else {
				$model["wrongpassword"] = 1;
				return "loginView";
			}
		}
	}
}

function logout() {
	session_unset();
	session_destroy();
	session_abort();
	//$_SESSION["userID"] = null;
	return "redirect:/gallery";
}

function rememberSelected(&$model) {
	$i = 0;
	foreach ($_POST as $remembered) {
		$_SESSION["selectedImages"][$remembered] = $remembered;
		++$i;
	}
	return "redirect:/gallery";
}

function forgetSelected(&$model) {
	$i = 0;
	foreach ($_POST as $remembered) {
		unset($_SESSION["selectedImages"][$remembered]);
		++$i;
	}

	if (count($_SESSION["selectedImages"]) === 0) {
		return "redirect:/gallery";
	} else {
		return "redirect:/selected";
	}
}

function searchEngine(&$model) {
	$query = htmlspecialchars($_POST["query"]);
	if ($query) {
		$images = getImagesByTitle($_POST["query"]);
		if (isset($_SESSION["userID"])) {
			$UID = $_SESSION["userID"];
		} else {
			$UID = null;
		}
		$return = [];
		foreach ($images as $image) {
			if ($image["publicity"] === "public" || $image["publicity"] == $UID) {
				$return[] = $image;
			}
		}
		$model["images"] = $return;
	} else {
		$model["images"] = [];
	}

	return "searchEngineOutput";
}
