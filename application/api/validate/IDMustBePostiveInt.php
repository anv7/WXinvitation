<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-29
 * Time: 14:56
 */

namespace app\api\validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPostiveInteger',
//        'num' =>'in:1,2,3'
    ];

//    专门在验证器里面提供错误返回信息的一个成员变量
    protected $message = [
        'id' => 'id必须是正整数'
    ];
}