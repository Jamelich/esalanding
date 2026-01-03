<?php
if ($wp_query->found_posts == 1) {
    $id_post = $wp_query->posts[0]->ID;
    $url = get_the_permalink($id_post);
    header('Location: ' . $url);
}

get_header();
// echo $wp_query->found_posts;
?>

<section class="result_search">
    <h1><?php echo 'Search result: ' . '<span>' . get_search_query() . '</span>'; ?></h1>
    <div class="wrap_result_search">
        <?php if (have_posts()) :
            while (have_posts()) : the_post();
                if (get_post_type() == 'product') {
                    get_template_part('woocommerce/content-product');
                } else { ?>
                    <?php get_template_part('parts/useful-articles'); ?>
                    <!-- <div id="posts">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        <p><?php the_excerpt() ?></p>
                        <div>Дата добавления: <?php the_date() ?></div>
                    </div> -->
        <?php };
            endwhile;
        else :
            echo "Sorry, nothing was found for your result";
        endif;
        ?>
    </div>
</section>

<?php get_footer() ?>