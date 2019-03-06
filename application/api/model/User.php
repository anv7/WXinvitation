<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-07
 * Time: 17:49
 */

namespace app\api\model;


class User extends BaseModel
{
//    方法名字不能用get？
    public static function getByOpenID($openid){
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }

    public function userInfo(){
        return $this->hasOne('UserInfo','uid','id');
    }
}