<?php

$receiverMail	= "myemail@gmail.com"; /* Your email */


$name		= ltrim(rtrim(strip_tags(stripslashes($_POST['name']))));

$email		= ltrim(rtrim(strip_tags(stripslashes($_POST['email']))));

$msg		= ltrim(rtrim(strip_tags($_POST['msg'])));

$subject    = $name ." - ".$email;

$ip		= getenv("REMOTE_ADDR");

$msgformat	= "From: $name ($ip)\nEmail: $email\n\n$msg"; /* MSG format */



// VALIDATION

if(empty($name) || empty($email) || empty($msg)) {

	echo "<div id='status' class='error'>The email was not sent. Please fill all the required fields</div>";

}

elseif(!ereg("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {

	echo "<div id='status'  class='error'>The email was not sent. The email address is invalid</div>";

}

else {

	mail($receiverMail, $subject, $msgformat, "From: $name <$email>");

	echo "<div id='status'  class='ok'>Your message has been sent successfully!</div"; }

?>