<?php
/** Temporary one-time seeder for Home page 28. Remove after execution. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'init', function() {
    if ( ! isset( $_GET['x13_seed_controlled'] ) || '1' !== (string) $_GET['x13_seed_controlled'] ) { return; }

    $home_id = 28;
    $post = get_post( $home_id );
    if ( ! $post || 'page' !== $post->post_type ) {
        wp_send_json_error( [ 'message' => 'Home page 28 not found.' ], 404 );
    }

    update_option( 'elementor_experiment-e_opt_in_v4', 'inactive', false );
    update_option( 'elementor_experiment-e_atomic_elements', 'inactive', false );

    foreach ( wp_get_post_revisions( $home_id ) as $revision ) {
        wp_delete_post( $revision->ID, true );
    }

    $widget_settings = [
        'logo_image' => [ 'url' => home_url( '/wp-content/uploads/13xplay-assets/13xplay-logo.webp' ), 'id' => '' ],
        'hero_image' => [ 'url' => home_url( '/wp-content/uploads/13xplay-assets/13xplay-hero.webp' ), 'id' => '' ],
        'welcome_text' => 'WELCOME TO 13XPLAY',
        'nav_home' => 'HOME',
        'nav_how' => 'HOW IT WORKS',
        'nav_support' => 'SUPPORT',
        'header_secure' => '100% SECURE & TRUSTED',
        'header_cta' => 'WHATSAPP NOW',
        'header_cta_url' => [ 'url' => 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.' ],
        'eyebrow' => 'WELCOME TO 13XPLAY',
        'hero_line_1' => 'PLAY MORE',
        'hero_line_2' => 'WIN MORE!',
        'hero_subtitle' => 'THE ULTIMATE GAMING EXPERIENCE',
        'id_label' => 'GET ID IN',
        'id_time' => '1 MIN',
        'trust_line' => 'FAST | SECURE | TRUSTED',
        'trust_subline' => 'YOUR WINNING STARTS HERE',
        'bonus_percent' => '10%',
        'bonus_extra' => 'EXTRA',
        'bonus_word' => 'BONUS',
        'cta_kicker_1' => 'READY TO WIN BIG?',
        'cta_kicker_2' => 'JOIN 13XPLAY NOW!',
        'cta_text' => 'WHATSAPP NOW',
        'cta_url' => [ 'url' => 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.' ],
        'f1_title' => 'FAST', 'f1_sub' => 'DELIVERY',
        'f2_title' => '100%', 'f2_sub' => 'SECURE',
        'f3_title' => '24/7', 'f3_sub' => 'SUPPORT',
        'f4_title' => 'BEST', 'f4_sub' => 'SERVICE',
        'footer_text' => 'Fast ID. Secure support. Simple WhatsApp assistance.',
        'footer_links_heading' => 'QUICK LINKS',
        'footer_support_heading' => '24X7 SUPPORT',
        'footer_phone' => '+91 70588 20881',
        'footer_button' => 'CHAT ON WHATSAPP',
        'copyright' => '© 2026 13XPLAY. All rights reserved.',
        'accent' => '#16F06A', 'accent_teal' => '#15D9B0', 'gold' => '#FFD83D', 'background' => '#020707',
        'title_size' => [ 'unit' => 'px', 'size' => 88, 'sizes' => [] ],
        'mobile_title_size' => [ 'unit' => 'px', 'size' => 54, 'sizes' => [] ],
        'content_width' => [ 'unit' => 'px', 'size' => 1440, 'sizes' => [] ],
    ];

    $data = [
        [
            'id' => '13xctrl1',
            'elType' => 'section',
            'isInner' => false,
            'settings' => [ 'gap' => 'no', 'layout' => 'full_width', 'content_width' => [ 'unit' => 'px', 'size' => 1600, 'sizes' => [] ], 'padding' => [ 'unit'=>'px','top'=>'0','right'=>'0','bottom'=>'0','left'=>'0','isLinked'=>true ] ],
            'elements' => [
                [
                    'id' => '13xctrl2',
                    'elType' => 'column',
                    'isInner' => false,
                    'settings' => [ '_column_size' => 100, '_inline_size' => 100, 'padding' => [ 'unit'=>'px','top'=>'0','right'=>'0','bottom'=>'0','left'=>'0','isLinked'=>true ] ],
                    'elements' => [
                        [
                            'id' => '13xctrl3',
                            'elType' => 'widget',
                            'widgetType' => 'x13play_controlled_landing',
                            'isInner' => false,
                            'settings' => $widget_settings,
                            'elements' => [],
                        ],
                    ],
                ],
            ],
        ],
    ];

    wp_update_post( [ 'ID' => $home_id, 'post_status' => 'publish' ] );
    update_post_meta( $home_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $home_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $home_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '4.2.2' );
    update_post_meta( $home_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
    update_post_meta( $home_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );
    update_post_meta( $home_id, '_wp_page_template', 'elementor_canvas' );
    update_post_meta( $home_id, '_x13_layout_version', 'controlled-editor-mobile-reference-v2' );
    delete_post_meta( $home_id, '_elementor_css' );
    delete_post_meta( $home_id, '_elementor_element_cache' );
    delete_post_meta( $home_id, '_elementor_page_assets' );
    clean_post_cache( $home_id );

    if ( class_exists( '\\Elementor\\Plugin' ) && isset( \Elementor\Plugin::$instance->files_manager ) ) {
        \Elementor\Plugin::$instance->files_manager->clear_cache();
    }
    do_action( 'litespeed_purge_all' );

    $raw = get_post_meta( $home_id, '_elementor_data', true );
    $decoded = is_string( $raw ) ? json_decode( $raw, true ) : [];
    $widget_type = '';
    if ( isset( $decoded[0]['elements'][0]['elements'][0]['widgetType'] ) ) {
        $widget_type = $decoded[0]['elements'][0]['elements'][0]['widgetType'];
    }

    wp_send_json( [
        'ok' => true,
        'post_id' => $home_id,
        'layout_version' => get_post_meta( $home_id, '_x13_layout_version', true ),
        'root_elements' => is_array( $decoded ) ? count( $decoded ) : 0,
        'widget_type' => $widget_type,
        'edit_mode' => get_post_meta( $home_id, '_elementor_edit_mode', true ),
        'trust_points' => [ 'FAST DELIVERY', '100% SECURE', '24/7 SUPPORT', 'BEST SERVICE' ],
    ] );
}, 1 );