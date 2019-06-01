<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;


class ChildProcessController extends Controller
{
    private $child_process_key;

    public function __construct($child_process_key)
    {
        parent::__construct();
        $this->child_process_key = $child_process_key;
    }

    public function handle()
    {
        Log::info($this->child_process_key . ' child process pull up');
        //        get main give data
        $this->getThisChildProcessData();
        //        run this business
    }

    private function getThisChildProcessData()
    {
        return Redis::get($this->child_process_key);
    }
}
