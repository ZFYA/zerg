<?php
namespace app\api\model;

use app\api\base\BaseModel;

class Product extends BaseModel
{
    protected $hidden=[
        'delete_time','category_id','create_time','update_time','pivot'
    ];

    public function getMainImgUrlAttr($value,$data){
        return $this->imgprefix($value,$data);
    }

    public static function getMostRecent($count){
        $result = self::limit($count)->order('create_time','desc')->select();
        return $result;
    }


    public function getProductsByCategoryID($id){
        return self::where('category_id',$id)->select();
    }
}
