<?php
/**
 * Mobile-only alignment polish for the 13Xplay controlled Elementor landing page.
 * Desktop structure stays unchanged. Mobile uses a clean vertical flow with no overlapping cards.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-reference-polish">
    /* Reference trust strip styling. */
    .x13-feature-strip{background:#050805!important;border-top:1px solid rgba(255,205,0,.22)!important;border-bottom:1px solid rgba(255,205,0,.22)!important}
    .x13-feature{position:relative!important}
    .x13-feature>span,.x13-feature b{color:#FFD21A!important}
    .x13-feature small{color:#FFF7CF!important}
    .x13-feature:not(:last-child):after{content:"";position:absolute;right:0;top:50%;width:1px;height:44px;transform:translateY(-50%);background:rgba(255,210,26,.28)}

    @media (max-width:767px){
      .x13-fixed{background:#010303!important;overflow-x:hidden!important}
      .x13-shell{width:100%!important;max-width:none!important;padding-left:16px!important;padding-right:16px!important}

      /* Header: balanced logo and welcome text. */
      .x13-header{background:#000!important;border-bottom:1px solid rgba(18,224,184,.42)!important}
      .x13-header-row{min-height:78px!important;display:grid!important;grid-template-columns:minmax(0,1fr) minmax(118px,.72fr)!important;gap:12px!important;align-items:center!important;padding-top:6px!important;padding-bottom:6px!important}
      .x13-logo-wrap{display:flex!important;align-items:center!important;justify-content:flex-start!important;min-width:0!important}
      .x13-logo-wrap img{display:block!important;width:148px!important;max-width:100%!important;max-height:56px!important;object-fit:contain!important;object-position:left center!important}
      .x13-mobile-welcome{display:block!important;text-align:right!important;font-size:12px!important;font-weight:900!important;line-height:1.28!important;letter-spacing:.15px!important;color:#fff!important;max-width:128px!important;margin-left:auto!important}
      .x13-nav,.x13-secure,.x13-header-wa{display:none!important}

      /* Clean centered intro. */
      .x13-hero{padding:18px 0 0!important;background:linear-gradient(180deg,#010404 0%,#020807 78%,#010303 100%)!important}
      .x13-hero-grid{display:block!important;min-height:0!important}
      .x13-copy{padding:0!important;overflow:visible!important}
      .x13-eyebrow{text-align:center!important;font-size:11px!important;line-height:1.2!important;letter-spacing:.4px!important;margin:7px 0 12px!important}
      .x13-copy h1{text-align:center!important;font-size:48px!important;line-height:.88!important;letter-spacing:-.8px!important;margin:0 auto 12px!important;padding:0!important;max-width:330px!important}
      .x13-copy h1 span{display:block!important;max-width:none!important;margin:0!important;white-space:normal!important}
      .x13-subtitle{text-align:center!important;font-size:14px!important;line-height:1.3!important;letter-spacing:.25px!important;width:100%!important;max-width:310px!important;margin:15px auto 0!important;padding:0 6px 13px!important;border-bottom:1px solid rgba(19,220,182,.48)!important}
      .x13-art-side{display:none!important}

      /* Artwork occupies one clean full-width block. */
      .x13-mobile-art{display:block!important;position:relative!important;margin:18px -16px 0!important;height:465px!important;overflow:hidden!important;border-radius:0!important}
      .x13-mobile-art img{display:block!important;width:100%!important;height:100%!important;object-fit:cover!important;object-position:58% center!important;border-radius:0!important;filter:contrast(1.06) saturate(1.04)!important}
      .x13-mobile-art:after{content:""!important;position:absolute!important;inset:0!important;border-radius:0!important;background:linear-gradient(180deg,rgba(0,0,0,.02) 0%,rgba(0,0,0,.01) 64%,rgba(0,3,2,.58) 100%)!important;pointer-events:none!important}

      /* Bonus badge stays inside the artwork without touching other blocks. */
      .x13-mobile-bonus{right:14px!important;bottom:16px!important;width:126px!important;height:126px!important;border:5px double #FFD83D!important;box-shadow:0 0 0 3px rgba(255,216,61,.08),0 0 22px rgba(255,216,61,.28)!important}
      .x13-mobile-bonus strong{font-size:40px!important;line-height:.9!important}
      .x13-mobile-bonus span{font-size:14px!important;font-weight:900!important}
      .x13-mobile-bonus b{font-size:12px!important;padding:4px 15px!important;bottom:2px!important}

      /* No negative margins or overlapping cards. */
      .x13-offer-row{display:block!important;position:static!important;width:100%!important;margin:0!important;padding:16px 0 0!important}
      .x13-id-card{width:100%!important;min-height:82px!important;margin:0!important;border-radius:16px!important;padding:12px 14px!important;gap:12px!important;background:linear-gradient(110deg,rgba(0,14,9,.97),rgba(0,7,5,.96))!important;box-shadow:0 0 18px rgba(21,217,176,.12)!important}
      .x13-trust-card{display:none!important}
      .x13-id-icon{width:46px!important;height:46px!important;flex:0 0 46px!important;font-size:21px!important}
      .x13-id-card small{font-size:13px!important;line-height:1.1!important}
      .x13-id-card strong{font-size:31px!important;line-height:.95!important}
      .x13-fast{margin-left:auto!important;width:44px!important;height:44px!important;border-width:4px!important;font-size:9px!important;flex:0 0 44px!important}

      /* CTA follows naturally after the ID block. */
      .x13-cta-block{margin-top:20px!important;padding-bottom:20px!important;text-align:center!important}
      .x13-cta-kicker{font-size:19px!important;line-height:1.15!important;margin:0 0 14px!important}
      .x13-main-wa{width:100%!important;min-height:76px!important;border-radius:42px!important;border-width:3px!important;gap:10px!important;padding:0 14px!important}
      .x13-main-wa strong{font-size:24px!important;letter-spacing:.15px!important;white-space:nowrap!important}
      .x13-wa-icon{font-size:32px!important}
      .x13-arrow{font-size:38px!important}

      /* One straight, evenly aligned trust strip. */
      .x13-feature-strip{padding:0!important}
      .x13-features{display:grid!important;grid-template-columns:repeat(4,minmax(0,1fr))!important;gap:0!important;min-height:90px!important;padding:7px 2px!important}
      .x13-feature{min-width:0!important;min-height:76px!important;display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:center!important;text-align:center!important;gap:4px!important;padding:6px 3px!important}
      .x13-feature>span{font-size:21px!important;line-height:1!important}
      .x13-feature div{min-width:0!important;width:100%!important}
      .x13-feature b{display:block!important;font-size:9px!important;line-height:1.08!important;white-space:normal!important;word-break:normal!important}
      .x13-feature small{display:block!important;font-size:8px!important;line-height:1.08!important;margin-top:2px!important;white-space:normal!important}
      .x13-feature:not(:last-child):after{height:40px!important;background:rgba(255,210,26,.30)!important}

      /* Footer alignment. */
      .x13-footer{padding:30px 0 18px!important}
      .x13-footer-grid{display:block!important;text-align:center!important}
      .x13-footer-brand img{margin:0 auto!important;width:205px!important}
      .x13-footer-brand p{margin:10px auto 22px!important;max-width:290px!important}
      .x13-footer-links{margin-bottom:22px!important;align-items:center!important}
      .x13-footer-support p{margin-left:auto!important;margin-right:auto!important}
      .x13-footer-support>a{width:100%!important;justify-content:center!important}
      .x13-copyright{text-align:center!important;margin-top:24px!important}
    }

    @media (max-width:390px){
      .x13-shell{padding-left:13px!important;padding-right:13px!important}
      .x13-header-row{grid-template-columns:minmax(0,1fr) 112px!important;gap:8px!important}
      .x13-logo-wrap img{width:136px!important}
      .x13-mobile-welcome{font-size:11px!important;max-width:112px!important}
      .x13-copy h1{font-size:44px!important;max-width:300px!important}
      .x13-subtitle{font-size:13px!important;max-width:285px!important}
      .x13-mobile-art{margin-left:-13px!important;margin-right:-13px!important;height:440px!important}
      .x13-mobile-bonus{width:116px!important;height:116px!important;right:10px!important}
      .x13-mobile-bonus strong{font-size:37px!important}
      .x13-main-wa strong{font-size:22px!important}
      .x13-wa-icon{font-size:29px!important}
      .x13-arrow{font-size:34px!important}
    }

    @media (max-width:350px){
      .x13-copy h1{font-size:40px!important}
      .x13-main-wa strong{font-size:20px!important}
      .x13-feature b{font-size:8.3px!important}
      .x13-feature small{font-size:7.4px!important}
    }
    </style>
    <?php
}, 999 );
