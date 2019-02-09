<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-07
 * Time: 22:59
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = '微信调用失败';
    public $errorCode = 999;
}