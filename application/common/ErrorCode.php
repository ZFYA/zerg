<?php

namespace app\common;

class ErrorCode{
    static $code_array=[
        500=>'未定义消息',
    ];


    public static function getCode($code){
       return  isset(self::$code_array[$code])?self::$code_array[$code]:self::$code_array[500];
    }

}