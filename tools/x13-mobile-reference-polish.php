<?php
/**
 * Mobile-only polish for the controlled 13Xplay Elementor landing page.
 * Keeps approved desktop layout untouched and makes mobile follow the supplied poster reference.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-reference-polish">
    /* Reference trust strip: yellow icons/text + compact separators. */
    .x13-feature-strip{background:#050805!important;border-top:1px solid rgba(255,205,0,.22)!important;border-bottom:1px solid rgba(255,205,0,.22)!important}
    .x13-feature{position:relative!important}
    .x13-feature>span,.x13-feature b{color:#FFD21A!important}
    .x13-feature small{color:#FFF7CF!important}
    .x13-feature:not(:last-child):after{content:"";position:absolute;right:0;top:50%;width:1px;height:44px;transform:translateY(-50%);background:rgba(255,210,26,.28)}

    @media (max-width:767px){
      .x13-fixed{background:#010303!important}
      .x13-shell{width:100%!important;padding-left:16px!important;padding-right:16px!important}

      /* Header exactly like the mobile reference: logo left, welcome right. */
      .x13-header{background:#000!important;border-bottom:1px solid rgba(18,224,184,.48)!important}
      .x13-header-row{min-height:86px!important;display:grid!important;grid-template-columns:48% 52%!important;gap:8px!important;align-items:center!important;padding-top:4px!important;padding-bottom:4px!important}
      .x13-logo-wrap{display:flex!important;align-items:center!important;justify-content:flex-start!important}
      .x13-logo-wrap img{width:158px!important;max-width:100%!important;max-height:60px!important;object-fit:contain!important;object-position:left center!important}
      .x13-mobile-welcome{display:block!important;text-align:right!important;font-size:13px!important;font-weight:900!important;line-height:1.25!important;letter-spacing:.2px!important;color:#fff!important;max-width:150px!important;margin-left:auto!important}
      .x13-nav,.x13-secure,.x13-header-wa{display:none!important}

      /* Poster-like hero spacing. */
      .x13-hero{padding:16px 0 0!important;background:linear-gradient(180deg,#010404 0%,#020807 78%,#010303 100%)!important}
      .x13-hero-grid{display:block!important;min-height:0!important}
      .x13-copy{padding:0!important;overflow:visible!important}
      .x13-eyebrow{text-align:center!important;font-size:11px!important;letter-spacing:.45px!important;margin:10px 0 13px!important}
      .x13-copy h1{text-align:left!important;font-size:50px!important;line-height:.86!important;letter-spacing:-1px!important;margin:0 0 8px!important;padding-left:8px!important;max-width:285px!important}
      .x13-copy h1 .x13-white{max-width:220px!important;white-space:normal!important}
      .x13-copy h1 .x13-gradient{margin-top:2px!important}
      .x13-subtitle{text-align:left!important;font-size:15px!important;line-height:1.25!important;letter-spacing:.3px!important;width:auto!important;margin:16px 8px 0!important;padding:0 0 12px!important;border-bottom:1px solid rgba(19,220,182,.55)!important}
      .x13-art-side{display:none!important}

      /* Full-width hero artwork, like the supplied vertical poster. */
      .x13-mobile-art{display:block!important;position:relative!important;margin:0 -16px!important;height:510px!important;overflow:hidden!important;border-radius:0!important}
      .x13-mobile-art img{display:block!important;width:100%!important;height:510px!important;object-fit:cover!important;object-position:58% center!important;border-radius:0!important;filter:contrast(1.07) saturate(1.04)!important}
      .x13-mobile-art:after{content:""!important;position:absolute!important;inset:0!important;border-radius:0!important;background:linear-gradient(180deg,rgba(0,0,0,.04) 0%,rgba(0,0,0,.02) 52%,rgba(0,3,2,.72) 100%)!important;pointer-events:none!important}

      /* Bonus badge sits lower-right on the artwork, like reference. */
      .x13-mobile-bonus{right:10px!important;bottom:28px!important;width:142px!important;height:142px!important;border:6px double #FFD83D!important;box-shadow:0 0 0 3px rgba(255,216,61,.10),0 0 24px rgba(255,216,61,.30)!important}
      .x13-mobile-bonus strong{font-size:46px!important}
      .x13-mobile-bonus span{font-size:16px!important}
      .x13-mobile-bonus b{font-size:13px!important;padding:5px 18px!important}

      /* ID + trust cards overlay the lower-left part of artwork instead of sitting as separate blocks. */
      .x13-offer-row{display:block!important;position:relative!important;z-index:5!important;width:64%!important;margin:-186px 0 0 0!important;padding-left:6px!important}
      .x13-id-card,.x13-trust-card{min-height:78px!important;margin-bottom:10px!important;border-radius:18px!important;padding:10px 11px!important;gap:10px!important;background:linear-gradient(110deg,rgba(0,10,7,.95),rgba(0,6,4,.90))!important;box-shadow:0 0 20px rgba(21,217,176,.14)!important}
      .x13-id-icon,.x13-check{width:44px!important;height:44px!important;flex-basis:44px!important;font-size:20px!important}
      .x13-id-card small,.x13-trust-card small{font-size:13px!important;line-height:1.05!important}
      .x13-id-card strong{font-size:30px!important;line-height:.95!important}
      .x13-trust-card strong{font-size:10px!important;line-height:1.15!important;margin-top:5px!important}
      .x13-fast{width:42px!important;height:42px!important;border-width:4px!important;font-size:9px!important}

      /* CTA sits immediately after the poster block and spans almost edge-to-edge. */
      .x13-cta-block{margin-top:32px!important;padding-bottom:22px!important;text-align:center!important}
      .x13-cta-kicker{font-size:20px!important;line-height:1.12!important;margin-bottom:16px!important}
      .x13-main-wa{width:100%!important;min-height:78px!important;border-radius:44px!important;border-width:3px!important;gap:12px!important;padding:0 14px!important}
      .x13-main-wa strong{font-size:25px!important;letter-spacing:.2px!important}
      .x13-wa-icon{font-size:34px!important}.x13-arrow{font-size:40px!important}

      /* Four trust points stay on ONE horizontal strip, matching the supplied reference. */
      .x13-feature-strip{padding:0!important}
      .x13-features{display:grid!important;grid-template-columns:repeat(4,minmax(0,1fr))!important;gap:0!important;min-height:92px!important;padding:7px 4px!important}
      .x13-feature{min-width:0!important;min-height:76px!important;display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:center!important;text-align:center!important;gap:4px!important;padding:7px 3px!important}
      .x13-feature>span{font-size:22px!important;line-height:1!important}
      .x13-feature b{font-size:9.5px!important;line-height:1.05!important;white-space:normal!important}
      .x13-feature small{font-size:8.5px!important;line-height:1.05!important;margin-top:1px!important;white-space:normal!important}
      .x13-feature:not(:last-child):after{height:42px!important;background:rgba(255,210,26,.32)!important}

      /* Keep footer clean and centered after the compact strip. */
      .x13-footer{padding-top:30px!important}
      .x13-footer-grid{display:block!important;text-align:center!important}
      .x13-footer-brand img{margin:0 auto!important;width:215px!important}
      .x13-footer-brand p{margin:10px auto 24px!important}
      .x13-footer-links{margin-bottom:24px!important}
      .x13-footer-support>a{width:100%!important;justify-content:center!important}
      .x13-copyright{text-align:center!important}
    }
    </style>
    <?php
}, 999 );
