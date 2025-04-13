/******/
(() => { // webpackBootstrap
    /******/
    var __webpack_modules__ = ({

        /***/
        "./node_modules/glightbox/dist/js/glightbox.min.js":
            /*!*********************************************************!*\
              !*** ./node_modules/glightbox/dist/js/glightbox.min.js ***!
              \*********************************************************/
            /***/
            (function (module) {

                ! function (e, t) {
                    true ? module.exports = t() : 0
                }(this, (function () {
                    "use strict";

                    function e(t) {
                        return (e = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                            return typeof e
                        } : function (e) {
                            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                        })(t)
                    }

                    function t(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }

                    function i(e, t) {
                        for (var i = 0; i < t.length; i++) {
                            var n = t[i];
                            n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                        }
                    }

                    function n(e, t, n) {
                        return t && i(e.prototype, t), n && i(e, n), e
                    }
                    var s = Date.now();

                    function l() {
                        var e = {},
                            t = !0,
                            i = 0,
                            n = arguments.length;
                        "[object Boolean]" === Object.prototype.toString.call(arguments[0]) && (t = arguments[0], i++);
                        for (var s = function (i) {
                                for (var n in i) Object.prototype.hasOwnProperty.call(i, n) && (t && "[object Object]" === Object.prototype.toString.call(i[n]) ? e[n] = l(!0, e[n], i[n]) : e[n] = i[n])
                            }; i < n; i++) {
                            var o = arguments[i];
                            s(o)
                        }
                        return e
                    }

                    function o(e, t) {
                        if ((k(e) || e === window || e === document) && (e = [e]), A(e) || L(e) || (e = [e]), 0 != P(e))
                            if (A(e) && !L(e))
                                for (var i = e.length, n = 0; n < i && !1 !== t.call(e[n], e[n], n, e); n++);
                            else if (L(e))
                            for (var s in e)
                                if (O(e, s) && !1 === t.call(e[s], e[s], s, e)) break
                    }

                    function r(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                            i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                            n = e[s] = e[s] || [],
                            l = {
                                all: n,
                                evt: null,
                                found: null
                            };
                        return t && i && P(n) > 0 && o(n, (function (e, n) {
                            if (e.eventName == t && e.fn.toString() == i.toString()) return l.found = !0, l.evt = n, !1
                        })), l
                    }

                    function a(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                            i = t.onElement,
                            n = t.withCallback,
                            s = t.avoidDuplicate,
                            l = void 0 === s || s,
                            a = t.once,
                            h = void 0 !== a && a,
                            d = t.useCapture,
                            c = void 0 !== d && d,
                            u = arguments.length > 2 ? arguments[2] : void 0,
                            g = i || [];

                        function v(e) {
                            T(n) && n.call(u, e, this), h && v.destroy()
                        }
                        return C(g) && (g = document.querySelectorAll(g)), v.destroy = function () {
                            o(g, (function (t) {
                                var i = r(t, e, v);
                                i.found && i.all.splice(i.evt, 1), t.removeEventListener && t.removeEventListener(e, v, c)
                            }))
                        }, o(g, (function (t) {
                            var i = r(t, e, v);
                            (t.addEventListener && l && !i.found || !l) && (t.addEventListener(e, v, c), i.all.push({
                                eventName: e,
                                fn: v
                            }))
                        })), v
                    }

                    function h(e, t) {
                        o(t.split(" "), (function (t) {
                            return e.classList.add(t)
                        }))
                    }

                    function d(e, t) {
                        o(t.split(" "), (function (t) {
                            return e.classList.remove(t)
                        }))
                    }

                    function c(e, t) {
                        return e.classList.contains(t)
                    }

                    function u(e, t) {
                        for (; e !== document.body;) {
                            if (!(e = e.parentElement)) return !1;
                            if ("function" == typeof e.matches ? e.matches(t) : e.msMatchesSelector(t)) return e
                        }
                    }

                    function g(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
                            i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                        if (!e || "" === t) return !1;
                        if ("none" === t) return T(i) && i(), !1;
                        var n = x(),
                            s = t.split(" ");
                        o(s, (function (t) {
                            h(e, "g" + t)
                        })), a(n, {
                            onElement: e,
                            avoidDuplicate: !1,
                            once: !0,
                            withCallback: function (e, t) {
                                o(s, (function (e) {
                                    d(t, "g" + e)
                                })), T(i) && i()
                            }
                        })
                    }

                    function v(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "";
                        if ("" === t) return e.style.webkitTransform = "", e.style.MozTransform = "", e.style.msTransform = "", e.style.OTransform = "", e.style.transform = "", !1;
                        e.style.webkitTransform = t, e.style.MozTransform = t, e.style.msTransform = t, e.style.OTransform = t, e.style.transform = t
                    }

                    function f(e) {
                        e.style.display = "block"
                    }

                    function p(e) {
                        e.style.display = "none"
                    }

                    function m(e) {
                        var t = document.createDocumentFragment(),
                            i = document.createElement("div");
                        for (i.innerHTML = e; i.firstChild;) t.appendChild(i.firstChild);
                        return t
                    }

                    function y() {
                        return {
                            width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
                            height: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight
                        }
                    }

                    function x() {
                        var e, t = document.createElement("fakeelement"),
                            i = {
                                animation: "animationend",
                                OAnimation: "oAnimationEnd",
                                MozAnimation: "animationend",
                                WebkitAnimation: "webkitAnimationEnd"
                            };
                        for (e in i)
                            if (void 0 !== t.style[e]) return i[e]
                    }

                    function b(e, t, i, n) {
                        if (e()) t();
                        else {
                            var s;
                            i || (i = 100);
                            var l = setInterval((function () {
                                e() && (clearInterval(l), s && clearTimeout(s), t())
                            }), i);
                            n && (s = setTimeout((function () {
                                clearInterval(l)
                            }), n))
                        }
                    }

                    function S(e, t, i) {
                        if (I(e)) console.error("Inject assets error");
                        else if (T(t) && (i = t, t = !1), C(t) && t in window) T(i) && i();
                        else {
                            var n;
                            if (-1 !== e.indexOf(".css")) {
                                if ((n = document.querySelectorAll('link[href="' + e + '"]')) && n.length > 0) return void(T(i) && i());
                                var s = document.getElementsByTagName("head")[0],
                                    l = s.querySelectorAll('link[rel="stylesheet"]'),
                                    o = document.createElement("link");
                                return o.rel = "stylesheet", o.type = "text/css", o.href = e, o.media = "all", l ? s.insertBefore(o, l[0]) : s.appendChild(o), void(T(i) && i())
                            }
                            if ((n = document.querySelectorAll('script[src="' + e + '"]')) && n.length > 0) {
                                if (T(i)) {
                                    if (C(t)) return b((function () {
                                        return void 0 !== window[t]
                                    }), (function () {
                                        i()
                                    })), !1;
                                    i()
                                }
                            } else {
                                var r = document.createElement("script");
                                r.type = "text/javascript", r.src = e, r.onload = function () {
                                    if (T(i)) {
                                        if (C(t)) return b((function () {
                                            return void 0 !== window[t]
                                        }), (function () {
                                            i()
                                        })), !1;
                                        i()
                                    }
                                }, document.body.appendChild(r)
                            }
                        }
                    }

                    function w() {
                        return "navigator" in window && window.navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i)
                    }

                    function T(e) {
                        return "function" == typeof e
                    }

                    function C(e) {
                        return "string" == typeof e
                    }

                    function k(e) {
                        return !(!e || !e.nodeType || 1 != e.nodeType)
                    }

                    function E(e) {
                        return Array.isArray(e)
                    }

                    function A(e) {
                        return e && e.length && isFinite(e.length)
                    }

                    function L(t) {
                        return "object" === e(t) && null != t && !T(t) && !E(t)
                    }

                    function I(e) {
                        return null == e
                    }

                    function O(e, t) {
                        return null !== e && hasOwnProperty.call(e, t)
                    }

                    function P(e) {
                        if (L(e)) {
                            if (e.keys) return e.keys().length;
                            var t = 0;
                            for (var i in e) O(e, i) && t++;
                            return t
                        }
                        return e.length
                    }

                    function M(e) {
                        return !isNaN(parseFloat(e)) && isFinite(e)
                    }

                    function z() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : -1,
                            t = document.querySelectorAll(".gbtn[data-taborder]:not(.disabled)");
                        if (!t.length) return !1;
                        if (1 == t.length) return t[0];
                        "string" == typeof e && (e = parseInt(e));
                        var i = [];
                        o(t, (function (e) {
                            i.push(e.getAttribute("data-taborder"))
                        }));
                        var n = Math.max.apply(Math, i.map((function (e) {
                                return parseInt(e)
                            }))),
                            s = e < 0 ? 1 : e + 1;
                        s > n && (s = "1");
                        var l = i.filter((function (e) {
                                return e >= parseInt(s)
                            })),
                            r = l.sort()[0];
                        return document.querySelector('.gbtn[data-taborder="'.concat(r, '"]'))
                    }

                    function X(e) {
                        if (e.events.hasOwnProperty("keyboard")) return !1;
                        e.events.keyboard = a("keydown", {
                            onElement: window,
                            withCallback: function (t, i) {
                                var n = (t = t || window.event).keyCode;
                                if (9 == n) {
                                    var s = document.querySelector(".gbtn.focused");
                                    if (!s) {
                                        var l = !(!document.activeElement || !document.activeElement.nodeName) && document.activeElement.nodeName.toLocaleLowerCase();
                                        if ("input" == l || "textarea" == l || "button" == l) return
                                    }
                                    t.preventDefault();
                                    var o = document.querySelectorAll(".gbtn[data-taborder]");
                                    if (!o || o.length <= 0) return;
                                    if (!s) {
                                        var r = z();
                                        return void(r && (r.focus(), h(r, "focused")))
                                    }
                                    var a = z(s.getAttribute("data-taborder"));
                                    d(s, "focused"), a && (a.focus(), h(a, "focused"))
                                }
                                39 == n && e.nextSlide(), 37 == n && e.prevSlide(), 27 == n && e.close()
                            }
                        })
                    }

                    function Y(e) {
                        return Math.sqrt(e.x * e.x + e.y * e.y)
                    }

                    function q(e, t) {
                        var i = function (e, t) {
                            var i = Y(e) * Y(t);
                            if (0 === i) return 0;
                            var n = function (e, t) {
                                return e.x * t.x + e.y * t.y
                            }(e, t) / i;
                            return n > 1 && (n = 1), Math.acos(n)
                        }(e, t);
                        return function (e, t) {
                            return e.x * t.y - t.x * e.y
                        }(e, t) > 0 && (i *= -1), 180 * i / Math.PI
                    }
                    var N = function () {
                        function e(i) {
                            t(this, e), this.handlers = [], this.el = i
                        }
                        return n(e, [{
                            key: "add",
                            value: function (e) {
                                this.handlers.push(e)
                            }
                        }, {
                            key: "del",
                            value: function (e) {
                                e || (this.handlers = []);
                                for (var t = this.handlers.length; t >= 0; t--) this.handlers[t] === e && this.handlers.splice(t, 1)
                            }
                        }, {
                            key: "dispatch",
                            value: function () {
                                for (var e = 0, t = this.handlers.length; e < t; e++) {
                                    var i = this.handlers[e];
                                    "function" == typeof i && i.apply(this.el, arguments)
                                }
                            }
                        }]), e
                    }();

                    function D(e, t) {
                        var i = new N(e);
                        return i.add(t), i
                    }
                    var _ = function () {
                        function e(i, n) {
                            t(this, e), this.element = "string" == typeof i ? document.querySelector(i) : i, this.start = this.start.bind(this), this.move = this.move.bind(this), this.end = this.end.bind(this), this.cancel = this.cancel.bind(this), this.element.addEventListener("touchstart", this.start, !1), this.element.addEventListener("touchmove", this.move, !1), this.element.addEventListener("touchend", this.end, !1), this.element.addEventListener("touchcancel", this.cancel, !1), this.preV = {
                                x: null,
                                y: null
                            }, this.pinchStartLen = null, this.zoom = 1, this.isDoubleTap = !1;
                            var s = function () {};
                            this.rotate = D(this.element, n.rotate || s), this.touchStart = D(this.element, n.touchStart || s), this.multipointStart = D(this.element, n.multipointStart || s), this.multipointEnd = D(this.element, n.multipointEnd || s), this.pinch = D(this.element, n.pinch || s), this.swipe = D(this.element, n.swipe || s), this.tap = D(this.element, n.tap || s), this.doubleTap = D(this.element, n.doubleTap || s), this.longTap = D(this.element, n.longTap || s), this.singleTap = D(this.element, n.singleTap || s), this.pressMove = D(this.element, n.pressMove || s), this.twoFingerPressMove = D(this.element, n.twoFingerPressMove || s), this.touchMove = D(this.element, n.touchMove || s), this.touchEnd = D(this.element, n.touchEnd || s), this.touchCancel = D(this.element, n.touchCancel || s), this.translateContainer = this.element, this._cancelAllHandler = this.cancelAll.bind(this), window.addEventListener("scroll", this._cancelAllHandler), this.delta = null, this.last = null, this.now = null, this.tapTimeout = null, this.singleTapTimeout = null, this.longTapTimeout = null, this.swipeTimeout = null, this.x1 = this.x2 = this.y1 = this.y2 = null, this.preTapPosition = {
                                x: null,
                                y: null
                            }
                        }
                        return n(e, [{
                            key: "start",
                            value: function (e) {
                                if (e.touches) {
                                    if (e.target && e.target.nodeName && ["a", "button", "input"].indexOf(e.target.nodeName.toLowerCase()) >= 0) console.log("ignore drag for this touched element", e.target.nodeName.toLowerCase());
                                    else {
                                        this.now = Date.now(), this.x1 = e.touches[0].pageX, this.y1 = e.touches[0].pageY, this.delta = this.now - (this.last || this.now), this.touchStart.dispatch(e, this.element), null !== this.preTapPosition.x && (this.isDoubleTap = this.delta > 0 && this.delta <= 250 && Math.abs(this.preTapPosition.x - this.x1) < 30 && Math.abs(this.preTapPosition.y - this.y1) < 30, this.isDoubleTap && clearTimeout(this.singleTapTimeout)), this.preTapPosition.x = this.x1, this.preTapPosition.y = this.y1, this.last = this.now;
                                        var t = this.preV;
                                        if (e.touches.length > 1) {
                                            this._cancelLongTap(), this._cancelSingleTap();
                                            var i = {
                                                x: e.touches[1].pageX - this.x1,
                                                y: e.touches[1].pageY - this.y1
                                            };
                                            t.x = i.x, t.y = i.y, this.pinchStartLen = Y(t), this.multipointStart.dispatch(e, this.element)
                                        }
                                        this._preventTap = !1, this.longTapTimeout = setTimeout(function () {
                                            this.longTap.dispatch(e, this.element), this._preventTap = !0
                                        }.bind(this), 750)
                                    }
                                }
                            }
                        }, {
                            key: "move",
                            value: function (e) {
                                if (e.touches) {
                                    var t = this.preV,
                                        i = e.touches.length,
                                        n = e.touches[0].pageX,
                                        s = e.touches[0].pageY;
                                    if (this.isDoubleTap = !1, i > 1) {
                                        var l = e.touches[1].pageX,
                                            o = e.touches[1].pageY,
                                            r = {
                                                x: e.touches[1].pageX - n,
                                                y: e.touches[1].pageY - s
                                            };
                                        null !== t.x && (this.pinchStartLen > 0 && (e.zoom = Y(r) / this.pinchStartLen, this.pinch.dispatch(e, this.element)), e.angle = q(r, t), this.rotate.dispatch(e, this.element)), t.x = r.x, t.y = r.y, null !== this.x2 && null !== this.sx2 ? (e.deltaX = (n - this.x2 + l - this.sx2) / 2, e.deltaY = (s - this.y2 + o - this.sy2) / 2) : (e.deltaX = 0, e.deltaY = 0), this.twoFingerPressMove.dispatch(e, this.element), this.sx2 = l, this.sy2 = o
                                    } else {
                                        if (null !== this.x2) {
                                            e.deltaX = n - this.x2, e.deltaY = s - this.y2;
                                            var a = Math.abs(this.x1 - this.x2),
                                                h = Math.abs(this.y1 - this.y2);
                                            (a > 10 || h > 10) && (this._preventTap = !0)
                                        } else e.deltaX = 0, e.deltaY = 0;
                                        this.pressMove.dispatch(e, this.element)
                                    }
                                    this.touchMove.dispatch(e, this.element), this._cancelLongTap(), this.x2 = n, this.y2 = s, i > 1 && e.preventDefault()
                                }
                            }
                        }, {
                            key: "end",
                            value: function (e) {
                                if (e.changedTouches) {
                                    this._cancelLongTap();
                                    var t = this;
                                    e.touches.length < 2 && (this.multipointEnd.dispatch(e, this.element), this.sx2 = this.sy2 = null), this.x2 && Math.abs(this.x1 - this.x2) > 30 || this.y2 && Math.abs(this.y1 - this.y2) > 30 ? (e.direction = this._swipeDirection(this.x1, this.x2, this.y1, this.y2), this.swipeTimeout = setTimeout((function () {
                                        t.swipe.dispatch(e, t.element)
                                    }), 0)) : (this.tapTimeout = setTimeout((function () {
                                        t._preventTap || t.tap.dispatch(e, t.element), t.isDoubleTap && (t.doubleTap.dispatch(e, t.element), t.isDoubleTap = !1)
                                    }), 0), t.isDoubleTap || (t.singleTapTimeout = setTimeout((function () {
                                        t.singleTap.dispatch(e, t.element)
                                    }), 250))), this.touchEnd.dispatch(e, this.element), this.preV.x = 0, this.preV.y = 0, this.zoom = 1, this.pinchStartLen = null, this.x1 = this.x2 = this.y1 = this.y2 = null
                                }
                            }
                        }, {
                            key: "cancelAll",
                            value: function () {
                                this._preventTap = !0, clearTimeout(this.singleTapTimeout), clearTimeout(this.tapTimeout), clearTimeout(this.longTapTimeout), clearTimeout(this.swipeTimeout)
                            }
                        }, {
                            key: "cancel",
                            value: function (e) {
                                this.cancelAll(), this.touchCancel.dispatch(e, this.element)
                            }
                        }, {
                            key: "_cancelLongTap",
                            value: function () {
                                clearTimeout(this.longTapTimeout)
                            }
                        }, {
                            key: "_cancelSingleTap",
                            value: function () {
                                clearTimeout(this.singleTapTimeout)
                            }
                        }, {
                            key: "_swipeDirection",
                            value: function (e, t, i, n) {
                                return Math.abs(e - t) >= Math.abs(i - n) ? e - t > 0 ? "Left" : "Right" : i - n > 0 ? "Up" : "Down"
                            }
                        }, {
                            key: "on",
                            value: function (e, t) {
                                this[e] && this[e].add(t)
                            }
                        }, {
                            key: "off",
                            value: function (e, t) {
                                this[e] && this[e].del(t)
                            }
                        }, {
                            key: "destroy",
                            value: function () {
                                return this.singleTapTimeout && clearTimeout(this.singleTapTimeout), this.tapTimeout && clearTimeout(this.tapTimeout), this.longTapTimeout && clearTimeout(this.longTapTimeout), this.swipeTimeout && clearTimeout(this.swipeTimeout), this.element.removeEventListener("touchstart", this.start), this.element.removeEventListener("touchmove", this.move), this.element.removeEventListener("touchend", this.end), this.element.removeEventListener("touchcancel", this.cancel), this.rotate.del(), this.touchStart.del(), this.multipointStart.del(), this.multipointEnd.del(), this.pinch.del(), this.swipe.del(), this.tap.del(), this.doubleTap.del(), this.longTap.del(), this.singleTap.del(), this.pressMove.del(), this.twoFingerPressMove.del(), this.touchMove.del(), this.touchEnd.del(), this.touchCancel.del(), this.preV = this.pinchStartLen = this.zoom = this.isDoubleTap = this.delta = this.last = this.now = this.tapTimeout = this.singleTapTimeout = this.longTapTimeout = this.swipeTimeout = this.x1 = this.x2 = this.y1 = this.y2 = this.preTapPosition = this.rotate = this.touchStart = this.multipointStart = this.multipointEnd = this.pinch = this.swipe = this.tap = this.doubleTap = this.longTap = this.singleTap = this.pressMove = this.touchMove = this.touchEnd = this.touchCancel = this.twoFingerPressMove = null, window.removeEventListener("scroll", this._cancelAllHandler), null
                            }
                        }]), e
                    }();

                    function W(e) {
                        var t = function () {
                                var e, t = document.createElement("fakeelement"),
                                    i = {
                                        transition: "transitionend",
                                        OTransition: "oTransitionEnd",
                                        MozTransition: "transitionend",
                                        WebkitTransition: "webkitTransitionEnd"
                                    };
                                for (e in i)
                                    if (void 0 !== t.style[e]) return i[e]
                            }(),
                            i = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
                            n = c(e, "gslide-media") ? e : e.querySelector(".gslide-media"),
                            s = u(n, ".ginner-container"),
                            l = e.querySelector(".gslide-description");
                        i > 769 && (n = s), h(n, "greset"), v(n, "translate3d(0, 0, 0)"), a(t, {
                            onElement: n,
                            once: !0,
                            withCallback: function (e, t) {
                                d(n, "greset")
                            }
                        }), n.style.opacity = "", l && (l.style.opacity = "")
                    }

                    function B(e) {
                        if (e.events.hasOwnProperty("touch")) return !1;
                        var t, i, n, s = y(),
                            l = s.width,
                            o = s.height,
                            r = !1,
                            a = null,
                            g = null,
                            f = null,
                            p = !1,
                            m = 1,
                            x = 1,
                            b = !1,
                            S = !1,
                            w = null,
                            T = null,
                            C = null,
                            k = null,
                            E = 0,
                            A = 0,
                            L = !1,
                            I = !1,
                            O = {},
                            P = {},
                            M = 0,
                            z = 0,
                            X = document.getElementById("glightbox-slider"),
                            Y = document.querySelector(".goverlay"),
                            q = new _(X, {
                                touchStart: function (t) {
                                    if (r = !0, (c(t.targetTouches[0].target, "ginner-container") || u(t.targetTouches[0].target, ".gslide-desc") || "a" == t.targetTouches[0].target.nodeName.toLowerCase()) && (r = !1), u(t.targetTouches[0].target, ".gslide-inline") && !c(t.targetTouches[0].target.parentNode, "gslide-inline") && (r = !1), r) {
                                        if (P = t.targetTouches[0], O.pageX = t.targetTouches[0].pageX, O.pageY = t.targetTouches[0].pageY, M = t.targetTouches[0].clientX, z = t.targetTouches[0].clientY, a = e.activeSlide, g = a.querySelector(".gslide-media"), n = a.querySelector(".gslide-inline"), f = null, c(g, "gslide-image") && (f = g.querySelector("img")), (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth) > 769 && (g = a.querySelector(".ginner-container")), d(Y, "greset"), t.pageX > 20 && t.pageX < window.innerWidth - 20) return;
                                        t.preventDefault()
                                    }
                                },
                                touchMove: function (s) {
                                    if (r && (P = s.targetTouches[0], !b && !S)) {
                                        if (n && n.offsetHeight > o) {
                                            var a = O.pageX - P.pageX;
                                            if (Math.abs(a) <= 13) return !1
                                        }
                                        p = !0;
                                        var h, d = s.targetTouches[0].clientX,
                                            c = s.targetTouches[0].clientY,
                                            u = M - d,
                                            m = z - c;
                                        if (Math.abs(u) > Math.abs(m) ? (L = !1, I = !0) : (I = !1, L = !0), t = P.pageX - O.pageX, E = 100 * t / l, i = P.pageY - O.pageY, A = 100 * i / o, L && f && (h = 1 - Math.abs(i) / o, Y.style.opacity = h, e.settings.touchFollowAxis && (E = 0)), I && (h = 1 - Math.abs(t) / l, g.style.opacity = h, e.settings.touchFollowAxis && (A = 0)), !f) return v(g, "translate3d(".concat(E, "%, 0, 0)"));
                                        v(g, "translate3d(".concat(E, "%, ").concat(A, "%, 0)"))
                                    }
                                },
                                touchEnd: function () {
                                    if (r) {
                                        if (p = !1, S || b) return C = w, void(k = T);
                                        var t = Math.abs(parseInt(A)),
                                            i = Math.abs(parseInt(E));
                                        if (!(t > 29 && f)) return t < 29 && i < 25 ? (h(Y, "greset"), Y.style.opacity = 1, W(g)) : void 0;
                                        e.close()
                                    }
                                },
                                multipointEnd: function () {
                                    setTimeout((function () {
                                        b = !1
                                    }), 50)
                                },
                                multipointStart: function () {
                                    b = !0, m = x || 1
                                },
                                pinch: function (e) {
                                    if (!f || p) return !1;
                                    b = !0, f.scaleX = f.scaleY = m * e.zoom;
                                    var t = m * e.zoom;
                                    if (S = !0, t <= 1) return S = !1, t = 1, k = null, C = null, w = null, T = null, void f.setAttribute("style", "");
                                    t > 4.5 && (t = 4.5), f.style.transform = "scale3d(".concat(t, ", ").concat(t, ", 1)"), x = t
                                },
                                pressMove: function (e) {
                                    if (S && !b) {
                                        var t = P.pageX - O.pageX,
                                            i = P.pageY - O.pageY;
                                        C && (t += C), k && (i += k), w = t, T = i;
                                        var n = "translate3d(".concat(t, "px, ").concat(i, "px, 0)");
                                        x && (n += " scale3d(".concat(x, ", ").concat(x, ", 1)")), v(f, n)
                                    }
                                },
                                swipe: function (t) {
                                    if (!S)
                                        if (b) b = !1;
                                        else {
                                            if ("Left" == t.direction) {
                                                if (e.index == e.elements.length - 1) return W(g);
                                                e.nextSlide()
                                            }
                                            if ("Right" == t.direction) {
                                                if (0 == e.index) return W(g);
                                                e.prevSlide()
                                            }
                                        }
                                }
                            });
                        e.events.touch = q
                    }
                    var H = function () {
                            function e(i, n) {
                                var s = this,
                                    l = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null;
                                if (t(this, e), this.img = i, this.slide = n, this.onclose = l, this.img.setZoomEvents) return !1;
                                this.active = !1, this.zoomedIn = !1, this.dragging = !1, this.currentX = null, this.currentY = null, this.initialX = null, this.initialY = null, this.xOffset = 0, this.yOffset = 0, this.img.addEventListener("mousedown", (function (e) {
                                    return s.dragStart(e)
                                }), !1), this.img.addEventListener("mouseup", (function (e) {
                                    return s.dragEnd(e)
                                }), !1), this.img.addEventListener("mousemove", (function (e) {
                                    return s.drag(e)
                                }), !1), this.img.addEventListener("click", (function (e) {
                                    return s.slide.classList.contains("dragging-nav") ? (s.zoomOut(), !1) : s.zoomedIn ? void(s.zoomedIn && !s.dragging && s.zoomOut()) : s.zoomIn()
                                }), !1), this.img.setZoomEvents = !0
                            }
                            return n(e, [{
                                key: "zoomIn",
                                value: function () {
                                    var e = this.widowWidth();
                                    if (!(this.zoomedIn || e <= 768)) {
                                        var t = this.img;
                                        if (t.setAttribute("data-style", t.getAttribute("style")), t.style.maxWidth = t.naturalWidth + "px", t.style.maxHeight = t.naturalHeight + "px", t.naturalWidth > e) {
                                            var i = e / 2 - t.naturalWidth / 2;
                                            this.setTranslate(this.img.parentNode, i, 0)
                                        }
                                        this.slide.classList.add("zoomed"), this.zoomedIn = !0
                                    }
                                }
                            }, {
                                key: "zoomOut",
                                value: function () {
                                    this.img.parentNode.setAttribute("style", ""), this.img.setAttribute("style", this.img.getAttribute("data-style")), this.slide.classList.remove("zoomed"), this.zoomedIn = !1, this.currentX = null, this.currentY = null, this.initialX = null, this.initialY = null, this.xOffset = 0, this.yOffset = 0, this.onclose && "function" == typeof this.onclose && this.onclose()
                                }
                            }, {
                                key: "dragStart",
                                value: function (e) {
                                    e.preventDefault(), this.zoomedIn ? ("touchstart" === e.type ? (this.initialX = e.touches[0].clientX - this.xOffset, this.initialY = e.touches[0].clientY - this.yOffset) : (this.initialX = e.clientX - this.xOffset, this.initialY = e.clientY - this.yOffset), e.target === this.img && (this.active = !0, this.img.classList.add("dragging"))) : this.active = !1
                                }
                            }, {
                                key: "dragEnd",
                                value: function (e) {
                                    var t = this;
                                    e.preventDefault(), this.initialX = this.currentX, this.initialY = this.currentY, this.active = !1, setTimeout((function () {
                                        t.dragging = !1, t.img.isDragging = !1, t.img.classList.remove("dragging")
                                    }), 100)
                                }
                            }, {
                                key: "drag",
                                value: function (e) {
                                    this.active && (e.preventDefault(), "touchmove" === e.type ? (this.currentX = e.touches[0].clientX - this.initialX, this.currentY = e.touches[0].clientY - this.initialY) : (this.currentX = e.clientX - this.initialX, this.currentY = e.clientY - this.initialY), this.xOffset = this.currentX, this.yOffset = this.currentY, this.img.isDragging = !0, this.dragging = !0, this.setTranslate(this.img, this.currentX, this.currentY))
                                }
                            }, {
                                key: "onMove",
                                value: function (e) {
                                    if (this.zoomedIn) {
                                        var t = e.clientX - this.img.naturalWidth / 2,
                                            i = e.clientY - this.img.naturalHeight / 2;
                                        this.setTranslate(this.img, t, i)
                                    }
                                }
                            }, {
                                key: "setTranslate",
                                value: function (e, t, i) {
                                    e.style.transform = "translate3d(" + t + "px, " + i + "px, 0)"
                                }
                            }, {
                                key: "widowWidth",
                                value: function () {
                                    return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
                                }
                            }]), e
                        }(),
                        V = function () {
                            function e() {
                                var i = this,
                                    n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                                t(this, e);
                                var s = n.dragEl,
                                    l = n.toleranceX,
                                    o = void 0 === l ? 40 : l,
                                    r = n.toleranceY,
                                    a = void 0 === r ? 65 : r,
                                    h = n.slide,
                                    d = void 0 === h ? null : h,
                                    c = n.instance,
                                    u = void 0 === c ? null : c;
                                this.el = s, this.active = !1, this.dragging = !1, this.currentX = null, this.currentY = null, this.initialX = null, this.initialY = null, this.xOffset = 0, this.yOffset = 0, this.direction = null, this.lastDirection = null, this.toleranceX = o, this.toleranceY = a, this.toleranceReached = !1, this.dragContainer = this.el, this.slide = d, this.instance = u, this.el.addEventListener("mousedown", (function (e) {
                                    return i.dragStart(e)
                                }), !1), this.el.addEventListener("mouseup", (function (e) {
                                    return i.dragEnd(e)
                                }), !1), this.el.addEventListener("mousemove", (function (e) {
                                    return i.drag(e)
                                }), !1)
                            }
                            return n(e, [{
                                key: "dragStart",
                                value: function (e) {
                                    if (this.slide.classList.contains("zoomed")) this.active = !1;
                                    else {
                                        "touchstart" === e.type ? (this.initialX = e.touches[0].clientX - this.xOffset, this.initialY = e.touches[0].clientY - this.yOffset) : (this.initialX = e.clientX - this.xOffset, this.initialY = e.clientY - this.yOffset);
                                        var t = e.target.nodeName.toLowerCase();
                                        e.target.classList.contains("nodrag") || u(e.target, ".nodrag") || -1 !== ["input", "select", "textarea", "button", "a"].indexOf(t) ? this.active = !1 : (e.preventDefault(), (e.target === this.el || "img" !== t && u(e.target, ".gslide-inline")) && (this.active = !0, this.el.classList.add("dragging"), this.dragContainer = u(e.target, ".ginner-container")))
                                    }
                                }
                            }, {
                                key: "dragEnd",
                                value: function (e) {
                                    var t = this;
                                    e && e.preventDefault(), this.initialX = 0, this.initialY = 0, this.currentX = null, this.currentY = null, this.initialX = null, this.initialY = null, this.xOffset = 0, this.yOffset = 0, this.active = !1, this.doSlideChange && (this.instance.preventOutsideClick = !0, "right" == this.doSlideChange && this.instance.prevSlide(), "left" == this.doSlideChange && this.instance.nextSlide()), this.doSlideClose && this.instance.close(), this.toleranceReached || this.setTranslate(this.dragContainer, 0, 0, !0), setTimeout((function () {
                                        t.instance.preventOutsideClick = !1, t.toleranceReached = !1, t.lastDirection = null, t.dragging = !1, t.el.isDragging = !1, t.el.classList.remove("dragging"), t.slide.classList.remove("dragging-nav"), t.dragContainer.style.transform = "", t.dragContainer.style.transition = ""
                                    }), 100)
                                }
                            }, {
                                key: "drag",
                                value: function (e) {
                                    if (this.active) {
                                        e.preventDefault(), this.slide.classList.add("dragging-nav"), "touchmove" === e.type ? (this.currentX = e.touches[0].clientX - this.initialX, this.currentY = e.touches[0].clientY - this.initialY) : (this.currentX = e.clientX - this.initialX, this.currentY = e.clientY - this.initialY), this.xOffset = this.currentX, this.yOffset = this.currentY, this.el.isDragging = !0, this.dragging = !0, this.doSlideChange = !1, this.doSlideClose = !1;
                                        var t = Math.abs(this.currentX),
                                            i = Math.abs(this.currentY);
                                        if (t > 0 && t >= Math.abs(this.currentY) && (!this.lastDirection || "x" == this.lastDirection)) {
                                            this.yOffset = 0, this.lastDirection = "x", this.setTranslate(this.dragContainer, this.currentX, 0);
                                            var n = this.shouldChange();
                                            if (!this.instance.settings.dragAutoSnap && n && (this.doSlideChange = n), this.instance.settings.dragAutoSnap && n) return this.instance.preventOutsideClick = !0, this.toleranceReached = !0, this.active = !1, this.instance.preventOutsideClick = !0, this.dragEnd(null), "right" == n && this.instance.prevSlide(), void("left" == n && this.instance.nextSlide())
                                        }
                                        if (this.toleranceY > 0 && i > 0 && i >= t && (!this.lastDirection || "y" == this.lastDirection)) {
                                            this.xOffset = 0, this.lastDirection = "y", this.setTranslate(this.dragContainer, 0, this.currentY);
                                            var s = this.shouldClose();
                                            return !this.instance.settings.dragAutoSnap && s && (this.doSlideClose = !0), void(this.instance.settings.dragAutoSnap && s && this.instance.close())
                                        }
                                    }
                                }
                            }, {
                                key: "shouldChange",
                                value: function () {
                                    var e = !1;
                                    if (Math.abs(this.currentX) >= this.toleranceX) {
                                        var t = this.currentX > 0 ? "right" : "left";
                                        ("left" == t && this.slide !== this.slide.parentNode.lastChild || "right" == t && this.slide !== this.slide.parentNode.firstChild) && (e = t)
                                    }
                                    return e
                                }
                            }, {
                                key: "shouldClose",
                                value: function () {
                                    var e = !1;
                                    return Math.abs(this.currentY) >= this.toleranceY && (e = !0), e
                                }
                            }, {
                                key: "setTranslate",
                                value: function (e, t, i) {
                                    var n = arguments.length > 3 && void 0 !== arguments[3] && arguments[3];
                                    e.style.transition = n ? "all .2s ease" : "", e.style.transform = "translate3d(".concat(t, "px, ").concat(i, "px, 0)")
                                }
                            }]), e
                        }();

                    function j(e, t, i, n) {
                        var s = e.querySelector(".gslide-media"),
                            l = new Image,
                            o = "gSlideTitle_" + i,
                            r = "gSlideDesc_" + i;
                        l.addEventListener("load", (function () {
                            T(n) && n()
                        }), !1), l.src = t.href, "" != t.sizes && "" != t.srcset && (l.sizes = t.sizes, l.srcset = t.srcset), l.alt = "", I(t.alt) || "" === t.alt || (l.alt = t.alt), "" !== t.title && l.setAttribute("aria-labelledby", o), "" !== t.description && l.setAttribute("aria-describedby", r), t.hasOwnProperty("_hasCustomWidth") && t._hasCustomWidth && (l.style.width = t.width), t.hasOwnProperty("_hasCustomHeight") && t._hasCustomHeight && (l.style.height = t.height), s.insertBefore(l, s.firstChild)
                    }

                    function F(e, t, i, n) {
                        var s = this,
                            l = e.querySelector(".ginner-container"),
                            o = "gvideo" + i,
                            r = e.querySelector(".gslide-media"),
                            a = this.getAllPlayers();
                        h(l, "gvideo-container"), r.insertBefore(m('<div class="gvideo-wrapper"></div>'), r.firstChild);
                        var d = e.querySelector(".gvideo-wrapper");
                        S(this.settings.plyr.css, "Plyr");
                        var c = t.href,
                            u = null == t ? void 0 : t.videoProvider,
                            g = !1;
                        r.style.maxWidth = t.width, S(this.settings.plyr.js, "Plyr", (function () {
                            if (!u && c.match(/vimeo\.com\/([0-9]*)/) && (u = "vimeo"), !u && (c.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || c.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/) || c.match(/(youtube\.com|youtube-nocookie\.com)\/embed\/([a-zA-Z0-9\-_]+)/)) && (u = "youtube"), "local" === u || !u) {
                                u = "local";
                                var l = '<video id="' + o + '" ';
                                l += 'style="background:#000; max-width: '.concat(t.width, ';" '), l += 'preload="metadata" ', l += 'x-webkit-airplay="allow" ', l += "playsinline ", l += "controls ", l += 'class="gvideo-local">', l += '<source src="'.concat(c, '">'), g = m(l += "</video>")
                            }
                            var r = g || m('<div id="'.concat(o, '" data-plyr-provider="').concat(u, '" data-plyr-embed-id="').concat(c, '"></div>'));
                            h(d, "".concat(u, "-video gvideo")), d.appendChild(r), d.setAttribute("data-id", o), d.setAttribute("data-index", i);
                            var v = O(s.settings.plyr, "config") ? s.settings.plyr.config : {},
                                f = new Plyr("#" + o, v);
                            f.on("ready", (function (e) {
                                a[o] = e.detail.plyr, T(n) && n()
                            })), b((function () {
                                return e.querySelector("iframe") && "true" == e.querySelector("iframe").dataset.ready
                            }), (function () {
                                s.resize(e)
                            })), f.on("enterfullscreen", R), f.on("exitfullscreen", R)
                        }))
                    }

                    function R(e) {
                        var t = u(e.target, ".gslide-media");
                        "enterfullscreen" === e.type && h(t, "fullscreen"), "exitfullscreen" === e.type && d(t, "fullscreen")
                    }

                    function G(e, t, i, n) {
                        var s, l = this,
                            o = e.querySelector(".gslide-media"),
                            r = !(!O(t, "href") || !t.href) && t.href.split("#").pop().trim(),
                            d = !(!O(t, "content") || !t.content) && t.content;
                        if (d && (C(d) && (s = m('<div class="ginlined-content">'.concat(d, "</div>"))), k(d))) {
                            "none" == d.style.display && (d.style.display = "block");
                            var c = document.createElement("div");
                            c.className = "ginlined-content", c.appendChild(d), s = c
                        }
                        if (r) {
                            var u = document.getElementById(r);
                            if (!u) return !1;
                            var g = u.cloneNode(!0);
                            g.style.height = t.height, g.style.maxWidth = t.width, h(g, "ginlined-content"), s = g
                        }
                        if (!s) return console.error("Unable to append inline slide content", t), !1;
                        o.style.height = t.height, o.style.width = t.width, o.appendChild(s), this.events["inlineclose" + r] = a("click", {
                            onElement: o.querySelectorAll(".gtrigger-close"),
                            withCallback: function (e) {
                                e.preventDefault(), l.close()
                            }
                        }), T(n) && n()
                    }

                    function Z(e, t, i, n) {
                        var s = e.querySelector(".gslide-media"),
                            l = function (e) {
                                var t = e.url,
                                    i = e.allow,
                                    n = e.callback,
                                    s = e.appendTo,
                                    l = document.createElement("iframe");
                                return l.className = "vimeo-video gvideo", l.src = t, l.style.width = "100%", l.style.height = "100%", i && l.setAttribute("allow", i), l.onload = function () {
                                    l.onload = null, h(l, "node-ready"), T(n) && n()
                                }, s && s.appendChild(l), l
                            }({
                                url: t.href,
                                callback: n
                            });
                        s.parentNode.style.maxWidth = t.width, s.parentNode.style.height = t.height, s.appendChild(l)
                    }
                    var U = function () {
                            function e() {
                                var i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                                t(this, e), this.defaults = {
                                    href: "",
                                    sizes: "",
                                    srcset: "",
                                    title: "",
                                    type: "",
                                    videoProvider: "",
                                    description: "",
                                    alt: "",
                                    descPosition: "bottom",
                                    effect: "",
                                    width: "",
                                    height: "",
                                    content: !1,
                                    zoomable: !0,
                                    draggable: !0
                                }, L(i) && (this.defaults = l(this.defaults, i))
                            }
                            return n(e, [{
                                key: "sourceType",
                                value: function (e) {
                                    var t = e;
                                    if (null !== (e = e.toLowerCase()).match(/\.(jpeg|jpg|jpe|gif|png|apn|webp|avif|svg)/)) return "image";
                                    if (e.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || e.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/) || e.match(/(youtube\.com|youtube-nocookie\.com)\/embed\/([a-zA-Z0-9\-_]+)/)) return "video";
                                    if (e.match(/vimeo\.com\/([0-9]*)/)) return "video";
                                    if (null !== e.match(/\.(mp4|ogg|webm|mov)/)) return "video";
                                    if (null !== e.match(/\.(mp3|wav|wma|aac|ogg)/)) return "audio";
                                    if (e.indexOf("#") > -1 && "" !== t.split("#").pop().trim()) return "inline";
                                    return e.indexOf("goajax=true") > -1 ? "ajax" : "external"
                                }
                            }, {
                                key: "parseConfig",
                                value: function (e, t) {
                                    var i = this,
                                        n = l({
                                            descPosition: t.descPosition
                                        }, this.defaults);
                                    if (L(e) && !k(e)) {
                                        O(e, "type") || (O(e, "content") && e.content ? e.type = "inline" : O(e, "href") && (e.type = this.sourceType(e.href)));
                                        var s = l(n, e);
                                        return this.setSize(s, t), s
                                    }
                                    var r = "",
                                        a = e.getAttribute("data-glightbox"),
                                        h = e.nodeName.toLowerCase();
                                    if ("a" === h && (r = e.href), "img" === h && (r = e.src, n.alt = e.alt), n.href = r, o(n, (function (s, l) {
                                            O(t, l) && "width" !== l && (n[l] = t[l]);
                                            var o = e.dataset[l];
                                            I(o) || (n[l] = i.sanitizeValue(o))
                                        })), n.content && (n.type = "inline"), !n.type && r && (n.type = this.sourceType(r)), I(a)) {
                                        if (!n.title && "a" == h) {
                                            var d = e.title;
                                            I(d) || "" === d || (n.title = d)
                                        }
                                        if (!n.title && "img" == h) {
                                            var c = e.alt;
                                            I(c) || "" === c || (n.title = c)
                                        }
                                    } else {
                                        var u = [];
                                        o(n, (function (e, t) {
                                            u.push(";\\s?" + t)
                                        })), u = u.join("\\s?:|"), "" !== a.trim() && o(n, (function (e, t) {
                                            var s = a,
                                                l = new RegExp("s?" + t + "s?:s?(.*?)(" + u + "s?:|$)"),
                                                o = s.match(l);
                                            if (o && o.length && o[1]) {
                                                var r = o[1].trim().replace(/;\s*$/, "");
                                                n[t] = i.sanitizeValue(r)
                                            }
                                        }))
                                    }
                                    if (n.description && "." === n.description.substring(0, 1)) {
                                        var g;
                                        try {
                                            g = document.querySelector(n.description).innerHTML
                                        } catch (e) {
                                            if (!(e instanceof DOMException)) throw e
                                        }
                                        g && (n.description = g)
                                    }
                                    if (!n.description) {
                                        var v = e.querySelector(".glightbox-desc");
                                        v && (n.description = v.innerHTML)
                                    }
                                    return this.setSize(n, t, e), this.slideConfig = n, n
                                }
                            }, {
                                key: "setSize",
                                value: function (e, t) {
                                    var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                                        n = "video" == e.type ? this.checkSize(t.videosWidth) : this.checkSize(t.width),
                                        s = this.checkSize(t.height);
                                    return e.width = O(e, "width") && "" !== e.width ? this.checkSize(e.width) : n, e.height = O(e, "height") && "" !== e.height ? this.checkSize(e.height) : s, i && "image" == e.type && (e._hasCustomWidth = !!i.dataset.width, e._hasCustomHeight = !!i.dataset.height), e
                                }
                            }, {
                                key: "checkSize",
                                value: function (e) {
                                    return M(e) ? "".concat(e, "px") : e
                                }
                            }, {
                                key: "sanitizeValue",
                                value: function (e) {
                                    return "true" !== e && "false" !== e ? e : "true" === e
                                }
                            }]), e
                        }(),
                        $ = function () {
                            function e(i, n, s) {
                                t(this, e), this.element = i, this.instance = n, this.index = s
                            }
                            return n(e, [{
                                key: "setContent",
                                value: function () {
                                    var e = this,
                                        t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                                        i = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                                    if (c(t, "loaded")) return !1;
                                    var n = this.instance.settings,
                                        s = this.slideConfig,
                                        l = w();
                                    T(n.beforeSlideLoad) && n.beforeSlideLoad({
                                        index: this.index,
                                        slide: t,
                                        player: !1
                                    });
                                    var o = s.type,
                                        r = s.descPosition,
                                        a = t.querySelector(".gslide-media"),
                                        d = t.querySelector(".gslide-title"),
                                        u = t.querySelector(".gslide-desc"),
                                        g = t.querySelector(".gdesc-inner"),
                                        v = i,
                                        f = "gSlideTitle_" + this.index,
                                        p = "gSlideDesc_" + this.index;
                                    if (T(n.afterSlideLoad) && (v = function () {
                                            T(i) && i(), n.afterSlideLoad({
                                                index: e.index,
                                                slide: t,
                                                player: e.instance.getSlidePlayerInstance(e.index)
                                            })
                                        }), "" == s.title && "" == s.description ? g && g.parentNode.parentNode.removeChild(g.parentNode) : (d && "" !== s.title ? (d.id = f, d.innerHTML = s.title) : d.parentNode.removeChild(d), u && "" !== s.description ? (u.id = p, l && n.moreLength > 0 ? (s.smallDescription = this.slideShortDesc(s.description, n.moreLength, n.moreText), u.innerHTML = s.smallDescription, this.descriptionEvents(u, s)) : u.innerHTML = s.description) : u.parentNode.removeChild(u), h(a.parentNode, "desc-".concat(r)), h(g.parentNode, "description-".concat(r))), h(a, "gslide-".concat(o)), h(t, "loaded"), "video" !== o) {
                                        if ("external" !== o) return "inline" === o ? (G.apply(this.instance, [t, s, this.index, v]), void(s.draggable && new V({
                                            dragEl: t.querySelector(".gslide-inline"),
                                            toleranceX: n.dragToleranceX,
                                            toleranceY: n.dragToleranceY,
                                            slide: t,
                                            instance: this.instance
                                        }))) : void("image" !== o ? T(v) && v() : j(t, s, this.index, (function () {
                                            var i = t.querySelector("img");
                                            s.draggable && new V({
                                                dragEl: i,
                                                toleranceX: n.dragToleranceX,
                                                toleranceY: n.dragToleranceY,
                                                slide: t,
                                                instance: e.instance
                                            }), s.zoomable && i.naturalWidth > i.offsetWidth && (h(i, "zoomable"), new H(i, t, (function () {
                                                e.instance.resize()
                                            }))), T(v) && v()
                                        })));
                                        Z.apply(this, [t, s, this.index, v])
                                    } else F.apply(this.instance, [t, s, this.index, v])
                                }
                            }, {
                                key: "slideShortDesc",
                                value: function (e) {
                                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 50,
                                        i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                                        n = document.createElement("div");
                                    n.innerHTML = e;
                                    var s = n.innerText,
                                        l = i;
                                    if ((e = s.trim()).length <= t) return e;
                                    var o = e.substr(0, t - 1);
                                    return l ? (n = null, o + '... <a href="#" class="desc-more">' + i + "</a>") : o
                                }
                            }, {
                                key: "descriptionEvents",
                                value: function (e, t) {
                                    var i = this,
                                        n = e.querySelector(".desc-more");
                                    if (!n) return !1;
                                    a("click", {
                                        onElement: n,
                                        withCallback: function (e, n) {
                                            e.preventDefault();
                                            var s = document.body,
                                                l = u(n, ".gslide-desc");
                                            if (!l) return !1;
                                            l.innerHTML = t.description, h(s, "gdesc-open");
                                            var o = a("click", {
                                                onElement: [s, u(l, ".gslide-description")],
                                                withCallback: function (e, n) {
                                                    "a" !== e.target.nodeName.toLowerCase() && (d(s, "gdesc-open"), h(s, "gdesc-closed"), l.innerHTML = t.smallDescription, i.descriptionEvents(l, t), setTimeout((function () {
                                                        d(s, "gdesc-closed")
                                                    }), 400), o.destroy())
                                                }
                                            })
                                        }
                                    })
                                }
                            }, {
                                key: "create",
                                value: function () {
                                    return m(this.instance.settings.slideHTML)
                                }
                            }, {
                                key: "getConfig",
                                value: function () {
                                    k(this.element) || this.element.hasOwnProperty("draggable") || (this.element.draggable = this.instance.settings.draggable);
                                    var e = new U(this.instance.settings.slideExtraAttributes);
                                    return this.slideConfig = e.parseConfig(this.element, this.instance.settings), this.slideConfig
                                }
                            }]), e
                        }(),
                        J = w(),
                        K = null !== w() || void 0 !== document.createTouch || "ontouchstart" in window || "onmsgesturechange" in window || navigator.msMaxTouchPoints,
                        Q = document.getElementsByTagName("html")[0],
                        ee = {
                            selector: ".glightbox",
                            elements: null,
                            skin: "clean",
                            theme: "clean",
                            closeButton: !0,
                            startAt: null,
                            autoplayVideos: !0,
                            autofocusVideos: !0,
                            descPosition: "bottom",
                            width: "900px",
                            height: "506px",
                            videosWidth: "960px",
                            beforeSlideChange: null,
                            afterSlideChange: null,
                            beforeSlideLoad: null,
                            afterSlideLoad: null,
                            slideInserted: null,
                            slideRemoved: null,
                            slideExtraAttributes: null,
                            onOpen: null,
                            onClose: null,
                            loop: !1,
                            zoomable: !0,
                            draggable: !0,
                            dragAutoSnap: !1,
                            dragToleranceX: 40,
                            dragToleranceY: 65,
                            preload: !0,
                            oneSlidePerOpen: !1,
                            touchNavigation: !0,
                            touchFollowAxis: !0,
                            keyboardNavigation: !0,
                            closeOnOutsideClick: !0,
                            plugins: !1,
                            plyr: {
                                css: "https://cdn.plyr.io/3.6.12/plyr.css",
                                js: "https://cdn.plyr.io/3.6.12/plyr.js",
                                config: {
                                    ratio: "16:9",
                                    fullscreen: {
                                        enabled: !0,
                                        iosNative: !0
                                    },
                                    youtube: {
                                        noCookie: !0,
                                        rel: 0,
                                        showinfo: 0,
                                        iv_load_policy: 3
                                    },
                                    vimeo: {
                                        byline: !1,
                                        portrait: !1,
                                        title: !1,
                                        transparent: !1
                                    }
                                }
                            },
                            openEffect: "zoom",
                            closeEffect: "zoom",
                            slideEffect: "slide",
                            moreText: "See more",
                            moreLength: 60,
                            cssEfects: {
                                fade: {
                                    in: "fadeIn",
                                    out: "fadeOut"
                                },
                                zoom: {
                                    in: "zoomIn",
                                    out: "zoomOut"
                                },
                                slide: {
                                    in: "slideInRight",
                                    out: "slideOutLeft"
                                },
                                slideBack: {
                                    in: "slideInLeft",
                                    out: "slideOutRight"
                                },
                                none: {
                                    in: "none",
                                    out: "none"
                                }
                            },
                            svg: {
                                close: '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"><g><g><path d="M505.943,6.058c-8.077-8.077-21.172-8.077-29.249,0L6.058,476.693c-8.077,8.077-8.077,21.172,0,29.249C10.096,509.982,15.39,512,20.683,512c5.293,0,10.586-2.019,14.625-6.059L505.943,35.306C514.019,27.23,514.019,14.135,505.943,6.058z"/></g></g><g><g><path d="M505.942,476.694L35.306,6.059c-8.076-8.077-21.172-8.077-29.248,0c-8.077,8.076-8.077,21.171,0,29.248l470.636,470.636c4.038,4.039,9.332,6.058,14.625,6.058c5.293,0,10.587-2.019,14.624-6.057C514.018,497.866,514.018,484.771,505.942,476.694z"/></g></g></svg>',
                                next: '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"> <g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g></svg>',
                                prev: '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g></svg>'
                            },
                            slideHTML: '<div class="gslide">\n    <div class="gslide-inner-content">\n        <div class="ginner-container">\n            <div class="gslide-media">\n            </div>\n            <div class="gslide-description">\n                <div class="gdesc-inner">\n                    <h4 class="gslide-title"></h4>\n                    <div class="gslide-desc"></div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>',
                            lightboxHTML: '<div id="glightbox-body" class="glightbox-container" tabindex="-1" role="dialog" aria-hidden="false">\n    <div class="gloader visible"></div>\n    <div class="goverlay"></div>\n    <div class="gcontainer">\n    <div id="glightbox-slider" class="gslider"></div>\n    <button class="gclose gbtn" aria-label="Close" data-taborder="3">{closeSVG}</button>\n    <button class="gprev gbtn" aria-label="Previous" data-taborder="2">{prevSVG}</button>\n    <button class="gnext gbtn" aria-label="Next" data-taborder="1">{nextSVG}</button>\n</div>\n</div>'
                        },
                        te = function () {
                            function e() {
                                var i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                                t(this, e), this.customOptions = i, this.settings = l(ee, i), this.effectsClasses = this.getAnimationClasses(), this.videoPlayers = {}, this.apiEvents = [], this.fullElementsList = !1
                            }
                            return n(e, [{
                                key: "init",
                                value: function () {
                                    var e = this,
                                        t = this.getSelector();
                                    t && (this.baseEvents = a("click", {
                                        onElement: t,
                                        withCallback: function (t, i) {
                                            t.preventDefault(), e.open(i)
                                        }
                                    })), this.elements = this.getElements()
                                }
                            }, {
                                key: "open",
                                value: function () {
                                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                                        t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null;
                                    if (0 === this.elements.length) return !1;
                                    this.activeSlide = null, this.prevActiveSlideIndex = null, this.prevActiveSlide = null;
                                    var i = M(t) ? t : this.settings.startAt;
                                    if (k(e)) {
                                        var n = e.getAttribute("data-gallery");
                                        n && (this.fullElementsList = this.elements, this.elements = this.getGalleryElements(this.elements, n)), I(i) && (i = this.getElementIndex(e)) < 0 && (i = 0)
                                    }
                                    M(i) || (i = 0), this.build(), g(this.overlay, "none" === this.settings.openEffect ? "none" : this.settings.cssEfects.fade.in);
                                    var s = document.body,
                                        l = window.innerWidth - document.documentElement.clientWidth;
                                    if (l > 0) {
                                        var o = document.createElement("style");
                                        o.type = "text/css", o.className = "gcss-styles", o.innerText = ".gscrollbar-fixer {margin-right: ".concat(l, "px}"), document.head.appendChild(o), h(s, "gscrollbar-fixer")
                                    }
                                    h(s, "glightbox-open"), h(Q, "glightbox-open"), J && (h(document.body, "glightbox-mobile"), this.settings.slideEffect = "slide"), this.showSlide(i, !0), 1 === this.elements.length ? (h(this.prevButton, "glightbox-button-hidden"), h(this.nextButton, "glightbox-button-hidden")) : (d(this.prevButton, "glightbox-button-hidden"), d(this.nextButton, "glightbox-button-hidden")), this.lightboxOpen = !0, this.trigger("open"), T(this.settings.onOpen) && this.settings.onOpen(), K && this.settings.touchNavigation && B(this), this.settings.keyboardNavigation && X(this)
                                }
                            }, {
                                key: "openAt",
                                value: function () {
                                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0;
                                    this.open(null, e)
                                }
                            }, {
                                key: "showSlide",
                                value: function () {
                                    var e = this,
                                        t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                                        i = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                                    f(this.loader), this.index = parseInt(t);
                                    var n = this.slidesContainer.querySelector(".current");
                                    n && d(n, "current"), this.slideAnimateOut();
                                    var s = this.slidesContainer.querySelectorAll(".gslide")[t];
                                    if (c(s, "loaded")) this.slideAnimateIn(s, i), p(this.loader);
                                    else {
                                        f(this.loader);
                                        var l = this.elements[t],
                                            o = {
                                                index: this.index,
                                                slide: s,
                                                slideNode: s,
                                                slideConfig: l.slideConfig,
                                                slideIndex: this.index,
                                                trigger: l.node,
                                                player: null
                                            };
                                        this.trigger("slide_before_load", o), l.instance.setContent(s, (function () {
                                            p(e.loader), e.resize(), e.slideAnimateIn(s, i), e.trigger("slide_after_load", o)
                                        }))
                                    }
                                    this.slideDescription = s.querySelector(".gslide-description"), this.slideDescriptionContained = this.slideDescription && c(this.slideDescription.parentNode, "gslide-media"), this.settings.preload && (this.preloadSlide(t + 1), this.preloadSlide(t - 1)), this.updateNavigationClasses(), this.activeSlide = s
                                }
                            }, {
                                key: "preloadSlide",
                                value: function (e) {
                                    var t = this;
                                    if (e < 0 || e > this.elements.length - 1) return !1;
                                    if (I(this.elements[e])) return !1;
                                    var i = this.slidesContainer.querySelectorAll(".gslide")[e];
                                    if (c(i, "loaded")) return !1;
                                    var n = this.elements[e],
                                        s = n.type,
                                        l = {
                                            index: e,
                                            slide: i,
                                            slideNode: i,
                                            slideConfig: n.slideConfig,
                                            slideIndex: e,
                                            trigger: n.node,
                                            player: null
                                        };
                                    this.trigger("slide_before_load", l), "video" === s || "external" === s ? setTimeout((function () {
                                        n.instance.setContent(i, (function () {
                                            t.trigger("slide_after_load", l)
                                        }))
                                    }), 200) : n.instance.setContent(i, (function () {
                                        t.trigger("slide_after_load", l)
                                    }))
                                }
                            }, {
                                key: "prevSlide",
                                value: function () {
                                    this.goToSlide(this.index - 1)
                                }
                            }, {
                                key: "nextSlide",
                                value: function () {
                                    this.goToSlide(this.index + 1)
                                }
                            }, {
                                key: "goToSlide",
                                value: function () {
                                    var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                                    if (this.prevActiveSlide = this.activeSlide, this.prevActiveSlideIndex = this.index, !this.loop() && (e < 0 || e > this.elements.length - 1)) return !1;
                                    e < 0 ? e = this.elements.length - 1 : e >= this.elements.length && (e = 0), this.showSlide(e)
                                }
                            }, {
                                key: "insertSlide",
                                value: function () {
                                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                        t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : -1;
                                    t < 0 && (t = this.elements.length);
                                    var i = new $(e, this, t),
                                        n = i.getConfig(),
                                        s = l({}, n),
                                        o = i.create(),
                                        r = this.elements.length - 1;
                                    s.index = t, s.node = !1, s.instance = i, s.slideConfig = n, this.elements.splice(t, 0, s);
                                    var a = null,
                                        h = null;
                                    if (this.slidesContainer) {
                                        if (t > r) this.slidesContainer.appendChild(o);
                                        else {
                                            var d = this.slidesContainer.querySelectorAll(".gslide")[t];
                                            this.slidesContainer.insertBefore(o, d)
                                        }(this.settings.preload && 0 == this.index && 0 == t || this.index - 1 == t || this.index + 1 == t) && this.preloadSlide(t), 0 === this.index && 0 === t && (this.index = 1), this.updateNavigationClasses(), a = this.slidesContainer.querySelectorAll(".gslide")[t], h = this.getSlidePlayerInstance(t), s.slideNode = a
                                    }
                                    this.trigger("slide_inserted", {
                                        index: t,
                                        slide: a,
                                        slideNode: a,
                                        slideConfig: n,
                                        slideIndex: t,
                                        trigger: null,
                                        player: h
                                    }), T(this.settings.slideInserted) && this.settings.slideInserted({
                                        index: t,
                                        slide: a,
                                        player: h
                                    })
                                }
                            }, {
                                key: "removeSlide",
                                value: function () {
                                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : -1;
                                    if (e < 0 || e > this.elements.length - 1) return !1;
                                    var t = this.slidesContainer && this.slidesContainer.querySelectorAll(".gslide")[e];
                                    t && (this.getActiveSlideIndex() == e && (e == this.elements.length - 1 ? this.prevSlide() : this.nextSlide()), t.parentNode.removeChild(t)), this.elements.splice(e, 1), this.trigger("slide_removed", e), T(this.settings.slideRemoved) && this.settings.slideRemoved(e)
                                }
                            }, {
                                key: "slideAnimateIn",
                                value: function (e, t) {
                                    var i = this,
                                        n = e.querySelector(".gslide-media"),
                                        s = e.querySelector(".gslide-description"),
                                        l = {
                                            index: this.prevActiveSlideIndex,
                                            slide: this.prevActiveSlide,
                                            slideNode: this.prevActiveSlide,
                                            slideIndex: this.prevActiveSlide,
                                            slideConfig: I(this.prevActiveSlideIndex) ? null : this.elements[this.prevActiveSlideIndex].slideConfig,
                                            trigger: I(this.prevActiveSlideIndex) ? null : this.elements[this.prevActiveSlideIndex].node,
                                            player: this.getSlidePlayerInstance(this.prevActiveSlideIndex)
                                        },
                                        o = {
                                            index: this.index,
                                            slide: this.activeSlide,
                                            slideNode: this.activeSlide,
                                            slideConfig: this.elements[this.index].slideConfig,
                                            slideIndex: this.index,
                                            trigger: this.elements[this.index].node,
                                            player: this.getSlidePlayerInstance(this.index)
                                        };
                                    if (n.offsetWidth > 0 && s && (p(s), s.style.display = ""), d(e, this.effectsClasses), t) g(e, this.settings.cssEfects[this.settings.openEffect].in, (function () {
                                        i.settings.autoplayVideos && i.slidePlayerPlay(e), i.trigger("slide_changed", {
                                            prev: l,
                                            current: o
                                        }), T(i.settings.afterSlideChange) && i.settings.afterSlideChange.apply(i, [l, o])
                                    }));
                                    else {
                                        var r = this.settings.slideEffect,
                                            a = "none" !== r ? this.settings.cssEfects[r].in : r;
                                        this.prevActiveSlideIndex > this.index && "slide" == this.settings.slideEffect && (a = this.settings.cssEfects.slideBack.in), g(e, a, (function () {
                                            i.settings.autoplayVideos && i.slidePlayerPlay(e), i.trigger("slide_changed", {
                                                prev: l,
                                                current: o
                                            }), T(i.settings.afterSlideChange) && i.settings.afterSlideChange.apply(i, [l, o])
                                        }))
                                    }
                                    setTimeout((function () {
                                        i.resize(e)
                                    }), 100), h(e, "current")
                                }
                            }, {
                                key: "slideAnimateOut",
                                value: function () {
                                    if (!this.prevActiveSlide) return !1;
                                    var e = this.prevActiveSlide;
                                    d(e, this.effectsClasses), h(e, "prev");
                                    var t = this.settings.slideEffect,
                                        i = "none" !== t ? this.settings.cssEfects[t].out : t;
                                    this.slidePlayerPause(e), this.trigger("slide_before_change", {
                                        prev: {
                                            index: this.prevActiveSlideIndex,
                                            slide: this.prevActiveSlide,
                                            slideNode: this.prevActiveSlide,
                                            slideIndex: this.prevActiveSlideIndex,
                                            slideConfig: I(this.prevActiveSlideIndex) ? null : this.elements[this.prevActiveSlideIndex].slideConfig,
                                            trigger: I(this.prevActiveSlideIndex) ? null : this.elements[this.prevActiveSlideIndex].node,
                                            player: this.getSlidePlayerInstance(this.prevActiveSlideIndex)
                                        },
                                        current: {
                                            index: this.index,
                                            slide: this.activeSlide,
                                            slideNode: this.activeSlide,
                                            slideIndex: this.index,
                                            slideConfig: this.elements[this.index].slideConfig,
                                            trigger: this.elements[this.index].node,
                                            player: this.getSlidePlayerInstance(this.index)
                                        }
                                    }), T(this.settings.beforeSlideChange) && this.settings.beforeSlideChange.apply(this, [{
                                        index: this.prevActiveSlideIndex,
                                        slide: this.prevActiveSlide,
                                        player: this.getSlidePlayerInstance(this.prevActiveSlideIndex)
                                    }, {
                                        index: this.index,
                                        slide: this.activeSlide,
                                        player: this.getSlidePlayerInstance(this.index)
                                    }]), this.prevActiveSlideIndex > this.index && "slide" == this.settings.slideEffect && (i = this.settings.cssEfects.slideBack.out), g(e, i, (function () {
                                        var t = e.querySelector(".ginner-container"),
                                            i = e.querySelector(".gslide-media"),
                                            n = e.querySelector(".gslide-description");
                                        t.style.transform = "", i.style.transform = "", d(i, "greset"), i.style.opacity = "", n && (n.style.opacity = ""), d(e, "prev")
                                    }))
                                }
                            }, {
                                key: "getAllPlayers",
                                value: function () {
                                    return this.videoPlayers
                                }
                            }, {
                                key: "getSlidePlayerInstance",
                                value: function (e) {
                                    var t = "gvideo" + e,
                                        i = this.getAllPlayers();
                                    return !(!O(i, t) || !i[t]) && i[t]
                                }
                            }, {
                                key: "stopSlideVideo",
                                value: function (e) {
                                    if (k(e)) {
                                        var t = e.querySelector(".gvideo-wrapper");
                                        t && (e = t.getAttribute("data-index"))
                                    }
                                    console.log("stopSlideVideo is deprecated, use slidePlayerPause");
                                    var i = this.getSlidePlayerInstance(e);
                                    i && i.playing && i.pause()
                                }
                            }, {
                                key: "slidePlayerPause",
                                value: function (e) {
                                    if (k(e)) {
                                        var t = e.querySelector(".gvideo-wrapper");
                                        t && (e = t.getAttribute("data-index"))
                                    }
                                    var i = this.getSlidePlayerInstance(e);
                                    i && i.playing && i.pause()
                                }
                            }, {
                                key: "playSlideVideo",
                                value: function (e) {
                                    if (k(e)) {
                                        var t = e.querySelector(".gvideo-wrapper");
                                        t && (e = t.getAttribute("data-index"))
                                    }
                                    console.log("playSlideVideo is deprecated, use slidePlayerPlay");
                                    var i = this.getSlidePlayerInstance(e);
                                    i && !i.playing && i.play()
                                }
                            }, {
                                key: "slidePlayerPlay",
                                value: function (e) {
                                    var t;
                                    if (!J || null !== (t = this.settings.plyr.config) && void 0 !== t && t.muted) {
                                        if (k(e)) {
                                            var i = e.querySelector(".gvideo-wrapper");
                                            i && (e = i.getAttribute("data-index"))
                                        }
                                        var n = this.getSlidePlayerInstance(e);
                                        n && !n.playing && (n.play(), this.settings.autofocusVideos && n.elements.container.focus())
                                    }
                                }
                            }, {
                                key: "setElements",
                                value: function (e) {
                                    var t = this;
                                    this.settings.elements = !1;
                                    var i = [];
                                    e && e.length && o(e, (function (e, n) {
                                        var s = new $(e, t, n),
                                            o = s.getConfig(),
                                            r = l({}, o);
                                        r.slideConfig = o, r.instance = s, r.index = n, i.push(r)
                                    })), this.elements = i, this.lightboxOpen && (this.slidesContainer.innerHTML = "", this.elements.length && (o(this.elements, (function () {
                                        var e = m(t.settings.slideHTML);
                                        t.slidesContainer.appendChild(e)
                                    })), this.showSlide(0, !0)))
                                }
                            }, {
                                key: "getElementIndex",
                                value: function (e) {
                                    var t = !1;
                                    return o(this.elements, (function (i, n) {
                                        if (O(i, "node") && i.node == e) return t = n, !0
                                    })), t
                                }
                            }, {
                                key: "getElements",
                                value: function () {
                                    var e = this,
                                        t = [];
                                    this.elements = this.elements ? this.elements : [], !I(this.settings.elements) && E(this.settings.elements) && this.settings.elements.length && o(this.settings.elements, (function (i, n) {
                                        var s = new $(i, e, n),
                                            o = s.getConfig(),
                                            r = l({}, o);
                                        r.node = !1, r.index = n, r.instance = s, r.slideConfig = o, t.push(r)
                                    }));
                                    var i = !1;
                                    return this.getSelector() && (i = document.querySelectorAll(this.getSelector())), i ? (o(i, (function (i, n) {
                                        var s = new $(i, e, n),
                                            o = s.getConfig(),
                                            r = l({}, o);
                                        r.node = i, r.index = n, r.instance = s, r.slideConfig = o, r.gallery = i.getAttribute("data-gallery"), t.push(r)
                                    })), t) : t
                                }
                            }, {
                                key: "getGalleryElements",
                                value: function (e, t) {
                                    return e.filter((function (e) {
                                        return e.gallery == t
                                    }))
                                }
                            }, {
                                key: "getSelector",
                                value: function () {
                                    return !this.settings.elements && (this.settings.selector && "data-" == this.settings.selector.substring(0, 5) ? "*[".concat(this.settings.selector, "]") : this.settings.selector)
                                }
                            }, {
                                key: "getActiveSlide",
                                value: function () {
                                    return this.slidesContainer.querySelectorAll(".gslide")[this.index]
                                }
                            }, {
                                key: "getActiveSlideIndex",
                                value: function () {
                                    return this.index
                                }
                            }, {
                                key: "getAnimationClasses",
                                value: function () {
                                    var e = [];
                                    for (var t in this.settings.cssEfects)
                                        if (this.settings.cssEfects.hasOwnProperty(t)) {
                                            var i = this.settings.cssEfects[t];
                                            e.push("g".concat(i.in)), e.push("g".concat(i.out))
                                        } return e.join(" ")
                                }
                            }, {
                                key: "build",
                                value: function () {
                                    var e = this;
                                    if (this.built) return !1;
                                    var t = document.body.childNodes,
                                        i = [];
                                    o(t, (function (e) {
                                        e.parentNode == document.body && "#" !== e.nodeName.charAt(0) && e.hasAttribute && !e.hasAttribute("aria-hidden") && (i.push(e), e.setAttribute("aria-hidden", "true"))
                                    }));
                                    var n = O(this.settings.svg, "next") ? this.settings.svg.next : "",
                                        s = O(this.settings.svg, "prev") ? this.settings.svg.prev : "",
                                        l = O(this.settings.svg, "close") ? this.settings.svg.close : "",
                                        r = this.settings.lightboxHTML;
                                    r = m(r = (r = (r = r.replace(/{nextSVG}/g, n)).replace(/{prevSVG}/g, s)).replace(/{closeSVG}/g, l)), document.body.appendChild(r);
                                    var d = document.getElementById("glightbox-body");
                                    this.modal = d;
                                    var g = d.querySelector(".gclose");
                                    this.prevButton = d.querySelector(".gprev"), this.nextButton = d.querySelector(".gnext"), this.overlay = d.querySelector(".goverlay"), this.loader = d.querySelector(".gloader"), this.slidesContainer = document.getElementById("glightbox-slider"), this.bodyHiddenChildElms = i, this.events = {}, h(this.modal, "glightbox-" + this.settings.skin), this.settings.closeButton && g && (this.events.close = a("click", {
                                        onElement: g,
                                        withCallback: function (t, i) {
                                            t.preventDefault(), e.close()
                                        }
                                    })), g && !this.settings.closeButton && g.parentNode.removeChild(g), this.nextButton && (this.events.next = a("click", {
                                        onElement: this.nextButton,
                                        withCallback: function (t, i) {
                                            t.preventDefault(), e.nextSlide()
                                        }
                                    })), this.prevButton && (this.events.prev = a("click", {
                                        onElement: this.prevButton,
                                        withCallback: function (t, i) {
                                            t.preventDefault(), e.prevSlide()
                                        }
                                    })), this.settings.closeOnOutsideClick && (this.events.outClose = a("click", {
                                        onElement: d,
                                        withCallback: function (t, i) {
                                            e.preventOutsideClick || c(document.body, "glightbox-mobile") || u(t.target, ".ginner-container") || u(t.target, ".gbtn") || c(t.target, "gnext") || c(t.target, "gprev") || e.close()
                                        }
                                    })), o(this.elements, (function (t, i) {
                                        e.slidesContainer.appendChild(t.instance.create()), t.slideNode = e.slidesContainer.querySelectorAll(".gslide")[i]
                                    })), K && h(document.body, "glightbox-touch"), this.events.resize = a("resize", {
                                        onElement: window,
                                        withCallback: function () {
                                            e.resize()
                                        }
                                    }), this.built = !0
                                }
                            }, {
                                key: "resize",
                                value: function () {
                                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null;
                                    if ((e = e || this.activeSlide) && !c(e, "zoomed")) {
                                        var t = y(),
                                            i = e.querySelector(".gvideo-wrapper"),
                                            n = e.querySelector(".gslide-image"),
                                            s = this.slideDescription,
                                            l = t.width,
                                            o = t.height;
                                        if (l <= 768 ? h(document.body, "glightbox-mobile") : d(document.body, "glightbox-mobile"), i || n) {
                                            var r = !1;
                                            if (s && (c(s, "description-bottom") || c(s, "description-top")) && !c(s, "gabsolute") && (r = !0), n)
                                                if (l <= 768) n.querySelector("img");
                                                else if (r) {
                                                var a = s.offsetHeight,
                                                    u = n.querySelector("img");
                                                u.setAttribute("style", "max-height: calc(100vh - ".concat(a, "px)")), s.setAttribute("style", "max-width: ".concat(u.offsetWidth, "px;"))
                                            }
                                            if (i) {
                                                var g = O(this.settings.plyr.config, "ratio") ? this.settings.plyr.config.ratio : "";
                                                if (!g) {
                                                    var v = i.clientWidth,
                                                        f = i.clientHeight,
                                                        p = v / f;
                                                    g = "".concat(v / p, ":").concat(f / p)
                                                }
                                                var m = g.split(":"),
                                                    x = this.settings.videosWidth,
                                                    b = this.settings.videosWidth,
                                                    S = (b = M(x) || -1 !== x.indexOf("px") ? parseInt(x) : -1 !== x.indexOf("vw") ? l * parseInt(x) / 100 : -1 !== x.indexOf("vh") ? o * parseInt(x) / 100 : -1 !== x.indexOf("%") ? l * parseInt(x) / 100 : parseInt(i.clientWidth)) / (parseInt(m[0]) / parseInt(m[1]));
                                                if (S = Math.floor(S), r && (o -= s.offsetHeight), b > l || S > o || o < S && l > b) {
                                                    var w = i.offsetWidth,
                                                        T = i.offsetHeight,
                                                        C = o / T,
                                                        k = {
                                                            width: w * C,
                                                            height: T * C
                                                        };
                                                    i.parentNode.setAttribute("style", "max-width: ".concat(k.width, "px")), r && s.setAttribute("style", "max-width: ".concat(k.width, "px;"))
                                                } else i.parentNode.style.maxWidth = "".concat(x), r && s.setAttribute("style", "max-width: ".concat(x, ";"))
                                            }
                                        }
                                    }
                                }
                            }, {
                                key: "reload",
                                value: function () {
                                    this.init()
                                }
                            }, {
                                key: "updateNavigationClasses",
                                value: function () {
                                    var e = this.loop();
                                    d(this.nextButton, "disabled"), d(this.prevButton, "disabled"), 0 == this.index && this.elements.length - 1 == 0 ? (h(this.prevButton, "disabled"), h(this.nextButton, "disabled")) : 0 !== this.index || e ? this.index !== this.elements.length - 1 || e || h(this.nextButton, "disabled") : h(this.prevButton, "disabled")
                                }
                            }, {
                                key: "loop",
                                value: function () {
                                    var e = O(this.settings, "loopAtEnd") ? this.settings.loopAtEnd : null;
                                    return e = O(this.settings, "loop") ? this.settings.loop : e, e
                                }
                            }, {
                                key: "close",
                                value: function () {
                                    var e = this;
                                    if (!this.lightboxOpen) {
                                        if (this.events) {
                                            for (var t in this.events) this.events.hasOwnProperty(t) && this.events[t].destroy();
                                            this.events = null
                                        }
                                        return !1
                                    }
                                    if (this.closing) return !1;
                                    this.closing = !0, this.slidePlayerPause(this.activeSlide), this.fullElementsList && (this.elements = this.fullElementsList), this.bodyHiddenChildElms.length && o(this.bodyHiddenChildElms, (function (e) {
                                        e.removeAttribute("aria-hidden")
                                    })), h(this.modal, "glightbox-closing"), g(this.overlay, "none" == this.settings.openEffect ? "none" : this.settings.cssEfects.fade.out), g(this.activeSlide, this.settings.cssEfects[this.settings.closeEffect].out, (function () {
                                        if (e.activeSlide = null, e.prevActiveSlideIndex = null, e.prevActiveSlide = null, e.built = !1, e.events) {
                                            for (var t in e.events) e.events.hasOwnProperty(t) && e.events[t].destroy();
                                            e.events = null
                                        }
                                        var i = document.body;
                                        d(Q, "glightbox-open"), d(i, "glightbox-open touching gdesc-open glightbox-touch glightbox-mobile gscrollbar-fixer"), e.modal.parentNode.removeChild(e.modal), e.trigger("close"), T(e.settings.onClose) && e.settings.onClose();
                                        var n = document.querySelector(".gcss-styles");
                                        n && n.parentNode.removeChild(n), e.lightboxOpen = !1, e.closing = null
                                    }))
                                }
                            }, {
                                key: "destroy",
                                value: function () {
                                    this.close(), this.clearAllEvents(), this.baseEvents && this.baseEvents.destroy()
                                }
                            }, {
                                key: "on",
                                value: function (e, t) {
                                    var i = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                                    if (!e || !T(t)) throw new TypeError("Event name and callback must be defined");
                                    this.apiEvents.push({
                                        evt: e,
                                        once: i,
                                        callback: t
                                    })
                                }
                            }, {
                                key: "once",
                                value: function (e, t) {
                                    this.on(e, t, !0)
                                }
                            }, {
                                key: "trigger",
                                value: function (e) {
                                    var t = this,
                                        i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                                        n = [];
                                    o(this.apiEvents, (function (t, s) {
                                        var l = t.evt,
                                            o = t.once,
                                            r = t.callback;
                                        l == e && (r(i), o && n.push(s))
                                    })), n.length && o(n, (function (e) {
                                        return t.apiEvents.splice(e, 1)
                                    }))
                                }
                            }, {
                                key: "clearAllEvents",
                                value: function () {
                                    this.apiEvents.splice(0, this.apiEvents.length)
                                }
                            }, {
                                key: "version",
                                value: function () {
                                    return "3.1.0"
                                }
                            }]), e
                        }();
                    return function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = new te(e);
                        return t.init(), t
                    }
                }));

                /***/
            }),

        /***/
        "./node_modules/shufflejs/dist/shuffle.esm.js":
            /*!****************************************************!*\
              !*** ./node_modules/shufflejs/dist/shuffle.esm.js ***!
              \****************************************************/
            /***/
            ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

                "use strict";
                __webpack_require__.r(__webpack_exports__);
                /* harmony export */
                __webpack_require__.d(__webpack_exports__, {
                    /* harmony export */
                    "default": () => ( /* binding */ Shuffle)
                    /* harmony export */
                });
                var tinyEmitter = {
                    exports: {}
                };

                function E() { // Keep this empty so it's easier to inherit from
                    // (via https://github.com/lipsmack from https://github.com/scottcorgan/tiny-emitter/issues/3)
                }

                E.prototype = {
                    on: function (name, callback, ctx) {
                        var e = this.e || (this.e = {});
                        (e[name] || (e[name] = [])).push({
                            fn: callback,
                            ctx: ctx
                        });
                        return this;
                    },
                    once: function (name, callback, ctx) {
                        var self = this;

                        function listener() {
                            self.off(name, listener);
                            callback.apply(ctx, arguments);
                        }
                        listener._ = callback;
                        return this.on(name, listener, ctx);
                    },
                    emit: function (name) {
                        var data = [].slice.call(arguments, 1);
                        var evtArr = ((this.e || (this.e = {}))[name] || []).slice();
                        var i = 0;
                        var len = evtArr.length;

                        for (i; i < len; i++) {
                            evtArr[i].fn.apply(evtArr[i].ctx, data);
                        }

                        return this;
                    },
                    off: function (name, callback) {
                        var e = this.e || (this.e = {});
                        var evts = e[name];
                        var liveEvents = [];

                        if (evts && callback) {
                            for (var i = 0, len = evts.length; i < len; i++) {
                                if (evts[i].fn !== callback && evts[i].fn._ !== callback) liveEvents.push(evts[i]);
                            }
                        } // Remove event from queue to prevent memory leak
                        // Suggested by https://github.com/lazd
                        // Ref: https://github.com/scottcorgan/tiny-emitter/commit/c6ebfaa9bc973b33d110a84a307742b7cf94c953#commitcomment-5024910


                        liveEvents.length ? e[name] = liveEvents : delete e[name];
                        return this;
                    }
                };
                tinyEmitter.exports = E;
                tinyEmitter.exports.TinyEmitter = E;

                var arrayParallel = function parallel(fns, context, callback) {
                    if (!callback) {
                        if (typeof context === 'function') {
                            callback = context;
                            context = null;
                        } else {
                            callback = noop;
                        }
                    }

                    var pending = fns && fns.length;
                    if (!pending) return callback(null, []);
                    var finished = false;
                    var results = new Array(pending);
                    fns.forEach(context ? function (fn, i) {
                        fn.call(context, maybeDone(i));
                    } : function (fn, i) {
                        fn(maybeDone(i));
                    });

                    function maybeDone(i) {
                        return function (err, result) {
                            if (finished) return;

                            if (err) {
                                callback(err, results);
                                finished = true;
                                return;
                            }

                            results[i] = result;
                            if (!--pending) callback(null, results);
                        };
                    }
                };

                function noop() {}

                /**
                 * Always returns a numeric value, given a value. Logic from jQuery's `isNumeric`.
                 * @param {*} value Possibly numeric value.
                 * @return {number} `value` or zero if `value` isn't numeric.
                 */
                function getNumber(value) {
                    return parseFloat(value) || 0;
                }

                class Point {
                    /**
                     * Represents a coordinate pair.
                     * @param {number} [x=0] X.
                     * @param {number} [y=0] Y.
                     */
                    constructor(x, y) {
                        this.x = getNumber(x);
                        this.y = getNumber(y);
                    }
                    /**
                     * Whether two points are equal.
                     * @param {Point} a Point A.
                     * @param {Point} b Point B.
                     * @return {boolean}
                     */


                    static equals(a, b) {
                        return a.x === b.x && a.y === b.y;
                    }

                }

                class Rect {
                    /**
                     * Class for representing rectangular regions.
                     * https://github.com/google/closure-library/blob/master/closure/goog/math/rect.js
                     * @param {number} x Left.
                     * @param {number} y Top.
                     * @param {number} w Width.
                     * @param {number} h Height.
                     * @param {number} id Identifier
                     * @constructor
                     */
                    constructor(x, y, w, h, id) {
                        this.id = id;
                        /** @type {number} */

                        this.left = x;
                        /** @type {number} */

                        this.top = y;
                        /** @type {number} */

                        this.width = w;
                        /** @type {number} */

                        this.height = h;
                    }
                    /**
                     * Returns whether two rectangles intersect.
                     * @param {Rect} a A Rectangle.
                     * @param {Rect} b A Rectangle.
                     * @return {boolean} Whether a and b intersect.
                     */


                    static intersects(a, b) {
                        return a.left < b.left + b.width && b.left < a.left + a.width && a.top < b.top + b.height && b.top < a.top + a.height;
                    }

                }

                var Classes = {
                    BASE: 'shuffle',
                    SHUFFLE_ITEM: 'shuffle-item',
                    VISIBLE: 'shuffle-item--visible',
                    HIDDEN: 'shuffle-item--hidden'
                };

                let id$1 = 0;

                class ShuffleItem {
                    constructor(element, isRTL) {
                        id$1 += 1;
                        this.id = id$1;
                        this.element = element;
                        /**
                         * Set correct direction of item
                         */

                        this.isRTL = isRTL;
                        /**
                         * Used to separate items for layout and shrink.
                         */

                        this.isVisible = true;
                        /**
                         * Used to determine if a transition will happen. By the time the _layout
                         * and _shrink methods get the ShuffleItem instances, the `isVisible` value
                         * has already been changed by the separation methods, so this property is
                         * needed to know if the item was visible/hidden before the shrink/layout.
                         */

                        this.isHidden = false;
                    }

                    show() {
                        this.isVisible = true;
                        this.element.classList.remove(Classes.HIDDEN);
                        this.element.classList.add(Classes.VISIBLE);
                        this.element.removeAttribute('aria-hidden');
                    }

                    hide() {
                        this.isVisible = false;
                        this.element.classList.remove(Classes.VISIBLE);
                        this.element.classList.add(Classes.HIDDEN);
                        this.element.setAttribute('aria-hidden', true);
                    }

                    init() {
                        this.addClasses([Classes.SHUFFLE_ITEM, Classes.VISIBLE]);
                        this.applyCss(ShuffleItem.Css.INITIAL);
                        this.applyCss(this.isRTL ? ShuffleItem.Css.DIRECTION.rtl : ShuffleItem.Css.DIRECTION.ltr);
                        this.scale = ShuffleItem.Scale.VISIBLE;
                        this.point = new Point();
                    }

                    addClasses(classes) {
                        classes.forEach(className => {
                            this.element.classList.add(className);
                        });
                    }

                    removeClasses(classes) {
                        classes.forEach(className => {
                            this.element.classList.remove(className);
                        });
                    }

                    applyCss(obj) {
                        Object.keys(obj).forEach(key => {
                            this.element.style[key] = obj[key];
                        });
                    }

                    dispose() {
                        this.removeClasses([Classes.HIDDEN, Classes.VISIBLE, Classes.SHUFFLE_ITEM]);
                        this.element.removeAttribute('style');
                        this.element = null;
                    }

                }

                ShuffleItem.Css = {
                    INITIAL: {
                        position: 'absolute',
                        top: 0,
                        visibility: 'visible',
                        willChange: 'transform'
                    },
                    DIRECTION: {
                        ltr: {
                            left: 0
                        },
                        rtl: {
                            right: 0
                        }
                    },
                    VISIBLE: {
                        before: {
                            opacity: 1,
                            visibility: 'visible'
                        },
                        after: {
                            transitionDelay: ''
                        }
                    },
                    HIDDEN: {
                        before: {
                            opacity: 0
                        },
                        after: {
                            visibility: 'hidden',
                            transitionDelay: ''
                        }
                    }
                };
                ShuffleItem.Scale = {
                    VISIBLE: 1,
                    HIDDEN: 0.001
                };

                let value = null;
                var testComputedSize = (() => {
                    if (value !== null) {
                        return value;
                    }

                    const element = document.body || document.documentElement;
                    const e = document.createElement('div');
                    e.style.cssText = 'width:10px;padding:2px;box-sizing:border-box;';
                    element.appendChild(e);
                    const {
                        width
                    } = window.getComputedStyle(e, null); // Fix for issue #314

                    value = Math.round(getNumber(width)) === 10;
                    element.removeChild(e);
                    return value;
                });

                /**
                 * Retrieve the computed style for an element, parsed as a float.
                 * @param {Element} element Element to get style for.
                 * @param {string} style Style property.
                 * @param {CSSStyleDeclaration} [styles] Optionally include clean styles to
                 *     use instead of asking for them again.
                 * @return {number} The parsed computed value or zero if that fails because IE
                 *     will return 'auto' when the element doesn't have margins instead of
                 *     the computed style.
                 */

                function getNumberStyle(element, style) {
                    let styles = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : window.getComputedStyle(element, null);
                    let value = getNumber(styles[style]); // Support IE<=11 and W3C spec.

                    if (!testComputedSize() && style === 'width') {
                        value += getNumber(styles.paddingLeft) + getNumber(styles.paddingRight) + getNumber(styles.borderLeftWidth) + getNumber(styles.borderRightWidth);
                    } else if (!testComputedSize() && style === 'height') {
                        value += getNumber(styles.paddingTop) + getNumber(styles.paddingBottom) + getNumber(styles.borderTopWidth) + getNumber(styles.borderBottomWidth);
                    }

                    return value;
                }

                /**
                 * Fisher-Yates shuffle.
                 * http://stackoverflow.com/a/962890/373422
                 * https://bost.ocks.org/mike/shuffle/
                 * @param {Array} array Array to shuffle.
                 * @return {Array} Randomly sorted array.
                 */
                function randomize(array) {
                    let n = array.length;

                    while (n) {
                        n -= 1;
                        const i = Math.floor(Math.random() * (n + 1));
                        const temp = array[i];
                        array[i] = array[n];
                        array[n] = temp;
                    }

                    return array;
                }

                const defaults = {
                    // Use array.reverse() to reverse the results
                    reverse: false,
                    // Sorting function
                    by: null,
                    // Custom sort function
                    compare: null,
                    // If true, this will skip the sorting and return a randomized order in the array
                    randomize: false,
                    // Determines which property of each item in the array is passed to the
                    // sorting method.
                    key: 'element'
                };
                /**
                 * You can return `undefined` from the `by` function to revert to DOM order.
                 * @param {Array<T>} arr Array to sort.
                 * @param {SortOptions} options Sorting options.
                 * @return {Array<T>}
                 */

                function sorter(arr, options) {
                    const opts = {
                        ...defaults,
                        ...options
                    };
                    const original = Array.from(arr);
                    let revert = false;

                    if (!arr.length) {
                        return [];
                    }

                    if (opts.randomize) {
                        return randomize(arr);
                    } // Sort the elements by the opts.by function.
                    // If we don't have opts.by, default to DOM order


                    if (typeof opts.by === 'function') {
                        arr.sort((a, b) => {
                            // Exit early if we already know we want to revert
                            if (revert) {
                                return 0;
                            }

                            const valA = opts.by(a[opts.key]);
                            const valB = opts.by(b[opts.key]); // If both values are undefined, use the DOM order

                            if (valA === undefined && valB === undefined) {
                                revert = true;
                                return 0;
                            }

                            if (valA < valB || valA === 'sortFirst' || valB === 'sortLast') {
                                return -1;
                            }

                            if (valA > valB || valA === 'sortLast' || valB === 'sortFirst') {
                                return 1;
                            }

                            return 0;
                        });
                    } else if (typeof opts.compare === 'function') {
                        arr.sort(opts.compare);
                    } // Revert to the original array if necessary


                    if (revert) {
                        return original;
                    }

                    if (opts.reverse) {
                        arr.reverse();
                    }

                    return arr;
                }

                const transitions = {};
                const eventName = 'transitionend';
                let count = 0;

                function uniqueId() {
                    count += 1;
                    return eventName + count;
                }

                function cancelTransitionEnd(id) {
                    if (transitions[id]) {
                        transitions[id].element.removeEventListener(eventName, transitions[id].listener);
                        transitions[id] = null;
                        return true;
                    }

                    return false;
                }

                function onTransitionEnd(element, callback) {
                    const id = uniqueId();

                    const listener = evt => {
                        if (evt.currentTarget === evt.target) {
                            cancelTransitionEnd(id);
                            callback(evt);
                        }
                    };

                    element.addEventListener(eventName, listener);
                    transitions[id] = {
                        element,
                        listener
                    };
                    return id;
                }

                function arrayMax(array) {
                    return Math.max(...array);
                }

                function arrayMin(array) {
                    return Math.min(...array);
                }

                /**
                 * Determine the number of columns an items spans.
                 * @param {number} itemWidth Width of the item.
                 * @param {number} columnWidth Width of the column (includes gutter).
                 * @param {number} columns Total number of columns
                 * @param {number} threshold A buffer value for the size of the column to fit.
                 * @return {number}
                 */

                function getColumnSpan(itemWidth, columnWidth, columns, threshold) {
                    let columnSpan = itemWidth / columnWidth; // If the difference between the rounded column span number and the
                    // calculated column span number is really small, round the number to
                    // make it fit.

                    if (Math.abs(Math.round(columnSpan) - columnSpan) < threshold) {
                        // e.g. columnSpan = 4.0089945390298745
                        columnSpan = Math.round(columnSpan);
                    } // Ensure the column span is not more than the amount of columns in the whole layout.


                    return Math.min(Math.ceil(columnSpan), columns);
                }
                /**
                 * Retrieves the column set to use for placement.
                 * @param {number} columnSpan The number of columns this current item spans.
                 * @param {number} columns The total columns in the grid.
                 * @return {Array.<number>} An array of numbers represeting the column set.
                 */

                function getAvailablePositions(positions, columnSpan, columns) {
                    // The item spans only one column.
                    if (columnSpan === 1) {
                        return positions;
                    } // The item spans more than one column, figure out how many different
                    // places it could fit horizontally.
                    // The group count is the number of places within the positions this block
                    // could fit, ignoring the current positions of items.
                    // Imagine a 2 column brick as the second item in a 4 column grid with
                    // 10px height each. Find the places it would fit:
                    // [20, 10, 10, 0]
                    //  |   |   |
                    //  *   *   *
                    //
                    // Then take the places which fit and get the bigger of the two:
                    // max([20, 10]), max([10, 10]), max([10, 0]) = [20, 10, 10]
                    //
                    // Next, find the first smallest number (the short column).
                    // [20, 10, 10]
                    //      |
                    //      *
                    //
                    // And that's where it should be placed!
                    //
                    // Another example where the second column's item extends past the first:
                    // [10, 20, 10, 0] => [20, 20, 10] => 10


                    const available = []; // For how many possible positions for this item there are.

                    for (let i = 0; i <= columns - columnSpan; i++) {
                        // Find the bigger value for each place it could fit.
                        available.push(arrayMax(positions.slice(i, i + columnSpan)));
                    }

                    return available;
                }
                /**
                 * Find index of short column, the first from the left where this item will go.
                 *
                 * @param {Array.<number>} positions The array to search for the smallest number.
                 * @param {number} buffer Optional buffer which is very useful when the height
                 *     is a percentage of the width.
                 * @return {number} Index of the short column.
                 */

                function getShortColumn(positions, buffer) {
                    const minPosition = arrayMin(positions);

                    for (let i = 0, len = positions.length; i < len; i++) {
                        if (positions[i] >= minPosition - buffer && positions[i] <= minPosition + buffer) {
                            return i;
                        }
                    }

                    return 0;
                }
                /**
                 * Determine the location of the next item, based on its size.
                 * @param {Object} itemSize Object with width and height.
                 * @param {Array.<number>} positions Positions of the other current items.
                 * @param {number} gridSize The column width or row height.
                 * @param {number} total The total number of columns or rows.
                 * @param {number} threshold Buffer value for the column to fit.
                 * @param {number} buffer Vertical buffer for the height of items.
                 * @return {Point}
                 */

                function getItemPosition(_ref) {
                    let {
                        itemSize,
                        positions,
                        gridSize,
                        total,
                        threshold,
                        buffer
                    } = _ref;
                    const span = getColumnSpan(itemSize.width, gridSize, total, threshold);
                    const setY = getAvailablePositions(positions, span, total);
                    const shortColumnIndex = getShortColumn(setY, buffer); // Position the item

                    const point = new Point(gridSize * shortColumnIndex, setY[shortColumnIndex]); // Update the columns array with the new values for each column.
                    // e.g. before the update the columns could be [250, 0, 0, 0] for an item
                    // which spans 2 columns. After it would be [250, itemHeight, itemHeight, 0].

                    const setHeight = setY[shortColumnIndex] + itemSize.height;

                    for (let i = 0; i < span; i++) {
                        positions[shortColumnIndex + i] = setHeight;
                    }

                    return point;
                }
                /**
                 * This method attempts to center items. This method could potentially be slow
                 * with a large number of items because it must place items, then check every
                 * previous item to ensure there is no overlap.
                 * @param {Array.<Rect>} itemRects Item data objects.
                 * @param {number} containerWidth Width of the containing element.
                 * @return {Array.<Point>}
                 */

                function getCenteredPositions(itemRects, containerWidth) {
                    const rowMap = {}; // Populate rows by their offset because items could jump between rows like:
                    // a   c
                    //  bbb

                    itemRects.forEach(itemRect => {
                        if (rowMap[itemRect.top]) {
                            // Push the point to the last row array.
                            rowMap[itemRect.top].push(itemRect);
                        } else {
                            // Start of a new row.
                            rowMap[itemRect.top] = [itemRect];
                        }
                    }); // For each row, find the end of the last item, then calculate
                    // the remaining space by dividing it by 2. Then add that
                    // offset to the x position of each point.

                    let rects = [];
                    const rows = [];
                    const centeredRows = [];
                    Object.keys(rowMap).forEach(key => {
                        const itemRects = rowMap[key];
                        rows.push(itemRects);
                        const lastItem = itemRects[itemRects.length - 1];
                        const end = lastItem.left + lastItem.width;
                        const offset = Math.round((containerWidth - end) / 2);
                        let finalRects = itemRects;
                        let canMove = false;

                        if (offset > 0) {
                            const newRects = [];
                            canMove = itemRects.every(r => {
                                const newRect = new Rect(r.left + offset, r.top, r.width, r.height, r.id); // Check all current rects to make sure none overlap.

                                const noOverlap = !rects.some(r => Rect.intersects(newRect, r));
                                newRects.push(newRect);
                                return noOverlap;
                            }); // If none of the rectangles overlapped, the whole group can be centered.

                            if (canMove) {
                                finalRects = newRects;
                            }
                        } // If the items are not going to be offset, ensure that the original
                        // placement for this row will not overlap previous rows (row-spanning
                        // elements could be in the way).


                        if (!canMove) {
                            let intersectingRect;
                            const hasOverlap = itemRects.some(itemRect => rects.some(r => {
                                const intersects = Rect.intersects(itemRect, r);

                                if (intersects) {
                                    intersectingRect = r;
                                }

                                return intersects;
                            })); // If there is any overlap, replace the overlapping row with the original.

                            if (hasOverlap) {
                                const rowIndex = centeredRows.findIndex(items => items.includes(intersectingRect));
                                centeredRows.splice(rowIndex, 1, rows[rowIndex]);
                            }
                        }

                        rects = rects.concat(finalRects);
                        centeredRows.push(finalRects);
                    }); // Reduce array of arrays to a single array of points.
                    // https://stackoverflow.com/a/10865042/373422
                    // Then reset sort back to how the items were passed to this method.
                    // Remove the wrapper object with index, map to a Point.

                    return centeredRows.flat().sort((a, b) => a.id - b.id).map(itemRect => new Point(itemRect.left, itemRect.top));
                }

                /**
                 * Hyphenates a javascript style string to a css one. For example:
                 * MozBoxSizing -> -moz-box-sizing.
                 * @param {string} str The string to hyphenate.
                 * @return {string} The hyphenated string.
                 */
                function hyphenate(str) {
                    return str.replace(/([A-Z])/g, (str, m1) => `-${m1.toLowerCase()}`);
                }

                function arrayUnique(x) {
                    return Array.from(new Set(x));
                } // Used for unique instance variables


                let id = 0;

                class Shuffle extends tinyEmitter.exports {
                    /**
                     * Categorize, sort, and filter a responsive grid of items.
                     *
                     * @param {Element} element An element which is the parent container for the grid items.
                     * @param {Object} [options=Shuffle.options] Options object.
                     * @constructor
                     */
                    constructor(element) {
                        let options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
                        super();
                        this.options = {
                            ...Shuffle.options,
                            ...options
                        };
                        this.lastSort = {};
                        this.group = Shuffle.ALL_ITEMS;
                        this.lastFilter = Shuffle.ALL_ITEMS;
                        this.isEnabled = true;
                        this.isDestroyed = false;
                        this.isInitialized = false;
                        this._transitions = [];
                        this.isTransitioning = false;
                        this._queue = [];

                        const el = this._getElementOption(element);

                        if (!el) {
                            throw new TypeError('Shuffle needs to be initialized with an element.');
                        }

                        this.element = el;
                        this.id = `shuffle_${id}`;
                        id += 1;

                        this._init();

                        this.isInitialized = true;
                    }

                    _init() {
                        this.items = this._getItems();
                        this.sortedItems = this.items;
                        this.options.sizer = this._getElementOption(this.options.sizer); // Add class and invalidate styles

                        this.element.classList.add(Shuffle.Classes.BASE); // Set initial css for each item

                        this._initItems(this.items); // If the page has not already emitted the `load` event, call layout on load.
                        // This avoids layout issues caused by images and fonts loading after the
                        // instance has been initialized.


                        if (document.readyState !== 'complete') {
                            const layout = this.layout.bind(this);
                            window.addEventListener('load', function onLoad() {
                                window.removeEventListener('load', onLoad);
                                layout();
                            });
                        } // Get container css all in one request. Causes reflow


                        const containerCss = window.getComputedStyle(this.element, null);
                        const containerWidth = Shuffle.getSize(this.element).width; // Add styles to the container if it doesn't have them.

                        this._validateStyles(containerCss); // We already got the container's width above, no need to cause another
                        // reflow getting it again... Calculate the number of columns there will be


                        this._setColumns(containerWidth); // Kick off!


                        this.filter(this.options.group, this.options.initialSort); // Bind resize events

                        this._rafId = null; // This is true for all supported browsers, but just to be safe, avoid throwing
                        // an error if ResizeObserver is not present. You can manually add a window resize
                        // event and call `update()` if ResizeObserver is missing, or use Shuffle v5.

                        if ('ResizeObserver' in window) {
                            this._resizeObserver = new ResizeObserver(this._handleResizeCallback.bind(this));

                            this._resizeObserver.observe(this.element);
                        } // The shuffle items haven't had transitions set on them yet so the user
                        // doesn't see the first layout. Set them now that the first layout is done.
                        // First, however, a synchronous layout must be caused for the previous
                        // styles to be applied without transitions.


                        this.element.offsetWidth; // eslint-disable-line no-unused-expressions

                        this.setItemTransitions(this.items);
                        this.element.style.transition = `height ${this.options.speed}ms ${this.options.easing}`;
                    }
                    /**
                     * Retrieve an element from an option.
                     * @param {string|jQuery|Element} option The option to check.
                     * @return {?Element} The plain element or null.
                     * @private
                     */


                    _getElementOption(option) {
                        // If column width is a string, treat is as a selector and search for the
                        // sizer element within the outermost container
                        if (typeof option === 'string') {
                            return this.element.querySelector(option);
                        } // Check for an element


                        if (option && option.nodeType && option.nodeType === 1) {
                            return option;
                        } // Check for jQuery object


                        if (option && option.jquery) {
                            return option[0];
                        }

                        return null;
                    }
                    /**
                     * Ensures the shuffle container has the css styles it needs applied to it.
                     * @param {Object} styles Key value pairs for position and overflow.
                     * @private
                     */


                    _validateStyles(styles) {
                        // Position cannot be static.
                        if (styles.position === 'static') {
                            this.element.style.position = 'relative';
                        } // Overflow has to be hidden.


                        if (styles.overflow !== 'hidden') {
                            this.element.style.overflow = 'hidden';
                        }
                    }
                    /**
                     * Filter the elements by a category.
                     * @param {string|string[]|function(Element):boolean} [category] Category to
                     *     filter by. If it's given, the last category will be used to filter the items.
                     * @param {Array} [collection] Optionally filter a collection. Defaults to
                     *     all the items.
                     * @return {{visible: ShuffleItem[], hidden: ShuffleItem[]}}
                     * @private
                     */


                    _filter() {
                        let category = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.lastFilter;
                        let collection = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : this.items;

                        const set = this._getFilteredSets(category, collection); // Individually add/remove hidden/visible classes


                        this._toggleFilterClasses(set); // Save the last filter in case elements are appended.


                        this.lastFilter = category; // This is saved mainly because providing a filter function (like searching)
                        // will overwrite the `lastFilter` property every time its called.

                        if (typeof category === 'string') {
                            this.group = category;
                        }

                        return set;
                    }
                    /**
                     * Returns an object containing the visible and hidden elements.
                     * @param {string|string[]|function(Element):boolean} category Category or function to filter by.
                     * @param {ShuffleItem[]} items A collection of items to filter.
                     * @return {{visible: ShuffleItem[], hidden: ShuffleItem[]}}
                     * @private
                     */


                    _getFilteredSets(category, items) {
                        let visible = [];
                        const hidden = []; // category === 'all', add visible class to everything

                        if (category === Shuffle.ALL_ITEMS) {
                            visible = items; // Loop through each item and use provided function to determine
                            // whether to hide it or not.
                        } else {
                            items.forEach(item => {
                                if (this._doesPassFilter(category, item.element)) {
                                    visible.push(item);
                                } else {
                                    hidden.push(item);
                                }
                            });
                        }

                        return {
                            visible,
                            hidden
                        };
                    }
                    /**
                     * Test an item to see if it passes a category.
                     * @param {string|string[]|function():boolean} category Category or function to filter by.
                     * @param {Element} element An element to test.
                     * @return {boolean} Whether it passes the category/filter.
                     * @private
                     */


                    _doesPassFilter(category, element) {
                        if (typeof category === 'function') {
                            return category.call(element, element, this);
                        } // Check each element's data-groups attribute against the given category.


                        const attr = element.dataset[Shuffle.FILTER_ATTRIBUTE_KEY];
                        const keys = this.options.delimiter ? attr.split(this.options.delimiter) : JSON.parse(attr);

                        function testCategory(category) {
                            return keys.includes(category);
                        }

                        if (Array.isArray(category)) {
                            if (this.options.filterMode === Shuffle.FilterMode.ANY) {
                                return category.some(testCategory);
                            }

                            return category.every(testCategory);
                        }

                        return keys.includes(category);
                    }
                    /**
                     * Toggles the visible and hidden class names.
                     * @param {{visible, hidden}} Object with visible and hidden arrays.
                     * @private
                     */


                    _toggleFilterClasses(_ref) {
                        let {
                            visible,
                            hidden
                        } = _ref;
                        visible.forEach(item => {
                            item.show();
                        });
                        hidden.forEach(item => {
                            item.hide();
                        });
                    }
                    /**
                     * Set the initial css for each item
                     * @param {ShuffleItem[]} items Set to initialize.
                     * @private
                     */


                    _initItems(items) {
                        items.forEach(item => {
                            item.init();
                        });
                    }
                    /**
                     * Remove element reference and styles.
                     * @param {ShuffleItem[]} items Set to dispose.
                     * @private
                     */


                    _disposeItems(items) {
                        items.forEach(item => {
                            item.dispose();
                        });
                    }
                    /**
                     * Updates the visible item count.
                     * @private
                     */


                    _updateItemCount() {
                        this.visibleItems = this._getFilteredItems().length;
                    }
                    /**
                     * Sets css transform transition on a group of elements. This is not executed
                     * at the same time as `item.init` so that transitions don't occur upon
                     * initialization of a new Shuffle instance.
                     * @param {ShuffleItem[]} items Shuffle items to set transitions on.
                     * @protected
                     */


                    setItemTransitions(items) {
                        const {
                            speed,
                            easing
                        } = this.options;
                        const positionProps = this.options.useTransforms ? ['transform'] : ['top', 'left']; // Allow users to transtion other properties if they exist in the `before`
                        // css mapping of the shuffle item.

                        const cssProps = Object.keys(ShuffleItem.Css.HIDDEN.before).map(k => hyphenate(k));
                        const properties = positionProps.concat(cssProps).join();
                        items.forEach(item => {
                            item.element.style.transitionDuration = `${speed}ms`;
                            item.element.style.transitionTimingFunction = easing;
                            item.element.style.transitionProperty = properties;
                        });
                    }

                    _getItems() {
                        return Array.from(this.element.children).filter(el => el.matches(this.options.itemSelector)).map(el => new ShuffleItem(el, this.options.isRTL));
                    }
                    /**
                     * Combine the current items array with a new one and sort it by DOM order.
                     * @param {ShuffleItem[]} items Items to track.
                     * @return {ShuffleItem[]}
                     */


                    _mergeNewItems(items) {
                        const children = Array.from(this.element.children);
                        return sorter(this.items.concat(items), {
                            by(element) {
                                return children.indexOf(element);
                            }

                        });
                    }

                    _getFilteredItems() {
                        return this.items.filter(item => item.isVisible);
                    }

                    _getConcealedItems() {
                        return this.items.filter(item => !item.isVisible);
                    }
                    /**
                     * Returns the column size, based on column width and sizer options.
                     * @param {number} containerWidth Size of the parent container.
                     * @param {number} gutterSize Size of the gutters.
                     * @return {number}
                     * @private
                     */


                    _getColumnSize(containerWidth, gutterSize) {
                        let size; // If the columnWidth property is a function, then the grid is fluid

                        if (typeof this.options.columnWidth === 'function') {
                            size = this.options.columnWidth(containerWidth); // columnWidth option isn't a function, are they using a sizing element?
                        } else if (this.options.sizer) {
                            size = Shuffle.getSize(this.options.sizer).width; // if not, how about the explicitly set option?
                        } else if (this.options.columnWidth) {
                            size = this.options.columnWidth; // or use the size of the first item
                        } else if (this.items.length > 0) {
                            size = Shuffle.getSize(this.items[0].element, true).width; // if there's no items, use size of container
                        } else {
                            size = containerWidth;
                        } // Don't let them set a column width of zero.


                        if (size === 0) {
                            size = containerWidth;
                        }

                        return size + gutterSize;
                    }
                    /**
                     * Returns the gutter size, based on gutter width and sizer options.
                     * @param {number} containerWidth Size of the parent container.
                     * @return {number}
                     * @private
                     */


                    _getGutterSize(containerWidth) {
                        let size;

                        if (typeof this.options.gutterWidth === 'function') {
                            size = this.options.gutterWidth(containerWidth);
                        } else if (this.options.sizer) {
                            size = getNumberStyle(this.options.sizer, 'marginLeft');
                        } else {
                            size = this.options.gutterWidth;
                        }

                        return size;
                    }
                    /**
                     * Calculate the number of columns to be used. Gets css if using sizer element.
                     * @param {number} [containerWidth] Optionally specify a container width if
                     *    it's already available.
                     */


                    _setColumns() {
                        let containerWidth = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : Shuffle.getSize(this.element).width;

                        const gutter = this._getGutterSize(containerWidth);

                        const columnWidth = this._getColumnSize(containerWidth, gutter);

                        let calculatedColumns = (containerWidth + gutter) / columnWidth; // Widths given from getStyles are not precise enough...

                        if (Math.abs(Math.round(calculatedColumns) - calculatedColumns) < this.options.columnThreshold) {
                            // e.g. calculatedColumns = 11.998876
                            calculatedColumns = Math.round(calculatedColumns);
                        }

                        this.cols = Math.max(Math.floor(calculatedColumns || 0), 1);
                        this.containerWidth = containerWidth;
                        this.colWidth = columnWidth;
                    }
                    /**
                     * Adjust the height of the grid
                     */


                    _setContainerSize() {
                        this.element.style.height = `${this._getContainerSize()}px`;
                    }
                    /**
                     * Based on the column heights, it returns the biggest one.
                     * @return {number}
                     * @private
                     */


                    _getContainerSize() {
                        return arrayMax(this.positions);
                    }
                    /**
                     * Get the clamped stagger amount.
                     * @param {number} index Index of the item to be staggered.
                     * @return {number}
                     */


                    _getStaggerAmount(index) {
                        return Math.min(index * this.options.staggerAmount, this.options.staggerAmountMax);
                    }
                    /**
                     * Emit an event from this instance.
                     * @param {string} name Event name.
                     * @param {Object} [data={}] Optional object data.
                     */


                    _dispatch(name) {
                        let data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

                        if (this.isDestroyed) {
                            return;
                        }

                        data.shuffle = this;
                        this.emit(name, data);
                    }
                    /**
                     * Zeros out the y columns array, which is used to determine item placement.
                     * @private
                     */


                    _resetCols() {
                        let i = this.cols;
                        this.positions = [];

                        while (i) {
                            i -= 1;
                            this.positions.push(0);
                        }
                    }
                    /**
                     * Loops through each item that should be shown and calculates the x, y position.
                     * @param {ShuffleItem[]} items Array of items that will be shown/layed
                     *     out in order in their array.
                     */


                    _layout(items) {
                        const itemPositions = this._getNextPositions(items);

                        let count = 0;
                        items.forEach((item, i) => {
                            function callback() {
                                item.applyCss(ShuffleItem.Css.VISIBLE.after);
                            } // If the item will not change its position, do not add it to the render
                            // queue. Transitions don't fire when setting a property to the same value.


                            if (Point.equals(item.point, itemPositions[i]) && !item.isHidden) {
                                item.applyCss(ShuffleItem.Css.VISIBLE.before);
                                callback();
                                return;
                            }

                            item.point = itemPositions[i];
                            item.scale = ShuffleItem.Scale.VISIBLE;
                            item.isHidden = false; // Clone the object so that the `before` object isn't modified when the
                            // transition delay is added.

                            const styles = this.getStylesForTransition(item, ShuffleItem.Css.VISIBLE.before);
                            styles.transitionDelay = `${this._getStaggerAmount(count)}ms`;

                            this._queue.push({
                                item,
                                styles,
                                callback
                            });

                            count += 1;
                        });
                    }
                    /**
                     * Return an array of Point instances representing the future positions of
                     * each item.
                     * @param {ShuffleItem[]} items Array of sorted shuffle items.
                     * @return {Point[]}
                     * @private
                     */


                    _getNextPositions(items) {
                        // If position data is going to be changed, add the item's size to the
                        // transformer to allow for calculations.
                        if (this.options.isCentered) {
                            const itemsData = items.map((item, i) => {
                                const itemSize = Shuffle.getSize(item.element, true);

                                const point = this._getItemPosition(itemSize);

                                return new Rect(point.x, point.y, itemSize.width, itemSize.height, i);
                            });
                            return this.getTransformedPositions(itemsData, this.containerWidth);
                        } // If no transforms are going to happen, simply return an array of the
                        // future points of each item.


                        return items.map(item => this._getItemPosition(Shuffle.getSize(item.element, true)));
                    }
                    /**
                     * Determine the location of the next item, based on its size.
                     * @param {{width: number, height: number}} itemSize Object with width and height.
                     * @return {Point}
                     * @private
                     */


                    _getItemPosition(itemSize) {
                        return getItemPosition({
                            itemSize,
                            positions: this.positions,
                            gridSize: this.colWidth,
                            total: this.cols,
                            threshold: this.options.columnThreshold,
                            buffer: this.options.buffer
                        });
                    }
                    /**
                     * Mutate positions before they're applied.
                     * @param {Rect[]} itemRects Item data objects.
                     * @param {number} containerWidth Width of the containing element.
                     * @return {Point[]}
                     * @protected
                     */


                    getTransformedPositions(itemRects, containerWidth) {
                        return getCenteredPositions(itemRects, containerWidth);
                    }
                    /**
                     * Hides the elements that don't match our filter.
                     * @param {ShuffleItem[]} collection Collection to shrink.
                     * @private
                     */


                    _shrink() {
                        let collection = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this._getConcealedItems();
                        let count = 0;
                        collection.forEach(item => {
                            function callback() {
                                item.applyCss(ShuffleItem.Css.HIDDEN.after);
                            } // Continuing would add a transitionend event listener to the element, but
                            // that listener would not execute because the transform and opacity would
                            // stay the same.
                            // The callback is executed here because it is not guaranteed to be called
                            // after the transitionend event because the transitionend could be
                            // canceled if another animation starts.


                            if (item.isHidden) {
                                item.applyCss(ShuffleItem.Css.HIDDEN.before);
                                callback();
                                return;
                            }

                            item.scale = ShuffleItem.Scale.HIDDEN;
                            item.isHidden = true;
                            const styles = this.getStylesForTransition(item, ShuffleItem.Css.HIDDEN.before);
                            styles.transitionDelay = `${this._getStaggerAmount(count)}ms`;

                            this._queue.push({
                                item,
                                styles,
                                callback
                            });

                            count += 1;
                        });
                    }
                    /**
                     * Resize handler.
                     * @param {ResizeObserverEntry[]} entries
                     */


                    _handleResizeCallback(entries) {
                        // If shuffle is disabled, destroyed, don't do anything.
                        // You can still manually force a shuffle update with shuffle.update({ force: true }).
                        if (!this.isEnabled || this.isDestroyed) {
                            return;
                        } // The reason ESLint disables this is because for..of generates a lot of extra
                        // code using Babel, but Shuffle no longer supports browsers that old, so
                        // nothing to worry about.
                        // eslint-disable-next-line no-restricted-syntax


                        for (const entry of entries) {
                            if (Math.round(entry.contentRect.width) !== Math.round(this.containerWidth)) {
                                // If there was already an animation waiting, cancel it.
                                cancelAnimationFrame(this._rafId); // Offload updating the DOM until the browser is ready.

                                this._rafId = requestAnimationFrame(this.update.bind(this));
                            }
                        }
                    }
                    /**
                     * Returns styles which will be applied to the an item for a transition.
                     * @param {ShuffleItem} item Item to get styles for. Should have updated
                     *   scale and point properties.
                     * @param {Object} styleObject Extra styles that will be used in the transition.
                     * @return {!Object} Transforms for transitions, left/top for animate.
                     * @protected
                     */


                    getStylesForTransition(item, styleObject) {
                        // Clone the object to avoid mutating the original.
                        const styles = {
                            ...styleObject
                        };

                        if (this.options.useTransforms) {
                            const sign = this.options.isRTL ? '-' : '';
                            const x = this.options.roundTransforms ? Math.round(item.point.x) : item.point.x;
                            const y = this.options.roundTransforms ? Math.round(item.point.y) : item.point.y;
                            styles.transform = `translate(${sign}${x}px, ${y}px) scale(${item.scale})`;
                        } else {
                            if (this.options.isRTL) {
                                styles.right = `${item.point.x}px`;
                            } else {
                                styles.left = `${item.point.x}px`;
                            }

                            styles.top = `${item.point.y}px`;
                        }

                        return styles;
                    }
                    /**
                     * Listen for the transition end on an element and execute the itemCallback
                     * when it finishes.
                     * @param {Element} element Element to listen on.
                     * @param {function} itemCallback Callback for the item.
                     * @param {function} done Callback to notify `parallel` that this one is done.
                     */


                    _whenTransitionDone(element, itemCallback, done) {
                        const id = onTransitionEnd(element, evt => {
                            itemCallback();
                            done(null, evt);
                        });

                        this._transitions.push(id);
                    }
                    /**
                     * Return a function which will set CSS styles and call the `done` function
                     * when (if) the transition finishes.
                     * @param {Object} opts Transition object.
                     * @return {function} A function to be called with a `done` function.
                     */


                    _getTransitionFunction(opts) {
                        return done => {
                            opts.item.applyCss(opts.styles);

                            this._whenTransitionDone(opts.item.element, opts.callback, done);
                        };
                    }
                    /**
                     * Execute the styles gathered in the style queue. This applies styles to elements,
                     * triggering transitions.
                     * @private
                     */


                    _processQueue() {
                        if (this.isTransitioning) {
                            this._cancelMovement();
                        }

                        const hasSpeed = this.options.speed > 0;
                        const hasQueue = this._queue.length > 0;

                        if (hasQueue && hasSpeed && this.isInitialized) {
                            this._startTransitions(this._queue);
                        } else if (hasQueue) {
                            this._styleImmediately(this._queue);

                            this._dispatch(Shuffle.EventType.LAYOUT); // A call to layout happened, but none of the newly visible items will
                            // change position or the transition duration is zero, which will not trigger
                            // the transitionend event.

                        } else {
                            this._dispatch(Shuffle.EventType.LAYOUT);
                        } // Remove everything in the style queue


                        this._queue.length = 0;
                    }
                    /**
                     * Wait for each transition to finish, the emit the layout event.
                     * @param {Object[]} transitions Array of transition objects.
                     */


                    _startTransitions(transitions) {
                        // Set flag that shuffle is currently in motion.
                        this.isTransitioning = true; // Create an array of functions to be called.

                        const callbacks = transitions.map(obj => this._getTransitionFunction(obj));
                        arrayParallel(callbacks, this._movementFinished.bind(this));
                    }

                    _cancelMovement() {
                        // Remove the transition end event for each listener.
                        this._transitions.forEach(cancelTransitionEnd); // Reset the array.


                        this._transitions.length = 0; // Show it's no longer active.

                        this.isTransitioning = false;
                    }
                    /**
                     * Apply styles without a transition.
                     * @param {Object[]} objects Array of transition objects.
                     * @private
                     */


                    _styleImmediately(objects) {
                        if (objects.length) {
                            const elements = objects.map(obj => obj.item.element);

                            Shuffle._skipTransitions(elements, () => {
                                objects.forEach(obj => {
                                    obj.item.applyCss(obj.styles);
                                    obj.callback();
                                });
                            });
                        }
                    }

                    _movementFinished() {
                        this._transitions.length = 0;
                        this.isTransitioning = false;

                        this._dispatch(Shuffle.EventType.LAYOUT);
                    }
                    /**
                     * The magic. This is what makes the plugin 'shuffle'
                     * @param {string|string[]|function(Element):boolean} [category] Category to filter by.
                     *     Can be a function, string, or array of strings.
                     * @param {SortOptions} [sortOptions] A sort object which can sort the visible set
                     */


                    filter(category, sortOptions) {
                        if (!this.isEnabled) {
                            return;
                        }

                        if (!category || category && category.length === 0) {
                            category = Shuffle.ALL_ITEMS; // eslint-disable-line no-param-reassign
                        }

                        this._filter(category); // Shrink each hidden item


                        this._shrink(); // How many visible elements?


                        this._updateItemCount(); // Update transforms on visible elements so they will animate to their new positions.


                        this.sort(sortOptions);
                    }
                    /**
                     * Gets the visible elements, sorts them, and passes them to layout.
                     * @param {SortOptions} [sortOptions] The options object to pass to `sorter`.
                     */


                    sort() {
                        let sortOptions = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.lastSort;

                        if (!this.isEnabled) {
                            return;
                        }

                        this._resetCols();

                        const items = sorter(this._getFilteredItems(), sortOptions);
                        this.sortedItems = items;

                        this._layout(items); // `_layout` always happens after `_shrink`, so it's safe to process the style
                        // queue here with styles from the shrink method.


                        this._processQueue(); // Adjust the height of the container.


                        this._setContainerSize();

                        this.lastSort = sortOptions;
                    }
                    /**
                     * Reposition everything.
                     * @param {object} options options object
                     * @param {boolean} [options.recalculateSizes=true] Whether to calculate column, gutter, and container widths again.
                     * @param {boolean} [options.force=false] By default, `update` does nothing if the instance is disabled. Setting this
                     *    to true forces the update to happen regardless.
                     */


                    update() {
                        let {
                            recalculateSizes = true,
                                force = false
                        } = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

                        if (this.isEnabled || force) {
                            if (recalculateSizes) {
                                this._setColumns();
                            } // Layout items


                            this.sort();
                        }
                    }
                    /**
                     * Use this instead of `update()` if you don't need the columns and gutters updated
                     * Maybe an image inside `shuffle` loaded (and now has a height), which means calculations
                     * could be off.
                     */


                    layout() {
                        this.update({
                            recalculateSizes: true
                        });
                    }
                    /**
                     * New items have been appended to shuffle. Mix them in with the current
                     * filter or sort status.
                     * @param {Element[]} newItems Collection of new items.
                     */


                    add(newItems) {
                        const items = arrayUnique(newItems).map(el => new ShuffleItem(el, this.options.isRTL)); // Add classes and set initial positions.

                        this._initItems(items); // Determine which items will go with the current filter.


                        this._resetCols();

                        const allItems = this._mergeNewItems(items);

                        const sortedItems = sorter(allItems, this.lastSort);

                        const allSortedItemsSet = this._filter(this.lastFilter, sortedItems);

                        const isNewItem = item => items.includes(item);

                        const applyHiddenState = item => {
                            item.scale = ShuffleItem.Scale.HIDDEN;
                            item.isHidden = true;
                            item.applyCss(ShuffleItem.Css.HIDDEN.before);
                            item.applyCss(ShuffleItem.Css.HIDDEN.after);
                        }; // Layout all items again so that new items get positions.
                        // Synchonously apply positions.


                        const itemPositions = this._getNextPositions(allSortedItemsSet.visible);

                        allSortedItemsSet.visible.forEach((item, i) => {
                            if (isNewItem(item)) {
                                item.point = itemPositions[i];
                                applyHiddenState(item);
                                item.applyCss(this.getStylesForTransition(item, {}));
                            }
                        });
                        allSortedItemsSet.hidden.forEach(item => {
                            if (isNewItem(item)) {
                                applyHiddenState(item);
                            }
                        }); // Cause layout so that the styles above are applied.

                        this.element.offsetWidth; // eslint-disable-line no-unused-expressions
                        // Add transition to each item.

                        this.setItemTransitions(items); // Update the list of items.

                        this.items = this._mergeNewItems(items); // Update layout/visibility of new and old items.

                        this.filter(this.lastFilter);
                    }
                    /**
                     * Disables shuffle from updating dimensions and layout on resize
                     */


                    disable() {
                        this.isEnabled = false;
                    }
                    /**
                     * Enables shuffle again
                     * @param {boolean} [isUpdateLayout=true] if undefined, shuffle will update columns and gutters
                     */


                    enable() {
                        let isUpdateLayout = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
                        this.isEnabled = true;

                        if (isUpdateLayout) {
                            this.update();
                        }
                    }
                    /**
                     * Remove 1 or more shuffle items.
                     * @param {Element[]} elements An array containing one or more
                     *     elements in shuffle
                     * @return {Shuffle} The shuffle instance.
                     */


                    remove(elements) {
                        if (!elements.length) {
                            return;
                        }

                        const collection = arrayUnique(elements);
                        const oldItems = collection.map(element => this.getItemByElement(element)).filter(item => !!item);

                        const handleLayout = () => {
                            this._disposeItems(oldItems); // Remove the collection in the callback


                            collection.forEach(element => {
                                element.parentNode.removeChild(element);
                            });

                            this._dispatch(Shuffle.EventType.REMOVED, {
                                collection
                            });
                        }; // Hide collection first.


                        this._toggleFilterClasses({
                            visible: [],
                            hidden: oldItems
                        });

                        this._shrink(oldItems);

                        this.sort(); // Update the list of items here because `remove` could be called again
                        // with an item that is in the process of being removed.

                        this.items = this.items.filter(item => !oldItems.includes(item));

                        this._updateItemCount();

                        this.once(Shuffle.EventType.LAYOUT, handleLayout);
                    }
                    /**
                     * Retrieve a shuffle item by its element.
                     * @param {Element} element Element to look for.
                     * @return {?ShuffleItem} A shuffle item or undefined if it's not found.
                     */


                    getItemByElement(element) {
                        return this.items.find(item => item.element === element);
                    }
                    /**
                     * Dump the elements currently stored and reinitialize all child elements which
                     * match the `itemSelector`.
                     */


                    resetItems() {
                        // Remove refs to current items.
                        this._disposeItems(this.items);

                        this.isInitialized = false; // Find new items in the DOM.

                        this.items = this._getItems(); // Set initial styles on the new items.

                        this._initItems(this.items);

                        this.once(Shuffle.EventType.LAYOUT, () => {
                            // Add transition to each item.
                            this.setItemTransitions(this.items);
                            this.isInitialized = true;
                        }); // Lay out all items.

                        this.filter(this.lastFilter);
                    }
                    /**
                     * Destroys shuffle, removes events, styles, and classes
                     */


                    destroy() {
                        this._cancelMovement();

                        if (this._resizeObserver) {
                            this._resizeObserver.unobserve(this.element);

                            this._resizeObserver = null;
                        } // Reset container styles


                        this.element.classList.remove('shuffle');
                        this.element.removeAttribute('style'); // Reset individual item styles

                        this._disposeItems(this.items);

                        this.items.length = 0;
                        this.sortedItems.length = 0;
                        this._transitions.length = 0; // Null DOM references

                        this.options.sizer = null;
                        this.element = null; // Set a flag so if a debounced resize has been triggered,
                        // it can first check if it is actually isDestroyed and not doing anything

                        this.isDestroyed = true;
                        this.isEnabled = false;
                    }
                    /**
                     * Returns the outer width of an element, optionally including its margins.
                     *
                     * There are a few different methods for getting the width of an element, none of
                     * which work perfectly for all Shuffle's use cases.
                     *
                     * 1. getBoundingClientRect() `left` and `right` properties.
                     *   - Accounts for transform scaled elements, making it useless for Shuffle
                     *   elements which have shrunk.
                     * 2. The `offsetWidth` property.
                     *   - This value stays the same regardless of the elements transform property,
                     *   however, it does not return subpixel values.
                     * 3. getComputedStyle()
                     *   - This works great Chrome, Firefox, Safari, but IE<=11 does not include
                     *   padding and border when box-sizing: border-box is set, requiring a feature
                     *   test and extra work to add the padding back for IE and other browsers which
                     *   follow the W3C spec here.
                     *
                     * @param {Element} element The element.
                     * @param {boolean} [includeMargins=false] Whether to include margins.
                     * @return {{width: number, height: number}} The width and height.
                     */


                    static getSize(element) {
                        let includeMargins = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
                        // Store the styles so that they can be used by others without asking for it again.
                        const styles = window.getComputedStyle(element, null);
                        let width = getNumberStyle(element, 'width', styles);
                        let height = getNumberStyle(element, 'height', styles);

                        if (includeMargins) {
                            const marginLeft = getNumberStyle(element, 'marginLeft', styles);
                            const marginRight = getNumberStyle(element, 'marginRight', styles);
                            const marginTop = getNumberStyle(element, 'marginTop', styles);
                            const marginBottom = getNumberStyle(element, 'marginBottom', styles);
                            width += marginLeft + marginRight;
                            height += marginTop + marginBottom;
                        }

                        return {
                            width,
                            height
                        };
                    }
                    /**
                     * Change a property or execute a function which will not have a transition
                     * @param {Element[]} elements DOM elements that won't be transitioned.
                     * @param {function} callback A function which will be called while transition
                     *     is set to 0ms.
                     * @private
                     */


                    static _skipTransitions(elements, callback) {
                        const zero = '0ms'; // Save current duration and delay.

                        const data = elements.map(element => {
                            const {
                                style
                            } = element;
                            const duration = style.transitionDuration;
                            const delay = style.transitionDelay; // Set the duration to zero so it happens immediately

                            style.transitionDuration = zero;
                            style.transitionDelay = zero;
                            return {
                                duration,
                                delay
                            };
                        });
                        callback(); // Cause forced synchronous layout.

                        elements[0].offsetWidth; // eslint-disable-line no-unused-expressions
                        // Put the duration back

                        elements.forEach((element, i) => {
                            element.style.transitionDuration = data[i].duration;
                            element.style.transitionDelay = data[i].delay;
                        });
                    }

                }

                Shuffle.ShuffleItem = ShuffleItem;
                Shuffle.ALL_ITEMS = 'all';
                Shuffle.FILTER_ATTRIBUTE_KEY = 'groups';
                /** @enum {string} */

                Shuffle.EventType = {
                    LAYOUT: 'shuffle:layout',
                    REMOVED: 'shuffle:removed'
                };
                /** @enum {string} */

                Shuffle.Classes = Classes;
                /** @enum {string} */

                Shuffle.FilterMode = {
                    ANY: 'any',
                    ALL: 'all'
                }; // Overrideable options

                Shuffle.options = {
                    // Initial filter group.
                    group: Shuffle.ALL_ITEMS,
                    // Transition/animation speed (milliseconds).
                    speed: 250,
                    // CSS easing function to use.
                    easing: 'cubic-bezier(0.4, 0.0, 0.2, 1)',
                    // e.g. '.picture-item'.
                    itemSelector: '*',
                    // Element or selector string. Use an element to determine the size of columns
                    // and gutters.
                    sizer: null,
                    // A static number or function that tells the plugin how wide the gutters
                    // between columns are (in pixels).
                    gutterWidth: 0,
                    // A static number or function that returns a number which tells the plugin
                    // how wide the columns are (in pixels).
                    columnWidth: 0,
                    // If your group is not json, and is comma delimited, you could set delimiter
                    // to ','.
                    delimiter: null,
                    // Useful for percentage based heights when they might not always be exactly
                    // the same (in pixels).
                    buffer: 0,
                    // Reading the width of elements isn't precise enough and can cause columns to
                    // jump between values.
                    columnThreshold: 0.01,
                    // Shuffle can be initialized with a sort object. It is the same object
                    // given to the sort method.
                    initialSort: null,
                    // Transition delay offset for each item in milliseconds.
                    staggerAmount: 15,
                    // Maximum stagger delay in milliseconds.
                    staggerAmountMax: 150,
                    // Whether to use transforms or absolute positioning.
                    useTransforms: true,
                    // Affects using an array with filter. e.g. `filter(['one', 'two'])`. With "any",
                    // the element passes the test if any of its groups are in the array. With "all",
                    // the element only passes if all groups are in the array.
                    // Note, this has no effect if you supply a custom filter function.
                    filterMode: Shuffle.FilterMode.ANY,
                    // Attempt to center grid items in each row.
                    isCentered: false,
                    // Attempt to align grid items to right.
                    isRTL: false,
                    // Whether to round pixel values used in translate(x, y). This usually avoids
                    // blurriness.
                    roundTransforms: true
                };
                Shuffle.Point = Point;
                Shuffle.Rect = Rect; // Expose for testing. Hack at your own risk.

                Shuffle.__sorter = sorter;
                Shuffle.__getColumnSpan = getColumnSpan;
                Shuffle.__getAvailablePositions = getAvailablePositions;
                Shuffle.__getShortColumn = getShortColumn;
                Shuffle.__getCenteredPositions = getCenteredPositions;


                //# sourceMappingURL=shuffle.esm.js.map


                /***/
            })

        /******/
    });
    /************************************************************************/
    /******/ // The module cache
    /******/
    var __webpack_module_cache__ = {};
    /******/
    /******/ // The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/ // Check if module is in cache
        /******/
        var cachedModule = __webpack_module_cache__[moduleId];
        /******/
        if (cachedModule !== undefined) {
            /******/
            return cachedModule.exports;
            /******/
        }
        /******/ // Create a new module (and put it into the cache)
        /******/
        var module = __webpack_module_cache__[moduleId] = {
            /******/ // no module.id needed
            /******/ // no module.loaded needed
            /******/
            exports: {}
            /******/
        };
        /******/
        /******/ // Execute the module function
        /******/
        __webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ // Return the exports of the module
        /******/
        return module.exports;
        /******/
    }
    /******/
    /************************************************************************/
    /******/
    /* webpack/runtime/compat get default export */
    /******/
    (() => {
        /******/ // getDefaultExport function for compatibility with non-harmony modules
        /******/
        __webpack_require__.n = (module) => {
            /******/
            var getter = module && module.__esModule ?
                /******/
                () => (module['default']) :
                /******/
                () => (module);
            /******/
            __webpack_require__.d(getter, {
                a: getter
            });
            /******/
            return getter;
            /******/
        };
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/define property getters */
    /******/
    (() => {
        /******/ // define getter functions for harmony exports
        /******/
        __webpack_require__.d = (exports, definition) => {
            /******/
            for (var key in definition) {
                /******/
                if (__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
                    /******/
                    Object.defineProperty(exports, key, {
                        enumerable: true,
                        get: definition[key]
                    });
                    /******/
                }
                /******/
            }
            /******/
        };
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/hasOwnProperty shorthand */
    /******/
    (() => {
        /******/
        __webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
        /******/
    })();
    /******/
    /******/
    /* webpack/runtime/make namespace object */
    /******/
    (() => {
        /******/ // define __esModule on exports
        /******/
        __webpack_require__.r = (exports) => {
            /******/
            if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
                /******/
                Object.defineProperty(exports, Symbol.toStringTag, {
                    value: 'Module'
                });
                /******/
            }
            /******/
            Object.defineProperty(exports, '__esModule', {
                value: true
            });
            /******/
        };
        /******/
    })();
    /******/
    /************************************************************************/
    var __webpack_exports__ = {};
    // This entry need to be wrapped in an IIFE because it need to be in strict mode.
    (() => {
        "use strict";
        /*!**************************************************!*\
          !*** ./resources/dist/panel/js/pages/gallery.js ***!
          \**************************************************/
        __webpack_require__.r(__webpack_exports__);
        /* harmony import */
        var glightbox__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__( /*! glightbox */ "./node_modules/glightbox/dist/js/glightbox.min.js");
        /* harmony import */
        var glightbox__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/ __webpack_require__.n(glightbox__WEBPACK_IMPORTED_MODULE_0__);
        /* harmony import */
        var shufflejs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__( /*! shufflejs */ "./node_modules/shufflejs/dist/shuffle.esm.js");

        function _typeof(o) {
            "@babel/helpers - typeof";
            return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) {
                return typeof o;
            } : function (o) {
                return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o;
            }, _typeof(o);
        }

        function _classCallCheck(instance, Constructor) {
            if (!(instance instanceof Constructor)) {
                throw new TypeError("Cannot call a class as a function");
            }
        }

        function _defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
                var descriptor = props[i];
                descriptor.enumerable = descriptor.enumerable || false;
                descriptor.configurable = true;
                if ("value" in descriptor) descriptor.writable = true;
                Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor);
            }
        }

        function _createClass(Constructor, protoProps, staticProps) {
            if (protoProps) _defineProperties(Constructor.prototype, protoProps);
            if (staticProps) _defineProperties(Constructor, staticProps);
            Object.defineProperty(Constructor, "prototype", {
                writable: false
            });
            return Constructor;
        }

        function _toPropertyKey(arg) {
            var key = _toPrimitive(arg, "string");
            return _typeof(key) === "symbol" ? key : String(key);
        }

        function _toPrimitive(input, hint) {
            if (_typeof(input) !== "object" || input === null) return input;
            var prim = input[Symbol.toPrimitive];
            if (prim !== undefined) {
                var res = prim.call(input, hint || "default");
                if (_typeof(res) !== "object") return res;
                throw new TypeError("@@toPrimitive must return a primitive value.");
            }
            return (hint === "string" ? String : Number)(input);
        }
        /*
        Template Name: Konrix - Responsive 5 Admin Dashboard
        Author: SOC Software House
        Website: https://SOC Software House.com/
        Contact: support@SOC Software House.com
        File: Gallery js
        */



        window.Shuffle = shufflejs__WEBPACK_IMPORTED_MODULE_1__["default"];
        var Demo = /*#__PURE__*/ function () {
            function Demo(element) {
                _classCallCheck(this, Demo);
                this.element = element;
                this.shuffle = new shufflejs__WEBPACK_IMPORTED_MODULE_1__["default"](element, {
                    itemSelector: '.picture-item'
                });

                // Log events.
                this.addShuffleEventListeners();
                this._activeFilters = [];
                this.addFilterButtons();
            }

            /**
             * Shuffle uses the CustomEvent constructor to dispatch events. You can listen
             * for them like you normally would (with jQuery for example).
             */
            _createClass(Demo, [{
                key: "addShuffleEventListeners",
                value: function addShuffleEventListeners() {
                    this.shuffle.on(shufflejs__WEBPACK_IMPORTED_MODULE_1__["default"].EventType.LAYOUT, function (data) {});
                    this.shuffle.on(shufflejs__WEBPACK_IMPORTED_MODULE_1__["default"].EventType.REMOVED, function (data) {});
                }
            }, {
                key: "addFilterButtons",
                value: function addFilterButtons() {
                    var options = document.querySelector('.filter-options');
                    if (!options) {
                        return;
                    }
                    var filterButtons = Array.from(options.children);
                    var onClick = this._handleFilterClick.bind(this);
                    filterButtons.forEach(function (button) {
                        button.addEventListener('click', onClick, false);
                    });
                }
            }, {
                key: "_handleFilterClick",
                value: function _handleFilterClick(evt) {
                    var btn = evt.currentTarget;
                    var isActive = btn.classList.contains('active');
                    var btnGroup = btn.getAttribute('data-group');
                    this._removeActiveClassFromChildren(btn.parentNode);
                    var filterGroup;
                    btn.classList.add('active');
                    filterGroup = btnGroup;
                    this.shuffle.filter(filterGroup);
                }
            }, {
                key: "_removeActiveClassFromChildren",
                value: function _removeActiveClassFromChildren(parent) {
                    var children = parent.children;
                    for (var i = children.length - 1; i >= 0; i--) {
                        children[i].classList.remove('active');
                    }
                }
            }]);
            return Demo;
        }();
        document.addEventListener('DOMContentLoaded', function () {
            window.demo = new Demo(document.getElementById('gallery-wrapper'));
        });

        // GLightbox Popup
        var lightbox = glightbox__WEBPACK_IMPORTED_MODULE_0___default()({
            selector: '.image-popup',
            title: false
        });
    })();

    /******/
})();
