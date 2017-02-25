<?php
/*
Template Name: Blog Template
*/
get_header();
?>			
			<div id="content">
				
				<?php 
					//get exclusions for categories
					$exclude = get_option($shortname.'_exclude_categories');				
					$exclude = str_replace(',,','|-',$exclude);
					$exclude = str_replace(',','-',$exclude);
					$exclude = substr($exclude, 0, -1);
					$exclude = str_replace('|',',',$exclude);
					
					query_posts('posts_per_page=&paged='.$paged.'&cat='.$exclude); 
					if(have_posts()) : while(have_posts()) : the_post(); 
				?>		
				
				<div class="entry" id="post-<?php the_ID(); ?>">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<p class="meta">Added by <?php the_author_posts_link() ?> on <a href="<?php echo get_month_link($get_year, $get_month); ?>"><?php the_time('F jS, Y') ?></a>, filed under <?php the_category(', ') ?></p>
					
					<div class="entry-content">
						<p><?php the_post_thumbnail('wide'); ?></p>
						<?php the_excerpt('Read the rest of this entry &raquo;'); ?>
						<p><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <a href="<?php the_permalink() ?>">~ Add your thoughts</a> | <a href="<?php the_permalink() ?>">Continue Reading</a></p>
					</div><!-- e: entry content -->
				</div><!-- e: entry -->
				
				<?php 
					endwhile; 
					//endif;
				?>

				<div class="paginate">
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>   
				</div>

				<?php else : ?>

				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>

				<?php endif; ?>
				
			</div><!-- e: content -->
			
<?php get_sidebar(); ?>

<?php get_footer(); ?>