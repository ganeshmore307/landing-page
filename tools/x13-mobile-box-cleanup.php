<?php
/**
 * Final mobile-only cleanup for 13Xplay poster cards.
 * Keeps all text inside boxes and improves spacing/legibility.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-box-cleanup">
    @media (max-width:767px){
      /* Give the left cards a little more usable room without touching desktop. */
      .x13-mobile-id-card,
      .x13-mobile-trust-card{
        left:4vw!important;
        width:49vw!important;
        max-width:49vw!important;
        min-width:0!important;
        padding:1.6vw 1.8vw!important;
        gap:1.5vw!important;
        border-radius:4vw!important;
        overflow:hidden!important;
        align-items:center!important;
      }

      .x13-mobile-id-card{top:58.5vw!important;min-height:12.5vw!important}
      .x13-mobile-trust-card{top:72.5vw!important;min-height:11.7vw!important}

      /* Icons stay visible but no longer steal text width. */
      .x13-mobile-id-card .x13-id-icon,
      .x13-mobile-trust-card .x13-check{
        width:8.2vw!important;
        height:8.2vw!important;
        flex:0 0 8.2vw!important;
        font-size:4vw!important;
      }

      /* Text column must be allowed to shrink inside flexbox. */
      .x13-mobile-id-card > div:not(.x13-id-icon):not(.x13-fast),
      .x13-mobile-trust-card > div:not(.x13-check){
        min-width:0!important;
        max-width:100%!important;
        overflow:hidden!important;
      }

      .x13-mobile-id-card small{
        font-size:2.65vw!important;
        line-height:1.02!important;
        letter-spacing:0!important;
        white-space:normal!important;
        overflow-wrap:anywhere!important;
      }
      .x13-mobile-id-card strong{
        margin-top:.4vw!important;
        font-size:5vw!important;
        line-height:.92!important;
        letter-spacing:-.08vw!important;
        white-space:nowrap!important;
      }

      /* Trust card: intentionally two neat lines like the reference. */
      .x13-mobile-trust-card small{
        font-size:2.45vw!important;
        line-height:1.08!important;
        letter-spacing:-.02vw!important;
        white-space:normal!important;
        overflow-wrap:normal!important;
        word-break:normal!important;
      }
      .x13-mobile-trust-card strong{
        margin-top:.55vw!important;
        font-size:2.3vw!important;
        line-height:1.1!important;
        letter-spacing:0!important;
        white-space:normal!important;
        overflow-wrap:normal!important;
        word-break:normal!important;
      }

      /* Keep FAST circle contained in the ID card. */
      .x13-mobile-id-card .x13-fast{
        width:7.4vw!important;
        height:7.4vw!important;
        flex:0 0 7.4vw!important;
        margin-left:auto!important;
        border-width:.7vw!important;
        font-size:1.45vw!important;
      }

      /* Move badge slightly right and down so cards never collide with it. */
      .x13-mobile-bonus{
        right:3.2vw!important;
        top:59.5vw!important;
        width:29vw!important;
        height:29vw!important;
      }
      .x13-mobile-bonus strong{font-size:9.7vw!important}
      .x13-mobile-bonus span{font-size:3.6vw!important}
      .x13-mobile-bonus b{font-size:3vw!important;padding:1.05vw 4vw!important}

      /* CTA copy: prevent cramped poster-style words from touching. */
      .x13-cta-kicker{
        font-size:4.6vw!important;
        line-height:1.13!important;
        letter-spacing:.02vw!important;
        padding:0 3vw!important;
      }

      /* Trust strip labels also stay inside their four cells. */
      .x13-feature{overflow:hidden!important;padding:.8vw!important}
      .x13-feature b{
        font-size:2.15vw!important;
        line-height:1.05!important;
        white-space:normal!important;
        overflow-wrap:normal!important;
      }
      .x13-feature small{
        font-size:1.8vw!important;
        line-height:1.05!important;
        white-space:normal!important;
      }
    }

    @media (max-width:390px){
      .x13-mobile-id-card,
      .x13-mobile-trust-card{width:50vw!important;max-width:50vw!important}
      .x13-mobile-id-card small{font-size:2.6vw!important}
      .x13-mobile-id-card strong{font-size:4.8vw!important}
      .x13-mobile-trust-card small{font-size:2.35vw!important}
      .x13-mobile-trust-card strong{font-size:2.2vw!important}
      .x13-mobile-id-card .x13-fast{width:7vw!important;height:7vw!important;flex-basis:7vw!important}
    }

    @media (max-width:350px){
      .x13-mobile-id-card,
      .x13-mobile-trust-card{width:51vw!important;max-width:51vw!important}
      .x13-mobile-id-card small{font-size:2.55vw!important}
      .x13-mobile-id-card strong{font-size:4.6vw!important}
      .x13-mobile-trust-card small{font-size:2.25vw!important}
      .x13-mobile-trust-card strong{font-size:2.05vw!important}
      .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-mobile-bonus{width:28vw!important;height:28vw!important;right:2.5vw!important}
    }
    </style>
    <?php
}, 1200 );
