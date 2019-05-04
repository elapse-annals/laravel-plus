<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\FrameworkController;

class Framework extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'framework:create
                            {framework_name : framework name}
                            {--basis : only basis framework}';

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
    public function handle()
    {
        //
        $framework_name = $this->argument('framework_name');
        $basis = $this->option('basis');
        $frameworks = [
            'Repository',
            'Service',
            'Presenter',
            'Transformer',
            'Formatter',
        ];
        if (true === $basis) {
            $frameworks = [
                'Repository',
                'Service',
            ];
        }
        $bar = $this->output->createProgressBar(count($frameworks));
        foreach ($frameworks as $framework) {
            (new FrameworkController)->createFile($framework, $framework_name);
            $bar->advance();
        }
        $bar->finish();
        $this->info(PHP_EOL . 'success');
    }
}
