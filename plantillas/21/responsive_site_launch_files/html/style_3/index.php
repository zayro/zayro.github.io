<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>mafiashare.net - free themes & templates</title>
<meta name="description" content="Responsive Hotel  Site template">
<meta name="author" content="">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/layout.css">

<!-- Favicons-->
<link rel="shortcut icon" href="img/favicon.ico">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
   
<!-- Jquery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<!-- JQUERY COUNTDOWN -->
<script type="text/javascript" src="js/countdown/jquery.countdown.js"></script>
<script type="text/javascript">
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 1, 8-12, 01);
	$('#defaultCountdown').countdown({until: austDay});
});
</script>
<!-- start cufon -->
 <script src="js/cufon-yui.js" type="text/javascript"></script>
 <script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/font.js" type="text/javascript"></script>
<!-- form first value-->
 <script type="text/javascript">
function clickclear(thisfield, defaulttext, color) {
      if (thisfield.value == defaulttext) {
            thisfield.value = "";
            if (!color) {
                color = "6D6F71";
            }
            thisfield.style.color = "#" + color;
      }
}
function clickrecall(thisfield, defaulttext, color) {
      if (thisfield.value == "") {
            thisfield.value = defaulttext;
            if (!color) {
                color = "6D6F71";
            }
            thisfield.style.color = "#" + color;
      }
}
</script>
<!-- Jquery Validate-->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myform").validate();
  });
  </script>
</head>
<body>
<div id="shadow_top">
<div class="container">
<div class=" twelve columns offset-by-two" id="logo">
	<img src="img/logo.png" class="scale-with-grid" alt="Logo"><!-- Your logo-->
    <h1>We are working on a new site, don't forget to check when launch!</h1>
</div>

<div id="defaultCountdown"></div><!-- Count down-->

<br class="clear">

<div class="sixteen columns" style="margin-top:20px"> 
<div class="three columns"><div class="msg">your cufon message</div></div>
<!-- Start newsletter form -->
<div class="ten columns" >
<?php
		if (!count($_POST)){
		?>
<div id="form_bg">
	<form method="post" id="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input name="Email" type="text" class="required email" value="enter your email address.." onclick="clickclear(this, 'enter your email address..')" onfocus="clickclear(this, 'enter your email address..')" onblur="clickrecall(this,'enter your email address..')"/>
    <button type="submit" class="send_bt">Send Message</button>
    </form>
</div>
		<?php
		}else{
	    ?>
        <!-- START SEND MAIL SCRIPT -->
        <div>
        	 <p class="success">Email Successfully Sent!</p>
        </div>
						
						<?php
						$mail = $_POST['email'];

						/*$subject = "".$_POST['subject'];*/
						$to = "info@ansonika.com";
						$subject = "Message from Responsive site launch";
						$headers = "From: Responsive site launch <noreply@ansonika.com>";
						$message = "Plase notify me when site launch \n";
						$message .= "\nEmail: " . $_POST['Email'];
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
						}
						?>
						
	<!-- END SEND MAIL SCRIPT -->    
</div><!-- End newsletter form -->
</div>
<br class="clear">
  
<!-- Start footer-->  
<div class="sixteen columns" id="footer">
<div class="five columns copy alpha">© 2012 Responsive site launch. All Rights Reserved.</div>
     <div class="eleven columns omega ">
        <ul id="follow">
        	<li><a href="#" id="tw">Twitter</a></li>
            <li><a href="#" id="rss">Rss</a></li>
            <li><a href="#" id="vimeo">Vimeo</a></li>
            <li ><a href="#" id="fb">Facebook</a></li>
        </ul>
    </div>
    <br class="clear">
</div><!-- End footer-->
    
</div><!-- End shadow top-->
</div><!-- End container-->
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>