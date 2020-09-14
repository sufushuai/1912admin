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

Route::get('admin/index','Admin\IndexController@index');//后台首页
Route::get('admin/category','Admin\CateController@category');//分类


Route::any('admin/users','Admin\UserController@users');//管理员添加
Route::any('admin/users/index','Admin\UserController@index');//管理员展示
