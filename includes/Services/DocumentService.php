<?php
declare(strict_types=1);
namespace AgencyAiCrm\Services;
final class DocumentService
{
    public function proposalPayload(array $input): array { return ['logo' => esc_url_raw($input['logo'] ?? ''), 'services' => array_map('sanitize_text_field', $input['services'] ?? []), 'pricing' => (float) ($input['pricing'] ?? 0), 'signature' => sanitize_text_field($input['signature'] ?? '')]; }
    public function invoicePayload(array $input): array { return ['items' => $input['items'] ?? [], 'gst' => (float) ($input['gst'] ?? 0), 'payment_status' => sanitize_key($input['payment_status'] ?? 'pending')]; }
}
