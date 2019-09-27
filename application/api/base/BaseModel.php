<?php
namespace app\api\base;

use think\Model;

class BaseModel extends Model
{
        protected function imgprefix($value,$data){
            $finalUrl = $value;
            if($data['from']==1){
                $finalUrl = config('setting.img_prefix').$finalUrl;
            }

            return $finalUrl;
        }
}