<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Enqueue Theme Assets
 */
function ana9a_enqueue_scripts() {

    /*
     * Main Stylesheet
     */
    wp_enqueue_style(
        'ana9a-tailwind',
        get_template_directory_uri() . '/style.css',
        [],
        '1.0.0'
    );


    /*
     * Navigation
     */
    wp_enqueue_script(
        'ana9a-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        [],
        '1.0.0',
        true
    );


    /*
     * Alpine.js
     */
    wp_enqueue_script(
        'alpinejs',
        'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js',
        [],
        '3.0.0',
        [
            'strategy' => 'defer',
        ]
    );


    /*
     * Main JS
     */
    wp_enqueue_script(
        'ana9a-main',
        get_theme_file_uri( '/assets/js/main.js' ),
        [],
        '1.0.0',
        true
    );


    /*
     * Swiper CSS
     */
    wp_enqueue_style(
        'swiper-cdn-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11.0.0'
    );


    /*
     * Swiper JS
     */
    wp_enqueue_script(
        'swiper-cdn-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11.0.0',
        true
    );


    /*
     * Custom Carousel JS
     */
    wp_enqueue_script(
        'ana9a-carousel-custom',
        get_template_directory_uri() . '/assets/js/carousel.js',
        [ 'swiper-cdn-js' ],
        '1.0.0',
        true
    );

}

add_action( 'wp_enqueue_scripts', 'ana9a_enqueue_scripts' );