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

$className = 'gallery';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( have_rows('images') ):

    ?>
    <div class="gallery">
        <ul class="gallery__list">
            <?php
            while( have_rows('images') ) : the_row();

                $imageId = get_sub_field('image') ?: '123';
                $imageSrc = wp_get_attachment_image_src($imageId, 'full')[0];
                $imageWidth = wp_get_attachment_image_src($imageId, 'full')[1];
                $imageHeight = wp_get_attachment_image_src($imageId, 'full')[2];
                $imageSrcset = wp_get_attachment_image_srcset($imageId);
                $imageAlt = get_post_meta($imageId, '_wp_attachment_image_alt', true);

                ?>

                <li class="gallery__item">
                    <img class="gallery__img" loading="lazy" width="<?php echo esc_attr($imageWidth); ?>" height="<?php echo esc_attr($imageHeight); ?>" src="<?php echo esc_url($imageSrc); ?>" alt="<?php echo esc_html($imageAlt); ?>" srcset="<?php echo esc_html($imageSrcset); ?>" sizes="100vw" />
                </li>

            <?php

            endwhile;
            ?>
        </ul>
    </div>
<?php
endif;
