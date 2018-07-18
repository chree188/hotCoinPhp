function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

TradingView.onready(function() {

	var widget = window.Widget = new TradingView.widget({
		custom_css_url: './chartKLine.css',
		width: '100%', //express.kLine_containerWidth,
		height: '100%', //express.kLine_containerHeight,
		debug: false, // uncomment this line to see Library errors and warnings in the console
		fullscreen: false,
		symbol: "hotcoin",
		interval: '15',
        // interval: 'D',
		container_id: "div-tradeview-chart",
		timezone: "Asia/Shanghai",
		datafeed: new Datafeeds.UDFCompatibleDatafeed("http://127.0.0.1:8081"),
		library_path: "charting_library/",
		locale: getParameterByName('lang') || "zh",
		toolbar_bg: "#181b2a",
		studies_access: {
			type: "black",
			tools: [{
				name: "<study name>",
				grayed: true
			}, ]
		},
		disabled_features: [
			"display_market_status",
			"left_toolbar",
			"timeframes_toolbar",
			"go_to_date",
			"header_chart_type",
			"header_resolutions",
			"use_localstorage_for_settings",
			"header_symbol_search",
			"header_saveload",
			"header_interval_dialog_button",
			"header_undo_redo",
			"header_compare",
			"header_screenshot",
			"volume_force_overlay",
			"compare_symbol",
			"save_chart_properties_to_local_storage",
			"edit_buttons_in_legend"
			//		"chart_zoom"
		],
		enabled_features: [
			"move_logo_to_main_pane",
		],
		charts_storage_url: 'http://saveload.tradingview.com',
		charts_storage_api_version: "1.1",
		client_id: 'tradingview.com',
		user_id: 'public_id',
        numeric_formatting:{decimal_sign:'.'},
		overrides: {
            "paneProperties.background": "#181b2a",
            "paneProperties.crossHairProperties.color": "#181b2a",
    		"mainSeriesProperties.candleStyle.upColor": "#64ae74",
			"mainSeriesProperties.candleStyle.downColor": "#df5f61",
            "mainSeriesProperties.showCountdown": !1,
			//烛心
			"mainSeriesProperties.candleStyle.drawWick": true,
			//烛心颜色
			"mainSeriesProperties.candleStyle.wickUpColor": '#64ae74',
			"mainSeriesProperties.candleStyle.wickDownColor": "#df5f61",
			//边框
			"mainSeriesProperties.candleStyle.drawBorder": true,
			"mainSeriesProperties.candleStyle.borderUpColor": "#64ae74",
			"mainSeriesProperties.candleStyle.borderDownColor": "#df5f61",
			//网格
			"paneProperties.vertGridProperties.style": 0,
			"paneProperties.horzGridProperties.color": "#1c253b",
			"paneProperties.vertGridProperties.color": "#1c253b",
			//坐标轴和刻度标签颜色
			"scalesProperties.lineColor": "#525a77",
			"scalesProperties.textColor": "#525a77",
			"paneProperties.legendProperties.showLegend": false,
			"paneProperties.topMargin": 20,
			//volume
            "volumePaneSize": "small",
		},

	});

	// 设置自定义按钮
	/**
	 *
	 */
	widget.onChartReady(function() {
		// now it's safe to call any other widget's methods
		console.log("charts ready1 .............................");

		widget.createButton()
			.attr('title', "line")
			.on('click', function(e) {
				widget.chart().setChartType(3);
				widget.chart().setResolution("1", function() {
					$(".button").removeClass("selected");
					console.log("set resolution callback");
				});
				$(this).addClass("selected");
			}).append($('<span>real</span>'));

		widget.createButton()
			.attr('title', "1min")
			.on('click', function(e) {
				widget.chart().setChartType(1);
				widget.chart().setResolution("1", function() {
                    widget.chart().setChartType(1);
					console.log("set resolution callback");
				});
				$(this).parent().siblings().find('.selected').removeClass("selected");
				$(this).addClass("selected");
			}).append($('<span>1min</span>'));

		widget.createButton()
			.attr('title', "5min")
			.on('click', function(e) {
				widget.chart().setChartType(1);
				widget.chart().setResolution("5", function() {
                    widget.chart().setChartType(1);
					console.log("set resolution 5 callback");
				});
				$(this).parent().siblings().find('.selected').removeClass("selected");
				$(this).addClass("selected");
			}).append($('<span>5min</span>'));

		widget.createButton()
			.attr('title', "15min")
            .addClass("selected")
			.on('click', function(e) {
				widget.chart().setChartType(1);
				widget.chart().setResolution("15", function() {
                    widget.chart().setChartType(1);
					console.log("set resolution 15 callback");
				});
				$(this).parent().siblings().find('.selected').removeClass("selected");
				$(this).addClass("selected");
			}).append($('<span>15min</span>'));

		widget.createButton()
			.attr('title', "30min")
			.on('click', function(e) {
				widget.chart().setChartType(1);
				widget.chart().setResolution("30", function() {
                    widget.chart().setChartType(1);
					console.log("set resolution 30 callback");
				});
				$(this).parent().siblings().find('.selected').removeClass("selected");
				$(this).addClass("selected");
			}).append($('<span>30min</span>'));

		widget.createButton()
			.attr('title', "1hour")
			.on('click', function(e) {
				widget.chart().setChartType(1);
				widget.chart().setResolution("60", function() {
                    widget.chart().setChartType(1)
					console.log("set resolution 60 callback");
				});
				$(this).parent().siblings().find('.selected').removeClass("selected");
				$(this).addClass("selected");
			}).append($('<span>1hour</span>'));


        widget.createButton()
            .attr('title', "1Day")
            .on('click', function (e) {
                widget.chart().setChartType(1);
                widget.chart().setResolution("1440",function () {
                    widget.chart().setChartType(1)
                    console.log("set resolution 1440 callback");
                });
                $(this).parent().siblings().find('.selected').removeClass("selected");
                $(this).addClass("selected");
            }).append($('<span>1day</span>'));


        widget.createButton()
            .attr('title', "1week")
            .on('click', function (e) {
                widget.chart().setChartType(1);
                widget.chart().setResolution("10080",function () {
                    widget.chart().setChartType(1)
                    console.log("set resolution 10080 callback");
                });
                $(this).parent().siblings().find('.selected').removeClass("selected");
                $(this).addClass("selected");
            }).append($('<span>1week</span>'));

        widget.createButton()
            .attr('title', "1mon")
            .on('click', function (e) {
                widget.chart().setChartType(1);
                widget.chart().setResolution("43200",function () {
                    console.log("set resolution 1mon callback");
                });
                $(this).parent().siblings().find('.selected').removeClass("selected");
                $(this).addClass("selected");
            }).append($('<span>1mon</span>'));
		Widget.chart().createStudy('EMA Cross', false, false, null, null, {
			'histogram.plottype': 'histogram'
		});

	});

});