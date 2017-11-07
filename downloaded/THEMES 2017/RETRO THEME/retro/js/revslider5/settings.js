jQuery( document ).ready( function () {
    jQuery( '#navigation-arrows #navigation_arrow_style' ).on( "change", function () {
	var sbi = jQuery( this );
	var sbinretro = sbi.val() !== "retro";
	var selector = '#navigation-arrows #nav_arrows_subs';
	jQuery( selector ).children().toggle( sbinretro );
	jQuery( selector ).find( '#label_navigation_arrow_style, #navigation_arrow_style, #label_rtl_arrows, [label=rtl_arrows]' ).show();
	if ( !sbinretro ) {
	    var fields = {
		arrows_always_on: "false",
		arrows_over_hidden: "0",
		arrows_under_hidden: "0",
		hide_arrows: "200",
		hide_arrows_mobile: "1200",
		hide_arrows_on_mobile: "off",
		hide_arrows_over: "off",
		leftarrow_align_hor: "left",
		leftarrow_align_vert: "bottom",
		leftarrow_offset_hor: "20",
		leftarrow_offset_vert: "0",
		leftarrow_position: "slider",
		rightarrow_align_hor: "right",
		rightarrow_align_vert: "bottom",
		rightarrow_offset_hor: "20",
		rightarrow_offset_vert: "0",
		rightarrow_position: "slider",
		rtl_arrows: "off",
	    };
	    for ( var l in fields ) {
		var o = jQuery( '[name=' + l + ']' );
		var s = o.is( 'select' );
		var t = o.attr( 'type' );
		var v = fields[l];
		if ( s ) {
		    o.find( 'option' ).each( function () {
			var oo = jQuery( this );
			oo.prop( 'selected', oo.val() === v );
		    } );
		    o.val( v );
		} else if ( 'checkbox' === t ) {
		    if ( ( v === 'on' ) !== o.is( ':checked' ) ) {
			jQuery( '[label=' + l + ']' ).click();
			console.log( jQuery( '[lable=' + l + ']' ) );
		    }
		} else {
		    o.val( v );
		}
	    }
	}
	jQuery( '.showhidewhat_truefalse' ).change();
    } ).change();

    jQuery( '#navigation-bullets #navigation_bullets_style' ).on( "change", function () {
	var sbi = jQuery( this );
	var sbinretro = sbi.val() !== "retro";
	var selector = '#navigation-bullets #nav_bullets_subs';
	jQuery( selector ).children().toggle( sbinretro );
	jQuery( selector ).find( '#label_navigation_bullets_style, #navigation_bullets_style, #label_rtl_bullets, [label=rtl_bullets]' ).show();
	if ( !sbinretro ) {
	    var fields = {
		bullets_align_hor: "center",
		bullets_align_vert: "bottom",
		bullets_always_on: "false",
		bullets_direction: "horizontal",
		bullets_offset_hor: "0",
		bullets_offset_vert: "20",
		bullets_over_hidden: "0",
		bullets_position: "slider",
		bullets_space: "5",
		bullets_under_hidden: "0",
		hide_bullets: "200",
		hide_bullets_mobile: "1200",
		hide_bullets_on_mobile: "off",
		hide_bullets_over: "off",
		rtl_bullets: "off",
	    };
	    for ( var l in fields ) {
		var o = jQuery( '[name=' + l + ']' );
		var s = o.is( 'select' );
		var t = o.attr( 'type' );
		var v = fields[l];
		if ( s ) {
		    o.find( 'option' ).each( function () {
			var oo = jQuery( this );
			oo.prop( 'selected', oo.val() === v );
		    } );
		    o.val( v );
		} else if ( 'checkbox' === t ) {
		    if ( ( v === 'on' ) !== o.is( ':checked' ) ) {
			jQuery( '[label=' + l + ']' ).click();
			console.log( jQuery( '[lable=' + l + ']' ) );
		    }
		} else {
		    o.val( v );
		}
	    }
	}
	jQuery( '.showhidewhat_truefalse' ).change();
    } ).change();
    
    setTimeout(function(){
	jQuery( '#navigation-arrows #navigation_arrow_style' ).change();
	jQuery( '#navigation-bullets #navigation_bullets_style' ).change();
    }, 1000);
} );