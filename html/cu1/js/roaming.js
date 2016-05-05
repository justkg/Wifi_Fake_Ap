
/****************************************
 * 国际漫游入口
 ***************************************/

function getCarrier() {
        $("#carrierName").empty();
        $("#carrierName").append("<option value='0'>  Select your Service Provider  </option>");
        $.ajax({
            url:"/copartner/getCarrier.do?random=" + Math.random(),
            type:'POST',
            dataType:'xml',
            data:{
                name:""
            },
            error:function () {
            },
            success:function (xml) {
                $(xml).find("carrier").each(function () {
                    var carrierName = $(this).children("name").text();
                    var option = $("<option>");
                    option.attr("value", carrierName);
                    option.text(carrierName);
                    option.appendTo($("#carrierName"));
                });

            }
        });
}

/*****************************
 *  国际漫游页面跳转
 ***************************************/

function skipPage(){
   
    var carrierName = document.getElementById("carrierName").value;
    if(carrierName!=null&&carrierName!=""&&carrierName!=0){
    	var basName = document.getElementById("basname").value;
        var setUserOnlineId = document.getElementById("setUserOnline").value;
        var basPushUrl = document.getElementById("basPushUrl").value;
        
        document.getElementById("basName2").value = basName;
        document.getElementById("setUserOnline2").value = setUserOnlineId;
        document.getElementById("basPushUrl2").value = basPushUrl;

        var form2 = document.getElementById("form2");

        form2.submit();
    }
    
}





