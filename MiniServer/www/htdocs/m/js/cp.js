(function(e) {
	function V(e, t) {
		var n = 0,
		r, i = e.length,
		s = i === w;
		if (s) {
			for (r in e) if (t.call(e[r], r, e[r]) === !1) break
		} else for (; n < i;) if (t.call(e[n], n, e[n++]) === !1) break;
		return e
	}
	function $(e) {
		return e === null ? String(e) : I[Object.prototype.toString.call(e)] || w
	}
	function J() {
		if (D) return;
		D = 1;
		if (A === j) return Q();
		m[S] ? (m[S](C,
		function() {
			m[x](C, arguments.callee, 0),
			Q()
		},
		0), e[S](O,
		function() {
			e[x](O, arguments.callee, 0),
			Q(1)
		},
		0)) : F && (F(k,
		function() {
			A === j && (m[N](k, arguments.callee), Q())
		}), e[T](M,
		function() {
			e[N](M, arguments.callee),
			Q(1)
		}), y.doScroll && null == e["frameElement"] &&
		function() {
			if (_) return;
			try {
				y.doScroll("left")
			} catch(e) {
				return P(arguments.callee, 1)
			}
			Q()
		} ())
	}
	function K(e) {
		J(),
		_ ? e.call() : h.push(e)
	}
	function Q(e) {
		e && (l.PL = it());
		if (!_) {
			if (!m.body) return P(Q, 1);
			_ = 1,
			l.CL = it();
			if (h) {
				var t, n = 0;
				while (t = h[n++]) t.call();
				h = null
			}
			return 0
		}
	}
	function G(e, t, n) {
		var r;
		q.isFunction(t) && (n = t),
		t = /\.(js|css)/g.exec(e.toLowerCase()),
		t = t ? t[1] : z;
		if (z === t) r = m.createElement("script"),
		r.type = "text/javascript",
		r.src = e,
		r.async = "true",
		r.charset = B.c;
		else if (W === t) {
			r = m.createElement("link"),
			r.type = "text/css",
			r.rel = "stylesheet",
			r.href = e,
			g.appendChild(r);
			return
		}
		r.onload = r[k] = function() {
			var e = this[L];
			if (!e || "loaded" === e || A === e) n && n(),
			r.onload = r[k] = null
		},
		g.appendChild(r)
	}
	function Y(e, t) {
		return t || (t = z),
		B[t == z ? "u": "s"] + e.join(B.m) + B.m + B.v + "." + t
	}
	function Z(e, t) {
		if (t == W) return tt(e, v) > -1;
		var n = e.split("."),
		r = n.length,
		i = f[n[0]];
		return r === 1 && i ? !0 : r === 2 && i && i[n[1]] ? !0 : !1
	}
	function et(e, t) {
		var n = e.length,
		r = [],
		i = [],
		s,
		o;
		while (n--) o = e[n],
		/^\w+$/.test(o) && r.push(o);
		n = e.length;
		while (n--) o = e[n],
		(s = o.match(/^(\w+)\.\w+$/)) && tt(s[1], r) != -1 && e.splice(n, 1);
		n = e.length;
		while (n--) o = e[n],
		tt(o, i) == -1 && (t == W || !Z(o, t)) && i.push(o);
		return i.sort()
	}
	function tt(e, t) {
		var n = 0,
		r;
		if (t) {
			r = t.length;
			for (; n < r; n++) if (t[n] === e) return n
		}
		return - 1
	}
	function nt(e, t, n, r) {
		var i, s = [],
		o = [],
		u = 0,
		a;
		n != z && n != W && (r = n, n = z),
		a = n == z;
		if (q.isArray(e)) while (i = e[u++])(a ? s: o).push(i);
		else q.isString(e) && (a ? s: o).push(e);
		s = et(a ? s: o, n);
		if (q.isNumber(r)) K(function() {
			var e, r = [],
			i = 0;
			while ((e = s[i++]) && !Z(e, n)) r.push(e);
			r.length ? G(Y(r, n), n, t) : t && t.call()
		}.delay(r));
		else if (!_ && !r) {
			u = 0;
			while (i = s[u++])(a ? d: v).push(i);
			t && p.push(t)
		} else s.length ? G(Y(s, n), n, t) : t && t.call()
	}
	function rt(e, t) {
		var n = m.createTextNode(e),
		r;
		if (t || !(r = m.getElementsByTagName("style")[0])) g.appendChild(r = m.createElement("style")),
		r.type = "text/css";
		return r.styleSheet ? r.styleSheet.cssText += n.nodeValue: r.appendChild(n),
		r
	}
	function it() {
		return + (new Date)
	}
	var t = +(new Date),
	n = e.PAGESTART || t,
	r = "hasOwnProperty",
	i = function(e, t, n) {
		if (n) {
			var i = {};
			for (var s in e) e[r](s) && (i[s] = e[s]);
			for (var s in t) t[r](s) && (i[s] = t[s]);
			return i
		}
		for (var o in t) t[r](o) && (e[o] = t[o]);
		return e
	},
	s = {},
	o = Array.prototype.slice,
	u = "http://include.aifcdn.com/tjs/",
	a = "http://include.aifcdn.com/tcss/",
	f = {},
	l = {
		PS: n,
		BS: t,
		CL: n
	},
	c = "20130926_02",
	h = [],
	p = [],
	d = [],
	v = [],
	m = e.document,
	g = m.getElementsByTagName("head")[0],
	y = m.documentElement,
	b = arguments,
	w = b[2],
	E = b[1].split(","),
	S = E[0],
	x = E[1],
	T = E[2],
	N = E[3],
	C = E[4],
	k = E[5],
	L = E[6],
	A = E[7],
	O = E[8],
	M = "on" + O,
	_ = 0,
	D = 0,
	P = e.setTimeout,
	H = e.setInterval,
	B = {
		v: c,
		u: u,
		m: "/",
		c: "utf-8",
		s: a
	},
	j = m[L],
	F = m[T],
	I = {},
	q = {},
	R = navigator.userAgent,
	U = RegExp,
	z = "js",
	W = "css",
	X = {
		W: e,
		D: m,
		St: P,
		Si: H
	}; (function() {
		V("Boolean Number String Function Array Date RegExp Object".split(" "),
		function(e, t) {
			var n = t.toLowerCase();
			I["[object " + t + "]"] = n,
			q["is" + t] = function(e) {
				return $(e) === n
			}
		}),
		q.isWindow = function(e) {
			return e && q.isObject(e) && "setInterval" in e
		},
		q.isUndefined = function(e) {
			return e === w
		}
	})(),
	i(s, {
		mix: i,
		add: function(e, t) {
			if (q.isFunction(t)) {
				f[e] = t;
				return
			}
			var n = {};
			return f.mix(n, t),
			f.mix(f[e] = f[e] || {},
			n)
		},
		ua: {
			ua: R,
			chrome: /chrome\/(\d+\.\d+)/i.test(R) ? +U.$1: w,
			firefox: /firefox\/(\d+\.\d+)/i.test(R) ? +U.$1: w,
			ie: /msie (\d+\.\d+)/i.test(R) ? m.documentMode || +U.$1: w,
			opera: /opera(\/| )(\d+(\.\d+)?)(.+?(version\/(\d+(\.\d+)?)))?/i.test(R) ? +(U.$6 || U.$2) : w,
			safari: /(\d+\.\d)?(?:\.\d)?\s+safari\/?(\d+\.\d+)?/i.test(R) && !/chrome/i.test(R) ? +(U.$1 || U.$2) : w
		}
	}),
	K(function() {
		function t() {
			var e, t = 0;
			while (e = p[t++]) e.call();
			d = p = null
		}
		var e = et(d, z);
		e.length ? (G(Y(e, z), z, t), e = []) : t(),
		e = et(v, W),
		e.length && (G(Y(e, W), W), v = [])
	}),
	Function.prototype.ready = function() {
		K.call(f, this)
	},
	Function.prototype.require = function() {
		var e = arguments,
		t = o.call(e),
		n = t[1]; (q.isArray(n) || q.isString(n)) && (nt.apply(f, [].concat([n], [null, W], o.call(e, 2))), t.splice(1, 1)),
		t.splice(1, 0, this, z),
		nt.apply(f, t)
	},
	Function.prototype.delay = function(e) {
		var t = this,
		n = o.call(arguments, 1);
		P(function() {
			return t.apply(t, n)
		},
		e || 0)
	},
	f.base = i(s, {
		ready: K,
		finish: Q,
		load: G,
		use: nt,
		rules: rt,
		each: V,
		type: $,
		getTime: it,
		times: l,
		slice: o
	}),
	f.data = {},
	i(f, s),
	i(f, q),
	i(f, X),
	e.J = f
})(window, "addEventListener,removeEventListener,attachEvent,detachEvent,DOMContentLoaded,onreadystatechange,readyState,complete,load", undefined),
function(J) {
	function h(e) {
		var t = J.isString(e) ? e: p(e),
		n = "?tp=error&site=" + f + "&v=" + (J.W.PHPVERSION || "") + "&msg=" + t; (new Image).src = o + n,
		c.onError && c.onError(t)
	}
	function p(e) {
		var t = [];
		return J.each(["name", "message", "description", "url", "stack", "fileName", "lineNumber", "number", "line"],
		function(n, r) {
			r in e && (r == "stack" ? t.push(r + ":" + l(e[r].split(/\n/)[0])) : t.push(r + ":" + l(e[r])))
		}),
		t.join(",")
	}
	function d(e) {}
	var e = ".anjuke",
	t = "soj.dev.aifang",
	n = ".com",
	r = J.D.location.host,
	i = "http://",
	s = /dev|test/.test(r),
	o = i + (s ? t + n: "m" + e + n) + "/ts.html",
	u = i + (s ? t + n: "s" + e + n) + "/stb",
	a = r.match(/^(\w)\.(\w+)\./),
	f = a ? a[1] === "m" ? "m": a[2] : "unknow",
	l = encodeURIComponent;
	J.add("logger", {
		site: f,
		logUrl: o,
		sojUrl: u,
		isDev: s,
		autoLogger: !0,
		onError: null,
		add: d,
		log: h
	});
	var c = J.logger;
	J.W.onerror = function(e, t, n) {
		J.logger.autoLogger && h({
			message: e,
			url: t,
			line: n
		})
	}
} (J),
function(J) {
	function s() {
		var e = J.times,
		t = "&tp=speed&PS=" + e.PS + "&BS=" + e.BS + "&CL=" + e.CL + "&PL=" + e.PL;
		return t
	}
	function o() {
		var e = "&tp=timing",
		t = [],
		n = r.navigationStart;
		return i = {
			redirectTime: r.redirectEnd - r.redirectStart,
			domainLookupTime: r.domainLookupEnd - r.domainLookupStart,
			connectTime: r.connectEnd - r.connectStart,
			requestTime: r.responseStart - r.requestStart,
			responseTime: r.responseEnd - r.responseStart,
			domParsingTime: r.domInteractive - r.domLoading,
			firstScreenTime: r.domInteractive - n,
			resourcesLoadedTime: r.loadEventStart - r.domLoading,
			domContentLoadedTime: r.domContentLoadedEventStart - r.fetchStart,
			windowLoadedTime: r.loadEventStart - r.fetchStart
		},
		J.each(i,
		function(e, n) {
			t.push("&" + e + "=" + n)
		}),
		e + t.join("")
	}
	function u() {
		var t, n = J.g("body");
		n && (n = n.attr("data-page")) && (t = e.logUrl + "?pn=" + n + "&site=" + e.site + "&in=" + (J.iN || 0) + (r && r.navigationStart ? o() : s()), (new Image).src = t)
	}
	var e = J.logger,
	t = J.W,
	n = t.performance || {},
	r = n.timing,
	i;
	J.ready(function() {
		if ((!r || r.loadEventStart - r.fetchStart <= 0) && !0 || !J.times.PL) {
			J.on && J.on(t, "load", u);
			return
		}
		u()
	}),
	e.speed = u
} (J),
function() {
	function r() {
		return t.body
	}
	function i() {
		return t.compatMode == "BackCompat" ? r() : n
	}
	var e = window,
	t = document,
	n = t.documentElement;
	J.add("page", {
		height: function() {
			return Math.max(n.scrollHeight, r().scrollHeight, i().clientHeight)
		},
		width: function() {
			return Math.max(n.scrollWidth, r().scrollWidth, i().clientWidth)
		},
		scrollLeft: function() {
			return e.pageXOffset || n.scrollLeft || r().scrollLeft
		},
		scrollTop: function() {
			return e.pageYOffset || n.scrollTop || r().scrollTop
		},
		viewHeight: function() {
			return i().clientHeight
		},
		viewWidth: function() {
			return i().clientWidth
		}
	})
} (),
function(J) {
	var e = J.W,
	t = J.D,
	n = J.logger,
	r, i = J.page;
	n.Tracker = function(r, s, o) {
		function l() {
			var n = {
				p: u.page,
				h: u.href || t.location.href,
				r: u.referrer || t.referrer || "",
				sc: u.screen || '{"w":"' + i.width() + '"' + ',"h":"' + i.height() + '"' + ',"r":"' + (e.devicePixelRatio >= 2 ? 1 : 0) + '"' + "}",
				site: u.site || "",
				guid: a(u.nGuid || "aQQ_ajkguid") || "",
				ctid: a(u.nCtid || "ctid") || "",
				luid: a(u.nLiu || "lui") || "",
				ssid: a(u.nSessid || "sessid") || "",
				uid: o || a(u.nUid) || "0",
				t: +(new Date)
			};
			return u.method && (n.m = u.method),
			u.cst && /[0-9]{13}/.test(u.cst) && (n.lt = n.t - parseInt(u.cst)),
			u.pageName && (n.pn = u.pageName),
			u.customParam && (n.cp = u.customParam),
			n
		}
		function c(e) {
			var t = l();
			try {
				J[u.sendType || "post"]({
					url: e || n.sojUrl,
					type: "jsonp",
					data: t
				})
			} catch(r) {
				n.log(r)
			}
		}
		var u = {},
		a = J.getCookie,
		f = {
			track: c
		};
		return r && (u.site = r),
		s && (u.page = s),
		u.referrer = t.referrer || "",
		J.each("Site Page PageName Referrer Uid Method NGuid NCtid NLiu NSessid NUid Cst CustomParam SendType Screen Href".split(" "),
		function(e, t) {
			var n = t.substring(0, 1).toLowerCase() + t.substring(1);
			f["set" + t] = function(e) {
				u[n] = e
			}
		}),
		f
	},
	n.trackEvent = function(e) {
		r = r || new n.Tracker,
		r.setSendType("get"),
		r.setSite(e.site),
		e.page && r.setPage(e.page),
		e.href && r.setHref(e.href),
		e.page && r.setPageName(e.page),
		e.referrer && r.setReferrer(e.referrer),
		e.customparam ? r.setCustomParam(e.customparam) : r.setCustomParam(""),
		r.track()
	}
} (J),
J.add("lang"),
J.merge = J.lang.merge = function(e, t) {
	var n = e.length,
	r = 0;
	if (J.isNumber(t.length)) for (var i = t.length; r < i; r++) e[n++] = t[r];
	else while (!J.isUndefined(t[r])) e[n++] = t[r++];
	return e.length = n,
	e
},
String.prototype.trim = function() {
	return this.replace(/(^[\s\t\xa0\u3000]+)|([\u3000\xa0\s\t]+$)/g, "")
},
function(J, e, t) {
	function n(e) {
		var t = new i(e);
		return t.length ? t: null
	}
	function r(e, t) {
		return new b(e, t)
	}
	function i(e) {
		var n = e;
		if (e === "body" && t.body) return this[0] = t.body,
		this.length = 1,
		this.selector = n,
		this;
		if (e instanceof i) return e;
		if (e = e && e.nodeType ? e: t.getElementById(e)) this[0] = e,
		this.length = 1;
		return this.selector = n,
		this
	}
	function v(e) {
		return J.isString(e) ? u(e) : e
	}
	function m(e, t, n) {
		for (var r = e[n]; r; r = r[t]) if (r.nodeType == 1) return u(r);
		return null
	}
	function g(e) {
		var t = e.get();
		if (e.visible()) return {
			width: t.offsetWidth,
			height: t.offsetHeight
		};
		var n = t.style,
		r, i, s = {
			visibility: n.visibility,
			position: n.position,
			display: n.display
		};
		return r = {
			visibility: "hidden",
			display: "block"
		},
		s.position !== "fixed" && (r.position = "absolute"),
		e.setStyle(r),
		i = {
			width: t.offsetWidth,
			height: t.offsetHeight
		},
		e.setStyle(s),
		i
	}
	function y(e, n) {
		var r = t.createElement(e),
		i = u(r);
		return c(n) ? i: i.attr(n)
	}
	function b(e, n) {
		this.selector = e;
		if (J.sizzle) return J.merge(this, J.sizzle(e, n));
		var r = e ? e.match(/^(\.)?(\w+)(\s(\w+))?/) : null,
		i = [],
		u,
		a,
		f,
		l,
		c;
		n = n || t;
		if (r && r[1]) {
			c = r[4] ? r[4].toUpperCase() : "";
			if (n[o]) {
				f = n[o](r[2]),
				u = f.length;
				for (a = 0; a < u; a++) {
					l = f[a];
					if (c && l.tagName != c) continue;
					i.push(l)
				}
			} else {
				var h = new RegExp("(^|\\s)" + r[2] + "(\\s|$)");
				f = c ? n[s](c) : n.all || n[s]("*"),
				u = f.length;
				for (a = 0; a < u; a++) l = f[a],
				h.test(l.className) && i.push(l)
			}
		} else i = n[s](e);
		return J.merge(this, i)
	}
	var s = "getElementsByTagName",
	o = "getElementsByClassName",
	u = n,
	a = "float",
	f = "cssFloat",
	l = "opacity",
	c = J.isUndefined,
	h = function() {
		var e = {};
		return J.ua.ie < 8 ? (e["for"] = "htmlFor", e["class"] = "className") : (e.htmlFor = "for", e.className = "class"),
		e
	} (),
	p = function() {
		function e(e, r) {
			switch (e.type.toLowerCase()) {
			case "checkbox":
			case "radio":
				return t(e, r);
			default:
				return n(e, r)
			}
		}
		function t(e, t) {
			if (c(t)) return e.checked ? e.value: null;
			e.checked = !!t
		}
		function n(e, t) {
			if (c(t)) return e.value;
			e.value = t
		}
		function r(e, t) {
			if (c(t)) return i(e)
		}
		function i(e) {
			var t = e.selectedIndex;
			return t >= 0 ? s(e.options[t]) : null
		}
		function s(e) {
			return c(e.value) ? e.text: e.value
		}
		return {
			input: e,
			textarea: n,
			select: r,
			button: n
		}
	} (),
	d = i.prototype = {
		show: function() {
			return this.get().style.display = "",
			this
		},
		hide: function() {
			return this.get().style.display = "none",
			this
		},
		visible: function() {
			return this.get().style.display != "none"
		},
		remove: function() {
			var e = this.get();
			return e.parentNode && e.parentNode.removeChild(e),
			this
		},
		attr: function(e, t) {
			var n = this.get();
			if ("style" === e) return c(t) ? n.style.cssText: (n.style.cssText = t, this);
			e = h[e] || e;
			if (J.isString(e)) {
				if (c(t)) return n.getAttribute(e);
				t === null ? this.removeAttr(e) : n.setAttribute(e, t)
			} else for (var r in e) this.attr(r, e[r]);
			return this
		},
		removeAttr: function(e) {
			return this.get().removeAttribute(e),
			this
		},
		addClass: function(e) {
			var t = this.get();
			return this.hasClass(e) || (t.className += (t.className ? " ": "") + e),
			this
		},
		removeClass: function(e) {
			var t = this.get();
			return t.className = t.className.replace(new RegExp("(^|\\s+)" + e + "(\\s+|$)"), " ").trim(),
			this
		},
		hasClass: function(e) {
			var t = this.get(),
			n = t.className;
			return n.length > 0 && (n == e || (new RegExp("(^|\\s)" + e + "(\\s|$)")).test(n))
		},
		getStyle: function(e) {
			var n = this.get();
			e = e == a ? f: e;
			var r = n.style[e];
			if (!r || r == "auto") {
				var i = t.defaultView.getComputedStyle(n, null);
				r = i ? i[e] : null
			}
			return e == l ? r ? parseFloat(r) : 1 : r == "auto" ? null: r
		},
		setStyle: function(e) {
			var t = this.get(),
			n = t.style,
			r;
			J.isString(e) && (t.style.cssText += ";" + e, e.indexOf(l) > 0 && this.setOpacity(e.match(/opacity:\s*(\d?\.?\d*)/)[1]));
			for (var i in e) i == l ? this.setOpacity(e[i]) : n[i == a || i == f ? n.styleFloat ? "styleFloat": f: i] = e[i];
			return this
		},
		getOpacity: function() {
			return this.getStyle(l)
		},
		setOpacity: function(e) {
			return this.get().style.opacity = e == 1 || e === "" ? "": e < 1e-5 ? 0 : e,
			this
		},
		append: function(e) {
			return this.get().appendChild(e.nodeType === 1 ? e: e.get()),
			this
		},
		appendTo: function(e) {
			return v(e).append(this.get()),
			this
		},
		html: function(e) {
			var t = this.get();
			return J.isUndefined(e) ? t.innerHTML: e.nodeType === 1 ? this.append(e) : (t.innerHTML = e, this)
		},
		val: function(e) {
			var t = this.get(),
			n = p[t.tagName.toLowerCase() || t.type];
			return n = n ? n(t, e) : null,
			c(e) ? n: this
		},
		s: function(e) {
			return new b(e, this[0].nodeType === 1 ? this[0] : t)
		},
		get: function(e) {
			var e = e || 0,
			t = this[e];
			if (!t) throw 'selector "' + this.selector + '" element is not found.';
			return t
		},
		width: function() {
			return g(this).width
		},
		height: function() {
			return g(this).height
		},
		offset: function() {
			var e = this.get();
			e && J.isUndefined(e.offsetLeft) && (e = e.parentNode);
			var t = function(e) {
				var t = {
					x: 0,
					y: 0
				};
				while (e) t.x += e.offsetLeft,
				t.y += e.offsetTop,
				e = e.offsetParent;
				return t
			} (e);
			return {
				x: t.x,
				y: t.y
			}
		},
		insertAfter: function(e) {
			var t = this.get(),
			n = t.parentNode;
			return n && n.insertBefore(e.nodeType === 1 ? e: e.get(), t.nextSibling),
			this
		},
		insertBefore: function(e) {
			var t = this.get(),
			n = t.parentNode;
			return n && n.insertBefore(e.nodeType === 1 ? e: e.get(), t),
			this
		},
		insertFirst: function(e) {
			var t = this.first();
			return t ? t.insertBefore(e) : this.append(e),
			this
		},
		insertFirstTo: function(e) {
			return v(e).insertFirst(this.get()),
			this
		},
		insertLast: function(e) {
			return this.append(e)
		},
		first: function() {
			return m(this.get(), "nextSibling", "firstChild")
		},
		last: function() {
			return m(this.get(), "previousSibling", "lastChild")
		},
		next: function() {
			return m(this.get(), "nextSibling", "nextSibling")
		},
		prev: function() {
			return m(this.get(), "previousSibling", "previousSibling")
		},
		up: function(e) {
			var t = this.get();
			if (arguments.length == 0) return u(t.parentNode);
			var r = 0,
			i = J.isNumber(e),
			s;
			i || (s = e.match(/^(\.)?(\w+)$/));
			while (t = t.parentNode) {
				if (t.nodeType == 1) {
					if (i && r == e) return n(t);
					if (s && (s[1] && s[2] == t.className || s[2].toUpperCase() == t.tagName)) return n(t)
				}
				r++
			}
			return null
		},
		down: function(e) {
			var t = this.get();
			return arguments.length == 0 ? this.first() : J.isNumber(e) ? (new b("*", t)).eq(e) : new b(e, t)
		},
		submit: function() {
			this.get().submit()
		},
		eq: function(e) {
			return e = e || 0,
			n(this[e === -1 ? this.length - 1 : e])
		},
		empty: function() {
			return this.html("")
		},
		length: 0,
		splice: [].splice
	};
	J.mix(u, {
		dom: u,
		create: y,
		fn: d,
		s: r,
		g: n
	}),
	b.prototype = {
		each: function(e) {
			var t = 0,
			r = this.length;
			for (; t < r;) if (e.call(this[t], t, n(this[t++])) === !1) break;
			return this
		},
		eq: function(e) {
			var e = e || 0,
			t = this[e === -1 ? this.length - 1 : e];
			if (!t) throw '"' + this.selector + '" element does not exist.';
			return n(t)
		},
		get: function(e) {
			return this.eq(e)
		},
		length: 0,
		splice: [].splice
	},
	J.mix(J, {
		dom: u,
		create: y,
		s: r,
		g: n
	})
} (J, window, document),
J.add("ui"),
function(J) {
	function e(e) {
		function l() {
			if (localStorage) {
				var e, t = localStorage.searchHis ? localStorage.searchHis: 0;
				return t == 0 ? {
					length: 0,
					content: "",
					array: 0
				}: (e = t.substr(1, t.length - 2).split(","), {
					length: e.length,
					content: t,
					array: e
				})
			}
		}
		function c(e) {
			if (e == "") return;
			var t = encodeURI(e),
			n = l();
			n.length == 0 ? localStorage.searchHis = "," + t + ",": localStorage.searchHis = h(n.content, t, n.length)
		}
		function h(e, t, r) {
			var i, s = "," + t + ",";
			return e.indexOf(s) == -1 && r >= n.hisLength ? i = e.replace(/^,.*?,/, ",") : i = e.replace("," + t, ""),
			i + t + ","
		}
		function p() {
			var e = new Array,
			t = l();
			if (t.length == 0) return "";
			for (var n = 0; n < t.length; n++) e.push(decodeURI(t.array[n]));
			return e.reverse()
		}
		function d() { (i = J.create("div", {
				style: "display:none;position: fixed;width: 100%;height: 100%;background-color: #f4f4f4;top:0px;left:0px;z-index: 999;background-image: url('" + J.site.info.includePrefix + "/touch/img/search_bg.png');background-repeat: no-repeat;background-position: 50% 100px;background-size: 141px;"
			}).html(f)).appendTo("body"),
			s = i.s("input").eq(0),
			v()
		}
		function v() {
			var e = i.s("a").eq(0),
			t = i.s("i").eq(0);
			e.on("click",
			function() {
				S(),
				n.onCancel && n.onCancel()
			},
			null, !0, !0),
			t.on("click",
			function() {
				y(s.val()),
				c(s.val()),
				n.onSearch && n.onSearch()
			},
			null, !0, !0),
			s.get().addEventListener("keydown",
			function(e) {
				e.keyCode == 13 && (y(s.val()), c(s.val()), n.onTapEnter && n.onTapEnter(), s.get().blur())
			}),
			m(),
			g()
		}
		function m() {
			if (s.val() != "") {
				g();
				return
			}
			var e = "",
			t = p();
			for (var o = 0; o < t.length; o++) e = e + '<span style="display:block;font-size:14px;line-height:25px;color:#550c8c;padding:10px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;border-bottom:1px solid #c9c9c9;background-color:#f4f4f4;">' + t[o] + "</span>";
			r ? (r.html(e), r.show()) : ((r = J.create("div", {
				id: a,
				style: "position:absolute;left:0;top:56px;height:" + (J.page.viewHeight() - 56) + "px" + ";width:100%;"
			}).html("<div><div>" + e + "</div></div>")).appendTo(i), r = r.down(1)),
			t != "" && (i.setStyle({
				"background-image": "none"
			}), r.s("span").eq(0) && r.s("span").each(function(e, t) {
				t.on("click",
				function() {
					y(t.html()),
					n.onTapHisList && n.onTapHisList()
				})
			}))
		}
		function g() {
			s && s.on("input",
			function() {
				s.val() != "" ? (u = s.val(), r && r.hide()) : m()
			}),
			s.autocomplete({
				autoSubmit: !1,
				tpl: "autocomplete_m_def",
				dataKey: "communities",
				width: J.page.viewWidth(),
				boxTarget: function() {
					return r.up()
				},
				url: n.url,
				offset: {
					x: -55,
					y: -48
				},
				itemBuild: function(e) {
					var t = e.name,
					n = e.name.replace(u, '<em style="color:#999999">' + u + "</em>");
					return {
						l: n,
						v: t
					}
				},
				onSelect: function(e) {
					y(e.name),
					c(e.name),
					n.onTapList && n.onTapList()
				}
			})
		}
		function y(e) {
//			S(),
//			r.show(),
			n.onTapAction && n.onTapAction(e)
		}
		function b() {
			var e = i.s(".autocomplete_m_def").eq(0);
			e && e.html("")
		}
		function w() {
			n.isFocus && s.get().focus()
		}
		function E() {
			i && (i && i.show(), s.val(""), b(), w(), o || m())
		}
		function S() {
			i && i.hide()
		}
		var t = {
			hisLength: 10,
			url: null,
			isFocus: !1,
			onCancel: null,
			onSearch: null,
			onTapEnter: null,
			onTapList: null,
			onTapHisList: null,
			onTapAction: null
		},
		n,
		r,
		i,
		s,
		o = !0,
		u,
		a = ("IR" + Math.random()).replace(/\./, ""),
		f = '<div style="position:relative;padding:8px 10px 8px 55px;background-image:-webkit-gradient(linear,0 0,0 100%,from(#fafafa),to(#e2e2e2));color:#111"><form onsubmit="return false" style="display:block;margin:0;padding:0"><a style="position:absolute;text-decoration:none;height:40px;width:50px;text-align:center;font-size:16px;line-height:40px;left:5px">\u53d6\u6d88</a><input type="search" style="display:block;border-radius:3px;height:40px;border:1px solid #d9d9d9;font-size:14px;background-color:#fff;outline:none;-webkit-user-modify:read-write-plaintext-only;-webkit-tap-highlight-color:rgba(0,0,0,0);-webkit-appearance:none;margin:0;padding:0 35px 0 10px;width:100%;-webkit-box-sizing:border-box" /><i style="position:absolute;width:30px;height:32px;top:12px;right:16px;background:url(\'' + J.site.info.includePrefix + "/touch/img/search.png') no-repeat 2px 3px;background-size:25px\"></i></form></div>";
		return function() {
			n = J.mix(t, e || {},
			!0),
			o && (o = !1, d())
		}.require("ui.autocomplete", "ui.autocomplete_m_def"),
		{
			hisArray: p,
			showPage: E,
			hidePage: S
		}
	}
	J.ui.searchpage = e
} (J),
function(J, e, t) {
	function f(e, t, n, r, i) {
		if (!e) return ! 1;
		var s = "preventDefault",
		o = "stopPropagation",
		u = "currentTarget";
		return e[u] || (e[u] = t),
		e[s] || (e[s] = function() {
			e.returnValue = !1
		}),
		e[o] || (e[o] = function() {
			e.cancelBubble = !0
		}),
		e.stop = function() {
			e[s](),
			e[o]()
		},
		r && e[s](),
		i && e[o](),
		e
	}
	function l(e, t, r, o, u, a) {
		return function(l) {
			if (t.indexOf(":") > -1 && l && l.eventName !== t) return ! 1;
			if (!n.MMES && (t === i || t === s)) {
				var c = l.currentTarget || e,
				h = l.relatedTarget;
				if (c == h || (c.contains ? !!c.contains(h) : !!(c.compareDocumentPosition(h) & 16))) return ! 1
			}
			f(l, e, o, u, a),
			r.call(e, l, o)
		}
	}
	function c(e) {
		var t = {
			mouseenter: "mouseover",
			mouseleave: "mouseout"
		};
		return t[e] || e
	}
	J.add("event", {
		DA: "dataavailable",
		LO: "losecapture",
		ME: "mouseenter",
		ML: "mouseleave",
		CACHE: [],
		fix: l,
		fixName: c,
		getKeyCode: function(e) {
			return e.which || e.keyCode
		},
		g: function(n) {
			return n ? J.isString(n) ? t.getElementById(n) : n && (n === e || n === t || n.nodeType && n.nodeType === 1) ? n: n.get(0) : ""
		}
	});
	var n = J.event,
	r = J.dom,
	i = n.ME,
	s = n.ML,
	o = "unload",
	u = t.documentElement,
	a = J.ua.ie;
	n.MMES = "on" + i in u && "on" + s in u,
	r && r.fn && J.each("on un once fire".split(" "),
	function(e, t) {
		r.fn[t] = function() {
			return n[t].apply(null, [this.get()].concat(J.slice.call(arguments))),
			this
		}
	}),
	a && e.attachEvent("on" + o,
	function() {
		var e, t = J.event,
		n = t.CACHE,
		r = n.length,
		i = "detachEvent";
		while (r--) e = n[r],
		e.e[i]("on" + e.t, e.r, !1),
		e.t.indexOf(":") > -1 && (e.e[i]("on" + t.DA, e.r), e.e[i]("on" + t.LO, e.r)),
		n.splice(r, 1)
	})
} (J, window, document),
J.fire = J.event.fire = function(e, t, n, r) {
	var i, s = J.event,
	o = s.DA,
	u = s.LO,
	a = document;
	return (e = s.g(e)).length == 0 ? !1 : (r = r || !0, e == a && a.createEvent && !e.dispatchEvent && (e = a.documentElement), a.createEvent ? (i = a.createEvent("HTMLEvents"), i.initEvent(o, r, !0)) : (i = a.createEventObject(), i.eventType = r ? "on" + o: "on" + u), i.eventName = t, i.data = n || {},
	a.createEvent ? e.dispatchEvent(i) : e.fireEvent(i.eventType, i), i)
},
J.event.getPageX = function(e) {
	var t = document,
	n = t.documentElement,
	r = t.body || {
		scrollLeft: 0
	};
	return e.pageX || e.clientX + (n.scrollLeft || r.scrollLeft) - (n.clientLeft || 0)
},
J.event.getPageY = function(e) {
	var t = document,
	n = t.documentElement,
	r = t.body || {
		scrollTop: 0
	};
	return e.pageY || e.clientY + (n.scrollTop || r.scrollTop) - (n.clientTop || 0)
},
J.on = J.event.on = function(e, t, n, r, i, s) {
	var o = J.event,
	u = o.CACHE,
	a, f = t.indexOf(":") > -1,
	l = "addEventListener",
	c = "attachEvent",
	h = o.DA,
	p = o.LO;
	return e = o.g(e),
	a = o.fix(e, t, n, r, i, s),
	o.MMES || (t = o.fixName(t)),
	e[l] ? e[l](f ? h: t, a, !1) : f ? (e[c]("on" + h, a), e[c]("on" + p, a)) : e[c]("on" + t, a),
	u.push({
		e: e,
		t: t,
		h: n,
		r: a
	}),
	e
},
J.un = J.event.un = function(e, t, n) {
	var r = J.event,
	i = r.CACHE,
	s = r.DA,
	o = r.LO,
	u = i.length,
	a, f = !t,
	l = !n,
	c, h = "removeEventListener",
	p = "detachEvent";
	e = r.g(e),
	!r.MMES && !t && (t = r.fixName(t));
	while (u--) a = i[u],
	a.e == e && (f || a.t == t) && (l || a.h == n) && (c = a.t.indexOf(":") > -1, e[h] ? e[h](c ? s: t || a.t, a.r, !1) : c ? (e[p]("on" + s, a.r), e[p]("on" + o, a.r)) : e[p]("on" + (t || a.t), a.r), i.splice(u, 1));
	return e
},
J.once = J.event.once = function(e, t, n) {
	function r(i) {
		n.call(e, i),
		J.event.un(e, t, r)
	}
	return J.event.on(e, t, r),
	e
},
function(J, e) {
	function a(r, o, a) {
		function d() {
			p > 0 && h && clearTimeout(h)
		}
		function v(e, t) {
			s && e && (e = t || e, e && e.parentNode && s.removeChild(e), e = undefined)
		}
		function m(e, t) {
			e.onload = e.onreadystatechange = function(n, r) {
				if (r || !e.readyState || /loaded|complete/.test(e.readyState)) d(),
				e.onload = e.onreadystatechange = null,
				r && N("Failure"),
				setTimeout(function() {
					v(e, t)
				},
				500)
			},
			p > 0 && (h = setTimeout(function() {
				N("Timeout"),
				v(e, t)
			},
			p))
		}
		function g() {
			var e = i.createElement("script");
			m(e),
			e.async = l.async,
			e.charset = "utf-8",
			e.src = E(),
			s.insertBefore(e, s.firstChild)
		}
		function y() {
			var e = "J__ID" + J.getTime().toString(16) + "" + ++u,
			t = i.createElement("div"),
			n = i.createElement("form"),
			r = [],
			o = l.data;
			t.innerHTML = '<iframe id="' + e + '" name="' + e + '"></iframe>',
			t.style.display = "none";
			for (var a in o) r.push("<input type='hidden' name='" + a + "' value='" + o[a] + "' />");
			l.callback && r.push("<input type='hidden' name='callback' value='" + l.callback + "' />"),
			n.innerHTML = r.join(""),
			n.action = b(l.url),
			n.method = "post",
			n.target = e,
			t.appendChild(n),
			s.insertBefore(t, s.firstChild);
			var f = i.getElementById(e);
			f && m(f, t),
			n.submit(),
			n = null
		}
		function b(e) {
			return J.requestSessionId ? e += (e.indexOf("?") > 0 ? "&": "?") + "__REQU_SESSION_ID=" + J.requestSessionId: e
		}
		function w() {
			try {
				var e = l.async,
				t = l.headers,
				n = l.data,
				r;
				f = T(),
				t["X-Request-With"] = "XMLHttpRequest",
				a == "GET" ? (r = E(), n = null) : (r = b(l.url), n && !J.isString(n) && (n = S(n))),
				f.open(a, r, e),
				e && (f.onreadystatechange = x),
				a == "POST" && f.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				for (var i in t) t.hasOwnProperty(i) && f.setRequestHeader(i, t[i]);
				J.requestSessionId && f.setRequestHeader("REQU_SESSION_ID", J.requestSessionId),
				N("Beforerequest"),
				p > 0 && (h = setTimeout(function() {
					f.onreadystatechange = function() {},
					f.abort(),
					N("Timeout")
				},
				p)),
				f.send(n),
				e || x()
			} catch(s) {
				N("Failure")
			}
			return f
		}
		function E() {
			function n() {
				return t.indexOf("?") > 0 ? "&": "?"
			}
			var e = l.data,
			t = l.url;
			return J.requestSessionId && (t = t.replace(/__REQU_SESSION_ID=[^&]+/, "")),
			e && !J.isString(e) && (e = S(e)),
			a == "GET" && (e && (t += n() + e), l.type == "jsonp" && l.callback && (t += n() + "callback=" + l.callback), l.cache || (t += n() + "J" + J.getTime())),
			t = b(t),
			t
		}
		function S(e) {
			function r(e, r) {
				t[t.length] = n(e) + "=" + n(r)
			}
			var t = [];
			for (var i in e) r(i, J.isFunction(e[i]) ? e[i]() : e[i]);
			return t.join("&").replace(/%20/g, "+")
		}
		function x() {
			if (f.readyState == 4) {
				d();
				try {
					var e = f.status
				} catch(t) {
					N("Failure");
					return
				}
				e >= 200 && e < 300 || e == 304 || e == 1223 ? N("Success") : N("Failure"),
				f.onreadystatechange = function() {},
				l.async && (f = null)
			}
		}
		function T() {
			if (e.ActiveXObject) try {
				return new ActiveXObject("Msxml2.XMLHTTP")
			} catch(t) {
				try {
					return new ActiveXObject("Microsoft.XMLHTTP")
				} catch(t) {}
			}
			if (e.XMLHttpRequest) return new XMLHttpRequest
		}
		function N(e) {
			e = "on" + e;
			var t = c[e],
			n;
			if (t) if (e != "onSuccess") t(f);
			else {
				try {
					n = l.type == "json" ? (new Function("return (" + f.responseText + ")"))() : f.responseText
				} catch(r) {
					return t(f.responseText)
				}
				t(n)
			}
		}
		var f, l = t,
		c = {},
		h, p;
		J.isString(r) ? l.url = r: l = J.mix(l, r || {},
		!0),
		J.isFunction(o) ? l.onSuccess = o: l = J.mix(l, o || {},
		!0),
		p = parseInt(l.timeout);
		if (l.url == "") return null;
		a = a.toUpperCase(),
		J.each("onSuccess onFailure onBeforerequest onTimeout".split(" "),
		function(e, t) {
			c[t] = l[t]
		});
		if (l.type != "jsonp") return w();
		a == "GET" ? g() : y()
	}
	var t = {
		url: "",
		async: !0,
		data: "",
		callback: "",
		headers: "",
		onSuccess: "",
		onFailure: "",
		onBeforerequest: "",
		onTimeout: "",
		cache: !0,
		timeout: 5e3,
		type: ""
	},
	n = encodeURIComponent,
	r,
	i = document,
	s = i.head || i.getElementsByTagName("head")[0],
	o = "about:blank",
	u = 0;
	r = J.add("ajax"),
	J.each("get post".split(" "),
	function(e, t) {
		r[t] = function(e, n) {
			return new a(e, n, t)
		}
	}),
	J.mix(J, r)
} (J, window),
function(J) {
	function i(e) {
		return J.isString(e) && "" !== e
	}
	function s(t, s, o, u, a, f) {
		e.cookie = r(t) + "=" + String(n(s)) + (o ? ";expires=" + o.toGMTString() : "") + ";path=" + (i(a) ? a: "/") + (i(u) ? ";domain=" + u: "") + (f ? ";secure": "")
	}
	var e = document,
	t = 864e5,
	n = encodeURIComponent,
	r = decodeURIComponent,
	o = {
		getCookie: function(t) {
			var n = null,
			s, o;
			if (i(t)) {
				s = new RegExp("(?:^|)" + r(t) + "=([^;]*)(?:;|$)", "ig");
				while ((o = s.exec(e.cookie)) != null) n = r(o[1]) || null
			}
			return n
		},
		setCookie: function(e, n, r, i, o, u) {
			var a = "";
			r && (a = new Date, a.setTime(a.getTime() + r * t)),
			s(e, n, a, i, o, u)
		},
		rmCookie: function(t, n, s, u) {
			o.getCookie(t) && (e.cookie = r(t) + "=" + ";path=" + (i(s) ? s: "/") + (n ? ";domain=" + n: "") + ";expires=Thu, 01-Jan-1970 00:00:01 GMT")
		}
	};
	J.add("cookie", o),
	J.mix(J, o)
} (J),
J.add("site"),
J.add("utils"),
function(J) {
	"use strict";
	function e(e) {
		return e ? e.replace(/\W|_/g, "") : Math.random().toString().replace(/\./, "")
	}
	function t(e) {
		return ("00" + e).match(/\d{2}$/)[0]
	}
	J.utils.uuid = function() {
		var n = e(navigator.userAgent),
		r = e(J.D.location.href),
		i = e(J.D.lastModified),
		s = (n + r + i + "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz").split(""),
		o = s.length,
		u = [],
		a,
		f,
		l = new Date,
		c = l.getMonth() + 1,
		h = l.getDate(),
		p = l.getHours(),
		d = l.getMinutes();
		u[8] = u[13] = u[18] = u[23] = "-",
		u[14] = "4",
		u[24] = "T";
		for (a = 0; a < 28; a++) u[a] || (f = 0 | Math.random() * o, u[a] = s[a == 19 ? f & 3 | 8 : f]);
		return u.join("").toUpperCase() + t(c) + t(h) + t(p) + t(d)
	}
} (J),
function(J) {
	J.iN = 0;
	var e = J.site,
	t = J.D,
	n = 1825,
	r = t.location,
	i = r.host,
	s = r.href,
	o = /dev|test/.test(s),
	u = "anjuke.com",
	a = J.utils.uuid;
	e.info = {
		baseDomain: u,
		host: i,
		href: s,
		dev: o
	},
	e.createGuid = a,
	e.cookies = {
		ctid: "ctid",
		guid: "aQQ_ajkguid",
		ssid: "sessid"
	},
	e.init = function(t) {
		t = t || {};
		var r = e.cookies,
		i = r.guid,
		s = r.ctid,
		o = r.ssid,
		f = t.city_id || "",
		l = J.setCookie,
		c = J.getCookie;
		c(i) || (J.iN = 1, l(i, a(), n, u)),
		c(o) || l(o, a(), 0, u),
		f && f != c(s) && l(s, f, n, u),
		e.info.ctid = f || c(s),
		t.cityAlias && (e.info.cityAlias = t.cityAlias),
		t.includePrefix && (e.info.includePrefix = t.includePrefix)
	}
} (J)