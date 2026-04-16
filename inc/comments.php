<?php
/* Alterate default fields except the comment textarea */

use function DeliciousBrains\WPMDB\Container\DI\add;

add_filter('comment_form_default_fields', function (array $fields): array {
    /* foreach($fields as $key => $field) {
        var_dump($key);
        echo '<br/><br/>';
        var_dump(esc_html($field));
        echo '<br/><br/>';
    } */

    // remove the website field from $fields
    unset($fields["url"]);

    return $fields;
});

/* Alterate the comment form itsself */

add_filter('comment_form_defaults', function (array $fields): array {
    $comment_label = _x('Comment', 'noun');
    $fields['comment_field'] = <<<HTML
        <label for="comment">Comment <span class="required">*</span></label>
        <textarea id="comment" name="comment" cols="45" rows="8" placeholder="{$comment_label}" required></textarea>
    HTML;

    return $fields;
});


/* Re-arange the fields, which should displayed first and so one. */
add_filter('comment_form_fields', function(array $fields) : array {
    $new_fields = [];
    foreach($fields as $key => $value) {
        if($key != 'comment'){
            if($key == 'cookies'){
                $new_fields['comment'] = $fields['comment'];
            }
            $new_fields[$key] = $value;
        }
    }

    return $new_fields;
});