@extends('layouts/app')
@section('content')
    <div class="container page-body">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
           
                    
                    
                            <div class="financial-table-box">
                                <table class="financial-table">
                                    <tr class="financial-table-header">
                                        <th>委托时间</th>
                                        <th>类型</th>
                                        <th>委托数</th>
                                        <th>金额</th>
                                        <th>手续费</th>
                                        <th>委托价格</th>
                                        <th>成交数量</th>
                                        <th>成交金额</th>
                                        <th>平均成交价</th>
                                        <th>状态</th>
                                        @if($_GET['status']==0)    <th>操作</th>@endif
                                    </tr>
                                    <tbody class="financial-table-body">
                                    @foreach( $fentrusts as $item)
                                        <tr class="financial-table-item">
                                            <td>{{date('Y-m-d H:i:s',intval(substr($item['flastupdattime'],0,10)))}}</td>
                                            <td class="{{$item['ftype']==1? 'color-sell':'color-buy'}}">{{$item['ftype_s']}}</td>
                                            <td>{{$item['fcount']}}</td>
                                            <td>{{$item['famount']}}</td>
                                            <td>{{$item['ffees']}}</td>
                                            <td>{{$item['fprize']}}</td>
                                            <td>{{$item['fcount'] - $item['fleftcount']}}</td>
                                            <td>{{$item['fsuccessamount']}}</td>
                                            <td>{{$item['flast']}}</td>
                                            <td>{{$item['fstatus_s']}}</td>
                                            @if($_GET['status']==0)   <td><a href="javascript:void(0)" class="cancelEntrustBtc" data-fid="{{$item['fid']}}">撤单</a></td>@endif

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                @if(isset($pagin))
                                <div class="pagination-wrap">
                                    <nav aria-label="Page navigation" class="pagination">
                                      <ul>
                                          {!! $pagin!!}
                                      </ul>
                                    </nav>
                                </div>
                                @endif
                            </div>

                </div>
            </div>
        </div>

        <div id="global-lockScreen" style="display:none;background:rgb(221,230,233);opacity:0.5;width:100%;height:100%;position: fixed;top:0;left:0;z-index:10000000;">
            <div style="width:100px;height:40px;line-height:40px;color:#fff;font-size:14px;text-align:center;background:rgb(24,27,42);position: absolute;left:50%;top:50%;transform:translate(-50%,-50%);border-radius:5px;">
                正在请求中...
            </div>
        </div>
@endsection

@section('js')
    <script src="{{ asset('js/markt/entrust_cancel.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(".pagination-wrap li").on("click", function(){
                var currentPage=getUrl('currentPage');
                var num = $(this).find('a').html();
                if(currentPage==num){
                    $("#global-lockScreen").hide();
                }else{
                    $("#global-lockScreen").show();
                }
        });
        function getUrl(para){
            var paraArr = location.search.substring(1).split('&');
            for(var i = 0;i < paraArr.length;i++){
                if(para == paraArr[i].split('=')[0]){
                    return paraArr[i].split('=')[1];
                }
            }
            return 1;
        }
    </script>
@endsection