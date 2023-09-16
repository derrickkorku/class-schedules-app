<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Repositories\CourseScheduleRepository;

class BookingController extends Controller
{
    public function __construct(
        private CourseScheduleRepository $courseScheduleRepository
    ){}

    public function index() {
        return view('member.upcoming')
            ->with('bookings', Booking::upcoming()->get());
    }

    public function create() {
        return view('member.book')
            ->with(
                'scheduledCourses',
                $this->courseScheduleRepository->getNotBookedUpcomingCourseSchedules()
            );
    }

    public function store(BookingRequest $request) {
        Booking::createFromCourseScheduleId($request->course_schedule_id);

        return to_route('booking.index')
            ->with('success', 'Booking created successful');
    }

    public function destroy(Booking $booking) {
        $booking->delete();

        return to_route('booking.index')
            ->with('success', 'Delete successful');
    }
}
