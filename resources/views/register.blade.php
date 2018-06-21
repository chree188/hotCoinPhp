@extends('layouts/app')
@section('content')
<!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->


<div style="height: 863px;min-width:1240px;background-image:url({{asset('img/imgNew/login_bg.jpg')}})">
    <div class="container" style="height:700px;">
        <div class="row financial-wrap" style="width:500px;margin:50px auto;background-color:#fff" >

            <form class="hot-coin-form" id="mail_form">
                <h2 class="" style="margin-top: 50px;">{{__('reg.welcome1')}}{{__('head.hotcoin')}}</h2>
                <h3 class="">www.hotcoin.top</h3>
                <div class="clearfix loging-body-nav" style="width: 350px;margin: 0 auto;">
                    @if(isset($intro))
                        <a href="{{ route('register',['intro'=>$intro]) }}" class="left active" id="mail_btn">{{__('reg.emailRegister')}}</a>
                        <a href="{{ route('phonereg',['intro'=>$intro]) }}" class="left" id="phone_btn">{{__('reg.phoneRegister')}}</a>
                    @else
                        <a href="{{ route('register') }}" class="left active" id="mail_btn">{{__('reg.emailRegister')}}</a>
                        <a href="{{ route('phonereg') }}" class="left" id="phone_btn">{{__('reg.phoneRegister')}}</a>
                    @endif
                </div>
                <input type="hidden" value="1" id="regType">
                <div class="hot-coin-form-item">
                    <span class="iconfont icon-youxiang hot-coin-common" ></span>
                    <label for="">
                        <input type="text" id="register-email" value="" placeholder="{{__('reg.place-email')}}"/>
                    </label>
                </div>

                <div class="hot-coin-form-item">
                    <span class="iconfont icon-mima hot-coin-common" ></span>
                    <label for="">
                        <input type="password" id="register-password" value="" placeholder="{{__('reg.place-password')}}"/>
                    </label>
                </div>
                <div class="hot-coin-form-item">
                    <span class="iconfont icon-mima hot-coin-common" ></span>
                    <label for="">
                        <input type="password" id="register-confirmpassword" value="" placeholder="{{__('reg.place-passwordC')}}"/>
                    </label>
                </div>
                <div class="hot-coin-form-item" style="position:relative">
                    <span class="iconfont icon-youxiangyanzheng hot-coin-common" ></span>
                    <label for="">
                        <input type="text" id="register-email-code" value="" placeholder="{{__('reg.place-codeE')}}"/>
                    </label>
                    <a type="button" id="register-sendemail"   style="display:inline-block;position:absolute;top:28px;right:16px;text-decoration: underline"
                            data-msg-type="203"  data-tipsid="register-email-code" class="form-item-btn  btn-sendemailcode">{{__('reg.getCode')}}</a>
                </div>

                <div class="hot-coin-form-item" style="position:relative">
                    <span class="iconfont icon-yanzhengma hot-coin-common" ></span>
                    <label for="">
                        <input type="text" id="register-imgcode" value="" style="width:220px" placeholder="{{__('reg.place-codeV')}}"/>
                    </label>
                    <a   style="display:inline-block;position:absolute;top:11px;right:3px;height:50px;text-decoration:underline"><img  class="btn-imgcode" alt="" style="height:48px" src="/vailImg.html" /></a>
                </div>

                <div class="hot-coin-form-item" style="display:none">
                    <span class="iconfont icon-mima hot-coin-common "></span>
                    <label for="">
                        <input type="text"  id="register-intro" value="" placeholder="{{__('reg.place-intro')}}" />
                    </label>
                </div>
                <!--邀请码-->
                @if(isset($intro))
                    <div class="form-item">
                        <span class="iconfont icon-mima hot-coin-common"></span>
                        <label for="">
                            <input type="text"  id="register-intro" value="{{$intro}}" placeholder="{{__('reg.place-intro')}}" />
                        </label>
                    </div>
                @endif
                <div class="hot-coin-form-box">
                    <div class="left form-search">
                        <label id="agreeBox">
                            <input type="checkbox"  id="agree" value="" />
                            {{__('reg.agree')}}<a  target="_blank" href="{{route('help',['id'=>4])}}" class="form-search-btn">{{__('reg.agreement')}}</a>
                        </label>
                    </div>
                </div>

                <div class="hot-coin-form-btn">
                    <a  id="register-submit" href="javascript:void(0)" style="display:block">{{__('reg.reg')}}</a>
                </div>
                <div class="hot-coin-form-hint">
                    <p>{{__('reg.account')}}<a href="{{ route('login') }}">{{__('reg.login')}}</a></p>
                </div>


            </form>

        </div>
    </div>
</div>

<input type="hidden" name="" id="" value="{{session('lang')}}">
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
    <script src="{{ asset('js/user/register.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/comm/msg.js') }}" type="text/javascript" charset="utf-8"></script>
@endsection

