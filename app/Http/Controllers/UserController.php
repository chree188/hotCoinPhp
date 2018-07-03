<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    private $loginUrl = '/login.html'; //登录接口地址

    private $vailImg = '/servlet/ValidateImageServlet.html'; //验证图片地址

    private $checkUserUrl = '/user/check_user_exist.html'; //检查用户是否存在接口地址

    private $sendSMSUrl = '/user/send_sms.html'; //发送短信接口

    private $sendEmailUrl = '/user/send_reg_email.html'; //发送注册短信

    private $bindPhoneCodeUrl = '/validate/send_bindphone_sms.html'; //发送绑定手机短信

    private $registerUrl = '/register.html'; //注册接口
    
    private $findBackUrl = '/validate/send_findbackmail.html';

    private $logout= '/user/logout.html';  //退出

    private $resetEmailUrl = '/validate/reset_email_json.html';

    private $resrtPasswordUrl = '/validate/reset_password.html';

    private $phoneRegUrl = '/user/phonereg_json.html';

    private $findPhoneUrl = '/validate/sendFindPhoneCode.html';

    private $checkPhoneUrl = '/validate/reset_password_check.html';

    private $resetByPhoneUrl = '/validate/reset_password_phone.html';

    private $resetPhoneJson = '/validate/reset_phone_json.html';

    private $vailMailUrl = '/validate/mail_validate_json.html';//邮箱验证





    public  function __construct() {
        parent::__construct();
    }

    /**
     *
     * 登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request) {

        return response(view('login'));
    }

    /**
     * 退出
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request){
        $request->session()->flush();
        $url = $this->host . $this->logout;
        $this->httpGet($url,[]);
        return redirect()->route('main');
    }


    /**
     * 邮箱注册页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(Request $request){
        $introId = $request->input('intro');
        return view('register',array('intro'=>$introId));
    }

    /**
     * 手机号注册页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function phonereg(Request $request){

        $url = $this->host . $this->phoneRegUrl;

        $introId = $request->input('intro');

        $response = $this->parseResponse($this->httpGet($url));
        $data = $response['data'];
        $data['intro'] = $introId;
        return view('phonereg',$data);
    }

    /**
     * 用户登录操作
     * @param Request $request
     * @return Request
     */
    public function userLogin(Request $request){

        $param = $request->except('_t');
        $response = $this->httpPost($this->host . $this->loginUrl,$param);
        if($response == false) {
            return json_encode(array('code'=>'300','msg'=>'server error'));
        }else{
            if(json_decode($response)->code==200){

//                $user = Redis::get(json_decode($response)->data);
//
//                session(['user_name' => $userarr['extObject']['fnickname']]);
//                if(isset($userarr['extObject']['frealname'])){
//                    session(['user_name'=> $userarr['extObject']['frealname']]);
//                }

//                setcookie('token',json_decode($response)->data);
            }
        }
        setcookie('token',json_decode($response)->data,time()+7200,'/',null,null,true);
        return $response;
    }


    /**
     * 获取用户注册图片验证码
     * @return mixed
     */
    public function getVailImg(){

        $url = $this->host . $this->vailImg . '?' . time();
        $content =  $this->httpGet($url,null,true);
        preg_match('/Set-Cookie:(.*);/iU',$content,$str);

        $cookie = substr($str[1],strpos($str[1],'CHECKCODE=')+10);


        $img = substr($content,strpos($content,"\r\n\r\n")+4);
        setcookie('CHECKCODE',$cookie);
        return response($img, 200, [
            'Content-Type' => 'image/jpeg;charset=UTF-8',
        ]);
    }


    /**
     * 检查用户是否注册
     * @param Request $request
     * @return mixed|string
     */
    public function checkUser(Request $request){
        $param['regUserName'] = $request->input('regUserName');
        $param['regType'] = $request->input('regType');

        $url = $this->host . $this->checkUserUrl;
        $response = $this->httpGet($url);

        return $this->parseApi($response);
    }


    /**
     * 发送手机验证码
     * @param Request $request
     * @return mixed
     */
    public function sendSms(Request $request){
        $param['type'] = $request->input('type');
        $param['msgtype'] = $request->input('msgtype');
        $param['area'] = $request->input('area');
        $param['phone'] = $request->input('phone');

        $url = $this->host . $this->sendSMSUrl;

        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


    /**
     * 发送邮箱验证码
     * @param Request $request
     * @return mixed
     */
    public function emailCode(Request $request) {
        $param['type'] = $request->input('type');
        $param['msgtype'] = $request->input('msgtype');
        $param['address'] = $request->input('address');

        $url = $this->host . $this->sendEmailUrl;
        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


    /**
     * 用户注册接口
     * @param Request $request
     * @return mixed
     */
    public function reg(Request $request){
        $param['regName'] = $request->input('regName');
        $param['password'] = $request->input('password');
        $param['regType'] = $request->input('regType');
        $param['vcode'] = $request->input('vcode');
        $param['ecode'] = $request->input('ecode');
        $param['pcode'] = $request->input('pcode');
        $param['intro_user'] = $request->input('intro_user');
        $param['areaCode'] = $request->input('areaCode');

        $url = $this->host . $this->registerUrl;

        $response = $this->httpPost($url,$param);
        if($response == false) {
            return json_encode(array('code'=>'300','msg'=>'server error'));
        }else{
//            if(json_decode($response)->code==200){
//                $user = Redis::get(json_decode($response)->data);
//                session(['user_name' => json_decode($user)->extObject->fnickname]);
//                session(['user_token' => json_decode($response)->data]);
//                $user = Redis::get(json_decode($response)->data);
//                $userarr = json_decode($user,true);
//                session(['user_name' => $userarr['extObject']['fnickname']]);
//                session(['user_token' => json_decode($response)->data]);
//            }
        }
        return $this->parseApi($response);
    }


    /**
     * @param Request $request
     * @return string
     */
    public function bindPhoneSMS(Request $request) {
        $param = $request->only(['area','phone']);

        $url = $this->host . $this->bindPhoneCodeUrl;

        $response = $this->httpPost($url,$param);
        return $this->parseApi($response);
    }


    /**
     * @param Request $request
     * @return string
     */
    public function findPhoneSMS(Request $request) {
        $param = $request->only(['area','phone','imgcode']);

        $url = $this->host . $this->findPhoneUrl;


        $response = $this->httpPost($url,$param);

        return $this->parseApi($response);
    }


    /**
     * 重置邮件密码页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetEmail(Request $request){
        $param = $request->only(['uid','uuid']);
        if(empty($param['uid']) || empty($param['uuid']) ){
            return View('validate.reset_email');
        }
        $url = $this->host . $this->resetEmailUrl;
        $url .= '?' . http_build_query($param);
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        if(empty($data)){
            return View('validate.reset_email');
        }

        return View('validate.reset_psd',$data);
    }


    /**
     * 邮箱提交
     * @param Request $request
     * @return string
     */
    public function findBack(Request $request){
        $params =  $request->only(['email','idcard','idcardno','imgcode']);

        $url = $this->host . $this->findBackUrl;

        return $this->parseApi($this->httpPost($url,$params));
    }


    /**
     * 重置密码
     * @param Request $request
     * @return string
     */
    public function resetPassword(Request $request){
        $params =  $request->only(['totpCode','newPassword','newPassword2','fid']);

        $url = $this->host . $this->resrtPasswordUrl;

        return $this->parseApi($this->httpPost($url,$params));
    }


    /**
     * 手机验证
     * @param Request $request
     * @return string
     */
    public function phoneCheck(Request $request){
        $params =  $request->only(['area','phone','code','idcardno']);

        $url = $this->host . $this->checkPhoneUrl;

        $response = $this->parseApi($this->httpPost($url,$params));

        $data = json_decode($response,true);
        if($data['data'] !=null) {
            setcookie('phone_reset',$data['data']['phone_reset'],time()+7000,'/',null,null,true);
        }
        return $response;
    }


    /**
     * 通过手机重新设置密码
     * @param Request $request
     * @return string
     */
    public function resetPasswordByPhone(Request $request){
        $params =  $request->only(['totpCode','newPassword','newPassword2']);

        $url = $this->host . $this->resetByPhoneUrl;
        return $this->parseApi($this->httpPost($url,$params));
    }

    public function resetPhone(){
        $url = $this->host . $this->resetPhoneJson;


        $reponse = $this->httpGet($url);

        $data = json_decode($reponse,true);

        if(isset($data['data']['phone_reset_Second'])) {
            setcookie('phone_reset_Second',$data['data']['phone_reset_Second'],time()+7000,'/',null,null,true);
        }

        return View('validate/reset_phone');
    }


    /**
     * 邀请注册
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function intro(Request $request){
        $introId = $request->input('intro');

        $url = $this->host . $this->phoneRegUrl;

        $response = $this->parseResponse($this->httpGet($url));
        $data = $response['data'];
        $data['intro'] = $introId;
        return View('phonereg',$data);
    }


    /**
     * 邮箱验证接口
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vailMail(Request $request){

        $params = $request->only(['uid','uuid']);

        $url = $this->host . $this->vailMailUrl;
        $url .= '?' .http_build_query($params);

        $response = $this->parseResponse($this->httpGet($url));
        $data = $response['data'];

        return View('validate/vailMail',$data);
    }


}
