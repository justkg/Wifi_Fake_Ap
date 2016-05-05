// JavaScript Document By Orange
/* 站点说明： 中国联通Wlan-Protal专区
 * 开发时间： 2011-04-26
 * 开发者： 宁玉波   
 * 维护者： 宁玉波

 *
 * 样式版本： v1.0
 * 版本时间： 2011-05-05
 * 注意事项： 功能JS文件
 */

jQuery(function ($) {
    var orange;

    (function () {//初始化

        var input = $('input[type$="text"],input[type$="password"]');//兼容IE6, 初始化输入框水印效果
        input.css({height:'24px', width:'210px', lineHeight:'24px', padding:'0 4px', background:'#f7f7f7', border:'1px solid #ccc'}).FocusBlur()
            .focus(function () {
                $(this).css('background', '#fff');
            })
            .blur(function () {
                $(this).css('background', '#f7f7f7');
            });
        //ie兼容性

        var navli = $('#nav').find('li:last');
        navli.css('background', 'none');
        //关闭当前页

        var closePage = $('#closePage');
        closePage.click(function () {
            window.close();
        });
        //返回上一页
 
        var backPage = $('.backPage');
        backPage.click(function () {
            window.history.back();
        });
        //关闭WLAN上网服务确认
        var isConfirm = $('#confirm');
        var isClick = function () {
            var isSure = confirm('确认关闭您的WLAN上网服务？');
            if (isSure == true) {
                window.location.href = 'question/sure.jsp';
            };
        };
        isConfirm.bind('click', isClick);

        //textarea 文本区域
        var obj = $('textarea'), value = obj.html();
        obj.focus(function () {
            var t = $(this).html();
            if (t == value) {
                $(this).html('').css('color', '#000');
            };
        });

    })();

    (function () {
        //公共失败页

        if (!$('h1#fail')[0]) {
            return;
        }
        ;
        var $obj = $('h1#fail');
        var url = document.referrer;
        if (!url) {
            $obj.html('公共错误页');
            return;
        }
        ;
        var reg = /\/openWlan\/?|\/change\/?|\/lastTimeQuery\/?|\/netRecordsQuery\/?|\/shutService\/?|\/modifyPassword\/?|\/forgetPassword\/?|\/question\/?/;
        var t = reg.exec(url);
        t = t.toString();
        switch (t) {//判断错误来源并执行赋值展示操作

            case '/openWlan/':
                $obj.html('开通WLAN服务');
                break;
            case '/change/':
                $obj.html('套餐变更');
                break;
            case '/lastTimeQuery/':
                $obj.html('剩余时长查询');
                break;
            case '/netRecordsQuery/':
                $obj.html('上网记录查询');
                break;
            case '/shutService/':
                $obj.html('关闭服务');
                break;
            case '/modifyPassword/':
                $obj.html('修改密码');
                break;
            case '/forgetPassword/':
                $obj.html('忘记密码');
                break;
            case '/question/':
                $obj.html('问题反馈');
                break;
            default:
                break;
        }
        ;
    })();

    (function () {//成功失败页面位置计算
        var $obj = $('#response').find('div.msg.fl');
        var $w = $('#response').width(), w = $obj.width();
        var ml = ($w - w) / 2 - 60, object;
        if ($('.fail').length > 0) {
            object = $('.fail');
        }
        else if ($('.sure').length > 0) {
            object = $('.sure');
        }
        else {
            return;
        }
        ;
        object.css({opacity:0}).animate({marginLeft:ml, opacity:1}, 600);
    })();

    (function () {//手机号码加粗放大高亮显示, 增强用户体验
        var num = $('.num');
        num.focus(function () {
            $(this).css({fontWeight:'bold', fontSize:'18px'});
        })
            .blur(function () {
                var value = $(this).val();
                if (value == this.defaultValue) {
                    $(this).css({fontWeight:'normal', fontSize:'12px'});
                } else {
                    return;
                }
                ;
            });
    })();
    (function () {//选择WLAN套餐
        var p = $('#options').find('label');
        var iClick = function () {
            var i = p.index(this);
            var t = p.eq(i).hasClass('options');
            var c = p.eq(i).find('input').attr('disabled');
            if (t) {
                if (!c) {
                    p.removeClass('optionsed').eq(i).addClass('optionsed').find('input').attr('checked', true);

                } else {
                    alert('此套餐是您当前使用套餐，请选择其他套餐进行变更。');
                }
                ;
            } else {
                p.removeClass('optionsed').eq(i).find('input').attr('checked', true);
            }
            ;
        };
        p.bind('click', iClick);
    })();
    
    var thhsuccess = "";
    var obj = null;

    var thhi = 15;
    
    var trim = function(value){
    	var res = String(value).replace(/^[\s]+|[\s]+$/g, '');
    	return   res;
	};
    
    
    //ajax
    (function () {
        //登录网络
        $('#loginNet').click(function(){ //1,380,150,1
            //2011-09-14 thh
            thhi = 35;
            var username = document.getElementById("username").value;
            username = trim(username);
            var password = document.getElementById("password").value;
            var passwordType = document.getElementById("passwordType").value;
            var userOpenAddress = document.getElementById("userOpenAddress").value;
            var setUserOnline=document.getElementById("setUserOnline").value;
            var sap=document.getElementById("sap").value;
            var user_rule_4=document.getElementById("user_rule_4").value;
            var wlanuserip = document.getElementById("wlanuserip").value;
            var isMacAuth = "";
            var otemp = document.getElementById("isMacAuth");
            var passwordkey = document.getElementById("passwordkey").value;
            var macAddr = "";
            var bandMacAuth = "0";
            var basPushUrl = document.getElementById("basPushUrl").value;
            basPushUrl = encodeURIComponent(basPushUrl);
            if(otemp != null) {
            	isMacAuth=otemp.value;
            	macAddr = document.getElementById("macAddr").value;
            	if(document.getElementById("bandMacAuth").checked) {
            		bandMacAuth = "1";
            	}	
            }
            
            var checkbox = 1;
            var ch= document.getElementById("checkbox");
            if(ch.checked){
                checkbox = 0;
            }
            var basname = document.getElementById("basname").value;
            if(trim(username)==""){
            	alert("请输入用户名");
            	return false;
            }
            
            if(user_rule_4 != "" && user_rule_4 == "1"){
            	if(!$.validateMod(username)) {
            		alert("请输入联通手机号码");
                    return false;
                }
            }
        	username=jiami(username);
            if(trim(password)==""){
            	alert("请输入服务密码");
            	return false;
            }//else{
            //	var cookiepassword=document.getElementById("cookiepassword").value;
            	//if((cookiepassword!=null&&cookiepassword==password)){}
            	//else
            	 // {
            		password=jiami(password);
            	 // }
          //  }
            //alert(password);
            //2011-09-14 thh
            TINY.box.show('./load/login_net.html', 1, 380, 150, 1);
            var cTime = setInterval(function () {
            	
                $('#counter').html(thhi--);
               
                if (thhi <= 0) {
                    clearInterval(cTime);
                    if (thhsuccess == "success"){
                    	
                    	if(openUrl != '' ){
                    		window.open(openUrl,"_blank");
                    	}
                    	
                    	var form = "<form id='formSuccess' name='formSuccess' action='"+httpPath+"/indexe.jsp' method='POST'>";
                    	for(var key in obj){
                    		form += '<input type="hidden" name="' + key + '" value="' + obj[key] + '"/>';
                    	}
                    	$('body').append(form+"</form>");
                    	//alert(form+"</form>");
                    	$("#formSuccess").submit();
                    }else {

                        if (0 != thhsuccess.length){
                            TINY.box.show('./load/login_fail.jsp' , 1, 380, 150, 1);
                        }
                        else{
                            TINY.box.show('./load/login_fail.jsp', 1, 380, 150, 1);
                        //window.location.href='/load/login_fail.html';
                       }
                    }
                } ;
            }, 1000);
         
            //jsonp方式
            $.getJSON(
            		httpPath+"/login.do?callback=?",
            		{username:username, password:password, passwordType:passwordType,wlanuserip:wlanuserip, userOpenAddress:userOpenAddress, checkbox:checkbox,basname:basname,setUserOnline:setUserOnline, sap:sap, macAddr:macAddr, bandMacAuth:bandMacAuth, isMacAuth:isMacAuth,basPushUrl:basPushUrl,passwordkey:passwordkey},
            		function (text) {
	                obj = text.result;
	                thhsuccess = obj.message;
	                thhi = 0;
	                document.getElementById("errorMsg").value=thhsuccess;
	                openUrl = obj.okUrl;
            		}
            		); 

           /*
           $.ajax({
                url:httpPath+'/login.do?time='+new Date().toTimeString(),
                data:{username:username, password:password, passwordType:passwordType,wlanuserip:wlanuserip, userOpenAddress:userOpenAddress, checkbox:checkbox,basname:basname,setUserOnline:setUserOnline, sap:sap, macAddr:macAddr, bandMacAuth:bandMacAuth, isMacAuth:isMacAuth,basPushUrl:basPushUrl,passwordkey:passwordkey},
                type:"post",
                dataType:"text",
                success:function (text) {
                	
                    obj = $.parseJSON(text);
                    thhsuccess = obj.message;
                    thhi = 0;
                    document.getElementById("errorMsg").value=thhsuccess;
                    openUrl = obj.okUrl;
                }
            });
             */
        });
       
        
        //地图覆盖
        var map = $('#map').find('span.fr'), a = $('#mapAjax'), c = $('#mapLoad'), orange = 0;
        a.click(function () {
            if (orange == 0) {
                $(this).html('地图形式查看');
                map.css({background:'url(/images/arrow.png) no-repeat', backgroundPosition:'90px -156px'});
                c.hide().load('/load/mapList.html').fadeIn(600);
                orange = 1;
            } else if (orange == 1) {
                $(this).html('列表形式查看');
                map.css({background:'url(/images/ico_table.png) no-repeat', backgroundPosition:'right 4px'});
                c.hide().load('/load/mapImg.html').fadeIn(600);
                orange = 0;
            }
            ;
        });
        a.click();

        //使用手册
        if ($.browser.opera) {
            $('#help').width('724px');
        }
        ;//兼容opera
        var core = $('#help .tc:eq(0)').find('.btn');//获取核心对象
        var step = $('#help').find('#step').find('input.vm');//获取step对象
        var ajax = $('#helpAjax');//获取ajax容器对象
        var index;//声明核心对象索引
        core.fn = function () {//初始化核心对象实例

            index = core.index(this);
            ajax.fn(index);
            var isHeight = core.eq(index).hasClass('btn_grey');
            if (isHeight) {
                step.eq(0).click();
            }
            ;//初始化step函数
            core.addClass('btn_grey').eq(index).removeClass('btn_grey');
        };
        ajax.fn = function (index, Index) {//初始化ajax读取实例
            index ? this.index = index : index = 0;
            Index ? this.Index = Index : Index = 0;
            ajax.load('/load/help.html .getHelp:eq(' + index + ') .step:eq(' + Index + ')');//读取ajax
        };
        var updateSrc = function (index, url) {
            step.eq(index).attr('src', url);
        };//更新step高亮状态

        step.fn = function () {//初始化step实例
            var $index = step.index(this);
            var src = step.eq($index).attr('src');
            var reg = /click.gif/;
            var test = reg.test(src);
            var len = step.length;
            if (!test) {//当捕获click事件时判断 如果step未高亮

                for (var i = 0; i < len; i++) {
                    src = step.eq(i).attr('src');
                    test = reg.test(src);
                    if (test) {
                        src = src.replace('click.gif', '.gif');
                        updateSrc(i, src);//更新src去除高亮
                    } else {
                        src = src.replace('.gif', 'click.gif');
                        if (i == $index) {//当循环到当前点击对象
                            updateSrc(i, src);//使其高亮显示
                            ajax.fn(index, i);//并行更新ajax
                        }
                        ;
                    }
                    ;
                }
                ;
            } else {
                void(0);
            }
            ;//当捕获click事件时判断 如果step高亮, 不做任何动作 //初始化动作已经在核心对象实例中完成

        };
        core.bind('click', core.fn);
        step.bind('click', step.fn);

        //上网记录查询
        var netQuery = $('#netQuery').find('.bg_mo');
        var netAjax = $('#netAjax');
        var $index;
        //var selecter='.table_main:eq()';
        var netQueryFn = function () {
            $index = netQuery.index(this);
            netQuery.removeClass('bg_mo_on').eq($index).addClass('bg_mo_on');
            netAjax.load('/load/netQuery.html .table_main:eq(' + $index + ')');
        };
        netQuery.bind('click', netQueryFn);
        netQuery.eq(0).click();
        
        
        //套餐详情
        var pack = $('p.tr').find('a.packageMore');
	    pack.each(function() {
	    	var target = $(this);
			target.click(function() {
				var c = '/load/packageMore.html';
				var box = TINY.box;
				 
				// 北京个性化代码部分
				// 套餐名称
				var tcname = $(target).parent().parent().prevAll().html();
				// 套餐内容
				var content = target.attr('alt');
				box.context = 
					'<p class="fr"><img class="pointer" src="/images/btn_close.png" onclick="TINY.box.hide()"/></p><div class="clr"></div>'
					+'<p><strong>套餐名称</strong>：<span class="colRed">'+ tcname
					+'</span></p><p><strong>套餐描述</strong>：</p><p class="em2">'+ content + "</p></span></p>";
				 
				 box.show(c, 1, 300, 250, 1);
			});
		});
	    
	    var slide = $('#slide'), sd = $('#slideDown') , top = $('a.top');
        slide.click(function () {
            sd.toggle();
            $('body').animate({scrollTop:579}, 300);
            window.location.href = '#SMS';
        });
	    top.click(function () {
            //alert($(body).scrollTop())
            $('body').animate({scrollTop:0}, 300);
            window.scrollTo(0, 0);
        });

        var sl = $('#slide1'), op = $('#options1'), last = $('#last_box'), zhuce = $('#first_box'), fanhui = $('#fanhui_btn'), nextBtn = $('#next_btn');
        sl.click(function () {
            op.show();
            zhuce.hide();
        });
        fanhui.click(function () {
            op.hide();
            zhuce.show();
        });
        nextBtn.click(function () {
            last.show();
            op.hide();
        });
    })();
});



