(function() {
	var m, h = {},
	q, c, f, s, r, a, e, k, o, g;
	n();
	function p() {
		J.get({
			url: "/m/getfylist.php?action=indextjlist",
			headers: {
				"X-TW-HAR": "HTML"
			},
			cache: false,
			onSuccess: function(u) {
				if (u.replace(/\s/ig, "") == "") {
					J.g("recommend").html("");
					return;
				}
				if (J.g("recommend") && J.g("recommend").getStyle("display") == "none") {
					J.g("recommend").setStyle({
						display: "block"
					});
				}
				J.g("recContent").html(u);
				r.refresh();
				var t;
				if (t = J.g("recContent").s(".Gr").eq(0)) {
					m = parseInt(t.attr("count"));
					if (m > 10) {
						b();
						J.g("recMore").show();
					} else {
						J.g("recMore").hide();
					}
					if (m > 100) {
						m = 100;
					}
				}
			}
		});
	}
	function n() {
		
		//e = J.g("cityname");
		//alert(4);
		//k = e.html();
		//o = e.attr("tag");
		//a = e.attr("listUrl");
		//if (localStorage.current_city) {
			//e ? localStorage.current_city = k: false;
		//}
		J.g("result").setStyle({
			display: "none"
		});
		i();
		l();
		T.autocomplate(J.s(".I").eq(0).attr("pagename"), "search", "searchInput");
		T.toTop(20);
		r = new T.lazyLoad();
		//if (g = J.s(".I").eq(0).attr("pagename")) {
			//d(g);
		//}
		t = "anjuke";
			w = true;
			p();
	}
	function d(v) {
		alert(v);
		var u, t, w = false;
		switch (v) {
		case "Anjuke_Home":
			t = "anjuke";
			w = true;
			p();
			break;
		case "Xinpan_Home":
			t = "xinfang";
			break;
		case "Fangyuan_Home":
			t = "xinfang";
			break;
		case "Rental_Home":
			t = "haozu";
			p();
			break;
		} (function() {
			if (w) {
				J.ui.tipfavorit();
			}
			u = J.ui.appdownload(t);
			u && u.show();
		}.require(["ui.appdownload", "ui.favorit"]));
	}
	function b() {
		h.page = parseInt(h.page || 2);
		q = J.g("recMore"),
		c = q && q.s("span").eq(0);
		q && q.on("click",
		function() {
			c && c.html("加载中...");
			c && c.addClass("loading");
			T.trackEvent("track_home_more_recomm");
			J.get({
				url: "/moblie/fylist.php",
				data: h,
				cache: false,
				headers: {
					"X-TW-HAR": "HTML"
				},
				onSuccess: function(u) {
					if (u == "") {
						q && q.hide();
					}
					h.page++;
					var v = J.create("div");
					v.html(u).appendTo("recContent");
					var t = J.g("recContent").s(".Gr");
					if ((m = t.eq(t.length - 1).attr("count")) > 100) {
						m = 100;
					}
					j(h.page, c, q);
					r.refresh();
				},
				onFailure: function() {
					c && c.html("加载失败");
					setTimeout(function() {
						c && c.html("更多推荐");
					},
					2000);
				}
			});
		});
		if (m < 10) {
			q && q.hide();
		}
	}
	function j(u, w, v) {
		var t;
		if (m % 10 == 0 && m > 10) {
			t = m / 10;
		} else {
			if (m % 10 == 0 && m <= 10) {
				t = 0;
			} else {
				t = m / 10 + 1;
			}
		}
		if (u <= t) {
			w.html("更多推荐");
			w.removeClass("loading");
		} else {
			if (u > t) {
				v.hide();
			}
		}
	}
	function i() {
		J.g("round") && J.g("round").on("click",
		function() {
			T.trackEvent(J.g("round").attr("t-event"));
			w();
		});
		function w() {
			if (f) {
				var y = {};
				y.coords = {
					latitude: f,
					longitude: s
				};
				u(y);
			} else {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(u, t);
				} else {
					x("dingwei");
				}
			}
		}
		function v(A, y) {
			var B = new BMap.Geocoder();
			var z = new BMap.Point(y, A);
			B.getLocation(z,
			function(D) {
				var E = D.addressComponents;
				if (E) {
					var C = E.street;
					try {
						localStorage.GPS_location = C;
					} catch(F) {}
				}
			});
		}
		function u(y) {
			f = y.coords.latitude;
			s = y.coords.longitude;
			J.get({
				url: "/location/latlng2City/" + f + "/" + s + "/",
				type: "json",
				onSuccess: function(z) {
					J.load("http://api.map.baidu.com/getscript?v=1.5&ak=AB8715ae10c67feb78fea33787b1f974&services=", "js",
					function() {
						v(f, s);
						x(z);
					});
				}
			});
		}
		function t(y) {
			x("dingwei");
		}
		function x(A) {
			if (A.city) {
				var B = A.city.name,
				z, y = A.city.alias;
			}
			if (A === "dingwei") {
				z = '<div class="desk">';
				z += '<div class="title">仍无法定位当前位置，建议查看目前所有房源</div>';
				z += '<div class="button">';
				z += '<a class="d3a" id="content" href="/' + o + a + '">查看所有房源</a>';
				z += '<a href="javascript:location.reload();">取消</a>';
				z += "</div>";
				z += "</div>";
			} else {
				if (A.status == "ok") {
					if (B == k) {
						location.href = "/" + o + a + "?lat=" + f + "&lng=" + s + "";
						return;
					} else {
						z = '<div class="desk">';
						z += '<div class="title">当前选择的城市是' + k + "，附近功能不可用，您可以选择</div>";
						z += '<div class="button">';
						z += '<a href="/' + y + a + "?lat=" + f + "&lng=" + s + '">切换至' + B + "</a>";
						z += '<a class="d3a" href="/' + o + a + '">去' + k + "区域</a>";
						z += " </div>";
						z += "</div>";
					}
				} else {
					if (A.status == "error") {
						z = '<div class="desk">';
						z += '<div class="title">当前选择的城市还未开通</div>';
						z += '<div class="button">';
						z += '<a href="javascript:location.reload();">确定</a>';
						z += " </div>";
						z += "</div>";
					}
				}
			}
			J.g("result").html(z).show().s("a").each(function(D, C) {
				C.on("click",
				function(E) {
					J.g("result").hide();
					J.g("index_drop").hide();
				});
			});
			J.g("index_drop") && J.g("index_drop").setStyle({
				display: "block"
			});
		}
	}
	function l() {
		J.g("areaMore") && J.g("areaMore").on("click",
		function(u, t) {
			J.g("area").s(".u1").each(function(x, w) {
				w.removeClass("u1");
			});
			J.g("areaMore").remove();
		});
		J.g("priceMore") && J.g("priceMore").on("click",
		function(u, t) {
			J.g("price").s(".u1").each(function(v, w) {
				w.removeClass("u1");
			});
			J.g("priceMore").remove();
		});
		J.g("pcPage") && J.g("pcPage").on("click",
		function() {
			T.trackEvent(J.g("pcPage").attr("t-event"));
			setTimeout(function() {
				location.href = J.g("pcPage").attr("link");
			},
			500);
		});
	}
} ());