<?php
/**
 * Force 13XPlay WhatsApp CTA hover text/icon color to #15C93D.
 * Keeps the existing button background/border untouched.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', function() {
    ?>
    <style id="x13-whatsapp-hover-fix">
      .x13-main-wa:hover,
      .x13-main-wa:hover *,
      .x13-main-wa:focus-visible,
      .x13-main-wa:focus-visible * {
        color:#15C93D!important;
        fill:#15C93D!important;
        stroke:#15C93D!important;
      }
    </style>
    <?php
}, 999999 );
