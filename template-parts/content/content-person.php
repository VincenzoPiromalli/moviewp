<?php
/**
 * Template part for displaying taxonomy actors, directors and creators posts
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
			</div>
			<div class="movie-info">
				<h1 class="entry-title"><?php single_term_title(); ?><span></span></h1>
				<div class="movie-data">
					<div class="details">
					</div>
				</div>
				<div class="plot"></div>
				<div class="actors">
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="actor">
						<a href="<?php the_permalink() ?>">
							<img src="<?php echo poster370(); ?>" alt="<?php the_title(); ?>">
						</a>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php get_template_part('template-parts/actions/actions', 'person'); ?>
			<div id="disqus_thread"></div>
		</div>
		<div id="slideshow">
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
