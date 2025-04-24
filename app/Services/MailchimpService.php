<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class MailchimpService
{
    protected $apiKey;
    protected $audienceId;
    protected $serverPrefix;

    public function __construct()
    {
        $this->apiKey = config('services.mailchimp.key');
        $this->audienceId = config('services.mailchimp.audience_id');
        $this->serverPrefix = substr($this->apiKey, strpos($this->apiKey, '-') + 1);
    }

    public function subscribeUser(string $email, string $name = '')
    {
        $response = Http::withBasicAuth('anystring', $this->apiKey)->post(
            "https://{$this->serverPrefix}.api.mailchimp.com/3.0/lists/{$this->audienceId}/members",
            [
                'email_address' => $email,
                'status' => 'subscribed',
                'merge_fields' => [
                    'FNAME' => $name
                ]
            ]
        );

        return $response->successful();
    }
}
