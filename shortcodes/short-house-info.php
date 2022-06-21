<?php



function vc_ase_as_short_house_info( $atts, $content = '' ) {



	extract(

		shortcode_atts(

			array(

				'css'                 => '',

                'places_number'       => '',

                'house_size'          => '',

				'beds_number'         => '',

                'beds_description'    => '',

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

	<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="m-0 p-2 vc-ase-element short-house-info content-wrapper table">	

	<?php

		// SCOPED CSS :

		echo "<style scoped>";

		echo '</style>'; // end SCOPED CSS		

		?>

       <div class="container-lg">

           <div class="row gx-0">

               <div class="col-md-2 d-flex align-items-center">

                    <div class="inner-info-container  d-flex align-items-center">

                       <img class="me-2"style="width:16px; height:16px"src="<?php echo get_home_url()?>/wp-content/img/house-icons/person.svg" alt="">

                       <p class="m-0" style="font-size:12px"><?php echo __('Miejsc: ','vc_ase') ?> <?php echo $places_number;?></p>

                    </div>

               </div>

               <div class="col-md-3 d-flex align-items-center">

                    <div class="inner-info-container  d-flex align-items-center">

                       <img class="me-2"style="width:16px; height:16px"src="<?php echo get_home_url()?>/wp-content/img/house-icons/exit-arrow.svg" alt="">

                       <p class="m-0"  style="font-size:12px"><?php echo  __('Powierzchnia: ','vc_ase') ?><?php echo $house_size;?></p>

                    </div>

               </div>

               <div class="col-md-3 d-flex align-items-center">

                    <div class="inner-info-container  d-flex align-items-center">

                       <img class="me-2"style="width:16px; height:16px"src="<?php echo get_home_url()?>/wp-content/img/house-icons/door.svg" alt="">

                       <p class="m-0"  style="font-size:12px"><?php echo  __('Sypialnie: ','vc_ase') ?><?php echo $beds_number;?></p>

                    </div>

               </div>

               <div class="col-md-4 d-flex align-items-center">

                    <div class="inner-info-container  d-flex align-items-center">

                       <img class="me-2"style="width:16px; height:16px"src="<?php echo get_home_url()?>/wp-content/img/house-icons/bad.svg" alt="">

                       <p class="m-0"  style="font-size:12px"> <?php  echo $beds_description;?></p>

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
add_shortcode( 'as_short_house_info', 'vc_ase_as_short_house_info' );

?>

