<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-03-06
 * Time: 23:03
 */

namespace app\api\validate;


class BasicInfo extends BaseValidate
{
    protected $rule = [
        'name' => 'require|isNotEmpty',
        'phone' => 'require|isMobile',
    ];
}