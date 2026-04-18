<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEnrollMent extends Model
{
    protected $guarded = [];

    protected $table = 'course_enrollments';

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
