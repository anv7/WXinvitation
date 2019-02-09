<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-26
 * Time: 16:07
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'request|max:10',
        'email' => 'email'
    ];
}