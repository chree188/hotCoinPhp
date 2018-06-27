@extends('layouts/app')
@section('content')
    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container page-body">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
<!-------------------------------- 边栏导航 -------------------------------->
                @include('layouts.leftbar')
<!---------------------------------- 内容详情 ----------------------------->
                    <div class="col-xs-10 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('finance.account-asset')}}</h1>
                        <div class="col-xs-12 financial-table-wrap assrts-tabel">
                            <div class="financial-table-box">
                                <table class="financial-table">
                                        <tr class="financial-table-header">
                                            <th>{{__('finance.asset-name')}}</th>
                                            <th>{{__('finance.asset-use')}}</th>
                                            <th>{{__('finance.asset-froze')}}</th>
                                            <th>{{__('finance.asset-total')}}</th>
                                        </tr>
                                        <tbody class="financial-table-body">
                                            @forelse($data as $item)
                                                <tr class="financial-table-item">
                                                    <td><img src="{{$item['webLogo']}}" style="width:40px;height:40px"> &nbsp;&nbsp;{{$item['shortName']}}</td>
                                                    <td>{{sprintf("%.4f",$item['total'])}}</td>
                                                    <td>{{sprintf("%.4f",$item['frozen'])}}</td>
                                                    <td>{{sprintf("%.4f",$item['total'] + $item['frozen'])}}</td>
                                                    </tr>
                                            @empty
                                             @endforelse
                                        </tbody>

                                </table>
                                <!--<div class="pagination-wrap">-->
                                    <!--<nav aria-label="Page navigation" class="pagination">-->
                                      <!---->
                                     <!---->
                                    <!--</nav>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
@endsection