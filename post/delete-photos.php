<?php

require_once "../paths.php";
require_once $path["config.php"];
session_start();
Password::ifNotSignedInGoTo("../sign-in.php");

try {
	$database->beginTransaction();
	$photosToDelete = $_POST['photosToDelete'];
	foreach($photosToDelete as $photo) {
		$database->deleteListingPhoto($photo);
		removePhotoFromServer($photo);
	}
	$database->commit();

	header("Location: ../new-listing-photos.php?listing_id=".$_POST['listing_id']);
} catch (Exception $e) {
	$database->rollBack();
	echo $e->getMessage();
	die();
}

function removePhotoFromServer($listingPhotosId) {
	array_map("unlink", glob("../images/listings/{$_POST['listing_id']}/{$listingPhotosId}.*"));
}

?>