<?php
declare(strict_types=1);
namespace AgencyAiCrm\Frontend;
final class ClientPortal
{
    public function register(): void { add_shortcode('agency_ai_crm_portal', [$this, 'render']); }
    public function render(): string
    {
        if (! is_user_logged_in()) { return wp_login_form(['echo' => false]); }
        wp_enqueue_style('aacrm-portal'); wp_enqueue_script('aacrm-portal');
        return '<div class="aacrm-app"><h2>Client Portal</h2><p>View leads, reports, conversations, invoices, and tasks for your assigned tenant.</p><div id="aacrm-client-portal"></div></div>';
    }
}
