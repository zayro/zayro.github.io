<?php
/**
 * @package WordPress
 * @subpackage Novatorix
 * Template Name: Portfolio Gallery View
*/
 
get_header(); 
?>

	<div class="portfolio_view">	
		<ul class="gallery clearfix" id="folio">
		<?php			
		$thePostID = $post->ID;
		$get_custom_options = get_option($shortname.'_portfolio_page_id'); 
		$cat_inclusion = $get_custom_options['portfolio_to_cat_'.$thePostID];
		$portfolio_itemss = get_option($shortname.'_portfolio_items'); 

		query_posts('posts_per_page='.$portfolio_itemss.'&paged='.$paged.'&cat='.$cat_inclusion);
		if (have_posts()) : 
		while (have_posts()) : the_post(); 
		?>
		
		<li>	
			<?php				
			$images = &get_children('post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC&post_parent='.$post->ID);
			if ($images):
			$image = current($images); $imageData = wp_get_attachment_image_src($image->ID);
			endif;
			
			$get_custom_options =  wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id', true), '_wp_attachment_metadata', true);
			$get_custom_image_url = $get_custom_options[0];


			$pretty_video_flash = get_post_meta($post->ID, $shortname.'_pretty_video_flash',true);
			if ($pretty_video_flash) $get_custom_image_url = $pretty_video_flash;
			?>				
			<a href="<?php echo $get_custom_image_url; ?>" rel="prettyPhoto[gallery1]" class="folio-item">
			<?php the_post_thumbnail('square'); 
			if ($pretty_video_flash) {
			?>
				<span class="video"></span>
			<?php
			} else {
			?>
				<span class="image"></span>
			<?php } ?></a>
			<?php
				// Limit $title to how many characters
				$limit = 30;
				$title = the_title_attribute('echo=0');
				if (strlen($title) > $limit)
				$title = substr($title, 0, strrpos(substr($title, 0, $limit), ' ')) . ' ...';
			?>
			<h3><a href="<?php the_permalink() ?>"><?php echo $title; ?></a></h3>
			<p><?php the_category('/ ') ?></p>
			
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