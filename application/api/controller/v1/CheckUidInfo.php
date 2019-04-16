<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-04-16
 * Time: 17:17
 */

namespace app\api\controller\v1;


use app\api\validate\BasicInfo;
use app\api\service\Token as TokenService;
use app\api\service\UserToken;
use app\api\model\UserInfo;
use app\lib\exception\CheckUidInfoException;
use think\Request;


class CheckUidInfo
{
    public function checkInfo($uid=''){
//        $validate = new BasicInfo();
//        $validate->goCheck();
//        $uid = Request::instance()->header('uid');
//        $uid = TokenService::getCurrentUid();
        $result = UserInfo::checkUidInfo($uid);
        if(count($result)==0){
            throw new CheckUidInfoException();
        }else{
            return $result;
        }
    }
}