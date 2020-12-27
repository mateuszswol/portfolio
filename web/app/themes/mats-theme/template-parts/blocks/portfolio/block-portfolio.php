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

$className = 'portfolio';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 9,
    'orderby' => 'date',
    'order' => 'DESC',
    'category_name' => 'portfolio',
);

$loop = new WP_Query( $args );

?>

    <div class="<?php echo esc_attr($className); ?>">

        <?php

        while ( $loop->have_posts() ) : $loop->the_post();

        ?>
            <?php $page_url = (!empty(get_field('page_url', get_the_ID()))) ? get_field('page_url', get_the_ID()) : ''; ?>
            <a class="portfolio__item" href="<?php echo get_permalink(); ?>">
                <div class="portfolio__container">
                    <img class="portfolio__img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="" />
                </div>
                <h3 class="portfolio__title"><?php echo get_the_title(); ?></h3>
                <?php if(!empty($page_url)): ?>
                    <?php
                        if(strpos($page_url, 'https://') !== false){
                            $page_url = str_replace('https://','',$page_url);
                        }
                        elseif(strpos($page_url, 'http://') !== false){
                            $page_url = str_replace('http://','',$page_url);
                        }
                        if(strpos($page_url, '/') !== false) {
                            $page_url = substr($page_url,0 ,strpos($page_url, '/'));
                        }
                    ?>
                    <p class="portfolio__link"><?php echo $page_url; ?></p>
                <?php endif; ?>
            </a>

        <?php

        endwhile;

        ?>
    </div>

<?php
wp_reset_postdata();