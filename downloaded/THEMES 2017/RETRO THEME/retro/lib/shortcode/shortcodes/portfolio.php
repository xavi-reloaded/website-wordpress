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
	var perpage = '';
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		jQuery('#type').on('change',function(){
			if(jQuery(this).val() === 'filterable'){
				jQuery('#perpage_wrap').hide();
				perpage = '';
			} else {
				jQuery('#perpage_wrap').show();
				perpage =  'perpage="'+jQuery('#perpage').val()+'"';    
			}
		});
	}
	function submitData() {             
		var shortcode;
//      var selectedContent = tinyMCE.activeEditor.selection.getContent();              
		var taxonomy_terms = jQuery('#taxonomy_terms').val();       
		
		var layout = jQuery('#layout_type').val();  
		
		var type = '';
		if (jQuery('#type').val() === 'filterable') {
			type = ' isotope="on"';
			perpage = '';
		} else {
			type = ' pagination="on"';
			perpage = 'perpage="'+jQuery('#perpage').val()+'"';
		}     
		shortcode = ' [terms_portfolio terms="'+taxonomy_terms+'" '+perpage+'  layout="'+layout+'" '+ type +']';            
			
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
				<li id="portfolio_tab" class="current"><span><a href="javascript:mcTabs.displayTab('portfolio_tab','portfolio_panel');" onMouseDown="return false;">Gallery</a></span></li>
			</ul>
		</div>
		<div class="panel_wrapper">
			
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Taxonomy terms:</legend>
					<label for="taxonomy_terms">Choose a taxonomy terms:</label><br><br>
				
					<?php wp_dropdown_categories( 'name=taxonomy_terms&id=taxonomy_terms&show_count=1&hierarchical=1&taxonomy=' . Custom_Posts_Type_Portfolio::TAXONOMY ); ?>
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px">
				<legend>Filterable portfolios:</legend>
					<label for="type">Choose if you want use filterable portfolios or with pagination:</label><br><br>
					<select name="type" id="type"  style="width:250px">                     
						<option value="filterable" selected="selected"><?php _e( 'Filterable','retro' ); ?></option>
						<option value="pagination"><?php _e( 'Pagination','retro' ); ?></option>                              
					</select>   
				</fieldset>
				<fieldset style="margin-bottom:10px;padding:10px;display: none;" id="perpage_wrap">
				<legend>Show per page:</legend>
					<label for="perpage">Number to show:</label><br><br>
					<input name="perpage" type="text" id="perpage" style="width:250px">
				</fieldset>         
			
				<fieldset style="margin-bottom:10px;padding:10px">
					<legend>Layout Type:</legend>
					<label for="layout_type">Choose a layout type:</label><br><br>
					<select name="layout_type" id="layout_type"  style="width:250px">
						<option value=""><?php _e( 'Big','retro' ); ?></option>
						<option value="medium"><?php _e( 'Medium','retro' ); ?></option>
						<option value="small"><?php _e( 'Small','retro' ); ?></option>                                
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
