<?php
/**
 * Force 13XPlay WhatsApp CTA hover text/icon color to black.
 * Keeps the existing green background/border untouched.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', function() {
    ?>
    <style id="x13-whatsapp-hover-fix">
      .x13-main-wa:hover,
      .x13-main-wa:hover *,
      .x13-main-wa:focus-visible,
      .x13-main-wa:focus-visible * {
        color:#000000!important;
        fill:#000000!important;
        stroke:#000000!important;
      }
    </style>
    <?php
}, 999999 );
