<?php

function as_slider_array() {



	$elm_array = array(

  		array(

			'type'             => 'textfield',

			'class'            => '',

			'heading'          => __( 'Link Text', 'vc_ase' ),

			'param_name'       => 'title_text',

			'value'            => '',

			'admin_label'      => true,

			'description'      => __( 'Title of the link', 'vc_ase' ),

			'edit_field_class' => 'vc_col-sm-12',

		)
	);



	return $elm_array;

}



function vc_ase_map_slider() {

	vc_map(

		array(



			'name'        => __( 'ACF Field block', 'vc_ase' ),

			'base'        => 'as_slider',

			'class'       => '',

			'weight'      => 1,

			'icon'        => '',

			'category'    => __( 'ACF Field block', 'vc_ase' ),

			'description' => __( 'custom header', 'vc_ase' ),

			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),

			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),

			'params'      => as_slider_array(),



		) // end array vc_map()

	); // end vc_map()

}

add_action( 'init', 'vc_ase_map_slider' );

