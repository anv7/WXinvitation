<?php

namespace app\api\model;


class image extends BaseModel
{
    protected $visible = ['url'];
//    读取器
   public function getUrlAttr($value, $data){
       return $this->prefixImgUrl($value, $data);
   }
//    public function image(){
//        return $this->belongsTo('image');
//    }
}
