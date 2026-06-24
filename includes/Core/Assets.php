<?php
declare(strict_types=1);
namespace AgencyAiCrm\Core;
final class Assets
{
    public function register(): void
    {
        add_action('admin_enqueue_scripts', [$this, 'admin']);
        add_action('wp_enqueue_scripts', [$this, 'frontend']);
    }
    public function admin(string $hook): void
    {
        if (strpos($hook, 'aacrm') === false) { return; }
        wp_enqueue_style('aacrm-admin', AACRM_URL . 'assets/css/app.css', [], AACRM_VERSION);
        wp_enqueue_script('aacrm-admin', AACRM_URL . 'assets/js/app.js', ['wp-api-fetch'], AACRM_VERSION, true);
        wp_localize_script('aacrm-admin', 'AACRM', ['root' => esc_url_raw(rest_url('aacrm/v1')), 'nonce' => wp_create_nonce('wp_rest')]);
    }
    public function frontend(): void
    {
        wp_register_style('aacrm-portal', AACRM_URL . 'assets/css/app.css', [], AACRM_VERSION);
        wp_register_script('aacrm-portal', AACRM_URL . 'assets/js/app.js', [], AACRM_VERSION, true);
    }
}
