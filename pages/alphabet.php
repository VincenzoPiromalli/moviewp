<?php
/**
 * Template Name: alphabet
 * 
 * Template part for displaying alphabet page content in alphabet.php
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

get_header(); ?>

<section id="content" class="inner-container">
	<div class="inner-container" style="margin-top:20px;">
		<div <?php post_class(); ?>>
			
			<?php 
				$filter_args = array
				(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				);
				$letter_posts = new WP_Query($filter_args);
				$posts_array = array();
				
				// Get all posts
				while ( $letter_posts->have_posts() ) : $letter_posts->the_post(); 
				$posts_array[] = strtolower(get_the_title()[0]);
			endwhile; ?>
			<ul id="a-z">
				<?php 
					$alphabet_array = range('a', 'z');
					$number_array = range(0, 9); 
					//$build_li = '';
					
					// Check if number
					if(count(array_intersect($posts_array, $number_array)) > 0){
						echo "<li class=\"active\" data-letter=\"#\">#</li>";
					}
					else 
					{
						echo "<li data-letter=\"#\">#</li>";
					}
					//echo "<li $build_li>" . '#' . '</li>';
					
					foreach ($alphabet_array as $letter)
					{
						if (in_array($letter, $posts_array)) 
						{	
							echo "<li class=\"active\" data-letter=".$letter.">$letter</li>";
						}
						else 
						{
							echo "<li data-letter=".$letter.">$letter</li>";
						}
					} 
				?>
			</ul>
			
			<div id="title-status">
				<p><?php echo esc_html__( 'Showing: ', 'moviewp' ); ?><span></span></p>
				<p id="show-all"><?php echo esc_html__( 'Show all', 'moviewp' ); ?></p>
			</div>
			
			<?php 
				$i = -1;
			?>
			
			<ul id="posts-results">
				<?php while ( $letter_posts->have_posts() ) : $letter_posts->the_post(); 
					$imdbRating = get_post_meta($post->ID, "imdbRating", $single = true);
					$i++;
					
					if(is_numeric($posts_array[$i])) 
					{
						echo "<li data-letter=\"#\">";
						echo "<a href=".get_the_permalink().">";
						echo get_the_title();
						echo '<span><i class="fa fa-star"></i>'.$imdbRating.'</span></a>';
						echo "</li>";
					}
					else 
					{
						echo "<li data-letter=".$posts_array[$i].">";
						echo "<a href=".get_the_permalink().">";
						echo get_the_title();
						echo '<span><i class="fa fa-star"></i>'.$imdbRating.'</span></a>';
						echo "</li>";
					} ?>
					
					<?php endwhile; ?>
			</ul>
			
		</div>
	</div>
</section>
<?php get_footer(); ?>