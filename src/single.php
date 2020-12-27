<?php

get_header();

?>

    <article>
        <div class="columns columns--first">
            <div class="columns__col">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div style="height:40px" aria-hidden="true" class="spacer "></div>
        <div class="columns">
            <div class="columns__col columns__col--eight">
                <?php the_content(); ?>
            </div>
            <div class="columns__col columns__col--four">
                <?php get_template_part('template-parts/parts/portfolio', 'sidebar') ?>
            </div>
        </div>
    </article>
<?php

get_footer();
