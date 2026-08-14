<?php
/**
 * Mobile-only poster layout for the 13Xplay controlled Elementor landing page.
 * Desktop stays untouched. Mobile follows the supplied vertical reference.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-reference-polish">
    @media (max-width:767px){
      .x13-fixed{background:#010303!important;overflow-x:hidden!important;padding-bottom:92px!important}
      .x13-shell{width:100%!important;max-width:none!important;padding-left:16px!important;padding-right:16px!important}
      .x13-header{background:#000!important;border-bottom:1px solid rgba(20,218,178,.55)!important}
      .x13-header-row{min-height:76px!important;display:grid!important;grid-template-columns:minmax(0,1fr) 124px!important;gap:10px!important;align-items:center!important;padding:7px 14px!important}
      .x13-logo-wrap{display:flex!important;align-items:center!important;justify-content:flex-start!important;min-width:0!important}
      .x13-logo-wrap img{display:block!important;width:150px!important;max-width:100%!important;max-height:56px!important;object-fit:contain!important;object-position:left center!important}
      .x13-mobile-welcome{display:block!important;text-align:right!important;font-size:12px!important;font-weight:900!important;line-height:1.25!important;letter-spacing:.1px!important;color:#fff!important;max-width:124px!important;margin-left:auto!important}
      .x13-nav,.x13-secure,.x13-header-wa{display:none!important}

      .x13-hero{padding:0!important;background:#010303!important;border-bottom:1px solid rgba(20,218,178,.22)!important}
      .x13-hero-grid{display:block!important;min-height:0!important;padding:0!important}
      .x13-copy{position:relative!important;padding:0!important;margin:0!important;overflow:visible!important}
      .x13-art-side{display:none!important}

      .x13-mobile-art{display:block!important;position:relative!important;margin:0!important;width:100%!important;height:675px!important;overflow:hidden!important;border-radius:0!important;background:#020605!important}
      .x13-mobile-art img{display:block!important;width:100%!important;height:100%!important;object-fit:cover!important;object-position:68% center!important;border-radius:0!important;filter:contrast(1.08) saturate(1.06)!important}
      .x13-mobile-art:before{content:""!important;position:absolute!important;inset:0!important;z-index:2!important;background:linear-gradient(90deg,rgba(0,3,2,.94) 0%,rgba(0,3,2,.78) 23%,rgba(0,3,2,.28) 48%,rgba(0,3,2,.02) 74%),linear-gradient(180deg,rgba(0,0,0,.12) 0%,rgba(0,0,0,.02) 58%,rgba(0,3,2,.82) 100%)!important;pointer-events:none!important}
      .x13-mobile-art:after{content:""!important;position:absolute!important;left:14px!important;right:14px!important;bottom:0!important;height:1px!important;background:linear-gradient(90deg,transparent,#18d9b4,transparent)!important;z-index:3!important;pointer-events:none!important}

      .x13-eyebrow{position:absolute!important;z-index:6!important;left:16px!important;top:22px!important;margin:0!important;width:auto!important;text-align:left!important;font-size:11px!important;line-height:1.2!important;font-weight:800!important;letter-spacing:.35px!important;color:#fff!important}
      .x13-copy h1{position:absolute!important;z-index:6!important;left:16px!important;top:56px!important;width:56%!important;max-width:215px!important;margin:0!important;padding:0!important;text-align:left!important;font-size:48px!important;line-height:.88!important;letter-spacing:-.8px!important;text-shadow:0 3px 15px rgba(0,0,0,.75)!important}
      .x13-copy h1 span{display:block!important;margin:0!important;white-space:normal!important}
      .x13-subtitle{position:absolute!important;z-index:6!important;left:16px!important;top:196px!important;width:54%!important;max-width:205px!important;margin:0!important;padding:10px 0 8px!important;text-align:left!important;font-size:14px!important;line-height:1.22!important;font-weight:800!important;letter-spacing:.15px!important;color:#fff!important;border-top:1px solid rgba(21,217,176,.62)!important;border-bottom:1px solid rgba(21,217,176,.62)!important;text-shadow:0 2px 10px rgba(0,0,0,.8)!important}

      .x13-offer-row{display:none!important}
      .x13-mobile-id-card{position:absolute!important;left:16px!important;bottom:112px!important;z-index:7!important;width:190px!important;min-width:0!important;max-width:190px!important;min-height:96px!important;margin:0!important;border:1px solid rgba(25,228,187,.95)!important;border-radius:20px!important;padding:12px!important;display:flex!important;align-items:center!important;gap:10px!important;background:linear-gradient(110deg,rgba(0,12,9,.97),rgba(0,5,4,.95))!important;box-shadow:0 0 24px rgba(21,217,176,.18)!important}
      .x13-mobile-id-card .x13-id-icon{width:48px!important;height:48px!important;flex:0 0 48px!important;font-size:22px!important}
      .x13-mobile-id-card small{display:block!important;font-size:12px!important;line-height:1.05!important;font-weight:900!important;font-style:italic!important;white-space:nowrap!important}
      .x13-mobile-id-card strong{display:block!important;font-size:31px!important;line-height:.95!important;color:#8cff2d!important;font-weight:1000!important;font-style:italic!important;white-space:nowrap!important}
      .x13-mobile-id-card .x13-fast{display:none!important}

      .x13-mobile-bonus{position:absolute!important;right:14px!important;bottom:24px!important;z-index:7!important;width:126px!important;height:126px!important;margin:0!important;border-radius:50%!important;border:5px double #FFD83D!important;background:radial-gradient(circle at 50% 40%,#443609 0%,#171304 46%,#050604 75%)!important;box-shadow:0 0 0 3px rgba(255,216,61,.08),0 0 26px rgba(255,216,61,.36)!important;display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:center!important;color:#FFD83D!important;text-align:center!important}
      .x13-mobile-bonus strong{display:block!important;font-size:41px!important;line-height:.86!important;margin:-5px 0 0!important;white-space:nowrap!important}
      .x13-mobile-bonus span{display:block!important;font-size:14px!important;line-height:1!important;font-weight:1000!important;margin-top:4px!important;white-space:nowrap!important}
      .x13-mobile-bonus b{position:absolute!important;left:50%!important;bottom:-8px!important;transform:translateX(-50%)!important;display:flex!important;align-items:center!important;justify-content:center!important;width:96px!important;height:28px!important;padding:0!important;border-radius:999px!important;background:linear-gradient(180deg,#1ce663,#078e35)!important;color:#fff!important;font-size:12px!important;line-height:1!important;font-weight:1000!important;white-space:nowrap!important;box-shadow:0 4px 12px rgba(12,209,77,.30)!important}

      .x13-cta-block{margin:0!important;padding:20px 16px 20px!important;text-align:center!important;background:#010303!important}
      .x13-cta-kicker{font-size:19px!important;line-height:1.13!important;margin:0 0 10px!important;padding:0 6px!important}
      .x13-cta-kicker span,.x13-cta-kicker b{display:block!important}
      .x13-main-wa{position:fixed!important;left:12px!important;right:12px!important;bottom:10px!important;z-index:99999!important;width:auto!important;min-height:68px!important;margin:0!important;border-radius:38px!important;border-width:3px!important;gap:10px!important;padding:0 14px!important;box-shadow:0 0 14px var(--x13-green),0 0 28px rgba(22,240,106,.48),inset 0 0 18px rgba(255,255,255,.18)!important}
      .x13-main-wa strong{font-size:23px!important;letter-spacing:.1px!important;white-space:nowrap!important}
      .x13-wa-icon{font-size:30px!important}
      .x13-arrow{font-size:34px!important}

      .x13-feature-strip{padding:0!important;background:#050805!important;border-top:1px solid rgba(255,205,0,.24)!important;border-bottom:1px solid rgba(255,205,0,.24)!important}
      .x13-features{display:grid!important;grid-template-columns:repeat(4,minmax(0,1fr))!important;gap:0!important;min-height:94px!important;padding:6px 2px!important}
      .x13-feature{position:relative!important;min-width:0!important;min-height:80px!important;display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:center!important;text-align:center!important;gap:5px!important;padding:5px 3px!important}
      .x13-feature>span{font-size:32px!important;line-height:1!important;color:#FFD21A!important}
      .x13-feature div{min-width:0!important;width:100%!important}
      .x13-feature b{display:block!important;font-size:9px!important;line-height:1.08!important;color:#FFD21A!important;white-space:normal!important}
      .x13-feature small{display:block!important;font-size:8px!important;line-height:1.08!important;color:#FFF7CF!important;margin-top:2px!important;white-space:normal!important}
      .x13-feature:not(:last-child):after{content:""!important;position:absolute!important;right:0!important;top:50%!important;width:1px!important;height:42px!important;transform:translateY(-50%)!important;background:rgba(255,210,26,.30)!important}

      .x13-footer{padding:30px 0 30px!important}
      .x13-footer-grid{display:block!important;text-align:center!important}
      .x13-footer-brand img{margin:0 auto!important;width:205px!important}
      .x13-footer-brand p{margin:10px auto 22px!important;max-width:290px!important}
      .x13-footer-links{margin-bottom:22px!important;align-items:center!important}
      .x13-footer-support p{margin-left:auto!important;margin-right:auto!important}
      .x13-footer-support>a{width:100%!important;justify-content:center!important}
      .x13-copyright{text-align:center!important;margin-top:24px!important}

      .elementor-editor-active .x13-main-wa{position:relative!important;left:auto!important;right:auto!important;bottom:auto!important;width:100%!important;margin:0 auto!important}
    }

    @media (max-width:390px){
      .x13-header-row{grid-template-columns:minmax(0,1fr) 112px!important;padding-left:12px!important;padding-right:12px!important}
      .x13-logo-wrap img{width:138px!important}
      .x13-mobile-welcome{font-size:11px!important;max-width:112px!important}
      .x13-mobile-art{height:640px!important}
      .x13-eyebrow{left:13px!important;top:20px!important;font-size:10.5px!important}
      .x13-copy h1{left:13px!important;top:52px!important;width:57%!important;max-width:202px!important;font-size:44px!important}
      .x13-subtitle{left:13px!important;top:184px!important;width:54%!important;max-width:195px!important;font-size:13px!important}
      .x13-mobile-id-card{left:12px!important;bottom:106px!important;width:176px!important;max-width:176px!important;padding:10px!important}
      .x13-mobile-id-card .x13-id-icon{width:44px!important;height:44px!important;flex-basis:44px!important}
      .x13-mobile-id-card small{font-size:11px!important}
      .x13-mobile-id-card strong{font-size:28px!important}
      .x13-mobile-bonus{right:10px!important;bottom:22px!important;width:118px!important;height:118px!important}
      .x13-mobile-bonus strong{font-size:38px!important}
      .x13-main-wa strong{font-size:21px!important}
      .x13-wa-icon{font-size:28px!important}
      .x13-arrow{font-size:31px!important}
    }

    @media (max-width:350px){
      .x13-mobile-art{height:610px!important}
      .x13-copy h1{font-size:40px!important;max-width:184px!important}
      .x13-subtitle{top:174px!important;font-size:12px!important;max-width:175px!important}
      .x13-mobile-id-card{left:10px!important;bottom:100px!important;width:164px!important;max-width:164px!important}
      .x13-mobile-id-card .x13-id-icon{width:40px!important;height:40px!important;flex-basis:40px!important}
      .x13-mobile-id-card strong{font-size:25px!important}
      .x13-mobile-bonus{width:108px!important;height:108px!important;right:8px!important}
      .x13-mobile-bonus strong{font-size:35px!important}
      .x13-main-wa strong{font-size:20px!important}
      .x13-feature>span{font-size:29px!important}
      .x13-feature b{font-size:8.2px!important}
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
