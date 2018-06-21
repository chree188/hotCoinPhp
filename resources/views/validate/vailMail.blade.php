@extends('layouts/app')
@section('content')
    <div class="container-fluid">
        @if($validate)
        <p class="vail-result" style="margin: 200px auto; width: 100%; height: 30px; line-height: 30xp; text-align: center; font-size: 20px; color: green;">
            <span class="gou"></span> 验证成功
        </p>
            @else
            <p class="vail-result" style="margin: 200px auto; width: 100%; height: 30px; line-height: 30xp; text-align: center; font-size: 20px; color: red;">
                <span class="cha"></span> 验证失败
            </p>
        @endif
    </div>
    <style>
        .gou{ display: inline-block; width: 10px;height:5px; background: forestgreen;line-height: 0;font-size:0;vertical-align: middle;-webkit-transform: rotate(45deg); margin-right: 20px;}
        .gou:after{content:'/';display:block;width: 20px;height:5px; background: forestgreen;-webkit-transform: rotate(-90deg) translateY(-50%) translateX(50%);}

        .cha{ display: inline-block; width: 20px;height:5px; background: red;line-height: 0;font-size:0;vertical-align: middle;-webkit-transform: rotate(45deg);}
        .cha:after{content:'/';display:block;width: 20px;height:5px; background: red;-webkit-transform: rotate(-90deg);}
    </style>
@endsection