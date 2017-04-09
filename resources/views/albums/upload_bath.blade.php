<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>象牙塔</title>
</head>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/album.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.8.3.min.js"></script>
<!--Luara js文件-->
<script src="js/jquery.luara.0.0.1.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<body>
<div class="all">
    <div class="head">
        <a href="index.html" class="logo"><img src="images/logo.jpg" width="370" height="100" alt="" title="" /></a>
        <ul class="heada">
            <li style="width:160px;"><span>欢迎您：</span><a href="#"><span><img src="images/img1.jpg" width="30" height="30" alt="" title="" /></span><span>christy1314</span></a></li>
            <li><a href="#">个人主页</a></li>
            <li><a href="#">退出登录</a></li>
        </ul>
    </div>
    <div class="nav">
        <ul>
            <li class="navb"><a href="index.html" class="nava">首页</a></li>
            <li class="navb"><a href="#">空间</a></li>
            <li class="navb"><a href="#">相册</a></li>
            <li class="navb"><a href="#">活动</a></li>
            <li class="navb"><a href="#">微博</a></li>
            <li class="navb"><a href="#">论坛</a></li>
            <li class="navb"><a href="a搜索.html">搜索</a></li>
            <li class="navb"><a href="#">关于我们</a></li>
            <li class="navc" ><a href="#"><span><img src="images/img2.jpg" width="28" height="26" alt="" /></span></a></li>
            <li class="navc"><a href="#"><span><img src="images/img3.jpg" width="28" height="26" alt="" /></span></a></li>
        </ul>
    </div>
    <div class="clear"></div>

    <div class="TA">
        <div class="b_ja">
            <img src="./images/photologo.png" alt="" /><span style="color: #aaa;font-size: 16px;">相册</span>
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
                        <li>普通上传</li>
                        <li class="select" style="color: #146500;">批量上传</li>
                        <li>返回我的相册</li>
                    </ul>
                </div>
                <div class="batch_upload">
                    <div style="height:30px"></div>
                    <p style="margin-left:70px;margin-bottom:10px;">
                      <span class="batch_upload_span1">浏览</span>
                      <span class="batch_upload_span2">上传到：
                        <select name="" value="">
                            <option>请选择相册</option>
                            <option>相册1</option>
                        </select>
                      </span>
                      <span class="batch_upload_span3">删除</span>
                    </p>
                    <div class="batch_main">
                        <div class="batch_main_top">
                            <table>
                                <tr style="background: #F5F5F5;">
                                    <th>文件名</th>
                                    <th>描述（单击修改）</th>
                                    <th>文件大小</th>
                                    <th>上传进度</th>
                                </tr>
                                <tr>
                                    <td>我的相册1</td>
                                    <td><input type="text" readOnly="true" id="describe" value="这是相册描述，多余的会隐藏" /></td>
                                    <td>1M</td>
                                    <td>上传中</td>
                                </tr>
                            </table>
                        </div>
                        <div class="batch_main_footer">
                            <span style="margin-left: 10px;">
                                上传进度：
                                <div class="upload_jindu">
                                    <div  class="upload_jindu_line" style="width: 100px;"></div>
                                </div>
                                50%
                            </span>
                        </div>
                        <p><input type="submit" name="submit_upload" value="上传" id="submit_upload" /></p>
                        <div class="prompt">
                            <p style="color: red;">温馨提示：</p>
                            <p>您当前图片空间还剩余容量 10 MB</p>
                            <p>
                                <img src="./images/add_space.png" alt="" />
                                <a style="color: #51b837" id="buy_add_show">我要增加空间</a>
                                （您可以购买道具"附件增容卡"来增加附件容量上传更多的图片）
                            </p>
                        </div>
                        <!-- *********附件增容卡**************** -->
                   <div class="clear"></div>
                    <div class="reward" id="buy_add" style="display: none;width: 500px;height: 350px;margin-left: 300px;margin-top: -300px;">
                        <div class="reward_top">
                            <span class="fleft" style="margin-left: 20px;">
                                购买道具
                            </span>
                            <span id="buy_add_close" class="fright" style="color: #51B837;background: #fff;width: 15px;height: 15px;display: inline-block;margin-right: 10px;line-height: 15px;margin-top: 6px;text-align: center;">X</span>
                        </div>
                        <form action="">
                            <div class="email_left fleft">
                                <img src="./images/buy_add.png" alt="" />
                            </div>
                            <div class="email_right fleft" style="font-size: 13px;">
                                <p>附件增容卡</p>
                                <p style="color: #828282">使用一次，可以给自己增加5M的附件空间</p>
                                <p>增加经验：<font style="color: #51B837;">2</font></p>
                                <p>道具单价：<font style="color: #51B837;">500</font>象牙币</p>
                                <p>现有库存：<font style="color: #51B837;">999</font>个</p>
                                <p class="email_right_input">购买数量 <input type="text" name="" /> 个（当前最多可以购买0个）</p>
                                <p><input type="submit" name="buy_add_card" id="buy_add_card" value="购买" style="border-radius: 3px;margin-top: 20px;width: 80px;height: 30px;text-align: center;line-height: 30px;background: #51b837;color: #fff;" /></p>
                            </div>
                        </form> 
                    </div>
                    <!-- *********附件增容卡**************** -->
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
    <div class="clear"></div>
    </div>

    <div class="foot">Copyright ©  象牙塔-高校单身校友大联盟 All Rights Reserved</div>
</div>

</body>
<script>
    $('#describe').click(function() {
        $(this).removeAttr('readOnly');
        $(this).css('border','1px #e2e1e1 solid');
    });
    $('#describe').mouseleave(function() {
        $(this).attr("readonly","readonly");
        $(this).css('border','0');
    });
     $('#buy_add_show').click(function(){
        $('#buy_add').show();
    });
    $('#buy_add_close').click(function(){
        $('#buy_add').hide();
    });
</script>

</html>
