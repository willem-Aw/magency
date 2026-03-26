<div class="lh__room-type-card">
    <figure>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('card-thumb', ['class' => 'img-cs-size', 'alt' => '']); ?>
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
        <p class="lh_excerpt"><?php echo get_the_excerpt(); ?></p>
        <p>
            <span>4 people</span>
            <span>4 m<sup>2</sup></span>
        </p>
        <p>
            <strong>400$</strong>
        </p>
        <a href="<?php the_permalink(); ?>" class="btn-sm btn btn-primary btn-border-primary text-center">See More</a>
    </div>
</div>