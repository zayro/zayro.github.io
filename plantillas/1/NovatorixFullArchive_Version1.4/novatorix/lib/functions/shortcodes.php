<?php
/**
 * Theme Shortcodes Functions
*/

 
/* highlight, highlight2 shortcode functions */
function theme_highligt($atts, $content = null) {
	return '<span class="highlight">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight','theme_highligt');

function theme_highligt2($atts, $content = null) {
	return '<span class="highlight2">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight2','theme_highligt2');


/* blockquote function */
function theme_blockquote($atts, $content = null) {
	return '<blockquote><p>'.do_shortcode($content).'</p></blockquote>';
}
add_shortcode('blockquote','theme_blockquote');


/* images align left, right shortcode functions*/
function theme_image_left( $atts, $content = null ) {
   return '<span class="alignleft"><img src="' . do_shortcode(str_replace('&#215;','x',$content)) . '" /></span>';
}
add_shortcode('image_left', 'theme_image_left');

function theme_image_right( $atts, $content = null ) {
   return '<span class="alignright"><img src="' . do_shortcode(str_replace('&#215;','x',$content)) . '" /></span>';
}
add_shortcode('image_right', 'theme_image_right');


/* button shortcode function */
function theme_button($atts) {
    extract(shortcode_atts(array(
        'text'     => 'Your Text',
        'url'    => '',
        'p'        => 'true',
        'target'    => ''
    ), $atts));
    
    if($target=='_blank') $target='target="_blank"'; 
    if($p!='false') :
    	return ('<a href="'.$url.'" '.$target.'><input name="submit" type="submit" id="submit" value="'.$text.'" /></a>');
    else :
    	return '<p><a href="'.$url.'" '.$target.'><input name="submit" type="submit" id="submit" value="'.$text.'" /></a></p>';
    endif;
}
add_shortcode('button', 'theme_button');

/* dropcap shortcode function */
function theme_dropcap($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => '',
		"fontsize" => '40'
    ), $atts));

	if ($id) { $dropcap_id = ' id="'.$id.'"'; }
	return '<span'.$dropcap_id.' class="dropcap" style="font-size:'.$fontsize.'px; line-height:'.($fontsize-10).'px;">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'theme_dropcap');
?>