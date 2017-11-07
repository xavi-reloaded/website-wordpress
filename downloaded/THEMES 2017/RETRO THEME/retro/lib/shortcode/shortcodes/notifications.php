<?php
defined( 'WP_ADMIN' ) || define( 'WP_ADMIN', true );
$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
require_once( '../../../../../../wp-load.php' );
?>
<!doctype html>
<html lang="en">
	<head>
	<title>Insert Notification</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
	}
	function submitData() {             
		var shortcode;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();              
		var notification_type = jQuery('#notification_type').val();     
		shortcode = ' [notification type="'+notification_type+'"]'+selectedContent+'[/notification] ';          
			
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
	jQuery("#notification_type").change(function() {
		var type = jQuery(this).val();
		jQuery("#preview").html(type ? "<div class='ox_notification "+type+"' >Test block</div>"  : "");
	}); 
	});
	
	</script>
	<style type="text/css">
		.ox_notification {
			position:relative;
			clear:both;
			margin-bottom:21px; padding:31px 25px 31px 71px;
			box-shadow: 1px 1px 4px rgba(28,20,6,0.14);
			background-color: #fff;
			background-repeat: no-repeat;
			background-position: 27px 31px;
			color: #867e72;
			font: normal 16px/1.5 Georgia, 'Times New Roman', Times, serif;
		}
		.ox_notification p { margin-bottom:0}
		.ox_notification:before { content:''; display:block; height:26px; left:27px; position:absolute; top:31px; width:26px;}
		
		/* Notification */
			.notification_mark:before { background:url(../../../images/skin/default/sprite_retro.png) no-repeat -100px -200px;}
			.notification_info:before { background:url(../../../images/skin/default/sprite_retro.png) no-repeat -150px -200px}
			.notification_warning:before { background:url(../../../images/skin/default/sprite_retro.png) no-repeat -200px -200px}
			.notification_error:before { background:url(../../../images/skin/default/sprite_retro.png) no-repeat -250px -200px}
	</style>
	<base target="_self" />
	</head>
	<body  onload="init();">
	<form name="notifications" action="#">
		<div class="tabs">
			<ul>
				<li id="notifications_tab" class="current"><span><a href="javascript:mcTabs.displayTab('notifications_tab','notifications_panel');" onMouseDown="return false;">Notification</a></span></li>
			</ul>
		</div>
		<div class="panel_wrapper">
			
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Type of notification:</legend>
					<label for="notification_type">Choose a type:</label><br><br>
					<select name="notification_type" id="notification_type"  style="width:250px">
						<option value="" disabled selected>Select type</option>
						<option value="notification_mark">Successful</option>
						<option value="notification_error">Error</option>
						<option value="notification_info">Info</option>
						<option value="notification_warning">Warning</option>
					</select>                   
				</fieldset>
			
				<fieldset style="margin-bottom:10px;padding:10px;">
					<legend>Preview:</legend>
					<div id="preview" style="min-height:95px"></div>
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
