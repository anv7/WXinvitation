<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-05
 * Time: 17:23
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '请求的主题不存在';
    public $errorCode = 3000;
}