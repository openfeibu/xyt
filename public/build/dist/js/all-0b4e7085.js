if (function(e, t) {
	"object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
		if (!e.document) throw new Error("jQuery requires a window with a document");
		return t(e)
	} : t(e)
}("undefined" != typeof window ? window : this, function(e, t) {
	function n(e) {
		var t = "length" in e && e.length,
			n = Z.type(e);
		return "function" !== n && !Z.isWindow(e) && (!(1 !== e.nodeType || !t) || ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e))
	}
	function r(e, t, n) {
		if (Z.isFunction(t)) return Z.grep(e, function(e, r) {
			return !!t.call(e, r, e) !== n
		});
		if (t.nodeType) return Z.grep(e, function(e) {
			return e === t !== n
		});
		if ("string" == typeof t) {
			if (se.test(t)) return Z.filter(t, e, n);
			t = Z.filter(t, e)
		}
		return Z.grep(e, function(e) {
			return q.call(t, e) >= 0 !== n
		})
	}
	function i(e, t) {
		for (;
		(e = e[t]) && 1 !== e.nodeType;);
		return e
	}
	function a(e) {
		var t = pe[e] = {};
		return Z.each(e.match(fe) || [], function(e, n) {
			t[n] = !0
		}), t
	}
	function o() {
		X.removeEventListener("DOMContentLoaded", o, !1), e.removeEventListener("load", o, !1), Z.ready()
	}
	function s() {
		Object.defineProperty(this.cache = {}, 0, {
			get: function() {
				return {}
			}
		}), this.expando = Z.expando + s.uid++
	}
	function l(e, t, n) {
		var r;
		if (void 0 === n && 1 === e.nodeType) if (r = "data-" + t.replace(Ee, "-$1").toLowerCase(), n = e.getAttribute(r), "string" == typeof n) {
			try {
				n = "true" === n || "false" !== n && ("null" === n ? null : +n + "" === n ? +n : ve.test(n) ? Z.parseJSON(n) : n)
			} catch (i) {}
			ye.set(e, t, n)
		} else n = void 0;
		return n
	}
	function u() {
		return !0
	}
	function c() {
		return !1
	}
	function d() {
		try {
			return X.activeElement
		} catch (e) {}
	}
	function h(e, t) {
		return Z.nodeName(e, "table") && Z.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
	}
	function f(e) {
		return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
	}
	function p(e) {
		var t = He.exec(e.type);
		return t ? e.type = t[1] : e.removeAttribute("type"), e
	}
	function m(e, t) {
		for (var n = 0, r = e.length; n < r; n++) ge.set(e[n], "globalEval", !t || ge.get(t[n], "globalEval"))
	}
	function _(e, t) {
		var n, r, i, a, o, s, l, u;
		if (1 === t.nodeType) {
			if (ge.hasData(e) && (a = ge.access(e), o = ge.set(t, a), u = a.events)) {
				delete o.handle, o.events = {};
				for (i in u) for (n = 0, r = u[i].length; n < r; n++) Z.event.add(t, i, u[i][n])
			}
			ye.hasData(e) && (s = ye.access(e), l = Z.extend({}, s), ye.set(t, l))
		}
	}
	function g(e, t) {
		var n = e.getElementsByTagName ? e.getElementsByTagName(t || "*") : e.querySelectorAll ? e.querySelectorAll(t || "*") : [];
		return void 0 === t || t && Z.nodeName(e, t) ? Z.merge([e], n) : n
	}
	function y(e, t) {
		var n = t.nodeName.toLowerCase();
		"input" === n && ke.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue)
	}
	function v(t, n) {
		var r, i = Z(n.createElement(t)).appendTo(n.body),
			a = e.getDefaultComputedStyle && (r = e.getDefaultComputedStyle(i[0])) ? r.display : Z.css(i[0], "display");
		return i.detach(), a
	}
	function E(e) {
		var t = X,
			n = Oe[e];
		return n || (n = v(e, t), "none" !== n && n || (Pe = (Pe || Z("<iframe frameborder='0' width='0' height='0'/>")).appendTo(t.documentElement), t = Pe[0].contentDocument, t.write(), t.close(), n = v(e, t), Pe.detach()), Oe[e] = n), n
	}
	function b(e, t, n) {
		var r, i, a, o, s = e.style;
		return n = n || We(e), n && (o = n.getPropertyValue(t) || n[t]), n && ("" !== o || Z.contains(e.ownerDocument, e) || (o = Z.style(e, t)), Ne.test(o) && Ie.test(t) && (r = s.width, i = s.minWidth, a = s.maxWidth, s.minWidth = s.maxWidth = s.width = o, o = n.width, s.width = r, s.minWidth = i, s.maxWidth = a)), void 0 !== o ? o + "" : o
	}
	function U(e, t) {
		return {
			get: function() {
				return e() ? void delete this.get : (this.get = t).apply(this, arguments)
			}
		}
	}
	function w(e, t) {
		if (t in e) return t;
		for (var n = t[0].toUpperCase() + t.slice(1), r = t, i = Ge.length; i--;) if (t = Ge[i] + n, t in e) return t;
		return r
	}
	function k(e, t, n) {
		var r = ze.exec(t);
		return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
	}
	function M(e, t, n, r, i) {
		for (var a = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0, o = 0; a < 4; a += 2)"margin" === n && (o += Z.css(e, n + Ue[a], !0, i)), r ? ("content" === n && (o -= Z.css(e, "padding" + Ue[a], !0, i)), "margin" !== n && (o -= Z.css(e, "border" + Ue[a] + "Width", !0, i))) : (o += Z.css(e, "padding" + Ue[a], !0, i), "padding" !== n && (o += Z.css(e, "border" + Ue[a] + "Width", !0, i)));
		return o
	}
	function L(e, t, n) {
		var r = !0,
			i = "width" === t ? e.offsetWidth : e.offsetHeight,
			a = We(e),
			o = "border-box" === Z.css(e, "boxSizing", !1, a);
		if (i <= 0 || null == i) {
			if (i = b(e, t, a), (i < 0 || null == i) && (i = e.style[t]), Ne.test(i)) return i;
			r = o && (K.boxSizingReliable() || i === e.style[t]), i = parseFloat(i) || 0
		}
		return i + M(e, t, n || (o ? "border" : "content"), r, a) + "px"
	}
	function F(e, t) {
		for (var n, r, i, a = [], o = 0, s = e.length; o < s; o++) r = e[o], r.style && (a[o] = ge.get(r, "olddisplay"), n = r.style.display, t ? (a[o] || "none" !== n || (r.style.display = ""), "" === r.style.display && we(r) && (a[o] = ge.access(r, "olddisplay", E(r.nodeName)))) : (i = we(r), "none" === n && i || ge.set(r, "olddisplay", i ? n : Z.css(r, "display"))));
		for (o = 0; o < s; o++) r = e[o], r.style && (t && "none" !== r.style.display && "" !== r.style.display || (r.style.display = t ? a[o] || "" : "none"));
		return e
	}
	function D(e, t, n, r, i) {
		return new D.prototype.init(e, t, n, r, i)
	}
	function x() {
		return setTimeout(function() {
			Ke = void 0
		}), Ke = Z.now()
	}
	function T(e, t) {
		var n, r = 0,
			i = {
				height: e
			};
		for (t = t ? 1 : 0; r < 4; r += 2 - t) n = Ue[r], i["margin" + n] = i["padding" + n] = e;
		return t && (i.opacity = i.width = e), i
	}
	function Y(e, t, n) {
		for (var r, i = (nt[t] || []).concat(nt["*"]), a = 0, o = i.length; a < o; a++) if (r = i[a].call(n, t, e)) return r
	}
	function S(e, t, n) {
		var r, i, a, o, s, l, u, c, d = this,
			h = {},
			f = e.style,
			p = e.nodeType && we(e),
			m = ge.get(e, "fxshow");
		n.queue || (s = Z._queueHooks(e, "fx"), null == s.unqueued && (s.unqueued = 0, l = s.empty.fire, s.empty.fire = function() {
			s.unqueued || l()
		}), s.unqueued++, d.always(function() {
			d.always(function() {
				s.unqueued--, Z.queue(e, "fx").length || s.empty.fire()
			})
		})), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [f.overflow, f.overflowX, f.overflowY], u = Z.css(e, "display"), c = "none" === u ? ge.get(e, "olddisplay") || E(e.nodeName) : u, "inline" === c && "none" === Z.css(e, "float") && (f.display = "inline-block")), n.overflow && (f.overflow = "hidden", d.always(function() {
			f.overflow = n.overflow[0], f.overflowX = n.overflow[1], f.overflowY = n.overflow[2]
		}));
		for (r in t) if (i = t[r], Qe.exec(i)) {
			if (delete t[r], a = a || "toggle" === i, i === (p ? "hide" : "show")) {
				if ("show" !== i || !m || void 0 === m[r]) continue;
				p = !0
			}
			h[r] = m && m[r] || Z.style(e, r)
		} else u = void 0;
		if (Z.isEmptyObject(h))"inline" === ("none" === u ? E(e.nodeName) : u) && (f.display = u);
		else {
			m ? "hidden" in m && (p = m.hidden) : m = ge.access(e, "fxshow", {}), a && (m.hidden = !p), p ? Z(e).show() : d.done(function() {
				Z(e).hide()
			}), d.done(function() {
				var t;
				ge.remove(e, "fxshow");
				for (t in h) Z.style(e, t, h[t])
			});
			for (r in h) o = Y(p ? m[r] : 0, r, d), r in m || (m[r] = o.start, p && (o.end = o.start, o.start = "width" === r || "height" === r ? 1 : 0))
		}
	}
	function A(e, t) {
		var n, r, i, a, o;
		for (n in e) if (r = Z.camelCase(n), i = t[r], a = e[n], Z.isArray(a) && (i = a[1], a = e[n] = a[0]), n !== r && (e[r] = a, delete e[n]), o = Z.cssHooks[r], o && "expand" in o) {
			a = o.expand(a), delete e[r];
			for (n in a) n in e || (e[n] = a[n], t[n] = i)
		} else t[r] = i
	}
	function C(e, t, n) {
		var r, i, a = 0,
			o = tt.length,
			s = Z.Deferred().always(function() {
				delete l.elem
			}),
			l = function() {
				if (i) return !1;
				for (var t = Ke || x(), n = Math.max(0, u.startTime + u.duration - t), r = n / u.duration || 0, a = 1 - r, o = 0, l = u.tweens.length; o < l; o++) u.tweens[o].run(a);
				return s.notifyWith(e, [u, a, n]), a < 1 && l ? n : (s.resolveWith(e, [u]), !1)
			},
			u = s.promise({
				elem: e,
				props: Z.extend({}, t),
				opts: Z.extend(!0, {
					specialEasing: {}
				}, n),
				originalProperties: t,
				originalOptions: n,
				startTime: Ke || x(),
				duration: n.duration,
				tweens: [],
				createTween: function(t, n) {
					var r = Z.Tween(e, u.opts, t, n, u.opts.specialEasing[t] || u.opts.easing);
					return u.tweens.push(r), r
				},
				stop: function(t) {
					var n = 0,
						r = t ? u.tweens.length : 0;
					if (i) return this;
					for (i = !0; n < r; n++) u.tweens[n].run(1);
					return t ? s.resolveWith(e, [u, t]) : s.rejectWith(e, [u, t]), this
				}
			}),
			c = u.props;
		for (A(c, u.opts.specialEasing); a < o; a++) if (r = tt[a].call(u, e, c, u.opts)) return r;
		return Z.map(c, Y, u), Z.isFunction(u.opts.start) && u.opts.start.call(e, u), Z.fx.timer(Z.extend(l, {
			elem: e,
			anim: u,
			queue: u.opts.queue
		})), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always)
	}
	function j(e) {
		return function(t, n) {
			"string" != typeof t && (n = t, t = "*");
			var r, i = 0,
				a = t.toLowerCase().match(fe) || [];
			if (Z.isFunction(n)) for (; r = a[i++];)"+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
		}
	}
	function H(e, t, n, r) {
		function i(s) {
			var l;
			return a[s] = !0, Z.each(e[s] || [], function(e, s) {
				var u = s(t, n, r);
				return "string" != typeof u || o || a[u] ? o ? !(l = u) : void 0 : (t.dataTypes.unshift(u), i(u), !1)
			}), l
		}
		var a = {},
			o = e === vt;
		return i(t.dataTypes[0]) || !a["*"] && i("*")
	}
	function B(e, t) {
		var n, r, i = Z.ajaxSettings.flatOptions || {};
		for (n in t) void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
		return r && Z.extend(!0, e, r), e
	}
	function $(e, t, n) {
		for (var r, i, a, o, s = e.contents, l = e.dataTypes;
		"*" === l[0];) l.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
		if (r) for (i in s) if (s[i] && s[i].test(r)) {
			l.unshift(i);
			break
		}
		if (l[0] in n) a = l[0];
		else {
			for (i in n) {
				if (!l[0] || e.converters[i + " " + l[0]]) {
					a = i;
					break
				}
				o || (o = i)
			}
			a = a || o
		}
		if (a) return a !== l[0] && l.unshift(a), n[a]
	}
	function P(e, t, n, r) {
		var i, a, o, s, l, u = {},
			c = e.dataTypes.slice();
		if (c[1]) for (o in e.converters) u[o.toLowerCase()] = e.converters[o];
		for (a = c.shift(); a;) if (e.responseFields[a] && (n[e.responseFields[a]] = t), !l && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = a, a = c.shift()) if ("*" === a) a = l;
		else if ("*" !== l && l !== a) {
			if (o = u[l + " " + a] || u["* " + a], !o) for (i in u) if (s = i.split(" "), s[1] === a && (o = u[l + " " + s[0]] || u["* " + s[0]])) {
				o === !0 ? o = u[i] : u[i] !== !0 && (a = s[0], c.unshift(s[1]));
				break
			}
			if (o !== !0) if (o && e["throws"]) t = o(t);
			else try {
				t = o(t)
			} catch (d) {
				return {
					state: "parsererror",
					error: o ? d : "No conversion from " + l + " to " + a
				}
			}
		}
		return {
			state: "success",
			data: t
		}
	}
	function O(e, t, n, r) {
		var i;
		if (Z.isArray(t)) Z.each(t, function(t, i) {
			n || kt.test(e) ? r(e, i) : O(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r)
		});
		else if (n || "object" !== Z.type(t)) r(e, t);
		else for (i in t) O(e + "[" + i + "]", t[i], n, r)
	}
	function I(e) {
		return Z.isWindow(e) ? e : 9 === e.nodeType && e.defaultView
	}
	var N = [],
		W = N.slice,
		R = N.concat,
		z = N.push,
		q = N.indexOf,
		J = {},
		V = J.toString,
		G = J.hasOwnProperty,
		K = {},
		X = e.document,
		Q = "2.1.4",
		Z = function(e, t) {
			return new Z.fn.init(e, t)
		},
		ee = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
		te = /^-ms-/,
		ne = /-([\da-z])/gi,
		re = function(e, t) {
			return t.toUpperCase()
		};
	Z.fn = Z.prototype = {
		jquery: Q,
		constructor: Z,
		selector: "",
		length: 0,
		toArray: function() {
			return W.call(this)
		},
		get: function(e) {
			return null != e ? e < 0 ? this[e + this.length] : this[e] : W.call(this)
		},
		pushStack: function(e) {
			var t = Z.merge(this.constructor(), e);
			return t.prevObject = this, t.context = this.context, t
		},
		each: function(e, t) {
			return Z.each(this, e, t)
		},
		map: function(e) {
			return this.pushStack(Z.map(this, function(t, n) {
				return e.call(t, n, t)
			}))
		},
		slice: function() {
			return this.pushStack(W.apply(this, arguments))
		},
		first: function() {
			return this.eq(0)
		},
		last: function() {
			return this.eq(-1)
		},
		eq: function(e) {
			var t = this.length,
				n = +e + (e < 0 ? t : 0);
			return this.pushStack(n >= 0 && n < t ? [this[n]] : [])
		},
		end: function() {
			return this.prevObject || this.constructor(null)
		},
		push: z,
		sort: N.sort,
		splice: N.splice
	}, Z.extend = Z.fn.extend = function() {
		var e, t, n, r, i, a, o = arguments[0] || {},
			s = 1,
			l = arguments.length,
			u = !1;
		for ("boolean" == typeof o && (u = o, o = arguments[s] || {}, s++), "object" == typeof o || Z.isFunction(o) || (o = {}), s === l && (o = this, s--); s < l; s++) if (null != (e = arguments[s])) for (t in e) n = o[t], r = e[t], o !== r && (u && r && (Z.isPlainObject(r) || (i = Z.isArray(r))) ? (i ? (i = !1, a = n && Z.isArray(n) ? n : []) : a = n && Z.isPlainObject(n) ? n : {}, o[t] = Z.extend(u, a, r)) : void 0 !== r && (o[t] = r));
		return o
	}, Z.extend({
		expando: "jQuery" + (Q + Math.random()).replace(/\D/g, ""),
		isReady: !0,
		error: function(e) {
			throw new Error(e)
		},
		noop: function() {},
		isFunction: function(e) {
			return "function" === Z.type(e)
		},
		isArray: Array.isArray,
		isWindow: function(e) {
			return null != e && e === e.window
		},
		isNumeric: function(e) {
			return !Z.isArray(e) && e - parseFloat(e) + 1 >= 0
		},
		isPlainObject: function(e) {
			return "object" === Z.type(e) && !e.nodeType && !Z.isWindow(e) && !(e.constructor && !G.call(e.constructor.prototype, "isPrototypeOf"))
		},
		isEmptyObject: function(e) {
			var t;
			for (t in e) return !1;
			return !0
		},
		type: function(e) {
			return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? J[V.call(e)] || "object" : typeof e
		},
		globalEval: function(e) {
			var t, n = eval;
			e = Z.trim(e), e && (1 === e.indexOf("use strict") ? (t = X.createElement("script"), t.text = e, X.head.appendChild(t).parentNode.removeChild(t)) : n(e))
		},
		camelCase: function(e) {
			return e.replace(te, "ms-").replace(ne, re)
		},
		nodeName: function(e, t) {
			return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
		},
		each: function(e, t, r) {
			var i, a = 0,
				o = e.length,
				s = n(e);
			if (r) {
				if (s) for (; a < o && (i = t.apply(e[a], r), i !== !1); a++);
				else for (a in e) if (i = t.apply(e[a], r), i === !1) break
			} else if (s) for (; a < o && (i = t.call(e[a], a, e[a]), i !== !1); a++);
			else for (a in e) if (i = t.call(e[a], a, e[a]), i === !1) break;
			return e
		},
		trim: function(e) {
			return null == e ? "" : (e + "").replace(ee, "")
		},
		makeArray: function(e, t) {
			var r = t || [];
			return null != e && (n(Object(e)) ? Z.merge(r, "string" == typeof e ? [e] : e) : z.call(r, e)), r
		},
		inArray: function(e, t, n) {
			return null == t ? -1 : q.call(t, e, n)
		},
		merge: function(e, t) {
			for (var n = +t.length, r = 0, i = e.length; r < n; r++) e[i++] = t[r];
			return e.length = i, e
		},
		grep: function(e, t, n) {
			for (var r, i = [], a = 0, o = e.length, s = !n; a < o; a++) r = !t(e[a], a), r !== s && i.push(e[a]);
			return i
		},
		map: function(e, t, r) {
			var i, a = 0,
				o = e.length,
				s = n(e),
				l = [];
			if (s) for (; a < o; a++) i = t(e[a], a, r), null != i && l.push(i);
			else for (a in e) i = t(e[a], a, r), null != i && l.push(i);
			return R.apply([], l)
		},
		guid: 1,
		proxy: function(e, t) {
			var n, r, i;
			if ("string" == typeof t && (n = e[t], t = e, e = n), Z.isFunction(e)) return r = W.call(arguments, 2), i = function() {
				return e.apply(t || this, r.concat(W.call(arguments)))
			}, i.guid = e.guid = e.guid || Z.guid++, i
		},
		now: Date.now,
		support: K
	}), Z.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
		J["[object " + t + "]"] = t.toLowerCase()
	});
	var ie = function(e) {
			function t(e, t, n, r) {
				var i, a, o, s, l, u, d, f, p, m;
				if ((t ? t.ownerDocument || t : O) !== S && Y(t), t = t || S, n = n || [], s = t.nodeType, "string" != typeof e || !e || 1 !== s && 9 !== s && 11 !== s) return n;
				if (!r && C) {
					if (11 !== s && (i = ye.exec(e))) if (o = i[1]) {
						if (9 === s) {
							if (a = t.getElementById(o), !a || !a.parentNode) return n;
							if (a.id === o) return n.push(a), n
						} else if (t.ownerDocument && (a = t.ownerDocument.getElementById(o)) && $(t, a) && a.id === o) return n.push(a), n
					} else {
						if (i[2]) return Q.apply(n, t.getElementsByTagName(e)), n;
						if ((o = i[3]) && b.getElementsByClassName) return Q.apply(n, t.getElementsByClassName(o)), n
					}
					if (b.qsa && (!j || !j.test(e))) {
						if (f = d = P, p = t, m = 1 !== s && e, 1 === s && "object" !== t.nodeName.toLowerCase()) {
							for (u = M(e), (d = t.getAttribute("id")) ? f = d.replace(Ee, "\\$&") : t.setAttribute("id", f), f = "[id='" + f + "'] ", l = u.length; l--;) u[l] = f + h(u[l]);
							p = ve.test(e) && c(t.parentNode) || t, m = u.join(",")
						}
						if (m) try {
							return Q.apply(n, p.querySelectorAll(m)), n
						} catch (_) {} finally {
							d || t.removeAttribute("id")
						}
					}
				}
				return F(e.replace(le, "$1"), t, n, r)
			}
			function n() {
				function e(n, r) {
					return t.push(n + " ") > U.cacheLength && delete e[t.shift()], e[n + " "] = r
				}
				var t = [];
				return e
			}
			function r(e) {
				return e[P] = !0, e
			}
			function i(e) {
				var t = S.createElement("div");
				try {
					return !!e(t)
				} catch (n) {
					return !1
				} finally {
					t.parentNode && t.parentNode.removeChild(t), t = null
				}
			}
			function a(e, t) {
				for (var n = e.split("|"), r = e.length; r--;) U.attrHandle[n[r]] = t
			}
			function o(e, t) {
				var n = t && e,
					r = n && 1 === e.nodeType && 1 === t.nodeType && (~t.sourceIndex || J) - (~e.sourceIndex || J);
				if (r) return r;
				if (n) for (; n = n.nextSibling;) if (n === t) return -1;
				return e ? 1 : -1
			}
			function s(e) {
				return function(t) {
					var n = t.nodeName.toLowerCase();
					return "input" === n && t.type === e
				}
			}
			function l(e) {
				return function(t) {
					var n = t.nodeName.toLowerCase();
					return ("input" === n || "button" === n) && t.type === e
				}
			}
			function u(e) {
				return r(function(t) {
					return t = +t, r(function(n, r) {
						for (var i, a = e([], n.length, t), o = a.length; o--;) n[i = a[o]] && (n[i] = !(r[i] = n[i]))
					})
				})
			}
			function c(e) {
				return e && "undefined" != typeof e.getElementsByTagName && e
			}
			function d() {}
			function h(e) {
				for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
				return r
			}
			function f(e, t, n) {
				var r = t.dir,
					i = n && "parentNode" === r,
					a = N++;
				return t.first ?
				function(t, n, a) {
					for (; t = t[r];) if (1 === t.nodeType || i) return e(t, n, a)
				} : function(t, n, o) {
					var s, l, u = [I, a];
					if (o) {
						for (; t = t[r];) if ((1 === t.nodeType || i) && e(t, n, o)) return !0
					} else for (; t = t[r];) if (1 === t.nodeType || i) {
						if (l = t[P] || (t[P] = {}), (s = l[r]) && s[0] === I && s[1] === a) return u[2] = s[2];
						if (l[r] = u, u[2] = e(t, n, o)) return !0
					}
				}
			}
			function p(e) {
				return e.length > 1 ?
				function(t, n, r) {
					for (var i = e.length; i--;) if (!e[i](t, n, r)) return !1;
					return !0
				} : e[0]
			}
			function m(e, n, r) {
				for (var i = 0, a = n.length; i < a; i++) t(e, n[i], r);
				return r
			}
			function _(e, t, n, r, i) {
				for (var a, o = [], s = 0, l = e.length, u = null != t; s < l; s++)(a = e[s]) && (n && !n(a, r, i) || (o.push(a), u && t.push(s)));
				return o
			}
			function g(e, t, n, i, a, o) {
				return i && !i[P] && (i = g(i)), a && !a[P] && (a = g(a, o)), r(function(r, o, s, l) {
					var u, c, d, h = [],
						f = [],
						p = o.length,
						g = r || m(t || "*", s.nodeType ? [s] : s, []),
						y = !e || !r && t ? g : _(g, h, e, s, l),
						v = n ? a || (r ? e : p || i) ? [] : o : y;
					if (n && n(y, v, s, l), i) for (u = _(v, f), i(u, [], s, l), c = u.length; c--;)(d = u[c]) && (v[f[c]] = !(y[f[c]] = d));
					if (r) {
						if (a || e) {
							if (a) {
								for (u = [], c = v.length; c--;)(d = v[c]) && u.push(y[c] = d);
								a(null, v = [], u, l)
							}
							for (c = v.length; c--;)(d = v[c]) && (u = a ? ee(r, d) : h[c]) > -1 && (r[u] = !(o[u] = d))
						}
					} else v = _(v === o ? v.splice(p, v.length) : v), a ? a(null, o, v, l) : Q.apply(o, v)
				})
			}
			function y(e) {
				for (var t, n, r, i = e.length, a = U.relative[e[0].type], o = a || U.relative[" "], s = a ? 1 : 0, l = f(function(e) {
					return e === t
				}, o, !0), u = f(function(e) {
					return ee(t, e) > -1
				}, o, !0), c = [function(e, n, r) {
					var i = !a && (r || n !== D) || ((t = n).nodeType ? l(e, n, r) : u(e, n, r));
					return t = null, i
				}]; s < i; s++) if (n = U.relative[e[s].type]) c = [f(p(c), n)];
				else {
					if (n = U.filter[e[s].type].apply(null, e[s].matches), n[P]) {
						for (r = ++s; r < i && !U.relative[e[r].type]; r++);
						return g(s > 1 && p(c), s > 1 && h(e.slice(0, s - 1).concat({
							value: " " === e[s - 2].type ? "*" : ""
						})).replace(le, "$1"), n, s < r && y(e.slice(s, r)), r < i && y(e = e.slice(r)), r < i && h(e))
					}
					c.push(n)
				}
				return p(c)
			}
			function v(e, n) {
				var i = n.length > 0,
					a = e.length > 0,
					o = function(r, o, s, l, u) {
						var c, d, h, f = 0,
							p = "0",
							m = r && [],
							g = [],
							y = D,
							v = r || a && U.find.TAG("*", u),
							E = I += null == y ? 1 : Math.random() || .1,
							b = v.length;
						for (u && (D = o !== S && o); p !== b && null != (c = v[p]); p++) {
							if (a && c) {
								for (d = 0; h = e[d++];) if (h(c, o, s)) {
									l.push(c);
									break
								}
								u && (I = E)
							}
							i && ((c = !h && c) && f--, r && m.push(c))
						}
						if (f += p, i && p !== f) {
							for (d = 0; h = n[d++];) h(m, g, o, s);
							if (r) {
								if (f > 0) for (; p--;) m[p] || g[p] || (g[p] = K.call(l));
								g = _(g)
							}
							Q.apply(l, g), u && !r && g.length > 0 && f + n.length > 1 && t.uniqueSort(l)
						}
						return u && (I = E, D = y), m
					};
				return i ? r(o) : o
			}
			var E, b, U, w, k, M, L, F, D, x, T, Y, S, A, C, j, H, B, $, P = "sizzle" + 1 * new Date,
				O = e.document,
				I = 0,
				N = 0,
				W = n(),
				R = n(),
				z = n(),
				q = function(e, t) {
					return e === t && (T = !0), 0
				},
				J = 1 << 31,
				V = {}.hasOwnProperty,
				G = [],
				K = G.pop,
				X = G.push,
				Q = G.push,
				Z = G.slice,
				ee = function(e, t) {
					for (var n = 0, r = e.length; n < r; n++) if (e[n] === t) return n;
					return -1
				},
				te = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
				ne = "[\\x20\\t\\r\\n\\f]",
				re = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
				ie = re.replace("w", "w#"),
				ae = "\\[" + ne + "*(" + re + ")(?:" + ne + "*([*^$|!~]?=)" + ne + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + ie + "))|)" + ne + "*\\]",
				oe = ":(" + re + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + ae + ")*)|.*)\\)|)",
				se = new RegExp(ne + "+", "g"),
				le = new RegExp("^" + ne + "+|((?:^|[^\\\\])(?:\\\\.)*)" + ne + "+$", "g"),
				ue = new RegExp("^" + ne + "*," + ne + "*"),
				ce = new RegExp("^" + ne + "*([>+~]|" + ne + ")" + ne + "*"),
				de = new RegExp("=" + ne + "*([^\\]'\"]*?)" + ne + "*\\]", "g"),
				he = new RegExp(oe),
				fe = new RegExp("^" + ie + "$"),
				pe = {
					ID: new RegExp("^#(" + re + ")"),
					CLASS: new RegExp("^\\.(" + re + ")"),
					TAG: new RegExp("^(" + re.replace("w", "w*") + ")"),
					ATTR: new RegExp("^" + ae),
					PSEUDO: new RegExp("^" + oe),
					CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + ne + "*(even|odd|(([+-]|)(\\d*)n|)" + ne + "*(?:([+-]|)" + ne + "*(\\d+)|))" + ne + "*\\)|)", "i"),
					bool: new RegExp("^(?:" + te + ")$", "i"),
					needsContext: new RegExp("^" + ne + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + ne + "*((?:-\\d)?\\d*)" + ne + "*\\)|)(?=[^-]|$)", "i")
				},
				me = /^(?:input|select|textarea|button)$/i,
				_e = /^h\d$/i,
				ge = /^[^{]+\{\s*\[native \w/,
				ye = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
				ve = /[+~]/,
				Ee = /'|\\/g,
				be = new RegExp("\\\\([\\da-f]{1,6}" + ne + "?|(" + ne + ")|.)", "ig"),
				Ue = function(e, t, n) {
					var r = "0x" + t - 65536;
					return r !== r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320)
				},
				we = function() {
					Y()
				};
			try {
				Q.apply(G = Z.call(O.childNodes), O.childNodes), G[O.childNodes.length].nodeType
			} catch (ke) {
				Q = {
					apply: G.length ?
					function(e, t) {
						X.apply(e, Z.call(t))
					} : function(e, t) {
						for (var n = e.length, r = 0; e[n++] = t[r++];);
						e.length = n - 1
					}
				}
			}
			b = t.support = {}, k = t.isXML = function(e) {
				var t = e && (e.ownerDocument || e).documentElement;
				return !!t && "HTML" !== t.nodeName
			}, Y = t.setDocument = function(e) {
				var t, n, r = e ? e.ownerDocument || e : O;
				return r !== S && 9 === r.nodeType && r.documentElement ? (S = r, A = r.documentElement, n = r.defaultView, n && n !== n.top && (n.addEventListener ? n.addEventListener("unload", we, !1) : n.attachEvent && n.attachEvent("onunload", we)), C = !k(r), b.attributes = i(function(e) {
					return e.className = "i", !e.getAttribute("className")
				}), b.getElementsByTagName = i(function(e) {
					return e.appendChild(r.createComment("")), !e.getElementsByTagName("*").length
				}), b.getElementsByClassName = ge.test(r.getElementsByClassName), b.getById = i(function(e) {
					return A.appendChild(e).id = P, !r.getElementsByName || !r.getElementsByName(P).length
				}), b.getById ? (U.find.ID = function(e, t) {
					if ("undefined" != typeof t.getElementById && C) {
						var n = t.getElementById(e);
						return n && n.parentNode ? [n] : []
					}
				}, U.filter.ID = function(e) {
					var t = e.replace(be, Ue);
					return function(e) {
						return e.getAttribute("id") === t
					}
				}) : (delete U.find.ID, U.filter.ID = function(e) {
					var t = e.replace(be, Ue);
					return function(e) {
						var n = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
						return n && n.value === t
					}
				}), U.find.TAG = b.getElementsByTagName ?
				function(e, t) {
					return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : b.qsa ? t.querySelectorAll(e) : void 0
				} : function(e, t) {
					var n, r = [],
						i = 0,
						a = t.getElementsByTagName(e);
					if ("*" === e) {
						for (; n = a[i++];) 1 === n.nodeType && r.push(n);
						return r
					}
					return a
				}, U.find.CLASS = b.getElementsByClassName &&
				function(e, t) {
					if (C) return t.getElementsByClassName(e)
				}, H = [], j = [], (b.qsa = ge.test(r.querySelectorAll)) && (i(function(e) {
					A.appendChild(e).innerHTML = "<a id='" + P + "'></a><select id='" + P + "-\f]' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && j.push("[*^$]=" + ne + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || j.push("\\[" + ne + "*(?:value|" + te + ")"), e.querySelectorAll("[id~=" + P + "-]").length || j.push("~="), e.querySelectorAll(":checked").length || j.push(":checked"), e.querySelectorAll("a#" + P + "+*").length || j.push(".#.+[+~]")
				}), i(function(e) {
					var t = r.createElement("input");
					t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && j.push("name" + ne + "*[*^$|!~]?="), e.querySelectorAll(":enabled").length || j.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), j.push(",.*:")
				})), (b.matchesSelector = ge.test(B = A.matches || A.webkitMatchesSelector || A.mozMatchesSelector || A.oMatchesSelector || A.msMatchesSelector)) && i(function(e) {
					b.disconnectedMatch = B.call(e, "div"), B.call(e, "[s!='']:x"), H.push("!=", oe)
				}), j = j.length && new RegExp(j.join("|")), H = H.length && new RegExp(H.join("|")), t = ge.test(A.compareDocumentPosition), $ = t || ge.test(A.contains) ?
				function(e, t) {
					var n = 9 === e.nodeType ? e.documentElement : e,
						r = t && t.parentNode;
					return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
				} : function(e, t) {
					if (t) for (; t = t.parentNode;) if (t === e) return !0;
					return !1
				}, q = t ?
				function(e, t) {
					if (e === t) return T = !0, 0;
					var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
					return n ? n : (n = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1, 1 & n || !b.sortDetached && t.compareDocumentPosition(e) === n ? e === r || e.ownerDocument === O && $(O, e) ? -1 : t === r || t.ownerDocument === O && $(O, t) ? 1 : x ? ee(x, e) - ee(x, t) : 0 : 4 & n ? -1 : 1)
				} : function(e, t) {
					if (e === t) return T = !0, 0;
					var n, i = 0,
						a = e.parentNode,
						s = t.parentNode,
						l = [e],
						u = [t];
					if (!a || !s) return e === r ? -1 : t === r ? 1 : a ? -1 : s ? 1 : x ? ee(x, e) - ee(x, t) : 0;
					if (a === s) return o(e, t);
					for (n = e; n = n.parentNode;) l.unshift(n);
					for (n = t; n = n.parentNode;) u.unshift(n);
					for (; l[i] === u[i];) i++;
					return i ? o(l[i], u[i]) : l[i] === O ? -1 : u[i] === O ? 1 : 0
				}, r) : S
			}, t.matches = function(e, n) {
				return t(e, null, null, n)
			}, t.matchesSelector = function(e, n) {
				if ((e.ownerDocument || e) !== S && Y(e), n = n.replace(de, "='$1']"), b.matchesSelector && C && (!H || !H.test(n)) && (!j || !j.test(n))) try {
					var r = B.call(e, n);
					if (r || b.disconnectedMatch || e.document && 11 !== e.document.nodeType) return r
				} catch (i) {}
				return t(n, S, null, [e]).length > 0
			}, t.contains = function(e, t) {
				return (e.ownerDocument || e) !== S && Y(e), $(e, t)
			}, t.attr = function(e, t) {
				(e.ownerDocument || e) !== S && Y(e);
				var n = U.attrHandle[t.toLowerCase()],
					r = n && V.call(U.attrHandle, t.toLowerCase()) ? n(e, t, !C) : void 0;
				return void 0 !== r ? r : b.attributes || !C ? e.getAttribute(t) : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
			}, t.error = function(e) {
				throw new Error("Syntax error, unrecognized expression: " + e)
			}, t.uniqueSort = function(e) {
				var t, n = [],
					r = 0,
					i = 0;
				if (T = !b.detectDuplicates, x = !b.sortStable && e.slice(0), e.sort(q), T) {
					for (; t = e[i++];) t === e[i] && (r = n.push(i));
					for (; r--;) e.splice(n[r], 1)
				}
				return x = null, e
			}, w = t.getText = function(e) {
				var t, n = "",
					r = 0,
					i = e.nodeType;
				if (i) {
					if (1 === i || 9 === i || 11 === i) {
						if ("string" == typeof e.textContent) return e.textContent;
						for (e = e.firstChild; e; e = e.nextSibling) n += w(e)
					} else if (3 === i || 4 === i) return e.nodeValue
				} else for (; t = e[r++];) n += w(t);
				return n
			}, U = t.selectors = {
				cacheLength: 50,
				createPseudo: r,
				match: pe,
				attrHandle: {},
				find: {},
				relative: {
					">": {
						dir: "parentNode",
						first: !0
					},
					" ": {
						dir: "parentNode"
					},
					"+": {
						dir: "previousSibling",
						first: !0
					},
					"~": {
						dir: "previousSibling"
					}
				},
				preFilter: {
					ATTR: function(e) {
						return e[1] = e[1].replace(be, Ue), e[3] = (e[3] || e[4] || e[5] || "").replace(be, Ue), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
					},
					CHILD: function(e) {
						return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || t.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && t.error(e[0]), e
					},
					PSEUDO: function(e) {
						var t, n = !e[6] && e[2];
						return pe.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && he.test(n) && (t = M(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
					}
				},
				filter: {
					TAG: function(e) {
						var t = e.replace(be, Ue).toLowerCase();
						return "*" === e ?
						function() {
							return !0
						} : function(e) {
							return e.nodeName && e.nodeName.toLowerCase() === t
						}
					},
					CLASS: function(e) {
						var t = W[e + " "];
						return t || (t = new RegExp("(^|" + ne + ")" + e + "(" + ne + "|$)")) && W(e, function(e) {
							return t.test("string" == typeof e.className && e.className || "undefined" != typeof e.getAttribute && e.getAttribute("class") || "")
						})
					},
					ATTR: function(e, n, r) {
						return function(i) {
							var a = t.attr(i, e);
							return null == a ? "!=" === n : !n || (a += "", "=" === n ? a === r : "!=" === n ? a !== r : "^=" === n ? r && 0 === a.indexOf(r) : "*=" === n ? r && a.indexOf(r) > -1 : "$=" === n ? r && a.slice(-r.length) === r : "~=" === n ? (" " + a.replace(se, " ") + " ").indexOf(r) > -1 : "|=" === n && (a === r || a.slice(0, r.length + 1) === r + "-"))
						}
					},
					CHILD: function(e, t, n, r, i) {
						var a = "nth" !== e.slice(0, 3),
							o = "last" !== e.slice(-4),
							s = "of-type" === t;
						return 1 === r && 0 === i ?
						function(e) {
							return !!e.parentNode
						} : function(t, n, l) {
							var u, c, d, h, f, p, m = a !== o ? "nextSibling" : "previousSibling",
								_ = t.parentNode,
								g = s && t.nodeName.toLowerCase(),
								y = !l && !s;
							if (_) {
								if (a) {
									for (; m;) {
										for (d = t; d = d[m];) if (s ? d.nodeName.toLowerCase() === g : 1 === d.nodeType) return !1;
										p = m = "only" === e && !p && "nextSibling"
									}
									return !0
								}
								if (p = [o ? _.firstChild : _.lastChild], o && y) {
									for (c = _[P] || (_[P] = {}), u = c[e] || [], f = u[0] === I && u[1], h = u[0] === I && u[2], d = f && _.childNodes[f]; d = ++f && d && d[m] || (h = f = 0) || p.pop();) if (1 === d.nodeType && ++h && d === t) {
										c[e] = [I, f, h];
										break
									}
								} else if (y && (u = (t[P] || (t[P] = {}))[e]) && u[0] === I) h = u[1];
								else for (;
								(d = ++f && d && d[m] || (h = f = 0) || p.pop()) && ((s ? d.nodeName.toLowerCase() !== g : 1 !== d.nodeType) || !++h || (y && ((d[P] || (d[P] = {}))[e] = [I, h]), d !== t)););
								return h -= i, h === r || h % r === 0 && h / r >= 0
							}
						}
					},
					PSEUDO: function(e, n) {
						var i, a = U.pseudos[e] || U.setFilters[e.toLowerCase()] || t.error("unsupported pseudo: " + e);
						return a[P] ? a(n) : a.length > 1 ? (i = [e, e, "", n], U.setFilters.hasOwnProperty(e.toLowerCase()) ? r(function(e, t) {
							for (var r, i = a(e, n), o = i.length; o--;) r = ee(e, i[o]), e[r] = !(t[r] = i[o])
						}) : function(e) {
							return a(e, 0, i)
						}) : a
					}
				},
				pseudos: {
					not: r(function(e) {
						var t = [],
							n = [],
							i = L(e.replace(le, "$1"));
						return i[P] ? r(function(e, t, n, r) {
							for (var a, o = i(e, null, r, []), s = e.length; s--;)(a = o[s]) && (e[s] = !(t[s] = a))
						}) : function(e, r, a) {
							return t[0] = e, i(t, null, a, n), t[0] = null, !n.pop()
						}
					}),
					has: r(function(e) {
						return function(n) {
							return t(e, n).length > 0
						}
					}),
					contains: r(function(e) {
						return e = e.replace(be, Ue), function(t) {
							return (t.textContent || t.innerText || w(t)).indexOf(e) > -1
						}
					}),
					lang: r(function(e) {
						return fe.test(e || "") || t.error("unsupported lang: " + e), e = e.replace(be, Ue).toLowerCase(), function(t) {
							var n;
							do
							if (n = C ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-");
							while ((t = t.parentNode) && 1 === t.nodeType);
							return !1
						}
					}),
					target: function(t) {
						var n = e.location && e.location.hash;
						return n && n.slice(1) === t.id
					},
					root: function(e) {
						return e === A
					},
					focus: function(e) {
						return e === S.activeElement && (!S.hasFocus || S.hasFocus()) && !! (e.type || e.href || ~e.tabIndex)
					},
					enabled: function(e) {
						return e.disabled === !1
					},
					disabled: function(e) {
						return e.disabled === !0
					},
					checked: function(e) {
						var t = e.nodeName.toLowerCase();
						return "input" === t && !! e.checked || "option" === t && !! e.selected
					},
					selected: function(e) {
						return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
					},
					empty: function(e) {
						for (e = e.firstChild; e; e = e.nextSibling) if (e.nodeType < 6) return !1;
						return !0
					},
					parent: function(e) {
						return !U.pseudos.empty(e)
					},
					header: function(e) {
						return _e.test(e.nodeName)
					},
					input: function(e) {
						return me.test(e.nodeName)
					},
					button: function(e) {
						var t = e.nodeName.toLowerCase();
						return "input" === t && "button" === e.type || "button" === t
					},
					text: function(e) {
						var t;
						return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
					},
					first: u(function() {
						return [0]
					}),
					last: u(function(e, t) {
						return [t - 1]
					}),
					eq: u(function(e, t, n) {
						return [n < 0 ? n + t : n]
					}),
					even: u(function(e, t) {
						for (var n = 0; n < t; n += 2) e.push(n);
						return e
					}),
					odd: u(function(e, t) {
						for (var n = 1; n < t; n += 2) e.push(n);
						return e
					}),
					lt: u(function(e, t, n) {
						for (var r = n < 0 ? n + t : n; --r >= 0;) e.push(r);
						return e
					}),
					gt: u(function(e, t, n) {
						for (var r = n < 0 ? n + t : n; ++r < t;) e.push(r);
						return e
					})
				}
			}, U.pseudos.nth = U.pseudos.eq;
			for (E in {
				radio: !0,
				checkbox: !0,
				file: !0,
				password: !0,
				image: !0
			}) U.pseudos[E] = s(E);
			for (E in {
				submit: !0,
				reset: !0
			}) U.pseudos[E] = l(E);
			return d.prototype = U.filters = U.pseudos, U.setFilters = new d, M = t.tokenize = function(e, n) {
				var r, i, a, o, s, l, u, c = R[e + " "];
				if (c) return n ? 0 : c.slice(0);
				for (s = e, l = [], u = U.preFilter; s;) {
					r && !(i = ue.exec(s)) || (i && (s = s.slice(i[0].length) || s), l.push(a = [])), r = !1, (i = ce.exec(s)) && (r = i.shift(), a.push({
						value: r,
						type: i[0].replace(le, " ")
					}), s = s.slice(r.length));
					for (o in U.filter)!(i = pe[o].exec(s)) || u[o] && !(i = u[o](i)) || (r = i.shift(), a.push({
						value: r,
						type: o,
						matches: i
					}), s = s.slice(r.length));
					if (!r) break
				}
				return n ? s.length : s ? t.error(e) : R(e, l).slice(0)
			}, L = t.compile = function(e, t) {
				var n, r = [],
					i = [],
					a = z[e + " "];
				if (!a) {
					for (t || (t = M(e)), n = t.length; n--;) a = y(t[n]), a[P] ? r.push(a) : i.push(a);
					a = z(e, v(i, r)), a.selector = e
				}
				return a
			}, F = t.select = function(e, t, n, r) {
				var i, a, o, s, l, u = "function" == typeof e && e,
					d = !r && M(e = u.selector || e);
				if (n = n || [], 1 === d.length) {
					if (a = d[0] = d[0].slice(0), a.length > 2 && "ID" === (o = a[0]).type && b.getById && 9 === t.nodeType && C && U.relative[a[1].type]) {
						if (t = (U.find.ID(o.matches[0].replace(be, Ue), t) || [])[0], !t) return n;
						u && (t = t.parentNode), e = e.slice(a.shift().value.length)
					}
					for (i = pe.needsContext.test(e) ? 0 : a.length; i-- && (o = a[i], !U.relative[s = o.type]);) if ((l = U.find[s]) && (r = l(o.matches[0].replace(be, Ue), ve.test(a[0].type) && c(t.parentNode) || t))) {
						if (a.splice(i, 1), e = r.length && h(a), !e) return Q.apply(n, r), n;
						break
					}
				}
				return (u || L(e, d))(r, t, !C, n, ve.test(e) && c(t.parentNode) || t), n
			}, b.sortStable = P.split("").sort(q).join("") === P, b.detectDuplicates = !! T, Y(), b.sortDetached = i(function(e) {
				return 1 & e.compareDocumentPosition(S.createElement("div"))
			}), i(function(e) {
				return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
			}) || a("type|href|height|width", function(e, t, n) {
				if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
			}), b.attributes && i(function(e) {
				return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
			}) || a("value", function(e, t, n) {
				if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue
			}), i(function(e) {
				return null == e.getAttribute("disabled")
			}) || a(te, function(e, t, n) {
				var r;
				if (!n) return e[t] === !0 ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
			}), t
		}(e);
	Z.find = ie, Z.expr = ie.selectors, Z.expr[":"] = Z.expr.pseudos, Z.unique = ie.uniqueSort, Z.text = ie.getText, Z.isXMLDoc = ie.isXML, Z.contains = ie.contains;
	var ae = Z.expr.match.needsContext,
		oe = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
		se = /^.[^:#\[\.,]*$/;
	Z.filter = function(e, t, n) {
		var r = t[0];
		return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? Z.find.matchesSelector(r, e) ? [r] : [] : Z.find.matches(e, Z.grep(t, function(e) {
			return 1 === e.nodeType
		}))
	}, Z.fn.extend({
		find: function(e) {
			var t, n = this.length,
				r = [],
				i = this;
			if ("string" != typeof e) return this.pushStack(Z(e).filter(function() {
				for (t = 0; t < n; t++) if (Z.contains(i[t], this)) return !0
			}));
			for (t = 0; t < n; t++) Z.find(e, i[t], r);
			return r = this.pushStack(n > 1 ? Z.unique(r) : r), r.selector = this.selector ? this.selector + " " + e : e, r
		},
		filter: function(e) {
			return this.pushStack(r(this, e || [], !1))
		},
		not: function(e) {
			return this.pushStack(r(this, e || [], !0))
		},
		is: function(e) {
			return !!r(this, "string" == typeof e && ae.test(e) ? Z(e) : e || [], !1).length
		}
	});
	var le, ue = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
		ce = Z.fn.init = function(e, t) {
			var n, r;
			if (!e) return this;
			if ("string" == typeof e) {
				if (n = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : ue.exec(e), !n || !n[1] && t) return !t || t.jquery ? (t || le).find(e) : this.constructor(t).find(e);
				if (n[1]) {
					if (t = t instanceof Z ? t[0] : t, Z.merge(this, Z.parseHTML(n[1], t && t.nodeType ? t.ownerDocument || t : X, !0)), oe.test(n[1]) && Z.isPlainObject(t)) for (n in t) Z.isFunction(this[n]) ? this[n](t[n]) : this.attr(n, t[n]);
					return this
				}
				return r = X.getElementById(n[2]), r && r.parentNode && (this.length = 1, this[0] = r), this.context = X, this.selector = e, this
			}
			return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : Z.isFunction(e) ? "undefined" != typeof le.ready ? le.ready(e) : e(Z) : (void 0 !== e.selector && (this.selector = e.selector, this.context = e.context), Z.makeArray(e, this))
		};
	ce.prototype = Z.fn, le = Z(X);
	var de = /^(?:parents|prev(?:Until|All))/,
		he = {
			children: !0,
			contents: !0,
			next: !0,
			prev: !0
		};
	Z.extend({
		dir: function(e, t, n) {
			for (var r = [], i = void 0 !== n;
			(e = e[t]) && 9 !== e.nodeType;) if (1 === e.nodeType) {
				if (i && Z(e).is(n)) break;
				r.push(e)
			}
			return r
		},
		sibling: function(e, t) {
			for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
			return n
		}
	}), Z.fn.extend({
		has: function(e) {
			var t = Z(e, this),
				n = t.length;
			return this.filter(function() {
				for (var e = 0; e < n; e++) if (Z.contains(this, t[e])) return !0
			})
		},
		closest: function(e, t) {
			for (var n, r = 0, i = this.length, a = [], o = ae.test(e) || "string" != typeof e ? Z(e, t || this.context) : 0; r < i; r++) for (n = this[r]; n && n !== t; n = n.parentNode) if (n.nodeType < 11 && (o ? o.index(n) > -1 : 1 === n.nodeType && Z.find.matchesSelector(n, e))) {
				a.push(n);
				break
			}
			return this.pushStack(a.length > 1 ? Z.unique(a) : a)
		},
		index: function(e) {
			return e ? "string" == typeof e ? q.call(Z(e), this[0]) : q.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
		},
		add: function(e, t) {
			return this.pushStack(Z.unique(Z.merge(this.get(), Z(e, t))))
		},
		addBack: function(e) {
			return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
		}
	}), Z.each({
		parent: function(e) {
			var t = e.parentNode;
			return t && 11 !== t.nodeType ? t : null
		},
		parents: function(e) {
			return Z.dir(e, "parentNode")
		},
		parentsUntil: function(e, t, n) {
			return Z.dir(e, "parentNode", n)
		},
		next: function(e) {
			return i(e, "nextSibling")
		},
		prev: function(e) {
			return i(e, "previousSibling")
		},
		nextAll: function(e) {
			return Z.dir(e, "nextSibling")
		},
		prevAll: function(e) {
			return Z.dir(e, "previousSibling")
		},
		nextUntil: function(e, t, n) {
			return Z.dir(e, "nextSibling", n)
		},
		prevUntil: function(e, t, n) {
			return Z.dir(e, "previousSibling", n)
		},
		siblings: function(e) {
			return Z.sibling((e.parentNode || {}).firstChild, e)
		},
		children: function(e) {
			return Z.sibling(e.firstChild)
		},
		contents: function(e) {
			return e.contentDocument || Z.merge([], e.childNodes)
		}
	}, function(e, t) {
		Z.fn[e] = function(n, r) {
			var i = Z.map(this, t, n);
			return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = Z.filter(r, i)), this.length > 1 && (he[e] || Z.unique(i), de.test(e) && i.reverse()), this.pushStack(i)
		}
	});
	var fe = /\S+/g,
		pe = {};
	Z.Callbacks = function(e) {
		e = "string" == typeof e ? pe[e] || a(e) : Z.extend({}, e);
		var t, n, r, i, o, s, l = [],
			u = !e.once && [],
			c = function(a) {
				for (t = e.memory && a, n = !0, s = i || 0, i = 0, o = l.length, r = !0; l && s < o; s++) if (l[s].apply(a[0], a[1]) === !1 && e.stopOnFalse) {
					t = !1;
					break
				}
				r = !1, l && (u ? u.length && c(u.shift()) : t ? l = [] : d.disable())
			},
			d = {
				add: function() {
					if (l) {
						var n = l.length;
						!
						function a(t) {
							Z.each(t, function(t, n) {
								var r = Z.type(n);
								"function" === r ? e.unique && d.has(n) || l.push(n) : n && n.length && "string" !== r && a(n)
							})
						}(arguments), r ? o = l.length : t && (i = n, c(t))
					}
					return this
				},
				remove: function() {
					return l && Z.each(arguments, function(e, t) {
						for (var n;
						(n = Z.inArray(t, l, n)) > -1;) l.splice(n, 1), r && (n <= o && o--, n <= s && s--)
					}), this
				},
				has: function(e) {
					return e ? Z.inArray(e, l) > -1 : !(!l || !l.length)
				},
				empty: function() {
					return l = [], o = 0, this
				},
				disable: function() {
					return l = u = t = void 0, this
				},
				disabled: function() {
					return !l
				},
				lock: function() {
					return u = void 0, t || d.disable(), this
				},
				locked: function() {
					return !u
				},
				fireWith: function(e, t) {
					return !l || n && !u || (t = t || [], t = [e, t.slice ? t.slice() : t], r ? u.push(t) : c(t)), this
				},
				fire: function() {
					return d.fireWith(this, arguments), this
				},
				fired: function() {
					return !!n
				}
			};
		return d
	}, Z.extend({
		Deferred: function(e) {
			var t = [
				["resolve", "done", Z.Callbacks("once memory"), "resolved"],
				["reject", "fail", Z.Callbacks("once memory"), "rejected"],
				["notify", "progress", Z.Callbacks("memory")]
			],
				n = "pending",
				r = {
					state: function() {
						return n
					},
					always: function() {
						return i.done(arguments).fail(arguments), this
					},
					then: function() {
						var e = arguments;
						return Z.Deferred(function(n) {
							Z.each(t, function(t, a) {
								var o = Z.isFunction(e[t]) && e[t];
								i[a[1]](function() {
									var e = o && o.apply(this, arguments);
									e && Z.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[a[0] + "With"](this === r ? n.promise() : this, o ? [e] : arguments)
								})
							}), e = null
						}).promise()
					},
					promise: function(e) {
						return null != e ? Z.extend(e, r) : r
					}
				},
				i = {};
			return r.pipe = r.then, Z.each(t, function(e, a) {
				var o = a[2],
					s = a[3];
				r[a[1]] = o.add, s && o.add(function() {
					n = s
				}, t[1 ^ e][2].disable, t[2][2].lock), i[a[0]] = function() {
					return i[a[0] + "With"](this === i ? r : this, arguments), this
				}, i[a[0] + "With"] = o.fireWith
			}), r.promise(i), e && e.call(i, i), i
		},
		when: function(e) {
			var t, n, r, i = 0,
				a = W.call(arguments),
				o = a.length,
				s = 1 !== o || e && Z.isFunction(e.promise) ? o : 0,
				l = 1 === s ? e : Z.Deferred(),
				u = function(e, n, r) {
					return function(i) {
						n[e] = this, r[e] = arguments.length > 1 ? W.call(arguments) : i, r === t ? l.notifyWith(n, r) : --s || l.resolveWith(n, r)
					}
				};
			if (o > 1) for (t = new Array(o), n = new Array(o), r = new Array(o); i < o; i++) a[i] && Z.isFunction(a[i].promise) ? a[i].promise().done(u(i, r, a)).fail(l.reject).progress(u(i, n, t)) : --s;
			return s || l.resolveWith(r, a), l.promise()
		}
	});
	var me;
	Z.fn.ready = function(e) {
		return Z.ready.promise().done(e), this
	}, Z.extend({
		isReady: !1,
		readyWait: 1,
		holdReady: function(e) {
			e ? Z.readyWait++ : Z.ready(!0)
		},
		ready: function(e) {
			(e === !0 ? --Z.readyWait : Z.isReady) || (Z.isReady = !0, e !== !0 && --Z.readyWait > 0 || (me.resolveWith(X, [Z]), Z.fn.triggerHandler && (Z(X).triggerHandler("ready"), Z(X).off("ready"))))
		}
	}), Z.ready.promise = function(t) {
		return me || (me = Z.Deferred(), "complete" === X.readyState ? setTimeout(Z.ready) : (X.addEventListener("DOMContentLoaded", o, !1), e.addEventListener("load", o, !1))), me.promise(t)
	}, Z.ready.promise();
	var _e = Z.access = function(e, t, n, r, i, a, o) {
			var s = 0,
				l = e.length,
				u = null == n;
			if ("object" === Z.type(n)) {
				i = !0;
				for (s in n) Z.access(e, t, s, n[s], !0, a, o)
			} else if (void 0 !== r && (i = !0, Z.isFunction(r) || (o = !0), u && (o ? (t.call(e, r), t = null) : (u = t, t = function(e, t, n) {
				return u.call(Z(e), n)
			})), t)) for (; s < l; s++) t(e[s], n, o ? r : r.call(e[s], s, t(e[s], n)));
			return i ? e : u ? t.call(e) : l ? t(e[0], n) : a
		};
	Z.acceptData = function(e) {
		return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
	}, s.uid = 1, s.accepts = Z.acceptData, s.prototype = {
		key: function(e) {
			if (!s.accepts(e)) return 0;
			var t = {},
				n = e[this.expando];
			if (!n) {
				n = s.uid++;
				try {
					t[this.expando] = {
						value: n
					}, Object.defineProperties(e, t)
				} catch (r) {
					t[this.expando] = n, Z.extend(e, t)
				}
			}
			return this.cache[n] || (this.cache[n] = {}), n
		},
		set: function(e, t, n) {
			var r, i = this.key(e),
				a = this.cache[i];
			if ("string" == typeof t) a[t] = n;
			else if (Z.isEmptyObject(a)) Z.extend(this.cache[i], t);
			else for (r in t) a[r] = t[r];
			return a
		},
		get: function(e, t) {
			var n = this.cache[this.key(e)];
			return void 0 === t ? n : n[t]
		},
		access: function(e, t, n) {
			var r;
			return void 0 === t || t && "string" == typeof t && void 0 === n ? (r = this.get(e, t), void 0 !== r ? r : this.get(e, Z.camelCase(t))) : (this.set(e, t, n), void 0 !== n ? n : t)
		},
		remove: function(e, t) {
			var n, r, i, a = this.key(e),
				o = this.cache[a];
			if (void 0 === t) this.cache[a] = {};
			else {
				Z.isArray(t) ? r = t.concat(t.map(Z.camelCase)) : (i = Z.camelCase(t), t in o ? r = [t, i] : (r = i, r = r in o ? [r] : r.match(fe) || [])), n = r.length;
				for (; n--;) delete o[r[n]]
			}
		},
		hasData: function(e) {
			return !Z.isEmptyObject(this.cache[e[this.expando]] || {})
		},
		discard: function(e) {
			e[this.expando] && delete this.cache[e[this.expando]]
		}
	};
	var ge = new s,
		ye = new s,
		ve = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
		Ee = /([A-Z])/g;
	Z.extend({
		hasData: function(e) {
			return ye.hasData(e) || ge.hasData(e)
		},
		data: function(e, t, n) {
			return ye.access(e, t, n)
		},
		removeData: function(e, t) {
			ye.remove(e, t)
		},
		_data: function(e, t, n) {
			return ge.access(e, t, n)
		},
		_removeData: function(e, t) {
			ge.remove(e, t)
		}
	}), Z.fn.extend({
		data: function(e, t) {
			var n, r, i, a = this[0],
				o = a && a.attributes;
			if (void 0 === e) {
				if (this.length && (i = ye.get(a), 1 === a.nodeType && !ge.get(a, "hasDataAttrs"))) {
					for (n = o.length; n--;) o[n] && (r = o[n].name, 0 === r.indexOf("data-") && (r = Z.camelCase(r.slice(5)), l(a, r, i[r])));
					ge.set(a, "hasDataAttrs", !0)
				}
				return i
			}
			return "object" == typeof e ? this.each(function() {
				ye.set(this, e)
			}) : _e(this, function(t) {
				var n, r = Z.camelCase(e);
				if (a && void 0 === t) {
					if (n = ye.get(a, e), void 0 !== n) return n;
					if (n = ye.get(a, r), void 0 !== n) return n;
					if (n = l(a, r, void 0), void 0 !== n) return n
				} else this.each(function() {
					var n = ye.get(this, r);
					ye.set(this, r, t), e.indexOf("-") !== -1 && void 0 !== n && ye.set(this, e, t)
				})
			}, null, t, arguments.length > 1, null, !0)
		},
		removeData: function(e) {
			return this.each(function() {
				ye.remove(this, e)
			})
		}
	}), Z.extend({
		queue: function(e, t, n) {
			var r;
			if (e) return t = (t || "fx") + "queue", r = ge.get(e, t), n && (!r || Z.isArray(n) ? r = ge.access(e, t, Z.makeArray(n)) : r.push(n)), r || []
		},
		dequeue: function(e, t) {
			t = t || "fx";
			var n = Z.queue(e, t),
				r = n.length,
				i = n.shift(),
				a = Z._queueHooks(e, t),
				o = function() {
					Z.dequeue(e, t)
				};
			"inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete a.stop, i.call(e, o, a)), !r && a && a.empty.fire()
		},
		_queueHooks: function(e, t) {
			var n = t + "queueHooks";
			return ge.get(e, n) || ge.access(e, n, {
				empty: Z.Callbacks("once memory").add(function() {
					ge.remove(e, [t + "queue", n])
				})
			})
		}
	}), Z.fn.extend({
		queue: function(e, t) {
			var n = 2;
			return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? Z.queue(this[0], e) : void 0 === t ? this : this.each(function() {
				var n = Z.queue(this, e, t);
				Z._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && Z.dequeue(this, e)
			})
		},
		dequeue: function(e) {
			return this.each(function() {
				Z.dequeue(this, e)
			})
		},
		clearQueue: function(e) {
			return this.queue(e || "fx", [])
		},
		promise: function(e, t) {
			var n, r = 1,
				i = Z.Deferred(),
				a = this,
				o = this.length,
				s = function() {
					--r || i.resolveWith(a, [a])
				};
			for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; o--;) n = ge.get(a[o], e + "queueHooks"), n && n.empty && (r++, n.empty.add(s));
			return s(), i.promise(t)
		}
	});
	var be = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
		Ue = ["Top", "Right", "Bottom", "Left"],
		we = function(e, t) {
			return e = t || e, "none" === Z.css(e, "display") || !Z.contains(e.ownerDocument, e)
		},
		ke = /^(?:checkbox|radio)$/i;
	!
	function() {
		var e = X.createDocumentFragment(),
			t = e.appendChild(X.createElement("div")),
			n = X.createElement("input");
		n.setAttribute("type", "radio"), n.setAttribute("checked", "checked"), n.setAttribute("name", "t"), t.appendChild(n), K.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked, t.innerHTML = "<textarea>x</textarea>", K.noCloneChecked = !! t.cloneNode(!0).lastChild.defaultValue
	}();
	var Me = "undefined";
	K.focusinBubbles = "onfocusin" in e;
	var Le = /^key/,
		Fe = /^(?:mouse|pointer|contextmenu)|click/,
		De = /^(?:focusinfocus|focusoutblur)$/,
		xe = /^([^.]*)(?:\.(.+)|)$/;
	Z.event = {
		global: {},
		add: function(e, t, n, r, i) {
			var a, o, s, l, u, c, d, h, f, p, m, _ = ge.get(e);
			if (_) for (n.handler && (a = n, n = a.handler, i = a.selector), n.guid || (n.guid = Z.guid++), (l = _.events) || (l = _.events = {}), (o = _.handle) || (o = _.handle = function(t) {
				return typeof Z !== Me && Z.event.triggered !== t.type ? Z.event.dispatch.apply(e, arguments) : void 0
			}), t = (t || "").match(fe) || [""], u = t.length; u--;) s = xe.exec(t[u]) || [], f = m = s[1], p = (s[2] || "").split(".").sort(), f && (d = Z.event.special[f] || {}, f = (i ? d.delegateType : d.bindType) || f, d = Z.event.special[f] || {}, c = Z.extend({
				type: f,
				origType: m,
				data: r,
				handler: n,
				guid: n.guid,
				selector: i,
				needsContext: i && Z.expr.match.needsContext.test(i),
				namespace: p.join(".")
			}, a), (h = l[f]) || (h = l[f] = [], h.delegateCount = 0, d.setup && d.setup.call(e, r, p, o) !== !1 || e.addEventListener && e.addEventListener(f, o, !1)), d.add && (d.add.call(e, c), c.handler.guid || (c.handler.guid = n.guid)), i ? h.splice(h.delegateCount++, 0, c) : h.push(c), Z.event.global[f] = !0)
		},
		remove: function(e, t, n, r, i) {
			var a, o, s, l, u, c, d, h, f, p, m, _ = ge.hasData(e) && ge.get(e);
			if (_ && (l = _.events)) {
				for (t = (t || "").match(fe) || [""], u = t.length; u--;) if (s = xe.exec(t[u]) || [], f = m = s[1], p = (s[2] || "").split(".").sort(), f) {
					for (d = Z.event.special[f] || {}, f = (r ? d.delegateType : d.bindType) || f, h = l[f] || [], s = s[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), o = a = h.length; a--;) c = h[a], !i && m !== c.origType || n && n.guid !== c.guid || s && !s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (h.splice(a, 1), c.selector && h.delegateCount--, d.remove && d.remove.call(e, c));
					o && !h.length && (d.teardown && d.teardown.call(e, p, _.handle) !== !1 || Z.removeEvent(e, f, _.handle), delete l[f])
				} else for (f in l) Z.event.remove(e, f + t[u], n, r, !0);
				Z.isEmptyObject(l) && (delete _.handle, ge.remove(e, "events"))
			}
		},
		trigger: function(t, n, r, i) {
			var a, o, s, l, u, c, d, h = [r || X],
				f = G.call(t, "type") ? t.type : t,
				p = G.call(t, "namespace") ? t.namespace.split(".") : [];
			if (o = s = r = r || X, 3 !== r.nodeType && 8 !== r.nodeType && !De.test(f + Z.event.triggered) && (f.indexOf(".") >= 0 && (p = f.split("."), f = p.shift(), p.sort()), u = f.indexOf(":") < 0 && "on" + f, t = t[Z.expando] ? t : new Z.Event(f, "object" == typeof t && t), t.isTrigger = i ? 2 : 3, t.namespace = p.join("."), t.namespace_re = t.namespace ? new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = r), n = null == n ? [t] : Z.makeArray(n, [t]), d = Z.event.special[f] || {}, i || !d.trigger || d.trigger.apply(r, n) !== !1)) {
				if (!i && !d.noBubble && !Z.isWindow(r)) {
					for (l = d.delegateType || f, De.test(l + f) || (o = o.parentNode); o; o = o.parentNode) h.push(o), s = o;
					s === (r.ownerDocument || X) && h.push(s.defaultView || s.parentWindow || e)
				}
				for (a = 0;
				(o = h[a++]) && !t.isPropagationStopped();) t.type = a > 1 ? l : d.bindType || f, c = (ge.get(o, "events") || {})[t.type] && ge.get(o, "handle"), c && c.apply(o, n), c = u && o[u], c && c.apply && Z.acceptData(o) && (t.result = c.apply(o, n), t.result === !1 && t.preventDefault());
				return t.type = f, i || t.isDefaultPrevented() || d._default && d._default.apply(h.pop(), n) !== !1 || !Z.acceptData(r) || u && Z.isFunction(r[f]) && !Z.isWindow(r) && (s = r[u], s && (r[u] = null), Z.event.triggered = f, r[f](), Z.event.triggered = void 0, s && (r[u] = s)), t.result
			}
		},
		dispatch: function(e) {
			e = Z.event.fix(e);
			var t, n, r, i, a, o = [],
				s = W.call(arguments),
				l = (ge.get(this, "events") || {})[e.type] || [],
				u = Z.event.special[e.type] || {};
			if (s[0] = e, e.delegateTarget = this, !u.preDispatch || u.preDispatch.call(this, e) !== !1) {
				for (o = Z.event.handlers.call(this, e, l), t = 0;
				(i = o[t++]) && !e.isPropagationStopped();) for (e.currentTarget = i.elem, n = 0;
				(a = i.handlers[n++]) && !e.isImmediatePropagationStopped();) e.namespace_re && !e.namespace_re.test(a.namespace) || (e.handleObj = a, e.data = a.data, r = ((Z.event.special[a.origType] || {}).handle || a.handler).apply(i.elem, s), void 0 !== r && (e.result = r) === !1 && (e.preventDefault(), e.stopPropagation()));
				return u.postDispatch && u.postDispatch.call(this, e), e.result
			}
		},
		handlers: function(e, t) {
			var n, r, i, a, o = [],
				s = t.delegateCount,
				l = e.target;
			if (s && l.nodeType && (!e.button || "click" !== e.type)) for (; l !== this; l = l.parentNode || this) if (l.disabled !== !0 || "click" !== e.type) {
				for (r = [], n = 0; n < s; n++) a = t[n], i = a.selector + " ", void 0 === r[i] && (r[i] = a.needsContext ? Z(i, this).index(l) >= 0 : Z.find(i, this, null, [l]).length), r[i] && r.push(a);
				r.length && o.push({
					elem: l,
					handlers: r
				})
			}
			return s < t.length && o.push({
				elem: this,
				handlers: t.slice(s)
			}), o
		},
		props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
		fixHooks: {},
		keyHooks: {
			props: "char charCode key keyCode".split(" "),
			filter: function(e, t) {
				return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
			}
		},
		mouseHooks: {
			props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
			filter: function(e, t) {
				var n, r, i, a = t.button;
				return null == e.pageX && null != t.clientX && (n = e.target.ownerDocument || X, r = n.documentElement, i = n.body, e.pageX = t.clientX + (r && r.scrollLeft || i && i.scrollLeft || 0) - (r && r.clientLeft || i && i.clientLeft || 0), e.pageY = t.clientY + (r && r.scrollTop || i && i.scrollTop || 0) - (r && r.clientTop || i && i.clientTop || 0)), e.which || void 0 === a || (e.which = 1 & a ? 1 : 2 & a ? 3 : 4 & a ? 2 : 0), e
			}
		},
		fix: function(e) {
			if (e[Z.expando]) return e;
			var t, n, r, i = e.type,
				a = e,
				o = this.fixHooks[i];
			for (o || (this.fixHooks[i] = o = Fe.test(i) ? this.mouseHooks : Le.test(i) ? this.keyHooks : {}), r = o.props ? this.props.concat(o.props) : this.props, e = new Z.Event(a), t = r.length; t--;) n = r[t], e[n] = a[n];
			return e.target || (e.target = X), 3 === e.target.nodeType && (e.target = e.target.parentNode), o.filter ? o.filter(e, a) : e
		},
		special: {
			load: {
				noBubble: !0
			},
			focus: {
				trigger: function() {
					if (this !== d() && this.focus) return this.focus(), !1
				},
				delegateType: "focusin"
			},
			blur: {
				trigger: function() {
					if (this === d() && this.blur) return this.blur(), !1
				},
				delegateType: "focusout"
			},
			click: {
				trigger: function() {
					if ("checkbox" === this.type && this.click && Z.nodeName(this, "input")) return this.click(), !1
				},
				_default: function(e) {
					return Z.nodeName(e.target, "a")
				}
			},
			beforeunload: {
				postDispatch: function(e) {
					void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
				}
			}
		},
		simulate: function(e, t, n, r) {
			var i = Z.extend(new Z.Event, n, {
				type: e,
				isSimulated: !0,
				originalEvent: {}
			});
			r ? Z.event.trigger(i, null, t) : Z.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
		}
	}, Z.removeEvent = function(e, t, n) {
		e.removeEventListener && e.removeEventListener(t, n, !1)
	}, Z.Event = function(e, t) {
		return this instanceof Z.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && e.returnValue === !1 ? u : c) : this.type = e, t && Z.extend(this, t), this.timeStamp = e && e.timeStamp || Z.now(), void(this[Z.expando] = !0)) : new Z.Event(e, t)
	}, Z.Event.prototype = {
		isDefaultPrevented: c,
		isPropagationStopped: c,
		isImmediatePropagationStopped: c,
		preventDefault: function() {
			var e = this.originalEvent;
			this.isDefaultPrevented = u, e && e.preventDefault && e.preventDefault()
		},
		stopPropagation: function() {
			var e = this.originalEvent;
			this.isPropagationStopped = u, e && e.stopPropagation && e.stopPropagation()
		},
		stopImmediatePropagation: function() {
			var e = this.originalEvent;
			this.isImmediatePropagationStopped = u, e && e.stopImmediatePropagation && e.stopImmediatePropagation(), this.stopPropagation()
		}
	}, Z.each({
		mouseenter: "mouseover",
		mouseleave: "mouseout",
		pointerenter: "pointerover",
		pointerleave: "pointerout"
	}, function(e, t) {
		Z.event.special[e] = {
			delegateType: t,
			bindType: t,
			handle: function(e) {
				var n, r = this,
					i = e.relatedTarget,
					a = e.handleObj;
				return i && (i === r || Z.contains(r, i)) || (e.type = a.origType, n = a.handler.apply(this, arguments), e.type = t), n
			}
		}
	}), K.focusinBubbles || Z.each({
		focus: "focusin",
		blur: "focusout"
	}, function(e, t) {
		var n = function(e) {
				Z.event.simulate(t, e.target, Z.event.fix(e), !0)
			};
		Z.event.special[t] = {
			setup: function() {
				var r = this.ownerDocument || this,
					i = ge.access(r, t);
				i || r.addEventListener(e, n, !0), ge.access(r, t, (i || 0) + 1)
			},
			teardown: function() {
				var r = this.ownerDocument || this,
					i = ge.access(r, t) - 1;
				i ? ge.access(r, t, i) : (r.removeEventListener(e, n, !0), ge.remove(r, t))
			}
		}
	}), Z.fn.extend({
		on: function(e, t, n, r, i) {
			var a, o;
			if ("object" == typeof e) {
				"string" != typeof t && (n = n || t, t = void 0);
				for (o in e) this.on(o, t, n, e[o], i);
				return this
			}
			if (null == n && null == r ? (r = t, n = t = void 0) : null == r && ("string" == typeof t ? (r = n, n = void 0) : (r = n, n = t, t = void 0)), r === !1) r = c;
			else if (!r) return this;
			return 1 === i && (a = r, r = function(e) {
				return Z().off(e), a.apply(this, arguments)
			}, r.guid = a.guid || (a.guid = Z.guid++)), this.each(function() {
				Z.event.add(this, e, r, n, t)
			})
		},
		one: function(e, t, n, r) {
			return this.on(e, t, n, r, 1)
		},
		off: function(e, t, n) {
			var r, i;
			if (e && e.preventDefault && e.handleObj) return r = e.handleObj, Z(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
			if ("object" == typeof e) {
				for (i in e) this.off(i, t, e[i]);
				return this
			}
			return t !== !1 && "function" != typeof t || (n = t, t = void 0), n === !1 && (n = c), this.each(function() {
				Z.event.remove(this, e, n, t)
			})
		},
		trigger: function(e, t) {
			return this.each(function() {
				Z.event.trigger(e, t, this)
			})
		},
		triggerHandler: function(e, t) {
			var n = this[0];
			if (n) return Z.event.trigger(e, t, n, !0)
		}
	});
	var Te = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
		Ye = /<([\w:]+)/,
		Se = /<|&#?\w+;/,
		Ae = /<(?:script|style|link)/i,
		Ce = /checked\s*(?:[^=]|=\s*.checked.)/i,
		je = /^$|\/(?:java|ecma)script/i,
		He = /^true\/(.*)/,
		Be = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
		$e = {
			option: [1, "<select multiple='multiple'>", "</select>"],
			thead: [1, "<table>", "</table>"],
			col: [2, "<table><colgroup>", "</colgroup></table>"],
			tr: [2, "<table><tbody>", "</tbody></table>"],
			td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
			_default: [0, "", ""]
		};
	$e.optgroup = $e.option, $e.tbody = $e.tfoot = $e.colgroup = $e.caption = $e.thead, $e.th = $e.td, Z.extend({
		clone: function(e, t, n) {
			var r, i, a, o, s = e.cloneNode(!0),
				l = Z.contains(e.ownerDocument, e);
			if (!(K.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || Z.isXMLDoc(e))) for (o = g(s), a = g(e), r = 0, i = a.length; r < i; r++) y(a[r], o[r]);
			if (t) if (n) for (a = a || g(e), o = o || g(s), r = 0, i = a.length; r < i; r++) _(a[r], o[r]);
			else _(e, s);
			return o = g(s, "script"), o.length > 0 && m(o, !l && g(e, "script")), s
		},
		buildFragment: function(e, t, n, r) {
			for (var i, a, o, s, l, u, c = t.createDocumentFragment(), d = [], h = 0, f = e.length; h < f; h++) if (i = e[h], i || 0 === i) if ("object" === Z.type(i)) Z.merge(d, i.nodeType ? [i] : i);
			else if (Se.test(i)) {
				for (a = a || c.appendChild(t.createElement("div")), o = (Ye.exec(i) || ["", ""])[1].toLowerCase(), s = $e[o] || $e._default, a.innerHTML = s[1] + i.replace(Te, "<$1></$2>") + s[2], u = s[0]; u--;) a = a.lastChild;
				Z.merge(d, a.childNodes), a = c.firstChild, a.textContent = ""
			} else d.push(t.createTextNode(i));
			for (c.textContent = "", h = 0; i = d[h++];) if ((!r || Z.inArray(i, r) === -1) && (l = Z.contains(i.ownerDocument, i), a = g(c.appendChild(i), "script"), l && m(a), n)) for (u = 0; i = a[u++];) je.test(i.type || "") && n.push(i);
			return c
		},
		cleanData: function(e) {
			for (var t, n, r, i, a = Z.event.special, o = 0; void 0 !== (n = e[o]); o++) {
				if (Z.acceptData(n) && (i = n[ge.expando], i && (t = ge.cache[i]))) {
					if (t.events) for (r in t.events) a[r] ? Z.event.remove(n, r) : Z.removeEvent(n, r, t.handle);
					ge.cache[i] && delete ge.cache[i]
				}
				delete ye.cache[n[ye.expando]]
			}
		}
	}), Z.fn.extend({
		text: function(e) {
			return _e(this, function(e) {
				return void 0 === e ? Z.text(this) : this.empty().each(function() {
					1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
				})
			}, null, e, arguments.length)
		},
		append: function() {
			return this.domManip(arguments, function(e) {
				if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
					var t = h(this, e);
					t.appendChild(e)
				}
			})
		},
		prepend: function() {
			return this.domManip(arguments, function(e) {
				if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
					var t = h(this, e);
					t.insertBefore(e, t.firstChild)
				}
			})
		},
		before: function() {
			return this.domManip(arguments, function(e) {
				this.parentNode && this.parentNode.insertBefore(e, this)
			})
		},
		after: function() {
			return this.domManip(arguments, function(e) {
				this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
			})
		},
		remove: function(e, t) {
			for (var n, r = e ? Z.filter(e, this) : this, i = 0; null != (n = r[i]); i++) t || 1 !== n.nodeType || Z.cleanData(g(n)), n.parentNode && (t && Z.contains(n.ownerDocument, n) && m(g(n, "script")), n.parentNode.removeChild(n));
			return this
		},
		empty: function() {
			for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (Z.cleanData(g(e, !1)), e.textContent = "");
			return this
		},
		clone: function(e, t) {
			return e = null != e && e, t = null == t ? e : t, this.map(function() {
				return Z.clone(this, e, t)
			})
		},
		html: function(e) {
			return _e(this, function(e) {
				var t = this[0] || {},
					n = 0,
					r = this.length;
				if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
				if ("string" == typeof e && !Ae.test(e) && !$e[(Ye.exec(e) || ["", ""])[1].toLowerCase()]) {
					e = e.replace(Te, "<$1></$2>");
					try {
						for (; n < r; n++) t = this[n] || {}, 1 === t.nodeType && (Z.cleanData(g(t, !1)), t.innerHTML = e);
						t = 0
					} catch (i) {}
				}
				t && this.empty().append(e)
			}, null, e, arguments.length)
		},
		replaceWith: function() {
			var e = arguments[0];
			return this.domManip(arguments, function(t) {
				e = this.parentNode, Z.cleanData(g(this)), e && e.replaceChild(t, this)
			}), e && (e.length || e.nodeType) ? this : this.remove()
		},
		detach: function(e) {
			return this.remove(e, !0)
		},
		domManip: function(e, t) {
			e = R.apply([], e);
			var n, r, i, a, o, s, l = 0,
				u = this.length,
				c = this,
				d = u - 1,
				h = e[0],
				m = Z.isFunction(h);
			if (m || u > 1 && "string" == typeof h && !K.checkClone && Ce.test(h)) return this.each(function(n) {
				var r = c.eq(n);
				m && (e[0] = h.call(this, n, r.html())), r.domManip(e, t)
			});
			if (u && (n = Z.buildFragment(e, this[0].ownerDocument, !1, this), r = n.firstChild, 1 === n.childNodes.length && (n = r), r)) {
				for (i = Z.map(g(n, "script"), f), a = i.length; l < u; l++) o = n, l !== d && (o = Z.clone(o, !0, !0), a && Z.merge(i, g(o, "script"))), t.call(this[l], o, l);
				if (a) for (s = i[i.length - 1].ownerDocument, Z.map(i, p), l = 0; l < a; l++) o = i[l], je.test(o.type || "") && !ge.access(o, "globalEval") && Z.contains(s, o) && (o.src ? Z._evalUrl && Z._evalUrl(o.src) : Z.globalEval(o.textContent.replace(Be, "")))
			}
			return this
		}
	}), Z.each({
		appendTo: "append",
		prependTo: "prepend",
		insertBefore: "before",
		insertAfter: "after",
		replaceAll: "replaceWith"
	}, function(e, t) {
		Z.fn[e] = function(e) {
			for (var n, r = [], i = Z(e), a = i.length - 1, o = 0; o <= a; o++) n = o === a ? this : this.clone(!0), Z(i[o])[t](n), z.apply(r, n.get());
			return this.pushStack(r)
		}
	});
	var Pe, Oe = {},
		Ie = /^margin/,
		Ne = new RegExp("^(" + be + ")(?!px)[a-z%]+$", "i"),
		We = function(t) {
			return t.ownerDocument.defaultView.opener ? t.ownerDocument.defaultView.getComputedStyle(t, null) : e.getComputedStyle(t, null)
		};
	!
	function() {
		function t() {
			o.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", o.innerHTML = "", i.appendChild(a);
			var t = e.getComputedStyle(o, null);
			n = "1%" !== t.top, r = "4px" === t.width, i.removeChild(a)
		}
		var n, r, i = X.documentElement,
			a = X.createElement("div"),
			o = X.createElement("div");
		o.style && (o.style.backgroundClip = "content-box", o.cloneNode(!0).style.backgroundClip = "", K.clearCloneStyle = "content-box" === o.style.backgroundClip, a.style.cssText = "border:0;width:0;height:0;top:0;left:-9999px;margin-top:1px;position:absolute", a.appendChild(o), e.getComputedStyle && Z.extend(K, {
			pixelPosition: function() {
				return t(), n
			},
			boxSizingReliable: function() {
				return null == r && t(), r
			},
			reliableMarginRight: function() {
				var t, n = o.appendChild(X.createElement("div"));
				return n.style.cssText = o.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", n.style.marginRight = n.style.width = "0", o.style.width = "1px", i.appendChild(a), t = !parseFloat(e.getComputedStyle(n, null).marginRight), i.removeChild(a), o.removeChild(n), t
			}
		}))
	}(), Z.swap = function(e, t, n, r) {
		var i, a, o = {};
		for (a in t) o[a] = e.style[a], e.style[a] = t[a];
		i = n.apply(e, r || []);
		for (a in t) e.style[a] = o[a];
		return i
	};
	var Re = /^(none|table(?!-c[ea]).+)/,
		ze = new RegExp("^(" + be + ")(.*)$", "i"),
		qe = new RegExp("^([+-])=(" + be + ")", "i"),
		Je = {
			position: "absolute",
			visibility: "hidden",
			display: "block"
		},
		Ve = {
			letterSpacing: "0",
			fontWeight: "400"
		},
		Ge = ["Webkit", "O", "Moz", "ms"];
	Z.extend({
		cssHooks: {
			opacity: {
				get: function(e, t) {
					if (t) {
						var n = b(e, "opacity");
						return "" === n ? "1" : n
					}
				}
			}
		},
		cssNumber: {
			columnCount: !0,
			fillOpacity: !0,
			flexGrow: !0,
			flexShrink: !0,
			fontWeight: !0,
			lineHeight: !0,
			opacity: !0,
			order: !0,
			orphans: !0,
			widows: !0,
			zIndex: !0,
			zoom: !0
		},
		cssProps: {
			"float": "cssFloat"
		},
		style: function(e, t, n, r) {
			if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
				var i, a, o, s = Z.camelCase(t),
					l = e.style;
				return t = Z.cssProps[s] || (Z.cssProps[s] = w(l, s)), o = Z.cssHooks[t] || Z.cssHooks[s], void 0 === n ? o && "get" in o && void 0 !== (i = o.get(e, !1, r)) ? i : l[t] : (a = typeof n, "string" === a && (i = qe.exec(n)) && (n = (i[1] + 1) * i[2] + parseFloat(Z.css(e, t)), a = "number"), null != n && n === n && ("number" !== a || Z.cssNumber[s] || (n += "px"), K.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"), o && "set" in o && void 0 === (n = o.set(e, n, r)) || (l[t] = n)), void 0)
			}
		},
		css: function(e, t, n, r) {
			var i, a, o, s = Z.camelCase(t);
			return t = Z.cssProps[s] || (Z.cssProps[s] = w(e.style, s)), o = Z.cssHooks[t] || Z.cssHooks[s], o && "get" in o && (i = o.get(e, !0, n)), void 0 === i && (i = b(e, t, r)), "normal" === i && t in Ve && (i = Ve[t]), "" === n || n ? (a = parseFloat(i), n === !0 || Z.isNumeric(a) ? a || 0 : i) : i
		}
	}), Z.each(["height", "width"], function(e, t) {
		Z.cssHooks[t] = {
			get: function(e, n, r) {
				if (n) return Re.test(Z.css(e, "display")) && 0 === e.offsetWidth ? Z.swap(e, Je, function() {
					return L(e, t, r)
				}) : L(e, t, r)
			},
			set: function(e, n, r) {
				var i = r && We(e);
				return k(e, n, r ? M(e, t, r, "border-box" === Z.css(e, "boxSizing", !1, i), i) : 0)
			}
		}
	}), Z.cssHooks.marginRight = U(K.reliableMarginRight, function(e, t) {
		if (t) return Z.swap(e, {
			display: "inline-block"
		}, b, [e, "marginRight"])
	}), Z.each({
		margin: "",
		padding: "",
		border: "Width"
	}, function(e, t) {
		Z.cssHooks[e + t] = {
			expand: function(n) {
				for (var r = 0, i = {}, a = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++) i[e + Ue[r] + t] = a[r] || a[r - 2] || a[0];
				return i
			}
		}, Ie.test(e) || (Z.cssHooks[e + t].set = k)
	}), Z.fn.extend({
		css: function(e, t) {
			return _e(this, function(e, t, n) {
				var r, i, a = {},
					o = 0;
				if (Z.isArray(t)) {
					for (r = We(e), i = t.length; o < i; o++) a[t[o]] = Z.css(e, t[o], !1, r);
					return a
				}
				return void 0 !== n ? Z.style(e, t, n) : Z.css(e, t)
			}, e, t, arguments.length > 1)
		},
		show: function() {
			return F(this, !0)
		},
		hide: function() {
			return F(this)
		},
		toggle: function(e) {
			return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
				we(this) ? Z(this).show() : Z(this).hide()
			})
		}
	}), Z.Tween = D, D.prototype = {
		constructor: D,
		init: function(e, t, n, r, i, a) {
			this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = a || (Z.cssNumber[n] ? "" : "px")
		},
		cur: function() {
			var e = D.propHooks[this.prop];
			return e && e.get ? e.get(this) : D.propHooks._default.get(this)
		},
		run: function(e) {
			var t, n = D.propHooks[this.prop];
			return this.options.duration ? this.pos = t = Z.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : D.propHooks._default.set(this), this
		}
	}, D.prototype.init.prototype = D.prototype, D.propHooks = {
		_default: {
			get: function(e) {
				var t;
				return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = Z.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
			},
			set: function(e) {
				Z.fx.step[e.prop] ? Z.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[Z.cssProps[e.prop]] || Z.cssHooks[e.prop]) ? Z.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
			}
		}
	}, D.propHooks.scrollTop = D.propHooks.scrollLeft = {
		set: function(e) {
			e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
		}
	}, Z.easing = {
		linear: function(e) {
			return e
		},
		swing: function(e) {
			return .5 - Math.cos(e * Math.PI) / 2
		}
	}, Z.fx = D.prototype.init, Z.fx.step = {};
	var Ke, Xe, Qe = /^(?:toggle|show|hide)$/,
		Ze = new RegExp("^(?:([+-])=|)(" + be + ")([a-z%]*)$", "i"),
		et = /queueHooks$/,
		tt = [S],
		nt = {
			"*": [function(e, t) {
				var n = this.createTween(e, t),
					r = n.cur(),
					i = Ze.exec(t),
					a = i && i[3] || (Z.cssNumber[e] ? "" : "px"),
					o = (Z.cssNumber[e] || "px" !== a && +r) && Ze.exec(Z.css(n.elem, e)),
					s = 1,
					l = 20;
				if (o && o[3] !== a) {
					a = a || o[3], i = i || [], o = +r || 1;
					do s = s || ".5", o /= s, Z.style(n.elem, e, o + a);
					while (s !== (s = n.cur() / r) && 1 !== s && --l)
				}
				return i && (o = n.start = +o || +r || 0, n.unit = a, n.end = i[1] ? o + (i[1] + 1) * i[2] : +i[2]), n
			}]
		};
	Z.Animation = Z.extend(C, {
		tweener: function(e, t) {
			Z.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
			for (var n, r = 0, i = e.length; r < i; r++) n = e[r], nt[n] = nt[n] || [], nt[n].unshift(t)
		},
		prefilter: function(e, t) {
			t ? tt.unshift(e) : tt.push(e)
		}
	}), Z.speed = function(e, t, n) {
		var r = e && "object" == typeof e ? Z.extend({}, e) : {
			complete: n || !n && t || Z.isFunction(e) && e,
			duration: e,
			easing: n && t || t && !Z.isFunction(t) && t
		};
		return r.duration = Z.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in Z.fx.speeds ? Z.fx.speeds[r.duration] : Z.fx.speeds._default, null != r.queue && r.queue !== !0 || (r.queue = "fx"), r.old = r.complete, r.complete = function() {
			Z.isFunction(r.old) && r.old.call(this), r.queue && Z.dequeue(this, r.queue)
		}, r
	}, Z.fn.extend({
		fadeTo: function(e, t, n, r) {
			return this.filter(we).css("opacity", 0).show().end().animate({
				opacity: t
			}, e, n, r)
		},
		animate: function(e, t, n, r) {
			var i = Z.isEmptyObject(e),
				a = Z.speed(t, n, r),
				o = function() {
					var t = C(this, Z.extend({}, e), a);
					(i || ge.get(this, "finish")) && t.stop(!0)
				};
			return o.finish = o, i || a.queue === !1 ? this.each(o) : this.queue(a.queue, o)
		},
		stop: function(e, t, n) {
			var r = function(e) {
					var t = e.stop;
					delete e.stop, t(n)
				};
			return "string" != typeof e && (n = t, t = e, e = void 0), t && e !== !1 && this.queue(e || "fx", []), this.each(function() {
				var t = !0,
					i = null != e && e + "queueHooks",
					a = Z.timers,
					o = ge.get(this);
				if (i) o[i] && o[i].stop && r(o[i]);
				else for (i in o) o[i] && o[i].stop && et.test(i) && r(o[i]);
				for (i = a.length; i--;) a[i].elem !== this || null != e && a[i].queue !== e || (a[i].anim.stop(n), t = !1, a.splice(i, 1));
				!t && n || Z.dequeue(this, e)
			})
		},
		finish: function(e) {
			return e !== !1 && (e = e || "fx"), this.each(function() {
				var t, n = ge.get(this),
					r = n[e + "queue"],
					i = n[e + "queueHooks"],
					a = Z.timers,
					o = r ? r.length : 0;
				for (n.finish = !0, Z.queue(this, e, []), i && i.stop && i.stop.call(this, !0), t = a.length; t--;) a[t].elem === this && a[t].queue === e && (a[t].anim.stop(!0), a.splice(t, 1));
				for (t = 0; t < o; t++) r[t] && r[t].finish && r[t].finish.call(this);
				delete n.finish
			})
		}
	}), Z.each(["toggle", "show", "hide"], function(e, t) {
		var n = Z.fn[t];
		Z.fn[t] = function(e, r, i) {
			return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(T(t, !0), e, r, i)
		}
	}), Z.each({
		slideDown: T("show"),
		slideUp: T("hide"),
		slideToggle: T("toggle"),
		fadeIn: {
			opacity: "show"
		},
		fadeOut: {
			opacity: "hide"
		},
		fadeToggle: {
			opacity: "toggle"
		}
	}, function(e, t) {
		Z.fn[e] = function(e, n, r) {
			return this.animate(t, e, n, r)
		}
	}), Z.timers = [], Z.fx.tick = function() {
		var e, t = 0,
			n = Z.timers;
		for (Ke = Z.now(); t < n.length; t++) e = n[t], e() || n[t] !== e || n.splice(t--, 1);
		n.length || Z.fx.stop(), Ke = void 0
	}, Z.fx.timer = function(e) {
		Z.timers.push(e), e() ? Z.fx.start() : Z.timers.pop()
	}, Z.fx.interval = 13, Z.fx.start = function() {
		Xe || (Xe = setInterval(Z.fx.tick, Z.fx.interval))
	}, Z.fx.stop = function() {
		clearInterval(Xe), Xe = null
	}, Z.fx.speeds = {
		slow: 600,
		fast: 200,
		_default: 400
	}, Z.fn.delay = function(e, t) {
		return e = Z.fx ? Z.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
			var r = setTimeout(t, e);
			n.stop = function() {
				clearTimeout(r)
			}
		})
	}, function() {
		var e = X.createElement("input"),
			t = X.createElement("select"),
			n = t.appendChild(X.createElement("option"));
		e.type = "checkbox", K.checkOn = "" !== e.value, K.optSelected = n.selected, t.disabled = !0, K.optDisabled = !n.disabled, e = X.createElement("input"), e.value = "t", e.type = "radio", K.radioValue = "t" === e.value
	}();
	var rt, it, at = Z.expr.attrHandle;
	Z.fn.extend({
		attr: function(e, t) {
			return _e(this, Z.attr, e, t, arguments.length > 1)
		},
		removeAttr: function(e) {
			return this.each(function() {
				Z.removeAttr(this, e)
			})
		}
	}), Z.extend({
		attr: function(e, t, n) {
			var r, i, a = e.nodeType;
			if (e && 3 !== a && 8 !== a && 2 !== a) return typeof e.getAttribute === Me ? Z.prop(e, t, n) : (1 === a && Z.isXMLDoc(e) || (t = t.toLowerCase(), r = Z.attrHooks[t] || (Z.expr.match.bool.test(t) ? it : rt)), void 0 === n ? r && "get" in r && null !== (i = r.get(e, t)) ? i : (i = Z.find.attr(e, t), null == i ? void 0 : i) : null !== n ? r && "set" in r && void 0 !== (i = r.set(e, n, t)) ? i : (e.setAttribute(t, n + ""), n) : void Z.removeAttr(e, t))
		},
		removeAttr: function(e, t) {
			var n, r, i = 0,
				a = t && t.match(fe);
			if (a && 1 === e.nodeType) for (; n = a[i++];) r = Z.propFix[n] || n, Z.expr.match.bool.test(n) && (e[r] = !1), e.removeAttribute(n)
		},
		attrHooks: {
			type: {
				set: function(e, t) {
					if (!K.radioValue && "radio" === t && Z.nodeName(e, "input")) {
						var n = e.value;
						return e.setAttribute("type", t), n && (e.value = n), t
					}
				}
			}
		}
	}), it = {
		set: function(e, t, n) {
			return t === !1 ? Z.removeAttr(e, n) : e.setAttribute(n, n), n
		}
	}, Z.each(Z.expr.match.bool.source.match(/\w+/g), function(e, t) {
		var n = at[t] || Z.find.attr;
		at[t] = function(e, t, r) {
			var i, a;
			return r || (a = at[t], at[t] = i, i = null != n(e, t, r) ? t.toLowerCase() : null, at[t] = a), i
		}
	});
	var ot = /^(?:input|select|textarea|button)$/i;
	Z.fn.extend({
		prop: function(e, t) {
			return _e(this, Z.prop, e, t, arguments.length > 1)
		},
		removeProp: function(e) {
			return this.each(function() {
				delete this[Z.propFix[e] || e]
			})
		}
	}), Z.extend({
		propFix: {
			"for": "htmlFor",
			"class": "className"
		},
		prop: function(e, t, n) {
			var r, i, a, o = e.nodeType;
			if (e && 3 !== o && 8 !== o && 2 !== o) return a = 1 !== o || !Z.isXMLDoc(e), a && (t = Z.propFix[t] || t, i = Z.propHooks[t]), void 0 !== n ? i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : e[t] = n : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t]
		},
		propHooks: {
			tabIndex: {
				get: function(e) {
					return e.hasAttribute("tabindex") || ot.test(e.nodeName) || e.href ? e.tabIndex : -1
				}
			}
		}
	}), K.optSelected || (Z.propHooks.selected = {
		get: function(e) {
			var t = e.parentNode;
			return t && t.parentNode && t.parentNode.selectedIndex, null
		}
	}), Z.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
		Z.propFix[this.toLowerCase()] = this
	});
	var st = /[\t\r\n\f]/g;
	Z.fn.extend({
		addClass: function(e) {
			var t, n, r, i, a, o, s = "string" == typeof e && e,
				l = 0,
				u = this.length;
			if (Z.isFunction(e)) return this.each(function(t) {
				Z(this).addClass(e.call(this, t, this.className))
			});
			if (s) for (t = (e || "").match(fe) || []; l < u; l++) if (n = this[l], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(st, " ") : " ")) {
				for (a = 0; i = t[a++];) r.indexOf(" " + i + " ") < 0 && (r += i + " ");
				o = Z.trim(r), n.className !== o && (n.className = o)
			}
			return this
		},
		removeClass: function(e) {
			var t, n, r, i, a, o, s = 0 === arguments.length || "string" == typeof e && e,
				l = 0,
				u = this.length;
			if (Z.isFunction(e)) return this.each(function(t) {
				Z(this).removeClass(e.call(this, t, this.className))
			});
			if (s) for (t = (e || "").match(fe) || []; l < u; l++) if (n = this[l], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(st, " ") : "")) {
				for (a = 0; i = t[a++];) for (; r.indexOf(" " + i + " ") >= 0;) r = r.replace(" " + i + " ", " ");
				o = e ? Z.trim(r) : "", n.className !== o && (n.className = o)
			}
			return this
		},
		toggleClass: function(e, t) {
			var n = typeof e;
			return "boolean" == typeof t && "string" === n ? t ? this.addClass(e) : this.removeClass(e) : Z.isFunction(e) ? this.each(function(n) {
				Z(this).toggleClass(e.call(this, n, this.className, t), t)
			}) : this.each(function() {
				if ("string" === n) for (var t, r = 0, i = Z(this), a = e.match(fe) || []; t = a[r++];) i.hasClass(t) ? i.removeClass(t) : i.addClass(t);
				else n !== Me && "boolean" !== n || (this.className && ge.set(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : ge.get(this, "__className__") || "")
			})
		},
		hasClass: function(e) {
			for (var t = " " + e + " ", n = 0, r = this.length; n < r; n++) if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(st, " ").indexOf(t) >= 0) return !0;
			return !1
		}
	});
	var lt = /\r/g;
	Z.fn.extend({
		val: function(e) {
			var t, n, r, i = this[0]; {
				if (arguments.length) return r = Z.isFunction(e), this.each(function(n) {
					var i;
					1 === this.nodeType && (i = r ? e.call(this, n, Z(this).val()) : e, null == i ? i = "" : "number" == typeof i ? i += "" : Z.isArray(i) && (i = Z.map(i, function(e) {
						return null == e ? "" : e + ""
					})), t = Z.valHooks[this.type] || Z.valHooks[this.nodeName.toLowerCase()], t && "set" in t && void 0 !== t.set(this, i, "value") || (this.value = i))
				});
				if (i) return t = Z.valHooks[i.type] || Z.valHooks[i.nodeName.toLowerCase()], t && "get" in t && void 0 !== (n = t.get(i, "value")) ? n : (n = i.value, "string" == typeof n ? n.replace(lt, "") : null == n ? "" : n)
			}
		}
	}), Z.extend({
		valHooks: {
			option: {
				get: function(e) {
					var t = Z.find.attr(e, "value");
					return null != t ? t : Z.trim(Z.text(e))
				}
			},
			select: {
				get: function(e) {
					for (var t, n, r = e.options, i = e.selectedIndex, a = "select-one" === e.type || i < 0, o = a ? null : [], s = a ? i + 1 : r.length, l = i < 0 ? s : a ? i : 0; l < s; l++) if (n = r[l], (n.selected || l === i) && (K.optDisabled ? !n.disabled : null === n.getAttribute("disabled")) && (!n.parentNode.disabled || !Z.nodeName(n.parentNode, "optgroup"))) {
						if (t = Z(n).val(), a) return t;
						o.push(t)
					}
					return o
				},
				set: function(e, t) {
					for (var n, r, i = e.options, a = Z.makeArray(t), o = i.length; o--;) r = i[o], (r.selected = Z.inArray(r.value, a) >= 0) && (n = !0);
					return n || (e.selectedIndex = -1), a
				}
			}
		}
	}), Z.each(["radio", "checkbox"], function() {
		Z.valHooks[this] = {
			set: function(e, t) {
				if (Z.isArray(t)) return e.checked = Z.inArray(Z(e).val(), t) >= 0
			}
		}, K.checkOn || (Z.valHooks[this].get = function(e) {
			return null === e.getAttribute("value") ? "on" : e.value
		})
	}), Z.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
		Z.fn[t] = function(e, n) {
			return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
		}
	}), Z.fn.extend({
		hover: function(e, t) {
			return this.mouseenter(e).mouseleave(t || e)
		},
		bind: function(e, t, n) {
			return this.on(e, null, t, n)
		},
		unbind: function(e, t) {
			return this.off(e, null, t)
		},
		delegate: function(e, t, n, r) {
			return this.on(t, e, n, r)
		},
		undelegate: function(e, t, n) {
			return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
		}
	});
	var ut = Z.now(),
		ct = /\?/;
	Z.parseJSON = function(e) {
		return JSON.parse(e + "")
	}, Z.parseXML = function(e) {
		var t, n;
		if (!e || "string" != typeof e) return null;
		try {
			n = new DOMParser, t = n.parseFromString(e, "text/xml")
		} catch (r) {
			t = void 0
		}
		return t && !t.getElementsByTagName("parsererror").length || Z.error("Invalid XML: " + e), t
	};
	var dt = /#.*$/,
		ht = /([?&])_=[^&]*/,
		ft = /^(.*?):[ \t]*([^\r\n]*)$/gm,
		pt = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
		mt = /^(?:GET|HEAD)$/,
		_t = /^\/\//,
		gt = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
		yt = {},
		vt = {},
		Et = "*/".concat("*"),
		bt = e.location.href,
		Ut = gt.exec(bt.toLowerCase()) || [];
	Z.extend({
		active: 0,
		lastModified: {},
		etag: {},
		ajaxSettings: {
			url: bt,
			type: "GET",
			isLocal: pt.test(Ut[1]),
			global: !0,
			processData: !0,
			async: !0,
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			accepts: {
				"*": Et,
				text: "text/plain",
				html: "text/html",
				xml: "application/xml, text/xml",
				json: "application/json, text/javascript"
			},
			contents: {
				xml: /xml/,
				html: /html/,
				json: /json/
			},
			responseFields: {
				xml: "responseXML",
				text: "responseText",
				json: "responseJSON"
			},
			converters: {
				"* text": String,
				"text html": !0,
				"text json": Z.parseJSON,
				"text xml": Z.parseXML
			},
			flatOptions: {
				url: !0,
				context: !0
			}
		},
		ajaxSetup: function(e, t) {
			return t ? B(B(e, Z.ajaxSettings), t) : B(Z.ajaxSettings, e)
		},
		ajaxPrefilter: j(yt),
		ajaxTransport: j(vt),
		ajax: function(e, t) {
			function n(e, t, n, o) {
				var l, c, g, y, E, U = t;
				2 !== v && (v = 2, s && clearTimeout(s), r = void 0, a = o || "", b.readyState = e > 0 ? 4 : 0, l = e >= 200 && e < 300 || 304 === e, n && (y = $(d, b, n)), y = P(d, y, b, l), l ? (d.ifModified && (E = b.getResponseHeader("Last-Modified"), E && (Z.lastModified[i] = E), E = b.getResponseHeader("etag"), E && (Z.etag[i] = E)), 204 === e || "HEAD" === d.type ? U = "nocontent" : 304 === e ? U = "notmodified" : (U = y.state, c = y.data, g = y.error, l = !g)) : (g = U, !e && U || (U = "error", e < 0 && (e = 0))), b.status = e, b.statusText = (t || U) + "", l ? p.resolveWith(h, [c, U, b]) : p.rejectWith(h, [b, U, g]), b.statusCode(_), _ = void 0, u && f.trigger(l ? "ajaxSuccess" : "ajaxError", [b, d, l ? c : g]), m.fireWith(h, [b, U]), u && (f.trigger("ajaxComplete", [b, d]), --Z.active || Z.event.trigger("ajaxStop")))
			}
			"object" == typeof e && (t = e, e = void 0), t = t || {};
			var r, i, a, o, s, l, u, c, d = Z.ajaxSetup({}, t),
				h = d.context || d,
				f = d.context && (h.nodeType || h.jquery) ? Z(h) : Z.event,
				p = Z.Deferred(),
				m = Z.Callbacks("once memory"),
				_ = d.statusCode || {},
				g = {},
				y = {},
				v = 0,
				E = "canceled",
				b = {
					readyState: 0,
					getResponseHeader: function(e) {
						var t;
						if (2 === v) {
							if (!o) for (o = {}; t = ft.exec(a);) o[t[1].toLowerCase()] = t[2];
							t = o[e.toLowerCase()]
						}
						return null == t ? null : t
					},
					getAllResponseHeaders: function() {
						return 2 === v ? a : null
					},
					setRequestHeader: function(e, t) {
						var n = e.toLowerCase();
						return v || (e = y[n] = y[n] || e, g[e] = t), this
					},
					overrideMimeType: function(e) {
						return v || (d.mimeType = e), this
					},
					statusCode: function(e) {
						var t;
						if (e) if (v < 2) for (t in e) _[t] = [_[t], e[t]];
						else b.always(e[b.status]);
						return this
					},
					abort: function(e) {
						var t = e || E;
						return r && r.abort(t), n(0, t), this
					}
				};
			if (p.promise(b).complete = m.add, b.success = b.done, b.error = b.fail, d.url = ((e || d.url || bt) + "").replace(dt, "").replace(_t, Ut[1] + "//"), d.type = t.method || t.type || d.method || d.type, d.dataTypes = Z.trim(d.dataType || "*").toLowerCase().match(fe) || [""], null == d.crossDomain && (l = gt.exec(d.url.toLowerCase()), d.crossDomain = !(!l || l[1] === Ut[1] && l[2] === Ut[2] && (l[3] || ("http:" === l[1] ? "80" : "443")) === (Ut[3] || ("http:" === Ut[1] ? "80" : "443")))), d.data && d.processData && "string" != typeof d.data && (d.data = Z.param(d.data, d.traditional)), H(yt, d, t, b), 2 === v) return b;
			u = Z.event && d.global, u && 0 === Z.active++ && Z.event.trigger("ajaxStart"), d.type = d.type.toUpperCase(), d.hasContent = !mt.test(d.type), i = d.url, d.hasContent || (d.data && (i = d.url += (ct.test(i) ? "&" : "?") + d.data, delete d.data), d.cache === !1 && (d.url = ht.test(i) ? i.replace(ht, "$1_=" + ut++) : i + (ct.test(i) ? "&" : "?") + "_=" + ut++)), d.ifModified && (Z.lastModified[i] && b.setRequestHeader("If-Modified-Since", Z.lastModified[i]), Z.etag[i] && b.setRequestHeader("If-None-Match", Z.etag[i])), (d.data && d.hasContent && d.contentType !== !1 || t.contentType) && b.setRequestHeader("Content-Type", d.contentType), b.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + Et + "; q=0.01" : "") : d.accepts["*"]);
			for (c in d.headers) b.setRequestHeader(c, d.headers[c]);
			if (d.beforeSend && (d.beforeSend.call(h, b, d) === !1 || 2 === v)) return b.abort();
			E = "abort";
			for (c in {
				success: 1,
				error: 1,
				complete: 1
			}) b[c](d[c]);
			if (r = H(vt, d, t, b)) {
				b.readyState = 1, u && f.trigger("ajaxSend", [b, d]), d.async && d.timeout > 0 && (s = setTimeout(function() {
					b.abort("timeout")
				}, d.timeout));
				try {
					v = 1, r.send(g, n)
				} catch (U) {
					if (!(v < 2)) throw U;
					n(-1, U)
				}
			} else n(-1, "No Transport");
			return b
		},
		getJSON: function(e, t, n) {
			return Z.get(e, t, n, "json")
		},
		getScript: function(e, t) {
			return Z.get(e, void 0, t, "script")
		}
	}), Z.each(["get", "post"], function(e, t) {
		Z[t] = function(e, n, r, i) {
			return Z.isFunction(n) && (i = i || r, r = n, n = void 0), Z.ajax({
				url: e,
				type: t,
				dataType: i,
				data: n,
				success: r
			})
		}
	}), Z._evalUrl = function(e) {
		return Z.ajax({
			url: e,
			type: "GET",
			dataType: "script",
			async: !1,
			global: !1,
			"throws": !0
		})
	}, Z.fn.extend({
		wrapAll: function(e) {
			var t;
			return Z.isFunction(e) ? this.each(function(t) {
				Z(this).wrapAll(e.call(this, t))
			}) : (this[0] && (t = Z(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
				for (var e = this; e.firstElementChild;) e = e.firstElementChild;
				return e
			}).append(this)), this)
		},
		wrapInner: function(e) {
			return Z.isFunction(e) ? this.each(function(t) {
				Z(this).wrapInner(e.call(this, t))
			}) : this.each(function() {
				var t = Z(this),
					n = t.contents();
				n.length ? n.wrapAll(e) : t.append(e)
			})
		},
		wrap: function(e) {
			var t = Z.isFunction(e);
			return this.each(function(n) {
				Z(this).wrapAll(t ? e.call(this, n) : e)
			})
		},
		unwrap: function() {
			return this.parent().each(function() {
				Z.nodeName(this, "body") || Z(this).replaceWith(this.childNodes)
			}).end()
		}
	}), Z.expr.filters.hidden = function(e) {
		return e.offsetWidth <= 0 && e.offsetHeight <= 0
	}, Z.expr.filters.visible = function(e) {
		return !Z.expr.filters.hidden(e)
	};
	var wt = /%20/g,
		kt = /\[\]$/,
		Mt = /\r?\n/g,
		Lt = /^(?:submit|button|image|reset|file)$/i,
		Ft = /^(?:input|select|textarea|keygen)/i;
	Z.param = function(e, t) {
		var n, r = [],
			i = function(e, t) {
				t = Z.isFunction(t) ? t() : null == t ? "" : t, r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
			};
		if (void 0 === t && (t = Z.ajaxSettings && Z.ajaxSettings.traditional), Z.isArray(e) || e.jquery && !Z.isPlainObject(e)) Z.each(e, function() {
			i(this.name, this.value)
		});
		else for (n in e) O(n, e[n], t, i);
		return r.join("&").replace(wt, "+")
	}, Z.fn.extend({
		serialize: function() {
			return Z.param(this.serializeArray())
		},
		serializeArray: function() {
			return this.map(function() {
				var e = Z.prop(this, "elements");
				return e ? Z.makeArray(e) : this
			}).filter(function() {
				var e = this.type;
				return this.name && !Z(this).is(":disabled") && Ft.test(this.nodeName) && !Lt.test(e) && (this.checked || !ke.test(e))
			}).map(function(e, t) {
				var n = Z(this).val();
				return null == n ? null : Z.isArray(n) ? Z.map(n, function(e) {
					return {
						name: t.name,
						value: e.replace(Mt, "\r\n")
					}
				}) : {
					name: t.name,
					value: n.replace(Mt, "\r\n")
				}
			}).get()
		}
	}), Z.ajaxSettings.xhr = function() {
		try {
			return new XMLHttpRequest
		} catch (e) {}
	};
	var Dt = 0,
		xt = {},
		Tt = {
			0: 200,
			1223: 204
		},
		Yt = Z.ajaxSettings.xhr();
	e.attachEvent && e.attachEvent("onunload", function() {
		for (var e in xt) xt[e]()
	}), K.cors = !! Yt && "withCredentials" in Yt, K.ajax = Yt = !! Yt, Z.ajaxTransport(function(e) {
		var t;
		if (K.cors || Yt && !e.crossDomain) return {
			send: function(n, r) {
				var i, a = e.xhr(),
					o = ++Dt;
				if (a.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields) for (i in e.xhrFields) a[i] = e.xhrFields[i];
				e.mimeType && a.overrideMimeType && a.overrideMimeType(e.mimeType), e.crossDomain || n["X-Requested-With"] || (n["X-Requested-With"] = "XMLHttpRequest");
				for (i in n) a.setRequestHeader(i, n[i]);
				t = function(e) {
					return function() {
						t && (delete xt[o], t = a.onload = a.onerror = null, "abort" === e ? a.abort() : "error" === e ? r(a.status, a.statusText) : r(Tt[a.status] || a.status, a.statusText, "string" == typeof a.responseText ? {
							text: a.responseText
						} : void 0, a.getAllResponseHeaders()))
					}
				}, a.onload = t(), a.onerror = t("error"), t = xt[o] = t("abort");
				try {
					a.send(e.hasContent && e.data || null)
				} catch (s) {
					if (t) throw s
				}
			},
			abort: function() {
				t && t()
			}
		}
	}), Z.ajaxSetup({
		accepts: {
			script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
		},
		contents: {
			script: /(?:java|ecma)script/
		},
		converters: {
			"text script": function(e) {
				return Z.globalEval(e), e
			}
		}
	}), Z.ajaxPrefilter("script", function(e) {
		void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
	}), Z.ajaxTransport("script", function(e) {
		if (e.crossDomain) {
			var t, n;
			return {
				send: function(r, i) {
					t = Z("<script>").prop({
						async: !0,
						charset: e.scriptCharset,
						src: e.url
					}).on("load error", n = function(e) {
						t.remove(), n = null, e && i("error" === e.type ? 404 : 200, e.type)
					}), X.head.appendChild(t[0])
				},
				abort: function() {
					n && n()
				}
			}
		}
	});
	var St = [],
		At = /(=)\?(?=&|$)|\?\?/;
	Z.ajaxSetup({
		jsonp: "callback",
		jsonpCallback: function() {
			var e = St.pop() || Z.expando + "_" + ut++;
			return this[e] = !0, e
		}
	}), Z.ajaxPrefilter("json jsonp", function(t, n, r) {
		var i, a, o, s = t.jsonp !== !1 && (At.test(t.url) ? "url" : "string" == typeof t.data && !(t.contentType || "").indexOf("application/x-www-form-urlencoded") && At.test(t.data) && "data");
		if (s || "jsonp" === t.dataTypes[0]) return i = t.jsonpCallback = Z.isFunction(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, s ? t[s] = t[s].replace(At, "$1" + i) : t.jsonp !== !1 && (t.url += (ct.test(t.url) ? "&" : "?") + t.jsonp + "=" + i), t.converters["script json"] = function() {
			return o || Z.error(i + " was not called"), o[0]
		}, t.dataTypes[0] = "json", a = e[i], e[i] = function() {
			o = arguments
		}, r.always(function() {
			e[i] = a, t[i] && (t.jsonpCallback = n.jsonpCallback, St.push(i)), o && Z.isFunction(a) && a(o[0]), o = a = void 0
		}), "script"
	}), Z.parseHTML = function(e, t, n) {
		if (!e || "string" != typeof e) return null;
		"boolean" == typeof t && (n = t, t = !1), t = t || X;
		var r = oe.exec(e),
			i = !n && [];
		return r ? [t.createElement(r[1])] : (r = Z.buildFragment([e], t, i), i && i.length && Z(i).remove(), Z.merge([], r.childNodes))
	};
	var Ct = Z.fn.load;
	Z.fn.load = function(e, t, n) {
		if ("string" != typeof e && Ct) return Ct.apply(this, arguments);
		var r, i, a, o = this,
			s = e.indexOf(" ");
		return s >= 0 && (r = Z.trim(e.slice(s)), e = e.slice(0, s)), Z.isFunction(t) ? (n = t, t = void 0) : t && "object" == typeof t && (i = "POST"), o.length > 0 && Z.ajax({
			url: e,
			type: i,
			dataType: "html",
			data: t
		}).done(function(e) {
			a = arguments, o.html(r ? Z("<div>").append(Z.parseHTML(e)).find(r) : e)
		}).complete(n &&
		function(e, t) {
			o.each(n, a || [e.responseText, t, e])
		}), this
	}, Z.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
		Z.fn[t] = function(e) {
			return this.on(t, e)
		}
	}), Z.expr.filters.animated = function(e) {
		return Z.grep(Z.timers, function(t) {
			return e === t.elem
		}).length
	};
	var jt = e.document.documentElement;
	Z.offset = {
		setOffset: function(e, t, n) {
			var r, i, a, o, s, l, u, c = Z.css(e, "position"),
				d = Z(e),
				h = {};
			"static" === c && (e.style.position = "relative"), s = d.offset(), a = Z.css(e, "top"), l = Z.css(e, "left"), u = ("absolute" === c || "fixed" === c) && (a + l).indexOf("auto") > -1, u ? (r = d.position(), o = r.top, i = r.left) : (o = parseFloat(a) || 0, i = parseFloat(l) || 0), Z.isFunction(t) && (t = t.call(e, n, s)), null != t.top && (h.top = t.top - s.top + o), null != t.left && (h.left = t.left - s.left + i), "using" in t ? t.using.call(e, h) : d.css(h)
		}
	}, Z.fn.extend({
		offset: function(e) {
			if (arguments.length) return void 0 === e ? this : this.each(function(t) {
				Z.offset.setOffset(this, e, t)
			});
			var t, n, r = this[0],
				i = {
					top: 0,
					left: 0
				},
				a = r && r.ownerDocument;
			if (a) return t = a.documentElement, Z.contains(t, r) ? (typeof r.getBoundingClientRect !== Me && (i = r.getBoundingClientRect()), n = I(a), {
				top: i.top + n.pageYOffset - t.clientTop,
				left: i.left + n.pageXOffset - t.clientLeft
			}) : i
		},
		position: function() {
			if (this[0]) {
				var e, t, n = this[0],
					r = {
						top: 0,
						left: 0
					};
				return "fixed" === Z.css(n, "position") ? t = n.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), Z.nodeName(e[0], "html") || (r = e.offset()), r.top += Z.css(e[0], "borderTopWidth", !0), r.left += Z.css(e[0], "borderLeftWidth", !0)), {
					top: t.top - r.top - Z.css(n, "marginTop", !0),
					left: t.left - r.left - Z.css(n, "marginLeft", !0)
				}
			}
		},
		offsetParent: function() {
			return this.map(function() {
				for (var e = this.offsetParent || jt; e && !Z.nodeName(e, "html") && "static" === Z.css(e, "position");) e = e.offsetParent;
				return e || jt
			})
		}
	}), Z.each({
		scrollLeft: "pageXOffset",
		scrollTop: "pageYOffset"
	}, function(t, n) {
		var r = "pageYOffset" === n;
		Z.fn[t] = function(i) {
			return _e(this, function(t, i, a) {
				var o = I(t);
				return void 0 === a ? o ? o[n] : t[i] : void(o ? o.scrollTo(r ? e.pageXOffset : a, r ? a : e.pageYOffset) : t[i] = a)
			}, t, i, arguments.length, null)
		}
	}), Z.each(["top", "left"], function(e, t) {
		Z.cssHooks[t] = U(K.pixelPosition, function(e, n) {
			if (n) return n = b(e, t), Ne.test(n) ? Z(e).position()[t] + "px" : n
		})
	}), Z.each({
		Height: "height",
		Width: "width"
	}, function(e, t) {
		Z.each({
			padding: "inner" + e,
			content: t,
			"": "outer" + e
		}, function(n, r) {
			Z.fn[r] = function(r, i) {
				var a = arguments.length && (n || "boolean" != typeof r),
					o = n || (r === !0 || i === !0 ? "margin" : "border");
				return _e(this, function(t, n, r) {
					var i;
					return Z.isWindow(t) ? t.document.documentElement["client" + e] : 9 === t.nodeType ? (i = t.documentElement, Math.max(t.body["scroll" + e], i["scroll" + e], t.body["offset" + e], i["offset" + e], i["client" + e])) : void 0 === r ? Z.css(t, n, o) : Z.style(t, n, r, o)
				}, t, a ? r : void 0, a, null)
			}
		})
	}), Z.fn.size = function() {
		return this.length
	}, Z.fn.andSelf = Z.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function() {
		return Z
	});
	var Ht = e.jQuery,
		Bt = e.$;
	return Z.noConflict = function(t) {
		return e.$ === Z && (e.$ = Bt), t && e.jQuery === Z && (e.jQuery = Ht), Z
	}, typeof t === Me && (e.jQuery = e.$ = Z), Z
}), "undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery"); +
function(e) {
	"use strict";
	var t = e.fn.jquery.split(" ")[0].split(".");
	if (t[0] < 2 && t[1] < 9 || 1 == t[0] && 9 == t[1] && t[2] < 1 || t[0] > 2) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 3")
}(jQuery), +
function(e) {
	"use strict";

	function t() {
		var e = document.createElement("bootstrap"),
			t = {
				WebkitTransition: "webkitTransitionEnd",
				MozTransition: "transitionend",
				OTransition: "oTransitionEnd otransitionend",
				transition: "transitionend"
			};
		for (var n in t) if (void 0 !== e.style[n]) return {
			end: t[n]
		};
		return !1
	}
	e.fn.emulateTransitionEnd = function(t) {
		var n = !1,
			r = this;
		e(this).one("bsTransitionEnd", function() {
			n = !0
		});
		var i = function() {
				n || e(r).trigger(e.support.transition.end)
			};
		return setTimeout(i, t), this
	}, e(function() {
		e.support.transition = t(), e.support.transition && (e.event.special.bsTransitionEnd = {
			bindType: e.support.transition.end,
			delegateType: e.support.transition.end,
			handle: function(t) {
				if (e(t.target).is(this)) return t.handleObj.handler.apply(this, arguments)
			}
		})
	})
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		return this.each(function() {
			var n = e(this),
				i = n.data("bs.alert");
			i || n.data("bs.alert", i = new r(this)), "string" == typeof t && i[t].call(n)
		})
	}
	var n = '[data-dismiss="alert"]',
		r = function(t) {
			e(t).on("click", n, this.close)
		};
	r.VERSION = "3.3.6", r.TRANSITION_DURATION = 150, r.prototype.close = function(t) {
		function n() {
			o.detach().trigger("closed.bs.alert").remove()
		}
		var i = e(this),
			a = i.attr("data-target");
		a || (a = i.attr("href"), a = a && a.replace(/.*(?=#[^\s]*$)/, ""));
		var o = e(a);
		t && t.preventDefault(), o.length || (o = i.closest(".alert")), o.trigger(t = e.Event("close.bs.alert")), t.isDefaultPrevented() || (o.removeClass("in"), e.support.transition && o.hasClass("fade") ? o.one("bsTransitionEnd", n).emulateTransitionEnd(r.TRANSITION_DURATION) : n())
	};
	var i = e.fn.alert;
	e.fn.alert = t, e.fn.alert.Constructor = r, e.fn.alert.noConflict = function() {
		return e.fn.alert = i, this
	}, e(document).on("click.bs.alert.data-api", n, r.prototype.close)
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		return this.each(function() {
			var r = e(this),
				i = r.data("bs.button"),
				a = "object" == typeof t && t;
			i || r.data("bs.button", i = new n(this, a)), "toggle" == t ? i.toggle() : t && i.setState(t)
		})
	}
	var n = function(t, r) {
			this.$element = e(t), this.options = e.extend({}, n.DEFAULTS, r), this.isLoading = !1
		};
	n.VERSION = "3.3.6", n.DEFAULTS = {
		loadingText: "loading..."
	}, n.prototype.setState = function(t) {
		var n = "disabled",
			r = this.$element,
			i = r.is("input") ? "val" : "html",
			a = r.data();
		t += "Text", null == a.resetText && r.data("resetText", r[i]()), setTimeout(e.proxy(function() {
			r[i](null == a[t] ? this.options[t] : a[t]), "loadingText" == t ? (this.isLoading = !0, r.addClass(n).attr(n, n)) : this.isLoading && (this.isLoading = !1, r.removeClass(n).removeAttr(n))
		}, this), 0)
	}, n.prototype.toggle = function() {
		var e = !0,
			t = this.$element.closest('[data-toggle="buttons"]');
		if (t.length) {
			var n = this.$element.find("input");
			"radio" == n.prop("type") ? (n.prop("checked") && (e = !1), t.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == n.prop("type") && (n.prop("checked") !== this.$element.hasClass("active") && (e = !1), this.$element.toggleClass("active")), n.prop("checked", this.$element.hasClass("active")), e && n.trigger("change")
		} else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
	};
	var r = e.fn.button;
	e.fn.button = t, e.fn.button.Constructor = n, e.fn.button.noConflict = function() {
		return e.fn.button = r, this
	}, e(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(n) {
		var r = e(n.target);
		r.hasClass("btn") || (r = r.closest(".btn")), t.call(r, "toggle"), e(n.target).is('input[type="radio"]') || e(n.target).is('input[type="checkbox"]') || n.preventDefault()
	}).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function(t) {
		e(t.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(t.type))
	})
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		return this.each(function() {
			var r = e(this),
				i = r.data("bs.carousel"),
				a = e.extend({}, n.DEFAULTS, r.data(), "object" == typeof t && t),
				o = "string" == typeof t ? t : a.slide;
			i || r.data("bs.carousel", i = new n(this, a)), "number" == typeof t ? i.to(t) : o ? i[o]() : a.interval && i.pause().cycle()
		})
	}
	var n = function(t, n) {
			this.$element = e(t), this.$indicators = this.$element.find(".carousel-indicators"), this.options = n, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", e.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", e.proxy(this.pause, this)).on("mouseleave.bs.carousel", e.proxy(this.cycle, this))
		};
	n.VERSION = "3.3.6", n.TRANSITION_DURATION = 600, n.DEFAULTS = {
		interval: 5e3,
		pause: "hover",
		wrap: !0,
		keyboard: !0
	}, n.prototype.keydown = function(e) {
		if (!/input|textarea/i.test(e.target.tagName)) {
			switch (e.which) {
			case 37:
				this.prev();
				break;
			case 39:
				this.next();
				break;
			default:
				return
			}
			e.preventDefault()
		}
	}, n.prototype.cycle = function(t) {
		return t || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(e.proxy(this.next, this), this.options.interval)), this
	}, n.prototype.getItemIndex = function(e) {
		return this.$items = e.parent().children(".item"), this.$items.index(e || this.$active)
	}, n.prototype.getItemForDirection = function(e, t) {
		var n = this.getItemIndex(t),
			r = "prev" == e && 0 === n || "next" == e && n == this.$items.length - 1;
		if (r && !this.options.wrap) return t;
		var i = "prev" == e ? -1 : 1,
			a = (n + i) % this.$items.length;
		return this.$items.eq(a)
	}, n.prototype.to = function(e) {
		var t = this,
			n = this.getItemIndex(this.$active = this.$element.find(".item.active"));
		if (!(e > this.$items.length - 1 || e < 0)) return this.sliding ? this.$element.one("slid.bs.carousel", function() {
			t.to(e)
		}) : n == e ? this.pause().cycle() : this.slide(e > n ? "next" : "prev", this.$items.eq(e))
	}, n.prototype.pause = function(t) {
		return t || (this.paused = !0), this.$element.find(".next, .prev").length && e.support.transition && (this.$element.trigger(e.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
	}, n.prototype.next = function() {
		if (!this.sliding) return this.slide("next")
	}, n.prototype.prev = function() {
		if (!this.sliding) return this.slide("prev")
	}, n.prototype.slide = function(t, r) {
		var i = this.$element.find(".item.active"),
			a = r || this.getItemForDirection(t, i),
			o = this.interval,
			s = "next" == t ? "left" : "right",
			l = this;
		if (a.hasClass("active")) return this.sliding = !1;
		var u = a[0],
			c = e.Event("slide.bs.carousel", {
				relatedTarget: u,
				direction: s
			});
		if (this.$element.trigger(c), !c.isDefaultPrevented()) {
			if (this.sliding = !0, o && this.pause(), this.$indicators.length) {
				this.$indicators.find(".active").removeClass("active");
				var d = e(this.$indicators.children()[this.getItemIndex(a)]);
				d && d.addClass("active")
			}
			var h = e.Event("slid.bs.carousel", {
				relatedTarget: u,
				direction: s
			});
			return e.support.transition && this.$element.hasClass("slide") ? (a.addClass(t), a[0].offsetWidth, i.addClass(s), a.addClass(s), i.one("bsTransitionEnd", function() {
				a.removeClass([t, s].join(" ")).addClass("active"), i.removeClass(["active", s].join(" ")), l.sliding = !1, setTimeout(function() {
					l.$element.trigger(h)
				}, 0)
			}).emulateTransitionEnd(n.TRANSITION_DURATION)) : (i.removeClass("active"), a.addClass("active"), this.sliding = !1, this.$element.trigger(h)), o && this.cycle(), this
		}
	};
	var r = e.fn.carousel;
	e.fn.carousel = t, e.fn.carousel.Constructor = n, e.fn.carousel.noConflict = function() {
		return e.fn.carousel = r, this
	};
	var i = function(n) {
			var r, i = e(this),
				a = e(i.attr("data-target") || (r = i.attr("href")) && r.replace(/.*(?=#[^\s]+$)/, ""));
			if (a.hasClass("carousel")) {
				var o = e.extend({}, a.data(), i.data()),
					s = i.attr("data-slide-to");
				s && (o.interval = !1), t.call(a, o), s && a.data("bs.carousel").to(s), n.preventDefault()
			}
		};
	e(document).on("click.bs.carousel.data-api", "[data-slide]", i).on("click.bs.carousel.data-api", "[data-slide-to]", i), e(window).on("load", function() {
		e('[data-ride="carousel"]').each(function() {
			var n = e(this);
			t.call(n, n.data())
		})
	})
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		var n, r = t.attr("data-target") || (n = t.attr("href")) && n.replace(/.*(?=#[^\s]+$)/, "");
		return e(r)
	}
	function n(t) {
		return this.each(function() {
			var n = e(this),
				i = n.data("bs.collapse"),
				a = e.extend({}, r.DEFAULTS, n.data(), "object" == typeof t && t);
			!i && a.toggle && /show|hide/.test(t) && (a.toggle = !1), i || n.data("bs.collapse", i = new r(this, a)), "string" == typeof t && i[t]()
		})
	}
	var r = function(t, n) {
			this.$element = e(t), this.options = e.extend({}, r.DEFAULTS, n), this.$trigger = e('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
		};
	r.VERSION = "3.3.6", r.TRANSITION_DURATION = 350, r.DEFAULTS = {
		toggle: !0
	}, r.prototype.dimension = function() {
		var e = this.$element.hasClass("width");
		return e ? "width" : "height"
	}, r.prototype.show = function() {
		if (!this.transitioning && !this.$element.hasClass("in")) {
			var t, i = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
			if (!(i && i.length && (t = i.data("bs.collapse"), t && t.transitioning))) {
				var a = e.Event("show.bs.collapse");
				if (this.$element.trigger(a), !a.isDefaultPrevented()) {
					i && i.length && (n.call(i, "hide"), t || i.data("bs.collapse", null));
					var o = this.dimension();
					this.$element.removeClass("collapse").addClass("collapsing")[o](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
					var s = function() {
							this.$element.removeClass("collapsing").addClass("collapse in")[o](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
						};
					if (!e.support.transition) return s.call(this);
					var l = e.camelCase(["scroll", o].join("-"));
					this.$element.one("bsTransitionEnd", e.proxy(s, this)).emulateTransitionEnd(r.TRANSITION_DURATION)[o](this.$element[0][l])
				}
			}
		}
	}, r.prototype.hide = function() {
		if (!this.transitioning && this.$element.hasClass("in")) {
			var t = e.Event("hide.bs.collapse");
			if (this.$element.trigger(t), !t.isDefaultPrevented()) {
				var n = this.dimension();
				this.$element[n](this.$element[n]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
				var i = function() {
						this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
					};
				return e.support.transition ? void this.$element[n](0).one("bsTransitionEnd", e.proxy(i, this)).emulateTransitionEnd(r.TRANSITION_DURATION) : i.call(this)
			}
		}
	}, r.prototype.toggle = function() {
		this[this.$element.hasClass("in") ? "hide" : "show"]()
	}, r.prototype.getParent = function() {
		return e(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(e.proxy(function(n, r) {
			var i = e(r);
			this.addAriaAndCollapsedClass(t(i), i)
		}, this)).end()
	}, r.prototype.addAriaAndCollapsedClass = function(e, t) {
		var n = e.hasClass("in");
		e.attr("aria-expanded", n), t.toggleClass("collapsed", !n).attr("aria-expanded", n)
	};
	var i = e.fn.collapse;
	e.fn.collapse = n, e.fn.collapse.Constructor = r, e.fn.collapse.noConflict = function() {
		return e.fn.collapse = i, this
	}, e(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(r) {
		var i = e(this);
		i.attr("data-target") || r.preventDefault();
		var a = t(i),
			o = a.data("bs.collapse"),
			s = o ? "toggle" : i.data();
		n.call(a, s)
	})
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		var n = t.attr("data-target");
		n || (n = t.attr("href"), n = n && /#[A-Za-z]/.test(n) && n.replace(/.*(?=#[^\s]*$)/, ""));
		var r = n && e(n);
		return r && r.length ? r : t.parent()
	}
	function n(n) {
		n && 3 === n.which || (e(i).remove(), e(a).each(function() {
			var r = e(this),
				i = t(r),
				a = {
					relatedTarget: this
				};
			i.hasClass("open") && (n && "click" == n.type && /input|textarea/i.test(n.target.tagName) && e.contains(i[0], n.target) || (i.trigger(n = e.Event("hide.bs.dropdown", a)), n.isDefaultPrevented() || (r.attr("aria-expanded", "false"), i.removeClass("open").trigger(e.Event("hidden.bs.dropdown", a)))))
		}))
	}
	function r(t) {
		return this.each(function() {
			var n = e(this),
				r = n.data("bs.dropdown");
			r || n.data("bs.dropdown", r = new o(this)), "string" == typeof t && r[t].call(n)
		})
	}
	var i = ".dropdown-backdrop",
		a = '[data-toggle="dropdown"]',
		o = function(t) {
			e(t).on("click.bs.dropdown", this.toggle)
		};
	o.VERSION = "3.3.6", o.prototype.toggle = function(r) {
		var i = e(this);
		if (!i.is(".disabled, :disabled")) {
			var a = t(i),
				o = a.hasClass("open");
			if (n(), !o) {
				"ontouchstart" in document.documentElement && !a.closest(".navbar-nav").length && e(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(e(this)).on("click", n);
				var s = {
					relatedTarget: this
				};
				if (a.trigger(r = e.Event("show.bs.dropdown", s)), r.isDefaultPrevented()) return;
				i.trigger("focus").attr("aria-expanded", "true"), a.toggleClass("open").trigger(e.Event("shown.bs.dropdown", s))
			}
			return !1
		}
	}, o.prototype.keydown = function(n) {
		if (/(38|40|27|32)/.test(n.which) && !/input|textarea/i.test(n.target.tagName)) {
			var r = e(this);
			if (n.preventDefault(), n.stopPropagation(), !r.is(".disabled, :disabled")) {
				var i = t(r),
					o = i.hasClass("open");
				if (!o && 27 != n.which || o && 27 == n.which) return 27 == n.which && i.find(a).trigger("focus"), r.trigger("click");
				var s = " li:not(.disabled):visible a",
					l = i.find(".dropdown-menu" + s);
				if (l.length) {
					var u = l.index(n.target);
					38 == n.which && u > 0 && u--, 40 == n.which && u < l.length - 1 && u++, ~u || (u = 0), l.eq(u).trigger("focus")
				}
			}
		}
	};
	var s = e.fn.dropdown;
	e.fn.dropdown = r, e.fn.dropdown.Constructor = o, e.fn.dropdown.noConflict = function() {
		return e.fn.dropdown = s, this
	}, e(document).on("click.bs.dropdown.data-api", n).on("click.bs.dropdown.data-api", ".dropdown form", function(e) {
		e.stopPropagation()
	}).on("click.bs.dropdown.data-api", a, o.prototype.toggle).on("keydown.bs.dropdown.data-api", a, o.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", o.prototype.keydown)
}(jQuery), +
function(e) {
	"use strict";

	function t(t, r) {
		return this.each(function() {
			var i = e(this),
				a = i.data("bs.modal"),
				o = e.extend({}, n.DEFAULTS, i.data(), "object" == typeof t && t);
			a || i.data("bs.modal", a = new n(this, o)), "string" == typeof t ? a[t](r) : o.show && a.show(r)
		})
	}
	var n = function(t, n) {
			this.options = n, this.$body = e(document.body), this.$element = e(t), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, e.proxy(function() {
				this.$element.trigger("loaded.bs.modal")
			}, this))
		};
	n.VERSION = "3.3.6", n.TRANSITION_DURATION = 300, n.BACKDROP_TRANSITION_DURATION = 150, n.DEFAULTS = {
		backdrop: !0,
		keyboard: !0,
		show: !0
	}, n.prototype.toggle = function(e) {
		return this.isShown ? this.hide() : this.show(e)
	}, n.prototype.show = function(t) {
		var r = this,
			i = e.Event("show.bs.modal", {
				relatedTarget: t
			});
		this.$element.trigger(i), this.isShown || i.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', e.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function() {
			r.$element.one("mouseup.dismiss.bs.modal", function(t) {
				e(t.target).is(r.$element) && (r.ignoreBackdropClick = !0)
			})
		}), this.backdrop(function() {
			var i = e.support.transition && r.$element.hasClass("fade");
			r.$element.parent().length || r.$element.appendTo(r.$body), r.$element.show().scrollTop(0), r.adjustDialog(), i && r.$element[0].offsetWidth, r.$element.addClass("in"), r.enforceFocus();
			var a = e.Event("shown.bs.modal", {
				relatedTarget: t
			});
			i ? r.$dialog.one("bsTransitionEnd", function() {
				r.$element.trigger("focus").trigger(a)
			}).emulateTransitionEnd(n.TRANSITION_DURATION) : r.$element.trigger("focus").trigger(a)
		}))
	}, n.prototype.hide = function(t) {
		t && t.preventDefault(), t = e.Event("hide.bs.modal"), this.$element.trigger(t), this.isShown && !t.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), e(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), e.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", e.proxy(this.hideModal, this)).emulateTransitionEnd(n.TRANSITION_DURATION) : this.hideModal())
	}, n.prototype.enforceFocus = function() {
		e(document).off("focusin.bs.modal").on("focusin.bs.modal", e.proxy(function(e) {
			this.$element[0] === e.target || this.$element.has(e.target).length || this.$element.trigger("focus")
		}, this))
	}, n.prototype.escape = function() {
		this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", e.proxy(function(e) {
			27 == e.which && this.hide()
		}, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
	}, n.prototype.resize = function() {
		this.isShown ? e(window).on("resize.bs.modal", e.proxy(this.handleUpdate, this)) : e(window).off("resize.bs.modal")
	}, n.prototype.hideModal = function() {
		var e = this;
		this.$element.hide(), this.backdrop(function() {
			e.$body.removeClass("modal-open"), e.resetAdjustments(), e.resetScrollbar(), e.$element.trigger("hidden.bs.modal")
		})
	}, n.prototype.removeBackdrop = function() {
		this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
	}, n.prototype.backdrop = function(t) {
		var r = this,
			i = this.$element.hasClass("fade") ? "fade" : "";
		if (this.isShown && this.options.backdrop) {
			var a = e.support.transition && i;
			if (this.$backdrop = e(document.createElement("div")).addClass("modal-backdrop " + i).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", e.proxy(function(e) {
				return this.ignoreBackdropClick ? void(this.ignoreBackdropClick = !1) : void(e.target === e.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
			}, this)), a && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !t) return;
			a ? this.$backdrop.one("bsTransitionEnd", t).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION) : t()
		} else if (!this.isShown && this.$backdrop) {
			this.$backdrop.removeClass("in");
			var o = function() {
					r.removeBackdrop(), t && t()
				};
			e.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", o).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION) : o()
		} else t && t()
	}, n.prototype.handleUpdate = function() {
		this.adjustDialog()
	}, n.prototype.adjustDialog = function() {
		var e = this.$element[0].scrollHeight > document.documentElement.clientHeight;
		this.$element.css({
			paddingLeft: !this.bodyIsOverflowing && e ? this.scrollbarWidth : "",
			paddingRight: this.bodyIsOverflowing && !e ? this.scrollbarWidth : ""
		})
	}, n.prototype.resetAdjustments = function() {
		this.$element.css({
			paddingLeft: "",
			paddingRight: ""
		})
	}, n.prototype.checkScrollbar = function() {
		var e = window.innerWidth;
		if (!e) {
			var t = document.documentElement.getBoundingClientRect();
			e = t.right - Math.abs(t.left)
		}
		this.bodyIsOverflowing = document.body.clientWidth < e, this.scrollbarWidth = this.measureScrollbar()
	}, n.prototype.setScrollbar = function() {
		var e = parseInt(this.$body.css("padding-right") || 0, 10);
		this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", e + this.scrollbarWidth)
	}, n.prototype.resetScrollbar = function() {
		this.$body.css("padding-right", this.originalBodyPad)
	}, n.prototype.measureScrollbar = function() {
		var e = document.createElement("div");
		e.className = "modal-scrollbar-measure", this.$body.append(e);
		var t = e.offsetWidth - e.clientWidth;
		return this.$body[0].removeChild(e), t
	};
	var r = e.fn.modal;
	e.fn.modal = t, e.fn.modal.Constructor = n, e.fn.modal.noConflict = function() {
		return e.fn.modal = r, this
	}, e(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function(n) {
		var r = e(this),
			i = r.attr("href"),
			a = e(r.attr("data-target") || i && i.replace(/.*(?=#[^\s]+$)/, "")),
			o = a.data("bs.modal") ? "toggle" : e.extend({
				remote: !/#/.test(i) && i
			}, a.data(), r.data());
		r.is("a") && n.preventDefault(), a.one("show.bs.modal", function(e) {
			e.isDefaultPrevented() || a.one("hidden.bs.modal", function() {
				r.is(":visible") && r.trigger("focus")
			})
		}), t.call(a, o, this)
	})
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		return this.each(function() {
			var r = e(this),
				i = r.data("bs.tooltip"),
				a = "object" == typeof t && t;
			!i && /destroy|hide/.test(t) || (i || r.data("bs.tooltip", i = new n(this, a)), "string" == typeof t && i[t]())
		})
	}
	var n = function(e, t) {
			this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", e, t)
		};
	n.VERSION = "3.3.6", n.TRANSITION_DURATION = 150, n.DEFAULTS = {
		animation: !0,
		placement: "top",
		selector: !1,
		template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
		trigger: "hover focus",
		title: "",
		delay: 0,
		html: !1,
		container: !1,
		viewport: {
			selector: "body",
			padding: 0
		}
	}, n.prototype.init = function(t, n, r) {
		if (this.enabled = !0, this.type = t, this.$element = e(n), this.options = this.getOptions(r), this.$viewport = this.options.viewport && e(e.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
			click: !1,
			hover: !1,
			focus: !1
		}, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
		for (var i = this.options.trigger.split(" "), a = i.length; a--;) {
			var o = i[a];
			if ("click" == o) this.$element.on("click." + this.type, this.options.selector, e.proxy(this.toggle, this));
			else if ("manual" != o) {
				var s = "hover" == o ? "mouseenter" : "focusin",
					l = "hover" == o ? "mouseleave" : "focusout";
				this.$element.on(s + "." + this.type, this.options.selector, e.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, e.proxy(this.leave, this))
			}
		}
		this.options.selector ? this._options = e.extend({}, this.options, {
			trigger: "manual",
			selector: ""
		}) : this.fixTitle()
	}, n.prototype.getDefaults = function() {
		return n.DEFAULTS
	}, n.prototype.getOptions = function(t) {
		return t = e.extend({}, this.getDefaults(), this.$element.data(), t), t.delay && "number" == typeof t.delay && (t.delay = {
			show: t.delay,
			hide: t.delay
		}), t
	}, n.prototype.getDelegateOptions = function() {
		var t = {},
			n = this.getDefaults();
		return this._options && e.each(this._options, function(e, r) {
			n[e] != r && (t[e] = r)
		}), t
	}, n.prototype.enter = function(t) {
		var n = t instanceof this.constructor ? t : e(t.currentTarget).data("bs." + this.type);
		return n || (n = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, n)), t instanceof e.Event && (n.inState["focusin" == t.type ? "focus" : "hover"] = !0), n.tip().hasClass("in") || "in" == n.hoverState ? void(n.hoverState = "in") : (clearTimeout(n.timeout), n.hoverState = "in", n.options.delay && n.options.delay.show ? void(n.timeout = setTimeout(function() {
			"in" == n.hoverState && n.show()
		}, n.options.delay.show)) : n.show())
	}, n.prototype.isInStateTrue = function() {
		for (var e in this.inState) if (this.inState[e]) return !0;
		return !1
	}, n.prototype.leave = function(t) {
		var n = t instanceof this.constructor ? t : e(t.currentTarget).data("bs." + this.type);
		if (n || (n = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, n)), t instanceof e.Event && (n.inState["focusout" == t.type ? "focus" : "hover"] = !1), !n.isInStateTrue()) return clearTimeout(n.timeout), n.hoverState = "out", n.options.delay && n.options.delay.hide ? void(n.timeout = setTimeout(function() {
			"out" == n.hoverState && n.hide()
		}, n.options.delay.hide)) : n.hide()
	}, n.prototype.show = function() {
		var t = e.Event("show.bs." + this.type);
		if (this.hasContent() && this.enabled) {
			this.$element.trigger(t);
			var r = e.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
			if (t.isDefaultPrevented() || !r) return;
			var i = this,
				a = this.tip(),
				o = this.getUID(this.type);
			this.setContent(), a.attr("id", o), this.$element.attr("aria-describedby", o), this.options.animation && a.addClass("fade");
			var s = "function" == typeof this.options.placement ? this.options.placement.call(this, a[0], this.$element[0]) : this.options.placement,
				l = /\s?auto?\s?/i,
				u = l.test(s);
			u && (s = s.replace(l, "") || "top"), a.detach().css({
				top: 0,
				left: 0,
				display: "block"
			}).addClass(s).data("bs." + this.type, this), this.options.container ? a.appendTo(this.options.container) : a.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
			var c = this.getPosition(),
				d = a[0].offsetWidth,
				h = a[0].offsetHeight;
			if (u) {
				var f = s,
					p = this.getPosition(this.$viewport);
				s = "bottom" == s && c.bottom + h > p.bottom ? "top" : "top" == s && c.top - h < p.top ? "bottom" : "right" == s && c.right + d > p.width ? "left" : "left" == s && c.left - d < p.left ? "right" : s, a.removeClass(f).addClass(s)
			}
			var m = this.getCalculatedOffset(s, c, d, h);
			this.applyPlacement(m, s);
			var _ = function() {
					var e = i.hoverState;
					i.$element.trigger("shown.bs." + i.type), i.hoverState = null, "out" == e && i.leave(i)
				};
			e.support.transition && this.$tip.hasClass("fade") ? a.one("bsTransitionEnd", _).emulateTransitionEnd(n.TRANSITION_DURATION) : _()
		}
	}, n.prototype.applyPlacement = function(t, n) {
		var r = this.tip(),
			i = r[0].offsetWidth,
			a = r[0].offsetHeight,
			o = parseInt(r.css("margin-top"), 10),
			s = parseInt(r.css("margin-left"), 10);
		isNaN(o) && (o = 0), isNaN(s) && (s = 0), t.top += o, t.left += s, e.offset.setOffset(r[0], e.extend({
			using: function(e) {
				r.css({
					top: Math.round(e.top),
					left: Math.round(e.left)
				})
			}
		}, t), 0), r.addClass("in");
		var l = r[0].offsetWidth,
			u = r[0].offsetHeight;
		"top" == n && u != a && (t.top = t.top + a - u);
		var c = this.getViewportAdjustedDelta(n, t, l, u);
		c.left ? t.left += c.left : t.top += c.top;
		var d = /top|bottom/.test(n),
			h = d ? 2 * c.left - i + l : 2 * c.top - a + u,
			f = d ? "offsetWidth" : "offsetHeight";
		r.offset(t), this.replaceArrow(h, r[0][f], d)
	}, n.prototype.replaceArrow = function(e, t, n) {
		this.arrow().css(n ? "left" : "top", 50 * (1 - e / t) + "%").css(n ? "top" : "left", "")
	}, n.prototype.setContent = function() {
		var e = this.tip(),
			t = this.getTitle();
		e.find(".tooltip-inner")[this.options.html ? "html" : "text"](t), e.removeClass("fade in top bottom left right")
	}, n.prototype.hide = function(t) {
		function r() {
			"in" != i.hoverState && a.detach(), i.$element.removeAttr("aria-describedby").trigger("hidden.bs." + i.type), t && t()
		}
		var i = this,
			a = e(this.$tip),
			o = e.Event("hide.bs." + this.type);
		if (this.$element.trigger(o), !o.isDefaultPrevented()) return a.removeClass("in"), e.support.transition && a.hasClass("fade") ? a.one("bsTransitionEnd", r).emulateTransitionEnd(n.TRANSITION_DURATION) : r(), this.hoverState = null, this
	}, n.prototype.fixTitle = function() {
		var e = this.$element;
		(e.attr("title") || "string" != typeof e.attr("data-original-title")) && e.attr("data-original-title", e.attr("title") || "").attr("title", "")
	}, n.prototype.hasContent = function() {
		return this.getTitle()
	}, n.prototype.getPosition = function(t) {
		t = t || this.$element;
		var n = t[0],
			r = "BODY" == n.tagName,
			i = n.getBoundingClientRect();
		null == i.width && (i = e.extend({}, i, {
			width: i.right - i.left,
			height: i.bottom - i.top
		}));
		var a = r ? {
			top: 0,
			left: 0
		} : t.offset(),
			o = {
				scroll: r ? document.documentElement.scrollTop || document.body.scrollTop : t.scrollTop()
			},
			s = r ? {
				width: e(window).width(),
				height: e(window).height()
			} : null;
		return e.extend({}, i, o, s, a)
	}, n.prototype.getCalculatedOffset = function(e, t, n, r) {
		return "bottom" == e ? {
			top: t.top + t.height,
			left: t.left + t.width / 2 - n / 2
		} : "top" == e ? {
			top: t.top - r,
			left: t.left + t.width / 2 - n / 2
		} : "left" == e ? {
			top: t.top + t.height / 2 - r / 2,
			left: t.left - n
		} : {
			top: t.top + t.height / 2 - r / 2,
			left: t.left + t.width
		}
	}, n.prototype.getViewportAdjustedDelta = function(e, t, n, r) {
		var i = {
			top: 0,
			left: 0
		};
		if (!this.$viewport) return i;
		var a = this.options.viewport && this.options.viewport.padding || 0,
			o = this.getPosition(this.$viewport);
		if (/right|left/.test(e)) {
			var s = t.top - a - o.scroll,
				l = t.top + a - o.scroll + r;
			s < o.top ? i.top = o.top - s : l > o.top + o.height && (i.top = o.top + o.height - l)
		} else {
			var u = t.left - a,
				c = t.left + a + n;
			u < o.left ? i.left = o.left - u : c > o.right && (i.left = o.left + o.width - c)
		}
		return i
	}, n.prototype.getTitle = function() {
		var e, t = this.$element,
			n = this.options;
		return e = t.attr("data-original-title") || ("function" == typeof n.title ? n.title.call(t[0]) : n.title)
	}, n.prototype.getUID = function(e) {
		do e += ~~ (1e6 * Math.random());
		while (document.getElementById(e));
		return e
	}, n.prototype.tip = function() {
		if (!this.$tip && (this.$tip = e(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
		return this.$tip
	}, n.prototype.arrow = function() {
		return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
	}, n.prototype.enable = function() {
		this.enabled = !0
	}, n.prototype.disable = function() {
		this.enabled = !1
	}, n.prototype.toggleEnabled = function() {
		this.enabled = !this.enabled
	}, n.prototype.toggle = function(t) {
		var n = this;
		t && (n = e(t.currentTarget).data("bs." + this.type), n || (n = new this.constructor(t.currentTarget, this.getDelegateOptions()), e(t.currentTarget).data("bs." + this.type, n))), t ? (n.inState.click = !n.inState.click, n.isInStateTrue() ? n.enter(n) : n.leave(n)) : n.tip().hasClass("in") ? n.leave(n) : n.enter(n)
	}, n.prototype.destroy = function() {
		var e = this;
		clearTimeout(this.timeout), this.hide(function() {
			e.$element.off("." + e.type).removeData("bs." + e.type), e.$tip && e.$tip.detach(), e.$tip = null, e.$arrow = null, e.$viewport = null
		})
	};
	var r = e.fn.tooltip;
	e.fn.tooltip = t, e.fn.tooltip.Constructor = n, e.fn.tooltip.noConflict = function() {
		return e.fn.tooltip = r, this
	}
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		return this.each(function() {
			var r = e(this),
				i = r.data("bs.popover"),
				a = "object" == typeof t && t;
			!i && /destroy|hide/.test(t) || (i || r.data("bs.popover", i = new n(this, a)), "string" == typeof t && i[t]())
		})
	}
	var n = function(e, t) {
			this.init("popover", e, t)
		};
	if (!e.fn.tooltip) throw new Error("Popover requires tooltip.js");
	n.VERSION = "3.3.6", n.DEFAULTS = e.extend({}, e.fn.tooltip.Constructor.DEFAULTS, {
		placement: "right",
		trigger: "click",
		content: "",
		template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
	}), n.prototype = e.extend({}, e.fn.tooltip.Constructor.prototype), n.prototype.constructor = n, n.prototype.getDefaults = function() {
		return n.DEFAULTS
	}, n.prototype.setContent = function() {
		var e = this.tip(),
			t = this.getTitle(),
			n = this.getContent();
		e.find(".popover-title")[this.options.html ? "html" : "text"](t), e.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof n ? "html" : "append" : "text"](n), e.removeClass("fade top bottom left right in"), e.find(".popover-title").html() || e.find(".popover-title").hide()
	}, n.prototype.hasContent = function() {
		return this.getTitle() || this.getContent()
	}, n.prototype.getContent = function() {
		var e = this.$element,
			t = this.options;
		return e.attr("data-content") || ("function" == typeof t.content ? t.content.call(e[0]) : t.content)
	}, n.prototype.arrow = function() {
		return this.$arrow = this.$arrow || this.tip().find(".arrow")
	};
	var r = e.fn.popover;
	e.fn.popover = t, e.fn.popover.Constructor = n, e.fn.popover.noConflict = function() {
		return e.fn.popover = r, this
	}
}(jQuery), +
function(e) {
	"use strict";

	function t(n, r) {
		this.$body = e(document.body), this.$scrollElement = e(e(n).is(document.body) ? window : n), this.options = e.extend({}, t.DEFAULTS, r), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", e.proxy(this.process, this)), this.refresh(), this.process()
	}
	function n(n) {
		return this.each(function() {
			var r = e(this),
				i = r.data("bs.scrollspy"),
				a = "object" == typeof n && n;
			i || r.data("bs.scrollspy", i = new t(this, a)), "string" == typeof n && i[n]()
		})
	}
	t.VERSION = "3.3.6", t.DEFAULTS = {
		offset: 10
	}, t.prototype.getScrollHeight = function() {
		return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
	}, t.prototype.refresh = function() {
		var t = this,
			n = "offset",
			r = 0;
		this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), e.isWindow(this.$scrollElement[0]) || (n = "position", r = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function() {
			var t = e(this),
				i = t.data("target") || t.attr("href"),
				a = /^#./.test(i) && e(i);
			return a && a.length && a.is(":visible") && [
				[a[n]().top + r, i]
			] || null
		}).sort(function(e, t) {
			return e[0] - t[0]
		}).each(function() {
			t.offsets.push(this[0]), t.targets.push(this[1])
		})
	}, t.prototype.process = function() {
		var e, t = this.$scrollElement.scrollTop() + this.options.offset,
			n = this.getScrollHeight(),
			r = this.options.offset + n - this.$scrollElement.height(),
			i = this.offsets,
			a = this.targets,
			o = this.activeTarget;
		if (this.scrollHeight != n && this.refresh(), t >= r) return o != (e = a[a.length - 1]) && this.activate(e);
		if (o && t < i[0]) return this.activeTarget = null, this.clear();
		for (e = i.length; e--;) o != a[e] && t >= i[e] && (void 0 === i[e + 1] || t < i[e + 1]) && this.activate(a[e])
	}, t.prototype.activate = function(t) {
		this.activeTarget = t, this.clear();
		var n = this.selector + '[data-target="' + t + '"],' + this.selector + '[href="' + t + '"]',
			r = e(n).parents("li").addClass("active");
		r.parent(".dropdown-menu").length && (r = r.closest("li.dropdown").addClass("active")), r.trigger("activate.bs.scrollspy")
	}, t.prototype.clear = function() {
		e(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
	};
	var r = e.fn.scrollspy;
	e.fn.scrollspy = n, e.fn.scrollspy.Constructor = t, e.fn.scrollspy.noConflict = function() {
		return e.fn.scrollspy = r, this
	}, e(window).on("load.bs.scrollspy.data-api", function() {
		e('[data-spy="scroll"]').each(function() {
			var t = e(this);
			n.call(t, t.data())
		})
	})
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		return this.each(function() {
			var r = e(this),
				i = r.data("bs.tab");
			i || r.data("bs.tab", i = new n(this)), "string" == typeof t && i[t]()
		})
	}
	var n = function(t) {
			this.element = e(t)
		};
	n.VERSION = "3.3.6", n.TRANSITION_DURATION = 150, n.prototype.show = function() {
		var t = this.element,
			n = t.closest("ul:not(.dropdown-menu)"),
			r = t.data("target");
		if (r || (r = t.attr("href"), r = r && r.replace(/.*(?=#[^\s]*$)/, "")), !t.parent("li").hasClass("active")) {
			var i = n.find(".active:last a"),
				a = e.Event("hide.bs.tab", {
					relatedTarget: t[0]
				}),
				o = e.Event("show.bs.tab", {
					relatedTarget: i[0]
				});
			if (i.trigger(a), t.trigger(o), !o.isDefaultPrevented() && !a.isDefaultPrevented()) {
				var s = e(r);
				this.activate(t.closest("li"), n), this.activate(s, s.parent(), function() {
					i.trigger({
						type: "hidden.bs.tab",
						relatedTarget: t[0]
					}), t.trigger({
						type: "shown.bs.tab",
						relatedTarget: i[0]
					})
				})
			}
		}
	}, n.prototype.activate = function(t, r, i) {
		function a() {
			o.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), t.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), s ? (t[0].offsetWidth, t.addClass("in")) : t.removeClass("fade"), t.parent(".dropdown-menu").length && t.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), i && i()
		}
		var o = r.find("> .active"),
			s = i && e.support.transition && (o.length && o.hasClass("fade") || !! r.find("> .fade").length);
		o.length && s ? o.one("bsTransitionEnd", a).emulateTransitionEnd(n.TRANSITION_DURATION) : a(), o.removeClass("in")
	};
	var r = e.fn.tab;
	e.fn.tab = t, e.fn.tab.Constructor = n, e.fn.tab.noConflict = function() {
		return e.fn.tab = r, this
	};
	var i = function(n) {
			n.preventDefault(), t.call(e(this), "show")
		};
	e(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', i).on("click.bs.tab.data-api", '[data-toggle="pill"]', i)
}(jQuery), +
function(e) {
	"use strict";

	function t(t) {
		return this.each(function() {
			var r = e(this),
				i = r.data("bs.affix"),
				a = "object" == typeof t && t;
			i || r.data("bs.affix", i = new n(this, a)), "string" == typeof t && i[t]()
		})
	}
	var n = function(t, r) {
			this.options = e.extend({}, n.DEFAULTS, r), this.$target = e(this.options.target).on("scroll.bs.affix.data-api", e.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", e.proxy(this.checkPositionWithEventLoop, this)), this.$element = e(t), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition()
		};
	n.VERSION = "3.3.6", n.RESET = "affix affix-top affix-bottom", n.DEFAULTS = {
		offset: 0,
		target: window
	}, n.prototype.getState = function(e, t, n, r) {
		var i = this.$target.scrollTop(),
			a = this.$element.offset(),
			o = this.$target.height();
		if (null != n && "top" == this.affixed) return i < n && "top";
		if ("bottom" == this.affixed) return null != n ? !(i + this.unpin <= a.top) && "bottom" : !(i + o <= e - r) && "bottom";
		var s = null == this.affixed,
			l = s ? i : a.top,
			u = s ? o : t;
		return null != n && i <= n ? "top" : null != r && l + u >= e - r && "bottom"
	}, n.prototype.getPinnedOffset = function() {
		if (this.pinnedOffset) return this.pinnedOffset;
		this.$element.removeClass(n.RESET).addClass("affix");
		var e = this.$target.scrollTop(),
			t = this.$element.offset();
		return this.pinnedOffset = t.top - e
	}, n.prototype.checkPositionWithEventLoop = function() {
		setTimeout(e.proxy(this.checkPosition, this), 1)
	}, n.prototype.checkPosition = function() {
		if (this.$element.is(":visible")) {
			var t = this.$element.height(),
				r = this.options.offset,
				i = r.top,
				a = r.bottom,
				o = Math.max(e(document).height(), e(document.body).height());
			"object" != typeof r && (a = i = r), "function" == typeof i && (i = r.top(this.$element)), "function" == typeof a && (a = r.bottom(this.$element));
			var s = this.getState(o, t, i, a);
			if (this.affixed != s) {
				null != this.unpin && this.$element.css("top", "");
				var l = "affix" + (s ? "-" + s : ""),
					u = e.Event(l + ".bs.affix");
				if (this.$element.trigger(u), u.isDefaultPrevented()) return;
				this.affixed = s, this.unpin = "bottom" == s ? this.getPinnedOffset() : null, this.$element.removeClass(n.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
			}
			"bottom" == s && this.$element.offset({
				top: o - t - a
			})
		}
	};
	var r = e.fn.affix;
	e.fn.affix = t, e.fn.affix.Constructor = n, e.fn.affix.noConflict = function() {
		return e.fn.affix = r, this
	}, e(window).on("load", function() {
		e('[data-spy="affix"]').each(function() {
			var n = e(this),
				r = n.data();
			r.offset = r.offset || {}, null != r.offsetBottom && (r.offset.bottom = r.offsetBottom), null != r.offsetTop && (r.offset.top = r.offsetTop), t.call(n, r)
		})
	})
}(jQuery), function() {
	function e(e) {
		function t(t, n, r, i, a, o) {
			for (; a >= 0 && o > a; a += e) {
				var s = i ? i[a] : a;
				r = n(r, t[s], s, t)
			}
			return r
		}
		return function(n, r, i, a) {
			r = v(r, a, 4);
			var o = !L(n) && y.keys(n),
				s = (o || n).length,
				l = e > 0 ? 0 : s - 1;
			return arguments.length < 3 && (i = n[o ? o[l] : l], l += e), t(n, r, i, o, l, s)
		}
	}
	function t(e) {
		return function(t, n, r) {
			n = E(n, r);
			for (var i = M(t), a = e > 0 ? 0 : i - 1; a >= 0 && i > a; a += e) if (n(t[a], a, t)) return a;
			return -1
		}
	}
	function n(e, t, n) {
		return function(r, i, a) {
			var o = 0,
				s = M(r);
			if ("number" == typeof a) e > 0 ? o = a >= 0 ? a : Math.max(a + s, o) : s = a >= 0 ? Math.min(a + 1, s) : a + s + 1;
			else if (n && a && s) return a = n(r, i), r[a] === i ? a : -1;
			if (i !== i) return a = t(c.call(r, o, s), y.isNaN), a >= 0 ? a + o : -1;
			for (a = e > 0 ? o : s - 1; a >= 0 && s > a; a += e) if (r[a] === i) return a;
			return -1
		}
	}
	function r(e, t) {
		var n = Y.length,
			r = e.constructor,
			i = y.isFunction(r) && r.prototype || s,
			a = "constructor";
		for (y.has(e, a) && !y.contains(t, a) && t.push(a); n--;) a = Y[n], a in e && e[a] !== i[a] && !y.contains(t, a) && t.push(a)
	}
	var i = this,
		a = i._,
		o = Array.prototype,
		s = Object.prototype,
		l = Function.prototype,
		u = o.push,
		c = o.slice,
		d = s.toString,
		h = s.hasOwnProperty,
		f = Array.isArray,
		p = Object.keys,
		m = l.bind,
		_ = Object.create,
		g = function() {},
		y = function(e) {
			return e instanceof y ? e : this instanceof y ? void(this._wrapped = e) : new y(e)
		};
	"undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = y), exports._ = y) : i._ = y, y.VERSION = "1.8.3";
	var v = function(e, t, n) {
			if (void 0 === t) return e;
			switch (null == n ? 3 : n) {
			case 1:
				return function(n) {
					return e.call(t, n)
				};
			case 2:
				return function(n, r) {
					return e.call(t, n, r)
				};
			case 3:
				return function(n, r, i) {
					return e.call(t, n, r, i)
				};
			case 4:
				return function(n, r, i, a) {
					return e.call(t, n, r, i, a)
				}
			}
			return function() {
				return e.apply(t, arguments)
			}
		},
		E = function(e, t, n) {
			return null == e ? y.identity : y.isFunction(e) ? v(e, t, n) : y.isObject(e) ? y.matcher(e) : y.property(e)
		};
	y.iteratee = function(e, t) {
		return E(e, t, 1 / 0)
	};
	var b = function(e, t) {
			return function(n) {
				var r = arguments.length;
				if (2 > r || null == n) return n;
				for (var i = 1; r > i; i++) for (var a = arguments[i], o = e(a), s = o.length, l = 0; s > l; l++) {
					var u = o[l];
					t && void 0 !== n[u] || (n[u] = a[u])
				}
				return n
			}
		},
		U = function(e) {
			if (!y.isObject(e)) return {};
			if (_) return _(e);
			g.prototype = e;
			var t = new g;
			return g.prototype = null, t
		},
		w = function(e) {
			return function(t) {
				return null == t ? void 0 : t[e]
			}
		},
		k = Math.pow(2, 53) - 1,
		M = w("length"),
		L = function(e) {
			var t = M(e);
			return "number" == typeof t && t >= 0 && k >= t
		};
	y.each = y.forEach = function(e, t, n) {
		t = v(t, n);
		var r, i;
		if (L(e)) for (r = 0, i = e.length; i > r; r++) t(e[r], r, e);
		else {
			var a = y.keys(e);
			for (r = 0, i = a.length; i > r; r++) t(e[a[r]], a[r], e)
		}
		return e
	}, y.map = y.collect = function(e, t, n) {
		t = E(t, n);
		for (var r = !L(e) && y.keys(e), i = (r || e).length, a = Array(i), o = 0; i > o; o++) {
			var s = r ? r[o] : o;
			a[o] = t(e[s], s, e)
		}
		return a
	}, y.reduce = y.foldl = y.inject = e(1), y.reduceRight = y.foldr = e(-1), y.find = y.detect = function(e, t, n) {
		var r;
		return r = L(e) ? y.findIndex(e, t, n) : y.findKey(e, t, n), void 0 !== r && r !== -1 ? e[r] : void 0
	}, y.filter = y.select = function(e, t, n) {
		var r = [];
		return t = E(t, n), y.each(e, function(e, n, i) {
			t(e, n, i) && r.push(e)
		}), r
	}, y.reject = function(e, t, n) {
		return y.filter(e, y.negate(E(t)), n)
	}, y.every = y.all = function(e, t, n) {
		t = E(t, n);
		for (var r = !L(e) && y.keys(e), i = (r || e).length, a = 0; i > a; a++) {
			var o = r ? r[a] : a;
			if (!t(e[o], o, e)) return !1
		}
		return !0
	}, y.some = y.any = function(e, t, n) {
		t = E(t, n);
		for (var r = !L(e) && y.keys(e), i = (r || e).length, a = 0; i > a; a++) {
			var o = r ? r[a] : a;
			if (t(e[o], o, e)) return !0
		}
		return !1
	}, y.contains = y.includes = y.include = function(e, t, n, r) {
		return L(e) || (e = y.values(e)), ("number" != typeof n || r) && (n = 0), y.indexOf(e, t, n) >= 0
	}, y.invoke = function(e, t) {
		var n = c.call(arguments, 2),
			r = y.isFunction(t);
		return y.map(e, function(e) {
			var i = r ? t : e[t];
			return null == i ? i : i.apply(e, n)
		})
	}, y.pluck = function(e, t) {
		return y.map(e, y.property(t))
	}, y.where = function(e, t) {
		return y.filter(e, y.matcher(t))
	}, y.findWhere = function(e, t) {
		return y.find(e, y.matcher(t))
	}, y.max = function(e, t, n) {
		var r, i, a = -1 / 0,
			o = -1 / 0;
		if (null == t && null != e) {
			e = L(e) ? e : y.values(e);
			for (var s = 0, l = e.length; l > s; s++) r = e[s], r > a && (a = r)
		} else t = E(t, n), y.each(e, function(e, n, r) {
			i = t(e, n, r), (i > o || i === -1 / 0 && a === -1 / 0) && (a = e, o = i)
		});
		return a
	}, y.min = function(e, t, n) {
		var r, i, a = 1 / 0,
			o = 1 / 0;
		if (null == t && null != e) {
			e = L(e) ? e : y.values(e);
			for (var s = 0, l = e.length; l > s; s++) r = e[s], a > r && (a = r)
		} else t = E(t, n), y.each(e, function(e, n, r) {
			i = t(e, n, r), (o > i || 1 / 0 === i && 1 / 0 === a) && (a = e, o = i)
		});
		return a
	}, y.shuffle = function(e) {
		for (var t, n = L(e) ? e : y.values(e), r = n.length, i = Array(r), a = 0; r > a; a++) t = y.random(0, a), t !== a && (i[a] = i[t]), i[t] = n[a];
		return i
	}, y.sample = function(e, t, n) {
		return null == t || n ? (L(e) || (e = y.values(e)), e[y.random(e.length - 1)]) : y.shuffle(e).slice(0, Math.max(0, t))
	}, y.sortBy = function(e, t, n) {
		return t = E(t, n), y.pluck(y.map(e, function(e, n, r) {
			return {
				value: e,
				index: n,
				criteria: t(e, n, r)
			}
		}).sort(function(e, t) {
			var n = e.criteria,
				r = t.criteria;
			if (n !== r) {
				if (n > r || void 0 === n) return 1;
				if (r > n || void 0 === r) return -1
			}
			return e.index - t.index
		}), "value")
	};
	var F = function(e) {
			return function(t, n, r) {
				var i = {};
				return n = E(n, r), y.each(t, function(r, a) {
					var o = n(r, a, t);
					e(i, r, o)
				}), i
			}
		};
	y.groupBy = F(function(e, t, n) {
		y.has(e, n) ? e[n].push(t) : e[n] = [t]
	}), y.indexBy = F(function(e, t, n) {
		e[n] = t
	}), y.countBy = F(function(e, t, n) {
		y.has(e, n) ? e[n]++ : e[n] = 1
	}), y.toArray = function(e) {
		return e ? y.isArray(e) ? c.call(e) : L(e) ? y.map(e, y.identity) : y.values(e) : []
	}, y.size = function(e) {
		return null == e ? 0 : L(e) ? e.length : y.keys(e).length
	}, y.partition = function(e, t, n) {
		t = E(t, n);
		var r = [],
			i = [];
		return y.each(e, function(e, n, a) {
			(t(e, n, a) ? r : i).push(e)
		}), [r, i]
	}, y.first = y.head = y.take = function(e, t, n) {
		return null == e ? void 0 : null == t || n ? e[0] : y.initial(e, e.length - t)
	}, y.initial = function(e, t, n) {
		return c.call(e, 0, Math.max(0, e.length - (null == t || n ? 1 : t)))
	}, y.last = function(e, t, n) {
		return null == e ? void 0 : null == t || n ? e[e.length - 1] : y.rest(e, Math.max(0, e.length - t))
	}, y.rest = y.tail = y.drop = function(e, t, n) {
		return c.call(e, null == t || n ? 1 : t)
	}, y.compact = function(e) {
		return y.filter(e, y.identity)
	};
	var D = function(e, t, n, r) {
			for (var i = [], a = 0, o = r || 0, s = M(e); s > o; o++) {
				var l = e[o];
				if (L(l) && (y.isArray(l) || y.isArguments(l))) {
					t || (l = D(l, t, n));
					var u = 0,
						c = l.length;
					for (i.length += c; c > u;) i[a++] = l[u++]
				} else n || (i[a++] = l)
			}
			return i
		};
	y.flatten = function(e, t) {
		return D(e, t, !1)
	}, y.without = function(e) {
		return y.difference(e, c.call(arguments, 1))
	}, y.uniq = y.unique = function(e, t, n, r) {
		y.isBoolean(t) || (r = n, n = t, t = !1), null != n && (n = E(n, r));
		for (var i = [], a = [], o = 0, s = M(e); s > o; o++) {
			var l = e[o],
				u = n ? n(l, o, e) : l;
			t ? (o && a === u || i.push(l), a = u) : n ? y.contains(a, u) || (a.push(u), i.push(l)) : y.contains(i, l) || i.push(l)
		}
		return i
	}, y.union = function() {
		return y.uniq(D(arguments, !0, !0))
	}, y.intersection = function(e) {
		for (var t = [], n = arguments.length, r = 0, i = M(e); i > r; r++) {
			var a = e[r];
			if (!y.contains(t, a)) {
				for (var o = 1; n > o && y.contains(arguments[o], a); o++);
				o === n && t.push(a)
			}
		}
		return t
	}, y.difference = function(e) {
		var t = D(arguments, !0, !0, 1);
		return y.filter(e, function(e) {
			return !y.contains(t, e)
		})
	}, y.zip = function() {
		return y.unzip(arguments)
	}, y.unzip = function(e) {
		for (var t = e && y.max(e, M).length || 0, n = Array(t), r = 0; t > r; r++) n[r] = y.pluck(e, r);
		return n
	}, y.object = function(e, t) {
		for (var n = {}, r = 0, i = M(e); i > r; r++) t ? n[e[r]] = t[r] : n[e[r][0]] = e[r][1];
		return n
	}, y.findIndex = t(1), y.findLastIndex = t(-1), y.sortedIndex = function(e, t, n, r) {
		n = E(n, r, 1);
		for (var i = n(t), a = 0, o = M(e); o > a;) {
			var s = Math.floor((a + o) / 2);
			n(e[s]) < i ? a = s + 1 : o = s
		}
		return a
	}, y.indexOf = n(1, y.findIndex, y.sortedIndex), y.lastIndexOf = n(-1, y.findLastIndex), y.range = function(e, t, n) {
		null == t && (t = e || 0, e = 0), n = n || 1;
		for (var r = Math.max(Math.ceil((t - e) / n), 0), i = Array(r), a = 0; r > a; a++, e += n) i[a] = e;
		return i
	};
	var x = function(e, t, n, r, i) {
			if (!(r instanceof t)) return e.apply(n, i);
			var a = U(e.prototype),
				o = e.apply(a, i);
			return y.isObject(o) ? o : a
		};
	y.bind = function(e, t) {
		if (m && e.bind === m) return m.apply(e, c.call(arguments, 1));
		if (!y.isFunction(e)) throw new TypeError("Bind must be called on a function");
		var n = c.call(arguments, 2),
			r = function() {
				return x(e, r, t, this, n.concat(c.call(arguments)))
			};
		return r
	}, y.partial = function(e) {
		var t = c.call(arguments, 1),
			n = function() {
				for (var r = 0, i = t.length, a = Array(i), o = 0; i > o; o++) a[o] = t[o] === y ? arguments[r++] : t[o];
				for (; r < arguments.length;) a.push(arguments[r++]);
				return x(e, n, this, this, a)
			};
		return n
	}, y.bindAll = function(e) {
		var t, n, r = arguments.length;
		if (1 >= r) throw new Error("bindAll must be passed function names");
		for (t = 1; r > t; t++) n = arguments[t], e[n] = y.bind(e[n], e);
		return e
	}, y.memoize = function(e, t) {
		var n = function(r) {
				var i = n.cache,
					a = "" + (t ? t.apply(this, arguments) : r);
				return y.has(i, a) || (i[a] = e.apply(this, arguments)), i[a]
			};
		return n.cache = {}, n
	}, y.delay = function(e, t) {
		var n = c.call(arguments, 2);
		return setTimeout(function() {
			return e.apply(null, n)
		}, t)
	}, y.defer = y.partial(y.delay, y, 1), y.throttle = function(e, t, n) {
		var r, i, a, o = null,
			s = 0;
		n || (n = {});
		var l = function() {
				s = n.leading === !1 ? 0 : y.now(), o = null, a = e.apply(r, i), o || (r = i = null)
			};
		return function() {
			var u = y.now();
			s || n.leading !== !1 || (s = u);
			var c = t - (u - s);
			return r = this, i = arguments, 0 >= c || c > t ? (o && (clearTimeout(o), o = null), s = u, a = e.apply(r, i), o || (r = i = null)) : o || n.trailing === !1 || (o = setTimeout(l, c)), a
		}
	}, y.debounce = function(e, t, n) {
		var r, i, a, o, s, l = function() {
				var u = y.now() - o;
				t > u && u >= 0 ? r = setTimeout(l, t - u) : (r = null, n || (s = e.apply(a, i), r || (a = i = null)))
			};
		return function() {
			a = this, i = arguments, o = y.now();
			var u = n && !r;
			return r || (r = setTimeout(l, t)), u && (s = e.apply(a, i), a = i = null), s
		}
	}, y.wrap = function(e, t) {
		return y.partial(t, e)
	}, y.negate = function(e) {
		return function() {
			return !e.apply(this, arguments)
		}
	}, y.compose = function() {
		var e = arguments,
			t = e.length - 1;
		return function() {
			for (var n = t, r = e[t].apply(this, arguments); n--;) r = e[n].call(this, r);
			return r
		}
	}, y.after = function(e, t) {
		return function() {
			return --e < 1 ? t.apply(this, arguments) : void 0
		}
	}, y.before = function(e, t) {
		var n;
		return function() {
			return --e > 0 && (n = t.apply(this, arguments)), 1 >= e && (t = null), n
		}
	}, y.once = y.partial(y.before, 2);
	var T = !{
		toString: null
	}.propertyIsEnumerable("toString"),
		Y = ["valueOf", "isPrototypeOf", "toString", "propertyIsEnumerable", "hasOwnProperty", "toLocaleString"];
	y.keys = function(e) {
		if (!y.isObject(e)) return [];
		if (p) return p(e);
		var t = [];
		for (var n in e) y.has(e, n) && t.push(n);
		return T && r(e, t), t
	}, y.allKeys = function(e) {
		if (!y.isObject(e)) return [];
		var t = [];
		for (var n in e) t.push(n);
		return T && r(e, t), t
	}, y.values = function(e) {
		for (var t = y.keys(e), n = t.length, r = Array(n), i = 0; n > i; i++) r[i] = e[t[i]];
		return r
	}, y.mapObject = function(e, t, n) {
		t = E(t, n);
		for (var r, i = y.keys(e), a = i.length, o = {}, s = 0; a > s; s++) r = i[s], o[r] = t(e[r], r, e);
		return o
	}, y.pairs = function(e) {
		for (var t = y.keys(e), n = t.length, r = Array(n), i = 0; n > i; i++) r[i] = [t[i], e[t[i]]];
		return r
	}, y.invert = function(e) {
		for (var t = {}, n = y.keys(e), r = 0, i = n.length; i > r; r++) t[e[n[r]]] = n[r];
		return t
	}, y.functions = y.methods = function(e) {
		var t = [];
		for (var n in e) y.isFunction(e[n]) && t.push(n);
		return t.sort()
	}, y.extend = b(y.allKeys), y.extendOwn = y.assign = b(y.keys), y.findKey = function(e, t, n) {
		t = E(t, n);
		for (var r, i = y.keys(e), a = 0, o = i.length; o > a; a++) if (r = i[a], t(e[r], r, e)) return r
	}, y.pick = function(e, t, n) {
		var r, i, a = {},
			o = e;
		if (null == o) return a;
		y.isFunction(t) ? (i = y.allKeys(o), r = v(t, n)) : (i = D(arguments, !1, !1, 1), r = function(e, t, n) {
			return t in n
		}, o = Object(o));
		for (var s = 0, l = i.length; l > s; s++) {
			var u = i[s],
				c = o[u];
			r(c, u, o) && (a[u] = c)
		}
		return a
	}, y.omit = function(e, t, n) {
		if (y.isFunction(t)) t = y.negate(t);
		else {
			var r = y.map(D(arguments, !1, !1, 1), String);
			t = function(e, t) {
				return !y.contains(r, t)
			}
		}
		return y.pick(e, t, n)
	}, y.defaults = b(y.allKeys, !0), y.create = function(e, t) {
		var n = U(e);
		return t && y.extendOwn(n, t), n
	}, y.clone = function(e) {
		return y.isObject(e) ? y.isArray(e) ? e.slice() : y.extend({}, e) : e
	}, y.tap = function(e, t) {
		return t(e), e
	}, y.isMatch = function(e, t) {
		var n = y.keys(t),
			r = n.length;
		if (null == e) return !r;
		for (var i = Object(e), a = 0; r > a; a++) {
			var o = n[a];
			if (t[o] !== i[o] || !(o in i)) return !1
		}
		return !0
	};
	var S = function(e, t, n, r) {
			if (e === t) return 0 !== e || 1 / e === 1 / t;
			if (null == e || null == t) return e === t;
			e instanceof y && (e = e._wrapped), t instanceof y && (t = t._wrapped);
			var i = d.call(e);
			if (i !== d.call(t)) return !1;
			switch (i) {
			case "[object RegExp]":
			case "[object String]":
				return "" + e == "" + t;
			case "[object Number]":
				return +e !== +e ? +t !== +t : 0 === +e ? 1 / +e === 1 / t : +e === +t;
			case "[object Date]":
			case "[object Boolean]":
				return +e === +t
			}
			var a = "[object Array]" === i;
			if (!a) {
				if ("object" != typeof e || "object" != typeof t) return !1;
				var o = e.constructor,
					s = t.constructor;
				if (o !== s && !(y.isFunction(o) && o instanceof o && y.isFunction(s) && s instanceof s) && "constructor" in e && "constructor" in t) return !1
			}
			n = n || [], r = r || [];
			for (var l = n.length; l--;) if (n[l] === e) return r[l] === t;
			if (n.push(e), r.push(t), a) {
				if (l = e.length, l !== t.length) return !1;
				for (; l--;) if (!S(e[l], t[l], n, r)) return !1
			} else {
				var u, c = y.keys(e);
				if (l = c.length, y.keys(t).length !== l) return !1;
				for (; l--;) if (u = c[l], !y.has(t, u) || !S(e[u], t[u], n, r)) return !1
			}
			return n.pop(), r.pop(), !0
		};
	y.isEqual = function(e, t) {
		return S(e, t)
	}, y.isEmpty = function(e) {
		return null == e || (L(e) && (y.isArray(e) || y.isString(e) || y.isArguments(e)) ? 0 === e.length : 0 === y.keys(e).length)
	}, y.isElement = function(e) {
		return !(!e || 1 !== e.nodeType)
	}, y.isArray = f ||
	function(e) {
		return "[object Array]" === d.call(e)
	}, y.isObject = function(e) {
		var t = typeof e;
		return "function" === t || "object" === t && !! e
	}, y.each(["Arguments", "Function", "String", "Number", "Date", "RegExp", "Error"], function(e) {
		y["is" + e] = function(t) {
			return d.call(t) === "[object " + e + "]"
		}
	}), y.isArguments(arguments) || (y.isArguments = function(e) {
		return y.has(e, "callee")
	}), "function" != typeof / . / && "object" != typeof Int8Array && (y.isFunction = function(e) {
		return "function" == typeof e || !1
	}), y.isFinite = function(e) {
		return isFinite(e) && !isNaN(parseFloat(e))
	}, y.isNaN = function(e) {
		return y.isNumber(e) && e !== +e
	}, y.isBoolean = function(e) {
		return e === !0 || e === !1 || "[object Boolean]" === d.call(e)
	}, y.isNull = function(e) {
		return null === e
	}, y.isUndefined = function(e) {
		return void 0 === e
	}, y.has = function(e, t) {
		return null != e && h.call(e, t)
	}, y.noConflict = function() {
		return i._ = a, this
	}, y.identity = function(e) {
		return e
	}, y.constant = function(e) {
		return function() {
			return e
		}
	}, y.noop = function() {}, y.property = w, y.propertyOf = function(e) {
		return null == e ?
		function() {} : function(t) {
			return e[t]
		}
	}, y.matcher = y.matches = function(e) {
		return e = y.extendOwn({}, e), function(t) {
			return y.isMatch(t, e)
		}
	}, y.times = function(e, t, n) {
		var r = Array(Math.max(0, e));
		t = v(t, n, 1);
		for (var i = 0; e > i; i++) r[i] = t(i);
		return r
	}, y.random = function(e, t) {
		return null == t && (t = e, e = 0), e + Math.floor(Math.random() * (t - e + 1))
	}, y.now = Date.now ||
	function() {
		return (new Date).getTime()
	};
	var A = {
		"&": "&amp;",
		"<": "&lt;",
		">": "&gt;",
		'"': "&quot;",
		"'": "&#x27;",
		"`": "&#x60;"
	},
		C = y.invert(A),
		j = function(e) {
			var t = function(t) {
					return e[t]
				},
				n = "(?:" + y.keys(e).join("|") + ")",
				r = RegExp(n),
				i = RegExp(n, "g");
			return function(e) {
				return e = null == e ? "" : "" + e, r.test(e) ? e.replace(i, t) : e
			}
		};
	y.escape = j(A), y.unescape = j(C), y.result = function(e, t, n) {
		var r = null == e ? void 0 : e[t];
		return void 0 === r && (r = n), y.isFunction(r) ? r.call(e) : r
	};
	var H = 0;
	y.uniqueId = function(e) {
		var t = ++H + "";
		return e ? e + t : t
	}, y.templateSettings = {
		evaluate: /<%([\s\S]+?)%>/g,
		interpolate: /<%=([\s\S]+?)%>/g,
		escape: /<%-([\s\S]+?)%>/g
	};
	var B = /(.)^/,
		$ = {
			"'": "'",
			"\\": "\\",
			"\r": "r",
			"\n": "n",
			"\u2028": "u2028",
			"\u2029": "u2029"
		},
		P = /\\|'|\r|\n|\u2028|\u2029/g,
		O = function(e) {
			return "\\" + $[e]
		};
	y.template = function(e, t, n) {
		!t && n && (t = n), t = y.defaults({}, t, y.templateSettings);
		var r = RegExp([(t.escape || B).source, (t.interpolate || B).source, (t.evaluate || B).source].join("|") + "|$", "g"),
			i = 0,
			a = "__p+='";
		e.replace(r, function(t, n, r, o, s) {
			return a += e.slice(i, s).replace(P, O), i = s + t.length, n ? a += "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'" : r ? a += "'+\n((__t=(" + r + "))==null?'':__t)+\n'" : o && (a += "';\n" + o + "\n__p+='"), t
		}), a += "';\n", t.variable || (a = "with(obj||{}){\n" + a + "}\n"), a = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + a + "return __p;\n";
		try {
			var o = new Function(t.variable || "obj", "_", a)
		} catch (s) {
			throw s.source = a, s
		}
		var l = function(e) {
				return o.call(this, e, y)
			},
			u = t.variable || "obj";
		return l.source = "function(" + u + "){\n" + a + "}", l
	}, y.chain = function(e) {
		var t = y(e);
		return t._chain = !0, t
	};
	var I = function(e, t) {
			return e._chain ? y(t).chain() : t
		};
	y.mixin = function(e) {
		y.each(y.functions(e), function(t) {
			var n = y[t] = e[t];
			y.prototype[t] = function() {
				var e = [this._wrapped];
				return u.apply(e, arguments), I(this, n.apply(y, e))
			}
		})
	}, y.mixin(y), y.each(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function(e) {
		var t = o[e];
		y.prototype[e] = function() {
			var n = this._wrapped;
			return t.apply(n, arguments), "shift" !== e && "splice" !== e || 0 !== n.length || delete n[0], I(this, n)
		}
	}), y.each(["concat", "join", "slice"], function(e) {
		var t = o[e];
		y.prototype[e] = function() {
			return I(this, t.apply(this._wrapped, arguments))
		}
	}), y.prototype.value = function() {
		return this._wrapped
	}, y.prototype.valueOf = y.prototype.toJSON = y.prototype.value, y.prototype.toString = function() {
		return "" + this._wrapped
	}, "function" == typeof define && define.amd && define("underscore", [], function() {
		return y
	})
}.call(this), function(e) {
	var t = "object" == typeof self && self.self === self && self || "object" == typeof global && global.global === global && global;
	if ("function" == typeof define && define.amd) define(["underscore", "jquery", "exports"], function(n, r, i) {
		t.Backbone = e(t, i, n, r)
	});
	else if ("undefined" != typeof exports) {
		var n, r = require("underscore");
		try {
			n = require("jquery")
		} catch (i) {}
		e(t, exports, r, n)
	} else t.Backbone = e(t, {}, t._, t.jQuery || t.Zepto || t.ender || t.$)
}(function(e, t, n, r) {
	var i = e.Backbone,
		a = Array.prototype.slice;
	t.VERSION = "1.3.3", t.$ = r, t.noConflict = function() {
		return e.Backbone = i, this
	}, t.emulateHTTP = !1, t.emulateJSON = !1;
	var o = function(e, t, r) {
			switch (e) {
			case 1:
				return function() {
					return n[t](this[r])
				};
			case 2:
				return function(e) {
					return n[t](this[r], e)
				};
			case 3:
				return function(e, i) {
					return n[t](this[r], l(e, this), i)
				};
			case 4:
				return function(e, i, a) {
					return n[t](this[r], l(e, this), i, a)
				};
			default:
				return function() {
					var e = a.call(arguments);
					return e.unshift(this[r]), n[t].apply(n, e)
				}
			}
		},
		s = function(e, t, r) {
			n.each(t, function(t, i) {
				n[i] && (e.prototype[i] = o(t, i, r))
			})
		},
		l = function(e, t) {
			return n.isFunction(e) ? e : n.isObject(e) && !t._isModel(e) ? u(e) : n.isString(e) ?
			function(t) {
				return t.get(e)
			} : e
		},
		u = function(e) {
			var t = n.matches(e);
			return function(e) {
				return t(e.attributes)
			}
		},
		c = t.Events = {},
		d = /\s+/,
		h = function(e, t, r, i, a) {
			var o, s = 0;
			if (r && "object" == typeof r) {
				void 0 !== i && "context" in a && void 0 === a.context && (a.context = i);
				for (o = n.keys(r); s < o.length; s++) t = h(e, t, o[s], r[o[s]], a)
			} else if (r && d.test(r)) for (o = r.split(d); s < o.length; s++) t = e(t, o[s], i, a);
			else t = e(t, r, i, a);
			return t
		};
	c.on = function(e, t, n) {
		return f(this, e, t, n)
	};
	var f = function(e, t, n, r, i) {
			if (e._events = h(p, e._events || {}, t, n, {
				context: r,
				ctx: e,
				listening: i
			}), i) {
				var a = e._listeners || (e._listeners = {});
				a[i.id] = i
			}
			return e
		};
	c.listenTo = function(e, t, r) {
		if (!e) return this;
		var i = e._listenId || (e._listenId = n.uniqueId("l")),
			a = this._listeningTo || (this._listeningTo = {}),
			o = a[i];
		if (!o) {
			var s = this._listenId || (this._listenId = n.uniqueId("l"));
			o = a[i] = {
				obj: e,
				objId: i,
				id: s,
				listeningTo: a,
				count: 0
			}
		}
		return f(e, t, r, this, o), this
	};
	var p = function(e, t, n, r) {
			if (n) {
				var i = e[t] || (e[t] = []),
					a = r.context,
					o = r.ctx,
					s = r.listening;
				s && s.count++, i.push({
					callback: n,
					context: a,
					ctx: a || o,
					listening: s
				})
			}
			return e
		};
	c.off = function(e, t, n) {
		return this._events ? (this._events = h(m, this._events, e, t, {
			context: n,
			listeners: this._listeners
		}), this) : this
	}, c.stopListening = function(e, t, r) {
		var i = this._listeningTo;
		if (!i) return this;
		for (var a = e ? [e._listenId] : n.keys(i), o = 0; o < a.length; o++) {
			var s = i[a[o]];
			if (!s) break;
			s.obj.off(t, r, this)
		}
		return this
	};
	var m = function(e, t, r, i) {
			if (e) {
				var a, o = 0,
					s = i.context,
					l = i.listeners;
				if (t || r || s) {
					for (var u = t ? [t] : n.keys(e); o < u.length; o++) {
						t = u[o];
						var c = e[t];
						if (!c) break;
						for (var d = [], h = 0; h < c.length; h++) {
							var f = c[h];
							r && r !== f.callback && r !== f.callback._callback || s && s !== f.context ? d.push(f) : (a = f.listening, a && 0 === --a.count && (delete l[a.id], delete a.listeningTo[a.objId]))
						}
						d.length ? e[t] = d : delete e[t]
					}
					return e
				}
				for (var p = n.keys(l); o < p.length; o++) a = l[p[o]], delete l[a.id], delete a.listeningTo[a.objId]
			}
		};
	c.once = function(e, t, r) {
		var i = h(_, {}, e, t, n.bind(this.off, this));
		return "string" == typeof e && null == r && (t = void 0), this.on(i, t, r)
	}, c.listenToOnce = function(e, t, r) {
		var i = h(_, {}, t, r, n.bind(this.stopListening, this, e));
		return this.listenTo(e, i)
	};
	var _ = function(e, t, r, i) {
			if (r) {
				var a = e[t] = n.once(function() {
					i(t, a), r.apply(this, arguments)
				});
				a._callback = r
			}
			return e
		};
	c.trigger = function(e) {
		if (!this._events) return this;
		for (var t = Math.max(0, arguments.length - 1), n = Array(t), r = 0; r < t; r++) n[r] = arguments[r + 1];
		return h(g, this._events, e, void 0, n), this
	};
	var g = function(e, t, n, r) {
			if (e) {
				var i = e[t],
					a = e.all;
				i && a && (a = a.slice()), i && y(i, r), a && y(a, [t].concat(r))
			}
			return e
		},
		y = function(e, t) {
			var n, r = -1,
				i = e.length,
				a = t[0],
				o = t[1],
				s = t[2];
			switch (t.length) {
			case 0:
				for (; ++r < i;)(n = e[r]).callback.call(n.ctx);
				return;
			case 1:
				for (; ++r < i;)(n = e[r]).callback.call(n.ctx, a);
				return;
			case 2:
				for (; ++r < i;)(n = e[r]).callback.call(n.ctx, a, o);
				return;
			case 3:
				for (; ++r < i;)(n = e[r]).callback.call(n.ctx, a, o, s);
				return;
			default:
				for (; ++r < i;)(n = e[r]).callback.apply(n.ctx, t);
				return
			}
		};
	c.bind = c.on, c.unbind = c.off, n.extend(t, c);
	var v = t.Model = function(e, t) {
			var r = e || {};
			t || (t = {}), this.cid = n.uniqueId(this.cidPrefix), this.attributes = {}, t.collection && (this.collection = t.collection), t.parse && (r = this.parse(r, t) || {});
			var i = n.result(this, "defaults");
			r = n.defaults(n.extend({}, i, r), i), this.set(r, t), this.changed = {}, this.initialize.apply(this, arguments)
		};
	n.extend(v.prototype, c, {
		changed: null,
		validationError: null,
		idAttribute: "id",
		cidPrefix: "c",
		initialize: function() {},
		toJSON: function(e) {
			return n.clone(this.attributes)
		},
		sync: function() {
			return t.sync.apply(this, arguments)
		},
		get: function(e) {
			return this.attributes[e]
		},
		escape: function(e) {
			return n.escape(this.get(e))
		},
		has: function(e) {
			return null != this.get(e)
		},
		matches: function(e) {
			return !!n.iteratee(e, this)(this.attributes)
		},
		set: function(e, t, r) {
			if (null == e) return this;
			var i;
			if ("object" == typeof e ? (i = e, r = t) : (i = {})[e] = t, r || (r = {}), !this._validate(i, r)) return !1;
			var a = r.unset,
				o = r.silent,
				s = [],
				l = this._changing;
			this._changing = !0, l || (this._previousAttributes = n.clone(this.attributes), this.changed = {});
			var u = this.attributes,
				c = this.changed,
				d = this._previousAttributes;
			for (var h in i) t = i[h], n.isEqual(u[h], t) || s.push(h), n.isEqual(d[h], t) ? delete c[h] : c[h] = t, a ? delete u[h] : u[h] = t;
			if (this.idAttribute in i && (this.id = this.get(this.idAttribute)), !o) {
				s.length && (this._pending = r);
				for (var f = 0; f < s.length; f++) this.trigger("change:" + s[f], this, u[s[f]], r)
			}
			if (l) return this;
			if (!o) for (; this._pending;) r = this._pending, this._pending = !1, this.trigger("change", this, r);
			return this._pending = !1, this._changing = !1, this
		},
		unset: function(e, t) {
			return this.set(e, void 0, n.extend({}, t, {
				unset: !0
			}))
		},
		clear: function(e) {
			var t = {};
			for (var r in this.attributes) t[r] = void 0;
			return this.set(t, n.extend({}, e, {
				unset: !0
			}))
		},
		hasChanged: function(e) {
			return null == e ? !n.isEmpty(this.changed) : n.has(this.changed, e)
		},
		changedAttributes: function(e) {
			if (!e) return !!this.hasChanged() && n.clone(this.changed);
			var t = this._changing ? this._previousAttributes : this.attributes,
				r = {};
			for (var i in e) {
				var a = e[i];
				n.isEqual(t[i], a) || (r[i] = a)
			}
			return !!n.size(r) && r
		},
		previous: function(e) {
			return null != e && this._previousAttributes ? this._previousAttributes[e] : null
		},
		previousAttributes: function() {
			return n.clone(this._previousAttributes)
		},
		fetch: function(e) {
			e = n.extend({
				parse: !0
			}, e);
			var t = this,
				r = e.success;
			return e.success = function(n) {
				var i = e.parse ? t.parse(n, e) : n;
				return !!t.set(i, e) && (r && r.call(e.context, t, n, e), void t.trigger("sync", t, n, e))
			}, I(this, e), this.sync("read", this, e)
		},
		save: function(e, t, r) {
			var i;
			null == e || "object" == typeof e ? (i = e, r = t) : (i = {})[e] = t, r = n.extend({
				validate: !0,
				parse: !0
			}, r);
			var a = r.wait;
			if (i && !a) {
				if (!this.set(i, r)) return !1
			} else if (!this._validate(i, r)) return !1;
			var o = this,
				s = r.success,
				l = this.attributes;
			r.success = function(e) {
				o.attributes = l;
				var t = r.parse ? o.parse(e, r) : e;
				return a && (t = n.extend({}, i, t)), !(t && !o.set(t, r)) && (s && s.call(r.context, o, e, r), void o.trigger("sync", o, e, r))
			}, I(this, r), i && a && (this.attributes = n.extend({}, l, i));
			var u = this.isNew() ? "create" : r.patch ? "patch" : "update";
			"patch" !== u || r.attrs || (r.attrs = i);
			var c = this.sync(u, this, r);
			return this.attributes = l, c
		},
		destroy: function(e) {
			e = e ? n.clone(e) : {};
			var t = this,
				r = e.success,
				i = e.wait,
				a = function() {
					t.stopListening(), t.trigger("destroy", t, t.collection, e)
				};
			e.success = function(n) {
				i && a(), r && r.call(e.context, t, n, e), t.isNew() || t.trigger("sync", t, n, e)
			};
			var o = !1;
			return this.isNew() ? n.defer(e.success) : (I(this, e), o = this.sync("delete", this, e)), i || a(), o
		},
		url: function() {
			var e = n.result(this, "urlRoot") || n.result(this.collection, "url") || O();
			if (this.isNew()) return e;
			var t = this.get(this.idAttribute);
			return e.replace(/[^\/]$/, "$&/") + encodeURIComponent(t)
		},
		parse: function(e, t) {
			return e
		},
		clone: function() {
			return new this.constructor(this.attributes)
		},
		isNew: function() {
			return !this.has(this.idAttribute)
		},
		isValid: function(e) {
			return this._validate({}, n.extend({}, e, {
				validate: !0
			}))
		},
		_validate: function(e, t) {
			if (!t.validate || !this.validate) return !0;
			e = n.extend({}, this.attributes, e);
			var r = this.validationError = this.validate(e, t) || null;
			return !r || (this.trigger("invalid", this, r, n.extend(t, {
				validationError: r
			})), !1)
		}
	});
	var E = {
		keys: 1,
		values: 1,
		pairs: 1,
		invert: 1,
		pick: 0,
		omit: 0,
		chain: 1,
		isEmpty: 1
	};
	s(v, E, "attributes");
	var b = t.Collection = function(e, t) {
			t || (t = {}), t.model && (this.model = t.model), void 0 !== t.comparator && (this.comparator = t.comparator), this._reset(), this.initialize.apply(this, arguments), e && this.reset(e, n.extend({
				silent: !0
			}, t))
		},
		U = {
			add: !0,
			remove: !0,
			merge: !0
		},
		w = {
			add: !0,
			remove: !1
		},
		k = function(e, t, n) {
			n = Math.min(Math.max(n, 0), e.length);
			var r, i = Array(e.length - n),
				a = t.length;
			for (r = 0; r < i.length; r++) i[r] = e[r + n];
			for (r = 0; r < a; r++) e[r + n] = t[r];
			for (r = 0; r < i.length; r++) e[r + a + n] = i[r]
		};
	n.extend(b.prototype, c, {
		model: v,
		initialize: function() {},
		toJSON: function(e) {
			return this.map(function(t) {
				return t.toJSON(e)
			})
		},
		sync: function() {
			return t.sync.apply(this, arguments)
		},
		add: function(e, t) {
			return this.set(e, n.extend({
				merge: !1
			}, t, w))
		},
		remove: function(e, t) {
			t = n.extend({}, t);
			var r = !n.isArray(e);
			e = r ? [e] : e.slice();
			var i = this._removeModels(e, t);
			return !t.silent && i.length && (t.changes = {
				added: [],
				merged: [],
				removed: i
			}, this.trigger("update", this, t)), r ? i[0] : i
		},
		set: function(e, t) {
			if (null != e) {
				t = n.extend({}, U, t), t.parse && !this._isModel(e) && (e = this.parse(e, t) || []);
				var r = !n.isArray(e);
				e = r ? [e] : e.slice();
				var i = t.at;
				null != i && (i = +i), i > this.length && (i = this.length), i < 0 && (i += this.length + 1);
				var a, o, s = [],
					l = [],
					u = [],
					c = [],
					d = {},
					h = t.add,
					f = t.merge,
					p = t.remove,
					m = !1,
					_ = this.comparator && null == i && t.sort !== !1,
					g = n.isString(this.comparator) ? this.comparator : null;
				for (o = 0; o < e.length; o++) {
					a = e[o];
					var y = this.get(a);
					if (y) {
						if (f && a !== y) {
							var v = this._isModel(a) ? a.attributes : a;
							t.parse && (v = y.parse(v, t)), y.set(v, t), u.push(y), _ && !m && (m = y.hasChanged(g))
						}
						d[y.cid] || (d[y.cid] = !0, s.push(y)), e[o] = y
					} else h && (a = e[o] = this._prepareModel(a, t), a && (l.push(a), this._addReference(a, t), d[a.cid] = !0, s.push(a)))
				}
				if (p) {
					for (o = 0; o < this.length; o++) a = this.models[o], d[a.cid] || c.push(a);
					c.length && this._removeModels(c, t)
				}
				var E = !1,
					b = !_ && h && p;
				if (s.length && b ? (E = this.length !== s.length || n.some(this.models, function(e, t) {
					return e !== s[t]
				}), this.models.length = 0, k(this.models, s, 0), this.length = this.models.length) : l.length && (_ && (m = !0), k(this.models, l, null == i ? this.length : i), this.length = this.models.length), m && this.sort({
					silent: !0
				}), !t.silent) {
					for (o = 0; o < l.length; o++) null != i && (t.index = i + o), a = l[o], a.trigger("add", a, this, t);
					(m || E) && this.trigger("sort", this, t), (l.length || c.length || u.length) && (t.changes = {
						added: l,
						removed: c,
						merged: u
					}, this.trigger("update", this, t))
				}
				return r ? e[0] : e
			}
		},
		reset: function(e, t) {
			t = t ? n.clone(t) : {};
			for (var r = 0; r < this.models.length; r++) this._removeReference(this.models[r], t);
			return t.previousModels = this.models, this._reset(), e = this.add(e, n.extend({
				silent: !0
			}, t)), t.silent || this.trigger("reset", this, t), e
		},
		push: function(e, t) {
			return this.add(e, n.extend({
				at: this.length
			}, t))
		},
		pop: function(e) {
			var t = this.at(this.length - 1);
			return this.remove(t, e)
		},
		unshift: function(e, t) {
			return this.add(e, n.extend({
				at: 0
			}, t))
		},
		shift: function(e) {
			var t = this.at(0);
			return this.remove(t, e)
		},
		slice: function() {
			return a.apply(this.models, arguments)
		},
		get: function(e) {
			if (null != e) return this._byId[e] || this._byId[this.modelId(e.attributes || e)] || e.cid && this._byId[e.cid]
		},
		has: function(e) {
			return null != this.get(e)
		},
		at: function(e) {
			return e < 0 && (e += this.length), this.models[e]
		},
		where: function(e, t) {
			return this[t ? "find" : "filter"](e)
		},
		findWhere: function(e) {
			return this.where(e, !0)
		},
		sort: function(e) {
			var t = this.comparator;
			if (!t) throw new Error("Cannot sort a set without a comparator");
			e || (e = {});
			var r = t.length;
			return n.isFunction(t) && (t = n.bind(t, this)), 1 === r || n.isString(t) ? this.models = this.sortBy(t) : this.models.sort(t), e.silent || this.trigger("sort", this, e), this
		},
		pluck: function(e) {
			return this.map(e + "")
		},
		fetch: function(e) {
			e = n.extend({
				parse: !0
			}, e);
			var t = e.success,
				r = this;
			return e.success = function(n) {
				var i = e.reset ? "reset" : "set";
				r[i](n, e), t && t.call(e.context, r, n, e), r.trigger("sync", r, n, e)
			}, I(this, e), this.sync("read", this, e)
		},
		create: function(e, t) {
			t = t ? n.clone(t) : {};
			var r = t.wait;
			if (e = this._prepareModel(e, t), !e) return !1;
			r || this.add(e, t);
			var i = this,
				a = t.success;
			return t.success = function(e, t, n) {
				r && i.add(e, n), a && a.call(n.context, e, t, n)
			}, e.save(null, t), e
		},
		parse: function(e, t) {
			return e
		},
		clone: function() {
			return new this.constructor(this.models, {
				model: this.model,
				comparator: this.comparator
			})
		},
		modelId: function(e) {
			return e[this.model.prototype.idAttribute || "id"]
		},
		_reset: function() {
			this.length = 0, this.models = [], this._byId = {}
		},
		_prepareModel: function(e, t) {
			if (this._isModel(e)) return e.collection || (e.collection = this), e;
			t = t ? n.clone(t) : {}, t.collection = this;
			var r = new this.model(e, t);
			return r.validationError ? (this.trigger("invalid", this, r.validationError, t), !1) : r
		},
		_removeModels: function(e, t) {
			for (var n = [], r = 0; r < e.length; r++) {
				var i = this.get(e[r]);
				if (i) {
					var a = this.indexOf(i);
					this.models.splice(a, 1), this.length--, delete this._byId[i.cid];
					var o = this.modelId(i.attributes);
					null != o && delete this._byId[o], t.silent || (t.index = a, i.trigger("remove", i, this, t)), n.push(i), this._removeReference(i, t)
				}
			}
			return n
		},
		_isModel: function(e) {
			return e instanceof v
		},
		_addReference: function(e, t) {
			this._byId[e.cid] = e;
			var n = this.modelId(e.attributes);
			null != n && (this._byId[n] = e), e.on("all", this._onModelEvent, this)
		},
		_removeReference: function(e, t) {
			delete this._byId[e.cid];
			var n = this.modelId(e.attributes);
			null != n && delete this._byId[n], this === e.collection && delete e.collection, e.off("all", this._onModelEvent, this)
		},
		_onModelEvent: function(e, t, n, r) {
			if (t) {
				if (("add" === e || "remove" === e) && n !== this) return;
				if ("destroy" === e && this.remove(t, r), "change" === e) {
					var i = this.modelId(t.previousAttributes()),
						a = this.modelId(t.attributes);
					i !== a && (null != i && delete this._byId[i], null != a && (this._byId[a] = t))
				}
			}
			this.trigger.apply(this, arguments)
		}
	});
	var M = {
		forEach: 3,
		each: 3,
		map: 3,
		collect: 3,
		reduce: 0,
		foldl: 0,
		inject: 0,
		reduceRight: 0,
		foldr: 0,
		find: 3,
		detect: 3,
		filter: 3,
		select: 3,
		reject: 3,
		every: 3,
		all: 3,
		some: 3,
		any: 3,
		include: 3,
		includes: 3,
		contains: 3,
		invoke: 0,
		max: 3,
		min: 3,
		toArray: 1,
		size: 1,
		first: 3,
		head: 3,
		take: 3,
		initial: 3,
		rest: 3,
		tail: 3,
		drop: 3,
		last: 3,
		without: 0,
		difference: 0,
		indexOf: 3,
		shuffle: 1,
		lastIndexOf: 3,
		isEmpty: 1,
		chain: 1,
		sample: 3,
		partition: 3,
		groupBy: 3,
		countBy: 3,
		sortBy: 3,
		indexBy: 3,
		findIndex: 3,
		findLastIndex: 3
	};
	s(b, M, "models");
	var L = t.View = function(e) {
			this.cid = n.uniqueId("view"), n.extend(this, n.pick(e, D)), this._ensureElement(), this.initialize.apply(this, arguments)
		},
		F = /^(\S+)\s*(.*)$/,
		D = ["model", "collection", "el", "id", "attributes", "className", "tagName", "events"];
	n.extend(L.prototype, c, {
		tagName: "div",
		$: function(e) {
			return this.$el.find(e)
		},
		initialize: function() {},
		render: function() {
			return this
		},
		remove: function() {
			return this._removeElement(), this.stopListening(), this
		},
		_removeElement: function() {
			this.$el.remove()
		},
		setElement: function(e) {
			return this.undelegateEvents(), this._setElement(e), this.delegateEvents(), this
		},
		_setElement: function(e) {
			this.$el = e instanceof t.$ ? e : t.$(e), this.el = this.$el[0]
		},
		delegateEvents: function(e) {
			if (e || (e = n.result(this, "events")), !e) return this;
			this.undelegateEvents();
			for (var t in e) {
				var r = e[t];
				if (n.isFunction(r) || (r = this[r]), r) {
					var i = t.match(F);
					this.delegate(i[1], i[2], n.bind(r, this))
				}
			}
			return this
		},
		delegate: function(e, t, n) {
			return this.$el.on(e + ".delegateEvents" + this.cid, t, n), this
		},
		undelegateEvents: function() {
			return this.$el && this.$el.off(".delegateEvents" + this.cid), this
		},
		undelegate: function(e, t, n) {
			return this.$el.off(e + ".delegateEvents" + this.cid, t, n), this
		},
		_createElement: function(e) {
			return document.createElement(e)
		},
		_ensureElement: function() {
			if (this.el) this.setElement(n.result(this, "el"));
			else {
				var e = n.extend({}, n.result(this, "attributes"));
				this.id && (e.id = n.result(this, "id")), this.className && (e["class"] = n.result(this, "className")), this.setElement(this._createElement(n.result(this, "tagName"))), this._setAttributes(e)
			}
		},
		_setAttributes: function(e) {
			this.$el.attr(e)
		}
	}), t.sync = function(e, r, i) {
		var a = x[e];
		n.defaults(i || (i = {}), {
			emulateHTTP: t.emulateHTTP,
			emulateJSON: t.emulateJSON
		});
		var o = {
			type: a,
			dataType: "json"
		};
		if (i.url || (o.url = n.result(r, "url") || O()), null != i.data || !r || "create" !== e && "update" !== e && "patch" !== e || (o.contentType = "application/json", o.data = JSON.stringify(i.attrs || r.toJSON(i))), i.emulateJSON && (o.contentType = "application/x-www-form-urlencoded", o.data = o.data ? {
			model: o.data
		} : {}), i.emulateHTTP && ("PUT" === a || "DELETE" === a || "PATCH" === a)) {
			o.type = "POST", i.emulateJSON && (o.data._method = a);
			var s = i.beforeSend;
			i.beforeSend = function(e) {
				if (e.setRequestHeader("X-HTTP-Method-Override", a), s) return s.apply(this, arguments)
			}
		}
		"GET" === o.type || i.emulateJSON || (o.processData = !1);
		var l = i.error;
		i.error = function(e, t, n) {
			i.textStatus = t, i.errorThrown = n, l && l.call(i.context, e, t, n)
		};
		var u = i.xhr = t.ajax(n.extend(o, i));
		return r.trigger("request", r, u, i), u
	};
	var x = {
		create: "POST",
		update: "PUT",
		patch: "PATCH",
		"delete": "DELETE",
		read: "GET"
	};
	t.ajax = function() {
		return t.$.ajax.apply(t.$, arguments)
	};
	var T = t.Router = function(e) {
			e || (e = {}), e.routes && (this.routes = e.routes), this._bindRoutes(), this.initialize.apply(this, arguments)
		},
		Y = /\((.*?)\)/g,
		S = /(\(\?)?:\w+/g,
		A = /\*\w+/g,
		C = /[\-{}\[\]+?.,\\\^$|#\s]/g;
	n.extend(T.prototype, c, {
		initialize: function() {},
		route: function(e, r, i) {
			n.isRegExp(e) || (e = this._routeToRegExp(e)), n.isFunction(r) && (i = r, r = ""), i || (i = this[r]);
			var a = this;
			return t.history.route(e, function(n) {
				var o = a._extractParameters(e, n);
				a.execute(i, o, r) !== !1 && (a.trigger.apply(a, ["route:" + r].concat(o)), a.trigger("route", r, o), t.history.trigger("route", a, r, o))
			}), this
		},
		execute: function(e, t, n) {
			e && e.apply(this, t)
		},
		navigate: function(e, n) {
			return t.history.navigate(e, n), this
		},
		_bindRoutes: function() {
			if (this.routes) {
				this.routes = n.result(this, "routes");
				for (var e, t = n.keys(this.routes); null != (e = t.pop());) this.route(e, this.routes[e])
			}
		},
		_routeToRegExp: function(e) {
			return e = e.replace(C, "\\$&").replace(Y, "(?:$1)?").replace(S, function(e, t) {
				return t ? e : "([^/?]+)"
			}).replace(A, "([^?]*?)"), new RegExp("^" + e + "(?:\\?([\\s\\S]*))?$")
		},
		_extractParameters: function(e, t) {
			var r = e.exec(t).slice(1);
			return n.map(r, function(e, t) {
				return t === r.length - 1 ? e || null : e ? decodeURIComponent(e) : null
			})
		}
	});
	var j = t.History = function() {
			this.handlers = [], this.checkUrl = n.bind(this.checkUrl, this), "undefined" != typeof window && (this.location = window.location, this.history = window.history)
		},
		H = /^[#\/]|\s+$/g,
		B = /^\/+|\/+$/g,
		$ = /#.*$/;
	j.started = !1, n.extend(j.prototype, c, {
		interval: 50,
		atRoot: function() {
			var e = this.location.pathname.replace(/[^\/]$/, "$&/");
			return e === this.root && !this.getSearch()
		},
		matchRoot: function() {
			var e = this.decodeFragment(this.location.pathname),
				t = e.slice(0, this.root.length - 1) + "/";
			return t === this.root
		},
		decodeFragment: function(e) {
			return decodeURI(e.replace(/%25/g, "%2525"))
		},
		getSearch: function() {
			var e = this.location.href.replace(/#.*/, "").match(/\?.+/);
			return e ? e[0] : ""
		},
		getHash: function(e) {
			var t = (e || this).location.href.match(/#(.*)$/);
			return t ? t[1] : ""
		},
		getPath: function() {
			var e = this.decodeFragment(this.location.pathname + this.getSearch()).slice(this.root.length - 1);
			return "/" === e.charAt(0) ? e.slice(1) : e
		},
		getFragment: function(e) {
			return null == e && (e = this._usePushState || !this._wantsHashChange ? this.getPath() : this.getHash()), e.replace(H, "")
		},
		start: function(e) {
			if (j.started) throw new Error("Backbone.history has already been started");
			if (j.started = !0, this.options = n.extend({
				root: "/"
			}, this.options, e), this.root = this.options.root, this._wantsHashChange = this.options.hashChange !== !1, this._hasHashChange = "onhashchange" in window && (void 0 === document.documentMode || document.documentMode > 7), this._useHashChange = this._wantsHashChange && this._hasHashChange, this._wantsPushState = !! this.options.pushState, this._hasPushState = !(!this.history || !this.history.pushState), this._usePushState = this._wantsPushState && this._hasPushState, this.fragment = this.getFragment(), this.root = ("/" + this.root + "/").replace(B, "/"), this._wantsHashChange && this._wantsPushState) {
				if (!this._hasPushState && !this.atRoot()) {
					var t = this.root.slice(0, -1) || "/";
					return this.location.replace(t + "#" + this.getPath()), !0
				}
				this._hasPushState && this.atRoot() && this.navigate(this.getHash(), {
					replace: !0
				})
			}
			if (!this._hasHashChange && this._wantsHashChange && !this._usePushState) {
				this.iframe = document.createElement("iframe"), this.iframe.src = "javascript:0", this.iframe.style.display = "none", this.iframe.tabIndex = -1;
				var r = document.body,
					i = r.insertBefore(this.iframe, r.firstChild).contentWindow;
				i.document.open(), i.document.close(), i.location.hash = "#" + this.fragment
			}
			var a = window.addEventListener ||
			function(e, t) {
				return attachEvent("on" + e, t)
			};
			if (this._usePushState ? a("popstate", this.checkUrl, !1) : this._useHashChange && !this.iframe ? a("hashchange", this.checkUrl, !1) : this._wantsHashChange && (this._checkUrlInterval = setInterval(this.checkUrl, this.interval)), !this.options.silent) return this.loadUrl()
		},
		stop: function() {
			var e = window.removeEventListener ||
			function(e, t) {
				return detachEvent("on" + e, t)
			};
			this._usePushState ? e("popstate", this.checkUrl, !1) : this._useHashChange && !this.iframe && e("hashchange", this.checkUrl, !1), this.iframe && (document.body.removeChild(this.iframe), this.iframe = null), this._checkUrlInterval && clearInterval(this._checkUrlInterval), j.started = !1
		},
		route: function(e, t) {
			this.handlers.unshift({
				route: e,
				callback: t
			})
		},
		checkUrl: function(e) {
			var t = this.getFragment();
			return t === this.fragment && this.iframe && (t = this.getHash(this.iframe.contentWindow)), t !== this.fragment && (this.iframe && this.navigate(t), void this.loadUrl())
		},
		loadUrl: function(e) {
			return !!this.matchRoot() && (e = this.fragment = this.getFragment(e), n.some(this.handlers, function(t) {
				if (t.route.test(e)) return t.callback(e), !0
			}))
		},
		navigate: function(e, t) {
			if (!j.started) return !1;
			t && t !== !0 || (t = {
				trigger: !! t
			}), e = this.getFragment(e || "");
			var n = this.root;
			"" !== e && "?" !== e.charAt(0) || (n = n.slice(0, -1) || "/");
			var r = n + e;
			if (e = this.decodeFragment(e.replace($, "")), this.fragment !== e) {
				if (this.fragment = e, this._usePushState) this.history[t.replace ? "replaceState" : "pushState"]({}, document.title, r);
				else {
					if (!this._wantsHashChange) return this.location.assign(r);
					if (this._updateHash(this.location, e, t.replace), this.iframe && e !== this.getHash(this.iframe.contentWindow)) {
						var i = this.iframe.contentWindow;
						t.replace || (i.document.open(), i.document.close()), this._updateHash(i.location, e, t.replace)
					}
				}
				return t.trigger ? this.loadUrl(e) : void 0
			}
		},
		_updateHash: function(e, t, n) {
			if (n) {
				var r = e.href.replace(/(javascript:|#).*$/, "");
				e.replace(r + "#" + t)
			} else e.hash = "#" + t
		}
	}), t.history = new j;
	var P = function(e, t) {
			var r, i = this;
			return r = e && n.has(e, "constructor") ? e.constructor : function() {
				return i.apply(this, arguments)
			}, n.extend(r, i, t), r.prototype = n.create(i.prototype, e), r.prototype.constructor = r, r.__super__ = i.prototype, r
		};
	v.extend = b.extend = T.extend = L.extend = j.extend = P;
	var O = function() {
			throw new Error('A "url" property or function must be specified')
		},
		I = function(e, t) {
			var n = t.error;
			t.error = function(r) {
				n && n.call(t.context, e, r, t), e.trigger("error", e, r, t)
			}
		};
	return t
}), !
function(e, t, n) {
	"use strict";
	!
	function r(e, t, n) {
		function i(o, s) {
			if (!t[o]) {
				if (!e[o]) {
					var l = "function" == typeof require && require;
					if (!s && l) return l(o, !0);
					if (a) return a(o, !0);
					var u = new Error("Cannot find module '" + o + "'");
					throw u.code = "MODULE_NOT_FOUND", u
				}
				var c = t[o] = {
					exports: {}
				};
				e[o][0].call(c.exports, function(t) {
					var n = e[o][1][t];
					return i(n ? n : t)
				}, c, c.exports, r, e, t, n)
			}
			return t[o].exports
		}
		for (var a = "function" == typeof require && require, o = 0; o < n.length; o++) i(n[o]);
		return i
	}({
		1: [function(r, i, a) {
			var o = function(e) {
					return e && e.__esModule ? e : {
						"default": e
					}
				};
			Object.defineProperty(a, "__esModule", {
				value: !0
			});
			var s, l, u, c, d = r("./modules/handle-dom"),
				h = r("./modules/utils"),
				f = r("./modules/handle-swal-dom"),
				p = r("./modules/handle-click"),
				m = r("./modules/handle-key"),
				_ = o(m),
				g = r("./modules/default-params"),
				y = o(g),
				v = r("./modules/set-params"),
				E = o(v);
			a["default"] = u = c = function() {
				function r(e) {
					var t = i;
					return t[e] === n ? y["default"][e] : t[e]
				}
				var i = arguments[0];
				if (d.addClass(t.body, "stop-scrolling"), f.resetInput(), i === n) return h.logStr("SweetAlert expects at least 1 attribute!"), !1;
				var a = h.extend({}, y["default"]);
				switch (typeof i) {
				case "string":
					a.title = i, a.text = arguments[1] || "", a.type = arguments[2] || "";
					break;
				case "object":
					if (i.title === n) return h.logStr('Missing "title" argument!'), !1;
					a.title = i.title;
					for (var o in y["default"]) a[o] = r(o);
					a.confirmButtonText = a.showCancelButton ? "Confirm" : y["default"].confirmButtonText, a.confirmButtonText = r("confirmButtonText"), a.doneFunction = arguments[1] || null;
					break;
				default:
					return h.logStr('Unexpected type of argument! Expected "string" or "object", got ' + typeof i), !1
				}
				E["default"](a), f.fixVerticalPosition(), f.openModal(arguments[1]);
				for (var u = f.getModal(), m = u.querySelectorAll("button"), g = ["onclick", "onmouseover", "onmouseout", "onmousedown", "onmouseup", "onfocus"], v = function(e) {
						return p.handleButton(e, a, u)
					}, b = 0; b < m.length; b++) for (var U = 0; U < g.length; U++) {
					var w = g[U];
					m[b][w] = v
				}
				f.getOverlay().onclick = v, s = e.onkeydown;
				var k = function(e) {
						return _["default"](e, a, u)
					};
				e.onkeydown = k, e.onfocus = function() {
					setTimeout(function() {
						l !== n && (l.focus(), l = n)
					}, 0)
				}, c.enableButtons()
			}, u.setDefaults = c.setDefaults = function(e) {
				if (!e) throw new Error("userParams is required");
				if ("object" != typeof e) throw new Error("userParams has to be a object");
				h.extend(y["default"], e)
			}, u.close = c.close = function() {
				var r = f.getModal();
				d.fadeOut(f.getOverlay(), 5), d.fadeOut(r, 5), d.removeClass(r, "showSweetAlert"), d.addClass(r, "hideSweetAlert"), d.removeClass(r, "visible");
				var i = r.querySelector(".sa-icon.sa-success");
				d.removeClass(i, "animate"), d.removeClass(i.querySelector(".sa-tip"), "animateSuccessTip"), d.removeClass(i.querySelector(".sa-long"), "animateSuccessLong");
				var a = r.querySelector(".sa-icon.sa-error");
				d.removeClass(a, "animateErrorIcon"), d.removeClass(a.querySelector(".sa-x-mark"), "animateXMark");
				var o = r.querySelector(".sa-icon.sa-warning");
				return d.removeClass(o, "pulseWarning"), d.removeClass(o.querySelector(".sa-body"), "pulseWarningIns"), d.removeClass(o.querySelector(".sa-dot"), "pulseWarningIns"), setTimeout(function() {
					var e = r.getAttribute("data-custom-class");
					d.removeClass(r, e)
				}, 300), d.removeClass(t.body, "stop-scrolling"), e.onkeydown = s, e.previousActiveElement && e.previousActiveElement.focus(), l = n, clearTimeout(r.timeout), !0
			}, u.showInputError = c.showInputError = function(e) {
				var t = f.getModal(),
					n = t.querySelector(".sa-input-error");
				d.addClass(n, "show");
				var r = t.querySelector(".sa-error-container");
				d.addClass(r, "show"), r.querySelector("p").innerHTML = e, setTimeout(function() {
					u.enableButtons()
				}, 1), t.querySelector("input").focus()
			}, u.resetInputError = c.resetInputError = function(e) {
				if (e && 13 === e.keyCode) return !1;
				var t = f.getModal(),
					n = t.querySelector(".sa-input-error");
				d.removeClass(n, "show");
				var r = t.querySelector(".sa-error-container");
				d.removeClass(r, "show")
			}, u.disableButtons = c.disableButtons = function() {
				var e = f.getModal(),
					t = e.querySelector("button.confirm"),
					n = e.querySelector("button.cancel");
				t.disabled = !0, n.disabled = !0
			}, u.enableButtons = c.enableButtons = function() {
				var e = f.getModal(),
					t = e.querySelector("button.confirm"),
					n = e.querySelector("button.cancel");
				t.disabled = !1, n.disabled = !1
			}, "undefined" != typeof e ? e.sweetAlert = e.swal = u : h.logStr("SweetAlert is a frontend module!"), i.exports = a["default"]
		}, {
			"./modules/default-params": 2,
			"./modules/handle-click": 3,
			"./modules/handle-dom": 4,
			"./modules/handle-key": 5,
			"./modules/handle-swal-dom": 6,
			"./modules/set-params": 8,
			"./modules/utils": 9
		}],
		2: [function(e, t, n) {
			Object.defineProperty(n, "__esModule", {
				value: !0
			});
			var r = {
				title: "",
				text: "",
				type: null,
				allowOutsideClick: !1,
				showConfirmButton: !0,
				showCancelButton: !1,
				closeOnConfirm: !0,
				closeOnCancel: !0,
				confirmButtonText: "OK",
				confirmButtonColor: "#8CD4F5",
				cancelButtonText: "Cancel",
				imageUrl: null,
				imageSize: null,
				timer: null,
				customClass: "",
				html: !1,
				animation: !0,
				allowEscapeKey: !0,
				inputType: "text",
				inputPlaceholder: "",
				inputValue: "",
				showLoaderOnConfirm: !1
			};
			n["default"] = r, t.exports = n["default"]
		}, {}],
		3: [function(t, n, r) {
			Object.defineProperty(r, "__esModule", {
				value: !0
			});
			var i = t("./utils"),
				a = (t("./handle-swal-dom"), t("./handle-dom")),
				o = function(t, n, r) {
					function o(e) {
						p && n.confirmButtonColor && (f.style.backgroundColor = e)
					}
					var u, c, d, h = t || e.event,
						f = h.target || h.srcElement,
						p = -1 !== f.className.indexOf("confirm"),
						m = -1 !== f.className.indexOf("sweet-overlay"),
						_ = a.hasClass(r, "visible"),
						g = n.doneFunction && "true" === r.getAttribute("data-has-done-function");
					switch (p && n.confirmButtonColor && (u = n.confirmButtonColor, c = i.colorLuminance(u, -.04), d = i.colorLuminance(u, -.14)), h.type) {
					case "mouseover":
						o(c);
						break;
					case "mouseout":
						o(u);
						break;
					case "mousedown":
						o(d);
						break;
					case "mouseup":
						o(c);
						break;
					case "focus":
						var y = r.querySelector("button.confirm"),
							v = r.querySelector("button.cancel");
						p ? v.style.boxShadow = "none" : y.style.boxShadow = "none";
						break;
					case "click":
						var E = r === f,
							b = a.isDescendant(r, f);
						if (!E && !b && _ && !n.allowOutsideClick) break;
						p && g && _ ? s(r, n) : g && _ || m ? l(r, n) : a.isDescendant(r, f) && "BUTTON" === f.tagName && sweetAlert.close()
					}
				},
				s = function(e, t) {
					var n = !0;
					a.hasClass(e, "show-input") && (n = e.querySelector("input").value, n || (n = "")), t.doneFunction(n), t.closeOnConfirm && sweetAlert.close(), t.showLoaderOnConfirm && sweetAlert.disableButtons()
				},
				l = function(e, t) {
					var n = String(t.doneFunction).replace(/\s/g, ""),
						r = "function(" === n.substring(0, 9) && ")" !== n.substring(9, 10);
					r && t.doneFunction(!1), t.closeOnCancel && sweetAlert.close()
				};
			r["default"] = {
				handleButton: o,
				handleConfirm: s,
				handleCancel: l
			}, n.exports = r["default"]
		}, {
			"./handle-dom": 4,
			"./handle-swal-dom": 6,
			"./utils": 9
		}],
		4: [function(n, r, i) {
			Object.defineProperty(i, "__esModule", {
				value: !0
			});
			var a = function(e, t) {
					return new RegExp(" " + t + " ").test(" " + e.className + " ")
				},
				o = function(e, t) {
					a(e, t) || (e.className += " " + t)
				},
				s = function(e, t) {
					var n = " " + e.className.replace(/[\t\r\n]/g, " ") + " ";
					if (a(e, t)) {
						for (; n.indexOf(" " + t + " ") >= 0;) n = n.replace(" " + t + " ", " ");
						e.className = n.replace(/^\s+|\s+$/g, "")
					}
				},
				l = function(e) {
					var n = t.createElement("div");
					return n.appendChild(t.createTextNode(e)), n.innerHTML
				},
				u = function(e) {
					e.style.opacity = "", e.style.display = "block"
				},
				c = function(e) {
					if (e && !e.length) return u(e);
					for (var t = 0; t < e.length; ++t) u(e[t])
				},
				d = function(e) {
					e.style.opacity = "", e.style.display = "none"
				},
				h = function(e) {
					if (e && !e.length) return d(e);
					for (var t = 0; t < e.length; ++t) d(e[t])
				},
				f = function(e, t) {
					for (var n = t.parentNode; null !== n;) {
						if (n === e) return !0;
						n = n.parentNode
					}
					return !1
				},
				p = function(e) {
					e.style.left = "-9999px", e.style.display = "block";
					var t, n = e.clientHeight;
					return t = "undefined" != typeof getComputedStyle ? parseInt(getComputedStyle(e).getPropertyValue("padding-top"), 10) : parseInt(e.currentStyle.padding), e.style.left = "", e.style.display = "none", "-" + parseInt((n + t) / 2) + "px"
				},
				m = function(e, t) {
					if (+e.style.opacity < 1) {
						t = t || 16, e.style.opacity = 0, e.style.display = "block";
						var n = +new Date,
							r = function(e) {
								function t() {
									return e.apply(this, arguments)
								}
								return t.toString = function() {
									return e.toString()
								}, t
							}(function() {
								e.style.opacity = +e.style.opacity + (new Date - n) / 100, n = +new Date, +e.style.opacity < 1 && setTimeout(r, t)
							});
						r()
					}
					e.style.display = "block"
				},
				_ = function(e, t) {
					t = t || 16, e.style.opacity = 1;
					var n = +new Date,
						r = function(e) {
							function t() {
								return e.apply(this, arguments)
							}
							return t.toString = function() {
								return e.toString()
							}, t
						}(function() {
							e.style.opacity = +e.style.opacity - (new Date - n) / 100, n = +new Date, +e.style.opacity > 0 ? setTimeout(r, t) : e.style.display = "none"
						});
					r()
				},
				g = function(n) {
					if ("function" == typeof MouseEvent) {
						var r = new MouseEvent("click", {
							view: e,
							bubbles: !1,
							cancelable: !0
						});
						n.dispatchEvent(r)
					} else if (t.createEvent) {
						var i = t.createEvent("MouseEvents");
						i.initEvent("click", !1, !1), n.dispatchEvent(i)
					} else t.createEventObject ? n.fireEvent("onclick") : "function" == typeof n.onclick && n.onclick()
				},
				y = function(t) {
					"function" == typeof t.stopPropagation ? (t.stopPropagation(), t.preventDefault()) : e.event && e.event.hasOwnProperty("cancelBubble") && (e.event.cancelBubble = !0)
				};
			i.hasClass = a, i.addClass = o, i.removeClass = s, i.escapeHtml = l, i._show = u, i.show = c, i._hide = d, i.hide = h, i.isDescendant = f, i.getTopMargin = p, i.fadeIn = m, i.fadeOut = _, i.fireClick = g, i.stopEventPropagation = y
		}, {}],
		5: [function(t, r, i) {
			Object.defineProperty(i, "__esModule", {
				value: !0
			});
			var a = t("./handle-dom"),
				o = t("./handle-swal-dom"),
				s = function(t, r, i) {
					var s = t || e.event,
						l = s.keyCode || s.which,
						u = i.querySelector("button.confirm"),
						c = i.querySelector("button.cancel"),
						d = i.querySelectorAll("button[tabindex]");
					if (-1 !== [9, 13, 32, 27].indexOf(l)) {
						for (var h = s.target || s.srcElement, f = -1, p = 0; p < d.length; p++) if (h === d[p]) {
							f = p;
							break
						}
						9 === l ? (h = -1 === f ? u : f === d.length - 1 ? d[0] : d[f + 1], a.stopEventPropagation(s), h.focus(), r.confirmButtonColor && o.setFocusStyle(h, r.confirmButtonColor)) : 13 === l ? ("INPUT" === h.tagName && (h = u, u.focus()), h = -1 === f ? u : n) : 27 === l && r.allowEscapeKey === !0 ? (h = c, a.fireClick(h, s)) : h = n
					}
				};
			i["default"] = s, r.exports = i["default"]
		}, {
			"./handle-dom": 4,
			"./handle-swal-dom": 6
		}],
		6: [function(n, r, i) {
			var a = function(e) {
					return e && e.__esModule ? e : {
						"default": e
					}
				};
			Object.defineProperty(i, "__esModule", {
				value: !0
			});
			var o = n("./utils"),
				s = n("./handle-dom"),
				l = n("./default-params"),
				u = a(l),
				c = n("./injected-html"),
				d = a(c),
				h = ".sweet-alert",
				f = ".sweet-overlay",
				p = function() {
					var e = t.createElement("div");
					for (e.innerHTML = d["default"]; e.firstChild;) t.body.appendChild(e.firstChild)
				},
				m = function(e) {
					function t() {
						return e.apply(this, arguments)
					}
					return t.toString = function() {
						return e.toString()
					}, t
				}(function() {
					var e = t.querySelector(h);
					return e || (p(), e = m()), e
				}),
				_ = function() {
					var e = m();
					return e ? e.querySelector("input") : void 0
				},
				g = function() {
					return t.querySelector(f)
				},
				y = function(e, t) {
					var n = o.hexToRgb(t);
					e.style.boxShadow = "0 0 2px rgba(" + n + ", 0.8), inset 0 0 0 1px rgba(0, 0, 0, 0.05)"
				},
				v = function(n) {
					var r = m();
					s.fadeIn(g(), 10), s.show(r), s.addClass(r, "showSweetAlert"), s.removeClass(r, "hideSweetAlert"), e.previousActiveElement = t.activeElement;
					var i = r.querySelector("button.confirm");
					i.focus(), setTimeout(function() {
						s.addClass(r, "visible")
					}, 500);
					var a = r.getAttribute("data-timer");
					if ("null" !== a && "" !== a) {
						var o = n;
						r.timeout = setTimeout(function() {
							var e = (o || null) && "true" === r.getAttribute("data-has-done-function");
							e ? o(null) : sweetAlert.close()
						}, a)
					}
				},
				E = function() {
					var e = m(),
						t = _();
					s.removeClass(e, "show-input"), t.value = u["default"].inputValue, t.setAttribute("type", u["default"].inputType), t.setAttribute("placeholder", u["default"].inputPlaceholder), b()
				},
				b = function(e) {
					if (e && 13 === e.keyCode) return !1;
					var t = m(),
						n = t.querySelector(".sa-input-error");
					s.removeClass(n, "show");
					var r = t.querySelector(".sa-error-container");
					s.removeClass(r, "show")
				},
				U = function() {
					var e = m();
					e.style.marginTop = s.getTopMargin(m())
				};
			i.sweetAlertInitialize = p, i.getModal = m, i.getOverlay = g, i.getInput = _, i.setFocusStyle = y, i.openModal = v, i.resetInput = E, i.resetInputError = b, i.fixVerticalPosition = U
		}, {
			"./default-params": 2,
			"./handle-dom": 4,
			"./injected-html": 7,
			"./utils": 9
		}],
		7: [function(e, t, n) {
			Object.defineProperty(n, "__esModule", {
				value: !0
			});
			var r = '<div class="sweet-overlay" tabIndex="-1"></div><div class="sweet-alert"><div class="sa-icon sa-error">\n      <span class="sa-x-mark">\n        <span class="sa-line sa-left"></span>\n        <span class="sa-line sa-right"></span>\n      </span>\n    </div><div class="sa-icon sa-warning">\n      <span class="sa-body"></span>\n      <span class="sa-dot"></span>\n    </div><div class="sa-icon sa-info"></div><div class="sa-icon sa-success">\n      <span class="sa-line sa-tip"></span>\n      <span class="sa-line sa-long"></span>\n\n      <div class="sa-placeholder"></div>\n      <div class="sa-fix"></div>\n    </div><div class="sa-icon sa-custom"></div><h2>Title</h2>\n    <p>Text</p>\n    <fieldset>\n      <input type="text" tabIndex="3" />\n      <div class="sa-input-error"></div>\n    </fieldset><div class="sa-error-container">\n      <div class="icon">!</div>\n      <p>Not valid!</p>\n    </div><div class="sa-button-container">\n      <button class="cancel" tabIndex="2">Cancel</button>\n      <div class="sa-confirm-button-container">\n        <button class="confirm" tabIndex="1">OK</button><div class="la-ball-fall">\n          <div></div>\n          <div></div>\n          <div></div>\n        </div>\n      </div>\n    </div></div>';
			n["default"] = r, t.exports = n["default"]
		}, {}],
		8: [function(e, t, r) {
			Object.defineProperty(r, "__esModule", {
				value: !0
			});
			var i = e("./utils"),
				a = e("./handle-swal-dom"),
				o = e("./handle-dom"),
				s = ["error", "warning", "info", "success", "input", "prompt"],
				l = function(e) {
					var t = a.getModal(),
						r = t.querySelector("h2"),
						l = t.querySelector("p"),
						u = t.querySelector("button.cancel"),
						c = t.querySelector("button.confirm");
					if (r.innerHTML = e.html ? e.title : o.escapeHtml(e.title).split("\n").join("<br>"), l.innerHTML = e.html ? e.text : o.escapeHtml(e.text || "").split("\n").join("<br>"), e.text && o.show(l), e.customClass) o.addClass(t, e.customClass), t.setAttribute("data-custom-class", e.customClass);
					else {
						var d = t.getAttribute("data-custom-class");
						o.removeClass(t, d), t.setAttribute("data-custom-class", "")
					}
					if (o.hide(t.querySelectorAll(".sa-icon")), e.type && !i.isIE8()) {
						var h = function() {
								for (var r = !1, i = 0; i < s.length; i++) if (e.type === s[i]) {
									r = !0;
									break
								}
								if (!r) return logStr("Unknown alert type: " + e.type), {
									v: !1
								};
								var l = ["success", "error", "warning", "info"],
									u = n; - 1 !== l.indexOf(e.type) && (u = t.querySelector(".sa-icon.sa-" + e.type), o.show(u));
								var c = a.getInput();
								switch (e.type) {
								case "success":
									o.addClass(u, "animate"), o.addClass(u.querySelector(".sa-tip"), "animateSuccessTip"), o.addClass(u.querySelector(".sa-long"), "animateSuccessLong");
									break;
								case "error":
									o.addClass(u, "animateErrorIcon"), o.addClass(u.querySelector(".sa-x-mark"), "animateXMark");
									break;
								case "warning":
									o.addClass(u, "pulseWarning"), o.addClass(u.querySelector(".sa-body"), "pulseWarningIns"), o.addClass(u.querySelector(".sa-dot"), "pulseWarningIns");
									break;
								case "input":
								case "prompt":
									c.setAttribute("type", e.inputType), c.value = e.inputValue, c.setAttribute("placeholder", e.inputPlaceholder), o.addClass(t, "show-input"), setTimeout(function() {
										c.focus(), c.addEventListener("keyup", swal.resetInputError)
									}, 400)
								}
							}();
						if ("object" == typeof h) return h.v
					}
					if (e.imageUrl) {
						var f = t.querySelector(".sa-icon.sa-custom");
						f.style.backgroundImage = "url(" + e.imageUrl + ")", o.show(f);
						var p = 80,
							m = 80;
						if (e.imageSize) {
							var _ = e.imageSize.toString().split("x"),
								g = _[0],
								y = _[1];
							g && y ? (p = g, m = y) : logStr("Parameter imageSize expects value with format WIDTHxHEIGHT, got " + e.imageSize)
						}
						f.setAttribute("style", f.getAttribute("style") + "width:" + p + "px; height:" + m + "px")
					}
					t.setAttribute("data-has-cancel-button", e.showCancelButton), e.showCancelButton ? u.style.display = "inline-block" : o.hide(u), t.setAttribute("data-has-confirm-button", e.showConfirmButton), e.showConfirmButton ? c.style.display = "inline-block" : o.hide(c), e.cancelButtonText && (u.innerHTML = o.escapeHtml(e.cancelButtonText)), e.confirmButtonText && (c.innerHTML = o.escapeHtml(e.confirmButtonText)), e.confirmButtonColor && (c.style.backgroundColor = e.confirmButtonColor, c.style.borderLeftColor = e.confirmLoadingButtonColor, c.style.borderRightColor = e.confirmLoadingButtonColor, a.setFocusStyle(c, e.confirmButtonColor)), t.setAttribute("data-allow-outside-click", e.allowOutsideClick);
					var v = !! e.doneFunction;
					t.setAttribute("data-has-done-function", v), e.animation ? "string" == typeof e.animation ? t.setAttribute("data-animation", e.animation) : t.setAttribute("data-animation", "pop") : t.setAttribute("data-animation", "none"), t.setAttribute("data-timer", e.timer)
				};
			r["default"] = l, t.exports = r["default"]
		}, {
			"./handle-dom": 4,
			"./handle-swal-dom": 6,
			"./utils": 9
		}],
		9: [function(t, n, r) {
			Object.defineProperty(r, "__esModule", {
				value: !0
			});
			var i = function(e, t) {
					for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
					return e
				},
				a = function(e) {
					var t = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);
					return t ? parseInt(t[1], 16) + ", " + parseInt(t[2], 16) + ", " + parseInt(t[3], 16) : null
				},
				o = function() {
					return e.attachEvent && !e.addEventListener
				},
				s = function(t) {
					e.console && e.console.log("SweetAlert: " + t)
				},
				l = function(e, t) {
					e = String(e).replace(/[^0-9a-f]/gi, ""), e.length < 6 && (e = e[0] + e[0] + e[1] + e[1] + e[2] + e[2]), t = t || 0;
					var n, r, i = "#";
					for (r = 0; 3 > r; r++) n = parseInt(e.substr(2 * r, 2), 16), n = Math.round(Math.min(Math.max(0, n + n * t), 255)).toString(16), i += ("00" + n).substr(n.length);
					return i
				};
			r.extend = i, r.hexToRgb = a, r.isIE8 = o, r.logStr = s, r.colorLuminance = l
		}, {}]
	}, {}, [1]), "function" == typeof define && define.amd ? define(function() {
		return sweetAlert
	}) : "undefined" != typeof module && module.exports && (module.exports = sweetAlert)
}(window, document), function(e, t) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.moment = t()
}(this, function() {
	"use strict";

	function e() {
		return ri.apply(null, arguments)
	}
	function t(e) {
		ri = e
	}
	function n(e) {
		return e instanceof Array || "[object Array]" === Object.prototype.toString.call(e)
	}
	function r(e) {
		return e instanceof Date || "[object Date]" === Object.prototype.toString.call(e)
	}
	function i(e, t) {
		var n, r = [];
		for (n = 0; n < e.length; ++n) r.push(t(e[n], n));
		return r
	}
	function a(e, t) {
		return Object.prototype.hasOwnProperty.call(e, t)
	}
	function o(e, t) {
		for (var n in t) a(t, n) && (e[n] = t[n]);
		return a(t, "toString") && (e.toString = t.toString), a(t, "valueOf") && (e.valueOf = t.valueOf), e
	}
	function s(e, t, n, r) {
		return je(e, t, n, r, !0).utc()
	}
	function l() {
		return {
			empty: !1,
			unusedTokens: [],
			unusedInput: [],
			overflow: -2,
			charsLeftOver: 0,
			nullInput: !1,
			invalidMonth: null,
			invalidFormat: !1,
			userInvalidated: !1,
			iso: !1,
			parsedDateParts: [],
			meridiem: null
		}
	}
	function u(e) {
		return null == e._pf && (e._pf = l()), e._pf
	}
	function c(e) {
		if (null == e._isValid) {
			var t = u(e),
				n = ii.call(t.parsedDateParts, function(e) {
					return null != e
				});
			e._isValid = !isNaN(e._d.getTime()) && t.overflow < 0 && !t.empty && !t.invalidMonth && !t.invalidWeekday && !t.nullInput && !t.invalidFormat && !t.userInvalidated && (!t.meridiem || t.meridiem && n), e._strict && (e._isValid = e._isValid && 0 === t.charsLeftOver && 0 === t.unusedTokens.length && void 0 === t.bigHour)
		}
		return e._isValid
	}
	function d(e) {
		var t = s(NaN);
		return null != e ? o(u(t), e) : u(t).userInvalidated = !0, t
	}
	function h(e) {
		return void 0 === e
	}
	function f(e, t) {
		var n, r, i;
		if (h(t._isAMomentObject) || (e._isAMomentObject = t._isAMomentObject), h(t._i) || (e._i = t._i), h(t._f) || (e._f = t._f), h(t._l) || (e._l = t._l), h(t._strict) || (e._strict = t._strict), h(t._tzm) || (e._tzm = t._tzm), h(t._isUTC) || (e._isUTC = t._isUTC), h(t._offset) || (e._offset = t._offset), h(t._pf) || (e._pf = u(t)), h(t._locale) || (e._locale = t._locale), ai.length > 0) for (n in ai) r = ai[n], i = t[r], h(i) || (e[r] = i);
		return e
	}
	function p(t) {
		f(this, t), this._d = new Date(null != t._d ? t._d.getTime() : NaN), oi === !1 && (oi = !0, e.updateOffset(this), oi = !1)
	}
	function m(e) {
		return e instanceof p || null != e && null != e._isAMomentObject
	}
	function _(e) {
		return e < 0 ? Math.ceil(e) : Math.floor(e)
	}
	function g(e) {
		var t = +e,
			n = 0;
		return 0 !== t && isFinite(t) && (n = _(t)), n
	}
	function y(e, t, n) {
		var r, i = Math.min(e.length, t.length),
			a = Math.abs(e.length - t.length),
			o = 0;
		for (r = 0; r < i; r++)(n && e[r] !== t[r] || !n && g(e[r]) !== g(t[r])) && o++;
		return o + a
	}
	function v(t) {
		e.suppressDeprecationWarnings === !1 && "undefined" != typeof console && console.warn && console.warn("Deprecation warning: " + t)
	}
	function E(t, n) {
		var r = !0;
		return o(function() {
			return null != e.deprecationHandler && e.deprecationHandler(null, t), r && (v(t + "\nArguments: " + Array.prototype.slice.call(arguments).join(", ") + "\n" + (new Error).stack), r = !1), n.apply(this, arguments)
		}, n)
	}
	function b(t, n) {
		null != e.deprecationHandler && e.deprecationHandler(t, n), si[t] || (v(n), si[t] = !0)
	}
	function U(e) {
		return e instanceof Function || "[object Function]" === Object.prototype.toString.call(e)
	}
	function w(e) {
		return "[object Object]" === Object.prototype.toString.call(e)
	}
	function k(e) {
		var t, n;
		for (n in e) t = e[n], U(t) ? this[n] = t : this["_" + n] = t;
		this._config = e, this._ordinalParseLenient = new RegExp(this._ordinalParse.source + "|" + /\d{1,2}/.source)
	}
	function M(e, t) {
		var n, r = o({}, e);
		for (n in t) a(t, n) && (w(e[n]) && w(t[n]) ? (r[n] = {}, o(r[n], e[n]), o(r[n], t[n])) : null != t[n] ? r[n] = t[n] : delete r[n]);
		return r
	}
	function L(e) {
		null != e && this.set(e)
	}
	function F(e) {
		return e ? e.toLowerCase().replace("_", "-") : e
	}
	function D(e) {
		for (var t, n, r, i, a = 0; a < e.length;) {
			for (i = F(e[a]).split("-"), t = i.length, n = F(e[a + 1]), n = n ? n.split("-") : null; t > 0;) {
				if (r = x(i.slice(0, t).join("-"))) return r;
				if (n && n.length >= t && y(i, n, !0) >= t - 1) break;
				t--
			}
			a++
		}
		return null
	}
	function x(e) {
		var t = null;
		if (!di[e] && "undefined" != typeof module && module && module.exports) try {
			t = ui._abbr, require("./locale/" + e), T(t)
		} catch (n) {}
		return di[e]
	}
	function T(e, t) {
		var n;
		return e && (n = h(t) ? A(e) : Y(e, t), n && (ui = n)), ui._abbr
	}
	function Y(e, t) {
		return null !== t ? (t.abbr = e, null != di[e] ? (b("defineLocaleOverride", "use moment.updateLocale(localeName, config) to change an existing locale. moment.defineLocale(localeName, config) should only be used for creating a new locale"), t = M(di[e]._config, t)) : null != t.parentLocale && (null != di[t.parentLocale] ? t = M(di[t.parentLocale]._config, t) : b("parentLocaleUndefined", "specified parentLocale is not defined yet")), di[e] = new L(t), T(e), di[e]) : (delete di[e], null)
	}
	function S(e, t) {
		if (null != t) {
			var n;
			null != di[e] && (t = M(di[e]._config, t)), n = new L(t), n.parentLocale = di[e], di[e] = n, T(e)
		} else null != di[e] && (null != di[e].parentLocale ? di[e] = di[e].parentLocale : null != di[e] && delete di[e]);
		return di[e]
	}
	function A(e) {
		var t;
		if (e && e._locale && e._locale._abbr && (e = e._locale._abbr), !e) return ui;
		if (!n(e)) {
			if (t = x(e)) return t;
			e = [e]
		}
		return D(e)
	}
	function C() {
		return li(di)
	}
	function j(e, t) {
		var n = e.toLowerCase();
		hi[n] = hi[n + "s"] = hi[t] = e
	}
	function H(e) {
		return "string" == typeof e ? hi[e] || hi[e.toLowerCase()] : void 0
	}
	function B(e) {
		var t, n, r = {};
		for (n in e) a(e, n) && (t = H(n), t && (r[t] = e[n]));
		return r
	}
	function $(t, n) {
		return function(r) {
			return null != r ? (O(this, t, r), e.updateOffset(this, n), this) : P(this, t)
		}
	}
	function P(e, t) {
		return e.isValid() ? e._d["get" + (e._isUTC ? "UTC" : "") + t]() : NaN
	}
	function O(e, t, n) {
		e.isValid() && e._d["set" + (e._isUTC ? "UTC" : "") + t](n)
	}
	function I(e, t) {
		var n;
		if ("object" == typeof e) for (n in e) this.set(n, e[n]);
		else if (e = H(e), U(this[e])) return this[e](t);
		return this
	}
	function N(e, t, n) {
		var r = "" + Math.abs(e),
			i = t - r.length,
			a = e >= 0;
		return (a ? n ? "+" : "" : "-") + Math.pow(10, Math.max(0, i)).toString().substr(1) + r
	}
	function W(e, t, n, r) {
		var i = r;
		"string" == typeof r && (i = function() {
			return this[r]()
		}), e && (_i[e] = i), t && (_i[t[0]] = function() {
			return N(i.apply(this, arguments), t[1], t[2])
		}), n && (_i[n] = function() {
			return this.localeData().ordinal(i.apply(this, arguments), e)
		})
	}
	function R(e) {
		return e.match(/\[[\s\S]/) ? e.replace(/^\[|\]$/g, "") : e.replace(/\\/g, "")
	}
	function z(e) {
		var t, n, r = e.match(fi);
		for (t = 0, n = r.length; t < n; t++) _i[r[t]] ? r[t] = _i[r[t]] : r[t] = R(r[t]);
		return function(t) {
			var i, a = "";
			for (i = 0; i < n; i++) a += r[i] instanceof Function ? r[i].call(t, e) : r[i];
			return a
		}
	}
	function q(e, t) {
		return e.isValid() ? (t = J(t, e.localeData()), mi[t] = mi[t] || z(t), mi[t](e)) : e.localeData().invalidDate()
	}
	function J(e, t) {
		function n(e) {
			return t.longDateFormat(e) || e
		}
		var r = 5;
		for (pi.lastIndex = 0; r >= 0 && pi.test(e);) e = e.replace(pi, n), pi.lastIndex = 0, r -= 1;
		return e
	}
	function V(e, t, n) {
		Ci[e] = U(t) ? t : function(e, r) {
			return e && n ? n : t
		}
	}
	function G(e, t) {
		return a(Ci, e) ? Ci[e](t._strict, t._locale) : new RegExp(K(e))
	}
	function K(e) {
		return X(e.replace("\\", "").replace(/\\(\[)|\\(\])|\[([^\]\[]*)\]|\\(.)/g, function(e, t, n, r, i) {
			return t || n || r || i
		}))
	}
	function X(e) {
		return e.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&")
	}
	function Q(e, t) {
		var n, r = t;
		for ("string" == typeof e && (e = [e]), "number" == typeof t && (r = function(e, n) {
			n[t] = g(e)
		}), n = 0; n < e.length; n++) ji[e[n]] = r
	}
	function Z(e, t) {
		Q(e, function(e, n, r, i) {
			r._w = r._w || {}, t(e, r._w, r, i)
		})
	}
	function ee(e, t, n) {
		null != t && a(ji, e) && ji[e](t, n._a, n, e)
	}
	function te(e, t) {
		return new Date(Date.UTC(e, t + 1, 0)).getUTCDate()
	}
	function ne(e, t) {
		return n(this._months) ? this._months[e.month()] : this._months[zi.test(t) ? "format" : "standalone"][e.month()]
	}
	function re(e, t) {
		return n(this._monthsShort) ? this._monthsShort[e.month()] : this._monthsShort[zi.test(t) ? "format" : "standalone"][e.month()]
	}
	function ie(e, t, n) {
		var r, i, a, o = e.toLocaleLowerCase();
		if (!this._monthsParse) for (this._monthsParse = [], this._longMonthsParse = [], this._shortMonthsParse = [], r = 0; r < 12; ++r) a = s([2e3, r]), this._shortMonthsParse[r] = this.monthsShort(a, "").toLocaleLowerCase(), this._longMonthsParse[r] = this.months(a, "").toLocaleLowerCase();
		return n ? "MMM" === t ? (i = ci.call(this._shortMonthsParse, o), i !== -1 ? i : null) : (i = ci.call(this._longMonthsParse, o), i !== -1 ? i : null) : "MMM" === t ? (i = ci.call(this._shortMonthsParse, o), i !== -1 ? i : (i = ci.call(this._longMonthsParse, o), i !== -1 ? i : null)) : (i = ci.call(this._longMonthsParse, o), i !== -1 ? i : (i = ci.call(this._shortMonthsParse, o), i !== -1 ? i : null))
	}
	function ae(e, t, n) {
		var r, i, a;
		if (this._monthsParseExact) return ie.call(this, e, t, n);
		for (this._monthsParse || (this._monthsParse = [], this._longMonthsParse = [], this._shortMonthsParse = []), r = 0; r < 12; r++) {
			if (i = s([2e3, r]), n && !this._longMonthsParse[r] && (this._longMonthsParse[r] = new RegExp("^" + this.months(i, "").replace(".", "") + "$", "i"), this._shortMonthsParse[r] = new RegExp("^" + this.monthsShort(i, "").replace(".", "") + "$", "i")), n || this._monthsParse[r] || (a = "^" + this.months(i, "") + "|^" + this.monthsShort(i, ""), this._monthsParse[r] = new RegExp(a.replace(".", ""), "i")), n && "MMMM" === t && this._longMonthsParse[r].test(e)) return r;
			if (n && "MMM" === t && this._shortMonthsParse[r].test(e)) return r;
			if (!n && this._monthsParse[r].test(e)) return r
		}
	}
	function oe(e, t) {
		var n;
		if (!e.isValid()) return e;
		if ("string" == typeof t) if (/^\d+$/.test(t)) t = g(t);
		else if (t = e.localeData().monthsParse(t), "number" != typeof t) return e;
		return n = Math.min(e.date(), te(e.year(), t)), e._d["set" + (e._isUTC ? "UTC" : "") + "Month"](t, n), e
	}
	function se(t) {
		return null != t ? (oe(this, t), e.updateOffset(this, !0), this) : P(this, "Month")
	}
	function le() {
		return te(this.year(), this.month())
	}
	function ue(e) {
		return this._monthsParseExact ? (a(this, "_monthsRegex") || de.call(this), e ? this._monthsShortStrictRegex : this._monthsShortRegex) : this._monthsShortStrictRegex && e ? this._monthsShortStrictRegex : this._monthsShortRegex
	}
	function ce(e) {
		return this._monthsParseExact ? (a(this, "_monthsRegex") || de.call(this), e ? this._monthsStrictRegex : this._monthsRegex) : this._monthsStrictRegex && e ? this._monthsStrictRegex : this._monthsRegex
	}
	function de() {
		function e(e, t) {
			return t.length - e.length
		}
		var t, n, r = [],
			i = [],
			a = [];
		for (t = 0; t < 12; t++) n = s([2e3, t]), r.push(this.monthsShort(n, "")), i.push(this.months(n, "")), a.push(this.months(n, "")), a.push(this.monthsShort(n, ""));
		for (r.sort(e), i.sort(e), a.sort(e), t = 0; t < 12; t++) r[t] = X(r[t]), i[t] = X(i[t]), a[t] = X(a[t]);
		this._monthsRegex = new RegExp("^(" + a.join("|") + ")", "i"), this._monthsShortRegex = this._monthsRegex, this._monthsStrictRegex = new RegExp("^(" + i.join("|") + ")", "i"), this._monthsShortStrictRegex = new RegExp("^(" + r.join("|") + ")", "i")
	}
	function he(e) {
		var t, n = e._a;
		return n && u(e).overflow === -2 && (t = n[Bi] < 0 || n[Bi] > 11 ? Bi : n[$i] < 1 || n[$i] > te(n[Hi], n[Bi]) ? $i : n[Pi] < 0 || n[Pi] > 24 || 24 === n[Pi] && (0 !== n[Oi] || 0 !== n[Ii] || 0 !== n[Ni]) ? Pi : n[Oi] < 0 || n[Oi] > 59 ? Oi : n[Ii] < 0 || n[Ii] > 59 ? Ii : n[Ni] < 0 || n[Ni] > 999 ? Ni : -1, u(e)._overflowDayOfYear && (t < Hi || t > $i) && (t = $i), u(e)._overflowWeeks && t === -1 && (t = Wi), u(e)._overflowWeekday && t === -1 && (t = Ri), u(e).overflow = t), e
	}
	function fe(e) {
		var t, n, r, i, a, o, s = e._i,
			l = Ki.exec(s) || Xi.exec(s);
		if (l) {
			for (u(e).iso = !0, t = 0, n = Zi.length; t < n; t++) if (Zi[t][1].exec(l[1])) {
				i = Zi[t][0], r = Zi[t][2] !== !1;
				break
			}
			if (null == i) return void(e._isValid = !1);
			if (l[3]) {
				for (t = 0, n = ea.length; t < n; t++) if (ea[t][1].exec(l[3])) {
					a = (l[2] || " ") + ea[t][0];
					break
				}
				if (null == a) return void(e._isValid = !1)
			}
			if (!r && null != a) return void(e._isValid = !1);
			if (l[4]) {
				if (!Qi.exec(l[4])) return void(e._isValid = !1);
				o = "Z"
			}
			e._f = i + (a || "") + (o || ""), De(e)
		} else e._isValid = !1
	}
	function pe(t) {
		var n = ta.exec(t._i);
		return null !== n ? void(t._d = new Date((+n[1]))) : (fe(t), void(t._isValid === !1 && (delete t._isValid, e.createFromInputFallback(t))))
	}
	function me(e, t, n, r, i, a, o) {
		var s = new Date(e, t, n, r, i, a, o);
		return e < 100 && e >= 0 && isFinite(s.getFullYear()) && s.setFullYear(e), s
	}
	function _e(e) {
		var t = new Date(Date.UTC.apply(null, arguments));
		return e < 100 && e >= 0 && isFinite(t.getUTCFullYear()) && t.setUTCFullYear(e), t
	}
	function ge(e) {
		return ye(e) ? 366 : 365
	}
	function ye(e) {
		return e % 4 === 0 && e % 100 !== 0 || e % 400 === 0
	}
	function ve() {
		return ye(this.year())
	}
	function Ee(e, t, n) {
		var r = 7 + t - n,
			i = (7 + _e(e, 0, r).getUTCDay() - t) % 7;
		return -i + r - 1
	}
	function be(e, t, n, r, i) {
		var a, o, s = (7 + n - r) % 7,
			l = Ee(e, r, i),
			u = 1 + 7 * (t - 1) + s + l;
		return u <= 0 ? (a = e - 1, o = ge(a) + u) : u > ge(e) ? (a = e + 1, o = u - ge(e)) : (a = e, o = u), {
			year: a,
			dayOfYear: o
		}
	}
	function Ue(e, t, n) {
		var r, i, a = Ee(e.year(), t, n),
			o = Math.floor((e.dayOfYear() - a - 1) / 7) + 1;
		return o < 1 ? (i = e.year() - 1, r = o + we(i, t, n)) : o > we(e.year(), t, n) ? (r = o - we(e.year(), t, n), i = e.year() + 1) : (i = e.year(), r = o), {
			week: r,
			year: i
		}
	}
	function we(e, t, n) {
		var r = Ee(e, t, n),
			i = Ee(e + 1, t, n);
		return (ge(e) - r + i) / 7
	}
	function ke(e, t, n) {
		return null != e ? e : null != t ? t : n
	}
	function Me(t) {
		var n = new Date(e.now());
		return t._useUTC ? [n.getUTCFullYear(), n.getUTCMonth(), n.getUTCDate()] : [n.getFullYear(), n.getMonth(), n.getDate()]
	}
	function Le(e) {
		var t, n, r, i, a = [];
		if (!e._d) {
			for (r = Me(e), e._w && null == e._a[$i] && null == e._a[Bi] && Fe(e), e._dayOfYear && (i = ke(e._a[Hi], r[Hi]), e._dayOfYear > ge(i) && (u(e)._overflowDayOfYear = !0), n = _e(i, 0, e._dayOfYear), e._a[Bi] = n.getUTCMonth(), e._a[$i] = n.getUTCDate()), t = 0; t < 3 && null == e._a[t]; ++t) e._a[t] = a[t] = r[t];
			for (; t < 7; t++) e._a[t] = a[t] = null == e._a[t] ? 2 === t ? 1 : 0 : e._a[t];
			24 === e._a[Pi] && 0 === e._a[Oi] && 0 === e._a[Ii] && 0 === e._a[Ni] && (e._nextDay = !0, e._a[Pi] = 0), e._d = (e._useUTC ? _e : me).apply(null, a), null != e._tzm && e._d.setUTCMinutes(e._d.getUTCMinutes() - e._tzm), e._nextDay && (e._a[Pi] = 24)
		}
	}
	function Fe(e) {
		var t, n, r, i, a, o, s, l;
		t = e._w, null != t.GG || null != t.W || null != t.E ? (a = 1, o = 4, n = ke(t.GG, e._a[Hi], Ue(He(), 1, 4).year), r = ke(t.W, 1), i = ke(t.E, 1), (i < 1 || i > 7) && (l = !0)) : (a = e._locale._week.dow, o = e._locale._week.doy, n = ke(t.gg, e._a[Hi], Ue(He(), a, o).year), r = ke(t.w, 1), null != t.d ? (i = t.d, (i < 0 || i > 6) && (l = !0)) : null != t.e ? (i = t.e + a, (t.e < 0 || t.e > 6) && (l = !0)) : i = a), r < 1 || r > we(n, a, o) ? u(e)._overflowWeeks = !0 : null != l ? u(e)._overflowWeekday = !0 : (s = be(n, r, i, a, o), e._a[Hi] = s.year, e._dayOfYear = s.dayOfYear)
	}
	function De(t) {
		if (t._f === e.ISO_8601) return void fe(t);
		t._a = [], u(t).empty = !0;
		var n, r, i, a, o, s = "" + t._i,
			l = s.length,
			c = 0;
		for (i = J(t._f, t._locale).match(fi) || [], n = 0; n < i.length; n++) a = i[n], r = (s.match(G(a, t)) || [])[0], r && (o = s.substr(0, s.indexOf(r)), o.length > 0 && u(t).unusedInput.push(o), s = s.slice(s.indexOf(r) + r.length), c += r.length), _i[a] ? (r ? u(t).empty = !1 : u(t).unusedTokens.push(a), ee(a, r, t)) : t._strict && !r && u(t).unusedTokens.push(a);
		u(t).charsLeftOver = l - c, s.length > 0 && u(t).unusedInput.push(s), u(t).bigHour === !0 && t._a[Pi] <= 12 && t._a[Pi] > 0 && (u(t).bigHour = void 0), u(t).parsedDateParts = t._a.slice(0), u(t).meridiem = t._meridiem, t._a[Pi] = xe(t._locale, t._a[Pi], t._meridiem), Le(t), he(t)
	}
	function xe(e, t, n) {
		var r;
		return null == n ? t : null != e.meridiemHour ? e.meridiemHour(t, n) : null != e.isPM ? (r = e.isPM(n), r && t < 12 && (t += 12), r || 12 !== t || (t = 0), t) : t
	}
	function Te(e) {
		var t, n, r, i, a;
		if (0 === e._f.length) return u(e).invalidFormat = !0, void(e._d = new Date(NaN));
		for (i = 0; i < e._f.length; i++) a = 0, t = f({}, e), null != e._useUTC && (t._useUTC = e._useUTC), t._f = e._f[i], De(t), c(t) && (a += u(t).charsLeftOver, a += 10 * u(t).unusedTokens.length, u(t).score = a, (null == r || a < r) && (r = a, n = t));
		o(e, n || t)
	}
	function Ye(e) {
		if (!e._d) {
			var t = B(e._i);
			e._a = i([t.year, t.month, t.day || t.date, t.hour, t.minute, t.second, t.millisecond], function(e) {
				return e && parseInt(e, 10)
			}), Le(e)
		}
	}
	function Se(e) {
		var t = new p(he(Ae(e)));
		return t._nextDay && (t.add(1, "d"), t._nextDay = void 0), t
	}
	function Ae(e) {
		var t = e._i,
			i = e._f;
		return e._locale = e._locale || A(e._l), null === t || void 0 === i && "" === t ? d({
			nullInput: !0
		}) : ("string" == typeof t && (e._i = t = e._locale.preparse(t)), m(t) ? new p(he(t)) : (n(i) ? Te(e) : i ? De(e) : r(t) ? e._d = t : Ce(e), c(e) || (e._d = null), e))
	}
	function Ce(t) {
		var a = t._i;
		void 0 === a ? t._d = new Date(e.now()) : r(a) ? t._d = new Date(a.valueOf()) : "string" == typeof a ? pe(t) : n(a) ? (t._a = i(a.slice(0), function(e) {
			return parseInt(e, 10)
		}), Le(t)) : "object" == typeof a ? Ye(t) : "number" == typeof a ? t._d = new Date(a) : e.createFromInputFallback(t)
	}
	function je(e, t, n, r, i) {
		var a = {};
		return "boolean" == typeof n && (r = n, n = void 0), a._isAMomentObject = !0, a._useUTC = a._isUTC = i, a._l = n, a._i = e, a._f = t, a._strict = r, Se(a)
	}
	function He(e, t, n, r) {
		return je(e, t, n, r, !1)
	}
	function Be(e, t) {
		var r, i;
		if (1 === t.length && n(t[0]) && (t = t[0]), !t.length) return He();
		for (r = t[0], i = 1; i < t.length; ++i) t[i].isValid() && !t[i][e](r) || (r = t[i]);
		return r
	}
	function $e() {
		var e = [].slice.call(arguments, 0);
		return Be("isBefore", e)
	}
	function Pe() {
		var e = [].slice.call(arguments, 0);
		return Be("isAfter", e)
	}
	function Oe(e) {
		var t = B(e),
			n = t.year || 0,
			r = t.quarter || 0,
			i = t.month || 0,
			a = t.week || 0,
			o = t.day || 0,
			s = t.hour || 0,
			l = t.minute || 0,
			u = t.second || 0,
			c = t.millisecond || 0;
		this._milliseconds = +c + 1e3 * u + 6e4 * l + 1e3 * s * 60 * 60, this._days = +o + 7 * a, this._months = +i + 3 * r + 12 * n, this._data = {}, this._locale = A(), this._bubble()
	}
	function Ie(e) {
		return e instanceof Oe
	}
	function Ne(e, t) {
		W(e, 0, 0, function() {
			var e = this.utcOffset(),
				n = "+";
			return e < 0 && (e = -e, n = "-"), n + N(~~ (e / 60), 2) + t + N(~~e % 60, 2);
		})
	}
	function We(e, t) {
		var n = (t || "").match(e) || [],
			r = n[n.length - 1] || [],
			i = (r + "").match(oa) || ["-", 0, 0],
			a = +(60 * i[1]) + g(i[2]);
		return "+" === i[0] ? a : -a
	}
	function Re(t, n) {
		var i, a;
		return n._isUTC ? (i = n.clone(), a = (m(t) || r(t) ? t.valueOf() : He(t).valueOf()) - i.valueOf(), i._d.setTime(i._d.valueOf() + a), e.updateOffset(i, !1), i) : He(t).local()
	}
	function ze(e) {
		return 15 * -Math.round(e._d.getTimezoneOffset() / 15)
	}
	function qe(t, n) {
		var r, i = this._offset || 0;
		return this.isValid() ? null != t ? ("string" == typeof t ? t = We(Yi, t) : Math.abs(t) < 16 && (t = 60 * t), !this._isUTC && n && (r = ze(this)), this._offset = t, this._isUTC = !0, null != r && this.add(r, "m"), i !== t && (!n || this._changeInProgress ? ut(this, rt(t - i, "m"), 1, !1) : this._changeInProgress || (this._changeInProgress = !0, e.updateOffset(this, !0), this._changeInProgress = null)), this) : this._isUTC ? i : ze(this) : null != t ? this : NaN
	}
	function Je(e, t) {
		return null != e ? ("string" != typeof e && (e = -e), this.utcOffset(e, t), this) : -this.utcOffset()
	}
	function Ve(e) {
		return this.utcOffset(0, e)
	}
	function Ge(e) {
		return this._isUTC && (this.utcOffset(0, e), this._isUTC = !1, e && this.subtract(ze(this), "m")), this
	}
	function Ke() {
		return this._tzm ? this.utcOffset(this._tzm) : "string" == typeof this._i && this.utcOffset(We(Ti, this._i)), this
	}
	function Xe(e) {
		return !!this.isValid() && (e = e ? He(e).utcOffset() : 0, (this.utcOffset() - e) % 60 === 0)
	}
	function Qe() {
		return this.utcOffset() > this.clone().month(0).utcOffset() || this.utcOffset() > this.clone().month(5).utcOffset()
	}
	function Ze() {
		if (!h(this._isDSTShifted)) return this._isDSTShifted;
		var e = {};
		if (f(e, this), e = Ae(e), e._a) {
			var t = e._isUTC ? s(e._a) : He(e._a);
			this._isDSTShifted = this.isValid() && y(e._a, t.toArray()) > 0
		} else this._isDSTShifted = !1;
		return this._isDSTShifted
	}
	function et() {
		return !!this.isValid() && !this._isUTC
	}
	function tt() {
		return !!this.isValid() && this._isUTC
	}
	function nt() {
		return !!this.isValid() && (this._isUTC && 0 === this._offset)
	}
	function rt(e, t) {
		var n, r, i, o = e,
			s = null;
		return Ie(e) ? o = {
			ms: e._milliseconds,
			d: e._days,
			M: e._months
		} : "number" == typeof e ? (o = {}, t ? o[t] = e : o.milliseconds = e) : (s = sa.exec(e)) ? (n = "-" === s[1] ? -1 : 1, o = {
			y: 0,
			d: g(s[$i]) * n,
			h: g(s[Pi]) * n,
			m: g(s[Oi]) * n,
			s: g(s[Ii]) * n,
			ms: g(s[Ni]) * n
		}) : (s = la.exec(e)) ? (n = "-" === s[1] ? -1 : 1, o = {
			y: it(s[2], n),
			M: it(s[3], n),
			w: it(s[4], n),
			d: it(s[5], n),
			h: it(s[6], n),
			m: it(s[7], n),
			s: it(s[8], n)
		}) : null == o ? o = {} : "object" == typeof o && ("from" in o || "to" in o) && (i = ot(He(o.from), He(o.to)), o = {}, o.ms = i.milliseconds, o.M = i.months), r = new Oe(o), Ie(e) && a(e, "_locale") && (r._locale = e._locale), r
	}
	function it(e, t) {
		var n = e && parseFloat(e.replace(",", "."));
		return (isNaN(n) ? 0 : n) * t
	}
	function at(e, t) {
		var n = {
			milliseconds: 0,
			months: 0
		};
		return n.months = t.month() - e.month() + 12 * (t.year() - e.year()), e.clone().add(n.months, "M").isAfter(t) && --n.months, n.milliseconds = +t - +e.clone().add(n.months, "M"), n
	}
	function ot(e, t) {
		var n;
		return e.isValid() && t.isValid() ? (t = Re(t, e), e.isBefore(t) ? n = at(e, t) : (n = at(t, e), n.milliseconds = -n.milliseconds, n.months = -n.months), n) : {
			milliseconds: 0,
			months: 0
		}
	}
	function st(e) {
		return e < 0 ? Math.round(-1 * e) * -1 : Math.round(e)
	}
	function lt(e, t) {
		return function(n, r) {
			var i, a;
			return null === r || isNaN(+r) || (b(t, "moment()." + t + "(period, number) is deprecated. Please use moment()." + t + "(number, period)."), a = n, n = r, r = a), n = "string" == typeof n ? +n : n, i = rt(n, r), ut(this, i, e), this
		}
	}
	function ut(t, n, r, i) {
		var a = n._milliseconds,
			o = st(n._days),
			s = st(n._months);
		t.isValid() && (i = null == i || i, a && t._d.setTime(t._d.valueOf() + a * r), o && O(t, "Date", P(t, "Date") + o * r), s && oe(t, P(t, "Month") + s * r), i && e.updateOffset(t, o || s))
	}
	function ct(e, t) {
		var n = e || He(),
			r = Re(n, this).startOf("day"),
			i = this.diff(r, "days", !0),
			a = i < -6 ? "sameElse" : i < -1 ? "lastWeek" : i < 0 ? "lastDay" : i < 1 ? "sameDay" : i < 2 ? "nextDay" : i < 7 ? "nextWeek" : "sameElse",
			o = t && (U(t[a]) ? t[a]() : t[a]);
		return this.format(o || this.localeData().calendar(a, this, He(n)))
	}
	function dt() {
		return new p(this)
	}
	function ht(e, t) {
		var n = m(e) ? e : He(e);
		return !(!this.isValid() || !n.isValid()) && (t = H(h(t) ? "millisecond" : t), "millisecond" === t ? this.valueOf() > n.valueOf() : n.valueOf() < this.clone().startOf(t).valueOf())
	}
	function ft(e, t) {
		var n = m(e) ? e : He(e);
		return !(!this.isValid() || !n.isValid()) && (t = H(h(t) ? "millisecond" : t), "millisecond" === t ? this.valueOf() < n.valueOf() : this.clone().endOf(t).valueOf() < n.valueOf())
	}
	function pt(e, t, n, r) {
		return r = r || "()", ("(" === r[0] ? this.isAfter(e, n) : !this.isBefore(e, n)) && (")" === r[1] ? this.isBefore(t, n) : !this.isAfter(t, n))
	}
	function mt(e, t) {
		var n, r = m(e) ? e : He(e);
		return !(!this.isValid() || !r.isValid()) && (t = H(t || "millisecond"), "millisecond" === t ? this.valueOf() === r.valueOf() : (n = r.valueOf(), this.clone().startOf(t).valueOf() <= n && n <= this.clone().endOf(t).valueOf()))
	}
	function _t(e, t) {
		return this.isSame(e, t) || this.isAfter(e, t)
	}
	function gt(e, t) {
		return this.isSame(e, t) || this.isBefore(e, t)
	}
	function yt(e, t, n) {
		var r, i, a, o;
		return this.isValid() ? (r = Re(e, this), r.isValid() ? (i = 6e4 * (r.utcOffset() - this.utcOffset()), t = H(t), "year" === t || "month" === t || "quarter" === t ? (o = vt(this, r), "quarter" === t ? o /= 3 : "year" === t && (o /= 12)) : (a = this - r, o = "second" === t ? a / 1e3 : "minute" === t ? a / 6e4 : "hour" === t ? a / 36e5 : "day" === t ? (a - i) / 864e5 : "week" === t ? (a - i) / 6048e5 : a), n ? o : _(o)) : NaN) : NaN
	}
	function vt(e, t) {
		var n, r, i = 12 * (t.year() - e.year()) + (t.month() - e.month()),
			a = e.clone().add(i, "months");
		return t - a < 0 ? (n = e.clone().add(i - 1, "months"), r = (t - a) / (a - n)) : (n = e.clone().add(i + 1, "months"), r = (t - a) / (n - a)), -(i + r) || 0
	}
	function Et() {
		return this.clone().locale("en").format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ")
	}
	function bt() {
		var e = this.clone().utc();
		return 0 < e.year() && e.year() <= 9999 ? U(Date.prototype.toISOString) ? this.toDate().toISOString() : q(e, "YYYY-MM-DD[T]HH:mm:ss.SSS[Z]") : q(e, "YYYYYY-MM-DD[T]HH:mm:ss.SSS[Z]")
	}
	function Ut(t) {
		t || (t = this.isUtc() ? e.defaultFormatUtc : e.defaultFormat);
		var n = q(this, t);
		return this.localeData().postformat(n)
	}
	function wt(e, t) {
		return this.isValid() && (m(e) && e.isValid() || He(e).isValid()) ? rt({
			to: this,
			from: e
		}).locale(this.locale()).humanize(!t) : this.localeData().invalidDate()
	}
	function kt(e) {
		return this.from(He(), e)
	}
	function Mt(e, t) {
		return this.isValid() && (m(e) && e.isValid() || He(e).isValid()) ? rt({
			from: this,
			to: e
		}).locale(this.locale()).humanize(!t) : this.localeData().invalidDate()
	}
	function Lt(e) {
		return this.to(He(), e)
	}
	function Ft(e) {
		var t;
		return void 0 === e ? this._locale._abbr : (t = A(e), null != t && (this._locale = t), this)
	}
	function Dt() {
		return this._locale
	}
	function xt(e) {
		switch (e = H(e)) {
		case "year":
			this.month(0);
		case "quarter":
		case "month":
			this.date(1);
		case "week":
		case "isoWeek":
		case "day":
		case "date":
			this.hours(0);
		case "hour":
			this.minutes(0);
		case "minute":
			this.seconds(0);
		case "second":
			this.milliseconds(0)
		}
		return "week" === e && this.weekday(0), "isoWeek" === e && this.isoWeekday(1), "quarter" === e && this.month(3 * Math.floor(this.month() / 3)), this
	}
	function Tt(e) {
		return e = H(e), void 0 === e || "millisecond" === e ? this : ("date" === e && (e = "day"), this.startOf(e).add(1, "isoWeek" === e ? "week" : e).subtract(1, "ms"))
	}
	function Yt() {
		return this._d.valueOf() - 6e4 * (this._offset || 0)
	}
	function St() {
		return Math.floor(this.valueOf() / 1e3)
	}
	function At() {
		return this._offset ? new Date(this.valueOf()) : this._d
	}
	function Ct() {
		var e = this;
		return [e.year(), e.month(), e.date(), e.hour(), e.minute(), e.second(), e.millisecond()]
	}
	function jt() {
		var e = this;
		return {
			years: e.year(),
			months: e.month(),
			date: e.date(),
			hours: e.hours(),
			minutes: e.minutes(),
			seconds: e.seconds(),
			milliseconds: e.milliseconds()
		}
	}
	function Ht() {
		return this.isValid() ? this.toISOString() : null
	}
	function Bt() {
		return c(this)
	}
	function $t() {
		return o({}, u(this))
	}
	function Pt() {
		return u(this).overflow
	}
	function Ot() {
		return {
			input: this._i,
			format: this._f,
			locale: this._locale,
			isUTC: this._isUTC,
			strict: this._strict
		}
	}
	function It(e, t) {
		W(0, [e, e.length], 0, t)
	}
	function Nt(e) {
		return qt.call(this, e, this.week(), this.weekday(), this.localeData()._week.dow, this.localeData()._week.doy)
	}
	function Wt(e) {
		return qt.call(this, e, this.isoWeek(), this.isoWeekday(), 1, 4)
	}
	function Rt() {
		return we(this.year(), 1, 4)
	}
	function zt() {
		var e = this.localeData()._week;
		return we(this.year(), e.dow, e.doy)
	}
	function qt(e, t, n, r, i) {
		var a;
		return null == e ? Ue(this, r, i).year : (a = we(e, r, i), t > a && (t = a), Jt.call(this, e, t, n, r, i))
	}
	function Jt(e, t, n, r, i) {
		var a = be(e, t, n, r, i),
			o = _e(a.year, 0, a.dayOfYear);
		return this.year(o.getUTCFullYear()), this.month(o.getUTCMonth()), this.date(o.getUTCDate()), this
	}
	function Vt(e) {
		return null == e ? Math.ceil((this.month() + 1) / 3) : this.month(3 * (e - 1) + this.month() % 3)
	}
	function Gt(e) {
		return Ue(e, this._week.dow, this._week.doy).week
	}
	function Kt() {
		return this._week.dow
	}
	function Xt() {
		return this._week.doy
	}
	function Qt(e) {
		var t = this.localeData().week(this);
		return null == e ? t : this.add(7 * (e - t), "d")
	}
	function Zt(e) {
		var t = Ue(this, 1, 4).week;
		return null == e ? t : this.add(7 * (e - t), "d")
	}
	function en(e, t) {
		return "string" != typeof e ? e : isNaN(e) ? (e = t.weekdaysParse(e), "number" == typeof e ? e : null) : parseInt(e, 10)
	}
	function tn(e, t) {
		return n(this._weekdays) ? this._weekdays[e.day()] : this._weekdays[this._weekdays.isFormat.test(t) ? "format" : "standalone"][e.day()]
	}
	function nn(e) {
		return this._weekdaysShort[e.day()]
	}
	function rn(e) {
		return this._weekdaysMin[e.day()]
	}
	function an(e, t, n) {
		var r, i, a, o = e.toLocaleLowerCase();
		if (!this._weekdaysParse) for (this._weekdaysParse = [], this._shortWeekdaysParse = [], this._minWeekdaysParse = [], r = 0; r < 7; ++r) a = s([2e3, 1]).day(r), this._minWeekdaysParse[r] = this.weekdaysMin(a, "").toLocaleLowerCase(), this._shortWeekdaysParse[r] = this.weekdaysShort(a, "").toLocaleLowerCase(), this._weekdaysParse[r] = this.weekdays(a, "").toLocaleLowerCase();
		return n ? "dddd" === t ? (i = ci.call(this._weekdaysParse, o), i !== -1 ? i : null) : "ddd" === t ? (i = ci.call(this._shortWeekdaysParse, o), i !== -1 ? i : null) : (i = ci.call(this._minWeekdaysParse, o), i !== -1 ? i : null) : "dddd" === t ? (i = ci.call(this._weekdaysParse, o), i !== -1 ? i : (i = ci.call(this._shortWeekdaysParse, o), i !== -1 ? i : (i = ci.call(this._minWeekdaysParse, o), i !== -1 ? i : null))) : "ddd" === t ? (i = ci.call(this._shortWeekdaysParse, o), i !== -1 ? i : (i = ci.call(this._weekdaysParse, o), i !== -1 ? i : (i = ci.call(this._minWeekdaysParse, o), i !== -1 ? i : null))) : (i = ci.call(this._minWeekdaysParse, o), i !== -1 ? i : (i = ci.call(this._weekdaysParse, o), i !== -1 ? i : (i = ci.call(this._shortWeekdaysParse, o), i !== -1 ? i : null)))
	}
	function on(e, t, n) {
		var r, i, a;
		if (this._weekdaysParseExact) return an.call(this, e, t, n);
		for (this._weekdaysParse || (this._weekdaysParse = [], this._minWeekdaysParse = [], this._shortWeekdaysParse = [], this._fullWeekdaysParse = []), r = 0; r < 7; r++) {
			if (i = s([2e3, 1]).day(r), n && !this._fullWeekdaysParse[r] && (this._fullWeekdaysParse[r] = new RegExp("^" + this.weekdays(i, "").replace(".", ".?") + "$", "i"), this._shortWeekdaysParse[r] = new RegExp("^" + this.weekdaysShort(i, "").replace(".", ".?") + "$", "i"), this._minWeekdaysParse[r] = new RegExp("^" + this.weekdaysMin(i, "").replace(".", ".?") + "$", "i")), this._weekdaysParse[r] || (a = "^" + this.weekdays(i, "") + "|^" + this.weekdaysShort(i, "") + "|^" + this.weekdaysMin(i, ""), this._weekdaysParse[r] = new RegExp(a.replace(".", ""), "i")), n && "dddd" === t && this._fullWeekdaysParse[r].test(e)) return r;
			if (n && "ddd" === t && this._shortWeekdaysParse[r].test(e)) return r;
			if (n && "dd" === t && this._minWeekdaysParse[r].test(e)) return r;
			if (!n && this._weekdaysParse[r].test(e)) return r
		}
	}
	function sn(e) {
		if (!this.isValid()) return null != e ? this : NaN;
		var t = this._isUTC ? this._d.getUTCDay() : this._d.getDay();
		return null != e ? (e = en(e, this.localeData()), this.add(e - t, "d")) : t
	}
	function ln(e) {
		if (!this.isValid()) return null != e ? this : NaN;
		var t = (this.day() + 7 - this.localeData()._week.dow) % 7;
		return null == e ? t : this.add(e - t, "d")
	}
	function un(e) {
		return this.isValid() ? null == e ? this.day() || 7 : this.day(this.day() % 7 ? e : e - 7) : null != e ? this : NaN
	}
	function cn(e) {
		return this._weekdaysParseExact ? (a(this, "_weekdaysRegex") || fn.call(this), e ? this._weekdaysStrictRegex : this._weekdaysRegex) : this._weekdaysStrictRegex && e ? this._weekdaysStrictRegex : this._weekdaysRegex
	}
	function dn(e) {
		return this._weekdaysParseExact ? (a(this, "_weekdaysRegex") || fn.call(this), e ? this._weekdaysShortStrictRegex : this._weekdaysShortRegex) : this._weekdaysShortStrictRegex && e ? this._weekdaysShortStrictRegex : this._weekdaysShortRegex
	}
	function hn(e) {
		return this._weekdaysParseExact ? (a(this, "_weekdaysRegex") || fn.call(this), e ? this._weekdaysMinStrictRegex : this._weekdaysMinRegex) : this._weekdaysMinStrictRegex && e ? this._weekdaysMinStrictRegex : this._weekdaysMinRegex
	}
	function fn() {
		function e(e, t) {
			return t.length - e.length
		}
		var t, n, r, i, a, o = [],
			l = [],
			u = [],
			c = [];
		for (t = 0; t < 7; t++) n = s([2e3, 1]).day(t), r = this.weekdaysMin(n, ""), i = this.weekdaysShort(n, ""), a = this.weekdays(n, ""), o.push(r), l.push(i), u.push(a), c.push(r), c.push(i), c.push(a);
		for (o.sort(e), l.sort(e), u.sort(e), c.sort(e), t = 0; t < 7; t++) l[t] = X(l[t]), u[t] = X(u[t]), c[t] = X(c[t]);
		this._weekdaysRegex = new RegExp("^(" + c.join("|") + ")", "i"), this._weekdaysShortRegex = this._weekdaysRegex, this._weekdaysMinRegex = this._weekdaysRegex, this._weekdaysStrictRegex = new RegExp("^(" + u.join("|") + ")", "i"), this._weekdaysShortStrictRegex = new RegExp("^(" + l.join("|") + ")", "i"), this._weekdaysMinStrictRegex = new RegExp("^(" + o.join("|") + ")", "i")
	}
	function pn(e) {
		var t = Math.round((this.clone().startOf("day") - this.clone().startOf("year")) / 864e5) + 1;
		return null == e ? t : this.add(e - t, "d")
	}
	function mn() {
		return this.hours() % 12 || 12
	}
	function _n() {
		return this.hours() || 24
	}
	function gn(e, t) {
		W(e, 0, 0, function() {
			return this.localeData().meridiem(this.hours(), this.minutes(), t)
		})
	}
	function yn(e, t) {
		return t._meridiemParse
	}
	function vn(e) {
		return "p" === (e + "").toLowerCase().charAt(0)
	}
	function En(e, t, n) {
		return e > 11 ? n ? "pm" : "PM" : n ? "am" : "AM"
	}
	function bn(e, t) {
		t[Ni] = g(1e3 * ("0." + e))
	}
	function Un() {
		return this._isUTC ? "UTC" : ""
	}
	function wn() {
		return this._isUTC ? "Coordinated Universal Time" : ""
	}
	function kn(e) {
		return He(1e3 * e)
	}
	function Mn() {
		return He.apply(null, arguments).parseZone()
	}
	function Ln(e, t, n) {
		var r = this._calendar[e];
		return U(r) ? r.call(t, n) : r
	}
	function Fn(e) {
		var t = this._longDateFormat[e],
			n = this._longDateFormat[e.toUpperCase()];
		return t || !n ? t : (this._longDateFormat[e] = n.replace(/MMMM|MM|DD|dddd/g, function(e) {
			return e.slice(1)
		}), this._longDateFormat[e])
	}
	function Dn() {
		return this._invalidDate
	}
	function xn(e) {
		return this._ordinal.replace("%d", e)
	}
	function Tn(e) {
		return e
	}
	function Yn(e, t, n, r) {
		var i = this._relativeTime[n];
		return U(i) ? i(e, t, n, r) : i.replace(/%d/i, e)
	}
	function Sn(e, t) {
		var n = this._relativeTime[e > 0 ? "future" : "past"];
		return U(n) ? n(t) : n.replace(/%s/i, t)
	}
	function An(e, t, n, r) {
		var i = A(),
			a = s().set(r, t);
		return i[n](a, e)
	}
	function Cn(e, t, n) {
		if ("number" == typeof e && (t = e, e = void 0), e = e || "", null != t) return An(e, t, n, "month");
		var r, i = [];
		for (r = 0; r < 12; r++) i[r] = An(e, r, n, "month");
		return i
	}
	function jn(e, t, n, r) {
		"boolean" == typeof e ? ("number" == typeof t && (n = t, t = void 0), t = t || "") : (t = e, n = t, e = !1, "number" == typeof t && (n = t, t = void 0), t = t || "");
		var i = A(),
			a = e ? i._week.dow : 0;
		if (null != n) return An(t, (n + a) % 7, r, "day");
		var o, s = [];
		for (o = 0; o < 7; o++) s[o] = An(t, (o + a) % 7, r, "day");
		return s
	}
	function Hn(e, t) {
		return Cn(e, t, "months")
	}
	function Bn(e, t) {
		return Cn(e, t, "monthsShort")
	}
	function $n(e, t, n) {
		return jn(e, t, n, "weekdays")
	}
	function Pn(e, t, n) {
		return jn(e, t, n, "weekdaysShort")
	}
	function On(e, t, n) {
		return jn(e, t, n, "weekdaysMin")
	}
	function In() {
		var e = this._data;
		return this._milliseconds = ja(this._milliseconds), this._days = ja(this._days), this._months = ja(this._months), e.milliseconds = ja(e.milliseconds), e.seconds = ja(e.seconds), e.minutes = ja(e.minutes), e.hours = ja(e.hours), e.months = ja(e.months), e.years = ja(e.years), this
	}
	function Nn(e, t, n, r) {
		var i = rt(t, n);
		return e._milliseconds += r * i._milliseconds, e._days += r * i._days, e._months += r * i._months, e._bubble()
	}
	function Wn(e, t) {
		return Nn(this, e, t, 1)
	}
	function Rn(e, t) {
		return Nn(this, e, t, -1)
	}
	function zn(e) {
		return e < 0 ? Math.floor(e) : Math.ceil(e)
	}
	function qn() {
		var e, t, n, r, i, a = this._milliseconds,
			o = this._days,
			s = this._months,
			l = this._data;
		return a >= 0 && o >= 0 && s >= 0 || a <= 0 && o <= 0 && s <= 0 || (a += 864e5 * zn(Vn(s) + o), o = 0, s = 0), l.milliseconds = a % 1e3, e = _(a / 1e3), l.seconds = e % 60, t = _(e / 60), l.minutes = t % 60, n = _(t / 60), l.hours = n % 24, o += _(n / 24), i = _(Jn(o)), s += i, o -= zn(Vn(i)), r = _(s / 12), s %= 12, l.days = o, l.months = s, l.years = r, this
	}
	function Jn(e) {
		return 4800 * e / 146097
	}
	function Vn(e) {
		return 146097 * e / 4800
	}
	function Gn(e) {
		var t, n, r = this._milliseconds;
		if (e = H(e), "month" === e || "year" === e) return t = this._days + r / 864e5, n = this._months + Jn(t), "month" === e ? n : n / 12;
		switch (t = this._days + Math.round(Vn(this._months)), e) {
		case "week":
			return t / 7 + r / 6048e5;
		case "day":
			return t + r / 864e5;
		case "hour":
			return 24 * t + r / 36e5;
		case "minute":
			return 1440 * t + r / 6e4;
		case "second":
			return 86400 * t + r / 1e3;
		case "millisecond":
			return Math.floor(864e5 * t) + r;
		default:
			throw new Error("Unknown unit " + e)
		}
	}
	function Kn() {
		return this._milliseconds + 864e5 * this._days + this._months % 12 * 2592e6 + 31536e6 * g(this._months / 12)
	}
	function Xn(e) {
		return function() {
			return this.as(e)
		}
	}
	function Qn(e) {
		return e = H(e), this[e + "s"]()
	}
	function Zn(e) {
		return function() {
			return this._data[e]
		}
	}
	function er() {
		return _(this.days() / 7)
	}
	function tr(e, t, n, r, i) {
		return i.relativeTime(t || 1, !! n, e, r)
	}
	function nr(e, t, n) {
		var r = rt(e).abs(),
			i = Xa(r.as("s")),
			a = Xa(r.as("m")),
			o = Xa(r.as("h")),
			s = Xa(r.as("d")),
			l = Xa(r.as("M")),
			u = Xa(r.as("y")),
			c = i < Qa.s && ["s", i] || a <= 1 && ["m"] || a < Qa.m && ["mm", a] || o <= 1 && ["h"] || o < Qa.h && ["hh", o] || s <= 1 && ["d"] || s < Qa.d && ["dd", s] || l <= 1 && ["M"] || l < Qa.M && ["MM", l] || u <= 1 && ["y"] || ["yy", u];
		return c[2] = t, c[3] = +e > 0, c[4] = n, tr.apply(null, c)
	}
	function rr(e, t) {
		return void 0 !== Qa[e] && (void 0 === t ? Qa[e] : (Qa[e] = t, !0))
	}
	function ir(e) {
		var t = this.localeData(),
			n = nr(this, !e, t);
		return e && (n = t.pastFuture(+this, n)), t.postformat(n)
	}
	function ar() {
		var e, t, n, r = Za(this._milliseconds) / 1e3,
			i = Za(this._days),
			a = Za(this._months);
		e = _(r / 60), t = _(e / 60), r %= 60, e %= 60, n = _(a / 12), a %= 12;
		var o = n,
			s = a,
			l = i,
			u = t,
			c = e,
			d = r,
			h = this.asSeconds();
		return h ? (h < 0 ? "-" : "") + "P" + (o ? o + "Y" : "") + (s ? s + "M" : "") + (l ? l + "D" : "") + (u || c || d ? "T" : "") + (u ? u + "H" : "") + (c ? c + "M" : "") + (d ? d + "S" : "") : "P0D"
	}
	function or(e, t) {
		var n = e.split("_");
		return t % 10 === 1 && t % 100 !== 11 ? n[0] : t % 10 >= 2 && t % 10 <= 4 && (t % 100 < 10 || t % 100 >= 20) ? n[1] : n[2]
	}
	function sr(e, t, n) {
		var r = {
			mm: t ? "хвіліна_хвіліны_хвілін" : "хвіліну_хвіліны_хвілін",
			hh: t ? "гадзіна_гадзіны_гадзін" : "гадзіну_гадзіны_гадзін",
			dd: "дзень_дні_дзён",
			MM: "месяц_месяцы_месяцаў",
			yy: "год_гады_гадоў"
		};
		return "m" === n ? t ? "хвіліна" : "хвіліну" : "h" === n ? t ? "гадзіна" : "гадзіну" : e + " " + or(r[n], +e)
	}
	function lr(e, t, n) {
		var r = {
			mm: "munutenn",
			MM: "miz",
			dd: "devezh"
		};
		return e + " " + dr(r[n], e)
	}
	function ur(e) {
		switch (cr(e)) {
		case 1:
		case 3:
		case 4:
		case 5:
		case 9:
			return e + " bloaz";
		default:
			return e + " vloaz"
		}
	}
	function cr(e) {
		return e > 9 ? cr(e % 10) : e
	}
	function dr(e, t) {
		return 2 === t ? hr(e) : e
	}
	function hr(e) {
		var t = {
			m: "v",
			b: "v",
			d: "z"
		};
		return void 0 === t[e.charAt(0)] ? e : t[e.charAt(0)] + e.substring(1)
	}
	function fr(e, t, n) {
		var r = e + " ";
		switch (n) {
		case "m":
			return t ? "jedna minuta" : "jedne minute";
		case "mm":
			return r += 1 === e ? "minuta" : 2 === e || 3 === e || 4 === e ? "minute" : "minuta";
		case "h":
			return t ? "jedan sat" : "jednog sata";
		case "hh":
			return r += 1 === e ? "sat" : 2 === e || 3 === e || 4 === e ? "sata" : "sati";
		case "dd":
			return r += 1 === e ? "dan" : "dana";
		case "MM":
			return r += 1 === e ? "mjesec" : 2 === e || 3 === e || 4 === e ? "mjeseca" : "mjeseci";
		case "yy":
			return r += 1 === e ? "godina" : 2 === e || 3 === e || 4 === e ? "godine" : "godina"
		}
	}
	function pr(e) {
		return e > 1 && e < 5 && 1 !== ~~ (e / 10)
	}
	function mr(e, t, n, r) {
		var i = e + " ";
		switch (n) {
		case "s":
			return t || r ? "pár sekund" : "pár sekundami";
		case "m":
			return t ? "minuta" : r ? "minutu" : "minutou";
		case "mm":
			return t || r ? i + (pr(e) ? "minuty" : "minut") : i + "minutami";
		case "h":
			return t ? "hodina" : r ? "hodinu" : "hodinou";
		case "hh":
			return t || r ? i + (pr(e) ? "hodiny" : "hodin") : i + "hodinami";
		case "d":
			return t || r ? "den" : "dnem";
		case "dd":
			return t || r ? i + (pr(e) ? "dny" : "dní") : i + "dny";
		case "M":
			return t || r ? "měsíc" : "měsícem";
		case "MM":
			return t || r ? i + (pr(e) ? "měsíce" : "měsíců") : i + "měsíci";
		case "y":
			return t || r ? "rok" : "rokem";
		case "yy":
			return t || r ? i + (pr(e) ? "roky" : "let") : i + "lety"
		}
	}
	function _r(e, t, n, r) {
		var i = {
			m: ["eine Minute", "einer Minute"],
			h: ["eine Stunde", "einer Stunde"],
			d: ["ein Tag", "einem Tag"],
			dd: [e + " Tage", e + " Tagen"],
			M: ["ein Monat", "einem Monat"],
			MM: [e + " Monate", e + " Monaten"],
			y: ["ein Jahr", "einem Jahr"],
			yy: [e + " Jahre", e + " Jahren"]
		};
		return t ? i[n][0] : i[n][1]
	}
	function gr(e, t, n, r) {
		var i = {
			m: ["eine Minute", "einer Minute"],
			h: ["eine Stunde", "einer Stunde"],
			d: ["ein Tag", "einem Tag"],
			dd: [e + " Tage", e + " Tagen"],
			M: ["ein Monat", "einem Monat"],
			MM: [e + " Monate", e + " Monaten"],
			y: ["ein Jahr", "einem Jahr"],
			yy: [e + " Jahre", e + " Jahren"]
		};
		return t ? i[n][0] : i[n][1]
	}
	function yr(e, t, n, r) {
		var i = {
			s: ["mõne sekundi", "mõni sekund", "paar sekundit"],
			m: ["ühe minuti", "üks minut"],
			mm: [e + " minuti", e + " minutit"],
			h: ["ühe tunni", "tund aega", "üks tund"],
			hh: [e + " tunni", e + " tundi"],
			d: ["ühe päeva", "üks päev"],
			M: ["kuu aja", "kuu aega", "üks kuu"],
			MM: [e + " kuu", e + " kuud"],
			y: ["ühe aasta", "aasta", "üks aasta"],
			yy: [e + " aasta", e + " aastat"]
		};
		return t ? i[n][2] ? i[n][2] : i[n][1] : r ? i[n][0] : i[n][1]
	}
	function vr(e, t, n, r) {
		var i = "";
		switch (n) {
		case "s":
			return r ? "muutaman sekunnin" : "muutama sekunti";
		case "m":
			return r ? "minuutin" : "minuutti";
		case "mm":
			i = r ? "minuutin" : "minuuttia";
			break;
		case "h":
			return r ? "tunnin" : "tunti";
		case "hh":
			i = r ? "tunnin" : "tuntia";
			break;
		case "d":
			return r ? "päivän" : "päivä";
		case "dd":
			i = r ? "päivän" : "päivää";
			break;
		case "M":
			return r ? "kuukauden" : "kuukausi";
		case "MM":
			i = r ? "kuukauden" : "kuukautta";
			break;
		case "y":
			return r ? "vuoden" : "vuosi";
		case "yy":
			i = r ? "vuoden" : "vuotta"
		}
		return i = Er(e, r) + " " + i
	}
	function Er(e, t) {
		return e < 10 ? t ? Mo[e] : ko[e] : e
	}
	function br(e, t, n) {
		var r = e + " ";
		switch (n) {
		case "m":
			return t ? "jedna minuta" : "jedne minute";
		case "mm":
			return r += 1 === e ? "minuta" : 2 === e || 3 === e || 4 === e ? "minute" : "minuta";
		case "h":
			return t ? "jedan sat" : "jednog sata";
		case "hh":
			return r += 1 === e ? "sat" : 2 === e || 3 === e || 4 === e ? "sata" : "sati";
		case "dd":
			return r += 1 === e ? "dan" : "dana";
		case "MM":
			return r += 1 === e ? "mjesec" : 2 === e || 3 === e || 4 === e ? "mjeseca" : "mjeseci";
		case "yy":
			return r += 1 === e ? "godina" : 2 === e || 3 === e || 4 === e ? "godine" : "godina"
		}
	}
	function Ur(e, t, n, r) {
		var i = e;
		switch (n) {
		case "s":
			return r || t ? "néhány másodperc" : "néhány másodperce";
		case "m":
			return "egy" + (r || t ? " perc" : " perce");
		case "mm":
			return i + (r || t ? " perc" : " perce");
		case "h":
			return "egy" + (r || t ? " óra" : " órája");
		case "hh":
			return i + (r || t ? " óra" : " órája");
		case "d":
			return "egy" + (r || t ? " nap" : " napja");
		case "dd":
			return i + (r || t ? " nap" : " napja");
		case "M":
			return "egy" + (r || t ? " hónap" : " hónapja");
		case "MM":
			return i + (r || t ? " hónap" : " hónapja");
		case "y":
			return "egy" + (r || t ? " év" : " éve");
		case "yy":
			return i + (r || t ? " év" : " éve")
		}
		return ""
	}
	function wr(e) {
		return (e ? "" : "[múlt] ") + "[" + jo[this.day()] + "] LT[-kor]"
	}
	function kr(e) {
		return e % 100 === 11 || e % 10 !== 1
	}
	function Mr(e, t, n, r) {
		var i = e + " ";
		switch (n) {
		case "s":
			return t || r ? "nokkrar sekúndur" : "nokkrum sekúndum";
		case "m":
			return t ? "mínúta" : "mínútu";
		case "mm":
			return kr(e) ? i + (t || r ? "mínútur" : "mínútum") : t ? i + "mínúta" : i + "mínútu";
		case "hh":
			return kr(e) ? i + (t || r ? "klukkustundir" : "klukkustundum") : i + "klukkustund";
		case "d":
			return t ? "dagur" : r ? "dag" : "degi";
		case "dd":
			return kr(e) ? t ? i + "dagar" : i + (r ? "daga" : "dögum") : t ? i + "dagur" : i + (r ? "dag" : "degi");
		case "M":
			return t ? "mánuður" : r ? "mánuð" : "mánuði";
		case "MM":
			return kr(e) ? t ? i + "mánuðir" : i + (r ? "mánuði" : "mánuðum") : t ? i + "mánuður" : i + (r ? "mánuð" : "mánuði");
		case "y":
			return t || r ? "ár" : "ári";
		case "yy":
			return kr(e) ? i + (t || r ? "ár" : "árum") : i + (t || r ? "ár" : "ári")
		}
	}
	function Lr(e, t, n, r) {
		var i = {
			m: ["eng Minutt", "enger Minutt"],
			h: ["eng Stonn", "enger Stonn"],
			d: ["een Dag", "engem Dag"],
			M: ["ee Mount", "engem Mount"],
			y: ["ee Joer", "engem Joer"]
		};
		return t ? i[n][0] : i[n][1]
	}
	function Fr(e) {
		var t = e.substr(0, e.indexOf(" "));
		return xr(t) ? "a " + e : "an " + e
	}
	function Dr(e) {
		var t = e.substr(0, e.indexOf(" "));
		return xr(t) ? "viru " + e : "virun " + e
	}
	function xr(e) {
		if (e = parseInt(e, 10), isNaN(e)) return !1;
		if (e < 0) return !0;
		if (e < 10) return 4 <= e && e <= 7;
		if (e < 100) {
			var t = e % 10,
				n = e / 10;
			return xr(0 === t ? n : t)
		}
		if (e < 1e4) {
			for (; e >= 10;) e /= 10;
			return xr(e)
		}
		return e /= 1e3, xr(e)
	}
	function Tr(e, t, n, r) {
		return t ? "kelios sekundės" : r ? "kelių sekundžių" : "kelias sekundes"
	}
	function Yr(e, t, n, r) {
		return t ? Ar(n)[0] : r ? Ar(n)[1] : Ar(n)[2]
	}
	function Sr(e) {
		return e % 10 === 0 || e > 10 && e < 20
	}
	function Ar(e) {
		return $o[e].split("_")
	}
	function Cr(e, t, n, r) {
		var i = e + " ";
		return 1 === e ? i + Yr(e, t, n[0], r) : t ? i + (Sr(e) ? Ar(n)[1] : Ar(n)[0]) : r ? i + Ar(n)[1] : i + (Sr(e) ? Ar(n)[1] : Ar(n)[2])
	}
	function jr(e, t, n) {
		return n ? t % 10 === 1 && 11 !== t ? e[2] : e[3] : t % 10 === 1 && 11 !== t ? e[0] : e[1]
	}
	function Hr(e, t, n) {
		return e + " " + jr(Po[n], e, t)
	}
	function Br(e, t, n) {
		return jr(Po[n], e, t)
	}
	function $r(e, t) {
		return t ? "dažas sekundes" : "dažām sekundēm"
	}
	function Pr(e, t, n, r) {
		var i = "";
		if (t) switch (n) {
		case "s":
			i = "काही सेकंद";
			break;
		case "m":
			i = "एक मिनिट";
			break;
		case "mm":
			i = "%d मिनिटे";
			break;
		case "h":
			i = "एक तास";
			break;
		case "hh":
			i = "%d तास";
			break;
		case "d":
			i = "एक दिवस";
			break;
		case "dd":
			i = "%d दिवस";
			break;
		case "M":
			i = "एक महिना";
			break;
		case "MM":
			i = "%d महिने";
			break;
		case "y":
			i = "एक वर्ष";
			break;
		case "yy":
			i = "%d वर्षे"
		} else switch (n) {
		case "s":
			i = "काही सेकंदां";
			break;
		case "m":
			i = "एका मिनिटा";
			break;
		case "mm":
			i = "%d मिनिटां";
			break;
		case "h":
			i = "एका तासा";
			break;
		case "hh":
			i = "%d तासां";
			break;
		case "d":
			i = "एका दिवसा";
			break;
		case "dd":
			i = "%d दिवसां";
			break;
		case "M":
			i = "एका महिन्या";
			break;
		case "MM":
			i = "%d महिन्यां";
			break;
		case "y":
			i = "एका वर्षा";
			break;
		case "yy":
			i = "%d वर्षां"
		}
		return i.replace(/%d/i, e)
	}
	function Or(e) {
		return e % 10 < 5 && e % 10 > 1 && ~~ (e / 10) % 10 !== 1
	}
	function Ir(e, t, n) {
		var r = e + " ";
		switch (n) {
		case "m":
			return t ? "minuta" : "minutę";
		case "mm":
			return r + (Or(e) ? "minuty" : "minut");
		case "h":
			return t ? "godzina" : "godzinę";
		case "hh":
			return r + (Or(e) ? "godziny" : "godzin");
		case "MM":
			return r + (Or(e) ? "miesiące" : "miesięcy");
		case "yy":
			return r + (Or(e) ? "lata" : "lat")
		}
	}
	function Nr(e, t, n) {
		var r = {
			mm: "minute",
			hh: "ore",
			dd: "zile",
			MM: "luni",
			yy: "ani"
		},
			i = " ";
		return (e % 100 >= 20 || e >= 100 && e % 100 === 0) && (i = " de "), e + i + r[n]
	}
	function Wr(e, t) {
		var n = e.split("_");
		return t % 10 === 1 && t % 100 !== 11 ? n[0] : t % 10 >= 2 && t % 10 <= 4 && (t % 100 < 10 || t % 100 >= 20) ? n[1] : n[2]
	}
	function Rr(e, t, n) {
		var r = {
			mm: t ? "минута_минуты_минут" : "минуту_минуты_минут",
			hh: "час_часа_часов",
			dd: "день_дня_дней",
			MM: "месяц_месяца_месяцев",
			yy: "год_года_лет"
		};
		return "m" === n ? t ? "минута" : "минуту" : e + " " + Wr(r[n], +e)
	}
	function zr(e) {
		return e > 1 && e < 5
	}
	function qr(e, t, n, r) {
		var i = e + " ";
		switch (n) {
		case "s":
			return t || r ? "pár sekúnd" : "pár sekundami";
		case "m":
			return t ? "minúta" : r ? "minútu" : "minútou";
		case "mm":
			return t || r ? i + (zr(e) ? "minúty" : "minút") : i + "minútami";
		case "h":
			return t ? "hodina" : r ? "hodinu" : "hodinou";
		case "hh":
			return t || r ? i + (zr(e) ? "hodiny" : "hodín") : i + "hodinami";
		case "d":
			return t || r ? "deň" : "dňom";
		case "dd":
			return t || r ? i + (zr(e) ? "dni" : "dní") : i + "dňami";
		case "M":
			return t || r ? "mesiac" : "mesiacom";
		case "MM":
			return t || r ? i + (zr(e) ? "mesiace" : "mesiacov") : i + "mesiacmi";
		case "y":
			return t || r ? "rok" : "rokom";
		case "yy":
			return t || r ? i + (zr(e) ? "roky" : "rokov") : i + "rokmi"
		}
	}
	function Jr(e, t, n, r) {
		var i = e + " ";
		switch (n) {
		case "s":
			return t || r ? "nekaj sekund" : "nekaj sekundami";
		case "m":
			return t ? "ena minuta" : "eno minuto";
		case "mm":
			return i += 1 === e ? t ? "minuta" : "minuto" : 2 === e ? t || r ? "minuti" : "minutama" : e < 5 ? t || r ? "minute" : "minutami" : t || r ? "minut" : "minutami";
		case "h":
			return t ? "ena ura" : "eno uro";
		case "hh":
			return i += 1 === e ? t ? "ura" : "uro" : 2 === e ? t || r ? "uri" : "urama" : e < 5 ? t || r ? "ure" : "urami" : t || r ? "ur" : "urami";
		case "d":
			return t || r ? "en dan" : "enim dnem";
		case "dd":
			return i += 1 === e ? t || r ? "dan" : "dnem" : 2 === e ? t || r ? "dni" : "dnevoma" : t || r ? "dni" : "dnevi";
		case "M":
			return t || r ? "en mesec" : "enim mesecem";
		case "MM":
			return i += 1 === e ? t || r ? "mesec" : "mesecem" : 2 === e ? t || r ? "meseca" : "mesecema" : e < 5 ? t || r ? "mesece" : "meseci" : t || r ? "mesecev" : "meseci";
		case "y":
			return t || r ? "eno leto" : "enim letom";
		case "yy":
			return i += 1 === e ? t || r ? "leto" : "letom" : 2 === e ? t || r ? "leti" : "letoma" : e < 5 ? t || r ? "leta" : "leti" : t || r ? "let" : "leti"
		}
	}
	function Vr(e) {
		var t = e;
		return t = e.indexOf("jaj") !== -1 ? t.slice(0, -3) + "leS" : e.indexOf("jar") !== -1 ? t.slice(0, -3) + "waQ" : e.indexOf("DIS") !== -1 ? t.slice(0, -3) + "nem" : t + " pIq"
	}
	function Gr(e) {
		var t = e;
		return t = e.indexOf("jaj") !== -1 ? t.slice(0, -3) + "Hu’" : e.indexOf("jar") !== -1 ? t.slice(0, -3) + "wen" : e.indexOf("DIS") !== -1 ? t.slice(0, -3) + "ben" : t + " ret"
	}
	function Kr(e, t, n, r) {
		var i = Xr(e);
		switch (n) {
		case "mm":
			return i + " tup";
		case "hh":
			return i + " rep";
		case "dd":
			return i + " jaj";
		case "MM":
			return i + " jar";
		case "yy":
			return i + " DIS"
		}
	}
	function Xr(e) {
		var t = Math.floor(e % 1e3 / 100),
			n = Math.floor(e % 100 / 10),
			r = e % 10,
			i = "";
		return t > 0 && (i += os[t] + "vatlh"), n > 0 && (i += ("" !== i ? " " : "") + os[n] + "maH"), r > 0 && (i += ("" !== i ? " " : "") + os[r]), "" === i ? "pagh" : i
	}
	function Qr(e, t, n, r) {
		var i = {
			s: ["viensas secunds", "'iensas secunds"],
			m: ["'n míut", "'iens míut"],
			mm: [e + " míuts", "" + e + " míuts"],
			h: ["'n þora", "'iensa þora"],
			hh: [e + " þoras", "" + e + " þoras"],
			d: ["'n ziua", "'iensa ziua"],
			dd: [e + " ziuas", "" + e + " ziuas"],
			M: ["'n mes", "'iens mes"],
			MM: [e + " mesen", "" + e + " mesen"],
			y: ["'n ar", "'iens ar"],
			yy: [e + " ars", "" + e + " ars"]
		};
		return r ? i[n][0] : t ? i[n][0] : i[n][1]
	}
	function Zr(e, t) {
		var n = e.split("_");
		return t % 10 === 1 && t % 100 !== 11 ? n[0] : t % 10 >= 2 && t % 10 <= 4 && (t % 100 < 10 || t % 100 >= 20) ? n[1] : n[2]
	}
	function ei(e, t, n) {
		var r = {
			mm: t ? "хвилина_хвилини_хвилин" : "хвилину_хвилини_хвилин",
			hh: t ? "година_години_годин" : "годину_години_годин",
			dd: "день_дні_днів",
			MM: "місяць_місяці_місяців",
			yy: "рік_роки_років"
		};
		return "m" === n ? t ? "хвилина" : "хвилину" : "h" === n ? t ? "година" : "годину" : e + " " + Zr(r[n], +e)
	}
	function ti(e, t) {
		var n = {
			nominative: "неділя_понеділок_вівторок_середа_четвер_п’ятниця_субота".split("_"),
			accusative: "неділю_понеділок_вівторок_середу_четвер_п’ятницю_суботу".split("_"),
			genitive: "неділі_понеділка_вівторка_середи_четверга_п’ятниці_суботи".split("_")
		},
			r = /(\[[ВвУу]\]) ?dddd/.test(t) ? "accusative" : /\[?(?:минулої|наступної)? ?\] ?dddd/.test(t) ? "genitive" : "nominative";
		return n[r][e.day()]
	}
	function ni(e) {
		return function() {
			return e + "о" + (11 === this.hours() ? "б" : "") + "] LT"
		}
	}
	var ri, ii;
	ii = Array.prototype.some ? Array.prototype.some : function(e) {
		for (var t = Object(this), n = t.length >>> 0, r = 0; r < n; r++) if (r in t && e.call(this, t[r], r, t)) return !0;
		return !1
	};
	var ai = e.momentProperties = [],
		oi = !1,
		si = {};
	e.suppressDeprecationWarnings = !1, e.deprecationHandler = null;
	var li;
	li = Object.keys ? Object.keys : function(e) {
		var t, n = [];
		for (t in e) a(e, t) && n.push(t);
		return n
	};
	var ui, ci, di = {},
		hi = {},
		fi = /(\[[^\[]*\])|(\\)?([Hh]mm(ss)?|Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|Qo?|YYYYYY|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|kk?|mm?|ss?|S{1,9}|x|X|zz?|ZZ?|.)/g,
		pi = /(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,
		mi = {},
		_i = {},
		gi = /\d/,
		yi = /\d\d/,
		vi = /\d{3}/,
		Ei = /\d{4}/,
		bi = /[+-]?\d{6}/,
		Ui = /\d\d?/,
		wi = /\d\d\d\d?/,
		ki = /\d\d\d\d\d\d?/,
		Mi = /\d{1,3}/,
		Li = /\d{1,4}/,
		Fi = /[+-]?\d{1,6}/,
		Di = /\d+/,
		xi = /[+-]?\d+/,
		Ti = /Z|[+-]\d\d:?\d\d/gi,
		Yi = /Z|[+-]\d\d(?::?\d\d)?/gi,
		Si = /[+-]?\d+(\.\d{1,3})?/,
		Ai = /[0-9]*['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+|[\u0600-\u06FF\/]+(\s*?[\u0600-\u06FF]+){1,2}/i,
		Ci = {},
		ji = {},
		Hi = 0,
		Bi = 1,
		$i = 2,
		Pi = 3,
		Oi = 4,
		Ii = 5,
		Ni = 6,
		Wi = 7,
		Ri = 8;
	ci = Array.prototype.indexOf ? Array.prototype.indexOf : function(e) {
		var t;
		for (t = 0; t < this.length; ++t) if (this[t] === e) return t;
		return -1
	}, W("M", ["MM", 2], "Mo", function() {
		return this.month() + 1
	}), W("MMM", 0, 0, function(e) {
		return this.localeData().monthsShort(this, e)
	}), W("MMMM", 0, 0, function(e) {
		return this.localeData().months(this, e)
	}), j("month", "M"), V("M", Ui), V("MM", Ui, yi), V("MMM", function(e, t) {
		return t.monthsShortRegex(e)
	}), V("MMMM", function(e, t) {
		return t.monthsRegex(e)
	}), Q(["M", "MM"], function(e, t) {
		t[Bi] = g(e) - 1
	}), Q(["MMM", "MMMM"], function(e, t, n, r) {
		var i = n._locale.monthsParse(e, r, n._strict);
		null != i ? t[Bi] = i : u(n).invalidMonth = e
	});
	var zi = /D[oD]?(\[[^\[\]]*\]|\s+)+MMMM?/,
		qi = "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
		Ji = "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
		Vi = Ai,
		Gi = Ai,
		Ki = /^\s*((?:[+-]\d{6}|\d{4})-(?:\d\d-\d\d|W\d\d-\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?::\d\d(?::\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?/,
		Xi = /^\s*((?:[+-]\d{6}|\d{4})(?:\d\d\d\d|W\d\d\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?:\d\d(?:\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?/,
		Qi = /Z|[+-]\d\d(?::?\d\d)?/,
		Zi = [
			["YYYYYY-MM-DD", /[+-]\d{6}-\d\d-\d\d/],
			["YYYY-MM-DD", /\d{4}-\d\d-\d\d/],
			["GGGG-[W]WW-E", /\d{4}-W\d\d-\d/],
			["GGGG-[W]WW", /\d{4}-W\d\d/, !1],
			["YYYY-DDD", /\d{4}-\d{3}/],
			["YYYY-MM", /\d{4}-\d\d/, !1],
			["YYYYYYMMDD", /[+-]\d{10}/],
			["YYYYMMDD", /\d{8}/],
			["GGGG[W]WWE", /\d{4}W\d{3}/],
			["GGGG[W]WW", /\d{4}W\d{2}/, !1],
			["YYYYDDD", /\d{7}/]
		],
		ea = [
			["HH:mm:ss.SSSS", /\d\d:\d\d:\d\d\.\d+/],
			["HH:mm:ss,SSSS", /\d\d:\d\d:\d\d,\d+/],
			["HH:mm:ss", /\d\d:\d\d:\d\d/],
			["HH:mm", /\d\d:\d\d/],
			["HHmmss.SSSS", /\d\d\d\d\d\d\.\d+/],
			["HHmmss,SSSS", /\d\d\d\d\d\d,\d+/],
			["HHmmss", /\d\d\d\d\d\d/],
			["HHmm", /\d\d\d\d/],
			["HH", /\d\d/]
		],
		ta = /^\/?Date\((\-?\d+)/i;
	e.createFromInputFallback = E("moment construction falls back to js Date. This is discouraged and will be removed in upcoming major release. Please refer to https://github.com/moment/moment/issues/1407 for more info.", function(e) {
		e._d = new Date(e._i + (e._useUTC ? " UTC" : ""))
	}), W("Y", 0, 0, function() {
		var e = this.year();
		return e <= 9999 ? "" + e : "+" + e
	}), W(0, ["YY", 2], 0, function() {
		return this.year() % 100
	}), W(0, ["YYYY", 4], 0, "year"), W(0, ["YYYYY", 5], 0, "year"), W(0, ["YYYYYY", 6, !0], 0, "year"), j("year", "y"), V("Y", xi), V("YY", Ui, yi), V("YYYY", Li, Ei), V("YYYYY", Fi, bi), V("YYYYYY", Fi, bi), Q(["YYYYY", "YYYYYY"], Hi), Q("YYYY", function(t, n) {
		n[Hi] = 2 === t.length ? e.parseTwoDigitYear(t) : g(t)
	}), Q("YY", function(t, n) {
		n[Hi] = e.parseTwoDigitYear(t)
	}), Q("Y", function(e, t) {
		t[Hi] = parseInt(e, 10)
	}), e.parseTwoDigitYear = function(e) {
		return g(e) + (g(e) > 68 ? 1900 : 2e3)
	};
	var na = $("FullYear", !0);
	e.ISO_8601 = function() {};
	var ra = E("moment().min is deprecated, use moment.max instead. https://github.com/moment/moment/issues/1548", function() {
		var e = He.apply(null, arguments);
		return this.isValid() && e.isValid() ? e < this ? this : e : d()
	}),
		ia = E("moment().max is deprecated, use moment.min instead. https://github.com/moment/moment/issues/1548", function() {
			var e = He.apply(null, arguments);
			return this.isValid() && e.isValid() ? e > this ? this : e : d()
		}),
		aa = function() {
			return Date.now ? Date.now() : +new Date
		};
	Ne("Z", ":"), Ne("ZZ", ""), V("Z", Yi), V("ZZ", Yi), Q(["Z", "ZZ"], function(e, t, n) {
		n._useUTC = !0, n._tzm = We(Yi, e)
	});
	var oa = /([\+\-]|\d\d)/gi;
	e.updateOffset = function() {};
	var sa = /^(\-)?(?:(\d*)[. ])?(\d+)\:(\d+)(?:\:(\d+)\.?(\d{3})?\d*)?$/,
		la = /^(-)?P(?:(-?[0-9,.]*)Y)?(?:(-?[0-9,.]*)M)?(?:(-?[0-9,.]*)W)?(?:(-?[0-9,.]*)D)?(?:T(?:(-?[0-9,.]*)H)?(?:(-?[0-9,.]*)M)?(?:(-?[0-9,.]*)S)?)?$/;
	rt.fn = Oe.prototype;
	var ua = lt(1, "add"),
		ca = lt(-1, "subtract");
	e.defaultFormat = "YYYY-MM-DDTHH:mm:ssZ", e.defaultFormatUtc = "YYYY-MM-DDTHH:mm:ss[Z]";
	var da = E("moment().lang() is deprecated. Instead, use moment().localeData() to get the language configuration. Use moment().locale() to change languages.", function(e) {
		return void 0 === e ? this.localeData() : this.locale(e)
	});
	W(0, ["gg", 2], 0, function() {
		return this.weekYear() % 100
	}), W(0, ["GG", 2], 0, function() {
		return this.isoWeekYear() % 100
	}), It("gggg", "weekYear"), It("ggggg", "weekYear"), It("GGGG", "isoWeekYear"), It("GGGGG", "isoWeekYear"), j("weekYear", "gg"), j("isoWeekYear", "GG"), V("G", xi), V("g", xi), V("GG", Ui, yi), V("gg", Ui, yi), V("GGGG", Li, Ei), V("gggg", Li, Ei), V("GGGGG", Fi, bi), V("ggggg", Fi, bi), Z(["gggg", "ggggg", "GGGG", "GGGGG"], function(e, t, n, r) {
		t[r.substr(0, 2)] = g(e)
	}), Z(["gg", "GG"], function(t, n, r, i) {
		n[i] = e.parseTwoDigitYear(t)
	}), W("Q", 0, "Qo", "quarter"), j("quarter", "Q"), V("Q", gi), Q("Q", function(e, t) {
		t[Bi] = 3 * (g(e) - 1)
	}), W("w", ["ww", 2], "wo", "week"), W("W", ["WW", 2], "Wo", "isoWeek"), j("week", "w"), j("isoWeek", "W"), V("w", Ui), V("ww", Ui, yi), V("W", Ui), V("WW", Ui, yi), Z(["w", "ww", "W", "WW"], function(e, t, n, r) {
		t[r.substr(0, 1)] = g(e)
	});
	var ha = {
		dow: 0,
		doy: 6
	};
	W("D", ["DD", 2], "Do", "date"), j("date", "D"), V("D", Ui), V("DD", Ui, yi), V("Do", function(e, t) {
		return e ? t._ordinalParse : t._ordinalParseLenient
	}), Q(["D", "DD"], $i), Q("Do", function(e, t) {
		t[$i] = g(e.match(Ui)[0], 10)
	});
	var fa = $("Date", !0);
	W("d", 0, "do", "day"), W("dd", 0, 0, function(e) {
		return this.localeData().weekdaysMin(this, e)
	}), W("ddd", 0, 0, function(e) {
		return this.localeData().weekdaysShort(this, e)
	}), W("dddd", 0, 0, function(e) {
		return this.localeData().weekdays(this, e)
	}), W("e", 0, 0, "weekday"), W("E", 0, 0, "isoWeekday"), j("day", "d"), j("weekday", "e"), j("isoWeekday", "E"), V("d", Ui), V("e", Ui), V("E", Ui), V("dd", function(e, t) {
		return t.weekdaysMinRegex(e)
	}), V("ddd", function(e, t) {
		return t.weekdaysShortRegex(e)
	}), V("dddd", function(e, t) {
		return t.weekdaysRegex(e)
	}), Z(["dd", "ddd", "dddd"], function(e, t, n, r) {
		var i = n._locale.weekdaysParse(e, r, n._strict);
		null != i ? t.d = i : u(n).invalidWeekday = e
	}), Z(["d", "e", "E"], function(e, t, n, r) {
		t[r] = g(e)
	});
	var pa = "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
		ma = "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
		_a = "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
		ga = Ai,
		ya = Ai,
		va = Ai;
	W("DDD", ["DDDD", 3], "DDDo", "dayOfYear"), j("dayOfYear", "DDD"), V("DDD", Mi), V("DDDD", vi), Q(["DDD", "DDDD"], function(e, t, n) {
		n._dayOfYear = g(e)
	}), W("H", ["HH", 2], 0, "hour"), W("h", ["hh", 2], 0, mn), W("k", ["kk", 2], 0, _n), W("hmm", 0, 0, function() {
		return "" + mn.apply(this) + N(this.minutes(), 2)
	}), W("hmmss", 0, 0, function() {
		return "" + mn.apply(this) + N(this.minutes(), 2) + N(this.seconds(), 2)
	}), W("Hmm", 0, 0, function() {
		return "" + this.hours() + N(this.minutes(), 2)
	}), W("Hmmss", 0, 0, function() {
		return "" + this.hours() + N(this.minutes(), 2) + N(this.seconds(), 2)
	}), gn("a", !0), gn("A", !1), j("hour", "h"), V("a", yn), V("A", yn), V("H", Ui), V("h", Ui), V("HH", Ui, yi), V("hh", Ui, yi), V("hmm", wi), V("hmmss", ki), V("Hmm", wi), V("Hmmss", ki), Q(["H", "HH"], Pi), Q(["a", "A"], function(e, t, n) {
		n._isPm = n._locale.isPM(e), n._meridiem = e
	}), Q(["h", "hh"], function(e, t, n) {
		t[Pi] = g(e), u(n).bigHour = !0
	}), Q("hmm", function(e, t, n) {
		var r = e.length - 2;
		t[Pi] = g(e.substr(0, r)), t[Oi] = g(e.substr(r)), u(n).bigHour = !0
	}), Q("hmmss", function(e, t, n) {
		var r = e.length - 4,
			i = e.length - 2;
		t[Pi] = g(e.substr(0, r)), t[Oi] = g(e.substr(r, 2)), t[Ii] = g(e.substr(i)), u(n).bigHour = !0
	}), Q("Hmm", function(e, t, n) {
		var r = e.length - 2;
		t[Pi] = g(e.substr(0, r)), t[Oi] = g(e.substr(r))
	}), Q("Hmmss", function(e, t, n) {
		var r = e.length - 4,
			i = e.length - 2;
		t[Pi] = g(e.substr(0, r)), t[Oi] = g(e.substr(r, 2)), t[Ii] = g(e.substr(i))
	});
	var Ea = /[ap]\.?m?\.?/i,
		ba = $("Hours", !0);
	W("m", ["mm", 2], 0, "minute"), j("minute", "m"), V("m", Ui), V("mm", Ui, yi), Q(["m", "mm"], Oi);
	var Ua = $("Minutes", !1);
	W("s", ["ss", 2], 0, "second"), j("second", "s"), V("s", Ui), V("ss", Ui, yi), Q(["s", "ss"], Ii);
	var wa = $("Seconds", !1);
	W("S", 0, 0, function() {
		return ~~ (this.millisecond() / 100)
	}), W(0, ["SS", 2], 0, function() {
		return ~~ (this.millisecond() / 10)
	}), W(0, ["SSS", 3], 0, "millisecond"), W(0, ["SSSS", 4], 0, function() {
		return 10 * this.millisecond()
	}), W(0, ["SSSSS", 5], 0, function() {
		return 100 * this.millisecond()
	}), W(0, ["SSSSSS", 6], 0, function() {
		return 1e3 * this.millisecond()
	}), W(0, ["SSSSSSS", 7], 0, function() {
		return 1e4 * this.millisecond()
	}), W(0, ["SSSSSSSS", 8], 0, function() {
		return 1e5 * this.millisecond()
	}), W(0, ["SSSSSSSSS", 9], 0, function() {
		return 1e6 * this.millisecond()
	}), j("millisecond", "ms"), V("S", Mi, gi), V("SS", Mi, yi), V("SSS", Mi, vi);
	var ka;
	for (ka = "SSSS"; ka.length <= 9; ka += "S") V(ka, Di);
	for (ka = "S"; ka.length <= 9; ka += "S") Q(ka, bn);
	var Ma = $("Milliseconds", !1);
	W("z", 0, 0, "zoneAbbr"), W("zz", 0, 0, "zoneName");
	var La = p.prototype;
	La.add = ua, La.calendar = ct, La.clone = dt, La.diff = yt, La.endOf = Tt, La.format = Ut, La.from = wt, La.fromNow = kt, La.to = Mt, La.toNow = Lt, La.get = I, La.invalidAt = Pt, La.isAfter = ht, La.isBefore = ft, La.isBetween = pt, La.isSame = mt, La.isSameOrAfter = _t, La.isSameOrBefore = gt, La.isValid = Bt, La.lang = da, La.locale = Ft, La.localeData = Dt, La.max = ia, La.min = ra, La.parsingFlags = $t, La.set = I, La.startOf = xt, La.subtract = ca, La.toArray = Ct, La.toObject = jt, La.toDate = At, La.toISOString = bt, La.toJSON = Ht, La.toString = Et, La.unix = St, La.valueOf = Yt, La.creationData = Ot, La.year = na, La.isLeapYear = ve, La.weekYear = Nt, La.isoWeekYear = Wt, La.quarter = La.quarters = Vt, La.month = se, La.daysInMonth = le, La.week = La.weeks = Qt, La.isoWeek = La.isoWeeks = Zt, La.weeksInYear = zt, La.isoWeeksInYear = Rt, La.date = fa, La.day = La.days = sn, La.weekday = ln, La.isoWeekday = un, La.dayOfYear = pn, La.hour = La.hours = ba, La.minute = La.minutes = Ua, La.second = La.seconds = wa, La.millisecond = La.milliseconds = Ma, La.utcOffset = qe, La.utc = Ve, La.local = Ge, La.parseZone = Ke, La.hasAlignedHourOffset = Xe, La.isDST = Qe, La.isDSTShifted = Ze, La.isLocal = et, La.isUtcOffset = tt, La.isUtc = nt, La.isUTC = nt, La.zoneAbbr = Un, La.zoneName = wn, La.dates = E("dates accessor is deprecated. Use date instead.", fa), La.months = E("months accessor is deprecated. Use month instead", se), La.years = E("years accessor is deprecated. Use year instead", na), La.zone = E("moment().zone is deprecated, use moment().utcOffset instead. https://github.com/moment/moment/issues/1779", Je);
	var Fa = La,
		Da = {
			sameDay: "[Today at] LT",
			nextDay: "[Tomorrow at] LT",
			nextWeek: "dddd [at] LT",
			lastDay: "[Yesterday at] LT",
			lastWeek: "[Last] dddd [at] LT",
			sameElse: "L"
		},
		xa = {
			LTS: "h:mm:ss A",
			LT: "h:mm A",
			L: "MM/DD/YYYY",
			LL: "MMMM D, YYYY",
			LLL: "MMMM D, YYYY h:mm A",
			LLLL: "dddd, MMMM D, YYYY h:mm A"
		},
		Ta = "Invalid date",
		Ya = "%d",
		Sa = /\d{1,2}/,
		Aa = {
			future: "in %s",
			past: "%s ago",
			s: "a few seconds",
			m: "a minute",
			mm: "%d minutes",
			h: "an hour",
			hh: "%d hours",
			d: "a day",
			dd: "%d days",
			M: "a month",
			MM: "%d months",
			y: "a year",
			yy: "%d years"
		},
		Ca = L.prototype;
	Ca._calendar = Da, Ca.calendar = Ln, Ca._longDateFormat = xa, Ca.longDateFormat = Fn, Ca._invalidDate = Ta, Ca.invalidDate = Dn, Ca._ordinal = Ya, Ca.ordinal = xn, Ca._ordinalParse = Sa, Ca.preparse = Tn, Ca.postformat = Tn, Ca._relativeTime = Aa, Ca.relativeTime = Yn, Ca.pastFuture = Sn, Ca.set = k, Ca.months = ne, Ca._months = qi, Ca.monthsShort = re, Ca._monthsShort = Ji, Ca.monthsParse = ae, Ca._monthsRegex = Gi, Ca.monthsRegex = ce, Ca._monthsShortRegex = Vi, Ca.monthsShortRegex = ue, Ca.week = Gt, Ca._week = ha, Ca.firstDayOfYear = Xt, Ca.firstDayOfWeek = Kt, Ca.weekdays = tn, Ca._weekdays = pa, Ca.weekdaysMin = rn, Ca._weekdaysMin = _a, Ca.weekdaysShort = nn, Ca._weekdaysShort = ma, Ca.weekdaysParse = on, Ca._weekdaysRegex = ga, Ca.weekdaysRegex = cn, Ca._weekdaysShortRegex = ya, Ca.weekdaysShortRegex = dn, Ca._weekdaysMinRegex = va, Ca.weekdaysMinRegex = hn, Ca.isPM = vn, Ca._meridiemParse = Ea, Ca.meridiem = En, T("en", {
		ordinalParse: /\d{1,2}(th|st|nd|rd)/,
		ordinal: function(e) {
			var t = e % 10,
				n = 1 === g(e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th";
			return e + n
		}
	}), e.lang = E("moment.lang is deprecated. Use moment.locale instead.", T), e.langData = E("moment.langData is deprecated. Use moment.localeData instead.", A);
	var ja = Math.abs,
		Ha = Xn("ms"),
		Ba = Xn("s"),
		$a = Xn("m"),
		Pa = Xn("h"),
		Oa = Xn("d"),
		Ia = Xn("w"),
		Na = Xn("M"),
		Wa = Xn("y"),
		Ra = Zn("milliseconds"),
		za = Zn("seconds"),
		qa = Zn("minutes"),
		Ja = Zn("hours"),
		Va = Zn("days"),
		Ga = Zn("months"),
		Ka = Zn("years"),
		Xa = Math.round,
		Qa = {
			s: 45,
			m: 45,
			h: 22,
			d: 26,
			M: 11
		},
		Za = Math.abs,
		eo = Oe.prototype;
	eo.abs = In, eo.add = Wn, eo.subtract = Rn, eo.as = Gn, eo.asMilliseconds = Ha, eo.asSeconds = Ba, eo.asMinutes = $a, eo.asHours = Pa, eo.asDays = Oa, eo.asWeeks = Ia, eo.asMonths = Na, eo.asYears = Wa, eo.valueOf = Kn, eo._bubble = qn, eo.get = Qn, eo.milliseconds = Ra, eo.seconds = za, eo.minutes = qa, eo.hours = Ja, eo.days = Va, eo.weeks = er, eo.months = Ga, eo.years = Ka, eo.humanize = ir, eo.toISOString = ar, eo.toString = ar, eo.toJSON = ar, eo.locale = Ft, eo.localeData = Dt, eo.toIsoString = E("toIsoString() is deprecated. Please use toISOString() instead (notice the capitals)", ar), eo.lang = da, W("X", 0, 0, "unix"), W("x", 0, 0, "valueOf"), V("x", xi), V("X", Si), Q("X", function(e, t, n) {
		n._d = new Date(1e3 * parseFloat(e, 10))
	}), Q("x", function(e, t, n) {
		n._d = new Date(g(e))
	}), e.version = "2.13.0", t(He), e.fn = Fa, e.min = $e, e.max = Pe, e.now = aa, e.utc = s, e.unix = kn, e.months = Hn, e.isDate = r, e.locale = T, e.invalid = d, e.duration = rt, e.isMoment = m, e.weekdays = $n, e.parseZone = Mn, e.localeData = A, e.isDuration = Ie, e.monthsShort = Bn, e.weekdaysMin = On, e.defineLocale = Y, e.updateLocale = S, e.locales = C, e.weekdaysShort = Pn, e.normalizeUnits = H, e.relativeTimeThreshold = rr, e.prototype = Fa;
	var to = e,
		no = (to.defineLocale("af", {
			months: "Januarie_Februarie_Maart_April_Mei_Junie_Julie_Augustus_September_Oktober_November_Desember".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_Mei_Jun_Jul_Aug_Sep_Okt_Nov_Des".split("_"),
			weekdays: "Sondag_Maandag_Dinsdag_Woensdag_Donderdag_Vrydag_Saterdag".split("_"),
			weekdaysShort: "Son_Maa_Din_Woe_Don_Vry_Sat".split("_"),
			weekdaysMin: "So_Ma_Di_Wo_Do_Vr_Sa".split("_"),
			meridiemParse: /vm|nm/i,
			isPM: function(e) {
				return /^nm$/i.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 12 ? n ? "vm" : "VM" : n ? "nm" : "NM"
			},
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Vandag om] LT",
				nextDay: "[Môre om] LT",
				nextWeek: "dddd [om] LT",
				lastDay: "[Gister om] LT",
				lastWeek: "[Laas] dddd [om] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "oor %s",
				past: "%s gelede",
				s: "'n paar sekondes",
				m: "'n minuut",
				mm: "%d minute",
				h: "'n uur",
				hh: "%d ure",
				d: "'n dag",
				dd: "%d dae",
				M: "'n maand",
				MM: "%d maande",
				y: "'n jaar",
				yy: "%d jaar"
			},
			ordinalParse: /\d{1,2}(ste|de)/,
			ordinal: function(e) {
				return e + (1 === e || 8 === e || e >= 20 ? "ste" : "de")
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("ar-ma", {
			months: "يناير_فبراير_مارس_أبريل_ماي_يونيو_يوليوز_غشت_شتنبر_أكتوبر_نونبر_دجنبر".split("_"),
			monthsShort: "يناير_فبراير_مارس_أبريل_ماي_يونيو_يوليوز_غشت_شتنبر_أكتوبر_نونبر_دجنبر".split("_"),
			weekdays: "الأحد_الإتنين_الثلاثاء_الأربعاء_الخميس_الجمعة_السبت".split("_"),
			weekdaysShort: "احد_اتنين_ثلاثاء_اربعاء_خميس_جمعة_سبت".split("_"),
			weekdaysMin: "ح_ن_ث_ر_خ_ج_س".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[اليوم على الساعة] LT",
				nextDay: "[غدا على الساعة] LT",
				nextWeek: "dddd [على الساعة] LT",
				lastDay: "[أمس على الساعة] LT",
				lastWeek: "dddd [على الساعة] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "في %s",
				past: "منذ %s",
				s: "ثوان",
				m: "دقيقة",
				mm: "%d دقائق",
				h: "ساعة",
				hh: "%d ساعات",
				d: "يوم",
				dd: "%d أيام",
				M: "شهر",
				MM: "%d أشهر",
				y: "سنة",
				yy: "%d سنوات"
			},
			week: {
				dow: 6,
				doy: 12
			}
		}), {
			1: "١",
			2: "٢",
			3: "٣",
			4: "٤",
			5: "٥",
			6: "٦",
			7: "٧",
			8: "٨",
			9: "٩",
			0: "٠"
		}),
		ro = {
			"١": "1",
			"٢": "2",
			"٣": "3",
			"٤": "4",
			"٥": "5",
			"٦": "6",
			"٧": "7",
			"٨": "8",
			"٩": "9",
			"٠": "0"
		},
		io = (to.defineLocale("ar-sa", {
			months: "يناير_فبراير_مارس_أبريل_مايو_يونيو_يوليو_أغسطس_سبتمبر_أكتوبر_نوفمبر_ديسمبر".split("_"),
			monthsShort: "يناير_فبراير_مارس_أبريل_مايو_يونيو_يوليو_أغسطس_سبتمبر_أكتوبر_نوفمبر_ديسمبر".split("_"),
			weekdays: "الأحد_الإثنين_الثلاثاء_الأربعاء_الخميس_الجمعة_السبت".split("_"),
			weekdaysShort: "أحد_إثنين_ثلاثاء_أربعاء_خميس_جمعة_سبت".split("_"),
			weekdaysMin: "ح_ن_ث_ر_خ_ج_س".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			meridiemParse: /ص|م/,
			isPM: function(e) {
				return "م" === e
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "ص" : "م"
			},
			calendar: {
				sameDay: "[اليوم على الساعة] LT",
				nextDay: "[غدا على الساعة] LT",
				nextWeek: "dddd [على الساعة] LT",
				lastDay: "[أمس على الساعة] LT",
				lastWeek: "dddd [على الساعة] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "في %s",
				past: "منذ %s",
				s: "ثوان",
				m: "دقيقة",
				mm: "%d دقائق",
				h: "ساعة",
				hh: "%d ساعات",
				d: "يوم",
				dd: "%d أيام",
				M: "شهر",
				MM: "%d أشهر",
				y: "سنة",
				yy: "%d سنوات"
			},
			preparse: function(e) {
				return e.replace(/[١٢٣٤٥٦٧٨٩٠]/g, function(e) {
					return ro[e]
				}).replace(/،/g, ",")
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return no[e]
				}).replace(/,/g, "،")
			},
			week: {
				dow: 6,
				doy: 12
			}
		}), to.defineLocale("ar-tn", {
			months: "جانفي_فيفري_مارس_أفريل_ماي_جوان_جويلية_أوت_سبتمبر_أكتوبر_نوفمبر_ديسمبر".split("_"),
			monthsShort: "جانفي_فيفري_مارس_أفريل_ماي_جوان_جويلية_أوت_سبتمبر_أكتوبر_نوفمبر_ديسمبر".split("_"),
			weekdays: "الأحد_الإثنين_الثلاثاء_الأربعاء_الخميس_الجمعة_السبت".split("_"),
			weekdaysShort: "أحد_إثنين_ثلاثاء_أربعاء_خميس_جمعة_سبت".split("_"),
			weekdaysMin: "ح_ن_ث_ر_خ_ج_س".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[اليوم على الساعة] LT",
				nextDay: "[غدا على الساعة] LT",
				nextWeek: "dddd [على الساعة] LT",
				lastDay: "[أمس على الساعة] LT",
				lastWeek: "dddd [على الساعة] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "في %s",
				past: "منذ %s",
				s: "ثوان",
				m: "دقيقة",
				mm: "%d دقائق",
				h: "ساعة",
				hh: "%d ساعات",
				d: "يوم",
				dd: "%d أيام",
				M: "شهر",
				MM: "%d أشهر",
				y: "سنة",
				yy: "%d سنوات"
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), {
			1: "١",
			2: "٢",
			3: "٣",
			4: "٤",
			5: "٥",
			6: "٦",
			7: "٧",
			8: "٨",
			9: "٩",
			0: "٠"
		}),
		ao = {
			"١": "1",
			"٢": "2",
			"٣": "3",
			"٤": "4",
			"٥": "5",
			"٦": "6",
			"٧": "7",
			"٨": "8",
			"٩": "9",
			"٠": "0"
		},
		oo = function(e) {
			return 0 === e ? 0 : 1 === e ? 1 : 2 === e ? 2 : e % 100 >= 3 && e % 100 <= 10 ? 3 : e % 100 >= 11 ? 4 : 5
		},
		so = {
			s: ["أقل من ثانية", "ثانية واحدة", ["ثانيتان", "ثانيتين"], "%d ثوان", "%d ثانية", "%d ثانية"],
			m: ["أقل من دقيقة", "دقيقة واحدة", ["دقيقتان", "دقيقتين"], "%d دقائق", "%d دقيقة", "%d دقيقة"],
			h: ["أقل من ساعة", "ساعة واحدة", ["ساعتان", "ساعتين"], "%d ساعات", "%d ساعة", "%d ساعة"],
			d: ["أقل من يوم", "يوم واحد", ["يومان", "يومين"], "%d أيام", "%d يومًا", "%d يوم"],
			M: ["أقل من شهر", "شهر واحد", ["شهران", "شهرين"], "%d أشهر", "%d شهرا", "%d شهر"],
			y: ["أقل من عام", "عام واحد", ["عامان", "عامين"], "%d أعوام", "%d عامًا", "%d عام"]
		},
		lo = function(e) {
			return function(t, n, r, i) {
				var a = oo(t),
					o = so[e][oo(t)];
				return 2 === a && (o = o[n ? 0 : 1]), o.replace(/%d/i, t)
			}
		},
		uo = ["كانون الثاني يناير", "شباط فبراير", "آذار مارس", "نيسان أبريل", "أيار مايو", "حزيران يونيو", "تموز يوليو", "آب أغسطس", "أيلول سبتمبر", "تشرين الأول أكتوبر", "تشرين الثاني نوفمبر", "كانون الأول ديسمبر"],
		co = (to.defineLocale("ar", {
			months: uo,
			monthsShort: uo,
			weekdays: "الأحد_الإثنين_الثلاثاء_الأربعاء_الخميس_الجمعة_السبت".split("_"),
			weekdaysShort: "أحد_إثنين_ثلاثاء_أربعاء_خميس_جمعة_سبت".split("_"),
			weekdaysMin: "ح_ن_ث_ر_خ_ج_س".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "D/‏M/‏YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			meridiemParse: /ص|م/,
			isPM: function(e) {
				return "م" === e
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "ص" : "م"
			},
			calendar: {
				sameDay: "[اليوم عند الساعة] LT",
				nextDay: "[غدًا عند الساعة] LT",
				nextWeek: "dddd [عند الساعة] LT",
				lastDay: "[أمس عند الساعة] LT",
				lastWeek: "dddd [عند الساعة] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "بعد %s",
				past: "منذ %s",
				s: lo("s"),
				m: lo("m"),
				mm: lo("m"),
				h: lo("h"),
				hh: lo("h"),
				d: lo("d"),
				dd: lo("d"),
				M: lo("M"),
				MM: lo("M"),
				y: lo("y"),
				yy: lo("y")
			},
			preparse: function(e) {
				return e.replace(/\u200f/g, "").replace(/[١٢٣٤٥٦٧٨٩٠]/g, function(e) {
					return ao[e]
				}).replace(/،/g, ",")
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return io[e]
				}).replace(/,/g, "،")
			},
			week: {
				dow: 6,
				doy: 12
			}
		}), {
			1: "-inci",
			5: "-inci",
			8: "-inci",
			70: "-inci",
			80: "-inci",
			2: "-nci",
			7: "-nci",
			20: "-nci",
			50: "-nci",
			3: "-üncü",
			4: "-üncü",
			100: "-üncü",
			6: "-ncı",
			9: "-uncu",
			10: "-uncu",
			30: "-uncu",
			60: "-ıncı",
			90: "-ıncı"
		}),
		ho = (to.defineLocale("az", {
			months: "yanvar_fevral_mart_aprel_may_iyun_iyul_avqust_sentyabr_oktyabr_noyabr_dekabr".split("_"),
			monthsShort: "yan_fev_mar_apr_may_iyn_iyl_avq_sen_okt_noy_dek".split("_"),
			weekdays: "Bazar_Bazar ertəsi_Çərşənbə axşamı_Çərşənbə_Cümə axşamı_Cümə_Şənbə".split("_"),
			weekdaysShort: "Baz_BzE_ÇAx_Çər_CAx_Cüm_Şən".split("_"),
			weekdaysMin: "Bz_BE_ÇA_Çə_CA_Cü_Şə".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[bugün saat] LT",
				nextDay: "[sabah saat] LT",
				nextWeek: "[gələn həftə] dddd [saat] LT",
				lastDay: "[dünən] LT",
				lastWeek: "[keçən həftə] dddd [saat] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s sonra",
				past: "%s əvvəl",
				s: "birneçə saniyyə",
				m: "bir dəqiqə",
				mm: "%d dəqiqə",
				h: "bir saat",
				hh: "%d saat",
				d: "bir gün",
				dd: "%d gün",
				M: "bir ay",
				MM: "%d ay",
				y: "bir il",
				yy: "%d il"
			},
			meridiemParse: /gecə|səhər|gündüz|axşam/,
			isPM: function(e) {
				return /^(gündüz|axşam)$/.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "gecə" : e < 12 ? "səhər" : e < 17 ? "gündüz" : "axşam"
			},
			ordinalParse: /\d{1,2}-(ıncı|inci|nci|üncü|ncı|uncu)/,
			ordinal: function(e) {
				if (0 === e) return e + "-ıncı";
				var t = e % 10,
					n = e % 100 - t,
					r = e >= 100 ? 100 : null;
				return e + (co[t] || co[n] || co[r])
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("be", {
			months: {
				format: "студзеня_лютага_сакавіка_красавіка_траўня_чэрвеня_ліпеня_жніўня_верасня_кастрычніка_лістапада_снежня".split("_"),
				standalone: "студзень_люты_сакавік_красавік_травень_чэрвень_ліпень_жнівень_верасень_кастрычнік_лістапад_снежань".split("_")
			},
			monthsShort: "студ_лют_сак_крас_трав_чэрв_ліп_жнів_вер_каст_ліст_снеж".split("_"),
			weekdays: {
				format: "нядзелю_панядзелак_аўторак_сераду_чацвер_пятніцу_суботу".split("_"),
				standalone: "нядзеля_панядзелак_аўторак_серада_чацвер_пятніца_субота".split("_"),
				isFormat: /\[ ?[Вв] ?(?:мінулую|наступную)? ?\] ?dddd/
			},
			weekdaysShort: "нд_пн_ат_ср_чц_пт_сб".split("_"),
			weekdaysMin: "нд_пн_ат_ср_чц_пт_сб".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY г.",
				LLL: "D MMMM YYYY г., HH:mm",
				LLLL: "dddd, D MMMM YYYY г., HH:mm"
			},
			calendar: {
				sameDay: "[Сёння ў] LT",
				nextDay: "[Заўтра ў] LT",
				lastDay: "[Учора ў] LT",
				nextWeek: function() {
					return "[У] dddd [ў] LT"
				},
				lastWeek: function() {
					switch (this.day()) {
					case 0:
					case 3:
					case 5:
					case 6:
						return "[У мінулую] dddd [ў] LT";
					case 1:
					case 2:
					case 4:
						return "[У мінулы] dddd [ў] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "праз %s",
				past: "%s таму",
				s: "некалькі секунд",
				m: sr,
				mm: sr,
				h: sr,
				hh: sr,
				d: "дзень",
				dd: sr,
				M: "месяц",
				MM: sr,
				y: "год",
				yy: sr
			},
			meridiemParse: /ночы|раніцы|дня|вечара/,
			isPM: function(e) {
				return /^(дня|вечара)$/.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "ночы" : e < 12 ? "раніцы" : e < 17 ? "дня" : "вечара"
			},
			ordinalParse: /\d{1,2}-(і|ы|га)/,
			ordinal: function(e, t) {
				switch (t) {
				case "M":
				case "d":
				case "DDD":
				case "w":
				case "W":
					return e % 10 !== 2 && e % 10 !== 3 || e % 100 === 12 || e % 100 === 13 ? e + "-ы" : e + "-і";
				case "D":
					return e + "-га";
				default:
					return e
				}
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("bg", {
			months: "януари_февруари_март_април_май_юни_юли_август_септември_октомври_ноември_декември".split("_"),
			monthsShort: "янр_фев_мар_апр_май_юни_юли_авг_сеп_окт_ное_дек".split("_"),
			weekdays: "неделя_понеделник_вторник_сряда_четвъртък_петък_събота".split("_"),
			weekdaysShort: "нед_пон_вто_сря_чет_пет_съб".split("_"),
			weekdaysMin: "нд_пн_вт_ср_чт_пт_сб".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "D.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY H:mm",
				LLLL: "dddd, D MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[Днес в] LT",
				nextDay: "[Утре в] LT",
				nextWeek: "dddd [в] LT",
				lastDay: "[Вчера в] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
					case 3:
					case 6:
						return "[В изминалата] dddd [в] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[В изминалия] dddd [в] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "след %s",
				past: "преди %s",
				s: "няколко секунди",
				m: "минута",
				mm: "%d минути",
				h: "час",
				hh: "%d часа",
				d: "ден",
				dd: "%d дни",
				M: "месец",
				MM: "%d месеца",
				y: "година",
				yy: "%d години"
			},
			ordinalParse: /\d{1,2}-(ев|ен|ти|ви|ри|ми)/,
			ordinal: function(e) {
				var t = e % 10,
					n = e % 100;
				return 0 === e ? e + "-ев" : 0 === n ? e + "-ен" : n > 10 && n < 20 ? e + "-ти" : 1 === t ? e + "-ви" : 2 === t ? e + "-ри" : 7 === t || 8 === t ? e + "-ми" : e + "-ти"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), {
			1: "১",
			2: "২",
			3: "৩",
			4: "৪",
			5: "৫",
			6: "৬",
			7: "৭",
			8: "৮",
			9: "৯",
			0: "০"
		}),
		fo = {
			"১": "1",
			"২": "2",
			"৩": "3",
			"৪": "4",
			"৫": "5",
			"৬": "6",
			"৭": "7",
			"৮": "8",
			"৯": "9",
			"০": "0"
		},
		po = (to.defineLocale("bn", {
			months: "জানুয়ারী_ফেবুয়ারী_মার্চ_এপ্রিল_মে_জুন_জুলাই_অগাস্ট_সেপ্টেম্বর_অক্টোবর_নভেম্বর_ডিসেম্বর".split("_"),
			monthsShort: "জানু_ফেব_মার্চ_এপর_মে_জুন_জুল_অগ_সেপ্ট_অক্টো_নভ_ডিসেম্".split("_"),
			weekdays: "রবিবার_সোমবার_মঙ্গলবার_বুধবার_বৃহস্পত্তিবার_শুক্রবার_শনিবার".split("_"),
			weekdaysShort: "রবি_সোম_মঙ্গল_বুধ_বৃহস্পত্তি_শুক্র_শনি".split("_"),
			weekdaysMin: "রব_সম_মঙ্গ_বু_ব্রিহ_শু_শনি".split("_"),
			longDateFormat: {
				LT: "A h:mm সময়",
				LTS: "A h:mm:ss সময়",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, A h:mm সময়",
				LLLL: "dddd, D MMMM YYYY, A h:mm সময়"
			},
			calendar: {
				sameDay: "[আজ] LT",
				nextDay: "[আগামীকাল] LT",
				nextWeek: "dddd, LT",
				lastDay: "[গতকাল] LT",
				lastWeek: "[গত] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s পরে",
				past: "%s আগে",
				s: "কয়েক সেকেন্ড",
				m: "এক মিনিট",
				mm: "%d মিনিট",
				h: "এক ঘন্টা",
				hh: "%d ঘন্টা",
				d: "এক দিন",
				dd: "%d দিন",
				M: "এক মাস",
				MM: "%d মাস",
				y: "এক বছর",
				yy: "%d বছর"
			},
			preparse: function(e) {
				return e.replace(/[১২৩৪৫৬৭৮৯০]/g, function(e) {
					return fo[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return ho[e]
				})
			},
			meridiemParse: /রাত|সকাল|দুপুর|বিকাল|রাত/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "রাত" === t && e >= 4 || "দুপুর" === t && e < 5 || "বিকাল" === t ? e + 12 : e
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "রাত" : e < 10 ? "সকাল" : e < 17 ? "দুপুর" : e < 20 ? "বিকাল" : "রাত"
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), {
			1: "༡",
			2: "༢",
			3: "༣",
			4: "༤",
			5: "༥",
			6: "༦",
			7: "༧",
			8: "༨",
			9: "༩",
			0: "༠"
		}),
		mo = {
			"༡": "1",
			"༢": "2",
			"༣": "3",
			"༤": "4",
			"༥": "5",
			"༦": "6",
			"༧": "7",
			"༨": "8",
			"༩": "9",
			"༠": "0"
		},
		_o = (to.defineLocale("bo", {
			months: "ཟླ་བ་དང་པོ_ཟླ་བ་གཉིས་པ_ཟླ་བ་གསུམ་པ_ཟླ་བ་བཞི་པ_ཟླ་བ་ལྔ་པ_ཟླ་བ་དྲུག་པ_ཟླ་བ་བདུན་པ_ཟླ་བ་བརྒྱད་པ_ཟླ་བ་དགུ་པ_ཟླ་བ་བཅུ་པ_ཟླ་བ་བཅུ་གཅིག་པ_ཟླ་བ་བཅུ་གཉིས་པ".split("_"),
			monthsShort: "ཟླ་བ་དང་པོ_ཟླ་བ་གཉིས་པ_ཟླ་བ་གསུམ་པ_ཟླ་བ་བཞི་པ_ཟླ་བ་ལྔ་པ_ཟླ་བ་དྲུག་པ_ཟླ་བ་བདུན་པ_ཟླ་བ་བརྒྱད་པ_ཟླ་བ་དགུ་པ_ཟླ་བ་བཅུ་པ_ཟླ་བ་བཅུ་གཅིག་པ_ཟླ་བ་བཅུ་གཉིས་པ".split("_"),
			weekdays: "གཟའ་ཉི་མ་_གཟའ་ཟླ་བ་_གཟའ་མིག་དམར་_གཟའ་ལྷག་པ་_གཟའ་ཕུར་བུ_གཟའ་པ་སངས་_གཟའ་སྤེན་པ་".split("_"),
			weekdaysShort: "ཉི་མ་_ཟླ་བ་_མིག་དམར་_ལྷག་པ་_ཕུར་བུ_པ་སངས་_སྤེན་པ་".split("_"),
			weekdaysMin: "ཉི་མ་_ཟླ་བ་_མིག་དམར་_ལྷག་པ་_ཕུར་བུ_པ་སངས་_སྤེན་པ་".split("_"),
			longDateFormat: {
				LT: "A h:mm",
				LTS: "A h:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, A h:mm",
				LLLL: "dddd, D MMMM YYYY, A h:mm"
			},
			calendar: {
				sameDay: "[དི་རིང] LT",
				nextDay: "[སང་ཉིན] LT",
				nextWeek: "[བདུན་ཕྲག་རྗེས་མ], LT",
				lastDay: "[ཁ་སང] LT",
				lastWeek: "[བདུན་ཕྲག་མཐའ་མ] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s ལ་",
				past: "%s སྔན་ལ",
				s: "ལམ་སང",
				m: "སྐར་མ་གཅིག",
				mm: "%d སྐར་མ",
				h: "ཆུ་ཚོད་གཅིག",
				hh: "%d ཆུ་ཚོད",
				d: "ཉིན་གཅིག",
				dd: "%d ཉིན་",
				M: "ཟླ་བ་གཅིག",
				MM: "%d ཟླ་བ",
				y: "ལོ་གཅིག",
				yy: "%d ལོ"
			},
			preparse: function(e) {
				return e.replace(/[༡༢༣༤༥༦༧༨༩༠]/g, function(e) {
					return mo[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return po[e]
				})
			},
			meridiemParse: /མཚན་མོ|ཞོགས་ཀས|ཉིན་གུང|དགོང་དག|མཚན་མོ/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "མཚན་མོ" === t && e >= 4 || "ཉིན་གུང" === t && e < 5 || "དགོང་དག" === t ? e + 12 : e
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "མཚན་མོ" : e < 10 ? "ཞོགས་ཀས" : e < 17 ? "ཉིན་གུང" : e < 20 ? "དགོང་དག" : "མཚན་མོ"
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), to.defineLocale("br", {
			months: "Genver_C'hwevrer_Meurzh_Ebrel_Mae_Mezheven_Gouere_Eost_Gwengolo_Here_Du_Kerzu".split("_"),
			monthsShort: "Gen_C'hwe_Meu_Ebr_Mae_Eve_Gou_Eos_Gwe_Her_Du_Ker".split("_"),
			weekdays: "Sul_Lun_Meurzh_Merc'her_Yaou_Gwener_Sadorn".split("_"),
			weekdaysShort: "Sul_Lun_Meu_Mer_Yao_Gwe_Sad".split("_"),
			weekdaysMin: "Su_Lu_Me_Mer_Ya_Gw_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "h[e]mm A",
				LTS: "h[e]mm:ss A",
				L: "DD/MM/YYYY",
				LL: "D [a viz] MMMM YYYY",
				LLL: "D [a viz] MMMM YYYY h[e]mm A",
				LLLL: "dddd, D [a viz] MMMM YYYY h[e]mm A"
			},
			calendar: {
				sameDay: "[Hiziv da] LT",
				nextDay: "[Warc'hoazh da] LT",
				nextWeek: "dddd [da] LT",
				lastDay: "[Dec'h da] LT",
				lastWeek: "dddd [paset da] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "a-benn %s",
				past: "%s 'zo",
				s: "un nebeud segondennoù",
				m: "ur vunutenn",
				mm: lr,
				h: "un eur",
				hh: "%d eur",
				d: "un devezh",
				dd: lr,
				M: "ur miz",
				MM: lr,
				y: "ur bloaz",
				yy: ur
			},
			ordinalParse: /\d{1,2}(añ|vet)/,
			ordinal: function(e) {
				var t = 1 === e ? "añ" : "vet";
				return e + t
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("bs", {
			months: "januar_februar_mart_april_maj_juni_juli_august_septembar_oktobar_novembar_decembar".split("_"),
			monthsShort: "jan._feb._mar._apr._maj._jun._jul._aug._sep._okt._nov._dec.".split("_"),
			monthsParseExact: !0,
			weekdays: "nedjelja_ponedjeljak_utorak_srijeda_četvrtak_petak_subota".split("_"),
			weekdaysShort: "ned._pon._uto._sri._čet._pet._sub.".split("_"),
			weekdaysMin: "ne_po_ut_sr_če_pe_su".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD. MM. YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd, D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[danas u] LT",
				nextDay: "[sutra u] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[u] [nedjelju] [u] LT";
					case 3:
						return "[u] [srijedu] [u] LT";
					case 6:
						return "[u] [subotu] [u] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[u] dddd [u] LT"
					}
				},
				lastDay: "[jučer u] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
					case 3:
						return "[prošlu] dddd [u] LT";
					case 6:
						return "[prošle] [subote] [u] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[prošli] dddd [u] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "za %s",
				past: "prije %s",
				s: "par sekundi",
				m: fr,
				mm: fr,
				h: fr,
				hh: fr,
				d: "dan",
				dd: fr,
				M: "mjesec",
				MM: fr,
				y: "godinu",
				yy: fr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("ca", {
			months: "gener_febrer_març_abril_maig_juny_juliol_agost_setembre_octubre_novembre_desembre".split("_"),
			monthsShort: "gen._febr._mar._abr._mai._jun._jul._ag._set._oct._nov._des.".split("_"),
			monthsParseExact: !0,
			weekdays: "diumenge_dilluns_dimarts_dimecres_dijous_divendres_dissabte".split("_"),
			weekdaysShort: "dg._dl._dt._dc._dj._dv._ds.".split("_"),
			weekdaysMin: "Dg_Dl_Dt_Dc_Dj_Dv_Ds".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY H:mm",
				LLLL: "dddd D MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: function() {
					return "[avui a " + (1 !== this.hours() ? "les" : "la") + "] LT"
				},
				nextDay: function() {
					return "[demà a " + (1 !== this.hours() ? "les" : "la") + "] LT"
				},
				nextWeek: function() {
					return "dddd [a " + (1 !== this.hours() ? "les" : "la") + "] LT"
				},
				lastDay: function() {
					return "[ahir a " + (1 !== this.hours() ? "les" : "la") + "] LT"
				},
				lastWeek: function() {
					return "[el] dddd [passat a " + (1 !== this.hours() ? "les" : "la") + "] LT"
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "en %s",
				past: "fa %s",
				s: "uns segons",
				m: "un minut",
				mm: "%d minuts",
				h: "una hora",
				hh: "%d hores",
				d: "un dia",
				dd: "%d dies",
				M: "un mes",
				MM: "%d mesos",
				y: "un any",
				yy: "%d anys"
			},
			ordinalParse: /\d{1,2}(r|n|t|è|a)/,
			ordinal: function(e, t) {
				var n = 1 === e ? "r" : 2 === e ? "n" : 3 === e ? "r" : 4 === e ? "t" : "è";
				return "w" !== t && "W" !== t || (n = "a"), e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), "leden_únor_březen_duben_květen_červen_červenec_srpen_září_říjen_listopad_prosinec".split("_")),
		go = "led_úno_bře_dub_kvě_čvn_čvc_srp_zář_říj_lis_pro".split("_"),
		yo = (to.defineLocale("cs", {
			months: _o,
			monthsShort: go,
			monthsParse: function(e, t) {
				var n, r = [];
				for (n = 0; n < 12; n++) r[n] = new RegExp("^" + e[n] + "$|^" + t[n] + "$", "i");
				return r
			}(_o, go),
			shortMonthsParse: function(e) {
				var t, n = [];
				for (t = 0; t < 12; t++) n[t] = new RegExp("^" + e[t] + "$", "i");
				return n
			}(go),
			longMonthsParse: function(e) {
				var t, n = [];
				for (t = 0; t < 12; t++) n[t] = new RegExp("^" + e[t] + "$", "i");
				return n
			}(_o),
			weekdays: "neděle_pondělí_úterý_středa_čtvrtek_pátek_sobota".split("_"),
			weekdaysShort: "ne_po_út_st_čt_pá_so".split("_"),
			weekdaysMin: "ne_po_út_st_čt_pá_so".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[dnes v] LT",
				nextDay: "[zítra v] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[v neděli v] LT";
					case 1:
					case 2:
						return "[v] dddd [v] LT";
					case 3:
						return "[ve středu v] LT";
					case 4:
						return "[ve čtvrtek v] LT";
					case 5:
						return "[v pátek v] LT";
					case 6:
						return "[v sobotu v] LT"
					}
				},
				lastDay: "[včera v] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
						return "[minulou neděli v] LT";
					case 1:
					case 2:
						return "[minulé] dddd [v] LT";
					case 3:
						return "[minulou středu v] LT";
					case 4:
					case 5:
						return "[minulý] dddd [v] LT";
					case 6:
						return "[minulou sobotu v] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "za %s",
				past: "před %s",
				s: mr,
				m: mr,
				mm: mr,
				h: mr,
				hh: mr,
				d: mr,
				dd: mr,
				M: mr,
				MM: mr,
				y: mr,
				yy: mr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("cv", {
			months: "кӑрлач_нарӑс_пуш_ака_май_ҫӗртме_утӑ_ҫурла_авӑн_юпа_чӳк_раштав".split("_"),
			monthsShort: "кӑр_нар_пуш_ака_май_ҫӗр_утӑ_ҫур_авн_юпа_чӳк_раш".split("_"),
			weekdays: "вырсарникун_тунтикун_ытларикун_юнкун_кӗҫнерникун_эрнекун_шӑматкун".split("_"),
			weekdaysShort: "выр_тун_ытл_юн_кӗҫ_эрн_шӑм".split("_"),
			weekdaysMin: "вр_тн_ыт_юн_кҫ_эр_шм".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD-MM-YYYY",
				LL: "YYYY [ҫулхи] MMMM [уйӑхӗн] D[-мӗшӗ]",
				LLL: "YYYY [ҫулхи] MMMM [уйӑхӗн] D[-мӗшӗ], HH:mm",
				LLLL: "dddd, YYYY [ҫулхи] MMMM [уйӑхӗн] D[-мӗшӗ], HH:mm"
			},
			calendar: {
				sameDay: "[Паян] LT [сехетре]",
				nextDay: "[Ыран] LT [сехетре]",
				lastDay: "[Ӗнер] LT [сехетре]",
				nextWeek: "[Ҫитес] dddd LT [сехетре]",
				lastWeek: "[Иртнӗ] dddd LT [сехетре]",
				sameElse: "L"
			},
			relativeTime: {
				future: function(e) {
					var t = /сехет$/i.exec(e) ? "рен" : /ҫул$/i.exec(e) ? "тан" : "ран";
					return e + t
				},
				past: "%s каялла",
				s: "пӗр-ик ҫеккунт",
				m: "пӗр минут",
				mm: "%d минут",
				h: "пӗр сехет",
				hh: "%d сехет",
				d: "пӗр кун",
				dd: "%d кун",
				M: "пӗр уйӑх",
				MM: "%d уйӑх",
				y: "пӗр ҫул",
				yy: "%d ҫул"
			},
			ordinalParse: /\d{1,2}-мӗш/,
			ordinal: "%d-мӗш",
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("cy", {
			months: "Ionawr_Chwefror_Mawrth_Ebrill_Mai_Mehefin_Gorffennaf_Awst_Medi_Hydref_Tachwedd_Rhagfyr".split("_"),
			monthsShort: "Ion_Chwe_Maw_Ebr_Mai_Meh_Gor_Aws_Med_Hyd_Tach_Rhag".split("_"),
			weekdays: "Dydd Sul_Dydd Llun_Dydd Mawrth_Dydd Mercher_Dydd Iau_Dydd Gwener_Dydd Sadwrn".split("_"),
			weekdaysShort: "Sul_Llun_Maw_Mer_Iau_Gwe_Sad".split("_"),
			weekdaysMin: "Su_Ll_Ma_Me_Ia_Gw_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Heddiw am] LT",
				nextDay: "[Yfory am] LT",
				nextWeek: "dddd [am] LT",
				lastDay: "[Ddoe am] LT",
				lastWeek: "dddd [diwethaf am] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "mewn %s",
				past: "%s yn ôl",
				s: "ychydig eiliadau",
				m: "munud",
				mm: "%d munud",
				h: "awr",
				hh: "%d awr",
				d: "diwrnod",
				dd: "%d diwrnod",
				M: "mis",
				MM: "%d mis",
				y: "blwyddyn",
				yy: "%d flynedd"
			},
			ordinalParse: /\d{1,2}(fed|ain|af|il|ydd|ed|eg)/,
			ordinal: function(e) {
				var t = e,
					n = "",
					r = ["", "af", "il", "ydd", "ydd", "ed", "ed", "ed", "fed", "fed", "fed", "eg", "fed", "eg", "eg", "fed", "eg", "eg", "fed", "eg", "fed"];
				return t > 20 ? n = 40 === t || 50 === t || 60 === t || 80 === t || 100 === t ? "fed" : "ain" : t > 0 && (n = r[t]), e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("da", {
			months: "januar_februar_marts_april_maj_juni_juli_august_september_oktober_november_december".split("_"),
			monthsShort: "jan_feb_mar_apr_maj_jun_jul_aug_sep_okt_nov_dec".split("_"),
			weekdays: "søndag_mandag_tirsdag_onsdag_torsdag_fredag_lørdag".split("_"),
			weekdaysShort: "søn_man_tir_ons_tor_fre_lør".split("_"),
			weekdaysMin: "sø_ma_ti_on_to_fr_lø".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY HH:mm",
				LLLL: "dddd [d.] D. MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[I dag kl.] LT",
				nextDay: "[I morgen kl.] LT",
				nextWeek: "dddd [kl.] LT",
				lastDay: "[I går kl.] LT",
				lastWeek: "[sidste] dddd [kl] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "om %s",
				past: "%s siden",
				s: "få sekunder",
				m: "et minut",
				mm: "%d minutter",
				h: "en time",
				hh: "%d timer",
				d: "en dag",
				dd: "%d dage",
				M: "en måned",
				MM: "%d måneder",
				y: "et år",
				yy: "%d år"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("de-at", {
			months: "Jänner_Februar_März_April_Mai_Juni_Juli_August_September_Oktober_November_Dezember".split("_"),
			monthsShort: "Jän._Febr._Mrz._Apr._Mai_Jun._Jul._Aug._Sept._Okt._Nov._Dez.".split("_"),
			monthsParseExact: !0,
			weekdays: "Sonntag_Montag_Dienstag_Mittwoch_Donnerstag_Freitag_Samstag".split("_"),
			weekdaysShort: "So._Mo._Di._Mi._Do._Fr._Sa.".split("_"),
			weekdaysMin: "So_Mo_Di_Mi_Do_Fr_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY HH:mm",
				LLLL: "dddd, D. MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[heute um] LT [Uhr]",
				sameElse: "L",
				nextDay: "[morgen um] LT [Uhr]",
				nextWeek: "dddd [um] LT [Uhr]",
				lastDay: "[gestern um] LT [Uhr]",
				lastWeek: "[letzten] dddd [um] LT [Uhr]"
			},
			relativeTime: {
				future: "in %s",
				past: "vor %s",
				s: "ein paar Sekunden",
				m: _r,
				mm: "%d Minuten",
				h: _r,
				hh: "%d Stunden",
				d: _r,
				dd: _r,
				M: _r,
				MM: _r,
				y: _r,
				yy: _r
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("de", {
			months: "Januar_Februar_März_April_Mai_Juni_Juli_August_September_Oktober_November_Dezember".split("_"),
			monthsShort: "Jan._Febr._Mrz._Apr._Mai_Jun._Jul._Aug._Sept._Okt._Nov._Dez.".split("_"),
			monthsParseExact: !0,
			weekdays: "Sonntag_Montag_Dienstag_Mittwoch_Donnerstag_Freitag_Samstag".split("_"),
			weekdaysShort: "So._Mo._Di._Mi._Do._Fr._Sa.".split("_"),
			weekdaysMin: "So_Mo_Di_Mi_Do_Fr_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY HH:mm",
				LLLL: "dddd, D. MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[heute um] LT [Uhr]",
				sameElse: "L",
				nextDay: "[morgen um] LT [Uhr]",
				nextWeek: "dddd [um] LT [Uhr]",
				lastDay: "[gestern um] LT [Uhr]",
				lastWeek: "[letzten] dddd [um] LT [Uhr]"
			},
			relativeTime: {
				future: "in %s",
				past: "vor %s",
				s: "ein paar Sekunden",
				m: gr,
				mm: "%d Minuten",
				h: gr,
				hh: "%d Stunden",
				d: gr,
				dd: gr,
				M: gr,
				MM: gr,
				y: gr,
				yy: gr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), ["ޖެނުއަރީ", "ފެބްރުއަރީ", "މާރިޗު", "އޭޕްރީލު", "މޭ", "ޖޫން", "ޖުލައި", "އޯގަސްޓު", "ސެޕްޓެމްބަރު", "އޮކްޓޯބަރު", "ނޮވެމްބަރު", "ޑިސެމްބަރު"]),
		vo = ["އާދިއްތަ", "ހޯމަ", "އަންގާރަ", "ބުދަ", "ބުރާސްފަތި", "ހުކުރު", "ހޮނިހިރު"],
		Eo = (to.defineLocale("dv", {
			months: yo,
			monthsShort: yo,
			weekdays: vo,
			weekdaysShort: vo,
			weekdaysMin: "އާދި_ހޯމަ_އަން_ބުދަ_ބުރާ_ހުކު_ހޮނި".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "D/M/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			meridiemParse: /މކ|މފ/,
			isPM: function(e) {
				return "މފ" === e
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "މކ" : "މފ"
			},
			calendar: {
				sameDay: "[މިއަދު] LT",
				nextDay: "[މާދަމާ] LT",
				nextWeek: "dddd LT",
				lastDay: "[އިއްޔެ] LT",
				lastWeek: "[ފާއިތުވި] dddd LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "ތެރޭގައި %s",
				past: "ކުރިން %s",
				s: "ސިކުންތުކޮޅެއް",
				m: "މިނިޓެއް",
				mm: "މިނިޓު %d",
				h: "ގަޑިއިރެއް",
				hh: "ގަޑިއިރު %d",
				d: "ދުވަހެއް",
				dd: "ދުވަސް %d",
				M: "މަހެއް",
				MM: "މަސް %d",
				y: "އަހަރެއް",
				yy: "އަހަރު %d"
			},
			preparse: function(e) {
				return e.replace(/،/g, ",")
			},
			postformat: function(e) {
				return e.replace(/,/g, "،")
			},
			week: {
				dow: 7,
				doy: 12
			}
		}), to.defineLocale("el", {
			monthsNominativeEl: "Ιανουάριος_Φεβρουάριος_Μάρτιος_Απρίλιος_Μάιος_Ιούνιος_Ιούλιος_Αύγουστος_Σεπτέμβριος_Οκτώβριος_Νοέμβριος_Δεκέμβριος".split("_"),
			monthsGenitiveEl: "Ιανουαρίου_Φεβρουαρίου_Μαρτίου_Απριλίου_Μαΐου_Ιουνίου_Ιουλίου_Αυγούστου_Σεπτεμβρίου_Οκτωβρίου_Νοεμβρίου_Δεκεμβρίου".split("_"),
			months: function(e, t) {
				return /D/.test(t.substring(0, t.indexOf("MMMM"))) ? this._monthsGenitiveEl[e.month()] : this._monthsNominativeEl[e.month()]
			},
			monthsShort: "Ιαν_Φεβ_Μαρ_Απρ_Μαϊ_Ιουν_Ιουλ_Αυγ_Σεπ_Οκτ_Νοε_Δεκ".split("_"),
			weekdays: "Κυριακή_Δευτέρα_Τρίτη_Τετάρτη_Πέμπτη_Παρασκευή_Σάββατο".split("_"),
			weekdaysShort: "Κυρ_Δευ_Τρι_Τετ_Πεμ_Παρ_Σαβ".split("_"),
			weekdaysMin: "Κυ_Δε_Τρ_Τε_Πε_Πα_Σα".split("_"),
			meridiem: function(e, t, n) {
				return e > 11 ? n ? "μμ" : "ΜΜ" : n ? "πμ" : "ΠΜ"
			},
			isPM: function(e) {
				return "μ" === (e + "").toLowerCase()[0]
			},
			meridiemParse: /[ΠΜ]\.?Μ?\.?/i,
			longDateFormat: {
				LT: "h:mm A",
				LTS: "h:mm:ss A",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY h:mm A",
				LLLL: "dddd, D MMMM YYYY h:mm A"
			},
			calendarEl: {
				sameDay: "[Σήμερα {}] LT",
				nextDay: "[Αύριο {}] LT",
				nextWeek: "dddd [{}] LT",
				lastDay: "[Χθες {}] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 6:
						return "[το προηγούμενο] dddd [{}] LT";
					default:
						return "[την προηγούμενη] dddd [{}] LT"
					}
				},
				sameElse: "L"
			},
			calendar: function(e, t) {
				var n = this._calendarEl[e],
					r = t && t.hours();
				return U(n) && (n = n.apply(t)), n.replace("{}", r % 12 === 1 ? "στη" : "στις")
			},
			relativeTime: {
				future: "σε %s",
				past: "%s πριν",
				s: "λίγα δευτερόλεπτα",
				m: "ένα λεπτό",
				mm: "%d λεπτά",
				h: "μία ώρα",
				hh: "%d ώρες",
				d: "μία μέρα",
				dd: "%d μέρες",
				M: "ένας μήνας",
				MM: "%d μήνες",
				y: "ένας χρόνος",
				yy: "%d χρόνια"
			},
			ordinalParse: /\d{1,2}η/,
			ordinal: "%dη",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("en-au", {
			months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
			weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
			weekdaysShort: "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
			weekdaysMin: "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
			longDateFormat: {
				LT: "h:mm A",
				LTS: "h:mm:ss A",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY h:mm A",
				LLLL: "dddd, D MMMM YYYY h:mm A"
			},
			calendar: {
				sameDay: "[Today at] LT",
				nextDay: "[Tomorrow at] LT",
				nextWeek: "dddd [at] LT",
				lastDay: "[Yesterday at] LT",
				lastWeek: "[Last] dddd [at] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "in %s",
				past: "%s ago",
				s: "a few seconds",
				m: "a minute",
				mm: "%d minutes",
				h: "an hour",
				hh: "%d hours",
				d: "a day",
				dd: "%d days",
				M: "a month",
				MM: "%d months",
				y: "a year",
				yy: "%d years"
			},
			ordinalParse: /\d{1,2}(st|nd|rd|th)/,
			ordinal: function(e) {
				var t = e % 10,
					n = 1 === ~~ (e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th";
				return e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("en-ca", {
			months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
			weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
			weekdaysShort: "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
			weekdaysMin: "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
			longDateFormat: {
				LT: "h:mm A",
				LTS: "h:mm:ss A",
				L: "YYYY-MM-DD",
				LL: "MMMM D, YYYY",
				LLL: "MMMM D, YYYY h:mm A",
				LLLL: "dddd, MMMM D, YYYY h:mm A"
			},
			calendar: {
				sameDay: "[Today at] LT",
				nextDay: "[Tomorrow at] LT",
				nextWeek: "dddd [at] LT",
				lastDay: "[Yesterday at] LT",
				lastWeek: "[Last] dddd [at] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "in %s",
				past: "%s ago",
				s: "a few seconds",
				m: "a minute",
				mm: "%d minutes",
				h: "an hour",
				hh: "%d hours",
				d: "a day",
				dd: "%d days",
				M: "a month",
				MM: "%d months",
				y: "a year",
				yy: "%d years"
			},
			ordinalParse: /\d{1,2}(st|nd|rd|th)/,
			ordinal: function(e) {
				var t = e % 10,
					n = 1 === ~~ (e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th";
				return e + n
			}
		}), to.defineLocale("en-gb", {
			months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
			weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
			weekdaysShort: "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
			weekdaysMin: "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Today at] LT",
				nextDay: "[Tomorrow at] LT",
				nextWeek: "dddd [at] LT",
				lastDay: "[Yesterday at] LT",
				lastWeek: "[Last] dddd [at] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "in %s",
				past: "%s ago",
				s: "a few seconds",
				m: "a minute",
				mm: "%d minutes",
				h: "an hour",
				hh: "%d hours",
				d: "a day",
				dd: "%d days",
				M: "a month",
				MM: "%d months",
				y: "a year",
				yy: "%d years"
			},
			ordinalParse: /\d{1,2}(st|nd|rd|th)/,
			ordinal: function(e) {
				var t = e % 10,
					n = 1 === ~~ (e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th";
				return e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("en-ie", {
			months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
			weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
			weekdaysShort: "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
			weekdaysMin: "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD-MM-YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Today at] LT",
				nextDay: "[Tomorrow at] LT",
				nextWeek: "dddd [at] LT",
				lastDay: "[Yesterday at] LT",
				lastWeek: "[Last] dddd [at] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "in %s",
				past: "%s ago",
				s: "a few seconds",
				m: "a minute",
				mm: "%d minutes",
				h: "an hour",
				hh: "%d hours",
				d: "a day",
				dd: "%d days",
				M: "a month",
				MM: "%d months",
				y: "a year",
				yy: "%d years"
			},
			ordinalParse: /\d{1,2}(st|nd|rd|th)/,
			ordinal: function(e) {
				var t = e % 10,
					n = 1 === ~~ (e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th";
				return e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("en-nz", {
			months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
			weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
			weekdaysShort: "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
			weekdaysMin: "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
			longDateFormat: {
				LT: "h:mm A",
				LTS: "h:mm:ss A",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY h:mm A",
				LLLL: "dddd, D MMMM YYYY h:mm A"
			},
			calendar: {
				sameDay: "[Today at] LT",
				nextDay: "[Tomorrow at] LT",
				nextWeek: "dddd [at] LT",
				lastDay: "[Yesterday at] LT",
				lastWeek: "[Last] dddd [at] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "in %s",
				past: "%s ago",
				s: "a few seconds",
				m: "a minute",
				mm: "%d minutes",
				h: "an hour",
				hh: "%d hours",
				d: "a day",
				dd: "%d days",
				M: "a month",
				MM: "%d months",
				y: "a year",
				yy: "%d years"
			},
			ordinalParse: /\d{1,2}(st|nd|rd|th)/,
			ordinal: function(e) {
				var t = e % 10,
					n = 1 === ~~ (e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th";
				return e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("eo", {
			months: "januaro_februaro_marto_aprilo_majo_junio_julio_aŭgusto_septembro_oktobro_novembro_decembro".split("_"),
			monthsShort: "jan_feb_mar_apr_maj_jun_jul_aŭg_sep_okt_nov_dec".split("_"),
			weekdays: "Dimanĉo_Lundo_Mardo_Merkredo_Ĵaŭdo_Vendredo_Sabato".split("_"),
			weekdaysShort: "Dim_Lun_Mard_Merk_Ĵaŭ_Ven_Sab".split("_"),
			weekdaysMin: "Di_Lu_Ma_Me_Ĵa_Ve_Sa".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "YYYY-MM-DD",
				LL: "D[-an de] MMMM, YYYY",
				LLL: "D[-an de] MMMM, YYYY HH:mm",
				LLLL: "dddd, [la] D[-an de] MMMM, YYYY HH:mm"
			},
			meridiemParse: /[ap]\.t\.m/i,
			isPM: function(e) {
				return "p" === e.charAt(0).toLowerCase()
			},
			meridiem: function(e, t, n) {
				return e > 11 ? n ? "p.t.m." : "P.T.M." : n ? "a.t.m." : "A.T.M."
			},
			calendar: {
				sameDay: "[Hodiaŭ je] LT",
				nextDay: "[Morgaŭ je] LT",
				nextWeek: "dddd [je] LT",
				lastDay: "[Hieraŭ je] LT",
				lastWeek: "[pasinta] dddd [je] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "je %s",
				past: "antaŭ %s",
				s: "sekundoj",
				m: "minuto",
				mm: "%d minutoj",
				h: "horo",
				hh: "%d horoj",
				d: "tago",
				dd: "%d tagoj",
				M: "monato",
				MM: "%d monatoj",
				y: "jaro",
				yy: "%d jaroj"
			},
			ordinalParse: /\d{1,2}a/,
			ordinal: "%da",
			week: {
				dow: 1,
				doy: 7
			}
		}), "ene._feb._mar._abr._may._jun._jul._ago._sep._oct._nov._dic.".split("_")),
		bo = "ene_feb_mar_abr_may_jun_jul_ago_sep_oct_nov_dic".split("_"),
		Uo = (to.defineLocale("es", {
			months: "enero_febrero_marzo_abril_mayo_junio_julio_agosto_septiembre_octubre_noviembre_diciembre".split("_"),
			monthsShort: function(e, t) {
				return /-MMM-/.test(t) ? bo[e.month()] : Eo[e.month()]
			},
			monthsParseExact: !0,
			weekdays: "domingo_lunes_martes_miércoles_jueves_viernes_sábado".split("_"),
			weekdaysShort: "dom._lun._mar._mié._jue._vie._sáb.".split("_"),
			weekdaysMin: "do_lu_ma_mi_ju_vi_sá".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D [de] MMMM [de] YYYY",
				LLL: "D [de] MMMM [de] YYYY H:mm",
				LLLL: "dddd, D [de] MMMM [de] YYYY H:mm"
			},
			calendar: {
				sameDay: function() {
					return "[hoy a la" + (1 !== this.hours() ? "s" : "") + "] LT"
				},
				nextDay: function() {
					return "[mañana a la" + (1 !== this.hours() ? "s" : "") + "] LT"
				},
				nextWeek: function() {
					return "dddd [a la" + (1 !== this.hours() ? "s" : "") + "] LT"
				},
				lastDay: function() {
					return "[ayer a la" + (1 !== this.hours() ? "s" : "") + "] LT"
				},
				lastWeek: function() {
					return "[el] dddd [pasado a la" + (1 !== this.hours() ? "s" : "") + "] LT"
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "en %s",
				past: "hace %s",
				s: "unos segundos",
				m: "un minuto",
				mm: "%d minutos",
				h: "una hora",
				hh: "%d horas",
				d: "un día",
				dd: "%d días",
				M: "un mes",
				MM: "%d meses",
				y: "un año",
				yy: "%d años"
			},
			ordinalParse: /\d{1,2}º/,
			ordinal: "%dº",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("et", {
			months: "jaanuar_veebruar_märts_aprill_mai_juuni_juuli_august_september_oktoober_november_detsember".split("_"),
			monthsShort: "jaan_veebr_märts_apr_mai_juuni_juuli_aug_sept_okt_nov_dets".split("_"),
			weekdays: "pühapäev_esmaspäev_teisipäev_kolmapäev_neljapäev_reede_laupäev".split("_"),
			weekdaysShort: "P_E_T_K_N_R_L".split("_"),
			weekdaysMin: "P_E_T_K_N_R_L".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd, D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[Täna,] LT",
				nextDay: "[Homme,] LT",
				nextWeek: "[Järgmine] dddd LT",
				lastDay: "[Eile,] LT",
				lastWeek: "[Eelmine] dddd LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s pärast",
				past: "%s tagasi",
				s: yr,
				m: yr,
				mm: yr,
				h: yr,
				hh: yr,
				d: yr,
				dd: "%d päeva",
				M: yr,
				MM: yr,
				y: yr,
				yy: yr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("eu", {
			months: "urtarrila_otsaila_martxoa_apirila_maiatza_ekaina_uztaila_abuztua_iraila_urria_azaroa_abendua".split("_"),
			monthsShort: "urt._ots._mar._api._mai._eka._uzt._abu._ira._urr._aza._abe.".split("_"),
			monthsParseExact: !0,
			weekdays: "igandea_astelehena_asteartea_asteazkena_osteguna_ostirala_larunbata".split("_"),
			weekdaysShort: "ig._al._ar._az._og._ol._lr.".split("_"),
			weekdaysMin: "ig_al_ar_az_og_ol_lr".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "YYYY-MM-DD",
				LL: "YYYY[ko] MMMM[ren] D[a]",
				LLL: "YYYY[ko] MMMM[ren] D[a] HH:mm",
				LLLL: "dddd, YYYY[ko] MMMM[ren] D[a] HH:mm",
				l: "YYYY-M-D",
				ll: "YYYY[ko] MMM D[a]",
				lll: "YYYY[ko] MMM D[a] HH:mm",
				llll: "ddd, YYYY[ko] MMM D[a] HH:mm"
			},
			calendar: {
				sameDay: "[gaur] LT[etan]",
				nextDay: "[bihar] LT[etan]",
				nextWeek: "dddd LT[etan]",
				lastDay: "[atzo] LT[etan]",
				lastWeek: "[aurreko] dddd LT[etan]",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s barru",
				past: "duela %s",
				s: "segundo batzuk",
				m: "minutu bat",
				mm: "%d minutu",
				h: "ordu bat",
				hh: "%d ordu",
				d: "egun bat",
				dd: "%d egun",
				M: "hilabete bat",
				MM: "%d hilabete",
				y: "urte bat",
				yy: "%d urte"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), {
			1: "۱",
			2: "۲",
			3: "۳",
			4: "۴",
			5: "۵",
			6: "۶",
			7: "۷",
			8: "۸",
			9: "۹",
			0: "۰"
		}),
		wo = {
			"۱": "1",
			"۲": "2",
			"۳": "3",
			"۴": "4",
			"۵": "5",
			"۶": "6",
			"۷": "7",
			"۸": "8",
			"۹": "9",
			"۰": "0"
		},
		ko = (to.defineLocale("fa", {
			months: "ژانویه_فوریه_مارس_آوریل_مه_ژوئن_ژوئیه_اوت_سپتامبر_اکتبر_نوامبر_دسامبر".split("_"),
			monthsShort: "ژانویه_فوریه_مارس_آوریل_مه_ژوئن_ژوئیه_اوت_سپتامبر_اکتبر_نوامبر_دسامبر".split("_"),
			weekdays: "یک‌شنبه_دوشنبه_سه‌شنبه_چهارشنبه_پنج‌شنبه_جمعه_شنبه".split("_"),
			weekdaysShort: "یک‌شنبه_دوشنبه_سه‌شنبه_چهارشنبه_پنج‌شنبه_جمعه_شنبه".split("_"),
			weekdaysMin: "ی_د_س_چ_پ_ج_ش".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			meridiemParse: /قبل از ظهر|بعد از ظهر/,
			isPM: function(e) {
				return /بعد از ظهر/.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "قبل از ظهر" : "بعد از ظهر"
			},
			calendar: {
				sameDay: "[امروز ساعت] LT",
				nextDay: "[فردا ساعت] LT",
				nextWeek: "dddd [ساعت] LT",
				lastDay: "[دیروز ساعت] LT",
				lastWeek: "dddd [پیش] [ساعت] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "در %s",
				past: "%s پیش",
				s: "چندین ثانیه",
				m: "یک دقیقه",
				mm: "%d دقیقه",
				h: "یک ساعت",
				hh: "%d ساعت",
				d: "یک روز",
				dd: "%d روز",
				M: "یک ماه",
				MM: "%d ماه",
				y: "یک سال",
				yy: "%d سال"
			},
			preparse: function(e) {
				return e.replace(/[۰-۹]/g, function(e) {
					return wo[e]
				}).replace(/،/g, ",")
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return Uo[e]
				}).replace(/,/g, "،")
			},
			ordinalParse: /\d{1,2}م/,
			ordinal: "%dم",
			week: {
				dow: 6,
				doy: 12
			}
		}), "nolla yksi kaksi kolme neljä viisi kuusi seitsemän kahdeksan yhdeksän".split(" ")),
		Mo = ["nolla", "yhden", "kahden", "kolmen", "neljän", "viiden", "kuuden", ko[7], ko[8], ko[9]],
		Lo = (to.defineLocale("fi", {
			months: "tammikuu_helmikuu_maaliskuu_huhtikuu_toukokuu_kesäkuu_heinäkuu_elokuu_syyskuu_lokakuu_marraskuu_joulukuu".split("_"),
			monthsShort: "tammi_helmi_maalis_huhti_touko_kesä_heinä_elo_syys_loka_marras_joulu".split("_"),
			weekdays: "sunnuntai_maanantai_tiistai_keskiviikko_torstai_perjantai_lauantai".split("_"),
			weekdaysShort: "su_ma_ti_ke_to_pe_la".split("_"),
			weekdaysMin: "su_ma_ti_ke_to_pe_la".split("_"),
			longDateFormat: {
				LT: "HH.mm",
				LTS: "HH.mm.ss",
				L: "DD.MM.YYYY",
				LL: "Do MMMM[ta] YYYY",
				LLL: "Do MMMM[ta] YYYY, [klo] HH.mm",
				LLLL: "dddd, Do MMMM[ta] YYYY, [klo] HH.mm",
				l: "D.M.YYYY",
				ll: "Do MMM YYYY",
				lll: "Do MMM YYYY, [klo] HH.mm",
				llll: "ddd, Do MMM YYYY, [klo] HH.mm"
			},
			calendar: {
				sameDay: "[tänään] [klo] LT",
				nextDay: "[huomenna] [klo] LT",
				nextWeek: "dddd [klo] LT",
				lastDay: "[eilen] [klo] LT",
				lastWeek: "[viime] dddd[na] [klo] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s päästä",
				past: "%s sitten",
				s: vr,
				m: vr,
				mm: vr,
				h: vr,
				hh: vr,
				d: vr,
				dd: vr,
				M: vr,
				MM: vr,
				y: vr,
				yy: vr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("fo", {
			months: "januar_februar_mars_apríl_mai_juni_juli_august_september_oktober_november_desember".split("_"),
			monthsShort: "jan_feb_mar_apr_mai_jun_jul_aug_sep_okt_nov_des".split("_"),
			weekdays: "sunnudagur_mánadagur_týsdagur_mikudagur_hósdagur_fríggjadagur_leygardagur".split("_"),
			weekdaysShort: "sun_mán_týs_mik_hós_frí_ley".split("_"),
			weekdaysMin: "su_má_tý_mi_hó_fr_le".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D. MMMM, YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Í dag kl.] LT",
				nextDay: "[Í morgin kl.] LT",
				nextWeek: "dddd [kl.] LT",
				lastDay: "[Í gjár kl.] LT",
				lastWeek: "[síðstu] dddd [kl] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "um %s",
				past: "%s síðani",
				s: "fá sekund",
				m: "ein minutt",
				mm: "%d minuttir",
				h: "ein tími",
				hh: "%d tímar",
				d: "ein dagur",
				dd: "%d dagar",
				M: "ein mánaði",
				MM: "%d mánaðir",
				y: "eitt ár",
				yy: "%d ár"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("fr-ca", {
			months: "janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre".split("_"),
			monthsShort: "janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.".split("_"),
			monthsParseExact: !0,
			weekdays: "dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
			weekdaysShort: "dim._lun._mar._mer._jeu._ven._sam.".split("_"),
			weekdaysMin: "Di_Lu_Ma_Me_Je_Ve_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "YYYY-MM-DD",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Aujourd'hui à] LT",
				nextDay: "[Demain à] LT",
				nextWeek: "dddd [à] LT",
				lastDay: "[Hier à] LT",
				lastWeek: "dddd [dernier à] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "dans %s",
				past: "il y a %s",
				s: "quelques secondes",
				m: "une minute",
				mm: "%d minutes",
				h: "une heure",
				hh: "%d heures",
				d: "un jour",
				dd: "%d jours",
				M: "un mois",
				MM: "%d mois",
				y: "un an",
				yy: "%d ans"
			},
			ordinalParse: /\d{1,2}(er|e)/,
			ordinal: function(e) {
				return e + (1 === e ? "er" : "e")
			}
		}), to.defineLocale("fr-ch", {
			months: "janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre".split("_"),
			monthsShort: "janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.".split("_"),
			monthsParseExact: !0,
			weekdays: "dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
			weekdaysShort: "dim._lun._mar._mer._jeu._ven._sam.".split("_"),
			weekdaysMin: "Di_Lu_Ma_Me_Je_Ve_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Aujourd'hui à] LT",
				nextDay: "[Demain à] LT",
				nextWeek: "dddd [à] LT",
				lastDay: "[Hier à] LT",
				lastWeek: "dddd [dernier à] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "dans %s",
				past: "il y a %s",
				s: "quelques secondes",
				m: "une minute",
				mm: "%d minutes",
				h: "une heure",
				hh: "%d heures",
				d: "un jour",
				dd: "%d jours",
				M: "un mois",
				MM: "%d mois",
				y: "un an",
				yy: "%d ans"
			},
			ordinalParse: /\d{1,2}(er|e)/,
			ordinal: function(e) {
				return e + (1 === e ? "er" : "e")
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("fr", {
			months: "janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre".split("_"),
			monthsShort: "janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.".split("_"),
			monthsParseExact: !0,
			weekdays: "dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
			weekdaysShort: "dim._lun._mar._mer._jeu._ven._sam.".split("_"),
			weekdaysMin: "Di_Lu_Ma_Me_Je_Ve_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Aujourd'hui à] LT",
				nextDay: "[Demain à] LT",
				nextWeek: "dddd [à] LT",
				lastDay: "[Hier à] LT",
				lastWeek: "dddd [dernier à] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "dans %s",
				past: "il y a %s",
				s: "quelques secondes",
				m: "une minute",
				mm: "%d minutes",
				h: "une heure",
				hh: "%d heures",
				d: "un jour",
				dd: "%d jours",
				M: "un mois",
				MM: "%d mois",
				y: "un an",
				yy: "%d ans"
			},
			ordinalParse: /\d{1,2}(er|)/,
			ordinal: function(e) {
				return e + (1 === e ? "er" : "")
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), "jan._feb._mrt._apr._mai_jun._jul._aug._sep._okt._nov._des.".split("_")),
		Fo = "jan_feb_mrt_apr_mai_jun_jul_aug_sep_okt_nov_des".split("_"),
		Do = (to.defineLocale("fy", {
			months: "jannewaris_febrewaris_maart_april_maaie_juny_july_augustus_septimber_oktober_novimber_desimber".split("_"),
			monthsShort: function(e, t) {
				return /-MMM-/.test(t) ? Fo[e.month()] : Lo[e.month()]
			},
			monthsParseExact: !0,
			weekdays: "snein_moandei_tiisdei_woansdei_tongersdei_freed_sneon".split("_"),
			weekdaysShort: "si._mo._ti._wo._to._fr._so.".split("_"),
			weekdaysMin: "Si_Mo_Ti_Wo_To_Fr_So".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD-MM-YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[hjoed om] LT",
				nextDay: "[moarn om] LT",
				nextWeek: "dddd [om] LT",
				lastDay: "[juster om] LT",
				lastWeek: "[ôfrûne] dddd [om] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "oer %s",
				past: "%s lyn",
				s: "in pear sekonden",
				m: "ien minút",
				mm: "%d minuten",
				h: "ien oere",
				hh: "%d oeren",
				d: "ien dei",
				dd: "%d dagen",
				M: "ien moanne",
				MM: "%d moannen",
				y: "ien jier",
				yy: "%d jierren"
			},
			ordinalParse: /\d{1,2}(ste|de)/,
			ordinal: function(e) {
				return e + (1 === e || 8 === e || e >= 20 ? "ste" : "de")
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), ["Am Faoilleach", "An Gearran", "Am Màrt", "An Giblean", "An Cèitean", "An t-Ògmhios", "An t-Iuchar", "An Lùnastal", "An t-Sultain", "An Dàmhair", "An t-Samhain", "An Dùbhlachd"]),
		xo = ["Faoi", "Gear", "Màrt", "Gibl", "Cèit", "Ògmh", "Iuch", "Lùn", "Sult", "Dàmh", "Samh", "Dùbh"],
		To = ["Didòmhnaich", "Diluain", "Dimàirt", "Diciadain", "Diardaoin", "Dihaoine", "Disathairne"],
		Yo = ["Did", "Dil", "Dim", "Dic", "Dia", "Dih", "Dis"],
		So = ["Dò", "Lu", "Mà", "Ci", "Ar", "Ha", "Sa"],
		Ao = (to.defineLocale("gd", {
			months: Do,
			monthsShort: xo,
			monthsParseExact: !0,
			weekdays: To,
			weekdaysShort: Yo,
			weekdaysMin: So,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[An-diugh aig] LT",
				nextDay: "[A-màireach aig] LT",
				nextWeek: "dddd [aig] LT",
				lastDay: "[An-dè aig] LT",
				lastWeek: "dddd [seo chaidh] [aig] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "ann an %s",
				past: "bho chionn %s",
				s: "beagan diogan",
				m: "mionaid",
				mm: "%d mionaidean",
				h: "uair",
				hh: "%d uairean",
				d: "latha",
				dd: "%d latha",
				M: "mìos",
				MM: "%d mìosan",
				y: "bliadhna",
				yy: "%d bliadhna"
			},
			ordinalParse: /\d{1,2}(d|na|mh)/,
			ordinal: function(e) {
				var t = 1 === e ? "d" : e % 10 === 2 ? "na" : "mh";
				return e + t
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("gl", {
			months: "Xaneiro_Febreiro_Marzo_Abril_Maio_Xuño_Xullo_Agosto_Setembro_Outubro_Novembro_Decembro".split("_"),
			monthsShort: "Xan._Feb._Mar._Abr._Mai._Xuñ._Xul._Ago._Set._Out._Nov._Dec.".split("_"),
			monthsParseExact: !0,
			weekdays: "Domingo_Luns_Martes_Mércores_Xoves_Venres_Sábado".split("_"),
			weekdaysShort: "Dom._Lun._Mar._Mér._Xov._Ven._Sáb.".split("_"),
			weekdaysMin: "Do_Lu_Ma_Mé_Xo_Ve_Sá".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY H:mm",
				LLLL: "dddd D MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: function() {
					return "[hoxe " + (1 !== this.hours() ? "ás" : "á") + "] LT"
				},
				nextDay: function() {
					return "[mañá " + (1 !== this.hours() ? "ás" : "á") + "] LT"
				},
				nextWeek: function() {
					return "dddd [" + (1 !== this.hours() ? "ás" : "a") + "] LT"
				},
				lastDay: function() {
					return "[onte " + (1 !== this.hours() ? "á" : "a") + "] LT"
				},
				lastWeek: function() {
					return "[o] dddd [pasado " + (1 !== this.hours() ? "ás" : "a") + "] LT"
				},
				sameElse: "L"
			},
			relativeTime: {
				future: function(e) {
					return "uns segundos" === e ? "nuns segundos" : "en " + e
				},
				past: "hai %s",
				s: "uns segundos",
				m: "un minuto",
				mm: "%d minutos",
				h: "unha hora",
				hh: "%d horas",
				d: "un día",
				dd: "%d días",
				M: "un mes",
				MM: "%d meses",
				y: "un ano",
				yy: "%d anos"
			},
			ordinalParse: /\d{1,2}º/,
			ordinal: "%dº",
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("he", {
			months: "ינואר_פברואר_מרץ_אפריל_מאי_יוני_יולי_אוגוסט_ספטמבר_אוקטובר_נובמבר_דצמבר".split("_"),
			monthsShort: "ינו׳_פבר׳_מרץ_אפר׳_מאי_יוני_יולי_אוג׳_ספט׳_אוק׳_נוב׳_דצמ׳".split("_"),
			weekdays: "ראשון_שני_שלישי_רביעי_חמישי_שישי_שבת".split("_"),
			weekdaysShort: "א׳_ב׳_ג׳_ד׳_ה׳_ו׳_ש׳".split("_"),
			weekdaysMin: "א_ב_ג_ד_ה_ו_ש".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D [ב]MMMM YYYY",
				LLL: "D [ב]MMMM YYYY HH:mm",
				LLLL: "dddd, D [ב]MMMM YYYY HH:mm",
				l: "D/M/YYYY",
				ll: "D MMM YYYY",
				lll: "D MMM YYYY HH:mm",
				llll: "ddd, D MMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[היום ב־]LT",
				nextDay: "[מחר ב־]LT",
				nextWeek: "dddd [בשעה] LT",
				lastDay: "[אתמול ב־]LT",
				lastWeek: "[ביום] dddd [האחרון בשעה] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "בעוד %s",
				past: "לפני %s",
				s: "מספר שניות",
				m: "דקה",
				mm: "%d דקות",
				h: "שעה",
				hh: function(e) {
					return 2 === e ? "שעתיים" : e + " שעות"
				},
				d: "יום",
				dd: function(e) {
					return 2 === e ? "יומיים" : e + " ימים"
				},
				M: "חודש",
				MM: function(e) {
					return 2 === e ? "חודשיים" : e + " חודשים"
				},
				y: "שנה",
				yy: function(e) {
					return 2 === e ? "שנתיים" : e % 10 === 0 && 10 !== e ? e + " שנה" : e + " שנים"
				}
			},
			meridiemParse: /אחה"צ|לפנה"צ|אחרי הצהריים|לפני הצהריים|לפנות בוקר|בבוקר|בערב/i,
			isPM: function(e) {
				return /^(אחה"צ|אחרי הצהריים|בערב)$/.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 5 ? "לפנות בוקר" : e < 10 ? "בבוקר" : e < 12 ? n ? 'לפנה"צ' : "לפני הצהריים" : e < 18 ? n ? 'אחה"צ' : "אחרי הצהריים" : "בערב"
			}
		}), {
			1: "१",
			2: "२",
			3: "३",
			4: "४",
			5: "५",
			6: "६",
			7: "७",
			8: "८",
			9: "९",
			0: "०"
		}),
		Co = {
			"१": "1",
			"२": "2",
			"३": "3",
			"४": "4",
			"५": "5",
			"६": "6",
			"७": "7",
			"८": "8",
			"९": "9",
			"०": "0"
		},
		jo = (to.defineLocale("hi", {
			months: "जनवरी_फ़रवरी_मार्च_अप्रैल_मई_जून_जुलाई_अगस्त_सितम्बर_अक्टूबर_नवम्बर_दिसम्बर".split("_"),
			monthsShort: "जन._फ़र._मार्च_अप्रै._मई_जून_जुल._अग._सित._अक्टू._नव._दिस.".split("_"),
			monthsParseExact: !0,
			weekdays: "रविवार_सोमवार_मंगलवार_बुधवार_गुरूवार_शुक्रवार_शनिवार".split("_"),
			weekdaysShort: "रवि_सोम_मंगल_बुध_गुरू_शुक्र_शनि".split("_"),
			weekdaysMin: "र_सो_मं_बु_गु_शु_श".split("_"),
			longDateFormat: {
				LT: "A h:mm बजे",
				LTS: "A h:mm:ss बजे",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, A h:mm बजे",
				LLLL: "dddd, D MMMM YYYY, A h:mm बजे"
			},
			calendar: {
				sameDay: "[आज] LT",
				nextDay: "[कल] LT",
				nextWeek: "dddd, LT",
				lastDay: "[कल] LT",
				lastWeek: "[पिछले] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s में",
				past: "%s पहले",
				s: "कुछ ही क्षण",
				m: "एक मिनट",
				mm: "%d मिनट",
				h: "एक घंटा",
				hh: "%d घंटे",
				d: "एक दिन",
				dd: "%d दिन",
				M: "एक महीने",
				MM: "%d महीने",
				y: "एक वर्ष",
				yy: "%d वर्ष"
			},
			preparse: function(e) {
				return e.replace(/[१२३४५६७८९०]/g, function(e) {
					return Co[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return Ao[e]
				})
			},
			meridiemParse: /रात|सुबह|दोपहर|शाम/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "रात" === t ? e < 4 ? e : e + 12 : "सुबह" === t ? e : "दोपहर" === t ? e >= 10 ? e : e + 12 : "शाम" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "रात" : e < 10 ? "सुबह" : e < 17 ? "दोपहर" : e < 20 ? "शाम" : "रात"
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), to.defineLocale("hr", {
			months: {
				format: "siječnja_veljače_ožujka_travnja_svibnja_lipnja_srpnja_kolovoza_rujna_listopada_studenoga_prosinca".split("_"),
				standalone: "siječanj_veljača_ožujak_travanj_svibanj_lipanj_srpanj_kolovoz_rujan_listopad_studeni_prosinac".split("_")
			},
			monthsShort: "sij._velj._ožu._tra._svi._lip._srp._kol._ruj._lis._stu._pro.".split("_"),
			monthsParseExact: !0,
			weekdays: "nedjelja_ponedjeljak_utorak_srijeda_četvrtak_petak_subota".split("_"),
			weekdaysShort: "ned._pon._uto._sri._čet._pet._sub.".split("_"),
			weekdaysMin: "ne_po_ut_sr_če_pe_su".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD. MM. YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd, D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[danas u] LT",
				nextDay: "[sutra u] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[u] [nedjelju] [u] LT";
					case 3:
						return "[u] [srijedu] [u] LT";
					case 6:
						return "[u] [subotu] [u] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[u] dddd [u] LT"
					}
				},
				lastDay: "[jučer u] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
					case 3:
						return "[prošlu] dddd [u] LT";
					case 6:
						return "[prošle] [subote] [u] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[prošli] dddd [u] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "za %s",
				past: "prije %s",
				s: "par sekundi",
				m: br,
				mm: br,
				h: br,
				hh: br,
				d: "dan",
				dd: br,
				M: "mjesec",
				MM: br,
				y: "godinu",
				yy: br
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), "vasárnap hétfőn kedden szerdán csütörtökön pénteken szombaton".split(" ")),
		Ho = (to.defineLocale("hu", {
			months: "január_február_március_április_május_június_július_augusztus_szeptember_október_november_december".split("_"),
			monthsShort: "jan_feb_márc_ápr_máj_jún_júl_aug_szept_okt_nov_dec".split("_"),
			weekdays: "vasárnap_hétfő_kedd_szerda_csütörtök_péntek_szombat".split("_"),
			weekdaysShort: "vas_hét_kedd_sze_csüt_pén_szo".split("_"),
			weekdaysMin: "v_h_k_sze_cs_p_szo".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "YYYY.MM.DD.",
				LL: "YYYY. MMMM D.",
				LLL: "YYYY. MMMM D. H:mm",
				LLLL: "YYYY. MMMM D., dddd H:mm"
			},
			meridiemParse: /de|du/i,
			isPM: function(e) {
				return "u" === e.charAt(1).toLowerCase()
			},
			meridiem: function(e, t, n) {
				return e < 12 ? n === !0 ? "de" : "DE" : n === !0 ? "du" : "DU"
			},
			calendar: {
				sameDay: "[ma] LT[-kor]",
				nextDay: "[holnap] LT[-kor]",
				nextWeek: function() {
					return wr.call(this, !0)
				},
				lastDay: "[tegnap] LT[-kor]",
				lastWeek: function() {
					return wr.call(this, !1)
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "%s múlva",
				past: "%s",
				s: Ur,
				m: Ur,
				mm: Ur,
				h: Ur,
				hh: Ur,
				d: Ur,
				dd: Ur,
				M: Ur,
				MM: Ur,
				y: Ur,
				yy: Ur
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("hy-am", {
			months: {
				format: "հունվարի_փետրվարի_մարտի_ապրիլի_մայիսի_հունիսի_հուլիսի_օգոստոսի_սեպտեմբերի_հոկտեմբերի_նոյեմբերի_դեկտեմբերի".split("_"),
				standalone: "հունվար_փետրվար_մարտ_ապրիլ_մայիս_հունիս_հուլիս_օգոստոս_սեպտեմբեր_հոկտեմբեր_նոյեմբեր_դեկտեմբեր".split("_")
			},
			monthsShort: "հնվ_փտր_մրտ_ապր_մյս_հնս_հլս_օգս_սպտ_հկտ_նմբ_դկտ".split("_"),
			weekdays: "կիրակի_երկուշաբթի_երեքշաբթի_չորեքշաբթի_հինգշաբթի_ուրբաթ_շաբաթ".split("_"),
			weekdaysShort: "կրկ_երկ_երք_չրք_հնգ_ուրբ_շբթ".split("_"),
			weekdaysMin: "կրկ_երկ_երք_չրք_հնգ_ուրբ_շբթ".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY թ.",
				LLL: "D MMMM YYYY թ., HH:mm",
				LLLL: "dddd, D MMMM YYYY թ., HH:mm"
			},
			calendar: {
				sameDay: "[այսօր] LT",
				nextDay: "[վաղը] LT",
				lastDay: "[երեկ] LT",
				nextWeek: function() {
					return "dddd [օրը ժամը] LT"
				},
				lastWeek: function() {
					return "[անցած] dddd [օրը ժամը] LT"
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "%s հետո",
				past: "%s առաջ",
				s: "մի քանի վայրկյան",
				m: "րոպե",
				mm: "%d րոպե",
				h: "ժամ",
				hh: "%d ժամ",
				d: "օր",
				dd: "%d օր",
				M: "ամիս",
				MM: "%d ամիս",
				y: "տարի",
				yy: "%d տարի"
			},
			meridiemParse: /գիշերվա|առավոտվա|ցերեկվա|երեկոյան/,
			isPM: function(e) {
				return /^(ցերեկվա|երեկոյան)$/.test(e)
			},
			meridiem: function(e) {
				return e < 4 ? "գիշերվա" : e < 12 ? "առավոտվա" : e < 17 ? "ցերեկվա" : "երեկոյան"
			},
			ordinalParse: /\d{1,2}|\d{1,2}-(ին|րդ)/,
			ordinal: function(e, t) {
				switch (t) {
				case "DDD":
				case "w":
				case "W":
				case "DDDo":
					return 1 === e ? e + "-ին" : e + "-րդ";
				default:
					return e
				}
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("id", {
			months: "Januari_Februari_Maret_April_Mei_Juni_Juli_Agustus_September_Oktober_November_Desember".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_Mei_Jun_Jul_Ags_Sep_Okt_Nov_Des".split("_"),
			weekdays: "Minggu_Senin_Selasa_Rabu_Kamis_Jumat_Sabtu".split("_"),
			weekdaysShort: "Min_Sen_Sel_Rab_Kam_Jum_Sab".split("_"),
			weekdaysMin: "Mg_Sn_Sl_Rb_Km_Jm_Sb".split("_"),
			longDateFormat: {
				LT: "HH.mm",
				LTS: "HH.mm.ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY [pukul] HH.mm",
				LLLL: "dddd, D MMMM YYYY [pukul] HH.mm"
			},
			meridiemParse: /pagi|siang|sore|malam/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "pagi" === t ? e : "siang" === t ? e >= 11 ? e : e + 12 : "sore" === t || "malam" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 11 ? "pagi" : e < 15 ? "siang" : e < 19 ? "sore" : "malam"
			},
			calendar: {
				sameDay: "[Hari ini pukul] LT",
				nextDay: "[Besok pukul] LT",
				nextWeek: "dddd [pukul] LT",
				lastDay: "[Kemarin pukul] LT",
				lastWeek: "dddd [lalu pukul] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "dalam %s",
				past: "%s yang lalu",
				s: "beberapa detik",
				m: "semenit",
				mm: "%d menit",
				h: "sejam",
				hh: "%d jam",
				d: "sehari",
				dd: "%d hari",
				M: "sebulan",
				MM: "%d bulan",
				y: "setahun",
				yy: "%d tahun"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("is", {
			months: "janúar_febrúar_mars_apríl_maí_júní_júlí_ágúst_september_október_nóvember_desember".split("_"),
			monthsShort: "jan_feb_mar_apr_maí_jún_júl_ágú_sep_okt_nóv_des".split("_"),
			weekdays: "sunnudagur_mánudagur_þriðjudagur_miðvikudagur_fimmtudagur_föstudagur_laugardagur".split("_"),
			weekdaysShort: "sun_mán_þri_mið_fim_fös_lau".split("_"),
			weekdaysMin: "Su_Má_Þr_Mi_Fi_Fö_La".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY [kl.] H:mm",
				LLLL: "dddd, D. MMMM YYYY [kl.] H:mm"
			},
			calendar: {
				sameDay: "[í dag kl.] LT",
				nextDay: "[á morgun kl.] LT",
				nextWeek: "dddd [kl.] LT",
				lastDay: "[í gær kl.] LT",
				lastWeek: "[síðasta] dddd [kl.] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "eftir %s",
				past: "fyrir %s síðan",
				s: Mr,
				m: Mr,
				mm: Mr,
				h: "klukkustund",
				hh: Mr,
				d: Mr,
				dd: Mr,
				M: Mr,
				MM: Mr,
				y: Mr,
				yy: Mr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("it", {
			months: "gennaio_febbraio_marzo_aprile_maggio_giugno_luglio_agosto_settembre_ottobre_novembre_dicembre".split("_"),
			monthsShort: "gen_feb_mar_apr_mag_giu_lug_ago_set_ott_nov_dic".split("_"),
			weekdays: "Domenica_Lunedì_Martedì_Mercoledì_Giovedì_Venerdì_Sabato".split("_"),
			weekdaysShort: "Dom_Lun_Mar_Mer_Gio_Ven_Sab".split("_"),
			weekdaysMin: "Do_Lu_Ma_Me_Gi_Ve_Sa".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Oggi alle] LT",
				nextDay: "[Domani alle] LT",
				nextWeek: "dddd [alle] LT",
				lastDay: "[Ieri alle] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
						return "[la scorsa] dddd [alle] LT";
					default:
						return "[lo scorso] dddd [alle] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: function(e) {
					return (/^[0-9].+$/.test(e) ? "tra" : "in") + " " + e
				},
				past: "%s fa",
				s: "alcuni secondi",
				m: "un minuto",
				mm: "%d minuti",
				h: "un'ora",
				hh: "%d ore",
				d: "un giorno",
				dd: "%d giorni",
				M: "un mese",
				MM: "%d mesi",
				y: "un anno",
				yy: "%d anni"
			},
			ordinalParse: /\d{1,2}º/,
			ordinal: "%dº",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("ja", {
			months: "1月_2月_3月_4月_5月_6月_7月_8月_9月_10月_11月_12月".split("_"),
			monthsShort: "1月_2月_3月_4月_5月_6月_7月_8月_9月_10月_11月_12月".split("_"),
			weekdays: "日曜日_月曜日_火曜日_水曜日_木曜日_金曜日_土曜日".split("_"),
			weekdaysShort: "日_月_火_水_木_金_土".split("_"),
			weekdaysMin: "日_月_火_水_木_金_土".split("_"),
			longDateFormat: {
				LT: "Ah時m分",
				LTS: "Ah時m分s秒",
				L: "YYYY/MM/DD",
				LL: "YYYY年M月D日",
				LLL: "YYYY年M月D日Ah時m分",
				LLLL: "YYYY年M月D日Ah時m分 dddd"
			},
			meridiemParse: /午前|午後/i,
			isPM: function(e) {
				return "午後" === e
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "午前" : "午後"
			},
			calendar: {
				sameDay: "[今日] LT",
				nextDay: "[明日] LT",
				nextWeek: "[来週]dddd LT",
				lastDay: "[昨日] LT",
				lastWeek: "[前週]dddd LT",
				sameElse: "L"
			},
			ordinalParse: /\d{1,2}日/,
			ordinal: function(e, t) {
				switch (t) {
				case "d":
				case "D":
				case "DDD":
					return e + "日";
				default:
					return e
				}
			},
			relativeTime: {
				future: "%s後",
				past: "%s前",
				s: "数秒",
				m: "1分",
				mm: "%d分",
				h: "1時間",
				hh: "%d時間",
				d: "1日",
				dd: "%d日",
				M: "1ヶ月",
				MM: "%dヶ月",
				y: "1年",
				yy: "%d年"
			}
		}), to.defineLocale("jv", {
			months: "Januari_Februari_Maret_April_Mei_Juni_Juli_Agustus_September_Oktober_Nopember_Desember".split("_"),
			monthsShort: "Jan_Feb_Mar_Apr_Mei_Jun_Jul_Ags_Sep_Okt_Nop_Des".split("_"),
			weekdays: "Minggu_Senen_Seloso_Rebu_Kemis_Jemuwah_Septu".split("_"),
			weekdaysShort: "Min_Sen_Sel_Reb_Kem_Jem_Sep".split("_"),
			weekdaysMin: "Mg_Sn_Sl_Rb_Km_Jm_Sp".split("_"),
			longDateFormat: {
				LT: "HH.mm",
				LTS: "HH.mm.ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY [pukul] HH.mm",
				LLLL: "dddd, D MMMM YYYY [pukul] HH.mm"
			},
			meridiemParse: /enjing|siyang|sonten|ndalu/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "enjing" === t ? e : "siyang" === t ? e >= 11 ? e : e + 12 : "sonten" === t || "ndalu" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 11 ? "enjing" : e < 15 ? "siyang" : e < 19 ? "sonten" : "ndalu"
			},
			calendar: {
				sameDay: "[Dinten puniko pukul] LT",
				nextDay: "[Mbenjang pukul] LT",
				nextWeek: "dddd [pukul] LT",
				lastDay: "[Kala wingi pukul] LT",
				lastWeek: "dddd [kepengker pukul] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "wonten ing %s",
				past: "%s ingkang kepengker",
				s: "sawetawis detik",
				m: "setunggal menit",
				mm: "%d menit",
				h: "setunggal jam",
				hh: "%d jam",
				d: "sedinten",
				dd: "%d dinten",
				M: "sewulan",
				MM: "%d wulan",
				y: "setaun",
				yy: "%d taun"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("ka", {
			months: {
				standalone: "იანვარი_თებერვალი_მარტი_აპრილი_მაისი_ივნისი_ივლისი_აგვისტო_სექტემბერი_ოქტომბერი_ნოემბერი_დეკემბერი".split("_"),
				format: "იანვარს_თებერვალს_მარტს_აპრილის_მაისს_ივნისს_ივლისს_აგვისტს_სექტემბერს_ოქტომბერს_ნოემბერს_დეკემბერს".split("_")
			},
			monthsShort: "იან_თებ_მარ_აპრ_მაი_ივნ_ივლ_აგვ_სექ_ოქტ_ნოე_დეკ".split("_"),
			weekdays: {
				standalone: "კვირა_ორშაბათი_სამშაბათი_ოთხშაბათი_ხუთშაბათი_პარასკევი_შაბათი".split("_"),
				format: "კვირას_ორშაბათს_სამშაბათს_ოთხშაბათს_ხუთშაბათს_პარასკევს_შაბათს".split("_"),
				isFormat: /(წინა|შემდეგ)/
			},
			weekdaysShort: "კვი_ორშ_სამ_ოთხ_ხუთ_პარ_შაბ".split("_"),
			weekdaysMin: "კვ_ორ_სა_ოთ_ხუ_პა_შა".split("_"),
			longDateFormat: {
				LT: "h:mm A",
				LTS: "h:mm:ss A",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY h:mm A",
				LLLL: "dddd, D MMMM YYYY h:mm A"
			},
			calendar: {
				sameDay: "[დღეს] LT[-ზე]",
				nextDay: "[ხვალ] LT[-ზე]",
				lastDay: "[გუშინ] LT[-ზე]",
				nextWeek: "[შემდეგ] dddd LT[-ზე]",
				lastWeek: "[წინა] dddd LT-ზე",
				sameElse: "L"
			},
			relativeTime: {
				future: function(e) {
					return /(წამი|წუთი|საათი|წელი)/.test(e) ? e.replace(/ი$/, "ში") : e + "ში"
				},
				past: function(e) {
					return /(წამი|წუთი|საათი|დღე|თვე)/.test(e) ? e.replace(/(ი|ე)$/, "ის წინ") : /წელი/.test(e) ? e.replace(/წელი$/, "წლის წინ") : void 0
				},
				s: "რამდენიმე წამი",
				m: "წუთი",
				mm: "%d წუთი",
				h: "საათი",
				hh: "%d საათი",
				d: "დღე",
				dd: "%d დღე",
				M: "თვე",
				MM: "%d თვე",
				y: "წელი",
				yy: "%d წელი"
			},
			ordinalParse: /0|1-ლი|მე-\d{1,2}|\d{1,2}-ე/,
			ordinal: function(e) {
				return 0 === e ? e : 1 === e ? e + "-ლი" : e < 20 || e <= 100 && e % 20 === 0 || e % 100 === 0 ? "მე-" + e : e + "-ე"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), {
			0: "-ші",
			1: "-ші",
			2: "-ші",
			3: "-ші",
			4: "-ші",
			5: "-ші",
			6: "-шы",
			7: "-ші",
			8: "-ші",
			9: "-шы",
			10: "-шы",
			20: "-шы",
			30: "-шы",
			40: "-шы",
			50: "-ші",
			60: "-шы",
			70: "-ші",
			80: "-ші",
			90: "-шы",
			100: "-ші"
		}),
		Bo = (to.defineLocale("kk", {
			months: "қаңтар_ақпан_наурыз_сәуір_мамыр_маусым_шілде_тамыз_қыркүйек_қазан_қараша_желтоқсан".split("_"),
			monthsShort: "қаң_ақп_нау_сәу_мам_мау_шіл_там_қыр_қаз_қар_жел".split("_"),
			weekdays: "жексенбі_дүйсенбі_сейсенбі_сәрсенбі_бейсенбі_жұма_сенбі".split("_"),
			weekdaysShort: "жек_дүй_сей_сәр_бей_жұм_сен".split("_"),
			weekdaysMin: "жк_дй_сй_ср_бй_жм_сн".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Бүгін сағат] LT",
				nextDay: "[Ертең сағат] LT",
				nextWeek: "dddd [сағат] LT",
				lastDay: "[Кеше сағат] LT",
				lastWeek: "[Өткен аптаның] dddd [сағат] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s ішінде",
				past: "%s бұрын",
				s: "бірнеше секунд",
				m: "бір минут",
				mm: "%d минут",
				h: "бір сағат",
				hh: "%d сағат",
				d: "бір күн",
				dd: "%d күн",
				M: "бір ай",
				MM: "%d ай",
				y: "бір жыл",
				yy: "%d жыл"
			},
			ordinalParse: /\d{1,2}-(ші|шы)/,
			ordinal: function(e) {
				var t = e % 10,
					n = e >= 100 ? 100 : null;
				return e + (Ho[e] || Ho[t] || Ho[n])
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("km", {
			months: "មករា_កុម្ភៈ_មីនា_មេសា_ឧសភា_មិថុនា_កក្កដា_សីហា_កញ្ញា_តុលា_វិច្ឆិកា_ធ្នូ".split("_"),
			monthsShort: "មករា_កុម្ភៈ_មីនា_មេសា_ឧសភា_មិថុនា_កក្កដា_សីហា_កញ្ញា_តុលា_វិច្ឆិកា_ធ្នូ".split("_"),
			weekdays: "អាទិត្យ_ច័ន្ទ_អង្គារ_ពុធ_ព្រហស្បតិ៍_សុក្រ_សៅរ៍".split("_"),
			weekdaysShort: "អាទិត្យ_ច័ន្ទ_អង្គារ_ពុធ_ព្រហស្បតិ៍_សុក្រ_សៅរ៍".split("_"),
			weekdaysMin: "អាទិត្យ_ច័ន្ទ_អង្គារ_ពុធ_ព្រហស្បតិ៍_សុក្រ_សៅរ៍".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[ថ្ងៃនេះ ម៉ោង] LT",
				nextDay: "[ស្អែក ម៉ោង] LT",
				nextWeek: "dddd [ម៉ោង] LT",
				lastDay: "[ម្សិលមិញ ម៉ោង] LT",
				lastWeek: "dddd [សប្តាហ៍មុន] [ម៉ោង] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%sទៀត",
				past: "%sមុន",
				s: "ប៉ុន្មានវិនាទី",
				m: "មួយនាទី",
				mm: "%d នាទី",
				h: "មួយម៉ោង",
				hh: "%d ម៉ោង",
				d: "មួយថ្ងៃ",
				dd: "%d ថ្ងៃ",
				M: "មួយខែ",
				MM: "%d ខែ",
				y: "មួយឆ្នាំ",
				yy: "%d ឆ្នាំ"
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("ko", {
			months: "1월_2월_3월_4월_5월_6월_7월_8월_9월_10월_11월_12월".split("_"),
			monthsShort: "1월_2월_3월_4월_5월_6월_7월_8월_9월_10월_11월_12월".split("_"),
			weekdays: "일요일_월요일_화요일_수요일_목요일_금요일_토요일".split("_"),
			weekdaysShort: "일_월_화_수_목_금_토".split("_"),
			weekdaysMin: "일_월_화_수_목_금_토".split("_"),
			longDateFormat: {
				LT: "A h시 m분",
				LTS: "A h시 m분 s초",
				L: "YYYY.MM.DD",
				LL: "YYYY년 MMMM D일",
				LLL: "YYYY년 MMMM D일 A h시 m분",
				LLLL: "YYYY년 MMMM D일 dddd A h시 m분"
			},
			calendar: {
				sameDay: "오늘 LT",
				nextDay: "내일 LT",
				nextWeek: "dddd LT",
				lastDay: "어제 LT",
				lastWeek: "지난주 dddd LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s 후",
				past: "%s 전",
				s: "몇 초",
				ss: "%d초",
				m: "일분",
				mm: "%d분",
				h: "한 시간",
				hh: "%d시간",
				d: "하루",
				dd: "%d일",
				M: "한 달",
				MM: "%d달",
				y: "일 년",
				yy: "%d년"
			},
			ordinalParse: /\d{1,2}일/,
			ordinal: "%d일",
			meridiemParse: /오전|오후/,
			isPM: function(e) {
				return "오후" === e
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "오전" : "오후"
			}
		}), {
			0: "-чү",
			1: "-чи",
			2: "-чи",
			3: "-чү",
			4: "-чү",
			5: "-чи",
			6: "-чы",
			7: "-чи",
			8: "-чи",
			9: "-чу",
			10: "-чу",
			20: "-чы",
			30: "-чу",
			40: "-чы",
			50: "-чү",
			60: "-чы",
			70: "-чи",
			80: "-чи",
			90: "-чу",
			100: "-чү"
		}),
		$o = (to.defineLocale("ky", {
			months: "январь_февраль_март_апрель_май_июнь_июль_август_сентябрь_октябрь_ноябрь_декабрь".split("_"),
			monthsShort: "янв_фев_март_апр_май_июнь_июль_авг_сен_окт_ноя_дек".split("_"),
			weekdays: "Жекшемби_Дүйшөмбү_Шейшемби_Шаршемби_Бейшемби_Жума_Ишемби".split("_"),
			weekdaysShort: "Жек_Дүй_Шей_Шар_Бей_Жум_Ише".split("_"),
			weekdaysMin: "Жк_Дй_Шй_Шр_Бй_Жм_Иш".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Бүгүн саат] LT",
				nextDay: "[Эртең саат] LT",
				nextWeek: "dddd [саат] LT",
				lastDay: "[Кече саат] LT",
				lastWeek: "[Өткен аптанын] dddd [күнү] [саат] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s ичинде",
				past: "%s мурун",
				s: "бирнече секунд",
				m: "бир мүнөт",
				mm: "%d мүнөт",
				h: "бир саат",
				hh: "%d саат",
				d: "бир күн",
				dd: "%d күн",
				M: "бир ай",
				MM: "%d ай",
				y: "бир жыл",
				yy: "%d жыл"
			},
			ordinalParse: /\d{1,2}-(чи|чы|чү|чу)/,
			ordinal: function(e) {
				var t = e % 10,
					n = e >= 100 ? 100 : null;
				return e + (Bo[e] || Bo[t] || Bo[n])
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("lb", {
			months: "Januar_Februar_Mäerz_Abrëll_Mee_Juni_Juli_August_September_Oktober_November_Dezember".split("_"),
			monthsShort: "Jan._Febr._Mrz._Abr._Mee_Jun._Jul._Aug._Sept._Okt._Nov._Dez.".split("_"),
			monthsParseExact: !0,
			weekdays: "Sonndeg_Méindeg_Dënschdeg_Mëttwoch_Donneschdeg_Freideg_Samschdeg".split("_"),
			weekdaysShort: "So._Mé._Dë._Më._Do._Fr._Sa.".split("_"),
			weekdaysMin: "So_Mé_Dë_Më_Do_Fr_Sa".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm [Auer]",
				LTS: "H:mm:ss [Auer]",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm [Auer]",
				LLLL: "dddd, D. MMMM YYYY H:mm [Auer]"
			},
			calendar: {
				sameDay: "[Haut um] LT",
				sameElse: "L",
				nextDay: "[Muer um] LT",
				nextWeek: "dddd [um] LT",
				lastDay: "[Gëschter um] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 2:
					case 4:
						return "[Leschten] dddd [um] LT";
					default:
						return "[Leschte] dddd [um] LT"
					}
				}
			},
			relativeTime: {
				future: Fr,
				past: Dr,
				s: "e puer Sekonnen",
				m: Lr,
				mm: "%d Minutten",
				h: Lr,
				hh: "%d Stonnen",
				d: Lr,
				dd: "%d Deeg",
				M: Lr,
				MM: "%d Méint",
				y: Lr,
				yy: "%d Joer"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("lo", {
			months: "ມັງກອນ_ກຸມພາ_ມີນາ_ເມສາ_ພຶດສະພາ_ມິຖຸນາ_ກໍລະກົດ_ສິງຫາ_ກັນຍາ_ຕຸລາ_ພະຈິກ_ທັນວາ".split("_"),
			monthsShort: "ມັງກອນ_ກຸມພາ_ມີນາ_ເມສາ_ພຶດສະພາ_ມິຖຸນາ_ກໍລະກົດ_ສິງຫາ_ກັນຍາ_ຕຸລາ_ພະຈິກ_ທັນວາ".split("_"),
			weekdays: "ອາທິດ_ຈັນ_ອັງຄານ_ພຸດ_ພະຫັດ_ສຸກ_ເສົາ".split("_"),
			weekdaysShort: "ທິດ_ຈັນ_ອັງຄານ_ພຸດ_ພະຫັດ_ສຸກ_ເສົາ".split("_"),
			weekdaysMin: "ທ_ຈ_ອຄ_ພ_ພຫ_ສກ_ສ".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "ວັນdddd D MMMM YYYY HH:mm"
			},
			meridiemParse: /ຕອນເຊົ້າ|ຕອນແລງ/,
			isPM: function(e) {
				return "ຕອນແລງ" === e
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "ຕອນເຊົ້າ" : "ຕອນແລງ"
			},
			calendar: {
				sameDay: "[ມື້ນີ້ເວລາ] LT",
				nextDay: "[ມື້ອື່ນເວລາ] LT",
				nextWeek: "[ວັນ]dddd[ໜ້າເວລາ] LT",
				lastDay: "[ມື້ວານນີ້ເວລາ] LT",
				lastWeek: "[ວັນ]dddd[ແລ້ວນີ້ເວລາ] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "ອີກ %s",
				past: "%sຜ່ານມາ",
				s: "ບໍ່ເທົ່າໃດວິນາທີ",
				m: "1 ນາທີ",
				mm: "%d ນາທີ",
				h: "1 ຊົ່ວໂມງ",
				hh: "%d ຊົ່ວໂມງ",
				d: "1 ມື້",
				dd: "%d ມື້",
				M: "1 ເດືອນ",
				MM: "%d ເດືອນ",
				y: "1 ປີ",
				yy: "%d ປີ"
			},
			ordinalParse: /(ທີ່)\d{1,2}/,
			ordinal: function(e) {
				return "ທີ່" + e
			}
		}), {
			m: "minutė_minutės_minutę",
			mm: "minutės_minučių_minutes",
			h: "valanda_valandos_valandą",
			hh: "valandos_valandų_valandas",
			d: "diena_dienos_dieną",
			dd: "dienos_dienų_dienas",
			M: "mėnuo_mėnesio_mėnesį",
			MM: "mėnesiai_mėnesių_mėnesius",
			y: "metai_metų_metus",
			yy: "metai_metų_metus"
		}),
		Po = (to.defineLocale("lt", {
			months: {
				format: "sausio_vasario_kovo_balandžio_gegužės_birželio_liepos_rugpjūčio_rugsėjo_spalio_lapkričio_gruodžio".split("_"),
				standalone: "sausis_vasaris_kovas_balandis_gegužė_birželis_liepa_rugpjūtis_rugsėjis_spalis_lapkritis_gruodis".split("_")
			},
			monthsShort: "sau_vas_kov_bal_geg_bir_lie_rgp_rgs_spa_lap_grd".split("_"),
			weekdays: {
				format: "sekmadienį_pirmadienį_antradienį_trečiadienį_ketvirtadienį_penktadienį_šeštadienį".split("_"),
				standalone: "sekmadienis_pirmadienis_antradienis_trečiadienis_ketvirtadienis_penktadienis_šeštadienis".split("_"),
				isFormat: /dddd HH:mm/
			},
			weekdaysShort: "Sek_Pir_Ant_Tre_Ket_Pen_Šeš".split("_"),
			weekdaysMin: "S_P_A_T_K_Pn_Š".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "YYYY-MM-DD",
				LL: "YYYY [m.] MMMM D [d.]",
				LLL: "YYYY [m.] MMMM D [d.], HH:mm [val.]",
				LLLL: "YYYY [m.] MMMM D [d.], dddd, HH:mm [val.]",
				l: "YYYY-MM-DD",
				ll: "YYYY [m.] MMMM D [d.]",
				lll: "YYYY [m.] MMMM D [d.], HH:mm [val.]",
				llll: "YYYY [m.] MMMM D [d.], ddd, HH:mm [val.]"
			},
			calendar: {
				sameDay: "[Šiandien] LT",
				nextDay: "[Rytoj] LT",
				nextWeek: "dddd LT",
				lastDay: "[Vakar] LT",
				lastWeek: "[Praėjusį] dddd LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "po %s",
				past: "prieš %s",
				s: Tr,
				m: Yr,
				mm: Cr,
				h: Yr,
				hh: Cr,
				d: Yr,
				dd: Cr,
				M: Yr,
				MM: Cr,
				y: Yr,
				yy: Cr
			},
			ordinalParse: /\d{1,2}-oji/,
			ordinal: function(e) {
				return e + "-oji"
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), {
			m: "minūtes_minūtēm_minūte_minūtes".split("_"),
			mm: "minūtes_minūtēm_minūte_minūtes".split("_"),
			h: "stundas_stundām_stunda_stundas".split("_"),
			hh: "stundas_stundām_stunda_stundas".split("_"),
			d: "dienas_dienām_diena_dienas".split("_"),
			dd: "dienas_dienām_diena_dienas".split("_"),
			M: "mēneša_mēnešiem_mēnesis_mēneši".split("_"),
			MM: "mēneša_mēnešiem_mēnesis_mēneši".split("_"),
			y: "gada_gadiem_gads_gadi".split("_"),
			yy: "gada_gadiem_gads_gadi".split("_")
		}),
		Oo = (to.defineLocale("lv", {
			months: "janvāris_februāris_marts_aprīlis_maijs_jūnijs_jūlijs_augusts_septembris_oktobris_novembris_decembris".split("_"),
			monthsShort: "jan_feb_mar_apr_mai_jūn_jūl_aug_sep_okt_nov_dec".split("_"),
			weekdays: "svētdiena_pirmdiena_otrdiena_trešdiena_ceturtdiena_piektdiena_sestdiena".split("_"),
			weekdaysShort: "Sv_P_O_T_C_Pk_S".split("_"),
			weekdaysMin: "Sv_P_O_T_C_Pk_S".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY.",
				LL: "YYYY. [gada] D. MMMM",
				LLL: "YYYY. [gada] D. MMMM, HH:mm",
				LLLL: "YYYY. [gada] D. MMMM, dddd, HH:mm"
			},
			calendar: {
				sameDay: "[Šodien pulksten] LT",
				nextDay: "[Rīt pulksten] LT",
				nextWeek: "dddd [pulksten] LT",
				lastDay: "[Vakar pulksten] LT",
				lastWeek: "[Pagājušā] dddd [pulksten] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "pēc %s",
				past: "pirms %s",
				s: $r,
				m: Br,
				mm: Hr,
				h: Br,
				hh: Hr,
				d: Br,
				dd: Hr,
				M: Br,
				MM: Hr,
				y: Br,
				yy: Hr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), {
			words: {
				m: ["jedan minut", "jednog minuta"],
				mm: ["minut", "minuta", "minuta"],
				h: ["jedan sat", "jednog sata"],
				hh: ["sat", "sata", "sati"],
				dd: ["dan", "dana", "dana"],
				MM: ["mjesec", "mjeseca", "mjeseci"],
				yy: ["godina", "godine", "godina"]
			},
			correctGrammaticalCase: function(e, t) {
				return 1 === e ? t[0] : e >= 2 && e <= 4 ? t[1] : t[2]
			},
			translate: function(e, t, n) {
				var r = Oo.words[n];
				return 1 === n.length ? t ? r[0] : r[1] : e + " " + Oo.correctGrammaticalCase(e, r)
			}
		}),
		Io = (to.defineLocale("me", {
			months: "januar_februar_mart_april_maj_jun_jul_avgust_septembar_oktobar_novembar_decembar".split("_"),
			monthsShort: "jan._feb._mar._apr._maj_jun_jul_avg._sep._okt._nov._dec.".split("_"),
			monthsParseExact: !0,
			weekdays: "nedjelja_ponedjeljak_utorak_srijeda_četvrtak_petak_subota".split("_"),
			weekdaysShort: "ned._pon._uto._sri._čet._pet._sub.".split("_"),
			weekdaysMin: "ne_po_ut_sr_če_pe_su".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD. MM. YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd, D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[danas u] LT",
				nextDay: "[sjutra u] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[u] [nedjelju] [u] LT";
					case 3:
						return "[u] [srijedu] [u] LT";
					case 6:
						return "[u] [subotu] [u] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[u] dddd [u] LT"
					}
				},
				lastDay: "[juče u] LT",
				lastWeek: function() {
					var e = ["[prošle] [nedjelje] [u] LT", "[prošlog] [ponedjeljka] [u] LT", "[prošlog] [utorka] [u] LT", "[prošle] [srijede] [u] LT", "[prošlog] [četvrtka] [u] LT", "[prošlog] [petka] [u] LT", "[prošle] [subote] [u] LT"];
					return e[this.day()]
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "za %s",
				past: "prije %s",
				s: "nekoliko sekundi",
				m: Oo.translate,
				mm: Oo.translate,
				h: Oo.translate,
				hh: Oo.translate,
				d: "dan",
				dd: Oo.translate,
				M: "mjesec",
				MM: Oo.translate,
				y: "godinu",
				yy: Oo.translate
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("mk", {
			months: "јануари_февруари_март_април_мај_јуни_јули_август_септември_октомври_ноември_декември".split("_"),
			monthsShort: "јан_фев_мар_апр_мај_јун_јул_авг_сеп_окт_ное_дек".split("_"),
			weekdays: "недела_понеделник_вторник_среда_четврток_петок_сабота".split("_"),
			weekdaysShort: "нед_пон_вто_сре_чет_пет_саб".split("_"),
			weekdaysMin: "нe_пo_вт_ср_че_пе_сa".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "D.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY H:mm",
				LLLL: "dddd, D MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[Денес во] LT",
				nextDay: "[Утре во] LT",
				nextWeek: "[Во] dddd [во] LT",
				lastDay: "[Вчера во] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
					case 3:
					case 6:
						return "[Изминатата] dddd [во] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[Изминатиот] dddd [во] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "после %s",
				past: "пред %s",
				s: "неколку секунди",
				m: "минута",
				mm: "%d минути",
				h: "час",
				hh: "%d часа",
				d: "ден",
				dd: "%d дена",
				M: "месец",
				MM: "%d месеци",
				y: "година",
				yy: "%d години"
			},
			ordinalParse: /\d{1,2}-(ев|ен|ти|ви|ри|ми)/,
			ordinal: function(e) {
				var t = e % 10,
					n = e % 100;
				return 0 === e ? e + "-ев" : 0 === n ? e + "-ен" : n > 10 && n < 20 ? e + "-ти" : 1 === t ? e + "-ви" : 2 === t ? e + "-ри" : 7 === t || 8 === t ? e + "-ми" : e + "-ти"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("ml", {
			months: "ജനുവരി_ഫെബ്രുവരി_മാർച്ച്_ഏപ്രിൽ_മേയ്_ജൂൺ_ജൂലൈ_ഓഗസ്റ്റ്_സെപ്റ്റംബർ_ഒക്ടോബർ_നവംബർ_ഡിസംബർ".split("_"),
			monthsShort: "ജനു._ഫെബ്രു._മാർ._ഏപ്രി._മേയ്_ജൂൺ_ജൂലൈ._ഓഗ._സെപ്റ്റ._ഒക്ടോ._നവം._ഡിസം.".split("_"),
			monthsParseExact: !0,
			weekdays: "ഞായറാഴ്ച_തിങ്കളാഴ്ച_ചൊവ്വാഴ്ച_ബുധനാഴ്ച_വ്യാഴാഴ്ച_വെള്ളിയാഴ്ച_ശനിയാഴ്ച".split("_"),
			weekdaysShort: "ഞായർ_തിങ്കൾ_ചൊവ്വ_ബുധൻ_വ്യാഴം_വെള്ളി_ശനി".split("_"),
			weekdaysMin: "ഞാ_തി_ചൊ_ബു_വ്യാ_വെ_ശ".split("_"),
			longDateFormat: {
				LT: "A h:mm -നു",
				LTS: "A h:mm:ss -നു",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, A h:mm -നു",
				LLLL: "dddd, D MMMM YYYY, A h:mm -നു"
			},
			calendar: {
				sameDay: "[ഇന്ന്] LT",
				nextDay: "[നാളെ] LT",
				nextWeek: "dddd, LT",
				lastDay: "[ഇന്നലെ] LT",
				lastWeek: "[കഴിഞ്ഞ] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s കഴിഞ്ഞ്",
				past: "%s മുൻപ്",
				s: "അൽപ നിമിഷങ്ങൾ",
				m: "ഒരു മിനിറ്റ്",
				mm: "%d മിനിറ്റ്",
				h: "ഒരു മണിക്കൂർ",
				hh: "%d മണിക്കൂർ",
				d: "ഒരു ദിവസം",
				dd: "%d ദിവസം",
				M: "ഒരു മാസം",
				MM: "%d മാസം",
				y: "ഒരു വർഷം",
				yy: "%d വർഷം"
			},
			meridiemParse: /രാത്രി|രാവിലെ|ഉച്ച കഴിഞ്ഞ്|വൈകുന്നേരം|രാത്രി/i,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "രാത്രി" === t && e >= 4 || "ഉച്ച കഴിഞ്ഞ്" === t || "വൈകുന്നേരം" === t ? e + 12 : e
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "രാത്രി" : e < 12 ? "രാവിലെ" : e < 17 ? "ഉച്ച കഴിഞ്ഞ്" : e < 20 ? "വൈകുന്നേരം" : "രാത്രി"
			}
		}), {
			1: "१",
			2: "२",
			3: "३",
			4: "४",
			5: "५",
			6: "६",
			7: "७",
			8: "८",
			9: "९",
			0: "०"
		}),
		No = {
			"१": "1",
			"२": "2",
			"३": "3",
			"४": "4",
			"५": "5",
			"६": "6",
			"७": "7",
			"८": "8",
			"९": "9",
			"०": "0"
		},
		Wo = (to.defineLocale("mr", {
			months: "जानेवारी_फेब्रुवारी_मार्च_एप्रिल_मे_जून_जुलै_ऑगस्ट_सप्टेंबर_ऑक्टोबर_नोव्हेंबर_डिसेंबर".split("_"),
			monthsShort: "जाने._फेब्रु._मार्च._एप्रि._मे._जून._जुलै._ऑग._सप्टें._ऑक्टो._नोव्हें._डिसें.".split("_"),
			monthsParseExact: !0,
			weekdays: "रविवार_सोमवार_मंगळवार_बुधवार_गुरूवार_शुक्रवार_शनिवार".split("_"),
			weekdaysShort: "रवि_सोम_मंगळ_बुध_गुरू_शुक्र_शनि".split("_"),
			weekdaysMin: "र_सो_मं_बु_गु_शु_श".split("_"),
			longDateFormat: {
				LT: "A h:mm वाजता",
				LTS: "A h:mm:ss वाजता",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, A h:mm वाजता",
				LLLL: "dddd, D MMMM YYYY, A h:mm वाजता"
			},
			calendar: {
				sameDay: "[आज] LT",
				nextDay: "[उद्या] LT",
				nextWeek: "dddd, LT",
				lastDay: "[काल] LT",
				lastWeek: "[मागील] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%sमध्ये",
				past: "%sपूर्वी",
				s: Pr,
				m: Pr,
				mm: Pr,
				h: Pr,
				hh: Pr,
				d: Pr,
				dd: Pr,
				M: Pr,
				MM: Pr,
				y: Pr,
				yy: Pr
			},
			preparse: function(e) {
				return e.replace(/[१२३४५६७८९०]/g, function(e) {
					return No[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return Io[e]
				})
			},
			meridiemParse: /रात्री|सकाळी|दुपारी|सायंकाळी/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "रात्री" === t ? e < 4 ? e : e + 12 : "सकाळी" === t ? e : "दुपारी" === t ? e >= 10 ? e : e + 12 : "सायंकाळी" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "रात्री" : e < 10 ? "सकाळी" : e < 17 ? "दुपारी" : e < 20 ? "सायंकाळी" : "रात्री"
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), to.defineLocale("ms-my", {
			months: "Januari_Februari_Mac_April_Mei_Jun_Julai_Ogos_September_Oktober_November_Disember".split("_"),
			monthsShort: "Jan_Feb_Mac_Apr_Mei_Jun_Jul_Ogs_Sep_Okt_Nov_Dis".split("_"),
			weekdays: "Ahad_Isnin_Selasa_Rabu_Khamis_Jumaat_Sabtu".split("_"),
			weekdaysShort: "Ahd_Isn_Sel_Rab_Kha_Jum_Sab".split("_"),
			weekdaysMin: "Ah_Is_Sl_Rb_Km_Jm_Sb".split("_"),
			longDateFormat: {
				LT: "HH.mm",
				LTS: "HH.mm.ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY [pukul] HH.mm",
				LLLL: "dddd, D MMMM YYYY [pukul] HH.mm"
			},
			meridiemParse: /pagi|tengahari|petang|malam/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "pagi" === t ? e : "tengahari" === t ? e >= 11 ? e : e + 12 : "petang" === t || "malam" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 11 ? "pagi" : e < 15 ? "tengahari" : e < 19 ? "petang" : "malam"
			},
			calendar: {
				sameDay: "[Hari ini pukul] LT",
				nextDay: "[Esok pukul] LT",
				nextWeek: "dddd [pukul] LT",
				lastDay: "[Kelmarin pukul] LT",
				lastWeek: "dddd [lepas pukul] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "dalam %s",
				past: "%s yang lepas",
				s: "beberapa saat",
				m: "seminit",
				mm: "%d minit",
				h: "sejam",
				hh: "%d jam",
				d: "sehari",
				dd: "%d hari",
				M: "sebulan",
				MM: "%d bulan",
				y: "setahun",
				yy: "%d tahun"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("ms", {
			months: "Januari_Februari_Mac_April_Mei_Jun_Julai_Ogos_September_Oktober_November_Disember".split("_"),
			monthsShort: "Jan_Feb_Mac_Apr_Mei_Jun_Jul_Ogs_Sep_Okt_Nov_Dis".split("_"),
			weekdays: "Ahad_Isnin_Selasa_Rabu_Khamis_Jumaat_Sabtu".split("_"),
			weekdaysShort: "Ahd_Isn_Sel_Rab_Kha_Jum_Sab".split("_"),
			weekdaysMin: "Ah_Is_Sl_Rb_Km_Jm_Sb".split("_"),
			longDateFormat: {
				LT: "HH.mm",
				LTS: "HH.mm.ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY [pukul] HH.mm",
				LLLL: "dddd, D MMMM YYYY [pukul] HH.mm"
			},
			meridiemParse: /pagi|tengahari|petang|malam/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "pagi" === t ? e : "tengahari" === t ? e >= 11 ? e : e + 12 : "petang" === t || "malam" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 11 ? "pagi" : e < 15 ? "tengahari" : e < 19 ? "petang" : "malam"
			},
			calendar: {
				sameDay: "[Hari ini pukul] LT",
				nextDay: "[Esok pukul] LT",
				nextWeek: "dddd [pukul] LT",
				lastDay: "[Kelmarin pukul] LT",
				lastWeek: "dddd [lepas pukul] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "dalam %s",
				past: "%s yang lepas",
				s: "beberapa saat",
				m: "seminit",
				mm: "%d minit",
				h: "sejam",
				hh: "%d jam",
				d: "sehari",
				dd: "%d hari",
				M: "sebulan",
				MM: "%d bulan",
				y: "setahun",
				yy: "%d tahun"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), {
			1: "၁",
			2: "၂",
			3: "၃",
			4: "၄",
			5: "၅",
			6: "၆",
			7: "၇",
			8: "၈",
			9: "၉",
			0: "၀"
		}),
		Ro = {
			"၁": "1",
			"၂": "2",
			"၃": "3",
			"၄": "4",
			"၅": "5",
			"၆": "6",
			"၇": "7",
			"၈": "8",
			"၉": "9",
			"၀": "0"
		},
		zo = (to.defineLocale("my", {
			months: "ဇန်နဝါရီ_ဖေဖော်ဝါရီ_မတ်_ဧပြီ_မေ_ဇွန်_ဇူလိုင်_သြဂုတ်_စက်တင်ဘာ_အောက်တိုဘာ_နိုဝင်ဘာ_ဒီဇင်ဘာ".split("_"),
			monthsShort: "ဇန်_ဖေ_မတ်_ပြီ_မေ_ဇွန်_လိုင်_သြ_စက်_အောက်_နို_ဒီ".split("_"),
			weekdays: "တနင်္ဂနွေ_တနင်္လာ_အင်္ဂါ_ဗုဒ္ဓဟူး_ကြာသပတေး_သောကြာ_စနေ".split("_"),
			weekdaysShort: "နွေ_လာ_ဂါ_ဟူး_ကြာ_သော_နေ".split("_"),
			weekdaysMin: "နွေ_လာ_ဂါ_ဟူး_ကြာ_သော_နေ".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[ယနေ.] LT [မှာ]",
				nextDay: "[မနက်ဖြန်] LT [မှာ]",
				nextWeek: "dddd LT [မှာ]",
				lastDay: "[မနေ.က] LT [မှာ]",
				lastWeek: "[ပြီးခဲ့သော] dddd LT [မှာ]",
				sameElse: "L"
			},
			relativeTime: {
				future: "လာမည့် %s မှာ",
				past: "လွန်ခဲ့သော %s က",
				s: "စက္ကန်.အနည်းငယ်",
				m: "တစ်မိနစ်",
				mm: "%d မိနစ်",
				h: "တစ်နာရီ",
				hh: "%d နာရီ",
				d: "တစ်ရက်",
				dd: "%d ရက်",
				M: "တစ်လ",
				MM: "%d လ",
				y: "တစ်နှစ်",
				yy: "%d နှစ်"
			},
			preparse: function(e) {
				return e.replace(/[၁၂၃၄၅၆၇၈၉၀]/g, function(e) {
					return Ro[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return Wo[e]
				})
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("nb", {
			months: "januar_februar_mars_april_mai_juni_juli_august_september_oktober_november_desember".split("_"),
			monthsShort: "jan._feb._mars_april_mai_juni_juli_aug._sep._okt._nov._des.".split("_"),
			monthsParseExact: !0,
			weekdays: "søndag_mandag_tirsdag_onsdag_torsdag_fredag_lørdag".split("_"),
			weekdaysShort: "sø._ma._ti._on._to._fr._lø.".split("_"),
			weekdaysMin: "sø_ma_ti_on_to_fr_lø".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY [kl.] HH:mm",
				LLLL: "dddd D. MMMM YYYY [kl.] HH:mm"
			},
			calendar: {
				sameDay: "[i dag kl.] LT",
				nextDay: "[i morgen kl.] LT",
				nextWeek: "dddd [kl.] LT",
				lastDay: "[i går kl.] LT",
				lastWeek: "[forrige] dddd [kl.] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "om %s",
				past: "%s siden",
				s: "noen sekunder",
				m: "ett minutt",
				mm: "%d minutter",
				h: "en time",
				hh: "%d timer",
				d: "en dag",
				dd: "%d dager",
				M: "en måned",
				MM: "%d måneder",
				y: "ett år",
				yy: "%d år"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), {
			1: "१",
			2: "२",
			3: "३",
			4: "४",
			5: "५",
			6: "६",
			7: "७",
			8: "८",
			9: "९",
			0: "०"
		}),
		qo = {
			"१": "1",
			"२": "2",
			"३": "3",
			"४": "4",
			"५": "5",
			"६": "6",
			"७": "7",
			"८": "8",
			"९": "9",
			"०": "0"
		},
		Jo = (to.defineLocale("ne", {
			months: "जनवरी_फेब्रुवरी_मार्च_अप्रिल_मई_जुन_जुलाई_अगष्ट_सेप्टेम्बर_अक्टोबर_नोभेम्बर_डिसेम्बर".split("_"),
			monthsShort: "जन._फेब्रु._मार्च_अप्रि._मई_जुन_जुलाई._अग._सेप्ट._अक्टो._नोभे._डिसे.".split("_"),
			monthsParseExact: !0,
			weekdays: "आइतबार_सोमबार_मङ्गलबार_बुधबार_बिहिबार_शुक्रबार_शनिबार".split("_"),
			weekdaysShort: "आइत._सोम._मङ्गल._बुध._बिहि._शुक्र._शनि.".split("_"),
			weekdaysMin: "आ._सो._मं._बु._बि._शु._श.".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "Aको h:mm बजे",
				LTS: "Aको h:mm:ss बजे",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, Aको h:mm बजे",
				LLLL: "dddd, D MMMM YYYY, Aको h:mm बजे"
			},
			preparse: function(e) {
				return e.replace(/[१२३४५६७८९०]/g, function(e) {
					return qo[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return zo[e]
				})
			},
			meridiemParse: /राति|बिहान|दिउँसो|साँझ/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "राति" === t ? e < 4 ? e : e + 12 : "बिहान" === t ? e : "दिउँसो" === t ? e >= 10 ? e : e + 12 : "साँझ" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 3 ? "राति" : e < 12 ? "बिहान" : e < 16 ? "दिउँसो" : e < 20 ? "साँझ" : "राति"
			},
			calendar: {
				sameDay: "[आज] LT",
				nextDay: "[भोलि] LT",
				nextWeek: "[आउँदो] dddd[,] LT",
				lastDay: "[हिजो] LT",
				lastWeek: "[गएको] dddd[,] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%sमा",
				past: "%s अगाडि",
				s: "केही क्षण",
				m: "एक मिनेट",
				mm: "%d मिनेट",
				h: "एक घण्टा",
				hh: "%d घण्टा",
				d: "एक दिन",
				dd: "%d दिन",
				M: "एक महिना",
				MM: "%d महिना",
				y: "एक बर्ष",
				yy: "%d बर्ष"
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), "jan._feb._mrt._apr._mei_jun._jul._aug._sep._okt._nov._dec.".split("_")),
		Vo = "jan_feb_mrt_apr_mei_jun_jul_aug_sep_okt_nov_dec".split("_"),
		Go = (to.defineLocale("nl", {
			months: "januari_februari_maart_april_mei_juni_juli_augustus_september_oktober_november_december".split("_"),
			monthsShort: function(e, t) {
				return /-MMM-/.test(t) ? Vo[e.month()] : Jo[e.month()]
			},
			monthsParseExact: !0,
			weekdays: "zondag_maandag_dinsdag_woensdag_donderdag_vrijdag_zaterdag".split("_"),
			weekdaysShort: "zo._ma._di._wo._do._vr._za.".split("_"),
			weekdaysMin: "Zo_Ma_Di_Wo_Do_Vr_Za".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD-MM-YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[vandaag om] LT",
				nextDay: "[morgen om] LT",
				nextWeek: "dddd [om] LT",
				lastDay: "[gisteren om] LT",
				lastWeek: "[afgelopen] dddd [om] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "over %s",
				past: "%s geleden",
				s: "een paar seconden",
				m: "één minuut",
				mm: "%d minuten",
				h: "één uur",
				hh: "%d uur",
				d: "één dag",
				dd: "%d dagen",
				M: "één maand",
				MM: "%d maanden",
				y: "één jaar",
				yy: "%d jaar"
			},
			ordinalParse: /\d{1,2}(ste|de)/,
			ordinal: function(e) {
				return e + (1 === e || 8 === e || e >= 20 ? "ste" : "de")
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("nn", {
			months: "januar_februar_mars_april_mai_juni_juli_august_september_oktober_november_desember".split("_"),
			monthsShort: "jan_feb_mar_apr_mai_jun_jul_aug_sep_okt_nov_des".split("_"),
			weekdays: "sundag_måndag_tysdag_onsdag_torsdag_fredag_laurdag".split("_"),
			weekdaysShort: "sun_mån_tys_ons_tor_fre_lau".split("_"),
			weekdaysMin: "su_må_ty_on_to_fr_lø".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY [kl.] H:mm",
				LLLL: "dddd D. MMMM YYYY [kl.] HH:mm"
			},
			calendar: {
				sameDay: "[I dag klokka] LT",
				nextDay: "[I morgon klokka] LT",
				nextWeek: "dddd [klokka] LT",
				lastDay: "[I går klokka] LT",
				lastWeek: "[Føregåande] dddd [klokka] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "om %s",
				past: "%s sidan",
				s: "nokre sekund",
				m: "eit minutt",
				mm: "%d minutt",
				h: "ein time",
				hh: "%d timar",
				d: "ein dag",
				dd: "%d dagar",
				M: "ein månad",
				MM: "%d månader",
				y: "eit år",
				yy: "%d år"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), {
			1: "੧",
			2: "੨",
			3: "੩",
			4: "੪",
			5: "੫",
			6: "੬",
			7: "੭",
			8: "੮",
			9: "੯",
			0: "੦"
		}),
		Ko = {
			"੧": "1",
			"੨": "2",
			"੩": "3",
			"੪": "4",
			"੫": "5",
			"੬": "6",
			"੭": "7",
			"੮": "8",
			"੯": "9",
			"੦": "0"
		},
		Xo = (to.defineLocale("pa-in", {
			months: "ਜਨਵਰੀ_ਫ਼ਰਵਰੀ_ਮਾਰਚ_ਅਪ੍ਰੈਲ_ਮਈ_ਜੂਨ_ਜੁਲਾਈ_ਅਗਸਤ_ਸਤੰਬਰ_ਅਕਤੂਬਰ_ਨਵੰਬਰ_ਦਸੰਬਰ".split("_"),
			monthsShort: "ਜਨਵਰੀ_ਫ਼ਰਵਰੀ_ਮਾਰਚ_ਅਪ੍ਰੈਲ_ਮਈ_ਜੂਨ_ਜੁਲਾਈ_ਅਗਸਤ_ਸਤੰਬਰ_ਅਕਤੂਬਰ_ਨਵੰਬਰ_ਦਸੰਬਰ".split("_"),
			weekdays: "ਐਤਵਾਰ_ਸੋਮਵਾਰ_ਮੰਗਲਵਾਰ_ਬੁਧਵਾਰ_ਵੀਰਵਾਰ_ਸ਼ੁੱਕਰਵਾਰ_ਸ਼ਨੀਚਰਵਾਰ".split("_"),
			weekdaysShort: "ਐਤ_ਸੋਮ_ਮੰਗਲ_ਬੁਧ_ਵੀਰ_ਸ਼ੁਕਰ_ਸ਼ਨੀ".split("_"),
			weekdaysMin: "ਐਤ_ਸੋਮ_ਮੰਗਲ_ਬੁਧ_ਵੀਰ_ਸ਼ੁਕਰ_ਸ਼ਨੀ".split("_"),
			longDateFormat: {
				LT: "A h:mm ਵਜੇ",
				LTS: "A h:mm:ss ਵਜੇ",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, A h:mm ਵਜੇ",
				LLLL: "dddd, D MMMM YYYY, A h:mm ਵਜੇ"
			},
			calendar: {
				sameDay: "[ਅਜ] LT",
				nextDay: "[ਕਲ] LT",
				nextWeek: "dddd, LT",
				lastDay: "[ਕਲ] LT",
				lastWeek: "[ਪਿਛਲੇ] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s ਵਿੱਚ",
				past: "%s ਪਿਛਲੇ",
				s: "ਕੁਝ ਸਕਿੰਟ",
				m: "ਇਕ ਮਿੰਟ",
				mm: "%d ਮਿੰਟ",
				h: "ਇੱਕ ਘੰਟਾ",
				hh: "%d ਘੰਟੇ",
				d: "ਇੱਕ ਦਿਨ",
				dd: "%d ਦਿਨ",
				M: "ਇੱਕ ਮਹੀਨਾ",
				MM: "%d ਮਹੀਨੇ",
				y: "ਇੱਕ ਸਾਲ",
				yy: "%d ਸਾਲ"
			},
			preparse: function(e) {
				return e.replace(/[੧੨੩੪੫੬੭੮੯੦]/g, function(e) {
					return Ko[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return Go[e]
				})
			},
			meridiemParse: /ਰਾਤ|ਸਵੇਰ|ਦੁਪਹਿਰ|ਸ਼ਾਮ/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "ਰਾਤ" === t ? e < 4 ? e : e + 12 : "ਸਵੇਰ" === t ? e : "ਦੁਪਹਿਰ" === t ? e >= 10 ? e : e + 12 : "ਸ਼ਾਮ" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "ਰਾਤ" : e < 10 ? "ਸਵੇਰ" : e < 17 ? "ਦੁਪਹਿਰ" : e < 20 ? "ਸ਼ਾਮ" : "ਰਾਤ"
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), "styczeń_luty_marzec_kwiecień_maj_czerwiec_lipiec_sierpień_wrzesień_październik_listopad_grudzień".split("_")),
		Qo = "stycznia_lutego_marca_kwietnia_maja_czerwca_lipca_sierpnia_września_października_listopada_grudnia".split("_"),
		Zo = (to.defineLocale("pl", {
			months: function(e, t) {
				return "" === t ? "(" + Qo[e.month()] + "|" + Xo[e.month()] + ")" : /D MMMM/.test(t) ? Qo[e.month()] : Xo[e.month()]
			},
			monthsShort: "sty_lut_mar_kwi_maj_cze_lip_sie_wrz_paź_lis_gru".split("_"),
			weekdays: "niedziela_poniedziałek_wtorek_środa_czwartek_piątek_sobota".split("_"),
			weekdaysShort: "nie_pon_wt_śr_czw_pt_sb".split("_"),
			weekdaysMin: "Nd_Pn_Wt_Śr_Cz_Pt_So".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Dziś o] LT",
				nextDay: "[Jutro o] LT",
				nextWeek: "[W] dddd [o] LT",
				lastDay: "[Wczoraj o] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
						return "[W zeszłą niedzielę o] LT";
					case 3:
						return "[W zeszłą środę o] LT";
					case 6:
						return "[W zeszłą sobotę o] LT";
					default:
						return "[W zeszły] dddd [o] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "za %s",
				past: "%s temu",
				s: "kilka sekund",
				m: Ir,
				mm: Ir,
				h: Ir,
				hh: Ir,
				d: "1 dzień",
				dd: "%d dni",
				M: "miesiąc",
				MM: Ir,
				y: "rok",
				yy: Ir
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("pt-br", {
			months: "Janeiro_Fevereiro_Março_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro".split("_"),
			monthsShort: "Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez".split("_"),
			weekdays: "Domingo_Segunda-feira_Terça-feira_Quarta-feira_Quinta-feira_Sexta-feira_Sábado".split("_"),
			weekdaysShort: "Dom_Seg_Ter_Qua_Qui_Sex_Sáb".split("_"),
			weekdaysMin: "Dom_2ª_3ª_4ª_5ª_6ª_Sáb".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D [de] MMMM [de] YYYY",
				LLL: "D [de] MMMM [de] YYYY [às] HH:mm",
				LLLL: "dddd, D [de] MMMM [de] YYYY [às] HH:mm"
			},
			calendar: {
				sameDay: "[Hoje às] LT",
				nextDay: "[Amanhã às] LT",
				nextWeek: "dddd [às] LT",
				lastDay: "[Ontem às] LT",
				lastWeek: function() {
					return 0 === this.day() || 6 === this.day() ? "[Último] dddd [às] LT" : "[Última] dddd [às] LT"
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "em %s",
				past: "%s atrás",
				s: "poucos segundos",
				m: "um minuto",
				mm: "%d minutos",
				h: "uma hora",
				hh: "%d horas",
				d: "um dia",
				dd: "%d dias",
				M: "um mês",
				MM: "%d meses",
				y: "um ano",
				yy: "%d anos"
			},
			ordinalParse: /\d{1,2}º/,
			ordinal: "%dº"
		}), to.defineLocale("pt", {
			months: "Janeiro_Fevereiro_Março_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro".split("_"),
			monthsShort: "Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez".split("_"),
			weekdays: "Domingo_Segunda-Feira_Terça-Feira_Quarta-Feira_Quinta-Feira_Sexta-Feira_Sábado".split("_"),
			weekdaysShort: "Dom_Seg_Ter_Qua_Qui_Sex_Sáb".split("_"),
			weekdaysMin: "Dom_2ª_3ª_4ª_5ª_6ª_Sáb".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D [de] MMMM [de] YYYY",
				LLL: "D [de] MMMM [de] YYYY HH:mm",
				LLLL: "dddd, D [de] MMMM [de] YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Hoje às] LT",
				nextDay: "[Amanhã às] LT",
				nextWeek: "dddd [às] LT",
				lastDay: "[Ontem às] LT",
				lastWeek: function() {
					return 0 === this.day() || 6 === this.day() ? "[Último] dddd [às] LT" : "[Última] dddd [às] LT"
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "em %s",
				past: "há %s",
				s: "segundos",
				m: "um minuto",
				mm: "%d minutos",
				h: "uma hora",
				hh: "%d horas",
				d: "um dia",
				dd: "%d dias",
				M: "um mês",
				MM: "%d meses",
				y: "um ano",
				yy: "%d anos"
			},
			ordinalParse: /\d{1,2}º/,
			ordinal: "%dº",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("ro", {
			months: "ianuarie_februarie_martie_aprilie_mai_iunie_iulie_august_septembrie_octombrie_noiembrie_decembrie".split("_"),
			monthsShort: "ian._febr._mart._apr._mai_iun._iul._aug._sept._oct._nov._dec.".split("_"),
			monthsParseExact: !0,
			weekdays: "duminică_luni_marți_miercuri_joi_vineri_sâmbătă".split("_"),
			weekdaysShort: "Dum_Lun_Mar_Mie_Joi_Vin_Sâm".split("_"),
			weekdaysMin: "Du_Lu_Ma_Mi_Jo_Vi_Sâ".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY H:mm",
				LLLL: "dddd, D MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[azi la] LT",
				nextDay: "[mâine la] LT",
				nextWeek: "dddd [la] LT",
				lastDay: "[ieri la] LT",
				lastWeek: "[fosta] dddd [la] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "peste %s",
				past: "%s în urmă",
				s: "câteva secunde",
				m: "un minut",
				mm: Nr,
				h: "o oră",
				hh: Nr,
				d: "o zi",
				dd: Nr,
				M: "o lună",
				MM: Nr,
				y: "un an",
				yy: Nr
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), [/^янв/i, /^фев/i, /^мар/i, /^апр/i, /^ма[йя]/i, /^июн/i, /^июл/i, /^авг/i, /^сен/i, /^окт/i, /^ноя/i, /^дек/i]),
		es = (to.defineLocale("ru", {
			months: {
				format: "января_февраля_марта_апреля_мая_июня_июля_августа_сентября_октября_ноября_декабря".split("_"),
				standalone: "январь_февраль_март_апрель_май_июнь_июль_август_сентябрь_октябрь_ноябрь_декабрь".split("_")
			},
			monthsShort: {
				format: "янв._февр._мар._апр._мая_июня_июля_авг._сент._окт._нояб._дек.".split("_"),
				standalone: "янв._февр._март_апр._май_июнь_июль_авг._сент._окт._нояб._дек.".split("_")
			},
			weekdays: {
				standalone: "воскресенье_понедельник_вторник_среда_четверг_пятница_суббота".split("_"),
				format: "воскресенье_понедельник_вторник_среду_четверг_пятницу_субботу".split("_"),
				isFormat: /\[ ?[Вв] ?(?:прошлую|следующую|эту)? ?\] ?dddd/
			},
			weekdaysShort: "вс_пн_вт_ср_чт_пт_сб".split("_"),
			weekdaysMin: "вс_пн_вт_ср_чт_пт_сб".split("_"),
			monthsParse: Zo,
			longMonthsParse: Zo,
			shortMonthsParse: Zo,
			monthsRegex: /^(сентябр[яь]|октябр[яь]|декабр[яь]|феврал[яь]|январ[яь]|апрел[яь]|августа?|ноябр[яь]|сент\.|февр\.|нояб\.|июнь|янв.|июль|дек.|авг.|апр.|марта|мар[.т]|окт.|июн[яь]|июл[яь]|ма[яй])/i,
			monthsShortRegex: /^(сентябр[яь]|октябр[яь]|декабр[яь]|феврал[яь]|январ[яь]|апрел[яь]|августа?|ноябр[яь]|сент\.|февр\.|нояб\.|июнь|янв.|июль|дек.|авг.|апр.|марта|мар[.т]|окт.|июн[яь]|июл[яь]|ма[яй])/i,
			monthsStrictRegex: /^(сентябр[яь]|октябр[яь]|декабр[яь]|феврал[яь]|январ[яь]|апрел[яь]|августа?|ноябр[яь]|марта?|июн[яь]|июл[яь]|ма[яй])/i,
			monthsShortStrictRegex: /^(нояб\.|февр\.|сент\.|июль|янв\.|июн[яь]|мар[.т]|авг\.|апр\.|окт\.|дек\.|ма[яй])/i,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY г.",
				LLL: "D MMMM YYYY г., HH:mm",
				LLLL: "dddd, D MMMM YYYY г., HH:mm"
			},
			calendar: {
				sameDay: "[Сегодня в] LT",
				nextDay: "[Завтра в] LT",
				lastDay: "[Вчера в] LT",
				nextWeek: function(e) {
					if (e.week() === this.week()) return 2 === this.day() ? "[Во] dddd [в] LT" : "[В] dddd [в] LT";
					switch (this.day()) {
					case 0:
						return "[В следующее] dddd [в] LT";
					case 1:
					case 2:
					case 4:
						return "[В следующий] dddd [в] LT";
					case 3:
					case 5:
					case 6:
						return "[В следующую] dddd [в] LT"
					}
				},
				lastWeek: function(e) {
					if (e.week() === this.week()) return 2 === this.day() ? "[Во] dddd [в] LT" : "[В] dddd [в] LT";
					switch (this.day()) {
					case 0:
						return "[В прошлое] dddd [в] LT";
					case 1:
					case 2:
					case 4:
						return "[В прошлый] dddd [в] LT";
					case 3:
					case 5:
					case 6:
						return "[В прошлую] dddd [в] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "через %s",
				past: "%s назад",
				s: "несколько секунд",
				m: Rr,
				mm: Rr,
				h: "час",
				hh: Rr,
				d: "день",
				dd: Rr,
				M: "месяц",
				MM: Rr,
				y: "год",
				yy: Rr
			},
			meridiemParse: /ночи|утра|дня|вечера/i,
			isPM: function(e) {
				return /^(дня|вечера)$/.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "ночи" : e < 12 ? "утра" : e < 17 ? "дня" : "вечера"
			},
			ordinalParse: /\d{1,2}-(й|го|я)/,
			ordinal: function(e, t) {
				switch (t) {
				case "M":
				case "d":
				case "DDD":
					return e + "-й";
				case "D":
					return e + "-го";
				case "w":
				case "W":
					return e + "-я";
				default:
					return e
				}
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("se", {
			months: "ođđajagemánnu_guovvamánnu_njukčamánnu_cuoŋománnu_miessemánnu_geassemánnu_suoidnemánnu_borgemánnu_čakčamánnu_golggotmánnu_skábmamánnu_juovlamánnu".split("_"),
			monthsShort: "ođđj_guov_njuk_cuo_mies_geas_suoi_borg_čakč_golg_skáb_juov".split("_"),
			weekdays: "sotnabeaivi_vuossárga_maŋŋebárga_gaskavahkku_duorastat_bearjadat_lávvardat".split("_"),
			weekdaysShort: "sotn_vuos_maŋ_gask_duor_bear_láv".split("_"),
			weekdaysMin: "s_v_m_g_d_b_L".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "MMMM D. [b.] YYYY",
				LLL: "MMMM D. [b.] YYYY [ti.] HH:mm",
				LLLL: "dddd, MMMM D. [b.] YYYY [ti.] HH:mm"
			},
			calendar: {
				sameDay: "[otne ti] LT",
				nextDay: "[ihttin ti] LT",
				nextWeek: "dddd [ti] LT",
				lastDay: "[ikte ti] LT",
				lastWeek: "[ovddit] dddd [ti] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s geažes",
				past: "maŋit %s",
				s: "moadde sekunddat",
				m: "okta minuhta",
				mm: "%d minuhtat",
				h: "okta diimmu",
				hh: "%d diimmut",
				d: "okta beaivi",
				dd: "%d beaivvit",
				M: "okta mánnu",
				MM: "%d mánut",
				y: "okta jahki",
				yy: "%d jagit"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("si", {
			months: "ජනවාරි_පෙබරවාරි_මාර්තු_අප්‍රේල්_මැයි_ජූනි_ජූලි_අගෝස්තු_සැප්තැම්බර්_ඔක්තෝබර්_නොවැම්බර්_දෙසැම්බර්".split("_"),
			monthsShort: "ජන_පෙබ_මාර්_අප්_මැයි_ජූනි_ජූලි_අගෝ_සැප්_ඔක්_නොවැ_දෙසැ".split("_"),
			weekdays: "ඉරිදා_සඳුදා_අඟහරුවාදා_බදාදා_බ්‍රහස්පතින්දා_සිකුරාදා_සෙනසුරාදා".split("_"),
			weekdaysShort: "ඉරි_සඳු_අඟ_බදා_බ්‍රහ_සිකු_සෙන".split("_"),
			weekdaysMin: "ඉ_ස_අ_බ_බ්‍ර_සි_සෙ".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "a h:mm",
				LTS: "a h:mm:ss",
				L: "YYYY/MM/DD",
				LL: "YYYY MMMM D",
				LLL: "YYYY MMMM D, a h:mm",
				LLLL: "YYYY MMMM D [වැනි] dddd, a h:mm:ss"
			},
			calendar: {
				sameDay: "[අද] LT[ට]",
				nextDay: "[හෙට] LT[ට]",
				nextWeek: "dddd LT[ට]",
				lastDay: "[ඊයේ] LT[ට]",
				lastWeek: "[පසුගිය] dddd LT[ට]",
				sameElse: "L"
			},
			relativeTime: {
				future: "%sකින්",
				past: "%sකට පෙර",
				s: "තත්පර කිහිපය",
				m: "මිනිත්තුව",
				mm: "මිනිත්තු %d",
				h: "පැය",
				hh: "පැය %d",
				d: "දිනය",
				dd: "දින %d",
				M: "මාසය",
				MM: "මාස %d",
				y: "වසර",
				yy: "වසර %d"
			},
			ordinalParse: /\d{1,2} වැනි/,
			ordinal: function(e) {
				return e + " වැනි"
			},
			meridiemParse: /පෙර වරු|පස් වරු|පෙ.ව|ප.ව./,
			isPM: function(e) {
				return "ප.ව." === e || "පස් වරු" === e
			},
			meridiem: function(e, t, n) {
				return e > 11 ? n ? "ප.ව." : "පස් වරු" : n ? "පෙ.ව." : "පෙර වරු"
			}
		}), "január_február_marec_apríl_máj_jún_júl_august_september_október_november_december".split("_")),
		ts = "jan_feb_mar_apr_máj_jún_júl_aug_sep_okt_nov_dec".split("_"),
		ns = (to.defineLocale("sk", {
			months: es,
			monthsShort: ts,
			weekdays: "nedeľa_pondelok_utorok_streda_štvrtok_piatok_sobota".split("_"),
			weekdaysShort: "ne_po_ut_st_št_pi_so".split("_"),
			weekdaysMin: "ne_po_ut_st_št_pi_so".split("_"),
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[dnes o] LT",
				nextDay: "[zajtra o] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[v nedeľu o] LT";
					case 1:
					case 2:
						return "[v] dddd [o] LT";
					case 3:
						return "[v stredu o] LT";
					case 4:
						return "[vo štvrtok o] LT";
					case 5:
						return "[v piatok o] LT";
					case 6:
						return "[v sobotu o] LT"
					}
				},
				lastDay: "[včera o] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
						return "[minulú nedeľu o] LT";
					case 1:
					case 2:
						return "[minulý] dddd [o] LT";
					case 3:
						return "[minulú stredu o] LT";
					case 4:
					case 5:
						return "[minulý] dddd [o] LT";
					case 6:
						return "[minulú sobotu o] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "za %s",
				past: "pred %s",
				s: qr,
				m: qr,
				mm: qr,
				h: qr,
				hh: qr,
				d: qr,
				dd: qr,
				M: qr,
				MM: qr,
				y: qr,
				yy: qr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("sl", {
			months: "januar_februar_marec_april_maj_junij_julij_avgust_september_oktober_november_december".split("_"),
			monthsShort: "jan._feb._mar._apr._maj._jun._jul._avg._sep._okt._nov._dec.".split("_"),
			monthsParseExact: !0,
			weekdays: "nedelja_ponedeljek_torek_sreda_četrtek_petek_sobota".split("_"),
			weekdaysShort: "ned._pon._tor._sre._čet._pet._sob.".split("_"),
			weekdaysMin: "ne_po_to_sr_če_pe_so".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD. MM. YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd, D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[danes ob] LT",
				nextDay: "[jutri ob] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[v] [nedeljo] [ob] LT";
					case 3:
						return "[v] [sredo] [ob] LT";
					case 6:
						return "[v] [soboto] [ob] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[v] dddd [ob] LT"
					}
				},
				lastDay: "[včeraj ob] LT",
				lastWeek: function() {
					switch (this.day()) {
					case 0:
						return "[prejšnjo] [nedeljo] [ob] LT";
					case 3:
						return "[prejšnjo] [sredo] [ob] LT";
					case 6:
						return "[prejšnjo] [soboto] [ob] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[prejšnji] dddd [ob] LT"
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "čez %s",
				past: "pred %s",
				s: Jr,
				m: Jr,
				mm: Jr,
				h: Jr,
				hh: Jr,
				d: Jr,
				dd: Jr,
				M: Jr,
				MM: Jr,
				y: Jr,
				yy: Jr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("sq", {
			months: "Janar_Shkurt_Mars_Prill_Maj_Qershor_Korrik_Gusht_Shtator_Tetor_Nëntor_Dhjetor".split("_"),
			monthsShort: "Jan_Shk_Mar_Pri_Maj_Qer_Kor_Gus_Sht_Tet_Nën_Dhj".split("_"),
			weekdays: "E Diel_E Hënë_E Martë_E Mërkurë_E Enjte_E Premte_E Shtunë".split("_"),
			weekdaysShort: "Die_Hën_Mar_Mër_Enj_Pre_Sht".split("_"),
			weekdaysMin: "D_H_Ma_Më_E_P_Sh".split("_"),
			weekdaysParseExact: !0,
			meridiemParse: /PD|MD/,
			isPM: function(e) {
				return "M" === e.charAt(0)
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "PD" : "MD"
			},
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Sot në] LT",
				nextDay: "[Nesër në] LT",
				nextWeek: "dddd [në] LT",
				lastDay: "[Dje në] LT",
				lastWeek: "dddd [e kaluar në] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "në %s",
				past: "%s më parë",
				s: "disa sekonda",
				m: "një minutë",
				mm: "%d minuta",
				h: "një orë",
				hh: "%d orë",
				d: "një ditë",
				dd: "%d ditë",
				M: "një muaj",
				MM: "%d muaj",
				y: "një vit",
				yy: "%d vite"
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), {
			words: {
				m: ["један минут", "једне минуте"],
				mm: ["минут", "минуте", "минута"],
				h: ["један сат", "једног сата"],
				hh: ["сат", "сата", "сати"],
				dd: ["дан", "дана", "дана"],
				MM: ["месец", "месеца", "месеци"],
				yy: ["година", "године", "година"]
			},
			correctGrammaticalCase: function(e, t) {
				return 1 === e ? t[0] : e >= 2 && e <= 4 ? t[1] : t[2]
			},
			translate: function(e, t, n) {
				var r = ns.words[n];
				return 1 === n.length ? t ? r[0] : r[1] : e + " " + ns.correctGrammaticalCase(e, r)
			}
		}),
		rs = (to.defineLocale("sr-cyrl", {
			months: "јануар_фебруар_март_април_мај_јун_јул_август_септембар_октобар_новембар_децембар".split("_"),
			monthsShort: "јан._феб._мар._апр._мај_јун_јул_авг._сеп._окт._нов._дец.".split("_"),
			monthsParseExact: !0,
			weekdays: "недеља_понедељак_уторак_среда_четвртак_петак_субота".split("_"),
			weekdaysShort: "нед._пон._уто._сре._чет._пет._суб.".split("_"),
			weekdaysMin: "не_по_ут_ср_че_пе_су".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD. MM. YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd, D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[данас у] LT",
				nextDay: "[сутра у] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[у] [недељу] [у] LT";
					case 3:
						return "[у] [среду] [у] LT";
					case 6:
						return "[у] [суботу] [у] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[у] dddd [у] LT"
					}
				},
				lastDay: "[јуче у] LT",
				lastWeek: function() {
					var e = ["[прошле] [недеље] [у] LT", "[прошлог] [понедељка] [у] LT", "[прошлог] [уторка] [у] LT", "[прошле] [среде] [у] LT", "[прошлог] [четвртка] [у] LT", "[прошлог] [петка] [у] LT", "[прошле] [суботе] [у] LT"];
					return e[this.day()]
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "за %s",
				past: "пре %s",
				s: "неколико секунди",
				m: ns.translate,
				mm: ns.translate,
				h: ns.translate,
				hh: ns.translate,
				d: "дан",
				dd: ns.translate,
				M: "месец",
				MM: ns.translate,
				y: "годину",
				yy: ns.translate
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), {
			words: {
				m: ["jedan minut", "jedne minute"],
				mm: ["minut", "minute", "minuta"],
				h: ["jedan sat", "jednog sata"],
				hh: ["sat", "sata", "sati"],
				dd: ["dan", "dana", "dana"],
				MM: ["mesec", "meseca", "meseci"],
				yy: ["godina", "godine", "godina"]
			},
			correctGrammaticalCase: function(e, t) {
				return 1 === e ? t[0] : e >= 2 && e <= 4 ? t[1] : t[2]
			},
			translate: function(e, t, n) {
				var r = rs.words[n];
				return 1 === n.length ? t ? r[0] : r[1] : e + " " + rs.correctGrammaticalCase(e, r)
			}
		}),
		is = (to.defineLocale("sr", {
			months: "januar_februar_mart_april_maj_jun_jul_avgust_septembar_oktobar_novembar_decembar".split("_"),
			monthsShort: "jan._feb._mar._apr._maj_jun_jul_avg._sep._okt._nov._dec.".split("_"),
			monthsParseExact: !0,
			weekdays: "nedelja_ponedeljak_utorak_sreda_četvrtak_petak_subota".split("_"),
			weekdaysShort: "ned._pon._uto._sre._čet._pet._sub.".split("_"),
			weekdaysMin: "ne_po_ut_sr_če_pe_su".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H:mm",
				LTS: "H:mm:ss",
				L: "DD. MM. YYYY",
				LL: "D. MMMM YYYY",
				LLL: "D. MMMM YYYY H:mm",
				LLLL: "dddd, D. MMMM YYYY H:mm"
			},
			calendar: {
				sameDay: "[danas u] LT",
				nextDay: "[sutra u] LT",
				nextWeek: function() {
					switch (this.day()) {
					case 0:
						return "[u] [nedelju] [u] LT";
					case 3:
						return "[u] [sredu] [u] LT";
					case 6:
						return "[u] [subotu] [u] LT";
					case 1:
					case 2:
					case 4:
					case 5:
						return "[u] dddd [u] LT"
					}
				},
				lastDay: "[juče u] LT",
				lastWeek: function() {
					var e = ["[prošle] [nedelje] [u] LT", "[prošlog] [ponedeljka] [u] LT", "[prošlog] [utorka] [u] LT", "[prošle] [srede] [u] LT", "[prošlog] [četvrtka] [u] LT", "[prošlog] [petka] [u] LT", "[prošle] [subote] [u] LT"];
					return e[this.day()]
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "za %s",
				past: "pre %s",
				s: "nekoliko sekundi",
				m: rs.translate,
				mm: rs.translate,
				h: rs.translate,
				hh: rs.translate,
				d: "dan",
				dd: rs.translate,
				M: "mesec",
				MM: rs.translate,
				y: "godinu",
				yy: rs.translate
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("ss", {
			months: "Bhimbidvwane_Indlovana_Indlov'lenkhulu_Mabasa_Inkhwekhweti_Inhlaba_Kholwane_Ingci_Inyoni_Imphala_Lweti_Ingongoni".split("_"),
			monthsShort: "Bhi_Ina_Inu_Mab_Ink_Inh_Kho_Igc_Iny_Imp_Lwe_Igo".split("_"),
			weekdays: "Lisontfo_Umsombuluko_Lesibili_Lesitsatfu_Lesine_Lesihlanu_Umgcibelo".split("_"),
			weekdaysShort: "Lis_Umb_Lsb_Les_Lsi_Lsh_Umg".split("_"),
			weekdaysMin: "Li_Us_Lb_Lt_Ls_Lh_Ug".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "h:mm A",
				LTS: "h:mm:ss A",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY h:mm A",
				LLLL: "dddd, D MMMM YYYY h:mm A"
			},
			calendar: {
				sameDay: "[Namuhla nga] LT",
				nextDay: "[Kusasa nga] LT",
				nextWeek: "dddd [nga] LT",
				lastDay: "[Itolo nga] LT",
				lastWeek: "dddd [leliphelile] [nga] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "nga %s",
				past: "wenteka nga %s",
				s: "emizuzwana lomcane",
				m: "umzuzu",
				mm: "%d emizuzu",
				h: "lihora",
				hh: "%d emahora",
				d: "lilanga",
				dd: "%d emalanga",
				M: "inyanga",
				MM: "%d tinyanga",
				y: "umnyaka",
				yy: "%d iminyaka"
			},
			meridiemParse: /ekuseni|emini|entsambama|ebusuku/,
			meridiem: function(e, t, n) {
				return e < 11 ? "ekuseni" : e < 15 ? "emini" : e < 19 ? "entsambama" : "ebusuku"
			},
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "ekuseni" === t ? e : "emini" === t ? e >= 11 ? e : e + 12 : "entsambama" === t || "ebusuku" === t ? 0 === e ? 0 : e + 12 : void 0
			},
			ordinalParse: /\d{1,2}/,
			ordinal: "%d",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("sv", {
			months: "januari_februari_mars_april_maj_juni_juli_augusti_september_oktober_november_december".split("_"),
			monthsShort: "jan_feb_mar_apr_maj_jun_jul_aug_sep_okt_nov_dec".split("_"),
			weekdays: "söndag_måndag_tisdag_onsdag_torsdag_fredag_lördag".split("_"),
			weekdaysShort: "sön_mån_tis_ons_tor_fre_lör".split("_"),
			weekdaysMin: "sö_må_ti_on_to_fr_lö".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "YYYY-MM-DD",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY [kl.] HH:mm",
				LLLL: "dddd D MMMM YYYY [kl.] HH:mm",
				lll: "D MMM YYYY HH:mm",
				llll: "ddd D MMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Idag] LT",
				nextDay: "[Imorgon] LT",
				lastDay: "[Igår] LT",
				nextWeek: "[På] dddd LT",
				lastWeek: "[I] dddd[s] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "om %s",
				past: "för %s sedan",
				s: "några sekunder",
				m: "en minut",
				mm: "%d minuter",
				h: "en timme",
				hh: "%d timmar",
				d: "en dag",
				dd: "%d dagar",
				M: "en månad",
				MM: "%d månader",
				y: "ett år",
				yy: "%d år"
			},
			ordinalParse: /\d{1,2}(e|a)/,
			ordinal: function(e) {
				var t = e % 10,
					n = 1 === ~~ (e % 100 / 10) ? "e" : 1 === t ? "a" : 2 === t ? "a" : "e";
				return e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("sw", {
			months: "Januari_Februari_Machi_Aprili_Mei_Juni_Julai_Agosti_Septemba_Oktoba_Novemba_Desemba".split("_"),
			monthsShort: "Jan_Feb_Mac_Apr_Mei_Jun_Jul_Ago_Sep_Okt_Nov_Des".split("_"),
			weekdays: "Jumapili_Jumatatu_Jumanne_Jumatano_Alhamisi_Ijumaa_Jumamosi".split("_"),
			weekdaysShort: "Jpl_Jtat_Jnne_Jtan_Alh_Ijm_Jmos".split("_"),
			weekdaysMin: "J2_J3_J4_J5_Al_Ij_J1".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[leo saa] LT",
				nextDay: "[kesho saa] LT",
				nextWeek: "[wiki ijayo] dddd [saat] LT",
				lastDay: "[jana] LT",
				lastWeek: "[wiki iliyopita] dddd [saat] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s baadaye",
				past: "tokea %s",
				s: "hivi punde",
				m: "dakika moja",
				mm: "dakika %d",
				h: "saa limoja",
				hh: "masaa %d",
				d: "siku moja",
				dd: "masiku %d",
				M: "mwezi mmoja",
				MM: "miezi %d",
				y: "mwaka mmoja",
				yy: "miaka %d"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), {
			1: "௧",
			2: "௨",
			3: "௩",
			4: "௪",
			5: "௫",
			6: "௬",
			7: "௭",
			8: "௮",
			9: "௯",
			0: "௦"
		}),
		as = {
			"௧": "1",
			"௨": "2",
			"௩": "3",
			"௪": "4",
			"௫": "5",
			"௬": "6",
			"௭": "7",
			"௮": "8",
			"௯": "9",
			"௦": "0"
		},
		os = (to.defineLocale("ta", {
			months: "ஜனவரி_பிப்ரவரி_மார்ச்_ஏப்ரல்_மே_ஜூன்_ஜூலை_ஆகஸ்ட்_செப்டெம்பர்_அக்டோபர்_நவம்பர்_டிசம்பர்".split("_"),
			monthsShort: "ஜனவரி_பிப்ரவரி_மார்ச்_ஏப்ரல்_மே_ஜூன்_ஜூலை_ஆகஸ்ட்_செப்டெம்பர்_அக்டோபர்_நவம்பர்_டிசம்பர்".split("_"),
			weekdays: "ஞாயிற்றுக்கிழமை_திங்கட்கிழமை_செவ்வாய்கிழமை_புதன்கிழமை_வியாழக்கிழமை_வெள்ளிக்கிழமை_சனிக்கிழமை".split("_"),
			weekdaysShort: "ஞாயிறு_திங்கள்_செவ்வாய்_புதன்_வியாழன்_வெள்ளி_சனி".split("_"),
			weekdaysMin: "ஞா_தி_செ_பு_வி_வெ_ச".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, HH:mm",
				LLLL: "dddd, D MMMM YYYY, HH:mm"
			},
			calendar: {
				sameDay: "[இன்று] LT",
				nextDay: "[நாளை] LT",
				nextWeek: "dddd, LT",
				lastDay: "[நேற்று] LT",
				lastWeek: "[கடந்த வாரம்] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s இல்",
				past: "%s முன்",
				s: "ஒரு சில விநாடிகள்",
				m: "ஒரு நிமிடம்",
				mm: "%d நிமிடங்கள்",
				h: "ஒரு மணி நேரம்",
				hh: "%d மணி நேரம்",
				d: "ஒரு நாள்",
				dd: "%d நாட்கள்",
				M: "ஒரு மாதம்",
				MM: "%d மாதங்கள்",
				y: "ஒரு வருடம்",
				yy: "%d ஆண்டுகள்"
			},
			ordinalParse: /\d{1,2}வது/,
			ordinal: function(e) {
				return e + "வது"
			},
			preparse: function(e) {
				return e.replace(/[௧௨௩௪௫௬௭௮௯௦]/g, function(e) {
					return as[e]
				})
			},
			postformat: function(e) {
				return e.replace(/\d/g, function(e) {
					return is[e]
				})
			},
			meridiemParse: /யாமம்|வைகறை|காலை|நண்பகல்|எற்பாடு|மாலை/,
			meridiem: function(e, t, n) {
				return e < 2 ? " யாமம்" : e < 6 ? " வைகறை" : e < 10 ? " காலை" : e < 14 ? " நண்பகல்" : e < 18 ? " எற்பாடு" : e < 22 ? " மாலை" : " யாமம்"
			},
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "யாமம்" === t ? e < 2 ? e : e + 12 : "வைகறை" === t || "காலை" === t ? e : "நண்பகல்" === t && e >= 10 ? e : e + 12
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), to.defineLocale("te", {
			months: "జనవరి_ఫిబ్రవరి_మార్చి_ఏప్రిల్_మే_జూన్_జూలై_ఆగస్టు_సెప్టెంబర్_అక్టోబర్_నవంబర్_డిసెంబర్".split("_"),
			monthsShort: "జన._ఫిబ్ర._మార్చి_ఏప్రి._మే_జూన్_జూలై_ఆగ._సెప్._అక్టో._నవ._డిసె.".split("_"),
			monthsParseExact: !0,
			weekdays: "ఆదివారం_సోమవారం_మంగళవారం_బుధవారం_గురువారం_శుక్రవారం_శనివారం".split("_"),
			weekdaysShort: "ఆది_సోమ_మంగళ_బుధ_గురు_శుక్ర_శని".split("_"),
			weekdaysMin: "ఆ_సో_మం_బు_గు_శు_శ".split("_"),
			longDateFormat: {
				LT: "A h:mm",
				LTS: "A h:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY, A h:mm",
				LLLL: "dddd, D MMMM YYYY, A h:mm"
			},
			calendar: {
				sameDay: "[నేడు] LT",
				nextDay: "[రేపు] LT",
				nextWeek: "dddd, LT",
				lastDay: "[నిన్న] LT",
				lastWeek: "[గత] dddd, LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s లో",
				past: "%s క్రితం",
				s: "కొన్ని క్షణాలు",
				m: "ఒక నిమిషం",
				mm: "%d నిమిషాలు",
				h: "ఒక గంట",
				hh: "%d గంటలు",
				d: "ఒక రోజు",
				dd: "%d రోజులు",
				M: "ఒక నెల",
				MM: "%d నెలలు",
				y: "ఒక సంవత్సరం",
				yy: "%d సంవత్సరాలు"
			},
			ordinalParse: /\d{1,2}వ/,
			ordinal: "%dవ",
			meridiemParse: /రాత్రి|ఉదయం|మధ్యాహ్నం|సాయంత్రం/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "రాత్రి" === t ? e < 4 ? e : e + 12 : "ఉదయం" === t ? e : "మధ్యాహ్నం" === t ? e >= 10 ? e : e + 12 : "సాయంత్రం" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "రాత్రి" : e < 10 ? "ఉదయం" : e < 17 ? "మధ్యాహ్నం" : e < 20 ? "సాయంత్రం" : "రాత్రి"
			},
			week: {
				dow: 0,
				doy: 6
			}
		}), to.defineLocale("th", {
			months: "มกราคม_กุมภาพันธ์_มีนาคม_เมษายน_พฤษภาคม_มิถุนายน_กรกฎาคม_สิงหาคม_กันยายน_ตุลาคม_พฤศจิกายน_ธันวาคม".split("_"),
			monthsShort: "มกรา_กุมภา_มีนา_เมษา_พฤษภา_มิถุนา_กรกฎา_สิงหา_กันยา_ตุลา_พฤศจิกา_ธันวา".split("_"),
			monthsParseExact: !0,
			weekdays: "อาทิตย์_จันทร์_อังคาร_พุธ_พฤหัสบดี_ศุกร์_เสาร์".split("_"),
			weekdaysShort: "อาทิตย์_จันทร์_อังคาร_พุธ_พฤหัส_ศุกร์_เสาร์".split("_"),
			weekdaysMin: "อา._จ._อ._พ._พฤ._ศ._ส.".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "H นาฬิกา m นาที",
				LTS: "H นาฬิกา m นาที s วินาที",
				L: "YYYY/MM/DD",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY เวลา H นาฬิกา m นาที",
				LLLL: "วันddddที่ D MMMM YYYY เวลา H นาฬิกา m นาที"
			},
			meridiemParse: /ก่อนเที่ยง|หลังเที่ยง/,
			isPM: function(e) {
				return "หลังเที่ยง" === e
			},
			meridiem: function(e, t, n) {
				return e < 12 ? "ก่อนเที่ยง" : "หลังเที่ยง"
			},
			calendar: {
				sameDay: "[วันนี้ เวลา] LT",
				nextDay: "[พรุ่งนี้ เวลา] LT",
				nextWeek: "dddd[หน้า เวลา] LT",
				lastDay: "[เมื่อวานนี้ เวลา] LT",
				lastWeek: "[วัน]dddd[ที่แล้ว เวลา] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "อีก %s",
				past: "%sที่แล้ว",
				s: "ไม่กี่วินาที",
				m: "1 นาที",
				mm: "%d นาที",
				h: "1 ชั่วโมง",
				hh: "%d ชั่วโมง",
				d: "1 วัน",
				dd: "%d วัน",
				M: "1 เดือน",
				MM: "%d เดือน",
				y: "1 ปี",
				yy: "%d ปี"
			}
		}), to.defineLocale("tl-ph", {
			months: "Enero_Pebrero_Marso_Abril_Mayo_Hunyo_Hulyo_Agosto_Setyembre_Oktubre_Nobyembre_Disyembre".split("_"),
			monthsShort: "Ene_Peb_Mar_Abr_May_Hun_Hul_Ago_Set_Okt_Nob_Dis".split("_"),
			weekdays: "Linggo_Lunes_Martes_Miyerkules_Huwebes_Biyernes_Sabado".split("_"),
			weekdaysShort: "Lin_Lun_Mar_Miy_Huw_Biy_Sab".split("_"),
			weekdaysMin: "Li_Lu_Ma_Mi_Hu_Bi_Sab".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "MM/D/YYYY",
				LL: "MMMM D, YYYY",
				LLL: "MMMM D, YYYY HH:mm",
				LLLL: "dddd, MMMM DD, YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Ngayon sa] LT",
				nextDay: "[Bukas sa] LT",
				nextWeek: "dddd [sa] LT",
				lastDay: "[Kahapon sa] LT",
				lastWeek: "dddd [huling linggo] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "sa loob ng %s",
				past: "%s ang nakalipas",
				s: "ilang segundo",
				m: "isang minuto",
				mm: "%d minuto",
				h: "isang oras",
				hh: "%d oras",
				d: "isang araw",
				dd: "%d araw",
				M: "isang buwan",
				MM: "%d buwan",
				y: "isang taon",
				yy: "%d taon"
			},
			ordinalParse: /\d{1,2}/,
			ordinal: function(e) {
				return e
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), "pagh_wa’_cha’_wej_loS_vagh_jav_Soch_chorgh_Hut".split("_")),
		ss = (to.defineLocale("tlh", {
			months: "tera’ jar wa’_tera’ jar cha’_tera’ jar wej_tera’ jar loS_tera’ jar vagh_tera’ jar jav_tera’ jar Soch_tera’ jar chorgh_tera’ jar Hut_tera’ jar wa’maH_tera’ jar wa’maH wa’_tera’ jar wa’maH cha’".split("_"),
			monthsShort: "jar wa’_jar cha’_jar wej_jar loS_jar vagh_jar jav_jar Soch_jar chorgh_jar Hut_jar wa’maH_jar wa’maH wa’_jar wa’maH cha’".split("_"),
			monthsParseExact: !0,
			weekdays: "lojmItjaj_DaSjaj_povjaj_ghItlhjaj_loghjaj_buqjaj_ghInjaj".split("_"),
			weekdaysShort: "lojmItjaj_DaSjaj_povjaj_ghItlhjaj_loghjaj_buqjaj_ghInjaj".split("_"),
			weekdaysMin: "lojmItjaj_DaSjaj_povjaj_ghItlhjaj_loghjaj_buqjaj_ghInjaj".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[DaHjaj] LT",
				nextDay: "[wa’leS] LT",
				nextWeek: "LLL",
				lastDay: "[wa’Hu’] LT",
				lastWeek: "LLL",
				sameElse: "L"
			},
			relativeTime: {
				future: Vr,
				past: Gr,
				s: "puS lup",
				m: "wa’ tup",
				mm: Kr,
				h: "wa’ rep",
				hh: Kr,
				d: "wa’ jaj",
				dd: Kr,
				M: "wa’ jar",
				MM: Kr,
				y: "wa’ DIS",
				yy: Kr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), {
			1: "'inci",
			5: "'inci",
			8: "'inci",
			70: "'inci",
			80: "'inci",
			2: "'nci",
			7: "'nci",
			20: "'nci",
			50: "'nci",
			3: "'üncü",
			4: "'üncü",
			100: "'üncü",
			6: "'ncı",
			9: "'uncu",
			10: "'uncu",
			30: "'uncu",
			60: "'ıncı",
			90: "'ıncı"
		}),
		ls = (to.defineLocale("tr", {
			months: "Ocak_Şubat_Mart_Nisan_Mayıs_Haziran_Temmuz_Ağustos_Eylül_Ekim_Kasım_Aralık".split("_"),
			monthsShort: "Oca_Şub_Mar_Nis_May_Haz_Tem_Ağu_Eyl_Eki_Kas_Ara".split("_"),
			weekdays: "Pazar_Pazartesi_Salı_Çarşamba_Perşembe_Cuma_Cumartesi".split("_"),
			weekdaysShort: "Paz_Pts_Sal_Çar_Per_Cum_Cts".split("_"),
			weekdaysMin: "Pz_Pt_Sa_Ça_Pe_Cu_Ct".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[bugün saat] LT",
				nextDay: "[yarın saat] LT",
				nextWeek: "[haftaya] dddd [saat] LT",
				lastDay: "[dün] LT",
				lastWeek: "[geçen hafta] dddd [saat] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s sonra",
				past: "%s önce",
				s: "birkaç saniye",
				m: "bir dakika",
				mm: "%d dakika",
				h: "bir saat",
				hh: "%d saat",
				d: "bir gün",
				dd: "%d gün",
				M: "bir ay",
				MM: "%d ay",
				y: "bir yıl",
				yy: "%d yıl"
			},
			ordinalParse: /\d{1,2}'(inci|nci|üncü|ncı|uncu|ıncı)/,
			ordinal: function(e) {
				if (0 === e) return e + "'ıncı";
				var t = e % 10,
					n = e % 100 - t,
					r = e >= 100 ? 100 : null;
				return e + (ss[t] || ss[n] || ss[r])
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("tzl", {
			months: "Januar_Fevraglh_Març_Avrïu_Mai_Gün_Julia_Guscht_Setemvar_Listopäts_Noemvar_Zecemvar".split("_"),
			monthsShort: "Jan_Fev_Mar_Avr_Mai_Gün_Jul_Gus_Set_Lis_Noe_Zec".split("_"),
			weekdays: "Súladi_Lúneçi_Maitzi_Márcuri_Xhúadi_Viénerçi_Sáturi".split("_"),
			weekdaysShort: "Súl_Lún_Mai_Már_Xhú_Vié_Sát".split("_"),
			weekdaysMin: "Sú_Lú_Ma_Má_Xh_Vi_Sá".split("_"),
			longDateFormat: {
				LT: "HH.mm",
				LTS: "HH.mm.ss",
				L: "DD.MM.YYYY",
				LL: "D. MMMM [dallas] YYYY",
				LLL: "D. MMMM [dallas] YYYY HH.mm",
				LLLL: "dddd, [li] D. MMMM [dallas] YYYY HH.mm"
			},
			meridiemParse: /d\'o|d\'a/i,
			isPM: function(e) {
				return "d'o" === e.toLowerCase()
			},
			meridiem: function(e, t, n) {
				return e > 11 ? n ? "d'o" : "D'O" : n ? "d'a" : "D'A"
			},
			calendar: {
				sameDay: "[oxhi à] LT",
				nextDay: "[demà à] LT",
				nextWeek: "dddd [à] LT",
				lastDay: "[ieiri à] LT",
				lastWeek: "[sür el] dddd [lasteu à] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "osprei %s",
				past: "ja%s",
				s: Qr,
				m: Qr,
				mm: Qr,
				h: Qr,
				hh: Qr,
				d: Qr,
				dd: Qr,
				M: Qr,
				MM: Qr,
				y: Qr,
				yy: Qr
			},
			ordinalParse: /\d{1,2}\./,
			ordinal: "%d.",
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("tzm-latn", {
			months: "innayr_brˤayrˤ_marˤsˤ_ibrir_mayyw_ywnyw_ywlywz_ɣwšt_šwtanbir_ktˤwbrˤ_nwwanbir_dwjnbir".split("_"),
			monthsShort: "innayr_brˤayrˤ_marˤsˤ_ibrir_mayyw_ywnyw_ywlywz_ɣwšt_šwtanbir_ktˤwbrˤ_nwwanbir_dwjnbir".split("_"),
			weekdays: "asamas_aynas_asinas_akras_akwas_asimwas_asiḍyas".split("_"),
			weekdaysShort: "asamas_aynas_asinas_akras_akwas_asimwas_asiḍyas".split("_"),
			weekdaysMin: "asamas_aynas_asinas_akras_akwas_asimwas_asiḍyas".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[asdkh g] LT",
				nextDay: "[aska g] LT",
				nextWeek: "dddd [g] LT",
				lastDay: "[assant g] LT",
				lastWeek: "dddd [g] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "dadkh s yan %s",
				past: "yan %s",
				s: "imik",
				m: "minuḍ",
				mm: "%d minuḍ",
				h: "saɛa",
				hh: "%d tassaɛin",
				d: "ass",
				dd: "%d ossan",
				M: "ayowr",
				MM: "%d iyyirn",
				y: "asgas",
				yy: "%d isgasn"
			},
			week: {
				dow: 6,
				doy: 12
			}
		}), to.defineLocale("tzm", {
			months: "ⵉⵏⵏⴰⵢⵔ_ⴱⵕⴰⵢⵕ_ⵎⴰⵕⵚ_ⵉⴱⵔⵉⵔ_ⵎⴰⵢⵢⵓ_ⵢⵓⵏⵢⵓ_ⵢⵓⵍⵢⵓⵣ_ⵖⵓⵛⵜ_ⵛⵓⵜⴰⵏⴱⵉⵔ_ⴽⵟⵓⴱⵕ_ⵏⵓⵡⴰⵏⴱⵉⵔ_ⴷⵓⵊⵏⴱⵉⵔ".split("_"),
			monthsShort: "ⵉⵏⵏⴰⵢⵔ_ⴱⵕⴰⵢⵕ_ⵎⴰⵕⵚ_ⵉⴱⵔⵉⵔ_ⵎⴰⵢⵢⵓ_ⵢⵓⵏⵢⵓ_ⵢⵓⵍⵢⵓⵣ_ⵖⵓⵛⵜ_ⵛⵓⵜⴰⵏⴱⵉⵔ_ⴽⵟⵓⴱⵕ_ⵏⵓⵡⴰⵏⴱⵉⵔ_ⴷⵓⵊⵏⴱⵉⵔ".split("_"),
			weekdays: "ⴰⵙⴰⵎⴰⵙ_ⴰⵢⵏⴰⵙ_ⴰⵙⵉⵏⴰⵙ_ⴰⴽⵔⴰⵙ_ⴰⴽⵡⴰⵙ_ⴰⵙⵉⵎⵡⴰⵙ_ⴰⵙⵉⴹⵢⴰⵙ".split("_"),
			weekdaysShort: "ⴰⵙⴰⵎⴰⵙ_ⴰⵢⵏⴰⵙ_ⴰⵙⵉⵏⴰⵙ_ⴰⴽⵔⴰⵙ_ⴰⴽⵡⴰⵙ_ⴰⵙⵉⵎⵡⴰⵙ_ⴰⵙⵉⴹⵢⴰⵙ".split("_"),
			weekdaysMin: "ⴰⵙⴰⵎⴰⵙ_ⴰⵢⵏⴰⵙ_ⴰⵙⵉⵏⴰⵙ_ⴰⴽⵔⴰⵙ_ⴰⴽⵡⴰⵙ_ⴰⵙⵉⵎⵡⴰⵙ_ⴰⵙⵉⴹⵢⴰⵙ".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[ⴰⵙⴷⵅ ⴴ] LT",
				nextDay: "[ⴰⵙⴽⴰ ⴴ] LT",
				nextWeek: "dddd [ⴴ] LT",
				lastDay: "[ⴰⵚⴰⵏⵜ ⴴ] LT",
				lastWeek: "dddd [ⴴ] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "ⴷⴰⴷⵅ ⵙ ⵢⴰⵏ %s",
				past: "ⵢⴰⵏ %s",
				s: "ⵉⵎⵉⴽ",
				m: "ⵎⵉⵏⵓⴺ",
				mm: "%d ⵎⵉⵏⵓⴺ",
				h: "ⵙⴰⵄⴰ",
				hh: "%d ⵜⴰⵙⵙⴰⵄⵉⵏ",
				d: "ⴰⵙⵙ",
				dd: "%d oⵙⵙⴰⵏ",
				M: "ⴰⵢoⵓⵔ",
				MM: "%d ⵉⵢⵢⵉⵔⵏ",
				y: "ⴰⵙⴳⴰⵙ",
				yy: "%d ⵉⵙⴳⴰⵙⵏ"
			},
			week: {
				dow: 6,
				doy: 12
			}
		}), to.defineLocale("uk", {
			months: {
				format: "січня_лютого_березня_квітня_травня_червня_липня_серпня_вересня_жовтня_листопада_грудня".split("_"),
				standalone: "січень_лютий_березень_квітень_травень_червень_липень_серпень_вересень_жовтень_листопад_грудень".split("_")
			},
			monthsShort: "січ_лют_бер_квіт_трав_черв_лип_серп_вер_жовт_лист_груд".split("_"),
			weekdays: ti,
			weekdaysShort: "нд_пн_вт_ср_чт_пт_сб".split("_"),
			weekdaysMin: "нд_пн_вт_ср_чт_пт_сб".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD.MM.YYYY",
				LL: "D MMMM YYYY р.",
				LLL: "D MMMM YYYY р., HH:mm",
				LLLL: "dddd, D MMMM YYYY р., HH:mm"
			},
			calendar: {
				sameDay: ni("[Сьогодні "),
				nextDay: ni("[Завтра "),
				lastDay: ni("[Вчора "),
				nextWeek: ni("[У] dddd ["),
				lastWeek: function() {
					switch (this.day()) {
					case 0:
					case 3:
					case 5:
					case 6:
						return ni("[Минулої] dddd [").call(this);
					case 1:
					case 2:
					case 4:
						return ni("[Минулого] dddd [").call(this)
					}
				},
				sameElse: "L"
			},
			relativeTime: {
				future: "за %s",
				past: "%s тому",
				s: "декілька секунд",
				m: ei,
				mm: ei,
				h: "годину",
				hh: ei,
				d: "день",
				dd: ei,
				M: "місяць",
				MM: ei,
				y: "рік",
				yy: ei
			},
			meridiemParse: /ночі|ранку|дня|вечора/,
			isPM: function(e) {
				return /^(дня|вечора)$/.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 4 ? "ночі" : e < 12 ? "ранку" : e < 17 ? "дня" : "вечора"
			},
			ordinalParse: /\d{1,2}-(й|го)/,
			ordinal: function(e, t) {
				switch (t) {
				case "M":
				case "d":
				case "DDD":
				case "w":
				case "W":
					return e + "-й";
				case "D":
					return e + "-го";
				default:
					return e
				}
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("uz", {
			months: "январ_феврал_март_апрел_май_июн_июл_август_сентябр_октябр_ноябр_декабр".split("_"),
			monthsShort: "янв_фев_мар_апр_май_июн_июл_авг_сен_окт_ноя_дек".split("_"),
			weekdays: "Якшанба_Душанба_Сешанба_Чоршанба_Пайшанба_Жума_Шанба".split("_"),
			weekdaysShort: "Якш_Душ_Сеш_Чор_Пай_Жум_Шан".split("_"),
			weekdaysMin: "Як_Ду_Се_Чо_Па_Жу_Ша".split("_"),
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "D MMMM YYYY, dddd HH:mm"
			},
			calendar: {
				sameDay: "[Бугун соат] LT [да]",
				nextDay: "[Эртага] LT [да]",
				nextWeek: "dddd [куни соат] LT [да]",
				lastDay: "[Кеча соат] LT [да]",
				lastWeek: "[Утган] dddd [куни соат] LT [да]",
				sameElse: "L"
			},
			relativeTime: {
				future: "Якин %s ичида",
				past: "Бир неча %s олдин",
				s: "фурсат",
				m: "бир дакика",
				mm: "%d дакика",
				h: "бир соат",
				hh: "%d соат",
				d: "бир кун",
				dd: "%d кун",
				M: "бир ой",
				MM: "%d ой",
				y: "бир йил",
				yy: "%d йил"
			},
			week: {
				dow: 1,
				doy: 7
			}
		}), to.defineLocale("vi", {
			months: "tháng 1_tháng 2_tháng 3_tháng 4_tháng 5_tháng 6_tháng 7_tháng 8_tháng 9_tháng 10_tháng 11_tháng 12".split("_"),
			monthsShort: "Th01_Th02_Th03_Th04_Th05_Th06_Th07_Th08_Th09_Th10_Th11_Th12".split("_"),
			monthsParseExact: !0,
			weekdays: "chủ nhật_thứ hai_thứ ba_thứ tư_thứ năm_thứ sáu_thứ bảy".split("_"),
			weekdaysShort: "CN_T2_T3_T4_T5_T6_T7".split("_"),
			weekdaysMin: "CN_T2_T3_T4_T5_T6_T7".split("_"),
			weekdaysParseExact: !0,
			meridiemParse: /sa|ch/i,
			isPM: function(e) {
				return /^ch$/i.test(e)
			},
			meridiem: function(e, t, n) {
				return e < 12 ? n ? "sa" : "SA" : n ? "ch" : "CH"
			},
			longDateFormat: {
				LT: "HH:mm",
				LTS: "HH:mm:ss",
				L: "DD/MM/YYYY",
				LL: "D MMMM [năm] YYYY",
				LLL: "D MMMM [năm] YYYY HH:mm",
				LLLL: "dddd, D MMMM [năm] YYYY HH:mm",
				l: "DD/M/YYYY",
				ll: "D MMM YYYY",
				lll: "D MMM YYYY HH:mm",
				llll: "ddd, D MMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[Hôm nay lúc] LT",
				nextDay: "[Ngày mai lúc] LT",
				nextWeek: "dddd [tuần tới lúc] LT",
				lastDay: "[Hôm qua lúc] LT",
				lastWeek: "dddd [tuần rồi lúc] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "%s tới",
				past: "%s trước",
				s: "vài giây",
				m: "một phút",
				mm: "%d phút",
				h: "một giờ",
				hh: "%d giờ",
				d: "một ngày",
				dd: "%d ngày",
				M: "một tháng",
				MM: "%d tháng",
				y: "một năm",
				yy: "%d năm"
			},
			ordinalParse: /\d{1,2}/,
			ordinal: function(e) {
				return e
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("x-pseudo", {
			months: "J~áñúá~rý_F~ébrú~árý_~Márc~h_Áp~ríl_~Máý_~Júñé~_Júl~ý_Áú~gúst~_Sép~témb~ér_Ó~ctób~ér_Ñ~óvém~bér_~Décé~mbér".split("_"),
			monthsShort: "J~áñ_~Féb_~Már_~Ápr_~Máý_~Júñ_~Júl_~Áúg_~Sép_~Óct_~Ñóv_~Déc".split("_"),
			monthsParseExact: !0,
			weekdays: "S~úñdá~ý_Mó~ñdáý~_Túé~sdáý~_Wéd~ñésd~áý_T~húrs~dáý_~Fríd~áý_S~átúr~dáý".split("_"),
			weekdaysShort: "S~úñ_~Móñ_~Túé_~Wéd_~Thú_~Frí_~Sát".split("_"),
			weekdaysMin: "S~ú_Mó~_Tú_~Wé_T~h_Fr~_Sá".split("_"),
			weekdaysParseExact: !0,
			longDateFormat: {
				LT: "HH:mm",
				L: "DD/MM/YYYY",
				LL: "D MMMM YYYY",
				LLL: "D MMMM YYYY HH:mm",
				LLLL: "dddd, D MMMM YYYY HH:mm"
			},
			calendar: {
				sameDay: "[T~ódá~ý át] LT",
				nextDay: "[T~ómó~rró~w át] LT",
				nextWeek: "dddd [át] LT",
				lastDay: "[Ý~ést~érdá~ý át] LT",
				lastWeek: "[L~ást] dddd [át] LT",
				sameElse: "L"
			},
			relativeTime: {
				future: "í~ñ %s",
				past: "%s á~gó",
				s: "á ~féw ~sécó~ñds",
				m: "á ~míñ~úté",
				mm: "%d m~íñú~tés",
				h: "á~ñ hó~úr",
				hh: "%d h~óúrs",
				d: "á ~dáý",
				dd: "%d d~áýs",
				M: "á ~móñ~th",
				MM: "%d m~óñt~hs",
				y: "á ~ýéár",
				yy: "%d ý~éárs"
			},
			ordinalParse: /\d{1,2}(th|st|nd|rd)/,
			ordinal: function(e) {
				var t = e % 10,
					n = 1 === ~~ (e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th";
				return e + n
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("zh-cn", {
			months: "一月_二月_三月_四月_五月_六月_七月_八月_九月_十月_十一月_十二月".split("_"),
			monthsShort: "1月_2月_3月_4月_5月_6月_7月_8月_9月_10月_11月_12月".split("_"),
			weekdays: "星期日_星期一_星期二_星期三_星期四_星期五_星期六".split("_"),
			weekdaysShort: "周日_周一_周二_周三_周四_周五_周六".split("_"),
			weekdaysMin: "日_一_二_三_四_五_六".split("_"),
			longDateFormat: {
				LT: "Ah点mm分",
				LTS: "Ah点m分s秒",
				L: "YYYY-MM-DD",
				LL: "YYYY年MMMD日",
				LLL: "YYYY年MMMD日Ah点mm分",
				LLLL: "YYYY年MMMD日ddddAh点mm分",
				l: "YYYY-MM-DD",
				ll: "YYYY年MMMD日",
				lll: "YYYY年MMMD日Ah点mm分",
				llll: "YYYY年MMMD日ddddAh点mm分"
			},
			meridiemParse: /凌晨|早上|上午|中午|下午|晚上/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "凌晨" === t || "早上" === t || "上午" === t ? e : "下午" === t || "晚上" === t ? e + 12 : e >= 11 ? e : e + 12
			},
			meridiem: function(e, t, n) {
				var r = 100 * e + t;
				return r < 600 ? "凌晨" : r < 900 ? "早上" : r < 1130 ? "上午" : r < 1230 ? "中午" : r < 1800 ? "下午" : "晚上"
			},
			calendar: {
				sameDay: function() {
					return 0 === this.minutes() ? "[今天]Ah[点整]" : "[今天]LT"
				},
				nextDay: function() {
					return 0 === this.minutes() ? "[明天]Ah[点整]" : "[明天]LT"
				},
				lastDay: function() {
					return 0 === this.minutes() ? "[昨天]Ah[点整]" : "[昨天]LT"
				},
				nextWeek: function() {
					var e, t;
					return e = to().startOf("week"), t = this.diff(e, "days") >= 7 ? "[下]" : "[本]", 0 === this.minutes() ? t + "dddAh点整" : t + "dddAh点mm"
				},
				lastWeek: function() {
					var e, t;
					return e = to().startOf("week"), t = this.unix() < e.unix() ? "[上]" : "[本]", 0 === this.minutes() ? t + "dddAh点整" : t + "dddAh点mm"
				},
				sameElse: "LL"
			},
			ordinalParse: /\d{1,2}(日|月|周)/,
			ordinal: function(e, t) {
				switch (t) {
				case "d":
				case "D":
				case "DDD":
					return e + "日";
				case "M":
					return e + "月";
				case "w":
				case "W":
					return e + "周";
				default:
					return e
				}
			},
			relativeTime: {
				future: "%s内",
				past: "%s前",
				s: "几秒",
				m: "1 分钟",
				mm: "%d 分钟",
				h: "1 小时",
				hh: "%d 小时",
				d: "1 天",
				dd: "%d 天",
				M: "1 个月",
				MM: "%d 个月",
				y: "1 年",
				yy: "%d 年"
			},
			week: {
				dow: 1,
				doy: 4
			}
		}), to.defineLocale("zh-tw", {
			months: "一月_二月_三月_四月_五月_六月_七月_八月_九月_十月_十一月_十二月".split("_"),
			monthsShort: "1月_2月_3月_4月_5月_6月_7月_8月_9月_10月_11月_12月".split("_"),
			weekdays: "星期日_星期一_星期二_星期三_星期四_星期五_星期六".split("_"),
			weekdaysShort: "週日_週一_週二_週三_週四_週五_週六".split("_"),
			weekdaysMin: "日_一_二_三_四_五_六".split("_"),
			longDateFormat: {
				LT: "Ah點mm分",
				LTS: "Ah點m分s秒",
				L: "YYYY年MMMD日",
				LL: "YYYY年MMMD日",
				LLL: "YYYY年MMMD日Ah點mm分",
				LLLL: "YYYY年MMMD日ddddAh點mm分",
				l: "YYYY年MMMD日",
				ll: "YYYY年MMMD日",
				lll: "YYYY年MMMD日Ah點mm分",
				llll: "YYYY年MMMD日ddddAh點mm分"
			},
			meridiemParse: /早上|上午|中午|下午|晚上/,
			meridiemHour: function(e, t) {
				return 12 === e && (e = 0), "早上" === t || "上午" === t ? e : "中午" === t ? e >= 11 ? e : e + 12 : "下午" === t || "晚上" === t ? e + 12 : void 0
			},
			meridiem: function(e, t, n) {
				var r = 100 * e + t;
				return r < 900 ? "早上" : r < 1130 ? "上午" : r < 1230 ? "中午" : r < 1800 ? "下午" : "晚上"
			},
			calendar: {
				sameDay: "[今天]LT",
				nextDay: "[明天]LT",
				nextWeek: "[下]ddddLT",
				lastDay: "[昨天]LT",
				lastWeek: "[上]ddddLT",
				sameElse: "L"
			},
			ordinalParse: /\d{1,2}(日|月|週)/,
			ordinal: function(e, t) {
				switch (t) {
				case "d":
				case "D":
				case "DDD":
					return e + "日";
				case "M":
					return e + "月";
				case "w":
				case "W":
					return e + "週";
				default:
					return e
				}
			},
			relativeTime: {
				future: "%s內",
				past: "%s前",
				s: "幾秒",
				m: "1分鐘",
				mm: "%d分鐘",
				h: "1小時",
				hh: "%d小時",
				d: "1天",
				dd: "%d天",
				M: "1個月",
				MM: "%d個月",
				y: "1年",
				yy: "%d年"
			}
		}), to);
	return ls.locale("en"), ls
}), function() {
	function e(e, t) {
		return e.set(t[0], t[1]), e
	}
	function t(e, t) {
		return e.add(t), e
	}
	function n(e, t, n) {
		var r = n.length;
		switch (r) {
		case 0:
			return e.call(t);
		case 1:
			return e.call(t, n[0]);
		case 2:
			return e.call(t, n[0], n[1]);
		case 3:
			return e.call(t, n[0], n[1], n[2])
		}
		return e.apply(t, n)
	}
	function r(e, t, n, r) {
		for (var i = -1, a = e.length; ++i < a;) {
			var o = e[i];
			t(r, o, n(o), e)
		}
		return r
	}
	function i(e, t) {
		for (var n = -1, r = e.length, i = -1, a = t.length, o = Array(r + a); ++n < r;) o[n] = e[n];
		for (; ++i < a;) o[n++] = t[i];
		return o
	}
	function a(e, t) {
		for (var n = -1, r = e.length; ++n < r && t(e[n], n, e) !== !1;);
		return e
	}
	function o(e, t) {
		for (var n = e.length; n-- && t(e[n], n, e) !== !1;);
		return e
	}
	function s(e, t) {
		for (var n = -1, r = e.length; ++n < r;) if (!t(e[n], n, e)) return !1;
		return !0
	}
	function l(e, t) {
		for (var n = -1, r = e.length, i = 0, a = []; ++n < r;) {
			var o = e[n];
			t(o, n, e) && (a[i++] = o)
		}
		return a
	}
	function u(e, t) {
		return !!e.length && y(e, t, 0) > -1
	}
	function c(e, t, n) {
		for (var r = -1, i = e.length; ++r < i;) if (n(t, e[r])) return !0;
		return !1
	}
	function d(e, t) {
		for (var n = -1, r = e.length, i = Array(r); ++n < r;) i[n] = t(e[n], n, e);
		return i
	}
	function h(e, t) {
		for (var n = -1, r = t.length, i = e.length; ++n < r;) e[i + n] = t[n];
		return e
	}
	function f(e, t, n, r) {
		var i = -1,
			a = e.length;
		for (r && a && (n = e[++i]); ++i < a;) n = t(n, e[i], i, e);
		return n
	}
	function p(e, t, n, r) {
		var i = e.length;
		for (r && i && (n = e[--i]); i--;) n = t(n, e[i], i, e);
		return n
	}
	function m(e, t) {
		for (var n = -1, r = e.length; ++n < r;) if (t(e[n], n, e)) return !0;
		return !1
	}
	function _(e, t, n, r) {
		var i;
		return n(e, function(e, n, a) {
			if (t(e, n, a)) return i = r ? n : e, !1
		}), i
	}
	function g(e, t, n) {
		for (var r = e.length, i = n ? r : -1; n ? i-- : ++i < r;) if (t(e[i], i, e)) return i;
		return -1
	}
	function y(e, t, n) {
		if (t !== t) return j(e, n);
		for (var r = n - 1, i = e.length; ++r < i;) if (e[r] === t) return r;
		return -1
	}
	function v(e, t, n, r) {
		for (var i = n - 1, a = e.length; ++i < a;) if (r(e[i], t)) return i;
		return -1
	}
	function E(e, t) {
		var n = e ? e.length : 0;
		return n ? w(e, t) / n : ve
	}
	function b(e, t, n, r, i) {
		return i(e, function(e, i, a) {
			n = r ? (r = !1, e) : t(n, e, i, a)
		}), n
	}
	function U(e, t) {
		var n = e.length;
		for (e.sort(t); n--;) e[n] = e[n].value;
		return e
	}
	function w(e, t) {
		for (var n, r = -1, i = e.length; ++r < i;) {
			var a = t(e[r]);
			a !== z && (n = n === z ? a : n + a)
		}
		return n
	}
	function k(e, t) {
		for (var n = -1, r = Array(e); ++n < e;) r[n] = t(n);
		return r
	}
	function M(e, t) {
		return d(t, function(t) {
			return [t, e[t]]
		})
	}
	function L(e) {
		return function(t) {
			return e(t)
		}
	}
	function F(e, t) {
		return d(t, function(t) {
			return e[t]
		})
	}
	function D(e, t) {
		for (var n = -1, r = e.length; ++n < r && y(t, e[n], 0) > -1;);
		return n
	}
	function x(e, t) {
		for (var n = e.length; n-- && y(t, e[n], 0) > -1;);
		return n
	}
	function T(e) {
		return e && e.Object === Object ? e : null
	}
	function Y(e, t) {
		for (var n = e.length, r = 0; n--;) e[n] === t && r++;
		return r
	}
	function S(e) {
		return Un[e]
	}
	function A(e) {
		return wn[e]
	}
	function C(e) {
		return "\\" + Ln[e]
	}
	function j(e, t, n) {
		for (var r = e.length, i = t + (n ? 0 : -1); n ? i-- : ++i < r;) {
			var a = e[i];
			if (a !== a) return i
		}
		return -1
	}
	function H(e) {
		var t = !1;
		if (null != e && "function" != typeof e.toString) try {
			t = !! (e + "")
		} catch (n) {}
		return t
	}
	function B(e) {
		for (var t, n = []; !(t = e.next()).done;) n.push(t.value);
		return n
	}
	function $(e) {
		var t = -1,
			n = Array(e.size);
		return e.forEach(function(e, r) {
			n[++t] = [r, e]
		}), n
	}
	function P(e, t) {
		for (var n = -1, r = e.length, i = 0, a = []; ++n < r;) {
			var o = e[n];
			o !== t && o !== K || (e[n] = K, a[i++] = n)
		}
		return a
	}
	function O(e) {
		var t = -1,
			n = Array(e.size);
		return e.forEach(function(e) {
			n[++t] = e
		}), n
	}
	function I(e) {
		if (!e || !_n.test(e)) return e.length;
		for (var t = pn.lastIndex = 0; pn.test(e);) t++;
		return t
	}
	function N(e) {
		return e.match(pn)
	}
	function W(e) {
		return kn[e]
	}
	function R(T) {
		function Dt(e) {
			if (us(e) && !ed(e) && !(e instanceof Yt)) {
				if (e instanceof Tt) return e;
				if (pu.call(e, "__wrapped__")) return ta(e)
			}
			return new Tt(e)
		}
		function xt() {}
		function Tt(e, t) {
			this.__wrapped__ = e, this.__actions__ = [], this.__chain__ = !! t, this.__index__ = 0, this.__values__ = z
		}
		function Yt(e) {
			this.__wrapped__ = e, this.__actions__ = [], this.__dir__ = 1, this.__filtered__ = !1, this.__iteratees__ = [], this.__takeCount__ = Ee, this.__views__ = []
		}
		function St() {
			var e = new Yt(this.__wrapped__);
			return e.__actions__ = Kr(this.__actions__), e.__dir__ = this.__dir__, e.__filtered__ = this.__filtered__, e.__iteratees__ = Kr(this.__iteratees__), e.__takeCount__ = this.__takeCount__, e.__views__ = Kr(this.__views__), e
		}
		function At() {
			if (this.__filtered__) {
				var e = new Yt(this);
				e.__dir__ = -1, e.__filtered__ = !0
			} else e = this.clone(), e.__dir__ *= -1;
			return e
		}
		function Ct() {
			var e = this.__wrapped__.value(),
				t = this.__dir__,
				n = ed(e),
				r = t < 0,
				i = n ? e.length : 0,
				a = Ai(0, i, this.__views__),
				o = a.start,
				s = a.end,
				l = s - o,
				u = r ? s : o - 1,
				c = this.__iteratees__,
				d = c.length,
				h = 0,
				f = Pu(l, this.__takeCount__);
			if (!n || i < J || i == l && f == l) return Yr(e, this.__actions__);
			var p = [];
			e: for (; l-- && h < f;) {
				u += t;
				for (var m = -1, _ = e[u]; ++m < d;) {
					var g = c[m],
						y = g.iteratee,
						v = g.type,
						E = y(_);
					if (v == pe) _ = E;
					else if (!E) {
						if (v == fe) continue e;
						break e
					}
				}
				p[h++] = _
			}
			return p
		}
		function jt() {}
		function Ht(e, t) {
			return $t(e, t) && delete e[t]
		}
		function Bt(e, t) {
			if (Ku) {
				var n = e[t];
				return n === G ? z : n
			}
			return pu.call(e, t) ? e[t] : z
		}
		function $t(e, t) {
			return Ku ? e[t] !== z : pu.call(e, t)
		}
		function Pt(e, t, n) {
			e[t] = Ku && n === z ? G : n
		}
		function Ot(e) {
			var t = -1,
				n = e ? e.length : 0;
			for (this.clear(); ++t < n;) {
				var r = e[t];
				this.set(r[0], r[1])
			}
		}
		function It() {
			this.__data__ = {
				hash: new jt,
				map: qu ? new qu : [],
				string: new jt
			}
		}
		function Nt(e) {
			var t = this.__data__;
			return Ri(e) ? Ht("string" == typeof e ? t.string : t.hash, e) : qu ? t.map["delete"](e) : tn(t.map, e)
		}
		function Wt(e) {
			var t = this.__data__;
			return Ri(e) ? Bt("string" == typeof e ? t.string : t.hash, e) : qu ? t.map.get(e) : nn(t.map, e)
		}
		function Rt(e) {
			var t = this.__data__;
			return Ri(e) ? $t("string" == typeof e ? t.string : t.hash, e) : qu ? t.map.has(e) : rn(t.map, e)
		}
		function zt(e, t) {
			var n = this.__data__;
			return Ri(e) ? Pt("string" == typeof e ? n.string : n.hash, e, t) : qu ? n.map.set(e, t) : on(n.map, e, t), this
		}
		function qt(e) {
			var t = -1,
				n = e ? e.length : 0;
			for (this.__data__ = new Ot; ++t < n;) this.push(e[t])
		}
		function Jt(e, t) {
			var n = e.__data__;
			if (Ri(t)) {
				var r = n.__data__,
					i = "string" == typeof t ? r.string : r.hash;
				return i[t] === G
			}
			return n.has(t)
		}
		function Vt(e) {
			var t = this.__data__;
			if (Ri(e)) {
				var n = t.__data__,
					r = "string" == typeof e ? n.string : n.hash;
				r[e] = G
			} else t.set(e, G)
		}
		function Gt(e) {
			var t = -1,
				n = e ? e.length : 0;
			for (this.clear(); ++t < n;) {
				var r = e[t];
				this.set(r[0], r[1])
			}
		}
		function Kt() {
			this.__data__ = {
				array: [],
				map: null
			}
		}
		function Xt(e) {
			var t = this.__data__,
				n = t.array;
			return n ? tn(n, e) : t.map["delete"](e)
		}
		function Qt(e) {
			var t = this.__data__,
				n = t.array;
			return n ? nn(n, e) : t.map.get(e)
		}
		function Zt(e) {
			var t = this.__data__,
				n = t.array;
			return n ? rn(n, e) : t.map.has(e)
		}
		function en(e, t) {
			var n = this.__data__,
				r = n.array;
			r && (r.length < J - 1 ? on(r, e, t) : (n.array = null, n.map = new Ot(r)));
			var i = n.map;
			return i && i.set(e, t), this
		}
		function tn(e, t) {
			var n = an(e, t);
			if (n < 0) return !1;
			var r = e.length - 1;
			return n == r ? e.pop() : Yu.call(e, n, 1), !0
		}
		function nn(e, t) {
			var n = an(e, t);
			return n < 0 ? z : e[n][1]
		}
		function rn(e, t) {
			return an(e, t) > -1
		}
		function an(e, t) {
			for (var n = e.length; n--;) if (qo(e[n][0], t)) return n;
			return -1
		}
		function on(e, t, n) {
			var r = an(e, t);
			r < 0 ? e.push([t, n]) : e[r][1] = n
		}
		function sn(e, t, n, r) {
			return e === z || qo(e, du[n]) && !pu.call(r, n) ? t : e
		}
		function ln(e, t, n) {
			(n === z || qo(e[t], n)) && ("number" != typeof t || n !== z || t in e) || (e[t] = n)
		}
		function un(e, t, n) {
			var r = e[t];
			pu.call(e, t) && qo(r, n) && (n !== z || t in e) || (e[t] = n)
		}
		function cn(e, t, n, r) {
			return lc(e, function(e, i, a) {
				t(r, e, n(e), a)
			}), r
		}
		function dn(e, t) {
			return e && Xr(t, Js(t), e)
		}
		function pn(e, t) {
			for (var n = -1, r = null == e, i = t.length, a = Array(i); ++n < i;) a[n] = r ? z : Rs(e, t[n]);
			return a
		}
		function Un(e, t, n) {
			return e === e && (n !== z && (e = e <= n ? e : n), t !== z && (e = e >= t ? e : t)), e
		}
		function wn(e, t, n, r, i, o, s) {
			var l;
			if (r && (l = o ? r(e, i, o, s) : r(e)), l !== z) return l;
			if (!ls(e)) return e;
			var u = ed(e);
			if (u) {
				if (l = ji(e), !t) return Kr(e, l)
			} else {
				var c = Si(e),
					d = c == De || c == xe;
				if (td(e)) return $r(e, t);
				if (c == Se || c == we || d && !o) {
					if (H(e)) return o ? e : {};
					if (l = Hi(d ? {} : e), !t) return Qr(e, dn(l, e))
				} else {
					if (!bn[c]) return o ? e : {};
					l = Bi(e, c, wn, t)
				}
			}
			s || (s = new Gt);
			var h = s.get(e);
			if (h) return h;
			if (s.set(e, l), !u) var f = n ? wi(e) : Js(e);
			return a(f || e, function(i, a) {
				f && (a = i, i = e[a]), un(l, a, wn(i, t, n, r, a, e, s))
			}), l
		}
		function kn(e) {
			var t = Js(e),
				n = t.length;
			return function(r) {
				if (null == r) return !n;
				for (var i = n; i--;) {
					var a = t[i],
						o = e[a],
						s = r[a];
					if (s === z && !(a in Object(r)) || !o(s)) return !1
				}
				return !0
			}
		}
		function Mn(e) {
			return ls(e) ? Du(e) : {}
		}
		function Ln(e, t, n) {
			if ("function" != typeof e) throw new uu(V);
			return Tu(function() {
				e.apply(z, n)
			}, t)
		}
		function xn(e, t, n, r) {
			var i = -1,
				a = u,
				o = !0,
				s = e.length,
				l = [],
				h = t.length;
			if (!s) return l;
			n && (t = d(t, L(n))), r ? (a = c, o = !1) : t.length >= J && (a = Jt, o = !1, t = new qt(t));
			e: for (; ++i < s;) {
				var f = e[i],
					p = n ? n(f) : f;
				if (f = r || 0 !== f ? f : 0, o && p === p) {
					for (var m = h; m--;) if (t[m] === p) continue e;
					l.push(f)
				} else a(t, p, r) || l.push(f)
			}
			return l
		}
		function Tn(e, t) {
			var n = !0;
			return lc(e, function(e, r, i) {
				return n = !! t(e, r, i)
			}), n
		}
		function Sn(e, t, n) {
			for (var r = -1, i = e.length; ++r < i;) {
				var a = e[r],
					o = t(a);
				if (null != o && (s === z ? o === o && !ws(o) : n(o, s))) var s = o,
					l = a
			}
			return l
		}
		function An(e, t, n, r) {
			var i = e.length;
			for (n = xs(n), n < 0 && (n = -n > i ? 0 : i + n), r = r === z || r > i ? i : xs(r), r < 0 && (r += i), r = n > r ? 0 : Ts(r); n < r;) e[n++] = t;
			return e
		}
		function Cn(e, t) {
			var n = [];
			return lc(e, function(e, r, i) {
				t(e, r, i) && n.push(e)
			}), n
		}
		function jn(e, t, n, r, i) {
			var a = -1,
				o = e.length;
			for (n || (n = Pi), i || (i = []); ++a < o;) {
				var s = e[a];
				t > 0 && n(s) ? t > 1 ? jn(s, t - 1, n, r, i) : h(i, s) : r || (i[i.length] = s)
			}
			return i
		}
		function $n(e, t) {
			return e && cc(e, t, Js)
		}
		function Pn(e, t) {
			return e && dc(e, t, Js)
		}
		function On(e, t) {
			return l(t, function(t) {
				return as(e[t])
			})
		}
		function In(e, t) {
			t = Wi(t, e) ? [t] : Hr(t);
			for (var n = 0, r = t.length; null != e && n < r;) e = e[Zi(t[n++])];
			return n && n == r ? e : z
		}
		function Nn(e, t, n) {
			var r = t(e);
			return ed(e) ? r : h(r, n(e))
		}
		function Wn(e, t) {
			return e > t
		}
		function Rn(e, t) {
			return pu.call(e, t) || "object" == typeof e && t in e && null === Ti(e)
		}
		function zn(e, t) {
			return t in Object(e)
		}
		function qn(e, t, n) {
			return e >= Pu(t, n) && e < $u(t, n)
		}
		function Jn(e, t, n) {
			for (var r = n ? c : u, i = e[0].length, a = e.length, o = a, s = Array(a), l = 1 / 0, h = []; o--;) {
				var f = e[o];
				o && t && (f = d(f, L(t))), l = Pu(f.length, l), s[o] = !n && (t || i >= 120 && f.length >= 120) ? new qt(o && f) : z
			}
			f = e[0];
			var p = -1,
				m = s[0];
			e: for (; ++p < i && h.length < l;) {
				var _ = f[p],
					g = t ? t(_) : _;
				if (_ = n || 0 !== _ ? _ : 0, !(m ? Jt(m, g) : r(h, g, n))) {
					for (o = a; --o;) {
						var y = s[o];
						if (!(y ? Jt(y, g) : r(e[o], g, n))) continue e
					}
					m && m.push(g), h.push(_)
				}
			}
			return h
		}
		function Vn(e, t, n, r) {
			return $n(e, function(e, i, a) {
				t(r, n(e), i, a)
			}), r
		}
		function Gn(e, t, r) {
			Wi(t, e) || (t = Hr(t), e = Xi(e, t), t = Ea(t));
			var i = null == e ? e : e[Zi(t)];
			return null == i ? z : n(i, e, r)
		}
		function Kn(e, t, n, r, i) {
			return e === t || (null == e || null == t || !ls(e) && !us(t) ? e !== e && t !== t : Xn(e, t, Kn, n, r, i))
		}
		function Xn(e, t, n, r, i, a) {
			var o = ed(e),
				s = ed(t),
				l = ke,
				u = ke;
			o || (l = Si(e), l = l == we ? Se : l), s || (u = Si(t), u = u == we ? Se : u);
			var c = l == Se && !H(e),
				d = u == Se && !H(t),
				h = l == u;
			if (h && !c) return a || (a = new Gt), o || ks(e) ? Ei(e, t, n, r, i, a) : bi(e, t, l, n, r, i, a);
			if (!(i & le)) {
				var f = c && pu.call(e, "__wrapped__"),
					p = d && pu.call(t, "__wrapped__");
				if (f || p) {
					var m = f ? e.value() : e,
						_ = p ? t.value() : t;
					return a || (a = new Gt), n(m, _, r, i, a)
				}
			}
			return !!h && (a || (a = new Gt), Ui(e, t, n, r, i, a))
		}
		function Qn(e, t, n, r) {
			var i = n.length,
				a = i,
				o = !r;
			if (null == e) return !a;
			for (e = Object(e); i--;) {
				var s = n[i];
				if (o && s[2] ? s[1] !== e[s[0]] : !(s[0] in e)) return !1
			}
			for (; ++i < a;) {
				s = n[i];
				var l = s[0],
					u = e[l],
					c = s[1];
				if (o && s[2]) {
					if (u === z && !(l in e)) return !1
				} else {
					var d = new Gt;
					if (r) var h = r(u, c, l, e, t, d);
					if (!(h === z ? Kn(c, u, r, se | le, d) : h)) return !1
				}
			}
			return !0
		}
		function Zn(e) {
			return "function" == typeof e ? e : null == e ? $l : "object" == typeof e ? ed(e) ? ar(e[0], e[1]) : ir(e) : ql(e)
		}
		function er(e) {
			return Bu(Object(e))
		}
		function tr(e) {
			e = null == e ? e : Object(e);
			var t = [];
			for (var n in e) t.push(n);
			return t
		}
		function nr(e, t) {
			return e < t
		}
		function rr(e, t) {
			var n = -1,
				r = Go(e) ? Array(e.length) : [];
			return lc(e, function(e, i, a) {
				r[++n] = t(e, i, a)
			}), r
		}
		function ir(e) {
			var t = Fi(e);
			return 1 == t.length && t[0][2] ? Vi(t[0][0], t[0][1]) : function(n) {
				return n === e || Qn(n, e, t)
			}
		}
		function ar(e, t) {
			return Wi(e) && Ji(t) ? Vi(Zi(e), t) : function(n) {
				var r = Rs(n, e);
				return r === z && r === t ? qs(n, e) : Kn(t, r, z, se | le)
			}
		}
		function or(e, t, n, r, i) {
			if (e !== t) {
				if (!ed(t) && !ks(t)) var o = Vs(t);
				a(o || t, function(a, s) {
					if (o && (s = a, a = t[s]), ls(a)) i || (i = new Gt), sr(e, t, s, n, or, r, i);
					else {
						var l = r ? r(e[s], a, s + "", e, t, i) : z;
						l === z && (l = a), ln(e, s, l)
					}
				})
			}
		}
		function sr(e, t, n, r, i, a, o) {
			var s = e[n],
				l = t[n],
				u = o.get(l);
			if (u) return void ln(e, n, u);
			var c = a ? a(s, l, n + "", e, t, o) : z,
				d = c === z;
			d && (c = l, ed(l) || ks(l) ? ed(s) ? c = s : Ko(s) ? c = Kr(s) : (d = !1, c = wn(l, !0)) : ys(l) || Jo(l) ? Jo(s) ? c = Ss(s) : !ls(s) || r && as(s) ? (d = !1, c = wn(l, !0)) : c = s : d = !1), o.set(l, c), d && i(c, l, r, a, o), o["delete"](l), ln(e, n, c)
		}
		function lr(e, t) {
			var n = e.length;
			if (n) return t += t < 0 ? n : 0, Ii(t, n) ? e[t] : z
		}
		function ur(e, t, n) {
			var r = -1;
			t = d(t.length ? t : [$l], L(Li()));
			var i = rr(e, function(e, n, i) {
				var a = d(t, function(t) {
					return t(e)
				});
				return {
					criteria: a,
					index: ++r,
					value: e
				}
			});
			return U(i, function(e, t) {
				return Jr(e, t, n)
			})
		}
		function cr(e, t) {
			return e = Object(e), f(t, function(t, n) {
				return n in e && (t[n] = e[n]), t
			}, {})
		}
		function dr(e, t) {
			for (var n = -1, r = ki(e), i = r.length, a = {}; ++n < i;) {
				var o = r[n],
					s = e[o];
				t(s, o) && (a[o] = s)
			}
			return a
		}
		function hr(e) {
			return function(t) {
				return null == t ? z : t[e]
			}
		}
		function fr(e) {
			return function(t) {
				return In(t, e)
			}
		}
		function pr(e, t, n, r) {
			var i = r ? v : y,
				a = -1,
				o = t.length,
				s = e;
			for (n && (s = d(e, L(n))); ++a < o;) for (var l = 0, u = t[a], c = n ? n(u) : u;
			(l = i(s, c, l, r)) > -1;) s !== e && Yu.call(s, l, 1), Yu.call(e, l, 1);
			return e
		}
		function mr(e, t) {
			for (var n = e ? t.length : 0, r = n - 1; n--;) {
				var i = t[n];
				if (n == r || i !== a) {
					var a = i;
					if (Ii(i)) Yu.call(e, i, 1);
					else if (Wi(i, e)) delete e[Zi(i)];
					else {
						var o = Hr(i),
							s = Xi(e, o);
						null != s && delete s[Zi(Ea(o))]
					}
				}
			}
			return e
		}
		function _r(e, t) {
			return e + Au(Iu() * (t - e + 1))
		}
		function gr(e, t, n, r) {
			for (var i = -1, a = $u(Su((t - e) / (n || 1)), 0), o = Array(a); a--;) o[r ? a : ++i] = e, e += n;
			return o
		}
		function yr(e, t) {
			var n = "";
			if (!e || t < 1 || t > ge) return n;
			do t % 2 && (n += e), t = Au(t / 2), t && (e += e);
			while (t);
			return n
		}
		function vr(e, t, n, r) {
			t = Wi(t, e) ? [t] : Hr(t);
			for (var i = -1, a = t.length, o = a - 1, s = e; null != s && ++i < a;) {
				var l = Zi(t[i]);
				if (ls(s)) {
					var u = n;
					if (i != o) {
						var c = s[l];
						u = r ? r(c, l, s) : z, u === z && (u = null == c ? Ii(t[i + 1]) ? [] : {} : c)
					}
					un(s, l, u)
				}
				s = s[l]
			}
			return e
		}
		function Er(e, t, n) {
			var r = -1,
				i = e.length;
			t < 0 && (t = -t > i ? 0 : i + t), n = n > i ? i : n, n < 0 && (n += i), i = t > n ? 0 : n - t >>> 0, t >>>= 0;
			for (var a = Array(i); ++r < i;) a[r] = e[r + t];
			return a
		}
		function br(e, t) {
			var n;
			return lc(e, function(e, r, i) {
				return n = t(e, r, i), !n
			}), !! n
		}
		function Ur(e, t, n) {
			var r = 0,
				i = e ? e.length : r;
			if ("number" == typeof t && t === t && i <= Ue) {
				for (; r < i;) {
					var a = r + i >>> 1,
						o = e[a];
					null !== o && !ws(o) && (n ? o <= t : o < t) ? r = a + 1 : i = a
				}
				return i
			}
			return wr(e, t, $l, n)
		}
		function wr(e, t, n, r) {
			t = n(t);
			for (var i = 0, a = e ? e.length : 0, o = t !== t, s = null === t, l = ws(t), u = t === z; i < a;) {
				var c = Au((i + a) / 2),
					d = n(e[c]),
					h = d !== z,
					f = null === d,
					p = d === d,
					m = ws(d);
				if (o) var _ = r || p;
				else _ = u ? p && (r || h) : s ? p && h && (r || !f) : l ? p && h && !f && (r || !m) : !f && !m && (r ? d <= t : d < t);
				_ ? i = c + 1 : a = c
			}
			return Pu(a, be)
		}
		function kr(e, t) {
			for (var n = -1, r = e.length, i = 0, a = []; ++n < r;) {
				var o = e[n],
					s = t ? t(o) : o;
				if (!n || !qo(s, l)) {
					var l = s;
					a[i++] = 0 === o ? 0 : o
				}
			}
			return a
		}
		function Mr(e) {
			return "number" == typeof e ? e : ws(e) ? ve : +e
		}
		function Lr(e) {
			if ("string" == typeof e) return e;
			if (ws(e)) return sc ? sc.call(e) : "";
			var t = e + "";
			return "0" == t && 1 / e == -_e ? "-0" : t
		}
		function Fr(e, t, n) {
			var r = -1,
				i = u,
				a = e.length,
				o = !0,
				s = [],
				l = s;
			if (n) o = !1, i = c;
			else if (a >= J) {
				var d = t ? null : fc(e);
				if (d) return O(d);
				o = !1, i = Jt, l = new qt
			} else l = t ? [] : s;
			e: for (; ++r < a;) {
				var h = e[r],
					f = t ? t(h) : h;
				if (h = n || 0 !== h ? h : 0, o && f === f) {
					for (var p = l.length; p--;) if (l[p] === f) continue e;
					t && l.push(f), s.push(h)
				} else i(l, f, n) || (l !== s && l.push(f), s.push(h))
			}
			return s
		}
		function Dr(e, t) {
			t = Wi(t, e) ? [t] : Hr(t), e = Xi(e, t);
			var n = Zi(Ea(t));
			return !(null != e && Rn(e, n)) || delete e[n]
		}
		function xr(e, t, n, r) {
			return vr(e, t, n(In(e, t)), r)
		}
		function Tr(e, t, n, r) {
			for (var i = e.length, a = r ? i : -1;
			(r ? a-- : ++a < i) && t(e[a], a, e););
			return n ? Er(e, r ? 0 : a, r ? a + 1 : i) : Er(e, r ? a + 1 : 0, r ? i : a)
		}
		function Yr(e, t) {
			var n = e;
			return n instanceof Yt && (n = n.value()), f(t, function(e, t) {
				return t.func.apply(t.thisArg, h([e], t.args))
			}, n)
		}
		function Sr(e, t, n) {
			for (var r = -1, i = e.length; ++r < i;) var a = a ? h(xn(a, e[r], t, n), xn(e[r], a, t, n)) : e[r];
			return a && a.length ? Fr(a, t, n) : []
		}
		function Ar(e, t, n) {
			for (var r = -1, i = e.length, a = t.length, o = {}; ++r < i;) {
				var s = r < a ? t[r] : z;
				n(o, e[r], s)
			}
			return o
		}
		function Cr(e) {
			return Ko(e) ? e : []
		}
		function jr(e) {
			return "function" == typeof e ? e : $l
		}
		function Hr(e) {
			return ed(e) ? e : yc(e)
		}
		function Br(e, t, n) {
			var r = e.length;
			return n = n === z ? r : n, !t && n >= r ? e : Er(e, t, n)
		}
		function $r(e, t) {
			if (t) return e.slice();
			var n = new e.constructor(e.length);
			return e.copy(n), n
		}
		function Pr(e) {
			var t = new e.constructor(e.byteLength);
			return new wu(t).set(new wu(e)), t
		}
		function Or(e, t) {
			var n = t ? Pr(e.buffer) : e.buffer;
			return new e.constructor(n, e.byteOffset, e.byteLength)
		}
		function Ir(t, n, r) {
			var i = n ? r($(t), !0) : $(t);
			return f(i, e, new t.constructor)
		}
		function Nr(e) {
			var t = new e.constructor(e.source, yt.exec(e));
			return t.lastIndex = e.lastIndex, t
		}
		function Wr(e, n, r) {
			var i = n ? r(O(e), !0) : O(e);
			return f(i, t, new e.constructor)
		}
		function Rr(e) {
			return oc ? Object(oc.call(e)) : {}
		}
		function zr(e, t) {
			var n = t ? Pr(e.buffer) : e.buffer;
			return new e.constructor(n, e.byteOffset, e.length)
		}
		function qr(e, t) {
			if (e !== t) {
				var n = e !== z,
					r = null === e,
					i = e === e,
					a = ws(e),
					o = t !== z,
					s = null === t,
					l = t === t,
					u = ws(t);
				if (!s && !u && !a && e > t || a && o && l && !s && !u || r && o && l || !n && l || !i) return 1;
				if (!r && !a && !u && e < t || u && n && i && !r && !a || s && n && i || !o && i || !l) return -1
			}
			return 0
		}
		function Jr(e, t, n) {
			for (var r = -1, i = e.criteria, a = t.criteria, o = i.length, s = n.length; ++r < o;) {
				var l = qr(i[r], a[r]);
				if (l) {
					if (r >= s) return l;
					var u = n[r];
					return l * ("desc" == u ? -1 : 1)
				}
			}
			return e.index - t.index
		}
		function Vr(e, t, n, r) {
			for (var i = -1, a = e.length, o = n.length, s = -1, l = t.length, u = $u(a - o, 0), c = Array(l + u), d = !r; ++s < l;) c[s] = t[s];
			for (; ++i < o;)(d || i < a) && (c[n[i]] = e[i]);
			for (; u--;) c[s++] = e[i++];
			return c
		}
		function Gr(e, t, n, r) {
			for (var i = -1, a = e.length, o = -1, s = n.length, l = -1, u = t.length, c = $u(a - s, 0), d = Array(c + u), h = !r; ++i < c;) d[i] = e[i];
			for (var f = i; ++l < u;) d[f + l] = t[l];
			for (; ++o < s;)(h || i < a) && (d[f + n[o]] = e[i++]);
			return d
		}
		function Kr(e, t) {
			var n = -1,
				r = e.length;
			for (t || (t = Array(r)); ++n < r;) t[n] = e[n];
			return t
		}
		function Xr(e, t, n, r) {
			n || (n = {});
			for (var i = -1, a = t.length; ++i < a;) {
				var o = t[i],
					s = r ? r(n[o], e[o], o, n, e) : e[o];
				un(n, o, s)
			}
			return n
		}
		function Qr(e, t) {
			return Xr(e, Yi(e), t)
		}
		function Zr(e, t) {
			return function(n, i) {
				var a = ed(n) ? r : cn,
					o = t ? t() : {};
				return a(n, e, Li(i), o)
			}
		}
		function ei(e) {
			return Ho(function(t, n) {
				var r = -1,
					i = n.length,
					a = i > 1 ? n[i - 1] : z,
					o = i > 2 ? n[2] : z;
				for (a = "function" == typeof a ? (i--, a) : z, o && Ni(n[0], n[1], o) && (a = i < 3 ? z : a, i = 1), t = Object(t); ++r < i;) {
					var s = n[r];
					s && e(t, s, r, a)
				}
				return t
			})
		}
		function ti(e, t) {
			return function(n, r) {
				if (null == n) return n;
				if (!Go(n)) return e(n, r);
				for (var i = n.length, a = t ? i : -1, o = Object(n);
				(t ? a-- : ++a < i) && r(o[a], a, o) !== !1;);
				return n
			}
		}
		function ni(e) {
			return function(t, n, r) {
				for (var i = -1, a = Object(t), o = r(t), s = o.length; s--;) {
					var l = o[e ? s : ++i];
					if (n(a[l], l, a) === !1) break
				}
				return t
			}
		}
		function ri(e, t, n) {
			function r() {
				var t = this && this !== Hn && this instanceof r ? a : e;
				return t.apply(i ? n : this, arguments)
			}
			var i = t & X,
				a = oi(e);
			return r
		}
		function ii(e) {
			return function(t) {
				t = Cs(t);
				var n = _n.test(t) ? N(t) : z,
					r = n ? n[0] : t.charAt(0),
					i = n ? Br(n, 1).join("") : t.slice(1);
				return r[e]() + i
			}
		}
		function ai(e) {
			return function(t) {
				return f(Cl(pl(t).replace(hn, "")), e, "")
			}
		}
		function oi(e) {
			return function() {
				var t = arguments;
				switch (t.length) {
				case 0:
					return new e;
				case 1:
					return new e(t[0]);
				case 2:
					return new e(t[0], t[1]);
				case 3:
					return new e(t[0], t[1], t[2]);
				case 4:
					return new e(t[0], t[1], t[2], t[3]);
				case 5:
					return new e(t[0], t[1], t[2], t[3], t[4]);
				case 6:
					return new e(t[0], t[1], t[2], t[3], t[4], t[5]);
				case 7:
					return new e(t[0], t[1], t[2], t[3], t[4], t[5], t[6])
				}
				var n = Mn(e.prototype),
					r = e.apply(n, t);
				return ls(r) ? r : n
			}
		}
		function si(e, t, r) {
			function i() {
				for (var o = arguments.length, s = Array(o), l = o, u = xi(i); l--;) s[l] = arguments[l];
				var c = o < 3 && s[0] !== u && s[o - 1] !== u ? [] : P(s, u);
				if (o -= c.length, o < r) return gi(e, t, ui, i.placeholder, z, s, c, z, z, r - o);
				var d = this && this !== Hn && this instanceof i ? a : e;
				return n(d, this, s)
			}
			var a = oi(e);
			return i
		}
		function li(e) {
			return Ho(function(t) {
				t = jn(t, 1);
				var n = t.length,
					r = n,
					i = Tt.prototype.thru;
				for (e && t.reverse(); r--;) {
					var a = t[r];
					if ("function" != typeof a) throw new uu(V);
					if (i && !o && "wrapper" == Mi(a)) var o = new Tt([], (!0))
				}
				for (r = o ? r : n; ++r < n;) {
					a = t[r];
					var s = Mi(a),
						l = "wrapper" == s ? pc(a) : z;
					o = l && zi(l[0]) && l[1] == (ie | ee | ne | ae) && !l[4].length && 1 == l[9] ? o[Mi(l[0])].apply(o, l[3]) : 1 == a.length && zi(a) ? o[s]() : o.thru(a)
				}
				return function() {
					var e = arguments,
						r = e[0];
					if (o && 1 == e.length && ed(r) && r.length >= J) return o.plant(r).value();
					for (var i = 0, a = n ? t[i].apply(this, e) : r; ++i < n;) a = t[i].call(this, a);
					return a
				}
			})
		}
		function ui(e, t, n, r, i, a, o, s, l, u) {
			function c() {
				for (var g = arguments.length, y = g, v = Array(g); y--;) v[y] = arguments[y];
				if (p) var E = xi(c),
					b = Y(v, E);
				if (r && (v = Vr(v, r, i, p)), a && (v = Gr(v, a, o, p)), g -= b, p && g < u) {
					var U = P(v, E);
					return gi(e, t, ui, c.placeholder, n, v, U, s, l, u - g)
				}
				var w = h ? n : this,
					k = f ? w[e] : e;
				return g = v.length, s ? v = Qi(v, s) : m && g > 1 && v.reverse(), d && l < g && (v.length = l), this && this !== Hn && this instanceof c && (k = _ || oi(k)), k.apply(w, v)
			}
			var d = t & ie,
				h = t & X,
				f = t & Q,
				p = t & (ee | te),
				m = t & oe,
				_ = f ? z : oi(e);
			return c
		}
		function ci(e, t) {
			return function(n, r) {
				return Vn(n, e, t(r), {})
			}
		}
		function di(e) {
			return function(t, n) {
				var r;
				if (t === z && n === z) return 0;
				if (t !== z && (r = t), n !== z) {
					if (r === z) return n;
					"string" == typeof t || "string" == typeof n ? (t = Lr(t), n = Lr(n)) : (t = Mr(t), n = Mr(n)), r = e(t, n)
				}
				return r
			}
		}
		function hi(e) {
			return Ho(function(t) {
				return t = 1 == t.length && ed(t[0]) ? d(t[0], L(Li())) : d(jn(t, 1, Oi), L(Li())), Ho(function(r) {
					var i = this;
					return e(t, function(e) {
						return n(e, i, r)
					})
				})
			})
		}
		function fi(e, t) {
			t = t === z ? " " : Lr(t);
			var n = t.length;
			if (n < 2) return n ? yr(t, e) : t;
			var r = yr(t, Su(e / I(t)));
			return _n.test(t) ? Br(N(r), 0, e).join("") : r.slice(0, e)
		}
		function pi(e, t, r, i) {
			function a() {
				for (var t = -1, l = arguments.length, u = -1, c = i.length, d = Array(c + l), h = this && this !== Hn && this instanceof a ? s : e; ++u < c;) d[u] = i[u];
				for (; l--;) d[u++] = arguments[++t];
				return n(h, o ? r : this, d)
			}
			var o = t & X,
				s = oi(e);
			return a
		}
		function mi(e) {
			return function(t, n, r) {
				return r && "number" != typeof r && Ni(t, n, r) && (n = r = z), t = Ys(t), t = t === t ? t : 0, n === z ? (n = t, t = 0) : n = Ys(n) || 0, r = r === z ? t < n ? 1 : -1 : Ys(r) || 0, gr(t, n, r, e)
			}
		}
		function _i(e) {
			return function(t, n) {
				return "string" == typeof t && "string" == typeof n || (t = Ys(t), n = Ys(n)), e(t, n)
			}
		}
		function gi(e, t, n, r, i, a, o, s, l, u) {
			var c = t & ee,
				d = c ? o : z,
				h = c ? z : o,
				f = c ? a : z,
				p = c ? z : a;
			t |= c ? ne : re, t &= ~ (c ? re : ne), t & Z || (t &= ~ (X | Q));
			var m = [e, t, i, f, d, p, h, s, l, u],
				_ = n.apply(z, m);
			return zi(e) && gc(_, m), _.placeholder = r, _
		}
		function yi(e) {
			var t = su[e];
			return function(e, n) {
				if (e = Ys(e), n = xs(n)) {
					var r = (Cs(e) + "e").split("e"),
						i = t(r[0] + "e" + (+r[1] + n));
					return r = (Cs(i) + "e").split("e"), +(r[0] + "e" + (+r[1] - n))
				}
				return t(e)
			}
		}
		function vi(e, t, n, r, i, a, o, s) {
			var l = t & Q;
			if (!l && "function" != typeof e) throw new uu(V);
			var u = r ? r.length : 0;
			if (u || (t &= ~ (ne | re), r = i = z), o = o === z ? o : $u(xs(o), 0), s = s === z ? s : xs(s), u -= i ? i.length : 0, t & re) {
				var c = r,
					d = i;
				r = i = z
			}
			var h = l ? z : pc(e),
				f = [e, t, n, r, i, c, d, a, o, s];
			if (h && Gi(f, h), e = f[0], t = f[1], n = f[2], r = f[3], i = f[4], s = f[9] = null == f[9] ? l ? 0 : e.length : $u(f[9] - u, 0), !s && t & (ee | te) && (t &= ~ (ee | te)), t && t != X) p = t == ee || t == te ? si(e, t, s) : t != ne && t != (X | ne) || i.length ? ui.apply(z, f) : pi(e, t, n, r);
			else var p = ri(e, t, n);
			var m = h ? hc : gc;
			return m(p, f)
		}
		function Ei(e, t, n, r, i, a) {
			var o = -1,
				s = i & le,
				l = i & se,
				u = e.length,
				c = t.length;
			if (u != c && !(s && c > u)) return !1;
			var d = a.get(e);
			if (d) return d == t;
			var h = !0;
			for (a.set(e, t); ++o < u;) {
				var f = e[o],
					p = t[o];
				if (r) var _ = s ? r(p, f, o, t, e, a) : r(f, p, o, e, t, a);
				if (_ !== z) {
					if (_) continue;
					h = !1;
					break
				}
				if (l) {
					if (!m(t, function(e) {
						return f === e || n(f, e, r, i, a)
					})) {
						h = !1;
						break
					}
				} else if (f !== p && !n(f, p, r, i, a)) {
					h = !1;
					break
				}
			}
			return a["delete"](e), h
		}
		function bi(e, t, n, r, i, a, o) {
			switch (n) {
			case Ie:
				if (e.byteLength != t.byteLength || e.byteOffset != t.byteOffset) return !1;
				e = e.buffer, t = t.buffer;
			case Oe:
				return !(e.byteLength != t.byteLength || !r(new wu(e), new wu(t)));
			case Me:
			case Le:
				return +e == +t;
			case Fe:
				return e.name == t.name && e.message == t.message;
			case Ye:
				return e != +e ? t != +t : e == +t;
			case Ce:
			case He:
				return e == t + "";
			case Te:
				var s = $;
			case je:
				var l = a & le;
				if (s || (s = O), e.size != t.size && !l) return !1;
				var u = o.get(e);
				return u ? u == t : (a |= se, o.set(e, t), Ei(s(e), s(t), r, i, a, o));
			case Be:
				if (oc) return oc.call(e) == oc.call(t)
			}
			return !1
		}
		function Ui(e, t, n, r, i, a) {
			var o = i & le,
				s = Js(e),
				l = s.length,
				u = Js(t),
				c = u.length;
			if (l != c && !o) return !1;
			for (var d = l; d--;) {
				var h = s[d];
				if (!(o ? h in t : Rn(t, h))) return !1
			}
			var f = a.get(e);
			if (f) return f == t;
			var p = !0;
			a.set(e, t);
			for (var m = o; ++d < l;) {
				h = s[d];
				var _ = e[h],
					g = t[h];
				if (r) var y = o ? r(g, _, h, t, e, a) : r(_, g, h, e, t, a);
				if (!(y === z ? _ === g || n(_, g, r, i, a) : y)) {
					p = !1;
					break
				}
				m || (m = "constructor" == h)
			}
			if (p && !m) {
				var v = e.constructor,
					E = t.constructor;
				v != E && "constructor" in e && "constructor" in t && !("function" == typeof v && v instanceof v && "function" == typeof E && E instanceof E) && (p = !1)
			}
			return a["delete"](e), p
		}
		function wi(e) {
			return Nn(e, Js, Yi)
		}
		function ki(e) {
			return Nn(e, Vs, _c)
		}
		function Mi(e) {
			for (var t = e.name + "", n = Zu[t], r = pu.call(Zu, t) ? n.length : 0; r--;) {
				var i = n[r],
					a = i.func;
				if (null == a || a == e) return i.name
			}
			return t
		}
		function Li() {
			var e = Dt.iteratee || Pl;
			return e = e === Pl ? Zn : e, arguments.length ? e(arguments[0], arguments[1]) : e
		}
		function Fi(e) {
			for (var t = nl(e), n = t.length; n--;) t[n][2] = Ji(t[n][1]);
			return t
		}
		function Di(e, t) {
			var n = e[t];
			return ps(n) ? n : z
		}
		function xi(e) {
			var t = pu.call(Dt, "placeholder") ? Dt : e;
			return t.placeholder
		}
		function Ti(e) {
			return Cu(Object(e))
		}
		function Yi(e) {
			return Lu(Object(e))
		}
		function Si(e) {
			return gu.call(e)
		}
		function Ai(e, t, n) {
			for (var r = -1, i = n.length; ++r < i;) {
				var a = n[r],
					o = a.size;
				switch (a.type) {
				case "drop":
					e += o;
					break;
				case "dropRight":
					t -= o;
					break;
				case "take":
					t = Pu(t, e + o);
					break;
				case "takeRight":
					e = $u(e, t - o)
				}
			}
			return {
				start: e,
				end: t
			}
		}
		function Ci(e, t, n) {
			t = Wi(t, e) ? [t] : Hr(t);
			for (var r, i = -1, a = t.length; ++i < a;) {
				var o = Zi(t[i]);
				if (!(r = null != e && n(e, o))) break;
				e = e[o]
			}
			if (r) return r;
			var a = e ? e.length : 0;
			return !!a && ss(a) && Ii(o, a) && (ed(e) || Us(e) || Jo(e))
		}
		function ji(e) {
			var t = e.length,
				n = e.constructor(t);
			return t && "string" == typeof e[0] && pu.call(e, "index") && (n.index = e.index, n.input = e.input), n
		}
		function Hi(e) {
			return "function" != typeof e.constructor || qi(e) ? {} : Mn(Ti(e))
		}
		function Bi(e, t, n, r) {
			var i = e.constructor;
			switch (t) {
			case Oe:
				return Pr(e);
			case Me:
			case Le:
				return new i((+e));
			case Ie:
				return Or(e, r);
			case Ne:
			case We:
			case Re:
			case ze:
			case qe:
			case Je:
			case Ve:
			case Ge:
			case Ke:
				return zr(e, r);
			case Te:
				return Ir(e, r, n);
			case Ye:
			case He:
				return new i(e);
			case Ce:
				return Nr(e);
			case je:
				return Wr(e, r, n);
			case Be:
				return Rr(e)
			}
		}
		function $i(e) {
			var t = e ? e.length : z;
			return ss(t) && (ed(e) || Us(e) || Jo(e)) ? k(t, String) : null
		}
		function Pi(e) {
			return Ko(e) && (ed(e) || Jo(e))
		}
		function Oi(e) {
			return ed(e) && !(2 == e.length && !as(e[0]))
		}
		function Ii(e, t) {
			return t = null == t ? ge : t, !! t && ("number" == typeof e || kt.test(e)) && e > -1 && e % 1 == 0 && e < t
		}
		function Ni(e, t, n) {
			if (!ls(n)) return !1;
			var r = typeof t;
			return !!("number" == r ? Go(n) && Ii(t, n.length) : "string" == r && t in n) && qo(n[t], e)
		}
		function Wi(e, t) {
			if (ed(e)) return !1;
			var n = typeof e;
			return !("number" != n && "symbol" != n && "boolean" != n && null != e && !ws(e)) || (lt.test(e) || !st.test(e) || null != t && e in Object(t))
		}
		function Ri(e) {
			var t = typeof e;
			return "string" == t || "number" == t || "symbol" == t || "boolean" == t ? "__proto__" !== e : null === e
		}
		function zi(e) {
			var t = Mi(e),
				n = Dt[t];
			if ("function" != typeof n || !(t in Yt.prototype)) return !1;
			if (e === n) return !0;
			var r = pc(n);
			return !!r && e === r[0]
		}
		function qi(e) {
			var t = e && e.constructor,
				n = "function" == typeof t && t.prototype || du;
			return e === n
		}
		function Ji(e) {
			return e === e && !ls(e)
		}
		function Vi(e, t) {
			return function(n) {
				return null != n && (n[e] === t && (t !== z || e in Object(n)))
			}
		}
		function Gi(e, t) {
			var n = e[1],
				r = t[1],
				i = n | r,
				a = i < (X | Q | ie),
				o = r == ie && n == ee || r == ie && n == ae && e[7].length <= t[8] || r == (ie | ae) && t[7].length <= t[8] && n == ee;
			if (!a && !o) return e;
			r & X && (e[2] = t[2], i |= n & X ? 0 : Z);
			var s = t[3];
			if (s) {
				var l = e[3];
				e[3] = l ? Vr(l, s, t[4]) : s, e[4] = l ? P(e[3], K) : t[4]
			}
			return s = t[5], s && (l = e[5], e[5] = l ? Gr(l, s, t[6]) : s, e[6] = l ? P(e[5], K) : t[6]), s = t[7], s && (e[7] = s), r & ie && (e[8] = null == e[8] ? t[8] : Pu(e[8], t[8])), null == e[9] && (e[9] = t[9]), e[0] = t[0], e[1] = i, e
		}
		function Ki(e, t, n, r, i, a) {
			return ls(e) && ls(t) && or(e, t, z, Ki, a.set(t, e)), e
		}
		function Xi(e, t) {
			return 1 == t.length ? e : In(e, Er(t, 0, -1))
		}
		function Qi(e, t) {
			for (var n = e.length, r = Pu(t.length, n), i = Kr(e); r--;) {
				var a = t[r];
				e[r] = Ii(a, n) ? i[a] : z
			}
			return e
		}
		function Zi(e) {
			if ("string" == typeof e || ws(e)) return e;
			var t = e + "";
			return "0" == t && 1 / e == -_e ? "-0" : t
		}
		function ea(e) {
			if (null != e) {
				try {
					return fu.call(e)
				} catch (t) {}
				try {
					return e + ""
				} catch (t) {}
			}
			return ""
		}
		function ta(e) {
			if (e instanceof Yt) return e.clone();
			var t = new Tt(e.__wrapped__, e.__chain__);
			return t.__actions__ = Kr(e.__actions__), t.__index__ = e.__index__, t.__values__ = e.__values__, t
		}
		function na(e, t, n) {
			t = (n ? Ni(e, t, n) : t === z) ? 1 : $u(xs(t), 0);
			var r = e ? e.length : 0;
			if (!r || t < 1) return [];
			for (var i = 0, a = 0, o = Array(Su(r / t)); i < r;) o[a++] = Er(e, i, i += t);
			return o
		}
		function ra(e) {
			for (var t = -1, n = e ? e.length : 0, r = 0, i = []; ++t < n;) {
				var a = e[t];
				a && (i[r++] = a)
			}
			return i
		}
		function ia() {
			var e = arguments.length,
				t = Io(arguments[0]);
			if (e < 2) return e ? Kr(t) : [];
			for (var n = Array(e - 1); e--;) n[e - 1] = arguments[e];
			return i(t, jn(n, 1))
		}
		function aa(e, t, n) {
			var r = e ? e.length : 0;
			return r ? (t = n || t === z ? 1 : xs(t), Er(e, t < 0 ? 0 : t, r)) : []
		}
		function oa(e, t, n) {
			var r = e ? e.length : 0;
			return r ? (t = n || t === z ? 1 : xs(t), t = r - t, Er(e, 0, t < 0 ? 0 : t)) : []
		}
		function sa(e, t) {
			return e && e.length ? Tr(e, Li(t, 3), !0, !0) : []
		}
		function la(e, t) {
			return e && e.length ? Tr(e, Li(t, 3), !0) : []
		}
		function ua(e, t, n, r) {
			var i = e ? e.length : 0;
			return i ? (n && "number" != typeof n && Ni(e, t, n) && (n = 0, r = i), An(e, t, n, r)) : []
		}
		function ca(e, t) {
			return e && e.length ? g(e, Li(t, 3)) : -1
		}
		function da(e, t) {
			return e && e.length ? g(e, Li(t, 3), !0) : -1
		}
		function ha(e) {
			var t = e ? e.length : 0;
			return t ? jn(e, 1) : []
		}
		function fa(e) {
			var t = e ? e.length : 0;
			return t ? jn(e, _e) : []
		}
		function pa(e, t) {
			var n = e ? e.length : 0;
			return n ? (t = t === z ? 1 : xs(t), jn(e, t)) : []
		}
		function ma(e) {
			for (var t = -1, n = e ? e.length : 0, r = {}; ++t < n;) {
				var i = e[t];
				r[i[0]] = i[1]
			}
			return r
		}
		function _a(e) {
			return e && e.length ? e[0] : z
		}
		function ga(e, t, n) {
			var r = e ? e.length : 0;
			return r ? (n = xs(n), n < 0 && (n = $u(r + n, 0)), y(e, t, n)) : -1
		}
		function ya(e) {
			return oa(e, 1)
		}
		function va(e, t) {
			return e ? Hu.call(e, t) : ""
		}

		function Ea(e) {
			var t = e ? e.length : 0;
			return t ? e[t - 1] : z
		}
		function ba(e, t, n) {
			var r = e ? e.length : 0;
			if (!r) return -1;
			var i = r;
			if (n !== z && (i = xs(n), i = (i < 0 ? $u(r + i, 0) : Pu(i, r - 1)) + 1), t !== t) return j(e, i, !0);
			for (; i--;) if (e[i] === t) return i;
			return -1
		}
		function Ua(e, t) {
			return e && e.length ? lr(e, xs(t)) : z
		}
		function wa(e, t) {
			return e && e.length && t && t.length ? pr(e, t) : e
		}
		function ka(e, t, n) {
			return e && e.length && t && t.length ? pr(e, t, Li(n)) : e
		}
		function Ma(e, t, n) {
			return e && e.length && t && t.length ? pr(e, t, z, n) : e
		}
		function La(e, t) {
			var n = [];
			if (!e || !e.length) return n;
			var r = -1,
				i = [],
				a = e.length;
			for (t = Li(t, 3); ++r < a;) {
				var o = e[r];
				t(o, r, e) && (n.push(o), i.push(r))
			}
			return mr(e, i), n
		}
		function Fa(e) {
			return e ? Wu.call(e) : e
		}
		function Da(e, t, n) {
			var r = e ? e.length : 0;
			return r ? (n && "number" != typeof n && Ni(e, t, n) ? (t = 0, n = r) : (t = null == t ? 0 : xs(t), n = n === z ? r : xs(n)), Er(e, t, n)) : []
		}
		function xa(e, t) {
			return Ur(e, t)
		}
		function Ta(e, t, n) {
			return wr(e, t, Li(n))
		}
		function Ya(e, t) {
			var n = e ? e.length : 0;
			if (n) {
				var r = Ur(e, t);
				if (r < n && qo(e[r], t)) return r
			}
			return -1
		}
		function Sa(e, t) {
			return Ur(e, t, !0)
		}
		function Aa(e, t, n) {
			return wr(e, t, Li(n), !0)
		}
		function Ca(e, t) {
			var n = e ? e.length : 0;
			if (n) {
				var r = Ur(e, t, !0) - 1;
				if (qo(e[r], t)) return r
			}
			return -1
		}
		function ja(e) {
			return e && e.length ? kr(e) : []
		}
		function Ha(e, t) {
			return e && e.length ? kr(e, Li(t)) : []
		}
		function Ba(e) {
			return aa(e, 1)
		}
		function $a(e, t, n) {
			return e && e.length ? (t = n || t === z ? 1 : xs(t), Er(e, 0, t < 0 ? 0 : t)) : []
		}
		function Pa(e, t, n) {
			var r = e ? e.length : 0;
			return r ? (t = n || t === z ? 1 : xs(t), t = r - t, Er(e, t < 0 ? 0 : t, r)) : []
		}
		function Oa(e, t) {
			return e && e.length ? Tr(e, Li(t, 3), !1, !0) : []
		}
		function Ia(e, t) {
			return e && e.length ? Tr(e, Li(t, 3)) : []
		}
		function Na(e) {
			return e && e.length ? Fr(e) : []
		}
		function Wa(e, t) {
			return e && e.length ? Fr(e, Li(t)) : []
		}
		function Ra(e, t) {
			return e && e.length ? Fr(e, z, t) : []
		}
		function za(e) {
			if (!e || !e.length) return [];
			var t = 0;
			return e = l(e, function(e) {
				if (Ko(e)) return t = $u(e.length, t), !0
			}), k(t, function(t) {
				return d(e, hr(t))
			})
		}
		function qa(e, t) {
			if (!e || !e.length) return [];
			var r = za(e);
			return null == t ? r : d(r, function(e) {
				return n(t, z, e)
			})
		}
		function Ja(e, t) {
			return Ar(e || [], t || [], un)
		}
		function Va(e, t) {
			return Ar(e || [], t || [], vr)
		}
		function Ga(e) {
			var t = Dt(e);
			return t.__chain__ = !0, t
		}
		function Ka(e, t) {
			return t(e), e
		}
		function Xa(e, t) {
			return t(e)
		}
		function Qa() {
			return Ga(this)
		}
		function Za() {
			return new Tt(this.value(), this.__chain__)
		}
		function eo() {
			this.__values__ === z && (this.__values__ = Ds(this.value()));
			var e = this.__index__ >= this.__values__.length,
				t = e ? z : this.__values__[this.__index__++];
			return {
				done: e,
				value: t
			}
		}
		function to() {
			return this
		}
		function no(e) {
			for (var t, n = this; n instanceof xt;) {
				var r = ta(n);
				r.__index__ = 0, r.__values__ = z, t ? i.__wrapped__ = r : t = r;
				var i = r;
				n = n.__wrapped__
			}
			return i.__wrapped__ = e, t
		}
		function ro() {
			var e = this.__wrapped__;
			if (e instanceof Yt) {
				var t = e;
				return this.__actions__.length && (t = new Yt(this)), t = t.reverse(), t.__actions__.push({
					func: Xa,
					args: [Fa],
					thisArg: z
				}), new Tt(t, this.__chain__)
			}
			return this.thru(Fa)
		}
		function io() {
			return Yr(this.__wrapped__, this.__actions__)
		}
		function ao(e, t, n) {
			var r = ed(e) ? s : Tn;
			return n && Ni(e, t, n) && (t = z), r(e, Li(t, 3))
		}
		function oo(e, t) {
			var n = ed(e) ? l : Cn;
			return n(e, Li(t, 3))
		}
		function so(e, t) {
			if (t = Li(t, 3), ed(e)) {
				var n = g(e, t);
				return n > -1 ? e[n] : z
			}
			return _(e, t, lc)
		}
		function lo(e, t) {
			if (t = Li(t, 3), ed(e)) {
				var n = g(e, t, !0);
				return n > -1 ? e[n] : z
			}
			return _(e, t, uc)
		}
		function uo(e, t) {
			return jn(_o(e, t), 1)
		}
		function co(e, t) {
			return jn(_o(e, t), _e)
		}
		function ho(e, t, n) {
			return n = n === z ? 1 : xs(n), jn(_o(e, t), n)
		}
		function fo(e, t) {
			return "function" == typeof t && ed(e) ? a(e, t) : lc(e, Li(t))
		}
		function po(e, t) {
			return "function" == typeof t && ed(e) ? o(e, t) : uc(e, Li(t))
		}
		function mo(e, t, n, r) {
			e = Go(e) ? e : ll(e), n = n && !r ? xs(n) : 0;
			var i = e.length;
			return n < 0 && (n = $u(i + n, 0)), Us(e) ? n <= i && e.indexOf(t, n) > -1 : !! i && y(e, t, n) > -1
		}
		function _o(e, t) {
			var n = ed(e) ? d : rr;
			return n(e, Li(t, 3))
		}
		function go(e, t, n, r) {
			return null == e ? [] : (ed(t) || (t = null == t ? [] : [t]), n = r ? z : n, ed(n) || (n = null == n ? [] : [n]), ur(e, t, n))
		}
		function yo(e, t, n) {
			var r = ed(e) ? f : b,
				i = arguments.length < 3;
			return r(e, Li(t, 4), n, i, lc)
		}
		function vo(e, t, n) {
			var r = ed(e) ? p : b,
				i = arguments.length < 3;
			return r(e, Li(t, 4), n, i, uc)
		}
		function Eo(e, t) {
			var n = ed(e) ? l : Cn;
			return t = Li(t, 3), n(e, function(e, n, r) {
				return !t(e, n, r)
			})
		}
		function bo(e) {
			var t = Go(e) ? e : ll(e),
				n = t.length;
			return n > 0 ? t[_r(0, n - 1)] : z
		}
		function Uo(e, t, n) {
			var r = -1,
				i = Ds(e),
				a = i.length,
				o = a - 1;
			for (t = (n ? Ni(e, t, n) : t === z) ? 1 : Un(xs(t), 0, a); ++r < t;) {
				var s = _r(r, o),
					l = i[s];
				i[s] = i[r], i[r] = l
			}
			return i.length = t, i
		}
		function wo(e) {
			return Uo(e, Ee)
		}
		function ko(e) {
			if (null == e) return 0;
			if (Go(e)) {
				var t = e.length;
				return t && Us(e) ? I(e) : t
			}
			if (us(e)) {
				var n = Si(e);
				if (n == Te || n == je) return e.size
			}
			return Js(e).length
		}
		function Mo(e, t, n) {
			var r = ed(e) ? m : br;
			return n && Ni(e, t, n) && (t = z), r(e, Li(t, 3))
		}
		function Lo(e, t) {
			if ("function" != typeof t) throw new uu(V);
			return e = xs(e), function() {
				if (--e < 1) return t.apply(this, arguments)
			}
		}
		function Fo(e, t, n) {
			return t = n ? z : t, t = e && null == t ? e.length : t, vi(e, ie, z, z, z, z, t)
		}
		function Do(e, t) {
			var n;
			if ("function" != typeof t) throw new uu(V);
			return e = xs(e), function() {
				return --e > 0 && (n = t.apply(this, arguments)), e <= 1 && (t = z), n
			}
		}
		function xo(e, t, n) {
			t = n ? z : t;
			var r = vi(e, ee, z, z, z, z, z, t);
			return r.placeholder = xo.placeholder, r
		}
		function To(e, t, n) {
			t = n ? z : t;
			var r = vi(e, te, z, z, z, z, z, t);
			return r.placeholder = To.placeholder, r
		}
		function Yo(e, t, n) {
			function r(t) {
				var n = h,
					r = f;
				return h = f = z, y = t, m = e.apply(r, n)
			}
			function i(e) {
				return y = e, _ = Tu(s, t), v ? r(e) : m
			}
			function a(e) {
				var n = e - g,
					r = e - y,
					i = t - n;
				return E ? Pu(i, p - r) : i
			}
			function o(e) {
				var n = e - g,
					r = e - y;
				return !g || n >= t || n < 0 || E && r >= p
			}
			function s() {
				var e = Wc();
				return o(e) ? l(e) : void(_ = Tu(s, a(e)))
			}
			function l(e) {
				return ku(_), _ = z, b && h ? r(e) : (h = f = z, m)
			}
			function u() {
				_ !== z && ku(_), g = y = 0, h = f = _ = z
			}
			function c() {
				return _ === z ? m : l(Wc())
			}
			function d() {
				var e = Wc(),
					n = o(e);
				if (h = arguments, f = this, g = e, n) {
					if (_ === z) return i(g);
					if (E) return ku(_), _ = Tu(s, t), r(g)
				}
				return _ === z && (_ = Tu(s, t)), m
			}
			var h, f, p, m, _, g = 0,
				y = 0,
				v = !1,
				E = !1,
				b = !0;
			if ("function" != typeof e) throw new uu(V);
			return t = Ys(t) || 0, ls(n) && (v = !! n.leading, E = "maxWait" in n, p = E ? $u(Ys(n.maxWait) || 0, t) : p, b = "trailing" in n ? !! n.trailing : b), d.cancel = u, d.flush = c, d
		}
		function So(e) {
			return vi(e, oe)
		}
		function Ao(e, t) {
			if ("function" != typeof e || t && "function" != typeof t) throw new uu(V);
			var n = function() {
					var r = arguments,
						i = t ? t.apply(this, r) : r[0],
						a = n.cache;
					if (a.has(i)) return a.get(i);
					var o = e.apply(this, r);
					return n.cache = a.set(i, o), o
				};
			return n.cache = new(Ao.Cache || Ot), n
		}
		function Co(e) {
			if ("function" != typeof e) throw new uu(V);
			return function() {
				return !e.apply(this, arguments)
			}
		}
		function jo(e) {
			return Do(2, e)
		}
		function Ho(e, t) {
			if ("function" != typeof e) throw new uu(V);
			return t = $u(t === z ? e.length - 1 : xs(t), 0), function() {
				for (var r = arguments, i = -1, a = $u(r.length - t, 0), o = Array(a); ++i < a;) o[i] = r[t + i];
				switch (t) {
				case 0:
					return e.call(this, o);
				case 1:
					return e.call(this, r[0], o);
				case 2:
					return e.call(this, r[0], r[1], o)
				}
				var s = Array(t + 1);
				for (i = -1; ++i < t;) s[i] = r[i];
				return s[t] = o, n(e, this, s)
			}
		}
		function Bo(e, t) {
			if ("function" != typeof e) throw new uu(V);
			return t = t === z ? 0 : $u(xs(t), 0), Ho(function(r) {
				var i = r[t],
					a = Br(r, 0, t);
				return i && h(a, i), n(e, this, a)
			})
		}
		function $o(e, t, n) {
			var r = !0,
				i = !0;
			if ("function" != typeof e) throw new uu(V);
			return ls(n) && (r = "leading" in n ? !! n.leading : r, i = "trailing" in n ? !! n.trailing : i), Yo(e, t, {
				leading: r,
				maxWait: t,
				trailing: i
			})
		}
		function Po(e) {
			return Fo(e, 1)
		}
		function Oo(e, t) {
			return t = null == t ? $l : t, Gc(t, e)
		}
		function Io() {
			if (!arguments.length) return [];
			var e = arguments[0];
			return ed(e) ? e : [e]
		}
		function No(e) {
			return wn(e, !1, !0)
		}
		function Wo(e, t) {
			return wn(e, !1, !0, t)
		}
		function Ro(e) {
			return wn(e, !0, !0)
		}
		function zo(e, t) {
			return wn(e, !0, !0, t)
		}
		function qo(e, t) {
			return e === t || e !== e && t !== t
		}
		function Jo(e) {
			return Ko(e) && pu.call(e, "callee") && (!xu.call(e, "callee") || gu.call(e) == we)
		}
		function Vo(e) {
			return us(e) && gu.call(e) == Oe
		}
		function Go(e) {
			return null != e && ss(mc(e)) && !as(e)
		}
		function Ko(e) {
			return us(e) && Go(e)
		}
		function Xo(e) {
			return e === !0 || e === !1 || us(e) && gu.call(e) == Me
		}
		function Qo(e) {
			return us(e) && gu.call(e) == Le
		}
		function Zo(e) {
			return !!e && 1 === e.nodeType && us(e) && !ys(e)
		}
		function es(e) {
			if (Go(e) && (ed(e) || Us(e) || as(e.splice) || Jo(e) || td(e))) return !e.length;
			if (us(e)) {
				var t = Si(e);
				if (t == Te || t == je) return !e.size
			}
			for (var n in e) if (pu.call(e, n)) return !1;
			return !(Qu && Js(e).length)
		}
		function ts(e, t) {
			return Kn(e, t)
		}
		function ns(e, t, n) {
			n = "function" == typeof n ? n : z;
			var r = n ? n(e, t) : z;
			return r === z ? Kn(e, t, n) : !! r
		}
		function rs(e) {
			return !!us(e) && (gu.call(e) == Fe || "string" == typeof e.message && "string" == typeof e.name)
		}
		function is(e) {
			return "number" == typeof e && ju(e)
		}
		function as(e) {
			var t = ls(e) ? gu.call(e) : "";
			return t == De || t == xe
		}
		function os(e) {
			return "number" == typeof e && e == xs(e)
		}
		function ss(e) {
			return "number" == typeof e && e > -1 && e % 1 == 0 && e <= ge
		}
		function ls(e) {
			var t = typeof e;
			return !!e && ("object" == t || "function" == t)
		}
		function us(e) {
			return !!e && "object" == typeof e
		}
		function cs(e) {
			return us(e) && Si(e) == Te
		}
		function ds(e, t) {
			return e === t || Qn(e, t, Fi(t))
		}
		function hs(e, t, n) {
			return n = "function" == typeof n ? n : z, Qn(e, t, Fi(t), n)
		}
		function fs(e) {
			return gs(e) && e != +e
		}
		function ps(e) {
			if (!ls(e)) return !1;
			var t = as(e) || H(e) ? vu : Ut;
			return t.test(ea(e))
		}
		function ms(e) {
			return null === e
		}
		function _s(e) {
			return null == e
		}
		function gs(e) {
			return "number" == typeof e || us(e) && gu.call(e) == Ye
		}
		function ys(e) {
			if (!us(e) || gu.call(e) != Se || H(e)) return !1;
			var t = Ti(e);
			if (null === t) return !0;
			var n = pu.call(t, "constructor") && t.constructor;
			return "function" == typeof n && n instanceof n && fu.call(n) == _u
		}
		function vs(e) {
			return ls(e) && gu.call(e) == Ce
		}
		function Es(e) {
			return os(e) && e >= -ge && e <= ge
		}
		function bs(e) {
			return us(e) && Si(e) == je
		}
		function Us(e) {
			return "string" == typeof e || !ed(e) && us(e) && gu.call(e) == He
		}
		function ws(e) {
			return "symbol" == typeof e || us(e) && gu.call(e) == Be
		}
		function ks(e) {
			return us(e) && ss(e.length) && !! En[gu.call(e)]
		}
		function Ms(e) {
			return e === z
		}
		function Ls(e) {
			return us(e) && Si(e) == $e
		}
		function Fs(e) {
			return us(e) && gu.call(e) == Pe
		}
		function Ds(e) {
			if (!e) return [];
			if (Go(e)) return Us(e) ? N(e) : Kr(e);
			if (Fu && e[Fu]) return B(e[Fu]());
			var t = Si(e),
				n = t == Te ? $ : t == je ? O : ll;
			return n(e)
		}
		function xs(e) {
			if (!e) return 0 === e ? e : 0;
			if (e = Ys(e), e === _e || e === -_e) {
				var t = e < 0 ? -1 : 1;
				return t * ye
			}
			var n = e % 1;
			return e === e ? n ? e - n : e : 0
		}
		function Ts(e) {
			return e ? Un(xs(e), 0, Ee) : 0
		}
		function Ys(e) {
			if ("number" == typeof e) return e;
			if (ws(e)) return ve;
			if (ls(e)) {
				var t = as(e.valueOf) ? e.valueOf() : e;
				e = ls(t) ? t + "" : t
			}
			if ("string" != typeof e) return 0 === e ? e : +e;
			e = e.replace(ht, "");
			var n = bt.test(e);
			return n || wt.test(e) ? Dn(e.slice(2), n ? 2 : 8) : Et.test(e) ? ve : +e
		}
		function Ss(e) {
			return Xr(e, Vs(e))
		}
		function As(e) {
			return Un(xs(e), -ge, ge)
		}
		function Cs(e) {
			return null == e ? "" : Lr(e)
		}
		function js(e, t) {
			var n = Mn(e);
			return t ? dn(n, t) : n
		}
		function Hs(e, t) {
			return _(e, Li(t, 3), $n, !0)
		}
		function Bs(e, t) {
			return _(e, Li(t, 3), Pn, !0)
		}
		function $s(e, t) {
			return null == e ? e : cc(e, Li(t), Vs)
		}
		function Ps(e, t) {
			return null == e ? e : dc(e, Li(t), Vs)
		}
		function Os(e, t) {
			return e && $n(e, Li(t))
		}
		function Is(e, t) {
			return e && Pn(e, Li(t))
		}
		function Ns(e) {
			return null == e ? [] : On(e, Js(e))
		}
		function Ws(e) {
			return null == e ? [] : On(e, Vs(e))
		}
		function Rs(e, t, n) {
			var r = null == e ? z : In(e, t);
			return r === z ? n : r
		}
		function zs(e, t) {
			return null != e && Ci(e, t, Rn)
		}
		function qs(e, t) {
			return null != e && Ci(e, t, zn)
		}
		function Js(e) {
			var t = qi(e);
			if (!t && !Go(e)) return er(e);
			var n = $i(e),
				r = !! n,
				i = n || [],
				a = i.length;
			for (var o in e)!Rn(e, o) || r && ("length" == o || Ii(o, a)) || t && "constructor" == o || i.push(o);
			return i
		}
		function Vs(e) {
			for (var t = -1, n = qi(e), r = tr(e), i = r.length, a = $i(e), o = !! a, s = a || [], l = s.length; ++t < i;) {
				var u = r[t];
				o && ("length" == u || Ii(u, l)) || "constructor" == u && (n || !pu.call(e, u)) || s.push(u)
			}
			return s
		}
		function Gs(e, t) {
			var n = {};
			return t = Li(t, 3), $n(e, function(e, r, i) {
				n[t(e, r, i)] = e
			}), n
		}
		function Ks(e, t) {
			var n = {};
			return t = Li(t, 3), $n(e, function(e, r, i) {
				n[r] = t(e, r, i)
			}), n
		}
		function Xs(e, t) {
			return t = Li(t), dr(e, function(e, n) {
				return !t(e, n)
			})
		}
		function Qs(e, t) {
			return null == e ? {} : dr(e, Li(t))
		}
		function Zs(e, t, n) {
			t = Wi(t, e) ? [t] : Hr(t);
			var r = -1,
				i = t.length;
			for (i || (e = z, i = 1); ++r < i;) {
				var a = null == e ? z : e[Zi(t[r])];
				a === z && (r = i, a = n), e = as(a) ? a.call(e) : a
			}
			return e
		}
		function el(e, t, n) {
			return null == e ? e : vr(e, t, n)
		}
		function tl(e, t, n, r) {
			return r = "function" == typeof r ? r : z, null == e ? e : vr(e, t, n, r)
		}
		function nl(e) {
			return M(e, Js(e))
		}
		function rl(e) {
			return M(e, Vs(e))
		}
		function il(e, t, n) {
			var r = ed(e) || ks(e);
			if (t = Li(t, 4), null == n) if (r || ls(e)) {
				var i = e.constructor;
				n = r ? ed(e) ? new i : [] : as(i) ? Mn(Ti(e)) : {}
			} else n = {};
			return (r ? a : $n)(e, function(e, r, i) {
				return t(n, e, r, i)
			}), n
		}
		function al(e, t) {
			return null == e || Dr(e, t)
		}
		function ol(e, t, n) {
			return null == e ? e : xr(e, t, jr(n))
		}
		function sl(e, t, n, r) {
			return r = "function" == typeof r ? r : z, null == e ? e : xr(e, t, jr(n), r)
		}
		function ll(e) {
			return e ? F(e, Js(e)) : []
		}
		function ul(e) {
			return null == e ? [] : F(e, Vs(e))
		}
		function cl(e, t, n) {
			return n === z && (n = t, t = z), n !== z && (n = Ys(n), n = n === n ? n : 0), t !== z && (t = Ys(t), t = t === t ? t : 0), Un(Ys(e), t, n)
		}
		function dl(e, t, n) {
			return t = Ys(t) || 0, n === z ? (n = t, t = 0) : n = Ys(n) || 0, e = Ys(e), qn(e, t, n)
		}
		function hl(e, t, n) {
			if (n && "boolean" != typeof n && Ni(e, t, n) && (t = n = z), n === z && ("boolean" == typeof t ? (n = t, t = z) : "boolean" == typeof e && (n = e, e = z)), e === z && t === z ? (e = 0, t = 1) : (e = Ys(e) || 0, t === z ? (t = e, e = 0) : t = Ys(t) || 0), e > t) {
				var r = e;
				e = t, t = r
			}
			if (n || e % 1 || t % 1) {
				var i = Iu();
				return Pu(e + i * (t - e + Fn("1e-" + ((i + "").length - 1))), t)
			}
			return _r(e, t)
		}
		function fl(e) {
			return Md(Cs(e).toLowerCase())
		}
		function pl(e) {
			return e = Cs(e), e && e.replace(Mt, S).replace(fn, "")
		}
		function ml(e, t, n) {
			e = Cs(e), t = Lr(t);
			var r = e.length;
			return n = n === z ? r : Un(xs(n), 0, r), n -= t.length, n >= 0 && e.indexOf(t, n) == n
		}
		function _l(e) {
			return e = Cs(e), e && rt.test(e) ? e.replace(tt, A) : e
		}
		function gl(e) {
			return e = Cs(e), e && dt.test(e) ? e.replace(ct, "\\$&") : e
		}
		function yl(e, t, n) {
			e = Cs(e), t = xs(t);
			var r = t ? I(e) : 0;
			if (!t || r >= t) return e;
			var i = (t - r) / 2;
			return fi(Au(i), n) + e + fi(Su(i), n)
		}
		function vl(e, t, n) {
			e = Cs(e), t = xs(t);
			var r = t ? I(e) : 0;
			return t && r < t ? e + fi(t - r, n) : e
		}
		function El(e, t, n) {
			e = Cs(e), t = xs(t);
			var r = t ? I(e) : 0;
			return t && r < t ? fi(t - r, n) + e : e
		}
		function bl(e, t, n) {
			return n || null == t ? t = 0 : t && (t = +t), e = Cs(e).replace(ht, ""), Ou(e, t || (vt.test(e) ? 16 : 10))
		}
		function Ul(e, t, n) {
			return t = (n ? Ni(e, t, n) : t === z) ? 1 : xs(t), yr(Cs(e), t)
		}
		function wl() {
			var e = arguments,
				t = Cs(e[0]);
			return e.length < 3 ? t : Nu.call(t, e[1], e[2])
		}
		function kl(e, t, n) {
			return n && "number" != typeof n && Ni(e, t, n) && (t = n = z), (n = n === z ? Ee : n >>> 0) ? (e = Cs(e), e && ("string" == typeof t || null != t && !vs(t)) && (t = Lr(t), "" == t && _n.test(e)) ? Br(N(e), 0, n) : Ru.call(e, t, n)) : []
		}
		function Ml(e, t, n) {
			return e = Cs(e), n = Un(xs(n), 0, e.length), e.lastIndexOf(Lr(t), n) == n
		}
		function Ll(e, t, n) {
			var r = Dt.templateSettings;
			n && Ni(e, t, n) && (t = z), e = Cs(e), t = od({}, t, r, sn);
			var i, a, o = od({}, t.imports, r.imports, sn),
				s = Js(o),
				l = F(o, s),
				u = 0,
				c = t.interpolate || Lt,
				d = "__p += '",
				h = lu((t.escape || Lt).source + "|" + c.source + "|" + (c === ot ? gt : Lt).source + "|" + (t.evaluate || Lt).source + "|$", "g"),
				f = "//# sourceURL=" + ("sourceURL" in t ? t.sourceURL : "lodash.templateSources[" + ++vn + "]") + "\n";
			e.replace(h, function(t, n, r, o, s, l) {
				return r || (r = o), d += e.slice(u, l).replace(Ft, C), n && (i = !0, d += "' +\n__e(" + n + ") +\n'"), s && (a = !0, d += "';\n" + s + ";\n__p += '"), r && (d += "' +\n((__t = (" + r + ")) == null ? '' : __t) +\n'"), u = l + t.length, t
			}), d += "';\n";
			var p = t.variable;
			p || (d = "with (obj) {\n" + d + "\n}\n"), d = (a ? d.replace(Xe, "") : d).replace(Qe, "$1").replace(Ze, "$1;"), d = "function(" + (p || "obj") + ") {\n" + (p ? "" : "obj || (obj = {});\n") + "var __t, __p = ''" + (i ? ", __e = _.escape" : "") + (a ? ", __j = Array.prototype.join;\nfunction print() { __p += __j.call(arguments, '') }\n" : ";\n") + d + "return __p\n}";
			var m = Ld(function() {
				return Function(s, f + "return " + d).apply(z, l)
			});
			if (m.source = d, rs(m)) throw m;
			return m
		}
		function Fl(e) {
			return Cs(e).toLowerCase()
		}
		function Dl(e) {
			return Cs(e).toUpperCase()
		}
		function xl(e, t, n) {
			if (e = Cs(e), e && (n || t === z)) return e.replace(ht, "");
			if (!e || !(t = Lr(t))) return e;
			var r = N(e),
				i = N(t),
				a = D(r, i),
				o = x(r, i) + 1;
			return Br(r, a, o).join("")
		}
		function Tl(e, t, n) {
			if (e = Cs(e), e && (n || t === z)) return e.replace(pt, "");
			if (!e || !(t = Lr(t))) return e;
			var r = N(e),
				i = x(r, N(t)) + 1;
			return Br(r, 0, i).join("")
		}
		function Yl(e, t, n) {
			if (e = Cs(e), e && (n || t === z)) return e.replace(ft, "");
			if (!e || !(t = Lr(t))) return e;
			var r = N(e),
				i = D(r, N(t));
			return Br(r, i).join("")
		}
		function Sl(e, t) {
			var n = ue,
				r = ce;
			if (ls(t)) {
				var i = "separator" in t ? t.separator : i;
				n = "length" in t ? xs(t.length) : n, r = "omission" in t ? Lr(t.omission) : r
			}
			e = Cs(e);
			var a = e.length;
			if (_n.test(e)) {
				var o = N(e);
				a = o.length
			}
			if (n >= a) return e;
			var s = n - I(r);
			if (s < 1) return r;
			var l = o ? Br(o, 0, s).join("") : e.slice(0, s);
			if (i === z) return l + r;
			if (o && (s += l.length - s), vs(i)) {
				if (e.slice(s).search(i)) {
					var u, c = l;
					for (i.global || (i = lu(i.source, Cs(yt.exec(i)) + "g")), i.lastIndex = 0; u = i.exec(c);) var d = u.index;
					l = l.slice(0, d === z ? s : d)
				}
			} else if (e.indexOf(Lr(i), s) != s) {
				var h = l.lastIndexOf(i);
				h > -1 && (l = l.slice(0, h))
			}
			return l + r
		}
		function Al(e) {
			return e = Cs(e), e && nt.test(e) ? e.replace(et, W) : e
		}
		function Cl(e, t, n) {
			return e = Cs(e), t = n ? z : t, t === z && (t = gn.test(e) ? mn : mt), e.match(t) || []
		}
		function jl(e) {
			var t = e ? e.length : 0,
				r = Li();
			return e = t ? d(e, function(e) {
				if ("function" != typeof e[1]) throw new uu(V);
				return [r(e[0]), e[1]]
			}) : [], Ho(function(r) {
				for (var i = -1; ++i < t;) {
					var a = e[i];
					if (n(a[0], this, r)) return n(a[1], this, r)
				}
			})
		}
		function Hl(e) {
			return kn(wn(e, !0))
		}
		function Bl(e) {
			return function() {
				return e
			}
		}
		function $l(e) {
			return e
		}
		function Pl(e) {
			return Zn("function" == typeof e ? e : wn(e, !0))
		}
		function Ol(e) {
			return ir(wn(e, !0))
		}
		function Il(e, t) {
			return ar(e, wn(t, !0))
		}
		function Nl(e, t, n) {
			var r = Js(t),
				i = On(t, r);
			null != n || ls(t) && (i.length || !r.length) || (n = t, t = e, e = this, i = On(t, Js(t)));
			var o = !(ls(n) && "chain" in n && !n.chain),
				s = as(e);
			return a(i, function(n) {
				var r = t[n];
				e[n] = r, s && (e.prototype[n] = function() {
					var t = this.__chain__;
					if (o || t) {
						var n = e(this.__wrapped__),
							i = n.__actions__ = Kr(this.__actions__);
						return i.push({
							func: r,
							args: arguments,
							thisArg: e
						}), n.__chain__ = t, n
					}
					return r.apply(e, h([this.value()], arguments))
				})
			}), e
		}
		function Wl() {
			return Hn._ === this && (Hn._ = yu), this
		}
		function Rl() {}
		function zl(e) {
			return e = xs(e), Ho(function(t) {
				return lr(t, e)
			})
		}
		function ql(e) {
			return Wi(e) ? hr(Zi(e)) : fr(e)
		}
		function Jl(e) {
			return function(t) {
				return null == e ? z : In(e, t)
			}
		}
		function Vl(e, t) {
			if (e = xs(e), e < 1 || e > ge) return [];
			var n = Ee,
				r = Pu(e, Ee);
			t = Li(t), e -= Ee;
			for (var i = k(r, t); ++n < e;) t(n);
			return i
		}
		function Gl(e) {
			return ed(e) ? d(e, Zi) : ws(e) ? [e] : Kr(yc(e))
		}
		function Kl(e) {
			var t = ++mu;
			return Cs(e) + t
		}
		function Xl(e) {
			return e && e.length ? Sn(e, $l, Wn) : z
		}
		function Ql(e, t) {
			return e && e.length ? Sn(e, Li(t), Wn) : z
		}
		function Zl(e) {
			return E(e, $l)
		}
		function eu(e, t) {
			return E(e, Li(t))
		}
		function tu(e) {
			return e && e.length ? Sn(e, $l, nr) : z
		}
		function nu(e, t) {
			return e && e.length ? Sn(e, Li(t), nr) : z
		}
		function ru(e) {
			return e && e.length ? w(e, $l) : 0
		}
		function iu(e, t) {
			return e && e.length ? w(e, Li(t)) : 0
		}
		T = T ? Bn.defaults({}, T, Bn.pick(Hn, yn)) : Hn;
		var au = T.Date,
			ou = T.Error,
			su = T.Math,
			lu = T.RegExp,
			uu = T.TypeError,
			cu = T.Array.prototype,
			du = T.Object.prototype,
			hu = T.String.prototype,
			fu = T.Function.prototype.toString,
			pu = du.hasOwnProperty,
			mu = 0,
			_u = fu.call(Object),
			gu = du.toString,
			yu = Hn._,
			vu = lu("^" + fu.call(pu).replace(ct, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$"),
			Eu = Yn ? T.Buffer : z,
			bu = T.Reflect,
			Uu = T.Symbol,
			wu = T.Uint8Array,
			ku = T.clearTimeout,
			Mu = bu ? bu.enumerate : z,
			Lu = Object.getOwnPropertySymbols,
			Fu = "symbol" == typeof(Fu = Uu && Uu.iterator) ? Fu : z,
			Du = Object.create,
			xu = du.propertyIsEnumerable,
			Tu = T.setTimeout,
			Yu = cu.splice,
			Su = su.ceil,
			Au = su.floor,
			Cu = Object.getPrototypeOf,
			ju = T.isFinite,
			Hu = cu.join,
			Bu = Object.keys,
			$u = su.max,
			Pu = su.min,
			Ou = T.parseInt,
			Iu = su.random,
			Nu = hu.replace,
			Wu = cu.reverse,
			Ru = hu.split,
			zu = Di(T, "DataView"),
			qu = Di(T, "Map"),
			Ju = Di(T, "Promise"),
			Vu = Di(T, "Set"),
			Gu = Di(T, "WeakMap"),
			Ku = Di(Object, "create"),
			Xu = Gu && new Gu,
			Qu = !xu.call({
				valueOf: 1
			}, "valueOf"),
			Zu = {},
			ec = ea(zu),
			tc = ea(qu),
			nc = ea(Ju),
			rc = ea(Vu),
			ic = ea(Gu),
			ac = Uu ? Uu.prototype : z,
			oc = ac ? ac.valueOf : z,
			sc = ac ? ac.toString : z;
		Dt.templateSettings = {
			escape: it,
			evaluate: at,
			interpolate: ot,
			variable: "",
			imports: {
				_: Dt
			}
		}, Dt.prototype = xt.prototype, Dt.prototype.constructor = Dt, Tt.prototype = Mn(xt.prototype), Tt.prototype.constructor = Tt, Yt.prototype = Mn(xt.prototype), Yt.prototype.constructor = Yt, jt.prototype = Ku ? Ku(null) : du, Ot.prototype.clear = It, Ot.prototype["delete"] = Nt, Ot.prototype.get = Wt, Ot.prototype.has = Rt, Ot.prototype.set = zt, qt.prototype.push = Vt, Gt.prototype.clear = Kt, Gt.prototype["delete"] = Xt, Gt.prototype.get = Qt, Gt.prototype.has = Zt, Gt.prototype.set = en;
		var lc = ti($n),
			uc = ti(Pn, !0),
			cc = ni(),
			dc = ni(!0);
		Mu && !xu.call({
			valueOf: 1
		}, "valueOf") && (tr = function(e) {
			return B(Mu(e))
		});
		var hc = Xu ?
		function(e, t) {
			return Xu.set(e, t), e
		} : $l, fc = Vu && 1 / O(new Vu([, -0]))[1] == _e ?
		function(e) {
			return new Vu(e)
		} : Rl, pc = Xu ?
		function(e) {
			return Xu.get(e)
		} : Rl, mc = hr("length");
		Lu || (Yi = function() {
			return []
		});
		var _c = Lu ?
		function(e) {
			for (var t = []; e;) h(t, Yi(e)), e = Ti(e);
			return t
		} : Yi;
		(zu && Si(new zu(new ArrayBuffer(1))) != Ie || qu && Si(new qu) != Te || Ju && Si(Ju.resolve()) != Ae || Vu && Si(new Vu) != je || Gu && Si(new Gu) != $e) && (Si = function(e) {
			var t = gu.call(e),
				n = t == Se ? e.constructor : z,
				r = n ? ea(n) : z;
			if (r) switch (r) {
			case ec:
				return Ie;
			case tc:
				return Te;
			case nc:
				return Ae;
			case rc:
				return je;
			case ic:
				return $e
			}
			return t
		});
		var gc = function() {
				var e = 0,
					t = 0;
				return function(n, r) {
					var i = Wc(),
						a = he - (i - t);
					if (t = i, a > 0) {
						if (++e >= de) return n
					} else e = 0;
					return hc(n, r)
				}
			}(),
			yc = Ao(function(e) {
				var t = [];
				return Cs(e).replace(ut, function(e, n, r, i) {
					t.push(r ? i.replace(_t, "$1") : n || e)
				}), t
			}),
			vc = Ho(function(e, t) {
				return Ko(e) ? xn(e, jn(t, 1, Ko, !0)) : []
			}),
			Ec = Ho(function(e, t) {
				var n = Ea(t);
				return Ko(n) && (n = z), Ko(e) ? xn(e, jn(t, 1, Ko, !0), Li(n)) : []
			}),
			bc = Ho(function(e, t) {
				var n = Ea(t);
				return Ko(n) && (n = z), Ko(e) ? xn(e, jn(t, 1, Ko, !0), z, n) : []
			}),
			Uc = Ho(function(e) {
				var t = d(e, Cr);
				return t.length && t[0] === e[0] ? Jn(t) : []
			}),
			wc = Ho(function(e) {
				var t = Ea(e),
					n = d(e, Cr);
				return t === Ea(n) ? t = z : n.pop(), n.length && n[0] === e[0] ? Jn(n, Li(t)) : []
			}),
			kc = Ho(function(e) {
				var t = Ea(e),
					n = d(e, Cr);
				return t === Ea(n) ? t = z : n.pop(), n.length && n[0] === e[0] ? Jn(n, z, t) : []
			}),
			Mc = Ho(wa),
			Lc = Ho(function(e, t) {
				t = jn(t, 1);
				var n = e ? e.length : 0,
					r = pn(e, t);
				return mr(e, d(t, function(e) {
					return Ii(e, n) ? +e : e
				}).sort(qr)), r
			}),
			Fc = Ho(function(e) {
				return Fr(jn(e, 1, Ko, !0))
			}),
			Dc = Ho(function(e) {
				var t = Ea(e);
				return Ko(t) && (t = z), Fr(jn(e, 1, Ko, !0), Li(t))
			}),
			xc = Ho(function(e) {
				var t = Ea(e);
				return Ko(t) && (t = z), Fr(jn(e, 1, Ko, !0), z, t)
			}),
			Tc = Ho(function(e, t) {
				return Ko(e) ? xn(e, t) : []
			}),
			Yc = Ho(function(e) {
				return Sr(l(e, Ko))
			}),
			Sc = Ho(function(e) {
				var t = Ea(e);
				return Ko(t) && (t = z), Sr(l(e, Ko), Li(t))
			}),
			Ac = Ho(function(e) {
				var t = Ea(e);
				return Ko(t) && (t = z), Sr(l(e, Ko), z, t)
			}),
			Cc = Ho(za),
			jc = Ho(function(e) {
				var t = e.length,
					n = t > 1 ? e[t - 1] : z;
				return n = "function" == typeof n ? (e.pop(), n) : z, qa(e, n)
			}),
			Hc = Ho(function(e) {
				e = jn(e, 1);
				var t = e.length,
					n = t ? e[0] : 0,
					r = this.__wrapped__,
					i = function(t) {
						return pn(t, e)
					};
				return !(t > 1 || this.__actions__.length) && r instanceof Yt && Ii(n) ? (r = r.slice(n, +n + (t ? 1 : 0)), r.__actions__.push({
					func: Xa,
					args: [i],
					thisArg: z
				}), new Tt(r, this.__chain__).thru(function(e) {
					return t && !e.length && e.push(z), e
				})) : this.thru(i)
			}),
			Bc = Zr(function(e, t, n) {
				pu.call(e, n) ? ++e[n] : e[n] = 1
			}),
			$c = Zr(function(e, t, n) {
				pu.call(e, n) ? e[n].push(t) : e[n] = [t]
			}),
			Pc = Ho(function(e, t, r) {
				var i = -1,
					a = "function" == typeof t,
					o = Wi(t),
					s = Go(e) ? Array(e.length) : [];
				return lc(e, function(e) {
					var l = a ? t : o && null != e ? e[t] : z;
					s[++i] = l ? n(l, e, r) : Gn(e, t, r)
				}), s
			}),
			Oc = Zr(function(e, t, n) {
				e[n] = t
			}),
			Ic = Zr(function(e, t, n) {
				e[n ? 0 : 1].push(t)
			}, function() {
				return [[], []]
			}),
			Nc = Ho(function(e, t) {
				if (null == e) return [];
				var n = t.length;
				return n > 1 && Ni(e, t[0], t[1]) ? t = [] : n > 2 && Ni(t[0], t[1], t[2]) && (t = [t[0]]), t = 1 == t.length && ed(t[0]) ? t[0] : jn(t, 1, Oi), ur(e, t, [])
			}),
			Wc = au.now,
			Rc = Ho(function(e, t, n) {
				var r = X;
				if (n.length) {
					var i = P(n, xi(Rc));
					r |= ne
				}
				return vi(e, r, t, n, i)
			}),
			zc = Ho(function(e, t, n) {
				var r = X | Q;
				if (n.length) {
					var i = P(n, xi(zc));
					r |= ne
				}
				return vi(t, r, e, n, i)
			}),
			qc = Ho(function(e, t) {
				return Ln(e, 1, t)
			}),
			Jc = Ho(function(e, t, n) {
				return Ln(e, Ys(t) || 0, n)
			});
		Ao.Cache = Ot;
		var Vc = Ho(function(e, t) {
			t = 1 == t.length && ed(t[0]) ? d(t[0], L(Li())) : d(jn(t, 1, Oi), L(Li()));
			var r = t.length;
			return Ho(function(i) {
				for (var a = -1, o = Pu(i.length, r); ++a < o;) i[a] = t[a].call(this, i[a]);
				return n(e, this, i)
			})
		}),
			Gc = Ho(function(e, t) {
				var n = P(t, xi(Gc));
				return vi(e, ne, z, t, n)
			}),
			Kc = Ho(function(e, t) {
				var n = P(t, xi(Kc));
				return vi(e, re, z, t, n)
			}),
			Xc = Ho(function(e, t) {
				return vi(e, ae, z, z, z, jn(t, 1))
			}),
			Qc = _i(Wn),
			Zc = _i(function(e, t) {
				return e >= t
			}),
			ed = Array.isArray,
			td = Eu ?
		function(e) {
			return e instanceof Eu
		} : Bl(!1), nd = _i(nr), rd = _i(function(e, t) {
			return e <= t
		}), id = ei(function(e, t) {
			if (Qu || qi(t) || Go(t)) return void Xr(t, Js(t), e);
			for (var n in t) pu.call(t, n) && un(e, n, t[n])
		}), ad = ei(function(e, t) {
			if (Qu || qi(t) || Go(t)) return void Xr(t, Vs(t), e);
			for (var n in t) un(e, n, t[n])
		}), od = ei(function(e, t, n, r) {
			Xr(t, Vs(t), e, r)
		}), sd = ei(function(e, t, n, r) {
			Xr(t, Js(t), e, r)
		}), ld = Ho(function(e, t) {
			return pn(e, jn(t, 1))
		}), ud = Ho(function(e) {
			return e.push(z, sn), n(od, z, e)
		}), cd = Ho(function(e) {
			return e.push(z, Ki), n(md, z, e)
		}), dd = ci(function(e, t, n) {
			e[t] = n
		}, Bl($l)), hd = ci(function(e, t, n) {
			pu.call(e, t) ? e[t].push(n) : e[t] = [n]
		}, Li), fd = Ho(Gn), pd = ei(function(e, t, n) {
			or(e, t, n)
		}), md = ei(function(e, t, n, r) {
			or(e, t, n, r)
		}), _d = Ho(function(e, t) {
			return null == e ? {} : (t = d(jn(t, 1), Zi), cr(e, xn(ki(e), t)))
		}), gd = Ho(function(e, t) {
			return null == e ? {} : cr(e, d(jn(t, 1), Zi))
		}), yd = ai(function(e, t, n) {
			return t = t.toLowerCase(), e + (n ? fl(t) : t)
		}), vd = ai(function(e, t, n) {
			return e + (n ? "-" : "") + t.toLowerCase()
		}), Ed = ai(function(e, t, n) {
			return e + (n ? " " : "") + t.toLowerCase()
		}), bd = ii("toLowerCase"), Ud = ai(function(e, t, n) {
			return e + (n ? "_" : "") + t.toLowerCase()
		}), wd = ai(function(e, t, n) {
			return e + (n ? " " : "") + Md(t)
		}), kd = ai(function(e, t, n) {
			return e + (n ? " " : "") + t.toUpperCase()
		}), Md = ii("toUpperCase"), Ld = Ho(function(e, t) {
			try {
				return n(e, z, t)
			} catch (r) {
				return rs(r) ? r : new ou(r)
			}
		}), Fd = Ho(function(e, t) {
			return a(jn(t, 1), function(t) {
				t = Zi(t), e[t] = Rc(e[t], e)
			}), e
		}), Dd = li(), xd = li(!0), Td = Ho(function(e, t) {
			return function(n) {
				return Gn(n, e, t)
			}
		}), Yd = Ho(function(e, t) {
			return function(n) {
				return Gn(e, n, t)
			}
		}), Sd = hi(d), Ad = hi(s), Cd = hi(m), jd = mi(), Hd = mi(!0), Bd = di(function(e, t) {
			return e + t
		}), $d = yi("ceil"), Pd = di(function(e, t) {
			return e / t
		}), Od = yi("floor"), Id = di(function(e, t) {
			return e * t
		}), Nd = yi("round"), Wd = di(function(e, t) {
			return e - t
		});
		return Dt.after = Lo, Dt.ary = Fo, Dt.assign = id, Dt.assignIn = ad, Dt.assignInWith = od, Dt.assignWith = sd, Dt.at = ld, Dt.before = Do, Dt.bind = Rc, Dt.bindAll = Fd, Dt.bindKey = zc, Dt.castArray = Io, Dt.chain = Ga, Dt.chunk = na, Dt.compact = ra, Dt.concat = ia, Dt.cond = jl, Dt.conforms = Hl, Dt.constant = Bl, Dt.countBy = Bc, Dt.create = js, Dt.curry = xo, Dt.curryRight = To, Dt.debounce = Yo, Dt.defaults = ud, Dt.defaultsDeep = cd, Dt.defer = qc, Dt.delay = Jc, Dt.difference = vc, Dt.differenceBy = Ec, Dt.differenceWith = bc, Dt.drop = aa, Dt.dropRight = oa, Dt.dropRightWhile = sa, Dt.dropWhile = la, Dt.fill = ua, Dt.filter = oo, Dt.flatMap = uo, Dt.flatMapDeep = co, Dt.flatMapDepth = ho, Dt.flatten = ha, Dt.flattenDeep = fa, Dt.flattenDepth = pa, Dt.flip = So, Dt.flow = Dd, Dt.flowRight = xd, Dt.fromPairs = ma, Dt.functions = Ns, Dt.functionsIn = Ws, Dt.groupBy = $c, Dt.initial = ya, Dt.intersection = Uc, Dt.intersectionBy = wc, Dt.intersectionWith = kc, Dt.invert = dd, Dt.invertBy = hd, Dt.invokeMap = Pc, Dt.iteratee = Pl, Dt.keyBy = Oc, Dt.keys = Js, Dt.keysIn = Vs, Dt.map = _o, Dt.mapKeys = Gs, Dt.mapValues = Ks, Dt.matches = Ol, Dt.matchesProperty = Il, Dt.memoize = Ao, Dt.merge = pd, Dt.mergeWith = md, Dt.method = Td, Dt.methodOf = Yd, Dt.mixin = Nl, Dt.negate = Co, Dt.nthArg = zl, Dt.omit = _d, Dt.omitBy = Xs, Dt.once = jo, Dt.orderBy = go, Dt.over = Sd, Dt.overArgs = Vc, Dt.overEvery = Ad, Dt.overSome = Cd, Dt.partial = Gc, Dt.partialRight = Kc, Dt.partition = Ic, Dt.pick = gd, Dt.pickBy = Qs, Dt.property = ql, Dt.propertyOf = Jl, Dt.pull = Mc, Dt.pullAll = wa, Dt.pullAllBy = ka, Dt.pullAllWith = Ma, Dt.pullAt = Lc, Dt.range = jd, Dt.rangeRight = Hd, Dt.rearg = Xc, Dt.reject = Eo, Dt.remove = La, Dt.rest = Ho, Dt.reverse = Fa, Dt.sampleSize = Uo, Dt.set = el, Dt.setWith = tl, Dt.shuffle = wo, Dt.slice = Da, Dt.sortBy = Nc, Dt.sortedUniq = ja, Dt.sortedUniqBy = Ha, Dt.split = kl, Dt.spread = Bo, Dt.tail = Ba, Dt.take = $a, Dt.takeRight = Pa, Dt.takeRightWhile = Oa, Dt.takeWhile = Ia, Dt.tap = Ka, Dt.throttle = $o, Dt.thru = Xa, Dt.toArray = Ds, Dt.toPairs = nl, Dt.toPairsIn = rl, Dt.toPath = Gl, Dt.toPlainObject = Ss, Dt.transform = il, Dt.unary = Po, Dt.union = Fc, Dt.unionBy = Dc, Dt.unionWith = xc, Dt.uniq = Na, Dt.uniqBy = Wa, Dt.uniqWith = Ra, Dt.unset = al, Dt.unzip = za, Dt.unzipWith = qa, Dt.update = ol, Dt.updateWith = sl, Dt.values = ll, Dt.valuesIn = ul, Dt.without = Tc, Dt.words = Cl, Dt.wrap = Oo, Dt.xor = Yc, Dt.xorBy = Sc, Dt.xorWith = Ac, Dt.zip = Cc, Dt.zipObject = Ja, Dt.zipObjectDeep = Va, Dt.zipWith = jc, Dt.entries = nl, Dt.entriesIn = rl, Dt.extend = ad, Dt.extendWith = od, Nl(Dt, Dt), Dt.add = Bd, Dt.attempt = Ld, Dt.camelCase = yd, Dt.capitalize = fl, Dt.ceil = $d, Dt.clamp = cl, Dt.clone = No, Dt.cloneDeep = Ro, Dt.cloneDeepWith = zo, Dt.cloneWith = Wo, Dt.deburr = pl, Dt.divide = Pd, Dt.endsWith = ml, Dt.eq = qo, Dt.escape = _l, Dt.escapeRegExp = gl, Dt.every = ao, Dt.find = so, Dt.findIndex = ca, Dt.findKey = Hs, Dt.findLast = lo, Dt.findLastIndex = da, Dt.findLastKey = Bs, Dt.floor = Od, Dt.forEach = fo, Dt.forEachRight = po, Dt.forIn = $s, Dt.forInRight = Ps, Dt.forOwn = Os, Dt.forOwnRight = Is, Dt.get = Rs, Dt.gt = Qc, Dt.gte = Zc, Dt.has = zs, Dt.hasIn = qs, Dt.head = _a, Dt.identity = $l, Dt.includes = mo, Dt.indexOf = ga, Dt.inRange = dl, Dt.invoke = fd, Dt.isArguments = Jo, Dt.isArray = ed, Dt.isArrayBuffer = Vo, Dt.isArrayLike = Go, Dt.isArrayLikeObject = Ko, Dt.isBoolean = Xo, Dt.isBuffer = td, Dt.isDate = Qo, Dt.isElement = Zo, Dt.isEmpty = es, Dt.isEqual = ts, Dt.isEqualWith = ns, Dt.isError = rs, Dt.isFinite = is, Dt.isFunction = as, Dt.isInteger = os, Dt.isLength = ss, Dt.isMap = cs, Dt.isMatch = ds, Dt.isMatchWith = hs, Dt.isNaN = fs, Dt.isNative = ps, Dt.isNil = _s, Dt.isNull = ms, Dt.isNumber = gs, Dt.isObject = ls, Dt.isObjectLike = us, Dt.isPlainObject = ys, Dt.isRegExp = vs, Dt.isSafeInteger = Es, Dt.isSet = bs, Dt.isString = Us, Dt.isSymbol = ws, Dt.isTypedArray = ks, Dt.isUndefined = Ms, Dt.isWeakMap = Ls, Dt.isWeakSet = Fs, Dt.join = va, Dt.kebabCase = vd, Dt.last = Ea, Dt.lastIndexOf = ba, Dt.lowerCase = Ed, Dt.lowerFirst = bd, Dt.lt = nd, Dt.lte = rd, Dt.max = Xl, Dt.maxBy = Ql, Dt.mean = Zl, Dt.meanBy = eu, Dt.min = tu, Dt.minBy = nu, Dt.multiply = Id, Dt.nth = Ua, Dt.noConflict = Wl, Dt.noop = Rl, Dt.now = Wc, Dt.pad = yl, Dt.padEnd = vl, Dt.padStart = El, Dt.parseInt = bl, Dt.random = hl, Dt.reduce = yo, Dt.reduceRight = vo, Dt.repeat = Ul, Dt.replace = wl, Dt.result = Zs, Dt.round = Nd, Dt.runInContext = R, Dt.sample = bo, Dt.size = ko, Dt.snakeCase = Ud, Dt.some = Mo, Dt.sortedIndex = xa, Dt.sortedIndexBy = Ta, Dt.sortedIndexOf = Ya, Dt.sortedLastIndex = Sa, Dt.sortedLastIndexBy = Aa, Dt.sortedLastIndexOf = Ca, Dt.startCase = wd, Dt.startsWith = Ml, Dt.subtract = Wd, Dt.sum = ru, Dt.sumBy = iu, Dt.template = Ll, Dt.times = Vl, Dt.toInteger = xs, Dt.toLength = Ts, Dt.toLower = Fl, Dt.toNumber = Ys, Dt.toSafeInteger = As, Dt.toString = Cs, Dt.toUpper = Dl, Dt.trim = xl, Dt.trimEnd = Tl, Dt.trimStart = Yl, Dt.truncate = Sl, Dt.unescape = Al, Dt.uniqueId = Kl, Dt.upperCase = kd, Dt.upperFirst = Md, Dt.each = fo, Dt.eachRight = po, Dt.first = _a, Nl(Dt, function() {
			var e = {};
			return $n(Dt, function(t, n) {
				pu.call(Dt.prototype, n) || (e[n] = t)
			}), e
		}(), {
			chain: !1
		}), Dt.VERSION = q, a(["bind", "bindKey", "curry", "curryRight", "partial", "partialRight"], function(e) {
			Dt[e].placeholder = Dt
		}), a(["drop", "take"], function(e, t) {
			Yt.prototype[e] = function(n) {
				var r = this.__filtered__;
				if (r && !t) return new Yt(this);
				n = n === z ? 1 : $u(xs(n), 0);
				var i = this.clone();
				return r ? i.__takeCount__ = Pu(n, i.__takeCount__) : i.__views__.push({
					size: Pu(n, Ee),
					type: e + (i.__dir__ < 0 ? "Right" : "")
				}), i
			}, Yt.prototype[e + "Right"] = function(t) {
				return this.reverse()[e](t).reverse()
			}
		}), a(["filter", "map", "takeWhile"], function(e, t) {
			var n = t + 1,
				r = n == fe || n == me;
			Yt.prototype[e] = function(e) {
				var t = this.clone();
				return t.__iteratees__.push({
					iteratee: Li(e, 3),
					type: n
				}), t.__filtered__ = t.__filtered__ || r, t
			}
		}), a(["head", "last"], function(e, t) {
			var n = "take" + (t ? "Right" : "");
			Yt.prototype[e] = function() {
				return this[n](1).value()[0]
			}
		}), a(["initial", "tail"], function(e, t) {
			var n = "drop" + (t ? "" : "Right");
			Yt.prototype[e] = function() {
				return this.__filtered__ ? new Yt(this) : this[n](1)
			}
		}), Yt.prototype.compact = function() {
			return this.filter($l)
		}, Yt.prototype.find = function(e) {
			return this.filter(e).head()
		}, Yt.prototype.findLast = function(e) {
			return this.reverse().find(e)
		}, Yt.prototype.invokeMap = Ho(function(e, t) {
			return "function" == typeof e ? new Yt(this) : this.map(function(n) {
				return Gn(n, e, t)
			})
		}), Yt.prototype.reject = function(e) {
			return e = Li(e, 3), this.filter(function(t) {
				return !e(t)
			})
		}, Yt.prototype.slice = function(e, t) {
			e = xs(e);
			var n = this;
			return n.__filtered__ && (e > 0 || t < 0) ? new Yt(n) : (e < 0 ? n = n.takeRight(-e) : e && (n = n.drop(e)), t !== z && (t = xs(t), n = t < 0 ? n.dropRight(-t) : n.take(t - e)), n)
		}, Yt.prototype.takeRightWhile = function(e) {
			return this.reverse().takeWhile(e).reverse()
		}, Yt.prototype.toArray = function() {
			return this.take(Ee)
		}, $n(Yt.prototype, function(e, t) {
			var n = /^(?:filter|find|map|reject)|While$/.test(t),
				r = /^(?:head|last)$/.test(t),
				i = Dt[r ? "take" + ("last" == t ? "Right" : "") : t],
				a = r || /^find/.test(t);
			i && (Dt.prototype[t] = function() {
				var t = this.__wrapped__,
					o = r ? [1] : arguments,
					s = t instanceof Yt,
					l = o[0],
					u = s || ed(t),
					c = function(e) {
						var t = i.apply(Dt, h([e], o));
						return r && d ? t[0] : t
					};
				u && n && "function" == typeof l && 1 != l.length && (s = u = !1);
				var d = this.__chain__,
					f = !! this.__actions__.length,
					p = a && !d,
					m = s && !f;
				if (!a && u) {
					t = m ? t : new Yt(this);
					var _ = e.apply(t, o);
					return _.__actions__.push({
						func: Xa,
						args: [c],
						thisArg: z
					}), new Tt(_, d)
				}
				return p && m ? e.apply(this, o) : (_ = this.thru(c), p ? r ? _.value()[0] : _.value() : _)
			})
		}), a(["pop", "push", "shift", "sort", "splice", "unshift"], function(e) {
			var t = cu[e],
				n = /^(?:push|sort|unshift)$/.test(e) ? "tap" : "thru",
				r = /^(?:pop|shift)$/.test(e);
			Dt.prototype[e] = function() {
				var e = arguments;
				if (r && !this.__chain__) {
					var i = this.value();
					return t.apply(ed(i) ? i : [], e)
				}
				return this[n](function(n) {
					return t.apply(ed(n) ? n : [], e)
				})
			}
		}), $n(Yt.prototype, function(e, t) {
			var n = Dt[t];
			if (n) {
				var r = n.name + "",
					i = Zu[r] || (Zu[r] = []);
				i.push({
					name: t,
					func: n
				})
			}
		}), Zu[ui(z, Q).name] = [{
			name: "wrapper",
			func: z
		}], Yt.prototype.clone = St, Yt.prototype.reverse = At, Yt.prototype.value = Ct, Dt.prototype.at = Hc, Dt.prototype.chain = Qa, Dt.prototype.commit = Za, Dt.prototype.next = eo, Dt.prototype.plant = no, Dt.prototype.reverse = ro, Dt.prototype.toJSON = Dt.prototype.valueOf = Dt.prototype.value = io, Fu && (Dt.prototype[Fu] = to), Dt
	}
	var z, q = "4.11.2",
		J = 200,
		V = "Expected a function",
		G = "__lodash_hash_undefined__",
		K = "__lodash_placeholder__",
		X = 1,
		Q = 2,
		Z = 4,
		ee = 8,
		te = 16,
		ne = 32,
		re = 64,
		ie = 128,
		ae = 256,
		oe = 512,
		se = 1,
		le = 2,
		ue = 30,
		ce = "...",
		de = 150,
		he = 16,
		fe = 1,
		pe = 2,
		me = 3,
		_e = 1 / 0,
		ge = 9007199254740991,
		ye = 1.7976931348623157e308,
		ve = NaN,
		Ee = 4294967295,
		be = Ee - 1,
		Ue = Ee >>> 1,
		we = "[object Arguments]",
		ke = "[object Array]",
		Me = "[object Boolean]",
		Le = "[object Date]",
		Fe = "[object Error]",
		De = "[object Function]",
		xe = "[object GeneratorFunction]",
		Te = "[object Map]",
		Ye = "[object Number]",
		Se = "[object Object]",
		Ae = "[object Promise]",
		Ce = "[object RegExp]",
		je = "[object Set]",
		He = "[object String]",
		Be = "[object Symbol]",
		$e = "[object WeakMap]",
		Pe = "[object WeakSet]",
		Oe = "[object ArrayBuffer]",
		Ie = "[object DataView]",
		Ne = "[object Float32Array]",
		We = "[object Float64Array]",
		Re = "[object Int8Array]",
		ze = "[object Int16Array]",
		qe = "[object Int32Array]",
		Je = "[object Uint8Array]",
		Ve = "[object Uint8ClampedArray]",
		Ge = "[object Uint16Array]",
		Ke = "[object Uint32Array]",
		Xe = /\b__p \+= '';/g,
		Qe = /\b(__p \+=) '' \+/g,
		Ze = /(__e\(.*?\)|\b__t\)) \+\n'';/g,
		et = /&(?:amp|lt|gt|quot|#39|#96);/g,
		tt = /[&<>"'`]/g,
		nt = RegExp(et.source),
		rt = RegExp(tt.source),
		it = /<%-([\s\S]+?)%>/g,
		at = /<%([\s\S]+?)%>/g,
		ot = /<%=([\s\S]+?)%>/g,
		st = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,
		lt = /^\w*$/,
		ut = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]/g,
		ct = /[\\^$.*+?()[\]{}|]/g,
		dt = RegExp(ct.source),
		ht = /^\s+|\s+$/g,
		ft = /^\s+/,
		pt = /\s+$/,
		mt = /[a-zA-Z0-9]+/g,
		_t = /\\(\\)?/g,
		gt = /\$\{([^\\}]*(?:\\.[^\\}]*)*)\}/g,
		yt = /\w*$/,
		vt = /^0x/i,
		Et = /^[-+]0x[0-9a-f]+$/i,
		bt = /^0b[01]+$/i,
		Ut = /^\[object .+?Constructor\]$/,
		wt = /^0o[0-7]+$/i,
		kt = /^(?:0|[1-9]\d*)$/,
		Mt = /[\xc0-\xd6\xd8-\xde\xdf-\xf6\xf8-\xff]/g,
		Lt = /($^)/,
		Ft = /['\n\r\u2028\u2029\\]/g,
		Dt = "\\ud800-\\udfff",
		xt = "\\u0300-\\u036f\\ufe20-\\ufe23",
		Tt = "\\u20d0-\\u20f0",
		Yt = "\\u2700-\\u27bf",
		St = "a-z\\xdf-\\xf6\\xf8-\\xff",
		At = "\\xac\\xb1\\xd7\\xf7",
		Ct = "\\x00-\\x2f\\x3a-\\x40\\x5b-\\x60\\x7b-\\xbf",
		jt = "\\u2000-\\u206f",
		Ht = " \\t\\x0b\\f\\xa0\\ufeff\\n\\r\\u2028\\u2029\\u1680\\u180e\\u2000\\u2001\\u2002\\u2003\\u2004\\u2005\\u2006\\u2007\\u2008\\u2009\\u200a\\u202f\\u205f\\u3000",
		Bt = "A-Z\\xc0-\\xd6\\xd8-\\xde",
		$t = "\\ufe0e\\ufe0f",
		Pt = At + Ct + jt + Ht,
		Ot = "['’]",
		It = "[" + Dt + "]",
		Nt = "[" + Pt + "]",
		Wt = "[" + xt + Tt + "]",
		Rt = "\\d+",
		zt = "[" + Yt + "]",
		qt = "[" + St + "]",
		Jt = "[^" + Dt + Pt + Rt + Yt + St + Bt + "]",
		Vt = "\\ud83c[\\udffb-\\udfff]",
		Gt = "(?:" + Wt + "|" + Vt + ")",
		Kt = "[^" + Dt + "]",
		Xt = "(?:\\ud83c[\\udde6-\\uddff]){2}",
		Qt = "[\\ud800-\\udbff][\\udc00-\\udfff]",
		Zt = "[" + Bt + "]",
		en = "\\u200d",
		tn = "(?:" + qt + "|" + Jt + ")",
		nn = "(?:" + Zt + "|" + Jt + ")",
		rn = "(?:" + Ot + "(?:d|ll|m|re|s|t|ve))?",
		an = "(?:" + Ot + "(?:D|LL|M|RE|S|T|VE))?",
		on = Gt + "?",
		sn = "[" + $t + "]?",
		ln = "(?:" + en + "(?:" + [Kt, Xt, Qt].join("|") + ")" + sn + on + ")*",
		un = sn + on + ln,
		cn = "(?:" + [zt, Xt, Qt].join("|") + ")" + un,
		dn = "(?:" + [Kt + Wt + "?", Wt, Xt, Qt, It].join("|") + ")",
		hn = RegExp(Ot, "g"),
		fn = RegExp(Wt, "g"),
		pn = RegExp(Vt + "(?=" + Vt + ")|" + dn + un, "g"),
		mn = RegExp([Zt + "?" + qt + "+" + rn + "(?=" + [Nt, Zt, "$"].join("|") + ")", nn + "+" + an + "(?=" + [Nt, Zt + tn, "$"].join("|") + ")", Zt + "?" + tn + "+" + rn, Zt + "+" + an, Rt, cn].join("|"), "g"),
		_n = RegExp("[" + en + Dt + xt + Tt + $t + "]"),
		gn = /[a-z][A-Z]|[A-Z]{2,}[a-z]|[0-9][a-zA-Z]|[a-zA-Z][0-9]|[^a-zA-Z0-9 ]/,
		yn = ["Array", "Buffer", "DataView", "Date", "Error", "Float32Array", "Float64Array", "Function", "Int8Array", "Int16Array", "Int32Array", "Map", "Math", "Object", "Promise", "Reflect", "RegExp", "Set", "String", "Symbol", "TypeError", "Uint8Array", "Uint8ClampedArray", "Uint16Array", "Uint32Array", "WeakMap", "_", "clearTimeout", "isFinite", "parseInt", "setTimeout"],
		vn = -1,
		En = {};
	En[Ne] = En[We] = En[Re] = En[ze] = En[qe] = En[Je] = En[Ve] = En[Ge] = En[Ke] = !0, En[we] = En[ke] = En[Oe] = En[Me] = En[Ie] = En[Le] = En[Fe] = En[De] = En[Te] = En[Ye] = En[Se] = En[Ce] = En[je] = En[He] = En[$e] = !1;
	var bn = {};
	bn[we] = bn[ke] = bn[Oe] = bn[Ie] = bn[Me] = bn[Le] = bn[Ne] = bn[We] = bn[Re] = bn[ze] = bn[qe] = bn[Te] = bn[Ye] = bn[Se] = bn[Ce] = bn[je] = bn[He] = bn[Be] = bn[Je] = bn[Ve] = bn[Ge] = bn[Ke] = !0, bn[Fe] = bn[De] = bn[$e] = !1;
	var Un = {
		"À": "A",
		"Á": "A",
		"Â": "A",
		"Ã": "A",
		"Ä": "A",
		"Å": "A",
		"à": "a",
		"á": "a",
		"â": "a",
		"ã": "a",
		"ä": "a",
		"å": "a",
		"Ç": "C",
		"ç": "c",
		"Ð": "D",
		"ð": "d",
		"È": "E",
		"É": "E",
		"Ê": "E",
		"Ë": "E",
		"è": "e",
		"é": "e",
		"ê": "e",
		"ë": "e",
		"Ì": "I",
		"Í": "I",
		"Î": "I",
		"Ï": "I",
		"ì": "i",
		"í": "i",
		"î": "i",
		"ï": "i",
		"Ñ": "N",
		"ñ": "n",
		"Ò": "O",
		"Ó": "O",
		"Ô": "O",
		"Õ": "O",
		"Ö": "O",
		"Ø": "O",
		"ò": "o",
		"ó": "o",
		"ô": "o",
		"õ": "o",
		"ö": "o",
		"ø": "o",
		"Ù": "U",
		"Ú": "U",
		"Û": "U",
		"Ü": "U",
		"ù": "u",
		"ú": "u",
		"û": "u",
		"ü": "u",
		"Ý": "Y",
		"ý": "y",
		"ÿ": "y",
		"Æ": "Ae",
		"æ": "ae",
		"Þ": "Th",
		"þ": "th",
		"ß": "ss"
	},
		wn = {
			"&": "&amp;",
			"<": "&lt;",
			">": "&gt;",
			'"': "&quot;",
			"'": "&#39;",
			"`": "&#96;"
		},
		kn = {
			"&amp;": "&",
			"&lt;": "<",
			"&gt;": ">",
			"&quot;": '"',
			"&#39;": "'",
			"&#96;": "`"
		},
		Mn = {
			"function": !0,
			object: !0
		},
		Ln = {
			"\\": "\\",
			"'": "'",
			"\n": "n",
			"\r": "r",
			"\u2028": "u2028",
			"\u2029": "u2029"
		},
		Fn = parseFloat,
		Dn = parseInt,
		xn = Mn[typeof exports] && exports && !exports.nodeType ? exports : z,
		Tn = Mn[typeof module] && module && !module.nodeType ? module : z,
		Yn = Tn && Tn.exports === xn ? xn : z,
		Sn = T(xn && Tn && "object" == typeof global && global),
		An = T(Mn[typeof self] && self),
		Cn = T(Mn[typeof window] && window),
		jn = T(Mn[typeof this] && this),
		Hn = Sn || Cn !== (jn && jn.window) && Cn || An || jn || Function("return this")(),
		Bn = R();
	(Cn || An || {})._ = Bn, "function" == typeof define && "object" == typeof define.amd && define.amd ? define(function() {
		return Bn
	}) : xn && Tn ? (Yn && ((Tn.exports = Bn)._ = Bn), xn._ = Bn) : Hn._ = Bn
}.call(this), function() {
	var e, t = window.Messenger;
	e = window.Messenger = function() {
		return e._call.apply(this, arguments)
	}, window.Messenger.noConflict = function() {
		return window.Messenger = t, e
	}
}(), window.Messenger._ = function() {
	if (window._) return window._;
	var e = Array.prototype,
		t = Object.prototype,
		n = Function.prototype,
		r = (e.push, e.slice),
		i = (e.concat, t.toString),
		a = (t.hasOwnProperty, e.forEach),
		o = (e.map, e.reduce, e.reduceRight, e.filter),
		s = (e.every, e.some, e.indexOf, e.lastIndexOf, Array.isArray, Object.keys),
		l = n.bind,
		u = {},
		c = {},
		d = u.each = u.forEach = function(e, t, n) {
			if (null != e) if (a && e.forEach === a) e.forEach(t, n);
			else if (e.length === +e.length) {
				for (var r = 0, i = e.length; r < i; r++) if (t.call(n, e[r], r, e) === c) return
			} else for (var o in e) if (u.has(e, o) && t.call(n, e[o], o, e) === c) return
		};
	u.result = function(e, t) {
		if (null == e) return null;
		var n = e[t];
		return u.isFunction(n) ? n.call(e) : n
	}, u.once = function(e) {
		var t, n = !1;
		return function() {
			return n ? t : (n = !0, t = e.apply(this, arguments), e = null, t)
		}
	};
	var h = 0;
	return u.uniqueId = function(e) {
		var t = ++h + "";
		return e ? e + t : t
	}, u.filter = u.select = function(e, t, n) {
		var r = [];
		return null == e ? r : o && e.filter === o ? e.filter(t, n) : (d(e, function(e, i, a) {
			t.call(n, e, i, a) && (r[r.length] = e)
		}), r)
	}, d(["Arguments", "Function", "String", "Number", "Date", "RegExp"], function(e) {
		u["is" + e] = function(t) {
			return i.call(t) == "[object " + e + "]"
		}
	}), u.defaults = function(e) {
		return d(r.call(arguments, 1), function(t) {
			if (t) for (var n in t) null == e[n] && (e[n] = t[n])
		}), e
	}, u.extend = function(e) {
		return d(r.call(arguments, 1), function(t) {
			if (t) for (var n in t) e[n] = t[n]
		}), e
	}, u.keys = s ||
	function(e) {
		if (e !== Object(e)) throw new TypeError("Invalid object");
		var t = [];
		for (var n in e) u.has(e, n) && (t[t.length] = n);
		return t
	}, u.bind = function(e, t) {
		if (e.bind === l && l) return l.apply(e, r.call(arguments, 1));
		var n = r.call(arguments, 2);
		return function() {
			return e.apply(t, n.concat(r.call(arguments)))
		}
	}, u.isObject = function(e) {
		return e === Object(e)
	}, u
}(), window.Messenger.Events = function() {
	if (window.Backbone && Backbone.Events) return Backbone.Events;
	var e = function() {
			var e = /\s+/,
				t = function(t, n, r, i) {
					if (!r) return !0;
					if ("object" == typeof r) for (var a in r) t[n].apply(t, [a, r[a]].concat(i));
					else {
						if (!e.test(r)) return !0;
						for (var o = r.split(e), s = 0, l = o.length; s < l; s++) t[n].apply(t, [o[s]].concat(i))
					}
				},
				n = function(e, t) {
					var n, r = -1,
						i = e.length;
					switch (t.length) {
					case 0:
						for (; ++r < i;)(n = e[r]).callback.call(n.ctx);
						return;
					case 1:
						for (; ++r < i;)(n = e[r]).callback.call(n.ctx, t[0]);
						return;
					case 2:
						for (; ++r < i;)(n = e[r]).callback.call(n.ctx, t[0], t[1]);
						return;
					case 3:
						for (; ++r < i;)(n = e[r]).callback.call(n.ctx, t[0], t[1], t[2]);
						return;
					default:
						for (; ++r < i;)(n = e[r]).callback.apply(n.ctx, t)
					}
				},
				r = {
					on: function(e, n, r) {
						if (!t(this, "on", e, [n, r]) || !n) return this;
						this._events || (this._events = {});
						var i = this._events[e] || (this._events[e] = []);
						return i.push({
							callback: n,
							context: r,
							ctx: r || this
						}), this
					},
					once: function(e, n, r) {
						if (!t(this, "once", e, [n, r]) || !n) return this;
						var i = this,
							a = _.once(function() {
								i.off(e, a), n.apply(this, arguments)
							});
						return a._callback = n, this.on(e, a, r), this
					},
					off: function(e, n, r) {
						var i, a, o, s, l, u, c, d;
						if (!this._events || !t(this, "off", e, [n, r])) return this;
						if (!e && !n && !r) return this._events = {}, this;
						for (s = e ? [e] : _.keys(this._events), l = 0, u = s.length; l < u; l++) if (e = s[l], i = this._events[e]) {
							if (o = [], n || r) for (c = 0, d = i.length; c < d; c++) a = i[c], (n && n !== a.callback && n !== a.callback._callback || r && r !== a.context) && o.push(a);
							this._events[e] = o
						}
						return this
					},
					trigger: function(e) {
						if (!this._events) return this;
						var r = Array.prototype.slice.call(arguments, 1);
						if (!t(this, "trigger", e, r)) return this;
						var i = this._events[e],
							a = this._events.all;
						return i && n(i, r), a && n(a, arguments), this
					},
					listenTo: function(e, t, n) {
						var r = this._listeners || (this._listeners = {}),
							i = e._listenerId || (e._listenerId = _.uniqueId("l"));
						return r[i] = e, e.on(t, "object" == typeof t ? this : n, this), this
					},
					stopListening: function(e, t, n) {
						var r = this._listeners;
						if (r) {
							if (e) e.off(t, "object" == typeof t ? this : n, this), t || n || delete r[e._listenerId];
							else {
								"object" == typeof t && (n = this);
								for (var i in r) r[i].off(t, n, this);
								this._listeners = {}
							}
							return this
						}
					}
				};
			return r.bind = r.on, r.unbind = r.off, r
		};
	return e()
}(), function() {
	var e, t, n, r, i, a, o, s, l, u, c, d = {}.hasOwnProperty,
		h = function(e, t) {
			function n() {
				this.constructor = e
			}
			for (var r in t) d.call(t, r) && (e[r] = t[r]);
			return n.prototype = t.prototype, e.prototype = new n, e.__super__ = t.prototype, e
		},
		f = [].slice,
		p = [].indexOf ||
	function(e) {
		for (var t = 0, n = this.length; t < n; t++) if (t in this && this[t] === e) return t;
		return -1
	};
	e = jQuery, a = null != (l = window._) ? l : window.Messenger._, r = null != (u = "undefined" != typeof Backbone && null !== Backbone ? Backbone.Events : void 0) ? u : window.Messenger.Events, n = function() {
		function t(t) {
			e.extend(this, r), a.isObject(t) && (t.el && this.setElement(t.el), this.model = t.model), this.initialize.apply(this, arguments)
		}
		return t.prototype.setElement = function(t) {
			return this.$el = e(t), this.el = this.$el[0]
		}, t.prototype.delegateEvents = function(e) {
			var t, n, r, i, o, s, l;
			if (e || (e = a.result(this, "events"))) {
				this.undelegateEvents(), t = /^(\S+)\s*(.*)$/, l = [];
				for (r in e) {
					if (o = e[r], a.isFunction(o) || (o = this[e[r]]), !o) throw new Error('Method "' + e[r] + '" does not exist');
					i = r.match(t), n = i[1], s = i[2], o = a.bind(o, this), n += ".delegateEvents" + this.cid, "" === s ? l.push(this.jqon(n, o)) : l.push(this.jqon(n, s, o))
				}
				return l
			}
		}, t.prototype.jqon = function(e, t, n) {
			var r;
			return null != this.$el.on ? (r = this.$el).on.apply(r, arguments) : (null == n && (n = t, t = void 0), null != t ? this.$el.delegate(t, e, n) : this.$el.bind(e, n))
		}, t.prototype.jqoff = function(e) {
			var t;
			return null != this.$el.off ? (t = this.$el).off.apply(t, arguments) : (this.$el.undelegate(), this.$el.unbind(e))
		}, t.prototype.undelegateEvents = function() {
			return this.jqoff(".delegateEvents" + this.cid)
		}, t.prototype.remove = function() {
			return this.undelegateEvents(), this.$el.remove()
		}, t
	}(), o = function(t) {
		function n() {
			return n.__super__.constructor.apply(this, arguments)
		}
		return h(n, t), n.prototype.defaults = {
			hideAfter: 10,
			scroll: !0,
			closeButtonText: "&times;",
			escapeText: !1
		}, n.prototype.initialize = function(t) {
			return null == t && (t = {}), this.shown = !1, this.rendered = !1, this.messenger = t.messenger, this.options = e.extend({}, this.options, t, this.defaults)
		}, n.prototype.show = function() {
			var e;
			if (this.rendered || this.render(), this.$message.removeClass("messenger-hidden"), e = this.shown, this.shown = !0, !e) return this.trigger("show")
		}, n.prototype.hide = function() {
			var e;
			if (this.rendered) return this.$message.addClass("messenger-hidden"), e = this.shown, this.shown = !1, e ? this.trigger("hide") : void 0
		}, n.prototype.cancel = function() {
			return this.hide()
		}, n.prototype.update = function(t) {
			var n, r = this;
			return a.isString(t) && (t = {
				message: t
			}), e.extend(this.options, t), this.lastUpdate = new Date, this.rendered = !1, this.events = null != (n = this.options.events) ? n : {}, this.render(), this.actionsToEvents(), this.delegateEvents(), this.checkClickable(), this.options.hideAfter ? (this.$message.addClass("messenger-will-hide-after"), null != this._hideTimeout && clearTimeout(this._hideTimeout), this._hideTimeout = setTimeout(function() {
				return r.hide()
			}, 1e3 * this.options.hideAfter)) : this.$message.removeClass("messenger-will-hide-after"), this.options.hideOnNavigate ? (this.$message.addClass("messenger-will-hide-on-navigate"), null != ("undefined" != typeof Backbone && null !== Backbone ? Backbone.history : void 0) && Backbone.history.on("route", function() {
				return r.hide()
			})) : this.$message.removeClass("messenger-will-hide-on-navigate"), this.trigger("update", this)
		}, n.prototype.scrollTo = function() {
			if (this.options.scroll) return e.scrollTo(this.$el, {
				duration: 400,
				offset: {
					left: 0,
					top: -20
				}
			})
		}, n.prototype.timeSinceUpdate = function() {
			return this.lastUpdate ? new Date - this.lastUpdate : null
		}, n.prototype.actionsToEvents = function() {
			var e, t, n, r, i = this;
			n = this.options.actions, r = [];
			for (t in n) e = n[t], r.push(this.events['click [data-action="' + t + '"] a'] = function(e) {
				return function(n) {
					return n.preventDefault(), n.stopPropagation(), i.trigger("action:" + t, e, n), e.action.call(i, n, i)
				}
			}(e));
			return r
		}, n.prototype.checkClickable = function() {
			var e, t, n, r;
			n = this.events, r = [];
			for (t in n) e = n[t], "click" === t ? r.push(this.$message.addClass("messenger-clickable")) : r.push(void 0);
			return r
		}, n.prototype.undelegateEvents = function() {
			var e;
			return n.__super__.undelegateEvents.apply(this, arguments), null != (e = this.$message) ? e.removeClass("messenger-clickable") : void 0
		}, n.prototype.parseActions = function() {
			var t, n, r, i, a, o;
			n = [], a = this.options.actions;
			for (i in a) t = a[i], r = e.extend({}, t), r.name = i, null == (o = r.label) && (r.label = i), n.push(r);
			return n
		}, n.prototype.template = function(t) {
			var n, r, i, a, o, s, l, u, c, d, h = this;
			for (o = e("<div class='messenger-message message alert " + t.type + " message-" + t.type + " alert-" + t.type + "'>"), t.showCloseButton && (i = e('<button type="button" class="messenger-close" data-dismiss="alert">'), i.html(t.closeButtonText), i.click(function() {
				var e;
				return h.cancel(), "function" == typeof(e = h.options).onClickClose && e.onClickClose(), !0
			}), o.append(i)), s = t.escapeText ? e('<div class="messenger-message-inner"></div>').text(t.message) : e('<div class="messenger-message-inner">' + t.message + "</div>"), o.append(s), t.actions.length && (r = e('<div class="messenger-actions">')), d = t.actions, u = 0, c = d.length; u < c; u++) l = d[u], n = e("<span>"), n.attr("data-action", "" + l.name), a = e("<a>"), a.html(l.label), n.append(e('<span class="messenger-phrase">')), n.append(a), r.append(n);
			return o.append(r), o
		}, n.prototype.render = function() {
			var t;
			if (!this.rendered) return this._hasSlot || (this.setElement(this.messenger._reserveMessageSlot(this)), this._hasSlot = !0), t = e.extend({}, this.options, {
				actions: this.parseActions()
			}), this.$message = e(this.template(t)), this.$el.html(this.$message), this.shown = !0, this.rendered = !0, this.trigger("render")
		}, n
	}(n), i = function(e) {
		function t() {
			return t.__super__.constructor.apply(this, arguments)
		}
		return h(t, e), t.prototype.initialize = function() {
			return t.__super__.initialize.apply(this, arguments), this._timers = {}
		}, t.prototype.cancel = function() {
			if (this.clearTimers(), this.hide(), null != this._actionInstance && null != this._actionInstance.abort) return this._actionInstance.abort()
		}, t.prototype.clearTimers = function() {
			var e, t, n, r;
			n = this._timers;
			for (e in n) t = n[e], clearTimeout(t);
			return this._timers = {}, null != (r = this.$message) ? r.removeClass("messenger-retry-soon messenger-retry-later") : void 0
		}, t.prototype.render = function() {
			var e, n, r, i;
			t.__super__.render.apply(this, arguments), this.clearTimers(), r = this.options.actions, i = [];
			for (n in r) e = r[n], e.auto ? i.push(this.startCountdown(n, e)) : i.push(void 0);
			return i
		}, t.prototype.renderPhrase = function(e, t) {
			var n;
			return n = e.phrase.replace("TIME", this.formatTime(t))
		}, t.prototype.formatTime = function(e) {
			var t;
			return t = function(e, t) {
				return e = Math.floor(e), 1 !== e && (t += "s"), "in " + e + " " + t
			}, 0 === Math.floor(e) ? "now..." : e < 60 ? t(e, "second") : (e /= 60, e < 60 ? t(e, "minute") : (e /= 60, t(e, "hour")))
		}, t.prototype.startCountdown = function(e, t) {
			var n, r, i, a, o = this;
			if (null == this._timers[e]) return n = this.$message.find("[data-action='" + e + "'] .messenger-phrase"), r = null != (a = t.delay) ? a : 3, r <= 10 ? (this.$message.removeClass("messenger-retry-later"), this.$message.addClass("messenger-retry-soon")) : (this.$message.removeClass("messenger-retry-soon"), this.$message.addClass("messenger-retry-later")), (i = function() {
				var a;
				return n.text(o.renderPhrase(t, r)), r > 0 ? (a = Math.min(r, 1), r -= a, o._timers[e] = setTimeout(i, 1e3 * a)) : (o.$message.removeClass("messenger-retry-soon messenger-retry-later"), delete o._timers[e], t.action())
			})()
		}, t
	}(o), s = function(t) {
		function n() {
			return n.__super__.constructor.apply(this, arguments)
		}
		return h(n, t), n.prototype.tagName = "ul", n.prototype.className = "messenger", n.prototype.messageDefaults = {
			type: "info"
		}, n.prototype.initialize = function(t) {
			return this.options = null != t ? t : {}, this.history = [], this.messageDefaults = e.extend({}, this.messageDefaults, this.options.messageDefaults)
		}, n.prototype.render = function() {
			return this.updateMessageSlotClasses()
		}, n.prototype.findById = function(e) {
			return a.filter(this.history, function(t) {
				return t.msg.options.id === e
			})
		}, n.prototype._reserveMessageSlot = function(t) {
			var n, r, i = this;
			for (n = e("<li>"), n.addClass("messenger-message-slot"), this.$el.prepend(n), this.history.push({
				msg: t,
				$slot: n
			}), this._enforceIdConstraint(t), t.on("update", function() {
				return i._enforceIdConstraint(t)
			}); this.options.maxMessages && this.history.length > this.options.maxMessages;) r = this.history.shift(), r.msg.remove(), r.$slot.remove();
			return n
		}, n.prototype._enforceIdConstraint = function(e) {
			var t, n, r, i, a;
			if (null != e.options.id) for (a = this.history, n = 0, r = a.length; n < r; n++) if (t = a[n], i = t.msg, null != i.options.id && i.options.id === e.options.id && e !== i) {
				if (e.options.singleton) return void e.hide();
				i.hide()
			}
		}, n.prototype.newMessage = function(e) {
			var t, n, r, a, s = this;
			return null == e && (e = {}), e.messenger = this, o = null != (n = null != (r = Messenger.themes[null != (a = e.theme) ? a : this.options.theme]) ? r.Message : void 0) ? n : i, t = new o(e), t.on("show", function() {
				if (e.scrollTo && "fixed" !== s.$el.css("position")) return t.scrollTo()
			}), t.on("hide show render", this.updateMessageSlotClasses, this), t
		}, n.prototype.updateMessageSlotClasses = function() {
			var e, t, n, r, i, a, o;
			for (r = !0, t = null, e = !1, o = this.history, i = 0, a = o.length; i < a; i++) n = o[i], n.$slot.removeClass("messenger-first messenger-last messenger-shown"), n.msg.shown && n.msg.rendered && (n.$slot.addClass("messenger-shown"), e = !0, t = n, r && (r = !1, n.$slot.addClass("messenger-first")));
			return null != t && t.$slot.addClass("messenger-last"), this.$el["" + (e ? "remove" : "add") + "Class"]("messenger-empty")
		}, n.prototype.hideAll = function() {
			var e, t, n, r, i;
			for (r = this.history, i = [], t = 0, n = r.length; t < n; t++) e = r[t], i.push(e.msg.hide());
			return i
		}, n.prototype.post = function(t) {
			var n;
			return a.isString(t) && (t = {
				message: t
			}), t = e.extend(!0, {}, this.messageDefaults, t), n = this.newMessage(t), n.update(t), n
		}, n
	}(n), t = function(t) {
		function n() {
			return n.__super__.constructor.apply(this, arguments)
		}
		return h(n, t), n.prototype.doDefaults = {
			progressMessage: null,
			successMessage: null,
			errorMessage: "Error connecting to the server.",
			showSuccessWithoutError: !0,
			retry: {
				auto: !0,
				allow: !0
			},
			action: e.ajax
		}, n.prototype.hookBackboneAjax = function(t) {
			var n, r = this;
			if (null == t && (t = {}), null == window.Backbone) throw "Expected Backbone to be defined";
			return t = a.defaults(t, {
				id: "BACKBONE_ACTION",
				errorMessage: !1,
				successMessage: "Request completed successfully.",
				showSuccessWithoutError: !1
			}), n = function(e) {
				var n;
				return n = a.extend({}, t, e.messenger), r["do"](n, e)
			}, null != Backbone.ajax ? (Backbone.ajax._withoutMessenger && (Backbone.ajax = Backbone.ajax._withoutMessenger), null != t.action && t.action !== this.doDefaults.action || (t.action = Backbone.ajax), n._withoutMessenger = Backbone.ajax, Backbone.ajax = n) : Backbone.sync = a.wrap(Backbone.sync, function() {
				var t, r, i;
				return i = arguments[0], t = 2 <= arguments.length ? f.call(arguments, 1) : [], r = e.ajax, e.ajax = n, i.call.apply(i, [this].concat(f.call(t))), e.ajax = r
			})
		}, n.prototype._getHandlerResponse = function(e) {
			return e !== !1 && (e === !0 || null == e || e)
		}, n.prototype._parseEvents = function(e) {
			var t, n, r, i, a, o, s;
			null == e && (e = {}), a = {};
			for (i in e) r = e[i], n = i.indexOf(" "), o = i.substring(0, n), t = i.substring(n + 1), null == (s = a[o]) && (a[o] = {}), a[o][t] = r;
			return a
		}, n.prototype._normalizeResponse = function() {
			var e, t, n, r, i, o, s;
			for (n = 1 <= arguments.length ? f.call(arguments, 0) : [], r = null, i = null, e = null, o = 0, s = n.length; o < s; o++) t = n[o], "success" === t || "timeout" === t || "abort" === t ? r = t : null != (null != t ? t.readyState : void 0) && null != (null != t ? t.responseText : void 0) ? i = t : a.isObject(t) && (e = t);
			return [r, e, i]
		}, n.prototype.run = function() {
			var t, n, r, i, o, s, l, u, c, d, h, m = this;
			if (s = arguments[0], c = arguments[1], t = 3 <= arguments.length ? f.call(arguments, 2) : [], null == c && (c = {}), s = e.extend(!0, {}, this.messageDefaults, this.doDefaults, null != s ? s : {}), n = this._parseEvents(s.events), r = function(e, t) {
				var n;
				return n = s[e + "Message"], a.isFunction(n) ? n.call(m, e, t) : n
			}, l = null != (h = s.messageInstance) ? h : this.newMessage(s), null != s.id && (l.options.id = s.id), null != s.progressMessage && l.update(e.extend({}, s, {
				message: r("progress", null),
				type: "info"
			})), o = {}, a.each(["error", "success"], function(i) {
				var u;
				return u = c[i], o[i] = function() {
					var o, d, h, _, g, y, v, E, b, U, w, k, M, L, F;
					return y = 1 <= arguments.length ? f.call(arguments, 0) : [], b = m._normalizeResponse.apply(m, y), g = b[0], o = b[1], E = b[2], "success" === i && null == l.errorCount && s.showSuccessWithoutError === !1 && (s.successMessage = null), "error" === i && (null == (U = s.errorCount) && (s.errorCount = 0), s.errorCount += 1), h = s.returnsPromise ? y[0] : "function" == typeof u ? u.apply(null, y) : void 0, v = m._getHandlerResponse(h), a.isString(v) && (v = {
						message: v
					}), "error" !== i || 0 !== (null != E ? E.status : void 0) && "abort" !== g ? "error" === i && null != s.ignoredErrorCodes && (w = null != E ? E.status : void 0, p.call(s.ignoredErrorCodes, w) >= 0) ? void l.hide() : (d = {
						message: r(i, E),
						type: i,
						events: null != (k = n[i]) ? k : {},
						hideOnNavigate: "success" === i
					}, _ = e.extend({}, s, d, v), "number" == typeof(null != (M = _.retry) ? M.allow : void 0) && _.retry.allow--, "error" === i && (null != E ? E.status : void 0) >= 500 && (null != (L = _.retry) ? L.allow : void 0) ? (null == _.retry.delay && (_.errorCount < 4 ? _.retry.delay = 10 : _.retry.delay = 300), _.hideAfter && (null == (F = _._hideAfter) && (_._hideAfter = _.hideAfter), _.hideAfter = _._hideAfter + _.retry.delay), _._retryActions = !0, _.actions = {
						retry: {
							label: "retry now",
							phrase: "Retrying TIME",
							auto: _.retry.auto,
							delay: _.retry.delay,
							action: function() {
								return _.messageInstance = l, setTimeout(function() {
									return m["do"].apply(m, [_, c].concat(f.call(t)))
								}, 0)
							}
						},
						cancel: {
							action: function() {
								return l.cancel()
							}
						}
					}) : _._retryActions && (delete _.actions.retry, delete _.actions.cancel, delete s._retryActions), l.update(_), v && _.message ? (Messenger(a.extend({}, m.options, {
						instance: m
					})), l.show()) : l.hide()) : void l.hide()
				}
			}), !s.returnsPromise) for (d in o) i = o[d], u = c[d], c[d] = i;
			return l._actionInstance = s.action.apply(s, [c].concat(f.call(t))), s.returnsPromise && l._actionInstance.then(o.success, o.error), l
		}, n.prototype["do"] = n.prototype.run, n.prototype.ajax = function() {
			var t, n;
			return n = arguments[0], t = 2 <= arguments.length ? f.call(arguments, 1) : [], n.action = e.ajax, this.run.apply(this, [n].concat(f.call(t)))
		}, n.prototype.expectPromise = function(e, t) {
			return t = a.extend({}, t, {
				action: e,
				returnsPromise: !0
			}), this.run(t)
		}, n.prototype.error = function(e) {
			return null == e && (e = {}), "string" == typeof e && (e = {
				message: e
			}), e.type = "error", this.post(e)
		}, n.prototype.info = function(e) {
			return null == e && (e = {}), "string" == typeof e && (e = {
				message: e
			}), e.type = "info", this.post(e)
		}, n.prototype.success = function(e) {
			return null == e && (e = {}), "string" == typeof e && (e = {
				message: e
			}), e.type = "success", this.post(e)
		}, n
	}(s), e.fn.messenger = function() {
		var n, r, i, o, l, u, c, d;
		return i = arguments[0], r = 2 <= arguments.length ? f.call(arguments, 1) : [], null == i && (i = {}), n = this, null != i && a.isString(i) ? (d = n.data("messenger"))[i].apply(d, r) : (l = i, null == n.data("messenger") && (s = null != (u = null != (c = Messenger.themes[l.theme]) ? c.Messenger : void 0) ? u : t, n.data("messenger", o = new s(e.extend({
			el: n
		}, l))), o.render()), n.data("messenger"))
	}, window.Messenger._call = function(t) {
		var n, r, i, a, o, s, l, u, c, d, h;
		if (s = {
			extraClasses: "messenger-fixed messenger-on-bottom messenger-on-right",
			theme: "future",
			maxMessages: 9,
			parentLocations: ["body"]
		}, t = e.extend(s, e._messengerDefaults, Messenger.options, t), null != t.theme && (t.extraClasses += " messenger-theme-" + t.theme), l = t.instance || Messenger.instance, null == t.instance) {
			for (c = t.parentLocations, r = null, i = null, d = 0, h = c.length; d < h; d++) if (u = c[d], r = e(u), r.length) {
				a = u;
				break
			}
			l ? e(l._location).is(e(a)) || (l.$el.detach(), r.prepend(l.$el)) : (n = e("<ul>"), r.prepend(n), l = n.messenger(t), l._location = a, Messenger.instance = l)
		}
		return null != l._addedClasses && l.$el.removeClass(l._addedClasses), l.$el.addClass(o = "" + l.className + " " + t.extraClasses), l._addedClasses = o, l
	}, e.extend(Messenger, {
		Message: i,
		Messenger: t,
		themes: null != (c = Messenger.themes) ? c : {}
	}), e.globalMessenger = window.Messenger = Messenger
}.call(this), function(e) {
	function t(t, r, i) {
		var a = this;
		return this.on("click.pjax", t, function(t) {
			var o = e.extend({}, m(r, i));
			o.container || (o.container = e(this).attr("data-pjax") || a), n(t, o)
		})
	}
	function n(t, n, r) {
		r = m(n, r);
		var a = t.currentTarget;
		if ("A" !== a.tagName.toUpperCase()) throw "$.fn.pjax or $.pjax.click requires an anchor element";
		if (!(t.which > 1 || t.metaKey || t.ctrlKey || t.shiftKey || t.altKey || location.protocol !== a.protocol || location.hostname !== a.hostname || a.href.indexOf("#") > -1 && p(a) == p(location) || t.isDefaultPrevented())) {
			var o = {
				url: a.href,
				container: e(a).attr("data-pjax"),
				target: a
			},
				s = e.extend({}, o, r),
				l = e.Event("pjax:click");
			e(a).trigger(l, [s]), l.isDefaultPrevented() || (i(s), t.preventDefault(), e(a).trigger("pjax:clicked", [s]))
		}
	}
	function r(t, n, r) {
		r = m(n, r);
		var a = t.currentTarget;
		if ("FORM" !== a.tagName.toUpperCase()) throw "$.pjax.submit requires a form element";
		var o = {
			type: a.method.toUpperCase(),
			url: a.action,
			container: e(a).attr("data-pjax"),
			target: a
		};
		if ("GET" !== o.type && void 0 !== window.FormData) o.data = new FormData(a), o.processData = !1, o.contentType = !1;
		else {
			if (e(a).find(":file").length) return;
			o.data = e(a).serializeArray()
		}
		i(e.extend({}, o, r)), t.preventDefault()
	}
	function i(t) {
		function n(t, n, i) {
			i || (i = {}), i.relatedTarget = r;
			var a = e.Event(t, i);
			return s.trigger(a, n), !a.isDefaultPrevented()
		}
		t = e.extend(!0, {}, e.ajaxSettings, i.defaults, t), e.isFunction(t.url) && (t.url = t.url());
		var r = t.target,
			a = f(t.url).hash,
			s = t.context = _(t.container);
		t.data || (t.data = {}), e.isArray(t.data) ? t.data.push({
			name: "_pjax",
			value: s.selector
		}) : t.data._pjax = s.selector;
		var l;
		t.beforeSend = function(e, r) {
			if ("GET" !== r.type && (r.timeout = 0), e.setRequestHeader("X-PJAX", "true"), e.setRequestHeader("X-PJAX-Container", s.selector), !n("pjax:beforeSend", [e, r])) return !1;
			r.timeout > 0 && (l = setTimeout(function() {
				n("pjax:timeout", [e, t]) && e.abort("timeout")
			}, r.timeout), r.timeout = 0);
			var i = f(r.url);
			a && (i.hash = a), t.requestUrl = h(i)
		}, t.complete = function(e, r) {
			l && clearTimeout(l), n("pjax:complete", [e, r, t]), n("pjax:end", [e, t])
		}, t.error = function(e, r, i) {
			var a = v("", e, t),
				s = n("pjax:error", [e, r, i, t]);
			"GET" == t.type && "abort" !== r && s && o(a.url)
		}, t.success = function(r, l, u) {
			var d = i.state,
				h = "function" == typeof e.pjax.defaults.version ? e.pjax.defaults.version() : e.pjax.defaults.version,
				p = u.getResponseHeader("X-PJAX-Version"),
				m = v(r, u, t),
				_ = f(m.url);
			if (a && (_.hash = a, m.url = _.href), h && p && h !== p) return void o(m.url);
			if (!m.contents) return void o(m.url);
			i.state = {
				id: t.id || c(),
				url: m.url,
				title: m.title,
				container: s.selector,
				fragment: t.fragment,
				timeout: t.timeout
			}, (t.push || t.replace) && window.history.replaceState(i.state, m.title, m.url);
			try {
				document.activeElement.blur()
			} catch (g) {}
			m.title && (document.title = m.title), n("pjax:beforeReplace", [m.contents, t], {
				state: i.state,
				previousState: d
			}), s.html(m.contents);
			var y = s.find("input[autofocus], textarea[autofocus]").last()[0];
			y && document.activeElement !== y && y.focus(), E(m.scripts);
			var b = t.scrollTo;
			if (a) {
				var U = decodeURIComponent(a.slice(1)),
					w = document.getElementById(U) || document.getElementsByName(U)[0];
				w && (b = e(w).offset().top)
			}
			"number" == typeof b && e(window).scrollTop(b), n("pjax:success", [r, l, u, t])
		}, i.state || (i.state = {
			id: c(),
			url: window.location.href,
			title: document.title,
			container: s.selector,
			fragment: t.fragment,
			timeout: t.timeout
		}, window.history.replaceState(i.state, document.title)), u(i.xhr), i.options = t;
		var p = i.xhr = e.ajax(t);
		return p.readyState > 0 && (t.push && !t.replace && (b(i.state.id, d(s)), window.history.pushState(null, "", t.requestUrl)), n("pjax:start", [p, t]), n("pjax:send", [p, t])), i.xhr
	}
	function a(t, n) {
		var r = {
			url: window.location.href,
			push: !1,
			replace: !0,
			scrollTo: !1
		};
		return i(e.extend(r, m(t, n)))
	}
	function o(e) {
		window.history.replaceState(null, "", i.state.url), window.location.replace(e)
	}
	function s(t) {
		F || u(i.xhr);
		var n, r = i.state,
			a = t.state;
		if (a && a.container) {
			if (F && D == a.url) return;
			if (r) {
				if (r.id === a.id) return;
				n = r.id < a.id ? "forward" : "back"
			}
			var s = T[a.id] || [],
				l = e(s[0] || a.container),
				c = s[1];
			if (l.length) {
				r && U(n, r.id, d(l));
				var h = e.Event("pjax:popstate", {
					state: a,
					direction: n
				});
				l.trigger(h);
				var f = {
					id: a.id,
					url: a.url,
					container: l,
					push: !1,
					fragment: a.fragment,
					timeout: a.timeout,
					scrollTo: !1
				};
				if (c) {
					l.trigger("pjax:start", [null, f]), i.state = a, a.title && (document.title = a.title);
					var p = e.Event("pjax:beforeReplace", {
						state: a,
						previousState: r
					});
					l.trigger(p, [c, f]), l.html(c), l.trigger("pjax:end", [null, f])
				} else i(f);
				l[0].offsetHeight
			} else o(location.href)
		}
		F = !1
	}
	function l(t) {
		var n = e.isFunction(t.url) ? t.url() : t.url,
			r = t.type ? t.type.toUpperCase() : "GET",
			i = e("<form>", {
				method: "GET" === r ? "GET" : "POST",
				action: n,
				style: "display:none"
			});
		"GET" !== r && "POST" !== r && i.append(e("<input>", {
			type: "hidden",
			name: "_method",
			value: r.toLowerCase()
		}));
		var a = t.data;
		if ("string" == typeof a) e.each(a.split("&"), function(t, n) {
			var r = n.split("=");
			i.append(e("<input>", {
				type: "hidden",
				name: r[0],
				value: r[1]
			}))
		});
		else if (e.isArray(a)) e.each(a, function(t, n) {
			i.append(e("<input>", {
				type: "hidden",
				name: n.name,
				value: n.value
			}))
		});
		else if ("object" == typeof a) {
			var o;
			for (o in a) i.append(e("<input>", {
				type: "hidden",
				name: o,
				value: a[o]
			}))
		}
		e(document.body).append(i), i.submit()
	}
	function u(t) {
		t && t.readyState < 4 && (t.onreadystatechange = e.noop, t.abort())
	}
	function c() {
		return (new Date).getTime()
	}
	function d(e) {
		var t = e.clone();
		return t.find("script").each(function() {
			this.src || jQuery._data(this, "globalEval", !1)
		}), [e.selector, t.contents()]
	}
	function h(e) {
		return e.search = e.search.replace(/([?&])(_pjax|_)=[^&]*/g, ""), e.href.replace(/\?($|#)/, "$1")
	}
	function f(e) {
		var t = document.createElement("a");
		return t.href = e, t
	}
	function p(e) {
		return e.href.replace(/#.*/, "")
	}
	function m(t, n) {
		return t && n ? n.container = t : n = e.isPlainObject(t) ? t : {
			container: t
		}, n.container && (n.container = _(n.container)), n
	}
	function _(t) {
		if (t = e(t), t.length) {
			if ("" !== t.selector && t.context === document) return t;
			if (t.attr("id")) return e("#" + t.attr("id"));
			throw "cant get selector for pjax container!"
		}
		throw "no pjax container for " + t.selector
	}
	function g(e, t) {
		return e.filter(t).add(e.find(t))
	}
	function y(t) {
		return e.parseHTML(t, document, !0)
	}
	function v(t, n, r) {
		var i = {},
			a = /<html/i.test(t),
			o = n.getResponseHeader("X-PJAX-URL");
		if (i.url = o ? h(f(o)) : r.requestUrl, a) var s = e(y(t.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0])),
			l = e(y(t.match(/<body[^>]*>([\s\S.]*)<\/body>/i)[0]));
		else var s = l = e(y(t));
		if (0 === l.length) return i;
		if (i.title = g(s, "title").last().text(), r.fragment) {
			if ("body" === r.fragment) var u = l;
			else var u = g(l, r.fragment).first();
			u.length && (i.contents = "body" === r.fragment ? u : u.contents(), i.title || (i.title = u.attr("title") || u.data("title")))
		} else a || (i.contents = l);
		return i.contents && (i.contents = i.contents.not(function() {
			return e(this).is("title")
		}), i.contents.find("title").remove(), i.scripts = g(i.contents, "script[src]").remove(), i.contents = i.contents.not(i.scripts)), i.title && (i.title = e.trim(i.title)), i
	}
	function E(t) {
		if (t) {
			var n = e("script[src]");
			t.each(function() {
				var t = this.src,
					r = n.filter(function() {
						return this.src === t
					});
				if (!r.length) {
					var i = document.createElement("script"),
						a = e(this).attr("type");
					a && (i.type = a), i.src = e(this).attr("src"), document.head.appendChild(i)
				}
			})
		}
	}
	function b(e, t) {
		T[e] = t, S.push(e), w(Y, 0), w(S, i.defaults.maxCacheLength)
	}
	function U(e, t, n) {
		var r, a;
		T[t] = n, "forward" === e ? (r = S, a = Y) : (r = Y, a = S), r.push(t), (t = a.pop()) && delete T[t], w(r, i.defaults.maxCacheLength)
	}
	function w(e, t) {
		for (; e.length > t;) delete T[e.shift()]
	}
	function k() {
		return e("meta").filter(function() {
			var t = e(this).attr("http-equiv");
			return t && "X-PJAX-VERSION" === t.toUpperCase()
		}).attr("content");
	}
	function M() {
		e.fn.pjax = t, e.pjax = i, e.pjax.enable = e.noop, e.pjax.disable = L, e.pjax.click = n, e.pjax.submit = r, e.pjax.reload = a, e.pjax.defaults = {
			timeout: 650,
			push: !0,
			replace: !1,
			type: "GET",
			dataType: "html",
			scrollTo: 0,
			maxCacheLength: 20,
			version: k
		}, e(window).on("popstate.pjax", s)
	}
	function L() {
		e.fn.pjax = function() {
			return this
		}, e.pjax = l, e.pjax.enable = M, e.pjax.disable = e.noop, e.pjax.click = e.noop, e.pjax.submit = e.noop, e.pjax.reload = function() {
			window.location.reload()
		}, e(window).off("popstate.pjax", s)
	}
	var F = !0,
		D = window.location.href,
		x = window.history.state;
	x && x.container && (i.state = x), "state" in window.history && (F = !1);
	var T = {},
		Y = [],
		S = [];
	e.inArray("state", e.event.props) < 0 && e.event.props.push("state"), e.support.pjax = window.history && window.history.pushState && window.history.replaceState && !navigator.userAgent.match(/((iPod|iPhone|iPad).+\bOS\s+[1-4]\D|WebApps\/.+CFNetwork)/), e.support.pjax ? M() : L()
}(jQuery), !
function(e) {
	var t, n = {
		className: "autosizejs",
		id: "autosizejs",
		append: "\n",
		callback: !1,
		resizeDelay: 10,
		placeholder: !0
	},
		r = ["fontFamily", "fontSize", "fontWeight", "fontStyle", "letterSpacing", "textTransform", "wordSpacing", "textIndent", "whiteSpace"],
		i = e('<textarea tabindex="-1"/>').data("autosize", !0)[0];
	i.style.cssText = "position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;", i.style.lineHeight = "99px", "99px" === e(i).css("lineHeight") && r.push("lineHeight"), i.style.lineHeight = "", e.fn.autosize = function(a) {
		return this.length ? (a = e.extend({}, n, a || {}), i.parentNode !== document.body && e(document.body).append(i), this.each(function() {
			function n() {
				var t, n = window.getComputedStyle ? window.getComputedStyle(h, null) : null;
				n ? (t = parseFloat(n.width), ("border-box" === n.boxSizing || "border-box" === n.webkitBoxSizing || "border-box" === n.mozBoxSizing) && e.each(["paddingLeft", "paddingRight", "borderLeftWidth", "borderRightWidth"], function(e, r) {
					t -= parseFloat(n[r])
				})) : t = f.width(), i.style.width = Math.max(t, 0) + "px"
			}
			function o() {
				var o = {};
				if (t = h, i.className = a.className, i.id = a.id, u = parseFloat(f.css("maxHeight")), e.each(r, function(e, t) {
					o[t] = f.css(t)
				}), e(i).css(o).attr("wrap", f.attr("wrap")), n(), window.chrome) {
					var s = h.style.width;
					h.style.width = "0px", h.offsetWidth, h.style.width = s
				}
			}
			function s() {
				var e, r;
				t !== h ? o() : n(), i.value = !h.value && a.placeholder ? f.attr("placeholder") || "" : h.value, i.value += a.append || "", i.style.overflowY = h.style.overflowY, r = parseFloat(h.style.height) || 0, i.scrollTop = 0, i.scrollTop = 9e4, e = i.scrollTop, u && e > u ? (h.style.overflowY = "scroll", e = u) : (h.style.overflowY = "hidden", c > e && (e = c)), e += p, Math.abs(r - e) > .01 && (h.style.height = e + "px", i.className = i.className, m && a.callback.call(h, h), f.trigger("autosize.resized"))
			}
			function l() {
				clearTimeout(d), d = setTimeout(function() {
					var e = f.width();
					e !== g && (g = e, s())
				}, parseInt(a.resizeDelay, 10))
			}
			var u, c, d, h = this,
				f = e(h),
				p = 0,
				m = e.isFunction(a.callback),
				_ = {
					height: h.style.height,
					overflow: h.style.overflow,
					overflowY: h.style.overflowY,
					wordWrap: h.style.wordWrap,
					resize: h.style.resize
				},
				g = f.width(),
				y = f.css("resize");
			f.data("autosize") || (f.data("autosize", !0), ("border-box" === f.css("box-sizing") || "border-box" === f.css("-moz-box-sizing") || "border-box" === f.css("-webkit-box-sizing")) && (p = f.outerHeight() - f.height()), c = Math.max(parseFloat(f.css("minHeight")) - p || 0, f.height()), f.css({
				overflow: "hidden",
				overflowY: "hidden",
				wordWrap: "break-word"
			}), "vertical" === y ? f.css("resize", "none") : "both" === y && f.css("resize", "horizontal"), "onpropertychange" in h ? "oninput" in h ? f.on("input.autosize keyup.autosize", s) : f.on("propertychange.autosize", function() {
				"value" === event.propertyName && s()
			}) : f.on("input.autosize", s), a.resizeDelay !== !1 && e(window).on("resize.autosize", l), f.on("autosize.resize", s), f.on("autosize.resizeIncludeStyle", function() {
				t = null, s()
			}), f.on("autosize.destroy", function() {
				t = null, clearTimeout(d), e(window).off("resize", l), f.off("autosize").off(".autosize").css(_).removeData("autosize")
			}), s())
		})) : this
	}
}(jQuery || $), !
function(e, t, n) {
	"use strict";
	e.fn.scrollUp = function(t) {
		e.data(n.body, "scrollUp") || (e.data(n.body, "scrollUp", !0), e.fn.scrollUp.init(t))
	}, e.fn.scrollUp.init = function(r) {
		var i, a, o, s, l, u, c, d = e.fn.scrollUp.settings = e.extend({}, e.fn.scrollUp.defaults, r),
			h = !1;
		switch (c = d.scrollTrigger ? e(d.scrollTrigger) : e("<a/>", {
			id: d.scrollName,
			href: "#top"
		}), d.scrollTitle && c.attr("title", d.scrollTitle), c.appendTo("body"), d.scrollImg || d.scrollTrigger || c.html(d.scrollText), c.css({
			display: "none",
			position: "fixed",
			zIndex: d.zIndex
		}), d.activeOverlay && e("<div/>", {
			id: d.scrollName + "-active"
		}).css({
			position: "absolute",
			top: d.scrollDistance + "px",
			width: "100%",
			borderTop: "1px dotted" + d.activeOverlay,
			zIndex: d.zIndex
		}).appendTo("body"), d.animation) {
		case "fade":
			i = "fadeIn", a = "fadeOut", o = d.animationSpeed;
			break;
		case "slide":
			i = "slideDown", a = "slideUp", o = d.animationSpeed;
			break;
		default:
			i = "show", a = "hide", o = 0
		}
		s = "top" === d.scrollFrom ? d.scrollDistance : e(n).height() - e(t).height() - d.scrollDistance, l = e(t).scroll(function() {
			e(t).scrollTop() > s ? h || (c[i](o), h = !0) : h && (c[a](o), h = !1)
		}), d.scrollTarget ? "number" == typeof d.scrollTarget ? u = d.scrollTarget : "string" == typeof d.scrollTarget && (u = Math.floor(e(d.scrollTarget).offset().top)) : u = 0, c.click(function(t) {
			t.preventDefault(), e("html, body").animate({
				scrollTop: u
			}, d.scrollSpeed, d.easingType)
		})
	}, e.fn.scrollUp.defaults = {
		scrollName: "scrollUp",
		scrollDistance: 300,
		scrollFrom: "top",
		scrollSpeed: 300,
		easingType: "linear",
		animation: "fade",
		animationSpeed: 200,
		scrollTrigger: !1,
		scrollTarget: !1,
		scrollText: "Scroll to top",
		scrollTitle: !1,
		scrollImg: !1,
		activeOverlay: !1,
		zIndex: 2147483647
	}, e.fn.scrollUp.destroy = function(r) {
		e.removeData(n.body, "scrollUp"), e("#" + e.fn.scrollUp.settings.scrollName).remove(), e("#" + e.fn.scrollUp.settings.scrollName + "-active").remove(), e.fn.jquery.split(".")[1] >= 7 ? e(t).off("scroll", r) : e(t).unbind("scroll", r)
	}, e.scrollUp = e.fn.scrollUp
}(jQuery, window, document), !
function(e) {
	if ("function" == typeof define && define.amd) define(["jquery"], e);
	else if ("object" == typeof module && module.exports) {
		var t = require("jquery");
		module.exports = e(t)
	} else e(jQuery)
}(function(e) {
	if ("undefined" == typeof e) throw new Error("jQuery.textcomplete requires jQuery");
	return +
	function(e) {
		"use strict";
		var t = function(e) {
				console.warn && console.warn(e)
			},
			n = 1;
		e.fn.textcomplete = function(r, i) {
			var a = Array.prototype.slice.call(arguments);
			return this.each(function() {
				var o = this,
					s = e(this),
					l = s.data("textComplete");
				if (l || (i || (i = {}), i._oid = n++, l = new e.fn.textcomplete.Completer(this, i), s.data("textComplete", l)), "string" == typeof r) {
					if (!l) return;
					a.shift(), l[r].apply(l, a), "destroy" === r && s.removeData("textComplete")
				} else e.each(r, function(n) {
					e.each(["header", "footer", "placement", "maxCount"], function(e) {
						n[e] && (l.option[e] = n[e], t(e + "as a strategy param is deprecated. Use option."), delete n[e])
					})
				}), l.register(e.fn.textcomplete.Strategy.parse(r, {
					el: o,
					$el: s
				}))
			})
		}
	}(e), +
	function(e) {
		"use strict";

		function t(n, r) {
			if (this.$el = e(n), this.id = "textcomplete" + a++, this.strategies = [], this.views = [], this.option = e.extend({}, t._getDefaults(), r), !(this.$el.is("input[type=text]") || this.$el.is("input[type=search]") || this.$el.is("textarea") || n.isContentEditable || "true" == n.contentEditable)) throw new Error("textcomplete must be called on a Textarea or a ContentEditable.");
			if (n === n.ownerDocument.activeElement) this.initialize();
			else {
				var i = this;
				this.$el.one("focus." + this.id, function() {
					i.initialize()
				})
			}
		}
		var n = function(e) {
				var t, n;
				return function() {
					var r = Array.prototype.slice.call(arguments);
					if (t) return void(n = r);
					t = !0;
					var i = this;
					r.unshift(function a() {
						if (n) {
							var r = n;
							n = void 0, r.unshift(a), e.apply(i, r)
						} else t = !1
					}), e.apply(this, r)
				}
			},
			r = function(e) {
				return "[object String]" === Object.prototype.toString.call(e)
			},
			i = function(e) {
				return "[object Function]" === Object.prototype.toString.call(e)
			},
			a = 0;
		t._getDefaults = function() {
			return t.DEFAULTS || (t.DEFAULTS = {
				appendTo: e("body"),
				zIndex: "100"
			}), t.DEFAULTS
		}, e.extend(t.prototype, {
			id: null,
			option: null,
			strategies: null,
			adapter: null,
			dropdown: null,
			$el: null,
			$iframe: null,
			initialize: function() {
				var t = this.$el.get(0);
				if (this.$el.prop("ownerDocument") !== document && window.frames.length) for (var n = 0; n < window.frames.length; n++) if (this.$el.prop("ownerDocument") === window.frames[n].document) {
					this.$iframe = e(window.frames[n].frameElement);
					break
				}
				this.dropdown = new e.fn.textcomplete.Dropdown(t, this, this.option);
				var r, i;
				this.option.adapter ? r = this.option.adapter : (i = this.$el.is("textarea") || this.$el.is("input[type=text]") || this.$el.is("input[type=search]") ? "number" == typeof t.selectionEnd ? "Textarea" : "IETextarea" : "ContentEditable", r = e.fn.textcomplete[i]), this.adapter = new r(t, this, this.option)
			},
			destroy: function() {
				this.$el.off("." + this.id), this.adapter && this.adapter.destroy(), this.dropdown && this.dropdown.destroy(), this.$el = this.adapter = this.dropdown = null
			},
			deactivate: function() {
				this.dropdown && this.dropdown.deactivate()
			},
			trigger: function(e, t) {
				this.dropdown || this.initialize(), null != e || (e = this.adapter.getTextFromHeadToCaret());
				var n = this._extractSearchQuery(e);
				if (n.length) {
					var r = n[1];
					if (t && this._term === r && "" !== r) return;
					this._term = r, this._search.apply(this, n)
				} else this._term = null, this.dropdown.deactivate()
			},
			fire: function(e) {
				var t = Array.prototype.slice.call(arguments, 1);
				return this.$el.trigger(e, t), this
			},
			register: function(e) {
				Array.prototype.push.apply(this.strategies, e)
			},
			select: function(e, t, n) {
				this._term = null, this.adapter.select(e, t, n), this.fire("change").fire("textComplete:select", e, t), this.adapter.focus()
			},
			_clearAtNext: !0,
			_term: null,
			_extractSearchQuery: function(e) {
				for (var t = 0; t < this.strategies.length; t++) {
					var n = this.strategies[t],
						a = n.context(e);
					if (a || "" === a) {
						var o = i(n.match) ? n.match(e) : n.match;
						r(a) && (e = a);
						var s = e.match(o);
						if (s) return [n, s[n.index], s]
					}
				}
				return []
			},
			_search: n(function(e, t, n, r) {
				var i = this;
				t.search(n, function(r, a) {
					i.dropdown.shown || i.dropdown.activate(), i._clearAtNext && (i.dropdown.clear(), i._clearAtNext = !1), i.dropdown.setPosition(i.adapter.getCaretPosition()), i.dropdown.render(i._zip(r, t, n)), a || (e(), i._clearAtNext = !0)
				}, r)
			}),
			_zip: function(t, n, r) {
				return e.map(t, function(e) {
					return {
						value: e,
						strategy: n,
						term: r
					}
				})
			}
		}), e.fn.textcomplete.Completer = t
	}(e), +
	function(e) {
		"use strict";

		function t(n, r, a) {
			this.$el = t.createElement(a), this.completer = r, this.id = r.id + "dropdown", this._data = [], this.$inputEl = e(n), this.option = a, a.listPosition && (this.setPosition = a.listPosition), a.height && this.$el.height(a.height);
			var o = this;
			e.each(["maxCount", "placement", "footer", "header", "noResultsMessage", "className"], function(e, t) {
				null != a[t] && (o[t] = a[t])
			}), this._bindEvents(n), i[this.id] = this
		}
		var n = e(window),
			r = function(e, t) {
				var n, r, i = t.strategy.idProperty;
				for (n = 0; n < e.length; n++) if (r = e[n], r.strategy === t.strategy) if (i) {
					if (r.value[i] === t.value[i]) return !0
				} else if (r.value === t.value) return !0;
				return !1
			},
			i = {};
		e(document).on("click", function(t) {
			var n = t.originalEvent && t.originalEvent.keepTextCompleteDropdown;
			e.each(i, function(e, t) {
				e !== n && t.deactivate()
			})
		});
		var a = {
			SKIP_DEFAULT: 0,
			KEY_UP: 1,
			KEY_DOWN: 2,
			KEY_ENTER: 3,
			KEY_PAGEUP: 4,
			KEY_PAGEDOWN: 5,
			KEY_ESCAPE: 6
		};
		e.extend(t, {
			createElement: function(t) {
				var n = t.appendTo;
				n instanceof e || (n = e(n));
				var r = e("<ul></ul>").addClass("dropdown-menu textcomplete-dropdown").attr("id", "textcomplete-dropdown-" + t._oid).css({
					display: "none",
					left: 0,
					position: "absolute",
					zIndex: t.zIndex
				}).appendTo(n);
				return r
			}
		}), e.extend(t.prototype, {
			$el: null,
			$inputEl: null,
			completer: null,
			footer: null,
			header: null,
			id: null,
			maxCount: 10,
			placement: "",
			shown: !1,
			data: [],
			className: "",
			destroy: function() {
				this.deactivate(), this.$el.off("." + this.id), this.$inputEl.off("." + this.id), this.clear(), this.$el.remove(), this.$el = this.$inputEl = this.completer = null, delete i[this.id]
			},
			render: function(t) {
				var n = this._buildContents(t),
					r = e.map(this.data, function(e) {
						return e.value
					});
				if (this.data.length) {
					var i = t[0].strategy;
					i.id ? this.$el.attr("data-strategy", i.id) : this.$el.removeAttr("data-strategy"), this._renderHeader(r), this._renderFooter(r), n && (this._renderContents(n), this._fitToBottom(), this._fitToRight(), this._activateIndexedItem()), this._setScroll()
				} else this.noResultsMessage ? this._renderNoResultsMessage(r) : this.shown && this.deactivate()
			},
			setPosition: function(t) {
				var r = "absolute";
				return this.$inputEl.add(this.$inputEl.parents()).each(function() {
					return "absolute" !== e(this).css("position") && ("fixed" === e(this).css("position") ? (t.top -= n.scrollTop(), t.left -= n.scrollLeft(), r = "fixed", !1) : void 0)
				}), this.$el.css(this._applyPlacement(t)), this.$el.css({
					position: r
				}), this
			},
			clear: function() {
				this.$el.html(""), this.data = [], this._index = 0, this._$header = this._$footer = this._$noResultsMessage = null
			},
			activate: function() {
				return this.shown || (this.clear(), this.$el.show(), this.className && this.$el.addClass(this.className), this.completer.fire("textComplete:show"), this.shown = !0), this
			},
			deactivate: function() {
				return this.shown && (this.$el.hide(), this.className && this.$el.removeClass(this.className), this.completer.fire("textComplete:hide"), this.shown = !1), this
			},
			isUp: function(e) {
				return 38 === e.keyCode || e.ctrlKey && 80 === e.keyCode
			},
			isDown: function(e) {
				return 40 === e.keyCode || e.ctrlKey && 78 === e.keyCode
			},
			isEnter: function(e) {
				var t = e.ctrlKey || e.altKey || e.metaKey || e.shiftKey;
				return !t && (13 === e.keyCode || 9 === e.keyCode || this.option.completeOnSpace === !0 && 32 === e.keyCode)
			},
			isPageup: function(e) {
				return 33 === e.keyCode
			},
			isPagedown: function(e) {
				return 34 === e.keyCode
			},
			isEscape: function(e) {
				return 27 === e.keyCode
			},
			_data: null,
			_index: null,
			_$header: null,
			_$noResultsMessage: null,
			_$footer: null,
			_bindEvents: function() {
				this.$el.on("mousedown." + this.id, ".textcomplete-item", e.proxy(this._onClick, this)), this.$el.on("touchstart." + this.id, ".textcomplete-item", e.proxy(this._onClick, this)), this.$el.on("mouseover." + this.id, ".textcomplete-item", e.proxy(this._onMouseover, this)), this.$inputEl.on("keydown." + this.id, e.proxy(this._onKeydown, this))
			},
			_onClick: function(t) {
				var n = e(t.target);
				t.preventDefault(), t.originalEvent.keepTextCompleteDropdown = this.id, n.hasClass("textcomplete-item") || (n = n.closest(".textcomplete-item"));
				var r = this.data[parseInt(n.data("index"), 10)];
				this.completer.select(r.value, r.strategy, t);
				var i = this;
				setTimeout(function() {
					i.deactivate(), "touchstart" === t.type && i.$inputEl.focus()
				}, 0)
			},
			_onMouseover: function(t) {
				var n = e(t.target);
				t.preventDefault(), n.hasClass("textcomplete-item") || (n = n.closest(".textcomplete-item")), this._index = parseInt(n.data("index"), 10), this._activateIndexedItem()
			},
			_onKeydown: function(t) {
				if (this.shown) {
					var n;
					switch (e.isFunction(this.option.onKeydown) && (n = this.option.onKeydown(t, a)), null == n && (n = this._defaultKeydown(t)), n) {
					case a.KEY_UP:
						t.preventDefault(), this._up();
						break;
					case a.KEY_DOWN:
						t.preventDefault(), this._down();
						break;
					case a.KEY_ENTER:
						t.preventDefault(), this._enter(t);
						break;
					case a.KEY_PAGEUP:
						t.preventDefault(), this._pageup();
						break;
					case a.KEY_PAGEDOWN:
						t.preventDefault(), this._pagedown();
						break;
					case a.KEY_ESCAPE:
						t.preventDefault(), this.deactivate()
					}
				}
			},
			_defaultKeydown: function(e) {
				return this.isUp(e) ? a.KEY_UP : this.isDown(e) ? a.KEY_DOWN : this.isEnter(e) ? a.KEY_ENTER : this.isPageup(e) ? a.KEY_PAGEUP : this.isPagedown(e) ? a.KEY_PAGEDOWN : this.isEscape(e) ? a.KEY_ESCAPE : void 0
			},
			_up: function() {
				0 === this._index ? this._index = this.data.length - 1 : this._index -= 1, this._activateIndexedItem(), this._setScroll()
			},
			_down: function() {
				this._index === this.data.length - 1 ? this._index = 0 : this._index += 1, this._activateIndexedItem(), this._setScroll()
			},
			_enter: function(e) {
				var t = this.data[parseInt(this._getActiveElement().data("index"), 10)];
				this.completer.select(t.value, t.strategy, e), this.deactivate()
			},
			_pageup: function() {
				var t = 0,
					n = this._getActiveElement().position().top - this.$el.innerHeight();
				this.$el.children().each(function(r) {
					return e(this).position().top + e(this).outerHeight() > n ? (t = r, !1) : void 0
				}), this._index = t, this._activateIndexedItem(), this._setScroll()
			},
			_pagedown: function() {
				var t = this.data.length - 1,
					n = this._getActiveElement().position().top + this.$el.innerHeight();
				this.$el.children().each(function(r) {
					return e(this).position().top > n ? (t = r, !1) : void 0
				}), this._index = t, this._activateIndexedItem(), this._setScroll()
			},
			_activateIndexedItem: function() {
				this.$el.find(".textcomplete-item.active").removeClass("active"), this._getActiveElement().addClass("active")
			},
			_getActiveElement: function() {
				return this.$el.children(".textcomplete-item:nth(" + this._index + ")")
			},
			_setScroll: function() {
				var e = this._getActiveElement(),
					t = e.position().top,
					n = e.outerHeight(),
					r = this.$el.innerHeight(),
					i = this.$el.scrollTop();
				0 === this._index || this._index == this.data.length - 1 || 0 > t ? this.$el.scrollTop(t + i) : t + n > r && this.$el.scrollTop(t + n + i - r)
			},
			_buildContents: function(e) {
				var t, n, i, a = "";
				for (n = 0; n < e.length && this.data.length !== this.maxCount; n++) t = e[n], r(this.data, t) || (i = this.data.length, this.data.push(t), a += '<li class="textcomplete-item" data-index="' + i + '"><a>', a += t.strategy.template(t.value, t.term), a += "</a></li>");
				return a
			},
			_renderHeader: function(t) {
				if (this.header) {
					this._$header || (this._$header = e('<li class="textcomplete-header"></li>').prependTo(this.$el));
					var n = e.isFunction(this.header) ? this.header(t) : this.header;
					this._$header.html(n)
				}
			},
			_renderFooter: function(t) {
				if (this.footer) {
					this._$footer || (this._$footer = e('<li class="textcomplete-footer"></li>').appendTo(this.$el));
					var n = e.isFunction(this.footer) ? this.footer(t) : this.footer;
					this._$footer.html(n)
				}
			},
			_renderNoResultsMessage: function(t) {
				if (this.noResultsMessage) {
					this._$noResultsMessage || (this._$noResultsMessage = e('<li class="textcomplete-no-results-message"></li>').appendTo(this.$el));
					var n = e.isFunction(this.noResultsMessage) ? this.noResultsMessage(t) : this.noResultsMessage;
					this._$noResultsMessage.html(n)
				}
			},
			_renderContents: function(e) {
				this._$footer ? this._$footer.before(e) : this.$el.append(e)
			},
			_fitToBottom: function() {
				var e = n.scrollTop() + n.height(),
					t = this.$el.height();
				this.$el.position().top + t > e && (this.completer.$iframe || this.$el.offset({
					top: e - t
				}))
			},
			_fitToRight: function() {
				for (var e, t = 30, r = this.$el.offset().left, i = this.$el.width(), a = n.width() - t; r + i > a && (this.$el.offset({
					left: r - t
				}), e = this.$el.offset().left, !(e >= r));) r = e
			},
			_applyPlacement: function(e) {
				return -1 !== this.placement.indexOf("top") ? e = {
					top: "auto",
					bottom: this.$el.parent().height() - e.top + e.lineHeight,
					left: e.left
				} : (e.bottom = "auto", delete e.lineHeight), -1 !== this.placement.indexOf("absleft") ? e.left = 0 : -1 !== this.placement.indexOf("absright") && (e.right = 0, e.left = "auto"), e
			}
		}), e.fn.textcomplete.Dropdown = t, e.extend(e.fn.textcomplete, a)
	}(e), +
	function(e) {
		"use strict";

		function t(t) {
			e.extend(this, t), this.cache && (this.search = n(this.search))
		}
		var n = function(e) {
				var t = {};
				return function(n, r) {
					t[n] ? r(t[n]) : e.call(this, n, function(e) {
						t[n] = (t[n] || []).concat(e), r.apply(null, arguments)
					})
				}
			};
		t.parse = function(n, r) {
			return e.map(n, function(e) {
				var n = new t(e);
				return n.el = r.el, n.$el = r.$el, n
			})
		}, e.extend(t.prototype, {
			match: null,
			replace: null,
			search: null,
			id: null,
			cache: !1,
			context: function() {
				return !0
			},
			index: 2,
			template: function(e) {
				return e
			},
			idProperty: null
		}), e.fn.textcomplete.Strategy = t
	}(e), +
	function(e) {
		"use strict";

		function t() {}
		var n = Date.now ||
		function() {
			return (new Date).getTime()
		}, r = function(e, t) {
			var r, i, a, o, s, l = function() {
					var u = n() - o;
					t > u ? r = setTimeout(l, t - u) : (r = null, s = e.apply(a, i), a = i = null)
				};
			return function() {
				return a = this, i = arguments, o = n(), r || (r = setTimeout(l, t)), s
			}
		};
		e.extend(t.prototype, {
			id: null,
			completer: null,
			el: null,
			$el: null,
			option: null,
			initialize: function(t, n, i) {
				this.el = t, this.$el = e(t), this.id = n.id + this.constructor.name, this.completer = n, this.option = i, this.option.debounce && (this._onKeyup = r(this._onKeyup, this.option.debounce)), this._bindEvents()
			},
			destroy: function() {
				this.$el.off("." + this.id), this.$el = this.el = this.completer = null
			},
			select: function() {
				throw new Error("Not implemented")
			},
			getCaretPosition: function() {
				var t = this._getCaretRelativePosition(),
					n = this.$el.offset(),
					r = this.option.appendTo;
				if (r) {
					r instanceof e || (r = e(r));
					var i = r.offsetParent().offset();
					n.top -= i.top, n.left -= i.left
				}
				return t.top += n.top, t.left += n.left, t
			},
			focus: function() {
				this.$el.focus()
			},
			_bindEvents: function() {
				this.$el.on("keyup." + this.id, e.proxy(this._onKeyup, this))
			},
			_onKeyup: function(e) {
				this._skipSearch(e) || this.completer.trigger(this.getTextFromHeadToCaret(), !0)
			},
			_skipSearch: function(e) {
				switch (e.keyCode) {
				case 9:
				case 13:
				case 40:
				case 38:
					return !0
				}
				if (e.ctrlKey) switch (e.keyCode) {
				case 78:
				case 80:
					return !0
				}
			}
		}), e.fn.textcomplete.Adapter = t
	}(e), +
	function(e) {
		"use strict";

		function t(e, t, n) {
			this.initialize(e, t, n)
		}
		e.extend(t.prototype, e.fn.textcomplete.Adapter.prototype, {
			select: function(t, n, r) {
				var i = this.getTextFromHeadToCaret(),
					a = this.el.value.substring(this.el.selectionEnd),
					o = n.replace(t, r);
				"undefined" != typeof o && (e.isArray(o) && (a = o[1] + a, o = o[0]), i = i.replace(n.match, o), this.$el.val(i + a), this.el.selectionStart = this.el.selectionEnd = i.length)
			},
			getTextFromHeadToCaret: function() {
				return this.el.value.substring(0, this.el.selectionEnd)
			},
			_getCaretRelativePosition: function() {
				var t = e.fn.textcomplete.getCaretCoordinates(this.el, this.el.selectionStart);
				return {
					top: t.top + this._calculateLineHeight() - this.$el.scrollTop(),
					left: t.left - this.$el.scrollLeft()
				}
			},
			_calculateLineHeight: function() {
				var e = parseInt(this.$el.css("line-height"), 10);
				if (isNaN(e)) {
					var t = this.el.parentNode,
						n = document.createElement(this.el.nodeName),
						r = this.el.style;
					n.setAttribute("style", "margin:0px;padding:0px;font-family:" + r.fontFamily + ";font-size:" + r.fontSize), n.innerHTML = "test", t.appendChild(n), e = n.clientHeight, t.removeChild(n)
				}
				return e
			}
		}), e.fn.textcomplete.Textarea = t
	}(e), +
	function(e) {
		"use strict";

		function t(t, r, i) {
			this.initialize(t, r, i), e("<span>" + n + "</span>").css({
				position: "absolute",
				top: -9999,
				left: -9999
			}).insertBefore(t)
		}
		var n = "吶";
		e.extend(t.prototype, e.fn.textcomplete.Textarea.prototype, {
			select: function(t, n, r) {
				var i = this.getTextFromHeadToCaret(),
					a = this.el.value.substring(i.length),
					o = n.replace(t, r);
				if ("undefined" != typeof o) {
					e.isArray(o) && (a = o[1] + a, o = o[0]), i = i.replace(n.match, o), this.$el.val(i + a), this.el.focus();
					var s = this.el.createTextRange();
					s.collapse(!0), s.moveEnd("character", i.length), s.moveStart("character", i.length), s.select()
				}
			},
			getTextFromHeadToCaret: function() {
				this.el.focus();
				var e = document.selection.createRange();
				e.moveStart("character", -this.el.value.length);
				var t = e.text.split(n);
				return 1 === t.length ? t[0] : t[1]
			}
		}), e.fn.textcomplete.IETextarea = t
	}(e), +
	function(e) {
		"use strict";

		function t(e, t, n) {
			this.initialize(e, t, n)
		}
		e.extend(t.prototype, e.fn.textcomplete.Adapter.prototype, {
			select: function(t, n, r) {
				var i = this.getTextFromHeadToCaret(),
					a = this.el.ownerDocument.getSelection(),
					o = a.getRangeAt(0),
					s = o.cloneRange();
				s.selectNodeContents(o.startContainer);
				var l = s.toString(),
					u = l.substring(o.startOffset),
					c = n.replace(t, r);
				if ("undefined" != typeof c) {
					e.isArray(c) && (u = c[1] + u, c = c[0]), i = i.replace(n.match, c), o.selectNodeContents(o.startContainer), o.deleteContents();
					var d = this.el.ownerDocument.createElement("div");
					d.innerHTML = i;
					var h = this.el.ownerDocument.createElement("div");
					h.innerHTML = u;
					for (var f, p, m = this.el.ownerDocument.createDocumentFragment(); f = d.firstChild;) p = m.appendChild(f);
					for (; f = h.firstChild;) m.appendChild(f);
					o.insertNode(m), o.setStartAfter(p), o.collapse(!0), a.removeAllRanges(), a.addRange(o)
				}
			},
			_getCaretRelativePosition: function() {
				var t = this.el.ownerDocument.getSelection().getRangeAt(0).cloneRange(),
					n = this.el.ownerDocument.createElement("span");
				t.insertNode(n), t.selectNodeContents(n), t.deleteContents();
				var r = e(n),
					i = r.offset();
				if (i.left -= this.$el.offset().left, i.top += r.height() - this.$el.offset().top, i.lineHeight = r.height(), this.completer.$iframe) {
					var a = this.completer.$iframe.offset();
					i.top += a.top, i.left += a.left, i.top -= this.$el.scrollTop()
				}
				return r.remove(), i
			},
			getTextFromHeadToCaret: function() {
				var e = this.el.ownerDocument.getSelection().getRangeAt(0),
					t = e.cloneRange();
				return t.selectNodeContents(e.startContainer), t.toString().substring(0, e.startOffset)
			}
		}), e.fn.textcomplete.ContentEditable = t
	}(e), function(e) {
		function t(e, t, a) {
			if (!r) throw new Error("textarea-caret-position#getCaretCoordinates should only be called in a browser");
			var o = a && a.debug || !1;
			if (o) {
				var s = document.querySelector("#input-textarea-caret-position-mirror-div");
				s && s.parentNode.removeChild(s)
			}
			var l = document.createElement("div");
			l.id = "input-textarea-caret-position-mirror-div", document.body.appendChild(l);
			var u = l.style,
				c = window.getComputedStyle ? getComputedStyle(e) : e.currentStyle;
			u.whiteSpace = "pre-wrap", "INPUT" !== e.nodeName && (u.wordWrap = "break-word"), u.position = "absolute", o || (u.visibility = "hidden"), n.forEach(function(e) {
				u[e] = c[e]
			}), i ? e.scrollHeight > parseInt(c.height) && (u.overflowY = "scroll") : u.overflow = "hidden", l.textContent = e.value.substring(0, t), "INPUT" === e.nodeName && (l.textContent = l.textContent.replace(/\s/g, " "));
			var d = document.createElement("span");
			d.textContent = e.value.substring(t) || ".", l.appendChild(d);
			var h = {
				top: d.offsetTop + parseInt(c.borderTopWidth),
				left: d.offsetLeft + parseInt(c.borderLeftWidth)
			};
			return o ? d.style.backgroundColor = "#aaa" : document.body.removeChild(l), h
		}
		var n = ["direction", "boxSizing", "width", "height", "overflowX", "overflowY", "borderTopWidth", "borderRightWidth", "borderBottomWidth", "borderLeftWidth", "borderStyle", "paddingTop", "paddingRight", "paddingBottom", "paddingLeft", "fontStyle", "fontVariant", "fontWeight", "fontStretch", "fontSize", "fontSizeAdjust", "lineHeight", "fontFamily", "textAlign", "textTransform", "textIndent", "textDecoration", "letterSpacing", "wordSpacing", "tabSize", "MozTabSize"],
			r = "undefined" != typeof window,
			i = r && null != window.mozInnerScreenX;
		e.fn.textcomplete.getCaretCoordinates = t
	}(e), e
}), function(e, t) {
	"function" == typeof define && define.amd ? define(t) : "object" == typeof exports ? module.exports = t() : e.NProgress = t()
}(this, function() {
	function e(e, t, n) {
		return e < t ? t : e > n ? n : e
	}
	function t(e) {
		return 100 * (-1 + e)
	}
	function n(e, n, r) {
		var i;
		return i = "translate3d" === u.positionUsing ? {
			transform: "translate3d(" + t(e) + "%,0,0)"
		} : "translate" === u.positionUsing ? {
			transform: "translate(" + t(e) + "%,0)"
		} : {
			"margin-left": t(e) + "%"
		}, i.transition = "all " + n + "ms " + r, i
	}
	function r(e, t) {
		var n = "string" == typeof e ? e : o(e);
		return n.indexOf(" " + t + " ") >= 0
	}
	function i(e, t) {
		var n = o(e),
			i = n + t;
		r(n, t) || (e.className = i.substring(1))
	}
	function a(e, t) {
		var n, i = o(e);
		r(e, t) && (n = i.replace(" " + t + " ", " "), e.className = n.substring(1, n.length - 1))
	}
	function o(e) {
		return (" " + (e.className || "") + " ").replace(/\s+/gi, " ")
	}
	function s(e) {
		e && e.parentNode && e.parentNode.removeChild(e)
	}
	var l = {};
	l.version = "0.1.6";
	var u = l.settings = {
		minimum: .08,
		easing: "ease",
		positionUsing: "",
		speed: 200,
		trickle: !0,
		trickleRate: .02,
		trickleSpeed: 800,
		showSpinner: !0,
		barSelector: '[role="bar"]',
		spinnerSelector: '[role="spinner"]',
		parent: "body",
		template: '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'
	};
	l.configure = function(e) {
		var t, n;
		for (t in e) n = e[t], void 0 !== n && e.hasOwnProperty(t) && (u[t] = n);
		return this
	}, l.status = null, l.set = function(t) {
		var r = l.isStarted();
		t = e(t, u.minimum, 1), l.status = 1 === t ? null : t;
		var i = l.render(!r),
			a = i.querySelector(u.barSelector),
			o = u.speed,
			s = u.easing;
		return i.offsetWidth, c(function(e) {
			"" === u.positionUsing && (u.positionUsing = l.getPositioningCSS()), d(a, n(t, o, s)), 1 === t ? (d(i, {
				transition: "none",
				opacity: 1
			}), i.offsetWidth, setTimeout(function() {
				d(i, {
					transition: "all " + o + "ms linear",
					opacity: 0
				}), setTimeout(function() {
					l.remove(), e()
				}, o)
			}, o)) : setTimeout(e, o)
		}), this
	}, l.isStarted = function() {
		return "number" == typeof l.status
	}, l.start = function() {
		l.status || l.set(0);
		var e = function() {
				setTimeout(function() {
					l.status && (l.trickle(), e())
				}, u.trickleSpeed)
			};
		return u.trickle && e(), this
	}, l.done = function(e) {
		return e || l.status ? l.inc(.3 + .5 * Math.random()).set(1) : this
	}, l.inc = function(t) {
		var n = l.status;
		return n ? ("number" != typeof t && (t = (1 - n) * e(Math.random() * n, .1, .95)), n = e(n + t, 0, .994), l.set(n)) : l.start()
	}, l.trickle = function() {
		return l.inc(Math.random() * u.trickleRate)
	}, function() {
		var e = 0,
			t = 0;
		l.promise = function(n) {
			return n && "resolved" != n.state() ? (0 == t && l.start(), e++, t++, n.always(function() {
				t--, 0 == t ? (e = 0, l.done()) : l.set((e - t) / e)
			}), this) : this
		}
	}(), l.render = function(e) {
		if (l.isRendered()) return document.getElementById("nprogress");
		i(document.documentElement, "nprogress-busy");
		var n = document.createElement("div");
		n.id = "nprogress", n.innerHTML = u.template;
		var r, a = n.querySelector(u.barSelector),
			o = e ? "-100" : t(l.status || 0),
			c = document.querySelector(u.parent);
		return d(a, {
			transition: "all 0 linear",
			transform: "translate3d(" + o + "%,0,0)"
		}), u.showSpinner || (r = n.querySelector(u.spinnerSelector), r && s(r)), c != document.body && i(c, "nprogress-custom-parent"), c.appendChild(n), n
	}, l.remove = function() {
		a(document.documentElement, "nprogress-busy"), a(document.querySelector(u.parent), "nprogress-custom-parent");
		var e = document.getElementById("nprogress");
		e && s(e)
	}, l.isRendered = function() {
		return !!document.getElementById("nprogress")
	}, l.getPositioningCSS = function() {
		var e = document.body.style,
			t = "WebkitTransform" in e ? "Webkit" : "MozTransform" in e ? "Moz" : "msTransform" in e ? "ms" : "OTransform" in e ? "O" : "";
		return t + "Perspective" in e ? "translate3d" : t + "Transform" in e ? "translate" : "margin"
	};
	var c = function() {
			function e() {
				var n = t.shift();
				n && n(e)
			}
			var t = [];
			return function(n) {
				t.push(n), 1 == t.length && e()
			}
		}(),
		d = function() {
			function e(e) {
				return e.replace(/^-ms-/, "ms-").replace(/-([\da-z])/gi, function(e, t) {
					return t.toUpperCase()
				})
			}
			function t(e) {
				var t = document.body.style;
				if (e in t) return e;
				for (var n, r = i.length, a = e.charAt(0).toUpperCase() + e.slice(1); r--;) if (n = i[r] + a, n in t) return n;
				return e
			}
			function n(n) {
				return n = e(n), a[n] || (a[n] = t(n))
			}
			function r(e, t, r) {
				t = n(t), e.style[t] = r
			}
			var i = ["Webkit", "O", "Moz", "ms"],
				a = {};
			return function(e, t) {
				var n, i, a = arguments;
				if (2 == a.length) for (n in t) i = t[n], void 0 !== i && t.hasOwnProperty(n) && r(e, n, i);
				else r(e, a[1], a[2])
			}
		}();
	return l
}), function(e, t) {
	if ("function" == typeof define && define.amd) define(["exports", "jquery"], function(e, n) {
		return t(e, n)
	});
	else if ("undefined" != typeof exports) {
		var n = require("jquery");
		t(exports, n)
	} else t(e, e.jQuery || e.Zepto || e.ender || e.$)
}(this, function(e, t) {
	function n(e, n) {
		function i(e, t, n) {
			return e[t] = n, e
		}
		function a(e, t) {
			for (var n, a = e.match(r.key); void 0 !== (n = a.pop());) if (r.push.test(n)) {
				var s = o(e.replace(/\[\]$/, ""));
				t = i([], s, t)
			} else r.fixed.test(n) ? t = i([], n, t) : r.named.test(n) && (t = i({}, n, t));
			return t
		}
		function o(e) {
			return void 0 === f[e] && (f[e] = 0), f[e]++
		}
		function s(e) {
			switch (t('[name="' + e.name + '"]', n).attr("type")) {
			case "checkbox":
				return "on" === e.value || e.value;
			default:
				return e.value
			}
		}
		function l(t) {
			if (!r.validate.test(t.name)) return this;
			var n = a(t.name, s(t));
			return h = e.extend(!0, h, n), this
		}
		function u(t) {
			if (!e.isArray(t)) throw new Error("formSerializer.addPairs expects an Array");
			for (var n = 0, r = t.length; n < r; n++) this.addPair(t[n]);
			return this
		}
		function c() {
			return h
		}
		function d() {
			return JSON.stringify(c())
		}
		var h = {},
			f = {};
		this.addPair = l, this.addPairs = u, this.serialize = c, this.serializeJSON = d
	}
	var r = {
		validate: /^[a-z_][a-z0-9_]*(?:\[(?:\d*|[a-z0-9_]+)\])*$/i,
		key: /[a-z0-9_]+|(?=\[\])/gi,
		push: /^$/,
		fixed: /^\d+$/,
		named: /^[a-z0-9_]+$/i
	};
	return n.patterns = r, n.serializeObject = function() {
		return new n(t, this).addPairs(this.serializeArray()).serialize()
	}, n.serializeJSON = function() {
		return new n(t, this).addPairs(this.serializeArray()).serializeJSON()
	}, "undefined" != typeof t.fn && (t.fn.serializeObject = n.serializeObject, t.fn.serializeJSON = n.serializeJSON), e.FormSerializer = n, n
}), function(e) {
	e.fn.caret = function(e) {
		var t = this[0],
			n = t && "true" === t.contentEditable;
		if (0 != arguments.length) {
			if (t) {
				if (e == -1 && (e = this[n ? "text" : "val"]().length), window.getSelection) n ? (t.focus(), window.getSelection().collapse(t.firstChild, e)) : t.setSelectionRange(e, e);
				else if (document.body.createTextRange) if (n) {
					var r = document.body.createTextRange();
					r.moveToElementText(t), r.moveStart("character", e), r.collapse(!0), r.select()
				} else {
					var r = t.createTextRange();
					r.move("character", e), r.select()
				}
				n || t.focus()
			}
			return this
		}
		if (t) {
			if (window.getSelection) {
				if (n) {
					t.focus();
					var i = window.getSelection().getRangeAt(0),
						a = i.cloneRange();
					return a.selectNodeContents(t), a.setEnd(i.endContainer, i.endOffset), a.toString().length
				}
				return t.selectionStart
			}
			if (document.selection) {
				if (t.focus(), n) {
					var i = document.selection.createRange(),
						a = document.body.createTextRange();
					return a.moveToElementText(t), a.setEndPoint("EndToEnd", i), a.text.length
				}
				var e = 0,
					r = t.createTextRange(),
					a = document.selection.createRange().duplicate(),
					o = a.getBookmark();
				for (r.moveToBookmark(o); 0 !== r.moveStart("character", -1);) e++;
				return e
			}
			if (t.selectionStart) return t.selectionStart
		}
	}
}(jQuery), function() {
	function e(e) {
		this.tokens = [], this.tokens.links = {}, this.options = e || u.defaults, this.rules = c.normal, this.options.gfm && (this.options.tables ? this.rules = c.tables : this.rules = c.gfm)
	}
	function t(e, t) {
		if (this.options = t || u.defaults, this.links = e, this.rules = d.normal, this.renderer = this.options.renderer || new n, this.renderer.options = this.options, !this.links) throw new Error("Tokens array requires a `links` property.");
		this.options.gfm ? this.options.breaks ? this.rules = d.breaks : this.rules = d.gfm : this.options.pedantic && (this.rules = d.pedantic)
	}
	function n(e) {
		this.options = e || {}
	}
	function r(e) {
		this.tokens = [], this.token = null, this.options = e || u.defaults, this.options.renderer = this.options.renderer || new n, this.renderer = this.options.renderer, this.renderer.options = this.options
	}
	function i(e, t) {
		return e.replace(t ? /&/g : /&(?!#?\w+;)/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;")
	}
	function a(e) {
		return e.replace(/&([#\w]+);/g, function(e, t) {
			return t = t.toLowerCase(), "colon" === t ? ":" : "#" === t.charAt(0) ? "x" === t.charAt(1) ? String.fromCharCode(parseInt(t.substring(2), 16)) : String.fromCharCode(+t.substring(1)) : ""
		})
	}
	function o(e, t) {
		return e = e.source, t = t || "", function n(r, i) {
			return r ? (i = i.source || i, i = i.replace(/(^|[^\[])\^/g, "$1"), e = e.replace(r, i), n) : new RegExp(e, t)
		}
	}
	function s() {}
	function l(e) {
		for (var t, n, r = 1; r < arguments.length; r++) {
			t = arguments[r];
			for (n in t) Object.prototype.hasOwnProperty.call(t, n) && (e[n] = t[n])
		}
		return e
	}
	function u(t, n, a) {
		if (a || "function" == typeof n) {
			a || (a = n, n = null), n = l({}, u.defaults, n || {});
			var o, s, c = n.highlight,
				d = 0;
			try {
				o = e.lex(t, n)
			} catch (h) {
				return a(h)
			}
			s = o.length;
			var f = function(e) {
					if (e) return n.highlight = c, a(e);
					var t;
					try {
						t = r.parse(o, n)
					} catch (i) {
						e = i
					}
					return n.highlight = c, e ? a(e) : a(null, t)
				};
			if (!c || c.length < 3) return f();
			if (delete n.highlight, !s) return f();
			for (; d < o.length; d++)!
			function(e) {
				return "code" !== e.type ? --s || f() : c(e.text, e.lang, function(t, n) {
					return t ? f(t) : null == n || n === e.text ? --s || f() : (e.text = n, e.escaped = !0, void(--s || f()))
				})
			}(o[d])
		} else try {
			return n && (n = l({}, u.defaults, n)), r.parse(e.lex(t, n), n)
		} catch (h) {
			if (h.message += "\nPlease report this to https://github.com/chjj/marked.", (n || u.defaults).silent) return "<p>An error occured:</p><pre>" + i(h.message + "", !0) + "</pre>";
			throw h
		}
	}
	var c = {
		newline: /^\n+/,
		code: /^( {4}[^\n]+\n*)+/,
		fences: s,
		hr: /^( *[-*_]){3,} *(?:\n+|$)/,
		heading: /^ *(#{1,6}) *([^\n]+?) *#* *(?:\n+|$)/,
		nptable: s,
		lheading: /^([^\n]+)\n *(=|-){2,} *(?:\n+|$)/,
		blockquote: /^( *>[^\n]+(\n(?!def)[^\n]+)*\n*)+/,
		list: /^( *)(bull) [\s\S]+?(?:hr|def|\n{2,}(?! )(?!\1bull )\n*|\s*$)/,
		html: /^ *(?:comment *(?:\n|\s*$)|closed *(?:\n{2,}|\s*$)|closing *(?:\n{2,}|\s*$))/,
		def: /^ *\[([^\]]+)\]: *<?([^\s>]+)>?(?: +["(]([^\n]+)[")])? *(?:\n+|$)/,
		table: s,
		paragraph: /^((?:[^\n]+\n?(?!hr|heading|lheading|blockquote|tag|def))+)\n*/,
		text: /^[^\n]+/
	};
	c.bullet = /(?:[*+-]|\d+\.)/, c.item = /^( *)(bull) [^\n]*(?:\n(?!\1bull )[^\n]*)*/, c.item = o(c.item, "gm")(/bull/g, c.bullet)(), c.list = o(c.list)(/bull/g, c.bullet)("hr", "\\n+(?=\\1?(?:[-*_] *){3,}(?:\\n+|$))")("def", "\\n+(?=" + c.def.source + ")")(), c.blockquote = o(c.blockquote)("def", c.def)(), c._tag = "(?!(?:a|em|strong|small|s|cite|q|dfn|abbr|data|time|code|var|samp|kbd|sub|sup|i|b|u|mark|ruby|rt|rp|bdi|bdo|span|br|wbr|ins|del|img)\\b)\\w+(?!:/|[^\\w\\s@]*@)\\b", c.html = o(c.html)("comment", /<!--[\s\S]*?-->/)("closed", /<(tag)[\s\S]+?<\/\1>/)("closing", /<tag(?:"[^"]*"|'[^']*'|[^'">])*?>/)(/tag/g, c._tag)(), c.paragraph = o(c.paragraph)("hr", c.hr)("heading", c.heading)("lheading", c.lheading)("blockquote", c.blockquote)("tag", "<" + c._tag)("def", c.def)(), c.normal = l({}, c), c.gfm = l({}, c.normal, {
		fences: /^ *(`{3,}|~{3,})[ \.]*(\S+)? *\n([\s\S]*?)\s*\1 *(?:\n+|$)/,
		paragraph: /^/,
		heading: /^ *(#{1,6}) +([^\n]+?) *#* *(?:\n+|$)/
	}), c.gfm.paragraph = o(c.paragraph)("(?!", "(?!" + c.gfm.fences.source.replace("\\1", "\\2") + "|" + c.list.source.replace("\\1", "\\3") + "|")(), c.tables = l({}, c.gfm, {
		nptable: /^ *(\S.*\|.*)\n *([-:]+ *\|[-| :]*)\n((?:.*\|.*(?:\n|$))*)\n*/,
		table: /^ *\|(.+)\n *\|( *[-:]+[-| :]*)\n((?: *\|.*(?:\n|$))*)\n*/
	}), e.rules = c, e.lex = function(t, n) {
		var r = new e(n);
		return r.lex(t)
	}, e.prototype.lex = function(e) {
		return e = e.replace(/\r\n|\r/g, "\n").replace(/\t/g, "    ").replace(/\u00a0/g, " ").replace(/\u2424/g, "\n"), this.token(e, !0)
	}, e.prototype.token = function(e, t, n) {
		for (var r, i, a, o, s, l, u, d, h, e = e.replace(/^ +$/gm, ""); e;) if ((a = this.rules.newline.exec(e)) && (e = e.substring(a[0].length), a[0].length > 1 && this.tokens.push({
			type: "space"
		})), a = this.rules.code.exec(e)) e = e.substring(a[0].length), a = a[0].replace(/^ {4}/gm, ""), this.tokens.push({
			type: "code",
			text: this.options.pedantic ? a : a.replace(/\n+$/, "")
		});
		else if (a = this.rules.fences.exec(e)) e = e.substring(a[0].length), this.tokens.push({
			type: "code",
			lang: a[2],
			text: a[3] || ""
		});
		else if (a = this.rules.heading.exec(e)) e = e.substring(a[0].length), this.tokens.push({
			type: "heading",
			depth: a[1].length,
			text: a[2]
		});
		else if (t && (a = this.rules.nptable.exec(e))) {
			for (e = e.substring(a[0].length), l = {
				type: "table",
				header: a[1].replace(/^ *| *\| *$/g, "").split(/ *\| */),
				align: a[2].replace(/^ *|\| *$/g, "").split(/ *\| */),
				cells: a[3].replace(/\n$/, "").split("\n")
			}, d = 0; d < l.align.length; d++) / ^ * -+: * $ / .test(l.align[d]) ? l.align[d] = "right" : /^ *:-+: *$/.test(l.align[d]) ? l.align[d] = "center" : /^ *:-+ *$/.test(l.align[d]) ? l.align[d] = "left" : l.align[d] = null;
			for (d = 0; d < l.cells.length; d++) l.cells[d] = l.cells[d].split(/ *\| */);
			this.tokens.push(l)
		} else if (a = this.rules.lheading.exec(e)) e = e.substring(a[0].length), this.tokens.push({
			type: "heading",
			depth: "=" === a[2] ? 1 : 2,
			text: a[1]
		});
		else if (a = this.rules.hr.exec(e)) e = e.substring(a[0].length), this.tokens.push({
			type: "hr"
		});
		else if (a = this.rules.blockquote.exec(e)) e = e.substring(a[0].length), this.tokens.push({
			type: "blockquote_start"
		}), a = a[0].replace(/^ *> ?/gm, ""), this.token(a, t, !0), this.tokens.push({
			type: "blockquote_end"
		});
		else if (a = this.rules.list.exec(e)) {
			for (e = e.substring(a[0].length), o = a[2], this.tokens.push({
				type: "list_start",
				ordered: o.length > 1
			}), a = a[0].match(this.rules.item), r = !1, h = a.length, d = 0; d < h; d++) l = a[d], u = l.length, l = l.replace(/^ *([*+-]|\d+\.) +/, ""), ~l.indexOf("\n ") && (u -= l.length, l = this.options.pedantic ? l.replace(/^ {1,4}/gm, "") : l.replace(new RegExp("^ {1," + u + "}", "gm"), "")), this.options.smartLists && d !== h - 1 && (s = c.bullet.exec(a[d + 1])[0], o === s || o.length > 1 && s.length > 1 || (e = a.slice(d + 1).join("\n") + e, d = h - 1)), i = r || /\n\n(?!\s*$)/.test(l), d !== h - 1 && (r = "\n" === l.charAt(l.length - 1), i || (i = r)), this.tokens.push({
				type: i ? "loose_item_start" : "list_item_start"
			}), this.token(l, !1, n), this.tokens.push({
				type: "list_item_end"
			});
			this.tokens.push({
				type: "list_end"
			})
		} else if (a = this.rules.html.exec(e)) e = e.substring(a[0].length), this.tokens.push({
			type: this.options.sanitize ? "paragraph" : "html",
			pre: !this.options.sanitizer && ("pre" === a[1] || "script" === a[1] || "style" === a[1]),
			text: a[0]
		});
		else if (!n && t && (a = this.rules.def.exec(e))) e = e.substring(a[0].length), this.tokens.links[a[1].toLowerCase()] = {
			href: a[2],
			title: a[3]
		};
		else if (t && (a = this.rules.table.exec(e))) {
			for (e = e.substring(a[0].length), l = {
				type: "table",
				header: a[1].replace(/^ *| *\| *$/g, "").split(/ *\| */),
				align: a[2].replace(/^ *|\| *$/g, "").split(/ *\| */),
				cells: a[3].replace(/(?: *\| *)?\n$/, "").split("\n")
			}, d = 0; d < l.align.length; d++) / ^ * -+: * $ / .test(l.align[d]) ? l.align[d] = "right" : /^ *:-+: *$/.test(l.align[d]) ? l.align[d] = "center" : /^ *:-+ *$/.test(l.align[d]) ? l.align[d] = "left" : l.align[d] = null;
			for (d = 0; d < l.cells.length; d++) l.cells[d] = l.cells[d].replace(/^ *\| *| *\| *$/g, "").split(/ *\| */);
			this.tokens.push(l)
		} else if (t && (a = this.rules.paragraph.exec(e))) e = e.substring(a[0].length), this.tokens.push({
			type: "paragraph",
			text: "\n" === a[1].charAt(a[1].length - 1) ? a[1].slice(0, -1) : a[1]
		});
		else if (a = this.rules.text.exec(e)) e = e.substring(a[0].length), this.tokens.push({
			type: "text",
			text: a[0]
		});
		else if (e) throw new Error("Infinite loop on byte: " + e.charCodeAt(0));
		return this.tokens
	};
	var d = {
		escape: /^\\([\\`*{}\[\]()#+\-.!_>])/,
		autolink: /^<([^ >]+(@|:\/)[^ >]+)>/,
		url: s,
		tag: /^<!--[\s\S]*?-->|^<\/?\w+(?:"[^"]*"|'[^']*'|[^'">])*?>/,
		link: /^!?\[(inside)\]\(href\)/,
		reflink: /^!?\[(inside)\]\s*\[([^\]]*)\]/,
		nolink: /^!?\[((?:\[[^\]]*\]|[^\[\]])*)\]/,
		strong: /^__([\s\S]+?)__(?!_)|^\*\*([\s\S]+?)\*\*(?!\*)/,
		em: /^\b_((?:[^_]|__)+?)_\b|^\*((?:\*\*|[\s\S])+?)\*(?!\*)/,
		code: /^(`+)\s*([\s\S]*?[^`])\s*\1(?!`)/,
		br: /^ {2,}\n(?!\s*$)/,
		del: s,
		text: /^[\s\S]+?(?=[\\<!\[_*`]| {2,}\n|$)/
	};
	d._inside = /(?:\[[^\]]*\]|[^\[\]]|\](?=[^\[]*\]))*/, d._href = /\s*<?([\s\S]*?)>?(?:\s+['"]([\s\S]*?)['"])?\s*/, d.link = o(d.link)("inside", d._inside)("href", d._href)(), d.reflink = o(d.reflink)("inside", d._inside)(), d.normal = l({}, d), d.pedantic = l({}, d.normal, {
		strong: /^__(?=\S)([\s\S]*?\S)__(?!_)|^\*\*(?=\S)([\s\S]*?\S)\*\*(?!\*)/,
		em: /^_(?=\S)([\s\S]*?\S)_(?!_)|^\*(?=\S)([\s\S]*?\S)\*(?!\*)/
	}), d.gfm = l({}, d.normal, {
		escape: o(d.escape)("])", "~|])")(),
		url: /^(https?:\/\/[^\s<]+[^<.,:;"')\]\s])/,
		del: /^~~(?=\S)([\s\S]*?\S)~~/,
		text: o(d.text)("]|", "~]|")("|", "|https?://|")()
	}), d.breaks = l({}, d.gfm, {
		br: o(d.br)("{2,}", "*")(),
		text: o(d.gfm.text)("{2,}", "*")()
	}), t.rules = d, t.output = function(e, n, r) {
		var i = new t(n, r);
		return i.output(e)
	}, t.prototype.output = function(e) {
		for (var t, n, r, a, o = ""; e;) if (a = this.rules.escape.exec(e)) e = e.substring(a[0].length), o += a[1];
		else if (a = this.rules.autolink.exec(e)) e = e.substring(a[0].length), "@" === a[2] ? (n = ":" === a[1].charAt(6) ? this.mangle(a[1].substring(7)) : this.mangle(a[1]), r = this.mangle("mailto:") + n) : (n = i(a[1]), r = n), o += this.renderer.link(r, null, n);
		else if (this.inLink || !(a = this.rules.url.exec(e))) {
			if (a = this.rules.tag.exec(e))!this.inLink && /^<a /i.test(a[0]) ? this.inLink = !0 : this.inLink && /^<\/a>/i.test(a[0]) && (this.inLink = !1), e = e.substring(a[0].length), o += this.options.sanitize ? this.options.sanitizer ? this.options.sanitizer(a[0]) : i(a[0]) : a[0];
			else if (a = this.rules.link.exec(e)) e = e.substring(a[0].length), this.inLink = !0, o += this.outputLink(a, {
				href: a[2],
				title: a[3]
			}), this.inLink = !1;
			else if ((a = this.rules.reflink.exec(e)) || (a = this.rules.nolink.exec(e))) {
				if (e = e.substring(a[0].length), t = (a[2] || a[1]).replace(/\s+/g, " "), t = this.links[t.toLowerCase()], !t || !t.href) {
					o += a[0].charAt(0), e = a[0].substring(1) + e;
					continue
				}
				this.inLink = !0, o += this.outputLink(a, t), this.inLink = !1
			} else if (a = this.rules.strong.exec(e)) e = e.substring(a[0].length), o += this.renderer.strong(this.output(a[2] || a[1]));
			else if (a = this.rules.em.exec(e)) e = e.substring(a[0].length), o += this.renderer.em(this.output(a[2] || a[1]));
			else if (a = this.rules.code.exec(e)) e = e.substring(a[0].length), o += this.renderer.codespan(i(a[2], !0));
			else if (a = this.rules.br.exec(e)) e = e.substring(a[0].length), o += this.renderer.br();
			else if (a = this.rules.del.exec(e)) e = e.substring(a[0].length), o += this.renderer.del(this.output(a[1]));
			else if (a = this.rules.text.exec(e)) e = e.substring(a[0].length), o += this.renderer.text(i(this.smartypants(a[0])));
			else if (e) throw new Error("Infinite loop on byte: " + e.charCodeAt(0))
		} else e = e.substring(a[0].length), n = i(a[1]), r = n, o += this.renderer.link(r, null, n);
		return o
	}, t.prototype.outputLink = function(e, t) {
		var n = i(t.href),
			r = t.title ? i(t.title) : null;
		return "!" !== e[0].charAt(0) ? this.renderer.link(n, r, this.output(e[1])) : this.renderer.image(n, r, i(e[1]))
	}, t.prototype.smartypants = function(e) {
		return this.options.smartypants ? e.replace(/---/g, "—").replace(/--/g, "–").replace(/(^|[-\u2014\/(\[{"\s])'/g, "$1‘").replace(/'/g, "’").replace(/(^|[-\u2014\/(\[{\u2018\s])"/g, "$1“").replace(/"/g, "”").replace(/\.{3}/g, "…") : e
	}, t.prototype.mangle = function(e) {
		if (!this.options.mangle) return e;
		for (var t, n = "", r = e.length, i = 0; i < r; i++) t = e.charCodeAt(i), Math.random() > .5 && (t = "x" + t.toString(16)), n += "&#" + t + ";";
		return n
	}, n.prototype.code = function(e, t, n) {
		if (this.options.highlight) {
			var r = this.options.highlight(e, t);
			null != r && r !== e && (n = !0, e = r)
		}
		return t ? '<pre><code class="' + this.options.langPrefix + i(t, !0) + '">' + (n ? e : i(e, !0)) + "\n</code></pre>\n" : "<pre><code>" + (n ? e : i(e, !0)) + "\n</code></pre>"
	}, n.prototype.blockquote = function(e) {
		return "<blockquote>\n" + e + "</blockquote>\n"
	}, n.prototype.html = function(e) {
		return e
	}, n.prototype.heading = function(e, t, n) {
		return "<h" + t + ' id="' + this.options.headerPrefix + n.toLowerCase().replace(/[^\w]+/g, "-") + '">' + e + "</h" + t + ">\n"
	}, n.prototype.hr = function() {
		return this.options.xhtml ? "<hr/>\n" : "<hr>\n"
	}, n.prototype.list = function(e, t) {
		var n = t ? "ol" : "ul";
		return "<" + n + ">\n" + e + "</" + n + ">\n"
	}, n.prototype.listitem = function(e) {
		return "<li>" + e + "</li>\n"
	}, n.prototype.paragraph = function(e) {
		return "<p>" + e + "</p>\n"
	}, n.prototype.table = function(e, t) {
		return "<table>\n<thead>\n" + e + "</thead>\n<tbody>\n" + t + "</tbody>\n</table>\n"
	}, n.prototype.tablerow = function(e) {
		return "<tr>\n" + e + "</tr>\n"
	}, n.prototype.tablecell = function(e, t) {
		var n = t.header ? "th" : "td",
			r = t.align ? "<" + n + ' style="text-align:' + t.align + '">' : "<" + n + ">";
		return r + e + "</" + n + ">\n"
	}, n.prototype.strong = function(e) {
		return "<strong>" + e + "</strong>"
	}, n.prototype.em = function(e) {
		return "<em>" + e + "</em>"
	}, n.prototype.codespan = function(e) {
		return "<code>" + e + "</code>"
	}, n.prototype.br = function() {
		return this.options.xhtml ? "<br/>" : "<br>"
	}, n.prototype.del = function(e) {
		return "<del>" + e + "</del>"
	}, n.prototype.link = function(e, t, n) {
		if (this.options.sanitize) {
			try {
				var r = decodeURIComponent(a(e)).replace(/[^\w:]/g, "").toLowerCase()
			} catch (i) {
				return ""
			}
			if (0 === r.indexOf("javascript:") || 0 === r.indexOf("vbscript:")) return ""
		}
		var o = '<a href="' + e + '"';
		return t && (o += ' title="' + t + '"'), o += ">" + n + "</a>"
	}, n.prototype.image = function(e, t, n) {
		var r = '<img src="' + e + '" alt="' + n + '"';
		return t && (r += ' title="' + t + '"'), r += this.options.xhtml ? "/>" : ">"
	}, n.prototype.text = function(e) {
		return e
	}, r.parse = function(e, t, n) {
		var i = new r(t, n);
		return i.parse(e)
	}, r.prototype.parse = function(e) {
		this.inline = new t(e.links, this.options, this.renderer), this.tokens = e.reverse();
		for (var n = ""; this.next();) n += this.tok();
		return n
	}, r.prototype.next = function() {
		return this.token = this.tokens.pop()
	}, r.prototype.peek = function() {
		return this.tokens[this.tokens.length - 1] || 0
	}, r.prototype.parseText = function() {
		for (var e = this.token.text;
		"text" === this.peek().type;) e += "\n" + this.next().text;
		return this.inline.output(e)
	}, r.prototype.tok = function() {
		switch (this.token.type) {
		case "space":
			return "";
		case "hr":
			return this.renderer.hr();
		case "heading":
			return this.renderer.heading(this.inline.output(this.token.text), this.token.depth, this.token.text);
		case "code":
			return this.renderer.code(this.token.text, this.token.lang, this.token.escaped);
		case "table":
			var e, t, n, r, i, a = "",
				o = "";
			for (n = "", e = 0; e < this.token.header.length; e++) r = {
				header: !0,
				align: this.token.align[e]
			}, n += this.renderer.tablecell(this.inline.output(this.token.header[e]), {
				header: !0,
				align: this.token.align[e]
			});
			for (a += this.renderer.tablerow(n), e = 0; e < this.token.cells.length; e++) {
				for (t = this.token.cells[e], n = "", i = 0; i < t.length; i++) n += this.renderer.tablecell(this.inline.output(t[i]), {
					header: !1,
					align: this.token.align[i]
				});
				o += this.renderer.tablerow(n)
			}
			return this.renderer.table(a, o);
		case "blockquote_start":
			for (var o = "";
			"blockquote_end" !== this.next().type;) o += this.tok();
			return this.renderer.blockquote(o);
		case "list_start":
			for (var o = "", s = this.token.ordered;
			"list_end" !== this.next().type;) o += this.tok();
			return this.renderer.list(o, s);
		case "list_item_start":
			for (var o = "";
			"list_item_end" !== this.next().type;) o += "text" === this.token.type ? this.parseText() : this.tok();
			return this.renderer.listitem(o);
		case "loose_item_start":
			for (var o = "";
			"list_item_end" !== this.next().type;) o += this.tok();
			return this.renderer.listitem(o);
		case "html":
			var l = this.token.pre || this.options.pedantic ? this.token.text : this.inline.output(this.token.text);
			return this.renderer.html(l);
		case "paragraph":
			return this.renderer.paragraph(this.inline.output(this.token.text));
		case "text":
			return this.renderer.paragraph(this.parseText())
		}
	}, s.exec = s, u.options = u.setOptions = function(e) {
		return l(u.defaults, e), u
	}, u.defaults = {
		gfm: !0,
		tables: !0,
		breaks: !1,
		pedantic: !1,
		sanitize: !1,
		sanitizer: null,
		mangle: !0,
		smartLists: !1,
		silent: !1,
		highlight: null,
		langPrefix: "lang-",
		smartypants: !1,
		headerPrefix: "",
		renderer: new n,
		xhtml: !1
	}, u.Parser = r, u.parser = r.parse, u.Renderer = n, u.Lexer = e, u.lexer = e.lex, u.InlineLexer = t, u.inlineLexer = t.output, u.parse = u, "undefined" != typeof module && "object" == typeof exports ? module.exports = u : "function" == typeof define && define.amd ? define(function() {
		return u
	}) : this.marked = u
}.call(function() {
	return this || ("undefined" != typeof window ? window : global)
}()), function(e) {
	function t() {
		return "Markdown.mk_block( " + uneval(this.toString()) + ", " + uneval(this.trailing) + ", " + uneval(this.lineNumber) + " )"
	}
	function n() {
		var e = require("util");
		return "Markdown.mk_block( " + e.inspect(this.toString()) + ", " + e.inspect(this.trailing) + ", " + e.inspect(this.lineNumber) + " )"
	}
	function r(e) {
		for (var t = 0, n = -1;
		(n = e.indexOf("\n", n + 1)) !== -1;) t++;
		return t
	}
	function i(e, t) {
		function n(e) {
			this.len_after = e, this.name = "close_" + t
		}
		var r = e + "_state",
			i = "strong" == e ? "em_state" : "strong_state";
		return function(a, o) {
			if (this[r][0] == t) return this[r].shift(), [a.length, new n(a.length - t.length)];
			var s = this[i].slice(),
				l = this[r].slice();
			this[r].unshift(t);
			var u = this.processInline(a.substr(t.length)),
				c = u[u.length - 1];
			this[r].shift();
			if (c instanceof n) {
				u.pop();
				var d = a.length - c.len_after;
				return [d, [e].concat(u)]
			}
			return this[i] = s, this[r] = l, [t.length, t]
		}
	}
	function o(e) {
		for (var t = e.split(""), n = [""], r = !1; t.length;) {
			var i = t.shift();
			switch (i) {
			case " ":
				r ? n[n.length - 1] += i : n.push("");
				break;
			case "'":
			case '"':
				r = !r;
				break;
			case "\\":
				i = t.shift();
			default:
				n[n.length - 1] += i
			}
		}
		return n
	}
	function s(e) {
		return _(e) && e.length > 1 && "object" == typeof e[1] && !_(e[1]) ? e[1] : void 0
	}
	function l(e) {
		return e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;")
	}
	function u(e) {
		if ("string" == typeof e) return l(e);
		var t = e.shift(),
			n = {},
			r = [];
		for (!e.length || "object" != typeof e[0] || e[0] instanceof Array || (n = e.shift()); e.length;) r.push(u(e.shift()));
		var i = "";
		for (var a in n) i += " " + a + '="' + l(n[a]) + '"';
		return "img" == t || "br" == t || "hr" == t ? "<" + t + i + "/>" : "<" + t + i + ">" + r.join("") + "</" + t + ">"
	}
	function c(e, t, n) {
		var r;
		n = n || {};
		var i = e.slice(0);
		"function" == typeof n.preprocessTreeNode && (i = n.preprocessTreeNode(i, t));
		var a = s(i);
		if (a) {
			i[1] = {};
			for (r in a) i[1][r] = a[r];
			a = i[1]
		}
		if ("string" == typeof i) return i;
		switch (i[0]) {
		case "header":
			i[0] = "h" + i[1].level, delete i[1].level;
			break;
		case "bulletlist":
			i[0] = "ul";
			break;
		case "numberlist":
			i[0] = "ol";
			break;
		case "listitem":
			i[0] = "li";
			break;
		case "para":
			i[0] = "p";
			break;
		case "markdown":
			i[0] = "html", a && delete a.references;
			break;
		case "code_block":
			i[0] = "pre", r = a ? 2 : 1;
			var o = ["code"];
			o.push.apply(o, i.splice(r, i.length - r)), i[r] = o;
			break;
		case "inlinecode":
			i[0] = "code";
			break;
		case "img":
			i[1].src = i[1].href, delete i[1].href;
			break;
		case "linebreak":
			i[0] = "br";
			break;
		case "link":
			i[0] = "a";
			break;
		case "link_ref":
			i[0] = "a";
			var l = t[a.ref];
			if (!l) return a.original;
			delete a.ref, a.href = l.href, l.title && (a.title = l.title), delete a.original;
			break;
		case "img_ref":
			i[0] = "img";
			var l = t[a.ref];
			if (!l) return a.original;
			delete a.ref, a.src = l.href, l.title && (a.title = l.title), delete a.original
		}
		if (r = 1, a) {
			for (var u in i[1]) {
				r = 2;
				break
			}
			1 === r && i.splice(r, 1)
		}
		for (; r < i.length; ++r) i[r] = c(i[r], t, n);
		return i
	}
	function d(e) {
		for (var t = s(e) ? 2 : 1; t < e.length;)"string" == typeof e[t] ? t + 1 < e.length && "string" == typeof e[t + 1] ? e[t] += e.splice(t + 1, 1)[0] : ++t : (d(e[t]), ++t)
	}
	var h = e.Markdown = function(e) {
			switch (typeof e) {
			case "undefined":
				this.dialect = h.dialects.Gruber;
				break;
			case "object":
				this.dialect = e;
				break;
			default:
				if (!(e in h.dialects)) throw new Error("Unknown Markdown dialect '" + String(e) + "'");
				this.dialect = h.dialects[e]
			}
			this.em_state = [], this.strong_state = [], this.debug_indent = ""
		};
	e.parse = function(e, t) {
		var n = new h(t);
		return n.toTree(e)
	}, e.toHTML = function(t, n, r) {
		var i = e.toHTMLTree(t, n, r);
		return e.renderJsonML(i)
	}, e.toHTMLTree = function(e, t, n) {
		"string" == typeof e && (e = this.parse(e, t));
		var r = s(e),
			i = {};
		r && r.references && (i = r.references);
		var a = c(e, i, n);
		return d(a), a
	};
	var f = h.mk_block = function(e, r, i) {
			1 == arguments.length && (r = "\n\n");
			var a = new String(e);
			return a.trailing = r, a.inspect = n, a.toSource = t, void 0 != i && (a.lineNumber = i), a
		};
	h.prototype.split_blocks = function(e, t) {
		e = e.replace(/(\r\n|\n|\r)/g, "\n");
		var n, i = /([\s\S]+?)($|\n#|\n(?:\s*\n|$)+)/g,
			a = [],
			o = 1;
		for (null != (n = /^(\s*\n)/.exec(e)) && (o += r(n[0]), i.lastIndex = n[0].length); null !== (n = i.exec(e));)"\n#" == n[2] && (n[2] = "\n", i.lastIndex--), a.push(f(n[1], n[2], o)), o += r(n[0]);
		return a
	}, h.prototype.processBlock = function(e, t) {
		var n = this.dialect.block,
			r = n.__order__;
		if ("__call__" in n) return n.__call__.call(this, e, t);
		for (var i = 0; i < r.length; i++) {
			var a = n[r[i]].call(this, e, t);
			if (a) return (!_(a) || a.length > 0 && !_(a[0])) && this.debug(r[i], "didn't return a proper array"), a
		}
		return []
	}, h.prototype.processInline = function(e) {
		return this.dialect.inline.__call__.call(this, String(e))
	}, h.prototype.toTree = function(e, t) {
		var n = e instanceof Array ? e : this.split_blocks(e),
			r = this.tree;
		try {
			for (this.tree = t || this.tree || ["markdown"]; n.length;) {
				var i = this.processBlock(n.shift(), n);
				i.length && this.tree.push.apply(this.tree, i)
			}
			return this.tree
		} finally {
			t && (this.tree = r)
		}
	}, h.prototype.debug = function() {
		var e = Array.prototype.slice.call(arguments);
		e.unshift(this.debug_indent), "undefined" != typeof print && print.apply(print, e), "undefined" != typeof console && "undefined" != typeof console.log && console.log.apply(null, e)
	}, h.prototype.loop_re_over_block = function(e, t, n) {
		for (var r, i = t.valueOf(); i.length && null != (r = e.exec(i));) i = i.substr(r[0].length), n.call(this, r);
		return i
	}, h.dialects = {}, h.dialects.Gruber = {
		block: {
			atxHeader: function(e, t) {
				var n = e.match(/^(#{1,6})\s*(.*?)\s*#*\s*(?:\n|$)/);
				if (n) {
					var r = ["header",
					{
						level: n[1].length
					}];
					return Array.prototype.push.apply(r, this.processInline(n[2])), n[0].length < e.length && t.unshift(f(e.substr(n[0].length), e.trailing, e.lineNumber + 2)), [r]
				}
			},
			setextHeader: function(e, t) {
				var n = e.match(/^(.*)\n([-=])\2\2+(?:\n|$)/);
				if (n) {
					var r = "=" === n[2] ? 1 : 2,
						i = ["header",
						{
							level: r
						},
						n[1]];
					return n[0].length < e.length && t.unshift(f(e.substr(n[0].length), e.trailing, e.lineNumber + 2)), [i]
				}
			},
			code: function(e, t) {
				var n = [],
					r = /^(?: {0,3}\t| {4})(.*)\n?/;
				if (e.match(r)) {
					e: for (;;) {
						var i = this.loop_re_over_block(r, e.valueOf(), function(e) {
							n.push(e[1])
						});
						if (i.length) {
							t.unshift(f(i, e.trailing));
							break e
						}
						if (!t.length) break e;
						if (!t[0].match(r)) break e;
						n.push(e.trailing.replace(/[^\n]/g, "").substring(2)), e = t.shift()
					}
					return [["code_block", n.join("\n")]]
				}
			},
			horizRule: function(e, t) {
				var n = e.match(/^(?:([\s\S]*?)\n)?[ \t]*([-_*])(?:[ \t]*\2){2,}[ \t]*(?:\n([\s\S]*))?$/);
				if (n) {
					var r = [
						["hr"]
					];
					return n[1] && r.unshift.apply(r, this.processBlock(n[1], [])), n[3] && t.unshift(f(n[3])), r
				}
			},
			lists: function() {
				function e(e) {
					return new RegExp("(?:^(" + l + "{0," + e + "} {0,3})(" + a + ")\\s+)|(^" + l + "{0," + (e - 1) + "}[ ]{0,4})")
				}
				function t(e) {
					return e.replace(/ {0,3}\t/g, "    ")
				}
				function n(e, t, n, r) {
					if (t) return void e.push(["para"].concat(n));
					var i = e[e.length - 1] instanceof Array && "para" == e[e.length - 1][0] ? e[e.length - 1] : e;
					r && e.length > 1 && n.unshift(r);
					for (var a = 0; a < n.length; a++) {
						var o = n[a],
							s = "string" == typeof o;
						s && i.length > 1 && "string" == typeof i[i.length - 1] ? i[i.length - 1] += o : i.push(o)
					}
				}
				function r(e, t) {
					for (var n = new RegExp("^(" + l + "{" + e + "}.*?\\n?)*$"), r = new RegExp("^" + l + "{" + e + "}", "gm"), i = []; t.length > 0 && n.exec(t[0]);) {
						var a = t.shift(),
							o = a.replace(r, "");
						i.push(f(o, a.trailing, a.lineNumber))
					}
					return i
				}
				function i(e, t, n) {
					var r = e.list,
						i = r[r.length - 1];
					if (!(i[1] instanceof Array && "para" == i[1][0])) if (t + 1 == n.length) i.push(["para"].concat(i.splice(1, i.length - 1)));
					else {
						var a = i.pop();
						i.push(["para"].concat(i.splice(1, i.length - 1)), a)
					}
				}
				var a = "[*+-]|\\d+\\.",
					o = /[*+-]/,
					s = new RegExp("^( {0,3})(" + a + ")[ \t]+"),
					l = "(?: {0,3}\\t| {4})";
				return function(a, l) {
					function u(e) {
						var t = o.exec(e[2]) ? ["bulletlist"] : ["numberlist"];
						return f.push({
							list: t,
							indent: e[1]
						}), t
					}
					var c = a.match(s);
					if (c) {
						for (var d, h, f = [], p = u(c), _ = !1, g = [f[0].list];;) {
							for (var y = a.split(/(?=\n)/), v = "", E = 0; E < y.length; E++) {
								var b = "",
									U = y[E].replace(/^\n/, function(e) {
										return b = e, ""
									}),
									w = e(f.length);
								if (c = U.match(w), void 0 !== c[1]) {
									v.length && (n(d, _, this.processInline(v), b), _ = !1, v = ""), c[1] = t(c[1]);
									var k = Math.floor(c[1].length / 4) + 1;
									if (k > f.length) p = u(c), d.push(p), d = p[1] = ["listitem"];
									else {
										var M = !1;
										for (h = 0; h < f.length; h++) if (f[h].indent == c[1]) {
											p = f[h].list, f.splice(h + 1, f.length - (h + 1)), M = !0;
											break
										}
										M || (k++, k <= f.length ? (f.splice(k, f.length - k), p = f[k - 1].list) : (p = u(c), d.push(p))), d = ["listitem"], p.push(d)
									}
									b = ""
								}
								U.length > c[0].length && (v += b + U.substr(c[0].length))
							}
							v.length && (n(d, _, this.processInline(v), b), _ = !1, v = "");
							var L = r(f.length, l);
							L.length > 0 && (m(f, i, this), d.push.apply(d, this.toTree(L, [])));
							var F = l[0] && l[0].valueOf() || "";
							if (!F.match(s) && !F.match(/^ /)) break;
							a = l.shift();
							var D = this.dialect.block.horizRule(a, l);
							if (D) {
								g.push.apply(g, D);
								break
							}
							m(f, i, this), _ = !0
						}
						return g
					}
				}
			}(),
			blockquote: function(e, t) {
				if (e.match(/^>/m)) {
					var n = [];
					if (">" != e[0]) {
						for (var r = e.split(/\n/), i = [], a = e.lineNumber; r.length && ">" != r[0][0];) i.push(r.shift()), a++;
						var o = f(i.join("\n"), "\n", e.lineNumber);
						n.push.apply(n, this.processBlock(o, [])), e = f(r.join("\n"), e.trailing, a)
					}
					for (; t.length && ">" == t[0][0];) {
						var l = t.shift();
						e = f(e + e.trailing + l, l.trailing, e.lineNumber)
					}
					var u = e.replace(/^> ?/gm, ""),
						c = (this.tree, this.toTree(u, ["blockquote"])),
						d = s(c);
					return d && d.references && (delete d.references, g(d) && c.splice(1, 1)), n.push(c), n
				}
			},
			referenceDefn: function(e, t) {
				var n = /^\s*\[(.*?)\]:\s*(\S+)(?:\s+(?:(['"])(.*?)\3|\((.*?)\)))?\n?/;
				if (e.match(n)) {
					s(this.tree) || this.tree.splice(1, 0, {});
					var r = s(this.tree);
					void 0 === r.references && (r.references = {});
					var i = this.loop_re_over_block(n, e, function(e) {
						e[2] && "<" == e[2][0] && ">" == e[2][e[2].length - 1] && (e[2] = e[2].substring(1, e[2].length - 1));
						var t = r.references[e[1].toLowerCase()] = {
							href: e[2]
						};
						void 0 !== e[4] ? t.title = e[4] : void 0 !== e[5] && (t.title = e[5])
					});
					return i.length && t.unshift(f(i, e.trailing)), []
				}
			},
			para: function(e, t) {
				return [["para"].concat(this.processInline(e))]
			}
		}
	}, h.dialects.Gruber.inline = {
		__oneElement__: function(e, t, n) {
			var r, i;
			t = t || this.dialect.inline.__patterns__;
			var a = new RegExp("([\\s\\S]*?)(" + (t.source || t) + ")");
			if (r = a.exec(e), !r) return [e.length, e];
			if (r[1]) return [r[1].length, r[1]];
			var i;
			return r[2] in this.dialect.inline && (i = this.dialect.inline[r[2]].call(this, e.substr(r.index), r, n || [])), i = i || [r[2].length, r[2]]
		},
		__call__: function(e, t) {
			function n(e) {
				"string" == typeof e && "string" == typeof i[i.length - 1] ? i[i.length - 1] += e : i.push(e)
			}
			for (var r, i = []; e.length > 0;) r = this.dialect.inline.__oneElement__.call(this, e, t, i), e = e.substr(r.shift()), m(r, n);
			return i
		},
		"]": function() {},
		"}": function() {},
		__escape__: /^\\[\\`\*_{}\[\]()#\+.!\-]/,
		"\\": function(e) {
			return this.dialect.inline.__escape__.exec(e) ? [2, e.charAt(1)] : [1, "\\"]
		},
		"![": function(e) {
			var t = e.match(/^!\[(.*?)\][ \t]*\([ \t]*([^")]*?)(?:[ \t]+(["'])(.*?)\3)?[ \t]*\)/);
			if (t) {
				t[2] && "<" == t[2][0] && ">" == t[2][t[2].length - 1] && (t[2] = t[2].substring(1, t[2].length - 1)), t[2] = this.dialect.inline.__call__.call(this, t[2], /\\/)[0];
				var n = {
					alt: t[1],
					href: t[2] || ""
				};
				return void 0 !== t[4] && (n.title = t[4]), [t[0].length, ["img", n]]
			}
			return t = e.match(/^!\[(.*?)\][ \t]*\[(.*?)\]/), t ? [t[0].length, ["img_ref",
			{
				alt: t[1],
				ref: t[2].toLowerCase(),
				original: t[0]
			}]] : [2, "!["]
		},
		"[": function y(e) {
			var t = String(e),
				n = h.DialectHelpers.inline_until_char.call(this, e.substr(1), "]");
			if (!n) return [1, "["];
			var y, r, i = 1 + n[0],
				a = n[1];
			e = e.substr(i);
			var o = e.match(/^\s*\([ \t]*([^"']*)(?:[ \t]+(["'])(.*?)\2)?[ \t]*\)/);
			if (o) {
				var s = o[1];
				if (i += o[0].length, s && "<" == s[0] && ">" == s[s.length - 1] && (s = s.substring(1, s.length - 1)), !o[3]) for (var l = 1, u = 0; u < s.length; u++) switch (s[u]) {
				case "(":
					l++;
					break;
				case ")":
					0 == --l && (i -= s.length - u, s = s.substring(0, u))
				}
				return s = this.dialect.inline.__call__.call(this, s, /\\/)[0], r = {
					href: s || ""
				}, void 0 !== o[3] && (r.title = o[3]), y = ["link", r].concat(a), [i, y]
			}
			return o = e.match(/^\s*\[(.*?)\]/), o ? (i += o[0].length, r = {
				ref: (o[1] || String(a)).toLowerCase(),
				original: t.substr(0, i)
			}, y = ["link_ref", r].concat(a), [i, y]) : 1 == a.length && "string" == typeof a[0] ? (r = {
				ref: a[0].toLowerCase(),
				original: t.substr(0, i)
			}, y = ["link_ref", r, a[0]], [i, y]) : [1, "["]
		},
		"<": function(e) {
			var t;
			return null != (t = e.match(/^<(?:((https?|ftp|mailto):[^>]+)|(.*?@.*?\.[a-zA-Z]+))>/)) ? t[3] ? [t[0].length, ["link",
			{
				href: "mailto:" + t[3]
			},
			t[3]]] : "mailto" == t[2] ? [t[0].length, ["link",
			{
				href: t[1]
			},
			t[1].substr("mailto:".length)]] : [t[0].length, ["link",
			{
				href: t[1]
			},
			t[1]]] : [1, "<"]
		},
		"`": function(e) {
			var t = e.match(/(`+)(([\s\S]*?)\1)/);
			return t && t[2] ? [t[1].length + t[2].length, ["inlinecode", t[3]]] : [1, "`"]
		},
		"  \n": function(e) {
			return [3, ["linebreak"]]
		}
	}, h.dialects.Gruber.inline["**"] = i("strong", "**"), h.dialects.Gruber.inline.__ = i("strong", "__"), h.dialects.Gruber.inline["*"] = i("em", "*"), h.dialects.Gruber.inline._ = i("em", "_"), h.buildBlockOrder = function(e) {
		var t = [];
		for (var n in e)"__order__" != n && "__call__" != n && t.push(n);
		e.__order__ = t
	}, h.buildInlinePatterns = function(e) {
		var t = [];
		for (var n in e) if (!n.match(/^__.*__$/)) {
			var r = n.replace(/([\\.*+?|()\[\]{}])/g, "\\$1").replace(/\n/, "\\n");
			t.push(1 == n.length ? r : "(?:" + r + ")")
		}
		t = t.join("|"), e.__patterns__ = t;
		var i = e.__call__;
		e.__call__ = function(e, n) {
			return void 0 != n ? i.call(this, e, n) : i.call(this, e, t)
		}
	}, h.DialectHelpers = {}, h.DialectHelpers.inline_until_char = function(e, t) {
		for (var n = 0, r = [];;) {
			if (e.charAt(n) == t) return n++, [n, r];
			if (n >= e.length) return null;
			var i = this.dialect.inline.__oneElement__.call(this, e.substr(n));
			n += i[0], r.push.apply(r, i.slice(1))
		}
	}, h.subclassDialect = function(e) {
		function t() {}
		function n() {}
		return t.prototype = e.block, n.prototype = e.inline, {
			block: new t,
			inline: new n
		}
	}, h.buildBlockOrder(h.dialects.Gruber.block), h.buildInlinePatterns(h.dialects.Gruber.inline), h.dialects.Maruku = h.subclassDialect(h.dialects.Gruber), h.dialects.Maruku.processMetaHash = function(e) {
		for (var t = o(e), n = {}, r = 0; r < t.length; ++r) if (/^#/.test(t[r])) n.id = t[r].substring(1);
		else if (/^\./.test(t[r])) n["class"] ? n["class"] = n["class"] + t[r].replace(/./, " ") : n["class"] = t[r].substring(1);
		else if (/\=/.test(t[r])) {
			var i = t[r].split(/\=/);
			n[i[0]] = i[1]
		}
		return n
	}, h.dialects.Maruku.block.document_meta = function(e, t) {
		if (!(e.lineNumber > 1) && e.match(/^(?:\w+:.*\n)*\w+:.*$/)) {
			s(this.tree) || this.tree.splice(1, 0, {});
			var n = e.split(/\n/);
			for (p in n) {
				var r = n[p].match(/(\w+):\s*(.*)$/),
					i = r[1].toLowerCase(),
					a = r[2];
				this.tree[1][i] = a
			}
			return []
		}
	}, h.dialects.Maruku.block.block_meta = function(e, t) {
		var n = e.match(/(^|\n) {0,3}\{:\s*((?:\\\}|[^\}])*)\s*\}$/);
		if (n) {
			var r, i = this.dialect.processMetaHash(n[2]);
			if ("" === n[1]) {
				var o = this.tree[this.tree.length - 1];
				if (r = s(o), "string" == typeof o) return;
				r || (r = {}, o.splice(1, 0, r));
				for (a in i) r[a] = i[a];
				return []
			}
			var l = e.replace(/\n.*$/, ""),
				u = this.processBlock(l, []);
			r = s(u[0]), r || (r = {}, u[0].splice(1, 0, r));
			for (a in i) r[a] = i[a];
			return u
		}
	}, h.dialects.Maruku.block.definition_list = function(e, t) {
		var n, r, i = /^((?:[^\s:].*\n)+):\s+([\s\S]+)$/,
			a = ["dl"];
		if (r = e.match(i)) {
			for (var o = [e]; t.length && i.exec(t[0]);) o.push(t.shift());
			for (var s = 0; s < o.length; ++s) {
				var r = o[s].match(i),
					l = r[1].replace(/\n$/, "").split(/\n/),
					u = r[2].split(/\n:\s+/);
				for (n = 0; n < l.length; ++n) a.push(["dt", l[n]]);
				for (n = 0; n < u.length; ++n) a.push(["dd"].concat(this.processInline(u[n].replace(/(\n)\s+/, "$1"))))
			}
			return [a]
		}
	}, h.dialects.Maruku.block.table = function v(e, t) {
		var n, r, i = function(e, t) {
				t = t || "\\s", t.match(/^[\\|\[\]{}?*.+^$]$/) && (t = "\\" + t);
				for (var n, r = [], i = new RegExp("^((?:\\\\.|[^\\\\" + t + "])*)" + t + "(.*)"); n = e.match(i);) r.push(n[1]), e = n[2];
				return r.push(e), r
			},
			a = /^ {0,3}\|(.+)\n {0,3}\|\s*([\-:]+[\-| :]*)\n((?:\s*\|.*(?:\n|$))*)(?=\n|$)/,
			o = /^ {0,3}(\S(?:\\.|[^\\|])*\|.*)\n {0,3}([\-:]+\s*\|[\-| :]*)\n((?:(?:\\.|[^\\|])*\|.*(?:\n|$))*)(?=\n|$)/;
		if (r = e.match(a)) r[3] = r[3].replace(/^\s*\|/gm, "");
		else if (!(r = e.match(o))) return;
		var v = ["table", ["thead", ["tr"]],
			["tbody"]
		];
		r[2] = r[2].replace(/\|\s*$/, "").split("|");
		var s = [];
		for (m(r[2], function(e) {
			e.match(/^\s*-+:\s*$/) ? s.push({
				align: "right"
			}) : e.match(/^\s*:-+\s*$/) ? s.push({
				align: "left"
			}) : e.match(/^\s*:-+:\s*$/) ? s.push({
				align: "center"
			}) : s.push({})
		}), r[1] = i(r[1].replace(/\|\s*$/, ""), "|"), n = 0; n < r[1].length; n++) v[1][1].push(["th", s[n] || {}].concat(this.processInline(r[1][n].trim())));
		return m(r[3].replace(/\|\s*$/gm, "").split("\n"), function(e) {
			var t = ["tr"];
			for (e = i(e, "|"), n = 0; n < e.length; n++) t.push(["td", s[n] || {}].concat(this.processInline(e[n].trim())));
			v[2].push(t)
		}, this), [v]
	}, h.dialects.Maruku.inline["{:"] = function(e, t, n) {
		if (!n.length) return [2, "{:"];
		var r = n[n.length - 1];
		if ("string" == typeof r) return [2, "{:"];
		var i = e.match(/^\{:\s*((?:\\\}|[^\}])*)\s*\}/);
		if (!i) return [2, "{:"];
		var a = this.dialect.processMetaHash(i[1]),
			o = s(r);
		o || (o = {}, r.splice(1, 0, o));
		for (var l in a) o[l] = a[l];
		return [i[0].length, ""]
	}, h.dialects.Maruku.inline.__escape__ = /^\\[\\`\*_{}\[\]()#\+.!\-|:]/, h.buildBlockOrder(h.dialects.Maruku.block), h.buildInlinePatterns(h.dialects.Maruku.inline);
	var m, _ = Array.isArray ||
	function(e) {
		return "[object Array]" == Object.prototype.toString.call(e)
	};
	m = Array.prototype.forEach ?
	function(e, t, n) {
		return e.forEach(t, n);
	} : function(e, t, n) {
		for (var r = 0; r < e.length; r++) t.call(n || e, e[r], r, e)
	};
	var g = function(e) {
			for (var t in e) if (hasOwnProperty.call(e, t)) return !1;
			return !0
		};
	e.renderJsonML = function(e, t) {
		t = t || {}, t.root = t.root || !1;
		var n = [];
		if (t.root) n.push(u(e));
		else for (e.shift(), !e.length || "object" != typeof e[0] || e[0] instanceof Array || e.shift(); e.length;) n.push(u(e.shift()));
		return n.join("\n\n")
	}
}(function() {
	return "undefined" == typeof exports ? (window.markdown = {}, window.markdown) : exports
}());
var _self = "undefined" != typeof window ? window : "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? self : {},
	Prism = function() {
		var e = /\blang(?:uage)?-(\w+)\b/i,
			t = 0,
			n = _self.Prism = {
				util: {
					encode: function(e) {
						return e instanceof r ? new r(e.type, n.util.encode(e.content), e.alias) : "Array" === n.util.type(e) ? e.map(n.util.encode) : e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/\u00a0/g, " ")
					},
					type: function(e) {
						return Object.prototype.toString.call(e).match(/\[object (\w+)\]/)[1]
					},
					objId: function(e) {
						return e.__id || Object.defineProperty(e, "__id", {
							value: ++t
						}), e.__id
					},
					clone: function(e) {
						var t = n.util.type(e);
						switch (t) {
						case "Object":
							var r = {};
							for (var i in e) e.hasOwnProperty(i) && (r[i] = n.util.clone(e[i]));
							return r;
						case "Array":
							return e.map && e.map(function(e) {
								return n.util.clone(e)
							})
						}
						return e
					}
				},
				languages: {
					extend: function(e, t) {
						var r = n.util.clone(n.languages[e]);
						for (var i in t) r[i] = t[i];
						return r
					},
					insertBefore: function(e, t, r, i) {
						i = i || n.languages;
						var a = i[e];
						if (2 == arguments.length) {
							r = arguments[1];
							for (var o in r) r.hasOwnProperty(o) && (a[o] = r[o]);
							return a
						}
						var s = {};
						for (var l in a) if (a.hasOwnProperty(l)) {
							if (l == t) for (var o in r) r.hasOwnProperty(o) && (s[o] = r[o]);
							s[l] = a[l]
						}
						return n.languages.DFS(n.languages, function(t, n) {
							n === i[e] && t != e && (this[t] = s)
						}), i[e] = s
					},
					DFS: function(e, t, r, i) {
						i = i || {};
						for (var a in e) e.hasOwnProperty(a) && (t.call(e, a, e[a], r || a), "Object" !== n.util.type(e[a]) || i[n.util.objId(e[a])] ? "Array" !== n.util.type(e[a]) || i[n.util.objId(e[a])] || (i[n.util.objId(e[a])] = !0, n.languages.DFS(e[a], t, a, i)) : (i[n.util.objId(e[a])] = !0, n.languages.DFS(e[a], t, null, i)))
					}
				},
				plugins: {},
				highlightAll: function(e, t) {
					for (var r, i = document.querySelectorAll('code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'), a = 0; r = i[a++];) n.highlightElement(r, e === !0, t)
				},
				highlightElement: function(t, r, i) {
					for (var a, o, s = t; s && !e.test(s.className);) s = s.parentNode;
					s && (a = (s.className.match(e) || [, ""])[1], o = n.languages[a]), t.className = t.className.replace(e, "").replace(/\s+/g, " ") + " language-" + a, s = t.parentNode, /pre/i.test(s.nodeName) && (s.className = s.className.replace(e, "").replace(/\s+/g, " ") + " language-" + a);
					var l = t.textContent,
						u = {
							element: t,
							language: a,
							grammar: o,
							code: l
						};
					if (!l || !o) return void n.hooks.run("complete", u);
					if (n.hooks.run("before-highlight", u), r && _self.Worker) {
						var c = new Worker(n.filename);
						c.onmessage = function(e) {
							u.highlightedCode = e.data, n.hooks.run("before-insert", u), u.element.innerHTML = u.highlightedCode, i && i.call(u.element), n.hooks.run("after-highlight", u), n.hooks.run("complete", u)
						}, c.postMessage(JSON.stringify({
							language: u.language,
							code: u.code,
							immediateClose: !0
						}))
					} else u.highlightedCode = n.highlight(u.code, u.grammar, u.language), n.hooks.run("before-insert", u), u.element.innerHTML = u.highlightedCode, i && i.call(t), n.hooks.run("after-highlight", u), n.hooks.run("complete", u)
				},
				highlight: function(e, t, i) {
					var a = n.tokenize(e, t);
					return r.stringify(n.util.encode(a), i)
				},
				tokenize: function(e, t, r) {
					var i = n.Token,
						a = [e],
						o = t.rest;
					if (o) {
						for (var s in o) t[s] = o[s];
						delete t.rest
					}
					e: for (var s in t) if (t.hasOwnProperty(s) && t[s]) {
						var l = t[s];
						l = "Array" === n.util.type(l) ? l : [l];
						for (var u = 0; u < l.length; ++u) {
							var c = l[u],
								d = c.inside,
								h = !! c.lookbehind,
								f = 0,
								p = c.alias;
							c = c.pattern || c;
							for (var m = 0; m < a.length; m++) {
								var _ = a[m];
								if (a.length > e.length) break e;
								if (!(_ instanceof i)) {
									c.lastIndex = 0;
									var g = c.exec(_);
									if (g) {
										h && (f = g[1].length);
										var y = g.index - 1 + f,
											g = g[0].slice(f),
											v = g.length,
											E = y + v,
											b = _.slice(0, y + 1),
											U = _.slice(E + 1),
											w = [m, 1];
										b && w.push(b);
										var k = new i(s, d ? n.tokenize(g, d) : g, p);
										w.push(k), U && w.push(U), Array.prototype.splice.apply(a, w)
									}
								}
							}
						}
					}
					return a
				},
				hooks: {
					all: {},
					add: function(e, t) {
						var r = n.hooks.all;
						r[e] = r[e] || [], r[e].push(t)
					},
					run: function(e, t) {
						var r = n.hooks.all[e];
						if (r && r.length) for (var i, a = 0; i = r[a++];) i(t)
					}
				}
			},
			r = n.Token = function(e, t, n) {
				this.type = e, this.content = t, this.alias = n
			};
		if (r.stringify = function(e, t, i) {
			if ("string" == typeof e) return e;
			if ("Array" === n.util.type(e)) return e.map(function(n) {
				return r.stringify(n, t, e)
			}).join("");
			var a = {
				type: e.type,
				content: r.stringify(e.content, t, i),
				tag: "span",
				classes: ["token", e.type],
				attributes: {},
				language: t,
				parent: i
			};
			if ("comment" == a.type && (a.attributes.spellcheck = "true"), e.alias) {
				var o = "Array" === n.util.type(e.alias) ? e.alias : [e.alias];
				Array.prototype.push.apply(a.classes, o)
			}
			n.hooks.run("wrap", a);
			var s = "";
			for (var l in a.attributes) s += (s ? " " : "") + l + '="' + (a.attributes[l] || "") + '"';
			return "<" + a.tag + ' class="' + a.classes.join(" ") + '" ' + s + ">" + a.content + "</" + a.tag + ">"
		}, !_self.document) return _self.addEventListener ? (_self.addEventListener("message", function(e) {
			var t = JSON.parse(e.data),
				r = t.language,
				i = t.code,
				a = t.immediateClose;
			_self.postMessage(n.highlight(i, n.languages[r], r)), a && _self.close()
		}, !1), _self.Prism) : _self.Prism;
		var i = document.currentScript || [].slice.call(document.getElementsByTagName("script")).pop();
		return i && (n.filename = i.src, document.addEventListener && !i.hasAttribute("data-manual") && document.addEventListener("DOMContentLoaded", n.highlightAll)), _self.Prism
	}();
"undefined" != typeof module && module.exports && (module.exports = Prism), "undefined" != typeof global && (global.Prism = Prism), Prism.languages.markup = {
	comment: /<!--[\w\W]*?-->/,
	prolog: /<\?[\w\W]+?\?>/,
	doctype: /<!DOCTYPE[\w\W]+?>/,
	cdata: /<!\[CDATA\[[\w\W]*?]]>/i,
	tag: {
		pattern: /<\/?(?!\d)[^\s>\/=.$<]+(?:\s+[^\s>\/=]+(?:=(?:("|')(?:\\\1|\\?(?!\1)[\w\W])*\1|[^\s'">=]+))?)*\s*\/?>/i,
		inside: {
			tag: {
				pattern: /^<\/?[^\s>\/]+/i,
				inside: {
					punctuation: /^<\/?/,
					namespace: /^[^\s>\/:]+:/
				}
			},
			"attr-value": {
				pattern: /=(?:('|")[\w\W]*?(\1)|[^\s>]+)/i,
				inside: {
					punctuation: /[=>"']/
				}
			},
			punctuation: /\/?>/,
			"attr-name": {
				pattern: /[^\s>\/]+/,
				inside: {
					namespace: /^[^\s>\/:]+:/
				}
			}
		}
	},
	entity: /&#?[\da-z]{1,8};/i
}, Prism.hooks.add("wrap", function(e) {
	"entity" === e.type && (e.attributes.title = e.content.replace(/&amp;/, "&"))
}), Prism.languages.xml = Prism.languages.markup, Prism.languages.html = Prism.languages.markup, Prism.languages.mathml = Prism.languages.markup, Prism.languages.svg = Prism.languages.markup, Prism.languages.css = {
	comment: /\/\*[\w\W]*?\*\//,
	atrule: {
		pattern: /@[\w-]+?.*?(;|(?=\s*\{))/i,
		inside: {
			rule: /@[\w-]+/
		}
	},
	url: /url\((?:(["'])(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1|.*?)\)/i,
	selector: /[^\{\}\s][^\{\};]*?(?=\s*\{)/,
	string: /("|')(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1/,
	property: /(\b|\B)[\w-]+(?=\s*:)/i,
	important: /\B!important\b/i,
	"function": /[-a-z0-9]+(?=\()/i,
	punctuation: /[(){};:]/
}, Prism.languages.css.atrule.inside.rest = Prism.util.clone(Prism.languages.css), Prism.languages.markup && (Prism.languages.insertBefore("markup", "tag", {
	style: {
		pattern: /(<style[\w\W]*?>)[\w\W]*?(?=<\/style>)/i,
		lookbehind: !0,
		inside: Prism.languages.css,
		alias: "language-css"
	}
}), Prism.languages.insertBefore("inside", "attr-value", {
	"style-attr": {
		pattern: /\s*style=("|').*?\1/i,
		inside: {
			"attr-name": {
				pattern: /^\s*style/i,
				inside: Prism.languages.markup.tag.inside
			},
			punctuation: /^\s*=\s*['"]|['"]\s*$/,
			"attr-value": {
				pattern: /.+/i,
				inside: Prism.languages.css
			}
		},
		alias: "language-css"
	}
}, Prism.languages.markup.tag)), Prism.languages.clike = {
	comment: [{
		pattern: /(^|[^\\])\/\*[\w\W]*?\*\//,
		lookbehind: !0
	}, {
		pattern: /(^|[^\\:])\/\/.*/,
		lookbehind: !0
	}],
	string: /(["'])(\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/,
	"class-name": {
		pattern: /((?:\b(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[a-z0-9_\.\\]+/i,
		lookbehind: !0,
		inside: {
			punctuation: /(\.|\\)/
		}
	},
	keyword: /\b(if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,
	"boolean": /\b(true|false)\b/,
	"function": /[a-z0-9_]+(?=\()/i,
	number: /\b-?(?:0x[\da-f]+|\d*\.?\d+(?:e[+-]?\d+)?)\b/i,
	operator: /--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/,
	punctuation: /[{}[\];(),.:]/
}, Prism.languages.javascript = Prism.languages.extend("clike", {
	keyword: /\b(as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|var|void|while|with|yield)\b/,
	number: /\b-?(0x[\dA-Fa-f]+|0b[01]+|0o[0-7]+|\d*\.?\d+([Ee][+-]?\d+)?|NaN|Infinity)\b/,
	"function": /[_$a-zA-Z\xA0-\uFFFF][_$a-zA-Z0-9\xA0-\uFFFF]*(?=\()/i
}), Prism.languages.insertBefore("javascript", "keyword", {
	regex: {
		pattern: /(^|[^\/])\/(?!\/)(\[.+?]|\\.|[^\/\\\r\n])+\/[gimyu]{0,5}(?=\s*($|[\r\n,.;})]))/,
		lookbehind: !0
	}
}), Prism.languages.insertBefore("javascript", "class-name", {
	"template-string": {
		pattern: /`(?:\\`|\\?[^`])*`/,
		inside: {
			interpolation: {
				pattern: /\$\{[^}]+\}/,
				inside: {
					"interpolation-punctuation": {
						pattern: /^\$\{|\}$/,
						alias: "punctuation"
					},
					rest: Prism.languages.javascript
				}
			},
			string: /[\s\S]+/
		}
	}
}), Prism.languages.markup && Prism.languages.insertBefore("markup", "tag", {
	script: {
		pattern: /(<script[\w\W]*?>)[\w\W]*?(?=<\/script>)/i,
		lookbehind: !0,
		inside: Prism.languages.javascript,
		alias: "language-javascript"
	}
}), Prism.languages.js = Prism.languages.javascript, function() {
	"undefined" != typeof self && self.Prism && self.document && document.querySelector && (self.Prism.fileHighlight = function() {
		var e = {
			js: "javascript",
			html: "markup",
			svg: "markup",
			xml: "markup",
			py: "python",
			rb: "ruby",
			ps1: "powershell",
			psm1: "powershell"
		};
		Array.prototype.forEach && Array.prototype.slice.call(document.querySelectorAll("pre[data-src]")).forEach(function(t) {
			for (var n, r = t.getAttribute("data-src"), i = t, a = /\blang(?:uage)?-(?!\*)(\w+)\b/i; i && !a.test(i.className);) i = i.parentNode;
			if (i && (n = (t.className.match(a) || [, ""])[1]), !n) {
				var o = (r.match(/\.(\w+)$/) || [, ""])[1];
				n = e[o] || o
			}
			var s = document.createElement("code");
			s.className = "language-" + n, t.textContent = "", s.textContent = "Loading…", t.appendChild(s);
			var l = new XMLHttpRequest;
			l.open("GET", r, !0), l.onreadystatechange = function() {
				4 == l.readyState && (l.status < 400 && l.responseText ? (s.textContent = l.responseText, Prism.highlightElement(s)) : l.status >= 400 ? s.textContent = "✖ Error " + l.status + " while fetching file: " + l.statusText : s.textContent = "✖ Error: File does not exist or is empty")
			}, l.send(null)
		})
	}, document.addEventListener("DOMContentLoaded", self.Prism.fileHighlight))
}(), Prism.languages.insertBefore("php", "variable", {
	"this": /\$this\b/,
	global: /\$(?:_(?:SERVER|GET|POST|FILES|REQUEST|SESSION|ENV|COOKIE)|GLOBALS|HTTP_RAW_POST_DATA|argc|argv|php_errormsg|http_response_header)/,
	scope: {
		pattern: /\b[\w\\]+::/,
		inside: {
			keyword: /(static|self|parent)/,
			punctuation: /(::|\\)/
		}
	}
}), Prism.languages.php = Prism.languages.extend("clike", {
	keyword: /\b(and|or|xor|array|as|break|case|cfunction|class|const|continue|declare|default|die|do|else|elseif|enddeclare|endfor|endforeach|endif|endswitch|endwhile|extends|for|foreach|function|include|include_once|global|if|new|return|static|switch|use|require|require_once|var|while|abstract|interface|public|implements|private|protected|parent|throw|null|echo|print|trait|namespace|final|yield|goto|instanceof|finally|try|catch)\b/i,
	constant: /\b[A-Z0-9_]{2,}\b/,
	comment: {
		pattern: /(^|[^\\])(?:\/\*[\w\W]*?\*\/|\/\/.*)/,
		lookbehind: !0
	}
}), Prism.languages.insertBefore("php", "class-name", {
	"shell-comment": {
		pattern: /(^|[^\\])#.*/,
		lookbehind: !0,
		alias: "comment"
	}
}), Prism.languages.insertBefore("php", "keyword", {
	delimiter: /\?>|<\?(?:php)?/i,
	variable: /\$\w+\b/i,
	"package": {
		pattern: /(\\|namespace\s+|use\s+)[\w\\]+/,
		lookbehind: !0,
		inside: {
			punctuation: /\\/
		}
	}
}), Prism.languages.insertBefore("php", "operator", {
	property: {
		pattern: /(->)[\w]+/,
		lookbehind: !0
	}
}), Prism.languages.markup && (Prism.hooks.add("before-highlight", function(e) {
	"php" === e.language && (e.tokenStack = [], e.backupCode = e.code, e.code = e.code.replace(/(?:<\?php|<\?)[\w\W]*?(?:\?>)/gi, function(t) {
		return e.tokenStack.push(t), "{{{PHP" + e.tokenStack.length + "}}}"
	}))
}), Prism.hooks.add("before-insert", function(e) {
	"php" === e.language && (e.code = e.backupCode, delete e.backupCode)
}), Prism.hooks.add("after-highlight", function(e) {
	if ("php" === e.language) {
		for (var t, n = 0; t = e.tokenStack[n]; n++) e.highlightedCode = e.highlightedCode.replace("{{{PHP" + (n + 1) + "}}}", Prism.highlight(t, e.grammar, "php").replace(/\$/g, "$$$$"));
		e.element.innerHTML = e.highlightedCode
	}
}), Prism.hooks.add("wrap", function(e) {
	"php" === e.language && "markup" === e.type && (e.content = e.content.replace(/(\{\{\{PHP[0-9]+\}\}\})/g, '<span class="token php">$1</span>'))
}), Prism.languages.insertBefore("php", "comment", {
	markup: {
		pattern: /<[^?]\/?(.*?)>/,
		inside: Prism.languages.markup
	},
	php: /\{\{\{PHP[0-9]+\}\}\}/
})), !
function(e) {
	if ("object" == typeof exports && "undefined" != typeof module) module.exports = e();
	else if ("function" == typeof define && define.amd) define([], e);
	else {
		var t;
		t = "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this, t.localforage = e()
	}
}(function() {
	return function e(t, n, r) {
		function i(o, s) {
			if (!n[o]) {
				if (!t[o]) {
					var l = "function" == typeof require && require;
					if (!s && l) return l(o, !0);
					if (a) return a(o, !0);
					var u = new Error("Cannot find module '" + o + "'");
					throw u.code = "MODULE_NOT_FOUND", u
				}
				var c = n[o] = {
					exports: {}
				};
				t[o][0].call(c.exports, function(e) {
					var n = t[o][1][e];
					return i(n ? n : e)
				}, c, c.exports, e, t, n, r)
			}
			return n[o].exports
		}
		for (var a = "function" == typeof require && require, o = 0; o < r.length; o++) i(r[o]);
		return i
	}({
		1: [function(e, t, n) {
			(function(e) {
				"use strict";

				function n() {
					c = !0;
					for (var e, t, n = d.length; n;) {
						for (t = d, d = [], e = -1; ++e < n;) t[e]();
						n = d.length
					}
					c = !1
				}
				function r(e) {
					1 !== d.push(e) || c || i()
				}
				var i, a = e.MutationObserver || e.WebKitMutationObserver;
				if (a) {
					var o = 0,
						s = new a(n),
						l = e.document.createTextNode("");
					s.observe(l, {
						characterData: !0
					}), i = function() {
						l.data = o = ++o % 2
					}
				} else if (e.setImmediate || "undefined" == typeof e.MessageChannel) i = "document" in e && "onreadystatechange" in e.document.createElement("script") ?
				function() {
					var t = e.document.createElement("script");
					t.onreadystatechange = function() {
						n(), t.onreadystatechange = null, t.parentNode.removeChild(t), t = null
					}, e.document.documentElement.appendChild(t)
				} : function() {
					setTimeout(n, 0)
				};
				else {
					var u = new e.MessageChannel;
					u.port1.onmessage = n, i = function() {
						u.port2.postMessage(0)
					}
				}
				var c, d = [];
				t.exports = r
			}).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
		}, {}],
		2: [function(e, t, n) {
			"use strict";

			function r() {}
			function i(e) {
				if ("function" != typeof e) throw new TypeError("resolver must be a function");
				this.state = y, this.queue = [], this.outcome = void 0, e !== r && l(this, e)
			}
			function a(e, t, n) {
				this.promise = e, "function" == typeof t && (this.onFulfilled = t, this.callFulfilled = this.otherCallFulfilled), "function" == typeof n && (this.onRejected = n, this.callRejected = this.otherCallRejected)
			}
			function o(e, t, n) {
				p(function() {
					var r;
					try {
						r = t(n)
					} catch (i) {
						return m.reject(e, i)
					}
					r === e ? m.reject(e, new TypeError("Cannot resolve promise with itself")) : m.resolve(e, r)
				})
			}
			function s(e) {
				var t = e && e.then;
				return e && "object" == typeof e && "function" == typeof t ?
				function() {
					t.apply(e, arguments)
				} : void 0
			}
			function l(e, t) {
				function n(t) {
					a || (a = !0, m.reject(e, t))
				}
				function r(t) {
					a || (a = !0, m.resolve(e, t))
				}
				function i() {
					t(r, n)
				}
				var a = !1,
					o = u(i);
				"error" === o.status && n(o.value)
			}
			function u(e, t) {
				var n = {};
				try {
					n.value = e(t), n.status = "success"
				} catch (r) {
					n.status = "error", n.value = r
				}
				return n
			}
			function c(e) {
				return e instanceof this ? e : m.resolve(new this(r), e)
			}
			function d(e) {
				var t = new this(r);
				return m.reject(t, e)
			}
			function h(e) {
				function t(e, t) {
					function r(e) {
						o[t] = e, ++s !== i || a || (a = !0, m.resolve(u, o))
					}
					n.resolve(e).then(r, function(e) {
						a || (a = !0, m.reject(u, e))
					})
				}
				var n = this;
				if ("[object Array]" !== Object.prototype.toString.call(e)) return this.reject(new TypeError("must be an array"));
				var i = e.length,
					a = !1;
				if (!i) return this.resolve([]);
				for (var o = new Array(i), s = 0, l = -1, u = new this(r); ++l < i;) t(e[l], l);
				return u
			}
			function f(e) {
				function t(e) {
					n.resolve(e).then(function(e) {
						a || (a = !0, m.resolve(s, e))
					}, function(e) {
						a || (a = !0, m.reject(s, e))
					})
				}
				var n = this;
				if ("[object Array]" !== Object.prototype.toString.call(e)) return this.reject(new TypeError("must be an array"));
				var i = e.length,
					a = !1;
				if (!i) return this.resolve([]);
				for (var o = -1, s = new this(r); ++o < i;) t(e[o]);
				return s
			}
			var p = e(1),
				m = {},
				_ = ["REJECTED"],
				g = ["FULFILLED"],
				y = ["PENDING"];
			t.exports = n = i, i.prototype["catch"] = function(e) {
				return this.then(null, e)
			}, i.prototype.then = function(e, t) {
				if ("function" != typeof e && this.state === g || "function" != typeof t && this.state === _) return this;
				var n = new this.constructor(r);
				if (this.state !== y) {
					var i = this.state === g ? e : t;
					o(n, i, this.outcome)
				} else this.queue.push(new a(n, e, t));
				return n
			}, a.prototype.callFulfilled = function(e) {
				m.resolve(this.promise, e)
			}, a.prototype.otherCallFulfilled = function(e) {
				o(this.promise, this.onFulfilled, e)
			}, a.prototype.callRejected = function(e) {
				m.reject(this.promise, e)
			}, a.prototype.otherCallRejected = function(e) {
				o(this.promise, this.onRejected, e)
			}, m.resolve = function(e, t) {
				var n = u(s, t);
				if ("error" === n.status) return m.reject(e, n.value);
				var r = n.value;
				if (r) l(e, r);
				else {
					e.state = g, e.outcome = t;
					for (var i = -1, a = e.queue.length; ++i < a;) e.queue[i].callFulfilled(t)
				}
				return e
			}, m.reject = function(e, t) {
				e.state = _, e.outcome = t;
				for (var n = -1, r = e.queue.length; ++n < r;) e.queue[n].callRejected(t);
				return e
			}, n.resolve = c, n.reject = d, n.all = h, n.race = f
		}, {
			1: 1
		}],
		3: [function(e, t, n) {
			(function(t) {
				"use strict";
				"function" != typeof t.Promise && (t.Promise = e(2))
			}).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
		}, {
			2: 2
		}],
		4: [function(e, t, n) {
			"use strict";

			function r(e, t) {
				if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
			}
			function i() {
				return "undefined" != typeof indexedDB ? indexedDB : "undefined" != typeof webkitIndexedDB ? webkitIndexedDB : "undefined" != typeof mozIndexedDB ? mozIndexedDB : "undefined" != typeof OIndexedDB ? OIndexedDB : "undefined" != typeof msIndexedDB ? msIndexedDB : void 0
			}
			function a() {
				try {
					return !!ae && (!("undefined" != typeof openDatabase && "undefined" != typeof navigator && navigator.userAgent && /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent)) && (ae && "function" == typeof ae.open && "undefined" != typeof IDBKeyRange))
				} catch (e) {
					return !1
				}
			}
			function o() {
				return "function" == typeof openDatabase
			}
			function s() {
				try {
					return "undefined" != typeof localStorage && "setItem" in localStorage && localStorage.setItem
				} catch (e) {
					return !1
				}
			}
			function l(e, t) {
				e = e || [], t = t || {};
				try {
					return new Blob(e, t)
				} catch (n) {
					if ("TypeError" !== n.name) throw n;
					for (var r = "undefined" != typeof BlobBuilder ? BlobBuilder : "undefined" != typeof MSBlobBuilder ? MSBlobBuilder : "undefined" != typeof MozBlobBuilder ? MozBlobBuilder : WebKitBlobBuilder, i = new r, a = 0; a < e.length; a += 1) i.append(e[a]);
					return i.getBlob(t.type)
				}
			}
			function u(e, t) {
				t && e.then(function(e) {
					t(null, e)
				}, function(e) {
					t(e)
				})
			}
			function c(e) {
				for (var t = e.length, n = new ArrayBuffer(t), r = new Uint8Array(n), i = 0; t > i; i++) r[i] = e.charCodeAt(i);
				return n
			}
			function d(e) {
				return new le(function(t) {
					var n = l([""]);
					e.objectStore(ue).put(n, "key"), e.onabort = function(e) {
						e.preventDefault(), e.stopPropagation(), t(!1)
					}, e.oncomplete = function() {
						var e = navigator.userAgent.match(/Chrome\/(\d+)/),
							n = navigator.userAgent.match(/Edge\//);
						t(n || !e || parseInt(e[1], 10) >= 43)
					}
				})["catch"](function() {
					return !1
				})
			}
			function h(e) {
				return "boolean" == typeof oe ? le.resolve(oe) : d(e).then(function(e) {
					return oe = e
				})
			}
			function f(e) {
				var t = se[e.name],
					n = {};
				n.promise = new le(function(e) {
					n.resolve = e
				}), t.deferredOperations.push(n), t.dbReady ? t.dbReady = t.dbReady.then(function() {
					return n.promise
				}) : t.dbReady = n.promise
			}
			function p(e) {
				var t = se[e.name],
					n = t.deferredOperations.pop();
				n && n.resolve()
			}
			function m(e, t) {
				return new le(function(n, r) {
					if (e.db) {
						if (!t) return n(e.db);
						f(e), e.db.close()
					}
					var i = [e.name];
					t && i.push(e.version);
					var a = ae.open.apply(ae, i);
					t && (a.onupgradeneeded = function(t) {
						var n = a.result;
						try {
							n.createObjectStore(e.storeName), t.oldVersion <= 1 && n.createObjectStore(ue)
						} catch (r) {
							if ("ConstraintError" !== r.name) throw r;
							console.warn('The database "' + e.name + '" has been upgraded from version ' + t.oldVersion + " to version " + t.newVersion + ', but the storage "' + e.storeName + '" already exists.')
						}
					}), a.onerror = function() {
						r(a.error)
					}, a.onsuccess = function() {
						n(a.result), p(e)
					}
				})
			}
			function _(e) {
				return m(e, !1)
			}
			function g(e) {
				return m(e, !0)
			}
			function y(e, t) {
				if (!e.db) return !0;
				var n = !e.db.objectStoreNames.contains(e.storeName),
					r = e.version < e.db.version,
					i = e.version > e.db.version;
				if (r && (e.version !== t && console.warn('The database "' + e.name + "\" can't be downgraded from version " + e.db.version + " to version " + e.version + "."), e.version = e.db.version), i || n) {
					if (n) {
						var a = e.db.version + 1;
						a > e.version && (e.version = a)
					}
					return !0
				}
				return !1
			}
			function v(e) {
				return new le(function(t, n) {
					var r = new FileReader;
					r.onerror = n, r.onloadend = function(n) {
						var r = btoa(n.target.result || "");
						t({
							__local_forage_encoded_blob: !0,
							data: r,
							type: e.type
						})
					}, r.readAsBinaryString(e)
				})
			}
			function E(e) {
				var t = c(atob(e.data));
				return l([t], {
					type: e.type
				})
			}
			function b(e) {
				return e && e.__local_forage_encoded_blob
			}
			function U(e) {
				var t = this,
					n = t._initReady().then(function() {
						var e = se[t._dbInfo.name];
						return e && e.dbReady ? e.dbReady : void 0
					});
				return n.then(e, e), n
			}
			function w(e) {
				function t() {
					return le.resolve()
				}
				var n = this,
					r = {
						db: null
					};
				if (e) for (var i in e) r[i] = e[i];
				se || (se = {});
				var a = se[r.name];
				a || (a = {
					forages: [],
					db: null,
					dbReady: null,
					deferredOperations: []
				}, se[r.name] = a), a.forages.push(n), n._initReady || (n._initReady = n.ready, n.ready = U);
				for (var o = [], s = 0; s < a.forages.length; s++) {
					var l = a.forages[s];
					l !== n && o.push(l._initReady()["catch"](t))
				}
				var u = a.forages.slice(0);
				return le.all(o).then(function() {
					return r.db = a.db, _(r)
				}).then(function(e) {
					return r.db = e, y(r, n._defaultConfig.version) ? g(r) : e
				}).then(function(e) {
					r.db = a.db = e, n._dbInfo = r;
					for (var t = 0; t < u.length; t++) {
						var i = u[t];
						i !== n && (i._dbInfo.db = r.db, i._dbInfo.version = r.version)
					}
				})
			}
			function k(e, t) {
				var n = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var r = new le(function(t, r) {
					n.ready().then(function() {
						var i = n._dbInfo,
							a = i.db.transaction(i.storeName, "readonly").objectStore(i.storeName),
							o = a.get(e);
						o.onsuccess = function() {
							var e = o.result;
							void 0 === e && (e = null), b(e) && (e = E(e)), t(e)
						}, o.onerror = function() {
							r(o.error)
						}
					})["catch"](r)
				});
				return u(r, t), r
			}
			function M(e, t) {
				var n = this,
					r = new le(function(t, r) {
						n.ready().then(function() {
							var i = n._dbInfo,
								a = i.db.transaction(i.storeName, "readonly").objectStore(i.storeName),
								o = a.openCursor(),
								s = 1;
							o.onsuccess = function() {
								var n = o.result;
								if (n) {
									var r = n.value;
									b(r) && (r = E(r));
									var i = e(r, n.key, s++);
									void 0 !== i ? t(i) : n["continue"]()
								} else t()
							}, o.onerror = function() {
								r(o.error)
							}
						})["catch"](r)
					});
				return u(r, t), r
			}
			function L(e, t, n) {
				var r = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var i = new le(function(n, i) {
					var a;
					r.ready().then(function() {
						return a = r._dbInfo, t instanceof Blob ? h(a.db).then(function(e) {
							return e ? t : v(t)
						}) : t
					}).then(function(t) {
						var r = a.db.transaction(a.storeName, "readwrite"),
							o = r.objectStore(a.storeName);
						null === t && (t = void 0), r.oncomplete = function() {
							void 0 === t && (t = null), n(t)
						}, r.onabort = r.onerror = function() {
							var e = s.error ? s.error : s.transaction.error;
							i(e)
						};
						var s = o.put(t, e)
					})["catch"](i)
				});
				return u(i, n), i
			}
			function F(e, t) {
				var n = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var r = new le(function(t, r) {
					n.ready().then(function() {
						var i = n._dbInfo,
							a = i.db.transaction(i.storeName, "readwrite"),
							o = a.objectStore(i.storeName),
							s = o["delete"](e);
						a.oncomplete = function() {
							t()
						}, a.onerror = function() {
							r(s.error)
						}, a.onabort = function() {
							var e = s.error ? s.error : s.transaction.error;
							r(e)
						}
					})["catch"](r)
				});
				return u(r, t), r
			}
			function D(e) {
				var t = this,
					n = new le(function(e, n) {
						t.ready().then(function() {
							var r = t._dbInfo,
								i = r.db.transaction(r.storeName, "readwrite"),
								a = i.objectStore(r.storeName),
								o = a.clear();
							i.oncomplete = function() {
								e()
							}, i.onabort = i.onerror = function() {
								var e = o.error ? o.error : o.transaction.error;
								n(e)
							}
						})["catch"](n)
					});
				return u(n, e), n
			}
			function x(e) {
				var t = this,
					n = new le(function(e, n) {
						t.ready().then(function() {
							var r = t._dbInfo,
								i = r.db.transaction(r.storeName, "readonly").objectStore(r.storeName),
								a = i.count();
							a.onsuccess = function() {
								e(a.result)
							}, a.onerror = function() {
								n(a.error)
							}
						})["catch"](n)
					});
				return u(n, e), n
			}
			function T(e, t) {
				var n = this,
					r = new le(function(t, r) {
						return 0 > e ? void t(null) : void n.ready().then(function() {
							var i = n._dbInfo,
								a = i.db.transaction(i.storeName, "readonly").objectStore(i.storeName),
								o = !1,
								s = a.openCursor();
							s.onsuccess = function() {
								var n = s.result;
								return n ? void(0 === e ? t(n.key) : o ? t(n.key) : (o = !0, n.advance(e))) : void t(null)
							}, s.onerror = function() {
								r(s.error)
							}
						})["catch"](r)
					});
				return u(r, t), r
			}
			function Y(e) {
				var t = this,
					n = new le(function(e, n) {
						t.ready().then(function() {
							var r = t._dbInfo,
								i = r.db.transaction(r.storeName, "readonly").objectStore(r.storeName),
								a = i.openCursor(),
								o = [];
							a.onsuccess = function() {
								var t = a.result;
								return t ? (o.push(t.key), void t["continue"]()) : void e(o)
							}, a.onerror = function() {
								n(a.error)
							}
						})["catch"](n)
					});
				return u(n, e), n
			}
			function S(e) {
				var t, n, r, i, a, o = .75 * e.length,
					s = e.length,
					l = 0;
				"=" === e[e.length - 1] && (o--, "=" === e[e.length - 2] && o--);
				var u = new ArrayBuffer(o),
					c = new Uint8Array(u);
				for (t = 0; s > t; t += 4) n = de.indexOf(e[t]), r = de.indexOf(e[t + 1]), i = de.indexOf(e[t + 2]), a = de.indexOf(e[t + 3]), c[l++] = n << 2 | r >> 4, c[l++] = (15 & r) << 4 | i >> 2, c[l++] = (3 & i) << 6 | 63 & a;
				return u
			}
			function A(e) {
				var t, n = new Uint8Array(e),
					r = "";
				for (t = 0; t < n.length; t += 3) r += de[n[t] >> 2], r += de[(3 & n[t]) << 4 | n[t + 1] >> 4], r += de[(15 & n[t + 1]) << 2 | n[t + 2] >> 6], r += de[63 & n[t + 2]];
				return n.length % 3 === 2 ? r = r.substring(0, r.length - 1) + "=" : n.length % 3 === 1 && (r = r.substring(0, r.length - 2) + "=="), r
			}
			function C(e, t) {
				var n = "";
				if (e && (n = e.toString()), e && ("[object ArrayBuffer]" === e.toString() || e.buffer && "[object ArrayBuffer]" === e.buffer.toString())) {
					var r, i = pe;
					e instanceof ArrayBuffer ? (r = e, i += _e) : (r = e.buffer, "[object Int8Array]" === n ? i += ye : "[object Uint8Array]" === n ? i += ve : "[object Uint8ClampedArray]" === n ? i += Ee : "[object Int16Array]" === n ? i += be : "[object Uint16Array]" === n ? i += we : "[object Int32Array]" === n ? i += Ue : "[object Uint32Array]" === n ? i += ke : "[object Float32Array]" === n ? i += Me : "[object Float64Array]" === n ? i += Le : t(new Error("Failed to get type for BinaryArray"))), t(i + A(r))
				} else if ("[object Blob]" === n) {
					var a = new FileReader;
					a.onload = function() {
						var n = he + e.type + "~" + A(this.result);
						t(pe + ge + n)
					}, a.readAsArrayBuffer(e)
				} else try {
					t(JSON.stringify(e))
				} catch (o) {
					console.error("Couldn't convert value into a JSON string: ", e), t(null, o)
				}
			}
			function j(e) {
				if (e.substring(0, me) !== pe) return JSON.parse(e);
				var t, n = e.substring(Fe),
					r = e.substring(me, Fe);
				if (r === ge && fe.test(n)) {
					var i = n.match(fe);
					t = i[1], n = n.substring(i[0].length)
				}
				var a = S(n);
				switch (r) {
				case _e:
					return a;
				case ge:
					return l([a], {
						type: t
					});
				case ye:
					return new Int8Array(a);
				case ve:
					return new Uint8Array(a);
				case Ee:
					return new Uint8ClampedArray(a);
				case be:
					return new Int16Array(a);
				case we:
					return new Uint16Array(a);
				case Ue:
					return new Int32Array(a);
				case ke:
					return new Uint32Array(a);
				case Me:
					return new Float32Array(a);
				case Le:
					return new Float64Array(a);
				default:
					throw new Error("Unkown type: " + r)
				}
			}
			function H(e) {
				var t = this,
					n = {
						db: null
					};
				if (e) for (var r in e) n[r] = "string" != typeof e[r] ? e[r].toString() : e[r];
				var i = new le(function(e, r) {
					try {
						n.db = openDatabase(n.name, String(n.version), n.description, n.size)
					} catch (i) {
						return r(i)
					}
					n.db.transaction(function(i) {
						i.executeSql("CREATE TABLE IF NOT EXISTS " + n.storeName + " (id INTEGER PRIMARY KEY, key unique, value)", [], function() {
							t._dbInfo = n, e()
						}, function(e, t) {
							r(t)
						})
					})
				});
				return n.serializer = De, i
			}
			function B(e, t) {
				var n = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var r = new le(function(t, r) {
					n.ready().then(function() {
						var i = n._dbInfo;
						i.db.transaction(function(n) {
							n.executeSql("SELECT * FROM " + i.storeName + " WHERE key = ? LIMIT 1", [e], function(e, n) {
								var r = n.rows.length ? n.rows.item(0).value : null;
								r && (r = i.serializer.deserialize(r)), t(r)
							}, function(e, t) {
								r(t)
							})
						})
					})["catch"](r)
				});
				return u(r, t), r
			}
			function $(e, t) {
				var n = this,
					r = new le(function(t, r) {
						n.ready().then(function() {
							var i = n._dbInfo;
							i.db.transaction(function(n) {
								n.executeSql("SELECT * FROM " + i.storeName, [], function(n, r) {
									for (var a = r.rows, o = a.length, s = 0; o > s; s++) {
										var l = a.item(s),
											u = l.value;
										if (u && (u = i.serializer.deserialize(u)), u = e(u, l.key, s + 1), void 0 !== u) return void t(u)
									}
									t()
								}, function(e, t) {
									r(t)
								})
							})
						})["catch"](r)
					});
				return u(r, t), r
			}
			function P(e, t, n) {
				var r = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var i = new le(function(n, i) {
					r.ready().then(function() {
						void 0 === t && (t = null);
						var a = t,
							o = r._dbInfo;
						o.serializer.serialize(t, function(t, r) {
							r ? i(r) : o.db.transaction(function(r) {
								r.executeSql("INSERT OR REPLACE INTO " + o.storeName + " (key, value) VALUES (?, ?)", [e, t], function() {
									n(a)
								}, function(e, t) {
									i(t)
								})
							}, function(e) {
								e.code === e.QUOTA_ERR && i(e)
							})
						})
					})["catch"](i)
				});
				return u(i, n), i
			}
			function O(e, t) {
				var n = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var r = new le(function(t, r) {
					n.ready().then(function() {
						var i = n._dbInfo;
						i.db.transaction(function(n) {
							n.executeSql("DELETE FROM " + i.storeName + " WHERE key = ?", [e], function() {
								t()
							}, function(e, t) {
								r(t)
							})
						})
					})["catch"](r)
				});
				return u(r, t), r
			}
			function I(e) {
				var t = this,
					n = new le(function(e, n) {
						t.ready().then(function() {
							var r = t._dbInfo;
							r.db.transaction(function(t) {
								t.executeSql("DELETE FROM " + r.storeName, [], function() {
									e()
								}, function(e, t) {
									n(t)
								})
							})
						})["catch"](n)
					});
				return u(n, e), n
			}
			function N(e) {
				var t = this,
					n = new le(function(e, n) {
						t.ready().then(function() {
							var r = t._dbInfo;
							r.db.transaction(function(t) {
								t.executeSql("SELECT COUNT(key) as c FROM " + r.storeName, [], function(t, n) {
									var r = n.rows.item(0).c;
									e(r)
								}, function(e, t) {
									n(t)
								})
							})
						})["catch"](n)
					});
				return u(n, e), n
			}
			function W(e, t) {
				var n = this,
					r = new le(function(t, r) {
						n.ready().then(function() {
							var i = n._dbInfo;
							i.db.transaction(function(n) {
								n.executeSql("SELECT key FROM " + i.storeName + " WHERE id = ? LIMIT 1", [e + 1], function(e, n) {
									var r = n.rows.length ? n.rows.item(0).key : null;
									t(r)
								}, function(e, t) {
									r(t)
								})
							})
						})["catch"](r)
					});
				return u(r, t), r
			}
			function R(e) {
				var t = this,
					n = new le(function(e, n) {
						t.ready().then(function() {
							var r = t._dbInfo;
							r.db.transaction(function(t) {
								t.executeSql("SELECT key FROM " + r.storeName, [], function(t, n) {
									for (var r = [], i = 0; i < n.rows.length; i++) r.push(n.rows.item(i).key);
									e(r)
								}, function(e, t) {
									n(t)
								})
							})
						})["catch"](n)
					});
				return u(n, e), n
			}
			function z(e) {
				var t = this,
					n = {};
				if (e) for (var r in e) n[r] = e[r];
				return n.keyPrefix = n.name + "/", n.storeName !== t._defaultConfig.storeName && (n.keyPrefix += n.storeName + "/"), t._dbInfo = n, n.serializer = De, le.resolve()
			}
			function q(e) {
				var t = this,
					n = t.ready().then(function() {
						for (var e = t._dbInfo.keyPrefix, n = localStorage.length - 1; n >= 0; n--) {
							var r = localStorage.key(n);
							0 === r.indexOf(e) && localStorage.removeItem(r)
						}
					});
				return u(n, e), n
			}
			function J(e, t) {
				var n = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var r = n.ready().then(function() {
					var t = n._dbInfo,
						r = localStorage.getItem(t.keyPrefix + e);
					return r && (r = t.serializer.deserialize(r)), r
				});
				return u(r, t), r
			}
			function V(e, t) {
				var n = this,
					r = n.ready().then(function() {
						for (var t = n._dbInfo, r = t.keyPrefix, i = r.length, a = localStorage.length, o = 1, s = 0; a > s; s++) {
							var l = localStorage.key(s);
							if (0 === l.indexOf(r)) {
								var u = localStorage.getItem(l);
								if (u && (u = t.serializer.deserialize(u)), u = e(u, l.substring(i), o++), void 0 !== u) return u
							}
						}
					});
				return u(r, t), r
			}
			function G(e, t) {
				var n = this,
					r = n.ready().then(function() {
						var t, r = n._dbInfo;
						try {
							t = localStorage.key(e)
						} catch (i) {
							t = null
						}
						return t && (t = t.substring(r.keyPrefix.length)), t
					});
				return u(r, t), r
			}
			function K(e) {
				var t = this,
					n = t.ready().then(function() {
						for (var e = t._dbInfo, n = localStorage.length, r = [], i = 0; n > i; i++) 0 === localStorage.key(i).indexOf(e.keyPrefix) && r.push(localStorage.key(i).substring(e.keyPrefix.length));
						return r
					});
				return u(n, e), n
			}
			function X(e) {
				var t = this,
					n = t.keys().then(function(e) {
						return e.length
					});
				return u(n, e), n
			}
			function Q(e, t) {
				var n = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var r = n.ready().then(function() {
					var t = n._dbInfo;
					localStorage.removeItem(t.keyPrefix + e)
				});
				return u(r, t), r
			}
			function Z(e, t, n) {
				var r = this;
				"string" != typeof e && (console.warn(e + " used as a key, but it is not a string."), e = String(e));
				var i = r.ready().then(function() {
					void 0 === t && (t = null);
					var n = t;
					return new le(function(i, a) {
						var o = r._dbInfo;
						o.serializer.serialize(t, function(t, r) {
							if (r) a(r);
							else try {
								localStorage.setItem(o.keyPrefix + e, t), i(n)
							} catch (s) {
								"QuotaExceededError" !== s.name && "NS_ERROR_DOM_QUOTA_REACHED" !== s.name || a(s), a(s)
							}
						})
					})
				});
				return u(i, n), i
			}
			function ee(e, t, n) {
				"function" == typeof t && e.then(t), "function" == typeof n && e["catch"](n)
			}
			function te(e, t) {
				e[t] = function() {
					var n = arguments;
					return e.ready().then(function() {
						return e[t].apply(e, n)
					})
				}
			}
			function ne() {
				for (var e = 1; e < arguments.length; e++) {
					var t = arguments[e];
					if (t) for (var n in t) t.hasOwnProperty(n) && (Be(t[n]) ? arguments[0][n] = t[n].slice() : arguments[0][n] = t[n])
				}
				return arguments[0]
			}
			function re(e) {
				for (var t in Se) if (Se.hasOwnProperty(t) && Se[t] === e) return !0;
				return !1
			}
			var ie = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ?
			function(e) {
				return typeof e
			} : function(e) {
				return e && "function" == typeof Symbol && e.constructor === Symbol ? "symbol" : typeof e
			}, ae = i();
			"undefined" == typeof Promise && "undefined" != typeof e && e(3);
			var oe, se, le = Promise,
				ue = "local-forage-detect-blob-support",
				ce = {
					_driver: "asyncStorage",
					_initStorage: w,
					iterate: M,
					getItem: k,
					setItem: L,
					removeItem: F,
					clear: D,
					length: x,
					key: T,
					keys: Y
				},
				de = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
				he = "~~local_forage_type~",
				fe = /^~~local_forage_type~([^~]+)~/,
				pe = "__lfsc__:",
				me = pe.length,
				_e = "arbf",
				ge = "blob",
				ye = "si08",
				ve = "ui08",
				Ee = "uic8",
				be = "si16",
				Ue = "si32",
				we = "ur16",
				ke = "ui32",
				Me = "fl32",
				Le = "fl64",
				Fe = me + _e.length,
				De = {
					serialize: C,
					deserialize: j,
					stringToBuffer: S,
					bufferToString: A
				},
				xe = {
					_driver: "webSQLStorage",
					_initStorage: H,
					iterate: $,
					getItem: B,
					setItem: P,
					removeItem: O,
					clear: I,
					length: N,
					key: W,
					keys: R
				},
				Te = {
					_driver: "localStorageWrapper",
					_initStorage: z,
					iterate: V,
					getItem: J,
					setItem: Z,
					removeItem: Q,
					clear: q,
					length: X,
					key: G,
					keys: K
				},
				Ye = {},
				Se = {
					INDEXEDDB: "asyncStorage",
					LOCALSTORAGE: "localStorageWrapper",
					WEBSQL: "webSQLStorage"
				},
				Ae = [Se.INDEXEDDB, Se.WEBSQL, Se.LOCALSTORAGE],
				Ce = ["clear", "getItem", "iterate", "key", "keys", "length", "removeItem", "setItem"],
				je = {
					description: "",
					driver: Ae.slice(),
					name: "localforage",
					size: 4980736,
					storeName: "keyvaluepairs",
					version: 1
				},
				He = {};
			He[Se.INDEXEDDB] = a(), He[Se.WEBSQL] = o(), He[Se.LOCALSTORAGE] = s();
			var Be = Array.isArray ||
			function(e) {
				return "[object Array]" === Object.prototype.toString.call(e)
			}, $e = function() {
				function e(t) {
					r(this, e), this.INDEXEDDB = Se.INDEXEDDB, this.LOCALSTORAGE = Se.LOCALSTORAGE, this.WEBSQL = Se.WEBSQL, this._defaultConfig = ne({}, je), this._config = ne({}, this._defaultConfig, t), this._driverSet = null, this._initDriver = null, this._ready = !1, this._dbInfo = null, this._wrapLibraryMethodsWithReady(), this.setDriver(this._config.driver)
				}
				return e.prototype.config = function(e) {
					if ("object" === ("undefined" == typeof e ? "undefined" : ie(e))) {
						if (this._ready) return new Error("Can't call config() after localforage has been used.");
						for (var t in e)"storeName" === t && (e[t] = e[t].replace(/\W/g, "_")), this._config[t] = e[t];
						return "driver" in e && e.driver && this.setDriver(this._config.driver), !0
					}
					return "string" == typeof e ? this._config[e] : this._config
				}, e.prototype.defineDriver = function(e, t, n) {
					var r = new le(function(t, n) {
						try {
							var r = e._driver,
								i = new Error("Custom driver not compliant; see https://mozilla.github.io/localForage/#definedriver"),
								a = new Error("Custom driver name already in use: " + e._driver);
							if (!e._driver) return void n(i);
							if (re(e._driver)) return void n(a);
							for (var o = Ce.concat("_initStorage"), s = 0; s < o.length; s++) {
								var l = o[s];
								if (!l || !e[l] || "function" != typeof e[l]) return void n(i)
							}
							var u = le.resolve(!0);
							"_support" in e && (u = e._support && "function" == typeof e._support ? e._support() : le.resolve( !! e._support)), u.then(function(n) {
								He[r] = n, Ye[r] = e, t()
							}, n)
						} catch (c) {
							n(c)
						}
					});
					return ee(r, t, n), r
				}, e.prototype.driver = function() {
					return this._driver || null
				}, e.prototype.getDriver = function(e, t, n) {
					var r = this,
						i = le.resolve().then(function() {
							if (!re(e)) {
								if (Ye[e]) return Ye[e];
								throw new Error("Driver not found.")
							}
							switch (e) {
							case r.INDEXEDDB:
								return ce;
							case r.LOCALSTORAGE:
								return Te;
							case r.WEBSQL:
								return xe
							}
						});
					return ee(i, t, n), i
				}, e.prototype.getSerializer = function(e) {
					var t = le.resolve(De);
					return ee(t, e), t
				}, e.prototype.ready = function(e) {
					var t = this,
						n = t._driverSet.then(function() {
							return null === t._ready && (t._ready = t._initDriver()), t._ready
						});
					return ee(n, e, e), n
				}, e.prototype.setDriver = function(e, t, n) {
					function r() {
						a._config.driver = a.driver()
					}
					function i(e) {
						return function() {
							function t() {
								for (; n < e.length;) {
									var i = e[n];
									return n++, a._dbInfo = null, a._ready = null, a.getDriver(i).then(function(e) {
										return a._extend(e), r(), a._ready = a._initStorage(a._config), a._ready
									})["catch"](t)
								}
								r();
								var o = new Error("No available storage method found.");
								return a._driverSet = le.reject(o), a._driverSet
							}
							var n = 0;
							return t()
						}
					}
					var a = this;
					Be(e) || (e = [e]);
					var o = this._getSupportedDrivers(e),
						s = null !== this._driverSet ? this._driverSet["catch"](function() {
							return le.resolve()
						}) : le.resolve();
					return this._driverSet = s.then(function() {
						var e = o[0];
						return a._dbInfo = null, a._ready = null, a.getDriver(e).then(function(e) {
							a._driver = e._driver, r(), a._wrapLibraryMethodsWithReady(), a._initDriver = i(o)
						})
					})["catch"](function() {
						r();
						var e = new Error("No available storage method found.");
						return a._driverSet = le.reject(e), a._driverSet
					}), ee(this._driverSet, t, n), this._driverSet
				}, e.prototype.supports = function(e) {
					return !!He[e]
				}, e.prototype._extend = function(e) {
					ne(this, e)
				}, e.prototype._getSupportedDrivers = function(e) {
					for (var t = [], n = 0, r = e.length; r > n; n++) {
						var i = e[n];
						this.supports(i) && t.push(i)
					}
					return t
				}, e.prototype._wrapLibraryMethodsWithReady = function() {
					for (var e = 0; e < Ce.length; e++) te(this, Ce[e])
				}, e.prototype.createInstance = function(t) {
					return new e(t)
				}, e
			}(), Pe = new $e;
			t.exports = Pe
		}, {
			3: 3
		}]
	}, {}, [4])(4)
}), function(e, t) {
	var n = "function" == typeof define,
		r = "undefined" != typeof module && module.exports;
	n ? define(t) : r ? module.exports = t() : this[e] = t()
}("jEmoji", function() {
	function e(e) {
		var t = Object.keys(e);
		return t.sort(function(e, t) {
			return t.length - e.length
		}), new RegExp("(" + t.join("|") + ")", "g")
	}
	function t(e) {
		return e.replace(o.EMOJI_RE(), function(e, t) {
			var n = s[t];
			return '<span class="emoji emoji' + n[2] + '" title="' + n[1] + '"></span>'
		})
	}
	function n(e) {
		return e.replace(o.EMOJI_DOCOMO_RE(), function(e, t) {
			return u[t]
		})
	}
	function r(e) {
		return e.replace(o.EMOJI_KDDI_RE(), function(e, t) {
			return c[t]
		})
	}
	function i(e) {
		return e.replace(o.EMOJI_SOFTBANK_RE(), function(e, t) {
			return d[t]
		})
	}
	function a(e) {
		return e.replace(o.EMOJI_GOOGLE_RE(), function(e, t) {
			return h[t]
		})
	}
	var o = {
		EMOJI_RE: function() {
			return l || (l = e(s))
		},
		EMOJI_DOCOMO_RE: function() {
			return E || (E = e(u))
		},
		EMOJI_KDDI_RE: function() {
			return b || (b = e(c))
		},
		EMOJI_SOFTBANK_RE: function() {
			return U || (U = e(d))
		},
		EMOJI_GOOGLE_RE: function() {
			return w || (w = e(h))
		}
	},
		s = o.EMOJI_MAP = {
			"👬": ["U+1F46C", "man and man holding hands", "1f46c", ["-", "-"],
				["-", "-"],
				["", "U+E428"],
				["󾆠", "U+FE1A0"]
			],
			"👭": ["U+1F46D", "woman and woman holding hands", "1f46d", ["-", "-"],
				["-", "-"],
				["", "U+E428"],
				["󾆠", "U+FE1A0"]
			],
			"🌲": ["U+1F332", "evergreen tree", "1f332", ["-", "-"],
				["", "U+EB49"],
				["", "U+E305"],
				["󾁍", "U+FE04D"]
			],
			"🌳": ["U+1F333", "deciduous tree", "1f333", ["-", "-"],
				["", "U+EB49"],
				["", "U+E305"],
				["󾁍", "U+FE04D"]
			],
			"🍋": ["U+1F34B", "lemon", "1f34b", ["-", "-"],
				["", "U+EABA"],
				["", "U+E346"],
				["󾁒", "U+FE052"]
			],
			"😎": ["U+1F60E", "smiling face with sunglasses", "1f60e", ["", "U+E726"],
				["", "U+E5C4"],
				["", "U+E106"],
				["󾌧", "U+FE327"]
			],
			"😀": ["U+1F600", "grinning face", "1f600", ["", "U+E753"],
				["", "U+EB80"],
				["", "U+E404"],
				["󾌳", "U+FE333"]
			],
			"☁": ["U+2601", "cloud", "2601", ["", "U+E63F"],
				["", "U+E48D"],
				["", "U+E049"],
				["󾀁", "U+FE001"]
			],
			"☔": ["U+2614", "umbrella with rain drops", "2614", ["", "U+E640"],
				["", "U+E48C"],
				["", "U+E04B"],
				["󾀂", "U+FE002"]
			],
			"⛄": ["U+26C4", "snowman without snow", "26c4", ["", "U+E641"],
				["", "U+E485"],
				["", "U+E048"],
				["󾀃", "U+FE003"]
			],
			"⚡": ["U+26A1", "high voltage sign", "26a1", ["", "U+E642"],
				["", "U+E487"],
				["", "U+E13D"],
				["󾀄", "U+FE004"]
			],
			"🌀": ["U+1F300", "cyclone", "1f300", ["", "U+E643"],
				["", "U+E469"],
				["", "U+E443"],
				["󾀅", "U+FE005"]
			],
			"🌁": ["U+1F301", "foggy", "1f301", ["", "U+E644"],
				["", "U+E598"],
				["-", "-"],
				["󾀆", "U+FE006"]
			],
			"🌂": ["U+1F302", "closed umbrella", "1f302", ["", "U+E645"],
				["", "U+EAE8"],
				["", "U+E43C"],
				["󾀇", "U+FE007"]
			],
			"🌃": ["U+1F303", "night with stars", "1f303", ["", "U+E6B3"],
				["", "U+EAF1"],
				["", "U+E44B"],
				["󾀈", "U+FE008"]
			],
			"🌄": ["U+1F304", "sunrise over mountains", "1f304", ["", "U+E63E"],
				["", "U+EAF4"],
				["", "U+E04D"],
				["󾀉", "U+FE009"]
			],
			"🌅": ["U+1F305", "sunrise", "1f305", ["", "U+E63E"],
				["", "U+EAF4"],
				["", "U+E449"],
				["󾀊", "U+FE00A"]
			],
			"🌆": ["U+1F306", "cityscape at dusk", "1f306", ["-", "-"],
				["", "U+E5DA"],
				["", "U+E146"],
				["󾀋", "U+FE00B"]
			],
			"🌇": ["U+1F307", "sunset over buildings", "1f307", ["", "U+E63E"],
				["", "U+E5DA"],
				["", "U+E44A"],
				["󾀌", "U+FE00C"]
			],
			"🌈": ["U+1F308", "rainbow", "1f308", ["-", "-"],
				["", "U+EAF2"],
				["", "U+E44C"],
				["󾀍", "U+FE00D"]
			],
			"❄": ["U+2744", "snowflake", "2744", ["-", "-"],
				["", "U+E48A"],
				["-", "-"],
				["󾀎", "U+FE00E"]
			],
			"⛅": ["U+26C5", "sun behind cloud", "26c5", ["", "U+E63E U+E63F"],
				["", "U+E48E"],
				["", "U+E04A U+E049"],
				["󾀏", "U+FE00F"]
			],
			"🌉": ["U+1F309", "bridge at night", "1f309", ["", "U+E6B3"],
				["", "U+E4BF"],
				["", "U+E44B"],
				["󾀐", "U+FE010"]
			],
			"🌊": ["U+1F30A", "water wave", "1f30a", ["", "U+E73F"],
				["", "U+EB7C"],
				["", "U+E43E"],
				["󾀸", "U+FE038"]
			],
			"🌋": ["U+1F30B", "volcano", "1f30b", ["-", "-"],
				["", "U+EB53"],
				["-", "-"],
				["󾀺", "U+FE03A"]
			],
			"🌌": ["U+1F30C", "milky way", "1f30c", ["", "U+E6B3"],
				["", "U+EB5F"],
				["", "U+E44B"],
				["󾀻", "U+FE03B"]
			],
			"🌏": ["U+1F30F", "earth globe asia-australia", "1f30f", ["-", "-"],
				["", "U+E5B3"],
				["-", "-"],
				["󾀹", "U+FE039"]
			],
			"🌑": ["U+1F311", "new moon symbol", "1f311", ["", "U+E69C"],
				["", "U+E5A8"],
				["-", "-"],
				["󾀑", "U+FE011"]
			],
			"🌔": ["U+1F314", "waxing gibbous moon symbol", "1f314", ["", "U+E69D"],
				["", "U+E5A9"],
				["", "U+E04C"],
				["󾀒", "U+FE012"]
			],
			"🌓": ["U+1F313", "first quarter moon symbol", "1f313", ["", "U+E69E"],
				["", "U+E5AA"],
				["", "U+E04C"],
				["󾀓", "U+FE013"]
			],
			"🌙": ["U+1F319", "crescent moon", "1f319", ["", "U+E69F"],
				["", "U+E486"],
				["", "U+E04C"],
				["󾀔", "U+FE014"]
			],
			"🌕": ["U+1F315", "full moon symbol", "1f315", ["", "U+E6A0"],
				["-", "-"],
				["-", "-"],
				["󾀕", "U+FE015"]
			],
			"🌛": ["U+1F31B", "first quarter moon with face", "1f31b", ["", "U+E69E"],
				["", "U+E489"],
				["", "U+E04C"],
				["󾀖", "U+FE016"]
			],
			"🌟": ["U+1F31F", "glowing star", "1f31f", ["-", "-"],
				["", "U+E48B"],
				["", "U+E335"],
				["󾭩", "U+FEB69"]
			],
			"🌠": ["U+1F320", "shooting star", "1f320", ["-", "-"],
				["", "U+E468"],
				["-", "-"],
				["󾭪", "U+FEB6A"]
			],
			"🕐": ["U+1F550", "clock face one oclock", "1f550", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E024"],
				["󾀞", "U+FE01E"]
			],
			"🕑": ["U+1F551", "clock face two oclock", "1f551", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E025"],
				["󾀟", "U+FE01F"]
			],
			"🕒": ["U+1F552", "clock face three oclock", "1f552", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E026"],
				["󾀠", "U+FE020"]
			],
			"🕓": ["U+1F553", "clock face four oclock", "1f553", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E027"],
				["󾀡", "U+FE021"]
			],
			"🕔": ["U+1F554", "clock face five oclock", "1f554", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E028"],
				["󾀢", "U+FE022"]
			],
			"🕕": ["U+1F555", "clock face six oclock", "1f555", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E029"],
				["󾀣", "U+FE023"]
			],
			"🕖": ["U+1F556", "clock face seven oclock", "1f556", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E02A"],
				["󾀤", "U+FE024"]
			],
			"🕗": ["U+1F557", "clock face eight oclock", "1f557", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E02B"],
				["󾀥", "U+FE025"]
			],
			"🕘": ["U+1F558", "clock face nine oclock", "1f558", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E02C"],
				["󾀦", "U+FE026"]
			],
			"🕙": ["U+1F559", "clock face ten oclock", "1f559", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E02D"],
				["󾀧", "U+FE027"]
			],
			"🕚": ["U+1F55A", "clock face eleven oclock", "1f55a", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E02E"],
				["󾀨", "U+FE028"]
			],
			"🕛": ["U+1F55B", "clock face twelve oclock", "1f55b", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E02F"],
				["󾀩", "U+FE029"]
			],
			"⌚": ["U+231A", "watch", "231a", ["", "U+E71F"],
				["", "U+E57A"],
				["-", "-"],
				["󾀝", "U+FE01D"]
			],
			"⌛": ["U+231B", "hourglass", "231b", ["", "U+E71C"],
				["", "U+E57B"],
				["-", "-"],
				["󾀜", "U+FE01C"]
			],
			"⏰": ["U+23F0", "alarm clock", "23f0", ["", "U+E6BA"],
				["", "U+E594"],
				["", "U+E02D"],
				["󾀪", "U+FE02A"]
			],
			"⏳": ["U+23F3", "hourglass with flowing sand", "23f3", ["", "U+E71C"],
				["", "U+E47C"],
				["-", "-"],
				["󾀛", "U+FE01B"]
			],
			"♈": ["U+2648", "aries", "2648", ["", "U+E646"],
				["", "U+E48F"],
				["", "U+E23F"],
				["󾀫", "U+FE02B"]
			],
			"♉": ["U+2649", "taurus", "2649", ["", "U+E647"],
				["", "U+E490"],
				["", "U+E240"],
				["󾀬", "U+FE02C"]
			],
			"♊": ["U+264A", "gemini", "264a", ["", "U+E648"],
				["", "U+E491"],
				["", "U+E241"],
				["󾀭", "U+FE02D"]
			],
			"♋": ["U+264B", "cancer", "264b", ["", "U+E649"],
				["", "U+E492"],
				["", "U+E242"],
				["󾀮", "U+FE02E"]
			],
			"♌": ["U+264C", "leo", "264c", ["", "U+E64A"],
				["", "U+E493"],
				["", "U+E243"],
				["󾀯", "U+FE02F"]
			],
			"♍": ["U+264D", "virgo", "264d", ["", "U+E64B"],
				["", "U+E494"],
				["", "U+E244"],
				["󾀰", "U+FE030"]
			],
			"♎": ["U+264E", "libra", "264e", ["", "U+E64C"],
				["", "U+E495"],
				["", "U+E245"],
				["󾀱", "U+FE031"]
			],
			"♏": ["U+264F", "scorpius", "264f", ["", "U+E64D"],
				["", "U+E496"],
				["", "U+E246"],
				["󾀲", "U+FE032"]
			],
			"♐": ["U+2650", "sagittarius", "2650", ["", "U+E64E"],
				["", "U+E497"],
				["", "U+E247"],
				["󾀳", "U+FE033"]
			],
			"♑": ["U+2651", "capricorn", "2651", ["", "U+E64F"],
				["", "U+E498"],
				["", "U+E248"],
				["󾀴", "U+FE034"]
			],
			"♒": ["U+2652", "aquarius", "2652", ["", "U+E650"],
				["", "U+E499"],
				["", "U+E249"],
				["󾀵", "U+FE035"]
			],
			"♓": ["U+2653", "pisces", "2653", ["", "U+E651"],
				["", "U+E49A"],
				["", "U+E24A"],
				["󾀶", "U+FE036"]
			],
			"⛎": ["U+26CE", "ophiuchus", "26ce", ["-", "-"],
				["", "U+E49B"],
				["", "U+E24B"],
				["󾀷", "U+FE037"]
			],
			"🍀": ["U+1F340", "four leaf clover", "1f340", ["", "U+E741"],
				["", "U+E513"],
				["", "U+E110"],
				["󾀼", "U+FE03C"]
			],
			"🌷": ["U+1F337", "tulip", "1f337", ["", "U+E743"],
				["", "U+E4E4"],
				["", "U+E304"],
				["󾀽", "U+FE03D"]
			],
			"🌱": ["U+1F331", "seedling", "1f331", ["", "U+E746"],
				["", "U+EB7D"],
				["", "U+E110"],
				["󾀾", "U+FE03E"]
			],
			"🍁": ["U+1F341", "maple leaf", "1f341", ["", "U+E747"],
				["", "U+E4CE"],
				["", "U+E118"],
				["󾀿", "U+FE03F"]
			],
			"🌸": ["U+1F338", "cherry blossom", "1f338", ["", "U+E748"],
				["", "U+E4CA"],
				["", "U+E030"],
				["󾁀", "U+FE040"]
			],
			"🌹": ["U+1F339", "rose", "1f339", ["-", "-"],
				["", "U+E5BA"],
				["", "U+E032"],
				["󾁁", "U+FE041"]
			],
			"🍂": ["U+1F342", "fallen leaf", "1f342", ["", "U+E747"],
				["", "U+E5CD"],
				["", "U+E119"],
				["󾁂", "U+FE042"]
			],
			"🍃": ["U+1F343", "leaf fluttering in wind", "1f343", ["-", "-"],
				["", "U+E5CD"],
				["", "U+E447"],
				["󾁃", "U+FE043"]
			],
			"🌺": ["U+1F33A", "hibiscus", "1f33a", ["-", "-"],
				["", "U+EA94"],
				["", "U+E303"],
				["󾁅", "U+FE045"]
			],
			"🌻": ["U+1F33B", "sunflower", "1f33b", ["-", "-"],
				["", "U+E4E3"],
				["", "U+E305"],
				["󾁆", "U+FE046"]
			],
			"🌴": ["U+1F334", "palm tree", "1f334", ["-", "-"],
				["", "U+E4E2"],
				["", "U+E307"],
				["󾁇", "U+FE047"]
			],
			"🌵": ["U+1F335", "cactus", "1f335", ["-", "-"],
				["", "U+EA96"],
				["", "U+E308"],
				["󾁈", "U+FE048"]
			],
			"🌾": ["U+1F33E", "ear of rice", "1f33e", ["-", "-"],
				["-", "-"],
				["", "U+E444"],
				["󾁉", "U+FE049"]
			],
			"🌽": ["U+1F33D", "ear of maize", "1f33d", ["-", "-"],
				["", "U+EB36"],
				["-", "-"],
				["󾁊", "U+FE04A"]
			],
			"🍄": ["U+1F344", "mushroom", "1f344", ["-", "-"],
				["", "U+EB37"],
				["-", "-"],
				["󾁋", "U+FE04B"]
			],
			"🌰": ["U+1F330", "chestnut", "1f330", ["-", "-"],
				["", "U+EB38"],
				["-", "-"],
				["󾁌", "U+FE04C"]
			],
			"🌼": ["U+1F33C", "blossom", "1f33c", ["-", "-"],
				["", "U+EB49"],
				["", "U+E305"],
				["󾁍", "U+FE04D"]
			],
			"🌿": ["U+1F33F", "herb", "1f33f", ["", "U+E741"],
				["", "U+EB82"],
				["", "U+E110"],
				["󾁎", "U+FE04E"]
			],
			"🍒": ["U+1F352", "cherries", "1f352", ["", "U+E742"],
				["", "U+E4D2"],
				["-", "-"],
				["󾁏", "U+FE04F"]
			],
			"🍌": ["U+1F34C", "banana", "1f34c", ["", "U+E744"],
				["", "U+EB35"],
				["-", "-"],
				["󾁐", "U+FE050"]
			],
			"🍎": ["U+1F34E", "red apple", "1f34e", ["", "U+E745"],
				["", "U+EAB9"],
				["", "U+E345"],
				["󾁑", "U+FE051"]
			],
			"🍊": ["U+1F34A", "tangerine", "1f34a", ["-", "-"],
				["", "U+EABA"],
				["", "U+E346"],
				["󾁒", "U+FE052"]
			],
			"🍓": ["U+1F353", "strawberry", "1f353", ["-", "-"],
				["", "U+E4D4"],
				["", "U+E347"],
				["󾁓", "U+FE053"]
			],
			"🍉": ["U+1F349", "watermelon", "1f349", ["-", "-"],
				["", "U+E4CD"],
				["", "U+E348"],
				["󾁔", "U+FE054"]
			],
			"🍅": ["U+1F345", "tomato", "1f345", ["-", "-"],
				["", "U+EABB"],
				["", "U+E349"],
				["󾁕", "U+FE055"]
			],
			"🍆": ["U+1F346", "aubergine", "1f346", ["-", "-"],
				["", "U+EABC"],
				["", "U+E34A"],
				["󾁖", "U+FE056"]
			],
			"🍈": ["U+1F348", "melon", "1f348", ["-", "-"],
				["", "U+EB32"],
				["-", "-"],
				["󾁗", "U+FE057"]
			],
			"🍍": ["U+1F34D", "pineapple", "1f34d", ["-", "-"],
				["", "U+EB33"],
				["-", "-"],
				["󾁘", "U+FE058"]
			],
			"🍇": ["U+1F347", "grapes", "1f347", ["-", "-"],
				["", "U+EB34"],
				["-", "-"],
				["󾁙", "U+FE059"]
			],
			"🍑": ["U+1F351", "peach", "1f351", ["-", "-"],
				["", "U+EB39"],
				["-", "-"],
				["󾁚", "U+FE05A"]
			],
			"🍏": ["U+1F34F", "green apple", "1f34f", ["", "U+E745"],
				["", "U+EB5A"],
				["", "U+E345"],
				["󾁛", "U+FE05B"]
			],
			"👀": ["U+1F440", "eyes", "1f440", ["", "U+E691"],
				["", "U+E5A4"],
				["", "U+E419"],
				["󾆐", "U+FE190"]
			],
			"👂": ["U+1F442", "ear", "1f442", ["", "U+E692"],
				["", "U+E5A5"],
				["", "U+E41B"],
				["󾆑", "U+FE191"]
			],
			"👃": ["U+1F443", "nose", "1f443", ["-", "-"],
				["", "U+EAD0"],
				["", "U+E41A"],
				["󾆒", "U+FE192"]
			],
			"👄": ["U+1F444", "mouth", "1f444", ["", "U+E6F9"],
				["", "U+EAD1"],
				["", "U+E41C"],
				["󾆓", "U+FE193"]
			],
			"👅": ["U+1F445", "tongue", "1f445", ["", "U+E728"],
				["", "U+EB47"],
				["", "U+E409"],
				["󾆔", "U+FE194"]
			],
			"💄": ["U+1F484", "lipstick", "1f484", ["", "U+E710"],
				["", "U+E509"],
				["", "U+E31C"],
				["󾆕", "U+FE195"]
			],
			"💅": ["U+1F485", "nail polish", "1f485", ["-", "-"],
				["", "U+EAA0"],
				["", "U+E31D"],
				["󾆖", "U+FE196"]
			],
			"💆": ["U+1F486", "face massage", "1f486", ["-", "-"],
				["", "U+E50B"],
				["", "U+E31E"],
				["󾆗", "U+FE197"]
			],
			"💇": ["U+1F487", "haircut", "1f487", ["", "U+E675"],
				["", "U+EAA1"],
				["", "U+E31F"],
				["󾆘", "U+FE198"]
			],
			"💈": ["U+1F488", "barber pole", "1f488", ["-", "-"],
				["", "U+EAA2"],
				["", "U+E320"],
				["󾆙", "U+FE199"]
			],
			"👤": ["U+1F464", "bust in silhouette", "1f464", ["", "U+E6B1"],
				["-", "-"],
				["-", "-"],
				["󾆚", "U+FE19A"]
			],
			"👦": ["U+1F466", "boy", "1f466", ["", "U+E6F0"],
				["", "U+E4FC"],
				["", "U+E001"],
				["󾆛", "U+FE19B"]
			],
			"👧": ["U+1F467", "girl", "1f467", ["", "U+E6F0"],
				["", "U+E4FA"],
				["", "U+E002"],
				["󾆜", "U+FE19C"]
			],
			"👨": ["U+1F468", "man", "1f468", ["", "U+E6F0"],
				["", "U+E4FC"],
				["", "U+E004"],
				["󾆝", "U+FE19D"]
			],
			"👩": ["U+1F469", "woman", "1f469", ["", "U+E6F0"],
				["", "U+E4FA"],
				["", "U+E005"],
				["󾆞", "U+FE19E"]
			],
			"👪": ["U+1F46A", "family", "1f46a", ["-", "-"],
				["", "U+E501"],
				["-", "-"],
				["󾆟", "U+FE19F"]
			],
			"👫": ["U+1F46B", "man and woman holding hands", "1f46b", ["-", "-"],
				["-", "-"],
				["", "U+E428"],
				["󾆠", "U+FE1A0"]
			],
			"👮": ["U+1F46E", "police officer", "1f46e", ["-", "-"],
				["", "U+E5DD"],
				["", "U+E152"],
				["󾆡", "U+FE1A1"]
			],
			"👯": ["U+1F46F", "woman with bunny ears", "1f46f", ["-", "-"],
				["", "U+EADB"],
				["", "U+E429"],
				["󾆢", "U+FE1A2"]
			],
			"👰": ["U+1F470", "bride with veil", "1f470", ["-", "-"],
				["", "U+EAE9"],
				["-", "-"],
				["󾆣", "U+FE1A3"]
			],
			"👱": ["U+1F471", "person with blond hair", "1f471", ["-", "-"],
				["", "U+EB13"],
				["", "U+E515"],
				["󾆤", "U+FE1A4"]
			],
			"👲": ["U+1F472", "man with gua pi mao", "1f472", ["-", "-"],
				["", "U+EB14"],
				["", "U+E516"],
				["󾆥", "U+FE1A5"]
			],
			"👳": ["U+1F473", "man with turban", "1f473", ["-", "-"],
				["", "U+EB15"],
				["", "U+E517"],
				["󾆦", "U+FE1A6"]
			],
			"👴": ["U+1F474", "older man", "1f474", ["-", "-"],
				["", "U+EB16"],
				["", "U+E518"],
				["󾆧", "U+FE1A7"]
			],
			"👵": ["U+1F475", "older woman", "1f475", ["-", "-"],
				["", "U+EB17"],
				["", "U+E519"],
				["󾆨", "U+FE1A8"]
			],
			"👶": ["U+1F476", "baby", "1f476", ["-", "-"],
				["", "U+EB18"],
				["", "U+E51A"],
				["󾆩", "U+FE1A9"]
			],
			"👷": ["U+1F477", "construction worker", "1f477", ["-", "-"],
				["", "U+EB19"],
				["", "U+E51B"],
				["󾆪", "U+FE1AA"]
			],
			"👸": ["U+1F478", "princess", "1f478", ["-", "-"],
				["", "U+EB1A"],
				["", "U+E51C"],
				["󾆫", "U+FE1AB"]
			],
			"👹": ["U+1F479", "japanese ogre", "1f479", ["-", "-"],
				["", "U+EB44"],
				["-", "-"],
				["󾆬", "U+FE1AC"]
			],
			"👺": ["U+1F47A", "japanese goblin", "1f47a", ["-", "-"],
				["", "U+EB45"],
				["-", "-"],
				["󾆭", "U+FE1AD"]
			],
			"👻": ["U+1F47B", "ghost", "1f47b", ["-", "-"],
				["", "U+E4CB"],
				["", "U+E11B"],
				["󾆮", "U+FE1AE"]
			],
			"👼": ["U+1F47C", "baby angel", "1f47c", ["-", "-"],
				["", "U+E5BF"],
				["", "U+E04E"],
				["󾆯", "U+FE1AF"]
			],
			"👽": ["U+1F47D", "extraterrestrial alien", "1f47d", ["-", "-"],
				["", "U+E50E"],
				["", "U+E10C"],
				["󾆰", "U+FE1B0"]
			],
			"👾": ["U+1F47E", "alien monster", "1f47e", ["-", "-"],
				["", "U+E4EC"],
				["", "U+E12B"],
				["󾆱", "U+FE1B1"]
			],
			"👿": ["U+1F47F", "imp", "1f47f", ["-", "-"],
				["", "U+E4EF"],
				["", "U+E11A"],
				["󾆲", "U+FE1B2"]
			],
			"💀": ["U+1F480", "skull", "1f480", ["-", "-"],
				["", "U+E4F8"],
				["", "U+E11C"],
				["󾆳", "U+FE1B3"]
			],
			"💁": ["U+1F481", "information desk person", "1f481", ["-", "-"],
				["-", "-"],
				["", "U+E253"],
				["󾆴", "U+FE1B4"]
			],
			"💂": ["U+1F482", "guardsman", "1f482", ["-", "-"],
				["-", "-"],
				["", "U+E51E"],
				["󾆵", "U+FE1B5"]
			],
			"💃": ["U+1F483", "dancer", "1f483", ["-", "-"],
				["", "U+EB1C"],
				["", "U+E51F"],
				["󾆶", "U+FE1B6"]
			],
			"🐌": ["U+1F40C", "snail", "1f40c", ["", "U+E74E"],
				["", "U+EB7E"],
				["-", "-"],
				["󾆹", "U+FE1B9"]
			],
			"🐍": ["U+1F40D", "snake", "1f40d", ["-", "-"],
				["", "U+EB22"],
				["", "U+E52D"],
				["󾇓", "U+FE1D3"]
			],
			"🐎": ["U+1F40E", "horse", "1f40e", ["", "U+E754"],
				["", "U+E4D8"],
				["", "U+E134"],
				["󾟜", "U+FE7DC"]
			],
			"🐊": ["U+1F40A", "crocodile", "1f40a", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐋": ["U+1F40B", "whale", "1f40b", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐉": ["U+1F409", "dragon", "1f409", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐈": ["U+1F408", "cat", "1f408", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐇": ["U+1F407", "rabbit", "1f407", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐆": ["U+1F406", "leopard", "1f406", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐅": ["U+1F405", "tiger", "1f405", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐄": ["U+1F404", "cow", "1f404", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐃": ["U+1F403", "water buffalo", "1f403", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐂": ["U+1F402", "ox", "1f402", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐁": ["U+1F401", "mouse", "1f401", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐀": ["U+1F400", "rat", "1f400", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐔": ["U+1F414", "chicken", "1f414", ["-", "-"],
				["", "U+EB23"],
				["", "U+E52E"],
				["󾇔", "U+FE1D4"]
			],
			"🐗": ["U+1F417", "boar", "1f417", ["-", "-"],
				["", "U+EB24"],
				["", "U+E52F"],
				["󾇕", "U+FE1D5"]
			],
			"🐫": ["U+1F42B", "bactrian camel", "1f42b", ["-", "-"],
				["", "U+EB25"],
				["", "U+E530"],
				["󾇖", "U+FE1D6"]
			],
			"🐘": ["U+1F418", "elephant", "1f418", ["-", "-"],
				["", "U+EB1F"],
				["", "U+E526"],
				["󾇌", "U+FE1CC"]
			],
			"🐨": ["U+1F428", "koala", "1f428", ["-", "-"],
				["", "U+EB20"],
				["", "U+E527"],
				["󾇍", "U+FE1CD"]
			],
			"🐒": ["U+1F412", "monkey", "1f412", ["-", "-"],
				["", "U+E4D9"],
				["", "U+E528"],
				["󾇎", "U+FE1CE"]
			],
			"🐑": ["U+1F411", "sheep", "1f411", ["-", "-"],
				["", "U+E48F"],
				["", "U+E529"],
				["󾇏", "U+FE1CF"]
			],
			"🐙": ["U+1F419", "octopus", "1f419", ["-", "-"],
				["", "U+E5C7"],
				["", "U+E10A"],
				["󾇅", "U+FE1C5"]
			],
			"🐚": ["U+1F41A", "spiral shell", "1f41a", ["-", "-"],
				["", "U+EAEC"],
				["", "U+E441"],
				["󾇆", "U+FE1C6"]
			],
			"🐛": ["U+1F41B", "bug", "1f41b", ["-", "-"],
				["", "U+EB1E"],
				["", "U+E525"],
				["󾇋", "U+FE1CB"]
			],
			"🐜": ["U+1F41C", "ant", "1f41c", ["-", "-"],
				["", "U+E4DD"],
				["-", "-"],
				["󾇚", "U+FE1DA"]
			],
			"🐝": ["U+1F41D", "honeybee", "1f41d", ["-", "-"],
				["", "U+EB57"],
				["-", "-"],
				["󾇡", "U+FE1E1"]
			],
			"🐞": ["U+1F41E", "lady beetle", "1f41e", ["-", "-"],
				["", "U+EB58"],
				["-", "-"],
				["󾇢", "U+FE1E2"]
			],
			"🐠": ["U+1F420", "tropical fish", "1f420", ["", "U+E751"],
				["", "U+EB1D"],
				["", "U+E522"],
				["󾇉", "U+FE1C9"]
			],
			"🐡": ["U+1F421", "blowfish", "1f421", ["", "U+E751"],
				["", "U+E4D3"],
				["", "U+E019"],
				["󾇙", "U+FE1D9"]
			],
			"🐢": ["U+1F422", "turtle", "1f422", ["-", "-"],
				["", "U+E5D4"],
				["-", "-"],
				["󾇜", "U+FE1DC"]
			],
			"🐤": ["U+1F424", "baby chick", "1f424", ["", "U+E74F"],
				["", "U+E4E0"],
				["", "U+E523"],
				["󾆺", "U+FE1BA"]
			],
			"🐥": ["U+1F425", "front-facing baby chick", "1f425", ["", "U+E74F"],
				["", "U+EB76"],
				["", "U+E523"],
				["󾆻", "U+FE1BB"]
			],
			"🐦": ["U+1F426", "bird", "1f426", ["", "U+E74F"],
				["", "U+E4E0"],
				["", "U+E521"],
				["󾇈", "U+FE1C8"]
			],
			"🐣": ["U+1F423", "hatching chick", "1f423", ["", "U+E74F"],
				["", "U+E5DB"],
				["", "U+E523"],
				["󾇝", "U+FE1DD"]
			],
			"🐧": ["U+1F427", "penguin", "1f427", ["", "U+E750"],
				["", "U+E4DC"],
				["", "U+E055"],
				["󾆼", "U+FE1BC"]
			],
			"🐩": ["U+1F429", "poodle", "1f429", ["", "U+E6A1"],
				["", "U+E4DF"],
				["", "U+E052"],
				["󾇘", "U+FE1D8"]
			],
			"🐟": ["U+1F41F", "fish", "1f41f", ["", "U+E751"],
				["", "U+E49A"],
				["", "U+E019"],
				["󾆽", "U+FE1BD"]
			],
			"🐬": ["U+1F42C", "dolphin", "1f42c", ["-", "-"],
				["", "U+EB1B"],
				["", "U+E520"],
				["󾇇", "U+FE1C7"]
			],
			"🐭": ["U+1F42D", "mouse face", "1f42d", ["-", "-"],
				["", "U+E5C2"],
				["", "U+E053"],
				["󾇂", "U+FE1C2"]
			],
			"🐯": ["U+1F42F", "tiger face", "1f42f", ["-", "-"],
				["", "U+E5C0"],
				["", "U+E050"],
				["󾇀", "U+FE1C0"]
			],
			"🐱": ["U+1F431", "cat face", "1f431", ["", "U+E6A2"],
				["", "U+E4DB"],
				["", "U+E04F"],
				["󾆸", "U+FE1B8"]
			],
			"🐳": ["U+1F433", "spouting whale", "1f433", ["-", "-"],
				["", "U+E470"],
				["", "U+E054"],
				["󾇃", "U+FE1C3"]
			],
			"🐴": ["U+1F434", "horse face", "1f434", ["", "U+E754"],
				["", "U+E4D8"],
				["", "U+E01A"],
				["󾆾", "U+FE1BE"]
			],
			"🐵": ["U+1F435", "monkey face", "1f435", ["-", "-"],
				["", "U+E4D9"],
				["", "U+E109"],
				["󾇄", "U+FE1C4"]
			],
			"🐶": ["U+1F436", "dog face", "1f436", ["", "U+E6A1"],
				["", "U+E4E1"],
				["", "U+E052"],
				["󾆷", "U+FE1B7"]
			],
			"🐷": ["U+1F437", "pig face", "1f437", ["", "U+E755"],
				["", "U+E4DE"],
				["", "U+E10B"],
				["󾆿", "U+FE1BF"]
			],
			"🐻": ["U+1F43B", "bear face", "1f43b", ["-", "-"],
				["", "U+E5C1"],
				["", "U+E051"],
				["󾇁", "U+FE1C1"]
			],
			"🐹": ["U+1F439", "hamster face", "1f439", ["-", "-"],
				["-", "-"],
				["", "U+E524"],
				["󾇊", "U+FE1CA"]
			],
			"🐺": ["U+1F43A", "wolf face", "1f43a", ["", "U+E6A1"],
				["", "U+E4E1"],
				["", "U+E52A"],
				["󾇐", "U+FE1D0"]
			],
			"🐮": ["U+1F42E", "cow face", "1f42e", ["-", "-"],
				["", "U+EB21"],
				["", "U+E52B"],
				["󾇑", "U+FE1D1"]
			],
			"🐰": ["U+1F430", "rabbit face", "1f430", ["-", "-"],
				["", "U+E4D7"],
				["", "U+E52C"],
				["󾇒", "U+FE1D2"]
			],
			"🐸": ["U+1F438", "frog face", "1f438", ["-", "-"],
				["", "U+E4DA"],
				["", "U+E531"],
				["󾇗", "U+FE1D7"]
			],
			"🐾": ["U+1F43E", "paw prints", "1f43e", ["", "U+E698"],
				["", "U+E4EE"],
				["", "U+E536"],
				["󾇛", "U+FE1DB"]
			],
			"🐲": ["U+1F432", "dragon face", "1f432", ["-", "-"],
				["", "U+EB3F"],
				["-", "-"],
				["󾇞", "U+FE1DE"]
			],
			"🐼": ["U+1F43C", "panda face", "1f43c", ["-", "-"],
				["", "U+EB46"],
				["-", "-"],
				["󾇟", "U+FE1DF"]
			],
			"🐽": ["U+1F43D", "pig nose", "1f43d", ["", "U+E755"],
				["", "U+EB48"],
				["", "U+E10B"],
				["󾇠", "U+FE1E0"]
			],
			"😠": ["U+1F620", "angry face", "1f620", ["", "U+E6F1"],
				["", "U+E472"],
				["", "U+E059"],
				["󾌠", "U+FE320"]
			],
			"😩": ["U+1F629", "weary face", "1f629", ["", "U+E6F3"],
				["", "U+EB67"],
				["", "U+E403"],
				["󾌡", "U+FE321"]
			],
			"😲": ["U+1F632", "astonished face", "1f632", ["", "U+E6F4"],
				["", "U+EACA"],
				["", "U+E410"],
				["󾌢", "U+FE322"]
			],
			"😞": ["U+1F61E", "disappointed face", "1f61e", ["", "U+E6F2"],
				["", "U+EAC0"],
				["", "U+E058"],
				["󾌣", "U+FE323"]
			],
			"😵": ["U+1F635", "dizzy face", "1f635", ["", "U+E6F4"],
				["", "U+E5AE"],
				["", "U+E406"],
				["󾌤", "U+FE324"]
			],
			"😰": ["U+1F630", "face with open mouth and cold sweat", "1f630", ["", "U+E723"],
				["", "U+EACB"],
				["", "U+E40F"],
				["󾌥", "U+FE325"]
			],
			"😒": ["U+1F612", "unamused face", "1f612", ["", "U+E725"],
				["", "U+EAC9"],
				["", "U+E40E"],
				["󾌦", "U+FE326"]
			],
			"😍": ["U+1F60D", "smiling face with heart-shaped eyes", "1f60d", ["", "U+E726"],
				["", "U+E5C4"],
				["", "U+E106"],
				["󾌧", "U+FE327"]
			],
			"😤": ["U+1F624", "face with look of triumph", "1f624", ["", "U+E753"],
				["", "U+EAC1"],
				["", "U+E404"],
				["󾌨", "U+FE328"]
			],
			"😜": ["U+1F61C", "face with stuck-out tongue and winking eye", "1f61c", ["", "U+E728"],
				["", "U+E4E7"],
				["", "U+E105"],
				["󾌩", "U+FE329"]
			],
			"😝": ["U+1F61D", "face with stuck-out tongue and tightly-closed eyes", "1f61d", ["", "U+E728"],
				["", "U+E4E7"],
				["", "U+E409"],
				["󾌪", "U+FE32A"]
			],
			"😋": ["U+1F60B", "face savouring delicious food", "1f60b", ["", "U+E752"],
				["", "U+EACD"],
				["", "U+E056"],
				["󾌫", "U+FE32B"]
			],
			"😘": ["U+1F618", "face throwing a kiss", "1f618", ["", "U+E726"],
				["", "U+EACF"],
				["", "U+E418"],
				["󾌬", "U+FE32C"]
			],
			"😚": ["U+1F61A", "kissing face with closed eyes", "1f61a", ["", "U+E726"],
				["", "U+EACE"],
				["", "U+E417"],
				["󾌭", "U+FE32D"]
			],
			"😷": ["U+1F637", "face with medical mask", "1f637", ["-", "-"],
				["", "U+EAC7"],
				["", "U+E40C"],
				["󾌮", "U+FE32E"]
			],
			"😳": ["U+1F633", "flushed face", "1f633", ["", "U+E72A"],
				["", "U+EAC8"],
				["", "U+E40D"],
				["󾌯", "U+FE32F"]
			],
			"😃": ["U+1F603", "smiling face with open mouth", "1f603", ["", "U+E6F0"],
				["", "U+E471"],
				["", "U+E057"],
				["󾌰", "U+FE330"]
			],
			"😅": ["U+1F605", "smiling face with open mouth and cold sweat", "1f605", ["", "U+E722"],
				["", "U+E471 U+E5B1"],
				["", "U+E415 U+E331"],
				["󾌱", "U+FE331"]
			],
			"😆": ["U+1F606", "smiling face with open mouth and tightly-closed eyes", "1f606", ["", "U+E72A"],
				["", "U+EAC5"],
				["", "U+E40A"],
				["󾌲", "U+FE332"]
			],
			"😁": ["U+1F601", "grinning face with smiling eyes", "1f601", ["", "U+E753"],
				["", "U+EB80"],
				["", "U+E404"],
				["󾌳", "U+FE333"]
			],
			"😂": ["U+1F602", "face with tears of joy", "1f602", ["", "U+E72A"],
				["", "U+EB64"],
				["", "U+E412"],
				["󾌴", "U+FE334"]
			],
			"😊": ["U+1F60A", "smiling face with smiling eyes", "1f60a", ["", "U+E6F0"],
				["", "U+EACD"],
				["", "U+E056"],
				["󾌵", "U+FE335"]
			],
			"☺": ["U+263A", "white smiling face", "263a", ["", "U+E6F0"],
				["", "U+E4FB"],
				["", "U+E414"],
				["󾌶", "U+FE336"]
			],
			"😄": ["U+1F604", "smiling face with open mouth and smiling eyes", "1f604", ["", "U+E6F0"],
				["", "U+E471"],
				["", "U+E415"],
				["󾌸", "U+FE338"]
			],
			"😢": ["U+1F622", "crying face", "1f622", ["", "U+E72E"],
				["", "U+EB69"],
				["", "U+E413"],
				["󾌹", "U+FE339"]
			],
			"😭": ["U+1F62D", "loudly crying face", "1f62d", ["", "U+E72D"],
				["", "U+E473"],
				["", "U+E411"],
				["󾌺", "U+FE33A"]
			],
			"😨": ["U+1F628", "fearful face", "1f628", ["", "U+E757"],
				["", "U+EAC6"],
				["", "U+E40B"],
				["󾌻", "U+FE33B"]
			],
			"😣": ["U+1F623", "persevering face", "1f623", ["", "U+E72B"],
				["", "U+EAC2"],
				["", "U+E406"],
				["󾌼", "U+FE33C"]
			],
			"😡": ["U+1F621", "pouting face", "1f621", ["", "U+E724"],
				["", "U+EB5D"],
				["", "U+E416"],
				["󾌽", "U+FE33D"]
			],
			"😌": ["U+1F60C", "relieved face", "1f60c", ["", "U+E721"],
				["", "U+EAC5"],
				["", "U+E40A"],
				["󾌾", "U+FE33E"]
			],
			"😖": ["U+1F616", "confounded face", "1f616", ["", "U+E6F3"],
				["", "U+EAC3"],
				["", "U+E407"],
				["󾌿", "U+FE33F"]
			],
			"😔": ["U+1F614", "pensive face", "1f614", ["", "U+E720"],
				["", "U+EAC0"],
				["", "U+E403"],
				["󾍀", "U+FE340"]
			],
			"😱": ["U+1F631", "face screaming in fear", "1f631", ["", "U+E757"],
				["", "U+E5C5"],
				["", "U+E107"],
				["󾍁", "U+FE341"]
			],
			"😪": ["U+1F62A", "sleepy face", "1f62a", ["", "U+E701"],
				["", "U+EAC4"],
				["", "U+E408"],
				["󾍂", "U+FE342"]
			],
			"😏": ["U+1F60F", "smirking face", "1f60f", ["", "U+E72C"],
				["", "U+EABF"],
				["", "U+E402"],
				["󾍃", "U+FE343"]
			],
			"😓": ["U+1F613", "face with cold sweat", "1f613", ["", "U+E723"],
				["", "U+E5C6"],
				["", "U+E108"],
				["󾍄", "U+FE344"]
			],
			"😥": ["U+1F625", "disappointed but relieved face", "1f625", ["", "U+E723"],
				["", "U+E5C6"],
				["", "U+E401"],
				["󾍅", "U+FE345"]
			],
			"😫": ["U+1F62B", "tired face", "1f62b", ["", "U+E72B"],
				["", "U+E474"],
				["", "U+E406"],
				["󾍆", "U+FE346"]
			],
			"😉": ["U+1F609", "winking face", "1f609", ["", "U+E729"],
				["", "U+E5C3"],
				["", "U+E405"],
				["󾍇", "U+FE347"]
			],
			"😺": ["U+1F63A", "smiling cat face with open mouth", "1f63a", ["", "U+E6F0"],
				["", "U+EB61"],
				["", "U+E057"],
				["󾍈", "U+FE348"]
			],
			"😸": ["U+1F638", "grinning cat face with smiling eyes", "1f638", ["", "U+E753"],
				["", "U+EB7F"],
				["", "U+E404"],
				["󾍉", "U+FE349"]
			],
			"😹": ["U+1F639", "cat face with tears of joy", "1f639", ["", "U+E72A"],
				["", "U+EB63"],
				["", "U+E412"],
				["󾍊", "U+FE34A"]
			],
			"😽": ["U+1F63D", "kissing cat face with closed eyes", "1f63d", ["", "U+E726"],
				["", "U+EB60"],
				["", "U+E418"],
				["󾍋", "U+FE34B"]
			],
			"😻": ["U+1F63B", "smiling cat face with heart-shaped eyes", "1f63b", ["", "U+E726"],
				["", "U+EB65"],
				["", "U+E106"],
				["󾍌", "U+FE34C"]
			],
			"😿": ["U+1F63F", "crying cat face", "1f63f", ["", "U+E72E"],
				["", "U+EB68"],
				["", "U+E413"],
				["󾍍", "U+FE34D"]
			],
			"😾": ["U+1F63E", "pouting cat face", "1f63e", ["", "U+E724"],
				["", "U+EB5E"],
				["", "U+E416"],
				["󾍎", "U+FE34E"]
			],
			"😼": ["U+1F63C", "cat face with wry smile", "1f63c", ["", "U+E753"],
				["", "U+EB6A"],
				["", "U+E404"],
				["󾍏", "U+FE34F"]
			],
			"🙀": ["U+1F640", "weary cat face", "1f640", ["", "U+E6F3"],
				["", "U+EB66"],
				["", "U+E403"],
				["󾍐", "U+FE350"]
			],
			"🙅": ["U+1F645", "face with no good gesture", "1f645", ["", "U+E72F"],
				["", "U+EAD7"],
				["", "U+E423"],
				["󾍑", "U+FE351"]
			],
			"🙆": ["U+1F646", "face with ok gesture", "1f646", ["", "U+E70B"],
				["", "U+EAD8"],
				["", "U+E424"],
				["󾍒", "U+FE352"]
			],
			"🙇": ["U+1F647", "person bowing deeply", "1f647", ["-", "-"],
				["", "U+EAD9"],
				["", "U+E426"],
				["󾍓", "U+FE353"]
			],
			"🙈": ["U+1F648", "see-no-evil monkey", "1f648", ["-", "-"],
				["", "U+EB50"],
				["-", "-"],
				["󾍔", "U+FE354"]
			],
			"🙊": ["U+1F64A", "speak-no-evil monkey", "1f64a", ["-", "-"],
				["", "U+EB51"],
				["-", "-"],
				["󾍕", "U+FE355"]
			],
			"🙉": ["U+1F649", "hear-no-evil monkey", "1f649", ["-", "-"],
				["", "U+EB52"],
				["-", "-"],
				["󾍖", "U+FE356"]
			],
			"🙋": ["U+1F64B", "happy person raising one hand", "1f64b", ["-", "-"],
				["", "U+EB85"],
				["", "U+E012"],
				["󾍗", "U+FE357"]
			],
			"🙌": ["U+1F64C", "person raising both hands in celebration", "1f64c", ["-", "-"],
				["", "U+EB86"],
				["", "U+E427"],
				["󾍘", "U+FE358"]
			],
			"🙍": ["U+1F64D", "person frowning", "1f64d", ["", "U+E6F3"],
				["", "U+EB87"],
				["", "U+E403"],
				["󾍙", "U+FE359"]
			],
			"🙎": ["U+1F64E", "person with pouting face", "1f64e", ["", "U+E6F1"],
				["", "U+EB88"],
				["", "U+E416"],
				["󾍚", "U+FE35A"]
			],
			"🙏": ["U+1F64F", "person with folded hands", "1f64f", ["-", "-"],
				["", "U+EAD2"],
				["", "U+E41D"],
				["󾍛", "U+FE35B"]
			],
			"🏠": ["U+1F3E0", "house building", "1f3e0", ["", "U+E663"],
				["", "U+E4AB"],
				["", "U+E036"],
				["󾒰", "U+FE4B0"]
			],
			"🏡": ["U+1F3E1", "house with garden", "1f3e1", ["", "U+E663"],
				["", "U+EB09"],
				["", "U+E036"],
				["󾒱", "U+FE4B1"]
			],
			"🏢": ["U+1F3E2", "office building", "1f3e2", ["", "U+E664"],
				["", "U+E4AD"],
				["", "U+E038"],
				["󾒲", "U+FE4B2"]
			],
			"🏣": ["U+1F3E3", "japanese post office", "1f3e3", ["", "U+E665"],
				["", "U+E5DE"],
				["", "U+E153"],
				["󾒳", "U+FE4B3"]
			],
			"🏥": ["U+1F3E5", "hospital", "1f3e5", ["", "U+E666"],
				["", "U+E5DF"],
				["", "U+E155"],
				["󾒴", "U+FE4B4"]
			],
			"🏦": ["U+1F3E6", "bank", "1f3e6", ["", "U+E667"],
				["", "U+E4AA"],
				["", "U+E14D"],
				["󾒵", "U+FE4B5"]
			],
			"🏧": ["U+1F3E7", "automated teller machine", "1f3e7", ["", "U+E668"],
				["", "U+E4A3"],
				["", "U+E154"],
				["󾒶", "U+FE4B6"]
			],
			"🏨": ["U+1F3E8", "hotel", "1f3e8", ["", "U+E669"],
				["", "U+EA81"],
				["", "U+E158"],
				["󾒷", "U+FE4B7"]
			],
			"🏩": ["U+1F3E9", "love hotel", "1f3e9", ["", "U+E669 U+E6EF"],
				["", "U+EAF3"],
				["", "U+E501"],
				["󾒸", "U+FE4B8"]
			],
			"🏪": ["U+1F3EA", "convenience store", "1f3ea", ["", "U+E66A"],
				["", "U+E4A4"],
				["", "U+E156"],
				["󾒹", "U+FE4B9"]
			],
			"🏫": ["U+1F3EB", "school", "1f3eb", ["", "U+E73E"],
				["", "U+EA80"],
				["", "U+E157"],
				["󾒺", "U+FE4BA"]
			],
			"⛪": ["U+26EA", "church", "26ea", ["-", "-"],
				["", "U+E5BB"],
				["", "U+E037"],
				["󾒻", "U+FE4BB"]
			],
			"⛲": ["U+26F2", "fountain", "26f2", ["-", "-"],
				["", "U+E5CF"],
				["", "U+E121"],
				["󾒼", "U+FE4BC"]
			],
			"🏬": ["U+1F3EC", "department store", "1f3ec", ["-", "-"],
				["", "U+EAF6"],
				["", "U+E504"],
				["󾒽", "U+FE4BD"]
			],
			"🏯": ["U+1F3EF", "japanese castle", "1f3ef", ["-", "-"],
				["", "U+EAF7"],
				["", "U+E505"],
				["󾒾", "U+FE4BE"]
			],
			"🏰": ["U+1F3F0", "european castle", "1f3f0", ["-", "-"],
				["", "U+EAF8"],
				["", "U+E506"],
				["󾒿", "U+FE4BF"]
			],
			"🏭": ["U+1F3ED", "factory", "1f3ed", ["-", "-"],
				["", "U+EAF9"],
				["", "U+E508"],
				["󾓀", "U+FE4C0"]
			],
			"⚓": ["U+2693", "anchor", "2693", ["", "U+E661"],
				["", "U+E4A9"],
				["", "U+E202"],
				["󾓁", "U+FE4C1"]
			],
			"🏮": ["U+1F3EE", "izakaya lantern", "1f3ee", ["", "U+E74B"],
				["", "U+E4BD"],
				["", "U+E30B"],
				["󾓂", "U+FE4C2"]
			],
			"🗻": ["U+1F5FB", "mount fuji", "1f5fb", ["", "U+E740"],
				["", "U+E5BD"],
				["", "U+E03B"],
				["󾓃", "U+FE4C3"]
			],
			"🗼": ["U+1F5FC", "tokyo tower", "1f5fc", ["-", "-"],
				["", "U+E4C0"],
				["", "U+E509"],
				["󾓄", "U+FE4C4"]
			],
			"🗽": ["U+1F5FD", "statue of liberty", "1f5fd", ["-", "-"],
				["-", "-"],
				["", "U+E51D"],
				["󾓆", "U+FE4C6"]
			],
			"🗾": ["U+1F5FE", "silhouette of japan", "1f5fe", ["-", "-"],
				["", "U+E572"],
				["-", "-"],
				["󾓇", "U+FE4C7"]
			],
			"🗿": ["U+1F5FF", "moyai", "1f5ff", ["-", "-"],
				["", "U+EB6C"],
				["-", "-"],
				["󾓈", "U+FE4C8"]
			],
			"👞": ["U+1F45E", "mans shoe", "1f45e", ["", "U+E699"],
				["", "U+E5B7"],
				["", "U+E007"],
				["󾓌", "U+FE4CC"]
			],
			"👟": ["U+1F45F", "athletic shoe", "1f45f", ["", "U+E699"],
				["", "U+EB2B"],
				["", "U+E007"],
				["󾓍", "U+FE4CD"]
			],
			"👠": ["U+1F460", "high-heeled shoe", "1f460", ["", "U+E674"],
				["", "U+E51A"],
				["", "U+E13E"],
				["󾓖", "U+FE4D6"]
			],
			"👡": ["U+1F461", "womans sandal", "1f461", ["", "U+E674"],
				["", "U+E51A"],
				["", "U+E31A"],
				["󾓗", "U+FE4D7"]
			],
			"👢": ["U+1F462", "womans boots", "1f462", ["-", "-"],
				["", "U+EA9F"],
				["", "U+E31B"],
				["󾓘", "U+FE4D8"]
			],
			"👣": ["U+1F463", "footprints", "1f463", ["", "U+E698"],
				["", "U+EB2A"],
				["", "U+E536"],
				["󾕓", "U+FE553"]
			],
			"👓": ["U+1F453", "eyeglasses", "1f453", ["", "U+E69A"],
				["", "U+E4FE"],
				["-", "-"],
				["󾓎", "U+FE4CE"]
			],
			"👕": ["U+1F455", "t-shirt", "1f455", ["", "U+E70E"],
				["", "U+E5B6"],
				["", "U+E006"],
				["󾓏", "U+FE4CF"]
			],
			"👖": ["U+1F456", "jeans", "1f456", ["", "U+E711"],
				["", "U+EB77"],
				["-", "-"],
				["󾓐", "U+FE4D0"]
			],
			"👑": ["U+1F451", "crown", "1f451", ["", "U+E71A"],
				["", "U+E5C9"],
				["", "U+E10E"],
				["󾓑", "U+FE4D1"]
			],
			"👔": ["U+1F454", "necktie", "1f454", ["-", "-"],
				["", "U+EA93"],
				["", "U+E302"],
				["󾓓", "U+FE4D3"]
			],
			"👒": ["U+1F452", "womans hat", "1f452", ["-", "-"],
				["", "U+EA9E"],
				["", "U+E318"],
				["󾓔", "U+FE4D4"]
			],
			"👗": ["U+1F457", "dress", "1f457", ["-", "-"],
				["", "U+EB6B"],
				["", "U+E319"],
				["󾓕", "U+FE4D5"]
			],
			"👘": ["U+1F458", "kimono", "1f458", ["-", "-"],
				["", "U+EAA3"],
				["", "U+E321"],
				["󾓙", "U+FE4D9"]
			],
			"👙": ["U+1F459", "bikini", "1f459", ["-", "-"],
				["", "U+EAA4"],
				["", "U+E322"],
				["󾓚", "U+FE4DA"]
			],
			"👚": ["U+1F45A", "womans clothes", "1f45a", ["", "U+E70E"],
				["", "U+E50D"],
				["", "U+E006"],
				["󾓛", "U+FE4DB"]
			],
			"👛": ["U+1F45B", "purse", "1f45b", ["", "U+E70F"],
				["", "U+E504"],
				["-", "-"],
				["󾓜", "U+FE4DC"]
			],
			"👜": ["U+1F45C", "handbag", "1f45c", ["", "U+E682"],
				["", "U+E49C"],
				["", "U+E323"],
				["󾓰", "U+FE4F0"]
			],
			"👝": ["U+1F45D", "pouch", "1f45d", ["", "U+E6AD"],
				["-", "-"],
				["-", "-"],
				["󾓱", "U+FE4F1"]
			],
			"💰": ["U+1F4B0", "money bag", "1f4b0", ["", "U+E715"],
				["", "U+E4C7"],
				["", "U+E12F"],
				["󾓝", "U+FE4DD"]
			],
			"💱": ["U+1F4B1", "currency exchange", "1f4b1", ["-", "-"],
				["-", "-"],
				["", "U+E149"],
				["󾓞", "U+FE4DE"]
			],
			"💹": ["U+1F4B9", "chart with upwards trend and yen sign", "1f4b9", ["-", "-"],
				["", "U+E5DC"],
				["", "U+E14A"],
				["󾓟", "U+FE4DF"]
			],
			"💲": ["U+1F4B2", "heavy dollar sign", "1f4b2", ["", "U+E715"],
				["", "U+E579"],
				["", "U+E12F"],
				["󾓠", "U+FE4E0"]
			],
			"💳": ["U+1F4B3", "credit card", "1f4b3", ["-", "-"],
				["", "U+E57C"],
				["-", "-"],
				["󾓡", "U+FE4E1"]
			],
			"💴": ["U+1F4B4", "banknote with yen sign", "1f4b4", ["", "U+E6D6"],
				["", "U+E57D"],
				["-", "-"],
				["󾓢", "U+FE4E2"]
			],
			"💵": ["U+1F4B5", "banknote with dollar sign", "1f4b5", ["", "U+E715"],
				["", "U+E585"],
				["", "U+E12F"],
				["󾓣", "U+FE4E3"]
			],
			"💸": ["U+1F4B8", "money with wings", "1f4b8", ["-", "-"],
				["", "U+EB5B"],
				["-", "-"],
				["󾓤", "U+FE4E4"]
			],
			"🇨🇳": ["U+1F1E8 U+1F1F3", "regional indicator symbol letters cn", "1f1e81f1f3", ["-", "-"],
				["", "U+EB11"],
				["", "U+E513"],
				["󾓭", "U+FE4ED"]
			],
			"🇩🇪": ["U+1F1E9 U+1F1EA", "regional indicator symbol letters de", "1f1e91f1ea", ["-", "-"],
				["", "U+EB0E"],
				["", "U+E50E"],
				["󾓨", "U+FE4E8"]
			],
			"🇪🇸": ["U+1F1EA U+1F1F8", "regional indicator symbol letters es", "1f1ea1f1f8", ["-", "-"],
				["", "U+E5D5"],
				["", "U+E511"],
				["󾓫", "U+FE4EB"]
			],
			"🇫🇷": ["U+1F1EB U+1F1F7", "regional indicator symbol letters fr", "1f1eb1f1f7", ["-", "-"],
				["", "U+EAFA"],
				["", "U+E50D"],
				["󾓧", "U+FE4E7"]
			],
			"🇬🇧": ["U+1F1EC U+1F1E7", "regional indicator symbol letters gb", "1f1ec1f1e7", ["-", "-"],
				["", "U+EB10"],
				["", "U+E510"],
				["󾓪", "U+FE4EA"]
			],
			"🇮🇹": ["U+1F1EE U+1F1F9", "regional indicator symbol letters it", "1f1ee1f1f9", ["-", "-"],
				["", "U+EB0F"],
				["", "U+E50F"],
				["󾓩", "U+FE4E9"]
			],
			"🇯🇵": ["U+1F1EF U+1F1F5", "regional indicator symbol letters jp", "1f1ef1f1f5", ["-", "-"],
				["", "U+E4CC"],
				["", "U+E50B"],
				["󾓥", "U+FE4E5"]
			],
			"🇰🇷": ["U+1F1F0 U+1F1F7", "regional indicator symbol letters kr", "1f1f01f1f7", ["-", "-"],
				["", "U+EB12"],
				["", "U+E514"],
				["󾓮", "U+FE4EE"]
			],
			"🇷🇺": ["U+1F1F7 U+1F1FA", "regional indicator symbol letters ru", "1f1f71f1fa", ["-", "-"],
				["", "U+E5D6"],
				["", "U+E512"],
				["󾓬", "U+FE4EC"]
			],
			"🇺🇸": ["U+1F1FA U+1F1F8", "regional indicator symbol letters us", "1f1fa1f1f8", ["-", "-"],
				["", "U+E573"],
				["", "U+E50C"],
				["󾓦", "U+FE4E6"]
			],
			"🔥": ["U+1F525", "fire", "1f525", ["-", "-"],
				["", "U+E47B"],
				["", "U+E11D"],
				["󾓶", "U+FE4F6"]
			],
			"🔦": ["U+1F526", "electric torch", "1f526", ["", "U+E6FB"],
				["", "U+E583"],
				["-", "-"],
				["󾓻", "U+FE4FB"]
			],
			"🔧": ["U+1F527", "wrench", "1f527", ["", "U+E718"],
				["", "U+E587"],
				["-", "-"],
				["󾓉", "U+FE4C9"]
			],
			"🔨": ["U+1F528", "hammer", "1f528", ["-", "-"],
				["", "U+E5CB"],
				["", "U+E116"],
				["󾓊", "U+FE4CA"]
			],
			"🔩": ["U+1F529", "nut and bolt", "1f529", ["-", "-"],
				["", "U+E581"],
				["-", "-"],
				["󾓋", "U+FE4CB"]
			],
			"🔪": ["U+1F52A", "hocho", "1f52a", ["-", "-"],
				["", "U+E57F"],
				["-", "-"],
				["󾓺", "U+FE4FA"]
			],
			"🔫": ["U+1F52B", "pistol", "1f52b", ["-", "-"],
				["", "U+E50A"],
				["", "U+E113"],
				["󾓵", "U+FE4F5"]
			],
			"🔮": ["U+1F52E", "crystal ball", "1f52e", ["-", "-"],
				["", "U+EA8F"],
				["", "U+E23E"],
				["󾓷", "U+FE4F7"]
			],
			"🔯": ["U+1F52F", "six pointed star with middle dot", "1f52f", ["-", "-"],
				["", "U+EA8F"],
				["", "U+E23E"],
				["󾓸", "U+FE4F8"]
			],
			"🔰": ["U+1F530", "japanese symbol for beginner", "1f530", ["-", "-"],
				["", "U+E480"],
				["", "U+E209"],
				["󾁄", "U+FE044"]
			],
			"🔱": ["U+1F531", "trident emblem", "1f531", ["", "U+E71A"],
				["", "U+E5C9"],
				["", "U+E031"],
				["󾓒", "U+FE4D2"]
			],
			"💉": ["U+1F489", "syringe", "1f489", ["-", "-"],
				["", "U+E510"],
				["", "U+E13B"],
				["󾔉", "U+FE509"]
			],
			"💊": ["U+1F48A", "pill", "1f48a", ["-", "-"],
				["", "U+EA9A"],
				["", "U+E30F"],
				["󾔊", "U+FE50A"]
			],
			"🅰": ["U+1F170", "negative squared latin capital letter a", "1f170", ["-", "-"],
				["", "U+EB26"],
				["", "U+E532"],
				["󾔋", "U+FE50B"]
			],
			"🅱": ["U+1F171", "negative squared latin capital letter b", "1f171", ["-", "-"],
				["", "U+EB27"],
				["", "U+E533"],
				["󾔌", "U+FE50C"]
			],
			"🆎": ["U+1F18E", "negative squared ab", "1f18e", ["-", "-"],
				["", "U+EB29"],
				["", "U+E534"],
				["󾔍", "U+FE50D"]
			],
			"🅾": ["U+1F17E", "negative squared latin capital letter o", "1f17e", ["-", "-"],
				["", "U+EB28"],
				["", "U+E535"],
				["󾔎", "U+FE50E"]
			],
			"🎀": ["U+1F380", "ribbon", "1f380", ["", "U+E684"],
				["", "U+E59F"],
				["", "U+E314"],
				["󾔏", "U+FE50F"]
			],
			"🎁": ["U+1F381", "wrapped present", "1f381", ["", "U+E685"],
				["", "U+E4CF"],
				["", "U+E112"],
				["󾔐", "U+FE510"]
			],
			"🎂": ["U+1F382", "birthday cake", "1f382", ["", "U+E686"],
				["", "U+E5A0"],
				["", "U+E34B"],
				["󾔑", "U+FE511"]
			],
			"🎄": ["U+1F384", "christmas tree", "1f384", ["", "U+E6A4"],
				["", "U+E4C9"],
				["", "U+E033"],
				["󾔒", "U+FE512"]
			],
			"🎅": ["U+1F385", "father christmas", "1f385", ["-", "-"],
				["", "U+EAF0"],
				["", "U+E448"],
				["󾔓", "U+FE513"]
			],
			"🎌": ["U+1F38C", "crossed flags", "1f38c", ["-", "-"],
				["", "U+E5D9"],
				["", "U+E143"],
				["󾔔", "U+FE514"]
			],
			"🎆": ["U+1F386", "fireworks", "1f386", ["-", "-"],
				["", "U+E5CC"],
				["", "U+E117"],
				["󾔕", "U+FE515"]
			],
			"🎈": ["U+1F388", "balloon", "1f388", ["-", "-"],
				["", "U+EA9B"],
				["", "U+E310"],
				["󾔖", "U+FE516"]
			],
			"🎉": ["U+1F389", "party popper", "1f389", ["-", "-"],
				["", "U+EA9C"],
				["", "U+E312"],
				["󾔗", "U+FE517"]
			],
			"🎍": ["U+1F38D", "pine decoration", "1f38d", ["-", "-"],
				["", "U+EAE3"],
				["", "U+E436"],
				["󾔘", "U+FE518"]
			],
			"🎎": ["U+1F38E", "japanese dolls", "1f38e", ["-", "-"],
				["", "U+EAE4"],
				["", "U+E438"],
				["󾔙", "U+FE519"]
			],
			"🎓": ["U+1F393", "graduation cap", "1f393", ["-", "-"],
				["", "U+EAE5"],
				["", "U+E439"],
				["󾔚", "U+FE51A"]
			],
			"🎒": ["U+1F392", "school satchel", "1f392", ["-", "-"],
				["", "U+EAE6"],
				["", "U+E43A"],
				["󾔛", "U+FE51B"]
			],
			"🎏": ["U+1F38F", "carp streamer", "1f38f", ["-", "-"],
				["", "U+EAE7"],
				["", "U+E43B"],
				["󾔜", "U+FE51C"]
			],
			"🎇": ["U+1F387", "firework sparkler", "1f387", ["-", "-"],
				["", "U+EAEB"],
				["", "U+E440"],
				["󾔝", "U+FE51D"]
			],
			"🎐": ["U+1F390", "wind chime", "1f390", ["-", "-"],
				["", "U+EAED"],
				["", "U+E442"],
				["󾔞", "U+FE51E"]
			],
			"🎃": ["U+1F383", "jack-o-lantern", "1f383", ["-", "-"],
				["", "U+EAEE"],
				["", "U+E445"],
				["󾔟", "U+FE51F"]
			],
			"🎊": ["U+1F38A", "confetti ball", "1f38a", ["-", "-"],
				["", "U+E46F"],
				["-", "-"],
				["󾔠", "U+FE520"]
			],
			"🎋": ["U+1F38B", "tanabata tree", "1f38b", ["-", "-"],
				["", "U+EB3D"],
				["-", "-"],
				["󾔡", "U+FE521"]
			],
			"🎑": ["U+1F391", "moon viewing ceremony", "1f391", ["-", "-"],
				["", "U+EAEF"],
				["", "U+E446"],
				["󾀗", "U+FE017"]
			],
			"📟": ["U+1F4DF", "pager", "1f4df", ["", "U+E65A"],
				["", "U+E59B"],
				["-", "-"],
				["󾔢", "U+FE522"]
			],
			"☎": ["U+260E", "black telephone", "260e", ["", "U+E687"],
				["", "U+E596"],
				["", "U+E009"],
				["󾔣", "U+FE523"]
			],
			"📞": ["U+1F4DE", "telephone receiver", "1f4de", ["", "U+E687"],
				["", "U+E51E"],
				["", "U+E009"],
				["󾔤", "U+FE524"]
			],
			"📱": ["U+1F4F1", "mobile phone", "1f4f1", ["", "U+E688"],
				["", "U+E588"],
				["", "U+E00A"],
				["󾔥", "U+FE525"]
			],
			"📲": ["U+1F4F2", "mobile phone with rightwards arrow at left", "1f4f2", ["", "U+E6CE"],
				["", "U+EB08"],
				["", "U+E104"],
				["󾔦", "U+FE526"]
			],
			"📝": ["U+1F4DD", "memo", "1f4dd", ["", "U+E689"],
				["", "U+EA92"],
				["", "U+E301"],
				["󾔧", "U+FE527"]
			],
			"📠": ["U+1F4E0", "fax machine", "1f4e0", ["", "U+E6D0"],
				["", "U+E520"],
				["", "U+E00B"],
				["󾔨", "U+FE528"]
			],
			"✉": ["U+2709", "envelope", "2709", ["", "U+E6D3"],
				["", "U+E521"],
				["", "U+E103"],
				["󾔩", "U+FE529"]
			],
			"📨": ["U+1F4E8", "incoming envelope", "1f4e8", ["", "U+E6CF"],
				["", "U+E591"],
				["", "U+E103"],
				["󾔪", "U+FE52A"]
			],
			"📩": ["U+1F4E9", "envelope with downwards arrow above", "1f4e9", ["", "U+E6CF"],
				["", "U+EB62"],
				["", "U+E103"],
				["󾔫", "U+FE52B"]
			],
			"📪": ["U+1F4EA", "closed mailbox with lowered flag", "1f4ea", ["", "U+E665"],
				["", "U+E51B"],
				["", "U+E101"],
				["󾔬", "U+FE52C"]
			],
			"📫": ["U+1F4EB", "closed mailbox with raised flag", "1f4eb", ["", "U+E665"],
				["", "U+EB0A"],
				["", "U+E101"],
				["󾔭", "U+FE52D"]
			],
			"📮": ["U+1F4EE", "postbox", "1f4ee", ["", "U+E665"],
				["", "U+E51B"],
				["", "U+E102"],
				["󾔮", "U+FE52E"]
			],
			"📰": ["U+1F4F0", "newspaper", "1f4f0", ["-", "-"],
				["", "U+E58B"],
				["-", "-"],
				["󾠢", "U+FE822"]
			],
			"📢": ["U+1F4E2", "public address loudspeaker", "1f4e2", ["-", "-"],
				["", "U+E511"],
				["", "U+E142"],
				["󾔯", "U+FE52F"]
			],
			"📣": ["U+1F4E3", "cheering megaphone", "1f4e3", ["-", "-"],
				["", "U+E511"],
				["", "U+E317"],
				["󾔰", "U+FE530"]
			],
			"📡": ["U+1F4E1", "satellite antenna", "1f4e1", ["-", "-"],
				["", "U+E4A8"],
				["", "U+E14B"],
				["󾔱", "U+FE531"]
			],
			"📤": ["U+1F4E4", "outbox tray", "1f4e4", ["-", "-"],
				["", "U+E592"],
				["-", "-"],
				["󾔳", "U+FE533"]
			],
			"📥": ["U+1F4E5", "inbox tray", "1f4e5", ["-", "-"],
				["", "U+E593"],
				["-", "-"],
				["󾔴", "U+FE534"]
			],
			"📦": ["U+1F4E6", "package", "1f4e6", ["", "U+E685"],
				["", "U+E51F"],
				["", "U+E112"],
				["󾔵", "U+FE535"]
			],
			"📧": ["U+1F4E7", "e-mail symbol", "1f4e7", ["", "U+E6D3"],
				["", "U+EB71"],
				["", "U+E103"],
				["󾮒", "U+FEB92"]
			],
			"🔠": ["U+1F520", "input symbol for latin capital letters", "1f520", ["-", "-"],
				["", "U+EAFD"],
				["-", "-"],
				["󾭼", "U+FEB7C"]
			],
			"🔡": ["U+1F521", "input symbol for latin small letters", "1f521", ["-", "-"],
				["", "U+EAFE"],
				["-", "-"],
				["󾭽", "U+FEB7D"]
			],
			"🔢": ["U+1F522", "input symbol for numbers", "1f522", ["-", "-"],
				["", "U+EAFF"],
				["-", "-"],
				["󾭾", "U+FEB7E"]
			],
			"🔣": ["U+1F523", "input symbol for symbols", "1f523", ["-", "-"],
				["", "U+EB00"],
				["-", "-"],
				["󾭿", "U+FEB7F"]
			],
			"🔤": ["U+1F524", "input symbol for latin letters", "1f524", ["-", "-"],
				["", "U+EB55"],
				["-", "-"],
				["󾮀", "U+FEB80"]
			],
			"✒": ["U+2712", "black nib", "2712", ["", "U+E6AE"],
				["", "U+EB03"],
				["-", "-"],
				["󾔶", "U+FE536"]
			],
			"💺": ["U+1F4BA", "seat", "1f4ba", ["", "U+E6B2"],
				["-", "-"],
				["", "U+E11F"],
				["󾔷", "U+FE537"]
			],
			"💻": ["U+1F4BB", "personal computer", "1f4bb", ["", "U+E716"],
				["", "U+E5B8"],
				["", "U+E00C"],
				["󾔸", "U+FE538"]
			],
			"✏": ["U+270F", "pencil", "270f", ["", "U+E719"],
				["", "U+E4A1"],
				["", "U+E301"],
				["󾔹", "U+FE539"]
			],
			"📎": ["U+1F4CE", "paperclip", "1f4ce", ["", "U+E730"],
				["", "U+E4A0"],
				["-", "-"],
				["󾔺", "U+FE53A"]
			],
			"💼": ["U+1F4BC", "briefcase", "1f4bc", ["", "U+E682"],
				["", "U+E5CE"],
				["", "U+E11E"],
				["󾔻", "U+FE53B"]
			],
			"💽": ["U+1F4BD", "minidisc", "1f4bd", ["-", "-"],
				["", "U+E582"],
				["", "U+E316"],
				["󾔼", "U+FE53C"]
			],
			"💾": ["U+1F4BE", "floppy disk", "1f4be", ["-", "-"],
				["", "U+E562"],
				["", "U+E316"],
				["󾔽", "U+FE53D"]
			],
			"💿": ["U+1F4BF", "optical disc", "1f4bf", ["", "U+E68C"],
				["", "U+E50C"],
				["", "U+E126"],
				["󾠝", "U+FE81D"]
			],
			"📀": ["U+1F4C0", "dvd", "1f4c0", ["", "U+E68C"],
				["", "U+E50C"],
				["", "U+E127"],
				["󾠞", "U+FE81E"]
			],
			"✂": ["U+2702", "black scissors", "2702", ["", "U+E675"],
				["", "U+E516"],
				["", "U+E313"],
				["󾔾", "U+FE53E"]
			],
			"📍": ["U+1F4CD", "round pushpin", "1f4cd", ["-", "-"],
				["", "U+E560"],
				["-", "-"],
				["󾔿", "U+FE53F"]
			],
			"📃": ["U+1F4C3", "page with curl", "1f4c3", ["", "U+E689"],
				["", "U+E561"],
				["", "U+E301"],
				["󾕀", "U+FE540"]
			],
			"📄": ["U+1F4C4", "page facing up", "1f4c4", ["", "U+E689"],
				["", "U+E569"],
				["", "U+E301"],
				["󾕁", "U+FE541"]
			],
			"📅": ["U+1F4C5", "calendar", "1f4c5", ["-", "-"],
				["", "U+E563"],
				["-", "-"],
				["󾕂", "U+FE542"]
			],
			"📁": ["U+1F4C1", "file folder", "1f4c1", ["-", "-"],
				["", "U+E58F"],
				["-", "-"],
				["󾕃", "U+FE543"]
			],
			"📂": ["U+1F4C2", "open file folder", "1f4c2", ["-", "-"],
				["", "U+E590"],
				["-", "-"],
				["󾕄", "U+FE544"]
			],
			"📓": ["U+1F4D3", "notebook", "1f4d3", ["", "U+E683"],
				["", "U+E56B"],
				["", "U+E148"],
				["󾕅", "U+FE545"]
			],
			"📖": ["U+1F4D6", "open book", "1f4d6", ["", "U+E683"],
				["", "U+E49F"],
				["", "U+E148"],
				["󾕆", "U+FE546"]
			],
			"📔": ["U+1F4D4", "notebook with decorative cover", "1f4d4", ["", "U+E683"],
				["", "U+E49D"],
				["", "U+E148"],
				["󾕇", "U+FE547"]
			],
			"📕": ["U+1F4D5", "closed book", "1f4d5", ["", "U+E683"],
				["", "U+E568"],
				["", "U+E148"],
				["󾔂", "U+FE502"]
			],
			"📗": ["U+1F4D7", "green book", "1f4d7", ["", "U+E683"],
				["", "U+E565"],
				["", "U+E148"],
				["󾓿", "U+FE4FF"]
			],
			"📘": ["U+1F4D8", "blue book", "1f4d8", ["", "U+E683"],
				["", "U+E566"],
				["", "U+E148"],
				["󾔀", "U+FE500"]
			],
			"📙": ["U+1F4D9", "orange book", "1f4d9", ["", "U+E683"],
				["", "U+E567"],
				["", "U+E148"],
				["󾔁", "U+FE501"]
			],
			"📚": ["U+1F4DA", "books", "1f4da", ["", "U+E683"],
				["", "U+E56F"],
				["", "U+E148"],
				["󾔃", "U+FE503"]
			],
			"📛": ["U+1F4DB", "name badge", "1f4db", ["-", "-"],
				["", "U+E51D"],
				["-", "-"],
				["󾔄", "U+FE504"]
			],
			"📜": ["U+1F4DC", "scroll", "1f4dc", ["", "U+E70A"],
				["", "U+E55F"],
				["-", "-"],
				["󾓽", "U+FE4FD"]
			],
			"📋": ["U+1F4CB", "clipboard", "1f4cb", ["", "U+E689"],
				["", "U+E564"],
				["", "U+E301"],
				["󾕈", "U+FE548"]
			],
			"📆": ["U+1F4C6", "tear-off calendar", "1f4c6", ["-", "-"],
				["", "U+E56A"],
				["-", "-"],
				["󾕉", "U+FE549"]
			],
			"📊": ["U+1F4CA", "bar chart", "1f4ca", ["-", "-"],
				["", "U+E574"],
				["", "U+E14A"],
				["󾕊", "U+FE54A"]
			],
			"📈": ["U+1F4C8", "chart with upwards trend", "1f4c8", ["-", "-"],
				["", "U+E575"],
				["", "U+E14A"],
				["󾕋", "U+FE54B"]
			],
			"📉": ["U+1F4C9", "chart with downwards trend", "1f4c9", ["-", "-"],
				["", "U+E576"],
				["-", "-"],
				["󾕌", "U+FE54C"]
			],
			"📇": ["U+1F4C7", "card index", "1f4c7", ["", "U+E683"],
				["", "U+E56C"],
				["", "U+E148"],
				["󾕍", "U+FE54D"]
			],
			"📌": ["U+1F4CC", "pushpin", "1f4cc", ["-", "-"],
				["", "U+E56D"],
				["-", "-"],
				["󾕎", "U+FE54E"]
			],
			"📒": ["U+1F4D2", "ledger", "1f4d2", ["", "U+E683"],
				["", "U+E56E"],
				["", "U+E148"],
				["󾕏", "U+FE54F"]
			],
			"📏": ["U+1F4CF", "straight ruler", "1f4cf", ["-", "-"],
				["", "U+E570"],
				["-", "-"],
				["󾕐", "U+FE550"]
			],
			"📐": ["U+1F4D0", "triangular ruler", "1f4d0", ["-", "-"],
				["", "U+E4A2"],
				["-", "-"],
				["󾕑", "U+FE551"]
			],
			"📑": ["U+1F4D1", "bookmark tabs", "1f4d1", ["", "U+E689"],
				["", "U+EB0B"],
				["", "U+E301"],
				["󾕒", "U+FE552"]
			],
			"🎽": ["U+1F3BD", "running shirt with sash", "1f3bd", ["", "U+E652"],
				["-", "-"],
				["-", "-"],
				["󾟐", "U+FE7D0"]
			],
			"⚾": ["U+26BE", "baseball", "26be", ["", "U+E653"],
				["", "U+E4BA"],
				["", "U+E016"],
				["󾟑", "U+FE7D1"]
			],
			"⛳": ["U+26F3", "flag in hole", "26f3", ["", "U+E654"],
				["", "U+E599"],
				["", "U+E014"],
				["󾟒", "U+FE7D2"]
			],
			"🎾": ["U+1F3BE", "tennis racquet and ball", "1f3be", ["", "U+E655"],
				["", "U+E4B7"],
				["", "U+E015"],
				["󾟓", "U+FE7D3"]
			],
			"⚽": ["U+26BD", "soccer ball", "26bd", ["", "U+E656"],
				["", "U+E4B6"],
				["", "U+E018"],
				["󾟔", "U+FE7D4"]
			],
			"🎿": ["U+1F3BF", "ski and ski boot", "1f3bf", ["", "U+E657"],
				["", "U+EAAC"],
				["", "U+E013"],
				["󾟕", "U+FE7D5"]
			],
			"🏀": ["U+1F3C0", "basketball and hoop", "1f3c0", ["", "U+E658"],
				["", "U+E59A"],
				["", "U+E42A"],
				["󾟖", "U+FE7D6"]
			],
			"🏁": ["U+1F3C1", "chequered flag", "1f3c1", ["", "U+E659"],
				["", "U+E4B9"],
				["", "U+E132"],
				["󾟗", "U+FE7D7"]
			],
			"🏂": ["U+1F3C2", "snowboarder", "1f3c2", ["", "U+E712"],
				["", "U+E4B8"],
				["-", "-"],
				["󾟘", "U+FE7D8"]
			],
			"🏃": ["U+1F3C3", "runner", "1f3c3", ["", "U+E733"],
				["", "U+E46B"],
				["", "U+E115"],
				["󾟙", "U+FE7D9"]
			],
			"🏄": ["U+1F3C4", "surfer", "1f3c4", ["", "U+E712"],
				["", "U+EB41"],
				["", "U+E017"],
				["󾟚", "U+FE7DA"]
			],
			"🏆": ["U+1F3C6", "trophy", "1f3c6", ["-", "-"],
				["", "U+E5D3"],
				["", "U+E131"],
				["󾟛", "U+FE7DB"]
			],
			"🏈": ["U+1F3C8", "american football", "1f3c8", ["-", "-"],
				["", "U+E4BB"],
				["", "U+E42B"],
				["󾟝", "U+FE7DD"]
			],
			"🏊": ["U+1F3CA", "swimmer", "1f3ca", ["-", "-"],
				["", "U+EADE"],
				["", "U+E42D"],
				["󾟞", "U+FE7DE"]
			],
			"🚃": ["U+1F683", "railway car", "1f683", ["", "U+E65B"],
				["", "U+E4B5"],
				["", "U+E01E"],
				["󾟟", "U+FE7DF"]
			],
			"🚇": ["U+1F687", "metro", "1f687", ["", "U+E65C"],
				["", "U+E5BC"],
				["", "U+E434"],
				["󾟠", "U+FE7E0"]
			],
			"Ⓜ": ["U+24C2", "circled latin capital letter m", "24c2", ["", "U+E65C"],
				["", "U+E5BC"],
				["", "U+E434"],
				["󾟡", "U+FE7E1"]
			],
			"🚄": ["U+1F684", "high-speed train", "1f684", ["", "U+E65D"],
				["", "U+E4B0"],
				["", "U+E435"],
				["󾟢", "U+FE7E2"]
			],
			"🚅": ["U+1F685", "high-speed train with bullet nose", "1f685", ["", "U+E65D"],
				["", "U+E4B0"],
				["", "U+E01F"],
				["󾟣", "U+FE7E3"]
			],
			"🚗": ["U+1F697", "automobile", "1f697", ["", "U+E65E"],
				["", "U+E4B1"],
				["", "U+E01B"],
				["󾟤", "U+FE7E4"]
			],
			"🚙": ["U+1F699", "recreational vehicle", "1f699", ["", "U+E65F"],
				["", "U+E4B1"],
				["", "U+E42E"],
				["󾟥", "U+FE7E5"]
			],
			"🚌": ["U+1F68C", "bus", "1f68c", ["", "U+E660"],
				["", "U+E4AF"],
				["", "U+E159"],
				["󾟦", "U+FE7E6"]
			],
			"🚏": ["U+1F68F", "bus stop", "1f68f", ["-", "-"],
				["", "U+E4A7"],
				["", "U+E150"],
				["󾟧", "U+FE7E7"]
			],
			"🚢": ["U+1F6A2", "ship", "1f6a2", ["", "U+E661"],
				["", "U+EA82"],
				["", "U+E202"],
				["󾟨", "U+FE7E8"]
			],
			"✈": ["U+2708", "airplane", "2708", ["", "U+E662"],
				["", "U+E4B3"],
				["", "U+E01D"],
				["󾟩", "U+FE7E9"]
			],
			"⛵": ["U+26F5", "sailboat", "26f5", ["", "U+E6A3"],
				["", "U+E4B4"],
				["", "U+E01C"],
				["󾟪", "U+FE7EA"]
			],
			"🚉": ["U+1F689", "station", "1f689", ["-", "-"],
				["", "U+EB6D"],
				["", "U+E039"],
				["󾟬", "U+FE7EC"]
			],
			"🚀": ["U+1F680", "rocket", "1f680", ["-", "-"],
				["", "U+E5C8"],
				["", "U+E10D"],
				["󾟭", "U+FE7ED"]
			],
			"🚤": ["U+1F6A4", "speedboat", "1f6a4", ["", "U+E6A3"],
				["", "U+E4B4"],
				["", "U+E135"],
				["󾟮", "U+FE7EE"]
			],
			"🚕": ["U+1F695", "taxi", "1f695", ["", "U+E65E"],
				["", "U+E4B1"],
				["", "U+E15A"],
				["󾟯", "U+FE7EF"]
			],
			"🚚": ["U+1F69A", "delivery truck", "1f69a", ["-", "-"],
				["", "U+E4B2"],
				["", "U+E42F"],
				["󾟱", "U+FE7F1"]
			],
			"🚒": ["U+1F692", "fire engine", "1f692", ["-", "-"],
				["", "U+EADF"],
				["", "U+E430"],
				["󾟲", "U+FE7F2"]
			],
			"🚑": ["U+1F691", "ambulance", "1f691", ["-", "-"],
				["", "U+EAE0"],
				["", "U+E431"],
				["󾟳", "U+FE7F3"]
			],
			"🚓": ["U+1F693", "police car", "1f693", ["-", "-"],
				["", "U+EAE1"],
				["", "U+E432"],
				["󾟴", "U+FE7F4"]
			],
			"⛽": ["U+26FD", "fuel pump", "26fd", ["", "U+E66B"],
				["", "U+E571"],
				["", "U+E03A"],
				["󾟵", "U+FE7F5"]
			],
			"🅿": ["U+1F17F", "negative squared latin capital letter p", "1f17f", ["", "U+E66C"],
				["", "U+E4A6"],
				["", "U+E14F"],
				["󾟶", "U+FE7F6"]
			],
			"🚥": ["U+1F6A5", "horizontal traffic light", "1f6a5", ["", "U+E66D"],
				["", "U+E46A"],
				["", "U+E14E"],
				["󾟷", "U+FE7F7"]
			],
			"🚧": ["U+1F6A7", "construction sign", "1f6a7", ["-", "-"],
				["", "U+E5D7"],
				["", "U+E137"],
				["󾟸", "U+FE7F8"]
			],
			"🚨": ["U+1F6A8", "police cars revolving light", "1f6a8", ["-", "-"],
				["", "U+EB73"],
				["", "U+E432"],
				["󾟹", "U+FE7F9"]
			],
			"♨": ["U+2668", "hot springs", "2668", ["", "U+E6F7"],
				["", "U+E4BC"],
				["", "U+E123"],
				["󾟺", "U+FE7FA"]
			],
			"⛺": ["U+26FA", "tent", "26fa", ["-", "-"],
				["", "U+E5D0"],
				["", "U+E122"],
				["󾟻", "U+FE7FB"]
			],
			"🎠": ["U+1F3A0", "carousel horse", "1f3a0", ["", "U+E679"],
				["-", "-"],
				["-", "-"],
				["󾟼", "U+FE7FC"]
			],
			"🎡": ["U+1F3A1", "ferris wheel", "1f3a1", ["-", "-"],
				["", "U+E46D"],
				["", "U+E124"],
				["󾟽", "U+FE7FD"]
			],
			"🎢": ["U+1F3A2", "roller coaster", "1f3a2", ["-", "-"],
				["", "U+EAE2"],
				["", "U+E433"],
				["󾟾", "U+FE7FE"]
			],
			"🎣": ["U+1F3A3", "fishing pole and fish", "1f3a3", ["", "U+E751"],
				["", "U+EB42"],
				["", "U+E019"],
				["󾟿", "U+FE7FF"]
			],
			"🎤": ["U+1F3A4", "microphone", "1f3a4", ["", "U+E676"],
				["", "U+E503"],
				["", "U+E03C"],
				["󾠀", "U+FE800"]
			],
			"🎥": ["U+1F3A5", "movie camera", "1f3a5", ["", "U+E677"],
				["", "U+E517"],
				["", "U+E03D"],
				["󾠁", "U+FE801"]
			],
			"🎦": ["U+1F3A6", "cinema", "1f3a6", ["", "U+E677"],
				["", "U+E517"],
				["", "U+E507"],
				["󾠂", "U+FE802"]
			],
			"🎧": ["U+1F3A7", "headphone", "1f3a7", ["", "U+E67A"],
				["", "U+E508"],
				["", "U+E30A"],
				["󾠃", "U+FE803"]
			],
			"🎨": ["U+1F3A8", "artist palette", "1f3a8", ["", "U+E67B"],
				["", "U+E59C"],
				["", "U+E502"],
				["󾠄", "U+FE804"]
			],
			"🎩": ["U+1F3A9", "top hat", "1f3a9", ["", "U+E67C"],
				["", "U+EAF5"],
				["", "U+E503"],
				["󾠅", "U+FE805"]
			],
			"🎪": ["U+1F3AA", "circus tent", "1f3aa", ["", "U+E67D"],
				["", "U+E59E"],
				["-", "-"],
				["󾠆", "U+FE806"]
			],
			"🎫": ["U+1F3AB", "ticket", "1f3ab", ["", "U+E67E"],
				["", "U+E49E"],
				["", "U+E125"],
				["󾠇", "U+FE807"]
			],
			"🎬": ["U+1F3AC", "clapper board", "1f3ac", ["", "U+E6AC"],
				["", "U+E4BE"],
				["", "U+E324"],
				["󾠈", "U+FE808"]
			],
			"🎭": ["U+1F3AD", "performing arts", "1f3ad", ["-", "-"],
				["", "U+E59D"],
				["", "U+E503"],
				["󾠉", "U+FE809"]
			],
			"🎮": ["U+1F3AE", "video game", "1f3ae", ["", "U+E68B"],
				["", "U+E4C6"],
				["-", "-"],
				["󾠊", "U+FE80A"]
			],
			"🀄": ["U+1F004", "mahjong tile red dragon", "1f004", ["-", "-"],
				["", "U+E5D1"],
				["", "U+E12D"],
				["󾠋", "U+FE80B"]
			],
			"🎯": ["U+1F3AF", "direct hit", "1f3af", ["-", "-"],
				["", "U+E4C5"],
				["", "U+E130"],
				["󾠌", "U+FE80C"]
			],
			"🎰": ["U+1F3B0", "slot machine", "1f3b0", ["-", "-"],
				["", "U+E46E"],
				["", "U+E133"],
				["󾠍", "U+FE80D"]
			],
			"🎱": ["U+1F3B1", "billiards", "1f3b1", ["-", "-"],
				["", "U+EADD"],
				["", "U+E42C"],
				["󾠎", "U+FE80E"]
			],
			"🎲": ["U+1F3B2", "game die", "1f3b2", ["-", "-"],
				["", "U+E4C8"],
				["-", "-"],
				["󾠏", "U+FE80F"]
			],
			"🎳": ["U+1F3B3", "bowling", "1f3b3", ["-", "-"],
				["", "U+EB43"],
				["-", "-"],
				["󾠐", "U+FE810"]
			],
			"🎴": ["U+1F3B4", "flower playing cards", "1f3b4", ["-", "-"],
				["", "U+EB6E"],
				["-", "-"],
				["󾠑", "U+FE811"]
			],
			"🃏": ["U+1F0CF", "playing card black joker", "1f0cf", ["-", "-"],
				["", "U+EB6F"],
				["-", "-"],
				["󾠒", "U+FE812"]
			],
			"🎵": ["U+1F3B5", "musical note", "1f3b5", ["", "U+E6F6"],
				["", "U+E5BE"],
				["", "U+E03E"],
				["󾠓", "U+FE813"]
			],
			"🎶": ["U+1F3B6", "multiple musical notes", "1f3b6", ["", "U+E6FF"],
				["", "U+E505"],
				["", "U+E326"],
				["󾠔", "U+FE814"]
			],
			"🎷": ["U+1F3B7", "saxophone", "1f3b7", ["-", "-"],
				["-", "-"],
				["", "U+E040"],
				["󾠕", "U+FE815"]
			],
			"🎸": ["U+1F3B8", "guitar", "1f3b8", ["-", "-"],
				["", "U+E506"],
				["", "U+E041"],
				["󾠖", "U+FE816"]
			],
			"🎹": ["U+1F3B9", "musical keyboard", "1f3b9", ["-", "-"],
				["", "U+EB40"],
				["-", "-"],
				["󾠗", "U+FE817"]
			],
			"🎺": ["U+1F3BA", "trumpet", "1f3ba", ["-", "-"],
				["", "U+EADC"],
				["", "U+E042"],
				["󾠘", "U+FE818"]
			],
			"🎻": ["U+1F3BB", "violin", "1f3bb", ["-", "-"],
				["", "U+E507"],
				["-", "-"],
				["󾠙", "U+FE819"]
			],
			"🎼": ["U+1F3BC", "musical score", "1f3bc", ["", "U+E6FF"],
				["", "U+EACC"],
				["", "U+E326"],
				["󾠚", "U+FE81A"]
			],
			"〽": ["U+303D", "part alternation mark", "303d", ["-", "-"],
				["-", "-"],
				["", "U+E12C"],
				["󾠛", "U+FE81B"]
			],
			"📷": ["U+1F4F7", "camera", "1f4f7", ["", "U+E681"],
				["", "U+E515"],
				["", "U+E008"],
				["󾓯", "U+FE4EF"]
			],
			"📹": ["U+1F4F9", "video camera", "1f4f9", ["", "U+E677"],
				["", "U+E57E"],
				["", "U+E03D"],
				["󾓹", "U+FE4F9"]
			],
			"📺": ["U+1F4FA", "television", "1f4fa", ["", "U+E68A"],
				["", "U+E502"],
				["", "U+E12A"],
				["󾠜", "U+FE81C"]
			],
			"📻": ["U+1F4FB", "radio", "1f4fb", ["-", "-"],
				["", "U+E5B9"],
				["", "U+E128"],
				["󾠟", "U+FE81F"]
			],
			"📼": ["U+1F4FC", "videocassette", "1f4fc", ["-", "-"],
				["", "U+E580"],
				["", "U+E129"],
				["󾠠", "U+FE820"]
			],
			"💋": ["U+1F48B", "kiss mark", "1f48b", ["", "U+E6F9"],
				["", "U+E4EB"],
				["", "U+E003"],
				["󾠣", "U+FE823"]
			],
			"💌": ["U+1F48C", "love letter", "1f48c", ["", "U+E717"],
				["", "U+EB78"],
				["", "U+E103 U+E328"],
				["󾠤", "U+FE824"]
			],
			"💍": ["U+1F48D", "ring", "1f48d", ["", "U+E71B"],
				["", "U+E514"],
				["", "U+E034"],
				["󾠥", "U+FE825"]
			],
			"💎": ["U+1F48E", "gem stone", "1f48e", ["", "U+E71B"],
				["", "U+E514"],
				["", "U+E035"],
				["󾠦", "U+FE826"]
			],
			"💏": ["U+1F48F", "kiss", "1f48f", ["", "U+E6F9"],
				["", "U+E5CA"],
				["", "U+E111"],
				["󾠧", "U+FE827"]
			],
			"💐": ["U+1F490", "bouquet", "1f490", ["-", "-"],
				["", "U+EA95"],
				["", "U+E306"],
				["󾠨", "U+FE828"]
			],
			"💑": ["U+1F491", "couple with heart", "1f491", ["", "U+E6ED"],
				["", "U+EADA"],
				["", "U+E425"],
				["󾠩", "U+FE829"]
			],
			"💒": ["U+1F492", "wedding", "1f492", ["-", "-"],
				["", "U+E5BB"],
				["", "U+E43D"],
				["󾠪", "U+FE82A"]
			],
			"🔞": ["U+1F51E", "no one under eighteen symbol", "1f51e", ["-", "-"],
				["", "U+EA83"],
				["", "U+E207"],
				["󾬥", "U+FEB25"]
			],
			"©": ["U+00A9", "copyright sign", "a9", ["", "U+E731"],
				["", "U+E558"],
				["", "U+E24E"],
				["󾬩", "U+FEB29"]
			],
			"®": ["U+00AE", "registered sign", "ae", ["", "U+E736"],
				["", "U+E559"],
				["", "U+E24F"],
				["󾬭", "U+FEB2D"]
			],
			"™": ["U+2122", "trade mark sign", "2122", ["", "U+E732"],
				["", "U+E54E"],
				["", "U+E537"],
				["󾬪", "U+FEB2A"]
			],
			"ℹ": ["U+2139", "information source", "2139", ["-", "-"],
				["", "U+E533"],
				["-", "-"],
				["󾭇", "U+FEB47"]
			],
			"#⃣": ["U+0023 U+20E3", "hash key", "2320e3", ["", "U+E6E0"],
				["", "U+EB84"],
				["", "U+E210"],
				["󾠬", "U+FE82C"]
			],
			"1⃣": ["U+0031 U+20E3", "keycap 1", "3120e3", ["", "U+E6E2"],
				["", "U+E522"],
				["", "U+E21C"],
				["󾠮", "U+FE82E"]
			],
			"2⃣": ["U+0032 U+20E3", "keycap 2", "3220e3", ["", "U+E6E3"],
				["", "U+E523"],
				["", "U+E21D"],
				["󾠯", "U+FE82F"]
			],
			"3⃣": ["U+0033 U+20E3", "keycap 3", "3320e3", ["", "U+E6E4"],
				["", "U+E524"],
				["", "U+E21E"],
				["󾠰", "U+FE830"]
			],
			"4⃣": ["U+0034 U+20E3", "keycap 4", "3420e3", ["", "U+E6E5"],
				["", "U+E525"],
				["", "U+E21F"],
				["󾠱", "U+FE831"]
			],
			"5⃣": ["U+0035 U+20E3", "keycap 5", "3520e3", ["", "U+E6E6"],
				["", "U+E526"],
				["", "U+E220"],
				["󾠲", "U+FE832"]
			],
			"6⃣": ["U+0036 U+20E3", "keycap 6", "3620e3", ["", "U+E6E7"],
				["", "U+E527"],
				["", "U+E221"],
				["󾠳", "U+FE833"]
			],
			"7⃣": ["U+0037 U+20E3", "keycap 7", "3720e3", ["", "U+E6E8"],
				["", "U+E528"],
				["", "U+E222"],
				["󾠴", "U+FE834"]
			],
			"8⃣": ["U+0038 U+20E3", "keycap 8", "3820e3", ["", "U+E6E9"],
				["", "U+E529"],
				["", "U+E223"],
				["󾠵", "U+FE835"]
			],
			"9⃣": ["U+0039 U+20E3", "keycap 9", "3920e3", ["", "U+E6EA"],
				["", "U+E52A"],
				["", "U+E224"],
				["󾠶", "U+FE836"]
			],
			"0⃣": ["U+0030 U+20E3", "keycap 0", "3020e3", ["", "U+E6EB"],
				["", "U+E5AC"],
				["", "U+E225"],
				["󾠷", "U+FE837"]
			],
			"🔟": ["U+1F51F", "keycap ten", "1f51f", ["-", "-"],
				["", "U+E52B"],
				["-", "-"],
				["󾠻", "U+FE83B"]
			],
			"📶": ["U+1F4F6", "antenna with bars", "1f4f6", ["-", "-"],
				["", "U+EA84"],
				["", "U+E20B"],
				["󾠸", "U+FE838"]
			],
			"📳": ["U+1F4F3", "vibration mode", "1f4f3", ["-", "-"],
				["", "U+EA90"],
				["", "U+E250"],
				["󾠹", "U+FE839"]
			],
			"📴": ["U+1F4F4", "mobile phone off", "1f4f4", ["-", "-"],
				["", "U+EA91"],
				["", "U+E251"],
				["󾠺", "U+FE83A"]
			],
			"🍔": ["U+1F354", "hamburger", "1f354", ["", "U+E673"],
				["", "U+E4D6"],
				["", "U+E120"],
				["󾥠", "U+FE960"]
			],
			"🍙": ["U+1F359", "rice ball", "1f359", ["", "U+E749"],
				["", "U+E4D5"],
				["", "U+E342"],
				["󾥡", "U+FE961"]
			],
			"🍰": ["U+1F370", "shortcake", "1f370", ["", "U+E74A"],
				["", "U+E4D0"],
				["", "U+E046"],
				["󾥢", "U+FE962"]
			],
			"🍜": ["U+1F35C", "steaming bowl", "1f35c", ["", "U+E74C"],
				["", "U+E5B4"],
				["", "U+E340"],
				["󾥣", "U+FE963"]
			],
			"🍞": ["U+1F35E", "bread", "1f35e", ["", "U+E74D"],
				["", "U+EAAF"],
				["", "U+E339"],
				["󾥤", "U+FE964"]
			],
			"🍳": ["U+1F373", "cooking", "1f373", ["-", "-"],
				["", "U+E4D1"],
				["", "U+E147"],
				["󾥥", "U+FE965"]
			],
			"🍦": ["U+1F366", "soft ice cream", "1f366", ["-", "-"],
				["", "U+EAB0"],
				["", "U+E33A"],
				["󾥦", "U+FE966"]
			],
			"🍟": ["U+1F35F", "french fries", "1f35f", ["-", "-"],
				["", "U+EAB1"],
				["", "U+E33B"],
				["󾥧", "U+FE967"]
			],
			"🍡": ["U+1F361", "dango", "1f361", ["-", "-"],
				["", "U+EAB2"],
				["", "U+E33C"],
				["󾥨", "U+FE968"]
			],
			"🍘": ["U+1F358", "rice cracker", "1f358", ["-", "-"],
				["", "U+EAB3"],
				["", "U+E33D"],
				["󾥩", "U+FE969"]
			],
			"🍚": ["U+1F35A", "cooked rice", "1f35a", ["", "U+E74C"],
				["", "U+EAB4"],
				["", "U+E33E"],
				["󾥪", "U+FE96A"]
			],
			"🍝": ["U+1F35D", "spaghetti", "1f35d", ["-", "-"],
				["", "U+EAB5"],
				["", "U+E33F"],
				["󾥫", "U+FE96B"]
			],
			"🍛": ["U+1F35B", "curry and rice", "1f35b", ["-", "-"],
				["", "U+EAB6"],
				["", "U+E341"],
				["󾥬", "U+FE96C"]
			],
			"🍢": ["U+1F362", "oden", "1f362", ["-", "-"],
				["", "U+EAB7"],
				["", "U+E343"],
				["󾥭", "U+FE96D"]
			],
			"🍣": ["U+1F363", "sushi", "1f363", ["-", "-"],
				["", "U+EAB8"],
				["", "U+E344"],
				["󾥮", "U+FE96E"]
			],
			"🍱": ["U+1F371", "bento box", "1f371", ["-", "-"],
				["", "U+EABD"],
				["", "U+E34C"],
				["󾥯", "U+FE96F"]
			],
			"🍲": ["U+1F372", "pot of food", "1f372", ["-", "-"],
				["", "U+EABE"],
				["", "U+E34D"],
				["󾥰", "U+FE970"]
			],
			"🍧": ["U+1F367", "shaved ice", "1f367", ["-", "-"],
				["", "U+EAEA"],
				["", "U+E43F"],
				["󾥱", "U+FE971"]
			],
			"🍖": ["U+1F356", "meat on bone", "1f356", ["-", "-"],
				["", "U+E4C4"],
				["-", "-"],
				["󾥲", "U+FE972"]
			],
			"🍥": ["U+1F365", "fish cake with swirl design", "1f365", ["", "U+E643"],
				["", "U+E4ED"],
				["-", "-"],
				["󾥳", "U+FE973"]
			],
			"🍠": ["U+1F360", "roasted sweet potato", "1f360", ["-", "-"],
				["", "U+EB3A"],
				["-", "-"],
				["󾥴", "U+FE974"]
			],
			"🍕": ["U+1F355", "slice of pizza", "1f355", ["-", "-"],
				["", "U+EB3B"],
				["-", "-"],
				["󾥵", "U+FE975"]
			],
			"🍗": ["U+1F357", "poultry leg", "1f357", ["-", "-"],
				["", "U+EB3C"],
				["-", "-"],
				["󾥶", "U+FE976"]
			],
			"🍨": ["U+1F368", "ice cream", "1f368", ["-", "-"],
				["", "U+EB4A"],
				["-", "-"],
				["󾥷", "U+FE977"]
			],
			"🍩": ["U+1F369", "doughnut", "1f369", ["-", "-"],
				["", "U+EB4B"],
				["-", "-"],
				["󾥸", "U+FE978"]
			],
			"🍪": ["U+1F36A", "cookie", "1f36a", ["-", "-"],
				["", "U+EB4C"],
				["-", "-"],
				["󾥹", "U+FE979"]
			],
			"🍫": ["U+1F36B", "chocolate bar", "1f36b", ["-", "-"],
				["", "U+EB4D"],
				["-", "-"],
				["󾥺", "U+FE97A"]
			],
			"🍬": ["U+1F36C", "candy", "1f36c", ["-", "-"],
				["", "U+EB4E"],
				["-", "-"],
				["󾥻", "U+FE97B"]
			],
			"🍭": ["U+1F36D", "lollipop", "1f36d", ["-", "-"],
				["", "U+EB4F"],
				["-", "-"],
				["󾥼", "U+FE97C"]
			],
			"🍮": ["U+1F36E", "custard", "1f36e", ["-", "-"],
				["", "U+EB56"],
				["-", "-"],
				["󾥽", "U+FE97D"]
			],
			"🍯": ["U+1F36F", "honey pot", "1f36f", ["-", "-"],
				["", "U+EB59"],
				["-", "-"],
				["󾥾", "U+FE97E"]
			],
			"🍤": ["U+1F364", "fried shrimp", "1f364", ["-", "-"],
				["", "U+EB70"],
				["-", "-"],
				["󾥿", "U+FE97F"]
			],
			"🍴": ["U+1F374", "fork and knife", "1f374", ["", "U+E66F"],
				["", "U+E4AC"],
				["", "U+E043"],
				["󾦀", "U+FE980"]
			],
			"☕": ["U+2615", "hot beverage", "2615", ["", "U+E670"],
				["", "U+E597"],
				["", "U+E045"],
				["󾦁", "U+FE981"]
			],
			"🍸": ["U+1F378", "cocktail glass", "1f378", ["", "U+E671"],
				["", "U+E4C2"],
				["", "U+E044"],
				["󾦂", "U+FE982"]
			],
			"🍺": ["U+1F37A", "beer mug", "1f37a", ["", "U+E672"],
				["", "U+E4C3"],
				["", "U+E047"],
				["󾦃", "U+FE983"]
			],
			"🍵": ["U+1F375", "teacup without handle", "1f375", ["", "U+E71E"],
				["", "U+EAAE"],
				["", "U+E338"],
				["󾦄", "U+FE984"]
			],
			"🍶": ["U+1F376", "sake bottle and cup", "1f376", ["", "U+E74B"],
				["", "U+EA97"],
				["", "U+E30B"],
				["󾦅", "U+FE985"]
			],
			"🍷": ["U+1F377", "wine glass", "1f377", ["", "U+E756"],
				["", "U+E4C1"],
				["", "U+E044"],
				["󾦆", "U+FE986"]
			],
			"🍻": ["U+1F37B", "clinking beer mugs", "1f37b", ["", "U+E672"],
				["", "U+EA98"],
				["", "U+E30C"],
				["󾦇", "U+FE987"]
			],
			"🍹": ["U+1F379", "tropical drink", "1f379", ["", "U+E671"],
				["", "U+EB3E"],
				["", "U+E044"],
				["󾦈", "U+FE988"]
			],
			"↗": ["U+2197", "north east arrow", "2197", ["", "U+E678"],
				["", "U+E555"],
				["", "U+E236"],
				["󾫰", "U+FEAF0"]
			],
			"↘": ["U+2198", "south east arrow", "2198", ["", "U+E696"],
				["", "U+E54D"],
				["", "U+E238"],
				["󾫱", "U+FEAF1"]
			],
			"↖": ["U+2196", "north west arrow", "2196", ["", "U+E697"],
				["", "U+E54C"],
				["", "U+E237"],
				["󾫲", "U+FEAF2"]
			],
			"↙": ["U+2199", "south west arrow", "2199", ["", "U+E6A5"],
				["", "U+E556"],
				["", "U+E239"],
				["󾫳", "U+FEAF3"]
			],
			"⤴": ["U+2934", "arrow pointing rightwards then curving upwards", "2934", ["", "U+E6F5"],
				["", "U+EB2D"],
				["", "U+E236"],
				["󾫴", "U+FEAF4"]
			],
			"⤵": ["U+2935", "arrow pointing rightwards then curving downwards", "2935", ["", "U+E700"],
				["", "U+EB2E"],
				["", "U+E238"],
				["󾫵", "U+FEAF5"]
			],
			"↔": ["U+2194", "left right arrow", "2194", ["", "U+E73C"],
				["", "U+EB7A"],
				["-", "-"],
				["󾫶", "U+FEAF6"]
			],
			"↕": ["U+2195", "up down arrow", "2195", ["", "U+E73D"],
				["", "U+EB7B"],
				["-", "-"],
				["󾫷", "U+FEAF7"]
			],
			"⬆": ["U+2B06", "upwards black arrow", "2b06", ["-", "-"],
				["", "U+E53F"],
				["", "U+E232"],
				["󾫸", "U+FEAF8"]
			],
			"⬇": ["U+2B07", "downwards black arrow", "2b07", ["-", "-"],
				["", "U+E540"],
				["", "U+E233"],
				["󾫹", "U+FEAF9"]
			],
			"➡": ["U+27A1", "black rightwards arrow", "27a1", ["-", "-"],
				["", "U+E552"],
				["", "U+E234"],
				["󾫺", "U+FEAFA"]
			],
			"⬅": ["U+2B05", "leftwards black arrow", "2b05", ["-", "-"],
				["", "U+E553"],
				["", "U+E235"],
				["󾫻", "U+FEAFB"]
			],
			"▶": ["U+25B6", "black right-pointing triangle", "25b6", ["-", "-"],
				["", "U+E52E"],
				["", "U+E23A"],
				["󾫼", "U+FEAFC"]
			],
			"◀": ["U+25C0", "black left-pointing triangle", "25c0", ["-", "-"],
				["", "U+E52D"],
				["", "U+E23B"],
				["󾫽", "U+FEAFD"]
			],
			"⏩": ["U+23E9", "black right-pointing double triangle", "23e9", ["-", "-"],
				["", "U+E530"],
				["", "U+E23C"],
				["󾫾", "U+FEAFE"]
			],
			"⏪": ["U+23EA", "black left-pointing double triangle", "23ea", ["-", "-"],
				["", "U+E52F"],
				["", "U+E23D"],
				["󾫿", "U+FEAFF"]
			],
			"⏫": ["U+23EB", "black up-pointing double triangle", "23eb", ["-", "-"],
				["", "U+E545"],
				["-", "-"],
				["󾬃", "U+FEB03"]
			],
			"⏬": ["U+23EC", "black down-pointing double triangle", "23ec", ["-", "-"],
				["", "U+E544"],
				["-", "-"],
				["󾬂", "U+FEB02"]
			],
			"🔺": ["U+1F53A", "up-pointing red triangle", "1f53a", ["-", "-"],
				["", "U+E55A"],
				["-", "-"],
				["󾭸", "U+FEB78"]
			],
			"🔻": ["U+1F53B", "down-pointing red triangle", "1f53b", ["-", "-"],
				["", "U+E55B"],
				["-", "-"],
				["󾭹", "U+FEB79"]
			],
			"🔼": ["U+1F53C", "up-pointing small red triangle", "1f53c", ["-", "-"],
				["", "U+E543"],
				["-", "-"],
				["󾬁", "U+FEB01"]
			],
			"🔽": ["U+1F53D", "down-pointing small red triangle", "1f53d", ["-", "-"],
				["", "U+E542"],
				["-", "-"],
				["󾬀", "U+FEB00"]
			],
			"⭕": ["U+2B55", "heavy large circle", "2b55", ["", "U+E6A0"],
				["", "U+EAAD"],
				["", "U+E332"],
				["󾭄", "U+FEB44"]
			],
			"❌": ["U+274C", "cross mark", "274c", ["-", "-"],
				["", "U+E550"],
				["", "U+E333"],
				["󾭅", "U+FEB45"]
			],
			"❎": ["U+274E", "negative squared cross mark", "274e", ["-", "-"],
				["", "U+E551"],
				["", "U+E333"],
				["󾭆", "U+FEB46"]
			],
			"❗": ["U+2757", "heavy exclamation mark symbol", "2757", ["", "U+E702"],
				["", "U+E482"],
				["", "U+E021"],
				["󾬄", "U+FEB04"]
			],
			"⁉": ["U+2049", "exclamation question mark", "2049", ["", "U+E703"],
				["", "U+EB2F"],
				["-", "-"],
				["󾬅", "U+FEB05"]
			],
			"‼": ["U+203C", "double exclamation mark", "203c", ["", "U+E704"],
				["", "U+EB30"],
				["-", "-"],
				["󾬆", "U+FEB06"]
			],
			"❓": ["U+2753", "black question mark ornament", "2753", ["-", "-"],
				["", "U+E483"],
				["", "U+E020"],
				["󾬉", "U+FEB09"]
			],
			"❔": ["U+2754", "white question mark ornament", "2754", ["-", "-"],
				["", "U+E483"],
				["", "U+E336"],
				["󾬊", "U+FEB0A"]
			],
			"❕": ["U+2755", "white exclamation mark ornament", "2755", ["", "U+E702"],
				["", "U+E482"],
				["", "U+E337"],
				["󾬋", "U+FEB0B"]
			],
			"〰": ["U+3030", "wavy dash", "3030", ["", "U+E709"],
				["-", "-"],
				["-", "-"],
				["󾬇", "U+FEB07"]
			],
			"➰": ["U+27B0", "curly loop", "27b0", ["", "U+E70A"],
				["", "U+EB31"],
				["-", "-"],
				["󾬈", "U+FEB08"]
			],
			"➿": ["U+27BF", "double curly loop", "27bf", ["", "U+E6DF"],
				["-", "-"],
				["", "U+E211"],
				["󾠫", "U+FE82B"]
			],
			"❤": ["U+2764", "heavy black heart", "2764", ["", "U+E6EC"],
				["", "U+E595"],
				["", "U+E022"],
				["󾬌", "U+FEB0C"]
			],
			"💓": ["U+1F493", "beating heart", "1f493", ["", "U+E6ED"],
				["", "U+EB75"],
				["", "U+E327"],
				["󾬍", "U+FEB0D"]
			],
			"💔": ["U+1F494", "broken heart", "1f494", ["", "U+E6EE"],
				["", "U+E477"],
				["", "U+E023"],
				["󾬎", "U+FEB0E"]
			],
			"💕": ["U+1F495", "two hearts", "1f495", ["", "U+E6EF"],
				["", "U+E478"],
				["", "U+E327"],
				["󾬏", "U+FEB0F"]
			],
			"💖": ["U+1F496", "sparkling heart", "1f496", ["", "U+E6EC"],
				["", "U+EAA6"],
				["", "U+E327"],
				["󾬐", "U+FEB10"]
			],
			"💗": ["U+1F497", "growing heart", "1f497", ["", "U+E6ED"],
				["", "U+EB75"],
				["", "U+E328"],
				["󾬑", "U+FEB11"]
			],
			"💘": ["U+1F498", "heart with arrow", "1f498", ["", "U+E6EC"],
				["", "U+E4EA"],
				["", "U+E329"],
				["󾬒", "U+FEB12"]
			],
			"💙": ["U+1F499", "blue heart", "1f499", ["", "U+E6EC"],
				["", "U+EAA7"],
				["", "U+E32A"],
				["󾬓", "U+FEB13"]
			],
			"💚": ["U+1F49A", "green heart", "1f49a", ["", "U+E6EC"],
				["", "U+EAA8"],
				["", "U+E32B"],
				["󾬔", "U+FEB14"]
			],
			"💛": ["U+1F49B", "yellow heart", "1f49b", ["", "U+E6EC"],
				["", "U+EAA9"],
				["", "U+E32C"],
				["󾬕", "U+FEB15"]
			],
			"💜": ["U+1F49C", "purple heart", "1f49c", ["", "U+E6EC"],
				["", "U+EAAA"],
				["", "U+E32D"],
				["󾬖", "U+FEB16"]
			],
			"💝": ["U+1F49D", "heart with ribbon", "1f49d", ["", "U+E6EC"],
				["", "U+EB54"],
				["", "U+E437"],
				["󾬗", "U+FEB17"]
			],
			"💞": ["U+1F49E", "revolving hearts", "1f49e", ["", "U+E6ED"],
				["", "U+E5AF"],
				["", "U+E327"],
				["󾬘", "U+FEB18"]
			],
			"💟": ["U+1F49F", "heart decoration", "1f49f", ["", "U+E6F8"],
				["", "U+E595"],
				["", "U+E204"],
				["󾬙", "U+FEB19"]
			],
			"♥": ["U+2665", "black heart suit", "2665", ["", "U+E68D"],
				["", "U+EAA5"],
				["", "U+E20C"],
				["󾬚", "U+FEB1A"]
			],
			"♠": ["U+2660", "black spade suit", "2660", ["", "U+E68E"],
				["", "U+E5A1"],
				["", "U+E20E"],
				["󾬛", "U+FEB1B"]
			],
			"♦": ["U+2666", "black diamond suit", "2666", ["", "U+E68F"],
				["", "U+E5A2"],
				["", "U+E20D"],
				["󾬜", "U+FEB1C"]
			],
			"♣": ["U+2663", "black club suit", "2663", ["", "U+E690"],
				["", "U+E5A3"],
				["", "U+E20F"],
				["󾬝", "U+FEB1D"]
			],
			"🚬": ["U+1F6AC", "smoking symbol", "1f6ac", ["", "U+E67F"],
				["", "U+E47D"],
				["", "U+E30E"],
				["󾬞", "U+FEB1E"]
			],
			"🚭": ["U+1F6AD", "no smoking symbol", "1f6ad", ["", "U+E680"],
				["", "U+E47E"],
				["", "U+E208"],
				["󾬟", "U+FEB1F"]
			],
			"♿": ["U+267F", "wheelchair symbol", "267f", ["", "U+E69B"],
				["", "U+E47F"],
				["", "U+E20A"],
				["󾬠", "U+FEB20"]
			],
			"🚩": ["U+1F6A9", "triangular flag on post", "1f6a9", ["", "U+E6DE"],
				["", "U+EB2C"],
				["-", "-"],
				["󾬢", "U+FEB22"]
			],
			"⚠": ["U+26A0", "warning sign", "26a0", ["", "U+E737"],
				["", "U+E481"],
				["", "U+E252"],
				["󾬣", "U+FEB23"]
			],
			"⛔": ["U+26D4", "no entry", "26d4", ["", "U+E72F"],
				["", "U+E484"],
				["", "U+E137"],
				["󾬦", "U+FEB26"]
			],
			"♻": ["U+267B", "black universal recycling symbol", "267b", ["", "U+E735"],
				["", "U+EB79"],
				["-", "-"],
				["󾬬", "U+FEB2C"]
			],
			"🚲": ["U+1F6B2", "bicycle", "1f6b2", ["", "U+E71D"],
				["", "U+E4AE"],
				["", "U+E136"],
				["󾟫", "U+FE7EB"]
			],
			"🚶": ["U+1F6B6", "pedestrian", "1f6b6", ["", "U+E733"],
				["", "U+EB72"],
				["", "U+E201"],
				["󾟰", "U+FE7F0"]
			],
			"🚹": ["U+1F6B9", "mens symbol", "1f6b9", ["-", "-"],
				["-", "-"],
				["", "U+E138"],
				["󾬳", "U+FEB33"]
			],
			"🚺": ["U+1F6BA", "womens symbol", "1f6ba", ["-", "-"],
				["-", "-"],
				["", "U+E139"],
				["󾬴", "U+FEB34"]
			],
			"🛀": ["U+1F6C0", "bath", "1f6c0", ["", "U+E6F7"],
				["", "U+E5D8"],
				["", "U+E13F"],
				["󾔅", "U+FE505"]
			],
			"🚻": ["U+1F6BB", "restroom", "1f6bb", ["", "U+E66E"],
				["", "U+E4A5"],
				["", "U+E151"],
				["󾔆", "U+FE506"]
			],
			"🚽": ["U+1F6BD", "toilet", "1f6bd", ["", "U+E66E"],
				["", "U+E4A5"],
				["", "U+E140"],
				["󾔇", "U+FE507"]
			],
			"🚾": ["U+1F6BE", "water closet", "1f6be", ["", "U+E66E"],
				["", "U+E4A5"],
				["", "U+E309"],
				["󾔈", "U+FE508"]
			],
			"🚼": ["U+1F6BC", "baby symbol", "1f6bc", ["-", "-"],
				["", "U+EB18"],
				["", "U+E13A"],
				["󾬵", "U+FEB35"]
			],
			"🚪": ["U+1F6AA", "door", "1f6aa", ["", "U+E714"],
				["-", "-"],
				["-", "-"],
				["󾓳", "U+FE4F3"]
			],
			"🚫": ["U+1F6AB", "no entry sign", "1f6ab", ["", "U+E738"],
				["", "U+E541"],
				["-", "-"],
				["󾭈", "U+FEB48"]
			],
			"✔": ["U+2714", "heavy check mark", "2714", ["-", "-"],
				["", "U+E557"],
				["-", "-"],
				["󾭉", "U+FEB49"]
			],
			"🆑": ["U+1F191", "squared cl", "1f191", ["", "U+E6DB"],
				["", "U+E5AB"],
				["-", "-"],
				["󾮄", "U+FEB84"]
			],
			"🆒": ["U+1F192", "squared cool", "1f192", ["-", "-"],
				["", "U+EA85"],
				["", "U+E214"],
				["󾬸", "U+FEB38"]
			],
			"🆓": ["U+1F193", "squared free", "1f193", ["", "U+E6D7"],
				["", "U+E578"],
				["-", "-"],
				["󾬡", "U+FEB21"]
			],
			"🆔": ["U+1F194", "squared id", "1f194", ["", "U+E6D8"],
				["", "U+EA88"],
				["", "U+E229"],
				["󾮁", "U+FEB81"]
			],
			"🆕": ["U+1F195", "squared new", "1f195", ["", "U+E6DD"],
				["", "U+E5B5"],
				["", "U+E212"],
				["󾬶", "U+FEB36"]
			],
			"🆖": ["U+1F196", "squared ng", "1f196", ["", "U+E72F"],
				["-", "-"],
				["-", "-"],
				["󾬨", "U+FEB28"]
			],
			"🆗": ["U+1F197", "squared ok", "1f197", ["", "U+E70B"],
				["", "U+E5AD"],
				["", "U+E24D"],
				["󾬧", "U+FEB27"]
			],
			"🆘": ["U+1F198", "squared sos", "1f198", ["-", "-"],
				["", "U+E4E8"],
				["-", "-"],
				["󾭏", "U+FEB4F"]
			],
			"🆙": ["U+1F199", "squared up with exclamation mark", "1f199", ["-", "-"],
				["", "U+E50F"],
				["", "U+E213"],
				["󾬷", "U+FEB37"]
			],
			"🆚": ["U+1F19A", "squared vs", "1f19a", ["-", "-"],
				["", "U+E5D2"],
				["", "U+E12E"],
				["󾬲", "U+FEB32"]
			],
			"🈁": ["U+1F201", "squared katakana koko", "1f201", ["-", "-"],
				["-", "-"],
				["", "U+E203"],
				["󾬤", "U+FEB24"]
			],
			"🈂": ["U+1F202", "squared katakana sa", "1f202", ["-", "-"],
				["", "U+EA87"],
				["", "U+E228"],
				["󾬿", "U+FEB3F"]
			],
			"🈲": ["U+1F232", "squared cjk unified ideograph-7981", "1f232", ["", "U+E738"],
				["-", "-"],
				["-", "-"],
				["󾬮", "U+FEB2E"]
			],
			"🈳": ["U+1F233", "squared cjk unified ideograph-7a7a", "1f233", ["", "U+E739"],
				["", "U+EA8A"],
				["", "U+E22B"],
				["󾬯", "U+FEB2F"]
			],
			"🈴": ["U+1F234", "squared cjk unified ideograph-5408", "1f234", ["", "U+E73A"],
				["-", "-"],
				["-", "-"],
				["󾬰", "U+FEB30"]
			],
			"🈵": ["U+1F235", "squared cjk unified ideograph-6e80", "1f235", ["", "U+E73B"],
				["", "U+EA89"],
				["", "U+E22A"],
				["󾬱", "U+FEB31"]
			],
			"🈶": ["U+1F236", "squared cjk unified ideograph-6709", "1f236", ["-", "-"],
				["-", "-"],
				["", "U+E215"],
				["󾬹", "U+FEB39"]
			],
			"🈚": ["U+1F21A", "squared cjk unified ideograph-7121", "1f21a", ["-", "-"],
				["-", "-"],
				["", "U+E216"],
				["󾬺", "U+FEB3A"]
			],
			"🈷": ["U+1F237", "squared cjk unified ideograph-6708", "1f237", ["-", "-"],
				["-", "-"],
				["", "U+E217"],
				["󾬻", "U+FEB3B"]
			],
			"🈸": ["U+1F238", "squared cjk unified ideograph-7533", "1f238", ["-", "-"],
				["-", "-"],
				["", "U+E218"],
				["󾬼", "U+FEB3C"]
			],
			"🈹": ["U+1F239", "squared cjk unified ideograph-5272", "1f239", ["-", "-"],
				["", "U+EA86"],
				["", "U+E227"],
				["󾬾", "U+FEB3E"]
			],
			"🈯": ["U+1F22F", "squared cjk unified ideograph-6307", "1f22f", ["-", "-"],
				["", "U+EA8B"],
				["", "U+E22C"],
				["󾭀", "U+FEB40"]
			],
			"🈺": ["U+1F23A", "squared cjk unified ideograph-55b6", "1f23a", ["-", "-"],
				["", "U+EA8C"],
				["", "U+E22D"],
				["󾭁", "U+FEB41"]
			],
			"㊙": ["U+3299", "circled ideograph secret", "3299", ["", "U+E734"],
				["", "U+E4F1"],
				["", "U+E315"],
				["󾬫", "U+FEB2B"]
			],
			"㊗": ["U+3297", "circled ideograph congratulation", "3297", ["-", "-"],
				["", "U+EA99"],
				["", "U+E30D"],
				["󾭃", "U+FEB43"]
			],
			"🉐": ["U+1F250", "circled ideograph advantage", "1f250", ["-", "-"],
				["", "U+E4F7"],
				["", "U+E226"],
				["󾬽", "U+FEB3D"]
			],
			"🉑": ["U+1F251", "circled ideograph accept", "1f251", ["-", "-"],
				["", "U+EB01"],
				["-", "-"],
				["󾭐", "U+FEB50"]
			],
			"➕": ["U+2795", "heavy plus sign", "2795", ["-", "-"],
				["", "U+E53C"],
				["-", "-"],
				["󾭑", "U+FEB51"]
			],
			"➖": ["U+2796", "heavy minus sign", "2796", ["-", "-"],
				["", "U+E53D"],
				["-", "-"],
				["󾭒", "U+FEB52"]
			],
			"✖": ["U+2716", "heavy multiplication x", "2716", ["-", "-"],
				["", "U+E54F"],
				["", "U+E333"],
				["󾭓", "U+FEB53"]
			],
			"➗": ["U+2797", "heavy division sign", "2797", ["-", "-"],
				["", "U+E554"],
				["-", "-"],
				["󾭔", "U+FEB54"]
			],
			"💠": ["U+1F4A0", "diamond shape with a dot inside", "1f4a0", ["", "U+E6F8"],
				["-", "-"],
				["-", "-"],
				["󾭕", "U+FEB55"]
			],
			"💡": ["U+1F4A1", "electric light bulb", "1f4a1", ["", "U+E6FB"],
				["", "U+E476"],
				["", "U+E10F"],
				["󾭖", "U+FEB56"]
			],
			"💢": ["U+1F4A2", "anger symbol", "1f4a2", ["", "U+E6FC"],
				["", "U+E4E5"],
				["", "U+E334"],
				["󾭗", "U+FEB57"]
			],
			"💣": ["U+1F4A3", "bomb", "1f4a3", ["", "U+E6FE"],
				["", "U+E47A"],
				["", "U+E311"],
				["󾭘", "U+FEB58"]
			],
			"💤": ["U+1F4A4", "sleeping symbol", "1f4a4", ["", "U+E701"],
				["", "U+E475"],
				["", "U+E13C"],
				["󾭙", "U+FEB59"]
			],
			"💥": ["U+1F4A5", "collision symbol", "1f4a5", ["", "U+E705"],
				["", "U+E5B0"],
				["-", "-"],
				["󾭚", "U+FEB5A"]
			],
			"💦": ["U+1F4A6", "splashing sweat symbol", "1f4a6", ["", "U+E706"],
				["", "U+E5B1"],
				["", "U+E331"],
				["󾭛", "U+FEB5B"]
			],
			"💧": ["U+1F4A7", "droplet", "1f4a7", ["", "U+E707"],
				["", "U+E4E6"],
				["", "U+E331"],
				["󾭜", "U+FEB5C"]
			],
			"💨": ["U+1F4A8", "dash symbol", "1f4a8", ["", "U+E708"],
				["", "U+E4F4"],
				["", "U+E330"],
				["󾭝", "U+FEB5D"]
			],
			"💩": ["U+1F4A9", "pile of poo", "1f4a9", ["-", "-"],
				["", "U+E4F5"],
				["", "U+E05A"],
				["󾓴", "U+FE4F4"]
			],
			"💪": ["U+1F4AA", "flexed biceps", "1f4aa", ["-", "-"],
				["", "U+E4E9"],
				["", "U+E14C"],
				["󾭞", "U+FEB5E"]
			],
			"💫": ["U+1F4AB", "dizzy symbol", "1f4ab", ["-", "-"],
				["", "U+EB5C"],
				["", "U+E407"],
				["󾭟", "U+FEB5F"]
			],
			"💬": ["U+1F4AC", "speech balloon", "1f4ac", ["-", "-"],
				["", "U+E4FD"],
				["-", "-"],
				["󾔲", "U+FE532"]
			],
			"✨": ["U+2728", "sparkles", "2728", ["", "U+E6FA"],
				["", "U+EAAB"],
				["", "U+E32E"],
				["󾭠", "U+FEB60"]
			],
			"✴": ["U+2734", "eight pointed black star", "2734", ["", "U+E6F8"],
				["", "U+E479"],
				["", "U+E205"],
				["󾭡", "U+FEB61"]
			],
			"✳": ["U+2733", "eight spoked asterisk", "2733", ["", "U+E6F8"],
				["", "U+E53E"],
				["", "U+E206"],
				["󾭢", "U+FEB62"]
			],
			"⚪": ["U+26AA", "medium white circle", "26aa", ["", "U+E69C"],
				["", "U+E53A"],
				["", "U+E219"],
				["󾭥", "U+FEB65"]
			],
			"⚫": ["U+26AB", "medium black circle", "26ab", ["", "U+E69C"],
				["", "U+E53B"],
				["", "U+E219"],
				["󾭦", "U+FEB66"]
			],
			"🔴": ["U+1F534", "large red circle", "1f534", ["", "U+E69C"],
				["", "U+E54A"],
				["", "U+E219"],
				["󾭣", "U+FEB63"]
			],
			"🔵": ["U+1F535", "large blue circle", "1f535", ["", "U+E69C"],
				["", "U+E54B"],
				["", "U+E21A"],
				["󾭤", "U+FEB64"]
			],
			"🔲": ["U+1F532", "black square button", "1f532", ["", "U+E69C"],
				["", "U+E54B"],
				["", "U+E21A"],
				["󾭤", "U+FEB64"]
			],
			"🔳": ["U+1F533", "white square button", "1f533", ["", "U+E69C"],
				["", "U+E54B"],
				["", "U+E21B"],
				["󾭧", "U+FEB67"]
			],
			"⭐": ["U+2B50", "white medium star", "2b50", ["-", "-"],
				["", "U+E48B"],
				["", "U+E32F"],
				["󾭨", "U+FEB68"]
			],
			"⬜": ["U+2B1C", "white large square", "2b1c", ["-", "-"],
				["", "U+E548"],
				["", "U+E21B"],
				["󾭫", "U+FEB6B"]
			],
			"⬛": ["U+2B1B", "black large square", "2b1b", ["-", "-"],
				["", "U+E549"],
				["", "U+E21A"],
				["󾭬", "U+FEB6C"]
			],
			"▫": ["U+25AB", "white small square", "25ab", ["-", "-"],
				["", "U+E531"],
				["", "U+E21B"],
				["󾭭", "U+FEB6D"]
			],
			"▪": ["U+25AA", "black small square", "25aa", ["-", "-"],
				["", "U+E532"],
				["", "U+E21A"],
				["󾭮", "U+FEB6E"]
			],
			"◽": ["U+25FD", "white medium small square", "25fd", ["-", "-"],
				["", "U+E534"],
				["", "U+E21B"],
				["󾭯", "U+FEB6F"]
			],
			"◾": ["U+25FE", "black medium small square", "25fe", ["-", "-"],
				["", "U+E535"],
				["", "U+E21A"],
				["󾭰", "U+FEB70"]
			],
			"◻": ["U+25FB", "white medium square", "25fb", ["-", "-"],
				["", "U+E538"],
				["", "U+E21B"],
				["󾭱", "U+FEB71"]
			],
			"◼": ["U+25FC", "black medium square", "25fc", ["-", "-"],
				["", "U+E539"],
				["", "U+E21A"],
				["󾭲", "U+FEB72"]
			],
			"🔶": ["U+1F536", "large orange diamond", "1f536", ["-", "-"],
				["", "U+E546"],
				["", "U+E21B"],
				["󾭳", "U+FEB73"]
			],
			"🔷": ["U+1F537", "large blue diamond", "1f537", ["-", "-"],
				["", "U+E547"],
				["", "U+E21B"],
				["󾭴", "U+FEB74"]
			],
			"🔸": ["U+1F538", "small orange diamond", "1f538", ["-", "-"],
				["", "U+E536"],
				["", "U+E21B"],
				["󾭵", "U+FEB75"]
			],
			"🔹": ["U+1F539", "small blue diamond", "1f539", ["-", "-"],
				["", "U+E537"],
				["", "U+E21B"],
				["󾭶", "U+FEB76"]
			],
			"❇": ["U+2747", "sparkle", "2747", ["", "U+E6FA"],
				["", "U+E46C"],
				["", "U+E32E"],
				["󾭷", "U+FEB77"]
			],
			"💮": ["U+1F4AE", "white flower", "1f4ae", ["-", "-"],
				["", "U+E4F0"],
				["-", "-"],
				["󾭺", "U+FEB7A"]
			],
			"💯": ["U+1F4AF", "hundred points symbol", "1f4af", ["-", "-"],
				["", "U+E4F2"],
				["-", "-"],
				["󾭻", "U+FEB7B"]
			],
			"↩": ["U+21A9", "leftwards arrow with hook", "21a9", ["", "U+E6DA"],
				["", "U+E55D"],
				["-", "-"],
				["󾮃", "U+FEB83"]
			],
			"↪": ["U+21AA", "rightwards arrow with hook", "21aa", ["-", "-"],
				["", "U+E55C"],
				["-", "-"],
				["󾮈", "U+FEB88"]
			],
			"🔃": ["U+1F503", "clockwise downwards and upwards open circle arrows", "1f503", ["", "U+E735"],
				["", "U+EB0D"],
				["-", "-"],
				["󾮑", "U+FEB91"]
			],
			"🔊": ["U+1F50A", "speaker with three sound waves", "1f50a", ["-", "-"],
				["", "U+E511"],
				["", "U+E141"],
				["󾠡", "U+FE821"]
			],
			"🔋": ["U+1F50B", "battery", "1f50b", ["-", "-"],
				["", "U+E584"],
				["-", "-"],
				["󾓼", "U+FE4FC"]
			],
			"🔌": ["U+1F50C", "electric plug", "1f50c", ["-", "-"],
				["", "U+E589"],
				["-", "-"],
				["󾓾", "U+FE4FE"]
			],
			"🔍": ["U+1F50D", "left-pointing magnifying glass", "1f50d", ["", "U+E6DC"],
				["", "U+E518"],
				["", "U+E114"],
				["󾮅", "U+FEB85"]
			],
			"🔎": ["U+1F50E", "right-pointing magnifying glass", "1f50e", ["", "U+E6DC"],
				["", "U+EB05"],
				["", "U+E114"],
				["󾮍", "U+FEB8D"]
			],
			"🔒": ["U+1F512", "lock", "1f512", ["", "U+E6D9"],
				["", "U+E51C"],
				["", "U+E144"],
				["󾮆", "U+FEB86"]
			],
			"🔓": ["U+1F513", "open lock", "1f513", ["", "U+E6D9"],
				["", "U+E51C"],
				["", "U+E145"],
				["󾮇", "U+FEB87"]
			],
			"🔏": ["U+1F50F", "lock with ink pen", "1f50f", ["", "U+E6D9"],
				["", "U+EB0C"],
				["", "U+E144"],
				["󾮐", "U+FEB90"]
			],
			"🔐": ["U+1F510", "closed lock with key", "1f510", ["", "U+E6D9"],
				["", "U+EAFC"],
				["", "U+E144"],
				["󾮊", "U+FEB8A"]
			],
			"🔑": ["U+1F511", "key", "1f511", ["", "U+E6D9"],
				["", "U+E519"],
				["", "U+E03F"],
				["󾮂", "U+FEB82"]
			],
			"🔔": ["U+1F514", "bell", "1f514", ["", "U+E713"],
				["", "U+E512"],
				["", "U+E325"],
				["󾓲", "U+FE4F2"]
			],
			"☑": ["U+2611", "ballot box with check", "2611", ["-", "-"],
				["", "U+EB02"],
				["-", "-"],
				["󾮋", "U+FEB8B"]
			],
			"🔘": ["U+1F518", "radio button", "1f518", ["-", "-"],
				["", "U+EB04"],
				["-", "-"],
				["󾮌", "U+FEB8C"]
			],
			"🔖": ["U+1F516", "bookmark", "1f516", ["-", "-"],
				["", "U+EB07"],
				["-", "-"],
				["󾮏", "U+FEB8F"]
			],
			"🔗": ["U+1F517", "link symbol", "1f517", ["-", "-"],
				["", "U+E58A"],
				["-", "-"],
				["󾭋", "U+FEB4B"]
			],
			"🔙": ["U+1F519", "back with leftwards arrow above", "1f519", ["-", "-"],
				["", "U+EB06"],
				["", "U+E235"],
				["󾮎", "U+FEB8E"]
			],
			"🔚": ["U+1F51A", "end with leftwards arrow above", "1f51a", ["", "U+E6B9"],
				["-", "-"],
				["-", "-"],
				["󾀚", "U+FE01A"]
			],
			"🔛": ["U+1F51B", "on with exclamation mark with left right arrow above", "1f51b", ["", "U+E6B8"],
				["-", "-"],
				["-", "-"],
				["󾀙", "U+FE019"]
			],
			"🔜": ["U+1F51C", "soon with rightwards arrow above", "1f51c", ["", "U+E6B7"],
				["-", "-"],
				["-", "-"],
				["󾀘", "U+FE018"]
			],
			"🔝": ["U+1F51D", "top with upwards arrow above", "1f51d", ["-", "-"],
				["-", "-"],
				["", "U+E24C"],
				["󾭂", "U+FEB42"]
			],
			"✅": ["U+2705", "white heavy check mark", "2705", ["-", "-"],
				["", "U+E55E"],
				["-", "-"],
				["󾭊", "U+FEB4A"]
			],
			"✊": ["U+270A", "raised fist", "270a", ["", "U+E693"],
				["", "U+EB83"],
				["", "U+E010"],
				["󾮓", "U+FEB93"]
			],
			"✋": ["U+270B", "raised hand", "270b", ["", "U+E695"],
				["", "U+E5A7"],
				["", "U+E012"],
				["󾮕", "U+FEB95"]
			],
			"✌": ["U+270C", "victory hand", "270c", ["", "U+E694"],
				["", "U+E5A6"],
				["", "U+E011"],
				["󾮔", "U+FEB94"]
			],
			"👊": ["U+1F44A", "fisted hand sign", "1f44a", ["", "U+E6FD"],
				["", "U+E4F3"],
				["", "U+E00D"],
				["󾮖", "U+FEB96"]
			],
			"👍": ["U+1F44D", "thumbs up sign", "1f44d", ["", "U+E727"],
				["", "U+E4F9"],
				["", "U+E00E"],
				["󾮗", "U+FEB97"]
			],
			"☝": ["U+261D", "white up pointing index", "261d", ["-", "-"],
				["", "U+E4F6"],
				["", "U+E00F"],
				["󾮘", "U+FEB98"]
			],
			"👆": ["U+1F446", "white up pointing backhand index", "1f446", ["-", "-"],
				["", "U+EA8D"],
				["", "U+E22E"],
				["󾮙", "U+FEB99"]
			],
			"👇": ["U+1F447", "white down pointing backhand index", "1f447", ["-", "-"],
				["", "U+EA8E"],
				["", "U+E22F"],
				["󾮚", "U+FEB9A"]
			],
			"👈": ["U+1F448", "white left pointing backhand index", "1f448", ["-", "-"],
				["", "U+E4FF"],
				["", "U+E230"],
				["󾮛", "U+FEB9B"]
			],
			"👉": ["U+1F449", "white right pointing backhand index", "1f449", ["-", "-"],
				["", "U+E500"],
				["", "U+E231"],
				["󾮜", "U+FEB9C"]
			],
			"👋": ["U+1F44B", "waving hand sign", "1f44b", ["", "U+E695"],
				["", "U+EAD6"],
				["", "U+E41E"],
				["󾮝", "U+FEB9D"]
			],
			"👏": ["U+1F44F", "clapping hands sign", "1f44f", ["-", "-"],
				["", "U+EAD3"],
				["", "U+E41F"],
				["󾮞", "U+FEB9E"]
			],
			"👌": ["U+1F44C", "ok hand sign", "1f44c", ["", "U+E70B"],
				["", "U+EAD4"],
				["", "U+E420"],
				["󾮟", "U+FEB9F"]
			],
			"👎": ["U+1F44E", "thumbs down sign", "1f44e", ["", "U+E700"],
				["", "U+EAD5"],
				["", "U+E421"],
				["󾮠", "U+FEBA0"]
			],
			"👐": ["U+1F450", "open hands sign", "1f450", ["", "U+E695"],
				["", "U+EAD6"],
				["", "U+E422"],
				["󾮡", "U+FEBA1"]
			],
			"🏇": ["U+1F3C7", "horse racer", "1f3c7", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🏉": ["U+1F3C9", "rugby football", "1f3c9", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🍼": ["U+1F37C", "babby bottle", "1f37c", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🍐": ["U+1F350", "pear", "1f350", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌞": ["U+1F31e", "sun with face", "1f31e", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌝": ["U+1F31D", "full moon with face", "1f31d", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌜": ["U+1F31C", "last quarter moon with face", "1f31c", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌚": ["U+1F31A", "new moon with face", "1f31a", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌘": ["U+1F318", "waning crescent moon symbol", "1f318", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌗": ["U+1F317", "last quarter moon symbol", "1f317", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌖": ["U+1F316", "waning gibbous moon symbol", "1f316", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌒": ["U+1F312", "waxing crescent moon symbol", "1f312", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌐": ["U+1F310", "globe with meridians", "1f310", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌎": ["U+1F30E", "earth globe americas", "1f30e", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🌍": ["U+1F30D", "earth globe europe-africa", "1f30d", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🏤": ["U+1F3E4", "european post office", "1f3e4", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐏": ["U+1F40F", "ram", "1f40f", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐐": ["U+1F410", "goat", "1f410", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐓": ["U+1F413", "rooster", "1f413", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐕": ["U+1F415", "dog", "1f415", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐖": ["U+1F416", "pig", "1f416", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🐪": ["U+1F42A", "dromedary camel", "1f42a", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"👥": ["U+1F465", "busts in silhouette", "1f465", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"💭": ["U+1F4AD", "thought balloon", "1f4ad", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"💶": ["U+1F4B6", "banknote with euro sign", "1f4b6", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"💷": ["U+1F4B7", "banknote with pound sign", "1f4b7", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"📬": ["U+1F4EC", "open mailbox with raised flag", "1f4ec", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"📭": ["U+1F4ED", "open mailbox with lowered flag", "1f4ed", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"📯": ["U+1F4EF", "postal horn", "1f4ef", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"📵": ["U+1F4F5", "no mobile phones", "1f4f5", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔀": ["U+1F500", "twisted rightwards arrows", "1f500", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔁": ["U+1F501", "clockwise rightwards and leftwards open circle arrows", "1f501", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔂": ["U+1F502", "clockwise rightwards and leftwards open circle arrows with circled one overlay", "1f502", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔃": ["U+1F503", "clockwise downwards and upwards open circle arrows", "1f503", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔄": ["U+1F504", "anticlockwise downwards and upwards open circle arrows", "1f504", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔅": ["U+1F505", "low brightness symbol", "1f505", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔆": ["U+1F506", "high brightness symbol", "1f506", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔇": ["U+1F507", "speaker with cancellation stroke", "1f507", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔉": ["U+1F509", "speaker with one sound wave", "1f509", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔕": ["U+1F515", "bell with cancellation stroke", "1f515", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔬": ["U+1F52C", "microscope", "1f52c", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🔭": ["U+1F52D", "telescope", "1f52d", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕜": ["U+1F55C", "clock face one-thirty", "1f55c", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕝": ["U+1F55D", "clock face two-thirty", "1f55d", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕞": ["U+1F55E", "clock face three-thirty", "1f55e", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕟": ["U+1F55F", "clock face four-thirty", "1f55f", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕠": ["U+1F560", "clock face five-thirty", "1f560", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕡": ["U+1F561", "clock face six-thirty", "1f561", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕢": ["U+1F562", "clock face seven-thirty", "1f562", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕣": ["U+1F563", "clock face eight-thirty", "1f563", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕤": ["U+1F564", "clock face nine-thirty", "1f564", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕥": ["U+1F565", "clock face ten-thirty", "1f565", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕦": ["U+1F566", "clock face eleven-thirty", "1f566", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕧": ["U+1F567", "clock face twelve-thirty", "1f567", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🕧": ["U+1F567", "grinning face", "1f600", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😇": ["U+1F607", "smiling face with halo", "1f607", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😈": ["U+1F608", "smiling face with horns", "1f608", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😐": ["U+1F610", "neutral face", "1f610", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😑": ["U+1F611", "expressionless face", "1f611", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😕": ["U+1F615", "confused face", "1f615", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😗": ["U+1F617", "kissing face", "1f617", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😗": ["U+1F617", "kissing face", "1f617", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😛": ["U+1F61B", "face with stuck-out tongue", "1f61b", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😟": ["U+1F61F", "worried face", "1f61f", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😥": ["U+1F625", "disappointed but relieved face", "1f625", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😦": ["U+1F626", "frowning face with open mouth", "1f626", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😧": ["U+1F627", "anguished face", "1f627", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😬": ["U+1F62C", "grimacing face", "1f62c", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😬": ["U+1F62C", "grimacing face", "1f62c", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😮": ["U+1F62E", "face with open mouth", "1f62e", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😯": ["U+1F62F", "hushed face", "1f62f", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😴": ["U+1F634", "sleeping face", "1f634", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😶": ["U+1F636", "face without mouth", "1f636", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚁": ["U+1F681", "helicopter", "1f681", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚂": ["U+1F682", "steam locomotive", "1f682", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚆": ["U+1F686", "train", "1f686", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚈": ["U+1F688", "light rail", "1f688", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚎": ["U+1F68E", "trolleybus", "1f68e", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚍": ["U+1F68D", "oncoming bus", "1f68d", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚐": ["U+1F690", "minibus", "1f690", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚔": ["U+1F694", "oncoming police car", "1f694", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚖": ["U+1F696", "oncoming taxi", "1f696", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚘": ["U+1F698", "oncoming automobile", "1f698", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚛": ["U+1F69B", "articulated lorry", "1f69b", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚜": ["U+1F69C", "tractor", "1f69c", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚝": ["U+1F69D", "monorail", "1f69d", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚞": ["U+1F69E", "mountain railway", "1f69e", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚟": ["U+1F69F", "suspension railway", "1f69f", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚠": ["U+1F6A0", "mountain cableway", "1f6a0", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚡": ["U+1F6A1", "aerial tramway", "1f6a1", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚣": ["U+1F6A3", "rowboat", "1f6a3", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚦": ["U+1F6A6", "vertical traffic light", "1f6a6", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚮": ["U+1F6AE", "put litter in its place symbol", "1f6ae", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚯": ["U+1F6AF", "do not litter symbol", "1f6af", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚰": ["U+1F6B0", "potable water symbol", "1f6b0", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚱": ["U+1F6B1", "non-potable water symbol", "1f6b1", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚳": ["U+1F6B3", "no bicycles", "1f6b3", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚴": ["U+1F6B4", "bicyclist", "1f6b4", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚵": ["U+1F6B5", "mountain bicyclist", "1f6b5", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚷": ["U+1F6B7", "no pedestrians", "1f6b7", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚸": ["U+1F6B8", "children crossing", "1f6b8", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚿": ["U+1F6BF", "shower", "1f6bf", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🛁": ["U+1F6C1", "bathtub", "1f6c1", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🛂": ["U+1F6C2", "passport control", "1f6c2", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🛃": ["U+1F6C3", "customs", "1f6c3", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🛄": ["U+1F6C4", "baggage claim", "1f6c4", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🛅": ["U+1F6C5", "left luggage", "1f6c5", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"😙": ["U+1F619", "kissing face with smiling eyes", "1f619", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			],
			"🚊": ["U+1F68A", "tram", "1f68a", ["-", "-"],
				["-", "-"],
				["-", "-"],
				["-", "-"]
			]
		},
		l = null;
	o.unifiedToHTML = t;
	var u = {},
		c = {},
		d = {},
		h = {},
		f = [u, c, d, h];
	for (var p in s) for (var m = s[p], _ = 0; _ < f.length; _++) {
		var g = _ + 3,
			y = m[g][0],
			v = f[_];
		"-" === y || v[y] || (v[y] = p)
	}
	var E = null;
	o.docomoToUnified = n;
	var b = null;
	o.kddiToUnified = r;
	var U = null;
	o.softbankToUnified = i;
	var w = null;
	return o.googleToUnified = a, o
}), function(e, t) {
	"use strict";
	"function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? module.exports = t() : e.emojify = t()
}(this, function() {
	"use strict";
	var e = function() {
			function e() {
				var e = {
					named: /:([a-z0-9A-Z_-]+):/,
					smile: /:-?\)/g,
					scream: /:-o/gi,
					smirk: /[:;]-?]/g,
					grinning: /[:;]-?d/gi,
					stuck_out_tongue_closed_eyes: /x-d/gi,
					stuck_out_tongue_winking_eye: /[:;]-?p/gi,
					rage: /:-?[\[@]/g,
					frowning: /:-?\(/g,
					sob: /:['’]-?\(|:&#x27;\(/g,
					kissing_heart: /:-?\*/g,
					wink: /;-?\)/g,
					pensive: /:-?\//g,
					confounded: /:-?s/gi,
					flushed: /:-?\|/g,
					relaxed: /:-?\$/g,
					mask: /:-x/gi,
					heart: /<3|&lt;3/g,
					broken_heart: /<\/3|&lt;&#x2F;3/g,
					thumbsup: /:\+1:/g,
					thumbsdown: /:\-1:/g
				};
				return m.ignore_emoticons && (e = {
					named: /:([a-z0-9A-Z_-]+):/,
					thumbsup: /:\+1:/g,
					thumbsdown: /:\-1:/g
				}), Object.keys(e).map(function(t) {
					return [e[t], t]
				})
			}
			function t() {
				var e = u.map(function(e) {
					var t = e[0],
						n = t.source || t;
					return n = n.replace(/(^|[^\[])\^/g, "$1"), "(" + n + ")"
				}).join("|");
				return new RegExp(e, "gi")
			}
			function n(e) {
				return " " === e || "\t" === e || "\r" === e || "\n" === e || "" === e
			}
			function r(e, t, n) {
				var r = d.createElement(m.emojify_tag_type || "img");
				m.emojify_tag_type && "img" !== m.emojify_tag_type ? r.setAttribute("class", "emoji emoji-" + n) : (r.setAttribute("class", "emoji"), r.setAttribute("src", m.img_dir + "/" + n + ".png")), r.setAttribute("title", ":" + n + ":"), r.setAttribute("alt", ":" + n + ":"), r.setAttribute("align", "absmiddle"), e.splitText(t.index), e.nextSibling.nodeValue = e.nextSibling.nodeValue.substr(t[0].length, e.nextSibling.nodeValue.length), r.appendChild(e.splitText(t.index)), e.parentNode.insertBefore(r, e.nextSibling)
			}
			function i(e) {
				if (e[1] && e[2]) {
					var t = e[2];
					if (p[t]) return t
				} else for (var n = 3; n < e.length - 1; n++) if (e[n]) return u[n - 2][1]
			}
			function a(e, t) {
				return this.config.emojify_tag_type && "img" !== this.config.emojify_tag_type ? "<" + this.config.emojify_tag_type + " title=':" + t + ":' alt=':" + t + ":' class='emoji emoji-" + t + "'> </" + this.config.emojify_tag_type + ">" : "<img title=':" + t + ":' alt=':" + t + ":' class='emoji' src='" + this.config.img_dir + "/" + t + ".png' align='absmiddle' />"
			}
			function o() {
				this.lastEmojiTerminatedAt = -1
			}
			function s(n, r) {
				if (!n) return n;
				r || (r = a), u = e(), c = t();
				var i = new o;
				return n.replace(c, function() {
					var e = Array.prototype.slice.call(arguments, 0, -2),
						t = arguments[arguments.length - 2],
						n = arguments[arguments.length - 1],
						a = i.validate(e, t, n);
					return a ? r.apply({
						config: m
					}, [arguments[0], a]) : arguments[0]
				})
			}
			function l(n) {
				u = e(), c = t(), "undefined" == typeof n && (n = m.only_crawl_id ? d.getElementById(m.only_crawl_id) : d.body);
				for (var a, s = m.ignored_tags, l = d.createTreeWalker(n, NodeFilter.SHOW_TEXT | NodeFilter.SHOW_ELEMENT, function(e) {
					return 1 !== e.nodeType ? NodeFilter.FILTER_ACCEPT : s[e.tagName] || e.classList.contains("no-emojify") ? NodeFilter.FILTER_REJECT : NodeFilter.FILTER_SKIP
				}, !1), h = []; null !== (a = l.nextNode());) h.push(a);
				h.forEach(function(e) {
					for (var t, n = [], a = new o; null !== (t = c.exec(e.data));) a.validate(t, t.index, t.input) && n.push(t);
					for (var s = n.length; s-- > 0;) {
						var l = i(n[s]);
						r(e, n[s], l)
					}
				})
			}
			var u, c, d = "undefined" != typeof window && window.document,
				h = "+1,-1,100,109,1234,8ball,a,ab,abc,abcd,accept,aerial_tramway,airplane,alarm_clock,alien,ambulance,anchor,angel,anger,angry,anguished,ant,apple,aquarius,aries,arrow_backward,arrow_double_down,arrow_double_up,arrow_down,arrow_down_small,arrow_forward,arrow_heading_down,arrow_heading_up,arrow_left,arrow_lower_left,arrow_lower_right,arrow_right,arrow_right_hook,arrow_up,arrow_up_down,arrow_up_small,arrow_upper_left,arrow_upper_right,arrows_clockwise,arrows_counterclockwise,art,articulated_lorry,astonished,atm,b,baby,baby_bottle,baby_chick,baby_symbol,back,baggage_claim,balloon,ballot_box_with_check,bamboo,banana,bangbang,bank,bar_chart,barber,baseball,basketball,bath,bathtub,battery,bear,bee,beer,beers,beetle,beginner,bell,bento,bicyclist,bike,bikini,bird,birthday,black_circle,black_joker,black_medium_small_square,black_medium_square,black_nib,black_small_square,black_square,black_square_button,blossom,blowfish,blue_book,blue_car,blue_heart,blush,boar,boat,bomb,book,bookmark,bookmark_tabs,books,boom,boot,bouquet,bow,bowling,bowtie,boy,bread,bride_with_veil,bridge_at_night,briefcase,broken_heart,bug,bulb,bullettrain_front,bullettrain_side,bus,busstop,bust_in_silhouette,busts_in_silhouette,cactus,cake,calendar,calling,camel,camera,cancer,candy,capital_abcd,capricorn,car,card_index,carousel_horse,cat,cat2,cd,chart,chart_with_downwards_trend,chart_with_upwards_trend,checkered_flag,cherries,cherry_blossom,chestnut,chicken,children_crossing,chocolate_bar,christmas_tree,church,cinema,circus_tent,city_sunrise,city_sunset,cl,clap,clapper,clipboard,clock1,clock10,clock1030,clock11,clock1130,clock12,clock1230,clock130,clock2,clock230,clock3,clock330,clock4,clock430,clock5,clock530,clock6,clock630,clock7,clock730,clock8,clock830,clock9,clock930,closed_book,closed_lock_with_key,closed_umbrella,cloud,clubs,cn,cocktail,coffee,cold_sweat,collision,computer,confetti_ball,confounded,confused,congratulations,construction,construction_worker,convenience_store,cookie,cool,cop,copyright,corn,couple,couple_with_heart,couplekiss,cow,cow2,credit_card,crocodile,crossed_flags,crown,cry,crying_cat_face,crystal_ball,cupid,curly_loop,currency_exchange,curry,custard,customs,cyclone,dancer,dancers,dango,dart,dash,date,de,deciduous_tree,department_store,diamond_shape_with_a_dot_inside,diamonds,disappointed,disappointed_relieved,dizzy,dizzy_face,do_not_litter,dog,dog2,dollar,dolls,dolphin,donut,door,doughnut,dragon,dragon_face,dress,dromedary_camel,droplet,dvd,e-mail,ear,ear_of_rice,earth_africa,earth_americas,earth_asia,egg,eggplant,eight,eight_pointed_black_star,eight_spoked_asterisk,electric_plug,elephant,email,end,envelope,es,euro,european_castle,european_post_office,evergreen_tree,exclamation,expressionless,eyeglasses,eyes,facepunch,factory,fallen_leaf,family,fast_forward,fax,fearful,feelsgood,feet,ferris_wheel,file_folder,finnadie,fire,fire_engine,fireworks,first_quarter_moon,first_quarter_moon_with_face,fish,fish_cake,fishing_pole_and_fish,fist,five,flags,flashlight,floppy_disk,flower_playing_cards,flushed,foggy,football,fork_and_knife,fountain,four,four_leaf_clover,fr,free,fried_shrimp,fries,frog,frowning,fu,fuelpump,full_moon,full_moon_with_face,game_die,gb,gem,gemini,ghost,gift,gift_heart,girl,globe_with_meridians,goat,goberserk,godmode,golf,grapes,green_apple,green_book,green_heart,grey_exclamation,grey_question,grimacing,grin,grinning,guardsman,guitar,gun,haircut,hamburger,hammer,hamster,hand,handbag,hankey,hash,hatched_chick,hatching_chick,headphones,hear_no_evil,heart,heart_decoration,heart_eyes,heart_eyes_cat,heartbeat,heartpulse,hearts,heavy_check_mark,heavy_division_sign,heavy_dollar_sign,heavy_exclamation_mark,heavy_minus_sign,heavy_multiplication_x,heavy_plus_sign,helicopter,herb,hibiscus,high_brightness,high_heel,hocho,honey_pot,honeybee,horse,horse_racing,hospital,hotel,hotsprings,hourglass,hourglass_flowing_sand,house,house_with_garden,hurtrealbad,hushed,ice_cream,icecream,id,ideograph_advantage,imp,inbox_tray,incoming_envelope,information_desk_person,information_source,innocent,interrobang,iphone,it,izakaya_lantern,jack_o_lantern,japan,japanese_castle,japanese_goblin,japanese_ogre,jeans,joy,joy_cat,jp,key,keycap_ten,kimono,kiss,kissing,kissing_cat,kissing_closed_eyes,kissing_face,kissing_heart,kissing_smiling_eyes,koala,koko,kr,large_blue_circle,large_blue_diamond,large_orange_diamond,last_quarter_moon,last_quarter_moon_with_face,laughing,leaves,ledger,left_luggage,left_right_arrow,leftwards_arrow_with_hook,lemon,leo,leopard,libra,light_rail,link,lips,lipstick,lock,lock_with_ink_pen,lollipop,loop,loudspeaker,love_hotel,love_letter,low_brightness,m,mag,mag_right,mahjong,mailbox,mailbox_closed,mailbox_with_mail,mailbox_with_no_mail,man,man_with_gua_pi_mao,man_with_turban,mans_shoe,maple_leaf,mask,massage,meat_on_bone,mega,melon,memo,mens,metal,metro,microphone,microscope,milky_way,minibus,minidisc,mobile_phone_off,money_with_wings,moneybag,monkey,monkey_face,monorail,moon,mortar_board,mount_fuji,mountain_bicyclist,mountain_cableway,mountain_railway,mouse,mouse2,movie_camera,moyai,muscle,mushroom,musical_keyboard,musical_note,musical_score,mute,nail_care,name_badge,neckbeard,necktie,negative_squared_cross_mark,neutral_face,new,new_moon,new_moon_with_face,newspaper,ng,nine,no_bell,no_bicycles,no_entry,no_entry_sign,no_good,no_mobile_phones,no_mouth,no_pedestrians,no_smoking,non-potable_water,nose,notebook,notebook_with_decorative_cover,notes,nut_and_bolt,o,o2,ocean,octocat,octopus,oden,office,ok,ok_hand,ok_woman,older_man,older_woman,on,oncoming_automobile,oncoming_bus,oncoming_police_car,oncoming_taxi,one,open_file_folder,open_hands,open_mouth,ophiuchus,orange_book,outbox_tray,ox,package,page_facing_up,page_with_curl,pager,palm_tree,panda_face,paperclip,parking,part_alternation_mark,partly_sunny,passport_control,paw_prints,peach,pear,pencil,pencil2,penguin,pensive,performing_arts,persevere,person_frowning,person_with_blond_hair,person_with_pouting_face,phone,pig,pig2,pig_nose,pill,pineapple,pisces,pizza,plus1,point_down,point_left,point_right,point_up,point_up_2,police_car,poodle,poop,post_office,postal_horn,postbox,potable_water,pouch,poultry_leg,pound,pouting_cat,pray,princess,punch,purple_heart,purse,pushpin,put_litter_in_its_place,question,rabbit,rabbit2,racehorse,radio,radio_button,rage,rage1,rage2,rage3,rage4,railway_car,rainbow,raised_hand,raised_hands,raising_hand,ram,ramen,rat,recycle,red_car,red_circle,registered,relaxed,relieved,repeat,repeat_one,restroom,revolving_hearts,rewind,ribbon,rice,rice_ball,rice_cracker,rice_scene,ring,rocket,roller_coaster,rooster,rose,rotating_light,round_pushpin,rowboat,ru,rugby_football,runner,running,running_shirt_with_sash,sa,sagittarius,sailboat,sake,sandal,santa,satellite,satisfied,saxophone,school,school_satchel,scissors,scorpius,scream,scream_cat,scroll,seat,secret,see_no_evil,seedling,seven,shaved_ice,sheep,shell,ship,shipit,shirt,shit,shoe,shower,signal_strength,six,six_pointed_star,ski,skull,sleeping,sleepy,slot_machine,small_blue_diamond,small_orange_diamond,small_red_triangle,small_red_triangle_down,smile,smile_cat,smiley,smiley_cat,smiling_imp,smirk,smirk_cat,smoking,snail,snake,snowboarder,snowflake,snowman,sob,soccer,soon,sos,sound,space_invader,spades,spaghetti,sparkle,sparkler,sparkles,sparkling_heart,speak_no_evil,speaker,speech_balloon,speedboat,squirrel,star,star2,stars,station,statue_of_liberty,steam_locomotive,stew,straight_ruler,strawberry,stuck_out_tongue,stuck_out_tongue_closed_eyes,stuck_out_tongue_winking_eye,sun_with_face,sunflower,sunglasses,sunny,sunrise,sunrise_over_mountains,surfer,sushi,suspect,suspension_railway,sweat,sweat_drops,sweat_smile,sweet_potato,swimmer,symbols,syringe,tada,tanabata_tree,tangerine,taurus,taxi,tea,telephone,telephone_receiver,telescope,tennis,tent,thought_balloon,three,thumbsdown,thumbsup,ticket,tiger,tiger2,tired_face,tm,toilet,tokyo_tower,tomato,tongue,top,tophat,tractor,traffic_light,train,train2,tram,triangular_flag_on_post,triangular_ruler,trident,triumph,trolleybus,trollface,trophy,tropical_drink,tropical_fish,truck,trumpet,tshirt,tulip,turtle,tv,twisted_rightwards_arrows,two,two_hearts,two_men_holding_hands,two_women_holding_hands,u5272,u5408,u55b6,u6307,u6708,u6709,u6e80,u7121,u7533,u7981,u7a7a,uk,umbrella,unamused,underage,unlock,up,us,v,vertical_traffic_light,vhs,vibration_mode,video_camera,video_game,violin,virgo,volcano,vs,walking,waning_crescent_moon,waning_gibbous_moon,warning,watch,water_buffalo,watermelon,wave,wavy_dash,waxing_crescent_moon,waxing_gibbous_moon,wc,weary,wedding,whale,whale2,wheelchair,white_check_mark,white_circle,white_flower,white_large_square,white_medium_small_square,white_medium_square,white_small_square,white_square,white_square_button,wind_chime,wine_glass,wink,wink2,wolf,woman,womans_clothes,womans_hat,womens,worried,wrench,x,yellow_heart,yen,yum,zap,zero,zzz",
				f = h.split(/,/),
				p = f.reduce(function(e, t) {
					return e[t] = !0, e
				}, {}),
				m = {
					emojify_tag_type: null,
					only_crawl_id: null,
					img_dir: "images/emoji",
					ignore_emoticons: !1,
					ignored_tags: {
						SCRIPT: 1,
						TEXTAREA: 1,
						A: 1,
						PRE: 1,
						CODE: 1
					}
				};
			return o.prototype = {
				validate: function(e, t, r) {
					function a() {
						return o.lastEmojiTerminatedAt = u + t, s
					}
					var o = this,
						s = i(e);
					if (s) {
						var l = e[0],
							u = l.length;
						if (0 === t) return a();
						if (r.length === l.length + t) return a();
						var c = this.lastEmojiTerminatedAt === t;
						if (c) return a();
						if (n(r.charAt(t - 1))) return a();
						var d = n(r.charAt(l.length + t));
						return d && c ? a() : void 0
					}
				}
			}, {
				defaultConfig: m,
				emojiNames: f,
				setConfig: function(e) {
					Object.keys(m).forEach(function(t) {
						t in e && (m[t] = e[t])
					})
				},
				replace: s,
				run: l
			}
		}();
	return e
}), function() {
	"use strict";
	var e, t;
	e = jQuery, t = function(t, n) {
		var r, i, a;
		return this.options = e.extend({
			title: null,
			footer: null,
			remote: null
		}, e.fn.ekkoLightbox.defaults, n || {}), this.$element = e(t), r = "", this.modal_id = this.options.modal_id ? this.options.modal_id : "ekkoLightbox-" + Math.floor(1e3 * Math.random() + 1), a = '<div class="modal-header"' + (this.options.title || this.options.always_show_close ? "" : ' style="display:none"') + '><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">' + (this.options.title || "&nbsp;") + "</h4></div>", i = '<div class="modal-footer"' + (this.options.footer ? "" : ' style="display:none"') + ">" + this.options.footer + "</div>", e(document.body).append('<div id="' + this.modal_id + '" class="ekko-lightbox modal fade" tabindex="-1"><div class="modal-dialog"><div class="modal-content">' + a + '<div class="modal-body"><div class="ekko-lightbox-container"><div></div></div></div>' + i + "</div></div></div>"), this.modal = e("#" + this.modal_id), this.modal_dialog = this.modal.find(".modal-dialog").first(), this.modal_content = this.modal.find(".modal-content").first(), this.modal_body = this.modal.find(".modal-body").first(), this.modal_header = this.modal.find(".modal-header").first(), this.modal_footer = this.modal.find(".modal-footer").first(), this.lightbox_container = this.modal_body.find(".ekko-lightbox-container").first(), this.lightbox_body = this.lightbox_container.find("> div:first-child").first(), this.showLoading(), this.modal_arrows = null, this.border = {
			top: parseFloat(this.modal_dialog.css("border-top-width")) + parseFloat(this.modal_content.css("border-top-width")) + parseFloat(this.modal_body.css("border-top-width")),
			right: parseFloat(this.modal_dialog.css("border-right-width")) + parseFloat(this.modal_content.css("border-right-width")) + parseFloat(this.modal_body.css("border-right-width")),
			bottom: parseFloat(this.modal_dialog.css("border-bottom-width")) + parseFloat(this.modal_content.css("border-bottom-width")) + parseFloat(this.modal_body.css("border-bottom-width")),
			left: parseFloat(this.modal_dialog.css("border-left-width")) + parseFloat(this.modal_content.css("border-left-width")) + parseFloat(this.modal_body.css("border-left-width"))
		}, this.padding = {
			top: parseFloat(this.modal_dialog.css("padding-top")) + parseFloat(this.modal_content.css("padding-top")) + parseFloat(this.modal_body.css("padding-top")),
			right: parseFloat(this.modal_dialog.css("padding-right")) + parseFloat(this.modal_content.css("padding-right")) + parseFloat(this.modal_body.css("padding-right")),
			bottom: parseFloat(this.modal_dialog.css("padding-bottom")) + parseFloat(this.modal_content.css("padding-bottom")) + parseFloat(this.modal_body.css("padding-bottom")),
			left: parseFloat(this.modal_dialog.css("padding-left")) + parseFloat(this.modal_content.css("padding-left")) + parseFloat(this.modal_body.css("padding-left"))
		}, this.modal.on("show.bs.modal", this.options.onShow.bind(this)).on("shown.bs.modal", function(e) {
			return function() {
				return e.modal_shown(), e.options.onShown.call(e)
			}
		}(this)).on("hide.bs.modal", this.options.onHide.bind(this)).on("hidden.bs.modal", function(t) {
			return function() {
				return t.gallery && e(document).off("keydown.ekkoLightbox"), t.modal.remove(), t.options.onHidden.call(t)
			}
		}(this)).modal("show", n), this.modal
	}, t.prototype = {
		modal_shown: function() {
			var t;
			return this.options.remote ? (this.gallery = this.$element.data("gallery"), this.gallery && ("document.body" === this.options.gallery_parent_selector || "" === this.options.gallery_parent_selector ? this.gallery_items = e(document.body).find('*[data-gallery="' + this.gallery + '"]') : this.gallery_items = this.$element.parents(this.options.gallery_parent_selector).first().find('*[data-gallery="' + this.gallery + '"]'), this.gallery_index = this.gallery_items.index(this.$element), e(document).on("keydown.ekkoLightbox", this.navigate.bind(this)), this.options.directional_arrows && this.gallery_items.length > 1 && (this.lightbox_container.append('<div class="ekko-lightbox-nav-overlay"><a href="#" class="' + this.strip_stops(this.options.left_arrow_class) + '"></a><a href="#" class="' + this.strip_stops(this.options.right_arrow_class) + '"></a></div>'), this.modal_arrows = this.lightbox_container.find("div.ekko-lightbox-nav-overlay").first(), this.lightbox_container.find("a" + this.strip_spaces(this.options.left_arrow_class)).on("click", function(e) {
				return function(t) {
					return t.preventDefault(), e.navigate_left()
				}
			}(this)), this.lightbox_container.find("a" + this.strip_spaces(this.options.right_arrow_class)).on("click", function(e) {
				return function(t) {
					return t.preventDefault(), e.navigate_right()
				}
			}(this)))), this.options.type ? "image" === this.options.type ? this.preloadImage(this.options.remote, !0) : "youtube" === this.options.type && (t = this.getYoutubeId(this.options.remote)) ? this.showYoutubeVideo(t) : "vimeo" === this.options.type ? this.showVimeoVideo(this.options.remote) : "instagram" === this.options.type ? this.showInstagramVideo(this.options.remote) : "url" === this.options.type ? this.loadRemoteContent(this.options.remote) : "video" === this.options.type ? this.showVideoIframe(this.options.remote) : this.error('Could not detect remote target type. Force the type using data-type="image|youtube|vimeo|instagram|url|video"') : this.detectRemoteType(this.options.remote)) : this.error("No remote target given")
		},
		strip_stops: function(e) {
			return e.replace(/\./g, "")
		},
		strip_spaces: function(e) {
			return e.replace(/\s/g, "")
		},
		isImage: function(e) {
			return e.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)
		},
		isSwf: function(e) {
			return e.match(/\.(swf)((\?|#).*)?$/i)
		},
		getYoutubeId: function(e) {
			var t;
			return t = e.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/), !(!t || 11 !== t[2].length) && t[2]
		},
		getVimeoId: function(e) {
			return e.indexOf("vimeo") > 0 && e
		},
		getInstagramId: function(e) {
			return e.indexOf("instagram") > 0 && e
		},
		navigate: function(e) {
			if (e = e || window.event, 39 === e.keyCode || 37 === e.keyCode) {
				if (39 === e.keyCode) return this.navigate_right();
				if (37 === e.keyCode) return this.navigate_left()
			}
		},
		navigateTo: function(t) {
			var n, r;
			return 0 > t || t > this.gallery_items.length - 1 ? this : (this.showLoading(), this.gallery_index = t, this.$element = e(this.gallery_items.get(this.gallery_index)), this.updateTitleAndFooter(), r = this.$element.attr("data-remote") || this.$element.attr("href"), this.detectRemoteType(r, this.$element.attr("data-type") || !1), this.gallery_index + 1 < this.gallery_items.length && (n = e(this.gallery_items.get(this.gallery_index + 1), !1), r = n.attr("data-remote") || n.attr("href"), "image" === n.attr("data-type") || this.isImage(r)) ? this.preloadImage(r, !1) : void 0)
		},
		navigate_left: function() {
			return 1 !== this.gallery_items.length ? (0 === this.gallery_index ? this.gallery_index = this.gallery_items.length - 1 : this.gallery_index--, this.options.onNavigate.call(this, "left", this.gallery_index), this.navigateTo(this.gallery_index)) : void 0
		},
		navigate_right: function() {
			return 1 !== this.gallery_items.length ? (this.gallery_index === this.gallery_items.length - 1 ? this.gallery_index = 0 : this.gallery_index++, this.options.onNavigate.call(this, "right", this.gallery_index), this.navigateTo(this.gallery_index)) : void 0
		},
		detectRemoteType: function(e, t) {
			var n;
			return t = t || !1, "image" === t || this.isImage(e) ? (this.options.type = "image", this.preloadImage(e, !0)) : "youtube" === t || (n = this.getYoutubeId(e)) ? (this.options.type = "youtube", this.showYoutubeVideo(n)) : "vimeo" === t || (n = this.getVimeoId(e)) ? (this.options.type = "vimeo", this.showVimeoVideo(n)) : "instagram" === t || (n = this.getInstagramId(e)) ? (this.options.type = "instagram", this.showInstagramVideo(n)) : "video" === t ? (this.options.type = "video", this.showVideoIframe(e)) : (this.options.type = "url", this.loadRemoteContent(e))
		},
		updateTitleAndFooter: function() {
			var e, t, n, r;
			return n = this.modal_content.find(".modal-header"), t = this.modal_content.find(".modal-footer"), r = this.$element.data("title") || "", e = this.$element.data("footer") || "", r || this.options.always_show_close ? n.css("display", "").find(".modal-title").html(r || "&nbsp;") : n.css("display", "none"), e ? t.css("display", "").html(e) : t.css("display", "none"), this
		},
		showLoading: function() {
			return this.lightbox_body.html('<div class="modal-loading">' + this.options.loadingMessage + "</div>"), this
		},
		showYoutubeVideo: function(e) {
			var t, n, r;
			return n = null != this.$element.attr("data-norelated") || this.options.no_related ? "&rel=0" : "", r = this.checkDimensions(this.$element.data("width") || 560), t = r / (560 / 315), this.showVideoIframe("//www.youtube.com/embed/" + e + "?badge=0&autoplay=1&html5=1" + n, r, t)
		},
		showVimeoVideo: function(e) {
			var t, n;
			return n = this.checkDimensions(this.$element.data("width") || 560), t = n / (500 / 281), this.showVideoIframe(e + "?autoplay=1", n, t)
		},
		showInstagramVideo: function(e) {
			var t, n;
			return n = this.checkDimensions(this.$element.data("width") || 612), this.resize(n), t = n + 80, this.lightbox_body.html('<iframe width="' + n + '" height="' + t + '" src="' + this.addTrailingSlash(e) + 'embed/" frameborder="0" allowfullscreen></iframe>'), this.options.onContentLoaded.call(this), this.modal_arrows ? this.modal_arrows.css("display", "none") : void 0
		},
		showVideoIframe: function(e, t, n) {
			return n = n || t, this.resize(t), this.lightbox_body.html('<div class="embed-responsive embed-responsive-16by9"><iframe width="' + t + '" height="' + n + '" src="' + e + '" frameborder="0" allowfullscreen class="embed-responsive-item"></iframe></div>'), this.options.onContentLoaded.call(this), this.modal_arrows && this.modal_arrows.css("display", "none"), this
		},
		loadRemoteContent: function(t) {
			var n, r;
			return r = this.$element.data("width") || 560, this.resize(r), n = this.$element.data("disableExternalCheck") || !1, n || this.isExternal(t) ? (this.lightbox_body.html('<iframe width="' + r + '" height="' + r + '" src="' + t + '" frameborder="0" allowfullscreen></iframe>'), this.options.onContentLoaded.call(this)) : this.lightbox_body.load(t, e.proxy(function(e) {
				return function() {
					return e.$element.trigger("loaded.bs.modal")
				}
			}(this))), this.modal_arrows && this.modal_arrows.css("display", "none"), this
		},
		isExternal: function(e) {
			var t;
			return t = e.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/), "string" == typeof t[1] && t[1].length > 0 && t[1].toLowerCase() !== location.protocol || "string" == typeof t[2] && t[2].length > 0 && t[2].replace(new RegExp(":(" + {
				"http:": 80,
				"https:": 443
			}[location.protocol] + ")?$"), "") !== location.host
		},
		error: function(e) {
			return this.lightbox_body.html(e), this
		},
		preloadImage: function(t, n) {
			var r;
			return r = new Image, null != n && n !== !0 || (r.onload = function(t) {
				return function() {
					var n;
					return n = e("<img />"), n.attr("src", r.src), n.addClass("img-responsive"), t.lightbox_body.html(n), t.modal_arrows && t.modal_arrows.css("display", "block"), n.load(function() {
						return t.options.scale_height ? t.scaleHeight(r.height, r.width) : t.resize(r.width), t.options.onContentLoaded.call(t)
					})
				}
			}(this), r.onerror = function(e) {
				return function() {
					return e.error("Failed to load image: " + t)
				}
			}(this)), r.src = t, r
		},
		scaleHeight: function(t, n) {
			var r, i, a, o, s, l;
			return o = this.modal_header.outerHeight(!0) || 0, a = this.modal_footer.outerHeight(!0) || 0, this.modal_footer.is(":visible") || (a = 0), this.modal_header.is(":visible") || (o = 0), r = this.border.top + this.border.bottom + this.padding.top + this.padding.bottom, s = parseFloat(this.modal_dialog.css("margin-top")) + parseFloat(this.modal_dialog.css("margin-bottom")), l = e(window).height() - r - s - o - a, i = Math.min(l / t, 1), this.modal_dialog.css("height", "auto").css("max-height", l), this.resize(i * n)
		},
		resize: function(t) {
			var n;
			return n = t + this.border.left + this.padding.left + this.padding.right + this.border.right, this.modal_dialog.css("width", "auto").css("max-width", n), this.lightbox_container.find("a").css("line-height", function() {
				return e(this).parent().height() + "px"
			}), this
		},
		checkDimensions: function(e) {
			var t, n;
			return n = e + this.border.left + this.padding.left + this.padding.right + this.border.right, t = document.body.clientWidth, n > t && (e = this.modal_body.width()), e
		},
		close: function() {
			return this.modal.modal("hide")
		},
		addTrailingSlash: function(e) {
			return "/" !== e.substr(-1) && (e += "/"), e
		}
	}, e.fn.ekkoLightbox = function(n) {
		return this.each(function() {
			var r;
			return r = e(this), n = e.extend({
				remote: r.attr("data-remote") || r.attr("href"),
				gallery_parent_selector: r.attr("data-parent"),
				type: r.attr("data-type")
			}, n, r.data()), new t(this, n), this
		})
	}, e.fn.ekkoLightbox.defaults = {
		gallery_parent_selector: "document.body",
		left_arrow_class: ".glyphicon .glyphicon-chevron-left",
		right_arrow_class: ".glyphicon .glyphicon-chevron-right",
		directional_arrows: !0,
		type: null,
		always_show_close: !0,
		no_related: !1,
		scale_height: !0,
		loadingMessage: "Loading...",
		onShow: function() {},
		onShown: function() {},
		onHide: function() {},
		onHidden: function() {},
		onNavigate: function() {},
		onContentLoaded: function() {}
	}
}.call(this), function(e) {
	"use strict";
	"function" == typeof define && define.amd ? define(e) : "undefined" != typeof module && "undefined" != typeof module.exports ? module.exports = e() : "undefined" != typeof Package ? Sortable = e() : window.Sortable = e()
}(function() {
	"use strict";

	function e(e, t) {
		if (!e || !e.nodeType || 1 !== e.nodeType) throw "Sortable: `el` must be HTMLElement, and not " + {}.toString.call(e);
		this.el = e, this.options = t = g({}, t), e[B] = this;
		var n = {
			group: Math.random(),
			sort: !0,
			disabled: !1,
			store: null,
			handle: null,
			scroll: !0,
			scrollSensitivity: 30,
			scrollSpeed: 10,
			draggable: /[uo]l/i.test(e.nodeName) ? "li" : ">*",
			ghostClass: "sortable-ghost",
			chosenClass: "sortable-chosen",
			ignore: "a, img",
			filter: null,
			animation: 0,
			setData: function(e, t) {
				e.setData("Text", t.textContent)
			},
			dropBubble: !1,
			dragoverBubble: !1,
			dataIdAttr: "data-id",
			delay: 0,
			forceFallback: !1,
			fallbackClass: "sortable-fallback",
			fallbackOnBody: !1
		};
		for (var r in n)!(r in t) && (t[r] = n[r]);
		J(t);
		for (var a in this)"_" === a.charAt(0) && (this[a] = this[a].bind(this));
		this.nativeDraggable = !t.forceFallback && I, i(e, "mousedown", this._onTapStart), i(e, "touchstart", this._onTapStart), this.nativeDraggable && (i(e, "dragover", this), i(e, "dragenter", this)), z.push(this._onDragOver), t.store && this.sort(t.store.get(this))
	}
	function t(e) {
		b && b.state !== e && (s(b, "display", e ? "none" : ""), !e && b.state && U.insertBefore(b, y), b.state = e)
	}
	function n(e, t, n) {
		if (e) {
			n = n || P, t = t.split(".");
			var r = t.shift().toUpperCase(),
				i = new RegExp("\\s(" + t.join("|") + ")(?=\\s)", "g");
			do
			if (">*" === r && e.parentNode === n || ("" === r || e.nodeName.toUpperCase() == r) && (!t.length || ((" " + e.className + " ").match(i) || []).length == t.length)) return e;
			while (e !== n && (e = e.parentNode))
		}
		return null
	}
	function r(e) {
		e.dataTransfer && (e.dataTransfer.dropEffect = "move"), e.preventDefault()
	}
	function i(e, t, n) {
		e.addEventListener(t, n, !1)
	}
	function a(e, t, n) {
		e.removeEventListener(t, n, !1)
	}
	function o(e, t, n) {
		if (e) if (e.classList) e.classList[n ? "add" : "remove"](t);
		else {
			var r = (" " + e.className + " ").replace(H, " ").replace(" " + t + " ", " ");
			e.className = (r + (n ? " " + t : "")).replace(H, " ")
		}
	}
	function s(e, t, n) {
		var r = e && e.style;
		if (r) {
			if (void 0 === n) return P.defaultView && P.defaultView.getComputedStyle ? n = P.defaultView.getComputedStyle(e, "") : e.currentStyle && (n = e.currentStyle), void 0 === t ? n : n[t];
			t in r || (t = "-webkit-" + t), r[t] = n + ("string" == typeof n ? "" : "px")
		}
	}
	function l(e, t, n) {
		if (e) {
			var r = e.getElementsByTagName(t),
				i = 0,
				a = r.length;
			if (n) for (; i < a; i++) n(r[i], i);
			return r
		}
		return []
	}
	function u(e, t, n, r, i, a, o) {
		var s = P.createEvent("Event"),
			l = (e || t[B]).options,
			u = "on" + n.charAt(0).toUpperCase() + n.substr(1);
		s.initEvent(n, !0, !0), s.to = t, s.from = i || t, s.item = r || t, s.clone = b, s.oldIndex = a, s.newIndex = o, t.dispatchEvent(s), l[u] && l[u].call(e, s)
	}
	function c(e, t, n, r, i, a) {
		var o, s, l = e[B],
			u = l.options.onMove;
		return o = P.createEvent("Event"), o.initEvent("move", !0, !0), o.to = t, o.from = e, o.dragged = n, o.draggedRect = r, o.related = i || t, o.relatedRect = a || t.getBoundingClientRect(), e.dispatchEvent(o), u && (s = u.call(l, o)), s
	}
	function d(e) {
		e.draggable = !1
	}
	function h() {
		W = !1
	}
	function f(e, t) {
		var n = e.lastElementChild,
			r = n.getBoundingClientRect();
		return (t.clientY - (r.top + r.height) > 5 || t.clientX - (r.right + r.width) > 5) && n
	}
	function p(e) {
		for (var t = e.tagName + e.className + e.src + e.href + e.textContent, n = t.length, r = 0; n--;) r += t.charCodeAt(n);
		return r.toString(36)
	}
	function m(e) {
		var t = 0;
		if (!e || !e.parentNode) return -1;
		for (; e && (e = e.previousElementSibling);)"TEMPLATE" !== e.nodeName.toUpperCase() && t++;
		return t
	}
	function _(e, t) {
		var n, r;
		return function() {
			void 0 === n && (n = arguments, r = this, setTimeout(function() {
				1 === n.length ? e.call(r, n[0]) : e.apply(r, n), n = void 0
			}, t))
		}
	}
	function g(e, t) {
		if (e && t) for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
		return e
	}
	var y, v, E, b, U, w, k, M, L, F, D, x, T, Y, S, A, C, j = {},
		H = /\s+/g,
		B = "Sortable" + (new Date).getTime(),
		$ = window,
		P = $.document,
		O = $.parseInt,
		I = !! ("draggable" in P.createElement("div")),
		N = function(e) {
			return e = P.createElement("x"), e.style.cssText = "pointer-events:auto", "auto" === e.style.pointerEvents
		}(),
		W = !1,
		R = Math.abs,
		z = ([].slice, []),
		q = _(function(e, t, n) {
			if (n && t.scroll) {
				var r, i, a, o, s = t.scrollSensitivity,
					l = t.scrollSpeed,
					u = e.clientX,
					c = e.clientY,
					d = window.innerWidth,
					h = window.innerHeight;
				if (M !== n && (k = t.scroll, M = n, k === !0)) {
					k = n;
					do
					if (k.offsetWidth < k.scrollWidth || k.offsetHeight < k.scrollHeight) break;
					while (k = k.parentNode)
				}
				k && (r = k, i = k.getBoundingClientRect(), a = (R(i.right - u) <= s) - (R(i.left - u) <= s), o = (R(i.bottom - c) <= s) - (R(i.top - c) <= s)), a || o || (a = (d - u <= s) - (u <= s), o = (h - c <= s) - (c <= s), (a || o) && (r = $)), j.vx === a && j.vy === o && j.el === r || (j.el = r, j.vx = a, j.vy = o, clearInterval(j.pid), r && (j.pid = setInterval(function() {
					r === $ ? $.scrollTo($.pageXOffset + a * l, $.pageYOffset + o * l) : (o && (r.scrollTop += o * l), a && (r.scrollLeft += a * l))
				}, 24)))
			}
		}, 30),
		J = function(e) {
			var t = e.group;
			t && "object" == typeof t || (t = e.group = {
				name: t
			}), ["pull", "put"].forEach(function(e) {
				e in t || (t[e] = !0)
			}), e.groups = " " + t.name + (t.put.join ? " " + t.put.join(" ") : "") + " "
		};
	return e.prototype = {
		constructor: e,
		_onTapStart: function(e) {
			var t = this,
				r = this.el,
				i = this.options,
				a = e.type,
				o = e.touches && e.touches[0],
				s = (o || e).target,
				l = s,
				c = i.filter;
			if (!("mousedown" === a && 0 !== e.button || i.disabled) && (s = n(s, i.draggable, r))) {
				if (x = m(s), "function" == typeof c) {
					if (c.call(this, e, s, this)) return u(t, l, "filter", s, r, x), void e.preventDefault()
				} else if (c && (c = c.split(",").some(function(e) {
					if (e = n(l, e.trim(), r)) return u(t, e, "filter", s, r, x), !0
				}))) return void e.preventDefault();
				i.handle && !n(l, i.handle, r) || this._prepareDragStart(e, o, s)
			}
		},
		_prepareDragStart: function(e, t, n) {
			var r, a = this,
				s = a.el,
				u = a.options,
				c = s.ownerDocument;
			n && !y && n.parentNode === s && (S = e, U = s, y = n, v = y.parentNode, w = y.nextSibling, Y = u.group, r = function() {
				a._disableDelayedDrag(), y.draggable = !0, o(y, a.options.chosenClass, !0), a._triggerDragStart(t)
			}, u.ignore.split(",").forEach(function(e) {
				l(y, e.trim(), d)
			}), i(c, "mouseup", a._onDrop), i(c, "touchend", a._onDrop), i(c, "touchcancel", a._onDrop), u.delay ? (i(c, "mouseup", a._disableDelayedDrag), i(c, "touchend", a._disableDelayedDrag), i(c, "touchcancel", a._disableDelayedDrag), i(c, "mousemove", a._disableDelayedDrag), i(c, "touchmove", a._disableDelayedDrag), a._dragStartTimer = setTimeout(r, u.delay)) : r())
		},
		_disableDelayedDrag: function() {
			var e = this.el.ownerDocument;
			clearTimeout(this._dragStartTimer), a(e, "mouseup", this._disableDelayedDrag), a(e, "touchend", this._disableDelayedDrag), a(e, "touchcancel", this._disableDelayedDrag), a(e, "mousemove", this._disableDelayedDrag), a(e, "touchmove", this._disableDelayedDrag)
		},
		_triggerDragStart: function(e) {
			e ? (S = {
				target: y,
				clientX: e.clientX,
				clientY: e.clientY
			}, this._onDragStart(S, "touch")) : this.nativeDraggable ? (i(y, "dragend", this), i(U, "dragstart", this._onDragStart)) : this._onDragStart(S, !0);
			try {
				P.selection ? P.selection.empty() : window.getSelection().removeAllRanges()
			} catch (t) {}
		},
		_dragStarted: function() {
			U && y && (o(y, this.options.ghostClass, !0), e.active = this, u(this, U, "start", y, U, x))
		},
		_emulateDragOver: function() {
			if (A) {
				if (this._lastX === A.clientX && this._lastY === A.clientY) return;
				this._lastX = A.clientX, this._lastY = A.clientY, N || s(E, "display", "none");
				var e = P.elementFromPoint(A.clientX, A.clientY),
					t = e,
					n = " " + this.options.group.name,
					r = z.length;
				if (t) do {
					if (t[B] && t[B].options.groups.indexOf(n) > -1) {
						for (; r--;) z[r]({
							clientX: A.clientX,
							clientY: A.clientY,
							target: e,
							rootEl: t
						});
						break
					}
					e = t
				} while (t = t.parentNode);
				N || s(E, "display", "")
			}
		},
		_onTouchMove: function(t) {
			if (S) {
				e.active || this._dragStarted(), this._appendGhost();
				var n = t.touches ? t.touches[0] : t,
					r = n.clientX - S.clientX,
					i = n.clientY - S.clientY,
					a = t.touches ? "translate3d(" + r + "px," + i + "px,0)" : "translate(" + r + "px," + i + "px)";
				C = !0, A = n, s(E, "webkitTransform", a), s(E, "mozTransform", a), s(E, "msTransform", a), s(E, "transform", a), t.preventDefault()
			}
		},
		_appendGhost: function() {
			if (!E) {
				var e, t = y.getBoundingClientRect(),
					n = s(y),
					r = this.options;
				E = y.cloneNode(!0), o(E, r.ghostClass, !1), o(E, r.fallbackClass, !0), s(E, "top", t.top - O(n.marginTop, 10)), s(E, "left", t.left - O(n.marginLeft, 10)), s(E, "width", t.width), s(E, "height", t.height), s(E, "opacity", "0.8"), s(E, "position", "fixed"), s(E, "zIndex", "100000"), s(E, "pointerEvents", "none"), r.fallbackOnBody && P.body.appendChild(E) || U.appendChild(E), e = E.getBoundingClientRect(), s(E, "width", 2 * t.width - e.width), s(E, "height", 2 * t.height - e.height)
			}
		},
		_onDragStart: function(e, t) {
			var n = e.dataTransfer,
				r = this.options;
			this._offUpEvents(), "clone" == Y.pull && (b = y.cloneNode(!0), s(b, "display", "none"), U.insertBefore(b, y)), t ? ("touch" === t ? (i(P, "touchmove", this._onTouchMove), i(P, "touchend", this._onDrop), i(P, "touchcancel", this._onDrop)) : (i(P, "mousemove", this._onTouchMove), i(P, "mouseup", this._onDrop)), this._loopId = setInterval(this._emulateDragOver, 50)) : (n && (n.effectAllowed = "move", r.setData && r.setData.call(this, n, y)), i(P, "drop", this), setTimeout(this._dragStarted, 0))
		},
		_onDragOver: function(e) {
			var r, i, a, o = this.el,
				l = this.options,
				u = l.group,
				d = u.put,
				p = Y === u,
				m = l.sort;
			if (void 0 !== e.preventDefault && (e.preventDefault(), !l.dragoverBubble && e.stopPropagation()), C = !0, Y && !l.disabled && (p ? m || (a = !U.contains(y)) : Y.pull && d && (Y.name === u.name || d.indexOf && ~d.indexOf(Y.name))) && (void 0 === e.rootEl || e.rootEl === this.el)) {
				if (q(e, l, this.el), W) return;
				if (r = n(e.target, l.draggable, o), i = y.getBoundingClientRect(), a) return t(!0), void(b || w ? U.insertBefore(y, b || w) : m || U.appendChild(y));
				if (0 === o.children.length || o.children[0] === E || o === e.target && (r = f(o, e))) {
					if (r) {
						if (r.animated) return;
						g = r.getBoundingClientRect()
					}
					t(p), c(U, o, y, i, r, g) !== !1 && (y.contains(o) || (o.appendChild(y), v = o), this._animate(i, y), r && this._animate(g, r))
				} else if (r && !r.animated && r !== y && void 0 !== r.parentNode[B]) {
					L !== r && (L = r, F = s(r), D = s(r.parentNode));
					var _, g = r.getBoundingClientRect(),
						k = g.right - g.left,
						M = g.bottom - g.top,
						x = /left|right|inline/.test(F.cssFloat + F.display) || "flex" == D.display && 0 === D["flex-direction"].indexOf("row"),
						T = r.offsetWidth > y.offsetWidth,
						S = r.offsetHeight > y.offsetHeight,
						A = (x ? (e.clientX - g.left) / k : (e.clientY - g.top) / M) > .5,
						j = r.nextElementSibling,
						H = c(U, o, y, i, r, g);
					if (H !== !1) {
						if (W = !0, setTimeout(h, 30), t(p), 1 === H || H === -1) _ = 1 === H;
						else if (x) {
							var $ = y.offsetTop,
								P = r.offsetTop;
							_ = $ === P ? r.previousElementSibling === y && !T || A && T : P > $
						} else _ = j !== y && !S || A && S;
						y.contains(o) || (_ && !j ? o.appendChild(y) : r.parentNode.insertBefore(y, _ ? j : r)), v = y.parentNode, this._animate(i, y), this._animate(g, r)
					}
				}
			}
		},
		_animate: function(e, t) {
			var n = this.options.animation;
			if (n) {
				var r = t.getBoundingClientRect();
				s(t, "transition", "none"), s(t, "transform", "translate3d(" + (e.left - r.left) + "px," + (e.top - r.top) + "px,0)"), t.offsetWidth, s(t, "transition", "all " + n + "ms"), s(t, "transform", "translate3d(0,0,0)"), clearTimeout(t.animated), t.animated = setTimeout(function() {
					s(t, "transition", ""), s(t, "transform", ""), t.animated = !1
				}, n)
			}
		},
		_offUpEvents: function() {
			var e = this.el.ownerDocument;
			a(P, "touchmove", this._onTouchMove), a(e, "mouseup", this._onDrop), a(e, "touchend", this._onDrop), a(e, "touchcancel", this._onDrop)
		},
		_onDrop: function(t) {
			var n = this.el,
				r = this.options;
			clearInterval(this._loopId), clearInterval(j.pid), clearTimeout(this._dragStartTimer), a(P, "mousemove", this._onTouchMove), this.nativeDraggable && (a(P, "drop", this), a(n, "dragstart", this._onDragStart)), this._offUpEvents(), t && (C && (t.preventDefault(), !r.dropBubble && t.stopPropagation()), E && E.parentNode.removeChild(E), y && (this.nativeDraggable && a(y, "dragend", this), d(y), o(y, this.options.ghostClass, !1), o(y, this.options.chosenClass, !1), U !== v ? (T = m(y), T >= 0 && (u(null, v, "sort", y, U, x, T), u(this, U, "sort", y, U, x, T), u(null, v, "add", y, U, x, T), u(this, U, "remove", y, U, x, T))) : (b && b.parentNode.removeChild(b), y.nextSibling !== w && (T = m(y), T >= 0 && (u(this, U, "update", y, U, x, T), u(this, U, "sort", y, U, x, T)))), e.active && (null !== T && T !== -1 || (T = x), u(this, U, "end", y, U, x, T), this.save())), U = y = v = E = w = b = k = M = S = A = C = T = L = F = Y = e.active = null)
		},
		handleEvent: function(e) {
			var t = e.type;
			"dragover" === t || "dragenter" === t ? y && (this._onDragOver(e), r(e)) : "drop" !== t && "dragend" !== t || this._onDrop(e)
		},
		toArray: function() {
			for (var e, t = [], r = this.el.children, i = 0, a = r.length, o = this.options; i < a; i++) e = r[i], n(e, o.draggable, this.el) && t.push(e.getAttribute(o.dataIdAttr) || p(e));
			return t
		},
		sort: function(e) {
			var t = {},
				r = this.el;
			this.toArray().forEach(function(e, i) {
				var a = r.children[i];
				n(a, this.options.draggable, r) && (t[e] = a)
			}, this), e.forEach(function(e) {
				t[e] && (r.removeChild(t[e]), r.appendChild(t[e]))
			})
		},
		save: function() {
			var e = this.options.store;
			e && e.set(this)
		},
		closest: function(e, t) {
			return n(e, t || this.options.draggable, this.el)
		},
		option: function(e, t) {
			var n = this.options;
			return void 0 === t ? n[e] : (n[e] = t, void("group" === e && J(n)))
		},
		destroy: function() {
			var e = this.el;
			e[B] = null, a(e, "mousedown", this._onTapStart), a(e, "touchstart", this._onTapStart), this.nativeDraggable && (a(e, "dragover", this), a(e, "dragenter", this)), Array.prototype.forEach.call(e.querySelectorAll("[draggable]"), function(e) {
				e.removeAttribute("draggable")
			}), z.splice(z.indexOf(this._onDragOver), 1), this._onDrop(), this.el = e = null
		}
	}, e.utils = {
		on: i,
		off: a,
		css: s,
		find: l,
		is: function(e, t) {
			return !!n(e, t, e)
		},
		extend: g,
		throttle: _,
		closest: n,
		toggleClass: o,
		index: m
	}, e.create = function(t, n) {
		return new e(t, n)
	}, e.version = "1.4.2", e
}), !
function(e) {
	"function" == typeof define && define.amd ? define(["jquery"], e) : e("object" == typeof exports ? require("jquery") : jQuery)
}(function(e) {
	var t = function() {
			if (e && e.fn && e.fn.select2 && e.fn.select2.amd) var t = e.fn.select2.amd;
			var t;
			return function() {
				if (!t || !t.requirejs) {
					t ? n = t : t = {};
					var e, n, r;
					!
					function(t) {
						function i(e, t) {
							return E.call(e, t)
						}
						function a(e, t) {
							var n, r, i, a, o, s, l, u, c, d, h, f = t && t.split("/"),
								p = y.map,
								m = p && p["*"] || {};
							if (e && "." === e.charAt(0)) if (t) {
								for (e = e.split("/"), o = e.length - 1, y.nodeIdCompat && U.test(e[o]) && (e[o] = e[o].replace(U, "")), e = f.slice(0, f.length - 1).concat(e), c = 0; c < e.length; c += 1) if (h = e[c], "." === h) e.splice(c, 1), c -= 1;
								else if (".." === h) {
									if (1 === c && (".." === e[2] || ".." === e[0])) break;
									c > 0 && (e.splice(c - 1, 2), c -= 2)
								}
								e = e.join("/")
							} else 0 === e.indexOf("./") && (e = e.substring(2));
							if ((f || m) && p) {
								for (n = e.split("/"), c = n.length; c > 0; c -= 1) {
									if (r = n.slice(0, c).join("/"), f) for (d = f.length; d > 0; d -= 1) if (i = p[f.slice(0, d).join("/")], i && (i = i[r])) {
										a = i, s = c;
										break
									}
									if (a) break;
									!l && m && m[r] && (l = m[r], u = c)
								}!a && l && (a = l, s = u), a && (n.splice(0, s, a), e = n.join("/"))
							}
							return e
						}
						function o(e, n) {
							return function() {
								var r = b.call(arguments, 0);
								return "string" != typeof r[0] && 1 === r.length && r.push(null), f.apply(t, r.concat([e, n]))
							}
						}
						function s(e) {
							return function(t) {
								return a(t, e)
							}
						}
						function l(e) {
							return function(t) {
								_[e] = t
							}
						}
						function u(e) {
							if (i(g, e)) {
								var n = g[e];
								delete g[e], v[e] = !0, h.apply(t, n)
							}
							if (!i(_, e) && !i(v, e)) throw new Error("No " + e);
							return _[e]
						}
						function c(e) {
							var t, n = e ? e.indexOf("!") : -1;
							return n > -1 && (t = e.substring(0, n), e = e.substring(n + 1, e.length)), [t, e]
						}
						function d(e) {
							return function() {
								return y && y.config && y.config[e] || {}
							}
						}
						var h, f, p, m, _ = {},
							g = {},
							y = {},
							v = {},
							E = Object.prototype.hasOwnProperty,
							b = [].slice,
							U = /\.js$/;
						p = function(e, t) {
							var n, r = c(e),
								i = r[0];
							return e = r[1], i && (i = a(i, t), n = u(i)), i ? e = n && n.normalize ? n.normalize(e, s(t)) : a(e, t) : (e = a(e, t), r = c(e), i = r[0], e = r[1], i && (n = u(i))), {
								f: i ? i + "!" + e : e,
								n: e,
								pr: i,
								p: n
							}
						}, m = {
							require: function(e) {
								return o(e)
							},
							exports: function(e) {
								var t = _[e];
								return "undefined" != typeof t ? t : _[e] = {}
							},
							module: function(e) {
								return {
									id: e,
									uri: "",
									exports: _[e],
									config: d(e)
								}
							}
						}, h = function(e, n, r, a) {
							var s, c, d, h, f, y, E = [],
								b = typeof r;
							if (a = a || e, "undefined" === b || "function" === b) {
								for (n = !n.length && r.length ? ["require", "exports", "module"] : n, f = 0; f < n.length; f += 1) if (h = p(n[f], a), c = h.f, "require" === c) E[f] = m.require(e);
								else if ("exports" === c) E[f] = m.exports(e), y = !0;
								else if ("module" === c) s = E[f] = m.module(e);
								else if (i(_, c) || i(g, c) || i(v, c)) E[f] = u(c);
								else {
									if (!h.p) throw new Error(e + " missing " + c);
									h.p.load(h.n, o(a, !0), l(c), {}), E[f] = _[c]
								}
								d = r ? r.apply(_[e], E) : void 0, e && (s && s.exports !== t && s.exports !== _[e] ? _[e] = s.exports : d === t && y || (_[e] = d))
							} else e && (_[e] = r)
						}, e = n = f = function(e, n, r, i, a) {
							if ("string" == typeof e) return m[e] ? m[e](n) : u(p(e, n).f);
							if (!e.splice) {
								if (y = e, y.deps && f(y.deps, y.callback), !n) return;
								n.splice ? (e = n, n = r, r = null) : e = t
							}
							return n = n ||
							function() {}, "function" == typeof r && (r = i, i = a), i ? h(t, e, n, r) : setTimeout(function() {
								h(t, e, n, r)
							}, 4), f
						}, f.config = function(e) {
							return f(e)
						}, e._defined = _, r = function(e, t, n) {
							if ("string" != typeof e) throw new Error("See almond README: incorrect module build, no module name");
							t.splice || (n = t, t = []), i(_, e) || i(g, e) || (g[e] = [e, t, n])
						}, r.amd = {
							jQuery: !0
						}
					}(), t.requirejs = e, t.require = n, t.define = r
				}
			}(), t.define("almond", function() {}), t.define("jquery", [], function() {
				var t = e || $;
				return null == t && console && console.error && console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."), t
			}), t.define("select2/utils", ["jquery"], function(e) {
				function t(e) {
					var t = e.prototype,
						n = [];
					for (var r in t) {
						var i = t[r];
						"function" == typeof i && "constructor" !== r && n.push(r)
					}
					return n
				}
				var n = {};
				n.Extend = function(e, t) {
					function n() {
						this.constructor = e
					}
					var r = {}.hasOwnProperty;
					for (var i in t) r.call(t, i) && (e[i] = t[i]);
					return n.prototype = t.prototype, e.prototype = new n, e.__super__ = t.prototype, e
				}, n.Decorate = function(e, n) {
					function r() {
						var t = Array.prototype.unshift,
							r = n.prototype.constructor.length,
							i = e.prototype.constructor;
						r > 0 && (t.call(arguments, e.prototype.constructor), i = n.prototype.constructor), i.apply(this, arguments)
					}
					function i() {
						this.constructor = r
					}
					var a = t(n),
						o = t(e);
					n.displayName = e.displayName, r.prototype = new i;
					for (var s = 0; s < o.length; s++) {
						var l = o[s];
						r.prototype[l] = e.prototype[l]
					}
					for (var u = (function(e) {
						var t = function() {};
						e in r.prototype && (t = r.prototype[e]);
						var i = n.prototype[e];
						return function() {
							var e = Array.prototype.unshift;
							return e.call(arguments, t), i.apply(this, arguments)
						}
					}), c = 0; c < a.length; c++) {
						var d = a[c];
						r.prototype[d] = u(d)
					}
					return r
				};
				var r = function() {
						this.listeners = {}
					};
				return r.prototype.on = function(e, t) {
					this.listeners = this.listeners || {}, e in this.listeners ? this.listeners[e].push(t) : this.listeners[e] = [t]
				}, r.prototype.trigger = function(e) {
					var t = Array.prototype.slice,
						n = t.call(arguments, 1);
					this.listeners = this.listeners || {}, null == n && (n = []), 0 === n.length && n.push({}), n[0]._type = e, e in this.listeners && this.invoke(this.listeners[e], t.call(arguments, 1)), "*" in this.listeners && this.invoke(this.listeners["*"], arguments)
				}, r.prototype.invoke = function(e, t) {
					for (var n = 0, r = e.length; r > n; n++) e[n].apply(this, t)
				}, n.Observable = r, n.generateChars = function(e) {
					for (var t = "", n = 0; e > n; n++) {
						var r = Math.floor(36 * Math.random());
						t += r.toString(36)
					}
					return t
				}, n.bind = function(e, t) {
					return function() {
						e.apply(t, arguments)
					}
				}, n._convertData = function(e) {
					for (var t in e) {
						var n = t.split("-"),
							r = e;
						if (1 !== n.length) {
							for (var i = 0; i < n.length; i++) {
								var a = n[i];
								a = a.substring(0, 1).toLowerCase() + a.substring(1), a in r || (r[a] = {}), i == n.length - 1 && (r[a] = e[t]), r = r[a]
							}
							delete e[t]
						}
					}
					return e
				}, n.hasScroll = function(t, n) {
					var r = e(n),
						i = n.style.overflowX,
						a = n.style.overflowY;
					return (i !== a || "hidden" !== a && "visible" !== a) && ("scroll" === i || "scroll" === a || (r.innerHeight() < n.scrollHeight || r.innerWidth() < n.scrollWidth))
				}, n.escapeMarkup = function(e) {
					var t = {
						"\\": "&#92;",
						"&": "&amp;",
						"<": "&lt;",
						">": "&gt;",
						'"': "&quot;",
						"'": "&#39;",
						"/": "&#47;"
					};
					return "string" != typeof e ? e : String(e).replace(/[&<>"'\/\\]/g, function(e) {
						return t[e]
					})
				}, n.appendMany = function(t, n) {
					if ("1.7" === e.fn.jquery.substr(0, 3)) {
						var r = e();
						e.map(n, function(e) {
							r = r.add(e)
						}), n = r
					}
					t.append(n)
				}, n
			}), t.define("select2/results", ["jquery", "./utils"], function(e, t) {
				function n(e, t, r) {
					this.$element = e, this.data = r, this.options = t, n.__super__.constructor.call(this)
				}
				return t.Extend(n, t.Observable), n.prototype.render = function() {
					var t = e('<ul class="select2-results__options" role="tree"></ul>');
					return this.options.get("multiple") && t.attr("aria-multiselectable", "true"), this.$results = t, t
				}, n.prototype.clear = function() {
					this.$results.empty()
				}, n.prototype.displayMessage = function(t) {
					var n = this.options.get("escapeMarkup");
					this.clear(), this.hideLoading();
					var r = e('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),
						i = this.options.get("translations").get(t.message);
					r.append(n(i(t.args))), r[0].className += " select2-results__message", this.$results.append(r)
				}, n.prototype.hideMessages = function() {
					this.$results.find(".select2-results__message").remove()
				}, n.prototype.append = function(e) {
					this.hideLoading();
					var t = [];
					if (null == e.results || 0 === e.results.length) return void(0 === this.$results.children().length && this.trigger("results:message", {
						message: "noResults"
					}));
					e.results = this.sort(e.results);
					for (var n = 0; n < e.results.length; n++) {
						var r = e.results[n],
							i = this.option(r);
						t.push(i)
					}
					this.$results.append(t)
				}, n.prototype.position = function(e, t) {
					var n = t.find(".select2-results");
					n.append(e)
				}, n.prototype.sort = function(e) {
					var t = this.options.get("sorter");
					return t(e)
				}, n.prototype.highlightFirstItem = function() {
					var e = this.$results.find(".select2-results__option[aria-selected]"),
						t = e.filter("[aria-selected=true]");
					t.length > 0 ? t.first().trigger("mouseenter") : e.first().trigger("mouseenter"), this.ensureHighlightVisible()
				}, n.prototype.setClasses = function() {
					var t = this;
					this.data.current(function(n) {
						var r = e.map(n, function(e) {
							return e.id.toString()
						}),
							i = t.$results.find(".select2-results__option[aria-selected]");
						i.each(function() {
							var t = e(this),
								n = e.data(this, "data"),
								i = "" + n.id;
							null != n.element && n.element.selected || null == n.element && e.inArray(i, r) > -1 ? t.attr("aria-selected", "true") : t.attr("aria-selected", "false")
						})
					})
				}, n.prototype.showLoading = function(e) {
					this.hideLoading();
					var t = this.options.get("translations").get("searching"),
						n = {
							disabled: !0,
							loading: !0,
							text: t(e)
						},
						r = this.option(n);
					r.className += " loading-results", this.$results.prepend(r)
				}, n.prototype.hideLoading = function() {
					this.$results.find(".loading-results").remove()
				}, n.prototype.option = function(t) {
					var n = document.createElement("li");
					n.className = "select2-results__option";
					var r = {
						role: "treeitem",
						"aria-selected": "false"
					};
					t.disabled && (delete r["aria-selected"], r["aria-disabled"] = "true"), null == t.id && delete r["aria-selected"], null != t._resultId && (n.id = t._resultId), t.title && (n.title = t.title), t.children && (r.role = "group", r["aria-label"] = t.text, delete r["aria-selected"]);
					for (var i in r) {
						var a = r[i];
						n.setAttribute(i, a)
					}
					if (t.children) {
						var o = e(n),
							s = document.createElement("strong");
						s.className = "select2-results__group", e(s), this.template(t, s);
						for (var l = [], u = 0; u < t.children.length; u++) {
							var c = t.children[u],
								d = this.option(c);
							l.push(d)
						}
						var h = e("<ul></ul>", {
							"class": "select2-results__options select2-results__options--nested"
						});
						h.append(l), o.append(s), o.append(h)
					} else this.template(t, n);
					return e.data(n, "data", t), n
				}, n.prototype.bind = function(t, n) {
					var r = this,
						i = t.id + "-results";
					this.$results.attr("id", i), t.on("results:all", function(e) {
						r.clear(), r.append(e.data), t.isOpen() && (r.setClasses(), r.highlightFirstItem())
					}), t.on("results:append", function(e) {
						r.append(e.data), t.isOpen() && r.setClasses()
					}), t.on("query", function(e) {
						r.hideMessages(), r.showLoading(e)
					}), t.on("select", function() {
						t.isOpen() && (r.setClasses(), r.highlightFirstItem())
					}), t.on("unselect", function() {
						t.isOpen() && (r.setClasses(), r.highlightFirstItem())
					}), t.on("open", function() {
						r.$results.attr("aria-expanded", "true"), r.$results.attr("aria-hidden", "false"), r.setClasses(), r.ensureHighlightVisible()
					}), t.on("close", function() {
						r.$results.attr("aria-expanded", "false"), r.$results.attr("aria-hidden", "true"), r.$results.removeAttr("aria-activedescendant")
					}), t.on("results:toggle", function() {
						var e = r.getHighlightedResults();
						0 !== e.length && e.trigger("mouseup")
					}), t.on("results:select", function() {
						var e = r.getHighlightedResults();
						if (0 !== e.length) {
							var t = e.data("data");
							"true" == e.attr("aria-selected") ? r.trigger("close", {}) : r.trigger("select", {
								data: t
							})
						}
					}), t.on("results:previous", function() {
						var e = r.getHighlightedResults(),
							t = r.$results.find("[aria-selected]"),
							n = t.index(e);
						if (0 !== n) {
							var i = n - 1;
							0 === e.length && (i = 0);
							var a = t.eq(i);
							a.trigger("mouseenter");
							var o = r.$results.offset().top,
								s = a.offset().top,
								l = r.$results.scrollTop() + (s - o);
							0 === i ? r.$results.scrollTop(0) : 0 > s - o && r.$results.scrollTop(l)
						}
					}), t.on("results:next", function() {
						var e = r.getHighlightedResults(),
							t = r.$results.find("[aria-selected]"),
							n = t.index(e),
							i = n + 1;
						if (!(i >= t.length)) {
							var a = t.eq(i);
							a.trigger("mouseenter");
							var o = r.$results.offset().top + r.$results.outerHeight(!1),
								s = a.offset().top + a.outerHeight(!1),
								l = r.$results.scrollTop() + s - o;
							0 === i ? r.$results.scrollTop(0) : s > o && r.$results.scrollTop(l)
						}
					}), t.on("results:focus", function(e) {
						e.element.addClass("select2-results__option--highlighted")
					}), t.on("results:message", function(e) {
						r.displayMessage(e)
					}), e.fn.mousewheel && this.$results.on("mousewheel", function(e) {
						var t = r.$results.scrollTop(),
							n = r.$results.get(0).scrollHeight - t + e.deltaY,
							i = e.deltaY > 0 && t - e.deltaY <= 0,
							a = e.deltaY < 0 && n <= r.$results.height();
						i ? (r.$results.scrollTop(0), e.preventDefault(), e.stopPropagation()) : a && (r.$results.scrollTop(r.$results.get(0).scrollHeight - r.$results.height()), e.preventDefault(), e.stopPropagation())
					}), this.$results.on("mouseup", ".select2-results__option[aria-selected]", function(t) {
						var n = e(this),
							i = n.data("data");
						return "true" === n.attr("aria-selected") ? void(r.options.get("multiple") ? r.trigger("unselect", {
							originalEvent: t,
							data: i
						}) : r.trigger("close", {})) : void r.trigger("select", {
							originalEvent: t,
							data: i
						})
					}), this.$results.on("mouseenter", ".select2-results__option[aria-selected]", function(t) {
						var n = e(this).data("data");
						r.getHighlightedResults().removeClass("select2-results__option--highlighted"), r.trigger("results:focus", {
							data: n,
							element: e(this)
						})
					})
				}, n.prototype.getHighlightedResults = function() {
					var e = this.$results.find(".select2-results__option--highlighted");
					return e
				}, n.prototype.destroy = function() {
					this.$results.remove()
				}, n.prototype.ensureHighlightVisible = function() {
					var e = this.getHighlightedResults();
					if (0 !== e.length) {
						var t = this.$results.find("[aria-selected]"),
							n = t.index(e),
							r = this.$results.offset().top,
							i = e.offset().top,
							a = this.$results.scrollTop() + (i - r),
							o = i - r;
						a -= 2 * e.outerHeight(!1), 2 >= n ? this.$results.scrollTop(0) : (o > this.$results.outerHeight() || 0 > o) && this.$results.scrollTop(a)
					}
				}, n.prototype.template = function(t, n) {
					var r = this.options.get("templateResult"),
						i = this.options.get("escapeMarkup"),
						a = r(t, n);
					null == a ? n.style.display = "none" : "string" == typeof a ? n.innerHTML = i(a) : e(n).append(a)
				}, n
			}), t.define("select2/keys", [], function() {
				var e = {
					BACKSPACE: 8,
					TAB: 9,
					ENTER: 13,
					SHIFT: 16,
					CTRL: 17,
					ALT: 18,
					ESC: 27,
					SPACE: 32,
					PAGE_UP: 33,
					PAGE_DOWN: 34,
					END: 35,
					HOME: 36,
					LEFT: 37,
					UP: 38,
					RIGHT: 39,
					DOWN: 40,
					DELETE: 46
				};
				return e
			}), t.define("select2/selection/base", ["jquery", "../utils", "../keys"], function(e, t, n) {
				function r(e, t) {
					this.$element = e, this.options = t, r.__super__.constructor.call(this)
				}
				return t.Extend(r, t.Observable), r.prototype.render = function() {
					var t = e('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');
					return this._tabindex = 0, null != this.$element.data("old-tabindex") ? this._tabindex = this.$element.data("old-tabindex") : null != this.$element.attr("tabindex") && (this._tabindex = this.$element.attr("tabindex")), t.attr("title", this.$element.attr("title")), t.attr("tabindex", this._tabindex), this.$selection = t, t
				}, r.prototype.bind = function(e, t) {
					var r = this,
						i = (e.id + "-container", e.id + "-results");
					this.container = e, this.$selection.on("focus", function(e) {
						r.trigger("focus", e)
					}), this.$selection.on("blur", function(e) {
						r._handleBlur(e)
					}), this.$selection.on("keydown", function(e) {
						r.trigger("keypress", e), e.which === n.SPACE && e.preventDefault()
					}), e.on("results:focus", function(e) {
						r.$selection.attr("aria-activedescendant", e.data._resultId)
					}), e.on("selection:update", function(e) {
						r.update(e.data)
					}), e.on("open", function() {
						r.$selection.attr("aria-expanded", "true"), r.$selection.attr("aria-owns", i), r._attachCloseHandler(e)
					}), e.on("close", function() {
						r.$selection.attr("aria-expanded", "false"), r.$selection.removeAttr("aria-activedescendant"), r.$selection.removeAttr("aria-owns"), r.$selection.focus(), r._detachCloseHandler(e)
					}), e.on("enable", function() {
						r.$selection.attr("tabindex", r._tabindex)
					}), e.on("disable", function() {
						r.$selection.attr("tabindex", "-1")
					})
				}, r.prototype._handleBlur = function(t) {
					var n = this;
					window.setTimeout(function() {
						document.activeElement == n.$selection[0] || e.contains(n.$selection[0], document.activeElement) || n.trigger("blur", t)
					}, 1)
				}, r.prototype._attachCloseHandler = function(t) {
					e(document.body).on("mousedown.select2." + t.id, function(t) {
						var n = e(t.target),
							r = n.closest(".select2"),
							i = e(".select2.select2-container--open");
						i.each(function() {
							var t = e(this);
							if (this != r[0]) {
								var n = t.data("element");
								n.select2("close")
							}
						})
					})
				}, r.prototype._detachCloseHandler = function(t) {
					e(document.body).off("mousedown.select2." + t.id)
				}, r.prototype.position = function(e, t) {
					var n = t.find(".selection");
					n.append(e)
				}, r.prototype.destroy = function() {
					this._detachCloseHandler(this.container)
				}, r.prototype.update = function(e) {
					throw new Error("The `update` method must be defined in child classes.")
				}, r
			}), t.define("select2/selection/single", ["jquery", "./base", "../utils", "../keys"], function(e, t, n, r) {
				function i() {
					i.__super__.constructor.apply(this, arguments)
				}
				return n.Extend(i, t), i.prototype.render = function() {
					var e = i.__super__.render.call(this);
					return e.addClass("select2-selection--single"), e.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'), e
				}, i.prototype.bind = function(e, t) {
					var n = this;
					i.__super__.bind.apply(this, arguments);
					var r = e.id + "-container";
					this.$selection.find(".select2-selection__rendered").attr("id", r), this.$selection.attr("aria-labelledby", r), this.$selection.on("mousedown", function(e) {
						1 === e.which && n.trigger("toggle", {
							originalEvent: e
						})
					}), this.$selection.on("focus", function(e) {}), this.$selection.on("blur", function(e) {}), e.on("focus", function(t) {
						e.isOpen() || n.$selection.focus()
					}), e.on("selection:update", function(e) {
						n.update(e.data)
					})
				}, i.prototype.clear = function() {
					this.$selection.find(".select2-selection__rendered").empty()
				}, i.prototype.display = function(e, t) {
					var n = this.options.get("templateSelection"),
						r = this.options.get("escapeMarkup");
					return r(n(e, t))
				}, i.prototype.selectionContainer = function() {
					return e("<span></span>")
				}, i.prototype.update = function(e) {
					if (0 === e.length) return void this.clear();
					var t = e[0],
						n = this.$selection.find(".select2-selection__rendered"),
						r = this.display(t, n);
					n.empty().append(r), n.prop("title", t.title || t.text)
				}, i
			}), t.define("select2/selection/multiple", ["jquery", "./base", "../utils"], function(e, t, n) {
				function r(e, t) {
					r.__super__.constructor.apply(this, arguments)
				}
				return n.Extend(r, t), r.prototype.render = function() {
					var e = r.__super__.render.call(this);
					return e.addClass("select2-selection--multiple"), e.html('<ul class="select2-selection__rendered"></ul>'), e
				}, r.prototype.bind = function(t, n) {
					var i = this;
					r.__super__.bind.apply(this, arguments), this.$selection.on("click", function(e) {
						i.trigger("toggle", {
							originalEvent: e
						})
					}), this.$selection.on("click", ".select2-selection__choice__remove", function(t) {
						if (!i.options.get("disabled")) {
							var n = e(this),
								r = n.parent(),
								a = r.data("data");
							i.trigger("unselect", {
								originalEvent: t,
								data: a
							})
						}
					})
				}, r.prototype.clear = function() {
					this.$selection.find(".select2-selection__rendered").empty()
				}, r.prototype.display = function(e, t) {
					var n = this.options.get("templateSelection"),
						r = this.options.get("escapeMarkup");
					return r(n(e, t))
				}, r.prototype.selectionContainer = function() {
					var t = e('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>');
					return t
				}, r.prototype.update = function(e) {
					if (this.clear(), 0 !== e.length) {
						for (var t = [], r = 0; r < e.length; r++) {
							var i = e[r],
								a = this.selectionContainer(),
								o = this.display(i, a);
							a.append(o), a.prop("title", i.title || i.text), a.data("data", i), t.push(a)
						}
						var s = this.$selection.find(".select2-selection__rendered");
						n.appendMany(s, t)
					}
				}, r
			}), t.define("select2/selection/placeholder", ["../utils"], function(e) {
				function t(e, t, n) {
					this.placeholder = this.normalizePlaceholder(n.get("placeholder")), e.call(this, t, n)
				}
				return t.prototype.normalizePlaceholder = function(e, t) {
					return "string" == typeof t && (t = {
						id: "",
						text: t
					}), t
				}, t.prototype.createPlaceholder = function(e, t) {
					var n = this.selectionContainer();
					return n.html(this.display(t)), n.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"), n
				}, t.prototype.update = function(e, t) {
					var n = 1 == t.length && t[0].id != this.placeholder.id,
						r = t.length > 1;
					if (r || n) return e.call(this, t);
					this.clear();
					var i = this.createPlaceholder(this.placeholder);
					this.$selection.find(".select2-selection__rendered").append(i)
				}, t
			}), t.define("select2/selection/allowClear", ["jquery", "../keys"], function(e, t) {
				function n() {}
				return n.prototype.bind = function(e, t, n) {
					var r = this;
					e.call(this, t, n), null == this.placeholder && this.options.get("debug") && window.console && console.error && console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."), this.$selection.on("mousedown", ".select2-selection__clear", function(e) {
						r._handleClear(e)
					}), t.on("keypress", function(e) {
						r._handleKeyboardClear(e, t)
					})
				}, n.prototype._handleClear = function(e, t) {
					if (!this.options.get("disabled")) {
						var n = this.$selection.find(".select2-selection__clear");
						if (0 !== n.length) {
							t.stopPropagation();
							for (var r = n.data("data"), i = 0; i < r.length; i++) {
								var a = {
									data: r[i]
								};
								if (this.trigger("unselect", a), a.prevented) return
							}
							this.$element.val(this.placeholder.id).trigger("change"), this.trigger("toggle", {})
						}
					}
				}, n.prototype._handleKeyboardClear = function(e, n, r) {
					r.isOpen() || (n.which == t.DELETE || n.which == t.BACKSPACE) && this._handleClear(n)
				}, n.prototype.update = function(t, n) {
					if (t.call(this, n), !(this.$selection.find(".select2-selection__placeholder").length > 0 || 0 === n.length)) {
						var r = e('<span class="select2-selection__clear">&times;</span>');
						r.data("data", n), this.$selection.find(".select2-selection__rendered").prepend(r)
					}
				}, n
			}), t.define("select2/selection/search", ["jquery", "../utils", "../keys"], function(e, t, n) {
				function r(e, t, n) {
					e.call(this, t, n)
				}
				return r.prototype.render = function(t) {
					var n = e('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>');
					this.$searchContainer = n, this.$search = n.find("input");
					var r = t.call(this);
					return this._transferTabIndex(), r
				}, r.prototype.bind = function(e, t, r) {
					var i = this;
					e.call(this, t, r), t.on("open", function() {
						i.$search.trigger("focus")
					}), t.on("close", function() {
						i.$search.val(""), i.$search.removeAttr("aria-activedescendant"), i.$search.trigger("focus")
					}), t.on("enable", function() {
						i.$search.prop("disabled", !1), i._transferTabIndex()
					}), t.on("disable", function() {
						i.$search.prop("disabled", !0)
					}), t.on("focus", function(e) {
						i.$search.trigger("focus")
					}), t.on("results:focus", function(e) {
						i.$search.attr("aria-activedescendant", e.id)
					}), this.$selection.on("focusin", ".select2-search--inline", function(e) {
						i.trigger("focus", e)
					}), this.$selection.on("focusout", ".select2-search--inline", function(e) {
						i._handleBlur(e)
					}), this.$selection.on("keydown", ".select2-search--inline", function(e) {
						e.stopPropagation(), i.trigger("keypress", e), i._keyUpPrevented = e.isDefaultPrevented();
						var t = e.which;
						if (t === n.BACKSPACE && "" === i.$search.val()) {
							var r = i.$searchContainer.prev(".select2-selection__choice");
							if (r.length > 0) {
								var a = r.data("data");
								i.searchRemoveChoice(a), e.preventDefault()
							}
						}
					});
					var a = document.documentMode,
						o = a && 11 >= a;
					this.$selection.on("input.searchcheck", ".select2-search--inline", function(e) {
						return o ? void i.$selection.off("input.search input.searchcheck") : void i.$selection.off("keyup.search")
					}), this.$selection.on("keyup.search input.search", ".select2-search--inline", function(e) {
						if (o && "input" === e.type) return void i.$selection.off("input.search input.searchcheck");
						var t = e.which;
						t != n.SHIFT && t != n.CTRL && t != n.ALT && t != n.TAB && i.handleSearch(e)
					})
				}, r.prototype._transferTabIndex = function(e) {
					this.$search.attr("tabindex", this.$selection.attr("tabindex")), this.$selection.attr("tabindex", "-1")
				}, r.prototype.createPlaceholder = function(e, t) {
					this.$search.attr("placeholder", t.text)
				}, r.prototype.update = function(e, t) {
					var n = this.$search[0] == document.activeElement;
					this.$search.attr("placeholder", ""), e.call(this, t), this.$selection.find(".select2-selection__rendered").append(this.$searchContainer), this.resizeSearch(), n && this.$search.focus()
				}, r.prototype.handleSearch = function() {
					if (this.resizeSearch(), !this._keyUpPrevented) {
						var e = this.$search.val();
						this.trigger("query", {
							term: e
						})
					}
					this._keyUpPrevented = !1
				}, r.prototype.searchRemoveChoice = function(e, t) {
					this.trigger("unselect", {
						data: t
					}), this.$search.val(t.text), this.handleSearch()
				}, r.prototype.resizeSearch = function() {
					this.$search.css("width", "25px");
					var e = "";
					if ("" !== this.$search.attr("placeholder")) e = this.$selection.find(".select2-selection__rendered").innerWidth();
					else {
						var t = this.$search.val().length + 1;
						e = .75 * t + "em"
					}
					this.$search.css("width", e)
				}, r
			}), t.define("select2/selection/eventRelay", ["jquery"], function(e) {
				function t() {}
				return t.prototype.bind = function(t, n, r) {
					var i = this,
						a = ["open", "opening", "close", "closing", "select", "selecting", "unselect", "unselecting"],
						o = ["opening", "closing", "selecting", "unselecting"];
					t.call(this, n, r), n.on("*", function(t, n) {
						if (-1 !== e.inArray(t, a)) {
							n = n || {};
							var r = e.Event("select2:" + t, {
								params: n
							});
							i.$element.trigger(r), -1 !== e.inArray(t, o) && (n.prevented = r.isDefaultPrevented())
						}
					})
				}, t
			}), t.define("select2/translation", ["jquery", "require"], function(e, t) {
				function n(e) {
					this.dict = e || {}
				}
				return n.prototype.all = function() {
					return this.dict
				}, n.prototype.get = function(e) {
					return this.dict[e]
				}, n.prototype.extend = function(t) {
					this.dict = e.extend({}, t.all(), this.dict)
				}, n._cache = {}, n.loadPath = function(e) {
					if (!(e in n._cache)) {
						var r = t(e);
						n._cache[e] = r
					}
					return new n(n._cache[e])
				}, n
			}), t.define("select2/diacritics", [], function() {
				var e = {
					"Ⓐ": "A",
					"Ａ": "A",
					"À": "A",
					"Á": "A",
					"Â": "A",
					"Ầ": "A",
					"Ấ": "A",
					"Ẫ": "A",
					"Ẩ": "A",
					"Ã": "A",
					"Ā": "A",
					"Ă": "A",
					"Ằ": "A",
					"Ắ": "A",
					"Ẵ": "A",
					"Ẳ": "A",
					"Ȧ": "A",
					"Ǡ": "A",
					"Ä": "A",
					"Ǟ": "A",
					"Ả": "A",
					"Å": "A",
					"Ǻ": "A",
					"Ǎ": "A",
					"Ȁ": "A",
					"Ȃ": "A",
					"Ạ": "A",
					"Ậ": "A",
					"Ặ": "A",
					"Ḁ": "A",
					"Ą": "A",
					"Ⱥ": "A",
					"Ɐ": "A",
					"Ꜳ": "AA",
					"Æ": "AE",
					"Ǽ": "AE",
					"Ǣ": "AE",
					"Ꜵ": "AO",
					"Ꜷ": "AU",
					"Ꜹ": "AV",
					"Ꜻ": "AV",
					"Ꜽ": "AY",
					"Ⓑ": "B",
					"Ｂ": "B",
					"Ḃ": "B",
					"Ḅ": "B",
					"Ḇ": "B",
					"Ƀ": "B",
					"Ƃ": "B",
					"Ɓ": "B",
					"Ⓒ": "C",
					"Ｃ": "C",
					"Ć": "C",
					"Ĉ": "C",
					"Ċ": "C",
					"Č": "C",
					"Ç": "C",
					"Ḉ": "C",
					"Ƈ": "C",
					"Ȼ": "C",
					"Ꜿ": "C",
					"Ⓓ": "D",
					"Ｄ": "D",
					"Ḋ": "D",
					"Ď": "D",
					"Ḍ": "D",
					"Ḑ": "D",
					"Ḓ": "D",
					"Ḏ": "D",
					"Đ": "D",
					"Ƌ": "D",
					"Ɗ": "D",
					"Ɖ": "D",
					"Ꝺ": "D",
					"Ǳ": "DZ",
					"Ǆ": "DZ",
					"ǲ": "Dz",
					"ǅ": "Dz",
					"Ⓔ": "E",
					"Ｅ": "E",
					"È": "E",
					"É": "E",
					"Ê": "E",
					"Ề": "E",
					"Ế": "E",
					"Ễ": "E",
					"Ể": "E",
					"Ẽ": "E",
					"Ē": "E",
					"Ḕ": "E",
					"Ḗ": "E",
					"Ĕ": "E",
					"Ė": "E",
					"Ë": "E",
					"Ẻ": "E",
					"Ě": "E",
					"Ȅ": "E",
					"Ȇ": "E",
					"Ẹ": "E",
					"Ệ": "E",
					"Ȩ": "E",
					"Ḝ": "E",
					"Ę": "E",
					"Ḙ": "E",
					"Ḛ": "E",
					"Ɛ": "E",
					"Ǝ": "E",
					"Ⓕ": "F",
					"Ｆ": "F",
					"Ḟ": "F",
					"Ƒ": "F",
					"Ꝼ": "F",
					"Ⓖ": "G",
					"Ｇ": "G",
					"Ǵ": "G",
					"Ĝ": "G",
					"Ḡ": "G",
					"Ğ": "G",
					"Ġ": "G",
					"Ǧ": "G",
					"Ģ": "G",
					"Ǥ": "G",
					"Ɠ": "G",
					"Ꞡ": "G",
					"Ᵹ": "G",
					"Ꝿ": "G",
					"Ⓗ": "H",
					"Ｈ": "H",
					"Ĥ": "H",
					"Ḣ": "H",
					"Ḧ": "H",
					"Ȟ": "H",
					"Ḥ": "H",
					"Ḩ": "H",
					"Ḫ": "H",
					"Ħ": "H",
					"Ⱨ": "H",
					"Ⱶ": "H",
					"Ɥ": "H",
					"Ⓘ": "I",
					"Ｉ": "I",
					"Ì": "I",
					"Í": "I",
					"Î": "I",
					"Ĩ": "I",
					"Ī": "I",
					"Ĭ": "I",
					"İ": "I",
					"Ï": "I",
					"Ḯ": "I",
					"Ỉ": "I",
					"Ǐ": "I",
					"Ȉ": "I",
					"Ȋ": "I",
					"Ị": "I",
					"Į": "I",
					"Ḭ": "I",
					"Ɨ": "I",
					"Ⓙ": "J",
					"Ｊ": "J",
					"Ĵ": "J",
					"Ɉ": "J",
					"Ⓚ": "K",
					"Ｋ": "K",
					"Ḱ": "K",
					"Ǩ": "K",
					"Ḳ": "K",
					"Ķ": "K",
					"Ḵ": "K",
					"Ƙ": "K",
					"Ⱪ": "K",
					"Ꝁ": "K",
					"Ꝃ": "K",
					"Ꝅ": "K",
					"Ꞣ": "K",
					"Ⓛ": "L",
					"Ｌ": "L",
					"Ŀ": "L",
					"Ĺ": "L",
					"Ľ": "L",
					"Ḷ": "L",
					"Ḹ": "L",
					"Ļ": "L",
					"Ḽ": "L",
					"Ḻ": "L",
					"Ł": "L",
					"Ƚ": "L",
					"Ɫ": "L",
					"Ⱡ": "L",
					"Ꝉ": "L",
					"Ꝇ": "L",
					"Ꞁ": "L",
					"Ǉ": "LJ",
					"ǈ": "Lj",
					"Ⓜ": "M",
					"Ｍ": "M",
					"Ḿ": "M",
					"Ṁ": "M",
					"Ṃ": "M",
					"Ɱ": "M",
					"Ɯ": "M",
					"Ⓝ": "N",
					"Ｎ": "N",
					"Ǹ": "N",
					"Ń": "N",
					"Ñ": "N",
					"Ṅ": "N",
					"Ň": "N",
					"Ṇ": "N",
					"Ņ": "N",
					"Ṋ": "N",
					"Ṉ": "N",
					"Ƞ": "N",
					"Ɲ": "N",
					"Ꞑ": "N",
					"Ꞥ": "N",
					"Ǌ": "NJ",
					"ǋ": "Nj",
					"Ⓞ": "O",
					"Ｏ": "O",
					"Ò": "O",
					"Ó": "O",
					"Ô": "O",
					"Ồ": "O",
					"Ố": "O",
					"Ỗ": "O",
					"Ổ": "O",
					"Õ": "O",
					"Ṍ": "O",
					"Ȭ": "O",
					"Ṏ": "O",
					"Ō": "O",
					"Ṑ": "O",
					"Ṓ": "O",
					"Ŏ": "O",
					"Ȯ": "O",
					"Ȱ": "O",
					"Ö": "O",
					"Ȫ": "O",
					"Ỏ": "O",
					"Ő": "O",
					"Ǒ": "O",
					"Ȍ": "O",
					"Ȏ": "O",
					"Ơ": "O",
					"Ờ": "O",
					"Ớ": "O",
					"Ỡ": "O",
					"Ở": "O",
					"Ợ": "O",
					"Ọ": "O",
					"Ộ": "O",
					"Ǫ": "O",
					"Ǭ": "O",
					"Ø": "O",
					"Ǿ": "O",
					"Ɔ": "O",
					"Ɵ": "O",
					"Ꝋ": "O",
					"Ꝍ": "O",
					"Ƣ": "OI",
					"Ꝏ": "OO",
					"Ȣ": "OU",
					"Ⓟ": "P",
					"Ｐ": "P",
					"Ṕ": "P",
					"Ṗ": "P",
					"Ƥ": "P",
					"Ᵽ": "P",
					"Ꝑ": "P",
					"Ꝓ": "P",
					"Ꝕ": "P",
					"Ⓠ": "Q",
					"Ｑ": "Q",
					"Ꝗ": "Q",
					"Ꝙ": "Q",
					"Ɋ": "Q",
					"Ⓡ": "R",
					"Ｒ": "R",
					"Ŕ": "R",
					"Ṙ": "R",
					"Ř": "R",
					"Ȑ": "R",
					"Ȓ": "R",
					"Ṛ": "R",
					"Ṝ": "R",
					"Ŗ": "R",
					"Ṟ": "R",
					"Ɍ": "R",
					"Ɽ": "R",
					"Ꝛ": "R",
					"Ꞧ": "R",
					"Ꞃ": "R",
					"Ⓢ": "S",
					"Ｓ": "S",
					"ẞ": "S",
					"Ś": "S",
					"Ṥ": "S",
					"Ŝ": "S",
					"Ṡ": "S",
					"Š": "S",
					"Ṧ": "S",
					"Ṣ": "S",
					"Ṩ": "S",
					"Ș": "S",
					"Ş": "S",
					"Ȿ": "S",
					"Ꞩ": "S",
					"Ꞅ": "S",
					"Ⓣ": "T",
					"Ｔ": "T",
					"Ṫ": "T",
					"Ť": "T",
					"Ṭ": "T",
					"Ț": "T",
					"Ţ": "T",
					"Ṱ": "T",
					"Ṯ": "T",
					"Ŧ": "T",
					"Ƭ": "T",
					"Ʈ": "T",
					"Ⱦ": "T",
					"Ꞇ": "T",
					"Ꜩ": "TZ",
					"Ⓤ": "U",
					"Ｕ": "U",
					"Ù": "U",
					"Ú": "U",
					"Û": "U",
					"Ũ": "U",
					"Ṹ": "U",
					"Ū": "U",
					"Ṻ": "U",
					"Ŭ": "U",
					"Ü": "U",
					"Ǜ": "U",
					"Ǘ": "U",
					"Ǖ": "U",
					"Ǚ": "U",
					"Ủ": "U",
					"Ů": "U",
					"Ű": "U",
					"Ǔ": "U",
					"Ȕ": "U",
					"Ȗ": "U",
					"Ư": "U",
					"Ừ": "U",
					"Ứ": "U",
					"Ữ": "U",
					"Ử": "U",
					"Ự": "U",
					"Ụ": "U",
					"Ṳ": "U",
					"Ų": "U",
					"Ṷ": "U",
					"Ṵ": "U",
					"Ʉ": "U",
					"Ⓥ": "V",
					"Ｖ": "V",
					"Ṽ": "V",
					"Ṿ": "V",
					"Ʋ": "V",
					"Ꝟ": "V",
					"Ʌ": "V",
					"Ꝡ": "VY",
					"Ⓦ": "W",
					"Ｗ": "W",
					"Ẁ": "W",
					"Ẃ": "W",
					"Ŵ": "W",
					"Ẇ": "W",
					"Ẅ": "W",
					"Ẉ": "W",
					"Ⱳ": "W",
					"Ⓧ": "X",
					"Ｘ": "X",
					"Ẋ": "X",
					"Ẍ": "X",
					"Ⓨ": "Y",
					"Ｙ": "Y",
					"Ỳ": "Y",
					"Ý": "Y",
					"Ŷ": "Y",
					"Ỹ": "Y",
					"Ȳ": "Y",
					"Ẏ": "Y",
					"Ÿ": "Y",
					"Ỷ": "Y",
					"Ỵ": "Y",
					"Ƴ": "Y",
					"Ɏ": "Y",
					"Ỿ": "Y",
					"Ⓩ": "Z",
					"Ｚ": "Z",
					"Ź": "Z",
					"Ẑ": "Z",
					"Ż": "Z",
					"Ž": "Z",
					"Ẓ": "Z",
					"Ẕ": "Z",
					"Ƶ": "Z",
					"Ȥ": "Z",
					"Ɀ": "Z",
					"Ⱬ": "Z",
					"Ꝣ": "Z",
					"ⓐ": "a",
					"ａ": "a",
					"ẚ": "a",
					"à": "a",
					"á": "a",
					"â": "a",
					"ầ": "a",
					"ấ": "a",
					"ẫ": "a",
					"ẩ": "a",
					"ã": "a",
					"ā": "a",
					"ă": "a",
					"ằ": "a",
					"ắ": "a",
					"ẵ": "a",
					"ẳ": "a",
					"ȧ": "a",
					"ǡ": "a",
					"ä": "a",
					"ǟ": "a",
					"ả": "a",
					"å": "a",
					"ǻ": "a",
					"ǎ": "a",
					"ȁ": "a",
					"ȃ": "a",
					"ạ": "a",
					"ậ": "a",
					"ặ": "a",
					"ḁ": "a",
					"ą": "a",
					"ⱥ": "a",
					"ɐ": "a",
					"ꜳ": "aa",
					"æ": "ae",
					"ǽ": "ae",
					"ǣ": "ae",
					"ꜵ": "ao",
					"ꜷ": "au",
					"ꜹ": "av",
					"ꜻ": "av",
					"ꜽ": "ay",
					"ⓑ": "b",
					"ｂ": "b",
					"ḃ": "b",
					"ḅ": "b",
					"ḇ": "b",
					"ƀ": "b",
					"ƃ": "b",
					"ɓ": "b",
					"ⓒ": "c",
					"ｃ": "c",
					"ć": "c",
					"ĉ": "c",
					"ċ": "c",
					"č": "c",
					"ç": "c",
					"ḉ": "c",
					"ƈ": "c",
					"ȼ": "c",
					"ꜿ": "c",
					"ↄ": "c",
					"ⓓ": "d",
					"ｄ": "d",
					"ḋ": "d",
					"ď": "d",
					"ḍ": "d",
					"ḑ": "d",
					"ḓ": "d",
					"ḏ": "d",
					"đ": "d",
					"ƌ": "d",
					"ɖ": "d",
					"ɗ": "d",
					"ꝺ": "d",
					"ǳ": "dz",
					"ǆ": "dz",
					"ⓔ": "e",
					"ｅ": "e",
					"è": "e",
					"é": "e",
					"ê": "e",
					"ề": "e",
					"ế": "e",
					"ễ": "e",
					"ể": "e",
					"ẽ": "e",
					"ē": "e",
					"ḕ": "e",
					"ḗ": "e",
					"ĕ": "e",
					"ė": "e",
					"ë": "e",
					"ẻ": "e",
					"ě": "e",
					"ȅ": "e",
					"ȇ": "e",
					"ẹ": "e",
					"ệ": "e",
					"ȩ": "e",
					"ḝ": "e",
					"ę": "e",
					"ḙ": "e",
					"ḛ": "e",
					"ɇ": "e",
					"ɛ": "e",
					"ǝ": "e",
					"ⓕ": "f",
					"ｆ": "f",
					"ḟ": "f",
					"ƒ": "f",
					"ꝼ": "f",
					"ⓖ": "g",
					"ｇ": "g",
					"ǵ": "g",
					"ĝ": "g",
					"ḡ": "g",
					"ğ": "g",
					"ġ": "g",
					"ǧ": "g",
					"ģ": "g",
					"ǥ": "g",
					"ɠ": "g",
					"ꞡ": "g",
					"ᵹ": "g",
					"ꝿ": "g",
					"ⓗ": "h",
					"ｈ": "h",
					"ĥ": "h",
					"ḣ": "h",
					"ḧ": "h",
					"ȟ": "h",
					"ḥ": "h",
					"ḩ": "h",
					"ḫ": "h",
					"ẖ": "h",
					"ħ": "h",
					"ⱨ": "h",
					"ⱶ": "h",
					"ɥ": "h",
					"ƕ": "hv",
					"ⓘ": "i",
					"ｉ": "i",
					"ì": "i",
					"í": "i",
					"î": "i",
					"ĩ": "i",
					"ī": "i",
					"ĭ": "i",
					"ï": "i",
					"ḯ": "i",
					"ỉ": "i",
					"ǐ": "i",
					"ȉ": "i",
					"ȋ": "i",
					"ị": "i",
					"į": "i",
					"ḭ": "i",
					"ɨ": "i",
					"ı": "i",
					"ⓙ": "j",
					"ｊ": "j",
					"ĵ": "j",
					"ǰ": "j",
					"ɉ": "j",
					"ⓚ": "k",
					"ｋ": "k",
					"ḱ": "k",
					"ǩ": "k",
					"ḳ": "k",
					"ķ": "k",
					"ḵ": "k",
					"ƙ": "k",
					"ⱪ": "k",
					"ꝁ": "k",
					"ꝃ": "k",
					"ꝅ": "k",
					"ꞣ": "k",
					"ⓛ": "l",
					"ｌ": "l",
					"ŀ": "l",
					"ĺ": "l",
					"ľ": "l",
					"ḷ": "l",
					"ḹ": "l",
					"ļ": "l",
					"ḽ": "l",
					"ḻ": "l",
					"ſ": "l",
					"ł": "l",
					"ƚ": "l",
					"ɫ": "l",
					"ⱡ": "l",
					"ꝉ": "l",
					"ꞁ": "l",
					"ꝇ": "l",
					"ǉ": "lj",
					"ⓜ": "m",
					"ｍ": "m",
					"ḿ": "m",
					"ṁ": "m",
					"ṃ": "m",
					"ɱ": "m",
					"ɯ": "m",
					"ⓝ": "n",
					"ｎ": "n",
					"ǹ": "n",
					"ń": "n",
					"ñ": "n",
					"ṅ": "n",
					"ň": "n",
					"ṇ": "n",
					"ņ": "n",
					"ṋ": "n",
					"ṉ": "n",
					"ƞ": "n",
					"ɲ": "n",
					"ŉ": "n",
					"ꞑ": "n",
					"ꞥ": "n",
					"ǌ": "nj",
					"ⓞ": "o",
					"ｏ": "o",
					"ò": "o",
					"ó": "o",
					"ô": "o",
					"ồ": "o",
					"ố": "o",
					"ỗ": "o",
					"ổ": "o",
					"õ": "o",
					"ṍ": "o",
					"ȭ": "o",
					"ṏ": "o",
					"ō": "o",
					"ṑ": "o",
					"ṓ": "o",
					"ŏ": "o",
					"ȯ": "o",
					"ȱ": "o",
					"ö": "o",
					"ȫ": "o",
					"ỏ": "o",
					"ő": "o",
					"ǒ": "o",
					"ȍ": "o",
					"ȏ": "o",
					"ơ": "o",
					"ờ": "o",
					"ớ": "o",
					"ỡ": "o",
					"ở": "o",
					"ợ": "o",
					"ọ": "o",
					"ộ": "o",
					"ǫ": "o",
					"ǭ": "o",
					"ø": "o",
					"ǿ": "o",
					"ɔ": "o",
					"ꝋ": "o",
					"ꝍ": "o",
					"ɵ": "o",
					"ƣ": "oi",
					"ȣ": "ou",
					"ꝏ": "oo",
					"ⓟ": "p",
					"ｐ": "p",
					"ṕ": "p",
					"ṗ": "p",
					"ƥ": "p",
					"ᵽ": "p",
					"ꝑ": "p",
					"ꝓ": "p",
					"ꝕ": "p",
					"ⓠ": "q",
					"ｑ": "q",
					"ɋ": "q",
					"ꝗ": "q",
					"ꝙ": "q",
					"ⓡ": "r",
					"ｒ": "r",
					"ŕ": "r",
					"ṙ": "r",
					"ř": "r",
					"ȑ": "r",
					"ȓ": "r",
					"ṛ": "r",
					"ṝ": "r",
					"ŗ": "r",
					"ṟ": "r",
					"ɍ": "r",
					"ɽ": "r",
					"ꝛ": "r",
					"ꞧ": "r",
					"ꞃ": "r",
					"ⓢ": "s",
					"ｓ": "s",
					"ß": "s",
					"ś": "s",
					"ṥ": "s",
					"ŝ": "s",
					"ṡ": "s",
					"š": "s",
					"ṧ": "s",
					"ṣ": "s",
					"ṩ": "s",
					"ș": "s",
					"ş": "s",
					"ȿ": "s",
					"ꞩ": "s",
					"ꞅ": "s",
					"ẛ": "s",
					"ⓣ": "t",
					"ｔ": "t",
					"ṫ": "t",
					"ẗ": "t",
					"ť": "t",
					"ṭ": "t",
					"ț": "t",
					"ţ": "t",
					"ṱ": "t",
					"ṯ": "t",
					"ŧ": "t",
					"ƭ": "t",
					"ʈ": "t",
					"ⱦ": "t",
					"ꞇ": "t",
					"ꜩ": "tz",
					"ⓤ": "u",
					"ｕ": "u",
					"ù": "u",
					"ú": "u",
					"û": "u",
					"ũ": "u",
					"ṹ": "u",
					"ū": "u",
					"ṻ": "u",
					"ŭ": "u",
					"ü": "u",
					"ǜ": "u",
					"ǘ": "u",
					"ǖ": "u",
					"ǚ": "u",
					"ủ": "u",
					"ů": "u",
					"ű": "u",
					"ǔ": "u",
					"ȕ": "u",
					"ȗ": "u",
					"ư": "u",
					"ừ": "u",
					"ứ": "u",
					"ữ": "u",
					"ử": "u",
					"ự": "u",
					"ụ": "u",
					"ṳ": "u",
					"ų": "u",
					"ṷ": "u",
					"ṵ": "u",
					"ʉ": "u",
					"ⓥ": "v",
					"ｖ": "v",
					"ṽ": "v",
					"ṿ": "v",
					"ʋ": "v",
					"ꝟ": "v",
					"ʌ": "v",
					"ꝡ": "vy",
					"ⓦ": "w",
					"ｗ": "w",
					"ẁ": "w",
					"ẃ": "w",
					"ŵ": "w",
					"ẇ": "w",
					"ẅ": "w",
					"ẘ": "w",
					"ẉ": "w",
					"ⱳ": "w",
					"ⓧ": "x",
					"ｘ": "x",
					"ẋ": "x",
					"ẍ": "x",
					"ⓨ": "y",
					"ｙ": "y",
					"ỳ": "y",
					"ý": "y",
					"ŷ": "y",
					"ỹ": "y",
					"ȳ": "y",
					"ẏ": "y",
					"ÿ": "y",
					"ỷ": "y",
					"ẙ": "y",
					"ỵ": "y",
					"ƴ": "y",
					"ɏ": "y",
					"ỿ": "y",
					"ⓩ": "z",
					"ｚ": "z",
					"ź": "z",
					"ẑ": "z",
					"ż": "z",
					"ž": "z",
					"ẓ": "z",
					"ẕ": "z",
					"ƶ": "z",
					"ȥ": "z",
					"ɀ": "z",
					"ⱬ": "z",
					"ꝣ": "z",
					"Ά": "Α",
					"Έ": "Ε",
					"Ή": "Η",
					"Ί": "Ι",
					"Ϊ": "Ι",
					"Ό": "Ο",
					"Ύ": "Υ",
					"Ϋ": "Υ",
					"Ώ": "Ω",
					"ά": "α",
					"έ": "ε",
					"ή": "η",
					"ί": "ι",
					"ϊ": "ι",
					"ΐ": "ι",
					"ό": "ο",
					"ύ": "υ",
					"ϋ": "υ",
					"ΰ": "υ",
					"ω": "ω",
					"ς": "σ"
				};
				return e
			}), t.define("select2/data/base", ["../utils"], function(e) {
				function t(e, n) {
					t.__super__.constructor.call(this)
				}
				return e.Extend(t, e.Observable), t.prototype.current = function(e) {
					throw new Error("The `current` method must be defined in child classes.")
				}, t.prototype.query = function(e, t) {
					throw new Error("The `query` method must be defined in child classes.")
				}, t.prototype.bind = function(e, t) {}, t.prototype.destroy = function() {}, t.prototype.generateResultId = function(t, n) {
					var r = t.id + "-result-";
					return r += e.generateChars(4), r += null != n.id ? "-" + n.id.toString() : "-" + e.generateChars(4)
				}, t
			}), t.define("select2/data/select", ["./base", "../utils", "jquery"], function(e, t, n) {
				function r(e, t) {
					this.$element = e, this.options = t, r.__super__.constructor.call(this)
				}
				return t.Extend(r, e), r.prototype.current = function(e) {
					var t = [],
						r = this;
					this.$element.find(":selected").each(function() {
						var e = n(this),
							i = r.item(e);
						t.push(i)
					}), e(t)
				}, r.prototype.select = function(e) {
					var t = this;
					if (e.selected = !0, n(e.element).is("option")) return e.element.selected = !0, void this.$element.trigger("change");
					if (this.$element.prop("multiple")) this.current(function(r) {
						var i = [];
						e = [e], e.push.apply(e, r);
						for (var a = 0; a < e.length; a++) {
							var o = e[a].id; - 1 === n.inArray(o, i) && i.push(o)
						}
						t.$element.val(i), t.$element.trigger("change")
					});
					else {
						var r = e.id;
						this.$element.val(r), this.$element.trigger("change")
					}
				}, r.prototype.unselect = function(e) {
					var t = this;
					if (this.$element.prop("multiple")) return e.selected = !1, n(e.element).is("option") ? (e.element.selected = !1, void this.$element.trigger("change")) : void this.current(function(r) {
						for (var i = [], a = 0; a < r.length; a++) {
							var o = r[a].id;
							o !== e.id && -1 === n.inArray(o, i) && i.push(o)
						}
						t.$element.val(i), t.$element.trigger("change")
					})
				}, r.prototype.bind = function(e, t) {
					var n = this;
					this.container = e, e.on("select", function(e) {
						n.select(e.data)
					}), e.on("unselect", function(e) {
						n.unselect(e.data)
					})
				}, r.prototype.destroy = function() {
					this.$element.find("*").each(function() {
						n.removeData(this, "data")
					})
				}, r.prototype.query = function(e, t) {
					var r = [],
						i = this,
						a = this.$element.children();
					a.each(function() {
						var t = n(this);
						if (t.is("option") || t.is("optgroup")) {
							var a = i.item(t),
								o = i.matches(e, a);
							null !== o && r.push(o)
						}
					}), t({
						results: r
					})
				}, r.prototype.addOptions = function(e) {
					t.appendMany(this.$element, e)
				}, r.prototype.option = function(e) {
					var t;
					e.children ? (t = document.createElement("optgroup"), t.label = e.text) : (t = document.createElement("option"), void 0 !== t.textContent ? t.textContent = e.text : t.innerText = e.text), e.id && (t.value = e.id), e.disabled && (t.disabled = !0), e.selected && (t.selected = !0), e.title && (t.title = e.title);
					var r = n(t),
						i = this._normalizeItem(e);
					return i.element = t, n.data(t, "data", i), r
				}, r.prototype.item = function(e) {
					var t = {};
					if (t = n.data(e[0], "data"), null != t) return t;
					if (e.is("option")) t = {
						id: e.val(),
						text: e.text(),
						disabled: e.prop("disabled"),
						selected: e.prop("selected"),
						title: e.prop("title")
					};
					else if (e.is("optgroup")) {
						t = {
							text: e.prop("label"),
							children: [],
							title: e.prop("title")
						};
						for (var r = e.children("option"), i = [], a = 0; a < r.length; a++) {
							var o = n(r[a]),
								s = this.item(o);
							i.push(s)
						}
						t.children = i
					}
					return t = this._normalizeItem(t), t.element = e[0], n.data(e[0], "data", t), t
				}, r.prototype._normalizeItem = function(e) {
					n.isPlainObject(e) || (e = {
						id: e,
						text: e
					}), e = n.extend({}, {
						text: ""
					}, e);
					var t = {
						selected: !1,
						disabled: !1
					};
					return null != e.id && (e.id = e.id.toString()), null != e.text && (e.text = e.text.toString()), null == e._resultId && e.id && null != this.container && (e._resultId = this.generateResultId(this.container, e)), n.extend({}, t, e)
				}, r.prototype.matches = function(e, t) {
					var n = this.options.get("matcher");
					return n(e, t)
				}, r
			}), t.define("select2/data/array", ["./select", "../utils", "jquery"], function(e, t, n) {
				function r(e, t) {
					var n = t.get("data") || [];
					r.__super__.constructor.call(this, e, t), this.addOptions(this.convertToOptions(n))
				}
				return t.Extend(r, e), r.prototype.select = function(e) {
					var t = this.$element.find("option").filter(function(t, n) {
						return n.value == e.id.toString()
					});
					0 === t.length && (t = this.option(e), this.addOptions(t)), r.__super__.select.call(this, e)
				}, r.prototype.convertToOptions = function(e) {
					function r(e) {
						return function() {
							return n(this).val() == e.id
						}
					}
					for (var i = this, a = this.$element.find("option"), o = a.map(function() {
						return i.item(n(this)).id
					}).get(), s = [], l = 0; l < e.length; l++) {
						var u = this._normalizeItem(e[l]);
						if (n.inArray(u.id, o) >= 0) {
							var c = a.filter(r(u)),
								d = this.item(c),
								h = n.extend(!0, {}, u, d),
								f = this.option(h);
							c.replaceWith(f)
						} else {
							var p = this.option(u);
							if (u.children) {
								var m = this.convertToOptions(u.children);
								t.appendMany(p, m)
							}
							s.push(p)
						}
					}
					return s
				}, r
			}), t.define("select2/data/ajax", ["./array", "../utils", "jquery"], function(e, t, n) {
				function r(e, t) {
					this.ajaxOptions = this._applyDefaults(t.get("ajax")), null != this.ajaxOptions.processResults && (this.processResults = this.ajaxOptions.processResults), r.__super__.constructor.call(this, e, t)
				}
				return t.Extend(r, e), r.prototype._applyDefaults = function(e) {
					var t = {
						data: function(e) {
							return n.extend({}, e, {
								q: e.term
							})
						},
						transport: function(e, t, r) {
							var i = n.ajax(e);
							return i.then(t), i.fail(r), i
						}
					};
					return n.extend({}, t, e, !0)
				}, r.prototype.processResults = function(e) {
					return e
				}, r.prototype.query = function(e, t) {
					function r() {
						var r = a.transport(a, function(r) {
							var a = i.processResults(r, e);
							i.options.get("debug") && window.console && console.error && (a && a.results && n.isArray(a.results) || console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")), t(a)
						}, function() {
							r.status && "0" === r.status || i.trigger("results:message", {
								message: "errorLoading"
							})
						});
						i._request = r
					}
					var i = this;
					null != this._request && (n.isFunction(this._request.abort) && this._request.abort(), this._request = null);
					var a = n.extend({
						type: "GET"
					}, this.ajaxOptions);
					"function" == typeof a.url && (a.url = a.url.call(this.$element, e)), "function" == typeof a.data && (a.data = a.data.call(this.$element, e)), this.ajaxOptions.delay && null != e.term ? (this._queryTimeout && window.clearTimeout(this._queryTimeout), this._queryTimeout = window.setTimeout(r, this.ajaxOptions.delay)) : r()
				}, r
			}), t.define("select2/data/tags", ["jquery"], function(e) {
				function t(t, n, r) {
					var i = r.get("tags"),
						a = r.get("createTag");
					void 0 !== a && (this.createTag = a);
					var o = r.get("insertTag");
					if (void 0 !== o && (this.insertTag = o), t.call(this, n, r), e.isArray(i)) for (var s = 0; s < i.length; s++) {
						var l = i[s],
							u = this._normalizeItem(l),
							c = this.option(u);
						this.$element.append(c)
					}
				}
				return t.prototype.query = function(e, t, n) {
					function r(e, a) {
						for (var o = e.results, s = 0; s < o.length; s++) {
							var l = o[s],
								u = null != l.children && !r({
									results: l.children
								}, !0),
								c = l.text === t.term;
							if (c || u) return !a && (e.data = o, void n(e))
						}
						if (a) return !0;
						var d = i.createTag(t);
						if (null != d) {
							var h = i.option(d);
							h.attr("data-select2-tag", !0), i.addOptions([h]), i.insertTag(o, d)
						}
						e.results = o, n(e)
					}
					var i = this;
					return this._removeOldTags(), null == t.term || null != t.page ? void e.call(this, t, n) : void e.call(this, t, r)
				}, t.prototype.createTag = function(t, n) {
					var r = e.trim(n.term);
					return "" === r ? null : {
						id: r,
						text: r
					}
				}, t.prototype.insertTag = function(e, t, n) {
					t.unshift(n)
				}, t.prototype._removeOldTags = function(t) {
					var n = (this._lastTag, this.$element.find("option[data-select2-tag]"));
					n.each(function() {
						this.selected || e(this).remove()
					})
				}, t
			}), t.define("select2/data/tokenizer", ["jquery"], function(e) {
				function t(e, t, n) {
					var r = n.get("tokenizer");
					void 0 !== r && (this.tokenizer = r), e.call(this, t, n)
				}
				return t.prototype.bind = function(e, t, n) {
					e.call(this, t, n), this.$search = t.dropdown.$search || t.selection.$search || n.find(".select2-search__field")
				}, t.prototype.query = function(t, n, r) {
					function i(t) {
						var n = o._normalizeItem(t),
							r = o.$element.find("option").filter(function() {
								return e(this).val() === n.id
							});
						if (!r.length) {
							var i = o.option(n);
							i.attr("data-select2-tag", !0), o._removeOldTags(), o.addOptions([i])
						}
						a(n)
					}
					function a(e) {
						o.trigger("select", {
							data: e
						})
					}
					var o = this;
					n.term = n.term || "";
					var s = this.tokenizer(n, this.options, i);
					s.term !== n.term && (this.$search.length && (this.$search.val(s.term), this.$search.focus()), n.term = s.term), t.call(this, n, r)
				}, t.prototype.tokenizer = function(t, n, r, i) {
					for (var a = r.get("tokenSeparators") || [], o = n.term, s = 0, l = this.createTag ||
					function(e) {
						return {
							id: e.term,
							text: e.term
						}
					}; s < o.length;) {
						var u = o[s];
						if (-1 !== e.inArray(u, a)) {
							var c = o.substr(0, s),
								d = e.extend({}, n, {
									term: c
								}),
								h = l(d);
							null != h ? (i(h), o = o.substr(s + 1) || "", s = 0) : s++
						} else s++
					}
					return {
						term: o
					}
				}, t
			}), t.define("select2/data/minimumInputLength", [], function() {
				function e(e, t, n) {
					this.minimumInputLength = n.get("minimumInputLength"), e.call(this, t, n)
				}
				return e.prototype.query = function(e, t, n) {
					return t.term = t.term || "", t.term.length < this.minimumInputLength ? void this.trigger("results:message", {
						message: "inputTooShort",
						args: {
							minimum: this.minimumInputLength,
							input: t.term,
							params: t
						}
					}) : void e.call(this, t, n)
				}, e
			}), t.define("select2/data/maximumInputLength", [], function() {
				function e(e, t, n) {
					this.maximumInputLength = n.get("maximumInputLength"), e.call(this, t, n)
				}
				return e.prototype.query = function(e, t, n) {
					return t.term = t.term || "", this.maximumInputLength > 0 && t.term.length > this.maximumInputLength ? void this.trigger("results:message", {
						message: "inputTooLong",
						args: {
							maximum: this.maximumInputLength,
							input: t.term,
							params: t
						}
					}) : void e.call(this, t, n)
				}, e
			}), t.define("select2/data/maximumSelectionLength", [], function() {
				function e(e, t, n) {
					this.maximumSelectionLength = n.get("maximumSelectionLength"), e.call(this, t, n)
				}
				return e.prototype.query = function(e, t, n) {
					var r = this;
					this.current(function(i) {
						var a = null != i ? i.length : 0;
						return r.maximumSelectionLength > 0 && a >= r.maximumSelectionLength ? void r.trigger("results:message", {
							message: "maximumSelected",
							args: {
								maximum: r.maximumSelectionLength
							}
						}) : void e.call(r, t, n)
					})
				}, e
			}), t.define("select2/dropdown", ["jquery", "./utils"], function(e, t) {
				function n(e, t) {
					this.$element = e, this.options = t, n.__super__.constructor.call(this)
				}
				return t.Extend(n, t.Observable), n.prototype.render = function() {
					var t = e('<span class="select2-dropdown"><span class="select2-results"></span></span>');
					return t.attr("dir", this.options.get("dir")), this.$dropdown = t, t
				}, n.prototype.bind = function() {}, n.prototype.position = function(e, t) {}, n.prototype.destroy = function() {
					this.$dropdown.remove()
				}, n
			}), t.define("select2/dropdown/search", ["jquery", "../utils"], function(e, t) {
				function n() {}
				return n.prototype.render = function(t) {
					var n = t.call(this),
						r = e('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" /></span>');
					return this.$searchContainer = r, this.$search = r.find("input"), n.prepend(r), n
				}, n.prototype.bind = function(t, n, r) {
					var i = this;
					t.call(this, n, r), this.$search.on("keydown", function(e) {
						i.trigger("keypress", e), i._keyUpPrevented = e.isDefaultPrevented()
					}), this.$search.on("input", function(t) {
						e(this).off("keyup")
					}), this.$search.on("keyup input", function(e) {
						i.handleSearch(e)
					}), n.on("open", function() {
						i.$search.attr("tabindex", 0), i.$search.focus(), window.setTimeout(function() {
							i.$search.focus()
						}, 0)
					}), n.on("close", function() {
						i.$search.attr("tabindex", -1), i.$search.val("")
					}), n.on("focus", function() {
						n.isOpen() && i.$search.focus()
					}), n.on("results:all", function(e) {
						if (null == e.query.term || "" === e.query.term) {
							var t = i.showSearch(e);
							t ? i.$searchContainer.removeClass("select2-search--hide") : i.$searchContainer.addClass("select2-search--hide")
						}
					})
				}, n.prototype.handleSearch = function(e) {
					if (!this._keyUpPrevented) {
						var t = this.$search.val();
						this.trigger("query", {
							term: t
						})
					}
					this._keyUpPrevented = !1
				}, n.prototype.showSearch = function(e, t) {
					return !0
				}, n
			}), t.define("select2/dropdown/hidePlaceholder", [], function() {
				function e(e, t, n, r) {
					this.placeholder = this.normalizePlaceholder(n.get("placeholder")), e.call(this, t, n, r)
				}
				return e.prototype.append = function(e, t) {
					t.results = this.removePlaceholder(t.results), e.call(this, t)
				}, e.prototype.normalizePlaceholder = function(e, t) {
					return "string" == typeof t && (t = {
						id: "",
						text: t
					}), t
				}, e.prototype.removePlaceholder = function(e, t) {
					for (var n = t.slice(0), r = t.length - 1; r >= 0; r--) {
						var i = t[r];
						this.placeholder.id === i.id && n.splice(r, 1)
					}
					return n
				}, e
			}), t.define("select2/dropdown/infiniteScroll", ["jquery"], function(e) {
				function t(e, t, n, r) {
					this.lastParams = {}, e.call(this, t, n, r), this.$loadingMore = this.createLoadingMore(), this.loading = !1
				}
				return t.prototype.append = function(e, t) {
					this.$loadingMore.remove(), this.loading = !1, e.call(this, t), this.showLoadingMore(t) && this.$results.append(this.$loadingMore)
				}, t.prototype.bind = function(t, n, r) {
					var i = this;
					t.call(this, n, r), n.on("query", function(e) {
						i.lastParams = e, i.loading = !0
					}), n.on("query:append", function(e) {
						i.lastParams = e, i.loading = !0
					}), this.$results.on("scroll", function() {
						var t = e.contains(document.documentElement, i.$loadingMore[0]);
						if (!i.loading && t) {
							var n = i.$results.offset().top + i.$results.outerHeight(!1),
								r = i.$loadingMore.offset().top + i.$loadingMore.outerHeight(!1);
							n + 50 >= r && i.loadMore()
						}
					})
				}, t.prototype.loadMore = function() {
					this.loading = !0;
					var t = e.extend({}, {
						page: 1
					}, this.lastParams);
					t.page++, this.trigger("query:append", t)
				}, t.prototype.showLoadingMore = function(e, t) {
					return t.pagination && t.pagination.more
				}, t.prototype.createLoadingMore = function() {
					var t = e('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),
						n = this.options.get("translations").get("loadingMore");
					return t.html(n(this.lastParams)), t
				}, t
			}), t.define("select2/dropdown/attachBody", ["jquery", "../utils"], function(e, t) {
				function n(t, n, r) {
					this.$dropdownParent = r.get("dropdownParent") || e(document.body), t.call(this, n, r)
				}
				return n.prototype.bind = function(e, t, n) {
					var r = this,
						i = !1;
					e.call(this, t, n), t.on("open", function() {
						r._showDropdown(), r._attachPositioningHandler(t), i || (i = !0, t.on("results:all", function() {
							r._positionDropdown(), r._resizeDropdown()
						}), t.on("results:append", function() {
							r._positionDropdown(), r._resizeDropdown()
						}))
					}), t.on("close", function() {
						r._hideDropdown(), r._detachPositioningHandler(t)
					}), this.$dropdownContainer.on("mousedown", function(e) {
						e.stopPropagation()
					})
				}, n.prototype.destroy = function(e) {
					e.call(this), this.$dropdownContainer.remove()
				}, n.prototype.position = function(e, t, n) {
					t.attr("class", n.attr("class")), t.removeClass("select2"), t.addClass("select2-container--open"), t.css({
						position: "absolute",
						top: -999999
					}), this.$container = n
				}, n.prototype.render = function(t) {
					var n = e("<span></span>"),
						r = t.call(this);
					return n.append(r), this.$dropdownContainer = n, n
				}, n.prototype._hideDropdown = function(e) {
					this.$dropdownContainer.detach()
				}, n.prototype._attachPositioningHandler = function(n, r) {
					var i = this,
						a = "scroll.select2." + r.id,
						o = "resize.select2." + r.id,
						s = "orientationchange.select2." + r.id,
						l = this.$container.parents().filter(t.hasScroll);
					l.each(function() {
						e(this).data("select2-scroll-position", {
							x: e(this).scrollLeft(),
							y: e(this).scrollTop()
						})
					}), l.on(a, function(t) {
						var n = e(this).data("select2-scroll-position");
						e(this).scrollTop(n.y)
					}), e(window).on(a + " " + o + " " + s, function(e) {
						i._positionDropdown(), i._resizeDropdown()
					})
				}, n.prototype._detachPositioningHandler = function(n, r) {
					var i = "scroll.select2." + r.id,
						a = "resize.select2." + r.id,
						o = "orientationchange.select2." + r.id,
						s = this.$container.parents().filter(t.hasScroll);
					s.off(i), e(window).off(i + " " + a + " " + o)
				}, n.prototype._positionDropdown = function() {
					var t = e(window),
						n = this.$dropdown.hasClass("select2-dropdown--above"),
						r = this.$dropdown.hasClass("select2-dropdown--below"),
						i = null,
						a = this.$container.offset();
					a.bottom = a.top + this.$container.outerHeight(!1);
					var o = {
						height: this.$container.outerHeight(!1)
					};
					o.top = a.top, o.bottom = a.top + o.height;
					var s = {
						height: this.$dropdown.outerHeight(!1)
					},
						l = {
							top: t.scrollTop(),
							bottom: t.scrollTop() + t.height()
						},
						u = l.top < a.top - s.height,
						c = l.bottom > a.bottom + s.height,
						d = {
							left: a.left,
							top: o.bottom
						},
						h = this.$dropdownParent;
					"static" === h.css("position") && (h = h.offsetParent());
					var f = h.offset();
					d.top -= f.top, d.left -= f.left, n || r || (i = "below"), c || !u || n ? !u && c && n && (i = "below") : i = "above", ("above" == i || n && "below" !== i) && (d.top = o.top - f.top - s.height), null != i && (this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--" + i), this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--" + i)), this.$dropdownContainer.css(d)
				}, n.prototype._resizeDropdown = function() {
					var e = {
						width: this.$container.outerWidth(!1) + "px"
					};
					this.options.get("dropdownAutoWidth") && (e.minWidth = e.width, e.position = "relative", e.width = "auto"), this.$dropdown.css(e)
				}, n.prototype._showDropdown = function(e) {
					this.$dropdownContainer.appendTo(this.$dropdownParent), this._positionDropdown(), this._resizeDropdown()
				}, n
			}), t.define("select2/dropdown/minimumResultsForSearch", [], function() {
				function e(t) {
					for (var n = 0, r = 0; r < t.length; r++) {
						var i = t[r];
						i.children ? n += e(i.children) : n++
					}
					return n
				}
				function t(e, t, n, r) {
					this.minimumResultsForSearch = n.get("minimumResultsForSearch"), this.minimumResultsForSearch < 0 && (this.minimumResultsForSearch = 1 / 0), e.call(this, t, n, r)
				}
				return t.prototype.showSearch = function(t, n) {
					return !(e(n.data.results) < this.minimumResultsForSearch) && t.call(this, n)
				}, t
			}), t.define("select2/dropdown/selectOnClose", [], function() {
				function e() {}
				return e.prototype.bind = function(e, t, n) {
					var r = this;
					e.call(this, t, n), t.on("close", function(e) {
						r._handleSelectOnClose(e)
					})
				}, e.prototype._handleSelectOnClose = function(e, t) {
					if (t && null != t.originalSelect2Event) {
						var n = t.originalSelect2Event;
						if ("select" === n._type || "unselect" === n._type) return
					}
					var r = this.getHighlightedResults();
					if (!(r.length < 1)) {
						var i = r.data("data");
						null != i.element && i.element.selected || null == i.element && i.selected || this.trigger("select", {
							data: i
						})
					}
				}, e
			}), t.define("select2/dropdown/closeOnSelect", [], function() {
				function e() {}
				return e.prototype.bind = function(e, t, n) {
					var r = this;
					e.call(this, t, n), t.on("select", function(e) {
						r._selectTriggered(e)
					}), t.on("unselect", function(e) {
						r._selectTriggered(e)
					})
				}, e.prototype._selectTriggered = function(e, t) {
					var n = t.originalEvent;
					n && n.ctrlKey || this.trigger("close", {
						originalEvent: n,
						originalSelect2Event: t
					})
				}, e
			}), t.define("select2/i18n/en", [], function() {
				return {
					errorLoading: function() {
						return "The results could not be loaded."
					},
					inputTooLong: function(e) {
						var t = e.input.length - e.maximum,
							n = "Please delete " + t + " character";
						return 1 != t && (n += "s"), n
					},
					inputTooShort: function(e) {
						var t = e.minimum - e.input.length,
							n = "Please enter " + t + " or more characters";
						return n
					},
					loadingMore: function() {
						return "Loading more results…"
					},
					maximumSelected: function(e) {
						var t = "You can only select " + e.maximum + " item";
						return 1 != e.maximum && (t += "s"), t
					},
					noResults: function() {
						return "No results found"
					},
					searching: function() {
						return "Searching…"
					}
				}
			}), t.define("select2/defaults", ["jquery", "require", "./results", "./selection/single", "./selection/multiple", "./selection/placeholder", "./selection/allowClear", "./selection/search", "./selection/eventRelay", "./utils", "./translation", "./diacritics", "./data/select", "./data/array", "./data/ajax", "./data/tags", "./data/tokenizer", "./data/minimumInputLength", "./data/maximumInputLength", "./data/maximumSelectionLength", "./dropdown", "./dropdown/search", "./dropdown/hidePlaceholder", "./dropdown/infiniteScroll", "./dropdown/attachBody", "./dropdown/minimumResultsForSearch", "./dropdown/selectOnClose", "./dropdown/closeOnSelect", "./i18n/en"], function(e, t, n, r, i, a, o, s, l, u, c, d, h, f, p, m, _, g, y, v, E, b, U, w, k, M, L, F, D) {
				function x() {
					this.reset()
				}
				x.prototype.apply = function(d) {
					if (d = e.extend(!0, {}, this.defaults, d), null == d.dataAdapter) {
						if (null != d.ajax ? d.dataAdapter = p : null != d.data ? d.dataAdapter = f : d.dataAdapter = h, d.minimumInputLength > 0 && (d.dataAdapter = u.Decorate(d.dataAdapter, g)), d.maximumInputLength > 0 && (d.dataAdapter = u.Decorate(d.dataAdapter, y)), d.maximumSelectionLength > 0 && (d.dataAdapter = u.Decorate(d.dataAdapter, v)), d.tags && (d.dataAdapter = u.Decorate(d.dataAdapter, m)), (null != d.tokenSeparators || null != d.tokenizer) && (d.dataAdapter = u.Decorate(d.dataAdapter, _)), null != d.query) {
							var D = t(d.amdBase + "compat/query");
							d.dataAdapter = u.Decorate(d.dataAdapter, D)
						}
						if (null != d.initSelection) {
							var x = t(d.amdBase + "compat/initSelection");
							d.dataAdapter = u.Decorate(d.dataAdapter, x)
						}
					}
					if (null == d.resultsAdapter && (d.resultsAdapter = n, null != d.ajax && (d.resultsAdapter = u.Decorate(d.resultsAdapter, w)), null != d.placeholder && (d.resultsAdapter = u.Decorate(d.resultsAdapter, U)), d.selectOnClose && (d.resultsAdapter = u.Decorate(d.resultsAdapter, L))), null == d.dropdownAdapter) {
						if (d.multiple) d.dropdownAdapter = E;
						else {
							var T = u.Decorate(E, b);
							d.dropdownAdapter = T
						}
						if (0 !== d.minimumResultsForSearch && (d.dropdownAdapter = u.Decorate(d.dropdownAdapter, M)), d.closeOnSelect && (d.dropdownAdapter = u.Decorate(d.dropdownAdapter, F)), null != d.dropdownCssClass || null != d.dropdownCss || null != d.adaptDropdownCssClass) {
							var Y = t(d.amdBase + "compat/dropdownCss");
							d.dropdownAdapter = u.Decorate(d.dropdownAdapter, Y)
						}
						d.dropdownAdapter = u.Decorate(d.dropdownAdapter, k)
					}
					if (null == d.selectionAdapter) {
						if (d.multiple ? d.selectionAdapter = i : d.selectionAdapter = r, null != d.placeholder && (d.selectionAdapter = u.Decorate(d.selectionAdapter, a)), d.allowClear && (d.selectionAdapter = u.Decorate(d.selectionAdapter, o)), d.multiple && (d.selectionAdapter = u.Decorate(d.selectionAdapter, s)), null != d.containerCssClass || null != d.containerCss || null != d.adaptContainerCssClass) {
							var S = t(d.amdBase + "compat/containerCss");
							d.selectionAdapter = u.Decorate(d.selectionAdapter, S)
						}
						d.selectionAdapter = u.Decorate(d.selectionAdapter, l)
					}
					if ("string" == typeof d.language) if (d.language.indexOf("-") > 0) {
						var A = d.language.split("-"),
							C = A[0];
						d.language = [d.language, C]
					} else d.language = [d.language];
					if (e.isArray(d.language)) {
						var j = new c;
						d.language.push("en");
						for (var H = d.language, B = 0; B < H.length; B++) {
							var $ = H[B],
								P = {};
							try {
								P = c.loadPath($)
							} catch (O) {
								try {
									$ = this.defaults.amdLanguageBase + $, P = c.loadPath($)
								} catch (I) {
									d.debug && window.console && console.warn && console.warn('Select2: The language file for "' + $ + '" could not be automatically loaded. A fallback will be used instead.');
									continue
								}
							}
							j.extend(P)
						}
						d.translations = j
					} else {
						var N = c.loadPath(this.defaults.amdLanguageBase + "en"),
							W = new c(d.language);
						W.extend(N), d.translations = W
					}
					return d
				}, x.prototype.reset = function() {
					function t(e) {
						function t(e) {
							return d[e] || e
						}
						return e.replace(/[^\u0000-\u007E]/g, t)
					}
					function n(r, i) {
						if ("" === e.trim(r.term)) return i;
						if (i.children && i.children.length > 0) {
							for (var a = e.extend(!0, {}, i), o = i.children.length - 1; o >= 0; o--) {
								var s = i.children[o],
									l = n(r, s);
								null == l && a.children.splice(o, 1)
							}
							return a.children.length > 0 ? a : n(r, a)
						}
						var u = t(i.text).toUpperCase(),
							c = t(r.term).toUpperCase();
						return u.indexOf(c) > -1 ? i : null
					}
					this.defaults = {
						amdBase: "./",
						amdLanguageBase: "./i18n/",
						closeOnSelect: !0,
						debug: !1,
						dropdownAutoWidth: !1,
						escapeMarkup: u.escapeMarkup,
						language: D,
						matcher: n,
						minimumInputLength: 0,
						maximumInputLength: 0,
						maximumSelectionLength: 0,
						minimumResultsForSearch: 0,
						selectOnClose: !1,
						sorter: function(e) {
							return e
						},
						templateResult: function(e) {
							return e.text
						},
						templateSelection: function(e) {
							return e.text
						},
						theme: "default",
						width: "resolve"
					}
				}, x.prototype.set = function(t, n) {
					var r = e.camelCase(t),
						i = {};
					i[r] = n;
					var a = u._convertData(i);
					e.extend(this.defaults, a)
				};
				var T = new x;
				return T
			}), t.define("select2/options", ["require", "jquery", "./defaults", "./utils"], function(e, t, n, r) {
				function i(t, i) {
					if (this.options = t, null != i && this.fromElement(i), this.options = n.apply(this.options), i && i.is("input")) {
						var a = e(this.get("amdBase") + "compat/inputData");
						this.options.dataAdapter = r.Decorate(this.options.dataAdapter, a)
					}
				}
				return i.prototype.fromElement = function(e) {
					var n = ["select2"];
					null == this.options.multiple && (this.options.multiple = e.prop("multiple")), null == this.options.disabled && (this.options.disabled = e.prop("disabled")), null == this.options.language && (e.prop("lang") ? this.options.language = e.prop("lang").toLowerCase() : e.closest("[lang]").prop("lang") && (this.options.language = e.closest("[lang]").prop("lang"))), null == this.options.dir && (e.prop("dir") ? this.options.dir = e.prop("dir") : e.closest("[dir]").prop("dir") ? this.options.dir = e.closest("[dir]").prop("dir") : this.options.dir = "ltr"), e.prop("disabled", this.options.disabled), e.prop("multiple", this.options.multiple), e.data("select2Tags") && (this.options.debug && window.console && console.warn && console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'), e.data("data", e.data("select2Tags")), e.data("tags", !0)), e.data("ajaxUrl") && (this.options.debug && window.console && console.warn && console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."), e.attr("ajax--url", e.data("ajaxUrl")), e.data("ajax--url", e.data("ajaxUrl")));
					var i = {};
					i = t.fn.jquery && "1." == t.fn.jquery.substr(0, 2) && e[0].dataset ? t.extend(!0, {}, e[0].dataset, e.data()) : e.data();
					var a = t.extend(!0, {}, i);
					a = r._convertData(a);
					for (var o in a) t.inArray(o, n) > -1 || (t.isPlainObject(this.options[o]) ? t.extend(this.options[o], a[o]) : this.options[o] = a[o]);
					return this
				}, i.prototype.get = function(e) {
					return this.options[e]
				}, i.prototype.set = function(e, t) {
					this.options[e] = t
				}, i
			}), t.define("select2/core", ["jquery", "./options", "./utils", "./keys"], function(e, t, n, r) {
				var i = function(e, n) {
						null != e.data("select2") && e.data("select2").destroy(), this.$element = e, this.id = this._generateId(e), n = n || {}, this.options = new t(n, e), i.__super__.constructor.call(this);
						var r = e.attr("tabindex") || 0;
						e.data("old-tabindex", r), e.attr("tabindex", "-1");
						var a = this.options.get("dataAdapter");
						this.dataAdapter = new a(e, this.options);
						var o = this.render();
						this._placeContainer(o);
						var s = this.options.get("selectionAdapter");
						this.selection = new s(e, this.options), this.$selection = this.selection.render(), this.selection.position(this.$selection, o);
						var l = this.options.get("dropdownAdapter");
						this.dropdown = new l(e, this.options), this.$dropdown = this.dropdown.render(), this.dropdown.position(this.$dropdown, o);
						var u = this.options.get("resultsAdapter");
						this.results = new u(e, this.options, this.dataAdapter), this.$results = this.results.render(), this.results.position(this.$results, this.$dropdown);
						var c = this;
						this._bindAdapters(), this._registerDomEvents(), this._registerDataEvents(), this._registerSelectionEvents(), this._registerDropdownEvents(), this._registerResultsEvents(), this._registerEvents(), this.dataAdapter.current(function(e) {
							c.trigger("selection:update", {
								data: e
							})
						}), e.addClass("select2-hidden-accessible"), e.attr("aria-hidden", "true"), this._syncAttributes(), e.data("select2", this)
					};
				return n.Extend(i, n.Observable), i.prototype._generateId = function(e) {
					var t = "";
					return t = null != e.attr("id") ? e.attr("id") : null != e.attr("name") ? e.attr("name") + "-" + n.generateChars(2) : n.generateChars(4), t = t.replace(/(:|\.|\[|\]|,)/g, ""), t = "select2-" + t
				}, i.prototype._placeContainer = function(e) {
					e.insertAfter(this.$element);
					var t = this._resolveWidth(this.$element, this.options.get("width"));
					null != t && e.css("width", t)
				}, i.prototype._resolveWidth = function(e, t) {
					var n = /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;
					if ("resolve" == t) {
						var r = this._resolveWidth(e, "style");
						return null != r ? r : this._resolveWidth(e, "element")
					}
					if ("element" == t) {
						var i = e.outerWidth(!1);
						return 0 >= i ? "auto" : i + "px"
					}
					if ("style" == t) {
						var a = e.attr("style");
						if ("string" != typeof a) return null;
						for (var o = a.split(";"), s = 0, l = o.length; l > s; s += 1) {
							var u = o[s].replace(/\s/g, ""),
								c = u.match(n);
							if (null !== c && c.length >= 1) return c[1]
						}
						return null
					}
					return t
				}, i.prototype._bindAdapters = function() {
					this.dataAdapter.bind(this, this.$container), this.selection.bind(this, this.$container), this.dropdown.bind(this, this.$container), this.results.bind(this, this.$container)
				}, i.prototype._registerDomEvents = function() {
					var t = this;
					this.$element.on("change.select2", function() {
						t.dataAdapter.current(function(e) {
							t.trigger("selection:update", {
								data: e
							})
						})
					}), this.$element.on("focus.select2", function(e) {
						t.trigger("focus", e)
					}), this._syncA = n.bind(this._syncAttributes, this), this._syncS = n.bind(this._syncSubtree, this), this.$element[0].attachEvent && this.$element[0].attachEvent("onpropertychange", this._syncA);
					var r = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
					null != r ? (this._observer = new r(function(n) {
						e.each(n, t._syncA), e.each(n, t._syncS)
					}), this._observer.observe(this.$element[0], {
						attributes: !0,
						childList: !0,
						subtree: !1
					})) : this.$element[0].addEventListener && (this.$element[0].addEventListener("DOMAttrModified", t._syncA, !1), this.$element[0].addEventListener("DOMNodeInserted", t._syncS, !1), this.$element[0].addEventListener("DOMNodeRemoved", t._syncS, !1))
				}, i.prototype._registerDataEvents = function() {
					var e = this;
					this.dataAdapter.on("*", function(t, n) {
						e.trigger(t, n)
					})
				}, i.prototype._registerSelectionEvents = function() {
					var t = this,
						n = ["toggle", "focus"];
					this.selection.on("toggle", function() {
						t.toggleDropdown()
					}), this.selection.on("focus", function(e) {
						t.focus(e)
					}), this.selection.on("*", function(r, i) {
						-1 === e.inArray(r, n) && t.trigger(r, i)
					})
				}, i.prototype._registerDropdownEvents = function() {
					var e = this;
					this.dropdown.on("*", function(t, n) {
						e.trigger(t, n)
					})
				}, i.prototype._registerResultsEvents = function() {
					var e = this;
					this.results.on("*", function(t, n) {
						e.trigger(t, n)
					})
				}, i.prototype._registerEvents = function() {
					var e = this;
					this.on("open", function() {
						e.$container.addClass("select2-container--open")
					}), this.on("close", function() {
						e.$container.removeClass("select2-container--open")
					}), this.on("enable", function() {
						e.$container.removeClass("select2-container--disabled")
					}), this.on("disable", function() {
						e.$container.addClass("select2-container--disabled")
					}), this.on("blur", function() {
						e.$container.removeClass("select2-container--focus")
					}), this.on("query", function(t) {
						e.isOpen() || e.trigger("open", {}), this.dataAdapter.query(t, function(n) {
							e.trigger("results:all", {
								data: n,
								query: t
							})
						})
					}), this.on("query:append", function(t) {
						this.dataAdapter.query(t, function(n) {
							e.trigger("results:append", {
								data: n,
								query: t
							})
						})
					}), this.on("keypress", function(t) {
						var n = t.which;
						e.isOpen() ? n === r.ESC || n === r.TAB || n === r.UP && t.altKey ? (e.close(), t.preventDefault()) : n === r.ENTER ? (e.trigger("results:select", {}), t.preventDefault()) : n === r.SPACE && t.ctrlKey ? (e.trigger("results:toggle", {}), t.preventDefault()) : n === r.UP ? (e.trigger("results:previous", {}), t.preventDefault()) : n === r.DOWN && (e.trigger("results:next", {}), t.preventDefault()) : (n === r.ENTER || n === r.SPACE || n === r.DOWN && t.altKey) && (e.open(), t.preventDefault())
					})
				}, i.prototype._syncAttributes = function() {
					this.options.set("disabled", this.$element.prop("disabled")), this.options.get("disabled") ? (this.isOpen() && this.close(), this.trigger("disable", {})) : this.trigger("enable", {})
				}, i.prototype._syncSubtree = function(e, t) {
					var n = !1,
						r = this;
					if (!e || !e.target || "OPTION" === e.target.nodeName || "OPTGROUP" === e.target.nodeName) {
						if (t) if (t.addedNodes && t.addedNodes.length > 0) for (var i = 0; i < t.addedNodes.length; i++) {
							var a = t.addedNodes[i];
							a.selected && (n = !0)
						} else t.removedNodes && t.removedNodes.length > 0 && (n = !0);
						else n = !0;
						n && this.dataAdapter.current(function(e) {
							r.trigger("selection:update", {
								data: e
							})
						})
					}
				}, i.prototype.trigger = function(e, t) {
					var n = i.__super__.trigger,
						r = {
							open: "opening",
							close: "closing",
							select: "selecting",
							unselect: "unselecting"
						};
					if (void 0 === t && (t = {}), e in r) {
						var a = r[e],
							o = {
								prevented: !1,
								name: e,
								args: t
							};
						if (n.call(this, a, o), o.prevented) return void(t.prevented = !0)
					}
					n.call(this, e, t)
				}, i.prototype.toggleDropdown = function() {
					this.options.get("disabled") || (this.isOpen() ? this.close() : this.open())
				}, i.prototype.open = function() {
					this.isOpen() || this.trigger("query", {})
				}, i.prototype.close = function() {
					this.isOpen() && this.trigger("close", {})
				}, i.prototype.isOpen = function() {
					return this.$container.hasClass("select2-container--open")
				}, i.prototype.hasFocus = function() {
					return this.$container.hasClass("select2-container--focus")
				}, i.prototype.focus = function(e) {
					this.hasFocus() || (this.$container.addClass("select2-container--focus"), this.trigger("focus", {}))
				}, i.prototype.enable = function(e) {
					this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'), (null == e || 0 === e.length) && (e = [!0]);
					var t = !e[0];
					this.$element.prop("disabled", t)
				}, i.prototype.data = function() {
					this.options.get("debug") && arguments.length > 0 && window.console && console.warn && console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');
					var e = [];
					return this.dataAdapter.current(function(t) {
						e = t
					}), e
				}, i.prototype.val = function(t) {
					if (this.options.get("debug") && window.console && console.warn && console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'), null == t || 0 === t.length) return this.$element.val();
					var n = t[0];
					e.isArray(n) && (n = e.map(n, function(e) {
						return e.toString()
					})), this.$element.val(n).trigger("change")
				}, i.prototype.destroy = function() {
					this.$container.remove(), this.$element[0].detachEvent && this.$element[0].detachEvent("onpropertychange", this._syncA), null != this._observer ? (this._observer.disconnect(), this._observer = null) : this.$element[0].removeEventListener && (this.$element[0].removeEventListener("DOMAttrModified", this._syncA, !1), this.$element[0].removeEventListener("DOMNodeInserted", this._syncS, !1), this.$element[0].removeEventListener("DOMNodeRemoved", this._syncS, !1)), this._syncA = null, this._syncS = null, this.$element.off(".select2"), this.$element.attr("tabindex", this.$element.data("old-tabindex")), this.$element.removeClass("select2-hidden-accessible"), this.$element.attr("aria-hidden", "false"), this.$element.removeData("select2"), this.dataAdapter.destroy(), this.selection.destroy(), this.dropdown.destroy(), this.results.destroy(), this.dataAdapter = null, this.selection = null, this.dropdown = null, this.results = null
				}, i.prototype.render = function() {
					var t = e('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');
					return t.attr("dir", this.options.get("dir")), this.$container = t, this.$container.addClass("select2-container--" + this.options.get("theme")), t.data("element", this.$element), t
				}, i
			}), t.define("jquery-mousewheel", ["jquery"], function(e) {
				return e
			}), t.define("jquery.select2", ["jquery", "jquery-mousewheel", "./select2/core", "./select2/defaults"], function(e, t, n, r) {
				if (null == e.fn.select2) {
					var i = ["open", "close", "destroy"];
					e.fn.select2 = function(t) {
						if (t = t || {}, "object" == typeof t) return this.each(function() {
							var r = e.extend(!0, {}, t);
							new n(e(this), r)
						}), this;
						if ("string" == typeof t) {
							var r, a = Array.prototype.slice.call(arguments, 1);
							return this.each(function() {
								var n = e(this).data("select2");
								null == n && window.console && console.error && console.error("The select2('" + t + "') method was called on an element that is not using Select2."), r = n[t].apply(n, a)
							}), e.inArray(t, i) > -1 ? this : r
						}
						throw new Error("Invalid arguments for Select2: " + t)
					}
				}
				return null == e.fn.select2.defaults && (e.fn.select2.defaults = r), n
			}), {
				define: t.define,
				require: t.require
			}
		}(),
		n = t.require("jquery.select2");
	return e.fn.select2.amd = t, n
}), function(e, t) {
	"use strict";

	function n() {
		for (var e = {}, t = arguments.length - 1; t >= 0; t--) {
			var n = arguments[t];
			for (var r in n) e[r] = n[r]
		}
		return e
	}
	t.inlineAttach = function(e, r) {
		function i(e, t) {
			return (e + "\n\n[[D]]" + t).replace(/(\n{2,})\[\[D\]\]/, "\n\n").replace(/^(\n*)/, "")
		}
		var a, o = n(e, inlineAttach.defaults),
			s = r,
			l = "{filename}",
			u = this;
		this.uploadFile = function(e) {
			var t = new FormData,
				n = new XMLHttpRequest,
				r = "png";
			if (e.name) {
				var i = e.name.match(/\.(.+)$/);
				i && (r = i[1])
			}
			if (o.addFileBeforeExtraParameters && t.append(o.uploadFieldName, e, "image-" + Date.now() + "." + r), "object" == typeof o.extraParams) for (var a in o.extraParams) o.extraParams.hasOwnProperty(a) && t.append(a, o.extraParams[a]);
			if (o.addFileBeforeExtraParameters || t.append(o.uploadFieldName, e, "image-" + Date.now() + "." + r), n.open(o.uploadMethod, o.uploadUrl), "object" == typeof o.extraHeaders) for (var s in o.extraHeaders) o.extraHeaders.hasOwnProperty(s) && n.setRequestHeader(s, o.extraHeaders[s]);
			n.onload = function() {
				if (200 === n.status || 201 === n.status) {
					var e = u.parseResponse(n);
					u.onUploadedFile(e)
				} else u.onErrorUploading()
			}, n.send(t)
		}, this.parseResponse = function(e) {
			return o.customResponseParser.call(this, e) || JSON.parse(e.responseText)
		}, this.isAllowedFile = function(e) {
			return o.allowedTypes.indexOf(e.type) >= 0
		}, this.onUploadedFile = function(e) {
			var t, n = o.onUploadedFile.call(this, e);
			if (o.dataProcessor && (e = o.dataProcessor.call(this, e)), t = e[o.downloadFieldName], n !== !1 && t) {
				var r = s.getValue().replace(a, o.urlText.replace(l, t));
				s.setValue(r)
			}
		}, this.customUploadHandler = function(e) {
			return o.customUploadHandler.call(this, e)
		}, this.onErrorUploading = function() {
			var e = s.getValue().replace(a, "");
			s.setValue(e), o.customErrorHandler.call(this) && t.alert(o.errorText)
		}, this.onReceivedFile = function(e) {
			var t = o.onReceivedFile.call(this, e);
			t !== !1 && (a = o.progressText, s.setValue(i(s.getValue(), a)))
		}, this.onPaste = function(e) {
			var t, n = !1,
				r = e.clipboardData;
			if ("object" == typeof r) {
				t = r.items || r.files || [];
				for (var i = 0; i < t.length; i++) {
					var a = t[i];
					u.isAllowedFile(a) && (n = !0, this.onReceivedFile(a.getAsFile()), this.customUploadHandler(a.getAsFile()) && this.uploadFile(a.getAsFile()))
				}
			}
			return n
		}, this.onDrop = function(e) {
			for (var t = !1, n = 0; n < e.dataTransfer.files.length; n++) {
				var r = e.dataTransfer.files[n];
				u.isAllowedFile(r) && (t = !0, this.onReceivedFile(r), this.customUploadHandler(r) && this.uploadFile(r))
			}
			return t
		}
	}, t.inlineAttach.Editor = function(e) {
		var t = e;
		return {
			getValue: function() {
				return t.value
			},
			setValue: function(e) {
				t.value = e
			}
		}
	}, t.inlineAttach.defaults = {
		uploadUrl: "upload_attachment.php",
		uploadMethod: "POST",
		uploadFieldName: "file",
		addFileBeforeExtraParameters: !0,
		downloadFieldName: "filename",
		allowedTypes: ["image/jpeg", "image/png", "image/jpg", "image/gif"],
		progressText: "![Uploading file...]()",
		urlText: "![file]({filename})",
		errorText: "Error uploading file",
		extraParams: {},
		extraHeaders: {},
		onReceivedFile: function() {},
		customUploadHandler: function() {
			return !0
		},
		customErrorHandler: function() {
			return !0
		},
		customResponseParser: function(e) {
			return null
		},
		onUploadedFile: function() {}
	}, t.inlineAttach.attachToInput = function(e, t) {
		t = t || {};
		var n = new inlineAttach.Editor(e),
			r = new inlineAttach(t, n);
		e.addEventListener("paste", function(e) {
			r.onPaste(e)
		}, !1), e.addEventListener("drop", function(e) {
			e.stopPropagation(), e.preventDefault(), r.onDrop(e)
		}, !1), e.addEventListener("dragenter", function(e) {
			e.stopPropagation(), e.preventDefault()
		}, !1), e.addEventListener("dragover", function(e) {
			e.stopPropagation(), e.preventDefault()
		}, !1)
	}
}(document, window), function(e, t, n) {
	"use strict";

	function r(e) {
		var t = n(e);
		return {
			getValue: function() {
				return t.val()
			},
			setValue: function(e) {
				t.val(e)
			}
		}
	}
	r.prototype = new inlineAttach.Editor, n.fn.inlineattach = function(e) {
		var t = n(this);
		return t.each(function() {
			var t = n(this),
				i = new r(t),
				a = new inlineAttach(e, i);
			t.bind({
				paste: function(e) {
					a.onPaste(e.originalEvent)
				},
				drop: function(e) {
					e.stopPropagation(), e.preventDefault(), a.onDrop(e.originalEvent)
				},
				"dragenter dragover": function(e) {
					e.stopPropagation(), e.preventDefault()
				}
			})
		}), this
	}
}(document, window, jQuery), function() {
	window.emojies = ["+1", "-1", "100", "1234", "8ball", "a", "ab", "abc", "abcd", "accept", "aerial_tramway", "airplane", "alarm_clock", "alien", "ambulance", "anchor", "angel", "anger", "angry", "anguished", "ant", "apple", "aquarius", "aries", "arrow_backward", "arrow_double_down", "arrow_double_up", "arrow_down", "arrow_down_small", "arrow_forward", "arrow_heading_down", "arrow_heading_up", "arrow_left", "arrow_lower_left", "arrow_lower_right", "arrow_right", "arrow_right_hook", "arrow_up", "arrow_up_down", "arrow_up_small", "arrow_upper_left", "arrow_upper_right", "arrows_clockwise", "arrows_counterclockwise", "art", "articulated_lorry", "astonished", "athletic_shoe", "atm", "b", "baby", "baby_bottle", "baby_chick", "baby_symbol", "back", "baggage_claim", "balloon", "ballot_box_with_check", "bamboo", "banana", "bangbang", "bank", "bar_chart", "barber", "baseball", "basketball", "bath", "bathtub", "battery", "bear", "bee", "beer", "beers", "beetle", "beginner", "bell", "bento", "bicyclist", "bike", "bikini", "bird", "birthday", "black_circle", "black_joker", "black_large_square", "black_medium_small_square", "black_medium_square", "black_nib", "black_small_square", "black_square_button", "blossom", "blowfish", "blue_book", "blue_car", "blue_heart", "blush", "boar", "boat", "bomb", "book", "bookmark", "bookmark_tabs", "books", "boom", "boot", "bouquet", "bow", "bowling", "bowtie", "boy", "bread", "bride_with_veil", "bridge_at_night", "briefcase", "broken_heart", "bug", "bulb", "bullettrain_front", "bullettrain_side", "bus", "busstop", "bust_in_silhouette", "busts_in_silhouette", "cactus", "cake", "calendar", "calling", "camel", "camera", "cancer", "candy", "capital_abcd", "capricorn", "car", "card_index", "carousel_horse", "cat", "cat2", "cd", "chart", "chart_with_downwards_trend", "chart_with_upwards_trend", "checkered_flag", "cherries", "cherry_blossom", "chestnut", "chicken", "children_crossing", "chocolate_bar", "christmas_tree", "church", "cinema", "circus_tent", "city_sunrise", "city_sunset", "cl", "clap", "clapper", "clipboard", "clock1", "clock10", "clock1030", "clock11", "clock1130", "clock12", "clock1230", "clock130", "clock2", "clock230", "clock3", "clock330", "clock4", "clock430", "clock5", "clock530", "clock6", "clock630", "clock7", "clock730", "clock8", "clock830", "clock9", "clock930", "closed_book", "closed_lock_with_key", "closed_umbrella", "cloud", "clubs", "cn", "cocktail", "coffee", "cold_sweat", "collision", "computer", "confetti_ball", "confounded", "confused", "congratulations", "construction", "construction_worker", "convenience_store", "cookie", "cool", "cop", "copyright", "corn", "couple", "couple_with_heart", "couplekiss", "cow", "cow2", "credit_card", "crescent_moon", "crocodile", "crossed_flags", "crown", "cry", "crying_cat_face", "crystal_ball", "cupid", "curly_loop", "currency_exchange", "curry", "custard", "customs", "cyclone", "dancer", "dancers", "dango", "dart", "dash", "date", "de", "deciduous_tree", "department_store", "diamond_shape_with_a_dot_inside", "diamonds", "disappointed", "disappointed_relieved", "dizzy", "dizzy_face", "do_not_litter", "dog", "dog2", "dollar", "dolls", "dolphin", "door", "doughnut", "dragon", "dragon_face", "dress", "dromedary_camel", "droplet", "dvd", "e-mail", "ear", "ear_of_rice", "earth_africa", "earth_americas", "earth_asia", "egg", "eggplant", "eight", "eight_pointed_black_star", "eight_spoked_asterisk", "electric_plug", "elephant", "email", "end", "envelope", "envelope_with_arrow", "es", "euro", "european_castle", "european_post_office", "evergreen_tree", "exclamation", "expressionless", "eyeglasses", "eyes", "facepunch", "factory", "fallen_leaf", "family", "fast_forward", "fax", "fearful", "feelsgood", "feet", "ferris_wheel", "file_folder", "finnadie", "fire", "fire_engine", "fireworks", "first_quarter_moon", "first_quarter_moon_with_face", "fish", "fish_cake", "fishing_pole_and_fish", "fist", "five", "flags", "flashlight", "floppy_disk", "flower_playing_cards", "flushed", "foggy", "football", "footprints", "fork_and_knife", "fountain", "four", "four_leaf_clover", "fr", "free", "fried_shrimp", "fries", "frog", "frowning", "fu", "fuelpump", "full_moon", "full_moon_with_face", "game_die", "gb", "gem", "gemini", "ghost", "gift", "gift_heart", "girl", "globe_with_meridians", "goat", "goberserk", "godmode", "golf", "grapes", "green_apple", "green_book", "green_heart", "grey_exclamation", "grey_question", "grimacing", "grin", "grinning", "guardsman", "guitar", "gun", "haircut", "hamburger", "hammer", "hamster", "hand", "handbag", "hankey", "hash", "hatched_chick", "hatching_chick", "headphones", "hear_no_evil", "heart", "heart_decoration", "heart_eyes", "heart_eyes_cat", "heartbeat", "heartpulse", "hearts", "heavy_check_mark", "heavy_division_sign", "heavy_dollar_sign", "heavy_exclamation_mark", "heavy_minus_sign", "heavy_multiplication_x", "heavy_plus_sign", "helicopter", "herb", "hibiscus", "high_brightness", "high_heel", "hocho", "honey_pot", "honeybee", "horse", "horse_racing", "hospital", "hotel", "hotsprings", "hourglass", "hourglass_flowing_sand", "house", "house_with_garden", "hurtrealbad", "hushed", "ice_cream", "icecream", "id", "ideograph_advantage", "imp", "inbox_tray", "incoming_envelope", "information_desk_person", "information_source", "innocent", "interrobang", "iphone", "it", "izakaya_lantern", "jack_o_lantern", "japan", "japanese_castle", "japanese_goblin", "japanese_ogre", "jeans", "joy", "joy_cat", "jp", "key", "keycap_ten", "kimono", "kiss", "kissing", "kissing_cat", "kissing_closed_eyes", "kissing_heart", "kissing_smiling_eyes", "koala", "koko", "kr", "lantern", "large_blue_circle", "large_blue_diamond", "large_orange_diamond", "last_quarter_moon", "last_quarter_moon_with_face", "laughing", "leaves", "ledger", "left_luggage", "left_right_arrow", "leftwards_arrow_with_hook", "lemon", "leo", "leopard", "libra", "light_rail", "link", "lips", "lipstick", "lock", "lock_with_ink_pen", "lollipop", "loop", "loudspeaker", "love_hotel", "love_letter", "low_brightness", "m", "mag", "mag_right", "mahjong", "mailbox", "mailbox_closed", "mailbox_with_mail", "mailbox_with_no_mail", "man", "man_with_gua_pi_mao", "man_with_turban", "mans_shoe", "maple_leaf", "mask", "massage", "meat_on_bone", "mega", "melon", "memo", "mens", "metal", "metro", "microphone", "microscope", "milky_way", "minibus", "minidisc", "mobile_phone_off", "money_with_wings", "moneybag", "monkey", "monkey_face", "monorail", "moon", "mortar_board", "mount_fuji", "mountain_bicyclist", "mountain_cableway", "mountain_railway", "mouse", "mouse2", "movie_camera", "moyai", "muscle", "mushroom", "musical_keyboard", "musical_note", "musical_score", "mute", "nail_care", "name_badge", "neckbeard", "necktie", "negative_squared_cross_mark", "neutral_face", "new", "new_moon", "new_moon_with_face", "newspaper", "ng", "nine", "no_bell", "no_bicycles", "no_entry", "no_entry_sign", "no_good", "no_mobile_phones", "no_mouth", "no_pedestrians", "no_smoking", "non-potable_water", "nose", "notebook", "notebook_with_decorative_cover", "notes", "nut_and_bolt", "o", "o2", "ocean", "octocat", "octopus", "oden", "office", "ok", "ok_hand", "ok_woman", "older_man", "older_woman", "on", "oncoming_automobile", "oncoming_bus", "oncoming_police_car", "oncoming_taxi", "one", "open_book", "open_file_folder", "open_hands", "open_mouth", "ophiuchus", "orange_book", "outbox_tray", "ox", "package", "page_facing_up", "page_with_curl", "pager", "palm_tree", "panda_face", "paperclip", "parking", "part_alternation_mark", "partly_sunny", "passport_control", "paw_prints", "peach", "pear", "pencil", "pencil2", "penguin", "pensive", "performing_arts", "persevere", "person_frowning", "person_with_blond_hair", "person_with_pouting_face", "phone", "pig", "pig2", "pig_nose", "pill", "pineapple", "pisces", "pizza", "point_down", "point_left", "point_right", "point_up", "point_up_2", "police_car", "poodle", "poop", "post_office", "postal_horn", "postbox", "potable_water", "pouch", "poultry_leg", "pound", "pouting_cat", "pray", "princess", "punch", "purple_heart", "purse", "pushpin", "put_litter_in_its_place", "question", "rabbit", "rabbit2", "racehorse", "radio", "radio_button", "rage", "rage1", "rage2", "rage3", "rage4", "railway_car", "rainbow", "raised_hand", "raised_hands", "raising_hand", "ram", "ramen", "rat", "recycle", "red_car", "red_circle", "registered", "relaxed", "relieved", "repeat", "repeat_one", "restroom", "revolving_hearts", "rewind", "ribbon", "rice", "rice_ball", "rice_cracker", "rice_scene", "ring", "rocket", "roller_coaster", "rooster", "rose", "rotating_light", "round_pushpin", "rowboat", "ru", "rugby_football", "runner", "running", "running_shirt_with_sash", "sa", "sagittarius", "sailboat", "sake", "sandal", "santa", "satellite", "satisfied", "saxophone", "school", "school_satchel", "scissors", "scorpius", "scream", "scream_cat", "scroll", "seat", "secret", "see_no_evil", "seedling", "seven", "shaved_ice", "sheep", "shell", "ship", "shipit", "shirt", "shit", "shoe", "shower", "signal_strength", "six", "six_pointed_star", "ski", "skull", "sleeping", "sleepy", "slot_machine", "small_blue_diamond", "small_orange_diamond", "small_red_triangle", "small_red_triangle_down", "smile", "smile_cat", "smiley", "smiley_cat", "smiling_imp", "smirk", "smirk_cat", "smoking", "snail", "snake", "snowboarder", "snowflake", "snowman", "sob", "soccer", "soon", "sos", "sound", "space_invader", "spades", "spaghetti", "sparkle", "sparkler", "sparkles", "sparkling_heart", "speak_no_evil", "speaker", "speech_balloon", "speedboat", "squirrel", "star", "star2", "stars", "station", "statue_of_liberty", "steam_locomotive", "stew", "straight_ruler", "strawberry", "stuck_out_tongue", "stuck_out_tongue_closed_eyes", "stuck_out_tongue_winking_eye", "sun_with_face", "sunflower", "sunglasses", "sunny", "sunrise", "sunrise_over_mountains", "surfer", "sushi", "suspect", "suspension_railway", "sweat", "sweat_drops", "sweat_smile", "sweet_potato", "swimmer", "symbols", "syringe", "tada", "tanabata_tree", "tangerine", "taurus", "taxi", "tea", "telephone", "telephone_receiver", "telescope", "tennis", "tent", "thought_balloon", "three", "thumbsdown", "thumbsup", "ticket", "tiger", "tiger2", "tired_face", "tm", "toilet", "tokyo_tower", "tomato", "tongue", "top", "tophat", "tractor", "traffic_light", "train", "train2", "tram", "triangular_flag_on_post", "triangular_ruler", "trident", "triumph", "trolleybus", "trollface", "trophy", "tropical_drink", "tropical_fish", "truck", "trumpet", "tshirt", "tulip", "turtle", "tv", "twisted_rightwards_arrows", "two", "two_hearts", "two_men_holding_hands", "two_women_holding_hands", "u5272", "u5408", "u55b6", "u6307", "u6708", "u6709", "u6e80", "u7121", "u7533", "u7981", "u7a7a", "uk", "umbrella", "unamused", "underage", "unlock", "up", "us", "v", "vertical_traffic_light", "vhs", "vibration_mode", "video_camera", "video_game", "violin", "virgo", "volcano", "vs", "walking", "waning_crescent_moon", "waning_gibbous_moon", "warning", "watch", "water_buffalo", "watermelon", "wave", "wavy_dash", "waxing_crescent_moon", "waxing_gibbous_moon", "wc", "weary", "wedding", "whale", "whale2", "wheelchair", "white_check_mark", "white_circle", "white_flower", "white_large_square", "white_medium_small_square", "white_medium_square", "white_small_square", "white_square_button", "wind_chime", "wine_glass", "wink", "wolf", "woman", "womans_clothes", "womans_hat", "womens", "worried", "wrench", "x", "yellow_heart", "yen", "yum", "zap", "zero", "zzz"];
}.call(this), function() {
	window.ForumView = Backbone.View.extend({
		el: "body",
		currentPageImageURLs: [],
		clearHightTimer: null,
		events: {
			"click a.likeable": "likeable",
			"click a.followable": "followable",
			"click a.favoriteable": "favoriteable",
			"click a.captcha-image-box": "reLoadCaptchaImage",
			"click a.btn-reply2reply": "reply2reply"
		},
		initialize: function(e) {
			return this.parentView = e.parentView, this.initPjax(), this.initComponents()
		},
		initComponents: function() {
			var e;
			return e = this, Hifone.initAjax(), Hifone.initTextareaAutoResize(), Hifone.initDeleteForm(), e.initScrollToTop(), e.forceImageDataType(), e.initLightBox(), e.initEmoji(), e.initExternalLink(), e.initToolTips(), e.initHighLight(), e.initTimeAgo(), e.initSelect2(), e.initInlineAttach(), e.initEditorUploader(), e.initAutocompleteAtUser(), e.initEditorPreview(), e.initLocalStorage(), e.uploadAvatar()
		},
		initPjax: function() {
			var e;
			e = this, $(document).pjax('a:not(a[target="_blank"],a[data-pjax="no"])', ".forum"), $(document).on("pjax:start", function() {
				NProgress.start()
			}), $(document).on("pjax:end", function() {
				NProgress.done(), e.initComponents(), console.log("in pjax")
			}), $(document).on("pjax:complete", function() {
				NProgress.done()
			})
		},
		initScrollToTop: function() {
			return $.scrollUp.init()
		},
		initSelect2: function() {
			$(".selectpicker").select2({
				theme: "classic"
			}), $(".js-tag-tokenizer").select2({
				tags: !0,
				tokenSeparators: [",", " "]
			})
		},
		initExternalLink: function() {
			$('a[href^="http://"], a[href^="https://"]').each(function() {
				var e;
				e = new RegExp("/" + window.location.host + "/"), e.test(this.href) || $(this).click(function(e) {
					e.preventDefault(), e.stopPropagation(), window.open(this.href, "_blank")
				})
			})
		},
		forceImageDataType: function() {
			$(".content-body img:not(.emoji)").each(function() {
				$(this).attr("data-type", "image").attr("data-remote", $(this).attr("src"))
			})
		},
		initLightBox: function() {
			$(".content-body").delegate("img:not(.emoji)", "click", function(e) {
				return e.preventDefault(), $(this).ekkoLightbox({
					onShown: function() {
						return console.log("Checking our the events huh?")
					}
				})
			})
		},
		initEmoji: function() {
			emojify.setConfig({
				img_dir: Hifone.Config.emoj_cdn + "/assets/images/emoji",
				ignored_tags: {
					SCRIPT: 1,
					TEXTAREA: 1,
					A: 1,
					PRE: 1,
					CODE: 1
				}
			}), emojify.run(), $("#body_field").textcomplete([{
				match: /\B:([\-+\w]*)$/,
				search: function(e, t) {
					t($.map(emojies, function(t) {
						return 0 === t.indexOf(e) ? t : null
					}))
				},
				template: function(e) {
					return '<img src="' + Hifone.Config.emoj_cdn + "/assets/images/emoji/" + e + '.png"></img>' + e
				},
				replace: function(e) {
					return ":" + e + ": "
				},
				index: 1,
				maxCount: 5
			}])
		},
		initHighLight: function() {
			Prism.highlightAll()
		},
		initToolTips: function() {
			$('[data-toggle="tooltip"]').tooltip()
		},
		initInlineAttach: function() {
			$("#body_field").inlineattach({
				uploadUrl: Hifone.Config.uploader_url,
				extraParams: {
					_token: Hifone.Config.token
				},
				onUploadedFile: function(e) {}
			})
		},
		initTimeAgo: function() {
			moment.locale(Hifone.Config.locale), $(".timeago").each(function() {
				var e;
				e = $(this).text(), moment(e, "YYYY-MM-DD HH:mm:ss", !0).isValid() && $(this).text(moment(e).fromNow())
			})
		},
		initEditorUploader: function() {
			var e;
			e = this, $(".btn-upload").click(function() {
				$(".input-file").click()
			}), $(".input-file").change(function() {
				var t, n, r, i, a, o;
				return t = $(".create_form"), r = new FormData(t[0]), i = "![Uploading file...]()", o = "![file]({filename})", n = "{filename}", a = $(".post-editor"), $.ajax({
					url: Hifone.Config.uploader_url,
					type: "POST",
					data: r,
					cache: !1,
					contentType: !1,
					processData: !1,
					beforeSend: function() {
						$(".btn-upload").attr("disabled", "disabled"), e._caretPos(a, i, 0)
					},
					success: function(e) {
						var t;
						t = a.val().replace(i, o.replace(n, e.filename)), a.val(t)
					},
					error: function(e) {
						var t;
						t = a.val().replace(i, ""), a.val(t)
					},
					complete: function() {
						$(".btn-upload").removeAttr("disabled")
					}
				}, "json"), !1
			})
		},
		initEditorPreview: function() {
			var e;
			e = this, $(".insert-codes a").on("click", function() {
				return e.appendCodesFromHint($(this))
			}), e.hookPreview($(".editor-toolbar"), $(".post-editor"))
		},
		initAutocompleteAtUser: function() {
			var e, t, n, r;
			for (t = [], r = void 0, e = $(".media-heading").find("a.author"), n = 0; n < e.length;) r = e.eq(n).text().trim(), $.inArray(r, t) === -1 && t.push(r), n++;
			$("textarea").textcomplete([{
				mentions: t,
				match: /\B@(\w*)$/,
				search: function(e, t) {
					t($.map(this.mentions, function(t) {
						return 0 === t.indexOf(e) ? t : null
					}))
				},
				index: 1,
				replace: function(e) {
					return "@" + e + " "
				}
			}], {
				appendTo: "body"
			})
		},
		preview: function(e) {
			var t, n;
			$("#preview-box").text("Loading..."), n = $("#body_field"), t = n.val(), t ? marked(t, function(e, t) {
				$("#preview-box").html(t), emojify.run(document.getElementById("preview-box"))
			}) : $("#preview-box").text("Content is empty.")
		},
		hookPreview: function(e, t) {
			var n, r;
			return r = this, n = $(document.createElement("div")).attr("id", "preview-box"), n.addClass("box preview markdown-reply"), $(t).after(n), n.hide(), $(".edit a", e).click(function() {
				return $(".preview", e).removeClass("active"), $(this).parent().addClass("active"), $(n).hide(), $(t).show(), $(".status-post-submit").show(), $("#editor-toolbar-insert-code").show(), $(".btn-upload").show(), !1
			}), $(".preview a", e).click(function() {
				return $(".edit", e).removeClass("active"), $(this).parent().addClass("active"), $(n).show(), $(t).hide(), $(".status-post-submit").hide(), $("#editor-toolbar-insert-code").hide(), $(".btn-upload").hide(), r.preview($(t).val()), !1
			})
		},
		appendCodesFromHint: function(e) {
			var t, n, r, i, a, o, s, l, u;
			return o = this, t = void 0, n = void 0, r = void 0, a = void 0, s = void 0, l = void 0, u = void 0, r = e.data("lang"), u = $(".post-editor"), i = "\n```" + r + "\n\n```", o._caretPos(u, i, 5), u.focus(), u.trigger("click"), !1
		},
		_caretPos: function(e, t, n) {
			var r, i, a, o;
			i = e.caret(), o = t + "\n", a = e.val(), r = a.slice(0, i), e.val(r + o + a.slice(i + 1, a.count)), e.caret(i + o.length - n)
		},
		initLocalStorage: function() {
			console.log("call initLocalStorage"), $("#body_field").focus(function(e) {
				localforage.getItem("thread_title", function(e, t) {
					"" !== $("#thread_create_form #thread_title").val() || e || $("#thread_create_form #thread_title").val(t)
				}), $("#thread_create_form #thread_title").keyup(function() {
					localforage.setItem("thread_title", $(this).val())
				}), localforage.getItem("thread_create_body", function(e, t) {
					"" !== $("#thread_create_form #body_field").val() || e || $("#thread_create_form #body_field").val(t)
				}), $("#thread_create_form #body_field").keyup(function() {
					localforage.setItem("thread_create_body", $(this).val())
				}), localforage.getItem("reply_create_body", function(e, t) {
					"" !== $("#reply_create_form #body_field").val() || e || $("#reply_create_form #body_field").val(t)
				}), $("#reply_create_form #body_field").keyup(function() {
					localforage.setItem("reply_create_body", $(this).val())
				})
			}), $("#thread_create_form").submit(function(e) {
				localforage.removeItem("thread_create_body"), localforage.removeItem("thread_title")
			}), $("#reply_create_form").submit(function(e) {
				localforage.removeItem("reply_create_body")
			})
		},
		reply2reply: function(e) {
			var t, n, r, i, a, o;
			return t = $(e.target), o = t.data("username"), a = $("#body_field"), r = a.val(), i = "@" + o + " ", n = "", r.length > 0 ? r !== i && (n = r + "\n" + i) : n = i, a.focus().val(a.val() + n), !1
		},
		uploadAvatar: function() {
			$(".upload-btn").on("click", function() {
				$("#avatarinput").click()
			}), $("#avatarinput").change(function() {
				$("#avatarinput-submit").click()
			})
		},
		likeable: function(e) {
			var t, n, r, i, a;
			return Hifone.isLogined() ? (t = $(e.currentTarget), i = t.data("type"), r = t.data("id"), n = t.data("action"), a = t.data("url"), $.ajax({
				url: a,
				type: "like" === n ? "POST" : "DELETE",
				data: {
					type: i,
					id: r
				},
				success: function(e) {
					console.log(e.status), t.text("like" === n ? "已赞" : "已踩")
				},
				error: function(e) {
					console.log("error")
				}
			}, "json")) : (location.href = "/auth/login", !1)
		},
		followable: function(e) {
			var t, n, r, i, a;
			return Hifone.isLogined() ? (t = $(e.currentTarget), i = t.data("type"), r = t.data("id"), n = t.data("action"), a = t.data("url"), console.log("followable"), $.ajax({
				url: a,
				type: "POST",
				data: {
					type: i,
					id: r
				},
				success: function(e) {
					t.hasClass("active") ? t.removeClass("active") : t.addClass("active"), $.notifier.notify("Operation ran successfully.", "success")
				},
				error: function(e) {
					return console.log("error"), $.notifier.notify("An error occurred.", "error")
				}
			}, "json"), !1) : (location.href = "/auth/login", !1)
		},
		favoriteable: function(e) {
			var t, n, r, i;
			return Hifone.needLogined(), t = $(e.currentTarget), r = t.data("type"), n = t.data("id"), i = t.data("url"), console.log("favoriteable"), $.ajax({
				url: i,
				type: "POST",
				data: {
					type: r,
					id: n
				},
				success: function(e) {
					$.notifier.notify("Operation ran successfully.", "success"), t.hasClass("active") ? t.removeClass("active") : t.addClass("active")
				},
				error: function(e) {
					return console.log("error"), $.notifier.notify("An error occurred.", "error")
				}
			}, "json"), !1
		},
		reLoadCaptchaImage: function(e) {
			var t, n, r;
			return t = $(e.currentTarget), r = t.find("img:first"), n = r.attr("src"), r.attr("src", n.split("?")[0] + "?" + (new Date).getTime()), !1
		}
	})
}.call(this), function() {
	var e;
	e = Backbone.View.extend({
		el: "body",
		repliesPerPage: 50,
		windowInActive: !0,
		initialize: function() {
			var e, t;
			if (this.initComponents(), "forum" === (e = $("body").data("page")) && (window._forumView = new ForumView({
				parentView: this
			})), "install" === (t = $("body").data("page"))) return window._installView = new InstallView({
				parentView: this
			})
		},
		initComponents: function() {
			return $(".alert").alert(), $(".dropdown-toggle").dropdown(), $(".bootstrap-select").remove(), $(".post-editor textarea").unbind("keydown"), $(".post-editor textarea").bind("keydown", "ctrl+return", function(e) {
				return $(e.target).val().trim().length > 0 && $(e.target).parent().parent().submit(), !1
			}), $(window).off("blur.inactive focus.inactive"), $(window).on("blur.inactive focus.inactive", this.updateWindowActiveState)
		},
		updateWindowActiveState: function(e) {
			var t;
			if (t = $(this).data("prevType"), t !== e.type) switch (e.type) {
			case "blur":
				this.windowInActive = !1;
				break;
			case "focus":
				this.windowInActive = !0
			}
			return $(this).data("prevType", e.type)
		}
	}), window.Hifone = {
		Config: {
			locale: "zh-CN",
			current_user_id: null,
			token: "",
			emoj_cdn: "",
			notification_url: "",
			uploader_url: "",
			asset_url: "",
			root_url: ""
		},
		isLogined: function() {
			return null !== Hifone.Config.current_user_id
		},
		needLogined: function() {
			if (!Hifone.isLogined()) return location.href = "/auth/login", !1
		},
		loading: function() {
			return console.log("loading...")
		},
		fixUrlDash: function(e) {
			return e.replace(/\/\//g, "/").replace(/:\//, "://")
		},
		alert: function(e, t) {
			return $(".alert").remove(), $(t).before("<div class='alert alert-warning'><a class='close' href='#' data-dismiss='alert'>X</a>" + e + "</div>")
		},
		notice: function(e, t) {
			return $(".alert").remove(), $(t).before("<div class='alert alert-success'><a class='close' data-dismiss='alert' href='#'>X</a>" + e + "</div>")
		},
		openUrl: function(e) {
			return window.open(e)
		},
		initTextareaAutoResize: function() {
			$("textarea").autosize()
		},
		initAjax: function() {
			$.ajaxPrefilter(function(e, t, n) {
				var r;
				return r = null, e.crossDomain || (r = $('meta[name="token"]').attr("content"), r && n.setRequestHeader("X-CSRF-Token", r)), n
			}), $.ajaxSetup({
				beforeSend: function(e) {
					e.setRequestHeader("Accept", "application/json")
				}
			}), $("form").submit(function() {
				var e;
				e = $(this), e.find(":submit").prop("disabled", !0)
			})
		},
		initDeleteForm: function() {
			$("[data-method]").append(function() {
				var e;
				return e = $(this).attr("data-url"), "\n<form action='" + e + "' method='POST' style='display:none'>\n   <input type='hidden' name='_method' value='" + $(this).attr("data-method") + "'>\n   <input type='hidden' name='_token' value='" + Hifone.Config.token + "'>\n</form>\n"
			}).attr("style", "cursor:pointer;").removeAttr("href").click(function() {
				var e;
				e = $(this), e.hasClass("confirm-action") ? swal({
					type: "warning",
					title: "Confirm your action",
					text: "Are you sure you want to do this?",
					confirmButtonText: "Yes",
					confirmButtonColor: "#FF6F6F",
					showCancelButton: !0
				}, function() {
					e.find("form").submit()
				}) : e.find("form").submit()
			})
		}
	}, $(function() {
		return window._hifoneView = new e
	})
}.call(this), function() {
	window.InstallView = Backbone.View.extend({
		el: "body",
		events: {
			"click .wizard-next": "wizard"
		},
		initialize: function(e) {
			return this.parentView = e.parentView, this.initComponents()
		},
		initComponents: function() {
			var e;
			return e = this, console.log("in install"), Hifone.initAjax()
		},
		wizard: function(e) {
			var t, n, r, i, a, o;
			return a = this, n = $(e.target), t = $("#install-form"), r = n.data("currentBlock"), i = n.data("nextBlock"), n.button("loading"), i > r ? (o = "/install/step" + r, $.post(o, t.serializeObject()).done(function(e) {
				a.goToStep(r, i)
			}).fail(function(e) {
				var t;
				t = _.toArray(e.responseJSON.errors), _.each(t, function(e) {
					$.notifier.notify(e)
				})
			}).always(function() {
				n.button("reset")
			}), !1) : (a.goToStep(r, i), n.button("reset"))
		},
		goToStep: function(e, t) {
			$(".block-" + e).removeClass("show").addClass("hidden"), $(".block-" + t).removeClass("hidden").addClass("show"), $(".steps .step").removeClass("active").filter(":lt(" + (t + 1) + ")").addClass("active")
		}
	})
}.call(this), function() {
	var e, t = function(e, t) {
			return function() {
				return e.apply(t, arguments)
			}
		};
	e = function() {
		function e() {
			this.initMessenger = t(this.initMessenger, this), this.initMessenger()
		}
		return e.prototype.initMessenger = function() {
			Messenger.options = {
				extraClasses: "messenger-fixed messenger-on-top",
				theme: "air"
			}
		}, e.prototype.notify = function(e, t, n) {
			var r;
			return _.isPlainObject(e) && (e = e.detail), t = "undefined" == typeof t || "error" === t ? "error" : t, r = {
				message: e,
				type: t,
				showCloseButton: !0
			}, n = _.extend(r, n), Messenger().post(n)
		}, e
	}(), jQuery.notifier = new e
}.call(this);