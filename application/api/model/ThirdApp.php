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
    // an:因为引用的时候不是用的$this，记得试一下this
    public static function checka($ac,$se){
        $app = self::where('app_id','=',$ac)->where('app_secret','=',$se)
            ->find();
        return $app;
    }

}