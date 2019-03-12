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
    protected $basicQuestions=[

        'firQuestion'=>[
            'type'=>'time',
            'field'=>'arriveTime',
            'question'=>'预计到达时间',
        ],
        'secQuestion'=>[
            'type'=>'time',
            'field'=>'backTime',
            'question'=> '预计返程时间',
        ],
        'thrQuestion'=>[
            'type'=>'text',
            'field'=>'otherTime',
            'model'=>'number',
            'question'=> '其他时间',
        ],
        'fourQuestion'=>[
            'type'=>'checkbox',
            'field'=>'meet',
            'question'=>'选择你参加的活动',
            'checkboxValue'=>[
                'value_1'=>'校庆开幕式',
                'value_2'=>'校史展览',
                'value_3'=>'重点实验科目研讨会',
                'value_4'=>'校庆表彰大会',
                'value_5'=>'校庆闭幕式',
            ],
        ],
        'fivQuestion'=>[
            'type'=>'radio',
            'field'=>'hurry',
            'question'=>'Radio单选框',
            'radioValue'=>[
                'value_1'=>'选一',
                'value_2'=>'选二',
                'value_3'=>'选三',
            ],
        ],



    ];

//    询问页面_>问题页面
    protected $elements =[
//        第一个页面
        'arrive'=>[
            'isSwitch'=>'是否需要预定房间？',

            'firType'=>'time',
            'firField'=>'arriveTime',
            'firQuestion'=>'预计到达时间',

            'secType'=>'time',
            'secField'=>'backTime',
            'secQuestion'=> '预计返程时间',

            'thrType'=>'radio',
            'thrField'=>'stay',
            'thrQuestion'=> '是否住宿',
            'radioValue'=> [
                'value_1'=>'需要',
                'value_2'=>'不需要',
            ],
        ],
//        第二个页面...
        'retinue'=>[
            'isSwitch'=>'是否有随行人员？',

            'firType'=>'text',
            'firField'=>'retinueName',
            'firQuestion'=> '联络人姓名',

            'secType'=>'text',
            'secField'=>'retinuePhone',
//            需要收集手机号 xxxModel建议为number
            'secModel'=>'number',
            'secQuestion'=> '联络人手机号',

            'thrType'=>'text',
            'thrModel'=>'number',
            'thrField'=>'total',
            'thrQuestion'=> '携员人数(含自己)',

        ],

    ];

    public function getBasicQuestions(){
        return $this->basicQuestions;
    }
    public function getFormArrive(){
        return $this->elements;
    }
}