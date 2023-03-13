<?php
/*
 * Displays the sortby module 
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

$moviewp_postviews = get_option('moviewppanel_postviews');
$moviewp_likes = get_option('moviewppanel_likes');
$moviewp_comments = get_option('moviewppanel_comments');
$moviewp_txtcomments = get_option('moviewppanel_txtcomments');

?>

<li class="dropdown sortby">
	<form method="get" action="" class="filter-form">
		<select name="order" class="custom-select category-filter dropdown-toggle" data-toggle="dropdown" tabindex="-2" aria-label="select_sortby" id="select_sortby">
			<option value="date-desc" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'date-desc') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo recently; ?></option>
			<option value="rating" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'rating') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo mostrated; ?></option>
			<?php if ($moviewp_postviews == 1) { ?>
			<option value="views" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'views') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo mostwatched; ?></option>
			<?php } ?>
			<?php if ($moviewp_likes == 1) { ?>
			<option value="like" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'like') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo testolike; ?></option>
			<?php } ?>
			<?php if ($moviewp_comments == 2) { ?>
			<option value="comments" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'comments') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo txtcomments; ?></option>
			<?php } ?>
			<option value="random" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'random') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo random; ?></option>
			<option value="years-asc" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'years-asc') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo releasedate; ?> &darr;</option>
			<option value="years-desc" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'years-desc') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo releasedate; ?> &uarr;</option>
			<option value="title-asc" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'title-asc') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo titleato; ?> &#8594;</option>
			<option value="title-desc" <?php if (isset($_GET['order'])) { if ($_GET['order'] == 'title-desc') echo 'selected="selected"'; } else { echo ""; } ?>><?php echo titleato; ?> &#8592;</option>
		</select>
	</form>
</li>