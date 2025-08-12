<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;

class AutenticatedUser
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
     * @param Authenticated $event
     *
     * @return void
     */
    public function handle(Authenticated $event)
    {
        // Форсим только свои задачи для обычных пользовеателей
        config(null)->set('app.show_only_assigned_conversations', $event->user->id);
    }
}
