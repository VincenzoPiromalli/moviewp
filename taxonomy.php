<?php
/**
 * The taxonomy template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @author: fr0zen
 * @author URI: https://fr0zen.store
 * @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
 * ----------------------------------------------------
 * @since 3.8.7
 * 20 May 2022
 */

/* Exit if accessed directly */
if (!defined('ABSPATH'))
{
    exit;
}

get_header();
get_template_part('template-parts/content/content', 'taxonomy');
get_footer();

