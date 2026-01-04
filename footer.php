<?php
// Получаем только нужные данные для футера
$phone1 = carbon_get_theme_option('phone1');
$phone2 = carbon_get_theme_option('phone2');
$address = carbon_get_theme_option('address');
$email = carbon_get_theme_option('email');
$worktime = carbon_get_theme_option('worktime');
$vk_link = carbon_get_theme_option('vk_link');
$tg_link = carbon_get_theme_option('tg_link');
$max_link = carbon_get_theme_option('max_link');
$rekv = carbon_get_theme_option('rekv');

// Данные менеджера
$manager_photo = carbon_get_theme_option('manager_photo');
$manager_phone = carbon_get_theme_option('manager_phone');
$manager_name = carbon_get_theme_option('manager_name');
$manager_job_title = carbon_get_theme_option('manager_job_title');

// Функция для форматирования телефона
function format_footer_phone($phone)
{
    if (empty($phone)) return '';
    $clean_phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($clean_phone) === 11) {
        return '+7 (' . substr($clean_phone, 1, 3) . ') ' . substr($clean_phone, 4, 3) . '-' . substr($clean_phone, 7, 2) . '-' . substr($clean_phone, 9, 2);
    }
    return $phone;
}

// Форматируем телефоны
$phone_display1 = format_footer_phone($phone1);
$phone_display2 = format_footer_phone($phone2);
$manager_phone_display = format_footer_phone($manager_phone);
$phone_link1 = $phone1 ? preg_replace('/[^0-9]/', '', $phone1) : '';
$phone_link2 = $phone2 ? preg_replace('/[^0-9]/', '', $phone2) : '';
$manager_phone_link = $manager_phone ? preg_replace('/[^0-9]/', '', $manager_phone) : '';

// Получаем URL логотипа для футера (отдельный логотип)
$footer_logo_url = get_template_directory_uri() . '/assets/img/logo-footer.png';
?>

<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top__grid">
                <!-- Колонка 1: Логотип и описание -->
                <div class="footer-column footer-column--logo">
                    <div class="footer-logo">
                        <?php if (file_exists(get_template_directory() . '/assets/img/logo-footer.png')): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo__img">
                            </a>
                        <?php elseif (has_custom_logo()): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo__text"><?php bloginfo('name'); ?></a>
                        <?php endif; ?>
                    </div>

                    <div class="footer-description">
                        <p><?php echo esc_html__($rekv); ?></p>
                    </div>

                    <!-- Социальные сети -->
                    <div class="footer-social">
                        <?php if ($vk_link): ?>
                            <a href="<?php echo esc_url($vk_link); ?>" class="footer-social__link vk-link" target="_blank" rel="noopener" title="ВКонтакте">
                                <svg width="24" height="24" viewBox="0 0 448 512" fill="currentColor">
                                    <path d="M31.4907 63.4907C0 94.9813 0 145.671 0 247.04V264.96C0 366.329 0 417.019 31.4907 448.509C62.9813 480 113.671 480 215.04 480H232.96C334.329 480 385.019 480 416.509 448.509C448 417.019 448 366.329 448 264.96V247.04C448 145.671 448 94.9813 416.509 63.4907C385.019 32 334.329 32 232.96 32H215.04C113.671 32 62.9813 32 31.4907 63.4907ZM75.6 168.267H126.747C128.427 253.76 166.133 289.973 196 297.44V168.267H244.16V242C273.653 238.827 304.64 205.227 315.093 168.267H363.253C359.313 187.435 351.46 205.583 340.186 221.579C328.913 237.574 314.461 251.071 297.733 261.227C316.41 270.499 332.907 283.63 346.132 299.751C359.357 315.873 369.01 334.618 374.453 354.747H321.44C316.555 337.262 306.614 321.61 292.865 309.754C279.117 297.899 262.173 290.368 244.16 288.107V354.747H238.373C136.267 354.747 78.0267 284.747 75.6 168.267Z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if ($tg_link): ?>
                            <a href="<?php echo esc_url($tg_link); ?>" class="footer-social__link tg-link" target="_blank" rel="noopener" title="Telegram">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.509l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.05 5.56-5.022c.241-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.652-.64.136-.954l11.566-4.458c.538-.196 1.006.128.832.941z"></path>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if ($max_link): ?>
                            <a href="<?php echo esc_url($max_link); ?>" class="footer-social__link max-link" target="_blank" rel="noopener" title="Max">
                                <svg width="24" height="24" viewBox="0 0 42 42" fill="currentColor">
                                    <path fill-rule="evenodd" d="M21.47 41.88c-4.11 0-6.02-.6-9.34-3-2.1 2.7-8.75 4.81-9.04 1.2 0-2.71-.6-5-1.28-7.5C1 29.5.08 26.07.08 21.1.08 9.23 9.82.3 21.36.3c11.55 0 20.6 9.37 20.6 20.91a20.6 20.6 0 0 1-20.49 20.67Zm.17-31.32c-5.62-.29-10 3.6-10.97 9.7-.8 5.05.62 11.2 1.83 11.52.58.14 2.04-1.04 2.95-1.95a10.4 10.4 0 0 0 5.08 1.81 10.7 10.7 0 0 0 11.19-9.97 10.7 10.7 0 0 0-10.08-11.1Z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- Ссылка на разработчика -->
                    <div class="footer-developer">
                        <a href="https://priliv.pro">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/priliv_pro.webp" alt="Priliv Pro">
                            Заказать сайт в Ялте
                        </a>
                    </div>

                </div>

                <!-- Колонка 2: Контакты -->
                <div class="footer-column footer-column--contacts">
                    <h3 class="footer-column__title">Контакты</h3>
                    <div class="footer-contacts">
                        <?php if ($address): ?>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                                    </svg>
                                </div>
                                <div class="footer-contact-text"><?php echo nl2br(esc_html($address)); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($phone1): ?>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path>
                                    </svg>
                                </div>
                                <a href="tel:<?php echo esc_attr($phone_link1); ?>" class="footer-contact-text">
                                    <?php echo esc_html($phone_display1); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($phone2): ?>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path>
                                    </svg>
                                </div>
                                <a href="tel:<?php echo esc_attr($phone_link2); ?>" class="footer-contact-text">
                                    <?php echo esc_html($phone_display2); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($email): ?>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path>
                                    </svg>
                                </div>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="footer-contact-text">
                                    <?php echo esc_html($email); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($worktime): ?>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"></path>
                                    </svg>
                                </div>
                                <div class="footer-contact-text"><?php echo esc_html($worktime); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Колонка 3: Меню -->
                <div class="footer-column footer-column--menu">
                    <h3 class="footer-column__title">Меню</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-1',
                        'menu_class' => 'footer-menu',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>

                <!-- Колонка 4: Менеджер -->
                <div class="footer-column footer-column--manager">
                    <!-- Менеджер -->
                    <?php if ($manager_photo || $manager_name || $manager_phone || $manager_job_title): ?>
                        <div class="footer-manager">
                            <?php if ($manager_photo): ?>
                                <div class="footer-manager-photo">
                                    <img src="<?php echo esc_url($manager_photo); ?>" alt="<?php echo esc_attr($manager_name ?: 'Менеджер'); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <div class="footer-manager-info">
                                <?php if ($manager_name): ?>
                                    <div class="footer-manager-name"><?php echo esc_html($manager_name); ?></div>
                                <?php endif; ?>
                                
                                <?php if ($manager_job_title): ?>
                                    <div class="footer-manager-position"><?php echo esc_html($manager_job_title); ?></div>
                                <?php endif; ?>
                                
                                <?php if ($manager_phone): ?>
                                    <div class="footer-manager-phone">
                                        <a href="tel:<?php echo esc_attr($manager_phone_link); ?>" class="footer-contact-text">
                                            <?php echo esc_html($manager_phone_display); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Кнопка заказать звонок -->
                    <button class="footer-callback-btn callback-btn" data-modal="callback">
                        <span class="callback-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path>
                            </svg>
                        </span>
                        <span class="callback-text">Заказать звонок</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom__content">
                <div class="footer-copyright">
                    <span>&copy; <?php echo date('Y'); ?> «<?php bloginfo('name'); ?>». <?php echo esc_html__('Все права защищены.', 'alfaspectrans'); ?></span>
                    <p class="footer-disclaimer">Данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями статьи 437 (2) Гражданского кодекса Российской Федерации.</p>

                    <div class="footer-links">
                        <a href="<?php echo esc_url(home_url('/politika-obrabotki-personalnyh-dannyh/')); ?>" class="footer-link">Политика обработки персональных данных</a>
                        <a href="<?php echo esc_url(home_url('/soglasie-na-obrabotku-personalnyh-dannyh/')); ?>" class="footer-link">Согласие на обработку персональных данных</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<!-- Попап для формы -->
<div id="orderPopup" class="popup-overlay" style="display: none;">
    <div class="popup-container">
        <div class="popup-header">
            <h3>Заказать звонок</h3>
            <span class="popup-close">&times;</span>
        </div>
        <div class="popup-content">
            <?php
            // Проверяем существование формы с ID "f157827" или используем другую форму
            if (shortcode_exists('contact-form-7')) {
                echo do_shortcode('[contact-form-7 id="ea1896c" title="Заказать звонок"]');
            } else {
                echo '<p>Форма обратной связи не настроена.</p>';
            }
            ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('orderPopup');
        const closeBtn = document.querySelector('.popup-close');

        // Функция открытия попапа
        function openPopup() {
            popup.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        // Функция закрытия попапа
        function closePopup() {
            popup.style.display = 'none';
            document.body.style.overflow = '';
        }

        // Обработчики для кнопок с классом footer-callback-btn
        document.querySelectorAll('.callback-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                openPopup();
            });
        });

        // Закрытие по крестику
        closeBtn.addEventListener('click', closePopup);

        // Закрытие по клику вне попапа
        popup.addEventListener('click', function(e) {
            if (e.target === popup) {
                closePopup();
            }
        });

        // Закрытие по ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && popup.style.display === 'flex') {
                closePopup();
            }
        });

        // Закрытие после успешной отправки формы
        document.addEventListener('wpcf7mailsent', function() {
            setTimeout(closePopup, 2000);
        }, false);
    });
</script>

</body>

</html>