<?php
/**
 * Final mobile card correction for 13Xplay.
 * Keeps both poster cards identical in width and replaces the lightning glyph
 * with one pure CSS bolt so emoji/font rendering cannot duplicate or distort it.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_footer', function() {
    ?>
    <style id="x13-mobile-id-card-fix-final">
    @media (max-width:767px){
      /* BOTH MOBILE CARDS: exact same footprint and alignment. */
      .x13-fixed .x13-mobile-id-card,
      .x13-fixed .x13-mobile-trust-card{
        left:4vw!important;
        width:58vw!important;
        max-width:58vw!important;
        min-width:58vw!important;
        min-height:14vw!important;
        box-sizing:border-box!important;
        border-radius:5vw!important;
        padding:1.45vw 1.7vw!important;
        overflow:hidden!important;
      }

      /* GET ID CARD: fixed icon | text | FAST grid. */
      .x13-fixed .x13-mobile-id-card{
        display:grid!important;
        grid-template-columns:8vw minmax(0,1fr) 7vw!important;
        column-gap:1.5vw!important;
        align-items:center!important;
      }

      /* Completely reset the original lightning element. */
      .x13-fixed .x13-mobile-id-card .x13-id-icon{
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
        border:0!important;
        border-radius:50%!important;
        overflow:hidden!important;
        position:relative!important;
        background:#39ef72!important;
        background-image:none!important;
        box-shadow:0 0 3vw rgba(22,240,106,.24)!important;
        font-size:0!important;
        line-height:0!important;
        color:transparent!important;
        text-indent:-9999px!important;
        text-shadow:none!important;
        transform:none!important;
      }

      /* Remove every inherited pseudo-icon first. */
      .x13-fixed .x13-mobile-id-card .x13-id-icon::before,
      .x13-fixed .x13-mobile-id-card .x13-id-icon::after{
        content:""!important;
        display:block!important;
        position:absolute!important;
        margin:0!important;
        padding:0!important;
        border:0!important;
        transform:none!important;
      }

      /* One clean CSS lightning bolt — no emoji, no font glyph. */
      .x13-fixed .x13-mobile-id-card .x13-id-icon::before{
        left:50%!important;
        top:50%!important;
        width:3.15vw!important;
        height:5.4vw!important;
        transform:translate(-50%,-50%)!important;
        background:#06341d!important;
        clip-path:polygon(54% 0,12% 52%,43% 52%,27% 100%,88% 39%,57% 39%,78% 0)!important;
        -webkit-clip-path:polygon(54% 0,12% 52%,43% 52%,27% 100%,88% 39%,57% 39%,78% 0)!important;
        z-index:2!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-id-icon::after{
        display:none!important;
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
        margin:0 0 .28vw!important;
        padding:0!important;
        font-size:2.45vw!important;
        line-height:1.05!important;
        letter-spacing:0!important;
        white-space:nowrap!important;
      }
      .x13-fixed .x13-mobile-id-card strong{
        display:block!important;
        margin:0!important;
        padding:0!important;
        font-size:4.75vw!important;
        line-height:.98!important;
        letter-spacing:-.03vw!important;
        white-space:nowrap!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-fast{
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
        font-size:1.05vw!important;
        line-height:1!important;
        display:grid!important;
        place-items:center!important;
        justify-self:end!important;
        overflow:hidden!important;
      }

      /* TRUST CARD: same width/height/icon proportions as GET ID card. */
      .x13-fixed .x13-mobile-trust-card{
        display:flex!important;
        align-items:center!important;
        gap:1.8vw!important;
      }
      .x13-fixed .x13-mobile-trust-card .x13-check{
        width:8vw!important;
        height:8vw!important;
        min-width:8vw!important;
        min-height:8vw!important;
        max-width:8vw!important;
        max-height:8vw!important;
        flex:0 0 8vw!important;
        margin:0!important;
        border-radius:50%!important;
        background:#39ef72!important;
        background-image:none!important;
        box-shadow:0 0 3vw rgba(22,240,106,.20)!important;
        color:#06341d!important;
        font-size:5vw!important;
        line-height:1!important;
        display:grid!important;
        place-items:center!important;
      }
      .x13-fixed .x13-mobile-trust-card > div{
        min-width:0!important;
        flex:1 1 auto!important;
        overflow:hidden!important;
      }
      .x13-fixed .x13-mobile-trust-card small{
        font-size:2.55vw!important;
        line-height:1.06!important;
        white-space:normal!important;
      }
      .x13-fixed .x13-mobile-trust-card strong{
        margin-top:.45vw!important;
        font-size:2.45vw!important;
        line-height:1.08!important;
        white-space:normal!important;
      }
    }

    @media (max-width:390px){
      .x13-fixed .x13-mobile-id-card,
      .x13-fixed .x13-mobile-trust-card{
        width:59vw!important;
        max-width:59vw!important;
        min-width:59vw!important;
      }
      .x13-fixed .x13-mobile-id-card{
        grid-template-columns:7.8vw minmax(0,1fr) 6.8vw!important;
        column-gap:1.35vw!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-id-icon,
      .x13-fixed .x13-mobile-trust-card .x13-check{
        width:7.8vw!important;
        height:7.8vw!important;
        min-width:7.8vw!important;
        min-height:7.8vw!important;
        max-width:7.8vw!important;
        max-height:7.8vw!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-id-icon::before{width:3vw!important;height:5.15vw!important}
      .x13-fixed .x13-mobile-id-card small{font-size:2.35vw!important}
      .x13-fixed .x13-mobile-id-card strong{font-size:4.6vw!important}
      .x13-fixed .x13-mobile-id-card .x13-fast{
        width:6.8vw!important;height:6.8vw!important;min-width:6.8vw!important;min-height:6.8vw!important;max-width:6.8vw!important;max-height:6.8vw!important;font-size:1vw!important;
      }
      .x13-fixed .x13-mobile-trust-card .x13-check{flex-basis:7.8vw!important;font-size:4.8vw!important}
      .x13-fixed .x13-mobile-trust-card small{font-size:2.45vw!important}
      .x13-fixed .x13-mobile-trust-card strong{font-size:2.35vw!important}
    }

    @media (max-width:350px){
      .x13-fixed .x13-mobile-id-card,
      .x13-fixed .x13-mobile-trust-card{
        width:60vw!important;
        max-width:60vw!important;
        min-width:60vw!important;
      }
      .x13-fixed .x13-mobile-id-card{
        grid-template-columns:7.5vw minmax(0,1fr)!important;
      }
      .x13-fixed .x13-mobile-id-card .x13-fast{display:none!important}
      .x13-fixed .x13-mobile-id-card strong{font-size:4.75vw!important}
    }
    </style>

    <script id="x13-mobile-single-lightning-fix">
    (function(){
      function clearOriginalLightning(){
        document.querySelectorAll('.x13-mobile-id-card .x13-id-icon').forEach(function(icon){
          icon.textContent = '';
          icon.removeAttribute('aria-label');
          icon.setAttribute('aria-hidden','true');
        });
      }
      function runFix(){ clearOriginalLightning(); }
      document.addEventListener('DOMContentLoaded', function(){
        runFix();
        setTimeout(runFix, 50);
        setTimeout(runFix, 250);
        setTimeout(runFix, 800);
      });
      if (window.MutationObserver) {
        var startObserver = function(){
          if (!document.body) return;
          new MutationObserver(clearOriginalLightning).observe(document.body,{childList:true,subtree:true});
        };
        if (document.body) startObserver(); else document.addEventListener('DOMContentLoaded', startObserver);
      }
    })();
    </script>
    <?php
}, 999999 );
