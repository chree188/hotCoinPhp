@extends('layouts/app')
@section('content')

    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                    @include('layouts.userleftbar')
                    <!---------------------------------- 内容详情 ----------------------------->
                    <div class="col-xs-10 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('user.security-code')}}:</h1>
                        <div class="col-xs-12 financial-address-warp rechange-form">
                            <div class="col-xs-12 rechange-form-item">
                                <dl class="clearfix">
                                       <dt class="left  financial-address-text rechange-tetil">{{__('user.security-code')}}:</dt>
                                       <dd class="rechange-input">
                                           <input type="text" id="exchangeCode"/>
                                       </dd>
                                </dl>
                                <p class="rechange-form-item-hint">{{__('user.code-hint')}}</p>
                            </div>
                            <div class="col-xs-12 rechange-form-item">
                                <div class="rechange-form-btn">
                                    <button id="exchange">{{__('user.code-sure')}}</button>
                                </div>
                            </div>
                        </div>
<!------------------------------------ 使用充值码记录 ---------------------------->
                        <div class="col-xs-12 financial-table-wrap">
                                <h2 class="financial-table-tetil" style="color:#EA5B25"><img src="{{asset('img/imgNew/click.png')}}" style="margin-top:-4px"  alt=""> {{__('user.code-record')}}</h2>
                            <div class="financial-table-box">
                                <table class="financial-table" style="margin-top:20px">
                                        <tr class="financial-table-header" style="font-size:14px;font-family:MicrosoftYaHei;background:rgba(242,245,250,1);box-shadow:1px 0px 0px rgba(237,240,245,1);">
                                            <th>{{__('user.code-sn')}}</th>
                                            <th>{{__('user.code-type')}}</th>
                                            <th>{{__('user.code-number')}}</th>
                                            <th>{{__('user.code-char')}}</th>
                                            <th>{{__('user.code-status')}}</th>
                                            <th>{{__('user.code-time')}}</th>
                                        </tr>
                                        <tbody class="financial-table-body" id="exchange-data">
                                            @forelse($data['frewardcodes'] as $item)
                                            <tr class="financial-table-item">
                                                <td>{{$item['fid']}}</td>
                                                <td>{{$item['ftype_s']}}{{__('user.code-in')}}</td>
                                                <td>{{$item['famount']}}</td>
                                                <td>{{$item['fcode']}}</td>
                                                <td>@if($item['fstate'])  {{__('user.code-success')}}@else {{__('user.code-fail')}} @endif</td>
                                                <td>{{date('Y-m-d H:i:s',intval(substr($item['fupdatetime'],0,10)))}}</td>
                                            </tr>
                                                @empty
                                        @endforelse
                                        </tbody>

                                </table>
                                @if(isset($data['pagin']))
                                    <div class="pagination-wrap">
                                        <nav aria-label="Page navigation" class="pagination" id="logingPage">
                                            <ul>
                                                {!! $data['pagin'] !!}
                                            </ul>
                                        </nav>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
        <script src="{{asset('js/activity/activity.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection

