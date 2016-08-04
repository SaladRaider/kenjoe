<?php

require_once "../paths.php";
require_once $path["config.php"];
session_start();
Password::ifNotSignedInGoTo("../sign-in.php");

try {
	$database->beginTransaction();

	$updatedListing = new Listing($_POST['listing']);
	$database->updateListing($updatedListing);
	if(!empty($_FILES["listing_photo"]['tmp_name']))
		linkFeaturedPhotoToListing($database, $updatedListing);
	$database->commit();

	header("Location: ../new-listing-photos.php?listing_id=".$updatedListing->getListingsId());
} catch (Exception $e) {
	$database->rollBack();
	echo $e->getMessage();
	die();
}

function linkFeaturedPhotoToListing($database, $updatedListing) {
	$listingPhotoFile = $_FILES["listing_photo"];
	$listingsId = $updatedListing->getListingsId();
	$listingPhoto = ListingPhoto::createNewListingPhotoFromFileAndListingsId($listingPhotoFile, $listingsId);
	$database->addListingPhoto($listingPhoto);
	$listingPhoto->uploadListingPhotoToServer();
	$updatedListing->setFeaturedListingPhotosId($listingPhoto->getListingPhotosId());
	$database->updateListingFeaturedPhotoId($updatedListing);
}

?>