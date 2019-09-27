<?php
namespace app\api\model;

use think\Model;

class Category extends Model
{
    protected $hidden = ['delete_time','update_time','description'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }


}