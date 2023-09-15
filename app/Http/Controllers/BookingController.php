<?php

namespace App\Http\Controllers;

use App\Repositories\CourseScheduleRepository;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(
        private CourseScheduleRepository $courseScheduleRepository
    ){}

    public function create() {
        return view('member.book')
            ->with(
                'scheduledCourses',
                $this->courseScheduleRepository->getNotBookedUpcomingCourseSchedules()
            );
    }

    public function store(Request $request) {
        auth()->user()->bookings()->attach($request->scheduled_class_id);

        return redirect()->route('booking.index');
    }

    public function index() {
        $bookings = auth()->user()->bookings()->upcoming()->get();

        return view('member.upcoming')->with('bookings',$bookings);
    }

    public function destroy(int $id) {
        auth()->user()->bookings()->detach($id);

        return redirect()->route('booking.index');
    }
}
