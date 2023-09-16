<?php

namespace App\Listeners;

use App\Events\CourseScheduleCancelled;
use App\Jobs\CourseScheduleCancelledNotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCourseScheduleCancelledNotification
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
     * @param CourseScheduleCancelled $event
     * @return void
     */
    public function handle(CourseScheduleCancelled $event)
    {
        CourseScheduleCancelledNotificationJob::dispatch(auth()->user(), $event->courseSchedule);
    }
}
