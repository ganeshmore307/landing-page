<?php
/**
 * 13Xplay Elementor bootstrap.
 * Uses standard Elementor containers/widgets so the Home page is fully editable.
 * No custom Elementor widget is registered.
 */

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );

    /*
     * This install is a new Elementor 4.x site, so Atomic Editor / V4 is enabled
     * by default. The Home layout below uses Elementor's standard container,
     * heading and button elements. Opt out of V4 using the same feature flags
     * Elementor core uses in its own Editor V4 opt-out routine.
     */
    if ( get_option( 'elementor_experiment-e_opt_in_v4' ) !== 'inactive' ) {
        update_option( 'elementor_experiment-e_opt_in_v4', 'inactive', false );
    }

    if ( get_option( 'elementor_experiment-e_atomic_elements' ) !== 'inactive' ) {
        update_option( 'elementor_experiment-e_atomic_elements', 'inactive', false );
    }
}, 1 );

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
    return [
        'unit'  => $unit,
        'size'  => $size,
        'sizes' => [],
    ];
}

/**
 * Seed Home once with normal Elementor V3-compatible elements.
 * After this seed, Elementor owns the page and the user can edit it normally.
 */
add_action( 'wp_loaded', function () {
    if ( ! did_action( 'elementor/loaded' ) && ! class_exists( '\\Elementor\\Plugin' ) ) {
        return;
    }

    $front_id = (int) get_option( 'page_on_front' );
    if ( ! $front_id ) {
        return;
    }

    $seed_version = '13x-classic-elementor-v1';
    if ( get_post_meta( $front_id, '_x13_seed_version', true ) === $seed_version ) {
        return;
    }

    $wa_url  = 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.';
    $game_bg = 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?auto=format&fit=crop&w=1800&q=90';

    $data = [
        [
            'id'      => '13b00001',
            'elType'  => 'container',
            'isInner' => false,
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
                    'id'      => '13b00002',
                    'elType'  => 'container',
                    'isInner' => false,
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
                        'css_classes'           => 'x13-header',
                    ],
                    'elements' => [
                        [
                            'id'         => '13b00003',
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
                                'css_classes'                 => 'x13-logo',
                            ],
                            'elements' => [],
                        ],
                        [
                            'id'         => '13b00004',
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
                                'css_classes'                 => 'x13-welcome',
                            ],
                            'elements' => [],
                        ],
                    ],
                ],
                [
                    'id'      => '13b00005',
                    'elType'  => 'container',
                    'isInner' => false,
                    'settings' => [
                        'content_width'         => 'full',
                        'width'                 => x13_size( 100, '%' ),
                        'min_height'            => x13_size( 78, 'vh' ),
                        'min_height_mobile'     => x13_size( 82, 'vh' ),
                        'flex_direction'        => 'column',
                        'justify_content'       => 'center',
                        'align_items'           => 'center',
                        'padding'               => x13_spacing( 70, 30, 70, 30 ),
                        'padding_mobile'        => x13_spacing( 46, 18, 76, 18 ),
                        'background_background' => 'classic',
                        'background_image'      => [
                            'url' => $game_bg,
                            'id'  => '',
                        ],
                        'background_position'   => 'center center',
                        'background_size'       => 'cover',
                        'css_classes'           => 'x13-hero',
                    ],
                    'elements' => [
                        [
                            'id'      => '13b00006',
                            'elType'  => 'container',
                            'isInner' => false,
                            'settings' => [
                                'content_width'       => 'boxed',
                                'boxed_width'         => x13_size( 1180 ),
                                'width'               => x13_size( 100, '%' ),
                                'flex_direction'      => 'column',
                                'align_items'         => 'flex-start',
                                'align_items_mobile'  => 'center',
                                'justify_content'     => 'center',
                                'gap'                 => x13_size( 18 ),
                                'css_classes'         => 'x13-hero-inner',
                            ],
                            'elements' => [
                                [
                                    'id'         => '13b00007',
                                    'elType'     => 'widget',
                                    'widgetType' => 'heading',
                                    'isInner'    => false,
                                    'settings'   => [
                                        'title'                       => 'YOUR 13XPLAY ID STARTS HERE',
                                        'header_size'                 => 'h2',
                                        'align'                       => 'left',
                                        'align_mobile'                => 'center',
                                        'title_color'                 => '#18E0B0',
                                        'typography_typography'       => 'custom',
                                        'typography_font_family'      => 'Arial',
                                        'typography_font_size'        => x13_size( 24 ),
                                        'typography_font_size_mobile' => x13_size( 18 ),
                                        'typography_font_weight'      => '800',
                                        'css_classes'                 => 'x13-hero-heading',
                                    ],
                                    'elements' => [],
                                ],
                                [
                                    'id'         => '13b00008',
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
                                        'typography_font_size_mobile' => x13_size( 44 ),
                                        'typography_font_weight'      => '900',
                                        'typography_line_height'      => [
                                            'unit'  => 'em',
                                            'size'  => 0.95,
                                            'sizes' => [],
                                        ],
                                        'css_classes'                 => 'x13-id-title',
                                    ],
                                    'elements' => [],
                                ],
                                [
                                    'id'      => '13b00009',
                                    'elType'  => 'container',
                                    'isInner' => false,
                                    'settings' => [
                                        'width'                 => x13_size( 380 ),
                                        'width_mobile'          => x13_size( 300 ),
                                        'flex_direction'        => 'column',
                                        'justify_content'       => 'center',
                                        'align_items'           => 'center',
                                        'padding'               => x13_spacing( 18, 30, 18, 30 ),
                                        'background_background' => 'classic',
                                        'background_color'      => '#FFBA18',
                                        'border_radius'         => [
                                            'unit'     => 'px',
                                            'top'      => '16',
                                            'right'    => '38',
                                            'bottom'   => '16',
                                            'left'     => '38',
                                            'isLinked' => false,
                                        ],
                                        'css_classes'           => 'x13-offer-badge',
                                    ],
                                    'elements' => [
                                        [
                                            'id'         => '13b00010',
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
                                            ],
                                            'elements' => [],
                                        ],
                                    ],
                                ],
                                [
                                    'id'         => '13b00011',
                                    'elType'     => 'widget',
                                    'widgetType' => 'button',
                                    'isInner'    => false,
                                    'settings'   => [
                                        'text'                          => 'WHATSAPP NOW',
                                        'link'                          => [
                                            'url'               => $wa_url,
                                            'is_external'       => 'on',
                                            'nofollow'          => 'on',
                                            'custom_attributes' => '',
                                        ],
                                        'align'                         => 'left',
                                        'align_mobile'                  => 'center',
                                        'size'                          => 'lg',
                                        'button_text_color'             => '#FFFFFF',
                                        'background_color'              => '#10C95F',
                                        'button_background_hover_color' => '#19DB70',
                                        'border_radius'                 => [
                                            'unit'     => 'px',
                                            'top'      => '14',
                                            'right'    => '14',
                                            'bottom'   => '14',
                                            'left'     => '14',
                                            'isLinked' => true,
                                        ],
                                        'text_padding'                  => x13_spacing( 18, 38, 18, 38 ),
                                        'typography_typography'         => 'custom',
                                        'typography_font_family'        => 'Arial',
                                        'typography_font_size'          => x13_size( 20 ),
                                        'typography_font_size_mobile'   => x13_size( 18 ),
                                        'typography_font_weight'        => '900',
                                        'css_classes'                   => 'x13-whatsapp',
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
    update_post_meta( $front_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '4.0.0' );
    update_post_meta( $front_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
    update_post_meta( $front_id, '_wp_page_template', 'default' );
    update_post_meta( $front_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );
    update_post_meta( $front_id, '_x13_seed_version', $seed_version );

    delete_post_meta( $front_id, '_elementor_css' );
    delete_post_meta( $front_id, '_elementor_element_cache' );
    clean_post_cache( $front_id );

    if ( class_exists( '\\Elementor\\Plugin' ) ) {
        $document = \Elementor\Plugin::$instance->documents->get( $front_id );
        if ( $document && method_exists( $document, 'set_is_built_with_elementor' ) ) {
            $document->set_is_built_with_elementor( true );
        }

        if ( isset( \Elementor\Plugin::$instance->files_manager ) ) {
            \Elementor\Plugin::$instance->files_manager->clear_cache();
        }
    }
}, 99 );
