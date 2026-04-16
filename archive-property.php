<?php get_header() ?>

<?php
$isRent = agency_is_rent_url($_SERVER['REQUEST_URI']);

$type = get_query_var('property_category', 'sale');
$cities = get_terms([
    'taxonomy' => 'property_city',
    'hide_empty' => true,
    'orderby' => 'name',
    'order' => 'ASC',
]);
$currentCity = get_query_var('city');
$currentPrice = get_query_var('price');
$currentRoom = get_query_var('room');

$propertiesTypes = get_terms([
    'taxonomy' => 'property_type',
    'hide_empty' => true,
]);
$currentPropertyType = get_query_var('property_type');
?>

<?php if (have_posts()): ?>
    <section class="container-full rent-banner">
        <div class="lh__rent-banner lh__hero">
            <div class="lh__banner grid">
                <div class="lh__title-n-filter flex-column-center">
                    <div class="th__title">
                        <h1 class="lh__title-n-filter search-form__title">
                            <?= __('Our Properties', 'agency') ?>
                            <?php if ($isRent) : ?>
                                <?= __('for rent', 'agency') ?>
                            <?php else : ?>
                                <?= __('for sale', 'agency') ?>
                            <?php endif; ?>
                        </h1>
                        <p class="h3"><?= __('Find your perfect home here.', 'agency') ?></p>
                    </div>
                    <div class="lh__filter">
                        <div class="lh__filter-content">
                            <div class="search-form">
                                <form action="" class="search-form__form">
                                    <!-- <div class="checkbox-wrapper flex wide">
                                        <div class="flex half-gap align-center">
                                            <input type="checkbox" name="property_category" id="buy" <?php //if ($type === 'sale') echo 'checked value="sale"'; 
                                                                                                        ?>>
                                            <label for="buy" class="flex half-gap align-center">
                                                <span></span>
                                                Buy
                                            </label>
                                        </div>
                                        <div class="flex half-gap align-center">
                                            <input type="checkbox" name="property_category" id="rent" <?php //if ($type === 'rent') echo 'checked value="rent"'; 
                                                                                                        ?>>
                                            <label for="rent" class="flex half-gap align-center">
                                                <span></span>
                                                Rent
                                            </label>
                                        </div>
                                    </div> -->
                                    <div class="form-group custom-filter-wrapper flex align-items half">
                                        <label for="city">City</label>
                                        <!-- <input type="text" id="city" placeholder="Select city" readonly=""> -->
                                        <!-- <input type="text" id="city" placeholder="Select city" readonly="">
                                        <div class="custom-options">
                                            <div>
                                                <input type="text" name="search-options" placeholder="Search options...">
                                            </div>
                                        </div> -->
                                        <select name="city" id="city" class="form-control">
                                            <option value=""><?= __('All Cities', 'agency'); ?></option>
                                            <?php foreach ($cities as $city): ?>
                                                <option value="<?= $city->slug ?>" <?php selected($currentCity, $city->slug); ?>><?= $city->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group flex align-items half">
                                        <label for="budget">Budget</label>
                                        <input type="number" class="form-control" id="budget" placeholder="100 000 €" name="price" value="<?= esc_attr($currentPrice) ?>">
                                    </div>
                                    <div class="form-group half flex align-items">
                                        <label for="property_type">Type</label>
                                        <select name="property_type" id="property_type" class="form-control">
                                            <!-- <option value="flat">Appartment</option>
                                            <option value="villa">Villa</option> -->
                                            <option value=""><?= __('All Types', 'agency'); ?></option>
                                            <?php foreach ($propertiesTypes as $propertyType): ?>
                                                <option value="<?= $propertyType->slug ?>" <?php selected($currentPropertyType, $propertyType->slug); ?>><?= $propertyType->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group flex align-items half">
                                        <label for="rooms">Room</label>
                                        <input type="number" class="form-control" id="rooms" placeholder="4" name="room" value="<?= esc_attr($currentRoom) ?>">
                                    </div>
                                    <button type="submit" class="btn-md btn btn-primary btn-border-primary text-center">Search</button>
                                </form>
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