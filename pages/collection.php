<?php
/**
 * Template Name: collection
 * 
 * Template part for displaying collection page content in collection.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * ----------------------------------------------------
 * @author: fr0zen
 * @author URI: https://fr0zen.store
 * @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
 * ----------------------------------------------------
 * 
 * 
 * @since 3.8.7
 * 20 May 2022
 */
	
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$apikey = "7ac6de5ca5060c7504e05da7b218a30c";
$language = apilanguage;

get_header(); ?>
<section id="content" class="inner-container">
	<div class="item-container">
		<ul class="leading-loose">
			<?php 
				$collections = get_terms('collection');
				foreach($collections as $collection) {
					$collectionName = str_replace(' ', '+', $collection->name);
					$key = urlencode($collectionName);
					$data = json_decode(file_get_contents("https://api.themoviedb.org/3/search/collection?query=$key&api_key=$apikey&language=$language"), true);
					foreach(array_slice($data["results"], 0, 1) as $list) {
						//foreach ($data["results"] as $list) {
						$name = $list['name'];
						//$image = "//image.tmdb.org/t/p/w220_and_h330_face" . $list["poster_path"];
						$image = get_wp_term_image(intval($collection->term_id),'collection');
						$backdrop = "//image.tmdb.org/t/p/w780" . $list["backdrop_path"];
						$link = get_term_link(intval($collection->term_id),'collection');
						if(empty($image)){
							$image = "//image.tmdb.org/t/p/w220_and_h330_face" . $list["poster_path"];
						}
					?>
					<li id="post-<?php echo $collection->term_id; ?>" class="flex flex-row items-center justify-between my-4 relative" style="margin:5px;">
						<a href="<?php echo $link; ?>" rel="bookmark">
							<div class="absolute h-full w-full z-0 collection_item" style="background-image:linear-gradient(to right, rgba(255, 255, 255, 0), rgba(25 23 23) 100%), url('<?php echo $backdrop; ?>');">
								<div class="absolute font-black text-2xl" style="font-size: 2.3rem;top: -2px; right: 20px;"><?php echo $collection->count; ?></div>
							</div>
							<div class="flex flex-row items-center relative z-10 p-4">
								<div class="flex flex-row items-center">
									<img src="<?php echo $image ?>" alt="<?php echo $collection->name; ?>" class="w-8 mr-2 zoom" style="border-radius:3px;border: 1px solid #272727;" />
									<strong class="mr-2 font-bold"><?php echo $collection->name; ?></strong>
								</div>
								<span class="hidden md:inline"></span>
							</div>
							<div class="relative z-10 pr-4 pl-2 h-full">
								<span class="font-bold text-gray-200"></span>
							</div>
						</a>
					</li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
</section>
<?php get_footer(); ?>

