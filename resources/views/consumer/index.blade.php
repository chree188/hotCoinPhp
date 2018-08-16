
@extends('layouts/app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/C2C/c2c.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/layui/css/layui.css') }}" media="all"/>
    <input type="text" name="username_auto"  style="display:none" >
    <input type="text" name="password_auto"  style="display:none">
    <div class="" style="background:rgba(242,245,250,1); ">
        <div class="container page-body">
            <div class="row financial-wrap">
                <div class="col-xs-12 financial">
                <!-------------------------------- 上边栏导航 -------------------------------->
                    <div class="c2c_top_wrap" >
                        <div class="c2c_top_ele" >{{ __('c2c.gset_exchange') }}</div>
                        <div class="c2c_top_bank" >
                            <span class="j_manage_bank_card manage_bank_card"><img src="{{asset('img/C2C/bank_card.png')}}" style="width:20px;height:17px"><span style="margin-left:5px">{{ __('c2c.bank_manage') }}</span></span>
                            <span class="j_add_bank_card add_bank_card" style="margin-left:30px"><img src="{{asset('img/C2C/bank_card.png')}}" style="width:20px;height:17px"><span style="margin-left:5px">{{ __('c2c.add_bank_card') }}</span></span>
                        </div>
                    </div>

                <!---------------------------------- 内容详情 ----------------------------->
                    <div class="c2c_exchage_wrap" style="min-height:900px;background-color: #fff;">
                        <div class="c2c_exchange_area" style="padding-top:50px;width:1120px;margin:0 auto;">
                            <div style="height:400px;border-bottom:1px solid #E6E6E6">
                                <div class="c2c_exchange_buy" style="width:540px;height:50px;display:inline-block">
                                    <div class="c2c_exchange_buy_title" style="color:#fff;width:540px;height:50px;text-align:center;line-height:50px;font-size:18px;background-color:#0CA703">{{ __('c2c.gset_buy') }}</div>
                                    <table style="width:540px;" class="buy_table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('c2c.merchant_name') }}</th>
                                                <th>{{ __('c2c.transaction_pens') }}</th>
                                                <th>{{ __('c2c.transaction_number') }}</th>
                                                <th>{{ __('c2c.transaction_time') }}</th>
                                                <th>{{ __('c2c.oper') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--<tr>--}}
                                                {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                                {{--<td>123445</td>--}}
                                                {{--<td>512120万</td>--}}
                                                {{--<td>8分钟</td>--}}
                                                {{--<td><button class="buy_sell_button buy_button">买入</button></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                                {{--<td>123445</td>--}}
                                                {{--<td>512120万</td>--}}
                                                {{--<td>8分钟</td>--}}
                                                {{--<td><button class="buy_sell_button buy_button">买入</button></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                                {{--<td>123445</td>--}}
                                                {{--<td>512120万</td>--}}
                                                {{--<td>8分钟</td>--}}
                                                {{--<td><button class="buy_sell_button buy_button">买入</button></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                                {{--<td>123445</td>--}}
                                                {{--<td>512120万</td>--}}
                                                {{--<td>8分钟</td>--}}
                                                {{--<td><button class="buy_sell_button buy_button">买入</button></td>--}}
                                            {{--</tr>--}}
                                        </tbody>
                                    </table>

                                </div>
                                <div class="c2c_exchange_sell" style="margin-left:35px;width:540px;height:50px;display:inline-block">
                                    <div class="c2c_exchange_sell_title" style="color:#fff;width:540px;height:50px;text-align:center;line-height:50px;font-size:18px;background-color:#EA5B25">{{ __('c2c.gset_sell') }}</div>
                                    <table style="width:540px;" class="sell_table">
                                        <thead>
                                        <tr>
                                            <th>{{ __('c2c.merchant_name') }}</th>
                                            <th>{{ __('c2c.transaction_pens') }}</th>
                                            <th>{{ __('c2c.transaction_number') }}</th>
                                            <th>{{ __('c2c.transaction_time') }}</th>
                                            <th>{{ __('c2c.oper') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--<tr>--}}
                                            {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                            {{--<td>123445</td>--}}
                                            {{--<td>512120万</td>--}}
                                            {{--<td>8分钟</td>--}}
                                            {{--<td><button class="buy_sell_button sell_button">卖出</button></td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                            {{--<td>123445</td>--}}
                                            {{--<td>512120万</td>--}}
                                            {{--<td>8分钟</td>--}}
                                            {{--<td><button class="buy_sell_button sell_button">卖出</button></td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                            {{--<td>123445</td>--}}
                                            {{--<td>512120万</td>--}}
                                            {{--<td>8分钟</td>--}}
                                            {{--<td><button class="buy_sell_button sell_button">卖出</button></td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td><img src="{{asset('img/C2C/qq.png')}}"> &nbsp; 123****4563</td>--}}
                                            {{--<td>123445</td>--}}
                                            {{--<td>512120万</td>--}}
                                            {{--<td>8分钟</td>--}}
                                            {{--<td><button class="buy_sell_button sell_button">卖出</button></td>--}}
                                        {{--</tr>--}}
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="c2c_notice">
                                <h2 class="c2c_notice_title"> <img src="{{asset('img/imgNew/notice.png')}}" style="margin-top:-2px" alt="">&nbsp;&nbsp;{{ __('c2c.recharge_notice') }}</h2>
                                <p>{{ __('c2c.notice1') }}</p>
                                <p>{{ __('c2c.notice2') }}</p>
                                <p>{{ __('c2c.notice3') }}</p>
                                <p>{{ __('c2c.notice4') }}</p>
                                <p>{{ __('c2c.notice5') }}</p>
                                <p>{{ __('c2c.notice6') }}</p>
                            </div>
                            <div class="c2c_record">
                                <div class="c2_record_title_left"><span style="color:#1A1A1A;font-size:16px;margin-left:40px;">{{ __('c2c.exchange_record') }}</span></div>

                                <div class="c2_record_title_right">
                                    <div class="right_wrap">
                                        <div class="right_wrap_one" style="display:inline-block">
                                            <span>{{ __('c2c.start_end_time') }}:&nbsp;</span>
                                            <input type="text" name="start_time" class="start_time" id="start_time"  autocomplete="off">
                                            <span>&nbsp;{{ __('c2c.to') }}&nbsp;</span>
                                            <input type="text" name="end_time" id="end_time" name="end_time" class="end_time"  autocomplete="off">
                                        </div>
                                        <div class="right_wrap_two" style="display:inline-block">
                                            <span>{{ __('c2c.exchange_type') }}:&nbsp;</span>
                                            <select name="exchange_type" class="exchange_type" id="exchange_type">
                                                <option value="0">{{ __('c2c.all') }}</option>
                                                <option value="1">{{ __('c2c.order_buy') }}</option>
                                                <option value="2">{{ __('c2c.order_sell') }}</option>
                                            </select>
                                        </div>
                                        <div class="right_wrap_three" style="display:inline-block">
                                            <span>{{ __('c2c.exchange_status') }}&nbsp;</span>
                                            <select type="text" name="exchange_status" class="exchange_status" id="exchange_status">
                                                <option value="0">{{ __('c2c.all') }}</option>
                                                <option value="1">{{ __('c2c.dealing') }}</option>
                                                <option value="2">{{ __('c2c.Completed') }}</option>
                                                <option value="3">{{ __('c2c.rescinded') }}</option>
                                                <option value="4">{{ __('c2c.Closed') }}</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <table id="exchange_history_record" lay-filter="orderList"></table>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>


    <div  style="width:540px;display:none" id="real_name_authentication">
                <div class=" c2c_elastic_title ">
                    <p style="font-size:24px;height:40px;line-height:50px">{{ __('c2c.Real_name_auth') }}</p>
                    <p style="font-size:12px;height:30px;line-height:30px">{{ __('c2c.Real_name_notice') }}</p>
                </div>
                        <div class="c2c_elastic_wrap " style="width:410px;">
                               <form  onsubmit="return false;" id="authentication_form">
                                       <div class="c2c_elastic_item clearfix">
                                              <label>{{ __('c2c.real_name') }}:</label>
                                               <div class="c2c_elastic_item_input">
                                                      <input type="text" name="user_name" id="bindrealinfo-realname"  class="add_bank_user_name">
                                                        <p class="elastic_tips">{{ __('c2c.real_name_no_change') }}</p>
                                                    </div>
                                            </div>
                                        <div class="c2c_elastic_item clearfix">
                                                <label>{{ __('c2c.region_country') }}:</label>
                                                <div class="c2c_elastic_item_input">
                                                    <select class="add_bank_user_name" id="bindrealinfo-address" name="bindrealinfo-address">
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
                                                    </div>
                                            </div>

                                        <div class="c2c_elastic_item clearfix">
                                                <label>{{ __('c2c.id_type') }}:</label>
                                                <div class="c2c_elastic_item_input">
                                                    <select  name="bindrealinfo-identitytype" id="bindrealinfo-identitytype"  class="add_bank_user_name">
                                                            <option value="0">{{ __('c2c.id') }}</option>
                                                            <option value="1">{{ __('c2c.passport') }}</option>
                                                            <option value="2">{{ __('c2c.pass') }}</option>
                                                    </select>
                                                 </div>
                                            </div>
                                        <div class="c2c_elastic_item clearfix">
                                                <label>{{ __('c2c.id_number') }}:</label>
                                                <div class="c2c_elastic_item_input">
                                                        <input type="text" name="bindrealinfo-identityno" id="bindrealinfo-identityno"  class="add_bank_user_name" placeholder="{{ __('c2c.fill_id_number') }}">
                                                    </div>
                                            </div>

                                       <div class="c2c_elastic_item clearfix" >
                                           <div class="form-search">
                                               <label style="line-height:13px;width:300px">
                                                   <input type="checkbox" id="bindrealinfo-ckinfo"  value="" checked="checked" style="width:9px;height:14px" >
                                                   {{ __('c2c.promise') }}
                                               </label>
                                           </div>
                                       </div>
                                        <div class="c2c_elastic_item" style="text-align:center">

                                            <button class="j_authentication_submit">{{ __('c2c.confirm_submit') }}</button>

                                        </div>

                                    </form>
                            </div>
                   </div>


    <!--弹出层  开始1-->


    <div  style="width:680px;display:none" id="confirm_notice">
        <div class=" c2c_elastic_title elastic_add_bankcard">温馨提示</div>
        <div class="c2c_elastic_wrap " style="width:500px">
            <div style="color:#444;font-size:16px;font-weight:bold;text-align: center;">您的卖出订单已下单成功，等待商家线下打款中......</div>
            <div style="color:#717171;font-size:16px;margin-top:32px;text-align: center;">（商家处理时间7*24小时，一般接单后24小时内会完成打款;）</div>
            <div class="c2c_elastic_item" style="text-align:center;margin-top:70px;">
                <button class="j_confirm_notice_submit">确认</button>
            </div>
        </div>
    </div>
    {{--<div  style="width:540px;display:none" id="exchange_confirm">--}}
        {{--<div class=" c2c_elastic_title elastic_add_bankcard">温馨提示</div>--}}
        {{--<div class="c2c_elastic_wrap " style="width:400px">--}}
            {{--<div style="color:#444;font-size:14px;color:#044444;font-weight:bold">为了确保您的账户资金安全，请输入您的交易密码进行安全确认</div>--}}
            {{--<div class="c2c_elastic_item clearfix">--}}
                {{--<label>交易密码:</label>--}}
                {{--<div class="c2c_elastic_item_input">--}}
                    {{--<input type="password" name="password" id="exchange_password_confirm" class="add_bank_user_name" placeholder="填写交易密码">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="c2c_elastic_item" style="text-align:center">--}}
                {{--<button>确认提交</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div  style="width:540px;display:none" id="set_exchange_password">
        <div class=" c2c_elastic_title elastic_add_bankcard">{{ __('c2c.set_password') }}</div>
        <div class="c2c_elastic_wrap " style="width:400px">
            <form onsubmit="return false;" id="set_exchange_password_form">
                <div class="c2c_elastic_item clearfix">
                    <label>{{ __('c2c.transaction_password') }}:</label>
                    <div class="c2c_elastic_item_input">
                        <input type="password" name="password" id="set_password" class="add_bank_user_name" placeholder="{{ __('c2c.fill_in') }}{{ __('c2c.transaction_password') }}">
                        {{--<p class="elastic_tips">{{ __('c2c.real_name_no_change') }}</p>--}}
                    </div>
                </div>
                <div class="c2c_elastic_item clearfix">
                    <label>{{ __('c2c.confirm') }}:</label>
                    <div class="c2c_elastic_item_input">
                        <input type="password" id="re_set_password" name="repassword" class="add_bank_user_name" placeholder="{{ __('c2c.confirm') }}{{ __('c2c.transaction_password') }}">
                    </div>
                </div>
                <div class="c2c_elastic_item clearfix">
                    <label>{{ __('c2c.google_code') }}:</label>
                    <div class="c2c_elastic_item_input">
                        <input type="text"  id="set_google_code"  name="user_name"  class="add_bank_user_name" placeholder="{{ __('c2c.google_code') }}">
                        <p class="elastic_tips" style="color:#444">如果没有绑定谷歌验证，点击<a href="/user/security.html" style="color:#EA5B25;text-decoration: underline">个人中心</a>设置</p>
                    </div>
                </div>
                <div class="c2c_elastic_item" style="text-align:center">

                    <button class="j_set_password_confirm">{{ __('c2c.confirm_submit') }}</button>

                </div>

            </form>
        </div>
    </div>

     <div  style="width:540px;display:none" id="add_bank_card">
                <div class=" c2c_elastic_title elastic_add_bankcard">{{ __('c2c.add_bank_card') }}</div>
                <div class="c2c_elastic_wrap " style="width:410px;">
                        <form onsubmit="return false;" id="add_bank_form">
                                <div class="c2c_elastic_item clearfix">
                                        <label>{{ __('c2c.account_name') }}:</label>
                                        <div class="c2c_elastic_item_input">
                                                <input type="text" name="realName" id="realName" class="add_bank_user_name" readonly>
                                                <p class="elastic_tips">{{ __('c2c.tips_add_card') }}</p>
                                            </div>
                                </div>
                                <div class="c2c_elastic_item clearfix">
                                        <label>{{ __('c2c.opening_bank') }}:</label>
                                        <div class="c2c_elastic_item_input">
                                                <select  name="bankId" id="bankId" class="add_bank_user_name">
                                                    <option value="1">中国建设银行</option>
                                                    <option value="2">中国农业银行</option>
                                                    <option value="3">中国工商银行</option>
                                                    <option value="4">中国银行</option>
                                                    <option value="5">交通银行</option>
                                                    <option value="6">招商银行</option>
                                                 </select>
                                                <p class="elastic_tips">{{ __('c2c.open_bank_notice') }}</p>
                                            </div>
                                </div>
                                <div class="c2c_elastic_item clearfix" id="prov_city">
                                        <label>{{ __('c2c.bank_location') }}:</label>
                                        <div class="c2c_elastic_item_input" style="width:300px">
                                            <select  name="prov" id="prov" class="add_bank_user_name" style="width:145px;">
                                                <option>请选择</option>
                                            </select>
                                            <select  name="city" id="city"  class="add_bank_user_name" style="width:145px;">
                                                <option>请选择</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="c2c_elastic_item clearfix">
                                        <label>{{ __('c2c.bank_branch') }}:</label>
                                        <div class="c2c_elastic_item_input">
                                                <input type="text" name="address" id="address" class="add_bank_user_name" placeholder="{{ __('c2c.bank_branch_notice') }}">
                                            </div>
                                    </div>
                                <div class="c2c_elastic_item clearfix">
                                        <label>{{ __('c2c.bank_card_number') }}:</label>
                                        <div class="c2c_elastic_item_input">
                                                <input type="text" name="account" id="account"  class="add_bank_user_name" placeholder="{{ __('c2c.card_number_place') }}">
                                            </div>
                                    </div>
                                <div class="c2c_elastic_item clearfix">
                                        <label>{{ __('c2c.repeat_number') }}:</label>
                                        <div class="c2c_elastic_item_input">
                                                <input type="text" name="account2" id="account2"  class="add_bank_user_name" placeholder="{{ __('c2c.repeat_number_place') }}">
                                            </div>
                                    </div>
                                <div class="c2c_elastic_item" style="text-align:center">
                                            <button class="j_bank_submit">{{ __('c2c.confirm_submit') }}</button>

                                </div>
                        </form>
                    </div>
            </div>


     <div  style="width:540px;display:none" id="manage_bank_card">
                <div class=" c2c_elastic_title elastic_add_bankcard">{{ __('c2c.bank_manage') }}</div>
                <div class="c2c_elastic_wrap j_bank_list_div" style="width:465px">
                        {{--<div class="manage_card">--}}
                                {{--<img src="/img/C2C/bank_delete.png" style="position:absolute;right:-17px;bottom:-17px">--}}
                                {{--<div class="manage_card_item clearfix">--}}
                                        {{--<div class="manage_card_item_left">--}}
                                                {{--<img src="/img/C2C/bank_card.png"><span class="elastic_bank_name">中国建设银行</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="manage_card_item_right">--}}
                                                {{--<span>设为默认卡</span>--}}
                                        {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="manage_card_item">--}}
                                        {{--<div class="bank_number_detail">6918 **** **** **** 2918</div>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="manage_card">--}}
                                {{--<img src="/img/C2C/bank_delete.png" style="position:absolute;right:-17px;bottom:-17px">--}}
                                {{--<div class="manage_card_item clearfix">--}}
                                        {{--<div class="manage_card_item_left">--}}
                                                {{--<img src="/img/C2C/bank_card.png"><span class="elastic_bank_name">中国建设银行1</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="manage_card_item_right">--}}
                                                {{--<span class="j_set_default_card">设为默认卡1</span>--}}
                                        {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="manage_card_item">--}}
                                        {{--<div class="bank_number_detail">6918 **** **** **** 29181</div>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="manage_card">--}}
                            {{--<img src="/img/C2C/bank_delete.png" style="position:absolute;right:-17px;bottom:-17px">--}}
                            {{--<div class="manage_card_item clearfix">--}}
                                {{--<div class="manage_card_item_left">--}}
                                    {{--<img src="/img/C2C/bank_card.png"><span class="elastic_bank_name">中国建设银行1</span>--}}
                                {{--</div>--}}
                                {{--<div class="manage_card_item_right">--}}
                                    {{--<span class="j_set_default_card">设为默认卡1</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="manage_card_item">--}}
                                {{--<div class="bank_number_detail">6918 **** **** **** 29181</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                </div>
     </div>

    <div  style="width:680px;display:none" id="buy_detail">
                <div class="order_buy_title" style="background-color:#EDF0F5;width:680px;height:70px;line-height:70px;opacity:0.8;text-align: center;color:#0CA703;font-size: 24px ">{{ __('c2c.purchase_order_details') }}</div>
                <div style="background-color:#fff;width:520px;margin:50px auto">
                        <div class="order_buy_detail">
                                <div class="order_buy_detail_left" style="float: left;font-weight:Bold;color:#444">{{ __('c2c.bank_card_transfer') }}</div> <div class="order_buy_detail_right" style="float:right;font-weight:Bold;color:#EA5B25;font-size:14px">{{ __('c2c.bank_card_transfer') }}</div>
                            </div>
                        <table style="" id="order_buy_table" class="order_buy_table">
                                <tr style="">
                                        <td style="">{{ __('c2c.business_name') }}</td>
                                        <td class="j_buy_bankAccount">范萌</td>
                                    </tr>
                                <tr>
                                        <td>{{ __('c2c.opening_bank') }}</td>
                                        <td class="j_buy_bankAddress">平安银行 南京双门楼支行</td>
                                    </tr>
                                <tr>
                                        <td>{{ __('c2c.bank_card_number') }}</td>
                                        <td class="j_buy_bankCode">6230583000006937926</td>
                                    </tr>
                                <tr>
                                        <td>{{ __('c2c.transfer_amount') }}</td>
                                        <td class="j_buy_amount">623.0</td>
                                    </tr>
                                <tr>
                                        <td>{{ __('c2c.remarks') }}</td>
                                        <td><span style="color:#EA5B25;font-weight:bold" class="j_buy_remark">23123</span>{{ __('c2c.remarks_notice') }}</td>
                                    </tr>
                                <tr>
                                        <td>{{ __('c2c.order_number') }}</td>
                                        <td class="j_buy_orderNumber">CZ65895</td>
                                    </tr>
                            </table>
                        <div class="order_buy_explain">
                                <p>{{ __('c2c.notice1') }}</p>
                                <p>{{ __('c2c.notice2') }}</p>
                                <p>{{ __('c2c.notice3') }}</p>
                                <p>{{ __('c2c.notice4') }}</p>
                                <p>{{ __('c2c.notice5') }}</p>
                                <p>{{ __('c2c.notice6') }}</p>
                            </div>
                        <div class="order_buy_button_area">
                                <div class="order_buy_button_left order_buy_button_all j_order_buy_button_all">我已付款</div>
                                {{--<div class="order_buy_button_right order_buy_button_all j_order_buy_button_all">稍后付款</div>--}}
                        </div>
                </div>
    </div>

    <div  style="width:680px;display:none" id="sell_detail">
         <div class="order_sell_title">{{ __('c2c.sell_order_details') }}</div>
                <div class="order_buy_wrap">
                        <div class="order_buy_detail">
                                <div class="order_buy_detail_left" style="">{{ __('c2c.bank_card_transfer') }}</div>
                            </div>
                        <table style="" id="order_sell_table" class="order_buy_table">
                                <tr style="">
                                        <td style="">{{ __('c2c.business_name') }}</td>
                                        <td class="j_sell_bankAccount">>范萌</td>
                                <tr>
                                        <td>{{ __('c2c.opening_bank') }}</td>
                                        <td class="j_sell_bankAddress">平安银行 南京双门楼支行</td>
                                    </tr>
                                <tr>
                                        <td>{{ __('c2c.bank_card_number') }}</td>
                                        <td class="j_sell_bankCode">6230583000006937926</td>
                                    </tr>
                                <tr>
                                        <td>{{ __('c2c.transfer_amount') }}</td>
                                        <td class="j_sell_amount">623.0</td>
                                </tr>
                                <tr>
                                    <td>{{ __('c2c.remarks') }}</td>
                                    <td ><span style="color:#EA5B25;font-weight:bold" class="j_sell_remark">23123</span> {{ __('c2c.remarks_notice') }}</td>
                                </tr>
                                <tr>
                                        <td>{{ __('c2c.order_number') }}</td>
                                        <td class="j_sell_orderNumber">CZ65895</td>
                                    </tr>
                            </table>
                        <div class="order_buy_explain">
                            <p>{{ __('c2c.notice1') }}</p>
                            <p>{{ __('c2c.notice2') }}</p>
                            <p>{{ __('c2c.notice3') }}</p>
                            <p>{{ __('c2c.notice4') }}</p>
                            <p>{{ __('c2c.notice5') }}</p>
                            <p>{{ __('c2c.notice6') }}</p>
                        </div>
                    </div>
    </div>


    <div  style="width:680px;display:none" id="payment_detail">
         <div class="order_sell_title">打款订单详情</div>
        <div class="order_buy_wrap">
             <div class="order_buy_detail">
                 <div class="order_buy_detail_left" style="">银行卡转账</div>
             </div>
             <table style="" id="order_buy_table" class="order_buy_table">
                                <tr style="">
                                        <td style="">商家姓名</td>
                                        <td style="">范萌</td>
                                </tr>
                                <tr>
                                        <td>开户行</td>
                                        <td>平安银行 南京双门楼支行</td>
                                    </tr>
                                <tr>
                                        <td>银行卡号</td>
                                        <td>6230583000006937926</td>
                                    </tr>
                                <tr>
                                        <td>转账金额</td>
                                        <td>623.0</td>
                                    </tr>
                                <tr>
                                        <td>备注信息</td>
                                        <td>56303</td>
                                    </tr>
                                <tr>
                                        <td>订单编号</td>
                                        <td>CZ65895</td>
                                    </tr>
             </table>
             </div>
     </div>



    <div  style="width:540px;display:none" id="sell_num">
        <input type="hidden" id="sell_business_id">
        <div class="order_sell_title_gset">{{ __('c2c.sell_gset') }}</div>
        <div class="order_buy_wrap_gset">
             <div class="order_buy_detail">
                 <div class="order_buy_detail_left" >{{ __('c2c.sell_price') }}：￥ <span class="single_price j_single_sell_price" id="single_price">111</span></div>
                 <div class="order_buy_detail_right" style="float:right;font-weight:Bold;color:#EA5B25;font-size:14px">**{{ __('c2c.min_sell_price') }}<span class="j_min_sell_price">100</span>**</div>
              </div>
              <div class="available_num">{{ __('c2c.selled_gset') }} : <span id="available_get">0.00</span></div>
              <div class="order_sell_div"><input type="text" name="order_sell_num" class="order_sell_num" id="order_sell_num" placeholder="{{ __('c2c.amount_sell_place') }}"></div>
              <div class="order_sell_total">{{ __('c2c.sell_total') }}：￥ <span id="order_sell_total_price" class="j_sell_total_price">0.00</span></div>
              <div class="order_sell_button  j_order_sell_button">{{ __('c2c.confirm_sell') }}</div>
         </div>
     </div>


    <div  style="width:540px;display:none" id="buy_num">
        <input type="hidden" id="buy_business_id">
        <div class="order_buy_title_gset">{{ __('c2c.buy_gset') }}</div>
        <div class="order_buy_wrap_gset">
            <div class="order_buy_detail">
                <div class="order_buy_detail_left" >{{ __('c2c.buy_price') }}：￥ <span class="single_price j_single_buy_price" id="single_price">111</span></div>
                <div class="order_buy_detail_right" style="float:right;font-weight:Bold;color:#EA5B25;font-size:14px">**{{ __('c2c.min_buy_price') }}<span class="j_min_buy_price">100</span>**</div>
            </div>
            <div class="order_buy_div"><input type="text" name="order_buy_num" class="order_buy_num" id="order_buy_num" placeholder="{{ __('c2c.amount_buy_place') }}"></div>
            <div class="order_buy_total">{{ __('c2c.buy_total') }}：￥ <span id="order_buy_total_price" class="j_buy_total_price">0.00</span></div>
            <div class="order_buy_button j_order_buy_button">{{ __('c2c.confirm_buy') }}</div>
        </div>
    </div>


     <div  style="width:540px;display:none" id="exchange_notice">
        <div class=" c2c_elastic_title elastic_add_bankcard">{{ __('c2c.tips') }}</div>
             <div class="c2c_elastic_wrap " style="width:400px">
                 <div style="color:#444;font-size:14px;color:#044444;font-weight:bold">{{ __('c2c.security_notice') }}</div>
                 <div class="c2c_elastic_item clearfix">
                       <label>{{ __('c2c.transaction_password') }}:</label>
                          <div class="c2c_elastic_item_input">
                               <input type="password" name="password" id="exchange_password_notice" class="add_bank_user_name" placeholder="{{ __('c2c.transaction_password_place') }}">
                                  </div>
                            </div>
                 <div class="c2c_elastic_item" style="text-align:center">
                     <button class="j_exchange_notice_configure" onclick="bank_confirm()" >{{ __('c2c.confirm_submit') }}</button>
                 </div>
             </div>
      </div>

    <!--弹出层  结束-->

    <script src="{{ asset('js/layui/layui.all.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/layui/layui.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/leftTime.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/C2C/popup.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/finance/city.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/finance/jquery.cityselect.js') }}" type="text/javascript" charset="utf-8"></script>

    <script src="{{ asset('js/C2C/index.js') }}" type="text/javascript" charset="utf-8"></script>


@endsection






