host = 'post-cn-4590o3eqj0v.mqtt.aliyuncs.com';// 设置当前用户的接入点域名，接入点获取方法请参考接入准备章节文档，先在控制台创建实例
port = 80;//WebSocket 协议服务端口，如果是走 HTTPS，设置443端口
topic = 'HOTCOIN_WEB_GSET_TRADE';//需要操作的 Topic
useTLS = false;//是否走加密 HTTPS，如果走 HTTPS，设置为 true


if(window.document.location.host =='www.hotcoin.top' || window.document.location.host =='testtest.hotcoin.top:18081' ){
    accessKey= 'LTAI5YIotdwRXoNP';
    secretKey =  'nn6QURHbDVtCLnooPFfU9qetNbq5OP';
    topic = 'HOTCOIN_WEB_GSET_TRADE';
    gsettopic =  'HOTCOIN_WEB_GSET_TRADE';
    btctopic =  'HOTCOIN_WEB_BTC_TRADE';
    ethtopic =  'HOTCOIN_WEB_ETH_TRADE';
    topicDepthPrefix= 'HOTCOIN_WEB_MKTINFO/';
    topicRealTimePrefix= 'HOTCOIN_WEB_REAL_TIME_TRADE/';
    klinePrefix = 'HOTCOIN_WEB_KLINE';
}else{
    accessKey = 'LTAIzoYYkzbQkNX4';
    secretKey = '8a0C6XRa9vOdVuPjCkPXc8eyjtSSDS';
    topic = 'HOTCOIN_WEB_GSET_TRADE_TEST';
    gsettopic =  'HOTCOIN_WEB_GSET_TRAD_TEST';
    btctopic =  'HOTCOIN_WEB_BTC_TRADE_TEST';
    ethtopic =  'HOTCOIN_WEB_ETH_TRADE_TEST';
    topicDepthPrefix= 'HOTCOIN_WEB_MKTINFO_TEST/';
    topicRealTimePrefix= 'HOTCOIN_WEB_REAL_TIME_TRADE_TEST/';
    klinePrefix = 'HOTCOIN_WEB_KLINE_TEST';
}


cleansession = true;
groupId='GID_11';
path="";
currentTime =new Date().getTime();
onlyOne = Math.random();
clientId=groupId+'@@@'+onlyOne+currentTime;//GroupId@@@DeviceId，由控制台创建的 Group ID 和自己指定的 Device ID 组合构成
console.log(clientId);