<?php
/**
 * Mobile-only final alignment fix for the GET ID card.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-id-card-fix">
    @media (max-width:767px){
      .x13-mobile-id-card{
        padding:1.35vw 1.75vw!important;
        gap:1.65vw!important;
        align-items:center!important;
        overflow:hidden!important;
      }

      .x13-mobile-id-card .x13-id-icon{
        width:7.2vw!important;
        height:7.2vw!important;
        flex:0 0 7.2vw!important;
        font-size:3.05vw!important;
        line-height:1!important;
        overflow:hidden!important;
        display:grid!important;
        place-items:center!important;
        transform:none!important;
      }

      .x13-mobile-id-card > div{
        min-width:0!important;
        flex:1 1 auto!important;
        padding:0!important;
        margin:0!important;
        position:relative!important;
        z-index:2!important;
      }

      .x13-mobile-id-card small{
        display:block!important;
        margin:0!important;
        padding:0!important;
        font-size:2.35vw!important;
        line-height:1.05!important;
        letter-spacing:.01vw!important;
        white-space:nowrap!important;
      }

      .x13-mobile-id-card strong{
        display:block!important;
        margin:.35vw 0 0!important;
        padding:0!important;
        font-size:4.55vw!important;
        line-height:.96!important;
        letter-spacing:-.03vw!important;
        white-space:nowrap!important;
      }

      .x13-mobile-id-card .x13-fast{
        width:6.6vw!important;
        height:6.6vw!important;
        flex:0 0 6.6vw!important;
        margin:0 0 0 .45vw!important;
        border-width:.55vw!important;
        font-size:1.18vw!important;
        line-height:1!important;
        display:grid!important;
        place-items:center!important;
      }
    }

    @media (max-width:390px){
      .x13-mobile-id-card{gap:1.45vw!important;padding-left:1.55vw!important;padding-right:1.55vw!important}
      .x13-mobile-id-card .x13-id-icon{width:6.9vw!important;height:6.9vw!important;flex-basis:6.9vw!important;font-size:2.9vw!important}
      .x13-mobile-id-card small{font-size:2.28vw!important}
      .x13-mobile-id-card strong{font-size:4.4vw!important}
      .x13-mobile-id-card .x13-fast{width:6.25vw!important;height:6.25vw!important;flex-basis:6.25vw!important;font-size:1.08vw!important}
    }

    @media (max-width:350px){
      .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-mobile-id-card strong{font-size:4.55vw!important}
    }
    </style>
    <?php
}, 1400 );
