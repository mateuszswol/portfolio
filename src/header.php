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

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
        <title>Mateusz Swół Portfolio</title>
        <meta charset="UTF-8" />
        <meta name="generator" content="MatsTheme" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=5.0" />
        <link rel="preload" as="font" href="<?php echo MATS_THEME_FONTS . 'Poppins-Light.woff2' ?>" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" as="font" href="<?php echo MATS_THEME_FONTS . 'Poppins-Regular.woff2' ?>" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" as="font" href="<?php echo MATS_THEME_FONTS . 'Poppins-SemiBold.woff2' ?>" type="font/woff2" crossorigin="anonymous">
        <style type="text/css">
            <?php
                $my_file = fopen(get_template_directory().'/assets/css/main.css','r') or die("Unable to open file!");
                echo fread($my_file,filesize(get_template_directory().'/assets/css/main.css'));
                fclose($my_file);
            ?>
        </style>
        <?php wp_head(); ?>
        <script id="recaptcha"></script>
    </head>
    <body id="top">
        <div class="container">
            <header class="header">
                <a class="logo" href="<?php echo esc_url(home_url()); ?>">
                    <img class="logo__img" src="/app/uploads/logo-mateusz-swol.svg" />
                </a>
                <div id='hamburger' class='hamburger header__hamburger'><span class='hamburger__span'></span></div>
                <nav class="menu">
                    <?php wp_nav_menu([
                        'theme_location'  => 'mats-header-menu',
                        'walker'          => new main_menu(),
                        'menu_id'         => 'main-menu',
                        'menu_class'      => 'menu__container',
                        'item_spacing'    => 'discard',
                        'container'       => '',
                        'container_class' => '',
                        'fallback_cb'     => FALSE,
                        'echo'            => TRUE
                    ]); ?>
                </nav>
            </header>
            <main class="main">
