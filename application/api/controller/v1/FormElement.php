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
    protected $arriveTime =[
        'doIt'=>true,
        "arrive_time"=>'预计到达时间',
        "back_time"=> '预计返程时间',
        "stay"=> '是否住宿',
    ];
    protected $retinue= [
        'doIt'=>true,
        "retinue_name"=> '随行人员的姓名',
        "retinue_phone"=> '随行人员的手机号码'
    ];


    public function getFormArrive(){
        return $this->arriveTime;
    }

    public function getFormRetinue(){
        return $this->retinue;
    }
}