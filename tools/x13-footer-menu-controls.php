<?php
/**
 * 13XPlay footer menu controls for the controlled Elementor landing widget.
 * Adds editable footer quick-link labels/URLs without changing the fixed layout.
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
    return is_string( $updated ) && '' !== $updated ? $updated : $content;
}, 20, 2 );
