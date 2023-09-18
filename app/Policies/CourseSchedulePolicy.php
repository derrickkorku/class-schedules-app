<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\CourseSchedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseSchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, CourseSchedule $courseSchedule): bool
    {
        return $user->id === $courseSchedule->instructor['id']
            && $courseSchedule->date_time > now()->addHours(5);
    }

    public function edit(User $user, CourseSchedule $courseSchedule): bool
    {
        return $user->id === $courseSchedule->instructor['id'];
    }
}
