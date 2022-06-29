<?php



function vc_ase_as_luxury_testimonials_slider( $atts, $content = '' ) {



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
$sliders_array=[];   

    $sliders_array = array_chunk($atts, 3);


?>

<div id="testimonials-carousel" class=" owl-carousel testimonials-carousel owl-theme luxury-slider">
<?php
foreach( $sliders_array as  $key=>$slide ){


    $slide_text=$slide[1] ;
    $slide_title=$slide[0];
    $slide_author=$slide[2];
    ?>

        <div class="slide">
            <div class="slide-inner d-sm-flex d-none">
                <div class="slide-text-container">
                    <h1><?php echo  $slide_title;?></h1>
                    <p  class="text"><?php echo  $slide_text;?></p>
                    <p class="author"><?php echo $slide_author?></p>
                </div>       
            </div>     
        </div>

 
<?php 
}

?>
</div>
</div>
    <script>

		jQuery(document).ready( function($) {
            $('#testimonials-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:true,
    navText:["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1,
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
add_shortcode( 'as_testimonials_slider', 'vc_ase_as_luxury_testimonials_slider' );
?>


