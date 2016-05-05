/**
 * 加载cookie信息，输入框设置
 * 1.  定义对象：var INITINFO = {usernameId : 'username',          //  username标签id 
 *                              passwordId : 'username',          //  password标签id
 *                              checkboxId : 'checkbox',           //  checkbox标签id 
 *                              openAddressId : 'userOpenAddress',
 *                              defaultUsernameValue: '请输入联通手机号码', //水印效果username默认文字
		                        defaultPasswordValue: '请输入WLAN服务密码', //水印效果password默认文字
		                        defaultPasswordId:'t',                     //type=password 用于显示默认文字的密码框
		                        isDefault:false};                           //是否开启水印效果
 * 2.  如开启水印效果需要额外添加一个 type=password 用于显示默认文字的密码框
 * 例：<input  type="text" id="t" style="display:none"/>
 * 3.  如果如果默认的配置中，不符合页面需求则可覆盖相应属性
 * 例：INITINFO.isDefault = true;   // 开启水印效果                                                             
 */

   $(function(){
	   initPara();
   }); 
   var INITINFO = {usernameId : 'username',
		           passwordId : 'password',
		           checkboxId : 'checkbox',
		           openAddressId : 'userOpenAddress',
		           defaultUsernameValue: '请输入联通手机号码',
		           defaultPasswordValue: '请输入WLAN服务密码',
		           defaultPasswordId:'t',
		           isDefault:false};

   
   function initPara(){
	    var user_name = getCookieValue("user_name");
	    $('#'+INITINFO.usernameId).css("background-color","#f7f7f7");
	    $('#'+INITINFO.passwordId).css("background-color","#f7f7f7");
        if(user_name!=null&&user_name!=""&&user_name!='null'){
	        getpwd(user_name,INITINFO);
        }else{
        	if(INITINFO.isDefault){
        		$('#'+INITINFO.usernameId).val(INITINFO.defaultUsernameValue);
        		$('#'+INITINFO.usernameId).css('color','#999');
        		changePwdTypeToText();
        	}
        }
        
        $('#'+INITINFO.usernameId).blur(function(){
            var username = $(this).val();
            $(this).css("background-color","#f7f7f7");
            if(username==null||trim(username)==""||trim(username)=="null"){
            	if(INITINFO.isDefault){
                    $(this).val(INITINFO.defaultUsernameValue);
                    $(this).css('color','#999');
                }
            }else{
            	getpwd(username,INITINFO);
            }
        }).focus(function(){
        	$(this).css("background-color","white");
        	if(INITINFO.isDefault){
            	var courrValue = $(this).val();
            	if(courrValue==INITINFO.defaultUsernameValue){
            		$(this).val("");
            	}
        	}
        });
        
        if(INITINFO.isDefault){
        	$('#'+INITINFO.passwordId).blur(function(){
	        	var courrValue = $(this).val();
	        	if(courrValue==null||trim(courrValue)==""||trim(courrValue)=="null"){
	        		changePwdTypeToText();
	        	}else{
	        		
	        		$(this).css("background-color","#f7f7f7");
	        	}
	        }).focus(function(){
	        	$(this).css("color","black");
	        	$(this).css("background-color","white");
	        	var username = $('#'+INITINFO.usernameId).val();
	            if(username==INITINFO.defaultUsernameValue)
	            $('#'+INITINFO.passwordId).val("");
	        });
        	$('#'+INITINFO.defaultPasswordId).focus(function(){
        		changePwdTypeToPassword();
        	});
        }else{
        	$('#'+INITINFO.passwordId).blur(function(){
        		$(this).css("background-color","#f7f7f7");
        	}).focus(function(){
        		$(this).css("color","black");
        		$(this).css("background-color","white");
        	});
        }
    }
   function getCookieValue(name){ 
		if(name !== ""){
	    var username = escape(name);        
	    var allcookies = document.cookie;   
	    username += "=";    
	    var pos = allcookies.indexOf(username);    
	    if (pos != -1){                                     
	        var start = pos + username.length;                  
	        var end = allcookies.indexOf(";",start);        
	        if (end == -1){end = allcookies.length;}        
	        var value = allcookies.substring(start,end);       
	        var val = unescape(value);
	       // alert(val);            
	        return val;                                
	        } 
	    }
	    return "";  
	}
    function getpwd(username,INITINFO){
          document.getElementById(INITINFO.usernameId).value = username;
          
             $.ajax({
			  type: "post",
			  url: "/loadCookiePwd.do",
			  data:{
			      username:username
			  },
			  dataType: "json",
			  success : function(msg){
			      if(msg!=null){
			          var password = msg.password;
			          var OpenAdress = msg.openAdress;
				      if(password!=null&&password!=""&&password!="null"){
				          document.getElementById(INITINFO.passwordId).value = password; 
				          document.getElementById(INITINFO.checkboxId).checked = true;
				      }else{
				          document.getElementById(INITINFO.passwordId).value = "";
				          document.getElementById(INITINFO.checkboxId).checked = false;
				      }
				      if (OpenAdress != null&&OpenAdress!=""&&OpenAdress!="null") {
		                var areas = document.getElementById(INITINFO.openAddressId);
		                if(areas.nodeName=='select'){
		                	for (var i = 0; i < areas.options.length; i++) {
			                    if (areas.options[i].value == OpenAdress) {
			                        areas.options[i].selected = true;
			                        break;
			                    }
			                }
		                }else{
		                	areas.value = OpenAdress;
		                }
	                   }
			        }
			    }
		      });
      
    }
    
    
    function changePwdTypeToText(){
 	   $('#'+INITINFO.passwordId).css("display","none");
 	   $('#'+INITINFO.defaultPasswordId).css("display","block");
 	   $('#'+INITINFO.defaultPasswordId).val(INITINFO.defaultPasswordValue);
 	   $('#'+INITINFO.defaultPasswordId).css("background-color","#f7f7f7");
 	   
    }
    
    function changePwdTypeToPassword(){
 	   $('#'+INITINFO.defaultPasswordId).css("display","none");
 	   $('#'+INITINFO.passwordId).css("display","block");
 	   $('#'+INITINFO.passwordId).css("background-color","#f7f7f7");
 	   $('#'+INITINFO.passwordId).focus();
 	   
    }
