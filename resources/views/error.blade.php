<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no" />
    <title>HOTCOIN</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="HOTCOIN" />
    <meta name="keywords" content="HOTCOIN" />
    <meta name="author" content="HOTCOIN" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom-new.css') }}" />
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/leftTime.min.js') }}" type="text/javascript" charset="utf-8"></script>
</head>



<body style="overflow-y:hidden">
        <div style="margin:20px auto;width:690px;height:320px">
            <div style="background:url({{asset('img/imgNew/yun-error.png')}}) no-repeat center;height:320px;position:relative">
                <p style="position:absolute;top:100px;left:210px;color:#278BD7;font-size:30px">系统升级维护中...</p>

                <div style="position:absolute;top:160px;left:50px;color:#278BD7;font-size:18px;width:570px">
                  <!--  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;热币网在新加坡时间:
                        <span id="start_time">2018/07/25 13:30:00</span> ~ <span id="end_time">2018/07/25 14:00:00</span>
                        , 对网站进行升级工作，给您带来的不便深表歉意！</p>-->
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;热币网在当前时间段对网站进行升级工作，给您带来的不便深表歉意！</p>
                </div >
                <div style="position:absolute;top:220px;left:150px;color:#278BD7;font-size:18px;width:570px">
                    倒计时:
                    <span id="checktimer"><span class="hour">00</span>时<span class="minute">00</span>分<span class="second">00</span>秒</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp  <a style="text-decoration:underline" href="{{route("main")}}">点击跳转到首页</a>
                </div>

            </div>
        </div>
        <div style="margin:100px auto;width:1390px;">
            <img src="{{asset('img/imgNew/bg-error.png')}}">
        </div>
</body>
<script>


    // function getDate(){
    //     var date = new Date();
    //     Y = date.getFullYear() + '/';
    //     M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '/';
    //     D = date.getDate() + ' ';
    //     // h = date.getHours() + ':';
    //     // m = date.getMinutes() + ':';
    //     // s = date.getSeconds();
    //     return (Y+M+D);
    // }

    // var start_time = getDate()+"13:30:00";
    // var end_time = getDate()+"14:00:00";
    // $('#start_time').html(start_time);
    // $('#end_time').html(end_time);

    var timestamp = (new Date()).getTime();
    var over_time = timestamp + 30*60*1000;

    var clearTime=$.leftTime(over_time,function(d){
        if(d.status){

        }
        $('.hour').html(d.h);
        $('.minute').html(d.m);
        $('.second').html(d.s);
    });
    //清除倒计时
    // window.clearInterval(clearTime);

</script>
</html>