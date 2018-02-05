<?php

use App\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_courses')->truncate();

        DB::table('student_courses')->insert([
            [
                "student_id" => 1,
                "course_id" => 101
            ],
            [
                "student_id" => 2,
                "course_id" => 101
            ],
            [
                "student_id" => 2,
                "course_id" => 104
            ],
            [
                "student_id" => 3,
                "course_id" => 103
            ],
            [
                "student_id" => 3,
                "course_id" => 101
            ],
            [
                "student_id" => 3,
                "course_id" => 107
            ],
            [
                "student_id" => 4,
                "course_id" => 105
            ],
            [
                "student_id" => 4,
                "course_id" => 106
            ],
            [
                "student_id" => 4,
                "course_id" => 102
            ],
            [
                "student_id" => 5,
                "course_id" => 103
            ],
            [
                "student_id" => 5,
                "course_id" => 107
            ],
            [
                "student_id" => 6,
                "course_id" => 108
            ],

            [
                "student_id" => 7,
                "course_id" => 108
            ],
            [
                "student_id" => 7,
                "course_id" => 103
            ],
            [
                "student_id" => 7,
                "course_id" => 105
            ],

            [
                "student_id" => 8,
                "course_id" => 104
            ],
            [
                "student_id" => 9,
                "course_id" => 104
            ],
            [
                "student_id" => 9,
                "course_id" => 101
            ],
            [
                "student_id" => 10,
                "course_id" => 102
            ],
            [
                "student_id" => 10,
                "course_id" => 106
            ],
        ]);
    }
}
