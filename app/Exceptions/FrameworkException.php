<?php

namespace App\Exceptions;

use Exception;

class FrameworkException extends Exception
{
    protected $message;

    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $message;
    }

    public function report()
    {
        // 这里自定义发生异常发生时要额外做的事情
        // 比如发邮件通知管理员
        //
    }

    public function render()
    {
        // 这里需要给浏览器或者API返回必要的通知信息
        // 可以是json 结构, 一般是针对API调用的
        // 也可以渲染一个网页, 一般是针对浏览器访问的页面
        // 也可以直接重定向到其他网页
        return response()->json(['status' => 200, 'message' => $this->message], 503);
    }
}
