<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/login','Admin\LoginController@login');//登录

Route::any('admin/users','Admin\UserController@users');//管理员添加
Route::any('admin/users/index','Admin\UserController@index');//管理员展示

Route::get('admin/index','Admin\IndexController@index');//首页
Route::get('admin/category','Admin\CateController@category');//分类添加
Route::get('admin/cate/index','Admin\CateController@index');//分类展示


Route::get('admin/brand','Admin\BrandController@brand');//商品添加
Route::get('admin/brand/index','Admin\BrandController@index');//商品展示

Route::get('admin/vip','Admin\VipController@vip');//vip添加
Route::get('admin/vip/index','Admin\VipController@index');//vip展示

