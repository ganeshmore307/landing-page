<?php
/**
 * Final mobile GET ID card correction.
 * Printed in the footer so it loads after the widget/mobile styles and cannot be overridden.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', function() {
    ?>
    <style id="x13-mobile-id-card-fix-final">
    @media (max-width:767px){
      .x13-fixed .x13-mobile-id-card{
        left:4vw!important;
        width:54vw!important;
        max-width:54vw!important;
        min-height:13vw!important;
        padding:1.35vw 1.55vw!important;
        display:grid!important;
        grid-template-columns:7.4vw minmax(0,1fr) 6.2vw!important;
        column-gap:1.35vw!important;
        align-items:center!important;
        box-sizing:border-box!important;
        overflow:hidden!important;
      }

      .x13-fixed .x13-mobile-id-card .x13-id-icon{
        grid-column:1!important;
        width:7.4vw!important;
        height:7.4vw!important;
        min-width:7.4vw!important;
        min-height:7.4vw!important;
        max-width:7.4vw!important;
        max-height:7.4vw!important;
        margin:0!important;
        padding:0!important;
        display:grid!important;
        place-items:center!important;
        border-radius:50%!important;
        overflow:hidden!important;
        font-size:0!important;
        line-height:1!important;
        color:transparent!important;
        transform:none!important;
        position:relative!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-id-icon::before{
        content:"⚡"!important;
        display:block!important;
        position:absolute!important;
        left:50%!important;
        top:50%!important;
        transform:translate(-50%,-50%)!important;
        font-family:Arial,Helvetica,sans-serif!important;
        font-size:3.5vw!important;
        line-height:1!important;
        font-style:normal!important;
        font-weight:900!important;
        color:#ffd83d!important;
      }

      .x13-fixed .x13-mobile-id-card > div{
        grid-column:2!important;
        min-width:0!important;
        width:100%!important;
        max-width:100%!important;
        margin:0!important;
        padding:0!important;
        display:block!important;
        overflow:hidden!important;
      }
      .x13-fixed .x13-mobile-id-card small{
        display:block!important;
        margin:0 0 .25vw!important;
        padding:0!important;
        font-size:2.25vw!important;
        line-height:1.05!important;
        letter-spacing:0!important;
        white-space:nowrap!important;
      }
      .x13-fixed .x13-mobile-id-card strong{
        display:block!important;
        margin:0!important;
        padding:0!important;
        font-size:4.35vw!important;
        line-height:.98!important;
        letter-spacing:-.03vw!important;
        white-space:nowrap!important;
      }

      .x13-fixed .x13-mobile-id-card .x13-fast{
        grid-column:3!important;
        width:6.2vw!important;
        height:6.2vw!important;
        min-width:6.2vw!important;
        min-height:6.2vw!important;
        max-width:6.2vw!important;
        max-height:6.2vw!important;
        margin:0!important;
        padding:0!important;
        border-width:.5vw!important;
        font-size:1vw!important;
        line-height:1!important;
        display:grid!important;
        place-items:center!important;
        justify-self:end!important;
        overflow:hidden!important;
      }
    }

    @media (max-width:390px){
      .x13-fixed .x13-mobile-id-card{
        width:55vw!important;
        max-width:55vw!important;
        grid-template-columns:7.2vw minmax(0,1fr) 6vw!important;
        column-gap:1.25vw!important;
        padding-left:1.45vw!important;
        padding-right:1.45vw!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-id-icon{
        width:7.2vw!important;height:7.2vw!important;min-width:7.2vw!important;min-height:7.2vw!important;max-width:7.2vw!important;max-height:7.2vw!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-id-icon::before{font-size:3.35vw!important}
      .x13-fixed .x13-mobile-id-card small{font-size:2.18vw!important}
      .x13-fixed .x13-mobile-id-card strong{font-size:4.25vw!important}
      .x13-fixed .x13-mobile-id-card .x13-fast{
        width:6vw!important;height:6vw!important;min-width:6vw!important;min-height:6vw!important;max-width:6vw!important;max-height:6vw!important;font-size:.95vw!important;
      }
    }

    @media (max-width:350px){
      .x13-fixed .x13-mobile-id-card{
        width:55vw!important;
        max-width:55vw!important;
        grid-template-columns:7vw minmax(0,1fr)!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-fixed .x13-mobile-id-card strong{font-size:4.4vw!important}
    }
    </style>
    <?php
}, 999999 );
