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
      .x13-fixed{background:#010303!important;overflow-x:hidden!important;padding-bottom:88px!important}
      .x13-shell{width:100%!important;max-width:none!important;padding-left:4vw!important;padding-right:4vw!important}

      /* Compact top header exactly like the supplied mobile poster. */
      .x13-header{background:#000!important;border-bottom:1px solid rgba(20,218,178,.55)!important}
      .x13-header-row{min-height:13vw!important;max-height:72px!important;display:grid!important;grid-template-columns:42% 58%!important;gap:0!important;align-items:center!important;padding:1.4vw 4vw!important}
      .x13-logo-wrap{display:flex!important;align-items:center!important;justify-content:flex-start!important;min-width:0!important}
      .x13-logo-wrap img{display:block!important;width:31vw!important;max-width:132px!important;max-height:10vw!important;object-fit:contain!important;object-position:left center!important}
      .x13-mobile-welcome{display:block!important;text-align:right!important;font-size:3.25vw!important;font-weight:1000!important;line-height:1.15!important;letter-spacing:.08vw!important;color:#fff!important;margin:0!important;padding:0!important}
      .x13-nav,.x13-secure,.x13-header-wa{display:none!important}

      /* One single poster hero. */
      .x13-hero{position:relative!important;padding:0!important;margin:0!important;background:#010303!important;border-bottom:1px solid rgba(20,218,178,.22)!important;overflow:hidden!important}
      .x13-hero-glow{display:none!important}
      .x13-hero-grid{display:block!important;position:relative!important;min-height:88vw!important;height:88vw!important;max-height:430px!important;padding:0!important;margin:0!important}
      .x13-copy{position:relative!important;z-index:3!important;width:100%!important;height:100%!important;min-height:0!important;padding:0!important;margin:0!important;overflow:visible!important}
      .x13-art-side{display:none!important}

      /* Player / phone artwork fills hero, matching reference framing. */
      .x13-mobile-art{display:block!important;position:absolute!important;z-index:1!important;inset:0!important;width:100%!important;height:100%!important;margin:0!important;padding:0!important;border-radius:0!important;overflow:hidden!important;background:#020605!important}
      .x13-mobile-art img{display:block!important;width:100%!important;height:100%!important;object-fit:cover!important;object-position:66% 43%!important;border-radius:0!important;filter:contrast(1.08) saturate(1.07) brightness(.95)!important}
      .x13-mobile-art:before{content:""!important;position:absolute!important;inset:0!important;z-index:2!important;background:linear-gradient(90deg,rgba(0,3,2,.98) 0%,rgba(0,3,2,.91) 24%,rgba(0,3,2,.56) 43%,rgba(0,3,2,.11) 66%,rgba(0,0,0,.02) 100%),linear-gradient(180deg,rgba(0,0,0,.08) 0%,rgba(0,0,0,0) 59%,rgba(0,3,2,.74) 100%)!important;pointer-events:none!important}
      .x13-mobile-art:after{content:""!important;position:absolute!important;left:4vw!important;right:4vw!important;bottom:0!important;height:1px!important;background:linear-gradient(90deg,transparent,#18d9b4,transparent)!important;z-index:3!important;pointer-events:none!important}

      /* Left-side poster typography. */
      .x13-eyebrow{position:absolute!important;z-index:8!important;left:4.2vw!important;top:4.4vw!important;width:46vw!important;margin:0!important;padding:0!important;text-align:left!important;font-size:2.5vw!important;line-height:1.15!important;font-weight:800!important;letter-spacing:.08vw!important;color:#fff!important}
      .x13-copy h1{position:absolute!important;z-index:8!important;left:4vw!important;top:10.5vw!important;width:46vw!important;max-width:none!important;margin:0!important;padding:0!important;text-align:left!important;font-size:11.8vw!important;line-height:.84!important;letter-spacing:-.25vw!important;text-shadow:0 3px 15px rgba(0,0,0,.72)!important}
      .x13-copy h1 span{display:block!important;margin:0!important;padding:0!important;white-space:nowrap!important}
      .x13-subtitle{position:absolute!important;z-index:8!important;left:4vw!important;top:46.5vw!important;width:47vw!important;max-width:none!important;margin:0!important;padding:2.2vw 0 2.1vw!important;text-align:left!important;font-size:3.2vw!important;line-height:1.18!important;font-weight:900!important;letter-spacing:.05vw!important;color:#fff!important;border-top:1px solid rgba(21,217,176,.62)!important;border-bottom:1px solid rgba(21,217,176,.62)!important;text-shadow:0 2px 10px rgba(0,0,0,.78)!important}

      /* Desktop cards are hidden; compact mobile clones are placed inside the poster. */
      .x13-offer-row{display:none!important}
      .x13-mobile-id-card,.x13-mobile-trust-card{position:absolute!important;z-index:8!important;left:4vw!important;width:47vw!important;margin:0!important;padding:1.7vw 2vw!important;display:flex!important;align-items:center!important;gap:1.8vw!important;border:1px solid rgba(21,217,176,.88)!important;border-radius:4.8vw!important;background:linear-gradient(110deg,rgba(0,13,9,.96),rgba(0,5,4,.92))!important;box-shadow:0 0 4.6vw rgba(21,217,176,.13)!important}
      .x13-mobile-id-card{top:59vw!important;min-height:11.5vw!important}
      .x13-mobile-trust-card{top:72.2vw!important;min-height:10.6vw!important}
      .x13-mobile-id-card .x13-id-icon,.x13-mobile-trust-card .x13-check{width:9vw!important;height:9vw!important;flex:0 0 9vw!important;font-size:4.5vw!important;box-shadow:0 0 4vw rgba(22,240,106,.28)!important}
      .x13-mobile-id-card small,.x13-mobile-trust-card small{display:block!important;font-size:3.1vw!important;line-height:1!important;font-weight:1000!important;font-style:italic!important;white-space:nowrap!important}
      .x13-mobile-id-card strong{display:block!important;margin-top:.5vw!important;color:#8cff2d!important;font-size:5.6vw!important;line-height:.92!important;font-weight:1000!important;font-style:italic!important;white-space:nowrap!important}
      .x13-mobile-trust-card strong{display:block!important;margin-top:.8vw!important;color:var(--x13-green)!important;font-size:2.8vw!important;line-height:1!important;font-weight:1000!important;white-space:nowrap!important}
      .x13-mobile-id-card .x13-fast{margin-left:auto!important;width:8.6vw!important;height:8.6vw!important;flex:0 0 8.6vw!important;border-width:.9vw!important;font-size:1.65vw!important}

      /* Clean 10% badge on the lower right. */
      .x13-mobile-bonus{position:absolute!important;right:4.5vw!important;top:58vw!important;bottom:auto!important;z-index:9!important;width:30.5vw!important;height:30.5vw!important;margin:0!important;border-radius:50%!important;border:1.2vw double #FFD83D!important;background:radial-gradient(circle at 50% 40%,#3f3309 0%,#171304 44%,#050604 72%)!important;box-shadow:0 0 0 .8vw rgba(255,216,61,.08),0 0 5vw rgba(255,216,61,.33)!important;display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:center!important;color:#FFD83D!important;text-align:center!important}
      .x13-mobile-bonus strong{display:block!important;margin:-1.2vw 0 0!important;font-size:10.5vw!important;line-height:.84!important;font-weight:1000!important;white-space:nowrap!important;text-shadow:0 1px 3vw rgba(255,216,61,.28)!important}
      .x13-mobile-bonus span{display:block!important;margin:.8vw 0 0!important;font-size:4vw!important;line-height:1!important;font-weight:1000!important;white-space:nowrap!important}
      .x13-mobile-bonus b{position:absolute!important;left:50%!important;bottom:.2vw!important;transform:translateX(-50%) rotate(-3deg)!important;padding:1.2vw 4.5vw!important;border-radius:999px!important;background:linear-gradient(180deg,#20df65,#078e35)!important;color:#fff!important;font-size:3.4vw!important;line-height:1!important;font-weight:1000!important;white-space:nowrap!important;box-shadow:0 1vw 3vw rgba(12,209,77,.28)!important}

      /* CTA copy below poster. */
      .x13-cta-block{position:relative!important;z-index:4!important;margin:0!important;padding:4.2vw 4vw 5vw!important;min-height:24vw!important;text-align:center!important;background:linear-gradient(180deg,#010303,#020605)!important;border-bottom:1px solid rgba(21,217,176,.24)!important}
      .x13-cta-kicker{margin:0!important;padding:0!important;font-size:5vw!important;line-height:1.08!important;text-align:center!important}
      .x13-cta-kicker span,.x13-cta-kicker b{display:block!important}

      /* Sticky WhatsApp button. */
      .x13-main-wa{position:fixed!important;z-index:99999!important;left:3vw!important;right:3vw!important;bottom:2.2vw!important;width:auto!important;min-height:16.5vw!important;max-height:74px!important;margin:0!important;padding:0 4vw!important;gap:2.6vw!important;border:3px solid #dfffaf!important;border-radius:999px!important;box-shadow:0 0 3vw var(--x13-green),0 0 7vw rgba(22,240,106,.48),inset 0 0 5vw rgba(255,255,255,.17)!important}
      .x13-main-wa strong{font-size:6.3vw!important;line-height:1!important;font-weight:1000!important;white-space:nowrap!important}
      .x13-wa-icon{font-size:8.3vw!important}
      .x13-arrow{font-size:9.5vw!important;line-height:1!important}

      /* Four trust points in one clean line. */
      .x13-feature-strip{padding:0!important;background:#050805!important;border-top:1px solid rgba(255,205,0,.24)!important;border-bottom:1px solid rgba(255,205,0,.24)!important}
      .x13-features{display:grid!important;grid-template-columns:repeat(4,minmax(0,1fr))!important;gap:0!important;min-height:17vw!important;padding:1.6vw 1.5vw!important}
      .x13-feature{position:relative!important;min-width:0!important;min-height:13.5vw!important;display:flex!important;flex-direction:column!important;align-items:center!important;justify-content:center!important;text-align:center!important;gap:1vw!important;padding:1vw!important}
      .x13-feature>span{font-size:7.2vw!important;line-height:1!important;color:#FFD21A!important}
      .x13-feature div{min-width:0!important;width:100%!important}
      .x13-feature b{display:block!important;font-size:2.35vw!important;line-height:1.08!important;color:#FFD21A!important;white-space:normal!important}
      .x13-feature small{display:block!important;font-size:2vw!important;line-height:1.08!important;color:#FFF7CF!important;margin-top:.5vw!important;white-space:normal!important}
      .x13-feature:not(:last-child):after{content:""!important;position:absolute!important;right:0!important;top:50%!important;width:1px!important;height:9vw!important;transform:translateY(-50%)!important;background:rgba(255,210,26,.30)!important}

      .x13-footer{padding:7vw 0 6vw!important}
      .x13-footer-grid{display:block!important;text-align:center!important}
      .x13-footer-brand img{margin:0 auto!important;width:48vw!important;max-width:220px!important}
      .x13-footer-brand p{max-width:78vw!important;margin:3vw auto 5vw!important}
      .x13-footer-links{margin-bottom:5vw!important;align-items:center!important}
      .x13-footer-support p{margin-left:auto!important;margin-right:auto!important}
      .x13-footer-support>a{width:100%!important;justify-content:center!important}
      .x13-copyright{text-align:center!important;margin-top:5vw!important}

      .elementor-editor-active .x13-main-wa{position:relative!important;left:auto!important;right:auto!important;bottom:auto!important;width:100%!important;margin-top:3vw!important}
    }

    @media (max-width:390px){
      .x13-copy h1{font-size:11.3vw!important}
      .x13-eyebrow{font-size:2.4vw!important}
      .x13-subtitle{font-size:3vw!important}
      .x13-mobile-id-card small,.x13-mobile-trust-card small{font-size:2.95vw!important}
      .x13-mobile-id-card strong{font-size:5.35vw!important}
      .x13-mobile-trust-card strong{font-size:2.65vw!important}
      .x13-main-wa strong{font-size:6vw!important}
    }

    @media (max-width:350px){
      .x13-header-row{min-height:50px!important}
      .x13-logo-wrap img{width:29vw!important}
      .x13-mobile-welcome{font-size:3vw!important}
      .x13-copy h1{font-size:10.9vw!important}
      .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-mobile-id-card strong{font-size:5vw!important}
      .x13-mobile-bonus{width:29vw!important;height:29vw!important}
      .x13-main-wa strong{font-size:5.7vw!important}
    }
    </style>

    <script id="x13-mobile-reference-script">
    document.addEventListener('DOMContentLoaded', function(){
      function syncMobilePosterCards(){
        var art = document.querySelector('.x13-mobile-art');
        var originalId = document.querySelector('.x13-offer-row .x13-id-card');
        var originalTrust = document.querySelector('.x13-offer-row .x13-trust-card');
        var mobileId = art ? art.querySelector('.x13-mobile-id-card') : null;
        var mobileTrust = art ? art.querySelector('.x13-mobile-trust-card') : null;
        var isMobile = window.matchMedia('(max-width: 767px)').matches;

        if (isMobile && art) {
          if (originalId && !mobileId) {
            mobileId = originalId.cloneNode(true);
            mobileId.classList.add('x13-mobile-id-card');
            mobileId.removeAttribute('id');
            art.appendChild(mobileId);
          }
          if (originalTrust && !mobileTrust) {
            mobileTrust = originalTrust.cloneNode(true);
            mobileTrust.classList.add('x13-mobile-trust-card');
            mobileTrust.removeAttribute('id');
            art.appendChild(mobileTrust);
          }
        } else {
          if (mobileId) mobileId.remove();
          if (mobileTrust) mobileTrust.remove();
        }
      }

      syncMobilePosterCards();
      window.addEventListener('resize', syncMobilePosterCards);
    });
    </script>
    <?php
}, 1030 );
