@extends('layouts/app')
@section('content')
<div class="container-fluid news" style="background-color:#edf0f5">
            <div class="row news-banner">
                <div class="col-xs-12 news-banner-img">
                    <img src=" {{asset('img/imgNew/news_banner.jpg')}}" alt="" />
                </div>
            </div>
            <div class="container news-data">
                <div class="row">
                    <div class="col-xs-12 news-data-box">
                        <div class="col-xs-6 news-data-tetil" style="padding-left:50px;">
                            <img src="{{asset('img/imgNew/new_notice.png')}}}" style="display:inline-block;width:20px;height:20px;">
                            <h2 style="display:inline-block;margin-left:10px;">{{__('news.annoce')}}</h2>
                        </div>

                        <div class="col-xs-6 news-data-tetil" style="text-align:right;">
                            <h2 style="display:inline-block;margin-right:10px;font-size: 14px;font-family:MicrosoftYaHei;color:rgba(113,113,113,1);">来源&nbsp;:&nbsp;hotcoin</h2>
                        </div>


                        <div class="col-xs-12 news-data-body">
                            @foreach($farticles as $index=> $new)
                                <a href="{{route('detail')}}?id={{$new['fid']}}" class="col-xs-12 news-item news-list-item">
                                    <div class="clearfix news-item-content">
                                        <div class="col-xs-12 news-item-text">
                                            <h3 class="left" style="display:inline-block">{{$index+1}}. &nbsp;&nbsp;{{$new['ftitle_short']}}</h3>
                                            <p  class="right" style="display:inline-block">时间&nbsp;: &nbsp;{{date('Y-m-d',intval(substr($new['fcreatedate'],0,10)))}}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!---------------------------------------- 分页 ------------------------------------>
                        <div class="col-xs-12 pag">
                            <ul class="pag-nav">
                                @if(isset($pagin))
                                    {!! $pagin !!}
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
</div>
    <script>
                //获取url中的参数
                function getUrlParam(name) {
                    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
                    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
                    if (r != null) return unescape(r[2]); return '1'; //返回参数值
                }
                var number = parseInt(getUrlParam("currentPage"));
                $('.pag-nav li').each(function(index,item){
                    if($(item).find('a').html()==number){
                        $(item).find('a').css("background-color","#EA5B25");
                        $(item).find('a').css("color","#fff");
                    }
                })


    </script>

@endsection
