<?php
defined( 'WP_ADMIN' ) || define( 'WP_ADMIN', true );
$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
require_once( '../../../../../../wp-load.php' );
?>
<!doctype html>
<html lang="en">
	<head>
	<title>Portfolio</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo home_url() . '/' . WPINC;   ?>/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();   ?>/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function init() {

		tinyMCEPopup.resizeToInnerSize();
	}
	function submitData() {
		var shortcode;
//      var selectedContent = tinyMCE.activeEditor.selection.getContent();

		var title       = jQuery('#title').val(),
			terms       = jQuery('#taxonomy_terms').val(),
			number      = jQuery('#perpage').val(),
			autoplay    = jQuery('#autoplay').is(':checked'),
			timeout     = jQuery('#timeout').val();

		shortcode = ' [portfolio_carousel title="'+title+'" terms="'+terms+'"';

		if(number)
			shortcode += ' number="'+number+'"';

		if(autoplay)
			shortcode += ' autoplay="on"';

		if(autoplay && timeout)
			shortcode += ' timeout="'+timeout+'"';

		shortcode += ' ]';

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
	<form name="portfolio" action="#" >
		<div class="tabs">
			<ul>
				<li id="portfolio_tab" class="current"><span><a href="javascript:mcTabs.displayTab('portfolio_tab','portfolio_panel');" onMouseDown="return false;">Portfolio</a></span></li>
			</ul>
		</div>
		<div class="panel_wrapper">
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Title:</legend>
						<label for="title">Choose custom title:</label><br><br>
						<input name="title" type="text" id="title" value="From Portfolio"  style="width:250px">
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Taxonomy terms:</legend>
					<label for="taxonomy_terms">Choose a taxonomy terms:</label><br><br>
					<?php wp_dropdown_categories( 'name=taxonomy_terms&id=taxonomy_terms&show_count=1&hierarchical=1&taxonomy=' . Custom_Posts_Type_Portfolio::TAXONOMY ); ?>
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Show:</legend>
						<label for="perpage">Number to show:</label><br><br>
						<input name="perpage" type="text" id="perpage" style="width:250px">
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Autoplay:</legend>
						<label for="autoplay">Check to enable autoplay:</label><br><br>
						<input name="autoplay" type="checkbox" id="autoplay">
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Autoplay timeout:</legend>
						<label for="timeout">Choose autoplay timeout(millisecond):</label><br><br>
						<input name="timeout" type="text" id="timeout" value="4000"  style="width:250px">
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
