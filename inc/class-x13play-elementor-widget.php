<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class X13Play_Elementor_Landing_Widget extends \Elementor\Widget_Base {
    public function get_name() { return '13xplay_landing_page'; }
    public function get_title() { return '13Xplay Landing Page'; }
    public function get_icon() { return 'eicon-site-logo'; }
    public function get_categories() { return [ 'general' ]; }
    public function get_keywords() { return [ '13xplay', 'landing', 'whatsapp', 'gaming', 'cricket' ]; }
    public function get_style_depends() { return [ 'x13play-landing' ]; }

    protected function register_controls() {
        $this->start_controls_section( 'hero', [
            'label' => 'Hero',
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $this->add_control( 'logo', [
            'label' => '13Xplay Logo',
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [ 'url' => get_stylesheet_directory_uri() . '/assets/13xplay-logo.webp' ],
        ] );
        $this->add_control( 'eyebrow', [
            'label' => 'Small Label', 'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'WELCOME TO 13XPLAY', 'label_block' => true,
        ] );
        $this->add_control( 'headline', [
            'label' => 'Headline', 'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Play Big. Win Bigger.', 'label_block' => true,
        ] );
        $this->add_control( 'offer_prefix', [
            'label' => 'Offer Prefix', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'GET',
        ] );
        $this->add_control( 'offer_value', [
            'label' => 'Offer Highlight', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '10%',
        ] );
        $this->add_control( 'offer_suffix', [
            'label' => 'Offer Suffix', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'EXTRA',
        ] );
        $this->add_control( 'subheadline', [
            'label' => 'Supporting Line', 'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Get Your 13XPLAY ID Instantly', 'label_block' => true,
        ] );
        $this->add_control( 'benefits', [
            'label' => 'Benefits Line', 'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Fast • Simple • 24/7 Assistance', 'label_block' => true,
        ] );
        $this->add_control( 'hero_image', [
            'label' => 'Cricket Hero Image', 'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [ 'url' => 'https://images.pexels.com/photos/12732254/pexels-photo-12732254.jpeg?auto=compress&cs=tinysrgb&w=1200' ],
            'description' => 'Replace this anytime from the WordPress Media Library.',
        ] );
        $this->end_controls_section();

        $this->start_controls_section( 'cta', [
            'label' => 'WhatsApp / Get ID', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $this->add_control( 'whatsapp_number', [
            'label' => 'WhatsApp Number', 'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '917058820881',
            'description' => 'Country code + number, without the + sign. Trial number is already entered.',
            'label_block' => true,
        ] );
        $this->add_control( 'message', [
            'label' => 'Pre-filled WhatsApp Message', 'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Hi 13Xplay, I want to get my ID and know about the 10% extra offer.', 'rows' => 4,
        ] );
        $this->add_control( 'whatsapp_text', [
            'label' => 'WhatsApp Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'WHATSAPP NOW',
        ] );
        $this->add_control( 'get_id_text', [
            'label' => 'Get ID Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'GET ID',
        ] );
        $this->add_control( 'sticky_mobile', [
            'label' => 'Sticky WhatsApp on Mobile', 'type' => \Elementor\Controls_Manager::SWITCHER,
            'return_value' => 'yes', 'default' => 'yes',
        ] );
        $this->end_controls_section();

        $this->start_controls_section( 'trust', [
            'label' => 'Trust Strip', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $trust_defaults = [
            1 => [ 'SAFE & SECURE', 'Clear support-led setup' ],
            2 => [ '24/7 SUPPORT', 'Assistance when you need it' ],
            3 => [ 'QUICK ID', 'Fast account assistance' ],
            4 => [ 'BEST SERVICE', 'Customer-focused support' ],
        ];
        foreach ( $trust_defaults as $i => $default ) {
            $this->add_control( "trust_{$i}_title", [ 'label' => "Trust {$i} Title", 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $default[0] ] );
            $this->add_control( "trust_{$i}_text", [ 'label' => "Trust {$i} Text", 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $default[1] ] );
        }
        $this->end_controls_section();

        $this->start_controls_section( 'steps', [
            'label' => 'How It Works', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $step_defaults = [
            1 => [ 'WHATSAPP US', 'Tap the WhatsApp button and message our support team.' ],
            2 => [ 'GET YOUR ID', 'Get account assistance and your 13XPLAY ID.' ],
            3 => [ 'GET STARTED', 'Use your ID and continue from your phone.' ],
        ];
        foreach ( $step_defaults as $i => $default ) {
            $this->add_control( "step_{$i}_title", [ 'label' => "Step {$i} Title", 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $default[0] ] );
            $this->add_control( "step_{$i}_text", [ 'label' => "Step {$i} Text", 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => $default[1], 'rows' => 2 ] );
        }
        $this->end_controls_section();

        $this->start_controls_section( 'final_cta', [
            'label' => 'Final CTA', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $this->add_control( 'final_title', [
            'label' => 'Final CTA Heading', 'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Ready to Get Your 13Xplay ID?', 'label_block' => true,
        ] );
        $this->add_control( 'final_text', [
            'label' => 'Final CTA Text', 'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Connect on WhatsApp for quick ID assistance and details about the 10% extra offer.', 'rows' => 3,
        ] );
        $this->add_control( 'footer_note', [
            'label' => 'Footer Note', 'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '18+ only • Play responsibly • Terms apply • Availability may vary by jurisdiction.', 'rows' => 2,
        ] );
        $this->end_controls_section();

        $this->start_controls_section( 'colors', [
            'label' => 'Colors', 'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $colors = [
            'bg' => [ 'Background', '#03090D', '--x13-bg' ],
            'panel' => [ 'Panel', '#07131A', '--x13-panel' ],
            'accent' => [ 'Teal Accent', '#19E6B2', '--x13-accent' ],
            'wa' => [ 'WhatsApp Green', '#18D96F', '--x13-wa' ],
            'gold' => [ 'Offer Gold', '#F4BD2B', '--x13-gold' ],
            'text' => [ 'Text', '#FFFFFF', '--x13-text' ],
            'muted' => [ 'Muted Text', '#A9B7C2', '--x13-muted' ],
        ];
        foreach ( $colors as $key => $color ) {
            $this->add_control( $key, [
                'label' => $color[0], 'type' => \Elementor\Controls_Manager::COLOR, 'default' => $color[1],
                'selectors' => [ '{{WRAPPER}} .x13' => $color[2] . ': {{VALUE}};' ],
            ] );
        }
        $this->end_controls_section();
    }

    private function icon( $name ) {
        $icons = [
            'whatsapp' => '<svg viewBox="0 0 24 24"><path d="M20 11.5a8 8 0 0 1-11.8 7L4 19.6l1.1-4A8 8 0 1 1 20 11.5z"/><path d="M8.7 7.8c.4-.4.9-.2 1.1.2l.8 1.8c.2.4 0 .8-.3 1.1l-.6.5c.8 1.5 1.9 2.7 3.4 3.5l.6-.7c.3-.3.7-.4 1.1-.2l1.7.8c.4.2.6.7.4 1.1-.5 1-1.3 1.6-2.4 1.6-3.7 0-8-4.3-8-8 0-.7.2-1.3.6-1.7z"/></svg>',
            'id' => '<svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6.5 16c.7-1.6 1.5-2.4 2.5-2.4s1.8.8 2.5 2.4M14 10h4M14 14h4"/></svg>',
            'shield' => '<svg viewBox="0 0 24 24"><path d="M12 3l7 3v5c0 4.8-2.9 8.6-7 10-4.1-1.4-7-5.2-7-10V6l7-3z"/><path d="M9.5 12l1.7 1.7 3.8-4"/></svg>',
            'headset' => '<svg viewBox="0 0 24 24"><path d="M4 14v-2a8 8 0 0 1 16 0v2"/><path d="M4 14h3v5H5a1 1 0 0 1-1-1v-4zm16 0h-3v5h2a1 1 0 0 0 1-1v-4z"/></svg>',
            'bolt' => '<svg viewBox="0 0 24 24"><path d="M13 2L5 13h6l-1 9 9-13h-6V2z"/></svg>',
            'badge' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="9" r="5"/><path d="M9 14l-2 8 5-3 5 3-2-8"/></svg>',
            'play' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M10 8l6 4-6 4V8z"/></svg>',
        ];
        return $icons[ $name ] ?? '';
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $number = preg_replace( '/\D+/', '', (string) $s['whatsapp_number'] );
        $wa = $number ? 'https://wa.me/' . $number : '#';
        if ( $number && ! empty( $s['message'] ) ) {
            $wa .= '?text=' . rawurlencode( $s['message'] );
        }
        $hero = ! empty( $s['hero_image']['url'] ) ? $s['hero_image']['url'] : '';
        $logo = ! empty( $s['logo']['url'] ) ? $s['logo']['url'] : '';
        $sticky = 'yes' === $s['sticky_mobile'] ? ' has-sticky' : '';
        $trust_icons = [ 'shield', 'headset', 'bolt', 'badge' ];
        $step_icons = [ 'whatsapp', 'id', 'play' ];
        ?>
        <div class="x13<?php echo esc_attr( $sticky ); ?>">
            <div class="x13-wrap">
                <header class="x13-header">
                    <?php if ( $logo ) : ?>
                        <img class="x13-logo" src="<?php echo esc_url( $logo ); ?>" alt="13Xplay" />
                    <?php else : ?>
                        <div class="x13-wordmark">13<span>X</span>PLAY</div>
                    <?php endif; ?>
                    <div class="x13-age">18+ • RESPONSIBLE PLAY</div>
                </header>

                <section class="x13-hero">
                    <div class="x13-copy">
                        <div class="x13-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></div>
                        <h1><?php echo esc_html( $s['headline'] ); ?></h1>
                        <div class="x13-offer"><span><?php echo esc_html( $s['offer_prefix'] ); ?></span><strong><?php echo esc_html( $s['offer_value'] ); ?></strong><span><?php echo esc_html( $s['offer_suffix'] ); ?></span></div>
                        <p class="x13-sub"><?php echo esc_html( $s['subheadline'] ); ?></p>
                        <p class="x13-benefits"><?php echo esc_html( $s['benefits'] ); ?></p>
                        <div class="x13-actions">
                            <a class="x13-btn x13-wa" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener noreferrer"><i><?php echo $this->icon( 'whatsapp' ); ?></i><span><b><?php echo esc_html( $s['whatsapp_text'] ); ?></b><small>Instant Support</small></span></a>
                            <a class="x13-btn x13-id" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener noreferrer"><i><?php echo $this->icon( 'id' ); ?></i><span><b><?php echo esc_html( $s['get_id_text'] ); ?></b><small>Quick ID Assistance</small></span></a>
                        </div>
                    </div>
                    <div class="x13-visual">
                        <div class="x13-ring"></div>
                        <?php if ( $hero ) : ?><img src="<?php echo esc_url( $hero ); ?>" alt="Cricket player" /><?php endif; ?>
                    </div>
                </section>

                <section class="x13-trust">
                    <?php for ( $i = 1; $i <= 4; $i++ ) : $tk = "trust_{$i}_title"; $tx = "trust_{$i}_text"; ?>
                        <div class="x13-trust-item"><i><?php echo $this->icon( $trust_icons[ $i - 1 ] ); ?></i><div><b><?php echo esc_html( $s[ $tk ] ); ?></b><small><?php echo esc_html( $s[ $tx ] ); ?></small></div></div>
                    <?php endfor; ?>
                </section>

                <section class="x13-how">
                    <div class="x13-title"><span></span><h2>HOW IT WORKS</h2><span></span></div>
                    <div class="x13-steps">
                        <?php for ( $i = 1; $i <= 3; $i++ ) : $sk = "step_{$i}_title"; $sx = "step_{$i}_text"; ?>
                            <div class="x13-step"><i><?php echo $this->icon( $step_icons[ $i - 1 ] ); ?></i><div><em>0<?php echo esc_html( (string) $i ); ?></em><b><?php echo esc_html( $s[ $sk ] ); ?></b><p><?php echo esc_html( $s[ $sx ] ); ?></p></div></div>
                        <?php endfor; ?>
                    </div>
                </section>

                <section class="x13-final">
                    <div><span>13XPLAY SUPPORT</span><h2><?php echo esc_html( $s['final_title'] ); ?></h2><p><?php echo esc_html( $s['final_text'] ); ?></p></div>
                    <a class="x13-btn x13-wa x13-final-btn" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener noreferrer"><i><?php echo $this->icon( 'whatsapp' ); ?></i><span><b><?php echo esc_html( $s['whatsapp_text'] ); ?></b><small>Connect Now</small></span></a>
                </section>

                <footer class="x13-footer"><?php echo esc_html( $s['footer_note'] ); ?></footer>
            </div>

            <?php if ( 'yes' === $s['sticky_mobile'] ) : ?>
                <a class="x13-sticky" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener noreferrer"><i><?php echo $this->icon( 'whatsapp' ); ?></i><b><?php echo esc_html( $s['whatsapp_text'] ); ?></b></a>
            <?php endif; ?>
        </div>
        <?php
    }
}
