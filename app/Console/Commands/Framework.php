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
    protected $signature = 'make:framework
                            {framework_name : framework name}
                            {--basis : only basis framework}
                            {--delete : delete framework}
                            {--D : delete framework}
                            ';

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
        $is_delete = $this->option('delete');
        $is_delete OR $is_delete = $this->option('D');
        $frameworks = [
            'Controller',
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
            (new FrameworkController())->handle($framework, $framework_name, $is_delete);
            $bar->advance();
        }
        $bar->finish();
        $msg = 'create ';
        if ($is_delete) {
            $msg = 'delete ';
        }
        $this->info(PHP_EOL . $msg . 'framework success');
    }
}
