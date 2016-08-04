<?php

require_once "../paths.php";
require_once $path["config.php"];
session_start();
Password::ifNotSignedInGoTo("../sign-in.php");

try {
	$database->beginTransaction();

	$newListing = new Listing($_POST['listing']);
	$database->addListing($newListing);
	linkFeaturedPhotoToListing($database, $newListing);
	$database->commit();

	header("Location: ../new-listing-photos.php?listing_id=".$newListing->getListingsId());
} catch (Exception $e) {
	$database->rollBack();
	echo $e->getMessage();
	die();
}

function linkFeaturedPhotoToListing($database, $newListing) {
	$listingPhotoFile = $_FILES["listing_photo"];
	$listingsId = $newListing->getListingsId();
	$listingPhoto = ListingPhoto::createNewListingPhotoFromFileAndListingsId($listingPhotoFile, $listingsId);
	$database->addListingPhoto($listingPhoto);
	$listingPhoto->uploadListingPhotoToServer();
	$newListing->setFeaturedListingPhotosId($listingPhoto->getListingPhotosId());
	$database->updateListingFeaturedPhotoId($newListing);
}

?>