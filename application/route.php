<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::get('hello', 'sample/Test/hello');

/* route的三段式写法 模块/控制器/方法 */
//Route::get('api/v1/banner/:id','api/v1.Banner/getBanner');

//👇使用动态的写法 👆静态写法

//请求邀请函封面和小程序背景图
Route::get('api/:version/background/:id','api/:version.background/getBackground');
//请求邀请函信件信息的
Route::get('api/:version/docs/:id','api/:version.docs/getDocs');

//通过微信用户端code码获取openId和办法令牌
Route::post('api/:version/token/user', 'api/:version.Token/getToken');//颁发个令牌

//必填问题之后若干个问题页面
Route::get('api/:version/form/formArrive','api/:version.FormElement/getFormArrive');
//必填问题页 问题们
Route::get('api/:version/form/basicQuestions','api/:version.FormElement/getBasicQuestions');

//收集必填页面的信息
Route::post('api/:version/basicinfo','api/:version.FormInfo/BasicInfo');
//收集必填页面之后的若干个页面的信息
Route::post('api/:version/basicanswer','api/:version.FormInfo/BasicAnswer');

//表单提交状态的查询
Route::post('api/:version/checkinfo','api/:version.CheckUidInfo/checkInfo');
