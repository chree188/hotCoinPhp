<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//语言切换路由
Route::get('/change_lang/{lang}', 'IndexController@change_lang')->name('change_lang');

Route::group(['middleware' => 'change_lang'], function () {

    Route::get('/vailImg.html', 'UserController@getVailImg'); //图片验证码

    Route::get('/main.html', 'IndexController@main')->name('main'); //首页
    Route::get('/index.html', 'IndexController@main')->name('main'); //首页

    Route::get('/getwallet.html', 'IndexController@getWallet')->name('getwallet'); //首页


    Route::get('/', 'IndexController@index')->name('index');//引导页

//    Route::get('/help.html', 'indexController@help')->name('help'); //帮助页
    Route::group(['prefix'=>'user'],function(){

        Route::get('/login.html', 'UserController@login')->name('login');
        Route::get('/logout.html', 'UserController@logout')->name('logout');
        Route::get('/intro.html', 'UserController@intro')->name('intro');
        Route::get('/register.html', 'UserController@register')->name('register');
        Route::get('/phonereg.html', 'UserController@phonereg')->name('phonereg');
        Route::get('/security.html', 'SecurityController@index')->name('security');
        Route::get('/user_loginlog.html', 'SecurityController@loginLog')->name('loginlog');
        Route::get('/user_settinglog.html', 'SecurityController@settingLog')->name('settinglog');
    });
    //活动模块
    Route::group(['prefix'=>'activity'],function(){
        Route::get('/index.html', 'ActiveController@index')->name('active');
    });

    //用户模块
    Route::group(['middleware' => 'check_login'], function () {

        //财务中心
        Route::get('/deposit/coin_deposit.html','FinanceController@coinDeposit')->name('coinDeposit'); //充值
        Route::get('/deposit/cny_deposit.html','FinanceController@cnyDeposit')->name('cnyDeposit'); //充值
        Route::get('/withdraw/coin_withdraw.html','FinanceController@coinWithdraw')->name('coinWithdraw');//提现
        Route::get('/withdraw/cny_withdraw.html','FinanceController@cnyWithdraw')->name('cnyWithdraw');//提现
        Route::group(['prefix'=>'financial'],function(){
            Route::get('index.html','FinanceController@index')->name('asset'); //个人资产
            Route::get('record.html','FinanceController@record')->name('record');//账单明细
            Route::get('accountcoin.html','FinanceController@accountcoin')->name('accountcoin');//资金账号
            Route::get('finances.html','FinanceController@finances')->name('finances');//存币收益
            Route::get('commission.html','FinanceController@commission')->name('commission');//推广收益
        });
    });
    //帮助中心
    Route::group(['prefix'=>'about'],function(){
        Route::get('/about.html', 'HelpController@about')->name('help');
    });
    //新闻中心
    Route::get('/notice/index.html', 'ArticleController@index')->name('notice');
    Route::get('/notice/detail.html', 'ArticleController@detail')->name('detail');
    //找回密码
    Route::get('/validate/reset_email.html', 'UserController@resetEmail')->name('resetEmail');
    Route::get('/validate/reset_phone.html', 'UserController@resetPhone');//手机重设密码界面
    Route::get('/validate/mail_validate.html','UserController@vailMail'); //邮箱验证
    //交易中心
//    Route::get('/trademarketnew.html', 'TradeController@index')->name('tradenew');
    Route::get('/trademarket.html', 'TradeviewController@index')->name('trade');
    Route::get('/trade/cny_entrust.html', 'TradeController@entrust')->name('entrust');
    Route::get('/order.html', 'TradeController@order')->name('order');

    //在线问题
    Route::get('/online_help/index.html', 'HelpController@question')->name('online');
    Route::get('/online_help/help_list.html', 'HelpController@questionList')->name('onlineList');

    //轮播详情
    Route::get('/broadcast/index','BroadcastController@index')->name('broadcast');

    //C2C功能
    Route::get('/consumer/index','C2C\ConsumerController@index')->name('consumer');
    Route::get('/consumer/record','C2C\ConsumerController@record')->name('con_record');
    Route::get('/consumer/business','C2C\ConsumerController@business')->name('business');
    Route::post('/consumer/order','C2C\ConsumerController@order')->name('order');
    Route::post('/consumer/banklist','C2C\ConsumerController@banklist')->name('banklist');
    Route::post('/consumer/orderdetail','C2C\ConsumerController@orderdetail')->name('orderdetail');
    Route::post('/consumer/savebankinfo','C2C\ConsumerController@savebankinfo')->name('savebankinfo');
    Route::post('/consumer/setting','C2C\ConsumerController@setting')->name('setting');
    Route::post('/consumer/default_bankinfo','C2C\ConsumerController@default_bankinfo')->name('default_bankinfo');
    Route::post('/consumer/del_bankinfo','C2C\ConsumerController@del_bankinfo')->name('del_bankinfo');
//    Route::post('/consumer/set_passwrod_confirm','C2C\ConsumerController@set_passwrod_confirm')->name('set_passwrod_confirm');


});
//app页面
    Route::group(['prefix'=>'app'],function(){
        Route::get('/fee.html', 'AppController@fee');
        Route::get('/coin.html', 'AppController@coin');
        Route::get('/help.html', 'AppController@help');
    });


/*
 * api接口路由
 */
    //用户登录注册相关接口
    Route::post('/user/login.html', 'UserController@userLogin'); //用户登录接口

    Route::view('/test.html','test');
    Route::view('/k.html','k');
    Route::view('/js/plugin/charting_library/static/tv-chart.82ee311dc10bb182c736.html','chart');

    Route::post('/user/check_user_exist.html', 'UserController@checkUser'); // 检查用户是否存在接口
    Route::post('/user/send_reg_email.html','UserController@emailCode'); //发送注册邮件接口
    Route::post('/user/send_sms.html','UserController@sendSms'); //发送短信接口
    Route::post('/validate/send_bindphone_sms.html','UserController@bindPhoneSMS'); //发送短信接口
    Route::post('/validate/sendFindPhoneCode.html','UserController@findPhoneSMS'); //发送短信接口
    Route::post('/register.html','UserController@reg');


    //用户安全中心相关接口
    Route::post('/user/bind_google_device.html','SecurityController@getGoogleQR'); //加载谷歌code二维码
    Route::post('/user/google_auth.html','SecurityController@bindGoogleCode'); //绑定谷歌验证码
    Route::post('/user/get_google_key.html','SecurityController@getGoogleCode'); //查看谷歌验证码接口

    Route::post('/validate/send_bindmail.html','SecurityController@sendEmailCode'); //发送邮件|绑定邮箱

    Route::post('/user/modify_passwd.html','SecurityController@modifyPassword'); //修改登录密码| 设置交易密码 | 修改交易密码
    Route::post('/real_name_auth.html','SecurityController@saveRealName'); //真实信息保存
    Route::post('/validate/bindphone.html','SecurityController@bindPhone'); //绑定手机接口
    Route::post('/activity/exchange.html','ActiveController@exchange'); //兑换码兑换接口

    //财务中心相关接口
    Route::post('/user/save_withdraw_address.html','FinanceController@saveWithdrawAddress'); //保存提现地址
    Route::post('/withdraw/coin_manual.html','FinanceController@withdraw'); //提现操作
    Route::post('/user/del_withdraw_address.html','FinanceController@delWithdrawAddr'); //删除提现地址
    Route::post('/get_finances.html','FinanceController@clacCount'); //删除提现地址
    Route::post('/submit_finances.html','FinanceController@submit'); //存币提交地址
    Route::post('/user/save_bankinfo.html','FinanceController@saveBankInfo'); //保存银行卡地址
    Route::post('/withdraw/cny_manual.html','FinanceController@cnyWithdraws'); //gset提现到银行卡
    Route::post('/user/send_bank_sms.html','FinanceController@smsBank'); //gset提现到银行卡

   //首页相关接口
    Route::post('/real/indexmarket.html','IndexController@indexMarket'); //首页市场地址
    Route::post('/real/markets.html','IndexController@realPrice'); //首页币种实时价格
    Route::post('/kline/fullperiod.html','IndexController@kline'); //首页币种k线图

    //重置密码
    Route::post('/validate/send_findbackmail.html','UserController@findBack'); //首页币种k线图
    Route::post('/validate/reset_password.html','UserController@resetPassword'); //首页币种k线图

    Route::post('/validate/reset_password_check.html','UserController@phoneCheck'); //首页币种k线图
    Route::post('/validate/reset_password_phone.html','UserController@resetPasswordByPhone'); //首页币种k线图



    //交易中心
    Route::post('/real/market.html','TradeController@market'); //交易中心实时交易
    Route::get('/real/market.html','TradeController@market'); //交易中心实时交易
    Route::post('/kline/fulldepth.html','TradeController@fulldepth'); //交易中心深度图
    Route::post('/kline/fullperiod.html','TradeController@fullperiod'); //交易中心k线图


    Route::get('/config','TradeController@traderview')->name('config');
    Route::get('/tradeviewdata','TradeviewController@tradeviewData')->name('tradeviewdata');
    Route::get('/incrementdata','TradeviewController@incrementData')->name('incrementdata');

    Route::post('/trade/cny_buy.html','TradeController@cnyBuy'); //交易中心买币
    Route::post('/trade/cny_sell.html','TradeController@cnySell'); //交易中心买币
    Route::post('/trade/cny_cancel.html','TradeController@cnyCancel'); //撤单
    Route::post('/real/userassets.html','TradeController@asset'); //交易中心取消交易
    Route::post('/real/getEntruts.html','TradeController@getEntruts'); //获取委托单
    Route::post('/trade/cny_entrustLog.html','TradeController@entrustLog'); //获取历史委托单详情
    Route::post('/market/rate.html','TradeController@rate'); //获取历史委托单详情
    //在线帮助
    Route::post('/online_help/help_submit.html','HelpController@saveQuestion'); //提交问题反馈
    Route::post('/online_help/help_delete.html','HelpController@delQuestion'); //删除问题反馈

    //服务端端进行维护要跳到的页面
    Route::get('/error','IndexController@error')->name('error');
    Route::post('/consumer/getuserinfo','C2C\ConsumerController@userinfo')->name('userinfo');
    //c2c



