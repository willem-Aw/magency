<footer class="container-full footer">
    <div class="lh__footer flex-column-center">
        <?php if (is_active_sidebar('inline-socials')) : ?>
                <?php dynamic_sidebar('inline-socials'); ?>
        <?php endif; ?>
        <div class="lh__footer-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="lh__logo-link" title="<?= __('Homepage', 'magency'); ?>">
                <img src="<?= get_theme_mod('logo'); ?>"
                    alt="<?php echo esc_attr(get_bloginfo('name')); ?> - Logo">
            </a>
        </div>
        <p>
            Copyright &copy; <span class="current-year"><?= date("Y") ?></span>
        </p>
        <nav class="lh__footer-navbar">
            <?php wp_nav_menu([
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'lh__footer-nav-links flex-center'
            ]); ?>
        </nav>
        <div class="lh__footer-hour">
            <?php $agency_hour = get_option('agency_hour', ''); ?>
            <?php if ($agency_hour) : ?>
                <p>Working hours: <br /> <?php echo esc_html($agency_hour); ?></p>
            <?php endif; ?>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>