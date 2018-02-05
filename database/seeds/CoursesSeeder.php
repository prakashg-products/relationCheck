<?php

use App\Course;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::truncate();

        Course::insert([
            [
                "course_id" => 101,
                "name" => "English"
            ],
            [
                "course_id" => 102,
                "name" => "Mathematics"
            ],
            [
                "course_id" => 103,
                "name" => "Physics"
            ],
            [
                "course_id" => 104,
                "name" => "Chemistry"
            ],
            [
                "course_id" => 105,
                "name" => "Political Science"
            ],
            [
                "course_id" => 106,
                "name" => "History"
            ],
            [
                "course_id" => 107,
                "name" => "Computer Administration"
            ],
            [
                "course_id" => 108,
                "name" => "Geography"
            ],
        ]);
    }
}
