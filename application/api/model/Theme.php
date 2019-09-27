<?php
namespace app\api\model;

use app\api\base\BaseModel;

class Theme extends BaseModel
{
    //主题与主题图是1对1的关系
    protected $hidden=['delete_time','update_time','head_img_id','topic_img_id'];
    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }

    //主题与头图是1对1的关系
    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }

    // 主题与产品是多对多的关系
    public function products(){
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

    public function getThemeWithProducts($id){
        $Theme = $this->with('products,topicImg,headImg')->find($id);
        return $Theme;
    }
}