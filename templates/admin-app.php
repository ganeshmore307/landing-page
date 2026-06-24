<?php defined('ABSPATH') || exit; ?>
<div class="wrap aacrm-app">
    <h1>Agency AI CRM SaaS</h1>
    <section class="aacrm-grid">
        <article><strong>Total Leads</strong><span data-metric="total_leads">—</span></article>
        <article><strong>Qualified Leads</strong><span data-metric="qualified_leads">—</span></article>
        <article><strong>Revenue</strong><span data-metric="revenue">—</span></article>
        <article><strong>Conversion Rate</strong><span data-metric="conversion_rate">—</span></article>
    </section>
    <nav class="aacrm-tabs">
        <button data-tab="inbox">WhatsApp Inbox</button><button data-tab="pipeline">Pipeline</button><button data-tab="ai">AI Insights</button><button data-tab="campaigns">Campaigns</button><button data-tab="billing">Billing</button>
    </nav>
    <section class="aacrm-panel" id="aacrm-pipeline">
        <?php foreach ($stages as $stage) : ?>
            <div class="aacrm-column" data-stage="<?php echo esc_attr(sanitize_key($stage)); ?>"><h2><?php echo esc_html($stage); ?></h2><div class="aacrm-dropzone"></div></div>
        <?php endforeach; ?>
    </section>
    <section class="aacrm-panel">
        <h2>AI Lead Verification Engine</h2>
        <p>Verifies phone, email, website, business category, country, city, company size, lead score, lead temperature, and AI summary on lead creation.</p>
    </section>
</div>
