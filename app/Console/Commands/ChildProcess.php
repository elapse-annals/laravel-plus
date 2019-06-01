<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChildProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:child';

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
        //
    }
}
