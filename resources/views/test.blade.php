<!DOCTYPE html>
<html>
	<head>

		<title>TradingView Charting Library demo -- testing mess</title>

		<!-- Fix for iOS Safari zooming bug -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">

		<script type="text/javascript" src="{{asset('js/plugin/charting/charting_library.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/plugin/datafeeds/udf/dist/polyfills.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/plugin/datafeeds/udf/dist/bundle.js')}}"></script>

		<script type="text/javascript">
			console.log(TradingView.version());

			var referenceChart = {"layout":"s","charts":[{"panes":[{"sources":[{"type":"MainSeries","id":"cd230b4c-d534-4aac-85f0-78a9238e6aa9","state":{"style":1,"esdShowDividends":true,"esdShowSplits":true,"esdShowEarnings":true,"esdShowBreaks":false,"esdBreaksStyle":{"color":"#E2745B","style":2,"width":1},"esdFlagSize":2,"showCountdown":true,"showInDataWindow":true,"showLastValue":true,"visible":true,"silentIntervalChange":false,"showPriceLine":true,"priceLineWidth":1,"lockScale":false,"minTick":"default","extendedHours":false,"sessVis":false,"candleStyle":{"upColor":"#6ba583","downColor":"#d75442","drawWick":true,"drawBorder":true,"borderColor":"#378658","borderUpColor":"#225437","borderDownColor":"#5b1a13","wickColor":"#737375","barColorsOnPrevClose":false},"hollowCandleStyle":{"upColor":"#6ba583","downColor":"#d75442","drawWick":true,"drawBorder":true,"borderColor":"#378658","borderUpColor":"#225437","borderDownColor":"#5b1a13","wickColor":"#737375"},"haStyle":{"upColor":"#6ba583","downColor":"#d75442","drawWick":true,"drawBorder":true,"borderColor":"#378658","borderUpColor":"#225437","borderDownColor":"#5b1a13","wickColor":"#737375","barColorsOnPrevClose":false},"barStyle":{"upColor":"#6ba583","downColor":"#d75442","barColorsOnPrevClose":false,"dontDrawOpen":false},"lineStyle":{"color":"#3C78D8","linestyle":0,"linewidth":1,"priceSource":"close","styleType":2},"areaStyle":{"color1":"#606090","color2":"#01F6F5","linecolor":"#0094FF","linestyle":0,"linewidth":1,"priceSource":"close","transparency":50},"priceAxisProperties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false},"renkoStyle":{"upColor":"#6ba583","downColor":"#d75442","borderUpColor":"#225437","borderDownColor":"#5b1a13","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","borderUpColorProjection":"#225437","borderDownColorProjection":"#5b1a13","inputs":{"source":"close","boxSize":3,"style":"ATR","atrLength":14},"inputInfo":{"source":{"name":"Source"},"boxSize":{"name":"Box size"},"style":{"name":"Style"},"atrLength":{"name":"ATR Length"}}},"pbStyle":{"upColor":"#6ba583","downColor":"#d75442","borderUpColor":"#225437","borderDownColor":"#5b1a13","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","borderUpColorProjection":"#225437","borderDownColorProjection":"#5b1a13","inputs":{"source":"close","lb":3},"inputInfo":{"source":{"name":"Source"},"lb":{"name":"Number of line"}}},"kagiStyle":{"upColor":"#6ba583","downColor":"#d75442","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","inputs":{"source":"close","reversalAmount":1},"inputInfo":{"source":{"name":"Source"},"reversalAmount":{"name":"Reversal amount"}}},"pnfStyle":{"upColor":"#6ba583","downColor":"#d75442","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","inputs":{"sources":"HL","reversalAmount":3,"boxSize":1,"style":"ATR","atrLength":14},"inputInfo":{"sources":{"name":"Source"},"boxSize":{"name":"Box size"},"reversalAmount":{"name":"Reversal amount"},"style":{"name":"Style"},"atrLength":{"name":"ATR Length"}}},"symbol":"NasdaqNM:AAPL","timeframe":"","onWidget":false,"interval":"D","shortName":"AAPL"},"zorder":-1},{"type":"Study","id":"546650f5-c32f-4eb6-8770-c304e5bb3e4d","state":{"styles":{"vol":{"linestyle":0,"linewidth":1,"plottype":5,"trackPrice":false,"transparency":65,"visible":true,"color":"#000080","histogramBase":0,"joinPoints":false,"title":"Volume MA"},"vol_ma":{"linestyle":0,"linewidth":1,"plottype":4,"trackPrice":false,"transparency":65,"visible":true,"color":"#0496FF","histogramBase":0,"joinPoints":false,"title":"Volume"}},"precision":"default","palettes":{"volumePalette":{"colors":{"0":{"color":"#FF0000","width":1,"style":0,"name":"Color 0"},"1":{"color":"#008000","width":1,"style":0,"name":"Color 1"}}}},"inputs":{"0":{"id":"showMA","name":"showMA","defval":false,"type":"bool"},"showMA":true},"bands":{},"area":{},"graphics":{},"showInDataWindow":true,"showLastValue":true,"visible":true,"showStudyArguments":true,"plots":{"0":{"id":"vol","type":"line"},"1":{"id":"volumePalette","palette":"volumePalette","target":"vol","type":"colorer"},"2":{"id":"vol_ma","type":"line"}},"_metainfoVersion":15,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"transparency":65,"description":"Volume","shortDescription":"Volume","is_price_study":false,"id":"Volume@tv-basicstudies","shortId":"Volume","packageId":"tv-basicstudies","version":"1","fullId":"Volume@tv-basicstudies-1","productId":"tv-basicstudies","name":"Volume@tv-basicstudies"},"zorder":-2,"metaInfo":{"palettes":{"volumePalette":{"colors":{"0":{"name":"Color 0"},"1":{"name":"Color 1"}}}},"inputs":[{"id":"showMA","name":"showMA","defval":false,"type":"bool"}],"plots":[{"id":"vol","type":"line"},{"id":"volumePalette","palette":"volumePalette","target":"vol","type":"colorer"},{"id":"vol_ma","type":"line"}],"graphics":{},"defaults":{"styles":{"vol":{"linestyle":0,"linewidth":1,"plottype":5,"trackPrice":false,"transparency":65,"visible":true,"color":"#000080"},"vol_ma":{"linestyle":0,"linewidth":1,"plottype":4,"trackPrice":false,"transparency":65,"visible":true,"color":"#0496FF"}},"precision":0,"palettes":{"volumePalette":{"colors":{"0":{"color":"#FF0000","width":1,"style":0},"1":{"color":"#008000","width":1,"style":0}}}},"inputs":{"showMA":true}},"_metainfoVersion":15,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"transparency":65,"styles":{"vol":{"title":"Volume MA","histogramBase":0},"vol_ma":{"title":"Volume","histogramBase":0}},"description":"Volume","shortDescription":"Volume","is_price_study":false,"id":"Volume@tv-basicstudies-1","shortId":"Volume","packageId":"tv-basicstudies","version":"1","fullId":"Volume@tv-basicstudies-1","productId":"tv-basicstudies","name":"Volume@tv-basicstudies"}},{"type":"LineToolTrendLine","id":"50c72b6a-f18d-4381-8c0e-7132e750e222","state":{"clonable":true,"linecolor":"#ff0000","linewidth":4,"linestyle":0,"extendLeft":false,"extendRight":false,"leftEnd":0,"rightEnd":0,"font":"Verdana","textcolor":"#157760","fontsize":12,"bold":false,"italic":false,"snapTo45Degrees":true,"alwaysShowStats":false,"showPriceRange":false,"showBarsRange":false,"showDateTimeRange":false,"showDistance":false,"showAngle":false,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1407402000,"offset":0,"price":16.54324809951624},{"time_t":1408525200,"offset":0,"price":16.68677263303386}],"zorder":-3,"ownerSource":"cd230b4c-d534-4aac-85f0-78a9238e6aa9"},{"type":"LineToolTrendLine","id":"31c823ba-d91f-402d-8ec5-d002764db616","state":{"clonable":true,"linecolor":"#159980","linewidth":4,"linestyle":0,"extendLeft":false,"extendRight":false,"leftEnd":0,"rightEnd":0,"font":"Verdana","textcolor":"#157760","fontsize":12,"bold":false,"italic":false,"snapTo45Degrees":true,"alwaysShowStats":false,"showPriceRange":false,"showBarsRange":false,"showDateTimeRange":false,"showDistance":false,"showAngle":false,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1408525200,"offset":0,"price":16.689205252246026},{"time_t":1409821200,"offset":0,"price":17.348445058742225}],"zorder":-4,"ownerSource":"cd230b4c-d534-4aac-85f0-78a9238e6aa9"},{"type":"LineToolTrendLine","id":"6a08c404-87bf-4e8f-ad49-314eb6fce6aa","state":{"clonable":true,"linecolor":"#ff0000","linewidth":4,"linestyle":0,"extendLeft":false,"extendRight":false,"leftEnd":0,"rightEnd":0,"font":"Verdana","textcolor":"#157760","fontsize":12,"bold":false,"italic":false,"snapTo45Degrees":true,"alwaysShowStats":false,"showPriceRange":false,"showBarsRange":false,"showDateTimeRange":false,"showDistance":false,"showAngle":false,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1410426000,"offset":0,"price":16.830297166551485},{"time_t":1408698000,"offset":0,"price":16.241603317208018}],"zorder":-5,"ownerSource":"cd230b4c-d534-4aac-85f0-78a9238e6aa9"},{"type":"LineToolTrendLine","id":"06643592-a0a3-46c0-8714-848efc7c90df","state":{"clonable":true,"linecolor":"#159980","linewidth":4,"linestyle":0,"extendLeft":false,"extendRight":false,"leftEnd":0,"rightEnd":0,"font":"Verdana","textcolor":"#157760","fontsize":12,"bold":false,"italic":false,"snapTo45Degrees":true,"alwaysShowStats":false,"showPriceRange":false,"showBarsRange":false,"showDateTimeRange":false,"showDistance":false,"showAngle":false,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1407488400,"offset":0,"price":15.60912232204561},{"time_t":1408698000,"offset":0,"price":16.246468555632344}],"zorder":-6,"ownerSource":"cd230b4c-d534-4aac-85f0-78a9238e6aa9"},{"type":"Study","id":"aef08fdc-2f28-4279-8552-2ac6afb4c267","state":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000","histogramBase":0,"joinPoints":false,"title":"Short"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#008000","histogramBase":0,"joinPoints":false,"title":"Long"},"plot_2":{"linestyle":0,"linewidth":4,"plottype":3,"trackPrice":false,"transparency":35,"visible":true,"color":"#000080","histogramBase":0,"joinPoints":false,"title":"Crosses"}},"precision":"default","inputs":{"0":{"id":"in_0","name":"Short","defval":9,"type":"integer","min":1,"max":1000000000000},"1":{"id":"in_1","name":"Long","defval":26,"type":"integer","min":1,"max":1000000000000},"in_0":9,"in_1":26},"palettes":{},"bands":{},"area":{},"graphics":{},"showInDataWindow":true,"showLastValue":true,"visible":true,"showStudyArguments":true,"plots":{"0":{"id":"plot_0","type":"line"},"1":{"id":"plot_1","type":"line"},"2":{"id":"plot_2","type":"line"}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"description":"MA Cross","shortDescription":"MA Cross","is_price_study":true,"id":"MA Cross@tv-basicstudies","shortId":"MA Cross","packageId":"tv-basicstudies","version":"1","fullId":"MA Cross@tv-basicstudies-1","productId":"tv-basicstudies","name":"MA Cross@tv-basicstudies"},"zorder":-7,"metaInfo":{"palettes":{},"inputs":[{"id":"in_0","name":"Short","defval":9,"type":"integer","min":1,"max":1000000000000},{"id":"in_1","name":"Long","defval":26,"type":"integer","min":1,"max":1000000000000}],"plots":[{"id":"plot_0","type":"line"},{"id":"plot_1","type":"line"},{"id":"plot_2","type":"line"}],"graphics":{},"defaults":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#008000"},"plot_2":{"linestyle":0,"linewidth":4,"plottype":3,"trackPrice":false,"transparency":35,"visible":true,"color":"#000080"}},"precision":4,"inputs":{"in_0":9,"in_1":26}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"styles":{"plot_0":{"title":"Short","histogramBase":0,"joinPoints":false},"plot_1":{"title":"Long","histogramBase":0,"joinPoints":false},"plot_2":{"title":"Crosses","histogramBase":0,"joinPoints":false}},"description":"MA Cross","shortDescription":"MA Cross","is_price_study":true,"id":"MA Cross@tv-basicstudies-1","shortId":"MA Cross","packageId":"tv-basicstudies","version":"1","fullId":"MA Cross@tv-basicstudies-1","productId":"tv-basicstudies","name":"MA Cross@tv-basicstudies"}},{"type":"LineToolParallelChannel","id":"25ee6f22-31c8-4b2d-bf95-639764fdca65","state":{"clonable":true,"linecolor":"#773499","linewidth":1,"linestyle":0,"extendLeft":false,"extendRight":false,"fillBackground":true,"backgroundColor":"#b4a7d6","transparency":50,"showMidline":false,"midlinecolor":"#773499","midlinewidth":1,"midlinestyle":2,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1404378000,"offset":0,"price":15.159939024390244},{"time_t":1406106000,"offset":0,"price":17.453841463414633},{"time_t":1404378000,"offset":0,"price":14.30262195121951}],"zorder":-8,"ownerSource":"cd230b4c-d534-4aac-85f0-78a9238e6aa9","priceOffset":-0.8573170731707336}],"leftAxisState":{"m_priceRange":{"m_minValue":-0.5,"m_maxValue":0.5},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":402,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"leftAxisSources":[],"rightAxisState":{"m_priceRange":{"m_minValue":13.18,"m_maxValue":17.36},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":402,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"rightAxisSources":["cd230b4c-d534-4aac-85f0-78a9238e6aa9","50c72b6a-f18d-4381-8c0e-7132e750e222","31c823ba-d91f-402d-8ec5-d002764db616","6a08c404-87bf-4e8f-ad49-314eb6fce6aa","06643592-a0a3-46c0-8714-848efc7c90df","aef08fdc-2f28-4279-8552-2ac6afb4c267","25ee6f22-31c8-4b2d-bf95-639764fdca65"],"overlayPriceScales":{"546650f5-c32f-4eb6-8770-c304e5bb3e4d":{"m_priceRange":{"m_minValue":0,"m_maxValue":54283500},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":402,"m_topMargin":0.75,"m_bottomMargin":0,"m_showSymbolLabels":false}},"stretchFactor":2000,"mainSourceId":"cd230b4c-d534-4aac-85f0-78a9238e6aa9"},{"sources":[{"type":"Study","id":"2812d462-e5ee-4805-96e9-c530fb01e6ae","state":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF6A00","histogramBase":0,"joinPoints":false,"title":"Upper"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0094FF","histogramBase":0,"joinPoints":false,"title":"Lower"}},"precision":"default","inputs":{"0":{"id":"in_0","name":"length","defval":14,"type":"integer","min":1,"max":1000000000000},"in_0":14},"palettes":{},"bands":{},"area":{},"graphics":{},"showInDataWindow":true,"showLastValue":true,"visible":true,"showStudyArguments":true,"plots":{"0":{"id":"plot_0","type":"line"},"1":{"id":"plot_1","type":"line"}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"description":"Aroon","shortDescription":"Aroon","is_price_study":false,"id":"Aroon@tv-basicstudies","shortId":"Aroon","packageId":"tv-basicstudies","version":"1","fullId":"Aroon@tv-basicstudies-1","productId":"tv-basicstudies","name":"Aroon@tv-basicstudies"},"zorder":-1,"metaInfo":{"palettes":{},"inputs":[{"id":"in_0","name":"length","defval":14,"type":"integer","min":1,"max":1000000000000}],"plots":[{"id":"plot_0","type":"line"},{"id":"plot_1","type":"line"}],"graphics":{},"defaults":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF6A00"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0094FF"}},"precision":4,"inputs":{"in_0":14}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"styles":{"plot_0":{"title":"Upper","histogramBase":0,"joinPoints":false},"plot_1":{"title":"Lower","histogramBase":0,"joinPoints":false}},"description":"Aroon","shortDescription":"Aroon","is_price_study":false,"id":"Aroon@tv-basicstudies-1","shortId":"Aroon","packageId":"tv-basicstudies","version":"1","fullId":"Aroon@tv-basicstudies-1","productId":"tv-basicstudies","name":"Aroon@tv-basicstudies"}}],"leftAxisState":{"m_priceRange":{"m_minValue":-0.5,"m_maxValue":0.5},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":201,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"leftAxisSources":[],"rightAxisState":{"m_priceRange":{"m_minValue":0,"m_maxValue":100},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":201,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"rightAxisSources":["2812d462-e5ee-4805-96e9-c530fb01e6ae"],"overlayPriceScales":{},"stretchFactor":1000,"mainSourceId":"2812d462-e5ee-4805-96e9-c530fb01e6ae"},{"sources":[{"type":"Study","id":"85fda86c-7a8a-4ecb-8066-336852fba636","state":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":1,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000","histogramBase":0,"joinPoints":false,"title":"Histogram"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0000FF","histogramBase":0,"joinPoints":false,"title":"MACD"},"plot_2":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000","histogramBase":0,"joinPoints":false,"title":"Signal"}},"precision":"default","inputs":{"0":{"id":"in_0","name":"fastLength","defval":12,"type":"integer","min":1,"max":1000000000000},"1":{"id":"in_1","name":"slowLength","defval":26,"type":"integer","min":1,"max":1000000000000},"2":{"id":"in_2","name":"signalLength","defval":9,"type":"integer","min":1,"max":1000000000000},"in_0":12,"in_1":26,"in_2":9},"palettes":{},"bands":{},"area":{},"graphics":{},"showInDataWindow":true,"showLastValue":true,"visible":true,"showStudyArguments":true,"plots":{"0":{"id":"plot_0","type":"line"},"1":{"id":"plot_1","type":"line"},"2":{"id":"plot_2","type":"line"}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"description":"Moving Average Convergence/Divergence","shortDescription":"MACD","is_price_study":false,"id":"Moving Average Convergence/Divergence@tv-basicstudies","shortId":"Moving Average Convergence/Divergence","packageId":"tv-basicstudies","version":"1","fullId":"Moving Average Convergence/Divergence@tv-basicstudies-1","productId":"tv-basicstudies","name":"Moving Average Convergence/Divergence@tv-basicstudies"},"zorder":-1,"metaInfo":{"palettes":{},"inputs":[{"id":"in_0","name":"fastLength","defval":12,"type":"integer","min":1,"max":1000000000000},{"id":"in_1","name":"slowLength","defval":26,"type":"integer","min":1,"max":1000000000000},{"id":"in_2","name":"signalLength","defval":9,"type":"integer","min":1,"max":1000000000000}],"plots":[{"id":"plot_0","type":"line"},{"id":"plot_1","type":"line"},{"id":"plot_2","type":"line"}],"graphics":{},"defaults":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":1,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0000FF"},"plot_2":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000"}},"precision":4,"inputs":{"in_0":12,"in_1":26,"in_2":9}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"styles":{"plot_0":{"title":"Histogram","histogramBase":0,"joinPoints":false},"plot_1":{"title":"MACD","histogramBase":0,"joinPoints":false},"plot_2":{"title":"Signal","histogramBase":0,"joinPoints":false}},"description":"Moving Average Convergence/Divergence","shortDescription":"MACD","is_price_study":false,"id":"Moving Average Convergence/Divergence@tv-basicstudies-1","shortId":"Moving Average Convergence/Divergence","packageId":"tv-basicstudies","version":"1","fullId":"Moving Average Convergence/Divergence@tv-basicstudies-1","productId":"tv-basicstudies","name":"Moving Average Convergence/Divergence@tv-basicstudies"}}],"leftAxisState":{"m_priceRange":{"m_minValue":-0.5,"m_maxValue":0.5},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":201,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"leftAxisSources":[],"rightAxisState":{"m_priceRange":{"m_minValue":-0.19489314851238426,"m_maxValue":0.6836151513925035},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":201,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"rightAxisSources":["85fda86c-7a8a-4ecb-8066-336852fba636"],"overlayPriceScales":{},"stretchFactor":1000,"mainSourceId":"85fda86c-7a8a-4ecb-8066-336852fba636"}],"timeScale":{"m_barSpacing":16.349546630354396,"m_rightOffset":2.9044817844617223},"chartProperties":{"paneProperties":{"background":"#ffffff","gridProperties":{"color":"#E6E6E6","style":0},"crossHairProperties":{"color":"#B7B7B7","style":2,"transparency":0,"width":1},"topMargin":5,"bottomMargin":5,"leftAxisProperties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false},"rightAxisProperties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false},"overlayPropreties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false}},"scalesProperties":{"showLeftScale":false,"showRightScale":true,"backgroundColor":"#ffffff","lineColor":"#555","textColor":"#555","scaleSeriesOnly":false}},"version":2,"timezone":"UTC"}]};

			var referenceChart2 = {"layout":"s","charts":[{"panes":[{"sources":[{"type":"MainSeries","id":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd","state":{"style":1,"esdShowDividends":true,"esdShowSplits":true,"esdShowEarnings":true,"esdShowBreaks":false,"esdBreaksStyle":{"color":"#E2745B","style":2,"width":1},"esdFlagSize":2,"showCountdown":true,"showInDataWindow":true,"showLastValue":true,"visible":true,"silentIntervalChange":false,"showPriceLine":true,"priceLineWidth":1,"lockScale":false,"minTick":"default","extendedHours":false,"sessVis":false,"candleStyle":{"upColor":"#6ba583","downColor":"#d75442","drawWick":true,"drawBorder":true,"borderColor":"#378658","borderUpColor":"#225437","borderDownColor":"#5b1a13","wickColor":"#737375","barColorsOnPrevClose":false},"hollowCandleStyle":{"upColor":"#6ba583","downColor":"#d75442","drawWick":true,"drawBorder":true,"borderColor":"#378658","borderUpColor":"#225437","borderDownColor":"#5b1a13","wickColor":"#737375"},"haStyle":{"upColor":"#6ba583","downColor":"#d75442","drawWick":true,"drawBorder":true,"borderColor":"#378658","borderUpColor":"#225437","borderDownColor":"#5b1a13","wickColor":"#737375","barColorsOnPrevClose":false},"barStyle":{"upColor":"#6ba583","downColor":"#d75442","barColorsOnPrevClose":false,"dontDrawOpen":false},"lineStyle":{"color":"#3C78D8","linestyle":0,"linewidth":1,"priceSource":"close","styleType":2},"areaStyle":{"color1":"#606090","color2":"#01F6F5","linecolor":"#0094FF","linestyle":0,"linewidth":1,"priceSource":"close","transparency":50},"priceAxisProperties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false},"renkoStyle":{"upColor":"#6ba583","downColor":"#d75442","borderUpColor":"#225437","borderDownColor":"#5b1a13","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","borderUpColorProjection":"#225437","borderDownColorProjection":"#5b1a13","inputs":{"source":"close","boxSize":3,"style":"ATR","atrLength":14},"inputInfo":{"source":{"name":"Source"},"boxSize":{"name":"Box size"},"style":{"name":"Style"},"atrLength":{"name":"ATR Length"}}},"pbStyle":{"upColor":"#6ba583","downColor":"#d75442","borderUpColor":"#225437","borderDownColor":"#5b1a13","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","borderUpColorProjection":"#225437","borderDownColorProjection":"#5b1a13","inputs":{"source":"close","lb":3},"inputInfo":{"source":{"name":"Source"},"lb":{"name":"Number of line"}}},"kagiStyle":{"upColor":"#6ba583","downColor":"#d75442","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","inputs":{"source":"close","reversalAmount":1},"inputInfo":{"source":{"name":"Source"},"reversalAmount":{"name":"Reversal amount"}}},"pnfStyle":{"upColor":"#6ba583","downColor":"#d75442","upColorProjection":"#4ad6be","downColorProjection":"#d649cf","inputs":{"sources":"HL","reversalAmount":3,"boxSize":1,"style":"ATR","atrLength":14},"inputInfo":{"sources":{"name":"Source"},"boxSize":{"name":"Box size"},"reversalAmount":{"name":"Reversal amount"},"style":{"name":"Style"},"atrLength":{"name":"ATR Length"}}},"symbol":"NasdaqNM:AAPL","timeframe":"","onWidget":false,"interval":"D","shortName":"AAPL"},"zorder":-1},{"type":"Study","id":"49e81c50-29a7-412c-af84-29ffaa9a2d0b","state":{"styles":{"vol":{"linestyle":0,"linewidth":1,"plottype":5,"trackPrice":false,"transparency":65,"visible":true,"color":"#000080","histogramBase":0,"joinPoints":false,"title":"Volume MA"},"vol_ma":{"linestyle":0,"linewidth":1,"plottype":4,"trackPrice":false,"transparency":65,"visible":true,"color":"#0496FF","histogramBase":0,"joinPoints":false,"title":"Volume"}},"precision":"default","palettes":{"volumePalette":{"colors":{"0":{"color":"#FF0000","width":1,"style":0,"name":"Color 0"},"1":{"color":"#008000","width":1,"style":0,"name":"Color 1"}}}},"inputs":{"0":{"id":"showMA","name":"showMA","defval":false,"type":"bool"},"showMA":true},"bands":{},"area":{},"graphics":{},"showInDataWindow":true,"showLastValue":true,"visible":true,"showStudyArguments":true,"plots":{"0":{"id":"vol","type":"line"},"1":{"id":"volumePalette","palette":"volumePalette","target":"vol","type":"colorer"},"2":{"id":"vol_ma","type":"line"}},"_metainfoVersion":15,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"transparency":65,"description":"Volume","shortDescription":"Volume","is_price_study":false,"id":"Volume@tv-basicstudies","shortId":"Volume","packageId":"tv-basicstudies","version":"1","fullId":"Volume@tv-basicstudies-1","productId":"tv-basicstudies","name":"Volume@tv-basicstudies"},"zorder":-2,"metaInfo":{"palettes":{"volumePalette":{"colors":{"0":{"name":"Color 0"},"1":{"name":"Color 1"}}}},"inputs":[{"id":"showMA","name":"showMA","defval":false,"type":"bool"}],"plots":[{"id":"vol","type":"line"},{"id":"volumePalette","palette":"volumePalette","target":"vol","type":"colorer"},{"id":"vol_ma","type":"line"}],"graphics":{},"defaults":{"styles":{"vol":{"linestyle":0,"linewidth":1,"plottype":5,"trackPrice":false,"transparency":65,"visible":true,"color":"#000080"},"vol_ma":{"linestyle":0,"linewidth":1,"plottype":4,"trackPrice":false,"transparency":65,"visible":true,"color":"#0496FF"}},"precision":0,"palettes":{"volumePalette":{"colors":{"0":{"color":"#FF0000","width":1,"style":0},"1":{"color":"#008000","width":1,"style":0}}}},"inputs":{"showMA":true}},"_metainfoVersion":15,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"transparency":65,"styles":{"vol":{"title":"Volume MA","histogramBase":0},"vol_ma":{"title":"Volume","histogramBase":0}},"description":"Volume","shortDescription":"Volume","is_price_study":false,"id":"Volume@tv-basicstudies-1","shortId":"Volume","packageId":"tv-basicstudies","version":"1","fullId":"Volume@tv-basicstudies-1","productId":"tv-basicstudies","name":"Volume@tv-basicstudies"}},{"type":"Study","id":"00dfe526-bc98-447f-af9a-6c1b020ab97c","state":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000","histogramBase":0,"joinPoints":false,"title":"Median"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0000FF","histogramBase":0,"joinPoints":false,"title":"Upper"},"plot_2":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0000FF","histogramBase":0,"joinPoints":false,"title":"Lower"}},"precision":"default","filledAreasStyle":{"fill_0":{"color":"#000080","transparency":90,"visible":true}},"inputs":{"0":{"id":"in_0","name":"length","defval":20,"type":"integer","min":1,"max":1000000000000},"1":{"id":"in_1","name":"mult","defval":2,"type":"float","min":0.001,"max":50},"in_0":20,"in_1":2},"palettes":{},"bands":{},"area":{},"graphics":{},"showInDataWindow":true,"showLastValue":true,"visible":true,"showStudyArguments":true,"plots":{"0":{"id":"plot_0","type":"line"},"1":{"id":"plot_1","type":"line"},"2":{"id":"plot_2","type":"line"}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"description":"Bollinger Bands","shortDescription":"BB","is_price_study":true,"filledAreas":{"0":{"id":"fill_0","objAId":"plot_1","objBId":"plot_2","type":"plot_plot","title":"Plots Background"}},"id":"BB@tv-basicstudies","shortId":"BB","packageId":"tv-basicstudies","version":"1","fullId":"BB@tv-basicstudies-1","productId":"tv-basicstudies","name":"BB@tv-basicstudies"},"zorder":-3,"metaInfo":{"palettes":{},"inputs":[{"id":"in_0","name":"length","defval":20,"type":"integer","min":1,"max":1000000000000},{"id":"in_1","name":"mult","defval":2,"type":"float","min":0.001,"max":50}],"plots":[{"id":"plot_0","type":"line"},{"id":"plot_1","type":"line"},{"id":"plot_2","type":"line"}],"graphics":{},"defaults":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#FF0000"},"plot_1":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0000FF"},"plot_2":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#0000FF"}},"precision":4,"filledAreasStyle":{"fill_0":{"color":"#000080","transparency":90,"visible":true}},"inputs":{"in_0":20,"in_1":2}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"styles":{"plot_0":{"title":"Median","histogramBase":0,"joinPoints":false},"plot_1":{"title":"Upper","histogramBase":0,"joinPoints":false},"plot_2":{"title":"Lower","histogramBase":0,"joinPoints":false}},"description":"Bollinger Bands","shortDescription":"BB","is_price_study":true,"filledAreas":[{"id":"fill_0","objAId":"plot_1","objBId":"plot_2","type":"plot_plot","title":"Plots Background"}],"id":"BB@tv-basicstudies-1","shortId":"BB","packageId":"tv-basicstudies","version":"1","fullId":"BB@tv-basicstudies-1","productId":"tv-basicstudies","name":"BB@tv-basicstudies"}},{"type":"Study","id":"67661ca9-874f-46fe-bf04-f9a8a0de28c2","state":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#000080","histogramBase":0,"joinPoints":false,"title":"Plot"}},"precision":"default","inputs":{"0":{"id":"in_0","name":"length","defval":9,"type":"integer","min":1,"max":1000000000000},"in_0":9},"palettes":{},"bands":{},"area":{},"graphics":{},"showInDataWindow":true,"showLastValue":true,"visible":true,"showStudyArguments":true,"plots":{"0":{"id":"plot_0","type":"line"}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"description":"Hull MA","shortDescription":"HMA","is_price_study":true,"id":"Hull MA@tv-basicstudies","shortId":"Hull MA","packageId":"tv-basicstudies","version":"1","fullId":"Hull MA@tv-basicstudies-1","productId":"tv-basicstudies","name":"Hull MA@tv-basicstudies"},"zorder":-4,"metaInfo":{"palettes":{},"inputs":[{"id":"in_0","name":"length","defval":9,"type":"integer","min":1,"max":1000000000000}],"plots":[{"id":"plot_0","type":"line"}],"graphics":{},"defaults":{"styles":{"plot_0":{"linestyle":0,"linewidth":1,"plottype":0,"trackPrice":false,"transparency":35,"visible":true,"color":"#000080"}},"precision":4,"inputs":{"in_0":9}},"_metainfoVersion":23,"isTVScript":false,"isTVScriptStub":false,"is_hidden_study":false,"styles":{"plot_0":{"title":"Plot","histogramBase":0,"joinPoints":false}},"description":"Hull MA","shortDescription":"HMA","is_price_study":true,"id":"Hull MA@tv-basicstudies-1","shortId":"Hull MA","packageId":"tv-basicstudies","version":"1","fullId":"Hull MA@tv-basicstudies-1","productId":"tv-basicstudies","name":"Hull MA@tv-basicstudies"}},{"type":"LineToolBrush","id":"2a3a1752-1ccc-44df-ac81-7c0ab08e9b7f","state":{"clonable":true,"linecolor":"#353535","linewidth":2,"linestyle":0,"smooth":5,"fillBackground":false,"backgroundColor":"#153899","transparency":50,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1410858000,"offset":28,"price":15.705676452587987},{"time_t":1410858000,"offset":27,"price":15.619937970875615},{"time_t":1410858000,"offset":27,"price":15.555634109591335},{"time_t":1410858000,"offset":26,"price":15.491330248307055},{"time_t":1410858000,"offset":25,"price":15.405591766594682},{"time_t":1410858000,"offset":24,"price":15.319853284882308},{"time_t":1410858000,"offset":23,"price":15.25554942359803},{"time_t":1410858000,"offset":22,"price":15.137659011243516},{"time_t":1410858000,"offset":20,"price":15.03048590910305},{"time_t":1410858000,"offset":19,"price":14.944747427390677},{"time_t":1410858000,"offset":17,"price":14.880443566106397},{"time_t":1410858000,"offset":16,"price":14.816139704822117},{"time_t":1410858000,"offset":14,"price":14.762553153751883},{"time_t":1410858000,"offset":13,"price":14.730401223109743},{"time_t":1410858000,"offset":12,"price":14.687531982253557},{"time_t":1410858000,"offset":10,"price":14.64466274139737},{"time_t":1410858000,"offset":8,"price":14.569641569899044},{"time_t":1410858000,"offset":6,"price":14.537489639256904},{"time_t":1410858000,"offset":3,"price":14.473185777972624},{"time_t":1410858000,"offset":1,"price":14.408881916688344},{"time_t":1410771600,"offset":0,"price":14.376729986046204},{"time_t":1410339600,"offset":0,"price":14.333860745190018},{"time_t":1410166800,"offset":0,"price":14.290991504333832},{"time_t":1409734800,"offset":0,"price":14.269556883905738},{"time_t":1409302800,"offset":0,"price":14.248122263477644},{"time_t":1409130000,"offset":0,"price":14.226687643049551},{"time_t":1408698000,"offset":0,"price":14.226687643049551},{"time_t":1408438800,"offset":0,"price":14.215970332835504},{"time_t":1408006800,"offset":0,"price":14.215970332835504},{"time_t":1407488400,"offset":0,"price":14.215970332835504},{"time_t":1407229200,"offset":0,"price":14.248122263477644},{"time_t":1406710800,"offset":0,"price":14.269556883905738},{"time_t":1406278800,"offset":0,"price":14.290991504333832},{"time_t":1406019600,"offset":0,"price":14.32314343497597},{"time_t":1405674000,"offset":0,"price":14.355295365618112},{"time_t":1405501200,"offset":0,"price":14.38744729626025},{"time_t":1405069200,"offset":0,"price":14.45175115754453},{"time_t":1404723600,"offset":0,"price":14.505337708614764},{"time_t":1404118800,"offset":0,"price":14.58035888011309},{"time_t":1403600400,"offset":0,"price":14.633945431183324},{"time_t":1403082000,"offset":0,"price":14.687531982253557},{"time_t":1402477200,"offset":0,"price":14.741118533323789},{"time_t":1401872400,"offset":0,"price":14.805422394608069},{"time_t":1401267600,"offset":0,"price":14.859008945678303},{"time_t":1400662800,"offset":0,"price":14.891160876320443},{"time_t":1400144400,"offset":0,"price":14.923312806962583},{"time_t":1399626000,"offset":0,"price":14.93403011717663},{"time_t":1398934800,"offset":0,"price":14.93403011717663},{"time_t":1398416400,"offset":0,"price":14.93403011717663},{"time_t":1398070800,"offset":0,"price":14.93403011717663},{"time_t":1397466000,"offset":0,"price":14.93403011717663},{"time_t":1397034000,"offset":0,"price":14.923312806962583},{"time_t":1396515600,"offset":0,"price":14.90187818653449},{"time_t":1395997200,"offset":0,"price":14.869726255892349},{"time_t":1395824400,"offset":0,"price":14.848291635464257},{"time_t":1395651600,"offset":0,"price":14.826857015036163},{"time_t":1395133200,"offset":0,"price":14.805422394608069},{"time_t":1394787600,"offset":0,"price":14.773270463965929},{"time_t":1394787600,"offset":0,"price":14.751835843537837},{"time_t":1394614800,"offset":0,"price":14.708966602681649},{"time_t":1394701200,"offset":0,"price":14.708966602681649},{"time_t":1394701200,"offset":0,"price":14.751835843537837},{"time_t":1394701200,"offset":0,"price":14.773270463965929},{"time_t":1394701200,"offset":0,"price":14.816139704822117},{"time_t":1394787600,"offset":0,"price":14.869726255892349},{"time_t":1395046800,"offset":0,"price":14.90187818653449},{"time_t":1395046800,"offset":0,"price":14.93403011717663},{"time_t":1395133200,"offset":0,"price":14.976899358032815},{"time_t":1395219600,"offset":0,"price":15.041203219317097},{"time_t":1395306000,"offset":0,"price":15.084072460173282},{"time_t":1395306000,"offset":0,"price":15.105507080601376},{"time_t":1395392400,"offset":0,"price":15.15909363167161},{"time_t":1395392400,"offset":0,"price":15.19124556231375},{"time_t":1395392400,"offset":0,"price":15.212680182741842},{"time_t":1395651600,"offset":0,"price":15.22339749295589},{"time_t":1395738000,"offset":0,"price":15.244832113383982},{"time_t":1395824400,"offset":0,"price":15.244832113383982},{"time_t":1395997200,"offset":0,"price":15.244832113383982},{"time_t":1396342800,"offset":0,"price":15.244832113383982},{"time_t":1396515600,"offset":0,"price":15.234114803169934},{"time_t":1396602000,"offset":0,"price":15.22339749295589},{"time_t":1396861200,"offset":0,"price":15.19124556231375},{"time_t":1396947600,"offset":0,"price":15.12694170102947},{"time_t":1397034000,"offset":0,"price":15.105507080601376},{"time_t":1397120400,"offset":0,"price":15.073355149959236},{"time_t":1397206800,"offset":0,"price":15.051920529531142},{"time_t":1397466000,"offset":0,"price":15.03048590910305}],"zorder":-5,"ownerSource":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"},{"type":"LineToolBrush","id":"b220bd31-235e-472c-a7f4-2cfa9f3fa3b6","state":{"clonable":true,"linecolor":"#353535","linewidth":2,"linestyle":0,"smooth":5,"fillBackground":false,"backgroundColor":"#153899","transparency":50,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1395738000,"offset":0,"price":15.309135974668262},{"time_t":1395738000,"offset":0,"price":15.373439835952542},{"time_t":1395824400,"offset":0,"price":15.38415714616659},{"time_t":1395910800,"offset":0,"price":15.38415714616659},{"time_t":1395824400,"offset":0,"price":15.427026387022774},{"time_t":1395738000,"offset":0,"price":15.437743697236822},{"time_t":1395651600,"offset":0,"price":15.448461007450868},{"time_t":1395219600,"offset":0,"price":15.448461007450868},{"time_t":1395306000,"offset":0,"price":15.459178317664914},{"time_t":1395392400,"offset":0,"price":15.459178317664914},{"time_t":1395738000,"offset":0,"price":15.448461007450868},{"time_t":1395824400,"offset":0,"price":15.427026387022774},{"time_t":1395910800,"offset":0,"price":15.405591766594682},{"time_t":1395997200,"offset":0,"price":15.38415714616659},{"time_t":1395997200,"offset":0,"price":15.362722525738494},{"time_t":1396256400,"offset":0,"price":15.341287905310402},{"time_t":1396342800,"offset":0,"price":15.341287905310402},{"time_t":1396429200,"offset":0,"price":15.330570595096354},{"time_t":1396515600,"offset":0,"price":15.309135974668262},{"time_t":1396602000,"offset":0,"price":15.28770135424017},{"time_t":1396861200,"offset":0,"price":15.276984044026122},{"time_t":1396947600,"offset":0,"price":15.266266733812076},{"time_t":1397034000,"offset":0,"price":15.244832113383982},{"time_t":1397206800,"offset":0,"price":15.212680182741842},{"time_t":1397466000,"offset":0,"price":15.212680182741842},{"time_t":1397552400,"offset":0,"price":15.212680182741842},{"time_t":1397638800,"offset":0,"price":15.212680182741842},{"time_t":1397725200,"offset":0,"price":15.212680182741842},{"time_t":1398070800,"offset":0,"price":15.212680182741842},{"time_t":1398243600,"offset":0,"price":15.22339749295589},{"time_t":1398330000,"offset":0,"price":15.234114803169934},{"time_t":1398675600,"offset":0,"price":15.234114803169934},{"time_t":1398762000,"offset":0,"price":15.25554942359803},{"time_t":1399021200,"offset":0,"price":15.276984044026122},{"time_t":1399280400,"offset":0,"price":15.28770135424017},{"time_t":1399366800,"offset":0,"price":15.298418664454214},{"time_t":1399626000,"offset":0,"price":15.330570595096354},{"time_t":1399971600,"offset":0,"price":15.352005215524448},{"time_t":1400058000,"offset":0,"price":15.362722525738494},{"time_t":1400230800,"offset":0,"price":15.373439835952542},{"time_t":1400490000,"offset":0,"price":15.394874456380634},{"time_t":1400662800,"offset":0,"price":15.405591766594682},{"time_t":1400749200,"offset":0,"price":15.416309076808728},{"time_t":1400835600,"offset":0,"price":15.416309076808728},{"time_t":1401354000,"offset":0,"price":15.448461007450868},{"time_t":1401786000,"offset":0,"price":15.480612938093008},{"time_t":1401958800,"offset":0,"price":15.502047558521102},{"time_t":1402045200,"offset":0,"price":15.523482178949195},{"time_t":1402390800,"offset":0,"price":15.56635141980538},{"time_t":1402563600,"offset":0,"price":15.587786040233475},{"time_t":1402909200,"offset":0,"price":15.609220660661569},{"time_t":1403082000,"offset":0,"price":15.630655281089663},{"time_t":1403168400,"offset":0,"price":15.662807211731801},{"time_t":1403600400,"offset":0,"price":15.694959142373941},{"time_t":1403859600,"offset":0,"price":15.727111073016081},{"time_t":1404205200,"offset":0,"price":15.737828383230127},{"time_t":1404723600,"offset":0,"price":15.780697624086315},{"time_t":1404982800,"offset":0,"price":15.791414934300361},{"time_t":1405501200,"offset":0,"price":15.834284175156547},{"time_t":1406106000,"offset":0,"price":15.877153416012735},{"time_t":1406278800,"offset":0,"price":15.909305346654874},{"time_t":1406710800,"offset":0,"price":15.930739967082967},{"time_t":1407142800,"offset":0,"price":15.962891897725108},{"time_t":1407747600,"offset":0,"price":15.9843265181532},{"time_t":1408006800,"offset":0,"price":15.995043828367248},{"time_t":1408525200,"offset":0,"price":16.005761138581292},{"time_t":1408957200,"offset":0,"price":16.005761138581292},{"time_t":1409302800,"offset":0,"price":16.027195759009388},{"time_t":1409907600,"offset":0,"price":16.027195759009388},{"time_t":1410426000,"offset":0,"price":16.027195759009388},{"time_t":1410858000,"offset":2,"price":16.005761138581292},{"time_t":1410858000,"offset":5,"price":16.005761138581292},{"time_t":1410858000,"offset":9,"price":15.995043828367248},{"time_t":1410858000,"offset":13,"price":15.962891897725108},{"time_t":1410858000,"offset":15,"price":15.941457277297014},{"time_t":1410858000,"offset":16,"price":15.92002265686892},{"time_t":1410858000,"offset":19,"price":15.88787072622678},{"time_t":1410858000,"offset":22,"price":15.866436105798687},{"time_t":1410858000,"offset":22,"price":15.845001485370595},{"time_t":1410858000,"offset":23,"price":15.834284175156547},{"time_t":1410858000,"offset":25,"price":15.812849554728455},{"time_t":1410858000,"offset":26,"price":15.812849554728455},{"time_t":1410858000,"offset":26,"price":15.791414934300361},{"time_t":1410858000,"offset":27,"price":15.791414934300361},{"time_t":1410858000,"offset":28,"price":15.769980313872267},{"time_t":1410858000,"offset":28,"price":15.737828383230127},{"time_t":1410858000,"offset":28,"price":15.716393762802035},{"time_t":1410858000,"offset":28,"price":15.694959142373941},{"time_t":1410858000,"offset":28,"price":15.673524521945847}],"zorder":-6,"ownerSource":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"},{"type":"LineToolBrush","id":"6eabf797-a01d-462d-aa3f-06b602790f6d","state":{"clonable":true,"linecolor":"#353535","linewidth":2,"linestyle":0,"smooth":5,"fillBackground":false,"backgroundColor":"#153899","transparency":50,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1410858000,"offset":27,"price":15.673524521945847},{"time_t":1410858000,"offset":23,"price":15.577068730019427},{"time_t":1410858000,"offset":20,"price":15.544916799377287},{"time_t":1410858000,"offset":15,"price":15.512764868735148},{"time_t":1410858000,"offset":12,"price":15.480612938093008},{"time_t":1410858000,"offset":9,"price":15.469895627878962},{"time_t":1410858000,"offset":7,"price":15.448461007450868},{"time_t":1410858000,"offset":4,"price":15.427026387022774},{"time_t":1410858000,"offset":1,"price":15.416309076808728},{"time_t":1410512400,"offset":0,"price":15.416309076808728},{"time_t":1410253200,"offset":0,"price":15.405591766594682},{"time_t":1409734800,"offset":0,"price":15.394874456380634},{"time_t":1409216400,"offset":0,"price":15.38415714616659},{"time_t":1408611600,"offset":0,"price":15.38415714616659},{"time_t":1408352400,"offset":0,"price":15.38415714616659},{"time_t":1407834000,"offset":0,"price":15.373439835952542},{"time_t":1407402000,"offset":0,"price":15.373439835952542},{"time_t":1407142800,"offset":0,"price":15.373439835952542},{"time_t":1406797200,"offset":0,"price":15.373439835952542},{"time_t":1406624400,"offset":0,"price":15.373439835952542},{"time_t":1406538000,"offset":0,"price":15.373439835952542},{"time_t":1406278800,"offset":0,"price":15.373439835952542}],"zorder":-7,"ownerSource":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"},{"type":"LineToolBrush","id":"234fd494-f46d-42bc-901c-1561ee02e909","state":{"clonable":true,"linecolor":"#353535","linewidth":2,"linestyle":0,"smooth":5,"fillBackground":false,"backgroundColor":"#153899","transparency":50,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1410858000,"offset":13,"price":15.727111073016081},{"time_t":1410858000,"offset":15,"price":15.662807211731801},{"time_t":1410858000,"offset":15,"price":15.641372591303707},{"time_t":1410858000,"offset":16,"price":15.641372591303707},{"time_t":1410858000,"offset":16,"price":15.673524521945847},{"time_t":1410858000,"offset":17,"price":15.737828383230127},{"time_t":1410858000,"offset":17,"price":15.769980313872267},{"time_t":1410858000,"offset":17,"price":15.812849554728455},{"time_t":1410858000,"offset":16,"price":15.834284175156547},{"time_t":1410858000,"offset":15,"price":15.855718795584641},{"time_t":1410858000,"offset":14,"price":15.855718795584641},{"time_t":1410858000,"offset":13,"price":15.845001485370595},{"time_t":1410858000,"offset":13,"price":15.791414934300361},{"time_t":1410858000,"offset":13,"price":15.748545693444175},{"time_t":1410858000,"offset":13,"price":15.716393762802035},{"time_t":1410858000,"offset":14,"price":15.684241832159895}],"zorder":-8,"ownerSource":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"},{"type":"LineToolBrush","id":"2e3946a5-f259-4e85-b0c7-55989c2e095b","state":{"clonable":true,"linecolor":"#353535","linewidth":2,"linestyle":0,"smooth":5,"fillBackground":false,"backgroundColor":"#153899","transparency":50,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1410858000,"offset":1,"price":14.730401223109743},{"time_t":1409907600,"offset":0,"price":14.64466274139737},{"time_t":1408093200,"offset":0,"price":14.64466274139737},{"time_t":1407402000,"offset":0,"price":14.666097361825463},{"time_t":1406710800,"offset":0,"price":14.741118533323789},{"time_t":1405933200,"offset":0,"price":14.783987774179977},{"time_t":1405501200,"offset":0,"price":14.794705084394023},{"time_t":1405414800,"offset":0,"price":14.794705084394023}],"zorder":-9,"ownerSource":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"},{"type":"LineToolBrush","id":"de4477a1-7671-4eb2-9bf0-5d6009c0981d","state":{"clonable":true,"linecolor":"#353535","linewidth":2,"linestyle":0,"smooth":5,"fillBackground":false,"backgroundColor":"#153899","transparency":50,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1410858000,"offset":0,"price":14.58035888011309},{"time_t":1409043600,"offset":0,"price":14.48390308818667},{"time_t":1408093200,"offset":0,"price":14.45175115754453},{"time_t":1407315600,"offset":0,"price":14.462468467758576},{"time_t":1406624400,"offset":0,"price":14.505337708614764},{"time_t":1406019600,"offset":0,"price":14.526772329042856},{"time_t":1405414800,"offset":0,"price":14.58035888011309},{"time_t":1404723600,"offset":0,"price":14.708966602681649},{"time_t":1403686800,"offset":0,"price":14.826857015036163},{"time_t":1403082000,"offset":0,"price":14.880443566106397},{"time_t":1402995600,"offset":0,"price":14.891160876320443}],"zorder":-10,"ownerSource":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"},{"type":"LineToolBrush","id":"28341f8b-f15d-4d3c-a6b8-38774ccac3b4","state":{"clonable":true,"linecolor":"#353535","linewidth":2,"linestyle":0,"smooth":5,"fillBackground":false,"backgroundColor":"#153899","transparency":50,"frozen":false,"visible":true,"symbol":"NasdaqNM:AAPL","symbolInfo":{"listed_exchange":{},"short_name":"AAPL"},"interval":"D"},"points":[{"time_t":1410858000,"offset":0,"price":14.90187818653449},{"time_t":1409734800,"offset":0,"price":14.848291635464257},{"time_t":1409216400,"offset":0,"price":14.848291635464257},{"time_t":1408698000,"offset":0,"price":14.848291635464257},{"time_t":1408352400,"offset":0,"price":14.848291635464257},{"time_t":1407920400,"offset":0,"price":14.869726255892349},{"time_t":1407747600,"offset":0,"price":14.869726255892349},{"time_t":1407488400,"offset":0,"price":14.880443566106397},{"time_t":1407402000,"offset":0,"price":14.880443566106397},{"time_t":1407315600,"offset":0,"price":14.891160876320443}],"zorder":-11,"ownerSource":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"}],"leftAxisState":{"m_priceRange":{"m_minValue":-0.5,"m_maxValue":0.5},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":724,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"leftAxisSources":[],"rightAxisState":{"m_priceRange":{"m_minValue":10.745705285527201,"m_maxValue":17.718387310785946},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":724,"m_topMargin":0.05,"m_bottomMargin":0.05,"m_showSymbolLabels":false},"rightAxisSources":["a53ffe99-d8dd-44e5-9dd2-0ad4712018dd","00dfe526-bc98-447f-af9a-6c1b020ab97c","67661ca9-874f-46fe-bf04-f9a8a0de28c2","2a3a1752-1ccc-44df-ac81-7c0ab08e9b7f","b220bd31-235e-472c-a7f4-2cfa9f3fa3b6","6eabf797-a01d-462d-aa3f-06b602790f6d","234fd494-f46d-42bc-901c-1561ee02e909","2e3946a5-f259-4e85-b0c7-55989c2e095b","de4477a1-7671-4eb2-9bf0-5d6009c0981d","28341f8b-f15d-4d3c-a6b8-38774ccac3b4"],"overlayPriceScales":{"49e81c50-29a7-412c-af84-29ffaa9a2d0b":{"m_priceRange":{"m_minValue":0,"m_maxValue":54283500},"m_isAutoScale":true,"m_isPercentage":false,"m_isLog":false,"m_height":724,"m_topMargin":0.75,"m_bottomMargin":0,"m_showSymbolLabels":false}},"stretchFactor":2000,"mainSourceId":"a53ffe99-d8dd-44e5-9dd2-0ad4712018dd"}],"timeScale":{"m_barSpacing":6,"m_rightOffset":54},"chartProperties":{"paneProperties":{"background":"#ffffff","gridProperties":{"color":"#E6E6E6","style":0},"crossHairProperties":{"color":"#B7B7B7","style":2,"transparency":0,"width":1},"topMargin":5,"bottomMargin":5,"leftAxisProperties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false},"rightAxisProperties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false},"overlayPropreties":{"autoScale":true,"autoScaleDisabled":false,"percentage":false,"percentageDisabled":false,"log":false,"logDisabled":false,"showSymbolLabels":false}},"scalesProperties":{"showLeftScale":false,"showRightScale":true,"backgroundColor":"#ffffff","lineColor":"#555","textColor":"#555","scaleSeriesOnly":false}},"version":2,"timezone":"UTC"}]};

            function getParameterByName(name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                        results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            TradingView.onready(function()
			{
                var udf_datafeed = new Datafeeds.UDFCompatibleDatafeed("https://demo_feed.tradingview.com");

				var widget = window.tvWidget = new TradingView.widget({
					// debug: true, // uncomment this line to see Library errors and warnings in the console
					fullscreen: true,
					symbol: 'USDT',
					interval: 'D',
					toolbar_bg: '#f4f7f9',
					container_id: "tv_chart_container",
					//	BEWARE: no trailing slash is expected in feed URL
					datafeed: udf_datafeed,
					library_path: "charting_library/",
                    locale: getParameterByName('lang') || "zh",
					//	Regression Trend-related functionality is not implemented yet, so it's hidden for a while
					drawings_access: { type: 'black', tools: [ { name: "Regression Trend" } ] },
					disabled_features: ["save_chart_properties_to_local_storage", "volume_force_overlay"],
					enabled_features: ["move_logo_to_main_pane", "study_templates"],
					overrides: {
						"mainSeriesProperties.style": 0,
						"symbolWatermarkProperties.color" : "#944",
						"volumePaneSize": "tiny"
					},
					studies_overrides: {
						"volume.volume.color.0": "#00FFFF",
						"volume.volume.color.1": "#0000FF",
						"volume.volume.transparency": 70,
						"volume.volume ma.color": "#FF0000",
						"volume.volume ma.transparency": 30,
						"volume.volume ma.linewidth": 5,
						"volume.show ma": true,
						"bollinger bands.median.color": "#33FF88",
						"bollinger bands.upper.linewidth": 7
					},
					debug: true,
					time_frames: [
						{ text: "50y", resolution: "6M" },
						{ text: "3y", resolution: "W" },
						{ text: "8m", resolution: "D" },
						{ text: "2m", resolution: "D" },
						{ text: "1m", resolution: "60" },
						{ text: "1w", resolution: "30" },
						{ text: "7d", resolution: "30" },
						{ text: "5d", resolution: "10" },
						{ text: "3d", resolution: "10" },
						{ text: "2d", resolution: "5" },
						{ text: "1d", resolution: "5" }
					],
					charts_storage_url: 'http://saveload.tradingview.com',
                    charts_storage_api_version: "1.1",
					client_id: 'tradingview.com',
					user_id: 'public_user',
					favorites: {
						intervals: ["1D", "3D", "3W", "W", "M"],
						chartTypes: ["Area", "Line"]
					}
				});

				var savedWidgetContent = null;
				var savedTemplate = null;

				widget.onChartReady(function() {

					widget.onContextMenu(function(time, price) {
						return [{
							position: "top",
							text: new Date(time * 1000).toUTCString() + "; " + price.toFixed(4),
							click: function() {
								console.log("Custom context menu item clicked");
							}
						},
                        { text: "-", position: "top" },
                        { text: "-Objects Tree..." }
                        ];
					});

					widget.createButton()
						.attr('title', "Save chart")
						.on('click', function (e) {
							widget.save(function(data) {
								savedWidgetContent = data;
								alert('Saved');
							})
						 })
						.append('<span>save</span>');

					widget.createButton()
						.attr('title', "Load chart")
						.on('click', function (e) {
							if (savedWidgetContent) {
								widget.load(savedWidgetContent);
							}
						 })
						.append('<span>load</span>');

					widget.createButton()
						.attr('title', "Load chart")
						.on('click', function (e) {
							widget.load(referenceChart);
						 })
						.append('<span>load reference</span>');

					widget.createButton()
						.attr('title', "Load chart")
						.on('click', function (e) {
							widget.load(referenceChart2);
						 })
						.append('<span>load reference 2</span>');



					widget.createButton()
						.on('click', function (e) {
							savedTemplate = widget.activeChart().createStudyTemplate({saveInterval: false});
						 })
						.append('<span>save template (-i)</span>');

					widget.createButton()
						.on('click', function (e) {
							savedTemplate = widget.activeChart().createStudyTemplate({saveInterval: true});
						 })
						.append('<span>save template (+i)</span>');

					widget.createButton()
						.on('click', function (e) {
							if (savedTemplate) {
								widget.chart().applyStudyTemplate(savedTemplate);
							}
						 })
						.append('<span>apply template</span>');



					widget.createButton()
						.on('click', function (e) {
							widget.setSymbol("F", '2D');
						 })
						.append('<span>F, 2D</span>');


					widget.createButton()
						.on('click', function (e) {
							widget.chart().clearMarks();
						 })
						.append('<span>Clear marks</span>');

					widget.createButton()
						.attr('title', "Add item")
						.on('click', function (e) {
							widget.chart().createStudy("Bollinger Bands", false, false, [
									10 + parseInt(Math.random() * 10),
									3 + parseInt(Math.random() * 3)
								], function (guid) {
									console.log(guid);
								}
							);
						 })
						.append('<span>+BB</span>');

					widget.createButton({align: "right"})
						.attr('title', "Add item")
						.on('click', function (e) {
							widget.chart().createStudy("Moving Average", false, false, [
									10 + parseInt(Math.random() * 10)
								], function (guid) {
									console.log(guid);
								}
							);
						 })
						.append('<span>+MA</span>');

						widget.createButton({align: "right"})
						.attr('title', "Add item")
						.on('click', function (e) {
							widget.chart().createStudy("Moving Average", false, false, [
									10 + parseInt(Math.random() * 10)
								], function (guid) {
									console.log(guid);
								},
								{"plot.color.0" : "#FF0000"}
							);
						 })
						.append('<span>+MA++</span>');

					widget.createButton({align: "right"})
						.attr('title', "Add item")
						.on('click', function (e) {
							widget.chart().createStudy('Stochastic', false, false, [12, 3, 3], null, {"%d.color" : "#000000", "%k.color" : "#00FF00"});
						 })
						.append('<span>+Stoch</span>');


					widget.createButton()
						.on('click', function (e) {
							widget.chart().createOrderLine();
						 })
						.append('<span>new order</span>');

					widget.createButton()
						.on('click', function (e) {
							widget.chart().removeAllStudies();
						 })
						.append('<span>rm all studies</span>');

					widget.createButton()
						.on('click', function (e) {
							widget.chart().removeAllShapes();
						 })
						.append('<span>rm all shapes</span>');

					widget.onGrayedObjectClicked(function(x) {
						alert("You are not permitted to use " + x.name + "(" + x.type + ")");
					});

                    widget.onShortcut("alt+s", function() {
                        widget.chart().executeActionById("symbolSearch");
                    });

					widget.createButton()
						.on('click', function (e) {
							widget.chart().setVisibleRange({
								from: Date.UTC(2012, 2, 3) / 1000,
								to: Date.UTC(2013, 3, 3) / 1000
							});
						 })
						.append('<span>set view</span>');

					widget.createButton()
						.on('click', function (e) {
							console.log(widget.activeChart().getVisibleRange());
						})
						.append('<span>get range</span>');

					var position = widget.chart().createPositionLine()
						.onReverse(function(text) {
							console.log("Position reverse event");
						})
						.onClose(function(text) {
							console.log("Position close event");
						})
						.setText("PROFIT: 71.1 (3.31%)")
						.setQuantity("8.235")
						.setLineLength(3);
					position.setPrice(position.getPrice() - 2);

					var order = widget.chart().createOrderLine()
						.onMove(function() {
							console.log("Order moved event");
						})
						.onCancel(function(text) {
							console.log("Order cancel event");
						})
						.setText("STOP: 73.5 (5,64%)")
						.setLineLength(3)
						.setQuantity("2");
					order.setPrice(order.getPrice() - 2.5);

					widget.chart().createExecutionShape()
						.setText("@1,320.75 Limit Buy 1")
						.setTextColor("rgba(255,0,0,0.5)")
						.setArrowSpacing(25)
						.setArrowHeight(25)
						.setArrowColor("#F00")
						.setTime(new Date("4 Dec 2014 00:00:00 GMT+0").valueOf() / 1000)
						.setPrice(15.5);

                    var fourMonthAgo = Math.floor(new Date().valueOf() / 1000 - 4 * 30 * 24 * 60 * 60);
                    var today = Math.floor(new Date().valueOf() / 1000);

                    // draw some simple technical analysis figures using drawings to show how it works
                    getMinAndMaxPrice(udf_datafeed, fourMonthAgo, today,
                        function(minPrice, maxPrice, minPriceTime, maxPriceTime) {
                            widget.chart().createMultipointShape(
                                    [{time:fourMonthAgo, price: minPrice}, {time:today, price: minPrice}],
                                    {
                                        shape: "trend_line",
                                        lock: true,
                                        disableSelection: true,
                                        disableSave: true,
										disableUndo: true,
                                        overrides: {
                                            showLabel: true,
                                            fontSize: 30,
                                            linewidth: 2,
                                            linecolor: "#00FF00"
                                        }
                                    }
                            );
                            widget.chart().createShape({time: Math.floor((fourMonthAgo + today) / 2), price: minPrice},
                                    {
                                        shape: "text",
                                        lock: true,
                                        disableSelection: true,
                                        disableSave: true,
										disableUndo: true,
                                        text: "3 month low at " + minPrice,
                                        overrides: { color: "#00FF00" }
                                    });
                            widget.chart().createMultipointShape(
                                    [{time:fourMonthAgo, price: maxPrice}, {time:today, price: maxPrice}],
                                    {
                                        shape: "trend_line",
                                        lock: true,
                                        disableSelection: true,
                                        disableSave: true,
										disableUndo: true,
                                        overrides: {
                                            showLabel: true,
                                            fontSize: 30,
                                            linewidth: 2,
                                            linecolor: "#FF0000"
                                        }
                                    }
                            );
                            widget.chart().createShape({time: Math.floor((fourMonthAgo + today) / 2), price: maxPrice},
                                    {
                                        shape: "text",
                                        lock: true,
                                        disableSelection: true,
                                        disableSave: true,
										disableUndo: true,
                                        text: "3 month high at " + maxPrice,
                                        overrides: { color: "#FF0000" }
                                    });
                            widget.chart().createMultipointShape(
                                    [{time:maxPriceTime, price: maxPrice}, {time:minPriceTime, price: minPrice}],
                                    {
                                        shape: "trend_line",
                                        lock: true,
                                        disableSelection: true,
                                        disableSave: true,
										disableUndo: true,
                                        overrides: {
                                            showLabel: true,
                                            fontSize: 30,
                                            linewidth: 2
                                        }
                                    }
                            );
                            widget.chart().createMultipointShape(
                                    [{time: Math.floor((maxPriceTime + minPriceTime) / 2), price: (maxPrice + minPrice) / 2},
                                        {time: Math.floor((maxPriceTime + minPriceTime) / 2) + 5 * 24 * 60 * 60, price: (maxPrice + minPrice) / 2 * 1.1}],
                                    {
                                        shape: "callout",
                                        lock: true,
                                        disableSelection: true,
                                        disableSave: true,
										disableUndo: true,
                                        text: "Trend",
                                        overrides: {
                                            color: "#000000",
                                            borderColor: "#FFFFFF",
                                            transparency: "100",
                                            linewidth: 1
                                        }
                                    }
                            );
                        } // end of getMinAndMaxPrice callback
                    ); // end of getMinAndMaxPrice
				}); // end of widget.onChartReady
			}); // end of TradingView.onready

            function getMinAndMaxPrice(udf_datafeed, time1, time2, callback) {
                var minPrice = 99999, maxPrice = 0;
                var	minPriceTime, maxPriceTime;
                udf_datafeed.resolveSymbol("AAPL", function(symbolInfo) {
                            udf_datafeed.getBars(symbolInfo, "D", time1, time2, function(bars) {
                                        bars.forEach(function(bar) {
                                            if (bar.time / 1000 >= time1 && bar.time / 1000 <= time2) {
                                                if (bar.high > maxPrice) {
                                                    maxPrice = bar.high;
                                                    maxPriceTime = bar.time / 1000;
                                                }
                                                if (bar.low < minPrice) {
                                                    minPrice = bar.low;
                                                    minPriceTime = bar.time / 1000;
                                                }
                                            }
                                        });
                                        callback(minPrice, maxPrice, minPriceTime, maxPriceTime);
                                    },
                                    function(err) {
                                    });
                        },
                        function(err) {
                        });
            }

		</script>

	</head>

	<body style="margin:0;">
		<div id="tv_chart_container"></div>
	</body>

</html>
