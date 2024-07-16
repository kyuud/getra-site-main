! function(e, t) {
    "use strict";
    "object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
        if (!e.document) throw new Error("jQuery requires a window with a document");
        return t(e)
    } : t(e)
}("undefined" != typeof window ? window : this, function(S, e) {
    "use strict";
    var t = [],
        T = S.document,
        i = Object.getPrototypeOf,
        a = t.slice,
        m = t.concat,
        l = t.push,
        r = t.indexOf,
        n = {},
        o = n.toString,
        g = n.hasOwnProperty,
        s = g.toString,
        c = s.call(Object),
        y = {},
        v = function(e) {
            return "function" == typeof e && "number" != typeof e.nodeType
        },
        x = function(e) {
            return null != e && e === e.window
        },
        u = {
            type: !0,
            src: !0,
            noModule: !0
        };

    function w(e, t, n) {
        var i, r = (t = t || T).createElement("script");
        if (r.text = e, n)
            for (i in u) n[i] && (r[i] = n[i]);
        t.head.appendChild(r).parentNode.removeChild(r)
    }

    function _(e) {
        return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? n[o.call(e)] || "object" : typeof e
    }
    var E = function(e, t) {
            return new E.fn.init(e, t)
        },
        h = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;

    function d(e) {
        var t = !!e && "length" in e && e.length,
            n = _(e);
        return !v(e) && !x(e) && ("array" === n || 0 === t || "number" == typeof t && 0 < t && t - 1 in e)
    }
    E.fn = E.prototype = {
        jquery: "3.3.1",
        constructor: E,
        length: 0,
        toArray: function() {
            return a.call(this)
        },
        get: function(e) {
            return null == e ? a.call(this) : e < 0 ? this[e + this.length] : this[e]
        },
        pushStack: function(e) {
            var t = E.merge(this.constructor(), e);
            return t.prevObject = this, t
        },
        each: function(e) {
            return E.each(this, e)
        },
        map: function(n) {
            return this.pushStack(E.map(this, function(e, t) {
                return n.call(e, t, e)
            }))
        },
        slice: function() {
            return this.pushStack(a.apply(this, arguments))
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
            return this.pushStack(0 <= n && n < t ? [this[n]] : [])
        },
        end: function() {
            return this.prevObject || this.constructor()
        },
        push: l,
        sort: t.sort,
        splice: t.splice
    }, E.extend = E.fn.extend = function() {
        var e, t, n, i, r, o, s = arguments[0] || {},
            a = 1,
            l = arguments.length,
            c = !1;
        for ("boolean" == typeof s && (c = s, s = arguments[a] || {}, a++), "object" == typeof s || v(s) || (s = {}), a === l && (s = this, a--); a < l; a++)
            if (null != (e = arguments[a]))
                for (t in e) n = s[t], s !== (i = e[t]) && (c && i && (E.isPlainObject(i) || (r = Array.isArray(i))) ? (o = r ? (r = !1, n && Array.isArray(n) ? n : []) : n && E.isPlainObject(n) ? n : {}, s[t] = E.extend(c, o, i)) : void 0 !== i && (s[t] = i));
        return s
    }, E.extend({
        expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(e) {
            throw new Error(e)
        },
        noop: function() {},
        isPlainObject: function(e) {
            var t, n;
            return !(!e || "[object Object]" !== o.call(e) || (t = i(e)) && ("function" != typeof(n = g.call(t, "constructor") && t.constructor) || s.call(n) !== c))
        },
        isEmptyObject: function(e) {
            var t;
            for (t in e) return !1;
            return !0
        },
        globalEval: function(e) {
            w(e)
        },
        each: function(e, t) {
            var n, i = 0;
            if (d(e))
                for (n = e.length; i < n && !1 !== t.call(e[i], i, e[i]); i++);
            else
                for (i in e)
                    if (!1 === t.call(e[i], i, e[i])) break; return e
        },
        trim: function(e) {
            return null == e ? "" : (e + "").replace(h, "")
        },
        makeArray: function(e, t) {
            var n = t || [];
            return null != e && (d(Object(e)) ? E.merge(n, "string" == typeof e ? [e] : e) : l.call(n, e)), n
        },
        inArray: function(e, t, n) {
            return null == t ? -1 : r.call(t, e, n)
        },
        merge: function(e, t) {
            for (var n = +t.length, i = 0, r = e.length; i < n; i++) e[r++] = t[i];
            return e.length = r, e
        },
        grep: function(e, t, n) {
            for (var i = [], r = 0, o = e.length, s = !n; r < o; r++) !t(e[r], r) !== s && i.push(e[r]);
            return i
        },
        map: function(e, t, n) {
            var i, r, o = 0,
                s = [];
            if (d(e))
                for (i = e.length; o < i; o++) null != (r = t(e[o], o, n)) && s.push(r);
            else
                for (o in e) null != (r = t(e[o], o, n)) && s.push(r);
            return m.apply([], s)
        },
        guid: 1,
        support: y
    }), "function" == typeof Symbol && (E.fn[Symbol.iterator] = t[Symbol.iterator]), E.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function(e, t) {
        n["[object " + t + "]"] = t.toLowerCase()
    });
    var f = function(n) {
        var e, f, w, o, r, p, h, m, _, l, c, b, S, s, T, g, a, u, y, E = "sizzle" + 1 * new Date,
            v = n.document,
            k = 0,
            i = 0,
            d = se(),
            x = se(),
            M = se(),
            C = function(e, t) {
                return e === t && (c = !0), 0
            },
            D = {}.hasOwnProperty,
            t = [],
            O = t.pop,
            A = t.push,
            N = t.push,
            L = t.slice,
            I = function(e, t) {
                for (var n = 0, i = e.length; n < i; n++)
                    if (e[n] === t) return n;
                return -1
            },
            H = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            P = "[\\x20\\t\\r\\n\\f]",
            j = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
            z = "\\[" + P + "*(" + j + ")(?:" + P + "*([*^$|!~]?=)" + P + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + j + "))|)" + P + "*\\]",
            Y = ":(" + j + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + z + ")*)|.*)\\)|)",
            R = new RegExp(P + "+", "g"),
            W = new RegExp("^" + P + "+|((?:^|[^\\\\])(?:\\\\.)*)" + P + "+$", "g"),
            F = new RegExp("^" + P + "*," + P + "*"),
            q = new RegExp("^" + P + "*([>+~]|" + P + ")" + P + "*"),
            U = new RegExp("=" + P + "*([^\\]'\"]*?)" + P + "*\\]", "g"),
            V = new RegExp(Y),
            B = new RegExp("^" + j + "$"),
            G = {
                ID: new RegExp("^#(" + j + ")"),
                CLASS: new RegExp("^\\.(" + j + ")"),
                TAG: new RegExp("^(" + j + "|[*])"),
                ATTR: new RegExp("^" + z),
                PSEUDO: new RegExp("^" + Y),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + P + "*(even|odd|(([+-]|)(\\d*)n|)" + P + "*(?:([+-]|)" + P + "*(\\d+)|))" + P + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + H + ")$", "i"),
                needsContext: new RegExp("^" + P + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + P + "*((?:-\\d)?\\d*)" + P + "*\\)|)(?=[^-]|$)", "i")
            },
            X = /^(?:input|select|textarea|button)$/i,
            $ = /^h\d$/i,
            K = /^[^{]+\{\s*\[native \w/,
            Q = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            Z = /[+~]/,
            J = new RegExp("\\\\([\\da-f]{1,6}" + P + "?|(" + P + ")|.)", "ig"),
            ee = function(e, t, n) {
                var i = "0x" + t - 65536;
                return i != i || n ? t : i < 0 ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
            },
            te = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
            ne = function(e, t) {
                return t ? "\0" === e ? "�" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e
            },
            ie = function() {
                b()
            },
            re = ve(function(e) {
                return !0 === e.disabled && ("form" in e || "label" in e)
            }, {
                dir: "parentNode",
                next: "legend"
            });
        try {
            N.apply(t = L.call(v.childNodes), v.childNodes), t[v.childNodes.length].nodeType
        } catch (n) {
            N = {
                apply: t.length ? function(e, t) {
                    A.apply(e, L.call(t))
                } : function(e, t) {
                    for (var n = e.length, i = 0; e[n++] = t[i++];);
                    e.length = n - 1
                }
            }
        }

        function oe(e, t, n, i) {
            var r, o, s, a, l, c, u, h = t && t.ownerDocument,
                d = t ? t.nodeType : 9;
            if (n = n || [], "string" != typeof e || !e || 1 !== d && 9 !== d && 11 !== d) return n;
            if (!i && ((t ? t.ownerDocument || t : v) !== S && b(t), t = t || S, T)) {
                if (11 !== d && (l = Q.exec(e)))
                    if (r = l[1]) {
                        if (9 === d) {
                            if (!(s = t.getElementById(r))) return n;
                            if (s.id === r) return n.push(s), n
                        } else if (h && (s = h.getElementById(r)) && y(t, s) && s.id === r) return n.push(s), n
                    } else {
                        if (l[2]) return N.apply(n, t.getElementsByTagName(e)), n;
                        if ((r = l[3]) && f.getElementsByClassName && t.getElementsByClassName) return N.apply(n, t.getElementsByClassName(r)), n
                    }
                if (f.qsa && !M[e + " "] && (!g || !g.test(e))) {
                    if (1 !== d) h = t, u = e;
                    else if ("object" !== t.nodeName.toLowerCase()) {
                        for ((a = t.getAttribute("id")) ? a = a.replace(te, ne) : t.setAttribute("id", a = E), o = (c = p(e)).length; o--;) c[o] = "#" + a + " " + ye(c[o]);
                        u = c.join(","), h = Z.test(e) && me(t.parentNode) || t
                    }
                    if (u) try {
                        return N.apply(n, h.querySelectorAll(u)), n
                    } catch (e) {} finally {
                        a === E && t.removeAttribute("id")
                    }
                }
            }
            return m(e.replace(W, "$1"), t, n, i)
        }

        function se() {
            var i = [];
            return function e(t, n) {
                return i.push(t + " ") > w.cacheLength && delete e[i.shift()], e[t + " "] = n
            }
        }

        function ae(e) {
            return e[E] = !0, e
        }

        function le(e) {
            var t = S.createElement("fieldset");
            try {
                return !!e(t)
            } catch (e) {
                return !1
            } finally {
                t.parentNode && t.parentNode.removeChild(t), t = null
            }
        }

        function ce(e, t) {
            for (var n = e.split("|"), i = n.length; i--;) w.attrHandle[n[i]] = t
        }

        function ue(e, t) {
            var n = t && e,
                i = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
            if (i) return i;
            if (n)
                for (; n = n.nextSibling;)
                    if (n === t) return -1;
            return e ? 1 : -1
        }

        function he(t) {
            return function(e) {
                return "input" === e.nodeName.toLowerCase() && e.type === t
            }
        }

        function de(n) {
            return function(e) {
                var t = e.nodeName.toLowerCase();
                return ("input" === t || "button" === t) && e.type === n
            }
        }

        function fe(t) {
            return function(e) {
                return "form" in e ? e.parentNode && !1 === e.disabled ? "label" in e ? "label" in e.parentNode ? e.parentNode.disabled === t : e.disabled === t : e.isDisabled === t || e.isDisabled !== !t && re(e) === t : e.disabled === t : "label" in e && e.disabled === t
            }
        }

        function pe(s) {
            return ae(function(o) {
                return o = +o, ae(function(e, t) {
                    for (var n, i = s([], e.length, o), r = i.length; r--;) e[n = i[r]] && (e[n] = !(t[n] = e[n]))
                })
            })
        }

        function me(e) {
            return e && void 0 !== e.getElementsByTagName && e
        }
        for (e in f = oe.support = {}, r = oe.isXML = function(e) {
            var t = e && (e.ownerDocument || e).documentElement;
            return !!t && "HTML" !== t.nodeName
        }, b = oe.setDocument = function(e) {
            var t, n, i = e ? e.ownerDocument || e : v;
            return i !== S && 9 === i.nodeType && i.documentElement && (s = (S = i).documentElement, T = !r(S), v !== S && (n = S.defaultView) && n.top !== n && (n.addEventListener ? n.addEventListener("unload", ie, !1) : n.attachEvent && n.attachEvent("onunload", ie)), f.attributes = le(function(e) {
                return e.className = "i", !e.getAttribute("className")
            }), f.getElementsByTagName = le(function(e) {
                return e.appendChild(S.createComment("")), !e.getElementsByTagName("*").length
            }), f.getElementsByClassName = K.test(S.getElementsByClassName), f.getById = le(function(e) {
                return s.appendChild(e).id = E, !S.getElementsByName || !S.getElementsByName(E).length
            }), f.getById ? (w.filter.ID = function(e) {
                var t = e.replace(J, ee);
                return function(e) {
                    return e.getAttribute("id") === t
                }
            }, w.find.ID = function(e, t) {
                if (void 0 !== t.getElementById && T) {
                    var n = t.getElementById(e);
                    return n ? [n] : []
                }
            }) : (w.filter.ID = function(e) {
                var n = e.replace(J, ee);
                return function(e) {
                    var t = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                    return t && t.value === n
                }
            }, w.find.ID = function(e, t) {
                if (void 0 !== t.getElementById && T) {
                    var n, i, r, o = t.getElementById(e);
                    if (o) {
                        if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
                        for (r = t.getElementsByName(e), i = 0; o = r[i++];)
                            if ((n = o.getAttributeNode("id")) && n.value === e) return [o]
                    }
                    return []
                }
            }), w.find.TAG = f.getElementsByTagName ? function(e, t) {
                return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : f.qsa ? t.querySelectorAll(e) : void 0
            } : function(e, t) {
                var n, i = [],
                    r = 0,
                    o = t.getElementsByTagName(e);
                if ("*" !== e) return o;
                for (; n = o[r++];) 1 === n.nodeType && i.push(n);
                return i
            }, w.find.CLASS = f.getElementsByClassName && function(e, t) {
                if (void 0 !== t.getElementsByClassName && T) return t.getElementsByClassName(e)
            }, a = [], g = [], (f.qsa = K.test(S.querySelectorAll)) && (le(function(e) {
                s.appendChild(e).innerHTML = "<a id='" + E + "'></a><select id='" + E + "-\r\\' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && g.push("[*^$]=" + P + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || g.push("\\[" + P + "*(?:value|" + H + ")"), e.querySelectorAll("[id~=" + E + "-]").length || g.push("~="), e.querySelectorAll(":checked").length || g.push(":checked"), e.querySelectorAll("a#" + E + "+*").length || g.push(".#.+[+~]")
            }), le(function(e) {
                e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                var t = S.createElement("input");
                t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && g.push("name" + P + "*[*^$|!~]?="), 2 !== e.querySelectorAll(":enabled").length && g.push(":enabled", ":disabled"), s.appendChild(e).disabled = !0, 2 !== e.querySelectorAll(":disabled").length && g.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), g.push(",.*:")
            })), (f.matchesSelector = K.test(u = s.matches || s.webkitMatchesSelector || s.mozMatchesSelector || s.oMatchesSelector || s.msMatchesSelector)) && le(function(e) {
                f.disconnectedMatch = u.call(e, "*"), u.call(e, "[s!='']:x"), a.push("!=", Y)
            }), g = g.length && new RegExp(g.join("|")), a = a.length && new RegExp(a.join("|")), t = K.test(s.compareDocumentPosition), y = t || K.test(s.contains) ? function(e, t) {
                var n = 9 === e.nodeType ? e.documentElement : e,
                    i = t && t.parentNode;
                return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)))
            } : function(e, t) {
                if (t)
                    for (; t = t.parentNode;)
                        if (t === e) return !0;
                return !1
            }, C = t ? function(e, t) {
                if (e === t) return c = !0, 0;
                var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
                return n || (1 & (n = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !f.sortDetached && t.compareDocumentPosition(e) === n ? e === S || e.ownerDocument === v && y(v, e) ? -1 : t === S || t.ownerDocument === v && y(v, t) ? 1 : l ? I(l, e) - I(l, t) : 0 : 4 & n ? -1 : 1)
            } : function(e, t) {
                if (e === t) return c = !0, 0;
                var n, i = 0,
                    r = e.parentNode,
                    o = t.parentNode,
                    s = [e],
                    a = [t];
                if (!r || !o) return e === S ? -1 : t === S ? 1 : r ? -1 : o ? 1 : l ? I(l, e) - I(l, t) : 0;
                if (r === o) return ue(e, t);
                for (n = e; n = n.parentNode;) s.unshift(n);
                for (n = t; n = n.parentNode;) a.unshift(n);
                for (; s[i] === a[i];) i++;
                return i ? ue(s[i], a[i]) : s[i] === v ? -1 : a[i] === v ? 1 : 0
            }), S
        }, oe.matches = function(e, t) {
            return oe(e, null, null, t)
        }, oe.matchesSelector = function(e, t) {
            if ((e.ownerDocument || e) !== S && b(e), t = t.replace(U, "='$1']"), f.matchesSelector && T && !M[t + " "] && (!a || !a.test(t)) && (!g || !g.test(t))) try {
                var n = u.call(e, t);
                if (n || f.disconnectedMatch || e.document && 11 !== e.document.nodeType) return n
            } catch (e) {}
            return 0 < oe(t, S, null, [e]).length
        }, oe.contains = function(e, t) {
            return (e.ownerDocument || e) !== S && b(e), y(e, t)
        }, oe.attr = function(e, t) {
            (e.ownerDocument || e) !== S && b(e);
            var n = w.attrHandle[t.toLowerCase()],
                i = n && D.call(w.attrHandle, t.toLowerCase()) ? n(e, t, !T) : void 0;
            return void 0 !== i ? i : f.attributes || !T ? e.getAttribute(t) : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
        }, oe.escape = function(e) {
            return (e + "").replace(te, ne)
        }, oe.error = function(e) {
            throw new Error("Syntax error, unrecognized expression: " + e)
        }, oe.uniqueSort = function(e) {
            var t, n = [],
                i = 0,
                r = 0;
            if (c = !f.detectDuplicates, l = !f.sortStable && e.slice(0), e.sort(C), c) {
                for (; t = e[r++];) t === e[r] && (i = n.push(r));
                for (; i--;) e.splice(n[i], 1)
            }
            return l = null, e
        }, o = oe.getText = function(e) {
            var t, n = "",
                i = 0,
                r = e.nodeType;
            if (r) {
                if (1 === r || 9 === r || 11 === r) {
                    if ("string" == typeof e.textContent) return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling) n += o(e)
                } else if (3 === r || 4 === r) return e.nodeValue
            } else
                for (; t = e[i++];) n += o(t);
            return n
        }, (w = oe.selectors = {
            cacheLength: 50,
            createPseudo: ae,
            match: G,
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
                    return e[1] = e[1].replace(J, ee), e[3] = (e[3] || e[4] || e[5] || "").replace(J, ee), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                },
                CHILD: function(e) {
                    return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || oe.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && oe.error(e[0]), e
                },
                PSEUDO: function(e) {
                    var t, n = !e[6] && e[2];
                    return G.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && V.test(n) && (t = p(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                }
            },
            filter: {
                TAG: function(e) {
                    var t = e.replace(J, ee).toLowerCase();
                    return "*" === e ? function() {
                        return !0
                    } : function(e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                    }
                },
                CLASS: function(e) {
                    var t = d[e + " "];
                    return t || (t = new RegExp("(^|" + P + ")" + e + "(" + P + "|$)")) && d(e, function(e) {
                        return t.test("string" == typeof e.className && e.className || void 0 !== e.getAttribute && e.getAttribute("class") || "")
                    })
                },
                ATTR: function(n, i, r) {
                    return function(e) {
                        var t = oe.attr(e, n);
                        return null == t ? "!=" === i : !i || (t += "", "=" === i ? t === r : "!=" === i ? t !== r : "^=" === i ? r && 0 === t.indexOf(r) : "*=" === i ? r && -1 < t.indexOf(r) : "$=" === i ? r && t.slice(-r.length) === r : "~=" === i ? -1 < (" " + t.replace(R, " ") + " ").indexOf(r) : "|=" === i && (t === r || t.slice(0, r.length + 1) === r + "-"))
                    }
                },
                CHILD: function(p, e, t, m, g) {
                    var y = "nth" !== p.slice(0, 3),
                        v = "last" !== p.slice(-4),
                        x = "of-type" === e;
                    return 1 === m && 0 === g ? function(e) {
                        return !!e.parentNode
                    } : function(e, t, n) {
                        var i, r, o, s, a, l, c = y !== v ? "nextSibling" : "previousSibling",
                            u = e.parentNode,
                            h = x && e.nodeName.toLowerCase(),
                            d = !n && !x,
                            f = !1;
                        if (u) {
                            if (y) {
                                for (; c;) {
                                    for (s = e; s = s[c];)
                                        if (x ? s.nodeName.toLowerCase() === h : 1 === s.nodeType) return !1;
                                    l = c = "only" === p && !l && "nextSibling"
                                }
                                return !0
                            }
                            if (l = [v ? u.firstChild : u.lastChild], v && d) {
                                for (f = (a = (i = (r = (o = (s = u)[E] || (s[E] = {}))[s.uniqueID] || (o[s.uniqueID] = {}))[p] || [])[0] === k && i[1]) && i[2], s = a && u.childNodes[a]; s = ++a && s && s[c] || (f = a = 0) || l.pop();)
                                    if (1 === s.nodeType && ++f && s === e) {
                                        r[p] = [k, a, f];
                                        break
                                    }
                            } else if (d && (f = a = (i = (r = (o = (s = e)[E] || (s[E] = {}))[s.uniqueID] || (o[s.uniqueID] = {}))[p] || [])[0] === k && i[1]), !1 === f)
                                for (;
                                    (s = ++a && s && s[c] || (f = a = 0) || l.pop()) && ((x ? s.nodeName.toLowerCase() !== h : 1 !== s.nodeType) || !++f || (d && ((r = (o = s[E] || (s[E] = {}))[s.uniqueID] || (o[s.uniqueID] = {}))[p] = [k, f]), s !== e)););
                            return (f -= g) === m || f % m == 0 && 0 <= f / m
                        }
                    }
                },
                PSEUDO: function(e, o) {
                    var t, s = w.pseudos[e] || w.setFilters[e.toLowerCase()] || oe.error("unsupported pseudo: " + e);
                    return s[E] ? s(o) : 1 < s.length ? (t = [e, e, "", o], w.setFilters.hasOwnProperty(e.toLowerCase()) ? ae(function(e, t) {
                        for (var n, i = s(e, o), r = i.length; r--;) e[n = I(e, i[r])] = !(t[n] = i[r])
                    }) : function(e) {
                        return s(e, 0, t)
                    }) : s
                }
            },
            pseudos: {
                not: ae(function(e) {
                    var i = [],
                        r = [],
                        a = h(e.replace(W, "$1"));
                    return a[E] ? ae(function(e, t, n, i) {
                        for (var r, o = a(e, null, i, []), s = e.length; s--;)(r = o[s]) && (e[s] = !(t[s] = r))
                    }) : function(e, t, n) {
                        return i[0] = e, a(i, null, n, r), i[0] = null, !r.pop()
                    }
                }),
                has: ae(function(t) {
                    return function(e) {
                        return 0 < oe(t, e).length
                    }
                }),
                contains: ae(function(t) {
                    return t = t.replace(J, ee),
                        function(e) {
                            return -1 < (e.textContent || e.innerText || o(e)).indexOf(t)
                        }
                }),
                lang: ae(function(n) {
                    return B.test(n || "") || oe.error("unsupported lang: " + n), n = n.replace(J, ee).toLowerCase(),
                        function(e) {
                            var t;
                            do {
                                if (t = T ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang")) return (t = t.toLowerCase()) === n || 0 === t.indexOf(n + "-")
                            } while ((e = e.parentNode) && 1 === e.nodeType);
                            return !1
                        }
                }),
                target: function(e) {
                    var t = n.location && n.location.hash;
                    return t && t.slice(1) === e.id
                },
                root: function(e) {
                    return e === s
                },
                focus: function(e) {
                    return e === S.activeElement && (!S.hasFocus || S.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                },
                enabled: fe(!1),
                disabled: fe(!0),
                checked: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && !!e.checked || "option" === t && !!e.selected
                },
                selected: function(e) {
                    return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
                },
                empty: function(e) {
                    for (e = e.firstChild; e; e = e.nextSibling)
                        if (e.nodeType < 6) return !1;
                    return !0
                },
                parent: function(e) {
                    return !w.pseudos.empty(e)
                },
                header: function(e) {
                    return $.test(e.nodeName)
                },
                input: function(e) {
                    return X.test(e.nodeName)
                },
                button: function(e) {
                    var t = e.nodeName.toLowerCase();
                    return "input" === t && "button" === e.type || "button" === t
                },
                text: function(e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                },
                first: pe(function() {
                    return [0]
                }),
                last: pe(function(e, t) {
                    return [t - 1]
                }),
                eq: pe(function(e, t, n) {
                    return [n < 0 ? n + t : n]
                }),
                even: pe(function(e, t) {
                    for (var n = 0; n < t; n += 2) e.push(n);
                    return e
                }),
                odd: pe(function(e, t) {
                    for (var n = 1; n < t; n += 2) e.push(n);
                    return e
                }),
                lt: pe(function(e, t, n) {
                    for (var i = n < 0 ? n + t : n; 0 <= --i;) e.push(i);
                    return e
                }),
                gt: pe(function(e, t, n) {
                    for (var i = n < 0 ? n + t : n; ++i < t;) e.push(i);
                    return e
                })
            }
        }).pseudos.nth = w.pseudos.eq, {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        }) w.pseudos[e] = he(e);
        for (e in {
            submit: !0,
            reset: !0
        }) w.pseudos[e] = de(e);

        function ge() {}

        function ye(e) {
            for (var t = 0, n = e.length, i = ""; t < n; t++) i += e[t].value;
            return i
        }

        function ve(a, e, t) {
            var l = e.dir,
                c = e.next,
                u = c || l,
                h = t && "parentNode" === u,
                d = i++;
            return e.first ? function(e, t, n) {
                for (; e = e[l];)
                    if (1 === e.nodeType || h) return a(e, t, n);
                return !1
            } : function(e, t, n) {
                var i, r, o, s = [k, d];
                if (n) {
                    for (; e = e[l];)
                        if ((1 === e.nodeType || h) && a(e, t, n)) return !0
                } else
                    for (; e = e[l];)
                        if (1 === e.nodeType || h)
                            if (r = (o = e[E] || (e[E] = {}))[e.uniqueID] || (o[e.uniqueID] = {}), c && c === e.nodeName.toLowerCase()) e = e[l] || e;
                            else {
                                if ((i = r[u]) && i[0] === k && i[1] === d) return s[2] = i[2];
                                if ((r[u] = s)[2] = a(e, t, n)) return !0
                            } return !1
            }
        }

        function xe(r) {
            return 1 < r.length ? function(e, t, n) {
                for (var i = r.length; i--;)
                    if (!r[i](e, t, n)) return !1;
                return !0
            } : r[0]
        }

        function we(e, t, n, i, r) {
            for (var o, s = [], a = 0, l = e.length, c = null != t; a < l; a++)(o = e[a]) && (n && !n(o, i, r) || (s.push(o), c && t.push(a)));
            return s
        }

        function _e(f, p, m, g, y, e) {
            return g && !g[E] && (g = _e(g)), y && !y[E] && (y = _e(y, e)), ae(function(e, t, n, i) {
                var r, o, s, a = [],
                    l = [],
                    c = t.length,
                    u = e || function(e, t, n) {
                        for (var i = 0, r = t.length; i < r; i++) oe(e, t[i], n);
                        return n
                    }(p || "*", n.nodeType ? [n] : n, []),
                    h = !f || !e && p ? u : we(u, a, f, n, i),
                    d = m ? y || (e ? f : c || g) ? [] : t : h;
                if (m && m(h, d, n, i), g)
                    for (r = we(d, l), g(r, [], n, i), o = r.length; o--;)(s = r[o]) && (d[l[o]] = !(h[l[o]] = s));
                if (e) {
                    if (y || f) {
                        if (y) {
                            for (r = [], o = d.length; o--;)(s = d[o]) && r.push(h[o] = s);
                            y(null, d = [], r, i)
                        }
                        for (o = d.length; o--;)(s = d[o]) && -1 < (r = y ? I(e, s) : a[o]) && (e[r] = !(t[r] = s))
                    }
                } else d = we(d === t ? d.splice(c, d.length) : d), y ? y(null, t, d, i) : N.apply(t, d)
            })
        }

        function be(e) {
            for (var r, t, n, i = e.length, o = w.relative[e[0].type], s = o || w.relative[" "], a = o ? 1 : 0, l = ve(function(e) {
                return e === r
            }, s, !0), c = ve(function(e) {
                return -1 < I(r, e)
            }, s, !0), u = [function(e, t, n) {
                var i = !o && (n || t !== _) || ((r = t).nodeType ? l(e, t, n) : c(e, t, n));
                return r = null, i
            }]; a < i; a++)
                if (t = w.relative[e[a].type]) u = [ve(xe(u), t)];
                else {
                    if ((t = w.filter[e[a].type].apply(null, e[a].matches))[E]) {
                        for (n = ++a; n < i && !w.relative[e[n].type]; n++);
                        return _e(1 < a && xe(u), 1 < a && ye(e.slice(0, a - 1).concat({
                            value: " " === e[a - 2].type ? "*" : ""
                        })).replace(W, "$1"), t, a < n && be(e.slice(a, n)), n < i && be(e = e.slice(n)), n < i && ye(e))
                    }
                    u.push(t)
                }
            return xe(u)
        }
        return ge.prototype = w.filters = w.pseudos, w.setFilters = new ge, p = oe.tokenize = function(e, t) {
            var n, i, r, o, s, a, l, c = x[e + " "];
            if (c) return t ? 0 : c.slice(0);
            for (s = e, a = [], l = w.preFilter; s;) {
                for (o in n && !(i = F.exec(s)) || (i && (s = s.slice(i[0].length) || s), a.push(r = [])), n = !1, (i = q.exec(s)) && (n = i.shift(), r.push({
                    value: n,
                    type: i[0].replace(W, " ")
                }), s = s.slice(n.length)), w.filter) !(i = G[o].exec(s)) || l[o] && !(i = l[o](i)) || (n = i.shift(), r.push({
                    value: n,
                    type: o,
                    matches: i
                }), s = s.slice(n.length));
                if (!n) break
            }
            return t ? s.length : s ? oe.error(e) : x(e, a).slice(0)
        }, h = oe.compile = function(e, t) {
            var n, g, y, v, x, i, r = [],
                o = [],
                s = M[e + " "];
            if (!s) {
                for (t || (t = p(e)), n = t.length; n--;)(s = be(t[n]))[E] ? r.push(s) : o.push(s);
                (s = M(e, (g = o, y = r, v = 0 < y.length, x = 0 < g.length, i = function(e, t, n, i, r) {
                    var o, s, a, l = 0,
                        c = "0",
                        u = e && [],
                        h = [],
                        d = _,
                        f = e || x && w.find.TAG("*", r),
                        p = k += null == d ? 1 : Math.random() || .1,
                        m = f.length;
                    for (r && (_ = t === S || t || r); c !== m && null != (o = f[c]); c++) {
                        if (x && o) {
                            for (s = 0, t || o.ownerDocument === S || (b(o), n = !T); a = g[s++];)
                                if (a(o, t || S, n)) {
                                    i.push(o);
                                    break
                                }
                            r && (k = p)
                        }
                        v && ((o = !a && o) && l--, e && u.push(o))
                    }
                    if (l += c, v && c !== l) {
                        for (s = 0; a = y[s++];) a(u, h, t, n);
                        if (e) {
                            if (0 < l)
                                for (; c--;) u[c] || h[c] || (h[c] = O.call(i));
                            h = we(h)
                        }
                        N.apply(i, h), r && !e && 0 < h.length && 1 < l + y.length && oe.uniqueSort(i)
                    }
                    return r && (k = p, _ = d), u
                }, v ? ae(i) : i))).selector = e
            }
            return s
        }, m = oe.select = function(e, t, n, i) {
            var r, o, s, a, l, c = "function" == typeof e && e,
                u = !i && p(e = c.selector || e);
            if (n = n || [], 1 === u.length) {
                if (2 < (o = u[0] = u[0].slice(0)).length && "ID" === (s = o[0]).type && 9 === t.nodeType && T && w.relative[o[1].type]) {
                    if (!(t = (w.find.ID(s.matches[0].replace(J, ee), t) || [])[0])) return n;
                    c && (t = t.parentNode), e = e.slice(o.shift().value.length)
                }
                for (r = G.needsContext.test(e) ? 0 : o.length; r-- && (s = o[r], !w.relative[a = s.type]);)
                    if ((l = w.find[a]) && (i = l(s.matches[0].replace(J, ee), Z.test(o[0].type) && me(t.parentNode) || t))) {
                        if (o.splice(r, 1), !(e = i.length && ye(o))) return N.apply(n, i), n;
                        break
                    }
            }
            return (c || h(e, u))(i, t, !T, n, !t || Z.test(e) && me(t.parentNode) || t), n
        }, f.sortStable = E.split("").sort(C).join("") === E, f.detectDuplicates = !!c, b(), f.sortDetached = le(function(e) {
            return 1 & e.compareDocumentPosition(S.createElement("fieldset"))
        }), le(function(e) {
            return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
        }) || ce("type|href|height|width", function(e, t, n) {
            if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
        }), f.attributes && le(function(e) {
            return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
        }) || ce("value", function(e, t, n) {
            if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue
        }), le(function(e) {
            return null == e.getAttribute("disabled")
        }) || ce(H, function(e, t, n) {
            var i;
            if (!n) return !0 === e[t] ? t.toLowerCase() : (i = e.getAttributeNode(t)) && i.specified ? i.value : null
        }), oe
    }(S);
    E.find = f, E.expr = f.selectors, E.expr[":"] = E.expr.pseudos, E.uniqueSort = E.unique = f.uniqueSort, E.text = f.getText, E.isXMLDoc = f.isXML, E.contains = f.contains, E.escapeSelector = f.escape;
    var p = function(e, t, n) {
            for (var i = [], r = void 0 !== n;
                 (e = e[t]) && 9 !== e.nodeType;)
                if (1 === e.nodeType) {
                    if (r && E(e).is(n)) break;
                    i.push(e)
                }
            return i
        },
        b = function(e, t) {
            for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
            return n
        },
        k = E.expr.match.needsContext;

    function M(e, t) {
        return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
    }
    var C = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

    function D(e, n, i) {
        return v(n) ? E.grep(e, function(e, t) {
            return !!n.call(e, t, e) !== i
        }) : n.nodeType ? E.grep(e, function(e) {
            return e === n !== i
        }) : "string" != typeof n ? E.grep(e, function(e) {
            return -1 < r.call(n, e) !== i
        }) : E.filter(n, e, i)
    }
    E.filter = function(e, t, n) {
        var i = t[0];
        return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === i.nodeType ? E.find.matchesSelector(i, e) ? [i] : [] : E.find.matches(e, E.grep(t, function(e) {
            return 1 === e.nodeType
        }))
    }, E.fn.extend({
        find: function(e) {
            var t, n, i = this.length,
                r = this;
            if ("string" != typeof e) return this.pushStack(E(e).filter(function() {
                for (t = 0; t < i; t++)
                    if (E.contains(r[t], this)) return !0
            }));
            for (n = this.pushStack([]), t = 0; t < i; t++) E.find(e, r[t], n);
            return 1 < i ? E.uniqueSort(n) : n
        },
        filter: function(e) {
            return this.pushStack(D(this, e || [], !1))
        },
        not: function(e) {
            return this.pushStack(D(this, e || [], !0))
        },
        is: function(e) {
            return !!D(this, "string" == typeof e && k.test(e) ? E(e) : e || [], !1).length
        }
    });
    var O, A = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
    (E.fn.init = function(e, t, n) {
        var i, r;
        if (!e) return this;
        if (n = n || O, "string" != typeof e) return e.nodeType ? (this[0] = e, this.length = 1, this) : v(e) ? void 0 !== n.ready ? n.ready(e) : e(E) : E.makeArray(e, this);
        if (!(i = "<" === e[0] && ">" === e[e.length - 1] && 3 <= e.length ? [null, e, null] : A.exec(e)) || !i[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
        if (i[1]) {
            if (t = t instanceof E ? t[0] : t, E.merge(this, E.parseHTML(i[1], t && t.nodeType ? t.ownerDocument || t : T, !0)), C.test(i[1]) && E.isPlainObject(t))
                for (i in t) v(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
            return this
        }
        return (r = T.getElementById(i[2])) && (this[0] = r, this.length = 1), this
    }).prototype = E.fn, O = E(T);
    var N = /^(?:parents|prev(?:Until|All))/,
        L = {
            children: !0,
            contents: !0,
            next: !0,
            prev: !0
        };

    function I(e, t) {
        for (;
            (e = e[t]) && 1 !== e.nodeType;);
        return e
    }
    E.fn.extend({
        has: function(e) {
            var t = E(e, this),
                n = t.length;
            return this.filter(function() {
                for (var e = 0; e < n; e++)
                    if (E.contains(this, t[e])) return !0
            })
        },
        closest: function(e, t) {
            var n, i = 0,
                r = this.length,
                o = [],
                s = "string" != typeof e && E(e);
            if (!k.test(e))
                for (; i < r; i++)
                    for (n = this[i]; n && n !== t; n = n.parentNode)
                        if (n.nodeType < 11 && (s ? -1 < s.index(n) : 1 === n.nodeType && E.find.matchesSelector(n, e))) {
                            o.push(n);
                            break
                        }
            return this.pushStack(1 < o.length ? E.uniqueSort(o) : o)
        },
        index: function(e) {
            return e ? "string" == typeof e ? r.call(E(e), this[0]) : r.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        },
        add: function(e, t) {
            return this.pushStack(E.uniqueSort(E.merge(this.get(), E(e, t))))
        },
        addBack: function(e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
        }
    }), E.each({
        parent: function(e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null
        },
        parents: function(e) {
            return p(e, "parentNode")
        },
        parentsUntil: function(e, t, n) {
            return p(e, "parentNode", n)
        },
        next: function(e) {
            return I(e, "nextSibling")
        },
        prev: function(e) {
            return I(e, "previousSibling")
        },
        nextAll: function(e) {
            return p(e, "nextSibling")
        },
        prevAll: function(e) {
            return p(e, "previousSibling")
        },
        nextUntil: function(e, t, n) {
            return p(e, "nextSibling", n)
        },
        prevUntil: function(e, t, n) {
            return p(e, "previousSibling", n)
        },
        siblings: function(e) {
            return b((e.parentNode || {}).firstChild, e)
        },
        children: function(e) {
            return b(e.firstChild)
        },
        contents: function(e) {
            return M(e, "iframe") ? e.contentDocument : (M(e, "template") && (e = e.content || e), E.merge([], e.childNodes))
        }
    }, function(i, r) {
        E.fn[i] = function(e, t) {
            var n = E.map(this, r, e);
            return "Until" !== i.slice(-5) && (t = e), t && "string" == typeof t && (n = E.filter(t, n)), 1 < this.length && (L[i] || E.uniqueSort(n), N.test(i) && n.reverse()), this.pushStack(n)
        }
    });
    var H = /[^\x20\t\r\n\f]+/g;

    function P(e) {
        return e
    }

    function j(e) {
        throw e
    }

    function z(e, t, n, i) {
        var r;
        try {
            e && v(r = e.promise) ? r.call(e).done(t).fail(n) : e && v(r = e.then) ? r.call(e, t, n) : t.apply(void 0, [e].slice(i))
        } catch (e) {
            n.apply(void 0, [e])
        }
    }
    E.Callbacks = function(i) {
        var e, n;
        i = "string" == typeof i ? (e = i, n = {}, E.each(e.match(H) || [], function(e, t) {
            n[t] = !0
        }), n) : E.extend({}, i);
        var r, t, o, s, a = [],
            l = [],
            c = -1,
            u = function() {
                for (s = s || i.once, o = r = !0; l.length; c = -1)
                    for (t = l.shift(); ++c < a.length;) !1 === a[c].apply(t[0], t[1]) && i.stopOnFalse && (c = a.length, t = !1);
                i.memory || (t = !1), r = !1, s && (a = t ? [] : "")
            },
            h = {
                add: function() {
                    return a && (t && !r && (c = a.length - 1, l.push(t)), function n(e) {
                        E.each(e, function(e, t) {
                            v(t) ? i.unique && h.has(t) || a.push(t) : t && t.length && "string" !== _(t) && n(t)
                        })
                    }(arguments), t && !r && u()), this
                },
                remove: function() {
                    return E.each(arguments, function(e, t) {
                        for (var n; - 1 < (n = E.inArray(t, a, n));) a.splice(n, 1), n <= c && c--
                    }), this
                },
                has: function(e) {
                    return e ? -1 < E.inArray(e, a) : 0 < a.length
                },
                empty: function() {
                    return a && (a = []), this
                },
                disable: function() {
                    return s = l = [], a = t = "", this
                },
                disabled: function() {
                    return !a
                },
                lock: function() {
                    return s = l = [], t || r || (a = t = ""), this
                },
                locked: function() {
                    return !!s
                },
                fireWith: function(e, t) {
                    return s || (t = [e, (t = t || []).slice ? t.slice() : t], l.push(t), r || u()), this
                },
                fire: function() {
                    return h.fireWith(this, arguments), this
                },
                fired: function() {
                    return !!o
                }
            };
        return h
    }, E.extend({
        Deferred: function(e) {
            var o = [
                    ["notify", "progress", E.Callbacks("memory"), E.Callbacks("memory"), 2],
                    ["resolve", "done", E.Callbacks("once memory"), E.Callbacks("once memory"), 0, "resolved"],
                    ["reject", "fail", E.Callbacks("once memory"), E.Callbacks("once memory"), 1, "rejected"]
                ],
                r = "pending",
                s = {
                    state: function() {
                        return r
                    },
                    always: function() {
                        return a.done(arguments).fail(arguments), this
                    },
                    catch: function(e) {
                        return s.then(null, e)
                    },
                    pipe: function() {
                        var r = arguments;
                        return E.Deferred(function(i) {
                            E.each(o, function(e, t) {
                                var n = v(r[t[4]]) && r[t[4]];
                                a[t[1]](function() {
                                    var e = n && n.apply(this, arguments);
                                    e && v(e.promise) ? e.promise().progress(i.notify).done(i.resolve).fail(i.reject) : i[t[0] + "With"](this, n ? [e] : arguments)
                                })
                            }), r = null
                        }).promise()
                    },
                    then: function(t, n, i) {
                        var l = 0;

                        function c(r, o, s, a) {
                            return function() {
                                var n = this,
                                    i = arguments,
                                    e = function() {
                                        var e, t;
                                        if (!(r < l)) {
                                            if ((e = s.apply(n, i)) === o.promise()) throw new TypeError("Thenable self-resolution");
                                            t = e && ("object" == typeof e || "function" == typeof e) && e.then, v(t) ? a ? t.call(e, c(l, o, P, a), c(l, o, j, a)) : (l++, t.call(e, c(l, o, P, a), c(l, o, j, a), c(l, o, P, o.notifyWith))) : (s !== P && (n = void 0, i = [e]), (a || o.resolveWith)(n, i))
                                        }
                                    },
                                    t = a ? e : function() {
                                        try {
                                            e()
                                        } catch (e) {
                                            E.Deferred.exceptionHook && E.Deferred.exceptionHook(e, t.stackTrace), l <= r + 1 && (s !== j && (n = void 0, i = [e]), o.rejectWith(n, i))
                                        }
                                    };
                                r ? t() : (E.Deferred.getStackHook && (t.stackTrace = E.Deferred.getStackHook()), S.setTimeout(t))
                            }
                        }
                        return E.Deferred(function(e) {
                            o[0][3].add(c(0, e, v(i) ? i : P, e.notifyWith)), o[1][3].add(c(0, e, v(t) ? t : P)), o[2][3].add(c(0, e, v(n) ? n : j))
                        }).promise()
                    },
                    promise: function(e) {
                        return null != e ? E.extend(e, s) : s
                    }
                },
                a = {};
            return E.each(o, function(e, t) {
                var n = t[2],
                    i = t[5];
                s[t[1]] = n.add, i && n.add(function() {
                    r = i
                }, o[3 - e][2].disable, o[3 - e][3].disable, o[0][2].lock, o[0][3].lock), n.add(t[3].fire), a[t[0]] = function() {
                    return a[t[0] + "With"](this === a ? void 0 : this, arguments), this
                }, a[t[0] + "With"] = n.fireWith
            }), s.promise(a), e && e.call(a, a), a
        },
        when: function(e) {
            var n = arguments.length,
                t = n,
                i = Array(t),
                r = a.call(arguments),
                o = E.Deferred(),
                s = function(t) {
                    return function(e) {
                        i[t] = this, r[t] = 1 < arguments.length ? a.call(arguments) : e, --n || o.resolveWith(i, r)
                    }
                };
            if (n <= 1 && (z(e, o.done(s(t)).resolve, o.reject, !n), "pending" === o.state() || v(r[t] && r[t].then))) return o.then();
            for (; t--;) z(r[t], s(t), o.reject);
            return o.promise()
        }
    });
    var Y = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
    E.Deferred.exceptionHook = function(e, t) {
        S.console && S.console.warn && e && Y.test(e.name) && S.console.warn("jQuery.Deferred exception: " + e.message, e.stack, t)
    }, E.readyException = function(e) {
        S.setTimeout(function() {
            throw e
        })
    };
    var R = E.Deferred();

    function W() {
        T.removeEventListener("DOMContentLoaded", W), S.removeEventListener("load", W), E.ready()
    }
    E.fn.ready = function(e) {
        return R.then(e).catch(function(e) {
            E.readyException(e)
        }), this
    }, E.extend({
        isReady: !1,
        readyWait: 1,
        ready: function(e) {
            (!0 === e ? --E.readyWait : E.isReady) || ((E.isReady = !0) !== e && 0 < --E.readyWait || R.resolveWith(T, [E]))
        }
    }), E.ready.then = R.then, "complete" === T.readyState || "loading" !== T.readyState && !T.documentElement.doScroll ? S.setTimeout(E.ready) : (T.addEventListener("DOMContentLoaded", W), S.addEventListener("load", W));
    var F = function(e, t, n, i, r, o, s) {
            var a = 0,
                l = e.length,
                c = null == n;
            if ("object" === _(n))
                for (a in r = !0, n) F(e, t, a, n[a], !0, o, s);
            else if (void 0 !== i && (r = !0, v(i) || (s = !0), c && (t = s ? (t.call(e, i), null) : (c = t, function(e, t, n) {
                return c.call(E(e), n)
            })), t))
                for (; a < l; a++) t(e[a], n, s ? i : i.call(e[a], a, t(e[a], n)));
            return r ? e : c ? t.call(e) : l ? t(e[0], n) : o
        },
        q = /^-ms-/,
        U = /-([a-z])/g;

    function V(e, t) {
        return t.toUpperCase()
    }

    function B(e) {
        return e.replace(q, "ms-").replace(U, V)
    }
    var G = function(e) {
        return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
    };

    function X() {
        this.expando = E.expando + X.uid++
    }
    X.uid = 1, X.prototype = {
        cache: function(e) {
            var t = e[this.expando];
            return t || (t = {}, G(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
                value: t,
                configurable: !0
            }))), t
        },
        set: function(e, t, n) {
            var i, r = this.cache(e);
            if ("string" == typeof t) r[B(t)] = n;
            else
                for (i in t) r[B(i)] = t[i];
            return r
        },
        get: function(e, t) {
            return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][B(t)]
        },
        access: function(e, t, n) {
            return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t)
        },
        remove: function(e, t) {
            var n, i = e[this.expando];
            if (void 0 !== i) {
                if (void 0 !== t) {
                    n = (t = Array.isArray(t) ? t.map(B) : (t = B(t)) in i ? [t] : t.match(H) || []).length;
                    for (; n--;) delete i[t[n]]
                }(void 0 === t || E.isEmptyObject(i)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
            }
        },
        hasData: function(e) {
            var t = e[this.expando];
            return void 0 !== t && !E.isEmptyObject(t)
        }
    };
    var $ = new X,
        K = new X,
        Q = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        Z = /[A-Z]/g;

    function J(e, t, n) {
        var i, r;
        if (void 0 === n && 1 === e.nodeType)
            if (i = "data-" + t.replace(Z, "-$&").toLowerCase(), "string" == typeof(n = e.getAttribute(i))) {
                try {
                    n = "true" === (r = n) || "false" !== r && ("null" === r ? null : r === +r + "" ? +r : Q.test(r) ? JSON.parse(r) : r)
                } catch (e) {}
                K.set(e, t, n)
            } else n = void 0;
        return n
    }
    E.extend({
        hasData: function(e) {
            return K.hasData(e) || $.hasData(e)
        },
        data: function(e, t, n) {
            return K.access(e, t, n)
        },
        removeData: function(e, t) {
            K.remove(e, t)
        },
        _data: function(e, t, n) {
            return $.access(e, t, n)
        },
        _removeData: function(e, t) {
            $.remove(e, t)
        }
    }), E.fn.extend({
        data: function(n, e) {
            var t, i, r, o = this[0],
                s = o && o.attributes;
            if (void 0 !== n) return "object" == typeof n ? this.each(function() {
                K.set(this, n)
            }) : F(this, function(e) {
                var t;
                if (o && void 0 === e) {
                    if (void 0 !== (t = K.get(o, n))) return t;
                    if (void 0 !== (t = J(o, n))) return t
                } else this.each(function() {
                    K.set(this, n, e)
                })
            }, null, e, 1 < arguments.length, null, !0);
            if (this.length && (r = K.get(o), 1 === o.nodeType && !$.get(o, "hasDataAttrs"))) {
                for (t = s.length; t--;) s[t] && 0 === (i = s[t].name).indexOf("data-") && (i = B(i.slice(5)), J(o, i, r[i]));
                $.set(o, "hasDataAttrs", !0)
            }
            return r
        },
        removeData: function(e) {
            return this.each(function() {
                K.remove(this, e)
            })
        }
    }), E.extend({
        queue: function(e, t, n) {
            var i;
            if (e) return t = (t || "fx") + "queue", i = $.get(e, t), n && (!i || Array.isArray(n) ? i = $.access(e, t, E.makeArray(n)) : i.push(n)), i || []
        },
        dequeue: function(e, t) {
            t = t || "fx";
            var n = E.queue(e, t),
                i = n.length,
                r = n.shift(),
                o = E._queueHooks(e, t);
            "inprogress" === r && (r = n.shift(), i--), r && ("fx" === t && n.unshift("inprogress"), delete o.stop, r.call(e, function() {
                E.dequeue(e, t)
            }, o)), !i && o && o.empty.fire()
        },
        _queueHooks: function(e, t) {
            var n = t + "queueHooks";
            return $.get(e, n) || $.access(e, n, {
                empty: E.Callbacks("once memory").add(function() {
                    $.remove(e, [t + "queue", n])
                })
            })
        }
    }), E.fn.extend({
        queue: function(t, n) {
            var e = 2;
            return "string" != typeof t && (n = t, t = "fx", e--), arguments.length < e ? E.queue(this[0], t) : void 0 === n ? this : this.each(function() {
                var e = E.queue(this, t, n);
                E._queueHooks(this, t), "fx" === t && "inprogress" !== e[0] && E.dequeue(this, t)
            })
        },
        dequeue: function(e) {
            return this.each(function() {
                E.dequeue(this, e)
            })
        },
        clearQueue: function(e) {
            return this.queue(e || "fx", [])
        },
        promise: function(e, t) {
            var n, i = 1,
                r = E.Deferred(),
                o = this,
                s = this.length,
                a = function() {
                    --i || r.resolveWith(o, [o])
                };
            for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; s--;)(n = $.get(o[s], e + "queueHooks")) && n.empty && (i++, n.empty.add(a));
            return a(), r.promise(t)
        }
    });
    var ee = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        te = new RegExp("^(?:([+-])=|)(" + ee + ")([a-z%]*)$", "i"),
        ne = ["Top", "Right", "Bottom", "Left"],
        ie = function(e, t) {
            return "none" === (e = t || e).style.display || "" === e.style.display && E.contains(e.ownerDocument, e) && "none" === E.css(e, "display")
        },
        re = function(e, t, n, i) {
            var r, o, s = {};
            for (o in t) s[o] = e.style[o], e.style[o] = t[o];
            for (o in r = n.apply(e, i || []), t) e.style[o] = s[o];
            return r
        };

    function oe(e, t, n, i) {
        var r, o, s = 20,
            a = i ? function() {
                return i.cur()
            } : function() {
                return E.css(e, t, "")
            },
            l = a(),
            c = n && n[3] || (E.cssNumber[t] ? "" : "px"),
            u = (E.cssNumber[t] || "px" !== c && +l) && te.exec(E.css(e, t));
        if (u && u[3] !== c) {
            for (l /= 2, c = c || u[3], u = +l || 1; s--;) E.style(e, t, u + c), (1 - o) * (1 - (o = a() / l || .5)) <= 0 && (s = 0), u /= o;
            u *= 2, E.style(e, t, u + c), n = n || []
        }
        return n && (u = +u || +l || 0, r = n[1] ? u + (n[1] + 1) * n[2] : +n[2], i && (i.unit = c, i.start = u, i.end = r)), r
    }
    var se = {};

    function ae(e, t) {
        for (var n, i, r = [], o = 0, s = e.length; o < s; o++)(i = e[o]).style && (n = i.style.display, t ? ("none" === n && (r[o] = $.get(i, "display") || null, r[o] || (i.style.display = "")), "" === i.style.display && ie(i) && (r[o] = (h = c = l = void 0, c = (a = i).ownerDocument, u = a.nodeName, (h = se[u]) || (l = c.body.appendChild(c.createElement(u)), h = E.css(l, "display"), l.parentNode.removeChild(l), "none" === h && (h = "block"), se[u] = h)))) : "none" !== n && (r[o] = "none", $.set(i, "display", n)));
        var a, l, c, u, h;
        for (o = 0; o < s; o++) null != r[o] && (e[o].style.display = r[o]);
        return e
    }
    E.fn.extend({
        show: function() {
            return ae(this, !0)
        },
        hide: function() {
            return ae(this)
        },
        toggle: function(e) {
            return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
                ie(this) ? E(this).show() : E(this).hide()
            })
        }
    });
    var le = /^(?:checkbox|radio)$/i,
        ce = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
        ue = /^$|^module$|\/(?:java|ecma)script/i,
        he = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""]
        };

    function de(e, t) {
        var n;
        return n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t && M(e, t) ? E.merge([e], n) : n
    }

    function fe(e, t) {
        for (var n = 0, i = e.length; n < i; n++) $.set(e[n], "globalEval", !t || $.get(t[n], "globalEval"))
    }
    he.optgroup = he.option, he.tbody = he.tfoot = he.colgroup = he.caption = he.thead, he.th = he.td;
    var pe, me, ge = /<|&#?\w+;/;

    function ye(e, t, n, i, r) {
        for (var o, s, a, l, c, u, h = t.createDocumentFragment(), d = [], f = 0, p = e.length; f < p; f++)
            if ((o = e[f]) || 0 === o)
                if ("object" === _(o)) E.merge(d, o.nodeType ? [o] : o);
                else if (ge.test(o)) {
                    for (s = s || h.appendChild(t.createElement("div")), a = (ce.exec(o) || ["", ""])[1].toLowerCase(), l = he[a] || he._default, s.innerHTML = l[1] + E.htmlPrefilter(o) + l[2], u = l[0]; u--;) s = s.lastChild;
                    E.merge(d, s.childNodes), (s = h.firstChild).textContent = ""
                } else d.push(t.createTextNode(o));
        for (h.textContent = "", f = 0; o = d[f++];)
            if (i && -1 < E.inArray(o, i)) r && r.push(o);
            else if (c = E.contains(o.ownerDocument, o), s = de(h.appendChild(o), "script"), c && fe(s), n)
                for (u = 0; o = s[u++];) ue.test(o.type || "") && n.push(o);
        return h
    }
    pe = T.createDocumentFragment().appendChild(T.createElement("div")), (me = T.createElement("input")).setAttribute("type", "radio"), me.setAttribute("checked", "checked"), me.setAttribute("name", "t"), pe.appendChild(me), y.checkClone = pe.cloneNode(!0).cloneNode(!0).lastChild.checked, pe.innerHTML = "<textarea>x</textarea>", y.noCloneChecked = !!pe.cloneNode(!0).lastChild.defaultValue;
    var ve = T.documentElement,
        xe = /^key/,
        we = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
        _e = /^([^.]*)(?:\.(.+)|)/;

    function be() {
        return !0
    }

    function Se() {
        return !1
    }

    function Te() {
        try {
            return T.activeElement
        } catch (e) {}
    }

    function Ee(e, t, n, i, r, o) {
        var s, a;
        if ("object" == typeof t) {
            for (a in "string" != typeof n && (i = i || n, n = void 0), t) Ee(e, a, n, i, t[a], o);
            return e
        }
        if (null == i && null == r ? (r = n, i = n = void 0) : null == r && ("string" == typeof n ? (r = i, i = void 0) : (r = i, i = n, n = void 0)), !1 === r) r = Se;
        else if (!r) return e;
        return 1 === o && (s = r, (r = function(e) {
            return E().off(e), s.apply(this, arguments)
        }).guid = s.guid || (s.guid = E.guid++)), e.each(function() {
            E.event.add(this, t, r, i, n)
        })
    }
    E.event = {
        global: {},
        add: function(t, e, n, i, r) {
            var o, s, a, l, c, u, h, d, f, p, m, g = $.get(t);
            if (g)
                for (n.handler && (n = (o = n).handler, r = o.selector), r && E.find.matchesSelector(ve, r), n.guid || (n.guid = E.guid++), (l = g.events) || (l = g.events = {}), (s = g.handle) || (s = g.handle = function(e) {
                    return void 0 !== E && E.event.triggered !== e.type ? E.event.dispatch.apply(t, arguments) : void 0
                }), c = (e = (e || "").match(H) || [""]).length; c--;) f = m = (a = _e.exec(e[c]) || [])[1], p = (a[2] || "").split(".").sort(), f && (h = E.event.special[f] || {}, f = (r ? h.delegateType : h.bindType) || f, h = E.event.special[f] || {}, u = E.extend({
                    type: f,
                    origType: m,
                    data: i,
                    handler: n,
                    guid: n.guid,
                    selector: r,
                    needsContext: r && E.expr.match.needsContext.test(r),
                    namespace: p.join(".")
                }, o), (d = l[f]) || ((d = l[f] = []).delegateCount = 0, h.setup && !1 !== h.setup.call(t, i, p, s) || t.addEventListener && t.addEventListener(f, s)), h.add && (h.add.call(t, u), u.handler.guid || (u.handler.guid = n.guid)), r ? d.splice(d.delegateCount++, 0, u) : d.push(u), E.event.global[f] = !0)
        },
        remove: function(e, t, n, i, r) {
            var o, s, a, l, c, u, h, d, f, p, m, g = $.hasData(e) && $.get(e);
            if (g && (l = g.events)) {
                for (c = (t = (t || "").match(H) || [""]).length; c--;)
                    if (f = m = (a = _e.exec(t[c]) || [])[1], p = (a[2] || "").split(".").sort(), f) {
                        for (h = E.event.special[f] || {}, d = l[f = (i ? h.delegateType : h.bindType) || f] || [], a = a[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = o = d.length; o--;) u = d[o], !r && m !== u.origType || n && n.guid !== u.guid || a && !a.test(u.namespace) || i && i !== u.selector && ("**" !== i || !u.selector) || (d.splice(o, 1), u.selector && d.delegateCount--, h.remove && h.remove.call(e, u));
                        s && !d.length && (h.teardown && !1 !== h.teardown.call(e, p, g.handle) || E.removeEvent(e, f, g.handle), delete l[f])
                    } else
                        for (f in l) E.event.remove(e, f + t[c], n, i, !0);
                E.isEmptyObject(l) && $.remove(e, "handle events")
            }
        },
        dispatch: function(e) {
            var t, n, i, r, o, s, a = E.event.fix(e),
                l = new Array(arguments.length),
                c = ($.get(this, "events") || {})[a.type] || [],
                u = E.event.special[a.type] || {};
            for (l[0] = a, t = 1; t < arguments.length; t++) l[t] = arguments[t];
            if (a.delegateTarget = this, !u.preDispatch || !1 !== u.preDispatch.call(this, a)) {
                for (s = E.event.handlers.call(this, a, c), t = 0;
                     (r = s[t++]) && !a.isPropagationStopped();)
                    for (a.currentTarget = r.elem, n = 0;
                         (o = r.handlers[n++]) && !a.isImmediatePropagationStopped();) a.rnamespace && !a.rnamespace.test(o.namespace) || (a.handleObj = o, a.data = o.data, void 0 !== (i = ((E.event.special[o.origType] || {}).handle || o.handler).apply(r.elem, l)) && !1 === (a.result = i) && (a.preventDefault(), a.stopPropagation()));
                return u.postDispatch && u.postDispatch.call(this, a), a.result
            }
        },
        handlers: function(e, t) {
            var n, i, r, o, s, a = [],
                l = t.delegateCount,
                c = e.target;
            if (l && c.nodeType && !("click" === e.type && 1 <= e.button))
                for (; c !== this; c = c.parentNode || this)
                    if (1 === c.nodeType && ("click" !== e.type || !0 !== c.disabled)) {
                        for (o = [], s = {}, n = 0; n < l; n++) void 0 === s[r = (i = t[n]).selector + " "] && (s[r] = i.needsContext ? -1 < E(r, this).index(c) : E.find(r, this, null, [c]).length), s[r] && o.push(i);
                        o.length && a.push({
                            elem: c,
                            handlers: o
                        })
                    }
            return c = this, l < t.length && a.push({
                elem: c,
                handlers: t.slice(l)
            }), a
        },
        addProp: function(t, e) {
            Object.defineProperty(E.Event.prototype, t, {
                enumerable: !0,
                configurable: !0,
                get: v(e) ? function() {
                    if (this.originalEvent) return e(this.originalEvent)
                } : function() {
                    if (this.originalEvent) return this.originalEvent[t]
                },
                set: function(e) {
                    Object.defineProperty(this, t, {
                        enumerable: !0,
                        configurable: !0,
                        writable: !0,
                        value: e
                    })
                }
            })
        },
        fix: function(e) {
            return e[E.expando] ? e : new E.Event(e)
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    if (this !== Te() && this.focus) return this.focus(), !1
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    if (this === Te() && this.blur) return this.blur(), !1
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    if ("checkbox" === this.type && this.click && M(this, "input")) return this.click(), !1
                },
                _default: function(e) {
                    return M(e.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(e) {
                    void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                }
            }
        }
    }, E.removeEvent = function(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n)
    }, E.Event = function(e, t) {
        if (!(this instanceof E.Event)) return new E.Event(e, t);
        e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? be : Se, this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this.currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e, t && E.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[E.expando] = !0
    }, E.Event.prototype = {
        constructor: E.Event,
        isDefaultPrevented: Se,
        isPropagationStopped: Se,
        isImmediatePropagationStopped: Se,
        isSimulated: !1,
        preventDefault: function() {
            var e = this.originalEvent;
            this.isDefaultPrevented = be, e && !this.isSimulated && e.preventDefault()
        },
        stopPropagation: function() {
            var e = this.originalEvent;
            this.isPropagationStopped = be, e && !this.isSimulated && e.stopPropagation()
        },
        stopImmediatePropagation: function() {
            var e = this.originalEvent;
            this.isImmediatePropagationStopped = be, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation()
        }
    }, E.each({
        altKey: !0,
        bubbles: !0,
        cancelable: !0,
        changedTouches: !0,
        ctrlKey: !0,
        detail: !0,
        eventPhase: !0,
        metaKey: !0,
        pageX: !0,
        pageY: !0,
        shiftKey: !0,
        view: !0,
        char: !0,
        charCode: !0,
        key: !0,
        keyCode: !0,
        button: !0,
        buttons: !0,
        clientX: !0,
        clientY: !0,
        offsetX: !0,
        offsetY: !0,
        pointerId: !0,
        pointerType: !0,
        screenX: !0,
        screenY: !0,
        targetTouches: !0,
        toElement: !0,
        touches: !0,
        which: function(e) {
            var t = e.button;
            return null == e.which && xe.test(e.type) ? null != e.charCode ? e.charCode : e.keyCode : !e.which && void 0 !== t && we.test(e.type) ? 1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0 : e.which
        }
    }, E.event.addProp), E.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function(e, r) {
        E.event.special[e] = {
            delegateType: r,
            bindType: r,
            handle: function(e) {
                var t, n = e.relatedTarget,
                    i = e.handleObj;
                return n && (n === this || E.contains(this, n)) || (e.type = i.origType, t = i.handler.apply(this, arguments), e.type = r), t
            }
        }
    }), E.fn.extend({
        on: function(e, t, n, i) {
            return Ee(this, e, t, n, i)
        },
        one: function(e, t, n, i) {
            return Ee(this, e, t, n, i, 1)
        },
        off: function(e, t, n) {
            var i, r;
            if (e && e.preventDefault && e.handleObj) return i = e.handleObj, E(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
            if ("object" != typeof e) return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = Se), this.each(function() {
                E.event.remove(this, e, n, t)
            });
            for (r in e) this.off(r, t, e[r]);
            return this
        }
    });
    var ke = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
        Me = /<script|<style|<link/i,
        Ce = /checked\s*(?:[^=]|=\s*.checked.)/i,
        De = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

    function Oe(e, t) {
        return M(e, "table") && M(11 !== t.nodeType ? t : t.firstChild, "tr") && E(e).children("tbody")[0] || e
    }

    function Ae(e) {
        return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
    }

    function Ne(e) {
        return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e
    }

    function Le(e, t) {
        var n, i, r, o, s, a, l, c;
        if (1 === t.nodeType) {
            if ($.hasData(e) && (o = $.access(e), s = $.set(t, o), c = o.events))
                for (r in delete s.handle, s.events = {}, c)
                    for (n = 0, i = c[r].length; n < i; n++) E.event.add(t, r, c[r][n]);
            K.hasData(e) && (a = K.access(e), l = E.extend({}, a), K.set(t, l))
        }
    }

    function Ie(n, i, r, o) {
        i = m.apply([], i);
        var e, t, s, a, l, c, u = 0,
            h = n.length,
            d = h - 1,
            f = i[0],
            p = v(f);
        if (p || 1 < h && "string" == typeof f && !y.checkClone && Ce.test(f)) return n.each(function(e) {
            var t = n.eq(e);
            p && (i[0] = f.call(this, e, t.html())), Ie(t, i, r, o)
        });
        if (h && (t = (e = ye(i, n[0].ownerDocument, !1, n, o)).firstChild, 1 === e.childNodes.length && (e = t), t || o)) {
            for (a = (s = E.map(de(e, "script"), Ae)).length; u < h; u++) l = e, u !== d && (l = E.clone(l, !0, !0), a && E.merge(s, de(l, "script"))), r.call(n[u], l, u);
            if (a)
                for (c = s[s.length - 1].ownerDocument, E.map(s, Ne), u = 0; u < a; u++) l = s[u], ue.test(l.type || "") && !$.access(l, "globalEval") && E.contains(c, l) && (l.src && "module" !== (l.type || "").toLowerCase() ? E._evalUrl && E._evalUrl(l.src) : w(l.textContent.replace(De, ""), c, l))
        }
        return n
    }

    function He(e, t, n) {
        for (var i, r = t ? E.filter(t, e) : e, o = 0; null != (i = r[o]); o++) n || 1 !== i.nodeType || E.cleanData(de(i)), i.parentNode && (n && E.contains(i.ownerDocument, i) && fe(de(i, "script")), i.parentNode.removeChild(i));
        return e
    }
    E.extend({
        htmlPrefilter: function(e) {
            return e.replace(ke, "<$1></$2>")
        },
        clone: function(e, t, n) {
            var i, r, o, s, a, l, c, u = e.cloneNode(!0),
                h = E.contains(e.ownerDocument, e);
            if (!(y.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || E.isXMLDoc(e)))
                for (s = de(u), i = 0, r = (o = de(e)).length; i < r; i++) a = o[i], l = s[i], void 0, "input" === (c = l.nodeName.toLowerCase()) && le.test(a.type) ? l.checked = a.checked : "input" !== c && "textarea" !== c || (l.defaultValue = a.defaultValue);
            if (t)
                if (n)
                    for (o = o || de(e), s = s || de(u), i = 0, r = o.length; i < r; i++) Le(o[i], s[i]);
                else Le(e, u);
            return 0 < (s = de(u, "script")).length && fe(s, !h && de(e, "script")), u
        },
        cleanData: function(e) {
            for (var t, n, i, r = E.event.special, o = 0; void 0 !== (n = e[o]); o++)
                if (G(n)) {
                    if (t = n[$.expando]) {
                        if (t.events)
                            for (i in t.events) r[i] ? E.event.remove(n, i) : E.removeEvent(n, i, t.handle);
                        n[$.expando] = void 0
                    }
                    n[K.expando] && (n[K.expando] = void 0)
                }
        }
    }), E.fn.extend({
        detach: function(e) {
            return He(this, e, !0)
        },
        remove: function(e) {
            return He(this, e)
        },
        text: function(e) {
            return F(this, function(e) {
                return void 0 === e ? E.text(this) : this.empty().each(function() {
                    1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
                })
            }, null, e, arguments.length)
        },
        append: function() {
            return Ie(this, arguments, function(e) {
                1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Oe(this, e).appendChild(e)
            })
        },
        prepend: function() {
            return Ie(this, arguments, function(e) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var t = Oe(this, e);
                    t.insertBefore(e, t.firstChild)
                }
            })
        },
        before: function() {
            return Ie(this, arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this)
            })
        },
        after: function() {
            return Ie(this, arguments, function(e) {
                this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
            })
        },
        empty: function() {
            for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (E.cleanData(de(e, !1)), e.textContent = "");
            return this
        },
        clone: function(e, t) {
            return e = null != e && e, t = null == t ? e : t, this.map(function() {
                return E.clone(this, e, t)
            })
        },
        html: function(e) {
            return F(this, function(e) {
                var t = this[0] || {},
                    n = 0,
                    i = this.length;
                if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                if ("string" == typeof e && !Me.test(e) && !he[(ce.exec(e) || ["", ""])[1].toLowerCase()]) {
                    e = E.htmlPrefilter(e);
                    try {
                        for (; n < i; n++) 1 === (t = this[n] || {}).nodeType && (E.cleanData(de(t, !1)), t.innerHTML = e);
                        t = 0
                    } catch (e) {}
                }
                t && this.empty().append(e)
            }, null, e, arguments.length)
        },
        replaceWith: function() {
            var n = [];
            return Ie(this, arguments, function(e) {
                var t = this.parentNode;
                E.inArray(this, n) < 0 && (E.cleanData(de(this)), t && t.replaceChild(e, this))
            }, n)
        }
    }), E.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function(e, s) {
        E.fn[e] = function(e) {
            for (var t, n = [], i = E(e), r = i.length - 1, o = 0; o <= r; o++) t = o === r ? this : this.clone(!0), E(i[o])[s](t), l.apply(n, t.get());
            return this.pushStack(n)
        }
    });
    var Pe = new RegExp("^(" + ee + ")(?!px)[a-z%]+$", "i"),
        je = function(e) {
            var t = e.ownerDocument.defaultView;
            return t && t.opener || (t = S), t.getComputedStyle(e)
        },
        ze = new RegExp(ne.join("|"), "i");

    function Ye(e, t, n) {
        var i, r, o, s, a = e.style;
        return (n = n || je(e)) && ("" !== (s = n.getPropertyValue(t) || n[t]) || E.contains(e.ownerDocument, e) || (s = E.style(e, t)), !y.pixelBoxStyles() && Pe.test(s) && ze.test(t) && (i = a.width, r = a.minWidth, o = a.maxWidth, a.minWidth = a.maxWidth = a.width = s, s = n.width, a.width = i, a.minWidth = r, a.maxWidth = o)), void 0 !== s ? s + "" : s
    }

    function Re(e, t) {
        return {
            get: function() {
                if (!e()) return (this.get = t).apply(this, arguments);
                delete this.get
            }
        }
    }! function() {
        function e() {
            if (l) {
                a.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", l.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%", ve.appendChild(a).appendChild(l);
                var e = S.getComputedStyle(l);
                n = "1%" !== e.top, s = 12 === t(e.marginLeft), l.style.right = "60%", o = 36 === t(e.right), i = 36 === t(e.width), l.style.position = "absolute", r = 36 === l.offsetWidth || "absolute", ve.removeChild(a), l = null
            }
        }

        function t(e) {
            return Math.round(parseFloat(e))
        }
        var n, i, r, o, s, a = T.createElement("div"),
            l = T.createElement("div");
        l.style && (l.style.backgroundClip = "content-box", l.cloneNode(!0).style.backgroundClip = "", y.clearCloneStyle = "content-box" === l.style.backgroundClip, E.extend(y, {
            boxSizingReliable: function() {
                return e(), i
            },
            pixelBoxStyles: function() {
                return e(), o
            },
            pixelPosition: function() {
                return e(), n
            },
            reliableMarginLeft: function() {
                return e(), s
            },
            scrollboxSize: function() {
                return e(), r
            }
        }))
    }();
    var We = /^(none|table(?!-c[ea]).+)/,
        Fe = /^--/,
        qe = {
            position: "absolute",
            visibility: "hidden",
            display: "block"
        },
        Ue = {
            letterSpacing: "0",
            fontWeight: "400"
        },
        Ve = ["Webkit", "Moz", "ms"],
        Be = T.createElement("div").style;

    function Ge(e) {
        var t = E.cssProps[e];
        return t || (t = E.cssProps[e] = function(e) {
            if (e in Be) return e;
            for (var t = e[0].toUpperCase() + e.slice(1), n = Ve.length; n--;)
                if ((e = Ve[n] + t) in Be) return e
        }(e) || e), t
    }

    function Xe(e, t, n) {
        var i = te.exec(t);
        return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : t
    }

    function $e(e, t, n, i, r, o) {
        var s = "width" === t ? 1 : 0,
            a = 0,
            l = 0;
        if (n === (i ? "border" : "content")) return 0;
        for (; s < 4; s += 2) "margin" === n && (l += E.css(e, n + ne[s], !0, r)), i ? ("content" === n && (l -= E.css(e, "padding" + ne[s], !0, r)), "margin" !== n && (l -= E.css(e, "border" + ne[s] + "Width", !0, r))) : (l += E.css(e, "padding" + ne[s], !0, r), "padding" !== n ? l += E.css(e, "border" + ne[s] + "Width", !0, r) : a += E.css(e, "border" + ne[s] + "Width", !0, r));
        return !i && 0 <= o && (l += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - l - a - .5))), l
    }

    function Ke(e, t, n) {
        var i = je(e),
            r = Ye(e, t, i),
            o = "border-box" === E.css(e, "boxSizing", !1, i),
            s = o;
        if (Pe.test(r)) {
            if (!n) return r;
            r = "auto"
        }
        return s = s && (y.boxSizingReliable() || r === e.style[t]), ("auto" === r || !parseFloat(r) && "inline" === E.css(e, "display", !1, i)) && (r = e["offset" + t[0].toUpperCase() + t.slice(1)], s = !0), (r = parseFloat(r) || 0) + $e(e, t, n || (o ? "border" : "content"), s, i, r) + "px"
    }

    function Qe(e, t, n, i, r) {
        return new Qe.prototype.init(e, t, n, i, r)
    }
    E.extend({
        cssHooks: {
            opacity: {
                get: function(e, t) {
                    if (t) {
                        var n = Ye(e, "opacity");
                        return "" === n ? "1" : n
                    }
                }
            }
        },
        cssNumber: {
            animationIterationCount: !0,
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
        cssProps: {},
        style: function(e, t, n, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var r, o, s, a = B(t),
                    l = Fe.test(t),
                    c = e.style;
                if (l || (t = Ge(a)), s = E.cssHooks[t] || E.cssHooks[a], void 0 === n) return s && "get" in s && void 0 !== (r = s.get(e, !1, i)) ? r : c[t];
                "string" == (o = typeof n) && (r = te.exec(n)) && r[1] && (n = oe(e, t, r), o = "number"), null != n && n == n && ("number" === o && (n += r && r[3] || (E.cssNumber[a] ? "" : "px")), y.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (c[t] = "inherit"), s && "set" in s && void 0 === (n = s.set(e, n, i)) || (l ? c.setProperty(t, n) : c[t] = n))
            }
        },
        css: function(e, t, n, i) {
            var r, o, s, a = B(t);
            return Fe.test(t) || (t = Ge(a)), (s = E.cssHooks[t] || E.cssHooks[a]) && "get" in s && (r = s.get(e, !0, n)), void 0 === r && (r = Ye(e, t, i)), "normal" === r && t in Ue && (r = Ue[t]), "" === n || n ? (o = parseFloat(r), !0 === n || isFinite(o) ? o || 0 : r) : r
        }
    }), E.each(["height", "width"], function(e, a) {
        E.cssHooks[a] = {
            get: function(e, t, n) {
                if (t) return !We.test(E.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? Ke(e, a, n) : re(e, qe, function() {
                    return Ke(e, a, n)
                })
            },
            set: function(e, t, n) {
                var i, r = je(e),
                    o = "border-box" === E.css(e, "boxSizing", !1, r),
                    s = n && $e(e, a, n, o, r);
                return o && y.scrollboxSize() === r.position && (s -= Math.ceil(e["offset" + a[0].toUpperCase() + a.slice(1)] - parseFloat(r[a]) - $e(e, a, "border", !1, r) - .5)), s && (i = te.exec(t)) && "px" !== (i[3] || "px") && (e.style[a] = t, t = E.css(e, a)), Xe(0, t, s)
            }
        }
    }), E.cssHooks.marginLeft = Re(y.reliableMarginLeft, function(e, t) {
        if (t) return (parseFloat(Ye(e, "marginLeft")) || e.getBoundingClientRect().left - re(e, {
            marginLeft: 0
        }, function() {
            return e.getBoundingClientRect().left
        })) + "px"
    }), E.each({
        margin: "",
        padding: "",
        border: "Width"
    }, function(r, o) {
        E.cssHooks[r + o] = {
            expand: function(e) {
                for (var t = 0, n = {}, i = "string" == typeof e ? e.split(" ") : [e]; t < 4; t++) n[r + ne[t] + o] = i[t] || i[t - 2] || i[0];
                return n
            }
        }, "margin" !== r && (E.cssHooks[r + o].set = Xe)
    }), E.fn.extend({
        css: function(e, t) {
            return F(this, function(e, t, n) {
                var i, r, o = {},
                    s = 0;
                if (Array.isArray(t)) {
                    for (i = je(e), r = t.length; s < r; s++) o[t[s]] = E.css(e, t[s], !1, i);
                    return o
                }
                return void 0 !== n ? E.style(e, t, n) : E.css(e, t)
            }, e, t, 1 < arguments.length)
        }
    }), ((E.Tween = Qe).prototype = {
        constructor: Qe,
        init: function(e, t, n, i, r, o) {
            this.elem = e, this.prop = n, this.easing = r || E.easing._default, this.options = t, this.start = this.now = this.cur(), this.end = i, this.unit = o || (E.cssNumber[n] ? "" : "px")
        },
        cur: function() {
            var e = Qe.propHooks[this.prop];
            return e && e.get ? e.get(this) : Qe.propHooks._default.get(this)
        },
        run: function(e) {
            var t, n = Qe.propHooks[this.prop];
            return this.options.duration ? this.pos = t = E.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : Qe.propHooks._default.set(this), this
        }
    }).init.prototype = Qe.prototype, (Qe.propHooks = {
        _default: {
            get: function(e) {
                var t;
                return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = E.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0
            },
            set: function(e) {
                E.fx.step[e.prop] ? E.fx.step[e.prop](e) : 1 !== e.elem.nodeType || null == e.elem.style[E.cssProps[e.prop]] && !E.cssHooks[e.prop] ? e.elem[e.prop] = e.now : E.style(e.elem, e.prop, e.now + e.unit)
            }
        }
    }).scrollTop = Qe.propHooks.scrollLeft = {
        set: function(e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
        }
    }, E.easing = {
        linear: function(e) {
            return e
        },
        swing: function(e) {
            return .5 - Math.cos(e * Math.PI) / 2
        },
        _default: "swing"
    }, E.fx = Qe.prototype.init, E.fx.step = {};
    var Ze, Je, et, tt, nt = /^(?:toggle|show|hide)$/,
        it = /queueHooks$/;

    function rt() {
        Je && (!1 === T.hidden && S.requestAnimationFrame ? S.requestAnimationFrame(rt) : S.setTimeout(rt, E.fx.interval), E.fx.tick())
    }

    function ot() {
        return S.setTimeout(function() {
            Ze = void 0
        }), Ze = Date.now()
    }

    function st(e, t) {
        var n, i = 0,
            r = {
                height: e
            };
        for (t = t ? 1 : 0; i < 4; i += 2 - t) r["margin" + (n = ne[i])] = r["padding" + n] = e;
        return t && (r.opacity = r.width = e), r
    }

    function at(e, t, n) {
        for (var i, r = (lt.tweeners[t] || []).concat(lt.tweeners["*"]), o = 0, s = r.length; o < s; o++)
            if (i = r[o].call(n, t, e)) return i
    }

    function lt(o, e, t) {
        var n, s, i = 0,
            r = lt.prefilters.length,
            a = E.Deferred().always(function() {
                delete l.elem
            }),
            l = function() {
                if (s) return !1;
                for (var e = Ze || ot(), t = Math.max(0, c.startTime + c.duration - e), n = 1 - (t / c.duration || 0), i = 0, r = c.tweens.length; i < r; i++) c.tweens[i].run(n);
                return a.notifyWith(o, [c, n, t]), n < 1 && r ? t : (r || a.notifyWith(o, [c, 1, 0]), a.resolveWith(o, [c]), !1)
            },
            c = a.promise({
                elem: o,
                props: E.extend({}, e),
                opts: E.extend(!0, {
                    specialEasing: {},
                    easing: E.easing._default
                }, t),
                originalProperties: e,
                originalOptions: t,
                startTime: Ze || ot(),
                duration: t.duration,
                tweens: [],
                createTween: function(e, t) {
                    var n = E.Tween(o, c.opts, e, t, c.opts.specialEasing[e] || c.opts.easing);
                    return c.tweens.push(n), n
                },
                stop: function(e) {
                    var t = 0,
                        n = e ? c.tweens.length : 0;
                    if (s) return this;
                    for (s = !0; t < n; t++) c.tweens[t].run(1);
                    return e ? (a.notifyWith(o, [c, 1, 0]), a.resolveWith(o, [c, e])) : a.rejectWith(o, [c, e]), this
                }
            }),
            u = c.props;
        for (function(e, t) {
            var n, i, r, o, s;
            for (n in e)
                if (r = t[i = B(n)], o = e[n], Array.isArray(o) && (r = o[1], o = e[n] = o[0]), n !== i && (e[i] = o, delete e[n]), (s = E.cssHooks[i]) && "expand" in s)
                    for (n in o = s.expand(o), delete e[i], o) n in e || (e[n] = o[n], t[n] = r);
                else t[i] = r
        }(u, c.opts.specialEasing); i < r; i++)
            if (n = lt.prefilters[i].call(c, o, u, c.opts)) return v(n.stop) && (E._queueHooks(c.elem, c.opts.queue).stop = n.stop.bind(n)), n;
        return E.map(u, at, c), v(c.opts.start) && c.opts.start.call(o, c), c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always), E.fx.timer(E.extend(l, {
            elem: o,
            anim: c,
            queue: c.opts.queue
        })), c
    }
    E.Animation = E.extend(lt, {
        tweeners: {
            "*": [function(e, t) {
                var n = this.createTween(e, t);
                return oe(n.elem, e, te.exec(t), n), n
            }]
        },
        tweener: function(e, t) {
            for (var n, i = 0, r = (e = v(e) ? (t = e, ["*"]) : e.match(H)).length; i < r; i++) n = e[i], lt.tweeners[n] = lt.tweeners[n] || [], lt.tweeners[n].unshift(t)
        },
        prefilters: [function(e, t, n) {
            var i, r, o, s, a, l, c, u, h = "width" in t || "height" in t,
                d = this,
                f = {},
                p = e.style,
                m = e.nodeType && ie(e),
                g = $.get(e, "fxshow");
            for (i in n.queue || (null == (s = E._queueHooks(e, "fx")).unqueued && (s.unqueued = 0, a = s.empty.fire, s.empty.fire = function() {
                s.unqueued || a()
            }), s.unqueued++, d.always(function() {
                d.always(function() {
                    s.unqueued--, E.queue(e, "fx").length || s.empty.fire()
                })
            })), t)
                if (r = t[i], nt.test(r)) {
                    if (delete t[i], o = o || "toggle" === r, r === (m ? "hide" : "show")) {
                        if ("show" !== r || !g || void 0 === g[i]) continue;
                        m = !0
                    }
                    f[i] = g && g[i] || E.style(e, i)
                }
            if ((l = !E.isEmptyObject(t)) || !E.isEmptyObject(f))
                for (i in h && 1 === e.nodeType && (n.overflow = [p.overflow, p.overflowX, p.overflowY], null == (c = g && g.display) && (c = $.get(e, "display")), "none" === (u = E.css(e, "display")) && (c ? u = c : (ae([e], !0), c = e.style.display || c, u = E.css(e, "display"), ae([e]))), ("inline" === u || "inline-block" === u && null != c) && "none" === E.css(e, "float") && (l || (d.done(function() {
                    p.display = c
                }), null == c && (u = p.display, c = "none" === u ? "" : u)), p.display = "inline-block")), n.overflow && (p.overflow = "hidden", d.always(function() {
                    p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
                })), l = !1, f) l || (g ? "hidden" in g && (m = g.hidden) : g = $.access(e, "fxshow", {
                    display: c
                }), o && (g.hidden = !m), m && ae([e], !0), d.done(function() {
                    for (i in m || ae([e]), $.remove(e, "fxshow"), f) E.style(e, i, f[i])
                })), l = at(m ? g[i] : 0, i, d), i in g || (g[i] = l.start, m && (l.end = l.start, l.start = 0))
        }],
        prefilter: function(e, t) {
            t ? lt.prefilters.unshift(e) : lt.prefilters.push(e)
        }
    }), E.speed = function(e, t, n) {
        var i = e && "object" == typeof e ? E.extend({}, e) : {
            complete: n || !n && t || v(e) && e,
            duration: e,
            easing: n && t || t && !v(t) && t
        };
        return E.fx.off ? i.duration = 0 : "number" != typeof i.duration && (i.duration in E.fx.speeds ? i.duration = E.fx.speeds[i.duration] : i.duration = E.fx.speeds._default), null != i.queue && !0 !== i.queue || (i.queue = "fx"), i.old = i.complete, i.complete = function() {
            v(i.old) && i.old.call(this), i.queue && E.dequeue(this, i.queue)
        }, i
    }, E.fn.extend({
        fadeTo: function(e, t, n, i) {
            return this.filter(ie).css("opacity", 0).show().end().animate({
                opacity: t
            }, e, n, i)
        },
        animate: function(t, e, n, i) {
            var r = E.isEmptyObject(t),
                o = E.speed(e, n, i),
                s = function() {
                    var e = lt(this, E.extend({}, t), o);
                    (r || $.get(this, "finish")) && e.stop(!0)
                };
            return s.finish = s, r || !1 === o.queue ? this.each(s) : this.queue(o.queue, s)
        },
        stop: function(r, e, o) {
            var s = function(e) {
                var t = e.stop;
                delete e.stop, t(o)
            };
            return "string" != typeof r && (o = e, e = r, r = void 0), e && !1 !== r && this.queue(r || "fx", []), this.each(function() {
                var e = !0,
                    t = null != r && r + "queueHooks",
                    n = E.timers,
                    i = $.get(this);
                if (t) i[t] && i[t].stop && s(i[t]);
                else
                    for (t in i) i[t] && i[t].stop && it.test(t) && s(i[t]);
                for (t = n.length; t--;) n[t].elem !== this || null != r && n[t].queue !== r || (n[t].anim.stop(o), e = !1, n.splice(t, 1));
                !e && o || E.dequeue(this, r)
            })
        },
        finish: function(s) {
            return !1 !== s && (s = s || "fx"), this.each(function() {
                var e, t = $.get(this),
                    n = t[s + "queue"],
                    i = t[s + "queueHooks"],
                    r = E.timers,
                    o = n ? n.length : 0;
                for (t.finish = !0, E.queue(this, s, []), i && i.stop && i.stop.call(this, !0), e = r.length; e--;) r[e].elem === this && r[e].queue === s && (r[e].anim.stop(!0), r.splice(e, 1));
                for (e = 0; e < o; e++) n[e] && n[e].finish && n[e].finish.call(this);
                delete t.finish
            })
        }
    }), E.each(["toggle", "show", "hide"], function(e, i) {
        var r = E.fn[i];
        E.fn[i] = function(e, t, n) {
            return null == e || "boolean" == typeof e ? r.apply(this, arguments) : this.animate(st(i, !0), e, t, n)
        }
    }), E.each({
        slideDown: st("show"),
        slideUp: st("hide"),
        slideToggle: st("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    }, function(e, i) {
        E.fn[e] = function(e, t, n) {
            return this.animate(i, e, t, n)
        }
    }), E.timers = [], E.fx.tick = function() {
        var e, t = 0,
            n = E.timers;
        for (Ze = Date.now(); t < n.length; t++)(e = n[t])() || n[t] !== e || n.splice(t--, 1);
        n.length || E.fx.stop(), Ze = void 0
    }, E.fx.timer = function(e) {
        E.timers.push(e), E.fx.start()
    }, E.fx.interval = 13, E.fx.start = function() {
        Je || (Je = !0, rt())
    }, E.fx.stop = function() {
        Je = null
    }, E.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    }, E.fn.delay = function(i, e) {
        return i = E.fx && E.fx.speeds[i] || i, e = e || "fx", this.queue(e, function(e, t) {
            var n = S.setTimeout(e, i);
            t.stop = function() {
                S.clearTimeout(n)
            }
        })
    }, et = T.createElement("input"), tt = T.createElement("select").appendChild(T.createElement("option")), et.type = "checkbox", y.checkOn = "" !== et.value, y.optSelected = tt.selected, (et = T.createElement("input")).value = "t", et.type = "radio", y.radioValue = "t" === et.value;
    var ct, ut = E.expr.attrHandle;
    E.fn.extend({
        attr: function(e, t) {
            return F(this, E.attr, e, t, 1 < arguments.length)
        },
        removeAttr: function(e) {
            return this.each(function() {
                E.removeAttr(this, e)
            })
        }
    }), E.extend({
        attr: function(e, t, n) {
            var i, r, o = e.nodeType;
            if (3 !== o && 8 !== o && 2 !== o) return void 0 === e.getAttribute ? E.prop(e, t, n) : (1 === o && E.isXMLDoc(e) || (r = E.attrHooks[t.toLowerCase()] || (E.expr.match.bool.test(t) ? ct : void 0)), void 0 !== n ? null === n ? void E.removeAttr(e, t) : r && "set" in r && void 0 !== (i = r.set(e, n, t)) ? i : (e.setAttribute(t, n + ""), n) : r && "get" in r && null !== (i = r.get(e, t)) ? i : null == (i = E.find.attr(e, t)) ? void 0 : i)
        },
        attrHooks: {
            type: {
                set: function(e, t) {
                    if (!y.radioValue && "radio" === t && M(e, "input")) {
                        var n = e.value;
                        return e.setAttribute("type", t), n && (e.value = n), t
                    }
                }
            }
        },
        removeAttr: function(e, t) {
            var n, i = 0,
                r = t && t.match(H);
            if (r && 1 === e.nodeType)
                for (; n = r[i++];) e.removeAttribute(n)
        }
    }), ct = {
        set: function(e, t, n) {
            return !1 === t ? E.removeAttr(e, n) : e.setAttribute(n, n), n
        }
    }, E.each(E.expr.match.bool.source.match(/\w+/g), function(e, t) {
        var s = ut[t] || E.find.attr;
        ut[t] = function(e, t, n) {
            var i, r, o = t.toLowerCase();
            return n || (r = ut[o], ut[o] = i, i = null != s(e, t, n) ? o : null, ut[o] = r), i
        }
    });
    var ht = /^(?:input|select|textarea|button)$/i,
        dt = /^(?:a|area)$/i;

    function ft(e) {
        return (e.match(H) || []).join(" ")
    }

    function pt(e) {
        return e.getAttribute && e.getAttribute("class") || ""
    }

    function mt(e) {
        return Array.isArray(e) ? e : "string" == typeof e && e.match(H) || []
    }
    E.fn.extend({
        prop: function(e, t) {
            return F(this, E.prop, e, t, 1 < arguments.length)
        },
        removeProp: function(e) {
            return this.each(function() {
                delete this[E.propFix[e] || e]
            })
        }
    }), E.extend({
        prop: function(e, t, n) {
            var i, r, o = e.nodeType;
            if (3 !== o && 8 !== o && 2 !== o) return 1 === o && E.isXMLDoc(e) || (t = E.propFix[t] || t, r = E.propHooks[t]), void 0 !== n ? r && "set" in r && void 0 !== (i = r.set(e, n, t)) ? i : e[t] = n : r && "get" in r && null !== (i = r.get(e, t)) ? i : e[t]
        },
        propHooks: {
            tabIndex: {
                get: function(e) {
                    var t = E.find.attr(e, "tabindex");
                    return t ? parseInt(t, 10) : ht.test(e.nodeName) || dt.test(e.nodeName) && e.href ? 0 : -1
                }
            }
        },
        propFix: {
            for: "htmlFor",
            class: "className"
        }
    }), y.optSelected || (E.propHooks.selected = {
        get: function(e) {
            var t = e.parentNode;
            return t && t.parentNode && t.parentNode.selectedIndex, null
        },
        set: function(e) {
            var t = e.parentNode;
            t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)
        }
    }), E.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
        E.propFix[this.toLowerCase()] = this
    }), E.fn.extend({
        addClass: function(t) {
            var e, n, i, r, o, s, a, l = 0;
            if (v(t)) return this.each(function(e) {
                E(this).addClass(t.call(this, e, pt(this)))
            });
            if ((e = mt(t)).length)
                for (; n = this[l++];)
                    if (r = pt(n), i = 1 === n.nodeType && " " + ft(r) + " ") {
                        for (s = 0; o = e[s++];) i.indexOf(" " + o + " ") < 0 && (i += o + " ");
                        r !== (a = ft(i)) && n.setAttribute("class", a)
                    }
            return this
        },
        removeClass: function(t) {
            var e, n, i, r, o, s, a, l = 0;
            if (v(t)) return this.each(function(e) {
                E(this).removeClass(t.call(this, e, pt(this)))
            });
            if (!arguments.length) return this.attr("class", "");
            if ((e = mt(t)).length)
                for (; n = this[l++];)
                    if (r = pt(n), i = 1 === n.nodeType && " " + ft(r) + " ") {
                        for (s = 0; o = e[s++];)
                            for (; - 1 < i.indexOf(" " + o + " ");) i = i.replace(" " + o + " ", " ");
                        r !== (a = ft(i)) && n.setAttribute("class", a)
                    }
            return this
        },
        toggleClass: function(r, t) {
            var o = typeof r,
                s = "string" === o || Array.isArray(r);
            return "boolean" == typeof t && s ? t ? this.addClass(r) : this.removeClass(r) : v(r) ? this.each(function(e) {
                E(this).toggleClass(r.call(this, e, pt(this), t), t)
            }) : this.each(function() {
                var e, t, n, i;
                if (s)
                    for (t = 0, n = E(this), i = mt(r); e = i[t++];) n.hasClass(e) ? n.removeClass(e) : n.addClass(e);
                else void 0 !== r && "boolean" !== o || ((e = pt(this)) && $.set(this, "__className__", e), this.setAttribute && this.setAttribute("class", e || !1 === r ? "" : $.get(this, "__className__") || ""))
            })
        },
        hasClass: function(e) {
            var t, n, i = 0;
            for (t = " " + e + " "; n = this[i++];)
                if (1 === n.nodeType && -1 < (" " + ft(pt(n)) + " ").indexOf(t)) return !0;
            return !1
        }
    });
    var gt = /\r/g;
    E.fn.extend({
        val: function(n) {
            var i, e, r, t = this[0];
            return arguments.length ? (r = v(n), this.each(function(e) {
                var t;
                1 === this.nodeType && (null == (t = r ? n.call(this, e, E(this).val()) : n) ? t = "" : "number" == typeof t ? t += "" : Array.isArray(t) && (t = E.map(t, function(e) {
                    return null == e ? "" : e + ""
                })), (i = E.valHooks[this.type] || E.valHooks[this.nodeName.toLowerCase()]) && "set" in i && void 0 !== i.set(this, t, "value") || (this.value = t))
            })) : t ? (i = E.valHooks[t.type] || E.valHooks[t.nodeName.toLowerCase()]) && "get" in i && void 0 !== (e = i.get(t, "value")) ? e : "string" == typeof(e = t.value) ? e.replace(gt, "") : null == e ? "" : e : void 0
        }
    }), E.extend({
        valHooks: {
            option: {
                get: function(e) {
                    var t = E.find.attr(e, "value");
                    return null != t ? t : ft(E.text(e))
                }
            },
            select: {
                get: function(e) {
                    var t, n, i, r = e.options,
                        o = e.selectedIndex,
                        s = "select-one" === e.type,
                        a = s ? null : [],
                        l = s ? o + 1 : r.length;
                    for (i = o < 0 ? l : s ? o : 0; i < l; i++)
                        if (((n = r[i]).selected || i === o) && !n.disabled && (!n.parentNode.disabled || !M(n.parentNode, "optgroup"))) {
                            if (t = E(n).val(), s) return t;
                            a.push(t)
                        }
                    return a
                },
                set: function(e, t) {
                    for (var n, i, r = e.options, o = E.makeArray(t), s = r.length; s--;)((i = r[s]).selected = -1 < E.inArray(E.valHooks.option.get(i), o)) && (n = !0);
                    return n || (e.selectedIndex = -1), o
                }
            }
        }
    }), E.each(["radio", "checkbox"], function() {
        E.valHooks[this] = {
            set: function(e, t) {
                if (Array.isArray(t)) return e.checked = -1 < E.inArray(E(e).val(), t)
            }
        }, y.checkOn || (E.valHooks[this].get = function(e) {
            return null === e.getAttribute("value") ? "on" : e.value
        })
    }), y.focusin = "onfocusin" in S;
    var yt = /^(?:focusinfocus|focusoutblur)$/,
        vt = function(e) {
            e.stopPropagation()
        };
    E.extend(E.event, {
        trigger: function(e, t, n, i) {
            var r, o, s, a, l, c, u, h, d = [n || T],
                f = g.call(e, "type") ? e.type : e,
                p = g.call(e, "namespace") ? e.namespace.split(".") : [];
            if (o = h = s = n = n || T, 3 !== n.nodeType && 8 !== n.nodeType && !yt.test(f + E.event.triggered) && (-1 < f.indexOf(".") && (f = (p = f.split(".")).shift(), p.sort()), l = f.indexOf(":") < 0 && "on" + f, (e = e[E.expando] ? e : new E.Event(f, "object" == typeof e && e)).isTrigger = i ? 2 : 3, e.namespace = p.join("."), e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = n), t = null == t ? [e] : E.makeArray(t, [e]), u = E.event.special[f] || {}, i || !u.trigger || !1 !== u.trigger.apply(n, t))) {
                if (!i && !u.noBubble && !x(n)) {
                    for (a = u.delegateType || f, yt.test(a + f) || (o = o.parentNode); o; o = o.parentNode) d.push(o), s = o;
                    s === (n.ownerDocument || T) && d.push(s.defaultView || s.parentWindow || S)
                }
                for (r = 0;
                     (o = d[r++]) && !e.isPropagationStopped();) h = o, e.type = 1 < r ? a : u.bindType || f, (c = ($.get(o, "events") || {})[e.type] && $.get(o, "handle")) && c.apply(o, t), (c = l && o[l]) && c.apply && G(o) && (e.result = c.apply(o, t), !1 === e.result && e.preventDefault());
                return e.type = f, i || e.isDefaultPrevented() || u._default && !1 !== u._default.apply(d.pop(), t) || !G(n) || l && v(n[f]) && !x(n) && ((s = n[l]) && (n[l] = null), E.event.triggered = f, e.isPropagationStopped() && h.addEventListener(f, vt), n[f](), e.isPropagationStopped() && h.removeEventListener(f, vt), E.event.triggered = void 0, s && (n[l] = s)), e.result
            }
        },
        simulate: function(e, t, n) {
            var i = E.extend(new E.Event, n, {
                type: e,
                isSimulated: !0
            });
            E.event.trigger(i, null, t)
        }
    }), E.fn.extend({
        trigger: function(e, t) {
            return this.each(function() {
                E.event.trigger(e, t, this)
            })
        },
        triggerHandler: function(e, t) {
            var n = this[0];
            if (n) return E.event.trigger(e, t, n, !0)
        }
    }), y.focusin || E.each({
        focus: "focusin",
        blur: "focusout"
    }, function(n, i) {
        var r = function(e) {
            E.event.simulate(i, e.target, E.event.fix(e))
        };
        E.event.special[i] = {
            setup: function() {
                var e = this.ownerDocument || this,
                    t = $.access(e, i);
                t || e.addEventListener(n, r, !0), $.access(e, i, (t || 0) + 1)
            },
            teardown: function() {
                var e = this.ownerDocument || this,
                    t = $.access(e, i) - 1;
                t ? $.access(e, i, t) : (e.removeEventListener(n, r, !0), $.remove(e, i))
            }
        }
    });
    var xt = S.location,
        wt = Date.now(),
        _t = /\?/;
    E.parseXML = function(e) {
        var t;
        if (!e || "string" != typeof e) return null;
        try {
            t = (new S.DOMParser).parseFromString(e, "text/xml")
        } catch (e) {
            t = void 0
        }
        return t && !t.getElementsByTagName("parsererror").length || E.error("Invalid XML: " + e), t
    };
    var bt = /\[\]$/,
        St = /\r?\n/g,
        Tt = /^(?:submit|button|image|reset|file)$/i,
        Et = /^(?:input|select|textarea|keygen)/i;

    function kt(n, e, i, r) {
        var t;
        if (Array.isArray(e)) E.each(e, function(e, t) {
            i || bt.test(n) ? r(n, t) : kt(n + "[" + ("object" == typeof t && null != t ? e : "") + "]", t, i, r)
        });
        else if (i || "object" !== _(e)) r(n, e);
        else
            for (t in e) kt(n + "[" + t + "]", e[t], i, r)
    }
    E.param = function(e, t) {
        var n, i = [],
            r = function(e, t) {
                var n = v(t) ? t() : t;
                i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
            };
        if (Array.isArray(e) || e.jquery && !E.isPlainObject(e)) E.each(e, function() {
            r(this.name, this.value)
        });
        else
            for (n in e) kt(n, e[n], t, r);
        return i.join("&")
    }, E.fn.extend({
        serialize: function() {
            return E.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var e = E.prop(this, "elements");
                return e ? E.makeArray(e) : this
            }).filter(function() {
                var e = this.type;
                return this.name && !E(this).is(":disabled") && Et.test(this.nodeName) && !Tt.test(e) && (this.checked || !le.test(e))
            }).map(function(e, t) {
                var n = E(this).val();
                return null == n ? null : Array.isArray(n) ? E.map(n, function(e) {
                    return {
                        name: t.name,
                        value: e.replace(St, "\r\n")
                    }
                }) : {
                    name: t.name,
                    value: n.replace(St, "\r\n")
                }
            }).get()
        }
    });
    var Mt = /%20/g,
        Ct = /#.*$/,
        Dt = /([?&])_=[^&]*/,
        Ot = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        At = /^(?:GET|HEAD)$/,
        Nt = /^\/\//,
        Lt = {},
        It = {},
        Ht = "*/".concat("*"),
        Pt = T.createElement("a");

    function jt(o) {
        return function(e, t) {
            "string" != typeof e && (t = e, e = "*");
            var n, i = 0,
                r = e.toLowerCase().match(H) || [];
            if (v(t))
                for (; n = r[i++];) "+" === n[0] ? (n = n.slice(1) || "*", (o[n] = o[n] || []).unshift(t)) : (o[n] = o[n] || []).push(t)
        }
    }

    function zt(t, r, o, s) {
        var a = {},
            l = t === It;

        function c(e) {
            var i;
            return a[e] = !0, E.each(t[e] || [], function(e, t) {
                var n = t(r, o, s);
                return "string" != typeof n || l || a[n] ? l ? !(i = n) : void 0 : (r.dataTypes.unshift(n), c(n), !1)
            }), i
        }
        return c(r.dataTypes[0]) || !a["*"] && c("*")
    }

    function Yt(e, t) {
        var n, i, r = E.ajaxSettings.flatOptions || {};
        for (n in t) void 0 !== t[n] && ((r[n] ? e : i || (i = {}))[n] = t[n]);
        return i && E.extend(!0, e, i), e
    }
    Pt.href = xt.href, E.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: xt.href,
            type: "GET",
            isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(xt.protocol),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Ht,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /\bxml\b/,
                html: /\bhtml/,
                json: /\bjson\b/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": JSON.parse,
                "text xml": E.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(e, t) {
            return t ? Yt(Yt(e, E.ajaxSettings), t) : Yt(E.ajaxSettings, e)
        },
        ajaxPrefilter: jt(Lt),
        ajaxTransport: jt(It),
        ajax: function(e, t) {
            "object" == typeof e && (t = e, e = void 0), t = t || {};
            var u, h, d, n, f, i, p, m, r, o, g = E.ajaxSetup({}, t),
                y = g.context || g,
                v = g.context && (y.nodeType || y.jquery) ? E(y) : E.event,
                x = E.Deferred(),
                w = E.Callbacks("once memory"),
                _ = g.statusCode || {},
                s = {},
                a = {},
                l = "canceled",
                b = {
                    readyState: 0,
                    getResponseHeader: function(e) {
                        var t;
                        if (p) {
                            if (!n)
                                for (n = {}; t = Ot.exec(d);) n[t[1].toLowerCase()] = t[2];
                            t = n[e.toLowerCase()]
                        }
                        return null == t ? null : t
                    },
                    getAllResponseHeaders: function() {
                        return p ? d : null
                    },
                    setRequestHeader: function(e, t) {
                        return null == p && (e = a[e.toLowerCase()] = a[e.toLowerCase()] || e, s[e] = t), this
                    },
                    overrideMimeType: function(e) {
                        return null == p && (g.mimeType = e), this
                    },
                    statusCode: function(e) {
                        var t;
                        if (e)
                            if (p) b.always(e[b.status]);
                            else
                                for (t in e) _[t] = [_[t], e[t]];
                        return this
                    },
                    abort: function(e) {
                        var t = e || l;
                        return u && u.abort(t), c(0, t), this
                    }
                };
            if (x.promise(b), g.url = ((e || g.url || xt.href) + "").replace(Nt, xt.protocol + "//"), g.type = t.method || t.type || g.method || g.type, g.dataTypes = (g.dataType || "*").toLowerCase().match(H) || [""], null == g.crossDomain) {
                i = T.createElement("a");
                try {
                    i.href = g.url, i.href = i.href, g.crossDomain = Pt.protocol + "//" + Pt.host != i.protocol + "//" + i.host
                } catch (e) {
                    g.crossDomain = !0
                }
            }
            if (g.data && g.processData && "string" != typeof g.data && (g.data = E.param(g.data, g.traditional)), zt(Lt, g, t, b), p) return b;
            for (r in (m = E.event && g.global) && 0 == E.active++ && E.event.trigger("ajaxStart"), g.type = g.type.toUpperCase(), g.hasContent = !At.test(g.type), h = g.url.replace(Ct, ""), g.hasContent ? g.data && g.processData && 0 === (g.contentType || "").indexOf("application/x-www-form-urlencoded") && (g.data = g.data.replace(Mt, "+")) : (o = g.url.slice(h.length), g.data && (g.processData || "string" == typeof g.data) && (h += (_t.test(h) ? "&" : "?") + g.data, delete g.data), !1 === g.cache && (h = h.replace(Dt, "$1"), o = (_t.test(h) ? "&" : "?") + "_=" + wt++ + o), g.url = h + o), g.ifModified && (E.lastModified[h] && b.setRequestHeader("If-Modified-Since", E.lastModified[h]), E.etag[h] && b.setRequestHeader("If-None-Match", E.etag[h])), (g.data && g.hasContent && !1 !== g.contentType || t.contentType) && b.setRequestHeader("Content-Type", g.contentType), b.setRequestHeader("Accept", g.dataTypes[0] && g.accepts[g.dataTypes[0]] ? g.accepts[g.dataTypes[0]] + ("*" !== g.dataTypes[0] ? ", " + Ht + "; q=0.01" : "") : g.accepts["*"]), g.headers) b.setRequestHeader(r, g.headers[r]);
            if (g.beforeSend && (!1 === g.beforeSend.call(y, b, g) || p)) return b.abort();
            if (l = "abort", w.add(g.complete), b.done(g.success), b.fail(g.error), u = zt(It, g, t, b)) {
                if (b.readyState = 1, m && v.trigger("ajaxSend", [b, g]), p) return b;
                g.async && 0 < g.timeout && (f = S.setTimeout(function() {
                    b.abort("timeout")
                }, g.timeout));
                try {
                    p = !1, u.send(s, c)
                } catch (e) {
                    if (p) throw e;
                    c(-1, e)
                }
            } else c(-1, "No Transport");

            function c(e, t, n, i) {
                var r, o, s, a, l, c = t;
                p || (p = !0, f && S.clearTimeout(f), u = void 0, d = i || "", b.readyState = 0 < e ? 4 : 0, r = 200 <= e && e < 300 || 304 === e, n && (a = function(e, t, n) {
                    for (var i, r, o, s, a = e.contents, l = e.dataTypes;
                         "*" === l[0];) l.shift(), void 0 === i && (i = e.mimeType || t.getResponseHeader("Content-Type"));
                    if (i)
                        for (r in a)
                            if (a[r] && a[r].test(i)) {
                                l.unshift(r);
                                break
                            }
                    if (l[0] in n) o = l[0];
                    else {
                        for (r in n) {
                            if (!l[0] || e.converters[r + " " + l[0]]) {
                                o = r;
                                break
                            }
                            s || (s = r)
                        }
                        o = o || s
                    }
                    if (o) return o !== l[0] && l.unshift(o), n[o]
                }(g, b, n)), a = function(e, t, n, i) {
                    var r, o, s, a, l, c = {},
                        u = e.dataTypes.slice();
                    if (u[1])
                        for (s in e.converters) c[s.toLowerCase()] = e.converters[s];
                    for (o = u.shift(); o;)
                        if (e.responseFields[o] && (n[e.responseFields[o]] = t), !l && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), l = o, o = u.shift())
                            if ("*" === o) o = l;
                            else if ("*" !== l && l !== o) {
                                if (!(s = c[l + " " + o] || c["* " + o]))
                                    for (r in c)
                                        if ((a = r.split(" "))[1] === o && (s = c[l + " " + a[0]] || c["* " + a[0]])) {
                                            !0 === s ? s = c[r] : !0 !== c[r] && (o = a[0], u.unshift(a[1]));
                                            break
                                        }
                                if (!0 !== s)
                                    if (s && e.throws) t = s(t);
                                    else try {
                                        t = s(t)
                                    } catch (e) {
                                        return {
                                            state: "parsererror",
                                            error: s ? e : "No conversion from " + l + " to " + o
                                        }
                                    }
                            }
                    return {
                        state: "success",
                        data: t
                    }
                }(g, a, b, r), r ? (g.ifModified && ((l = b.getResponseHeader("Last-Modified")) && (E.lastModified[h] = l), (l = b.getResponseHeader("etag")) && (E.etag[h] = l)), 204 === e || "HEAD" === g.type ? c = "nocontent" : 304 === e ? c = "notmodified" : (c = a.state, o = a.data, r = !(s = a.error))) : (s = c, !e && c || (c = "error", e < 0 && (e = 0))), b.status = e, b.statusText = (t || c) + "", r ? x.resolveWith(y, [o, c, b]) : x.rejectWith(y, [b, c, s]), b.statusCode(_), _ = void 0, m && v.trigger(r ? "ajaxSuccess" : "ajaxError", [b, g, r ? o : s]), w.fireWith(y, [b, c]), m && (v.trigger("ajaxComplete", [b, g]), --E.active || E.event.trigger("ajaxStop")))
            }
            return b
        },
        getJSON: function(e, t, n) {
            return E.get(e, t, n, "json")
        },
        getScript: function(e, t) {
            return E.get(e, void 0, t, "script")
        }
    }), E.each(["get", "post"], function(e, r) {
        E[r] = function(e, t, n, i) {
            return v(t) && (i = i || n, n = t, t = void 0), E.ajax(E.extend({
                url: e,
                type: r,
                dataType: i,
                data: t,
                success: n
            }, E.isPlainObject(e) && e))
        }
    }), E._evalUrl = function(e) {
        return E.ajax({
            url: e,
            type: "GET",
            dataType: "script",
            cache: !0,
            async: !1,
            global: !1,
            throws: !0
        })
    }, E.fn.extend({
        wrapAll: function(e) {
            var t;
            return this[0] && (v(e) && (e = e.call(this[0])), t = E(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                for (var e = this; e.firstElementChild;) e = e.firstElementChild;
                return e
            }).append(this)), this
        },
        wrapInner: function(n) {
            return v(n) ? this.each(function(e) {
                E(this).wrapInner(n.call(this, e))
            }) : this.each(function() {
                var e = E(this),
                    t = e.contents();
                t.length ? t.wrapAll(n) : e.append(n)
            })
        },
        wrap: function(t) {
            var n = v(t);
            return this.each(function(e) {
                E(this).wrapAll(n ? t.call(this, e) : t)
            })
        },
        unwrap: function(e) {
            return this.parent(e).not("body").each(function() {
                E(this).replaceWith(this.childNodes)
            }), this
        }
    }), E.expr.pseudos.hidden = function(e) {
        return !E.expr.pseudos.visible(e)
    }, E.expr.pseudos.visible = function(e) {
        return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
    }, E.ajaxSettings.xhr = function() {
        try {
            return new S.XMLHttpRequest
        } catch (e) {}
    };
    var Rt = {
            0: 200,
            1223: 204
        },
        Wt = E.ajaxSettings.xhr();
    y.cors = !!Wt && "withCredentials" in Wt, y.ajax = Wt = !!Wt, E.ajaxTransport(function(r) {
        var o, s;
        if (y.cors || Wt && !r.crossDomain) return {
            send: function(e, t) {
                var n, i = r.xhr();
                if (i.open(r.type, r.url, r.async, r.username, r.password), r.xhrFields)
                    for (n in r.xhrFields) i[n] = r.xhrFields[n];
                for (n in r.mimeType && i.overrideMimeType && i.overrideMimeType(r.mimeType), r.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest"), e) i.setRequestHeader(n, e[n]);
                o = function(e) {
                    return function() {
                        o && (o = s = i.onload = i.onerror = i.onabort = i.ontimeout = i.onreadystatechange = null, "abort" === e ? i.abort() : "error" === e ? "number" != typeof i.status ? t(0, "error") : t(i.status, i.statusText) : t(Rt[i.status] || i.status, i.statusText, "text" !== (i.responseType || "text") || "string" != typeof i.responseText ? {
                            binary: i.response
                        } : {
                            text: i.responseText
                        }, i.getAllResponseHeaders()))
                    }
                }, i.onload = o(), s = i.onerror = i.ontimeout = o("error"), void 0 !== i.onabort ? i.onabort = s : i.onreadystatechange = function() {
                    4 === i.readyState && S.setTimeout(function() {
                        o && s()
                    })
                }, o = o("abort");
                try {
                    i.send(r.hasContent && r.data || null)
                } catch (e) {
                    if (o) throw e
                }
            },
            abort: function() {
                o && o()
            }
        }
    }), E.ajaxPrefilter(function(e) {
        e.crossDomain && (e.contents.script = !1)
    }), E.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /\b(?:java|ecma)script\b/
        },
        converters: {
            "text script": function(e) {
                return E.globalEval(e), e
            }
        }
    }), E.ajaxPrefilter("script", function(e) {
        void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
    }), E.ajaxTransport("script", function(n) {
        var i, r;
        if (n.crossDomain) return {
            send: function(e, t) {
                i = E("<script>").prop({
                    charset: n.scriptCharset,
                    src: n.url
                }).on("load error", r = function(e) {
                    i.remove(), r = null, e && t("error" === e.type ? 404 : 200, e.type)
                }), T.head.appendChild(i[0])
            },
            abort: function() {
                r && r()
            }
        }
    });
    var Ft, qt = [],
        Ut = /(=)\?(?=&|$)|\?\?/;
    E.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var e = qt.pop() || E.expando + "_" + wt++;
            return this[e] = !0, e
        }
    }), E.ajaxPrefilter("json jsonp", function(e, t, n) {
        var i, r, o, s = !1 !== e.jsonp && (Ut.test(e.url) ? "url" : "string" == typeof e.data && 0 === (e.contentType || "").indexOf("application/x-www-form-urlencoded") && Ut.test(e.data) && "data");
        if (s || "jsonp" === e.dataTypes[0]) return i = e.jsonpCallback = v(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, s ? e[s] = e[s].replace(Ut, "$1" + i) : !1 !== e.jsonp && (e.url += (_t.test(e.url) ? "&" : "?") + e.jsonp + "=" + i), e.converters["script json"] = function() {
            return o || E.error(i + " was not called"), o[0]
        }, e.dataTypes[0] = "json", r = S[i], S[i] = function() {
            o = arguments
        }, n.always(function() {
            void 0 === r ? E(S).removeProp(i) : S[i] = r, e[i] && (e.jsonpCallback = t.jsonpCallback, qt.push(i)), o && v(r) && r(o[0]), o = r = void 0
        }), "script"
    }), y.createHTMLDocument = ((Ft = T.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>", 2 === Ft.childNodes.length), E.parseHTML = function(e, t, n) {
        return "string" != typeof e ? [] : ("boolean" == typeof t && (n = t, t = !1), t || (y.createHTMLDocument ? ((i = (t = T.implementation.createHTMLDocument("")).createElement("base")).href = T.location.href, t.head.appendChild(i)) : t = T), o = !n && [], (r = C.exec(e)) ? [t.createElement(r[1])] : (r = ye([e], t, o), o && o.length && E(o).remove(), E.merge([], r.childNodes)));
        var i, r, o
    }, E.fn.load = function(e, t, n) {
        var i, r, o, s = this,
            a = e.indexOf(" ");
        return -1 < a && (i = ft(e.slice(a)), e = e.slice(0, a)), v(t) ? (n = t, t = void 0) : t && "object" == typeof t && (r = "POST"), 0 < s.length && E.ajax({
            url: e,
            type: r || "GET",
            dataType: "html",
            data: t
        }).done(function(e) {
            o = arguments, s.html(i ? E("<div>").append(E.parseHTML(e)).find(i) : e)
        }).always(n && function(e, t) {
            s.each(function() {
                n.apply(this, o || [e.responseText, t, e])
            })
        }), this
    }, E.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
        E.fn[t] = function(e) {
            return this.on(t, e)
        }
    }), E.expr.pseudos.animated = function(t) {
        return E.grep(E.timers, function(e) {
            return t === e.elem
        }).length
    }, E.offset = {
        setOffset: function(e, t, n) {
            var i, r, o, s, a, l, c = E.css(e, "position"),
                u = E(e),
                h = {};
            "static" === c && (e.style.position = "relative"), a = u.offset(), o = E.css(e, "top"), l = E.css(e, "left"), r = ("absolute" === c || "fixed" === c) && -1 < (o + l).indexOf("auto") ? (s = (i = u.position()).top, i.left) : (s = parseFloat(o) || 0, parseFloat(l) || 0), v(t) && (t = t.call(e, n, E.extend({}, a))), null != t.top && (h.top = t.top - a.top + s), null != t.left && (h.left = t.left - a.left + r), "using" in t ? t.using.call(e, h) : u.css(h)
        }
    }, E.fn.extend({
        offset: function(t) {
            if (arguments.length) return void 0 === t ? this : this.each(function(e) {
                E.offset.setOffset(this, t, e)
            });
            var e, n, i = this[0];
            return i ? i.getClientRects().length ? (e = i.getBoundingClientRect(), n = i.ownerDocument.defaultView, {
                top: e.top + n.pageYOffset,
                left: e.left + n.pageXOffset
            }) : {
                top: 0,
                left: 0
            } : void 0
        },
        position: function() {
            if (this[0]) {
                var e, t, n, i = this[0],
                    r = {
                        top: 0,
                        left: 0
                    };
                if ("fixed" === E.css(i, "position")) t = i.getBoundingClientRect();
                else {
                    for (t = this.offset(), n = i.ownerDocument, e = i.offsetParent || n.documentElement; e && (e === n.body || e === n.documentElement) && "static" === E.css(e, "position");) e = e.parentNode;
                    e && e !== i && 1 === e.nodeType && ((r = E(e).offset()).top += E.css(e, "borderTopWidth", !0), r.left += E.css(e, "borderLeftWidth", !0))
                }
                return {
                    top: t.top - r.top - E.css(i, "marginTop", !0),
                    left: t.left - r.left - E.css(i, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                for (var e = this.offsetParent; e && "static" === E.css(e, "position");) e = e.offsetParent;
                return e || ve
            })
        }
    }), E.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    }, function(t, r) {
        var o = "pageYOffset" === r;
        E.fn[t] = function(e) {
            return F(this, function(e, t, n) {
                var i;
                if (x(e) ? i = e : 9 === e.nodeType && (i = e.defaultView), void 0 === n) return i ? i[r] : e[t];
                i ? i.scrollTo(o ? i.pageXOffset : n, o ? n : i.pageYOffset) : e[t] = n
            }, t, e, arguments.length)
        }
    }), E.each(["top", "left"], function(e, n) {
        E.cssHooks[n] = Re(y.pixelPosition, function(e, t) {
            if (t) return t = Ye(e, n), Pe.test(t) ? E(e).position()[n] + "px" : t
        })
    }), E.each({
        Height: "height",
        Width: "width"
    }, function(s, a) {
        E.each({
            padding: "inner" + s,
            content: a,
            "": "outer" + s
        }, function(i, o) {
            E.fn[o] = function(e, t) {
                var n = arguments.length && (i || "boolean" != typeof e),
                    r = i || (!0 === e || !0 === t ? "margin" : "border");
                return F(this, function(e, t, n) {
                    var i;
                    return x(e) ? 0 === o.indexOf("outer") ? e["inner" + s] : e.document.documentElement["client" + s] : 9 === e.nodeType ? (i = e.documentElement, Math.max(e.body["scroll" + s], i["scroll" + s], e.body["offset" + s], i["offset" + s], i["client" + s])) : void 0 === n ? E.css(e, t, r) : E.style(e, t, n, r)
                }, a, n ? e : void 0, n)
            }
        })
    }), E.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function(e, n) {
        E.fn[n] = function(e, t) {
            return 0 < arguments.length ? this.on(n, null, e, t) : this.trigger(n)
        }
    }), E.fn.extend({
        hover: function(e, t) {
            return this.mouseenter(e).mouseleave(t || e)
        }
    }), E.fn.extend({
        bind: function(e, t, n) {
            return this.on(e, null, t, n)
        },
        unbind: function(e, t) {
            return this.off(e, null, t)
        },
        delegate: function(e, t, n, i) {
            return this.on(t, e, n, i)
        },
        undelegate: function(e, t, n) {
            return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
        }
    }), E.proxy = function(e, t) {
        var n, i, r;
        if ("string" == typeof t && (n = e[t], t = e, e = n), v(e)) return i = a.call(arguments, 2), (r = function() {
            return e.apply(t || this, i.concat(a.call(arguments)))
        }).guid = e.guid = e.guid || E.guid++, r
    }, E.holdReady = function(e) {
        e ? E.readyWait++ : E.ready(!0)
    }, E.isArray = Array.isArray, E.parseJSON = JSON.parse, E.nodeName = M, E.isFunction = v, E.isWindow = x, E.camelCase = B, E.type = _, E.now = Date.now, E.isNumeric = function(e) {
        var t = E.type(e);
        return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
    }, "function" == typeof define && define.amd && define("jquery", [], function() {
        return E
    });
    var Vt = S.jQuery,
        Bt = S.$;
    return E.noConflict = function(e) {
        return S.$ === E && (S.$ = Bt), e && S.jQuery === E && (S.jQuery = Vt), E
    }, e || (S.jQuery = S.$ = E), E
}),
    function(e, t) {
        "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.Popper = t()
    }(this, function() {
        "use strict";

        function s(e) {
            return e && "[object Function]" === {}.toString.call(e)
        }

        function w(e, t) {
            if (1 !== e.nodeType) return [];
            var n = getComputedStyle(e, null);
            return t ? n[t] : n
        }

        function v(e) {
            return "HTML" === e.nodeName ? e : e.parentNode || e.host
        }

        function x(e) {
            if (!e) return document.body;
            switch (e.nodeName) {
                case "HTML":
                case "BODY":
                    return e.ownerDocument.body;
                case "#document":
                    return e.body
            }
            var t = w(e),
                n = t.overflow,
                i = t.overflowX,
                r = t.overflowY;
            return /(auto|scroll)/.test(n + r + i) ? e : x(v(e))
        }

        function _(e) {
            var t = e && e.offsetParent,
                n = t && t.nodeName;
            return n && "BODY" !== n && "HTML" !== n ? -1 !== ["TD", "TABLE"].indexOf(t.nodeName) && "static" === w(t, "position") ? _(t) : t : e ? e.ownerDocument.documentElement : document.documentElement
        }

        function u(e) {
            return null === e.parentNode ? e : u(e.parentNode)
        }

        function b(e, t) {
            if (!(e && e.nodeType && t && t.nodeType)) return document.documentElement;
            var n = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
                i = n ? e : t,
                r = n ? t : e,
                o = document.createRange();
            o.setStart(i, 0), o.setEnd(r, 0);
            var s, a, l = o.commonAncestorContainer;
            if (e !== l && t !== l || i.contains(r)) return "BODY" === (a = (s = l).nodeName) || "HTML" !== a && _(s.firstElementChild) !== s ? _(l) : l;
            var c = u(e);
            return c.host ? b(c.host, t) : b(e, u(t).host)
        }

        function S(e) {
            var t = "top" === (1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "top") ? "scrollTop" : "scrollLeft",
                n = e.nodeName;
            if ("BODY" !== n && "HTML" !== n) return e[t];
            var i = e.ownerDocument.documentElement;
            return (e.ownerDocument.scrollingElement || i)[t]
        }

        function h(e, t) {
            var n = "x" === t ? "Left" : "Top",
                i = "Left" == n ? "Right" : "Bottom";
            return parseFloat(e["border" + n + "Width"], 10) + parseFloat(e["border" + i + "Width"], 10)
        }

        function i(e, t, n, i) {
            return j(t["offset" + e], t["scroll" + e], n["client" + e], n["offset" + e], n["scroll" + e], W() ? n["offset" + e] + i["margin" + ("Height" === e ? "Top" : "Left")] + i["margin" + ("Height" === e ? "Bottom" : "Right")] : 0)
        }

        function T() {
            var e = document.body,
                t = document.documentElement,
                n = W() && getComputedStyle(t);
            return {
                height: i("Height", e, t, n),
                width: i("Width", e, t, n)
            }
        }

        function E(e) {
            return U({}, e, {
                right: e.left + e.width,
                bottom: e.top + e.height
            })
        }

        function k(e) {
            var t = {};
            if (W()) try {
                t = e.getBoundingClientRect();
                var n = S(e, "top"),
                    i = S(e, "left");
                t.top += n, t.left += i, t.bottom += n, t.right += i
            } catch (e) {} else t = e.getBoundingClientRect();
            var r = {
                    left: t.left,
                    top: t.top,
                    width: t.right - t.left,
                    height: t.bottom - t.top
                },
                o = "HTML" === e.nodeName ? T() : {},
                s = o.width || e.clientWidth || r.right - r.left,
                a = o.height || e.clientHeight || r.bottom - r.top,
                l = e.offsetWidth - s,
                c = e.offsetHeight - a;
            if (l || c) {
                var u = w(e);
                l -= h(u, "x"), c -= h(u, "y"), r.width -= l, r.height -= c
            }
            return E(r)
        }

        function M(e, t) {
            var n = W(),
                i = "HTML" === t.nodeName,
                r = k(e),
                o = k(t),
                s = x(e),
                a = w(t),
                l = parseFloat(a.borderTopWidth, 10),
                c = parseFloat(a.borderLeftWidth, 10),
                u = E({
                    top: r.top - o.top - l,
                    left: r.left - o.left - c,
                    width: r.width,
                    height: r.height
                });
            if (u.marginTop = 0, u.marginLeft = 0, !n && i) {
                var h = parseFloat(a.marginTop, 10),
                    d = parseFloat(a.marginLeft, 10);
                u.top -= l - h, u.bottom -= l - h, u.left -= c - d, u.right -= c - d, u.marginTop = h, u.marginLeft = d
            }
            return (n ? t.contains(s) : t === s && "BODY" !== s.nodeName) && (u = function(e, t) {
                var n = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
                    i = S(t, "top"),
                    r = S(t, "left"),
                    o = n ? -1 : 1;
                return e.top += i * o, e.bottom += i * o, e.left += r * o, e.right += r * o, e
            }(u, t)), u
        }

        function d(e, t, n, i) {
            var r, o, s, a, l, c, u, h = {
                    top: 0,
                    left: 0
                },
                d = b(e, t);
            if ("viewport" === i) o = (r = d).ownerDocument.documentElement, s = M(r, o), a = j(o.clientWidth, window.innerWidth || 0), l = j(o.clientHeight, window.innerHeight || 0), c = S(o), u = S(o, "left"), h = E({
                top: c - s.top + s.marginTop,
                left: u - s.left + s.marginLeft,
                width: a,
                height: l
            });
            else {
                var f;
                "scrollParent" === i ? "BODY" === (f = x(v(t))).nodeName && (f = e.ownerDocument.documentElement) : f = "window" === i ? e.ownerDocument.documentElement : i;
                var p = M(f, d);
                if ("HTML" !== f.nodeName || function e(t) {
                    var n = t.nodeName;
                    return "BODY" !== n && "HTML" !== n && ("fixed" === w(t, "position") || e(v(t)))
                }(d)) h = p;
                else {
                    var m = T(),
                        g = m.height,
                        y = m.width;
                    h.top += p.top - p.marginTop, h.bottom = g + p.top, h.left += p.left - p.marginLeft, h.right = y + p.left
                }
            }
            return h.left += n, h.top += n, h.right -= n, h.bottom -= n, h
        }

        function a(e, t, i, n, r) {
            var o = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
            if (-1 === e.indexOf("auto")) return e;
            var s = d(i, n, o, r),
                a = {
                    top: {
                        width: s.width,
                        height: t.top - s.top
                    },
                    right: {
                        width: s.right - t.right,
                        height: s.height
                    },
                    bottom: {
                        width: s.width,
                        height: s.bottom - t.bottom
                    },
                    left: {
                        width: t.left - s.left,
                        height: s.height
                    }
                },
                l = Object.keys(a).map(function(e) {
                    return U({
                        key: e
                    }, a[e], {
                        area: (t = a[e], t.width * t.height)
                    });
                    var t
                }).sort(function(e, t) {
                    return t.area - e.area
                }),
                c = l.filter(function(e) {
                    var t = e.width,
                        n = e.height;
                    return t >= i.clientWidth && n >= i.clientHeight
                }),
                u = 0 < c.length ? c[0].key : l[0].key,
                h = e.split("-")[1];
            return u + (h ? "-" + h : "")
        }

        function l(e, t, n) {
            return M(n, b(t, n))
        }

        function C(e) {
            var t = getComputedStyle(e),
                n = parseFloat(t.marginTop) + parseFloat(t.marginBottom),
                i = parseFloat(t.marginLeft) + parseFloat(t.marginRight);
            return {
                width: e.offsetWidth + i,
                height: e.offsetHeight + n
            }
        }

        function D(e) {
            var t = {
                left: "right",
                right: "left",
                bottom: "top",
                top: "bottom"
            };
            return e.replace(/left|right|bottom|top/g, function(e) {
                return t[e]
            })
        }

        function O(e, t, n) {
            n = n.split("-")[0];
            var i = C(e),
                r = {
                    width: i.width,
                    height: i.height
                },
                o = -1 !== ["right", "left"].indexOf(n),
                s = o ? "top" : "left",
                a = o ? "left" : "top",
                l = o ? "height" : "width",
                c = o ? "width" : "height";
            return r[s] = t[s] + t[l] / 2 - i[l] / 2, r[a] = n === a ? t[a] - i[c] : t[D(a)], r
        }

        function A(e, t) {
            return Array.prototype.find ? e.find(t) : e.filter(t)[0]
        }

        function N(e, n, t) {
            return (void 0 === t ? e : e.slice(0, function(e, t, n) {
                if (Array.prototype.findIndex) return e.findIndex(function(e) {
                    return e[t] === n
                });
                var i = A(e, function(e) {
                    return e[t] === n
                });
                return e.indexOf(i)
            }(e, "name", t))).forEach(function(e) {
                e.function && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
                var t = e.function || e.fn;
                e.enabled && s(t) && (n.offsets.popper = E(n.offsets.popper), n.offsets.reference = E(n.offsets.reference), n = t(n, e))
            }), n
        }

        function e(e, n) {
            return e.some(function(e) {
                var t = e.name;
                return e.enabled && t === n
            })
        }

        function L(e) {
            for (var t = [!1, "ms", "Webkit", "Moz", "O"], n = e.charAt(0).toUpperCase() + e.slice(1), i = 0; i < t.length - 1; i++) {
                var r = t[i],
                    o = r ? "" + r + n : e;
                if (void 0 !== document.body.style[o]) return o
            }
            return null
        }

        function o(e) {
            var t = e.ownerDocument;
            return t ? t.defaultView : window
        }

        function t(e, t, n, i) {
            n.updateBound = i, o(e).addEventListener("resize", n.updateBound, {
                passive: !0
            });
            var r = x(e);
            return function e(t, n, i, r) {
                var o = "BODY" === t.nodeName,
                    s = o ? t.ownerDocument.defaultView : t;
                s.addEventListener(n, i, {
                    passive: !0
                }), o || e(x(s.parentNode), n, i, r), r.push(s)
            }(r, "scroll", n.updateBound, n.scrollParents), n.scrollElement = r, n.eventsEnabled = !0, n
        }

        function n() {
            var e, t;
            this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = (e = this.reference, t = this.state, o(e).removeEventListener("resize", t.updateBound), t.scrollParents.forEach(function(e) {
                e.removeEventListener("scroll", t.updateBound)
            }), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t))
        }

        function f(e) {
            return "" !== e && !isNaN(parseFloat(e)) && isFinite(e)
        }

        function c(n, i) {
            Object.keys(i).forEach(function(e) {
                var t = ""; - 1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(e) && f(i[e]) && (t = "px"), n.style[e] = i[e] + t
            })
        }

        function I(e, t, n) {
            var i = A(e, function(e) {
                    return e.name === t
                }),
                r = !!i && e.some(function(e) {
                    return e.name === n && e.enabled && e.order < i.order
                });
            if (!r) {
                var o = "`" + t + "`";
                console.warn("`" + n + "` modifier is required by " + o + " modifier in order to work, be sure to include it before " + o + "!")
            }
            return r
        }

        function r(e) {
            var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
                n = B.indexOf(e),
                i = B.slice(n + 1).concat(B.slice(0, n));
            return t ? i.reverse() : i
        }

        function p(e, r, o, t) {
            var s = [0, 0],
                a = -1 !== ["right", "left"].indexOf(t),
                n = e.split(/(\+|\-)/).map(function(e) {
                    return e.trim()
                }),
                i = n.indexOf(A(n, function(e) {
                    return -1 !== e.search(/,|\s/)
                }));
            n[i] && -1 === n[i].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.");
            var l = /\s*,\s*|\s+/,
                c = -1 === i ? [n] : [n.slice(0, i).concat([n[i].split(l)[0]]), [n[i].split(l)[1]].concat(n.slice(i + 1))];
            return (c = c.map(function(e, t) {
                var n = (1 === t ? !a : a) ? "height" : "width",
                    i = !1;
                return e.reduce(function(e, t) {
                    return "" === e[e.length - 1] && -1 !== ["+", "-"].indexOf(t) ? (e[e.length - 1] = t, i = !0, e) : i ? (e[e.length - 1] += t, i = !1, e) : e.concat(t)
                }, []).map(function(e) {
                    return function(e, t, n, i) {
                        var r, o = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                            s = +o[1],
                            a = o[2];
                        if (!s) return e;
                        if (0 !== a.indexOf("%")) return "vh" !== a && "vw" !== a ? s : ("vh" === a ? j(document.documentElement.clientHeight, window.innerHeight || 0) : j(document.documentElement.clientWidth, window.innerWidth || 0)) / 100 * s;
                        switch (a) {
                            case "%p":
                                r = n;
                                break;
                            case "%":
                            case "%r":
                            default:
                                r = i
                        }
                        return E(r)[t] / 100 * s
                    }(e, n, r, o)
                })
            })).forEach(function(n, i) {
                n.forEach(function(e, t) {
                    f(e) && (s[i] += e * ("-" === n[t - 1] ? -1 : 1))
                })
            }), s
        }
        for (var H = Math.min, P = Math.floor, j = Math.max, m = "undefined" != typeof window && "undefined" != typeof document, g = ["Edge", "Trident", "Firefox"], y = 0, z = 0; z < g.length; z += 1)
            if (m && 0 <= navigator.userAgent.indexOf(g[z])) {
                y = 1;
                break
            }
        var Y, R = m && window.Promise ? function(e) {
                var t = !1;
                return function() {
                    t || (t = !0, window.Promise.resolve().then(function() {
                        t = !1, e()
                    }))
                }
            } : function(e) {
                var t = !1;
                return function() {
                    t || (t = !0, setTimeout(function() {
                        t = !1, e()
                    }, y))
                }
            },
            W = function() {
                return null == Y && (Y = -1 !== navigator.appVersion.indexOf("MSIE 10")), Y
            },
            F = function() {
                function i(e, t) {
                    for (var n, i = 0; i < t.length; i++)(n = t[i]).enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
                return function(e, t, n) {
                    return t && i(e.prototype, t), n && i(e, n), e
                }
            }(),
            q = function(e, t, n) {
                return t in e ? Object.defineProperty(e, t, {
                    value: n,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = n, e
            },
            U = Object.assign || function(e) {
                for (var t, n = 1; n < arguments.length; n++)
                    for (var i in t = arguments[n]) Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
                return e
            },
            V = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
            B = V.slice(3),
            G = "flip",
            X = "clockwise",
            $ = "counterclockwise",
            K = function() {
                function o(e, t) {
                    var n = this,
                        i = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {};
                    (function(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    })(this, o), this.scheduleUpdate = function() {
                        return requestAnimationFrame(n.update)
                    }, this.update = R(this.update.bind(this)), this.options = U({}, o.Defaults, i), this.state = {
                        isDestroyed: !1,
                        isCreated: !1,
                        scrollParents: []
                    }, this.reference = e && e.jquery ? e[0] : e, this.popper = t && t.jquery ? t[0] : t, this.options.modifiers = {}, Object.keys(U({}, o.Defaults.modifiers, i.modifiers)).forEach(function(e) {
                        n.options.modifiers[e] = U({}, o.Defaults.modifiers[e] || {}, i.modifiers ? i.modifiers[e] : {})
                    }), this.modifiers = Object.keys(this.options.modifiers).map(function(e) {
                        return U({
                            name: e
                        }, n.options.modifiers[e])
                    }).sort(function(e, t) {
                        return e.order - t.order
                    }), this.modifiers.forEach(function(e) {
                        e.enabled && s(e.onLoad) && e.onLoad(n.reference, n.popper, n.options, e, n.state)
                    }), this.update();
                    var r = this.options.eventsEnabled;
                    r && this.enableEventListeners(), this.state.eventsEnabled = r
                }
                return F(o, [{
                    key: "update",
                    value: function() {
                        return function() {
                            if (!this.state.isDestroyed) {
                                var e = {
                                    instance: this,
                                    styles: {},
                                    arrowStyles: {},
                                    attributes: {},
                                    flipped: !1,
                                    offsets: {}
                                };
                                e.offsets.reference = l(this.state, this.popper, this.reference), e.placement = a(this.options.placement, e.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding), e.originalPlacement = e.placement, e.offsets.popper = O(this.popper, e.offsets.reference, e.placement), e.offsets.popper.position = "absolute", e = N(this.modifiers, e), this.state.isCreated ? this.options.onUpdate(e) : (this.state.isCreated = !0, this.options.onCreate(e))
                            }
                        }.call(this)
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        return function() {
                            return this.state.isDestroyed = !0, e(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.left = "", this.popper.style.position = "", this.popper.style.top = "", this.popper.style[L("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
                        }.call(this)
                    }
                }, {
                    key: "enableEventListeners",
                    value: function() {
                        return function() {
                            this.state.eventsEnabled || (this.state = t(this.reference, this.options, this.state, this.scheduleUpdate))
                        }.call(this)
                    }
                }, {
                    key: "disableEventListeners",
                    value: function() {
                        return n.call(this)
                    }
                }]), o
            }();
        return K.Utils = ("undefined" == typeof window ? global : window).PopperUtils, K.placements = V, K.Defaults = {
            placement: "bottom",
            eventsEnabled: !0,
            removeOnDestroy: !1,
            onCreate: function() {},
            onUpdate: function() {},
            modifiers: {
                shift: {
                    order: 100,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            i = t.split("-")[1];
                        if (i) {
                            var r = e.offsets,
                                o = r.reference,
                                s = r.popper,
                                a = -1 !== ["bottom", "top"].indexOf(n),
                                l = a ? "left" : "top",
                                c = a ? "width" : "height",
                                u = {
                                    start: q({}, l, o[l]),
                                    end: q({}, l, o[l] + o[c] - s[c])
                                };
                            e.offsets.popper = U({}, s, u[i])
                        }
                        return e
                    }
                },
                offset: {
                    order: 200,
                    enabled: !0,
                    fn: function(e, t) {
                        var n, i = t.offset,
                            r = e.placement,
                            o = e.offsets,
                            s = o.popper,
                            a = o.reference,
                            l = r.split("-")[0];
                        return n = f(+i) ? [+i, 0] : p(i, s, a, l), "left" === l ? (s.top += n[0], s.left -= n[1]) : "right" === l ? (s.top += n[0], s.left += n[1]) : "top" === l ? (s.left += n[0], s.top -= n[1]) : "bottom" === l && (s.left += n[0], s.top += n[1]), e.popper = s, e
                    },
                    offset: 0
                },
                preventOverflow: {
                    order: 300,
                    enabled: !0,
                    fn: function(e, i) {
                        var t = i.boundariesElement || _(e.instance.popper);
                        e.instance.reference === t && (t = _(t));
                        var r = d(e.instance.popper, e.instance.reference, i.padding, t);
                        i.boundaries = r;
                        var n = i.priority,
                            o = e.offsets.popper,
                            s = {
                                primary: function(e) {
                                    var t = o[e];
                                    return o[e] < r[e] && !i.escapeWithReference && (t = j(o[e], r[e])), q({}, e, t)
                                },
                                secondary: function(e) {
                                    var t = "right" === e ? "left" : "top",
                                        n = o[t];
                                    return o[e] > r[e] && !i.escapeWithReference && (n = H(o[t], r[e] - ("right" === e ? o.width : o.height))), q({}, t, n)
                                }
                            };
                        return n.forEach(function(e) {
                            var t = -1 === ["left", "top"].indexOf(e) ? "secondary" : "primary";
                            o = U({}, o, s[t](e))
                        }), e.offsets.popper = o, e
                    },
                    priority: ["left", "right", "top", "bottom"],
                    padding: 5,
                    boundariesElement: "scrollParent"
                },
                keepTogether: {
                    order: 400,
                    enabled: !0,
                    fn: function(e) {
                        var t = e.offsets,
                            n = t.popper,
                            i = t.reference,
                            r = e.placement.split("-")[0],
                            o = P,
                            s = -1 !== ["top", "bottom"].indexOf(r),
                            a = s ? "right" : "bottom",
                            l = s ? "left" : "top",
                            c = s ? "width" : "height";
                        return n[a] < o(i[l]) && (e.offsets.popper[l] = o(i[l]) - n[c]), n[l] > o(i[a]) && (e.offsets.popper[l] = o(i[a])), e
                    }
                },
                arrow: {
                    order: 500,
                    enabled: !0,
                    fn: function(e, t) {
                        var n;
                        if (!I(e.instance.modifiers, "arrow", "keepTogether")) return e;
                        var i = t.element;
                        if ("string" == typeof i) {
                            if (!(i = e.instance.popper.querySelector(i))) return e
                        } else if (!e.instance.popper.contains(i)) return console.warn("WARNING: `arrow.element` must be child of its popper element!"), e;
                        var r = e.placement.split("-")[0],
                            o = e.offsets,
                            s = o.popper,
                            a = o.reference,
                            l = -1 !== ["left", "right"].indexOf(r),
                            c = l ? "height" : "width",
                            u = l ? "Top" : "Left",
                            h = u.toLowerCase(),
                            d = l ? "left" : "top",
                            f = l ? "bottom" : "right",
                            p = C(i)[c];
                        a[f] - p < s[h] && (e.offsets.popper[h] -= s[h] - (a[f] - p)), a[h] + p > s[f] && (e.offsets.popper[h] += a[h] + p - s[f]), e.offsets.popper = E(e.offsets.popper);
                        var m = a[h] + a[c] / 2 - p / 2,
                            g = w(e.instance.popper),
                            y = parseFloat(g["margin" + u], 10),
                            v = parseFloat(g["border" + u + "Width"], 10),
                            x = m - e.offsets.popper[h] - y - v;
                        return x = j(H(s[c] - p, x), 0), e.arrowElement = i, e.offsets.arrow = (q(n = {}, h, Math.round(x)), q(n, d, ""), n), e
                    },
                    element: "[x-arrow]"
                },
                flip: {
                    order: 600,
                    enabled: !0,
                    fn: function(p, m) {
                        if (e(p.instance.modifiers, "inner")) return p;
                        if (p.flipped && p.placement === p.originalPlacement) return p;
                        var g = d(p.instance.popper, p.instance.reference, m.padding, m.boundariesElement),
                            y = p.placement.split("-")[0],
                            v = D(y),
                            x = p.placement.split("-")[1] || "",
                            w = [];
                        switch (m.behavior) {
                            case G:
                                w = [y, v];
                                break;
                            case X:
                                w = r(y);
                                break;
                            case $:
                                w = r(y, !0);
                                break;
                            default:
                                w = m.behavior
                        }
                        return w.forEach(function(e, t) {
                            if (y !== e || w.length === t + 1) return p;
                            y = p.placement.split("-")[0], v = D(y);
                            var n, i = p.offsets.popper,
                                r = p.offsets.reference,
                                o = P,
                                s = "left" === y && o(i.right) > o(r.left) || "right" === y && o(i.left) < o(r.right) || "top" === y && o(i.bottom) > o(r.top) || "bottom" === y && o(i.top) < o(r.bottom),
                                a = o(i.left) < o(g.left),
                                l = o(i.right) > o(g.right),
                                c = o(i.top) < o(g.top),
                                u = o(i.bottom) > o(g.bottom),
                                h = "left" === y && a || "right" === y && l || "top" === y && c || "bottom" === y && u,
                                d = -1 !== ["top", "bottom"].indexOf(y),
                                f = !!m.flipVariations && (d && "start" === x && a || d && "end" === x && l || !d && "start" === x && c || !d && "end" === x && u);
                            (s || h || f) && (p.flipped = !0, (s || h) && (y = w[t + 1]), f && (x = "end" === (n = x) ? "start" : "start" === n ? "end" : n), p.placement = y + (x ? "-" + x : ""), p.offsets.popper = U({}, p.offsets.popper, O(p.instance.popper, p.offsets.reference, p.placement)), p = N(p.instance.modifiers, p, "flip"))
                        }), p
                    },
                    behavior: "flip",
                    padding: 5,
                    boundariesElement: "viewport"
                },
                inner: {
                    order: 700,
                    enabled: !1,
                    fn: function(e) {
                        var t = e.placement,
                            n = t.split("-")[0],
                            i = e.offsets,
                            r = i.popper,
                            o = i.reference,
                            s = -1 !== ["left", "right"].indexOf(n),
                            a = -1 === ["top", "left"].indexOf(n);
                        return r[s ? "left" : "top"] = o[n] - (a ? r[s ? "width" : "height"] : 0), e.placement = D(t), e.offsets.popper = E(r), e
                    }
                },
                hide: {
                    order: 800,
                    enabled: !0,
                    fn: function(e) {
                        if (!I(e.instance.modifiers, "hide", "preventOverflow")) return e;
                        var t = e.offsets.reference,
                            n = A(e.instance.modifiers, function(e) {
                                return "preventOverflow" === e.name
                            }).boundaries;
                        if (t.bottom < n.top || t.left > n.right || t.top > n.bottom || t.right < n.left) {
                            if (!0 === e.hide) return e;
                            e.hide = !0, e.attributes["x-out-of-boundaries"] = ""
                        } else {
                            if (!1 === e.hide) return e;
                            e.hide = !1, e.attributes["x-out-of-boundaries"] = !1
                        }
                        return e
                    }
                },
                computeStyle: {
                    order: 850,
                    enabled: !0,
                    fn: function(e, t) {
                        var n = t.x,
                            i = t.y,
                            r = e.offsets.popper,
                            o = A(e.instance.modifiers, function(e) {
                                return "applyStyle" === e.name
                            }).gpuAcceleration;
                        void 0 !== o && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");
                        var s, a, l = void 0 === o ? t.gpuAcceleration : o,
                            c = k(_(e.instance.popper)),
                            u = {
                                position: r.position
                            },
                            h = {
                                left: P(r.left),
                                top: P(r.top),
                                bottom: P(r.bottom),
                                right: P(r.right)
                            },
                            d = "bottom" === n ? "top" : "bottom",
                            f = "right" === i ? "left" : "right",
                            p = L("transform");
                        if (a = "bottom" == d ? -c.height + h.bottom : h.top, s = "right" == f ? -c.width + h.right : h.left, l && p) u[p] = "translate3d(" + s + "px, " + a + "px, 0)", u[d] = 0, u[f] = 0, u.willChange = "transform";
                        else {
                            var m = "bottom" == d ? -1 : 1,
                                g = "right" == f ? -1 : 1;
                            u[d] = a * m, u[f] = s * g, u.willChange = d + ", " + f
                        }
                        var y = {
                            "x-placement": e.placement
                        };
                        return e.attributes = U({}, y, e.attributes), e.styles = U({}, u, e.styles), e.arrowStyles = U({}, e.offsets.arrow, e.arrowStyles), e
                    },
                    gpuAcceleration: !0,
                    x: "bottom",
                    y: "right"
                },
                applyStyle: {
                    order: 900,
                    enabled: !0,
                    fn: function(e) {
                        return c(e.instance.popper, e.styles), t = e.instance.popper, n = e.attributes, Object.keys(n).forEach(function(e) {
                            !1 === n[e] ? t.removeAttribute(e) : t.setAttribute(e, n[e])
                        }), e.arrowElement && Object.keys(e.arrowStyles).length && c(e.arrowElement, e.arrowStyles), e;
                        var t, n
                    },
                    onLoad: function(e, t, n, i, r) {
                        var o = l(0, t, e),
                            s = a(n.placement, o, t, e, n.modifiers.flip.boundariesElement, n.modifiers.flip.padding);
                        return t.setAttribute("x-placement", s), c(t, {
                            position: "absolute"
                        }), n
                    },
                    gpuAcceleration: void 0
                }
            }
        }, K
    }),
    function(e, t) {
        "object" == typeof exports && "undefined" != typeof module ? module.exports = t(require("popper.js")) : "function" == typeof define && define.amd ? define(["popper.js"], t) : e.Tooltip = t(e.Popper)
    }(this, function(o) {
        "use strict";
        o = o && "default" in o ? o.default : o;
        var e = function() {
                function i(e, t) {
                    for (var n, i = 0; i < t.length; i++)(n = t[i]).enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
                return function(e, t, n) {
                    return t && i(e.prototype, t), n && i(e, n), e
                }
            }(),
            s = Object.assign || function(e) {
                for (var t, n = 1; n < arguments.length; n++)
                    for (var i in t = arguments[n]) Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
                return e
            },
            r = {
                container: !1,
                delay: 0,
                html: !1,
                placement: "top",
                title: "",
                template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
                trigger: "hover focus",
                offset: 0
            },
            t = function() {
                function i(e, t) {
                    (function(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    })(this, i), a.call(this), t = s({}, r, t), e.jquery && (e = e[0]), this.reference = e;
                    var n = "string" == typeof(this.options = t).trigger ? t.trigger.split(" ").filter(function(e) {
                        return -1 !== ["click", "hover", "focus"].indexOf(e)
                    }) : [];
                    this._isOpen = !1, this._popperOptions = {}, this._setEventListeners(e, n, t)
                }
                return e(i, [{
                    key: "_create",
                    value: function(e, t, n, i) {
                        var r = window.document.createElement("div");
                        r.innerHTML = t.trim();
                        var o = r.childNodes[0];
                        o.id = "tooltip_" + Math.random().toString(36).substr(2, 10), o.setAttribute("aria-hidden", "false");
                        var s, a = r.querySelector(this.innerSelector);
                        if (1 === n.nodeType || 11 === n.nodeType) i && a.appendChild(n);
                        else if ((s = n) && "[object Function]" === {}.toString.call(s)) {
                            var l = n.call(e);
                            i ? a.innerHTML = l : a.innerText = l
                        } else i ? a.innerHTML = n : a.innerText = n;
                        return o
                    }
                }, {
                    key: "_show",
                    value: function(e, t) {
                        if (this._isOpen && !this._isOpening) return this;
                        if (this._isOpen = !0, this._tooltipNode) return this._tooltipNode.style.display = "", this._tooltipNode.setAttribute("aria-hidden", "false"), this.popperInstance.update(), this;
                        var n = e.getAttribute("title") || t.title;
                        if (!n) return this;
                        var i = this._create(e, t.template, n, t.html);
                        e.setAttribute("aria-describedby", i.id);
                        var r = this._findContainer(t.container, e);
                        return this._append(i, r), this._popperOptions = s({}, t.popperOptions, {
                            placement: t.placement
                        }), this._popperOptions.modifiers = s({}, this._popperOptions.modifiers, {
                            arrow: {
                                element: this.arrowSelector
                            },
                            offset: {
                                offset: t.offset
                            }
                        }), t.boundariesElement && (this._popperOptions.modifiers.preventOverflow = {
                            boundariesElement: t.boundariesElement
                        }), this.popperInstance = new o(e, i, this._popperOptions), this._tooltipNode = i, this
                    }
                }, {
                    key: "_hide",
                    value: function() {
                        return this._isOpen && (this._isOpen = !1, this._tooltipNode.style.display = "none", this._tooltipNode.setAttribute("aria-hidden", "true")), this
                    }
                }, {
                    key: "_dispose",
                    value: function() {
                        var i = this;
                        return this._events.forEach(function(e) {
                            var t = e.func,
                                n = e.event;
                            i.reference.removeEventListener(n, t)
                        }), this._events = [], this._tooltipNode && (this._hide(), this.popperInstance.destroy(), !this.popperInstance.options.removeOnDestroy && (this._tooltipNode.parentNode.removeChild(this._tooltipNode), this._tooltipNode = null)), this
                    }
                }, {
                    key: "_findContainer",
                    value: function(e, t) {
                        return "string" == typeof e ? e = window.document.querySelector(e) : !1 === e && (e = t.parentNode), e
                    }
                }, {
                    key: "_append",
                    value: function(e, t) {
                        t.appendChild(e)
                    }
                }, {
                    key: "_setEventListeners",
                    value: function(n, e, i) {
                        var r = this,
                            t = [],
                            o = [];
                        e.forEach(function(e) {
                            "hover" === e ? (t.push("mouseenter"), o.push("mouseleave")) : "focus" === e ? (t.push("focus"), o.push("blur")) : "click" === e && (t.push("click"), o.push("click"))
                        }), t.forEach(function(e) {
                            var t = function(e) {
                                !0 === r._isOpening || (e.usedByTooltip = !0, r._scheduleShow(n, i.delay, i, e))
                            };
                            r._events.push({
                                event: e,
                                func: t
                            }), n.addEventListener(e, t)
                        }), o.forEach(function(e) {
                            var t = function(e) {
                                !0 === e.usedByTooltip || r._scheduleHide(n, i.delay, i, e)
                            };
                            r._events.push({
                                event: e,
                                func: t
                            }), n.addEventListener(e, t)
                        })
                    }
                }, {
                    key: "_scheduleShow",
                    value: function(e, t, n) {
                        var i = this;
                        this._isOpening = !0;
                        var r = t && t.show || t || 0;
                        this._showTimeout = window.setTimeout(function() {
                            return i._show(e, n)
                        }, r)
                    }
                }, {
                    key: "_scheduleHide",
                    value: function(e, t, n, i) {
                        var r = this;
                        this._isOpening = !1;
                        var o = t && t.hide || t || 0;
                        window.setTimeout(function() {
                            if (window.clearTimeout(r._showTimeout), !1 !== r._isOpen && document.body.contains(r._tooltipNode)) {
                                if ("mouseleave" === i.type)
                                    if (r._setTooltipNodeEvent(i, e, t, n)) return;
                                r._hide(e, n)
                            }
                        }, o)
                    }
                }]), i
            }(),
            a = function() {
                var s = this;
                this.show = function() {
                    return s._show(s.reference, s.options)
                }, this.hide = function() {
                    return s._hide()
                }, this.dispose = function() {
                    return s._dispose()
                }, this.toggle = function() {
                    return s._isOpen ? s.hide() : s.show()
                }, this.arrowSelector = ".tooltip-arrow, .tooltip__arrow", this.innerSelector = ".tooltip-inner, .tooltip__inner", this._events = [], this._setTooltipNodeEvent = function(i, r, e, o) {
                    var t = i.relatedreference || i.toElement || i.relatedTarget;
                    return !!s._tooltipNode.contains(t) && (s._tooltipNode.addEventListener(i.type, function e(t) {
                        var n = t.relatedreference || t.toElement || t.relatedTarget;
                        s._tooltipNode.removeEventListener(i.type, e), r.contains(n) || s._scheduleHide(r, o.delay, o, t)
                    }), !0)
                }
            };
        return t
    }),
    function(e, t) {
        "object" == typeof exports && "undefined" != typeof module ? t(exports, require("jquery"), require("popper.js")) : "function" == typeof define && define.amd ? define(["exports", "jquery", "popper.js"], t) : t((e = e || self).bootstrap = {}, e.jQuery, e.Popper)
    }(this, function(e, p, h) {
        "use strict";

        function i(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
            }
        }

        function s(e, t, n) {
            return t && i(e.prototype, t), n && i(e, n), e
        }

        function l(r) {
            for (var e = 1; e < arguments.length; e++) {
                var o = null != arguments[e] ? arguments[e] : {},
                    t = Object.keys(o);
                "function" == typeof Object.getOwnPropertySymbols && (t = t.concat(Object.getOwnPropertySymbols(o).filter(function(e) {
                    return Object.getOwnPropertyDescriptor(o, e).enumerable
                }))), t.forEach(function(e) {
                    var t, n, i;
                    t = r, i = o[n = e], n in t ? Object.defineProperty(t, n, {
                        value: i,
                        enumerable: !0,
                        configurable: !0,
                        writable: !0
                    }) : t[n] = i
                })
            }
            return r
        }
        p = p && p.hasOwnProperty("default") ? p.default : p, h = h && h.hasOwnProperty("default") ? h.default : h;
        var t = "transitionend";
        var m = {
            TRANSITION_END: "bsTransitionEnd",
            getUID: function(e) {
                for (; e += ~~(1e6 * Math.random()), document.getElementById(e););
                return e
            },
            getSelectorFromElement: function(e) {
                var t = e.getAttribute("data-target");
                if (!t || "#" === t) {
                    var n = e.getAttribute("href");
                    t = n && "#" !== n ? n.trim() : ""
                }
                try {
                    return document.querySelector(t) ? t : null
                } catch (e) {
                    return null
                }
            },
            getTransitionDurationFromElement: function(e) {
                if (!e) return 0;
                var t = p(e).css("transition-duration"),
                    n = p(e).css("transition-delay"),
                    i = parseFloat(t),
                    r = parseFloat(n);
                return i || r ? (t = t.split(",")[0], n = n.split(",")[0], 1e3 * (parseFloat(t) + parseFloat(n))) : 0
            },
            reflow: function(e) {
                return e.offsetHeight
            },
            triggerTransitionEnd: function(e) {
                p(e).trigger(t)
            },
            supportsTransitionEnd: function() {
                return Boolean(t)
            },
            isElement: function(e) {
                return (e[0] || e).nodeType
            },
            typeCheckConfig: function(e, t, n) {
                for (var i in n)
                    if (Object.prototype.hasOwnProperty.call(n, i)) {
                        var r = n[i],
                            o = t[i],
                            s = o && m.isElement(o) ? "element" : (a = o, {}.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase());
                        if (!new RegExp(r).test(s)) throw new Error(e.toUpperCase() + ': Option "' + i + '" provided type "' + s + '" but expected type "' + r + '".')
                    }
                var a
            },
            findShadowRoot: function(e) {
                if (!document.documentElement.attachShadow) return null;
                if ("function" != typeof e.getRootNode) return e instanceof ShadowRoot ? e : e.parentNode ? m.findShadowRoot(e.parentNode) : null;
                var t = e.getRootNode();
                return t instanceof ShadowRoot ? t : null
            }
        };
        p.fn.emulateTransitionEnd = function(e) {
            var t = this,
                n = !1;
            return p(this).one(m.TRANSITION_END, function() {
                n = !0
            }), setTimeout(function() {
                n || m.triggerTransitionEnd(t)
            }, e), this
        }, p.event.special[m.TRANSITION_END] = {
            bindType: t,
            delegateType: t,
            handle: function(e) {
                if (p(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
            }
        };
        var n = "alert",
            r = "bs.alert",
            o = "." + r,
            a = p.fn[n],
            c = {
                CLOSE: "close" + o,
                CLOSED: "closed" + o,
                CLICK_DATA_API: "click" + o + ".data-api"
            },
            u = function() {
                function i(e) {
                    this._element = e
                }
                var e = i.prototype;
                return e.close = function(e) {
                    var t = this._element;
                    e && (t = this._getRootElement(e)), this._triggerCloseEvent(t).isDefaultPrevented() || this._removeElement(t)
                }, e.dispose = function() {
                    p.removeData(this._element, r), this._element = null
                }, e._getRootElement = function(e) {
                    var t = m.getSelectorFromElement(e),
                        n = !1;
                    return t && (n = document.querySelector(t)), n || (n = p(e).closest(".alert")[0]), n
                }, e._triggerCloseEvent = function(e) {
                    var t = p.Event(c.CLOSE);
                    return p(e).trigger(t), t
                }, e._removeElement = function(t) {
                    var n = this;
                    if (p(t).removeClass("show"), p(t).hasClass("fade")) {
                        var e = m.getTransitionDurationFromElement(t);
                        p(t).one(m.TRANSITION_END, function(e) {
                            return n._destroyElement(t, e)
                        }).emulateTransitionEnd(e)
                    } else this._destroyElement(t)
                }, e._destroyElement = function(e) {
                    p(e).detach().trigger(c.CLOSED).remove()
                }, i._jQueryInterface = function(n) {
                    return this.each(function() {
                        var e = p(this),
                            t = e.data(r);
                        t || (t = new i(this), e.data(r, t)), "close" === n && t[n](this)
                    })
                }, i._handleDismiss = function(t) {
                    return function(e) {
                        e && e.preventDefault(), t.close(this)
                    }
                }, s(i, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }]), i
            }();
        p(document).on(c.CLICK_DATA_API, '[data-dismiss="alert"]', u._handleDismiss(new u)), p.fn[n] = u._jQueryInterface, p.fn[n].Constructor = u, p.fn[n].noConflict = function() {
            return p.fn[n] = a, u._jQueryInterface
        };
        var d = "button",
            f = "bs.button",
            g = "." + f,
            y = ".data-api",
            v = p.fn[d],
            x = "active",
            w = '[data-toggle^="button"]',
            _ = {
                CLICK_DATA_API: "click" + g + y,
                FOCUS_BLUR_DATA_API: "focus" + g + y + " blur" + g + y
            },
            b = function() {
                function n(e) {
                    this._element = e
                }
                var e = n.prototype;
                return e.toggle = function() {
                    var e = !0,
                        t = !0,
                        n = p(this._element).closest('[data-toggle="buttons"]')[0];
                    if (n) {
                        var i = this._element.querySelector('input:not([type="hidden"])');
                        if (i) {
                            if ("radio" === i.type)
                                if (i.checked && this._element.classList.contains(x)) e = !1;
                                else {
                                    var r = n.querySelector(".active");
                                    r && p(r).removeClass(x)
                                }
                            if (e) {
                                if (i.hasAttribute("disabled") || n.hasAttribute("disabled") || i.classList.contains("disabled") || n.classList.contains("disabled")) return;
                                i.checked = !this._element.classList.contains(x), p(i).trigger("change")
                            }
                            i.focus(), t = !1
                        }
                    }
                    t && this._element.setAttribute("aria-pressed", !this._element.classList.contains(x)), e && p(this._element).toggleClass(x)
                }, e.dispose = function() {
                    p.removeData(this._element, f), this._element = null
                }, n._jQueryInterface = function(t) {
                    return this.each(function() {
                        var e = p(this).data(f);
                        e || (e = new n(this), p(this).data(f, e)), "toggle" === t && e[t]()
                    })
                }, s(n, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }]), n
            }();
        p(document).on(_.CLICK_DATA_API, w, function(e) {
            e.preventDefault();
            var t = e.target;
            p(t).hasClass("btn") || (t = p(t).closest(".btn")), b._jQueryInterface.call(p(t), "toggle")
        }).on(_.FOCUS_BLUR_DATA_API, w, function(e) {
            var t = p(e.target).closest(".btn")[0];
            p(t).toggleClass("focus", /^focus(in)?$/.test(e.type))
        }), p.fn[d] = b._jQueryInterface, p.fn[d].Constructor = b, p.fn[d].noConflict = function() {
            return p.fn[d] = v, b._jQueryInterface
        };
        var S = "carousel",
            T = "bs.carousel",
            E = "." + T,
            k = ".data-api",
            M = p.fn[S],
            C = {
                interval: 5e3,
                keyboard: !0,
                slide: !1,
                pause: "hover",
                wrap: !0,
                touch: !0
            },
            D = {
                interval: "(number|boolean)",
                keyboard: "boolean",
                slide: "(boolean|string)",
                pause: "(string|boolean)",
                wrap: "boolean",
                touch: "boolean"
            },
            O = "next",
            A = "prev",
            N = {
                SLIDE: "slide" + E,
                SLID: "slid" + E,
                KEYDOWN: "keydown" + E,
                MOUSEENTER: "mouseenter" + E,
                MOUSELEAVE: "mouseleave" + E,
                TOUCHSTART: "touchstart" + E,
                TOUCHMOVE: "touchmove" + E,
                TOUCHEND: "touchend" + E,
                POINTERDOWN: "pointerdown" + E,
                POINTERUP: "pointerup" + E,
                DRAG_START: "dragstart" + E,
                LOAD_DATA_API: "load" + E + k,
                CLICK_DATA_API: "click" + E + k
            },
            L = "active",
            I = ".active.carousel-item",
            H = {
                TOUCH: "touch",
                PEN: "pen"
            },
            P = function() {
                function o(e, t) {
                    this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this.touchStartX = 0, this.touchDeltaX = 0, this._config = this._getConfig(t), this._element = e, this._indicatorsElement = this._element.querySelector(".carousel-indicators"), this._touchSupported = "ontouchstart" in document.documentElement || 0 < navigator.maxTouchPoints, this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent), this._addEventListeners()
                }
                var e = o.prototype;
                return e.next = function() {
                    this._isSliding || this._slide(O)
                }, e.nextWhenVisible = function() {
                    !document.hidden && p(this._element).is(":visible") && "hidden" !== p(this._element).css("visibility") && this.next()
                }, e.prev = function() {
                    this._isSliding || this._slide(A)
                }, e.pause = function(e) {
                    e || (this._isPaused = !0), this._element.querySelector(".carousel-item-next, .carousel-item-prev") && (m.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null
                }, e.cycle = function(e) {
                    e || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
                }, e.to = function(e) {
                    var t = this;
                    this._activeElement = this._element.querySelector(I);
                    var n = this._getItemIndex(this._activeElement);
                    if (!(e > this._items.length - 1 || e < 0))
                        if (this._isSliding) p(this._element).one(N.SLID, function() {
                            return t.to(e)
                        });
                        else {
                            if (n === e) return this.pause(), void this.cycle();
                            var i = n < e ? O : A;
                            this._slide(i, this._items[e])
                        }
                }, e.dispose = function() {
                    p(this._element).off(E), p.removeData(this._element, T), this._items = null, this._config = null, this._element = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null
                }, e._getConfig = function(e) {
                    return e = l({}, C, e), m.typeCheckConfig(S, e, D), e
                }, e._handleSwipe = function() {
                    var e = Math.abs(this.touchDeltaX);
                    if (!(e <= 40)) {
                        var t = e / this.touchDeltaX;
                        0 < t && this.prev(), t < 0 && this.next()
                    }
                }, e._addEventListeners = function() {
                    var t = this;
                    this._config.keyboard && p(this._element).on(N.KEYDOWN, function(e) {
                        return t._keydown(e)
                    }), "hover" === this._config.pause && p(this._element).on(N.MOUSEENTER, function(e) {
                        return t.pause(e)
                    }).on(N.MOUSELEAVE, function(e) {
                        return t.cycle(e)
                    }), this._config.touch && this._addTouchEventListeners()
                }, e._addTouchEventListeners = function() {
                    var n = this;
                    if (this._touchSupported) {
                        var t = function(e) {
                                n._pointerEvent && H[e.originalEvent.pointerType.toUpperCase()] ? n.touchStartX = e.originalEvent.clientX : n._pointerEvent || (n.touchStartX = e.originalEvent.touches[0].clientX)
                            },
                            i = function(e) {
                                n._pointerEvent && H[e.originalEvent.pointerType.toUpperCase()] && (n.touchDeltaX = e.originalEvent.clientX - n.touchStartX), n._handleSwipe(), "hover" === n._config.pause && (n.pause(), n.touchTimeout && clearTimeout(n.touchTimeout), n.touchTimeout = setTimeout(function(e) {
                                    return n.cycle(e)
                                }, 500 + n._config.interval))
                            };
                        p(this._element.querySelectorAll(".carousel-item img")).on(N.DRAG_START, function(e) {
                            return e.preventDefault()
                        }), this._pointerEvent ? (p(this._element).on(N.POINTERDOWN, function(e) {
                            return t(e)
                        }), p(this._element).on(N.POINTERUP, function(e) {
                            return i(e)
                        }), this._element.classList.add("pointer-event")) : (p(this._element).on(N.TOUCHSTART, function(e) {
                            return t(e)
                        }), p(this._element).on(N.TOUCHMOVE, function(e) {
                            var t;
                            (t = e).originalEvent.touches && 1 < t.originalEvent.touches.length ? n.touchDeltaX = 0 : n.touchDeltaX = t.originalEvent.touches[0].clientX - n.touchStartX
                        }), p(this._element).on(N.TOUCHEND, function(e) {
                            return i(e)
                        }))
                    }
                }, e._keydown = function(e) {
                    if (!/input|textarea/i.test(e.target.tagName)) switch (e.which) {
                        case 37:
                            e.preventDefault(), this.prev();
                            break;
                        case 39:
                            e.preventDefault(), this.next()
                    }
                }, e._getItemIndex = function(e) {
                    return this._items = e && e.parentNode ? [].slice.call(e.parentNode.querySelectorAll(".carousel-item")) : [], this._items.indexOf(e)
                }, e._getItemByDirection = function(e, t) {
                    var n = e === O,
                        i = e === A,
                        r = this._getItemIndex(t),
                        o = this._items.length - 1;
                    if ((i && 0 === r || n && r === o) && !this._config.wrap) return t;
                    var s = (r + (e === A ? -1 : 1)) % this._items.length;
                    return -1 === s ? this._items[this._items.length - 1] : this._items[s]
                }, e._triggerSlideEvent = function(e, t) {
                    var n = this._getItemIndex(e),
                        i = this._getItemIndex(this._element.querySelector(I)),
                        r = p.Event(N.SLIDE, {
                            relatedTarget: e,
                            direction: t,
                            from: i,
                            to: n
                        });
                    return p(this._element).trigger(r), r
                }, e._setActiveIndicatorElement = function(e) {
                    if (this._indicatorsElement) {
                        var t = [].slice.call(this._indicatorsElement.querySelectorAll(".active"));
                        p(t).removeClass(L);
                        var n = this._indicatorsElement.children[this._getItemIndex(e)];
                        n && p(n).addClass(L)
                    }
                }, e._slide = function(e, t) {
                    var n, i, r, o = this,
                        s = this._element.querySelector(I),
                        a = this._getItemIndex(s),
                        l = t || s && this._getItemByDirection(e, s),
                        c = this._getItemIndex(l),
                        u = Boolean(this._interval);
                    if (r = e === O ? (n = "carousel-item-left", i = "carousel-item-next", "left") : (n = "carousel-item-right", i = "carousel-item-prev", "right"), l && p(l).hasClass(L)) this._isSliding = !1;
                    else if (!this._triggerSlideEvent(l, r).isDefaultPrevented() && s && l) {
                        this._isSliding = !0, u && this.pause(), this._setActiveIndicatorElement(l);
                        var h = p.Event(N.SLID, {
                            relatedTarget: l,
                            direction: r,
                            from: a,
                            to: c
                        });
                        if (p(this._element).hasClass("slide")) {
                            p(l).addClass(i), m.reflow(l), p(s).addClass(n), p(l).addClass(n);
                            var d = parseInt(l.getAttribute("data-interval"), 10);
                            this._config.interval = d ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, d) : this._config.defaultInterval || this._config.interval;
                            var f = m.getTransitionDurationFromElement(s);
                            p(s).one(m.TRANSITION_END, function() {
                                p(l).removeClass(n + " " + i).addClass(L), p(s).removeClass(L + " " + i + " " + n), o._isSliding = !1, setTimeout(function() {
                                    return p(o._element).trigger(h)
                                }, 0)
                            }).emulateTransitionEnd(f)
                        } else p(s).removeClass(L), p(l).addClass(L), this._isSliding = !1, p(this._element).trigger(h);
                        u && this.cycle()
                    }
                }, o._jQueryInterface = function(i) {
                    return this.each(function() {
                        var e = p(this).data(T),
                            t = l({}, C, p(this).data());
                        "object" == typeof i && (t = l({}, t, i));
                        var n = "string" == typeof i ? i : t.slide;
                        if (e || (e = new o(this, t), p(this).data(T, e)), "number" == typeof i) e.to(i);
                        else if ("string" == typeof n) {
                            if (void 0 === e[n]) throw new TypeError('No method named "' + n + '"');
                            e[n]()
                        } else t.interval && t.ride && (e.pause(), e.cycle())
                    })
                }, o._dataApiClickHandler = function(e) {
                    var t = m.getSelectorFromElement(this);
                    if (t) {
                        var n = p(t)[0];
                        if (n && p(n).hasClass("carousel")) {
                            var i = l({}, p(n).data(), p(this).data()),
                                r = this.getAttribute("data-slide-to");
                            r && (i.interval = !1), o._jQueryInterface.call(p(n), i), r && p(n).data(T).to(r), e.preventDefault()
                        }
                    }
                }, s(o, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return C
                    }
                }]), o
            }();
        p(document).on(N.CLICK_DATA_API, "[data-slide], [data-slide-to]", P._dataApiClickHandler), p(window).on(N.LOAD_DATA_API, function() {
            for (var e = [].slice.call(document.querySelectorAll('[data-ride="carousel"]')), t = 0, n = e.length; t < n; t++) {
                var i = p(e[t]);
                P._jQueryInterface.call(i, i.data())
            }
        }), p.fn[S] = P._jQueryInterface, p.fn[S].Constructor = P, p.fn[S].noConflict = function() {
            return p.fn[S] = M, P._jQueryInterface
        };
        var j = "collapse",
            z = "bs.collapse",
            Y = "." + z,
            R = p.fn[j],
            W = {
                toggle: !0,
                parent: ""
            },
            F = {
                toggle: "boolean",
                parent: "(string|element)"
            },
            q = {
                SHOW: "show" + Y,
                SHOWN: "shown" + Y,
                HIDE: "hide" + Y,
                HIDDEN: "hidden" + Y,
                CLICK_DATA_API: "click" + Y + ".data-api"
            },
            U = "show",
            V = "collapse",
            B = "collapsing",
            G = "collapsed",
            X = '[data-toggle="collapse"]',
            $ = function() {
                function a(t, e) {
                    this._isTransitioning = !1, this._element = t, this._config = this._getConfig(e), this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'));
                    for (var n = [].slice.call(document.querySelectorAll(X)), i = 0, r = n.length; i < r; i++) {
                        var o = n[i],
                            s = m.getSelectorFromElement(o),
                            a = [].slice.call(document.querySelectorAll(s)).filter(function(e) {
                                return e === t
                            });
                        null !== s && 0 < a.length && (this._selector = s, this._triggerArray.push(o))
                    }
                    this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle()
                }
                var e = a.prototype;
                return e.toggle = function() {
                    p(this._element).hasClass(U) ? this.hide() : this.show()
                }, e.show = function() {
                    var e, t, n = this;
                    if (!(this._isTransitioning || p(this._element).hasClass(U) || (this._parent && 0 === (e = [].slice.call(this._parent.querySelectorAll(".show, .collapsing")).filter(function(e) {
                        return "string" == typeof n._config.parent ? e.getAttribute("data-parent") === n._config.parent : e.classList.contains(V)
                    })).length && (e = null), e && (t = p(e).not(this._selector).data(z)) && t._isTransitioning))) {
                        var i = p.Event(q.SHOW);
                        if (p(this._element).trigger(i), !i.isDefaultPrevented()) {
                            e && (a._jQueryInterface.call(p(e).not(this._selector), "hide"), t || p(e).data(z, null));
                            var r = this._getDimension();
                            p(this._element).removeClass(V).addClass(B), this._element.style[r] = 0, this._triggerArray.length && p(this._triggerArray).removeClass(G).attr("aria-expanded", !0), this.setTransitioning(!0);
                            var o = "scroll" + (r[0].toUpperCase() + r.slice(1)),
                                s = m.getTransitionDurationFromElement(this._element);
                            p(this._element).one(m.TRANSITION_END, function() {
                                p(n._element).removeClass(B).addClass(V).addClass(U), n._element.style[r] = "", n.setTransitioning(!1), p(n._element).trigger(q.SHOWN)
                            }).emulateTransitionEnd(s), this._element.style[r] = this._element[o] + "px"
                        }
                    }
                }, e.hide = function() {
                    var e = this;
                    if (!this._isTransitioning && p(this._element).hasClass(U)) {
                        var t = p.Event(q.HIDE);
                        if (p(this._element).trigger(t), !t.isDefaultPrevented()) {
                            var n = this._getDimension();
                            this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", m.reflow(this._element), p(this._element).addClass(B).removeClass(V).removeClass(U);
                            var i = this._triggerArray.length;
                            if (0 < i)
                                for (var r = 0; r < i; r++) {
                                    var o = this._triggerArray[r],
                                        s = m.getSelectorFromElement(o);
                                    null !== s && (p([].slice.call(document.querySelectorAll(s))).hasClass(U) || p(o).addClass(G).attr("aria-expanded", !1))
                                }
                            this.setTransitioning(!0), this._element.style[n] = "";
                            var a = m.getTransitionDurationFromElement(this._element);
                            p(this._element).one(m.TRANSITION_END, function() {
                                e.setTransitioning(!1), p(e._element).removeClass(B).addClass(V).trigger(q.HIDDEN)
                            }).emulateTransitionEnd(a)
                        }
                    }
                }, e.setTransitioning = function(e) {
                    this._isTransitioning = e
                }, e.dispose = function() {
                    p.removeData(this._element, z), this._config = null, this._parent = null, this._element = null, this._triggerArray = null, this._isTransitioning = null
                }, e._getConfig = function(e) {
                    return (e = l({}, W, e)).toggle = Boolean(e.toggle), m.typeCheckConfig(j, e, F), e
                }, e._getDimension = function() {
                    return p(this._element).hasClass("width") ? "width" : "height"
                }, e._getParent = function() {
                    var e, n = this;
                    m.isElement(this._config.parent) ? (e = this._config.parent, void 0 !== this._config.parent.jquery && (e = this._config.parent[0])) : e = document.querySelector(this._config.parent);
                    var t = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]',
                        i = [].slice.call(e.querySelectorAll(t));
                    return p(i).each(function(e, t) {
                        n._addAriaAndCollapsedClass(a._getTargetFromElement(t), [t])
                    }), e
                }, e._addAriaAndCollapsedClass = function(e, t) {
                    var n = p(e).hasClass(U);
                    t.length && p(t).toggleClass(G, !n).attr("aria-expanded", n)
                }, a._getTargetFromElement = function(e) {
                    var t = m.getSelectorFromElement(e);
                    return t ? document.querySelector(t) : null
                }, a._jQueryInterface = function(i) {
                    return this.each(function() {
                        var e = p(this),
                            t = e.data(z),
                            n = l({}, W, e.data(), "object" == typeof i && i ? i : {});
                        if (!t && n.toggle && /show|hide/.test(i) && (n.toggle = !1), t || (t = new a(this, n), e.data(z, t)), "string" == typeof i) {
                            if (void 0 === t[i]) throw new TypeError('No method named "' + i + '"');
                            t[i]()
                        }
                    })
                }, s(a, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return W
                    }
                }]), a
            }();
        p(document).on(q.CLICK_DATA_API, X, function(e) {
            "A" === e.currentTarget.tagName && e.preventDefault();
            var n = p(this),
                t = m.getSelectorFromElement(this),
                i = [].slice.call(document.querySelectorAll(t));
            p(i).each(function() {
                var e = p(this),
                    t = e.data(z) ? "toggle" : n.data();
                $._jQueryInterface.call(e, t)
            })
        }), p.fn[j] = $._jQueryInterface, p.fn[j].Constructor = $, p.fn[j].noConflict = function() {
            return p.fn[j] = R, $._jQueryInterface
        };
        var K = "dropdown",
            Q = "bs.dropdown",
            Z = "." + Q,
            J = ".data-api",
            ee = p.fn[K],
            te = new RegExp("38|40|27"),
            ne = {
                HIDE: "hide" + Z,
                HIDDEN: "hidden" + Z,
                SHOW: "show" + Z,
                SHOWN: "shown" + Z,
                CLICK: "click" + Z,
                CLICK_DATA_API: "click" + Z + J,
                KEYDOWN_DATA_API: "keydown" + Z + J,
                KEYUP_DATA_API: "keyup" + Z + J
            },
            ie = "disabled",
            re = "show",
            oe = "dropdown-menu-right",
            se = '[data-toggle="dropdown"]',
            ae = ".dropdown-menu",
            le = {
                offset: 0,
                flip: !0,
                boundary: "scrollParent",
                reference: "toggle",
                display: "dynamic"
            },
            ce = {
                offset: "(number|string|function)",
                flip: "boolean",
                boundary: "(string|element)",
                reference: "(string|element)",
                display: "string"
            },
            ue = function() {
                function c(e, t) {
                    this._element = e, this._popper = null, this._config = this._getConfig(t), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners()
                }
                var e = c.prototype;
                return e.toggle = function() {
                    if (!this._element.disabled && !p(this._element).hasClass(ie)) {
                        var e = c._getParentFromElement(this._element),
                            t = p(this._menu).hasClass(re);
                        if (c._clearMenus(), !t) {
                            var n = {
                                    relatedTarget: this._element
                                },
                                i = p.Event(ne.SHOW, n);
                            if (p(e).trigger(i), !i.isDefaultPrevented()) {
                                if (!this._inNavbar) {
                                    if (void 0 === h) throw new TypeError("Bootstrap's dropdowns require Popper.js (https://popper.js.org/)");
                                    var r = this._element;
                                    "parent" === this._config.reference ? r = e : m.isElement(this._config.reference) && (r = this._config.reference, void 0 !== this._config.reference.jquery && (r = this._config.reference[0])), "scrollParent" !== this._config.boundary && p(e).addClass("position-static"), this._popper = new h(r, this._menu, this._getPopperConfig())
                                }
                                "ontouchstart" in document.documentElement && 0 === p(e).closest(".navbar-nav").length && p(document.body).children().on("mouseover", null, p.noop), this._element.focus(), this._element.setAttribute("aria-expanded", !0), p(this._menu).toggleClass(re), p(e).toggleClass(re).trigger(p.Event(ne.SHOWN, n))
                            }
                        }
                    }
                }, e.show = function() {
                    if (!(this._element.disabled || p(this._element).hasClass(ie) || p(this._menu).hasClass(re))) {
                        var e = {
                                relatedTarget: this._element
                            },
                            t = p.Event(ne.SHOW, e),
                            n = c._getParentFromElement(this._element);
                        p(n).trigger(t), t.isDefaultPrevented() || (p(this._menu).toggleClass(re), p(n).toggleClass(re).trigger(p.Event(ne.SHOWN, e)))
                    }
                }, e.hide = function() {
                    if (!this._element.disabled && !p(this._element).hasClass(ie) && p(this._menu).hasClass(re)) {
                        var e = {
                                relatedTarget: this._element
                            },
                            t = p.Event(ne.HIDE, e),
                            n = c._getParentFromElement(this._element);
                        p(n).trigger(t), t.isDefaultPrevented() || (p(this._menu).toggleClass(re), p(n).toggleClass(re).trigger(p.Event(ne.HIDDEN, e)))
                    }
                }, e.dispose = function() {
                    p.removeData(this._element, Q), p(this._element).off(Z), this._element = null, (this._menu = null) !== this._popper && (this._popper.destroy(), this._popper = null)
                }, e.update = function() {
                    this._inNavbar = this._detectNavbar(), null !== this._popper && this._popper.scheduleUpdate()
                }, e._addEventListeners = function() {
                    var t = this;
                    p(this._element).on(ne.CLICK, function(e) {
                        e.preventDefault(), e.stopPropagation(), t.toggle()
                    })
                }, e._getConfig = function(e) {
                    return e = l({}, this.constructor.Default, p(this._element).data(), e), m.typeCheckConfig(K, e, this.constructor.DefaultType), e
                }, e._getMenuElement = function() {
                    if (!this._menu) {
                        var e = c._getParentFromElement(this._element);
                        e && (this._menu = e.querySelector(ae))
                    }
                    return this._menu
                }, e._getPlacement = function() {
                    var e = p(this._element.parentNode),
                        t = "bottom-start";
                    return e.hasClass("dropup") ? (t = "top-start", p(this._menu).hasClass(oe) && (t = "top-end")) : e.hasClass("dropright") ? t = "right-start" : e.hasClass("dropleft") ? t = "left-start" : p(this._menu).hasClass(oe) && (t = "bottom-end"), t
                }, e._detectNavbar = function() {
                    return 0 < p(this._element).closest(".navbar").length
                }, e._getOffset = function() {
                    var t = this,
                        e = {};
                    return "function" == typeof this._config.offset ? e.fn = function(e) {
                        return e.offsets = l({}, e.offsets, t._config.offset(e.offsets, t._element) || {}), e
                    } : e.offset = this._config.offset, e
                }, e._getPopperConfig = function() {
                    var e = {
                        placement: this._getPlacement(),
                        modifiers: {
                            offset: this._getOffset(),
                            flip: {
                                enabled: this._config.flip
                            },
                            preventOverflow: {
                                boundariesElement: this._config.boundary
                            }
                        }
                    };
                    return "static" === this._config.display && (e.modifiers.applyStyle = {
                        enabled: !1
                    }), e
                }, c._jQueryInterface = function(t) {
                    return this.each(function() {
                        var e = p(this).data(Q);
                        if (e || (e = new c(this, "object" == typeof t ? t : null), p(this).data(Q, e)), "string" == typeof t) {
                            if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                            e[t]()
                        }
                    })
                }, c._clearMenus = function(e) {
                    if (!e || 3 !== e.which && ("keyup" !== e.type || 9 === e.which))
                        for (var t = [].slice.call(document.querySelectorAll(se)), n = 0, i = t.length; n < i; n++) {
                            var r = c._getParentFromElement(t[n]),
                                o = p(t[n]).data(Q),
                                s = {
                                    relatedTarget: t[n]
                                };
                            if (e && "click" === e.type && (s.clickEvent = e), o) {
                                var a = o._menu;
                                if (p(r).hasClass(re) && !(e && ("click" === e.type && /input|textarea/i.test(e.target.tagName) || "keyup" === e.type && 9 === e.which) && p.contains(r, e.target))) {
                                    var l = p.Event(ne.HIDE, s);
                                    p(r).trigger(l), l.isDefaultPrevented() || ("ontouchstart" in document.documentElement && p(document.body).children().off("mouseover", null, p.noop), t[n].setAttribute("aria-expanded", "false"), p(a).removeClass(re), p(r).removeClass(re).trigger(p.Event(ne.HIDDEN, s)))
                                }
                            }
                        }
                }, c._getParentFromElement = function(e) {
                    var t, n = m.getSelectorFromElement(e);
                    return n && (t = document.querySelector(n)), t || e.parentNode
                }, c._dataApiKeydownHandler = function(e) {
                    if ((/input|textarea/i.test(e.target.tagName) ? !(32 === e.which || 27 !== e.which && (40 !== e.which && 38 !== e.which || p(e.target).closest(ae).length)) : te.test(e.which)) && (e.preventDefault(), e.stopPropagation(), !this.disabled && !p(this).hasClass(ie))) {
                        var t = c._getParentFromElement(this),
                            n = p(t).hasClass(re);
                        if (n && (!n || 27 !== e.which && 32 !== e.which)) {
                            var i = [].slice.call(t.querySelectorAll(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)"));
                            if (0 !== i.length) {
                                var r = i.indexOf(e.target);
                                38 === e.which && 0 < r && r--, 40 === e.which && r < i.length - 1 && r++, r < 0 && (r = 0), i[r].focus()
                            }
                        } else {
                            if (27 === e.which) {
                                var o = t.querySelector(se);
                                p(o).trigger("focus")
                            }
                            p(this).trigger("click")
                        }
                    }
                }, s(c, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return le
                    }
                }, {
                    key: "DefaultType",
                    get: function() {
                        return ce
                    }
                }]), c
            }();
        p(document).on(ne.KEYDOWN_DATA_API, se, ue._dataApiKeydownHandler).on(ne.KEYDOWN_DATA_API, ae, ue._dataApiKeydownHandler).on(ne.CLICK_DATA_API + " " + ne.KEYUP_DATA_API, ue._clearMenus).on(ne.CLICK_DATA_API, se, function(e) {
            e.preventDefault(), e.stopPropagation(), ue._jQueryInterface.call(p(this), "toggle")
        }).on(ne.CLICK_DATA_API, ".dropdown form", function(e) {
            e.stopPropagation()
        }), p.fn[K] = ue._jQueryInterface, p.fn[K].Constructor = ue, p.fn[K].noConflict = function() {
            return p.fn[K] = ee, ue._jQueryInterface
        };
        var he = "modal",
            de = "bs.modal",
            fe = "." + de,
            pe = p.fn[he],
            me = {
                backdrop: !0,
                keyboard: !0,
                focus: !0,
                show: !0
            },
            ge = {
                backdrop: "(boolean|string)",
                keyboard: "boolean",
                focus: "boolean",
                show: "boolean"
            },
            ye = {
                HIDE: "hide" + fe,
                HIDDEN: "hidden" + fe,
                SHOW: "show" + fe,
                SHOWN: "shown" + fe,
                FOCUSIN: "focusin" + fe,
                RESIZE: "resize" + fe,
                CLICK_DISMISS: "click.dismiss" + fe,
                KEYDOWN_DISMISS: "keydown.dismiss" + fe,
                MOUSEUP_DISMISS: "mouseup.dismiss" + fe,
                MOUSEDOWN_DISMISS: "mousedown.dismiss" + fe,
                CLICK_DATA_API: "click" + fe + ".data-api"
            },
            ve = "modal-open",
            xe = "fade",
            we = "show",
            _e = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
            be = ".sticky-top",
            Se = function() {
                function r(e, t) {
                    this._config = this._getConfig(t), this._element = e, this._dialog = e.querySelector(".modal-dialog"), this._backdrop = null, this._isShown = !1, this._isBodyOverflowing = !1, this._ignoreBackdropClick = !1, this._isTransitioning = !1, this._scrollbarWidth = 0
                }
                var e = r.prototype;
                return e.toggle = function(e) {
                    return this._isShown ? this.hide() : this.show(e)
                }, e.show = function(e) {
                    var t = this;
                    if (!this._isShown && !this._isTransitioning) {
                        p(this._element).hasClass(xe) && (this._isTransitioning = !0);
                        var n = p.Event(ye.SHOW, {
                            relatedTarget: e
                        });
                        p(this._element).trigger(n), this._isShown || n.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), p(this._element).on(ye.CLICK_DISMISS, '[data-dismiss="modal"]', function(e) {
                            return t.hide(e)
                        }), p(this._dialog).on(ye.MOUSEDOWN_DISMISS, function() {
                            p(t._element).one(ye.MOUSEUP_DISMISS, function(e) {
                                p(e.target).is(t._element) && (t._ignoreBackdropClick = !0)
                            })
                        }), this._showBackdrop(function() {
                            return t._showElement(e)
                        }))
                    }
                }, e.hide = function(e) {
                    var t = this;
                    if (e && e.preventDefault(), this._isShown && !this._isTransitioning) {
                        var n = p.Event(ye.HIDE);
                        if (p(this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
                            this._isShown = !1;
                            var i = p(this._element).hasClass(xe);
                            if (i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), p(document).off(ye.FOCUSIN), p(this._element).removeClass(we), p(this._element).off(ye.CLICK_DISMISS), p(this._dialog).off(ye.MOUSEDOWN_DISMISS), i) {
                                var r = m.getTransitionDurationFromElement(this._element);
                                p(this._element).one(m.TRANSITION_END, function(e) {
                                    return t._hideModal(e)
                                }).emulateTransitionEnd(r)
                            } else this._hideModal()
                        }
                    }
                }, e.dispose = function() {
                    [window, this._element, this._dialog].forEach(function(e) {
                        return p(e).off(fe)
                    }), p(document).off(ye.FOCUSIN), p.removeData(this._element, de), this._config = null, this._element = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._isTransitioning = null, this._scrollbarWidth = null
                }, e.handleUpdate = function() {
                    this._adjustDialog()
                }, e._getConfig = function(e) {
                    return e = l({}, me, e), m.typeCheckConfig(he, e, ge), e
                }, e._showElement = function(e) {
                    var t = this,
                        n = p(this._element).hasClass(xe);
                    this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), p(this._dialog).hasClass("modal-dialog-scrollable") ? this._dialog.querySelector(".modal-body").scrollTop = 0 : this._element.scrollTop = 0, n && m.reflow(this._element), p(this._element).addClass(we), this._config.focus && this._enforceFocus();
                    var i = p.Event(ye.SHOWN, {
                            relatedTarget: e
                        }),
                        r = function() {
                            t._config.focus && t._element.focus(), t._isTransitioning = !1, p(t._element).trigger(i)
                        };
                    if (n) {
                        var o = m.getTransitionDurationFromElement(this._dialog);
                        p(this._dialog).one(m.TRANSITION_END, r).emulateTransitionEnd(o)
                    } else r()
                }, e._enforceFocus = function() {
                    var t = this;
                    p(document).off(ye.FOCUSIN).on(ye.FOCUSIN, function(e) {
                        document !== e.target && t._element !== e.target && 0 === p(t._element).has(e.target).length && t._element.focus()
                    })
                }, e._setEscapeEvent = function() {
                    var t = this;
                    this._isShown && this._config.keyboard ? p(this._element).on(ye.KEYDOWN_DISMISS, function(e) {
                        27 === e.which && (e.preventDefault(), t.hide())
                    }) : this._isShown || p(this._element).off(ye.KEYDOWN_DISMISS)
                }, e._setResizeEvent = function() {
                    var t = this;
                    this._isShown ? p(window).on(ye.RESIZE, function(e) {
                        return t.handleUpdate(e)
                    }) : p(window).off(ye.RESIZE)
                }, e._hideModal = function() {
                    var e = this;
                    this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._isTransitioning = !1, this._showBackdrop(function() {
                        p(document.body).removeClass(ve), e._resetAdjustments(), e._resetScrollbar(), p(e._element).trigger(ye.HIDDEN)
                    })
                }, e._removeBackdrop = function() {
                    this._backdrop && (p(this._backdrop).remove(), this._backdrop = null)
                }, e._showBackdrop = function(e) {
                    var t = this,
                        n = p(this._element).hasClass(xe) ? xe : "";
                    if (this._isShown && this._config.backdrop) {
                        if (this._backdrop = document.createElement("div"), this._backdrop.className = "modal-backdrop", n && this._backdrop.classList.add(n), p(this._backdrop).appendTo(document.body), p(this._element).on(ye.CLICK_DISMISS, function(e) {
                            t._ignoreBackdropClick ? t._ignoreBackdropClick = !1 : e.target === e.currentTarget && ("static" === t._config.backdrop ? t._element.focus() : t.hide())
                        }), n && m.reflow(this._backdrop), p(this._backdrop).addClass(we), !e) return;
                        if (!n) return void e();
                        var i = m.getTransitionDurationFromElement(this._backdrop);
                        p(this._backdrop).one(m.TRANSITION_END, e).emulateTransitionEnd(i)
                    } else if (!this._isShown && this._backdrop) {
                        p(this._backdrop).removeClass(we);
                        var r = function() {
                            t._removeBackdrop(), e && e()
                        };
                        if (p(this._element).hasClass(xe)) {
                            var o = m.getTransitionDurationFromElement(this._backdrop);
                            p(this._backdrop).one(m.TRANSITION_END, r).emulateTransitionEnd(o)
                        } else r()
                    } else e && e()
                }, e._adjustDialog = function() {
                    var e = this._element.scrollHeight > document.documentElement.clientHeight;
                    !this._isBodyOverflowing && e && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !e && (this._element.style.paddingRight = this._scrollbarWidth + "px")
                }, e._resetAdjustments = function() {
                    this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
                }, e._checkScrollbar = function() {
                    var e = document.body.getBoundingClientRect();
                    this._isBodyOverflowing = e.left + e.right < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth()
                }, e._setScrollbar = function() {
                    var r = this;
                    if (this._isBodyOverflowing) {
                        var e = [].slice.call(document.querySelectorAll(_e)),
                            t = [].slice.call(document.querySelectorAll(be));
                        p(e).each(function(e, t) {
                            var n = t.style.paddingRight,
                                i = p(t).css("padding-right");
                            p(t).data("padding-right", n).css("padding-right", parseFloat(i) + r._scrollbarWidth + "px")
                        }), p(t).each(function(e, t) {
                            var n = t.style.marginRight,
                                i = p(t).css("margin-right");
                            p(t).data("margin-right", n).css("margin-right", parseFloat(i) - r._scrollbarWidth + "px")
                        });
                        var n = document.body.style.paddingRight,
                            i = p(document.body).css("padding-right");
                        p(document.body).data("padding-right", n).css("padding-right", parseFloat(i) + this._scrollbarWidth + "px")
                    }
                    p(document.body).addClass(ve)
                }, e._resetScrollbar = function() {
                    var e = [].slice.call(document.querySelectorAll(_e));
                    p(e).each(function(e, t) {
                        var n = p(t).data("padding-right");
                        p(t).removeData("padding-right"), t.style.paddingRight = n || ""
                    });
                    var t = [].slice.call(document.querySelectorAll("" + be));
                    p(t).each(function(e, t) {
                        var n = p(t).data("margin-right");
                        void 0 !== n && p(t).css("margin-right", n).removeData("margin-right")
                    });
                    var n = p(document.body).data("padding-right");
                    p(document.body).removeData("padding-right"), document.body.style.paddingRight = n || ""
                }, e._getScrollbarWidth = function() {
                    var e = document.createElement("div");
                    e.className = "modal-scrollbar-measure", document.body.appendChild(e);
                    var t = e.getBoundingClientRect().width - e.clientWidth;
                    return document.body.removeChild(e), t
                }, r._jQueryInterface = function(n, i) {
                    return this.each(function() {
                        var e = p(this).data(de),
                            t = l({}, me, p(this).data(), "object" == typeof n && n ? n : {});
                        if (e || (e = new r(this, t), p(this).data(de, e)), "string" == typeof n) {
                            if (void 0 === e[n]) throw new TypeError('No method named "' + n + '"');
                            e[n](i)
                        } else t.show && e.show(i)
                    })
                }, s(r, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return me
                    }
                }]), r
            }();
        p(document).on(ye.CLICK_DATA_API, '[data-toggle="modal"]', function(e) {
            var t, n = this,
                i = m.getSelectorFromElement(this);
            i && (t = document.querySelector(i));
            var r = p(t).data(de) ? "toggle" : l({}, p(t).data(), p(this).data());
            "A" !== this.tagName && "AREA" !== this.tagName || e.preventDefault();
            var o = p(t).one(ye.SHOW, function(e) {
                e.isDefaultPrevented() || o.one(ye.HIDDEN, function() {
                    p(n).is(":visible") && n.focus()
                })
            });
            Se._jQueryInterface.call(p(t), r, this)
        }), p.fn[he] = Se._jQueryInterface, p.fn[he].Constructor = Se, p.fn[he].noConflict = function() {
            return p.fn[he] = pe, Se._jQueryInterface
        };
        var Te = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
            Ee = /^(?:(?:https?|mailto|ftp|tel|file):|[^&:/?#]*(?:[/?#]|$))/gi,
            ke = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[a-z0-9+/]+=*$/i;

        function Me(e, s, t) {
            if (0 === e.length) return e;
            if (t && "function" == typeof t) return t(e);
            for (var n = (new window.DOMParser).parseFromString(e, "text/html"), a = Object.keys(s), l = [].slice.call(n.body.querySelectorAll("*")), i = function(e, t) {
                var n = l[e],
                    i = n.nodeName.toLowerCase();
                if (-1 === a.indexOf(n.nodeName.toLowerCase())) return n.parentNode.removeChild(n), "continue";
                var r = [].slice.call(n.attributes),
                    o = [].concat(s["*"] || [], s[i] || []);
                r.forEach(function(e) {
                    (function(e, t) {
                        var n = e.nodeName.toLowerCase();
                        if (-1 !== t.indexOf(n)) return -1 === Te.indexOf(n) || Boolean(e.nodeValue.match(Ee) || e.nodeValue.match(ke));
                        for (var i = t.filter(function(e) {
                            return e instanceof RegExp
                        }), r = 0, o = i.length; r < o; r++)
                            if (n.match(i[r])) return !0;
                        return !1
                    })(e, o) || n.removeAttribute(e.nodeName)
                })
            }, r = 0, o = l.length; r < o; r++) i(r);
            return n.body.innerHTML
        }
        var Ce = "tooltip",
            De = "bs.tooltip",
            Oe = "." + De,
            Ae = p.fn[Ce],
            Ne = "bs-tooltip",
            Le = new RegExp("(^|\\s)" + Ne + "\\S+", "g"),
            Ie = ["sanitize", "whiteList", "sanitizeFn"],
            He = {
                animation: "boolean",
                template: "string",
                title: "(string|element|function)",
                trigger: "string",
                delay: "(number|object)",
                html: "boolean",
                selector: "(string|boolean)",
                placement: "(string|function)",
                offset: "(number|string|function)",
                container: "(string|element|boolean)",
                fallbackPlacement: "(string|array)",
                boundary: "(string|element)",
                sanitize: "boolean",
                sanitizeFn: "(null|function)",
                whiteList: "object"
            },
            Pe = {
                AUTO: "auto",
                TOP: "top",
                RIGHT: "right",
                BOTTOM: "bottom",
                LEFT: "left"
            },
            je = {
                animation: !0,
                template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                trigger: "hover focus",
                title: "",
                delay: 0,
                html: !1,
                selector: !1,
                placement: "top",
                offset: 0,
                container: !1,
                fallbackPlacement: "flip",
                boundary: "scrollParent",
                sanitize: !0,
                sanitizeFn: null,
                whiteList: {
                    "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
                    a: ["target", "href", "title", "rel"],
                    area: [],
                    b: [],
                    br: [],
                    col: [],
                    code: [],
                    div: [],
                    em: [],
                    hr: [],
                    h1: [],
                    h2: [],
                    h3: [],
                    h4: [],
                    h5: [],
                    h6: [],
                    i: [],
                    img: ["src", "alt", "title", "width", "height"],
                    li: [],
                    ol: [],
                    p: [],
                    pre: [],
                    s: [],
                    small: [],
                    span: [],
                    sub: [],
                    sup: [],
                    strong: [],
                    u: [],
                    ul: []
                }
            },
            ze = "show",
            Ye = {
                HIDE: "hide" + Oe,
                HIDDEN: "hidden" + Oe,
                SHOW: "show" + Oe,
                SHOWN: "shown" + Oe,
                INSERTED: "inserted" + Oe,
                CLICK: "click" + Oe,
                FOCUSIN: "focusin" + Oe,
                FOCUSOUT: "focusout" + Oe,
                MOUSEENTER: "mouseenter" + Oe,
                MOUSELEAVE: "mouseleave" + Oe
            },
            Re = "fade",
            We = "show",
            Fe = "hover",
            qe = "focus",
            Ue = function() {
                function i(e, t) {
                    if (void 0 === h) throw new TypeError("Bootstrap's tooltips require Popper.js (https://popper.js.org/)");
                    this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this.element = e, this.config = this._getConfig(t), this.tip = null, this._setListeners()
                }
                var e = i.prototype;
                return e.enable = function() {
                    this._isEnabled = !0
                }, e.disable = function() {
                    this._isEnabled = !1
                }, e.toggleEnabled = function() {
                    this._isEnabled = !this._isEnabled
                }, e.toggle = function(e) {
                    if (this._isEnabled)
                        if (e) {
                            var t = this.constructor.DATA_KEY,
                                n = p(e.currentTarget).data(t);
                            n || (n = new this.constructor(e.currentTarget, this._getDelegateConfig()), p(e.currentTarget).data(t, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n)
                        } else {
                            if (p(this.getTipElement()).hasClass(We)) return void this._leave(null, this);
                            this._enter(null, this)
                        }
                }, e.dispose = function() {
                    clearTimeout(this._timeout), p.removeData(this.element, this.constructor.DATA_KEY), p(this.element).off(this.constructor.EVENT_KEY), p(this.element).closest(".modal").off("hide.bs.modal"), this.tip && p(this.tip).remove(), this._isEnabled = null, this._timeout = null, this._hoverState = null, (this._activeTrigger = null) !== this._popper && this._popper.destroy(), this._popper = null, this.element = null, this.config = null, this.tip = null
                }, e.show = function() {
                    var t = this;
                    if ("none" === p(this.element).css("display")) throw new Error("Please use show on visible elements");
                    var e = p.Event(this.constructor.Event.SHOW);
                    if (this.isWithContent() && this._isEnabled) {
                        p(this.element).trigger(e);
                        var n = m.findShadowRoot(this.element),
                            i = p.contains(null !== n ? n : this.element.ownerDocument.documentElement, this.element);
                        if (e.isDefaultPrevented() || !i) return;
                        var r = this.getTipElement(),
                            o = m.getUID(this.constructor.NAME);
                        r.setAttribute("id", o), this.element.setAttribute("aria-describedby", o), this.setContent(), this.config.animation && p(r).addClass(Re);
                        var s = "function" == typeof this.config.placement ? this.config.placement.call(this, r, this.element) : this.config.placement,
                            a = this._getAttachment(s);
                        this.addAttachmentClass(a);
                        var l = this._getContainer();
                        p(r).data(this.constructor.DATA_KEY, this), p.contains(this.element.ownerDocument.documentElement, this.tip) || p(r).appendTo(l), p(this.element).trigger(this.constructor.Event.INSERTED), this._popper = new h(this.element, r, {
                            placement: a,
                            modifiers: {
                                offset: this._getOffset(),
                                flip: {
                                    behavior: this.config.fallbackPlacement
                                },
                                arrow: {
                                    element: ".arrow"
                                },
                                preventOverflow: {
                                    boundariesElement: this.config.boundary
                                }
                            },
                            onCreate: function(e) {
                                e.originalPlacement !== e.placement && t._handlePopperPlacementChange(e)
                            },
                            onUpdate: function(e) {
                                return t._handlePopperPlacementChange(e)
                            }
                        }), p(r).addClass(We), "ontouchstart" in document.documentElement && p(document.body).children().on("mouseover", null, p.noop);
                        var c = function() {
                            t.config.animation && t._fixTransition();
                            var e = t._hoverState;
                            t._hoverState = null, p(t.element).trigger(t.constructor.Event.SHOWN), "out" === e && t._leave(null, t)
                        };
                        if (p(this.tip).hasClass(Re)) {
                            var u = m.getTransitionDurationFromElement(this.tip);
                            p(this.tip).one(m.TRANSITION_END, c).emulateTransitionEnd(u)
                        } else c()
                    }
                }, e.hide = function(e) {
                    var t = this,
                        n = this.getTipElement(),
                        i = p.Event(this.constructor.Event.HIDE),
                        r = function() {
                            t._hoverState !== ze && n.parentNode && n.parentNode.removeChild(n), t._cleanTipClass(), t.element.removeAttribute("aria-describedby"), p(t.element).trigger(t.constructor.Event.HIDDEN), null !== t._popper && t._popper.destroy(), e && e()
                        };
                    if (p(this.element).trigger(i), !i.isDefaultPrevented()) {
                        if (p(n).removeClass(We), "ontouchstart" in document.documentElement && p(document.body).children().off("mouseover", null, p.noop), this._activeTrigger.click = !1, this._activeTrigger[qe] = !1, this._activeTrigger[Fe] = !1, p(this.tip).hasClass(Re)) {
                            var o = m.getTransitionDurationFromElement(n);
                            p(n).one(m.TRANSITION_END, r).emulateTransitionEnd(o)
                        } else r();
                        this._hoverState = ""
                    }
                }, e.update = function() {
                    null !== this._popper && this._popper.scheduleUpdate()
                }, e.isWithContent = function() {
                    return Boolean(this.getTitle())
                }, e.addAttachmentClass = function(e) {
                    p(this.getTipElement()).addClass(Ne + "-" + e)
                }, e.getTipElement = function() {
                    return this.tip = this.tip || p(this.config.template)[0], this.tip
                }, e.setContent = function() {
                    var e = this.getTipElement();
                    this.setElementContent(p(e.querySelectorAll(".tooltip-inner")), this.getTitle()), p(e).removeClass(Re + " " + We)
                }, e.setElementContent = function(e, t) {
                    "object" != typeof t || !t.nodeType && !t.jquery ? this.config.html ? (this.config.sanitize && (t = Me(t, this.config.whiteList, this.config.sanitizeFn)), e.html(t)) : e.text(t) : this.config.html ? p(t).parent().is(e) || e.empty().append(t) : e.text(p(t).text())
                }, e.getTitle = function() {
                    var e = this.element.getAttribute("data-original-title");
                    return e || (e = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), e
                }, e._getOffset = function() {
                    var t = this,
                        e = {};
                    return "function" == typeof this.config.offset ? e.fn = function(e) {
                        return e.offsets = l({}, e.offsets, t.config.offset(e.offsets, t.element) || {}), e
                    } : e.offset = this.config.offset, e
                }, e._getContainer = function() {
                    return !1 === this.config.container ? document.body : m.isElement(this.config.container) ? p(this.config.container) : p(document).find(this.config.container)
                }, e._getAttachment = function(e) {
                    return Pe[e.toUpperCase()]
                }, e._setListeners = function() {
                    var i = this;
                    this.config.trigger.split(" ").forEach(function(e) {
                        if ("click" === e) p(i.element).on(i.constructor.Event.CLICK, i.config.selector, function(e) {
                            return i.toggle(e)
                        });
                        else if ("manual" !== e) {
                            var t = e === Fe ? i.constructor.Event.MOUSEENTER : i.constructor.Event.FOCUSIN,
                                n = e === Fe ? i.constructor.Event.MOUSELEAVE : i.constructor.Event.FOCUSOUT;
                            p(i.element).on(t, i.config.selector, function(e) {
                                return i._enter(e)
                            }).on(n, i.config.selector, function(e) {
                                return i._leave(e)
                            })
                        }
                    }), p(this.element).closest(".modal").on("hide.bs.modal", function() {
                        i.element && i.hide()
                    }), this.config.selector ? this.config = l({}, this.config, {
                        trigger: "manual",
                        selector: ""
                    }) : this._fixTitle()
                }, e._fixTitle = function() {
                    var e = typeof this.element.getAttribute("data-original-title");
                    (this.element.getAttribute("title") || "string" !== e) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""))
                }, e._enter = function(e, t) {
                    var n = this.constructor.DATA_KEY;
                    (t = t || p(e.currentTarget).data(n)) || (t = new this.constructor(e.currentTarget, this._getDelegateConfig()), p(e.currentTarget).data(n, t)), e && (t._activeTrigger["focusin" === e.type ? qe : Fe] = !0), p(t.getTipElement()).hasClass(We) || t._hoverState === ze ? t._hoverState = ze : (clearTimeout(t._timeout), t._hoverState = ze, t.config.delay && t.config.delay.show ? t._timeout = setTimeout(function() {
                        t._hoverState === ze && t.show()
                    }, t.config.delay.show) : t.show())
                }, e._leave = function(e, t) {
                    var n = this.constructor.DATA_KEY;
                    (t = t || p(e.currentTarget).data(n)) || (t = new this.constructor(e.currentTarget, this._getDelegateConfig()), p(e.currentTarget).data(n, t)), e && (t._activeTrigger["focusout" === e.type ? qe : Fe] = !1), t._isWithActiveTrigger() || (clearTimeout(t._timeout), t._hoverState = "out", t.config.delay && t.config.delay.hide ? t._timeout = setTimeout(function() {
                        "out" === t._hoverState && t.hide()
                    }, t.config.delay.hide) : t.hide())
                }, e._isWithActiveTrigger = function() {
                    for (var e in this._activeTrigger)
                        if (this._activeTrigger[e]) return !0;
                    return !1
                }, e._getConfig = function(e) {
                    var t = p(this.element).data();
                    return Object.keys(t).forEach(function(e) {
                        -1 !== Ie.indexOf(e) && delete t[e]
                    }), "number" == typeof(e = l({}, this.constructor.Default, t, "object" == typeof e && e ? e : {})).delay && (e.delay = {
                        show: e.delay,
                        hide: e.delay
                    }), "number" == typeof e.title && (e.title = e.title.toString()), "number" == typeof e.content && (e.content = e.content.toString()), m.typeCheckConfig(Ce, e, this.constructor.DefaultType), e.sanitize && (e.template = Me(e.template, e.whiteList, e.sanitizeFn)), e
                }, e._getDelegateConfig = function() {
                    var e = {};
                    if (this.config)
                        for (var t in this.config) this.constructor.Default[t] !== this.config[t] && (e[t] = this.config[t]);
                    return e
                }, e._cleanTipClass = function() {
                    var e = p(this.getTipElement()),
                        t = e.attr("class").match(Le);
                    null !== t && t.length && e.removeClass(t.join(""))
                }, e._handlePopperPlacementChange = function(e) {
                    var t = e.instance;
                    this.tip = t.popper, this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(e.placement))
                }, e._fixTransition = function() {
                    var e = this.getTipElement(),
                        t = this.config.animation;
                    null === e.getAttribute("x-placement") && (p(e).removeClass(Re), this.config.animation = !1, this.hide(), this.show(), this.config.animation = t)
                }, i._jQueryInterface = function(n) {
                    return this.each(function() {
                        var e = p(this).data(De),
                            t = "object" == typeof n && n;
                        if ((e || !/dispose|hide/.test(n)) && (e || (e = new i(this, t), p(this).data(De, e)), "string" == typeof n)) {
                            if (void 0 === e[n]) throw new TypeError('No method named "' + n + '"');
                            e[n]()
                        }
                    })
                }, s(i, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return je
                    }
                }, {
                    key: "NAME",
                    get: function() {
                        return Ce
                    }
                }, {
                    key: "DATA_KEY",
                    get: function() {
                        return De
                    }
                }, {
                    key: "Event",
                    get: function() {
                        return Ye
                    }
                }, {
                    key: "EVENT_KEY",
                    get: function() {
                        return Oe
                    }
                }, {
                    key: "DefaultType",
                    get: function() {
                        return He
                    }
                }]), i
            }();
        p.fn[Ce] = Ue._jQueryInterface, p.fn[Ce].Constructor = Ue, p.fn[Ce].noConflict = function() {
            return p.fn[Ce] = Ae, Ue._jQueryInterface
        };
        var Ve = "popover",
            Be = "bs.popover",
            Ge = "." + Be,
            Xe = p.fn[Ve],
            $e = "bs-popover",
            Ke = new RegExp("(^|\\s)" + $e + "\\S+", "g"),
            Qe = l({}, Ue.Default, {
                placement: "right",
                trigger: "click",
                content: "",
                template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            }),
            Ze = l({}, Ue.DefaultType, {
                content: "(string|element|function)"
            }),
            Je = {
                HIDE: "hide" + Ge,
                HIDDEN: "hidden" + Ge,
                SHOW: "show" + Ge,
                SHOWN: "shown" + Ge,
                INSERTED: "inserted" + Ge,
                CLICK: "click" + Ge,
                FOCUSIN: "focusin" + Ge,
                FOCUSOUT: "focusout" + Ge,
                MOUSEENTER: "mouseenter" + Ge,
                MOUSELEAVE: "mouseleave" + Ge
            },
            et = function(e) {
                var t, n;

                function i() {
                    return e.apply(this, arguments) || this
                }
                n = e, (t = i).prototype = Object.create(n.prototype), (t.prototype.constructor = t).__proto__ = n;
                var r = i.prototype;
                return r.isWithContent = function() {
                    return this.getTitle() || this._getContent()
                }, r.addAttachmentClass = function(e) {
                    p(this.getTipElement()).addClass($e + "-" + e)
                }, r.getTipElement = function() {
                    return this.tip = this.tip || p(this.config.template)[0], this.tip
                }, r.setContent = function() {
                    var e = p(this.getTipElement());
                    this.setElementContent(e.find(".popover-header"), this.getTitle());
                    var t = this._getContent();
                    "function" == typeof t && (t = t.call(this.element)), this.setElementContent(e.find(".popover-body"), t), e.removeClass("fade show")
                }, r._getContent = function() {
                    return this.element.getAttribute("data-content") || this.config.content
                }, r._cleanTipClass = function() {
                    var e = p(this.getTipElement()),
                        t = e.attr("class").match(Ke);
                    null !== t && 0 < t.length && e.removeClass(t.join(""))
                }, i._jQueryInterface = function(n) {
                    return this.each(function() {
                        var e = p(this).data(Be),
                            t = "object" == typeof n ? n : null;
                        if ((e || !/dispose|hide/.test(n)) && (e || (e = new i(this, t), p(this).data(Be, e)), "string" == typeof n)) {
                            if (void 0 === e[n]) throw new TypeError('No method named "' + n + '"');
                            e[n]()
                        }
                    })
                }, s(i, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return Qe
                    }
                }, {
                    key: "NAME",
                    get: function() {
                        return Ve
                    }
                }, {
                    key: "DATA_KEY",
                    get: function() {
                        return Be
                    }
                }, {
                    key: "Event",
                    get: function() {
                        return Je
                    }
                }, {
                    key: "EVENT_KEY",
                    get: function() {
                        return Ge
                    }
                }, {
                    key: "DefaultType",
                    get: function() {
                        return Ze
                    }
                }]), i
            }(Ue);
        p.fn[Ve] = et._jQueryInterface, p.fn[Ve].Constructor = et, p.fn[Ve].noConflict = function() {
            return p.fn[Ve] = Xe, et._jQueryInterface
        };
        var tt = "scrollspy",
            nt = "bs.scrollspy",
            it = "." + nt,
            rt = p.fn[tt],
            ot = {
                offset: 10,
                method: "auto",
                target: ""
            },
            st = {
                offset: "number",
                method: "string",
                target: "(string|element)"
            },
            at = {
                ACTIVATE: "activate" + it,
                SCROLL: "scroll" + it,
                LOAD_DATA_API: "load" + it + ".data-api"
            },
            lt = "active",
            ct = ".nav, .list-group",
            ut = ".nav-link",
            ht = ".list-group-item",
            dt = "position",
            ft = function() {
                function n(e, t) {
                    var n = this;
                    this._element = e, this._scrollElement = "BODY" === e.tagName ? window : e, this._config = this._getConfig(t), this._selector = this._config.target + " " + ut + "," + this._config.target + " " + ht + "," + this._config.target + " .dropdown-item", this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, p(this._scrollElement).on(at.SCROLL, function(e) {
                        return n._process(e)
                    }), this.refresh(), this._process()
                }
                var e = n.prototype;
                return e.refresh = function() {
                    var t = this,
                        e = this._scrollElement === this._scrollElement.window ? "offset" : dt,
                        r = "auto" === this._config.method ? e : this._config.method,
                        o = r === dt ? this._getScrollTop() : 0;
                    this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), [].slice.call(document.querySelectorAll(this._selector)).map(function(e) {
                        var t, n = m.getSelectorFromElement(e);
                        if (n && (t = document.querySelector(n)), t) {
                            var i = t.getBoundingClientRect();
                            if (i.width || i.height) return [p(t)[r]().top + o, n]
                        }
                        return null
                    }).filter(function(e) {
                        return e
                    }).sort(function(e, t) {
                        return e[0] - t[0]
                    }).forEach(function(e) {
                        t._offsets.push(e[0]), t._targets.push(e[1])
                    })
                }, e.dispose = function() {
                    p.removeData(this._element, nt), p(this._scrollElement).off(it), this._element = null, this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null
                }, e._getConfig = function(e) {
                    if ("string" != typeof(e = l({}, ot, "object" == typeof e && e ? e : {})).target) {
                        var t = p(e.target).attr("id");
                        t || (t = m.getUID(tt), p(e.target).attr("id", t)), e.target = "#" + t
                    }
                    return m.typeCheckConfig(tt, e, st), e
                }, e._getScrollTop = function() {
                    return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
                }, e._getScrollHeight = function() {
                    return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
                }, e._getOffsetHeight = function() {
                    return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
                }, e._process = function() {
                    var e = this._getScrollTop() + this._config.offset,
                        t = this._getScrollHeight(),
                        n = this._config.offset + t - this._getOffsetHeight();
                    if (this._scrollHeight !== t && this.refresh(), n <= e) {
                        var i = this._targets[this._targets.length - 1];
                        this._activeTarget !== i && this._activate(i)
                    } else {
                        if (this._activeTarget && e < this._offsets[0] && 0 < this._offsets[0]) return this._activeTarget = null, void this._clear();
                        for (var r = this._offsets.length; r--;) this._activeTarget !== this._targets[r] && e >= this._offsets[r] && (void 0 === this._offsets[r + 1] || e < this._offsets[r + 1]) && this._activate(this._targets[r])
                    }
                }, e._activate = function(t) {
                    this._activeTarget = t, this._clear();
                    var e = this._selector.split(",").map(function(e) {
                            return e + '[data-target="' + t + '"],' + e + '[href="' + t + '"]'
                        }),
                        n = p([].slice.call(document.querySelectorAll(e.join(","))));
                    n.hasClass("dropdown-item") ? (n.closest(".dropdown").find(".dropdown-toggle").addClass(lt), n.addClass(lt)) : (n.addClass(lt), n.parents(ct).prev(ut + ", " + ht).addClass(lt), n.parents(ct).prev(".nav-item").children(ut).addClass(lt)), p(this._scrollElement).trigger(at.ACTIVATE, {
                        relatedTarget: t
                    })
                }, e._clear = function() {
                    [].slice.call(document.querySelectorAll(this._selector)).filter(function(e) {
                        return e.classList.contains(lt)
                    }).forEach(function(e) {
                        return e.classList.remove(lt)
                    })
                }, n._jQueryInterface = function(t) {
                    return this.each(function() {
                        var e = p(this).data(nt);
                        if (e || (e = new n(this, "object" == typeof t && t), p(this).data(nt, e)), "string" == typeof t) {
                            if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                            e[t]()
                        }
                    })
                }, s(n, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return ot
                    }
                }]), n
            }();
        p(window).on(at.LOAD_DATA_API, function() {
            for (var e = [].slice.call(document.querySelectorAll('[data-spy="scroll"]')), t = e.length; t--;) {
                var n = p(e[t]);
                ft._jQueryInterface.call(n, n.data())
            }
        }), p.fn[tt] = ft._jQueryInterface, p.fn[tt].Constructor = ft, p.fn[tt].noConflict = function() {
            return p.fn[tt] = rt, ft._jQueryInterface
        };
        var pt = "bs.tab",
            mt = "." + pt,
            gt = p.fn.tab,
            yt = {
                HIDE: "hide" + mt,
                HIDDEN: "hidden" + mt,
                SHOW: "show" + mt,
                SHOWN: "shown" + mt,
                CLICK_DATA_API: "click" + mt + ".data-api"
            },
            vt = "active",
            xt = ".active",
            wt = "> li > .active",
            _t = function() {
                function i(e) {
                    this._element = e
                }
                var e = i.prototype;
                return e.show = function() {
                    var n = this;
                    if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && p(this._element).hasClass(vt) || p(this._element).hasClass("disabled"))) {
                        var e, i, t = p(this._element).closest(".nav, .list-group")[0],
                            r = m.getSelectorFromElement(this._element);
                        if (t) {
                            var o = "UL" === t.nodeName || "OL" === t.nodeName ? wt : xt;
                            i = (i = p.makeArray(p(t).find(o)))[i.length - 1]
                        }
                        var s = p.Event(yt.HIDE, {
                                relatedTarget: this._element
                            }),
                            a = p.Event(yt.SHOW, {
                                relatedTarget: i
                            });
                        if (i && p(i).trigger(s), p(this._element).trigger(a), !a.isDefaultPrevented() && !s.isDefaultPrevented()) {
                            r && (e = document.querySelector(r)), this._activate(this._element, t);
                            var l = function() {
                                var e = p.Event(yt.HIDDEN, {
                                        relatedTarget: n._element
                                    }),
                                    t = p.Event(yt.SHOWN, {
                                        relatedTarget: i
                                    });
                                p(i).trigger(e), p(n._element).trigger(t)
                            };
                            e ? this._activate(e, e.parentNode, l) : l()
                        }
                    }
                }, e.dispose = function() {
                    p.removeData(this._element, pt), this._element = null
                }, e._activate = function(e, t, n) {
                    var i = this,
                        r = (!t || "UL" !== t.nodeName && "OL" !== t.nodeName ? p(t).children(xt) : p(t).find(wt))[0],
                        o = n && r && p(r).hasClass("fade"),
                        s = function() {
                            return i._transitionComplete(e, r, n)
                        };
                    if (r && o) {
                        var a = m.getTransitionDurationFromElement(r);
                        p(r).removeClass("show").one(m.TRANSITION_END, s).emulateTransitionEnd(a)
                    } else s()
                }, e._transitionComplete = function(e, t, n) {
                    if (t) {
                        p(t).removeClass(vt);
                        var i = p(t.parentNode).find("> .dropdown-menu .active")[0];
                        i && p(i).removeClass(vt), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !1)
                    }
                    if (p(e).addClass(vt), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !0), m.reflow(e), e.classList.contains("fade") && e.classList.add("show"), e.parentNode && p(e.parentNode).hasClass("dropdown-menu")) {
                        var r = p(e).closest(".dropdown")[0];
                        if (r) {
                            var o = [].slice.call(r.querySelectorAll(".dropdown-toggle"));
                            p(o).addClass(vt)
                        }
                        e.setAttribute("aria-expanded", !0)
                    }
                    n && n()
                }, i._jQueryInterface = function(n) {
                    return this.each(function() {
                        var e = p(this),
                            t = e.data(pt);
                        if (t || (t = new i(this), e.data(pt, t)), "string" == typeof n) {
                            if (void 0 === t[n]) throw new TypeError('No method named "' + n + '"');
                            t[n]()
                        }
                    })
                }, s(i, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }]), i
            }();
        p(document).on(yt.CLICK_DATA_API, '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', function(e) {
            e.preventDefault(), _t._jQueryInterface.call(p(this), "show")
        }), p.fn.tab = _t._jQueryInterface, p.fn.tab.Constructor = _t, p.fn.tab.noConflict = function() {
            return p.fn.tab = gt, _t._jQueryInterface
        };
        var bt = "toast",
            St = "bs.toast",
            Tt = "." + St,
            Et = p.fn[bt],
            kt = {
                CLICK_DISMISS: "click.dismiss" + Tt,
                HIDE: "hide" + Tt,
                HIDDEN: "hidden" + Tt,
                SHOW: "show" + Tt,
                SHOWN: "shown" + Tt
            },
            Mt = "show",
            Ct = "showing",
            Dt = {
                animation: "boolean",
                autohide: "boolean",
                delay: "number"
            },
            Ot = {
                animation: !0,
                autohide: !0,
                delay: 500
            },
            At = function() {
                function i(e, t) {
                    this._element = e, this._config = this._getConfig(t), this._timeout = null, this._setListeners()
                }
                var e = i.prototype;
                return e.show = function() {
                    var e = this;
                    p(this._element).trigger(kt.SHOW), this._config.animation && this._element.classList.add("fade");
                    var t = function() {
                        e._element.classList.remove(Ct), e._element.classList.add(Mt), p(e._element).trigger(kt.SHOWN), e._config.autohide && e.hide()
                    };
                    if (this._element.classList.remove("hide"), this._element.classList.add(Ct), this._config.animation) {
                        var n = m.getTransitionDurationFromElement(this._element);
                        p(this._element).one(m.TRANSITION_END, t).emulateTransitionEnd(n)
                    } else t()
                }, e.hide = function(e) {
                    var t = this;
                    this._element.classList.contains(Mt) && (p(this._element).trigger(kt.HIDE), e ? this._close() : this._timeout = setTimeout(function() {
                        t._close()
                    }, this._config.delay))
                }, e.dispose = function() {
                    clearTimeout(this._timeout), this._timeout = null, this._element.classList.contains(Mt) && this._element.classList.remove(Mt), p(this._element).off(kt.CLICK_DISMISS), p.removeData(this._element, St), this._element = null, this._config = null
                }, e._getConfig = function(e) {
                    return e = l({}, Ot, p(this._element).data(), "object" == typeof e && e ? e : {}), m.typeCheckConfig(bt, e, this.constructor.DefaultType), e
                }, e._setListeners = function() {
                    var e = this;
                    p(this._element).on(kt.CLICK_DISMISS, '[data-dismiss="toast"]', function() {
                        return e.hide(!0)
                    })
                }, e._close = function() {
                    var e = this,
                        t = function() {
                            e._element.classList.add("hide"), p(e._element).trigger(kt.HIDDEN)
                        };
                    if (this._element.classList.remove(Mt), this._config.animation) {
                        var n = m.getTransitionDurationFromElement(this._element);
                        p(this._element).one(m.TRANSITION_END, t).emulateTransitionEnd(n)
                    } else t()
                }, i._jQueryInterface = function(n) {
                    return this.each(function() {
                        var e = p(this),
                            t = e.data(St);
                        if (t || (t = new i(this, "object" == typeof n && n), e.data(St, t)), "string" == typeof n) {
                            if (void 0 === t[n]) throw new TypeError('No method named "' + n + '"');
                            t[n](this)
                        }
                    })
                }, s(i, null, [{
                    key: "VERSION",
                    get: function() {
                        return "4.3.1"
                    }
                }, {
                    key: "DefaultType",
                    get: function() {
                        return Dt
                    }
                }, {
                    key: "Default",
                    get: function() {
                        return Ot
                    }
                }]), i
            }();
        p.fn[bt] = At._jQueryInterface, p.fn[bt].Constructor = At, p.fn[bt].noConflict = function() {
            return p.fn[bt] = Et, At._jQueryInterface
        },
            function() {
                if (void 0 === p) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
                var e = p.fn.jquery.split(" ")[0].split(".");
                if (e[0] < 2 && e[1] < 9 || 1 === e[0] && 9 === e[1] && e[2] < 1 || 4 <= e[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0")
            }(), e.Util = m, e.Alert = u, e.Button = b, e.Carousel = P, e.Collapse = $, e.Dropdown = ue, e.Modal = Se, e.Popover = et, e.Scrollspy = ft, e.Tab = _t, e.Toast = At, e.Tooltip = Ue, Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }),
    function(e) {
        "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e(require("jquery")) : e(jQuery)
    }(function(e) {
        "use strict";
        var k = !1,
            M = !1,
            C = 0,
            D = 2e3,
            O = 0,
            A = e,
            N = document,
            L = window,
            I = A(L),
            H = [],
            P = L.requestAnimationFrame || L.webkitRequestAnimationFrame || L.mozRequestAnimationFrame || !1,
            j = L.cancelAnimationFrame || L.webkitCancelAnimationFrame || L.mozCancelAnimationFrame || !1;
        if (P) L.cancelAnimationFrame || (j = function(e) {});
        else {
            var o = 0;
            P = function(e, t) {
                var n = (new Date).getTime(),
                    i = Math.max(0, 16 - (n - o)),
                    r = L.setTimeout(function() {
                        e(n + i)
                    }, i);
                return o = n + i, r
            }, j = function(e) {
                L.clearTimeout(e)
            }
        }
        var t, n, i, z = L.MutationObserver || L.WebKitMutationObserver || !1,
            Y = Date.now || function() {
                return (new Date).getTime()
            },
            R = {
                zindex: "auto",
                cursoropacitymin: 0,
                cursoropacitymax: 1,
                cursorcolor: "#424242",
                cursorwidth: "6px",
                cursorborder: "1px solid #fff",
                cursorborderradius: "5px",
                scrollspeed: 40,
                mousescrollstep: 27,
                touchbehavior: !1,
                emulatetouch: !1,
                hwacceleration: !0,
                usetransition: !0,
                boxzoom: !1,
                dblclickzoom: !0,
                gesturezoom: !0,
                grabcursorenabled: !0,
                autohidemode: !0,
                background: "",
                iframeautoresize: !0,
                cursorminheight: 32,
                preservenativescrolling: !0,
                railoffset: !1,
                railhoffset: !1,
                bouncescroll: !0,
                spacebarenabled: !0,
                railpadding: {
                    top: 0,
                    right: 0,
                    left: 0,
                    bottom: 0
                },
                disableoutline: !0,
                horizrailenabled: !0,
                railalign: "right",
                railvalign: "bottom",
                enabletranslate3d: !0,
                enablemousewheel: !0,
                enablekeyboard: !0,
                smoothscroll: !0,
                sensitiverail: !0,
                enablemouselockapi: !0,
                cursorfixedheight: !1,
                directionlockdeadzone: 6,
                hidecursordelay: 400,
                nativeparentscrolling: !0,
                enablescrollonselection: !0,
                overflowx: !0,
                overflowy: !0,
                cursordragspeed: .3,
                rtlmode: "auto",
                cursordragontouch: !1,
                oneaxismousemode: "auto",
                scriptpath: (n = N.currentScript || !!(t = N.getElementsByTagName("script")).length && t[t.length - 1], i = n ? n.src.split("?")[0] : "", 0 < i.split("/").length ? i.split("/").slice(0, -1).join("/") + "/" : ""),
                preventmultitouchscrolling: !0,
                disablemutationobserver: !1,
                enableobserver: !0,
                scrollbarid: !1
            },
            W = !1,
            a = function(e, t) {
                function n() {
                    var e = x.doc.css(b.trstyle);
                    return !(!e || "matrix" != e.substr(0, 6)) && e.replace(/^.*\((.*)\)$/g, "$1").replace(/px/g, "").split(/, +/)
                }

                function s(e, t, n) {
                    var i = e.css(t),
                        r = parseFloat(i);
                    if (isNaN(r)) {
                        var o = 3 == (r = d[i] || 0) ? n ? x.win.outerHeight() - x.win.innerHeight() : x.win.outerWidth() - x.win.innerWidth() : 1;
                        return x.isie8 && r && (r += 1), o ? r : 0
                    }
                    return r
                }

                function o(n, i, r, e) {
                    x._bind(n, i, function(e) {
                        var t = {
                            original: e = e || L.event,
                            target: e.target || e.srcElement,
                            type: "wheel",
                            deltaMode: "MozMousePixelScroll" == e.type ? 0 : 1,
                            deltaX: 0,
                            deltaZ: 0,
                            preventDefault: function() {
                                return e.preventDefault ? e.preventDefault() : e.returnValue = !1, !1
                            },
                            stopImmediatePropagation: function() {
                                e.stopImmediatePropagation ? e.stopImmediatePropagation() : e.cancelBubble = !0
                            }
                        };
                        return "mousewheel" == i ? (e.wheelDeltaX && (t.deltaX = -.025 * e.wheelDeltaX), e.wheelDeltaY && (t.deltaY = -.025 * e.wheelDeltaY), !t.deltaY && !t.deltaX && (t.deltaY = -.025 * e.wheelDelta)) : t.deltaY = e.detail, r.call(n, t)
                    }, e)
                }

                function a(e, t, n, i) {
                    x.scrollrunning || (x.newscrolly = x.getScrollTop(), x.newscrollx = x.getScrollLeft(), v = Y());
                    var r = Y() - v;
                    if (v = Y(), 350 < r ? S = 1 : S += (2 - S) / 10, t = t * S | 0, e = e * S | 0) {
                        if (i)
                            if (e < 0) {
                                if (x.getScrollLeft() >= x.page.maxw) return !0
                            } else if (x.getScrollLeft() <= 0) return !0;
                        var o = 0 < e ? 1 : -1;
                        y !== o && (x.scrollmom && x.scrollmom.stop(), x.newscrollx = x.getScrollLeft(), y = o), x.lastdeltax -= e
                    }
                    if (t) {
                        if (function() {
                            var e = x.getScrollTop();
                            if (t < 0) {
                                if (e >= x.page.maxh) return !0
                            } else if (e <= 0) return !0
                        }()) {
                            if (_.nativeparentscrolling && n && !x.ispage && !x.zoomactive) return !0;
                            var s = x.view.h >> 1;
                            t = x.newscrolly < -s ? (x.newscrolly = -s, -1) : x.newscrolly > x.page.maxh + s ? (x.newscrolly = x.page.maxh + s, 1) : 0
                        }
                        var a = 0 < t ? 1 : -1;
                        g !== a && (x.scrollmom && x.scrollmom.stop(), x.newscrolly = x.getScrollTop(), g = a), x.lastdeltay -= t
                    }(t || e) && x.synched("relativexy", function() {
                        var e = x.lastdeltay + x.newscrolly;
                        x.lastdeltay = 0;
                        var t = x.lastdeltax + x.newscrollx;
                        x.lastdeltax = 0, x.rail.drag || x.doScrollPos(t, e)
                    })
                }

                function r(e, t, n) {
                    var i, r;
                    return !(n || !T) || (0 === e.deltaMode ? (i = -e.deltaX * (_.mousescrollstep / 54) | 0, r = -e.deltaY * (_.mousescrollstep / 54) | 0) : 1 === e.deltaMode && (i = -e.deltaX * _.mousescrollstep * 50 / 80 | 0, r = -e.deltaY * _.mousescrollstep * 50 / 80 | 0), t && _.oneaxismousemode && 0 === i && r && (i = r, r = 0, n && (i < 0 ? x.getScrollLeft() >= x.page.maxw : x.getScrollLeft() <= 0) && (r = i, i = 0)), x.isrtlmode && (i = -i), a(i, r, n, !0) ? void(n && (T = !0)) : (T = !1, e.stopImmediatePropagation(), e.preventDefault()))
                }
                var x = this;
                this.version = "3.7.6", this.name = "nicescroll", this.me = t;
                var w = A("body"),
                    _ = this.opt = {
                        doc: w,
                        win: !1
                    };
                if (A.extend(_, R), _.snapbackspeed = 80, e)
                    for (var i in _) void 0 !== e[i] && (_[i] = e[i]);
                if (_.disablemutationobserver && (z = !1), this.doc = _.doc, this.iddoc = this.doc && this.doc[0] && this.doc[0].id || "", this.ispage = /^BODY|HTML/.test(_.win ? _.win[0].nodeName : this.doc[0].nodeName), this.haswrapper = !1 !== _.win, this.win = _.win || (this.ispage ? I : this.doc), this.docscroll = this.ispage && !this.haswrapper ? I : this.win, this.body = w, this.viewport = !1, this.isfixed = !1, this.iframe = !1, this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName, this.istextarea = "TEXTAREA" == this.win[0].nodeName, this.forcescreen = !1, this.canshowonmouseevent = "scroll" != _.autohidemode, this.onmousedown = !1, this.onmouseup = !1, this.onmousemove = !1, this.onmousewheel = !1, this.onkeypress = !1, this.ongesturezoom = !1, this.onclick = !1, this.onscrollstart = !1, this.onscrollend = !1, this.onscrollcancel = !1, this.onzoomin = !1, this.onzoomout = !1, this.view = !1, this.page = !1, this.scroll = {
                    x: 0,
                    y: 0
                }, this.scrollratio = {
                    x: 0,
                    y: 0
                }, this.cursorheight = 20, this.scrollvaluemax = 0, "auto" == _.rtlmode) {
                    var l = this.win[0] == L ? this.body : this.win,
                        c = l.css("writing-mode") || l.css("-webkit-writing-mode") || l.css("-ms-writing-mode") || l.css("-moz-writing-mode");
                    "horizontal-tb" == c || "lr-tb" == c || "" === c ? (this.isrtlmode = "rtl" == l.css("direction"), this.isvertical = !1) : (this.isrtlmode = "vertical-rl" == c || "tb" == c || "tb-rl" == c || "rl-tb" == c, this.isvertical = "vertical-rl" == c || "tb" == c || "tb-rl" == c)
                } else this.isrtlmode = !0 === _.rtlmode, this.isvertical = !1;
                if (this.scrollrunning = !1, this.scrollmom = !1, this.observer = !1, this.observerremover = !1, (this.observerbody = !1) !== _.scrollbarid) this.id = _.scrollbarid;
                else
                    for (; this.id = "ascrail" + D++, N.getElementById(this.id););
                this.rail = !1, this.cursor = !1, this.cursorfreezed = !1, this.selectiondrag = !1, this.zoom = !1, this.zoomactive = !1, this.hasfocus = !1, this.hasmousefocus = !1, this.railslocked = !1, this.locked = !1, this.hidden = !1, this.cursoractive = !0, this.wheelprevented = !1, this.overflowx = _.overflowx, this.overflowy = _.overflowy, this.nativescrollingarea = !1, this.checkarea = 0, this.events = [], this.saved = {}, this.delaylist = {}, this.synclist = {}, this.lastdeltax = 0, this.lastdeltay = 0, this.detected = function() {
                    if (W) return W;
                    var e = N.createElement("DIV"),
                        o = e.style,
                        t = navigator.userAgent,
                        n = navigator.platform,
                        s = {};
                    return s.haspointerlock = "pointerLockElement" in N || "webkitPointerLockElement" in N || "mozPointerLockElement" in N, s.isopera = "opera" in L, s.isopera12 = s.isopera && "getUserMedia" in navigator, s.isoperamini = "[object OperaMini]" === Object.prototype.toString.call(L.operamini), s.isie = "all" in N && "attachEvent" in e && !s.isopera, s.isieold = s.isie && !("msInterpolationMode" in o), s.isie7 = s.isie && !s.isieold && (!("documentMode" in N) || 7 === N.documentMode), s.isie8 = s.isie && "documentMode" in N && 8 === N.documentMode, s.isie9 = s.isie && "performance" in L && 9 === N.documentMode, s.isie10 = s.isie && "performance" in L && 10 === N.documentMode, s.isie11 = "msRequestFullscreen" in e && 11 <= N.documentMode, s.ismsedge = "msCredentials" in L, s.ismozilla = "MozAppearance" in o, s.iswebkit = !s.ismsedge && "WebkitAppearance" in o, s.ischrome = s.iswebkit && "chrome" in L, s.ischrome38 = s.ischrome && "touchAction" in o, s.ischrome22 = !s.ischrome38 && s.ischrome && s.haspointerlock, s.ischrome26 = !s.ischrome38 && s.ischrome && "transition" in o, s.cantouch = "ontouchstart" in N.documentElement || "ontouchstart" in L, s.hasw3ctouch = !!L.PointerEvent && (0 < navigator.maxTouchPoints || 0 < navigator.msMaxTouchPoints), s.hasmstouch = !s.hasw3ctouch && (L.MSPointerEvent || !1), s.ismac = /^mac$/i.test(n), s.isios = s.cantouch && /iphone|ipad|ipod/i.test(n), s.isios4 = s.isios && !("seal" in Object), s.isios7 = s.isios && "webkitHidden" in N, s.isios8 = s.isios && "hidden" in N, s.isios10 = s.isios && L.Proxy, s.isandroid = /android/i.test(t), s.haseventlistener = "addEventListener" in e, s.trstyle = !1, s.hastransform = !1, s.hastranslate3d = !1, s.transitionstyle = !1, s.hastransition = !1, s.transitionend = !1, s.trstyle = "transform", s.hastransform = "transform" in o || function() {
                        for (var e = ["msTransform", "webkitTransform", "MozTransform", "OTransform"], t = 0, n = e.length; t < n; t++)
                            if (void 0 !== o[e[t]]) {
                                s.trstyle = e[t];
                                break
                            }
                        s.hastransform = !!s.trstyle
                    }(), s.hastransform && (o[s.trstyle] = "translate3d(1px,2px,3px)", s.hastranslate3d = /translate3d/.test(o[s.trstyle])), s.transitionstyle = "transition", s.prefixstyle = "", s.transitionend = "transitionend", s.hastransition = "transition" in o || function() {
                        s.transitionend = !1;
                        for (var e = ["webkitTransition", "msTransition", "MozTransition", "OTransition", "OTransition", "KhtmlTransition"], t = ["-webkit-", "-ms-", "-moz-", "-o-", "-o", "-khtml-"], n = ["webkitTransitionEnd", "msTransitionEnd", "transitionend", "otransitionend", "oTransitionEnd", "KhtmlTransitionEnd"], i = 0, r = e.length; i < r; i++)
                            if (e[i] in o) {
                                s.transitionstyle = e[i], s.prefixstyle = t[i], s.transitionend = n[i];
                                break
                            }
                        s.ischrome26 && (s.prefixstyle = t[1]), s.hastransition = s.transitionstyle
                    }(), s.cursorgrabvalue = function() {
                        var e = ["grab", "-webkit-grab", "-moz-grab"];
                        (s.ischrome && !s.ischrome38 || s.isie) && (e = []);
                        for (var t = 0, n = e.length; t < n; t++) {
                            var i = e[t];
                            if (o.cursor = i, o.cursor == i) return i
                        }
                        return "url(https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.3.0/css/images/openhand.cur),n-resize"
                    }(), s.hasmousecapture = "setCapture" in e, s.hasMutationObserver = !1 !== z, e = null, W = s
                }();
                var b = A.extend({}, this.detected);
                this.canhwscroll = b.hastransform && _.hwacceleration, this.ishwscroll = this.canhwscroll && x.haswrapper, this.isrtlmode ? this.isvertical ? this.hasreversehr = !(b.iswebkit || b.isie || b.isie11) : this.hasreversehr = !(b.iswebkit || b.isie && !b.isie10 && !b.isie11) : this.hasreversehr = !1, this.istouchcapable = !1, (b.cantouch || !b.hasw3ctouch && !b.hasmstouch) && (!b.cantouch || b.isios || b.isandroid || !b.iswebkit && !b.ismozilla) || (this.istouchcapable = !0), _.enablemouselockapi || (b.hasmousecapture = !1, b.haspointerlock = !1), this.debounced = function(e, t, n) {
                    x && (x.delaylist[e] || (x.delaylist[e] = {
                        h: P(function() {
                            x.delaylist[e].fn.call(x), x.delaylist[e] = !1
                        }, n)
                    }, t.call(x)), x.delaylist[e].fn = t)
                }, this.synched = function(e, t) {
                    x.synclist[e] ? x.synclist[e] = t : (x.synclist[e] = t, P(function() {
                        x && (x.synclist[e] && x.synclist[e].call(x), x.synclist[e] = null)
                    }))
                }, this.unsynched = function(e) {
                    x.synclist[e] && (x.synclist[e] = !1)
                }, this.css = function(e, t) {
                    for (var n in t) x.saved.css.push([e, n, e.css(n)]), e.css(n, t[n])
                }, this.scrollTop = function(e) {
                    return void 0 === e ? x.getScrollTop() : x.setScrollTop(e)
                }, this.scrollLeft = function(e) {
                    return void 0 === e ? x.getScrollLeft() : x.setScrollLeft(e)
                };
                var u = function(e, t, n, i, r, o, s) {
                    this.st = e, this.ed = t, this.spd = n, this.p1 = i || 0, this.p2 = r || 1, this.p3 = o || 0, this.p4 = s || 1, this.ts = Y(), this.df = t - e
                };
                if (u.prototype = {
                    B2: function(e) {
                        return 3 * (1 - e) * (1 - e) * e
                    },
                    B3: function(e) {
                        return 3 * (1 - e) * e * e
                    },
                    B4: function(e) {
                        return e * e * e
                    },
                    getPos: function() {
                        return (Y() - this.ts) / this.spd
                    },
                    getNow: function() {
                        var e = (Y() - this.ts) / this.spd,
                            t = this.B2(e) + this.B3(e) + this.B4(e);
                        return 1 <= e ? this.ed : this.st + this.df * t | 0
                    },
                    update: function(e, t) {
                        return this.st = this.getNow(), this.ed = e, this.spd = t, this.ts = Y(), this.df = this.ed - this.st, this
                    }
                }, this.ishwscroll) {
                    this.doc.translate = {
                        x: 0,
                        y: 0,
                        tx: "0px",
                        ty: "0px"
                    }, b.hastranslate3d && b.isios && this.doc.css("-webkit-backface-visibility", "hidden"), this.getScrollTop = function(e) {
                        if (!e) {
                            var t = n();
                            if (t) return 16 == t.length ? -t[13] : -t[5];
                            if (x.timerscroll && x.timerscroll.bz) return x.timerscroll.bz.getNow()
                        }
                        return x.doc.translate.y
                    }, this.getScrollLeft = function(e) {
                        if (!e) {
                            var t = n();
                            if (t) return 16 == t.length ? -t[12] : -t[4];
                            if (x.timerscroll && x.timerscroll.bh) return x.timerscroll.bh.getNow()
                        }
                        return x.doc.translate.x
                    }, this.notifyScrollEvent = function(e) {
                        var t = N.createEvent("UIEvents");
                        t.initUIEvent("scroll", !1, !1, L, 1), t.niceevent = !0, e.dispatchEvent(t)
                    };
                    var h = this.isrtlmode ? 1 : -1;
                    b.hastranslate3d && _.enabletranslate3d ? (this.setScrollTop = function(e, t) {
                        x.doc.translate.y = e, x.doc.translate.ty = -1 * e + "px", x.doc.css(b.trstyle, "translate3d(" + x.doc.translate.tx + "," + x.doc.translate.ty + ",0)"), t || x.notifyScrollEvent(x.win[0])
                    }, this.setScrollLeft = function(e, t) {
                        x.doc.translate.x = e, x.doc.translate.tx = e * h + "px", x.doc.css(b.trstyle, "translate3d(" + x.doc.translate.tx + "," + x.doc.translate.ty + ",0)"), t || x.notifyScrollEvent(x.win[0])
                    }) : (this.setScrollTop = function(e, t) {
                        x.doc.translate.y = e, x.doc.translate.ty = -1 * e + "px", x.doc.css(b.trstyle, "translate(" + x.doc.translate.tx + "," + x.doc.translate.ty + ")"), t || x.notifyScrollEvent(x.win[0])
                    }, this.setScrollLeft = function(e, t) {
                        x.doc.translate.x = e, x.doc.translate.tx = e * h + "px", x.doc.css(b.trstyle, "translate(" + x.doc.translate.tx + "," + x.doc.translate.ty + ")"), t || x.notifyScrollEvent(x.win[0])
                    })
                } else this.getScrollTop = function() {
                    return x.docscroll.scrollTop()
                }, this.setScrollTop = function(e) {
                    x.docscroll.scrollTop(e)
                }, this.getScrollLeft = function() {
                    return x.hasreversehr ? x.detected.ismozilla ? x.page.maxw - Math.abs(x.docscroll.scrollLeft()) : x.page.maxw - x.docscroll.scrollLeft() : x.docscroll.scrollLeft()
                }, this.setScrollLeft = function(e) {
                    return setTimeout(function() {
                        if (x) return x.hasreversehr && (e = x.detected.ismozilla ? -(x.page.maxw - e) : x.page.maxw - e), x.docscroll.scrollLeft(e)
                    }, 1)
                };
                this.getTarget = function(e) {
                    return !!e && (e.target ? e.target : !!e.srcElement && e.srcElement)
                }, this.hasParent = function(e, t) {
                    if (!e) return !1;
                    for (var n = e.target || e.srcElement || e || !1; n && n.id != t;) n = n.parentNode || !1;
                    return !1 !== n
                };
                var d = {
                    thin: 1,
                    medium: 3,
                    thick: 5
                };
                this.getDocumentScrollOffset = function() {
                    return {
                        top: L.pageYOffset || N.documentElement.scrollTop,
                        left: L.pageXOffset || N.documentElement.scrollLeft
                    }
                }, this.getOffset = function() {
                    if (x.isfixed) {
                        var e = x.win.offset(),
                            t = x.getDocumentScrollOffset();
                        return e.top -= t.top, e.left -= t.left, e
                    }
                    var n = x.win.offset();
                    if (!x.viewport) return n;
                    var i = x.viewport.offset();
                    return {
                        top: n.top - i.top,
                        left: n.left - i.left
                    }
                }, this.updateScrollBar = function(e) {
                    var t, n;
                    if (x.ishwscroll) x.rail.css({
                        height: x.win.innerHeight() - (_.railpadding.top + _.railpadding.bottom)
                    }), x.railh && x.railh.css({
                        width: x.win.innerWidth() - (_.railpadding.left + _.railpadding.right)
                    });
                    else {
                        var i = x.getOffset();
                        if ((t = {
                            top: i.top,
                            left: i.left - (_.railpadding.left + _.railpadding.right)
                        }).top += s(x.win, "border-top-width", !0), t.left += x.rail.align ? x.win.outerWidth() - s(x.win, "border-right-width") - x.rail.width : s(x.win, "border-left-width"), (n = _.railoffset) && (n.top && (t.top += n.top), n.left && (t.left += n.left)), x.railslocked || x.rail.css({
                            top: t.top,
                            left: t.left,
                            height: (e ? e.h : x.win.innerHeight()) - (_.railpadding.top + _.railpadding.bottom)
                        }), x.zoom && x.zoom.css({
                            top: t.top + 1,
                            left: 1 == x.rail.align ? t.left - 20 : t.left + x.rail.width + 4
                        }), x.railh && !x.railslocked) {
                            t = {
                                top: i.top,
                                left: i.left
                            }, (n = _.railhoffset) && (n.top && (t.top += n.top), n.left && (t.left += n.left));
                            var r = x.railh.align ? t.top + s(x.win, "border-top-width", !0) + x.win.innerHeight() - x.railh.height : t.top + s(x.win, "border-top-width", !0),
                                o = t.left + s(x.win, "border-left-width");
                            x.railh.css({
                                top: r - (_.railpadding.top + _.railpadding.bottom),
                                left: o,
                                width: x.railh.width
                            })
                        }
                    }
                }, this.doRailClick = function(e, t, n) {
                    var i, r, o, s;
                    x.railslocked || (x.cancelEvent(e), "pageY" in e || (e.pageX = e.clientX + N.documentElement.scrollLeft, e.pageY = e.clientY + N.documentElement.scrollTop), t ? (i = n ? x.doScrollLeft : x.doScrollTop, o = n ? (e.pageX - x.railh.offset().left - x.cursorwidth / 2) * x.scrollratio.x : (e.pageY - x.rail.offset().top - x.cursorheight / 2) * x.scrollratio.y, x.unsynched("relativexy"), i(0 | o)) : (i = n ? x.doScrollLeftBy : x.doScrollBy, o = n ? x.scroll.x : x.scroll.y, s = n ? e.pageX - x.railh.offset().left : e.pageY - x.rail.offset().top, r = n ? x.view.w : x.view.h, i(s <= o ? r : -r)))
                }, x.newscrolly = x.newscrollx = 0, x.hasanimationframe = "requestAnimationFrame" in L, x.hascancelanimationframe = "cancelAnimationFrame" in L, x.hasborderbox = !1, this.init = function() {
                    if (x.saved.css = [], b.isoperamini) return !0;
                    if (b.isandroid && !("hidden" in N)) return !0;
                    _.emulatetouch = _.emulatetouch || _.touchbehavior, x.hasborderbox = L.getComputedStyle && "border-box" === L.getComputedStyle(N.body)["box-sizing"];
                    var n = {
                        "overflow-y": "hidden"
                    };
                    if ((b.isie11 || b.isie10) && (n["-ms-overflow-style"] = "none"), x.ishwscroll && (this.doc.css(b.transitionstyle, b.prefixstyle + "transform 0ms ease-out"), b.transitionend && x.bind(x.doc, b.transitionend, x.onScrollTransitionEnd, !1)), x.zindex = "auto", x.ispage || "auto" != _.zindex ? x.zindex = _.zindex : x.zindex = function() {
                        var e = x.win;
                        if ("zIndex" in e) return e.zIndex();
                        for (; 0 < e.length;) {
                            if (9 == e[0].nodeType) return !1;
                            var t = e.css("zIndex");
                            if (!isNaN(t) && 0 !== t) return parseInt(t);
                            e = e.parent()
                        }
                        return !1
                    }() || "auto", !x.ispage && "auto" != x.zindex && x.zindex > O && (O = x.zindex), x.isie && 0 === x.zindex && "auto" == _.zindex && (x.zindex = "auto"), !x.ispage || !b.isieold) {
                        var e = x.docscroll;
                        x.ispage && (e = x.haswrapper ? x.win : x.doc), x.css(e, n), x.ispage && (b.isie11 || b.isie) && x.css(A("html"), n), !b.isios || x.ispage || x.haswrapper || x.css(w, {
                            "-webkit-overflow-scrolling": "touch"
                        });
                        var t = A(N.createElement("div"));
                        t.css({
                            position: "relative",
                            top: 0,
                            float: "right",
                            width: _.cursorwidth,
                            height: 0,
                            "background-color": _.cursorcolor,
                            border: _.cursorborder,
                            "background-clip": "padding-box",
                            "-webkit-border-radius": _.cursorborderradius,
                            "-moz-border-radius": _.cursorborderradius,
                            "border-radius": _.cursorborderradius
                        }), t.addClass("nicescroll-cursors"), x.cursor = t;
                        var i = A(N.createElement("div"));
                        i.attr("id", x.id), i.addClass("nicescroll-rails nicescroll-rails-vr");
                        var r, o, s = ["left", "right", "top", "bottom"];
                        for (var a in s) o = s[a], (r = _.railpadding[o] || 0) && i.css("padding-" + o, r + "px");
                        i.append(t), i.width = Math.max(parseFloat(_.cursorwidth), t.outerWidth()), i.css({
                            width: i.width + "px",
                            zIndex: x.zindex,
                            background: _.background,
                            cursor: "default"
                        }), i.visibility = !0, i.scrollable = !0, i.align = "left" == _.railalign ? 0 : 1, x.rail = i;
                        var l, c = x.rail.drag = !1;
                        if (!_.boxzoom || x.ispage || b.isieold || (c = N.createElement("div"), x.bind(c, "click", x.doZoom), x.bind(c, "mouseenter", function() {
                            x.zoom.css("opacity", _.cursoropacitymax)
                        }), x.bind(c, "mouseleave", function() {
                            x.zoom.css("opacity", _.cursoropacitymin)
                        }), x.zoom = A(c), x.zoom.css({
                            cursor: "pointer",
                            zIndex: x.zindex,
                            backgroundImage: "url(" + _.scriptpath + "zoomico.png)",
                            height: 18,
                            width: 18,
                            backgroundPosition: "0 0"
                        }), _.dblclickzoom && x.bind(x.win, "dblclick", x.doZoom), b.cantouch && _.gesturezoom && (x.ongesturezoom = function(e) {
                            return 1.5 < e.scale && x.doZoomIn(e), e.scale < .8 && x.doZoomOut(e), x.cancelEvent(e)
                        }, x.bind(x.win, "gestureend", x.ongesturezoom))), x.railh = !1, _.horizrailenabled && (x.css(e, {
                            overflowX: "hidden"
                        }), (t = A(N.createElement("div"))).css({
                            position: "absolute",
                            top: 0,
                            height: _.cursorwidth,
                            width: 0,
                            backgroundColor: _.cursorcolor,
                            border: _.cursorborder,
                            backgroundClip: "padding-box",
                            "-webkit-border-radius": _.cursorborderradius,
                            "-moz-border-radius": _.cursorborderradius,
                            "border-radius": _.cursorborderradius
                        }), b.isieold && t.css("overflow", "hidden"), t.addClass("nicescroll-cursors"), x.cursorh = t, (l = A(N.createElement("div"))).attr("id", x.id + "-hr"), l.addClass("nicescroll-rails nicescroll-rails-hr"), l.height = Math.max(parseFloat(_.cursorwidth), t.outerHeight()), l.css({
                            height: l.height + "px",
                            zIndex: x.zindex,
                            background: _.background
                        }), l.append(t), l.visibility = !0, l.scrollable = !0, l.align = "top" == _.railvalign ? 0 : 1, x.railh = l, x.railh.drag = !1), x.ispage) i.css({
                            position: "fixed",
                            top: 0,
                            height: "100%"
                        }), i.css(i.align ? {
                            right: 0
                        } : {
                            left: 0
                        }), x.body.append(i), x.railh && (l.css({
                            position: "fixed",
                            left: 0,
                            width: "100%"
                        }), l.css(l.align ? {
                            bottom: 0
                        } : {
                            top: 0
                        }), x.body.append(l));
                        else {
                            if (x.ishwscroll) {
                                "static" == x.win.css("position") && x.css(x.win, {
                                    position: "relative"
                                });
                                var u = "HTML" == x.win[0].nodeName ? x.body : x.win;
                                A(u).scrollTop(0).scrollLeft(0), x.zoom && (x.zoom.css({
                                    position: "absolute",
                                    top: 1,
                                    right: 0,
                                    "margin-right": i.width + 4
                                }), u.append(x.zoom)), i.css({
                                    position: "absolute",
                                    top: 0
                                }), i.css(i.align ? {
                                    right: 0
                                } : {
                                    left: 0
                                }), u.append(i), l && (l.css({
                                    position: "absolute",
                                    left: 0,
                                    bottom: 0
                                }), l.css(l.align ? {
                                    bottom: 0
                                } : {
                                    top: 0
                                }), u.append(l))
                            } else {
                                x.isfixed = "fixed" == x.win.css("position");
                                var h = x.isfixed ? "fixed" : "absolute";
                                x.isfixed || (x.viewport = x.getViewport(x.win[0])), x.viewport && (x.body = x.viewport, /fixed|absolute/.test(x.viewport.css("position")) || x.css(x.viewport, {
                                    position: "relative"
                                })), i.css({
                                    position: h
                                }), x.zoom && x.zoom.css({
                                    position: h
                                }), x.updateScrollBar(), x.body.append(i), x.zoom && x.body.append(x.zoom), x.railh && (l.css({
                                    position: h
                                }), x.body.append(l))
                            }
                            b.isios && x.css(x.win, {
                                "-webkit-tap-highlight-color": "rgba(0,0,0,0)",
                                "-webkit-touch-callout": "none"
                            }), _.disableoutline && (b.isie && x.win.attr("hideFocus", "true"), b.iswebkit && x.win.css("outline", "none"))
                        }
                        if (!1 === _.autohidemode ? (x.autohidedom = !1, x.rail.css({
                            opacity: _.cursoropacitymax
                        }), x.railh && x.railh.css({
                            opacity: _.cursoropacitymax
                        })) : !0 === _.autohidemode || "leave" === _.autohidemode ? (x.autohidedom = A().add(x.rail), b.isie8 && (x.autohidedom = x.autohidedom.add(x.cursor)), x.railh && (x.autohidedom = x.autohidedom.add(x.railh)), x.railh && b.isie8 && (x.autohidedom = x.autohidedom.add(x.cursorh))) : "scroll" == _.autohidemode ? (x.autohidedom = A().add(x.rail), x.railh && (x.autohidedom = x.autohidedom.add(x.railh))) : "cursor" == _.autohidemode ? (x.autohidedom = A().add(x.cursor), x.railh && (x.autohidedom = x.autohidedom.add(x.cursorh))) : "hidden" == _.autohidemode && (x.autohidedom = !1, x.hide(), x.railslocked = !1), b.cantouch || x.istouchcapable || _.emulatetouch || b.hasmstouch) {
                            x.scrollmom = new F(x), x.ontouchstart = function(e) {
                                if (x.locked) return !1;
                                if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !1;
                                if (x.hasmoving = !1, x.scrollmom.timer && (x.triggerScrollEnd(), x.scrollmom.stop()), !x.railslocked) {
                                    var t = x.getTarget(e);
                                    if (t && /INPUT/i.test(t.nodeName) && /range/i.test(t.type)) return x.stopPropagation(e);
                                    var n = "mousedown" === e.type;
                                    if (!("clientX" in e) && "changedTouches" in e && (e.clientX = e.changedTouches[0].clientX, e.clientY = e.changedTouches[0].clientY), x.forcescreen) {
                                        var i = e;
                                        (e = {
                                            original: e.original ? e.original : e
                                        }).clientX = i.screenX, e.clientY = i.screenY
                                    }
                                    if (x.rail.drag = {
                                        x: e.clientX,
                                        y: e.clientY,
                                        sx: x.scroll.x,
                                        sy: x.scroll.y,
                                        st: x.getScrollTop(),
                                        sl: x.getScrollLeft(),
                                        pt: 2,
                                        dl: !1,
                                        tg: t
                                    }, x.ispage || !_.directionlockdeadzone) x.rail.drag.dl = "f";
                                    else {
                                        var r = I.width(),
                                            o = I.height(),
                                            s = x.getContentSize(),
                                            a = s.h - o,
                                            l = s.w - r;
                                        x.rail.scrollable && !x.railh.scrollable ? x.rail.drag.ck = 0 < a && "v" : !x.rail.scrollable && x.railh.scrollable ? x.rail.drag.ck = 0 < l && "h" : x.rail.drag.ck = !1
                                    }
                                    if (_.emulatetouch && x.isiframe && b.isie) {
                                        var c = x.win.position();
                                        x.rail.drag.x += c.left, x.rail.drag.y += c.top
                                    }
                                    if (x.hasmoving = !1, x.lastmouseup = !1, x.scrollmom.reset(e.clientX, e.clientY), t && n) {
                                        if (!/INPUT|SELECT|BUTTON|TEXTAREA/i.test(t.nodeName)) return b.hasmousecapture && t.setCapture(), _.emulatetouch ? (t.onclick && !t._onclick && (t._onclick = t.onclick, t.onclick = function(e) {
                                            if (x.hasmoving) return !1;
                                            t._onclick.call(this, e)
                                        }), x.cancelEvent(e)) : x.stopPropagation(e);
                                        /SUBMIT|CANCEL|BUTTON/i.test(A(t).attr("type")) && (x.preventclick = {
                                            tg: t,
                                            click: !1
                                        })
                                    }
                                }
                            }, x.ontouchend = function(e) {
                                if (!x.rail.drag) return !0;
                                if (2 == x.rail.drag.pt) {
                                    if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !1;
                                    x.rail.drag = !1;
                                    var t = "mouseup" === e.type;
                                    if (x.hasmoving && (x.scrollmom.doMomentum(), x.lastmouseup = !0, x.hideCursor(), b.hasmousecapture && N.releaseCapture(), t)) return x.cancelEvent(e)
                                } else if (1 == x.rail.drag.pt) return x.onmouseup(e)
                            };
                            var p = _.emulatetouch && x.isiframe && !b.hasmousecapture,
                                m = .3 * _.directionlockdeadzone | 0;
                            x.ontouchmove = function(e, t) {
                                if (!x.rail.drag) return !0;
                                if (e.targetTouches && _.preventmultitouchscrolling && 1 < e.targetTouches.length) return !0;
                                if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !0;
                                if (2 != x.rail.drag.pt) return 1 == x.rail.drag.pt ? x.onmousemove(e) : void 0;
                                var n, i;
                                if ("changedTouches" in e && (e.clientX = e.changedTouches[0].clientX, e.clientY = e.changedTouches[0].clientY), i = n = 0, p && !t) {
                                    var r = x.win.position();
                                    i = -r.left, n = -r.top
                                }
                                var o = e.clientY + n,
                                    s = o - x.rail.drag.y,
                                    a = e.clientX + i,
                                    l = a - x.rail.drag.x,
                                    c = x.rail.drag.st - s;
                                if (x.ishwscroll && _.bouncescroll) c < 0 ? c = Math.round(c / 2) : c > x.page.maxh && (c = x.page.maxh + Math.round((c - x.page.maxh) / 2));
                                else if (c < 0 ? o = c = 0 : c > x.page.maxh && (c = x.page.maxh, o = 0), 0 === o && !x.hasmoving) return x.ispage || (x.rail.drag = !1), !0;
                                var u = x.getScrollLeft();
                                if (x.railh && x.railh.scrollable && (u = x.isrtlmode ? l - x.rail.drag.sl : x.rail.drag.sl - l, x.ishwscroll && _.bouncescroll ? u < 0 ? u = Math.round(u / 2) : u > x.page.maxw && (u = x.page.maxw + Math.round((u - x.page.maxw) / 2)) : (u < 0 && (a = u = 0), u > x.page.maxw && (u = x.page.maxw, a = 0))), !x.hasmoving) {
                                    if (x.rail.drag.y === e.clientY && x.rail.drag.x === e.clientX) return x.cancelEvent(e);
                                    var h = Math.abs(s),
                                        d = Math.abs(l),
                                        f = _.directionlockdeadzone;
                                    if (x.rail.drag.ck ? "v" == x.rail.drag.ck ? f < d && h <= m ? x.rail.drag = !1 : f < h && (x.rail.drag.dl = "v") : "h" == x.rail.drag.ck && (f < h && d <= m ? x.rail.drag = !1 : f < d && (x.rail.drag.dl = "h")) : f < h && f < d ? x.rail.drag.dl = "f" : f < h ? x.rail.drag.dl = m < d ? "f" : "v" : f < d && (x.rail.drag.dl = m < h ? "f" : "h"), !x.rail.drag.dl) return x.cancelEvent(e);
                                    x.triggerScrollStart(e.clientX, e.clientY, 0, 0, 0), x.hasmoving = !0
                                }
                                return x.preventclick && !x.preventclick.click && (x.preventclick.click = x.preventclick.tg.onclick || !1, x.preventclick.tg.onclick = x.onpreventclick), x.rail.drag.dl && ("v" == x.rail.drag.dl ? u = x.rail.drag.sl : "h" == x.rail.drag.dl && (c = x.rail.drag.st)), x.synched("touchmove", function() {
                                    x.rail.drag && 2 == x.rail.drag.pt && (x.prepareTransition && x.resetTransition(), x.rail.scrollable && x.setScrollTop(c), x.scrollmom.update(a, o), x.railh && x.railh.scrollable ? (x.setScrollLeft(u), x.showCursor(c, u)) : x.showCursor(c), b.isie10 && N.selection.clear())
                                }), x.cancelEvent(e)
                            }, x.ontouchstartCursor = function(e, t) {
                                if (!x.rail.drag || 3 == x.rail.drag.pt) {
                                    if (x.locked) return x.cancelEvent(e);
                                    x.cancelScroll(), x.rail.drag = {
                                        x: e.touches[0].clientX,
                                        y: e.touches[0].clientY,
                                        sx: x.scroll.x,
                                        sy: x.scroll.y,
                                        pt: 3,
                                        hr: !!t
                                    };
                                    var n = x.getTarget(e);
                                    return !x.ispage && b.hasmousecapture && n.setCapture(), x.isiframe && !b.hasmousecapture && (x.saved.csspointerevents = x.doc.css("pointer-events"), x.css(x.doc, {
                                        "pointer-events": "none"
                                    })), x.cancelEvent(e)
                                }
                            }, x.ontouchendCursor = function(e) {
                                if (x.rail.drag) {
                                    if (b.hasmousecapture && N.releaseCapture(), x.isiframe && !b.hasmousecapture && x.doc.css("pointer-events", x.saved.csspointerevents), 3 != x.rail.drag.pt) return;
                                    return x.rail.drag = !1, x.cancelEvent(e)
                                }
                            }, x.ontouchmoveCursor = function(e) {
                                if (x.rail.drag) {
                                    if (3 != x.rail.drag.pt) return;
                                    if (x.cursorfreezed = !0, x.rail.drag.hr) {
                                        x.scroll.x = x.rail.drag.sx + (e.touches[0].clientX - x.rail.drag.x), x.scroll.x < 0 && (x.scroll.x = 0);
                                        var t = x.scrollvaluemaxw;
                                        x.scroll.x > t && (x.scroll.x = t)
                                    } else {
                                        x.scroll.y = x.rail.drag.sy + (e.touches[0].clientY - x.rail.drag.y), x.scroll.y < 0 && (x.scroll.y = 0);
                                        var n = x.scrollvaluemax;
                                        x.scroll.y > n && (x.scroll.y = n)
                                    }
                                    return x.synched("touchmove", function() {
                                        x.rail.drag && 3 == x.rail.drag.pt && (x.showCursor(), x.rail.drag.hr ? x.doScrollLeft(Math.round(x.scroll.x * x.scrollratio.x), _.cursordragspeed) : x.doScrollTop(Math.round(x.scroll.y * x.scrollratio.y), _.cursordragspeed))
                                    }), x.cancelEvent(e)
                                }
                            }
                        }
                        if (x.onmousedown = function(e, t) {
                            if (!x.rail.drag || 1 == x.rail.drag.pt) {
                                if (x.railslocked) return x.cancelEvent(e);
                                x.cancelScroll(), x.rail.drag = {
                                    x: e.clientX,
                                    y: e.clientY,
                                    sx: x.scroll.x,
                                    sy: x.scroll.y,
                                    pt: 1,
                                    hr: t || !1
                                };
                                var n = x.getTarget(e);
                                return b.hasmousecapture && n.setCapture(), x.isiframe && !b.hasmousecapture && (x.saved.csspointerevents = x.doc.css("pointer-events"), x.css(x.doc, {
                                    "pointer-events": "none"
                                })), x.hasmoving = !1, x.cancelEvent(e)
                            }
                        }, x.onmouseup = function(e) {
                            if (x.rail.drag) return 1 != x.rail.drag.pt || (b.hasmousecapture && N.releaseCapture(), x.isiframe && !b.hasmousecapture && x.doc.css("pointer-events", x.saved.csspointerevents), x.rail.drag = !1, x.cursorfreezed = !1, x.hasmoving && x.triggerScrollEnd(), x.cancelEvent(e))
                        }, x.onmousemove = function(e) {
                            if (x.rail.drag) {
                                if (1 !== x.rail.drag.pt) return;
                                if (b.ischrome && 0 === e.which) return x.onmouseup(e);
                                if (x.cursorfreezed = !0, x.hasmoving || x.triggerScrollStart(e.clientX, e.clientY, 0, 0, 0), x.hasmoving = !0, x.rail.drag.hr) {
                                    x.scroll.x = x.rail.drag.sx + (e.clientX - x.rail.drag.x), x.scroll.x < 0 && (x.scroll.x = 0);
                                    var t = x.scrollvaluemaxw;
                                    x.scroll.x > t && (x.scroll.x = t)
                                } else {
                                    x.scroll.y = x.rail.drag.sy + (e.clientY - x.rail.drag.y), x.scroll.y < 0 && (x.scroll.y = 0);
                                    var n = x.scrollvaluemax;
                                    x.scroll.y > n && (x.scroll.y = n)
                                }
                                return x.synched("mousemove", function() {
                                    x.cursorfreezed && (x.showCursor(), x.rail.drag.hr ? x.scrollLeft(Math.round(x.scroll.x * x.scrollratio.x)) : x.scrollTop(Math.round(x.scroll.y * x.scrollratio.y)))
                                }), x.cancelEvent(e)
                            }
                            x.checkarea = 0
                        }, b.cantouch || _.emulatetouch) x.onpreventclick = function(e) {
                            if (x.preventclick) return x.preventclick.tg.onclick = x.preventclick.click, x.preventclick = !1, x.cancelEvent(e)
                        }, x.onclick = !b.isios && function(e) {
                            return !x.lastmouseup || (x.lastmouseup = !1, x.cancelEvent(e))
                        }, _.grabcursorenabled && b.cursorgrabvalue && (x.css(x.ispage ? x.doc : x.win, {
                            cursor: b.cursorgrabvalue
                        }), x.css(x.rail, {
                            cursor: b.cursorgrabvalue
                        }));
                        else {
                            var d = function(e) {
                                if (x.selectiondrag) {
                                    if (e) {
                                        var t = x.win.outerHeight(),
                                            n = e.pageY - x.selectiondrag.top;
                                        0 < n && n < t && (n = 0), t <= n && (n -= t), x.selectiondrag.df = n
                                    }
                                    if (0 !== x.selectiondrag.df) {
                                        var i = -2 * x.selectiondrag.df / 6 | 0;
                                        x.doScrollBy(i), x.debounced("doselectionscroll", function() {
                                            d()
                                        }, 50)
                                    }
                                }
                            };
                            x.hasTextSelected = "getSelection" in N ? function() {
                                return 0 < N.getSelection().rangeCount
                            } : "selection" in N ? function() {
                                return "None" != N.selection.type
                            } : function() {
                                return !1
                            }, x.onselectionstart = function(e) {
                                x.ispage || (x.selectiondrag = x.win.offset())
                            }, x.onselectionend = function(e) {
                                x.selectiondrag = !1
                            }, x.onselectiondrag = function(e) {
                                x.selectiondrag && x.hasTextSelected() && x.debounced("selectionscroll", function() {
                                    d(e)
                                }, 250)
                            }
                        }
                        if (b.hasw3ctouch ? (x.css(x.ispage ? A("html") : x.win, {
                            "touch-action": "none"
                        }), x.css(x.rail, {
                            "touch-action": "none"
                        }), x.css(x.cursor, {
                            "touch-action": "none"
                        }), x.bind(x.win, "pointerdown", x.ontouchstart), x.bind(N, "pointerup", x.ontouchend), x.delegate(N, "pointermove", x.ontouchmove)) : b.hasmstouch ? (x.css(x.ispage ? A("html") : x.win, {
                            "-ms-touch-action": "none"
                        }), x.css(x.rail, {
                            "-ms-touch-action": "none"
                        }), x.css(x.cursor, {
                            "-ms-touch-action": "none"
                        }), x.bind(x.win, "MSPointerDown", x.ontouchstart), x.bind(N, "MSPointerUp", x.ontouchend), x.delegate(N, "MSPointerMove", x.ontouchmove), x.bind(x.cursor, "MSGestureHold", function(e) {
                            e.preventDefault()
                        }), x.bind(x.cursor, "contextmenu", function(e) {
                            e.preventDefault()
                        })) : b.cantouch && (x.bind(x.win, "touchstart", x.ontouchstart, !1, !0), x.bind(N, "touchend", x.ontouchend, !1, !0), x.bind(N, "touchcancel", x.ontouchend, !1, !0), x.delegate(N, "touchmove", x.ontouchmove, !1, !0)), _.emulatetouch && (x.bind(x.win, "mousedown", x.ontouchstart, !1, !0), x.bind(N, "mouseup", x.ontouchend, !1, !0), x.bind(N, "mousemove", x.ontouchmove, !1, !0)), (_.cursordragontouch || !b.cantouch && !_.emulatetouch) && (x.rail.css({
                            cursor: "default"
                        }), x.railh && x.railh.css({
                            cursor: "default"
                        }), x.jqbind(x.rail, "mouseenter", function() {
                            if (!x.ispage && !x.win.is(":visible")) return !1;
                            x.canshowonmouseevent && x.showCursor(), x.rail.active = !0
                        }), x.jqbind(x.rail, "mouseleave", function() {
                            x.rail.active = !1, x.rail.drag || x.hideCursor()
                        }), _.sensitiverail && (x.bind(x.rail, "click", function(e) {
                            x.doRailClick(e, !1, !1)
                        }), x.bind(x.rail, "dblclick", function(e) {
                            x.doRailClick(e, !0, !1)
                        }), x.bind(x.cursor, "click", function(e) {
                            x.cancelEvent(e)
                        }), x.bind(x.cursor, "dblclick", function(e) {
                            x.cancelEvent(e)
                        })), x.railh && (x.jqbind(x.railh, "mouseenter", function() {
                            if (!x.ispage && !x.win.is(":visible")) return !1;
                            x.canshowonmouseevent && x.showCursor(), x.rail.active = !0
                        }), x.jqbind(x.railh, "mouseleave", function() {
                            x.rail.active = !1, x.rail.drag || x.hideCursor()
                        }), _.sensitiverail && (x.bind(x.railh, "click", function(e) {
                            x.doRailClick(e, !1, !0)
                        }), x.bind(x.railh, "dblclick", function(e) {
                            x.doRailClick(e, !0, !0)
                        }), x.bind(x.cursorh, "click", function(e) {
                            x.cancelEvent(e)
                        }), x.bind(x.cursorh, "dblclick", function(e) {
                            x.cancelEvent(e)
                        })))), _.cursordragontouch && (this.istouchcapable || b.cantouch) && (x.bind(x.cursor, "touchstart", x.ontouchstartCursor), x.bind(x.cursor, "touchmove", x.ontouchmoveCursor), x.bind(x.cursor, "touchend", x.ontouchendCursor), x.cursorh && x.bind(x.cursorh, "touchstart", function(e) {
                            x.ontouchstartCursor(e, !0)
                        }), x.cursorh && x.bind(x.cursorh, "touchmove", x.ontouchmoveCursor), x.cursorh && x.bind(x.cursorh, "touchend", x.ontouchendCursor)), _.emulatetouch || b.isandroid || b.isios ? (x.bind(b.hasmousecapture ? x.win : N, "mouseup", x.ontouchend), x.onclick && x.bind(N, "click", x.onclick), _.cursordragontouch ? (x.bind(x.cursor, "mousedown", x.onmousedown), x.bind(x.cursor, "mouseup", x.onmouseup), x.cursorh && x.bind(x.cursorh, "mousedown", function(e) {
                            x.onmousedown(e, !0)
                        }), x.cursorh && x.bind(x.cursorh, "mouseup", x.onmouseup)) : (x.bind(x.rail, "mousedown", function(e) {
                            e.preventDefault()
                        }), x.railh && x.bind(x.railh, "mousedown", function(e) {
                            e.preventDefault()
                        }))) : (x.bind(b.hasmousecapture ? x.win : N, "mouseup", x.onmouseup), x.bind(N, "mousemove", x.onmousemove), x.onclick && x.bind(N, "click", x.onclick), x.bind(x.cursor, "mousedown", x.onmousedown), x.bind(x.cursor, "mouseup", x.onmouseup), x.railh && (x.bind(x.cursorh, "mousedown", function(e) {
                            x.onmousedown(e, !0)
                        }), x.bind(x.cursorh, "mouseup", x.onmouseup)), !x.ispage && _.enablescrollonselection && (x.bind(x.win[0], "mousedown", x.onselectionstart), x.bind(N, "mouseup", x.onselectionend), x.bind(x.cursor, "mouseup", x.onselectionend), x.cursorh && x.bind(x.cursorh, "mouseup", x.onselectionend), x.bind(N, "mousemove", x.onselectiondrag)), x.zoom && (x.jqbind(x.zoom, "mouseenter", function() {
                            x.canshowonmouseevent && x.showCursor(), x.rail.active = !0
                        }), x.jqbind(x.zoom, "mouseleave", function() {
                            x.rail.active = !1, x.rail.drag || x.hideCursor()
                        }))), _.enablemousewheel && (x.isiframe || x.mousewheel(b.isie && x.ispage ? N : x.win, x.onmousewheel), x.mousewheel(x.rail, x.onmousewheel), x.railh && x.mousewheel(x.railh, x.onmousewheelhr)), x.ispage || b.cantouch || /HTML|^BODY/.test(x.win[0].nodeName) || (x.win.attr("tabindex") || x.win.attr({
                            tabindex: ++C
                        }), x.bind(x.win, "focus", function(e) {
                            k = x.getTarget(e).id || x.getTarget(e) || !1, x.hasfocus = !0, x.canshowonmouseevent && x.noticeCursor()
                        }), x.bind(x.win, "blur", function(e) {
                            k = !1, x.hasfocus = !1
                        }), x.bind(x.win, "mouseenter", function(e) {
                            M = x.getTarget(e).id || x.getTarget(e) || !1, x.hasmousefocus = !0, x.canshowonmouseevent && x.noticeCursor()
                        }), x.bind(x.win, "mouseleave", function(e) {
                            M = !1, x.hasmousefocus = !1, x.rail.drag || x.hideCursor()
                        })), x.onkeypress = function(e) {
                            if (x.railslocked && 0 === x.page.maxh) return !0;
                            e = e || L.event;
                            var t = x.getTarget(e);
                            if (t && /INPUT|TEXTAREA|SELECT|OPTION/.test(t.nodeName) && (!t.getAttribute("type") && !t.type || !/submit|button|cancel/i.tp)) return !0;
                            if (A(t).attr("contenteditable")) return !0;
                            if (x.hasfocus || x.hasmousefocus && !k || x.ispage && !k && !M) {
                                var n = e.keyCode;
                                if (x.railslocked && 27 != n) return x.cancelEvent(e);
                                var i = e.ctrlKey || !1,
                                    r = e.shiftKey || !1,
                                    o = !1;
                                switch (n) {
                                    case 38:
                                    case 63233:
                                        x.doScrollBy(72), o = !0;
                                        break;
                                    case 40:
                                    case 63235:
                                        x.doScrollBy(-72), o = !0;
                                        break;
                                    case 37:
                                    case 63232:
                                        x.railh && (i ? x.doScrollLeft(0) : x.doScrollLeftBy(72), o = !0);
                                        break;
                                    case 39:
                                    case 63234:
                                        x.railh && (i ? x.doScrollLeft(x.page.maxw) : x.doScrollLeftBy(-72), o = !0);
                                        break;
                                    case 33:
                                    case 63276:
                                        x.doScrollBy(x.view.h), o = !0;
                                        break;
                                    case 34:
                                    case 63277:
                                        x.doScrollBy(-x.view.h), o = !0;
                                        break;
                                    case 36:
                                    case 63273:
                                        x.railh && i ? x.doScrollPos(0, 0) : x.doScrollTo(0), o = !0;
                                        break;
                                    case 35:
                                    case 63275:
                                        x.railh && i ? x.doScrollPos(x.page.maxw, x.page.maxh) : x.doScrollTo(x.page.maxh), o = !0;
                                        break;
                                    case 32:
                                        _.spacebarenabled && (r ? x.doScrollBy(x.view.h) : x.doScrollBy(-x.view.h), o = !0);
                                        break;
                                    case 27:
                                        x.zoomactive && (x.doZoom(), o = !0)
                                }
                                if (o) return x.cancelEvent(e)
                            }
                        }, _.enablekeyboard && x.bind(N, b.isopera && !b.isopera12 ? "keypress" : "keydown", x.onkeypress), x.bind(N, "keydown", function(e) {
                            e.ctrlKey && (x.wheelprevented = !0)
                        }), x.bind(N, "keyup", function(e) {
                            e.ctrlKey || (x.wheelprevented = !1)
                        }), x.bind(L, "blur", function(e) {
                            x.wheelprevented = !1
                        }), x.bind(L, "resize", x.onscreenresize), x.bind(L, "orientationchange", x.onscreenresize), x.bind(L, "load", x.lazyResize), b.ischrome && !x.ispage && !x.haswrapper) {
                            var f = x.win.attr("style"),
                                g = parseFloat(x.win.css("width")) + 1;
                            x.win.css("width", g), x.synched("chromefix", function() {
                                x.win.attr("style", f)
                            })
                        }
                        if (x.onAttributeChange = function(e) {
                            x.lazyResize(x.isieold ? 250 : 30)
                        }, _.enableobserver && (x.isie11 || !1 === z || (x.observerbody = new z(function(e) {
                            if (e.forEach(function(e) {
                                if ("attributes" == e.type) return w.hasClass("modal-open") && w.hasClass("modal-dialog") && !A.contains(A(".modal-dialog")[0], x.doc[0]) ? x.hide() : x.show()
                            }), x.me.clientWidth != x.page.width || x.me.clientHeight != x.page.height) return x.lazyResize(30)
                        }), x.observerbody.observe(N.body, {
                            childList: !0,
                            subtree: !0,
                            characterData: !1,
                            attributes: !0,
                            attributeFilter: ["class"]
                        })), !x.ispage && !x.haswrapper)) {
                            var y = x.win[0];
                            !1 !== z ? (x.observer = new z(function(e) {
                                e.forEach(x.onAttributeChange)
                            }), x.observer.observe(y, {
                                childList: !0,
                                characterData: !1,
                                attributes: !0,
                                subtree: !1
                            }), x.observerremover = new z(function(e) {
                                e.forEach(function(e) {
                                    if (0 < e.removedNodes.length)
                                        for (var t in e.removedNodes)
                                            if (x && e.removedNodes[t] === y) return x.remove()
                                })
                            }), x.observerremover.observe(y.parentNode, {
                                childList: !0,
                                characterData: !1,
                                attributes: !1,
                                subtree: !1
                            })) : (x.bind(y, b.isie && !b.isie9 ? "propertychange" : "DOMAttrModified", x.onAttributeChange), b.isie9 && y.attachEvent("onpropertychange", x.onAttributeChange), x.bind(y, "DOMNodeRemoved", function(e) {
                                e.target === y && x.remove()
                            }))
                        }!x.ispage && _.boxzoom && x.bind(L, "resize", x.resizeZoom), x.istextarea && (x.bind(x.win, "keydown", x.lazyResize), x.bind(x.win, "mouseup", x.lazyResize)), x.lazyResize(30)
                    }
                    if ("IFRAME" == this.doc[0].nodeName) {
                        var v = function() {
                            var t;
                            x.iframexd = !1;
                            try {
                                (t = "contentDocument" in this ? this.contentDocument : this.contentWindow._doc).domain
                            } catch (e) {
                                t = !(x.iframexd = !0)
                            }
                            if (x.iframexd) return "console" in L && console.log("NiceScroll error: policy restriced iframe"), !0;
                            if (x.forcescreen = !0, x.isiframe && (x.iframe = {
                                doc: A(t),
                                html: x.doc.contents().find("html")[0],
                                body: x.doc.contents().find("body")[0]
                            }, x.getContentSize = function() {
                                return {
                                    w: Math.max(x.iframe.html.scrollWidth, x.iframe.body.scrollWidth),
                                    h: Math.max(x.iframe.html.scrollHeight, x.iframe.body.scrollHeight)
                                }
                            }, x.docscroll = A(x.iframe.body)), !b.isios && _.iframeautoresize && !x.isiframe) {
                                x.win.scrollTop(0), x.doc.height("");
                                var e = Math.max(t.getElementsByTagName("html")[0].scrollHeight, t.body.scrollHeight);
                                x.doc.height(e)
                            }
                            x.lazyResize(30), x.css(A(x.iframe.body), n), b.isios && x.haswrapper && x.css(A(t.body), {
                                "-webkit-transform": "translate3d(0,0,0)"
                            }), "contentWindow" in this ? x.bind(this.contentWindow, "scroll", x.onscroll) : x.bind(t, "scroll", x.onscroll), _.enablemousewheel && x.mousewheel(t, x.onmousewheel), _.enablekeyboard && x.bind(t, b.isopera ? "keypress" : "keydown", x.onkeypress), b.cantouch ? (x.bind(t, "touchstart", x.ontouchstart), x.bind(t, "touchmove", x.ontouchmove)) : _.emulatetouch && (x.bind(t, "mousedown", x.ontouchstart), x.bind(t, "mousemove", function(e) {
                                return x.ontouchmove(e, !0)
                            }), _.grabcursorenabled && b.cursorgrabvalue && x.css(A(t.body), {
                                cursor: b.cursorgrabvalue
                            })), x.bind(t, "mouseup", x.ontouchend), x.zoom && (_.dblclickzoom && x.bind(t, "dblclick", x.doZoom), x.ongesturezoom && x.bind(t, "gestureend", x.ongesturezoom))
                        };
                        this.doc[0].readyState && "complete" === this.doc[0].readyState && setTimeout(function() {
                            v.call(x.doc[0], !1)
                        }, 500), x.bind(this.doc, "load", v)
                    }
                }, this.showCursor = function(e, t) {
                    if (x.cursortimeout && (clearTimeout(x.cursortimeout), x.cursortimeout = 0), x.rail) {
                        if (x.autohidedom && (x.autohidedom.stop().css({
                            opacity: _.cursoropacitymax
                        }), x.cursoractive = !0), x.rail.drag && 1 == x.rail.drag.pt || (void 0 !== e && !1 !== e && (x.scroll.y = e / x.scrollratio.y | 0), void 0 !== t && (x.scroll.x = t / x.scrollratio.x | 0)), x.cursor.css({
                            height: x.cursorheight,
                            top: x.scroll.y
                        }), x.cursorh) {
                            var n = x.hasreversehr ? x.scrollvaluemaxw - x.scroll.x : x.scroll.x;
                            x.cursorh.css({
                                width: x.cursorwidth,
                                left: !x.rail.align && x.rail.visibility ? n + x.rail.width : n
                            }), x.cursoractive = !0
                        }
                        x.zoom && x.zoom.stop().css({
                            opacity: _.cursoropacitymax
                        })
                    }
                }, this.hideCursor = function(e) {
                    x.cursortimeout || x.rail && x.autohidedom && (x.hasmousefocus && "leave" === _.autohidemode || (x.cursortimeout = setTimeout(function() {
                        x.rail.active && x.showonmouseevent || (x.autohidedom.stop().animate({
                            opacity: _.cursoropacitymin
                        }), x.zoom && x.zoom.stop().animate({
                            opacity: _.cursoropacitymin
                        }), x.cursoractive = !1), x.cursortimeout = 0
                    }, e || _.hidecursordelay)))
                }, this.noticeCursor = function(e, t, n) {
                    x.showCursor(t, n), x.rail.active || x.hideCursor(e)
                }, this.getContentSize = x.ispage ? function() {
                    return {
                        w: Math.max(N.body.scrollWidth, N.documentElement.scrollWidth),
                        h: Math.max(N.body.scrollHeight, N.documentElement.scrollHeight)
                    }
                } : x.haswrapper ? function() {
                    return {
                        w: x.doc[0].offsetWidth,
                        h: x.doc[0].offsetHeight
                    }
                } : function() {
                    return {
                        w: x.docscroll[0].scrollWidth,
                        h: x.docscroll[0].scrollHeight
                    }
                }, this.onResize = function(e, t) {
                    if (!x || !x.win) return !1;
                    var n = x.page.maxh,
                        i = x.page.maxw,
                        r = x.view.h,
                        o = x.view.w;
                    if (x.view = {
                        w: x.ispage ? x.win.width() : x.win[0].clientWidth,
                        h: x.ispage ? x.win.height() : x.win[0].clientHeight
                    }, x.page = t || x.getContentSize(), x.page.maxh = Math.max(0, x.page.h - x.view.h), x.page.maxw = Math.max(0, x.page.w - x.view.w), x.page.maxh == n && x.page.maxw == i && x.view.w == o && x.view.h == r) {
                        if (x.ispage) return x;
                        var s = x.win.offset();
                        if (x.lastposition) {
                            var a = x.lastposition;
                            if (a.top == s.top && a.left == s.left) return x
                        }
                        x.lastposition = s
                    }
                    return 0 === x.page.maxh ? (x.hideRail(), x.scrollvaluemax = 0, x.scroll.y = 0, x.scrollratio.y = 0, x.cursorheight = 0, x.setScrollTop(0), x.rail && (x.rail.scrollable = !1)) : (x.page.maxh -= _.railpadding.top + _.railpadding.bottom, x.rail.scrollable = !0), 0 === x.page.maxw ? (x.hideRailHr(), x.scrollvaluemaxw = 0, x.scroll.x = 0, x.scrollratio.x = 0, x.cursorwidth = 0, x.setScrollLeft(0), x.railh && (x.railh.scrollable = !1)) : (x.page.maxw -= _.railpadding.left + _.railpadding.right, x.railh && (x.railh.scrollable = _.horizrailenabled)), x.railslocked = x.locked || 0 === x.page.maxh && 0 === x.page.maxw, x.railslocked ? (x.ispage || x.updateScrollBar(x.view), !1) : (x.hidden || (x.rail.visibility || x.showRail(), x.railh && !x.railh.visibility && x.showRailHr()), x.istextarea && x.win.css("resize") && "none" != x.win.css("resize") && (x.view.h -= 20), x.cursorheight = Math.min(x.view.h, Math.round(x.view.h * (x.view.h / x.page.h))), x.cursorheight = _.cursorfixedheight ? _.cursorfixedheight : Math.max(_.cursorminheight, x.cursorheight), x.cursorwidth = Math.min(x.view.w, Math.round(x.view.w * (x.view.w / x.page.w))), x.cursorwidth = _.cursorfixedheight ? _.cursorfixedheight : Math.max(_.cursorminheight, x.cursorwidth), x.scrollvaluemax = x.view.h - x.cursorheight - (_.railpadding.top + _.railpadding.bottom), x.hasborderbox || (x.scrollvaluemax -= x.cursor[0].offsetHeight - x.cursor[0].clientHeight), x.railh && (x.railh.width = 0 < x.page.maxh ? x.view.w - x.rail.width : x.view.w, x.scrollvaluemaxw = x.railh.width - x.cursorwidth - (_.railpadding.left + _.railpadding.right)), x.ispage || x.updateScrollBar(x.view), x.scrollratio = {
                        x: x.page.maxw / x.scrollvaluemaxw,
                        y: x.page.maxh / x.scrollvaluemax
                    }, x.getScrollTop() > x.page.maxh ? x.doScrollTop(x.page.maxh) : (x.scroll.y = x.getScrollTop() / x.scrollratio.y | 0, x.scroll.x = x.getScrollLeft() / x.scrollratio.x | 0, x.cursoractive && x.noticeCursor()), x.scroll.y && 0 === x.getScrollTop() && x.doScrollTo(x.scroll.y * x.scrollratio.y | 0), x)
                }, this.resize = x.onResize;
                var f = 0;
                this.onscreenresize = function(e) {
                    clearTimeout(f);
                    var t = !x.ispage && !x.haswrapper;
                    t && x.hideRails(), f = setTimeout(function() {
                        x && (t && x.showRails(), x.resize()), f = 0
                    }, 120)
                }, this.lazyResize = function(e) {
                    return clearTimeout(f), e = isNaN(e) ? 240 : e, f = setTimeout(function() {
                        x && x.resize(), f = 0
                    }, e), x
                }, this.jqbind = function(e, t, n) {
                    x.events.push({
                        e: e,
                        n: t,
                        f: n,
                        q: !0
                    }), A(e).on(t, n)
                };
                var p = !(this.mousewheel = function(e, t, n) {
                    var i = "jquery" in e ? e[0] : e;
                    if ("onwheel" in N.createElement("div")) x._bind(i, "wheel", t, n || !1);
                    else {
                        var r = void 0 !== N.onmousewheel ? "mousewheel" : "DOMMouseScroll";
                        o(i, r, t, n || !1), "DOMMouseScroll" == r && o(i, "MozMousePixelScroll", t, n || !1)
                    }
                });
                if (b.haseventlistener) {
                    try {
                        var m = Object.defineProperty({}, "passive", {
                            get: function() {
                                p = !0
                            }
                        });
                        L.addEventListener("test", null, m)
                    } catch (e) {}
                    this.stopPropagation = function(e) {
                        return !!e && ((e = e.original ? e.original : e).stopPropagation(), !1)
                    }, this.cancelEvent = function(e) {
                        return e.cancelable && e.preventDefault(), e.stopImmediatePropagation(), e.preventManipulation && e.preventManipulation(), !1
                    }
                } else Event.prototype.preventDefault = function() {
                    this.returnValue = !1
                }, Event.prototype.stopPropagation = function() {
                    this.cancelBubble = !0
                }, L.constructor.prototype.addEventListener = N.constructor.prototype.addEventListener = Element.prototype.addEventListener = function(e, t, n) {
                    this.attachEvent("on" + e, t)
                }, L.constructor.prototype.removeEventListener = N.constructor.prototype.removeEventListener = Element.prototype.removeEventListener = function(e, t, n) {
                    this.detachEvent("on" + e, t)
                }, this.cancelEvent = function(e) {
                    return (e = e || L.event) && (e.cancelBubble = !0, e.cancel = !0, e.returnValue = !1), !1
                }, this.stopPropagation = function(e) {
                    return (e = e || L.event) && (e.cancelBubble = !0), !1
                };
                this.delegate = function(e, t, n, i, r) {
                    var o = H[t] || !1;
                    o || (o = {
                        a: [],
                        l: [],
                        f: function(e) {
                            for (var t = o.l, n = !1, i = t.length - 1; 0 <= i; i--)
                                if (!1 === (n = t[i].call(e.target, e))) return !1;
                            return n
                        }
                    }, x.bind(e, t, o.f, i, r), H[t] = o), x.ispage ? (o.a = [x.id].concat(o.a), o.l = [n].concat(o.l)) : (o.a.push(x.id), o.l.push(n))
                }, this.undelegate = function(e, t, n, i, r) {
                    var o = H[t] || !1;
                    if (o && o.l)
                        for (var s = 0, a = o.l.length; s < a; s++) o.a[s] === x.id && (o.a.splice(s), o.l.splice(s), 0 === o.a.length && (x._unbind(e, t, o.l.f), H[t] = null))
                }, this.bind = function(e, t, n, i, r) {
                    var o = "jquery" in e ? e[0] : e;
                    x._bind(o, t, n, i || !1, r || !1)
                }, this._bind = function(e, t, n, i, r) {
                    x.events.push({
                        e: e,
                        n: t,
                        f: n,
                        b: i,
                        q: !1
                    }), p && r ? e.addEventListener(t, n, {
                        passive: !1,
                        capture: i
                    }) : e.addEventListener(t, n, i || !1)
                }, this._unbind = function(e, t, n, i) {
                    H[t] ? x.undelegate(e, t, n, i) : e.removeEventListener(t, n, i)
                }, this.unbindAll = function() {
                    for (var e = 0; e < x.events.length; e++) {
                        var t = x.events[e];
                        t.q ? t.e.unbind(t.n, t.f) : x._unbind(t.e, t.n, t.f, t.b)
                    }
                }, this.showRails = function() {
                    return x.showRail().showRailHr()
                }, this.showRail = function() {
                    return 0 === x.page.maxh || !x.ispage && "none" == x.win.css("display") || (x.rail.visibility = !0, x.rail.css("display", "block")), x
                }, this.showRailHr = function() {
                    return x.railh && (0 === x.page.maxw || !x.ispage && "none" == x.win.css("display") || (x.railh.visibility = !0, x.railh.css("display", "block"))), x
                }, this.hideRails = function() {
                    return x.hideRail().hideRailHr()
                }, this.hideRail = function() {
                    return x.rail.visibility = !1, x.rail.css("display", "none"), x
                }, this.hideRailHr = function() {
                    return x.railh && (x.railh.visibility = !1, x.railh.css("display", "none")), x
                }, this.show = function() {
                    return x.hidden = !1, x.railslocked = !1, x.showRails()
                }, this.hide = function() {
                    return x.hidden = !0, x.railslocked = !0, x.hideRails()
                }, this.toggle = function() {
                    return x.hidden ? x.show() : x.hide()
                }, this.remove = function() {
                    for (var e in x.stop(), x.cursortimeout && clearTimeout(x.cursortimeout), x.delaylist) x.delaylist[e] && j(x.delaylist[e].h);
                    x.doZoomOut(), x.unbindAll(), b.isie9 && x.win[0].detachEvent("onpropertychange", x.onAttributeChange), !1 !== x.observer && x.observer.disconnect(), !1 !== x.observerremover && x.observerremover.disconnect(), !1 !== x.observerbody && x.observerbody.disconnect(), x.events = null, x.cursor && x.cursor.remove(), x.cursorh && x.cursorh.remove(), x.rail && x.rail.remove(), x.railh && x.railh.remove(), x.zoom && x.zoom.remove();
                    for (var t = 0; t < x.saved.css.length; t++) {
                        var n = x.saved.css[t];
                        n[0].css(n[1], void 0 === n[2] ? "" : n[2])
                    }
                    x.saved = !1, x.me.data("__nicescroll", "");
                    var i = A.nicescroll;
                    for (var r in i.each(function(e) {
                        if (this && this.id === x.id) {
                            delete i[e];
                            for (var t = ++e; t < i.length; t++, e++) i[e] = i[t];
                            --i.length && delete i[i.length]
                        }
                    }), x) x[r] = null, delete x[r];
                    x = null
                }, this.scrollstart = function(e) {
                    return this.onscrollstart = e, x
                }, this.scrollend = function(e) {
                    return this.onscrollend = e, x
                }, this.scrollcancel = function(e) {
                    return this.onscrollcancel = e, x
                }, this.zoomin = function(e) {
                    return this.onzoomin = e, x
                }, this.zoomout = function(e) {
                    return this.onzoomout = e, x
                }, this.isScrollable = function(e) {
                    var t = e.target ? e.target : e;
                    if ("OPTION" == t.nodeName) return !0;
                    for (; t && 1 == t.nodeType && t !== this.me[0] && !/^BODY|HTML/.test(t.nodeName);) {
                        var n = A(t),
                            i = n.css("overflowY") || n.css("overflowX") || n.css("overflow") || "";
                        if (/scroll|auto/.test(i)) return t.clientHeight != t.scrollHeight;
                        t = !!t.parentNode && t.parentNode
                    }
                    return !1
                }, this.getViewport = function(e) {
                    for (var t = !(!e || !e.parentNode) && e.parentNode; t && 1 == t.nodeType && !/^BODY|HTML/.test(t.nodeName);) {
                        var n = A(t);
                        if (/fixed|absolute/.test(n.css("position"))) return n;
                        var i = n.css("overflowY") || n.css("overflowX") || n.css("overflow") || "";
                        if (/scroll|auto/.test(i) && t.clientHeight != t.scrollHeight) return n;
                        if (0 < n.getNiceScroll().length) return n;
                        t = !!t.parentNode && t.parentNode
                    }
                    return !1
                }, this.triggerScrollStart = function(e, t, n, i, r) {
                    if (x.onscrollstart) {
                        var o = {
                            type: "scrollstart",
                            current: {
                                x: e,
                                y: t
                            },
                            request: {
                                x: n,
                                y: i
                            },
                            end: {
                                x: x.newscrollx,
                                y: x.newscrolly
                            },
                            speed: r
                        };
                        x.onscrollstart.call(x, o)
                    }
                }, this.triggerScrollEnd = function() {
                    if (x.onscrollend) {
                        var e = x.getScrollLeft(),
                            t = x.getScrollTop(),
                            n = {
                                type: "scrollend",
                                current: {
                                    x: e,
                                    y: t
                                },
                                end: {
                                    x: e,
                                    y: t
                                }
                            };
                        x.onscrollend.call(x, n)
                    }
                };
                var g = 0,
                    y = 0,
                    v = 0,
                    S = 1,
                    T = !1;
                if (this.onmousewheel = function(e) {
                    if (x.wheelprevented || x.locked) return !1;
                    if (x.railslocked) return x.debounced("checkunlock", x.resize, 250), !1;
                    if (x.rail.drag) return x.cancelEvent(e);
                    if ("auto" === _.oneaxismousemode && 0 !== e.deltaX && (_.oneaxismousemode = !1), _.oneaxismousemode && 0 === e.deltaX && !x.rail.scrollable) return !x.railh || !x.railh.scrollable || x.onmousewheelhr(e);
                    var t = Y(),
                        n = !1;
                    if (_.preservenativescrolling && x.checkarea + 600 < t && (x.nativescrollingarea = x.isScrollable(e), n = !0), x.checkarea = t, x.nativescrollingarea) return !0;
                    var i = r(e, !1, n);
                    return i && (x.checkarea = 0), i
                }, this.onmousewheelhr = function(e) {
                    if (!x.wheelprevented) {
                        if (x.railslocked || !x.railh.scrollable) return !0;
                        if (x.rail.drag) return x.cancelEvent(e);
                        var t = Y(),
                            n = !1;
                        return _.preservenativescrolling && x.checkarea + 600 < t && (x.nativescrollingarea = x.isScrollable(e), n = !0), x.checkarea = t, !!x.nativescrollingarea || (x.railslocked ? x.cancelEvent(e) : r(e, !0, n))
                    }
                }, this.stop = function() {
                    return x.cancelScroll(), x.scrollmon && x.scrollmon.stop(), x.cursorfreezed = !1, x.scroll.y = Math.round(x.getScrollTop() * (1 / x.scrollratio.y)), x.noticeCursor(), x
                }, this.getTransitionSpeed = function(e) {
                    return 80 + e / 72 * _.scrollspeed | 0
                }, _.smoothscroll)
                    if (x.ishwscroll && b.hastransition && _.usetransition && _.smoothscroll) {
                        var E = "";
                        this.resetTransition = function() {
                            E = "", x.doc.css(b.prefixstyle + "transition-duration", "0ms")
                        }, this.prepareTransition = function(e, t) {
                            var n = t ? e : x.getTransitionSpeed(e),
                                i = n + "ms";
                            return E !== i && (E = i, x.doc.css(b.prefixstyle + "transition-duration", i)), n
                        }, this.doScrollLeft = function(e, t) {
                            var n = x.scrollrunning ? x.newscrolly : x.getScrollTop();
                            x.doScrollPos(e, n, t)
                        }, this.doScrollTop = function(e, t) {
                            var n = x.scrollrunning ? x.newscrollx : x.getScrollLeft();
                            x.doScrollPos(n, e, t)
                        }, this.cursorupdate = {
                            running: !1,
                            start: function() {
                                var e = this;
                                if (!e.running) {
                                    e.running = !0;
                                    var t = function() {
                                        e.running && P(t), x.showCursor(x.getScrollTop(), x.getScrollLeft()), x.notifyScrollEvent(x.win[0])
                                    };
                                    P(t)
                                }
                            },
                            stop: function() {
                                this.running = !1
                            }
                        }, this.doScrollPos = function(e, t, n) {
                            var i = x.getScrollTop(),
                                r = x.getScrollLeft();
                            if (((x.newscrolly - i) * (t - i) < 0 || (x.newscrollx - r) * (e - r) < 0) && x.cancelScroll(), _.bouncescroll ? (t < 0 ? t = t / 2 | 0 : t > x.page.maxh && (t = x.page.maxh + (t - x.page.maxh) / 2 | 0), e < 0 ? e = e / 2 | 0 : e > x.page.maxw && (e = x.page.maxw + (e - x.page.maxw) / 2 | 0)) : (t < 0 ? t = 0 : t > x.page.maxh && (t = x.page.maxh), e < 0 ? e = 0 : e > x.page.maxw && (e = x.page.maxw)), x.scrollrunning && e == x.newscrollx && t == x.newscrolly) return !1;
                            x.newscrolly = t, x.newscrollx = e;
                            var o = x.getScrollTop(),
                                s = x.getScrollLeft(),
                                a = {};
                            a.x = e - s, a.y = t - o;
                            var l = 0 | Math.sqrt(a.x * a.x + a.y * a.y),
                                c = x.prepareTransition(l);
                            x.scrollrunning || (x.scrollrunning = !0, x.triggerScrollStart(s, o, e, t, c), x.cursorupdate.start()), x.scrollendtrapped = !0, b.transitionend || (x.scrollendtrapped && clearTimeout(x.scrollendtrapped), x.scrollendtrapped = setTimeout(x.onScrollTransitionEnd, c)), x.setScrollTop(x.newscrolly), x.setScrollLeft(x.newscrollx)
                        }, this.cancelScroll = function() {
                            if (!x.scrollendtrapped) return !0;
                            var e = x.getScrollTop(),
                                t = x.getScrollLeft();
                            return x.scrollrunning = !1, b.transitionend || clearTimeout(b.transitionend), x.scrollendtrapped = !1, x.resetTransition(), x.setScrollTop(e), x.railh && x.setScrollLeft(t), x.timerscroll && x.timerscroll.tm && clearInterval(x.timerscroll.tm), x.timerscroll = !1, x.cursorfreezed = !1, x.cursorupdate.stop(), x.showCursor(e, t), x
                        }, this.onScrollTransitionEnd = function() {
                            if (x.scrollendtrapped) {
                                var e = x.getScrollTop(),
                                    t = x.getScrollLeft();
                                if (e < 0 ? e = 0 : e > x.page.maxh && (e = x.page.maxh), t < 0 ? t = 0 : t > x.page.maxw && (t = x.page.maxw), e != x.newscrolly || t != x.newscrollx) return x.doScrollPos(t, e, _.snapbackspeed);
                                x.scrollrunning && x.triggerScrollEnd(), x.scrollrunning = !1, x.scrollendtrapped = !1, x.resetTransition(), x.timerscroll = !1, x.setScrollTop(e), x.railh && x.setScrollLeft(t), x.cursorupdate.stop(), x.noticeCursor(!1, e, t), x.cursorfreezed = !1
                            }
                        }
                    } else this.doScrollLeft = function(e, t) {
                        var n = x.scrollrunning ? x.newscrolly : x.getScrollTop();
                        x.doScrollPos(e, n, t)
                    }, this.doScrollTop = function(e, t) {
                        var n = x.scrollrunning ? x.newscrollx : x.getScrollLeft();
                        x.doScrollPos(n, e, t)
                    }, this.doScrollPos = function(e, t, n) {
                        var i = x.getScrollTop(),
                            r = x.getScrollLeft();
                        ((x.newscrolly - i) * (t - i) < 0 || (x.newscrollx - r) * (e - r) < 0) && x.cancelScroll();
                        var o = !1;
                        if (x.bouncescroll && x.rail.visibility || (t < 0 ? o = !(t = 0) : t > x.page.maxh && (t = x.page.maxh, o = !0)), x.bouncescroll && x.railh.visibility || (e < 0 ? o = !(e = 0) : e > x.page.maxw && (e = x.page.maxw, o = !0)), x.scrollrunning && x.newscrolly === t && x.newscrollx === e) return !0;
                        x.newscrolly = t, x.newscrollx = e, x.dst = {}, x.dst.x = e - r, x.dst.y = t - i, x.dst.px = r, x.dst.py = i;
                        var s = 0 | Math.sqrt(x.dst.x * x.dst.x + x.dst.y * x.dst.y),
                            a = x.getTransitionSpeed(s);
                        x.bzscroll = {};
                        var l = o ? 1 : .58;
                        x.bzscroll.x = new u(r, x.newscrollx, a, 0, 0, l, 1), x.bzscroll.y = new u(i, x.newscrolly, a, 0, 0, l, 1), Y();
                        var c = function() {
                            if (x.scrollrunning) {
                                var e = x.bzscroll.y.getPos();
                                x.setScrollLeft(x.bzscroll.x.getNow()), x.setScrollTop(x.bzscroll.y.getNow()), e <= 1 ? x.timer = P(c) : (x.scrollrunning = !1, x.timer = 0, x.triggerScrollEnd())
                            }
                        };
                        x.scrollrunning || (x.triggerScrollStart(r, i, e, t, a), x.scrollrunning = !0, x.timer = P(c))
                    }, this.cancelScroll = function() {
                        return x.timer && j(x.timer), x.timer = 0, x.bzscroll = !1, x.scrollrunning = !1, x
                    };
                else this.doScrollLeft = function(e, t) {
                    var n = x.getScrollTop();
                    x.doScrollPos(e, n, t)
                }, this.doScrollTop = function(e, t) {
                    var n = x.getScrollLeft();
                    x.doScrollPos(n, e, t)
                }, this.doScrollPos = function(e, t, n) {
                    var i = e > x.page.maxw ? x.page.maxw : e;
                    i < 0 && (i = 0);
                    var r = t > x.page.maxh ? x.page.maxh : t;
                    r < 0 && (r = 0), x.synched("scroll", function() {
                        x.setScrollTop(r), x.setScrollLeft(i)
                    })
                }, this.cancelScroll = function() {};
                this.doScrollBy = function(e, t) {
                    a(0, e)
                }, this.doScrollLeftBy = function(e, t) {
                    a(e, 0)
                }, this.doScrollTo = function(e, t) {
                    var n = t ? Math.round(e * x.scrollratio.y) : e;
                    n < 0 ? n = 0 : n > x.page.maxh && (n = x.page.maxh), x.cursorfreezed = !1, x.doScrollTop(e)
                }, this.checkContentSize = function() {
                    var e = x.getContentSize();
                    e.h == x.page.h && e.w == x.page.w || x.resize(!1, e)
                }, x.onscroll = function(e) {
                    x.rail.drag || x.cursorfreezed || x.synched("scroll", function() {
                        x.scroll.y = Math.round(x.getScrollTop() / x.scrollratio.y), x.railh && (x.scroll.x = Math.round(x.getScrollLeft() / x.scrollratio.x)), x.noticeCursor()
                    })
                }, x.bind(x.docscroll, "scroll", x.onscroll), this.doZoomIn = function(e) {
                    if (!x.zoomactive) {
                        x.zoomactive = !0, x.zoomrestore = {
                            style: {}
                        };
                        var t = ["position", "top", "left", "zIndex", "backgroundColor", "marginTop", "marginBottom", "marginLeft", "marginRight"],
                            n = x.win[0].style;
                        for (var i in t) {
                            var r = t[i];
                            x.zoomrestore.style[r] = void 0 !== n[r] ? n[r] : ""
                        }
                        x.zoomrestore.style.width = x.win.css("width"), x.zoomrestore.style.height = x.win.css("height"), x.zoomrestore.padding = {
                            w: x.win.outerWidth() - x.win.width(),
                            h: x.win.outerHeight() - x.win.height()
                        }, b.isios4 && (x.zoomrestore.scrollTop = I.scrollTop(), I.scrollTop(0)), x.win.css({
                            position: b.isios4 ? "absolute" : "fixed",
                            top: 0,
                            left: 0,
                            zIndex: O + 100,
                            margin: 0
                        });
                        var o = x.win.css("backgroundColor");
                        return ("" === o || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(o)) && x.win.css("backgroundColor", "#fff"), x.rail.css({
                            zIndex: O + 101
                        }), x.zoom.css({
                            zIndex: O + 102
                        }), x.zoom.css("backgroundPosition", "0 -18px"), x.resizeZoom(), x.onzoomin && x.onzoomin.call(x), x.cancelEvent(e)
                    }
                }, this.doZoomOut = function(e) {
                    if (x.zoomactive) return x.zoomactive = !1, x.win.css("margin", ""), x.win.css(x.zoomrestore.style), b.isios4 && I.scrollTop(x.zoomrestore.scrollTop), x.rail.css({
                        "z-index": x.zindex
                    }), x.zoom.css({
                        "z-index": x.zindex
                    }), x.zoomrestore = !1, x.zoom.css("backgroundPosition", "0 0"), x.onResize(), x.onzoomout && x.onzoomout.call(x), x.cancelEvent(e)
                }, this.doZoom = function(e) {
                    return x.zoomactive ? x.doZoomOut(e) : x.doZoomIn(e)
                }, this.resizeZoom = function() {
                    if (x.zoomactive) {
                        var e = x.getScrollTop();
                        x.win.css({
                            width: I.width() - x.zoomrestore.padding.w + "px",
                            height: I.height() - x.zoomrestore.padding.h + "px"
                        }), x.onResize(), x.setScrollTop(Math.min(x.page.maxh, e))
                    }
                }, this.init(), A.nicescroll.push(this)
            },
            F = function(e) {
                var m = this;
                this.nc = e, this.lastx = 0, this.lasty = 0, this.speedx = 0, this.speedy = 0, this.lasttime = 0, this.steptime = 0, this.snapx = !1, this.snapy = !1, this.demulx = 0, this.demuly = 0, this.lastscrollx = -1, this.lastscrolly = -1, this.chkx = 0, this.chky = 0, this.timer = 0, this.reset = function(e, t) {
                    m.stop(), m.steptime = 0, m.lasttime = Y(), m.speedx = 0, m.speedy = 0, m.lastx = e, m.lasty = t, m.lastscrollx = -1, m.lastscrolly = -1
                }, this.update = function(e, t) {
                    var n = Y();
                    m.steptime = n - m.lasttime, m.lasttime = n;
                    var i = t - m.lasty,
                        r = e - m.lastx,
                        o = m.nc.getScrollTop() + i,
                        s = m.nc.getScrollLeft() + r;
                    m.snapx = s < 0 || s > m.nc.page.maxw, m.snapy = o < 0 || o > m.nc.page.maxh, m.speedx = r, m.speedy = i, m.lastx = e, m.lasty = t
                }, this.stop = function() {
                    m.nc.unsynched("domomentum2d"), m.timer && clearTimeout(m.timer), m.timer = 0, m.lastscrollx = -1, m.lastscrolly = -1
                }, this.doSnapy = function(e, t) {
                    var n = !1;
                    t < 0 ? n = !(t = 0) : t > m.nc.page.maxh && (t = m.nc.page.maxh, n = !0), e < 0 ? n = !(e = 0) : e > m.nc.page.maxw && (e = m.nc.page.maxw, n = !0), n ? m.nc.doScrollPos(e, t, m.nc.opt.snapbackspeed) : m.nc.triggerScrollEnd()
                }, this.doMomentum = function(e) {
                    var t = Y(),
                        n = e ? t + e : m.lasttime,
                        i = m.nc.getScrollLeft(),
                        r = m.nc.getScrollTop(),
                        o = m.nc.page.maxh,
                        s = m.nc.page.maxw;
                    m.speedx = 0 < s ? Math.min(60, m.speedx) : 0, m.speedy = 0 < o ? Math.min(60, m.speedy) : 0;
                    var a = n && t - n <= 60;
                    (r < 0 || o < r || i < 0 || s < i) && (a = !1);
                    var l = !(!m.speedy || !a) && m.speedy,
                        c = !(!m.speedx || !a) && m.speedx;
                    if (l || c) {
                        var u = Math.max(16, m.steptime);
                        if (50 < u) {
                            var h = u / 50;
                            m.speedx *= h, m.speedy *= h, u = 50
                        }
                        m.demulxy = 0, m.lastscrollx = m.nc.getScrollLeft(), m.chkx = m.lastscrollx, m.lastscrolly = m.nc.getScrollTop(), m.chky = m.lastscrolly;
                        var d = m.lastscrollx,
                            f = m.lastscrolly,
                            p = function() {
                                var e = 600 < Y() - t ? .04 : .02;
                                m.speedx && (d = Math.floor(m.lastscrollx - m.speedx * (1 - m.demulxy)), ((m.lastscrollx = d) < 0 || s < d) && (e = .1)), m.speedy && (f = Math.floor(m.lastscrolly - m.speedy * (1 - m.demulxy)), ((m.lastscrolly = f) < 0 || o < f) && (e = .1)), m.demulxy = Math.min(1, m.demulxy + e), m.nc.synched("domomentum2d", function() {
                                    m.speedx && (m.nc.getScrollLeft(), m.chkx = d, m.nc.setScrollLeft(d)), m.speedy && (m.nc.getScrollTop(), m.chky = f, m.nc.setScrollTop(f)), m.timer || (m.nc.hideCursor(), m.doSnapy(d, f))
                                }), m.demulxy < 1 ? m.timer = setTimeout(p, u) : (m.stop(), m.nc.hideCursor(), m.doSnapy(d, f))
                            };
                        p()
                    } else m.doSnapy(m.nc.getScrollLeft(), m.nc.getScrollTop())
                }
            },
            r = e.fn.scrollTop;
        e.cssHooks.pageYOffset = {
            get: function(e, t, n) {
                var i = A.data(e, "__nicescroll") || !1;
                return i && i.ishwscroll ? i.getScrollTop() : r.call(e)
            },
            set: function(e, t) {
                var n = A.data(e, "__nicescroll") || !1;
                return n && n.ishwscroll ? n.setScrollTop(parseInt(t)) : r.call(e, t), this
            }
        }, e.fn.scrollTop = function(t) {
            if (void 0 !== t) return this.each(function() {
                var e = A.data(this, "__nicescroll") || !1;
                e && e.ishwscroll ? e.setScrollTop(parseInt(t)) : r.call(A(this), t)
            });
            var e = !!this[0] && (A.data(this[0], "__nicescroll") || !1);
            return e && e.ishwscroll ? e.getScrollTop() : r.call(this)
        };
        var s = e.fn.scrollLeft;
        A.cssHooks.pageXOffset = {
            get: function(e, t, n) {
                var i = A.data(e, "__nicescroll") || !1;
                return i && i.ishwscroll ? i.getScrollLeft() : s.call(e)
            },
            set: function(e, t) {
                var n = A.data(e, "__nicescroll") || !1;
                return n && n.ishwscroll ? n.setScrollLeft(parseInt(t)) : s.call(e, t), this
            }
        }, e.fn.scrollLeft = function(t) {
            if (void 0 !== t) return this.each(function() {
                var e = A.data(this, "__nicescroll") || !1;
                e && e.ishwscroll ? e.setScrollLeft(parseInt(t)) : s.call(A(this), t)
            });
            var e = !!this[0] && (A.data(this[0], "__nicescroll") || !1);
            return e && e.ishwscroll ? e.getScrollLeft() : s.call(this)
        };
        var l = function(e) {
            var t = this;
            if (this.length = 0, this.name = "nicescrollarray", this.each = function(e) {
                return A.each(t, e), t
            }, this.push = function(e) {
                t[t.length] = e, t.length++
            }, this.eq = function(e) {
                return t[e]
            }, e)
                for (var n = 0; n < e.length; n++) {
                    var i = A.data(e[n], "__nicescroll") || !1;
                    i && (this[this.length] = i, this.length++)
                }
            return this
        };
        ! function(e, t, n) {
            for (var i = 0, r = t.length; i < r; i++) n(e, t[i])
        }(l.prototype, ["show", "hide", "toggle", "onResize", "resize", "remove", "stop", "doScrollPos"], function(e, t) {
            e[t] = function() {
                var e = arguments;
                return this.each(function() {
                    this[t].apply(this, e)
                })
            }
        }), e.fn.getNiceScroll = function(e) {
            return void 0 === e ? new l(this) : this[e] && A.data(this[e], "__nicescroll") || !1
        }, (e.expr.pseudos || e.expr[":"]).nicescroll = function(e) {
            return void 0 !== A.data(e, "__nicescroll")
        }, A.fn.niceScroll = function(r, o) {
            void 0 !== o || "object" != typeof r || "jquery" in r || (o = r, r = !1);
            var s = new l;
            return this.each(function() {
                var e = A(this),
                    t = A.extend({}, o);
                if (r) {
                    var n = A(r);
                    t.doc = 1 < n.length ? A(r, e) : n, t.win = e
                }!("doc" in t) || "win" in t || (t.win = e);
                var i = e.data("__nicescroll") || !1;
                i || (t.doc = t.doc || e, i = new a(t, e), e.data("__nicescroll", i)), s.push(i)
            }), 1 === s.length ? s[0] : s
        }, L.NiceScroll = {
            getjQuery: function() {
                return e
            }
        }, A.nicescroll || (A.nicescroll = new l, A.nicescroll.options = R)
    }),
    function(e, t) {
        "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.moment = t()
    }(this, function() {
        "use strict";

        function v() {
            return Ge.apply(null, arguments)
        }

        function a(e) {
            return e instanceof Array || "[object Array]" === Object.prototype.toString.call(e)
        }

        function l(e) {
            return null != e && "[object Object]" === Object.prototype.toString.call(e)
        }

        function c(e) {
            return void 0 === e
        }

        function u(e) {
            return "number" == typeof e || "[object Number]" === Object.prototype.toString.call(e)
        }

        function h(e) {
            return e instanceof Date || "[object Date]" === Object.prototype.toString.call(e)
        }

        function d(e, t) {
            var n, i = [];
            for (n = 0; n < e.length; ++n) i.push(t(e[n], n));
            return i
        }

        function x(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }

        function f(e, t) {
            for (var n in t) x(t, n) && (e[n] = t[n]);
            return x(t, "toString") && (e.toString = t.toString), x(t, "valueOf") && (e.valueOf = t.valueOf), e
        }

        function p(e, t, n, i) {
            return fe(e, t, n, i, !0).utc()
        }

        function w(e) {
            return null == e._pf && (e._pf = {
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
                meridiem: null,
                rfc2822: !1,
                weekdayMismatch: !1
            }), e._pf
        }

        function m(e) {
            if (null == e._isValid) {
                var t = w(e),
                    n = Xe.call(t.parsedDateParts, function(e) {
                        return null != e
                    }),
                    i = !isNaN(e._d.getTime()) && t.overflow < 0 && !t.empty && !t.invalidMonth && !t.invalidWeekday && !t.weekdayMismatch && !t.nullInput && !t.invalidFormat && !t.userInvalidated && (!t.meridiem || t.meridiem && n);
                if (e._strict && (i = i && 0 === t.charsLeftOver && 0 === t.unusedTokens.length && void 0 === t.bigHour), null != Object.isFrozen && Object.isFrozen(e)) return i;
                e._isValid = i
            }
            return e._isValid
        }

        function g(e) {
            var t = p(NaN);
            return null != e ? f(w(t), e) : w(t).userInvalidated = !0, t
        }

        function y(e, t) {
            var n, i, r;
            if (c(t._isAMomentObject) || (e._isAMomentObject = t._isAMomentObject), c(t._i) || (e._i = t._i), c(t._f) || (e._f = t._f), c(t._l) || (e._l = t._l), c(t._strict) || (e._strict = t._strict), c(t._tzm) || (e._tzm = t._tzm), c(t._isUTC) || (e._isUTC = t._isUTC), c(t._offset) || (e._offset = t._offset), c(t._pf) || (e._pf = w(t)), c(t._locale) || (e._locale = t._locale), 0 < Ke.length)
                for (n = 0; n < Ke.length; n++) c(r = t[i = Ke[n]]) || (e[i] = r);
            return e
        }

        function _(e) {
            y(this, e), this._d = new Date(null != e._d ? e._d.getTime() : NaN), this.isValid() || (this._d = new Date(NaN)), !1 === Qe && (Qe = !0, v.updateOffset(this), Qe = !1)
        }

        function b(e) {
            return e instanceof _ || null != e && null != e._isAMomentObject
        }

        function S(e) {
            return e < 0 ? Math.ceil(e) || 0 : Math.floor(e)
        }

        function T(e) {
            var t = +e,
                n = 0;
            return 0 !== t && isFinite(t) && (n = S(t)), n
        }

        function s(e, t, n) {
            var i, r = Math.min(e.length, t.length),
                o = Math.abs(e.length - t.length),
                s = 0;
            for (i = 0; i < r; i++)(n && e[i] !== t[i] || !n && T(e[i]) !== T(t[i])) && s++;
            return s + o
        }

        function E(e) {
            !1 === v.suppressDeprecationWarnings && "undefined" != typeof console && console.warn && console.warn("Deprecation warning: " + e)
        }

        function e(r, o) {
            var s = !0;
            return f(function() {
                if (null != v.deprecationHandler && v.deprecationHandler(null, r), s) {
                    for (var e, t = [], n = 0; n < arguments.length; n++) {
                        if (e = "", "object" == typeof arguments[n]) {
                            for (var i in e += "\n[" + n + "] ", arguments[0]) e += i + ": " + arguments[0][i] + ", ";
                            e = e.slice(0, -2)
                        } else e = arguments[n];
                        t.push(e)
                    }
                    E(r + "\nArguments: " + Array.prototype.slice.call(t).join("") + "\n" + (new Error).stack), s = !1
                }
                return o.apply(this, arguments)
            }, o)
        }

        function o(e, t) {
            null != v.deprecationHandler && v.deprecationHandler(e, t), Ze[e] || (E(t), Ze[e] = !0)
        }

        function k(e) {
            return e instanceof Function || "[object Function]" === Object.prototype.toString.call(e)
        }

        function M(e, t) {
            var n, i = f({}, e);
            for (n in t) x(t, n) && (l(e[n]) && l(t[n]) ? (i[n] = {}, f(i[n], e[n]), f(i[n], t[n])) : null != t[n] ? i[n] = t[n] : delete i[n]);
            for (n in e) x(e, n) && !x(t, n) && l(e[n]) && (i[n] = f({}, i[n]));
            return i
        }

        function C(e) {
            null != e && this.set(e)
        }

        function t(e, t) {
            var n = e.toLowerCase();
            Je[n] = Je[n + "s"] = Je[t] = e
        }

        function D(e) {
            return "string" == typeof e ? Je[e] || Je[e.toLowerCase()] : void 0
        }

        function O(e) {
            var t, n, i = {};
            for (n in e) x(e, n) && (t = D(n)) && (i[t] = e[n]);
            return i
        }

        function n(e, t) {
            et[e] = t
        }

        function A(e, t, n) {
            var i = "" + Math.abs(e),
                r = t - i.length;
            return (0 <= e ? n ? "+" : "" : "-") + Math.pow(10, Math.max(0, r)).toString().substr(1) + i
        }

        function i(e, t, n, i) {
            var r = i;
            "string" == typeof i && (r = function() {
                return this[i]()
            }), e && (rt[e] = r), t && (rt[t[0]] = function() {
                return A(r.apply(this, arguments), t[1], t[2])
            }), n && (rt[n] = function() {
                return this.localeData().ordinal(r.apply(this, arguments), e)
            })
        }

        function r(e, t) {
            return e.isValid() ? (t = N(t, e.localeData()), it[t] = it[t] || function(i) {
                var e, r, t, o = i.match(tt);
                for (e = 0, r = o.length; e < r; e++) rt[o[e]] ? o[e] = rt[o[e]] : o[e] = (t = o[e]).match(/\[[\s\S]/) ? t.replace(/^\[|\]$/g, "") : t.replace(/\\/g, "");
                return function(e) {
                    var t, n = "";
                    for (t = 0; t < r; t++) n += k(o[t]) ? o[t].call(e, i) : o[t];
                    return n
                }
            }(t), it[t](e)) : e.localeData().invalidDate()
        }

        function N(e, t) {
            function n(e) {
                return t.longDateFormat(e) || e
            }
            var i = 5;
            for (nt.lastIndex = 0; 0 <= i && nt.test(e);) e = e.replace(nt, n), nt.lastIndex = 0, i -= 1;
            return e
        }

        function L(e, n, i) {
            _t[e] = k(n) ? n : function(e, t) {
                return e && i ? i : n
            }
        }

        function I(e) {
            return e.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&")
        }

        function H(e, n) {
            var t, i = n;
            for ("string" == typeof e && (e = [e]), u(n) && (i = function(e, t) {
                t[n] = T(e)
            }), t = 0; t < e.length; t++) bt[e[t]] = i
        }

        function P(e, r) {
            H(e, function(e, t, n, i) {
                n._w = n._w || {}, r(e, n._w, n, i)
            })
        }

        function j(e) {
            return z(e) ? 366 : 365
        }

        function z(e) {
            return e % 4 == 0 && e % 100 != 0 || e % 400 == 0
        }

        function Y(t, n) {
            return function(e) {
                return null != e ? (W(this, t, e), v.updateOffset(this, n), this) : R(this, t)
            }
        }

        function R(e, t) {
            return e.isValid() ? e._d["get" + (e._isUTC ? "UTC" : "") + t]() : NaN
        }

        function W(e, t, n) {
            e.isValid() && !isNaN(n) && ("FullYear" === t && z(e.year()) && 1 === e.month() && 29 === e.date() ? e._d["set" + (e._isUTC ? "UTC" : "") + t](n, e.month(), F(n, e.month())) : e._d["set" + (e._isUTC ? "UTC" : "") + t](n))
        }

        function F(e, t) {
            if (isNaN(e) || isNaN(t)) return NaN;
            var n = (t % 12 + 12) % 12;
            return e += (t - n) / 12, 1 === n ? z(e) ? 29 : 28 : 31 - n % 7 % 2
        }

        function q(e, t) {
            var n;
            if (!e.isValid()) return e;
            if ("string" == typeof t)
                if (/^\d+$/.test(t)) t = T(t);
                else if (!u(t = e.localeData().monthsParse(t))) return e;
            return n = Math.min(e.date(), F(e.year(), t)), e._d["set" + (e._isUTC ? "UTC" : "") + "Month"](t, n), e
        }

        function U(e) {
            return null != e ? (q(this, e), v.updateOffset(this, !0), this) : R(this, "Month")
        }

        function V() {
            function e(e, t) {
                return t.length - e.length
            }
            var t, n, i = [],
                r = [],
                o = [];
            for (t = 0; t < 12; t++) n = p([2e3, t]), i.push(this.monthsShort(n, "")), r.push(this.months(n, "")), o.push(this.months(n, "")), o.push(this.monthsShort(n, ""));
            for (i.sort(e), r.sort(e), o.sort(e), t = 0; t < 12; t++) i[t] = I(i[t]), r[t] = I(r[t]);
            for (t = 0; t < 24; t++) o[t] = I(o[t]);
            this._monthsRegex = new RegExp("^(" + o.join("|") + ")", "i"), this._monthsShortRegex = this._monthsRegex, this._monthsStrictRegex = new RegExp("^(" + r.join("|") + ")", "i"), this._monthsShortStrictRegex = new RegExp("^(" + i.join("|") + ")", "i")
        }

        function B(e) {
            var t = new Date(Date.UTC.apply(null, arguments));
            return e < 100 && 0 <= e && isFinite(t.getUTCFullYear()) && t.setUTCFullYear(e), t
        }

        function G(e, t, n) {
            var i = 7 + t - n;
            return -(7 + B(e, 0, i).getUTCDay() - t) % 7 + i - 1
        }

        function X(e, t, n, i, r) {
            var o, s, a = 1 + 7 * (t - 1) + (7 + n - i) % 7 + G(e, i, r);
            return s = a <= 0 ? j(o = e - 1) + a : a > j(e) ? (o = e + 1, a - j(e)) : (o = e, a), {
                year: o,
                dayOfYear: s
            }
        }

        function $(e, t, n) {
            var i, r, o = G(e.year(), t, n),
                s = Math.floor((e.dayOfYear() - o - 1) / 7) + 1;
            return s < 1 ? i = s + K(r = e.year() - 1, t, n) : s > K(e.year(), t, n) ? (i = s - K(e.year(), t, n), r = e.year() + 1) : (r = e.year(), i = s), {
                week: i,
                year: r
            }
        }

        function K(e, t, n) {
            var i = G(e, t, n),
                r = G(e + 1, t, n);
            return (j(e) - i + r) / 7
        }

        function Q() {
            function e(e, t) {
                return t.length - e.length
            }
            var t, n, i, r, o, s = [],
                a = [],
                l = [],
                c = [];
            for (t = 0; t < 7; t++) n = p([2e3, 1]).day(t), i = this.weekdaysMin(n, ""), r = this.weekdaysShort(n, ""), o = this.weekdays(n, ""), s.push(i), a.push(r), l.push(o), c.push(i), c.push(r), c.push(o);
            for (s.sort(e), a.sort(e), l.sort(e), c.sort(e), t = 0; t < 7; t++) a[t] = I(a[t]), l[t] = I(l[t]), c[t] = I(c[t]);
            this._weekdaysRegex = new RegExp("^(" + c.join("|") + ")", "i"), this._weekdaysShortRegex = this._weekdaysRegex, this._weekdaysMinRegex = this._weekdaysRegex, this._weekdaysStrictRegex = new RegExp("^(" + l.join("|") + ")", "i"), this._weekdaysShortStrictRegex = new RegExp("^(" + a.join("|") + ")", "i"), this._weekdaysMinStrictRegex = new RegExp("^(" + s.join("|") + ")", "i")
        }

        function Z() {
            return this.hours() % 12 || 12
        }

        function J(e, t) {
            i(e, 0, 0, function() {
                return this.localeData().meridiem(this.hours(), this.minutes(), t)
            })
        }

        function ee(e, t) {
            return t._meridiemParse
        }

        function te(e) {
            return e ? e.toLowerCase().replace("_", "-") : e
        }

        function ne(e) {
            var t = null;
            if (!Xt[e] && "undefined" != typeof module && module && module.exports) try {
                t = Vt._abbr, require("./locale/" + e), ie(t)
            } catch (e) {}
            return Xt[e]
        }

        function ie(e, t) {
            var n;
            return e && (n = c(t) ? oe(e) : re(e, t)) && (Vt = n), Vt._abbr
        }

        function re(e, t) {
            if (null === t) return delete Xt[e], null;
            var n = Gt;
            if (t.abbr = e, null != Xt[e]) o("defineLocaleOverride", "use moment.updateLocale(localeName, config) to change an existing locale. moment.defineLocale(localeName, config) should only be used for creating a new locale See http://momentjs.com/guides/#/warnings/define-locale/ for more info."), n = Xt[e]._config;
            else if (null != t.parentLocale) {
                if (null == Xt[t.parentLocale]) return $t[t.parentLocale] || ($t[t.parentLocale] = []), $t[t.parentLocale].push({
                    name: e,
                    config: t
                }), null;
                n = Xt[t.parentLocale]._config
            }
            return Xt[e] = new C(M(n, t)), $t[e] && $t[e].forEach(function(e) {
                re(e.name, e.config)
            }), ie(e), Xt[e]
        }

        function oe(e) {
            var t;
            if (e && e._locale && e._locale._abbr && (e = e._locale._abbr), !e) return Vt;
            if (!a(e)) {
                if (t = ne(e)) return t;
                e = [e]
            }
            return function(e) {
                for (var t, n, i, r, o = 0; o < e.length;) {
                    for (t = (r = te(e[o]).split("-")).length, n = (n = te(e[o + 1])) ? n.split("-") : null; 0 < t;) {
                        if (i = ne(r.slice(0, t).join("-"))) return i;
                        if (n && n.length >= t && s(r, n, !0) >= t - 1) break;
                        t--
                    }
                    o++
                }
                return null
            }(e)
        }

        function se(e) {
            var t, n = e._a;
            return n && -2 === w(e).overflow && (t = n[Tt] < 0 || 11 < n[Tt] ? Tt : n[Et] < 1 || n[Et] > F(n[St], n[Tt]) ? Et : n[kt] < 0 || 24 < n[kt] || 24 === n[kt] && (0 !== n[Mt] || 0 !== n[Ct] || 0 !== n[Dt]) ? kt : n[Mt] < 0 || 59 < n[Mt] ? Mt : n[Ct] < 0 || 59 < n[Ct] ? Ct : n[Dt] < 0 || 999 < n[Dt] ? Dt : -1, w(e)._overflowDayOfYear && (t < St || Et < t) && (t = Et), w(e)._overflowWeeks && -1 === t && (t = Ot), w(e)._overflowWeekday && -1 === t && (t = At), w(e).overflow = t), e
        }

        function ae(e, t, n) {
            return null != e ? e : null != t ? t : n
        }

        function le(e) {
            var t, n, i, r, o, s, a, l = [];
            if (!e._d) {
                for (s = e, a = void 0, a = new Date(v.now()), i = s._useUTC ? [a.getUTCFullYear(), a.getUTCMonth(), a.getUTCDate()] : [a.getFullYear(), a.getMonth(), a.getDate()], e._w && null == e._a[Et] && null == e._a[Tt] && function(e) {
                    var t, n, i, r, o, s, a, l;
                    if (null != (t = e._w).GG || null != t.W || null != t.E) o = 1, s = 4, n = ae(t.GG, e._a[St], $(pe(), 1, 4).year), i = ae(t.W, 1), ((r = ae(t.E, 1)) < 1 || 7 < r) && (l = !0);
                    else {
                        o = e._locale._week.dow, s = e._locale._week.doy;
                        var c = $(pe(), o, s);
                        n = ae(t.gg, e._a[St], c.year), i = ae(t.w, c.week), null != t.d ? ((r = t.d) < 0 || 6 < r) && (l = !0) : null != t.e ? (r = t.e + o, (t.e < 0 || 6 < t.e) && (l = !0)) : r = o
                    }
                    i < 1 || i > K(n, o, s) ? w(e)._overflowWeeks = !0 : null != l ? w(e)._overflowWeekday = !0 : (a = X(n, i, r, o, s), e._a[St] = a.year, e._dayOfYear = a.dayOfYear)
                }(e), null != e._dayOfYear && (o = ae(e._a[St], i[St]), (e._dayOfYear > j(o) || 0 === e._dayOfYear) && (w(e)._overflowDayOfYear = !0), n = B(o, 0, e._dayOfYear), e._a[Tt] = n.getUTCMonth(), e._a[Et] = n.getUTCDate()), t = 0; t < 3 && null == e._a[t]; ++t) e._a[t] = l[t] = i[t];
                for (; t < 7; t++) e._a[t] = l[t] = null == e._a[t] ? 2 === t ? 1 : 0 : e._a[t];
                24 === e._a[kt] && 0 === e._a[Mt] && 0 === e._a[Ct] && 0 === e._a[Dt] && (e._nextDay = !0, e._a[kt] = 0), e._d = (e._useUTC ? B : function(e, t, n, i, r, o, s) {
                    var a = new Date(e, t, n, i, r, o, s);
                    return e < 100 && 0 <= e && isFinite(a.getFullYear()) && a.setFullYear(e), a
                }).apply(null, l), r = e._useUTC ? e._d.getUTCDay() : e._d.getDay(), null != e._tzm && e._d.setUTCMinutes(e._d.getUTCMinutes() - e._tzm), e._nextDay && (e._a[kt] = 24), e._w && void 0 !== e._w.d && e._w.d !== r && (w(e).weekdayMismatch = !0)
            }
        }

        function ce(e) {
            var t, n, i, r, o, s, a = e._i,
                l = Kt.exec(a) || Qt.exec(a);
            if (l) {
                for (w(e).iso = !0, t = 0, n = Jt.length; t < n; t++)
                    if (Jt[t][1].exec(l[1])) {
                        r = Jt[t][0], i = !1 !== Jt[t][2];
                        break
                    }
                if (null == r) return void(e._isValid = !1);
                if (l[3]) {
                    for (t = 0, n = en.length; t < n; t++)
                        if (en[t][1].exec(l[3])) {
                            o = (l[2] || " ") + en[t][0];
                            break
                        }
                    if (null == o) return void(e._isValid = !1)
                }
                if (!i && null != o) return void(e._isValid = !1);
                if (l[4]) {
                    if (!Zt.exec(l[4])) return void(e._isValid = !1);
                    s = "Z"
                }
                e._f = r + (o || "") + (s || ""), he(e)
            } else e._isValid = !1
        }

        function ue(e) {
            var t, n, i, r, o, s, a, l, c, u, h, d = nn.exec(e._i.replace(/\([^)]*\)|[\n\t]/g, " ").replace(/(\s\s+)/g, " ").trim());
            if (d) {
                var f = (r = d[4], o = d[3], s = d[2], a = d[5], l = d[6], c = d[7], h = [(u = parseInt(r, 10), u <= 49 ? 2e3 + u : u <= 999 ? 1900 + u : u), Pt.indexOf(o), parseInt(s, 10), parseInt(a, 10), parseInt(l, 10)], c && h.push(parseInt(c, 10)), h);
                if (t = d[1], n = f, i = e, t && Rt.indexOf(t) !== new Date(n[0], n[1], n[2]).getDay() && (w(i).weekdayMismatch = !0, !(i._isValid = !1))) return;
                e._a = f, e._tzm = function(e, t, n) {
                    if (e) return rn[e];
                    if (t) return 0;
                    var i = parseInt(n, 10),
                        r = i % 100;
                    return (i - r) / 100 * 60 + r
                }(d[8], d[9], d[10]), e._d = B.apply(null, e._a), e._d.setUTCMinutes(e._d.getUTCMinutes() - e._tzm), w(e).rfc2822 = !0
            } else e._isValid = !1
        }

        function he(e) {
            if (e._f !== v.ISO_8601)
                if (e._f !== v.RFC_2822) {
                    e._a = [], w(e).empty = !0;
                    var t, n, i, r, o, s = "" + e._i,
                        a = s.length,
                        l = 0;
                    for (i = N(e._f, e._locale).match(tt) || [], t = 0; t < i.length; t++) r = i[t], (n = (s.match((g = r, y = e, x(_t, g) ? _t[g](y._strict, y._locale) : new RegExp(I(g.replace("\\", "").replace(/\\(\[)|\\(\])|\[([^\]\[]*)\]|\\(.)/g, function(e, t, n, i, r) {
                        return t || n || i || r
                    }))))) || [])[0]) && (0 < (o = s.substr(0, s.indexOf(n))).length && w(e).unusedInput.push(o), s = s.slice(s.indexOf(n) + n.length), l += n.length), rt[r] ? (n ? w(e).empty = !1 : w(e).unusedTokens.push(r), f = r, m = e, null != (p = n) && x(bt, f) && bt[f](p, m._a, m, f)) : e._strict && !n && w(e).unusedTokens.push(r);
                    w(e).charsLeftOver = a - l, 0 < s.length && w(e).unusedInput.push(s), e._a[kt] <= 12 && !0 === w(e).bigHour && 0 < e._a[kt] && (w(e).bigHour = void 0), w(e).parsedDateParts = e._a.slice(0), w(e).meridiem = e._meridiem, e._a[kt] = (c = e._locale, u = e._a[kt], null == (h = e._meridiem) ? u : null != c.meridiemHour ? c.meridiemHour(u, h) : (null != c.isPM && ((d = c.isPM(h)) && u < 12 && (u += 12), d || 12 !== u || (u = 0)), u)), le(e), se(e)
                } else ue(e);
            else ce(e);
            var c, u, h, d, f, p, m, g, y
        }

        function de(e) {
            var t, n, i, r, o = e._i,
                s = e._f;
            return e._locale = e._locale || oe(e._l), null === o || void 0 === s && "" === o ? g({
                nullInput: !0
            }) : ("string" == typeof o && (e._i = o = e._locale.preparse(o)), b(o) ? new _(se(o)) : (h(o) ? e._d = o : a(s) ? function(e) {
                var t, n, i, r, o;
                if (0 === e._f.length) return w(e).invalidFormat = !0, e._d = new Date(NaN);
                for (r = 0; r < e._f.length; r++) o = 0, t = y({}, e), null != e._useUTC && (t._useUTC = e._useUTC), t._f = e._f[r], he(t), m(t) && (o += w(t).charsLeftOver, o += 10 * w(t).unusedTokens.length, w(t).score = o, (null == i || o < i) && (i = o, n = t));
                f(e, n || t)
            }(e) : s ? he(e) : c(r = (t = e)._i) ? t._d = new Date(v.now()) : h(r) ? t._d = new Date(r.valueOf()) : "string" == typeof r ? (n = t, null === (i = tn.exec(n._i)) ? (ce(n), !1 === n._isValid && (delete n._isValid, ue(n), !1 === n._isValid && (delete n._isValid, v.createFromInputFallback(n)))) : n._d = new Date(+i[1])) : a(r) ? (t._a = d(r.slice(0), function(e) {
                return parseInt(e, 10)
            }), le(t)) : l(r) ? function(e) {
                if (!e._d) {
                    var t = O(e._i);
                    e._a = d([t.year, t.month, t.day || t.date, t.hour, t.minute, t.second, t.millisecond], function(e) {
                        return e && parseInt(e, 10)
                    }), le(e)
                }
            }(t) : u(r) ? t._d = new Date(r) : v.createFromInputFallback(t), m(e) || (e._d = null), e))
        }

        function fe(e, t, n, i, r) {
            var o, s = {};
            return !0 !== n && !1 !== n || (i = n, n = void 0), (l(e) && function(e) {
                if (Object.getOwnPropertyNames) return 0 === Object.getOwnPropertyNames(e).length;
                var t;
                for (t in e)
                    if (e.hasOwnProperty(t)) return !1;
                return !0
            }(e) || a(e) && 0 === e.length) && (e = void 0), s._isAMomentObject = !0, s._useUTC = s._isUTC = r, s._l = n, s._i = e, s._f = t, s._strict = i, (o = new _(se(de(s))))._nextDay && (o.add(1, "d"), o._nextDay = void 0), o
        }

        function pe(e, t, n, i) {
            return fe(e, t, n, i, !1)
        }

        function me(e, t) {
            var n, i;
            if (1 === t.length && a(t[0]) && (t = t[0]), !t.length) return pe();
            for (n = t[0], i = 1; i < t.length; ++i) t[i].isValid() && !t[i][e](n) || (n = t[i]);
            return n
        }

        function ge(e) {
            var t = O(e),
                n = t.year || 0,
                i = t.quarter || 0,
                r = t.month || 0,
                o = t.week || 0,
                s = t.day || 0,
                a = t.hour || 0,
                l = t.minute || 0,
                c = t.second || 0,
                u = t.millisecond || 0;
            this._isValid = function(e) {
                for (var t in e)
                    if (-1 === Nt.call(an, t) || null != e[t] && isNaN(e[t])) return !1;
                for (var n = !1, i = 0; i < an.length; ++i)
                    if (e[an[i]]) {
                        if (n) return !1;
                        parseFloat(e[an[i]]) !== T(e[an[i]]) && (n = !0)
                    }
                return !0
            }(t), this._milliseconds = +u + 1e3 * c + 6e4 * l + 1e3 * a * 60 * 60, this._days = +s + 7 * o, this._months = +r + 3 * i + 12 * n, this._data = {}, this._locale = oe(), this._bubble()
        }

        function ye(e) {
            return e instanceof ge
        }

        function ve(e) {
            return e < 0 ? -1 * Math.round(-1 * e) : Math.round(e)
        }

        function xe(e, n) {
            i(e, 0, 0, function() {
                var e = this.utcOffset(),
                    t = "+";
                return e < 0 && (e = -e, t = "-"), t + A(~~(e / 60), 2) + n + A(~~e % 60, 2)
            })
        }

        function we(e, t) {
            var n = (t || "").match(e);
            if (null === n) return null;
            var i = ((n[n.length - 1] || []) + "").match(ln) || ["-", 0, 0],
                r = 60 * i[1] + T(i[2]);
            return 0 === r ? 0 : "+" === i[0] ? r : -r
        }

        function _e(e, t) {
            var n, i;
            return t._isUTC ? (n = t.clone(), i = (b(e) || h(e) ? e.valueOf() : pe(e).valueOf()) - n.valueOf(), n._d.setTime(n._d.valueOf() + i), v.updateOffset(n, !1), n) : pe(e).local()
        }

        function be(e) {
            return 15 * -Math.round(e._d.getTimezoneOffset() / 15)
        }

        function Se() {
            return !!this.isValid() && this._isUTC && 0 === this._offset
        }

        function Te(e, t) {
            var n, i, r, o, s, a, l = e,
                c = null;
            return ye(e) ? l = {
                ms: e._milliseconds,
                d: e._days,
                M: e._months
            } : u(e) ? (l = {}, t ? l[t] = e : l.milliseconds = e) : (c = cn.exec(e)) ? (n = "-" === c[1] ? -1 : 1, l = {
                y: 0,
                d: T(c[Et]) * n,
                h: T(c[kt]) * n,
                m: T(c[Mt]) * n,
                s: T(c[Ct]) * n,
                ms: T(ve(1e3 * c[Dt])) * n
            }) : (c = un.exec(e)) ? (n = "-" === c[1] ? -1 : (c[1], 1), l = {
                y: Ee(c[2], n),
                M: Ee(c[3], n),
                w: Ee(c[4], n),
                d: Ee(c[5], n),
                h: Ee(c[6], n),
                m: Ee(c[7], n),
                s: Ee(c[8], n)
            }) : null == l ? l = {} : "object" == typeof l && ("from" in l || "to" in l) && (o = pe(l.from), s = pe(l.to), r = o.isValid() && s.isValid() ? (s = _e(s, o), o.isBefore(s) ? a = ke(o, s) : ((a = ke(s, o)).milliseconds = -a.milliseconds, a.months = -a.months), a) : {
                milliseconds: 0,
                months: 0
            }, (l = {}).ms = r.milliseconds, l.M = r.months), i = new ge(l), ye(e) && x(e, "_locale") && (i._locale = e._locale), i
        }

        function Ee(e, t) {
            var n = e && parseFloat(e.replace(",", "."));
            return (isNaN(n) ? 0 : n) * t
        }

        function ke(e, t) {
            var n = {
                milliseconds: 0,
                months: 0
            };
            return n.months = t.month() - e.month() + 12 * (t.year() - e.year()), e.clone().add(n.months, "M").isAfter(t) && --n.months, n.milliseconds = +t - +e.clone().add(n.months, "M"), n
        }

        function Me(i, r) {
            return function(e, t) {
                var n;
                return null === t || isNaN(+t) || (o(r, "moment()." + r + "(period, number) is deprecated. Please use moment()." + r + "(number, period). See http://momentjs.com/guides/#/warnings/add-inverted-param/ for more info."), n = e, e = t, t = n), Ce(this, Te(e = "string" == typeof e ? +e : e, t), i), this
            }
        }

        function Ce(e, t, n, i) {
            var r = t._milliseconds,
                o = ve(t._days),
                s = ve(t._months);
            e.isValid() && (i = null == i || i, s && q(e, R(e, "Month") + s * n), o && W(e, "Date", R(e, "Date") + o * n), r && e._d.setTime(e._d.valueOf() + r * n), i && v.updateOffset(e, o || s))
        }

        function De(e, t) {
            var n = 12 * (t.year() - e.year()) + (t.month() - e.month()),
                i = e.clone().add(n, "months");
            return -(n + (t - i < 0 ? (t - i) / (i - e.clone().add(n - 1, "months")) : (t - i) / (e.clone().add(n + 1, "months") - i))) || 0
        }

        function Oe(e) {
            var t;
            return void 0 === e ? this._locale._abbr : (null != (t = oe(e)) && (this._locale = t), this)
        }

        function Ae() {
            return this._locale
        }

        function Ne(e, t) {
            i(0, [e, e.length], 0, t)
        }

        function Le(e, t, n, i, r) {
            var o;
            return null == e ? $(this, i, r).year : ((o = K(e, i, r)) < t && (t = o), function(e, t, n, i, r) {
                var o = X(e, t, n, i, r),
                    s = B(o.year, 0, o.dayOfYear);
                return this.year(s.getUTCFullYear()), this.month(s.getUTCMonth()), this.date(s.getUTCDate()), this
            }.call(this, e, t, n, i, r))
        }

        function Ie(e, t) {
            t[Dt] = T(1e3 * ("0." + e))
        }

        function He(e) {
            return e
        }

        function Pe(e, t, n, i) {
            var r = oe(),
                o = p().set(i, t);
            return r[n](o, e)
        }

        function je(e, t, n) {
            if (u(e) && (t = e, e = void 0), e = e || "", null != t) return Pe(e, t, n, "month");
            var i, r = [];
            for (i = 0; i < 12; i++) r[i] = Pe(e, i, n, "month");
            return r
        }

        function ze(e, t, n, i) {
            t = ("boolean" == typeof e || (n = t = e, e = !1), u(t) && (n = t, t = void 0), t || "");
            var r = oe(),
                o = e ? r._week.dow : 0;
            if (null != n) return Pe(t, (n + o) % 7, i, "day");
            var s, a = [];
            for (s = 0; s < 7; s++) a[s] = Pe(t, (s + o) % 7, i, "day");
            return a
        }

        function Ye(e, t, n, i) {
            var r = Te(t, n);
            return e._milliseconds += i * r._milliseconds, e._days += i * r._days, e._months += i * r._months, e._bubble()
        }

        function Re(e) {
            return e < 0 ? Math.floor(e) : Math.ceil(e)
        }

        function We(e) {
            return 4800 * e / 146097
        }

        function Fe(e) {
            return 146097 * e / 4800
        }

        function qe(e) {
            return function() {
                return this.as(e)
            }
        }

        function Ue(e) {
            return function() {
                return this.isValid() ? this._data[e] : NaN
            }
        }

        function Ve(e) {
            return (0 < e) - (e < 0) || +e
        }

        function Be() {
            if (!this.isValid()) return this.localeData().invalidDate();
            var e, t, n = Yn(this._milliseconds) / 1e3,
                i = Yn(this._days),
                r = Yn(this._months);
            t = S((e = S(n / 60)) / 60), n %= 60, e %= 60;
            var o = S(r / 12),
                s = r %= 12,
                a = i,
                l = t,
                c = e,
                u = n ? n.toFixed(3).replace(/\.?0+$/, "") : "",
                h = this.asSeconds();
            if (!h) return "P0D";
            var d = h < 0 ? "-" : "",
                f = Ve(this._months) !== Ve(h) ? "-" : "",
                p = Ve(this._days) !== Ve(h) ? "-" : "",
                m = Ve(this._milliseconds) !== Ve(h) ? "-" : "";
            return d + "P" + (o ? f + o + "Y" : "") + (s ? f + s + "M" : "") + (a ? p + a + "D" : "") + (l || c || u ? "T" : "") + (l ? m + l + "H" : "") + (c ? m + c + "M" : "") + (u ? m + u + "S" : "")
        }
        var Ge, Xe;
        Xe = Array.prototype.some ? Array.prototype.some : function(e) {
            for (var t = Object(this), n = t.length >>> 0, i = 0; i < n; i++)
                if (i in t && e.call(this, t[i], i, t)) return !0;
            return !1
        };
        var $e, Ke = v.momentProperties = [],
            Qe = !1,
            Ze = {};
        v.suppressDeprecationWarnings = !1, v.deprecationHandler = null, $e = Object.keys ? Object.keys : function(e) {
            var t, n = [];
            for (t in e) x(e, t) && n.push(t);
            return n
        };
        var Je = {},
            et = {},
            tt = /(\[[^\[]*\])|(\\)?([Hh]mm(ss)?|Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|Qo?|YYYYYY|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|kk?|mm?|ss?|S{1,9}|x|X|zz?|ZZ?|.)/g,
            nt = /(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,
            it = {},
            rt = {},
            ot = /\d/,
            st = /\d\d/,
            at = /\d{3}/,
            lt = /\d{4}/,
            ct = /[+-]?\d{6}/,
            ut = /\d\d?/,
            ht = /\d\d\d\d?/,
            dt = /\d\d\d\d\d\d?/,
            ft = /\d{1,3}/,
            pt = /\d{1,4}/,
            mt = /[+-]?\d{1,6}/,
            gt = /\d+/,
            yt = /[+-]?\d+/,
            vt = /Z|[+-]\d\d:?\d\d/gi,
            xt = /Z|[+-]\d\d(?::?\d\d)?/gi,
            wt = /[0-9]{0,256}['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFF07\uFF10-\uFFEF]{1,256}|[\u0600-\u06FF\/]{1,256}(\s*?[\u0600-\u06FF]{1,256}){1,2}/i,
            _t = {},
            bt = {},
            St = 0,
            Tt = 1,
            Et = 2,
            kt = 3,
            Mt = 4,
            Ct = 5,
            Dt = 6,
            Ot = 7,
            At = 8;
        i("Y", 0, 0, function() {
            var e = this.year();
            return e <= 9999 ? "" + e : "+" + e
        }), i(0, ["YY", 2], 0, function() {
            return this.year() % 100
        }), i(0, ["YYYY", 4], 0, "year"), i(0, ["YYYYY", 5], 0, "year"), i(0, ["YYYYYY", 6, !0], 0, "year"), t("year", "y"), n("year", 1), L("Y", yt), L("YY", ut, st), L("YYYY", pt, lt), L("YYYYY", mt, ct), L("YYYYYY", mt, ct), H(["YYYYY", "YYYYYY"], St), H("YYYY", function(e, t) {
            t[St] = 2 === e.length ? v.parseTwoDigitYear(e) : T(e)
        }), H("YY", function(e, t) {
            t[St] = v.parseTwoDigitYear(e)
        }), H("Y", function(e, t) {
            t[St] = parseInt(e, 10)
        }), v.parseTwoDigitYear = function(e) {
            return T(e) + (68 < T(e) ? 1900 : 2e3)
        };
        var Nt, Lt = Y("FullYear", !0);
        Nt = Array.prototype.indexOf ? Array.prototype.indexOf : function(e) {
            var t;
            for (t = 0; t < this.length; ++t)
                if (this[t] === e) return t;
            return -1
        }, i("M", ["MM", 2], "Mo", function() {
            return this.month() + 1
        }), i("MMM", 0, 0, function(e) {
            return this.localeData().monthsShort(this, e)
        }), i("MMMM", 0, 0, function(e) {
            return this.localeData().months(this, e)
        }), t("month", "M"), n("month", 8), L("M", ut), L("MM", ut, st), L("MMM", function(e, t) {
            return t.monthsShortRegex(e)
        }), L("MMMM", function(e, t) {
            return t.monthsRegex(e)
        }), H(["M", "MM"], function(e, t) {
            t[Tt] = T(e) - 1
        }), H(["MMM", "MMMM"], function(e, t, n, i) {
            var r = n._locale.monthsParse(e, i, n._strict);
            null != r ? t[Tt] = r : w(n).invalidMonth = e
        });
        var It = /D[oD]?(\[[^\[\]]*\]|\s)+MMMM?/,
            Ht = "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
            Pt = "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
            jt = wt,
            zt = wt;
        i("w", ["ww", 2], "wo", "week"), i("W", ["WW", 2], "Wo", "isoWeek"), t("week", "w"), t("isoWeek", "W"), n("week", 5), n("isoWeek", 5), L("w", ut), L("ww", ut, st), L("W", ut), L("WW", ut, st), P(["w", "ww", "W", "WW"], function(e, t, n, i) {
            t[i.substr(0, 1)] = T(e)
        }), i("d", 0, "do", "day"), i("dd", 0, 0, function(e) {
            return this.localeData().weekdaysMin(this, e)
        }), i("ddd", 0, 0, function(e) {
            return this.localeData().weekdaysShort(this, e)
        }), i("dddd", 0, 0, function(e) {
            return this.localeData().weekdays(this, e)
        }), i("e", 0, 0, "weekday"), i("E", 0, 0, "isoWeekday"), t("day", "d"), t("weekday", "e"), t("isoWeekday", "E"), n("day", 11), n("weekday", 11), n("isoWeekday", 11), L("d", ut), L("e", ut), L("E", ut), L("dd", function(e, t) {
            return t.weekdaysMinRegex(e)
        }), L("ddd", function(e, t) {
            return t.weekdaysShortRegex(e)
        }), L("dddd", function(e, t) {
            return t.weekdaysRegex(e)
        }), P(["dd", "ddd", "dddd"], function(e, t, n, i) {
            var r = n._locale.weekdaysParse(e, i, n._strict);
            null != r ? t.d = r : w(n).invalidWeekday = e
        }), P(["d", "e", "E"], function(e, t, n, i) {
            t[i] = T(e)
        });
        var Yt = "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
            Rt = "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
            Wt = "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
            Ft = wt,
            qt = wt,
            Ut = wt;
        i("H", ["HH", 2], 0, "hour"), i("h", ["hh", 2], 0, Z), i("k", ["kk", 2], 0, function() {
            return this.hours() || 24
        }), i("hmm", 0, 0, function() {
            return "" + Z.apply(this) + A(this.minutes(), 2)
        }), i("hmmss", 0, 0, function() {
            return "" + Z.apply(this) + A(this.minutes(), 2) + A(this.seconds(), 2)
        }), i("Hmm", 0, 0, function() {
            return "" + this.hours() + A(this.minutes(), 2)
        }), i("Hmmss", 0, 0, function() {
            return "" + this.hours() + A(this.minutes(), 2) + A(this.seconds(), 2)
        }), J("a", !0), J("A", !1), t("hour", "h"), n("hour", 13), L("a", ee), L("A", ee), L("H", ut), L("h", ut), L("k", ut), L("HH", ut, st), L("hh", ut, st), L("kk", ut, st), L("hmm", ht), L("hmmss", dt), L("Hmm", ht), L("Hmmss", dt), H(["H", "HH"], kt), H(["k", "kk"], function(e, t, n) {
            var i = T(e);
            t[kt] = 24 === i ? 0 : i
        }), H(["a", "A"], function(e, t, n) {
            n._isPm = n._locale.isPM(e), n._meridiem = e
        }), H(["h", "hh"], function(e, t, n) {
            t[kt] = T(e), w(n).bigHour = !0
        }), H("hmm", function(e, t, n) {
            var i = e.length - 2;
            t[kt] = T(e.substr(0, i)), t[Mt] = T(e.substr(i)), w(n).bigHour = !0
        }), H("hmmss", function(e, t, n) {
            var i = e.length - 4,
                r = e.length - 2;
            t[kt] = T(e.substr(0, i)), t[Mt] = T(e.substr(i, 2)), t[Ct] = T(e.substr(r)), w(n).bigHour = !0
        }), H("Hmm", function(e, t, n) {
            var i = e.length - 2;
            t[kt] = T(e.substr(0, i)), t[Mt] = T(e.substr(i))
        }), H("Hmmss", function(e, t, n) {
            var i = e.length - 4,
                r = e.length - 2;
            t[kt] = T(e.substr(0, i)), t[Mt] = T(e.substr(i, 2)), t[Ct] = T(e.substr(r))
        });
        var Vt, Bt = Y("Hours", !0),
            Gt = {
                calendar: {
                    sameDay: "[Today at] LT",
                    nextDay: "[Tomorrow at] LT",
                    nextWeek: "dddd [at] LT",
                    lastDay: "[Yesterday at] LT",
                    lastWeek: "[Last] dddd [at] LT",
                    sameElse: "L"
                },
                longDateFormat: {
                    LTS: "h:mm:ss A",
                    LT: "h:mm A",
                    L: "MM/DD/YYYY",
                    LL: "MMMM D, YYYY",
                    LLL: "MMMM D, YYYY h:mm A",
                    LLLL: "dddd, MMMM D, YYYY h:mm A"
                },
                invalidDate: "Invalid date",
                ordinal: "%d",
                dayOfMonthOrdinalParse: /\d{1,2}/,
                relativeTime: {
                    future: "in %s",
                    past: "%s ago",
                    s: "a few seconds",
                    ss: "%d seconds",
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
                months: Ht,
                monthsShort: Pt,
                week: {
                    dow: 0,
                    doy: 6
                },
                weekdays: Yt,
                weekdaysMin: Wt,
                weekdaysShort: Rt,
                meridiemParse: /[ap]\.?m?\.?/i
            },
            Xt = {},
            $t = {},
            Kt = /^\s*((?:[+-]\d{6}|\d{4})-(?:\d\d-\d\d|W\d\d-\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?::\d\d(?::\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?$/,
            Qt = /^\s*((?:[+-]\d{6}|\d{4})(?:\d\d\d\d|W\d\d\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?:\d\d(?:\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?$/,
            Zt = /Z|[+-]\d\d(?::?\d\d)?/,
            Jt = [
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
            en = [
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
            tn = /^\/?Date\((\-?\d+)/i,
            nn = /^(?:(Mon|Tue|Wed|Thu|Fri|Sat|Sun),?\s)?(\d{1,2})\s(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\s(\d{2,4})\s(\d\d):(\d\d)(?::(\d\d))?\s(?:(UT|GMT|[ECMP][SD]T)|([Zz])|([+-]\d{4}))$/,
            rn = {
                UT: 0,
                GMT: 0,
                EDT: -240,
                EST: -300,
                CDT: -300,
                CST: -360,
                MDT: -360,
                MST: -420,
                PDT: -420,
                PST: -480
            };
        v.createFromInputFallback = e("value provided is not in a recognized RFC2822 or ISO format. moment construction falls back to js Date(), which is not reliable across all browsers and versions. Non RFC2822/ISO date formats are discouraged and will be removed in an upcoming major release. Please refer to http://momentjs.com/guides/#/warnings/js-date/ for more info.", function(e) {
            e._d = new Date(e._i + (e._useUTC ? " UTC" : ""))
        }), v.ISO_8601 = function() {}, v.RFC_2822 = function() {};
        var on = e("moment().min is deprecated, use moment.max instead. http://momentjs.com/guides/#/warnings/min-max/", function() {
                var e = pe.apply(null, arguments);
                return this.isValid() && e.isValid() ? e < this ? this : e : g()
            }),
            sn = e("moment().max is deprecated, use moment.min instead. http://momentjs.com/guides/#/warnings/min-max/", function() {
                var e = pe.apply(null, arguments);
                return this.isValid() && e.isValid() ? this < e ? this : e : g()
            }),
            an = ["year", "quarter", "month", "week", "day", "hour", "minute", "second", "millisecond"];
        xe("Z", ":"), xe("ZZ", ""), L("Z", xt), L("ZZ", xt), H(["Z", "ZZ"], function(e, t, n) {
            n._useUTC = !0, n._tzm = we(xt, e)
        });
        var ln = /([\+\-]|\d\d)/gi;
        v.updateOffset = function() {};
        var cn = /^(\-|\+)?(?:(\d*)[. ])?(\d+)\:(\d+)(?:\:(\d+)(\.\d*)?)?$/,
            un = /^(-|\+)?P(?:([-+]?[0-9,.]*)Y)?(?:([-+]?[0-9,.]*)M)?(?:([-+]?[0-9,.]*)W)?(?:([-+]?[0-9,.]*)D)?(?:T(?:([-+]?[0-9,.]*)H)?(?:([-+]?[0-9,.]*)M)?(?:([-+]?[0-9,.]*)S)?)?$/;
        Te.fn = ge.prototype, Te.invalid = function() {
            return Te(NaN)
        };
        var hn = Me(1, "add"),
            dn = Me(-1, "subtract");
        v.defaultFormat = "YYYY-MM-DDTHH:mm:ssZ", v.defaultFormatUtc = "YYYY-MM-DDTHH:mm:ss[Z]";
        var fn = e("moment().lang() is deprecated. Instead, use moment().localeData() to get the language configuration. Use moment().locale() to change languages.", function(e) {
            return void 0 === e ? this.localeData() : this.locale(e)
        });
        i(0, ["gg", 2], 0, function() {
            return this.weekYear() % 100
        }), i(0, ["GG", 2], 0, function() {
            return this.isoWeekYear() % 100
        }), Ne("gggg", "weekYear"), Ne("ggggg", "weekYear"), Ne("GGGG", "isoWeekYear"), Ne("GGGGG", "isoWeekYear"), t("weekYear", "gg"), t("isoWeekYear", "GG"), n("weekYear", 1), n("isoWeekYear", 1), L("G", yt), L("g", yt), L("GG", ut, st), L("gg", ut, st), L("GGGG", pt, lt), L("gggg", pt, lt), L("GGGGG", mt, ct), L("ggggg", mt, ct), P(["gggg", "ggggg", "GGGG", "GGGGG"], function(e, t, n, i) {
            t[i.substr(0, 2)] = T(e)
        }), P(["gg", "GG"], function(e, t, n, i) {
            t[i] = v.parseTwoDigitYear(e)
        }), i("Q", 0, "Qo", "quarter"), t("quarter", "Q"), n("quarter", 7), L("Q", ot), H("Q", function(e, t) {
            t[Tt] = 3 * (T(e) - 1)
        }), i("D", ["DD", 2], "Do", "date"), t("date", "D"), n("date", 9), L("D", ut), L("DD", ut, st), L("Do", function(e, t) {
            return e ? t._dayOfMonthOrdinalParse || t._ordinalParse : t._dayOfMonthOrdinalParseLenient
        }), H(["D", "DD"], Et), H("Do", function(e, t) {
            t[Et] = T(e.match(ut)[0])
        });
        var pn = Y("Date", !0);
        i("DDD", ["DDDD", 3], "DDDo", "dayOfYear"), t("dayOfYear", "DDD"), n("dayOfYear", 4), L("DDD", ft), L("DDDD", at), H(["DDD", "DDDD"], function(e, t, n) {
            n._dayOfYear = T(e)
        }), i("m", ["mm", 2], 0, "minute"), t("minute", "m"), n("minute", 14), L("m", ut), L("mm", ut, st), H(["m", "mm"], Mt);
        var mn = Y("Minutes", !1);
        i("s", ["ss", 2], 0, "second"), t("second", "s"), n("second", 15), L("s", ut), L("ss", ut, st), H(["s", "ss"], Ct);
        var gn, yn = Y("Seconds", !1);
        for (i("S", 0, 0, function() {
            return ~~(this.millisecond() / 100)
        }), i(0, ["SS", 2], 0, function() {
            return ~~(this.millisecond() / 10)
        }), i(0, ["SSS", 3], 0, "millisecond"), i(0, ["SSSS", 4], 0, function() {
            return 10 * this.millisecond()
        }), i(0, ["SSSSS", 5], 0, function() {
            return 100 * this.millisecond()
        }), i(0, ["SSSSSS", 6], 0, function() {
            return 1e3 * this.millisecond()
        }), i(0, ["SSSSSSS", 7], 0, function() {
            return 1e4 * this.millisecond()
        }), i(0, ["SSSSSSSS", 8], 0, function() {
            return 1e5 * this.millisecond()
        }), i(0, ["SSSSSSSSS", 9], 0, function() {
            return 1e6 * this.millisecond()
        }), t("millisecond", "ms"), n("millisecond", 16), L("S", ft, ot), L("SS", ft, st), L("SSS", ft, at), gn = "SSSS"; gn.length <= 9; gn += "S") L(gn, gt);
        for (gn = "S"; gn.length <= 9; gn += "S") H(gn, Ie);
        var vn = Y("Milliseconds", !1);
        i("z", 0, 0, "zoneAbbr"), i("zz", 0, 0, "zoneName");
        var xn = _.prototype;
        xn.add = hn, xn.calendar = function(e, t) {
            var n = e || pe(),
                i = _e(n, this).startOf("day"),
                r = v.calendarFormat(this, i) || "sameElse",
                o = t && (k(t[r]) ? t[r].call(this, n) : t[r]);
            return this.format(o || this.localeData().calendar(r, this, pe(n)))
        }, xn.clone = function() {
            return new _(this)
        }, xn.diff = function(e, t, n) {
            var i, r, o;
            if (!this.isValid()) return NaN;
            if (!(i = _e(e, this)).isValid()) return NaN;
            switch (r = 6e4 * (i.utcOffset() - this.utcOffset()), t = D(t)) {
                case "year":
                    o = De(this, i) / 12;
                    break;
                case "month":
                    o = De(this, i);
                    break;
                case "quarter":
                    o = De(this, i) / 3;
                    break;
                case "second":
                    o = (this - i) / 1e3;
                    break;
                case "minute":
                    o = (this - i) / 6e4;
                    break;
                case "hour":
                    o = (this - i) / 36e5;
                    break;
                case "day":
                    o = (this - i - r) / 864e5;
                    break;
                case "week":
                    o = (this - i - r) / 6048e5;
                    break;
                default:
                    o = this - i
            }
            return n ? o : S(o)
        }, xn.endOf = function(e) {
            return void 0 === (e = D(e)) || "millisecond" === e ? this : ("date" === e && (e = "day"), this.startOf(e).add(1, "isoWeek" === e ? "week" : e).subtract(1, "ms"))
        }, xn.format = function(e) {
            e || (e = this.isUtc() ? v.defaultFormatUtc : v.defaultFormat);
            var t = r(this, e);
            return this.localeData().postformat(t)
        }, xn.from = function(e, t) {
            return this.isValid() && (b(e) && e.isValid() || pe(e).isValid()) ? Te({
                to: this,
                from: e
            }).locale(this.locale()).humanize(!t) : this.localeData().invalidDate()
        }, xn.fromNow = function(e) {
            return this.from(pe(), e)
        }, xn.to = function(e, t) {
            return this.isValid() && (b(e) && e.isValid() || pe(e).isValid()) ? Te({
                from: this,
                to: e
            }).locale(this.locale()).humanize(!t) : this.localeData().invalidDate()
        }, xn.toNow = function(e) {
            return this.to(pe(), e)
        }, xn.get = function(e) {
            return k(this[e = D(e)]) ? this[e]() : this
        }, xn.invalidAt = function() {
            return w(this).overflow
        }, xn.isAfter = function(e, t) {
            var n = b(e) ? e : pe(e);
            return !(!this.isValid() || !n.isValid()) && ("millisecond" === (t = D(c(t) ? "millisecond" : t)) ? this.valueOf() > n.valueOf() : n.valueOf() < this.clone().startOf(t).valueOf())
        }, xn.isBefore = function(e, t) {
            var n = b(e) ? e : pe(e);
            return !(!this.isValid() || !n.isValid()) && ("millisecond" === (t = D(c(t) ? "millisecond" : t)) ? this.valueOf() < n.valueOf() : this.clone().endOf(t).valueOf() < n.valueOf())
        }, xn.isBetween = function(e, t, n, i) {
            return ("(" === (i = i || "()")[0] ? this.isAfter(e, n) : !this.isBefore(e, n)) && (")" === i[1] ? this.isBefore(t, n) : !this.isAfter(t, n))
        }, xn.isSame = function(e, t) {
            var n, i = b(e) ? e : pe(e);
            return !(!this.isValid() || !i.isValid()) && ("millisecond" === (t = D(t || "millisecond")) ? this.valueOf() === i.valueOf() : (n = i.valueOf(), this.clone().startOf(t).valueOf() <= n && n <= this.clone().endOf(t).valueOf()))
        }, xn.isSameOrAfter = function(e, t) {
            return this.isSame(e, t) || this.isAfter(e, t)
        }, xn.isSameOrBefore = function(e, t) {
            return this.isSame(e, t) || this.isBefore(e, t)
        }, xn.isValid = function() {
            return m(this)
        }, xn.lang = fn, xn.locale = Oe, xn.localeData = Ae, xn.max = sn, xn.min = on, xn.parsingFlags = function() {
            return f({}, w(this))
        }, xn.set = function(e, t) {
            if ("object" == typeof e)
                for (var n = function(e) {
                    var t = [];
                    for (var n in e) t.push({
                        unit: n,
                        priority: et[n]
                    });
                    return t.sort(function(e, t) {
                        return e.priority - t.priority
                    }), t
                }(e = O(e)), i = 0; i < n.length; i++) this[n[i].unit](e[n[i].unit]);
            else if (k(this[e = D(e)])) return this[e](t);
            return this
        }, xn.startOf = function(e) {
            switch (e = D(e)) {
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
        }, xn.subtract = dn, xn.toArray = function() {
            return [this.year(), this.month(), this.date(), this.hour(), this.minute(), this.second(), this.millisecond()]
        }, xn.toObject = function() {
            return {
                years: this.year(),
                months: this.month(),
                date: this.date(),
                hours: this.hours(),
                minutes: this.minutes(),
                seconds: this.seconds(),
                milliseconds: this.milliseconds()
            }
        }, xn.toDate = function() {
            return new Date(this.valueOf())
        }, xn.toISOString = function(e) {
            if (!this.isValid()) return null;
            var t = !0 !== e,
                n = t ? this.clone().utc() : this;
            return n.year() < 0 || 9999 < n.year() ? r(n, t ? "YYYYYY-MM-DD[T]HH:mm:ss.SSS[Z]" : "YYYYYY-MM-DD[T]HH:mm:ss.SSSZ") : k(Date.prototype.toISOString) ? t ? this.toDate().toISOString() : new Date(this._d.valueOf()).toISOString().replace("Z", r(n, "Z")) : r(n, t ? "YYYY-MM-DD[T]HH:mm:ss.SSS[Z]" : "YYYY-MM-DD[T]HH:mm:ss.SSSZ")
        }, xn.inspect = function() {
            if (!this.isValid()) return "moment.invalid(/* " + this._i + " */)";
            var e = "moment",
                t = "";
            this.isLocal() || (e = 0 === this.utcOffset() ? "moment.utc" : "moment.parseZone", t = "Z");
            var n = "[" + e + '("]',
                i = 0 <= this.year() && this.year() <= 9999 ? "YYYY" : "YYYYYY",
                r = t + '[")]';
            return this.format(n + i + "-MM-DD[T]HH:mm:ss.SSS" + r)
        }, xn.toJSON = function() {
            return this.isValid() ? this.toISOString() : null
        }, xn.toString = function() {
            return this.clone().locale("en").format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ")
        }, xn.unix = function() {
            return Math.floor(this.valueOf() / 1e3)
        }, xn.valueOf = function() {
            return this._d.valueOf() - 6e4 * (this._offset || 0)
        }, xn.creationData = function() {
            return {
                input: this._i,
                format: this._f,
                locale: this._locale,
                isUTC: this._isUTC,
                strict: this._strict
            }
        }, xn.year = Lt, xn.isLeapYear = function() {
            return z(this.year())
        }, xn.weekYear = function(e) {
            return Le.call(this, e, this.week(), this.weekday(), this.localeData()._week.dow, this.localeData()._week.doy)
        }, xn.isoWeekYear = function(e) {
            return Le.call(this, e, this.isoWeek(), this.isoWeekday(), 1, 4)
        }, xn.quarter = xn.quarters = function(e) {
            return null == e ? Math.ceil((this.month() + 1) / 3) : this.month(3 * (e - 1) + this.month() % 3)
        }, xn.month = U, xn.daysInMonth = function() {
            return F(this.year(), this.month())
        }, xn.week = xn.weeks = function(e) {
            var t = this.localeData().week(this);
            return null == e ? t : this.add(7 * (e - t), "d")
        }, xn.isoWeek = xn.isoWeeks = function(e) {
            var t = $(this, 1, 4).week;
            return null == e ? t : this.add(7 * (e - t), "d")
        }, xn.weeksInYear = function() {
            var e = this.localeData()._week;
            return K(this.year(), e.dow, e.doy)
        }, xn.isoWeeksInYear = function() {
            return K(this.year(), 1, 4)
        }, xn.date = pn, xn.day = xn.days = function(e) {
            if (!this.isValid()) return null != e ? this : NaN;
            var t, n, i = this._isUTC ? this._d.getUTCDay() : this._d.getDay();
            return null != e ? (t = e, n = this.localeData(), e = "string" != typeof t ? t : isNaN(t) ? "number" == typeof(t = n.weekdaysParse(t)) ? t : null : parseInt(t, 10), this.add(e - i, "d")) : i
        }, xn.weekday = function(e) {
            if (!this.isValid()) return null != e ? this : NaN;
            var t = (this.day() + 7 - this.localeData()._week.dow) % 7;
            return null == e ? t : this.add(e - t, "d")
        }, xn.isoWeekday = function(e) {
            if (!this.isValid()) return null != e ? this : NaN;
            if (null == e) return this.day() || 7;
            var t, n, i = (t = e, n = this.localeData(), "string" == typeof t ? n.weekdaysParse(t) % 7 || 7 : isNaN(t) ? null : t);
            return this.day(this.day() % 7 ? i : i - 7)
        }, xn.dayOfYear = function(e) {
            var t = Math.round((this.clone().startOf("day") - this.clone().startOf("year")) / 864e5) + 1;
            return null == e ? t : this.add(e - t, "d")
        }, xn.hour = xn.hours = Bt, xn.minute = xn.minutes = mn, xn.second = xn.seconds = yn, xn.millisecond = xn.milliseconds = vn, xn.utcOffset = function(e, t, n) {
            var i, r = this._offset || 0;
            if (!this.isValid()) return null != e ? this : NaN;
            if (null == e) return this._isUTC ? r : be(this);
            if ("string" == typeof e) {
                if (null === (e = we(xt, e))) return this
            } else Math.abs(e) < 16 && !n && (e *= 60);
            return !this._isUTC && t && (i = be(this)), this._offset = e, this._isUTC = !0, null != i && this.add(i, "m"), r !== e && (!t || this._changeInProgress ? Ce(this, Te(e - r, "m"), 1, !1) : this._changeInProgress || (this._changeInProgress = !0, v.updateOffset(this, !0), this._changeInProgress = null)), this
        }, xn.utc = function(e) {
            return this.utcOffset(0, e)
        }, xn.local = function(e) {
            return this._isUTC && (this.utcOffset(0, e), this._isUTC = !1, e && this.subtract(be(this), "m")), this
        }, xn.parseZone = function() {
            if (null != this._tzm) this.utcOffset(this._tzm, !1, !0);
            else if ("string" == typeof this._i) {
                var e = we(vt, this._i);
                null != e ? this.utcOffset(e) : this.utcOffset(0, !0)
            }
            return this
        }, xn.hasAlignedHourOffset = function(e) {
            return !!this.isValid() && (e = e ? pe(e).utcOffset() : 0, (this.utcOffset() - e) % 60 == 0)
        }, xn.isDST = function() {
            return this.utcOffset() > this.clone().month(0).utcOffset() || this.utcOffset() > this.clone().month(5).utcOffset()
        }, xn.isLocal = function() {
            return !!this.isValid() && !this._isUTC
        }, xn.isUtcOffset = function() {
            return !!this.isValid() && this._isUTC
        }, xn.isUtc = Se, xn.isUTC = Se, xn.zoneAbbr = function() {
            return this._isUTC ? "UTC" : ""
        }, xn.zoneName = function() {
            return this._isUTC ? "Coordinated Universal Time" : ""
        }, xn.dates = e("dates accessor is deprecated. Use date instead.", pn), xn.months = e("months accessor is deprecated. Use month instead", U), xn.years = e("years accessor is deprecated. Use year instead", Lt), xn.zone = e("moment().zone is deprecated, use moment().utcOffset instead. http://momentjs.com/guides/#/warnings/zone/", function(e, t) {
            return null != e ? ("string" != typeof e && (e = -e), this.utcOffset(e, t), this) : -this.utcOffset()
        }), xn.isDSTShifted = e("isDSTShifted is deprecated. See http://momentjs.com/guides/#/warnings/dst-shifted/ for more information", function() {
            if (!c(this._isDSTShifted)) return this._isDSTShifted;
            var e = {};
            if (y(e, this), (e = de(e))._a) {
                var t = e._isUTC ? p(e._a) : pe(e._a);
                this._isDSTShifted = this.isValid() && 0 < s(e._a, t.toArray())
            } else this._isDSTShifted = !1;
            return this._isDSTShifted
        });
        var wn = C.prototype;
        wn.calendar = function(e, t, n) {
            var i = this._calendar[e] || this._calendar.sameElse;
            return k(i) ? i.call(t, n) : i
        }, wn.longDateFormat = function(e) {
            var t = this._longDateFormat[e],
                n = this._longDateFormat[e.toUpperCase()];
            return t || !n ? t : (this._longDateFormat[e] = n.replace(/MMMM|MM|DD|dddd/g, function(e) {
                return e.slice(1)
            }), this._longDateFormat[e])
        }, wn.invalidDate = function() {
            return this._invalidDate
        }, wn.ordinal = function(e) {
            return this._ordinal.replace("%d", e)
        }, wn.preparse = He, wn.postformat = He, wn.relativeTime = function(e, t, n, i) {
            var r = this._relativeTime[n];
            return k(r) ? r(e, t, n, i) : r.replace(/%d/i, e)
        }, wn.pastFuture = function(e, t) {
            var n = this._relativeTime[0 < e ? "future" : "past"];
            return k(n) ? n(t) : n.replace(/%s/i, t)
        }, wn.set = function(e) {
            var t, n;
            for (n in e) k(t = e[n]) ? this[n] = t : this["_" + n] = t;
            this._config = e, this._dayOfMonthOrdinalParseLenient = new RegExp((this._dayOfMonthOrdinalParse.source || this._ordinalParse.source) + "|" + /\d{1,2}/.source)
        }, wn.months = function(e, t) {
            return e ? a(this._months) ? this._months[e.month()] : this._months[(this._months.isFormat || It).test(t) ? "format" : "standalone"][e.month()] : a(this._months) ? this._months : this._months.standalone
        }, wn.monthsShort = function(e, t) {
            return e ? a(this._monthsShort) ? this._monthsShort[e.month()] : this._monthsShort[It.test(t) ? "format" : "standalone"][e.month()] : a(this._monthsShort) ? this._monthsShort : this._monthsShort.standalone
        }, wn.monthsParse = function(e, t, n) {
            var i, r, o;
            if (this._monthsParseExact) return function(e, t, n) {
                var i, r, o, s = e.toLocaleLowerCase();
                if (!this._monthsParse)
                    for (this._monthsParse = [], this._longMonthsParse = [], this._shortMonthsParse = [], i = 0; i < 12; ++i) o = p([2e3, i]), this._shortMonthsParse[i] = this.monthsShort(o, "").toLocaleLowerCase(), this._longMonthsParse[i] = this.months(o, "").toLocaleLowerCase();
                return n ? "MMM" === t ? -1 !== (r = Nt.call(this._shortMonthsParse, s)) ? r : null : -1 !== (r = Nt.call(this._longMonthsParse, s)) ? r : null : "MMM" === t ? -1 !== (r = Nt.call(this._shortMonthsParse, s)) ? r : -1 !== (r = Nt.call(this._longMonthsParse, s)) ? r : null : -1 !== (r = Nt.call(this._longMonthsParse, s)) ? r : -1 !== (r = Nt.call(this._shortMonthsParse, s)) ? r : null
            }.call(this, e, t, n);
            for (this._monthsParse || (this._monthsParse = [], this._longMonthsParse = [], this._shortMonthsParse = []), i = 0; i < 12; i++) {
                if (r = p([2e3, i]), n && !this._longMonthsParse[i] && (this._longMonthsParse[i] = new RegExp("^" + this.months(r, "").replace(".", "") + "$", "i"), this._shortMonthsParse[i] = new RegExp("^" + this.monthsShort(r, "").replace(".", "") + "$", "i")), n || this._monthsParse[i] || (o = "^" + this.months(r, "") + "|^" + this.monthsShort(r, ""), this._monthsParse[i] = new RegExp(o.replace(".", ""), "i")), n && "MMMM" === t && this._longMonthsParse[i].test(e)) return i;
                if (n && "MMM" === t && this._shortMonthsParse[i].test(e)) return i;
                if (!n && this._monthsParse[i].test(e)) return i
            }
        }, wn.monthsRegex = function(e) {
            return this._monthsParseExact ? (x(this, "_monthsRegex") || V.call(this), e ? this._monthsStrictRegex : this._monthsRegex) : (x(this, "_monthsRegex") || (this._monthsRegex = zt), this._monthsStrictRegex && e ? this._monthsStrictRegex : this._monthsRegex)
        }, wn.monthsShortRegex = function(e) {
            return this._monthsParseExact ? (x(this, "_monthsRegex") || V.call(this), e ? this._monthsShortStrictRegex : this._monthsShortRegex) : (x(this, "_monthsShortRegex") || (this._monthsShortRegex = jt), this._monthsShortStrictRegex && e ? this._monthsShortStrictRegex : this._monthsShortRegex)
        }, wn.week = function(e) {
            return $(e, this._week.dow, this._week.doy).week
        }, wn.firstDayOfYear = function() {
            return this._week.doy
        }, wn.firstDayOfWeek = function() {
            return this._week.dow
        }, wn.weekdays = function(e, t) {
            return e ? a(this._weekdays) ? this._weekdays[e.day()] : this._weekdays[this._weekdays.isFormat.test(t) ? "format" : "standalone"][e.day()] : a(this._weekdays) ? this._weekdays : this._weekdays.standalone
        }, wn.weekdaysMin = function(e) {
            return e ? this._weekdaysMin[e.day()] : this._weekdaysMin
        }, wn.weekdaysShort = function(e) {
            return e ? this._weekdaysShort[e.day()] : this._weekdaysShort
        }, wn.weekdaysParse = function(e, t, n) {
            var i, r, o;
            if (this._weekdaysParseExact) return function(e, t, n) {
                var i, r, o, s = e.toLocaleLowerCase();
                if (!this._weekdaysParse)
                    for (this._weekdaysParse = [], this._shortWeekdaysParse = [], this._minWeekdaysParse = [], i = 0; i < 7; ++i) o = p([2e3, 1]).day(i), this._minWeekdaysParse[i] = this.weekdaysMin(o, "").toLocaleLowerCase(), this._shortWeekdaysParse[i] = this.weekdaysShort(o, "").toLocaleLowerCase(), this._weekdaysParse[i] = this.weekdays(o, "").toLocaleLowerCase();
                return n ? "dddd" === t ? -1 !== (r = Nt.call(this._weekdaysParse, s)) ? r : null : "ddd" === t ? -1 !== (r = Nt.call(this._shortWeekdaysParse, s)) ? r : null : -1 !== (r = Nt.call(this._minWeekdaysParse, s)) ? r : null : "dddd" === t ? -1 !== (r = Nt.call(this._weekdaysParse, s)) ? r : -1 !== (r = Nt.call(this._shortWeekdaysParse, s)) ? r : -1 !== (r = Nt.call(this._minWeekdaysParse, s)) ? r : null : "ddd" === t ? -1 !== (r = Nt.call(this._shortWeekdaysParse, s)) ? r : -1 !== (r = Nt.call(this._weekdaysParse, s)) ? r : -1 !== (r = Nt.call(this._minWeekdaysParse, s)) ? r : null : -1 !== (r = Nt.call(this._minWeekdaysParse, s)) ? r : -1 !== (r = Nt.call(this._weekdaysParse, s)) ? r : -1 !== (r = Nt.call(this._shortWeekdaysParse, s)) ? r : null
            }.call(this, e, t, n);
            for (this._weekdaysParse || (this._weekdaysParse = [], this._minWeekdaysParse = [], this._shortWeekdaysParse = [], this._fullWeekdaysParse = []), i = 0; i < 7; i++) {
                if (r = p([2e3, 1]).day(i), n && !this._fullWeekdaysParse[i] && (this._fullWeekdaysParse[i] = new RegExp("^" + this.weekdays(r, "").replace(".", ".?") + "$", "i"), this._shortWeekdaysParse[i] = new RegExp("^" + this.weekdaysShort(r, "").replace(".", ".?") + "$", "i"), this._minWeekdaysParse[i] = new RegExp("^" + this.weekdaysMin(r, "").replace(".", ".?") + "$", "i")), this._weekdaysParse[i] || (o = "^" + this.weekdays(r, "") + "|^" + this.weekdaysShort(r, "") + "|^" + this.weekdaysMin(r, ""), this._weekdaysParse[i] = new RegExp(o.replace(".", ""), "i")), n && "dddd" === t && this._fullWeekdaysParse[i].test(e)) return i;
                if (n && "ddd" === t && this._shortWeekdaysParse[i].test(e)) return i;
                if (n && "dd" === t && this._minWeekdaysParse[i].test(e)) return i;
                if (!n && this._weekdaysParse[i].test(e)) return i
            }
        }, wn.weekdaysRegex = function(e) {
            return this._weekdaysParseExact ? (x(this, "_weekdaysRegex") || Q.call(this), e ? this._weekdaysStrictRegex : this._weekdaysRegex) : (x(this, "_weekdaysRegex") || (this._weekdaysRegex = Ft), this._weekdaysStrictRegex && e ? this._weekdaysStrictRegex : this._weekdaysRegex)
        }, wn.weekdaysShortRegex = function(e) {
            return this._weekdaysParseExact ? (x(this, "_weekdaysRegex") || Q.call(this), e ? this._weekdaysShortStrictRegex : this._weekdaysShortRegex) : (x(this, "_weekdaysShortRegex") || (this._weekdaysShortRegex = qt), this._weekdaysShortStrictRegex && e ? this._weekdaysShortStrictRegex : this._weekdaysShortRegex)
        }, wn.weekdaysMinRegex = function(e) {
            return this._weekdaysParseExact ? (x(this, "_weekdaysRegex") || Q.call(this), e ? this._weekdaysMinStrictRegex : this._weekdaysMinRegex) : (x(this, "_weekdaysMinRegex") || (this._weekdaysMinRegex = Ut), this._weekdaysMinStrictRegex && e ? this._weekdaysMinStrictRegex : this._weekdaysMinRegex)
        }, wn.isPM = function(e) {
            return "p" === (e + "").toLowerCase().charAt(0)
        }, wn.meridiem = function(e, t, n) {
            return 11 < e ? n ? "pm" : "PM" : n ? "am" : "AM"
        }, ie("en", {
            dayOfMonthOrdinalParse: /\d{1,2}(th|st|nd|rd)/,
            ordinal: function(e) {
                var t = e % 10;
                return e + (1 === T(e % 100 / 10) ? "th" : 1 === t ? "st" : 2 === t ? "nd" : 3 === t ? "rd" : "th")
            }
        }), v.lang = e("moment.lang is deprecated. Use moment.locale instead.", ie), v.langData = e("moment.langData is deprecated. Use moment.localeData instead.", oe);
        var _n = Math.abs,
            bn = qe("ms"),
            Sn = qe("s"),
            Tn = qe("m"),
            En = qe("h"),
            kn = qe("d"),
            Mn = qe("w"),
            Cn = qe("M"),
            Dn = qe("y"),
            On = Ue("milliseconds"),
            An = Ue("seconds"),
            Nn = Ue("minutes"),
            Ln = Ue("hours"),
            In = Ue("days"),
            Hn = Ue("months"),
            Pn = Ue("years"),
            jn = Math.round,
            zn = {
                ss: 44,
                s: 45,
                m: 45,
                h: 22,
                d: 26,
                M: 11
            },
            Yn = Math.abs,
            Rn = ge.prototype;
        return Rn.isValid = function() {
            return this._isValid
        }, Rn.abs = function() {
            var e = this._data;
            return this._milliseconds = _n(this._milliseconds), this._days = _n(this._days), this._months = _n(this._months), e.milliseconds = _n(e.milliseconds), e.seconds = _n(e.seconds), e.minutes = _n(e.minutes), e.hours = _n(e.hours), e.months = _n(e.months), e.years = _n(e.years), this
        }, Rn.add = function(e, t) {
            return Ye(this, e, t, 1)
        }, Rn.subtract = function(e, t) {
            return Ye(this, e, t, -1)
        }, Rn.as = function(e) {
            if (!this.isValid()) return NaN;
            var t, n, i = this._milliseconds;
            if ("month" === (e = D(e)) || "year" === e) return t = this._days + i / 864e5, n = this._months + We(t), "month" === e ? n : n / 12;
            switch (t = this._days + Math.round(Fe(this._months)), e) {
                case "week":
                    return t / 7 + i / 6048e5;
                case "day":
                    return t + i / 864e5;
                case "hour":
                    return 24 * t + i / 36e5;
                case "minute":
                    return 1440 * t + i / 6e4;
                case "second":
                    return 86400 * t + i / 1e3;
                case "millisecond":
                    return Math.floor(864e5 * t) + i;
                default:
                    throw new Error("Unknown unit " + e)
            }
        }, Rn.asMilliseconds = bn, Rn.asSeconds = Sn, Rn.asMinutes = Tn, Rn.asHours = En, Rn.asDays = kn, Rn.asWeeks = Mn, Rn.asMonths = Cn, Rn.asYears = Dn, Rn.valueOf = function() {
            return this.isValid() ? this._milliseconds + 864e5 * this._days + this._months % 12 * 2592e6 + 31536e6 * T(this._months / 12) : NaN
        }, Rn._bubble = function() {
            var e, t, n, i, r, o = this._milliseconds,
                s = this._days,
                a = this._months,
                l = this._data;
            return 0 <= o && 0 <= s && 0 <= a || o <= 0 && s <= 0 && a <= 0 || (o += 864e5 * Re(Fe(a) + s), a = s = 0), l.milliseconds = o % 1e3, e = S(o / 1e3), l.seconds = e % 60, t = S(e / 60), l.minutes = t % 60, n = S(t / 60), l.hours = n % 24, a += r = S(We(s += S(n / 24))), s -= Re(Fe(r)), i = S(a / 12), a %= 12, l.days = s, l.months = a, l.years = i, this
        }, Rn.clone = function() {
            return Te(this)
        }, Rn.get = function(e) {
            return e = D(e), this.isValid() ? this[e + "s"]() : NaN
        }, Rn.milliseconds = On, Rn.seconds = An, Rn.minutes = Nn, Rn.hours = Ln, Rn.days = In, Rn.weeks = function() {
            return S(this.days() / 7)
        }, Rn.months = Hn, Rn.years = Pn, Rn.humanize = function(e) {
            if (!this.isValid()) return this.localeData().invalidDate();
            var t, n, i, r, o, s, a, l, c, u, h, d = this.localeData(),
                f = (n = !e, i = d, r = Te(t = this).abs(), o = jn(r.as("s")), s = jn(r.as("m")), a = jn(r.as("h")), l = jn(r.as("d")), c = jn(r.as("M")), u = jn(r.as("y")), (h = o <= zn.ss && ["s", o] || o < zn.s && ["ss", o] || s <= 1 && ["m"] || s < zn.m && ["mm", s] || a <= 1 && ["h"] || a < zn.h && ["hh", a] || l <= 1 && ["d"] || l < zn.d && ["dd", l] || c <= 1 && ["M"] || c < zn.M && ["MM", c] || u <= 1 && ["y"] || ["yy", u])[2] = n, h[3] = 0 < +t, h[4] = i, function(e, t, n, i, r) {
                    return r.relativeTime(t || 1, !!n, e, i)
                }.apply(null, h));
            return e && (f = d.pastFuture(+this, f)), d.postformat(f)
        }, Rn.toISOString = Be, Rn.toString = Be, Rn.toJSON = Be, Rn.locale = Oe, Rn.localeData = Ae, Rn.toIsoString = e("toIsoString() is deprecated. Please use toISOString() instead (notice the capitals)", Be), Rn.lang = fn, i("X", 0, 0, "unix"), i("x", 0, 0, "valueOf"), L("x", yt), L("X", /[+-]?\d+(\.\d{1,3})?/), H("X", function(e, t, n) {
            n._d = new Date(1e3 * parseFloat(e, 10))
        }), H("x", function(e, t, n) {
            n._d = new Date(T(e))
        }), v.version = "2.20.1", Ge = pe, v.fn = xn, v.min = function() {
            return me("isBefore", [].slice.call(arguments, 0))
        }, v.max = function() {
            return me("isAfter", [].slice.call(arguments, 0))
        }, v.now = function() {
            return Date.now ? Date.now() : +new Date
        }, v.utc = p, v.unix = function(e) {
            return pe(1e3 * e)
        }, v.months = function(e, t) {
            return je(e, t, "months")
        }, v.isDate = h, v.locale = ie, v.invalid = g, v.duration = Te, v.isMoment = b, v.weekdays = function(e, t, n) {
            return ze(e, t, n, "weekdays")
        }, v.parseZone = function() {
            return pe.apply(null, arguments).parseZone()
        }, v.localeData = oe, v.isDuration = ye, v.monthsShort = function(e, t) {
            return je(e, t, "monthsShort")
        }, v.weekdaysMin = function(e, t, n) {
            return ze(e, t, n, "weekdaysMin")
        }, v.defineLocale = re, v.updateLocale = function(e, t) {
            if (null != t) {
                var n, i, r = Gt;
                null != (i = ne(e)) && (r = i._config), (n = new C(t = M(r, t))).parentLocale = Xt[e], Xt[e] = n, ie(e)
            } else null != Xt[e] && (null != Xt[e].parentLocale ? Xt[e] = Xt[e].parentLocale : null != Xt[e] && delete Xt[e]);
            return Xt[e]
        }, v.locales = function() {
            return $e(Xt)
        }, v.weekdaysShort = function(e, t, n) {
            return ze(e, t, n, "weekdaysShort")
        }, v.normalizeUnits = D, v.relativeTimeRounding = function(e) {
            return void 0 === e ? jn : "function" == typeof e && (jn = e, !0)
        }, v.relativeTimeThreshold = function(e, t) {
            return void 0 !== zn[e] && (void 0 === t ? zn[e] : (zn[e] = t, "s" === e && (zn.ss = t - 1), !0))
        }, v.calendarFormat = function(e, t) {
            var n = e.diff(t, "days", !0);
            return n < -6 ? "sameElse" : n < -1 ? "lastWeek" : n < 0 ? "lastDay" : n < 1 ? "sameDay" : n < 2 ? "nextDay" : n < 7 ? "nextWeek" : "sameElse"
        }, v.prototype = xn, v.HTML5_FMT = {
            DATETIME_LOCAL: "YYYY-MM-DDTHH:mm",
            DATETIME_LOCAL_SECONDS: "YYYY-MM-DDTHH:mm:ss",
            DATETIME_LOCAL_MS: "YYYY-MM-DDTHH:mm:ss.SSS",
            DATE: "YYYY-MM-DD",
            TIME: "HH:mm",
            TIME_SECONDS: "HH:mm:ss",
            TIME_MS: "HH:mm:ss.SSS",
            WEEK: "YYYY-[W]WW",
            MONTH: "YYYY-MM"
        }, v
    }),
    function(e, t) {
        "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.feather = t() : e.feather = t()
    }("undefined" != typeof self ? self : this, function() {
        return function(n) {
            var i = {};

            function r(e) {
                if (i[e]) return i[e].exports;
                var t = i[e] = {
                    i: e,
                    l: !1,
                    exports: {}
                };
                return n[e].call(t.exports, t, t.exports, r), t.l = !0, t.exports
            }
            return r.m = n, r.c = i, r.d = function(e, t, n) {
                r.o(e, t) || Object.defineProperty(e, t, {
                    configurable: !1,
                    enumerable: !0,
                    get: n
                })
            }, r.r = function(e) {
                Object.defineProperty(e, "__esModule", {
                    value: !0
                })
            }, r.n = function(e) {
                var t = e && e.__esModule ? function() {
                    return e.default
                } : function() {
                    return e
                };
                return r.d(t, "a", t), t
            }, r.o = function(e, t) {
                return Object.prototype.hasOwnProperty.call(e, t)
            }, r.p = "", r(r.s = 80)
        }([function(i, e, t) {
            (function(e) {
                var t = "object",
                    n = function(e) {
                        return e && e.Math == Math && e
                    };
                i.exports = n(typeof globalThis == t && globalThis) || n(typeof window == t && window) || n(typeof self == t && self) || n(typeof e == t && e) || Function("return this")()
            }).call(this, t(75))
        }, function(e, t) {
            var n = {}.hasOwnProperty;
            e.exports = function(e, t) {
                return n.call(e, t)
            }
        }, function(e, t, n) {
            var i = n(0),
                r = n(11),
                o = n(33),
                s = n(62),
                a = i.Symbol,
                l = r("wks");
            e.exports = function(e) {
                return l[e] || (l[e] = s && a[e] || (s ? a : o)("Symbol." + e))
            }
        }, function(e, t, n) {
            var i = n(6);
            e.exports = function(e) {
                if (!i(e)) throw TypeError(String(e) + " is not an object");
                return e
            }
        }, function(e, t) {
            e.exports = function(e) {
                try {
                    return !!e()
                } catch (e) {
                    return !0
                }
            }
        }, function(e, t, n) {
            var i = n(8),
                r = n(7),
                o = n(10);
            e.exports = i ? function(e, t, n) {
                return r.f(e, t, o(1, n))
            } : function(e, t, n) {
                return e[t] = n, e
            }
        }, function(e, t) {
            e.exports = function(e) {
                return "object" == typeof e ? null !== e : "function" == typeof e
            }
        }, function(e, t, n) {
            var i = n(8),
                r = n(35),
                o = n(3),
                s = n(18),
                a = Object.defineProperty;
            t.f = i ? a : function(e, t, n) {
                if (o(e), t = s(t, !0), o(n), r) try {
                    return a(e, t, n)
                } catch (e) {}
                if ("get" in n || "set" in n) throw TypeError("Accessors not supported");
                return "value" in n && (e[t] = n.value), e
            }
        }, function(e, t, n) {
            var i = n(4);
            e.exports = !i(function() {
                return 7 != Object.defineProperty({}, "a", {
                    get: function() {
                        return 7
                    }
                }).a
            })
        }, function(e, t) {
            e.exports = {}
        }, function(e, t) {
            e.exports = function(e, t) {
                return {
                    enumerable: !(1 & e),
                    configurable: !(2 & e),
                    writable: !(4 & e),
                    value: t
                }
            }
        }, function(e, t, n) {
            var i = n(0),
                r = n(19),
                o = n(17),
                s = i["__core-js_shared__"] || r("__core-js_shared__", {});
            (e.exports = function(e, t) {
                return s[e] || (s[e] = void 0 !== t ? t : {})
            })("versions", []).push({
                version: "3.1.3",
                mode: o ? "pure" : "global",
                copyright: "© 2019 Denis Pushkarev (zloirock.ru)"
            })
        }, function(e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var i = s(n(43)),
                r = s(n(41)),
                o = s(n(40));

            function s(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            t.default = Object.keys(r.default).map(function(e) {
                return new i.default(e, r.default[e], o.default[e])
            }).reduce(function(e, t) {
                return e[t.name] = t, e
            }, {})
        }, function(e, t) {
            e.exports = ["constructor", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "toLocaleString", "toString", "valueOf"]
        }, function(e, t, n) {
            var i = n(72),
                r = n(20);
            e.exports = function(e) {
                return i(r(e))
            }
        }, function(e, t) {
            e.exports = {}
        }, function(e, t, n) {
            var i = n(11),
                r = n(33),
                o = i("keys");
            e.exports = function(e) {
                return o[e] || (o[e] = r(e))
            }
        }, function(e, t) {
            e.exports = !1
        }, function(e, t, n) {
            var r = n(6);
            e.exports = function(e, t) {
                if (!r(e)) return e;
                var n, i;
                if (t && "function" == typeof(n = e.toString) && !r(i = n.call(e))) return i;
                if ("function" == typeof(n = e.valueOf) && !r(i = n.call(e))) return i;
                if (!t && "function" == typeof(n = e.toString) && !r(i = n.call(e))) return i;
                throw TypeError("Can't convert object to primitive value")
            }
        }, function(e, t, n) {
            var i = n(0),
                r = n(5);
            e.exports = function(t, n) {
                try {
                    r(i, t, n)
                } catch (e) {
                    i[t] = n
                }
                return n
            }
        }, function(e, t) {
            e.exports = function(e) {
                if (null == e) throw TypeError("Can't call method on " + e);
                return e
            }
        }, function(e, t) {
            var n = Math.ceil,
                i = Math.floor;
            e.exports = function(e) {
                return isNaN(e = +e) ? 0 : (0 < e ? i : n)(e)
            }
        }, function(t, n, e) {
            var i;
            ! function() {
                "use strict";
                var e = function() {
                    function s() {}

                    function a(e, t) {
                        for (var n = t.length, i = 0; i < n; ++i) r(e, t[i])
                    }
                    s.prototype = Object.create(null);
                    var i = {}.hasOwnProperty,
                        l = /\s+/;

                    function r(e, o) {
                        if (o) {
                            var t = typeof o;
                            "string" === t ? function(e, t) {
                                for (var n = o.split(l), i = n.length, r = 0; r < i; ++r) e[n[r]] = !0
                            }(e) : Array.isArray(o) ? a(e, o) : "object" === t ? function(e, t) {
                                for (var n in t) i.call(t, n) && (e[n] = !!t[n])
                            }(e, o) : "number" === t && (e[o] = !0)
                        }
                    }
                    return function() {
                        for (var e = arguments.length, t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                        var i = new s;
                        a(i, t);
                        var r = [];
                        for (var o in i) i[o] && r.push(o);
                        return r.join(" ")
                    }
                }();
                void 0 !== t && t.exports ? t.exports = e : void 0 === (i = function() {
                    return e
                }.apply(n, [])) || (t.exports = i)
            }()
        }, function(e, t, n) {
            var i = n(7).f,
                r = n(1),
                o = n(2)("toStringTag");
            e.exports = function(e, t, n) {
                e && !r(e = n ? e : e.prototype, o) && i(e, o, {
                    configurable: !0,
                    value: t
                })
            }
        }, function(e, t, n) {
            var i = n(20);
            e.exports = function(e) {
                return Object(i(e))
            }
        }, function(e, t, n) {
            var i = n(1),
                r = n(24),
                o = n(16),
                s = n(63),
                a = o("IE_PROTO"),
                l = Object.prototype;
            e.exports = s ? Object.getPrototypeOf : function(e) {
                return e = r(e), i(e, a) ? e[a] : "function" == typeof e.constructor && e instanceof e.constructor ? e.constructor.prototype : e instanceof Object ? l : null
            }
        }, function(e, t, n) {
            "use strict";
            var i, r, o, s = n(25),
                a = n(5),
                l = n(1),
                c = n(2),
                u = n(17),
                h = c("iterator"),
                d = !1;
            [].keys && ("next" in (o = [].keys()) ? (r = s(s(o))) !== Object.prototype && (i = r) : d = !0), null == i && (i = {}), u || l(i, h) || a(i, h, function() {
                return this
            }), e.exports = {
                IteratorPrototype: i,
                BUGGY_SAFARI_ITERATORS: d
            }
        }, function(e, t, n) {
            var i = n(21),
                r = Math.min;
            e.exports = function(e) {
                return 0 < e ? r(i(e), 9007199254740991) : 0
            }
        }, function(e, t, n) {
            var s = n(1),
                a = n(14),
                i = n(68),
                l = n(15),
                c = i(!1);
            e.exports = function(e, t) {
                var n, i = a(e),
                    r = 0,
                    o = [];
                for (n in i) !s(l, n) && s(i, n) && o.push(n);
                for (; t.length > r;) s(i, n = t[r++]) && (~c(o, n) || o.push(n));
                return o
            }
        }, function(e, t, n) {
            var a = n(0),
                i = n(11),
                l = n(5),
                c = n(1),
                u = n(19),
                r = n(36),
                o = n(37),
                s = o.get,
                h = o.enforce,
                d = String(r).split("toString");
            i("inspectSource", function(e) {
                return r.call(e)
            }), (e.exports = function(e, t, n, i) {
                var r = !!i && !!i.unsafe,
                    o = !!i && !!i.enumerable,
                    s = !!i && !!i.noTargetGet;
                "function" == typeof n && ("string" != typeof t || c(n, "name") || l(n, "name", t), h(n).source = d.join("string" == typeof t ? t : "")), e !== a ? (r ? !s && e[t] && (o = !0) : delete e[t], o ? e[t] = n : l(e, t, n)) : o ? e[t] = n : u(t, n)
            })(Function.prototype, "toString", function() {
                return "function" == typeof this && s(this).source || r.call(this)
            })
        }, function(e, t) {
            var n = {}.toString;
            e.exports = function(e) {
                return n.call(e).slice(8, -1)
            }
        }, function(e, t, n) {
            var i = n(8),
                r = n(73),
                o = n(10),
                s = n(14),
                a = n(18),
                l = n(1),
                c = n(35),
                u = Object.getOwnPropertyDescriptor;
            t.f = i ? u : function(e, t) {
                if (e = s(e), t = a(t, !0), c) try {
                    return u(e, t)
                } catch (e) {}
                if (l(e, t)) return o(!r.f.call(e, t), e[t])
            }
        }, function(e, t, n) {
            var u = n(0),
                h = n(31).f,
                d = n(5),
                f = n(29),
                p = n(19),
                m = n(71),
                g = n(65);
            e.exports = function(e, t) {
                var n, i, r, o, s, a = e.target,
                    l = e.global,
                    c = e.stat;
                if (n = l ? u : c ? u[a] || p(a, {}) : (u[a] || {}).prototype)
                    for (i in t) {
                        if (o = t[i], r = e.noTargetGet ? (s = h(n, i)) && s.value : n[i], !g(l ? i : a + (c ? "." : "#") + i, e.forced) && void 0 !== r) {
                            if (typeof o == typeof r) continue;
                            m(o, r)
                        }(e.sham || r && r.sham) && d(o, "sham", !0), f(n, i, o, e)
                    }
            }
        }, function(e, t) {
            var n = 0,
                i = Math.random();
            e.exports = function(e) {
                return "Symbol(".concat(void 0 === e ? "" : e, ")_", (++n + i).toString(36))
            }
        }, function(e, t, n) {
            var i = n(0),
                r = n(6),
                o = i.document,
                s = r(o) && r(o.createElement);
            e.exports = function(e) {
                return s ? o.createElement(e) : {}
            }
        }, function(e, t, n) {
            var i = n(8),
                r = n(4),
                o = n(34);
            e.exports = !i && !r(function() {
                return 7 != Object.defineProperty(o("div"), "a", {
                    get: function() {
                        return 7
                    }
                }).a
            })
        }, function(e, t, n) {
            var i = n(11);
            e.exports = i("native-function-to-string", Function.toString)
        }, function(e, t, n) {
            var i, r, o, s = n(76),
                a = n(0),
                l = n(6),
                c = n(5),
                u = n(1),
                h = n(16),
                d = n(15),
                f = a.WeakMap;
            if (s) {
                var p = new f,
                    m = p.get,
                    g = p.has,
                    y = p.set;
                i = function(e, t) {
                    return y.call(p, e, t), t
                }, r = function(e) {
                    return m.call(p, e) || {}
                }, o = function(e) {
                    return g.call(p, e)
                }
            } else {
                var v = h("state");
                d[v] = !0, i = function(e, t) {
                    return c(e, v, t), t
                }, r = function(e) {
                    return u(e, v) ? e[v] : {}
                }, o = function(e) {
                    return u(e, v)
                }
            }
            e.exports = {
                set: i,
                get: r,
                has: o,
                enforce: function(e) {
                    return o(e) ? r(e) : i(e, {})
                },
                getterFor: function(n) {
                    return function(e) {
                        var t;
                        if (!l(e) || (t = r(e)).type !== n) throw TypeError("Incompatible receiver, " + n + " required");
                        return t
                    }
                }
            }
        }, function(e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var a = Object.assign || function(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i])
                    }
                    return e
                },
                l = i(n(22)),
                c = i(n(12));

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            t.default = function() {
                var t = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : {};
                if ("undefined" == typeof document) throw new Error("`feather.replace()` only works in a browser environment.");
                var e = document.querySelectorAll("[data-feather]");
                Array.from(e).forEach(function(e) {
                    return function(e) {
                        var t, n = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {},
                            i = (t = e, Array.from(t.attributes).reduce(function(e, t) {
                                return e[t.name] = t.value, e
                            }, {})),
                            r = i["data-feather"];
                        delete i["data-feather"];
                        var o = c.default[r].toSvg(a({}, n, i, {
                                class: (0, l.default)(n.class, i.class)
                            })),
                            s = (new DOMParser).parseFromString(o, "image/svg+xml").querySelector("svg");
                        e.parentNode.replaceChild(s, e)
                    }(e, t)
                })
            }
        }, function(e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var i, r = (i = n(12)) && i.__esModule ? i : {
                default: i
            };
            t.default = function(e) {
                var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {};
                if (console.warn("feather.toSvg() is deprecated. Please use feather.icons[name].toSvg() instead."), !e) throw new Error("The required `key` (icon name) parameter is missing.");
                if (!r.default[e]) throw new Error("No icon matching '" + e + "'. See the complete list of icons at https://feathericons.com");
                return r.default[e].toSvg(t)
            }
        }, function(e) {
            e.exports = {
                activity: ["pulse", "health", "action", "motion"],
                airplay: ["stream", "cast", "mirroring"],
                "alert-circle": ["warning"],
                "alert-octagon": ["warning"],
                "alert-triangle": ["warning"],
                "at-sign": ["mention"],
                award: ["achievement", "badge"],
                aperture: ["camera", "photo"],
                bell: ["alarm", "notification"],
                "bell-off": ["alarm", "notification", "silent"],
                bluetooth: ["wireless"],
                "book-open": ["read"],
                book: ["read", "dictionary", "booklet", "magazine"],
                bookmark: ["read", "clip", "marker", "tag"],
                briefcase: ["work", "bag", "baggage", "folder"],
                clipboard: ["copy"],
                clock: ["time", "watch", "alarm"],
                "cloud-drizzle": ["weather", "shower"],
                "cloud-lightning": ["weather", "bolt"],
                "cloud-rain": ["weather"],
                "cloud-snow": ["weather", "blizzard"],
                cloud: ["weather"],
                codepen: ["logo"],
                codesandbox: ["logo"],
                coffee: ["drink", "cup", "mug", "tea", "cafe", "hot", "beverage"],
                command: ["keyboard", "cmd"],
                compass: ["navigation", "safari", "travel"],
                copy: ["clone", "duplicate"],
                "corner-down-left": ["arrow"],
                "corner-down-right": ["arrow"],
                "corner-left-down": ["arrow"],
                "corner-left-up": ["arrow"],
                "corner-right-down": ["arrow"],
                "corner-right-up": ["arrow"],
                "corner-up-left": ["arrow"],
                "corner-up-right": ["arrow"],
                "credit-card": ["purchase", "payment", "cc"],
                crop: ["photo", "image"],
                crosshair: ["aim", "target"],
                database: ["storage"],
                delete: ["remove"],
                disc: ["album", "cd", "dvd", "music"],
                "dollar-sign": ["currency", "money", "payment"],
                droplet: ["water"],
                edit: ["pencil", "change"],
                "edit-2": ["pencil", "change"],
                "edit-3": ["pencil", "change"],
                eye: ["view", "watch"],
                "eye-off": ["view", "watch"],
                "external-link": ["outbound"],
                facebook: ["logo"],
                "fast-forward": ["music"],
                figma: ["logo", "design", "tool"],
                film: ["movie", "video"],
                "folder-minus": ["directory"],
                "folder-plus": ["directory"],
                folder: ["directory"],
                framer: ["logo", "design", "tool"],
                frown: ["emoji", "face", "bad", "sad", "emotion"],
                gift: ["present", "box", "birthday", "party"],
                "git-branch": ["code", "version control"],
                "git-commit": ["code", "version control"],
                "git-merge": ["code", "version control"],
                "git-pull-request": ["code", "version control"],
                github: ["logo", "version control"],
                gitlab: ["logo", "version control"],
                global: ["world", "browser", "language", "translate"],
                "hard-drive": ["computer", "server"],
                hash: ["hashtag", "number", "pound"],
                headphones: ["music", "audio"],
                heart: ["like", "love"],
                "help-circle": ["question mark"],
                hexagon: ["shape", "node.js", "logo"],
                home: ["house"],
                image: ["picture"],
                inbox: ["email"],
                instagram: ["logo", "camera"],
                key: ["password", "login", "authentication"],
                "life-bouy": ["help", "life ring", "support"],
                linkedin: ["logo"],
                lock: ["security", "password"],
                "log-in": ["sign in", "arrow"],
                "log-out": ["sign out", "arrow"],
                mail: ["email"],
                "map-pin": ["location", "navigation", "travel", "marker"],
                map: ["location", "navigation", "travel"],
                maximize: ["fullscreen"],
                "maximize-2": ["fullscreen", "arrows"],
                meh: ["emoji", "face", "neutral", "emotion"],
                menu: ["bars", "navigation", "hamburger"],
                "message-circle": ["comment", "chat"],
                "message-square": ["comment", "chat"],
                "mic-off": ["record"],
                mic: ["record"],
                minimize: ["exit fullscreen"],
                "minimize-2": ["exit fullscreen", "arrows"],
                monitor: ["tv"],
                moon: ["dark", "night"],
                "more-horizontal": ["ellipsis"],
                "more-vertical": ["ellipsis"],
                "mouse-pointer": ["arrow", "cursor"],
                move: ["arrows"],
                navigation: ["location", "travel"],
                "navigation-2": ["location", "travel"],
                octagon: ["stop"],
                package: ["box"],
                paperclip: ["attachment"],
                pause: ["music", "stop"],
                "pause-circle": ["music", "stop"],
                "pen-tool": ["vector", "drawing"],
                play: ["music", "start"],
                "play-circle": ["music", "start"],
                plus: ["add", "new"],
                "plus-circle": ["add", "new"],
                "plus-square": ["add", "new"],
                pocket: ["logo", "save"],
                power: ["on", "off"],
                radio: ["signal"],
                rewind: ["music"],
                rss: ["feed", "subscribe"],
                save: ["floppy disk"],
                search: ["find", "magnifier", "magnifying glass"],
                send: ["message", "mail", "paper airplane"],
                settings: ["cog", "edit", "gear", "preferences"],
                shield: ["security"],
                "shield-off": ["security"],
                "shopping-bag": ["ecommerce", "cart", "purchase", "store"],
                "shopping-cart": ["ecommerce", "cart", "purchase", "store"],
                shuffle: ["music"],
                "skip-back": ["music"],
                "skip-forward": ["music"],
                slash: ["ban", "no"],
                sliders: ["settings", "controls"],
                smile: ["emoji", "face", "happy", "good", "emotion"],
                speaker: ["music"],
                star: ["bookmark", "favorite", "like"],
                sun: ["brightness", "weather", "light"],
                sunrise: ["weather"],
                sunset: ["weather"],
                tag: ["label"],
                target: ["bullseye"],
                terminal: ["code", "command line"],
                "thumbs-down": ["dislike", "bad"],
                "thumbs-up": ["like", "good"],
                "toggle-left": ["on", "off", "switch"],
                "toggle-right": ["on", "off", "switch"],
                trash: ["garbage", "delete", "remove"],
                "trash-2": ["garbage", "delete", "remove"],
                triangle: ["delta"],
                truck: ["delivery", "van", "shipping"],
                twitter: ["logo"],
                umbrella: ["rain", "weather"],
                "video-off": ["camera", "movie", "film"],
                video: ["camera", "movie", "film"],
                voicemail: ["phone"],
                volume: ["music", "sound", "mute"],
                "volume-1": ["music", "sound"],
                "volume-2": ["music", "sound"],
                "volume-x": ["music", "sound", "mute"],
                watch: ["clock", "time"],
                wind: ["weather", "air"],
                "x-circle": ["cancel", "close", "delete", "remove", "times"],
                "x-octagon": ["delete", "stop", "alert", "warning", "times"],
                "x-square": ["cancel", "close", "delete", "remove", "times"],
                x: ["cancel", "close", "delete", "remove", "times"],
                youtube: ["logo", "video", "play"],
                "zap-off": ["flash", "camera", "lightning"],
                zap: ["flash", "camera", "lightning"]
            }
        }, function(e) {
            e.exports = {
                activity: '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>',
                airplay: '<path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon>',
                "alert-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line>',
                "alert-octagon": '<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line>',
                "alert-triangle": '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line>',
                "align-center": '<line x1="18" y1="10" x2="6" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="18" y1="18" x2="6" y2="18"></line>',
                "align-justify": '<line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line>',
                "align-left": '<line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line>',
                "align-right": '<line x1="21" y1="10" x2="7" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="7" y2="18"></line>',
                anchor: '<circle cx="12" cy="5" r="3"></circle><line x1="12" y1="22" x2="12" y2="8"></line><path d="M5 12H2a10 10 0 0 0 20 0h-3"></path>',
                aperture: '<circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>',
                archive: '<polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line>',
                "arrow-down-circle": '<circle cx="12" cy="12" r="10"></circle><polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line>',
                "arrow-down-left": '<line x1="17" y1="7" x2="7" y2="17"></line><polyline points="17 17 7 17 7 7"></polyline>',
                "arrow-down-right": '<line x1="7" y1="7" x2="17" y2="17"></line><polyline points="17 7 17 17 7 17"></polyline>',
                "arrow-down": '<line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline>',
                "arrow-left-circle": '<circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line>',
                "arrow-left": '<line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline>',
                "arrow-right-circle": '<circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line>',
                "arrow-right": '<line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline>',
                "arrow-up-circle": '<circle cx="12" cy="12" r="10"></circle><polyline points="16 12 12 8 8 12"></polyline><line x1="12" y1="16" x2="12" y2="8"></line>',
                "arrow-up-left": '<line x1="17" y1="17" x2="7" y2="7"></line><polyline points="7 17 7 7 17 7"></polyline>',
                "arrow-up-right": '<line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline>',
                "arrow-up": '<line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline>',
                "at-sign": '<circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>',
                award: '<circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>',
                "bar-chart-2": '<line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line>',
                "bar-chart": '<line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line>',
                "battery-charging": '<path d="M5 18H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3.19M15 6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-3.19"></path><line x1="23" y1="13" x2="23" y2="11"></line><polyline points="11 6 7 12 13 12 9 18"></polyline>',
                battery: '<rect x="1" y="6" width="18" height="12" rx="2" ry="2"></rect><line x1="23" y1="13" x2="23" y2="11"></line>',
                "bell-off": '<path d="M13.73 21a2 2 0 0 1-3.46 0"></path><path d="M18.63 13A17.89 17.89 0 0 1 18 8"></path><path d="M6.26 6.26A5.86 5.86 0 0 0 6 8c0 7-3 9-3 9h14"></path><path d="M18 8a6 6 0 0 0-9.33-5"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                bell: '<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path>',
                bluetooth: '<polyline points="6.5 6.5 17.5 17.5 12 23 12 1 17.5 6.5 6.5 17.5"></polyline>',
                bold: '<path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path><path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path>',
                "book-open": '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>',
                book: '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>',
                bookmark: '<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>',
                box: '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>',
                briefcase: '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>',
                calendar: '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>',
                "camera-off": '<line x1="1" y1="1" x2="23" y2="23"></line><path d="M21 21H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3m3-3h6l2 3h4a2 2 0 0 1 2 2v9.34m-7.72-2.06a4 4 0 1 1-5.56-5.56"></path>',
                camera: '<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle>',
                cast: '<path d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"></path><line x1="2" y1="20" x2="2" y2="20"></line>',
                "check-circle": '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline>',
                "check-square": '<polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>',
                check: '<polyline points="20 6 9 17 4 12"></polyline>',
                "chevron-down": '<polyline points="6 9 12 15 18 9"></polyline>',
                "chevron-left": '<polyline points="15 18 9 12 15 6"></polyline>',
                "chevron-right": '<polyline points="9 18 15 12 9 6"></polyline>',
                "chevron-up": '<polyline points="18 15 12 9 6 15"></polyline>',
                "chevrons-down": '<polyline points="7 13 12 18 17 13"></polyline><polyline points="7 6 12 11 17 6"></polyline>',
                "chevrons-left": '<polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline>',
                "chevrons-right": '<polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline>',
                "chevrons-up": '<polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline>',
                chrome: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>',
                circle: '<circle cx="12" cy="12" r="10"></circle>',
                clipboard: '<path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>',
                clock: '<circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>',
                "cloud-drizzle": '<line x1="8" y1="19" x2="8" y2="21"></line><line x1="8" y1="13" x2="8" y2="15"></line><line x1="16" y1="19" x2="16" y2="21"></line><line x1="16" y1="13" x2="16" y2="15"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="12" y1="15" x2="12" y2="17"></line><path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25"></path>',
                "cloud-lightning": '<path d="M19 16.9A5 5 0 0 0 18 7h-1.26a8 8 0 1 0-11.62 9"></path><polyline points="13 11 9 17 15 17 11 23"></polyline>',
                "cloud-off": '<path d="M22.61 16.95A5 5 0 0 0 18 10h-1.26a8 8 0 0 0-7.05-6M5 5a8 8 0 0 0 4 15h9a5 5 0 0 0 1.7-.3"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                "cloud-rain": '<line x1="16" y1="13" x2="16" y2="21"></line><line x1="8" y1="13" x2="8" y2="21"></line><line x1="12" y1="15" x2="12" y2="23"></line><path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25"></path>',
                "cloud-snow": '<path d="M20 17.58A5 5 0 0 0 18 8h-1.26A8 8 0 1 0 4 16.25"></path><line x1="8" y1="16" x2="8" y2="16"></line><line x1="8" y1="20" x2="8" y2="20"></line><line x1="12" y1="18" x2="12" y2="18"></line><line x1="12" y1="22" x2="12" y2="22"></line><line x1="16" y1="16" x2="16" y2="16"></line><line x1="16" y1="20" x2="16" y2="20"></line>',
                cloud: '<path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>',
                code: '<polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline>',
                codepen: '<polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"></polygon><line x1="12" y1="22" x2="12" y2="15.5"></line><polyline points="22 8.5 12 15.5 2 8.5"></polyline><polyline points="2 15.5 12 8.5 22 15.5"></polyline><line x1="12" y1="2" x2="12" y2="8.5"></line>',
                codesandbox: '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline><polyline points="7.5 19.79 7.5 14.6 3 12"></polyline><polyline points="21 12 16.5 14.6 16.5 19.79"></polyline><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>',
                coffee: '<path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line>',
                columns: '<path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path>',
                command: '<path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>',
                compass: '<circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>',
                copy: '<rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>',
                "corner-down-left": '<polyline points="9 10 4 15 9 20"></polyline><path d="M20 4v7a4 4 0 0 1-4 4H4"></path>',
                "corner-down-right": '<polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path>',
                "corner-left-down": '<polyline points="14 15 9 20 4 15"></polyline><path d="M20 4h-7a4 4 0 0 0-4 4v12"></path>',
                "corner-left-up": '<polyline points="14 9 9 4 4 9"></polyline><path d="M20 20h-7a4 4 0 0 1-4-4V4"></path>',
                "corner-right-down": '<polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>',
                "corner-right-up": '<polyline points="10 9 15 4 20 9"></polyline><path d="M4 20h7a4 4 0 0 0 4-4V4"></path>',
                "corner-up-left": '<polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>',
                "corner-up-right": '<polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path>',
                cpu: '<rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line>',
                "credit-card": '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line>',
                crop: '<path d="M6.13 1L6 16a2 2 0 0 0 2 2h15"></path><path d="M1 6.13L16 6a2 2 0 0 1 2 2v15"></path>',
                crosshair: '<circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line>',
                database: '<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>',
                delete: '<path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line>',
                disc: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle>',
                "dollar-sign": '<line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>',
                "download-cloud": '<polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>',
                download: '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line>',
                droplet: '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>',
                "edit-2": '<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>',
                "edit-3": '<path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>',
                edit: '<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>',
                "external-link": '<path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line>',
                "eye-off": '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                eye: '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>',
                facebook: '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>',
                "fast-forward": '<polygon points="13 19 22 12 13 5 13 19"></polygon><polygon points="2 19 11 12 2 5 2 19"></polygon>',
                feather: '<path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line>',
                figma: '<path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path><path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"></path>',
                "file-minus": '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="9" y1="15" x2="15" y2="15"></line>',
                "file-plus": '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line>',
                "file-text": '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>',
                file: '<path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline>',
                film: '<rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line>',
                filter: '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>',
                flag: '<path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line>',
                "folder-minus": '<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="9" y1="14" x2="15" y2="14"></line>',
                "folder-plus": '<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line>',
                folder: '<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>',
                framer: '<path d="M5 16V9h14V2H5l14 14h-7m-7 0l7 7v-7m-7 0h7"></path>',
                frown: '<circle cx="12" cy="12" r="10"></circle><path d="M16 16s-1.5-2-4-2-4 2-4 2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line>',
                gift: '<polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>',
                "git-branch": '<line x1="6" y1="3" x2="6" y2="15"></line><circle cx="18" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><path d="M18 9a9 9 0 0 1-9 9"></path>',
                "git-commit": '<circle cx="12" cy="12" r="4"></circle><line x1="1.05" y1="12" x2="7" y2="12"></line><line x1="17.01" y1="12" x2="22.96" y2="12"></line>',
                "git-merge": '<circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M6 21V9a9 9 0 0 0 9 9"></path>',
                "git-pull-request": '<circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><line x1="6" y1="9" x2="6" y2="21"></line>',
                github: '<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>',
                gitlab: '<path d="M22.65 14.39L12 22.13 1.35 14.39a.84.84 0 0 1-.3-.94l1.22-3.78 2.44-7.51A.42.42 0 0 1 4.82 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.49h8.1l2.44-7.51A.42.42 0 0 1 18.6 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.51L23 13.45a.84.84 0 0 1-.35.94z"></path>',
                globe: '<circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>',
                grid: '<rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>',
                "hard-drive": '<line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6" y2="16"></line><line x1="10" y1="16" x2="10" y2="16"></line>',
                hash: '<line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line>',
                headphones: '<path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>',
                heart: '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>',
                "help-circle": '<circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12" y2="17"></line>',
                hexagon: '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>',
                home: '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>',
                image: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline>',
                inbox: '<polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>',
                info: '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line>',
                instagram: '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line>',
                italic: '<line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line>',
                key: '<path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>',
                layers: '<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline>',
                layout: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line>',
                "life-buoy": '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line>',
                "link-2": '<path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line>',
                link: '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>',
                linkedin: '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle>',
                list: '<line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line>',
                loader: '<line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>',
                lock: '<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path>',
                "log-in": '<path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line>',
                "log-out": '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line>',
                mail: '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline>',
                "map-pin": '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle>',
                map: '<polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line>',
                "maximize-2": '<polyline points="15 3 21 3 21 9"></polyline><polyline points="9 21 3 21 3 15"></polyline><line x1="21" y1="3" x2="14" y2="10"></line><line x1="3" y1="21" x2="10" y2="14"></line>',
                maximize: '<path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>',
                meh: '<circle cx="12" cy="12" r="10"></circle><line x1="8" y1="15" x2="16" y2="15"></line><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line>',
                menu: '<line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line>',
                "message-circle": '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>',
                "message-square": '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>',
                "mic-off": '<line x1="1" y1="1" x2="23" y2="23"></line><path d="M9 9v3a3 3 0 0 0 5.12 2.12M15 9.34V4a3 3 0 0 0-5.94-.6"></path><path d="M17 16.95A7 7 0 0 1 5 12v-2m14 0v2a7 7 0 0 1-.11 1.23"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line>',
                mic: '<path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path><path d="M19 10v2a7 7 0 0 1-14 0v-2"></path><line x1="12" y1="19" x2="12" y2="23"></line><line x1="8" y1="23" x2="16" y2="23"></line>',
                "minimize-2": '<polyline points="4 14 10 14 10 20"></polyline><polyline points="20 10 14 10 14 4"></polyline><line x1="14" y1="10" x2="21" y2="3"></line><line x1="3" y1="21" x2="10" y2="14"></line>',
                minimize: '<path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path>',
                "minus-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line>',
                "minus-square": '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="8" y1="12" x2="16" y2="12"></line>',
                minus: '<line x1="5" y1="12" x2="19" y2="12"></line>',
                monitor: '<rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line>',
                moon: '<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>',
                "more-horizontal": '<circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle>',
                "more-vertical": '<circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle>',
                "mouse-pointer": '<path d="M3 3l7.07 16.97 2.51-7.39 7.39-2.51L3 3z"></path><path d="M13 13l6 6"></path>',
                move: '<polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line>',
                music: '<path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle>',
                "navigation-2": '<polygon points="12 2 19 21 12 17 5 21 12 2"></polygon>',
                navigation: '<polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>',
                octagon: '<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>',
                package: '<line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>',
                paperclip: '<path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>',
                "pause-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="10" y1="15" x2="10" y2="9"></line><line x1="14" y1="15" x2="14" y2="9"></line>',
                pause: '<rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect>',
                "pen-tool": '<path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle>',
                percent: '<line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle>',
                "phone-call": '<path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-forwarded": '<polyline points="19 1 23 5 19 9"></polyline><line x1="15" y1="5" x2="23" y2="5"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-incoming": '<polyline points="16 2 16 8 22 8"></polyline><line x1="23" y1="1" x2="16" y2="8"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-missed": '<line x1="23" y1="1" x2="17" y2="7"></line><line x1="17" y1="1" x2="23" y2="7"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "phone-off": '<path d="M10.68 13.31a16 16 0 0 0 3.41 2.6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.42 19.42 0 0 1-3.33-2.67m-2.67-3.34a19.79 19.79 0 0 1-3.07-8.63A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91"></path><line x1="23" y1="1" x2="1" y2="23"></line>',
                "phone-outgoing": '<polyline points="23 7 23 1 17 1"></polyline><line x1="16" y1="8" x2="23" y2="1"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                phone: '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
                "pie-chart": '<path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>',
                "play-circle": '<circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon>',
                play: '<polygon points="5 3 19 12 5 21 5 3"></polygon>',
                "plus-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line>',
                "plus-square": '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line>',
                plus: '<line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line>',
                pocket: '<path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"></path><polyline points="8 10 12 14 16 10"></polyline>',
                power: '<path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line>',
                printer: '<polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect>',
                radio: '<circle cx="12" cy="12" r="2"></circle><path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path>',
                "refresh-ccw": '<polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>',
                "refresh-cw": '<polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>',
                repeat: '<polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path>',
                rewind: '<polygon points="11 19 2 12 11 5 11 19"></polygon><polygon points="22 19 13 12 22 5 22 19"></polygon>',
                "rotate-ccw": '<polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>',
                "rotate-cw": '<polyline points="23 4 23 10 17 10"></polyline><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>',
                rss: '<path d="M4 11a9 9 0 0 1 9 9"></path><path d="M4 4a16 16 0 0 1 16 16"></path><circle cx="5" cy="19" r="1"></circle>',
                save: '<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline>',
                scissors: '<circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line>',
                search: '<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>',
                send: '<line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>',
                server: '<rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line>',
                settings: '<circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>',
                "share-2": '<circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>',
                share: '<path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line>',
                "shield-off": '<path d="M19.69 14a6.9 6.9 0 0 0 .31-2V5l-8-3-3.16 1.18"></path><path d="M4.73 4.73L4 5v7c0 6 8 10 8 10a20.29 20.29 0 0 0 5.62-4.38"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                shield: '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>',
                "shopping-bag": '<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path>',
                "shopping-cart": '<circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>',
                shuffle: '<polyline points="16 3 21 3 21 8"></polyline><line x1="4" y1="20" x2="21" y2="3"></line><polyline points="21 16 21 21 16 21"></polyline><line x1="15" y1="15" x2="21" y2="21"></line><line x1="4" y1="4" x2="9" y2="9"></line>',
                sidebar: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line>',
                "skip-back": '<polygon points="19 20 9 12 19 4 19 20"></polygon><line x1="5" y1="19" x2="5" y2="5"></line>',
                "skip-forward": '<polygon points="5 4 15 12 5 20 5 4"></polygon><line x1="19" y1="5" x2="19" y2="19"></line>',
                slack: '<path d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"></path><path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"></path><path d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"></path><path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"></path><path d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"></path><path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"></path><path d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"></path><path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"></path>',
                slash: '<circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>',
                sliders: '<line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line>',
                smartphone: '<rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12" y2="18"></line>',
                smile: '<circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line>',
                speaker: '<rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><circle cx="12" cy="14" r="4"></circle><line x1="12" y1="6" x2="12" y2="6"></line>',
                square: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>',
                star: '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>',
                "stop-circle": '<circle cx="12" cy="12" r="10"></circle><rect x="9" y="9" width="6" height="6"></rect>',
                sun: '<circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>',
                sunrise: '<path d="M17 18a5 5 0 0 0-10 0"></path><line x1="12" y1="2" x2="12" y2="9"></line><line x1="4.22" y1="10.22" x2="5.64" y2="11.64"></line><line x1="1" y1="18" x2="3" y2="18"></line><line x1="21" y1="18" x2="23" y2="18"></line><line x1="18.36" y1="11.64" x2="19.78" y2="10.22"></line><line x1="23" y1="22" x2="1" y2="22"></line><polyline points="8 6 12 2 16 6"></polyline>',
                sunset: '<path d="M17 18a5 5 0 0 0-10 0"></path><line x1="12" y1="9" x2="12" y2="2"></line><line x1="4.22" y1="10.22" x2="5.64" y2="11.64"></line><line x1="1" y1="18" x2="3" y2="18"></line><line x1="21" y1="18" x2="23" y2="18"></line><line x1="18.36" y1="11.64" x2="19.78" y2="10.22"></line><line x1="23" y1="22" x2="1" y2="22"></line><polyline points="16 5 12 9 8 5"></polyline>',
                tablet: '<rect x="4" y="2" width="16" height="20" rx="2" ry="2" transform="rotate(180 12 12)"></rect><line x1="12" y1="18" x2="12" y2="18"></line>',
                tag: '<path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line>',
                target: '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>',
                terminal: '<polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line>',
                thermometer: '<path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"></path>',
                "thumbs-down": '<path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path>',
                "thumbs-up": '<path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>',
                "toggle-left": '<rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="8" cy="12" r="3"></circle>',
                "toggle-right": '<rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect><circle cx="16" cy="12" r="3"></circle>',
                "trash-2": '<polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>',
                trash: '<polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>',
                trello: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect>',
                "trending-down": '<polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline>',
                "trending-up": '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline>',
                triangle: '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>',
                truck: '<rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle>',
                tv: '<rect x="2" y="7" width="20" height="15" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline>',
                twitter: '<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>',
                type: '<polyline points="4 7 4 4 20 4 20 7"></polyline><line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line>',
                umbrella: '<path d="M23 12a11.05 11.05 0 0 0-22 0zm-5 7a3 3 0 0 1-6 0v-7"></path>',
                underline: '<path d="M6 3v7a6 6 0 0 0 6 6 6 6 0 0 0 6-6V3"></path><line x1="4" y1="21" x2="20" y2="21"></line>',
                unlock: '<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 9.9-1"></path>',
                "upload-cloud": '<polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline>',
                upload: '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line>',
                "user-check": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>',
                "user-minus": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line>',
                "user-plus": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line>',
                "user-x": '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line>',
                user: '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>',
                users: '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
                "video-off": '<path d="M16 16v1a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2m5.66 0H14a2 2 0 0 1 2 2v3.34l1 1L23 7v10"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
                video: '<polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>',
                voicemail: '<circle cx="5.5" cy="11.5" r="4.5"></circle><circle cx="18.5" cy="11.5" r="4.5"></circle><line x1="5.5" y1="16" x2="18.5" y2="16"></line>',
                "volume-1": '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>',
                "volume-2": '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>',
                "volume-x": '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line>',
                volume: '<polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>',
                watch: '<circle cx="12" cy="12" r="7"></circle><polyline points="12 9 12 12 13.5 13.5"></polyline><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"></path>',
                "wifi-off": '<line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12" y2="20"></line>',
                wifi: '<path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12" y2="20"></line>',
                wind: '<path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"></path>',
                "x-circle": '<circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>',
                "x-octagon": '<polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>',
                "x-square": '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line>',
                x: '<line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>',
                youtube: '<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>',
                "zap-off": '<polyline points="12.41 6.75 13 2 10.57 4.92"></polyline><polyline points="18.57 12.91 21 10 15.66 10"></polyline><polyline points="8 8 3 14 12 14 11 22 16 16"></polyline><line x1="1" y1="1" x2="23" y2="23"></line>',
                zap: '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>',
                "zoom-in": '<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line>',
                "zoom-out": '<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="8" y1="11" x2="14" y2="11"></line>'
            }
        }, function(e) {
            e.exports = {
                xmlns: "http://www.w3.org/2000/svg",
                width: 24,
                height: 24,
                viewBox: "0 0 24 24",
                fill: "none",
                stroke: "currentColor",
                "stroke-width": 2,
                "stroke-linecap": "round",
                "stroke-linejoin": "round"
            }
        }, function(e, t, n) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            var r = Object.assign || function(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (e[i] = n[i])
                    }
                    return e
                },
                o = function() {
                    function i(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var i = t[n];
                            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
                        }
                    }
                    return function(e, t, n) {
                        return t && i(e.prototype, t), n && i(e, n), e
                    }
                }(),
                s = i(n(22)),
                a = i(n(42));

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            var l = function() {
                function i(e, t) {
                    var n = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : [];
                    ! function(e, t) {
                        if (!(e instanceof i)) throw new TypeError("Cannot call a class as a function")
                    }(this), this.name = e, this.contents = t, this.tags = n, this.attrs = r({}, a.default, {
                        class: "feather feather-" + e
                    })
                }
                return o(i, [{
                    key: "toSvg",
                    value: function() {
                        var t, e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : {};
                        return "<svg " + (t = r({}, this.attrs, e, {
                            class: (0, s.default)(this.attrs.class, e.class)
                        }), Object.keys(t).map(function(e) {
                            return e + '="' + t[e] + '"'
                        }).join(" ")) + ">" + this.contents + "</svg>"
                    }
                }, {
                    key: "toString",
                    value: function() {
                        return this.contents
                    }
                }]), i
            }();
            t.default = l
        }, function(e, t, n) {
            "use strict";
            var i = s(n(12)),
                r = s(n(39)),
                o = s(n(38));

            function s(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            e.exports = {
                icons: i.default,
                toSvg: r.default,
                replace: o.default
            }
        }, function(e, t, n) {
            e.exports = n(0)
        }, function(e, t, n) {
            var r = n(2)("iterator"),
                o = !1;
            try {
                var i = 0,
                    s = {
                        next: function() {
                            return {
                                done: !!i++
                            }
                        },
                        return: function() {
                            o = !0
                        }
                    };
                s[r] = function() {
                    return this
                }, Array.from(s, function() {
                    throw 2
                })
            } catch (e) {}
            e.exports = function(e, t) {
                if (!t && !o) return !1;
                var n = !1;
                try {
                    var i = {};
                    i[r] = function() {
                        return {
                            next: function() {
                                return {
                                    done: n = !0
                                }
                            }
                        }
                    }, e(i)
                } catch (e) {}
                return n
            }
        }, function(e, t, n) {
            var r = n(30),
                o = n(2)("toStringTag"),
                s = "Arguments" == r(function() {
                    return arguments
                }());
            e.exports = function(e) {
                var t, n, i;
                return void 0 === e ? "Undefined" : null === e ? "Null" : "string" == typeof(n = function(e, t) {
                    try {
                        return e[t]
                    } catch (e) {}
                }(t = Object(e), o)) ? n : s ? r(t) : "Object" == (i = r(t)) && "function" == typeof t.callee ? "Arguments" : i
            }
        }, function(e, t, n) {
            var i = n(47),
                r = n(9),
                o = n(2)("iterator");
            e.exports = function(e) {
                if (null != e) return e[o] || e["@@iterator"] || r[i(e)]
            }
        }, function(e, t, n) {
            "use strict";
            var r = n(18),
                o = n(7),
                s = n(10);
            e.exports = function(e, t, n) {
                var i = r(t);
                i in e ? o.f(e, i, s(0, n)) : e[i] = n
            }
        }, function(e, t, n) {
            var i = n(2),
                r = n(9),
                o = i("iterator"),
                s = Array.prototype;
            e.exports = function(e) {
                return void 0 !== e && (r.Array === e || s[o] === e)
            }
        }, function(e, t, n) {
            var o = n(3);
            e.exports = function(e, t, n, i) {
                try {
                    return i ? t(o(n)[0], n[1]) : t(n)
                } catch (t) {
                    var r = e.return;
                    throw void 0 !== r && o(r.call(e)), t
                }
            }
        }, function(e, t) {
            e.exports = function(e) {
                if ("function" != typeof e) throw TypeError(String(e) + " is not a function");
                return e
            }
        }, function(e, t, n) {
            var o = n(52);
            e.exports = function(i, r, e) {
                if (o(i), void 0 === r) return i;
                switch (e) {
                    case 0:
                        return function() {
                            return i.call(r)
                        };
                    case 1:
                        return function(e) {
                            return i.call(r, e)
                        };
                    case 2:
                        return function(e, t) {
                            return i.call(r, e, t)
                        };
                    case 3:
                        return function(e, t, n) {
                            return i.call(r, e, t, n)
                        }
                }
                return function() {
                    return i.apply(r, arguments)
                }
            }
        }, function(e, t, n) {
            "use strict";
            var d = n(53),
                f = n(24),
                p = n(51),
                m = n(50),
                g = n(27),
                y = n(49),
                v = n(48);
            e.exports = function(e) {
                var t, n, i, r, o = f(e),
                    s = "function" == typeof this ? this : Array,
                    a = arguments.length,
                    l = 1 < a ? arguments[1] : void 0,
                    c = void 0 !== l,
                    u = 0,
                    h = v(o);
                if (c && (l = d(l, 2 < a ? arguments[2] : void 0, 2)), null == h || s == Array && m(h))
                    for (n = new s(t = g(o.length)); u < t; u++) y(n, u, c ? l(o[u], u) : o[u]);
                else
                    for (r = h.call(o), n = new s; !(i = r.next()).done; u++) y(n, u, c ? p(r, l, [i.value, u], !0) : i.value);
                return n.length = u, n
            }
        }, function(e, t, n) {
            var i = n(32),
                r = n(54);
            i({
                target: "Array",
                stat: !0,
                forced: !n(46)(function(e) {
                    Array.from(e)
                })
            }, {
                from: r
            })
        }, function(e, t, n) {
            var i = n(6),
                r = n(3);
            e.exports = function(e, t) {
                if (r(e), !i(t) && null !== t) throw TypeError("Can't set " + String(t) + " as a prototype")
            }
        }, function(e, t, n) {
            var r = n(56);
            e.exports = Object.setPrototypeOf || ("__proto__" in {} ? function() {
                var n, i = !1,
                    e = {};
                try {
                    (n = Object.getOwnPropertyDescriptor(Object.prototype, "__proto__").set).call(e, []), i = e instanceof Array
                } catch (n) {}
                return function(e, t) {
                    return r(e, t), i ? n.call(e, t) : e.__proto__ = t, e
                }
            }() : void 0)
        }, function(e, t, n) {
            var i = n(0).document;
            e.exports = i && i.documentElement
        }, function(e, t, n) {
            var i = n(28),
                r = n(13);
            e.exports = Object.keys || function(e) {
                return i(e, r)
            }
        }, function(e, t, n) {
            var i = n(8),
                s = n(7),
                a = n(3),
                l = n(59);
            e.exports = i ? Object.defineProperties : function(e, t) {
                a(e);
                for (var n, i = l(t), r = i.length, o = 0; o < r;) s.f(e, n = i[o++], t[n]);
                return e
            }
        }, function(e, t, n) {
            var i = n(3),
                r = n(60),
                o = n(13),
                s = n(15),
                a = n(58),
                l = n(34),
                c = n(16)("IE_PROTO"),
                u = function() {},
                h = function() {
                    var e, t = l("iframe"),
                        n = o.length;
                    for (t.style.display = "none", a.appendChild(t), t.src = String("javascript:"), (e = t.contentWindow.document).open(), e.write("<script>document.F=Object<\/script>"), e.close(), h = e.F; n--;) delete h.prototype[o[n]];
                    return h()
                };
            e.exports = Object.create || function(e, t) {
                var n;
                return null !== e ? (u.prototype = i(e), n = new u, u.prototype = null, n[c] = e) : n = h(), void 0 === t ? n : r(n, t)
            }, s[c] = !0
        }, function(e, t, n) {
            var i = n(4);
            e.exports = !!Object.getOwnPropertySymbols && !i(function() {
                return !String(Symbol())
            })
        }, function(e, t, n) {
            var i = n(4);
            e.exports = !i(function() {
                function e() {}
                return e.prototype.constructor = null, Object.getPrototypeOf(new e) !== e.prototype
            })
        }, function(e, t, n) {
            "use strict";
            var r = n(26).IteratorPrototype,
                o = n(61),
                s = n(10),
                a = n(23),
                l = n(9),
                c = function() {
                    return this
                };
            e.exports = function(e, t, n) {
                var i = t + " Iterator";
                return e.prototype = o(r, {
                    next: s(1, n)
                }), a(e, i, !1, !0), l[i] = c, e
            }
        }, function(e, t, n) {
            var i = n(4),
                r = /#|\.prototype\./,
                o = function(e, t) {
                    var n = a[s(e)];
                    return n == c || n != l && ("function" == typeof t ? i(t) : !!t)
                },
                s = o.normalize = function(e) {
                    return String(e).replace(r, ".").toLowerCase()
                },
                a = o.data = {},
                l = o.NATIVE = "N",
                c = o.POLYFILL = "P";
            e.exports = o
        }, function(e, t) {
            t.f = Object.getOwnPropertySymbols
        }, function(e, t, n) {
            var i = n(21),
                r = Math.max,
                o = Math.min;
            e.exports = function(e, t) {
                var n = i(e);
                return n < 0 ? r(n + t, 0) : o(n, t)
            }
        }, function(e, t, n) {
            var l = n(14),
                c = n(27),
                u = n(67);
            e.exports = function(a) {
                return function(e, t, n) {
                    var i, r = l(e),
                        o = c(r.length),
                        s = u(n, o);
                    if (a && t != t) {
                        for (; s < o;)
                            if ((i = r[s++]) != i) return !0
                    } else
                        for (; s < o; s++)
                            if ((a || s in r) && r[s] === t) return a || s || 0; return !a && -1
                }
            }
        }, function(e, t, n) {
            var i = n(28),
                r = n(13).concat("length", "prototype");
            t.f = Object.getOwnPropertyNames || function(e) {
                return i(e, r)
            }
        }, function(e, t, n) {
            var i = n(0),
                r = n(69),
                o = n(66),
                s = n(3),
                a = i.Reflect;
            e.exports = a && a.ownKeys || function(e) {
                var t = r.f(s(e)),
                    n = o.f;
                return n ? t.concat(n(e)) : t
            }
        }, function(e, t, n) {
            var a = n(1),
                l = n(70),
                c = n(31),
                u = n(7);
            e.exports = function(e, t) {
                for (var n = l(t), i = u.f, r = c.f, o = 0; o < n.length; o++) {
                    var s = n[o];
                    a(e, s) || i(e, s, r(t, s))
                }
            }
        }, function(e, t, n) {
            var i = n(4),
                r = n(30),
                o = "".split;
            e.exports = i(function() {
                return !Object("z").propertyIsEnumerable(0)
            }) ? function(e) {
                return "String" == r(e) ? o.call(e, "") : Object(e)
            } : Object
        }, function(e, t, n) {
            "use strict";
            var i = {}.propertyIsEnumerable,
                r = Object.getOwnPropertyDescriptor,
                o = r && !i.call({
                    1: 2
                }, 1);
            t.f = o ? function(e) {
                var t = r(this, e);
                return !!t && t.enumerable
            } : i
        }, function(e, t, n) {
            "use strict";
            var y = n(32),
                v = n(64),
                x = n(25),
                w = n(57),
                _ = n(23),
                b = n(5),
                S = n(29),
                i = n(2),
                T = n(17),
                E = n(9),
                r = n(26),
                k = r.IteratorPrototype,
                M = r.BUGGY_SAFARI_ITERATORS,
                C = i("iterator"),
                D = function() {
                    return this
                };
            e.exports = function(e, t, n, i, r, o, s) {
                v(n, t, i);
                var a, l, c, u = function(e) {
                        if (e === r && m) return m;
                        if (!M && e in f) return f[e];
                        switch (e) {
                            case "keys":
                            case "values":
                            case "entries":
                                return function() {
                                    return new n(this, e)
                                }
                        }
                        return function() {
                            return new n(this)
                        }
                    },
                    h = t + " Iterator",
                    d = !1,
                    f = e.prototype,
                    p = f[C] || f["@@iterator"] || r && f[r],
                    m = !M && p || u(r),
                    g = "Array" == t && f.entries || p;
                if (g && (a = x(g.call(new e)), k !== Object.prototype && a.next && (T || x(a) === k || (w ? w(a, k) : "function" != typeof a[C] && b(a, C, D)), _(a, h, !0, !0), T && (E[h] = D))), "values" == r && p && "values" !== p.name && (d = !0, m = function() {
                    return p.call(this)
                }), T && !s || f[C] === m || b(f, C, m), E[t] = m, r)
                    if (l = {
                        values: u("values"),
                        keys: o ? m : u("keys"),
                        entries: u("entries")
                    }, s)
                        for (c in l) !M && !d && c in f || S(f, c, l[c]);
                    else y({
                        target: t,
                        proto: !0,
                        forced: M || d
                    }, l);
                return l
            }
        }, function(tIa, uIa) {
            var vIa;
            vIa = function() {
                return this
            }();
            try {
                vIa = vIa || Function("return this")() || eval("this")
            } catch (tIa) {
                "object" == typeof window && (vIa = window)
            }
            tIa.exports = vIa
        }, function(e, t, n) {
            var i = n(0),
                r = n(36),
                o = i.WeakMap;
            e.exports = "function" == typeof o && /native code/.test(r.call(o))
        }, function(e, t, n) {
            var l = n(21),
                c = n(20);
            e.exports = function(e, t, n) {
                var i, r, o = String(c(e)),
                    s = l(t),
                    a = o.length;
                return s < 0 || a <= s ? n ? "" : void 0 : (i = o.charCodeAt(s)) < 55296 || 56319 < i || s + 1 === a || (r = o.charCodeAt(s + 1)) < 56320 || 57343 < r ? n ? o.charAt(s) : i : n ? o.slice(s, s + 2) : r - 56320 + (i - 55296 << 10) + 65536
            }
        }, function(e, t, n) {
            "use strict";
            var r = n(77),
                i = n(37),
                o = n(74),
                s = i.set,
                a = i.getterFor("String Iterator");
            o(String, "String", function(e) {
                s(this, {
                    type: "String Iterator",
                    string: String(e),
                    index: 0
                })
            }, function() {
                var e, t = a(this),
                    n = t.string,
                    i = t.index;
                return i >= n.length ? {
                    value: void 0,
                    done: !0
                } : (e = r(n, i, !0), t.index += e.length, {
                    value: e,
                    done: !1
                })
            })
        }, function(e, t, n) {
            n(78), n(55);
            var i = n(45);
            e.exports = i.Array.from
        }, function(e, t, n) {
            n(79), e.exports = n(44)
        }])
    });