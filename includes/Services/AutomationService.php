<?php
declare(strict_types=1);
namespace AgencyAiCrm\Services;
final class AutomationService
{
    private array $sequence = [0 => 'Hello {{name}}' . "\n" . 'Thank you for contacting us.', 1 => 'Are you still interested?', 3 => 'Book a free consultation call.', 7 => 'Last reminder.'];
    public function processDueFollowups(): void { do_action('aacrm_before_followup_sequence'); foreach ($this->sequence as $day => $message) { do_action('aacrm_send_due_followups', $day, $message); } }
    public function renderMessage(string $template, array $lead): string { return str_replace('{{name}}', $lead['name'] ?? 'there', $template); }
}
