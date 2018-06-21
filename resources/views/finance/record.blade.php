@extends('layouts/app')
@section('content')
    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                    @include('layouts.leftbar')
                    <!---------------------------------- 内容详情 ----------------------------->
                    <input type="hidden" id="datetype">
                    <div class="col-xs-10 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('finance.account-record')}}</h1>
                        <div class="col-xs-12 financial-data-bills">
                            <!---------------------------------- 日期选择 ----------------------------->
                            <div class="bills-header">
                                <p class="bills-header-time">
                                    {{__('finance.record-startTime')}}:
                                    <input type="text"  class="databtn datainput" id="begindate" value="{{$begindate}}" /> {{__('finance.record-to')}}
                                    <input type="text"   class="databtn datainput" id="enddate"  value="{{$enddate}}"/>
                                </p>
                                <ul class="bills-header-nav">
                                    <li class="bills-header-navbar">
                                        <a class="datatime" data-type="1" href="###">{{__('finance.record-today')}}</a>
                                    </li>
                                    <li class="bills-header-navbar">
                                        <a class="datatime" data-type="2"href="###">7{{__('finance.record-day')}}</a>
                                    </li>
                                    <li class="bills-header-navbar">
                                        <a class="datatime" data-type="3" href="###">15{{__('finance.record-day')}}</a>
                                    </li>
                                    <li class="bills-header-navbar">
                                        <a class="datatime" data-type="4" href="###">30{{__('finance.record-day')}}</a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                // $('.bills-header-navbar').hover(function(){
                                //     $(this).css('border-bottom','1px solid #EA5B25');
                                // })
                            </script>
                            <!----------------------------------- 类型选择 ------------------------------->
                            <div class="bills-nav" style="background-color:#4D4D4D">

                                    {{--<p>地区/国家:</p>--}}
                                    <label for="">
                                        <select class="form-control typeselect" id="recordType" style="background-color:#4D4D4D;border-color:#4D4D4D;
    color: #fff;width: 150px; height: 40px; font-size: 15px;  margin-left: 15px;">
                                            @foreach($filters as $filter)
                                                @if($select == $filter['value'])
                                            <option selected value="{{$filter['key']}}">{{$filter['value']}}</option>
                                                @else
                                                    <option value="{{$filter['key']}}">{{$filter['value']}}</option>
                                                @endif
                                                @endforeach
                                        </select>
                                    </label>
                            </div>

                            <!------------------------------------ 明细表格 ------------------------------->
                            <div class="financial-table-box">
                                <table class="financial-table">
                                    <tr class="financial-table-header" style="font-size:14px;font-family:MicrosoftYaHei;background:rgba(242,245,250,1);border-bottom:1px solid #E5E5E5">
                                        <th>{{__('finance.record-time')}}</th>
                                        <th>{{__('finance.record-type')}}</th>
                                        <th>{{__('finance.record-number')}}</th>
                                        <th>{{__('finance.record-fee')}}</th>
                                        <th>{{__('finance.record-status')}}</th>
                                    </tr>
                                    <tbody class="financial-table-body">
                                        @forelse($list['data'] as $log)
                                        <tr class="financial-table-item">
                                            <td>{{date('Y-m-d H:i:s',intval(substr($log['fupdatetime'],0,10)))}}2017-12-13 16:54:20</td>
                                            <td>{{$log['ftype_s']}}</td>
                                            <td>{{sprintf('%.3f',$log['famount'])}}</td>
                                            <td>{{sprintf('%.3f',$log['ffees'])}}</td>
                                            <td>{{$log['fstatus_s']}}</td>
                                        </tr>
                                            @empty
                                    @endforelse

                                    </tbody>

                                </table>
                                <div class="pagination-wrap">
                                    {{--<nav aria-label="Page navigation" class="pagination">--}}
                                      {{--<ul>--}}
                                        {{--<li>--}}
                                          {{--<a href="#" aria-label="Previous">--}}
                                            {{--<span aria-hidden="true">< 上一页</span>--}}
                                          {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#" class="active">1</a></li>--}}
                                        {{--<li><a href="#">2</a></li>--}}
                                        {{--<li><a href="#">3</a></li>--}}
                                        {{--<li><a href="#">4</a></li>--}}
                                        {{--<li><a href="#">5</a></li>--}}
                                        {{--<li>--}}
                                          {{--<a href="#" aria-label="Next">--}}
                                            {{--<span aria-hidden="true">下一页 ></span>--}}
                                          {{--</a>--}}
                                        {{--</li>--}}
                                      {{--</ul>--}}
                                    {{--</nav>--}}
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
        <script src="{{asset('js/plugin/layer/bitDate.js')}}" type="text/javascript" charset="utf-8"></script>
        <script src="{{asset('js/finance/account.record.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection