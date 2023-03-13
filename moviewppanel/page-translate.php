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

get_template_part('moviewppanel/header'); ?>

<div class="moviewppanel-column">
	<?php if (isset($_POST["update_options"])) { ?>
		<?php
			foreach ($_POST as $key => $value) {
                if ($key != 'update_options') {
					update_option($key, esc_html($value));
				}
            }
		?>
		<div class="moviewppanel-box moviewppanel-updated"><?php echo __('Settings saved', 'moviewp'); ?></div>		
	<?php } ?>
	<div class="moviewppanel-box">
		<h2><?php echo __('Translate', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label for="moviewppanel_latest"><?php echo __('Enter text for Home', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Home in sidebar', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Home', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Home', 'moviewp'); ?>" name="moviewppanel_latest" id="moviewppanel_latest" value="<?php echo stripslashes_deep(get_option('moviewppanel_latest')); ?>">
		</p>
		<p>
			<label for="moviewppanel_txtmovies"><?php echo __('Enter text for Movies', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Movies on sidebar.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Movies', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Movies', 'moviewp'); ?>" name="moviewppanel_txtmovies" id="moviewppanel_txtmovies" value="<?php echo stripslashes_deep(get_option('moviewppanel_txtmovies')); ?>">
		</p>
		<p>
			<label for="moviewppanel_tvseries"><?php echo __('Enter text for TV Series', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify TV Series on sidebar.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('TV Series', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('TV Series', 'moviewp'); ?>" name="moviewppanel_tvseries" id="moviewppanel_tvseries" value="<?php echo stripslashes_deep(get_option('moviewppanel_tvseries')); ?>">
		</p>
		<!--<p>
			<label for="moviewppanel_intheaters"><?php echo __('Enter text for In Theaters', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for In Theaters category on sidebar.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('In Theaters', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('In Theaters', 'moviewp'); ?>" name="moviewppanel_intheaters" id="moviewppanel_intheaters" value="<?php echo stripslashes_deep(get_option('moviewppanel_intheaters')); ?>">
		</p>-->
		<p>
			<label for="moviewppanel_top"><?php echo __('Enter text for Top', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify TMDB Rating Results Page on sidebar.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Top', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Top', 'moviewp'); ?>" name="moviewppanel_top" id="moviewppanel_top" value="<?php echo stripslashes_deep(get_option('moviewppanel_top')); ?>">
		</p>
		<p>
			<label for="moviewppanel_random"><?php echo __('Enter text for Random', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Random page on sidebar.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Random', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Random', 'moviewp'); ?>" name="moviewppanel_random" id="moviewppanel_random" value="<?php echo stripslashes_deep(get_option('moviewppanel_random')); ?>">
		</p>
		<p>
			<label for="moviewppanel_genre"><?php echo __('Enter text for Genre', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for Genre on menù dropdown.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Genre', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Genre', 'moviewp'); ?>" name="moviewppanel_genre" id="moviewppanel_genre" value="<?php echo stripslashes_deep(get_option('moviewppanel_genre')); ?>">
		</p>
		<p>
			<label for="moviewppanel_txtquality"><?php echo __('Enter text for quality droppdown', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify quality.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Quality.', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Quality.', 'moviewp'); ?>" name="moviewppanel_txtquality" id="moviewppanel_txtquality"  value="<?php echo stripslashes_deep(get_option('moviewppanel_txtquality')); ?>">
		</p>
		<p>
			<label for="moviewppanel_year"><?php echo __('Enter text for Year', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Year on menù dropdown.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Year', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Year', 'moviewp'); ?>" name="moviewppanel_year" id="moviewppanel_year" value="<?php echo stripslashes_deep(get_option('moviewppanel_year')); ?>">
		</p>
		<p>
			<label for="moviewppanel_country"><?php echo __('Enter text for Country', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for Country on menù dropdown.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Country', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Country', 'moviewp'); ?>" name="moviewppanel_country" id="moviewppanel_country"  value="<?php echo stripslashes_deep(get_option('moviewppanel_country')); ?>">
		</p>
		<p>
			<label for="moviewppanel_search"><?php echo __('Enter text for Search', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for search on menù dropdown.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Search...', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Search...', 'moviewp'); ?>" name="moviewppanel_search" id="moviewppanel_search"  value="<?php echo stripslashes_deep(get_option('moviewppanel_search')); ?>">
		</p>
		<p>
			<label for="moviewppanel_network"><?php echo __('Enter text for Network', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for network on tv show page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Network', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Network', 'moviewp'); ?>" name="moviewppanel_network" id="moviewppanel_network"  value="<?php echo stripslashes_deep(get_option('moviewppanel_network')); ?>">
		</p>
		<p>
			<label for="moviewppanel_creator"><?php echo __('Enter text for Creator', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for Creator on tv show page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Creator', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Creator', 'moviewp'); ?>" name="moviewppanel_creator" id="moviewppanel_creator"  value="<?php echo stripslashes_deep(get_option('moviewppanel_creator')); ?>">
		</p>
		<!--<p>
			<label for="moviewppanel_stars"><?php echo __('Enter text for Stars', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for stars on tv show page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Stars', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Stars', 'moviewp'); ?>" name="moviewppanel_stars" id="moviewppanel_stars"  value="<?php echo stripslashes_deep(get_option('moviewppanel_stars')); ?>">
		</p>-->
		<p>
			<label for="moviewppanel_season"><?php echo __('Enter text for Season', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Season on tv show page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Season', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Season', 'moviewp'); ?>" name="moviewppanel_season" id="moviewppanel_season" value="<?php echo stripslashes_deep(get_option('moviewppanel_season')); ?>">
		</p>
		<p>
			<label for="moviewppanel_seasons"><?php echo __('Enter text for Seasons', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Seasons on tv show page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Seasons', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Seasons', 'moviewp'); ?>" name="moviewppanel_seasons" id="moviewppanel_seasons" value="<?php echo stripslashes_deep(get_option('moviewppanel_seasons')); ?>">
		</p>
		<p>
			<label for="moviewppanel_episode"><?php echo __('Enter text for Episode', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Episode on tv show page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Episode', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Episode', 'moviewp'); ?>" name="moviewppanel_episode" id="moviewppanel_episode" value="<?php echo stripslashes_deep(get_option('moviewppanel_episode')); ?>">
		</p>
		<p>
			<label for="moviewppanel_episodes"><?php echo __('Enter text for Episodes', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Episodes on tv show page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Episodes', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Episodes', 'moviewp'); ?>" name="moviewppanel_episodes" id="moviewppanel_episodes" value="<?php echo stripslashes_deep(get_option('moviewppanel_episodes')); ?>">
		</p>
		<p>
			<label for="moviewppanel_director"><?php echo __('Enter text for Director', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Director on movies.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Director', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Director', 'moviewp'); ?>" name="moviewppanel_director" id="moviewppanel_director"  value="<?php echo stripslashes_deep(get_option('moviewppanel_director')); ?>">
		</p>
		<p>
			<label for="moviewppanel_play"><?php echo __('Enter text for Play', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Play button.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Play', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Play', 'moviewp'); ?>" name="moviewppanel_play" id="moviewppanel_play"  value="<?php echo stripslashes_deep(get_option('moviewppanel_play')); ?>">
		</p>
		<p>
			<label for="moviewppanel_share"><?php echo __('Enter text for Share', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Share button.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Share', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Share', 'moviewp'); ?>" name="moviewppanel_share" id="moviewppanel_share"  value="<?php echo stripslashes_deep(get_option('moviewppanel_share')); ?>">
		</p>
		<p>
			<label for="moviewppanel_trailer"><?php echo __('Enter text for Trailer', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Trailer button.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Trailer', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Trailer', 'moviewp'); ?>" name="moviewppanel_trailer" id="moviewppanel_trailer"  value="<?php echo stripslashes_deep(get_option('moviewppanel_trailer')); ?>">
		</p>
		<p>
			<label for="moviewppanel_streaming"><?php echo __('Enter text for Streaming', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Streaming button.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Streaming', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Streaming', 'moviewp'); ?>" name="moviewppanel_streaming" id="moviewppanel_streaming"  value="<?php echo stripslashes_deep(get_option('moviewppanel_streaming')); ?>">
		</p>
		<p>
			<label for="moviewppanel_download"><?php echo __('Enter text for Download', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify download button.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Download', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Download', 'moviewp'); ?>" name="moviewppanel_download" id="moviewppanel_download" value="<?php echo stripslashes_deep(get_option('moviewppanel_download')); ?>">
		</p>
		<p>
			<label for="moviewppanel_watch"><?php echo __('Enter text for Watch Now', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Watch Now Player Button.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Watch Now', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Watch Now', 'moviewp'); ?>" name="moviewppanel_watch" id="moviewppanel_watch" value="<?php echo stripslashes_deep(get_option('moviewppanel_watch')); ?>">
		</p>
		<p>
			<label for="moviewppanel_advertise"><?php echo __('Enter text for Advertise', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Advertise Here button, you can use this text as a fake player button to monetize your site.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Advertise Here', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Advertise Here', 'moviewp'); ?>" name="moviewppanel_advertise" id="moviewppanel_advertise"  value="<?php echo stripslashes_deep(get_option('moviewppanel_advertise')); ?>">
		</p>
		<p>
			<label for="moviewppanel_textautoembed"><?php echo __('Enter text for Auto Embed', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Auto Embed module.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Auto Embed', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Auto Embed', 'moviewp'); ?>" name="moviewppanel_textautoembed" id="moviewppanel_textautoembed"  value="<?php echo stripslashes_deep(get_option('moviewppanel_textautoembed')); ?>">
		</p>
		<p>
			<label for="moviewppanel_textmultiserver"><?php echo __('Enter text for Multi Server', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Multi Server module.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Multi Server', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Multi Server', 'moviewp'); ?>" name="moviewppanel_textmultiserver" id="moviewppanel_textmultiserver"  value="<?php echo stripslashes_deep(get_option('moviewppanel_textmultiserver')); ?>">
		</p>
		<p>
			<label for="moviewppanel_txtcomments"><?php echo __('Enter text for Comments', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Enter text for Comments.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Comments', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Comments', 'moviewp'); ?>" name="moviewppanel_txtcomments" id="moviewppanel_txtcomments"  value="<?php echo stripslashes_deep(get_option('moviewppanel_txtcomments')); ?>">
		</p>
		<p>
			<label for="moviewppanel_recently"><?php echo __('Enter text for Sort by', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Sort by option on sortby module.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Sort by', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Sort by', 'moviewp'); ?>" name="moviewppanel_recently" id="moviewppanel_recently"  value="<?php echo stripslashes_deep(get_option('moviewppanel_recently')); ?>">
		</p>
		<p>
			<label for="moviewppanel_mostrated"><?php echo __('Enter text for Rating', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Rating option on sortby module.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Rating', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Rating', 'moviewp'); ?>" name="moviewppanel_mostrated" id="moviewppanel_mostrated"  value="<?php echo stripslashes_deep(get_option('moviewppanel_mostrated')); ?>">
		</p>
		<p>
			<label for="moviewppanel_mostwatched"><?php echo __('Enter text for Views', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Views option on sortby module.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Views', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Views', 'moviewp'); ?>" name="moviewppanel_mostwatched" id="moviewppanel_mostwatched"  value="<?php echo stripslashes_deep(get_option('moviewppanel_mostwatched')); ?>">
		</p>
		<p>
			<label for="moviewppanel_releasedate"><?php echo __('Enter text for Date', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Date option on sortby module.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Date', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Date', 'moviewp'); ?>" name="moviewppanel_releasedate" id="moviewppanel_releasedate"  value="<?php echo stripslashes_deep(get_option('moviewppanel_releasedate')); ?>">
		</p>
		<p>
			<label for="moviewppanel_titleato"><?php echo __('Enter text for Title', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Title on sortby module.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Title', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Title', 'moviewp'); ?>" name="moviewppanel_titleato" id="moviewppanel_titleato"  value="<?php echo stripslashes_deep(get_option('moviewppanel_titleato')); ?>">
		</p>
		<p>
			<label for="moviewppanel_fullbio"><?php echo __('Enter text for Full Bio in person page.', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Full Bio in person page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Full Bio', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Full Bio', 'moviewp'); ?>" name="moviewppanel_fullbio" id="moviewppanel_fullbio"  value="<?php echo stripslashes_deep(get_option('moviewppanel_fullbio')); ?>">
		</p>
		<p>
			<label for="moviewppanel_nobio"><?php echo __('Enter text for "No bio available for" in person page.', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify Full Bio in person page.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('No bio available for', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('No bio available for', 'moviewp'); ?>" name="moviewppanel_nobio" id="moviewppanel_nobio"  value="<?php echo stripslashes_deep(get_option('moviewppanel_nobio')); ?>">
		</p>
		<p>
			<label for="moviewppanel_testolike"><?php echo __('Enter text for Like', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify text for Like button.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Like', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Like', 'moviewp'); ?>" name="moviewppanel_testolike" id="moviewppanel_testolike"  value="<?php echo stripslashes_deep(get_option('moviewppanel_testolike')); ?>">
		</p>
		<p>
			<label for="moviewppanel_textfavorites"><?php echo __('Enter text for Favorites', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify text for Favorites.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Favorites', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Favorites', 'moviewp'); ?>" name="moviewppanel_textfavorites" id="moviewppanel_textfavorites"  value="<?php echo stripslashes_deep(get_option('moviewppanel_textfavorites')); ?>">
		</p>
		<p>
			<label for="moviewppanel_related"><?php echo __('Enter text for related post', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify text for Related.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('You might also like..', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('You might also like..', 'moviewp'); ?>" name="moviewppanel_related" id="moviewppanel_related"  value="<?php echo stripslashes_deep(get_option('moviewppanel_related')); ?>">
		</p>
		<p>
			<label for="moviewppanel_txtnoletter"><?php echo __('Enter text for no letter', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Text that identify text for nothing matched letter.', 'moviewp'); ?><br><?php echo __('Default:', 'moviewp'); ?> <?php echo __('Sorry, but nothing matched this letter.', 'moviewp'); ?></span>
			<input type="text" placeholder="<?php echo __('Sorry, but nothing matched this letter.', 'moviewp'); ?>" name="moviewppanel_txtnoletter" id="moviewppanel_txtnoletter"  value="<?php echo stripslashes_deep(get_option('moviewppanel_txtnoletter')); ?>">
		</p>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>

<?php get_template_part('moviewppanel/footer'); ?>