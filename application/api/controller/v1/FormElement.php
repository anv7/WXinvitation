<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-03-05
 * Time: 00:37
 */

namespace app\api\controller\v1;

class FormElement
{
    protected $elements =[
//        第一个页面
        'arrive'=>[
            'doIt'=>true,

            'firType'=>'time',
            "firQuestion"=>'预计到达时间',
            'firField'=>'arriveTime',

            'secType'=>'time',
            "secQuestion"=> '预计返程时间',
            'secField'=>'backTime',

            'thrType'=>'radio',
            "thrQuestion"=> '是否住宿',
            'thrField'=>'stay',
            'radioValue'=> [
                'value_1'=>'需要',
                'value_2'=>'不需要',
            ],
        ],
//        第二个页面...
        'retinue'=>[
            'doIt'=>true,

            'firType'=>'text',
            'firField'=>'retinueName',
            "firQuestion"=> '随行人员姓名',

            'secType'=>'text',
            'secField'=>'retinuePhone',
//            需要收集手机号 xxxModel建议为number
            'secModel'=>'number',
            "secQuestion"=> '随行人员手机号',

            'thrType'=>'text',
            'thrModel'=>'number',
            'thrField'=>'total',
            "thrQuestion"=> '携员人数(含自己)',

        ],

    ];


    public function getFormArrive(){
        return $this->elements;
    }
}