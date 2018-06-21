<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    private $indexUrl = '/notice/index_json.html';

    private $detailUrl = '/notice/detail_json.html';


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $params = $request->only(['currentPage','id']);
        foreach ($params as $key=>$value ) {
             if(empty($value)) {
                 $params['$key'];
             }
        }

        $url = $this->host . $this->indexUrl;
        if(!empty($params)){
            $url .= '?' . http_build_query($params);
        }

        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('notice.index',$data);
    }


    /**
     * 新闻详情页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request) {
        $params = $request->only(['id','name']);

        $url = $this->host . $this->detailUrl;
        if(!empty($params)){
            $url .= '?' . http_build_query($params);
        }

        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];

        return view('notice.detail',$data);
    }

}
