<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 *
 * @package App
 */
class Course extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'student_courses',
            'course_id',
            'student_id',
            'course_id',
            'id'
        );
    }

    public function professor()
    {
        return $this->hasOne(Professor::class, 'course_id', 'course_id');
    }
}
