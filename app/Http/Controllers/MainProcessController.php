<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use React\EventLoop\Factory;
use React\ChildProcess\Process;


/**
 * Class MainProcessController
 *
 * @package App\Http\Controllers
 */
class MainProcessController extends Controller
{
    /**
     * @var string
     */
    private $global_mark;
    /**
     * @var string
     */
    private $process_log_path;
    /**
     * @var int
     */
    private $process_number = 1;
    /**
     * @var
     */
    private $business_name;
    /**
     * @var string
     */
    private $child_process_key = 'child_process_';

    /**
     * MainProcessController constructor.
     */
    public function __construct($business_name)
    {
        parent::__construct();
        $this->global_mark = md5(microtime()) . '_';
        $this->process_log_path = __DIR__ . '/../../../storage/process_error.log';
        $this->business_name = $business_name;
    }

    /**
     *
     */
    public function handle()
    {
        Log::info($this->global_mark . 'main_process_act');

        // Run main app business, get data
        $mainProcessClass = "\App\Http\Controllers\{$this->business_name}Action";
        $data = (new $mainProcessClass())->getData();

        if (empty($data) || !is_array($data)) {
            Log::error('invalid data');
            die();
        }
        $this->correctionProcessNumber(count($data));
        $this->chunkChildProcessData($data);
        $this->produceChildProcess();
        // end all child process ，main process to do

        Log::info($this->global_mark . 'main_process_end');
    }

    /**
     * @param $data_count
     */
    private function correctionProcessNumber($data_count)
    {
        if ($data_count < $this->process_number) {
            $this->child_process_key = 1;
        }
    }

    /**
     * @param $data
     */
    private function chunkChildProcessData($data)
    {
        $chunk_data = collect($data)->chunk($this->process_number);
        for ($i = 0; $i < $this->process_number; $i++) {
            $temp_child_process_key = $this->getChildProcessKey($i);
            Redis::set($temp_child_process_key, $chunk_data[$i]);
        }
    }

    /**
     *
     */
    public function produceChildProcess()
    {
        $loop = Factory::create();
        for ($i = 0; $i < $this->process_number; $i++) {
            $temp_child_process_key = $this->getChildProcessKey($i);
            $temp_cmd = "php artisan process:child {$temp_child_process_key} >> {$this->process_log_path}";
            $$temp_child_process_key = new Process($temp_cmd);
            $$temp_child_process_key->start($loop);
            $$temp_child_process_key->stdout->on('data', function ($chunk) use ($temp_child_process_key) {
                Log::info($temp_child_process_key . '_output', [$chunk]);
            });
        }
        $loop->run();
    }

    /**
     * @param $i
     *
     * @return string
     */
    private function getChildProcessKey($i): string
    {
        return $this->business_name . '_' . $this->child_process_key . $i;
}
}
