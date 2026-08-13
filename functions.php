<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'X13PLAY_THEME_VERSION', '1.1.0' );

function x13play_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'x13play_theme_setup' );

function x13play_enqueue_theme_styles() {
    wp_enqueue_style( 'nuts-parent-style', get_template_directory_uri() . '/style.css', [], null );
    wp_enqueue_style( '13xplay-child-style', get_stylesheet_uri(), [ 'nuts-parent-style' ], X13PLAY_THEME_VERSION );
    wp_register_style( 'x13play-landing', get_stylesheet_directory_uri() . '/assets/landing.css', [ '13xplay-child-style' ], X13PLAY_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'x13play_enqueue_theme_styles', 20 );
add_action( 'elementor/editor/before_enqueue_styles', 'x13play_enqueue_theme_styles', 20 );

function x13play_register_elementor_widget( $widgets_manager ) {
    if ( ! class_exists( '\\Elementor\\Widget_Base' ) ) {
        return;
    }

    require_once get_stylesheet_directory() . '/inc/class-x13play-elementor-widget.php';

    if ( class_exists( 'X13Play_Elementor_Landing_Widget' ) ) {
        $widgets_manager->register( new X13Play_Elementor_Landing_Widget() );
    }
}
add_action( 'elementor/widgets/register', 'x13play_register_elementor_widget' );

function x13play_missing_elementor_notice() {
    if ( ! current_user_can( 'activate_plugins' ) || did_action( 'elementor/loaded' ) ) {
        return;
    }
    echo '<div class="notice notice-warning"><p><strong>13Xplay Theme:</strong> Elementor must be installed and activated to edit the landing page.</p></div>';
}
add_action( 'admin_notices', 'x13play_missing_elementor_notice' );

function x13play_get_or_create_home_page() {
    $front_id = (int) get_option( 'page_on_front' );
    if ( $front_id && 'page' === get_post_type( $front_id ) ) {
        return $front_id;
    }

    $page = get_page_by_path( 'home' );
    if ( $page instanceof WP_Post ) {
        $page_id = $page->ID;
    } else {
        $page_id = wp_insert_post( [
            'post_title'   => 'Home',
            'post_name'    => 'home',
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_content' => '',
        ] );
    }

    if ( ! is_wp_error( $page_id ) && $page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', (int) $page_id );
        return (int) $page_id;
    }

    return 0;
}

function x13play_seed_home_elementor_page() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    $page_id = x13play_get_or_create_home_page();
    if ( ! $page_id ) {
        return;
    }

    $already_seeded = get_post_meta( $page_id, '_x13play_landing_seeded', true );
    $existing_data  = trim( (string) get_post_meta( $page_id, '_elementor_data', true ) );
    $has_layout     = $existing_data && '[]' !== $existing_data && '{}' !== $existing_data;

    // Never overwrite real Elementor work after the first successful seed.
    if ( $already_seeded || $has_layout ) {
        return;
    }

    $elements = [
        [
            'id'         => 'x13home1',
            'elType'     => 'widget',
            'widgetType' => '13xplay_landing_page',
            'settings'   => [],
            'elements'   => [],
        ],
    ];

    update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $page_id, '_elementor_data', wp_slash( wp_json_encode( $elements ) ) );
    update_post_meta( $page_id, '_wp_page_template', 'elementor_canvas' );
    update_post_meta( $page_id, '_x13play_landing_seeded', X13PLAY_THEME_VERSION );
}
add_action( 'after_switch_theme', 'x13play_seed_home_elementor_page', 30 );
add_action( 'admin_init', 'x13play_seed_home_elementor_page', 30 );
