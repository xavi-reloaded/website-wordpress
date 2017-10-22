<?php

//Create meta fields for pages and taxonomies alike
function cpotheme_metadata_layout_options(){

	$cpotheme_data = array();
	
	$cpotheme_data['layout_sidebar'] = array(
	'name' => 'layout_sidebar',
	'label' => __('Sidebar Position', 'affluent'),
	'desc' => __('Determines the location of the sidebar by default.', 'affluent'),
	'type' => 'imagelist',
	'option' => cpotheme_metadata_sidebarposition(),
	'std' => 'default');
	
	return apply_filters('cpotheme_metadata_layout', $cpotheme_data);
}

//Create feature meta fields
function cpotheme_metadata_feature_options(){

	$cpotheme_data = array();
		
	$cpotheme_data['feature_icon'] = array(
	'name' => 'feature_icon',
	'std'  => '',
	'label' => __('Feature Icon', 'affluent'),
	'desc' => __('Sets an icon to be used as the featured element.', 'affluent'),
	'type' => 'iconlist');
	
	return apply_filters('cpotheme_metadata_feature', $cpotheme_data);
}


//Create portfolio meta fields
function cpotheme_metadata_portfolio_options(){

	$cpotheme_data = array();
		
	$cpotheme_data['portfolio_featured'] = array(
	'name' => 'portfolio_featured',
	'std'  => '',
	'label' => __('Featured Item', 'affluent'),
	'desc' => __('Specifies whether this item appears in the homepage.', 'affluent'),
	'type' => 'yesno');
	
	return apply_filters('cpotheme_metadata_portfolio', $cpotheme_data);
}


//Create product meta fields
function cpotheme_metadata_product_options(){

	$cpotheme_data = array();
		
	$cpotheme_data['product_featured'] = array(
	'name' => 'product_featured',
	'std'  => '',
	'label' => __('Featured Item', 'affluent'),
	'desc' => __('Specifies whether this item appears in the homepage.', 'affluent'),
	'type' => 'yesno');
	
	return apply_filters('cpotheme_metadata_product', $cpotheme_data);
}


//Create service meta fields
function cpotheme_metadata_service_options(){

	$cpotheme_data = array();
		
	$cpotheme_data['service_featured'] = array(
	'name' => 'service_featured',
	'std'  => '',
	'label' => __('Featured Item', 'affluent'),
	'desc' => __('Specifies whether this item appears in the homepage.', 'affluent'),
	'type' => 'yesno');
	
	$cpotheme_data['service_icon'] = array(
	'name' => 'service_icon',
	'std'  => '',
	'label' => __('Service Icon', 'affluent'),
	'desc' => __('Sets an icon to be used as the service preview.', 'affluent'),
	'type' => 'iconlist');
	
	return apply_filters('cpotheme_metadata_service', $cpotheme_data);
}


//Create team meta fields
function cpotheme_metadata_team_options(){

	$data = array();
		
	$data['team_featured'] = array(
	'name' => 'team_featured',
	'std'  => '',
	'label' => __('Featured Member', 'affluent'),
	'desc' => __('Specifies whether this member appears in the homepage.', 'affluent'),
	'type' => 'yesno');
	
	return apply_filters('cpotheme_metadata_team', $data);
}


//Create page meta fields
function cpotheme_metadata_page_options(){

	$data = array();
	
	$data['page_featured'] = array(
	'name' => 'page_featured',
	'std'  => '',
	'label' => __('Show In Homepage', 'affluent'),
	'desc' => __('Specifies whether this item is featured in the homepage.', 'affluent'),
	'type' => 'select',
	'option' => cpotheme_metadata_featured_page());
	
	return apply_filters('cpotheme_metadata_page', $data);
}