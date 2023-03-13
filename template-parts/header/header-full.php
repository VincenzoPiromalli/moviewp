<?php
/*
 * Displays the header
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

<?php
	$moviewp_comments = get_option('moviewppanel_comments');
	if ( is_front_page() && is_home() ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'nav'); 
		} elseif ( is_post_template( 'tv.php' ) ) {
		get_template_part('template-parts/header/header', 'site');
		} elseif ( is_single() ) {
		get_template_part('template-parts/header/header', 'site');
		} elseif ( is_tax( 'actors' ) ) {
		if ($moviewp_comments == 1) { 
			get_template_part('template-parts/header/header', 'site');
			
			} else { 
			get_template_part('template-parts/header/header', 'site');
			get_template_part('template-parts/header/header', 'nav'); 
			
		} 
		} elseif ( is_tax( 'director' ) ) {
		if ($moviewp_comments == 1) { 
			get_template_part('template-parts/header/header', 'site');
			
			} else { 
			get_template_part('template-parts/header/header', 'site');
			get_template_part('template-parts/header/header', 'nav'); 
			
		} 
		} elseif ( is_tax( 'creator' ) ) {
		if ($moviewp_comments == 1) { 
			get_template_part('template-parts/header/header', 'site');
			
			} else { 
			get_template_part('template-parts/header/header', 'site');
			get_template_part('template-parts/header/header', 'nav'); 
			
		}
		} elseif ( is_page( 'alphabet' ) ) {
		get_template_part('template-parts/header/header', 'site');
		} elseif ( is_page( 'contact' ) ) {
		get_template_part('template-parts/header/header', 'site');
		} elseif ( is_page( 'favorites' ) ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'nav'); 
		} elseif ( is_page( 'random' ) ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'nav'); 
		} elseif ( is_page( 'top' ) ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'nav'); 
		} elseif ( is_page( 'collection' ) ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'blog');
		} elseif ( is_page( 'networks' ) ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'blog');
		} elseif ( is_page( 'letter' ) ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'nav'); 
		} elseif ( is_search() ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'nav'); 
		} elseif ( is_page() ) {
		get_template_part('template-parts/header/header', 'site');
		//} elseif ( is_category('blog') ) {
		} elseif ( is_post_type_archive( 'article' ) ) {
		get_template_part('template-parts/header/header', 'site'); 
		get_template_part('template-parts/header/header', 'blog');
		} elseif ( is_category() ) {
		get_template_part('template-parts/header/header', 'site'); 
		get_template_part('template-parts/header/header', 'nav');
		} elseif ( is_archive() ) {
		get_template_part('template-parts/header/header', 'site');
		get_template_part('template-parts/header/header', 'nav'); 
		} elseif ( is_404() ) {
		get_template_part('template-parts/header/header', 'site');
		} else {

	    }
?>