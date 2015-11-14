(function(k) {
	var e = {},
	v = document,
	t = J.site.info,
	f = t.cityAlias || "sh",
	m, n, l, g, a = 0; (function() {
		window.addEventListener("load",
		function() {
			if (!J.g("home_app_content") && !k.scrollY) {
				k.scrollTo(0, 1);
			}
		});
	})();
	function x(z) {
		var A = (z && z.offsetY) || 100;
		function w(C) {
			var F = C.attr("data-src"),
			E = F.split("/").pop().match(/\d+x\d+/g);
			if (u = C.attr("src")) {
				C.on("error",
				function() {
					C.attr("src", u);
				});
			}
			if (!E) {
				C.attr("src", F).attr("data-src", "");
			} else {
				var B = parseInt(C.getStyle("width")),
				D = parseInt(C.getStyle("height"));
				if (B.devicePixelRatio && B.devicePixelRatio != 1) {
					B = parseInt(B * B.devicePixelRatio);
					D = parseInt(D * B.devicePixelRatio);
				}
				if (B && D) {
					F = F.replace(E, B + "x" + D);
				}
				C.attr("src", F).attr("data-src", "");
			}
		}
		function d(C) {
			var B = [],
			D = k.scrollY + k.innerHeight + A;
			J.g(v).s("img").each(function(F, E) {
				if (E.offset().y < D) {
					if (!E.attr("data-src")) {
						return;
					}
					w(E);
					return;
				}
			});
		}
		d();
		this.refresh = d;
		J.g(v).on("scroll", d);
	}
	function o(z, A) {
		var w = "http://api.anjuke.com/common/cookie/add/guid/",
		d;
		w += J.getCookie(J.site.cookies.guid);
		w += "?" + z + "=" + A;
		d = new Image();
		d.src = w;
	}
	function y(z) {
		var w = z ? "margin-bottom:" + z + "px": "",
		d = J.create("a", {
			id: "go_top",
			"class": "top",
			style: "display:none;" + w,
			onclick: 'window.scrollTo(0,0); this.style.display="none";'
		});
		d.appendTo(J.g("body"));
		J.g(v).on("touchmove",
		function() {
			if (document.body.scrollTop > window.screen.availHeight) {
				d && d.setStyle({
					display: "block"
				});
			} else {
				d && d.setStyle({
					display: "none"
				});
			}
		});
	}
	function s(w, C, d) {
		var B, A;
		switch (w) {
		case "Anjuke_Home":
		case "Anjuke_Prop_List":
			B = "sale";
			A = "anjuke";
			break;
		case "Fangyuan_Home":
		case "Xinfang_Fangyuan_List":
			B = "fang";
			A = "xinfang";
			break;
		case "Xinpan_Home":
		case "Xinfang_Loupan_List":
			B = "loupan";
			A = "xinfang";
			break;
		case "Rental_Home":
		case "Rent_List":
			B = "rent";
			A = "rent";
			break;
		default:
			break;
		}
		var z = J.ui.searchpage({
			url: ("/" + J.site.info.cityAlias + "/" + A + "/suggest/"),
			isFocus: true,
			onCancel: function() {
				z.hidePage();
				J.s(".sousuo").eq(0).setStyle({
					display: "block"
				});
				document.getElementById("list_search").value="";
				location.href = murl+"fylist.php";
				e.trackEvent(w + "_TapCancel");
			},
			onSearch: function() {
				e.trackEvent(w + "_TapSearch");
			},
			onTapEnter: function() {
				e.trackEvent(w + "_TapEnter");
			},
			onTapList: function() {
				e.trackEvent(w + "_TapWords");
			},
			onTapHisList: function() {
				e.trackEvent(w + "_TapHistory");
			},
			onTapAction: function(D) {
				location.href = "fylist.php?mohu=" + D;
			}
		});
		J.g(d) && J.g(d).on("focus",
		function() {
			J.s(".sousuo").eq(0).setStyle({
				display: "none"
			});
			z.showPage();
		});
		J.g(C) && J.g(C).on("click",
		function() {
			J.s(".sousuo").eq(0).setStyle({
				display: "none"
			});
			z.showPage();
		});
		return z.hisArray();
	}
	function c() {
		if (!J.g("tel")) {
			return;
		}
		var d = J.g("tel");
		l = e.referrer;
		g = document.location.href;
		n = d.attr("phone");
		m = J.site.createGuid();
		d && d.on("click",
		function(D) {
			D.stop();
			var C;
			var w = J.g("phone_pop_drop");
			if (C = J.g("view_nowcall")) {
				var B = document.body.scrollHeight,
				A = document.documentElement.scrollHeight,
				z = B > A ? B: A;
				w.setStyle({
					height: z + "px",
					display: "block"
				});
				d.setStyle({
					display: "none"
				});
				C.setStyle({
					display: "block"
				});
				e.trackEvent(C.attr("data-track-open"));
				setTimeout(function() {
					C.addClass("animation");
					w.un("click");
					w.on("click",
					function(E) {
						E.stop();
						p();
						e.trackEvent(C.attr("data-track-close"));
					});
					C.un("click");
					C.on("click",
					function(E) {
						E.stop();
						p();
						e.trackEvent(C.attr("data-track-close"));
					});
					J.g("view_call").un("click");
					J.g("view_call").on("click",
					function(E) {
						E.stop();
						location.href = J.g("view_call").attr("href");
					});
				},
				100);
			} else {
				if (d.attr("phone-ext")) {
					alert("接通后, 需手工拨打分机号:" + d.attr("phone-ext"));
				}
				e.trackEvent(d.attr("data-track-soj"), '{"puid":"' + m + '","phone":"' + n + '"}');
				document.addEventListener("touchstart", b, false);
				window.addEventListener("popstate", b, n, m);
				location.href = d.attr("href");
			}
		});
	}
	function b() {
		var d = (new Date()).getTime() - a;
		a = 0;
		e.trackEvent(J.g("tel").attr("data-track-soj"), '{"pt":"' + d + '","puid":"' + m + '","phone":"' + n + '"}', g, l);
		document.removeEventListener("touchstart", b);
		window.removeEventListener("popstate", b);
	}
	function p() {
		J.g("view_nowcall").removeClass("animation");
		setTimeout(function() {
			J.g("view_nowcall").setStyle({
				display: "none"
			});
			J.g("tel").setStyle({
				display: "-webkit-box"
			});
		},
		400);
		J.g("phone_pop_drop").setStyle({
			display: "none"
		});
	}
	function h(d) {
		var B, C;
		if (J.g("list_pop_box_body")) {
			J.g("list_pop_box_body").remove();
		}
		var A = document.body.scrollHeight,
		z = document.documentElement.scrollHeight,
		w = A > z ? A: z;
		J.g("body").insertAfter(J.create("div", {
			"class": "F",
			id: "list_pop_box_body"
		}).html(J.g(d).html()));
		B = J.g("list_pop_box_body");
		C = J.g("list_filter_closed");
		J.g(d).remove();
		if (!J.g("drop_list")) {
			J.g("list_filter").insertAfter(J.create("div", {
				id: "drop_list"
			}));
			J.g("drop_list").addClass("e7");
		}
		J.g("list_filter_closed").setStyle({
			top: window.innerHeight / 2 + "px"
		});
		B.setStyle({
			display: "none"
		});
		B.on("click",
		function(D) {
			D.stop();
			r();
		});
		C.on("click",
		function(D) {
			D.stop();
			r();
		});
	}
	function r() {
		if (!J.g("list_filter") || !J.g("list_pop_box_body")) {
			return false;
		}
		var A = window.screen.height;
		var w = J.g("list_pop_box_body");
		var d = J.g("body");
		var z = J.g("list_filter");
		if (z.hasClass("es")) {
			e.trackEvent(J.g("list_filter_closed").attr("data-event"));
			z.removeClass("es");
			setTimeout(function() {
				J.s(".L").eq(0).removeClass("Gfscroll");
				w.setStyle({
					display: "none"
				});
				k.scrollTo(0, 1);
			},
			500);
		} else {
			document.getElementById("drop_list").addEventListener("touchmove",
			function(B) {
				B.preventDefault();
			});
			J.s(".L").eq(0).addClass("Gfscroll").setStyle({
				height: window.innerHeight + "px"
			});
			w.setStyle({
				display: "block"
			});
			setTimeout(function() {
				z.addClass("es");
			},
			100);
		}
	}
	function j() {}
	function q(w, d) {
		J.logger.trackEvent({
			site: "m_anjuke",
			page: w,
			customparam: d
		});
	}
	function i(w, d) {
		J.logger.trackEvent({
			site: "m_anjuke-npv",
			page: w,
			customparam: d
		});
	}
	J.mix(e, {
		lazyLoad: x,
		setCookie: o,
		trackSpeed: j,
		track: q,
		trackEvent: i,
		toTop: y,
		autocomplate: s,
		filterPopBox: h,
		slidePopBox: r,
		bindMobile: c
	});
	k.T = e;
	J.ready(function() {
		var d = J.g("body").attr("data-page"),
		w;
		if (d.match(/List/)) {
			if (!J.g("list_size")) {
				w = '{"rscount":0,"refresh":"1","less":"0"}';
			} else {
				if (J.g("list_size").attr("data-size") > 4) {
					w = '{"rscount":' + J.g("list_size").attr("data-size") + ',"refresh":"1"}';
				} else {
					w = '{"rscount":' + J.g("list_size").attr("data-size") + ',"refresh":"1","less":"0"}';
				}
			}
		} else {
			w = '{"refresh":"1"}';
		}
		q(d, w);
	});
})(J.W);