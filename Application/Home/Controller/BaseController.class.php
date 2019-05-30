<?php
namespace Home\Controller;
use Common\Model\StoreModel;
use Think\Controller;
class BaseController extends Controller {

    public function _initialize()
    {
        $store_info=$this->get_store();

    }

    /**
     * 得到店铺状态信息
    */
    public function get_store(){
        $sever_name=$_SERVER["SERVER_NAME"];

        $store= new StoreModel();
        $store_result=$store->get_store_info($sever_name);
        if($store_result["status"]!=1){
            $this->error($store_result["msg"]);
            exit;
        }
        $store_info=$store_result["info"];
        session("sid",$store_info["id"]);
        session("store_info",$store_info);

    }
}