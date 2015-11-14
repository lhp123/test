(function() {
	var g = {
		Rent_View: function() {
			var l = J.g("Rent_View_C");
			T.setCookie("touchweb_viewed_rentids", l.attr("ctid") + "-" + l.attr("ppc"));
			J.get("/" + J.site.info.cityAlias + "/rent/click/" + l.attr("ppc") + "?guid=" + J.getCookie("aQQ_ajkguid") + "&isauction=" + l.attr("fyisauction"));
		},
		Prop_View: function() {
			var l = J.g("Prop_View_C"),
			n = l.attr("fyid"),
			m = l.attr("fyisauction");
			J.get("/" + J.site.info.cityAlias + "/prop/click/" + n + "?guid=" + J.getCookie("aQQ_ajkguid") + "&fixguid=" + J.site.fixGUID + "&isnew=" + J.site.info.isNew + "&isauction=" + m);
			T.setCookie("touchweb_viewed_propids", l.attr("ctid") + "-" + n);
		},
		TuanGou_View: function() {
			b("Track_TuanView_Sign");
		},
		Fang_View: function() {
			d();
			h();
			var l = J.g("lookpic");
			l && l.on("click",
			function() {
				l.addClass("cutout");
				l.up(0).addClass("cutout");
				J.s(".posnum").each(function(n, m) {
					m.removeClass("cutout");
					m.s("img").each(function(o, p) {
						p.attr("src", p.attr("click-src"));
					});
				});
			});
		},
		Loupan_View: function() {
			b("Track_LoupanView_Sign");
			f();
		}
	};
	function j() {
		if (!J.g("swipe_default")) { (function() {
				e();
			}.require(["touch.swipe"]));
		}
		if (J.g("baiduMap")) {
			c();
		}
		var m = new T.lazyLoad({
			offsetY: 300
		});
		if (rentRec = J.g("recomm")) {
			J.get({
				url: location.pathname,
				cache: false,
				headers: {
					"X-TW-HAR": "HTML"
				},
				type: "json",
				timeout: 15000,
				onSuccess: function(o) {
					if (o.replace(/\s/ig, "") == "") {
						return;
					}
					if (J.g("recomm") && J.g("recomm").getStyle("display") == "none") {
						J.g("recomm").setStyle({
							display: "block"
						});
					}
					var n = J.g("Rec_content");
					n.html(o);
					m.refresh();
				}
			});
		}
		if (J.g("ajk_disc")) {
			window.addEventListener("orientationchange",
			function() {
				k();
			});
			k();
		}
		//T.toTop();
		T.bindMobile();
		var l = J.g("pageInit").attr("pageName");
		g[l]();
	}
	j();
	function c() {
		var s, q = J.g("baiduMap"),
		o = parseInt(q.getStyle("width")) * window.devicePixelRatio,
		m = 197 * window.devicePixelRatio,
		r = q.attr("lat"),
		n = q.attr("lng"),
		l = q.attr("address"),
		p = q.attr("prefix");
		o = o > 1024 ? 1024 : o;
		m = m > 1024 ? 1024 : m;
		s = "http://api.map.baidu.com/staticimage?center=" + n + "," + r + "&zoom=18&markers=" + n + "," + r + "&width=" + o + "&height=" + m + "&markerStyles=-1," + p + "/touch/img/marker.png";
		J.g("baiduMap").html("<img class='mapimg' data-src='" + s + "'>");
	}
	function e() {
		i(0);
		var m = J.g("swipe").get(),
		l = J.g("positions").s("em");
		mySwipe = Swipe(m, {
			callback: function(n, p) {
				var o = l.length;
				while (o--) {
					l.eq(o).attr("class", "");
				}
				l.eq(n).attr("class", "on");
				i(n);
			}
		});
	}
	function i(n) {
		var m = J.g("swipe").s("img").eq(n);
		if (m) {
			var q = m.attr("data-src-swipe");
			if (!q) {
				return;
			}
			var p = q.split("/").pop().match(/\d+x\d+/g);
			var l = parseInt(m.getStyle("width")),
			o = parseInt(m.getStyle("height"));
			if (window.devicePixelRatio && window.devicePixelRatio > 1) {
				l = parseInt(l * (window.devicePixelRatio - 0.5));
				o = parseInt(o * (window.devicePixelRatio - 0.5));
			}
			q = q.replace(p, l + "x" + o);
			q && m.attr("src", q).attr("data-src-swipe", "");
		}
	}
	function k() {
		var n = J.g("ajk_disc"),
		o = J.g("ajk_disc_con"),
		l = J.g("showUp"),
		m = J.g("showDown");
		if (parseInt(o.getStyle("height")) > 150) {
			l.setStyle({
				display: "inline-block"
			});
			m.setStyle({
				display: "none"
			});
			n.addClass("c2m");
			l && l.un("click").on("click",
			function() {
				n.removeClass("c2m");
				l.setStyle({
					display: "none"
				});
				m.setStyle({
					display: "inline-block"
				});
			});
			m && m.un("click").on("click",
			function() {
				n.addClass("c2m");
				l.setStyle({
					display: "inline-block"
				});
				m.setStyle({
					display: "none"
				});
				window.scrollTo(0, n.offset().y - 40);
			});
		} else {
			l.setStyle({
				display: "none"
			});
			m.setStyle({
				display: "none"
			});
		}
	}
	function b(l) {
		var m = J.g("tg_tuangou_tele");
		if (!m) {
			return;
		}
		m.on("click",
		function() {
			J.g("tg_phoneText").get().blur();
			var n = J.g("tg_phoneText").val().replace(/(^\s*)|(\s*$)/g, "");
			if (n == "") {
				alert("请输入手机号！");
				return false;
			} else {
				if (/^1(3|5|8|4)[0-9]{9}$/.test(n)) {
					var o = J.g("error_message_text").attr("tgid");
					J.g("error_message_text").setStyle({
						display: "none"
					});
					J.get({
						url: "/city/tuangouJoin/?phone=" + n + "&tuangou_id=" + o + "",
						type: "json",
						onSuccess: function(p) {
							a(p, l);
						}
					});
				} else {
					J.g("error_message_text").setStyle({
						display: "inline-block"
					});
				}
			}
		});
		J.g("tg_phoneText").on("focus",
		function() {
			this.value = "";
			J.g("error_message_text").setStyle({
				display: "none"
			});
		});
	}
	function a(m, p) {
		var q = J.g("join_num_view"),
		l = q.attr("data-join"),
		r = J.g("tg_pop_box"),
		n = J.g("tg_view_pop_up_box");
		if (m.status === "true") {
			T.trackEvent(p);
			var o = parseInt(l) + 1;
			q.html(o + "人已报名");
			q.attr("data-join", o);
			n.html("报名成功!");
			n.removeClass("failed");
			n.addClass("success");
		} else {
			if (m.error_message == "已参加") {
				n.removeClass("failed");
				n.addClass("success");
			} else {
				n.removeClass("success");
				n.addClass("failed");
			}
			n.html(m.error_message);
		}
		var t = (parseInt(document.body.clientWidth) - 100) / 2 + "px";
		var s = "45%";
		r.setStyle({
			left: t
		});
		r.setStyle({
			top: s
		});
		r.setStyle({
			display: "inline-block"
		});
		setTimeout(function() {
			J.g("tg_phoneText").val("");
			r.setStyle({
				display: "none"
			});
		},
		2000);
	}
	function d() {
		J.g("floorW") && J.g("floorW").s(".l5").each(function(m, l) {
			l.on("click",
			function() {
				if (l.hasClass("lon")) {
					var n = J.g("floorW").attr("tag"),
					p = J.g("floorW").attr("num");
					J.g(this).removeClass("lon");
					J.g("sellP") && J.g("sellP").html(n);
					J.g("sellN") && J.g("sellN").html(p);
				} else {
					T.trackEvent("Track_fang_floor_select");
					J.g("floorW").s(".l5").each(function(s, r) {
						r.removeClass("lon");
					});
					J.g(this).addClass("lon");
					var o = J.g(this).attr("tag"),
					q = J.g(this).attr("num");
					J.g("sellP") && J.g("sellP").html(o);
					J.g("sellN") && J.g("sellN").html(q);
				}
			});
		});
		J.g("lcMore") && J.g("lcMore").on("click",
		function() {
			T.trackEvent("Track_fang_floor_more");
			J.s(".l4").each(function(m, l) {
				l.removeClass("l4");
			});
			J.g(this).remove();
		});
	}
	function h() {
		var n = J.g("sellPoint") && J.g("sellPoint").s("dl").length,
		l = J.g("sell_open"),
		m = J.g("sell_close");
		if (n && n > 3) {
			l.show();
		}
		l && l.on("click",
		function() {
			J.g("sellPoint").s("dl").each(function(p, o) {
				l.hide();
				if (p > 2) {
					o.setStyle({
						display: "block"
					});
				}
				m.show();
			});
		});
		m && m.on("click",
		function() {
			J.g("sellPoint").s("dl").each(function(p, o) {
				m.hide();
				if (p > 2) {
					o.setStyle({
						display: "none"
					});
				}
				l.show();
			});
		});
	}
	function f() {
		if (!J.g("lp_introduction")) {
			return;
		}
		var m = J.g("lp_introduction"),
		l = J.g("lp_open_close"),
		n = J.g("lp_intro_frame");
		if (parseInt(m.getStyle("height")) > 82) {
			l.show();
			J.un(l, "click");
			l.on("click",
			function() {
				if (l.hasClass("c2z")) {
					l.removeClass("c2z");
					l.addClass("c2s");
					l.html("收起");
					n.removeClass("max_h");
				} else {
					l.removeClass("c2s");
					l.addClass("c2z");
					l.html("展开");
					n.addClass("max_h");
					window.scrollTo(0, m.offset().y - 40);
				}
			});
		} else {
			l.hide();
		}
	}
})();