<?php

use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action('carbon_fields_register_fields', 'wpprog_theme_options');
function wpprog_theme_options()
{
    // страница опций
    Container::make('theme_options', __('Опции темы'))
        ->set_icon('dashicons-admin-generic')
    
        ->add_tab(__('Уникальное торговое предложение (баннер)'), array(
            Field::make('image', 'utp_banner_slide_pc', 'Баннер для ПК версии')->set_value_type('url')->set_width(50),
            Field::make('image', 'utp_banner_slide_mob', 'Баннер для моб версии')->set_value_type('url')->set_width(50),
        ))

        ->add_tab(__('Блок раскрытия информации'), array(
            Field::make('rich_text', 'reneval_text', 'Текст блока')->set_width(80),
            Field::make('media_gallery', 'reneval_gallery', 'Фото блока для слайдера')->set_type(['image'])
        ))
        ->add_tab(__('Блок суперпредложения'), array(
            Field::make('image', 'super_offer_photo', __('Фото'))->set_value_type('url')->set_width(25),
            Field::make('text', 'super_offer_name', __('Название'))->set_width(25),
            Field::make('text', 'super_offer_subheader', __('Подзаголовок'))->set_width(45),
            Field::make('rich_text', 'super_offer_desc', __('Описание')),
        ))
        ->add_tab(__('Галерея автопарка'), array(
            Field::make('media_gallery', 'gallery_autopark', 'Галерея автопарка')
                ->set_type(['image']),
        ))
        ->add_tab(__('Дополнительные услуги'), array(
            Field::make('image', 'adv_service_photo', __('Фото'))->set_value_type('url')->set_width(25),
            Field::make('text', 'adv_service_name', __('Название'))->set_width(25),
            Field::make('rich_text', 'adv_service_desc', __('Описание')),
        ))
        ->add_tab(__('Довольные клиенты'), array(
            Field::make('complex', 'clients', __('Довольные клиенты'))
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('image', 'clients_photo', __('Фото'))->set_value_type('url')->set_width(25),
                    Field::make('text', 'clients_name', __('Имя'))->set_width(25),
                    Field::make('text', 'clients_subheader', __('Подзаголовок'))->set_width(45),
                ))
        ))

        ->add_tab(__('Видеоотзывы'), array(
            Field::make('complex', 'video_reviews', __('Видеоотзывы'))
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('file', 'video_reviews_file', 'Видео файл')->set_type(array('video'))->set_value_type('url'),
                    Field::make('image', 'video_reviews_poster', 'Фото-заглушка')->set_value_type('url')
                ))
        ))

        ->add_tab(__('Блок акции'), array(
            Field::make('complex', 'company_promo', __('Акции'))
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('image', 'company_promo_photo', __('Фото'))->set_value_type('url')->set_width(25),
                    Field::make('text', 'company_promo_title', __('Название'))->set_width(75),
                    Field::make('rich_text', 'company_promo_desc', __('Описание')),
                ))
        ))

        // ->add_tab(__('Блок социальное доказательство'), array(
        //     Field::make('media_gallery', 'soc_gallery', 'Фото блока для слайдера')->set_type(['image'])
        // ))

        ->add_tab(__('Блок FAQ'), array(
            Field::make('complex', 'faq_items', __('Вопросы и ответы'))
                ->add_fields(array(
                    Field::make('text', 'question', __('Вопрос'))
                        ->set_required(true),
                    Field::make('rich_text', 'answer', __('Ответ'))
                        ->set_required(true),
                ))
                ->set_layout('tabbed-horizontal')
        ))

        ->add_tab(__('Контакты'), array(
            Field::make('text', 'phone1', __('Номер телефона 1'))->set_width(50),
            Field::make('text', 'phone2', __('Номер телефона 2'))->set_width(50),
            Field::make('text', 'address', __('Адрес'))->set_width(33),
            Field::make('text', 'email', __('Почта'))->set_width(33),
            Field::make('text', 'worktime', __('Время работы'))->set_width(33),
            Field::make('text', 'vk_link', __('Ссылка на ВК'))->set_width(33),
            Field::make('text', 'tg_link', __('Ссылка на Telegram'))->set_width(33),
            Field::make('text', 'max_link', __('Ссылка на Max'))->set_width(33),
            Field::make('rich_text', 'rekv', __('Реквизиты'))->set_width(50),
            Field::make('rich_text', 'code_map', __('Код карты'))->set_width(50),
            Field::make('image', 'manager_photo', 'Фото менеджера')->set_value_type('url')->set_width(10),
            Field::make('image', 'bg_manager_photo', 'Фоновое фото')->set_value_type('url')->set_width(10),
            Field::make('rich_text', 'slogan', __('Девиз компании (слоган)'))->set_width(50),
            Field::make('text', 'manager_phone', 'Телефон менеджера')->set_width(33),
            Field::make('text', 'manager_name', 'Имя менеджера')->set_width(33),
            Field::make('text', 'manager_job_title', 'Должность')->set_width(33),
            Field::make('text', 'yandex_maps_api_key', __('API ключ Яндекс Карт'))->set_help_text('Получите ключ на https://developer.tech.yandex.ru/'),
        ))

    ;


    // Container::make('post_meta', 'Настройки главной страницы')
    //     ->where('post_id', '=', get_option('page_on_front'))
    //     ->or_where('post_type', '=', 'home_page')
    //     ->add_tab('Основные настройки', [
    //         Field::make('rich_text', 'service_text', 'Текст перед услугами'),
    //     ])
    //     ->add_tab('Настройки оффера', [
    //         Field::make('image', 'offer_right_image', 'Картинка оффера')->set_value_type('url'),
    //         Field::make('rich_text', 'offer_left_text', 'Текст оффера'),
    //     ])
    //     ->add_tab('Карта', [
    //         Field::make('rich_text', 'code_map', 'Код карты'),
    //     ])
    //     ->add_tab(__('Партнеры'), array(
    //         Field::make('complex', 'partners_logo', __('Логотипы партнеров'))
    //             ->add_fields(array(
    //                 Field::make('image', 'partners_logo_image', __('Логотип'))->set_value_type('url'),
    //             ))
    //     ))
    //     // ->add_tab(__('Фотогалерея'), array(
    //     //     Field::make('media_gallery', 'crb_gallery', 'Фотогалерея')
    //     //         ->set_type(['image']),
    //     // ))

    // ;

    /*
    Container::make('post_meta', 'Общие работы')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job1', 'Заголовок'),
            Field::make('complex', 'work1', __('Общие работы'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work1', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work1', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work1', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work1', 'Время работы')
                        ->set_width(50),
                ))
        ]);

    Container::make('post_meta', 'Детейлинг')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job2', 'Заголовок'),
            Field::make('complex', 'work2', __('Детейлинг (пакеты услуг)'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work2', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work2', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work2', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work2', 'Время работы')
                        ->set_width(50),
                ))
        ]);

    Container::make('post_meta', 'Ручная мойка')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job3', 'Заголовок'),
            Field::make('complex', 'work3', __('Ручная мойка'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work3', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work3', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work3', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work3', 'Время работы')
                        ->set_width(50),
                ))
        ]);

    Container::make('post_meta', 'Чистка салона')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job4', 'Заголовок'),
            Field::make('complex', 'work4', __('Чистка салона'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work4', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work4', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work4', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work4', 'Время работы')
                        ->set_width(50),
                ))
        ]);

    Container::make('post_meta', 'Полировка автомобиля')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job5', 'Заголовок'),
            Field::make('complex', 'work5', __('Полировка автомобиля'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work5', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work5', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work5', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work5', 'Время работы')
                        ->set_width(50),
                ))
        ]);

    Container::make('post_meta', 'Защита кузова')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job6', 'Заголовок'),
            Field::make('complex', 'work6', __('Защита кузова'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work6', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work6', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work6', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work6', 'Время работы')
                        ->set_width(50),
                ))
        ]);

    Container::make('post_meta', 'Реставрационные работы')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job7', 'Заголовок'),
            Field::make('complex', 'work7', __('Реставрационные работы'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work7', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work7', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work7', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work7', 'Время работы')
                        ->set_width(50),
                ))
        ]);

    Container::make('post_meta', 'Другие работы')
        ->where('post_type', '=', 'page')
        ->where('post_id', 'IN', [53, 186])  // Аналог SQL WHERE post_id IN (55, 188)
        ->add_fields([
            Field::make('text', 'header_job8', 'Заголовок'),
            Field::make('complex', 'work8', __('Другие работы'))
                ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
                ->add_fields(array(
                    Field::make('text', 'title_work8', 'Название работы')
                        ->set_width(50),
                    Field::make('text', 'desc_work8', 'Описание работы')
                        ->set_width(50),
                    Field::make('text', 'price_work8', 'Цена работы')
                        ->set_width(50),
                    Field::make('text', 'time_work8', 'Время работы')
                        ->set_width(50),
                ))
        ]);
*/

    // Container::make('post_meta', 'FAQ')
    //     ->where('post_type', '=', 'page')
    //     ->where('post_id', 'IN', [55, 188])  // Аналог SQL WHERE post_id IN (55, 188)
    //     ->add_fields([
    //         Field::make('complex', 'faq_accordion', __('Вопрос-ответ (FAQ)'))
    //             ->set_layout('tabbed-horizontal') // или 'tabbed-vertical'
    //             ->add_fields(array(
    //                 Field::make('text', 'question', __('Вопрос'))
    //                     ->set_width(50)
    //                     ->set_required(true),
    //                 Field::make('rich_text', 'answer', __('Ответ'))
    //                     ->set_width(50)
    //                     ->set_required(true),
    //             ))
    //     ]);

    // Container::make('post_meta', 'Фотогалерея')
    //     ->where('post_type', '=', 'page')
    //     ->where('post_id', 'IN', [68, 213])  // Аналог SQL WHERE post_id IN (55, 188)
    //     ->add_fields([
    //         Field::make('media_gallery', 'crb_gallery', 'Фотогалерея')
    //             ->set_type(['image']),
    //         // Field::make('html', 'crb_clear_gallery_btn')
    //         //     ->set_html('<button type="button" class="button js-clear-carbon-gallery" style="margin-top:10px;background:#dc3232;color:white;border-color:#a00;">Очистить галерею</button>')
    //     ]);

    // Container::make('post_meta', 'Настройки услуги')
    //     ->where('post_type', '=', 'post') // Стандартный тип записи
    //     ->where('post_term', '=', [
    //         'field' => 'slug',
    //         'value' => 'uslugi', // Slug категории
    //         'taxonomy' => 'category',
    //     ])
    //     ->add_fields([
    //         Field::make('text', 'service_price', 'Цена'),
    //     ]);
}

// Удаление автоматических <br> и <p> в Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');
