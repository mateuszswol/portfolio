<?php
/**
 * @since 1.0.0
 * @package mats-theme
 * @link https://mateuszswol.pl
 *
 * @author Mateusz Swół <biuro@mateuszswol.pl>
 * @copyright 2020 Mateusz Swół
 */

// Register menus
register_nav_menus([
    'mats-header-menu' => esc_html__('Header Menu', 'mats'),
    'mats-footer-menu' => esc_html__('Footer Menu', 'mats'),
]);

// Example menu options
$example_menu_options = [
    'menu'            => '',  // Desired menu. Accepts a menu ID, slug, name, or object.
    'menu_class'      => '',  // CSS class to use for the ul element which forms the menu. Default 'menu'.
    'menu_id'         => '',  // The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
    'container'       => '',  // Whether to wrap the ul, and what to wrap it with. Default 'div'.
    'container_class' => '',  // Class that is applied to the container. Default 'menu-{menu slug}-container'.
    'container_id'    => '',  // The ID that is applied to the container.
    'fallback_cb'     => '',  // If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
    'before'          => '',  // Text before the link markup.
    'after'           => '',  // Text after the link markup.
    'link_before'     => '',  // Text before the link text.
    'link_after'      => '',  // Text after the link text.
    'echo'            => '',  // Whether to echo the menu or return it. Default true.
    'depth'           => '',  // How many levels of the hierarchy are to be included. 0 means all. Default 0.
    'walker'          => '',  // Instance of a custom walker class.
    'theme_location'  => '',  // Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
    'items_wrap'      => '',  // How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
    'item_spacing'    => ''   // Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
];

// Main menu walker
if (!class_exists('main_menu')) {
    class main_menu extends Walker_Nav_Menu {
        function start_el(&$output, $item, $depth = 0, $args = [], $obj_id = 0) {
            global $wp_query;

            $item_output = $li_text_block_class = $column_class = '';

            if (!empty($item->url) && strpos($item->url, '[domain]') !== FALSE) {
                $replace   = str_replace('http://', '', get_home_url());
                $replace   = str_replace('https://', '', $replace);
                $item->url = str_replace('[domain]', $replace, $item->url);
            }

            $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target)     .'"' : '';
            $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)        .'"' : '';
            $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url)        .'"' : '';
            $attributes .= !empty($item->classes[0])    ? ' class="'  . esc_attr($item->classes[0]) .' menu__link"': ' class="menu__link"';

            $link = do_shortcode(apply_filters('the_title', $item->title, $item->ID));


            $item_output .= $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before;
            $item_output .= $depth === 0 ? $link : $link;
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;


            $indent = $depth ? str_repeat("\t", $depth) : '';
            $classes = empty($item->classes) || !is_array($item->classes) ? [] : $item->classes;

            if ($depth === 0 && array_search('current-menu-item', $classes)) {
                $this->active_item = true;
            }

            if ($this->has_children) {
                $output .= $indent . '<li class="menu__item menu__item--has-children">';
            } else {
                $output .= $indent . '<li class="menu__item">';
            }

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }

        function end_el(&$output, $item, $depth = 0, $args = []) {
            $output .= "</li>\n";
        }
    }
}
