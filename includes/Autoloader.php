<?php
declare(strict_types=1);

namespace AgencyAiCrm;

final class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(static function (string $class): void {
            $prefix = __NAMESPACE__ . '\\';
            if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
                return;
            }
            $relative = substr($class, strlen($prefix));
            $file = AACRM_PATH . 'includes/' . str_replace('\\', '/', $relative) . '.php';
            if (is_readable($file)) {
                require_once $file;
            }
        });
    }
}
