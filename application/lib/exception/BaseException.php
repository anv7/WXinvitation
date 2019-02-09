<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-31
 * Time: 03:30
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code = 400;
    public $msg = 'invalid parameters';
    public $errorCode = 999;

    public function __construct($params = [])
    {
        if(!is_array($params)){
            return;
        }

        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}