<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function abirovi_register_movie_post_type() {
    $labels = array(
        'name' => __( 'Movies', 'movies-cpt' ),
        'singular_name' => __( 'Movie', 'movies-cpt' ),
        'add_new' => __( 'Add New Movie', 'movies-cpt' ),
        'edit_item' => __( 'Edit Movie', 'movies-cpt' ),
        'menu_name' => __( 'Movies', 'movies-cpt' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-format-video',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'has_archive' => true,
        'show_in_rest' => true,
    );

    register_post_type( 'movie', $args );
}
add_action( 'init', 'abirovi_register_movie_post_type' );
