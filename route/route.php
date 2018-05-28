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

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
Route::get('/passport$', 'passport/index');
Route::get('/passport/find$', 'passport/find');
Route::post('/passport/signup$', 'passport/login');
Route::get('/case', 'cases/index');
Route::get('/compnent', 'compnent/index');
Route::get('/contact', 'index/contact');
return [

];
