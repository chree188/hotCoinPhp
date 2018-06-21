@extends('layouts/app')
@section('content')
    <div style="background:rgba(242,245,250,1); ">
        <div class="container" >
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
<!-------------------------------- 边栏导航 -------------------------------->
                    <div class="col-xs-2 financial-sidebar">
                        <h2 class="financial-sidebar-tetil">{{__('finance.account-center')}}</h2>
                        <ul class="financial-sidebar-nav">
 <!--                           <li class="financial-sidebar-bar">
                                <a href="{{route('commission')}}">{{__('finance.account-recommend')}}</a>
                            </li>-->
                            <li class="financial-sidebar-bar">
                                <a href="{{route('coinDeposit')}}" class="active">{{__('finance.account-deposit')}} <span style="position:absolute ;right:12px;">></span></a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('coinWithdraw')}}" >{{__('finance.account-withdraw')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('asset')}}">{{__('finance.account-asset')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('record')}}" >{{__('finance.account-record')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('accountcoin')}}">{{__('finance.account-account')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('finances')}}">{{__('finance.account-income')}}</a>
                            </li>
                        </ul>
                    </div>
<!---------------------------------- 内容详情 ----------------------------->
                    <div class="col-xs-10 financial-data" >
                        <h1 class="col-xs-12 financial-data-tetil">{{__('finance.account-deposit')}}</h1>

                        <div class="col-xs-12 financial-data-nav" id="fiance-rechange-data">
                            @foreach($cnyList as $cnyItem)
                                <a href="{{route('cnyDeposit')}}?symbol={{$cnyItem['id']}}" class="left financial-data-navbar active">
                                    <span><img src="{{$cnyItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                    <span class="show-border-right" style="padding-right: 20px;" >{{$cnyItem['shortname']}}</span>
                                </a>
                            @endforeach

                            @forelse($coinList as $coinItem)
                                    <a href="{{route('coinDeposit')}}?symbol={{$coinItem['id']}}" class="left financial-data-navbar">
                                        <span><img src="{{$coinItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                        <span class="show-border-right" style="padding-right: 20px;" >{{$coinItem['shortname']}}</span>
                                    </a>

                            @empty
                            @endforelse
                        </div>

                    </div>
                    <div class="col-xs-10 cny-deposit" style="background-color:#fff;padding:30px 60px;">
                        <div class="col-xs-4 cny-deposit-left">
                            <div class="form-group ">
                                <label for="agency1" class="control-label">代理兑换1</label>
                                <div class="col-xs-6">
                                    <a id="agency1" class="link-box" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3384327078&site=qq&menu=yes">
                                        <i class="icon iconfont icon-social-qq"></i>3384327078</a>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="agency2" class=" control-label">代理兑换2</label>
                                <div class="col-xs-6">
                                    <a id="agency2" class="link-box" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2742369241&site=qq&menu=yes">
                                        <i class="icon iconfont icon-social-qq"></i>2742369241</a>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="agency3" class="control-label">代理兑换3</label>
                                <div class="col-xs-6">
                                    <a id="agency3" class="link-box" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1022265830&site=qq&menu=yes">
                                        <i class="icon iconfont icon-social-qq"></i>1022265830</a>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="agency4" class="control-label">代理兑换4</label>
                                <div class="col-xs-6">
                                    <a id="agency4" class="link-box" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1874078024&site=qq&menu=yes">
                                        <i class="icon iconfont icon-social-qq"></i>1874078024</a>
                                </div>
                            </div>
                            {{--<div class="form-group ">--}}
                                {{--<label for="agency4" class="control-label">代理兑换5</label>--}}
                                {{--<div class="col-xs-6">--}}
                                    {{--<a id="agency5" class="link-box" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3342023446&site=qq&menu=yes">--}}
                                        {{--<i class="icon iconfont icon-social-qq"></i>3342023446</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    <div class="cny-deposit-notice col-xs-8">
                        <h2>GSET充值须知:</h2>
                        <p>GSET为用户与用户之间点对点的购买兑换，直接交易，平台不接受交易充值。 买卖商户均为实名认证商户，并提供保证金，可放心兑换。 如需申请成为商户请发邮件到support@hotcoin.top 商家处理时间：7*24小时。</p>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/plugin/jquery.qrcode.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/finance/account.recharge.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection