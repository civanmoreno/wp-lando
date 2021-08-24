<?php

/**
 * Register meta boxes.
 */
function speaker_register_meta_boxes() {
    add_meta_box( 'spk', __( 'Speaker Information', 'spk' ), 'speaker_display_callback', 'post' );
}

add_action( 'add_meta_boxes', 'speaker_register_meta_boxes' );

/**
 * Meta box display callback.
 */
function speaker_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . '../views/speaker.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function speaker_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'spk_name',
        'spk_last_name',
        'spk_company',
        'spk_job',
        'spk_bio',
        'spk_id',
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}
add_action( 'save_post', 'speaker_save_meta_box' );