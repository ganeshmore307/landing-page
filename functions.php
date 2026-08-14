<?php
/**
 * 13Xplay bootstrap helper.
 * The actual landing page remains entirely in front-page.php.
 * This only prevents Elementor Canvas from overriding the site's front page.
 */

add_filter( 'template_include', function ( $template ) {
    if ( is_front_page() ) {
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

    // Remove Elementor Canvas / custom page-template overrides from the Home page.
    update_post_meta( $front_id, '_wp_page_template', 'default' );

    $settings = get_post_meta( $front_id, '_elementor_page_settings', true );
    if ( is_array( $settings ) && isset( $settings['page_layout'] ) ) {
        unset( $settings['page_layout'] );
        update_post_meta( $front_id, '_elementor_page_settings', $settings );
    }
}, 20 );
