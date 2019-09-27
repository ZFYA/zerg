<?php
namespace app\api\validate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id'=>'require|isPositiveInteger',
        'num'=>'in:1,2,3'
    ];

    protected $message = [
        'id.isPositiveInteger'=>'id必须是正整数',
    ];


}