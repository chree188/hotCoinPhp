var WS_URL = 'wss://api.huobipro.com/ws';


var login = {
    lastPriceList : {},
    login: function (ele) {
        var url = "/login.html";
        var uName = $("#indexLoginName").val();
        var pWord = $("#indexLoginPwd").val();
        var longLogin = 0;
        if (util.checkEmail(uName)) {
            longLogin = 1;
        }
        var des = util.isPassword(pWord);
        if (des != "") {
            util.layerAlert("", des);
            return;
        }
        var param = {
            loginName: uName,
            password: pWord,
            type: longLogin
        };

        var callback = function (data) {
            if (data.code == 200) {
                if ($("#forwardUrl").length > 0 && $("#forwardUrl").val() != "") {
                    var forward = $("#forwardUrl").val();
                    forward = decodeURI(forward);
                    window.location.href = forward;
                } else {
                    var whref = document.location.href;
                    if (whref.indexOf("#") != -1) {
                        whref = whref.substring(0, whref.indexOf("#"));
                    }
                    window.location.href = whref;
                }
            } else {
                util.layerAlert("", data.msg, 2);
                $("#indexLoginPwd").val("");
            }
        }
        ele = ele || $("#loginbtn")[0];
        util.network({btn: ele, url: url, param: param, success: callback, enter: true});
    },
    newsHover: function (ele) {
        $(".news-items").removeClass("active");
        $(".news-items").stop().animate({width: "345px"}, 50);
        $(ele).stop().animate({width: "450px"}, 50);
        $(ele).addClass("active");
    },
    aotoMarket: function () {
        alert('auto market');
        var green = "#72c02c";
        var red = "#e74c3c";
        var url = "/real/indexmarket.html";
        var callback = function (result) {
            if (result.code != 200) {
                return;
            }

            var marketObject = {};
            $.each(result.data, function (index, data) {
                var market = "";
                var color = red;
                /*if(typeof(login.lastPriceList[data.tradeId]) !== "undefined" && login.lastPriceList[data.tradeId] < data.price){
                    color = green;
                }*/
                if(Number(data.rose)>=0){
                    color = green;
                }

                login.lastPriceList[data.tradeId] = data.rose;
                market += '<tr class="area-table-item">' +
                    '<td class="area-table-name">' +
                    '<dl class="clearfix">' +
                    '<dt class="area-table-name-img left">' +
                    '<img src="img/imgNew/add.png" alt="" />' +
                    '<img src="'+data.image+'" alt="" />' +
                    '</dt>' +
                    '<dd class="area-table-name-text">' +
                    '<h3>'+data.sellShortName+'</h3>' +
                    '<p>'+data.sellname+'</p>' +
                    '</dd>' +
                    '</dl>' +
                    '</td>' +
                    '<td>' +
                    '<div class="area-table-num danger clearfix">' +
                    '<div class="left">' +
                    '<h3>'+data.buysymbol+''+util.numFormat(data.price, data.cnyDigit)+'</h3>' +
                    '<p>￥9375.36</p>' +
                    '</div>' +
                    '<i class="iconfont icon-jiang left"></i>' +
                    '</div>' +
                    '</td>' +
                    '<td>'+util.numFormat(data.total, data.coinDigit)+''+data.sellsymbol+'</td>' +
                    '<td>$115,381,984,000</td>' +
                    '<td style="color:'+color+'">'+data.rose+'%</td>' +
                    '<td>' +
                    '<div class="area-table-img">' +
                    '<img src="/img/kline.jpg" alt="" />' +
                    '</div>' +
                    '</td>' +
                    '<td class="hint"><a href=/trademarket.html?symbol='+data.treadId+'&type='+data.type+'&sb='+data.sellShortName+'_'+data.buyShortName+'">'+util.getLan("index.go.trade")+'</a></td>' +
                    '</tr>';
                // if (index % 2 == 1) {
                //     market += "<article class='child-market'>";
                // } else {
                //     market += "<article class='child-market market-color'>";
                // }
                // market += "<div class=\"container market-item\">";
                // market +=
                //     "<span class=\"coin-name\"><img class='coin-logo' src='" + data.image + "' />" + data.sellname
                //     + "</span>";
                // market +=
                //     "<span class=\"coin-price\">" + data.buysymbol + " " + util.numFormat(data.price, data.cnyDigit)
                //     + "</span>";
                // market +=
                //     "<span class=\"coin-buy\">" + data.buysymbol + " " + util.numFormat(data.buy, data.cnyDigit)
                //     + "</span>";
                // market +=
                //     "<span class=\"coin-sell\">" + data.buysymbol + " " + util.numFormat(data.sell, data.cnyDigit)
                //     + "</span>";
                // market +=
                //     "<span class=\"coin-vol\">" + util.numFormat(data.total, data.coinDigit) + " " + data.sellsymbol
                //     + "</span>";
                // market += "<span class=\"coin-chg\" style='color:"+color+"'>" + data.rose + "%</span>";
                // market += "<a href='/trademarket.html?symbol="+data.treadId+"&type="+data.type+"&sb="+data.sellShortName+"_"+data.buyShortName+"'>"+util.getLan("index.go.trade")+"</a>";
                // market += "</div>";
                // market += "</article>";
                marketObject[data.type] =
                    (typeof marketObject[data.type] === "undefined" ? "" : marketObject[data.type]) + market;
            });
            $(".child-market", ".market").remove();
            for (var type in marketObject) {
                $("#marketType" + type).append(marketObject[type]);
            }
        };
        util.network({url: url, param: {}, success: callback});
        setTimeout(login.aotoMarket, 5000);
    },
    aotoMarket2: function () {
        var green = "#72c02c";
        var red = "#e74c3c";
        var url = "/real/indexmarket.html";
        var callback = function (result) {
            if (result.code != 200) {
                return;
            }

            var marketObject = {};
            // var data_number = 0;
            $.each(result.data, function (index, data) {
                var img_src = 'img/imgNew/img_add_white.png';
                var market = "";
                var color = "#0CA703";
                var classinfo = "icon-sheng-white";
                // if(Number(data.rose)>=0){
                //     color = green;
                // }
                if(Number(data.rose)>=0){
                    color = "#0CA703";
                    classinfo = "icon-sheng-white";
                }else{
                    color = "#EA5B25";
                    classinfo = "icon-jiang-white";
                }
                login.lastPriceList[data.tradeId] = data.rose;
                market += '<tr  data-symbol="'+data.treadId+'" data-status="'+data.status+'"class="area-table-item child-market '+data.sellShortName+data.buyShortName+'">' +
                    '<td class="area-table-name">' +
                    '<dl class="clearfix">' +
                    '<dt class="area-table-name-img left">' +
                    '<img src="'+img_src+'" alt="" class="img_add" style="width:16px;height:16px" />' +
                    '<img src="'+data.image+'" alt="" class="img_currency" />' +
                    '</dt>' +
                    '<dd class="area-table-name-text">' +
                    '<h3><a href="/trademarket.html?symbol='+data.treadId+'&type='+data.type+'&sb='+data.sellShortName+'_'+data.buyShortName+'">'+(data.sellShortName).toUpperCase()+'<span style="font-size: .12rem;color:#717171">/'+(data.buyShortName).toUpperCase()+'</span></a></h3>' +
                    // '<p>'+(data.sellName).toUpperCase()+'</p>' +
                    '</dd>' +
                    '</dl>' +
                    '</td>' +
                    '<td>' +
                    '<div class="area-table-num danger clearfix" style="display: flex;justify-content: center">' +
                    '<div class="left">' +
                    '<a href="/trademarket.html?symbol='+data.treadId+'&type='+data.type+'&sb='+data.sellShortName+'_'+data.buyShortName+'">'+
                    '<h3 class="coin-price" style="color:#72c02c">'+util.numFormat(data.price, data.cnyDigit)+'</h3>' +
                    '<p class="coin-price-cny">0.00000000</p>' +
                    '</a></div>' +
                    // '<i class="iconfont  left coin-trend"></i>' +
                    '</div>' +
                    '</td>' +
                    '<td class="coin-buy">'+data.buysymbol + " " + util.numFormat(data.buy, data.cnyDigit)+'</td>' +
                    '<td class="coin-sell">'+data.buysymbol + " " + util.numFormat(data.sell, data.cnyDigit)+'</td>' +
                    '<td class="coin-vol" unit="'+(data.sellShortName).toUpperCase()+'">0.00</td>' +
                    // '<td style="color:'+color+'" class="coin-chg">'+data.rose+'%</td>' +
                    //'<td><p class="coin-trend-per" style="background-color:'+color+'"><i class="iconfont right coin-trend icon-sheng-white" ></i><span class="coin-chg" >'+data.rose+'%</span></p></td>' +
                    '<td><p class="coin-trend-per" style="background-color:'+color+'"><i class="iconfont right coin-trend '+classinfo+'" ></i><span class="coin-chg" >'+data.rose+'%</span></p></td>' +
                    '<td>' +
                    '<div class="area-table-img coin-trend-render" style="width:200px;height:44px;margin:0 auto">' +
                    '</div>' +
                    '</td>' +
                    '<td class="hint"><a href="/trademarket.html?symbol='+data.treadId+'&type='+data.type+'&sb='+data.sellShortName+'_'+data.buyShortName+'">'+util.getLan("index.go.trade")+'</a></td>' +
                    '</tr>';
                marketObject[data.type] =
                    (typeof marketObject[data.type] === "undefined" ? "" : marketObject[data.type]) + market;

                if(data.status == 3) {
                    subscribeList.push(data.sellShortName + data.buyShortName);
                }else{
                    platformSubscribe.push({"symbol":data.treadId,"id":data.sellShortName + data.buyShortName});
                }
                // subscribeList.push(data.sellShortName+data.buyShortName);

            });
            $(".child-market").remove();
            for (var type in marketObject) {
                $("#marketType" + type).append(marketObject[type]);
                $('#marketType' + type).find('tr').eq(1).find('.img_add').attr('src', 'img/imgNew/add.png');
                $('#marketType' + type).find('tr').eq(2).find('.img_add').attr('src', 'img/imgNew/add.png');
                $('#marketType' + type).find('tr').eq(3).find('.img_add').attr('src', 'img/imgNew/add.png');
            }
            var _data = [];
            var _category = [];
            for (var i = 0; i < 10; i++) {
                _data.push(1);
                _category.push(i);
            }

            var readers = document.getElementsByClassName('coin-trend-render');
            for(var i=0;i<readers.length;i++){
                var myChart = echarts.init(readers[i]);

                var option = {
                    tooltip: {},
                    legend: {
                        data:['销量']
                    },
                    grid:{
                        left:'5%',
                        top:'50%',
                        right:'5%',
                        bottom:'5%',
                    },
                    xAxis: {
                        show:false,
                        type:'category',
                        data: _category,
                    },
                    yAxis: {
                        show:false,
                    },
                    series: [{
                        type: 'line',
                        data: _data,
                        smooth:true,
                        symbol: 'none',
                        markLine:{
                            silent:true,
                        }
                    }],
                    animation:false,
                };

                // 使用刚指定的配置项和数据显示图表。
                myChart.setOption(option);
            }
            if(!isConnection){
                doConnection();
            }
        };
        util.network({url: url, param: {}, success: callback});
    },
    switchMarket: function () {
        $(".trade-tab").on("click", function () {
            var $that = $(this);
            var dataClass = $that.data().market;
            $(".trade-tab").removeClass("active");
            $that.addClass("active");
            $(".market-con").hide();
            $("#" + dataClass).show();
        })
    }
};

var ws;

var subscribeList = [];

var platformSubscribe = [];

var isConnection = false;

//usdt_cny
var USDT_CNY = 6.5;

//需要计算btc 等于多少usdt
var BTC_USDT = 0;

var ETH_USDT = 0;


function doConnection(){
    //获取k线图数据  平台
    for(var i =0;i<platformSubscribe.length;i++){
        fetchPlatformKLine(platformSubscribe[i].symbol,platformSubscribe[i].id);
    }
    ws = new WebSocket(WS_URL);
    setMessageEvent();


    ws.onopen = function () {
        isConnection = true;
        //订阅这两个是为了计算CNY值


        ws.send(JSON.stringify({"sub":"market.btcusdt.detail","id":"btcusdt"}));
        ws.send(JSON.stringify({"sub":"market.ethusdt.detail","id":"ethusdt"}));
        if (subscribeList.length == 0){
            login.aotoMarket2();
            return;
        }

        for(var i =0;i<subscribeList.length;i++){
            var subscribe = subscribeList[i];
            var fromTime = parseInt(new Date().getTime()/1000 - 3*24*60*60);
            var toTime = parseInt(new Date().getTime()/1000);
            ws.send(JSON.stringify({"sub":"market."+subscribe+".detail","id":subscribe}));
            ws.send(JSON.stringify({"req":"market."+subscribe+".kline.60min","id":subscribe,"from":fromTime,"to":toTime}));
            ws.send(JSON.stringify({"req":"market."+subscribe+".kline.60min","id":subscribe,"from":fromTime,"to":toTime}));
        }
        //获取k线图数据
        // for(var i =0;i<platformSubscribe.length;i++){
        //     fetchPlatformKLine(platformSubscribe[i].symbol,platformSubscribe[i].id);
        // }


    };
}

function setMessageEvent(){
    ws.onmessage = function(event){
        var blob = event.data;
        var reader = new FileReader();
        reader.onload = function(e){
            var ploydata = new Uint8Array(e.target.result);
            var msg = pako.inflate(ploydata,{to:'string'});


            handleData(msg);
        };
        reader.readAsArrayBuffer(blob,"utf-8");
    };
    ws.onclose = function(){
        //console.log('connection closed');
    };
}

function handleData(msg){
    var data = JSON.parse(msg);
    if (data.ping) {
        sendHeartMessage(data.ping);
        return;
    }

    if (data.rep && data.status == 'ok') {
        handleKlineData(data);
        return;
    }

    if (data.tick) {
        handleTickData(data);
        return;
    }
}

//K线
function handleKlineData(data){

    var _data = [];
    var _category = [];
    for (var i = 0; i < data.data.length; i++) {
        var dataCell = data.data[i];
        _data.push(dataCell.close);
        _category.push(i);
    }

    var myChart = echarts.init(document.getElementsByClassName(data.id)[0].getElementsByClassName('coin-trend-render')[0]);

    // 指定图表的配置项和数据
    var option = {
        tooltip: {},
        legend: {
            data:['销量']
        },
        grid:{
            left:'5%',
            top:'5%',
            right:'5%',
            bottom:'5%',
        },
        xAxis: {
            show:false,
            type:'category',
            data: _category,
        },
        yAxis: {
            show:false,
        },
        series: [{
            type: 'line',
            data: _data,
            smooth:true,
            symbol: 'none',
            markLine:{
                silent:true,
            }
        }],
        animation:false,
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);

}

function handleTickData(data){
    var level;
    if((data.tick.close) == 0){
        level = 0;
    } else {
        level= Math.floor((data.tick.close-data.tick.open)/data.tick.open*10000);
    }


    var cArr = data['ch'].match(/\.([a-z]+?)(btc|eth|usdt|gset)\./i);
    var dataCoin = cArr[1] + cArr[2];
    //btc对应的usdt价格
    if (dataCoin == 'btcusdt') {
        BTC_USDT = data.tick.close;
    }

    //eth对应的usdt价格
    if (dataCoin == 'ethusdt') {
        ETH_USDT = data.tick.close;
    }
    $("."+dataCoin+" .coin-trend").removeClass('icon-jiang-white');
    $("."+dataCoin+" .coin-trend").removeClass('icon-sheng-white');
    if(level>=0){
        // $("."+dataCoin+" .coin-chg").attr("style","color:#72c02c");
        $("."+dataCoin+" .coin-chg").html("+"+level/100+"%");
        $("."+dataCoin+" .coin-trend").addClass('icon-sheng-white');
        $("."+dataCoin+" .coin-trend").parent('p').css('background-color','#0CA703');
        $("."+dataCoin+" .coin-price").attr("style","color:#72c02c");
    }else{
        $("."+dataCoin+" .coin-chg").html(level/100+"%");
        $("."+dataCoin+" .coin-trend").addClass('icon-jiang-white');
        // $("."+dataCoin+" .coin-chg").attr("style","color:#e74c3c");
        $("."+dataCoin+" .coin-trend").parent('p').css('background-color','#EA5B25');
        $("."+dataCoin+" .coin-price").attr("style","color:#e74c3c");
    }

    // var preData = parseFloat($("."+dataCoin).attr('pre-data'));

    // $("."+dataCoin+" .coin-trend").removeClass('icon-jiang-white');
    // $("."+dataCoin+" .coin-trend").removeClass('icon-sheng-white');
    //上一次价格币本次低 表示升高

    // if (parseFloat(preData) > parseFloat(data.tick.close)) {
    //     $("."+dataCoin+" .coin-trend").addClass('icon-jiang-white');
    //     $("."+dataCoin+" .coin-trend").parent('p').css('background-color','#EA5B25');
    // }else{
    //     $("."+dataCoin+" .coin-trend").addClass('icon-sheng-white');
    //     $("."+dataCoin+" .coin-trend").parent('p').css('background-color','#0CA703');
    // }



    $("."+dataCoin).attr('pre-data',data.tick.close);

    $("."+dataCoin+" .coin-price").html(data.tick.close); //成交额 即 sum(每一笔成交价 * 该笔的成交量)
    $("."+dataCoin+" .coin-price-cny").html('￥'+calcCNY(cArr[2],data.tick.close).toFixed(2)); //成交额 即 sum(每一笔成交价 * 该笔的成交量)
    $("."+dataCoin+" .coin-buy").html(data.tick.high); //最高价
    $("."+dataCoin+" .coin-sell").html(data.tick.low); //最低价
    var unit = $("."+dataCoin+" .coin-vol").attr('unit');
    $("."+dataCoin+" .coin-vol").html(data.tick.amount.toFixed(2)+' '+unit); //成交量
}


function calcCNY(symbol,value){
    var USDT_CNY_RATE = 0;
    var result = 0;
    if(symbol.toLowerCase() == 'usdt'){
        result = USDT_CNY_RATE * value;
    }else if(symbol.toLowerCase() == 'gset'){
        result = value;
    }else{
        result = exchangeRate[symbol+'_gset'] * value;
    }
    if (isNaN(result) || !result){
        return 0;
    }
    return result;
}

function sendHeartMessage(ping){
    //console.log("send heart msg");
    ws.send(JSON.stringify({"pong":ping}));
}


var exchangeRate = {};
/**
 * 平台
 * 左侧的实时价格
 */
function fetchRealTimePrice() {
    var symbols = [];
    $(".child-market").each(function(index,item){
        if($(item).data().status == 1){
            symbols.push($(item).data().symbol);
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
                var dataCoin = data.data[i].sellSymbol.toLowerCase()+''+data.data[i].buySymbol.toLowerCase();
                var tickData = {ch:"market."+dataCoin+".detail",tick:{
                        amount:data.data[i].total,
                        count:data.data[i].total,
                        open:data.data[i].p_open,
                        close:data.data[i].p_new,
                        high:data.data[i].sell,
                        low:data.data[i].buy,
                        vol:0,
                    }};

                handleTickData(tickData);
                //保存GSET对其他币种的价格
                exchangeRate[data.data[i].sellSymbol.toLowerCase()+'_'+data.data[i].buySymbol.toLowerCase()] = data.data[i].p_new;

            }
        }
    };
    util.network({url: url, param: param, success: callback});

    window.setTimeout(function () {
        fetchRealTimePrice();
    }, 1500);
}


/**
 * 获取平台k线
 */
function fetchPlatformKLine(symbol,_id) {
    var url = "/kline/fullperiod.html";
    var param = {
        symbol:symbol,
        step:900
    };
    var callback = function (data) {
        if(data.length==0){
            return;
        }
        var _data = compatHuoBiKLine(data);
        handleKlineData({id:_id,data:_data});
    };
    util.network({url: url, param: param, success: callback});
}

function compatHuoBiKLine(data) {
    return (data != null && data.length >0)?data.map(function(item){
        return {high:item[1],open:item[2],low:item[3],close:item[4]};
    }):[];
}


$(function () {
    $("#indexLoginPwd").on("focus", function () {
        util.callbackEnter(login.login);
    });
    $("#loginbtn").on("click", function () {
        login.login(this);
    });
    $(".news-items").mouseover(function (ele) {
        login.newsHover(this);
    });

    login.switchMarket();
    login.aotoMarket2();

    // doConnection(); //ws连接
    // setMessageEvent();
    fetchRealTimePrice();


});
