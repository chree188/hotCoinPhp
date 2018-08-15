<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/28
 * Time: 13:54
 */

namespace App\Http\Controllers\C2C;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    private  $businessList= "/c2c/businessList.html ";
    private  $orderList = "/c2c/orderList.html";
    private  $order ="/c2c/order.html";
    private  $userinfo ="/user/getUserInfo.html";
    private  $banklist ="/c2c/userBanklist.html";
    private  $savebankinfo ="/c2c/save_bankinfo.html";
    private  $orderdetail ="/c2c/orderDetail.html";
    private  $setting ="/c2c/setting.html";
    private  $default_bankinfo ="/c2c/default_bankinfo.html";
    private  $del_bankinfo ="/c2c/del_bankinfo.html";

    public function default_bankinfo(Request $request){
        $param = $request->only(['bankId']);
        $url = $this->host . $this->default_bankinfo;
        $response =  $this->httpPost($url,$param);
        return $response;

    }

    public function del_bankinfo(Request $request){
        $param = $request->only(['bankId']);
        $url = $this->host . $this->del_bankinfo;
        $response =  $this->httpPost($url,$param);
        return $response;

    }


    public function index(Request $request){

        return view("consumer/index");

    }

    public function record(Request $request){

        $param = $request->only(['page','limit','startTime','endTime','type','status']);

        $url = $this->host . $this->orderList;
        $response =  $this->httpPost($url,$param);
        $res = json_decode($response,true);
        $resnew =[];
        $resnew['code'] = $res['code'];
        $resnew['msg'] = $res['msg'];
        $resnew['list'] = $res['data']['list'];
        $resnew['total'] = $res['data']['total'];
        return json_encode($resnew);

    }

    public function business(Request $request){

        $url = $this->host . $this->businessList;
        $response =  $this->httpPost($url);
        return $response;

    }

    public function order(Request $request){
        $param = $request->only(['type','amount','businessId']);
        $url = $this->host .$this->order;
        $response = $this->httpPost($url,$param);
        return $response;

    }

    public function banklist(Request $request){
        $url = $this->host .$this->banklist;
        $response = $this->httpPost($url);
        return $response;

    }

    public function orderdetail(Request $request){
        $param = $request->only(['orderId']);
        $url = $this->host .$this->orderdetail;
        $response = $this->httpPost($url,$param);
        return $response;
    }

    public function userinfo(Request $request){
        $url = $this->host .$this->userinfo;
        $response = $this->httpPost($url);
        return $response;
    }

    public function savebankinfo(Request $request){
        $param = $request->only(['password','account','bankId','realName','address','prov','city']);
        $url = $this->host .$this->savebankinfo;
        $response = $this->httpPost($url,$param);
        return $response;
    }

    public function setting(Request $request){
        $url = $this->host .$this->setting;
        $response = $this->httpPost($url);
        return $response;
    }




}