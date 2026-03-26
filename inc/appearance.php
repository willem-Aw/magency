<?php

/* Register customizer settings and controls. Accessible through the WordPress Customizer (Appearance->Customize). */

add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
    $wp_customize->add_section('magency_appearance', [
        'title' => __('Theme Appearance', 'magency'),
    ]);

    $wp_customize->add_setting('logo', [
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
        'label' => __('Logo', 'magency'),
        'section' => 'magency_appearance',
        'settings' => 'logo',
    )));
});
