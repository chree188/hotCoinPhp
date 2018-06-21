<!DOCTYPE html>
<html>
<head>

    <title>TradingView Charting Library demo -- testing mess</title>

    <!-- Fix for iOS Safari zooming bug -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <script type="text/javascript" src="{{asset('js/plugin/charting/charting_library.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugin/charting/datafeed.js')}}"></script>
    <script src="{{asset('/js/plugin/pako.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/plugin/datafeeds/udf/dist/polyfills.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugin/datafeeds/udf/dist/bundle.js')}}"></script>
    <script>

        var WS_URL= 'wss://api.huobipro.com/ws';
        var ws;
        var df = new datafeed();

        function handleData(msg){

            var data = JSON.parse(msg);

            if (data.ping) {
                sendHeartMessage(data.ping);
                return;
            }
            if(df.request){
                df.onHistoryCallback(exchangeData(data.data),{noData:true});
            }
        }

        //发送心跳数据
        function sendHeartMessage(ping){
            ws.send(JSON.stringify({"pong":ping}));
        }

        TradingView.onready(function(){
           ws = new WebSocket(WS_URL);
            ws.onopen = function () {

            };

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
                isConnection = false;
            };

            var widget = window.tvWidget = new TradingView.widget({
                // debug: true, // uncomment this line to see Library errors and warnings in the console
                fullscreen: true,
                symbol: 'USDT',
                interval: 'D',
                container_id: "tv_chart_container",
                //	BEWARE: no trailing slash is expected in feed URL
                datafeed: df,
                library_path: "/js/plugin/charting/",
                locale:  "en",
                //	Regression Trend-related functionality is not implemented yet, so it's hidden for a while
                drawings_access: { type: 'black', tools: [ { name: "Regression Trend" } ] },
                disabled_features: ["use_localstorage_for_settings"],
                enabled_features: ["study_templates"],
                charts_storage_url: 'http://saveload.tradingview.com',
                charts_storage_api_version: "1.1",
                client_id: 'tradingview.com',
                user_id: 'public_user_id'
            });
        });

        function exchangeData(originData){
            console.log(originData);
            var data = originData.map(function(item){
                return {time:item['id'],close:item['close'],open:item['open'],high:item['high'],low:item['low'],volume:item['vol']};
            });
            console.log(data);
            return data;
        }
    </script>

</head>

    <body style="margin:0;">
        <div id="tv_chart_container"></div>
    </body>

</html>