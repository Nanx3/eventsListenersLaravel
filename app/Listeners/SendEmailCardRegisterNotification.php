<?php

namespace App\Listeners;

use App\Events\CardRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;

class SendEmailCardRegisterNotification
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
     * @param  CardRegistered  $event
     * @return void
     */
    public function handle(CardRegistered $event)
    {
        Mail::to($event->user->email)->send(new EmailDemo());
    }
}


