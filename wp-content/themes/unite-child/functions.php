<?php

//load the Film Details metabox
require_once('functions-details.php');

// enqueue the parent theme stylesheets first and child theme last
add_action('wp_enqueue_scripts', 'unite_enqueue_styles');
function unite_enqueue_styles()
{
    // load the parent theme stylesheets, style.css being the last
    wp_enqueue_style('unite-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css');
    wp_enqueue_style('unite-icons', get_template_directory_uri() . '/inc/css/font-awesome.min.css');
    wp_enqueue_style('unite-style', get_template_directory_uri() . '/style.css');
    // load child theme stylesheet
    wp_enqueue_style('unite-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        ['unite-style'],
        wp_get_theme()->get('Version')
    );
}

// creates a new post type `film`
add_action('init', 'create_film_post_type');
function create_film_post_type()
{
    register_post_type('film',
        [
            'labels' => [
                'name' => __('Films'),
                'singular_name' => __('Film'),
            ],
            'public' => true,
            'has_archive' => true,
        ]
    );
}

// creates taxonomies for post type `film`
add_action('init', 'create_film_taxonomies');
function create_film_taxonomies()
{
    $taxonomies = ['genre', 'country', 'year', 'actors'];

    foreach ($taxonomies as $taxonomy) {
        register_taxonomy(
            sprintf('film_%s', $taxonomy),
            'film',
            [
                'labels' => [
                    'name' => ucfirst($taxonomy),
                    'add_new_item' => 'Add New Film ' . ucfirst($taxonomy),
                    'new_item_name' => 'New Film Type ' . ucfirst($taxonomy),
                ],
                'show_ui' => true,
                'show_tagcloud' => false,
                'hierarchical' => true,
            ]
        );
    }
}
