<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-04
 * Time: 01:39
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['delete_time','topic_img_id','head_img_id','update_time'];


//    定义关联关系
    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }
    public function products(){
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }
//    之后这是查询所定义的关联关系
    public static function getThemeWithProduct($id){
       $theme = self::with('products,headImg,topicImg')->find($id);
       return $theme;
    }
}