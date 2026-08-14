<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<meta name="theme-color" content="#02070a">
<title>13Xplay</title>
<!-- deploy-trigger: 2026-08-14 -->
<style>
:root{--bg:#02070a;--teal:#18e0b0;--green:#16d86d;--gold:#ffc52b;--white:#fff;--muted:#aab6bc}
*{box-sizing:border-box}
html,body{margin:0;padding:0;min-height:100%;background:var(--bg);font-family:Arial,Helvetica,sans-serif;color:#fff}
body{overflow-x:hidden}
.page{min-height:100vh;background:radial-gradient(circle at 72% 22%,rgba(24,224,176,.14),transparent 28%),#02070a;display:flex;align-items:center;justify-content:center;padding:26px}
.shell{width:min(1180px,100%)}
.card{overflow:hidden;border:1px solid rgba(255,255,255,.12);border-radius:28px;background:linear-gradient(145deg,#071318 0%,#02070a 64%);box-shadow:0 28px 90px rgba(0,0,0,.58)}
.top{height:84px;display:flex;align-items:center;padding:0 42px;border-bottom:1px solid rgba(255,255,255,.07)}
.logo{font-size:33px;font-style:italic;font-weight:900;letter-spacing:-2.5px;color:#fff}
.logo .x{color:var(--teal);font-size:1.18em;text-shadow:0 0 25px rgba(24,224,176,.4)}
.main{display:grid;grid-template-columns:1.02fr .98fr;min-height:650px}
.copy{padding:68px 30px 68px 66px;display:flex;flex-direction:column;justify-content:center;position:relative;z-index:2}
.bonus{margin:0 0 30px;font-size:clamp(56px,6.3vw,92px);line-height:.92;letter-spacing:-5px;font-weight:1000;text-transform:uppercase}
.bonus strong{color:var(--gold);text-shadow:0 0 28px rgba(255,197,43,.16)}
.idbox{width:min(520px,100%);display:flex;align-items:center;justify-content:space-between;gap:18px;padding:22px 26px;margin-bottom:24px;border-radius:18px;border:1px solid rgba(255,197,43,.65);background:linear-gradient(180deg,rgba(255,197,43,.16),rgba(255,197,43,.05));box-shadow:0 14px 38px rgba(0,0,0,.23)}
.idbox span{font-size:22px;font-weight:900}
.idbox strong{font-size:30px;color:var(--gold);white-space:nowrap}
.wa{width:min(520px,100%);min-height:86px;display:flex;align-items:center;justify-content:center;gap:15px;padding:18px 24px;border-radius:18px;background:linear-gradient(180deg,#25ef89,#10c95f);border:1px solid rgba(196,255,220,.86);color:#fff;text-decoration:none;box-shadow:0 16px 42px rgba(16,201,95,.26);transition:.2s ease}
.wa:hover{transform:translateY(-2px);filter:brightness(1.04)}
.wa svg{width:42px;height:42px;fill:none;stroke:currentColor;stroke-width:1.9;stroke-linecap:round;stroke-linejoin:round}
.wa b{font-size:25px}
.visual{position:relative;min-height:650px;background-image:linear-gradient(90deg,#02070a 0%,rgba(2,7,10,.18) 32%,rgba(2,7,10,.02) 70%),url('https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?auto=format&fit=crop&w=1600&q=88');background-size:cover;background-position:center;isolation:isolate}
.visual:before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 50% 43%,rgba(24,224,176,.12),transparent 35%),linear-gradient(0deg,#02070a 0%,transparent 38%)}
.visual:after{content:"";position:absolute;width:390px;height:390px;border-radius:50%;border:1px solid rgba(24,224,176,.28);box-shadow:0 0 70px rgba(24,224,176,.12),inset 0 0 70px rgba(24,224,176,.05);left:50%;top:50%;transform:translate(-45%,-50%)}
.sticky{display:none}
@media(max-width:900px){
 .page{padding:16px}.main{grid-template-columns:1fr}.visual{order:1;min-height:430px;background-position:center 35%}.copy{order:2;align-items:center;text-align:center;padding:40px 30px 46px}.bonus{font-size:clamp(48px,10vw,72px);letter-spacing:-3.5px}.idbox,.wa{max-width:620px}
}
@media(max-width:600px){
 .page{padding:0;align-items:flex-start;min-height:100svh}.shell{width:100%}.card{border:0;border-radius:0;min-height:100svh}.top{height:68px;padding:0 20px;background:#02070a}.logo{font-size:27px}.main{display:flex;flex-direction:column}.visual{order:1;min-height:45svh;background-position:center;background-size:cover}.visual:after{width:245px;height:245px}.copy{order:2;padding:24px 17px 102px}.bonus{font-size:clamp(44px,14vw,62px);line-height:.92;letter-spacing:-3px;margin-bottom:18px}.idbox{padding:18px 18px;border-radius:15px;margin-bottom:16px}.idbox span{font-size:18px}.idbox strong{font-size:25px}.wa{min-height:74px;border-radius:15px}.wa svg{width:36px;height:36px}.wa b{font-size:22px}.sticky{position:fixed;z-index:99999;left:12px;right:12px;bottom:calc(12px + env(safe-area-inset-bottom));min-height:64px;display:flex;align-items:center;justify-content:center;gap:10px;border-radius:16px;background:linear-gradient(180deg,#25ef89,#10c95f);border:1px solid rgba(196,255,220,.86);box-shadow:0 16px 42px rgba(0,0,0,.55);color:#fff;text-decoration:none;font-size:18px;font-weight:900}.sticky svg{width:30px;height:30px;fill:none;stroke:currentColor;stroke-width:1.9;stroke-linecap:round;stroke-linejoin:round}
}
</style>
</head>
<body>
<main class="page">
  <div class="shell">
    <section class="card">
      <header class="top">
        <div class="logo">13<span class="x">X</span>PLAY</div>
      </header>
      <div class="main">
        <div class="copy">
          <h1 class="bonus">GET <strong>10%</strong> EXTRA</h1>
          <div class="idbox"><span>GET ID</span><strong>IN 1 MIN</strong></div>
          <a class="wa" href="https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID." target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.5a8 8 0 0 1-11.7 7.1L4 19.7l1.1-4.2A8 8 0 1 1 20 11.5Z"/><path d="M8.5 7.8c.4-.4.9-.2 1.1.2l.8 1.8c.2.4.1.8-.3 1.1l-.5.5c.7 1.6 1.9 2.8 3.5 3.5l.5-.6c.3-.3.7-.4 1.1-.2l1.8.8c.4.2.6.7.3 1.1-.5 1-1.3 1.6-2.5 1.6-3.8 0-8-4.2-8-8 0-.7.2-1.4.6-1.8Z"/></svg>
            <b>WHATSAPP NOW</b>
          </a>
        </div>
        <div class="visual" aria-hidden="true"></div>
      </div>
    </section>
  </div>
  <a class="sticky" href="https://wa.me/917058820881?text=Hi%2013Xplay%2C%20I%20want%20to%20get%20my%20ID." target="_blank" rel="noopener noreferrer">
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.5a8 8 0 0 1-11.7 7.1L4 19.7l1.1-4.2A8 8 0 1 1 20 11.5Z"/><path d="M8.5 7.8c.4-.4.9-.2 1.1.2l.8 1.8c.2.4.1.8-.3 1.1l-.5.5c.7 1.6 1.9 2.8 3.5 3.5l.5-.6c.3-.3.7-.4 1.1-.2l1.8.8c.4.2.6.7.3 1.1-.5 1-1.3 1.6-2.5 1.6-3.8 0-8-4.2-8-8 0-.7.2-1.4.6-1.8Z"/></svg>
    WHATSAPP NOW
  </a>
</main>
</body>
</html>
