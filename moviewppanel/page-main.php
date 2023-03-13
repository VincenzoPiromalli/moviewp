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
		<h2><?php echo __('General', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label for="moviewppanel_license"><?php echo __('License', 'moviewp'); ?> &nbsp;<span class="flashit invalid">&#9679;</span></label>
			<span class="helptext">
			<?php echo __('The license appears to be valid but free and does not include support and updates.<br>Try the new version', 'moviewp'); ?>&nbsp;<a href="<?php echo esc_url( __( 'https://fr0zen.store/moviewp/', 'moviewp' ) ); ?>" target="_blank"><?php printf( __( 'here %s', 'moviewp' ),''); ?></a></span>
            <input type="text" placeholder="<?php echo get_bloginfo('admin_email'); ?>" name="moviewppanel_license" id="moviewppanel_license" value="<?php echo get_bloginfo('admin_email'); ?>" readonly>
		</p>
		<p>
			<label for="moviewppanel_apikey"><?php echo __('API Key', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter TMDB API key, you can get it', 'moviewp'); ?>&nbsp;<a href="<?php echo esc_url( __( 'https://anon.to/?https://developers.themoviedb.org/3/getting-started/introduction', 'moviewp' ) ); ?>" target="_blank" rel="nofollow"><?php printf( __( 'here %s', 'moviewp' ),''); ?></a><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('49101d62654e71a2931722642ac07e5e', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('49101d62654e71a2931722642ac07e5e', 'moviewp'); ?>" name="moviewppanel_apikey" id="moviewppanel_apikey"  value="<?php echo stripslashes_deep(get_option('moviewppanel_apikey')); ?>">
		</p>
		<p>
			<label for="moviewppanel_apilanguage"><?php echo __('API Language', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter language for API, read more', 'moviewp'); ?>&nbsp;<a href="<?php echo esc_url( __( 'https://anon.to/?https://developers.themoviedb.org/3/getting-started/languages', 'moviewp' ) ); ?>" target="_blank" rel="nofollow"><?php printf( __( 'here %s', 'moviewp' ),''); ?></a><br><?php echo __('en-US, fr-FR, es-ES, it-IT, de-DE, pt-PT, pt-BR, nl-NL', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('en-US', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('en-US', 'moviewp'); ?>" name="moviewppanel_apilanguage" id="moviewppanel_apilanguage"  value="<?php echo stripslashes_deep(get_option('moviewppanel_apilanguage')); ?>">
		</p>
		<!--<p>
			<label for="moviewppanel_omdb"><?php echo __('Alternative API Key', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter OMDB TMDB API key, you can get it for free', 'moviewp'); ?>&nbsp;<a href="<?php echo esc_url( __( 'https://anon.to/?https://www.omdbapi.com/apikey.aspx', 'moviewp' ) ); ?>" target="_blank" rel="nofollow"><?php printf( __( 'here %s', 'moviewp' ),''); ?></a><br><?php echo __('It is highly recommended to use your own API key as the default key is used by many users and the daily limit is 1.000.', 'moviewp'); ?><br><?php echo __('This API key is needed to get the TV Show Country as the TMDB API does not support the function.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('128fb1d4', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('128fb1d4', 'moviewp'); ?>" name="moviewppanel_omdb" id="moviewppanel_omdb"  value="<?php echo stripslashes_deep(get_option('moviewppanel_omdb')); ?>">
		</p>-->
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>
<?php get_template_part('moviewppanel/footer'); ?>