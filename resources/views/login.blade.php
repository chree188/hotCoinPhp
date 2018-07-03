@extends('layouts/app')
@section('content')
	    <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->

<!--<div style="height: 863px;background-image:url({{asset('img/imgNew/login_bg.jpg')}})">-->
<div style="height: 863px;min-width:1240px;background-image:url({{asset('img/imgNew/login_bg.jpg')}})">
    <div class="container">
        <div class="row financial-wrap" style="width:500px;margin:50px auto;background-color:#fff" >
            <form class="hot-coin-form" style="width:350px;margin:0 auto;">
                <h2 class="" style="margin-top: 50px;width:350px;text-align:center">{{ __('login.welcome') }}{{ __('head.hotcoin') }}</h2>
                <h3 class="" style="width:350px">www.hotcoin.top</h3>
                <div class="hot-coin-form-item">
                    <span class="iconfont icon-zhuanghao hot-coin-common" ></span>
                    <label for="">
                        <input type="text" id="login-account" value="" placeholder="{{ __('login.phone') }}"/>
                    </label>
                </div>

                <div class="hot-coin-form-item">
                    <span class="iconfont icon-mima hot-coin-common" ></span>
                    <label for="">
                        <input type="password" id="login-password" value="" placeholder="{{ __('login.password') }}"/>
                    </label>
                </div>

                <div class="hot-coin-form-box">
                    <div class="left form-search">
                        <label>
                            <input type="checkbox" id="remember" value="" />
                            {{ __('login.remember') }}
                        </label>
                    </div>
                    <div class="right back-psd-btn">
                        <a href="{{ route('resetEmail') }}">{{ __('login.forget') }}</a>
                    </div>
                </div>

                <div class="hot-coin-form-btn" >
                    <a href="javascript:void(0)" id="login-submit" style="display:block" >{{ __('login.login') }}</a>
                </div>

                <div class="hot-coin-form-hint">
                    <p>{{ __('login.account') }}<a href="{{ route('register') }}">{{ __('login.reg') }}</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/user/login.js') }}" type="text/javascript" charset="utf-8"></script>
@endsection


