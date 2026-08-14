<?php
/**
 * 13XPlay Privacy Policy page + footer link.
 * Creates/updates an editable WordPress page using only the policy text supplied by the site owner.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'init', function() {
    $slug = 'privacy-policy';
    $seed_version = '1';
    $content = <<<HTML
<p>At 13XPlay, we respect your privacy and are committed to protecting the personal information that you share with us.</p>

<p>This Privacy Policy explains how information may be collected, used, stored, protected and shared when you visit our website, interact with our advertisements, contact us through WhatsApp, or use any services offered by 13XPlay.</p>

<p>By accessing or using our website or contacting us through the available communication channels, you acknowledge the practices described in this Privacy Policy.</p>

<h2>1. About 13XPlay</h2>

<p>13XPlay is an online gaming platform providing users with access to gaming-related services, assistance and customer support.</p>

<p>Our website may provide information about our services and allow visitors to contact our support team through WhatsApp or other communication channels.</p>
HTML;

    $page = get_page_by_path( $slug, OBJECT, 'page' );

    if ( $page ) {
        $page_id = (int) $page->ID;

        /* Seed the supplied text once, including over the old WordPress draft page.
         * After v1 is seeded, future manual edits in WordPress are preserved.
         */
        if ( get_option( 'x13_privacy_policy_seed_version' ) !== $seed_version ) {
            wp_update_post( [
                'ID'           => $page_id,
                'post_title'   => 'Privacy Policy',
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_content' => $content,
            ] );
            update_option( 'x13_privacy_policy_seed_version', $seed_version );
            flush_rewrite_rules( false );
        }
    } else {
        $page_id = wp_insert_post( [
            'post_title'   => 'Privacy Policy',
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => $content,
        ] );

        if ( ! is_wp_error( $page_id ) && $page_id ) {
            update_option( 'x13_privacy_policy_seed_version', $seed_version );
            flush_rewrite_rules( false );
        }
    }

    if ( ! empty( $page_id ) && ! is_wp_error( $page_id ) ) {
        update_option( 'wp_page_for_privacy_policy', (int) $page_id );
    }
}, 30 );

/* Add a Privacy Policy link to the controlled landing footer without altering its layout. */
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

/* Clean standalone presentation for the Privacy Policy page.
 * Resolve the path directly so it works even if the current theme/permalink rules return 404.
 */
add_action( 'template_redirect', function() {
    $request_path = parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH );
    $request_path = '/' . trim( (string) $request_path, '/' ) . '/';

    if ( '/privacy-policy/' !== $request_path && ! is_page( 'privacy-policy' ) ) { return; }

    $post = get_page_by_path( 'privacy-policy', OBJECT, 'page' );
    if ( ! $post ) { return; }

    $title   = get_the_title( $post );
    $content = apply_filters( 'the_content', $post->post_content );
    $logo    = home_url( '/wp-content/uploads/13xplay-assets/13xplay-logo.webp' );
    $home    = home_url( '/' );

    status_header( 200 );
    nocache_headers();
    ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo esc_html( $title ); ?> | 13XPlay</title>
<style>
html,body{margin:0;padding:0;background:#020707;color:#eef6f3;font-family:Arial,Helvetica,sans-serif}*{box-sizing:border-box}a{text-decoration:none}.x13p-header{background:#010303;border-bottom:1px solid rgba(22,240,106,.35)}.x13p-shell{width:min(calc(100% - 40px),1100px);margin:0 auto}.x13p-headrow{min-height:84px;display:flex;align-items:center;justify-content:space-between;gap:24px}.x13p-logo{width:210px;max-width:48vw;height:auto;display:block}.x13p-home{color:#fff;border:1px solid #16f06a;border-radius:12px;padding:12px 18px;font-weight:800;font-size:14px}.x13p-home:hover{background:#16f06a;color:#031008}.x13p-main{padding:58px 0 72px;background:radial-gradient(circle at 80% 10%,rgba(21,217,176,.08),transparent 30%),#020707}.x13p-card{background:linear-gradient(145deg,rgba(4,18,14,.96),rgba(1,6,5,.98));border:1px solid rgba(21,217,176,.28);border-radius:24px;padding:44px 48px;box-shadow:0 18px 50px rgba(0,0,0,.28)}.x13p-kicker{color:#16f06a;font-size:13px;font-weight:900;letter-spacing:1.4px;text-transform:uppercase;margin-bottom:10px}.x13p-card h1{margin:0 0 28px;font-size:44px;line-height:1.08;color:#fff}.x13p-content{font-size:17px;line-height:1.8;color:#d4dfdb}.x13p-content p{margin:0 0 22px}.x13p-content h2{margin:38px 0 14px;color:#fff;font-size:27px;line-height:1.25}.x13p-footer{border-top:1px solid rgba(21,217,176,.18);background:#010303;color:#75817d;text-align:center;padding:22px 20px;font-size:13px}@media(max-width:767px){.x13p-shell{width:min(calc(100% - 24px),1100px)}.x13p-headrow{min-height:68px}.x13p-logo{width:145px}.x13p-home{padding:9px 12px;font-size:12px}.x13p-main{padding:28px 0 48px}.x13p-card{padding:28px 22px;border-radius:18px}.x13p-card h1{font-size:32px;margin-bottom:22px}.x13p-content{font-size:15.5px;line-height:1.72}.x13p-content h2{font-size:23px;margin-top:30px}}
</style>
</head>
<body>
<header class="x13p-header"><div class="x13p-shell x13p-headrow"><a href="<?php echo esc_url( $home ); ?>"><img class="x13p-logo" src="<?php echo esc_url( $logo ); ?>" alt="13XPlay"></a><a class="x13p-home" href="<?php echo esc_url( $home ); ?>">BACK TO HOME</a></div></header>
<main class="x13p-main"><div class="x13p-shell"><article class="x13p-card"><div class="x13p-kicker">13XPLAY</div><h1><?php echo esc_html( $title ); ?></h1><div class="x13p-content"><?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div></article></div></main>
<footer class="x13p-footer">© 2026 13XPLAY. All rights reserved.</footer>
</body>
</html>
    <?php
    exit;
}, 0 );
