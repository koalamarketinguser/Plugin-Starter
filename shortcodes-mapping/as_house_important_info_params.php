<?php
function as_house_important_info_array() {

	$elm_array = array(
  
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Opis usługi1', 'vc_ase' ),
			'param_name'       => 'descrip1',
			'value'            => '',
			'description'      => '',
			'admin_label'      => true,
			'edit_field_class' => 'vc_col-sm-12',
		),
     
			array(
				'type'             => 'textfield',
				'class'            => '',
				'heading'          => __( 'Opis usługi2', 'vc_ase' ),
				'param_name'       => 'descrip2',
				'value'            => '',
				'description'      => '',
				'admin_label'      => true,
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

function vc_ase_map_as_house_imporant_info() {
	vc_map(
		array(

			'name'        => __( 'House important Inforamtion', 'vc_ase' ),
			'base'        => 'as_house_important_info',
			'class'       => '',
			'weight'      => 1,
			'icon'        => '',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'House important Inforamtion block', 'vc_ase' ),
			'params'      => as_house_important_info_array(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_house_imporant_info' );
