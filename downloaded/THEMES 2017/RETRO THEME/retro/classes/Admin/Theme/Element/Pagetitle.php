<?php
/**
 * Class for Pagetitle Html element
 */
class Admin_Theme_Element_Pagetitle extends Admin_Theme_Menu_Element
{
	protected $option = array(
		'type' => Admin_Theme_Menu_Element::TYPE_PAGETITLE,
	);

	public function render() {

		ob_start();
	?>
		<a name="ox_top" id="ox_top"></a>
		<div class="admin_top">
			<h2><?php echo $this->name; ?></h2>
			<?php if ( $_GET['page'] != SHORTNAME . '_dummy' ) : ?>
				<input name="save_options" type="submit" value="Save Changes" class="ox_save top"  />
			<?php endif; ?>
		</div>
		<div class="color_separator"></div>
		<div class="ox_admin_wrap">
		<ul>
			<?php
			$html = ob_get_clean();
			return $html;
	}
}
?>
