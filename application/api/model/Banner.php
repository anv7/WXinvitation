<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-30
 * Time: 02:22
 */

namespace app\api\model;

use think\Db;
use think\Model;

class Banner extends BaseModel
{
//    protected $table = 'category';
    protected $hidden = ['delete_time'];
//    建立数据库关系
    public function items(){
        return $this->hasMany('Banner_item','banner_id','id');
    }
//    数据库查询语句
    public static function getBannerByID($id){
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;


//        其他方法👇

//        根据bannerID号返回banner信息
//        $result = Db::query('select * from banner_item where banner_id=?',[$id]);
//        return $result;

//        链式方法
//        $result = Db::table('banner_item')->where('banner_id','=',$id)->select();
//        return $result;
//        sql查询语句的三种方法：表达式法、数组法（听讲不够安全）、闭包法👇
//        $result = Db::table('banner_item')
//            ->where(function ($query) use ($id){
//             $query->where('banner_id','=',$id);
//        })->select();
//        return $result;
    }
}