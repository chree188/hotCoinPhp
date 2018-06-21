<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{

    private $depositUrl = '/deposit/coin_deposit_json.html';

    private $withdrawUrl = '/withdraw/coin_withdraw_json.html';

    private $cnywithdrawUrl = '/withdraw/cny_withdraw_json.html';

    private $assetUrl = '/financial/index_json.html';

    private $recordUrl = '/financial/record_json.html';

    private $accountcoinUrl = '/financial/accountcoin_json.html';

    private $financesUrl = '/financial/finances_json.html';

    private $commissionUrl = '/financial/commission_json.html';

    private $saveWithdrawUrl = '/user/save_withdraw_address.html';

    private $withdraw = '/withdraw/coin_manual.html';

    private $delWithdrwaAddr = '/user/del_withdraw_address.html';

    private $clacCountUrl = '/get_finances.html';

    private $submitUrl = '/submit_finances.html';

    private $saveBankInfoUrl = '/user/save_bankinfo.html';

    private $cnyWithdrawsUrl = '/withdraw/cny_manual.html';

    private $smsBankUrl = '/user/send_bank_sms.html';





    /**
     * 充值
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coinDeposit(Request $request){
        $symbol = $request->input('symbol');
        $url = $this->host . $this->depositUrl;
        if(!empty($symbol)){
            $url .= '?symbol=' .$symbol;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
//        dd($data);
        return view('finance.coinDeposit',$data);

    }


    /**
     * 充值
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cnyDeposit(Request $request){
        $symbol = $request->input('symbol');
        $url = $this->host . $this->depositUrl;
        if(!empty($symbol)){
            $url .= '?symbol=' .$symbol;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
//        $data['coinList'] = array_merge($data['cnyList'],$data['coinList']);
        return view('finance.cnyDeposit',$data);

    }


    /**
     * 提现
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coinWithdraw(Request $request){
        $symbol = $request->input('symbol');
        $url = $this->host . $this->withdrawUrl;
        if(!empty($symbol)){
            $url .= '?symbol=' .$symbol;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
    
        return view('finance.coinWithdraw',$data);

    }


    /**
     * 提现
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cnyWithdraw(Request $request){
        $symbol = $request->input('symbol');
        $url = $this->host . $this->cnywithdrawUrl;
        if(!empty($symbol)){
            $url .= '?symbol=' .$symbol;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('finance.cnyWithdraw',$data);

    }


    /**
     * 个人资产
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function index(){
        $url = $this->host . $this->assetUrl;
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data']['userWalletList'];
        return view('finance.index',['data'=>$data]);
    }


    /**
     * 账单明细
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function record(Request $request){
        $url = $this->host . $this->recordUrl;

        $param = $request->only(['datetype','begindate','enddate','symbol','type']);
        if(!empty($param)){
            $param = http_build_query($param);
            $url .= '?' . $param;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('finance.record',$data);
    }


    /**
     * 资金账户
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function accountcoin(Request $request) {
        $url = $this->host . $this->accountcoinUrl;

        $param = $request->only(['symbol']);
        if(!empty($param)){
            $param = http_build_query($param);
            $url .= '?' . $param;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        return view('finance.accountcoin',$data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finances(Request $request) {
        $param = $request->only(['currentPage']);

        $url = $this->host . $this->financesUrl;

        if(!empty($param)){
            $param = http_build_query($param);
            $url .= '?' . $param;
        }
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];

        return view('finance.finances',$data);
    }


    /**
     * 推荐奖励页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function commission(Request $request) {
        $url = $this->host . $this->commissionUrl;
        $response = $this->httpGet($url);
        $response = $this->parseResponse($response);
        $data = $response['data'];
        $host = $_SERVER['HTTP_HOST'];
        $data['introId'] = substr($data['introurl'],strpos($data['introurl'],'intro=')+6);
        $data['introurl'] = 'http://'.$host . $data['introurl'];
        return view('finance.commission',$data);
    }


    /**
     * 添加提现地址
     * @param Request $request
     * @return string
     */
    public function saveWithdrawAddress(Request $request){
        $param = $request->only(['withdrawAddr','totpCode','phoneCode','symbol','password','remark']);
        if(empty($param['remark'])){
            $param['remark'] = 1;
        }
        $url = $this->host . $this->saveWithdrawUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 提现操作
     * @param Request $request
     * @return string
     */
    public function withDraw (Request $request) {
        $param = $request->only(['withdrawAddr','withdrawAmount','tradePwd','totpCode','phoneCode','symbol','btcfeesIndex'],'memo');
        $url = $this->host . $this->withdraw;
        return $this->parseApi($this->httpPost($url,$param));

    }


    /**
     * 删除提现地址接口
     * @param Request $request
     * @return string
     */
    public function delWithdrawAddr(Request $request){
        $param = $request->only(['fid','symbol']);
        $url = $this->host . $this->delWithdrwaAddr;
        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 切换存币类型接口
     * @param Request $request
     * @return string
     */
    public function clacCount(Request $request) {
        $param = $request->only(['symbol']);
        $url = $this->host . $this->clacCountUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * @param Request $request
     * @return string
     */
    public function submit(Request $request){
        $param = $request->only(['symbol','type','count','tradepwd','googlecode']);
        $url = $this->host . $this->submitUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * 保存银行卡信息
     * @param Request $request
     * @return string
     */
    public function saveBankInfo(Request $request){
        $param = $request->only(['account','openBankType','totpCode',
            'phoneCode','address','prov','city','dist','payeeAddr','bankId']);
        $url = $this->host . $this->saveBankInfoUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }


    /**
     * cny提现
     * @param Request $request
     * @return string
     */
    public function cnyWithdraws(Request $request){
        $param = $request->only(['tradePwd','withdrawBalance','phoneCode','totpCode','withdrawBlank','symbol']);
        $url = $this->host . $this->cnyWithdrawsUrl;
        return $this->parseApi($this->httpPost($url,$param));
    }

    /**
     * 发送银行卡短信
     * @return string
     */
    public function smsBank(){
        $url = $this->host . $this->smsBankUrl;

        return $this->parseApi($this->httpPost($url));
    }

}
