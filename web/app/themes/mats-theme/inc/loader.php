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
define('MATS_THEME_HELPERS', MATS_THEME . '/inc/helpers/');

require_once(  MATS_THEME_HELPERS . 'menus.php' );