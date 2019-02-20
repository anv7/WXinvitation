<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-20
 * Time: 18:45
 */

namespace app\api\controller\v1;

use app\api\model\Background as BackgroundModel;
use app\api\validate\IDMustBePostiveInt;

class Background
{
    public function getBackground($id){
        (new IDMustBePostiveInt())->goCheck();
        $background = BackgroundModel::getBackgroundById($id);
        return $background;
    }
}