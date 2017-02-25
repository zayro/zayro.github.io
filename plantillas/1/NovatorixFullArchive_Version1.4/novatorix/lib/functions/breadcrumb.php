<?php
function get_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo get_option('home');
		echo '">Home</a> &raquo; ';
		if (is_category() || is_single()) {
			/*$category = get_the_category();
			$category_name = $category[0]->cat_name;
			$category_link =  get_category_link( $category[0]->cat_ID );
			echo '<a href="'.$category_link.'">'.$category_name.'</a>';*/
			the_category(' / ');
			if (is_single()) {
				echo " &raquo; ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}
?>