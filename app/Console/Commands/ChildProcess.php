<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ChildProcessController;

class ChildProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:child
                            {business_name: run business name}
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
        list($business_name, $child_process_key) = $this->inspectArgumentInput();
        (new ChildProcessController($business_name, $child_process_key))->handle();
    }

    /**
     * @return array
     */
    private function inspectArgumentInput(): array
    {
        $business_name = $this->argument('business_name');
        if (empty($business_name)) {
            die('invalid business_name');
        }
        $child_process_key = $this->argument('child_process_key');
        if (empty($child_process_key)) {
            die('invalid child_process_key');
        }
        return array($business_name, $child_process_key);
    }
}
