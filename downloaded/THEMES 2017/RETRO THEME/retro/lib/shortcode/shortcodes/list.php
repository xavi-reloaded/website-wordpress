<?php
defined( 'WP_ADMIN' ) || define( 'WP_ADMIN', true );
$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
require_once( '../../../../../../wp-load.php' );
?>
<!doctype html>
<html lang="en">
	<head>
	<title>Insert List</title>
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
		var list_type = jQuery('#list_type').val();     
		shortcode = ' [ox_list type="'+list_type+'"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/ox_list] ';          
			
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
	</script>   
	<base target="_self" />
	</head>
	<body  onload="init();">
	<form name="list" action="#">
		<div class="tabs">
			<ul>
				<li id="list_tab" class="current"><span><a href="javascript:mcTabs.displayTab('list_tab','list_panel');" onMouseDown="return false;">List</a></span></li>
			</ul>
		</div>
		<div class="panel_wrapper">
			
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Type of list:</legend>
					<label for="list_type">Choose a type:</label><br><br>
					<select name="list_type" id="list_type"  style="width:250px">                       
						<option value="ox_list_simple" selected>Simple dots</option>
						<option value="ox_list_animated">Animated</option>          
					</select>                   
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
