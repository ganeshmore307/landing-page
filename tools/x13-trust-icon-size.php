<?php
/**
 * Larger trust-strip icons for the 13Xplay controlled landing page.
 * Applies to desktop and mobile without changing Elementor content.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-trust-icon-size">
      /* Desktop / tablet: make trust icons visually prominent. */
      .x13-feature > span{
        font-size:48px!important;
        line-height:1!important;
        min-width:54px!important;
        display:flex!important;
        align-items:center!important;
        justify-content:center!important;
      }
      .x13-feature{
        gap:14px!important;
      }

      @media (max-width:1024px){
        .x13-feature > span{
          font-size:42px!important;
          min-width:48px!important;
        }
      }

      @media (max-width:767px){
        .x13-feature > span{
          font-size:32px!important;
          min-width:34px!important;
          margin-bottom:2px!important;
        }
        .x13-feature{
          gap:5px!important;
        }
      }

      @media (max-width:390px){
        .x13-feature > span{
          font-size:30px!important;
          min-width:32px!important;
        }
      }
    </style>
    <?php
}, 1001 );
