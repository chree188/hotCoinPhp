'use strict';

/**
 * 使用http处理数据，接入金塔的数据
 **/
var Datafeeds = {};
// var mineNum = '';
//
// //获取地址栏mine参数
// function getParameterByName(name) {
// 	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
// 	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
// 		results = regex.exec(location.search);
// 	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
// }
//
// function getMine() {
// 	var mine = getParameterByName('mine');
// 	if(mine != '' && mine != null) {
// 		mineNum = mine
// 	}
// }
// getMine();

function getDecimal(){
	var decimal = $('#kline-digit').val();
	var str = "1";
	if(decimal>0){
		for (var i=1;i<=decimal;i++ ){
			str = str+"0";
		}
	}
	return parseInt(str);
}

/**
 * 初始化方法
 * @param datafeedURL
 * @param ws
 * @param updateFrequency
 * @constructor
 */
function compare(property) {
	return function(a, b) {
		var value1 = a[property];
		var value2 = b[property];
		return value1 - value2;
	}
}

Datafeeds.UDFCompatibleDatafeed = function(httpURL, symbol) {
	var that = this;
	// this._datafeedURL = datafeedURL;
	// 用于临时存储回调函数
	this._dataCallBacks = {};
	// 存储当前的时间间隔,1m,5m
	this._currentSymbol = symbol;
	this._currentName = symbol;
	this._current_resolution = "15min";
	console.log("init datafeed");
};
/**
 * 构造默认配置
 *     {"supports_search":true,"supports_group_request":false,"supports_marks":true,"supports_timescale_marks":true,"supports_time":true,"exchanges":[{"value":"","name":"All Exchanges","desc":""},{"value":"NasdaqNM","name":"NasdaqNM","desc":"NasdaqNM"},{"value":"NYSE","name":"NYSE","desc":"NYSE"},{"value":"NCM","name":"NCM","desc":"NCM"},{"value":"NGM","name":"NGM","desc":"NGM"}],"symbols_types":[{"name":"All types","value":""},{"name":"Stock","value":"stock"},{"name":"Index","value":"index"}],"supported_resolutions":["D","2D","3D","W","3W","M","6M"]}

 */
function defaultConfig() {

	return {
		"supports_search": false,
		"supports_group_request": false,
		"supports_marks": false,
		"supports_timescale_marks": false,
		"supports_time": true,
		
		"exchanges": [{
			"value": "",
			"name": "All Exchanges",
			"desc": ""
		}, {
			"value": "NasdaqNM",
			"name": "NasdaqNM",
			"desc": "NasdaqNM"
		}, {
			"value": "NYSE",
			"name": "NYSE",
			"desc": "NYSE"
		}, {
			"value": "NCM",
			"name": "NCM",
			"desc": "NCM"
		}, {
			"value": "NGM",
			"name": "NGM",
			"desc": "NGM"
		}],
		"symbols_types": [{
			"name": "All types",
			"value": ""
		}, {
			"name": "Stock",
			"value": ""
		}, {
			"name": "Index",
			"value": ""
		}],
		// "supported_resolutions": ['1', '5', '15', '30', '60', 'D', 'W', 'M']
        "supported_resolutions": ['1', '5', '15','20', '30', '60', '1440', '10080', '43200']
	}
};

/**
 * onready 方法
 * @param callback
 */
Datafeeds.UDFCompatibleDatafeed.prototype.onReady = function(callback) {
	setTimeout(function() {
		callback(defaultConfig());
		console.log("onReady");
	}, 0);
};

/**
 * 搜索交易对
 * @param searchString
 * @param exchange
 * @param type
 * @param onResultReadyCallback
 */
Datafeeds.UDFCompatibleDatafeed.prototype.searchSymbols = function(searchString, exchange, type, onResultReadyCallback) {
	console.log("searchSymbols");
};

/**
 * {"name":"AAPL","exchange-traded":"NasdaqNM","exchange-listed":"NasdaqNM","timezone":"America/New_York","minmov":1,"minmov2":0,"pointvalue":1,"session":"0930-1630","has_intraday":false,"has_no_volume":false,"description":"Apple Inc.","type":"stock","supported_resolutions":["D","2D","3D","W","3W","M","6M"],"pricescale":100,"ticker":"AAPL","base_name":["AAPL"],"legs":["AAPL"],"exchange":"NasdaqNM","full_name":"NasdaqNM:AAPL","pro_name":"NasdaqNM:AAPL","data_status":"streaming"}
 */
function defaultSymbolInfo(datafeed) {

	return {
		"name": datafeed._currentName,
		"exchange-traded": "NasdaqNM",
		"exchange-listed": "NasdaqNM",
		"timezone": "Asia/Shanghai",
		"minmov": 1,
		"minmov2": 0,
		"pointvalue": 1,
		"session": "24x7",
		"has_intraday": true,
		"has_no_volume": false,
		"type": "bitcoin",
        "supported_resolutions": ['1', '5', '15','20', '30', '60' , '1440', '10080', '43200'],
		"has_weekly_and_monthly":true,
		"has_daily":true,
		"pricescale": getDecimal(),
		"ticker": datafeed._currentName,
		"exchange": "BIHUEX",
		"data_status": "streaming"
	};
}

/**
 *
 * 当需要根据交易对的名字获得交易对的详细信息的时候调用
 * @param symbolName
 * @param onSymbolResolvedCallback
 *
 * @param onResolveErrorCallback
 */
Datafeeds.UDFCompatibleDatafeed.prototype.resolveSymbol = function(symbolName, onSymbolResolvedCallback, onResolveErrorCallback) {
	var that = this;
	console.log(symbolName);
	setTimeout(function() {
		onSymbolResolvedCallback(defaultSymbolInfo(that));
	}, 0);

};

/**
 *
 * @param symbolInfo
 * @param resolution
 * @param from
 * @param to
 * @param onHistoryCallback
 * @param onErrorCallback
 * @param firstDataRequest 是否是第一次加载数据,第一次加载数据的时候，可以忽略to
 *
 * {time, close, open, high, low, volume}
 *
 */
Datafeeds.UDFCompatibleDatafeed.prototype.getBars = function(symbolInfo, resolution, fromP, toP, onHistoryCallback, onErrorCallback, firstDataRequest) {

	// if(!firstDataRequest) {
	// 	return;
	// }

	var symbolParamter = $("#symbol").val();

	$.ajax({
		type: "get",
		url:  "/tradeviewdata",
		async: true,
		dataType: 'json',
		data: {
			symbol: symbolParamter,
			step: resolution * 60,
		},
		success: function(data) {
			if(data.state == 10200) {
				var lines = data.data;
				var array = [];
				for(var i = 0; i < lines.length; i++) {
					var oneLine = lines[i];
					var barValue = { };
					barValue.time = oneLine["time"],
					barValue.close = oneLine["close"],
					barValue.open = oneLine["open"],
					barValue.high = oneLine["high"],
					barValue.low = oneLine["low"],
					barValue.volume = Number(oneLine["volume"]),
					array.push(barValue);
					array.sort(compare('time'))
				}
				onHistoryCallback(array);
			}
		},
		error: function(e) {
			console.log("kline error");
		}
	});
};

/**
 * Charting Library calls this function when it wants to receive real-time updates for a symbol.
 * The Library assumes that you will call onRealtimeCallback every time you want to update the most recent bar or to add a new one.
 * @param symbolInfo
 * @param resolution
 * @param onRealtimeCallback
 * @param listenerGUID
 * @param onResetCacheNeededCallback
 */
var time1 = "";

Datafeeds.UDFCompatibleDatafeed.prototype.subscribeBars = function(symbolInfo, resolution, onRealtimeCallback, listenerGUID, onResetCacheNeededCallback) {

	clearInterval(time1);
	time1 = setInterval(req,2000);

	// setTimeout(req,5000);
	// timer();
	// function timer(){
	// 	setTimeout(req,5000);
	// }
	var data = {
        symbol:$('#symbol').val(),
		step : resolution*60
	}
	function req(){
		$.ajax({
			type: "get",
			url:  "/incrementdata",
			async: true,
			dataType: 'json',
			data: data,
			success: function(data) {
				if(data.state == 10200) {
					onRealtimeCallback(data.data);
				}
			},
			error: function(e) {
				console.log("kline error");
			}
		});
	}

	console.log("subscribeBars");

};

/**
 * Charting Library calls this function when it doesn't want to receive updates for this subscriber any more. subscriberUID will be the same object that Library passed to subscribeBars before.
 * @param listenerGUID
 */
Datafeeds.UDFCompatibleDatafeed.prototype.unsubscribeBars = function(listenerGUID) {
	console.log("unsubscribeBars");
};

/**
 * Charting Library calls this function when it is going to request some historical data to give you an ability to override the amount of bars requested.
 * @param period
 * @param resolutionBack
 * @param intervalBack
 */
Datafeeds.UDFCompatibleDatafeed.prototype.calculateHistoryDepth = function(period, resolutionBack, intervalBack) {
	console.log("calculateHistoryDepth:period" + period + "resolutionBack:" + resolutionBack + "intervalBack:" + intervalBack);
};


//Datefeeds.prototype.calculateHistoryDepth = function(resolution,resolutionBack,intervalBack){
//	if(period == "1D"){
//		return{
//			resolutionBack:"M",
//			intervalBack:6
//		}
//	}
//}

/**
 * 当需要支持点击弹出提示的时候用到
 * @param symbolInfo
 * @param rangeStart
 * @param rangeEnd
 * @param onDataCallback
 * @param resolution
 */
Datafeeds.UDFCompatibleDatafeed.prototype.getMarks = function(symbolInfo, rangeStart, rangeEnd, onDataCallback, resolution) {
	console.log("getMarks");
};

/**
 * 点击事件提示的时候用到
 * @param symbolInfo
 * @param rangeStart
 * @param rangeEnd
 * @param onDataCallback
 * @param resolution
 */
Datafeeds.UDFCompatibleDatafeed.prototype.getTimescaleMarks = function(symbolInfo, rangeStart, rangeEnd, onDataCallback, resolution) {
	console.log("getTimescaleMarks:symbolInfo" + symbolInfo + "rangeStart:" + rangeStart + "rangeEnd:" + rangeEnd);
};

/**
 * 获取服务器时间
 * @param callback
 */
Datafeeds.UDFCompatibleDatafeed.prototype.getServerTime = function(callback) {
	var timestamp = new Date().getTime();
	callback(timestamp);
	console.log("getServerTime:" + timestamp);
};

/**
 * 报价信息
 * @param symbols
 * @param onDataCallback
 * @param onErrorCallback
 */
Datafeeds.UDFCompatibleDatafeed.prototype.getQuotes = function(symbols, onDataCallback, onErrorCallback) {
	console.log("getQuotes");
};

/**
 * 订阅报价信息
 * @param symbols
 * @param fastSymbols
 * @param onRealtimeCallback
 * @param listenerGUID
 */
Datafeeds.UDFCompatibleDatafeed.prototype.subscribeQuotes = function(symbols, fastSymbols, onRealtimeCallback, listenerGUID) {
	
	console.log("subscribeQuotes");
};

/**
 * 解除报价订阅
 * @param listenerGUID
 */
Datafeeds.UDFCompatibleDatafeed.prototype.unsubscribeQuotes = function(listenerGUID) {
	console.log("listenerGUID");
};