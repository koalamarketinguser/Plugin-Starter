<?php
function as_link_title_array() {

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
			'heading'          => __( 'Link Text', 'vc_ase' ),
			'param_name'       => 'title_text',
			'value'            => '',
			'admin_label'      => true,
			'description'      => __( 'Title of the link', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
		array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Link To Conect', 'vc_ase' ),
			'param_name'       => 'link_conect',
			'value'            => '',
			'description'      => __( 'Link to the text', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
        array(
			'type'             => 'textfield',
			'class'            => '',
			'heading'          => __( 'Custom styles', 'vc_ase' ),
			'param_name'       => 'custom_styles',
			'value'            => '',
			'description'      => __( 'Custom styles for element', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),

	);

	return $elm_array;
}

function vc_ase_map_as_link_title() {
	vc_map(
		array(

			'name'        => __( 'Custom Link Text Block', 'vc_ase' ),
			'base'        => 'as_link_title',
			'class'       => '',
			'weight'      => 1,
			'icon'        => '',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( 'custom header', 'vc_ase' ),
			//'admin_enqueue_js' => array( plugin_dir_url( __FILE__ ).'/vc_extend/bartag.js'),
			//'admin_enqueue_css' => array( plugin_dir_url( __FILE__ ).'/as_vc_extend/shotcodes/css/input.css'),
			'params'      => as_link_title_array(),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_link_title' );
