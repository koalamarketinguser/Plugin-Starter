<?php

function vc_ase_as_house_important_info( $atts, $content = '' ) {

	extract(
		shortcode_atts(
			array(   
                'descrip1'               => '',
                'descrip2'               => '',
				'css_classes'         => '',
				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts
		)
	);


	####################  HTML STARTS HERE: ###########################
	ob_start();
	?>
    <style>
        .house-important-info-block img{
            object-fit: scale-down;
            align-self: unset;
            width: 50px;
            margin-right: 16px;
            
        }
           
    </style>

<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element banner-block house-important-info-block content-wrapper table d-flex justify-content-between">
<div class="container">
    <div class="row ps-3 ps-sm-0">
        <div class="col-md-6">
        <div class="d-flex justify-content-center ">
        <img class=" img-fluid" src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) . 'assets/images/linen.png'; ?>" alt="" />
        <div class="text-info-container">
            <div class="text-info-container" style="text-align: left;"><?php echo $descrip1; ?></div>    
        </div>
    </div>
        </div>
        <div class="col-md-6 d-flex justify-content-start">
        <div class="d-flex justify-content-center ">
        <img class=" img-fluid "
            src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) . 'assets/images/dog.png'; ?>" alt="" />
        <div class="text-info-container">
            <div class="text-info-container" style="text-align: left;"><?php echo $descrip2; ?></div>
        </div>
    </div> 
        </div>
    </div>
</div>
</div>
     <?php
	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'as_house_important_info', 'vc_ase_as_house_important_info' );
?>