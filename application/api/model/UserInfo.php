<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-03-06
 * Time: 23:32
 */

namespace app\api\model;


class UserInfo extends BaseModel
{
    public static function findData($key){
        return self::where('key','=',$key)->find();
    }
}