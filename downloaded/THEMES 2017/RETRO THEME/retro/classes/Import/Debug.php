<?php

final class Import_Debug
{

	static public function ok( $class, $method ) {
		if ( defined( 'CUSTOM_THEME_DUBUG_ON' ) && CUSTOM_THEME_DUBUG_ON === true ) {
			echo '<b><font style="color: green;">OK: ', $class, '::', $method, '</font></b><br/>';
		}
	}

	static public function log( $message ) {
		if ( defined( 'CUSTOM_THEME_DUBUG_ON' ) && CUSTOM_THEME_DUBUG_ON === true ) {
			echo '<b><font style="color: green;">LOG: ', $message, '</font></b><br/>';
		}
	}

	static public function error( $mesage ) {
		if ( defined( 'CUSTOM_THEME_DUBUG_ON' ) && CUSTOM_THEME_DUBUG_ON === true ) {
			trigger_error( $mesage, E_USER_ERROR );
		}
	}

	static public function insert( $table, $data, $format = null ) {

		global $wpdb;

		$r = $wpdb->insert( $table, $data, $format );

		if ( $r ) {
			self::log( $table . serialize( $data ) );
		} else {
			$wpdb->print_error();
			self::error( $table . serialize( $data ) );
		}
	}
}
?>
