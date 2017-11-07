<?php

class Admin_Theme_Element_Radio_Dummy extends Admin_Theme_Menu_Element
{
	protected $option = array(
							'type' => Admin_Theme_Menu_Element::TYPE_RADIO,
						);


	public function render() {

		/**
		 * @todo what is selector ?????
		 */
		$selector = '';
		ob_start();
		$id_iterator = 1;
		$value = get_option( $this->id );
		echo $this->getElementHeader();?>
			<?php foreach ( $this->options as $r_value => $r_description ) :
				$disable = false;
				switch ( $r_value ) {
					case Import_Dummy::WOO:
						if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
							$disable = true;
						}
						break;
					case Import_Dummy::JIGO:
						if ( ! is_plugin_active( 'jigoshop/jigoshop.php' ) ) {
							$disable = true;
						}
						break;
					case Import_Dummy::E_COMMERCE:
						if ( ! is_plugin_active( 'wp-e-commerce/wp-shopping-cart.php' ) ) {
							$disable = true;
						}
						break;

					default:
						$disable = false;
						break;
				}
				?>
				
			<label><input name="<?php echo $this->id; ?>" id="<?php echo $this->id . '_' . $id_iterator++; ?>" type="radio" value="<?php echo $r_value; ?>" <?php echo $selector; ?> <?php if ( $value == $r_value || $r_value == $this->getStdValue() ) {echo 'checked="checked"';}?> <?php echo $disable?'disabled="disabled"':''; ?>/> <?php echo $r_description;
			echo $disable?' (Install and activate)':''; ?></label><br /><br />
			<?php endforeach;?>
		<?php
		echo $this->getElementFooter();
		$html = ob_get_clean();
		return $html;
	}
}
?>
