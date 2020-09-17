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


Route::any('cate/create','Admin\CateController@create');//分类添加
Route::any('cate/store','Admin\CateController@store');//添加逻辑
Route::any('cate/delete','Admin\CateController@delete');//软删除
Route::any('cate/index','Admin\CateController@index');//分类展示
Route::any('cate/edit','Admin\CateController@edit');//分类修改
Route::any('cate/update','Admin\CateController@update');//修改逻辑
Route::any('/admin/category','Admin\CateController@category');//分类添加
Route::any('/admin/cate/index','Admin\CateController@index');//分类展示

Route::any('/admin/brand','Admin\BrandController@brand');//品牌添加页面
Route::any('/brand/add','Admin\BrandController@add');//品牌添加
Route::any('/admin/brandimg','Admin\BrandController@brandimg');//图片添加
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

//RBAC管理员
Route::get('users/add','Admin\UserController@add');//添加
Route::post('users/score','Admin\UserController@score');//执行添加
Route::any('users/index','Admin\UserController@index');//展示
Route::any('users/del','Admin\UserController@del');//删除
Route::any('users/edit/{admin_id}','Admin\UserController@edit');//修改
Route::any('users/update','Admin\UserController@update');//执行修改
//RBAC权限节点
Route::any('based/add','Admin\BasedController@add');//添加
Route::any('based/do_add','Admin\BasedController@do_add');//执行添加
Route::any('based/index','Admin\BasedController@index');//首页
Route::any('based/del','Admin\BasedController@del');//删除
Route::any('based/edit','Admin\BasedController@edit');//修改
Route::any('based/update','Admin\BasedController@update');//执行修改
//RBAC角色
Route::any('role/create', 'Admin\RoleController@create');//添加
Route::any('role/store', 'Admin\RoleController@store');//添加实现
Route::any('role/index', 'Admin\RoleController@index');//展示
Route::any('role/del', 'Admin\RoleController@del');//删除
Route::any('role/edit', 'Admin\RoleController@edit');//修改页面
Route::any('role/update', 'Admin\RoleController@update');//修改实现

