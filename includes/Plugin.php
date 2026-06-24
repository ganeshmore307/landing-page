<?php
declare(strict_types=1);

namespace AgencyAiCrm;

use AgencyAiCrm\Admin\AdminApp;
use AgencyAiCrm\Api\RestController;
use AgencyAiCrm\Core\Assets;
use AgencyAiCrm\Core\Cron;
use AgencyAiCrm\Frontend\ClientPortal;

final class Plugin
{
    private static ?self $instance = null;

    public static function instance(): self
    {
        return self::$instance ??= new self();
    }

    public function boot(): void
    {
        load_plugin_textdomain('agency-ai-crm', false, dirname(plugin_basename(AACRM_FILE)) . '/languages');
        (new Assets())->register();
        (new AdminApp())->register();
        (new RestController())->register();
        (new ClientPortal())->register();
        (new Cron())->register();
    }
}
