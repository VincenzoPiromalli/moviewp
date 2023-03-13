<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">

<?php wp_head(); ?>

</head>
<body id="body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php get_sidebar(); ?>
<div id="site-container" class="site-content">
	<main id="main" role="main">
    <?php get_template_part('template-parts/header/header', 'full'); ?>