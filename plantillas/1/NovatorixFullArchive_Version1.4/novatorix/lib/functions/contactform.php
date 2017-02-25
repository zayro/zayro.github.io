<?php
	// functions to send email from contact form
	require("../../../../../wp-load.php"); //include worpress wp-load.php
	GLOBAL $shortname;
	$mailTo = get_bloginfo('admin_email'); 
	$name = $_POST['authorname'];
	$mailFrom = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$headers = "From: $mailFrom";
	$body = "Name: $name\n\n" . "Email: $mailFrom\n\n" . "Message: \n$message";
	$sending = (mail($mailTo, $subject, $body, $headers));
?>