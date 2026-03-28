<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?> >
    <header class="container-full header" style="background-color: <?= get_theme_mod('header_color'); ?>;">
        <div class="lh__navbar container flex-space-between">
            <!-- <div class="lh__logo">
                <a href="#" class="lh__logo-link">
                    <img src="./assets/imgs/Logo.svg" alt="Larana Hotel Logo">
                </a>
            </div> -->
            <div class="lh__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="lh__logo-link" title="<?= __('Homepage', 'magency'); ?>">
                    <img src="<?= get_theme_mod('logo'); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?> - Logo">
                </a>
            </div>

            <nav class="lh__navbar-menu">
                <?php wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'container' => false,
                    'menu_class' => 'lh__nav-links flex-end'
                ]); ?>
            </nav>
            <?= get_search_form() ?>
        </div>
    </header>