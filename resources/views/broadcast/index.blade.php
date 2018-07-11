@extends('layouts/app')
    <style>
        .hc_container {
            margin:60px auto;
            width:1200px;
            min-height:880px;
        }
        .hc_detail_title{
            color:#333333;
            font-size:24px;
        }
        .hc_left {
            float:left;
            width:919px;
            min-height:800px;
            border-right:1px solid #E6EBF2;
        }
        .hc_right{
            float:left;
            width:280px;
        }
        .hc-list-link{
            color:#444444;
            font-size:18px;
            margin-left:50px;
            margin-top:10px;
        }
        .hc-list-link img{
            width:30px;
            height:14px;
        }
        .hc-list-data-ul li{
            margin-top:20px;
        }
        .hc-list-data-ul img{
            width:230px;
            height:84px;
        }
        .hc-list-data-ul p{
            margin-top:16px;
        }
        .hc-list-data-ul a{
            color:#333333;
            font-size:14px;
        }
        .hc-list-data{
            margin-left:50px;
            margin-top:20px;
        }
        .hc_coin_detail{
            width:820px;
        }
    </style>
@section('content')
    <div class="hc_container">
        <div  class="hc_left">
            <div class="hc_detail_title">
                <h1>{!! $detail['farticle']['ftitle']!!}</h1>

            </div>
            <hr />
            <div id="hc_coin_detail" class="hc_coin_detail">
                <h3>{{date('Y-m-d H:i:s',intval(substr($detail['farticle']['fcreatedate'],0,10)))}}</h3>
                <br>
                {!! $detail['farticle']['fcontent'] !!}
            </div>
        </div>
        <div class="hc_right">
            <div class="hc-list-link"><img src="{{asset('img/imgNew/link.png')}}">&nbsp;&nbsp;{{__('news.quick_link')}}</div>
            <hr style="margin-top:16px" />
            <div class="hc-list-data">
                <ul class="hc-list-data-ul">
                    @foreach ($banner as $value)
                        <a href="{{$value["bannerUrl"]}}"><li>
                                <img src="{{$value["banner"]}}">
                                <p>{{$value["bannerTitle"]}}</p>
                         </li></a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/broadcast/broad_index.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection




