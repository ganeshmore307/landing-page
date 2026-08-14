<?php
/**
 * Temporary MU-plugin builder for the fully Elementor-editable 13Xplay landing page.
 * Trigger with ?x13_build_reference=1, then remove this file from wp-content/mu-plugins.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function x13_ref_dim( $t, $r, $b, $l, $unit = 'px', $linked = false ) {
    return [ 'unit' => $unit, 'top' => (string) $t, 'right' => (string) $r, 'bottom' => (string) $b, 'left' => (string) $l, 'isLinked' => $linked ];
}
function x13_ref_size( $size, $unit = 'px' ) {
    return [ 'unit' => $unit, 'size' => $size, 'sizes' => [] ];
}
function x13_ref_widget( $id, $type, $settings = [] ) {
    return [ 'id' => $id, 'elType' => 'widget', 'widgetType' => $type, 'isInner' => false, 'settings' => $settings, 'elements' => [] ];
}
function x13_ref_col( $id, $size, $elements, $settings = [], $inner = false ) {
    $settings = array_merge( [ '_column_size' => $size, '_inline_size' => $size ], $settings );
    return [ 'id' => $id, 'elType' => 'column', 'isInner' => $inner, 'settings' => $settings, 'elements' => $elements ];
}
function x13_ref_section( $id, $elements, $settings = [], $inner = false ) {
    return [ 'id' => $id, 'elType' => 'section', 'isInner' => $inner, 'settings' => $settings, 'elements' => $elements ];
}
function x13_ref_heading( $id, $title, $class = '', $size = 30, $mobile = 24, $color = '#ffffff', $tag = 'div', $align = 'left' ) {
    return x13_ref_widget( $id, 'heading', [
        'title' => $title,
        'header_size' => $tag,
        'align' => $align,
        'align_mobile' => $align,
        'title_color' => $color,
        'typography_typography' => 'custom',
        'typography_font_family' => 'Arial',
        'typography_font_size' => x13_ref_size( $size ),
        'typography_font_size_mobile' => x13_ref_size( $mobile ),
        'typography_font_weight' => '800',
        'css_classes' => $class,
    ] );
}
function x13_ref_text( $id, $html, $class = '', $color = '#ffffff' ) {
    return x13_ref_widget( $id, 'text-editor', [
        'editor' => $html,
        'text_color' => $color,
        'css_classes' => $class,
    ] );
}
function x13_ref_iconbox( $id, $icon, $title, $desc, $class = '' ) {
    return x13_ref_widget( $id, 'icon-box', [
        'selected_icon' => [ 'value' => $icon, 'library' => 'fa-solid' ],
        'title_text' => $title,
        'description_text' => $desc,
        'position' => 'left',
        'title_size' => 'div',
        'icon_primary_color' => '#29F469',
        'icon_size' => x13_ref_size( 28 ),
        'title_color' => '#29F469',
        'description_color' => '#FFFFFF',
        'title_typography_typography' => 'custom',
        'title_typography_font_family' => 'Arial',
        'title_typography_font_size' => x13_ref_size( 14 ),
        'title_typography_font_weight' => '800',
        'description_typography_typography' => 'custom',
        'description_typography_font_family' => 'Arial',
        'description_typography_font_size' => x13_ref_size( 12 ),
        'description_typography_font_weight' => '600',
        'css_classes' => 'x13-feature-card ' . $class,
    ] );
}
function x13_ref_button( $id, $text, $url, $class = '', $size = 20, $align = 'center' ) {
    return x13_ref_widget( $id, 'button', [
        'text' => $text,
        'link' => [ 'url' => $url, 'is_external' => 'on', 'nofollow' => 'on', 'custom_attributes' => '' ],
        'align' => $align,
        'align_mobile' => 'center',
        'size' => 'lg',
        'button_text_color' => '#FFFFFF',
        'background_color' => '#0BCF4E',
        'button_background_hover_color' => '#22EB68',
        'typography_typography' => 'custom',
        'typography_font_family' => 'Arial',
        'typography_font_size' => x13_ref_size( $size ),
        'typography_font_size_mobile' => x13_ref_size( max( 18, $size - 4 ) ),
        'typography_font_weight' => '900',
        'text_padding' => x13_ref_dim( 17, 28, 17, 28 ),
        'border_radius' => x13_ref_dim( 14, 14, 14, 14, 'px', true ),
        'css_classes' => $class,
    ] );
}

add_action( 'init', function () {
    if ( ! isset( $_GET['x13_build_reference'] ) || '1' !== (string) $_GET['x13_build_reference'] ) {
        return;
    }

    $home_id = 28;
    $post = get_post( $home_id );
    if ( ! $post || 'page' !== $post->post_type ) {
        wp_send_json_error( [ 'message' => 'Home page 28 not found.' ], 404 );
    }

    update_option( 'elementor_experiment-e_opt_in_v4', 'inactive', false );
    update_option( 'elementor_experiment-e_atomic_elements', 'inactive', false );

    foreach ( wp_get_post_revisions( $home_id ) as $rev ) {
        wp_delete_post( $rev->ID, true );
    }
    if ( 'publish' !== get_post_status( $home_id ) ) {
        wp_update_post( [ 'ID' => $home_id, 'post_status' => 'publish' ] );
    }

    $wa = 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.';
    $stadium = 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?auto=format&fit=crop&w=2000&q=90';
    $cricket = 'https://unsplash.com/photos/dE3exzmYlKc/download?force=true&w=1100';

    $header = x13_ref_section( '13d00001', [
        x13_ref_col( '13d00002', 22, [
            x13_ref_heading( '13d00003', '13<span>X</span>PLAY', 'x13-ref-logo', 38, 28, '#FFFFFF', 'div', 'left' ),
        ], [ 'css_classes' => 'x13-logo-col' ] ),
        x13_ref_col( '13d00004', 46, [
            x13_ref_text( '13d00005', '<p><a href="#home">HOME</a><a href="#benefits">WHY 13XPLAY</a><a href="#support">SUPPORT</a></p>', 'x13-ref-nav' ),
        ], [ 'css_classes' => 'x13-nav-col' ] ),
        x13_ref_col( '13d00006', 16, [
            x13_ref_text( '13d00007', '<p><strong>🛡 100% SECURE</strong><br><span>&amp; TRUSTED</span></p>', 'x13-ref-trust' ),
        ], [ 'css_classes' => 'x13-trust-col' ] ),
        x13_ref_col( '13d00008', 16, [
            x13_ref_button( '13d00009', 'WHATSAPP NOW', $wa, 'x13-ref-header-cta', 16 ),
        ], [ 'css_classes' => 'x13-header-btn-col' ] ),
    ], [
        'content_width' => [ 'unit' => 'px', 'size' => 1460, 'sizes' => [] ],
        'gap' => 'no',
        'background_background' => 'classic',
        'background_color' => '#020506',
        'padding' => x13_ref_dim( 16, 30, 16, 30 ),
        'padding_mobile' => x13_ref_dim( 10, 14, 10, 14 ),
        'css_classes' => 'x13-ref-header',
        'html_tag' => 'header',
    ] );

    $feature_row = x13_ref_section( '13d00020', [
        x13_ref_col( '13d00021', 25, [ x13_ref_iconbox( '13d00022', 'fas fa-bolt', 'INSTANT', 'WITHDRAWAL' ) ], [], true ),
        x13_ref_col( '13d00023', 25, [ x13_ref_iconbox( '13d00024', 'fas fa-headset', '24X7', 'CUSTOMER SUPPORT' ) ], [], true ),
        x13_ref_col( '13d00025', 25, [ x13_ref_iconbox( '13d00026', 'fas fa-shield-alt', 'SECURE', 'TRANSACTIONS' ) ], [], true ),
        x13_ref_col( '13d00027', 25, [ x13_ref_iconbox( '13d00028', 'fas fa-trophy', 'BEST ODDS', '& BIG WINS' ) ], [], true ),
    ], [ 'gap' => 'narrow', 'css_classes' => 'x13-feature-row' ], true );

    $offer_row = x13_ref_section( '13d00030', [
        x13_ref_col( '13d00031', 64, [
            x13_ref_text( '13d00032', '<div class="x13-id-card-inner"><div class="x13-id-icon">⚡</div><div><span>GET ID IN</span><strong>1 MIN</strong></div><div class="x13-speed">FAST</div></div>', 'x13-id-card' ),
        ], [ 'css_classes' => 'x13-id-col' ], true ),
        x13_ref_col( '13d00033', 36, [
            x13_ref_text( '13d00034', '<div class="x13-bonus-inner"><div class="x13-stars">★★★</div><strong>10%</strong><span>EXTRA</span><b>BONUS</b></div>', 'x13-bonus-card' ),
        ], [ 'css_classes' => 'x13-bonus-col' ], true ),
    ], [ 'gap' => 'narrow', 'css_classes' => 'x13-offer-row' ], true );

    $hero_left = x13_ref_col( '13d00011', 58, [
        x13_ref_text( '13d00012', '<p>≫&nbsp;&nbsp; WELCOME TO <strong>13XPLAY</strong> &nbsp;&nbsp;≪</p>', 'x13-kicker' ),
        x13_ref_heading( '13d00013', 'PLAY MORE<br><span>WIN MORE!</span>', 'x13-main-title', 82, 52, '#FFFFFF', 'h1', 'left' ),
        x13_ref_text( '13d00014', '<p>THE <strong>ULTIMATE</strong> GAMING EXPERIENCE</p>', 'x13-subtitle' ),
        x13_ref_widget( '13d00015', 'image', [
            'image' => [ 'url' => $cricket, 'id' => '' ],
            'image_size' => 'large',
            'css_classes' => 'x13-mobile-art',
        ] ),
        $feature_row,
        $offer_row,
        x13_ref_button( '13d00035', '☏  WHATSAPP NOW   ›', $wa, 'x13-main-whatsapp', 35, 'left' ),
        x13_ref_text( '13d00036', '<p>🔒 &nbsp;SAFE. SECURE. <strong>100% TRUSTED PLATFORM</strong></p>', 'x13-safe-note' ),
    ], [ 'vertical_align' => 'middle', 'css_classes' => 'x13-hero-left' ] );

    $hero_right = x13_ref_col( '13d00040', 42, [
        x13_ref_text( '13d00041', '<div class="x13-phone-shell"><div class="x13-phone-notch"></div><div class="x13-phone-brand">13<span>X</span>PLAY</div><small>FAST • SECURE • TRUSTED</small></div>', 'x13-phone-widget' ),
    ], [
        'vertical_align' => 'bottom',
        'background_background' => 'classic',
        'background_image' => [ 'url' => $cricket, 'id' => '' ],
        'background_position' => 'center center',
        'background_size' => 'cover',
        'background_repeat' => 'no-repeat',
        'css_classes' => 'x13-hero-right',
    ] );

    $hero = x13_ref_section( '13d00010', [ $hero_left, $hero_right ], [
        'content_width' => [ 'unit' => 'px', 'size' => 1460, 'sizes' => [] ],
        'gap' => 'no',
        'height' => 'min-height',
        'custom_height' => x13_ref_size( 820 ),
        'background_background' => 'classic',
        'background_image' => [ 'url' => $stadium, 'id' => '' ],
        'background_position' => 'center center',
        'background_size' => 'cover',
        'background_repeat' => 'no-repeat',
        'background_overlay_background' => 'classic',
        'background_overlay_color' => 'rgba(0,5,5,.76)',
        'padding' => x13_ref_dim( 50, 30, 42, 30 ),
        'padding_mobile' => x13_ref_dim( 28, 16, 30, 16 ),
        'css_classes' => 'x13-ref-hero',
        'html_tag' => 'main',
    ] );

    $benefits = x13_ref_section( '13d00050', [
        x13_ref_col( '13d00051', 20, [ x13_ref_iconbox( '13d00052', 'fas fa-user-plus', 'FAST REGISTRATION', 'Quick & Easy Process', 'x13-benefit-card' ) ] ),
        x13_ref_col( '13d00053', 20, [ x13_ref_iconbox( '13d00054', 'fas fa-bolt', 'LIGHTNING FAST ID', 'Get ID in Just 1 Minute', 'x13-benefit-card' ) ] ),
        x13_ref_col( '13d00055', 20, [ x13_ref_iconbox( '13d00056', 'fas fa-gift', 'EXCITING BONUSES', 'Get 10% Extra Bonus', 'x13-benefit-card' ) ] ),
        x13_ref_col( '13d00057', 20, [ x13_ref_iconbox( '13d00058', 'fas fa-shield-alt', 'FAIR PLAY', '100% Fair & Transparent', 'x13-benefit-card' ) ] ),
        x13_ref_col( '13d00059', 20, [ x13_ref_iconbox( '13d00060', 'fas fa-mobile-alt', 'PLAY ANYTIME', 'On Mobile & Desktop', 'x13-benefit-card' ) ] ),
    ], [
        'content_width' => [ 'unit' => 'px', 'size' => 1460, 'sizes' => [] ],
        'gap' => 'narrow',
        'background_background' => 'classic',
        'background_color' => '#03090A',
        'padding' => x13_ref_dim( 22, 28, 22, 28 ),
        'padding_mobile' => x13_ref_dim( 18, 14, 18, 14 ),
        'css_classes' => 'x13-benefit-strip',
        'html_tag' => 'section',
    ] );

    $support = x13_ref_section( '13d00070', [
        x13_ref_col( '13d00071', 70, [
            x13_ref_heading( '13d00072', 'READY TO START?', 'x13-support-title', 32, 27, '#FFFFFF', 'h2', 'left' ),
            x13_ref_text( '13d00073', '<p>Message us on WhatsApp and get your 13XPLAY ID in minutes.</p>', 'x13-support-copy', '#B7C3C0' ),
        ] ),
        x13_ref_col( '13d00074', 30, [
            x13_ref_button( '13d00075', 'WHATSAPP SUPPORT', $wa, 'x13-support-btn', 18 ),
        ], [ 'vertical_align' => 'middle' ] ),
    ], [
        'content_width' => [ 'unit' => 'px', 'size' => 1220, 'sizes' => [] ],
        'gap' => 'wide',
        'background_background' => 'gradient',
        'background_color' => '#06100B',
        'background_color_b' => '#020505',
        'background_gradient_type' => 'linear',
        'background_gradient_angle' => [ 'unit' => 'deg', 'size' => 90, 'sizes' => [] ],
        'padding' => x13_ref_dim( 42, 34, 42, 34 ),
        'padding_mobile' => x13_ref_dim( 30, 18, 30, 18 ),
        'css_classes' => 'x13-support-section',
        'html_tag' => 'section',
    ] );

    $footer = x13_ref_section( '13d00080', [
        x13_ref_col( '13d00081', 35, [
            x13_ref_heading( '13d00082', '13<span>X</span>PLAY', 'x13-footer-logo', 34, 28, '#FFFFFF', 'div', 'left' ),
            x13_ref_text( '13d00083', '<p>Fast ID. Secure support. Simple WhatsApp assistance.</p>', 'x13-footer-copy', '#8E9A97' ),
        ] ),
        x13_ref_col( '13d00084', 30, [
            x13_ref_text( '13d00085', '<p><strong>QUICK LINKS</strong><br><a href="#home">Home</a><br><a href="#benefits">Why 13XPLAY</a><br><a href="#support">Support</a></p>', 'x13-footer-links' ),
        ] ),
        x13_ref_col( '13d00086', 35, [
            x13_ref_text( '13d00087', '<p><strong>24X7 SUPPORT</strong><br>WhatsApp: +91 70588 20881</p>', 'x13-footer-support' ),
            x13_ref_button( '13d00088', 'CHAT ON WHATSAPP', $wa, 'x13-footer-btn', 16, 'left' ),
        ] ),
    ], [
        'content_width' => [ 'unit' => 'px', 'size' => 1220, 'sizes' => [] ],
        'gap' => 'wide',
        'background_background' => 'classic',
        'background_color' => '#010303',
        'padding' => x13_ref_dim( 48, 30, 28, 30 ),
        'padding_mobile' => x13_ref_dim( 34, 18, 22, 18 ),
        'css_classes' => 'x13-ref-footer',
        'html_tag' => 'footer',
    ] );

    $copyright = x13_ref_section( '13d00090', [
        x13_ref_col( '13d00091', 100, [
            x13_ref_text( '13d00092', '<p>© 2026 13XPLAY. All rights reserved.</p>', 'x13-copyright', '#65716E' ),
        ] ),
    ], [
        'content_width' => [ 'unit' => 'px', 'size' => 1220, 'sizes' => [] ],
        'background_background' => 'classic',
        'background_color' => '#010303',
        'padding' => x13_ref_dim( 10, 30, 20, 30 ),
        'padding_mobile' => x13_ref_dim( 8, 18, 18, 18 ),
        'css_classes' => 'x13-ref-copyright',
    ] );

    $css = <<<'CSS'
<style id="x13-ref-inline-style">
html{scroll-behavior:smooth;background:#010303}body.elementor-page-28{margin:0!important;background:#010303!important;overflow-x:hidden}.elementor-28{background:#010303;color:#fff}.elementor-28 *{box-sizing:border-box}.elementor-28 a{text-decoration:none}.x13-ref-header{position:sticky!important;top:0;z-index:99;border-bottom:1px solid rgba(35,245,104,.23);box-shadow:0 8px 30px rgba(0,0,0,.32)}.x13-ref-header>.elementor-container{align-items:center}.x13-ref-logo .elementor-heading-title,.x13-footer-logo .elementor-heading-title{font-family:Arial Black,Impact,Arial,sans-serif!important;font-style:italic!important;font-weight:900!important;letter-spacing:-2px!important;text-shadow:0 0 25px rgba(40,255,111,.15)}.x13-ref-logo .elementor-heading-title span,.x13-footer-logo .elementor-heading-title span{color:#28F268}.x13-ref-nav p{margin:0;display:flex;justify-content:center;gap:34px;align-items:center}.x13-ref-nav a{color:#fff!important;font:700 13px/1 Arial,sans-serif;letter-spacing:.2px;transition:.2s}.x13-ref-nav a:first-child,.x13-ref-nav a:hover{color:#2AF36B!important}.x13-ref-trust p{margin:0;text-align:center;font:700 12px/1.35 Arial,sans-serif;color:#dfe7e5}.x13-ref-trust strong{color:#2AF36B}.x13-ref-trust span{color:#a8b2af}.x13-ref-header-cta .elementor-button{width:100%;border:1px solid #2AF36B!important;background:rgba(4,20,9,.62)!important;box-shadow:0 0 18px rgba(42,243,107,.13)}.x13-ref-hero{position:relative;overflow:hidden}.x13-ref-hero:before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 76% 46%,rgba(41,244,105,.22),transparent 27%),linear-gradient(90deg,rgba(0,3,3,.97) 0%,rgba(0,3,3,.90) 44%,rgba(0,3,3,.46) 72%,rgba(0,3,3,.72) 100%);pointer-events:none;z-index:0}.x13-ref-hero>.elementor-container{position:relative;z-index:1}.x13-hero-left{padding-right:28px}.x13-kicker p{margin:0 0 12px;font:700 15px/1.4 Arial,sans-serif;letter-spacing:.7px;color:#fff}.x13-kicker strong{color:#2CF56C}.x13-main-title .elementor-heading-title{font-family:Impact,Arial Black,Arial,sans-serif!important;font-style:italic!important;font-weight:900!important;letter-spacing:-1px!important;line-height:.95!important;text-transform:uppercase;text-shadow:0 10px 40px rgba(0,0,0,.55)}.x13-main-title .elementor-heading-title span{color:#35F05F;text-shadow:0 0 24px rgba(53,240,95,.2)}.x13-subtitle p{margin:10px 0 18px;font:700 23px/1.25 Arial,sans-serif;color:#fff;letter-spacing:.3px}.x13-subtitle strong{color:#2AF36B}.x13-mobile-art{display:none}.x13-feature-row{margin-top:8px}.x13-feature-row>.elementor-container{gap:10px}.x13-feature-card>.elementor-widget-container{height:100%;min-height:78px;padding:14px 14px;border:1px solid rgba(42,243,107,.42);border-radius:13px;background:linear-gradient(180deg,rgba(3,15,8,.82),rgba(1,8,5,.62));box-shadow:inset 0 0 20px rgba(42,243,107,.04)}.x13-feature-card .elementor-icon-box-wrapper{align-items:center}.x13-feature-card .elementor-icon-box-icon{margin-right:10px!important;margin-bottom:0!important}.x13-feature-card .elementor-icon{color:#2AF36B!important}.x13-feature-card .elementor-icon-box-title{margin:0 0 3px!important}.x13-feature-card .elementor-icon-box-description{margin:0!important;line-height:1.2!important}.x13-offer-row{margin-top:16px}.x13-offer-row>.elementor-container{gap:16px;align-items:stretch}.x13-id-card>.elementor-widget-container{height:100%;min-height:135px;padding:16px 20px;border:1px solid rgba(70,255,114,.7);border-radius:19px;background:linear-gradient(120deg,rgba(10,35,17,.95),rgba(1,8,4,.90));box-shadow:0 0 30px rgba(25,240,80,.12)}.x13-id-card-inner{height:100%;display:flex;align-items:center;gap:17px;color:#fff;font-family:Arial,sans-serif}.x13-id-icon{width:62px;height:62px;border-radius:50%;display:grid;place-items:center;background:radial-gradient(circle,#57ff82,#14bd45 65%,#052f13);color:#07170b;font-size:28px;font-weight:900;box-shadow:0 0 28px rgba(39,244,102,.32);flex:0 0 auto}.x13-id-card-inner span{display:block;font:900 28px/1 Arial Black,Arial,sans-serif;font-style:italic}.x13-id-card-inner strong{display:block;color:#84ff22;font:900 47px/.95 Arial Black,Arial,sans-serif;font-style:italic;letter-spacing:-2px}.x13-speed{margin-left:auto;width:64px;height:64px;border:6px dashed #caff36;border-radius:50%;display:grid;place-items:center;color:#caff36;font:900 13px Arial,sans-serif;transform:rotate(-9deg)}.x13-bonus-card>.elementor-widget-container{height:100%;min-height:135px;display:grid;place-items:center;padding:12px;border:1px solid rgba(255,214,51,.62);border-radius:19px;background:radial-gradient(circle at 50% 38%,rgba(255,214,60,.18),rgba(6,9,3,.92) 65%);box-shadow:0 0 30px rgba(255,209,55,.10)}.x13-bonus-inner{text-align:center;font-family:Arial Black,Arial,sans-serif;color:#ffd337;line-height:.92}.x13-stars{font-size:11px;letter-spacing:3px}.x13-bonus-inner strong{display:block;font-size:55px;text-shadow:0 0 20px rgba(255,210,43,.2)}.x13-bonus-inner span{display:block;font-size:18px}.x13-bonus-inner b{display:inline-block;margin-top:4px;padding:5px 17px;border-radius:999px;background:linear-gradient(#26dc57,#087f2d);color:#fff;font-size:17px;transform:rotate(-3deg);box-shadow:0 6px 15px rgba(23,218,83,.22)}.x13-main-whatsapp{margin-top:17px}.x13-main-whatsapp .elementor-button{width:min(100%,700px)!important;border:2px solid #baff8d!important;border-radius:23px!important;background:linear-gradient(180deg,#1FDF3D,#049E26)!important;box-shadow:0 0 14px #45ff66,0 0 32px rgba(69,255,102,.43),inset 0 0 18px rgba(255,255,255,.18)!important;text-shadow:0 3px 4px rgba(0,0,0,.25);letter-spacing:-1px;transition:.2s}.x13-main-whatsapp .elementor-button:hover{transform:translateY(-2px) scale(1.01)}.x13-safe-note p{margin:13px 0 0;text-align:center;max-width:700px;color:#b5c0bd;font:600 12px/1.4 Arial,sans-serif}.x13-safe-note strong{color:#2AF36B}.x13-hero-right{min-height:690px;border-radius:28px 0 0 28px;overflow:hidden;position:relative;box-shadow:inset 0 0 80px rgba(0,0,0,.62),0 0 50px rgba(40,255,100,.06);filter:contrast(1.07) saturate(.84)}.x13-hero-right:before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,rgba(0,4,3,.85),rgba(0,4,3,.06) 35%,rgba(5,20,10,.08)),linear-gradient(180deg,rgba(0,0,0,.05),rgba(0,4,1,.56));z-index:1;pointer-events:none}.x13-hero-right>.elementor-widget-wrap{position:relative;z-index:2;align-content:flex-end!important;padding:0 34px 40px}.x13-phone-widget>.elementor-widget-container{display:flex;justify-content:flex-end}.x13-phone-shell{width:245px;height:390px;border:6px solid #121b19;border-radius:33px;background:linear-gradient(145deg,#06100e,#010303 63%,#0e251a);box-shadow:0 0 0 2px rgba(255,255,255,.14),0 0 36px rgba(32,242,100,.22);transform:rotate(9deg);display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;font-family:Arial Black,Arial,sans-serif;position:relative;overflow:hidden}.x13-phone-shell:after{content:"";position:absolute;inset:22% -50% auto;height:2px;background:#20ef66;box-shadow:0 0 20px #20ef66;transform:rotate(-22deg)}.x13-phone-notch{position:absolute;top:11px;width:86px;height:13px;border-radius:9px;background:#111}.x13-phone-brand{font-size:30px;font-style:italic;letter-spacing:-2px}.x13-phone-brand span{color:#2AF36B}.x13-phone-shell small{margin-top:8px;font:700 9px Arial,sans-serif;color:#8ea59e;letter-spacing:1.2px}.x13-benefit-strip{border-top:1px solid rgba(42,243,107,.17);border-bottom:1px solid rgba(42,243,107,.17)}.x13-benefit-strip>.elementor-container{align-items:stretch}.x13-benefit-strip .x13-feature-card>.elementor-widget-container{border:0;border-right:1px solid rgba(255,255,255,.10);border-radius:0;background:transparent;box-shadow:none;min-height:68px}.x13-benefit-strip .elementor-column:last-child .x13-feature-card>.elementor-widget-container{border-right:0}.x13-support-section{border-top:1px solid rgba(42,243,107,.14);border-bottom:1px solid rgba(42,243,107,.14)}.x13-support-title .elementor-heading-title{font-family:Arial Black,Arial,sans-serif!important}.x13-support-copy p{margin:6px 0 0;font:500 15px/1.6 Arial,sans-serif}.x13-support-btn .elementor-button,.x13-footer-btn .elementor-button{border:1px solid #2AF36B!important;background:rgba(4,20,9,.70)!important;box-shadow:0 0 22px rgba(42,243,107,.10)}.x13-ref-footer{border-top:1px solid rgba(255,255,255,.06)}.x13-footer-copy p,.x13-footer-support p,.x13-footer-links p{font:500 14px/1.8 Arial,sans-serif;margin:0;color:#96a19e}.x13-footer-links strong,.x13-footer-support strong{color:#fff;font-weight:800}.x13-footer-links a{color:#96a19e!important}.x13-footer-links a:hover{color:#2AF36B!important}.x13-copyright p{margin:0;text-align:center;font:500 12px Arial,sans-serif}.x13-ref-hero,.x13-benefit-strip,.x13-support-section,.x13-ref-footer,.x13-ref-copyright{scroll-margin-top:85px}
@media(max-width:1024px){.x13-ref-nav p{gap:16px}.x13-ref-nav a{font-size:11px}.x13-ref-trust{display:none}.x13-trust-col{display:none!important}.x13-logo-col{width:25%!important}.x13-nav-col{width:50%!important}.x13-header-btn-col{width:25%!important}.x13-main-title .elementor-heading-title{font-size:63px!important}.x13-subtitle p{font-size:18px}.x13-feature-row>.elementor-container{flex-wrap:wrap}.x13-feature-row .elementor-column{width:50%!important}.x13-offer-row>.elementor-container{flex-wrap:wrap}.x13-offer-row .elementor-column{width:100%!important}.x13-hero-right{min-height:620px}.x13-benefit-strip>.elementor-container{flex-wrap:wrap}.x13-benefit-strip .elementor-column{width:33.333%!important}}
@media(max-width:767px){.x13-ref-header{position:relative!important}.x13-ref-header>.elementor-container{display:flex!important;flex-wrap:nowrap!important}.x13-logo-col{width:54%!important}.x13-header-btn-col{width:46%!important}.x13-nav-col,.x13-trust-col{display:none!important}.x13-ref-logo .elementor-heading-title{font-size:28px!important}.x13-ref-header-cta .elementor-button{font-size:12px!important;padding:12px 10px!important}.x13-ref-hero{min-height:auto!important}.x13-ref-hero:before{background:linear-gradient(180deg,rgba(0,4,3,.88),rgba(0,4,3,.80) 55%,rgba(0,4,3,.96)),radial-gradient(circle at 70% 24%,rgba(42,243,107,.13),transparent 28%)}.x13-ref-hero>.elementor-container{display:block!important}.x13-hero-left,.x13-hero-right{width:100%!important}.x13-hero-left{padding-right:0}.x13-kicker p{text-align:center;font-size:12px}.x13-main-title .elementor-heading-title{text-align:center!important;font-size:52px!important;line-height:.93!important}.x13-subtitle p{text-align:center;font-size:16px;margin-top:8px}.x13-mobile-art{display:block!important;margin:12px 0 18px}.x13-mobile-art img{display:block;width:100%;height:330px;object-fit:cover;object-position:center 44%;border-radius:22px;filter:contrast(1.12) saturate(.8);box-shadow:0 0 35px rgba(34,243,102,.11)}.x13-hero-right{display:none!important}.x13-feature-row>.elementor-container{display:flex!important;flex-wrap:wrap!important}.x13-feature-row .elementor-column{width:50%!important;padding:4px}.x13-feature-card>.elementor-widget-container{min-height:87px;padding:12px 9px}.x13-feature-card .elementor-icon-box-wrapper{display:block;text-align:center}.x13-feature-card .elementor-icon-box-icon{margin:0 0 5px!important}.x13-feature-card .elementor-icon-box-title{font-size:11px!important}.x13-feature-card .elementor-icon-box-description{font-size:9px!important}.x13-offer-row>.elementor-container{display:block!important}.x13-offer-row .elementor-column{width:100%!important}.x13-id-card>.elementor-widget-container{min-height:112px;padding:13px 14px}.x13-id-icon{width:52px;height:52px;font-size:22px}.x13-id-card-inner{gap:11px}.x13-id-card-inner span{font-size:20px}.x13-id-card-inner strong{font-size:39px}.x13-speed{width:54px;height:54px;font-size:10px;border-width:5px}.x13-bonus-card{margin-top:12px}.x13-bonus-card>.elementor-widget-container{min-height:160px}.x13-bonus-inner strong{font-size:67px}.x13-main-whatsapp .elementor-button{width:100%!important;font-size:24px!important;border-radius:18px!important;padding:18px 12px!important}.x13-safe-note p{font-size:10px}.x13-benefit-strip>.elementor-container{display:flex!important;flex-wrap:wrap!important}.x13-benefit-strip .elementor-column{width:50%!important}.x13-benefit-strip .elementor-column:last-child{width:100%!important}.x13-benefit-strip .x13-feature-card>.elementor-widget-container{border:0!important;min-height:76px}.x13-support-section>.elementor-container,.x13-ref-footer>.elementor-container{display:block!important}.x13-support-section .elementor-column,.x13-ref-footer .elementor-column{width:100%!important}.x13-support-title .elementor-heading-title{text-align:center!important}.x13-support-copy p{text-align:center}.x13-support-btn{margin-top:18px}.x13-support-btn .elementor-button{width:100%}.x13-ref-footer .elementor-column{margin-bottom:24px}.x13-footer-logo .elementor-heading-title{text-align:center!important}.x13-footer-copy p,.x13-footer-links p,.x13-footer-support p{text-align:center}.x13-footer-btn .elementor-button-wrapper{text-align:center!important}.x13-copyright p{font-size:10px}}
</style>
CSS;

    $style_widget = x13_ref_widget( '13d00099', 'html', [ 'html' => $css, 'css_classes' => 'x13-style-widget' ] );

    $data = [ $style_widget, $header, $hero, $benefits, $support, $footer, $copyright ];

    update_post_meta( $home_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $home_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $home_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '4.2.2' );
    update_post_meta( $home_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
    update_post_meta( $home_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );
    update_post_meta( $home_id, '_wp_page_template', 'elementor_canvas' );
    update_post_meta( $home_id, '_x13_layout_version', 'reference-layout-v1' );

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

    wp_send_json( [
        'ok' => true,
        'post_id' => $home_id,
        'title' => get_the_title( $home_id ),
        'status' => get_post_status( $home_id ),
        'template' => get_post_meta( $home_id, '_wp_page_template', true ),
        'layout_version' => get_post_meta( $home_id, '_x13_layout_version', true ),
        'root_elements' => is_array( $decoded ) ? count( $decoded ) : 0,
        'root_ids' => is_array( $decoded ) ? array_values( array_map( function( $el ) { return isset( $el['id'] ) ? $el['id'] : ''; }, $decoded ) ) : [],
        'edit_mode' => get_post_meta( $home_id, '_elementor_edit_mode', true ),
        'elementor_version' => get_post_meta( $home_id, '_elementor_version', true ),
    ] );
}, 1 );
