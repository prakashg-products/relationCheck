<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @package App
 */
class Student extends Model
{
    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
