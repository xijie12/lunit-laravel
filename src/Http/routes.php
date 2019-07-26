<?php
/**
 * Created by PhpStorm.
 * User: hd-003
 * Date: 2019/7/26
 * Time: 14:54
 */
Route::get('/', 'LunitController@index');
Route::post('/', 'LunitController@store')->name('lunit.store');

// 测试路由
Route::get('test', 'TestController@index');
