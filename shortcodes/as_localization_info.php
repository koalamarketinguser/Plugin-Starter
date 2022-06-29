<?php



function vc_ase_as_localizatio_info( $atts, $content = '' ) {



	extract(

		shortcode_atts(

			array(

				'css'                 => '',

				'css_classes'         => '',

				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

                'image'    => '',

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





	

	

	<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element banner-block banner-block-custom content-wrapper table">	

	<?php

		// SCOPED CSS :

		echo "<style scoped>

		.localisation-info-block{

			box-shadow: 0px 1px 8px #CACACA;

			padding: 40px 30px;

			position: relative;

			background:white;

			font-family:'Poppins',sans-serif;

			font-size:18px;

		}

        .banner-block-custom .post-image-container{

            padding:40px 0px 40px 0px;

        }

        @media(min-width:1200px){

            .banner-block-custom .post-image-container img{

                height: 330px;

                object-fit: cover;

                margin-left:auto;

                display: block;

                max-height: 100%;

                min-height: 80%;

                width:90%;

            }



        }

        

        .banner-block-custom .info-container-outer .info-container {

            align-items:center;

        }

		.banner-block-custom .info-inner-container{

			box-shadow: 0px 1px 8px #cacaca!important;

		padding:40px 30px!important;

		background:white;

		height:auto;

		width:95%;

		justify-content: space-between;

	

	}

	@media(min-width:1200px){

		.banner-block-custom .info-inner-container{

		margin-left:-50px!important;

		max-height: 100%!important;

	}

}

@media(min-width:768px){

	

	.banner-block-custom .info-inner-container{

		padding:35px 30px 35px 30px!important;

	}

}



@media(max-width:768px){

	.banner-block-custom .info-container-outer{

		height:300px;

		margin-bottom:40px;

	}

	.banner-block-custom .info-inner-container{

	flex-direction:column;

	align-items:center;

	}

}

	.banner-block-custom .info-container-outer{

		display:flex;

		flex-direction:column;

	

        justify-content: space-around;

        min-height: 300px;

	}

	.banner-block-custom .info-container .location-icon{

		max-width:50px;

		width:100%;

	}

    @media(min-width:1200px){

        .banner-block-custom .info-container .location-text{

            font-size:0.78vw;

        }





    }

	.banner-block-custom .info-container .location-text{

		

		display: flex;

		flex-wrap: wrap;

		align-items:center;

		font-weight: 800;

		max-width: 220px;

    }



	.banner-block-custom .info-inner-container .map-container{

		

			display: flex;

		align-items: center;

	}

	.banner-block-custom .info-inner-container .map-container img{

			max-width: 270px;

		width: 100%;

		margin-left: auto;

		display: block;

	}



		";

		// TEXT

		if (  $text ) {

			echo '#banner-block-' . $block_id . ' .text-holder, #banner-block-' . $block_id . ' .text-holder h4 { color: ' . $text_color . '; }';

		}

		echo '</style>'; // end SCOPED CSS		
		global $post;
		$cacheDir = ABSPATH.'wp-content/cache_custom/';
		$cacheFile = "$cacheDir/img_{$post->post_name}.json";
		if((get_current_blog_id()==1 && $post->post_type=='localization')){
		$item=wp_get_attachment_image_url($image, 'full');
		file_put_contents($cacheFile, json_encode($item));
		}
		$img_url = json_decode(file_get_contents($cacheFile), true);
		?>

		<div class="container">

			<div class="row">

				<div class="col-xl-5 col-md-12 post-image-container">
			
                <img src="<?php echo $img_url; ?>">



				</div>

				<div class="col-xl-7 col-md-12 d-flex info-outer-container align-items-center">

					<div class="info-inner-container  d-flex ">

					<div class="info-container-outer">

						<div class="info-container plane d-flex">

							<div class="location-icon"><img src="<?php echo get_home_url()?>/wp-content/img/airplane.png"></div>

							<div class="location-text"><b class="ms-3"> <?php echo get_field('lot')?></b></div>

						</div>

						<div class="info-container city d-flex">

							<div class="location-icon"><img src="<?php echo get_home_url()?>/wp-content/img/skyline.png"></div>

							<div class="location-text"><b class="ms-3"> <?php echo get_field('dojazd_do_lokalizacji')?></b></div>

						</div>

						<div class="info-container pointer d-flex">

							<div class="location-icon"><img src="<?php echo get_home_url()?>/wp-content/img/location.png"></div>

							<div class="location-text"><p class="ms-3 mb-0" > <?php echo get_field('adres_lokalizacji')?></p></div>

						</div>

					</div>

				

					<div class="map-container">

						<img src="<?php echo get_field('mapa_lokalizacji')?>">

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



add_shortcode( 'as_localizatio_info', 'vc_ase_as_localizatio_info' );

?>

