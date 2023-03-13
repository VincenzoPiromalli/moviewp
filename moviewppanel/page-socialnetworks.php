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
		<h2><?php echo __('Social', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label><?php echo __('Social icons in Header?', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Add links to your social profiles on to right header bar.', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_header_soc_icons_enable"><input type="radio" <?php if (get_option('moviewppanel_header_soc_icons') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_header_soc_icons_enable" name="moviewppanel_header_soc_icons"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_header_soc_icons_disable"><input type="radio" <?php if (get_option('moviewppanel_header_soc_icons') == 2) { ?> checked="checked" <?php } ?> value="2" id="moviewppanel_header_soc_icons_disable" name="moviewppanel_header_soc_icons"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<p>
			<label for="moviewppanel_url_facebook"><?php echo __('Facebook', 'moviewp'); ?></label>
			<input type="text" name="moviewppanel_url_facebook" id="moviewppanel_url_facebook" value="<?php echo stripslashes_deep(get_option('moviewppanel_url_facebook')); ?>">
		</p>
		<p>
			<label for="moviewppanel_url_twitter"><?php echo __('Twitter', 'moviewp'); ?></label>
			<input type="text" name="moviewppanel_url_twitter" id="moviewppanel_url_twitter" value="<?php echo stripslashes_deep(get_option('moviewppanel_url_twitter')); ?>">
		</p>
		<p>
			<label for="moviewppanel_url_instagram"><?php echo __('Instagram', 'moviewp'); ?></label>
			<input type="text" name="moviewppanel_url_instagram" id="moviewppanel_url_instagram" value="<?php echo stripslashes_deep(get_option('moviewppanel_url_instagram')); ?>">
		</p>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>

<?php get_template_part('moviewppanel/footer'); ?>