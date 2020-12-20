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

$className = 'image-in-circle';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$alignment = get_field('alignment');

if( !empty($alignment) ) {
    $className .= ' ' . $alignment;
}

$imageId = get_field('image') ?: '123';
$imageSrc = wp_get_attachment_image_src($imageId, 'full')[0];
$imageWidth = wp_get_attachment_image_src($imageId, 'full')[1];
$imageHeight = wp_get_attachment_image_src($imageId, 'full')[2];
$imageSrcset = wp_get_attachment_image_srcset($imageId);
$imageAlt = get_post_meta($imageId, '_wp_attachment_image_alt', true);

?>

<div class="<?php echo esc_attr($className); ?>">
    <img class="image-in-circle__img" loading="lazy" width="<?php echo esc_attr($imageWidth); ?>" height="<?php echo esc_attr($imageHeight); ?>" src="<?php echo esc_url($imageSrc); ?>" alt="<?php echo esc_html($imageAlt); ?>" srcset="<?php echo esc_html($imageSrcset); ?>" sizes="100vw" />
</div>