<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-04-16
 * Time: 18:53
 */

namespace app\lib\exception;


class CheckUidInfoException extends BaseException
{
    public $code = 444;
    public $msg = 'cuz u do not have a full form answer';
    public $errorCode = 40444;
}