<?php
function as_icon_text_array() {

	$elm_array = array(
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Banner title', 'vc_ase' ),
			'param_name'       => 'title',
			'value'            => '',
			'description'      => '',
			'admin_label'      => true,
			'edit_field_class' => 'vc_col-sm-12',
		),

        array(
			'type'             => 'attach_image',
			'heading'          => __( 'Images', 'vc_ase' ),
			'param_name'       => 'image',
			'value'            => '',
			'description'      => __( 'Select images from media library.', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),


		array(
			'type'             => 'textarea_html',
			'class'            => '',
			'heading'          => __( 'Custom header text', 'vc_ase' ),
			'param_name'       => 'content',
			//"value" => "",
			'description'      => '',
			'edit_field_class' => 'vc_col-sm-12',
		),
      
		array(
			'type'       => 'css_editor',
			'heading'    => __( 'Css', 'vc_ase' ),
			'param_name' => 'css',
			//'group' => __( 'Design options', 'vc_ase' ),
		),
        array(
			'type'             => 'dropdown',
			'class'            => '',
			'heading'          => __( 'Block Size', 'vc_ase' ),
			'param_name'       => 'icon_size',
			'value'            => array(
				'Small'  => '40px',
				'Medium'  => '45px',
                'Large'  => '170px',
			
			),
            'std'              => '45px',
			'description'      => '',
			'edit_field_class' => '',
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
		/*
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Content"),
			"param_name" => "content",
			"value" => __("<p>I am test text block. Click edit button to change this text.</p>"),
			"description" => __("Enter your content.")
		)
		*/
	);

	return $elm_array;
}

function vc_ase_map_as_icon_text() {
	vc_map(
		array(

			'name'        => __( 'Icon Text Block', 'vc_ase' ),
			'base'        => 'as_icon_text',
			'class'       => '',
			'weight'      => 1,
			'icon'        => '',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'icon text block', 'vc_ase' ),
			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),
			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),
			'params'      => as_icon_text_array(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_icon_text' );
