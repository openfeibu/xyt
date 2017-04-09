@extends('layouts.common')

@section('content')
<style>
        table{border-bottom: 1px #F2C4D7 solid;}
        table td{border-top: 1px #F2C4D7 solid;border-left: 1px #F2C4D7 solid;}
        table th{border-left: 1px #F2C4D7 solid;}
        table tr{height: 30px;}
        .tab_tr{height: 160px;line-height: 25px;}
    </style>

    <div class="TA">
        <div class="b_ja">
            {!! $breadcrumb or '' !!}
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                @include('users.setting_nav')
                <div style="height: 750px;width: 946px;border: 1px #e2e1e1 solid;border-top: 0px; padding: 25px">
                    <div style="color: #787878;height: 550px;width: 800px;padding-top: 25px;margin: 0 auto;">
                        我当前的星级为：
                        @for ($i = 0; $i < $star['star']; $i++)
						    {!!handerStar(1)!!}
						@endfor
						@for ($i = 0; $i < 6 - $star['star']; $i++)
						    {!!handerStar(0)!!}
						@endfor
                        
                        <p style="margin-top: 5px;"></p>
                        <table style="border: 1px #F2C4D7 solid;width: 100%;text-align: center;">
                            <tr>
                                <th style="border-left: 0px;">认证项目</th>
                                <th>获取途径</th>
                                <th>我的状态</th>
                                <th>已获星级</th>
                                <th>最多可获</th>
                            </tr>
                            <tr>
                                <td style="border-left: 0px;">实名认证</td>
                                <td><span style="color: red">通过本站实名认证</span></td>
                                <td>未通过认证&nbsp;>>&nbsp;<span style="color: red">立即认证</span></td>
                                <td>{!!handerStar($star['real_name_status'])!!}</td>
                                <td>{!!handerStar(1)!!}</td>
                            </tr>
                            <tr>
                                <td style="border-left: 0px;">学历认证</td>
                                <td><span style="color: red">通过本站学历认证</span></td>
                                <td>未通过认证&nbsp;>>&nbsp;<span style="color: red">立即认证</span></td>
                                <td>{!!handerStar($star['education_status'])!!}</td>
                                <td>{!!handerStar(1)!!}</td>
                            </tr>
                            <tr>
                                <td style="border-left: 0px;">手机认证</td>
                                <td><span style="color: red">通过本站手机认证</span></td>
                                <td>未通过认证&nbsp;>>&nbsp;<span style="color: red">立即认证</span></td>
                                <td>{!!handerStar($star['mobile_status'])!!}</td>
                                <td>{!!handerStar(1)!!}</td>
                            </tr>
                            <tr class="tab_tr">
                                <td style="border-left: 0px;">完善资料</td>
                                <td><span style="color: red">
                                    设置形象照（5%）<br />
                                    基本资料（35%）<br />
                                    择偶标准（30%）<br />
                                    个性资料（10%）<br />
                                    内心独自（10%）<br />
                                    幸福宣言（10%）
                                </span></td>
                                <td>
                                    设置形象照（{{$star['profiles']['avatar']['schedule']}}）<br />
                                    基本资料（{{$star['profiles']['basic']['schedule']}}）<br />
                                    择偶标准（{{$star['profiles']['standard']['schedule']}}）<br />
                                    个性资料（{{$star['profiles']['detail']['schedule']}}）<br />
                                    内心独自（{{$star['profiles']['dating']['schedule']}}）<br />
                                    幸福宣言（{{$star['profiles']['happy']['schedule']}}）
                                </td>
                                <td>{!!handerStar($star['profile_status'])!!}</td>
                                <td>{!!handerStar(1)!!}</td>
                            </tr>
                            <tr>
                                <td style="border-left: 0px;">魅力星级</td>
                                <td>个人主页访问量超过1000</td>
                                <td>当前访问人数：<span style="color: #0078B6">{{$user->view_count}}</span></td>
                                <td>{!!handerStar($star['charm_status'])!!}</td>
                                <td>{!!handerStar(1)!!}</td>
                            </tr>
                            <tr>
                                <td style="border-left: 0px;">推广星级</td>
                                <td>邀请好友注册数目超过10人</td>
                                <td>已邀请人数：<span  style="color: #000">{{$user->invite_count}}</span>&nbsp;>>&nbsp;<span style="color: red">立即邀请</span></td>
                                <td>{!!handerStar($star['invite_status'])!!}</td>
                                <td>{!!handerStar(1)!!}</td>
                            </tr>
                        </table>
                        <p style="margin-top: 20px;"></p>
                        <div style="line-height: 25px;">
                            <p>诚信星级指数体系说明：</p>
                            <p>本网站的诚信星级指数体系是以会员的诚信认证、资料完整度、受欢迎程度、活跃程度等多种因素，综合评定会员级别，设定6星级为最高星级。</p>
                            <p>1、进行身份实名认证（同时亦通过手机认证），可提升1星级，通过学历认证，可再提升1星级;</p>
                            <p>2、个人资料完整度100%，可提升1星级。包括：设置形象照（5%）基本资料（35%）择偶标准（30%）个性资料（10%）约会宝典（10%）幸福宣言（10%）;</p>
                            <p>3、因资料完整度、可信度较高、受关注和受欢迎程度较高等原因，个人主页访问量超过1000，可提升1个星级;</p>
                            <p>4、近30日内经常登录网站，登录次数累计超过30次，可提升1个星级;</p>
                            <p>5、通过QQ、MSN、Email等形式邀请好友注册人数超过10人，可提升1星级;</p>
                            <p>6、普通会员在低于5星级时只能与自己同星级或者低于自己星级的会员主动发消息;</p>
                            <p>7、普通会员诚信星级高于5星级后，可以与高于自己星级的用户发送消息，并且拥有即时聊天的功能;</p>
                            <p>8、提到星级，可获得更多的推荐及关注机会，成功率大大提高！</p>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

@stop
 <script type="text/javascript">
        function showimg() {
            var file = document.getElementById("cardpic").value;
            var fileName = getFileName(file);
             
            function getFileName(o){
                var pos=o.lastIndexOf("\\");
                 document.getElementById("img_name").src = "./images/"+o.substring(pos+1);
            }
        }
        function showimg2() {
            var file = document.getElementById("cardpic2").value;
            var fileName = getFileName(file);
             
            function getFileName(o){
                var pos=o.lastIndexOf("\\");
                 document.getElementById("img_name2").src = "./images/"+o.substring(pos+1);
            }
        }
  </script>
    
