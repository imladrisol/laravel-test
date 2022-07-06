<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe(string $email, string $list = null)
    {
        return $this->client->lists->addListMember($list ?? config('services.mailchimp.lists.subscribers'), [
                'email_address' => $email,
                'status' => 'subscribed'
            ]);
    }
}
