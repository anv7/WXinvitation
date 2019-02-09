<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-07
 * Time: 17:55
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    function __construct($code){
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);

    }

    public function get(){
        $result = curl_get($this->wxLoginUrl);
//        对JSON格式的字符串进行解码，转换为PHP变量
        $wxResult = json_decode($result,true);
        if(empty($wxResult)){
            throw new Exception('获取session_key和openID异常，微信内部错误');
        }
        else{
            $loginFail = array_key_exists('errorcode',$wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }
            else{
                return $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
//        拿到openID
//        数据库里看一下，有没有这个openID
//        如果存在，则不处理，不存在就新增一条user记录
//        生成令牌，准备缓存数据，写入缓存
//        把令牌返回到客户端去
//        为什么要写缓存，写缓存里面需要有什么？
//        key:令牌
//        value：wxResult,uid,scope(权限的控制)
        $openid = $wxResult['openid'];
        $user = UserModel::getByOpenID($openid);
        if($user){
            $uid = $user->id;
        }
        else{
            $uid = $this->newUser($openid);
        }
        $CachedValue = $this->prepareCachedValue($wxResult, $uid);
        $token = $this->saveToCache($CachedValue);
        return $token;
    }

    private function saveToCache($CachedValue){
        $key = self::generateToken();
        $value = json_encode($CachedValue);
        $expire_in = config('setting.token_expire_in');
//        写入缓存
        $request = cache($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }

//    整合的各种value值
    private function prepareCachedValue($wxResult, $uid){
        $CachedValue = $wxResult;
        $CachedValue['uid'] = $uid;
        $CachedValue['scope'] = 16;
        return $CachedValue;

    }

//    创建一个新的用户，同时会返回创建之后的记录
    private function newUser($openid){
        $user = UserModel::create([
            'openid' => $openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}