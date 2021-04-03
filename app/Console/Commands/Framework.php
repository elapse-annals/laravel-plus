<?php

namespace App\Console\Commands;

use App\Exceptions\FrameworkException;
use Exception;
use Illuminate\Console\Command;
use App\Http\Controllers\FrameworkController;

/**
 * Class Framework
 *
 * @package App\Console\Commands
 */
class Framework extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:framework
                            {framework_name : framework name}
                            {--init : init framework}
                            {--delete : delete framework}
                            {--D : delete framework}
                            {--F : force cover framework}
                            {--M : Remove scaffolding}
                            ';

    /**
     * @var array
     */
    private $framework_file_types = [
        'Controller',
        'Repository',
        'Service',
        'Presenter',
        'Transformer',
        'Formatter',
        'Export',
    ];

    private $is_remove = false;
    private $is_delete = false;
    private $is_force = false;
    private $is_init = false;

    /**
     * @var string
     */
    protected $description = 'Command description';


    /**
     *
     */
    public function handle(): void
    {
        try {
            $framework_name = $this->argument('framework_name');
            $this->initOption();
            if ($this->is_init) {
                $this->init();
                die();
            }
            if ($this->is_delete && ! $this->confirm('Do you wish to continue? [y|N]')) {
                throw new FrameworkException('Continue Delete');
            }
            $FrameworkController = new FrameworkController($framework_name);
            if ($this->is_remove) {
                $FrameworkController->removesScaffold();
                die();
            }
            $framework_file_types = $this->framework_file_types;
            $bar = $this->output->createProgressBar(count($framework_file_types));
            foreach ($framework_file_types as $framework_file_type) {
                $FrameworkController->handle($framework_file_type, $this->is_delete, $this->is_force);
                $bar->advance();
            }
            $bar->finish();
            if ($this->is_delete) {
                $msg = 'delete';
            } else {
                $msg = 'create';
            }
            $stdout_string = PHP_EOL . " {$msg} framework \e[31m{$framework_name}\e[0m \e[32msuccess";
        } catch (FrameworkException $exception) {
            $stdout_string = " \e[31m {$exception->getMessage()} \e[0m \e[32min file
            {$exception->getFile()} line {$exception->getLine()}";
        } catch (Exception $exception) {
            $stdout_string = " \e[31m {$exception->getMessage()} \e[0m \e[32min file
            {$exception->getFile()} line {$exception->getLine()}";
        }
        $this->info($stdout_string);
    }

    private function init()
    {
        exec('cp .env.example .env');
        exec('composer update');
        $this->call('key:generate');
        exec('php artisan vendor:publish --tag=0');
        $this->call('migrate');
    }

    /**
     *
     */
    private function initOption(): void
    {
        $this->is_delete = $this->option('delete') ?: $this->option('D');
        $this->is_force = $this->option('F');
        $this->is_remove = $this->option('M');
        $this->is_init = $this->option('init');
    }
}
