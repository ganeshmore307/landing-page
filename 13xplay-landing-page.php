<?php
/**
 * Plugin Name: 13Xplay Landing Page for Elementor
 * Description: Conversion-focused 13Xplay paid-ad landing page widget for Elementor.
 * Version: 1.0.1
 * Author: 13Xplay
 * Text Domain: 13xplay-landing
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

final class X13Play_Landing_Plugin {
    const VERSION = '1.0.1';

    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'bootstrap' ], 20 );
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

    public function bootstrap() {
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'missing_elementor' ] );
            return;
        }

        // Elementor's official addon lifecycle initializes custom widgets
        // after Elementor itself has completed initialization.
        if ( did_action( 'elementor/init' ) ) {
            $this->init();
        } else {
            add_action( 'elementor/init', [ $this, 'init' ] );
        }
    }

    public function init() {
        add_action( 'elementor/widgets/register', [ $this, 'register_widget' ] );
    }

    public function register_widget( $manager ) {
        // Never load the widget class before Elementor\Widget_Base exists.
        if ( ! class_exists( '\\Elementor\\Widget_Base' ) ) {
            return;
        }

        require_once __DIR__ . '/widget.php';

        if ( class_exists( 'X13Play_Landing_Widget' ) ) {
            $manager->register( new X13Play_Landing_Widget() );
        }
    }

    public function missing_elementor() {
        if ( current_user_can( 'activate_plugins' ) ) {
            echo '<div class="notice notice-warning"><p>13Xplay Landing Page requires Elementor to be installed and activated.</p></div>';
        }
    }
}

new X13Play_Landing_Plugin();
