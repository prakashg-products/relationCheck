<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class UpdateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            "CREATE TRIGGER `students_update_trigger` after update ON `students` FOR EACH ROW "
            ."INSERT INTO change_events (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'students',"
            ."CONCAT('{\"id\":\"', OLD.id, '\", \"name\":\"', OLD.name, '\"}'),"
            ."CONCAT('{\"id\":\"', NEW.id, '\", \"name\":\"', NEW.name, '\"}'),"
            ."'update') "
        );

        DB::unprepared(
            "CREATE TRIGGER `courses_update_trigger` after update ON `courses` FOR EACH ROW "
            ."INSERT INTO change_events ( `tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'courses',"
            ."CONCAT('{\"id\":\"', OLD.id, '\",\"course_id\":\"', OLD.course_id, '\", \"name\":\"', OLD.name, '\"}'),"
            ."CONCAT('{\"id\":\"', NEW.id, '\",\"course_id\":\"', NEW.course_id, '\", \"name\":\"', NEW.name, '\"}'),"
            ."'update') "
        );

        DB::unprepared(
            "CREATE TRIGGER `professor_update_trigger` after update ON `professors` FOR EACH ROW "
            ."INSERT INTO change_events (`tablename`, `old_data`, `new_data`,`operation`) "
            ."VALUES ("
            ."'professors',"
            ."CONCAT('{\"id\":\"', OLD.id, '\",\"course_id\":\"', OLD.course_id, '\", \"name\":\"', OLD.name, '\"}'),"
            ."CONCAT('{\"id\":\"', NEW.id, '\",\"course_id\":\"', NEW.course_id, '\", \"name\":\"', NEW.name, '\"}'),"
            ."'update') "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `students_update_trigger`');
        DB::unprepared('DROP TRIGGER `courses_update_trigger`');
        DB::unprepared('DROP TRIGGER `professor_update_trigger`');
    }
}
