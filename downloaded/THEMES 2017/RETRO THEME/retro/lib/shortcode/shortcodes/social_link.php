<?php
defined( 'WP_ADMIN' ) || define( 'WP_ADMIN', true );
$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
require_once( '../../../../../../wp-load.php' );
?>
<!doctype html>
<html lang="en">
	<head>
	<title>Insert Social Link</title>
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
			var selectedContent = tinyMCE.activeEditor.selection.getContent();              
			var button_type = jQuery('#button_type').val();
			var button_url = jQuery('#button_url').val();   
			var button_style = jQuery('#button_style').val();
			if (jQuery('#button_target').is(':checked')) {
			var button_target = jQuery('#button_target:checked').val();} else {var button_target = '';}         
			
			shortcode = ' [social_link style="'+button_style+'" type="'+button_type+'" url="'+button_url+'" target="'+button_target+'" ]';          
			
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
			jQuery("#button_type, #button_style").change(function() {
				var type = jQuery("#button_type").val();
				var style = jQuery("#button_style").val();
				jQuery("#preview").html(type ? "<div class='stamp-wrap "+style+"'><a class='social_links "+style+" "+type+"' style='cursor:pointer;'><span></span></a></div>"  : "");
			}); 
		});
	</script>
		<?php
		/**
		 * @todo add  correct classes
		 */
		?>
	<style type="text/css">
		#preview { position:relative; z-index:1;}
		
	.default { box-shadow:inset 0 0 0 1px #d8ccc5}
	.default span, .dark span { border-radius:100%; display:block; height:100%; width:100%}
	
	.default, .default span:hover,
	.dark, .dark span:hover,
	.stamp, .stamp span:hover {
		background:url(<?php echo  get_template_directory_uri()?>/images/sprite_socialbuttons.png) no-repeat
	}
	
	.default, .dark { border-radius:100%; margin:0 3px 11px 0; width:39px; height:39px;}
	.default:hover { box-shadow:inset 0 0 0 1px #959d3b}
	
	.dark, .dark span { box-shadow:inset 3px 3px 4px rgba(0, 0, 0, 0.18)}
	
	.dark, .stamp:hover, .stamp span:hover { background-color:#6e3d30}
	.default:hover, .default span:hover, .dark:hover, .dark span:hover { background-color: #959d3b;}
	
	.stamp { background-color:#eceae8; height:50px; left:9px; position:relative; top:9px; width:44px}
	.stamp span { cursor:pointer; display:block; height:50px; width:44px}
	.stamp-wrap.stamp { background:url(<?php echo  get_template_directory_uri()?>/images/social-icon-bg.png) no-repeat; display:inline-block; height:68px; margin: -7px 0 0 -7px; vertical-align:middle; width:62px; text-align:left;}
	
	.social_links { display:inline-block; text-align:left; font: 0/0 serif;text-shadow: none;color: transparent; vertical-align:middle}
	
	.social_links span       {opacity: 0;}
	.social_links:hover span {opacity: 1;}
	
	.social_links { -moz-transition:all .8s ease; -o-transition:all .8s ease; -webkit-transition:all .8s ease;}
	.social_links:hover { -moz-transition:all .1s ease; -o-transition:all .1s ease; -webkit-transition:all .3s ease;}
	.social_links:hover span { -moz-transition:background-color .8s ease; -o-transition:background-color .8s ease; -webkit-transition:background-color .8s ease;}
	
	
	.default.facebook_account                   { background-position: -78px -156px;}
	.default.facebook_account:hover span        { background-position: -39px -156px;}
		
		.default.rss_feed                       { background-position: -78px 0px;}
		.default.rss_feed:hover span            { background-position: -39px 0px;}
		
		.default.twitter_account                { background-position: -78px -195px;}
		.default.twitter_account:hover span     { background-position: -39px -195px;}
		
		.default.google_plus_account            { background-position: -78px -272px;}
		.default.google_plus_account:hover span { background-position: -39px -272px;}
		
		.default.email_to                       { background-position: -78px -234px;}
		.default.email_to:hover span            { background-position: -39px -234px;}
		
		.default.flicker_account                { background-position: -78px -39px;}
		.default.flicker_account:hover span     { background-position: -39px -39px;}
		
		.default.vimeo_account                  { background-position: -78px -78px;}
		.default.vimeo_account:hover span       { background-position: -39px -78px;}
		
		.default.dribble_account                { background-position: -78px -117px;}
		.default.dribble_account:hover span     { background-position: -39px -117px;}
		
		.default.youtube_account                { background-position: -78px -312px;}
		.default.youtube_account:hover span     { background-position: -39px -312px;}
		
		.default.linked_in_account              { background-position: -78px -389px;}
		.default.linked_in_account:hover span   { background-position: -39px -389px;}
		
		.default.pinterest_account              { background-position: -78px -351px;}
		.default.pinterest_account:hover span   { background-position: -39px -351px;}

		/* new */
		.default.picasa_account                 { background-position: -78px -975px;}
		.default.picasa_account:hover span      { background-position: -39px -975px;}
		
		.default.digg_account                   { background-position: -78px -1014px;}
		.default.digg_account:hover span        { background-position: -39px -1014px;}

		.default.plurk_account                  { background-position: -78px -936px;}
		.default.plurk_account:hover span       { background-position: -39px -936px;}
		
		.default.tripadvisor_account            { background-position: -78px -897px;}
		.default.tripadvisor_account:hover span { background-position: -39px -897px;}

		.default.yahoo_account                  { background-position: -78px -819px;}
		.default.yahoo_account:hover span       { background-position: -39px -819px;}
		
		.default.delicious_account              { background-position: -78px -1092px;}
		.default.delicious_account:hover span   { background-position: -39px -1092px;}
		
		.default.devianart_account              { background-position: -78px -663px;}
		.default.devianart_account:hover span   { background-position: -39px -663px;}
		
		.default.tumblr_account                 { background-position: -78px -702px;}
		.default.tumblr_account:hover span      { background-position: -39px -702px;}
		
		.default.skype_account                  { background-position: -78px -741px;}
		.default.skype_account:hover span       { background-position: -39px -741px;}
		
		.default.apple_account                  { background-position: -78px -780px;}
		.default.apple_account:hover span       { background-position: -39px -780px;}
		
		.default.aim_account                    { background-position: -78px -1053px;}
		.default.aim_account:hover span         { background-position: -39px -1053px;}
		
		.default.paypal_account                 { background-position: -78px -468px;}
		.default.paypal_account:hover span      { background-position: -39px -468px;}
		
		.default.blogger_account                { background-position: -78px -585px;}
		.default.blogger_account:hover span     { background-position: -39px -585px;}
		
		.default.behance_account                { background-position: -78px -624px;}
		.default.behance_account:hover span     { background-position: -39px -624px;}
		
		.default.myspace_account                { background-position: -78px -859px;}
		.default.myspace_account:hover span     { background-position: -39px -859px;}
		
		.default.stumble_account                { background-position: -78px -430px;}
		.default.stumble_account:hover span     { background-position: -39px -430px;}
		
		.default.forrst_account                 { background-position: -78px -506px;}
		.default.forrst_account:hover span      { background-position: -39px -506px;}
		
		.default.imdb_account                   { background-position: -78px -547px;}
		.default.imdb_account:hover span        { background-position: -39px -547px;}

		.default.instagram_account              { background-position: -78px -1131px;}
		.default.instagram_account:hover span   { background-position: -39px -1131px;}
	
	
	.dark.facebook_account                      { background-position: 0     -156px;}
	.dark.facebook_account:hover span           { background-position: -39px -156px;}
	
		.dark.rss_feed                          { background-position: 0     0px;}
		.dark.rss_feed:hover span               { background-position: -39px 0px;}
		
		.dark.twitter_account                   { background-position: 0     -195px;}
		.dark.twitter_account:hover span        { background-position: -39px -195px;}
		
		.dark.google_plus_account               { background-position: 0     -272px;}
		.dark.google_plus_account:hover span    { background-position: -39px -272px;}
		
		.dark.email_to                          { background-position: 0     -234px;}
		.dark.email_to:hover span               { background-position: -39px -234px;}
		
		.dark.flicker_account                   { background-position: 0     -39px;}
		.dark.flicker_account:hover span        { background-position: -39px -39px;}
		
		.dark.vimeo_account                     { background-position: 0     -78px;}
		.dark.vimeo_account:hover span          { background-position: -39px -78px;}
		
		.dark.dribble_account                   { background-position: 0     -117px;}
		.dark.dribble_account:hover span        { background-position: -39px -117px;}
		
		.dark.linked_in_account                 { background-position: 0     -389px;}
		.dark.linked_in_account:hover span      { background-position: -39px -389px;}
		
		.dark.youtube_account                   { background-position: 0     -312px;}
		.dark.youtube_account:hover span        { background-position: -39px -312px;}
		
		.dark.pinterest_account                 { background-position: 0     -351px;}
		.dark.pinterest_account:hover span      { background-position: -39px -351px;}

		/* new */
		.dark.picasa_account                    { background-position: 0     -975px;}
		.dark.picasa_account:hover span         { background-position: -39px -975px;}
		
		.dark.digg_account                      { background-position: 0     -1014px;}
		.dark.digg_account:hover span           { background-position: -39px -1014px;}

		.dark.plurk_account                     { background-position: 0     -936px;}
		.dark.plurk_account:hover span          { background-position: -39px -936px;}
		
		.dark.tripadvisor_account               { background-position: 0     -897px;}
		.dark.tripadvisor_account:hover span    { background-position: -39px -897px;}

		.dark.yahoo_account                     { background-position: 0     -819px;}
		.dark.yahoo_account:hover span          { background-position: -39px -819px;}
		
		.dark.delicious_account                 { background-position: 0     -1092px;}
		.dark.delicious_account:hover span      { background-position: -39px -1092px;}
		
		.dark.devianart_account                 { background-position: 0     -663px;}
		.dark.devianart_account:hover span      { background-position: -39px -663px;}
		
		.dark.tumblr_account                    { background-position: 0     -702px;}
		.dark.tumblr_account:hover span         { background-position: -39px -702px;}
		
		.dark.skype_account                     { background-position: 0     -741px;}
		.dark.skype_account:hover span          { background-position: -39px -741px;}
		
		.dark.apple_account                     { background-position: 0     -780px;}
		.dark.apple_account:hover span          { background-position: -39px -780px;}
		
		.dark.aim_account                       { background-position: 0     -1053px;}
		.dark.aim_account:hover span            { background-position: -39px -1053px;}
		
		.dark.paypal_account                    { background-position: 0     -468px;}
		.dark.paypal_account:hover span         { background-position: -39px -468px;}
		
		.dark.blogger_account                   { background-position: 0     -585px;}
		.dark.blogger_account:hover span        { background-position: -39px -585px;}
		
		.dark.behance_account                   { background-position: 0     -624px;}
		.dark.behance_account:hover span        { background-position: -39px -624px;}
		
		.dark.myspace_account                   { background-position: 0     -859px;}
		.dark.myspace_account:hover span        { background-position: -39px -859px;}
		
		.dark.stumble_account                   { background-position: 0     -430px;}
		.dark.stumble_account:hover span        { background-position: -39px -430px;}
		
		.dark.forrst_account                    { background-position: 0     -506px;}
		.dark.forrst_account:hover span         { background-position: -39px -506px;}
		
		.dark.imdb_account                      { background-position: 0     -547px;}
		.dark.imdb_account:hover span           { background-position: -39px -547px;}

		.dark.instagram_account                 { background-position: 0     -1131px;}
		.dark.instagram_account:hover span      { background-position: -39px -1131px;}
				

	.stamp.facebook_account                     { background-position: -76px -151px;}
	.stamp.facebook_account:hover span          { background-position: 2px   -151px;}
		
		.stamp.rss_feed                         { background-position: -76px 4px;}
		.stamp.rss_feed:hover span              { background-position: 2px   4px;}
		
		.stamp.twitter_account                  { background-position: -76px -189px;}
		.stamp.twitter_account:hover span       { background-position: 2px   -189px;}
		
		.stamp.google_plus_account              { background-position: -76px -267px;}
		.stamp.google_plus_account:hover span   { background-position: 2px   -267px;}
		
		.stamp.email_to                         { background-position: -76px -228px;}
		.stamp.email_to:hover span              { background-position: 2px   -228px;}
		
		.stamp.flicker_account                  { background-position: -76px -34px;}
		.stamp.flicker_account:hover span       { background-position: 2px   -34px;}
		
		.stamp.vimeo_account                    { background-position: -76px -72px;}
		.stamp.vimeo_account:hover span         { background-position: 2px   -72px;}
		
		.stamp.dribble_account                  { background-position: -76px -112px;}
		.stamp.dribble_account:hover span       { background-position: 2px   -112px;}
		
		.stamp.linked_in_account                { background-position: -76px -383px;}
		.stamp.linked_in_account:hover span     { background-position: 2px   -383px;}
		
		.stamp.youtube_account                  { background-position: -76px -307px;}
		.stamp.youtube_account:hover span       { background-position: 2px   -307px;}
		
		.stamp.pinterest_account                { background-position: -76px -345px;}
		.stamp.pinterest_account:hover span     { background-position: 2px   -345px;}

		/* new */
		.stamp.picasa_account                   { background-position: -76px -969px;}
		.stamp.picasa_account:hover span        { background-position: 2px   -969px;}
		
		.stamp.digg_account                     { background-position: -76px -1008px;}
		.stamp.digg_account:hover span          { background-position: 2px   -1008px;}

		.stamp.plurk_account                    { background-position: -76px -930px;}
		.stamp.plurk_account:hover span         { background-position: 2px   -930px;}
		
		.stamp.tripadvisor_account              { background-position: -76px -891px;}
		.stamp.tripadvisor_account:hover span   { background-position: 2px   -891px;}

		.stamp.yahoo_account                    { background-position: -76px -813px;}
		.stamp.yahoo_account:hover span         { background-position: 2px   -813px;}
		
		.stamp.delicious_account                { background-position: -76px -1086px;}
		.stamp.delicious_account:hover span     { background-position: 2px   -1086px;}
		
		.stamp.devianart_account                { background-position: -76px -657px;}
		.stamp.devianart_account:hover span     { background-position: 2px   -657px;}
		
		.stamp.tumblr_account                   { background-position: -76px -696px;}
		.stamp.tumblr_account:hover span        { background-position: 2px   -696px;}
		
		.stamp.skype_account                    { background-position: -76px -735px;}
		.stamp.skype_account:hover span         { background-position: 2px   -735px;}
		
		.stamp.apple_account                    { background-position: -76px -774px;}
		.stamp.apple_account:hover span         { background-position: 2px   -774px;}
		
		.stamp.aim_account                      { background-position: -76px -1047px;}
		.stamp.aim_account:hover span           { background-position: 2px   -1047px;}
		
		.stamp.paypal_account                   { background-position: -76px -462px;}
		.stamp.paypal_account:hover span        { background-position: 2px   -462px;}
		
		.stamp.blogger_account                  { background-position: -76px -579px;}
		.stamp.blogger_account:hover span       { background-position: 2px   -579px;}
		
		.stamp.behance_account                  { background-position: -76px -618px;}
		.stamp.behance_account:hover span       { background-position: 2px   -618px;}
		
		.stamp.myspace_account                  { background-position: -76px -853px;}
		.stamp.myspace_account:hover span       { background-position: 2px   -853px;}
		
		.stamp.stumble_account                  { background-position: -76px -424px;}
		.stamp.stumble_account:hover span       { background-position: 2px   -424px;}
		
		.stamp.forrst_account                   { background-position: -76px -500px;}
		.stamp.forrst_account:hover span        { background-position: 2px   -500px;}
		
		.stamp.imdb_account                     { background-position: -76px -541px;}
		.stamp.imdb_account:hover span          { background-position: 2px   -541px;}

		.stamp.instagram_account                { background-position: -76px -1125px;}
		.stamp.instagram_account:hover span     { background-position: 2px   -1125px;}
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
						
						<option value="rss_feed">RSS</option>
						<option value="facebook_account">Facebook</option>
						<option value="twitter_account">Twitter</option>
						<option value="dribble_account">Dribbble</option>
						<option value="flicker_account">Flickr</option>
						<option value="vimeo_account">Vimeo</option>
						<option value="email_to">Email to</option>
						<option value="youtube_account">Youtube</option>
						<option value="pinterest_account">Pinterest</option>
						<option value="google_plus_account">Google+</option>
						<option value="linked_in_account">Linked In</option>
						
						<option value="picasa_account">Picasa</option>
						<option value="digg_account">Digg</option>
						<option value="plurk_account">Plurk</option>
						<option value="tripadvisor_account">TripAdvisor</option>
						<option value="yahoo_account">Yahoo!</option>
						<option value="delicious_account">Delicious</option>
						<option value="devianart_account">deviantART</option>
						<option value="tumblr_account">Tumblr</option>
						<option value="skype_account">Skype</option>
						<option value="apple_account">Apple</option>
						<option value="aim_account">AIM</option>
						<option value="paypal_account">PayPal</option>
						<option value="blogger_account">Blogger</option>
						<option value="behance_account">Behance</option>
						<option value="myspace_account">Myspace</option>
						<option value="stumble_account">Stumble</option>
						<option value="forrst_account">Forrst</option>
						<option value="imdb_account">IMDb</option>
						<option value="instagram_account">Instagram</option>
					
					</select>                   
				</fieldset>
				
					<fieldset style="margin-bottom:10px;padding:10px">
						<legend>Style of button:</legend>
						<label for="button_style">Choose a style:</label><br><br>
						<select name="button_style" id="button_style"  style="width:250px">
							<option value="default" selected>default</option>
							<option value="dark">dark</option>
							<option value="stamp">stamp</option>
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
					<legend>Preview:</legend>
					<div id="preview" style="height:70px"></div>
				</fieldset>
			
		</div>
		<div class="mceActionPanel">
			<div style="float: right">
				<input type="submit" id="insert" name="insert" value="Insert" onClick="submitData();" />
			</div>
		</div>
	</form>
</body></html>
