<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-06
 * Time: 15:45
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;
use app\api\model\Product as ProductModel;

class Product
{
//    url: z.cn/api/v1/product/recent
    public function getRecent($count = 15){
        (new Count())->goCheck();
        $products = ProductModel::getMostRecnt($count);
        if($products->isEmpty()){
            throw new ProductException();
        }
        //        数组转数据集对象的处理方法，内聚性就很8错/或者啊 直接让数据库不返回数组，返回数据集方式更优雅
//        $collection = collection($products);
        $products = $products->hidden(['summary']);
        return $products;
    }

    public function getAllInCategory($id){
        (new IDMustBePostiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }
}