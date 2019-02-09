<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-08
 * Time: 22:17
 */

namespace app\api\service;


use app\api\model\ThirdApp as ThirdAppModel;
use app\lib\exception\TokenException;

class AppToken extends Token
{
    public function get($ac,$se){
        $app = ThirdAppModel::checka($ac,$se);
        if(!$app){
            throw new TokenException([
                'msg' => '请求的内容不存在',
            ]);
        }
        else{
            $scope = $app->scope;
            $uid = $app->id;
            $value = [
                'scope' => $scope,
                'uid' => $uid
            ];
            $token = $this->saveToCache($value);
            return $token;
        }
    }

    private function saveToCache($value){
        $token = self::generateToken();
        $expire_in = config('setting.token_expire_in');
        $result = cache($token,json_encode($value),$expire_in);
        if(!$result){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $token;
    }
}