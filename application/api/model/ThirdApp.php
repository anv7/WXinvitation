<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-08
 * Time: 21:58
 */

namespace app\api\model;


class ThirdApp extends BaseModel
{
//    不是静态方法就不行？？
    public static function checka($ac,$se){
        $app = self::where('app_id','=',$ac)->where('app_secret','=',$se)
            ->find();
        return $app;
    }

}