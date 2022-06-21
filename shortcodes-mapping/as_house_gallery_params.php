<?php
/**
 *  PARAMETERS FOR ELEMENT
 *  array_merge with apply_filters("head_param_array","") in vc_map() function bellow
 *
 */
function as_images_house_gallery_array() {

	$elm_array = array(

	
		array(
			'type'             => 'attach_images',
			'heading'          => __( 'Images', 'vc_ase' ),
			'param_name'       => 'images',
			'value'            => '',
			'description'      => __( 'Select images from media library.', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),

	
		array(
			'type'        => 'exploded_textarea',
			'heading'     => __( 'Titles', 'vc_ase' ),
			'param_name'  => 'titles',
			'value'       => __( 'Image title 1,Image title 2,Image title 3', 'vc_ase' ),
			'description' => __( 'Use new line (press Enter) for each author', 'vc_ase' ),
			'admin_label' => true,
		),
	
	

	);

	return $elm_array;
};

function vc_ase_map_as_house_gallery() {
	vc_map(
		array(
			'name'        => __( 'Single House Gallery', 'vc_ase' ),
			'base'        => 'as_house_gallery',
			'class'       => '',
			'weight'      => 1,
			'icon'        => 'as_images_slider',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'simple images slider', 'vc_ase' ),
			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),
			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),
			'params'      => array_merge( apply_filters( 'head_param_array', '' ), as_images_house_gallery_array() ),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_house_gallery' );
