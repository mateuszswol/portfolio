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

$className = 'list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( have_rows('list') ):

    ?>
    <ul class="<?php echo esc_attr($className); ?>">
        <?php
        while( have_rows('list') ) : the_row();

            $title = get_sub_field('title');
            $tooltip = get_sub_field('tooltip');

            ?>

            <li class="list__item">
                <p class="list__title"><?php echo esc_html($title); ?></p>
                <div class="list__tooltip">
                    <svg class="list__icon" fill="#aaaaaa" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 330 330" xml:space="preserve">
                        <path d="M165,0C74.019,0,0,74.02,0,165.001C0,255.982,74.019,330,165,330s165-74.018,165-164.999C330,74.02,255.981,0,165,0z
                        M165,300c-74.44,0-135-60.56-135-134.999C30,90.562,90.56,30,165,30s135,60.562,135,135.001C300,239.44,239.439,300,165,300z"/>
                        <path d="M164.998,70c-11.026,0-19.996,8.976-19.996,20.009c0,11.023,8.97,19.991,19.996,19.991
                        c11.026,0,19.996-8.968,19.996-19.991C184.994,78.976,176.024,70,164.998,70z"/>
                        <path d="M165,140c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-90C180,146.716,173.284,140,165,140z"/>
                    </svg>
                    <div class="list__content"><?php echo $tooltip; ?></div>
                </div>
            </li>

        <?php

        endwhile;
        ?>
    </ul>
<?php
endif;