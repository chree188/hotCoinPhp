<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no" />
        <title>HOTCOIN</title>
        <meta name="description" content="HOTCOIN" />
        <meta name="keywords" content="HOTCOIN" />
        <meta name="author" content="HOTCOIN" />
        <link rel="stylesheet" type="text/css" href="iconfont/iconfont.css" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <script src="js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
	    <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->
        <div class="header header-shadow clearfix">
            <div class="logo">
                <a href="index.html"></a>
            </div>
            <div class="navbar">
                <div class="navbar-list">
                    <div class="navbar-list-item">
                        <a href="{{ route('main') }}">{{ __('head.home') }}</a>
                    </div>
                    <div class="navbar-list-item">
                        <a href="">{{ __('head.banking') }}</a>
                    </div>
                    <div class="navbar-list-item">
                        <a href="">{{ __('head.market') }}</a>
                    </div>
                    <div class="navbar-list-item">
                        <a href="{{ route('help') }}" class="active">{{ __('head.help') }}</a>
                    </div>
                </div>
                <div class="navbar-loging">
                    <a href="{{ route('login') }}" class="navbar-loging-btn">{{ __('head.login') }}</a>
                    |
                    <a href="{{ route('register') }}" class="navbar-loging-btn">{{ __('head.register') }}</a>
                </div>
<!---------------------------- 语言选择 -------------------------->
                <div class="navbar-box">
                    <div class="navbar-language-text clearfix">
                        <p class="navbar-box-text"><span class="language-usa"></span>English</p>
                        <i class="iconfont icon-xia"></i>
                    </div>
                    <div class="navbar-language">
                        <div class="navbar-language-item clearfix">
                            <p class="navbar-box-text"><span class="language-cn"></span>繁体中文</p>
                        </div>
                        <div class="navbar-language-item clearfix">
                            <p class="navbar-box-text"><span class="language-usa"></span>English</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row serve-wrap">
                <div class="col-xs-12 serve">
<!------------------------------- 边栏 ----------------------------->
                    <div class="col-xs-3">
                        <ul class="serve-list">
                            <li class="serve-list-item">
                                <a href="###" class="serve-item-btn clearfix">
                                    <i class="iconfont icon-xia"></i>
                                    常见问题
                                </a>
                                <ul class="serve-item-nav">
                                    <li class="serve-item-navbar">
                                        <a href="###">新手必看</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">HOTCOIN常见问题</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">如何下载热币APP</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">提币限额&提币手续费</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">热币桌面版安装教程</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">如何设置谷歌验证码？</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">区块链资产交易分区说明</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">USDT可靠吗？</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">交易限额</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">点对点交易平台常见问题</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">热币官方交流群</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">分叉币快照情况</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="serve-list-item">
                                <a href="###" class="serve-item-btn clearfix">
                                    <i class="iconfont icon-xia"></i>
                                    注册认证
                                </a>
                                <ul class="serve-item-nav">
                                    <li class="serve-item-navbar">
                                        <a href="###">如何实名认证</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">如何手机注册</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">如何邮箱注册</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="serve-list-item">
                                <a href="###" class="serve-item-btn clearfix">
                                    <i class="iconfont icon-xia"></i>
                                    人民币充值/提现
                                </a>
                                <ul class="serve-item-nav">
                                    <li class="serve-item-navbar">
                                        <a href="###">人民币充值买币</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">卖币提现人民币</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="serve-list-item">
                                <a href="###" class="serve-item-btn clearfix">
                                    <i class="iconfont icon-xia"></i>
                                    充值提币
                                </a>
                                <ul class="serve-item-nav">
                                    <li class="serve-item-navbar">
                                        <a href="###">如何充币</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">如何提币</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="serve-list-item">
                                <a href="###" class="serve-item-btn clearfix">
                                    <i class="iconfont icon-xia"></i>
                                    如何交易
                                </a>
                                <ul class="serve-item-nav">
                                    <li class="serve-item-navbar">
                                        <a href="###">OTC买币后如何进入场内交易</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="serve-list-item">
                                <a href="###" class="serve-item-btn clearfix">
                                    <i class="iconfont icon-xia"></i>
                                    热币杠杆介绍
                                </a>
                                <ul class="serve-item-nav">
                                    <li class="serve-item-navbar">
                                        <a href="###">杠杆使用说明</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">账户爆仓</a>
                                    </li>
                                    <li class="serve-item-navbar">
                                        <a href="###">杠杆交易操作流程</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-9 serve-content">
                        <h1 class="col-xs-12 serve-tetil">新手必看</h1>
                        <div class="col-xs-12 serve-data">
                            <div class="serve-data-box">
           <!--------------------------------------- 文本 --------------------------------->
                                <p class="serve-data-text">最近有很多用户都在问现在如何用人民币炒币，其实方法很简单，只需三步：买币、交易、卖币！</p>
           <!------------------------------------------ 视频样式 --------------------------->
                                <div class="serve-data-video">
                                    <p class="serve-video-text">人民币买币视频教程如下:</p>
                                    <video width="600px" controls>
                                        	<source src="video/movie.mp4" type="video/mp4"></source>
                                        	当前浏览器不支持 video直接播放。
                                    </video>
                                </div>
           <!------------------------------------------ 图片样式 --------------------------->
                                <div class="serve-data-img">
                                    <p class="serve-img-text">2. 进入如下页面，选择“交易中心”-“我要买入”就可以看到很多正在出售的USDT，它们有不同的价格，不同的付款方式。找一个符合自己心理价位的，选择买入即可。</p>
                                    <div class="serve-img-box">
                                        <img src="img/banner_01.png" alt="" />
                                    </div>
                                </div>
            <!----------------------------------------- 表格 ------------------------------>
                                <div class="serve-data-tabel-wrap">
                                    <table class="serve-data-tabel">
                                    	   <tr class="serve-tabel-header">
                                    	       <th>未认证用户</th>
                                    	       <th>单次最小(不包括手续费)</th>
                                    	       <th>单次最大</th>
                                    	       <th>单日最大</th>
                                    	       <th>单笔手续费</th>
                                    	   </tr>
                                    	   <tbody class="serve-tabel-body">
                                    	       <tr class="serve-tabel-item">
                                        	       <td>ASR</td>
                                        	       <td>10</td>
                                        	       <td>5000</td>
                                        	       <td>5000</td>
                                        	       <td>5</td>
                                        	   </tr>
                                    	       <tr class="serve-tabel-item">
                                        	       <td>ASR</td>
                                        	       <td>10</td>
                                        	       <td>5000</td>
                                        	       <td>5000</td>
                                        	       <td>5</td>
                                        	   </tr>
                                    	       <tr class="serve-tabel-item">
                                        	       <td>ASR</td>
                                        	       <td>10</td>
                                        	       <td>5000</td>
                                        	       <td>5000</td>
                                        	       <td>5</td>
                                        	   </tr>
                                    	       <tr class="serve-tabel-item">
                                        	       <td>ASR</td>
                                        	       <td>10</td>
                                        	       <td>5000</td>
                                        	       <td>5000</td>
                                        	       <td>5</td>
                                        	   </tr>
                                    	   </tbody>

                                    </table>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <div class="container-fluid footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 footer-nav">
                        <ul class="clearfix">
                            <li class="left footer-nav-navbar">
                                <a href="">联系我们</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="">关于我们</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="">法律声明</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="">使用帮助</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="">商务合作</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="">在线问答</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="">费率说明</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 footer-num">
                        <p>©2017-2018 hotcoin.top</p>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/custom.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript">
        	       $(".serve-item-btn").on({
        	           click:function(){
        	               $(this).siblings(".serve-item-nav").toggle();
        	               if($(this).children("i").hasClass("icon-xia")){
        	                   $(this).children("i").removeClass("icon-xia").addClass("icon-shang");
        	               }else{
        	                   $(this).children("i").addClass("icon-xia").removeClass("icon-shang");
        	               }
        	           }
        	       })

        	       $(".serve-item-navbar a").on({
        	           click:function(){
        	               $(".serve-item-navbar a").removeClass("active");
        	               $(this).addClass("active");
        	           }
        	       })


        </script>
	</body>
</html>
