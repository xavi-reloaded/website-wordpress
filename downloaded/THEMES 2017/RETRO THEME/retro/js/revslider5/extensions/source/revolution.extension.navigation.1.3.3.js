/********************************************
 * REVOLUTION 5.2 EXTENSION - NAVIGATION
 * @version: 1.3.3 (14.02.2017)
 * @requires jquery.themepunch.revolution.js
 * @author ThemePunch
 *********************************************/
!function ( a ) {
    "use strict";
    var b = jQuery.fn.revolution,
        c = b.is_mobile(),
        d = {
            alias: "Navigation Min JS",
            name: "revolution.extensions.navigation.min.js",
            min_core: "5.4.0",
            version: "1.3.3"
        };
    jQuery.extend( !0, b, {
        hideUnHideNav: function ( a ) {
            var b = a.c.width(),
                c = a.navigation.arrows,
                d = a.navigation.bullets,
                e = a.navigation.thumbnails,
                f = a.navigation.tabs;
            m( c ) && y( a.c.find( ".tparrows" ), c.hide_under, b, c.hide_over ),
                m( d ) && y( a.c.find( ".tp-bullets" ), d.hide_under, b, d.hide_over ),
                m( e ) && y( a.c.parent().find( ".tp-thumbs" ), e.hide_under, b, e.hide_over ),
                m( f ) && y( a.c.parent().find( ".tp-tabs" ), f.hide_under, b, f.hide_over ),
                x( a )
        },
        resizeThumbsTabs: function ( a, b ) {
            if ( a.navigation && a.navigation.tabs.enable || a.navigation && a.navigation.thumbnails.enable ) {
                var c = ( jQuery( window ).width() - 480 ) / 500,
                    d = new punchgs.TimelineLite,
                    e = a.navigation.tabs,
                    g = a.navigation.thumbnails,
                    h = a.navigation.bullets;
                if ( d.pause(), c = c > 1 ? 1 : c < 0 ? 0 : c, m( e ) && ( b || e.width > e.min_width ) && f( c, d, a.c, e, a.slideamount, "tab" ), m( g ) && ( b || g.width > g.min_width ) && f( c, d, a.c, g, a.slideamount, "thumb" ), m( h ) && b ) {
                    var i = a.c.find( ".tp-bullets" );
                    i.find( ".tp-bullet" ).each( function ( a ) {
                        var b = jQuery( this ),
                            c = a + 1,
                            d = b.outerWidth() + parseInt( void 0 === h.space ? 0 : h.space, 0 ),
                            e = b.outerHeight() + parseInt( void 0 === h.space ? 0 : h.space, 0 );
                        "vertical" === h.direction ? ( b.css( {
                            top: ( c - 1 ) * e + "px",
                            left: "0px"
                        } ), i.css( {
                            height: ( c - 1 ) * e + b.outerHeight(),
                            width: b.outerWidth()
                        } ) ) : ( b.css( {
                            left: ( c - 1 ) * d + "px",
                            top: "0px"
                        } ), i.css( {
                            width: ( c - 1 ) * d + b.outerWidth(),
                            height: b.outerHeight()
                        } ) )
                    } )
                }
                d.play(),
                    x( a )
            }
            return !0
        },
        updateNavIndexes: function ( a ) {
            function d( a ) {
                c.find( a ).lenght > 0 && c.find( a ).each( function ( a ) {
                    jQuery( this ).data( "liindex", a )
                } )
            }
            var c = a.c;
            d( ".tp-tab" ),
                d( ".tp-bullet" ),
                d( ".tp-thumb" ),
                b.resizeThumbsTabs( a, !0 ),
                b.manageNavigation( a )
        },
        manageNavigation: function ( a ) {
            var c = b.getHorizontalOffset( a.c.parent(), "left" ),
                d = b.getHorizontalOffset( a.c.parent(), "right" );
            // ORIGINAL: retrowp
            // m( a.navigation.bullets ) && ( "fullscreen" != a.sliderLayout && "fullwidth" != a.sliderLayout && ( a.navigation.bullets.h_offset_old = void 0 === a.navigation.bullets.h_offset_old ? a.navigation.bullets.h_offset : a.navigation.bullets.h_offset_old, a.navigation.bullets.h_offset = "center" === a.navigation.bullets.h_align ? a.navigation.bullets.h_offset_old + c / 2 - d / 2 : a.navigation.bullets.h_offset_old + c - d ), t( a.c.find( ".tp-bullets" ), a.navigation.bullets, a ) ),
            // START: retrowp
            m( a.navigation.bullets ) && ( "fullscreen" != a.sliderLayout && "fullwidth" != a.sliderLayout && ( a.navigation.bullets.h_offset_old = void 0 === a.navigation.bullets.h_offset_old ? a.navigation.bullets.h_offset : a.navigation.bullets.h_offset_old, a.navigation.bullets.h_offset = "center" === a.navigation.bullets.h_align ? a.navigation.bullets.h_offset_old + c / 2 - d / 2 : a.navigation.bullets.h_offset_old + c - d ), 'retro' !== a.navigation.bullets.style && t( a.c.find( ".tp-bullets" ), a.navigation.bullets, a ) ),
                // END: retrowp
                m( a.navigation.thumbnails ) && t( a.c.parent().find( ".tp-thumbs" ), a.navigation.thumbnails, a ),
                m( a.navigation.tabs ) && t( a.c.parent().find( ".tp-tabs" ), a.navigation.tabs, a ),
                m( a.navigation.arrows ) && ( "fullscreen" != a.sliderLayout && "fullwidth" != a.sliderLayout && ( a.navigation.arrows.left.h_offset_old = void 0 === a.navigation.arrows.left.h_offset_old ? a.navigation.arrows.left.h_offset : a.navigation.arrows.left.h_offset_old, a.navigation.arrows.left.h_offset = "right" === a.navigation.arrows.left.h_align ? a.navigation.arrows.left.h_offset_old + d : a.navigation.arrows.left.h_offset_old + c, a.navigation.arrows.right.h_offset_old = void 0 === a.navigation.arrows.right.h_offset_old ? a.navigation.arrows.right.h_offset : a.navigation.arrows.right.h_offset_old, a.navigation.arrows.right.h_offset = "right" === a.navigation.arrows.right.h_align ? a.navigation.arrows.right.h_offset_old + d : a.navigation.arrows.right.h_offset_old + c ), t( a.c.find( ".tp-leftarrow.tparrows" ), a.navigation.arrows.left, a ), t( a.c.find( ".tp-rightarrow.tparrows" ), a.navigation.arrows.right, a ) ),
                m( a.navigation.thumbnails ) && e( a.c.parent().find( ".tp-thumbs" ), a.navigation.thumbnails ),
                m( a.navigation.tabs ) && e( a.c.parent().find( ".tp-tabs" ), a.navigation.tabs )
        },
        createNavigation: function ( a, f ) {
            if ( "stop" === b.compare_version( d ).check )
                return !1;
            var g = a.parent(),
                j = f.navigation.arrows,
                n = f.navigation.bullets,
                r = f.navigation.thumbnails,
                s = f.navigation.tabs,
                t = m( j ),
                v = m( n ),
                x = m( r ),
                y = m( s );
            h( a, f ),
                i( a, f ),
                t && q( a, j, f ),
                f.li.each( function ( b ) {
                    var c = jQuery( f.li[f.li.length - 1 - b] ),
                        d = jQuery( this );
                    v && ( f.navigation.bullets.rtl ? u( a, n, c, f ) : u( a, n, d, f ) ),
                        x && ( f.navigation.thumbnails.rtl ? w( a, r, c, "tp-thumb", f ) : w( a, r, d, "tp-thumb", f ) ),
                        y && ( f.navigation.tabs.rtl ? w( a, s, c, "tp-tab", f ) : w( a, s, d, "tp-tab", f ) )
                } ),
                a.bind( "revolution.slide.onafterswap revolution.nextslide.waiting", function () {
                    var b = 0 == a.find( ".next-revslide" ).length ? a.find( ".active-revslide" ).data( "index" ) : a.find( ".next-revslide" ).data( "index" );
                    // ORIGINAL: retrowp
                    // a.find( ".tp-bullet" ).each( function () {
                    // START: retrowp
                    var _a = a;
                    if ( 'retro' === f.navigation.bullets.style )
                        _a = a.parent( );
                    _a.find( ".tp-bullet" ).each( function () {
                        // END: retrowp
                        var a = jQuery( this );
                        a.data( "liref" ) === b ? a.addClass( "selected" ) : a.removeClass( "selected" )
                    } ),
                        // START: retrowp
                        paginTimeLine.restart( a, f.delay - 100 ),
                        // END: retrowp
                        g.find( ".tp-thumb, .tp-tab" ).each( function () {
                        var a = jQuery( this );
                        a.data( "liref" ) === b ? ( a.addClass( "selected" ), a.hasClass( "tp-tab" ) ? e( g.find( ".tp-tabs" ), s ) : e( g.find( ".tp-thumbs" ), r ) ) : a.removeClass( "selected" )
                    } );
                    var c = 0,
                        d = !1;
                    f.thumbs && jQuery.each( f.thumbs, function ( a, e ) {
                        c = d === !1 ? a : c,
                            d = e.id === b || a === b || d
                    } );
                    var h = c > 0 ? c - 1 : f.slideamount - 1,
                        i = c + 1 == f.slideamount ? 0 : c + 1;
                    // ORIGINAL: retrowp
                    // if ( j.enable === !0 ) {
                    // START: retrowp
                    if ( j.enable === !0 && t ) {
                        // END: retrowp
                        var k = j.tmp;
                        if ( void 0 != f.thumbs[h] && jQuery.each( f.thumbs[h].params, function ( a, b ) {
                            k = k.replace( b.from, b.to )
                        } ), j.left.j.html( k ), k = j.tmp, i > f.slideamount )
                            return;
                        jQuery.each( f.thumbs[i].params, function ( a, b ) {
                            k = k.replace( b.from, b.to )
                        } ),
                            j.right.j.html( k ),
                            punchgs.TweenLite.set( j.left.j.find( ".tp-arr-imgholder" ), {
                                backgroundImage: "url(" + f.thumbs[h].src + ")"
                            } ),
                            punchgs.TweenLite.set( j.right.j.find( ".tp-arr-imgholder" ), {
                                backgroundImage: "url(" + f.thumbs[i].src + ")"
                            } )
                    }
                } ),
                l( j ),
                l( n ),
                l( r ),
                l( s ),
                g.on( "mouseenter mousemove", function () {
                    // ORIGINAL: retrowp
                    // g.hasClass( "tp-mouseover" ) || ( g.addClass( "tp-mouseover" ), punchgs.TweenLite.killDelayedCallsTo( p ), t && j.hide_onleave && p( g.find( ".tparrows" ), j, "show" ), v && n.hide_onleave && p( g.find( ".tp-bullets" ), n, "show" ), x && r.hide_onleave && p( g.find( ".tp-thumbs" ), r, "show" ), y && s.hide_onleave && p( g.find( ".tp-tabs" ), s, "show" ), c && ( g.removeClass( "tp-mouseover" ), o( a, f ) ) )
                    // START: retrowp
                    g.hasClass( "tp-mouseover" ) || ( g.addClass( "tp-mouseover" ), punchgs.TweenLite.killDelayedCallsTo( p ), t && j.hide_onleave && 'retro' !== j.style && p( g.find( ".tparrows" ), j, "show" ), v && n.hide_onleave && 'retro' !== n.style && p( g.find( ".tp-bullets" ), n, "show" ), x && r.hide_onleave && p( g.find( ".tp-thumbs" ), r, "show" ), y && s.hide_onleave && p( g.find( ".tp-tabs" ), s, "show" ), c && ( g.removeClass( "tp-mouseover" ), o( a, f ) ) )
                    // END: retrowp
                } ),
                g.on( "mouseleave", function () {
                    g.removeClass( "tp-mouseover" ),
                        o( a, f )
                } ),
                // ORIGINAL: retrowp
                // t && j.hide_onleave && p( g.find( ".tparrows" ), j, "hide", 0 ),
                // v && n.hide_onleave && p( g.find( ".tp-bullets" ), n, "hide", 0 ),
                // START: retrowp
                t && j.hide_onleave && 'retro' !== j.style && p( g.find( ".tparrows" ), j, "hide", 0 ),
                v && n.hide_onleave && 'retro' !== n.style && p( g.find( ".tp-bullets" ), n, "hide", 0 ),
                // END: retrowp
                x && r.hide_onleave && p( g.find( ".tp-thumbs" ), r, "hide", 0 ),
                y && s.hide_onleave && p( g.find( ".tp-tabs" ), s, "hide", 0 ),
                x && k( g.find( ".tp-thumbs" ), f ),
                y && k( g.find( ".tp-tabs" ), f ),
                "carousel" === f.sliderType && k( a, f, !0 ),
                ( "on" === f.navigation.touch.touchOnDesktop || "on" == f.navigation.touch.touchenabled && c ) && k( a, f, "swipebased" )
        }
    } );
    // START: retrowp
    var paginTimeLine = {
        timeline: null,
        start: function ( duration ) {
            if ( this.timeline ) {
                this.timeline.animate( {
                    'width': "100%"
                }, {
                    duration: duration,
                    queue: false,
                    easing: "linear",
                    done: function () {
                        var ob = jQuery( this );
                        setTimeout( function () {
                            ob.width( 0 );
                        }, 300 );
                    }
                } );
            }
        },
        stop: function ( container ) {
            this.selected( container );
            if ( this.timeline ) {
                this.timeline.stop( );
            }
        },
        selected: function ( container ) {
            if ( container ) {
                this.timeline = container.parent( ).find( '.tp-bullets .tp-bullet.selected' ).next( '.separator' ).find( 'div' );
            }
            return this.timeline;
        },
        reset: function ( container ) {
            container.parent( ).find( '.tp-bullets .separator div' ).each( function ( ) {
                jQuery( this ).stop( ).width( 0 );
            } );
        },
        restart: function ( container, duration ) {
            this.reset( container );
            this.selected( container );
            this.start( duration );
        }
    };
// END: retrowp
    var e = function ( a, b ) {
        var d = ( a.hasClass( "tp-thumbs" ) ? ".tp-thumbs" : ".tp-tabs", a.hasClass( "tp-thumbs" ) ? ".tp-thumb-mask" : ".tp-tab-mask" ),
            e = a.hasClass( "tp-thumbs" ) ? ".tp-thumbs-inner-wrapper" : ".tp-tabs-inner-wrapper",
            f = a.hasClass( "tp-thumbs" ) ? ".tp-thumb" : ".tp-tab",
            g = a.find( d ),
            h = g.find( e ),
            i = b.direction,
            j = "vertical" === i ? g.find( f ).first().outerHeight( !0 ) + b.space : g.find( f ).first().outerWidth( !0 ) + b.space,
            k = "vertical" === i ? g.height() : g.width(),
            l = parseInt( g.find( f + ".selected" ).data( "liindex" ), 0 ),
            m = k / j,
            n = "vertical" === i ? g.height() : g.width(),
            o = 0 - l * j,
            p = "vertical" === i ? h.height() : h.width(),
            q = o < 0 - ( p - n ) ? 0 - ( p - n ) : q > 0 ? 0 : o,
            r = h.data( "offset" );
        m > 2 && ( q = o - ( r + j ) <= 0 ? o - ( r + j ) < 0 - j ? r : q + j : q, q = o - j + r + k < j && o + ( Math.round( m ) - 2 ) * j < r ? o + ( Math.round( m ) - 2 ) * j : q ),
            q = q < 0 - ( p - n ) ? 0 - ( p - n ) : q > 0 ? 0 : q,
            "vertical" !== i && g.width() >= h.width() && ( q = 0 ),
            "vertical" === i && g.height() >= h.height() && ( q = 0 ),
            a.hasClass( "dragged" ) || ( "vertical" === i ? h.data( "tmmove", punchgs.TweenLite.to( h, .5, {
            top: q + "px",
            ease: punchgs.Power3.easeInOut
        } ) ) : h.data( "tmmove", punchgs.TweenLite.to( h, .5, {
            left: q + "px",
            ease: punchgs.Power3.easeInOut
        } ) ), h.data( "offset", q ) )
    },
        f = function ( a, b, c, d, e, f ) {
            var g = c.parent().find( ".tp-" + f + "s" ),
                h = g.find( ".tp-" + f + "s-inner-wrapper" ),
                i = g.find( ".tp-" + f + "-mask" ),
                j = d.width * a < d.min_width ? d.min_width : Math.round( d.width * a ),
                k = Math.round( j / d.width * d.height ),
                l = "vertical" === d.direction ? j : j * e + d.space * ( e - 1 ),
                m = "vertical" === d.direction ? k * e + d.space * ( e - 1 ) : k,
                n = "vertical" === d.direction ? {
                    width: j + "px"
                }
            : {
                height: k + "px"
            };
            b.add( punchgs.TweenLite.set( g, n ) ),
                b.add( punchgs.TweenLite.set( h, {
                    width: l + "px",
                    height: m + "px"
                } ) ),
                b.add( punchgs.TweenLite.set( i, {
                    width: l + "px",
                    height: m + "px"
                } ) );
            var o = h.find( ".tp-" + f );
            return o && jQuery.each( o, function ( a, c ) {
                "vertical" === d.direction ? b.add( punchgs.TweenLite.set( c, {
                    top: a * ( k + parseInt( void 0 === d.space ? 0 : d.space, 0 ) ),
                    width: j + "px",
                    height: k + "px"
                } ) ) : "horizontal" === d.direction && b.add( punchgs.TweenLite.set( c, {
                    left: a * ( j + parseInt( void 0 === d.space ? 0 : d.space, 0 ) ),
                    width: j + "px",
                    height: k + "px"
                } ) )
            } ),
                b
        },
        g = function ( a ) {
            var b = 0,
                c = 0,
                d = 0,
                e = 0,
                f = 1,
                g = 1,
                h = 1;
            return "detail" in a && ( c = a.detail ),
                "wheelDelta" in a && ( c = -a.wheelDelta / 120 ),
                "wheelDeltaY" in a && ( c = -a.wheelDeltaY / 120 ),
                "wheelDeltaX" in a && ( b = -a.wheelDeltaX / 120 ),
                "axis" in a && a.axis === a.HORIZONTAL_AXIS && ( b = c, c = 0 ),
                d = b * f,
                e = c * f,
                "deltaY" in a && ( e = a.deltaY ),
                "deltaX" in a && ( d = a.deltaX ),
                ( d || e ) && a.deltaMode && ( 1 == a.deltaMode ? ( d *= g, e *= g ) : ( d *= h, e *= h ) ),
                d && !b && ( b = d < 1 ? -1 : 1 ),
                e && !c && ( c = e < 1 ? -1 : 1 ),
                e = navigator.userAgent.match( /mozilla/i ) ? 10 * e : e,
                ( e > 300 || e < -300 ) && ( e /= 10 ), {
                spinX: b,
                spinY: c,
                pixelX: d,
                pixelY: e
            }
        },
        h = function ( a, c ) {
            "on" === c.navigation.keyboardNavigation && jQuery( document ).keydown( function ( d ) {
                ( "horizontal" == c.navigation.keyboard_direction && 39 == d.keyCode || "vertical" == c.navigation.keyboard_direction && 40 == d.keyCode ) && ( c.sc_indicator = "arrow", c.sc_indicator_dir = 0, b.callingNewSlide( a, 1 ) ),
                    ( "horizontal" == c.navigation.keyboard_direction && 37 == d.keyCode || "vertical" == c.navigation.keyboard_direction && 38 == d.keyCode ) && ( c.sc_indicator = "arrow", c.sc_indicator_dir = 1, b.callingNewSlide( a, -1 ) )
            } )
        },
        i = function ( a, c ) {
            if ( "on" === c.navigation.mouseScrollNavigation || "carousel" === c.navigation.mouseScrollNavigation ) {
                c.isIEEleven = !!navigator.userAgent.match( /Trident.*rv\:11\./ ),
                    c.isSafari = !!navigator.userAgent.match( /safari/i ),
                    c.ischrome = !!navigator.userAgent.match( /chrome/i );
                var d = c.ischrome ? -49 : c.isIEEleven || c.isSafari ? -9 : navigator.userAgent.match( /mozilla/i ) ? -29 : -49,
                    e = c.ischrome ? 49 : c.isIEEleven || c.isSafari ? 9 : navigator.userAgent.match( /mozilla/i ) ? 29 : 49;
                a.on( "mousewheel DOMMouseScroll", function ( f ) {
                    var h = g( f.originalEvent ),
                        i = a.find( ".tp-revslider-slidesli.active-revslide" ).index(),
                        j = a.find( ".tp-revslider-slidesli.processing-revslide" ).index(),
                        k = i != -1 && 0 == i || j != -1 && 0 == j,
                        l = i != -1 && i == c.slideamount - 1 || 1 != j && j == c.slideamount - 1,
                        m = !0;
                    "carousel" == c.navigation.mouseScrollNavigation && ( k = l = !1 ),
                        j == -1 ? h.pixelY < d ? ( k || ( c.sc_indicator = "arrow", "reverse" !== c.navigation.mouseScrollReverse && ( c.sc_indicator_dir = 1, b.callingNewSlide( a, -1 ) ), m = !1 ), l || ( c.sc_indicator = "arrow", "reverse" === c.navigation.mouseScrollReverse && ( c.sc_indicator_dir = 0, b.callingNewSlide( a, 1 ) ), m = !1 ) ) : h.pixelY > e && ( l || ( c.sc_indicator = "arrow", "reverse" !== c.navigation.mouseScrollReverse && ( c.sc_indicator_dir = 0, b.callingNewSlide( a, 1 ) ), m = !1 ), k || ( c.sc_indicator = "arrow", "reverse" === c.navigation.mouseScrollReverse && ( c.sc_indicator_dir = 1, b.callingNewSlide( a, -1 ) ), m = !1 ) ) : m = !1;
                    var n = c.c.offset().top - jQuery( "body" ).scrollTop(),
                        o = n + c.c.height();
                    return "carousel" != c.navigation.mouseScrollNavigation ? ( "reverse" !== c.navigation.mouseScrollReverse && ( n > 0 && h.pixelY > 0 || o < jQuery( window ).height() && h.pixelY < 0 ) && ( m = !0 ), "reverse" === c.navigation.mouseScrollReverse && ( n < 0 && h.pixelY < 0 || o > jQuery( window ).height() && h.pixelY > 0 ) && ( m = !0 ) ) : m = !1,
                        0 == m ? ( f.preventDefault( f ), !1 ) : void 0
                } )
            }
        },
        j = function ( a, b, d ) {
            return a = c ? jQuery( d.target ).closest( "." + a ).length || jQuery( d.srcElement ).closest( "." + a ).length : jQuery( d.toElement ).closest( "." + a ).length || jQuery( d.originalTarget ).closest( "." + a ).length,
                a === !0 || 1 === a ? 1 : 0
        },
        k = function ( a, d, e ) {
            var f = d.carousel;
            jQuery( ".bullet, .bullets, .tp-bullets, .tparrows" ).addClass( "noSwipe" ),
                f.Limit = "endless";
            var h = ( c || "Firefox" === b.get_browser(), a ),
                i = "vertical" === d.navigation.thumbnails.direction || "vertical" === d.navigation.tabs.direction ? "none" : "vertical",
                k = d.navigation.touch.swipe_direction || "horizontal";
            i = "swipebased" == e && "vertical" == k ? "none" : e ? "vertical" : i,
                jQuery.fn.swipetp || ( jQuery.fn.swipetp = jQuery.fn.swipe ),
                jQuery.fn.swipetp.defaults && jQuery.fn.swipetp.defaults.excludedElements || jQuery.fn.swipetp.defaults || ( jQuery.fn.swipetp.defaults = new Object ),
                jQuery.fn.swipetp.defaults.excludedElements = "label, button, input, select, textarea, .noSwipe",
                h.swipetp( {
                    allowPageScroll: i,
                    triggerOnTouchLeave: !0,
                    treshold: d.navigation.touch.swipe_treshold,
                    fingers: d.navigation.touch.swipe_min_touches,
                    excludeElements: jQuery.fn.swipetp.defaults.excludedElements,
                    swipeStatus: function ( c, e, g, h, i, l, m ) {
                        var n = j( "rev_slider_wrapper", a, c ),
                            o = j( "tp-thumbs", a, c ),
                            p = j( "tp-tabs", a, c ),
                            q = jQuery( this ).attr( "class" ),
                            r = !!q.match( /tp-tabs|tp-thumb/gi );
                        if ( "carousel" === d.sliderType && ( ( "move" === e || "end" === e || "cancel" == e ) && d.dragStartedOverSlider && !d.dragStartedOverThumbs && !d.dragStartedOverTabs || "start" === e && n > 0 && 0 === o && 0 === p ) )
                            switch ( d.dragStartedOverSlider = !0, h = g && g.match( /left|up/g ) ? Math.round( h * -1 ) : h = Math.round( 1 * h ), e ) {
                                case "start":
                                    void 0 !== f.positionanim && ( f.positionanim.kill(), f.slide_globaloffset = "off" === f.infinity ? f.slide_offset : b.simp( f.slide_offset, f.maxwidth ) ),
                                        f.overpull = "none",
                                        f.wrap.addClass( "dragged" );
                                    break;
                                case "move":
                                    if ( d.c.find( ".tp-withaction" ).addClass( "tp-temporarydisabled" ), f.slide_offset = "off" === f.infinity ? f.slide_globaloffset + h : b.simp( f.slide_globaloffset + h, f.maxwidth ), "off" === f.infinity ) {
                                        var s = "center" === f.horizontal_align ? ( f.wrapwidth / 2 - f.slide_width / 2 - f.slide_offset ) / f.slide_width : ( 0 - f.slide_offset ) / f.slide_width;
                                        "none" !== f.overpull && 0 !== f.overpull || !( s < 0 || s > d.slideamount - 1 ) ? s >= 0 && s <= d.slideamount - 1 && ( s >= 0 && h > f.overpull || s <= d.slideamount - 1 && h < f.overpull ) && ( f.overpull = 0 ) : f.overpull = h,
                                            f.slide_offset = s < 0 ? f.slide_offset + ( f.overpull - h ) / 1.1 + Math.sqrt( Math.abs( ( f.overpull - h ) / 1.1 ) ) : s > d.slideamount - 1 ? f.slide_offset + ( f.overpull - h ) / 1.1 - Math.sqrt( Math.abs( ( f.overpull - h ) / 1.1 ) ) : f.slide_offset
                                    }
                                    b.organiseCarousel( d, g, !0, !0 );
                                    break;
                                case "end":
                                case "cancel":
                                    f.slide_globaloffset = f.slide_offset,
                                        f.wrap.removeClass( "dragged" ),
                                        b.carouselToEvalPosition( d, g ),
                                        d.dragStartedOverSlider = !1,
                                        d.dragStartedOverThumbs = !1,
                                        d.dragStartedOverTabs = !1,
                                        setTimeout( function () {
                                            d.c.find( ".tp-withaction" ).removeClass( "tp-temporarydisabled" )
                                        }, 19 )
                            }
                        else {
                            if ( ( "move" !== e && "end" !== e && "cancel" != e || d.dragStartedOverSlider || !d.dragStartedOverThumbs && !d.dragStartedOverTabs ) && !( "start" === e && n > 0 && ( o > 0 || p > 0 ) ) ) {
                                if ( "end" == e && !r ) {
                                    if ( d.sc_indicator = "arrow", "horizontal" == k && "left" == g || "vertical" == k && "up" == g )
                                        return d.sc_indicator_dir = 0, b.callingNewSlide( d.c, 1 ), !1;
                                    if ( "horizontal" == k && "right" == g || "vertical" == k && "down" == g )
                                        return d.sc_indicator_dir = 1, b.callingNewSlide( d.c, -1 ), !1
                                }
                                return d.dragStartedOverSlider = !1,
                                    d.dragStartedOverThumbs = !1,
                                    d.dragStartedOverTabs = !1,
                                    !0
                            }
                            o > 0 && ( d.dragStartedOverThumbs = !0 ),
                                p > 0 && ( d.dragStartedOverTabs = !0 );
                            var t = d.dragStartedOverThumbs ? ".tp-thumbs" : ".tp-tabs",
                                u = d.dragStartedOverThumbs ? ".tp-thumb-mask" : ".tp-tab-mask",
                                v = d.dragStartedOverThumbs ? ".tp-thumbs-inner-wrapper" : ".tp-tabs-inner-wrapper",
                                w = d.dragStartedOverThumbs ? ".tp-thumb" : ".tp-tab",
                                x = d.dragStartedOverThumbs ? d.navigation.thumbnails : d.navigation.tabs;
                            h = g && g.match( /left|up/g ) ? Math.round( h * -1 ) : h = Math.round( 1 * h );
                            var y = a.parent().find( u ),
                                z = y.find( v ),
                                A = x.direction,
                                B = "vertical" === A ? z.height() : z.width(),
                                C = "vertical" === A ? y.height() : y.width(),
                                D = "vertical" === A ? y.find( w ).first().outerHeight( !0 ) + x.space : y.find( w ).first().outerWidth( !0 ) + x.space,
                                E = void 0 === z.data( "offset" ) ? 0 : parseInt( z.data( "offset" ), 0 ),
                                F = 0;
                            switch ( e ) {
                                case "start":
                                    a.parent().find( t ).addClass( "dragged" ),
                                        E = "vertical" === A ? z.position().top : z.position().left,
                                        z.data( "offset", E ),
                                        z.data( "tmmove" ) && z.data( "tmmove" ).pause();
                                    break;
                                case "move":
                                    if ( B <= C )
                                        return !1;
                                    F = E + h,
                                        F = F > 0 ? "horizontal" === A ? F - z.width() * ( F / z.width() * F / z.width() ) : F - z.height() * ( F / z.height() * F / z.height() ) : F;
                                    var G = "vertical" === A ? 0 - ( z.height() - y.height() ) : 0 - ( z.width() - y.width() );
                                    F = F < G ? "horizontal" === A ? F + z.width() * ( F - G ) / z.width() * ( F - G ) / z.width() : F + z.height() * ( F - G ) / z.height() * ( F - G ) / z.height() : F,
                                        "vertical" === A ? punchgs.TweenLite.set( z, {
                                            top: F + "px"
                                        } ) : punchgs.TweenLite.set( z, {
                                        left: F + "px"
                                    } );
                                    break;
                                case "end":
                                case "cancel":
                                    if ( r )
                                        return F = E + h, F = "vertical" === A ? F < 0 - ( z.height() - y.height() ) ? 0 - ( z.height() - y.height() ) : F : F < 0 - ( z.width() - y.width() ) ? 0 - ( z.width() - y.width() ) : F, F = F > 0 ? 0 : F, F = Math.abs( h ) > D / 10 ? h <= 0 ? Math.floor( F / D ) * D : Math.ceil( F / D ) * D : h < 0 ? Math.ceil( F / D ) * D : Math.floor( F / D ) * D, F = "vertical" === A ? F < 0 - ( z.height() - y.height() ) ? 0 - ( z.height() - y.height() ) : F : F < 0 - ( z.width() - y.width() ) ? 0 - ( z.width() - y.width() ) : F, F = F > 0 ? 0 : F, "vertical" === A ? punchgs.TweenLite.to( z, .5, {
                                            top: F + "px",
                                            ease: punchgs.Power3.easeOut
                                        } ) : punchgs.TweenLite.to( z, .5, {
                                            left: F + "px",
                                            ease: punchgs.Power3.easeOut
                                        } ), F = F ? F : "vertical" === A ? z.position().top : z.position().left, z.data( "offset", F ), z.data( "distance", h ), setTimeout( function () {
                                            d.dragStartedOverSlider = !1,
                                                d.dragStartedOverThumbs = !1,
                                                d.dragStartedOverTabs = !1
                                        }, 100 ), a.parent().find( t ).removeClass( "dragged" ), !1
                            }
                        }
                    }
                } )
        },
        l = function ( a ) {
            a.hide_delay = jQuery.isNumeric( parseInt( a.hide_delay, 0 ) ) ? a.hide_delay / 1e3 : .2,
                a.hide_delay_mobile = jQuery.isNumeric( parseInt( a.hide_delay_mobile, 0 ) ) ? a.hide_delay_mobile / 1e3 : .2
        },
        m = function ( a ) {
            return a && a.enable
        },
        n = function ( a ) {
            return a && a.enable && a.hide_onleave === !0 && ( void 0 === a.position || !a.position.match( /outer/g ) )
        },
        o = function ( a, b ) {
            var d = a.parent();
            // ORIGINAL: retrowp
            // n( b.navigation.arrows ) && punchgs.TweenLite.delayedCall( c ? b.navigation.arrows.hide_delay_mobile : b.navigation.arrows.hide_delay, p, [ d.find( ".tparrows" ), b.navigation.arrows, "hide" ] ),
            //    n( b.navigation.bullets ) && punchgs.TweenLite.delayedCall( c ? b.navigation.bullets.hide_delay_mobile : b.navigation.bullets.hide_delay, p, [ d.find( ".tp-bullets" ), b.navigation.bullets, "hide" ] ),
            // START: retrowp
            n( b.navigation.arrows ) && 'retro' !== b.navigation.arrows.style && punchgs.TweenLite.delayedCall( c ? b.navigation.arrows.hide_delay_mobile : b.navigation.arrows.hide_delay, p, [ d.find( ".tparrows" ), b.navigation.arrows, "hide" ] ),
                n( b.navigation.bullets ) && 'retro' !== b.navigation.bullets.style && punchgs.TweenLite.delayedCall( c ? b.navigation.bullets.hide_delay_mobile : b.navigation.bullets.hide_delay, p, [ d.find( ".tp-bullets" ), b.navigation.bullets, "hide" ] ),
                // END: retrowp
                n( b.navigation.thumbnails ) && punchgs.TweenLite.delayedCall( c ? b.navigation.thumbnails.hide_delay_mobile : b.navigation.thumbnails.hide_delay, p, [ d.find( ".tp-thumbs" ), b.navigation.thumbnails, "hide" ] ),
                n( b.navigation.tabs ) && punchgs.TweenLite.delayedCall( c ? b.navigation.tabs.hide_delay_mobile : b.navigation.tabs.hide_delay, p, [ d.find( ".tp-tabs" ), b.navigation.tabs, "hide" ] )
        },
        p = function ( a, b, c, d ) {
            switch ( d = void 0 === d ? .5 : d, c ) {
                case "show":
                    punchgs.TweenLite.to( a, d, {
                        autoAlpha: 1,
                        ease: punchgs.Power3.easeInOut,
                        overwrite: "auto"
                    } );
                    break;
                case "hide":
                    punchgs.TweenLite.to( a, d, {
                        autoAlpha: 0,
                        ease: punchgs.Power3.easeInOu,
                        overwrite: "auto"
                    } )
            }
        },
        q = function ( a, b, c ) {
            b.style = void 0 === b.style ? "" : b.style,
                b.left.style = void 0 === b.left.style ? "" : b.left.style,
                b.right.style = void 0 === b.right.style ? "" : b.right.style,
                b = b;
            // START: retrowp
            var _a = a;
            if ( 'retro' === b.style ) {
                if ( a.parent().find( '.tp-bullets' ).length === 0 ) {
                    a.parent().append( '<div class="tp-bullets ' + b.style + ' ' + 'horizontal' + '"><span></span></div>' );
                }
                a = a.parent().find( '.tp-bullets' ).find( 'span' ).eq( 0 );
            }
            // END: retrowp	
            0 === a.find( ".tp-leftarrow.tparrows" ).length && a.append( '<div class="tp-leftarrow tparrows ' + b.style + " " + b.left.style + '">' + b.tmp + "</div>" ),
                0 === a.find( ".tp-rightarrow.tparrows" ).length && a.append( '<div class="tp-rightarrow tparrows ' + b.style + " " + b.right.style + '">' + b.tmp + "</div>" );
            var d = a.find( ".tp-leftarrow.tparrows" ),
                e = a.find( ".tp-rightarrow.tparrows" );
            // ORIGINAL: retrowp
            // b.rtl ? ( d.click( function () {
            //     c.sc_indicator = "arrow",
            //         c.sc_indicator_dir = 0,
            //         a.revnext()
            // } ), e.click( function () {
            //     c.sc_indicator = "arrow",
            //         c.sc_indicator_dir = 1,
            //         a.revprev()
            // } ) ) : ( e.click( function () {
            //     c.sc_indicator = "arrow",
            //         c.sc_indicator_dir = 0,
            //         a.revnext()
            // } ), d.click( function () {
            //     c.sc_indicator = "arrow",
            //         c.sc_indicator_dir = 1,
            //         a.revprev()
            // } ) ),
            // START: retrowp
            b.rtl ? ( d.click( function () {
                c.sc_indicator = "arrow",
                    c.sc_indicator_dir = 0,
                    _a.revnext()
            } ), e.click( function () {
                c.sc_indicator = "arrow",
                    c.sc_indicator_dir = 1,
                    _a.revprev()
            } ) ) : ( e.click( function () {
                c.sc_indicator = "arrow",
                    c.sc_indicator_dir = 0,
                    _a.revnext()
            } ), d.click( function () {
                c.sc_indicator = "arrow",
                    c.sc_indicator_dir = 1,
                    _a.revprev()
            } ) ),
                // END: retrowp
                b.right.j = a.find( ".tp-rightarrow.tparrows" ),
                b.left.j = a.find( ".tp-leftarrow.tparrows" ),
                b.padding_top = parseInt( c.carousel.padding_top || 0, 0 ),
                b.padding_bottom = parseInt( c.carousel.padding_bottom || 0, 0 ),
                // ORIGINAL: retrowp
                // t( d, b.left, c ),
                // t( e, b.right, c ),
                // START: retrowp
                'retro' !== b.style && ( t( d, b.left, c ), t( e, b.right, c ) ),
                // END: retrowp
                b.left.opt = c,
                b.right.opt = c,
                "outer-left" != b.position && "outer-right" != b.position || ( c.outernav = !0 )
        },
        r = function ( a, b, c ) {
            var d = a.outerHeight( !0 ),
                f = ( a.outerWidth( !0 ), void 0 == b.opt ? 0 : 0 == c.conh ? c.height : c.conh ),
                g = "layergrid" == b.container ? "fullscreen" == c.sliderLayout ? c.height / 2 - c.gridheight[c.curWinRange] * c.bh / 2 : "on" == c.autoHeight || void 0 != c.minHeight && c.minHeight > 0 ? f / 2 - c.gridheight[c.curWinRange] * c.bh / 2 : 0 : 0,
                h = "top" === b.v_align ? {
                    top: "0px",
                    y: Math.round( b.v_offset + g ) + "px"
                }
            : "center" === b.v_align ? {
                top: "50%",
                y: Math.round( 0 - d / 2 + b.v_offset ) + "px"
            }
            : {
                top: "100%",
                y: Math.round( 0 - ( d + b.v_offset + g ) ) + "px"
            };
            a.hasClass( "outer-bottom" ) || punchgs.TweenLite.set( a, h )
        },
        s = function ( a, b, c ) {
            var e = ( a.outerHeight( !0 ), a.outerWidth( !0 ) ),
                f = "layergrid" == b.container ? "carousel" === c.sliderType ? 0 : c.width / 2 - c.gridwidth[c.curWinRange] * c.bw / 2 : 0,
                g = "left" === b.h_align ? {
                    left: "0px",
                    x: Math.round( b.h_offset + f ) + "px"
                }
            : "center" === b.h_align ? {
                left: "50%",
                x: Math.round( 0 - e / 2 + b.h_offset ) + "px"
            }
            : {
                left: "100%",
                x: Math.round( 0 - ( e + b.h_offset + f ) ) + "px"
            };
            punchgs.TweenLite.set( a, g )
        },
        t = function ( a, b, c ) {
            var d = a.closest( ".tp-simpleresponsive" ).length > 0 ? a.closest( ".tp-simpleresponsive" ) : a.closest( ".tp-revslider-mainul" ).length > 0 ? a.closest( ".tp-revslider-mainul" ) : a.closest( ".rev_slider_wrapper" ).length > 0 ? a.closest( ".rev_slider_wrapper" ) : a.parent().find( ".tp-revslider-mainul" ),
                e = d.width(),
                f = d.height();
            if ( r( a, b, c ), s( a, b, c ), "outer-left" !== b.position || "fullwidth" != b.sliderLayout && "fullscreen" != b.sliderLayout ? "outer-right" !== b.position || "fullwidth" != b.sliderLayout && "fullscreen" != b.sliderLayout || punchgs.TweenLite.set( a, {
                right: 0 - a.outerWidth() + "px",
                x: b.h_offset + "px"
            } ) : punchgs.TweenLite.set( a, {
                left: 0 - a.outerWidth() + "px",
                x: b.h_offset + "px"
            } ), a.hasClass( "tp-thumbs" ) || a.hasClass( "tp-tabs" ) ) {
                var g = a.data( "wr_padding" ),
                    h = a.data( "maxw" ),
                    i = a.data( "maxh" ),
                    j = a.hasClass( "tp-thumbs" ) ? a.find( ".tp-thumb-mask" ) : a.find( ".tp-tab-mask" ),
                    k = parseInt( b.padding_top || 0, 0 ),
                    l = parseInt( b.padding_bottom || 0, 0 );
                h > e && "outer-left" !== b.position && "outer-right" !== b.position ? ( punchgs.TweenLite.set( a, {
                    left: "0px",
                    x: 0,
                    maxWidth: e - 2 * g + "px"
                } ), punchgs.TweenLite.set( j, {
                    maxWidth: e - 2 * g + "px"
                } ) ) : ( punchgs.TweenLite.set( a, {
                    maxWidth: h + "px"
                } ), punchgs.TweenLite.set( j, {
                    maxWidth: h + "px"
                } ) ),
                    i + 2 * g > f && "outer-bottom" !== b.position && "outer-top" !== b.position ? ( punchgs.TweenLite.set( a, {
                        top: "0px",
                        y: 0,
                        maxHeight: k + l + ( f - 2 * g ) + "px"
                    } ), punchgs.TweenLite.set( j, {
                        maxHeight: k + l + ( f - 2 * g ) + "px"
                    } ) ) : ( punchgs.TweenLite.set( a, {
                    maxHeight: i + "px"
                } ), punchgs.TweenLite.set( j, {
                    maxHeight: i + "px"
                } ) ),
                    "outer-left" !== b.position && "outer-right" !== b.position && ( k = 0, l = 0 ),
                    b.span === !0 && "vertical" === b.direction ? ( punchgs.TweenLite.set( a, {
                        maxHeight: k + l + ( f - 2 * g ) + "px",
                        height: k + l + ( f - 2 * g ) + "px",
                        top: 0 - k,
                        y: 0
                    } ), r( j, b, c ) ) : b.span === !0 && "horizontal" === b.direction && ( punchgs.TweenLite.set( a, {
                    maxWidth: "100%",
                    width: e - 2 * g + "px",
                    left: 0,
                    x: 0
                } ), s( j, b, c ) )
            }
        },
        u = function ( a, b, c, d ) {
            // ORIGINAL: retrowp
            // 0 === a.find( ".tp-bullets" ).length && ( b.style = void 0 === b.style ? "" : b.style, a.append( '<div class="tp-bullets ' + b.style + " " + b.direction + '"></div>' ) );
            // START: retrowp
            var li_length = d.allli.length;
            var _a = a;
            if ( 'retro' === b.style ) {
                a = a.parent();
                b.direction = 'horizontal';
            }
            0 === a.find( ".tp-bullets" ).length && ( b.style = void 0 === b.style ? "" : b.style, 'retro' === b.style ? a.append( '<div class="tp-bullets ' + b.style + ' ' + b.direction + '"><span></span></div>' ) : a.append( '<div class="tp-bullets ' + b.style + " " + b.direction + '"></div>' ) );
            // END: retrowp
            var e = a.find( ".tp-bullets" ),
                f = c.data( "index" ),
                g = b.tmp;
            // START: retrowp
            var _e = e;
            if ( 'retro' === b.style ) {
                e = a.find( '.tp-bullets span' );
            }
            // END: retrowp
            jQuery.each( d.thumbs[c.index()].params, function ( a, b ) {
                g = g.replace( b.from, b.to )
            } )
                ,
                // START: retrowp
                b = b;
            if ( 'retro' === b.style ) {
                var _index = '<div class="retro-basic">' + ( c.index() + 1 ) + '</div><div class="retro-more">' + ( ( c.index() + 1 ) + '/' + li_length ) + '</div>';
                g = g.replace( /\{\{index\}\}/g, _index );
                if ( 0 < e.find( '.tp-bullet' ).length ) {
                    e.append( '<div class="separator"><div style="width: 0px; overflow: hidden;"></div></div>' );
                }
            }
            // END: retrowp
            e.append( '<div class="justaddedbullet tp-bullet">' + g + "</div>" );
            var h = a.find( ".justaddedbullet" ),
                i = a.find( ".tp-bullet" ).length,
                j = h.outerWidth() + parseInt( void 0 === b.space ? 0 : b.space, 0 ),
                k = h.outerHeight() + parseInt( void 0 === b.space ? 0 : b.space, 0 );
            // ORIGINAL: retrowp
            // "vertical" === b.direction ? ( h.css( {
            //     top: ( i - 1 ) * k + "px",
            //     left: "0px"
            // } ), e.css( {
            //     height: ( i - 1 ) * k + h.outerHeight(),
            //     width: h.outerWidth()
            // } ) ) : ( h.css( {
            //     left: ( i - 1 ) * j + "px",
            //     top: "0px"
            // } ), e.css( {
            //     width: ( i - 1 ) * j + h.outerWidth(),
            //     height: h.outerHeight()
            // } ) ),
            // START: retrowp
            "vertical" === b.direction ? ( h.css( {
                top: ( i - 1 ) * k + "px",
                left: "0px"
            } ), e.css( {
                height: ( i - 1 ) * k + h.outerHeight(),
                width: h.outerWidth()
            } ) ) : ( 'retro' !== b.style && ( h.css( {
                left: ( i - 1 ) * j + "px",
                top: "0px"
            } ), e.css( {
                width: ( i - 1 ) * j + h.outerWidth(),
                height: h.outerHeight()
            } ) ) ),
                // END: retrowp
                h.find( ".tp-bullet-image" ).css( {
                backgroundImage: "url(" + d.thumbs[c.index()].src + ")"
            } ),
                h.data( "liref", f ),
                h.click( function () {
                    d.sc_indicator = "bullet",
                        // ORIGINAL: retrowp
                        // a.revcallslidewithid( f ),
                        // START: retrowp
                        _a.revcallslidewithid( f ),
                        // END: retrowp
                        a.find( ".tp-bullet" ).removeClass( "selected" ),
                        jQuery( this ).addClass( "selected" )
                        // START: retrowp
                        , paginTimeLine.restart( a, d.delay - 100 )
                    // END: retrowp
                } ),
                h.removeClass( "justaddedbullet" ),
                b.padding_top = parseInt( d.carousel.padding_top || 0, 0 ),
                b.padding_bottom = parseInt( d.carousel.padding_bottom || 0, 0 ),
                b.opt = d,
                "outer-left" != b.position && "outer-right" != b.position || ( d.outernav = !0 ),
                // ORIGINAL: retrowp
                // e.addClass( "nav-pos-hor-" + b.h_align ),
                // e.addClass( "nav-pos-ver-" + b.v_align ),
                // e.addClass( "nav-dir-" + b.direction ),
                // START: retrowp
                _e.addClass( "nav-pos-hor-" + b.h_align ),
                'retro' !== b.style && ( e.addClass( "nav-pos-ver-" + b.v_align ), e.addClass( "nav-dir-" + b.direction ) )
            // END: retrowp
            // ORIGINAL: retrowp
            // t( e, b, d )
            // START: retrowp
            if ( 'retro' !== b.style ) {
                t( e, b, d );
                setNavElPositions( e, b, opt );
            } else {
                var more_max_visible = function () {
                    if ( b.max_visible < li_length ) {
                        e.addClass( 'has-more-max-visible' );
                    } else {
                        e.removeClass( 'has-more-max-visible' );
                        if ( a.find( '.tp-bullets' ).width() <= e.width() ) {
                            e.addClass( 'has-more-max-visible' );
                        }
                    }
                }
                more_max_visible();
                jQuery( window ).resize( more_max_visible );
            }
            // END: retrowp
        },
        w = function ( a, b, c, d, e ) {
            var f = "tp-thumb" === d ? ".tp-thumbs" : ".tp-tabs",
                g = "tp-thumb" === d ? ".tp-thumb-mask" : ".tp-tab-mask",
                h = "tp-thumb" === d ? ".tp-thumbs-inner-wrapper" : ".tp-tabs-inner-wrapper",
                i = "tp-thumb" === d ? ".tp-thumb" : ".tp-tab",
                j = "tp-thumb" === d ? ".tp-thumb-image" : ".tp-tab-image";
            if ( b.visibleAmount = b.visibleAmount > e.slideamount ? e.slideamount : b.visibleAmount, b.sliderLayout = e.sliderLayout, 0 === a.parent().find( f ).length ) {
                b.style = void 0 === b.style ? "" : b.style;
                var k = b.span === !0 ? "tp-span-wrapper" : "",
                    l = '<div class="' + d + "s " + k + " " + b.position + " " + b.style + '"><div class="' + d + '-mask"><div class="' + d + 's-inner-wrapper" style="position:relative;"></div></div></div>';
                "outer-top" === b.position ? a.parent().prepend( l ) : "outer-bottom" === b.position ? a.after( l ) : a.append( l ),
                    b.padding_top = parseInt( e.carousel.padding_top || 0, 0 ),
                    b.padding_bottom = parseInt( e.carousel.padding_bottom || 0, 0 ),
                    "outer-left" != b.position && "outer-right" != b.position || ( e.outernav = !0 )
            }
            var m = c.data( "index" ),
                n = a.parent().find( f ),
                o = n.find( g ),
                p = o.find( h ),
                q = "horizontal" === b.direction ? b.width * b.visibleAmount + b.space * ( b.visibleAmount - 1 ) : b.width,
                r = "horizontal" === b.direction ? b.height : b.height * b.visibleAmount + b.space * ( b.visibleAmount - 1 ),
                s = b.tmp;
            jQuery.each( e.thumbs[c.index()].params, function ( a, b ) {
                s = s.replace( b.from, b.to )
            } ),
                p.append( '<div data-liindex="' + c.index() + '" data-liref="' + m + '" class="justaddedthumb ' + d + '" style="width:' + b.width + "px;height:" + b.height + 'px;">' + s + "</div>" );
            var u = n.find( ".justaddedthumb" ),
                v = n.find( i ).length,
                w = u.outerWidth() + parseInt( void 0 === b.space ? 0 : b.space, 0 ),
                x = u.outerHeight() + parseInt( void 0 === b.space ? 0 : b.space, 0 );
            u.find( j ).css( {
                backgroundImage: "url(" + e.thumbs[c.index()].src + ")"
            } ),
                "vertical" === b.direction ? ( u.css( {
                    top: ( v - 1 ) * x + "px",
                    left: "0px"
                } ), p.css( {
                    height: ( v - 1 ) * x + u.outerHeight(),
                    width: u.outerWidth()
                } ) ) : ( u.css( {
                left: ( v - 1 ) * w + "px",
                top: "0px"
            } ), p.css( {
                width: ( v - 1 ) * w + u.outerWidth(),
                height: u.outerHeight()
            } ) ),
                n.data( "maxw", q ),
                n.data( "maxh", r ),
                n.data( "wr_padding", b.wrapper_padding );
            var y = "outer-top" === b.position || "outer-bottom" === b.position ? "relative" : "absolute";
            "outer-top" !== b.position && "outer-bottom" !== b.position || "center" !== b.h_align ? "0" : "auto";
            o.css( {
                maxWidth: q + "px",
                maxHeight: r + "px",
                overflow: "hidden",
                position: "relative"
            } ),
                n.css( {
                    maxWidth: q + "px",
                    maxHeight: r + "px",
                    overflow: "visible",
                    position: y,
                    background: b.wrapper_color,
                    padding: b.wrapper_padding + "px",
                    boxSizing: "contet-box"
                } ),
                u.click( function () {
                    e.sc_indicator = "bullet";
                    var b = a.parent().find( h ).data( "distance" );
                    b = void 0 === b ? 0 : b,
                        Math.abs( b ) < 10 && ( a.revcallslidewithid( m ), a.parent().find( f ).removeClass( "selected" ), jQuery( this ).addClass( "selected" ) )
                } ),
                u.removeClass( "justaddedthumb" ),
                b.opt = e,
                n.addClass( "nav-pos-hor-" + b.h_align ),
                n.addClass( "nav-pos-ver-" + b.v_align ),
                n.addClass( "nav-dir-" + b.direction ),
                t( n, b, e )
        },
        x = function ( a ) {
            var b = a.c.parent().find( ".outer-top" ),
                c = a.c.parent().find( ".outer-bottom" );
            a.top_outer = b.hasClass( "tp-forcenotvisible" ) ? 0 : b.outerHeight() || 0,
                a.bottom_outer = c.hasClass( "tp-forcenotvisible" ) ? 0 : c.outerHeight() || 0
        },
        y = function ( a, b, c, d ) {
            b > c || c > d ? a.addClass( "tp-forcenotvisible" ) : a.removeClass( "tp-forcenotvisible" )
        }
}
( jQuery );
