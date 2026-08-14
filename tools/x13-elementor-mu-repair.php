<?php
/**
 * Temporary MU repair for 13Xplay Home Elementor editor.
 * GitHub Actions uploads this to wp-content/mu-plugins, triggers it once,
 * verifies the result, then deletes it from Hostinger.
 */

add_action( 'plugins_loaded', function () {
    update_option( 'elementor_experiment-e_opt_in_v4', 'inactive', false );
    update_option( 'elementor_experiment-e_atomic_elements', 'inactive', false );
}, 0 );

add_action( 'init', function () {
    if ( ! isset( $_GET['x13_force_elementor_repair'] ) || '1' !== (string) $_GET['x13_force_elementor_repair'] ) {
        return;
    }

    $post_id = 28;
    $post = get_post( $post_id );

    if ( ! $post || 'page' !== $post->post_type ) {
        wp_send_json( [ 'ok' => false, 'error' => 'Home page 28 not found' ], 404 );
    }

    $raw  = get_post_meta( $post_id, '_elementor_data', true );
    $data = is_string( $raw ) ? json_decode( $raw, true ) : [];

    if ( ! is_array( $data ) || empty( $data ) ) {
        wp_send_json( [
            'ok'    => false,
            'error' => 'Published Home page has no Elementor data to preserve',
        ], 500 );
    }

    $before_revisions = wp_get_post_revisions( $post_id );
    $revision_ids = [];
    foreach ( $before_revisions as $revision ) {
        $revision_ids[] = (int) $revision->ID;
        wp_delete_post( $revision->ID, true );
    }

    $autosave = wp_get_post_autosave( $post_id );
    $autosave_id = $autosave && ! empty( $autosave->ID ) ? (int) $autosave->ID : 0;
    if ( $autosave_id ) {
        wp_delete_post( $autosave_id, true );
    }

    // Re-save the actual published Elementor data and document flags.
    update_post_meta( $post_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $post_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $post_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '4.2.2' );
    update_post_meta( $post_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
    update_post_meta( $post_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );
    update_post_meta( $post_id, '_wp_page_template', 'default' );

    // Remove every cache/lock that can make the editor open a stale blank document.
    foreach ( [
        '_elementor_css',
        '_elementor_element_cache',
        '_elementor_page_assets',
        '_edit_lock',
        '_edit_last',
    ] as $meta_key ) {
        delete_post_meta( $post_id, $meta_key );
    }

    if ( 'publish' !== get_post_status( $post_id ) || 'Home' !== get_the_title( $post_id ) ) {
        wp_update_post( [
            'ID'          => $post_id,
            'post_status' => 'publish',
            'post_title'  => 'Home',
        ] );
    }

    clean_post_cache( $post_id );
    wp_cache_flush();

    $elementor_document_ok = null;
    $elementor_document_data_count = null;

    if ( class_exists( '\\Elementor\\Plugin' ) ) {
        try {
            $plugin = \Elementor\Plugin::$instance;

            if ( isset( $plugin->files_manager ) ) {
                $plugin->files_manager->clear_cache();
            }

            $document = $plugin->documents->get( $post_id );
            if ( $document ) {
                if ( method_exists( $document, 'set_is_built_with_elementor' ) ) {
                    $document->set_is_built_with_elementor( true );
                }

                if ( method_exists( $document, 'get_elements_raw_data' ) ) {
                    $document_data = $document->get_elements_raw_data( null, true );
                    $elementor_document_data_count = is_array( $document_data ) ? count( $document_data ) : 0;
                    $elementor_document_ok = $elementor_document_data_count > 0;
                }
            }
        } catch ( Throwable $e ) {
            $elementor_document_ok = false;
            $elementor_warning = $e->getMessage();
        }
    }

    $after_raw  = get_post_meta( $post_id, '_elementor_data', true );
    $after_data = is_string( $after_raw ) ? json_decode( $after_raw, true ) : [];
    $after_revisions = wp_get_post_revisions( $post_id );

    $root_ids = [];
    foreach ( is_array( $after_data ) ? $after_data : [] as $root ) {
        if ( is_array( $root ) && ! empty( $root['id'] ) ) {
            $root_ids[] = $root['id'];
        }
    }

    wp_send_json( [
        'ok'                              => true,
        'post_id'                         => $post_id,
        'post_status'                     => get_post_status( $post_id ),
        'post_title'                      => get_the_title( $post_id ),
        'edit_mode'                       => get_post_meta( $post_id, '_elementor_edit_mode', true ),
        'template_type'                   => get_post_meta( $post_id, '_elementor_template_type', true ),
        'elementor_version'               => get_post_meta( $post_id, '_elementor_version', true ),
        'root_elements'                   => is_array( $after_data ) ? count( $after_data ) : 0,
        'root_ids'                        => $root_ids,
        'deleted_revision_ids'            => $revision_ids,
        'deleted_autosave_id'             => $autosave_id,
        'revisions_after'                 => is_array( $after_revisions ) ? count( $after_revisions ) : 0,
        'v4_global'                       => get_option( 'elementor_experiment-e_opt_in_v4' ),
        'atomic_global'                   => get_option( 'elementor_experiment-e_atomic_elements' ),
        'elementor_document_ok'           => $elementor_document_ok,
        'elementor_document_root_elements'=> $elementor_document_data_count,
        'elementor_warning'               => isset( $elementor_warning ) ? $elementor_warning : '',
    ] );
} );
