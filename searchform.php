<?php

/**
 * The template for displaying search forms in Classic Custom Theme
 */
?>


<form class="flex" action="<?= esc_url( home_url( '/' ) ); ?>" method="get">
    <input type="search" placeholder="<?=  __('Search', 'magency') ?>" aria-label="Search" name="s" value="<?= get_search_query(); ?>" required>
    <button class="btn-sm btn-primary text-center btn-border-primary outlined" type="submit">Search</button>
</form>