<?php
function as_house_payments_params_array() {

	$elm_array = array(
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Tytuł usługi1', 'vc_ase' ),
			'param_name'       => 'title1',
			'value'            => '',
			'description'      => '',
			'admin_label'      => true,
			'edit_field_class' => 'vc_col-sm-12',
		),
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
                'heading'          => __( 'Tytuł usługi2', 'vc_ase' ),
                'param_name'       => 'title2',
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

function vc_ase_map_as_house_payments() {
	vc_map(
		array(

			'name'        => __( 'House Payments Rules', 'vc_ase' ),
			'base'        => 'as_icon_house_payments',
			'class'       => '',
			'weight'      => 1,
			'icon'        => '',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'icon text block', 'vc_ase' ),
			'params'      => as_house_payments_params_array(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_house_payments' );
