<?php
/**
 * One-time 13Xplay Elementor repair.
 * Uploaded temporarily to public_html by GitHub Actions, executed once, then deleted.
 */

$expected_token = 'x13-repair-28-20260814';
$token = isset( $_GET['token'] ) ? (string) $_GET['token'] : '';

if ( ! hash_equals( $expected_token, $token ) ) {
    http_response_code( 403 );
    header( 'Content-Type: application/json; charset=utf-8' );
    echo json_encode( [ 'ok' => false, 'error' => 'Forbidden' ] );
    exit;
}

define( 'WP_USE_THEMES', false );
require_once __DIR__ . '/wp-load.php';

header( 'Content-Type: application/json; charset=utf-8' );

$post_id = 28;
$post = get_post( $post_id );

if ( ! $post || 'page' !== $post->post_type ) {
    echo wp_json_encode( [ 'ok' => false, 'error' => 'Home post 28 not found' ] );
    exit;
}

$raw = get_post_meta( $post_id, '_elementor_data', true );
$data = is_string( $raw ) ? json_decode( $raw, true ) : [];

$before_revisions = wp_get_post_revisions( $post_id );
$before_count = is_array( $before_revisions ) ? count( $before_revisions ) : 0;

// Force Elementor classic mode globally for this installation.
update_option( 'elementor_experiment-e_opt_in_v4', 'inactive', false );
update_option( 'elementor_experiment-e_atomic_elements', 'inactive', false );

// Remove every stale revision/autosave that can override the published Elementor document.
foreach ( $before_revisions as $revision ) {
    wp_delete_post( $revision->ID, true );
}

$autosave = wp_get_post_autosave( $post_id );
if ( $autosave && ! empty( $autosave->ID ) ) {
    wp_delete_post( $autosave->ID, true );
}

// Make the real Home page unambiguously published and current.
wp_update_post( [
    'ID'          => $post_id,
    'post_status' => 'publish',
    'post_title'  => 'Home',
] );

// Reassert the Elementor document metadata on the real page.
update_post_meta( $post_id, '_elementor_edit_mode', 'builder' );
update_post_meta( $post_id, '_elementor_template_type', 'wp-page' );
update_post_meta( $post_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '4.2.2' );
update_post_meta( $post_id, '_wp_page_template', 'default' );
update_post_meta( $post_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );

// Preserve/rewrite the currently published Elementor JSON to invalidate stale DB/object-cache copies.
if ( is_array( $data ) && ! empty( $data ) ) {
    update_post_meta( $post_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
}

// Remove all generated/cached document state so the editor must read the real post meta again.
delete_post_meta( $post_id, '_elementor_css' );
delete_post_meta( $post_id, '_elementor_element_cache' );
delete_post_meta( $post_id, '_elementor_page_assets' );
delete_post_meta( $post_id, '_edit_lock' );
clean_post_cache( $post_id );
wp_cache_flush();

if ( class_exists( '\\Elementor\\Plugin' ) ) {
    try {
        $document = \Elementor\Plugin::$instance->documents->get( $post_id );
        if ( $document && method_exists( $document, 'set_is_built_with_elementor' ) ) {
            $document->set_is_built_with_elementor( true );
        }
        if ( isset( \Elementor\Plugin::$instance->files_manager ) ) {
            \Elementor\Plugin::$instance->files_manager->clear_cache();
        }
    } catch ( Throwable $e ) {
        // Direct post meta repair above is sufficient; return the Elementor API warning for diagnostics only.
        $elementor_warning = $e->getMessage();
    }
}

$after_raw = get_post_meta( $post_id, '_elementor_data', true );
$after_data = is_string( $after_raw ) ? json_decode( $after_raw, true ) : [];
$after_revisions = wp_get_post_revisions( $post_id );

$root_ids = [];
if ( is_array( $after_data ) ) {
    foreach ( $after_data as $root ) {
        if ( is_array( $root ) && ! empty( $root['id'] ) ) {
            $root_ids[] = $root['id'];
        }
    }
}

echo wp_json_encode( [
    'ok'                   => true,
    'post_id'              => $post_id,
    'post_status'          => get_post_status( $post_id ),
    'edit_mode'            => get_post_meta( $post_id, '_elementor_edit_mode', true ),
    'template_type'        => get_post_meta( $post_id, '_elementor_template_type', true ),
    'elementor_version'    => get_post_meta( $post_id, '_elementor_version', true ),
    'root_elements'        => is_array( $after_data ) ? count( $after_data ) : 0,
    'root_ids'             => $root_ids,
    'revisions_before'     => $before_count,
    'revisions_after'      => is_array( $after_revisions ) ? count( $after_revisions ) : 0,
    'v4_global'            => get_option( 'elementor_experiment-e_opt_in_v4' ),
    'atomic_global'        => get_option( 'elementor_experiment-e_atomic_elements' ),
    'elementor_api_warning'=> isset( $elementor_warning ) ? $elementor_warning : '',
] );
