<?php

namespace App\Listeners;

use App\Notifications\EmailNotify;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRegisterMailListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;
        $email_token = \Str::random(5);
        $user->mail_token = $email_token;
        $user->save();
        $user->notify(new EmailNotify($user));
    }
}
