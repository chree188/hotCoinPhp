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
                        <h2 class="loging-body-tetil">欢迎登录Hotcoin</h2>
                        <div class="form-wrap">
                            <form class="form">
                                {{ csrf_field() }}
                                <div class="form-item">
                                    <span class="iconfont icon-zhuanghao"></span>
                                    <label for="">
                                        <input type="text" name="" id="" value="" placeholder="电子邮箱/手机号码"/>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="password" name="" id="" value="" placeholder="登录密码"/>
                                    </label>
                                </div>
                                <div class="clearfix form-box">
                                    <div class="left form-search">
                                        <label>
                                            <input type="checkbox" name="" id="" value="" />
                                            记住密码
                                        </label>
                                    </div>
                                    <div class="right back-psd-btn">
                                        <a href="reset_psd_first.html">忘记密码</a>
                                    </div>
                                </div>
                            </form>
                            <div class="form-btn">
                                <a href="index.html">登录</a>
                            </div>
                            <div class="form-hint">
                                <p>还没有Hotcoin账号？<a href="registered.html">立即注册</a></p>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
	    </div>
	</body>
</html>
