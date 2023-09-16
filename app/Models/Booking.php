<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Builder;
use Jenssegers\Mongodb\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['member', 'course_schedule'];

    public function scopeUpComing(Builder $query): Builder{
        return self::where('member.id', auth()->id());
    }

    public static function createFromCourseScheduleId(string $courseScheduleId){
        $courseSchedule = CourseSchedule::find($courseScheduleId);
        $member = auth()->user();

        return self::create([
            'course_schedule' => [
                'id' => $courseSchedule->id,
                'course' => $courseSchedule->course,
                'instructor' => $courseSchedule->instructor,
                'date_time' => $courseSchedule->date_time->format('Y-m-d H:i:s')
            ],
            'member' => [
                'id' => $member->id,
                'email' => $member->email,
                'name' => $member->name
            ]
        ]);
    }
}
