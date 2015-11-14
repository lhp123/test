var ClientDownLoadTs_ajaxIsopents01 = function() {

	var opts = {
		clientAddress : '',
		ists : ''
	};

	var init = function(options) {
		$.extend(opts, options);

		var phonetype = navigator.userAgent;
		var visitdate = localStorage["visitdate"];
		var timer;
		var sevenday = 604800000;
		var today = new Date();

		if (/zmobile/.test(phonetype)) {

		} else {
			if ((opts.ists == "1" && visitdate == null)
					|| (opts.ists == "1" && today.getTime() - visitdate >= sevenday)) {
				localStorage["visitdate"] = today.getTime();
				if ((phonetype.match(/iPhone/i) || phonetype.match(/iPod/i))
						&& phonetype.match(/Safari/i)) {
					$("#iphonetype").css("height", document.body.scrollHeight);
					$("#iphonetype").show();
				}

				if (phonetype.match(/Android/i)) {
					$("#androidtype").show();
				}

				if (($("#iphonetype").css("display")) == "-webkit-box"
						|| ($("#iphonetype").css("display")) == "block") {
					timer = window.setTimeout(function() {
						$("#iphonetype").hide()
					}, 10000);
				}

				if (($("#androidtype").css("display")) == "-webkit-box"
						|| ($("#androidtype").css("display")) == "block") {
					timer = window.setTimeout(function() {
						$("#androidtype").hide()
					}, 10000);
				}
				// }

				$(".install").bind('click', function(e) {
					e = window.event || arguments.callee.caller.arguments[0];
					if (e && e.stopPropagation) {
						e.stopPropagation();
					} else {
						window.event.cancelBubble = true;
					}
					clearTimeout(timer);
					$("#androidtype").hide();
					location.href = opts.clientAddress;
				});

				$(".ClientDownLoadTs_ajaxIsopents01-d1_c1 .z3g-alertWindow").bind('click', function() {
					clearTimeout(timer);
					$(".ClientDownLoadTs_ajaxIsopents01-d1_c1 .z3g-alertWindow").hide();
				});

				$("#z3g-alertWindow").on('load', function() {
					if (window.myScroll) {
						window.myScroll.refresh();
					}
				});
			}
		}
	};
	return {
		init : init
	}

}();sh();
					}
				});
			}
		}
	};
	return {
		init : init
	}

}();	}

}();