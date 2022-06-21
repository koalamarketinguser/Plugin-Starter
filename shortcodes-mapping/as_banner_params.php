<?php
function as_banner_array() {

	$elm_array = array(

		
        array(
			'type'             => 'attach_image',
			'heading'          => __( 'Images', 'vc_ase' ),
			'param_name'       => 'house_single_image',
			'value'            => '',
			'description'      => __( 'Select image from media library.', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		

		array(
			'type'             => 'separator',
			'class'            => '',
			'heading'          => '',
			'param_name'       => 'sep_4',
			'value'            => '',
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Additional CSS classes', 'vc_ase' ),
			'param_name'       => 'css_classes',
			'value'            => '',
			'description'      => __( 'Adds a wrapper div with additional css classes for more styling control', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),

	);

	return $elm_array;
}

function vc_ase_map_as_banner() {
	vc_map(
		array(

			'name'        => __( 'Banner', 'vc_ase' ),
			'base'        => 'as_banner',
			'class'       => '',
			'weight'      => 1,
			'icon'        => 'as_banner',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'custom image with callout', 'vc_ase' ),
			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),
			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),
			'params'      => as_banner_array(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_banner' );
