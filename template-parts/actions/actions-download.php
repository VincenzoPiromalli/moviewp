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

if( class_exists('acf') ) {
if( get_field( 'download_2' ) ) {

?>

<div onclick="downloads(event)" class="multidownload" style="display:none;">
	<?php if( get_field( 'download' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_2' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_2'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_2'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_3' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_3'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_3'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_4' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_4'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_4'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_5' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_5'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_5'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_6' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_6'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_6'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_7' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_7'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_7'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_8' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_8'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_8'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_9' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_9'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_9'); ?>"></a>
	<?php } ?>
	<?php if( get_field( 'download_10' ) ) { ?>
		<a target="_blank" rel="noreferrer" href="<?php the_field('download_10'); ?>"><img src="<?php echo esc_url( __( '//www.google.com/s2/favicons?domain=', 'moviewp' ) ); ?><?php the_field('download_10'); ?>"></a>
	<?php } ?>
</div>
<?php } ?>
<?php } ?>
