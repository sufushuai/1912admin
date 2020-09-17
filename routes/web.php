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

Route::get('/admin/index','Admin\IndexController@index');//首页

Route::get('/admin/login','Admin\LoginController@login');//登录
Route::post('/admin/logindo','Admin\LoginController@logindo');//执行登录

Route::any('/admin/users','Admin\UserController@users');//管理员添加
Route::any('/admin/users/index','Admin\UserController@index');//管理员展示

Route::any('/admin/role','Admin\RoleController@role');//角色添加
Route::any('/admin/role/index','Admin\RoleController@index');//角色展示

Route::any('/admin/based','Admin\BasedController@based');//权限添加
Route::any('/admin/based/index','Admin\BasedController@index');//权限展示

Route::any('/admin/category','Admin\CateController@category');//分类添加
Route::any('/admin/cate/index','Admin\CateController@index');//分类展示


Route::any('/admin/brand','Admin\BrandController@brand');//品牌添加
Route::any('/admin/brandimg','Admin\BrandController@brandimg');//品牌添加
Route::any('/admin/brand/index','Admin\BrandController@index');//品牌展示


Route::any('/admin/vip','Admin\VipController@vip');//vip添加
Route::any('/admin/vip/index','Admin\VipController@index');//vip展示

Route::any('/admin/discount','Admin\DiscountController@discount');//优惠券添加
Route::any('/admin/discount/index','Admin\DiscountController@index');//优惠券展示

Route::any('/admin/goods','Admin\GoodsController@goods');//商品添加
Route::any('/admin/goods/index','Admin\GoodsController@index');//商品展示


// sku
Route::any('/admin/sku/attr','Admin\SkuController@attr');//属性名添加
Route::any('/admin/sku/attrIndex','Admin\SkuController@index');//属性名展示
Route::any('/admin/sku/attrDel/{id}','Admin\SkuController@attrDel');//属性名删除
Route::any('/admin/sku/attrUp/{id}','Admin\SkuController@attrUP');//属性名编辑

Route::any('/admin/sku/val','Admin\SkuController@val');//属性值添加
Route::any('/admin/sku/valIndex','Admin\SkuController@valindex');//属性值展示
Route::any('/admin/sku/sku','Admin\SkuController@sku');//属性添加
Route::any('/admin/sku/skuIndex','Admin\SkuController@skuindex');//属性展示

