<div class="wrap">

<?php screen_icon('options-general'); ?>
<h2><?php echo $themename; ?> settings</h2>
<?php
// display which page will show blog posts
function display_blog_content($values_id,$shortname,$blog_or_news)
{
	$get_blog_name = get_option($shortname.'_blog_page');
	
	echo '<select name="'.$values_id.'" class="postform selector">';	
	echo '<option value="0">Select Page</option>';		
	global $post;
	$myposts = get_pages();
	foreach($myposts as $post) : setup_postdata($post);
		$selected_option = $post->ID;		
		if ( $get_blog_name == $selected_option ) { 
		?>
			<option selected value='<?php echo $post->ID; ?>'>&nbsp;&nbsp;&nbsp;<?php the_title(); ?></option>";
		<?php	
		}
		if ( $get_blog_name != $selected_option ) { 
		?>
			<option value='<?php  echo $post->ID; ?>'>&nbsp;&nbsp;&nbsp;<?php the_title(); ?></option>";
		<?php 
		}
	endforeach;
	echo '</select>';	
}

// display portfolio pages by category
function display_portfolio_pages($values_id, $shortname, $portfolio_number)
{
	$get_page_name = get_option($shortname.'_portfolio_pages_'.$portfolio_number);
	
	echo '<select name="'.$values_id.'" class="postform selector">';	
	echo '<option value="0">Select Page</option>';		
	global $post;
	$myposts = get_pages();
	foreach($myposts as $post) : setup_postdata($post);
		$selected_option = $post->ID;		
		if ( $get_page_name == $selected_option ) { 
		?>
			<option selected value='<?php echo $post->ID; ?>'>&nbsp;&nbsp;&nbsp;<?php the_title(); ?></option>";
		<?php	
		}
		if ( $get_page_name != $selected_option ) { 
		?>
			<option value='<?php  echo $post->ID; ?>'>&nbsp;&nbsp;&nbsp;<?php the_title(); ?></option>";
		<?php 
		}
	endforeach;
	echo '</select>';	
}


function display_portfolio_categories($values_id,$shortname,$portfolio_number) {
	$get_category_name = get_option($shortname.'_portfolio_categories_'.$portfolio_number);

	echo '<select name="'.$values_id.'_to_cat" class="postform selector">';	
	echo '<option value="0">&nbsp;&nbsp;&nbsp;Select category</option>';	
	$categories = get_categories();			
	foreach ($categories as $cat) 
	{
		$selected_option = $cat->cat_ID;
		if ($get_gallery_name == $selected_option) { 
		?>
		
			<option selected value='<?php echo $cat->cat_ID; ?>'>&nbsp;&nbsp;&nbsp;<?php echo $cat->cat_name; ?></option>			
		<?php
		} else {
		?>
		
			<option value='<?php echo $cat->cat_ID; ?>'>&nbsp;&nbsp;&nbsp;<?php echo $cat->cat_name; ?></option>
		<?php 
		}	
	};			
	echo '</select>';	
}

/* Exclude Blog Categories */
function exclude_categories($values_id,$shortname)
{
	$get_custom_options = get_option($shortname.'_exclude_categories');
	
	$cat_items = explode(',',$get_custom_options);
	$count_cat = count($cat_items);
	foreach($cat_items as $cat_item){
		$cat_item_list[] = $cat_item;
	}

	$categories = get_categories('hide_empty=0');
	foreach($categories as $cat)
	{
		$checked_cat = '';
		for($i=0;$i<$count_cat;$i++)
		{
			if ($cat_item_list[$i] == $cat->cat_ID) { $checked_cat = 'checked="yes"'; }
		}
		$n = $n + 1;
		if ($n == 10) { echo '<br>'; $n = 1;}
		echo $cat->cat_name ; 
		echo '<p style="display:inline; padding: 0 10px 0 3px;"><input '.$checked_cat.' onClick="ExcludeCategories('.$cat->cat_ID.');" name="'.$cat->cat_ID.'" type="checkbox" value="'.$cat->cat_name.'"/><br></p>';
	};
	
	echo '<p><input type="hidden" readonly="readonly" style="padding-top: 4px; width: 400px;"  name="'.$values_id.'" id="'.$values_id.'" value="'.$get_custom_options.'" type="text"></p>';
}


/* Exclude pages from header menu */
function exclude_pages($values_id,$shortname)
{
	$htmlselected = '';
	$get_custom_options = get_option($shortname.'_exclude_pages');
	$page_items = explode(',',$get_custom_options);
	$count_pages = count($page_items);
	foreach($page_items as $page_item){
		$page_item_list[] = $page_item;
	}

	$n = 0;
	$n2 = 777;
	global $post;
	$arguments = array(
		'child_of' =>  $n,
		'parent' => $n
	);
	
	$myposts = get_pages($arguments);
	foreach($myposts as $post) : setup_postdata($post);
		$selected_option = get_permalink($post->ID);

		$checked_page = '';
		for($i=0;$i<$count_pages;$i++)
		{
			if ($page_item_list[$i] == $post->ID) { $checked_page = 'checked="yes"'; }
		}
		$n = $n + 1;
		if ($n == 10) { echo '<br>'; $n = 1;}
		echo '<p style="display:inline; padding: 0 10px 0 3px;"><input '.$checked_page.' onClick="ExcludePages('.$post->ID.');" name="'.$post->ID.'" type="checkbox" value="'.the_title().'"/><br></p>';
	endforeach;	
	
	echo '<p><input type="hidden" readonly="readonly" style="padding-top: 4px; width: 400px;"  name="'.$values_id.'" id="'.$values_id.'" value="'.$get_custom_options.'" type="text"></p>';
}
?>

<form method="post" action="">
<?php foreach ($options as $value) { 
    	
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="800px" border="0" style="background-color:#ffffff; padding:10px;border:1px double #f1f1f1;">  
		<?php break;
		
		case "close":
		?>	
		<tr>
			<td coslapan="2">
			<p class="submit2">
				<input style="padding:5px 12px; color:#fff; font-weight: bold; background-color:#64b4ea; -moz-border-radius:5px; -webkit-border-radius:5px; border:2px solid #65bbf3; "name="save" type="submit" value="Save changes" />    
				<input type="hidden" name="action" value="save" />
			</p>
			</td>
		</tr>
        </table>
		</div>
		</div>
		<?php break;
		
		case "headline":
		?>
		<div class="slide-panel" style="width:800px; background-color:#64b4ea; padding:10px 10px; margin-bottom:15px; -moz-border-radius:10px; -webkit-border-radius:10px; border:2px solid #e3e3e3; ">
		<div style="padding-bottom:4px;"><img id="img-plus-minus" style="cursor:pointer; height:35px; padding-bootom:10px;" src="<?php echo get_bloginfo('template_url'); ?>/css/dbplus.png"> <h3 style="float:right;font-size:25px; margin:0; font-weight:bold; color:#f1f1f1; padding-top:5px; padding-bottom:10px"><?php echo $value['name']; ?></h3>
	    </div>
		<div class="options">
		<?php break;
		
		case "title":
		?>
		<table width="800px" border="0" style="background-color:#f1f1f1; padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="color:#414141"><?php echo $value['name']; ?></h3></td>
        </tr>       
		<?php break;

		case 'text':
		?>      
        <tr>
			
			
            <td width="20%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:500px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo trim(str_replace('\t','',str_replace('\\', '', get_settings( $value['id'] ) ))); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td style="padding:0 0 20px 0;"><small><?php echo $value['desc']; ?></small></td>
        </tr>

		<?php 
		break;	

		case 'numbers':
		?>      
        <tr>
            <td width="20%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:50px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td style="padding:0 0 20px 0;"><small><?php echo $value['desc']; ?></small></td>
        </tr>

		<?php 
		break;			
	
		case 'textarea':
		?>      
        <tr>
            <td width="20%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:500px; height:100px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php 
				if ( get_settings( $value['id'] ) != "") { 
					/*if (($value['id'] == $shortname.'_footer_copyright') or ($value['id'] == $shortname.'_contact_location_info')) {*/
						echo trim(str_replace('\t','',str_replace('\\', '', get_settings( $value['id'] ))));
					/*} else {
						echo get_settings( $value['id'] ); 
					}*/
				} else { 
					echo $value['std']; 
				} 
			?></textarea></td>
         </tr>
        <tr>
            <td style="padding:0 0 20px 0;"><small><?php echo $value['desc']; ?></small></td>
        </tr>

		<?php 
		break;
				
		case 'select':
		?>
		<tr>
			<td width="20%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
			<td width="80%"><select style="width:235px;" name="<?php echo $value['id']; ?>" id="<?php 
			echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php 
			if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } 
			else if (get_settings( $value['id'] ) == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
			</td>
		</tr>
		<tr>
            <td style="padding:0 0 20px 0;"><small><?php echo $value['desc']; ?></small></td>
		</tr>
		<?php
		break;
		
		case 'select_tweenType':
		?>
		<tr>
			<td width="20%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
			<td width="80%">
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
				</select>
			</td>
		</tr>
		<tr>
            <td style="padding:0 0 20px 0;"><small><?php echo $value['desc']; ?></small></td>
		</tr>
		<?php
		break;
      
		case "checkbox":
		?>
		<tr>
			<td width="20%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><?php if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
			</td>
        </tr>          
        <tr>
            <td style="padding:0 0 20px 0;"><small><?php echo $value['desc']; ?></small></td>
        </tr>
        <?php 		
		break;
		
		case "radio":
		?>
		<tr>
			<td width="20%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
			<td width="80%">
				<label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="radio" value="<?php echo $value['value']; ?>" <?php echo $selector; ?> <?php if (get_settings( $value['id']) == $value['value'] || get_settings( $value['id']) == ""){echo 'checked="checked"';}?> /> <?php echo $value['desc']; ?></label><br />
				<label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>_2" type="radio" value="<?php echo $value['value2']; ?>" <?php echo $selector; ?> <?php if (get_settings( $value['id']) == $value['value2']){echo 'checked="checked"';}?> /> <?php echo $value['desc2']; ?></label>
			</td>
		</tr>
		<tr>
            <td style="padding:0 0 20px 0;"><small><?php //echo $value['desc']; ?></small></td>
		</tr>
		<tr>
			<td colspan="2" style="margin-bottom:5px;border-bottom:0px solid #000000;">&nbsp;</td>
		</tr>
		<!--/tr-->
		<?php
		break;


		case "piecemaker_text":
			echo '<tr><td></td><td><small><i>Upload all images (width=900px, height=400px) into your theme folder <strong>/novatorix/scripts/piecemaker/images/</strong> and enter only image name (e.g. <strong>image1.jpg</strong>)</i></small></td></tr>';
			$get_images_count = get_option($shortname.'_slider_images_count');
			$get_custom_url = get_option($shortname.'_piecemaker_text_url');
			$get_custom_headline = get_option($shortname.'_piecemaker_text_headline');
			$get_custom_description = get_option($shortname.'_piecemaker_text_description');
			for($i = 1; $i <= $get_images_count; $i++) 
			{
			
					echo '					
					<tr>
					<td><h3>Image '.($i).'</h3></td><td><br>Image name<br> <input style="width: 500px;" name="'.$value['id'].'_url_'.($i).'" id="'.$value['id'].'_url_'.($i).'" 
						type="text" value="'.$get_custom_url[$shortname.'_piecemaker_text_url_'.$i].'"></td>
					</tr>
					<td></td><td><br>Headline<br> <input style="width: 500px;" name="'.$value['id'].'_headline_'.($i).'" id="'.$value['id'].'_headline_'.($i).'" 
						type="text" value="'.$get_custom_headline[$shortname.'_piecemaker_text_headline_'.$i].'"></td>
					</tr>
					<tr>
					<td>&nbsp;</td><td><br>Description<br> <textarea name="'.$value['id'].'_description_'.($i).'" style="width:500px; height:100px;" type="" cols="" rows="">'.$get_custom_description[$shortname.'_piecemaker_text_description_'.$i].'</textarea><br><br></td></tr>';
			}
		break;
		
		
		case 'solidline':
		?>
        <tr>
            <td></td>
        </tr>
		<tr>
			<td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #eee;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
		</tr>
		<?php 
		break;

		case 'exclude_pages':
		?>
        <tr>
            <td valign="top"><strong><?php echo $value['name']; ?> </strong></td>
			<td id="show_hide_pg">
				<?php exclude_pages($value['id'],$shortname); ?><small><?php echo $value['desc']; ?></small>
			</td>
        </tr>
		<tr>
			<td colspan="2" style="margin-bottom:5px;border-bottom:0px solid #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
		</tr>
		<?php 
		break;

		case 'exclude_categories':
		?>
        <tr>
            <td valign="top"><strong><?php echo $value['name']; ?> </strong>
			</td>
			<td id="show_hide_pg">
				<?php exclude_categories($value['id'],$shortname); ?><small><?php echo $value['desc']; ?></small>
			</td>
        </tr>
		<tr>
			<td colspan="2" style="margin-bottom:5px;border-bottom:0px solid #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
		</tr>
		<?php 
		break;
		
		case 'blog_page':
		?>        
        <tr>
            <td>
				<strong><?php echo $value['name']; ?></strong>
			</td>
			<td><?php display_blog_content($value['id'],$shortname,'blog'); ?>
				<br><small><?php echo $value['desc']; ?></small>
			</td>
        </tr>
		<tr>
			<td colspan="2" style="margin-bottom:0px;border-bottom:0px solid #eee;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
		</tr>
		<?php 
		break;	
	
		case "portfolio_add":
		?>
		<tr>
            <td colspan="2">
				<strong><?php echo $value['name']; ?></strong>
				<!--br><small><?php echo $value['desc']; ?></small-->	
			</td>
        </tr>
		<tr>
			<td colspan="2"><?php echo is_pagetemplate_portfolio('portfolio-template%'); ?></td>
		</tr>
		<?php
		break;		
		
		
case "radio_sliders":
		?>
		<tr>
			<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
			<td width="80%">
				<label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>_1" type="radio" value="<?php echo $value['value1']; ?>" <?php echo $selector; ?> <?php if (get_settings( $value['id']) == $value['value1']){echo 'checked="checked"';}?> /> <?php echo $value['desc1']; ?></label><br />
				<label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>_2" type="radio" value="<?php echo $value['value2']; ?>" <?php echo $selector; ?> <?php if (get_settings( $value['id']) == $value['value2']){echo 'checked="checked"';}?> /> <?php echo $value['desc2']; ?></label><br />
				<label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>_3" type="radio" value="<?php echo $value['value3']; ?>" <?php echo $selector; ?> <?php if (get_settings( $value['id']) == $value['value3']){echo 'checked="checked"';}?> /> <?php echo $value['desc3']; ?></label><br />
			</td>
		</tr>
		<tr>
			<td><small><?php //echo $value['desc']; ?></small></td>
        </tr>
		<tr>
			<td colspan="2" style="margin-bottom:5px;border-bottom:0px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
		</tr>
		<!--/tr-->
		<?php
		break;	
		
} 
}
?>

<p class="submit">
	<input name="save" type="submit" value="Save changes" />    
	<input type="hidden" name="action" value="save" />
</p>
</form>

<form method="post">
	<p class="submit">
		<input name="reset" type="submit" value="Reset" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
