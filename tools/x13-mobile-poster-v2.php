<?php
/**
 * Mobile poster V2 for 13Xplay.
 * Desktop remains untouched. Mobile becomes a single poster-style hero like the supplied reference.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-poster-v2">
    @media (max-width:767px){
      .x13-fixed{padding-bottom:92px!important;background:#010303!important}
      .x13-header-row{min-height:76px!important;padding-top:5px!important;padding-bottom:5px!important}
      .x13-logo-wrap img{width:145px!important;max-height:54px!important}
      .x13-mobile-welcome{font-size:11.5px!important;line-height:1.25!important;max-width:120px!important}

      .x13-hero{padding:0!important;background:#010303!important}
      .x13-hero-grid{display:block!important;min-height:0!important;padding-left:16px!important;padding-right:16px!important}
      .x13-copy{position:relative!important;min-height:650px!important;padding:0!important;overflow:visible!important}

      /* Full poster artwork behind all mobile hero content. */
      .x13-mobile-art{
        display:block!important;
        position:absolute!important;
        z-index:1!important;
        top:0!important;
        left:-16px!important;
        right:-16px!important;
        width:auto!important;
        height:650px!important;
        margin:0!important;
        overflow:hidden!important;
        border-radius:0!important;
      }
      .x13-mobile-art img{
        width:100%!important;
        height:100%!important;
        display:block!important;
        object-fit:cover!important;
        object-position:66% center!important;
        border-radius:0!important;
        filter:contrast(1.08) saturate(1.08) brightness(.96)!important;
      }
      .x13-mobile-art:after{
        content:""!important;
        position:absolute!important;
        inset:0!important;
        z-index:2!important;
        pointer-events:none!important;
        background:
          linear-gradient(90deg,rgba(0,4,3,.97) 0%,rgba(0,4,3,.90) 22%,rgba(0,4,3,.50) 44%,rgba(0,4,3,.08) 68%,rgba(0,0,0,.04) 100%),
          linear-gradient(180deg,rgba(0,0,0,.12) 0%,rgba(0,0,0,0) 54%,rgba(0,3,2,.76) 100%)!important;
      }

      /* Reference-like text on left side of the artwork. */
      .x13-eyebrow{
        position:absolute!important;
        z-index:7!important;
        top:24px!important;
        left:2px!important;
        width:55%!important;
        margin:0!important;
        padding:0!important;
        text-align:left!important;
        font-size:10px!important;
        line-height:1.2!important;
        letter-spacing:.25px!important;
        color:#fff!important;
      }
      .x13-copy h1{
        position:absolute!important;
        z-index:7!important;
        top:58px!important;
        left:0!important;
        width:54%!important;
        max-width:none!important;
        margin:0!important;
        padding:0!important;
        text-align:left!important;
        font-size:48px!important;
        line-height:.86!important;
        letter-spacing:-1px!important;
      }
      .x13-copy h1 span{display:block!important;white-space:normal!important}
      .x13-subtitle{
        position:absolute!important;
        z-index:7!important;
        top:222px!important;
        left:0!important;
        width:53%!important;
        max-width:none!important;
        margin:0!important;
        padding:10px 0!important;
        text-align:left!important;
        font-size:13px!important;
        line-height:1.23!important;
        letter-spacing:.2px!important;
        border-top:1px solid rgba(21,217,176,.58)!important;
        border-bottom:1px solid rgba(21,217,176,.58)!important;
      }

      /* ID card and bonus stay inside poster lower area. */
      .x13-mobile-id-card{
        left:2px!important;
        bottom:118px!important;
        width:194px!important;
        min-width:194px!important;
        max-width:194px!important;
        min-height:90px!important;
        padding:11px 11px!important;
        border-radius:20px!important;
        background:linear-gradient(110deg,rgba(0,12,8,.97),rgba(0,5,4,.95))!important;
        box-shadow:0 0 22px rgba(21,217,176,.20)!important;
      }
      .x13-mobile-id-card .x13-id-icon{width:44px!important;height:44px!important;flex-basis:44px!important;font-size:20px!important}
      .x13-mobile-id-card small{font-size:11px!important;line-height:1!important}
      .x13-mobile-id-card strong{font-size:29px!important;line-height:.95!important}
      .x13-mobile-id-card .x13-fast{width:40px!important;height:40px!important;flex-basis:40px!important;font-size:7px!important}

      .x13-mobile-bonus{
        right:9px!important;
        bottom:34px!important;
        width:126px!important;
        height:126px!important;
        border:5px double #FFD83D!important;
        box-shadow:0 0 0 3px rgba(255,216,61,.08),0 0 24px rgba(255,216,61,.32)!important;
        z-index:6!important;
      }
      .x13-mobile-bonus strong{font-size:40px!important;line-height:.87!important}
      .x13-mobile-bonus span{font-size:13px!important;line-height:1!important;white-space:nowrap!important}
      .x13-mobile-bonus b{font-size:12px!important;padding:5px 16px!important;bottom:2px!important;white-space:nowrap!important}

      .x13-offer-row{display:none!important}
      .x13-art-side{display:none!important}

      /* CTA immediately under poster; actual WhatsApp remains sticky. */
      .x13-cta-block{margin-top:0!important;padding:18px 16px 16px!important;text-align:center!important;background:#010303!important}
      .x13-cta-kicker{font-size:18px!important;line-height:1.14!important;margin:0 0 10px!important}
      .x13-main-wa{position:fixed!important;left:12px!important;right:12px!important;bottom:9px!important;width:auto!important;min-height:68px!important;margin:0!important;border-radius:38px!important;z-index:99999!important}
      .x13-main-wa strong{font-size:22px!important;white-space:nowrap!important}
      .x13-wa-icon{font-size:29px!important}
      .x13-arrow{font-size:34px!important}

      /* Keep trust strip compact and aligned like poster footer row. */
      .x13-features{min-height:94px!important;padding:7px 2px!important}
      .x13-feature{min-height:78px!important;padding:6px 2px!important;gap:4px!important}
      .x13-feature b{font-size:8.8px!important;line-height:1.06!important}
      .x13-feature small{font-size:7.8px!important;line-height:1.06!important}

      .elementor-editor-active .x13-main-wa{position:relative!important;left:auto!important;right:auto!important;bottom:auto!important;width:100%!important}
    }

    @media (max-width:390px){
      .x13-hero-grid{padding-left:13px!important;padding-right:13px!important}
      .x13-copy{min-height:620px!important}
      .x13-mobile-art{left:-13px!important;right:-13px!important;height:620px!important}
      .x13-copy h1{font-size:44px!important;width:56%!important;top:56px!important}
      .x13-subtitle{top:210px!important;width:55%!important;font-size:12.5px!important}
      .x13-mobile-id-card{left:0!important;bottom:112px!important;width:182px!important;min-width:182px!important;max-width:182px!important}
      .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-mobile-bonus{right:7px!important;bottom:30px!important;width:118px!important;height:118px!important}
      .x13-mobile-bonus strong{font-size:37px!important}
      .x13-main-wa strong{font-size:20px!important}
    }

    @media (max-width:350px){
      .x13-copy{min-height:590px!important}
      .x13-mobile-art{height:590px!important}
      .x13-copy h1{font-size:40px!important;width:57%!important}
      .x13-subtitle{top:198px!important;font-size:11.5px!important}
      .x13-mobile-id-card{width:168px!important;min-width:168px!important;max-width:168px!important;bottom:105px!important}
      .x13-mobile-id-card strong{font-size:25px!important}
      .x13-mobile-bonus{width:108px!important;height:108px!important;bottom:26px!important}
      .x13-mobile-bonus strong{font-size:34px!important}
    }
    </style>
    <?php
}, 1010 );
