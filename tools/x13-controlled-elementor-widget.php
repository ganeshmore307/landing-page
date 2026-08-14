<?php
/**
 * 13Xplay controlled Elementor editor.
 * Fixed premium layout + safe content/style controls, like the Global Talent Hub editor.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'elementor/widgets/register', function( $widgets_manager ) {
    if ( ! class_exists( '\\Elementor\\Widget_Base' ) ) { return; }

    if ( ! class_exists( 'X13Play_Controlled_Landing_Widget' ) ) {
        class X13Play_Controlled_Landing_Widget extends \Elementor\Widget_Base {
            public function get_name() { return 'x13play_controlled_landing'; }
            public function get_title() { return '13Xplay Premium Landing'; }
            public function get_icon() { return 'eicon-site-logo'; }
            public function get_categories() { return [ 'general' ]; }
            public function get_keywords() { return [ '13xplay', 'landing', 'premium', 'gaming' ]; }

            private function text_control( $id, $label, $default ) {
                $this->add_control( $id, [
                    'label' => $label,
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $default,
                    'label_block' => true,
                ] );
            }

            private function textarea_control( $id, $label, $default ) {
                $this->add_control( $id, [
                    'label' => $label,
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $default,
                    'rows' => 3,
                ] );
            }

            protected function register_controls() {
                $asset_base = home_url( '/wp-content/uploads/13xplay-assets/' );

                $this->start_controls_section( 'images_section', [ 'label' => 'Images' ] );
                $this->add_control( 'logo_image', [
                    'label' => '13Xplay Logo',
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [ 'url' => $asset_base . '13xplay-logo.webp' ],
                ] );
                $this->add_control( 'hero_image', [
                    'label' => 'Hero Player / Phone Artwork',
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [ 'url' => $asset_base . '13xplay-hero.webp' ],
                ] );
                $this->end_controls_section();

                $this->start_controls_section( 'header_section', [ 'label' => 'Header & navigation' ] );
                $this->text_control( 'welcome_text', 'Welcome text', 'WELCOME TO 13XPLAY' );
                $this->text_control( 'nav_home', 'Home label', 'HOME' );
                $this->text_control( 'nav_how', 'How it works label', 'HOW IT WORKS' );
                $this->text_control( 'nav_support', 'Support label', 'SUPPORT' );
                $this->text_control( 'header_secure', 'Security text', '100% SECURE & TRUSTED' );
                $this->text_control( 'header_cta', 'Header button text', 'WHATSAPP NOW' );
                $this->add_control( 'header_cta_url', [
                    'label' => 'Header button link',
                    'type' => \Elementor\Controls_Manager::URL,
                    'default' => [ 'url' => 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.' ],
                    'show_external' => false,
                ] );
                $this->end_controls_section();

                $this->start_controls_section( 'hero_section', [ 'label' => 'Hero' ] );
                $this->text_control( 'eyebrow', 'Eyebrow', 'WELCOME TO 13XPLAY' );
                $this->text_control( 'hero_line_1', 'Heading line 1', 'PLAY MORE' );
                $this->text_control( 'hero_line_2', 'Heading line 2', 'WIN MORE!' );
                $this->text_control( 'hero_subtitle', 'Subheading', 'THE ULTIMATE GAMING EXPERIENCE' );
                $this->end_controls_section();

                $this->start_controls_section( 'id_offer_section', [ 'label' => 'Get ID offer' ] );
                $this->text_control( 'id_label', 'ID label', 'GET ID IN' );
                $this->text_control( 'id_time', 'ID time', '1 MIN' );
                $this->text_control( 'trust_line', 'Trust line', 'FAST | SECURE | TRUSTED' );
                $this->text_control( 'trust_subline', 'Trust subline', 'YOUR WINNING STARTS HERE' );
                $this->end_controls_section();

                $this->start_controls_section( 'bonus_section', [ 'label' => '10% bonus badge' ] );
                $this->text_control( 'bonus_percent', 'Percentage', '10%' );
                $this->text_control( 'bonus_extra', 'Offer line', 'EXTRA' );
                $this->text_control( 'bonus_word', 'Badge ribbon', 'BONUS' );
                $this->end_controls_section();

                $this->start_controls_section( 'cta_section', [ 'label' => 'WhatsApp CTA' ] );
                $this->text_control( 'cta_kicker_1', 'CTA line 1', 'READY TO WIN BIG?' );
                $this->text_control( 'cta_kicker_2', 'CTA line 2', 'JOIN 13XPLAY NOW!' );
                $this->text_control( 'cta_text', 'Button text', 'WHATSAPP NOW' );
                $this->add_control( 'cta_url', [
                    'label' => 'WhatsApp link',
                    'type' => \Elementor\Controls_Manager::URL,
                    'default' => [ 'url' => 'https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID.' ],
                    'show_external' => false,
                ] );
                $this->end_controls_section();

                $this->start_controls_section( 'trust_section', [ 'label' => 'Trust strip' ] );
                $this->text_control( 'f1_title', 'Feature 1 title', 'INSTANT' );
                $this->text_control( 'f1_sub', 'Feature 1 text', 'WITHDRAWAL' );
                $this->text_control( 'f2_title', 'Feature 2 title', '24X7' );
                $this->text_control( 'f2_sub', 'Feature 2 text', 'CUSTOMER SUPPORT' );
                $this->text_control( 'f3_title', 'Feature 3 title', 'SECURE' );
                $this->text_control( 'f3_sub', 'Feature 3 text', 'TRANSACTIONS' );
                $this->text_control( 'f4_title', 'Feature 4 title', 'BEST ODDS' );
                $this->text_control( 'f4_sub', 'Feature 4 text', '& BIG WINS' );
                $this->end_controls_section();

                $this->start_controls_section( 'footer_section', [ 'label' => 'Footer' ] );
                $this->textarea_control( 'footer_text', 'Footer description', 'Fast ID. Secure support. Simple WhatsApp assistance.' );
                $this->text_control( 'footer_links_heading', 'Links heading', 'QUICK LINKS' );
                $this->text_control( 'footer_support_heading', 'Support heading', '24X7 SUPPORT' );
                $this->text_control( 'footer_phone', 'WhatsApp display number', '+91 70588 20881' );
                $this->text_control( 'footer_button', 'Footer button text', 'CHAT ON WHATSAPP' );
                $this->text_control( 'copyright', 'Copyright', '© 2026 13XPLAY. All rights reserved.' );
                $this->end_controls_section();

                $this->start_controls_section( 'style_section', [
                    'label' => 'Colors & formatting',
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ] );
                $this->add_control( 'accent', [ 'label' => 'Primary green', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#16F06A' ] );
                $this->add_control( 'accent_teal', [ 'label' => 'Secondary teal', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#15D9B0' ] );
                $this->add_control( 'gold', [ 'label' => 'Bonus gold', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FFD83D' ] );
                $this->add_control( 'background', [ 'label' => 'Background', 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#020707' ] );
                $this->add_control( 'title_size', [
                    'label' => 'Desktop heading size',
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [ 'px' => [ 'min' => 54, 'max' => 120 ] ],
                    'default' => [ 'unit' => 'px', 'size' => 88 ],
                ] );
                $this->add_control( 'mobile_title_size', [
                    'label' => 'Mobile heading size',
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [ 'px' => [ 'min' => 34, 'max' => 72 ] ],
                    'default' => [ 'unit' => 'px', 'size' => 54 ],
                ] );
                $this->add_control( 'content_width', [
                    'label' => 'Maximum content width',
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [ 'px' => [ 'min' => 1100, 'max' => 1600 ] ],
                    'default' => [ 'unit' => 'px', 'size' => 1440 ],
                ] );
                $this->end_controls_section();
            }

            protected function render() {
                $s = $this->get_settings_for_display();
                $logo = ! empty( $s['logo_image']['url'] ) ? $s['logo_image']['url'] : '';
                $hero = ! empty( $s['hero_image']['url'] ) ? $s['hero_image']['url'] : '';
                $wa = ! empty( $s['cta_url']['url'] ) ? $s['cta_url']['url'] : '#';
                $hwa = ! empty( $s['header_cta_url']['url'] ) ? $s['header_cta_url']['url'] : $wa;
                $accent = $s['accent'] ?: '#16F06A';
                $teal = $s['accent_teal'] ?: '#15D9B0';
                $gold = $s['gold'] ?: '#FFD83D';
                $bg = $s['background'] ?: '#020707';
                $title = isset( $s['title_size']['size'] ) ? (int) $s['title_size']['size'] : 88;
                $mtitle = isset( $s['mobile_title_size']['size'] ) ? (int) $s['mobile_title_size']['size'] : 54;
                $maxw = isset( $s['content_width']['size'] ) ? (int) $s['content_width']['size'] : 1440;
                ?>
                <div class="x13-fixed" style="--x13-green:<?php echo esc_attr( $accent ); ?>;--x13-teal:<?php echo esc_attr( $teal ); ?>;--x13-gold:<?php echo esc_attr( $gold ); ?>;--x13-bg:<?php echo esc_attr( $bg ); ?>;--x13-title:<?php echo esc_attr( $title ); ?>px;--x13-mtitle:<?php echo esc_attr( $mtitle ); ?>px;--x13-max:<?php echo esc_attr( $maxw ); ?>px;">
                    <header class="x13-header">
                        <div class="x13-shell x13-header-row">
                            <div class="x13-logo-wrap"><?php if ( $logo ) : ?><img src="<?php echo esc_url( $logo ); ?>" alt="13XPLAY"><?php else : ?><b>13XPLAY</b><?php endif; ?></div>
                            <nav class="x13-nav" aria-label="Primary">
                                <a href="#x13-home"><?php echo esc_html( $s['nav_home'] ); ?></a>
                                <a href="#x13-how"><?php echo esc_html( $s['nav_how'] ); ?></a>
                                <a href="#x13-support"><?php echo esc_html( $s['nav_support'] ); ?></a>
                            </nav>
                            <div class="x13-secure"><span class="x13-shield">◇</span><?php echo esc_html( $s['header_secure'] ); ?></div>
                            <a class="x13-header-wa" href="<?php echo esc_url( $hwa ); ?>"><span>◉</span><?php echo esc_html( $s['header_cta'] ); ?></a>
                            <div class="x13-mobile-welcome"><?php echo esc_html( $s['welcome_text'] ); ?></div>
                        </div>
                    </header>

                    <main id="x13-home" class="x13-hero">
                        <div class="x13-hero-glow"></div>
                        <div class="x13-shell x13-hero-grid">
                            <section class="x13-copy">
                                <div class="x13-eyebrow"><span>≫</span> <?php echo esc_html( $s['eyebrow'] ); ?> <span>≪</span></div>
                                <h1><span class="x13-white"><?php echo esc_html( $s['hero_line_1'] ); ?></span><span class="x13-gradient"><?php echo esc_html( $s['hero_line_2'] ); ?></span></h1>
                                <div class="x13-subtitle"><?php echo esc_html( $s['hero_subtitle'] ); ?></div>

                                <div class="x13-mobile-art"><?php if ( $hero ) : ?><img src="<?php echo esc_url( $hero ); ?>" alt="13Xplay gaming artwork"><?php endif; ?><div class="x13-mobile-bonus"><strong><?php echo esc_html( $s['bonus_percent'] ); ?></strong><span><?php echo esc_html( $s['bonus_extra'] ); ?></span><b><?php echo esc_html( $s['bonus_word'] ); ?></b></div></div>

                                <div id="x13-how" class="x13-offer-row">
                                    <div class="x13-id-card"><span class="x13-id-icon">⚡</span><div><small><?php echo esc_html( $s['id_label'] ); ?></small><strong><?php echo esc_html( $s['id_time'] ); ?></strong></div><span class="x13-fast">FAST</span></div>
                                    <div class="x13-trust-card"><span class="x13-check">✓</span><div><small><?php echo esc_html( $s['trust_line'] ); ?></small><strong><?php echo esc_html( $s['trust_subline'] ); ?></strong></div></div>
                                </div>
                            </section>

                            <section class="x13-art-side">
                                <div class="x13-art-card"><?php if ( $hero ) : ?><img src="<?php echo esc_url( $hero ); ?>" alt="13Xplay gaming artwork"><?php endif; ?></div>
                                <div class="x13-bonus"><div class="x13-stars">★ ★ ★</div><strong><?php echo esc_html( $s['bonus_percent'] ); ?></strong><span><?php echo esc_html( $s['bonus_extra'] ); ?></span><b><?php echo esc_html( $s['bonus_word'] ); ?></b></div>
                            </section>
                        </div>

                        <div class="x13-shell x13-cta-block">
                            <div class="x13-cta-kicker"><span><?php echo esc_html( $s['cta_kicker_1'] ); ?></span><b><?php echo esc_html( $s['cta_kicker_2'] ); ?></b></div>
                            <a class="x13-main-wa" href="<?php echo esc_url( $wa ); ?>"><span class="x13-wa-icon">◉</span><strong><?php echo esc_html( $s['cta_text'] ); ?></strong><span class="x13-arrow">›</span></a>
                        </div>
                    </main>

                    <section class="x13-feature-strip">
                        <div class="x13-shell x13-features">
                            <div class="x13-feature"><span>ϟ</span><div><b><?php echo esc_html( $s['f1_title'] ); ?></b><small><?php echo esc_html( $s['f1_sub'] ); ?></small></div></div>
                            <div class="x13-feature"><span>◉</span><div><b><?php echo esc_html( $s['f2_title'] ); ?></b><small><?php echo esc_html( $s['f2_sub'] ); ?></small></div></div>
                            <div class="x13-feature"><span>⬡</span><div><b><?php echo esc_html( $s['f3_title'] ); ?></b><small><?php echo esc_html( $s['f3_sub'] ); ?></small></div></div>
                            <div class="x13-feature"><span>♜</span><div><b><?php echo esc_html( $s['f4_title'] ); ?></b><small><?php echo esc_html( $s['f4_sub'] ); ?></small></div></div>
                        </div>
                    </section>

                    <footer id="x13-support" class="x13-footer">
                        <div class="x13-shell x13-footer-grid">
                            <div class="x13-footer-brand"><?php if ( $logo ) : ?><img src="<?php echo esc_url( $logo ); ?>" alt="13XPLAY"><?php endif; ?><p><?php echo esc_html( $s['footer_text'] ); ?></p></div>
                            <div class="x13-footer-links"><h3><?php echo esc_html( $s['footer_links_heading'] ); ?></h3><a href="#x13-home"><?php echo esc_html( $s['nav_home'] ); ?></a><a href="#x13-how"><?php echo esc_html( $s['nav_how'] ); ?></a><a href="#x13-support"><?php echo esc_html( $s['nav_support'] ); ?></a></div>
                            <div class="x13-footer-support"><h3><?php echo esc_html( $s['footer_support_heading'] ); ?></h3><p>WhatsApp: <?php echo esc_html( $s['footer_phone'] ); ?></p><a href="<?php echo esc_url( $wa ); ?>"><?php echo esc_html( $s['footer_button'] ); ?></a></div>
                        </div>
                        <div class="x13-shell x13-copyright"><?php echo esc_html( $s['copyright'] ); ?></div>
                    </footer>
                </div>
                <style>
                .x13-fixed{font-family:Arial,Helvetica,sans-serif;background:var(--x13-bg);color:#fff;overflow:hidden;width:100%;margin:0}.x13-fixed *{box-sizing:border-box}.x13-fixed a{text-decoration:none}.x13-shell{width:min(calc(100% - 48px),var(--x13-max));margin:0 auto}.x13-header{background:#010303;border-bottom:1px solid rgba(22,240,106,.34);position:relative;z-index:20}.x13-header-row{min-height:92px;display:grid;grid-template-columns:260px 1fr 190px 190px;gap:24px;align-items:center}.x13-logo-wrap img{display:block;width:230px;max-height:72px;object-fit:contain;object-position:left center}.x13-nav{display:flex;justify-content:center;gap:38px}.x13-nav a{font-size:13px;color:#fff;font-weight:800}.x13-nav a:first-child,.x13-nav a:hover{color:var(--x13-green)}.x13-secure{font-weight:800;font-size:13px;line-height:1.4;color:#dbe5e2;text-align:center}.x13-shield{color:var(--x13-green);margin-right:6px}.x13-header-wa{min-height:50px;border:1px solid var(--x13-green);border-radius:13px;display:flex;align-items:center;justify-content:center;gap:9px;color:#fff;font-size:14px;font-weight:900;background:rgba(14,61,26,.23)}.x13-header-wa span{color:var(--x13-green);font-size:20px}.x13-mobile-welcome{display:none}.x13-hero{position:relative;background:radial-gradient(circle at 72% 34%,rgba(20,190,115,.15),transparent 30%),linear-gradient(115deg,#010505 0%,#020807 55%,#04100d 100%);padding:38px 0 28px;border-bottom:1px solid rgba(22,240,106,.18)}.x13-hero-glow{position:absolute;inset:0;background:linear-gradient(90deg,rgba(0,0,0,.18),transparent 55%,rgba(0,0,0,.12));pointer-events:none}.x13-hero-grid{position:relative;z-index:2;display:grid;grid-template-columns:54% 46%;align-items:center;min-height:680px}.x13-copy{padding:18px 34px 20px 0}.x13-eyebrow{font-size:14px;font-weight:700;margin-bottom:12px;letter-spacing:.6px}.x13-eyebrow span{color:var(--x13-green)}.x13-copy h1{margin:0;text-transform:uppercase;font-family:Impact,'Arial Black',sans-serif;font-style:italic;line-height:.91;letter-spacing:-1px;font-size:var(--x13-title)}.x13-copy h1 span{display:block}.x13-gradient{background:linear-gradient(180deg,var(--x13-green),var(--x13-teal));-webkit-background-clip:text;background-clip:text;color:transparent}.x13-subtitle{margin-top:18px;font-size:24px;font-weight:800;letter-spacing:.8px;border-bottom:1px solid rgba(21,217,176,.55);padding-bottom:12px;width:max-content;max-width:100%}.x13-offer-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:28px}.x13-id-card,.x13-trust-card{min-height:118px;border:1px solid rgba(21,217,176,.82);border-radius:22px;background:linear-gradient(120deg,rgba(4,22,16,.92),rgba(0,5,4,.94));display:flex;align-items:center;gap:16px;padding:18px 18px;box-shadow:0 0 25px rgba(21,217,176,.08)}.x13-id-icon,.x13-check{width:58px;height:58px;border-radius:50%;display:grid;place-items:center;flex:0 0 58px;background:linear-gradient(145deg,#57ff8b,#0bc34b);color:#021008;font-size:26px;font-weight:900;box-shadow:0 0 24px rgba(22,240,106,.34)}.x13-id-card small,.x13-trust-card small{display:block;font-size:18px;font-weight:900;font-style:italic}.x13-id-card strong{display:block;color:#8cff2d;font-size:38px;line-height:1;font-weight:900;font-style:italic}.x13-trust-card strong{display:block;color:var(--x13-green);font-size:15px;margin-top:8px}.x13-fast{margin-left:auto;width:56px;height:56px;border:5px dashed #c8ff39;border-radius:50%;display:grid;place-items:center;color:#c8ff39;font-size:10px;font-weight:900;transform:rotate(-8deg)}.x13-art-side{position:relative;min-height:610px;display:flex;align-items:center;justify-content:center}.x13-art-card{width:100%;height:610px;overflow:hidden;border-radius:32px 0 0 32px;position:relative}.x13-art-card:after{content:'';position:absolute;inset:0;background:linear-gradient(90deg,rgba(1,5,4,.96),rgba(1,5,4,.08) 35%,rgba(1,5,4,.02)),linear-gradient(180deg,transparent 65%,rgba(1,5,4,.55));pointer-events:none}.x13-art-card img{width:100%;height:100%;display:block;object-fit:cover;object-position:center}.x13-bonus{position:absolute;right:0;bottom:26px;width:205px;height:205px;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;background:radial-gradient(circle,#332805 0%,#0b0c05 58%,#020302 75%);border:8px double #f5c73b;box-shadow:0 0 0 6px rgba(255,216,61,.12),0 0 36px rgba(255,216,61,.24);color:var(--x13-gold);text-align:center;z-index:3}.x13-bonus .x13-stars{font-size:10px;letter-spacing:2px}.x13-bonus strong{font-size:58px;line-height:.9}.x13-bonus span{font-size:20px;font-weight:900}.x13-bonus b{position:absolute;bottom:4px;background:linear-gradient(#19d85a,#087b32);color:#fff;border-radius:999px;padding:7px 28px;font-size:20px;transform:rotate(-4deg);box-shadow:0 4px 16px rgba(22,240,106,.28)}.x13-mobile-art{display:none}.x13-cta-block{position:relative;z-index:3;margin-top:-6px;text-align:center}.x13-cta-kicker{font-family:Impact,'Arial Black',sans-serif;font-style:italic;text-transform:uppercase;font-size:28px;line-height:1.18;margin-bottom:18px}.x13-cta-kicker span,.x13-cta-kicker b{display:block}.x13-cta-kicker b{color:#fff}.x13-main-wa{width:min(880px,100%);min-height:116px;margin:0 auto;display:flex;align-items:center;justify-content:center;gap:26px;border:4px solid #dcffad;border-radius:60px;background:linear-gradient(#23e84b,#06a72e);box-shadow:0 0 14px var(--x13-green),0 0 35px rgba(22,240,106,.52),inset 0 0 25px rgba(255,255,255,.22);color:#fff}.x13-main-wa strong{font-size:46px;font-weight:1000}.x13-wa-icon{font-size:52px}.x13-arrow{font-size:62px;line-height:1}.x13-feature-strip{background:#020505;border-top:1px solid rgba(21,217,176,.24);border-bottom:1px solid rgba(21,217,176,.24)}.x13-features{display:grid;grid-template-columns:repeat(4,1fr);min-height:116px;align-items:center}.x13-feature{display:flex;align-items:center;justify-content:center;gap:16px}.x13-feature>span{font-size:34px;color:#fff}.x13-feature b{display:block;font-size:15px}.x13-feature small{display:block;font-size:12px;color:#d0d9d6;margin-top:4px}.x13-footer{background:#010303;padding:44px 0 20px}.x13-footer-grid{display:grid;grid-template-columns:1.35fr .75fr 1fr;gap:70px;align-items:start}.x13-footer-brand img{width:270px;max-width:100%;display:block}.x13-footer-brand p{color:#97a39f;line-height:1.6;max-width:360px}.x13-footer h3{font-size:14px;margin:0 0 13px;color:#fff}.x13-footer-links{display:flex;flex-direction:column}.x13-footer-links a{color:#d9e1df;margin:4px 0}.x13-footer-links a:hover{color:var(--x13-green)}.x13-footer-support p{color:#d7dfdc}.x13-footer-support>a{display:inline-flex;background:#0ecf4c;color:#fff;font-weight:900;border-radius:12px;padding:14px 24px}.x13-copyright{border-top:1px solid rgba(255,255,255,.05);margin-top:32px;padding-top:16px;color:#67736f;font-size:12px}.elementor-editor-active .x13-fixed{min-height:500px}
                @media(max-width:1024px){.x13-header-row{grid-template-columns:220px 1fr 160px}.x13-secure{display:none}.x13-nav{gap:20px}.x13-hero-grid{grid-template-columns:56% 44%;min-height:610px}.x13-copy h1{font-size:64px}.x13-subtitle{font-size:18px}.x13-offer-row{grid-template-columns:1fr}.x13-art-card{height:560px}.x13-art-side{min-height:560px}.x13-bonus{width:170px;height:170px}.x13-bonus strong{font-size:48px}.x13-main-wa{min-height:96px}.x13-main-wa strong{font-size:36px}.x13-footer-grid{gap:38px}}
                @media(max-width:767px){.x13-shell{width:min(calc(100% - 26px),var(--x13-max))}.x13-header-row{min-height:104px;grid-template-columns:1fr 1fr;gap:8px}.x13-logo-wrap img{width:190px;max-width:100%}.x13-nav,.x13-secure,.x13-header-wa{display:none}.x13-mobile-welcome{display:block;text-align:right;font-size:13px;font-weight:900}.x13-mobile-welcome::first-line{color:#fff}.x13-hero{padding-top:24px}.x13-hero-grid{display:block;min-height:0}.x13-copy{padding:0}.x13-eyebrow{text-align:center;font-size:12px}.x13-copy h1{text-align:center;font-size:var(--x13-mtitle);line-height:.92}.x13-subtitle{text-align:center;font-size:15px;width:auto;border-bottom:1px solid rgba(21,217,176,.4);padding-bottom:10px}.x13-art-side{display:none}.x13-mobile-art{display:block;position:relative;margin:18px -13px 20px}.x13-mobile-art img{display:block;width:100%;height:475px;object-fit:cover;object-position:center;border-radius:20px}.x13-mobile-art:after{content:'';position:absolute;inset:0;border-radius:20px;background:linear-gradient(180deg,transparent 58%,rgba(1,4,3,.72));pointer-events:none}.x13-mobile-bonus{position:absolute;z-index:2;right:10px;bottom:18px;width:145px;height:145px;border-radius:50%;background:radial-gradient(circle,#342908,#080905 62%);border:6px double #ffd83d;display:flex;flex-direction:column;align-items:center;justify-content:center;color:var(--x13-gold);box-shadow:0 0 24px rgba(255,216,61,.25)}.x13-mobile-bonus strong{font-size:46px;line-height:.9}.x13-mobile-bonus span{font-size:16px;font-weight:900}.x13-mobile-bonus b{position:absolute;bottom:1px;background:#0bac43;color:#fff;padding:5px 18px;border-radius:20px;transform:rotate(-4deg)}.x13-offer-row{display:block;margin-top:0}.x13-id-card,.x13-trust-card{min-height:100px;margin-bottom:12px;border-radius:18px}.x13-id-card small,.x13-trust-card small{font-size:16px}.x13-id-card strong{font-size:34px}.x13-trust-card strong{font-size:13px}.x13-cta-block{margin-top:24px}.x13-cta-kicker{font-size:22px}.x13-main-wa{min-height:92px;border-radius:50px;gap:13px;padding:0 12px}.x13-main-wa strong{font-size:28px}.x13-wa-icon{font-size:38px}.x13-arrow{font-size:44px}.x13-features{grid-template-columns:1fr 1fr;gap:0;padding:14px 0}.x13-feature{min-height:82px;justify-content:flex-start;padding:0 8px}.x13-feature>span{font-size:26px}.x13-feature b{font-size:12px}.x13-feature small{font-size:9px}.x13-footer{padding-top:34px}.x13-footer-grid{display:block;text-align:center}.x13-footer-brand img{margin:0 auto;width:230px}.x13-footer-brand p{margin:12px auto 28px}.x13-footer-links{margin-bottom:28px}.x13-footer-support>a{width:100%;justify-content:center}.x13-copyright{text-align:center}.x13-fast{width:48px;height:48px}.x13-id-icon,.x13-check{width:50px;height:50px;flex-basis:50px}}
                </style>
                <?php
            }
        }
    }

    $widgets_manager->register( new \X13Play_Controlled_Landing_Widget() );
} );
