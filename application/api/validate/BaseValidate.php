<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-29
 * Time: 21:40
 */

namespace app\api\validate;


use app\lib\exception\parameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance();
        $params = $request->param();

        $result = $this->batch()->check($params);
        if(!$result){
            $e = new parameterException([
                'msg' => $this->error,
            ]);
            throw $e;
        }
        else{
            return true;
        }
    }

    public function getDataByRule($arrays){
        if(array_key_exists('user_id',$arrays)|array_key_exists('uid',$arrays)){
            throw new parameterException([
                'msg'=>'参数含有非法变量'
            ]);
        };
        $newArray = [];

        foreach ($this->rule as $key => $value){
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }

    //必须是正整数
    protected function isPostiveInteger($value, $rule = '', $data = '', $field = ''){
        if($value){
            if(is_numeric($value)&&is_int($value+0)&&($value+0)>0){
                return true;
            }
        }
//        return $field.'必须是正整数';
        return false;
    }
//    不能为空
    protected function isNotEmpty($value, $rule = '', $data = '', $field = ''){
        if(empty($value)){
            return false;
        }
        else{
            return true;
        }
    }

    //没有使用TP的正则验证，集中在一处方便以后修改
    //不推荐使用正则，因为复用性太差
    //手机号的验证规则
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}