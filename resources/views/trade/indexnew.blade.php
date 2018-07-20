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
        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui-slider-pips.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datetimepicker.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('iconfont/iconfont.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/reset.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom-new.css') }}" />

        <script src="{{asset('js/jquery-2.2.3.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('iconfont/iconfont.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/plugin/echarts.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/plugin/pako.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/slide.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/jquery-ui-slider-pips.js')}}" type="text/javascript" charset="utf-8"></script>
        <style>
            .hot-coin-is-login a:first-child{
                display:inline-block;
                width:60px;
                height:38px;
                text-align:center;
                line-height:38px;
                color:#fff;
                border:1px solid #666;
                border-radius:5px 0px 0px 5px;
                background-color:#282B36;
            }

            .hot-coin-is-login a:nth-child(2){
                margin-top:17px;
                margin-left:-6px;
                display:inline-block;
                width:60px;
                height:38px;
                line-height:38px;
                text-align:center;
                color:#fff;
                border:1px solid #666;
                border-radius:0px 5px 5px 0px;
            }

            .hot-coin-is-login a:hover{
                background:#EA5B25;
                color:#fff !important;
            }

            .apply-common-tooltip {
                background: none !important;
                border: none !important;
            }
            .apply-common-tooltip svg{
                fill: #566492;
            }

            .button{
                background: none !important;
                border: none !important;
                color: #9194a4 !important;
            }
            .selected{
                border:1px solid #9194a4 !important;
            }

            .chart-container{
                background: none !important;
                border: none !important;
            }
            .header{
                border-bottom: 0px;
            }
            .hot-coin-digital-intro p a{
                color:#7E86A0;
                cursor:pointer;
            }
            .hot-coin-copyright{
                margin-top:30px;
                color:#7E86A0;
            }


        </style>
	</head>
	<body style="min-width: 1200px; background: #12141A;">
	    <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->
        <div class="header header-shadow quites-header clearfix">
            <div class="trade-logo">
                <a href="{{route('index')}}"></a>
            </div>
            <div class="navbar">
                <div class="navbar-list">
                    <div class="navbar-list-item">
                        <a href="{{ route('main') }}" >{{ __('head.home') }}</a>
                    </div>
                    <div class="navbar-list-item">
                        <a href="{{route('trade')}}" class="active">{{ __('head.market') }}</a>
                    </div>
                    <div class="navbar-list-item">
                        <a href="{{route('coinDeposit')}}">{{ __('head.finance') }}</a>
                    </div>

                    @if (!empty(USERNAME))
                        <div class="navbar-list-item">
                            <a id="top_security" href="{{ route('security') }}">{{ __('head.personal') }}</a>
                        </div>
                    @endif

                </div>
                <div class="navbar-loging">
                    @if (empty(USERNAME))

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
                                    <a href="" class="right my-box-header-btn">{{ __('head.setup') }}</a>
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
                                    <a href="" class="btn">{{ __('head.recharge') }}</a>
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

        <div class="container-fluid">
            <div class="row" style="padding: 0 8px;">
<!--------------------------------- 公告 ---------------------->

                <div class="col-xs-12 announcement1" style="background-color:#181B2A;margin-top:10px;padding-top:5px ">
                    <div class="container-banner" style="min-width: 1000px;margin-left: 30px;">
                        <div class="row">
                            <div class="col-xs-12 banner-text-box" style="height:50px;padding-left:30px;overflow: hidden;">

                               <i class="right iconfont icon-gonggao"  style="color: #EA5B25" ></i>
                                <div class="swiper-container swiper-container-vertical js-swiper-container-enroll col-xs-5" style="display: inline-block;">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide swiper-slide-active banner-swiper-item" style="height:50px;" >
                                            <a href="{{route('detail')}}?id={{$article[0]['fid']}}" class="enroll-item" >
                                                {{$article[0]['ftitle']}}<span class="scroll_show_more" style="font-size: 15px;color:#EA5B25;"> 【{{__('head.more')}}】</span>
                                            </a>
                                        </div>
                                        <div class="swiper-slide swiper-slide-active banner-swiper-item" style="height:50px;" >
                                            <a href="{{route('detail')}}?id={{$article[1]['fid']}}" class="enroll-item" >
                                                {{$article[1]['ftitle']}}<span class="scroll_show_more" style="font-size:15px;color:#EA5B25;"> 【{{__('head.more')}}】</span>
                                            </a>
                                        </div>
                                        <div class="swiper-slide swiper-slide-active banner-swiper-item" style="height:50px;" >
                                                <a href="{{route('detail')}}?id={{$article[2]['fid']}}" class="enroll-item" >
                                                    {{$article[2]['ftitle']}}<span class="scroll_show_more" style="font-size: 15px;color:#EA5B25;"> 【{{__('head.more')}}】</span>
                                                </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="iconfont icon-guanbi announcement-btn1 " style="position: absolute;top: 20px;right: 10px;background-color:#181B2A;border:1px solid #181B2A"></button>
                </div>


                <div class="col-xs-12 quotes">
 <!-------------------------------- 左悬浮窗 ------------------------>
                        <div class="quotes-window">
                            <div class="coin-list">
                                <div class="quotes-window-header">
                                    @if(!$login)
                                  <!--------- 未登录 ------->
                                    <p class="clearfix">
                                        <a href="{{route('login')}}">{{__('market.login')}}</a>
                                        {{__('market.or')}}
                                        <a href="{{route('register')}}">{{__('market.reg')}}</a>
                                        {{__('market.begin')}}
                                    </p>
                                  @else
                                   <!--------- 已登录 -------->
                                    <dl class="clearfix">
                                        {{--<dt>{{__('market.asset')}}:</dt>--}}
                                        {{--<dd>0.03193889 BTC <span>≈ 3999.70 CNY</span></dd>--}}
                                    </dl>
                                     @endif
                                </div>
                                <div class="quotes-window-search-wrap clearfix" >
                                    <p class="quotes-search-tetil">{{__('market.market')}}</p>
                                    <div class="quotes-search-text" style="display:none">
                                        <input type="text" name="" id="" value="" />
                                        <i class="iconfont icon-shousuo"></i>
                                    </div>
                                    <div class="quotes-search-btn" style="display:none">
                                        <i class="iconfont icon-qiehuan"></i>
                                        CNY
                                    </div>
                                </div>
                                <div class="quotes-window-nav-wrap">
                                    <ul class="quotes-window-nav clearfix coin-tab">
                                    <ul class="quotes-window-nav clearfix coin-tab">
                                        @foreach($typeMap as $key=>$value)
                                        <li class="quotes-window-navbar">
                                            <button @if($value == $tradeType['buyShortName']) class="active" @endif>{{$value}}</button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
    <!--------------------------------- 悬浮窗列表 ---------------------->

                                <div class="quotes-window-list-wrap">
                                    <div class="quotes-list-header-wrap clearfix" style="background-color:#1D2133;">
                                        <div class="quotes-list-header">
                                            <span>{{__('market.coin')}}</span>
                                            <i>
                                                <b class="iconfont icon-gao"></b>
                                                <b class="iconfont icon-di-copy"></b>
                                            </i>
                                        </div>
                                        <div class="quotes-list-header" style="text-align:center">
                                            <span>{{__('market.newPrice')}}</span>
                                            <i>
                                                <b class="iconfont icon-gao"></b>
                                                <b class="iconfont icon-di-copy"></b>
                                            </i>
                                        </div>
                                        <div class="quotes-list-header">
                                            <span>{{__('market.zf')}}</span>
                                            <i>
                                                <b class="iconfont icon-gao"></b>
                                                <b class="iconfont icon-di-copy"></b>
                                            </i>
                                        </div>
                                    </div>
                                <!----------- 主区列表 ----------->

                                    @foreach($tradeTypeListMap as $index=>$trdeTypeList)
                                    <div class="quotes-tabel-wrap coin-list-item"  @if($index != $tradeType['type']) style="display:none;" @endif>
                                        <table border="" cellspacing="" cellpadding="" class="quotes-tabel coin-list">
                                           <thead>
                                               <th colspan="3" style="text-align: left;display:none;" class="quotes-window-tabel-header">{{__('market.main')}}</th>
                                           </thead>
                                                @foreach($trdeTypeList as $trade)
                                               <tr data-symbol="{{$trade['sellShortName']}}_{{$trade['buyShortName']}}" data-symbol-id="{{$trade['id']}}" type="{{$trade['type']}}" symbol="{{$trade['id']}}" class="{{$trade['sellShortName']}}_{{$trade['buyShortName']}} {{$trade['sellShortName']}}{{$trade['buyShortName']}}" data-status="{{$trade['isShare']}}">
                                                   <td class="quotes-item-box-wrap">
                                                       <span class="trade-symbol">
                                                       {{strtoupper($trade['sellShortName']) }}
                                                       </span>
                                                       {{--<div class="quotes-item-box">--}}
                                                           {{--<h2>以太坊</h2>--}}
                                                           {{--<p>以太坊（Ethereum）是下一代密码学账本，可以支持众多的高级功能，包括用户发行货币，智能协议，去中心化的交易等。</p>--}}
                                                           {{--<div class="quotes-item-box-btn">--}}
                                                               {{--<a href="assets_list.html">了解更多</a>--}}
                                                           {{--</div>--}}
                                                       {{--</div>--}}
                                                   </td>
                                                   <td class="trade-price">000.00</td>
                                                   <td class="trade-rate success">+0.00%</td>
                                               </tr>
                                                    @endforeach

                                        </table>

                         <!------------------ 创新区 ----------------->

                                        {{--<table border="" cellspacing="" cellpadding="" class="quotes-tabel">--}}
                                           {{--<tr>--}}
                                               {{--<th colspan="3" style="text-align: left;" class="quotes-window-tabel-header">创新区</th>--}}
                                           {{--</tr>--}}
                                               {{--<tr>--}}
                                                   {{--<td class="quotes-item-box-wrap">--}}
                                                       {{--ZEC--}}
                                                       {{--<div class="quotes-item-box">--}}
                                                           {{--<h2>以太坊</h2>--}}
                                                           {{--<p>以太坊（Ethereum）是下一代密码学账本，可以支持众多的高级功能，包括用户发行货币，智能协议，去中心化的交易等。</p>--}}
                                                           {{--<div class="quotes-item-box-btn">--}}
                                                               {{--<a href="assets_list.html">了解更多</a>--}}
                                                           {{--</div>--}}
                                                       {{--</div>--}}
                                                   {{--</td>--}}
                                                   {{--<td>473.99</td>--}}
                                                   {{--<td class="success">+0.84%</td>--}}
                                               {{--</tr>--}}
                                               {{----}}
                                        {{--</table>--}}
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="coin-introduce" style="margin-top: 10px;color: white;">
                                <div class="introduce-window-header white">币种资料</div>
                                <h2 class="introduce-coin-name white">{{isset($coinInfo['nameZh']) ? $coinInfo['nameZh']:'-'}}</h2>
                                <p class="introduce-coin-detail dark">
                                    {{isset($coinInfo['info']) ? $coinInfo['info']:'-'}}
                                </p>
                                <div class="introduce-other">
                                    <div class="introduce-item">
                                        <span class="introduce-item-name">
                                            发行时间
                                        </span>
                                        <span class="introduce-item-value">
                                            {{--{{isset($coinInfo['gmtRelease']) ? $coinInfo['gmtRelease']:'-'}}--}}
                                            -
                                        </span>
                                    </div>

                                    <div class="introduce-item">
                                        <span class="introduce-item-name">
                                            发行价格
                                        </span>
                                        <span class="introduce-item-value">
                                            {{isset($coinInfo['price']) ? $coinInfo['price']:'-'}}
                                        </span>
                                    </div>

                                    <div class="introduce-item">
                                        <span class="introduce-item-name">
                                            流通总量
                                        </span>
                                        <span class="introduce-item-value">
                                            {{isset($coinInfo['circulation']) ? $coinInfo['circulation']:'-'}}
                                        </span>
                                    </div>

                                    <div class="introduce-item">
                                        <span class="introduce-item-name">
                                            发行总量
                                        </span>
                                        <span class="introduce-item-value">
                                            {{isset($coinInfo['total']) ? $coinInfo['total']:'-'}}
                                        </span>
                                    </div>

                                    {{--<div class="introduce-item">--}}
                                    {{--<span class="introduce-item-name">--}}
                                    {{--白皮书--}}
                                    {{--</span>--}}
                                    {{--<span class="introduce-item-value">--}}
                                    {{--<a href="{{isset($coinInfo['linkWebsite']) ? $coinInfo['linkWebsite']:'javascript:void(0)'}}">{{isset($coinInfo['linkWebsite']) ? $coinInfo['linkWebsite']:'-'}}</a>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}

                                    <div class="introduce-item">
                                        <span class="introduce-item-name">
                                            区块查询
                                        </span>
                                        <span class="introduce-item-value">
                                            <a href="{{isset($coinInfo['linkBlock']) ? $coinInfo['linkBlock']:'javascript:void(0)'}}">{{isset($coinInfo['linkBlock']) ? $coinInfo['linkBlock']:'-'}}</a>
                                        </span>
                                    </div>

                                    <div class="introduce-item">
                                        <span class="introduce-item-name">
                                            官网地址
                                        </span>
                                        <span class="introduce-item-value">
                                            <a href="{{isset($coinInfo['linkWebsite']) ? $coinInfo['linkWebsite']:'javascript:void(0)'}}">{{isset($coinInfo['linkWebsite']) ? $coinInfo['linkWebsite']:'-'}}</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

<!---------------------------------- 主体内容 ------------------------>

                        <div class="quotes-data">
                            <div class="quotes-data-kgraph-wrap">
                                <div class="clearfix quotes-kgraph-header quotes-header">
                                    <button class="iconfont icon-xia1 left"></button>
                                    <h2 class="left quotes-header-tetil">
                                        <span id="tip-sell-buy">{{strtoupper($tradeType['sellShortName'])}}/{{strtoupper($tradeType['buyShortName'])}}</span>
                                        <span id="tip-price"></span>
                                    </h2>
                                    <p class="left quotes-header-text">
                                        ≈
                                        <span id="tip-cny"></span>
                                        <span id="zf">{{__('market.zf')}}<strong class="success">+0.85%</strong></span>
                                        <span id="high">{{__('market.high')}} 18000.00</span>
                                        <span id="low">{{__('market.low')}}17150.00</span>
                                        <span id="vol">24H{{__('market.volume')}} 8306 BTC</span>
                                    </p>
                                </div>

                         <!------------- k线图 ------------------->

                                <div class="quotes-data-kgraph" >
                                    <div style="height: 720px;background-color: #181B2A">
                                        <div id="div-tradeview-chart" class="kline">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!------------------- 交易区 ---------------->

                            <div class="clearfix quotes-transaction" style="height:510px;">
                                <div class="left quotes-transaction-area">
                                    <div class="clearfix quotes-transaction-header">
                                        <h2>{{__('market.money')}}</h2>
                                        <a href="{{ route('help',['id'=>3]) }}">{{__('market.fee')}}</a>
                                    </div>
                                    <div class="clearfix quotes-transaction-box">

                            <!-------------------- 登录后 ------------->

                                        <div class="quotes-transaction-box-item">
                                            <div class="sell-trade">
                                                <div class="sell-tetil">
                                                    <h2 style="color:#fff; font-size:.14rem;">可用
                                                        <span id="tradeBuyInt">0</span>
                                                        <span id="tradeBuyDig">.0000</span>
                                                        <span style="color:#fff;">{{$tradeType['buyShortName']}}</span>

                                                    </h2>
                                                    <a href="{{route('coinDeposit')}}">充币</a>
                                                </div>
                                                <div class="sell-item">
                                                    <h3 class="sell-item-tetil">
                                                        {{__('market.buyPrice')}}
                                                        <strong>
                                                            {{__('market.bestBuyPrice')}}：
                                                            <font><span id="best-buy"></span>{{$tradeType['buyShortName']}}</font>
                                                        </strong>
                                                    </h3>
                                                    <div class="sell-item-text">
                                                        <div class="sell-item-form">
                                                            <input type="text" id="tradebuyprice"/>
                                                        </div>
                                                        <p id="tradebuyprice-cny">≈0.00 CNY</p>
                                                    </div>
                                                </div>
                                                <div class="sell-item">
                                                    <h3 class="sell-item-tetil">
                                                        {{__('market.buyNumber')}}
                                                        {{--<strong>--}}
                                                            {{--{{__('market.buyLarge')}}：--}}
                                                            {{--<font><span>{{$tradeType['sellShortName']}}</span></font>--}}
                                                        {{--</strong>--}}
                                                    </h3>
                                                    <div class="sell-item-form">
                                                        <input type="text" id="tradebuyamount" />
                                                    </div>
                                                </div>
                                                <div class="sell-item" style="padding: 0px; color: white;">
                                                    <div class="slider sell-item-slider" id="buyslider" ></div>
                                                </div>
                                                <div class="sell-item">
                                                    <div class="sell-item-num" style="color: white;" >
                                                        {{__('market.tradeNumber')}} <span id="tradebuyTurnover">0.0000</span><span>{{$tradeType['buyShortName']}}</span>
                                                        <p id="buy-errortips" class="error-tips" style="color:red;"> </p>
                                                    </div>
                                                </div>
                                                <div class="sell-item">
                                                    <div class="sell-item-btn">
                                                        <button class="transaction-model-show" id="buybtn">{{__('market.buy')}}{{$tradeType['sellShortName']}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                            <!-------------------- 未登录 ------------->

                                        <div class="quotes-transaction-box-item">
                                            <div class="sell-trade">
                                                <div class="sell-tetil">
                                                    <h2 style="color:#fff;font-size:.14rem;">可用
                                                        <span id="tradeCoinInt"">0</span>
                                                        <span id="tradeCoinDig">.0000</span>
                                                        <span style="color:#fff;">{{$tradeType['sellShortName']}}</span>

                                                    </h2>
                                                    <a href="{{route('coinDeposit')}}">充币</a>

                                                </div>
                                                <div class="sell-item">
                                                    <h3 class="sell-item-tetil">
                                                        {{__('market.sellPrice')}}
                                                        <strong>
                                                            {{__('market.bestSellPrice')}}：
                                                            <font> <span id="best-sell"></span>{{$tradeType['buyShortName']}}</font>
                                                        </strong>
                                                    </h3>
                                                    <div class="sell-item-text">
                                                        <div class="sell-item-form">
                                                            <input type="text" id="tradesellprice"/>
                                                        </div>
                                                        <p id="tradesellprice-cny">≈0.00 CNY</p>
                                                    </div>
                                                </div>
                                                <div class="sell-item">
                                                    <h3 class="sell-item-tetil">
                                                        {{__('market.sellNumber')}}
                                                        {{--<strong>--}}
                                                            {{--{{__('market.sellLarge')}}：--}}
                                                            {{--<font>{{$tradeType['sellShortName']}}</font>--}}
                                                        {{--</strong>--}}
                                                    </h3>
                                                    <div class="sell-item-form">
                                                        <input type="text" name="tradesellamount" autocomplete="off" id="tradesellamount"/>
                                                    </div>
                                                </div>
                                                <div class="sell-item" style="padding: 0px; color: white;">
                                                    {{--circles-slider--}}
                                                    <input style="display:none">
                                                    <div class="slider sell-item-slider" id="sellslider" ></div>
                                                </div>
                                                <div class="sell-item">
                                                    <div class="sell-item-num" style="color:white;">
                                                        {{__('market.tradeNumber')}} <span  id="tradesellTurnover">0.0000</span>{{$tradeType['buyShortName']}}
                                                        <p id="sell-errortips" class="error-tips" style="color:red;"> </p>
                                                    </div>
                                                </div>
                                                <div class="sell-item">
                                                    <div class="sell-item-btn">
                                                        <button style="background: #AE4E54;" class="transaction-model-show" id="sellbtn">{{__('market.sell')}}{{$tradeType['sellShortName']}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="left quotes-transaction-tabel-wrap">
                                    <div class="quotes-transaction-tabel">
                                        <div class="quotes-tabel-header">
                                            <h2 id="header-text"></h2>
                                        </div>

                                <!------------  卖出的列表  ----------------->

                                        <div class="quotes-transaction-tabel-data">
                                            <dl class="quotes-transaction-tabel-body">
                                            	   <dt class="quotes-transaction-tabel-tetil">
                                            	       <span class="tetil"></span>
                                            	       <span class="price" id="inner-price">{{__('market.price')}}({{$tradeType['buyShortName']}})</span>
                                            	       <span class="amount" id="inner-amount">{{__('market.number')}}({{$tradeType['sellShortName']}})</span>
                                            	       <span id="inner-sum">{{__('market.accu')}}({{$tradeType['sellShortName']}})</span>
                                            	   </dt>
                                            	   <dd class="quotes-transaction-tabel-item cell">
                                            	       <div class="inner">
                                            	           <span class="color-sell">{{__('market.sells')}} 7</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                            	           <b class="color-sell-bg" style="width: 30%;"></b>
                                            	       </div>
                                            	   </dd>
                                            	   <dd class="quotes-transaction-tabel-item cell">
                                            	       <div class="inner">
                                            	           <span class="color-sell">{{__('market.sells')}} 6</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                            	           <b class="color-sell-bg" style="width: 40%;"></b>
                                            	       </div>
                                            	   </dd>
                                            	   <dd class="quotes-transaction-tabel-item cell">
                                            	       <div class="inner">
                                            	           <span class="color-sell">{{__('market.sells')}} 5</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                            	           <b class="color-sell-bg" style="width: 25%;"></b>
                                            	       </div>
                                            	   </dd>
                                            	   <dd class="quotes-transaction-tabel-item cell">
                                            	       <div class="inner">
                                            	           <span class="color-sell">{{__('market.sells')}} 4</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                            	           <b class="color-sell-bg" style="width: 10%;"></b>
                                            	       </div>
                                            	   </dd>
                                            	   <dd class="quotes-transaction-tabel-item cell">
                                            	       <div class="inner">
                                            	           <span class="color-sell">{{__('market.sells')}} 3</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                            	           <b class="color-sell-bg" style="width: 5%;"></b>
                                            	       </div>
                                            	   </dd>
                                            	   <dd class="quotes-transaction-tabel-item cell">
                                            	       <div class="inner">
                                            	           <span class="color-sell">{{__('market.sells')}} 2</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                            	           <b class="color-sell-bg" style="width: 90%;"></b>
                                            	       </div>
                                            	   </dd>
                                            	   <dd class="quotes-transaction-tabel-item cell">
                                            	       <div class="inner">
                                            	           <span class="color-sell">{{__('market.sells')}} 1</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                            	           <b class="color-sell-bg" style="width: 30%;"></b>
                                            	       </div>
                                            	   </dd>
                                            </dl>

                                   <!------------- 买入的列表 ------------->

                                            <div class="quotes-transaction-tabel-box">
                                                <dl class="quotes-transaction-tabel-body">
                                                	   <dd class="quotes-transaction-tabel-item cell">
                                                       <div class="inner">
                                                           <span class="color-buy">{{__('market.buys')}} 1</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                                           <b class="color-buy-bg" style="width: 30%;"></b>
                                                       </div>
                                                   </dd>
                                                	   <dd class="quotes-transaction-tabel-item cell">
                                                       <div class="inner">
                                                           <span class="color-buy">{{__('market.buys')}} 2</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                                           <b class="color-buy-bg" style="width: 30%;"></b>
                                                       </div>
                                                   </dd>
                                                	   <dd class="quotes-transaction-tabel-item cell">
                                                       <div class="inner">
                                                           <span class="color-buy">{{__('market.buys')}} 3</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                                           <b class="color-buy-bg" style="width: 30%;"></b>
                                                       </div>
                                                   </dd>
                                                	   <dd class="quotes-transaction-tabel-item cell">
                                                       <div class="inner">
                                                           <span class="color-buy">{{__('market.buys')}} 4</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                                           <b class="color-buy-bg" style="width: 30%;"></b>
                                                       </div>
                                                   </dd>
                                                	   <dd class="quotes-transaction-tabel-item cell">
                                                       <div class="inner">
                                                           <span class="color-buy">{{__('market.buys')}} 5</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                                           <b class="color-buy-bg" style="width: 30%;"></b>
                                                       </div>
                                                   </dd>
                                                	   <dd class="quotes-transaction-tabel-item cell">
                                                       <div class="inner">
                                                           <span class="color-buy">{{__('market.buys')}} 6</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                                           <b class="color-buy-bg" style="width: 30%;"></b>
                                                       </div>
                                                   </dd>
                                                	   <dd class="quotes-transaction-tabel-item cell">
                                                       <div class="inner">
                                                           <span class="color-buy">{{__('market.buys')}} 7</span>
                                                           <span></span>
                                                           <span></span>
                                                           <span></span>
                                                           <b class="color-buy-bg" style="width: 30%;"></b>
                                                       </div>
                                                   </dd>
                                                </dl>

                                     <!--------------- 表格尾部 ------------->

                                                {{--<div class="clearfix quotes-transaction-footer">--}}
                                                    {{--<div class="quotes-transaction-nav">--}}
                                                        {{--<p class="quotes-transaction-nav-text">--}}
                                                            {{--深度--}}
                                                            {{--<span>0.000001</span>--}}
                                                            {{--<i class="iconfont icon-xia"></i>--}}
                                                        {{--</p>--}}
                                                        {{--<ul class="quotes-transaction-nav-box">--}}
                                                            {{--<li class="quotes-transaction-navbar">0.000001</li>--}}
                                                            {{--<li class="quotes-transaction-navbar">0.00001</li>--}}
                                                            {{--<li class="quotes-transaction-navbar">0.0001</li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                    {{--<a href="order.html" class="quotes-transaction-footer-btn">更多</a>--}}
                                                {{--</div>--}}
                                            </div>

                                            <div class="clearfix quotes-transaction-footer">
                                                <div class="quotes-transaction-nav">
                                                    {{--<p class="quotes-transaction-nav-text" s">--}}
                                                        {{--深度--}}
                                                        {{--<span>0.000001</span>--}}
                                                        {{--<i class="iconfont icon-xia"></i>--}}
                                                    {{--</p>--}}
                                                    {{--<ul class="quotes-transaction-nav-box">--}}
                                                        {{--<li class="quotes-transaction-navbar">0.000001</li>--}}
                                                        {{--<li class="quotes-transaction-navbar">0.00001</li>--}}
                                                        {{--<li class="quotes-transaction-navbar">0.0001</li>--}}
                                                    {{--</ul>--}}
                                                </div>
                                                <a href="{{route('order',['sb'=>$sb,'type'=>$type,'symbol'=>$symbol,'plat'=>$isPlatformStatus])}}" class="quotes-transaction-footer-btn">更多</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        <!----------------------- 当前委托及委托记录 ---------------->
                        <!----------------------- 登录后显示 ---------------->

                        <!----------------------- 当前委托 ------------------>

                            <div class="clearfix quotes-transaction" id="ensureButton" style="margin-top: 6px;">
                                <div class="clearfix  quotes-header quotes-intrust-header">
                                    <button class="iconfont icon-xia1 left"></button>
                                    <h2 class="left quotes-header-tetil quotes-sgraph-tetil">{{__('market.entrust')}}</h2>
                                    <div class="quotes-header-nav-wrap">
                                        <ul class="quotes-header-nav">
                                            <li class="quotes-header-navbar active encur-tab" data-id="ensure-buy">
                                                <button>{{__('market.buy')}}</button>
                                            </li>
                                            <li class="quotes-header-navbar encur-tab" data-id="ensure-sell">
                                                <button>{{__('market.sell')}}</button>
                                            </li>
                                            <li class="quotes-header-navbar encur-tab" data-id="ensure-all">
                                                <button>{{__('market.all')}}</button>
                                            </li>
                                        </ul>
                                    </div>
                                 </div>
                                 <div class="quotes-intrust-wrap">
                                     <div class="quotes-intrust">

                                         <table class="quotes-intrust-list ensure-table" id="ensure-buy">
                                             <thead>
                                                 <tr class="quotes-intrust-list-header">
                                                     <th>{{__('market.time')}}</th>
                                                     <th>{{__('market.trade')}}</th>
                                                     <th>{{__('market.turn')}}</th>
                                                     <th>{{__('market.price')}}({{$tradeType['buyShortName']}})</th>
                                                     <th>{{__('market.number')}}({{$tradeType['sellShortName']}}）</th>
                                                     <th>{{__('market.enTotal')}}({{$tradeType['buyShortName']}})</th>
                                                     <th>{{__('market.turnover')}}</th>
                                                     <th>{{__('market.over')}}</th>
                                                     <th>{{__('market.opera')}}</th>
                                                 </tr>
                                             </thead>
                                         	<tbody id="ensure-buy-data">
                                         	   <!----------- 无记录 ------------>

                                         	</tbody>
                                         </table>

                                         <table class="quotes-intrust-list ensure-table" id="ensure-sell" style="display: none;">
                                             <thead>
                                             <tr class="quotes-intrust-list-header">
                                                 <th>{{__('market.time')}}</th>
                                                 <th>{{__('market.trade')}}</th>
                                                 <th>{{__('market.turn')}}</th>
                                                 <th>{{__('market.price')}}（{{$tradeType['buyShortName']}}）</th>
                                                 <th>{{__('market.number')}}（{{$tradeType['sellShortName']}}）</th>
                                                 <th>{{__('market.enTotal')}}({{$tradeType['buyShortName']}})</th>
                                                 <th>{{__('market.turnover')}}</th>
                                                 <th>{{__('market.over')}}</th>
                                                 <th>{{__('market.opera')}}</th>
                                             </tr>
                                             </thead>
                                             <tbody id="ensure-sell-data">
                                             <!----------- 无记录 ------------>

                                             </tbody>
                                         </table>

                                         <table class="quotes-intrust-list ensure-table" id="ensure-all" style="display: none;">
                                             <thead>
                                             <tr class="quotes-intrust-list-header">
                                                 <th>{{__('market.time')}}</th>
                                                 <th>{{__('market.trade')}}</th>
                                                 <th>{{__('market.turn')}}</th>
                                                 <th>{{__('market.price')}}（{{$tradeType['buyShortName']}}）</th>
                                                 <th>{{__('market.number')}}（{{$tradeType['sellShortName']}}）</th>
                                                 <th>{{__('market.enTotal')}}({{$tradeType['buyShortName']}})</th>
                                                 <th>{{__('market.turnover')}}</th>
                                                 <th>{{__('market.over')}}</th>
                                                 <th>{{__('market.opera')}}</th>
                                             </tr>
                                             </thead>
                                             <tbody id="ensure-all-data">
                                             <!----------- 无记录 ------------>

                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                            </div>


                        <!------------------------ 委托记录 ------------------>

                            <div class="clearfix quotes-transaction js-action-enhis">
                                <div class="clearfix  quotes-header quotes-intrust-header">
                                    <button class="iconfont icon-xia1 left"></button>
                                    <h2 class="left quotes-header-tetil ">{{__('market.enHis')}}</h2>
                                    <div class="quotes-header-nav-wrap">
                                        <ul class="quotes-header-nav">
                                            <li class="quotes-header-navbar active enhis-tab" data-id="enhis-buy">
                                                <button>{{__('market.buy')}}</button>
                                            </li>
                                            <li class="quotes-header-navbar enhis-tab" data-id="enhis-sell">
                                                <button>{{__('market.sell')}}</button>
                                            </li>
                                            <li class="quotes-header-navbar enhis-tab" data-id="enhis-all">
                                                <button>{{__('market.all')}}</button>
                                            </li>
                                        </ul>
                                    </div>
                                 </div>
                                 <div class="quotes-intrust-wrap">
                                     <div class="quotes-intrust">
                                         <table class="quotes-intrust-list enhis-table" id="enhis-buy">
                                             <thead>
                                                <tr class="quotes-intrust-list-header">
                                                    <th>{{__('market.time')}}</th>
                                                    <th>{{__('market.trade')}}</th>
                                                    <th>{{__('market.turn')}}</th>
                                                    <th>{{__('market.price')}}（{{$tradeType['buyShortName']}}）</th>
                                                    <th>{{__('market.number')}}（{{$tradeType['sellShortName']}}）</th>
                                                    <th>{{__('market.enTotal')}}({{$tradeType['buyShortName']}})</th>
                                                    <th>{{__('market.turnover')}}</th>
                                                    <th>{{__('market.over')}}</th>
                                                    <th>{{__('market.opera')}}</th>
                                             </tr>
                                             </thead>
                                            <tbody id="enhis-buy-data">
                                               <!----------- 无记录 ------------>

                                            </tbody>
                                         </table>

                                         <table class="quotes-intrust-list enhis-table" id="enhis-sell" style="display: none;">
                                             <thead>
                                             <tr class="quotes-intrust-list-header">
                                                 <th>{{__('market.time')}}</th>
                                                 <th>{{__('market.trade')}}</th>
                                                 <th>{{__('market.turn')}}</th>
                                                 <th>{{__('market.price')}}（{{$tradeType['buyShortName']}}）</th>
                                                 <th>{{__('market.number')}}（{{$tradeType['sellShortName']}}）</th>
                                                 <th>{{__('market.enTotal')}}({{$tradeType['buyShortName']}})</th>
                                                 <th>{{__('market.turnover')}}</th>
                                                 <th>{{__('market.over')}}</th>
                                                 <th>{{__('market.opera')}}</th>
                                             </tr>
                                             </thead>
                                             <tbody id="enhis-sell-data">
                                             <!----------- 无记录 ------------>

                                             </tbody>
                                         </table >

                                         <table class="quotes-intrust-list enhis-table" id="enhis-all" style="display: none;">
                                             <thead>
                                             <tr class="quotes-intrust-list-header">
                                                 <th>{{__('market.time')}}</th>
                                                 <th>{{__('market.trade')}}</th>
                                                 <th>{{__('market.turn')}}</th>
                                                 <th>{{__('market.price')}}</th>
                                                 <th>{{__('market.number')}}</th>
                                                 <th>{{__('market.enTotal')}}</th>
                                                 <th>{{__('market.turnover')}}</th>
                                                 <th>{{__('market.over')}}</th>
                                                 <th>{{__('market.opera')}}</th>
                                             </tr>
                                             </thead>
                                             <tbody id="enhis-all-data">
                                             <!----------- 无记录 ------------>

                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                            </div>



                        <!----------------------- 深度图及实时成交  ----------------->

                            <div class="clearfix quotes-transaction">

                                <!---------------- 深度图 -------------------->
                                <div class="left quotes-sgraph">
                                    <div class="clearfix  quotes-header quotes-sgraph-header">
                                        <button class="iconfont icon-xia1 left"></button>
                                        <h2 class="left quotes-header-tetil quotes-sgraph-tetil">{{__('market.deepth')}}</h2>
                                    </div>
                                    <div class="quotes-sgraph-box" >
                                        <div id="depth-chart" style="width: 100%;height: 485px;background-color:#181B2A">

                                        </div>
                                    </div>
                                </div>

                               <!-------------- 实时成交表 ----------------------->

                               <div class="left quotes-deal-wrap">
                                   <div class="quotes-deal">
                                       <div class="clearfix  quotes-header quotes-deal-header">
                                            <button class="iconfont icon-xia1 left"></button>
                                            <h2 class="left quotes-header-tetil quotes-sgraph-tetil">{{__('market.intime')}}</h2>
                                        </div>
                                        <div class="quotes-deal-list-wrap">
                                            <table class="quotes-deal-list" id="realTimeTrade">
                                               <tr class="quotes-deal-item">
                                                   <td>{{__('market.time')}}</td>
                                                   <td>{{__('market.turn')}}</td>
                                                   <td class="real-trade-price">{{__('market.price')}}({{$tradeType['buyShortName']}})</td>
                                                   <td class="real-trade-mount">{{__('market.number')}}({{$tradeType['sellShortName']}})</td>
                                               </tr>
                                           </table>
                                        </div>

                                   </div>

                               </div>

                            </div>

                        </div>
                </div>

            </div>
        </div>
        <!--交易密码-->
        <div class="model" style="display: none;" id="tradepass">
            <div class="model-body">
                <div class="model-form-header clearfix">
                    <div class="model-form-tetil">
                        <h2>{{__('market.tradePassword')}}</h2>
                    </div>
                    <div class="model-hide">
                        <button class="iconfont icon-guanbi"></button>
                    </div>
                </div>
                <div class="model-form-body">
                    <div class="model-form-item" >
                        <label for="">
                            <input type="password"  id="tradePwd" autocomplete="off" placeholder="{{__('market.enterPassword')}}"/>
                        </label>
                    </div>
                    <div class="model-form-item">
                        <span id="errortips"></span>
                    </div>
                    <div class="model-form-item">
                        <button class="model-form-btn" id="modalbtn" style="width: 150px;color: #fff;background-color: #EA5B25;">{{__('market.submit')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!--委托历史详情-->
        <div class="model" id="entrustsdetail">
            <div class="model-body">
                <div class="model-form-header clearfix">
                    <div class="model-form-tetil">
                        <h2 class="js-entrust-title"></h2>
                    </div>
                    <div class="model-hide">
                        <button class="iconfont icon-guanbi"></button>
                    </div>
                </div>
                <div class="model-form-body js-entrust-body" style="padding: 20px 20px;">

                </div>
            </div>
        </div>
        <!--委托历史详情结束-->

        <input type="hidden" id="sellShortName" value="{{$tradeType['sellShortName']}}">
        <input type="hidden" id="buyShortName" value="{{$tradeType['buyShortName']}}">
        <input type="hidden" id="hide-symbol" value="{{strtolower($tradeType['sellShortName'])}}_{{strtolower($tradeType['buyShortName'])}}">
        <input type="hidden" id="symbol" value="{{$tradeType['id']}}">
        <input type="hidden" id="kline-digit" value="{{$cnyDigit}}">
        @if($login)
         <input type="hidden" id="tradePassword" value="{{$tradePassword ? 'true' :''}}">
        <input type="hidden" id="isopen" value="{{$needTradePasswd ? 'true':'false'}}">
         <input type="hidden" id="isTelephoneBind" value="{{$isTelephoneBind ? 'true':'false'}}">
        @endif
        <input type="hidden" id="isPlatformStatus" value="{{$isPlatformStatus ? 'true':'false'}}">
        <input type="hidden" id="tradePrice" value="{{$tradeType['priceOffset']}}">
        <input type="hidden" id="tradeAmount" value="{{$tradeType['amountOffset']}}">

        <input type="hidden" id="login" value="{{$login ? 'true':'false'}}">
        <input type="hidden" id="tradeType" value="">
        <input type="hidden" id="tradeBuyCoin" value="0">
        <input type="hidden" id="tradeSellCoin" value="0">
        <script>
            window.easemobim = window.easemobim || {};
            easemobim.config = {
                configId: 'febe78e0-06fc-45a3-9c2d-2f5e40088dbf',
                buttonText: '联系客服',
                dialogWidth: '600px',
                dialogHeight: '550px',
                dialogPosition: { x: '10px', y: '10px' }
            };
        </script>
        <script src='//kefu.easemob.com/webim/easemob.js'></script>

        <div class="container-fluid terminal-wrap" style="background-color:#181B2A;margin-top:10px">
            <div class="container">
                <div class="row hot-coin-info-intro" style="color:#fff">
                    <div class="col-xs-3">
                        <div style="margin-top:10px;"><img src="{{asset('img/imgNew/LOGO@2x.png')}}"></div>
                        <div  class="hot-coin-imgl-list">
                            <img src="{{asset('img/imgNew/MFB.png')}}">
                            <img src="{{asset('img/imgNew/MTW.png')}}">
                            <img src="{{asset('img/imgNew/MWB.png')}}">
                            <img src="{{asset('img/imgNew/MWX.png')}}">
                            <img src="{{asset('img/imgNew/MFX.png')}}">
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
                            <a href="{{route('online')}}" style="display:block;width:100%;background:#33384E;border-radius:5px">
                                <img src="{{asset('img/imgNew/MPH.png')}}" style="position:relative;top:-2px;left:-5px;width:22px;height:22px">
                                <span style="height:23px;line-height:23px;color:#fff">{{ __('head.online-service') }}</span>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
<!--        <div class="container-fluid footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 footer-nav">
                        <ul class="clearfix">
                            <li class="left footer-nav-navbar">
                                <a href="{{ route('help',['id'=>53]) }}">{{ __('head.contact') }}</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="{{ route('help',['id'=>2]) }}">{{ __('head.about') }}</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="{{ route('help',['id'=>5]) }}">{{ __('head.law') }}</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="{{ route('help',['id'=>1]) }}">{{ __('head.help') }}</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="{{ route('help',['id'=>57]) }}">{{ __('head.business') }}</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="{{route('online')}}">{{ __('head.answer') }}</a>
                            </li>
                            <li class="left footer-nav-navbar">
                                <a href="{{ route('help',['id'=>3]) }}">{{ __('head.rate') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 footer-num">
                        <p>©2017-2018 hotcoin.top</p>
                    </div>
                </div>
            </div>
        </div>-->


        <script type="text/javascript">
            $(".area-btns-item a").on({
                click:function(){
                    $(".area-btns-item a").removeClass("active");
                    $(this).addClass("active");
                }
            })
        </script>

        <script src="{{ asset('js/comm/exchangeRate.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/plugin/layer/layer.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/comm/util.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/comm/comm.js') }}" type="text/javascript" charset="utf-8"></script>
        @if (!isset($_COOKIE['oex_lan']) || $_COOKIE['oex_lan'] =='zh_TW')
            <script src="{{ asset('js/language/language_zh_TW.js') }}" type="text/javascript" charset="utf-8"></script>
        @else
            <script src="{{ asset('js/language/language_en_US.js') }}" type="text/javascript" charset="utf-8"></script>
        @endif
        <script src="{{asset('js/mqttws31.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/config.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/crypto-js/crypto-js.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/markt/HandleMarketnewMqtt.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/markt/trademarket2new.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('charting_library/charting_library.min.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/hot-tradeview.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('datafeeds/udf/datafeed.js') }}" type="text/javascript" charset="utf-8"></script>

        {{--<script src="{{ asset('/js/plugin/jquery.jslider.js') }}" type="text/javascript" charset="utf-8"></script>--}}
        <script src="{{asset('js/plugin/swiper/swiper.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
        	       $(".quotes-search-btn").on({
        	           click:function(){
        	               if($(this).hasClass("active")){
        	                   $(this).removeClass("active");
        	                   $(this).css("color","#474A59");
        	               }else{
        	                   $(this).addClass("active");
        	                   $(this).css("color","#E64021");
        	               }
        	           }
        	       })



        	       $(".quotes-list-header").on({
        	           click:function(){
        	               $(this).siblings(".quotes-list-header").children("i").removeClass();
        	               var _data = $(this).children("i");
        	               if(_data.hasClass("quotes-list-header-dase")){
        	                   _data.removeClass("quotes-list-header-dase").addClass("quotes-list-header-ase");
        	               }else if(_data.hasClass("quotes-list-header-ase")){
        	                   _data.addClass("quotes-list-header-dase").removeClass("quotes-list-header-ase");
        	               }else{
        	                   _data.addClass("quotes-list-header-dase");
        	               }
        	           }
        	       })


        </script>
        <script type="text/javascript">
            $(".slider").slider({
                    min: 0,
                    max: 100,
                    step: 20,
                    classes:{
                        "ui-slider":"ui-info",
                        "ui-slider-handle":"ui-info-handle",
                        "ui-slider-pip": "ui-info-range"
                    },
                    orientation: "horizontal",
                    range: "min",
                    change: _slider_data
                }).slider("pips");

            function _slider_data(){
                var _left = $(this).slider("value");
                var tag = $(this).attr('id')=='buyslider' ? 0:1;
                trade.onPortion(_left, tag);
                $(this).siblings(".sell-item-tetil").children("span").html(_left + "%")
            }

            //公告轮播
            var swiper_enroll = new Swiper('.js-swiper-container-enroll', {
                direction: 'vertical',
                loop: true,
                autoplay: {
                    delay:2000,
                },
                autoplayDisableOnInteraction: false,
            });
            $('.scroll_show_more').click(function(){
                window.location.href="{{route('notice')}}?id=2";
                event.preventDefault();
            })
        </script>


	</body>
</html>
