 @extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/sign.css') }}" type="text/css" rel="stylesheet" />
<style>table tr th{text-align:center}</style>

 <div class="clear"></div>

    <div class="TA">
        <div class="b_ja">
            <img src="{{asset('images/index/sign_logo.png')}}" style="margin-top: -10px" alt="" /><span style="color: #aaa;font-size: 16px;">每日签到</span>
        </div>
        <div class="clear"></div>

        <div class="sign_left fleft">
            <div class="sign_left_mood">
                <p>今日签到了吗？请选择您此刻的心情图片并写下今天最想说的话！</p>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/kaixin.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>开心</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/deyi.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>得意</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/gandong.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>感动</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/jingya.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>惊讶</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/jiong.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>囧</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/kelian.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>可怜</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/ku.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>流泪</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/se.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>色</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/shengqi.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>气到爆</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/wuyu.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>无语</dd>
                    </dl>
                </div>
                <div class="mood_info">
                    <dl>
                        <dd><img src="{{asset('images/index/mood/yanshen.jpg')}}" alt="" class="mood_img" /></dd>
                        <dd>给你个眼神</dd>
                    </dl>
                </div>
                <div class="begin_sign fleft">开始签到</div>

                <div class="clear" style="height: 30px;"></div>
                <p>
                    今天最想说的模式&nbsp;&nbsp;
                    <input type="radio" name="write" value="自己填写" />自己填写&nbsp;&nbsp;
                    <input type="radio" name="write" value="快速填写" />快速填写&nbsp;&nbsp;
                    <input type="radio" name="write" value="不想填写" />不想填写&nbsp;&nbsp;
                </p>
                <div style="height: 20px;"></div>
                <p>
                    我今天最想说&nbsp;&nbsp;
                    <input type="text" name="" value="" class="input_text" />
                </p>
            </div>
			<div class="clear" style="height:30px;"></div>
            <div class="sign_ranking" >
                <span style="font-size: 30px;">签到排行榜</span>
                <div style="height: 20px;"></div>
                <div class="sign_ranking_li">
                    <ul>
                        <li>按上次签到时间</li>
                        <li>
                            <select name="" id="" style="background: #DCFBDD; color: #3771C0">
                                <option value="">按天数</option>
                            </select>
                        </li>
                        <li>等级签到说明</li>
                    </ul>
                </div>
				<div class="clear"></div>
                <hr class="clear" style="border: 2px #aaa solid;width: 650px;margin-top:2px" />
                <table class="sign_ranking_table" style="width:650px;">
                    <tr >
                        <th>用户名</th>
                        <th>上次签到时间</th>
                        <th>月天数</th>
                        <th>总天数</th>
                        <th>目前等级</th>
                        <th>状态</th>
                    </tr>
                    <tr>
                        <td>你是谁</td>
                        <td>2016-12-22</td>
                        <td>23</td>
                        <td>123123</td>
                        <td>10</td>
                        <td>在线</td>
                    </tr>


                </table>
            </div>


        </div>

        <div class="sign_right fleft">
            <div class="sign_right_top5">
                <div class="sign_top5_list">
                   <p style="font-size: 20px;margin-bottom: 20px;">今日心情TOP5</p>
                    <p>
                        <span>开心</span>
                        <span class="fright">5人</span>
                    </p>
                    <p>
                        <span>难过</span>
                        <span class="fright">5人</span>
                    </p>
                    <p>
                        <span>得意</span>
                        <span class="fright">5人</span>
                    </p>
                    <p>
                        <span>开心</span>
                        <span class="fright">5人</span>
                    </p>
                    <p>
                        <span>大哭</span>
                        <span class="fright">5人</span>
                    </p>
                </div>

            </div>
            <div class="sign_right_sign">
                <div class="sign_top5_list">
                   <p style="font-size: 20px;margin-bottom: 20px;">签到统计</p>
                    <p>
                        <span>今日已签到</span>
                        <span class="fright">5人</span>
                    </p>
                    <p>
                        <span>昨日共签到</span>
                        <span class="fright">5人</span>
                    </p>
                    <p>
                        <span>历史最高数</span>
                        <span class="fright">5人</span>
                    </p>
                </div>
            </div>
        </div>

       </div>
    </div>
	@stop
