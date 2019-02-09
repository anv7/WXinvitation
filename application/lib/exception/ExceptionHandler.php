<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-31
 * Time: 03:32
 */

namespace app\lib\exception;

use think\exception\Handle;
use think\Log;
use think\Request;
use Exception;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    public function render(Exception $e)
    {
        if ($e instanceof BaseException)
        {
            //如果是自定义异常，则控制http状态码，不需要记录日志
            //因为这些通常是因为客户端传递参数错误或者是用户请求造成的异常
            //不应当记录日志

            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }
        else{
            if(config('app_debug')){
//              直接调用父类（Handle）的方法render
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = 'sorry，we make a mistake. (^o^)Y';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        $request = Request::instance();
        $result = [
            'msg'  => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request = $request->url()
        ];
        return json($result, $this->code);
    }

    private function recordErrorLog(Exception $e){
//        对tp框架日志记录功能的初始化重置
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }

}