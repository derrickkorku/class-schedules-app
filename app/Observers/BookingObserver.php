<?php

namespace App\Observers;

use App\Models\Booking;
use App\Services\SmsService;

class BookingObserver
{
    public function __construct(private SmsService $smsService){}

    /**
     * Handle the Booking "created" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
        $message = "You booked the course, {$booking->course_schedule['course']['name']} ...";
        $this->smsService->send($booking->course_schedule['instructor']['phone'], $message);
    }



    /**
     * Handle the Booking "deleted" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        $message = "You cancelled the course, {$booking->course_schedule['course']['name']} ...";
        $this->smsService->send($booking->course_schedule['instructor']['phone'], $message);
    }
}
