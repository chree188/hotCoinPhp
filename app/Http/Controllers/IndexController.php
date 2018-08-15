<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Illuminate\Support\Facades\Crypt;

class IndexController extends Controller
{

    private $indexJson = '/index_json.html';

    private $indexMarketUrl = '/real/indexmarket.html';

    private $realPriceUrl = '/real/markets.html';

    private $klineUrl = '/kline/fullperiod.html';

    private $newsUrl = '/articles_json.html';

    private $switchlan='/real/switchlan.html';

    private $noticeUrl = '/notice/index_json.html';

    private $userWalletUrl = '/real/userWallet_json.html';

    public function index(){

        return view('index');

    }

    /**
     * 语言切换
     * @param $lang
     * @return bool
     * @internal param Request $request
     */
    public function change_lang( $lang){
        if($lang == 'en'){
            setcookie('oex_lan','en_US',time()+3600*24*30,'/',null,null,true);
            return 1;
        }else{
            setcookie('oex_lan','zh_TW',time()+3600*24*30,'/',null,null,true);
            return 1;
        }

    }


    /**
     * 获取钱包
     * @param Request $request
     * @return string
     */
    public function getWallet(Request $request){
        $url = $this->host . $this->userWalletUrl;
        $response = $this->httpPost($url,[]);
        return $this->parseApi($response);

    }

    public function main(Request $request){
        $param = $request->only(['currentPage']);
        $url = $this->host . $this->indexJson;
        if(!empty($param)){
            $param = http_build_query($param);
            $url .= '?' . $param;
        }

        //获取公告
        $notice = array();
        $noticeUrl = $this->host . $this->noticeUrl;
        $noticeUrl .= '?' . http_build_query(array('id'=>2,'currentPage'=>1));
        $response = $this->httpGet($noticeUrl);

        if($response !=false){
            $response = json_decode($response,true);
            if($response && $response['code']=='200'){
                $notice = $response['data']['farticles'];
            }
        }

        //读取banner
        $banner = array();
        for($i = 1;$i<=5;$i++){
            $item =  Redis::get('ARGS_bigImage'.$i);
            $banner[$i]["banner"] = json_decode($item)->extObject;
            $itemUrl =  Redis::get('ARGS_bigImage'.$i.'url');
            $banner[$i]["bannerUrl"] = json_decode($itemUrl)->extObject;
        }


        $qrcode["AndroidDownloadUrl"] = json_decode(redis::get("ARGS_AndroidDownloadUrl"))->extObject;
        $qrcode["IosDownloadUrl"] = json_decode(redis::get("ARGS_IosDownloadUrl"))->extObject;
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        $data['notice'] = $notice;
        $data['banner'] = $banner;
        $data['qrcode'] = $qrcode;

        return view('main',$data);
    }


    /**
     * 首页
     * @return string
     */
    public function indexMarket(){
        $url = $this->host . $this->indexMarketUrl;
        return $this->parseApi($this->httpPost($url,[]));

    }


    /**
     * 获取实时价格
     * @param Request $request
     * @return IndexController|string
     */
    public function realPrice(Request $request){
        $param = $request->only(['symbol']);
        $url = $this->host . $this->realPriceUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }

    /**
     * @param Request $request
     * @return string
     */
    public function kline(Request $request) {
        $param = $request->only(['symbol','step']);
        $url = $this->host . $this->klineUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }

    public function error(Request $request){
        return view("error");
    }


}
