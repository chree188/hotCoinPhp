@extends('layouts/app')
@section('content')

    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                    <!-------------------------------- 边栏导航 -------------------------------->
         <!--           <div class="col-xs-2 financial-sidebar">
                        <h2 class="financial-sidebar-tetil">{{__('user.security-center')}}</h2>
                        <ul class="financial-sidebar-nav">
                            <li class="financial-sidebar-bar">
                                <a href="{{ route('security') }}" class="active">{{__('user.security-setting')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{ route('loginlog') }}">{{__('user.security-log')}}</a>
                            </li>
                            <li class="financial-sidebar-bar">
                                <a href="{{ route('active')}} ">{{__('user.security-code')}}</a>
                            </li>
                        </ul>
                    </div>-->
                @include('layouts.userleftbar')

                    <!---------------------------------- 内容详情 ----------------------------->
                    <div class="col-xs-10 financial-data">
                        <h1 class="col-xs-12 financial-data-tetil">{{__('user.security-setting')}}</h1>
                        <div class="col-xs-12 income-data">
                            <div class="safe-data-header">
                                <div class="safe-data-progress">
                                    <p>{{__('user.security-level')}}：</p>

                                        <!--progress-bar-danger为红色-->
                                        @if ($data['securityLevel']>=2)
                                        <div class="progress">
                                        <div class="progress-bar progress-bar-success" id="progress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($data['securityLevel']/5)*100  }}%;">  </div>
                                        </div>
                                         <p class="success js-data-level">{{__('user.security-high')}}</p>
                                         @else
                                        <div class="progress">
                                            <div class="progress-bar-danger progress-bar-success" id="progress" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($data['securityLevel']/5)*100  }}%;">  </div>
                                        </div>
                                            <p class="success js-data-level danger">{{__('user.security-low')}}</p>
                                        @endif
                                    </div>
                                    <!-------------- class = danger 字体为红色 -->


                                <p class="safe-data-progress-hint">{{__('user.security-tit')}}</p>
                            </div>
<!------------------------------------ 安全设置列表 --------------------------------->
                            <div class="safe-list">
                                <div class="safe-list-item">
                                    <div class="safe-item-tetil">
                                        <i class="iconfont icon-wancheng"></i>
                                        <h2>{{__('user.security-loginPwd')}}</h2>
                                    </div>
                                    <div class="safe-item-data clearfix" style="width: calc(100% - 172px)">
                                        <p class="danger">{{__('user.security-risk')}}</p>
                                        <button id="safe_loging_btn">{{__('user.security-alter')}}</button>
                                    </div>
                                </div>
                                <div class="safe-list-item">
                                    <div class="safe-item-tetil">
                                        @if ($data['fuser']['fistelephonebind'])
                                            <i class="iconfont icon-wancheng fistelephonebind"></i>
                                        @else
                                            <i class="iconfont icon-jingao fistelephonebind"></i>
                                        @endif
                                        <h2>{{__('user.security-phone')}}</h2>
                                    </div>

                                    <div class="safe-item-data clearfix fistelephonebind-text" style="width: calc(100% - 172px)">
                                        @if ($data['fuser']['fistelephonebind'])
                                                <p><span class="hint">{{__('user.security-phoneT')}}:</span> {{$data['phoneString']}}</p>

                                        @else
                                                <p class="danger">{{__('user.security-phoneF')}}</p>
                                                <button id="safe_phone_btn">{{__('user.security-bind')}}</button>
                                        @endif
                                    </div>
                                </div>
                                <div class="safe-list-item">
                                    <div class="safe-item-tetil">
                                        @if ($data['fuser']['fismailbind'])
                                            <i class="iconfont icon-wancheng fistelephonebind"></i>
                                        @else
                                            <i class="iconfont icon-jingao fistelephonebind"></i>
                                        @endif
                                        <h2>{{__('user.security-email')}}</h2>
                                    </div>
                                    <div class="safe-item-data clearfix fismailbind-text" style="width: calc(100% - 172px)">
                                        @if($data['fuser']['fismailbind'])
                                           <p><span class="hint">{{__('user.security-emailT')}}:</span> {{$data['emaString']}}</p>
                                        @else
                                            <p class="danger">{{__('user.security-emailF')}}</p>
                                            <button id="safe_mali_btn">{{__('user.security-bind')}}</button>
                                        @endif

                                    </div>
                                </div>
                                <div class="safe-list-item">
                                    <div class="safe-item-tetil">
                                        @if ($data['fuser']['fgooglebind'])
                                            <i class="iconfont icon-wancheng fistelephonebind"></i>
                                        @else
                                            <i class="iconfont icon-jingao fistelephonebind"></i>
                                        @endif
                                        <h2>{{__('user.security-topcode')}}</h2>
                                    </div>
                                    <div class="safe-item-data clearfix fgooglebind-text" style="width: calc(100% - 172px)">
                                        @if($data['fuser']['fgooglebind'])
                                            <p class="hint">{{__('user.security-topcodeT')}}</p>
                                            <button id="unbindgoogle">{{__('user.security-see')}}</button>
                                        @else
                                            <p class="danger">{{__('user.security-topcodeF')}}</p>
                                            <button id="bindgoogle">{{__('user.security-bind')}}</button>
                                         @endif
                                    </div>
                                </div>
                                <div class="safe-list-item">
                                    <div class="safe-item-tetil">
                                        @if ($data['bindTrade'])
                                            <i class="iconfont icon-wancheng fistelephonebind"></i>
                                        @else
                                            <i class="iconfont icon-jingao fistelephonebind"></i>
                                        @endif
                                        <h2>{{__('user.security-tradePassword')}}</h2>
                                    </div>
                                    <div class="safe-item-data clearfix bindTrade-text" style="width: calc(100% - 172px)">
                                        @if($data['bindTrade'])
                                            <p class="hint">{{__('user.security-tradPasswordT')}}</p>
                                            <button id="safe_transaction_btn">{{__('user.security-alter')}}</button>

                                        @else
                                            <p class="danger">{{__('user.security-tradPasswordF')}}</p>
                                            <button id="safe_setting_btn">{{__('user.security-set')}}</button>
                                        @endif
                                    </div>
                                </div>
                                <div class="safe-list-item">
                                    <div class="safe-item-tetil">
                                        @if ($data['fuser']['fhasrealvalidate'])
                                            <i class="iconfont icon-wancheng fistelephonebind"></i>
                                        @else
                                            <i class="iconfont icon-jingao fistelephonebind"></i>
                                        @endif
                                        <h2>{{__('user.security-truename')}}</h2>
                                    </div>
                                    <div class="safe-item-data clearfix fhasrealvalidate-text" style="width: calc(100% - 172px)">
                                        @if($data['fuser']['fhasrealvalidate'])
                                            <p class="hint">{{__('user.security-truenameT')}}</p>
                                        @elseif(!empty($data['identity']))
                                            <p class="hint">{{__('user.security-truenameC')}}</p>
                                         @else
                                            <p class="danger">{{__('user.security-truenameF')}}</p>
                                            <button id="safe_real_name_btn">{{__('user.security-author')}}</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--------------------------------- 查看谷歌验证码 ------------------->
            <div class="model" id="unbindgoogle-show-box">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-seeTop')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <div class="model-form-item">
                            <p>{{__('user.security-enterCode')}}：</p>
                            <label for="">
                                <input type="text" id="unbindgoogle-topcode" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn" id="unbindgoogle-Btn">{{__('user.security-submit')}}</button>
                        </div>
                    </div>
                </div>
            </div>




<!--------------------------------- 修改登录密码 ------------------->
            <div class="model" id="loging_psd_model">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-alterLogin')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <div class="model-form-item">
                            <p>{{__('user.security-oldPassword')}}:</p>
                            <label for="">
                                <input type="password" id="unbindloginpass-oldpass" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-newPassword')}}:</p>
                            <label for="">
                                <input type="password"  id="unbindloginpass-newpass" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-rePassword')}}:</p>
                            <label for="">
                                <input type="password"  id="unbindloginpass-confirmpass" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-topCode')}}:</p>
                            <label for="">
                                <input type="text"  id="unbindloginpass-googlecode" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn" id="unbindloginpass-Btn">{{__('user.security-submit')}}</button>
                        </div>
                    </div>
                </div>
            </div>

<!--------------------------------- 修改交易密码 ------------------->
            <div class="model" id="transaction_model1">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-alterTrade')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <!--<p class="model-form-hint">重置交易密码后24小时以内不允许提现、提币！该限制不予人工解除！</p>-->
                        <div class="model-form-item">
                            <p>>{{__('user.security-oldTrade')}}:</p>
                            <label for="">
                                <input type="password"  id="bindtradepass-oldpass" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-newTrade')}}:</p>
                            <label for="">
                                <input type="password"  id="bindtradepass-newpass" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-reTrade')}}:</p>
                            <label for="">
                                <input type="password"  id="bindtradepass-confirmpass" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-idNumber')}}:</p>
                            <label for="">
                                <input type="text" id="bindtradepass-identityno" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-topCode')}}:</p>
                            <label for="">
                                <input type="text" id="bindtradepass-googlecode" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn" id="bindtradepass-Btn" >{{__('user.security-submit')}}</button>
                        </div>
                    </div>
                    </div>
                </div>


<!--------------------------------- 设置交易密码 ------------------->
            <div class="model" id="transaction_model">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-setTrade')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <div class="model-form-item">
                            <p>{{__('user.security-tradePassword')}}:</p>
                            <label for="">
                                <input type="password"  id="unbindtradepass-newpass" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-reTradePassword')}}:</p>
                            <label for="">
                                <input type="password"  id="unbindtradepass-confirmpass" value=""/>
                            </label>
                        </div>

                        <div class="model-form-item">
                            <p>{{__('user.security-topCode')}}:</p>
                            <label for="">
                                <input type="text"  id="unbindtradepass-googlecode" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn" id="unbindtradepass-Btn">{{__('user.security-submit')}}</button>
                        </div>
                    </div>
                </div>
            </div>

<!--------------------------------- 实名认证 ------------------->
            <div class="model" id="real_name_model">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-realName')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <p class="model-form-hint">{{__('user.security-realHint')}}</p>
                        <div class="model-form-item">
                            <p>{{__('user.security-name')}}:</p>
                            <label for="">
                                <input type="text"  id="bindrealinfo-realname" value=""/>
                            </label>
                            <p class="model-item-hint">{{__('user.security-realHint2')}}</p>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-site')}}:</p>
                            <label for="">
                                <select class="form-control" id="bindrealinfo-address">
                                    <option value="940">阿布哈兹(Abkhazia)</option>
                                    <option value="93">阿富汗(Afghanistan)</option>
                                    <option value="355">阿尔巴尼亚(Albania)</option>
                                    <option value="213">阿尔及利亚(Algeria)</option>
                                    <option value="1">美国(America)</option>
                                    <option value="376">安道尔(Andorra)</option>
                                    <option value="244">安哥拉(Angola)</option>
                                    <option value="1264">安圭拉岛(Anguilla)</option>
                                    <option value="1268">安提瓜(Antigua)</option>
                                    <option value="54">阿根廷(Argentina)</option>
                                    <option value="374">亚美尼亚(Armenia)</option>
                                    <option value="297">阿鲁巴(Aruba)</option>
                                    <option value="61">澳大利亚(Australia)</option>
                                    <option value="43">奥地利(Austria)</option>
                                    <option value="994">阿塞拜疆(Azerbaijan)</option>
                                    <option value="973">巴林(Bahrain)</option>
                                    <option value="880">孟加拉国(Bangladesh)</option>
                                    <option value="1246">巴巴多斯(Barbados)</option>
                                    <option value="375">白俄罗斯(Belarus)</option>
                                    <option value="32">比利时(Belgium)</option>
                                    <option value="501">伯利兹(Belize)</option>
                                    <option value="229">贝宁(Benin)</option>
                                    <option value="1441">百慕大(Bermuda)</option>
                                    <option value="975">不丹(Bhutan)</option>
                                    <option value="591">玻利维亚(Bolivia)</option>
                                    <option value="267">博茨瓦纳(Botswana)</option>
                                    <option value="55">巴西(Brazil)</option>
                                    <option value="673">文莱(Brunei Darussalam)</option>
                                    <option value="359">保加利亚(Bulgaria)</option>
                                    <option value="226">布基纳法索(Burkina Faso)</option>
                                    <option value="95">缅甸(Burma)</option>
                                    <option value="257">布隆迪(Burundi)</option>
                                    <option value="855">柬埔寨(Cambodia)</option>
                                    <option value="237">喀麦隆(Cameroon)</option>
                                    <option value="1">加拿大(Canada)</option>
                                    <option value="238">佛得角(Cape Verde)</option>
                                    <option value="1345">开曼群岛(Cayman Islands)</option>
                                    <option value="235">乍得(Chad)</option>
                                    <option value="56">智利(Chile)</option>
                                    <option value="86" selected="selected">中国大陆(China)</option>
                                    <option value="57">哥伦比亚(Colombia)</option>
                                    <option value="269">科摩罗和马约特(Comoros)</option>
                                    <option value="682">库克群岛(Cook Islands)</option>
                                    <option value="506">哥斯达黎加(Costa Rica)</option>
                                    <option value="385">克罗地亚(Croatia)</option>
                                    <option value="53">古巴(Cuba)</option>
                                    <option value="357">塞浦路斯(Cyprus)</option>
                                    <option value="420">捷克共和国(Czech Republic)</option>
                                    <option value="45">丹麦(Denmark)</option>
                                    <option value="253">吉布提(Djibouti)</option>
                                    <option value="1767">多米尼克(Dominica)</option>
                                    <option value="593">厄瓜多尔(Ecuador)</option>
                                    <option value="20">埃及(Egypt)</option>
                                    <option value="503">萨尔瓦多(El Salvador)</option>
                                    <option value="291">厄立特里亚(Eritrea)</option>
                                    <option value="372">爱沙尼亚(Estonia)</option>
                                    <option value="251">埃塞俄比亚(Ethiopia)</option>
                                    <option value="298">法罗群岛(Faroe Islands)</option>
                                    <option value="679">斐济(Fiji)</option>
                                    <option value="358">芬兰(Finland)</option>
                                    <option value="33">法国(France)</option>
                                    <option value="241">加蓬(Gabon)</option>
                                    <option value="995">格鲁吉亚(Georgia)</option>
                                    <option value="49">德国(Germany)</option>
                                    <option value="233">加纳(Ghana)</option>
                                    <option value="350">直布罗陀(Gibraltar)</option>
                                    <option value="30">希腊(Greece)</option>
                                    <option value="299">格陵兰(Greenland)</option>
                                    <option value="1473">格林纳达(Grenada)</option>
                                    <option value="502">危地马拉(Guatemala)</option>
                                    <option value="224">几内亚(Guinea)</option>
                                    <option value="245">几内亚比绍(Guinea-Bissau)</option>
                                    <option value="592">圭亚那(Guyana)</option>
                                    <option value="509">海地(Haiti)</option>
                                    <option value="504">洪都拉斯(Honduras)</option>
                                    <option value="852">香港(Hong Kong)</option>
                                    <option value="36">匈牙利(Hungary)</option>
                                    <option value="354">冰岛(Iceland)</option>
                                    <option value="91">印度(India)</option>
                                    <option value="62">印度尼西亚(Indonesia)</option>
                                    <option value="98">伊朗(Iran)</option>
                                    <option value="964">伊拉克(Iraq)</option>
                                    <option value="353">爱尔兰(Ireland)</option>
                                    <option value="972">以色列(Israel)</option>
                                    <option value="39">意大利(Italy)</option>
                                    <option value="1876">牙买加(Jamaica)</option>
                                    <option value="81">日本(Japan)</option>
                                    <option value="962">约旦(Jordan)</option>
                                    <option value="254">肯尼亚(Kenya)</option>
                                    <option value="850">北韓(Korea, North)</option>
                                    <option value="82">南韓(Korea, South)</option>
                                    <option value="965">科威特(Kuwait)</option>
                                    <option value="996">吉尔吉斯斯坦(Kyrgyzstan)</option>
                                    <option value="856">老挝(Laos)</option>
                                    <option value="371">拉脱维亚(Latvia)</option>
                                    <option value="961">黎巴嫩(Lebanon)</option>
                                    <option value="266">莱索托(Lesotho)</option>
                                    <option value="231">利比里亚(Liberia)</option>
                                    <option value="218">利比亚(Libya)</option>
                                    <option value="423">列支敦士登(Liechtenstein)</option>
                                    <option value="370">立陶宛(Lithuania)</option>
                                    <option value="352">卢森堡(Luxembourg)</option>
                                    <option value="853">澳门(Macao)</option>
                                    <option value="261">马达加斯加(Madagascar)</option>
                                    <option value="265">马拉维(Malawi)</option>
                                    <option value="60">马来西亚(Malaysia)</option>
                                    <option value="960">马尔代夫(Maldives)</option>
                                    <option value="223">马里(Mali)</option>
                                    <option value="356">马耳他(Malta)</option>
                                    <option value="596">马提尼克岛(Martinique)</option>
                                    <option value="222">毛里塔尼亚(Mauritania)</option>
                                    <option value="230">毛里求斯(Mauritius)</option>
                                    <option value="52">墨西哥(Mexico)</option>
                                    <option value="373">摩尔多瓦(Moldova)</option>
                                    <option value="377">摩纳哥(Monaco)</option>
                                    <option value="976">蒙古(Mongolia)</option>
                                    <option value="1664">蒙特塞拉特(Montserrat)</option>
                                    <option value="212">摩洛哥(Morocco)</option>
                                    <option value="258">莫桑比克(Mozambique)</option>
                                    <option value="264">纳米比亚(Namibia)</option>
                                    <option value="674">瑙鲁(Nauru)</option>
                                    <option value="977">尼泊尔(Nepal)</option>
                                    <option value="31">荷兰(Netherlands)</option>
                                    <option value="687">新喀里多尼亚(New Caledonia)</option>
                                    <option value="64">新西兰(New Zealand)</option>
                                    <option value="505">尼加拉瓜(Nicaragua)</option>
                                    <option value="227">尼日尔(Niger)</option>
                                    <option value="234">尼日利亚(Nigeria)</option>
                                    <option value="47">挪威(Norway)</option>
                                    <option value="968">阿曼(Oman)</option>
                                    <option value="92">巴基斯坦(Pakistan)</option>
                                    <option value="680">帕劳(Palau)</option>
                                    <option value="507">巴拿马(Panama)</option>
                                    <option value="595">巴拉圭(Paraguay)</option>
                                    <option value="51">秘鲁(Peru)</option>
                                    <option value="63">菲律宾(Philippines)</option>
                                    <option value="48">波兰(Poland)</option>
                                    <option value="351">葡萄牙(Portugal)</option>
                                    <option value="974">卡塔尔(Qatar)</option>
                                    <option value="262">留尼汪(Reunion)</option>
                                    <option value="40">罗马尼亚(Romania)</option>
                                    <option value="7">俄罗斯(Russia)、哈萨克斯坦</option>
                                    <option value="250">卢旺达(Rwanda)</option>
                                    <option value="1758">圣卢西亚(Saint Lucia)</option>
                                    <option value="685">萨摩亚(Samoa)</option>
                                    <option value="378">圣马力诺(San Marino)</option>
                                    <option value="966">沙特阿拉伯(Saudi Arabia)</option>
                                    <option value="221">塞内加尔(Senegal)</option>
                                    <option value="248">塞舌尔(Seychelles)</option>
                                    <option value="232">塞拉利昂(Sierra Leone)</option>
                                    <option value="65">新加坡(Singapore)</option>
                                    <option value="421">斯洛伐克(Slovakia)</option>
                                    <option value="386">斯洛文尼亚(Slovenia)</option>
                                    <option value="677">所罗门群岛(Solomon Islands)</option>
                                    <option value="252">索马里(Somalia)</option>
                                    <option value="27">南非(South Africa)</option>
                                    <option value="34">西班牙(Spain)</option>
                                    <option value="94">斯里兰卡(Sri Lanka)</option>
                                    <option value="249">苏丹(Sudan)</option>
                                    <option value="597">苏里南(Suriname)</option>
                                    <option value="268">斯威士兰(Swaziland)</option>
                                    <option value="46">瑞典(Sweden)</option>
                                    <option value="41">瑞士(Switzerland)</option>
                                    <option value="963">叙利亚(Syria)</option>
                                    <option value="886">台灣(Taiwan)</option>
                                    <option value="992">塔吉克斯坦(Tajikistan)</option>
                                    <option value="255">坦桑尼亚(Tanzania)</option>
                                    <option value="66">泰国(Thailand)</option>
                                    <option value="1242">巴哈马(The Bahamas)</option>
                                    <option value="220">冈比亚(The Gambia)</option>
                                    <option value="228">多哥(Togo)</option>
                                    <option value="676">汤加(Tonga)</option>
                                    <option value="216">突尼斯(Tunisia)</option>
                                    <option value="90">土耳其(Turkey)</option>
                                    <option value="993">土库曼斯坦(Turkmenistan)</option>
                                    <option value="256">乌干达(Uganda)</option>
                                    <option value="380">乌克兰(Ukraine)</option>
                                    <option value="44">英国(United Kingdom)</option>
                                    <option value="598">乌拉圭(Uruguay)</option>
                                    <option value="998">乌兹别克斯坦(Uzbekistan)</option>
                                    <option value="678">瓦努阿图(Vanuatu)</option>
                                    <option value="58">委内瑞拉(Venezuela)</option>
                                    <option value="84">越南(Vietnam)</option>
                                    <option value="967">也门(Yemen)</option>
                                    <option value="260">赞比亚(Zambia)</option>
                                    <option value="263">津巴布韦(Zimbabwe)</option>
                                </select>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-realType')}}:</p>
                            <label for="">
                                <select class="form-control" id="bindrealinfo-identitytype">
                                    <option value="0">身份证</option>
                                    <option value="1">护照</option>
                                    <option value="2">通行证</option>
                                </select>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-cardChar')}}:</p>
                            <label for="">
                                <input type="text"  id="bindrealinfo-identityno" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            {{--<p>证件号码:</p>--}}
                            <label>
                                <input type="checkbox" id="bindrealinfo-ckinfo" value="" />
                                <span>{{__('user.security-promise')}}</span>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn" id="bindrealinfo-Btn">{{__('user.security-submit')}}</button>
                        </div>
                    </div>
                </div>
            </div>

<!--------------------------------- 手机绑定 ------------------->
            <div class="model" id="phone_model">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-phoneBind')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <div class="model-form-item">
                            <p>{{__('user.security-phoneNumber')}}:</p>
                            <label for="">
                                <input type="text" id="bindphone-phone" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-vailCode')}}:</p>
                            <label for="" class="verification-box">
                                <input type="text" id="bindphone-phone-code" value=""/>
                                <button class="verification-btn" id="bindphone-send-code">{{__('user.security-send')}}</button>
                            </label>
                            <p class="model-item-hint" id="phone-tips" style="display: none;"></p>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn" id="bindphone-Btn">{{__('user.security-bind')}}</button>
                        </div>
                    </div>
                </div>
            </div>

<!--------------------------------- 邮箱绑定 ------------------->
            <div class="model" id="mali_model">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-email')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <div class="model-form-item">
                            <p>{{__('user.security-emailAddress')}}:</p>
                            <label for="">
                                <input type="text" id="bindemail-email" value=""/>
                            </label>
                        </div>
                        {{--<div class="model-form-item">--}}
                            {{--<p>{{__('user.security-vailCode')}}:</p>--}}
                            {{--<label for="" class="verification-box">--}}
                                {{--<input type="text" id="bindemail-send-email" value=""/>--}}
                                {{--<button class="verification-btn" id="bindemail-send">{{__('user.security-send')}}</button>--}}
                            {{--</label>--}}
                            {{--<p class="model-item-hint"></p>--}}
                        {{--</div>--}}
                        <div class="model-form-item">
                            <button class="model-form-btn" id="bindemail-Btn">{{__('user.security-bind')}}</button>
                        </div>
                    </div>
                </div>
            </div>
<!--------------------------------- 绑定谷歌验证器 ------------------->
            <div class="model" id="google_model">
                <div class="model-body">
                    <div class="model-form-header clearfix">
                        <div class="model-form-tetil">
                            <h2>{{__('user.security-googleBind')}}</h2>
                        </div>
                        <div class="model-hide">
                            <button class="iconfont icon-guanbi"></button>
                        </div>
                    </div>
                    <div class="model-form-body">
                        <div class="model-form-item">
                            <p>{{__('user.security-googleHint')}}</p>
                        </div>
                        <div class="model-form-item">
                            <div class="clearfix model-item-imgs">
                                <div class="left model-item-imgs-download">
                                    <div style="width: 150px;height: 150px; padding: 5px; background: white;">
                                        <img src="/img/download_code.jpg" alt="" />
                                    </div>

                                    <p>{{__('user.security-googleDown')}}</p>
                                </div>
                                <div class="right model-item-imgs-bd">
                                    <div id="qrcode"  style="width: 150px;height: 150px; padding: 5px; background: white;">

                                    </div>
                                    <p>{{__('user.security-googleScan')}}</p>
                                </div>
                            </div>
                        </div>
                         <div class="model-form-item">
                            <p class="model-form-item-text">{{__('user.security-googleScanF')}}</p>
                            <p class="model-form-item-text js-data-goodleAccount" >{{__('user.security-googleAccount')}}：{{$data['device_name']}}</p>
                            <p class="model-form-item-text">{{__('user.security-googleKey')}}：<span id="bindgoogle-key"></span></p>
                             <input type="hidden" id="bindgoogle-key-hide" value="">
                        </div>
                        <div class="model-form-item">
                            <p>{{__('user.security-topCode')}}:</p>
                            <label for="" class="verification-box">
                                <input type="text"  id="bindgoogle-topcode" value=""/>
                            </label>
                        </div>
                        <div class="model-form-item">
                            <button class="model-form-btn" id="bindgoogle-Btn">{{__('user.security-submit')}}</button>
                        </div>
                    </div>
                </div>
            </div>


        <div class="model" id="unbindgoogle-hide-box">
            <div class="model-body">
                <div class="model-form-header clearfix">
                    <div class="model-form-tetil">
                        <h2>{{__('user.security-googleSee')}}</h2>
                    </div>
                    <div class="model-hide">
                        <button class="iconfont icon-guanbi"></button>
                    </div>
                </div>
                <div class="model-form-body">

                    <div class="model-form-item">
                        <div class="clearfix model-item-imgs" style="text-align: center">

                            <div class="model-item-imgs-bd" style="display: inline-block">
                                <div id="unqrcode"  style="width: 150px;height: 150px; padding: 5px; background: white;display: inline-block">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="model-form-item">
                        <p class="model-form-item-text js-data-goodleAccount" >{{__('user.security-googleAccount')}}：{{$data['device_name']}}</p>
                        <p class="model-form-item-text">{{__('user.security-googleKey')}}：<span id="unbindgoogle-key"></span></p>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
<script src="{{asset('js/plugin/jquery.qrcode.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src=" {{asset('js/user/user.security.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('js/comm/msg.js')}}" type="text/javascript" charset="utf-8"></script>

@endsection


