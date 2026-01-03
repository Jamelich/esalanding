<?php

/**
 * Шаблон страницы архива
 */
?>
<?php get_header(); ?>

<section class="blog_posts">

    <h1>
        <?php
        if (is_category()) :
            single_cat_title();
        endif;
        ?>
    </h1>

    <?php if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    } ?>

    <?php while (have_posts()) : the_post(); ?>
        <div class="blog_posts_item">
            <h2>
                <a href="<?php echo the_permalink(); ?>">
                    <?php the_title() ?>
                </a>
            </h2>
            <p><?php the_excerpt() ?></p>
            <a class="post_read_more" href="<?php echo the_permalink(); ?>">Читать далее...</a>
        </div>
    <?php endwhile; ?>

    <div class="blog_posts_paginate">
        <?php echo paginate_links(
            array(
                'prev_next' => true,
                'prev_text' => __('&laquo; Предыущая страница'),
                'next_text' => __('Следующая страница &raquo;'),
            )
        ); ?>
    </div>

</section>

<?php get_footer();
