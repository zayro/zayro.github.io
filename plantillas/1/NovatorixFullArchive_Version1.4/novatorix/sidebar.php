<?php
/**
 * @package WordPress
 * @subpackage Novatorix
 */
?>
			<div id="sidebar">
				<div class="widget">
					<h3>Categories</h3>
					<ul>
					<?php 
						//get exclusions for categories
						global $shortname;
						$exclude = get_option($shortname.'_exclude_categories');				
						$exclude = str_replace(',,',',',$exclude);
						$exclude = substr($exclude,1);
						$exclude = substr($exclude, 0, -1);
						wp_list_categories('show_count=0&title_li=&exclude='.$exclude); 
					?>
					</ul>
				</div>
				
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Right Sidebar") ) : ?>
			<?php endif; ?>
				
			</div>
