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

$images = get_field('images');
$type = get_field('gallery_style');

if($type == 'normal') {
    $className = $classBase = 'gallery';
}
else{
    $className = $classBase = 'splide';
}

if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}



if( $images ):

    ?>
    <div class="<?php echo esc_attr($className); ?>">
        <?php if($type == 'slider'): ?><div class="splide__track"><?php endif; ?>
        <ul class="<?php echo esc_attr($classBase); ?>__list">
            <?php
            foreach( $images as $image):

                $imageSrc = wp_get_attachment_image_src($image, 'full')[0];
                $imageWidth = wp_get_attachment_image_src($image, 'full')[1];
                $imageHeight = wp_get_attachment_image_src($image, 'full')[2];
                $imageSrcset = wp_get_attachment_image_srcset($image);
                $imageAlt = get_post_meta($image, '_wp_attachment_image_alt', true);

                ?>

                <li class="<?php if($classBase == 'splide'){echo esc_attr($classBase).'__slide';}else{echo esc_attr($classBase).'__item';} ?>">
                    <img class="<?php echo esc_attr($classBase); ?>__img" loading="lazy" width="<?php echo esc_attr($imageWidth); ?>" height="<?php echo esc_attr($imageHeight); ?>" src="<?php echo esc_url($imageSrc); ?>" alt="<?php echo esc_html($imageAlt); ?>" srcset="<?php echo esc_html($imageSrcset); ?>" sizes="100vw" />
                </li>

            <?php

            endforeach;
            ?>
        </ul>
        <?php if($type == 'slider'): ?></div><?php endif; ?>
    </div>
<?php
endif;
