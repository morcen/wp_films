<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('FilmDetails')) {
    /**
     * Class FilmDetails
     */
    class FilmDetails
    {
        /**
         * string The `name` attribute for ticket price field
         */
        const FILM_TICKET_PRICE = '_film_ticket_price';

        /**
         * string The `name` attribute for release date field
         */
        const FILM_RELEASE_DATE = '_film_release_date';

        /**
         * array Determins what post type will this metabox be shown
         */
        const FILM_SCREENS = ['film'];

        /**
         * string Form nonce
         */
        const FILM_DETAIL_NONCE = 'film-meta-box-nonce';

        /**
         * FilmDetails constructor.
         */
        public function __construct()
        {
            add_action('add_meta_boxes', [$this, 'add_film_details']);
            add_action("save_post", [$this, 'save_film_details'], 10, 2);
            add_action('admin_enqueue_scripts', [$this, 'enqueue_date_picker']);
        }

        /**
         * Add the metabox for the appropriate screen
         */
        public function add_film_details()
        {
            foreach (self::FILM_SCREENS as $screen) {
                add_meta_box('film-meta-box', 'Film Details', [$this, 'film_details_markup'], $screen, 'normal');
            }
        }

        /**
         * The label and fields inside the metabox
         */
        public function film_details_markup()
        {
            wp_nonce_field(basename(__FILE__), self::FILM_DETAIL_NONCE);

            global $post;
            $ticket_price = get_post_meta($post->ID, self::FILM_TICKET_PRICE, true);
            $release_date = get_post_meta($post->ID, self::FILM_RELEASE_DATE, true);
            ?>
            <div>
                <p>
                    <label for="film-ticket-price">Ticket Price</label>
                    <input type="text" name="<?php echo self::FILM_TICKET_PRICE; ?>" id="film-ticket-price" value="<?php echo $ticket_price; ?>"/>
                </p>
                <p>
                    <label for="film-release-date">Release Date</label>
                    <input type="text" name="<?php echo self::FILM_RELEASE_DATE; ?>" id="film-release-date" class="datepicker" value="<?php echo $release_date; ?>"/>
                </p>
            </div>
            <?php
        }

        /**
         * Saves the fields as post meta
         *
         * @param $post_id
         * @param $post
         *
         * @return mixed
         */
        public function save_film_details($post_id, $post)
        {
            if (!isset($_POST[self::FILM_DETAIL_NONCE]) || !wp_verify_nonce($_POST[self::FILM_DETAIL_NONCE], basename(__FILE__))) {
                return $post_id;
            }

            if (!current_user_can("edit_post", $post_id)) {
                return $post_id;
            }

            if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
                return $post_id;
            }

            if (!in_array($post->post_type, self::FILM_SCREENS)) {
                return $post_id;
            }

            // TODO: add validation before saving
            update_post_meta($post_id, self::FILM_TICKET_PRICE, sanitize_text_field($_POST[self::FILM_TICKET_PRICE]));
            update_post_meta($post_id, self::FILM_RELEASE_DATE, sanitize_text_field($_POST[self::FILM_RELEASE_DATE]));
        }

        /**
         * Allow user to pick a date instead of manually typing it in
         */
        public function enqueue_date_picker()
        {
            wp_enqueue_script(
                'admin-field-date',
                get_stylesheet_directory_uri() . '/assets/admin/js/field-date.js',
                ['jquery', 'jquery-ui-core', 'jquery-ui-datepicker'],
                time(),
                true
            );

            wp_enqueue_style('jquery-ui-datepicker', get_stylesheet_directory_uri() . '/assets/admin/css/jquery-ui.css');
        }
    }
}

return new FilmDetails();
