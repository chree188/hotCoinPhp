<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no" />
        <title>HOTCOIN</title>
        <meta name="description" content="HOTCOIN" />
        <meta name="keywords" content="HOTCOIN" />
        <meta name="author" content="HOTCOIN" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-slider-pips.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="iconfont/iconfont.css" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <script src="js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="iconfont/iconfont.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/slide.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery-ui-slider-pips.js" type="text/javascript" charset="utf-8"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 feedback">
                    <div class="col-xs-12 feedback-nav">
                        <div class="feedback-navbar">
                            <button class="active" id="feedback_form_btn">意见反馈</button>
                        </div>
                        <div class="feedback-navbar">
                            <button id="feedback_list_btn">列表</button>
                        </div>
                    </div>
                    <div class="col-xs-12 feedback-box" id="feedback_form">
                        <dl class="col-xs-12 feedback-form-item">
                            <dt class="left">
	                    	      <span>问题类型:</span>
	                    	  </dt>
                            <dd class="feedback-form-data">
                                <select name="">
                                    <option value="">绑定问题</option>
                                </select>
                            </dd>
                        </dl>
                        <dl class="col-xs-12 feedback-form-item">
                            <dt class="left">
	                    	      <span>问题描述:</span>
	                    	  </dt>
                            <dd class="feedback-form-data">
                                <textarea placeholder="请输入问题描述（不得少于10字）"></textarea>
                            </dd>
                        </dl>
                        <dl class="col-xs-12 feedback-form-item">
                            <dd class="feedback-form-data">
                                <button>提交问题</button>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-xs-12 feedback-box" style="display: none;" id="feedback_list">
                        <div class="col-xs-12">
                            <table class="financial-table annal-tabel">
                                <tr class="financial-table-header">
                                    <th>问题编号</th>
                                    <th>提交时间</th>
                                    <th>问题类型</th>
                                    <th>问题描述</th>
                                    <th>问题状态</th>
                                    <th>问题操作</th>
                                </tr>
                                <tbody class="financial-table-body">
                                    <tr class="financial-table-item">
                                        <td>2531</td>
                                        <td>2018-03-19 10：28：59</td>
                                        <td>充值提现问题</td>
                                        <td style="width: 260px;">请输入问题描述（不得少于10字）</td>
                                        <td>未解决</td>
                                        <td class="financial-table-btn">
                                            <button>删除</button>
                                            <button>查看</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pagination-wrap">
                                <nav aria-label="Page navigation" class="pagination">
                                    <ul>
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">< 上一页</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="active">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <a href="#">4</a>
                                        </li>
                                        <li>
                                            <a href="#">5</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">下一页 ></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
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

<!---------------------- 添加银行卡 --------------------->

            <div class="model" style="display: block;">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>添加银行卡</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <div class="model-form-item">
                            <p>开户名:</p>
                            <label for="">
                                <input type="text" name="" id="" value=""/>
                            </label>
                            <p class="model-item-hint">*银行卡账户名必须与您的实名认证姓名一致</p>
                        </div>
                        <div class="model-form-item">
                            <p>银行卡号:</p>
                            <label for="">
                                <input type="text" name="" id="" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>确认卡号:</p>
                            <label for="">
                                <input type="text" name="" id="" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item bank-form-item">
                            <p>开户银行:</p>
                            <label for="" class="clearfix">
                                <div class="col-xs-6">
                                    <select name="">
                                    	       <option value="">工商银行</option>
                                    </select>
                                </div>
                            </label>
                        </div>
                        <div class="model-form-item bank-form-item">
                            <p>开户地址:</p>
                            <label for="" class="clearfix">
                                <div class="col-xs-3">
                                    <select name="">
                                    	       <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select name="">
                                    	       <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select name="">
                                    	       <option value="">请选择</option>
                                    </select>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <input type="" name="" id="" value="" placeholder="请输入您的详细地址"/>
                                </div>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>谷歌验证码:</p>
                            <label>
                                <input type="text" name="" id="" value="" />
                            </label>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn">确定提交</button>
                        </div>
                    </div>
                </div>
            </div>


        <script src="js/custom.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
        	       $(".feedback-navbar button").on({
        	           click:function(){
        	               $(".feedback-navbar button").removeClass("active");
        	               $(this).addClass("active");
        	           }
        	       })

        	       $("#feedback_form_btn").on({
        	           click:function(){
        	               $("#feedback_form").show();
        	               $("#feedback_list").hide();
        	           }
        	       })
        	       $("#feedback_list_btn").on({
        	           click:function(){
        	               $("#feedback_form").hide();
        	               $("#feedback_list").show();
        	           }
        	       })
        </script>
    </body>

</html>