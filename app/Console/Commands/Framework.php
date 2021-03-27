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
        'Test',
        'TestUnit',
    ];

    private $is_remove = false;

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
            [$is_delete, $is_force] = $this->initOption();
            if ($is_delete && ! $this->confirm('Do you wish to continue? [y|N]')) {
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
                $FrameworkController->handle($framework_file_type, $is_delete, $is_force);
                $bar->advance();
            }
            $bar->finish();
            $msg = 'create';
            if ($is_delete) {
                $msg = 'delete';
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

    /**
     * @return array
     */
    private function initOption(): array
    {
        $is_delete = $this->option('delete');
        $is_delete or $is_delete = $this->option('D');
        $is_force = $this->option('F');
        $this->is_remove = $this->option('M');
        return [$is_delete, $is_force];
    }
}
