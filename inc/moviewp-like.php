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

$moviewp_likes = get_option('moviewppanel_likes');
if ($moviewp_likes == 1) { 

add_action( 'wp_enqueue_scripts', 'sl_enqueue_scripts' );
function sl_enqueue_scripts() {
if ( is_singular( 'article' ) ) {
	
} elseif ( is_page( 'collection' ) ) {

} elseif ( is_page( 'networks' ) ) {

} elseif ( is_single() ) {
//if ( is_single() ) {
    wp_enqueue_script( 'simple-likes-public', get_template_directory_uri() . '/assets/js/simple-likes-public.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_localize_script( 'simple-likes-public', 'simpleLikes', array(
		'ajaxurl' => admin_url('admin-ajax.php', (is_ssl() ? 'https' : 'http')),
		'nonce' => wp_create_nonce( 'simple-likes-nonce' ),
		'like' => __( 'Like', 'moviewp' ),
		'unlike' => __( 'Unlike', 'moviewp' )
	) ); 
 }
}

/**
 * Processes like/unlike
 * @since    0.5
 */
add_action( 'wp_ajax_nopriv_process_simple_like', 'process_simple_like' );
add_action( 'wp_ajax_process_simple_like', 'process_simple_like' );
function process_simple_like() {
	// Security
	$nonce = isset( $_REQUEST['nonce'] ) ? sanitize_text_field( $_REQUEST['nonce'] ) : 0;
	if ( !wp_verify_nonce( $nonce, 'simple-likes-nonce' ) ) {
		exit( __( 'Not permitted', 'moviewp' ) );
	}
	// Test if javascript is disabled
	$disabled = ( isset( $_REQUEST['disabled'] ) && $_REQUEST['disabled'] == true ) ? true : false;
	// Test if this is a comment
	$is_comment = ( isset( $_REQUEST['is_comment'] ) && $_REQUEST['is_comment'] == 1 ) ? 1 : 0;
	// Base variables
	$post_id = ( isset( $_REQUEST['post_id'] ) && is_numeric( $_REQUEST['post_id'] ) ) ? $_REQUEST['post_id'] : '';
	$isrefresh = ( isset( $_REQUEST['isrefresh'] ) && $_REQUEST['isrefresh'] == 1 ) ? true : false;
	$response = array();
	$post_users = NULL;
	$like_count = 0;
	// Get plugin options
	if ( $post_id != '' ) {
	    $count = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_comment_like_count", true ) : get_post_meta( $post_id, "_post_like_count", true ); // like count
        $count = ( isset( $count ) && is_numeric( $count ) ) ? $count : 0;
	    if ( $isrefresh ) {
	        $response['count'] = get_like_count( $count );
    		//$response['icon'] = get_unliked_icon();
	    }
	    else {
    		if ( !already_liked( $post_id, $is_comment ) ) { // Like the post
    			if ( is_user_logged_in() ) { // user is logged in
    				$user_id = get_current_user_id();
    				$post_users = post_user_likes( $user_id, $post_id, $is_comment );
    				if ( $is_comment == 1 ) {
    					// Update User & Comment
    					$user_like_count = get_user_option( "_comment_like_count", $user_id );
    					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
    					update_user_option( $user_id, "_comment_like_count", ++$user_like_count );
    					if ( $post_users ) {
    						update_comment_meta( $post_id, "_user_comment_liked", $post_users );
    					}
    				} else {
    					// Update User & Post
    					$user_like_count = get_user_option( "_user_like_count", $user_id );
    					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
    					update_user_option( $user_id, "_user_like_count", ++$user_like_count );
    					if ( $post_users ) {
    						update_post_meta( $post_id, "_user_liked", $post_users );
    					}
    				}
    			} else { // user is anonymous
    				$user_ip = sl_get_ip();
    				$post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
    				// Update Post
    				if ( $post_users ) {
    					if ( $is_comment == 1 ) {
    						update_comment_meta( $post_id, "_user_comment_IP", $post_users );
    					} else { 
    						update_post_meta( $post_id, "_user_IP", $post_users );
    					}
    				}
    			}
    			$like_count = ++$count;
    			$response['status'] = "liked";
    			//$response['icon'] = get_liked_icon();
    		} else { // Unlike the post
    			if ( is_user_logged_in() ) { // user is logged in
    				$user_id = get_current_user_id();
    				$post_users = post_user_likes( $user_id, $post_id, $is_comment );
    				// Update User
    				if ( $is_comment == 1 ) {
    					$user_like_count = get_user_option( "_comment_like_count", $user_id );
    					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
    					if ( $user_like_count > 0 ) {
    						update_user_option( $user_id, "_comment_like_count", --$user_like_count );
    					}
    				} else {
    					$user_like_count = get_user_option( "_user_like_count", $user_id );
    					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
    					if ( $user_like_count > 0 ) {
    						update_user_option( $user_id, '_user_like_count', --$user_like_count );
    					}
    				}
    				// Update Post
    				if ( $post_users ) {	
    					$uid_key = array_search( $user_id, $post_users );
    					unset( $post_users[$uid_key] );
    					if ( $is_comment == 1 ) {
    						update_comment_meta( $post_id, "_user_comment_liked", $post_users );
    					} else { 
    						update_post_meta( $post_id, "_user_liked", $post_users );
    					}
    				}
    			} else { // user is anonymous
    				$user_ip = sl_get_ip();
    				$post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
    				// Update Post
    				if ( $post_users ) {
    					$uip_key = array_search( $user_ip, $post_users );
    					unset( $post_users[$uip_key] );
    					if ( $is_comment == 1 ) {
    						update_comment_meta( $post_id, "_user_comment_IP", $post_users );
    					} else { 
    						update_post_meta( $post_id, "_user_IP", $post_users );
    					}
    				}
    			}
    			$like_count = ( $count > 0 ) ? --$count : 0; // Prevent negative number
    			$response['status'] = "unliked";
    			//$response['icon'] = get_unliked_icon();
    		}
    		if ( $is_comment == 1 ) {
    			update_comment_meta( $post_id, "_comment_like_count", $like_count );
    			update_comment_meta( $post_id, "_comment_like_modified", date( 'Y-m-d H:i:s' ) );
    		} else { 
    			update_post_meta( $post_id, "_post_like_count", $like_count );
    			update_post_meta( $post_id, "_post_like_modified", date( 'Y-m-d H:i:s' ) );
    		}
    		$response['count'] = get_like_count( $like_count );
    		$response['testing'] = $is_comment;
	    } // end if ( isrefresh ) else
		if ( $disabled == true ) {
			if ( $is_comment == 1 ) {
				wp_redirect( get_permalink( get_the_ID() ) );
				exit();
			} else {
				wp_redirect( get_permalink( $post_id ) );
				exit();
			}
		} else {
			wp_send_json( $response );
		}
	}
}

/**
 * Utility to test if the post is already liked
 * @since    0.5
 */
function already_liked( $post_id, $is_comment ) {
	$post_users = NULL;
	$user_id = NULL;
	if ( is_user_logged_in() ) { // user is logged in
		$user_id = get_current_user_id();
		$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
		if ( count( $post_meta_users ) != 0 ) {
			$post_users = $post_meta_users[0];
		}
	} else { // user is anonymous
		$user_id = sl_get_ip();
		$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" ); 
		if ( count( $post_meta_users ) != 0 ) { // meta exists, set up values
			$post_users = $post_meta_users[0];
		}
	}
	if ( is_array( $post_users ) && in_array( $user_id, $post_users ) ) {
		return true;
	} else {
		return false;
	}
} // already_liked()

/**
 * Output the like button
 * @since    0.5
 */
function get_simple_likes_button( $post_id, $is_comment = NULL ) {
	$is_comment = ( NULL == $is_comment ) ? 0 : 1;
	$output = '';
	$nonce = wp_create_nonce( 'simple-likes-nonce' ); // Security
	if ( $is_comment == 1 ) {
		$post_id_class = esc_attr( ' sl-comment-button-' . $post_id );
		$comment_class = esc_attr( ' sl-comment' );
		$like_count = get_comment_meta( $post_id, "_comment_like_count", true );
		$like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
	} else {
		$post_id_class = esc_attr( ' sl-button-' . $post_id );
		$comment_class = esc_attr( '' );
		$like_count = get_post_meta( $post_id, "_post_like_count", true );
		$like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
	}
	$count = get_like_count( $like_count );
	$icon_empty = get_unliked_icon();
	$icon_full = get_liked_icon();
	// Loader
	$loader = ''; //<span id="sl-loader"></span>
	// Liked/Unliked Variables
	if ( already_liked( $post_id, $is_comment ) ) {
		$class = esc_attr( ' liked' );
		$title = __( 'Unlike', 'moviewp' );
		//$icon = '<i class="fa fa-thumbs-o-up"></i>';
	} else {
		$class = '';
		$title = __( 'Like', 'moviewp' );
		//$icon = '<i class="fa fa-thumbs-o-up"></i>';
	}
	$refresh = 1;
	$output = '<a href="' . admin_url( 'admin-ajax.php?action=process_simple_like' . '&post_id=' . $post_id . '&nonce=' . $nonce . '&is_comment=' . $is_comment . '&disabled=true' ) . '" class="sl-button' . $post_id_class . $comment_class . '" data-nonce="' . $nonce . '" data-post-id="' . $post_id . '" data-iscomment="' . $is_comment . '" data-refresh="' . $refresh . '">' . $count . '</a>';
	return $output;
} // get_simple_likes_button()

/**
 * Processes shortcode to manually add the button to posts
 * @since    0.5
 */

/**
add_shortcode( 'jmliker', 'sl_shortcode' );
function sl_shortcode() {
	return get_simple_likes_button( get_the_ID(), 0 );
} // shortcode()
*/

/**
 * Utility retrieves post meta user likes (user id array), 
 * then adds new user id to retrieved array
 * @since    0.5
 */
function post_user_likes( $user_id, $post_id, $is_comment ) {
	$post_users = '';
	$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
	if ( count( $post_meta_users ) != 0 ) {
		$post_users = $post_meta_users[0];
	}
	if ( !is_array( $post_users ) ) {
		$post_users = array();
	}
	if ( !in_array( $user_id, $post_users ) ) {
		$post_users['user-' . $user_id] = $user_id;
	}
	return $post_users;
} // post_user_likes()

/**
 * Utility retrieves post meta ip likes (ip array), 
 * then adds new ip to retrieved array
 * @since    0.5
 */
function post_ip_likes( $user_ip, $post_id, $is_comment ) {
	$post_users = '';
	$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" );
	// Retrieve post information
	if ( count( $post_meta_users ) != 0 ) {
		$post_users = $post_meta_users[0];
	}
	if ( !is_array( $post_users ) ) {
		$post_users = array();
	}
	if ( !in_array( $user_ip, $post_users ) ) {
		$post_users['ip-' . $user_ip] = $user_ip;
	}
	return $post_users;
} // post_ip_likes()

/**
 * Utility to retrieve IP address
 * @since    0.5
 */
function sl_get_ip() {
	if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) && ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = ( isset( $_SERVER['REMOTE_ADDR'] ) ) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
	}
	$ip = filter_var( $ip, FILTER_VALIDATE_IP );
	$ip = ( $ip === false ) ? '0.0.0.0' : $ip;
	return $ip;
} // sl_get_ip()

/**
 * Utility returns the button icon for "like" action
 * @since    0.5
 */
function get_liked_icon() {
	/* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart"></i> */
	$icon = '<i class="fa fa-thumbs-o-up"></i>';
	return $icon;
} // get_liked_icon()

/**
 * Utility returns the button icon for "unlike" action
 * @since    0.5
 */
function get_unliked_icon() {
	/* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart-o"></i> */
	$icon = '<i class="fa fa-thumbs-o-up"></i>';
	return $icon;
} // get_unliked_icon()

/**
 * Utility function to format the button count,
 * appending "K" if one thousand or greater,
 * "M" if one million or greater,
 * and "B" if one billion or greater (unlikely).
 * $precision = how many decimal points to display (1.25K)
 * @since    0.5
 */
function sl_format_count( $number ) {
	$precision = 2;
	if ( $number >= 1000 && $number < 1000000 ) {
		$formatted = number_format( $number/1000, $precision ).'K';
	} else if ( $number >= 1000000 && $number < 1000000000 ) {
		$formatted = number_format( $number/1000000, $precision ).'M';
	} else if ( $number >= 1000000000 ) {
		$formatted = number_format( $number/1000000000, $precision ).'B';
	} else {
		$formatted = $number; // Number is less than 1000
	}
	$formatted = str_replace( '.00', '', $formatted );
	return $formatted;
} // sl_format_count()

/**
 * Utility retrieves count plus count options, 
 * returns appropriate format based on options
 * @since    0.5
 */
function get_like_count( $like_count ) {
	$number = sl_format_count( $like_count );
	$text = '';
	if($number == 1) {
	    $text = testolike;
	}
	else {
	    $text = testolike;
	}

	$count = '<span class="sl-count">' . $text . ' ' . $number . '</span>';
	return $count;
} // get_like_count()


}