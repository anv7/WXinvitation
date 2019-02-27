<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-27
 * Time: 15:53
 */

namespace app\api\controller\v1;

use app\api\model\Docs as DocsModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\DocsException;

class Docs
{
    public function getDocs($id){
        (new IDMustBePostiveInt())->goCheck();

        $result = DocsModel::getDocsApp($id);
        if(!$result){
           throw new DocsException();
        }
        return $result;
    }
}