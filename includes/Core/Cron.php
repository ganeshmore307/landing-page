<?php
declare(strict_types=1);
namespace AgencyAiCrm\Core;
use AgencyAiCrm\Services\AutomationService;
final class Cron
{
    public function register(): void
    {
        add_filter('cron_schedules', static function (array $schedules): array { $schedules['five_minutes'] = ['interval' => 300, 'display' => 'Every five minutes']; return $schedules; });
        add_action('aacrm_process_automation', [new AutomationService(), 'processDueFollowups']);
    }
}
