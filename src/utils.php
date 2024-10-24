<?php

function imageMagic($id, $type) {
	$image = null;
	list($width, $height) = getimagesize("images/$id/original{$type}");
	$watermark = htmlspecialchars($_POST["watermark"]);

	if ($type == ".jpg") {
		$image = imagecreatefromjpeg("images/{$id}/original{$type}");
	} else {
		$image = imagecreatefrompng("images/{$id}/original{$type}");
	}

	$textColor = imagecolorexactalpha($image, 255, 255, 255, 60);
	imagettftext($image, 50, 0, 20, 70, $textColor, "res/OpenSans-Regular.ttf", $watermark);

	if ($type == ".jpg") {
		imagejpeg($image, "images/{$id}/watermarked{$type}");
	} else {
		imagepng($image, "images/{$id}/watermarked{$type}");
	}

	$thumb = imagecreatetruecolor(200, 125);

	imagecopyresized($thumb, $image, 0, 0, 0, 0, 200, 125, $width, $height);

	if ($type == ".jpg") {
		imagejpeg($thumb, "images/{$id}/thumbnail{$type}");
	} else {
		imagepng($thumb, "images/{$id}/thumbnail{$type}");
	}

	imagedestroy($image);
	imagedestroy($thumb);
}
