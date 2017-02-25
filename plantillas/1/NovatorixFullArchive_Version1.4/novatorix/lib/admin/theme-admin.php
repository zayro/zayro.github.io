<?php
/**
 * @package WordPress
 * @subpackage Novatorix
*/

automatic_feed_links();

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 46, 36, true ); 
add_image_size( 'popularposts', 50, 50, true ); 
add_image_size( 'wide', 590, 190, true ); 
add_image_size( 'square', 270, 220, true ); 
add_image_size( 'rectangle', 450, 250, true ); 	

function dp_recent_comments($no_comments = 5, $comment_len = 20) {
    global $wpdb;
	$request = "SELECT * FROM $wpdb->comments";
	$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''";
	$request .= " ORDER BY comment_date DESC LIMIT $no_comments";
	$comments = $wpdb->get_results($request);
	if ($comments) {
		foreach ($comments as $comment) {
			ob_start();
			?>
				<li>
					<a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>"><?php echo dp_get_author($comment); ?></a>
					<?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $comment_len)); ?> ...
				</li>
			<?php
			ob_end_flush();
		}
	} else {
		echo '<li>'.__('No comments', 'banago').'';
	}
}

function dp_get_author($comment) {
	$author = "";
	if ( empty($comment->comment_author) )
		$author = __('Anonymous', 'banago');
	else
		$author = $comment->comment_author;
	return $author;
}

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
     <?php echo get_avatar($comment,$size='50',$default='' ); ?>

      <div class="comment-content">      
      	
      	<div class="comment-author vcard">
    	    <?php printf(__('<cite class="fn">%s</cite> '), get_comment_author_link()) ?>
	      	<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
      	</div>
      	<?php if ($comment->comment_approved == '0') : ?>
         <p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
      	<?php endif; ?>
      	<?php comment_text() ?>
      </div>            
      	
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }
?>