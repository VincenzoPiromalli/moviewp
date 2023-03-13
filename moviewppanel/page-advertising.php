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
		<h2><?php echo __('Advertising', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label><?php echo __('Activate Advertising?', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Activate Advertising button.', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_sponsor_enable"><input type="radio" <?php if (get_option('moviewppanel_sponsor') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_sponsor_enable" name="moviewppanel_sponsor"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_sponsor_disable"><input type="radio" <?php if (get_option('moviewppanel_sponsor') == 2) { ?> checked="checked" <?php } ?> value="2" id="moviewppanel_sponsor_disable" name="moviewppanel_sponsor"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<p>
			<label for="moviewppanel_txtsponsor"><?php echo __('Insert advertiser/referrer link', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('This function allows you to earn money by monetizing your site using banner buttons, insert the link of your partner who wants to buy advertising space on your site here, you can insert any link.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('#', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('#', 'moviewp'); ?>" name="moviewppanel_txtsponsor" id="moviewppanel_txtsponsor"  value="<?php echo stripslashes_deep(get_option('moviewppanel_txtsponsor')); ?>">
		</p>
		<p>
			<label><?php echo __('Activate Fake Play Button?', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Activate Fake button.', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_adbutton_enable"><input type="radio" <?php if (get_option('moviewppanel_adbutton') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_adbutton_enable" name="moviewppanel_adbutton"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_adbutton_disable"><input type="radio" <?php if (get_option('moviewppanel_adbutton') == 2) { ?> checked="checked" <?php } ?> value="2" id="moviewppanel_adbutton_disable" name="moviewppanel_adbutton"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<p>
			<label for="moviewppanel_monetize"><?php echo __('Insert fake player link', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Start earning money with our fake play buttons, insert yor publisher advertiser link.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('#', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('#', 'moviewp'); ?>" name="moviewppanel_monetize" id="moviewppanel_monetize"  value="<?php echo stripslashes_deep(get_option('moviewppanel_monetize')); ?>">
		</p>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>

<?php get_template_part('moviewppanel/footer'); ?>