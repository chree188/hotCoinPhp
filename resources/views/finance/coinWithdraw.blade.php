@extends('layouts/app')
@section('content')
    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                    <div class="col-xs-2 financial-sidebar">
                        <h2 class="financial-sidebar-tetil">{{__('finance.account-center')}}</h2>
                        <ul class="financial-sidebar-nav">
<!--                            <li class="financial-sidebar-bar">
                                <a href="{{route('commission')}}">{{__('finance.account-recommend')}}</a>
                            </li> -->
                            <li class="financial-sidebar-bar">
                                <a href="{{route('coinDeposit')}}">{{__('finance.account-deposit')}}</a>
                            </li>
                            <li class="financial-sidebar-bar bar-active">
                                <a href="{{route('coinWithdraw')}}" class="active">{{__('finance.account-withdraw')}} <span style="position:absolute ;right:0px;">></span></a>
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
                    <div class="col-xs-10 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('finance.account-withdraw')}}</h1>

                            <div class="col-xs-12 financial-data-nav" id="fiance-rechange-data">
                                @foreach($cnyList as $cnyItem)
                                    <a href="{{route('cnyWithdraw')}}?symbol={{$cnyItem['id']}}" class="left financial-data-navbar">
                                        <span><img src="{{$cnyItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                        <span class="show-border-right" style="padding-right: 20px;" >{{$cnyItem['shortname']}}</span>
                                    </a>
                                @endforeach

                                @forelse($coinList as $coinItem)

                                    @if($coinItem['id'] == $coinType['id'])
                                        <a href="{{route('coinWithdraw')}}?symbol={{$coinItem['id']}}" class="left financial-data-navbar active">
                                            <span><img src="{{$coinItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                            <span class="show-border-right" style="padding-right: 20px;" >{{$coinItem['shortname']}}</span>
                                        </a>
                                    @else
                                        <a href="{{route('coinWithdraw')}}?symbol={{$coinItem['id']}}"  class="left financial-data-navbar">
                                            <span><img src="{{$coinItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                            <span  class="show-border-right"  style="padding-right: 20px;" >{{$coinItem['shortname']}}</span>
                                        </a>
                                    @endif

                                @empty
                                @endforelse
                            </div>

<!------------------------------------- 提现表单 ---------------------------->
                        <input type="hidden" id="symbol" value="{{$coinType['id']}}">
                        <input type="hidden" id="coinName" value="{{$coinType['shortname']}}">

                        <div class="col-xs-12 financial-address-warp">

                            <form class="financial-form" style="margin-left: 30px;margin-top: 30px;width:100%;">
                                <div class="hot-coin-draw-title" >
                                    <div class="hot-coin-draw-list-left" >{{__('finance.withdraw-use')}}{{$coinType['shortname']}}:</div>
                                    <div style="display:inline-block;width:66%;height:50px;text-align:left;line-height: 50px">{{sprintf('%.3f',$userWallet['total'])}}</div>
                                </div>
                                <div class="hot-coin-draw-title"  >
                                    <div  class="hot-coin-draw-list-left" >{{__('finance.withdraw-address')}}:</div>
                                    <div  class="hot-coin-draw-list-select" style="display:inline-block;width:66%;height:50px;text-align:left;line-height: 50px">
                                        <select id="withdrawAddr" class="" style="display:inline-block;height:40px;width:240px;border:1px solid #e5e5e5">
                                            @foreach($withdrawAddress as $addressItem)
                                                <option value="{{$addressItem['fid']}}" >{{$addressItem['fadderess']}}</option>
                                            @endforeach
                                        </select>
                                        <a href="###" class="financial-site-btn" style="display:inline-block;">{{__('finance.withdraw-add')}} >></a>
                                    </div>

                                </div>
                                <div class="hot-coin-draw-title">
                                    <div  class="hot-coin-draw-list-left">{{__('finance.withdraw-number')}}:</div>
                                    <div class="hot-coin-draw-list-right" style="">
                                        <label for="" style="display:inline-block">
                                            <input type="text" id="withdrawAmount" value="" autocomplete="off" style="width:240px;height:40px;border:1px solid #e5e5e5" />
                                        </label>

                                    </div>
                                </div>
                                <div class="hot-coin-draw-title" style="margin-top:-30px;margin-bottom: 10px">
                                    <div  class="hot-coin-draw-list-left"></div>
                                    <div class="hot-coin-draw-list-right" style="">
                                        <div class="hot-coin-detail-explain">{{__('finance.withdraw-fees')}}：<span id="free">0.0000</span>{{$coinType['shortname']}}</div>
                                        <div class="hot-coin-detail-explain">{{__('finance.withdraw-trueget')}}：<span id="amount">0.0000</span>{{$coinType['shortname']}}</div>
                                    </div>
                                </div>

                                <div class="hot-coin-draw-title">
                                    <div  class="hot-coin-draw-list-left">{{__('finance.account-tradPassword')}}:</div>
                                    <div class="hot-coin-draw-list-right" style="">
                                        <label for="" style="display:inline-block">
                                            <input type="password" id="tradePwd" value="" autocomplete="off" style="width:240px;height:40px;border:1px solid #e5e5e5" />
                                        </label>

                                    </div>
                                </div>

                                <div class="hot-coin-draw-title">
                                    <div  class="hot-coin-draw-list-left">{{__('finance.withdraw-smsCode')}}:</div>
                                    <div class="hot-coin-draw-list-right" style="">
                                        <label for="" style="display:inline-block">
                                            <input type="text" id="withdrawPhoneCode" value="" autocomplete="off" style="width:240px;height:40px;border:1px solid #e5e5e5" />
                                        </label>
                                        <button type="button" class="send-msg msg-button-inline" style="position: relative;right:90px; bottom: 5px; ">{{__('finance.withdraw-getSms')}}</button>
                                    </div>
                                </div>

                                <div class="hot-coin-draw-title">
                                    <div  class="hot-coin-draw-list-left">{{__('finance.account-googleCode')}}:</div>
                                    <div class="hot-coin-draw-list-right" style="">
                                        <label for="" style="display:inline-block">
                                            <input type="text" id="withdrawTotpCode" value="" autocomplete="off" style="width:240px;height:40px;border:1px solid #e5e5e5" />
                                        </label>
                                    </div>
                                </div>
                                <div class="financial-form-item-wrap" style="text-align: center">
                                    <p id="withdrawerrortips" style="font-size: 12px; color: red; width: 60%;"></p>
                                </div>
                                <div class="financial-form-btn financial-form-item-wrap ">
                                    <a href="javascript:void(0);" id="withdrawBtcButton" class="hot-coin-detail-btn">{{__('finance.withdraw-submit')}}</a>
                                </div>
                            </form>
                        </div>

<!------------------------------------- 提现须知 ----------------------------->

                        <div class="col-xs-12 financial-data-text">
                            <h2 class="financial-text-tetil"> <img src="{{asset('img/imgNew/notice.png')}}" style="margin-top:-2px" alt="">&nbsp;&nbsp;{{__('finance.withdraw-notice')}}</h2>
                            <div class="financial-text-box">
                                <p>1、{{__('finance.withdraw-notice01')}}{{$withdrawSetting['withdrawMin']}} {{__('finance.withdraw-notice02')}}</p>
                                <p>2、{{__('finance.withdraw-notice2')}}</p>
                            </div>
                        </div>

<!------------------------------------- 提现记录 -------------------------------->

                        <div class="col-xs-12 financial-table-wrap">
                            <h2 class="financial-table-tetil" style="color:#EA5B25"><img src="{{asset('/img/imgNew/click.png')}}" style="margin-top:-4px"  alt="">&nbsp; <span class="js-data-coinname">{{$coinType['shortname']}}</span>{{__('finance.withdraw-record')}}</h2>
                            <div class="financial-table-box">
                                <table class="financial-table" style="margin-top:20px" >
                                        <tr class="financial-table-header" style="font-size:14px;font-family:MicrosoftYaHei;background:rgba(242,245,250,1);box-shadow:1px 0px 0px rgba(237,240,245,1);">
                                            <th>{{__('finance.withdraw-time')}}</th>
                                            <th>{{__('finance.withdraw-address')}}</th>
                                            <th>{{__('finance.withdraw-number')}}</th>
                                            <th>{{__('finance.withdraw-fees')}}</th>
                                            <th>{{__('finance.withdraw-status')}}</th>
                                        </tr>
                                        <tbody class="financial-table-body">
                                        @forelse($page['data'] as $item)
                                            <tr class="financial-table-item">
                                                <td>{{date('Y-m-d H:i:s',intval(substr($item['fupdatetime'],0,10)))}}</td>
                                                <td>{{$item['fwithdrawaddress']}}</td>
                                                <td>{{sprintf('%.3f',$item['famount'])}}</td>
                                                <td>{{sprintf('%.3f',$item['ffees'])}}</td>
                                                <td>{{$item['fstatus_s']}}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>

                                </table>
                                <div class="pagination-wrap">
                                    <nav aria-label="Page navigation" class="pagination" id="log-page">

                                    </nav>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
        <div  class="model">
            <div class="model-body">
                <div class="model-form-header clearfix">
                    <div class="model-form-tetil">
                        <h2>{{__('finance.account-add')}}</h2>
                    </div>
                    <div class="model-hide">
                        <button class="iconfont icon-guanbi"></button>
                    </div>
                </div>
                <div class="model-form-body">
                    <div class="model-form-item">
                        <p>{{__('finance.account-address')}}:</p>
                        <label for="">
                            <input type="text"  id="withdrawBtcAddr" value=""  class="form-site-text"/>
                        </label>
                    </div>
                    <div class="model-form-item">
                        <p>{{__('finance.account-remark')}}:</p>
                        <label for="">
                            <input type="text" id="withdrawBtcRemark" value="" />
                        </label>
                    </div>
                    <div class="model-form-item">
                        <p>{{__('finance.account-tradPassword')}}:</p>
                        <label for="">
                            <input type="password" id="withdrawBtcPass" value="" />
                        </label>
                    </div>

                    <div class="model-form-item">
                        <p>{{__('finance.withdraw-getSms')}}:</p>
                        <label for="">
                            <input type="text" id="withdrawBtcAddrPhoneCode"  />
                            <button type="button" class="send-msg msg-button-inline" style="position: relative;right:90px; bottom: 1px; ">{{__('finance.withdraw-getSms')}}</button>
                        </label>
                    </div>


                    <div class="model-form-item">
                        <p>{{__('finance.account-googleCode')}}:</p>
                        <label for="">
                            <input type="text"  id="withdrawBtcAddrTotpCode" value="" />
                        </label>
                    </div>
                    <div class="model-form-item">
                        <p id="binderrortips" style="font-size: 12px; color:red;"></p>
                    </div>
                    <div class="model-form-item">
                        <button class="model-form-btn" id="withdrawBtcAddrBtn">{{__('finance.account-save')}}</button>
                    </div>
                </div>
            </div>
        </div>

        <input id="feesRate" type="hidden" value="{{$withdrawSetting['withdrawFee']}}">
        <input type="hidden" id="max_double" value="{{$withdrawSetting['withdrawMax']}}">
        <input type="hidden" id="min_double" value="{{$withdrawSetting['withdrawMin']}}">
@endsection
@section('js')
        <script src="{{asset('js/plugin/jquery.qrcode.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/finance/account.withdraw.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection
