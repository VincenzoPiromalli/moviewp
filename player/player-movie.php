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

if (isset($_GET['player_movie'])) {
$post_id = $_GET['player_movie'];
$imdb = get_post_meta($post_id, 'imdb_id', true);
$backdrop_path = esc_html(get_post_meta($post_id, 'backdrop_path', true));
$cover3 = '//image.tmdb.org/t/p/w1280' . $backdrop_path;
$string = 'emarfi';
$film = strrev ( $string );
$moviewp_google_fonts = get_option('moviewppanel_google_fonts');
if ($moviewp_google_fonts == 'quicksand') { 
$google_fonts_name = esc_html__( 'Quicksand', 'moviewp' );
} elseif ($moviewp_google_fonts == 'jost') { 
$google_fonts_name = esc_html__( 'Jost', 'moviewp' );
} elseif ($moviewp_google_fonts == 'sanspro') { 
$google_fonts_name = esc_html__( 'Source+Sans+Pro', 'moviewp' );
} elseif ($moviewp_google_fonts == 'baloo') { 
$google_fonts_name = esc_html__( 'Baloo+2', 'moviewp' );
} elseif ($moviewp_google_fonts == 'poppins') { 
$google_fonts_name = esc_html__( 'Poppins', 'moviewp' );
} elseif ($moviewp_google_fonts == 'dmsans') { 
$google_fonts_name = esc_html__( 'DM+Sans', 'moviewp' );
} elseif ($moviewp_google_fonts == 'inter') { 
$google_fonts_name = esc_html__( 'Inter', 'moviewp' );
} else {
$google_fonts_name = esc_html__( 'Tajawal', 'moviewp' );
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
		<link rel="preconnect" href="//fonts.gstatic.com">
		<link rel='preconnect' href='//fonts.googleapis.com' crossorigin />
        <link rel='preconnect' href='//fonts.gstatic.com' crossorigin />
        <link rel='preconnect' href='//cdn.jsdelivr.net' crossorigin />
        <link rel='preconnect' href='//image.tmdb.org' />
		
		<link rel='preload' as='style' href='//cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css' onload="this.rel='stylesheet'" />
        <link rel='preload' href='//cdn.jsdelivr.net/npm/font-awesome@4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0' as='font' type='font/woff2' crossorigin />
		<link href="//fonts.googleapis.com/css2?family=<?php echo $google_fonts_name; ?>:wght@200;300;400;500;700&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/warez.css?ver=3.8.7" type="text/css" media='all' />
        <style>body {background-color: #000; color:#fff;font-family: '<?php echo str_replace("+", " ", $google_fonts_name); ?>', sans-serif !important;}</style>
        
	</head>
	<body>
		<div id="mainautoembed">
			<div id="backgroundautoembed" style="background-image: url('<?php echo $cover3; ?>');"></div>
			<div id="showMainButton">
				<?php echo esc_html__('Display options', 'moviewp'); ?>
			</div>
			<div id="selectPlayer">
			<br><br>
				<div class="hostListSelector singleautoembed">
					<div class="hostList active">
						<div class="buttonLoadHost" data-load-embed="<?php echo $imdb; ?>" data-load-embed-host="2embed"><i class="fa fa-play-circle"></i>
							<div class="t"><?php echo esc_html__('Server 1', 'moviewp'); ?></div>
							<div class="s"><?php echo esc_html__('Recommended, fast and low ads', 'moviewp'); ?></div>
						</div>
						<div class="buttonLoadHost" data-load-embed="<?php echo $imdb; ?>" data-load-embed-host="vidsrc"><i class="fa fa-play-circle"></i>
							<div class="t"><?php echo esc_html__('Server 2', 'moviewp'); ?></div>
							<div class="s"><?php echo esc_html__('Suitable for slow internet, little ads', 'moviewp'); ?></div>
						</div>
						<div class="buttonLoadHost" data-load-embed="<?php echo $imdb; ?>" data-load-embed-host="gdriveplayer"><i class="fa fa-play-circle"></i>
							<div class="t"><?php echo esc_html__('Server 3', 'moviewp'); ?></div>
							<div class="s"><?php echo esc_html__('Stable & aged option, a lot of ads', 'moviewp'); ?></div>
						</div>					
						</div>
					</div>
				</div>
			</div>
			<div id="autoembed">
			</div>
	<script src="//cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/autoembed.js?ver=3.8.7"></script>
	</body>
</html>
	<?php
		} else {
		echo "Missing video_id";
	}
?>
