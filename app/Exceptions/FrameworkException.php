<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use \Illuminate\Http\JsonResponse;

/**
 * Class FrameworkException
 * @package App\Exceptions
 */
class FrameworkException extends Exception
{
    /**
     *
     */
    public function report(): void
    {
        Log::notice($this->getMessage() . ':' . $this->getFile() . '.' . $this->getLine());
        if (empty($this->getCode())) {
            $this->code = 500;
        }
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json(
            ['code' => $this->code, 'msg' => $this->message],
            503
        );
    }
}
