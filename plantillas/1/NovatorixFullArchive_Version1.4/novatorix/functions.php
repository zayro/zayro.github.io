<?php	
/**
* @package WordPress
* @subpackage Novatorix
**/

//add_custom_background();

add_theme_support('nav-menus');
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'header_menu' => 'Header Menu'
  		)
  	);
}

automatic_feed_links();

define('JSLIBS', get_bloginfo('template_url') . '/lib/js' );
define('NVXFUNCTIONS', get_bloginfo('template_url') . '/lib/functions' );

function admin_scripts() {
	wp_enqueue_script('jquery', JSLIBS .'/jquery.js', array('jquery'), '1.0');
	wp_enqueue_script('tablerows', JSLIBS .'/exclude.js', array('jquery'), '1.0.0');
	wp_enqueue_script('panel-slide', JSLIBS .'/panel-slide.js', false, '1.0');
}
add_action('admin_enqueue_scripts', 'admin_scripts');

require_once( TEMPLATEPATH . '/lib/admin/theme-admin.php' );	
require_once( TEMPLATEPATH . '/lib/admin/theme-options.php' );
require_once( TEMPLATEPATH . '/lib/admin/theme-functions.php' );
require_once( TEMPLATEPATH . '/lib/posts/post-options.php' );
require_once( TEMPLATEPATH . '/lib/functions/wp-pagenavi.php' );
require_once( TEMPLATEPATH . '/lib/functions/widgets.php' );	
require_once( TEMPLATEPATH . '/lib/functions/shortcodes.php');
require_once( TEMPLATEPATH . '/lib/functions/breadcrumb.php');

/* Function admin_update_theme */
function admin_update_theme() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {
				
                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) 
				{
                    if( isset( $_REQUEST[ $value['id'] ] ) ) 
					{ 
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
					} else { 
						delete_option( $value['id'] ); 
					} 
				}				
				
				// Update option 'portfolio_page_id' Portfolio ID to Category for unlimited portfolio subcategories
				foreach ($_POST as $key => $value) 
				{
					if ( preg_match("/portfolio_to_cat_/", $key) ) 
					{	
						if ($value != '') $portfolio_items[$key] = $value;
					}	
									
					delete_option( $shortname.'_portfolio_page_id');
					update_option( $shortname.'_portfolio_page_id', $portfolio_items);					
				}

				// Update option 'portfolio_page_id' Portfolio ID to Category for unlimited portfolio subcategories				
				foreach ($_POST as $key => $value) 
				{
					if ( preg_match("/piecemaker_text_url_/", $key) ) 
					{	
						if ($value != '') $piecemaker_text_url_items[$key] = $value;
					}	
									
					delete_option( $shortname.'_piecemaker_text_url');
					update_option( $shortname.'_piecemaker_text_url', $piecemaker_text_url_items);					

					if ( preg_match("/piecemaker_text_headline_/", $key) ) 
					{	
						if ($value != '') $piecemaker_text_headline_items[$key] = $value;
					}	
									
					delete_option( $shortname.'_piecemaker_text_headline');
					update_option( $shortname.'_piecemaker_text_headline', $piecemaker_text_headline_items);					

					
					if ( preg_match("/piecemaker_text_description_/", $key) ) 
					{	
						if ($value != '') $piecemaker_text_description_items[$key] = $value;
					}	
									
					delete_option( $shortname.'_piecemaker_text_description');
					update_option( $shortname.'_piecemaker_text_description', $piecemaker_text_description_items);										
				}
				
                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if ( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_menu_page($themename, $themename, 'edit_themes', basename(__FILE__), 'theme_update');
}

/* Function admin_theme*/
function theme_update() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) {	echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>'; }
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';   

	require_once( TEMPLATEPATH . '/lib/admin/theme-update.php');

}
add_action('admin_menu', 'admin_update_theme');	
?>