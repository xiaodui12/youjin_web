<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: huajie <banhuajie@163.com>
// +----------------------------------------------------------------------

namespace Common\Model;
use Think\Model;
use Think\Upload;

/**
 * 店铺
 */

class StoreModel extends Model{

    protected  $table="store";


    /**
     * 根据域名得到店铺信息
    */
    public function get_store_info($domain="")
    {
        //判断域名
        if(empty($domain)){
            return array("status"=>0,"msg"=>"域名不得为空");
        }
        //得到店铺信息
        $store_info=$this->where(array("domain"=>$domain))->find();

        //网站状态
        if(empty($store_info)||$store_info["status"]!=1)
        {
            return array("status"=>0,"msg"=>"网站已经禁用或不存在！");
        }

        //网站是否过期
        if($store_info["over_time"]<time()){
            return array("status"=>0,"msg"=>"网站已过期！");
        }

        return array("status"=>1,"info"=>$store_info);


    }

}
