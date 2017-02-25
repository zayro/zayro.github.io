<?php
/*
Template Name: Contact Template
*/
get_header();
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#submit").click(function(){					   				   
		$(".error").hide();
		var hasError = false;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var msg;
		msg = '';
		var msg_success;
		msg_success = '';
		
		var author_string = $("#authorname").val();
		if(author_string == '') {
			hasError = true;
			msg = msg+'<li><strong>Name</strong> is a required field.</li>';
		}
		
		var email_string = $("#email").val();
		if(email_string == '') {
			hasError = true;
			msg = msg+'<li><strong>Email</strong> is a required field.</li>';
		} else if(!emailReg.test(email_string)) {	
			hasError = true;
			msg = msg+'<li>Invalid <strong>Email Address</strong></li>';
		}
		
		var subject_string = $("#subject").val();
		if(subject_string == '') {
			hasError = true;
			msg = msg+'<li><strong>Subject</strong> is a required field.</li>';
		}
		
		var message_string = $("#message").val();
		if(message_string == '') {
			hasError = true;
			msg = msg+'<li><strong>Message</strong> is a required field.</li>';
		}
		
		if(hasError == true) {
			document.getElementById('msg_error').innerHTML = '<div class="error_required"><h3>Validation errors occurred. Please confirm the fields and submit it again.</h3><ul>' + msg + '</ul></div>';	
		}
		
		if(hasError == false) {
			$(this).hide();
			$("#contact-form li.buttons").append('Sending');
			
			$.post("<?php bloginfo('template_url'); ?>/lib/functions/contactform.php",
   				{ authorname: author_string, email: email_string, subject: subject_string, message: message_string },
   					function(data){
						$("#contact-form").slideUp("normal", function() {				   
							msg_success = '<div class="error_items"><h3>Thank You for Contacting Us!</h3><p>Thank you for contacting us! Your information has been sent and we should be in touch with you soon.</p></div>';
							document.getElementById('msg_error').innerHTML = '';	
							document.getElementById('msg_success').innerHTML = msg_success;
						});
   					}
				 );
		}		
		return false;	
	});						   
});
</script>

    
    	<div id="content">
          <div class="entry">
			<?php 
					if(have_posts()) : while(have_posts()) : the_post();
					the_content('');
					endwhile; 
					endif;
			
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Contact Form") ) : 
			?>
				<!--h1>Contact</h1-->
				
			<?php echo $msg; ?>	
			
			<div id="msg_error"></div>
			<div id="msg_success"></div>
			  <form action="/" method="post" id="contact-form">
            <p>
              <label for="name">Name:</label><input type="text" name="authorname" id="authorname" value="" />
            </p>
            <p>
              <label for="email">Email:</label><input type="text" name="email" id="email" value=""  />
            </p>
            <p>
              <label for="subject">Subject:</label><input type="text" name="subject" id="subject" value=""  />
            </p>
            <p>
              <label for="message">Message:</label><textarea name="message" id="message" rows="5" cols="20"></textarea>
			</p>
            <p>		
			  <button class="send_btn" type="submit" id="submit">Submit Form</button><input type="hidden" name="submitted" id="submitted" value="true"/>
            </p>
			  </form>
			<?php endif; ?>
		  </div>
       </div>        
    
	
	<div id="sidebar">
		<div class="widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Contact Sidebar") ) : ?>
		
		<?php endif; ?>
		</div>
	</div>
	<?php //get_sidebar(); ?>
	

<?php get_footer(); ?>