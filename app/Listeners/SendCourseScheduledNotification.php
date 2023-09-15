<?php

namespace App\Listeners;

use App\Events\CourseScheduled;
use App\Jobs\CourseScheduleNotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        CourseScheduleNotificationJob::dispatch($event->courseSchedule);
    }
}
