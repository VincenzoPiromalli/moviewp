<?php
/**
 * Template part for displaying archive pages.
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

echo '<section id="content" class="inner-container">';
echo '<div class="item-container">';
if ( have_posts() ) :
// Load posts loop.
while ( have_posts() ) : the_post();
get_template_part('template-parts/content/content', 'loop');
endwhile;
endif;
pagination(); 
echo '</div>';
echo '</section>';
