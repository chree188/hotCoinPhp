
<div class="col-xs-2 financial-sidebar">
    <h2 class="financial-sidebar-tetil">{{__('finance.account-center')}}</h2>
    <ul class="financial-sidebar-nav">
    <!--                            <li class="financial-sidebar-bar">
                                <a href="{{route('commission')}}">{{__('finance.account-recommend')}}</a>
                            </li>-->
        <li class="financial-sidebar-bar">
            <a href="{{route('coinDeposit')}}" @if('/'.Request::path()==route('coinDeposit')) class="active" @endif>{{__('finance.account-deposit')}}</a>
        </li>
        <li class="financial-sidebar-bar">
            <a href="{{route('coinWithdraw')}}" @if('/'.Request::path()==route('coinWithdraw')) class="active" @endif >{{__('finance.account-withdraw')}}</a>
        </li>
        <li class="financial-sidebar-bar">
            <a href="{{route('asset')}}" @if('/'.Request::path()==route('asset')) class="active" @endif>{{__('finance.account-asset')}}</a>
        </li>
        <li class="financial-sidebar-bar">
            <a href="{{route('record')}}" @if('/'.Request::path()==route('record')) class="active" @endif >{{__('finance.account-record')}}</a>
        </li>
        <li class="financial-sidebar-bar">
            <a href="{{route('accountcoin')}}" @if('/'.Request::path()==route('accountcoin')) class="active" @endif>{{__('finance.account-account')}}</a>
        </li>
        <li class="financial-sidebar-bar">
            <a href="{{route('finances')}}" @if('/'.Request::path()==route('finances')) class="active" @endif>{{__('finance.account-income')}}</a>
        </li>
    </ul>
</div>

<script>
    $(".financial-sidebar-nav").find('.active').append('<span style="position:absolute ;right:12px;">></span>');
</script>
