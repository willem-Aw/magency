<?php
class Magency_Social_Widget extends WP_Widget
{
    public $fields = [];

    public function __construct()
    {
        parent::__construct('magency_social_widget', __('Social widget', 'magency'));
        $this->fields = [
            'linkedin'  => 'Linkedin',
            'instagram' => 'Instagram',
            'youtube'   => 'Youtube'
        ];
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if (!empty($instance['sidebar_title'])) {
            $title = apply_filters('widget_title', $instance['sidebar_title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<ul class="social-links">';
        foreach ($this->fields as $field => $label) {
            $url      = $instance[$field . '_url'] ?? '';
            $image_id = $instance[$field . '_image'] ?? '';

            if (!empty($url)) {
                $image_tag = '';
                if (!empty($image_id)) {
                    $image_tag = wp_get_attachment_image($image_id, 'thumbnail', false, [
                        'alt' => esc_attr($label)
                    ]);
                }
                // echo '<li class="lh__social-link"><a href="' . esc_url($url) . '">' . $image_tag . esc_html($label) . '</a></li>';
                echo '<li class="lh__social-icon-link"><a href="' . esc_url($url) . '" target="_blank">' . $image_tag . '</a></li>';
            }
        }
        echo '</ul>';

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        // Enqueue media uploader scripts
        wp_enqueue_media();
        ?>
        <p>
            <label for="<?= $this->get_field_id('sidebar_title') ?>"><?= __('Sidebar title', 'magency') ?></label>
            <input
                type="text"
                class="widefat"
                name="<?= $this->get_field_name('sidebar_title') ?>"
                id="<?= $this->get_field_id('sidebar_title') ?>"
                value="<?= esc_attr($instance['sidebar_title'] ?? '') ?>"
            >
        </p>
        <?php
        foreach ($this->fields as $field => $label) {
            $url      = $instance[$field . '_url'] ?? '';
            $image_id = $instance[$field . '_image'] ?? '';
            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';
            ?>
            <hr>
            <p><strong><?= esc_html($label) ?></strong></p>

            <!-- URL input -->
            <p>
                <label for="<?= $this->get_field_id($field . '_url') ?>"><?= esc_html($label) ?> URL</label>
                <input
                    type="text"
                    class="widefat"
                    name="<?= $this->get_field_name($field . '_url') ?>"
                    id="<?= $this->get_field_id($field . '_url') ?>"
                    value="<?= esc_attr($url) ?>"
                    placeholder="https://"
                >
            </p>

            <!-- Image upload -->
            <p>
                <label><?= esc_html($label) ?> Icon/Image</label><br>

                <!-- Preview -->
                <span id="<?= $this->get_field_id($field . '_preview') ?>" style="display:block; margin-bottom:5px;">
                    <?php if ($image_url) : ?>
                        <img src="<?= esc_url($image_url) ?>" style="max-width:80px; height:auto;">
                    <?php endif; ?>
                </span>

                <!-- Hidden input storing image ID -->
                <input
                    type="hidden"
                    name="<?= $this->get_field_name($field . '_image') ?>"
                    id="<?= $this->get_field_id($field . '_image') ?>"
                    value="<?= esc_attr($image_id) ?>"
                >

                <!-- Upload & Remove buttons -->
                <button
                    type="button"
                    class="button magency-upload-btn"
                    data-target-id="<?= $this->get_field_id($field . '_image') ?>"
                    data-preview-id="<?= $this->get_field_id($field . '_preview') ?>"
                >
                    <?= $image_id ? __('Change Image', 'magency') : __('Upload Image', 'magency') ?>
                </button>

                <?php if ($image_id) : ?>
                    <button
                        type="button"
                        class="button magency-remove-btn"
                        data-target-id="<?= $this->get_field_id($field . '_image') ?>"
                        data-preview-id="<?= $this->get_field_id($field . '_preview') ?>"
                        style="margin-left:5px;"
                    >
                        <?= __('Remove Image', 'magency') ?>
                    </button>
                <?php endif; ?>
            </p>
        <?php } ?>

        <!-- Media uploader JS -->
        <script>
            (function ($) {
                // Upload button
                $(document).on('click', '.magency-upload-btn', function (e) {
                    e.preventDefault();
                    var targetId  = $(this).data('target-id');
                    var previewId = $(this).data('preview-id');
                    var btn       = $(this);

                    var frame = wp.media({
                        title: 'Select or Upload Image',
                        button: { text: 'Use this image' },
                        multiple: false
                    });

                    frame.on('select', function () {
                        var attachment = frame.state().get('selection').first().toJSON();
                        $('#' + targetId).val(attachment.id);
                        $('#' + previewId).html('<img src="' + attachment.url + '" style="max-width:80px; height:auto;">');
                        btn.text('Change Image');
                    });

                    frame.open();
                });

                // Remove button
                $(document).on('click', '.magency-remove-btn', function (e) {
                    e.preventDefault();
                    var targetId  = $(this).data('target-id');
                    var previewId = $(this).data('preview-id');
                    $('#' + targetId).val('');
                    $('#' + previewId).html('');
                    $(this).hide();
                });
            }(jQuery));
        </script>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $output = [];

        // Save sidebar title
        $output['sidebar_title'] = sanitize_text_field($new_instance['sidebar_title'] ?? '');

        foreach ($this->fields as $field => $label) {
            // Save URL
            $output[$field . '_url'] = esc_url_raw($new_instance[$field . '_url'] ?? '');

            // Save image ID (must be a valid integer)
            $image_id = absint($new_instance[$field . '_image'] ?? 0);
            $output[$field . '_image'] = $image_id ?: '';
        }

        return $output;
    }
}