/* TABS */
jQuery(document).ready(function(){
        jQuery(".tabs").tabs();
});

jQuery(document).ready(function(){  
  var tabs = jQuery('.tabs'),    
    tab_a_selector = 'ul.navigation a';  
  tabs.tabs({ event: 'change' });
  
  tabs.find( tab_a_selector ).click(function(){
    var state = {},      
      id = jQuery(this).closest( '.tabs' ).attr( 'id' ),      
      idx = jQuery(this).parent().prevAll().length;    
    state[ id ] = idx;
    jQuery.bbq.pushState( state );
  });
  
  jQuery(window).bind( 'hashchange', function(e) {    
    tabs.each(function(){      
      var idx = $.bbq.getState( this.id, true ) || 0;      
      jQuery(this).find( tab_a_selector ).eq( idx ).triggerHandler( 'change' );
    });
  })
  
  jQuery(window).trigger( 'hashchange' );
  
});