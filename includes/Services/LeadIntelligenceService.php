<?php
declare(strict_types=1);
namespace AgencyAiCrm\Services;

final class LeadIntelligenceService
{
    public function enrich(array $lead): array
    {
        $emailValid = ! empty($lead['email']) && is_email($lead['email']);
        $phoneValid = ! empty($lead['phone']) && (bool) preg_match('/^[+0-9()\-\s]{7,25}$/', (string) $lead['phone']);
        $websiteValid = ! empty($lead['website']) && filter_var($lead['website'], FILTER_VALIDATE_URL);
        $score = ($emailValid ? 20 : 0) + ($phoneValid ? 20 : 0) + ($websiteValid ? 25 : 0) + (! empty($lead['source']) ? 15 : 0) + (! empty($lead['message']) ? 20 : 0);
        $score = min(100, $score);
        return [
            'score' => $score,
            'temperature' => $score >= 75 ? 'hot' : ($score >= 45 ? 'warm' : 'cold'),
            'category' => $this->detectCategory($lead),
            'country' => sanitize_text_field($lead['country'] ?? ''),
            'city' => sanitize_text_field($lead['city'] ?? ''),
            'company_size' => sanitize_text_field($lead['company_size'] ?? 'Unknown'),
            'ai_summary' => $this->summary($score, (bool) $websiteValid),
            'verification' => wp_json_encode(['email' => $emailValid, 'phone' => $phoneValid, 'website' => (bool) $websiteValid]),
            'social_profiles' => wp_json_encode($this->socialProfiles($lead)),
        ];
    }
    private function detectCategory(array $lead): string
    {
        $text = strtolower(wp_json_encode($lead));
        foreach (['restaurant', 'real estate', 'dentist', 'law', 'fitness', 'ecommerce', 'saas', 'education'] as $category) {
            if (str_contains($text, $category)) { return ucwords($category); }
        }
        return 'General Business';
    }
    private function summary(int $score, bool $hasWebsite): string
    {
        if ($score >= 75 && $hasWebsite) { return 'This lead owns a business website and has high buying intent.'; }
        if ($score >= 45) { return 'This lead shows moderate buying intent and should receive a guided follow-up.'; }
        return 'This lead needs verification before sales outreach.';
    }
    private function socialProfiles(array $lead): array
    {
        $company = sanitize_title($lead['company'] ?? $lead['name'] ?? '');
        return ['facebook' => '', 'instagram' => '', 'linkedin' => '', 'google_business' => '', 'followers_estimate' => null, 'engagement_estimate' => null, 'search_slug' => $company];
    }
}
