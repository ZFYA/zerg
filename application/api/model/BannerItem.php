<?php
namespace app\api\model;

use think\Model;

class BannerItem extends Model{

    protected $hidden=['id','img_id','banner_id','update_time','delete_time'];

    //如果在查询的表中存在外键的话 则使用belongsTo 如果没有外键则使用hasOne
    public function image(){
        return $this->hasOne('Image','id','img_id');
    }
}