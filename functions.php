<?php
/**
 * 13Xplay direct front page helper.
 * Live visitors always get front-page.php.
 * Elementor preview requests are allowed to use the normal WordPress document
 * so the Elementor editor can load its iframe correctly.
 */

function xplay_is_elementor_preview_request() {
    if ( isset( $_GET['elementor-preview'] ) ) {
        return true;
    }

    if ( isset( $_GET['action'] ) && 'elementor' === $_GET['action'] ) {
        return true;
    }

    return false;
}

add_filter( 'template_include', function ( $template ) {
    if ( is_front_page() && ! xplay_is_elementor_preview_request() ) {
        $front = get_stylesheet_directory() . '/front-page.php';
        if ( file_exists( $front ) ) {
            return $front;
        }
    }
    return $template;
}, PHP_INT_MAX );

add_action( 'init', function () {
    $front_id = (int) get_option( 'page_on_front' );
    if ( ! $front_id ) {
        return;
    }

    // Do not alter document settings while Elementor itself is previewing/editing.
    if ( xplay_is_elementor_preview_request() ) {
        return;
    }

    update_post_meta( $front_id, '_wp_page_template', 'default' );

    $settings = get_post_meta( $front_id, '_elementor_page_settings', true );
    if ( is_array( $settings ) && isset( $settings['page_layout'] ) ) {
        unset( $settings['page_layout'] );
        update_post_meta( $front_id, '_elementor_page_settings', $settings );
    }
}, 20 );
