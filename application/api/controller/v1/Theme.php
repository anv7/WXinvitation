<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-04
 * Time: 01:41
 */

namespace app\api\controller\v1;


use app\api\model\Theme as ThemeModel;
use app\api\validate\IDCollection;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    //@ids = 1,2,3....
     public function getSimpleList($ids = ''){
         (new IDCollection())->goCheck();
         $ids = explode(',',$ids);
         $result = ThemeModel::with('headImg,topicImg')->select($ids);
         if(!$result){
             throw new ThemeException();
         }
         return $result;
     }
//    @url theme/:id
    public function getComplexOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProduct($id);
        if($theme->isEmpty()){
            throw new ThemeException();
        }
        return $theme;
    }
}


// http://z.cn/api/v1/theme?ids=1,2,3