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
        <link rel="stylesheet" type="text/css" href="/iconfont/iconfont.css" />
        <link rel="stylesheet" type="text/css" href="/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="/css/custom.css" />
        <script src="/js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/iconfont/iconfont.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
	    <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->
        <div class="container-fluid loging">
            <div class="row loging-header">
                <div class="col-xs-12 loging-header-logo">
                    <a href="{{route('main')}}" class=""></a>
                </div>
            </div>
            <div class="row loging-body">
                <div class="col-xs-12">
                    <div class="loging-body-box">
                        <h2 class="loging-body-tetil">{{__('vail.first-reset')}}</h2>
                        <div class="form-wrap">
                            <form class="form">
                                <input type="hidden" id="fid" value="{{$fuser['fid']}}">
                                <input type="hidden" id="uuid" value="{{$uuid}}">
                                <div class="form-item">
                                    <span class="iconfont icon-zhuanghao"></span>
                                    <label for="">
                                        <input id="reset-loginname" readonly value="{{$fuser['floginname']}}" >
                                    </label>

                                </div>

                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="text" id="reset-googlecode" value="" placeholder="{{__('vail.first-place4')}}"/>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="password" id="reset-newpass" value="" placeholder="{{__('vail.first-place5')}}"/>
                                    </label>
                                </div>
                                <div class="form-item">
                                    <span class="iconfont icon-mima"></span>
                                    <label for="">
                                        <input type="password"  id="reset-confirmpass" value="" placeholder="{{__('vail.first-place6')}}"/>
                                    </label>
                                </div>
<!----------------------------------- 错误提示 ---------------------------------->
                                <div class="form-item-hint">
                                    <p style="display: none;">{{__('vail.first-hint')}}</p>
                                </div>
                            </form>
                            <div class="form-btn">
                                <a href="javascript:void(0);" id="btn-email-success" style="display:block">{{__('vail.first-sure')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/plugin/layer/layer.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/comm/util.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="{{ asset('js/comm/comm.js') }}" type="text/javascript" charset="utf-8"></script>
        @if (!isset($_COOKIE['oex_lan']) || $_COOKIE['oex_lan'] =='zh_TW')
            <script src="{{ asset('js/language/language_zh_TW.js') }}" type="text/javascript" charset="utf-8"></script>
        @else
            <script src="{{ asset('js/language/language_en_US.js') }}" type="text/javascript" charset="utf-8"></script>

        @endif
        <script src="{{ asset('js/user/reset.js') }}" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
