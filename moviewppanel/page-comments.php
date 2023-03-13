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
		<h2><?php echo __('Comments', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label><?php echo __('Activate Disqus Comments?', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Activating this function will enable DISQUS comments, this is a highly recommended option because the default wordpress comments do not work for taxonomies such as actors, directors, etc..', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_comments_enable"><input type="radio" <?php if (get_option('moviewppanel_comments') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_comments_enable" name="moviewppanel_comments"><span class="mark"><?php echo __('Yes', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_comments_disable"><input type="radio" <?php if (get_option('moviewppanel_comments') == 2) { ?> checked="checked" <?php } ?> value="2" id="moviewppanel_comments_disable" name="moviewppanel_comments"><span class="mark"><?php echo __('No', 'moviewp'); ?></span></label>
		</p>
		<p>
			<label for="moviewppanel_disqus"><?php echo __('Disqus comments', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Your DISQUS Shortname identifier ID for comments you need to register a disqus account e setup your new website.', 'moviewp'); ?>  <a href="<?php echo esc_url( __( 'https://anon.to/?https://help.disqus.com/en/articles/1717111-what-s-a-shortname', 'moviewp' ) ); ?>" target="_blank" rel="nofollow"><strong><?php printf( __( 'more info %s', 'moviewp' ),''); ?></strong></a><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('movieapp-1', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('movieapp-1', 'moviewp'); ?>" name="moviewppanel_disqus" id="moviewppanel_disqus"  value="<?php echo stripslashes_deep(get_option('moviewppanel_disqus')); ?>">
		</p>

		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>
<?php get_template_part('moviewppanel/footer'); ?>