<?php
abstract class Admin_Theme_Menu_SkinGroup
{

	const ACTIVE_SKIN_OPTION = '_active_skin_layout';

	/**
	 * each group must have personal name
	 */
	const NAME = 'default';
	/**
	 * Array of grouped options
	 *
	 * @var array
	 */
	private $options = array();

	public function __construct() {

		$this->init();
	}

	abstract protected function init();
	abstract function getName();

	public function save() {
		foreach ( $this->getGroupedOptionsList() as $option ) {
			$option->save();
		}
	}

	public function reset() {
		foreach ( $this->getGroupedOptionsList() as $option ) {
			$option->reset();
		}
	}

	public function saveDefaultValues() {
		foreach ( $this->getGroupedOptionsList() as $option ) {
			$option->setDefaultValue();
		}
	}


	public function addOptionToGroup( $option ) {

		$this->options[] = $option;
	}

	public function getGroupedOptionsList() {

		return $this->options;
	}

	public function isActive() {
		return $this->getName() == $this->getActiveSkinName();
	}

	private function getActiveSkinName() {

		return getRetroSkin();
	}

	public static function getActiveLayout() {

		return getRetroSkin();
	}
}
?>
