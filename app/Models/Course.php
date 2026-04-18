<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'course_data' => 'array',
    ];
    
    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function videos()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function enrollments()
    {
        return $this->hasMany(CourseEnrollMent::class);
    }
}

