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

$className = 'buttons';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


if( have_rows('button') ):

    ?>
    <div class="<?php echo esc_attr($className); ?>">
    <?php
    while( have_rows('button') ) : the_row();

        $label = get_sub_field('label');
        $link = get_sub_field('link');
        $new_tab = get_sub_field('open_in_new_tab');
        $style = get_sub_field('button_style');

        $new_tab = (!empty($new_tab)) ? ' target="_blank" ' : '';

        ?>

        <a class="buttons__btn buttons__btn--<?php echo esc_attr($style); ?>" href="<?php echo esc_url($link) ?>" <?php echo esc_html($new_tab) ?>>
            <?php echo esc_html($label); ?>
        </a>

        <?php

    endwhile;
    ?>
    </div>
    <?php
endif;
