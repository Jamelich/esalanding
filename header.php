<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <!-- Подключение стилей шапки -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/header.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Шапка сайта -->
    <header class="site-header">
        <!-- Верхняя часть шапки с основной информацией -->
        <div class="header-top">
            <div class="container">
                <div class="header-top__content">
                    <!-- Логотип -->
                    <div class="header-logo">
                        <?php if (has_custom_logo()): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                                <?php bloginfo('name'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Слоган -->
                    <?php if ($slogan = carbon_get_theme_option('slogan')): ?>
                        <div class="header-slogan">
                            <span class="slogan-text"><?php echo esc_html($slogan); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Адрес -->
                    <?php if ($address = carbon_get_theme_option('address')): ?>
                        <div class="header-address">
                            <div class="address-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                                </svg>
                            </div>
                            <div class="address-text"><?php echo esc_html($address); ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- График работы -->
                    <?php if ($worktime = carbon_get_theme_option('worktime')): ?>
                        <div class="header-worktime">
                            <div class="worktime-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path>
                                </svg>
                            </div>
                            <div class="worktime-text"><?php echo esc_html($worktime); ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Контакты (почта и телефоны) -->
                    <div class="header-contacts">
                        <?php if ($email = carbon_get_theme_option('email')): ?>
                            <div class="contact-item email">
                                <div class="contact-icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path>
                                    </svg>
                                </div>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-text"><?php echo esc_html($email); ?></a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="contact-phones">
                            <?php if ($phone1 = carbon_get_theme_option('phone1')): ?>
                                <div class="phone-item">
                                    <div class="phone-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path>
                                        </svg>
                                    </div>
                                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone1)); ?>" class="phone-link">
                                        <?php echo esc_html($phone1); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($phone2 = carbon_get_theme_option('phone2')): ?>
                                <div class="phone-item">
                                    <div class="phone-icon">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path>
                                        </svg>
                                    </div>
                                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone2)); ?>" class="phone-link">
                                        <?php echo esc_html($phone2); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Мессенджеры -->
                    <div class="header-messengers">
                        <?php if ($tg_link = carbon_get_theme_option('tg_link')): ?>
                            <a href="<?php echo esc_url($tg_link); ?>" class="messenger-link tg-link" target="_blank" title="Telegram">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.509l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.05 5.56-5.022c.241-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.652-.64.136-.954l11.566-4.458c.538-.196 1.006.128.832.941z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($vk_link = carbon_get_theme_option('vk_link')): ?>
                            <a href="<?php echo esc_url($vk_link); ?>" class="messenger-link vk-link" target="_blank" title="ВКонтакте">
                                <svg width="22" height="22" viewBox="0 0 448 512" fill="currentColor">
                                    <path d="M31.4907 63.4907C0 94.9813 0 145.671 0 247.04V264.96C0 366.329 0 417.019 31.4907 448.509C62.9813 480 113.671 480 215.04 480H232.96C334.329 480 385.019 480 416.509 448.509C448 417.019 448 366.329 448 264.96V247.04C448 145.671 448 94.9813 416.509 63.4907C385.019 32 334.329 32 232.96 32H215.04C113.671 32 62.9813 32 31.4907 63.4907ZM75.6 168.267H126.747C128.427 253.76 166.133 289.973 196 297.44V168.267H244.16V242C273.653 238.827 304.64 205.227 315.093 168.267H363.253C359.313 187.435 351.46 205.583 340.186 221.579C328.913 237.574 314.461 251.071 297.733 261.227C316.41 270.499 332.907 283.63 346.132 299.751C359.357 315.873 369.01 334.618 374.453 354.747H321.44C316.555 337.262 306.614 321.61 292.865 309.754C279.117 297.899 262.173 290.368 244.16 288.107V354.747H238.373C136.267 354.747 78.0267 284.747 75.6 168.267Z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($max_link = carbon_get_theme_option('max_link')): ?>
                            <a href="<?php echo esc_url($max_link); ?>" class="messenger-link max-link" target="_blank" title="Max">
                                <svg width="24" height="24" viewBox="0 0 42 42" fill="currentColor">
                                    <path fill-rule="evenodd" d="M21.47 41.88c-4.11 0-6.02-.6-9.34-3-2.1 2.7-8.75 4.81-9.04 1.2 0-2.71-.6-5-1.28-7.5C1 29.5.08 26.07.08 21.1.08 9.23 9.82.3 21.36.3c11.55 0 20.6 9.37 20.6 20.91a20.6 20.6 0 0 1-20.49 20.67Zm.17-31.32c-5.62-.29-10 3.6-10.97 9.7-.8 5.05.62 11.2 1.83 11.52.58.14 2.04-1.04 2.95-1.95a10.4 10.4 0 0 0 5.08 1.81 10.7 10.7 0 0 0 11.19-9.97 10.7 10.7 0 0 0-10.08-11.1Z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Кнопка заказать звонок -->
                    <button class="callback-btn" data-modal="callback">
                        <span class="callback-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path>
                            </svg>
                        </span>
                        <span class="callback-text">Заказать звонок</span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Нижняя часть шапки с меню -->
        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom__content">
                    <!-- Основная навигация -->
                    <nav class="header-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class' => 'main-menu',
                            'container' => false,
                            'fallback_cb' => false
                        ));
                        ?>
                    </nav>
                    
                    <!-- Мобильное меню (бургер) -->
                    <div class="mobile-menu-toggle">
                        <span class="burger-line"></span>
                        <span class="burger-line"></span>
                        <span class="burger-line"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>