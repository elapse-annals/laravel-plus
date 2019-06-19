<?php

namespace App\Exceptions;

use Exception;
use Log;

/**
 * Class FrameworkException
 *
 * @package App\Exceptions
 */
class FrameworkException extends Exception
{
    /**
     *
     */
    public function report()
    {
        Log::notice($this->getMessage() . ':' . $this->getFile() . '.' . $this->getLine());
        if (empty($this->getCode())) {
            $this->code = 500;
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json(
            ['code' => $this->code, 'msg' => $this->message],
            503
        );
    }
}
