<?php
/**
 * @package WordPress
 * @subpackage Novatorix
 */
 global $shortname;
?>

<?php 
	wp_reset_query();
	if ( (!is_front_page()) or (!is_home()) ) { 
?>
		</div><!-- e: page -->		
	</div><!-- e: outer-page -->	
</div><!-- e: wrap -->
<?php } ?>

<div id="foot">
	<div id="footer">
		<div class="testimonials">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer column 1") ) : ?>		
				<h5>What clients are saying:</h5>
				
				<p><?php echo get_option($shortname."_first_testimonial"); ?></p>
			<?php endif; ?>				
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer column 2") ) : ?>					
				<p><?php echo get_option($shortname."_second_testimonial"); ?></p>
			<?php endif; ?>

		</div>
		
		<div id="social">
			<h6>Get in touch!</h6>
			<ul>
				<?php 
					if (get_option($shortname."_display_rss")) { 
						echo '<li><a href="'.get_option($shortname."_rss").'" class="social1"></a></li>';
					} 
					
					if (get_option($shortname."_display_twitter")) { 
						echo '<li><a href="'.get_option($shortname."_twitter").'" class="social2"></a></li>';
					} 
					
					if (get_option($shortname."_display_facebook")) { 
						echo '<li><a href="'.get_option($shortname."_facebook").'" class="social3"></a></li>';
					} 
					
					if (get_option($shortname."_display_linkedin")) { 
						echo '<li><a href="'.get_option($shortname."_linkedin").'" class="social4"></a></li>';
					} 
					
					?>				
			</ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer column 3") ) : ?>				
			<p>
				<?php if (get_option($shortname."_adress")) { echo get_option($shortname."_adress").'<br />';} ?>
				<?php if (get_option($shortname."_phone")) { echo 'Telephone: '.get_option($shortname."_phone").'<br />';} ?>
				<?php if (get_option($shortname."_fax")) { echo 'Fax: '.get_option($shortname."_fax").'<br />';} ?>				
				<?php if (get_option($shortname."_email")) { echo 'Email: '.get_option($shortname."_email");} ?>
			</p>
			<?php endif; ?>
			
		</div>
	</div>
	<div id="bottom">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Copyright text") ) : ?>				
			<?php echo stripslashes(get_option($shortname."_footer")); ?>
		<?php endif; ?>			
	</div>
</div><!-- e: foot -->

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$(".gallery a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
});
</script>

<?php echo get_option($shortname."_tracking_code");  ?>

<!--[if lt IE 7]><script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/unitpngfix.js"></script><![endif]-->
 
</body>
</html>