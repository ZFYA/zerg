<?php

namespace  app\api\model;

use think\Model;

class Banner extends Model
{

    protected $hidden=['update_time','delete_time'];

    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerById($id){
//        $result = Db::table('banner_item')->where(function($query) use($id){
//            $query->where('banner_id','=',$id);
//        })->find();
        $result = Banner::with(['items','items.image'])->where('id',$id)->find();  //with 后面参数可以是数组 可以同时关联多一个表  ,如果是items关联的话使用items.来连接
        return $result;

    }
}
