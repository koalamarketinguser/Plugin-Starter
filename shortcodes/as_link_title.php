<?php

function vc_ase_as_link_title( $atts, $content = '' ) {

	extract(
		shortcode_atts(
			array(
				'css'                 => '',
				'css_classes'         => '',
                'title_text'          => '',
                'link_conect'          => '',
                'custom_styles'        => '',
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


	
	
	<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="  my-1  vc-ase-element link-title-block  content-wrapper table">	
	<?php
		// SCOPED CSS :
		echo "<style scoped>
        .link-title-block .link-hover{
            display: inline-flex;
            overflow: hidden;
			font-weight:500;
        }
        .link-title-block .link-hover{
            display: inline-flex;
            overflow: hidden;
        }
        .link-title-block .link-hover:before{
            content: '';
            position: absolute;
            transition: width .7s ease;  
        }
       .link-hover:before{
           
            bottom: 0;
            width: 0%;
            height: 2px;
            background: #492059;
            
        }
       
        .link-title-block .link-hover:hover:before {
            width: 60%;
          }
        
		";
		// TEXT
		
		echo '</style>'; // end SCOPED CSS		
		?>
	
	<div style="<?php echo $custom_styles; ?>"><a class="link-hover" href="<?php echo $link_conect; ?>"><?php echo $title_text;?></a></div>

		
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

add_shortcode( 'as_link_title', 'vc_ase_as_link_title' );
?>
