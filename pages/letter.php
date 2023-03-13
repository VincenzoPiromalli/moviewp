<?php
/**
 * Template Name: letter
 * 
 * Template part for displaying letter page content in letter.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * ----------------------------------------------------
 * @author: fr0zen
 * @author URI: https://fr0zen.store
 * @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
 * ----------------------------------------------------
 * 
 * 
 * @since 3.8.7
 * 20 May 2022
 */
	
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (!isset($_GET['ap'])) {
    $_GET['ap'] = '';
} 

get_header(); ?>

<section id="content" class="inner-container">
	<div class="item-container">
		<?php
			global $wpdb;
			global $wp_query;
			$first_char = esc_attr($_GET['ap']);
			$postids = $wpdb->get_col($wpdb->prepare("
			SELECT      ID
			FROM        $wpdb->posts
			WHERE       SUBSTR($wpdb->posts.post_title,1,1) = %s
			AND 		$wpdb->posts.post_type = 'post'
			ORDER BY    $wpdb->posts.post_title",$first_char));
			
			if ( $postids ) {
				
				$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
				
				$args = array(
				'post__in' => $postids,
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => get_option('posts_per_page'),
				'paged' => $paged,
				);
				
				$my_query = null;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					//$counter = 1;
					while ($my_query->have_posts()) : $my_query->the_post();
					get_template_part('template-parts/content/content', 'loop');
					endwhile;
				}
				
				echo '<div class="infinite">';
				echo '<div class="pagination">';
				previous_posts_link( __( 'Prev', 'moviewp' ) );
				next_posts_link( __( 'Next', 'moviewp' ), $my_query->max_num_pages );
				echo '</div>';
				echo '<div class="resppages">';
				previous_posts_link('<span class="fa fa-caret-left"></span>');
				next_posts_link(( '<span class="fa fa-caret-right"></span>' ), $my_query->max_num_pages );
				echo '</div>';
				echo '</div>';
				
				wp_reset_query();
				wp_reset_postdata(); 
				
				} else {
				
				echo '<p>';
				echo txtnoletter;
                echo '</p>';
			}
		?>
	</div>
</section>
<?php get_footer(); ?>