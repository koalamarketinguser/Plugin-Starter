<?php



function vc_ase_as_acf_output( $atts, $content = '' ) {



	extract(

		shortcode_atts(

			array(

                'title_text'          => '',

                'custom_styles'        => '',

				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),



			), $atts

		)

	);


	####################  HTML STARTS HERE: ###########################
	ob_start();
    $output = '';
    $output .= '<span class="acf-'.$title_text.'">';
   
	?>
     <h1>asdfgsdfgsdfgsdfg</h1>
	<?php
	####################  HTML ENDS HERE: ###########################
	?>
	<?php

	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string ;
}



add_shortcode( 'as_acf_output', 'vc_ase_as_acf_output' );

?>

