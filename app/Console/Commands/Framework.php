<?php

namespace App\Console\Commands;

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
                            {--StaticRender : Static rendering html}
                            {--static : Static rendering html}
                            ';

    /**
     * @var string
     */
    protected $description = 'Command description';

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

    /**
     * Framework constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function handle()
    {
        try {
            $framework_name = $this->argument('framework_name');
            list($is_delete, $is_static_render) = $this->initOption();
            if ($is_delete && !$this->confirm('Do you wish to continue? [y|N]')) {
                throw new Exception('Continue Delete');
            }
            $framework_file_types = $this->framework_file_types;
            $bar = $this->output->createProgressBar(count($framework_file_types));
            $FrameworkController = new FrameworkController($framework_name);
            foreach ($framework_file_types as $framework_file_type) {
                $FrameworkController->handle($framework_file_type, $is_delete, $is_static_render);
                $bar->advance();
            }
            $bar->finish();
            $msg = 'create';
            if ($is_delete) {
                $msg = 'delete';
            }
            $stdout_string = PHP_EOL . " {$msg} framework \e[31m{$framework_name}\e[0m \e[32msuccess";
        } catch (Exception $exception) {
            $stdout_string = " \e[31m{$exception->getMessage()}\e[0m \e[32min file {$exception->getFile()} line {$exception->getLine()}";
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
        $is_static_render = $this->option('static');
        $is_static_render or $is_static_render = $this->option('StaticRender');
        return [$is_delete, $is_static_render];
    }
}
