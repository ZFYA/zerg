<?php
namespace app\lib\exception;

class ThemeException extends BaseException{

    public $code = 404;
    public $msg = '请求的Theme不存在';
    public $errorCode = 30000;
}