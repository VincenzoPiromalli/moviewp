<?php
/**
 * Template part for displaying single items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
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

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'item normal' ); ?>>
	<a href="<?php the_permalink() ?>" rel="bookmark">
		<div class="item-flip">
			<div class="item-inner">
				<?php echo itemQuality(); ?>
				<?php echo itemTV(); ?>
		<span class="movierating movierating<?php echo movieRating(); ?>"><?php echo ProgressValue(); ?></span>
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
