<?php
declare(strict_types=1);
namespace AgencyAiCrm\Admin;

final class AdminApp
{
    public function register(): void { add_action('admin_menu', [$this, 'menu']); }
    public function menu(): void
    {
        add_menu_page('Agency AI CRM', 'AI CRM', 'manage_options', 'aacrm', [$this, 'dashboard'], 'dashicons-chart-line', 3);
        foreach (['Leads'=>'leads','WhatsApp Inbox'=>'whatsapp','Pipeline'=>'pipeline','Tasks'=>'tasks','Appointments'=>'appointments','Proposals'=>'proposals','Invoices'=>'invoices','Campaigns'=>'campaigns','Analytics'=>'analytics','Clients'=>'clients','Settings'=>'settings'] as $label => $slug) {
            add_submenu_page('aacrm', $label, $label, 'manage_options', 'aacrm-' . $slug, [$this, 'dashboard']);
        }
    }
    public function dashboard(): void
    {
        $stages = ['New Lead','Contacted','Interested','Call Booked','Proposal Sent','Negotiation','Won','Lost'];
        include AACRM_PATH . 'templates/admin-app.php';
    }
}
