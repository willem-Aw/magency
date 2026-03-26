<div class="lh__room-type-card lh___blog-card">
    <figure>
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('blog-thumb', ['class' => 'img-cs-size', 'alt' => '']); ?>
            <?php else : ?>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mM8+x8AAp8BznoPXvoAAAAASUVORK5CYII=">
            <?php endif ?>
        </a>
    </figure>
    <div class="lh__room-type-card-content flex-column-between">
        <div class="lh__room_type">
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
        </div>
        <p class="lh_blog-date"><?= sprintf(__('Published on %s', 'magency'), get_the_date()) ?></p>
        <h3><a href="<?php the_permalink(); ?>"><?= esc_attr(the_title()) ?></a></h3>
        <div class="lh_excerpt"><?= get_the_excerpt(); ?></div>
        <a href="<?php the_permalink(); ?>" class="btn-sm btn btn-primary btn-border-primary text-center">See More</a>
    </div>
</div>