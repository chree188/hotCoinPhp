@extends('layouts/app')
@section('content')

    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container page-body">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
                @include('layouts.userleftbar')

                    <!---------------------------------- 内容详情 ----------------------------->
                    <div class="col-xs-9 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('user.security-log')}}</h1>
                        <div class="col-xs-12 financial-data-nav">
                            <a href="{{route('loginlog')}}" class="left financial-data-navbar annal-data-navbar active" id="loging_annal_btn">
                                <span style="width:90%">{{__('user.log-login')}}</span>
                            </a>
                            <a href="{{route('settinglog') }}" class="left financial-data-navbar annal-data-navbar">
                                <span style="width:90%">{{__('user.log-history')}}</span>
                            </a>
                        </div>
                        <div class="col-xs-12 financial-table-wrap">
                            <div class="financial-table-box">
                                <table class="financial-table annal-tabel">
                                    <tr class="financial-table-header">
                                        <th>{{__('user.log-loginTime')}}</th>
                                        <th>{{__('user.log-loginIp')}}</th>
                                    </tr>
                                    <tbody class="financial-table-body" id="login-data">
                                    @forelse($data['data'] as $item)
                                        <tr class="financial-table-item">
                                            <td>{{ date('Y-m-d H:i:s',intval(substr($item['fupdatetime'],0,10))) }}</td>
                                            <td>{{$item['fip']}}</td>
                                        </tr>
                                    @empty
                                        <p>{{__('user.log-noData')}}</p>
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
<!------------------------------- 安全设置历史 -------------------->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.active').find('a').css('background-color','#EA5B25')
        $('.active').find('a').css('color','#fff')

    </script>
@endsection