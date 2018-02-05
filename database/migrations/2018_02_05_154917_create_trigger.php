<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE TRIGGER `students_create_trigger` after insert ON `students` FOR EACH ROW "
            ."INSERT INTO change_events (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'students',"
            ."'{}',"
            ."CONCAT('{\"id\":\"', new.id, '\", \"name\":\"', new.name, '\"}'),"
            ."'create') "
        );

        DB::unprepared(
            "CREATE TRIGGER `courses_create_trigger` after insert ON `courses` FOR EACH ROW "
            ."INSERT INTO change_events (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'courses',"
            ."'{}',"
            ."CONCAT('{\"id\":\"', new.id, '\",\"course_id\":\"', new.course_id, '\", \"name\":\"', new.name, '\"}'),"
            ."'create') "
        );

        DB::unprepared(
            "CREATE TRIGGER `professor_create_trigger` after insert ON `professors` FOR EACH ROW "
            ."INSERT INTO change_events (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'courses',"
            ."'{}',"
            ."CONCAT('{\"id\":\"', new.id, '\",\"course_id\":\"', new.course_id, '\", \"name\":\"', new.name, '\"}'),"
            ."'create') "
        );

        DB::unprepared(
            "CREATE TRIGGER `student_courses_create_trigger` after insert ON `student_courses` FOR EACH ROW "
            ."INSERT INTO change_events (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'student_courses',"
            ."'{}',"
            ."CONCAT('{\"student_id\":\"', new.student_id, '\",\"course_id\":\"', new.course_id, '\"}'),"
            ."'create') "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `students_create_trigger`');
        DB::unprepared('DROP TRIGGER `courses_create_trigger`');
        DB::unprepared('DROP TRIGGER `professor_create_trigger`');
        DB::unprepared('DROP TRIGGER `student_courses_create_trigger`');
    }
}
