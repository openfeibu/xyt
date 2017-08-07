<div class="reward" id="qq" style="width: 550px;height: 350px;">
    <div class="reward_top">
        <span class="fleft" style="margin-left: 20px;">
            购买道具
        </span>
        <span id="qq_close" class="fright send_title_close" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;" onclick="javascript:close_layer();">X</span>
    </div>

    <div class="email_left fleft">
        <img src="{{$card->img}}" alt="{{$card->name}}" />
    </div>
    <div class="email_right fleft" style="width:350px">
        <p>{{$card->name}}</p>
        <p>{{$card->desc}}</p>
        <p>增加经验：<font style="color: #51B837;">{{$card->experience}}</font></p>
        <p>道具单价：<font style="color: #51B837;">{{$card->coin}}</font>象牙币</p>
        <p>现有库存：<font style="color: #51B837;">{{$card->number}}</font>个</p>
        <p><input type="submit" name="" id="buy_card" value="购买" /></p>
        <input type="hidden" name="key" id="card_key" value="{{$card->key}}"/>
        <input type="hidden" name="to_user_id" id="to_user_id" value="{{$user_id}}"/>
     </div>
</div>
