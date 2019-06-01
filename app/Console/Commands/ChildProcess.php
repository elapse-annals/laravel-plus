<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ChildProcessController;

class ChildProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:child
                            {child_process_key: child process key}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'child process';

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
    public function handle()
    {
        $child_process_key = $this->argument('child_process_key');
        if (empty($child_process_key)) {
            die('无效错误进程 key');
        }
        Log::info($child_process_key . ' child process pull up');
        (new ChildProcessController($child_process_key))->handle();
    }
}
