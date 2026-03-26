<?php

/**
 * The front page template file --> "Homepage"
 *
 */
?>


<?php get_header() ?>

<?php
// Query only posts (replacing the default loop)
$posts_query = new WP_Query([
    'post_type'      => 'post',
    // 'posts_per_page' => 10,
]); ?>

<?php if ($posts_query->have_posts()): ?>
    <section class="container-full room-type">
        <div class="lh__room-type grid">
            <div>
                <!-- display widget -->
                <!-- Checks if the 'home_sidebar' widget area has any widgets assigned to it -->
                <?php //if (is_active_sidebar('home_sidebar')): 
                ?>
                <!--  If widgets exist, displays all widgets registered in that 'home_sidebar' area -->
                <?php //dynamic_sidebar('home_sidebar'); 
                ?>
                <?php //endif; 
                ?>

                <!-- OR, THIS IS ANOTHER WAY TO DO IT FOR MORE MODULARITY -->
                <!-- This will search a file that is named 'sidebar-home_sidebar.php' -->
                <?php //get_sidebar('home_sidebar')
                ?>
            </div>
            <div class="lh__room-type-cards grid">

                <?php while ($posts_query->have_posts()): $posts_query->the_post(); ?>

                    <?php get_template_part('parts/post-card'); ?>

                <?php endwhile; ?>

            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <h2>No posts found</h2>
<?php endif; ?>
<?php get_footer() ?>