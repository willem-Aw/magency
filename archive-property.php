<?php get_header() ?>

<?php if (have_posts()): ?>
    <section class="container-full rent-banner">
        <div class="lh__rent-banner lh__hero">
            <div class="lh__banner grid">
                <div class="lh__title-n-filter flex-column-center">
                    <div class="th__title">
                        <h1 class="lh__hero-title uppercase">
                            Dining at Larana Hotel
                        </h1>
                        <p>
                            Our in-house restaurant serves gourmet dishes prepared by award-winning chefs. Whether
                            you want to indulge in fine dining or have a casual meal, we offer a variety of
                            international and local delicacies to suit every palate.
                        </p>
                    </div>
                    <div class="lh__filter">
                        <div class="lh__filter-content">
                            <div class="custom-filter-wrapper">
                                <input type="text" id="filterInput" placeholder="Select Filter Options" readonly=""
                                    value="All">
                                <div class="custom-options">
                                    <input type="text" name="search-options" placeholder="Search options...">
                                    <div data-value="All">All</div>
                                    <div data-value="Single room">Single room</div>
                                    <div data-value="Double room">Double room</div>
                                    <div data-value="Suite">Suite</div>
                                    <div data-value="Deluxe">Deluxe</div>
                                </div>
                            </div>
                            <div class="checkbox-wrapper flex">
                                <div class="flex half-gap align-center">
                                    <input type="checkbox" name="buy" id="buy">
                                    <label for="buy" class="flex half-gap align-center">
                                        <span></span>
                                        Buy
                                    </label>
                                </div>
                                <div class="flex half-gap align-center">
                                    <input type="checkbox" name="rent" id="rent">
                                    <label for="rent" class="flex half-gap align-center">
                                        <span></span>
                                        Rent
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lh__top-product room-type">
                    <ul class="grid prd-listing lh__room-type-cards">
                        <?php
                        $top_count = 0;
                        // Pull up to two posts for the top container. This consumes the first two posts
                        // from the main loop so the later loop prints the remaining posts.
                        while (have_posts() && $top_count < 2): the_post(); ?>

                            <li class="item lh__room-type-card">
                                <?php get_template_part('parts/property-card'); ?>
                            </li>

                        <?php
                            $top_count++;
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="container-full  has-padding room-type">
        <div class="lh__listing-product lh__room-type grid">
            <div>
                <div>

                </div>
            </div>
            <div class="lh__room-type-cards">
                <ul class="grid prd-listing lh__room-type-cards grid">

                    <?php while (have_posts()): the_post() ?>

                        <li class="item lh__room-type-card">
                            <?php get_template_part('parts/property-card'); ?>
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
    <h2><?php __('No property found', 'magency') ?></h2>
<?php endif; ?>

<?php get_footer() ?>