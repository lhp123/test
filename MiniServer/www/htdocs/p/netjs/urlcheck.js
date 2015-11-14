var phonetype = navigator.userAgent;
//alert(navigator.userAgent);
/*
if ((phonetype.match(/iPad/i) && phonetype.match(/Safari/i))) {
	//alert("p.eallcn.com");
	window.location.href="http://p.eallcn.com";
}
*/
if ((phonetype.match(/Android/i)&& phonetype.indexOf("HD(")<0 &&phonetype.match(/Safari/i))||(phonetype.match(/iPhone/i)&& phonetype.match(/Safari/i))) {	
	window.location.href="/m/";
}