<?php

$count = absint(get_comments_number());
?>

<?php if ($count > 0): ?>
    <h3 style="font-family: var(--body-family); margin-block-start: 1.25rem">
        <?= $count ?> Comment<?= $count !== 1 ? 's' : '' ?>
        <?php sprintf(_n('%d Comment', '%d Comments', $count, 'magency'), $count) ?>
    </h3>
<?php else : ?>
    <h3 style="font-family: var(--body-family); margin-block-start: 1.25rem"><?= __('No comments yet', 'magency') ?></h3>
    <p><?php __('Be the first to comment', 'magency') ?></p>
<?php endif; ?>

<?php if (comments_open()) {
    comment_form(
        [
            'title_reply' => '',
        ]
    );
} ?>

<?php wp_list_comments(
    [
        'style' => 'div',
    ]
) ?>

<div class="lh__comments-pagination pagination pagination-wrapper">
    <?php paginate_comments_links() ?>
</div>