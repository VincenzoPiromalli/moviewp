<?php
/**
 *
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

//free
$user_key = 'dilav';

//function limit the_content
add_filter("the_content", "break_text");
function break_text($text){
  if(is_single())
  {
    $length = 450;
    if(strlen($text)<$length+10) return $text;
	
    $break_pos = strpos($text, ' ', $length);
    $visible = substr($text, 0, $break_pos);
    return balanceTags($visible) . " …";
  }else{
  return $text;
  }
}

//function admin bar menu

add_action( 'admin_bar_menu', 'customize_admin_bar', 999);
function customize_admin_bar()
{
    global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
    return;
	
    $wp_admin_bar->add_menu( array(
	'id' => 'wp-admin-bar-moviewp',
        'title' => 'MovieWP',
        'href' => admin_url('admin.php?page=moviewppanel-main'),
    ) );
 
    $wp_admin_bar->add_menu( array(
	'id' => 'moviewp-general',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'General',
        'href' => admin_url('admin.php?page=moviewppanel-main'),
    ) );
 
    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-branding',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Branding',
        'href' => admin_url('admin.php?page=moviewppanel-branding'),
    ) );

    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-translate',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Translate',
        'href' => admin_url('admin.php?page=moviewppanel-translate'),
    ) );
	
    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-social',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Social',
        'href' => admin_url('admin.php?page=moviewppanel-socialnetworks'),
    ) );
	
    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-comments',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Comments',
        'href' => admin_url('admin.php?page=moviewppanel-comments'),
    ) );
	
    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-advertising',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Advertising',
        'href' => admin_url('admin.php?page=moviewppanel-advertising'),
    ) );
	
    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-player',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Player',
        'href' => admin_url('admin.php?page=moviewppanel-player'),
    ) );
	
    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-additional',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Additional',
        'href' => admin_url('admin.php?page=moviewppanel-additional'),
    ) );
	
    $wp_admin_bar->add_menu( array(
        'id' => 'moviewp-reset',
        'parent' => 'wp-admin-bar-moviewp',
        'title' => 'Reset',
        'href' => admin_url('admin.php?page=moviewppanel-reset'),
    ) );
}

//function editor style support

add_editor_style( 'assets/css/editor.css' );

//function custom content width

if ( ! isset( $content_width ) ) {
	$content_width = '100%';
}

//function custom post template

if ( ! function_exists( 'is_post_template' ) ) {
function is_post_template($template = '') {
	if (!is_single()) {
		return false;
	}

	global $wp_query;

	$post = $wp_query->get_queried_object();
	$post_template = get_post_meta( $post->ID, 'custom_post_template', true );

	if ( empty( $template ) ) {
		if (!empty( $post_template ) ) {
			return true;
		}
	} elseif ( $template == $post_template) {
		return true;
	}

	return false;
}
}

//function list genres

function DropdownGenre() {
$args = array('hide_empty' => false, 'title_li'=> '', 'use_desc_for_title' => 0, 'show_count'=> 0, 'echo' => 0, 'exclude'  => array(1, 2));                
$links = wp_list_categories($args);
$links = str_replace('</a> (', '</a>', $links);
$links = str_replace(')', '', $links);
echo $links; 
}

//function list years

function DropdownYears() {
$terms = get_terms( array(
  'taxonomy' => 'years',
  'hide_empty' => true,
  'order' => 'DESC',
) );

if (!empty( $terms ) && ! is_wp_error($terms)){
  foreach ( $terms as $term ) {
    $class = ( is_tax('years', $term->slug) ) ? ' class="active"' : '';
    echo '<li'.$class.'><a href="' . get_term_link( $term ) .'">' . $term->name . '</a></li>
';  }
  }
}

//function list countries

function DropdownCountries() {
$terms = get_terms( array(
  'taxonomy' => 'country',
  'hide_empty' => true,
  'order' => 'ASC',
) );

if (!empty( $terms ) && ! is_wp_error($terms)){
  foreach ( $terms as $term ) {
    $class = ( is_tax('country', $term->slug) ) ? ' class="active"' : '';
    echo '<li'.$class.'><a href="' . get_term_link( $term ) .'">' . $term->name . '</a></li>
';  }
  }
}

//function list quality

function DropdownQuality() {
$terms = get_terms( array(
  'taxonomy' => 'quality',
  'hide_empty' => true,
  'order' => 'DESC',
) );

if (!empty( $terms ) && ! is_wp_error($terms)){
  foreach ( $terms as $term ) {
    $class = ( is_tax('quality', $term->slug) ) ? ' class="active"' : '';
    echo '<li'.$class.'><a href="' . get_term_link( $term ) .'">' . $term->name . '</a></li>
';  }
  }
}

//function excerpt

function SinglePlot($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;
	if(mb_strlen($excerpt) > $charlength) {
		$subex   = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut   = - (mb_strlen($exwords[ count($exwords) - 1]));
		if($excut < 0) {
			echo mb_substr($subex, 0, $excut);
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}

//function current category

function current_category() {
    global $cat;
    if (is_category() && $cat) {
        return $cat;
    } else {
        $var = get_the_category();
        return $var[0]->cat_ID;
    }
} 

//function post thumbnail size

add_image_size( 'w92', 92, 138 );
add_image_size( 'w220', 220, 330 );
add_image_size( 'w500', 500, 750 );
add_image_size( 'w780', 780, 1170 );

if ( function_exists( "add_theme_support" ) )
{
    add_theme_support( "post-thumbnails" );
    set_post_thumbnail_size( 600, 900, true );
}

//function remove page fields

function remove_page_fields() {
	remove_meta_box( 'revisionsdiv','post','normal' );
	remove_meta_box( 'authordiv' , 'post' , 'normal' ); 
	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );
	//remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_page_fields' );

//Remove p tags

remove_filter( 'the_content', 'wpautop' );

//function hide notice

function moviewp_hide_notice($a, $function) {
    if($function == 'add_submenu_page') return false;
}
add_filter('doing_it_wrong_trigger_error','moviewp_hide_notice',10,2);

//function search all taxonomies

function atom_search_where($where){
  global $wpdb;
  if (is_search())
    $where .= "OR (t.name LIKE '%".get_search_query()."%' AND {$wpdb->posts}.post_status = 'publish')";
  return $where;
}
function atom_search_join($join){
  global $wpdb;
  if (is_search())
    $join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
  return $join;
}
function atom_search_groupby($groupby){
  global $wpdb;
  $groupby_id = "{$wpdb->posts}.ID";
  if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;
  if(!strlen(trim($groupby))) return $groupby_id;
  return $groupby.", ".$groupby_id;
}
add_filter('posts_where','atom_search_where');
add_filter('posts_join', 'atom_search_join');
add_filter('posts_groupby', 'atom_search_groupby');


//function limit terms actors

add_filter( "term_links-actors", 'limit_terms');

function limit_terms($val) {
    return array_splice($val, 0, 5);
}

//function limit post tag

add_filter('term_links-post_tag','limit_to_five_tags');
function limit_to_five_tags($terms) {
return array_slice($terms,0,3,true);
}

// prevent duplicate *hack

add_action( 'pre_get_posts', function ( $q ) 
{
    if (     $q->is_home() // Target the home page only
          && $q->is_main_query() // Target only the main query
    ) {
        $meta_query = array(
            array(
                'key' => 'imdb_id'
            )
        );
        $q->set( 'meta_query', $meta_query );
    }
});

//function pagination

add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="next"';
}
function posts_link_attributes_2() {
    return 'class="prev"';
}

function pagination($pages = '', $range = 2) {
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)  {
         echo "<div class=\"infinite\"><div class=\"pagination\">
";if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "";if($paged > 1 && $showitems < $pages) echo "<a aria-label='prev' class='arrow_pag' href='".get_pagenum_link($paged - 1)."'><i id='prevpagination' class='fa fa-caret-left'></i></a>";for ($i=1; $i <= $pages; $i++) {if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>
";}}if ($paged < $pages && $showitems < $pages) echo "<a aria-label='next' class='next arrow_pag' href=\"".get_pagenum_link($paged + 1)."\"><i id='nextpagination' class='fa fa-caret-right'></i></a>
";
if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "";
echo "</div>\n";
echo "<div class='resppages'>
";
			previous_posts_link('<span class="fa fa-caret-left"></span>');
			next_posts_link('<span class="fa fa-caret-right"></span>
');echo "</div></div>
";}
}

//function paginate links (?)

$links = paginate_links( array(
  'prev_next'          => false,
  'type'               => 'array'
) );

if ( $links ) :

    echo '<ul class="page-numbers">';

    if ( $prev_posts_link = get_previous_posts_link( 'Previous Page' ) ) :
        echo '<li class="prev-list-item">';
        echo $prev_posts_link;
        echo '</li>';
    endif;

    echo '<li>';
    echo join( '</li><li>', $links );
    echo '</li>';
    
    if ( $next_posts_link = get_next_posts_link( 'Next Page' ) ) :
        echo '<li class="next-list-item">';
        echo $next_posts_link;
        echo '</li>';
    endif;
    echo '</ul>';
endif;

//function SEO title pagination

/*  
function wpse24661_filter_wp_title( $title, $separator ) {

    global $paged;
    if ( $paged >= 2 ) {
        $title .= ' ' . 'Page ' . $paged;
    }    
    return $title;
}
add_filter( 'wp_title', 'wpse24661_filter_wp_title', 101, 2 );
*/

//function yoast change type

add_filter( 'wpseo_opengraph_type', 'yoast_change_opengraph_type', 10, 1 );

function yoast_change_opengraph_type( $type ) {

  if ( is_single() ) {
    return 'video.movie';
  } else {
    return $type;
  }
}

//function image search

function moviewp_image_search($name, $id, $size, $type = false, $return = false, $gtsml = false) {
    $img    = get_post_meta($id, $name, $single = true);
    $val    = explode("\n", $img);
    $mgsl = array();
    $count  = 0;
    foreach ($val as $valor) {
        if (!empty($valor)) {
            if (substr($valor, 0, 1) == "/") {
                $mgsl[] = 'https://image.tmdb.org/t/p/' . $size . '' . $valor . '';
            } else {
                $mgsl[] = $valor;
            }
            $count++;
        } else {
            if ($name == "poster_path" && $img == NULL) {
                $mgsl[] = esc_url('https://via.placeholder.com/92x138?text=No+Poster&000.webp');
            }
           
        }
    }
    if ($type) {
        $new = rand(0, $count);
        if ($mgsl[$new] != NULL) {
            if ($return) {
                return $mgsl[$new];
            } else {
                echo $mgsl[$new];
            }
        } else {
            if ($return) {
                return $mgsl[0];
            } else {
                echo $mgsl[0];
            }
        }
    } else {
        if ($return) {
            return $mgsl[0];
        } else {
            echo $mgsl[0];
        }
    }
}

function moviewp_get_meta( $value ) {
	global $post;
	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}
function moviewp_clear($text) {
	return wp_strip_all_tags(html_entity_decode($text));
}

//function live Search

function live_search() {
if( !is_single() ){
	wp_enqueue_script('live_search', get_template_directory_uri() .'/assets/js/live.search.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
	wp_localize_script( 
		'live_search', 
		'moviewpSearch', 
		array( 
			'api' => moviewp_url_search(),
			'nonce' => moviewp_create_nonce('moviewp-search-nonce'),
			'area' => ".live-search",
			'more' => "Show all",
			) 
		);
   }
}
add_action('wp_enqueue_scripts', 'live_search');

//function Verify nonce

function moviewp_verify_nonce( $id, $value ) {
    $nonce = get_option( $id );
    if( $nonce == $value )
        return true;
    return false;
}

//function Create nonce

function moviewp_create_nonce( $id ) {
    if( ! get_option( $id ) ) {
        $nonce = wp_create_nonce( $id );
        update_option( $id, $nonce );
    }
    return get_option( $id );
}


//function Search API URL

function moviewp_url_search() {
	return rest_url('/moviewp/search/');
}

//function Search Register API

function wpc_register_wp_api_search() {
	register_rest_route('moviewp', '/search/', array(
        'methods' => 'GET',
        'callback' => 'moviewp_live_search',
    ));
}
add_action('rest_api_init', 'wpc_register_wp_api_search');


//function search

function moviewp_live_search( $request_data ) {
   	$parameters = $request_data->get_params();
    $keyword = moviewp_clear($parameters['keyword']);
    $nonce = moviewp_clear($parameters['nonce']);
	$types = array('post');
	if( !moviewp_verify_nonce('moviewp-search-nonce', $nonce ) ) return array('error' => 'no_verify_nonce', 'title' => 'No data nonce' );
	if( !isset( $keyword ) || empty($keyword) ) return array('error' => 'no_parameter_given');
	if( strlen( $keyword ) <= 2 ) return array('error' => 'keyword_not_long_enough', 'title' => '' );

	$args = array(
		's' => $keyword,
		'post_type' => $types,
		'posts_per_page' => 5
	);
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
    	$data = array();
        while ( $query->have_posts() ) {
            $query->the_post();
            global $post;
            $data[$post->ID]['title'] = $post->post_title;
            $data[$post->ID]['url'] = get_the_permalink();
			if ( has_post_thumbnail() ) { 
				$data[$post->ID]['img']	= moviewp_image_search('poster_path', $post->ID, 'w92', false, true );
			} elseif ($dato = moviewp_get_meta('poster_path')) {
				$data[$post->ID]['img']	= moviewp_image_search('poster_path', $post->ID, 'w92', false, true );
			}
			if($dato = moviewp_get_meta('release_date')) {
				$data[$post->ID]['extra']['date'] = substr($dato, 0, 4);
			}
			if($dato = moviewp_get_meta('first_air_date')) {
				$data[$post->ID]['extra']['date'] = substr($dato, 0, 4);
			}
			$data[$post->ID]['extra']['imdb'] = moviewp_get_meta('imdbRating');
			$data[$post->ID]['extra']['imdb_id'] = moviewp_get_meta('imdb_id');
        }
        return $data;
    } else {
    	return array('error' => 'no_posts', 'title' => 'No results' );
    }
    wp_reset_postdata();
}


//function remove wp block 

function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css' );


//function display taxonomy terms without links

function get_taxonony_toDisplay($post_id, $taxonomy_name) {
$terms = wp_get_post_terms($post_id, $taxonomy_name);
$count = count($terms);
if ( $count > 0 ) {
    foreach ( $terms as $term ) {
        echo $term->name . ", ";
    }
}
}

//function hide specific category

add_filter( 'get_the_categories', 'remove_category_link' );

function remove_category_link( $categories ) {

    if ( is_admin() ) 
        return $categories;

    $remove = array();

    foreach ( $categories as $category ) {

	if ( $category->name == "Movies" ) continue;
	if ( $category->name == "TV Series" ) continue;
    $remove[] = $category;
    }
    return $remove;
}

//function order by taxonomies

function orderby_tax_clauses( $clauses, $wp_query ) {
    global $wpdb;
    $taxonomies = get_taxonomies();
    foreach ($taxonomies as $taxonomy) {
        if ( isset( $wp_query->query['orderby'] ) && $taxonomy == $wp_query->query['orderby'] ) {
            $clauses['join'] .=<<<SQL
LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
SQL;
            $clauses['where'] .= " AND (taxonomy = '{$taxonomy}' OR taxonomy IS NULL)";
            $clauses['groupby'] = "object_id";
            $clauses['orderby'] = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
            $clauses['orderby'] .= ( 'ASC' == strtoupper( $wp_query->get('order') ) ) ? 'ASC' : 'DESC';
        }
    }
    return $clauses;
}

add_filter('posts_clauses', 'orderby_tax_clauses', 10, 2 );

//function flush_rewrite

function moviewp_c() {
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'moviewp_c');

//function create genre tv series

wp_update_term(1, 'category', array(
    'name' => 'TV Series',
    'slug' => 'tv-series', 
    'description' => ''
));

//function create genre Movies

function _CreateMovies(){
$my_cat = array('cat_name' => 'Movies', 
    'category_description' => '',
     'category_nicename' => 'movies',
      'category_parent' => '');

wp_insert_category($my_cat);
}
add_action('admin_init','_CreateMovies');

//function add new content to columns 

function post_add_new_columns($columns)  {
        unset($columns['author']);
		$moviewp_comments = get_option('moviewppanel_comments');
		if ($moviewp_comments == 1) 
		{ 
        unset($columns['comments']);
        } else { 
		}
        unset($columns['tags']);
		$columns['categories'] = 'Genre';
		$columns['Poster'] = 'Poster';
		$columns['IMDB'] = 'ID';
		$columns['Type'] = 'Type';
        $columns['years'] = 'Year';
	    $columns['Rating'] = 'Rating';
	    $columns['Runtime'] = 'Runtime';
	return $columns;
}
add_filter('manage_edit-post_columns', 'post_add_new_columns');

function post_manage_columns($column_name, $id) {
	global $post;
	switch ($column_name) {
		case 'Rating':
		    $imdbRating = get_post_meta( $post->ID , 'imdbRating' , true );
			echo '<i style="color: #febf15;margin-right:5px;" class="fa fa-star"></i>'.$imdbRating.'';
			break;
		case 'Runtime':
			echo get_post_meta( $post->ID , 'Runtime' , true );
			break;
		case 'Poster':

			$poster_path = esc_html(get_post_meta($post -> ID, 'poster_path', true));
	        $poster92 = 'https://image.tmdb.org/t/p/w92'.$poster_path;
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$placeholder = esc_url('https://via.placeholder.com/92x138?text=No+Poster&000.jpg');
            if ( has_post_thumbnail() ) {
			//echo '<img width="53" height="80" src="'.esc_url($featured_img_url).'" />';
			echo '<img width="53" height="80" src="'.esc_url($poster92).'" />';
            } else {
            if ($poster_path == '') {
			echo '<img width="53" height="80" src="'.$placeholder.'" />';
            } else {
		    echo '<img width="53" height="80" src="'.esc_url($poster92).'" />';
            }
            }
			break;
		case 'IMDB':
			$imdb_id = get_post_meta( $post->ID , 'imdb_id' , true );
			$tmdb_id = get_post_meta( $post->ID , 'id' , true );
		    if ( in_category('tv-series') ) {
			echo '<code>'.$tmdb_id.'</code>';
			} else {
			echo '<code>'.$imdb_id.'</code>';
			}
			break;
		case 'Type':
		    if ( in_category('tv-series') ) {  _e('TV', 'moviewp');  } else {  _e('MOVIE', 'moviewp'); } 
			break;
		case 'years':
		    $years = get_post_meta( $post->ID , 'release_date' , true );
			if( $years == "" ){ 
			echo 'Unable to get year'; 
			} else {
		    echo ''.$years.'';
			}
			break;
	} 
}
add_action('manage_post_posts_custom_column', 'post_manage_columns', 10, 2);

//function make columns sortable

function post_columns_sortable($columns) {
	$custom = array(
		'years' => 'years',
		'Rating' => 'Rating',
	);
	return wp_parse_args($custom, $columns);
}
add_filter('manage_edit-post_sortable_columns', 'post_columns_sortable');

add_action('pre_get_posts', function($query) {
    if (!is_admin()) {
        return;
    }
    $orderby = $query->get('orderby');
    if ($orderby == 'years') {
        $query->set('meta_key', 'release_date');
        $query->set('orderby', 'meta_value_num');
    }
    if ($orderby == 'Rating') {
        $query->set('meta_key', 'imdbRating');
        $query->set('orderby', 'meta_value_num');
    }
});

//function enable tv

$moviewp_enabletv = get_option('moviewppanel_enabletv');
if ($moviewp_enabletv == 1) { 
add_action('admin_head', 'enable_tv');
function enable_tv() {
echo '<style>#TV{display: inline-block !important;}</style>';
  }
}

//function switch

$moviewp_switch = get_option('moviewppanel_switch');
if ($moviewp_switch == 1) { 
add_action('admin_head', 'switch_show');
function switch_show() {
echo '<style>
#selector{display: block !important;}
#selector-description{display: block !important;}
#test > div.inside > div > div > ul > li.rwmb-tab-tab_4{display: block;}
#untitled > div.inside > div > div:nth-child(16){display: block !important;}
#untitled > div.inside > div > div:nth-child(17){display: block !important;}
#untitled > div.inside > div > div:nth-child(18){display: block !important;}
</style>';
}
 } else { 
add_action('admin_head', 'switch_hide');
function switch_hide() {
echo '<style>
#acf-group_603e7de764b6e > div.inside.acf-fields.-top > div.acf-tab-wrap.-top > ul > li:nth-child(4){display: none !important;}
#selector{display: none !important;}
#selector-description{display: none !important;}
#test > div.inside > div > div > ul > li.rwmb-tab-tab_4{display: none !important;}
#untitled > div.inside > div > div:nth-child(16){display: none !important;}
#untitled > div.inside > div > div:nth-child(17){display: none !important;}
#untitled > div.inside > div > div:nth-child(18){display: none !important;}
</style>';
}
} 

//function enable multiserver

$moviewp_multiserver = get_option('moviewppanel_multiserver');
if ($moviewp_multiserver == 0) {
add_action('admin_head', 'enable_multiserver');
function enable_multiserver() {
echo '<style>#acf-group_603e7de764b6e > div.inside.acf-fields.-top > div.acf-tab-wrap.-top > ul > li:nth-child(6){display: none !important;}</style>';
  }
}

//function enable tv download

$moviewp_tvdl = get_option('moviewppanel_tvdl');
if ($moviewp_tvdl == 0) {
add_action('admin_head', 'enable_tvdl');
function enable_tvdl() {
echo '
<style>
[data-name="down"]{display: none !important;}
[data-name="link"]{width: 100% !important;}
</style>';
  }
}

//function custom buttons

add_action('admin_head', 'my_custom_buttons');

function my_custom_buttons() {
  echo '<style>
#acf-group_603efa100d159 > div.postbox-header{display:none!important;}
#acf-group_603efa100d159{border:1px solid #ccd0d4;}
#acf-group_603efa100d159 > div.inside.acf-fields {margin-left: 0px !important;margin-right: 0px !important;}
#Generator.acf-field input[type="text"]{width: auto!important;}
#Generator.postbox{border:0!important;}
#test{display:none;}
#Generator.acf-field .acf-label{display:none!important;}
#meta-box-notification, .rwmb-activate-license{display:none;}
input#fetchmovie{cursor:pointer;display: inline-block;}
input#fetchm{text-align:left!important; display: inline-block!important;}
input#fetchtv{cursor:pointer;display: inline-block!important;width:57px!important;}
input#fetcht{text-align:left!important; display: inline-block!important;}
#term{font-size:22px;}
span#api_status{float:right;position:relative;margin-right:30px;}
span#TV{margin-right:10px;}
span#film{margin-right:10px;}
.rotondo{color: rgb(139, 231, 31);margin-right:10px;}
.culo{float:left;position:relative;top:3px;}
.desc{font-size: 12px;color: #777;margin-top:10px;background-color: #fff;}
#Generator > div.inside > h2{font-weight: 600;padding: 8px 12px;margin-left:-10px;border-bottom: 1px solid #eee;}
#postexcerpt.postbox .inside>p:last-child{display:none;}
#filter-by-date, #cat, #post-query-submit{display:none;}
#Movie\ Player{display:none;}
#TV{display:none;}
.generator-message {
position: relative;
display: block;
background: #46b450;
border-radius: 3px;
margin: 5px 0 15px;
padding: 1px 10px;
min-height: 0px;
}
.generator-message p {
font-size: 13px !important;
line-height: 1.4;
margin: 8px 0;
padding: 0;
text-shadow: none;
color: #fff;
}
#toplevel_page_moviewp_discover, #toplevel_page_moviewp_tv_discover{display:none;}
</style>';
}

//function title-tag

function wpse_add_title_support() {
    add_theme_support( 'title-tag' );
}
add_action ( 'after_setup_theme', 'wpse_add_title_support' );

//function remove unnecessary stuff

add_filter( 'wpseo_json_ld_output', '__return_false' );
add_filter('use_block_editor_for_post', '__return_false');
add_theme_support( 'automatic-feed-links' );

//function unregister all widgets

function unregister_default_widgets() {
unregister_widget('WP_Widget_Pages');
unregister_widget('WP_Widget_Media_Gallery');
unregister_widget('WP_Widget_Calendar');
unregister_widget('WP_Widget_Archives');
unregister_widget('WP_Widget_Links');
unregister_widget('WP_Widget_Meta');
unregister_widget('WP_Widget_Search');
unregister_widget('WP_Widget_Text');
unregister_widget('WP_Widget_Block');
unregister_widget('WP_Widget_Categories');
unregister_widget('WP_Widget_Recent_Posts');
unregister_widget('WP_Widget_Recent_Comments');
unregister_widget('WP_Widget_RSS');
unregister_widget('WP_Widget_Tag_Cloud');
unregister_widget('WP_Nav_Menu_Widget');
unregister_widget('Twenty_Eleven_Ephemera_Widget');
unregister_widget('WP_Widget_Media_Audio');
unregister_widget('WP_Widget_Media_Image');
unregister_widget('WP_Widget_Media_Video');
unregister_widget('WP_Widget_Custom_HTML');
}
add_action('widgets_init', 'unregister_default_widgets', 11);

//function remove menus

function wpdocs_remove_menus(){

  remove_submenu_page( 'themes.php', 'nav-menus.php' );  //Nav Menu
  remove_menu_page( 'jetpack' );                         //Jetpack* 
  remove_menu_page( 'meta-box' );
  $moviewp_comments = get_option('moviewppanel_comments');
	if ($moviewp_comments == 1) 
 { 
  remove_menu_page( 'edit-comments.php' );               //Comments
 } else { 
 }
   
}
add_action( 'admin_menu', 'wpdocs_remove_menus' );

//function load taxonomy templates

$moviewp_comments = get_option('moviewppanel_comments');
if ($moviewp_comments == 1) { 
add_filter( 'body_class', function( $classes ) {
if ( is_tax( 'creator' ) ) {
 $classes[] = 'detail';
 wp_dequeue_script( 'grid' ); 
 wp_dequeue_script( 'live_search' );
} elseif ( is_tax( 'director' ) ) {
 $classes[] = 'detail';
 wp_dequeue_script( 'grid' ); 
 wp_dequeue_script( 'live_search' );
} elseif ( is_tax( 'actors' ) ) {
 $classes[] = 'detail';
 wp_dequeue_script( 'grid' ); 
 wp_dequeue_script( 'live_search' );
} else {

}
return array_merge( $classes, array( 'custom' ) );
} 
);

add_filter( 'template_include', 'wpse_template_include' );
function wpse_template_include( $template ) {
    // Handle taxonomy templates.
    $taxonomy = get_query_var( 'taxonomy' );
    if ( is_tax() && $taxonomy ) {
	    //$file = get_theme_file_path() . '/template-parts/taxonomies/taxonomy-' . $taxonomy . '.php';
        $file = get_template_directory() . '/template-parts/taxonomies/taxonomy-' . $taxonomy . '.php';
        if ( file_exists( $file ) ) {
            $template = $file;
        }           
    }

    return $template;
}
} else { 
add_filter( 'body_class', function( $classes ) {

if ( is_tax( 'creator' ) ) {
 $classes[] = 'overview';
} elseif ( is_tax( 'director' ) ) {
 $classes[] = 'overview';
} elseif ( is_tax( 'actors' ) ) {
 $classes[] = 'overview';
} else {

}
return array_merge( $classes, array( 'custom' ) );
} 
);
}

//function fix rankmath compatibility

add_filter('rank_math/admin/disable_primary_term', '__return_true');

//function wp_body_open

if (!function_exists('wp_body_open')) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open()
    {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}

//function search form

function moviewp_my_search_form( $form ) {
$form = '<li class="search"><form method="get" role="form" id="searchform" autocomplete="off" action="' . home_url( '/' ) . '"><i class="fa fa-search"></i><input aria-label="' . search . '" id="search" name="s" type="search" class="search-input" value="' . get_search_query() . '" placeholder="' . search . '"></form><div class="live-search"></div></li>';
 return $form;
}
add_filter( 'get_search_form', 'moviewp_my_search_form' );


//function create initial pages

if (isset($_GET['activated']) && is_admin()){
    add_action('init', 'create_initial_pages');
}
function create_initial_pages() {

    $pages = array( 
         // Page Title and URL (a blank space will end up becomeing a dash "-")
        'Random' => array(
            // Page Content     // Template to use (if left blank the default template will be used)
            'Random Content'=>'pages/random.php'),

        'Top' => array(
            'Top Content'=>'pages/top.php'),

        'Contact' => array(
            'Contact Content'=>'pages/contact.php'),

        'Favorites' => array(
            'Favorites Content'=>'pages/favorites.php'),
			
        'Letter' => array(
            'Letter Content'=>'pages/letter.php'),
			
        'Alphabet' => array(
            'Alphabet Content'=>'pages/alphabet.php'),
       
	   'Collection' => array(
            'Collection Content'=>'pages/collection.php'),
			
	   'Networks' => array(
            'Networks Content'=>'pages/networks.php'),
    );

    foreach($pages as $page_url_title => $page_meta) {

        $id = get_page_by_title($page_url_title);

        foreach ($page_meta as $page_content=>$page_template){

            $page = array(
                'post_type'   => 'page',
                'post_title'  => $page_url_title,
                'post_name'   => $page_url_title,
                'post_status' => 'publish',
                'post_content' => $page_content,
                'post_author' => 1,
                'post_parent' => ''
            );

            if(!isset($id->ID)){
                $new_page_id = wp_insert_post($page);
                if(!empty($page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $page_template);
                }
            }
        }
    }
}

//function html tag schema

function html_tag_schema()
{
    $schema = 'http://schema.org/';

// Is single post
if(is_single())
    {
        $type = "Movie";
    }
    // Contact form page ID
    else if( is_page('contact') )
    {
        $type = 'ContactPage';
    }
    // Is search results page
    elseif( is_search() )
    {
        $type = 'SearchResultsPage';
    }
    else
    {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}


//custom post type (single) function

function my_cpt_post_types( $post_types ) {
	$post_types[] = 'post';
	$post_types[] = 'tv';
	return $post_types;
}
add_filter( 'cpt_post_types', 'my_cpt_post_types' );

//Modify admin footer text

function modify_footer() { ?>
<?php echo __('Created by ', 'moviewp'); ?><a href="<?php echo esc_url( __( 'https://fr0zen.store/', 'moviewp' ) ); ?>" target="_blank"><?php printf( __( 'fr0zen %s', 'moviewp' ),''); ?></a>
<?php }
add_filter( 'admin_footer_text', 'modify_footer' );


//function placeholder

//define	('placeholder', esc_url(get_template_directory_uri() .'/assets/images/placeholder.png'));
define	('placeholder_tv', esc_url(get_template_directory_uri() .'/assets/images/tv.png'));
define	('placeholder', "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA4AAAAv20BSAAcQEf0PRET/Aw==");

//remove undefinied errors

function idx($array, $key){
  if(isset($array[$key])){
    return $array[$key];
  }else{
    return NULL;
  }
}

//remove max-image-preview:large

remove_filter( 'wp_robots', 'wp_robots_max_image_preview_large' );

//Add Open Graph Meta Tags

$moviewp_seo = get_option('moviewppanel_seo');
if ($moviewp_seo == 1) { 
function meta_og() {
    global $post;

    if ( is_single() ) {
        $excerpt = strip_tags( $post->post_excerpt );
        $excerpt_more = '';
        if ( strlen($excerpt ) > 155) {
            $excerpt = substr( $excerpt,0,155 );
            $excerpt_more = ' ...';
        }
        $excerpt = str_replace( '"', '', $excerpt );
        $excerpt = str_replace( "'", '', $excerpt );
        $excerptwords = preg_split( '/[\n\r\t ]+/', $excerpt, -1, PREG_SPLIT_NO_EMPTY );
        array_pop( $excerptwords );
        $excerpt = implode( ' ', $excerptwords ) . $excerpt_more;
        ?>

<meta name="description" content="<?php echo $excerpt; ?>">
<meta property="og:title" content="<?php echo the_title(); ?>">
<meta property="og:description" content="<?php echo $excerpt; ?>">
<meta property="og:type" content="video.movie">
<meta property="og:url" content="<?php echo the_permalink(); ?>">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="og:image" content="<?php echo poster370(); ?>">

<?php
    } else {
        return;
    }
}
add_action('wp_head', 'meta_og', 5);
} 

//Slice crazy long div outputs

function category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
        $classes[] = $category->category_nicename;
        return array_slice($classes, 0,7);
}
add_filter('post_class', 'category_id_class');

add_action( 'init', function() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
    flush_rewrite_rules();
} );


//function remove menu from bar

function clear_node_title( $wp_admin_bar ) {
 
    // Get all the nodes
    $all_toolbar_nodes = $wp_admin_bar->get_nodes();
    // Create an array of node ID's we'd like to remove
    $clear_titles = array(
        'menus',
    );
 
    foreach ( $all_toolbar_nodes as $node ) {
 
        // Run an if check to see if a node is in the array to clear_titles
        if ( in_array($node->id, $clear_titles) ) {
            // use the same node's properties
            $args = $node;
 
            // make the node title a blank string
            $args->title = '';
 
            // update the Toolbar node
            $wp_admin_bar->add_node( $args );
        }
    }
}
add_action( 'admin_bar_menu', 'clear_node_title', 999 );

//function set post per page

$license_type = $user_key;  
function moviewp_posts_per_page($query) {
	$user_posts_per_page = get_option('posts_per_page');
    if ($user_posts_per_page < 24) {
		update_option('posts_per_page', 24);		
	}
}
add_action('pre_get_posts', 'moviewp_posts_per_page');



// set a default og image value so wpseo_opengraph_image is triggered
function default_og_image ($image)
{
     global $post;
     if (is_singular('post')) {
        if (!$image -> has_images()) {
            $image -> add_image('default'); 
             } 
        } 
    } 
add_action('wpseo_add_opengraph_additional_images', 'default_og_image');

// set the default share image
function default_share_image ($image)
{
     global $post;
     if (is_singular('post')) {
        if (!$image || $image === 'default') { 
		
             $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
             $poster_path = get_post_meta($post -> ID, 'poster_path', true);
             $full_poster_path = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster_path;
             $image = $full_poster_path;
			 
             if ($poster_path == '') {
                if (has_post_thumbnail()) {
                    $image = esc_url($featured_img_url);
                     } else {
                    
                    $image = esc_url('https://via.placeholder.com/600x900?text=No+Poster&000.jpg');
					
                     } 
                } else {
                
                $image = $full_poster_path;

                } 
        } 
        return $image;
	  } 
} 
add_action('wpseo_twitter_image', 'default_share_image');
add_action('wpseo_opengraph_image', 'default_share_image');


// sort query
add_action( 'pre_get_posts', 'my_view_filter' );
function my_view_filter($query){
    if ( 
        !is_admin() && 
        $query->is_main_query() && 
        ( $query->is_home() || $query->is_archive() || $query->is_search() )
    ) {
        if (isset($_REQUEST['order'])) {
            $order = $_REQUEST['order'];
        }
		if(!empty($order))
        if ( $order === 'views') {
            $query->set('meta_key', 'post_views_count');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'DESC');
        }
    }
}

add_action( 'pre_get_posts', 'my_like_filter' );
function my_like_filter($query){
    if ( 
        !is_admin() && 
        $query->is_main_query() && 
        ( $query->is_home() || $query->is_archive() || $query->is_search() )
    ) {
        if (isset($_REQUEST['order'])) {
            $order = $_REQUEST['order'];
        }
		if(!empty($order))
        if ( $order === 'like') {
            $query->set('meta_key', '_post_like_count');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'DESC');
        }
    }
}


add_action( 'pre_get_posts', 'my_comment_filter' );
function my_comment_filter($query){
    if ( 
        !is_admin() && 
        $query->is_main_query() && 
        ( $query->is_home() || $query->is_archive() || $query->is_search() )
    ) {
        if (isset($_REQUEST['order'])) {
            $order = $_REQUEST['order'];
        }
		if(!empty($order))
        if ( $order === 'comments') {
            $query->set('orderby', 'comment_count');
            $query->set('order', 'DESC');
        }
    }
}


// report post dequeque
function scp_assets_dequeue() {
//global $post;
if ( is_single() ) {
 //null
 } else {
wp_dequeue_style( 'wp-report-post' ); 
wp_dequeue_style( 'remodal' ); 
wp_dequeue_script( 'remodal' ); 
wp_dequeue_script( 'report-post' ); 
wp_dequeue_script( 'recaptcha' ); 
 }
} 
add_action( 'wp_enqueue_scripts', 'scp_assets_dequeue', 9999);

// contac form 7 dequeque
function dvk_dequeue_scripts() {

    $load_scripts = false;

    if( is_singular() ) {
    	$post = get_post();

    	if( has_shortcode($post->post_content, 'contact-form-7') ) {
        	$load_scripts = true;
    	}

    }

    if( ! $load_scripts ) {
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_style( 'contact-form-7' );
    }

}

add_action( 'wp_enqueue_scripts', 'dvk_dequeue_scripts', 99 );

// autoembed movies
add_action('generate_rewrite_rules', 'moviewp_rw');
function moviewp_rw($wp_rewrite) {
   $newrules = array();
   $new_rules['^player-movie.php$'] = 'index.php?auto=true';
   $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action( 'query_vars', 'moviewp_query_vars' );
function moviewp_query_vars( $query_vars )
{
    $query_vars[] = 'auto';
    return $query_vars;
}

add_action( 'parse_request', 'moviewp_parse_request' );
function moviewp_parse_request( &$wp )
{
    if ( array_key_exists( 'auto', $wp->query_vars ) ) {
        require_once get_template_directory() . '/player/player-movie.php';
        exit();
    }
}



// autoembed series
add_action('generate_rewrite_rules', 'moviewp_tv_rw');
function moviewp_tv_rw($wp_rewrite) {
   $newrules = array();
   $new_rules['^player-tv.php$'] = 'index.php?tv=true';
   $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action( 'query_vars', 'moviewp_tv_query_vars' );
function moviewp_tv_query_vars( $query_vars )
{
    $query_vars[] = 'tv';
    return $query_vars;
}

add_action( 'parse_request', 'moviewp_tv_parse_request' );
function moviewp_tv_parse_request( &$wp )
{
    if ( array_key_exists( 'tv', $wp->query_vars ) ) {
        require_once get_template_directory() . '/player/player-tv.php';
        exit();
    }
}
//license type
$MOVIEWP_LICENSE = strrev ( $license_type );

function remove_powered_by()
{
    remove_action('wp_footer', 'powered_by');
}
add_action('init','remove_powered_by', 15);



// getplay
add_action('generate_rewrite_rules', 'moviewp_getplay_rw');
function moviewp_getplay_rw($wp_rewrite) {
   $newrules = array();
   $new_rules['^getPlay.php$'] = 'index.php?play=true';
   $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action( 'query_vars', 'moviewp_getplay_query_vars' );
function moviewp_getplay_query_vars( $query_vars )
{
    $query_vars[] = 'play';
    return $query_vars;
}

add_action( 'parse_request', 'moviewp_getplay_parse_request' );
function moviewp_getplay_parse_request( &$wp )
{
    if ( array_key_exists( 'play', $wp->query_vars ) ) {
        require_once get_template_directory() . '/player/getPlay.php';
        exit();
    }
}



// getembed
add_action('generate_rewrite_rules', 'moviewp_embed_rw');
function moviewp_embed_rw($wp_rewrite) {
   $newrules = array();
   $new_rules['^getEmbed.php$'] = 'index.php?embed=true';
   $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action( 'query_vars', 'moviewp_embed_query_vars' );
function moviewp_embed_query_vars( $query_vars )
{
    $query_vars[] = 'embed';
    return $query_vars;
}

add_action( 'parse_request', 'moviewp_embed_parse_request' );
function moviewp_embed_parse_request( &$wp )
{
    if ( array_key_exists( 'embed', $wp->query_vars ) ) {
        require_once get_template_directory() . '/player/getEmbed.php';
        exit();
    }
}


// getplay_tv
add_action('generate_rewrite_rules', 'moviewp_getplay_tv_rw');
function moviewp_getplay_tv_rw($wp_rewrite) {
   $newrules = array();
   $new_rules['^getPlayTV.php$'] = 'index.php?playtv=true';
   $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action( 'query_vars', 'moviewp_getplay_tv_query_vars' );
function moviewp_getplay_tv_query_vars( $query_vars )
{
    $query_vars[] = 'playtv';
    return $query_vars;
}

add_action( 'parse_request', 'moviewp_getplay_tv_parse_request' );
function moviewp_getplay_tv_parse_request( &$wp )
{
    if ( array_key_exists( 'playtv', $wp->query_vars ) ) {
        require_once get_template_directory() . '/player/getPlayTV.php';
        exit();
    }
}



// getembed tv
add_action('generate_rewrite_rules', 'moviewp_embed_tv_rw');
function moviewp_embed_tv_rw($wp_rewrite) {
   $newrules = array();
   $new_rules['^getEmbedTV.php$'] = 'index.php?embedtv=true';
   $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

add_action( 'query_vars', 'moviewp_embed_tv_query_vars' );
function moviewp_embed_tv_query_vars( $query_vars )
{
    $query_vars[] = 'embedtv';
    return $query_vars;
}

add_action( 'parse_request', 'moviewp_embed_tv_parse_request' );
function moviewp_embed_tv_parse_request( &$wp )
{
    if ( array_key_exists( 'embedtv', $wp->query_vars ) ) {
        require_once get_template_directory() . '/player/getEmbedTV.php';
        exit();
    }
}



function article() {
    global $post;
    //if (is_post_template( 'article.php' ) && is_singular('article')){
    if ( is_singular( 'article' ) ) {
        $serverfilepath = TEMPLATEPATH.'/assets/css/article.css';
        $publicfilepath = get_template_directory_uri();
        $publicfilepath .= '/assets/css/article.css?ver=3.8.7';
        if (file_exists($serverfilepath)) {
            echo "<link rel='stylesheet' id='article-css' href='$publicfilepath' type='text/css' media='screen' />"."\n";
        }
    }
}
add_action('wp_head', 'article');

function blog() {
    global $post;
    //if (is_post_template( 'article.php' ) && is_singular('article')){
    if ( is_post_type_archive( 'article' ) ) {
        $serverfilepath = TEMPLATEPATH.'/assets/css/blog.css';
        $publicfilepath = get_template_directory_uri();
        $publicfilepath .= '/assets/css/blog.css?ver=3.8.7';
        if (file_exists($serverfilepath)) {
            echo "<link rel='stylesheet' id='blog-css' href='$publicfilepath' type='text/css' media='screen' />"."\n";
        }
    }
}
add_action('wp_head', 'blog');