var net = new Object();
net.READY_STATE_UNINITIALIZED = 0;
net.READY_STATE_LOADING = 1;
net.READY_STATE_LOADED = 2;
net.READY_STATE_INTERACTIVE = 3;
net.READY_STATE_COMPLETE = 4;


net.ContentLoader = function (url, onload, flagsyn ,onerror, method, params) {
	this.url = url;
	this.req = null;
	this.onload = onload;
	this.onerror = (onerror) ? onerror : this.defaultError;
	this.loadXMLDoc(url, flagsyn, method, params);
}

net.ContentLoader.prototype = {
	loadXMLDoc:function (url, flagsyn, method, params) {
		var contentType = null;
	
		if(flagsyn == undefined) flagsyn = true;
		if(method == undefined) method = "GET";
		
		if(method == "POST") {
			contentType = "application/x-www-form-urlencoded";  
		}
		
		if(window.XMLHttpRequest) {
			this.req = new XMLHttpRequest();
		} else if(window.ActiveXObject){
			this.req = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		if(this.req) {
			try
			{
				var loader = this;
				this.req.onreadystatechange = function() {
					loader.onReadyState.call(loader);
				}
				
				url += "&AJAXREQ=101&currTime=" + new Date().getTime();
				this.req.open(method, url, flagsyn);
				
				if(contentType) {
					this.req.setRequestHeader("Content-Type", contentType);
				}
				
				if(!params) params = null;
				
				this.req.send(params);
			}
			catch (err)
			{
				this.onerror.call(this);	
			}
		}
	},
	onReadyState:function() {
		var req = this.req;
		var ready = req.readyState;
		
		if(ready == net.READY_STATE_COMPLETE) {
			var httpStatus = req.status;
			
			if(httpStatus == 200 || httpStatus == 0) {
				this.onload.call(this);
			} else {
				this.onerror.call(this);
			}
		}
	},
	defaultError:function() {
		alert("!" 
			+ "\nreadyState:" + this.req.readyState
			+ "\nstatus:" + this.req.status);
	}
}

