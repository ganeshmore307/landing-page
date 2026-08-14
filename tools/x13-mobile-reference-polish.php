<?php
/**
 * Mobile-only alignment polish for the 13Xplay controlled Elementor landing page.
 * Desktop structure stays unchanged. Mobile follows the supplied poster reference.
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
      .x13-fixed{background:#010303!important;overflow-x:hidden!important;padding-bottom:92px!important}
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

      /* Artwork becomes the poster block. */
      .x13-mobile-art{display:block!important;position:relative!important;margin:18px -16px 0!important;height:515px!important;overflow:hidden!important;border-radius:0!important}
      .x13-mobile-art img{display:block!important;width:100%!important;height:100%!important;object-fit:cover!important;object-position:58% center!important;border-radius:0!important;filter:contrast(1.06) saturate(1.04)!important}
      .x13-mobile-art:after{content:""!important;position:absolute!important;inset:0!important;border-radius:0!important;background:linear-gradient(180deg,rgba(0,0,0,.02) 0%,rgba(0,0,0,.01) 58%,rgba(0,3,2,.74) 100%)!important;pointer-events:none!important}

      /* Cleaner 10% EXTRA BONUS badge in lower-right. */
      .x13-mobile-bonus{right:16px!important;bottom:20px!important;width:132px!important;height:132px!important;border:5px double #FFD83D!important;background:radial-gradient(circle at 50% 43%,#3c3108 0%,#161304 42%,#050604 72%)!important;box-shadow:0 0 0 3px rgba(255,216,61,.09),0 0 25px rgba(255,216,61,.34)!important;z-index:5!important}
      .x13-mobile-bonus strong{font-size:42px!important;line-height:.86!important;margin-top:-5px!important;text-shadow:0 2px 12px rgba(255,216,61,.30)!important}
      .x13-mobile-bonus span{font-size:14px!important;line-height:1!important;font-weight:1000!important;letter-spacing:.2px!important;margin-top:3px!important}
      .x13-mobile-bonus b{font-size:12px!important;line-height:1!important;padding:5px 17px!important;bottom:3px!important;background:linear-gradient(180deg,#19df62,#078e35)!important;box-shadow:0 4px 12px rgba(12,209,77,.30)!important}

      /* The original desktop offer row is hidden on phones; a mobile copy is inserted into artwork by JS below. */
      .x13-offer-row{display:none!important}
      .x13-mobile-id-card{position:absolute!important;left:16px!important;bottom:160px!important;z-index:6!important;width:calc(100% - 178px)!important;min-width:174px!important;max-width:220px!important;min-height:88px!important;margin:0!important;border:1px solid rgba(21,217,176,.90)!important;border-radius:18px!important;padding:11px 12px!important;display:flex!important;align-items:center!important;gap:10px!important;background:linear-gradient(110deg,rgba(0,12,8,.97),rgba(0,5,4,.94))!important;box-shadow:0 0 20px rgba(21,217,176,.18)!important}
      .x13-mobile-id-card .x13-id-icon{width:46px!important;height:46px!important;flex:0 0 46px!important;font-size:21px!important}
      .x13-mobile-id-card small{display:block!important;font-size:12px!important;line-height:1.05!important;font-weight:900!important;font-style:italic!important;white-space:nowrap!important}
      .x13-mobile-id-card strong{display:block!important;font-size:30px!important;line-height:.96!important;color:#8cff2d!important;font-weight:1000!important;font-style:italic!important;white-space:nowrap!important}
      .x13-mobile-id-card .x13-fast{margin-left:auto!important;width:42px!important;height:42px!important;flex:0 0 42px!important;border-width:4px!important;font-size:8px!important}

      /* CTA copy stays in flow, but the actual WhatsApp button is sticky at the bottom. */
      .x13-cta-block{margin-top:22px!important;padding-bottom:18px!important;text-align:center!important}
      .x13-cta-kicker{font-size:19px!important;line-height:1.15!important;margin:0 0 12px!important;padding:0 8px!important}
      .x13-main-wa{position:fixed!important;left:12px!important;right:12px!important;bottom:10px!important;z-index:99999!important;width:auto!important;min-height:68px!important;margin:0!important;border-radius:38px!important;border-width:3px!important;gap:10px!important;padding:0 14px!important;box-shadow:0 0 14px var(--x13-green),0 0 28px rgba(22,240,106,.48),inset 0 0 18px rgba(255,255,255,.18)!important}
      .x13-main-wa strong{font-size:23px!important;letter-spacing:.15px!important;white-space:nowrap!important}
      .x13-wa-icon{font-size:30px!important}
      .x13-arrow{font-size:36px!important}

      /* One straight, evenly aligned trust strip. */
      .x13-feature-strip{padding:0!important}
      .x13-features{display:grid!important;grid-template-columns:repeat(4,minmax(0,1fr))!important;gap:0!important;min-height:90px!important;padding:7px 2px!important}
      .x13-feature{min-width:0!important;min-height:76px!important;display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:center!important;text-align:center!important;gap:4px!important;padding:6px 3px!important}
      .x13-feature>span{font-size:21px!important;line-height:1!important}
      .x13-feature div{min-width:0!important;width:100%!important}
      .x13-feature b{display:block!important;font-size:9px!important;line-height:1.08!important;white-space:normal!important;word-break:normal!important}
      .x13-feature small{display:block!important;font-size:8px!important;line-height:1.08!important;margin-top:2px!important;white-space:normal!important}
      .x13-feature:not(:last-child):after{height:40px!important;background:rgba(255,210,26,.30)!important}

      /* Footer alignment + enough room above sticky CTA. */
      .x13-footer{padding:30px 0 30px!important}
      .x13-footer-grid{display:block!important;text-align:center!important}
      .x13-footer-brand img{margin:0 auto!important;width:205px!important}
      .x13-footer-brand p{margin:10px auto 22px!important;max-width:290px!important}
      .x13-footer-links{margin-bottom:22px!important;align-items:center!important}
      .x13-footer-support p{margin-left:auto!important;margin-right:auto!important}
      .x13-footer-support>a{width:100%!important;justify-content:center!important}
      .x13-copyright{text-align:center!important;margin-top:24px!important}

      /* Do not let the sticky CTA obstruct Elementor controls while actively editing. */
      .elementor-editor-active .x13-main-wa{position:relative!important;left:auto!important;right:auto!important;bottom:auto!important;width:100%!important;margin:0 auto!important}
    }

    @media (max-width:390px){
      .x13-shell{padding-left:13px!important;padding-right:13px!important}
      .x13-header-row{grid-template-columns:minmax(0,1fr) 112px!important;gap:8px!important}
      .x13-logo-wrap img{width:136px!important}
      .x13-mobile-welcome{font-size:11px!important;max-width:112px!important}
      .x13-copy h1{font-size:44px!important;max-width:300px!important}
      .x13-subtitle{font-size:13px!important;max-width:285px!important}
      .x13-mobile-art{margin-left:-13px!important;margin-right:-13px!important;height:490px!important}
      .x13-mobile-bonus{width:120px!important;height:120px!important;right:10px!important;bottom:18px!important}
      .x13-mobile-bonus strong{font-size:38px!important}
      .x13-mobile-id-card{left:12px!important;bottom:150px!important;width:calc(100% - 154px)!important;min-width:168px!important;padding:10px!important}
      .x13-mobile-id-card small{font-size:11px!important}
      .x13-mobile-id-card strong{font-size:27px!important}
      .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-main-wa strong{font-size:21px!important}
      .x13-wa-icon{font-size:28px!important}
      .x13-arrow{font-size:32px!important}
    }

    @media (max-width:350px){
      .x13-copy h1{font-size:40px!important}
      .x13-mobile-id-card{left:10px!important;width:172px!important;min-width:0!important}
      .x13-mobile-id-card .x13-id-icon{width:40px!important;height:40px!important;flex-basis:40px!important}
      .x13-mobile-id-card strong{font-size:24px!important}
      .x13-main-wa strong{font-size:20px!important}
      .x13-feature b{font-size:8.3px!important}
      .x13-feature small{font-size:7.4px!important}
    }
    </style>
    <script id="x13-mobile-reference-script">
    document.addEventListener('DOMContentLoaded', function(){
      function syncMobileIdCard(){
        var art = document.querySelector('.x13-mobile-art');
        var original = document.querySelector('.x13-id-card');
        var existing = art ? art.querySelector('.x13-mobile-id-card') : null;
        if (window.matchMedia('(max-width: 767px)').matches) {
          if (art && original && !existing) {
            var clone = original.cloneNode(true);
            clone.classList.add('x13-mobile-id-card');
            clone.removeAttribute('id');
            art.appendChild(clone);
          }
        } else if (existing) {
          existing.remove();
        }
      }
      syncMobileIdCard();
      window.addEventListener('resize', syncMobileIdCard);
    });
    </script>
    <?php
}, 999 );
