<?php

// app/Listeners/SendTaskUpdateNotification.php

namespace App\Listeners;

use Log;
use App\Models\User;
use App\Events\TaskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\TaskUpdateNotification;

class SendTaskUpdateNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskUpdated $event)
    {
        $task = $event->task;

        // Get all users and send notification to each user
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new TaskUpdateNotification($task));
        }
    }
}
