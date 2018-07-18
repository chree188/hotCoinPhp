@extends('layouts/app')
@section('content')
        <div class="container page-body">
            <div class="row order">
                <div class="col-xs-12">
                    <ol class="breadcrumb order-breadcrumb">
                        <li>
                            <a href="{{route('trade')}}">{{__('market.markets')}}</a>
                        </li>
                        <li class="active">{{__('market.order-bs')}}</li>
                    </ol>
                </div>
                <div class="col-xs-12 order-data">

<!------------------------------ 买盘 ------------------------->

                    <div class="col-xs-6 order-box">
                        <h2 class="order-tetil">{{__('market.order-buy')}}</h2>
                        <dl class="quotes-transaction-tabel-body order-list" id="buy-data">

                        </dl>
                    </div>


<!----------------------- 卖盘 ------------------------>

                    <div class="col-xs-6 order-box">
                        <h2 class="order-tetil">{{__('market.order-sell')}}</h2>
                        <dl class="quotes-transaction-tabel-body order-list" id="sell-data">

                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="buy-symbol" value="{{strtoupper($symbols[1])}}">
        <input type="hidden" id="sell-symbol" value="{{strtoupper($symbols[0])}}">
        <input type="hidden" id="symbol" value="{{$symbol}}">
        <input type="hidden" id="isplat" value="{{$plat}}">
 @endsection
@section('js')
    <script src="{{asset('js/plugin/pako.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/mqttws31.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/config.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/crypto-js/crypto-js.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/markt/orderMqtt.js')}}"></script>
@endsection