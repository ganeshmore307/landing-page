<?php
/**
 * 13XPlay Privacy Policy — controlled Elementor page.
 * Keeps the layout fixed/clean while exposing safe content and style controls.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function x13_privacy_default_content() {
    return '<p>At 13XPlay, we respect your privacy and are committed to protecting the personal information that you share with us.</p>\n'
        . '<p>This Privacy Policy explains how information may be collected, used, stored, protected and shared when you visit our website, interact with our advertisements, contact us through WhatsApp, or use any services offered by 13XPlay.</p>\n'
        . '<p>By accessing or using our website or contacting us through the available communication channels, you acknowledge the practices described in this Privacy Policy.</p>\n'
        . '<h2>1. About 13XPlay</h2>\n'
        . '<p>13XPlay is an online gaming platform providing users with access to gaming-related services, assistance and customer support.</p>\n'
        . '<p>Our website may provide information about our services and allow visitors to contact our support team through WhatsApp or other communication channels.</p>';
}

/* Register one controlled Elementor widget for the complete Privacy Policy page. */
add_action( 'elementor/widgets/register', function( $widgets_manager ) {
    if ( ! class_exists( '\\Elementor\\Widget_Base' ) ) { return; }

    if ( class_exists( 'X13Play_Privacy_Policy_Widget' ) ) { return; }

    class X13Play_Privacy_Policy_Widget extends \Elementor\Widget_Base {
        public function get_name() { return 'x13play_privacy_policy'; }
        public function get_title() { return '13XPlay Privacy Policy'; }
        public function get_icon() { return 'eicon-document-file'; }
        public function get_categories() { return [ 'general' ]; }
        public function get_keywords() { return [ '13xplay', 'privacy', 'policy', 'legal' ]; }

        protected function register_controls() {
            $asset_base = home_url( '/wp-content/uploads/13xplay-assets/' );

            $this->start_controls_section( 'brand_section', [ 'label' => 'Header & Branding' ] );
            $this->add_control( 'logo_image', [
                'label' => '13XPlay Logo',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => $asset_base . '13xplay-logo.webp' ],
            ] );
            $this->add_control( 'kicker', [
                'label' => 'Small label',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '13XPLAY',
                'label_block' => true,
            ] );
            $this->add_control( 'page_title', [
                'label' => 'Page title',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Privacy Policy',
                'label_block' => true,
            ] );
            $this->add_control( 'back_text', [
                'label' => 'Back button text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'BACK TO HOME',
            ] );
            $this->add_control( 'back_url', [
                'label' => 'Back button link',
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => home_url( '/' ) ],
                'show_external' => false,
            ] );
            $this->end_controls_section();

            $this->start_controls_section( 'content_section', [ 'label' => 'Privacy Policy Content' ] );
            $this->add_control( 'policy_content', [
                'label' => 'Policy text',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => x13_privacy_default_content(),
            ] );
            $this->end_controls_section();

            $this->start_controls_section( 'footer_section', [ 'label' => 'Footer' ] );
            $this->add_control( 'footer_text', [
                'label' => 'Footer text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '© 2026 13XPLAY. All rights reserved.',
                'label_block' => true,
            ] );
            $this->end_controls_section();

            $this->start_controls_section( 'style_section', [
                'label' => 'Colors & Formatting',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ] );
            $this->add_control( 'accent', [
                'label' => 'Accent green',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#16F06A',
            ] );
            $this->add_control( 'background', [
                'label' => 'Page background',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#020707',
            ] );
            $this->add_control( 'card_background', [
                'label' => 'Content card background',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#04120E',
            ] );
            $this->add_control( 'body_color', [
                'label' => 'Body text color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#D4DFDB',
            ] );
            $this->add_control( 'title_size', [
                'label' => 'Desktop title size',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [ 'px' => [ 'min' => 30, 'max' => 64 ] ],
                'default' => [ 'unit' => 'px', 'size' => 44 ],
            ] );
            $this->end_controls_section();
        }

        protected function render() {
            $s = $this->get_settings_for_display();
            $logo = ! empty( $s['logo_image']['url'] ) ? $s['logo_image']['url'] : '';
            $back = ! empty( $s['back_url']['url'] ) ? $s['back_url']['url'] : home_url( '/' );
            $accent = ! empty( $s['accent'] ) ? $s['accent'] : '#16F06A';
            $bg = ! empty( $s['background'] ) ? $s['background'] : '#020707';
            $card = ! empty( $s['card_background'] ) ? $s['card_background'] : '#04120E';
            $body = ! empty( $s['body_color'] ) ? $s['body_color'] : '#D4DFDB';
            $title_size = isset( $s['title_size']['size'] ) ? (int) $s['title_size']['size'] : 44;
            ?>
            <div class="x13p-elementor" style="--x13p-accent:<?php echo esc_attr( $accent ); ?>;--x13p-bg:<?php echo esc_attr( $bg ); ?>;--x13p-card:<?php echo esc_attr( $card ); ?>;--x13p-body:<?php echo esc_attr( $body ); ?>;--x13p-title:<?php echo esc_attr( $title_size ); ?>px;">
                <header class="x13p-header">
                    <div class="x13p-shell x13p-headrow">
                        <a class="x13p-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php if ( $logo ) : ?><img class="x13p-logo" src="<?php echo esc_url( $logo ); ?>" alt="13XPlay"><?php else : ?><strong>13XPLAY</strong><?php endif; ?>
                        </a>
                        <a class="x13p-home" href="<?php echo esc_url( $back ); ?>"><?php echo esc_html( $s['back_text'] ); ?></a>
                    </div>
                </header>

                <main class="x13p-main">
                    <div class="x13p-shell">
                        <article class="x13p-card">
                            <div class="x13p-kicker"><?php echo esc_html( $s['kicker'] ); ?></div>
                            <h1><?php echo esc_html( $s['page_title'] ); ?></h1>
                            <div class="x13p-content"><?php echo wp_kses_post( $s['policy_content'] ); ?></div>
                        </article>
                    </div>
                </main>

                <footer class="x13p-footer"><?php echo esc_html( $s['footer_text'] ); ?></footer>
            </div>

            <style>
            .x13p-elementor{width:100%;min-height:100vh;margin:0;background:var(--x13p-bg);color:#eef6f3;font-family:Arial,Helvetica,sans-serif;overflow:hidden}.x13p-elementor *{box-sizing:border-box}.x13p-elementor a{text-decoration:none}.x13p-shell{width:min(calc(100% - 40px),1100px);margin:0 auto}.x13p-header{background:#010303;border-bottom:1px solid color-mix(in srgb,var(--x13p-accent) 35%,transparent)}.x13p-headrow{min-height:84px;display:flex;align-items:center;justify-content:space-between;gap:24px}.x13p-logo{width:210px;max-width:48vw;height:auto;display:block}.x13p-brand strong{font-size:28px;color:#fff}.x13p-home{color:#fff;border:1px solid var(--x13p-accent);border-radius:12px;padding:12px 18px;font-weight:800;font-size:14px;transition:.2s ease}.x13p-home:hover{background:var(--x13p-accent);color:#031008}.x13p-main{padding:58px 0 72px;background:radial-gradient(circle at 80% 10%,color-mix(in srgb,var(--x13p-accent) 8%,transparent),transparent 30%),var(--x13p-bg)}.x13p-card{background:linear-gradient(145deg,color-mix(in srgb,var(--x13p-card) 96%,#000),color-mix(in srgb,var(--x13p-card) 78%,#000));border:1px solid color-mix(in srgb,var(--x13p-accent) 28%,transparent);border-radius:24px;padding:44px 48px;box-shadow:0 18px 50px rgba(0,0,0,.28)}.x13p-kicker{color:var(--x13p-accent);font-size:13px;font-weight:900;letter-spacing:1.4px;text-transform:uppercase;margin-bottom:10px}.x13p-card h1{margin:0 0 28px;font-size:var(--x13p-title);line-height:1.08;color:#fff}.x13p-content{font-size:17px;line-height:1.8;color:var(--x13p-body)}.x13p-content p{margin:0 0 22px}.x13p-content h2{margin:38px 0 14px;color:#fff;font-size:27px;line-height:1.25}.x13p-footer{border-top:1px solid color-mix(in srgb,var(--x13p-accent) 18%,transparent);background:#010303;color:#75817d;text-align:center;padding:22px 20px;font-size:13px}.elementor-editor-active .x13p-elementor{min-height:700px}
            @media(max-width:767px){.x13p-shell{width:min(calc(100% - 24px),1100px)}.x13p-headrow{min-height:68px}.x13p-logo{width:145px}.x13p-home{padding:9px 12px;font-size:12px}.x13p-main{padding:28px 0 48px}.x13p-card{padding:28px 22px;border-radius:18px}.x13p-card h1{font-size:32px;margin-bottom:22px}.x13p-content{font-size:15.5px;line-height:1.72}.x13p-content h2{font-size:23px;margin-top:30px}.x13p-footer{padding-bottom:86px}}
            </style>
            <?php
        }
    }

    $widgets_manager->register( new X13Play_Privacy_Policy_Widget() );
} );

/* Ensure the WordPress page exists and seed Elementor exactly once. */
add_action( 'init', function() {
    $slug = 'privacy-policy';
    $content = x13_privacy_default_content();
    $page = get_page_by_path( $slug, OBJECT, 'page' );
    $needs_flush = false;

    if ( ! $page ) {
        $page_id = wp_insert_post( [
            'post_title'   => 'Privacy Policy',
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => $content,
        ] );
        if ( is_wp_error( $page_id ) || ! $page_id ) { return; }
        $page = get_post( $page_id );
        $needs_flush = true;
    } else {
        $page_id = (int) $page->ID;
        if ( 'publish' !== $page->post_status || $slug !== $page->post_name ) {
            wp_update_post( [ 'ID' => $page_id, 'post_status' => 'publish', 'post_name' => $slug ] );
            $needs_flush = true;
        }
    }

    update_option( 'wp_page_for_privacy_policy', $page_id );

    if ( 'elementor-v1' !== get_post_meta( $page_id, '_x13_privacy_layout_version', true ) ) {
        $settings = [
            'logo_image' => [ 'url' => home_url( '/wp-content/uploads/13xplay-assets/13xplay-logo.webp' ), 'id' => '' ],
            'kicker' => '13XPLAY',
            'page_title' => 'Privacy Policy',
            'back_text' => 'BACK TO HOME',
            'back_url' => [ 'url' => home_url( '/' ) ],
            'policy_content' => $content,
            'footer_text' => '© 2026 13XPLAY. All rights reserved.',
            'accent' => '#16F06A',
            'background' => '#020707',
            'card_background' => '#04120E',
            'body_color' => '#D4DFDB',
            'title_size' => [ 'unit' => 'px', 'size' => 44, 'sizes' => [] ],
        ];

        $data = [
            [
                'id' => '13xpriv1',
                'elType' => 'section',
                'isInner' => false,
                'settings' => [
                    'gap' => 'no',
                    'layout' => 'full_width',
                    'content_width' => [ 'unit' => 'px', 'size' => 1600, 'sizes' => [] ],
                    'padding' => [ 'unit'=>'px','top'=>'0','right'=>'0','bottom'=>'0','left'=>'0','isLinked'=>true ],
                ],
                'elements' => [
                    [
                        'id' => '13xpriv2',
                        'elType' => 'column',
                        'isInner' => false,
                        'settings' => [
                            '_column_size' => 100,
                            '_inline_size' => 100,
                            'padding' => [ 'unit'=>'px','top'=>'0','right'=>'0','bottom'=>'0','left'=>'0','isLinked'=>true ],
                        ],
                        'elements' => [
                            [
                                'id' => '13xpriv3',
                                'elType' => 'widget',
                                'widgetType' => 'x13play_privacy_policy',
                                'isInner' => false,
                                'settings' => $settings,
                                'elements' => [],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
        update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
        update_post_meta( $page_id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '4.2.2' );
        update_post_meta( $page_id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
        update_post_meta( $page_id, '_elementor_page_settings', [ 'hide_title' => 'yes' ] );
        update_post_meta( $page_id, '_wp_page_template', 'elementor_canvas' );
        update_post_meta( $page_id, '_x13_privacy_layout_version', 'elementor-v1' );
        delete_post_meta( $page_id, '_elementor_css' );
        delete_post_meta( $page_id, '_elementor_element_cache' );
        delete_post_meta( $page_id, '_elementor_page_assets' );
        clean_post_cache( $page_id );
        $needs_flush = true;

        if ( class_exists( '\\Elementor\\Plugin' ) && isset( \Elementor\Plugin::$instance->files_manager ) ) {
            \Elementor\Plugin::$instance->files_manager->clear_cache();
        }
        do_action( 'litespeed_purge_all' );
    }

    if ( $needs_flush ) { flush_rewrite_rules( false ); }
}, 40 );

/* Add Privacy Policy to the main controlled landing footer. */
add_action( 'wp_footer', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    $url = esc_url( home_url( '/privacy-policy/' ) );
    ?>
    <script id="x13-privacy-footer-link">
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelector('.x13-footer-links');
        if (!links || links.querySelector('.x13-privacy-link')) return;
        var a = document.createElement('a');
        a.className = 'x13-privacy-link';
        a.href = <?php echo wp_json_encode( $url ); ?>;
        a.textContent = 'Privacy Policy';
        links.appendChild(a);
    });
    </script>
    <?php
}, 99 );
