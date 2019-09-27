<?php

namespace app\api\controller\v1;

use app\lib\exception\CategoryException;
use think\Controller;

class Category extends  Controller
{
    public function getAllCategories()
    {
        //all第一个参数是 要查询的id 数组  第二个参数是关联的表
//        $result = (new \app\api\model\Category())->with('img')->select();
        $result = \app\api\model\Category::all([],'img');
        if($result->isEmpty()){
            throw new CategoryException();
        }

        return $result;
    }
}