<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'description' => __('This is the right sidebar.', 'novatorix'),
		'name' => 'Right Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'homepage-column-1',
		'description' => __('This is the homepage column 1.', 'novatorix'),
		'name' => 'Homepage column 1',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'homepage-column-2',
		'description' => __('This is the homepage column 2.', 'novatorix'),	
		'name' => 'Homepage column 2',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'homepage-column-3',
		'description' => __('This is the homepage column 3.', 'novatorix'),	
		'name' => 'Homepage column 3',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'homepage-slogan',
		'description' => __('This is the homepage slogan, will be displayed below the  3D Slider.', 'novatorix'),	
		'name' => 'Homepage slogan',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'footer-column-1',
		'description' => __('This is the footer column 1.', 'novatorix'),	
		'name' => 'Footer column 1',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));		
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'footer-column-2',
		'description' => __('This is the footer column 2.', 'novatorix'),	
		'name' => 'Footer column 2',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));			
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'footer-column-3',
		'description' => __('This is the footer column 3.', 'novatorix'),		
		'name' => 'Footer column 3',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));			

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'footer-copyright-text',
		'description' => __('This is the footer copyright text.', 'novatorix'),		
		'name' => 'Footer Copyright text',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'header-search-form',
		'description' => __('This is the header search form place.', 'novatorix'),		
		'name' => 'Header Search Form',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'post-author-info',
		'description' => __('This is the author info at end of each post.', 'novatorix'),		
		'name' => 'Post Author Info',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'post-column-1',
		'description' => __('This is the post column 1, will be displayed below the Post Author Info.', 'novatorix'),	
		'name' => 'Post Column 1(middle)',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'post-column-2',
		'description' => __('This is the post column 2, will be displayed below the Post Author Info.', 'novatorix'),	
		'name' => 'Post Column 2(middle)',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));	
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'contact-form',
		'description' => __('This is Contact Form replacement widget.', 'novatorix'),	
		'name' => 'Contact Form',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	));	

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'id' => 'contact-sidebar',
		'description' => __('This is Contact Sidebar widget.', 'novatorix'),	
		'name' => 'Contact Sidebar',
		'before_widget' => '<ul>',
		'after_widget' => '</ul>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));		
/* Search Widget */
function header_search_widget($args) {
	echo $args['before_widget'];
?>

		<form method="get" id="search" action="<?php bloginfo('home'); ?>">
			<p><input type="text" class="text" id="s" name="s"  value="Search" onclick="this.value=''" /><input type="submit" class="submit" value="" /></p>
		</form>

<?php
	echo $args['after_widget'];
}
wp_register_sidebar_widget( 'header-search-widget', $themename.' - Header Search Form', 'header_search_widget', array('description' => 'Header Search form.'));

function site_search_widget($args) {
	$settings = get_option("nvx_seacrhwidget");
	$title = $settings['title'];
	echo $args['before_widget'];
?>

		<h3><?php echo $title; ?></h3>
		<?php get_search_form(); ?>

<?php
	echo $args['after_widget'];
}
	
	function site_search_widget_admin() {
	$settings = get_option("nvx_seacrhwidget");
	if (isset($_POST['update_site_seacrh'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['site_search_title']));
		update_option("nvx_seacrhwidget",$settings);
	}
	echo '<p>
			<label for="site_search_title">Title:
			<input id="site_search_title" name="site_search_title" type="text" value="'.$settings['title'].'" /></label></p>
		<input type="hidden" id="update_site_seacrh" name="update_site_seacrh" value="1" />';

}

//wp_register_sidebar_widget( 'site-search-widget', $themename.' - Site Search Form', 'site_search_widget', array('description' => 'Site Search form.'));
//register_widget_control('site-search-widget', 'site_search_widget_admin', 200, 200);


/* Flickr Widget */
function flickr_widget($args) {
	$settings = get_option("nvx_flickrwidget");
	$id = $settings['id'];
	$number = $settings['number'];
	$title = $settings['title'];
	echo $args['before_widget'];
?>

			<h3><?php echo $title; ?></h3>
			<ul id="flickr">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>
			</ul>

<?php
	echo $args['after_widget'];
}

function flickr_widget_admin() {
	$settings = get_option("nvx_flickrwidget");
	if (isset($_POST['update_flickr'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['flickr_title']));
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));
		update_option("nvx_flickrwidget",$settings);
	}
	echo '<p>
			<label for="flickr_title">Title:
			<input id="flickr_title" name="flickr_title" type="text" value="'.$settings['title'].'" /></label></p>
		<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com" target="_blank">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>
		<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>
		<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}
wp_register_sidebar_widget( 'flickr-widget', $themename.' - Flickr', 'flickr_widget', array('description' => 'Photos from Flickr account.'));
register_widget_control('flickr-widget', 'flickr_widget_admin', 200, 200);


/* Popular Posts Widget */
function nvx_popular_widget($args) {
	$settings = get_option("nvx_popularwidget");
	$id = $settings['id'];
	$number = $settings['number'];
	$title = $settings['title'];
	
	echo $args['before_widget'];
	
	global $wpdb;
	$pop_posts = get_option('nvx_popular_posts');
	if (empty($pop_posts) || $pop_posts < 1) $pop_posts = $number;
	$now = gmdate("Y-m-d H:i:s",time());
	$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
	$popularposts = "SELECT ID, post_title, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$pop_posts;
	$posts = $wpdb->get_results($popularposts);
	$popular = '';
	
	echo $args['before_widget'];
	echo $args['before_title'] .$title. $args['after_title']; 

	if($posts){ ?>
		
	<?php if ($id == 0) { ?><div class="widget"> <?php } else { ?><div class="widget_popular_posts"><?php } ?>
	<ul id="popular_posts">
		<?php foreach($posts as $post){ 
			$post_title = stripslashes($post->post_title);
			$post_date = $post->post_date;
			$post_date = mysql2date('F j, Y', $post_date, false);
			$permalink = get_permalink($post->ID);
			$thumb_id = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
			$thumb_id = NVXFUNCTIONS .'/timthumb.php?src=' .$thumb_id. '&amp;w=40&amp;h=40&amp;zc=1&amp;q=80';
		?>
		
		<li>
			<?php if ($id == 1) { ?><span><img src="<?php echo $thumb_id; ?>" /></span></a><?php } ?>
			<a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a>
		</li>
		<?php } ?>
		
	</ul>
	</div>
	<?php }
	echo $args['after_widget'];
}

function nvx_popular_widget_admin() {
	$settings = get_option("nvx_popularwidget");
	if (isset($_POST['update_popular_posts'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['popular_posts_title']));
		$settings['id'] = strip_tags(stripslashes($_POST['popular_posts_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['popular_posts_number']));
		update_option("nvx_popularwidget",$settings);
	}
	echo '<p>
			<label for="popular_posts_title">Title:
			<input id="popular_posts_title" name="popular_posts_title" type="text" value="'.$settings['title'].'" /></label></p>
		<p>
			<label for="popular_posts_id">Show images on popular posts? (1 - yes, 0 - no)
			<input id="popular_posts_id" name="popular_posts_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>
		<p>
			<label for="popular_posts_number">Number of posts:
			<input id="popular_posts_number" name="popular_posts_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>
		<input type="hidden" id="update_popular_posts" name="update_popular_posts" value="1" />';

}
wp_register_sidebar_widget( 'popular-widget', $themename.' - Popular Posts', 'nvx_popular_widget', array('description' => 'Popular posts widget'));
register_widget_control('popular-widget', 'nvx_popular_widget_admin', 200, 200);


// Inside Post Author Info Widget
function post_authorinfo_widget($args) {
	$settings = get_option("nvx_post_authorinfo");
	$title = $settings['title'];
	echo $args['before_widget'];
?>

		<?php echo get_avatar( get_the_author_ID() , $size = '74', get_bloginfo('template_url').'/css/arsenic/author.gif' ); ?>
		<h3><?php echo $title; ?>: <?php the_author(); ?></h3>
		<p><?php the_author_description(); ?></p>

<?php
	echo $args['after_widget'];
}
	
	function poast_authorinfo_admin() {
	$settings = get_option("nvx_post_authorinfo");
	if (isset($_POST['update_author_info'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['author_title']));
		update_option("nvx_post_authorinfo",$settings);
	}
	echo '<p>
			<label for="author_title">Title:
			<input id="author_title" name="author_title" type="text" value="'.$settings['title'].'" /></label></p>
		<input type="hidden" id="update_author_info" name="update_author_info" value="1" />';

}
wp_register_sidebar_widget( 'post-author-widget', $themename.' - Post Author Info', 'post_authorinfo_widget', array('description' => 'Post Author Info.'));
register_widget_control('post-author-widget', 'poast_authorinfo_admin', 200, 200);

// Inside Post Author Info Widget
function post_related_widget($args) {
	$settings = get_option("nvx_post_related");
	$title = $settings['title'];
	$number = $settings['number'];	
	echo $args['before_widget'];

	echo $args['before_title'] .$title. $args['after_title']; 

	global $wpdb, $post;
	$time_difference = get_settings('gmt_offset');
	$now = gmdate("Y-m-d H:i:s",(time()+($time_difference*3600)));
	
	// Primary SQL query
	$sql = "SELECT ID, post_title, post_content "
         . "FROM $wpdb->posts WHERE "
		 . "post_type = 'post' "
		 . "AND post_date <= '$now' "
         . "AND (post_status IN ( 'publish',  'static' ) && ID != '$post->ID') ";
    $sql .= "ORDER BY ID DESC LIMIT $number";
    $results = $wpdb->get_results($sql);
    $output = '<ol>';
    if ($results) {
		foreach ($results as $result) {
			$title = stripslashes(apply_filters('the_title', $result->post_title));
			$permalink = get_permalink($result->ID);
			$output .= '<li><a href="'.$permalink.'" title="'.$title.'">'.$title.'</a></li>';
		}
		$output .= '</ol>';
		echo $output;
	} else {
        echo 'No related posts';
    }

	echo $args['after_widget'];		
}
	
	function post_related_admin() {
	$settings = get_option("nvx_post_related");
	if (isset($_POST['update_related_posts'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['related_title']));
		$settings['number'] = strip_tags(stripslashes($_POST['related_posts_number']));		
		update_option("nvx_post_related",$settings);
	}
	echo '<p>
			<label for="related_title">Title:
			<input id="related_title" name="related_title" type="text" value="'.$settings['title'].'" /></label></p>
		<p>
			<label for="related_posts_number">Number of posts:
			<input id="related_posts_number" name="related_posts_number" type="text" value="'.$settings['number'].'" /></label></p>			
		<input type="hidden" id="update_related_posts" name="update_related_posts" value="1" />';

}
wp_register_sidebar_widget( 'post-related-widget', $themename.' - Related Posts', 'post_related_widget', array('description' => 'Related Posts.'));
register_widget_control('post-related-widget', 'post_related_admin', 200, 200);
?>