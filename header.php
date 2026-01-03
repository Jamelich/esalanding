<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('.page-header-bottom');
            let lastScrollY = window.scrollY;

            window.addEventListener('scroll', function() {
                // Отключаем эффект сжатия для мобильных устройств
                if (window.innerWidth > 959.98) {
                    if (window.scrollY > 100) {
                        header.classList.add('shrink');
                    } else {
                        header.classList.remove('shrink');
                    }
                }
                lastScrollY = window.scrollY;
            });

            // Управление мобильным меню
            const burgerButton = document.querySelector('.mobile-burger__button');
            const mobileMenu = document.querySelector('.mobile-menu');
            const closeButton = document.querySelector('.mobile-menu__close');

            if (burgerButton && mobileMenu && closeButton) {
                burgerButton.addEventListener('click', function() {
                    mobileMenu.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });

                closeButton.addEventListener('click', function() {
                    mobileMenu.classList.remove('active');
                    document.body.style.overflow = '';
                });

                // Закрытие меню при клике на ссылку
                const menuLinks = mobileMenu.querySelectorAll('.mobile-menu__nav-link');
                menuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                });
            }
        });
    </script>
</head>

<body <?php body_class(); ?>>

    <div class="page-wrapper">
        <header class="page-header">
            <!-- Верхняя панель -->
            <div class="page-header-bottom" data-uk-sticky>
                <div class="page-header-bottom__container">
                    <!-- Логотип -->
                    <div class="logo">
                        <a class="logo__link" href="<?php echo home_url(); ?>">
                            <?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            if ($logo) {
                                echo '<img class="logo__img" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                            } else {
                                echo '<div class="logo__text">' . get_bloginfo('name') . '</div>';
                            }
                            ?>
                        </a>
                    </div>

                    <!-- Адрес - скрыт на мобильных -->
                    <div class="support support-address">
                        <a class="support__link" href="#">
                            <div class="support__icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="support__desc">
                                <div class="support__label">Адрес</div>
                                <div class="support__label"><b><?php echo carbon_get_theme_option('address'); ?></b></div>
                            </div>
                        </a>
                    </div>

                    <!-- Время работы - скрыт на мобильных -->
                    <div class="support support-time">
                        <a class="support__link" href="#">
                            <div class="support__icon"><i class="fas fa-clock"></i></div>
                            <div class="support__desc">
                                <div class="support__label">Время работы</div>
                                <div class="support__label"><b><?php echo carbon_get_theme_option('worktime'); ?></b></div>
                            </div>
                        </a>
                    </div>

                    <!-- Телефон - переработан для мобильных -->
                    <div class="support support-phone">
                        <a class="support__link" href="tel:<?php echo preg_replace('/[^0-9+]/', '', carbon_get_theme_option('phone1')); ?>">
                            <div class="support__icon"><i class="fas fa-headset"></i></div>
                            <div class="support__desc">
                                <div class="support__label">Телефон</div>
                                <div class="support__label"><b><?php echo carbon_get_theme_option('phone1'); ?></b></div>
                            </div>
                        </a>
                    </div>

                    <!-- Кнопка -->
                    <div class="support support-button">
                        <a class="uk-button uk-button-large uk-button-primary order-btn" href="#">
                            <span>Узнать цену</span>
                        </a>
                    </div>

                    <!-- Мобильный телефон -->
                    <div class="mobile-phone">
                        <a class="mobile-phone__link" href="tel:<?php echo preg_replace('/[^0-9+]/', '', carbon_get_theme_option('phone1')); ?>">
                            <?php echo carbon_get_theme_option('phone1'); ?>
                        </a>
                    </div>

                    <!-- Мобильная кнопка -->
                    <div class="mobile-button">
                        <a class="mobile-button__link order-btn" href="#">
                            Узнать цену
                        </a>
                    </div>

                    <!-- Мобильный бургер -->
                    <div class="mobile-burger">
                        <button class="mobile-burger__button" type="button">
                            <span class="mobile-burger__icon"></span>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Меню - скрыто на мобильных -->
            <div class="page-header-top">
                <div class="uk-container uk-flex uk-flex-middle uk-flex-between">
                    <!-- Десктоп-меню -->
                    <nav class="uk-navbar-container uk-navbar-transparent uk-visible@m" data-uk-navbar>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class' => 'uk-navbar-nav',
                            'container' => false,
                            'fallback_cb' => false
                        ));
                        ?>
                    </nav>

                    <div class="infa">
                        <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', carbon_get_theme_option('phone1')); ?>">
                            <?php echo carbon_get_theme_option('phone1'); ?>
                        </a>
                        <br>
                        <b><?php echo carbon_get_theme_option('address'); ?></b>
                    </div>
                </div>
            </div>
        </header>

        <!-- Offcanvas мобильное меню -->
        <div id="offcanvas-mobile" data-uk-offcanvas="overlay: true; flip: true">
            <div class="uk-offcanvas-bar">
                <button class="uk-offcanvas-close" type="button" data-uk-close></button>

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'uk-nav uk-nav-default uk-nav-parent-icon',
                    'container' => false,
                    'fallback_cb' => false
                ));
                ?>

                <div class="uk-margin">
                    <a class="uk-button uk-button-primary uk-width-1-1 order-btn" href="#">Узнать цену</a>
                </div>
            </div>
        </div>

        <!-- Мобильное меню -->
        <div class="mobile-menu">
            <div class="mobile-menu__header">
                <button class="mobile-menu__close" type="button">×</button>
            </div>
            <div class="mobile-menu__content">
                <nav class="mobile-menu__nav">
                    <?php
                    // Простой вывод меню без walker'ов
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'mobile-menu__nav-list',
                        'container' => false,
                        'fallback_cb' => false,
                        'items_wrap' => '<div class="mobile-menu__nav-items">%3$s</div>'
                    ));
                    ?>
                </nav>
                <a class="mobile-menu__button order-btn" href="#">Узнать цену</a>
            </div>
        </div>