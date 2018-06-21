@extends('layouts/app')
@section('content')

    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container">
            <div class="row serve-wrap">
                <div class="col-xs-12 serve">
<!------------------------------- 边栏 ----------------------------->
                    <div class="col-xs-2">
                        <ul class="serve-list">
                            @foreach($fabouttypes as $types)
                            <li class="serve-list-item">
                                <a href="{{route('help')}}?id={{$types['fid']}}" class="serve-item-btn clearfix">
                                    {{$types['ftitle']}}
                                    @if($fabout['fabouttype'] == $types['fid'] )
                                     <i class="iconfont icon-shang"></i>
                                        @else
                                        <i class="iconfont icon-xia"></i>
                                    @endif
                                </a>

                                @if(!empty($types['child']))
                                    @if($fabout['fabouttype'] == $types['fid'] )
                                        <ul class="serve-item-nav" style="display: block">
                                    @else
                                        <ul class="serve-item-nav">
                                    @endif

                                    @foreach($types['child'] as $key=>$value)
                                    <li class="serve-item-navbar">
                                        <a @if ($_GET['id']==$key) class="active" @endif href="{{route('help')}}?id={{$key}}">{{$value}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                                    @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-xs-10 serve-content" style="background-color: #fff">
                        <h1 class="col-xs-12 serve-tetil" style="margin-top:20px;margin-bottom:10px;">{{$fabout['ftitle']}}</h1>
                        <div class="col-xs-12 serve-data">
                            <div class="serve-data-box">
                                {!! $fabout['fcontent'] !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">
            $(".serve-item-btn").on({
                click:function(event){
                    $(this).siblings(".serve-item-nav").toggle();
                    if($(this).children("i").hasClass("icon-xia")){
                        $(this).children("i").removeClass("icon-xia").addClass("icon-shang");
                    }else{
                        $(this).children("i").addClass("icon-xia").removeClass("icon-shang");
                    }
                    return false;
                }
            })

            $(".serve-item-navbar a").on({
                click:function(){
                    $(".serve-item-navbar a").removeClass("active");
                    $(this).addClass("active");
                }
            })


        </script>
@endsection




