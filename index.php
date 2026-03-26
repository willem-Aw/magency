<?php get_header() ?>

<?php if (have_posts()): ?>
    <section class="container-full prd-listing has-padding">
        <div class="lh__listing-product room-type">
            <ul class="grid prd-listing lh__room-type-cards grid">

                <?php while (have_posts()): the_post() ?>

                    <li class="item lh__room-type-card">
                        <?php get_template_part('parts/post-card'); ?>
                    </li>


                <?php endwhile; ?>

            </ul>
            <div class="flex-center pagination-wrapper">
                <?= paginate_links(); ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2>No posts found</h2>
<?php endif; ?>

<?php get_footer() ?>