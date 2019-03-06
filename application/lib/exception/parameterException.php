<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-01
 * Time: 03:58
 */

namespace app\lib\exception;

/**
 * Class ParameterException
 * 通用参数类异常错误
 */
class parameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}