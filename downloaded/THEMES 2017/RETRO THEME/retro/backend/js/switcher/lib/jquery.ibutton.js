(function (E) {
    E.iButton = {
        version: "1.0.01",
        setDefaults: function (G) {
            E.extend(F, G)
        }
    };
    E.fn.iButton = function (J) {
        var K = typeof arguments[0] == "string" && arguments[0];
        var I = K && Array.prototype.slice.call(arguments, 1) || arguments;
        var H = (this.length == 0) ? null : E.data(this[0], "iButton");
        if (H && K && this.length) {
            if (K.toLowerCase() == "object") {
                return H
            } else {
                if (H[K]) {
                    var G;
                    this.each(function (L) {
                        var M = E.data(this, "iButton")[K].apply(H, I);
                        if (L == 0 && M) {
                            if ( !! M.jquery) {
                                G = E([]).add(M)
                            } else {
                                G = M;
                                return false
                            }
                        } else {
                            if ( !! M && !! M.jquery) {
                                G = G.add(M)
                            }
                        }
                    });
                    return G || this
                } else {
                    return this
                }
            }
        } else {
            return this.each(function () {
                new C(this, J)
            })
        }
    };
    var A = 0;
    E.browser.iphone = (navigator.userAgent.toLowerCase().indexOf("iphone") > -1);
    var C = function (N, I) {
        var S = this,
            H = E(N),
            T = ++A,
            K = false,
            U = {}, O = {
                dragging: false,
                clicked: null
            }, W = {
                position: null,
                offset: null,
                time: null
            }, I = E.extend({}, F, I, ( !! E.metadata ? H.metadata() : {})),
            Y = (I.labelOn == B && I.labelOff == D),
            Z = ":checkbox, :radio";
        if (!H.is(Z)) {
            return H.find(Z).iButton(I)
        }
        E.data(H[0], "iButton", S);
        if (I.resizeHandle == "auto") {
            I.resizeHandle = !Y
        }
        if (I.resizeContainer == "auto") {
            I.resizeContainer = !Y
        }
        this.toggle = function (b) {
            var a = (arguments.length > 0) ? b : !H.is(":checked");
            H.attr("checked", a ? "checked" : "").trigger("change")
        };
        this.disable = function (b) {
            var a = (arguments.length > 0) ? b : !K;
            K = a;
            H.attr("disabled", a);
            V[a ? "addClass" : "removeClass"](I.classDisabled);
            if (E.isFunction(I.disable)) {
                I.disable.apply(S, [K, H, I])
            }
        };
        this.repaint = function () {
            X()
        };
        this.destroy = function () {
            E([H[0], V[0]]).unbind(".iButton");
            E(document).unbind(".iButton_" + T);
            V.after(H).remove();
            E.data(H[0], "iButton", null);
            if (E.isFunction(I.destroy)) {
                I.destroy.apply(S, [H, I])
            }
        };
        H.wrap('<div class="' + I.classContainer + '" />').after('<div class="' + I.classLabelOff + '"><span><label>' + I.labelOff + '</label></span></div><div class="' + I.classLabelOn + '"><span><label>' + I.labelOn + '</label></span></div>');
        var V = H.parent(),
            G = H.siblings("." + I.classHandle),
            P = H.siblings("." + I.classLabelOff),
            M = P.children("span"),
            J = H.siblings("." + I.classLabelOn),
            L = J.children("span");
        if (I.resizeHandle || I.resizeContainer) {
            U.onspan = L.outerWidth();
            U.offspan = M.outerWidth()
        }
        if (I.resizeHandle) {
            U.handle = Math.min(U.onspan, U.offspan);
            G.css("width", U.handle)
        } else {
            U.handle = G.width()
        }
        if (I.resizeContainer) {
            U.container = (Math.max(U.onspan, U.offspan) + U.handle + 20);
            V.css("width", U.container);
            P.css("width", U.container - 0)
        } else {
            U.container = V.width()
        }
        var R = U.container - U.handle - 0;
        var X = function (b) {
            var c = H.attr("checked"),
                a = (c) ? R : 0,
                b = (arguments.length > 0) ? arguments[0] : true;
            if (b && I.enableFx) {
                G.stop().animate({
                    left: a
                }, I.duration, I.easing);
                J.stop().animate({
                    width: a + 0
                }, I.duration, I.easing);
                L.stop().animate({
                    marginLeft: a - R
                }, I.duration, I.easing);
                M.stop().animate({
                    marginRight: -a
                }, I.duration, I.easing)
            } else {
                G.css("left", a);
                J.css("width", a + 0);
                L.css("marginLeft", a - R);
                M.css("marginRight", -a)
            }
        };
        X(false);
        var Q = function (a) {
            return a.pageX || ((a.originalEvent.changedTouches) ? a.originalEvent.changedTouches[0].pageX : 0)
        };
        V.bind("mousedown.iButton touchstart.iButton", function (a) {
            if (E(a.target).is(Z) || K || (!I.allowRadioUncheck && H.is(":radio:checked"))) {
                return
            }
            a.preventDefault();
            O.clicked = G;
            W.position = Q(a);
            W.offset = W.position - (parseInt(G.css("left"), 10) || 0);
            W.time = (new Date()).getTime();
            return false
        });
        if (I.enableDrag) {
            E(document).bind("mousemove.iButton_" + T + " touchmove.iButton_" + T, function (c) {
                if (O.clicked != G) {
                    return
                }
                c.preventDefault();
                var a = Q(c);
                if (a != W.offset) {
                    O.dragging = true;
                    V.addClass(I.classHandleActive)
                }
                var b = Math.min(1, Math.max(0, (a - W.offset) / R));
                G.css("left", b * R);
                J.css("width", b * R + 10);
                M.css("marginRight", -b * R);
                L.css("marginLeft", -(1 - b) * R);
                return false
            })
        }
        E(document).bind("mouseup.iButton_" + T + " touchend.iButton_" + T, function (d) {
            if (O.clicked != G) {
                return false
            }
            d.preventDefault();
            var f = true;
            if (!O.dragging || (((new Date()).getTime() - W.time) < I.clickOffset)) {
                var b = H.attr("checked");
                H.attr("checked", !b);
                if (E.isFunction(I.click)) {
                    I.click.apply(S, [!b, H, I])
                }
            } else {
                var a = Q(d);
                var c = (a - W.offset) / R;
                var b = (c >= 0.5);
                if (H.is(":checked") == b) {
                    f = false
                }
                H.attr("checked", b)
            }
            V.removeClass(I.classHandleActive);
            O.clicked = null;
            O.dragging = null;
            if (f) {
                H.trigger("change")
            } else {
                X()
            }
            return false
        });
        H.bind("change.iButton", function () {
            X();
            if (H.is(":radio")) {
                var b = H[0];
                var a = E(b.form ? b.form[b.name] : ":radio[name=" + b.name + "]");
                a.filter(":not(:checked)").iButton("repaint")
            }
            if (E.isFunction(I.change)) {
                I.change.apply(S, [H, I])
            }
        }).bind("focus.iButton", function () {
            V.addClass(I.classFocus)
        }).bind("blur.iButton", function () {
            V.removeClass(I.classFocus)
        });
        if (E.isFunction(I.click)) {
            H.bind("click.iButton", function () {
                I.click.apply(S, [H.attr("checked"), H, I])
            })
        }
        if (H.is(":disabled")) {
            this.disable(true)
        }
        if (E.browser.msie) {
            V.find("*").andSelf().attr("unselectable", "on");
            H.bind("click.iButton", function () {
                H.triggerHandler("change.iButton")
            })
        }
        if (E.isFunction(I.init)) {
            I.init.apply(S, [H, I])
        }
    };
    var F = {
        duration: 200,
        easing: "swing",
        labelOn: "ON",
        labelOff: "OFF",
        resizeHandle: "auto",
        resizeContainer: "auto",
        enableDrag: true,
        enableFx: true,
        allowRadioUncheck: false,
        clickOffset: 120,
        classContainer: "ibutton-container",
        classDisabled: "ibutton-disabled",
        classFocus: "ibutton-focus",
        classLabelOn: "ibutton-label-on",
        classLabelOff: "ibutton-label-off",
        classHandle: "ibutton-handle",
        classHandleMiddle: "ibutton-handle-middle",
        classHandleRight: "ibutton-handle-right",
        classHandleActive: "ibutton-active-handle",
        classPaddingLeft: "ibutton-padding-left",
        classPaddingRight: "ibutton-padding-right",
        init: null,
        change: null,
        click: null,
        disable: null,
        destroy: null
    }, B = F.labelOn,
        D = F.labelOff
})(jQuery);