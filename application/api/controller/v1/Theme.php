<?php

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;
use think\Controller;

class Theme extends Controller
{
    /**
     * @param string $ids='1,2,3'
     * @return
     */
    public function getSampleList($ids=''){
//        return $ids;
        (new IDCollection())->goCheck($ids);
        $result = (new \app\api\model\Theme())->with('topicImg,headImg')->select($ids);
        if($result->isEmpty()){
            throw new ThemeException();
        }

        return $result;
    }


    public function getComplexOne($id){
        (new IDMustBePositiveInt())->goCheck($id);
        $result = (new \app\api\model\Theme())->getThemeWithProducts($id);
        if(!$result){
            throw new ThemeException();
        }
        return $result;
    }
}
