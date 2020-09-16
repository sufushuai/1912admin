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

Route::get('admin/index','Admin\IndexController@index');//首页

Route::get('admin/login','Admin\LoginController@login');//登录
Route::post('admin/logindo','Admin\LoginController@logindo');//登录

Route::any('admin/users','Admin\UserController@users');//管理员添加
Route::any('admin/users/index','Admin\UserController@index');//管理员展示

Route::any('admin/role','Admin\RoleController@role');//角色添加
Route::any('admin/role/index','Admin\RoleController@index');//角色展示

Route::any('admin/based','Admin\BasedController@based');//权限添加
Route::any('admin/based/index','Admin\BasedController@index');//权限展示

Route::get('admin/category','Admin\CateController@category');//分类添加
Route::get('admin/cate/index','Admin\CateController@index');//分类展示


Route::get('admin/brand','Admin\BrandController@brand');//品牌添加
Route::get('admin/brand/index','Admin\BrandController@index');//品牌展示


Route::get('admin/vip','Admin\VipController@vip');//vip添加
Route::get('admin/vip/index','Admin\VipController@index');//vip展示

Route::get('admin/discount','Admin\DiscountController@discount');//优惠券添加
Route::get('admin/discount/index','Admin\DiscountController@index');//优惠券展示

Route::get('admin/goods','Admin\GoodsController@goods');//商品添加
Route::get('admin/goods/index','Admin\GoodsController@index');//商品展示


// sku
Route::get('admin/sku/attr','Admin\SkuController@attr');//属性名添加
Route::get('admin/sku/attrIndex','Admin\SkuController@index');//属性名展示
Route::get('admin/sku/val','Admin\SkuController@val');//属性值添加
Route::get('admin/sku/valIndex','Admin\SkuController@valindex');//属性值展示
Route::get('admin/sku/sku','Admin\SkuController@sku');//属性添加
Route::get('admin/sku/skuIndex','Admin\SkuController@skuindex');//属性展示

