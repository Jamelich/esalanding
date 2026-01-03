<?php

// Подключаем свои стили
add_action('wp_enqueue_scripts', 'esa_add_style', 25);
function esa_add_style()
{

    wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', array());
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/animate.min.css', array());
    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css', array());
    wp_enqueue_style('libs', get_stylesheet_directory_uri() . '/assets/css/libs.min.css', array());


    wp_enqueue_style('global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/global.css'));
    wp_enqueue_style('esa-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/assets/css/header.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/header.css'));
    wp_enqueue_style('utp-section', get_stylesheet_directory_uri() . '/assets/css/utp.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/utp.css'));
    wp_enqueue_style('about-section', get_stylesheet_directory_uri() . '/assets/css/about.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/about.css'));
    wp_enqueue_style('stats-section', get_stylesheet_directory_uri() . '/assets/css/stats.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/stats.css'));
    wp_enqueue_style('super-offer', get_stylesheet_directory_uri() . '/assets/css/super_offer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/super_offer.css'));
    wp_enqueue_style('offer', get_stylesheet_directory_uri() . '/assets/css/offer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/offer.css'));
    wp_enqueue_style('material', get_stylesheet_directory_uri() . '/assets/css/material.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/material.css'));
    wp_enqueue_style('gallery', get_stylesheet_directory_uri() . '/assets/css/gallery.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/gallery.css'));
    wp_enqueue_style('additional_services', get_stylesheet_directory_uri() . '/assets/css/additional_services.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/additional_services.css'));
    wp_enqueue_style('compare', get_stylesheet_directory_uri() . '/assets/css/compare.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/compare.css'));
    wp_enqueue_style('clients', get_stylesheet_directory_uri() . '/assets/css/clients.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/clients.css'));
    wp_enqueue_style('lead', get_stylesheet_directory_uri() . '/assets/css/lead.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/lead.css'));
    wp_enqueue_style('video_reviews', get_stylesheet_directory_uri() . '/assets/css/video_reviews.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/video_reviews.css'));
    wp_enqueue_style('promo', get_stylesheet_directory_uri() . '/assets/css/promo.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/promo.css'));
    wp_enqueue_style('faq', get_stylesheet_directory_uri() . '/assets/css/faq.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/faq.css'));
    wp_enqueue_style('map', get_stylesheet_directory_uri() . '/assets/css/map.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/map.css'));
    wp_enqueue_style('reviews', get_stylesheet_directory_uri() . '/assets/css/reviews.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/reviews.css'));
    wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/footer.css'));

    wp_enqueue_style('popup', get_stylesheet_directory_uri() . '/assets/css/popup.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/popup.css'));

    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0.4');
    // wp_enqueue_script('libs', get_stylesheet_directory_uri() . '/assets/js/libs.js', array(), '1.0.3');
    wp_enqueue_script('animate', get_stylesheet_directory_uri() . '/assets/js/animate.js', array(), '1.0.5');
    wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), null, true);
}

// Поддержка миниатюр
add_theme_support('post-thumbnails'); // для всех типов постов

add_theme_support('custom-logo', array(
    'height'      => 72,
    'width'       => 160,
    'flex-height' => true,
    'flex-width'  => true,
));

// Регистрация меню
function transfer_register_menus()
{
    register_nav_menus(array(
        'primary' => 'Основное меню в шапке',
        'footer-menu-1' => 'Меню в футере 1',
        'footer-menu-2' => 'Меню в футере 2'
    ));
}
add_action('after_setup_theme', 'transfer_register_menus');

require_once(__DIR__ . '/inc/esa-functions.php');
