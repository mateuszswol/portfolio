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
if (!defined('ABSPATH')) die();

// Define theme vars
define('MATS_THEME', get_template_directory());
define('MATS_THEME_URI', get_template_directory_uri());
define('MATS_THEME_HELPERS', MATS_THEME . '/inc/helpers/');

// Front-end vars
define('MATS_THEME_FONTS', MATS_THEME_URI . '/assets/fonts/');

require_once( MATS_THEME_HELPERS . 'menus.php' );
require_once( MATS_THEME_HELPERS . 'cleanup.php' );