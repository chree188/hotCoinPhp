@extends('layouts/app')
@section('content')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 feedback">
                    <div class="col-xs-12 feedback-nav">
                        <div class="feedback-navbar">
                            <a id="feedback_form_btn" href="{{route('online')}}">{{__('question.feedback')}}</a>
                        </div>
                        <div class="feedback-navbar">
                            <a class="active" id="feedback_list_btn" href="{{route('onlineList')}}">{{__('question.list')}}</a>
                        </div>
                    </div>
                    <div class="col-xs-12 feedback-box"  id="feedback_list">
                        <div class="col-xs-12">
                            <table class="financial-table annal-tabel">
                                <tr class="financial-table-header">
                                    <th>{{__('question.num')}}</th>
                                    <th>{{__('question.time')}}</th>
                                    <th>{{__('question.questionType')}}</th>
                                    <th>{{__('question.desc')}}</th>
                                    <th>{{__('question.status')}}</th>
                                    <th>{{__('question.operation')}}</th>
                                </tr>
                                <tbody class="financial-table-body">
                                @foreach($list['data'] as $item)
                                    <tr class="financial-table-item">
                                        <td>{{$item['fid']}}</td>
                                        <td>{{date('Y-m-d H:i:s',intval(substr($item['fcreatetime'],0,10)))}}</td>
                                        <td>{{$item['ftype_s']}}</td>
                                        <td style="width: 260px;">{{$item['fdesc']}}</td>
                                        <td>{{$item['fstatus_s']}}</td>
                                        <td class="financial-table-btn">
                                            <a href="javascript:void(0);" class="delete" data-questionid="{{$item['fid']}}" >删除</a>
                                            @if($item['fstatus']==2)
                                                || <a  href="javascript:void(0);" class="look" data-question="{{$item['fdesc']}}" data-answer="{{$item['fanswer']}}">查看</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if(isset($list['pagin']))
                            <div class="pagination-wrap">
                                <nav aria-label="Page navigation" class="pagination">
                                    <ul>
                                       {!! $list['pagin'] !!}
                                    </ul>
                                </nav>
                            </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!--------------------- 问题详情弹框 ----------------->

        <div class="model" id="question-detail">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('question.detail')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="clearfix feedback-model-list">
                        <dl class="col-xs-12 feedback-model-item">
                        	   <dt>{{__('question.title')}}</dt>
                        	   <dd class="js-data-title"></dd>
                        </dl>
                        <dl class="col-xs-12 feedback-model-item">
                        	   <dt>{{__('question.content')}}</dt>
                        	   <dd class="js-data-data"></dd>
                        </dl>
                    </div>
                </div>
            </div>
@endsection
        @section('js')
            <script type="text/javascript" src="{{asset('js/question/question.js')}}"></script>
        <script type="text/javascript">


        	       $("#feedback_form_btn").on({
        	           click:function(){
        	               $("#feedback_form").show();
        	               $("#feedback_list").hide();
        	           }
        	       })

        </script>
 @endsection