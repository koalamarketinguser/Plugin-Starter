<?php

function vc_ase_as_house_payments( $atts, $content = '' ) {

	extract(
		shortcode_atts(
			array(
                'title1'               => '',
                'title2'               => '',
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
        .house-payments-block img{
            object-fit:contain;
            align-self: baseline;
            width: 50px;
            margin-right: 16px;

        }
           
    </style>

<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element banner-block house-payments-block content-wrapper table d-flex justify-content-between">

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="d-flex  ">
        <img class=" img-fluid" src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) . 'assets/images/money.png'; ?>" alt="" />
        <div class="text-info-container">
            <p style="text-align: left; margin-bottom: 0px;"><b><?php echo $title1; ?></b></p> 
            <div class="text-info-container" style="text-align: left;"><?php echo $descrip1; ?></div>    
        </div>
    </div>
        </div>
        <div class="col-md-6">
        <div class="d-flex justify-content-center ">
        <img class=" img-fluid "
            src="<?php echo plugin_dir_url(  dirname( __FILE__ ) ) . 'assets/images/money.png'; ?>" alt="" />
        <div class="text-info-container">
            <p style="text-align: left; margin-bottom: 0px;"><b><?php echo $title2 ?></b></p>
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
add_shortcode( 'as_icon_house_payments', 'vc_ase_as_house_payments' );
?>