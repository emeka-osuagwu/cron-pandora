<?php

namespace App\Console\Commands;

use Log;
use App\Console\Commands\TaskRunner;
use App\Http\Services\RequestService;
use Illuminate\Console\Command;

class Base extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     *
     * @return mixed
     */
    public function handle(TaskRunner $runner)
    {
        Log::info('Running daily schedules');
        $runner->run();
    }
}
