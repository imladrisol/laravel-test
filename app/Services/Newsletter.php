<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email)
    {
        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us18',
        ]);

        return $client->lists->addListMember("907783187a", [
                'email_address' => $email,
                'status' => 'subscribed'
            ]);
    }
}
