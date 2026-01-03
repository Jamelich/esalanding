<?php
// Получаем только нужные данные для футера
$phone1 = carbon_get_theme_option('phone1');
$address = carbon_get_theme_option('address');
$email = carbon_get_theme_option('email');
$worktime = carbon_get_theme_option('worktime');
$manager_photo = carbon_get_theme_option('manager_photo');
$manager_name = carbon_get_theme_option('manager_name');
$manager_job_title = carbon_get_theme_option('manager_job_title');
$manager_phone = carbon_get_theme_option('manager_phone');
$vk_link = carbon_get_theme_option('vk_link');
$tg_link = carbon_get_theme_option('tg_link');
$wa_link = carbon_get_theme_option('wa_link');

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

// Получаем URL фонового изображения
$footer_bg_url = get_template_directory_uri() . '/assets/img/footer_bg1.jpg';

// Форматируем телефоны
$phone_display1 = format_footer_phone($phone1);
$phone_link1 = $phone1 ? preg_replace('/[^0-9]/', '', $phone1) : '';
$manager_phone_link = $manager_phone ? preg_replace('/[^0-9]/', '', $manager_phone) : '';
$manager_phone_display = format_footer_phone($manager_phone);
?>

<footer class="page-footer" id="contacts" style="background: url('<?php echo esc_url($footer_bg_url); ?>') no-repeat center center; background-size: cover;">
    <div class="page-footer-overlay"></div>
    <div class="uk-container uk-container-large">
        <div class="page-footer-middle uk-margin-top">
            <div class="uk-grid uk-child-width-1-4@l uk-child-width-1-2@s" data-uk-grid>
                <div class="uk-flex-first@l">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logow.png'); ?>" alt="<?php bloginfo('name'); ?>">
                    <p><?php echo esc_html__('Аренда спецтехники по всему Крыму для строительства и земляных работ. Быстрая подача от 45 минут. Полный пакет документов: договор, счёт, акты выполненных работ. Работаем с юрлицами, ИП и физлицами. Любая форма оплаты, включая безналичный расчёт.', 'alfaspectrans'); ?></p>

                    <a href="https://priliv.pro" style="color:white;">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/priliv.png'); ?>" style="height: 70px;" alt="Priliv Pro">
                        <?php echo esc_html__('Заказать сайт в Ялте', 'alfaspectrans'); ?>
                    </a>

                    <br>
                    <ul class="social-list">
                        <?php if ($vk_link): ?>
                            <li class="social-list__item">
                                <a class="social-list__link" href="<?php echo esc_url($vk_link); ?>" target="_blank" rel="noopener">
                                    <i class="fab fa-vk"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($tg_link): ?>
                            <li class="social-list__item">
                                <a class="social-list__link" href="<?php echo esc_url($tg_link); ?>" target="_blank" rel="noopener">
                                    <i class="fab fa-telegram"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($wa_link): ?>
                            <li class="social-list__item">
                                <a class="social-list__link" href="<?php echo esc_url($wa_link); ?>" target="_blank" rel="noopener">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="uk-flex-last@l">
                    <?php if ($manager_photo): ?>
                        <img src="<?php echo esc_url($manager_photo); ?>" alt="<?php echo esc_attr($manager_name ?: 'Менеджер'); ?>">
                    <?php else: ?>
                        <img class="footer-manager-photo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/man.png'); ?>" alt="<?php echo esc_attr__('Менеджер', 'alfaspectrans'); ?>">
                    <?php endif; ?>

                    <!-- Кнопка заказать звонок -->
                    <button class="uk-button order-btn">Заказать звонок</button>


                    <?php if ($manager_name): ?>
                        <li class="contacts-list-item">
                            <div class="contacts-list-item__icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="contacts-list-item__desc">
                                <div class="contacts-list-item__content">
                                    <strong><?php echo esc_html($manager_name); ?></strong>
                                    <?php if ($manager_job_title): ?>
                                        <br>
                                        <span style="color: #ccc; font-size: 0.9em;"><?php echo esc_html($manager_job_title); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>

                    <ul class="contacts-list">
                        <?php if ($address): ?>
                            <li class="contacts-list-item">
                                <div class="contacts-list-item__icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contacts-list-item__desc">
                                    <div class="contacts-list-item__content">
                                        <?php echo nl2br(esc_html($address)); ?>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($phone1): ?>
                            <li class="contacts-list-item">
                                <div class="contacts-list-item__icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div class="contacts-list-item__desc">
                                    <div class="contacts-list-item__content">
                                        <a href="tel:<?php echo esc_attr($phone_link1); ?>">
                                            <?php echo esc_html($phone_display1); ?>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($worktime): ?>
                            <li class="contacts-list-item">
                                <div class="contacts-list-item__icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="contacts-list-item__desc">
                                    <div class="contacts-list-item__content">
                                        <?php echo $worktime; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($email): ?>
                            <li class="contacts-list-item">
                                <div class="contacts-list-item__icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contacts-list-item__desc">
                                    <div class="contacts-list-item__content">
                                        <a href="mailto:<?php echo esc_attr($email); ?>">
                                            <?php echo esc_html($email); ?>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>


                    </ul>
                </div>

                <div>
                    <div class="title"><?php echo esc_html__('Меню', 'alfaspectrans'); ?></div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-1',
                        'menu_class' => 'uk-nav uk-list-disc',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>

                <div>
                    <div class="title"><?php echo esc_html__('Полезное', 'alfaspectrans'); ?></div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-2',
                        'menu_class' => 'uk-nav uk-list-disc',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="page-footer-bottom">
            <span>&copy; <?php echo date('Y'); ?> «<?php bloginfo('name'); ?>». <?php echo esc_html__('Все права защищены.', 'alfaspectrans'); ?></span>
            <p>Данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями статьи 437 (2) Гражданского кодекса Российской Федерации. Все права защищены.</p>

            <div class="wrapper_pd">
                <a href="politika-obrabotki-personalnyh-dannyh/" class="personal_data">Политика обработки персональных данных</a>
                <a href="soglasie-na-obrabotku-personalnyh-dannyh/" class="personal_data">Согласие на обработку персональных данных</a>
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
            <?php echo do_shortcode('[contact-form-7 id="f157827" title="Заказать звонок"]'); ?>
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

        // Обработчики для ВСЕХ кнопок с классом order-btn
        document.querySelectorAll('.order-btn').forEach(button => {
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