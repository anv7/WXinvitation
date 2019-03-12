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
use app\api\model\UserInfo as UserInfoModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;
use think\Request;

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
        $userName = $user->userInfo;//查询的userInfo表里面有没有这个uid
        if(!$userName){
            $user->userInfo()->save($dataArray);
        }
        else{
            $user->userInfo->save($dataArray);
        }
        return new SuccessMessage();
    }


    public function set($uid,$key,$value){
        $config = UserInfoModel::findData($key);
        $user = UserModel::get($uid);
        if(!$config){
            UserInfoModel::create([
                'uid'=>$uid,
                'key'=>$key,
                'value'=>$value
            ]);
        }else{
            UserInfoModel::where('key','=',$key)->update([
                'value'=>$value
            ]);
        }
    }

    public function basicAnswer(){
        $uid = TokenService::getCurrentUid();
        $user =UserModel::get($uid);
        if(!$user){
            throw new UserException();
        };

        $request = Request::instance();
        $info = $request->post();

        foreach($info as $key => $value) {
            $this->set($uid,$key,json_encode($value));
        }
        return new SuccessMessage();
    }

}