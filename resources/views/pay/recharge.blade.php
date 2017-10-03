@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/pay.css') }}" type="text/css" rel="stylesheet" />
        <div class="TA">
            @include('pay.nav')
            <div class="clear" style="height: 10px;"></div>
            {!! $breadcrumb or '' !!}
            <div class="clear" style="height: 30px;"></div>

            <div class=" fleft">
                <form  action="{{route('pay.recharge_store')}}" method="post">
                    <div class="xiangya fleft">
                        <div style="height: 100px;border-bottom: 2px #e2e1e1 solid;font-size: 25px;line-height: 100px;text-align: center;">
                            充值象牙币
                        </div>
                        <div style="height: 250px;border-bottom: 2px #e2e1e1 solid;font-size: 15px;text-align: left;line-height: 40px;padding-left: 20px;">
                            <p>●象牙币可用兑换各种服务</p>
                            <p>●1RMB=1象牙币</p>
                            <p style="margin-top: 100px;"><input type="checkbox" />同意 <a href="{{route('about.show',['id' => 12])}}" target="_blank"><span style="font-size: 14px;color: #34CED4"> 象牙币服务条款</span></a></p>
                        </div>
                    </div>
                    <div class="xiangya_bank fleft">
                            <div class="xiangya_bank_form">
                                <p>充值数量：<input type="text" name="money" id="money" style="width: 60px;margin-right: 10px;" />象牙币<span style="font-size: 12px;">（充值1RMB可以获得1象牙币）</span></p>
                            </div>
                            <p>
                                <ul class="activity_pay_main_way activity_pay_main_way_bank" >
                                    <li class="active">支付宝</li>
                                    <li>微信支付</li>
                                </ul>
                                <input name="pay_id" type="radio" value="1" checked style="display:none;">
	                            <input name="pay_id" type="radio" value="2" style="display:none;">
                            </p>
                            <div class="clear" id="pay_way" style="padding-top: 50px;">
                                <p class="clear">
                                    <input type="submit" id="submit_pay" value="支付" style="margin-left: 250px;margin-top: 50px;" />
                                </p>
                            </div>
                    </form>
            </div>

      </div>
      <script type="text/javascript">
          $(".activity_pay_main_way li").click(function(){
              index = $(this).index();
              $(this).addClass('active');
              $(this).siblings().removeClass('active');
              $("input[name='pay_id']").eq(index).attr('checked',true);
          });
      </script>
@stop
