<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 10:32
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;



class BroadcastController extends Controller
{

    private $detailUrl = '/notice/detail_json.html';

    // 图片轮播详情页
    public function index(Request $request){
        $params = $request->only(['id']);
        if(!$params['id']){
            $params["id"]=1;
        }
        $url = $this->host . $this->detailUrl;
        if(!empty($params)){
            $url .= '?' . http_build_query($params);
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data["detail"] = $response["data"];
        $banner = array();
        for($i = 1;$i<=5;$i++){
            $item =  Redis::get('ARGS_bigImage'.$i);
            $banner[$i]["banner"] = json_decode($item)->extObject;
            $itemUrl =  Redis::get('ARGS_bigImage'.$i.'url');
            $banner[$i]["bannerUrl"] = json_decode($itemUrl)->extObject;
            $itemTitle =  Redis::get('ARGS_bigImage'.$i.'title');
            $banner[$i]["bannerTitle"] = json_decode($itemTitle)->extObject;
        }
        $data['banner'] = $banner;
        return view('broadcast.index',$data);
    }


}