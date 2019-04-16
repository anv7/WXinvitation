<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-07
 * Time: 17:35
 */

namespace app\api\controller\v1;


use app\api\service\AppToken;
use app\api\service\UserToken;
use app\api\validate\AppTokenGet;
use app\api\validate\TokenGet;

class Token
{
//    接受微信小程序的wx.login()方法的code码
    public function getToken($code=''){
        (new TokenGet())->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get();
        return $token;
//        return [
//            'token' => $token
//        ];
    }
//    第三方应用获取令牌
    public function getAppToken($ac='',$se=''){
        (new AppTokenGet())->goCheck();

        $app = new AppToken();
        $token = $app->get($ac,$se);
        return [
            'token' => $token
        ];
    }
}