<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{

    private $securityJsonUrl = '/user/security_json.html';

    private $loginLogUrl = '/user/user_loginlog_json.html';

    private $settingLogUrl = '/user/user_settinglog_json.html';

    private $googleQRUrl = '/user/bind_google_device.html';

    private $bindGoogle = '/user/google_auth.html';

    private $sendEmailUrl = '/validate/send_bindmail.html';

    private $bindPhoneUrl = '/validate/bindphone.html';

    private $modiPasswordUrl = '/user/modify_passwd.html';

    private $saveRealUrl = '/real_name_auth.html';


    /**
     * 安全中心首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $url = $this->host . $this->securityJsonUrl;
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('user.security',array('data'=>$data));
    }


    /**
     * 登录日志页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginLog(Request $request) {
        $currentPage = $request->input('currentPage');
        $url = $this->host . $this->loginLogUrl;
        if(!empty($currentPage)){
            $url .= '?currentPage=' . $currentPage;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data']['flogs'];
        return view('user.loginlog',['data'=>$data]);

    }


    /**
     * 设置日志页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settingLog(Request $request) {
        $currentPage = $request->input('currentPage');
        $url = $this->host . $this->settingLogUrl;
        if(!empty($currentPage)){
            $url .= '?currentPage=' . $currentPage;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data']['flogs'];
        return view('user.settinglog',['data'=>$data]);

    }

    /**
     * 获取谷歌验证器密码
     * @param Request $request
     * @return mixed
     */
    public function getGoogleQR(Request $request){
        $url = $this->host .$this->googleQRUrl;
        $response = $this->httpPost($url);
        return $this->parseApi($response);
    }


    /**
     * 绑定谷歌验证器
     * @param Request $request
     * @return string
     */
    public function bindGoogleCode(Request $request){
        $param['code'] = $request->input('code');
        $param['totpKey'] = $request->input('totpKey');

        $url = $this->host . $this->bindGoogle;
        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


    /**
     * 查看谷歌验证器
     * @param Request $request
     * @return string
     */
    public function getGoogleCode(Request $request){
        $param['totpCode'] = $request->input('totpCode');

        $url = $this->host . $this->googleQRUrl;
        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


    /**
     * 发送绑定邮件
     * @param Request $request
     * @return string
     */
    public function sendEmailCode(Request $request){
        $param['email'] = $request->input('email');

        $url = $this->host . $this->sendEmailUrl;

        $response = $this->httpPost($url,$param);

        return $this->parseApi($response);
    }


    /**
     * 绑定手机
     * @param Request $request
     * @return string
     */
    public function bindPhone(Request $request) {
        $param = $request->only(['phone','area','code']);

        $url= $this->host . $this->bindPhoneUrl;

        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


    /**
     * 修改|设置  登录|交易 密码接口
     * @param Request $request
     * @return string
     */
    public function modifyPassword(Request $request) {
        $requestFiled = array('pwdType','originPwd','newPwd','reNewPwd','totpCode','identityCode');
        $param = $request->only($requestFiled);
        $url = $this->host . $this->modiPasswordUrl;
        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


    /**
     * 设置真实资料
     * @param Request $request
     * @return string
     */
    public function saveRealName(Request $request) {

        $param = $request->only(['realname','identitytype','identityno','address']);
        $url = $this->host . $this->saveRealUrl;

        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


}
