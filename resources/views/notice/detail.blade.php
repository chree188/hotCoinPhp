@extends('layouts/app')
        <!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->
        <div class="container-fluid">

@section('content')
      <!----------------- 路径导航 ------------>

            <div class="row content">
                 <div class="container">
                     <div class="row my-breadcrumb-wrap">
                         <div class="col-xs-12">
                             <ol class="breadcrumb my-breadcrumb">
                                <li><a href="{{route('index')}}">{{__('news.index')}}</a></li>
                                <li><a href="{{route('notice')}}?id=2">{{__('news.annoce')}}</a></li>
                                <li>{{__('news.annoce')}}</li>
                            </ol>
                         </div>
                     </div>
                 </div>
             </div>

      <!----------------------- 新闻详情 --------------->

            <div class="row new-datail-wrap">
                <div class="container">
                    <div class="row new-datail">
                        <div class="col-xs-12">
                            <div class="new-datail-text">
                                <h1>{!! $farticle['ftitle']!!}</h1>
                                <h3>{{date('Y-m-d H:i:s',intval(substr($farticle['fcreatedate'],0,10)))}}</h3>
                            </div>
                            <div class="new-datail-text">
                                {!! $farticle['fcontent'] !!}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection


            <!------------------------- 页尾 ---------------------------->






@section('js')
        <script type="text/javascript">
                   $(".weixing-btn").on({
                    click:function(){
                        if($(this).hasClass('active')){
                            $(this).removeClass('active');
                            $(this).siblings().hide();
                        }else{
                            $(this).addClass('active');
                            $(this).siblings().show();
                        }
                        return false;
                    }
                })


                   $(document).on("click", "*", function(){
                    $(".window-item-box").hide();
                    $(".weixing-btn").removeClass('active');
                });

        </script>
@endsection