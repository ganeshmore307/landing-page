<?php
/**
 * 13Xplay – native Elementor Home-page bootstrap.
 * No custom Elementor widget is used. The Home page is populated once with
 * standard Elementor containers, headings and a button, then remains editable.
 */

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
} );

function x13_spacing( $top, $right, $bottom, $left ) {
    return [
        'unit'     => 'px',
        'top'      => (string) $top,
        'right'    => (string) $right,
        'bottom'   => (string) $bottom,
        'left'     => (string) $left,
        'isLinked' => false,
    ];
}

function x13_size( $size, $unit = 'px' ) {
    return [ 'unit' => $unit, 'size' => $size, 'sizes' => [] ];
}

add_action( 'wp_loaded', function () {
    $front_id = (int) get_option( 'page_on_front' );
    if ( ! $front_id ) {
        return;
    }

    $seed_version = '13x-native-elementor-v1';
    if ( get_post_meta( $front_id, '_x13_seed_version', true ) === $seed_version ) {
        return;
    }

    $wa_url = 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.';
    $game_bg = 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?auto=format&fit=crop&w=1800&q=90';

    $data = [
        [
            'id'       => '13a10001',
            'elType'   => 'container',
            'isInner'  => false,
            'settings' => [
                'content_width'         => 'full',
                'width'                 => x13_size( 100, '%' ),
                'min_height'            => x13_size( 100, 'vh' ),
                'flex_direction'        => 'column',
                'gap'                   => x13_size( 0 ),
                'background_background' => 'classic',
                'background_color'      => '#02070A',
                'css_classes'           => 'x13-main',
            ],
            'elements' => [
                [
                    'id'       => '13a10002',
                    'elType'   => 'container',
                    'isInner'  => false,
                    'settings' => [
                        'content_width'         => 'boxed',
                        'boxed_width'           => x13_size( 1180 ),
                        'width'                 => x13_size( 100, '%' ),
                        'min_height'            => x13_size( 86 ),
                        'flex_direction'        => 'row',
                        'justify_content'       => 'space-between',
                        'align_items'           => 'center',
                        'padding'               => x13_spacing( 0, 34, 0, 34 ),
                        'padding_mobile'        => x13_spacing( 0, 18, 0, 18 ),
                        'background_background' => 'classic',
                        'background_color'      => '#030B0F',
                        'border_border'         => 'solid',
                        'border_width'          => x13_spacing( 0, 0, 1, 0 ),
                        'border_color'          => 'rgba(255,255,255,0.10)',
                        'css_classes'           => 'x13-header',
                    ],
                    'elements' => [
                        [
                            'id'         => '13a10003',
                            'elType'     => 'widget',
                            'widgetType' => 'heading',
                            'isInner'    => false,
                            'settings'   => [
                                'title'                       => '13XPLAY',
                                'header_size'                 => 'div',
                                'title_color'                 => '#FFFFFF',
                                'typography_typography'       => 'custom',
                                'typography_font_family'      => 'Arial',
                                'typography_font_size'        => x13_size( 34 ),
                                'typography_font_size_mobile' => x13_size( 27 ),
                                'typography_font_weight'      => '900',
                                'typography_letter_spacing'   => x13_size( -2 ),
                                'css_classes'                 => 'x13-logo',
                            ],
                            'elements' => [],
                        ],
                        [
                            'id'         => '13a10004',
                            'elType'     => 'widget',
                            'widgetType' => 'heading',
                            'isInner'    => false,
                            'settings'   => [
                                'title'                       => 'WELCOME TO 13XPLAY',
                                'header_size'                 => 'div',
                                'align'                       => 'right',
                                'align_mobile'                => 'right',
                                'title_color'                 => '#18E0B0',
                                'typography_typography'       => 'custom',
                                'typography_font_family'      => 'Arial',
                                'typography_font_size'        => x13_size( 14 ),
                                'typography_font_size_mobile' => x13_size( 11 ),
                                'typography_font_weight'      => '800',
                                'typography_letter_spacing'   => x13_size( 1.3 ),
                                'css_classes'                 => 'x13-welcome',
                            ],
                            'elements' => [],
                        ],
                    ],
                ],
                [
                    'id'       => '13a10005',
                    'elType'   => 'container',
                    'isInner'  => false,
                    'settings' => [
                        'content_width'                    => 'full',
                        'width'                            => x13_size( 100, '%' ),
                        'min_height'                       => x13_size( 78, 'vh' ),
                        'min_height_mobile'                => x13_size( 82, 'vh' ),
                        'flex_direction'                   => 'column',
                        'justify_content'                  => 'center',
                        'align_items'                      => 'center',
                        'padding'                          => x13_spacing( 74, 32, 74, 32 ),
                        'padding_mobile'                   => x13_spacing( 48, 18, 82, 18 ),
                        'background_background'            => 'classic',
                        'background_image'                 => [ 'url' => $game_bg, 'id' => '' ],
                        'background_position'              => 'center center',
                        'background_size'                  => 'cover',
                        'background_overlay_background'    => 'classic',
                        'background_overlay_color'         => 'rgba(1,7,10,0.68)',
                        'background_overlay_opacity'       => [ 'unit' => 'px', 'size' => 1, 'sizes' => [] ],
                        'css_classes'                      => 'x13-hero',
                    ],
                    'elements' => [
                        [
                            'id'       => '13a10006',
                            'elType'   => 'container',
                            'isInner'  => false,
                            'settings' => [
                                'content_width'    => 'boxed',
                                'boxed_width'      => x13_size( 1180 ),
                                'width'            => x13_size( 100, '%' ),
                                'max_width'        => x13_size( 1180 ),
                                'flex_direction'   => 'column',
                                'justify_content'  => 'center',
                                'align_items'      => 'flex-start',
                                'align_items_mobile' => 'center',
                                'gap'              => x13_size( 20 ),
                                'css_classes'      => 'x13-hero-inner',
                            ],
                            'elements' => [
                                [
                                    'id'         => '13a10007',
                                    'elType'     => 'widget',
                                    'widgetType' => 'heading',
                                    'isInner'    => false,
                                    'settings'   => [
                                        'title'                       => 'GET ID IN 1 MIN',
                                        'header_size'                 => 'h1',
                                        'align'                       => 'left',
                                        'align_mobile'                => 'center',
                                        'title_color'                 => '#FFFFFF',
                                        'typography_typography'       => 'custom',
                                        'typography_font_family'      => 'Arial',
                                        'typography_font_size'        => x13_size( 72 ),
                                        'typography_font_size_tablet' => x13_size( 58 ),
                                        'typography_font_size_mobile' => x13_size( 46 ),
                                        'typography_font_weight'      => '900',
                                        'typography_line_height'      => [ 'unit' => 'em', 'size' => 0.95, 'sizes' => [] ],
                                        'typography_letter_spacing'   => x13_size( -2.5 ),
                                        'css_classes'                 => 'x13-id-title',
                                    ],
                                    'elements' => [],
                                ],
                                [
                                    'id'       => '13a10008',
                                    'elType'   => 'container',
                                    'isInner'  => false,
                                    'settings' => [
                                        'width'                 => x13_size( 380 ),
                                        'width_mobile'          => x13_size( 300 ),
                                        'flex_direction'        => 'column',
                                        'justify_content'       => 'center',
                                        'align_items'           => 'center',
                                        'padding'               => x13_spacing( 18, 30, 18, 30 ),
                                        'background_background' => 'gradient',
                                        'background_color'      => '#FFD73A',
                                        'background_color_b'    => '#FF9F0A',
                                        'background_gradient_type' => 'linear',
                                        'background_gradient_angle' => [ 'unit' => 'deg', 'size' => 120, 'sizes' => [] ],
                                        'border_border'         => 'solid',
                                        'border_width'          => x13_spacing( 2, 2, 2, 2 ),
                                        'border_color'          => '#FFE47A',
                                        'border_radius'         => [ 'unit' => 'px', 'top' => '8', 'right' => '30', 'bottom' => '8', 'left' => '30', 'isLinked' => false ],
                                        'box_shadow_box_shadow' => [ 'horizontal' => 0, 'vertical' => 14, 'blur' => 40, 'spread' => 0, 'color' => 'rgba(255,176,0,0.28)' ],
                                        'css_classes'           => 'x13-offer-badge',
                                    ],
                                    'elements' => [
                                        [
                                            'id'         => '13a10009',
                                            'elType'     => 'widget',
                                            'widgetType' => 'heading',
                                            'isInner'    => false,
                                            'settings'   => [
                                                'title'                       => 'GET 10% EXTRA',
                                                'header_size'                 => 'div',
                                                'align'                       => 'center',
                                                'title_color'                 => '#101010',
                                                'typography_typography'       => 'custom',
                                                'typography_font_family'      => 'Arial',
                                                'typography_font_size'        => x13_size( 34 ),
                                                'typography_font_size_mobile' => x13_size( 27 ),
                                                'typography_font_weight'      => '900',
                                                'typography_letter_spacing'   => x13_size( -1 ),
                                            ],
                                            'elements' => [],
                                        ],
                                    ],
                                ],
                                [
                                    'id'         => '13a10010',
                                    'elType'     => 'widget',
                                    'widgetType' => 'button',
                                    'isInner'    => false,
                                    'settings'   => [
                                        'text'                        => 'WHATSAPP NOW',
                                        'link'                        => [ 'url' => $wa_url, 'is_external' => 'on', 'nofollow' => 'on', 'custom_attributes' => '' ],
                                        'align'                       => 'left',
                                        'align_mobile'                => 'center',
                                        'size'                        => 'lg',
                                        'button_text_color'           => '#FFFFFF',
                                        'background_color'            => '#10C95F',
                                        'hover_color'                 => '#FFFFFF',
                                        'button_background_hover_color' => '#19DB70',
                                        'border_radius'               => [ 'unit' => 'px', 'top' => '14', 'right' => '14', 'bottom' => '14', 'left' => '14', 'isLinked' => true ],
                                        'text_padding'                => x13_spacing( 18, 38, 18, 38 ),
                                        'typography_typography'       => 'custom',
                                        'typography_font_family'      => 'Arial',
                                        'typography_font_size'        => x13_size( 20 ),
                                        'typography_font_size_mobile' => x13_size( 18 ),
                                        'typography_font_weight'      => '900',
                                        'css_classes'                 => 'x13-whatsapp',
                                    ],
                                    'elements' => [],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    update_post_meta( $front_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $front_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $front_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '3.0.0' );
    update_post_meta( $front_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
    update_post_meta( $front_id, '_wp_page_template', 'default' );
    update_post_meta( $front_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );
    update_post_meta( $front_id, '_x13_seed_version', $seed_version );

    delete_post_meta( $front_id, '_elementor_css' );
    clean_post_cache( $front_id );

    if ( class_exists( '\\Elementor\\Plugin' ) && isset( \Elementor\Plugin::$instance->files_manager ) ) {
        \Elementor\Plugin::$instance->files_manager->clear_cache();
    }
}, 99 );
