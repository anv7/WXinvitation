<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-31
 * Time: 03:34
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = 'banner none';
    public $errorCode = 10000;
}