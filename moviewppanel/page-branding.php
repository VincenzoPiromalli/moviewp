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
	<?php 
		if (isset($_POST['delete_file'])) {
			if (update_option($_POST['delete_file'], '')) {
				echo '<div class="moviewppanel-box moviewppanel-updated">' . __('File was successfully deleted', 'moviewp') . '</div>';		
			}
		} else {
			if (isset($_POST["upload_save_files"])) {
				if (!function_exists('wp_handle_upload')) { 
					require_once(ABSPATH . 'wp-admin/includes/file.php');
				}
				$countfiles = 0;
				$file = null;
				$files = $_FILES;
				$upload_overrides = array('test_form' => false);
				foreach ($files as $key => $value) {  
					if ($files[$key]['name']) {  
						$file = array(  
							'name'     => $files[$key]['name'],  
							'type'     => $files[$key]['type'],  
							'tmp_name' => $files[$key]['tmp_name'],  
							'error'    => $files[$key]['error'],  
							'size'     => $files[$key]['size']  
						);  
						$movefile = wp_handle_upload($file, $upload_overrides);
						if (!array_key_exists('error', $movefile)) {
							update_option($key, $movefile['url']);
							echo '<div class="moviewppanel-box moviewppanel-updated">' . $file['name'] . __(' was successfully uploaded', 'moviewp') . '</div>';
						} else {
							echo '<div class="moviewppanel-box moviewppanel-error">' . $file['name'] . ' - ' . $movefile['error'] . '</div>';		
						}
					}
					if ($files[$key]['error'] == 0) {
						++$countfiles; 
					}
				}
				if ($countfiles == 0) {
					echo '<div class="moviewppanel-box moviewppanel-error">' . $file['name'] . __('No file selected', 'moviewp') . '</div>';	
				}
			} 
		}
	?>
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
		<h2><?php echo __('Branding', 'moviewp'); ?></h2>
	</div>

	<!--<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label for="moviewppanel_site_logo"><?php echo __('Logo', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Upload site logo. Recommended size: 139x34 px.<br>In theme help folder ther is a PSD logo file if you want.', 'moviewp'); ?></span>
			<?php if (get_option('moviewppanel_site_logo') && get_option('moviewppanel_site_logo') != '') { ?>
			<span class="preview-file">
				<span class="cell"><img src="<?php echo get_option('moviewppanel_site_logo'); ?>" alt="<?php echo __('Site logo', 'moviewp'); ?>"></span>
				<span class="cell"><input type="submit" name="delete_file" class="moviewppanel-button-delete" title="<?php echo __('Delete File', 'moviewp'); ?>" onclick="answer = window.confirm('<?php echo __('Are you sure you want to delete this file?', 'moviewp'); ?>'); return answer;" value="<?php echo __('moviewppanel_site_logo', 'moviewp'); ?>"></span>
			</span>
			<?php } ?>
			<span class="moviewppanel-input-file">
				<a class="moviewppanel-button moviewppanel-button-color-1" href="javascript:void(0)"><?php echo __('Choose File', 'moviewp'); ?></a>
				<input type="text" readonly="readonly">
				<input type="file" name="moviewppanel_site_logo" id="moviewppanel_site_logo" onchange="jQuery(this).parent().find('input[type=text]').val(this.value);">
			</span>
		</p> 
		<p><input type="submit" name="upload_save_files" value="<?php echo __('Upload files and save', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>-->
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
        <p>
			<label for="moviewppanel_color_style"><?php echo __('Theme color', 'moviewp'); ?></label>
            <span class="helptext"><?php echo __('Choose from 9 colors available.', 'moviewp'); ?></span>
            <select name="moviewppanel_color_style" id="moviewppanel_color_style">
				<option value="blue" <?php if (get_option('moviewppanel_color_style') == 'blue') { ?> selected="selected" <?php } ?>><?php echo __('blue', 'moviewp'); ?></option>
                <option value="black" <?php if (get_option('moviewppanel_color_style') == 'black') { ?> selected="selected" <?php } ?>><?php echo __('black', 'moviewp'); ?></option>
                <option value="red" <?php if (get_option('moviewppanel_color_style') == 'red') { ?> selected="selected" <?php } ?>><?php echo __('red', 'moviewp'); ?></option>
                <option value="purple" <?php if (get_option('moviewppanel_color_style') == 'purple') { ?> selected="selected" <?php } ?>><?php echo __('purple', 'moviewp'); ?></option>
                <option value="cherry" <?php if (get_option('moviewppanel_color_style') == 'cherry') { ?> selected="selected" <?php } ?>><?php echo __('cherry', 'moviewp'); ?></option>
                <option value="green" <?php if (get_option('moviewppanel_color_style') == 'green') { ?> selected="selected" <?php } ?>><?php echo __('green', 'moviewp'); ?></option>
                <option value="pink" <?php if (get_option('moviewppanel_color_style') == 'pink') { ?> selected="selected" <?php } ?>><?php echo __('pink', 'moviewp'); ?></option>
                <option value="yellow" <?php if (get_option('moviewppanel_color_style') == 'yellow') { ?> selected="selected" <?php } ?>><?php echo __('yellow', 'moviewp'); ?></option>
                <option value="orange" <?php if (get_option('moviewppanel_color_style') == 'orange') { ?> selected="selected" <?php } ?>><?php echo __('orange', 'moviewp'); ?></option>
            </select>
		</p>
		<p>
			<label for="moviewppanel_google_fonts"><?php echo __('Theme Fonts', 'moviewp'); ?></label>
            <span class="helptext"><?php echo __('Choose from 8 font family available.', 'moviewp'); ?></span>
            <select name="moviewppanel_google_fonts" id="moviewppanel_google_fonts">
			    <option value="jost" <?php if (get_option('moviewppanel_google_fonts') == 'jost') { ?> selected="selected" <?php } ?>><?php echo __('Jost', 'moviewp'); ?></option>
				<option value="quicksand" <?php if (get_option('moviewppanel_google_fonts') == 'quicksand') { ?> selected="selected" <?php } ?>><?php echo __('Quicksand', 'moviewp'); ?></option>
                <option value="sanspro" <?php if (get_option('moviewppanel_google_fonts') == 'sanspro') { ?> selected="selected" <?php } ?>><?php echo __('Source Sans Pro', 'moviewp'); ?></option>
                <option value="baloo" <?php if (get_option('moviewppanel_google_fonts') == 'baloo') { ?> selected="selected" <?php } ?>><?php echo __('Baloo 2', 'moviewp'); ?></option>
                <option value="poppins" <?php if (get_option('moviewppanel_google_fonts') == 'poppins') { ?> selected="selected" <?php } ?>><?php echo __('Poppins', 'moviewp'); ?></option>
                <option value="dmsans" <?php if (get_option('moviewppanel_google_fonts') == 'dmsans') { ?> selected="selected" <?php } ?>><?php echo __('DM Sans', 'moviewp'); ?></option>
                <option value="inter" <?php if (get_option('moviewppanel_google_fonts') == 'inter') { ?> selected="selected" <?php } ?>><?php echo __('Inter', 'moviewp'); ?></option>
			    <option value="tajawal" <?php if (get_option('moviewppanel_google_fonts') == 'tajawal') { ?> selected="selected" <?php } ?>><?php echo __('Tajawal', 'moviewp'); ?></option>
            </select>
		</p>
		<!--<p>
			<label><?php echo __('Activate Wordpress customizer?', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('This feature allows you to change the theme colors regardless of the selected style. Activate this function only if you want to change the colors of the selected theme then go to Appearance > Customize > Colors.', 'moviewp'); ?>
			<br>
			<a href="<?php echo esc_url( __( 'https://www.youtube.com/watch?v=zGmfLLMj2B8', 'moviewp' ) ); ?>" target="_blank" rel="nofollow"><strong><?php printf( __( 'more info %s', 'moviewp' ),''); ?></strong></a>
			</span>
			<label class="radio" for="moviewppanel_customizer_enable"><input type="radio" <?php if (get_option('moviewppanel_customizer') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_customizer_enable" name="moviewppanel_customizer"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_customizer_disable"><input type="radio" <?php if (get_option('moviewppanel_customizer') == 2) { ?> checked="checked" <?php } ?> value="2" id="moviewppanel_customizer_disable" name="moviewppanel_customizer"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>-->
		<p>
			<label><?php echo __('Full Width layout', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('By activating this option the layout will be full width with no spaces in the sides.', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_full">
				<input type="hidden" value="0" name="moviewppanel_full">
				<input type="checkbox" <?php if (get_option('moviewppanel_full') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_full" name="moviewppanel_full">
				<span class="mark"><?php echo __('Enable Full Width', 'moviewp'); ?></span>
			</label>
		</p>
		<p>
			<label><?php echo __('Grid/list view', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('By activating this option, the user can choose whether to view the posts in list or grid mode.', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_grid">
				<input type="hidden" value="0" name="moviewppanel_grid">
				<input type="checkbox" <?php if (get_option('moviewppanel_grid') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_grid" name="moviewppanel_grid">
				<span class="mark"><?php echo __('Enable grid/list view', 'moviewp'); ?></span>
			</label>
		</p>
		<!--<p>
			<label><?php echo __('Infinite scroll', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('By activating this the posts will load in infinite mode using javascript. DO NOT WORK WITH GRID/LIST ENABLE!', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_scroll">
				<input type="hidden" value="0" name="moviewppanel_scroll">
				<input type="checkbox" <?php if (get_option('moviewppanel_scroll') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_scroll" name="moviewppanel_scroll">
				<span class="mark"><?php echo __('Enable Scroll', 'moviewp'); ?></span>
			</label>
		</p>-->
		<p>
			<label><?php echo __('Minify', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('By activating this, you will see the source of your HTML, inline JavaScript and CSS are now compressed.', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_minify">
				<input type="hidden" value="0" name="moviewppanel_minify">
				<input type="checkbox" <?php if (get_option('moviewppanel_minify') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_minify" name="moviewppanel_minify">
				<span class="mark"><?php echo __('Enable Minify', 'moviewp'); ?></span>
			</label>
		</p>
		<!--<p>
			<label><?php echo __('Open Graph', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Check this to enable Open Graph Meta Data features in single post, not recommended if you use any other SEO plugin, that way the themes SEO features won\'t conflict with the plugin.', 'moviewp'); ?></span>
			<label class="checkbox" for="moviewppanel_seo">
				<input type="hidden" value="0" name="moviewppanel_seo">
				<input type="checkbox" <?php if (get_option('moviewppanel_seo') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_seo" name="moviewppanel_seo">
				<span class="mark"><?php echo __('Enable Open Graph', 'moviewp'); ?></span>
			</label>
		</p>-->
		<p>
			<label for="moviewppanel_description"><?php echo __('Notice', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('A notice message for the home page, very important for SEO, leave blank to deactivate.', 'moviewp'); ?></span>
			<input type="text" name="moviewppanel_description" id="moviewppanel_description" value="<?php echo stripslashes_deep(get_option('moviewppanel_description')); ?>">
		</p>
		<p>
			<label for="moviewppanel_slogan"><?php echo __('Slogan', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter the text for top right slogan', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Watch Movie Online Free without Signing Up', 'moviewp'); ?>
			<br>
			<?php echo __('Do not exceed 45 characters.', 'moviewp'); ?>
			</span>
			<input type="text" placeholder="<?php echo __('Watch Movies Online Free', 'moviewp'); ?>" name="moviewppanel_slogan" id="moviewppanel_slogan" value="<?php echo stripslashes_deep(get_option('moviewppanel_slogan')); ?>">
		</p>
		<p>
			<label for="moviewppanel_header_code"><?php echo __('Header Code', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Add code to the head like google analytics code, custom css or more.', 'moviewp'); ?></span>
			<textarea name="moviewppanel_header_code" id="moviewppanel_header_code"><?php echo stripslashes_deep(get_option('moviewppanel_header_code')); ?></textarea>
		</p>
			<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>

<?php get_template_part('moviewppanel/footer'); ?>