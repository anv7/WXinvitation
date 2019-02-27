<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-27
 * Time: 16:02
 */

namespace app\lib\exception;


class DocsException extends BaseException
{
    public $code = 404;
    public $msg = 'u wants Docs has none';
    public $errorCode = 40000;
}