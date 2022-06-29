<?php

function as_luxury_testimonials_slider_array() {



	$elm_array = array(

// Slider 1
    
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 1 Title', 'vc_ase' ),
			'param_name'       => 'slider_title1',
			'value'            => '',
			'description'      => __( 'Add slider Title', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
	
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 1 Text', 'vc_ase' ),
			'param_name'       => 'slider_text1',
			'value'            => '',
			'description'      => __( 'Add slider text', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider Author', 'vc_ase' ),
			'param_name'       => 'slider_author1',
			'value'            => '',
			'description'      => __( 'Add slider button link', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		// Slider 2
    
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 2 Title', 'vc_ase' ),
			'param_name'       => 'slider_title2',
			'value'            => '',
			'description'      => __( 'Add slider Title', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
	
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 2 Text', 'vc_ase' ),
			'param_name'       => 'slider_text2',
			'value'            => '',
			'description'      => __( 'Add slider text', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider Author', 'vc_ase' ),
			'param_name'       => 'slider_author2',
			'value'            => '',
			'description'      => __( 'Add slider button link', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),

		// Slider 3
    
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 3 Title', 'vc_ase' ),
			'param_name'       => 'slider_title3',
			'value'            => '',
			'description'      => __( 'Add slider Title', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
	
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 3 Text', 'vc_ase' ),
			'param_name'       => 'slider_text3',
			'value'            => '',
			'description'      => __( 'Add slider text', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider Author', 'vc_ase' ),
			'param_name'       => 'slider_author3',
			'value'            => '',
			'description'      => __( 'Add slider button link', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		// Slider 4
    
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 4 Title', 'vc_ase' ),
			'param_name'       => 'slider_title4',
			'value'            => '',
			'description'      => __( 'Add slider Title', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
	
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 4 Text', 'vc_ase' ),
			'param_name'       => 'slider_text4',
			'value'            => '',
			'description'      => __( 'Add slider text', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider Author', 'vc_ase' ),
			'param_name'       => 'slider_author4',
			'value'            => '',
			'description'      => __( 'Add slider button link', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		// Slider 5
    
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 5 Title', 'vc_ase' ),
			'param_name'       => 'slider_title5',
			'value'            => '',
			'description'      => __( 'Add slider Title', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
	
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider 5 Text', 'vc_ase' ),
			'param_name'       => 'slider_text5',
			'value'            => '',
			'description'      => __( 'Add slider text', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Slider Author', 'vc_ase' ),
			'param_name'       => 'slider_author5',
			'value'            => '',
			'description'      => __( 'Add slider button link', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
        	


      



	);



	return $elm_array;

}



function vc_ase_map_as_luxury_testimonials_slider() {

	vc_map(

		array(



			'name'        => __( 'Luxury Testimonials Slider', 'vc_ase' ),

			'base'        => 'as_testimonials_slider',

			'class'       => '',

			'weight'      => 1,

			'icon'        => 'luxury_icon',

			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),

			'description' => __( 'slider for testimonials', 'vc_ase' ),

			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),

			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),

			'params'      =>   as_luxury_testimonials_slider_array(),



		) // end array vc_map()

	); // end vc_map()

}

add_action( 'init', 'vc_ase_map_as_luxury_testimonials_slider' );


