var phonetype = navigator.userAgent;

//alert(navigator.userAgent);

if ((phonetype.match(/iPad/i) && phonetype.match(/Safari/i))) {

    //alert("p.dtdc007.com");

    window.location.href = "http://dtdc007.com/p/"
}
if ((phonetype.match(/Android/i)||phonetype.match(/iPhone/i)) && phonetype.match(/Safari/i)) {

	//alert(phonetype);

	//window.location.href="http://dtdc007.com/m/";
	window.location.href="http://localhost/m/index.php";

}