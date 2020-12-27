<?php

$author = get_field('author')?: 'Mateusz Swół';
$page_url = $page_name = get_field('page_url')?: '';
$date = get_field('date')?: '';
$description = get_field('short_description')?: '';

if(!empty($page_name)):
    if(strpos($page_name, 'https://') !== false){
        $page_name = str_replace('https://','',$page_name);
    }
    elseif(strpos($page_name, 'http://') !== false){
        $page_name = str_replace('http://','',$page_name);
    }
    if(strpos($page_name, '/') !== false) {
        $page_name = substr($page_name,0 ,strpos($page_name, '/'));
    }
endif;
?>

<div class="sidebar">
    <h2 class="sidebar__title">Szczegóły</h2>
    <p class="sidebar__author"><?php echo esc_html($author); ?></p>
    <a target="_blank" class="sidebar__www" href="<?php echo esc_url($page_url); ?>"><?php echo esc_html($page_name); ?></a>
    <p class="sidebar__date"><?php echo esc_html($date); ?></p>
    <p class="sidebar__description"><?php echo esc_html($description); ?></p>
    <h3 class="sidebar__subtitle">Technologie</h3>
    <?php if( have_rows('technologies') ): ?>
        <ul class="sidebar__technologies">
            <?php while( have_rows('technologies') ) : the_row(); ?>
                <li class="sidebar__technology"><?php echo get_sub_field('name'); ?></li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>
