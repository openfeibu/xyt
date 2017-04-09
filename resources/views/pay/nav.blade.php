<div class="open_vip">
    <font style="font-size: 35px;color: #51B837;font-family: 宋体" class="fleft">象牙塔支付</font>
    <ul class="open_vip_ul">
        <a href="{{route('pay.index')}}"><li  class="{!! Route::currentRouteName() == 'pay.index' ? 'bg_select' : '' !!}" >我的账户</li></a>
        <a href="{{route('pay.recharge')}}"><li class="{!! Route::currentRouteName() == 'pay.recharge' ? 'bg_select' : '' !!}">象牙币充值</li></a>
        <a href="{{route('pay.buy')}}"><li class="{!! Route::currentRouteName() == 'pay.buy' ? 'bg_select' : '' !!}">开通VIP</li></a>
    </ul>
</div>