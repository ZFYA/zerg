<?php
namespace app\api\model;

use app\api\base\BaseModel;
use think\Model;

class Image extends BaseModel {

    protected $hidden=['id','from','delete_time','update_time'];


    //设置读取器 方法名为get+字段名（第一个字母大写）+Attr   里面的参数是框架自动调用读取器传递的字段的值（Url的值）  会读取四次（有多少条数据读多少次）   第二个参数(#data)是其他字段的值 是一个数组
    public function getUrlAttr($value,$data){
        return $this->imgprefix($value,$data);
    }
}