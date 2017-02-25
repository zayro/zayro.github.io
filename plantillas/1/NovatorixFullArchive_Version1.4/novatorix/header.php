<?php
/**
 * @package WordPress
 * @subpackage Novatorix
**/ 

global $shortname;
$site_url = get_option('siteurl');
$site_url = str_replace('http://www','',$site_url);
$site_url = str_replace('http://','',$site_url);
if (isset($_GET["color"])) { $color = $_GET["color"]; setcookie("color", $color, time()+3600, "/", $site_url);}
if (isset($_COOKIE["color"])) { $color = $_COOKIE["color"]; } else { $color ='arsenic.css'; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/reset.css" type="text/css" media="screen" />

<?php if (get_option($shortname.'_style')){ 
if (isset($_COOKIE["color"])) { $color = $_COOKIE["color"]; } else { $color = get_option($shortname.'_style'); }
?>
<link rel="stylesheet" href="<?php echo bloginfo('template_url').'/css/'.$color; ?>" type="text/css" media="screen" />
<?php }else{ ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/arsenic.css" type="text/css" media="screen" />
<?php } ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />

<!-- start:jquery scripts -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery.easing.min.js"></script>
<!-- end:jquery scripts -->

<!--Superfish -->
<!--link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/scripts/superfish.css" media="screen" /-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/hoverIntent.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/superfish.js"></script>
<meta name="temp_url" content="<?php bloginfo('template_url'); ?>" />
<script type="text/javascript">
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});
</script>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fonts/stylesheet.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/piecemaker/js/swfobject/swfobject.js"></script>	

	<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ie.css" />
	<![endif]-->

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/scripts/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?php bloginfo('template_url'); ?>/scripts/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

</head>

<body class="inner">
<div id="shim"></div>
<div id="wrap">
	<div id="head">
	<?php 
		if (get_option($shortname.'_logo')) { 
		$logo_url = get_option($shortname.'_logo');
		list($width, $height, $type, $attr) = getimagesize($logo_url);
		$logo_height = $height;
		$logo_width = $width;
		
		$logo_top = 80-($logo_height-50)/2;
		$logo_left = 366-($logo_width-228)/2;
		
	?>
		<a href="<?php echo get_option('siteurl'); ?>" id="logo_user"  style="position:absolute; top:20px;	left:0;	height:<?php echo $logo_height; ?>px; width:<?php echo $logo_width; ?>px; top:<?php echo $logo_top; ?>px; left:<?php echo $logo_left; ?>px; text-indent:-9999em; background: url(<?php echo get_option($shortname.'_logo'); ?>) no-repeat scroll center top;"><?php bloginfo('name'); ?></a>
	<?php } else { ?>
		<a href="<?php echo get_option('siteurl'); ?>" id="logo" style="background: url(<?php echo get_bloginfo('template_url');?>/css/arsenic/logo.png) top center no-repeat;"><?php bloginfo('name'); ?></a>
	
	<?php
	}
	?>	
		  <!-- NAVIGATION -->
		<div class="navigation-wrap">
			<!--div class="nav-right-corner"></div-->
			
			<?php
				$wp_3_0_menus = get_option($shortname.'_wp_3_0_menus');
				if (!$wp_3_0_menus) {
					wp_nav_menu(array(
					'menu'              => 'Header Menu',
					'container'         => '',
					'container_class'   => '',
					'container_id'      => '',
					'menu_class'        => 'sf-menu',
					'menu_id'           => '',
					'echo'              => true,
					'fallback_cb'       => '',
					'before'            => '',
					'after'             => '',
					'link_before'       => '',
					'link_after'        => '',
					'depth'             => 0,
					'walker'            => '',
					'theme_location'    => ''
					));
				} else {
			?>
		
			<ul class="sf-menu">
			<li><a href="<?php echo get_settings('home'); ?>" <?php if (is_front_page()){echo 'class="current"';} ?>>Home</a></li>
				<?php 
					$exclude = get_option($shortname.'_exclude_pages');
					$all_pages = wp_list_pages("sort_column=menu_order&sort_order=ASC&exclude=".$exclude."&title_li=&echo=0");
					$all_pages = str_replace('<ul>','<ul class="sub-menu">',$all_pages);
					
					echo $all_pages;
				?>
			</ul>
			
			<?php } ?>
			
		</div>
		<!--form role="search" method="get" id="search" action="<?php bloginfo('home'); ?>">
			<p><input type="text" class="text" id="s" name="s"  value="Search" onclick="this.value=''" /><input type="submit" class="submit" value="" /></p>
		</form-->
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Search Form") ) : ?>				
		<?php endif; ?>
		
	</div><!-- e: head -->


	
	<div id="section-title">
		<h1><?php 		
			if (is_single()) 
			{	$category = get_the_category();
				echo $category[0]->cat_name; 
			} else if(is_archive()) {
				//echo 'Post Archive';
			?>
					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
					<?php /* If this is a category archive */ if (is_category()) { ?>
					Category Archive<br />for: &lsquo;<?php single_cat_title(); ?>&rsquo;
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					All Posts Tagged<br />Tag: &lsquo;<?php single_tag_title(); ?>&rsquo;
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					Daily Archive<br />for: &lsquo;<?php the_time('F jS, Y'); ?>&rsquo;
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					Monthly Archive<br />for: &lsquo;<?php the_time('F, Y'); ?>&rsquo;
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					Yearly Archive<br />for: &lsquo;<?php the_time('Y'); ?>&rsquo;
					<?php /* If this is an author archive */ } elseif (is_author()) { 
					$curauth = get_userdatabylogin(get_query_var('author_name')); ?>
					Author Archive<br />for: &lsquo;<?php echo $curauth->nickname; ?>&rsquo;
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					Blog Archives
					<?php } ?>
			<?php
			} else if(is_search()) {
				echo 'Search Results:';				
			} else { echo $post->post_title; }
		?></h1>
	</div>

	<div id="outer-page">
		<div id="page">
		<?php 	if (get_option($shortname."_breadcrumbs")) : ?>
			<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
		<?php endif; ?>
		