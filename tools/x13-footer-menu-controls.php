<?php
/**
 * 13XPlay footer menu + address controls for the controlled Elementor landing widget.
 * Adds editable footer quick-link labels/URLs and a footer address without changing the fixed layout.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'elementor/element/x13play_controlled_landing/footer_section/before_section_end', function( $element, $args ) {
    if ( ! class_exists( '\\Elementor\\Controls_Manager' ) ) { return; }

    $element->add_control( 'footer_menu_divider', [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ] );

    $element->add_control( 'footer_menu_note', [
        'type' => \Elementor\Controls_Manager::RAW_HTML,
        'raw' => '<strong>Quick Links menu</strong><br>Change the footer menu text and destination links here.',
        'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
    ] );

    $element->add_control( 'footer_menu_home_text', [
        'label' => 'Menu item 1',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'HOME',
        'label_block' => true,
    ] );
    $element->add_control( 'footer_menu_home_url', [
        'label' => 'Menu item 1 link',
        'type' => \Elementor\Controls_Manager::URL,
        'default' => [ 'url' => '#x13-home' ],
        'show_external' => false,
    ] );

    $element->add_control( 'footer_menu_how_text', [
        'label' => 'Menu item 2',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'HOW IT WORKS',
        'label_block' => true,
    ] );
    $element->add_control( 'footer_menu_how_url', [
        'label' => 'Menu item 2 link',
        'type' => \Elementor\Controls_Manager::URL,
        'default' => [ 'url' => '#x13-how' ],
        'show_external' => false,
    ] );

    $element->add_control( 'footer_menu_support_text', [
        'label' => 'Menu item 3',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'SUPPORT',
        'label_block' => true,
    ] );
    $element->add_control( 'footer_menu_support_url', [
        'label' => 'Menu item 3 link',
        'type' => \Elementor\Controls_Manager::URL,
        'default' => [ 'url' => '#x13-support' ],
        'show_external' => false,
    ] );

    $element->add_control( 'footer_menu_privacy_text', [
        'label' => 'Menu item 4',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'PRIVACY POLICY',
        'label_block' => true,
    ] );
    $element->add_control( 'footer_menu_privacy_url', [
        'label' => 'Menu item 4 link',
        'type' => \Elementor\Controls_Manager::URL,
        'default' => [ 'url' => home_url( '/privacy-policy/' ) ],
        'show_external' => false,
    ] );

    $element->add_control( 'footer_address_divider', [
        'type' => \Elementor\Controls_Manager::DIVIDER,
    ] );
    $element->add_control( 'footer_address', [
        'label' => 'Footer Address',
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => '2nd Floor, SCO 45, Sector 17, Gurugram, Haryana – 122001, India.',
        'rows' => 3,
        'label_block' => true,
    ] );
}, 10, 2 );

add_filter( 'elementor/widget/render_content', function( $content, $widget ) {
    if ( ! $widget || 'x13play_controlled_landing' !== $widget->get_name() ) {
        return $content;
    }

    $s = $widget->get_settings_for_display();
    $heading = isset( $s['footer_links_heading'] ) && '' !== $s['footer_links_heading'] ? $s['footer_links_heading'] : 'QUICK LINKS';

    $items = [
        [
            'text' => ! empty( $s['footer_menu_home_text'] ) ? $s['footer_menu_home_text'] : 'HOME',
            'url'  => ! empty( $s['footer_menu_home_url']['url'] ) ? $s['footer_menu_home_url']['url'] : '#x13-home',
        ],
        [
            'text' => ! empty( $s['footer_menu_how_text'] ) ? $s['footer_menu_how_text'] : 'HOW IT WORKS',
            'url'  => ! empty( $s['footer_menu_how_url']['url'] ) ? $s['footer_menu_how_url']['url'] : '#x13-how',
        ],
        [
            'text' => ! empty( $s['footer_menu_support_text'] ) ? $s['footer_menu_support_text'] : 'SUPPORT',
            'url'  => ! empty( $s['footer_menu_support_url']['url'] ) ? $s['footer_menu_support_url']['url'] : '#x13-support',
        ],
        [
            'text' => ! empty( $s['footer_menu_privacy_text'] ) ? $s['footer_menu_privacy_text'] : 'PRIVACY POLICY',
            'url'  => ! empty( $s['footer_menu_privacy_url']['url'] ) ? $s['footer_menu_privacy_url']['url'] : home_url( '/privacy-policy/' ),
            'class' => 'x13-privacy-link',
        ],
    ];

    $menu = '<div class="x13-footer-links" data-x13-footer-menu-controls="1"><h3>' . esc_html( $heading ) . '</h3>';
    foreach ( $items as $item ) {
        if ( '' === trim( (string) $item['text'] ) ) { continue; }
        $class = ! empty( $item['class'] ) ? ' class="' . esc_attr( $item['class'] ) . '"' : '';
        $menu .= '<a' . $class . ' href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['text'] ) . '</a>';
    }
    $menu .= '</div>';

    $updated = preg_replace( '~<div class="x13-footer-links">.*?</div>~s', $menu, $content, 1 );
    if ( ! is_string( $updated ) || '' === $updated ) {
        $updated = $content;
    }

    $address = isset( $s['footer_address'] ) && '' !== trim( (string) $s['footer_address'] )
        ? trim( (string) $s['footer_address'] )
        : '2nd Floor, SCO 45, Sector 17, Gurugram, Haryana – 122001, India.';

    $address_html = '<p class="x13-footer-address"><strong>Address:</strong> ' . esc_html( $address ) . '</p>';
    $updated = preg_replace(
        '~(<div class="x13-footer-support"><h3>.*?</h3><p>WhatsApp:.*?</p>)~s',
        '$1' . $address_html,
        $updated,
        1
    );

    $updated .= '<style id="x13-footer-address-style">.x13-footer-address{max-width:360px;line-height:1.55!important;margin-top:12px!important;color:#cbd8d4!important}.x13-footer-address strong{color:#fff!important}@media(max-width:767px){.x13-footer-address{max-width:82vw;margin-left:auto!important;margin-right:auto!important;text-align:center!important}}</style>';

    return $updated;
}, 20, 2 );
