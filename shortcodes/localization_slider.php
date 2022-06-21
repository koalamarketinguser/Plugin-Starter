<?php

function vc_ase_as_localization_slider( $atts, $content = '' ) {

	extract(
		shortcode_atts(
			array(

				'css'                 => '',
				'title'               => '',
				
				'css_classes'         => '',
				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts
		)
	);



	$vc_css_class = vc_shortcode_custom_css_class( $css, ' ' );

	$text = wpb_js_remove_wpautop( $content, true );

	####################  HTML STARTS HERE: ###########################
	ob_start();
	
	
	?>
<div id="custom-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element banner-block content-wrapper  table">	

<?php 
$args = array(
	'post_type' => 'localization',
);
$query = new WP_Query;
$my_posts = $query->query($args);
?>
<div class="container">
<div class="row">
	<div class="col">
		<div class="owl-carousel locations-carousel owl-theme">
<?php
foreach( $my_posts as  $my_post ){
    $url_link = '<a href="'. get_permalink($my_post->ID).'"  >';
?>
	
				<div class="location-wrap item">
					<div class="location-single">
						<div class="location-img " style="background-repeat:no-repeat;background-size:cover;background-position:100% 65%;background-image:url('<?php echo get_the_post_thumbnail_url($my_post->ID)?>')">
							<div class="location-hover" >
                              <?php  echo $url_link ?>
                              
                              <div class="polygon">
                                                <p><?php echo __('Dowiedz się więcej', 'vc_ase')?></p>
                                            </div>
                                </a>
                            </div>
						</div>
						<div class="location-info">
							<h3><?php echo $my_post->post_title?></h3>
							<p><?php echo $my_post->post_excerpt ?></p>
							
							
						</div>
					</div>
				</div>
			
			



<?php }?>


</div>
	</div>
			</div>
			</div>	
	</div>
	<script>
		jQuery(document).ready( function($) {
			
            $('.locations-carousel').owlCarousel({
        loop: true,
        nav: true,
        margin: 22,
        responsive: {
            0: {
                items: 1
            },
            900: {
                items: 2
            },
            1500: {
                items: 3
            }
        }
    });

		});
		</script>

	
	

		
	<?php
	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();

	ob_end_clean();

	return $output_string;

}

add_shortcode( 'as_localization_slider', 'vc_ase_as_localization_slider' );
?>
