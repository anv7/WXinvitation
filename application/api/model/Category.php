<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-06
 * Time: 23:12
 */

namespace app\api\model;


class Category extends BaseModel
{
    public $hidden=['delete_time','update_time'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }

}