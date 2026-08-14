<?php
/**
 * 13XPlay header WhatsApp hover correction.
 * Applies #15C93D only to the HEADER WhatsApp button.
 * Does not override the bottom/main WhatsApp CTA.
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
    </style>
    <?php
}, 999999 );
