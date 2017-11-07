(function(a){
	a.fn.ns_mc_widget=function(b){
		var e,c,d;
		e={
			url:"/",
			cookie_id:false,
			cookie_value:""
		};
		
		d=jQuery.extend(e,b);
		c=a(this);
	
		c.submit(function(){
			var f;
			f=jQuery("<div></div>");
			f.css({
				"background-image":"url("+d.loader_graphic+")",
				"background-position":"center center",
				"background-repeat":"no-repeat",
				height:"32px",
				right:"10px",
				position:"absolute",
				bottom:"10px",
				width:"32px",
				"z-index":"100"
			});
			c.find('.form-mailchimp-indent').append(f);
			a.getJSON(d.url,c.serialize(),function(h,k){
				var j,g,i;
				if("success"===k){
					if(true===h.success){
						i=jQuery("<div>"+h.success_message+"</div>");
						i.hide();
						c.find('.form-mailchimp-indent').fadeTo(400,0,function(){
							c.find('.form-mailchimp-indent').html(i);
							i.show();
							c.find('.form-mailchimp-indent').fadeTo(400,1)
							});
						if(false!==d.cookie_id){
							j=new Date();
							j.setTime(j.getTime()+"3153600000");
							document.cookie=d.cookie_id+"="+d.cookie_value+"; expires="+j.toGMTString()+";"
							}
						}else{
					g=jQuery(".error",c);
					if(0===g.length){
						f.remove();
						c.find('.form-mailchimp-indent').children().show();
						g=jQuery('<div class="error"></div>');
						g.prependTo(c.find('.form-mailchimp-indent'))
						}else{
						f.remove();
						c.find('.form-mailchimp-indent').children().show()
						}
						g.html(h.error)
					}
				}
			return false
			});
		return false
		})
}
}(jQuery));