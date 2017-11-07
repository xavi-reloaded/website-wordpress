jQuery(document).ready(function($) {
	
	var stylechanger = ' \
	<div id="stylechanger"> \
			<a href="" class="stoggle sshow"></a> \
			<form action="" method="post" id="skin_switcher"> \
				<fieldset> \
					<div class="preview-wrap"> \
						<h2 class="preview-title">Choose a skin</h2> \
						<ul class="preview-list"> \
							<li class="preview-item skin-title" data-skin="default"> \
								brown <span class="skin-color-green">green</span><span class="skin-title-small">default</span> \
							</li> \
							<li class="preview-item skin-title" data-skin="skin2"> \
								<span class="skin-color-cold">cold</span> <span class="skin-color-brown">brown</span> \
							</li> \
							<li class="preview-item skin-title" data-skin="skin4"> \
								<span class="skin-color-cream">CREAM</span> <span class="skin-color-pink">pink</span> \
							</li> \
							<li class="preview-item skin-title" data-skin="skin3"> \
								<span class="skin-color-sweet">sweeT</span> <span class="skin-color-brown">BROWN</span> \
							</li> \
							<li class="preview-item skin-title" data-skin="skin1"> \
								<span class="skin-color-blue">blue</span> <span class="skin-color-orange">orange</span> \
							</li> \
						</ul> \
						<a class="preview-colors" href="http://retro.olegnax.com/features/unlimited-colors/">unlimited <span class="skin-color-yellow">colors</span></a> \
					</div> \
					<!--<label for="rt_gfont" class="select_label">Theme skin</label>--> \
				</fieldset> \
				<input type="hidden" name="use_session_values" value="1" />\
				<input type="hidden" id="active_skin_layout" name="rt_active_skin_layout" value="default" />\
			</form> \
	</div> \
	';
	
	jQuery("body").append( stylechanger );
	
	var skins  = {
		'default'	: 'BROWN GREEN',
		'skin1'		: 'BLUE ORANGE',
		'skin2'		: 'COLD BROWN',
		'skin3'		: 'SWEET BROWN',
		'skin4'		: 'CREAM PINK',

	};

	jQuery.each(skins, function(key, value) {
		jQuery('#active_skin_layout')
			.append(jQuery("<option></option>")
			.attr("value",key)
			.text(value));
	});

	if(typeof rt_active_skin_layout != 'undefined' && rt_active_skin_layout.length)
	{
		jQuery('#active_skin_layout').val(rt_active_skin_layout);
	}

	jQuery("#skin_switcher").on('click', '.preview-item', function(e){
		var $a = jQuery(this);
		var skin = $a.data('skin');
		jQuery('#active_skin_layout').val(skin);
		jQuery('#skin_switcher').submit();
		return false;
	});

	jQuery("#stylechanger").on('click','.sshow',function(e){
		jQuery("#stylechanger").animate({ "left": "0"} , 500);
		jQuery(this).removeClass("sshow").addClass("shide");
		return false;
	});
	
	jQuery("#stylechanger").on('click','.shide',function(e){
		jQuery("#stylechanger").animate({ "left": "-203"} , 500);
		jQuery(this).removeClass("shide").addClass("sshow");
		return false;
	});
	
});

//disable links
function disableLink(e) {
	// cancels the event
	e.preventDefault();

	return false;
}	