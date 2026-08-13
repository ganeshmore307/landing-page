<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$s = x13play_get_settings();
$number = preg_replace( '/\D+/', '', (string) $s['whatsapp_number'] );
$link = $number ? 'https://wa.me/' . $number : '#';
if ( $number && $s['whatsapp_message'] ) {
    $link .= '?text=' . rawurlencode( $s['whatsapp_message'] );
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class( 'x13-direct-home' ); ?>>
<?php wp_body_open(); ?>
<main class="x13">
<div class="x13-wrap">
<header class="x13-header">
<a class="x13-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
<?php if ( $s['logo_url'] ) : ?>
<img class="x13-logo" src="<?php echo esc_url( $s['logo_url'] ); ?>" alt="13Xplay">
<?php else : ?>
<span class="x13-wordmark">13<span>X</span>PLAY</span>
<?php endif; ?>
</a>
<span class="x13-age">18+ • RESPONSIBLE PLAY</span>
</header>

<section class="x13-hero">
<div class="x13-copy">
<div class="x13-eyebrow"><?php echo esc_html( $s['eyebrow'] ); ?></div>
<h1><?php echo esc_html( $s['headline'] ); ?></h1>
<div class="x13-offer"><span><?php echo esc_html( $s['offer_prefix'] ); ?></span><strong><?php echo esc_html( $s['offer_value'] ); ?></strong><span><?php echo esc_html( $s['offer_suffix'] ); ?></span></div>
<p class="x13-sub"><?php echo esc_html( $s['subheadline'] ); ?></p>
<p class="x13-benefits"><?php echo esc_html( $s['benefits'] ); ?></p>
<div class="x13-actions">
<a class="x13-btn x13-wa" href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener"><span class="x13-btn-icon">◉</span><span><b><?php echo esc_html( $s['whatsapp_text'] ); ?></b><small>Instant Support</small></span></a>
<a class="x13-btn x13-id" href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener"><span class="x13-btn-icon">▣</span><span><b><?php echo esc_html( $s['get_id_text'] ); ?></b><small>Quick Assistance</small></span></a>
</div>
</div>
<div class="x13-visual"><div class="x13-ring"></div><?php if ( $s['hero_image_url'] ) : ?><img src="<?php echo esc_url( $s['hero_image_url'] ); ?>" alt="13Xplay visual"><?php endif; ?></div>
</section>

<section class="x13-trust">
<?php for ( $i = 1; $i <= 4; $i++ ) : $tk = 'trust_' . $i . '_title'; $tx = 'trust_' . $i . '_text'; ?>
<div class="x13-trust-item"><i><?php echo esc_html( (string) $i ); ?></i><div><b><?php echo esc_html( $s[$tk] ); ?></b><small><?php echo esc_html( $s[$tx] ); ?></small></div></div>
<?php endfor; ?>
</section>

<section class="x13-how">
<div class="x13-title"><span></span><h2>HOW IT WORKS</h2><span></span></div>
<div class="x13-steps">
<?php for ( $i = 1; $i <= 3; $i++ ) : $sk = 'step_' . $i . '_title'; $sx = 'step_' . $i . '_text'; ?>
<div class="x13-step"><i><?php echo esc_html( (string) $i ); ?></i><div><b><?php echo esc_html( $s[$sk] ); ?></b><p><?php echo esc_html( $s[$sx] ); ?></p></div></div>
<?php endfor; ?>
</div>
</section>
<footer class="x13-footer"><?php echo esc_html( $s['footer_note'] ); ?></footer>
</div>
<a class="x13-sticky" href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener"><b><?php echo esc_html( $s['whatsapp_text'] ); ?></b></a>
</main>
<?php wp_footer(); ?>
</body>
</html>
