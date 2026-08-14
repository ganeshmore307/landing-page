<?php
/**
 * 13Xplay Elementor bootstrap.
 * Forces Home (post 28) to contain normal Elementor-editable content.
 * No custom Elementor widgets or plugins are used.
 */

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );

    // Keep Elementor in classic editor mode; the installed Elementor 4.x build
    // otherwise opts new sites into Atomic/V4 data which uses a different schema.
    update_option( 'elementor_experiment-e_opt_in_v4', 'inactive', false );
    update_option( 'elementor_experiment-e_atomic_elements', 'inactive', false );
}, 1 );

function x13_dims( $top, $right, $bottom, $left, $unit = 'px' ) {
    return [
        'unit'     => $unit,
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

/**
 * Force-repair Home Elementor data once.
 * We intentionally target post 28 because that is the Home page currently
 * being edited at /wp-admin/post.php?post=28&action=elementor.
 */
add_action( 'wp_loaded', function () {
    $home_id = 28;
    $post = get_post( $home_id );

    // Fallback to WordPress' configured static front page if post 28 is absent.
    if ( ! $post || 'page' !== $post->post_type ) {
        $home_id = (int) get_option( 'page_on_front' );
        $post = $home_id ? get_post( $home_id ) : null;
    }

    if ( ! $post ) {
        return;
    }

    $repair_version = '13x-elementor-force-repair-v3';
    $existing_data  = get_post_meta( $home_id, '_elementor_data', true );
    $decoded        = is_string( $existing_data ) ? json_decode( $existing_data, true ) : [];

    // Do not overwrite once the repaired Elementor layout exists.
    if (
        get_post_meta( $home_id, '_x13_repair_version', true ) === $repair_version &&
        is_array( $decoded ) &&
        ! empty( $decoded )
    ) {
        return;
    }

    // Remove stale autosaves/revisions that can make Elementor load a blank draft.
    $revisions = wp_get_post_revisions( $home_id );
    foreach ( $revisions as $revision ) {
        wp_delete_post( $revision->ID, true );
    }

    // Ensure Elementor sees this as a published page, not a blank draft.
    if ( 'publish' !== get_post_status( $home_id ) ) {
        wp_update_post( [
            'ID'          => $home_id,
            'post_status' => 'publish',
        ] );
    }

    $wa_url  = 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.';
    $game_bg = 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?auto=format&fit=crop&w=1800&q=90';

    /*
     * Classic Elementor schema: Section -> Column -> Widget.
     * This is deliberately simpler than containers to maximize editor compatibility.
     */
    $data = [
        [
            'id'       => '13c00001',
            'elType'   => 'section',
            'isInner'  => false,
            'settings' => [
                'content_width'         => [ 'unit' => 'px', 'size' => 1180, 'sizes' => [] ],
                'gap'                   => 'no',
                'background_background' => 'classic',
                'background_color'      => '#030B0F',
                'padding'               => x13_dims( 12, 30, 12, 30 ),
                'padding_mobile'        => x13_dims( 10, 18, 10, 18 ),
                'css_classes'           => 'x13-header',
            ],
            'elements' => [
                [
                    'id'       => '13c00002',
                    'elType'   => 'column',
                    'isInner'  => false,
                    'settings' => [ '_column_size' => 40, '_inline_size' => 40 ],
                    'elements' => [
                        [
                            'id'         => '13c00003',
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
                                'typography_font_size_mobile' => x13_size( 26 ),
                                'typography_font_weight'      => '900',
                                'css_classes'                 => 'x13-logo',
                            ],
                            'elements' => [],
                        ],
                    ],
                ],
                [
                    'id'       => '13c00004',
                    'elType'   => 'column',
                    'isInner'  => false,
                    'settings' => [ '_column_size' => 60, '_inline_size' => 60 ],
                    'elements' => [
                        [
                            'id'         => '13c00005',
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
            ],
        ],
        [
            'id'       => '13c00006',
            'elType'   => 'section',
            'isInner'  => false,
            'settings' => [
                'content_width'                    => [ 'unit' => 'px', 'size' => 1180, 'sizes' => [] ],
                'gap'                              => 'no',
                'height'                           => 'min-height',
                'custom_height'                    => x13_size( 720 ),
                'custom_height_tablet'             => x13_size( 650 ),
                'custom_height_mobile'             => x13_size( 680 ),
                'background_background'            => 'classic',
                'background_image'                 => [ 'url' => $game_bg, 'id' => '' ],
                'background_position'              => 'center center',
                'background_size'                  => 'cover',
                'background_overlay_background'    => 'classic',
                'background_overlay_color'         => 'rgba(1,7,10,0.68)',
                'padding'                          => x13_dims( 80, 34, 80, 34 ),
                'padding_mobile'                   => x13_dims( 56, 18, 80, 18 ),
                'css_classes'                      => 'x13-hero',
            ],
            'elements' => [
                [
                    'id'       => '13c00007',
                    'elType'   => 'column',
                    'isInner'  => false,
                    'settings' => [ '_column_size' => 100, '_inline_size' => 100, 'vertical_align' => 'middle' ],
                    'elements' => [
                        [
                            'id'         => '13c00008',
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
                            'id'         => '13c00009',
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
                                'typography_font_size_mobile' => x13_size( 43 ),
                                'typography_font_weight'      => '900',
                                'typography_line_height'      => [ 'unit' => 'em', 'size' => 0.98, 'sizes' => [] ],
                                'css_classes'                 => 'x13-id-title',
                            ],
                            'elements' => [],
                        ],
                        [
                            'id'         => '13c00010',
                            'elType'     => 'widget',
                            'widgetType' => 'heading',
                            'isInner'    => false,
                            'settings'   => [
                                'title'                        => 'GET 10% EXTRA',
                                'header_size'                  => 'div',
                                'align'                        => 'center',
                                'title_color'                  => '#111111',
                                'background_background'        => 'classic',
                                'background_color'             => '#FFBA18',
                                'padding'                      => x13_dims( 18, 30, 18, 30 ),
                                'margin'                       => x13_dims( 14, 0, 20, 0 ),
                                'typography_typography'        => 'custom',
                                'typography_font_family'       => 'Arial',
                                'typography_font_size'         => x13_size( 34 ),
                                'typography_font_size_mobile'  => x13_size( 27 ),
                                'typography_font_weight'       => '900',
                                'css_classes'                  => 'x13-offer-badge',
                                '_element_width'               => 'initial',
                                '_element_custom_width'        => x13_size( 390 ),
                                '_element_custom_width_mobile' => x13_size( 300 ),
                            ],
                            'elements' => [],
                        ],
                        [
                            'id'         => '13c00011',
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
                                'border_radius'                 => [ 'unit' => 'px', 'top' => '14', 'right' => '14', 'bottom' => '14', 'left' => '14', 'isLinked' => true ],
                                'text_padding'                  => x13_dims( 18, 38, 18, 38 ),
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
    ];

    update_post_meta( $home_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $home_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $home_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '3.32.0' );
    update_post_meta( $home_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
    update_post_meta( $home_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );
    update_post_meta( $home_id, '_wp_page_template', 'default' );
    update_post_meta( $home_id, '_x13_repair_version', $repair_version );

    delete_post_meta( $home_id, '_elementor_css' );
    delete_post_meta( $home_id, '_elementor_element_cache' );
    delete_post_meta( $home_id, '_elementor_page_assets' );
    clean_post_cache( $home_id );

    if ( class_exists( '\\Elementor\\Plugin' ) && isset( \Elementor\Plugin::$instance->files_manager ) ) {
        \Elementor\Plugin::$instance->files_manager->clear_cache();
    }
}, 1 );

// Small deployment diagnostic: confirms whether the actual Home post contains Elementor data.
add_action( 'template_redirect', function () {
    if ( ! isset( $_GET['x13_diag'] ) || 'elementor' !== $_GET['x13_diag'] ) {
        return;
    }

    $home_id = 28;
    $raw      = get_post_meta( $home_id, '_elementor_data', true );
    $decoded  = is_string( $raw ) ? json_decode( $raw, true ) : [];

    wp_send_json( [
        'post_id'        => $home_id,
        'post_status'    => get_post_status( $home_id ),
        'edit_mode'      => get_post_meta( $home_id, '_elementor_edit_mode', true ),
        'template_type'  => get_post_meta( $home_id, '_elementor_template_type', true ),
        'repair_version' => get_post_meta( $home_id, '_x13_repair_version', true ),
        'root_elements'  => is_array( $decoded ) ? count( $decoded ) : 0,
        'has_data'       => is_array( $decoded ) && ! empty( $decoded ),
    ] );
} );
