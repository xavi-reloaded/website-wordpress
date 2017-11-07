<?php
defined( 'WP_ADMIN' ) || define( 'WP_ADMIN', true );
$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
require_once( '../../../../../../wp-load.php' );
if ( get_option( SHORTNAME . '_customcolor' ) != '' ) { $customcolor = get_option( SHORTNAME . '_customcolor' );
} else { $customcolor = '#00a0c6'; }
if ( get_option( SHORTNAME . '_gfont' ) != '' ) { $gfont = get_option( SHORTNAME . '_gfont' );
} else { $gfont = 'Open Sans'; }
?>
<!doctype html>
<html lang="en">
	<head>
	<title>Insert Button</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo home_url() . '/' . WPINC;   ?>/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">if(typeof  THEME_URI == 'undefined'){var THEME_URI = '<?php echo get_template_directory_uri(); ?>';}</script>
	<script language="javascript" type="text/javascript" src="<?php echo  get_template_directory_uri() . '/backend/js/mColorPicker/javascripts/mColorPicker.js'?>"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
	function submitData() {             
		var shortcode;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();              
		var button_type = jQuery('#button_type').val();     
		var button_url = jQuery('#button_url').val();
		
		// my adds      
		var button_color = jQuery('#button_color').val();
		
		if (jQuery('#button_target').is(':checked')) {
		var button_target = jQuery('#button_target:checked').val();} else {var button_target = '';}         
		shortcode = ' [button type="'+button_type+'" url="'+button_url+'" target="'+button_target+'" button_color_fon="'+button_color+'" ]'+selectedContent+'[/button] ';           
			
		if(window.tinyMCE) {
			var id;
			var tmce_ver=window.tinyMCE.majorVersion;
			if(typeof tinyMCE.activeEditor.editorId != 'undefined')
			{
				id =  tinyMCE.activeEditor.editorId;
			}
			else
			{
				id = 'content';
			}
		if (tmce_ver>="4") {
			window.tinyMCE.execCommand('mceInsertContent', false, shortcode);
			} else {
			window.tinyMCE.execInstanceCommand(id, 'mceInsertContent', false, shortcode);
			}

			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	
	jQuery(document).ready(function() {
		jQuery("#button_type").change(function() {
			var type = jQuery(this).val();
			var button_color = jQuery('#button_color').val();
			jQuery("#preview").html(type ? "<a class='"+type+"' style='cursor:pointer;background-color:"+button_color+"'><span>Test button</span></a>"  : "");
		}); 
		jQuery('#button_color').change(function()
		{
			//console.log(jQuery(this).val());
			jQuery('#preview .btn_small').css('background-color', jQuery(this).val());
			jQuery('#preview .btn_border').css('background-color', jQuery(this).val());
			jQuery('#preview .btn_border').css('border-color', jQuery(this).val());
			jQuery('#preview .btn_text').css('color', jQuery(this).val());
			
		})
	});
	
	</script>
	<link href='http://fonts.googleapis.com/css?family=<?php echo str_replace( ' ', '+', $gfont ); ?>:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<style type="text/css">     
		/* Button indent */
			.btn_small {
				display:inline-block; padding:0px 10px; height:26px;
				-moz-transition: all 0.1s ease-in; -webkit-transition: all 0.1s ease-in; -o-transition: all 0.1s ease-in;
			}
			.btn_border {
				display: inline-block;
				padding: 0px 17px 0px;
				-moz-transition: all 0.1s ease-in; -webkit-transition: all 0.1s ease-in; -o-transition: all 0.1s ease-in;
			}
			.btn_text {
				position:relative; -moz-transition: all 0.1s ease-in; -webkit-transition: all 0.1s ease-in; -o-transition: all 0.1s ease-in;
			}
			.btn_text:before, .btn_text:after { content:''; position: relative; top:-6px; display:inline-block; width:8px; height:1px; z-index:1;}
			.btn_text:before { left:-5px;}
			.btn_text:after { right:-5px;}
		
		/* Button colors */
			.btn_small { background: #723f32; color:#fefdfb; line-height:26px;}
			.btn_small:hover { background: #959d3b!important; color:#fff;}
			
			.btn_border {
				box-shadow: inset 0 0 0 1px rgba(255,255,255,.15);
				border: 3px solid #723f32;
				background: #723f32;
				color: #fff;
				text-transform: lowercase;
				line-height:2;
			}
			.btn_border:hover {
				border-color: #959d3b!important;
				background: #959d3b!important;
				color: #fff;
			}
			.btn_text {
				color:#462119; font-weight:normal; font-size:24px; font-family:'BazarMedium'; text-transform:uppercase; background: none!important;
			}
			.btn_text:hover { color: #959d3b!important;}
			.btn_text:before, .btn_text:after { background-color:#e3dad3; background-color:rgba(70,33,25,0.3);}
	</style>
	<base target="_self" />
	</head>
	<body  onload="init();">
	<form name="buttons" action="#" >
		<div class="tabs">
			<ul>
				<li id="buttons_tab" class="current"><span><a href="javascript:mcTabs.displayTab('buttons_tab','buttons_panel');" onMouseDown="return false;">Buttons</a></span></li>
			</ul>
		</div>
		<div class="panel_wrapper">
			<fieldset style="margin-bottom:10px;padding:10px">
				<legend>Type of button:</legend>
				<label for="button_type">Choose a type:</label><br><br>
				<select name="button_type" id="button_type"  style="width:250px">
					<option value="" disabled selected>Select type</option>
						<option value="btn_small">Small button</option>
						<option value="btn_border">Border button</option>
						<option value="btn_text">Text button</option>
				</select>                   
			</fieldset>
			<fieldset style="margin-bottom:10px;padding:10px">
			<legend>URL for button:</legend>
				<label for="button_url">Type your URL here:</label><br><br>
				<input name="button_url" type="text" id="button_url" style="width:250px">
			</fieldset>
			<fieldset style="margin-bottom:10px;padding:10px">
			<legend>Link target:</legend>
				<label for="button_target">Check if you want open in new window:</label><br><br>
				<input name="button_target" type="checkbox" id="button_target">
			</fieldset>
			<fieldset style="margin-bottom:10px;padding:10px">
			<legend>Change Color:</legend>
				<label for="button_color">button background colors:</label><br><br>
				<input name="button_color" type="color"  data-hex="true" id="button_color" style="width:250px" value="#723f32">
			</fieldset>
			<fieldset style="margin-bottom:10px;padding:10px">
				<legend>Preview:</legend>
				<div id="preview" style="height:150px"></div>
			</fieldset>
		</div>
		<div class="mceActionPanel">
			<div style="float: right">
				<input type="submit" id="insert" name="insert" value="Insert" onClick="submitData();" />
			</div>
		</div>
	</form>
</body>
</html>
