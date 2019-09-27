<?php
namespace app\api\controller\v1;
use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BaseMissException;
use think\Exception;

class Banner
{

    /**
     * @param $id banner所属位置的id号 对不同的banner作区分（banner表）
     * http请求方式 get
     */
    public function getBanner($id){
        (new IDMustBePositiveInt())->goCheck();

        $banner = (new BannerModel())->getBannerById($id);
//        $banner = BannerModel::where('id',$id)->select();
//        $banner = BannerModel::get($id);
        if(!$banner){
            throw new BaseMissException();
        }
        return $banner;
    }


}