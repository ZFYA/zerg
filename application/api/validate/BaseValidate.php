<?php
namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->check($params);
        if($result){
            return true;
        }else{
//            $error = $this->getError();
//            $error = implode(',',$error);
//            $e = new ParameterException();
//            $e->msg = $error;
//            $e->errorCode = 100002;
//            throw $e;
            $e = new ParameterException(['msg'=>$this->error]);
            throw $e;
        }
    }

    protected function isPositiveInteger($value='',$rule='',$data='',$field=''){
        //$value 表示值  $rule 验证规则  $data 数组表示 ['id'=>2] $field 字段
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            return true;
        }else{
            return false;
        }

    }
}