$(function(){
var pid=GetRequest()["id"];
	var type=GetRequest()["type"];
	var select=GetRequest()["select"];
	switch (eval(select))
	{
	case 1:
		getclickratio(pid,type);
		break;
	case 2:
		getviewratio(pid,type);
		break;
	case 3:
		getturnoverratio(pid,type);
		break;
	case 4:
		getphoneratio(pid,type);
		break;
	case 5:
		getevrphoneratio(pid,type);
		break;
	case 6:
		gettodayratio(pid,type);
		break;
	case 7:
		var date=GetRequest()["date"];
		getonedayratio(pid,type,date);
		break;
	case 8:
		gettimeratio(pid,type);
		break;
	case 9:
		var date=GetRequest()["date"];
		getonemonratio(pid,type,date);
		break;
	case 10:
		var begindate=GetRequest()["begindate"];
		var enddate=GetRequest()["enddate"];
		getcustomerratio(pid,type,begindate,enddate);
		break;
	}
});