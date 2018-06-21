
<div class="col-xs-2 financial-sidebar">
    <h2 class="financial-sidebar-tetil">{{__('user.security-center')}}</h2>
    <ul class="financial-sidebar-nav">
        <li class="financial-sidebar-bar">
            <a href="{{ route('security') }}" @if('/'.Request::path()==route('security')) class="active" @endif>{{__('user.security-setting')}}</a>
        </li>
        <li class="financial-sidebar-bar">
            <a href="{{ route('loginlog') }}" @if('/'.Request::path()==route('loginlog')) class="active" @endif >{{__('user.security-log')}}</a>
        </li>
        <li class="financial-sidebar-bar">
            <a href="{{ route('active')}}" @if('/'.Request::path()==route('active'))) class="active" @endif>{{__('user.security-code')}}</a>
        </li>
    </ul>
</div>

<script>
    $(".financial-sidebar-nav").find('.active').append('<span style="position:absolute ;right:12px;">></span>');
</script>
