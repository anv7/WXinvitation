<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-08
 * Time: 17:56
 */

namespace app\api\validate;


class AppTokenGet extends BaseValidate
{
    public $rule = [
        'ac' => 'require|isNotEmpty',
        'se' => 'require|isNotEmpty'
    ];
//    public $message = [
//
//    ];
}