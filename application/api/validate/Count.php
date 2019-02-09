<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-06
 * Time: 15:52
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPostiveInteger|between:1,15',

    ];
}