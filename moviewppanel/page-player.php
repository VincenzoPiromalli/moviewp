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

get_template_part('moviewppanel/header'); ?>

<div class="moviewppanel-column">
	<?php if (isset($_POST["update_options"])) { ?>
		<?php
			foreach ($_POST as $key => $value) {
                if ($key != 'update_options') {
					update_option($key, esc_html($value));
				}
            }
		?>
		<div class="moviewppanel-box moviewppanel-updated"><?php echo __('Settings saved', 'moviewp'); ?></div>		
	<?php } ?>
	<div class="moviewppanel-box">
		<h2><?php echo __('Player', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label><?php echo __('Player functions', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Do you want to enable player functions?', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_multiserver">
				<input type="hidden" value="0" name="moviewppanel_multiserver">
				<input type="checkbox" <?php if (get_option('moviewppanel_multiserver') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_multiserver" name="moviewppanel_multiserver">
				<span class="mark"><?php echo __('Movie Multiserver', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_switch">
				<input type="hidden" value="0" name="moviewppanel_switch">
				<input type="checkbox" <?php if (get_option('moviewppanel_switch') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_switch" name="moviewppanel_switch">
				<span class="mark"><?php echo __('Movie Switch', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_tvdl">
				<input type="hidden" value="0" name="moviewppanel_tvdl">
				<input type="checkbox" <?php if (get_option('moviewppanel_tvdl') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_tvdl" name="moviewppanel_tvdl">
				<span class="mark"><?php echo __('TV Download', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_multiplayer">
				<input type="hidden" value="0" name="moviewppanel_multiplayer">
				<input type="checkbox" <?php if (get_option('moviewppanel_multiplayer') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_multiplayer" name="moviewppanel_multiplayer">
				<span class="mark"><?php echo __('Auto embed', 'moviewp'); ?></span>
			</label>
		</p>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>
<?php get_template_part('moviewppanel/footer'); ?>