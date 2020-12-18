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

if (!is_admin()) {
    add_action('wp_footer', function () {
        wp_dequeue_style('mediaelement');
        wp_dequeue_style('wp-mediaelement');
        wp_dequeue_script('wp-mediaelement');
        wp_deregister_script('wp-embed');
    }, 999);
}

add_action('widgets_init', function () {
    global $wp_widget_factory;
    remove_action('wp_head', [$wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style']);
});

function wpassist_remove_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
}

add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');
remove_action('wp_head', 'feed_links');
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

function disable_feed() {
    wp_die(__('No feed available, please visit the <a href="'. esc_url(home_url('/')) .'">homepage</a>!'));
}

add_action('do_feed', 'disable_feed', 1);
add_action('do_feed_rdf', 'disable_feed', 1);
add_action('do_feed_rss', 'disable_feed', 1);
add_action('do_feed_rss2', 'disable_feed', 1);
add_action('do_feed_atom', 'disable_feed', 1);
add_action('do_feed_rss2_comments', 'disable_feed', 1);
add_action('do_feed_atom_comments', 'disable_feed', 1);

remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


function wpb_disable_feed()
{
    wp_die('No feed available, please visit our <a href="' . get_bloginfo('url') . '">home page</a>!');
}

add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);

add_filter('emoji_svg_url', '__return_false');
add_filter('show_admin_bar', '__return_false');

function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'my_deregister_scripts');

global $sitepress;
remove_action('wp_head', array($sitepress, 'meta_generator_tag'));
