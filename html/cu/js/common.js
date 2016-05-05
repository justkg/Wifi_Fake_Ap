var XMLHttpReq;

function createXMLHttpRequest() {

    if (window.XMLHttpRequest) { // Mozilla 浏览器
        XMLHttpReq = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE浏览器
        try {
            XMLHttpReq = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                XMLHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
}
function sendRequest(url) {
    createXMLHttpRequest();
    XMLHttpReq.open("GET", url, true);
    XMLHttpReq.onreadystatechange = processResponse;// 指定响应函数
    XMLHttpReq.send(null); // 发送请求
}

//function resetpwd(){
//	
//	var dynaid = document.getElementById("rDynaAuthId").value;
//	alert(dynaid);
//	if(dynaid != ""){
//		var c = Math.random();
//		sendRequest('resetStaticPasswd.do?DynaAuthId='+dynaid+'&c='+c);
//	}
//}

function resetpwd() {
    var Mobilephone = document.getElementById("Mobilephone").value;
    //alert(Mobilephone+"++");
    var vv = document.getElementById("showtipreset");
    //alert(vv+"--");
    vv.style.display = "none";

    var dynaid = document.getElementById("rDynaAuthId").value;
    //alert(dynaid);
    if (dynaid != "") {
        var c = Math.random();
        $.ajax({
            url:'/resetStaticPasswd.do',
            data:{Mobilephone:Mobilephone, DynaAuthId:dynaid},
            type:"post",
            success:function (text) {
                if (text == "0") {
                    vv.style.display = "";
                    alert("yes");
                } else {
                    alert("fail");
                }
            }

        });

        //sendRequest('resetStaticPasswd.do?DynaAuthId='+dynaid+'&c='+c);
    }
}


function sb(target) {
	if(target.href.indexOf('?')<0){
    var basname = document.getElementById("basname").value;
    var setUserOnline = document.getElementById("setUserOnline").value;
    var sap = document.getElementById("sap").value;
	target.href += "?basname="+basname+"&setUserOnline="+setUserOnline+"&sap="+sap;    
	}
}



function getBasname() {
    var param = window.parent.location.search;
    //url contains parameter
    if (param != "") {
        param = param.substr(1, param.length);
        if (param.indexOf('&') > 0) {
            var params = param.split('&');
            for (i in params) {
                var key = params[i].substr(0, params[i].indexOf('='));

                var value = params[i].substr(params[i].indexOf('=') + 1, param.length);
                // 判断参数值是否为空
                value = value == '' ? 'null' : value;

                if(key != null ) {
					var obj = document.getElementById(key);
	            	if(obj != null) {
                		obj.value = value;
                	}
                }
                
            }
        } else {
            var key = param.substr(0, param.indexOf('='));

            var value = param.substr(param.indexOf('=') + 1, param.length);
            value = value == '' ? 'null' : value;

            if(key != null) {
				var obj = document.getElementById(key);
                	if(obj != null) {
                		obj.value = value;
                	}
            }
        }
    } else {
    	var obj = document.getElementById("basname");
    	
    	if(obj != null) {
    		obj.value = "null";
    	}
        
    }
}




