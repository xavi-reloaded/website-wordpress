jQuery(document).on( 'click', '.theme-updater-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'theme_updater_notice_dismiss'
        }
    })

})