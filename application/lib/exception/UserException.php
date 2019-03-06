<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-03-06
 * Time: 23:26
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 401;
    public $msg = '此用户不存在啊';
    public $errorCode = 70000;
}