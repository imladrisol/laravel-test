<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        return $this->client()->lists->addListMember($list ?? config('services.mailchimp.lists.subscribers'), [
                'email_address' => $email,
                'status' => 'subscribed'
            ]);
    }

    protected function client()
    {
        $client = new ApiClient();
        return $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us18',
        ]);
    }
}
