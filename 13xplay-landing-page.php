<?php
/**
 * Plugin Name: 13Xplay Landing Page for Elementor
 * Description: Conversion-focused 13Xplay paid-ad landing page widget for Elementor.
 * Version: 1.0.0
 * Author: 13Xplay
 * Text Domain: 13xplay-landing
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

final class X13Play_Landing_Plugin {
    const VERSION = '1.0.0';

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'assets' ] );
        add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'assets' ] );
    }

    public function assets() {
        wp_register_style(
            '13xplay-landing-page',
            plugins_url( 'assets/landing.css', __FILE__ ),
            [],
            self::VERSION
        );
    }

    public function init() {
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'missing_elementor' ] );
            return;
        }

        require_once __DIR__ . '/widget.php';
        add_action( 'elementor/widgets/register', function( $manager ) {
            $manager->register( new X13Play_Landing_Widget() );
        } );
    }

    public function missing_elementor() {
        if ( current_user_can( 'activate_plugins' ) ) {
            echo '<div class="notice notice-warning"><p>13Xplay Landing Page requires Elementor.</p></div>';
        }
    }
}

new X13Play_Landing_Plugin();
