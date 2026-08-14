<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* =========================================================
   13XPLAY DIRECT LANDING PAGE
   Edit only these values when needed.
   ========================================================= */
$whatsapp_number  = '917058820881';
$whatsapp_message = 'Hi 13Xplay, I want to get my ID.';
$hero_image       = 'https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?auto=format&fit=crop&w=1600&q=88';

$whatsapp_url = 'https://wa.me/' . preg_replace( '/\D+/', '', $whatsapp_number ) . '?text=' . rawurlencode( $whatsapp_message );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#02070a">
<title>13Xplay</title>
<?php wp_head(); ?>
<style>
:root{
  --bg:#02070a;
  --panel:#071116;
  --teal:#18e0b0;
  --green:#13d96d;
  --gold:#ffc52b;
  --white:#ffffff;
  --muted:#b6c1c7;
}
*{box-sizing:border-box}
html{margin:0!important;background:var(--bg)!important;scroll-behavior:smooth}
body{margin:0!important;padding:0!important;background:var(--bg)!important;color:var(--white)!important;font-family:Inter,Arial,Helvetica,sans-serif!important;overflow-x:hidden}
body:before,body:after{display:none!important}
.x13-page{min-height:100vh;background:
 radial-gradient(circle at 75% 18%,rgba(24,224,176,.14),transparent 26%),
 radial-gradient(circle at 18% 85%,rgba(255,197,43,.05),transparent 24%),
 #02070a;display:flex;align-items:center;justify-content:center;padding:28px}
.x13-shell{width:min(1180px,100%);position:relative}
.x13-card{position:relative;overflow:hidden;border-radius:28px;border:1px solid rgba(255,255,255,.12);background:linear-gradient(145deg,#071218 0%,#02070a 60%);box-shadow:0 30px 90px rgba(0,0,0,.55),0 0 55px rgba(24,224,176,.06)}
.x13-top{height:86px;display:flex;align-items:center;padding:0 42px;border-bottom:1px solid rgba(255,255,255,.07);position:relative;z-index:5}
.x13-logo{display:inline-flex;align-items:center;font-weight:1000;font-style:italic;font-size:32px;line-height:1;letter-spacing:-2.5px;color:#fff;text-decoration:none;text-shadow:0 4px 18px rgba(255,255,255,.08)}
.x13-logo .x{color:var(--teal);font-size:1.18em;margin:0 1px;text-shadow:0 0 26px rgba(24,224,176,.4)}
.x13-main{min-height:650px;display:grid;grid-template-columns:1.03fr .97fr;align-items:stretch}
.x13-copy{position:relative;z-index:3;padding:70px 28px 70px 66px;display:flex;flex-direction:column;justify-content:center}
.x13-bonus{font-size:clamp(56px,6.3vw,92px);font-weight:1000;line-height:.92;letter-spacing:-5px;text-transform:uppercase;margin:0 0 30px;color:#fff}
.x13-bonus strong{display:inline-block;color:var(--gold);font-weight:1000;text-shadow:0 0 28px rgba(255,197,43,.16)}
.x13-id{width:min(520px,100%);padding:21px 26px;margin-bottom:26px;border-radius:18px;border:1px solid rgba(255,197,43,.62);background:linear-gradient(180deg,rgba(255,197,43,.16),rgba(255,197,43,.055));box-shadow:inset 0 0 0 1px rgba(255,255,255,.025),0 14px 40px rgba(0,0,0,.25);display:flex;align-items:center;justify-content:space-between;gap:18px}
.x13-id span{font-size:22px;font-weight:900;letter-spacing:.02em;color:#fff}
.x13-id strong{font-size:30px;line-height:1;color:var(--gold);font-weight:1000;white-space:nowrap}
.x13-wa{width:min(520px,100%);min-height:86px;border-radius:18px;background:linear-gradient(180deg,#23ef88 0%,#10c95f 100%);border:1px solid rgba(196,255,220,.82);box-shadow:0 16px 42px rgba(16,201,95,.25),inset 0 1px 0 rgba(255,255,255,.28);display:flex;align-items:center;justify-content:center;gap:16px;padding:18px 24px;color:#fff!important;text-decoration:none!important;transition:transform .2s ease,filter .2s ease,box-shadow .2s ease}
.x13-wa:hover{transform:translateY(-2px);filter:brightness(1.04);box-shadow:0 20px 48px rgba(16,201,95,.34)}
.x13-wa svg{width:42px;height:42px;flex:0 0 auto;fill:none;stroke:currentColor;stroke-width:1.9;stroke-linecap:round;stroke-linejoin:round}
.x13-wa b{font-size:25px;line-height:1;font-weight:1000;letter-spacing:.015em}
.x13-visual{position:relative;min-height:650px;background-image:linear-gradient(90deg,#02070a 0%,rgba(2,7,10,.18) 32%,rgba(2,7,10,.02) 70%),url('<?php echo esc_url( $hero_image ); ?>');background-size:cover;background-position:center;isolation:isolate}
.x13-visual:before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 50% 43%,rgba(24,224,176,.12),transparent 35%),linear-gradient(0deg,#02070a 0%,transparent 35%)}
.x13-visual:after{content:"";position:absolute;width:390px;height:390px;border-radius:50%;border:1px solid rgba(24,224,176,.28);box-shadow:0 0 70px rgba(24,224,176,.12),inset 0 0 70px rgba(24,224,176,.05);left:50%;top:50%;transform:translate(-45%,-50%)}
.x13-glow{position:absolute;z-index:2;left:50%;top:50%;width:12px;height:12px;border-radius:50%;background:var(--teal);box-shadow:0 0 22px 8px rgba(24,224,176,.75);transform:translate(150px,-160px)}
.x13-corner{position:absolute;z-index:4;right:24px;bottom:22px;font-weight:900;font-size:13px;letter-spacing:.18em;color:rgba(255,255,255,.5)}
.x13-mobile-stick{display:none}

@media(max-width:900px){
  .x13-page{padding:18px}
  .x13-card{border-radius:24px}
  .x13-top{height:76px;padding:0 26px}
  .x13-logo{font-size:28px}
  .x13-main{grid-template-columns:1fr;min-height:0}
  .x13-visual{order:1;min-height:420px;background-position:center 38%}
  .x13-copy{order:2;padding:38px 32px 44px;align-items:center;text-align:center}
  .x13-bonus{font-size:clamp(48px,11vw,72px);letter-spacing:-3.5px;margin-bottom:24px}
  .x13-id{max-width:620px}
  .x13-wa{max-width:620px}
}

@media(max-width:600px){
  .x13-page{min-height:100svh;padding:0;align-items:flex-start;background:#02070a}
  .x13-shell{width:100%}
  .x13-card{min-height:100svh;border:0;border-radius:0;box-shadow:none;background:#02070a}
  .x13-top{height:70px;padding:0 22px;background:rgba(2,7,10,.9);border-bottom:1px solid rgba(255,255,255,.06)}
  .x13-logo{font-size:27px}
  .x13-visual{min-height:46svh;background-position:center;background-size:cover}
  .x13-visual:after{width:250px;height:250px;opacity:.65}
  .x13-glow{transform:translate(95px,-105px);opacity:.65}
  .x13-copy{padding:25px 18px 102px}
  .x13-bonus{font-size:clamp(44px,14vw,63px);line-height:.92;letter-spacing:-3px;margin-bottom:18px}
  .x13-id{padding:18px 18px;border-radius:15px;margin-bottom:17px;gap:10px}
  .x13-id span{font-size:18px}
  .x13-id strong{font-size:25px}
  .x13-wa{min-height:74px;border-radius:15px;padding:15px 18px;gap:13px}
  .x13-wa svg{width:36px;height:36px}
  .x13-wa b{font-size:22px}
  .x13-corner{display:none}
  .x13-mobile-stick{position:fixed;z-index:999999;left:12px;right:12px;bottom:calc(12px + env(safe-area-inset-bottom));min-height:64px;display:flex;align-items:center;justify-content:center;gap:11px;border-radius:16px;background:linear-gradient(180deg,#23ef88,#10c95f);border:1px solid rgba(196,255,220,.82);box-shadow:0 15px 40px rgba(0,0,0,.55),0 0 28px rgba(16,201,95,.18);color:#fff!important;text-decoration:none!important;font-size:18px;font-weight:1000}
  .x13-mobile-stick svg{width:30px;height:30px;fill:none;stroke:currentColor;stroke-width:1.9;stroke-linecap:round;stroke-linejoin:round}
}
</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main class="x13-page">
  <div class="x13-shell">
    <section class="x13-card">
      <header class="x13-top">
        <a class="x13-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="13Xplay home">
          <span>13</span><span class="x">X</span><span>PLAY</span>
        </a>
      </header>

      <div class="x13-main">
        <div class="x13-copy">
          <h1 class="x13-bonus">GET <strong>10%</strong> EXTRA</h1>

          <div class="x13-id">
            <span>GET ID</span>
            <strong>IN 1 MIN</strong>
          </div>

          <a class="x13-wa" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M20 11.5a8 8 0 0 1-11.7 7.1L4 19.7l1.1-4.2A8 8 0 1 1 20 11.5Z"/>
              <path d="M8.5 7.8c.4-.4.9-.2 1.1.2l.8 1.8c.2.4.1.8-.3 1.1l-.5.5c.7 1.6 1.9 2.8 3.5 3.5l.5-.6c.3-.3.7-.4 1.1-.2l1.8.8c.4.2.6.7.3 1.1-.5 1-1.3 1.6-2.5 1.6-3.8 0-8-4.2-8-8 0-.7.2-1.4.6-1.8Z"/>
            </svg>
            <b>WHATSAPP NOW</b>
          </a>
        </div>

        <div class="x13-visual" aria-hidden="true">
          <span class="x13-glow"></span>
          <span class="x13-corner">13XPLAY</span>
        </div>
      </div>
    </section>
  </div>

  <a class="x13-mobile-stick" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
    <svg viewBox="0 0 24 24" aria-hidden="true">
      <path d="M20 11.5a8 8 0 0 1-11.7 7.1L4 19.7l1.1-4.2A8 8 0 1 1 20 11.5Z"/>
      <path d="M8.5 7.8c.4-.4.9-.2 1.1.2l.8 1.8c.2.4.1.8-.3 1.1l-.5.5c.7 1.6 1.9 2.8 3.5 3.5l.5-.6c.3-.3.7-.4 1.1-.2l1.8.8c.4.2.6.7.3 1.1-.5 1-1.3 1.6-2.5 1.6-3.8 0-8-4.2-8-8 0-.7.2-1.4.6-1.8Z"/>
    </svg>
    WHATSAPP NOW
  </a>
</main>

<?php wp_footer(); ?>
</body>
</html>
