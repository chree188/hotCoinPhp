
var mqtt;
var reconnectTimeout = 2000;
var username =accessKey;
var password=CryptoJS.HmacSHA1(groupId,secretKey).toString(CryptoJS.enc.Base64);

var symbol_exchange = $("#symbol").val();
var topicDepth =topicDepthPrefix+symbol_exchange+'/';
var topicRealTime = topicRealTimePrefix+symbol_exchange+'/';
var count_time=0;

function MQTTconnect() {

    mqtt = new Paho.MQTT.Client(
        host,//MQTT 域名
        port,//WebSocket 端口，如果使用 HTTPS 加密则配置为443,否则配置80
        path,
        clientId//客户端 ClientId
    );
    var options = {
        timeout: 3,
        onSuccess: onConnect,
        onFailure: function (message) {
            count_time++;
            if(count_time<4){
                setTimeout(MQTTconnect, reconnectTimeout);
            }else{
                polling_price();
                polling_trade();
                polling_depth();
            }

        }
    };

    mqtt.onConnectionLost = onConnectionLost;
    mqtt.onMessageArrived = onMessageArrived;

    if (username != null) {
        options.userName = username;
        options.password = password;
        options.useSSL=useTLS;//如果使用 HTTPS 加密则配置为 true
    }
    mqtt.connect(options);
}

function onConnect() {
    // Connection succeeded; subscribe to our topic
    // mqtt.subscribe(topic, {qos: 0});
    // console.log(topicDepth);
    mqtt.subscribe(gsettopic, {qos: 0});
    mqtt.subscribe(btctopic, {qos: 0});
    mqtt.subscribe(ethtopic, {qos: 0});

    mqtt.subscribe(topicDepth, {qos: 0});

    mqtt.subscribe(topicRealTime, {qos: 0});
    // message = new Paho.MQTT.Message("Hello mqtt!!");//set body
    // message.destinationName =topic;// set topic
    // mqtt.send(message);

}


function onConnectionLost(response) {
    console.log(response);
    setTimeout(MQTTconnect, reconnectTimeout);
};

function onMessageArrived(message) {

    var topic_res = message.destinationName;
    var payload = message.payloadString;
    // console.log("recv msg : "+topic_res+  JSON.parse(payload));
    // console.log(topic_res);
    if(topic_res==gsettopic||topic_res==btctopic || topic_res==ethtopic){
        try{
            fetchRealTimePrice(payload);
        } catch(err){
            console.log(err);
        }
    }else if(topic_res==topicDepth){
        try{
            fetchRealTimeDepth(payload);
        } catch(err){
            console.log(err);
        }
    } else if(topic_res==topicRealTime){
        try{
            fetchRealTimeTrade(payload);
        } catch(err){
            console.log(err);
        }
    }
};

var upColor = '#00da3c';
var downColor = '#ec0000';

var myChart2 = null;

// var WS_URL  = 'wss://api.huobi.pro/ws';
var WS_URL = 'wss://api.huobipro.com/ws';

var PERIOD_1MIN = "1min";

var PERIOD_5MIN = "5min";

var PERIOD_15MIN = "15min";

var PERIOD_30MIN = "30min";

var PERIOD_60MIN = "60min";

var PERIOD_1DAY = "1day";

var PERIOD_1WEEK = "1week";

var PERIOD_1MON = "1mon";


var priceFixed = {'BTC':8,'GSET':4,'ETH':8};
var numberFixed = {'BTC':2,'GSET':4,'ETH':2};
//开始时间
var _from = 0;

//目标时间，默认是现在
var _to = formatDate(new Date);

//周期，默认15分钟
var _period = PERIOD_15MIN;

var periodValue = 60 * 15;

var chartAnimation = true;

//usdt_cny
var USDT_CNY = 6.5;

//需要计算btc 等于多少usdt
var BTC_USDT = 0;

//true平台，false火币
var isPlatformTrade = $("#isPlatformStatus").val() == 'true';

//符号 bchusdt、btcusdt
var _symbol = document.getElementById('hide-symbol').getAttribute('value').replace("_","");

var sellBuy = document.getElementById('hide-symbol').getAttribute('value').split("_");


initTab();

function initTab(){
    var tabItems = document.getElementsByClassName('coin-tab')[0].getElementsByTagName('button');
    var contentItem = document.getElementsByClassName('coin-list-item');
    var urlItems = document.getElementsByClassName('coin-list')[0].getElementsByTagName('tr');
    for (var i = 0; i < tabItems.length; i++) {
        var tab = tabItems[i];

        tab.index = i;

        tab.addEventListener('click',function(){
            for (var j = 0; j < tabItems.length; j++) {
                tabItems[j].removeAttribute('class');
                contentItem[j].setAttribute('style','display:none');
            }
            // mqtt.unsubscribe(topic);
            // var tab_val = $(this).html();
            // switch(tab_val)
            // {
            //     case "GSET":
            //         topic = gsettopic;
            //         break;
            //     case "BTC":
            //         topic = btctopic;
            //         break;
            //     case "ETH":
            //         topic = ethtopic;
            //         break;
            //     default:
            //         topic = gsettopic;
            // }
            // mqtt.subscribe(topic, {qos: 0});
            this.setAttribute('class','active');
            contentItem[this.index].removeAttribute('style');
        });
    }

    //url链接
    for (var i = 0; i < urlItems.length; i++) {
        urlItems[i].addEventListener('click',function(){
            window.location.href="/trademarket.html?sb="+this.getAttribute('data-symbol')+"&type="+this.getAttribute("type")+"&symbol="+this.getAttribute("symbol");
        });
    }

    // //usdt交易区
    // if (sellBuy[1] == 'usdt') {
    //     tabItems[0].setAttribute('class','tab-active');
    //     contentItem[0].removeAttribute('style');
    // }else if (sellBuy[1] == 'btc') {
    //     tabItems[1].setAttribute('class','tab-active');
    //     contentItem[1].removeAttribute('style');
    // }
}

/**
 *date 可以用setTime(毫秒) 修改时间
 */
function formatDate(date,pattern){
    var month = date.getMonth() + 1;
    if (month<10) {
        month = "0" + month;
    }

    var day = date.getDate();
    if (day<10) {
        day = "0" + day;
    }

    var hour = date.getHours();
    if (hour<10) {
        hour = "0" + hour;
    }

    var minute = date.getMinutes();
    if (minute<10) {
        minute = "0" + minute;
    }

    var seconds = date.getSeconds();
    if (seconds<10) {
        seconds = "0" + seconds;
    }

    var year = date.getFullYear();

    if (pattern) {
        return hour+":"+minute+":"+seconds;
    }
    return year+"-"+month+"-"+day+" "+hour+":"+minute+":"+seconds;
}


window.onresize = function(){
    myChart2.resize();
};

function showData(xData,buyData,sellData){
    if (myChart2 == null) {
        myChart2 = echarts.init(document.getElementById('depth-chart'));
    }


    // 指定图表的配置项和数据
    var option = {
        title: {
            text: ''
        },
        tooltip : {
            show:true,
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor:'rgb(19,21,32)'
                }
            }
        },
        backgroundColor: '#181B2A',
        legend: {
            data:['','','','','']
        },
        toolbox: {
            feature: {
                saveAsImage: {}
            }
        },
        grid: {
            left: '5%',
            right: '4%',
            bottom: '5%',
            containLabel: true
        },
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : xData,
                axisLine:{
                    show:true,
                    lineStyle:{
                        color:"#fff",
                        fontSize:'12'
                    }
                },
                nameTextStyle:{
                    fontSize:'12'
                },
                splitLine:{
                    show:false,
                },
                splitNumber: 20,
            }
        ],
        yAxis : [
            {
                type : 'value',
                axisLine:{
                    show:true,
                    lineStyle:{
                        color:"#fff",
                        fontSize:'12'
                    }
                },
                nameTextStyle:{
                    fontSize:'12'
                },
                splitLine:{
                    show:false,
                },
            }
        ],
        series : [
            {
                name:'',
                type:'line',
                stack: '总量',
                symbol:"none",
                lineStyle: {color:"#1D2133",opacity:1},
                areaStyle: {color:"rgb(27,39,21)",opacity:1},
                data:buyData,
                markPoint:{
                    symbol:'rect'
                },
                symbolSize:"50px"
            },
            {
                name:'',
                type:'line',
                stack: '总量',
                symbol:"none",
                lineStyle: {color:"#1D2133",opacity:1},
                areaStyle: {color:"rgb(43,25,38)",opacity:1},
                data:sellData
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart2.setOption(option);
}

// function handleData(msg){
//
//     var data = JSON.parse(msg);
//
//
//     if (data.ping) {
//         sendHeartMessage(data.ping);
//         return;
//     }
//     if(data.status=='error'){
//         console.log(data);
//     }
//     //请求k线
//     if ( data.status=='ok' && data.rep && data.rep.indexOf('kline')>0 ) {
//         handleResponseData(data);
//         return
//     }
//
//     //请求实时交易
//     if (data.status == 'ok' && data.ch && data.ch.indexOf("trade")>0) {
//         handleTradeDetail(data.data);
//         return
//     }
//
//     //订阅实时交易
//     if (data.ch && data.ch.indexOf('trade')>0 && data.tick.data) {
//         handleTradeDetail(data.tick.data,true);
//         return;
//     }
//
//     //订阅详情
//     if (data.ch && data.ch.indexOf("detail")>0 && data.tick) {
//         handleDetail(data);
//         return;
//     }
//
//     //订阅最新价
//     if (data.tick) {
//
//         handleTickData(data.tick);
//         //深度图
//         if( data.ch && data.ch.indexOf('depth')>0){
//             handleDepthTick(data.tick);
//             return;
//         }
//         return;
//     }
//
//
// }

/**
 * 深度图
 * @param tick
 */
function handleDepthTick(tick){
    var bids = tick.bids;
    var asks = tick.asks;
    var xData   = [];
    var buyData = [];
    var sellData = [];
    //买入
    for (var i = 0; i < bids.length; i++) {
        var bid = bids[i];
        xData.push(bid[0].toFixed(2));
        var total = 0;
        for (var j = 0; j <=i; j++) {
            total += bids[j][1];
        }
        buyData.push(total);
    }

    //卖出
    for (var i = 0; i < asks.length; i++) {
        var ask = asks[i];
        xData.push(ask[0].toFixed(2));
        var total = 0;
        for (var j = 0; j <=i; j++) {
            total += asks[j][1];
        }
        sellData.push(total);
    }

    //买
    buyData.sort(function(x,y){
        return y - x;
    });

    sellData.sort(function(x,y){
        return x - y;
    });

    //把后面部分的数据拼接成0
    buyData =  buyData.concat(new Array(asks.length));

    //把签名部分的数据拼接成0
    sellData = new Array(bids.length).concat(sellData);

    xData.sort(function(x,y){
        return x - y;
    });

    showData(xData,buyData,sellData);
}

//实时交易数据
function handleTradeDetail(data,isInsert){
    var dataBox = document.getElementById('realTimeTrade');
    var type;
    var typeClass;
    var dates;
    var dataCell;
    var priceSymbol = dataBox.getElementsByClassName('real-trade-price')[0].innerHTML;
    var amountSymbol = dataBox.getElementsByClassName('real-trade-mount')[0].innerHTML;
    var str = '';
    str +='<tr class="quotes-deal-item">'
        +   '<td>'+ util.getLan('trade.tips.23')+'</td>'
        +    '<td>'+util.getLan('trade.tips.24')+'</td>'
        +   '<td class="real-trade-price">'+priceSymbol+'</td>'
        +   '<td class="real-trade-mount">'+amountSymbol+'</td></tr>';

    for (var i = 0; i < data.length; i++) {
        dataCell = data[i];
        //时间
        dates = new Date();
        dates.setTime(dataCell.ts);
        typeClass = dataCell.direction == 'sell'?'danger':'success';
        type = dataCell.direction == 'sell'?util.getLan('trade.tips.19'): util.getLan('trade.tips.18');
        str +='<tr class="quotes-deal-item">';
        str += '<td>'+formatDate(dates,true)+'</td>';
        str += '<td class="typeClass">'+type+'</td>';
        str += '<td>'+dataCell.price+'</td>';
        str += '<td>'+parseFloat(dataCell.amount).toFixed(4)+'</td>';
        str +='</tr>';
    }
    dataBox.innerHTML = str;
}



//买卖区块
function handleTickData(tick){

    var symbol = sellBuy[1].toUpperCase();

    var dl = document.getElementsByClassName('cell');
    //卖
    var asks = tick.asks;
    //买
    var bids = tick.bids;

    var total = 7;
    var asksTotal = 0.0;
    var bidsTotal = 0.0;
    var askpre =0.0;
    var bidpre =0.0;

    //卖的总量
    for (var i = 0; i < dl.length && i<7; i++) {
        asksTotal = (parseFloat(asksTotal) + parseFloat(asks[i][1])).toFixed(numberFixed[symbol]);
    }

    for (var i = 0; i < dl.length && i <7; i++) {
        var d = dl[total-i-1];
        $(d).find('b').css('width',( parseFloat(asks[i][1]).toFixed(4))/ asksTotal *100 +'%');
        if( i==0 ){
            askpre =  0.0;
        } else{
            askpre = parseFloat(asks[i][1] ) + parseFloat(askpre);
        }

        var spans = d.getElementsByTagName('span');

        if(asks[i]){
            spans[1].innerHTML = (parseFloat(asks[i][0]).toFixed(priceFixed[symbol]));
            spans[2].innerHTML = (parseFloat( asks[i][1])).toFixed(numberFixed[symbol]);
            spans[3].innerHTML = (parseFloat( asks[i][1]) + parseFloat(askpre)).toFixed(numberFixed[symbol]);
        }else{
            spans[1].innerHTML = " ";
            spans[2].innerHTML = " ";
            spans[3].innerHTML = " ";
        }

    }

    //bids_data.reverse();
    for (var i = total; i < dl.length && i<14 ; i++) {
        bidsTotal = ( parseFloat(bidsTotal) + parseFloat(bids[i-total][1]) ).toFixed(numberFixed[symbol]);
    }


    for (var i = total; i < dl.length && i<14; i++) {
        var d = dl[i];
        if(i==total){
            bidpre = 0.0;
        } else{
            bidpre = parseFloat(bids[i-total-1][1]) + parseFloat(bidpre);
        }
        $(d).find('b').css('width',( parseFloat(bids[i-total][1])).toFixed(4) / bidsTotal * 100 +'%');
        var spans = d.getElementsByTagName('span');
        if(bids[i-total]){
            spans[1].innerHTML = (parseFloat( bids[i-total][0]).toFixed(priceFixed[symbol]));
            spans[2].innerHTML = (parseFloat( bids[i-total][1])).toFixed(numberFixed[symbol]);
            //  spans[1].innerHTML = (parseFloat( bids[i-total][0]).toString(priceFixed[symbol]));
            //  spans[2].innerHTML = (parseFloat( bids[i-total][1])).toString(numberFixed[symbol]);
            spans[3].innerHTML = (parseFloat( bids[i-total][1]) + parseFloat(bidpre)).toFixed(numberFixed[symbol]);
        }else{
            spans[1].innerHTML = "";
            spans[2].innerHTML = "";
            //  spans[1].innerHTML = (parseFloat( bids[i-total][0]).toString(priceFixed[symbol]));
            //  spans[2].innerHTML = (parseFloat( bids[i-total][1])).toString(numberFixed[symbol]);
            spans[3].innerHTML = "";
        }

    }
}

//设置两个交易框
function handleDetail(data){
    var cArr = data['ch'].match(/\.([a-z0-9]+?)(gset|btc|eth|usdt)\./i);
    if(!cArr){
        return false;
    }
    var dataCoin = cArr[1] +'_'+ cArr[2];//交易对
    var level= Math.floor((data.tick.close-data.tick.open)/data.tick.open*10000);
    if(document.getElementsByClassName(dataCoin).length == 0){
        return;
    }

    var price = document.getElementsByClassName(dataCoin)[0].getElementsByClassName('trade-price')[0];
    var rate  = document.getElementsByClassName(dataCoin)[0].getElementsByClassName('trade-rate')[0];
    level = level/100;
    if(isNaN(level) || !level){
        level = 0.00;
    }else{
        level = parseFloat(level).toFixed(2);
    }

    price.innerHTML = parseFloat(data.tick.close);
    if (level>=0) {
        rate.setAttribute("style","color:#72c02c");
        rate.innerHTML = "+"+level+"%";
    }else{
        rate.setAttribute("style","color:#e74c3c");
        rate.innerHTML = level+"%";
    }

    //获取btc对应的usdt价格
    if ('BTC_USDT' == dataCoin.toUpperCase()) {
        BTC_USDT = data.tick.close;
    }

    if((cArr[1]+cArr[2]) != _symbol){
        return;
    }
    var sell = document.getElementById('hide-symbol').getAttribute('value').split("_")[0];
    var span = document.getElementById('zf');
    span.removeAttribute('style');
    $('#high').html(util.getLan('trade.tips.20')+' '+ data.tick.high);
    $('#low').html(util.getLan('trade.tips.21') + ' ' +data.tick.low);
    $('#vol').html('24H'+util.getLan('trade.tips.22')+ ' '+data.tick.amount.toFixed(4)+' '+sell.toUpperCase());
    $('#tip-price').html(parseFloat(data.tick.close));
    $('#tip-cny').html(parseFloat(calculateCNY(data.tick.close,cArr[2])).toFixed(2)+' CNY');

    if (level>=0) {
        span.setAttribute("style","color:#72c02c");
        span.innerHTML = "+"+level+"%";
    }else{
        span.setAttribute("style","color:#e74c3c");
        span.innerHTML = level+"%";
    }
    if (cArr[2] == sellBuy[1] && cArr[1] == sellBuy[0]) {
        $('#header-text').html(util.getLan('trade.tips.17')+ ' '+parseFloat(data.tick.close)+(sellBuy[1]).toUpperCase()+' <span></span>');
        $('#header-text span').html('≈ '+parseFloat(calculateCNY(data.tick.close,cArr[2])).toFixed(2)+' CNY');
    }
}

function calculateCNY(value,symbol) {
    var result = 0;
    if(symbol.toLowerCase() == 'usdt'){
        result = USDT_CNY_RATE * value;
    }else if(symbol.toLowerCase() == 'gset'){
        result = value;
    }else{
        result = exchangeRate[symbol+'_gset'] * value;
    }
    if (isNaN(result) || !result){
        return 0.00;
    }
    return result;
}

//保存
var exchangeRate = {};

/**
 * 平台
 * 左侧的实时价格
 */
function fetchRealTimePrice(data) {
    var symbols = [];
    $(".coin-list-item tr").each(function(index,item){
        if($(item).data().status == true){
            symbols.push($(item).attr('symbol'));
        }
    });
    var jsonData = JSON.parse(data);
    // var dataCoin = "";
    $.each(jsonData,function(index,value){
            // dataCoin = value.sellSymbol.toLowerCase()+'_'+value.buySymbol.toLowerCase();
            // var price  = $('.'+dataCoin).eq(0).find('.trade-price').eq(0);
            // var rate  =  $('.'+dataCoin).eq(0).find('.trade-rate').eq(0);
            //
            // var level= Math.floor((value.p_new-value.p_open)/value.p_new*10000);
            //     price.innerHTML = parseFloat(util.numFormat(value.p_new,8));
            //     level = level / 100;
            //     if(isNaN(level) || !level){
            //         level = 0.00;
            //     }
            //     if (level>=0) {
            //         rate.attr("style","color:#72c02c");
            //         rate.html = "+"+level+"%";
            //     }else{
            //         rate.attr("style","color:#e74c3c");
            //         rate.html = "+"+level+"%";
            //     }
                // //保存GSET对其他币种的价格
                exchangeRate[value.sellSymbol.toLowerCase()+'_'+value.buySymbol.toLowerCase()] = value.p_new;

                    handleDetail({
                        "ch": "market." + value.sellSymbol.toLowerCase() + value.buySymbol.toLowerCase() + ".detail",
                        "tick": {
                            "amount": value.total,
                            "close": value.p_new,
                            "open": value.p_open,
                            "low": value.buy,
                            "high": value.sell,
                            "version": "1",
                            "vol": value.total
                        }
                    });


    });

}


function fetchRealTimePriceFirst(type) {
    var symbols = [];
    $(".coin-list-item tr").each(function(index,item){
        if($(item).data().status == true){
            symbols.push($(item).attr('symbol'));
        }
    });
    var url = "/real/markets.html";
    var symbol = symbols.join(',');
    var param = {
        symbol:symbol
    };
    var callback = function (data) {
        if (data.code == 200) {
            for(var i=0;i<data.data.length;i++){
                var dataCoin = data.data[i].sellSymbol.toLowerCase()+'_'+data.data[i].buySymbol.toLowerCase();
                var price = document.getElementsByClassName(dataCoin)[0].getElementsByClassName('trade-price')[0];
                var rate  = document.getElementsByClassName(dataCoin)[0].getElementsByClassName('trade-rate')[0];
                var level= Math.floor((data.data[i].p_new-data.data[i].p_open)/data.data[i].p_new*10000);
                price.innerHTML = util.numFormat(data.data[i].p_new,8);
                level = level / 100;
                if(isNaN(level) || !level){
                    level = 0.00;
                }
                if (level>=0) {
                    rate.setAttribute("style","color:#72c02c");
                    rate.innerHTML = "+"+level+"%";
                }else{
                    rate.setAttribute("style","color:#e74c3c");
                    rate.innerHTML = level+"%";
                }

                //保存GSET对其他币种的价格
                exchangeRate[data.data[i].sellSymbol.toLowerCase()+'_'+data.data[i].buySymbol.toLowerCase()] = data.data[i].p_new;

                handleDetail({"ch":"market."+data.data[i].sellSymbol.toLowerCase()+data.data[i].buySymbol.toLowerCase()+".detail",
                    "tick":{
                        "amount":data.data[i].total,
                        "close":data.data[i].p_new,
                        "open":data.data[i].p_open,
                        "low":data.data[i].buy,
                        "high":data.data[i].sell,
                        "version":"1",
                        "vol":data.data[i].total
                    }});


            }
        }
    };
    util.network({url: url, param: param, success: callback});
    if(type==1){
        polling_price();
    }
}

function polling_price(){
    setTimeout(function(){fetchRealTimePriceFirst(1);},3000);
}
function polling_trade(){
    setTimeout(function(){fetchRealTimeTradeFirst(1);},3000);
}
function polling_depth(){
    setTimeout(function(){fetchRealTimeDepthFirst(1);},3000);
}

/**
 * 平台
 * 获取实时成交
 */
function fetchRealTimeTradeFirst(type){
    var url = "/real/market.html";
    var symbol = $("#symbol").val();
    var param = {
        symbol:symbol,
        buysellcount:100,
        successcount:100
    };

    var callback = function (data) {
        if (data.code == 200) {
            var trades = data.data.trades;

            var dataBox = document.getElementById('realTimeTrade');

            var priceSymbol = dataBox.getElementsByClassName('real-trade-price')[0].innerHTML;
            var amountSymbol = dataBox.getElementsByClassName('real-trade-mount')[0].innerHTML;
            var str = '';
            str +='<tr class="quotes-deal-item">'
                +   '<td>'+util.getLan('trade.tips.23')+'</td>'
                +    '<td>'+util.getLan('trade.tips.24')+'</td>'
                +   '<td class="real-trade-price">'+priceSymbol+'</td>'
                +   '<td class="real-trade-mount">'+amountSymbol+'</td></tr>';

            for(var i=0;i<trades.length;i++){
                str +='<tr class="quotes-deal-item">';
                str += '<td>'+trades[i].time+'</td>';
                if(trades[i].type == '买入'){
                    str += '<td class="success">'+trades[i].type+'</td>';
                } else{
                    str += '<td class="danger">'+trades[i].type+'</td>';
                }

                str += '<td>'+trades[i].price+'</td>';
                str += '<td>'+trades[i].amount+'</td>';
                str +='</tr>';
            }
            dataBox.innerHTML = str;
        }
    };
    util.network({url: url, param: param, success: callback});
    if(type==1){
        polling_trade();
    }
}


function fetchRealTimeTrade(data){
    var jsonData = JSON.parse(data);
    var trades = jsonData;
    var dataBox = document.getElementById('realTimeTrade');
    var priceSymbol = dataBox.getElementsByClassName('real-trade-price')[0].innerHTML;
    var amountSymbol = dataBox.getElementsByClassName('real-trade-mount')[0].innerHTML;
    var str = '';
    str +='<tr class="quotes-deal-item">'
        +   '<td>'+util.getLan('trade.tips.23')+'</td>'
        +    '<td>'+util.getLan('trade.tips.24')+'</td>'
        +   '<td class="real-trade-price">'+priceSymbol+'</td>'
        +   '<td class="real-trade-mount">'+amountSymbol+'</td></tr>';

    for(var i=0;i<trades.length;i++) {
        str += '<tr class="quotes-deal-item">';
        str += '<td>' + trades[i][2] + '</td>';
        if (trades[i][3] == 1) {
            str += '<td class="danger">卖出</td>';
        } else {
            str += '<td class="success">买入</td>';
        }

        str += '<td>' + trades[i][0] + '</td>';
        str += '<td>' + trades[i][1] + '</td>';
        str += '</tr>';
    }
        dataBox.innerHTML = str;
}

/**
 * 平台
 * 深度
 */
function fetchRealTimeDepth(data) {
    var jsonData = JSON.parse(data);
    var dl = document.getElementsByClassName('cell');
    //卖
    var asks = jsonData.depth.sellDepth;
    //买
    var bids = jsonData.depth.buyDepth;

    var ticker = {"asks":asks,"bids":bids};

    //显示深度图
    handleDepthTick(ticker);
    var symbol = sellBuy[1].toUpperCase();
    var total = 7;
    var asksTotal = 0.0;
    var bidsTotal = 0.0;
    var askpre =0.0;
    var bidpre =0.0;

    //卖的总量
    for (var i = 0; i < dl.length && i<7; i++) {
        if (!asks[i]) continue;
            asksTotal = (parseFloat(asksTotal) + parseFloat(asks[i][1])).toFixed(numberFixed[symbol]);
    }

    for (var i = 0; i <7; i++) {
        var d = dl[total - i - 1];

        var spans = d.getElementsByTagName('span');
        var colorSell = d.getElementsByClassName('color-sell-bg');
        if (!asks[i]){
            spans[1].innerHTML = " ";
            spans[2].innerHTML = " ";
            spans[3].innerHTML = " ";

            $(colorSell).css("width", "0%");
            continue;
        }

        if (i == 0) {
            askpre = 0.0;
        } else {
            askpre = parseFloat(asks[i - 1][1]) + parseFloat(askpre);
        }


        spans[1].innerHTML = (parseFloat(asks[i][0]).toString());
        spans[2].innerHTML = (parseFloat(asks[i][1])).toString();
        spans[3].innerHTML = (parseFloat(asks[i][1]) + parseFloat(askpre)).toFixed(numberFixed[symbol]);
        var width = parseInt((parseFloat(asks[i][1]) + parseFloat(askpre)).toFixed(numberFixed[symbol]) / asksTotal * 100) + "%";
        $(colorSell).css("width", width);

    }
     //bids_data.reverse();
    for (var i = total; i < bids.length + total && i<14 ; i++) {
        bidsTotal = ( parseFloat(bidsTotal) + parseFloat(bids[i-total][1]) ).toFixed(numberFixed[symbol]);
    }


    // for (var i = total; i < bids.length + total && i<14; i++) {
    //     var d = dl[i];
    //     if(i==total){
    //         bidpre = 0.0;
    //     } else{
    //         bidpre = parseFloat(bids[i-total-1][1]) + parseFloat(bidpre);
    //     }
    //     var spans = d.getElementsByTagName('span');
    //
    //     spans[1].innerHTML = (parseFloat(bids[i - total][0])).toString();
    //     spans[2].innerHTML = (parseFloat(bids[i - total][1])).toString();
    //     spans[3].innerHTML = (parseFloat(bids[i - total][1]) + parseFloat(bidpre)).toFixed(numberFixed[symbol]);
    //     var width = parseInt((parseFloat(bids[i - total][1]) + parseFloat(bidpre)).toFixed(numberFixed[symbol]) / bidsTotal * 100) + "%";
    //     var colorBuy = d.getElementsByClassName('color-buy-bg');
    //     $(colorBuy).css("width", width);
    // }

    // for (var i = total; i < dl.length + total; i++) {
    for (var i = total; i < dl.length; i++) {
        var d = dl[i];
        var spans = d.getElementsByTagName('span');
        var colorBuy = d.getElementsByClassName('color-buy-bg');
        if(!bids[i-total]){
            spans[1].innerHTML =" ";
            spans[2].innerHTML =" ";
            spans[3].innerHTML =" ";
            $(colorBuy).css("width", "0%");
            continue;
        }

        if(i==total){
            bidpre = 0.0;
        } else{
            bidpre = parseFloat(bids[i-total-1][1]) + parseFloat(bidpre);
        }


        spans[1].innerHTML = (parseFloat(bids[i - total][0])).toString();
        spans[2].innerHTML = (parseFloat(bids[i - total][1])).toString();
        spans[3].innerHTML = (parseFloat(bids[i - total][1]) + parseFloat(bidpre)).toFixed(numberFixed[symbol]);
        var width = parseInt((parseFloat(bids[i - total][1]) + parseFloat(bidpre)).toFixed(numberFixed[symbol]) / bidsTotal * 100) + "%";
        $(colorBuy).css("width", width);
    }
}


function fetchRealTimeDepthFirst(type) {
    var url = "/kline/fulldepth.html";
    var symbol = $("#symbol").val();
    var param = {
        symbol:symbol
    };
    var callback = function (data) {
        if (data.code == 200) {
            var dl = document.getElementsByClassName('cell');
            //卖
            var asks = data.data.depth.asks;
            //买
            var bids = data.data.depth.bids;

            var ticker = {"asks":asks,"bids":bids};

            //显示深度图
            handleDepthTick(ticker);
            var symbol = sellBuy[1].toUpperCase();
            var total = 7;
            var asksTotal = 0.0;
            var bidsTotal = 0.0;
            var askpre =0.0;
            var bidpre =0.0;

            //卖的总量
            for (var i = 0; i < dl.length && i<7; i++) {
                if (!asks[i]) continue;
                asksTotal = (parseFloat(asksTotal) + parseFloat(asks[i][1])).toFixed(numberFixed[symbol]);
            }

            for (var i = 0; i < dl.length && i <7; i++) {
                // if(!asks[total-1-i] || !asks[i]) continue;
                if(!asks[i]) continue;


                var d = dl[total-i-1];

                // $(d).find('b').css('width',( parseFloat(asks[total-1-i][1]).toFixed(4))/ asksTotal *100 +'%');

                if( i==0 ){
                    askpre =  0.0;
                } else{
                    askpre = parseFloat(asks[i-1][1] ) + parseFloat(askpre);
                }

                var spans = d.getElementsByTagName('span');
                // spans[1].innerHTML = (parseFloat(asks[i][0]).toFixed(priceFixed[symbol]));
                // spans[2].innerHTML = (parseFloat( asks[i][1])).toFixed(numberFixed[symbol]);
                spans[1].innerHTML = (parseFloat(asks[i][0]).toString());
                spans[2].innerHTML = (parseFloat( asks[i][1])).toString();
                spans[3].innerHTML = (parseFloat( asks[i][1]) + parseFloat(askpre)).toFixed(numberFixed[symbol]);
                var width =  parseInt((parseFloat( asks[i][1]) + parseFloat(askpre)).toFixed(numberFixed[symbol])/asksTotal *100)+"%";
                var colorSell =  d.getElementsByClassName('color-sell-bg')
                $(colorSell).css("width",width);
            }


            //bids_data.reverse();

            for (var i = total; i < bids.length + total && i<14 ; i++) {
                bidsTotal = ( parseFloat(bidsTotal) + parseFloat(bids[i-total][1]) ).toFixed(numberFixed[symbol]);
            }


            for (var i = total; i < bids.length + total && i<14; i++) {
                var d = dl[i];
                if(i==total){
                    bidpre = 0.0;
                } else{
                    bidpre = parseFloat(bids[i-total-1][1]) + parseFloat(bidpre);
                }
                // $(d).find('b').css('width',( parseFloat(bids[i-total][1])).toFixed(4) / bidsTotal * 100 +'%');
                var spans = d.getElementsByTagName('span');
                // spans[1].innerHTML = (parseFloat( bids[i-total][0]).toFixed(priceFixed[symbol]));
                // spans[2].innerHTML = (parseFloat( bids[i-total][1])).toFixed(numberFixed[symbol]);
                spans[1].innerHTML = (parseFloat( bids[i-total][0])).toString();
                spans[2].innerHTML = (parseFloat( bids[i-total][1])).toString();
                spans[3].innerHTML = (parseFloat( bids[i-total][1]) + parseFloat(bidpre)).toFixed(numberFixed[symbol]);
                var width =  parseInt((parseFloat( bids[i-total][1]) + parseFloat(bidpre)).toFixed(numberFixed[symbol])/bidsTotal *100)+"%";
                var colorBuy =  d.getElementsByClassName('color-buy-bg');
                $(colorBuy).css("width",width);
            }
        }
    };
    util.network({url: url, param: param, success: callback});
    if(type==1){
        polling_depth();
    }

}


//设置输入框
function inputListener() {
    $("#tradebuyprice").on('input',function (ev) {
        var val = $("#tradebuyprice").val();
        var cny =  parseFloat(calculateCNY(val,sellBuy[1])).toFixed(2);
        $("#tradebuyprice-cny").html("≈ "+cny+" CNY");
    });

    $("#tradesellprice").on('input',function (ev) {
        var val = $("#tradesellprice").val();
        var cny = parseFloat(calculateCNY(val,sellBuy[1])).toFixed(2);
        $("#tradesellprice-cny").html("≈ "+cny+" CNY");
    });
}



$(function(){
    inputListener();
    if (isPlatformTrade) {
        fetchRealTimeTradeFirst();
        fetchRealTimePriceFirst();
        fetchRealTimeDepthFirst();
        MQTTconnect();
    }
    return;
})

getHeightLight();
function getHeightLight(){
    $(".coin-list tbody tr").each(function(index,item){
        if($(item).attr("symbol")==$("#symbol").val()){
            $(item).css("background-color",'#1e2235')
        }
    })
}