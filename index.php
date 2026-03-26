<?php get_header() ?>

<?php if (have_posts()): ?>
    <section class="container-full lh__top-banner has-padding">
        <h1 class="lh__page-title">
            <?php if (is_category()) : ?>
                <?php single_cat_title() ?>
            <?php elseif (is_search()): ?>
                <?= sprintf(__('Search results for "%s"', 'magency'), get_search_query()) ?>
            <?php else: ?>
                <?php single_post_title() ?>
            <?php endif; ?>
        </h1>
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
            <div class="lh__room-type-cards">
                <ul class="grid prd-listing lh__headline lh__room-type-cards grid">

                    <?php while (have_posts()): the_post() ?>

                        <li class="item lh__room-type-card">
                            <?php get_template_part('parts/blog-card'); ?>
                        </li>


                    <?php endwhile; ?>

                </ul>
                <div class="flex-center pagination-wrapper">
                    <?= paginate_links(); ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2><?php __('No posts found', 'magency') ?></h2>
<?php endif; ?>

<?php get_footer() ?>