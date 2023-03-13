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
		<h2><?php echo __('Additional Functions', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label><?php echo __('Activate functions', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Do you want to enable primary functions?', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_enabletv">
				<input type="hidden" value="0" name="moviewppanel_enabletv">
				<input type="checkbox" <?php if (get_option('moviewppanel_enabletv') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_enabletv" name="moviewppanel_enabletv">
				<span class="mark"><?php echo __('TV Series', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_enabletag">
				<input type="hidden" value="0" name="moviewppanel_enabletag">
				<input type="checkbox" <?php if (get_option('moviewppanel_enabletag') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_enabletag" name="moviewppanel_enabletag">
				<span class="mark"><?php echo __('Tag', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_sharebutton">
				<input type="hidden" value="0" name="moviewppanel_sharebutton">
				<input type="checkbox" <?php if (get_option('moviewppanel_sharebutton') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_sharebutton" name="moviewppanel_sharebutton">
				<span class="mark"><?php echo __('Share', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_postviews">
				<input type="hidden" value="0" name="moviewppanel_postviews">
				<input type="checkbox" <?php if (get_option('moviewppanel_postviews') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_postviews" name="moviewppanel_postviews">
				<span class="mark"><?php echo __('Views', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_favorites">
				<input type="hidden" value="0" name="moviewppanel_favorites">
				<input type="checkbox" <?php if (get_option('moviewppanel_favorites') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_favorites" name="moviewppanel_favorites">
				<span class="mark"><?php echo __('Favorites', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_likes">
				<input type="hidden" value="0" name="moviewppanel_likes">
				<input type="checkbox" <?php if (get_option('moviewppanel_likes') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_likes" name="moviewppanel_likes">
				<span class="mark"><?php echo __('Like', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_similar">
				<input type="hidden" value="0" name="moviewppanel_similar">
				<input type="checkbox" <?php if (get_option('moviewppanel_similar') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_similar" name="moviewppanel_similar">
				<span class="mark"><?php echo __('Similar', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_topicon">
				<input type="hidden" value="0" name="moviewppanel_topicon">
				<input type="checkbox" <?php if (get_option('moviewppanel_topicon') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_topicon" name="moviewppanel_topicon">
				<span class="mark"><?php echo __('Top', 'moviewp'); ?></span>
			</label>
			<label class="checkbox" for="moviewppanel_randomicon">
				<input type="hidden" value="0" name="moviewppanel_randomicon">
				<input type="checkbox" <?php if (get_option('moviewppanel_randomicon') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_randomicon" name="moviewppanel_randomicon">
				<span class="mark"><?php echo __('Random', 'moviewp'); ?></span>
			</label>
		</p>
		<hr>
		<p>
			<label><?php echo __('Menù Dropdown', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Do you want to enable menù dropdown functions?', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_sortby">
				<input type="hidden" value="0" name="moviewppanel_sortby">
				<input type="checkbox" <?php if (get_option('moviewppanel_sortby') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_sortby" name="moviewppanel_sortby">
				<span class="mark"><?php echo __('Sort by', 'moviewp'); ?></span>
			</label>
			<!--<label class="checkbox" for="moviewppanel_quality">
				<input type="hidden" value="0" name="moviewppanel_quality">
				<input type="checkbox" <?php if (get_option('moviewppanel_quality') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_quality" name="moviewppanel_quality">
				<span class="mark"><?php echo __('Quality', 'moviewp'); ?></span>
			</label>-->
			<label class="checkbox" for="moviewppanel_letter">
				<input type="hidden" value="0" name="moviewppanel_letter">
				<input type="checkbox" <?php if (get_option('moviewppanel_letter') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_letter" name="moviewppanel_letter">
				<span class="mark"><?php echo __('Letter', 'moviewp'); ?></span>
			</label>
		</p>
		<hr>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>
<?php get_template_part('moviewppanel/footer'); ?>