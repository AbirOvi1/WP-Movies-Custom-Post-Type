<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function abirovi_movie_add_metabox() {
    add_meta_box(
        'abirovi_movie_details',
        __( 'Movie Details', 'movies-cpt' ),
        'abirovi_movie_metabox_callback',
        'movie',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'abirovi_movie_add_metabox' );

function abirovi_movie_metabox_callback( $post ) {
    $director = get_post_meta( $post->ID, '_abirovi_director', true );
    $release_year = get_post_meta( $post->ID, '_abirovi_release_year', true );

    wp_nonce_field( basename( __FILE__ ), 'abirovi_movie_nonce' );
    ?>
    <p>
        <label for="abirovi_director"><?php _e( 'Director:', 'movies-cpt' ); ?></label><br>
        <input type="text" name="abirovi_director" id="abirovi_director" value="<?php echo esc_attr( $director ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="abirovi_release_year"><?php _e( 'Release Year:', 'movies-cpt' ); ?></label><br>
        <input type="number" name="abirovi_release_year" id="abirovi_release_year" value="<?php echo esc_attr( $release_year ); ?>" style="width:100px;">
    </p>
    <?php
}

function abirovi_movie_save_metabox( $post_id ) {
    if ( ! isset( $_POST['abirovi_movie_nonce'] ) || ! wp_verify_nonce( $_POST['abirovi_movie_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if ( isset( $_POST['abirovi_director'] ) ) {
        update_post_meta( $post_id, '_abirovi_director', sanitize_text_field( $_POST['abirovi_director'] ) );
    }

    if ( isset( $_POST['abirovi_release_year'] ) ) {
        update_post_meta( $post_id, '_abirovi_release_year', sanitize_text_field( $_POST['abirovi_release_year'] ) );
    }
}
add_action( 'save_post', 'abirovi_movie_save_metabox' );
