<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AppController extends Controller
{

    private $aboutUrl = '/about/about_json.html';

    public  function __construct() {
        parent::__construct();
    }


    public function fee(){
        $param = array('id'=>3);

        $url = $this->host . $this->aboutUrl;
        $url .= '?'.http_build_query($param);
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('app.help',$data);
    }


    /**
     * @return mixed
     */
    public function coin(){
        $param = array('id'=>1);

        $url = $this->host . $this->aboutUrl;
        $url .= '?'.http_build_query($param);
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('app.help',$data);
    }


    /**
     * @return mixed
     */
    public function help(){
        $param = array('id'=>52);

        $url = $this->host . $this->aboutUrl;
        $url .= '?'.http_build_query($param);
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('app.help',$data);
    }

}
