<?php

use App\Professor;
use Illuminate\Database\Seeder;

class ProfessorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Professor::truncate();

        Professor::insert([
            [
                "name" => "Anil",
                "course_id" => 101
            ],
            [
                "name" => "Anil",
                "course_id" => 106
            ],
            [
                "name" => "Anil",
                "course_id" => 105
            ],
            [
                "name" => "Suresh",
                "course_id" => 103
            ],
            [
                "name" => "Suresh",
                "course_id" => 102
            ],
            [
                "name" => "Mohan",
                "course_id" => 107
            ],
            [
                "name" => "Mohan",
                "course_id" => 104
            ],
            [
                "name" => "Abhay",
                "course_id" => 108
            ],
        ]);
    }
}
