<?php
// Шаблон записи по умолчанию
get_header(); ?>

<div class="wrapper_single_post_header" style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">
    <h1><?= get_the_title() ?></h1>
    <?php if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    if (has_post_thumbnail()) { ?>
        <!-- <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= get_the_title() ?>"> -->
    <?php } ?>
</div>

<div class="content-with-sidebar container">
    <aside class="services-sidebar">
        <h3 class="sidebar-title"><?php echo __('Наши услуги', 'esablog'); ?></h3>
        <ul class="services-list">
            <?php
            $services_query = new WP_Query(array(
                'category_name' => 'uslugi',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC'
            ));

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <li class="services-list__item">
                        <a href="<?php the_permalink(); ?>" class="services-list__link <?php if (get_the_ID() == $post->ID) echo 'is-active'; ?>">
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <li class="services-list__item">Услуги не найдены</li>
            <?php endif; ?>
        </ul>
    </aside>

    <main class="single_post">
        <article class="post-content">
            <?php the_content(); ?>
        </article>
        <div class="contact-form-container">
            <?php
            $current_language = apply_filters('wpml_current_language', NULL);

            switch ($current_language) {
                case 'et':
                    echo do_shortcode('[contact-form-7 id="80256ac" title="Форма на странице услуг EST"]');
                    break;
                case 'ru':
                    echo do_shortcode('[contact-form-7 id="831e5c0" title="Форма на странице услуг RUS"]');
                    break;
                default: // Russian or fallback
                    echo do_shortcode('[contact-form-7 id="831e5c0" title="Форма на странице услуг RUS"]');
            }
            ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>

<style>
    :root {
        --orange-color: #ef7d25;
        --bg-color-hf: #3B3B3B;
        --text-primary-color: #000;
        --blue-color: #97B3DB;
        --white-color: #fff;
        --border-radius: 8px;
    }

    .content-with-sidebar {
        display: flex;
        gap: 40px;
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .services-sidebar {
        flex: 0 0 280px;
    }

    .sidebar-title {
        color: var(--bg-color-hf);
        font-size: 1.5rem;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--blue-color);
    }

    .services-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .services-list__item {
        margin-bottom: 8px;
    }

    .services-list__link {
        display: block;
        padding: 12px 16px;
        text-decoration: none;
        color: var(--text-primary-color);
        background-color: var(--white-color);
        border-radius: var(--border-radius);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        font-weight: 500;
    }

    .services-list__link:hover {
        background-color: var(--blue-color);
        color: var(--white-color);
    }

    .services-list__link.is-active {
        background-color: var(--orange-color);
        color: var(--white-color);
        border-left-color: var(--bg-color-hf);
        font-weight: 600;
    }

    .single_post {
        flex: 1;
    }

    .post-content {
        background: var(--white-color);
        padding: 30px;
        border-radius: var(--border-radius);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .contact-form-container {
        margin-top: 40px;
        background: var(--white-color);
        padding: 30px;
        border-radius: var(--border-radius);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
        .content-with-sidebar {
            flex-direction: column;
            gap: 30px;
        }

        .services-sidebar {
            flex: 1;
        }
    }

    .custom-cf7-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
        background: var(--white-color);
        border-radius: var(--border-radius);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .form-row {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        font-weight: 500;
        color: var(--bg-color-hf);
        margin-bottom: 8px;
        font-size: 16px;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e0e0e0;
        border-radius: var(--border-radius);
        font-size: 16px;
        transition: all 0.3s ease;
        background-color: #f9f9f9;
    }

    .form-input:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--blue-color);
        box-shadow: 0 0 0 3px rgba(151, 179, 219, 0.3);
        background-color: var(--white-color);
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #a0a0a0;
        opacity: 1;
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .submit-row {
        margin-top: 30px;
        text-align: right;
    }

    .submit-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 24px;
        background-color: var(--orange-color);
        color: var(--white-color);
        border: none;
        border-radius: var(--border-radius);
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .submit-button:hover {
        background-color: #e06d1a;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(239, 125, 37, 0.3);
    }

    .submit-button:active {
        transform: translateY(0);
    }

    .submit-icon {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .submit-button:hover .submit-icon {
        transform: translateX(3px);
    }

    /* Стили для ошибок валидации */
    .wpcf7-not-valid-tip {
        color: #dc3232;
        font-size: 14px;
        margin-top: 5px;
    }

    .wpcf7-not-valid {
        border-color: #dc3232 !important;
    }

    .wpcf7-response-output {
        padding: 15px;
        margin: 20px 0 0 !important;
        border-radius: var(--border-radius);
    }

    /* Адаптивность */
    @media (max-width: 480px) {
        .custom-cf7-form {
            padding: 20px;
        }

        .form-row {
            margin-bottom: 20px;
        }

        .submit-button {
            width: 100%;
        }
    }
</style>