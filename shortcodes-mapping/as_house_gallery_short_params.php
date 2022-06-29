<?php
/**
 *  PARAMETERS FOR ELEMENT
 *  array_merge with apply_filters("head_param_array","") in vc_map() function bellow
 *
 */
function as_images_house_gallery_short_array() {

	$elm_array = array(

	
		array(
			'type'             => 'attach_images',
			'heading'          => __( 'Images', 'vc_ase' ),
			'param_name'       => 'images',
			'value'            => '',
			'description'      => __( 'Select images from media library.', 'vc_ase' ),
			'edit_field_class' => 'vc_col-sm-12',
		),
	);

	return $elm_array;
};

function vc_ase_map_as_house_gallery_short() {
	vc_map(
		array(
			'name'        => __( 'Single House Gallery for 4 photos', 'vc_ase' ),
			'base'        => 'as_house_gallery_short',
			'class'       => '',
			'weight'      => 1,
			'icon'        => 'as_images_slider',
			'category'    => __( 'VC Aligator Studio Elements', 'vc_ase' ),
			'description' => __( '4 images gallery', 'vc_ase' ),
			'params'      => array_merge( apply_filters( 'head_param_array', '' ), as_images_house_gallery_short_array() ),

		) // end array vc_map()
	); // end vc_map()
}
add_action( 'init', 'vc_ase_map_as_house_gallery_short' );
