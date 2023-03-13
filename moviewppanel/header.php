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

?>
<div class="moviewppanel-container">
	<div class="moviewppanel-column moviewppanel-column-sticky">
		<div class="moviewppanel-box">
			<div class="moviewppanel-logo">
			<a href="<?php echo esc_url( __( wp_get_theme()->get( 'AuthorURI' )) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/moviewppanel/images/logo.png" alt="<?php echo esc_attr__('fr0zen', 'moviewp'); ?>" /></a>
			<br>
			<span><?php echo __('MovieWP', 'moviewp'); ?> <p><?php echo wp_get_theme()->get( 'Version' ) ?></p></span>
			</div>
			<nav class="moviewppanel-navigation">
				<ul>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-main'); ?>" class="moviewppanel-icon-nav-1 <?php if ($_REQUEST['page'] == 'moviewppanel-main'): echo 'active'; endif; ?>"><?php echo __('General', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-branding'); ?>" class="moviewppanel-icon-nav-2 <?php if ($_REQUEST['page'] == 'moviewppanel-branding'): echo 'active'; endif; ?>"><?php echo __('Branding', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-translate'); ?>" class="moviewppanel-icon-nav-3 <?php if ($_REQUEST['page'] == 'moviewppanel-translate'): echo 'active'; endif; ?>"><?php echo __('Translate', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-socialnetworks'); ?>" class="moviewppanel-icon-nav-4 <?php if ($_REQUEST['page'] == 'moviewppanel-socialnetworks'): echo 'active'; endif; ?>"><?php echo __('Social', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-comments'); ?>" class="moviewppanel-icon-comments-8 <?php if ($_REQUEST['page'] == 'moviewppanel-comments'): echo 'active'; endif; ?>"><?php echo __('Comments', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-advertising'); ?>" class="moviewppanel-icon-nav-7 <?php if ($_REQUEST['page'] == 'moviewppanel-advertising'): echo 'active'; endif; ?>"><?php echo __('Advertising', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-player'); ?>" class="moviewppanel-icon-nav-9 <?php if ($_REQUEST['page'] == 'moviewppanel-player'): echo 'active'; endif; ?>"><?php echo __('Player', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-additional'); ?>" class="moviewppanel-icon-nav-10 <?php if ($_REQUEST['page'] == 'moviewppanel-additional'): echo 'active'; endif; ?>"><?php echo __('Additional', 'moviewp'); ?></a></li>
					<li><a href="<?php echo admin_url('admin.php?page=moviewppanel-reset'); ?>" class="moviewppanel-icon-nav-5 <?php if ($_REQUEST['page'] == 'moviewppanel-reset'): echo 'active'; endif; ?>"><?php echo __('Reset', 'moviewp'); ?></a></li>
				</ul>	
			</nav>
		</div>
	</div>