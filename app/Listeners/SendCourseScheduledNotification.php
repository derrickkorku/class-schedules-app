<?php

namespace App\Listeners;

use App\Events\CourseScheduled;
use App\Jobs\CourseScheduleNotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendCourseScheduledNotification
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
     * @param CourseScheduled $event
     * @return void
     */
    public function handle(CourseScheduled $event)
    {
        CourseScheduleNotificationJob::dispatch(auth()->user(), $event->courseSchedule);
    }
}
