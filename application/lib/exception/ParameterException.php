<?php

namespace app\lib\exception;

use think\Exception;

class ParameterException extends BaseException{

    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;

    public function __construct($params = []){
        if(!is_array($params)){
//            return;   //如果不想报错 想使用默认值则用return
            throw new Exception('参数必须是数组');
        }

        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}