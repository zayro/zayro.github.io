<?php
// function excerpt_content
function excerpt_content($text, $excerpt_length, $rem_paragraph) {
	$text = get_the_content('');
	$text = preg_replace('#(<[/]?img.*>)#U', '', $text);	
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
	$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
	if ($rem_paragraph) { $text = strip_tags($text, '<p>'); $text = strip_tags($text, '</p>'); }
	$text = str_replace('<p>-', '<p>&#151;',$text);
	$words = explode(' ', $text, $excerpt_length + 1);
	if (count($words)> $excerpt_length) {
		array_pop($words);
		array_push($words, '...');
		$text = implode(' ', $words);
	}
	return $text;
}					

// fisplay categories function					
function display_categories($shortname,$page_id) {

	//get selected page_id for portfolio
	$get_custom_options = get_option($shortname.'_portfolio_page_id'); 
	$get_page_id  = $get_custom_options['portfolio_to_cat_'.$page_id];
	
	//get category name
	$get_category_name = get_option($shortname.'_portfolio_categories_'.$page_id);
	
	$output = '';
	$output .= '<select name="portfolio_to_cat_'.$page_id.'" class="postform selector">';	
	$output .= '<option value="0">&nbsp;&nbsp;&nbsp;Select category</option>';	
	$categories = get_categories();			
	foreach ($categories as $cat) 
	{
		$selected_option = $cat->cat_ID;
		if ($get_page_id == $selected_option) { 
			$output .= '<option selected value="'.$cat->cat_ID.'">&nbsp;&nbsp;&nbsp;'.$cat->cat_name.'</option>';
		} else {
			$output .= '<option value="'.$cat->cat_ID.'">&nbsp;&nbsp;&nbsp;'.$cat->cat_name.'</option>';
		}	
	}	
	$output .= '</select>';	
	
	return $output;
}

// check if is portfolio page template function
function is_pagetemplate_portfolio($pagetemplate = '') {
	global $wpdb;
	global $shortname;
	$output = '';
	$output .= '<table><tr><td colspan="3"><small>To show from all categories leave "Select category"</small></td></tr>';
	$sql = "select post_id from $wpdb->postmeta where meta_key like '_wp_page_template' and meta_value like '" . $pagetemplate . "'";
	$result = $wpdb->get_results($sql);
	foreach ($result as $value){
		$page_id = $value->post_id;
		$page_data = get_page( $page_id );
		$title = $page_data->post_title; 
		$output .=  '<tr><td>Page <strong>'.$title.'</strong></td><td>&nbsp;:&nbsp;</td><td>'.display_categories($shortname,$page_id).'</td></tr>';
	}
	$output .= '</table>';
	
	return $output;
}
?>