<?php
function as_houses_slider_array() {

	$elm_array = array(

        array(
			'type'       => 'css_editor',
			'heading'    => __( 'Css', 'vc_ase' ),
			'param_name' => 'css',
			//'group' => __( 'Design options', 'vc_ase' ),
		),
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slug lokalizacji taxonomiii domku', 'vc_ase' ),
			'param_name'       => 'localization_slug',
			'value'            => '',
			'description'      => '',
			'admin_label'      => true,
			'edit_field_class' => 'vc_col-sm-12',
		),

	);

	return $elm_array;
}

function vc_ase_map_as_houses_slider() {
	vc_map(
		array(

			'name'        => __( 'House Posts Slider', 'vc_ase' ),
			'base'        => 'as_houses_slider',
			'class'       => '',
			'weight'      => 1,
			'icon'        => '',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'slider for house post type', 'vc_ase' ),
			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),
			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),
			'params'      =>  as_houses_slider_array(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_houses_slider' );
