//order.js
var WS_URL = 'wss://api.huobipro.com/ws';
var sellSymbol = ($('#sell-symbol').val()).toLowerCase();
var buySymbol = $('#buy-symbol').val().toLowerCase();
var ws = new WebSocket(WS_URL);
var isplat = $('#isplat').val();
if( parseInt(isplat) == 1){
    fetchRealTimeDepth();
}
ws.onopen =function(){
    ws.send(JSON.stringify({"sub": "market."+sellSymbol + buySymbol+".depth.step0","id": "btcusdt"}))
}

ws.onmessage = function (event){
    var blob = event.data;
    var reader = new FileReader();
    reader.onload = function(e){
        var ploydata = new Uint8Array(e.target.result);
        var msg = pako.inflate(ploydata,{to:'string'});
        handleData(msg);
    };
    reader.readAsArrayBuffer(blob,"utf-8");
}


/**
 * 心跳
 * @param ping
 */
function sendHeartMessage(ping){
    ws.send(JSON.stringify({"pong":ping}));
}

//数据处理
function handleData(msg){


    var data = JSON.parse(msg);


    if (data.ping) {
        sendHeartMessage(data.ping);
        return;
    }
    if(data.status=='error'){
        console.log(data);
        return;
    }

    showData(data.tick);
}

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



function fetchRealTimeDepth() {
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

    window.setTimeout(function () {
        fetchRealTimeDepth();
    }, 2000);
}