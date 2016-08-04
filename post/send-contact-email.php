<?php 

$to = file_get_contents("../txt/contact-form-email.txt");
$from = $_POST["email"];
$name = $_POST["name"];
$subject = $name . " is contacting you from your website.";
$message = $_POST["message"];
$headers = "From: {$from} \r\nReply-To: {$from}";

if(mail($to, $subject, $message, $headers)) {
	echo "Message sent sucessfully!<br /><a href=\"../\">Go Back</a>";
} else {
	echo "Message failed to send.<br /><a href=\"../\">Go Back</a>";
}

?>