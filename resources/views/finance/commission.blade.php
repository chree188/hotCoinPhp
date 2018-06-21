@extends('layouts/app')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                    <div class="col-xs-3 financial-sidebar">
                        <h2 class="financial-sidebar-tetil">{{__('finance.account-recommend')}}</h2>
                        <ul class="financial-sidebar-nav">
                            <li class="financial-sidebar-bar">
                                <a href="{{route('commission')}}" class="active">{{__('finance.account-recommend')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('coinDeposit')}}">{{__('finance.account-deposit')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{route('coinWithdraw')}}">{{__('finance.account-withdraw')}}</a>
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

                    <div class="col-xs-9 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('finance.account-recommend')}}</h1>
                        <div class="col-xs-12 recommend">
                            <div class="col-xs-9 recommend-left-wrap">
                                <dl class="clearfix">
                                    <dt class="left recommend-qrcode" id="qrcode">
                                	       {{--<img src="{{asset('img/demo_03.jpg')}}" alt="" />--}}
                                	   </dt>
                                    <dd class="recommend-left-text">
                                        <p>{{__('finance.recommend-my')}}ID:<span>{{$introId}} </span></p>
                                        <p>
                                            {{__('finance.recommend-link')}}:
                                            <input type="text" readonly id="introUrl" value="{{$introurl}}" />
                                            <button id="copy" class="iconfont icon-dizi" style="background:#EA5B25; color: #fff;">{{__('finance.recommend-copy')}}</button>
                                        </p>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-xs-3 recommend-right-wrap">
                                <div class="recommend-right">
                                    <p><i class="iconfont icon-pengyou"></i>{{__('finance.recommend-already')}}</p>
                                    <h3>{{$introCount}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 recommend-tabel-box">
                            <div class="col-xs-12 financial-table-wrap assrts-tabel">
                                <h1 class="financial-data-tetil">{{__('finance.recommend-income')}}</h1>
                                <div class="financial-table-box">
                                    <table class="financial-table">
                                        <tr class="financial-table-header">
                                            <th>{{__('finance.recommend-coin')}}</th>
                                            <th>{{__('finance.recommend-number')}}</th>
                                        </tr>
                                        <tbody class="financial-table-body">
                                            @foreach($record as $item)
                                            <tr class="financial-table-item">
                                                <td>{{$item['shortName']}}</td>
                                                <td>{{$item['amount']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{--<div class="pagination-wrap">--}}
                                    {{--<nav aria-label="Page navigation" class="pagination">--}}
                                      {{--<ul>--}}
                                        {{--<li>--}}
                                          {{--<a href="#" aria-label="Previous">--}}
                                            {{--<span aria-hidden="true">< 上一页</span>--}}
                                          {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#" class="active">1</a></li>--}}
                                        {{--<li><a href="#">2</a></li>--}}
                                        {{--<li><a href="#">...</a></li>--}}
                                        {{--<li>--}}
                                          {{--<a href="#" aria-label="Next">--}}
                                            {{--<span aria-hidden="true">下一页 ></span>--}}
                                          {{--</a>--}}
                                        {{--</li>--}}
                                      {{--</ul>--}}
                                    {{--</nav>--}}
                                {{--</div>--}}
                                </div>
                            </div>
                            {{--<div class="col-xs-7 financial-table-wrap assrts-tabel">--}}
                                {{--<h1 class="financial-data-tetil">最近返佣记录</h1>--}}
                                {{--<div class="financial-table-box">--}}
                                    {{--<table class="financial-table">--}}
                                        {{--<tr class="financial-table-header">--}}
                                            {{--<th>时间</th>--}}
                                            {{--<th>佣金</th>--}}
                                            {{--<th>邮箱</th>--}}
                                        {{--</tr>--}}
                                        {{--<tbody class="financial-table-body">--}}
                                            {{--<tr class="financial-table-item">--}}
                                                {{--<td>2017-12-13 16:54:20</td>--}}
                                                {{--<td>0.2870(GSET)</td>--}}
                                                {{--<td>943663686@qq.com</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr class="financial-table-item">--}}
                                                {{--<td>2017-12-13 16:54:20</td>--}}
                                                {{--<td>0.2870(GSET)</td>--}}
                                                {{--<td>943663686@qq.com</td>--}}
                                            {{--</tr>--}}
                                        {{--</tbody>--}}

                                    {{--</table>--}}
                                    {{--<div class="pagination-wrap">--}}
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
                                {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="col-xs-12 financial-data-text">
                            <h2 class="financial-text-tetil">{{__('finance.recommend-rule')}}</h2>
                            <div class="financial-text-box">
                                <p>1、活动期间可获得50%佣金返利，后续将根据实际情况对佣金比例进行调整。</p>
                                <p>2、一旦您推荐的人成功完成交易，佣金就会立刻返到您的热币账户。</p>
                                <p>3、热币保留随时对返佣活动规则惊喜调整的权利，但是对您推荐的好友数量没有限制。</p>
                                <p>4、被推荐人必须使用您的推荐链接、二维码或者推荐ID注册才可以。</p>
                                <p>5、热币会严查重复或者虚假账户，一经发现，将不会支付返佣。重复账户或者共享资金是不合格的。</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection
@section('js')
    <script src="{{asset('js/plugin/jquery.qrcode.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        //复制推广链接到粘贴板
        $('#copy').click(function(){
            var content = $('#introUrl').val();
            var oInput = document.createElement('input');
            oInput.value = content;
            document.body.appendChild(oInput);
            oInput.select(); // 选择对象
            document.execCommand("Copy"); // 执行浏览器复制命令
            oInput.className = 'oInput';
            oInput.style.display='none';
            util.layerAlert('',util.getLan('finance.tips.45'),1,function(){});
        })
        //生成二维码
        $('#qrcode').html("").qrcode({text: $('#introUrl').val(), width: "80", height: "80", render: "table"});
    </script>
    @endsection

