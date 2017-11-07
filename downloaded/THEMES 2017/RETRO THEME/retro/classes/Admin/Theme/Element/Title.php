<?php
/**
 * Class for Info Html element
 *
 * @todo No page using this element
 * @uses NO
 */
class Admin_Theme_Element_Title extends Admin_Theme_Menu_Element
{
	protected $option = array(
							'type' => Admin_Theme_Menu_Element::TYPE_INFO,
						);

	public function render() {

		return "<h1>{$this->name}</h1>";

	}
}
?>
