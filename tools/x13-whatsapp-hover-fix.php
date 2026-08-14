<?php
/**
 * 13XPlay WhatsApp hover corrections.
 * Header WhatsApp hover: #15C93D.
 * Sticky/main WhatsApp hover: black.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', function() {
    ?>
    <style id="x13-whatsapp-hover-fix">
      .x13-header-wa:hover,
      .x13-header-wa:hover *,
      .x13-header-wa:focus-visible,
      .x13-header-wa:focus-visible * {
        color:#15C93D!important;
        fill:#15C93D!important;
        stroke:#15C93D!important;
      }

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
