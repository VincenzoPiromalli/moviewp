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

<?php if( is_post_template( 'tv.php' ) ){ ?>
	<div class="movie-actions">
		<ul class="extra">
			<?php 
				echo SingleViews();
				echo SingleLike();
				echo SingleShare();
				echo SingleTrailer();
				//echo SingleReport();
			?> 
		</ul>
		<?php echo SingleSponsor(); ?>
	</div>
	<?php } else { ?>
	<div class="movie-actions">
		<ul class="extra">
			<?php
				echo SingleViews();
				echo SingleLike();
				echo SingleShare();
				echo SingleTrailer();
				//echo SingleReport();
				echo SingleMultiDownload();
				echo SingleMultiServer();
				echo SingleEmbed();
			?>
		</ul>
		<?php
		    get_template_part('template-parts/actions/actions', 'download');
		    get_template_part('template-parts/actions/actions', 'multi');
		    get_template_part('template-parts/actions/actions', 'switch');
		?>
	</div>
<?php } ?>