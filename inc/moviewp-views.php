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

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//function Ajax PostViews (works also with cache enabled)

$moviewp_postviews = get_option('moviewppanel_postviews');
if ($moviewp_postviews == 1) {

// function to get views.
function getPostViews($postID){
	global $post;
	if( empty($postID) ) $postID = $post->ID ;
	
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	$count = @number_format($count);
    if( empty($count) ){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0 );
        $count = 0;
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
	global $post;
	$count = 0;
	$postID = $post->ID ;
    $count_key = 'post_views_count';
    $count = (int)get_post_meta($postID, $count_key, true);
		$count++;
		update_post_meta($postID, $count_key, (int)$count);
}


// Function: Calculate Post Views With CACHE Enabled
add_action('wp_enqueue_scripts', 'postview_cache_count_enqueue');
function postview_cache_count_enqueue() {
	global $post;
	if ( is_single() ) {
		// Enqueue and localize script here
		wp_register_script( 'postviews-cache', get_template_directory_uri() . '/assets/js/postviews-cache.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
		wp_localize_script( 'postviews-cache', 'viewsCacheL10n', array(
		'ajaxurl' => admin_url('admin-ajax.php', (is_ssl() ? 'https' : 'http')), 
		'post_id' => intval($post->ID),
		//'nonce' => wp_create_nonce( 'postviews-nonce' ),
		'textviews' => ' '.mostwatched.'',
		));
		wp_enqueue_script ( 'postviews-cache');
	}
}

// Function: Increment Post Views
add_action('wp_ajax_postviews', 'increment_views');
add_action('wp_ajax_nopriv_postviews', 'increment_views');
function increment_views() {
	//if ( !wp_verify_nonce( $_REQUEST['nonce'], "postviews-nonce")) {
        //exit( __( 'Not permitted', 'moviewp' ) );
    //}
	global $wpdb;
	if(!empty($_GET['postviews_id']))
	{
		$post_id = intval($_GET['postviews_id']);
		if($post_id > 0 ) {
			$count = 0;
			$count_key = 'post_views_count';
			$count = (int)get_post_meta($post_id, $count_key, true);

			$count++;
			update_post_meta($post_id, $count_key, (int)$count);

			echo $count;
		}
	}
	exit();
}


// Function Show Post Views Column in WP-Admin
add_action('manage_posts_custom_column', 'add_postviews_column_content');
add_filter('manage_posts_columns', 'add_postviews_column');
add_action('manage_pages_custom_column', 'add_postviews_column_content');
add_filter('manage_pages_columns', 'add_postviews_column');
function add_postviews_column($defaults) {
	$defaults['views'] = __( 'Views', 'moviewp' );
	return $defaults;
}

// Functions Fill In The Views Count
function add_postviews_column_content($column_name) {
	if ($column_name === 'views' ) {
		echo getPostViews(get_the_ID());
	}
}

// Function Sort Columns
add_filter( 'manage_edit-post_sortable_columns', 'sort_postviews_column');
add_filter( 'manage_edit-page_sortable_columns', 'sort_postviews_column' );
function sort_postviews_column( $defaults ) {
	$defaults['views'] = 'views';
	return $defaults;
}
add_action('pre_get_posts', 'sort_postviews');
function sort_postviews($query) {
	if ( ! is_admin() ) {
		return;
	}
	$orderby = $query->get('orderby');
	if ( 'views' === $orderby ) {
		$query->set( 'meta_key', 'post_views_count' );
		$query->set( 'orderby', 'meta_value_num' );
	}
  }

}