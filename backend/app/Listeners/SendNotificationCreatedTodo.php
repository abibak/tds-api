<?php

namespace App\Listeners;

use App\Events\CreatedTodo;
use App\Mail\CreatedTodoEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationCreatedTodo
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
     * @param  \App\Events\CreatedTodo  $event
     * @return void
     */
    public function handle(CreatedTodo $event)
    {
        Mail::to('admin@mail.ru')->send(new CreatedTodoEmail(auth()->user()));
    }
}
