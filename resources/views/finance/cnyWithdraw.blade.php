@extends('layouts/app')
@section('content')
    <div style="background:rgba(242,245,250,1);">
        <div class="container">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                    <div class="col-xs-2 financial-sidebar">
                        <h2 class="financial-sidebar-tetil">{{__('finance.account-center')}}</h2>
                        <ul class="financial-sidebar-nav">
                        <!--                            <li class="financial-sidebar-bar">
                                <a href="{{route('commission')}}">{{__('finance.account-recommend')}}</a>
                            </li>-->
                            <li class="financial-sidebar-bar">
                                <a href="{{route('coinDeposit')}}">{{__('finance.account-deposit')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('coinWithdraw')}}" class="active">{{__('finance.account-withdraw')}}<span style="position:absolute ;right:12px;">></span></a>
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
                        <div class="col-xs-12 financial-data-nav">

                            @foreach($cnyList as $cnyItem)
                                @if($cnyItem['id'] == $coinType['id'])
                                    <a href="{{route('cnyWithdraw')}}?symbol={{$cnyItem['id']}}"  class="left financial-data-navbar active">
                                        <span style="height:28.8px;"><img src="{{$cnyItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                        <span class="show-border-right" style="padding-right: 20px;" >{{$cnyItem['shortname']}}</span>
                                    </a>
                                @else
                                    <a href="{{route('cnyWithdraw')}}?symbol={{$cnyItem['id']}}"  class="left financial-data-navbar">
                                        <span style="height:28.8px;"><img src="{{$cnyItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                        <span class="show-border-right" style="padding-right: 20px;" >{{$cnyItem['shortname']}} </span>
                                    </a>
                                @endif
                            @endforeach
                            @forelse($coinList as $coinItem)
                                <a href="{{route('coinWithdraw')}}?symbol={{$coinItem['id']}}" class="left financial-data-navbar">
                                    <span style="height:28.8px;"><img src="{{$coinItem['applogo']}}" style="padding-left: 25px;height:28.8px;"></span>
                                    <span class="show-border-right" style="padding-right: 20px;" >{{$coinItem['shortname']}}</span>
                                </a>
                            @empty
                            @endforelse
                        </div>

                        <!------------------------------------- 提现表单 ---------------------------->
                        <input type="hidden" id="userBankId" value="0">
                        <input type="hidden" id="symbol" value="{{$coinType['id']}}">
                        <input type="hidden" id="coinName" value="{{$coinType['shortname']}}">

                        <div class="col-xs-12 financial-address-warp">

                            <form class="financial-form" style="margin-left: 30px;margin-top: 30px;width:100%;">
                                <div class="hot-coin-draw-title" >
                                    <div class="hot-coin-draw-list-left" >{{__('finance.withdraw-use')}}{{$coinType['shortname']}}:</div>
                                    <div style="display:inline-block;width:66%;height:50px;text-align:left;line-height: 50px">{{sprintf('%.3f',$wallet['total'])}}</div>
                                </div>
                                <div class="hot-coin-draw-title"  >
                                    <div  class="hot-coin-draw-list-left" >{{__('finance.withdraw-address')}}:</div>
                                    <div  class="hot-coin-draw-list-select" style="display:inline-block;width:66%;height:50px;text-align:left;line-height: 50px">
                                        <select id="withdrawBlank" class="" style="display:inline-block;height:40px;width:240px;border:1px solid #e5e5e5">
                                            @foreach($fbankinfoWithdraw as $addressItem)
                                                <option  data-fid="{{$addressItem['fid']}}" data-banknumber="{{$addressItem['fbanknumber']}}" data-bankinfo="{{$addressItem['fbanktype']}}" value="{{$addressItem['fid']}}" >{{$addressItem['fname']}} 尾号{{substr($addressItem['fbanknumber'],-6)}}</option>
                                            @endforeach
                                        </select>
                                        <a href="###" class="financial-site-btn" style="display:inline-block;">{{__('finance.withdraw-new')}} >></a>
                                    </div>

                                </div>
                                <div class="hot-coin-draw-title">
                                    <div  class="hot-coin-draw-list-left">{{__('finance.withdraw-number')}}:</div>
                                    <div class="hot-coin-draw-list-right" style="">
                                        <label for="" style="display:inline-block">
                                            <input type="text" id="withdrawBalance" value=""  style="width:240px;height:40px;border:1px solid #e5e5e5" />
                                        </label>

                                    </div>
                                </div>
                                <div class="hot-coin-draw-title" style="margin-top:-30px;margin-bottom: 10px">
                                    <div  class="hot-coin-draw-list-left"></div>
                                    <div class="hot-coin-draw-list-right" style="">
                                        <div class="hot-coin-detail-explain">{{__('finance.withdraw-fees')}}:<span id="free">0.0000</span>0.0000GSET</div>
                                        <div class="hot-coin-detail-explain">{{__('finance.withdraw-trueget')}}:<span id="amount">0.0000</span>0.0000GSET</div>
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
                                            <input type="text" id="withdrawPhoneCode" value=""  style="width:240px;height:40px;border:1px solid #e5e5e5" />
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
                                    <a href="javascript:void(0);" id="withdrawCnyButton" class="hot-coin-detail-btn">{{__('finance.withdraw-submit')}}</a>
                                </div>
                            </form>
                        </div>

                        <!------------------------------------- 提现须知 ----------------------------->

                        <div class="col-xs-12 financial-data-text">
                            <h2 class="financial-text-tetil"> <img src="{{asset('img/imgNew/notice.png')}}" style="margin-top:-2px" alt=""> &nbsp;{{__('finance.withdraw-notice')}}</h2>
                            <div class="financial-text-box">
                                <p>1、{{__('finance.withdraw-cnyNotice1')}}</p>
                                <p>2、{{__('finance.withdraw-cnyNotice2')}}</p>
                                <p>3、{{__('finance.withdraw-cnyNotice3')}}</p>
                                <p>4、{{__('finance.withdraw-cnyNotice4')}}</p>
                            </div>
                        </div>

                        <!------------------------------------- 提现记录 -------------------------------->

                        <div class="col-xs-12 financial-table-wrap">
                            <h2 class="financial-table-tetil" style="color:#EA5B25"> <img src="{{asset('/img/imgNew/click.png')}}" style="margin-top:-4px"  alt="">&nbsp; <span class="js-data-coinname">{{$coinType['shortname']}}</span>{{__('finance.withdraw-record')}}</h2>
                            <div class="financial-table-box">
                                <table class="financial-table" style="margin-top:20px" >
                                    <tr class="financial-table-header" style="font-size:14px;font-family:MicrosoftYaHei;background:rgba(242,245,250,1);box-shadow:1px 0px 0px rgba(237,240,245,1);">
                                        <th>{{__('finance.withdraw-time')}}</th>
                                        <th>{{__('finance.withdraw-methods')}}</th>
                                        <th>{{__('finance.withdraw-money')}}</th>
                                        <th>{{__('finance.withdraw-fees')}}</th>
                                        <th>{{__('finance.withdraw-account')}}</th>
                                        <th>{{__('finance.withdraw-markNumber')}}</th>
                                        <th>{{__('finance.withdraw-status')}}</th>
                                    </tr>
                                    <tbody class="financial-table-body">
                                    @forelse($page['data'] as $item)
                                        <tr class="financial-table-item">
                                            <td>{{date('Y-m-d H:i:s',intval(substr($item['fupdatetime'],0,10)))}}</td>
                                            <td>{{$item['ftype_s']}}</td>
                                            <td>￥{{sprintf('%.2f',$item['famount'])}}</td>
                                            <td>￥{{sprintf('%.2f',$item['ffees'])}}</td>
                                            <td>{{$item['fbank']}} 尾号{{substr($item['faccount'],-6)}}</td>
                                            <td>{{$item['fid']}}</td>
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


        <!---------------------- 添加银行卡 --------------------->

        <div class="model" id="add-bankInfo">
            <div class="model-body">
                <div class="model-form-header clearfix">
                    <div class="model-form-tetil">
                        <h2>{{__('finance.withdraw-addCard')}}</h2>
                    </div>
                    <div class="model-hide">
                        <button class="iconfont icon-guanbi"></button>
                    </div>
                </div>
                <div class="model-form-body">
                    <div class="model-form-item clearfix">
                        <p class="left bank-form-text">{{__('finance.withdraw-accountName')}}:</p>
                        <label for="" class="bank-form-box">
                            <input type="text"  id="payeeAddr" value=""/>
                        </label>
                        <p class="model-item-hint">{{__('finance.withdraw-hint')}}</p>
                    </div>
                    <div class="model-form-item  clearfix">
                        <p  class="left bank-form-text">{{__('finance.withdraw-cardNumber')}}:</p>
                        <label for="" class="bank-form-box">
                            <input type="text"  id="withdrawAccountAddr" value=""/>
                        </label>
                    </div>
                    <div class="model-form-item clearfix">
                        <p class="left bank-form-text">{{__('finance.withdraw-resureCard')}}:</p>
                        <label for="" class="bank-form-box">
                            <input type="text" id="withdrawAccountAddr2" value=""/>
                        </label>
                    </div>
                    <div class="model-form-item bank-form-item clearfix">
                        <p class="left bank-form-text">{{__('finance.withdraw-openBank')}}:</p>
                        <label for="" class="clearfix bank-form-box">
                            <div class="col-xs-6">
                                <select id="openBankTypeAddr">
                                    <option value="-1">{{__('finance.withdraw-chioceBank')}}</option>
                                    @foreach($bankTypes as $bank)
                                        <option value="{{$bank['fid']}}">{{$bank['fcnname']}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </label>
                    </div>
                    <div class="model-form-item bank-form-item clearfix" id="prov_city">
                        <p class="left bank-form-text">{{__('finance.withdraw-openaddress')}}:</p>
                        <label for="" class="clearfix bank-form-box">
                            <div class="col-xs-3">
                                <select name="" id="prov">
                                    <option selected>{{__('finance.withdraw-chioce')}}</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select name="" id="city">
                                    <option >{{__('finance.withdraw-chioce')}}</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select name="" id="dist">
                                    <option >{{__('finance.withdraw-chioce')}}</option>
                                </select>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px;">
                                <input type=""  id="address" value="" placeholder="{{__('finance.withdraw-placeholder1')}}"/>
                            </div>
                        </label>
                    </div>

                    <div class="model-form-item clearfix">
                        <p class="left bank-form-text">{{__('finance.withdraw-smsCode')}}:</p>
                        <label class="clearfix bank-form-box">
                            <input type="text" id="addressPhoneCode"  />
                            <button class="send-msg msg-button-inline" style="position: relative;right:100px; ">{{__('finance.withdraw-getSms')}}</button>
                        </label>
                    </div>
                    <div class="model-form-item clearfix">
                        <p class="left bank-form-text">{{__('finance.withdraw-topCode')}}:</p>
                        <label class="clearfix bank-form-box">
                            <input type="text" id="addressTotpCode"  />
                        </label>
                    </div>
                    <div class="model-form-item clearfix">
                        {{--<label for="binderrortips" class="col-xs-3 control-label"></label>--}}
                        <div class="col-xs-12">
                            <span id="binderrortips"  style="color: red;" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="model-form-item">
                        <button class="model-form-btn" id="withdrawCnyAddrBtn">{{__('finance.withdraw-submit')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <input id="feesRate" type="hidden" value="{{$withdrawSetting['withdrawFee']}}">
        <input type="hidden" id="max_double" value="{{$withdrawSetting['withdrawMax']}}">
        <input type="hidden" id="min_double" value="{{$withdrawSetting['withdrawMin']}}">
        <input type="hidden" id="symbol" value="9">
        <input type="hidden" id="city-data" value="{{asset('/js/finance/city.min.js')}}">
@endsection
@section('js')
        <script src=" {{asset('js/plugin/jquery.qrcode.min.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/finance/account.withdraw.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/finance/jquery.cityselect.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/finance/city.min.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection

