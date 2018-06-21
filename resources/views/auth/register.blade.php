<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>HOTCOIN</title>
        <meta name="description" content="HOTCOIN" />
        <meta name="keywords" content="HOTCOIN" />
        <meta name="author" content="HOTCOIN" />
        <link rel="stylesheet" type="text/css" href="iconfont/iconfont.css" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <script src="js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="iconfont/iconfont.js" type="text/javascript" charset="utf-8"></script>
    </head>
    <body>
        <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->
        <div class="container-fluid loging">
            <div class="row loging-header">
                <div class="col-xs-12 loging-header-logo">
                    <a href="index.html" class=""></a>
                </div>
            </div>
            <div class="row loging-body">
                <div class="col-xs-12">
                    <div class="loging-body-box">
                        <h2 class="loging-body-tetil">欢迎加入Hotcoin</h2>
                        <div class="clearfix loging-body-nav">
                            <a href="###" class="left active" id="mail_btn">邮箱注册</a>
                            <a href="###" class="left" id="phone_btn">手机注册</a>
                        </div>
                        <div class="form-wrap">
<!--------------------------------- 邮箱注册 -------------------------------->
                            <form class="form" id="mail_form">
                                {{ csrf_field() }}
                                <div class="form-item">
                                    <span class="iconfont icon-youxiang"></span>
                                    <label for="">
                                        <input type="text" name="" id="" value="" placeholder="邮箱地址"/>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="登录密码"/>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="确认密码"/>
                                    </label>
                                </div>
                                <div class="form-item form-item-box clearfix">
                                    <span class="iconfont icon-youxiangyanzheng"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="邮箱验证码"/>
                                    </label>
                                    <a href="###" class="form-item-btn send-captcha-mail">获取验证码</a>
                                </div>
                                <div class="form-item form-item-box clearfix">
                                    <span class="iconfont icon-yanzhengma"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="验证码"/>
                                    </label>
                                    <a href="###" class="form-item-img">
                                        <img src="img/demo_02.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="clearfix form-box">
                                    <div class="left form-search">
                                        <label>
                                            <input type="checkbox" name="" id="" value="" />
                                            已经阅读并同意<a href="###" class="form-search-btn">Hotcoin用户协议</a>
                                        </label>
                                    </div>
                                </div>
                            </form>
<!------------------------------ 手机注册 -------------------------------->
                            <form class="form" id="phone_form">
                                <div class="form-item">
                                    <span class="iconfont icon-shouji"></span>
                                    <label for="">
                                        <input type="text" name="" id="" value="" placeholder="邮箱地址"/>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="登录密码"/>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="确认密码"/>
                                    </label>
                                </div>
                                <div class="form-item form-item-box clearfix">
                                    <span class="iconfont icon-shoujiyanzheng"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="手机验证码"/>
                                    </label>
                                    <a href="###" class="form-item-btn send-captcha-phone">获取验证码</a>
                                </div>
                                <div class="form-item form-item-box clearfix">
                                    <span class="iconfont icon-yanzhengma"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="验证码"/>
                                    </label>
                                    <a href="###" class="form-item-img">
                                        <img src="img/demo_02.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="clearfix form-box">
                                    <div class="left form-search">
                                        <label>
                                            <input type="checkbox" name="" id="" value="" />
                                            已经阅读并同意<a href="###" class="form-search-btn">Hotcoin用户协议</a>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="form-btn">
                                <a href="loging.html">注册</a>
                            </div>
                            <div class="form-hint">
                                <p>已有账号？<a href="loging.html">立即登录</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!------------------------------------ 用户协议 -------------------------------->


            <div class="pact">
                <h1 class="pact-tetil">用户协议</h1>
                <div class="pact-body">
                    <div class="pact-text">
                        <p>HOTCOIN.（以下称 “公司”）是一家根据塞舌尔共和国相关法律在塞舌尔共和国注册成立的公司，该公司运营网站https://www.huobi.pro（以下称“本网站”或“网站”），该网站是一个专门供用户进行数字资产交易和提供相关服务（以下称“该服务”或“服务”）的平台。为了本协议表述之方便，公司和该网站在本协议中合称使用“我们”或其他第一人称称呼。只要登陆该网站的自然人或其他主体均为本网站的用户，本协议表述之便利，以下使用“您”或其他第二人称。为了本协议表述之便利，我们和您在本协议中合称为“双方”，我们或您单称为“一方”。</p>
                        <p>HOTCOIN.（以下称 “公司”）是一家根据塞舌尔共和国相关法律在塞舌尔共和国注册成立的公司，该公司运营网站https://www.huobi.pro（以下称“本网站”或“网站”），该网站是一个专门供用户进行数字资产交易和提供相关服务（以下称“该服务”或“服务”）的平台。为了本协议表述之方便，公司和该网站在本协议中合称使用“我们”或其他第一人称称呼。只要登陆该网站的自然人或其他主体均为本网站的用户，本协议表述之便利，以下使用“您”或其他第二人称。为了本协议表述之便利，我们和您在本协议中合称为“双方”，我们或您单称为“一方”。</p>
                        <p>HOTCOIN.（以下称 “公司”）是一家根据塞舌尔共和国相关法律在塞舌尔共和国注册成立的公司，该公司运营网站https://www.huobi.pro（以下称“本网站”或“网站”），该网站是一个专门供用户进行数字资产交易和提供相关服务（以下称“该服务”或“服务”）的平台。为了本协议表述之方便，公司和该网站在本协议中合称使用“我们”或其他第一人称称呼。只要登陆该网站的自然人或其他主体均为本网站的用户，本协议表述之便利，以下使用“您”或其他第二人称。为了本协议表述之便利，我们和您在本协议中合称为“双方”，我们或您单称为“一方”。</p>
                        <p>HOTCOIN.（以下称 “公司”）是一家根据塞舌尔共和国相关法律在塞舌尔共和国注册成立的公司，该公司运营网站https://www.huobi.pro（以下称“本网站”或“网站”），该网站是一个专门供用户进行数字资产交易和提供相关服务（以下称“该服务”或“服务”）的平台。为了本协议表述之方便，公司和该网站在本协议中合称使用“我们”或其他第一人称称呼。只要登陆该网站的自然人或其他主体均为本网站的用户，本协议表述之便利，以下使用“您”或其他第二人称。为了本协议表述之便利，我们和您在本协议中合称为“双方”，我们或您单称为“一方”。</p>
                    </div>
                </div>
                <div class="pact-btn">
                    <a href="###" onclick="_pact_hide()">同意此协议</a>
                </div>
                <div class="pact-back">
                    <a href="###" class="iconfont icon-guanbi" onclick="_pact_hide()"></a>
                </div>
            </div>



        <script src="js/custom.js" type="text/javascript" charset="utf-8"></script>

    </body>
</html>
