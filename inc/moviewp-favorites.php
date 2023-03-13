<?php
/*
* ----------------------------------------------------
* @author: fr0zen
* @author URI: https://fr0zen.store
* @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
* ----------------------------------------------------
* @since 3.8.7
* 20 May 2022
*/

/*====================================*\
	function favorites
\*====================================*/

$moviewp_favorites = get_option('moviewppanel_favorites');
if ($moviewp_favorites == 1) { 
function enqueue_favorite(){
if ( is_singular( 'article' ) ) {
	
} elseif ( is_page( 'collection' ) ) {

} elseif ( is_page( 'networks' ) ) {

} elseif ( is_singular() ) {
//if ( is_singular() ) {
    if( !is_page('favorites') ){ // prevent this script from loading if user is on favorite movies page 
	  wp_enqueue_script( 'moviewp-favorite', get_template_directory_uri() . '/assets/js/moviewp-favorite.js', array(), wp_get_theme()->get( 'Version' ), true);
    }
} 
} 
add_action('wp_enqueue_scripts' ,'enqueue_favorite');
//get_template_part('inc/moviewp-ajax-favorite');
//require_once( wp_normalize_path( get_template_directory() . '/inc/moviewp-ajax-favorite.php' ) );

function my_ajax_scripts(){

    if( is_page('favorites') ){ //script is only loaded on favorites page
		wp_enqueue_script( 'moviewp-ajax-favorite', get_template_directory_uri() . '/assets/js/moviewp-ajax-favorite.js', array(), wp_get_theme()->get( 'Version' ), true);
        wp_localize_script('moviewp-ajax-favorite', 'moviewpFavorites', array('ajax_url' => admin_url('admin-ajax.php') ) );
    }
}
add_action('wp_enqueue_scripts', 'my_ajax_scripts');

function display_fav_movies(){ 

    if( !empty($_POST['favorite_movies_list']) ){

        $loop = new WP_Query( array( 
            'post_type' => 'post',
			'post_status' => 'publish',
            'nopaging' => true,
            'no_found_rows' => true,
            'ignore_sticky_posts' => true,
            'post__in' => $_POST['favorite_movies_list'] 
        )); 
        
		$fav_movies_page = 1;

		if ($loop->have_posts()) {
			while ($loop->have_posts()) {
				$loop->the_post();
				get_template_part('template-parts/content/content', 'loop');
			}
		}
	} else {
		echo false;
	}
	wp_die();
}
add_action('wp_ajax_display_fav_movies', 'display_fav_movies');
add_action('wp_ajax_nopriv_display_fav_movies', 'display_fav_movies');
}