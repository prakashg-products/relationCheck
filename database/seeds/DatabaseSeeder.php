<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentsSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(ProfessorsSeeder::class);
        $this->call(StudentCourseSeeder::class);
    }
}
