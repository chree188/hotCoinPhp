@extends('layouts/app')
@section('content')
    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                @include('layouts.leftbar')
                    <!---------------------------------- 内容详情 ----------------------------->
                    <input type="hidden" id="btcbalance" value="{{sprintf('%.3f',$userWallet['total'])}}">
                    <div class="col-xs-10 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('finance.account-income')}}</h1>
                        <div class="col-xs-12 income-data">
                            <div class="col-xs-12 financial-form-wrap">
                                <form>
                                    <div class="financial-form-item-wrap" style="height:45px;" >
                                        <dl class="clearfix financial-form-item" style="height:45px;" >
                                            <dt class="left" style="color:#EA5B25;">
                                                {{__('finance.income-balance')}}:
                                            </dt>
                                            <dd class="financial-form-item-text" id="assettotal" style="color:#EA5B25;height:40px">
                                                {{sprintf('%.4f',$userWallet['total'])}}
                                            </dd>
                                        </dl>
                                    </div>

                                    <div class="financial-form-item-wrap">
                                        <dl class="clearfix financial-form-item">
                                               <dt class="left">{{__('finance.income-type')}}:</dt>
                                               <dd class="clearfix">
                                                   <label for="">
                                                       <select id="symbol" class="form-control left" style="height:40px">
                                                           @foreach($financesCoinMap as $key=>$value)
                                                               <option value="{{$key}}" >{{$value}}</option>
                                                           @endforeach
                                                       </select>
                                                   </label>
                                               </dd>
                                        </dl>

                                    </div>

                                    <div class="financial-form-item-wrap">
                                        <dl class="clearfix financial-form-item">
                                               <dt class="left">{{__('finance.income-inType')}}:</dt>
                                               <dd class="clearfix">
                                                   <label for="">
                                                       <select id="finType" class="form-control left" style="height:40px">
                                                           {{--@forelse($typeList as $key=>$value)--}}
                                                               {{--<option value="{{$key}}" >{{$value}}</option>--}}
                                                           {{--@empty--}}
                                                           {{--@endforelse--}}
                                                       </select>
                                                   </label>
                                               </dd>
                                        </dl>

                                    </div>

                                    <div class="financial-form-item-wrap">
                                        <dl class="clearfix financial-form-item">
                                               <dt class="left">{{__('finance.income-number')}}:</dt>
                                               <dd class="clearfix financial-form-input">
                                                   <label for="" style="height:40px">
                                                       <input type="text"  id="finCount" value="" />
                                                   </label>
                                                   <p class="financial-item-hint" id="countTips">{{__('finance.income-expect')}}NaN.0000</p>
                                               </dd>
                                        </dl>
                                    </div>

                                    <div class="financial-form-item-wrap">
                                        <dl class="clearfix financial-form-item">
                                               <dt class="left">{{__('finance.income-tradPassword')}}:</dt>
                                               <dd class="clearfix financial-form-input">
                                                   <label for="">
                                                       <input type="password"  id="tradePwd" value="" />
                                                   </label>
                                               </dd>
                                        </dl>
                                    </div>

                                    <div class="financial-form-item-wrap">
                                        <dl class="clearfix financial-form-item">
                                               <dt class="left">{{__('finance.income-googleCode')}}:</dt>
                                               <dd class="clearfix financial-form-input">
                                                   <label for="">
                                                       <input type="text"  id="googleCode" value="" />
                                                   </label>
                                               </dd>
                                        </dl>
                                    </div>
                                    <div class="financial-form-item-wrap">
                                        <p id="finError" style="color:red;font-size: 12px; text-align: center; width: 60%;"></p>
                                    </div>


                                    <div class="financial-form-btn financial-form-item-wrap">
                                        <a href="###"  id="finSubmit" class="submit-btn" style="height: 40px;width: 300px;text-align: center;
    line-height: 25px;border-radius:5px;">{{__('finance.income-submit')}}</a>
                                    </div>

                                    {{--<div class="financial-form-item-wrap">--}}
                                        {{--<p class="income-form-hint">{{__('finance.income-notice')}}</p>--}}
                                    {{--</div>--}}

                                </form>
                            </div>
<!------------------------------------- 记录 -------------------------------->
                            <div class="col-xs-12 financial-table-wrap">
                                <h2 class="financial-table-tetil" style="color:#EA5B25"><img src="{{asset('/img/imgNew/click.png')}}" style="margin-top:-4px"  alt=""> &nbsp;{{__('finance.income-record')}}</h2>
                                <div class="financial-table-box">
                                    <table class="financial-table" style="margin-top: 20px;">
                                            <tr class="financial-table-header" style=" font-size:14px;font-family:MicrosoftYaHei;background:rgba(242,245,250,1);box-shadow:1px 0px 0px rgba(237,240,245,1);">
                                                <th>{{__('finance.income-coin')}}</th>
                                                <th>{{__('finance.income-inType')}}</th>
                                                <th>{{__('finance.income-number')}}</th>
                                                <th>{{__('finance.income-expect')}}</th>
                                                <th>{{__('finance.income-expectTime')}}</th>
                                                <th>{{__('finance.income-createTime')}}</th>
                                                <th>{{__('finance.income-status')}}</th>
                                                <th>{{__('finance.income-opera')}}</th>
                                            </tr>
                                            <tbody class="financial-table-body">
                                            @foreach($page['data'] as $logItem)
                                                <tr class="financial-table-item">
                                                    <td>{{$logItem['fcoin_s']}}</td>
                                                    <td>{{$logItem['fname']}}</td>
                                                    <td>{{$logItem['famount']}}</td>
                                                    <td>{{$logItem['fplanamount']}}</td>
                                                    <td>{{date('Y-m-d H:i:s',intval(substr($logItem['fupdatetime'],0,10)))}}</td>
                                                    <td>{{date('Y-m-d H:i:s',intval(substr($logItem['fcreatetime'],0,10)))}}</td>
                                                    <td>{{$logItem['fstate_s']}}</td>
                                                    <td></td>
                                                </tr>
                                                @endforeach

                                            </tbody>

                                    </table>
                                    <div class="pagination-wrap">
                                        <nav aria-label="Page navigation" class="pagination">
                                          <ul>
                                            @if(!empty($page['pagin']))
                                                {!! $page['pagin'] !!}
                                              @endif
                                          </ul>
                                        </nav>
                                    </div>
                                </div>
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
        <script src="{{asset('js/finance/account.finances.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection