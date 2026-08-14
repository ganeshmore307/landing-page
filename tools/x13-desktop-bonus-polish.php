<?php
/**
 * Desktop-only polish for the 13Xplay 10% EXTRA BONUS badge.
 * Keeps the original desktop position/footprint and only cleans the visual styling.
 * Mobile layout stays untouched.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-desktop-bonus-polish">
    @media (min-width: 768px) {
      .x13-art-side{position:relative!important}

      /* IMPORTANT: preserve the original approved desktop position. */
      .x13-bonus{
        position:absolute!important;
        right:0!important;
        left:auto!important;
        bottom:26px!important;
        top:auto!important;
        width:205px!important;
        height:205px!important;
        min-width:205px!important;
        min-height:205px!important;
        margin:0!important;
        padding:28px 18px 25px!important;
        display:flex!important;
        flex-direction:column!important;
        align-items:center!important;
        justify-content:center!important;
        gap:0!important;
        text-align:center!important;
        border-radius:50%!important;
        border:3px solid #FFD83D!important;
        outline:1px solid rgba(255,216,61,.40)!important;
        outline-offset:5px!important;
        background:radial-gradient(circle at 50% 38%,rgba(108,82,9,.78) 0%,rgba(48,37,7,.96) 32%,#171305 58%,#050604 82%)!important;
        box-shadow:0 0 0 6px rgba(72,54,5,.72),0 0 0 9px rgba(255,216,61,.48),0 0 30px rgba(255,203,28,.32),inset 0 0 30px rgba(255,216,61,.09)!important;
        overflow:visible!important;
        z-index:7!important;
      }

      .x13-bonus:before{
        content:"";
        position:absolute;
        inset:9px;
        border-radius:50%;
        border:1px solid rgba(255,235,135,.42);
        pointer-events:none;
      }

      .x13-bonus .x13-stars{
        position:absolute!important;
        top:23px!important;
        left:50%!important;
        transform:translateX(-50%)!important;
        width:100%!important;
        margin:0!important;
        color:#FFE56A!important;
        font-size:11px!important;
        line-height:1!important;
        letter-spacing:4px!important;
        white-space:nowrap!important;
      }

      .x13-bonus strong{
        display:block!important;
        margin:14px 0 0!important;
        padding:0!important;
        color:#FFD83D!important;
        font-size:66px!important;
        line-height:.88!important;
        font-weight:1000!important;
        letter-spacing:-3px!important;
        white-space:nowrap!important;
        text-shadow:0 2px 11px rgba(255,216,61,.32)!important;
      }

      .x13-bonus span{
        display:block!important;
        margin:7px 0 0!important;
        padding:0!important;
        width:auto!important;
        max-width:none!important;
        color:#FFD83D!important;
        font-size:23px!important;
        line-height:1!important;
        font-weight:1000!important;
        letter-spacing:.35px!important;
        white-space:nowrap!important;
        word-break:normal!important;
        overflow-wrap:normal!important;
      }

      .x13-bonus b{
        position:absolute!important;
        left:50%!important;
        right:auto!important;
        bottom:-13px!important;
        transform:translateX(-50%)!important;
        display:flex!important;
        align-items:center!important;
        justify-content:center!important;
        width:146px!important;
        min-width:146px!important;
        height:41px!important;
        margin:0!important;
        padding:0 16px!important;
        border:2px solid rgba(255,229,97,.74)!important;
        border-radius:999px!important;
        background:linear-gradient(180deg,#22e96c 0%,#079d3c 100%)!important;
        color:#fff!important;
        font-size:19px!important;
        line-height:1!important;
        font-weight:1000!important;
        letter-spacing:.55px!important;
        white-space:nowrap!important;
        box-shadow:0 6px 16px rgba(5,181,67,.34),inset 0 1px 0 rgba(255,255,255,.26)!important;
      }
    }
    </style>
    <?php
}, 1001 );
