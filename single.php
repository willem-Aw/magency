<?php get_header() ?>

<?php while (have_posts()) : the_post() ?>
    <section class="container-full lh__top-banner lh__blog-single-banner has-padding">
        <div class="lh__single-post-image">
            <figure>

                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail() ?>
                <?php else : ?>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mM8+x8AAp8BznoPXvoAAAAASUVORK5CYII=">
                <?php endif ?>
            </figure>
        </div>
        <div class="lh__single-post-infos">
            <ul>
                <?php
                $categories = get_the_category();
                if (!empty($categories)):
                ?>
                    <li>
                        <a href="<?= get_term_link($categories[0]) ?> ?>"><?= $categories[0]->name ?></a>
                    </li>
                <?php endif; ?>
            </ul>
            <p class="lh_blog-date"><?= sprintf(__('Published on %s', 'magency'), get_the_date()) ?></p>
            <h1 class="lh__page-title">
                <?php the_title() ?>
            </h1>
        </div>
    </section>
    <section class="container-full  has-padding room-type">
        <div class="lh__listing-product lh__room-type grid">
            <div>
                <div>
                    <?php if (is_active_sidebar('blog-sidebar')) : ?>
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="lh__room-type-cards lh__single-post-content">
                <?php the_content() ?>
                <div class="lh__comments-wrapper">
                    <?php if (comments_open() || get_comments_number() > 0) : ?>
                        <?php comments_template() ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer() ?>