<?php
/**
 * Template part for displaying page content in page.php
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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section id="content">
		<div class="inner-container">
			<?php the_title( '<h3 style="font-weight: 700;">', '</h3>' );?>
			<p><?php the_content(); ?></p>
			<?php wp_link_pages(); ?>
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->