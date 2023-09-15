<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Builder;

class CourseSchedule extends Model
{
    protected $fillable = ['date_time', 'course', 'instructor'];
    protected $casts = [
        'date_time' => 'datetime'
    ];

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('date_time', '>', now());
    }

    public function scopeInstructorScheduledCourses(Builder $query): Builder
    {
        return $query->where('instructor.email', auth()->user()->email);
    }
}
