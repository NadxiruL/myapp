<?php

namespace App\Listeners;

use App\Events\UserLoggedInEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToUserLoggedInListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserLoggedInEvent $event
     * @return void
     */
    public function handle(UserLoggedInEvent $event)
    {
        logger('event listener for user logged in');

        Mail::to($event->user->email)
            ->send(new \App\Mail\LoginActivityEmail('Order placed'));
    }
}
