<?php
/**
 * Plugin Name: Agency AI CRM SaaS
 * Description: AI-powered multi-tenant agency CRM for WordPress with lead verification, WhatsApp, pipelines, proposals, invoices, campaigns, reports, portals, and REST APIs.
 * Version: 1.0.0
 * Requires PHP: 8.3
 * Author: Agency AI CRM
 * Text Domain: agency-ai-crm
 */

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
}

define('AACRM_VERSION', '1.0.0');
define('AACRM_FILE', __FILE__);
define('AACRM_PATH', plugin_dir_path(__FILE__));
define('AACRM_URL', plugin_dir_url(__FILE__));

require_once AACRM_PATH . 'includes/Autoloader.php';
\AgencyAiCrm\Autoloader::register();

register_activation_hook(__FILE__, [\AgencyAiCrm\Core\Activator::class, 'activate']);
register_deactivation_hook(__FILE__, [\AgencyAiCrm\Core\Deactivator::class, 'deactivate']);

add_action('plugins_loaded', static function (): void {
    \AgencyAiCrm\Plugin::instance()->boot();
});
