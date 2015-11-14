// ������
var deptid="",deptname="",deptnameall="",userid="",username="";
var re1 = [];
function addre1(id, name) {
	// alert(id+","+name);
	re1.push({
				'ID' : id,
				'NAME' : name
			});
}

// Ƭ��
var re2 = [];
function addre2(id, name, pid, spell) {//
// alert(id+","+name+","+pid+","+spell);//
	re2.push({
				'ID' : id,
				'NAME' : name,
				'PID' : pid,
				'SPELL' : spell
			});//
}
// С��
var re3 = [];
function addre3(id, name, pid, ppid, spell) {
	// alert(id+","+name);
	re3.push({
				'ID' : id,
				'NAME' : name,
				'PID' : pid,
				'PPID' : ppid,
				'SPELL' : spell
			});
}

function getRe1() {
	var tmp = [];
	for (var i = 0; i < re1.length; i++) {
		tmp.push([re1[i].ID, re1[i].NAME]);
	}
	return tmp;
}

// ����
var depts = [];
function addDept(id, deptname, pid, deptnameall,DEPTTYPE) {
	// alert(id+","+name);
	depts.push({
				'ID' : id,
				'NAME' : deptname,
				'PID' : pid,
				'DEPTTYPE' : DEPTTYPE,
				'NAMEALL' : deptnameall
			});
}
function getAllDid(deptid){
	var str="-";
	for(i=0;i<depts.length;i++){
		if(depts[i].NAMEALL.indexOf("-"+deptid+"-")>=0){
			str+=depts[i].ID+"-";
		}
	}
	str+=deptid+"-";
	return str;
}
var zuID,dianID,quID,dquID;
function setPri(){
	//����    ��;��;��
	zuID=deptid;
	dianID=deptid;
	quID=deptid;
	for(k=0;k<depts.length;k++){
		if(depts[k].DEPTTYPE=="��"&&deptnameall.indexOf("-"+depts[k].ID+"-")>=0){
			zuID=depts[k].ID;
		}
		else if(depts[k].DEPTTYPE=="��"&&deptnameall.indexOf("-"+depts[k].ID+"-")>=0){
			dianID=depts[k].ID;
		}
		else if(depts[k].DEPTTYPE=="��"&&deptnameall.indexOf("-"+depts[k].ID+"-")>=0){
			quID=depts[k].ID;
		}
		else if(depts[k].DEPTTYPE=="����"&&deptnameall.indexOf("-"+depts[k].ID+"-")>=0){
			dquID=depts[k].ID;
		}
	}
	zuID=getAllDid(zuID);
	dianID=getAllDid(dianID);
	quID=getAllDid(quID);
	dquID=getAllDid(dquID);
	setTimeout("loadLogin()",2500);
//	alert(quID);
//	alert(dianID);
//	alert(zuID);
}
function loadLogin(){
	//alert(1);
//	alert(top.relogin.relogin);
//	alert(zuID);
	top.relogin.relogin.zuID.value=zuID;
	top.relogin.relogin.dianID.value=dianID;
	top.relogin.relogin.quID.value=quID;
	top.relogin.relogin.dquID.value=dquID;
	top.relogin.relogin.submit();
}
// �û�
var users = [];
function addUser(id, username, deptid,tel) {
	// alert(id+","+name);
	users.push({
				'ID' : id,
				'NAME' : username,
				'TEL' : tel,
				'DEPTID' : deptid
			});
}
var lzusers = [];
function addLzUser(id, username, deptid,tel) {
	// alert(id+","+name);
	lzusers.push({
				'ID' : id,
				'NAME' : username,
				'TEL' : tel,
				'DEPTID' : deptid
			});
}
function getUserTel(userid){
	if(userid&&userid.length<2){
		return "";
	}
	for (i = 0; i < users.length; i++) {
		if (users[i].ID == userid) {
			return users[i].TEL;
		}
	}	
}
// ��ͨ����
var pt = [];
function addpt(name, type) {
	// alert(id+","+name);
	pt.push({
				'NAME' : name,
				'TYPE' : type
			});
}

// ��ͬ����
var ht = [];
function addht(name, type, num, operation) {
	ht.push({
				'NAME' : name,
				'TYPE' : type,
				'NUM' : num,
				'OPERATION' : operation
			});
}

// ��������
var qj = [];
function addqj(name, type, down, up) {
	qj.push({
				'NAME' : name,
				'TYPE' : type,
				'DOWN' : down,
				'UP' : up
			});
}
// �������ƻ�ȡ��ͨ���õ�json����
function ptstore(type) {
	var store = [];
	for (i = 0; i < pt.length; i++) {
		if (pt[i].TYPE == type) {
			store.push(pt[i].NAME);
		}
	}
	return store;
}
// �������ƻ�ȡ�������õ�json����
function qjstore(type) {
	var store = [];
	if (type.indexOf('number') == 0) {
		type = type.replace('number', '');
		var str = new Array();
		str = type.split("-");
		for (i = str[0]; i < str[1]; i++) {
			store.push({
						'NAME' : i,
						'DOWN' : i,
						'UP' : i
					});
		}
		return store;
	}
	for (i = 0; i < qj.length; i++) {
		if (qj[i].TYPE == type) {
			store.push({
						'NAME' : qj[i].NAME,
						'DOWN' : qj[i].DOWN,
						'UP' : qj[i].UP
					});
		}
	}
	return store;
}
function qjstore2(type, unit) {
	var store = [];
	var str = new Array();
	str = type.split("-");
	for (i = str[0]; i < str[1]; i++) {
		store.push({
					'NAME' : i + unit,
					'DOWN' : i,
					'UP' : i
				});
	}
	return store;
}
// ���ں�̨����
// ��ͬ����
var ht = [];
function addht(type, name) {
	ht.push({
				'NAME' : name,
				'TYPE' : type
			});
}
// �������ƻ�ȡ��ͬ���õ�json����
function htstore(type) {
	var store = [];
	for (i = 0; i < ht.length; i++) {
		if (ht[i].TYPE == type) {
			store.push(ht[i].NAME);
		}
	}
	return store;
}
// ������
var bt = [];
function addBitian(type, str) {
	bt.push({
				'TYPE' : type,
				'STR' : str
			});
}
function getBitian(type) {
	for (i = 0; i < bt.length; i++) {
		if (bt[i].TYPE == type) {
			return bt[i].STR;
		}
	}
	return "";
}
//����
//var sd_num=0;// �Զ������ļ�����
//var totle_sdnum=999;
//function suoding(){
//	if(sd_num>=totle_sdnum){
//		//parent.location.replace('/servlet/zdext.suoding.main');window.close();;
//		top.mainframe.rows='*,0,0,0,0,0';
//		return;
//	}
//	sd_num=sd_num+1;
//	setTimeout("suoding();",60000);
//}
var jc = [];
function addJuece(type, num) {
	jc.push({
				'TYPE' : type,
				'NUM' : num
			});
//	if(type=="����ʱ����"){
//		totle_sdnum=num;
//		suoding();
//	}
}


function getJuece(type) {
	for (i = 0; i < jc.length; i++) {
		if (jc[i].TYPE == type) {
			return jc[i].NUM;
		}
	}
	return "";
}

// �û�ͷ���json����
function uhstore(url) {
	var store = [];
	for (i = 1; i < 41; i++) {
		store.push(url+"/h"+i+".gif");
	}
	return store;
}
var companyid="",companyname="",ifsys="0";
function setCompany(id,cname,sys){
	companyid=id;
	companyname=cname;
	ifsys=sys;
}

function setUserD(did,dname,dnameall,uid,uname){
	deptid=did;
	deptname=dname;
	userid=uid;
	username=uname;
	deptnameall=dnameall;
	setPri();
}
var jc_zjlen=8,sdlen=0;
function setJcV(type,num){
	if(type=="�������볤��"){
		jc_zjlen=num;
	}
	else if(type=="����ʱ����"){
		sdlen=num;
	}
}
//��ȡcookid
var xmlHttp;
GetXmlHttpObject=function(handler) {
	var objXmlHttp;
	if (navigator.userAgent.indexOf("MSIE") >= 0) {
		var strName = "Msxml2.XMLHTTP";
		if (navigator.appVersion.indexOf("MSIE 5.5") >= 0) {
			strName = "Microsoft.XMLHTTP";
		}
		try {
			objXmlHttp = new ActiveXObject(strName);
			objXmlHttp.onreadystatechange = handler;
			return objXmlHttp;
		} catch (e) {
			alert("Error. Scripting for ActiveX might be disabled");
			return
		}
	} else {
		objXmlHttp = new XMLHttpRequest();
		objXmlHttp.onload = handler ;
		objXmlHttp.onerror = handler;
		return objXmlHttp;
	}
};
EallAjaxFun=function(url,fn){
	xmlHttp = GetXmlHttpObject(function(){
		if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
			fn(xmlHttp.responseText);
		}
	});
	xmlHttp.open("GET",url, true);
	xmlHttp.send(null);	
};
function getCook(){
	var cname="EALLZD=";
	var ifnew=1;
	var arr,reg=new RegExp("(^| )"+cname+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg)){
		cookid=unescape(arr[2]);
		ifnew=0;
	}
	else{
	    var Days = 900;
	    var exp  = new Date();
	    exp.setTime(exp.getTime() + Days*24*60*60*1000);
	    document.cookie = cname + "="+cookid+";expires=" + exp.toGMTString();
	}
	EallAjaxFun("/servlet/apple.login.json?action=cook&cookid="+cookid+"&ifnew="+ifnew,function(){});
	//alert(cookid);
}