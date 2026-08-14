<?php
/**
 * Mobile title cleanup for the 13Xplay poster heading.
 * Keeps desktop untouched and only refines PLAY MORE / WIN WITH US on phones.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    if ( ! is_front_page() && ! is_page( 28 ) ) { return; }
    ?>
    <style id="x13-mobile-poster-v2">
    @media (max-width:767px){
      .x13-copy h1{
        left:4.5vw!important;
        top:16.2vw!important;
        width:53vw!important;
        max-width:53vw!important;
        font-size:10.4vw!important;
        line-height:1!important;
        letter-spacing:-.10vw!important;
        text-align:left!important;
      }
      .x13-copy h1 span{
        display:block!important;
        line-height:1!important;
        white-space:nowrap!important;
        margin:0!important;
      }
      .x13-copy h1 span + span{
        margin-top:1.55vw!important;
      }
    }

    @media (max-width:390px){
      .x13-copy h1{
        width:54vw!important;
        max-width:54vw!important;
        font-size:10.1vw!important;
      }
      .x13-copy h1 span + span{
        margin-top:1.7vw!important;
      }
    }

    @media (max-width:350px){
      .x13-copy h1{
        width:55vw!important;
        max-width:55vw!important;
        font-size:9.8vw!important;
      }
    }
    </style>
    <?php
}, 1300 );
