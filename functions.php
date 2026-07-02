<?php

// Подключаем свои стили
add_action('wp_enqueue_scripts', 'esa_add_style', 25);
function esa_add_style()
{

    wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', array());
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/css/animate.min.css', array());
    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css', array());

    wp_enqueue_style('global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/global.css'));
    wp_enqueue_style('utp-banner', get_stylesheet_directory_uri() . '/assets/css/utp-banner.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/utp-banner.css'));
    wp_enqueue_style('about-reneval', get_stylesheet_directory_uri() . '/assets/css/about-reneval.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/about-reneval.css'));

    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), '1.0.4');
    wp_enqueue_script('animate', get_stylesheet_directory_uri() . '/assets/js/animate.js', array(), '1.0.6');
    wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js', array());
    wp_enqueue_script('swiper-init', get_stylesheet_directory_uri() . '/assets/js/swiper-init.js', array(), '1.0.5');
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
function esa_register_menus()
{
    register_nav_menus(array(
        'primary' => 'Основное меню в шапке',
        'footer-menu-1' => 'Меню в футере 1',
        'footer-menu-2' => 'Меню в футере 2'
    ));
}
add_action('after_setup_theme', 'esa_register_menus');

// Разрешаем загрузку SVG в медиатеку
add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

// Добавляем поддержку SVG для отображения в медиафайлах
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 4);
function fix_svg_mime_type($data, $file, $filename, $mimes)
{
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }
    return $data;
}

// Отображаем SVG в медиабиблиотеке как обычные изображения
add_filter('wp_prepare_attachment_for_js', 'show_svg_in_media_library', 10, 3);
function show_svg_in_media_library($response, $attachment, $meta)
{
    if ($response['mime'] === 'image/svg+xml') {
        $response['url'] = $response['url'];
        $response['icon'] = $response['url'];
    }
    return $response;
}

require_once(__DIR__ . '/inc/esa-functions.php');
