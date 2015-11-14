function ajax(options){
	var req = false;
	if(window.XMLHttpRequest) {
			req = new window.XMLHttpRequest();	}
    else if (window.ActiveXObject) {
    		req = new window.ActiveXObject('Microsoft.XMLHTTP'); }
    if(!req) return false;
    req.open(options.method,options.url,true);
    req.onreadystatechange = function(){//初始化
    		switch (req.readyState) {
    			case 1://1:描述一种"发送"状态；此时，代码已经调用了XMLHttpRequest open()方法并且XMLHttpRequest已经准备好把一个请求发送到服务器。
    				  break;
    			case 2://2:描述一种"发送"状态；此时，已经通过send()方法把一个请求发送到服务器端，但是还没有收到一个响应。
    				 break;
    			case 3://3:描述一种"正在接收"状态；此时，已经接收到HTTP响应头部信息，但是消息体部分还没有完全接收结束。
					  break;
				case 4://4:描述一种"已加载"状态；此时，响应已经被完全接收。
					if(req.status == 200){
    					options.listener.call(req);
		    		} else { //页面不正常
	           			//window.alert("您所请求的页面有异常。");
	        		}
			}
			//测知Ajax原来在请求发出之后一直在循环执行函数processResponse()
    		//alert("[循环执行函数processResponse()]req.readyState:"+req.readyState);
    };
    switch(options.method){
    case 'GET':
    	req.send(null);
    	break;
    case 'POST':
    	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");//POST方式需要自己设置http的请求
    	req.send(options.param);
    	break;
    case 'HEAD':
        break;
    default:
    }
    return req;
}

function callback(){
    var res=this.responseText;
    data = eval("("+res+")");
    var Tel = data.Tel;
    var photosy = data.PhotoSy;
    var companyName = data.companyName;
    var title = data.title;
    var Keywords = data.Keywords;
    var description = data.description;
    if(photosy1!=""){
		document.getElementById("index_img").setAttribute("src",photosy);
	}
    document.getElementById("telmenu").setAttribute("href","tel:"+Tel);
    document.getElementById("telmenu").setAttribute("phone",Tel);
    document.getElementById("companyName").innerHTML= "欢迎光临"+companyName;
    document.getElementById("title").innerHTML=title;
    document.getElementById("Keywords").setAttribute("content",Keywords);
    document.getElementById("description").setAttribute("content",description);
    
    
}

function getInfo(){
	var options = {
    		url:'INCLUDE.php',
    		listener:callback,
    		method:'POST',
    		param:'action=info'
    }
	var req = ajax(options);
	
		
	
}
getInfo();
