<?php

require_once "../paths.php";
require_once $path["config.php"];
session_start();
Password::ifNotSignedInGoTo("../sign-in.php");

try {
	$database->beginTransaction();
	$listingPhotoFile = $_FILES["listing_photo"];
	$listingsId = $_POST["listings_id"];
	$listingPhoto = ListingPhoto::createNewListingPhotoFromFileAndListingsId($listingPhotoFile, $listingsId);
	$database->addListingPhoto($listingPhoto);
	$listingPhoto->uploadListingPhotoToServer();
	$database->commit();
} catch (Exception $e) {
	$database->rollBack();
	echo $e->getMessage();
	die();
}

?>