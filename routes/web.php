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

//商品分类管理
Route::any('cate/create','Admin\CateController@create');//分类添加
Route::any('cate/store','Admin\CateController@store');//添加逻辑
Route::any('cate/delete','Admin\CateController@delete');//软删除
Route::any('cate/index','Admin\CateController@index');//分类展示
Route::any('cate/edit','Admin\CateController@edit');//分类修改
Route::any('cate/update','Admin\CateController@update');//修改逻辑


//品牌管理
Route::any('/admin/brand','Admin\BrandController@brand');//品牌添加页面
Route::any('/brand/add','Admin\BrandController@add');//品牌添加
Route::any('/brand/brandimg','Admin\BrandController@brandimg');//图片添加
Route::any('/brand/edit','Admin\BrandController@edit');//修改页面
Route::any('/brand/update','Admin\BrandController@update');//修改
Route::any('/brand/index','Admin\BrandController@index');//品牌展示
Route::any('/brand/destroy','Admin\BrandController@destroy');//品牌展示


//VIP管理
Route::any('/admin/vip','Admin\VipController@vip');//vip添加
Route::any('/admin/vip/adddo','Admin\VipController@adddo');//vip添加
Route::any('/admin/vip/index','Admin\VipController@index');//vip展示
Route::any('/admin/vip/del','Admin\VipController@del');//vip删除
Route::any('/admin/vip/uploads','Admin\VipController@uploads');//vip图片上传
Route::any('/admin/vip/update/{id}','Admin\VipController@update');//vip修改
Route::any('/admin/vip/updatedo','Admin\VipController@updatedo');//vip修改


//优惠券管理
Route::get('admin/discount','Admin\DiscountController@discount');//优惠券添加
Route::any('discount/adddo','Admin\DiscountController@adddo');//添加
Route::any('discount/del','Admin\DiscountController@del');//删除
Route::any('discount/update/{id}','Admin\DiscountController@update');//修改
Route::any('discount/updatedo','Admin\DiscountController@updatedo');//修改
Route::get('admin/discount/index','Admin\DiscountController@index');//优惠券展示

//商品管理
Route::any('/admin/goods','Admin\GoodsController@goods');//商品添加页面
Route::any('/goods/add','Admin\GoodsController@add');//商品添加
Route::any('/goods/goodsimg','Admin\GoodsController@add');//商品图片添加
Route::any('/goods/edit','Admin\GoodsController@edit');//商品修改页面
Route::any('/goods/update','Admin\GoodsController@update');//商品修改
Route::any('/goods/destroy','Admin\GoodsController@destroy');//商品修改
Route::any('/goods/index','Admin\GoodsController@index');//商品展示

//广告管理
Route::any('/admin/ad','Admin\AdController@ad');//广告添加
Route::any('/admin/ad/index','Admin\AdController@index');//广告展示
Route::any('/admin/ad/adDel/{id}','Admin\AdController@adDel');//广告展示
Route::any('/admin/ad/adUp/{id}','Admin\AdController@adUp');//广告展示
Route::any('/admin/ad/allDel','Admin\AdController@allDel');//广告展示

//友情链接管理
Route::any('/admin/foot','Admin\FootController@foot');//友情链接添加
Route::any('/admin/foot/index','Admin\FootController@index');//友情链接展示


//轮播图
Route::any('/slide/add','Admin\SlideController@add');//轮播图添加
Route::any('/slide/do_add','Admin\SlideController@do_add');//轮播图执行添加
Route::any('/slide/index','Admin\SlideController@index');//轮播图展示
Route::any('/slide/slideimg','Admin\SlideController@slideimg');//轮播图文件上传

// sku

//属性名
Route::any('/admin/sku/attr','Admin\SkuController@attr');//属性名添加
Route::any('/admin/sku/attrIndex','Admin\SkuController@index');//属性名展示
Route::any('/admin/sku/attrDel/{id}','Admin\SkuController@attrDel');//属性名删除
Route::any('/admin/sku/attrUp/{id}','Admin\SkuController@attrUp');//属性名编辑
//属性值
Route::any('/admin/sku/val','Admin\SkuController@val');//属性值添加
Route::any('/admin/sku/valIndex','Admin\SkuController@valindex');//属性值展示
Route::any('/admin/sku/valDel/{id}','Admin\SkuController@valDel');//属性名删除
Route::any('/admin/sku/valUp/{id}','Admin\SkuController@valUp');//属性名编辑
//属性
Route::any('/admin/sku/sku','Admin\SkuController@sku');//属性添加
Route::any('/admin/sku/skuIndex','Admin\SkuController@skuindex');//属性展示
Route::any('/admin/sku/skuDel/{id}','Admin\SkuController@skuDel');//属性名删除
Route::any('/admin/sku/skuUp/{id}','Admin\SkuController@skuUp');//属性名编辑

//RBAC用户
Route::get('users/add','Admin\UserController@add');//添加
Route::post('users/score','Admin\UserController@score');//执行添加
Route::any('users/index','Admin\UserController@index');//展示
Route::any('users/del','Admin\UserController@del');//删除
Route::any('users/edit/{admin_id}','Admin\UserController@edit');//修改
Route::any('users/update','Admin\UserController@update');//执行修改
Route::any('users/usersdel','Admin\UserController@usersdel');//批量删除
//RBAC权限节点
Route::any('based/add','Admin\BasedController@add');//添加
Route::any('based/do_add','Admin\BasedController@do_add');//执行添加
Route::any('based/index','Admin\BasedController@index');//首页
Route::any('based/del','Admin\BasedController@del');//删除
Route::any('based/edit/{based_id}','Admin\BasedController@edit');//修改
Route::any('based/update','Admin\BasedController@update');//执行修改
Route::any('based/bdel','Admin\BasedController@bdel');//批量删除
//RBAC角色
Route::any('role/create', 'Admin\RoleController@create');//添加
Route::any('role/store', 'Admin\RoleController@store');//添加实现
Route::any('role/index', 'Admin\RoleController@index');//展示
Route::any('role/del', 'Admin\RoleController@del');//删除
Route::any('role/edit', 'Admin\RoleController@edit');//修改页面
Route::any('role/update', 'Admin\RoleController@update');//修改实现

//RBAC用户角色
Route::any('/adminrole/adminrole/{id}', 'Admin\AdminroleController@adminrole');//用户角色添加
Route::any('/adminrole/add', 'Admin\AdminroleController@add');//用户角色添加实现
//RBAC用户权限
Route::any('/adminbased/adminbased/{id}', 'Admin\AdminbasedController@adminbased');//用户权限添加
Route::any('/adminbased/add', 'Admin\AdminbasedController@add');//角色权限添加实现



Route::any('role/roledel','Admin\RoleController@roledel');//批量删除


