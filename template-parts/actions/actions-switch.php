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

$moviewp_switch = get_option('moviewppanel_switch'); 
if ($moviewp_switch == 1) { 
if( class_exists('acf') ) {
?>
<ul>
	<?php 
		if( get_field( '1080p' ) ) {
			if( get_field( '720p' ) ) { 
			?>
			<li id="playnow"> 
				<a class="play purple" id="videoplayer1" title="<?php _e('720p', 'moviewp'); ?>" href="<?php the_field('720p'); ?>" rel="modal" data-modal-movie="movie1" data-modal-type="iframe">
					<span><?php echo streaming; ?> <em></em></span>
				</a>
			</li>
			<?php if( get_field( '1080p' ) ) { ?>
				<li id="playnow"> 
					<a class="play purple" id="videoplayer2" title="<?php _e('1080p', 'moviewp'); ?>" href="<?php the_field('1080p'); ?>" rel="modal" data-modal-movie="movie1" data-modal-type="iframe">
						<span><?php echo streaming; ?> <em><?php _e('HD', 'moviewp'); ?></em></span>
					</a>
				</li>
			<?php } ?>
		<?php } ?>
		<?php } else { ?>
		<?php if( get_field( '720p' ) ) { ?>
			<li id="playnow"> 
				<a class="play purple" id="videoplayer" rel="modal" data-modal-type="iframe" href="<?php the_field('720p'); ?>">
					<i class="fa fa-play"></i>
					<span><?php echo watch; ?></span>
				</a>
			</li>
		<?php } ?>
	<?php } ?>
	<?php if( get_field( '1080p' ) ) { ?>
		<li id="quality-button">
			<div class="switch">
				<input id="quality-switch" type="checkbox" value="">
				<label for="quality-switch" class="hd"><?php _e('720p', 'moviewp'); ?></label>
				<label for="quality-switch" class="switch-toggle"></label>
				<label for="quality-switch" class="fullhd"><?php _e('1080p', 'moviewp'); ?></label>
			</div>
			<audio id="audio" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/sound/click.mp3" autostart="false"></audio>
		</li>
	<?php } ?>
</ul>
<?php } ?>
<?php } ?>
