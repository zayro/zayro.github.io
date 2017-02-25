<?php
	/* send email from contact form */
	$mailTo = 'admin@atixscripts.info';
	$name = $_POST['authorname'];
	$mailFrom = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$headers = "From: $mailFrom";
	$body = "Name: $name\n\n" . "Email: $mailFrom\n\n" . "Message: \n$message";
	$sending = (mail($mailTo, $subject, $body, $headers));
?>