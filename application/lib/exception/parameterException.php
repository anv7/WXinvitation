<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-01
 * Time: 03:58
 */

namespace app\lib\exception;


class parameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}