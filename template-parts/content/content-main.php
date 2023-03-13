<?php
/**
 * Template part for displaying page content in index.php
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
if (!defined('ABSPATH'))
{
    exit;
}
 
echo '<section id="content" class="inner-container">';
echo Notice();
echo '<div class="item-container">';
// The Query
global $wp_query;
//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ( get_query_var( 'paged' ) ) {
    $paged = absint( get_query_var( 'paged' ) );
} elseif ( get_query_var( 'page' ) ) {
    $paged = absint( get_query_var( 'page' ) );
} else {
    $paged = 1;
}
$args = array(
    'orderby' => 'post_date', 
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
);

if (!isset($_GET['order'])) {
    $_GET['order'] = '';
} 
if ($_GET['order'] == 'views') {
    $args['meta_key'] = 'post_views_count';
    $args['orderby'] = 'meta_value_num';
} 
if ($_GET['order'] == 'like') {
    $args['meta_key'] = '_post_like_count';
    $args['orderby'] = 'meta_value_num';
} 
if ($_GET['order'] == 'comments') {
    $args['orderby'] = 'comment_count';
} 
if ($_GET['order'] == 'rating') {
    $args['meta_key'] = 'imdbRating';
    $args['orderby'] = 'meta_value_num';
} 
if ($_GET['order'] == 'years-desc') {
    $args['meta_key'] = 'release_date';
    $args['orderby'] = 'meta_value_num';
} 
if ($_GET['order'] == 'years-asc') {
    $args['meta_key'] = 'release_date';
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'ASC';
} 
if ($_GET['order'] == 'title-asc') {
    $args['orderby'] = 'title';
    $args['order'] = 'ASC';
} 
if ($_GET['order'] == 'title-desc') {
    $args['orderby'] = 'title';
} 
if ($_GET['order'] == 'date-desc') {
    $args['orderby'] = 'post_date';
} 
if ($_GET['order'] == 'date-asc') {
    $args['orderby'] = 'post_date';
    $args['order'] = 'ASC';
    
} 

if ($_GET['order'] == 'random') {
    $args['orderby'] = 'rand';
} 

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) : 

//the loop

while ( $loop->have_posts() ) : $loop->the_post();

get_template_part( 'template-parts/content/content', 'loop' );

endwhile;
// end of the loop 

if ($_GET['order'] == 'random') {

// no paging

} else {

pagination();

}
 // reset query
wp_reset_query();
wp_reset_postdata();

else :
echo '<p>';
esc_html_e( 'Sorry, no posts matched your criteria.', 'moviewp' );
echo '</p>';

endif; 
echo '</div>';
echo '</section>';
