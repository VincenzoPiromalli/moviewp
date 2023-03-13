<?php
/**
 * Template part for displaying tv posts
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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section id="content">
		<div class="inner-container">
			<div class="movie-image">
				<?php 
					echo Favorite();
					echo SinglePosterTV();
				?>
			</div>
			<div class="movie-info">
				<span class="rating">
					<div class="progress progress-circle" data-percentage="<?php echo DataPercentage(); ?>">
						<span class="progress-left">
							<span class="progress-bar progress-<?php echo ProgressBar(); ?>">
							</span>
						</span>
						<span class="progress-right">
							<span class="progress-bar progress-<?php echo ProgressBar(); ?>">
							</span>
						</span>
						<span class="progress-value"><?php echo ProgressValue(); ?></span>
					</div>
				</span>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<em class="tagline"></em>
				<div class="movie-data">
					<div class="details">
						<?php echo SingleCertification(); ?>
						<?php echo SingleNetwork(); ?>
						<?php echo SingleYear(); ?>
						<?php echo SingleGenre(); ?>
						<?php echo SingleRuntime(); ?>
						<span class="stato"></span>
						<?php edit_post_link('<span>edit</span>'); ?>
					</div>
				</div>
				<p class="movie-description">
					<?php echo TvPlot(); ?>
				</p>
			</div>
			<?php get_template_part( 'template-parts/actions/actions' ); ?>
			<?php echo SingleTvDetails(); ?>
			<?php get_template_part( 'template-parts/content/content', 'related' ); ?>
			<?php comments_template(); ?>
		</div>
		<div id="slideshow">
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
