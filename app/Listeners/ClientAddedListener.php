<?php

namespace App\Listeners;

use App\Events\ClientAddedEvent;
use App\Jobs\SendEmail;
use App\Mail\SendVerification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class ClientAddedListener implements ShouldQueue
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
     * @param  \App\Events\ClientAddedEvent  $event
     * @return void
     */
    public function handle(ClientAddedEvent $event)
    {
        $email = $event->user->email;

        Mail::to($email)->send(new SendVerification());

        //$message = (new SendEmail($email)); 
        //SendEmail::dispatch($email);


        $email = $event->client_email;
        Mail::to($email)->send(new SendVerification());
        
        //$message = (new SendEmail($email)); 
        //SendEmail::dispatch($email);
    }
}
