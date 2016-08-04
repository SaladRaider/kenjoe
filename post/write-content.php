<?php

require_once "../paths.php";
require_once $path['config.php'];
session_start();
Password::ifNotSignedInGoTo("../sign-in.php");

define("MAX_FILE_SIZE", 500000);
define("PROFILE_PHOTO_PATH", "./images/");
define("PROFILE_PHOTO_NAME", "profile-photo");

writeTextToFile($_POST['center-screen-text'], "../txt/center-screen-text.txt");
writeTextToFile($_POST['footer-text'], "../txt/footer-text.txt");
writeTextToFile($_POST['contact-form-email'], "../txt/contact-form-email.txt");
writeTextToFile($_POST['interested-form-email'], "../txt/intersted-form-email.txt");
writeTextToFile($_POST['facebook-page-link'], "../txt/facebook-page-link.txt");
writeTextToFile($_POST['linkedin-page-link'], "../txt/linkedin-page-link.txt");
writeTextToFile($_POST['about-content'], "../txt/about-content.txt");
writeTextToFile($_POST['contact-content'], "../txt/contact-content.txt");

updateProfilePhoto($_FILES['profile-photo']);

header("Location: ../admin.php");

function writeTextToFile($text, $fileName) {
	$myfile = fopen($fileName, "w") or die("Unable to open file!");
	fwrite($myfile, $text);
	fclose($myfile);
}

function updateProfilePhoto($profilePhoto) {
	if(isValidPhoto($profilePhoto)) {
		uploadProfilePhotoToServer($profilePhoto);
		updateProfilePhotoFileName($profilePhoto);	
	}
}

function isValidPhoto($profilePhoto) {
	return !empty($profilePhoto['tmp_name']) && isImage($profilePhoto) && isFileSmallEnough($profilePhoto) && isCorrectImageType($profilePhoto);
}

function isImage($profilePhoto) {
	return getimagesize($profilePhoto["tmp_name"]) !== false;
}

function isFileSmallEnough($profilePhoto) {
	return $profilePhoto["size"] <= constant("MAX_FILE_SIZE");
}

function isCorrectImageType($profilePhoto) {
	$fileType = getPhotoExtension($profilePhoto);
	return $fileType == "jpg" || $fileType == "jpeg" || $fileType == "png" || $fileType == "gif";
}

function uploadProfilePhotoToServer($profilePhoto) {
	move_uploaded_file($profilePhoto["tmp_name"], getProfilePhotoDestinationPath($profilePhoto));
}

function updateProfilePhotoFileName($profilePhoto) {
	writeTextToFile(getProfilePhotoDestinationPath($profilePhoto), "./txt/profile-photo.txt");
}

function getPhotoExtension($profilePhoto) {
	return pathinfo($profilePhoto["name"], PATHINFO_EXTENSION);
}

function getProfilePhotoDestinationPath($profilePhoto) {
	return constant("PROFILE_PHOTO_PATH") . constant("PROFILE_PHOTO_NAME") . "." . getPhotoExtension($profilePhoto);
}

?>