<?php

use MongoDB\BSON\ObjectID;

function get_db() {
	$mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            "username" => "wai_web",
            "password" => "w@i_w3b",
        ]
    );
	$db = $mongo->wai;
	return $db;
}

function getImage($id) {
	$id = new ObjectId($id);
	$db = get_db();
	$image = $db->images->findOne(["_id" => $id]);
	return $image;
}

function getImagesByTitle($title) {
	$regex = new MongoDB\BSON\Regex(".*{$title}.*", "i");
	$db = get_db();
	$images = $db->images->find(["title" => $regex]);
	return $images;
}

function getAllImages() {
	$db = get_db();
	$images = $db->images->find();
	return $images;
}

function saveImageinfo($imageInfo) {
	$db = get_db();
	$id = null;
	if ($return = $db->images->insertOne($imageInfo)) {
		return $return->getinsertedId();
	} else {
		return 0;
	}
}

function removeAll() {
	$db = get_db();
	$db->images->deleteMany([]);
	$db->users->deleteMany([]);
}

function addUser($user) {
	$db = get_db();
	$db->users->insertOne($user);
}

function findUser(string $username) {
	$db = get_db();
	$user = $db->users->findOne(["username" => $username]);
	return $user;
}
