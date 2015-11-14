function ByID(obj){
	return document.getElementById(obj);
}
function IDIN(ID,value){
	ByID(ID).innerHTML=value;
}
var tmp="";
tmp+="<i>区域筛选</i>";
tmp+="<a href='javascript:void(0)' link='"+QYURL+"' class='e6b e5' tag='区域不限'>不限</a>";
for(i=0;i<re1.length;i++){
	tmp+="<div>";
	tmp+="<span link='javascript:void(0);' class='e4a'>"+re1[i].NAME+"</span>";
	tmp+="<div class='e3' data-event='Track_Sale_Filter_Area_Select'>";
	tmp+="<a href='javascript:void(0)' link='"+QYURL+"&rname="+re1[i].NAME+"&re1="+re1[i].NAME+"' class='e6b ' tag='"+re1[i].NAME+"' rel='region' id='hepingc'>不限</a>";
	for(j=0;j<re2.length;j++){
		if(re2[j].PID==re1[i].ID){
			tmp+="<a href='javascript:void(0)' link='"+QYURL+"&rname="+re2[j].NAME+"&re2="+re2[j].NAME+"' class='e6b ' tag='"+re1[i].NAME+"&nbsp;"+re2[j].NAME+"' id='hepingc-nanshi'>"+re2[j].NAME+"</a>";
		}
	}
	tmp+="<a>&nbsp</a>";
	tmp+="</div>";
	tmp+="</div>";
}
IDIN("list-area-div",tmp);







tmp="";
tmp+="<i>价格筛选</i>";
tmp+="<a href='javascript:void(0)' link='"+PURL+"' class='e6b e5' tag='价格不限'>不限</a>";
for(i=0;i<qj.length;i++){
	if(yewu =="mm"){

		if(qj[i].TYPE=="价格区间"){

			tmp+="<a href='javascript:void(0)' link='"+PURL+"&pname="+qj[i].NAME+"&price="+qj[i].DOWN+"_"+qj[i].UP+"' class='e6b' tag='"+qj[i].NAME+"' up='50' lw='0'>"+qj[i].NAME+"</a>";

		}

	}else if(yewu =="zl"){

		

		if(qj[i].TYPE=="租赁价格区间"){

			tmp+="<a href='javascript:void(0)' link='"+PURL+"&pname="+qj[i].NAME+"&price="+qj[i].DOWN+"_"+qj[i].UP+"' class='e6b' tag='"+qj[i].NAME+"' up='50' lw='0'>"+qj[i].NAME+"</a>";

		}

	}else if(yewu == "xf"){

		

		if(qj[i].TYPE=="价格区间"){

			tmp+="<a href='javascript:void(0)' link='"+PURL+"&pname="+qj[i].NAME+"&price="+qj[i].DOWN+"_"+qj[i].UP+"' class='e6b' tag='"+qj[i].NAME+"' up='50' lw='0'>"+qj[i].NAME+"</a>";

		}

	}

}
tmp+="";

IDIN("list-price-div",tmp);





tmp="";
tmp+="<i>户型筛选</i>";
tmp+="<a href='javascript:void(0)' link='"+HURL+"' class='e6b e5' tag='户型不限'>不限</a>";
tmp+="<a href='javascript:void(0)' link='"+HURL+"&hname=一室&h_shi=1' class='e6b' tag='一室' up='50' lw='0'>一室</a>";
tmp+="<a href='javascript:void(0)' link='"+HURL+"&hname=二室&h_shi=2' class='e6b' tag='一室' up='50' lw='0'>二室</a>";
tmp+="<a href='javascript:void(0)' link='"+HURL+"&hname=三室&h_shi=3' class='e6b' tag='一室' up='50' lw='0'>三室</a>";
tmp+="<a href='javascript:void(0)' link='"+HURL+"&hname=四室&h_shi=4' class='e6b' tag='一室' up='50' lw='0'>四室</a>";
tmp+="<a href='javascript:void(0)' link='"+HURL+"&hname=五室&h_shi=5' class='e6b' tag='一室' up='50' lw='0'>五室</a>";
tmp+="<a href='javascript:void(0)' link='"+HURL+"&hname=五室以上&h_shi=6' class='e6b' tag='一室' up='50' lw='0'>五室以上</a>";
tmp+="";
IDIN("list-housetype-div",tmp);








tmp="";
tmp+="<i>标签筛选</i>";
for(j=0;j<lab.length;j++){
tmp+="<a href='javascript:void(0)' link='"+LURL+"&lname="+lab[j].NAME+"' class='e6b e5' tag='标签不限'>不限</a>";

}

tmp+="";
IDIN("list-labtype-div",tmp);

function noBarsOnTouchScreen(arg)
{
  var elem, tx, ty;

  if('ontouchstart' in document.documentElement ) {
          if (elem = document.getElementById(arg)) {
              elem.style.overflow = 'hidden';
              elem.ontouchstart = ts;
              elem.ontouchmove = tm;
          }
  }

  function ts( e )
  {
    var tch;

    if(  e.touches.length == 1 )
    {
      e.stopPropagation();
      tch = e.touches[ 0 ];
      tx = tch.pageX;
      ty = tch.pageY;
    }
  }

  function tm( e )
  {
    var tch;

    if(  e.touches.length == 1 )
    {
      e.preventDefault();
      e.stopPropagation();
      tch = e.touches[ 0 ];
      this.scrollTop +=  ty - tch.pageY;
      ty = tch.pageY;
    }
  }
}
