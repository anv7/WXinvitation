<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value, $data){
        $finalUrl = $value;
        if($data['from'] == 1){
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
    //    读取器,这种名字会被框架自动的认定为读取器
//    public function getUrlAttr($value, $data){
//        $finalUrl = $value;
//        if($data['from'] == 1){
//            $finalUrl = config('setting.img_prefix').$value;
//        }
//        return $finalUrl;
//    }
}
