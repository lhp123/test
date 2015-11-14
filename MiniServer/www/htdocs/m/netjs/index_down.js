var opts={

		//clientAndroidPhoneAddress:"http://dtdc007.com/m/download/eallAndroidPhoneClient.apk",
clientAndroidPhoneAddress:"http://ti.3g.qq.com/open/s?aid=jumpurl&url=http://dtdc007.com/m/download/eallAndroidPhoneClient.apk",

		clientAndroidIpadAddress:"http://dtdc007.com/p/download/eallAndroidIpadClient.apk",

		ists:"1"

}

var today=new Date();

var phonetype = navigator.userAgent;

var ua = navigator.userAgent.toLowerCase();

var visitdate = localStorage["visitdate"];

var timer;

var sevenday = 604800000;

//var sevenday = 0;

if (phonetype.match(/Android/i)) {

	if(document.getElementById("android_client_download")){

		document.getElementById("android_client_download").style.display="";

	}

}else if(ua.match(/MicroMessenger/i)=="micromessenger"){

	if(phonetype.match(/Android/i)){

		if(document.getElementById("android_client_download")){

			document.getElementById("android_client_download").style.display="";

		}

	}

}



	

if(document.getElementById("elem-ClientDownLoadTs_ajaxIsopents01-001")){

	//if ((opts.ists == "1" && visitdate == null)|| (opts.ists == "1" && today.getTime() - visitdate >= sevenday)) {

	if(false){

		localStorage["visitdate"] = today.getTime();

		if ((phonetype.match(/iPhone/i) || phonetype.match(/iPod/i))

				&& phonetype.match(/Safari/i)) {

			show("iphone");

			if(document.getElementById("android_client_download")){

				document.getElementById("android_client_download").style.display="none";

			}

		}

		if (phonetype.match(/Android/i)||(phonetype.match(/iPad/i)&& phonetype.match(/Safari/i))) {

			show("android");

		}

	

		if (document.getElementById("iphonetype").style.display == "-webkit-box"

			|| document.getElementById("iphonetype").style.display == "") {

			timer = window.setTimeout(function() {

				close("iphone");			

			}, 10000);

		}

		

		if (document.getElementById("androidtype").style.display == "-webkit-box"

			|| document.getElementById("androidtype").style.display == "") {

			timer = window.setTimeout(function() {

				close("android");

			}, 10000);

		}	

	}

}

function download(){

	e = window.event || arguments.callee.caller.arguments[0];

	if (e && e.stopPropagation) {

		e.stopPropagation();

	} else {

		window.event.cancelBubble = true;

	}

	clearTimeout(timer);

	if(document.getElementById("androidtype")){

		document.getElementById("androidtype").style.display="none";

	}	

	if (phonetype.match(/Android/i)) {

		location.href = opts.clientAndroidPhoneAddress;

	}

	else if(phonetype.match(/iPad/i)&& phonetype.match(/Safari/i)){

		location.href = opts.clientAndroidIpadAddress;

	}

}

function later(){close("android");}

function close(t){

	document.getElementById("elem-ClientDownLoadTs_ajaxIsopents01-001").style.width="";

	document.getElementById("elem-ClientDownLoadTs_ajaxIsopents01-001").style.height="";

	document.body.className="";

	if(t=="android")

		document.getElementById("androidtype").style.display="none";

	else if(t=="iphone")

		document.getElementById("iphonetype").style.display="none";

}

function close1(t){

	document.getElementById("elem-ClientDownLoadTs_ajaxIsopents01-001").style.display="none";

	

}

function show(t){

	document.getElementById("elem-ClientDownLoadTs_ajaxIsopents01-001").style.width="100%";

	document.getElementById("elem-ClientDownLoadTs_ajaxIsopents01-001").style.height="100%";

	document.body.className="jzgd";

	if(t=="android")

		document.getElementById("androidtype").style.display="";

	else if(t=="iphone")

		document.getElementById("iphonetype").style.display="";

}













