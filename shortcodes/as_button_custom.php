<?php
function vc_ase_as_button_custom( $atts, $content = null ) {

	extract(
		shortcode_atts(
			array(
				// element title settings
				'title'               => '',
				'subtitle'            => '',
				'sub_position'        => 'bellow',
				'title_style'         => 'center',
				'title_custom_css'    => '',
				'subtitle_custom_css' => '',
				'title_color'         => '',
				'subtitle_color'      => '',
				'title_size'          => '',
				'heading_css'         => '',
				// button settings
				'button_label'        => '',
				'button_align'        => 'center',
				'button_size'         => 'normal',
				'button_style'        => 'normal',
				'ac_link_button'      => '',
				'btn_css'             => '',

				'css_classes'         => '',
				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts
		)
	);

	
	$output_string = ob_get_contents();

	ob_end_clean();

	return $output_string;

}

add_shortcode( 'as_custom_button', 'vc_ase_as_button_custom' );
?>
