<?php
/*
* ----------------------------------------------------
* @author: fr0zen
* @author URI: https://fr0zen.store
* @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
* ----------------------------------------------------
* @since 3.8.7
* 20 May 2022
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*====================================*\
	function comments
\*====================================*/

function moviewp_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	    
		<div class="comment-wrap">
			<div class="comment-img">
				<?php echo get_avatar($comment,$args['avatar_size'],null,null,array('class' => array('img-responsive', 'img-circle') )); ?>
			</div>
			<div class="comment-body">
				<h4 class="comment-author"><?php echo get_comment_author_link(); ?></h4>
				<span class="comment-date"><?php printf(__('%1$s at %2$s', 'moviewp'), get_comment_date(),  get_comment_time()) ?></span>
				<?php if ($comment->comment_approved == '0') { ?><em class="awaiting"><i class="fa fa-spinner fa-spin"></i> <?php _e('Comment awaiting approval', 'moviewp'); ?></em><br /><br /><?php } ?>
				<?php comment_text(); ?>
				<span class="comment-reply"> <?php comment_reply_link(array_merge( $args, array('reply_text' => __('<i class="fa fa-reply"></i>', 'moviewp'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?></span>
			</div>
		</div>
<?php }

$moviewp_comments = get_option('moviewppanel_comments'); 
if ($moviewp_comments == 1) { } else { 

// Enqueue comment-reply

add_action('wp_enqueue_scripts', 'moviewp_public_scripts');

function moviewp_public_scripts() {
    if (!is_admin()) {
        if (is_singular() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
    }
  }
} 
