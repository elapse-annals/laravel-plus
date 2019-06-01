<?php

namespace App\Console\Commands;

use App\Http\Controllers\MainProcessController;
use Illuminate\Console\Command;

class MainProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:main';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'main process';

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
        (new MainProcessController())->handle();
    }
}
