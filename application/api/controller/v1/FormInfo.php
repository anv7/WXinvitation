<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-03-06
 * Time: 22:54
 */

namespace app\api\controller\v1;


use app\api\validate\BasicInfo;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;


class FormInfo
{
    public function basicInfo(){
        $validate = new BasicInfo();
        $validate->goCheck();
//        根据Token来获取存在服务器端的缓存来获取uid
        $uid = TokenService::getCurrentUid();

        $user =UserModel::get($uid); //这样就可以直接查数据库了吗？？？？？？？
        if(!$user){
            throw new UserException();
        };

        $dataArray = $validate->getDataByRule(input('post.')); //?????
        $userName = $user->userInfo;
        if(!$userName){
            $user->userInfo()->save($dataArray);
        }
        else{
            $user->userInfo->save($dataArray);
        }
        return new SuccessMessage();
    }
}