<?php
/*
 * Displays the header 
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

$moviewp_header_soc_icons = get_option('moviewppanel_header_soc_icons');
$moviewp_soclink_facebook = get_option('moviewppanel_url_facebook');
$moviewp_soclink_twitter = get_option('moviewppanel_url_twitter');
$moviewp_soclink_instagram = get_option('moviewppanel_url_instagram');

?>

<header id="main-header" role="banner">
	<div class="inner-container">
		<div class="sb-toggle-left">
			<span class="menu-icon"></span>
			<span class="menu-icon-text"><?php _e('Menu', 'moviewp'); ?></span>
		</div>
		<?php if( function_exists( 'the_custom_logo' ) ) { if( has_custom_logo() ) { ?>
			<?php echo is_home() ? '<h1 class="site-title">' : ''; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"><?php bloginfo('name'); ?></a><?php echo is_home() ? '</h1>' : ''; ?>
			<?php } else { ?>
			<?php if (get_option('moviewppanel_site_logo')) { ?>
				<?php echo is_home() ? '<h1 class="site-title">' : ''; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"><?php bloginfo('name'); ?></a><?php echo is_home() ? '</h1>' : ''; ?>
				<?php } else { ?>
				<?php echo is_home() ? '<h1 class="site-title">' : ''; ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo txt"><?php bloginfo('name'); ?></a><?php echo is_home() ? '</h1>' : ''; ?>
			<?php } ?>
		<?php } ?>
		<?php } ?>
		
		<?php if ($moviewp_header_soc_icons == 1) { ?>
			<ul class="header-nav">
				<?php if (strlen($moviewp_soclink_facebook) > 0) { ?>
					<li><a href="<?php echo esc_url($moviewp_soclink_facebook); ?>" aria-label="facebook" target="_blank" rel="noreferrer"><i class="fa fa-facebook"></i></a></li>
				<?php } ?>
				<?php if (strlen($moviewp_soclink_twitter) > 0) { ?>
					<li><a href="<?php echo esc_url($moviewp_soclink_twitter); ?>" aria-label="twitter" target="_blank" rel="noreferrer"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if (strlen($moviewp_soclink_instagram) > 0) { ?>
					<li><a href="<?php echo esc_url($moviewp_soclink_instagram); ?>" aria-label="instagram" target="_blank" rel="noreferrer"><i class="fa fa-instagram"></i></a></li>
				<?php } ?>
			</ul>
		<?php } ?>
	</div>
</header>
