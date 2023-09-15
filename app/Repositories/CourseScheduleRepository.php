<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\CourseSchedule;
use App\Models\User;

class CourseScheduleRepository
{
    public function getInstructorUpcomingCourseSchedules()
    {
        return CourseSchedule::instructorScheduledCourses()
                ->upcoming()->oldest('date_time')->get();
    }

    public function getNotBookedUpcomingCourseSchedules(){
        return CourseSchedule::upcoming()
            ->notBooked()
            ->oldest('date_time')->get();
    }


    /**
     * Create course schedule
     * @param User $instructor
     * @param Course $course
     * @param \DateTime $dateTime
     * @return CourseSchedule
     */
    public static function createFromInstructorAndCourse(User $instructor, Course $course, $dateTime): CourseSchedule{
       return self::createCourseSchedule($instructor, $course, $dateTime);
    }

    public static function createFromCourseId(string $courseId, $dateTime): CourseSchedule {
        return self::createCourseSchedule(
              auth()->user(),
              Course::find($courseId),
              $dateTime
        );
    }

    private static function createCourseSchedule(User $user, Course $course, $dateTime){
        return CourseSchedule::create([
            'date_time' => $dateTime,
            'instructor' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ],
            'course' => [
                'id' => $course->id,
                'name' => $course->name,
                'minutes' => $course->minutes
            ]
        ]);
    }
}
