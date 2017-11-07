
(function($) { "use strict";

        //date pick 
        $('#date').datepick({dateFormat: 'dd-mm-yyyy'}); 
        $('#checkin').datepick({dateFormat: 'dd-mm-yyyy'});
        $('#checkout').datepick({dateFormat: 'dd-mm-yyyy'});  
        $('#arrival').datepick({dateFormat: 'dd-mm-yyyy'}); 
        $('#departure').datepick({dateFormat: 'dd-mm-yyyy'}); 
        //$('select option:first-child'); 
    	var $container = $('.portfolioContainer');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false,
    					
            }
        });
 
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    });

})(jQuery);