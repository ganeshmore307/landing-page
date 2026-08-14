<?php
/**
 * Legacy mobile poster override intentionally disabled.
 * Mobile layout is controlled only by x13-mobile-reference-polish.php.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    echo '<style id="x13-mobile-poster-v2">/* disabled: mobile layout handled by x13-mobile-reference-polish */</style>';
}, 1010 );
