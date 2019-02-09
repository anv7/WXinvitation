<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-07
 * Time: 00:11
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '指定的商品目录不存在，请检查参数';
    public $errorCode = 50000;
}