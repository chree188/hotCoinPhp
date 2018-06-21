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


