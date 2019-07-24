<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class Controller
 *
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var
     */
    protected $service;
    /**
     *
     */
    const ERROR_CODE = 500;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param null $data
     * @param string $message
     *
     * @return array
     */
    protected function successReturn($data = null, $message = 'success'): array
    {
        $arr = [
            'code' => 200,
            'msg' => $message,
            'data' => $data,
        ];
        return $arr;
    }

    /**
     * @param \Exception $exception
     * @param null $type
     *
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function catchException(\Exception $exception, $type = null)
    {
        $code = self::ERROR_CODE;
        if ($exception->getCode()) {
            $code = $exception->getCode();
        }
        if ('api' == $type) {
            return [
                'code' => $code,
                'data' => ['error_file' => $exception->getFile() . ':' . $exception->getLine()],
                'msg' => $exception->getMessage(),
            ];
        }
        return response($exception->getMessage(), $code);
    }
}
