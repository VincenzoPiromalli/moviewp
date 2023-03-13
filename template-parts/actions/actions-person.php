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

$moviewp_sharebutton = get_option('moviewppanel_sharebutton');
$moviewp_sponsor = get_option('moviewppanel_sponsor'); 

?>

<div class="movie-actions">
	<ul class="extra">
	    <?php if ($moviewp_sharebutton == 1) { ?>
		<li id="share"> 
			<a id="hover" class="a2a_dd" href="#">
				<i class="fa fa-retweet"></i>
				<span><?php echo share; ?></span>
			</a>
		</li>
		<?php } ?>
		<li> 
			<a id="hover" class="tmdb" href="#" onclick="return false;">
				<i class="fa fa-trademark"></i>
				<span><?php echo esc_html__( 'TMDb', 'moviewp' ); ?></span>
			</a>
		</li>
		<li> 
			<a id="hover" class="bio" href="#" onclick="return false;">
				<i style="padding-right:20px;" class="fa fa-imdb"></i>
				<span><?php echo esc_html__( 'IMDb', 'moviewp' ); ?></span>
			</a>
		</li>
	</ul>
	<?php if ($moviewp_sponsor == 1) { ?>
		<ul>
			<li id="monetize">
				<div class="play purple"><?php echo advertise; ?></div>
			</li>
		</ul>
	<?php } ?>
</div>
