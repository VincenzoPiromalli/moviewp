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
	FUNCTIONS
\*====================================*/

function moviewppanel_options($option) {
    $option('moviewppanel_color_style', 'blue');
    $option('moviewppanel_google_fonts', 'jost'); 
	$option('moviewppanel_apikey', '');
	$option('moviewppanel_apilanguage', '');
	$option('moviewppanel_disqus', '');
	$option('moviewppanel_omdb', '');
	$option('moviewppanel_multiplayer', '');
	$option('moviewppanel_multiserver', '');
	$option('moviewppanel_tvdl', '');
	$option('moviewppanel_switch', '');
	$option('moviewppanel_enabletv', '');
	$option('moviewppanel_enabletag', '');
	$option('moviewppanel_sortby', '');
	$option('moviewppanel_quality', '');
	$option('moviewppanel_share', '');
	$option('moviewppanel_letter', '');
	$option('moviewppanel_postviews', '');
	$option('moviewppanel_likes', '');
	$option('moviewppanel_similar', '');
	$option('moviewppanel_favorites', '');
	$option('moviewppanel_minify', '');
	$option('moviewppanel_scroll', '');
	$option('moviewppanel_full', '');
	$option('moviewppanel_grid', '');
	$option('moviewppanel_seo', '');
	$option('moviewppanel_advertise', '');
	$option('moviewppanel_email', '');
	
	$option('moviewppanel_recently', '');
	$option('moviewppanel_mostrated', '');
	$option('moviewppanel_mostwatched', '');
	$option('moviewppanel_testolike', '');
	$option('moviewppanel_releasedate', '');
	$option('moviewppanel_titleato', '');
	$option('moviewppanel_fullbio', '');
	$option('moviewppanel_nobio', '');
	$option('moviewppanel_monetize', '');
	$option('moviewppanel_txtsponsor', '');
	$option('moviewppanel_txtcomments', '');
	$option('moviewppanel_sharebutton', '');
	$option('moviewppanel_topicon', '');
	$option('moviewppanel_randomicon', '');

	$option('moviewppanel_description', '');
	$option('moviewppanel_description_tv', '');
	$option('moviewppanel_slogan', '');
	$option('moviewppanel_latest', '');
	$option('moviewppanel_txtmovies', '');
	$option('moviewppanel_intheaters', '');
	$option('moviewppanel_top', '');
	$option('moviewppanel_random', '');
	$option('moviewppanel_tvseries', '');
	$option('moviewppanel_genre', '');
	$option('moviewppanel_year', '');
	$option('moviewppanel_country', '');
	$option('moviewppanel_search', '');
	$option('moviewppanel_network', '');
	$option('moviewppanel_creator', '');
	$option('moviewppanel_stars', '');
	$option('moviewppanel_season', '');
	$option('moviewppanel_seasons', '');
	$option('moviewppanel_episode', '');
	$option('moviewppanel_episodes', '');
	$option('moviewppanel_director', '');
	$option('moviewppanel_play', '');
	$option('moviewppanel_trailer', '');
	$option('moviewppanel_streaming', '');
	$option('moviewppanel_watch', '');
	$option('moviewppanel_download', '');
	$option('moviewppanel_textautoembed', '');
	$option('moviewppanel_textmultiserver', '');
	$option('moviewppanel_textfavorites', '');
	$option('moviewppanel_txtnoletter', '');
	$option('moviewppanel_related', '');

	$option('moviewppanel_header_code', '');
	$option('moviewppanel_adbutton', 2);
	$option('moviewppanel_sponsor', 2);
	
	$option('moviewppanel_footer_showlinks', 1);
	$option('moviewppanel_footer_copyright', '');
	
	
	$option('moviewppanel_site_logo', '');
	$option('moviewppanel_site_favicon', '');
	

	$option('moviewppanel_header_soc_icons', 2);
	$option('moviewppanel_customizer', 2);
	$option('moviewppanel_url_facebook', '');
	$option('moviewppanel_url_twitter', '');
	$option('moviewppanel_url_instagram', '');
	
	$option('moviewppanel_comments', 2);
	
	$option('moviewppanel_footer_banner', 2);
	$option('moviewppanel_banner_position_1', '');}


/*====================================*\
	GENERAL
\*====================================*/

$moviewp_apikey = get_option('moviewppanel_apikey');
$moviewp_apilanguage = get_option('moviewppanel_apilanguage');
$moviewp_omdb = get_option('moviewppanel_omdb');
$moviewp_disqus = get_option('moviewppanel_disqus');
$moviewp_email = get_option('moviewppanel_email');
$moviewp_report = get_option('moviewppanel_report');


/*====================================*\
	TRANSLATE
\*====================================*/

$moviewp_slogan = get_option('moviewppanel_slogan');
$moviewp_latest = get_option('moviewppanel_latest');
$moviewp_txtmovies = get_option('moviewppanel_txtmovies');
$moviewp_intheaters = get_option('moviewppanel_intheaters');
$moviewp_top = get_option('moviewppanel_top');
$moviewp_random = get_option('moviewppanel_random');
$moviewp_tvseries = get_option('moviewppanel_tvseries');
$moviewp_contactus = get_option('moviewppanel_contactus');
$moviewp_genre = get_option('moviewppanel_genre');
$moviewp_year = get_option('moviewppanel_year');
$moviewp_country = get_option('moviewppanel_country');
$moviewp_search = get_option('moviewppanel_search');
$moviewp_network = get_option('moviewppanel_network');
$moviewp_creator = get_option('moviewppanel_creator');
$moviewp_stars = get_option('moviewppanel_stars');
$moviewp_season = get_option('moviewppanel_season');
$moviewp_seasons = get_option('moviewppanel_seasons');
$moviewp_episode = get_option('moviewppanel_episode');
$moviewp_episodes = get_option('moviewppanel_episodes');
$moviewp_director = get_option('moviewppanel_director');
$moviewp_play = get_option('moviewppanel_play');
$moviewp_share = get_option('moviewppanel_share');
$moviewp_trailer = get_option('moviewppanel_trailer');
$moviewp_streaming = get_option('moviewppanel_streaming');
$moviewp_watch = get_option('moviewppanel_watch');
$moviewp_download = get_option('moviewppanel_download');

$moviewp_recently = get_option('moviewppanel_recently');
$moviewp_mostrated = get_option('moviewppanel_mostrated');
$moviewp_mostwatched = get_option('moviewppanel_mostwatched');
$moviewp_testolike = get_option('moviewppanel_testolike');
$moviewp_testofav = get_option('moviewppanel_testofav');
$moviewp_releasedate = get_option('moviewppanel_releasedate');
$moviewp_titleato = get_option('moviewppanel_titleato');
$moviewp_fullbio = get_option('moviewppanel_fullbio');
$moviewp_nobio = get_option('moviewppanel_nobio');
$moviewp_textautoembed = get_option('moviewppanel_textautoembed');
$moviewp_textmultiserver = get_option('moviewppanel_textmultiserver');
$moviewp_textfavorites = get_option('moviewppanel_textfavorites');
$moviewp_txtnoletter = get_option('moviewppanel_txtnoletter');
$moviewp_related = get_option('moviewppanel_related');
$moviewp_advertise = get_option('moviewppanel_advertise');
$moviewp_monetize = get_option('moviewppanel_monetize');
$moviewp_txtsponsor = get_option('moviewppanel_txtsponsor');
$moviewp_txtquality = get_option('moviewppanel_txtquality');
$moviewp_txtcomments = get_option('moviewppanel_txtcomments');

/*====================================*\
	GENERAL
\*====================================*/

if (strlen($moviewp_apikey) > 0) { 
define	('apikey', html_entity_decode(stripslashes_deep($moviewp_apikey), ENT_QUOTES)); 
 } else { 
define	('apikey', '49101d62654e71a2931722642ac07e5e'); 
 } 
if (strlen($moviewp_apilanguage) > 0) { 
define	('apilanguage', html_entity_decode(stripslashes_deep($moviewp_apilanguage), ENT_QUOTES)); 
} else { 
define	('apilanguage', 'en-US'); 
}
if (strlen($moviewp_disqus) > 0) { 
define	('disqus', html_entity_decode(stripslashes_deep($moviewp_disqus), ENT_QUOTES)); 
 } else { 
define	('disqus', 'movieapp-1'); 
} 
if (strlen($moviewp_omdb) > 0) { 
define	('omdb', html_entity_decode(stripslashes_deep($moviewp_omdb), ENT_QUOTES)); 
 } else { 
define	('omdb', 'b9bd48a6'); 
} 

/*====================================*\
	TRANSLATE
\*====================================*/

if (strlen($moviewp_season) > 0) { 
define	('season', html_entity_decode(stripslashes_deep($moviewp_season), ENT_QUOTES)); 
 } else { 
define	('season', 'Season'); 
 }
 if (strlen($moviewp_seasons) > 0) { 
define	('seasons', html_entity_decode(stripslashes_deep($moviewp_seasons), ENT_QUOTES)); 
 } else { 
define	('seasons', 'Seasons'); 
 }
  if (strlen($moviewp_episode) > 0) { 
define	('episode', html_entity_decode(stripslashes_deep($moviewp_episode), ENT_QUOTES)); 
 } else { 
define	('episode', 'Episode'); 
 }
  if (strlen($moviewp_episodes) > 0) { 
define	('episodes', html_entity_decode(stripslashes_deep($moviewp_episodes), ENT_QUOTES)); 
 } else { 
define	('episodes', 'Episodes'); 
 }
   if (strlen($moviewp_latest) > 0) { 
define	('latest', html_entity_decode(stripslashes_deep($moviewp_latest), ENT_QUOTES)); 
 } else { 
define	('latest', 'Home'); 
}
    if (strlen($moviewp_top) > 0) { 
define	('top', html_entity_decode(stripslashes_deep($moviewp_top), ENT_QUOTES)); 
 } else { 
define	('top', 'Top'); 
 }
if (strlen($moviewp_random) > 0) { 
define	('random', html_entity_decode(stripslashes_deep($moviewp_random), ENT_QUOTES)); 
 } else { 
define	('random', 'Random'); 
 }
if (strlen($moviewp_download) > 0) { 
define	('download', html_entity_decode(stripslashes_deep($moviewp_download), ENT_QUOTES)); 
 } else { 
define	('download', 'Download'); 
 }
if (strlen($moviewp_watch) > 0) { 
define	('watch', html_entity_decode(stripslashes_deep($moviewp_watch), ENT_QUOTES)); 
 } else { 
define	('watch', 'Watch Now'); 
 }
if (strlen($moviewp_genre) > 0) { 
define	('genre', html_entity_decode(stripslashes_deep($moviewp_genre), ENT_QUOTES)); 
 } else { 
define	('genre', 'Genre'); 
 }
if (strlen($moviewp_year) > 0) { 
define	('year', html_entity_decode(stripslashes_deep($moviewp_year), ENT_QUOTES)); 
} else { 
define	('year', 'Year'); 
}
if (strlen($moviewp_country) > 0) { 
define	('country', html_entity_decode(stripslashes_deep($moviewp_country), ENT_QUOTES)); 
} else { 
define	('country', 'Country'); 
}
if (strlen($moviewp_search) > 0) { 
define	('search', html_entity_decode(stripslashes_deep($moviewp_search), ENT_QUOTES)); 
} else { 
define	('search', 'Search...'); 
}
if (strlen($moviewp_network) > 0) { 
define	('network', html_entity_decode(stripslashes_deep($moviewp_network), ENT_QUOTES)); 
} else { 
define	('network', 'Network'); 
}
if (strlen($moviewp_creator) > 0) { 
define	('creator', html_entity_decode(stripslashes_deep($moviewp_creator), ENT_QUOTES)); 
 } else { 
define	('creator', 'Creator'); 
} 
if (strlen($moviewp_director) > 0) { 
define	('director', html_entity_decode(stripslashes_deep($moviewp_director), ENT_QUOTES)); 
 } else { 
define	('director', 'Director'); 
} 
if (strlen($moviewp_stars) > 0) { 
define	('stars', html_entity_decode(stripslashes_deep($moviewp_stars), ENT_QUOTES)); 
 } else { 
define	('stars', 'Stars'); 
} 
if (strlen($moviewp_intheaters) > 0) { 
define	('intheaters', html_entity_decode(stripslashes_deep($moviewp_intheaters), ENT_QUOTES)); 
 } else { 
define	('intheaters', 'In Theaters'); 
 }
if (strlen($moviewp_txtmovies) > 0) { 
define	('txtmovies', html_entity_decode(stripslashes_deep($moviewp_txtmovies), ENT_QUOTES)); 
 } else { 
define	('txtmovies', 'Movies'); 
}
if (strlen($moviewp_tvseries) > 0) { 
define	('tvseries', html_entity_decode(stripslashes_deep($moviewp_tvseries), ENT_QUOTES)); 
 } else { 
define	('tvseries', 'TV Series'); 
}
if (strlen($moviewp_slogan) > 0) { 
define	('slogan', html_entity_decode(stripslashes_deep($moviewp_slogan), ENT_QUOTES)); 
} else { 
define	('slogan', 'Watch Movies Online Free'); 
}
if (strlen($moviewp_play) > 0) { 
define	('play', html_entity_decode(stripslashes_deep($moviewp_play), ENT_QUOTES)); 
 } else { 
define	('play', 'Play'); 
} 
if (strlen($moviewp_share) > 0) { 
define	('share', html_entity_decode(stripslashes_deep($moviewp_share), ENT_QUOTES)); 
 } else { 
define	('share', 'Share'); 
} 
if (strlen($moviewp_trailer) > 0) { 
define	('trailer', html_entity_decode(stripslashes_deep($moviewp_trailer), ENT_QUOTES)); 
 } else { 
define	('trailer', 'Trailer'); 
} 
if (strlen($moviewp_streaming) > 0) { 
define	('streaming', html_entity_decode(stripslashes_deep($moviewp_streaming), ENT_QUOTES)); 
 } else { 
define	('streaming', 'Streaming'); 
} 
if (strlen($moviewp_advertise) > 0) { 
define	('advertise', html_entity_decode(stripslashes_deep($moviewp_advertise), ENT_QUOTES)); 
 } else { 
define	('advertise', 'Advertise Here'); 
}  
if (strlen($moviewp_email) > 0) { 
define	('email', html_entity_decode(stripslashes_deep($moviewp_email), ENT_QUOTES)); 
 } else { 
define	('email', 'johndoe@gmail.com'); 
}
if (strlen($moviewp_recently) > 0) { 
define	('recently', html_entity_decode(stripslashes_deep($moviewp_recently), ENT_QUOTES)); 
 } else { 
define	('recently', 'Sort by'); 
}  
if (strlen($moviewp_mostrated) > 0) { 
define	('mostrated', html_entity_decode(stripslashes_deep($moviewp_mostrated), ENT_QUOTES)); 
 } else { 
define	('mostrated', 'Rating'); 
}  
if (strlen($moviewp_mostwatched) > 0) { 
define	('mostwatched', html_entity_decode(stripslashes_deep($moviewp_mostwatched), ENT_QUOTES)); 
 } else { 
define	('mostwatched', 'Views'); 
}
if (strlen($moviewp_testolike) > 0) { 
define	('testolike', html_entity_decode(stripslashes_deep($moviewp_testolike), ENT_QUOTES)); 
 } else { 
define	('testolike', 'Like'); 
}
if (strlen($moviewp_releasedate) > 0) { 
define	('releasedate', html_entity_decode(stripslashes_deep($moviewp_releasedate), ENT_QUOTES)); 
 } else { 
define	('releasedate', 'Date'); 
}
if (strlen($moviewp_titleato) > 0) { 
define	('titleato', html_entity_decode(stripslashes_deep($moviewp_titleato), ENT_QUOTES)); 
 } else { 
define	('titleato', 'Title'); 
}
if (strlen($moviewp_fullbio) > 0) { 
define	('fullbio', html_entity_decode(stripslashes_deep($moviewp_fullbio), ENT_QUOTES)); 
 } else { 
define	('fullbio', 'Full Bio'); 
}
if (strlen($moviewp_nobio) > 0) { 
define	('nobio', html_entity_decode(stripslashes_deep($moviewp_nobio), ENT_QUOTES)); 
 } else { 
define	('nobio', 'No bio available for'); 
}
if (strlen($moviewp_textautoembed) > 0) { 
define	('textautoembed', html_entity_decode(stripslashes_deep($moviewp_textautoembed), ENT_QUOTES)); 
 } else { 
define	('textautoembed', 'Auto Embed'); 
}
if (strlen($moviewp_textmultiserver) > 0) { 
define	('textmultiserver', html_entity_decode(stripslashes_deep($moviewp_textmultiserver), ENT_QUOTES)); 
 } else { 
define	('textmultiserver', 'Multi Server'); 
}
if (strlen($moviewp_textfavorites) > 0) { 
define	('textfavorites', html_entity_decode(stripslashes_deep($moviewp_textfavorites), ENT_QUOTES)); 
 } else { 
define	('textfavorites', 'Favorites'); 
}
if (strlen($moviewp_txtnoletter) > 0) { 
define	('txtnoletter', html_entity_decode(stripslashes_deep($moviewp_txtnoletter), ENT_QUOTES)); 
 } else { 
define	('txtnoletter', 'Sorry, but nothing matched this letter.'); 
}
if (strlen($moviewp_related) > 0) { 
define	('related', html_entity_decode(stripslashes_deep($moviewp_related), ENT_QUOTES)); 
 } else { 
define	('related', 'You might also like..'); 
}
if (strlen($moviewp_monetize) > 0) { 
define	('monetize', html_entity_decode(stripslashes_deep($moviewp_monetize), ENT_QUOTES)); 
 } else { 
define	('monetize', '#'); 
} 
if (strlen($moviewp_txtsponsor) > 0) { 
define	('txtsponsor', html_entity_decode(stripslashes_deep($moviewp_txtsponsor), ENT_QUOTES)); 
 } else { 
define	('txtsponsor', '#'); 
} 
if (strlen($moviewp_txtquality) > 0) { 
define	('txtquality', html_entity_decode(stripslashes_deep($moviewp_txtquality), ENT_QUOTES)); 
 } else { 
define	('txtquality', 'Quality'); 
}
if (strlen($moviewp_txtcomments) > 0) { 
define	('txtcomments', html_entity_decode(stripslashes_deep($moviewp_txtcomments), ENT_QUOTES)); 
 } else { 
define	('txtcomments', 'Comments'); 
} 