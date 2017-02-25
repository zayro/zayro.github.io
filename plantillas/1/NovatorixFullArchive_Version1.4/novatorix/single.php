<?php
/**
 * @package WordPress
 * @subpackage Novatorix
 */

get_header(); ?>
			
			<div id="content">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				
				<div class="entry" id="post-<?php the_ID(); ?>">
					<h1><?php the_title(); ?></h1>
					<p class="meta">Added by <?php the_author_posts_link() ?> on <a href="<?php echo get_month_link($get_year, $get_month); ?>"><?php the_time('F jS, Y') ?></a>, filed under <?php the_category(', ') ?></p>					
					<div class="entry-content">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
					</div><!-- e: entry content -->
					
					<?php if (get_option($shortname.'_about_the_author_posts')) {?>					
					<div class="entry-author">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Post Author Info") ) : ?>				
							<img src="<?php bloginfo('template_url'); ?>/css/arsenic/author.gif" alt="" />
							<h3>About the Author: <?php the_author() ?></h3>
							<p>Post Author Widget </p>
						<?php endif; ?>			
					</div><!-- e: entry author -->
					<?php } ?>
					
					<?php if (get_option($shortname.'_enjoyed_related_posts')) {?>
					<div class="entry-foot">
						<div class="enjoy">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Post Column 1(middle)") ) : ?>										
								<h2>Enjoyed this Post?</h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								<p><img src="<?php bloginfo('template_url'); ?>/css/arsenic/plugin1.gif" alt="" /><img src="<?php bloginfo('template_url'); ?>/css/arsenic/plugin2.gif" alt="" /></p>
							<?php endif; ?>			
						</div>
						
						<div class="related">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Post Column 2(middle)'") ) : ?>													
								<h2>Related Posts:</h2>
								<ol>
									<li>Replace with plugin</li>
								</ol>
							<?php endif; ?>										
						</div><!-- e: related -->
					</div><!-- e: entry foot -->
					<?php } ?>
					
					<div id="comwrap">
						<div id="comments" style="margin:0 auto;"></div>
						<?php comments_template(); ?>
					</div><!-- e: comwrap -->
					
				</div><!-- e: entry -->
		
				<?php endwhile; ?>

				<?php else : ?>

				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>

				<?php endif; ?>
				
			</div><!-- e: content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>