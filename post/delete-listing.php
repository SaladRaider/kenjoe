<?php

require_once "../paths.php";
require_once $path["config.php"];
session_start();
Password::ifNotSignedInGoTo("../sign-in.php");

try {
	$database->beginTransaction();
	$database->deleteListingPhotosByListingsId($_GET['listing_id']);
	$database->deleteListing($_GET['listing_id']);
	$database->commit();

	removeAllPhotoFilesFromListing();

	header("Location: ../manage-listings.php");
} catch (Exception $e) {
	$database->rollBack();
	echo $e->getMessage();
	die();
}

function removeAllPhotoFilesFromListing() {
	recursivelyRemoveDir("../images/listings/" . $_GET['listing_id']);
}

function recursivelyRemoveDir($dir) {
	$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
	$files = new RecursiveIteratorIterator($it,
	             RecursiveIteratorIterator::CHILD_FIRST);
	foreach($files as $file) {
	    if ($file->isDir()){
	        rmdir($file->getRealPath());
	    } else {
	        unlink($file->getRealPath());
	    }
	}
	rmdir($dir);
}

?>