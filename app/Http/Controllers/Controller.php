<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redis;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


//    public $host = '127.0.0.1:8080';
//    public $host = '192.168.0.193:8090';
//    public $host = '192.168.0.141:8090';
    public $host = '192.168.3.29:8123';
//    public $host = '161.117.5.26:8080';
//    public $host = 'https://www.hotcoin.top';


    public function __construct(){
        $this->getUserName();
        if(!session('lang')){
            session(['lang'=>'cn']);
        }
    }


    /**
     * 获取用户名称
     * @return bool
     */
    public function getUserName(){
        if(!isset($_COOKIE['token'])){
            $username = false;
            define('USERNAME',$username);
            return false;
        }
        $token = $_COOKIE['token'];
        $user = Redis::get($token);
        if(empty($user)){
            $username = false;
            define('USERNAME',$username);
            return false;
        }
        $userarr = json_decode($user,true);
        $username = $userarr['extObject']['fnickname'];
        if(isset($userarr['extObject']['frealname'])){
            $username = $userarr['extObject']['frealname'];
        }
        define('USERNAME',$username);
        return true;
    }


    /**
     *  获取cookie
     * @return string
     * @internal param Request $request
     */
    public function getCookie(){

        $cookie['token']  = isset($_COOKIE['token']) ? $_COOKIE['token'] : '';
        $cookie['CHECKCODE']  = isset($_COOKIE['CHECKCODE']) ? $_COOKIE['CHECKCODE'] : '';
        $cookie['oex_lan']  = isset($_COOKIE['oex_lan']) ? $_COOKIE['oex_lan'] : '';
        $cookie['phone_reset']  = isset($_COOKIE['phone_reset']) ? $_COOKIE['phone_reset'] : '';
        $cookie['phone_reset_Second']  = isset($_COOKIE['phone_reset_Second']) ? $_COOKIE['phone_reset_Second'] : '';
        $cookieStr = '';
        foreach ($cookie as $key=>$value){
            if(empty($value)){
                unset($cookie[$key]);
            }else{
                $cookieStr .= $key . '=' . $value .'; ';
            }

        }
        return $cookieStr;
    }

    /**
     * 获取客户端ip
     * @return mixed
     */
    public function getClietnIp(){

        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return  $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
      return $_SERVER['REMOTE_ADDR'];
    }


    /**
     * 从api获取数据
     * @param $url
     * @param array $params
     * @param $header_out
     * @return mixed
     * @internal param null $header
     * @internal param $impost
     */
    public function httpGet($url,$params=null,$header_out=false) {


        $header[] =  'X-Forwarded-For: ' . $this->getClietnIp();
        $header[] =  'cookie: ' . $this->getCookie();
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);//获取请求头信息

//        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);//用来存放登录成功的cookie
//        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); //使用cookie

        if(!empty($header_out)){
            curl_setopt($ch, CURLOPT_HEADER, true);
        }

        if ($params) {
            $params = http_build_query($params);
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = curl_getinfo($ch);
//        print_r($httpInfo);


        return $response;
    }


    /**
     * http Post
     * @param $url
     * @param array $params
     * @return mixed
     * @internal param $apiUrl
     */
    public function httpPost($url, $params=[]){

        $header[] =  'X-Forwarded-For: ' . $this->getClietnIp();
        $header[] =  'cookie: ' . $this->getCookie();

        $ch = curl_init();
        $httpInfo = array();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);//用来存放登录成功的cookie
//        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); //使用cookie

        $params = http_build_query($params);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);//获取请求头信息
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
//        print_r($httpInfo);

//        if($httpCode !='200'){
//            print_r($httpInfo);
//        }
        curl_close($ch);
        return $response;
    }


    /**
     * api请求失败处理
     * @param $response
     * @return string
     */
    public function parseApi($response){
        if($response == false){
            return json_encode(array('code'=>'301','msg'=>'server erros!'));
        }
       return $response;
    }


    /**
     * 解析页面初始化返回的数据  方便错误集中处理
     * @param $response
     * @return mixed
     * @internal param $json
     */
    public function parseResponse($response){
        if($response == false){
            echo "<script>window.location='/error'</script>";
            exit;
//            dd('服务升级中.....');
        }
        $response = json_decode($response,true);
//        dd($response);
        if($response['code'] != 200){
            if($response['code'] == 401){
                //强制重定向
                echo "<script>window.location='/user/login.html'</script>";
                exit;
            }
            dd($response['msg']);
        }

        return $response;
    }
}
