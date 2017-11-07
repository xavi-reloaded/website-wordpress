<?php
defined( 'WP_ADMIN' ) || define( 'WP_ADMIN', true );
$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
require_once( '../../../../../../wp-load.php' );
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Insert Slogan</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>/js/tinymce/tiny_mce_popup.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>/js/tinymce/utils/mctabs.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>/js/tinymce/utils/form_utils.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>/js/jquery/jquery.js?ver=1.4.2"></script>
		<script language="javascript" type="text/javascript">
			function init() {

				tinyMCEPopup.resizeToInnerSize();
			}
			function submitData() {

				var shortcode;

				var top_title = jQuery('#top_title').val();
				var bottom_title = jQuery('#bottom_title').val();
				var description = jQuery('#description').val();

				shortcode = ' [slogan';
				if(top_title && top_title.length) {
					shortcode += ' h1="'+top_title+'"';
				}
				if(bottom_title && bottom_title.length) {
					shortcode += ' h3="'+bottom_title+'"';
				}
				shortcode += ']';
				
				if(description && description.length) {
					shortcode += description;
				}
				shortcode += '[/slogan]';
				
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
		<form name="slogan" action="#">
			<div class="tabs">
				<ul>
					<li id="slogan_tab" class="current"><span><a href="javascript:mcTabs.displayTab('slogan_tab','slogan_panel');" onMouseDown="return false;">Slogan</a></span></li>
				</ul>
			</div>
			<div class="panel_wrapper">
				<fieldset style="margin-bottom:10px;padding:10px">
				<legend>H1 title:</legend>
					<label for="top_title">Type your top title here:</label><br><br>
					<input name="top_title" type="text" id="top_title" style="width:250px">
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px">
				<legend>H3 title:</legend>
					<label for="bottom_title">Type your second title here:</label><br><br>
					<input name="bottom_title" type="text" id="bottom_title" style="width:250px">
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px">
				<legend>Description:</legend>
					<label for="description">Type your description:</label><br><br>
					<textarea col="20" row="7" id="description" name="description" style="width: 250px; height: 50px"></textarea>
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
