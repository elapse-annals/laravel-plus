<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //        get main give data
        $this->getThisChildProcessData();
        //        run this business
    }

    private function getThisChildProcessData()
    {
        return Redis::get($this->child_process_key);
    }
}
