<?php get_header() ?>

<?php while (have_posts()) : the_post() ?>
    <section class="container-full lh__top-banner lh__property-single-banner has-padding grid">
        <div class="lh__single-post-infos">
            <ul>
            </ul>
            <h1 class="lh__page-title">
                <?php the_title() ?> - <?= the_field('surface') ?>m²
            </h1>
            <div class="lh__property-meta">
                <div class="place"><?= agency_city(get_post()) ?></div>
                <div class="price">
                    <?php if (get_field('property_category') === 'rent'): ?>
                        <span> <?= sprintf('%s $/mo', get_field('price')) ?> </span>
                    <?php else : ?>
                        <span> <?= sprintf('%s $', get_field('price')) ?> </span>
                    <?php endif ?>
                </div>
            </div>
            <div class="flex lh__post-actions">
                <a href="" class="btn-sm btn-primary text-center btn-border-primary outlined"><?= __('Contact agency', 'magency') ?></a>
                <a href="" class="btn-sm btn-primary text-center btn-border-primary outlined"><?= __('Call', 'magency') ?></a>
            </div>
        </div>
        <div class="lh__single-post-image">
            <figure class="lh__property-figure">

                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?= the_post_thumbnail_url() ?>" class="lh__property-picture-link" target="_blank">
                        <?php the_post_thumbnail() ?>
                    </a>
                <?php else : ?>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mM8+x8AAp8BznoPXvoAAAAASUVORK5CYII=">
                <?php endif ?>
            </figure>
            <div>
                <div class="lh__single-post-image-carousel js-slider">
                    <?php foreach (get_attached_media('image', get_post()) as $image): ?>
                        <!-- <a href="<?php //echo wp_get_attachment_url($image->ID) 
                                        ?>">
                            <img class="bien__photo" src="<?php // echo wp_get_attachment_image_url($image->ID, 'property-carousel'); 
                                                            ?>" alt="">
                        </a> -->
                        <picture class="lh__property-picture-carousel">
                            <img src="<?= wp_get_attachment_image_url($image->ID, 'property-carousel'); ?>" alt="">
                        </picture>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <section class="container-full  has-padding">
        <div class="lh__property-single-content">
            <div class="lh__property-decription">
                <?php the_content() ?>
                <div class="lh__property-features flex-center">
                    <div class="feature">
                        <img src="<?= get_template_directory_uri() ?>/assets/imgs/surface.svg" alt="">
                        <?= __('Surface', 'magency') ?> : <?php the_field('surface') ?>m²
                    </div>
                    <div class="feature">
                        <img src="<?= get_template_directory_uri() ?>/assets/imgs/floor.svg" alt="">
                        <?= __('Floor', 'magency') ?> : <?php the_field('floor') ?>
                    </div>
                    <div class="feature">
                        <img src="<?= get_template_directory_uri() ?>/assets/imgs/room.svg" alt="">
                        <?= __('Room', 'magency') ?> : <?php the_field('room') ?>
                    </div>
                    <?php $options = get_the_terms(get_post(), 'property_option') ?>
                    <?php if ($options) : ?>

                        <?php foreach ($options as $option) : ?>
                            <div class="feature">
                                <img src="<?= the_field('icon', $option) ?>" alt="<?= $option->name ?>">
                                <?= __($option->name, 'magency') ?>
                            </div>
                        <?php endforeach; ?>

                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer() ?>