<?php
declare(strict_types=1);
namespace AgencyAiCrm\Core;
final class Deactivator { public static function deactivate(): void { wp_clear_scheduled_hook('aacrm_process_automation'); } }
