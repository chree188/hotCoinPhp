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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('iconfont/iconfont.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />
        <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript" charset="utf-8"></script>
    </head>
    <style>
        .home-body-text .risk-hint{

            width: 700px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 30px;
            padding-left: 40px;
        }
        /*.home-body-text .risk-hint h2{*/
        /*height: inherit;*/
        /*display: inline-block;*/
        /*width: 100px;*/
        /*color: white;*/
        /*vertical-align: middle;*/

        /*}*/
        .home-body-text .risk-hint .risk-body{
            display: inline-block;
            width: 660px;
        }

        .home-body-text .risk-body p{
            font-size: .16rem;
            text-align: left;
            margin: 0;
            line-height: 26px;
        }
    </style>

    <body style="height: 100%;">
        <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->
        <div class="home-warp">
            <div class="home" style="height: 100%;background: url(img/imgNew/big_03.jpg);background-position: center center;background-size: cover; ">

                <!-------------------------------------- 页头 ------------------------------>
                <header id="header" class="clearfix">
                    <div class="logo">
                        <a href="javascript:void(0);"></a>
                    </div>
                    {{--<div class="navbar">--}}
                        {{--<div class="navbar-list">--}}
                            {{--<a href="{{ route('help',['id'=>1]) }}">{{ __('head.help') }}</a>--}}
                        {{--</div>--}}
                        {{--<div class="navbar-loging">--}}
                            {{--@if (empty(session('user_name')))--}}
                                {{--<a href="{{ route('login') }}" class="navbar-loging-btn">{{ __('head.login') }}</a>--}}
                                {{--|--}}
                                {{--<a href="{{ route('register') }}" class="navbar-loging-btn">{{ __('head.register') }}</a>--}}
                            {{--@else--}}
                                {{--<div class="navbar-loging-box">--}}
                        {{--<span class="navbar-loging-text">--}}
                            {{--{{ __('head.hi') }}, {{ session('user_name') }}--}}
                            {{--<i class="iconfont icon-xia"></i>--}}
                        {{--</span>--}}
                                    {{--<!----------------------------------- 登录后的悬浮窗 ----------------------->--}}
                                    {{--<div class="my-box">--}}
                                        {{--<div class="clearfix my-box-header">--}}
                                            {{--<div class="left my-box-num">--}}
                                                {{--<h2>{{ session('user_name') }}</h2>--}}
                                                {{--<p>UID:</p>--}}
                                            {{--</div>--}}
                                            {{--<a href="{{ route('security') }}" class="right my-box-header-btn">{{ __('head.setup') }}</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="my-box-body" id="assetsDetail">--}}
                                            {{--<table class="my-box-table">--}}
                                                {{--<tr>--}}
                                                    {{--<th>{{ __('head.currency') }}</th>--}}
                                                    {{--<th>{{ __('head.available') }}</th>--}}
                                                    {{--<th>{{ __('head.frozen') }}</th>--}}
                                                {{--</tr>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                        {{--<div class="my-box-btn">--}}
                                            {{--<a href="{{ route('coinDeposit') }}" class="btn">{{ __('head.recharge') }}</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--|--}}
                                {{--<a href="{{ route('logout') }}" class="navbar-loging-btn">{{ __('head.logout') }}</a>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="navbar-box">--}}
                            {{--<div class="navbar-language-text clearfix">--}}
                                {{--<p class="navbar-box-text"><span class="{{ __('head.language_css') }}"></span>{{ __('head.language') }}</p>--}}
                                {{--<i class="iconfont icon-xia"></i>--}}
                            {{--</div>--}}
                            {{--<div class="navbar-language">--}}
                                    {{--<div class="navbar-language-item clearfix" onclick="changeLang(1)">--}}
                                        {{--<p class="navbar-box-text"><span class="language-cn"></span>繁体中文</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="navbar-language-item clearfix" onclick="changeLang(2)">--}}
                                        {{--<p class="navbar-box-text"><span class="language-usa"></span>English</p>--}}
                                   {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </header>

                <div class="home-body">
                    <div class="home-body-text">
                        <h1>{{__('main.welcome')}}</h1>
                        <p>{{__('main.adv')}}</p>
                        <div class="home-body-btn">
                            <div class="risk-hint">
                                <div class="risk-body">
                                    <p>{{__('main.risk-notice-title')}}</p>
                                    <p style="text-indent: 2em;">{{__('main.risk-notice1')}}</p>
                                    <p style="text-indent: 2em;">{{__('main.risk-notice2')}}</p>
                                </div>
                            </div>

                            <a href="{{ route('main') }}">{{__('main.enter')}}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <script src="{{asset('js/custom.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/comm/util.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/comm/comm.js') }}" type="text/javascript" charset="utf-8"></script>
        <script>
            function changeLang(num) {
                if(num==1){
                    $.get('{{ route("change_lang",['local'=>'cn']) }}',function (data) {
                        if(data==1){
                            location.reload();
                        }else{
                            alert('语言切换失败');
                        }
                    });
                }else{
                    $.get('{{ route("change_lang",['local'=>'en']) }}',function (data) {
                        if(data==1){
                            location.reload();
                        }else{
                            alert('语言切换失败');
                        }
                    });
                }
            }

        </script>
    </body>

</html>