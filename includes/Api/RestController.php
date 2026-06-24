<?php
declare(strict_types=1);
namespace AgencyAiCrm\Api;

use AgencyAiCrm\Services\LeadRepository;
use WP_REST_Request;
use WP_REST_Response;

final class RestController
{
    public function register(): void { add_action('rest_api_init', [$this, 'routes']); }
    public function routes(): void
    {
        register_rest_route('aacrm/v1', '/leads', ['methods' => 'GET', 'callback' => [$this, 'leads'], 'permission_callback' => [$this, 'canUse']]);
        register_rest_route('aacrm/v1', '/leads', ['methods' => 'POST', 'callback' => [$this, 'createLead'], 'permission_callback' => '__return_true']);
        register_rest_route('aacrm/v1', '/leads/(?P<id>\d+)/stage', ['methods' => 'POST', 'callback' => [$this, 'moveLead'], 'permission_callback' => [$this, 'canUse']]);
        register_rest_route('aacrm/v1', '/webhooks/(?P<source>[a-z0-9_-]+)', ['methods' => 'POST', 'callback' => [$this, 'webhook'], 'permission_callback' => '__return_true']);
        register_rest_route('aacrm/v1', '/integrations/status', ['methods' => 'GET', 'callback' => [$this, 'integrations'], 'permission_callback' => [$this, 'canUse']]);
    }
    public function canUse(): bool { return current_user_can('manage_options') || current_user_can('aacrm_client'); }
    public function leads(WP_REST_Request $request): WP_REST_Response { return new WP_REST_Response((new LeadRepository())->list(absint($request['tenant_id'] ?: 1), ['stage' => $request['stage']])); }
    public function createLead(WP_REST_Request $request): WP_REST_Response { $id = (new LeadRepository())->create($request->get_json_params() ?: $request->get_params()); return new WP_REST_Response(['id' => $id], 201); }
    public function moveLead(WP_REST_Request $request): WP_REST_Response { return new WP_REST_Response(['ok' => (new LeadRepository())->move(absint($request['id']), sanitize_key($request['stage']))]); }
    public function webhook(WP_REST_Request $request): WP_REST_Response { $data = $request->get_json_params() ?: []; $data['source'] = sanitize_key($request['source']); $id = (new LeadRepository())->create($data); return new WP_REST_Response(['id' => $id], 201); }
    public function integrations(): WP_REST_Response { return new WP_REST_Response(['meta_ads'=>false,'google_ads'=>false,'whatsapp_cloud'=>false,'google_calendar'=>false,'zoom'=>false,'stripe'=>false,'paypal'=>false,'razorpay'=>false,'cashfree'=>false]); }
}
