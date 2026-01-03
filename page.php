<?php
get_header();
?>

<main id="primary" class="site-main">
    <section class="page_section">
        <?php
        the_title('<h1 class="post_title">', '</h1>');
        the_content()
        ?>
    </section>
</main><!-- #primary -->

<?php
get_footer();
