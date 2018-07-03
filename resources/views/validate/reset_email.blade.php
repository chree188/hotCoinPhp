@extends('layouts/app')
@section('content')
<!--[if lt IE 9]>对不起，浏览器版本太低~！<![endif]-->


<div style="height: 863px;min-width:1240px;background-image:url({{asset('img/imgNew/login_bg.jpg')}})">
    <div class="container" style="height:580px;">
        <div class="row financial-wrap" style="width:500px;margin:50px auto;background-color:#fff">

            <form class="hot-coin-form" id="phone_form">
                <h2 class="" style="margin-top: 50px;">{{__('vail.first-find')}}</h2>
                <h3 class="">www.hotcoin.top</h3>
                <div class="hot-coin-form-item reset-phone" style="position: relative;display:none">
                    <div id="form-site" class="form-site clearfix" data-select="86">
                        <span class="iconfont icon-shouji" style="font-size:18px;position:absolute;    margin-top: -2px;margin-left: -35px;"></span>
                        <p id="site">中国86</p>

                    </div>
                    <div class="form-site-list">
                        <ul>

                            <li class="form-site-item" code="975">不丹 975</li>

                            <li class="form-site-item" code="684">东萨摩亚 684</li>

                            <li class="form-site-item" code="86">中国 86</li>

                            <li class="form-site-item" code="1808">中途岛 1808</li>

                            <li class="form-site-item" code="236">中非 236</li>

                            <li class="form-site-item" code="45">丹麦 45</li>

                            <li class="form-site-item" code="256">乌干达 256</li>

                            <li class="form-site-item" code="598">乌拉圭 598</li>

                            <li class="form-site-item" code="235">乍得 235</li>

                            <li class="form-site-item" code="972">以色列 972</li>

                            <li class="form-site-item" code="964">伊拉克 964</li>

                            <li class="form-site-item" code="98">伊朗 98</li>

                            <li class="form-site-item" code="501">伯利兹 501</li>

                            <li class="form-site-item" code="238">佛得角 238</li>

                            <li class="form-site-item" code="7">俄罗斯 7</li>

                            <li class="form-site-item" code="359">保加利亚 359</li>

                            <li class="form-site-item" code="671">关岛 671</li>

                            <li class="form-site-item" code="220">冈比亚 220</li>

                            <li class="form-site-item" code="354">冰岛 354</li>

                            <li class="form-site-item" code="224">几内亚 224</li>

                            <li class="form-site-item" code="245">几内亚比绍 245</li>

                            <li class="form-site-item" code="4175">列支敦士登 4175</li>

                            <li class="form-site-item" code="242">刚果 242</li>

                            <li class="form-site-item" code="218">利比亚 218</li>

                            <li class="form-site-item" code="231">利比里亚 231</li>

                            <li class="form-site-item" code="1">加拿大 1</li>

                            <li class="form-site-item" code="233">加纳 233</li>

                            <li class="form-site-item" code="241">加蓬 241</li>

                            <li class="form-site-item" code="336">匈牙利 336</li>

                            <li class="form-site-item" code="338">南斯拉夫 338</li>

                            <li class="form-site-item" code="27">南非 27</li>

                            <li class="form-site-item" code="267">博茨瓦纳 267</li>

                            <li class="form-site-item" code="974">卡塔尔 974</li>

                            <li class="form-site-item" code="250">卢旺达 250</li>

                            <li class="form-site-item" code="352">卢森堡 352</li>

                            <li class="form-site-item" code="91">印度 91</li>

                            <li class="form-site-item" code="62">印度尼西亚 62</li>

                            <li class="form-site-item" code="502">危地马拉 502</li>

                            <li class="form-site-item" code="593">厄瓜多尔 593</li>

                            <li class="form-site-item" code="963">叙利亚 963</li>

                            <li class="form-site-item" code="53">古巴 53</li>

                            <li class="form-site-item" code="886">台湾 886</li>

                            <li class="form-site-item" code="253">吉布提 253</li>

                            <li class="form-site-item" code="57">哥伦比亚 57</li>

                            <li class="form-site-item" code="506">哥斯达黎加 506</li>

                            <li class="form-site-item" code="237">喀麦隆 237</li>

                            <li class="form-site-item" code="688">图瓦卢 688</li>

                            <li class="form-site-item" code="90">土耳其 90</li>

                            <li class="form-site-item" code="1809">圣卢西亚 1809</li>

                            <li class="form-site-item" code="239">圣多美 239</li>

                            <li class="form-site-item" code="6724">圣诞岛 6724</li>

                            <li class="form-site-item" code="290">圣赫勒拿 290</li>

                            <li class="form-site-item" code="223">圣马力诺 223</li>

                            <li class="form-site-item" code="592">圭亚那 592</li>

                            <li class="form-site-item" code="255">坦桑尼亚 255</li>

                            <li class="form-site-item" code="20">埃及 20</li>

                            <li class="form-site-item" code="251">埃塞俄比亚 251</li>

                            <li class="form-site-item" code="686">基里巴斯 686</li>

                            <li class="form-site-item" code="221">塞内加尔 221</li>

                            <li class="form-site-item" code="232">塞拉利昂 232</li>

                            <li class="form-site-item" code="357">塞浦路斯 357</li>

                            <li class="form-site-item" code="248">塞舌尔 248</li>

                            <li class="form-site-item" code="52">墨西哥 52</li>

                            <li class="form-site-item" code="1808">夏威夷 1808</li>

                            <li class="form-site-item" code="228">多哥 228</li>

                            <li class="form-site-item" code="43">奥地利 43</li>

                            <li class="form-site-item" code="58">委内瑞拉 58</li>

                            <li class="form-site-item" code="1808">威克岛 1808</li>

                            <li class="form-site-item" code="880">孟加拉国 880</li>

                            <li class="form-site-item" code="244">安哥拉 244</li>

                            <li class="form-site-item" code="1809">安圭拉岛 1809</li>

                            <li class="form-site-item" code="505">尼加拉瓜 505</li>

                            <li class="form-site-item" code="234">尼日利亚 234</li>

                            <li class="form-site-item" code="227">尼日尔 227</li>

                            <li class="form-site-item" code="977">尼泊尔 977</li>

                            <li class="form-site-item" code="1809">巴哈马 1809</li>

                            <li class="form-site-item" code="92">巴基斯坦 92</li>

                            <li class="form-site-item" code="1809">巴巴多斯 1809</li>

                            <li class="form-site-item" code="595">巴拉圭 595</li>

                            <li class="form-site-item" code="507">巴拿马 507</li>

                            <li class="form-site-item" code="973">巴林 973</li>

                            <li class="form-site-item" code="55">巴西 55</li>

                            <li class="form-site-item" code="226">布基拉法索 226</li>

                            <li class="form-site-item" code="257">布隆迪 257</li>

                            <li class="form-site-item" code="30">希腊 30</li>

                            <li class="form-site-item" code="349">德国 349</li>

                            <li class="form-site-item" code="39">意大利 39</li>

                            <li class="form-site-item" code="677">所罗门群岛 677</li>

                            <li class="form-site-item" code="243">扎伊尔 243</li>

                            <li class="form-site-item" code="47">挪威 47</li>

                            <li class="form-site-item" code="210">摩洛哥 210</li>

                            <li class="form-site-item" code="673">文莱 673</li>

                            <li class="form-site-item" code="679">斐济 679</li>

                            <li class="form-site-item" code="268">斯威士兰 268</li>

                            <li class="form-site-item" code="94">斯里兰卡 94</li>

                            <li class="form-site-item" code="65">新加坡 65</li>

                            <li class="form-site-item" code="64">新西兰 64</li>

                            <li class="form-site-item" code="81">日本 81</li>

                            <li class="form-site-item" code="239">普林西比 239</li>

                            <li class="form-site-item" code="56">智利 56</li>

                            <li class="form-site-item" code="850">朝鲜 850</li>

                            <li class="form-site-item" code="855">柬埔寨 855</li>

                            <li class="form-site-item" code="299">格陵兰岛 299</li>

                            <li class="form-site-item" code="396">梵蒂冈 396</li>

                            <li class="form-site-item" code="32">比利时 32</li>

                            <li class="form-site-item" code="222">毛里塔尼亚 222</li>

                            <li class="form-site-item" code="230">毛里求斯 230</li>

                            <li class="form-site-item" code="676">汤加 676</li>

                            <li class="form-site-item" code="966">沙特阿拉伯 966</li>

                            <li class="form-site-item" code="33">法国 33</li>

                            <li class="form-site-item" code="594">法属圭亚那 594</li>

                            <li class="form-site-item" code="298">法罗群岛 298</li>

                            <li class="form-site-item" code="48">波兰 48</li>

                            <li class="form-site-item" code="1809">波多黎各 1809</li>

                            <li class="form-site-item" code="66">泰国 66</li>

                            <li class="form-site-item" code="263">津巴布韦 263</li>

                            <li class="form-site-item" code="504">洪都拉斯 504</li>

                            <li class="form-site-item" code="509">海地 509</li>

                            <li class="form-site-item" code="61">澳大利亚 61</li>

                            <li class="form-site-item" code="853">中国澳门特别行政区 853</li>

                            <li class="form-site-item" code="353">爱尔兰 353</li>

                            <li class="form-site-item" code="1809">牙买加 1809</li>

                            <li class="form-site-item" code="591">玻利维亚 591</li>

                            <li class="form-site-item" code="674">瑙鲁 674</li>

                            <li class="form-site-item" code="46">瑞典 46</li>

                            <li class="form-site-item" code="41">瑞士 41</li>

                            <li class="form-site-item" code="678">瓦努阿图 678</li>

                            <li class="form-site-item" code="262">留尼旺岛 262</li>

                            <li class="form-site-item" code="350">直布罗陀 350</li>

                            <li class="form-site-item" code="500">福克兰群岛 500</li>

                            <li class="form-site-item" code="682">科克群岛 682</li>

                            <li class="form-site-item" code="965">科威特 965</li>

                            <li class="form-site-item" code="269">科摩罗 269</li>

                            <li class="form-site-item" code="225">科特迪瓦 225</li>

                            <li class="form-site-item" code="6722">科科斯岛 6722</li>

                            <li class="form-site-item" code="51">秘鲁 51</li>

                            <li class="form-site-item" code="216">突尼斯 216</li>

                            <li class="form-site-item" code="252">索马里 252</li>

                            <li class="form-site-item" code="962">约旦 962</li>

                            <li class="form-site-item" code="264">纳米比亚 264</li>

                            <li class="form-site-item" code="683">纽埃岛 683</li>

                            <li class="form-site-item" code="1809">维尔京群岛 1809</li>

                            <li class="form-site-item" code="95">缅甸 95</li>

                            <li class="form-site-item" code="40">罗马尼亚 40</li>

                            <li class="form-site-item" code="1">美国 1</li>

                            <li class="form-site-item" code="856">老挝 856</li>

                            <li class="form-site-item" code="254">肯尼亚 254</li>

                            <li class="form-site-item" code="358">芬兰 358</li>

                            <li class="form-site-item" code="249">苏丹 249</li>

                            <li class="form-site-item" code="597">苏里南 597</li>

                            <li class="form-site-item" code="44">英国 44</li>

                            <li class="form-site-item" code="31">荷兰 31</li>

                            <li class="form-site-item" code="258">莫桑比克 258</li>

                            <li class="form-site-item" code="266">莱索托 266</li>

                            <li class="form-site-item" code="63">菲律宾 63</li>

                            <li class="form-site-item" code="503">萨尔瓦多 503</li>

                            <li class="form-site-item" code="351">葡萄牙 351</li>

                            <li class="form-site-item" code="976">蒙古 976</li>

                            <li class="form-site-item" code="34">西班牙 34</li>

                            <li class="form-site-item" code="685">西萨摩亚 685</li>

                            <li class="form-site-item" code="6723">诺福克岛 6723</li>

                            <li class="form-site-item" code="229">贝宁 229</li>

                            <li class="form-site-item" code="260">赞比亚 260</li>

                            <li class="form-site-item" code="240">赤道几内亚 240</li>

                            <li class="form-site-item" code="84">越南 84</li>

                            <li class="form-site-item" code="93">阿富汗 93</li>

                            <li class="form-site-item" code="213">阿尔及利亚 213</li>

                            <li class="form-site-item" code="355">阿尔巴尼亚 355</li>

                            <li class="form-site-item" code="1907">阿拉斯加 1907</li>

                            <li class="form-site-item" code="968">阿曼 968</li>

                            <li class="form-site-item" code="54">阿根廷 54</li>

                            <li class="form-site-item" code="247">阿森松 247</li>

                            <li class="form-site-item" code="297">阿鲁巴岛 297</li>

                            <li class="form-site-item" code="82">韩国 82</li>

                            <li class="form-site-item" code="852">中国香港特别行政区 852</li>

                            <li class="form-site-item" code="960">马尔代夫 960</li>

                            <li class="form-site-item" code="265">马拉维 265</li>

                            <li class="form-site-item" code="596">马提尼克 596</li>

                            <li class="form-site-item" code="356">马耳他 356</li>

                            <li class="form-site-item" code="261">马达加斯加 261</li>

                            <li class="form-site-item" code="223">马里 223</li>

                            <li class="form-site-item" code="961">黎巴嫩 961</li>

                            <li class="form-site-item" code="60">马来西亚 60</li>

                        </ul>
                    </div>
                </div>
                <div class="hot-coin-form-item">
                    <span class="iconfont icon-zhuanghao hot-coin-icon-span"></span>
                    <label for="">
                        <input type="text" id="reset-email" value="" placeholder="{{__('vail.first-place1')}}"/>
                    </label>
                </div>

                <div class="hot-coin-form-item">
                    <span class="iconfont icon-shenfenzheng hot-coin-icon-span" ></span>
                    <label for="">
                        <select  id="reset-idcard" class="hot-coin-reset-idcard">
                            <option value="1">{{__('vail.first-idcard')}}</option>
                        </select>
                    </label>
                </div>


                <div class="hot-coin-form-item">
                    <span class="iconfont icon-zhengjian hot-coin-icon-span"></span>
                    <label for="">
                        <input type="text" id="reset-idcardno" value="" placeholder="{{__('vail.first-place2')}}"/>
                    </label>
                </div>

                <div class="hot-coin-form-item" style="position:relative">
                    <span class="iconfont icon-yanzhengma hot-coin-icon-span" ></span>
                    <label for="">
                        <input type="text" id="reset-imgcode" value="" style="width:220px" placeholder="{{__('vail.first-place3')}}"/>
                    </label>
                    <a   style="display:inline-block;position:absolute;top:11px;right:3px;height:50px;text-decoration:underline" >
                        <img  id="btn-imgcode" alt="" style="height:48px" src="/vailImg.html" /></a>
                </div>

                <div class="hot-coin-form-item reset-phone" style="position:relative;display: none;">
                    <span class="iconfont icon-shoujiyanzheng hot-coin-icon-span" ></span>
                    <label for="">
                        <input type="text" id="reset-msgcode" placeholder="{{__('vail.first-place7')}}" value="" />
                    </label>
                    <a type="button" id="reset-sendmessage"   style="display:inline-block;position:absolute;top:28px;right:16px;text-decoration: underline"
                       data-msg-type="109"  data-tipsid="register-phone-areacode" class="form-item-btn  btn-sendphonecode">{{__('vail.first-getCode')}}</a>
                </div>


                <div class="hot-coin-form-btn" style="margin-top:30px;margin-bottom:30px">
                    <a  id="btn-email-next" href="javascript:void(0)" style="display:block">{{__('vail.first-next')}}</a>
                </div>


            </form>

        </div>
    </div>
</div>

@endsection
@section('js')
    <script src="{{ asset('js/custom.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/plugin/layer/layer.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/comm/util.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/comm/comm.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/comm/msg.js') }}" type="text/javascript" charset="utf-8"></script>
    @if (!isset($_COOKIE['oex_lan']) || $_COOKIE['oex_lan'] =='zh_TW')
        <script src="{{ asset('js/language/language_zh_TW.js') }}" type="text/javascript" charset="utf-8"></script>
    @else
        <script src="{{ asset('js/language/language_en_US.js') }}" type="text/javascript" charset="utf-8"></script>

    @endif
    <script src="{{ asset('js/user/reset.js') }}" type="text/javascript" charset="utf-8"></script>

@endsection


