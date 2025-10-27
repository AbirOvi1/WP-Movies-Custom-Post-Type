<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function abirovi_register_movie_genre_taxonomy() {
    $labels = array(
        'name' => __( 'Genres', 'movies-cpt' ),
        'singular_name' => __( 'Genre', 'movies-cpt' ),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'genre' ),
    );

    register_taxonomy( 'genre', array( 'movie' ), $args );
}
add_action( 'init', 'abirovi_register_movie_genre_taxonomy' );
