<?php

namespace App\Providers;

use App\Events\CourseScheduleCancelled;
use App\Events\CourseScheduled;
use App\Listeners\SendCourseScheduleCancelledNotification;
use App\Listeners\SendCourseScheduledNotification;
use App\Models\Booking;
use App\Observers\BookingObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CourseScheduled::class => [
            SendCourseScheduledNotification::class
        ],
        CourseScheduleCancelled::class => [
            SendCourseScheduleCancelledNotification::class
        ]
    ];

    protected $observers = [
      Booking::class => [
          BookingObserver::class
      ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
