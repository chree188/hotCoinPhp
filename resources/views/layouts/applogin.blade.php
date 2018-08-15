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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="HOTCOIN" />
    <meta name="keywords" content="HOTCOIN" />
    <meta name="author" content="HOTCOIN" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('iconfont/iconfont.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-new.css') }}" />
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->
<div class="header clearfix">
    <div class="logo">
        <a href="{{route('index')}}"></a>
    </div>
    <div class="navbar">
        <div class="navbar-list">
            <div class="navbar-list-item">
                <a id="top_main" href="{{ route('main') }}" class="active">{{ __('head.home') }}</a>
            </div>
            <div class="navbar-list-item">
                <a id="top_market" href="{{route(('trade'))}}">{{ __('head.market') }}</a>
            </div>

            <div class="navbar-list-item">
                <a id="top_consumer" href="{{ route('consumer') }}">{{ __('head.c2c') }}</a>
            </div>

            <div class="navbar-list-item">
                <a id="top_coinDeposit" href="{{ route('coinDeposit') }}">{{ __('head.finance') }}</a>
            </div>



            @if (!empty(USERNAME))
                <div class="navbar-list-item">
                    <a id="top_security" href="{{ route('security') }}">{{ __('head.personal') }}</a>
                </div>
            @endif
            {{--<div class="navbar-list-item">--}}
                {{--<a id="top_help" href="{{ route('help') }}">{{ __('head.help') }}</a>--}}
            {{--</div>--}}
        </div>
        <div class="navbar-loging">
            @if (empty(USERNAME))
        <!--        <a href="{{ route('login') }}" class="navbar-loging-btn">{{ __('head.login') }}</a>
                |
                <a href="{{ route('register') }}" class="navbar-loging-btn">{{ __('head.register') }}</a>-->
            <div class="hot-coin-is-login">
                <a href="{{ route('login') }}" class="">{{ __('head.login') }}</a>
                <a href="{{ route('register') }}" class="">{{ __('head.register') }}</a>

            </div>
            @else
                <div class="navbar-loging-box">
                        <span class="navbar-loging-text">
                            {{ __('head.hi') }}, {{ USERNAME }}
                            <i class="iconfont icon-xia"></i>
                        </span>
                    <!----------------------------------- 登录后的悬浮窗 ----------------------->
                    <div class="my-box">
                        <div class="clearfix my-box-header">
                            <div class="left my-box-num">
                                <h2>{{ USERNAME }}</h2>
                                <p>UID:</p>
                            </div>
                            <a href="{{ route('security') }}" class="right my-box-header-btn">{{ __('head.setup') }}</a>
                        </div>
                        <div class="my-box-body" id="assetsDetail">
                            <table class="my-box-table">
                                <tr>
                                    <th>{{ __('head.currency') }}</th>
                                    <th>{{ __('head.available') }}</th>
                                    <th>{{ __('head.frozen') }}</th>
                                </tr>
                            </table>
                        </div>
                        <div class="my-box-btn">
                            <a href="{{ route('coinDeposit') }}" class="btn">{{ __('head.recharge') }}</a>
                        </div>
                    </div>
                </div>
                |
                <a href="{{ route('logout') }}" class="navbar-loging-btn">{{ __('head.logout') }}</a>
            @endif
        </div>
        <div class="navbar-box">
            <div class="navbar-language-text clearfix">
                <p class="navbar-box-text"><span class="{{ __('head.language_css') }}"></span>{{ __('head.language') }}</p>
                <i class="iconfont icon-xia"></i>
            </div>
            <div class="navbar-language">
                <div class="navbar-language-item clearfix" onclick="changeLang(1)">
                    <p class="navbar-box-text"><span class="language-cn"></span>中文</p>
                </div>
                <div class="navbar-language-item clearfix" onclick="changeLang(2)">
                    <p class="navbar-box-text"><span class="language-usa"></span>English</p>
                </div>
            </div>
        </div>
    </div>
</div>
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
<!--------------------------- banner ---------------------------------->
@yield('content')

<div class="container-fluid terminal-wrap" style="background-color:#282828">
    <div class="container">
        <div class="row hot-coin-info-intro" style="color:#fff">
            <div class="col-xs-3">
                <div style="margin-top:10px;"><img src="{{asset('img/imgNew/LOGO@2x.png')}}"></div>
                <div  class="hot-coin-imgl-list">
                    <img src="{{asset('img/imgNew/FB@2x.png')}}">
                    <img src="{{asset('img/imgNew/TW@2x.png')}}">
                    <img src="{{asset('img/imgNew/TW 拷贝@2x.png')}}">
                    <img src="{{asset('img/imgNew/TW 拷贝 2@2x.png')}}">
                    <img src="{{asset('img/imgNew/TW 拷贝 3@2x.png')}}">
                </div>
                <div class="hot-coin-copyright">©2017-2018 hotcoin.top</div>
            </div>
            <div class="col-xs-1">

            </div>

            <div class="col-xs-2 hot-coin-digital-intro">
                <h1>{{ __('head.about1') }}</h1>
                <p><a href="{{ route('help',['id'=>2]) }}">{{ __('head.about') }}</a></p>
                <p><a href="{{ route('help',['id'=>53]) }}">{{ __('head.contact') }}</a></p>
                <p><a href="{{ route('help',['id'=>57]) }}">{{ __('head.business') }}</a></p>
            </div>
            <div class="col-xs-2 hot-coin-digital-intro">
                <h1>{{ __('head.help') }}</h1>
                <p><a href="{{ route('help',['id'=>1]) }}">{{ __('head.help') }}</a></p>
                <p><a href="{{ route('help',['id'=>6]) }}">{{ __('head.user-registration') }}</a></p>
                <p><a href="{{ route('help',['id'=>37]) }}">{{ __('head.bind-Google') }}</a></p>
            </div>
            <div class="col-xs-2 hot-coin-digital-intro">
                <h1>{{ __('head.description') }}</h1>
                <p><a href="{{ route('help',['id'=>5]) }}">{{ __('head.law') }}</a></p>
                <p><a href="{{ route('help',['id'=>4]) }}">{{ __('head.usercenter') }}</a></p>
                <p><a href="{{ route('help',['id'=>3]) }}">{{ __('head.rate') }}</a></p>
            </div>
            <div class="col-xs-2 hot-coin-digital-intro" >
                <h1>{{ __('head.service') }}</h1>
                <div class="hot-coin-connect-phone" style="display:none">
                    <img src="{{asset('img/imgNew/connect_phone.png')}}">
                    <span>: ----------</span>
                </div>
                <div class="hot-coin-connect-phone hot-coin-connect-service">
                    <a href="{{route('online')}}" style="display:block;width:100%">
                        <img src="{{asset('img/imgNew/online_service1.png')}}" style="position:relative;top:-2px;left:-5px;width:22px;height:22px">
                        <span style="height:23px;line-height:23px;color:#fff">{{ __('head.online-service') }}</span>
                    </a>

                </div>
<!--                <div class="hot-coin-connect-phone hot-coin-connect-service">
                    <img src="{{asset('img/imgNew/online_service1.png')}}" style="width:22px;height:22px;margin-top:10px;">
                    <span>{{ __('head.online-service') }}</span>
                </div>-->
            </div>
        </div>

    </div>
</div>


</body>


<script type="text/javascript">
    $(function(){
        if(location.href.indexOf('main')!=-1){
            $(".navbar-list-item a").removeClass("active");
            $("#top_main").addClass("active");
        }
        if(location.href.indexOf('coin_deposit')!=-1||location.href.indexOf('withdraw/')!=-1||location.href.indexOf('financial/')!=-1){
            $(".navbar-list-item a").removeClass("active");
            $("#top_coinDeposit").addClass("active");
        }
        if(location.href.indexOf('user/')!=-1||location.href.indexOf('activity/')!=-1){
            $(".navbar-list-item a").removeClass("active");
            $("#top_security").addClass("active");
        }
        if(location.href.indexOf('about')!=-1){
            $(".navbar-list-item a").removeClass("active");
            $("#top_help").addClass("active");
        }

        if(location.href.indexOf('order')!=-1 ||location.href.indexOf('trade')!=-1 ){
            $(".navbar-list-item a").removeClass("active");
            $("#top_market").addClass("active");
        }
    });


</script>
<script src="{{ asset('js/custom.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/plugin/layer/layer.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/comm/util.js') }}" type="text/javascript" charset="utf-8"></script>

@if (!isset($_COOKIE['oex_lan']) || $_COOKIE['oex_lan'] =='zh_TW')
    <script src="{{ asset('js/language/language_zh_TW.js') }}" type="text/javascript" charset="utf-8"></script>
@else
    <script src="{{ asset('js/language/language_en_US.js') }}" type="text/javascript" charset="utf-8"></script>
@endif
@yield('js')

<script>
    window.easemobim = window.easemobim || {};
    easemobim.config = {
        configId: 'febe78e0-06fc-45a3-9c2d-2f5e40088dbf',
        buttonText: util.getLan('head.tips.1'),
        dialogWidth: '600px',
        dialogHeight: '550px',
        dialogPosition: { x: '10px', y: '10px' }
    };
</script>
<script src='//kefu.easemob.com/webim/easemob.js'></script>
</html>