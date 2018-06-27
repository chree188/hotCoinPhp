<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\RuntimeException;

class TradeController extends Controller
{

    private $indexUrl = '/trademarket_json.html';

    private $marketUrl = '/real/market.html';

    private $fullDepthUrl = '/kline/fulldepth.html';

    private $fullPeriodUrl = '/kline/fullperiod.html';

    private $cnyBuyUrl = '/trade/cny_buy.html';

    private $cnySellUrl = '/trade/cny_sell.html';

    private $cnyCancelUrl = '/trade/cny_cancel.html';

    private $assetUrl = '/real/userassets.html';

    private $entructsUrl = '/real/getEntruts.html';

    private $entrustMoreUrl = '/trade/cny_entrust_json.html';

    private $rateUrl = '/market/rate.html';

    private $entrustLogUrl = '/trade/cny_entrustLog.html';

    /**
     * 市场首页
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
        return View('trade.index',$data);
    }

    public function indexnew(Request $request) {
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
     * 委托单更多页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order(Request $request){
        $data = $request->only(['sb','type','symbol','plat']);
        $data['symbols'] = explode('_',$data['sb']);
        return View('trade.order',$data);
    }


    /**
     * 实时交易
     * @param Request $request
     * @return string
     */
    public function market(Request $request){
        $param = $request->only(['symbol','buysellcount','successcount']);

        $url = $this->host . $this->marketUrl;

        return $this->parseApi($this->httpGet($url,$param));
    }


    /**
     * 深度图数据
     * @param Request $request
     * @return string
     */
    public function fulldepth(Request $request){
        $param = $request->only(['symbol']);

        $url = $this->host . $this->fullDepthUrl;

        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * k线图数据
     * @param Request $request
     * @return string
     */
    public function fullperiod(Request $request){
        $param = $request->only(['symbol','step']);
        $url = $this->host . $this->fullPeriodUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }

    public function traderview(Request $request){
        $param = $request->only(['symbol','step']);
        $param["symbol"] = "8";
        $param["step"]  ="900";
        $url = $this->host . $this->fullPeriodUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }

    public function traderview1(Request $request){

        $param = $request->only(['symbol','step']);
        $url = $this->host . $this->fullPeriodUrl;
        $arrs =  json_decode($this->httpPost($url,$param));
        $arr = [];
        foreach($arrs as $key=>$value){
            $arr["data"][$key]["time"] = $value[0];
            $arr["data"][$key]["open"] = $value[1]+rand(-10000,10000);
            $arr["data"][$key]["high"] = $value[2]+rand(-10000,10000);
            $arr["data"][$key]["low"] = $value[3]+rand(-10000,10000);
            $arr["data"][$key]["close"] = $value[4]+rand(-10000,10000);
            $arr["data"][$key]["volume"] = $value[5]+rand(1,5);
//            var_dump($value);die;
        }

        //       $arr = [];
//        $time = 1529280000000;
//        for($i=0;$i<300;$i++){
//            $arr["data"][$i]["time"] = $time;
//            $arr["data"][$i]["high"] = 54598.50000000+rand(10000,20000);
//            $arr["data"][$i]["low"] = 54598.50000000+rand(10000,20000);
//            $arr["data"][$i]["open"] = 54598.50000000+rand(10000,20000);
//            $arr["data"][$i]["close"] = 54598.50000000+rand(10000,20000);
////            $arr["data"][$i]["volume"] = rand(0.0001,0.0009);
////            $arr["data"][$i]["volume"] = rand(0.0001,0.0009);
//            $arr["data"][$i]["volume"] = rand(1,999);
//            $time=$time+900000;
//        }

        $arr["state"] = 10200;
        $arr["massage"] = "成功";
//        $arr["data"] = [
//            ["close"=>"1.70165000",'hight'=>"1.70165000",'low'=>"1.70165000","open"=>"1.70165000","time"=>time()*1000,"volume"=>"0.00000000"],
//        ];
        return json_encode($arr);
    }


    public function detaildata(Request $request){
        $param = $request->only(['symbol','step']);
        $url = $this->host . "/kline/lastperiod.html";
        $arrs =  json_decode($this->httpPost($url,$param),true);
//        $time = 1529280000000+301*900000;
//            $arr["data"]["time"] = $time;
//            $arr["data"]["high"] = 54598.50000000+rand(10000,20000);
//            $arr["data"]["low"] = 54598.50000000+rand(10000,20000);
//            $arr["data"]["open"] = 54598.50000000+rand(10000,20000);
//            $arr["data"]["close"] = 54598.50000000+rand(10000,20000);
//            $arr["data"]["volume"] = rand(1,999);
        if($arrs){
            $arr["data"]["time"] = $arrs["data"][0][0];
            $arr["data"]["open"] = $arrs["data"][0][1]+rand(-10000,10000);
            $arr["data"]["high"] = $arrs["data"][0][2]+rand(-10000,10000);
            $arr["data"]["low"] = $arrs["data"][0][3]+rand(-10000,10000);
            $arr["data"]["close"] = $arrs["data"][0][4]+rand(-10000,10000);
            $arr["data"]["volume"] = $arrs["data"][0][5]+rand(1,5);
            $arr["state"] = 10200;
            $arr["massage"] = "成功";
        }else{
            $arr["state"] = 10300;
            $arr["massage"] = "失败";
        }

//        $arr["data"] = [
//            ["close"=>"1.70165000",'hight'=>"1.70165000",'low'=>"1.70165000","open"=>"1.70165000","time"=>time()*1000,"volume"=>"0.00000000"],
//        ];
        return json_encode($arr);
    }


    /**
     * 买币
     * @param Request $request
     * @return string
     */
    public function cnyBuy(Request $request){

        $param = $request->only(['tradeAmount','tradePrice','tradePwd','symbol','limited']);

        $url = $this->host . $this->cnyBuyUrl;

        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 卖币
     * @param Request $request
     * @return string
     */
    public function cnySell(Request $request){

        $param = $request->only(['tradeAmount','tradePrice','tradePwd','symbol','limited']);

        $url = $this->host . $this->cnySellUrl;

        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 撤单
     * @param Request $request
     * @return string
     */
    public function cnyCancel(Request $request){

        $param = $request->only(['id']);

        $url = $this->host . $this->cnyCancelUrl;

        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 获取个人资产
     * @param Request $request
     * @return string
     */
    public function asset(Request $request){

        $param = $request->only(['tradeid']);

        $url = $this->host . $this->assetUrl;

        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 获取委托记录
     * @param Request $request
     * @return string
     */
    public function getEntruts(Request $request){

        $param = $request->only(['symbol','count']);

        $url = $this->host . $this->entructsUrl;

        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 更多委托单
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function entrust(Request $request){
        $param = $request->only(['symbol','status','currentPage']);
        foreach ($param  as $key =>$item){
            if(empty($param)){
                unset($param[$key]);
            }
        }

        $url = $this->host . $this->entrustMoreUrl;
        $url = $url . '?' . http_build_query($param);

        $response = $this->parseResponse($this->httpGet($url));
        $data['fentrusts'] = isset($data['fentrusts']) ? $data['fentrusts']:[];
        $data = $response['data'];
        return View('trade.entrust',$data);

    }


    /**
     * 获取历史委托单详情
     * @param Request $request
     * @return string
     */
    public function entrustLog(Request $request) {
        $param = $request->only(['id']);

        $url = $this->host . $this->entrustLogUrl;

        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     *
     * 获取人民币汇率
     * @return string
     */
    public function rate(){
        $url = $this->host . $this->rateUrl;
        return $this->parseApi($this->httpPost($url,[]));
    }

}


