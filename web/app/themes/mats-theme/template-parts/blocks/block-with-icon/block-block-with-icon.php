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

$className = 'block-with-icon';
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

$imageId = get_field('icon') ?: '123';
$imageSrc = wp_get_attachment_image_src($imageId, 'full')[0];
$imageSrcset = wp_get_attachment_image_srcset($imageId);
$imageAlt = get_post_meta($imageId, '_wp_attachment_image_alt', true);

$title = get_field('title') ?: 'New block';
$description = get_field('description') ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
?>

<div class="<?php echo esc_attr($className); ?>">
    <img class="block-with-icon__img" loading="lazy" src="<?php echo esc_url($imageSrc); ?>" alt="<?php echo esc_html($imageAlt); ?>" />
    <div class="block-with-icon__content">
        <h3 class="block-with-icon__title">
            <?php echo esc_html($title); ?>
        </h3>
        <p class="block-with-icon__description">
            <?php echo esc_html($description); ?>
        </p>
    </div>
</div>