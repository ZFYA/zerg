<?php

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;
use app\lib\exception\ThemeException;
use think\Controller;

class Product extends Controller{

    public function getRecent($count=15){
        (new Count())->goCheck();
        $result = (new \app\api\model\Product())::getMostRecent($count);

        //当返回结果为数据集的时候使用该方法判断是否有值
        if($result->isEmpty()){
            throw new ThemeException();
        }
        //隐藏summary字段
        $result->hidden(['summary']);
        return $result;

    }


    //根据分类id获取商品
    public function getAllInCategory($id){
        (new IDMustBePositiveInt())->goCheck($id);
        $result = (new \app\api\model\Product())->getProductsByCategoryID($id);
        if($result->isEmpty()){
            throw new ProductException();
        }

        return $result;

    }
}