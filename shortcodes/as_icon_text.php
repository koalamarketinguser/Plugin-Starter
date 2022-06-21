<?php

function vc_ase_as_icon_text( $atts, $content = '' ) {

	extract(
		shortcode_atts(
			array(
				'css'                 => '',
                'title'               => '',
                'image'               => '',
				'css_classes'         => '',
                'icon_size'             => '45px',
				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts
		)
	);

	
	$vc_css_class = vc_shortcode_custom_css_class( $css, ' ' );

	$text = wpb_js_remove_wpautop( $content, true );

	####################  HTML STARTS HERE: ###########################
	ob_start();
	;
	echo $css_classes ? '<div class="' . esc_attr( $css_classes ) . '">' : null;
	?>


	
	
	<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element banner-block icon-text-block content-wrapper table">	
	<?php
		// SCOPED CSS :
		echo "<style scoped>";
		
		echo ' .icon-text-block .icon-text { font-size:' . $icon_size=='55px'? '14px': '18px'. '; font-weight:700;  }' ;
		
		// TEXT
		if (  $text ) {
			echo '#banner-block-' . $block_id . ' .text-holder, #banner-block-' . $block_id . ' .text-holder h4 { color: ' . $text_color . '; }';
		}
		echo '</style>'; // end SCOPED CSS		
		?>
	
        <div class="icon-text-container d-flex align-items-center">
                    <div class="icon-container">
                    <img class="icon-image img-fluid p-0"  src="<?php echo wp_get_attachment_image_url($image); ?>" />
                    </div>
                    <div class="icon-text-container ">
                    <?php 	echo $text ? '<div class="icon-text text px-1">' . wp_kses_post( $text ) . '</div>' : null; ?> 
                       
                    </div>
                </div>
               
        </div>
           

		
	
	<?php
	####################  HTML ENDS HERE: ###########################
	echo $css_classes ? '</div>' : null;
	?>
	

		
	<?php
	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();

	ob_end_clean();

	return $output_string;

}

add_shortcode( 'as_icon_text', 'vc_ase_as_icon_text' );
?>
