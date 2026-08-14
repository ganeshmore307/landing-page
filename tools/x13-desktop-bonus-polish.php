<?php
/**
 * Desktop-only polish for the 13Xplay 10% EXTRA BONUS badge.
 * Keeps mobile layout untouched.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-desktop-bonus-polish">
    @media (min-width: 768px) {
      .x13-art-side{position:relative!important}

      .x13-bonus{
        position:absolute!important;
        left:-44px!important;
        right:auto!important;
        bottom:36px!important;
        top:auto!important;
        width:208px!important;
        height:208px!important;
        min-width:208px!important;
        min-height:208px!important;
        padding:30px 18px 26px!important;
        margin:0!important;
        display:flex!important;
        flex-direction:column!important;
        align-items:center!important;
        justify-content:center!important;
        gap:0!important;
        text-align:center!important;
        border-radius:50%!important;
        border:3px solid #FFD83D!important;
        outline:1px solid rgba(255,216,61,.42)!important;
        outline-offset:6px!important;
        background:
          radial-gradient(circle at 50% 38%,rgba(115,86,9,.78) 0%,rgba(50,39,7,.96) 31%,#171305 58%,#050604 82%)!important;
        box-shadow:
          0 0 0 7px rgba(74,55,4,.78),
          0 0 0 10px rgba(255,216,61,.52),
          0 0 34px rgba(255,203,28,.34),
          inset 0 0 34px rgba(255,216,61,.10)!important;
        overflow:visible!important;
        z-index:7!important;
      }

      .x13-bonus:before{
        content:"";
        position:absolute;
        inset:9px;
        border-radius:50%;
        border:1px solid rgba(255,233,126,.48);
        pointer-events:none;
      }

      .x13-bonus .x13-stars{
        position:absolute!important;
        top:24px!important;
        left:50%!important;
        transform:translateX(-50%)!important;
        width:100%!important;
        margin:0!important;
        color:#FFE56A!important;
        font-size:12px!important;
        line-height:1!important;
        letter-spacing:5px!important;
        white-space:nowrap!important;
      }

      .x13-bonus strong{
        display:block!important;
        margin:15px 0 0!important;
        padding:0!important;
        color:#FFD83D!important;
        font-size:68px!important;
        line-height:.88!important;
        font-weight:1000!important;
        letter-spacing:-3px!important;
        white-space:nowrap!important;
        text-shadow:0 2px 12px rgba(255,216,61,.34)!important;
      }

      .x13-bonus span{
        display:block!important;
        margin:7px 0 0!important;
        padding:0!important;
        width:auto!important;
        max-width:none!important;
        color:#FFD83D!important;
        font-size:24px!important;
        line-height:1!important;
        font-weight:1000!important;
        letter-spacing:.4px!important;
        white-space:nowrap!important;
        word-break:normal!important;
        overflow-wrap:normal!important;
      }

      .x13-bonus b{
        position:absolute!important;
        left:50%!important;
        right:auto!important;
        bottom:-15px!important;
        transform:translateX(-50%)!important;
        display:flex!important;
        align-items:center!important;
        justify-content:center!important;
        width:150px!important;
        min-width:150px!important;
        height:43px!important;
        margin:0!important;
        padding:0 18px!important;
        border:2px solid rgba(255,229,97,.78)!important;
        border-radius:999px!important;
        background:linear-gradient(180deg,#22e96c 0%,#079d3c 100%)!important;
        color:#fff!important;
        font-size:20px!important;
        line-height:1!important;
        font-weight:1000!important;
        letter-spacing:.6px!important;
        white-space:nowrap!important;
        box-shadow:0 6px 18px rgba(5,181,67,.36),inset 0 1px 0 rgba(255,255,255,.28)!important;
      }
    }
    </style>
    <?php
}, 1001 );
