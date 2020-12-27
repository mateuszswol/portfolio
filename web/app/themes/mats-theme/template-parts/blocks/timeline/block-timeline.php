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

$className = 'timeline';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( have_rows('column') ):

    ?>
    <ul class="<?php echo esc_attr($className); ?>">
        <?php
        while( have_rows('column') ) : the_row();

            $date = get_sub_field('date');
            $subheading = get_sub_field('subheading');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');

            ?>

            <li class="timeline__column">
                <p class="timeline__date"><?php echo esc_html($date); ?></p>
                <span class="timeline__subheading"><?php echo esc_html($subheading); ?></span>
                <h3 class="timeline__heading"><?php echo esc_html($heading); ?></h3>
                <p class="timeline__description"><?php echo esc_html($description); ?></p>
            </li>

        <?php

        endwhile;
        ?>
    </ul>
<?php
endif;