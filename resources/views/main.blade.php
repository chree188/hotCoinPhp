@extends('layouts/app')
@section('content')
    <!--------------------------- banner ---------------------------------->

    <style>
        .qr-container{
            width: 800px;
            margin: 0 auto;
            margin-top:20px;
        }

        .left2{
            float: left;
            margin-top:20px;
            margin-left:30px;
        }

        .child-center{
            text-align: center;
        }

        .download-app{

            height: 40px;
            line-height: 40px;
            border-style: solid;
            border-radius: 25px;
            border-color: #EA5B25;
            border-width: 1px;
            font-size: 20px;
        }

        .download-app a{
            height: 40px;
            width: 200px;
            text-decoration: none;
            color: #aaa;
        }

        .download-app a:hover{
            color: #EA5B25;
        }

        .download-app a:visited{
            color: #aaa;
        }

        .download-app a:link{
            color: #aaa;
        }

        .qr-img{
            width: 220px;
            height: 220px;

        }
        .header{
            border-bottom:0px ;
        }



    </style>

    <div class="container-fluid banner-warp">
        <div class="row">
            <div class="col-xs-12 banner">
                <div class="swiper-container swiper-container-horizontal banner-swiper">
                    <div class="swiper-wrapper">
                        @foreach($banner as $bannerItem)
                            <div class="swiper-slide swiper-slide-active banner-swiper-item">
                                <a href="javascript:void(0)">
                                    <img  class="swiper-lazy" data-src="{{$bannerItem["banner"]}}" alt="" />
                                    <div class="swiper-lazy-preloader"></div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination swiper-pagination-bullets">
                        {{--<span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>--}}
                        @foreach($banner as $bannerItem)
                            <span class="swiper-pagination-bullet"></span>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--公告-->
            <div class="banner-text1" style="min-width: 1240px;height:40px"></div>
            @if(!empty($notice))
                <div class="col-xs-12 banner-text">
                    <div class="container-banner" style="min-width: 1000px">
                        <div class="row">
                            <div class="col-xs-12 banner-text-box" style="height:50px;overflow: hidden;">

                                <i class="right iconfont icon-gonggao-white"  ></i>
                                <div class="swiper-container swiper-container-vertical js-swiper-container-enroll col-xs-10" style="display: inline-block;">
                                    <div class="swiper-wrapper">
                                        @foreach($notice as $value)
                                            <div class="swiper-slide swiper-slide-active banner-swiper-item" style="height:50px;" >
                                                <a href="{{route('detail')}}?id={{$value['fid']}}" class="enroll-item" >
                                                    {{$value['ftitle']}} <span class="scroll_show_more" style="font-size: 15px;color:#EA5B25;">【{{__('head.more')}}】</span>
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                                <!--<div  class="col-xs-2" style="display: inline-block; height:40px;cursor:pointer">
                                    <a href="{{route('notice')}}?id=2" style="font-size: 15px;display:block;margin:11px auto;color:#EA5B25;">【{{__('head.more')}}】</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <div class="hot-coin-wrap">
        <div class=" area-btns" style="min-width:1240px">
            @foreach($SymbolMap as $index=>$type)
                @if($index == $typeFirst)
                    <div class="area-btns-item">
                        <a href="javascript:;" class="trade-tab active" data-market="{{$index}}">{{$type}} {{ __('head.exchange') }}</a>
                    </div>
                @else
                    <div class="area-btns-item">
                        <a href="javascript:;" class="trade-tab" data-market="{{$index}}" >{{$type}} {{ __('head.exchange') }}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="container-fluid area-wrap" style="margin-bottom:80px">
        <div class="container" style="margin-top:50px;">
            @foreach($typeMap as $index=>$type)
                @if($index == $typeFirst)
                    <div class="row area-table-box market-con" id="{{$index}}" style="display: block">
                        <div class="col-xs-12 area-table-wrap">
                            <table class="area-table" id="marketType{{$index}}">
                                <tr style="background: rgba(237,240,245,1);height: 52px;">
                                    <th>{{ __('head.currency') }} </th>
                                    <th>{{ __('head.last') }}(<span style="font-size:13px">{{$SymbolMap[$index]}}</span>)</th>
                                    <th>24H{{ __('head.high1')}}(<span style="font-size:13px">{{$SymbolMap[$index]}}</span>)</th>
                                    <th>24H{{ __('head.low1')}}(<span style="font-size:13px">{{$SymbolMap[$index]}}</span>)</th>
                                    <th>{{ __('head.volume') }}</th>
                                    <th>{{ __('head.change_today') }}</th>
                                    <th>{{ __('head.threedays') }}</th>
                                    <th>{{ __('head.oper') }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="row area-table-box market-con" id="{{$index}}" style="display: none">
                        <div class="col-xs-12 area-table-wrap">
                            <table class="area-table" id="marketType{{$index}}">
                                <tr>
                                    <th>{{ __('head.currency') }} </th>
                                    <th>{{ __('head.last') }}</th>
                                    <th>{{ __('head.high') }} ({{$SymbolMap[$index]}})</th>
                                    <th>{{ __('head.low') }} ({{$SymbolMap[$index]}})</th>
                                    <th>{{ __('head.volume') }} </th>
                                    <th>{{ __('head.change_today') }}</th>
                                    <th>{{ __('head.threedays') }}</th>
                                    <th>{{ __('head.oper') }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>


    <!--Hotcoin 四大优势-->
    <div class="container-fluid advantage-wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 mian-tetil">
                    <h1>Hotcoin {{ __('head.four_advantages') }}</h1>
                </div>
            </div>
            <div class="row">
                    <div class="col-xs-3 banner-list" style="height:300px;background:#fff;";>
                                <div class="banner-item-num" style="width:70px;margin:46px auto 0" >
                                    <img src="img/imgNew/risk_management.png" style="width:70px;height:70px" alt="" />
                                </div>
                                <div class="banner-item-num" ><h2 class="banner-item-tetil" style="text-align:center">{{ __('head.strictcontrol') }}</h2></div>
                                <p class="banner-item-text" >{{ __('head.strictcontrols') }}</p>
                    </div>
                <div class="col-xs-3 banner-list" style="height:300px;background:#fff;">
                            <div class="banner-item-num"  style="width:70px;margin:46px auto 0"  >
                                <img src="img/imgNew/encryption.png" style="width:70px;height:70px" alt="" />
                            </div>
                            <div class="banner-item-num" ><h2 class="banner-item-tetil">{{ __('head.encrypt') }}</h2></div>
                            <p class="banner-item-text">{{ __('head.encrypts') }}</p>
                </div>
                <div class="col-xs-3 banner-list" style="height:300px;background:#fff;">
                            <div class="banner-item-num"  style="width:70px;margin:46px auto 0"   >
                                <img src="img/imgNew/speed.png" style="width:70px;height:70px" alt="" />
                            </div>
                            <div class="banner-item-num" ><h2 class="banner-item-tetil">{{ __('head.accelerate') }}</h2></div>
                            <p class="banner-item-text">{{ __('head.accelerates') }}</p>
                </div>
                <div class="col-xs-3 banner-list" style="height:300px;background:#fff;">
                            <div class="banner-item-num"  style="width:70px;margin:46px auto 0"  >
                                <img src="img/imgNew/multicurrency.png" style="width:70px;height:70px" alt="" />
                            </div>
                            <div class="banner-item-num" ><h2 class="banner-item-tetil">{{ __('head.multi') }}</h2></div>
                            <p class="banner-item-text">{{ __('head.multis') }}</p>
                </div>
            </div>
        </div>
    </div>

<!--    <div class="">
        <img src="{{asset('img/imgNew/HotcoinAPP.jpg')}}" style="height:500px;min-width: 1240px">
    </div> -->


    <div class="container-fluid" style="margin-top:20px;padding-top:38px;background-image:url({{asset('img/imgNew/HotcoinAPP.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <img src="{{asset('img/imgNew/phoneimg.png')}}">
                </div>

                <div class="col-xs-6" style="color:#fff">
                    <h1 class="hc-title1" >Hotcoin APP {{ __('head.off_launched') }}</h1>
                    <h2 class="hc-title2">
                        ● {{ __('head.trade_sc')}}&nbsp;&nbsp;&nbsp;
                        ● {{ __('head.security_en')}}&nbsp;&nbsp;&nbsp;
                        ● {{ __('head.system_sdf')}}&nbsp;&nbsp;&nbsp;
                        ●  {{ __('head.save_wt') }}
                    </h2>

                    <div style="margin-top:70px;">

                        <div class="hc-iphone-div">
                            <div style="height:42px;">
                                <img src="{{asset('img/imgNew/iPhone.jpg')}}" >
                                <p>Iphone {{ __('head.downloads') }}</p>
                            </div>

                            <div class="qrcode_info">
                                <div id="qrcode_ios" ></div>
                            </div>
                        </div>

                        <div class="hc-andriod-div" >
                            <div style="height:42px;">
                                <img src="{{asset('img/imgNew/Andriod.jpg')}}" >
                                <p >Andriod {{ __('head.downloads') }}</p>
                            </div>

                            <div class="qrcode_info">
                                <div id="qrcode_android" ></div>
                            </div>

                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>


<!--   <div class="container-fluid terminal-wrap" style="margin-top:20px;background-image:url(img/imgNew/background-detail.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 mian-tetil" style="color:#fff">
                    <h1 style="color:#fff">{{ __('head.multi-platform') }}</h1>
                    <h2 style="font-size: 16px;margin-top: 20px">{{ __('head.multi-detail') }}</h2>
                </div>

                <div class="col-xs-12 hot-coin-wrap-flex"  >
                    <div class="hot-coin-img-iphone" >
                        <img src="{{asset('img/imgNew/mobile.png')}}"  alt="" />
                    </div>
                    <div class="hot-coin-show-qrcode">
                        <div class="hot-coin-show-background" ></div>
                        <div style="margin-top:50px;position:relative;z-index:2" >
                            <div class="show-detail">
                                <div id="qrcode_ios"></div>
                                <p>ios {{ __('head.download') }}</p>
                            </div>
                            <div class="show-detail">
                                <div id="qrcode_android"></div>
                                <p >Android {{ __('head.download') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="hot-coin-img-pc">
                        <img src="{{asset('img/imgNew/pc2.png')}}"  alt="" />
                    </div>
                    <div class="hot-coin-show-pc">
                        <div class="hot-coin-show-background-2"></div>
                        <div style="margin-top:60px;position:relative;z-index:2" >
                            <div class="show-detail-list">
                                <img src="{{asset('img/imgNew/iphone.png')}}"  alt="" />
                                <span ><a>Mac {{ __('head.click') }}{{ __('head.download') }}</a></span>
                            </div>
                            <div class="show-detail-list">
                                <img src="{{asset('img/imgNew/window.png')}}"  alt="" />
                                <span><a>Win32 {{ __('head.bit') }} </a> | <a>Win64 {{ __('head.bit') }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>-->



    <div class="suspension">
        <div style="display:flex;flex-direction: row;justify-content: flex-end" >
            <img  src="{{asset('img/imgNew/qrcode_user_img.png')}}" style="width:100px;height:100px;margin-top:50px;display:none" alt="" />
            <div style="display:flex;flex-direction: column;justify-content: flex-start;">
                <img  src="{{asset('img/imgNew/online_service.png')}}" style="width:50px;height:50px;" alt="" />
                <img  src="{{asset('img/imgNew/QR_hover.png')}}" style="width:50px;height:50px;" alt="" />
<!--                <span style="background-color:#EA5B25;width:50px;height:50px;font-size:14px;border-radius: 5px">扫码进群</span>-->
            </div>


        </div>
    </div>

@endsection

@section('js')
<!--    <script src="{{asset('js/index/index.js')}}" type="text/javascript" charset="utf-8"></script>-->
    <script src="{{asset('js/mqttws31.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/config.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/crypto-js/crypto-js.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/index/main_mqtt.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/index/lazysizes.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/plugin/jquery.cookie.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/plugin/echarts.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/plugin/pako.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/plugin/swiper/swiper.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/plugin/jquery.qrcode.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="{{asset('js/plugin/swiper/swiper.min.css')}}">
    <script>
        $(function(){
            var mianswiper = new Swiper('.banner-swiper', {
                autoplay:{
                    delay:3000,
                },
                loop:true,
                lazy: {
                    loadPrevNext: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable :true,
                },
            });

            $(".banner-swiper .swiper-slide").mouseover(function () {//滑过悬停
                mianswiper.autoplay.stop();//Swiper 为上面你swiper实例化的名称
            }).mouseout(function(){//离开开启
                mianswiper.autoplay.start();
            });

            //公告轮播
            var swiper_enroll = new Swiper('.js-swiper-container-enroll', {
                direction: 'vertical',
                loop: true,
                autoplay: {
                    delay:2000,
                },
                autoplayDisableOnInteraction: false,
            });

            var qrcode= jQuery('#qrcode_ios').qrcode({
                render:"canvas",
                width:124,
                height:124,
                foreground: "#282828",
                background: "#FFF",
                text: "{{$qrcode['IosDownloadUrl']}}",
            });

            // var canvas = qrcode.find('canvas').get(0);
            // $('#qrcodeImg').attr('src', canvas.toDataURL('image/jpg'));
            jQuery('#qrcode_android').qrcode({
                render:"canvas",
                width:124,
                height:124,
                foreground: "#282828",
                background: "#FFF",
                text: "{{$qrcode['AndroidDownloadUrl']}}",
            });

        });
        $('.scroll_show_more').click(function(){
            window.location.href="{{route('notice')}}?id=2";
            event.preventDefault();
        })

    </script>
@endsection

