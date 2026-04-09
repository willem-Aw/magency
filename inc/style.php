<?php

defined('ABSPATH') or die('Nothing to see here.');

/**
 * Add the current_page_parent class to the menu item if we are on a single property single page. This will allow us to style the menu item as active when we are on a property single page.
 */
add_filter('nav_menu_css_class', function (array $classes, WP_Post $item): array {

    if (is_singular('property') || is_post_type_archive('property')) {
        $classes = array_filter($classes, function (string $class) {
            if ($class !== 'current_page_parent') {
                return $class;
            }
        });
    }

    if (is_singular('property')) {
        $property = get_queried_object();
        $category = get_field('property_category', $property);
        if ($category === 'rent') {
            $condition  = agency_is_rent_url($item->url);
        } else {
            $condition  = agency_is_sale_url($item->url);
        }

        if ($condition) {
            $classes[] =  'current_page_parent';
        }
    }

    return $classes;
}, 10, 2);
