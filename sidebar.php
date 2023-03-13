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

// cat movies
$category_movies = get_cat_ID( 'Movies' ); 
$category_link_movies = get_category_link( $category_movies );
// cat series
$category_id = get_cat_ID( 'TV Series' ); 
$category_link = get_category_link( $category_id );
// tv
$moviewp_enabletv = get_option('moviewppanel_enabletv'); 
// top
$moviewp_topicon = get_option('moviewppanel_topicon');
// random
$moviewp_randomicon = get_option('moviewppanel_randomicon'); 
// favorites
$moviewp_favorites = get_option('moviewppanel_favorites');
// scroll
ScrollToTop();

?>

<div class="sidebar sb-left">
	<nav class="mobile-nav">
		<ul>
			<?php echo is_home() ? '<li class="active">' : '<li>'; ?><a href="<?php echo esc_url( home_url() ); ?>/"><i class="fa fa-home"></i><span><?php echo latest; ?></span></a><?php echo is_home() ? '</li>' : '</li>'; ?>
			<li<?php if (is_category('movies')) echo ' class="active"'; ?>><a href="<?php echo esc_url( $category_link_movies ); ?>"><i class="fa fa-film"></i><span><?php echo txtmovies; ?></span></a></li>
			<?php if ($moviewp_enabletv == 1) { ?>
				<li<?php if (is_category('tv-series')) echo ' class="active"'; ?>><a href="<?php echo esc_url( $category_link ); ?>"><i class="fa fa-desktop"></i><span><?php echo tvseries; ?></span></a></li>
			<?php } ?>
			<?php if ($moviewp_topicon == 1) { ?>
				<li<?php if (is_page('top')) echo ' class="active"'; ?>><a href="<?php echo esc_url( home_url() ); ?>/top/"><i class="fa fa-trophy"></i><span><?php echo top; ?></span></a></li>
			<?php } ?>
			<?php if ($moviewp_randomicon == 1) { ?>
				<li<?php if (is_page('random')) echo ' class="active"'; ?>><a href="<?php echo esc_url( home_url() ); ?>/random/"><i class="fa fa-random"></i><span><?php echo random; ?></span></a></li>
			<?php } ?>
			<li<?php if (is_page('collection')) echo ' class="active"'; ?>><a href="<?php echo esc_url( home_url() ); ?>/collection/"><i class="fa fa-clone"></i><span><?php echo esc_html__('Collections', 'moviewp'); ?></span></a></li>
			<li<?php if (is_page('networks')) echo ' class="active"'; ?>><a href="<?php echo esc_url( home_url() ); ?>/networks/"><i class="fa fa-globe"></i><span><?php echo esc_html__('Networks', 'moviewp'); ?></span></a></li>
			<!--<li<?php if (is_post_type_archive( 'article' )) echo ' class="active"'; ?>><a href="<?php echo esc_url( home_url() ); ?>/blog/"><i class="fa fa-tag"></i><span><?php echo esc_html__('Blog', 'moviewp'); ?></span></a></li>-->
			<?php if ($moviewp_favorites == 1) { ?>
				<li<?php if (is_page('favorites')) echo ' class="active"'; ?>><a href="<?php echo esc_url( home_url() ); ?>/favorites/"><i class="fa fa-heart-o"></i><span><?php echo textfavorites; ?></span></a></li>
			<?php } ?>
			<?php dynamic_sidebar( 'left_1' ); ?>
		</ul>
	</nav>
</div>
