

var real_name_authentication =' <div  style="width:540px;">\n' +
    '                <div class=" c2c_elastic_title ">\n' +
    '                    <p style="font-size:24px;height:40px;line-height:50px">实名认证</p>\n' +
    '                    <p style="font-size:12px;height:30px;line-height:30px">认证年龄需18周岁，最高年龄为60周岁</p>\n' +
    '                </div>\n' +
    '                        <div class="c2c_elastic_wrap " style="width:410px;">\n' +
    '                               <form>\n' +
    '                                       <div class="c2c_elastic_item clearfix">\n' +
    '                                              <label>真实姓名:</label>\n' +
    '                                               <div class="c2c_elastic_item_input">\n' +
    '                                                      <input type="text" name="user_name"  class="add_bank_user_name">\n' +
    '                                                        <p class="elastic_tips">提示：实名认证后信息将不能够更改，请如实填写</p>\n' +
    '                                                    </div>\n' +
    '                                            </div>\n' +
    '                                        <div class="c2c_elastic_item clearfix">\n' +
    '                                                <label>地区/国家:</label>\n' +
    '                                                <div class="c2c_elastic_item_input">\n' +
    '                                                      <select  name="bank"  class="add_bank_user_name">\n' +
    '                                                                <option>中国建设银行</option>\n' +
    '                                                               <option>中国建设银行</option>\n' +
    '                                                                <option>中国建设银行</option>\n' +
    '                                                                <option>中国建设银行</option>\n' +
    '                                                      </select>\n' +
    '                                                    </div>\n' +
    '                                            </div>\n' +
    '\n' +
    '                                        <div class="c2c_elastic_item clearfix">\n' +
    '                                                <label>证件类型:</label>\n' +
    '                                                <div class="c2c_elastic_item_input">\n' +
    '                                                    <select  name="bank"  class="add_bank_user_name">\n' +
    '                                                        <option>中国建设银行</option>\n' +
    '                                                        <option>中国建设银行</option>\n' +
    '                                                        <option>中国建设银行</option>\n' +
    '                                                        <option>中国建设银行</option>\n' +
    '                                                    </select>\n' +
    '                                                 </div>\n' +
    '                                            </div>\n' +
    '                                        <div class="c2c_elastic_item clearfix">\n' +
    '                                                <label>证件号码:</label>\n' +
    '                                                <div class="c2c_elastic_item_input">\n' +
    '                                                        <input type="text" name="user_name"  class="add_bank_user_name" placeholder="填写身份证号">\n' +
    '                                                    </div>\n' +
    '                                            </div>\n' +
    '                                        <div class="c2c_elastic_item" style="text-align:center">\n' +
    '\n' +
    '                                            <button>确认提交</button>\n' +
    '\n' +
    '                                        </div>\n' +
    '\n' +
    '                                    </form>\n' +
    '                            </div>\n' +
    '                   </div>' ;


var set_exchange_password = '<div  style="width:540px;">\n' +
    '        <div class=" c2c_elastic_title elastic_add_bankcard">设置交易密码</div>\n' +
    '        <div class="c2c_elastic_wrap " style="width:400px">\n' +
    '                    <form>\n' +
    '                        <div class="c2c_elastic_item clearfix">\n' +
    '                            <label>交易密码:</label>\n' +
    '                            <div class="c2c_elastic_item_input">\n' +
    '                                <input type="password" name="password" class="add_bank_user_name">\n' +
    '                                <p class="elastic_tips">提示：实名认证后信息将不能够更改，请如实填写</p>\n' +
    '                            </div>\n' +
    '                        </div>\n' +
    '                        <div class="c2c_elastic_item clearfix">\n' +
    '                            <label>确认交易密码:</label>\n' +
    '                            <div class="c2c_elastic_item_input">\n' +
    '                                <input type="password" name="repassword" class="add_bank_user_name" placeholder="填写交易密码">\n' +
    '                            </div>\n' +
    '                        </div>\n' +
    '                        <div class="c2c_elastic_item clearfix">\n' +
    '                            <label>谷歌验证码:</label>\n' +
    '                            <div class="c2c_elastic_item_input">\n' +
    '                                <input type="text" name="user_name"  class="add_bank_user_name" placeholder="填写谷歌验证码">\n' +
    '                            </div>\n' +
    '                        </div>\n' +
    '                        <div class="c2c_elastic_item clearfix" >\n' +
    '                            <div class="form-search">\n' +
    '                                <label style="line-height:13px;width:300px">\n' +
    '                                    <input type="checkbox" id="remember" value="" checked="checked" style="width:9px;height:14px" >\n' +
    '                                    我保证信息真实，非盗用他人证件\n' +
    '                                </label>\n' +
    '                            </div>\n' +
    '                        </div>\n' +
    '                        <div class="c2c_elastic_item" style="text-align:center">\n' +
    '\n' +
    '                            <button>确认提交</button>\n' +
    '\n' +
    '                        </div>\n' +
    '\n' +
    '                    </form>\n' +
    '                </div>\n' +
    '    </div>';


var exchange_notice = '    <div  style="width:540px;">\n' +
    '        <div class=" c2c_elastic_title elastic_add_bankcard">温馨提示</div>\n' +
    '        <div class="c2c_elastic_wrap " style="width:400px">\n' +
    '            <div style="color:#444;font-size:14px;color:#044444;font-weight:bold">为了确保您的账户资金安全，请输入您的交易密码进行安全确认</div>\n' +
    '            <div class="c2c_elastic_item clearfix">\n' +
    '                <label>交易密码:</label>\n' +
    '                <div class="c2c_elastic_item_input">\n' +
    '                    <input type="password" name="password" id="exchange_password" class="add_bank_user_name" placeholder="填写交易密码">\n' +
    '                </div>\n' +
    '            </div>\n' +
    '            <div class="c2c_elastic_item" style="text-align:center">\n' +
    '                <button class="j_exchange_notice_configure" onclick="bank_confirm()" >确认提交</button>\n' +
    '            </div>\n' +
    '        </div>\n' +
    '    </div>';
