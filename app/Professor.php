<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Professor
 *
 * @package App
 */
class Professor extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}
