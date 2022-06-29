<?php



function vc_ase_as_luxury_slider( $atts, $content = '' ) {



	extract(
		shortcode_atts(
			array(
				'slider_image'                 => '',

				'sep_slider'               => '',

				'slider_text'   => '',

				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts

		)

	);






	$vc_css_class = vc_shortcode_custom_css_class( $css, ' ' );



	$text = wpb_js_remove_wpautop( $content, true );



	####################  HTML STARTS HERE: ###########################

ob_start();
    

$sliders_array = array_chunk($atts, 5);

?>

<div id="owl-carousel" class="owl-carousel owl-theme luxury-slider">
<?php
foreach( $sliders_array as  $key=>$slide ){
   
    $slide_img = wp_get_attachment_image_src($slide[0], 'full');
    $slide_img_mobile = wp_get_attachment_image_src($slide[1], 'full');
   
    $slide_text=$slide[3];
    $slide_title=$slide[2];
    $slide_btn_link=$slide[4];
    ?>

    <div class="slide">
        <div class="slide-inner d-sm-flex d-none" style="background-image:url(<?php echo  $slide_img[0];?>)">
        <div class="slide-text-container">
            <h1><?php echo  $slide_title;?></h1>
            <p><?php echo  $slide_text;?></p>
            <a href="<?php echo $slide_btn_link;?>" >pierze i push kaczy</a>
        </div>       
        </div>
        <div class="slide-inner d-sm-none" style="background-image:url(<?php echo  $slide_img_mobile[0];?>)">
        <div class="slide-text-container">
        <h1><?php echo  $slide_title;?></h1>
        <p><?php echo  $slide_text;?></p>
        
     
        </div>
        </div>
    </div>
<?php 
}

?>
</div>
    <script>

		jQuery(document).ready( function($) {
            $('#owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    items:4,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
		});

		</script>

	<?php

	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'as_luxury_slider', 'vc_ase_as_luxury_slider' );
?>


