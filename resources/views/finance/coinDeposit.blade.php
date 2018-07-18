@extends('layouts/app')
@section('content')
    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                    @include('layouts.leftbar')
                    <!---------------------------------- 内容详情 ----------------------------->
                    <div class="col-xs-10 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('finance.account-deposit')}}</h1>

                        <div class="col-xs-12 financial-data-nav" id="fiance-rechange-data">
                            @foreach($cnyList as $cnyItem)
                                <a href="{{route('cnyDeposit')}}?symbol={{$cnyItem['id']}}" class="left financial-data-navbar">
                                    <span><img src="{{$cnyItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                    <span class="show-border-right" style="padding-right: 20px;" >{{$cnyItem['shortname']}}</span>
                                </a>
                            @endforeach

                            @forelse($coinList as $coinItem)

                                @if($coinItem['id'] == $coinType['id'])
                                    <a href="{{route('coinDeposit')}}?symbol={{$coinItem['id']}}" class="left financial-data-navbar active">
                                        <span><img src="{{$coinItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                        <span class="show-border-right" style="padding-right: 20px;" >{{$coinItem['shortname']}}</span>
                                    </a>
                                @else
                                    <a href="{{route('coinDeposit')}}?symbol={{$coinItem['id']}}"  class="left financial-data-navbar">
                                        <span><img src="{{$coinItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                        <span  class="show-border-right"  style="padding-right: 20px;" >{{$coinItem['shortname']}}</span>
                                    </a>
                                @endif

                            @empty
                            @endforelse
                        </div>


                    <!--                        <div class="col-xs-12 financial-data-nav" id="fiance-rechange-data">
                            @foreach($cnyList as $cnyItem)
                        <a href="{{route('cnyDeposit')}}?symbol={{$cnyItem['id']}}" class="left financial-data-navbar">
                                    <span>{{$cnyItem['shortname']}}</span>
                                </a>
                            @endforeach

                    @forelse($coinList as $coinItem)

                        @if($coinItem['id'] == $coinType['id'])
                            <a href="{{route('coinDeposit')}}?symbol={{$coinItem['id']}}" class="left financial-data-navbar active">
                                       <span>{{$coinItem['shortname']}}</span>
                                   </a>
                                @else
                            <a href="{{route('coinDeposit')}}?symbol={{$coinItem['id']}}"  class="left financial-data-navbar">
                                        <span>{{$coinItem['shortname']}}</span>
                                    </a>
                                 @endif

                    @empty
                    @endforelse
                            </div>-->
                        <!---------------------------------- 充值地址 ----------------------------->
                        <div class="col-xs-12 financial-address-warp">
                            <div class="col-xs-12 financial-address">
                                <dl class="clearfix">
                                    <dt class="left  financial-address-text">{{__('finance.deposit-address')}}:</dt>
                                    <dd class="financial-address-box">
                                        <input type="text"  disabled id="recharge-addresss" value="{{isset($rechargeAddress['fadderess'])?$rechargeAddress['fadderess'] : ''}}" />
                                        <a href="###" class="iconfont icon-erweima financial-address-btn"></a>
                                    </dd>
                                </dl>
                                <div class="financial-address-img" id="qrcode">

                                </div>
                            </div>
                        </div>
                        <!----------------------------------- 充值须知 ---------------------------->

                        <div class="col-xs-12 financial-data-text">

                            <h2 class="financial-text-tetil"> <img src="{{asset('img/imgNew/notice.png')}}" style="margin-top:-2px" alt="">&nbsp;&nbsp;{{__('finance.deposit-notice')}}</h2>
                            <div class="financial-text-box">
                                <p>1、{{__('finance.deposit-notice1')}}</p>
                                <p>2、{{__('finance.deposit-notice2')}}{{$coinType['shortname']}}{{__('finance.deposit-notice2-1')}}{{$coinType['shortname']}}{{__('finance.deposit-notice2-2')}}{{$coinType['shortname']}}{{__('finance.deposit-notice2-3')}}</p>
                                <p>3、{{__('finance.deposit-notice3')}}0.01{{$coinType['shortname']}} {{__('finance.deposit-notice3-1')}}{{$coinType['shortname']}}{{__('finance.deposit-notice3-2')}}</p>
                            </div>
                        </div>

                        <!------------------------------------ 充值记录 ---------------------------->

                        <div class="col-xs-12 financial-table-wrap">
                            <h2 class="financial-table-tetil" style="color:#EA5B25"><img src="{{asset('/img/imgNew/click.png')}}" style="margin-top:-4px"  alt=""> &nbsp;{{__('finance.deposit-recent')}}</h2>
                            <div class="financial-table-box">
                                <table class="financial-table" style="margin-top:20px">
                                    <tr class="financial-table-header" style="font-size:14px;font-family:MicrosoftYaHei;background:rgba(242,245,250,1);box-shadow:1px 0px 0px rgba(237,240,245,1);" >
                                        <th>{{__('finance.deposit-last')}}</th>
                                        <th>{{__('finance.deposit-address')}}</th>
                                        <th>{{__('finance.deposit-number')}}</th>
                                        <th>{{__('finance.deposit-sureNumber')}}</th>
                                        <th>{{__('finance.deposit-status')}}</th>
                                    </tr>
                                    <tbody class="financial-table-body" id="recharge-log">
                                    @forelse($page['data'] as $item)
                                        <tr class="financial-table-item">
                                            <td>{{date('Y-m-d H:i:s',intval(substr($item['fupdatetime'],0,10)))}}</td>
                                            <td>{{$item['frechargeaddress']}}</td>
                                            <td>{{sprintf('%.3f',$item['famount'])}}</td>
                                            <td>{{sprintf('%.3f',$item['fconfirmations'])}}</td>
                                            <td>{{$item['fstatus_s']}}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>

                                </table>

                            </div>
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