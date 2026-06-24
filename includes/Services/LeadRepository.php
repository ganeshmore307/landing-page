<?php
declare(strict_types=1);
namespace AgencyAiCrm\Services;

final class LeadRepository
{
    public function create(array $data): int
    {
        global $wpdb;
        $intel = (new LeadIntelligenceService())->enrich($data);
        $now = current_time('mysql');
        $wpdb->insert($wpdb->prefix . 'aacrm_leads', array_merge([
            'tenant_id' => absint($data['tenant_id'] ?? 1), 'name' => sanitize_text_field($data['name'] ?? 'Unknown Lead'),
            'email' => sanitize_email($data['email'] ?? ''), 'phone' => sanitize_text_field($data['phone'] ?? ''),
            'website' => esc_url_raw($data['website'] ?? ''), 'source' => sanitize_key($data['source'] ?? 'website_form'),
            'stage' => sanitize_key($data['stage'] ?? 'new_lead'), 'created_at' => $now, 'updated_at' => $now,
        ], $intel));
        return (int) $wpdb->insert_id;
    }
    public function list(int $tenantId, array $filters = []): array
    {
        global $wpdb;
        $stage = isset($filters['stage']) ? sanitize_key($filters['stage']) : '';
        $sql = "SELECT * FROM {$wpdb->prefix}aacrm_leads WHERE tenant_id=%d" . ($stage ? ' AND stage=%s' : '') . ' ORDER BY updated_at DESC LIMIT 200';
        return $wpdb->get_results($stage ? $wpdb->prepare($sql, $tenantId, $stage) : $wpdb->prepare($sql, $tenantId), ARRAY_A) ?: [];
    }
    public function move(int $leadId, string $stage): bool
    {
        global $wpdb;
        return false !== $wpdb->update($wpdb->prefix . 'aacrm_leads', ['stage' => sanitize_key($stage), 'updated_at' => current_time('mysql')], ['id' => $leadId]);
    }
}
