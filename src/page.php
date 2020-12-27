<?php
/**
 * @since 1.0.0
 * @package mats-theme
 * @link https://mateuszswol.pl
 *
 * @author Mateusz Swół <biuro@mateuszswol.pl>
 * @copyright 2020 Mateusz Swół
 */


// Block direct access to file
if ( !defined('ABSPATH') ){ die(); }

// Get header.php content
get_header();

the_content();

// Get footer.php content
get_footer();
?>

