
(function() {
	var A, j, q, D, z, y = J.site.info,
	i = y.cityAlias || "sh",
	f = false;
	var o = {
		page: -1,
		url: DATA_URL
	};
	function u() {
		A = new T.lazyLoad({
			offsetY: 300
		});
		D = "";
		q = true;
		j = t(location.href);
		j.page = parseInt(j.page || -1);
		j.url=DATA_URL;
		g();
		p();
		c();
		r();
		s();
		d();
		a();
		m();
		if (j.q) {
			b();
		}
		T.toTop(20);
		z = T.autocomplate(J.s(".list").eq(0).attr("pagename"), "", "list_search");
	}
	u();
	function b() {
		if (J.g("list_size") && J.g("list_size").attr("data-size") == 0 || !J.g("list_size")) {
			J.g("likeNo") && J.g("likeNo").show();
			J.g("likeFew") && J.g("likeFew").hide();
			J.g("like_list") && J.g("like_list").show();
		} else {
			if (J.g("list_size") && J.g("list_size").attr("data-size") > 0 && J.g("list_size").attr("data-size") < 4 || !J.g("list_size")) {
				J.g("likeFew") && J.g("likeFew").show();
				J.g("likeNo") && J.g("likeNo").hide();
				J.g("like_list") && J.g("like_list").show();
			} else {
				if (J.g("list_size") && J.g("list_size").attr("data-size") >= 4) {
					J.g("likeFew") && J.g("likeFew").hide();
					J.g("likeNo") && J.g("likeNo").hide();
					J.g("like_list") && J.g("like_list").hide();
				}
			}
		}
	}
	function p() {
		window.onscroll = n;
		n();
	}
	function n() {
		var G = window.pageYOffset;
		var H = window.innerHeight;//614
		var F = document.body.scrollHeight;//1165
		
		if (J.g("list_filter").hasClass("es")) {
			return;
		}
		setTimeout(function() {
			if ((F - (G + H) < 100) && f) {
				if(j.page==10){
					//C();
					//return;
				}
				//alert("ok");
				q = false;//&& J.g("pro_list").s(".Gb").length >= 4
				if (J.g("pro_list") && J.g("pro_list").html().replace(/\s/ig, "") != "" ) {
					j.page++;
					function K() {
						e(j,
						function(L) {
							D = L;
							w();
						},
						function() {
							setTimeout(K, 1000);
						});
					}
					K();
				}
			}
		},
		500);
	}
	function e(H, F, G) {
		f = false;
		fetchError = false;
		if(H.url.indexOf("?")>0){
			H.url=H.url+"&page="+H.page;
		}
		else{
			H.url=H.url+"?page="+H.page;
		}
		H.url=H.url+"&m="+Math.random();
		J.get({
			url: H.url,
			data: H,
			cache: false,
			timeout: 15000,
			headers: {
				"X-TW-HAR": "HTML"
			},
			onSuccess: function(I) {
				f = true;
				F && F(I);
			},
			onFailure: function() {
				fetchError = true;
				//G && G();
			}
		});
	}
	function B() {
		if (D.replace(/\s/ig, "") != "") {
			var F = J.create("div");
			F.html(D).appendTo("like_list");
			A.refresh();
			D = "";
			q = true;
			T.track(J.s("body").eq(0).attr("data-page"), '{"refresh":"1","less":"0"}');
		}
	}
	function w() {
		if (D.replace(/\s/ig, "") != "") {
			var F = J.create("div");
			F.html(D).appendTo("pro_list");
			A.refresh();
			D = "";
			q = true;
			T.track(J.s("body").eq(0).attr("data-page"), '{"rscount":"' + J.s("body").eq(0).s(".Gb").length + '","refresh":"1"}');
		} else {
			C();
		}
		h();
	}
	function C() {
		J.g("list_lookmore").hide();
	}
	function g() {
		if (J.g("pro_list").s(".Gb").length < 10 && !J.g("like_list")) {
			J.g("list_lookmore").hide();
			if (J.g("pro_list").html().replace(/\s/ig, "") == "" || J.g("list_size").attr("data-size") == 0) {
				if (j.q) {
					J.g("list_search_nodate").show();
				} else {
					J.g("list_nodata").show();
				}
			} else {
				J.g("list_nodata").hide();
				J.g("list_search_nodate").hide();
			}
		} else {
			f = true;
			J.g("list_lookmore").show();
			J.g("list_nodata").hide();
			J.g("list_search_nodate").hide();
		}
	}
	function c() {
		if (j.q || j.q == "") {
			v(j.q);
		} else {
			if (j.loupanId) {
				J.g("list_area").addClass("s2");
				J.g("list_area").down(0).html(J.g("list_title").attr("data-title"));
			} else {
				if (j.lat && j.lng) {
					J.g("list_title").html("附近房源");
				} else {
					if (j.comm_id) {
						J.g("list_area").addClass("s2");
						J.g("list_area").down(0).html(J.g("commName").attr("tag"));
					}
				}
			}
		}
	}
	function r() {
		T.filterPopBox("list_pop_box");
	}
	function s() {
		if (J.g("list-area-div")) {
			var F = J.g("list-area-div").s(".e5").eq(0);
			if (F.attr("tag") != "区域不限") {
				if (F.up(1).s(".e4a").length > 0) {
					F.up(0).addClass("e3s");
					F.up(1).s(".e4a").eq(0).addClass("e4b");
				}
			}
		}
	}
	function d() {
		noBarsOnTouchScreen("list_screenPop");
		if (J.g("list_area")) {
			if (!J.g("list_area").hasClass("s2")) {
				J.g("list_area").on("click",
				function(F) {
					T.trackEvent(J.g("list_area").attr("data-event"));
					T.slidePopBox();
					E("list-area-div");
				});
			}
		}
		if (J.g("list_price")) {
			J.g("list_price").on("click",
			function(F) {
				T.trackEvent(J.g("list_price").attr("data-event"));
				T.slidePopBox();
				E("list-price-div");

			});
		}
		if (J.g("list_housetype")) {
			J.g("list_housetype").on("click",
			function(F) {
				T.trackEvent(J.g("list_housetype").attr("data-event"));
				T.slidePopBox();
				E("list-housetype-div");
			});
		}
		if (J.g("list_keyword")) {
			if (j.q == "") {
				J.g("list_keyword").on("click",
				function(F) {
					T.trackEvent(J.g("list_area").attr("data-event"));
					T.slidePopBox();
					E("list-area-div");
				});
			} else {
				J.g("list_keyword").on("click", x);
			}
		}
	}
	function E(F) {
		if (J.s(".e2s").length > 0) {
			J.s(".e2s").eq(0).removeClass("e2s");
		}
		J.g(F).addClass("e2s");
		if (J.g(F).s(".e5").length > 0) {
			var G = J.g(F).s(".e5").eq(0).offset().y;
			J.g("list_screenPop").get().scrollTop = G - window.innerHeight / 2;
		}
	}
	function a() {
		J.g("list_screenPop").on("click",
		function(F) {
			F.stop();
		});
		J.s(".e6b").each(function(G, F) {
			F.on("click",
			function(I) {
				I.stop();
				T.slidePopBox();
				var H = J.g(this).up(0).attr("data-event");
				T.trackEvent(H);
				setTimeout(function() {
					if (j.q || j.q == "") {
						location.href = F.attr("link") + "?q=" + j.q;
					} else {
						if (j.lat && j.lng) {
							location.href = F.attr("link") + "?lat=" + j.lat + "&lng=" + j.lng;
						} else {
							if (j.comm_id) {
								location.href = F.attr("link") + "?comm_id=" + j.comm_id;
							} else {
								location.href = F.attr("link");
							}
						}
					}
				},
				500);
			});
		});
	}
	function m() {
		J.s(".e4a").each(function(G, F) {
			F.on("click",
			function(H) {
				H.stop();
				if (F.up(0).s(".e3").eq(0).hasClass("e3s")) {
					F.up(0).s(".e3").eq(0).removeClass("e3s");
					F.removeClass("e4b");
				} else {
					if (J.g("list-area-div").s(".e3s").length > 0) {
						J.s(".e3s").eq(0).removeClass("e3s");
					}
					F.up(0).s(".e3").eq(0).addClass("e3s");
					if (J.g("list-area-div").s(".e4b").length > 0) {
						J.s(".e4b").eq(0).removeClass("e4b");
					}
					F.addClass("e4b");
				}
			});
		});
	}
	function x() {
		var H = J.g("list-history-div"),
		F = "<i>搜索历史</i>";
		var G = H.attr("data-page");
		J.each(z,
		function(K, I) {
			F += "<a href='/" + i + "/" + G + "?q=" + I + "'>" + I + "</a>";
		});
		H.html(F).s("a").each(function(K, I) {
			I.on("click",
			function(L) {
				L.stop();
				k(I.html());
				T.slidePopBox();
				location.href = I.attr("href");
			});
		});
		E("list-history-div");
		T.slidePopBox();
	}
	function k(I) {
		var F = J.g("list_area"),
		G = J.g("list_keyword"),
		H = J.g("list_search");
		if (I) {
			F.hide();
			G.show().s("span").eq(0).html(I);
		} else {
			F.show().down().html("区域不限");
			delete j.q;
			G.hide();
		}
		H.val(I);
	}
	function v(F) {
		J.g("list_area").hide().s(".areaid").eq(0).html("");
		J.g("list_keyword").show();
		if (F != "") {
			J.g("list_keyword").down().html(F);
		}
		J.g("list_search").up(0).show();
	}
	function l() {
		return location.href.indexOf("comm_id") != -1;
	}
	function h() {
		if (l()) {
			J.s(".b1b") && J.s(".b1b").each(function(G, F) {
				if (J.g("listHouse") && J.g("listHouse").attr("tag") != "1") {
					F.addClass("Gf1");
				}
			});
		}
	}
	function t(I) {
		var N = /^[^\?]+\?([\w\W]+)$/,
		L = /([^&=]+)=([\w\W]*?)(&|$)/g,
		H = N.exec(I),
		G = {};
		if (H && H[1]) {
			var K = H[1],
			F;
			while ((F = L.exec(K)) != null) {
				try {
					G[F[1]] = decodeURI(F[2]);
				} catch(M) {}
			}
		}
		return G;
	}
} ());