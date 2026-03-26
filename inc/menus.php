<?php

add_action('after_setup_theme', function () {
    //menu support
    add_theme_support('menus');

    // register the menu
    register_nav_menu('header-menu', __('Header Menu', 'magency'));
    register_nav_menu('footer-menu', __('Footer Menu', 'magency'));

});