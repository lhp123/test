J.add("ui"),
function(J) {
	function t(t) {
		function o() {
			var e = "margin-top: 6px;float: left;width: 28px;height: 31px;-webkit-background-size: 28px 31px;-moz-background-size: 28px 31px;background-size: 28px 31px;background-image: url(data:image/jpg;base64,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);",
			n = "float: left;margin: 10px 8px 0 4px;width:59px; height:59px; background-size:59px 59px;background-image:url(" + r.img + ")",
			i = "float: left;width: 130px;margin-top: 10px;",
			s = "float: right;margin: 24px 8px 0 0;border: #bbb solid 1px;color: #333;line-height: 30px;padding: 0 10px;text-align: center;font-weight: bold;border-radius: 3px;font-size: 15px;background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#dedede), color-stop(0.1,#fff));",
			o = "font-size: 16px;line-height: 25px;",
			u = "font-size: 13px;color: #5f5f5f;line-height: 30px;font-weight: bold;",
			a = "<div class='download_c' style='" + e + "' ></div><span style='" + n + "'></span><div style='" + i + "'><strong style='" + o + "'>" + r.title + "</strong><br/><span style='" + u + "'>\u66f4\u5feb\u6377\uff0c\u66f4\u7701\u6d41\u91cf</span><br/></div>",
			f = J.create("div", {
				id: "app_download_" + t,
				"class": "app_download",
				style: "height: 77px;background-color: #e5e6e7;background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fff), to(#e5e6e7));border-bottom: #d9d9d9 solid 1px;"
			}).html(a).hide();
			return r.isIos ? J.create("a", {
				href: "javascript:void(0);",
				style: s
			}).html("\u67e5\u770b").on("click",
			function() {
				T.trackEvent(r.track_ios),
				J.create("iframe", {
					src: r.app_link
				}).setStyle({
					width: "0px",
					height: "0px"
				}).appendTo("body"),
				setTimeout(function() {
					location.href = r.link_ios
				},
				400)
			}).appendTo(f) : J.create("span", {
				style: s
			}).html("\u6781\u901f\u4e0b\u8f7d").on("click",
			function() {
				T.trackEvent(r.track_android),
				setTimeout(function() {
					location.href = r.link_android
				},
				500)
			}).appendTo(f),
			f
		}
		function u() {
			i.s(".download_c").eq(0).on("click",
			function() {
				var e = r.isIos ? r.track_ios_close: r.track_android_close;
				T.trackEvent(e);
				try {
					localStorage["appclose" + t] = (new Date).getTime()
				} catch(n) {}
				l()
			})
		}
		function a() {
			i.hide()
		}
		function f() {
			i.show()
		}
		function l() {
			i.remove()
		}
		var n = {
			anjuke: {
				app_link: "openanjuke://",
				img: J.site.info.includePrefix + "/touch/img/down_anjuke.jpg",
				title: "\u5b89\u5c45\u5ba2App",
				link_android: "http://android.anjuke.com/getapkx.php?app=Anjuke&pm=b190&b190.apk",
				link_ios: "https://itunes.apple.com/cn/app/ju-ke-er-shou-fang-fang-jia/id415606289?mt=8",
				track_android: "track_home_android_download",
				track_android_close: "track_home_android_close",
				track_ios: "track_home_ios_download",
				track_ios_close: "track_home_ios_close"
			},
			haozu: {
				app_link: "openhaozu://",
				img: J.site.info.includePrefix + "/touch/img/down_haozu.jpg",
				title: "\u5b89\u5c45\u5ba2\u79df\u623fApp",
				link_android: "http://android.anjuke.com/getapkx.php?app=Haozu&pm=b190&b190.apk",
				link_ios: "https://itunes.apple.com/cn/app/hao-zu-zu-fang/id467586884?mt=8",
				track_android: "track_home_haozu_android_download",
				track_android_close: "track_home_haozu_android_close",
				track_ios: "track_home_haozug_ios_download",
				track_ios_close: "track_home_haozu_ios_close"
			},
			xinfang: {
				app_link: "opennewhouse://",
				img: J.site.info.includePrefix + "/touch/img/down_xinfang.jpg",
				title: "\u5b89\u5c45\u5ba2\u65b0\u623fApp",
				link_android: "http://android.anjuke.com/getapkx.php?app=Xinfang&pm=b190&b190.apk",
				link_ios: "https://itunes.apple.com/cn/app/an-ju-ke-xin-fang/id582908841?mt=8",
				track_android: "track_home_xinfang_android_download",
				track_android_close: "track_home_xinfang_android_close",
				track_ios: "track_home_xinfang_ios_download",
				track_ios_close: "track_home_xinfang_ios_close"
			}
		},
		r = J.mix(e, n[t] || {},
		!0),
		i,
		s = localStorage["appclose" + t];
		return s && (new Date).getTime() - parseInt(s) < r.expires || r.isIos && r.isChrome ? !1 : (i = o().appendTo(r.container), u(), {
			element: i,
			hide: a,
			show: f,
			remove: l
		})
	}
	var e = {
		container: "home_app_content",
		isIos: /iphone|ipad/gi.test(navigator.appVersion),
		isChrome: /CriOS/.test(navigator.userAgent),
		app_link: "",
		img: "",
		track_android: "",
		track_android_close: "",
		track_ios: "",
		track_ios_close: "",
		title: "",
		expires: 12096e5,
		link_android: "",
		link_ios: ""
	};
	J.ui.appdownload = t
} (J),
String.prototype.trim = function() {
	return this.replace(/(^[\s\t\xa0\u3000]+)|([\u3000\xa0\s\t]+$)/g, "")
},
function(J, e) {
	function n(n, r) {
		function x(e) {
			c.placeholder = e
		}
		function T() {
			return Math.floor(Math.random() * 16777216).toString(16)
		}
		function N() {
			function t() {
				J.g("body").first().insertBefore(v)
			}
			var e;
			v = J.create("div", {
				style: "position:absolute;z-index:10100"
			}).html('<div class="' + c.tpl + '" id="' + h + '" style="display:none; width:' + c.width + 'px"></div>'),
			c.boxTarget ? J.isFunction(c.boxTarget) && (e = c.boxTarget()) ? e.append(v) : (e = J.g(c.boxTarget)) ? e.append(v) : t() : t(),
			m = J.g(h)
		}
		function C() {
			var e = s.offset();
			v.setStyle({
				top: e.y + n.height() + c.offset.y + "px",
				left: e.x + c.offset.x + "px"
			})
		}
		function k() {
			J.on(n, J.ua.opera ? "keypress": "keydown", L),
			J.on(n, "keyup", A),
			J.on(n, "blur", O),
			J.on(n, "focus", M),
			J.on(window, "resize", C)
		}
		function L(e) {
			if (i) return;
			c.onKeyPress && c.onKeyPress(n);
			switch (e.keyCode) {
			case 27:
				n.val(a.trim()),
				K();
				break;
			case 9:
			case 13:
				if (u === -1) {
					K();
					return
				}
				R(null, u);
				break;
			case 38:
				z();
				break;
			case 40:
				W();
				break;
			default:
				return
			}
			e.preventDefault()
		}
		function A(e) {
			if (i) return;
			c.onKeyUp && c.onKeyUp(n);
			switch (e.keyCode) {
			case 38:
			case 40:
			case 13:
			case 27:
				return
			}
			if (y) return;
			n.val().trim() == "" && K(),
			clearTimeout(g),
			!E && (g = setTimeout(_, c.defer))
		}
		function O(t) {
			clearTimeout(g),
			clearInterval(b),
			c.onBlur && c.onBlur(t),
			J.on(e, "click",
			function() {
				E = !1,
				c.forceClear && (o == -1 ? (n.val(""), c.onForceClear && c.onForceClear(n)) : V(o)),
				K(),
				J.un(e, "click", arguments.callee)
			}),
			c.placeholder && n.val().trim() === "" && (c.toggleClass && n.removeClass(c.toggleClass), n.val(c.placeholder))
		}
		function M() {
			E = !0;
			if (i) return;
			c.onFocus && c.onFocus(n),
			c.placeholder == n.val().trim() && (n.val(""), c.toggleClass && n.addClass(c.toggleClass)),
			E && (b = setInterval(function() {
				a != n.val().trim() && !y && _()
			},
			30))
		}
		function _() {
			if (i || y) {
				y = !1;
				return
			}
			if (! (a = n.val().trim())) return;
			u = -1,
			X(u),
			H()
		}
		function P() {
			return encodeURIComponent(a.trim())
		}
		function H() {
			if (w) return;
			w = !0,
			S = c.params[c.query] = a.trim();
			if (c.source) {
				J.isFunction(c.source) ? c.source(c.params, F) : F(c.source);
				return
			}
			var e;
			if (c.cache && (e = f[P()])) return F(e, "c");
			J.get({
				url: c.url,
				type: "json",
				data: c.params,
				onSuccess: F
			})
		}
		function B(e) {
			var t = [];
			return J.isString(e) ? t: (J.each(e,
			function(e, n) {
				t.push(j(e, n))
			}), t)
		}
		function j(e, t) {
			var n = {};
			return J.isString(t) ? {
				k: e,
				v: t,
				l: t
			}: (n = c.dataMap ? c.dataMap(t) : t, n.v || (n.v = I(t)), n.k || (n.k = n.v), n.l || (n.l = n.v), n)
		}
		function F(e, t) {
			var r, i, s, a = n.val();
			w = !1,
			o = -1,
			t ? l = e: (e = c.dataKey && e[c.dataKey] || e.data || e, l = B(e)),
			c.onResult && c.onResult(n, l);
			if (!l || l.length === 0) {
				K();
				return
			}
			t || (f[P()] = l),
			m.empty(),
			J.each(l,
			function(e, n) {
				t || c.itemBuild && J.mix(n, c.itemBuild(n) || {}),
				i = c.filterHtml ? U(n.v) : n.v,
				i == a && (o = e),
				n.l && (r = J.create("div", {
					"class": u === e ? "ui_item ui_sel": "ui_item",
					title: i
				}).html(n.l).appendTo(m)).on("mouseover", q, e).on("click",
				function(e, t) {
					if (c.onItemClick && c.onItemClick(t, n, r) == 0) return;
					R(e, t)
				},
				e, !0, !0)
			}),
			$(),
			d = m.s("div")
		}
		function I(e) {
			var t;
			return J.each(e,
			function(e, n) {
				return t = n,
				!1
			}),
			t
		}
		function q(e, t) {
			d.each(function(e, t) {
				t.removeClass("ui_sel")
			}),
			d.eq(u = t).addClass("ui_sel")
		}
		function R(e, t) {
			e && e.stop(),
			o = t;
			var r, i;
			y = !0,
			J.isUndefined(t) || (i = l[t], J.mix(i, V(t) || {}), n.val(a = c.filterHtml ? U(i.v) : i.v)),
			K(),
			c.autoSubmit && (r = n.up("form")) && (c.placeholder == n.val().trim() && n.val(""), r && r.get().submit())
		}
		function U(e) {
			return e ? e.trim().replace(/<\/?[^>]*>/g, "") : ""
		}
		function z() {
			if (u <= 0) {
				d.eq(u).removeClass("ui_sel"),
				u = d.length,
				n.val(S);
				return
			}
			var e;
			y = !0,
			n.val(a = U((e = d.eq(--u).addClass("ui_sel")).html())),
			e.next() && e.next().removeClass("ui_sel") || d.eq(0).removeClass("ui_sel"),
			X(u)
		}
		function W() {
			if (!p || u === d.length - 1) {
				d.eq(u).removeClass("ui_sel"),
				u = -1,
				n.val(S);
				return
			}
			if (!p || u === d.length) u = -1;
			var e;
			y = !0,
			n.val(a = U((e = d.eq(++u).addClass("ui_sel")).html())),
			u > 0 && e.prev() && e.prev().removeClass("ui_sel") || d.eq(d.length - 1).removeClass("ui_sel"),
			X(u)
		}
		function X(e) {
			c.onChange && e != -1 && c.onChange(l[e])
		}
		function V(e) {
			return c.onSelect && e != -1 && c.onSelect(l[e])
		}
		function $() {
			u = -1,
			p || (m.show(), p = !0),
			C()
		}
		function K() {
			u = -1,
			y = !1,
			p && (m.empty().hide(), p = !1)
		}
		function Q() {
			i = !1
		}
		function G() {
			i = !0
		}
		function Y(e, t) {
			c.params = t ? e: J.mix(c.params, e, !0)
		}
		var i = !1,
		n = J.g(n),
		s,
		o = -1,
		u = -1,
		a = n.val().trim(),
		f = [],
		l = [],
		c,
		h,
		p = !1,
		d,
		v,
		m,
		g = null,
		y = !1,
		b = null,
		w,
		E = !1,
		S = "";
		return function() {
			n.attr("autocomplete", "off"),
			c = J.mix(t, r || {},
			!0),
			h = "Autocomplete_" + T(),
			s = c.offsetTarget ? J.isFunction(c.offsetTarget) ? c.offsetTarget() : J.g(c.offsetTarget) : n,
			c.width || (c.width = s.width() - 2),
			c.query = c.query || n.attr("name") || "q",
			a === "" && c.placeholder && (n.val(c.placeholder), c.toggleClass && n.removeClass(c.toggleClass)),
			N(),
			k()
		} (),
		{
			setParams: Y,
			setPlaceholder: x,
			enable: Q,
			disable: G,
			hide: K,
			show: $
		}
	}
	var t = {
		url: "/",
		dataKey: "",
		filterHtml: !0,
		autoSubmit: !0,
		forceClear: !1,
		defer: 100,
		width: 0,
		params: {},
		source: null,
		offset: {
			x: 0,
			y: -1
		},
		offsetTarget: null,
		boxTarget: null,
		query: "",
		placeholder: "",
		toggleClass: "",
		cache: !0,
		onForceClear: null,
		onItemClick: null,
		onResult: null,
		onChange: null,
		onSelect: null,
		onFoucs: null,
		onKeyPress: null,
		onBlur: null,
		onKeyUp: null,
		dataMap: null,
		itemBuild: null,
		tpl: "autocomplete_def"
	};
	J.dom.fn.autocomplete = function(e) {
		return new n(this.get(), e)
	},
	J.ui.autocomplete = n
} (J, document),
function(J) {
	function e(e) {
		function m(e) {
			if (e) {
				var t = "";
				e.p[0] ? t += "top:" + e.p[0] + "px;": t,
				e.p[1] ? t += "right:" + e.p[1] + "px;": t,
				e.p[2] ? t += "bottom:" + e.p[2] + "px;": t,
				e.p[3] ? t += "left:" + e.p[3] + "px;": t,
				J.create("div", {
					id: "tipBox",
					style: t + "position: fixed;z-index: 1001;padding: 10px 8px 6px 12px ; border-radius: 6px; min-height:60px;background-image: -webkit-gradient(linear,left top,left bottom, color-stop(0,#fff),color-stop(1,#e5e6e7))"
				}).html(e.tpl).appendTo(l.target || "body"),
				b(),
				T(),
				c = J.g("tipBox"),
				S()
			}
		}
		function g() {
			return y()
		}
		function y() {
			return localStorage ? localStorage.tip ? 1 : 0 : J.getCookie("tip")
		}
		function b() {
			if (localStorage) try {
				localStorage.tip = 1
			} catch(e) {} else J.setCookie("tip", "1", 365),
			J.setCookie()
		}
		function w() {
			return E() ? v[E()] : !1
		}
		function E() {
			var e = J.ua.ua;
			return e.match(/UCBrowser/i) ? e.match(/(?:Android)|(?:iPhone)/) + "UC" + e.match(/UCBrowser\/(\d)/)[1] : e.match(/MQQBrowser/i) ? e.match(/(?:Android)|(?:iPhone)/) + "QQ" + e.match(/MQQBrowser\/(\d)/)[1] : e.match(/Mozilla\/\d\.\d\s*\((?:iPhone)|(?:iPod).*Mac\s*OS.*\)\s*AppleWebKit\/\d*.*Version\/\d.*Mobile\/\w*\s*Safari\/\d*\.\d*\.*\d*$/i) ? "self_iPhone": e.match(/MI.*\/.*AppleWebKit\/.*Version\/\d(?:\.\d)?\s?Mobile\s*Safari\/\w*\.\w*$/i) || e.match(/AppleWebKit\/.*Version\/\d(?:\.\d)?\s?Mobile\s*Safari\/\w*\.\w*.*XiaoMi\/miuiBrowser/i) ? "self_MI": e.match(/AppleWebKit\/.*Version\/\d(?:\.\d)?\s?Mobile\s*Safari\/\w*\.\w*$/i) ? "self_Others": e.match(/Mozilla\/.*\(compatible\;Android\;.*\)/) ? "AndroidUC9": !1
		}
		function S() {
			h.on("click",
			function() {
				x()
			}),
			J.g("tip_close") && J.g("tip_close").on("click",
			function() {
				x()
			})
		}
		function x() {
			c && c.hide(),
			h.hide(),
			l.onHide && l.onHide()
		}
		function T() {
			return h = J.create("div", {
				style: "height:150%; width:100%;position:fixed;background-color:#999;z-index:1000;opacity:0.5;top:0;left:0"
			}),
			h.appendTo("body"),
			h
		}
		var t = {
			target: null,
			onShow: null,
			onHide: null
		},
		n = "<b style='border-bottom: 8px solid #fff;position: absolute;border-left: 7px solid transparent;border-right: 7px solid transparent;top:-7px;left:10px;'></b><div style='position: absolute; box-sizing: border-box; height:58px; width: 58px; border-radius: 15px;border-left: 1px solid #e3e3e3;border-top: 1px solid #eaeaea;-webkit-box-shadow: 3px 2px 2px #bfbfc0;background-image: -webkit-gradient(linear,left top,left bottom, color-stop(0,#fff),color-stop(1,#eaeaea))'><i class='logo' style='width:50px;margin: 14px 3px;'></i></div><div style='margin-left: 68px;color: #5f5f5f'><div style='padding-bottom: 8px; font-size: 13px; font-weight: 600;color: #333'>\u6dfb\u52a0\u624b\u673a\u5b89\u5c45\u5ba2\u5230\u684c\u9762</div><div style='font-size: 10px; margin-bottom: 3px'>\u8bf7\u70b9\u51fb <img src='/assets/touch/img/uc.png' width='15px' /></div><div id='tip_s' style='font-size: 10px'>\u9009\u62e9&quot;\u53d1\u9001\u81f3\u684c\u9762&quot;</div><input id='tip_close' style='border: none;width: 9px;padding:0; margin:-5px 0 0 ;cursor: pointer;font-weight: 600;font-size: 9px;float: right;background: transparent; color: #666;' readonly value='X' /></div>",
		r = n.replace("uc.png", "qq.png").replace("\u53d1\u9001\u81f3\u684c\u9762", "\u53d1\u5230\u624b\u673a\u684c\u9762"),
		i = n.replace("\u6dfb\u52a0\u624b\u673a\u5b89\u5c45\u5ba2\u5230\u684c\u9762", "\u6536\u85cf\u624b\u673a\u5b89\u5c45\u5ba2").replace("uc.png", "def.png").replace(/<div\sid='tip_s'.*&quot;\u53d1\u9001\u81f3\u684c\u9762&quot;<\/div>/, "").replace("top:-7px;left:10px;", "top:-7px;right:10px;"),
		s = n.replace("\u6dfb\u52a0\u624b\u673a\u5b89\u5c45\u5ba2\u5230\u684c\u9762", "\u6536\u85cf\u624b\u673a\u5b89\u5c45\u5ba2").replace("uc.png", "qq.png").replace(/<div\sid='tip_s'.*&quot;\u53d1\u9001\u81f3\u684c\u9762&quot;<\/div>/, ""),
		o = "<b style='border-top: 8px solid #e6e6e6;position: absolute;border-left: 7px solid transparent;border-right: 7px solid transparent;bottom: -7px;left: 50%;margin-left: -4px;'></b><div style='position: absolute; box-sizing: border-box; height:58px; width: 58px; border-radius: 15px;border-left: 1px solid #e3e3e3;border-top: 1px solid #eaeaea;-webkit-box-shadow: 3px 2px 2px #bfbfc0;background-image: -webkit-gradient(linear,left top,left bottom, color-stop(0,#fff),color-stop(1,#eaeaea))'><i class='logo' style='width:50px;margin: 14px 3px;'></i></div><div style='margin-left: 68px;color: #5f5f5f'><input id='tip_close' style='border: 1px solid #666;width: 9px;padding: 0 2px;margin: -5px 0 0;cursor: pointer;font-weight: 600;font-size: 9px;float: right;background: transparent;color: #666;line-height: 9px;border-radius: 8px;' readonly value='X' /><div style='padding-bottom: 8px; font-size: 13px; font-weight: 600;color: #333;min-width: 150px'>\u6dfb\u52a0\u624b\u673a\u5b89\u5c45\u5ba2\u5230\u684c\u9762</div><div style='font-size: 10px; margin-bottom: 3px'>\u8bf7\u70b9\u51fb <img src='/assets/touch/img/i_def.png' width='15px' /></div><div id='tip_s' style='font-size: 10px'>\u9009\u62e9&quot;\u6dfb\u52a0\u81f3\u4e3b\u5c4f\u5e55&quot;</div></div>",
		u = [8, !1, !1, 7],
		a = [8, 7, !1, !1],
		f = [!1, !1, 10, 40],
		l,
		c,
		h,
		p,
		d,
		v = {
			AndroidUC9: {
				tpl: n,
				p: u
			},
			iPhoneUC9: {
				tpl: n,
				p: u
			},
			self_iPhone: {
				tpl: o,
				p: f
			},
			AndroidQQ4: {
				tpl: r,
				p: u
			},
			iPhoneQQ4: {
				tpl: r,
				p: u
			},
			self_Others: {
				tpl: i,
				p: a
			},
			self_MI: {
				tpl: s,
				p: u
			}
		}; (function() {
			l = J.mix(t, e || {},
			!0),
			g() == 0 && m(w())
		})()
	}
	J.ui.tipfavorit = e
} (J)</div></div>",
		u = [8, !1, !1, 7],
		a = [8, 7, !1, !1],
		f = [!1, !1, 10, 40],
		l,
		c,
		h,
		p,
		d,
		v = {
			AndroidUC9: {
				tpl: n,
				p: u
			},
			iPhoneUC9: {
				tpl: n,
				p: u
			},
			self_iPhone: {
				tpl: o,
				p: f
			},
			AndroidQQ4: {
				tpl: r,
				p: u
			},
			iPhoneQQ4: {
				tpl: r,
				p: u
			},
			self_Others: {
				tpl: i,
				p: a
			},
			self_MI: {
				tpl: s,
				p: u
			}
		}; (function() {
			l = J.mix(t, e || {},
			!0),
			g() == 0 && m(w())
		})()
	}
	J.ui.tipfavorit = e
} (J)