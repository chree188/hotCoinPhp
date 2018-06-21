<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    private $aboutUrl = '/about/about_json.html';

    private $questionUrl = '/online_help/index_json.html';

    private $questionListUrl = '/online_help/help_list_json.html';

    private $saveQuestionUrl = '/online_help/help_submit.html';

    private $delQuestionUrl = '/online_help/help_delete.html';



    /**
     * 帮助首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(Request $request) {

        $param = $request->only(['id']);
        $url = $this->host . $this->aboutUrl;
        $url .= '?'.http_build_query($param);
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('about.about',$data);
    }


    /**
     * 在线问答页面
     */
    public function question() {
        $url = $this->host .$this->questionUrl;
        $response = $this->parseResponse($this->httpGet($url));
        $data = $response['data'];
        return View('about.online',$data);
    }


    /**
     * 在线问答页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function questionList(Request $request) {
        $param = $request->only('currentPage');

        $url = $this->host .$this->questionListUrl;
        if(!empty($param)){
            $url .= http_build_query($param);
        }

        $response = $this->parseResponse($this->httpGet($url));
        $data = $response['data'];
        return View('about.onlineList',$data);
    }


    /**
     * 提交反馈问题
     * @param Request $request
     * @return string
     */
    public function saveQuestion(Request $request){
        $param = $request->only(['questiontype','questiondesc']);
        $url = $this->host . $this->saveQuestionUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 删除问题
     * @param Request $request
     * @return string
     */
    public function delQuestion(Request $request){
        $param = $request->only(['fid']);
        $url = $this->host . $this->delQuestionUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }
}
