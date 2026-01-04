<?php

/**
 * Блок: Уникальное торговое предложение (баннер)
 * Выводит баннер с адаптивными изображениями для ПК и мобильных
 * 
 * @package Название_темы
 */

$banner_pc = carbon_get_theme_option('utp_banner_slide_pc');
$banner_mob = carbon_get_theme_option('utp_banner_slide_mob');

if (empty($banner_pc) && empty($banner_mob)) {
    return;
}

// Получаем название сайта
$site_name = get_bloginfo('name');
?>
<!-- Начало блока UTP баннера -->
<section class="utp-banner">
    <div class="utp-banner__inner">
        <?php if ($banner_pc) : ?>
            <picture>
                <?php if ($banner_mob) : ?>
                    <!-- Для экранов до 768px показываем мобильную версию -->
                    <source
                        srcset="<?php echo esc_url($banner_mob); ?>"
                        media="(max-width: 768px)">
                <?php endif; ?>
                <!-- Для экранов шире 768px и по умолчанию - ПК версия -->
                <img
                    src="<?php echo esc_url($banner_pc); ?>"
                    alt="<?php echo esc_attr($site_name); ?>"
                    class="utp-banner__img">
            </picture>
        <?php else : ?>
            <!-- Если есть только мобильная версия -->
            <img
                src="<?php echo esc_url($banner_mob); ?>"
                alt="<?php echo esc_attr($site_name); ?>"
                class="utp-banner__img">
        <?php endif; ?>
    </div>
</section>
<!-- Конец блока UTP баннера -->