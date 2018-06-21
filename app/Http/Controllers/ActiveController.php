<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveController extends Controller
{
    private $activityJson = '/activity/index_json.html';

    private $exchangeUrl = '/activity/exchange.html';

    private $detailUrl = '';


    public function index(Request $request) {
        $currentPage = $request->input('currentPage');

        $url = $this->host . $this->activityJson;

        if(!empty($currentPage)){
            $url .= '?currentPage=' . $currentPage;
        }

        $response = $this->parseResponse($this->httpGet($url));
        $data = $response['data'];
        return view('active.index',['data'=>$data]);
    }


    /**
     * @param Request $request
     * @return string
     */
    public function exchange(Request $request) {
        $param = $request->only(['code']);

        $url = $this->host . $this->exchangeUrl;
        $response = $this->httpPost($url,$param);

        return $this->parseApi($response);

    }
}
