<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];
use think\Route;

//获取banner
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
//获取首页主题
Route::get('api/:version/theme','api/:version.Theme/getSampleList');
//获取主题下的产品
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');
//获取首页最新产品
Route::get('api/:version/product/recent','api/:version.Product/getRecent');
//根据分类获取商品
Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');
//获取所有分类
Route::get('api/:version/category/all','api/:version.Category/getAllCategories');
