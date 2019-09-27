<?php
namespace app\api\validate;

class IDCollection extends BaseValidate
{
    protected $rule = [
      'ids'=>'require|checkIDs',
    ];

    protected $message =[
        'ids.checkIDs'=>'ids参数必须是以逗号分割的正整数'
    ];

    protected function checkIDs($values){
        $values = explode(',',$values);
        if(empty($values)){
            return false;
        }

        foreach ($values as $value){
            if(!$this->isPositiveInteger($value)){
                return false;
            }
        }

        return true;

    }
}