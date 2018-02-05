<?php

namespace App\Console\Commands;

use App\Course;
use App\Professor;
use App\ChangeEvent;
use Illuminate\Console\Command;
use LucidFrame\Console\ConsoleTable;
use Illuminate\Support\Facades\Schema;

/**
 * Class ShowRelations
 *
 * @package App\Console\Commands
 */
class ShowRelations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:relations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get All Student teacher relations.';
    /**
     * @var \App\Professor
     */
    private $professor;
    /**
     * @var \App\Course
     */
    private $course;

    private $table;

    /**
     * Create a new command instance.
     *
     * @param \App\Professor $professor
     * @param \App\Course    $course
     */
    public function __construct(Professor $professor, Course $course)
    {
        parent::__construct();

        $this->table = $this->getTableInstance();
        $this->detectChangeEvents();
        
        $this->professor = $professor;
        $this->course = $course;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $students = [];
        $this
            ->professor
            ->with('course.students')
            ->get()
            ->each(function ($item) use (&$teachers, &$students) {
                foreach (array_get($item, 'course.students', []) as $student) {
                    $students[$item->name][] = $student->name;
                }
            });

        $table = $this->getTableInstance();
        $table->setHeaders(["TEACHER", "STUDENTS"]);
        foreach ($students as $teacher => $student) {
            $table->addRow([$teacher, implode(", ", array_unique($student))]);
        }

        print "\n\033[33m The Relations are: \033[0m\n";
        $table->addBorderLine()->hideBorder()->setIndent(4)->display();
    }

    protected function getTableInstance()
    {
        return  new ConsoleTable();
    }

    private function detectChangeEvents()
    {
        if (!Schema::hasTable('change_events')) {
            return;
        }
        $changeEvents = ChangeEvent::all();

        if (count($changeEvents)) {
            print "\033[33m Changes Detected  \033[0m\n";
            $this->table->setHeaders(['OLD', 'NEW', 'Created/Updated']);
            $changeEvents->each(function ($item) {
                $this->table->addRow([$item->old_data, $item->new_data, $item->operation]);
            });
            $this->table->addBorderLine()->hideBorder()->setIndent(4)->display();
        }
    }
}
