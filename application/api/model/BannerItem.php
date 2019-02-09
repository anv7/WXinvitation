<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
//    嵌套关联关系
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}
