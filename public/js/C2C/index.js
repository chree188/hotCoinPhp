var user={};
var tableReload='';
var clearTime='';
var buyExpireTime='30';
get_params_info();
layui.use(['table','jquery'], function(){
    var table = layui.table;
    var jquery =layui.jquery;
    start_time = jquery('#start_time').val();
    end_time = jquery('#end_time').val();
    var tablelns=table.render({
        elem: '#exchange_history_record',
        height: 525,
        width:1120,
        method:'get',
        where:{
            startTime:jquery('#start_time').val(),
            endTime:jquery('#end_time').val(),
            type:jquery('#exchange_type').val(),
            status:jquery('#exchange_status').val(),
        },
        headers: {token: 'sasasas'},
        response: {
            statusName: 'code' //数据状态的字段名称，默认：code
            ,statusCode: 200 //成功的状态码，默认：0
            ,msgName: 'msg' //状态信息的字段名称，默认：msg
            ,countName: 'total' //数据总数的字段名称，默认：count
            ,dataName: 'list' //数据列表的字段名称，默认：data
        },
        url: '/consumer/record', //数据接口
        page: true, //开启分页,
        limits:[10],
        id:'listTable',
        cols: [[ //表头
            // {field: 'id', title: 'ID',  sort: true, fixed: 'center'},
            {field: 'orderNumber', title: util.getLan('consumer.index.1'),width:'10%'},
            {field: 'createTime', title: util.getLan('consumer.index.2'),width:'16%',templet:function(row){
                return timetrans(row.createTime);
            }},
            {field: 'remark', title: util.getLan('consumer.index.3')},
            {field: 'type', title: util.getLan('consumer.index.4'),templet:function(row){
                    var str='-';
                    if(row.type==1){
                        // str = "买入"
                        str = util.getLan("consumer.type.1")
                    }else if(row.type ==2){
                        // str = "卖出"
                        str = util.getLan("consumer.type.2")
                    }
                    return str;
                } },
            {field: 'amount', title:util.getLan('consumer.index.6'), sort: true},
            {field: 'money', title: util.getLan('consumer.index.5'), sort: true},

            {field: 'status', title: util.getLan('consumer.index.7'),templet:function(row){
                var str='-';
                if(row.status==1){
                    if(row.type == 1){
                        var currentTime = new Date().getTime();
                        if(currentTime-row.createTime <parseInt(buyExpireTime)*60*1000){
                            setClick(parseInt(row.createTime)+parseInt(buyExpireTime)*60*1000);
                            timeColor= "color:#0CA703;";
                            timeDis= "display:inline-block";
                        }else{
                            timeColor = "";
                            timeDis = "display:none;";
                            window.clearInterval(clearTime);
                        }
                        str='';
                        str += '<div>';
                        str += '<span style="'+timeColor+'">'+util.getLan("consumer.type.3")+'</span>';
                        str += '<span class="timer" style="'+timeColor+''+timeDis+'">(<span class="minute">00</span>分<span class="second">00</span>秒)</span>';
                        str += '</div>';
                    }else{
                        str = '<span style="color:#0CA703;">'+util.getLan("consumer.type.3")+'</span>';
                    }

                }else if(row.status ==2){
                    str = "<span>"+util.getLan("consumer.type.4")+"</span>";

                }else if(row.status==3){
                    str = "<span style='color:#EA5B25'>"+util.getLan("consumer.type.5")+"</span>";
                    // str = "<div style='height:40px'><div style='height:14px;line-height:14px;'>已撤销</div><div style='height:14px;line-height:14px;'>(<span class=\"minute\">00</span>分<span class=\"second\">00</span>秒)</div></div>";
                }else{
                    str = "<span>"+util.getLan("consumer.type.6")+"</span>"
                }
                return str;
            }},
            {field: 'oper', title: util.getLan('consumer.index.8'),templet:function(row) {
                    var str='';
                    if(row.type ==1 && row.status ==1){
                        str += '<button class="list_show_detail j_list_show_buy_detail"  data-id="'+row.id+'"  style="margin-left:5px;border-radius:5px;font-size:14px;color:#444;background-color:#fff;width:60px;80px;border:1px solid #E6E6E6">'+util.getLan('consumer.index.9')+'</button>'

                    }else if(row.type ==2 && row.status ==1){
                        str += '<button class="list_show_detail j_list_show_sell_detail" data-id="'+row.id+'"  style="margin-left:5px;border-radius:5px;font-size:14px;color:#444;background-color:#fff;width:60px;80px;border:1px solid #E6E6E6">'+util.getLan('consumer.index.9')+'</button>'
                    } else{
                        str +='--';
             //           str +='<button class="list_confirm" style="background-color:#0CA703;border-radius:5px;font-size:14px;color:#fff;width:80px;border:1px solid #fff">确认打款</button>'
             //            str +='<button class="list_show_detail"  style="margin-left:5px;border-radius:5px;font-size:14px;color:#444;background-color:#fff;width:60px;80px;border:1px solid #E6E6E6">查看</button>'
             //           str +='<button class="list_cancel" style="margin-left:5px;border-radius:5px;font-size:14px;color:#444;background-color:#fff;width:60px;80px;border:1px solid #E6E6E6">撤除</button>'
                    }
                    return str;
             }},
            // {field: 'oper1', title: '操作',width:'18%',toolbar:'#barDemo'},

        ]],
        done:function (res,curr,count) {
            jquery('.j_list_show_buy_detail').click(function(){
                data_id=jquery(this).attr('data-id');
                userfunc.orderBuyDetail(data_id);
            });

            jquery('.j_list_show_sell_detail').click(function(){
                data_id=jquery(this).attr('data-id');
                userfunc.orderSellDetail(data_id);
            });
        }
    });

    // table.on('tool(orderList)', function(obj){
    //     var data = obj.data;
    //     if(obj.event === 'detail'){
    //         layer.msg('ID：'+ data.id + ' 的查看操作');
    //         order.buy_detail();
    //     } else if(obj.event === 'del'){
    //         layer.confirm('真的撤销吗', function(index){
    //             obj.del();
    //             layer.close(index);
    //         });
    //     } else if(obj.event === 'edit'){
    //         layer.alert('编辑行：<br>'+ JSON.stringify(data))
    //     }
    // });
    userfunc.orderBuyDetail=function(id){
        var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
        });
        jquery.post({
            url: '/consumer/orderdetail',
            data:{orderId:id},
            dataType:'json',
            success:function(msg){
                layer.close(index);
                if(msg.code==200){
                    layer.closeAll();
                    data_user_detail(msg.data,1);
                    order.buy_detail();

                }else if(msg.code==401){
                    window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
                }
                else{
                    layer.msg(util.getLan('consumer.notice.1'));
                }
            }
        })
    }

    userfunc.orderSellDetail=function(id){
        var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
        });
        jquery.post({
            url: '/consumer/orderdetail',
            data:{orderId:id},
            dataType:'json',
            success:function(msg){
                layer.close(index);
                if(msg.code==200){
                    console.log(msg);
                    data_user_detail(msg.data,2);
                    layer.closeAll();
                    order.sell_detail();
                }else if(msg.code==401){
                    window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
                }
                else{
                    console.log(msg);
                }
            },
            error:function(msg){
                layer.close(index);
            }
        })
    }

    jquery('#exchange_type').change(function(){
        tableReload();
    })
    jquery('#exchange_status').change(function(){
        tableReload();
    })



    tableReload=function(){
        tablelns.reload( {
            page: {
                curr: 1 //重新从第 1 页开始
            }
            ,where: {
                startTime:jquery('#start_time').val(),
                endTime:jquery('#end_time').val(),
                type:jquery('#exchange_type').val(),
                status:jquery('#exchange_status').val(),
            }
        });
    }

});

layui.use('laydate', function(){
    var laydate = layui.laydate;

    //执行一个laydate实例
    laydate.render({
        elem: '#start_time', //指定元素
        done:function(value,date){
            tableReload();
        }
    });
    laydate.render({
        elem: '#end_time', //指定元素
        done:function(value,date){
            tableReload();
        }
    });
});

layui.use('jquery',function () {
    var jquery = layui.jquery;

    jquery('.j_add_bank_card').click(function(){
        layer.closeAll();
        bank.add_bank_card();
    });
    jquery('.j_manage_bank_card').click(function(){
        var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
        });
        jquery.post({
            url: '/consumer/banklist',
            data:{},
            dataType:'json',
            success:function(msg){
                layer.close(index);
                if(msg.code==200){
                    console.log(msg);
                    showbanklist(msg.data);
                    if(msg.data && msg.data.length>0){
                        // layer.closeAll();
                        bank.manage_bank_card();
                    }else{
                        layer.msg(util.getLan('consumer.notice.2'));
                    }

                }else if(msg.code ==401){
                    window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
                }
                else{
                    console.log(msg);
                }
            }
        })
    });


    jquery('.j_order_buy_button').click(function(){

        var data={};
        data.amount = jquery('#order_buy_num').val();
        data.type = 1;
        data.businessId = $('#buy_business_id').val();
        var min_price = jquery('.j_min_buy_price').html();
        var total_price = jquery('.j_buy_total_price').html();
        if(parseInt(total_price)<parseInt(min_price)){
            layer.msg(util.getLan('consumer.content.6'));
            return;
        }
        var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
        });
        jquery.post({
            url: '/consumer/order',
            data:data,
            dataType:'json',
            success:function(msg){
                layer.close(index);
                if(msg.code==200){
                    layer.closeAll();
                    order.buy_detail();
                    data_user_detail(msg.data,1);
                    tableReload();
                }else if(msg.code==401){
                    window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
                }
                else{
                    layer.msg(msg.msg);
                }
            }
        });

    });
    jquery('.j_order_sell_button').click(function(){

        var data={};
        data.amount = jquery('#order_sell_num').val();
        data.type = 2;
        data.businessId = $('#sell_business_id').val();
        var min_price = jquery('.j_min_sell_price').html();
        var total_price = jquery('.j_sell_total_price').html();
        var available = jquery('#available_get').html();
        if(parseInt(total_price)<parseInt(min_price)){
            // layer.msg("卖出总价不能小于最小卖出金额");
            layer.msg(util.getLan('consumer.content.4'));
            return;
        }
        if(parseInt(total_price)>parseInt(available)){
            // layer.msg("可用GSET不足");
            layer.msg(util.getLan('consumer.content.5'));
            return;
        }
        var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
        });
        jquery.post({
            url: '/consumer/order',
            data:data,
            dataType:'json',
            success:function(msg){
                layer.close(index);
                if(msg.code==200){
                    layer.closeAll();
                    // data_user_detail(msg.data,2);
                    order.confirm_notice();
                    tableReload();
                    getUserdGset();
                }else if(msg.code ==401){
                    window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
                }
                else{
                    layer.msg(msg.msg);
                }
            }
        });
    });

    // jquery('.j_order_sell_button').click(function(){
    //     layer.closeAll();
    //     order.sell_detail();
    // });

    jquery('.j_list_show_buy_detail').click(function(){
        layer.closeAll();
        order.buy_detail();
    });

    jquery('.j_list_show_sell_detail').click(function(){
        layer.closeAll();
        order.sell_detail();
    });

    jquery('.j_order_buy_button_all').click(function(){
        layer.closeAll();
    });

    jquery('.j_bank_submit').click(function(){
        var data=getBankform();

        if (data.realName == "") {
            // util.showerrortips("binderrortips", util.getLan("finance.tips.1"));
            layer.msg(util.getLan("finance.tips.1"));
            return;
        }
        if (data.bankId == -1) {
            // util.showerrortips("binderrortips", util.getLan("finance.tips.2"));
            layer.msg(util.getLan("finance.tips.2"));
            return;
        }
        var reg = /^(\d{16}|\d{17}|\d{18}|\d{19})$/;
        if (!reg.test(data.account)) {
            // 银行卡号不合法
            // util.showerrortips("binderrortips", util.getLan("finance.tips.3"));
            layer.msg(util.getLan("finance.tips.3"));
            return;
        }
        if (data.account == "" || data.account.length > 200) {
            // util.showerrortips("binderrortips", util.getLan("finance.tips.3"));
            layer.msg( util.getLan("finance.tips.3"));
            return;
        }
        var account2 = util.trim($("#account2").val());
        if (data.account != account2) {
            // util.showerrortips("binderrortips", util.getLan("finance.tips.5"));
            layer.msg( util.getLan("finance.tips.5"));
            return;
        }
        if ((data.prov == "" || data.prov == "请选择") || (data.city == "" || data.city == "请选择") || data.address == "") {
            // util.showerrortips("binderrortips", util.getLan("finance.tips.6"));
            layer.msg( util.getLan("finance.tips.6"));
            return;
        }
        if (data.address.length > 300) {
            // util.showerrortips("binderrortips", util.getLan("finance.tips.6"));
            layer.msg( util.getLan("finance.tips.6"));
            return;
        }

        layer.closeAll();
        if(user.tradePassword == true){
            userfunc.set_exchange_password();
        }else{
            userfunc.exchange_notice(data);
            // userfunc.exchange_confirm(data);
        }

    });
    // var index = layer.load(1, {
    //     shade: [0.1,'#fff'] //0.1透明度的白色背景
    // });
    jquery.get({
        url: '/consumer/business',
        data:{},
        dataType:'json',
        success:function(msg){
            // layer.close(index);
            console.log(msg);
            if(msg.code==200){
                var buyStr='';
                var sellStr='';
                jquery.each(msg.data.recharge,function(index,value){
                    buyStr +=' <tr>\n' +
                        '  <td><img src="/img/C2C/QQ.png"> &nbsp;'+ value.businessName+'</td>\n' +
                        '  <td>'+value.orderCount+'</td>\n' +
                        '  <td>'+value.coinCount+'</td>\n' +
                        '  <td>'+value.orderTime+util.getLan("consumer.content.1")+'</td>\n' +
                        '  <td><button class="buy_sell_button buy_button" data-buss="'+value.id+'">'+util.getLan("consumer.content.2")+'</button></td>\n' +
                        '  </tr>'
                });
                jquery.each(msg.data.withdraw,function(index,value){
                    sellStr +=' <tr>\n' +
                        '  <td><img src="/img/C2C/QQ.png"> &nbsp;'+ value.businessName+'</td>\n' +
                        '  <td>'+value.orderCount+'</td>\n' +
                        '  <td>'+value.coinCount+'</td>\n' +
                        '  <td>'+value.orderTime+util.getLan("consumer.content.1")+'</td>\n' +
                        '  <td><button class="buy_sell_button sell_button" data-buss="'+value.id+'">'+util.getLan("consumer.content.3")+'</button></td>\n' +
                        '  </tr>'
                });
                jquery('.buy_table').find('tbody').html(buyStr);
                jquery('.sell_table').find('tbody').html(sellStr);
                jquery('.buy_button').on('click',function(){
                    bussinessId = $(this).attr('data-buss');
                    // layer.closeAll();
                    order.buy_num(bussinessId);
                });
                jquery('.sell_button').on('click',function(){
                    bussinessId = $(this).attr('data-buss');
                    order.sell_num();
                });
            }else if(msg.code ==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }
            else{
                console.log(msg);

            }
        }
    })

    // jump();
    // $('.buy_sell_button buy_button').click(function(){
    //     console.log($(this).parents('tr'))
    // });
})

var bank={};
var order={};
var userfunc={};

userfunc.authentication= function(){
    layer.open({
        type: 1,
        area:['540px'],
        title:false,
        content:$('#real_name_authentication'),
        cancel:function(){
            window.location.href = "/index.html";
        }
    })
}

// userfunc.authenticationtest= function(){
//     layer.open({
//         type: 2,
//         area:['540px'],
//         title:false,
//         content:location.origin+"/js/html/auto.html",
//     })
// }

userfunc.exchange_password= function(){
    layer.open({
        type: 1,
        area:['540px'],
        title:false,
        content:$('#exchange_password')
    })
}

userfunc.exchange_notice= function(){
    layer.open({
        type: 1,
        area:['540px'],
        title:false,
        content:$('#exchange_notice'),
    })
}

userfunc.exchange_confirm= function(){
    layer.open({
        type: 1,
        area:['540px'],
        title:false,
        content:$('#exchange_confirm'),
    })
}


userfunc.set_exchange_password = function(){
    layer.open({
        type: 1,
        area:['540px','420px'],
        title:false,
        content:$('#set_exchange_password'),
        cancel:function(){
            window.location.href = "/index.html";
        }
    })
}


order.add_bank_card = function(){
    layer.open({
        type: 1,
        area:['540px'],
        title:false,
        content: $('#add_bank_card')
    });
};

bank.add_bank_card = function(){
    layer.open({
        type: 1,
        area:['540px'],
        title:false,
        content:$('#add_bank_card')
    });
};
bank.manage_bank_card = function(){
    layer.open({
        type: 1,
        area:['540px'],
        title:false,
        content: $('#manage_bank_card')
    });
};

order.confirm_notice = function(){
    layer.open({
        type: 1,
        area:['680px'],
        title:false,
        content:$('#confirm_notice'),
    })
}

order.buy_detail = function(){

    layer.open({
        type: 1,
        area:['680px'],
        title:false,
        content: $('#buy_detail')
    });
    // $.post({
    //     url: '/consumer/orderdetail',
    //     data:{bussinessId:bussinessId},
    //     dataType:'json',
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     success:function(msg){
    //         if(msg.code==200){
    //             layer.open({
    //                 type: 1,
    //                 area:['680px'],
    //                 title:false,
    //                 content: $('#buy_detail')
    //             });
    //         }else{
    //             layer.msg('数据异常');
    //         }
    //     }
    // })
};
order.sell_detail = function(){
    layer.open({
        type: 1,
        area:['680px'],
        title:false,
        content: $('#sell_detail')
    });

};
order.paymentdetail = function(){
    layer.open({
        type: 1,
        area:['680px'],
        title:false,
        content: $('#payment_detail')
    });
};
order.buy_num = function(bussinessId){
    var index = layer.load(1, {
        shade: [0.1,'#fff'] //0.1透明度的白色背景
    });
    $('#buy_business_id').val(bussinessId);
    $.post({
        url: '/consumer/setting',
        data:{},
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            layer.close(index);
            if(msg.code==200){
                param_setting(msg.data,1);
                layer.open({
                    type: 1,
                    area:['540px'],
                    title:false,
                    content:$('#buy_num')
                });
            }else if(msg.code==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }
            else{
                layer.msg(msg.msg);
            }
        }
    })
};



order.sell_num = function(){
    $('#sell_business_id').val(bussinessId);
    var index = layer.load(1, {
        shade: [0.1,'#fff'] //0.1透明度的白色背景
    });
    $.post({
        url: '/consumer/setting',
        data:{},
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            layer.close(index);
            if(msg.code==200){
                param_setting(msg.data,2);
                layer.open({
                    type: 1,
                    area:['540px'],
                    title:false,
                    content:$('#sell_num')
                });
            }else if(msg.code==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }
            else{
                layer.msg(msg.msg);
            }
        }
    })

};

// var bussinessId ='';

function param_setting(data,type){
    if(type==1){
        $('.j_min_buy_price').html(data.minBuyAmount);
        $('.j_single_buy_price').html(data.buyPrice);
    }else{
        $('.j_min_sell_price').html(data.minSellAmount);
        $('.j_single_sell_price').html(data.sellPrice);
    }
}

$('#order_sell_num').on('input',function(){
    sell_num = $(this).val();
    // single_sell_price = $('.j_min_sell_price').html();
    single_sell_price = $('.j_single_sell_price').html();
    total = (parseFloat(sell_num) * parseFloat(single_sell_price)).toString();
    // total = (sell_num * single_sell_price).toFixed(2);
    $('.j_sell_total_price').html(total);
})

$('#order_buy_num').on('input',function(){
    buy_num = $(this).val();
    // single_buy_price = $('.j_min_buy_price').html();
    single_buy_price = $('.j_single_buy_price').html();
    total = buy_num * single_buy_price;
    $('.j_buy_total_price').html(total);
})


function jump(){
    $.post({
        url: '/consumer/getuserinfo',
        data:{},
        // async:false,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            if(msg.code==200){
                user.isTelephoneBind = msg.data.isTelephoneBind;
                user.login= msg.data.login;
                user.needTradePasswd = msg.data.needTradePasswd;
                user.tradePassword = msg.data.tradePassword;
                user.isRealNameVerify = msg.data.isRealNameVerify;
                user.identity = msg.data.identity;
                console.log(user);
                if(user.tradePassword){
                    setTimeout(function(){
                        userfunc.set_exchange_password();
                    },1000);
                    // userfunc.set_exchange_password();
                }else{
                    is_authentication();
                }

            }else if(msg.code==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }else{
                layer.msg(msg.msg);
            }
        }
    })

}


function getUserdGset(){
    var data={};
    data.tradeid = 8;
    $.post({
        url: '/real/userassets.html',
        data:data,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            if(msg.code==200){
                $('#available_get').html(msg.data.buyCoin.total);
                // layer.msg(msg.msg);
            }else if(msg.code==401){
                layer.msg(util.getLan('consumer.content.7'));
                setTimeout(function(){
                    window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
                },1000)
            }else{
                layer.msg(msg.msg);
            }
        }
    })

}


$('.j_authentication_submit').on('click',function(){
    var data = {};
    data.realname = $("#bindrealinfo-realname").val();
    data.address = $("#bindrealinfo-address").find("option:selected").text();
    data.identitytype = $("#bindrealinfo-identitytype").val();
    data.identityno = $("#bindrealinfo-identityno").val();
    var ckinfo = $("#bindrealinfo-ckinfo").is(':checked');

    if (!ckinfo) {
        layer.msg(util.getLan("user.tips.29"));
        return;
    }
    if (data.realname.length > 50 || data.realname.trim() == "") {
        layer.msg(util.getLan("user.tips.30"));
        return;
    }

    $.post({
        url: '/real_name_auth.html',
        data:data,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            if(msg.code==200){
                // layer.msg(msg.msg);
                layer.msg(util.getLan('consumer.content.8'));
                setTimeout(function(){
                    window.location.href="/index.html";
                },2000);
            }else if(msg.code ==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            } else{
                layer.msg(msg.msg);
                // window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }
        }
    })
});

$('.j_confirm_notice_submit').on('click',function(){
    layer.closeAll();
})

$('.j_set_password_confirm').on('click',function(){
    var data = {};
    data.newPwd = $("#set_password").val();
    data.reNewPwd =$("#re_set_password").val();
    data.totpCode =$.trim($("#set_google_code").val());
    data.pwdType =1;

    if(!data.newPwd && !data.reNewPwd){
        // layer.msg('密码不能为空');
        layer.msg(util.getLan("consumer.notice.3"));
        return;
    }
    if(data.newPwd != data.reNewPwd){
        // layer.msg('两次输入的密码不一致');
        layer.msg(util.getLan("consumer.notice.4"));
        return;
    }
    if(!data.totpCode){
        // layer.msg('输入的谷歌验证码不能为空');
        layer.msg(util.getLan("consumer.notice.5"));
        return;
    }

    if (!/^[0-9]{6}$/.test(data.totpCode)) {
        layer.msg(util.getLan("consumer.notice.6"));
        return;
    }
    
    $.post({
        url: '/user/modify_passwd.html',
        data:data,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
           // layer.closeAll();
            if(msg.code==200){
                layer.msg(msg.msg);
                is_authentication();
            }else if(msg.code == 300){
                // layer.msg("你还没有设置谷歌验证码，请到个人中心设置");
                layer.msg(msg.msg);
                // window.setTimeout(function () {
                //     window.location.href = "/user/security.html";
                // }, 2000);
            }else if(msg.code ==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }else{
                layer.msg(msg.msg);
                // window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }
        }
    })
});

/**
 * 表单内容清除区
 */
function authentication_form_reset(){
    $('#authentication_form')[0].reset();
}

function set_exchange_password_form_reset(){
    $('#set_exchange_password_form')[0].reset();
}

function add_bank_form_reset(){
    $('#add_bank_form')[0].reset();
    $('#realName').val(user.fname);
}
/**
 * 表单内容清除区结束
 */

function is_authentication(){
    layer.closeAll();
    if(user.identity == null || user.identity == '' || user.identity == 'undefined' ){
        // setTimeout(function(){
        //     userfunc.authentication();
        // },1000)
        userfunc.authentication();
    }else if(user.identity.fstatus == 2){
        layer.alert('你的实名认证信息被驳回，请重新认证', {
            skin: 'layui-layer-lan' //样式类名
            ,closeBtn: 0
        }, function(){
            layer.closeAll();
            userfunc.authentication();
        });
        // layer.msg('你的实名认证信息被驳回，请重新认证');
        // setTimeout(function(){
        //     userfunc.authentication();
        // },2000);

    } else if(user.identity.fstatus == 0){
        layer.alert('实名信息正在审核中', {
            skin: 'layui-layer-lan' //样式类名
            ,closeBtn: 0
        }, function(){
            window.location.href = "/index.html";
        });
        // layer.msg('实名信息正在审核中');
        // setTimeout(function(){},2000);
    }else{
        user.fname = user.identity.fname;
        $('#realName').val(user.identity.fname);
    }
}


function showbanklist(data){
    var str = '';
    $.each(data,function(index,value){
        if(value.isDefault==1){
            default_class="default_active"
            default_value="默认卡"
        }else{
            default_class="";
            default_value="设为默认卡"
        }
        str +=  '                        <div class="manage_card">\n' +
            '                                <input type="hidden" class="j_bank_info" value="'+value.fid+'">' +
            '                                <input type="hidden" class="j_bank_default" value="'+value.isDefault+'">\n' +
            '                                <img src="/img/C2C/bank_delete.png"  class="j_delete_bank" style="position:absolute;right:-17px;bottom:-17px">\n' +
            '                                <div class="manage_card_item clearfix">\n' +
            '                                        <div class="manage_card_item_left">\n' +
            '                                                <img src="'+value.logo+'"><span class="elastic_bank_name">'+value.fname+'</span>\n' +
            '                                        </div>\n' +
            '                                        <div class="manage_card_item_right j_manage_default_card '+default_class+'">\n' +
            '                                                <span class="j_set_default_card">'+default_value+'</span>\n' +
            '                                        </div>\n' +
            '                                </div>\n' +
            '                                <div class="manage_card_item">\n' +
            '                                        <div class="bank_number_detail">'+value.fbanknumber+'</div>\n' +
            '                                </div>\n' +
            '                        </div>';
    });
    $('.j_bank_list_div').html(str);
}

function getbanklist(){
    $.post({
        url: '/consumer/banklist',
        data:{},
        dataType:'json',
        success:function(msg){
            // layer.close(index);
            if(msg.code==200){
                showbanklist(msg.data);
                if(msg.data && msg.data.length>0){
                    // layer.closeAll();
                    // bank.manage_bank_card();
                }else if(msg.code ==401){
                    window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
                }
                else{
                    layer.msg('您还没有添加银行卡');
                }

            }else{
                console.log(msg);
            }
        }
    })
}

$('.j_bank_list_div').on('click','.j_delete_bank',function(){
    var data={};
    data.bankId = $(this).parents('.manage_card').find('.j_bank_info').val();
    data.default = $(this).parents('.manage_card').find('.j_bank_default').val();
    if(data.default==1){
        layer.msg('默认银行卡不能删除');
        return;
    }
    $.post({
        url: '/consumer/del_bankinfo',
        data:data,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            if(msg.code==200){
                layer.msg(msg.msg);
                getbanklist();
            }else if(msg.code==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }else{
                layer.msg(msg.msg);
            }
        }
    })
});

$('.j_bank_list_div').on('click','.j_manage_default_card',function(){
    var data={};
    data.bankId = $(this).parents('.manage_card').find('.j_bank_info').val();
    // data.default = $(this).parents('.manage_card').find('.j_bank_default').val();
    $.post({
        url: '/consumer/default_bankinfo',
        data:data,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            if(msg.code==200){
                layer.msg(msg.msg);
                getbanklist();
            }else if(msg.code==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }
            else{
                layer.msg(msg.msg);
            }
        }
    })
});

function bank_confirm(){
    var data = getBankform();
    data.password = $('#exchange_password_notice').val();
    $.post({
        url: '/consumer/savebankinfo',
        data:data,
        dataType:'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            if(msg.code==200){
                layer.closeAll();
                layer.msg(msg.msg);
                add_bank_form_reset();
            }else if(msg.code==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }
            else{
                layer.msg(msg.msg);
            }
        }
    })
}

function data_user_detail(data,type){
    if(type==1){
        $('.j_buy_bankAccount').html(data.bankAccount);
        $('.j_buy_bankAddress').html(data.bankAddress);
        $('.j_buy_bankCode').html(data.bankCode);
        $('.j_buy_amount').html(data.money);
        $('.j_buy_remark').html(data.remark);
        $('.j_buy_orderNumber').html(data.orderNumber);
    }else{
        $('.j_sell_bankAccount').html(data.bankAccount);
        $('.j_sell_bankAddress').html(data.bankAddress);
        $('.j_sell_bankCode').html(data.bankCode);
        $('.j_sell_amount').html(data.money);
        $('.j_sell_remark').html(data.remark);
        $('.j_sell_orderNumber').html(data.orderNumber);
    }

}

function getBankform(){
    var data = {};
    data.realName = $("#realName").val();
    data.bankId = $("#bankId").val();
    data.account = util.trim($("#account").val());
    data.address = util.trim($("#address").val());
    data.prov = util.trim($("#prov").val());
    data.city = util.trim($("#city").val() == null ? "" : $("#city").val());
    return data;
}

function timetrans(date){
    var date = new Date(date);//如果date为10位不需要乘1000
    var Y = date.getFullYear() + '-';
    var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
    var D = (date.getDate() < 10 ? '0' + (date.getDate()) : date.getDate()) + ' ';
    var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':';
    var m = (date.getMinutes() <10 ? '0' + date.getMinutes() : date.getMinutes()) + ':';
    var s = (date.getSeconds() <10 ? '0' + date.getSeconds() : date.getSeconds());
    return Y+M+D+h+m+s;
}

function setClick(end_time){
    var clearTime=$.leftTime(end_time,function(d){
        if(!d.status){
            setTimeout(function(){
                tableReload();
            },1000);
            window.clearInterval(clearTime);
            $('.timer').css('display','none');
        }
        $('.hour').html(d.h);
        $('.minute').html(d.m);
        $('.second').html(d.s);
    });
}

function get_params_info(){
    $.post({
        url: '/consumer/setting',
        data:{},
        dataType:'json',
        anysc:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(msg){
            if(msg.code==200){
                buyExpireTime=msg.data.buyExpireTime;
            }else if(msg.code==401){
                window.location.href = "/user/login.html?forwardUrl=" + window.location.pathname;
            }else{
                layer.msg(msg.msg);
            }
        }
    })
}

$(document).ready(function(){
    jump();
    getUserdGset();
})

