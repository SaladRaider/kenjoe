<?php

require_once "../paths.php";
require_once $path["config.php"];

try {
	$database->beginTransaction();
	$newListing = new Listing($_POST['listing']);
	$database->addListing($newListing);
	$database->commit();
	header("Location: ../new-listing-photos.php?listing_id=".$newListing->getListingsId());
} catch (Exception $e) {
	$database->rollBack();
	echo $e->getMessage();
	die();
}

?>