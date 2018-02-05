<?php

namespace App\Console\Commands;

use App\ChangeEvent;
use Illuminate\Console\Command;

class ClearChangeEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears all the change events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ChangeEvent::truncate();
        $this->comment("DONE");
    }
}
