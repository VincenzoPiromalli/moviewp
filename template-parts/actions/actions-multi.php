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

$moviewp_multiserver = get_option('moviewppanel_multiserver');
if ($moviewp_multiserver == 1) { 
if ($values = get_post_custom_values("iframe_0_server")) { 

?>

<div onclick="servers(event)" class="multi" style="display:none;">
	<?php if($values = get_post_custom_values("iframe_0_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('1', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_1_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('2', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_2_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('3', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_3_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('4', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_4_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('5', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_5_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('6', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_6_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('7', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_7_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('8', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_8_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('9', 'moviewp'); ?></a>
	<?php } ?>
	<?php if($values = get_post_custom_values("iframe_9_server")) { ?>
		<a rel="modal" data-modal-type="iframe" href="<?php echo $values[0]; ?>"><?php echo esc_html__('10', 'moviewp'); ?></a>
	<?php } ?>
</div>
<?php } ?>
<?php } ?>
