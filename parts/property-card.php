<div class="lh__room-type-card">
    <figure>
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('card-thumb', ['class' => 'img-cs-size', 'alt' => '']); ?>
            <?php else : ?>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mM8+x8AAp8BznoPXvoAAAAASUVORK5CYII=">
            <?php endif ?>
        </a>
    </figure>
    <div class="lh__room-type-card-content flex-column-between">
        <div class="lh__room_type">
            <ul>
                <!-- display the custom taxonomy "room" -->
                <?php the_terms(get_the_ID(), 'room', '<li>', '<li></li>', '</li>') ?>
            </ul>
        </div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="lh_excerpt"><?php echo get_the_excerpt(); ?></div>
        <p>
            <?php $room = get_field('room'); ?>
            <?php $surface = get_field('surface'); ?>
            <?php if ($surface && $room) : ?>
                <span><?= $surface . ' m' ?><sup>2</sup></span>
                <span><?= ($room > 1) ? $room . ' rooms' : $room . ' room' ?></span>
            <?php endif; ?>
        </p>
        <p>
            <?php $price = get_field('price'); ?>
            <?php if ($price) : ?>
                <?php $formatted_number = number_format_i18n($price); ?>
                <strong><?= $formatted_number . ' €'; ?></strong>
            <?php endif; ?>
        </p>
        <a href="<?php the_permalink(); ?>" class="btn-sm btn btn-primary btn-border-primary text-center">See More</a>
    </div>
</div>