<?php
function as_short_house_info_array() {

	$elm_array = array(
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Ilość Miejsc w domku', 'vc_ase' ),
			'param_name'       => 'places_number',
			'value'            => '',
			'admin_label'      => true,
			'description'      => __( 'Ilość Miejsc w domku', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Powierzchnia domku', 'vc_ase' ),
			'param_name'       => 'house_size',
            'admin_label'      => true,
			'value'            => '',
			'description'      => __( 'Powierzchnia domku', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Sypialnie', 'vc_ase' ),
			'param_name'       => 'beds_number',
			'value'            => '',
            'admin_label'      => true,
			'description'      => __( 'Ilość sypialeń', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Opis sypialeń', 'vc_ase' ),
			'param_name'       => 'beds_description',
			'value'            => '',
			'description'      => __( 'Opis sypialeń', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
        array(
			'type'       => 'css_editor',
			'heading'    => __( 'Css', 'vc_ase' ),
			'param_name' => 'css',
			//'group' => __( 'Design options', 'vc_ase' ),
		),

	);

	return $elm_array;
}

function vc_ase_map_as_short_house_info() {
	vc_map(
		array(

			'name'        => __( 'Short House Info', 'vc_ase' ),
			'base'        => 'as_short_house_info',
			'class'       => '',
			'weight'      => 1,
			'icon'        => '',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'custom header', 'vc_ase' ),
			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),
			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),
			'params'      =>as_short_house_info_array(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_short_house_info' );
