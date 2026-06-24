<?php
declare(strict_types=1);

namespace AgencyAiCrm\Core;

final class Activator
{
    public static function activate(): void
    {
        global $wpdb;
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        $charset = $wpdb->get_charset_collate();
        $tables = [
            "CREATE TABLE {$wpdb->prefix}aacrm_tenants (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, name VARCHAR(190) NOT NULL, owner_user_id BIGINT UNSIGNED NULL, settings LONGTEXT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) $charset;",
            "CREATE TABLE {$wpdb->prefix}aacrm_leads (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, tenant_id BIGINT UNSIGNED NOT NULL, assigned_user_id BIGINT UNSIGNED NULL, name VARCHAR(190) NOT NULL, email VARCHAR(190) NULL, phone VARCHAR(60) NULL, website VARCHAR(255) NULL, source VARCHAR(80) NOT NULL, stage VARCHAR(80) NOT NULL DEFAULT 'new_lead', score TINYINT UNSIGNED NOT NULL DEFAULT 0, temperature VARCHAR(20) NOT NULL DEFAULT 'cold', country VARCHAR(100) NULL, city VARCHAR(100) NULL, category VARCHAR(150) NULL, company_size VARCHAR(80) NULL, ai_summary TEXT NULL, verification LONGTEXT NULL, social_profiles LONGTEXT NULL, tags LONGTEXT NULL, custom_fields LONGTEXT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id), KEY tenant_stage (tenant_id, stage), KEY email (email), KEY phone (phone)) $charset;",
            "CREATE TABLE {$wpdb->prefix}aacrm_conversations (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, tenant_id BIGINT UNSIGNED NOT NULL, lead_id BIGINT UNSIGNED NOT NULL, channel VARCHAR(40) NOT NULL, direction VARCHAR(20) NOT NULL, body LONGTEXT NULL, media_url TEXT NULL, status VARCHAR(40) NOT NULL DEFAULT 'queued', provider_message_id VARCHAR(190) NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id), KEY lead_channel (lead_id, channel)) $charset;",
            "CREATE TABLE {$wpdb->prefix}aacrm_tasks (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, tenant_id BIGINT UNSIGNED NOT NULL, lead_id BIGINT UNSIGNED NULL, title VARCHAR(190) NOT NULL, type VARCHAR(60) NOT NULL, due_at DATETIME NULL, status VARCHAR(40) NOT NULL DEFAULT 'open', assigned_user_id BIGINT UNSIGNED NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id), KEY tenant_status (tenant_id, status)) $charset;",
            "CREATE TABLE {$wpdb->prefix}aacrm_appointments (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, tenant_id BIGINT UNSIGNED NOT NULL, lead_id BIGINT UNSIGNED NOT NULL, starts_at DATETIME NOT NULL, ends_at DATETIME NOT NULL, meeting_url TEXT NULL, provider VARCHAR(60) NULL, status VARCHAR(40) NOT NULL DEFAULT 'booked', created_at DATETIME NOT NULL, PRIMARY KEY(id), KEY tenant_start (tenant_id, starts_at)) $charset;",
            "CREATE TABLE {$wpdb->prefix}aacrm_documents (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, tenant_id BIGINT UNSIGNED NOT NULL, lead_id BIGINT UNSIGNED NULL, type VARCHAR(40) NOT NULL, number VARCHAR(80) NOT NULL, status VARCHAR(40) NOT NULL, total DECIMAL(12,2) NOT NULL DEFAULT 0, currency CHAR(3) NOT NULL DEFAULT 'USD', payload LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id), KEY tenant_type (tenant_id, type)) $charset;",
            "CREATE TABLE {$wpdb->prefix}aacrm_campaigns (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, tenant_id BIGINT UNSIGNED NOT NULL, channel VARCHAR(40) NOT NULL, name VARCHAR(190) NOT NULL, status VARCHAR(40) NOT NULL DEFAULT 'draft', metrics LONGTEXT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id), KEY tenant_channel (tenant_id, channel)) $charset;",
            "CREATE TABLE {$wpdb->prefix}aacrm_integrations (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, tenant_id BIGINT UNSIGNED NOT NULL, provider VARCHAR(80) NOT NULL, credentials LONGTEXT NULL, settings LONGTEXT NULL, connected_at DATETIME NULL, PRIMARY KEY(id), UNIQUE KEY tenant_provider (tenant_id, provider)) $charset;"
        ];
        foreach ($tables as $sql) {
            dbDelta($sql);
        }
        if (! wp_next_scheduled('aacrm_process_automation')) {
            wp_schedule_event(time() + 300, 'five_minutes', 'aacrm_process_automation');
        }
        add_option('aacrm_version', AACRM_VERSION);
    }
}
