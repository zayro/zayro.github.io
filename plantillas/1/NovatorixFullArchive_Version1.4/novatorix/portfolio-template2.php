<?php
/**
 * @package WordPress
 * @subpackage Novatorix
 * Template Name: Portfolio Full View
*/
 
get_header(); ?>

		<div class="portfolio_view">
			<ul class="gallery clearfix" id="work">
				<?php
				$thePostID = $post->ID;
				$get_custom_options = get_option($shortname.'_portfolio_page_id'); 
				$cat_inclusion = $get_custom_options['portfolio_to_cat_'.$thePostID];
				
				query_posts('posts_per_page=&paged='.$paged.'&cat='.$cat_inclusion);
				if (have_posts()) : 
				?>
				<!--  add a query or, if using wp 3.0 RC2, a post-stype declaration -->
				<?php while (have_posts()) : the_post(); ?>
				
				<li class="work">
					<?php				
					$images = &get_children('post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC&post_parent='.$post->ID);
					if ($images):
					$image = current($images); $imageData = wp_get_attachment_image_src($image->ID);
					endif;
					
					//$get_custom_options =  wp_get_attachment_image_src($image->ID, '_wp_attachment_metadata', true);
					$get_custom_options =  wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id', true), '_wp_attachment_metadata', true);
					$get_custom_image_url = $get_custom_options[0];
					
					$pretty_video_flash = get_post_meta($post->ID, $shortname.'_pretty_video_flash',true);
					if ($pretty_video_flash) $get_custom_image_url = $pretty_video_flash;
					?>						
					<a href="<?php echo $get_custom_image_url; ?>" rel="prettyPhoto[gallery2]" class="work-item">
						<?php the_post_thumbnail('rectangle'); 
						if ($pretty_video_flash) {
						?>
							<span class="video"></span>
						<?php
						} else {
						?>
							<span class="image"></span>
						<?php } ?></a>
					
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<?php  
						echo $gallery_description = get_post_meta($post->ID, $shortname.'_portfolio_description',true);
					?>
						
				</li>
		
				<?php endwhile; ?>

				<?php else : ?>
				
				<?php endif; ?>
								
			</ul><!-- e: content -->
		</div>
		
		<div class="paginate">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>   
		</div>
			

<?php get_footer(); ?>