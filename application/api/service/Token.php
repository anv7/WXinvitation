<?php
/**
 * Created by PhpStorm.
 * User: anv
 * Date: 2019-02-08
 * Time: 12:12
 */

namespace app\api\service;


class Token
{
    public static function generateToken(){
//        32个字符组成的字符串
        $randChars = getRandChar(32);
//        用3组字符串，进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME'];
//        salt 盐
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }
}