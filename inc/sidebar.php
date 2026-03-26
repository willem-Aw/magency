<?php

require_once('widgets/social.php');

add_action('widgets_init', function() {
    register_widget(Magency_Social_Widget::class);
    register_sidebar([
        'id' => 'inline-socials',
        'name' => __('Inline Socials', 'magency'),
        'before_title' => '<div class="lh__socials-title">',
        'after_title' => '</div>',
        'before_widget' => '<div class="lh__social-link-wrapper">',
        'after_widget' =>'</div>' 
    ]);

    register_sidebar([
        'id' => 'blog-sidebar',
        'name' => __('Blog sidebar', 'magency'),
        'before_title' => '<h2 class="lh__blog-sidebar-title">',
        'after_title' => '</h2>',
        'before_widget' => '<div class="lh__blog-sidebar">',
        'after_widget' =>'</div>' 
    ]);
});