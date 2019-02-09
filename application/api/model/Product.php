<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-04
 * Time: 01:39
 */

namespace app\api\model;


class Product extends BaseModel
{
    public $hidden = ['delete_time','category_id','from','create_time','update_time','pivot'];

    public function getMainImgUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }
    public static function getMostRecnt($count){
        $products = self::limit($count)->order('create_time desc')->select();
        return $products;
    }
    public static function getProductsByCategoryID($id){
        $products = self::where('category_id','=','$id')->select();
        return $products;
    }
}