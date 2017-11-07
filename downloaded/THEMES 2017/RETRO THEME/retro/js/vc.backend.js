( function ( $ ) {
    window.VcMessageView_Backend_retro = window.VcMessageView_Backend.extend( {
        changeShortcodeParams: function ( model ) {
            var params,
                $wrapper,
                classes,
                iconClass,
                color;
            switch ( window.VcMessageView_Backend.__super__.changeShortcodeParams.call( this, model ), params = model.get( "params" ), $wrapper = this.$el.find( "> .wpb_element_wrapper" ), classes = [ "vc_message_box" ], _.isUndefined( params.message_box_style ) && ( params.message_box_style = "classic" ), _.isUndefined( params.message_box_color ) && ( params.message_box_color = "alert-info" ), params.style ? "3d" === params.style ? ( params.message_box_style = "3d", params.style = "rounded" ) : "outlined" === params.style ? ( params.message_box_style = "outline", params.style = "rounded" ) : "square_outlined" === params.style && ( params.message_box_style = "outline", params.style = "square" ) : params.style = "rounded", classes.push( "vc_message_box-" + params.style ), params.message_box_style && classes.push( "vc_message_box-" + params.message_box_style ), $wrapper.attr( "class", "wpb_element_wrapper" ), $wrapper.find( ".vc_message_box-icon" ).remove( ), iconClass = _.isUndefined( params["icon_" + params.icon_type] ) ? "fa fa-info-circle" : params["icon_" + params.icon_type], color = params.color, params.color ) {
                case "info":
                    iconClass = "fa fa-info-circle";
                    break;
                case "alert-info":
                    iconClass = "vc_pixel_icon vc_pixel_icon-info";
                    break;
                case "success":
                    iconClass = "fa fa-check";
                    break;
                case "alert-success":
                    iconClass = "vc_pixel_icon vc_pixel_icon-tick";
                    break;
                case "warning":
                    iconClass = "fa fa-exclamation-triangle";
                    break;
                case "alert-warning":
                    iconClass = "vc_pixel_icon vc_pixel_icon-alert";
                    break;
                case "danger":
                    iconClass = "fa fa-times";
                    break;
                case "alert-danger":
                    iconClass = "vc_pixel_icon vc_pixel_icon-explanation";
                    break;
                case "alert-custom":
                default:
                    color = params.message_box_color
            }
            if ( 'retro' == params.message_box_style ) {
                classes = classes.filter( function ( a ) {
                    return a !== "vc_message_box-" + params.style;
                } );
                classes.push( "vc_type-" + params.type );
            } else {
                classes.push( "vc_color-" + color );
                $wrapper.prepend( $( '<div class="vc_message_box-icon"><i class="' + iconClass + '"></i></div>' ) );
            }
            $wrapper.addClass( classes.join( " " ) );
        }
    } );
} )( window.jQuery );
