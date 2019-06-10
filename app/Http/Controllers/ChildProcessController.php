<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;


/**
 * Class ChildProcessController
 *
 * @package App\Http\Controllers
 */
class ChildProcessController extends Controller
{
    /**
     * @var
     */
    private $child_process_key;
    /**
     * @var
     */
    private $business_name;

    /**
     * ChildProcessController constructor.
     *
     * @param $business_name
     * @param $child_process_key
     */
    public function __construct($business_name, $child_process_key)
    {
        parent::__construct();
        $this->business_name = $business_name;
        $this->child_process_key = $child_process_key;
    }

    /**
     *
     */
    public function handle()
    {
        Log::info($this->child_process_key . ' child process pull up');
        $temp_data = $this->getThisChildProcessData();

        //  Run child app business
        $ChildProcessClass = "\App\Http\Controllers\{$this->business_name}ProcessAction";
        (new $ChildProcessClass())->run($temp_data);
    }

    /**
     * @return mixed
     */
    private function getThisChildProcessData()
    {
        return Redis::get($this->child_process_key);
    }
}
