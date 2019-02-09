<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-01-26
 * Time: 01:06
 */

namespace app\api\controller\v1;


use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
//    获取指定id的banner信息
//    接口的访问路径@url /banner/:id
//    @http GET
//    @id指明的是banner的id号
    public function getBanner($id){
        (new IDMustBePostiveInt()) -> goCheck();
        $banner = BannerModel::getBannerByID($id);


//        并不是最好的隐藏解决方案，应该把它写在模型外面
//        $banner->hidden(['delete_time', 'update_time']);

//        让banner模型（对象）只显示id这一个属性，这也是把对象封装成模型的好处，有很多的方法和属性可以利用，告别原始代码
//        $banner->visible(['id']);

//        比较搓的方法：通过对象转换数组的方法，使用unset释放删除数组里的元素
//        $data = $banner->toArray();
//        unset($data['delete_time']);

//        try{
//        }
//        catch (Exception $ex){
//            $err = [
//                'error_code' =>1001,
//                'msg' =>$ex->getMessage()
//            ];
//            return json($err, 400);
//        }
        if($banner->isEmpty()){
            throw new BannerMissException();
        }
        return $banner;
    }
}