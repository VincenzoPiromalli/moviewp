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

/*====================================*\
	function moviewp admin panel
\*====================================*/

get_template_part('moviewppanel/options');

function moviewppanel_add_styles() {
	// Register moviewordpress panel main stylesheet
	wp_register_style('moviewppanel-style', get_template_directory_uri() . '/moviewppanel/css/moviewppanel.css', array(), '1.6.7', 'all');
	// Loads moviewordpress panel main stylesheet
	wp_enqueue_style('moviewppanel-style');
}
function moviewppanel_add_scripts() {
	// Register moviewordpress panel js files
	wp_register_script('moviewppanel-scripts', get_template_directory_uri() . '/moviewppanel/js/moviewppanel.js', array('jquery'), '1.6.7', false);
	// Loads moviewordpress panel js files
	wp_enqueue_script('moviewppanel-scripts');
}
add_action('admin_enqueue_scripts', 'moviewppanel_add_styles');
add_action('admin_enqueue_scripts', 'moviewppanel_add_scripts');

function moviewppanel_init(){
	moviewppanel_options('add_option');
}

function moviewppanel_menu() {
	add_menu_page(__('Moviewp', 'moviewp'), __('Moviewp', 'moviewp'), 'manage_options', 'moviewppanel-main', 'moviewppanel_render_main', 'dashicons-controls-play', 61);
	add_submenu_page('moviewppanel-main', __('General', 'moviewp'), __('General', 'moviewp'), 'manage_options', 'moviewppanel-main', 'moviewppanel_render_main');
	add_submenu_page('moviewppanel-main', __('Branding', 'moviewp'), __('Branding', 'moviewp'), 'manage_options', 'moviewppanel-branding', 'moviewppanel_render_branding');
	add_submenu_page('moviewppanel-main', __('Translate', 'moviewp'), __('Translate', 'moviewp'), 'manage_options', 'moviewppanel-translate', 'moviewppanel_render_translate');
	add_submenu_page('moviewppanel-main', __('Social', 'moviewp'), __('Social', 'moviewp'), 'manage_options', 'moviewppanel-socialnetworks', 'moviewppanel_render_socialnetworks');
	add_submenu_page('moviewppanel-main', __('Comments', 'moviewp'), __('Comments', 'moviewp'), 'manage_options', 'moviewppanel-comments', 'moviewppanel_render_comments');
	add_submenu_page('moviewppanel-main', __('Advertising', 'moviewp'), __('Advertising', 'moviewp'), 'manage_options', 'moviewppanel-advertising', 'moviewppanel_render_advertising');
	add_submenu_page('moviewppanel-main', __('Player', 'moviewp'), __('Player', 'moviewp'), 'manage_options', 'moviewppanel-player', 'moviewppanel_render_player');
	add_submenu_page('moviewppanel-main', __('Additional', 'moviewp'), __('Additional', 'moviewp'), 'manage_options', 'moviewppanel-additional', 'moviewppanel_render_additional');
	add_submenu_page('moviewppanel-main', __('Reset', 'moviewp'), __('Reset', 'moviewp'), 'manage_options', 'moviewppanel-reset', 'moviewppanel_render_reset');
}
function moviewppanel_render_main() {
	get_template_part('moviewppanel/page-main');	
}
function moviewppanel_render_branding() {
	get_template_part('moviewppanel/page-branding');	
}
function moviewppanel_render_translate() {
	get_template_part('moviewppanel/page-translate');	
}
function moviewppanel_render_socialnetworks() {
	get_template_part('moviewppanel/page-socialnetworks');	
}
function moviewppanel_render_comments() {
	get_template_part('moviewppanel/page-comments');	
}
function moviewppanel_render_advertising() {
	get_template_part('moviewppanel/page-advertising');	
}
function moviewppanel_render_player() {
	get_template_part('moviewppanel/page-player');	
}
function moviewppanel_render_additional() {
	get_template_part('moviewppanel/page-additional');	
}
function moviewppanel_render_reset() {
	get_template_part('moviewppanel/page-reset');	
}
add_action('admin_init', 'moviewppanel_init');
add_action('admin_menu', 'moviewppanel_menu');