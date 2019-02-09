<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-07
 * Time: 17:37
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code'=>'require|isNotEmpty'
    ];
    public $message = [
        'code' => '没有code还想获取Token，做梦哦'
    ];
}