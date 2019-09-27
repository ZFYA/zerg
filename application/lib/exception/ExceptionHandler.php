<?php

namespace app\lib\exception;

use think\exception\Handle;
use think\Log;
use think\Request;
//ctrl +alt +o移除未使用过得类


class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    public function render(\Exception $e)
    {

        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;

        }else{
            if(config('app_debug')){
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = '服务器内部错误';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }

        }

        $request = Request::instance();
        $result = [
            'msg'=>$this->msg,
            'error_code'=>$this->errorCode,
            'request_url'=>$request->url()
        ];

        return json($result,$this->code);
    }

    private function recordErrorLog(\Exception $e){
        //当把配置信息从file改成test时需要对日志进行初始化才能使用
        Log::init([
            'type'=>'File',
            'path'=> LOG_PATH,  //日志路径
            'level' => ['error']  //只有当高于error级别的才会被纪录日志
        ]);

        //第一个参数是 错误信息  第二个参数是错误级别手册中有
        Log::record($e->getMessage(),'error');
    }
}