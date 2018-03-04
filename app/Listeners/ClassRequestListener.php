<?php

namespace App\Listeners;

use App\Events\ClassRequestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ClassRequestNotification;
use Auth;
class ClassRequestListener
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
     * @param  ClassRequestEvent  $event
     * @return void
     */
    public function handle(ClassRequestEvent $event)
    {
           $event->notification->user->notify(new ClassRequestNotification($event->notification,Auth::user()));
    }
}
