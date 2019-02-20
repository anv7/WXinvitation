<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-20
 * Time: 17:38
 */

namespace app\api\model;


class Background extends BaseModel
{
    public $hidden = ['delete_time','update_time','description','name'];

    public function background(){
        return $this->hasOne('image','id');
    }

    public static function getBackgroundById($id){
        return self::with('background')->find($id);
    }
}