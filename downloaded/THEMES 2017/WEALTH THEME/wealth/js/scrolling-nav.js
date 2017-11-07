// JavaScript Document




//jQuery for page scrolling feature - requires jQuery Easing plugin
(function($) {
	 "use strict";
    $(window).scroll(function() {
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });
    var scrollTop  = $( window ).scrollTop();
    $(window).scroll(function() {
        if ($(".navbar").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }

    });

    $(window).scroll( function() {

       // Set status active for menu nav
       var found = false,
        scrollTop  = $( window ).scrollTop();

       $('.navbar').find( 'a' ).each( function () {
        var target = this.hash,
         href = $( this ).attr( 'href' );

        if( target === '' || found ) { return; }


        var $section = $( target );
        if ( !$section.length ) { return; }

        var top = $section.offset().top - 80;
        var bottom = top + $section.outerHeight();

        
        $('.navbar').find( 'a' ).parent().removeClass( 'active' );
        if( scrollTop >= top && scrollTop <= bottom ) {
         $( this ).parent().addClass( 'active' );
         found = true;
        }
       });
    } ).trigger( 'scroll' );

    
    $('.navbar a, a.page-scroll').bind('click', function(event) {
        var target = this.hash,
            $section = $( target );
        
        if ( !$section.length ) { return; }
        var anchor = $section.offset().top;
        $('html, body').stop().animate({
            scrollTop: anchor
        }, 1500, 'easeInOutExpo');
        event.preventDefault();

    });
   
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });
})(jQuery);
// Closes the Responsive Menu on Menu Item Click
