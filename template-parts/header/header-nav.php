<?php
/*
 * Displays the header dropdown navigation
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

$moviewp_sortby = get_option('moviewppanel_sortby');
$moviewp_quality = get_option('moviewppanel_quality');
$moviewp_grid = get_option('moviewppanel_grid');
$moviewp_letter = get_option('moviewppanel_letter');

?>
<div id="header-secondary">
	<div class="inner-container">
		<nav class="filters">
			<ul>
				<li class="dropdown genre-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo genre; ?><i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu dropdown-menu-large">
						<?php DropdownGenre(); ?>
					</ul>
				</li>
				<li class="dropdown quality-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo year; ?><i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu year ps-display">
						<?php DropdownYears(); ?>
					</ul>
				</li>
				<li class="dropdown quality-filter">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo country; ?><i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu country ps-display">
						<?php DropdownCountries(); ?>
					</ul>
				</li>
				<?php if ($moviewp_quality == 1) { ?>
				<li class="dropdown quality-filter quality">
					<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo txtquality; ?><i class="fa fa-angle-down"></i></div>
					<ul class="dropdown-menu quality ps-display">
						<?php DropdownQuality(); ?>
					</ul>
				</li>
				<?php } ?>
				<?php 
					if ($moviewp_sortby == 1) { 
					get_template_part('template-parts/modules/modules', 'sortby');
					}
					if ($moviewp_grid == 1) { 
				    get_template_part('template-parts/modules/modules', 'grid');
					}
					if ($moviewp_letter == 1) {
					get_template_part('template-parts/modules/modules', 'letter');
					}
					get_search_form();
				?>
			</ul>
		</nav>
		<p id="slogan"><?php echo slogan; ?></p>
	</div>
</div>