<?php

remove_action('wp_head', 'wp_generator');

add_action('wp_enqueue_scripts', 'site_scripts');
function site_scripts()
{
    $version = '0.0.0.0';

    wp_dequeue_style('wp-block-library');
    wp_deregister_script('wp-embed');

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:900%7CRoboto:300&display=swap&subset=cyrillic', array(), $version);
    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), $version);
    wp_enqueue_script('focus-visible', 'https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js', array(), $version, true);
    wp_enqueue_script('lazyload-load', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js', array(), $version, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true);

    wp_localize_script('main-js', 'WPJS', [
        'siteURL' => get_template_directory_uri(),
    ]);
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields()
{
    require_once 'includes/carbon-fields-options/theme-options.php';
}

add_action('init', 'create_global_variable');
function create_global_variable() {
    global $pizza_time;
    $pizza_time = [
        'phone' => carbon_get_theme_option( 'site_phone' ),
        'phone_digits' => carbon_get_theme_option( 'site_phone_digits' ),
        'address' => carbon_get_theme_option( 'site_address' ),
        'map_coordinates' => carbon_get_theme_option( 'site_map_coordinates' ),
        'vk_url' => carbon_get_theme_option( 'site_vk_url' ),
        'fb_url' => carbon_get_theme_option( 'site_fb_url' ),
        'inst_url' => carbon_get_theme_option( 'site_inst_url' ),
    ];
}

add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
    register_nav_menu( 'menu_main_header', 'Меню в шапке' );
}