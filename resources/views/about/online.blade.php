@extends('layouts/app')
@section('content')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 feedback">
                    <div class="col-xs-12 feedback-nav">
                        <div class="feedback-navbar">
                            <a class="active" id="feedback_form_btn" href="{{route('online')}}">意见反馈</a>
                        </div>
                        <div class="feedback-navbar">
                            <a id="feedback_list_btn" href="{{route('onlineList')}}">列表</a>
                        </div>
                    </div>
                    <div class="col-xs-12 feedback-box" id="feedback_form">
                        <dl class="col-xs-12 feedback-form-item">
                            <dt class="left">
	                    	      <span>问题类型:</span>
	                    	  </dt>
                            <dd class="feedback-form-data">
                                <select name="" id="question-type">
                                    <option value="0">请选择问题类型</option>
                                    @foreach($fquestiontypes as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                </select>
                            </dd>
                        </dl>
                        <dl class="col-xs-12 feedback-form-item">
                            <dt class="left">
	                    	      <span>问题描述:</span>
	                    	  </dt>
                            <dd class="feedback-form-data">
                                <textarea id="question-desc" placeholder="请输入问题描述（不得少于10字）"></textarea>
                            </dd>
                        </dl>
                        <dl class="col-xs-12 feedback-form-item">
                            <dd class="feedback-form-data">
                                <button id="submitQuestion">提交问题</button>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>


<!--------------------- 问题详情弹框 ----------------->

        <div class="model">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>问题详情</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="clearfix feedback-model-list">
                        <dl class="col-xs-12 feedback-model-item">
                        	   <dt>提问内容</dt>
                        	   <dd>请输入问题描述（不得少于10字）</dd>
                        </dl>
                        <dl class="col-xs-12 feedback-model-item">
                        	   <dt>回复内容</dt>
                        	   <dd>请输入问题描述（不得少于10字）</dd>
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