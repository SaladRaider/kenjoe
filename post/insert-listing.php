<?php

require_once "../paths.php";
require_once $path["config.php"];

$newListing = new Listing($_POST['listing']);
$database->addListing($newListing);

header("Location: ../listing.php");

?>