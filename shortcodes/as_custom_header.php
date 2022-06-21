<?php

function vc_ase_as_custom_header( $atts, $content = '' ) {

	extract(
		shortcode_atts(
			array(
				'css'                 => '',
				'css_classes'         => '',
                'dots_color'          => 'yellow',
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


	
	
	<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element banner-block header-block-custom content-wrapper table">	
	<?php
    $imgs_dir = get_home_url().'/wp-content/img/';
    $img_option = $dots_color? $dots_color:'';
    $src=$imgs_dir .  $img_option . '-dots.png';
   
		// SCOPED CSS :
		echo "<style scoped>
		.header-block-custom{
            font-size:28px;
            text-transform:uppercase;
            font-weight:800;
            line-height:42px;
			font-family:'Poppins',sans-serif;
        }
        .custom-header {
            line-height:50px;
        }
		";
		// TEXT
        echo '#banner-block-' . $block_id . ' .custom-header p::after{ content: url('. $src.'); margin-left:10px;}';
		echo '</style>'; // end SCOPED CSS		
		?>
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                <div class="header-container d-flex">
                    <div class="header-text-container">
                      
                    <?php 	echo $text ? '<div class="custom-header text">' .  $text . '</div>' : null; ?> 
                    </div>
                   
                        
                  
                </div>
               
                </div>
           

				
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

add_shortcode( 'as_custom_header', 'vc_ase_as_custom_header' );
?>
