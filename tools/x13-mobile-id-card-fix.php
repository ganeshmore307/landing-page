<?php
/**
 * Mobile-only final alignment fix for the GET ID card.
 * Uses an explicit 3-column grid: icon | text | FAST seal.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-id-card-fix">
    @media (max-width:767px){
      .x13-mobile-id-card{
        left:4vw!important;
        width:52vw!important;
        max-width:52vw!important;
        min-height:13.2vw!important;
        padding:1.45vw 1.8vw!important;
        display:grid!important;
        grid-template-columns:8vw minmax(0,1fr) 7vw!important;
        column-gap:1.6vw!important;
        align-items:center!important;
        overflow:hidden!important;
        box-sizing:border-box!important;
      }

      /* Replace the emoji-style bolt with a compact text glyph so it cannot spill outside the circle. */
      .x13-mobile-id-card .x13-id-icon{
        grid-column:1!important;
        width:8vw!important;
        height:8vw!important;
        min-width:8vw!important;
        min-height:8vw!important;
        max-width:8vw!important;
        max-height:8vw!important;
        margin:0!important;
        padding:0!important;
        display:grid!important;
        place-items:center!important;
        overflow:hidden!important;
        font-size:0!important;
        line-height:1!important;
        transform:none!important;
        flex:none!important;
      }
      .x13-mobile-id-card .x13-id-icon::before{
        content:"⚡︎"!important;
        display:block!important;
        font-family:Arial,Helvetica,sans-serif!important;
        font-size:4vw!important;
        line-height:1!important;
        color:#083d21!important;
        font-style:normal!important;
        font-weight:900!important;
        transform:none!important;
      }

      .x13-mobile-id-card > div{
        grid-column:2!important;
        min-width:0!important;
        width:100%!important;
        max-width:100%!important;
        padding:0!important;
        margin:0!important;
        overflow:visible!important;
        position:relative!important;
        z-index:2!important;
        display:block!important;
      }

      .x13-mobile-id-card small{
        display:block!important;
        margin:0 0 .35vw!important;
        padding:0!important;
        font-size:2.45vw!important;
        line-height:1.05!important;
        letter-spacing:.02vw!important;
        white-space:nowrap!important;
        overflow:visible!important;
      }

      .x13-mobile-id-card strong{
        display:block!important;
        margin:0!important;
        padding:0!important;
        font-size:4.7vw!important;
        line-height:1!important;
        letter-spacing:-.04vw!important;
        white-space:nowrap!important;
        overflow:visible!important;
      }

      .x13-mobile-id-card .x13-fast{
        grid-column:3!important;
        width:7vw!important;
        height:7vw!important;
        min-width:7vw!important;
        min-height:7vw!important;
        max-width:7vw!important;
        max-height:7vw!important;
        margin:0!important;
        padding:0!important;
        border-width:.55vw!important;
        font-size:1.18vw!important;
        line-height:1!important;
        display:grid!important;
        place-items:center!important;
        justify-self:end!important;
        overflow:hidden!important;
        flex:none!important;
      }
    }

    @media (max-width:390px){
      .x13-mobile-id-card{
        width:53vw!important;
        max-width:53vw!important;
        grid-template-columns:7.8vw minmax(0,1fr) 6.8vw!important;
        column-gap:1.45vw!important;
        padding-left:1.65vw!important;
        padding-right:1.65vw!important;
      }
      .x13-mobile-id-card .x13-id-icon{
        width:7.8vw!important;height:7.8vw!important;min-width:7.8vw!important;min-height:7.8vw!important;max-width:7.8vw!important;max-height:7.8vw!important;
      }
      .x13-mobile-id-card .x13-id-icon::before{font-size:3.85vw!important}
      .x13-mobile-id-card small{font-size:2.4vw!important}
      .x13-mobile-id-card strong{font-size:4.6vw!important}
      .x13-mobile-id-card .x13-fast{
        width:6.8vw!important;height:6.8vw!important;min-width:6.8vw!important;min-height:6.8vw!important;max-width:6.8vw!important;max-height:6.8vw!important;font-size:1.08vw!important;
      }
    }

    @media (max-width:350px){
      .x13-mobile-id-card{
        width:54vw!important;
        max-width:54vw!important;
        grid-template-columns:7.5vw minmax(0,1fr)!important;
        column-gap:1.5vw!important;
      }
      .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-mobile-id-card .x13-id-icon{
        width:7.5vw!important;height:7.5vw!important;min-width:7.5vw!important;min-height:7.5vw!important;max-width:7.5vw!important;max-height:7.5vw!important;
      }
      .x13-mobile-id-card strong{font-size:4.8vw!important}
    }
    </style>
    <?php
}, 1600 );
