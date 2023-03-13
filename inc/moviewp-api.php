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

/*====================================*\
	function moviewp api js
\*====================================*/

function moviewp_api() { 
global $post;

if( !is_object($post) ) 
return;

$imdbid = esc_html(get_post_meta($post -> ID, 'imdb_id', true));
$tmdbid = esc_html(get_post_meta($post -> ID, 'id', true));
$post_template = get_post_meta( $post->ID, 'custom_post_template', true );
?>
<script>
jQuery.fn.extend({live:function(e,t){this.selector&&jQuery(document).on(e,this.selector,t)}});
var Xapilanguage="<?php echo apilanguage; ?>",Xapikey="<?php echo apikey; ?>",Xomdb="<?php echo omdb; ?>",Xyear="years",Xcountry="country",Xdirector="director",Xactors="actors",Xcreator="creator",Xnetwork="networks",Xtvshows="TV Series",XAdventure="Adventure",XSciFi="Science Fiction",Xgenrmovie="Movies",snd=new Audio("<?php echo esc_url( get_template_directory_uri() ); ?>/assets/sound/swiftly.mp3");
jQuery(document).ready(function ($) {
$('#test').delay(500).fadeIn(500);
<?php if( $post_template == "tv.php" ){ ?>
$("input[name='test'][value='tv']").prop('checked', true);
$('#tvform').removeClass('hide');
$('#movieform').addClass('hide');
<?php } ?>
<?php if ($imdbid != '') { ?>
$('input[name="fetchm"]').val('<?php echo $imdbid; ?>');
<?php } ?>
<?php if ($tmdbid != '') { ?>
$('input[name="fetcht"]').val('<?php echo $tmdbid; ?>');
<?php } ?>
});
</script>
<?php
wp_enqueue_script("moviewp_api", get_template_directory_uri() . "/assets/api/js/api.js", null, strtotime('now'), true);
}
add_action('admin_footer', 'moviewp_api');

/*====================================*\
	function generator api
\*====================================*/

function generator_api( $field ) {
global $post;

if( !is_object($post) ) 
return;

$imdbid = esc_html(get_post_meta($post -> ID, 'imdb_id', true));
$tmdbid = esc_html(get_post_meta($post -> ID, 'id', true));
$post_template = get_post_meta( $post->ID, 'custom_post_template', true );

if ($field['key'] == "field_603efa3f589d9"){

echo '<input type="text" id="term" class="textInput" autocomplete="off" placeholder="'.esc_attr( 'Search...' ).'">';
echo '<div id="major-publishing-actions" style="overflow:hidden">';
echo '<div id="publishing-action" class="fetch-details">';
echo '<span class="culo">';
echo '<span id="hideme">';
if( $post_template == "tv.php" ){
echo '<input type="radio" name="test" value="'.esc_attr( 'movie' ).'" required="">';
} else {
echo '<input type="radio" name="test" value="'.esc_attr( 'movie' ).'" required="" checked="">';
}
echo '<span id="film">'.esc_attr( 'Movie' ).'</span>';
if( $post_template == "tv.php" ){
echo '<input id="TV" type="radio" name="test" value="'.esc_attr( 'tv' ).'" required="" checked="">';
} else {
echo '<input id="TV" type="radio" name="test" value="'.esc_attr( 'tv' ).'">';
}
echo '<span id="TV">'.esc_attr( 'TV' ).'</span>';
echo '<span id="movieform">';
echo '<input title="fetchm" placeholder="'.esc_attr( 'IMDb ID' ).'" type="text" id="fetchm" name="fetchm" value=""> ';
echo '<input type="button" class="button button-primary" id="fetchmovie" name="fetchmovie" value="'.esc_attr( 'Movie' ).'">';
echo '</span>';
echo '<span id="tvform" class="hide">';
echo '<input title="fetcht" placeholder="'.esc_attr( 'TMDb ID' ).'" type="text" id="fetcht" name="fetcht" value=""> ';
echo '<input type="button" id="fetchtv" class="button button-primary" name="fetchtv" value="'.esc_attr( 'TV' ).'">';
echo '</span>';
echo '</span>';
echo '</span>';
echo '<span id="publishme">';
echo '</span>';
echo '<span id="api_status">';
echo '<i class="fa fa-circle rotondo"></i>'.esc_html__( 'API is online', 'moviewp' ).'';
echo '</span>';
echo '<div id="message">';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<ul id="pagination">';
echo '</ul>';

    }

}
add_action( 'acf/render_field', 'generator_api', 10, 1 );
