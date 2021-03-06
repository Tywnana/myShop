<?php
namespace app\api\controller\v1;

use app\api\validate\IDMustbeInt;
use app\lib\exception\BannerMissException;
use app\api\model\Banner as BannerModel;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/12
 * Time: 21:53
 */
class Banner
{
    /**
     * 获取指定ID的banner信息
     * @$id banner的ID
     * @url /banner/:id
     * @http Get
    */
    public function getBanner($id){
        (new IDMustbeInt())->goCheck();
        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            throw new BannerMissException();
        }
        return json_encode($banner);
    }
}