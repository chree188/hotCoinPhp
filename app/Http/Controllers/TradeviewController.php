<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\RuntimeException;

class TradeviewController extends Controller
{
    private $indexUrl = '/trademarket_json.html';
    private $fullPeriodUrl = '/kline/fullperiod.html';
    private $lastperiod = '/kline/lastperiod.html';
    private $getTotalAsset = '/v1/user/balance.html';
    private $batchCnyCancel = '/trade/batch_cny_cancel.html';


    /**
     * 新市场首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $param = $request->only(['symbol','type','sb']);
        foreach ($param as $key=>$value) {
            if(empty($value)){
                unset($param[$key]);
            }
        }
        $url = $this->host . $this->indexUrl;
        if(!empty($url)){
            $url .= '?' . http_build_query($param);
        }
        $response = $this->parseResponse($this->httpGet($url));
        $data = $response['data'];
        return View('trade.indexnew',$data);
    }



    /**
     * k线图数据 第一次请求所有的数据
     * @param Request $request
     * @return string(json)
     */
    public function tradeviewData(Request $request){

        $param = $request->only(['symbol','step']);
        $url = $this->host . $this->fullPeriodUrl;

        $arrs =  json_decode($this->httpPost($url,$param));
        $arr = [];
        if(empty($arrs) || empty($arrs[0])){
            $arr["state"] = 10300;
            $arr["massage"] = "失败";
        }else{

            foreach($arrs as $key=>$value){
                $arr["data"][$key]["time"] = $value[0];
                $arr["data"][$key]["open"] = $value[1];
                $arr["data"][$key]["high"] = $value[2];
                $arr["data"][$key]["low"] = $value[3];
                $arr["data"][$key]["close"] = $value[4];
                $arr["data"][$key]["volume"] = $value[5];
            }
            $arr["state"] = 10200;
            $arr["massage"] = "成功";
        }
        return json_encode($arr);



    }
    /**
     * k线图数据 后面每次都获取产生的最新一条数据
     * @param Request $request
     * @return string(json)
     */

    public function incrementData(Request $request){
        $param = $request->only(['symbol','step']);
        $url = $this->host .$this->lastperiod;
        $arrs =  json_decode($this->httpPost($url,$param),true);
        if($arrs){
            $arr["data"]["time"] = $arrs["data"][0][0];
            $arr["data"]["open"] = $arrs["data"][0][1];
            $arr["data"]["high"] = $arrs["data"][0][2];
            $arr["data"]["low"] = $arrs["data"][0][3];
            $arr["data"]["close"] = $arrs["data"][0][4];
            $arr["data"]["volume"] = $arrs["data"][0][5];
            $arr["state"] = 10200;
            $arr["massage"] = "成功";
        }else{
            $arr["state"] = 10300;
            $arr["massage"] = "失败";
        }
        return json_encode($arr);
    }

    public function getTotalAsset(Request $request){
        $url = $this->host . $this->getTotalAsset;
        $response = $this->httpGet($url);
        return $response;
    }

    public function batchCnyCancel(Request $request){
        $param = $request->only(['tradeId','type']);
        $url = $this->host . $this->batchCnyCancel;
        $response = $this->httpGet($url,$param);
        return $response;
    }

}


