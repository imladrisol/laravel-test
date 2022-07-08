<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Notifications\NewUser;

class EmailRegisterNotification
{
    public $service;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $event->user->notify(new NewUser());
    }
}
