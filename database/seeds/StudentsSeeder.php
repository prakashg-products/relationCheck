<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        Student::insert([
            [
                "name" => "A"
            ],
            [
                "name" => "B"
            ],
            [
                "name" => "C"
            ],
            [
                "name" => "D"
            ],
            [
                "name" => "E"
            ],
            [
                "name" => "F"
            ],
            [
                "name" => "G"
            ],
            [
                "name" => "H"
            ],
            [
                "name" => "I"
            ],
            [
                "name" => "J"
            ]
        ]);
    }
}
