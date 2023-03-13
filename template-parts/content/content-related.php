<?php
/**
 * Template part for displaying single blog related posts
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

$moviewp_similar = get_option('moviewppanel_similar'); 
if ($moviewp_similar == 1) { 
if ( is_post_template( 'tv.php' ) ) {
$exclude = -2;
} else { 
$exclude = -1;
} 
$related_query = new WP_Query(array(
 'post_type' => 'post',
 'cat'=> $exclude,
 'category__in' => wp_get_post_categories(get_the_ID()),
 'post__not_in' => array(get_the_ID()),
 'posts_per_page' => 10,
 'post_status' => 'publish',
 'orderby' => 'rand',
 'no_found_rows' => true,
 'ignore_sticky_posts' => true,
));
if ($related_query->have_posts()) { 
?>
<section class="similar">
	<h4><?php echo related; ?></h4>
	<ul>
		<?php while ($related_query->have_posts()) {
		$related_query->the_post(); ?>
		
		<li id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink() ?>">
				<img class="lazy" src="<?php echo placeholder; ?>" data-src="<?php echo poster370(); ?>" alt="<?php the_title(); ?>">
			</a>
		</li><!-- #post-<?php the_ID(); ?> -->
		<?php } ?>
	</ul>
</section><!-- .similar -->
<?php 
	wp_reset_postdata(); 
  }
}