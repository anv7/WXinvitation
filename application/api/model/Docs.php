<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-27
 * Time: 15:46
 */

namespace app\api\model;


class Docs extends BaseModel
{
    public static function getDocsApp($id){
        $artic = self::where('id',$id)->find();
        return $artic;
    }
}