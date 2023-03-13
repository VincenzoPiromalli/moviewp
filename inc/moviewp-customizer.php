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

$moviewp_customizer = get_option('moviewppanel_customizer');
if ($moviewp_customizer == 1) {

add_theme_support( 'custom-background' );

class moviewp_Customize {

   public static function register ( $wp_customize ) {
      $wp_customize->add_section( 'moviewp_options', 
         array(
		 'title'       => __( 'moviewp Options', 'moviewp' ), 
            'priority'    => 35, 
            'capability'  => 'edit_theme_options', 
            'description' => __('Allows you to customize some example settings for moviewp.', 'moviewp'), 
         ) 
      );
      
      //Background
      $wp_customize->remove_control( 'background_color' );
      $wp_customize->add_setting( 'html_color', 
         array(
            'default'    => '', 
            'type'       => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport'  => 'postMessage', 
            'sanitize_callback' => 'sanitize_hex_color',
         ) 
      );      

      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'moviewp_html_color', 
         array(
            'label'      => __( 'Background & Actions Color', 'moviewp' ), 
            'settings'   => 'html_color', 
            'priority'   => 10, 
            'section'    => 'colors', 
         ) 
      ) );
      
      //Header
      $wp_customize->add_setting( 'header_color', 
         array(
            'default'    => '', 
            'type'       => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport'  => 'postMessage', 
            'sanitize_callback' => 'sanitize_hex_color',
         ) 
      );      

      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'moviewp_header_color', 
         array(
            'label'      => __( 'Header & Sidebar Color', 'moviewp' ), 
            'settings'   => 'header_color', 
            'priority'   => 10, 
            'section'    => 'colors', 
         ) 
      ) );
      
      //Menù
      $wp_customize->add_setting( 'secondary_color', 
         array(
            'default'    => '', 
            'type'       => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport'  => 'postMessage', 
            'sanitize_callback' => 'sanitize_hex_color',
         ) 
      );      

      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'moviewp_secondary_color', 
         array(
            'label'      => __( 'Menù Color', 'moviewp' ), 
            'settings'   => 'secondary_color', 
            'priority'   => 10, 
            'section'    => 'colors', 
         ) 
      ) );

      //Container
      $wp_customize->add_setting( 'style_color', 
         array(
            'default'    => '', 
            'type'       => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport'  => 'postMessage', 
            'sanitize_callback' => 'sanitize_hex_color',
         ) 
      );      
      
      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'moviewp_style_color', 
         array(
            'label'      => __( 'Container Color', 'moviewp' ), 
            'settings'   => 'style_color', 
            'priority'   => 10, 
            'section'    => 'colors', 
         ) 
      ) );
      
      //Buttons
      $wp_customize->add_setting( 'link_textcolor', 
         array(
            'default'    => '', 
            'type'       => 'theme_mod', 
            'capability' => 'edit_theme_options', 
            'transport'  => 'postMessage', 
            'sanitize_callback' => 'sanitize_hex_color',
         ) 
      );      

      $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'moviewp_link_textcolor', 
         array(
            'label'      => __( 'Buttons Color', 'moviewp' ), 
            'settings'   => 'link_textcolor', 
            'priority'   => 10, 
            'section'    => 'colors', 
         ) 
      ) );

      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
      $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
      //$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
      //$style_color = get_theme_mod( 'style_color', '' ); 
      //$link_textcolor = get_theme_mod( 'link_textcolor', '' ); 
      
   }
   public static function header_output() {
?>

<!--Customizer CSS--> 
<style type="text/css">
<?php $style_color = get_theme_mod( 'style_color', '' ); ?>
<?php $link_textcolor = get_theme_mod( 'link_textcolor', '' ); ?>
<?php self::generate_css('html, .detail .movie-actions ul>li#views, .detail .movie-actions ul>li#like, .detail .movie-actions ul>li#share, .detail .movie-actions ul>li#trailer, .detail .movie-actions ul>li#multidownload, .detail .movie-actions .extra li#download-button', 'background', 'html_color'); ?>
<?php self::generate_css('#contactform input[type=text],#contactform textarea,#main #header-secondary .filters ul li.dropdown.open>ul,#main #header-secondary .filters ul li.dropdown.open>ul.dropdown-menu-large,#main #header-secondary .filters ul ul li,#main #header-secondary .filters ul ul li.active,#main #header-secondary .filters ul ul li:hover,#main #header-secondary .filters>ul>li,#main #main-header .header-nav .register a:hover,#main #main-header .header-nav .user-normal ul li .username,#main #main-header .header-nav .user-normal.active .dropdown-toggle,#main #main-header .header-nav .user-normal.dropdown.open>.dropdown-toggle,#main #main-header .inner-container,#select_sortby,#serie-tv li.episodi,#sidebar,.actions-list>li,.detail #content .movie-info .movie-actions ul li#server-button.open>.dropdown-toggle .server-type,.detail .movie-actions ul li.open .dropdown-toggle,.detail .movie-actions ul ul li:hover, .favorite i:hover:after,.modal-skin-default.modal-overlay,.tv-details-episodes ol li:nth-child(odd),.tv-details-seasons ol li:nth-child(odd),body .sidebar nav', 'background', 'header_color'); ?>
<?php self::generate_css('body, body.overview, body.overview #main, #main, body.detail.overview, body.overview.favorites, #main #header-secondary .sort ul li.active div, #site-container, .sb-site-container, #main #header-secondary .filters ul ul li.active, #main #header-secondary .filters ul ul li:hover', 'background', 'style_color'); ?> 
<?php if ( ! empty( $style_color ) ) { ?>
@media (max-width: 900px) {body.overview #main {background: <?php echo $style_color; ?>;}}@media (max-width: 600px) {.detail section#content .movie-background {background: no-repeat <?php echo $style_color; ?>;}#main #header-secondary .filters ul li.search {background: <?php echo $style_color; ?>;}}<?php } ?> 
<?php self::generate_css('.mobile-nav ul li.active a, .comment-reply, #commentform input[type="submit"], .resppages a, .pagination span.current, #serie-tv li.stagione, #content .item:not(.movie) .item-details .watch-btn span:last-child, .tv-details-episodes ol li:nth-child(odd).active, .tv-details-seasons ol li.active, .tv-details ol li.active, #main #main-header .logo.txt span, #main #header-secondary .filters ul li.dropdown.open > ul.dropdown-menu-large li a:hover:before, .detail .movie-actions .play, .detail .movie-actions .play:hover, ul li#quality-button .switch label.switch-toggle, #main #header-secondary .filters > ul > li.dropdown.grid.active', 'background', 'link_textcolor'); ?>
<?php if ( ! empty( $link_textcolor ) ) { ?>
.lds-ripple div{border:4px solid <?php echo $link_textcolor; ?>}#commentform #author:focus,#commentform #email:focus,#commentform #url:focus{border:1px solid <?php echo $link_textcolor; ?>}#commentform textarea:focus{border:1px solid <?php echo $link_textcolor; ?>}.blue:before{border:6px solid <?php echo $link_textcolor; ?>}span.favorite{color:<?php echo $link_textcolor; ?>}.detail .movie-actions .extra li#streaming-hd{background-color:<?php echo $link_textcolor; ?>;background-color:<?php echo $link_textcolor; ?>}.tv-details-episodes ol li.active:after,.tv-details-seasons ol li.active:after{border-color:transparent transparent transparent <?php echo $link_textcolor; ?>}#buttonposter, i.hd {background-color: <?php echo $link_textcolor; ?>;}#multiplayer {background-color: <?php echo $link_textcolor; ?>;}.live-search ul li .imdb span.fa-star{color: <?php echo $link_textcolor; ?>;}#main #header-secondary .filters ul li .dropdown-toggle.abc[aria-expanded="true"] {background-color: <?php echo $link_textcolor; ?>;}<?php } ?>
<?php self::generate_css('#main #header-secondary .filters ul li.dropdown.open > ul.dropdown-menu-large li input[type="checkbox"] + label:before, #main #header-secondary .filters ul ul li input[type="checkbox"] + label:before, select#select_sortby:focus > option:checked, #main #header-secondary .inner-container, #contactform input[type="text"]:focus, #contactform textarea:focus, .modal-skin-default .modal-ajax, .modal-skin-default .modal-inline, .modal-skin-default .modal-image img, .tv-details-episodes ol li, .tv-details-seasons ol li, .detail .movie-actions ul ul li, .detail #content .movie-info .movie-data span:first-child:before, .imdb-rating:hover:before, #main #header-secondary .filters ul li.dropdown.open > ul.dropdown-menu-large li a:before ', 'background', 'secondary_color'); ?> 
</style> 
<!--/Customizer CSS-->

<?php 

    }
   
   public static function live_preview() {
      wp_enqueue_script( 
           'moviewp-themecustomizer', 
           get_template_directory_uri() . '/assets/js/theme-customizer.js', 
           array(  'jquery', 'customize-preview' ), 
           '', 
           true 
      );
   }

   public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

add_action( 'customize_register' , array( 'moviewp_Customize' , 'register' ) );
add_action( 'wp_head' , array( 'moviewp_Customize' , 'header_output' ) );
add_action( 'customize_preview_init' , array( 'moviewp_Customize' , 'live_preview' ) );
}