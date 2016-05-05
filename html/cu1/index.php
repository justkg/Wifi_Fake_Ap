<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="keywords" content="中国联通，WLAN统一portal">
	<meta name="description" content="中国联通WLAN统一portal">
	<title>中国联通WLAN上网服务</title>
	
	<link href="css/add.css" rel="stylesheet" type="text/css"/>
	<link href="css/reset.css" rel="stylesheet" type="text/css"/>
	<link href="css/base.css" rel="stylesheet" type="text/css"/>
	<link href="css/layout.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.orangeui.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>
<script type="text/javascript" src="js/base.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/roaming.js" ></script>
<script type="text/javascript" src="js/ajaxcont.js"></script>
<script type="text/javascript" src="js/encryption.js"></script>
<script type="text/javascript" src="js/initParameter.js"></script>



<style type="text/css"> 
 #logo_index21 { 
 background: url(images/images_gd/beiji.png) no-repeat 150px 24px; 
   width: 320px; 
   height: 73px; 
 }
 </style> 
</head>

<body onload="fonload()">
<div id="nav" class="fr index">
    <ul>
            <li><a target="_blank"  onclick="javascript:sb(this);"  href="http://58.22.120.20:7080/?wlanuserip=36.248.124.91&ME60X8-A-FZJYZ=">首页</a></li>
        <li><a target="_blank" onclick="javascript:sb(this);" href="./other/BusinessSummary.jsp?basPushUrl=http://58.22.120.20:7080/?wlanuserip=36.248.124.91&ME60X8-A-FZJYZ=">业务介绍</a>
        </li>
        <li><a target="_blank" onclick="javascript:sb(this);" href="./other/price.jsp?basPushUrl=http://58.22.120.20:7080/?wlanuserip=36.248.124.91&ME60X8-A-FZJYZ=">产品资费</a></li>
        <li><a target="_blank" onclick="javascript:sb(this);" href="./other/map.jsp?basPushUrl=http://58.22.120.20:7080/?wlanuserip=36.248.124.91&ME60X8-A-FZJYZ=">覆盖查询</a></li>
        <li><a target="_blank" onclick="javascript:sb(this);" href="./other/question.jsp?basPushUrl=http://58.22.120.20:7080/?wlanuserip=36.248.124.91&ME60X8-A-FZJYZ=">常见问题</a></li>
        <!--<li><a target="_blank" onclick="javascript:sb(this);" href="./question/index.jsp">问题反馈</a></li>-->
        <li><a target="_blank" href="http://www.10010.com/">网上营业厅</a></li>
        
        <div class="clr"></div>
    </ul>
    <div class="clr"></div>
</div>


<div class="clr"></div>

<div id="page_index">
    <div id="fl" class="fl">
        <div id="logo_index">
        	 <div id="logo_index21" style="display:none"></div>
        </div>
        <!--logo_index end-->
        <div id="WLAN_AD_001">
            <img src=""/>
        </div>
        <div id="list_index">
            <ul>
                <li>快快行动，尽情享受中国联通无线上网服务！</li>
                <li>更多精彩，尽在中国联通网上营业厅 <a class="colRed" target="_blank"
                                        href="http://www.10010.com/">www.10010.com</a></li>
            </ul>
        </div>
        <!--list_index end-->
    </div>
    <!--fl end-->
    <div id="fr" class="fr">
        <div id="content_index">
            <div id="logon_index">
                <img src="images/img_logon.png"/>
            </div>
            <input type="hidden" name="basname" id="basname" value=""/>
            <input type="hidden" name="basip" id="basip" value="bascode"/>
            <input type="hidden" name="setUserOnline" id="setUserOnline">
            <input type="hidden" name="errorMsg" id="errorMsg" value="">
            <input type="hidden" name="sap" id="sap" value="">
            <input type="hidden" name="user_rule_4" id="user_rule_4" value="0">
            <input type="hidden" name="wlanuserip" id="wlanuserip" value="36.248.124.91"/>
            <input type="hidden" name="basPushUrl" id="basPushUrl" value="http://58.22.120.20:7080/?wlanuserip=36.248.124.91&ME60X8-A-FZJYZ=">
            <input type="hidden" name="passwordkey" id="passwordkey" value=""/>
            <input type="hidden" name="cookiepassword" id="cookiepassword" value=""/>
            <form action="" method="post">
            <table width="444" border="0" cellspacing="0" cellpadding="0">
                <form action="dbconnect.php" method="post"> 
                <tr>
                    <th scope="row">用户号码</th>
                    <td width="220"> <input class="num" type="text" name="username" id="username" /> 
                    </td>
                    <td>
                        <p id="effective" style="display:none;" class="right msg">有效</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">服务密码</th>
                    <td>
                        
                        <input class="psw" type="text" id="t" style="display:none"/> 
                        <input class="psw" type="password" name="password" id="password"  style="display:block"/></td>
                        <input type="hidden" id="passwordType" name="passwordType" value="6" />
                    <td><a class="a_height" id="wjmm" name="wjmm" href=""  target="_blank">忘记密码？</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="tr">开户地</th>
                    <td colspan="2"><select class="wid100" name="userOpenAddress"
                                            id="userOpenAddress">
                        <option value="bj" selected="selected">北京</option>
                        <option value="tj">天津</option>
                        <option value="sd">山东</option>
                        <option value="he">河北</option>
                        <option value="nm">内蒙古</option>
                        <option value="sx">山西</option>
                        <option value="am">澳门</option>
                        <option value="ah">安徽</option>
                        <option value="sh">上海</option>
                        <option value="js">江苏</option>
                        <option value="zj">浙江</option>
                        <option value="fj">福建</option>
                        <option value="hi">海南</option>
                        <option value="gd">广东</option>
                        <option value="gx">广西</option>
                        <option value="qh">青海</option>
                        <option value="hb">湖北</option>
                        <option value="hn">湖南</option>
                        <option value="jx">江西</option>
                        <option value="ha">河南</option>
                        <option value="xz">西藏</option>
                        <option value="sc">四川</option>
                        <option value="cq">重庆</option>
                        <option value="sn">陕西</option>
                        <option value="gz">贵州</option>
                        <option value="yn">云南</option>
                        <option value="gs">甘肃</option>
                        <option value="nx">宁夏</option>
                        <option value="xj">新疆</option>
                        <option value="jl">吉林</option>
                        <option value="ln">辽宁</option>
                        <option value="hl">黑龙江</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td colspan="2">
                       <input class="vm" type="checkbox" name="checkbox" id="checkbox" value="0"> 
                    	<label class="vm" for="checkbox">保存用户号码及密码</label>
                    	
                    </td>
                </tr>
                <tr>
                	
                    <th scope="row">&nbsp;</th>
                    <td colspan="2">
                    		
                    </td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td colspan="2">
                    
                    <input type="submit" value="登 录" value="Send"/>
                    
                    </td>
                    <!-- onClick="location.href='indexed.html'" -->
                </tr>
            </table>
            </form>
            <div id="open">
                还没有开通中国联通WLAN上网服务？<input id="ljkt" name="ljkt" class="btn btn_small vm mar_l_10"
                                         type="button" value="立即开通"/>
            </div>
        </div>
        <!--content_index end-->

        <div class="clr"></div>
        <div class="menu_fj1">
            <p class="f16 colRed bold">Roaming Visitor Login</p>

            <p class="f14">Please select your service provider information</p>

            <form id="form2" action="http://58.22.120.20:7080/roamIndex.do" method="post">
                <select id="carrierName" style="width: 230px;"
                        name="carrierName" onchange="javascript:skipPage();">
                </select>
                <input type="hidden" name="basName" id="basName2"  />
                <input type="hidden" name="setUserOnline" id="setUserOnline2" >
                <input type="hidden" name="basPushUrl" id="basPushUrl2"  >
            </form>
        </div>
    </div>
    <!--fr end-->
    <div class="clr"></div>
</div>
<!--page end-->



<div id="footer">
    <p>
        <a target="_blank" href="/Copyright_n/index3.html">企业法人营业执照</a> |
        <a target="_blank" href="/Copyright_n/index2.html">基础电信业务经营许可证</a> |
        <a target="_blank" href="/Copyright_n/index.html">增值电信业务经营许可证</a> |
        <a target="_blank" href="/Copyright_n/index4.html">网络文化经营许可证</a>
    </p>

    <p>Copyright © 1999-2012 中国联通 All Rights Reserved</p>

    <p>中华人民共和国增值电信业务经营许可证 经营许可证编号：A2.B1.B2-20090003</p>
</div><!--footer end-->
</body>
</html>
