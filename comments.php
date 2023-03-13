<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
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

$moviewp_comments = get_option('moviewppanel_comments'); 
if ($moviewp_comments == 1) { 
?>

<div id="disqus_thread"></div>
<?php } else { ?>
<?php if ( post_password_required() ) { return; } ?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>
		<h4 class="comments-title"><?php comments_number(esc_html__('No Comments', 'moviewp'), esc_html__('1 Comment', 'moviewp'), '% ' . esc_html__('Comments', 'moviewp') ); ?></h4>
		<span class="title-line"></span>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'avatar_size' => 60, 'style' => 'ul', 'callback' => 'moviewp_comments', 'type' => 'all' ) ); ?>
		</ol>
		<?php the_comments_pagination( array( 'prev_text' => '<i class="fa fa-angle-left"></i> <span class="screen-reader-text">' . esc_html__( 'Previous', 'moviewp') . '</span>', 'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'moviewp') . '</span> <i class="fa fa-angle-right"></i>', ) ); ?>
	<?php } ?>
	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'moviewp'); ?></p>
	<?php } ?>
	<?php comment_form(); ?>
</div>
<?php } ?>

