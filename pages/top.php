<?php
/**
 * Template Name: top
 * 
 * Template part for displaying top page in top.php
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

get_header(); ?>

<section id="content" class="inner-container">
	<div class="item-container">
		<?php query_posts(
			array(
			'meta_key' => 'end_time',
			'meta_compare' =>'>=',
			'meta_value'=>time(),
			'meta_key' => 'imdbRating',
			'post_type' => 'post',
			'post_status' => 'publish',
			'post__not_in' => get_option( 'sticky_posts' ),
			'orderby' => 'meta_value_num',
			'showposts' => get_option('posts_per_page'),
			'order' => 'DESC',
			'no_found_rows' => true
			));
			while ( have_posts() ) : the_post(); 
			$imdbRating = get_post_meta($post->ID, "imdbRating", $single = true); 
			$postId = get_the_ID();
			$allPosts = get_posts(array(
			'fields' => 'ids',
			'meta_key' => 'end_time',
			'meta_compare' =>'>=',
			'meta_value'=>time(),
			'meta_key' => 'imdbRating',
			'post_type' => 'post',
			'post_status' => 'publish',
			'showposts' => get_option('posts_per_page'),
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'no_found_rows' => true
			));
			$postNumber = array_search($postId, $allPosts) + 1;
		?>
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'item normal' ); ?>>
			<a href="<?php the_permalink() ?>" rel="bookmark">
				<div class="item-flip">
					<div class="item-inner">
						<span class="top-number"><?php echo $postNumber; ?><i></i></span>
						<?php echo itemQuality(); ?>
						<?php echo itemTV(); ?>
						<span class="movierating movierating<?php echo movieRating(); ?>"><?php echo ProgressValue(); ?><?php //echo $postNumber; ?></span>
						<img class="lazy" loading="lazy" src="<?php echo placeholder; ?>" data-src="<?php echo poster370(); ?>" alt="<?php the_title(); ?>">
					</div>
					<div class="item-details">
						<div class="item-details-inner">
							<?php the_title( '<h2 class="movie-title">', '</h2>' ); ?>
							<p class="movie-description"><?php SinglePlot('500'); ?></p>
							<div class="watch-btn">
								<?php echo listCert(); ?>
								<?php echo SingleNetworkList(); ?>
								<?php echo itemRating(); ?>
								<?php echo itemYear(); ?>
								<?php echo itemGenreList(); ?>
								<?php echo SingleRuntimeList(); ?>
								<span class="play"><?php echo play; ?></span>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div><!-- #post-<?php the_ID(); ?> -->
		<?php endwhile; wp_reset_query(); ?>
	</div>
</section>
<?php get_footer(); ?>