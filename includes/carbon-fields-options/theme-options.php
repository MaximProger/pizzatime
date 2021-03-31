<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', __('Настройки сайта'))
    ->add_tab('Общие настройки', array(
        Field::make('image', 'site_logo', 'Логотип'),
    ))
    ->add_tab('Контакты', array(
        Field::make('text', 'site_phone', 'Телефон'),
        Field::make('text', 'site_phone_digits', 'Телефон без пробелов в формате +79999999999'),
        Field::make('text', 'site_address', 'Адрес'),
        Field::make('text', 'site_map_coordinates', 'Координаты карты'),
        Field::make('text', 'site_vk_url', 'Вконтакте'),
        Field::make('text', 'site_fb_url', 'Facebook'),
        Field::make('text', 'site_inst_url', 'Instagram'),
    ));