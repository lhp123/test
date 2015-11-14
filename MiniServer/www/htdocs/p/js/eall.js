function ByID(obj){
	return document.getElementById(obj);
}
function IDIN(ID,value){
	ByID(ID).innerHTML=value;
}
var tmp="";
tmp+="<a href='fy.html'>不限</a>";
for(i=0;i<re1.length;i++){
	tmp+="<a href='fylist.php?rname="+re1[i].NAME+"&re1="+re1[i].NAME+"'>"+re1[i].NAME+"</a>";
}
IDIN("area",tmp);

tmp="";
tmp+="<a href='fy.html'>不限</a>";
for(i=0;i<qj.length;i++){
	if(qj[i].TYPE=="价格区间"){
		tmp+="<a href='fylist.php?pname="+qj[i].NAME+"&price="+qj[i].DOWN+"_"+qj[i].UP+"'>"+qj[i].NAME+"</a>";
	}
}
IDIN("price",tmp);
IDIN("price",tmp);