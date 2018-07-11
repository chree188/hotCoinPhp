@extends('layouts/app')
@section('content')
	    <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->

<div style="height: 863px;min-width:1240px;background-image:url({{asset('img/imgNew/login_bg.jpg')}})">
    <div class="container">
        <div class="row financial-wrap" style="width:500px;margin:50px auto;background-color:#fff">
   <!--         <h2 class="" style="margin-top: 50px;">{{ __('login.welcome') }}热币网</h2>-->

            <form class="hot-coin-form">
                <h2 class="" style="margin-top: 50px;">{{ __('login.findpass') }}</h2>
                <h3 class="">www.hotcoin.top</h3>
                <div class="hot-coin-form-item">
                    <span class="iconfont icon-mima hot-coin-common" ></span>
                    <label for="">
                        <input type="text" id="reset-googlecode" value="" placeholder="{{__('vail.first-place4')}}"/>
                    </label>
                </div>

                <div class="hot-coin-form-item">
                    <span class="iconfont icon-mima hot-coin-common" ></span>
                    <label for="">
                        <input type="password" id="reset-newpass" value="" placeholder="{{__('vail.first-place5')}}"/>
                    </label>
                </div>

                <div class="hot-coin-form-item">
                    <span class="iconfont icon-mima hot-coin-common" ></span>
                    <label for="">
                        <input type="password" id="reset-confirmpass" value="" placeholder="{{__('vail.first-place6')}}"/>
                    </label>
                </div>
                <!----------------------------------- 错误提示 ---------------------------------->

                <div class="hot-coin-form-hint  form-item-hint" style="display:none">
                    <p >{{__('vail.first-hint')}}</p>
                </div>

                <div class="hot-coin-form-btn" style="margin-top:30px;margin-bottom:30px">
                    <a href="javascript:void(0)" id="btn-phone-success" style="display: block;">{{__('vail.first-sure')}}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
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
@endsection



