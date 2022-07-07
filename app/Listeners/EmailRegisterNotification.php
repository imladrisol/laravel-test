<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Services\Newsletter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailRegisterNotification
{
    public $service;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Newsletter $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the event.
     *
     * @param  \App\Events\UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $this->service->sendEmail($event->user->email);
    }
}
