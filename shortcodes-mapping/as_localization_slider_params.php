<?php
function as_localization_slider() {

	$elm_array = array(

	
	

        array(
			'type'       => 'css_editor',
			'heading'    => __( 'Css', 'vc_ase' ),
			'param_name' => 'css',
			//'group' => __( 'Design options', 'vc_ase' ),
		),

		
		
	
		
	);

	return $elm_array;
}

function vc_ase_map_as_localization_slider() {
	vc_map(
		array(

			'name'        => __( 'Localisation Posts Slider', 'vc_ase' ),
			'base'        => 'as_localization_slider',
			'class'       => '',
			'weight'      => 1,
			'icon'        => '',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'custom image with callout', 'vc_ase' ),
			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),
			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),
			'params'      => as_localization_slider(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_localization_slider' );
