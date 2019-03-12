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
    protected $basicQuestions = [

        'firQuestion' => [
            'type' => 'time',
            'field' => 'arriveTime',
            'question' => '预计到达时间',
        ],
        'secQuestion' => [
            'type' => 'time',
            'field' => 'backTime',
            'question' => '预计返程时间',
        ],
        'thrQuestion' => [
            'type' => 'text',
            'field' => 'otherTime',
            'model' => 'number',
            'question' => '其他时间',
        ],
        'fourQuestion' => [
            'type' => 'checkbox',
            'field' => 'meet',
            'question' => '选择你参加的活动',
            'checkboxValue' => [
                'value_1' => '校庆开幕式',
                'value_2' => '校史展览',
                'value_3' => '重点实验科目研讨会',
                'value_4' => '校庆表彰大会',
                'value_5' => '校庆闭幕式',
            ],
        ],
        'fivQuestion' => [
            'type' => 'radio',
            'field' => 'hurry',
            'question' => 'Radio单选框',
            'radioValue' => [
                'value_1' => '选一',
                'value_2' => '选二',
                'value_3' => '选三',
            ],
        ],


    ];

    //    询问页面_>问题页面
    protected $elements = [
        //        第一个页面
        'arrive' => [
            'isSwitch' => '是否需要预定房间？',

            '1'=>[
                'type'=>'checkbox',
                'field'=>'hotel',
                'question'=>'选择您的下榻酒店(附近)',
                'checkboxValue'=>[
                    'value_1' => '汉庭酒店',
                    'value_2' => '锦江都城酒店',
                    'value_3' => 'Westin酒店',
                    'value_4'=> '开元酒店',
                ],
            ],
            '2' => [
                'type' => 'time',
                'field' => 'hotelOpenTime',
                'question' => '预计入住时间',
            ],
            '3' => [
                'type' => 'time',
                'field' => 'hotelCloseTime',
                'question' => '预计退房时间',
            ],

            '4'=>[
                'type'=>'text',
                'model'=>'number',
                'field'=>'bigBedRoom',
                'question'=>'预定大床房数量',
            ],
            '5'=>[
                'type'=>'text',
                'model'=>'number',
                'field'=>'twoBedRoom',
                'question'=>'预定标准间数量',
            ],
            '6'=>[
                'type'=>'text',
                'model'=>'number',
                'field'=>'moreBedRoom',
                'question'=>'预定三人房数量',
            ],
            '7' => [
                'type' => 'radio',
                'field' => 'hotelBreakfast',
                'question' => '是否需要酒店早餐',
                'radioValue' => [
                    'value_1' => '需要',
                    'value_2' => '不需要',
                ],
            ],


        ],
        // 第二个页面...
        'retinue' => [
            'isSwitch' => '是否有随行人员？',
            'firQuestion' => [
                'type' => 'text',
                'field' => 'retinueName',
                'question' => '随行联络人姓名',
            ],
            'secQuestion' => [
                'type' => 'text',
                'field' => 'retinuePhone',
                // 需要收集手机号 xxxModel建议为number
                'model' => 'number',
                'question' => '随行联络人手机号',
            ],
            'thirQuestion' => [
                'type' => 'text',
                'model' => 'number',
                'field' => 'total',
                'question' => '总人数(含自己)',
            ],


        ],

    ];

    public function getBasicQuestions()
    {
        return $this->basicQuestions;
    }

    public function getFormArrive()
    {
        return $this->elements;
    }
}