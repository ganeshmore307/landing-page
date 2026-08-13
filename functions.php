<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'X13PLAY_THEME_VERSION', '1.0.0' );

function x13play_enqueue_theme_styles() {
    wp_enqueue_style( 'nuts-parent-style', get_template_directory_uri() . '/style.css', [], null );
    wp_enqueue_style( '13xplay-child-style', get_stylesheet_uri(), [ 'nuts-parent-style' ], X13PLAY_THEME_VERSION );
}
add_action( 'wp_enqueue_scripts', 'x13play_enqueue_theme_styles', 20 );

function x13play_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'x13play_theme_setup' );
