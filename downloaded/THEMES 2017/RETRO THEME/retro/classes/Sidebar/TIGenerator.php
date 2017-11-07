<?php

class Sidebar_TIGenerator {

	function __construct() {
		add_action( 'init',array( 'Sidebar_TIGenerator', 'init' ) );
	}

	static function init() {
		// go through each sidebar and register it
	    $sidebars = Sidebar_TIGenerator::get_sidebars();

	    if ( is_array( $sidebars ) ) {
			$z = 1;
			foreach ( $sidebars as $sidebar_class => $sidebar ) {
				$sidebar_class = Sidebar_TIGenerator::name_class( $sidebar );
				register_sidebar(array(
			    	'name' => $sidebar,
					'id' => "ox_sidebar-$z",
			    	'before_widget' => '<div id="%1$s" class="widget ' . $sidebar_class . ' %2$s">',
		   			'after_widget' => '</div>',
		   			'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
		    	));
				$z++;
			}
		}
	}

	/**
	 * called by the action get_sidebar. this is what places this into the theme
	 */
	static function get_sidebar( $index ) {

			dynamic_sidebar( $index );

	}

	/**
	 * gets the generated sidebars
	 */
	static function get_sidebars( $with_default = false ) {
		$sidebar = get_option( SHORTNAME . '_sidebar_generator' );
		if ( $with_default && is_array( $sidebar ) ) {
			$sidebar = array_merge( array( 'default-sidebar' => 'Use Default sidebar' ), $sidebar );
		}
		return $sidebar;
	}
	static function name_class( $name ) {
		return sanitize_title( $name );
		// $class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		// return $class;
	}
}
$sbg = new Sidebar_TIGenerator;

function generated_dynamic_sidebar_th( $index ) {
	Sidebar_TIGenerator::get_sidebar( $index );
	return true;
}
?>
