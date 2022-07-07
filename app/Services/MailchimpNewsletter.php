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

    public function sendEmail(string $email)
    {
        $mailchimp = new \MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey(config('services.mailchimp.mandrill_key'));
        $msg = '<h1>Congratulations!</h1><p>Your registration is completed</p>';
        try{
            $user = new \stdClass();
            $user->email = $email;
            $user->type = 'to';
            $mailchimp->messages->send(['message' => [
                'from_email' => 'imladrisol@gmail.com',
                'to' => [$user],
                'subject' => 'registered',
                'text' => $msg,
            ]]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
