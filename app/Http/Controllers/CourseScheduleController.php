<?php

namespace App\Http\Controllers;

use App\Events\CourseScheduleCancelled;
use App\Events\CourseScheduled;
use App\Http\Requests\CourseScheduleRequest;
use App\Models\Course;
use App\Models\CourseSchedule;
use App\Repositories\CourseScheduleRepository;
use Illuminate\Http\Request;

class CourseScheduleController extends Controller
{
    public function __construct(
        private CourseScheduleRepository $courseScheduleRepository
    ){}

    /**
     * Get Upcoming Courses for an Instructor
     */
    public function index(Request $request)
    {
        return view('instructor.upcoming-courses')
            ->with(
                'courses',
                $this->courseScheduleRepository->getInstructorUpcomingCourseSchedules()
            );
    }

    /**
     * Show the form for creating a new course schedule
     */
    public function create()
    {
        return view('instructor.schedule-course')
            ->with('courses', Course::all());
    }

    /**
     * Create a new Course Schedule
     */
    public function store(CourseScheduleRequest $request)
    {
       $courseSchedule = $this->courseScheduleRepository::createFromCourseId(
           $request->course_id,
           $request->date_time
       );


       CourseScheduled::dispatch($courseSchedule);

       return to_route('schedule.index')
           ->with('success', 'Course Schedule added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSchedule $schedule)
    {
        if(auth()->user()->cannot('delete', $schedule)) {
            abort(403);
        }

        CourseScheduleCancelled::dispatch($schedule);

        $schedule->delete();

        return to_route('schedule.index')
            ->with('success', 'Delete successful');
    }
}
