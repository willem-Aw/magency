<?php
defined('ABSPATH') || die('No direct access allowed!');


add_action('after_setup_theme', function () {

    // make title of the page dynamic
    add_theme_support('title-tag');

    // add support for featured image
    add_theme_support('post-thumbnails');

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // add_theme_support( 'custom-logo' );
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        // 'header-text' => array( 'site-title', 'site-description' ),
    ));

    // add custom image size
    add_image_size('card-thumb', 400, 280, true); // Hard crop mode
    add_image_size('blog-thumb', 800, 320, true); // Hard crop mode
});

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});
