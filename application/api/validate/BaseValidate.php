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
}