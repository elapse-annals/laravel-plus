<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use React\EventLoop\Factory;
use React\ChildProcess\Process;


class MainProcessController extends Controller
{
    private $global_mark;
    private $process_log_path;
    private $process_number = 1;
    private $child_process_key = 'child_process_';

    public function __construct()
    {
        parent::__construct();
        $this->global_mark = md5(microtime()) . '_';
        $this->process_log_path = __DIR__ . '/../../../storage/process_error.log';
    }

    public function handle()
    {
        Log::info($this->global_mark . 'main_process_act');
        $data = [];
        if (empty($data) || ! is_array($data)) {
            Log::error('invalid data');
            die();
        }
        $this->correctionProcessNumber(count($data));
        $this->chunkChildProcessData($data);
        $this->produceChildProcess();
        // end all child process ，main process to do

        Log::info($this->global_mark . 'main_process_end');
    }

    private function correctionProcessNumber($data_count)
    {
        if ($data_count < $this->process_number) {
            $this->child_process_key = 1;
        }
    }

    private function chunkChildProcessData($data)
    {
        $chunk_data = collect($data)->chunk($this->process_number);
        for ($i = 0; $i < $this->process_number; $i++) {
            $temp_child_process_key = $this->child_process_key . $i;
            Redis::set($temp_child_process_key, $chunk_data[$i]);
        }
    }

    public function produceChildProcess()
    {
        $loop = Factory::create();
        for ($i = 0; $i < $this->process_number; $i++) {
            $temp_child_process_key = $this->child_process_key . $i;
            $temp_cmd = "php artisan process:child {$temp_child_process_key} >> {$this->process_log_path}";
            $$temp_child_process_key = new Process($temp_cmd);
            $$temp_child_process_key->start($loop);
            $$temp_child_process_key->stdout->on('data', function ($chunk) use ($temp_child_process_key) {
                Log::info($temp_child_process_key . '_output', [$chunk]);
            });
        }
        $loop->run();
    }
}