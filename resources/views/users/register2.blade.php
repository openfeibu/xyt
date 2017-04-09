<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="" name="description" />
<meta content="" name="keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>象牙塔</title>
</head>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.8.3.min.js"></script>
<body>
<div class="all">
	<div class="head">
		<a href="index.html" class="logo"><img src="images/logo.jpg" width="370" height="100" alt="" title="" /></a>
	</div>
	<div class="clear"></div>
	<div class="b_l">
		<div class="b_k_reg">
			<div class="d_reg_2_head">
				<img src="images/reg2.jpg" />
			</div>
			<div class="reg_top">
				<p>温馨提示：[√]表示审核通过，[X]表示审核未通过，[?]表示审核中。请上传您的单人真实照片，要求五官清晰。</p>
			</div>
			<div class="d_reg_main d_reg_2_main">
				
				<form method="post">
				<div  class="regleft">
					<img src="images/noimg.jpg" width="113" height="135" alt="" />
					<p>形象照</p>
				</div>
				<div class="regright">
                <table width="591" border="0">
                  <tr>
                    <td width="100"><span class="notice">审核状态：</span></td>
                    <td >还没设置形象照</td>
                  </tr>
                  <tr>
                    <td><span class="notice">上传头像：*</span></td>
                    <td><a href="javascript:;" class="file">选择文件</a><input type="file"  /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input type="button" name="" class="uploadbtn" value="开始上传"/><input type="button" name="" class="choosebtn" value="从相册选择形象照"/></td>
                  </tr>
                </table>

                </div>
                <div class="clear"></div>
                <div class="regp">
                <p class="notice">温馨提示：</p>
                <p>点击浏览，选择您想要上传作为形象照的照片；</p>
                <p> 仅支持PNG，JPG，JPEG，GIF格式，5M以下文件； </p>
                <p>请上传您的单人真实照片，要求五官清晰。请勿上传明星、名人或他人照片，您将对此负法律责任；</p>
                <p>如果您的照片被会员投诉为假照片，经查实会将您列入网站黑名单，以后都将无法注册和登录。</p>
                </div>
                <div style="text-align:center" class="regnext"><p><a href="#">跳过这一步>></a></p><div><input name="dosubmit" class="nextbtn" value="下一步" type="submit"></div></div>
				</form>
			</div>
		</div>
	</div>

@include('layouts.footer')
</body>
</html>
