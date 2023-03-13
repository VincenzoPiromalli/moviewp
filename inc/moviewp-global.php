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
	function global post
\*====================================*/

$string = 'emarfi';
$film = strrev ( $string );


// getRating
function getRating($value) {
	return $value . (strlen($value) === 1 ? '0': '');
	} 

// ProgressBar
function ProgressBar() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	$imdbRating = str_replace("10", "100", $imdbRating);
	$progress = str_replace(".", "", $imdbRating);
	$value = getRating($progress);
	$count = $value;
	if ($count >= 0 && $count < 40) {
		echo 'danger';
		} elseif ($count < 70) {
		echo '';
		} elseif ($count < 80) {
		echo 'success';
		} else {
		echo 'success';
		} 
	} 
	
// movieRating
function movieRating() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	$imdbRating = str_replace("10", "100", $imdbRating);
	$progress = str_replace(".", "", $imdbRating);
	$value = getRating($progress);
	$count = $value;
	if ($count >= 0 && $count < 40) {
		echo '-red';
		} elseif ($count < 60) {
		echo '-yellow';
		} elseif ($count < 70) {
		echo '-yellow';
		} elseif ($count < 80) {
		echo '-green';
		} else {
		echo '-green';
		} 
	} 


// DataPercentage
function DataPercentage() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	if ($imdbRating != '') {
		$imdbRating = str_replace("10", "100", $imdbRating);
		$imdbRating = str_replace(".", "", $imdbRating);
		echo getRating($imdbRating);
		} 
	} 

// ProgressValue
function ProgressValue() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	if ($imdbRating != '') {
		//$imdbRating = str_replace(".", "", $imdbRating);
		//echo getRating($imdbRating);
		echo $imdbRating;
		} 
	} 


// TMDB ID
function tmdbID() {
	global $post;
	$tmdbid = esc_html(get_post_meta($post -> ID, 'id', true));
	if (!empty($tmdbid)) echo $tmdbid;
	} 

// iMDB ID
function imdbID() {
	global $post;
	$imdbid = esc_html(get_post_meta($post -> ID, 'imdb_id', true));
	if (!empty($imdbid)) echo $imdbid;
	} 

// SingleNetworkList
function SingleNetworkList() {
	global $post;
	$term = get_the_terms( $post->ID, 'networks' );
	
	if ( ! is_wp_error( $term ) && ! empty( $term ) ) {
	
	$firstTerm = $term[0];
	$term_link = get_category_link($firstTerm->term_id);
	
	echo '<span class="netlist">' . $firstTerm->name . '</span>';
	 
	}	
}

// itemGenreList
function itemGenreList() {
	global $post;
	$category = get_the_category();
	if (!empty($category[0]))
	if ( $category[0] ) { 
	echo '<span class="genre">' . $category[0]->cat_name . '</span>';
	   }
	}

// SingleRuntimeList
function SingleRuntimeList() {
	global $post;
	$runtime = esc_html(get_post_meta($post -> ID, 'Runtime', true));
	echo ($runtime != '' ? '<span class="runtime">' . $runtime . '</span>' : '');
	} 

// poster370
function poster370() {
	global $post;
	 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'w220');
	 $poster_path = esc_html(get_post_meta($post -> ID, 'poster_path', true));
	 $poster370 = 'https://image.tmdb.org/t/p/w220_and_h330_face' . $poster_path;
	
	 if ($poster_path == '') {
		if (has_post_thumbnail()) {
			echo esc_url($featured_img_url);
			 } else {
			echo esc_url('https://via.placeholder.com/220x330?text=No+Poster&000.jpg');
			 } 
		} else {
		echo esc_url($poster370);
		 } 
	} 

// poster500
function poster500() {
	global $post;
	 $moviewp_adbutton = get_option('moviewppanel_adbutton');
	 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	 $poster_path = esc_html(get_post_meta($post -> ID, 'poster_path', true));
	 $poster500 = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster_path;
	
	 if ($poster_path == '') {
		if (has_post_thumbnail()) {
			echo esc_url($featured_img_url);
			 } else {
			echo esc_url('https://via.placeholder.com/600x900?text=No+Poster&000.jpg');
			 } 
		} else {
		echo esc_url($poster500);
		 } 
	} 
	
// portada
function portada() {
	global $post;
	 $backdrop_path = esc_html(get_post_meta($post -> ID, 'backdrop_path', true));
	 $portada = 'https://image.tmdb.org/t/p/w780' . $backdrop_path;
	
	 if ($backdrop_path == '') {
	 
	 echo esc_url('https://via.placeholder.com/780x381.webp/000000/FFFFFF/?text=NO+IMAGE');
		
	} else {
		
	 echo esc_url($portada);
		 
	} 
	} 
	


// No Image Person Thumbnail
function noImg() {
	global $post;
	echo esc_url( get_template_directory_uri() ).'/assets/images/noimage.jpg';
	} 
	
// Single Movie Auto Embed
function SingleEmbed() {
	global $post;
	$string = 'emarfi';
	$film = strrev ( $string );
	$imdbid = esc_html(get_post_meta($post -> ID, 'imdb_id', true));
	$moviewp_multiplayer = get_option('moviewppanel_multiplayer');
	if ($moviewp_multiplayer == 1) { 
	echo '<li id="multiplayer"><a class="blue" rel="modal" data-modal-type="'.$film.'" href="'.esc_url( home_url() ).'/?player_movie='.get_the_ID().'&auto=true"><i class="fa fa-window-restore"></i><span>'.textautoembed.'</span></a></li>';
	   }
	} 
	


// itemYear
function itemYear() {
	global $post;
	$years = get_the_term_list($post -> ID, 'years', '', ', ');
	if (!empty( $years ) && ! is_wp_error($years)){
	  $years = strip_tags( $years );
	  echo '<span class="movie-date">'.$years.'</span>';
	  }
	}
	
// itemRating
function itemRating() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	$imdbRating = str_replace('false', '0.0', $imdbRating); 
	$imdbRating = str_replace('', '0.0', $imdbRating); 
	if ($imdbRating == '') {
		echo '<div class="imdb-rating"><i class="fa fa-star"></i>' . esc_html__('0.0', 'moviewp') . '</div>';
		} else {
		echo '<div class="imdb-rating"><i class="fa fa-star"></i>'.$imdbRating.'</div>';
		} 
	}
	
	

// displayRating
function displayRating() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	$imdbRating = str_replace('false', '0.0', $imdbRating); 
	$imdbRating = str_replace('', '0.0', $imdbRating); 
	if (!isset($_GET['order'])) {
	$_GET['order'] = '';
	} 
	if ($_GET['order'] == 'rating') {
	if ($imdbRating == '') {
		echo '<span class="top-number">' . esc_html__('0.0', 'moviewp') . '<i></i></span>';
		} else {
		echo '<span class="top-number">'.$imdbRating.'<i></i></span>';
		} 
	}
}


// itemTV
function itemTV() {
	global $post;
	if ( in_category('tv-series') ) { 
	echo '<span class="item-tv">' . esc_html__('TV', 'moviewp') . '</span>';
		} 
	}

// itemLang
function itemLang() {
	global $post;
	$language = get_the_term_list($post -> ID, 'language', '', ', ');
	if (!empty( $language ) && ! is_wp_error($language)){
	   echo '<span class="item-language '.strip_tags($language).'">', strip_tags($language) , '</span>';
	  }
	} 
	
// itemQuality
function itemQuality() {
	global $post;
	$quality = get_the_term_list($post -> ID, 'quality', '', ', ');
	if (!empty( $quality ) && ! is_wp_error($quality)){
	   echo '<span class="item-quality '.strip_tags($quality).'">', strip_tags($quality) , '</span>';
	  }
	} 

// SingleCertification
function SingleCertification() {
	 global $post;
	 $Rated = esc_html(get_post_meta($post -> ID, 'Rated', true));
	if ($Rated == "PG") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('PG', 'moviewp') . "</span>";
	} 
	else if ($Rated == "PG-13") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('PG-13', 'moviewp') . "</span>";
	} 
	else if ($Rated == "R") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('R', 'moviewp') . "</span>";
	} 
	else if ($Rated == "NC-17") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NC-17', 'moviewp') . "</span>";
	} 
	else if ($Rated == "G") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('G', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-MA") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('TV-MA', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-PG") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('TV-PG', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-14") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('TV-14', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-Y") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('TV-Y', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-Y7") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('TV-Y7', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-G") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('TV-G', 'moviewp') . "</span>";
	} 
	else if ($Rated == "NR") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == "false") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == "") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == " ") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == "N/A") {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == null) {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == false) {
		echo "<span itemprop='contentRating' id='Rated'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
} 



function listCert() {
	 global $post;
	 $Rated = esc_html(get_post_meta($post -> ID, 'Rated', true));
	if ($Rated == "PG") {
		echo "<span id='mpaa'>" . esc_html__('PG', 'moviewp') . "</span>";
	} 
	else if ($Rated == "PG-13") {
		echo "<span id='mpaa'>" . esc_html__('PG-13', 'moviewp') . "</span>";
	} 
	else if ($Rated == "R") {
		echo "<span id='mpaa'>" . esc_html__('R', 'moviewp') . "</span>";
	} 
	else if ($Rated == "NC-17") {
		echo "<span id='mpaa'>" . esc_html__('NC-17', 'moviewp') . "</span>";
	} 
	else if ($Rated == "G") {
		echo "<span id='mpaa'>" . esc_html__('G', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-MA") {
		echo "<span id='mpaa'>" . esc_html__('TV-MA', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-PG") {
		echo "<span id='mpaa'>" . esc_html__('TV-PG', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-14") {
		echo "<span id='mpaa'>" . esc_html__('TV-14', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-Y") {
		echo "<span id='mpaa'>" . esc_html__('TV-Y', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-Y7") {
		echo "<span id='mpaa'>" . esc_html__('TV-Y7', 'moviewp') . "</span>";
	} 
	else if ($Rated == "TV-G") {
		echo "<span id='mpaa'>" . esc_html__('TV-G', 'moviewp') . "</span>";
	} 
	else if ($Rated == "NR") {
		echo "<span id='mpaa'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == "false") {
		echo "<span id='mpaa'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == "") {
		echo "<span id='mpaa'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == " ") {
		echo "<span id='mpaa'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == "N/A") {
		echo "<span id='mpaa'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == null) {
		echo "<span id='mpaa'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
	else if ($Rated == false) {
		echo "<span id='mpaa'>" . esc_html__('NR', 'moviewp') . "</span>";
	} 
} 



// Favorite
function Favorite() {
	global $post;
	$movie_ID = get_the_ID();
	$moviewp_favorites = get_option('moviewppanel_favorites');
	if ($moviewp_favorites == 1) { 
	echo "<span class='favorite'><i data-content='Favorite' id='".$movie_ID."' class='fa fa-heart-o'></i></span>";
   }
}

// ButtonPoster
function ButtonPoster() {
	global $post;
	echo '<a href="'.esc_url(monetize).'" class="blue" id="buttonposter" rel="noreferrer"><p><i class="fa fa-play-circle"></i>'.play.'</p></a>';
}

// SingleRating
function SingleRating() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	$imdbRating = str_replace('false', '0.0', $imdbRating); 
	$imdbRating = str_replace('', '0.0', $imdbRating); 
	if ($imdbRating == '') {
		echo '<span class="rating"><b>' . esc_html__('0.0', 'moviewp') . '</b></span>';
		} else {
		echo '<span class="rating"><b>'.$imdbRating.'</b></span>';
		} 
	}
	
// SingleYear
function SingleYear() {
	global $post;
	$years = get_the_term_list($post->ID, 'years', '', ', ', '');
	if (!empty($years)) echo '<span>'.$years.'</span>';
	}
	
// SingleGenre
function SingleGenre() {
	global $post;
	$category = get_the_category();
	if (!empty($category[0]))
	if ( $category[0] ) { 
	echo '<span itemprop="genre"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></span>';
	   }
	}
	
	
// SingleRuntime
function SingleRuntime() {
	global $post;
	$runtime = esc_html(get_post_meta($post -> ID, 'Runtime', true));
	echo ($runtime != '' ? '<span itemprop="duration">' . $runtime . '</span>' : '');
	} 
	
// SinglePersons
function SinglePersons() {
	global $post;
	$directors = get_the_term_list( $post -> ID, 'director', '<span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span><span itemprop="director" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>' );
	$actors = get_the_term_list( $post -> ID, 'actors', '<span itemprop="actors" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span><span itemprop="actors" itemscope="itemscope" itemtype="http://schema.org/Person"><span itemprop="name">', '</span></span>' );
	echo '<div class="persons">';
	if (!empty($directors)) echo $directors;
	if (!empty($actors)) echo $actors;
	echo '</div>';
	} 
	
	

// SingleTrailer
function SingleTrailer() {
	global $post;
	$string = 'emarfi';
	$film = strrev ( $string );
	$trailer = esc_html(get_post_meta($post -> ID, 'youtube_id', true));
	$arr = explode('[',$trailer); 
	$trailer = implode('',$arr); 
	$arr = explode(']',$trailer); 
	$trailer = implode('',$arr); 
	$arr = explode('https://youtu.be/',$trailer); 
	$trailer = implode('',$arr); 
	if ($trailer == '') {
		echo '';
		} else {
		echo '<li id="trailer"><a id="hover" href="'.esc_url('http://www.youtube.com/watch?v='.$trailer.'').'" rel="modal" data-modal-type="'.$film.'"><i class="fa fa-youtube-play"></i><span>'.trailer.'</span></a></li>';
		} 
	}
	

// SingleViews
function SingleViews() {
	global $post;
	$moviewp_postviews = get_option('moviewppanel_postviews');
	if ($moviewp_postviews == 1) {
	echo '<li id="views">';
	echo '<i class="fa fa-eye"></i>';
	echo '<span>';
	echo getPostViews(get_the_ID()) . ' '.mostwatched.'';
	echo '</span>';
	echo '</li>';
	   }
	}




// SingleLike
function SingleLike() {
	global $post;
	$moviewp_likes = get_option('moviewppanel_likes');
	if ($moviewp_likes == 1) {
		echo '<li id="like">';
		echo get_simple_likes_button( get_the_ID(), 0 );
		echo '</li>';
	   }
	}
	
// SingleShare
function SingleShare() {
	global $post;
	$moviewp_sharebutton = get_option('moviewppanel_sharebutton');
	if ($moviewp_sharebutton == 1) {
	echo '<li id="share"><a id="hover" class="a2a_dd" href="#"><i style="padding-right:15px;" class="fa fa-retweet"></i><span>'.share.'</span></a></li>';
	   }
	}
	
// SingleSponsor
function SingleSponsor() {
	global $post;
	$moviewp_sponsor = get_option('moviewppanel_sponsor');
	if ($moviewp_sponsor == 1) {
		echo '<ul><li id="monetize"><a class="play purple" href="'.esc_url(txtsponsor).'" rel="noreferrer">'.advertise.'</a></li></ul>';
	   }
	}
	
// SingleMultiServer
function SingleMultiServer() {
	global $post;
	$string = 'emarfi';
	$film = strrev ( $string );
	$moviewp_multiserver = get_option('moviewppanel_multiserver');
	if ($moviewp_multiserver == 1) { 
	if ($values = get_post_custom_values("iframe_0_server")) { 
		echo '<li id="multi"><a id="hover" href="#" onclick="return false;"><i class="fa fa-list-ol"></i><span class="server">'.textmultiserver.'</span></a></li>';
		   } 
		} 
	}
	
// Single Movie Download
function SingleDownload() {
	global $post;
	$download = esc_html(get_post_meta($post -> ID, 'download', true));
	if (!empty($download)) echo '<li id="download-button"><a id="hover" href="'.esc_url($download).'" rel="noreferrer" target="_blank"><i class="fa fa-cloud-download"></i><span>'.download.'</span></a></li>';
	} 
	
	
// SingleMultiServer
function SingleMultiDownload() {
	global $post;
	$download = esc_html(get_post_meta($post -> ID, 'download', true));
	if( class_exists('acf') ) {
	if( get_field( 'download_2' ) ) {
		echo '<li id="multidownload"><a id="hover" href="#" onclick="return false;"><i class="fa fa-cloud-download"></i><span class="downloads">' . esc_html__('Multi Download', 'moviewp') . '</span></a></li>';
		} else {
	if (!empty($download)) echo '<li id="download-button"><a id="hover" href="'.esc_url($download).'" rel="noreferrer" target="_blank"><i class="fa fa-cloud-download"></i><span>'.download.'</span></a></li>';
		}
	}
  }	 
 
// SinglePoster
function SinglePoster() {
	global $post;
	$moviewp_adbutton = get_option('moviewppanel_adbutton');
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	$poster_path = esc_html(get_post_meta($post -> ID, 'poster_path', true));
	$poster500 = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster_path;
 
	if ($poster_path == '') {
		if ( has_post_thumbnail() ) {
		$singleposter = esc_url($featured_img_url);
		} else {
		$singleposter = esc_url('https://via.placeholder.com/600x900?text=No+Poster&000.webp');
		}
		} else {
		$singleposter = esc_url($poster500);
		}
	if ($moviewp_adbutton == 1) {
		echo '<img itemprop="image" src="' . $singleposter . '" alt="' . esc_html(get_the_title()) . '">';
		echo ButtonPoster();
		} else {
		echo '<img itemprop="image" class="noad" src="' . $singleposter . '" alt="' . esc_html(get_the_title()) . '">';
	} 
} 

// SingleNetwork
function SingleNetwork() {
	global $post;
	$term = get_the_terms( $post->ID, 'networks' );
	
	if ( ! is_wp_error( $term ) && ! empty( $term ) ) {
	
	$firstTerm = $term[0];
	$term_link = get_category_link($firstTerm->term_id);
	
	echo '<span class="network"><a href="' . $term_link . '" rel="tag">' . $firstTerm->name . '</a></span>';
	 
	}	
}
// BelongsToCollection
function BelongsToCollection() {
	global $post;
	$term = get_the_terms( $post->ID, 'collection' );
	
	if ( ! is_wp_error( $term ) && ! empty( $term ) ) {
	
	$firstTerm = $term[0];
	$term_link = get_category_link($firstTerm->term_id);
	
	echo '<br /><br />Collection: <a href="' . $term_link . '" rel="tag">' . $firstTerm->name . '</a>';
	 
	}	
}

// Tags
function MovieTags() {
	global $post;
	$moviewp_enabletag = get_option('moviewppanel_enabletag');
	if ($moviewp_enabletag == 1) { 
	if (has_tag()) {
		the_tags( '<br /><br />Tags: ', ', ', '' );
	} else {
		// Article untagged
	} 
	} else {
		// do nothing
	} 
} 

// SingleHD
function SingleHD() {
	global $post;
	echo '<i class="hd">' . esc_html__('HD', 'moviewp') . '</i>';
} 

// MovieData
function MovieData() {
	global $post;
	echo SingleCertification();
	echo SingleYear(); 
	echo SingleGenre();
	echo SingleRuntime();
	echo edit_post_link('<span>edit</span>'); 
	} 

// MovieDescription
function MovieDescription() {
	global $post;
	echo '<span itemprop="description" class="trama">';
	if ( get_the_content() ) {
	the_content();
	} else {
	echo SinglePlot('500');
	}
	echo MovieTags();
	echo BelongsToCollection();
	echo '</span>';
	echo SinglePersons();
	} 

// TvPlot
function TvPlot() {
	global $post;
	echo '<span class="trama">';
	if ( get_the_content() ) {
	the_content();
	} else {
	echo SinglePlot('450');
	}
	echo MovieTags();
	echo '</span>';
	echo '<div class="persons">';
	echo '</div>';
	} 

// MovieImage
function MovieImage() {
	global $post;
	echo Favorite();
	echo SinglePoster(); 
	} 
	
// MovieSchema
function MovieSchema() {
	global $post;
	echo '<meta itemprop="url" content="'.get_permalink().'" />' . "\n";
	echo '<span itemprop="datePublished" content="'.esc_attr( get_the_date( 'c' ) ).'">';
	echo esc_html( get_the_date( 'c' ) );
	echo '</span>' . "\n";
	} 
	
	
	
// SchemaRating
function SchemaRating() {
	global $post;
	$imdbRating = esc_html(get_post_meta($post -> ID, 'imdbRating', true));
	$imdbRating = substr($imdbRating, 0, 3);
	$imdbRating = str_replace('false', '0.0', $imdbRating); 
	$imdbRating = str_replace('', '0.0', $imdbRating); 
	if ($imdbRating == '') {
		// do nothing
		} else {
		echo '<div itemscope itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">';
		echo '<meta itemprop="bestRating" content="10" />';
		echo '<meta itemprop="worstRating" content="1" />';
		echo '<span itemprop="ratingValue" content="'.$imdbRating.'" />';
		echo '<span itemprop="ratingCount" content="35" />';
		echo '</div>';
		} 
	} 
	

// SinglePosterTV
function SinglePosterTV() {
	global $post;
	 $moviewp_adbutton = get_option('moviewppanel_adbutton');
	 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	 $poster_path = esc_html(get_post_meta($post -> ID, 'poster_path', true));
	 $poster500 = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster_path;
	 if ($poster_path == '') {
		if (has_post_thumbnail()) {
			$singleposter = esc_url($featured_img_url);
			 } else {
			$singleposter = esc_url('https://via.placeholder.com/600x900?text=No+Poster&000.jpg');
			 } 
		} else {
		$singleposter = esc_url($poster500);
		 } 
	if ($moviewp_adbutton == 1) {
		 echo '<span class="epinum">' . esc_html__('Eps', 'moviewp') . '<i></i></span>';
		 echo '<div class="tv-poster">';
		 echo '<img src="' . $singleposter . '" alt="' . esc_html(get_the_title()) . '">';
		 echo '</div>';
		 echo ButtonPoster();
		 } else {
		 echo '<span class="epinum noad">';
		 echo esc_html__('Eps', 'moviewp');
		 echo '<i></i>';
		 echo '</span>';
		 echo '<div class="tv-poster noad">';
		 echo '<img src="' . $singleposter . '" alt="' . esc_html(get_the_title()) . '">';
		 echo '</div>';
		 } 
	} 
	
// SingleTvDetails
function SingleTvDetails()
{
	 global $post;
	 echo '<section class="tv-details">';
	 echo '<div class="tv-details-seasons">';
	 echo '<h2>' . seasons . '</h2>';
	 echo '<ol></ol>';
	 echo '</div>';
	 echo '<div class="tv-details-episodes">';
	 echo '<h2>' . episodes . '</h2> ';
	 echo '<ol id="season" class="active"></ol>';
	 echo '</div>';
	 echo '<div class="tv-details-episodes-info">';
	 echo '<h2></h2>';
	 echo '<div class="player">';
	 echo '</div>';
	 echo '</div>';
	 echo '</section>';
	 } 
	
// Notice
function Notice() {
	global $post;
	$moviewp_description = get_option('moviewppanel_description');
	 if (is_home()) {
		if (strlen($moviewp_description) > 0) {
			 echo '<div class="cookie-message notice show">';
			 echo '<div class="notice-icon">';
			 echo '<i class="fa fa-info-circle"></i>';
			 echo '</div>';
			 echo '<p>';
			 echo html_entity_decode(stripslashes_deep($moviewp_description), ENT_QUOTES);
			 echo '</p>';
			 echo '<div class="close-notice">';
			 echo '<i>x</i>';
			 echo '</div>';
			 echo '</div>';
			} 
		} 
	} 



// Analitycs
function Analitycs() {
	global $post;
	$moviewppanel_header_code = get_option('moviewppanel_header_code');
	if (get_option('moviewppanel_header_code')) {
	echo html_entity_decode(stripslashes_deep($moviewppanel_header_code), ENT_QUOTES);
	   }
	} 

// ScrollToTop
function ScrollToTop() {
	global $post;
	$moviewp_scroll = get_option('moviewppanel_scroll');
	if ($moviewp_scroll == 1) {
	echo '<div id="topscroll">';
	echo '</div>';
	   }
	} 
	
// Sticky
function Sticky() {
	global $post;
	$moviewp_grid = get_option('moviewppanel_grid');
	if ($moviewp_grid == 1) {
	if ( is_single() ) {

	} elseif ( is_page( 'alphabet' ) ) {

	} elseif ( is_page( 'contact' ) ) {
	
	} elseif ( is_page( 'collection' ) ) {
	
	} elseif ( is_post_type_archive( 'article' ) ) {

	} elseif ( is_page( 'favorites' ) ) {

	} else {

	echo '<ul class="sticky-container">';
	echo '<li class="dropdown grid gridView">';
	echo '<i class="fa fa-th-large gridView"></i>';
	echo '</li>';
	echo '<li class="dropdown grid listView">';
	echo '<i class="fa fa-list listView"></i>';
	echo '</li>';
	echo '</ul>';
		  }
	   }
	} 
	
// TV & Movie Script
add_action( 'wp_enqueue_scripts', function() {
	$moviewp_multiplayer = get_option('moviewppanel_multiplayer');
	global $post;
	if ( is_post_template( 'tv.php' ) ) {
	$tmdbid = esc_html(get_post_meta($post -> ID, 'id', true));
	$imdbid = esc_html(get_post_meta($post -> ID, 'imdb_id', true));
	
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	$poster_path = esc_html(get_post_meta($post -> ID, 'poster_path', true));
	$poster500 = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster_path;
	if ($poster_path == '') {
	if (has_post_thumbnail()) {
	$singleposter = esc_url($featured_img_url);
	} else {
	$singleposter = esc_url('https://via.placeholder.com/600x900?text=No+Poster&000.jpg');
	} 
	} else {
	$singleposter = esc_url($poster500);
	}
	
	//$poster_path = esc_html(get_post_meta($post -> ID, 'poster_path', true));
	//$poster500 = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' . $poster_path;
	
	if ($moviewp_multiplayer == 0) {
	$script = 'tv';
	} else {
	$script = 'embed';
	}
	
	wp_enqueue_script( $script, get_template_directory_uri() . '/assets/js/'.$script.'.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_localize_script( $script, 'MoviewpAPI', array( 
	'tvapikey' => apikey,
	'tvid' => $tmdbid, 
	'tvimdbid' => $imdbid,
	'post_id' => get_the_ID(),
	'language' => apilanguage,
	'tvtitle' => get_the_title( $post->ID ),
	'tvseason' => season,
	'tvepisode' => episode,
	'tvposter' => $singleposter,
	'watch' => monetize,
	'download' => download,
	'tvcreator' => creator,
	'noImg' => esc_url( get_template_directory_uri() ).'/assets/images/noimage.jpg',
	'site' => esc_url( home_url() ),
	'placeholder' => placeholder_tv,
	'backdropImageNull' => esc_url('https://via.placeholder.com/1280x720.jpg/000000/FFFFFF/?text=NO+IMAGE'),
	'tvplayer' => esc_url(home_url()).'/?player_tv=',
	'disqus_shortname' => disqus,
	) 
	);
} 
}
);

add_action( 'wp_enqueue_scripts', function() {
	global $post;
	if ( is_post_template( 'tv.php' ) ) {
		
	} elseif ( is_singular( 'article' ) ) {

} elseif ( is_single() ) {
	
	$tmdbid = esc_html(get_post_meta($post -> ID, 'id', true));
	$imdbid = esc_html(get_post_meta($post -> ID, 'imdb_id', true));
	$sd = esc_html(get_post_meta($post -> ID, '720p', true));
	$hd = esc_html(get_post_meta($post -> ID, '1080p', true));
	wp_enqueue_script( 'movie', get_template_directory_uri() . '/assets/js/movie.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
	wp_localize_script( 'movie', 'MoviewpAPI', array( 
	'tmdbapi' => apikey,
	'movie' => $tmdbid, 
	'movieimdb' => $imdbid,
	'post_id' => get_the_ID(),
	'language' => apilanguage,
	'multiserver' => textmultiserver,
	'regista' => director,
	'watch' => monetize,
	'noImg' => esc_url( get_template_directory_uri() ).'/assets/images/noimage.jpg',
	'site' => esc_url( home_url() ),
	'imgDir' => esc_url( get_template_directory_uri() ),
	'videolink' => $sd,
	'videolinkhd' => $hd,
	'disqus_shortname' => disqus,
	) 
	);
} 
}
);

// modal_enqueue_script
function modal_enqueue_script() {

	if(!is_single()) return;
	wp_enqueue_script( 'modal', get_template_directory_uri() . '/assets/js/modal.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

}
add_action( 'wp_enqueue_scripts', 'modal_enqueue_script' );



// SeriesScript
function SeriesScript() {
	global $post;
	if ( is_post_template( 'tv.php' ) ) {
	$moviewp_multiplayer = get_option('moviewppanel_multiplayer');
	if ($moviewp_multiplayer == 0) { ?>
<?php $link = array(); ?>
<?php $down = array(); ?>
<?php
	if (have_rows('s')):
	$number = 1;
	{
		while (have_rows('s')):
			the_row();
			if ($coun = 0):
			endif;
			$coun++;
			if (have_rows('e')):
				if ($count = 0):
				endif;
				$count++;
				$number2 = 1;
				{
					while (have_rows('e')):
the_row(); 
?>
<?php if (get_sub_field('link')) { ?>
<?php $nu = 's'.$number.'_'.$number2 ?>
<?php $link[$nu] = get_sub_field('link'); ?>
<?php } ?>
<?php if (get_sub_field('down')) { ?>
<?php $nu = 's'.$number.'_'.$number2 ?>
<?php $down[$nu] = get_sub_field('down'); ?>
<?php } ?>
<?php $number2++;
					endwhile;
				}
				else:
			  endif;
		   $number++;
		endwhile;
	}
  else:
endif; 
wp_add_inline_script( 'tv', 'var streaming = ' . wp_json_encode( $link ) . '; var download = ' . wp_json_encode( $down ) . ';' );
    } 
  }
}
add_action( 'wp_enqueue_scripts', 'SeriesScript' );