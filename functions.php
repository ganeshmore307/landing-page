<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'X13PLAY_THEME_VERSION', '2.0.0' );

function x13play_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'x13play_theme_setup' );

function x13play_enqueue_theme_styles() {
    wp_enqueue_style( 'nuts-parent-style', get_template_directory_uri() . '/style.css', [], null );
    wp_enqueue_style( '13xplay-child-style', get_stylesheet_uri(), [ 'nuts-parent-style' ], X13PLAY_THEME_VERSION );
    if ( is_front_page() ) {
        wp_enqueue_style( '13xplay-landing', get_stylesheet_directory_uri() . '/assets/landing.css', [ '13xplay-child-style' ], X13PLAY_THEME_VERSION );
    }
}
add_action( 'wp_enqueue_scripts', 'x13play_enqueue_theme_styles', 20 );

function x13play_defaults() {
    return [
        'logo_url'          => '',
        'hero_image_url'    => 'https://images.pexels.com/photos/12732254/pexels-photo-12732254.jpeg?auto=compress&cs=tinysrgb&w=1200',
        'eyebrow'           => 'WELCOME TO 13XPLAY',
        'headline'          => 'Play Big. Win Bigger.',
        'offer_prefix'      => 'GET',
        'offer_value'       => '10%',
        'offer_suffix'      => 'EXTRA',
        'subheadline'       => 'Get Your 13XPLAY ID Instantly',
        'benefits'          => 'Fast • Simple • 24/7 Assistance',
        'whatsapp_number'   => '917058820881',
        'whatsapp_message'  => 'Hi 13Xplay, I want to get my ID and know about the 10% extra offer.',
        'whatsapp_text'     => 'WHATSAPP NOW',
        'get_id_text'       => 'GET ID',
        'trust_1_title'     => 'SAFE & SECURE',
        'trust_1_text'      => 'Clear support-led setup',
        'trust_2_title'     => '24/7 SUPPORT',
        'trust_2_text'      => 'Assistance when you need it',
        'trust_3_title'     => 'QUICK ID',
        'trust_3_text'      => 'Fast account assistance',
        'trust_4_title'     => 'BEST SERVICE',
        'trust_4_text'      => 'Customer-focused support',
        'step_1_title'      => 'WHATSAPP US',
        'step_1_text'       => 'Message us on WhatsApp for quick assistance.',
        'step_2_title'      => 'GET ID',
        'step_2_text'       => 'Receive your 13XPLAY ID from our support team.',
        'step_3_title'      => 'GET STARTED',
        'step_3_text'       => 'Use your ID and continue from your phone.',
        'footer_note'       => '18+ only • Play responsibly • Terms apply • Availability may vary by jurisdiction.',
    ];
}

function x13play_get_settings() {
    return wp_parse_args( (array) get_option( 'x13play_settings', [] ), x13play_defaults() );
}

function x13play_register_settings() {
    register_setting( 'x13play_settings_group', 'x13play_settings', [
        'type'              => 'array',
        'sanitize_callback' => 'x13play_sanitize_settings',
        'default'           => x13play_defaults(),
    ] );
}
add_action( 'admin_init', 'x13play_register_settings' );

function x13play_sanitize_settings( $input ) {
    $defaults = x13play_defaults();
    $clean = [];
    foreach ( $defaults as $key => $default ) {
        $value = isset( $input[ $key ] ) ? $input[ $key ] : $default;
        if ( in_array( $key, [ 'logo_url', 'hero_image_url' ], true ) ) {
            $clean[ $key ] = esc_url_raw( $value );
        } elseif ( 'whatsapp_number' === $key ) {
            $clean[ $key ] = preg_replace( '/\D+/', '', (string) $value );
        } elseif ( 'whatsapp_message' === $key || false !== strpos( $key, '_text' ) || 'footer_note' === $key ) {
            $clean[ $key ] = sanitize_textarea_field( $value );
        } else {
            $clean[ $key ] = sanitize_text_field( $value );
        }
    }
    return $clean;
}

function x13play_settings_menu() {
    add_theme_page(
        '13Xplay Settings',
        '13Xplay Settings',
        'edit_theme_options',
        '13xplay-settings',
        'x13play_render_settings_page'
    );
}
add_action( 'admin_menu', 'x13play_settings_menu' );

function x13play_render_settings_page() {
    if ( ! current_user_can( 'edit_theme_options' ) ) { return; }
    $s = x13play_get_settings();
    $fields = [
        'logo_url' => 'Logo URL',
        'hero_image_url' => 'Hero Image URL',
        'eyebrow' => 'Small Label',
        'headline' => 'Headline',
        'offer_prefix' => 'Offer Prefix',
        'offer_value' => 'Offer Value',
        'offer_suffix' => 'Offer Suffix',
        'subheadline' => 'Supporting Line',
        'benefits' => 'Benefits Line',
        'whatsapp_number' => 'WhatsApp Number (country code + number)',
        'whatsapp_message' => 'WhatsApp Prefilled Message',
        'whatsapp_text' => 'WhatsApp Button Text',
        'get_id_text' => 'Get ID Button Text',
        'trust_1_title' => 'Trust 1 Title', 'trust_1_text' => 'Trust 1 Text',
        'trust_2_title' => 'Trust 2 Title', 'trust_2_text' => 'Trust 2 Text',
        'trust_3_title' => 'Trust 3 Title', 'trust_3_text' => 'Trust 3 Text',
        'trust_4_title' => 'Trust 4 Title', 'trust_4_text' => 'Trust 4 Text',
        'step_1_title' => 'Step 1 Title', 'step_1_text' => 'Step 1 Text',
        'step_2_title' => 'Step 2 Title', 'step_2_text' => 'Step 2 Text',
        'step_3_title' => 'Step 3 Title', 'step_3_text' => 'Step 3 Text',
        'footer_note' => 'Footer Note',
    ];
    ?>
    <div class="wrap">
        <h1>13Xplay Landing Page Settings</h1>
        <p>Edit the live Home page content here. No Elementor widget is used.</p>
        <form method="post" action="options.php">
            <?php settings_fields( 'x13play_settings_group' ); ?>
            <table class="form-table" role="presentation">
                <?php foreach ( $fields as $key => $label ) : ?>
                <tr>
                    <th scope="row"><label for="x13-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label></th>
                    <td>
                        <?php if ( in_array( $key, [ 'whatsapp_message', 'footer_note', 'trust_1_text', 'trust_2_text', 'trust_3_text', 'trust_4_text', 'step_1_text', 'step_2_text', 'step_3_text' ], true ) ) : ?>
                            <textarea class="large-text" rows="3" id="x13-<?php echo esc_attr( $key ); ?>" name="x13play_settings[<?php echo esc_attr( $key ); ?>]"><?php echo esc_textarea( $s[ $key ] ); ?></textarea>
                        <?php else : ?>
                            <input class="regular-text" type="text" id="x13-<?php echo esc_attr( $key ); ?>" name="x13play_settings[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $s[ $key ] ); ?>">
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php submit_button( 'Save 13Xplay Settings' ); ?>
        </form>
    </div>
    <?php
}

function x13play_ensure_front_page() {
    $front_id = (int) get_option( 'page_on_front' );
    if ( $front_id ) { return; }
    $page = get_page_by_path( 'home' );
    if ( $page instanceof WP_Post ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', (int) $page->ID );
    }
}
add_action( 'after_switch_theme', 'x13play_ensure_front_page' );
