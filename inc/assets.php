<?php

defined('ABSPATH') || die('No direct access allowed!');

// enqueue the style and script
add_action('wp_enqueue_scripts', function () {
    wp_register_style('theme-front-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_register_script('theme-front-script', get_template_directory_uri() . '/assets/script/script.js', [], false, array('in_footer' => true));
    wp_enqueue_style('theme-front-style');
    wp_enqueue_script('theme-front-script');
});
