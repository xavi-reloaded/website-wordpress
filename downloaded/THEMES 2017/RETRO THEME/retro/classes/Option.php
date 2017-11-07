<?php

class Option
{
	public $i = 0;
	private static $instance;
	private $options = array();

	private function __construct(){}
	private function __clone(){}
	private function __wakeup(){}

	public static function getInstance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Option();
		}
		return self::$instance;
	}

	public function get( $option_name ) {
		if ( ! isset( $this->options[ $option_name ] ) ) {
			$this->options[ $option_name ] = get_option( $option_name );
		} // calculate repeats
		else {
			$this->i += 1;
		}
		return $this->options[ $option_name ];
	}
}
?>
