<?php

class Import_Theme_Menus implements Import_Theme_Item
{
	public function import() {

		global $wpdb;

		$table_db_name = $wpdb->prefix . 'terms';
		$rows = $wpdb->get_results( "SELECT * FROM $table_db_name where  name='Left' OR name='right'", ARRAY_A );
		$menu_ids = array();

		foreach ( $rows as $row ) {
			$menu_ids[ $row['name'] ] = $row['term_id'];
		}

		$items = wp_get_nav_menu_items( $menu_ids['Left'] );

		foreach ( $items as $item ) {
			if ( $item->title == 'HOME' ) {
				update_post_meta( $item->ID, '_menu_item_url', home_url() );
			}
		}

		@set_theme_mod( 'nav_menu_locations', array_map( 'absint', array( 'header-menu-left' => $menu_ids['Left'], 'header-menu-right' => $menu_ids['right'] ) ) );
	}
}
?>
