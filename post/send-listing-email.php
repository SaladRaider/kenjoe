<?php 

define("ROOT", $_SERVER['DOCUMENT_ROOT']."");

$to = file_get_contents("../txt/contact-form-email.txt");
$from = $_POST["email"];
$name = $_POST["name"];
$subject = $name . " is interested in your listing.";
$message = $_POST["message"] . "\r\n\r\nListing: " . ROOT . "listing.php?listing_id=" . $_POST["listings_id"];
$headers = "From: {$from} \r\nReply-To: {$from}";

if(mail($to, $subject, $message, $headers)) {
	echo "Message sent sucessfully!<br /><a href=\"../listing.php?listing_id={$_POST["listings_id"]}\">Go Back</a>";
} else {
	echo "Message failed to send.<br /><a href=\"../listing.php?listing_id={$_POST["listings_id"]}\">Go Back</a>";
}

?>
