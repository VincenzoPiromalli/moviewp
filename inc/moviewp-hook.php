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

// Register Script
function custom_scripts() {
    $moviewp_comments = get_option('moviewppanel_comments');

	//wp_register_script( 'fontawesome', 'https://use.fontawesome.com/b72c525853.js', false, false, false );
	//wp_register_script( 'fontawesome', 'https://kit.fontawesome.com/42cc6cd732.js', false, false, false );
	//wp_enqueue_script( 'fontawesome' );
	
	//wp_register_script( 'lazyload', get_template_directory_uri() . '/assets/js/lazyload.min.js', array('jquery'), '17.3.1', false);
	wp_register_script( 'lazyload', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js', array('jquery'), '17.3.1', false);
	wp_enqueue_script( 'lazyload' );
	
if ( is_front_page() && is_home() ) {

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
} elseif ( is_post_template( 'tv.php' ) ) {

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );

	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
   if ($moviewp_comments == 1) { 

    wp_register_script( 'disqus', get_template_directory_uri() . '/assets/js/disqus.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'disqus' );
    
   } 

	wp_enqueue_script( 'addtoany', 'https://static.addtoany.com/menu/page.js', false, false, true );

} elseif ( is_single() ) {

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
   if ($moviewp_comments == 1) { 

    wp_register_script( 'disqus', get_template_directory_uri() . '/assets/js/disqus.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'disqus' );
    
   } 
	
    wp_enqueue_script( 'addtoany', 'https://static.addtoany.com/menu/page.js', false, false, true );
	//wp_register_script( 'addtoany', 'https://static.addtoany.com/menu/page.js', false, false, true );
	//wp_enqueue_script( 'addtoany' );

} elseif ( is_tax( 'actors' ) ) {

   if ($moviewp_comments == 1) { 

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'person', get_template_directory_uri() . '/assets/js/person.js', array(), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'person' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
	wp_enqueue_script( 'addtoany', 'https://static.addtoany.com/menu/page.js', false, false, true );
	
    } else { 

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
    } 

} elseif ( is_tax( 'director' ) ) {

   if ($moviewp_comments == 1) { 

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'person', get_template_directory_uri() . '/assets/js/person.js', array(), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'person' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
	wp_enqueue_script( 'addtoany', 'https://static.addtoany.com/menu/page.js', false, false, true );
	
    } else { 

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
    } 

} elseif ( is_tax( 'creator' ) ) {

   if ($moviewp_comments == 1) { 

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'person', get_template_directory_uri() . '/assets/js/person.js', array(), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'person' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
	wp_enqueue_script( 'addtoany', 'https://static.addtoany.com/menu/page.js', false, false, true );
	
    } else { 

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
	
    }

} else {

	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'script' );
	
	wp_register_script( 'scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), '0.6.5', true);
	wp_enqueue_script( 'scrollbar' );
}

	
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );


// Register Style
function custom_styles() {

    $moviewp_color_style = get_option('moviewppanel_color_style');
	
if ( is_tax( 'actors' ) ) {

    wp_register_style( 'style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_style( 'style' );
	
	wp_register_style( 'color', get_template_directory_uri() . '/assets/css/'.$moviewp_color_style.'.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'color' );
	
	wp_register_style( 'person', get_template_directory_uri() . '/assets/css/person.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'person' );
	
} elseif ( is_tax( 'director' ) ) {

    wp_register_style( 'style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_style( 'style' );
	
	wp_register_style( 'color', get_template_directory_uri() . '/assets/css/'.$moviewp_color_style.'.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'color' );
	
	wp_register_style( 'person', get_template_directory_uri() . '/assets/css/person.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'person' );

} elseif ( is_tax( 'creator' ) ) {

    wp_register_style( 'style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_style( 'style' );
	
	wp_register_style( 'color', get_template_directory_uri() . '/assets/css/'.$moviewp_color_style.'.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'color' );
	
	wp_register_style( 'person', get_template_directory_uri() . '/assets/css/person.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'person' );

} elseif ( is_page( 'collection' ) ) {

    wp_register_style( 'style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_style( 'style' );
	
	wp_register_style( 'color', get_template_directory_uri() . '/assets/css/'.$moviewp_color_style.'.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'color' );
	
	wp_register_style( 'collection', get_template_directory_uri() . '/assets/css/collection.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'collection' );
	
} elseif ( is_page( 'networks' ) ) {

    wp_register_style( 'style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_style( 'style' );
	
	wp_register_style( 'color', get_template_directory_uri() . '/assets/css/'.$moviewp_color_style.'.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'color' );
	
	wp_register_style( 'networks', get_template_directory_uri() . '/assets/css/networks.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'networks' );
	
} else {

    wp_register_style( 'style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_style( 'style' );
	
	wp_register_style( 'color', get_template_directory_uri() . '/assets/css/'.$moviewp_color_style.'.css', array(), wp_get_theme()->get( 'Version' ), 'all');
    wp_enqueue_style( 'color' );
    }
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );


// preconnect font awesome
function moviewp_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'google-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
		'href' => 'https://fonts.googleapis.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'moviewp_resource_hints', 10, 2 );


// full width
$moviewp_full = get_option('moviewppanel_full');
if ($moviewp_full == 1) {
add_action('wp_head', 'my_custom_styles', 100);

function my_custom_styles()
{
 echo "<style>#main #header-secondary .inner-container,#main #main-header .inner-container,body{max-width:100%!important}.detail #content .movie-background{max-width:100%!important;}</style>";
}
}

// logo
if (get_option('moviewppanel_site_logo')) {
function hook_css() {
?>
<style>#main #main-header .logo {background: url(<?php echo get_option('moviewppanel_site_logo'); ?>);}</style>
<?php
}
add_action('wp_head', 'hook_css');
}


function moviewp_custom_logo_setup() {
 $defaults = array(
 'height'      => 34,
 'width'       => 139,
 'flex-height' => false,
 'flex-width'  => false,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => false, 
 );
add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'moviewp_custom_logo_setup' );


function moviewp_logo_css() {
if ( has_custom_logo() ) :

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<style>#main #main-header .logo {background: url(<?php echo esc_url( $image[0] ); ?>);}</style>
<?php
    endif;
}
add_action( 'wp_head', 'moviewp_logo_css');


// body class
add_filter( 'body_class', function( $classes ) {

if ( is_home() ) {
$classes[] = 'overview';
} elseif ( is_post_template( 'tv.php' ) ) {
 $classes[] = 'detail tv';
} elseif ( is_single() ) {
 $classes[] = 'detail';
} elseif ( is_page( 'alphabet' ) ) {
 $classes[] = 'detail alphabet';
} elseif ( is_page( 'contact' ) ) {
 $classes[] = 'detail';
} elseif ( is_page( 'favorites' ) ) {
 $classes[] = 'overview favorites';
} elseif ( is_page( 'random' ) ) {
 $classes[] = 'overview random';
} elseif ( is_page( 'top' ) ) {
 $classes[] = 'overview top';
} elseif ( is_page( 'letter' ) ) {
 $classes[] = 'overview letter';
} elseif ( is_search() ) {
 $classes[] = 'overview';
} elseif ( is_page( 'collection' ) ) {
 $classes[] = 'overview collection';
} elseif ( is_page( 'networks' ) ) {
 $classes[] = 'overview networks';
} elseif ( is_page() ) {
 $classes[] = 'detail';
} elseif ( is_category() ) {
 $classes[] = 'overview category';
} elseif ( is_archive() ) {
 $classes[] = 'overview';
} elseif ( is_tag() ) {
 $classes[] = 'overview';
} else {

}
return array_merge( $classes, array( 'custom' ) );
} 
);





// GlobalPerson
if ($moviewp_comments == 1) {
function GlobalPerson() {
global $post;
if ( is_tax( 'actors' ) ) { ?>
<script type='text/javascript'>
var page = '<?php $title = urlencode('' . single_term_title( '', false ) . ''); echo $title;?>';
var singleTitle = "<?php $singleTitle = ''.single_term_title().'';$arr = explode("'",$singleTitle);$singleTitle = implode('',$arr);echo $singleTitle; ?>";
var watch="<?php echo txtsponsor; ?>";
var nobio="<?php echo nobio; ?>";
var apiKey = "<?php echo apikey; ?>";
var language = "<?php echo apilanguage; ?>";
var disqus_shortname = "<?php echo disqus; ?>";
</script>
<?php } elseif ( is_tax( 'director' ) ) { ?>
<script type='text/javascript'>
var page = '<?php $title = urlencode('' . single_term_title( '', false ) . ''); echo $title;?>';
var singleTitle = "<?php $singleTitle = ''.single_term_title().'';$arr = explode("'",$singleTitle);$singleTitle = implode('',$arr);echo $singleTitle; ?>";
var watch="<?php echo txtsponsor; ?>";
var nobio="<?php echo nobio; ?>";
var apiKey = "<?php echo apikey; ?>";
var language = "<?php echo apilanguage; ?>";
var disqus_shortname = "<?php echo disqus; ?>";
</script>
<?php } elseif ( is_tax( 'creator' ) ) { ?>
<script type='text/javascript'>
var page = '<?php $title = urlencode('' . single_term_title( '', false ) . ''); echo $title;?>';
var singleTitle = "<?php $singleTitle = ''.single_term_title().'';$arr = explode("'",$singleTitle);$singleTitle = implode('',$arr);echo $singleTitle; ?>";
var watch="<?php echo txtsponsor; ?>";
var nobio="<?php echo nobio; ?>";
var apiKey = "<?php echo apikey; ?>";
var language = "<?php echo apilanguage; ?>";
var disqus_shortname = "<?php echo disqus; ?>";
</script>
<?php }
}
add_action( 'wp_footer', 'GlobalPerson', 5 );
}


// AZFooter
function AZFooter() {
if ( is_page( 'alphabet' ) ) {
?>
<script type='text/javascript'>
jQuery(document).ready(function(){"use strict";let e,t=jQuery("#a-z li.active:eq(0)").data("letter"),s=jQuery("#title-status span"),r=jQuery("#a-z li"),a=jQuery("p#show-all"),l=jQuery("#posts-results li");jQuery("#posts-results li[data-letter='"+t+"']").addClass("show"),jQuery("az_li:eq(0)").addClass("current"),s.text(t),jQuery("#a-z li.active").on("click", function(){jQuery("#posts-results li").removeClass("show"),e=jQuery(this).data("letter"),jQuery("#a-z li.active").removeClass("current"),s.text(e),a.show(),jQuery(this).addClass("current"),jQuery("#posts-results li[data-letter='"+e+"']").addClass("show")}),a.on("click", function(){l.addClass("show"),s.text("all"),r.removeClass("current"),jQuery(this).hide()})});
</script>
<?php
}}
add_action( 'wp_footer', 'AZFooter', 100 );

// alphabet css
function alphabet_css() {
if ( is_page( 'alphabet' ) ) {
?>
<style>
#title-status{float:left;width:100%}#title-status p{float:left;width:50%;margin-bottom:15px;font-size:16px}#title-status span{font-weight:700;text-transform:uppercase}#title-status p:last-child{text-align:right;color:#b9bcbe;cursor:pointer}#a-z{float:left;width:100%;margin-bottom:25px;display:flex;flex-direction:row}ul#a-z li{flex-grow:1;padding:7px;text-align:center;background:#282c3900;color:#fff;text-transform:uppercase;border-left:1px solid #131212}ul#a-z li.active{background:#6f6f6f45;cursor:pointer}ul#a-z li.current{background:#298eea}ul#a-z li:first-child{border:0 none}#posts-results li{display:none}#posts-results li.show{display:block}#posts-results a{border-bottom:1px solid #272727;display:block;padding:10px 0}#posts-results>li>a>span{float:right;width:50px}#posts-results>li>a>span>i{color:#febf15;margin-right:10px}@media (max-width:600px){#a-z{flex-wrap:wrap}ul#a-z li{border-left:0}#posts-results a{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}#posts-results>li>a>span{display:none}}
</style>
<?php
}}
add_action('wp_head', 'alphabet_css');


//admin bar
add_theme_support( 'admin-bar', array( 'callback' => 'my_admin_bar_css') );
function my_admin_bar_css()
{
?>

<style type="text/css" media="screen">	
#content .item-container,#header-secondary,#main,#main-header .inner-container,.mobile-nav,.modal-close,.notice.show{margin-top:32px!important}@media only screen and (max-width:782px){#content .item-container,#main,#main-header .inner-container,.mobile-nav,.notice.show{margin-top:46px!important}#header-secondary{margin-top:-2px!important}#main{margin-top:0!important}#content{margin-top:0!important}}@media only screen and (max-width:514px){#content .item-container,.notice.show{margin-top:110px!important}.notice.show{margin-bottom:-90px!important}}@media only screen and (max-width:400px){#content .item-container,.notice.show{margin-top:220px!important}}
</style>
<?php
}

// header_code
function my_header_code() {
global $post;
$moviewppanel_header_code = get_option('moviewppanel_header_code');
if (get_option('moviewppanel_header_code')) {
echo html_entity_decode(stripslashes_deep($moviewppanel_header_code), ENT_QUOTES);
}}
add_action('wp_head', 'my_header_code');

// google fonts
add_action( 'wp_head', 'moviewp_google_fonts', 8 );
function moviewp_google_fonts() {
$moviewp_google_fonts = get_option('moviewppanel_google_fonts');

if ($moviewp_google_fonts == 'quicksand') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap';

} elseif ($moviewp_google_fonts == 'jost') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap';
	
} elseif ($moviewp_google_fonts == 'sanspro') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700&display=swap';

} elseif ($moviewp_google_fonts == 'baloo') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700&display=swap';

} elseif ($moviewp_google_fonts == 'poppins') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap';

} elseif ($moviewp_google_fonts == 'dmsans') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap';

} elseif ($moviewp_google_fonts == 'inter') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap';

} elseif ($moviewp_google_fonts == 'tajawal') { 

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700&display=swap';

} else {

$google_fonts_url = 'https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;700&display=swap';
    
}
?>
<link rel='preload' as='style' href='<?php echo $google_fonts_url; ?>' />
<link rel='stylesheet' href='<?php echo $google_fonts_url; ?>' media='print' onload="this.media='all'" />
<?php }

// preconnect google fonts
add_action( 'wp_head', 'moviewp_preconnect', 2 );
function moviewp_preconnect() {
?>

<link rel='preconnect' href='https://fonts.googleapis.com' crossorigin />
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
<link rel='preconnect' href='https://cdn.jsdelivr.net' crossorigin />
<link rel='preconnect' href='https://image.tmdb.org' />

<?php }

// google font family
add_action('wp_head', 'my_custom_gfonts', 100);
function my_custom_gfonts()
{ 
$moviewp_google_fonts = get_option('moviewppanel_google_fonts');
if ($moviewp_google_fonts == 'quicksand') { 
$google_fonts_name = esc_html__( 'Quicksand', 'moviewp' );
} elseif ($moviewp_google_fonts == 'jost') { 
$google_fonts_name = esc_html__( 'Jost', 'moviewp' );
} elseif ($moviewp_google_fonts == 'sanspro') { 
$google_fonts_name = esc_html__( 'Source Sans Pro', 'moviewp' );
} elseif ($moviewp_google_fonts == 'baloo') { 
$google_fonts_name = esc_html__( 'Baloo 2', 'moviewp' );
} elseif ($moviewp_google_fonts == 'poppins') { 
$google_fonts_name = esc_html__( 'Poppins', 'moviewp' );
} elseif ($moviewp_google_fonts == 'dmsans') { 
$google_fonts_name = esc_html__( 'DM Sans', 'moviewp' );
} elseif ($moviewp_google_fonts == 'inter') { 
$google_fonts_name = esc_html__( 'Inter', 'moviewp' );
} else {
$google_fonts_name = esc_html__( 'Tajawal', 'moviewp' );
}
?>
<?php if ($google_fonts_name == 'Jost') { ?>
<?php } else { ?>
<style>body, input, textarea, #select_sortby, .favorite i:hover:after {font-family: '<?php echo $google_fonts_name; ?>', sans-serif !important;}</style>
<?php } ?>
<?php }

// Register grid Script
$moviewp_grid = get_option('moviewppanel_grid');
if ($moviewp_grid == 1) {
function grid_script() {
if ( is_single() ) {

} elseif ( is_page( 'alphabet' ) ) {

} elseif ( is_page( 'contact' ) ) {

} elseif ( is_post_type_archive( 'article' ) ) {

} elseif ( is_page( 'collection' ) ) {

} elseif ( is_page( 'networks' ) ) {

} elseif ( is_page( 'favorites' ) ) {

} else {

	wp_register_script( 'grid', get_template_directory_uri() . '/assets/js/grid.js', array(), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'grid' );
}

}
add_action( 'wp_enqueue_scripts', 'grid_script' );
}


function make_disqus_async( $tag, $handle, $src )
{
    if ( 'disqus' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' async", $tag );
}
add_filter( 'script_loader_tag', 'make_disqus_async', 10, 3 );


// fontawesome_anonymous
function make_fontawesome_anonymous( $tag, $handle, $src )
{
    if ( 'fontawesome' != $handle ) {
        return $tag;
    }

    return str_replace( "?ver=5.7.1' id='fontawesome-js'", "' crossorigin='anonymous'", $tag );
}
add_filter( 'script_loader_tag', 'make_fontawesome_anonymous', 10, 3 );

//function make scripts async/defer

function make_addtoany_async( $tag, $handle, $src )
{
    if ( 'addtoany' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' async", $tag );
}
add_filter( 'script_loader_tag', 'make_addtoany_async', 10, 3 );

//function make_movie_async
function make_movie_async( $tag, $handle, $src )
{
    if ( 'movie' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' async", $tag );
}
add_filter( 'script_loader_tag', 'make_movie_async', 10, 3 );

function make_script_min_async( $tag, $handle, $src )
{
    if ( 'script' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' async", $tag );
}
add_filter( 'script_loader_tag', 'make_script_min_async', 10, 3 );

function make_modal_defer( $tag, $handle, $src )
{
    if ( 'modal' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' defer", $tag );
}
add_filter( 'script_loader_tag', 'make_modal_defer', 10, 3 );

function make_tv_async( $tag, $handle, $src )
{
    if ( 'tv' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' async", $tag );
}
add_filter( 'script_loader_tag', 'make_tv_async', 10, 3 );

function make_favorite_async( $tag, $handle, $src )
{
    if ( 'moviewp-favorite' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' async", $tag );
}
add_filter( 'script_loader_tag', 'make_favorite_async', 10, 3 );

function make_script_async( $tag, $handle, $src )
{
    if ( 'live_search' != $handle ) {
        return $tag;
    }

    return str_replace( "<script type='text/javascript'", "<script type='text/javascript' async", $tag );
}
add_filter( 'script_loader_tag', 'make_script_async', 10, 3 );


// font awesome
add_action( 'wp_head', 'moviewp_font_awesome', 8 );
function moviewp_font_awesome() {

?>
<link rel='preload' as='style' href='https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css' onload="this.rel='stylesheet'" />
<link rel='preload' href='https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0' as='font' type='font/woff2' crossorigin />
<?php }




/*  
function scroll_script() {
	
    global $post;
    $moviewp_scroll = get_option('moviewppanel_scroll'); 
    if ( is_post_template( 'tv.php' ) ) {
	
    } elseif ( is_single() ) { 
	
	} elseif ( is_page( 'favorites' ) ) { 
	
	} else { 

    if ($moviewp_scroll == 1) { 

	wp_enqueue_script( 'moviewp-scroll', get_template_directory_uri() . '/assets/js/moviewp-scroll.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'scroll', get_template_directory_uri() . '/assets/js/scroll.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
} 
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/assets/js/vendor.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
 }
}
add_action( 'wp_enqueue_scripts', 'scroll_script' );	
*/


// Register scroll Script
$moviewp_scroll = get_option('moviewppanel_scroll');
if ($moviewp_scroll == 1) {
function scroll_script() {
if ( is_single() ) {

} elseif ( is_page( 'alphabet' ) ) {

} elseif ( is_page( 'contact' ) ) {

} elseif ( is_post_type_archive( 'article' ) ) {

} elseif ( is_page( 'favorites' ) ) {

} else {

	wp_enqueue_script( 'moviewp-scroll', get_template_directory_uri() . '/assets/js/moviewp-scroll.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_enqueue_script( 'scroll', get_template_directory_uri() . '/assets/js/scroll.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
}

}
add_action( 'wp_enqueue_scripts', 'scroll_script' );
}



// Register grid Script

function vendor_script() {
if ( is_single() ) {

} else {

	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/assets/js/vendor.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
}

}
add_action( 'wp_enqueue_scripts', 'vendor_script' );

function collections_script() {
if ( is_page( 'collection' ) ) {
wp_enqueue_script( 'collections', get_template_directory_uri() . '/assets/js/collections.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
}

}
add_action( 'wp_enqueue_scripts', 'collections_script' );