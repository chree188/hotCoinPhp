//order.js

var mqtt;
var reconnectTimeout = 2000;
var username =accessKey;
var password=CryptoJS.HmacSHA1(groupId,secretKey).toString(CryptoJS.enc.Base64);
// var topicDepthPrefix= 'HOTCOIN_TOPIC_WEB_MKTINFO/';
var symbolDepth = $("#symbol").val();
var topicDepth =topicDepthPrefix+symbolDepth+'/';
var isplat = $('#isplat').val();

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
            setTimeout(MQTTconnect, reconnectTimeout);
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
    mqtt.subscribe(topicDepth, {qos: 0});
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
    console.log(topic_res);
    try{
        if( parseInt(isplat) == 1){
            fetchRealTimeDepth(payload);
        }
    } catch(err){
        console.log(err);
    }
};
//
function showData(data){
    var bids = data.bids; //买
    var asks = data.asks; //卖

    var buySymbol = $('#buy-symbol').val();
    var sellSymbol = $('#sell-symbol').val();

    var bidsHeader = '<dt class="quotes-transaction-tabel-tetil order-list-tetil">' +
        '<span class="tetil"></span>' +
        '<span class="price">'+util.getLan('trade.tips.25')+'('+buySymbol+')</span>' +
        '<span class="amount">'+util.getLan('trade.tips.26')+'('+sellSymbol+')</span>' +
        '<span>'+util.getLan('trade.tips.27')+'('+sellSymbol+')</span>' +
        '</dt>';

    var len1 = bids.length;
    var bidsStr = '<dd class="quotes-transaction-tabel-item order-list-item">' +
        '<div class="inner">' +
        '<span class="color-buy">'+util.getLan('trade.tips.18')+'1</span>' +
        '<span>'+bids[0][0].toFixed(4)+'</span>' +
        ' <span>'+bids[0][1].toFixed(4)+'</span>' +
        '<span>'+bids[0][1].toFixed(4)+'</span>' +
        '<b class="color-sell-bg" style="width: 0%;"></b>' +
        '</div>' +
        '</dd>'

    //动态添加买
    var sumcountbuy = bids[0][1];
    for(var i=1;i<len1 && i<50;i++){
        sumcountbuy += bids[i][1];
        bidsStr +='<dd class="quotes-transaction-tabel-item order-list-item">' +
            '<div class="inner">' +
            '<span class="color-buy">'+util.getLan('trade.tips.18')+(i+1)+'</span>' +
            '<span>'+bids[i][0].toFixed(4)+'</span>' +
            ' <span>'+bids[i][1].toFixed(4)+'</span>' +
            // '<span>'+(bids[i][1]+bids[i-1][1]).toFixed(4)+'</span>' +
            '<span>'+sumcountbuy.toFixed(4)+'</span>' +
            '<b class="color-sell-bg" style="width: 0%;"></b>' +
            '</div>' +
            '</dd>';
    }
    $('#buy-data').html(bidsHeader+bidsStr);

    //卖
    var asksHeader = '<dt class="quotes-transaction-tabel-tetil order-list-tetil">' +
        '<span class="tetil"></span>' +
        '<span class="price">'+util.getLan('trade.tips.25')+'('+buySymbol+')</span>' +
        '<span class="amount">'+util.getLan('trade.tips.26')+'('+sellSymbol+')</span>' +
        '<span>'+util.getLan('trade.tips.27')+'('+sellSymbol+')</span>' +
        '</dt>';

    var len2 = asks.length;
    var asksStr = '<dd class="quotes-transaction-tabel-item order-list-item">' +
        '<div class="inner">' +
        '<span class="color-sell">'+util.getLan('trade.tips.19')+' 1</span>' +
        '<span>'+asks[0][0].toFixed(4)+'</span>' +
        ' <span>'+asks[0][1].toFixed(4)+'</span>' +
        '<span>'+asks[0][1].toFixed(4)+'</span>' +
        '<b class="color-sell-bg" style="width: 0%;"></b>' +
        '</div>' +
        '</dd>'

    var sumcountsell = asks[0][1];
    for(var i=1;i<len2 && i<50;i++){
        sumcountsell += asks[i][1];
        asksStr +='<dd class="quotes-transaction-tabel-item order-list-item">' +
            '<div class="inner">' +
            '<span class="color-sell">'+util.getLan('trade.tips.19')+' '+(i+1)+'</span>' +
            '<span>'+asks[i][0].toFixed(4)+'</span>' +
            ' <span>'+asks[i][1].toFixed(4)+'</span>' +
            // '<span>'+(asks[i][1]+bids[i-1][1]).toFixed(4)+'</span>' +
            '<span>'+sumcountsell.toFixed(4)+'</span>' +
            '<b class="color-sell-bg" style="width: 0%;"></b>' +
            '</div>' +
            '</dd>';
    }

    $('#sell-data').html(asksHeader+asksStr);
}



function fetchRealTimeDepth(data) {
    var jsonData = JSON.parse(data);
    console.log(jsonData);
    var dl = document.getElementsByClassName('cell');
    //卖
    var asks = jsonData.depth.sellDepth;
    //买
    var bids = jsonData.depth.buyDepth;

    var ticker = {"asks": asks, "bids": bids};

    //显示深度图
    showData(ticker);
}

function fetchRealTimeDepthFirst() {
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

            var ticker = {"asks": asks, "bids": bids};

            //显示深度图
            showData(ticker);
        }
    };
    util.network({url: url, param: param, success: callback});
}

/**
 *  mqtt(2018-7-14)设定的是3s服务器推动一次数据
 *  第一次额外请求数据是为了解决 mqtt建立链接后，mqtt服务器主动推送第一条数据有0~3s的数据真空期的问题
 */
$(function(){
    //　第一次请求深度数据
    fetchRealTimeDepthFirst();
    // 建立mqtt链接
    MQTTconnect();
})