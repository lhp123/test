 $.post("action.php",{action:"getclause"},function(data){
		var datas = jQuery.parseJSON(data);
		
		if(datas.success==1){
			var imgs = jQuery.parseJSON(datas.img);
			
			if(imgs != undefined &&imgs.length>0){
				$("#content").attr("src",imgs[0].img);
			}
		}
	});