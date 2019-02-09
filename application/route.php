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
Route::get('api/:version/banner/:id', 'api/:version.banner/getBanner');
