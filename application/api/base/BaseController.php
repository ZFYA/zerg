<?php

namespace app\api\base;

use app\common\ErrorCode;
use think\Controller;

class BaseController extends Controller
{
    protected static $return_data = [];

    protected static function showReturnCode($code,$msg){
        $return_data=['code'=>$code,'data'=>self::$return_data,'msg'=>$msg];
        if(empty($msg)){
            $return_data['msg']=ErrorCode::getCode($code);
        }
        return $return_data;
    }

}
