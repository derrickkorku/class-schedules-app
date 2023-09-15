<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseSchedule;
use App\Models\User;
use App\Repositories\CourseScheduleRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseScheduleTableSeeder extends Seeder
{
    public function __construct(private CourseScheduleRepository $courseScheduleRepository){}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDefaultInstructorCourseSchedules();
    }

    private function createDefaultInstructorCourseSchedules(){
        $instructor = User::where('role', 'instructor')->first();
        static $days = 1;

        Course::all()->each(function ($course) use ($instructor, $days){
            $this->courseScheduleRepository::createFromInstructorAndCourse(
                $instructor,
                $course,
                now()->addDays($days++)
            );
        });
    }
}
