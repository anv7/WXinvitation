<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-08
 * Time: 12:33
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'token已过期或无效';
    public $errorCode = 10001;
}