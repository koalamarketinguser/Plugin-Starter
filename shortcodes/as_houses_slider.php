<?php



function vc_ase_as_houses_slider( $atts, $content = '' ) {



	extract(

		shortcode_atts(

			array(



				'css'                 => '',

				'title'               => '',

				'localization_slug'   =>'',

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

<div id="custom-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element house-posts-block content-wrapper  table">	

<?php

		// SCOPED CSS :

		echo "<style scoped>

		.house-posts-block .house-img{

     		min-width:45%;width:100%;}

		.house-posts-block .house-single{

				padding: 25px;

				box-shadow: 0px 2px 8px  #CACACA;

				background-color: white;

    			z-index: 10;

				min-height:450px;

			}

		.house-posts-block .house-info h3{

			font-family: var(--poppins);

			font-size: 20px;

			font-weight: 700;

			text-transform: none;

			}

		.house-posts-block .house-details-info .house-details-places img{

			width:30px;

			height:18px;

			}

		.house-posts-block .house-details-price .price-highlight{

			color:#00AF32;

			}

		.house-posts-block .house-detils-map img{

			width:60px;

			height:50px;

			}

		.house-posts-block .house-wrap{

			margin: 30px 9px 10px 9px;

		

			}
		";

		echo '</style>'; // end SCOPED CSS		

		?>

<?php 

$args = array(

	'post_type' => 'house',

	'meta_key' => 'mini_mapa',

    'tax_query' => array(



        array(

            'taxonomy' => 'localization',

            'field' => 'slug',

            'terms' => array($localization_slug)

        )



    )

);



$query = new WP_Query;

$my_posts = $query->query($args);





?>

<div class="container-fluid">

<div class="location-text"><b class="ms-3"> <?php echo get_field('ilosc_miejsc')?></b></div>

<div class="row">

<?php echo get_field('mini_mapa')?>

	<div class="col">

		<div class="owl-carousel  house-posts-carousel owl-theme">

<?php

foreach( $my_posts as  $my_post ){
	switch_to_blog(1);

	$meta = get_post_meta($my_post->ID);

	restore_current_blog();
print_r($meta['mini_mapa']);
$image = wp_get_attachment_image_src( $meta['mini_mapa'][0]);
?>

	

				<div class="house-wrap item">

				

					<div class="location-single house-single d-flex flex-column-lg ">

						<div class=" house-img" style="background-repeat:no-repeat;background-size:cover;background-position:center;background-image:url('<?php echo get_the_post_thumbnail_url($my_post->ID)?>')">

							<div class="location-hover" >

								<img  src= "<?php echo get_template_directory_uri()?><?php echo __('/assets/img/button-show-yellow.png', 'vc_ase') ?>"  alt="Sprawdź">

							</div>

						</div>

						<div class="house-info px-4">

							<h3><?php echo $my_post->post_title?></h3>

							<div class="house-details d-flex justify-content-between align-items-center">

								<div class="house-details-info">

									<div class="house-details-price my-3">

										<p class="m-0"><b><?php echo __('CENA JUŻ OD', 'vc_ase') ?></b></p>

										<p class="price-highlight"><b><?php echo $meta['cena'][0];?>&nbsp;<?php echo __('za noc', 'vc_ase') ?></b></p>

										

									</div>

									<div class="house-details-places d-flex">

										<img  src="<?php echo get_home_url()?>/wp-content/img/open-person.svg" alt="">

										<p class="ms-1"><span><?php echo __('Miejsc: ', 'vc_ase') ?></span> <?php echo $meta['ilosc_miejsc'][0];?></p>

									</div>

								</div>

								<div class="house-detils-map">

									<img src="<?php echo $image[0];?>" alt="">

								</div>

							</div>

							<hr/>

							<p class=""><?php echo $my_post->post_excerpt ?></p>

							<a href="<?php echo get_post_permalink( $my_post->ID) ?>" class="button-yellow mt-3 w-md-75 w-100 text-center px-1"><?php echo __('Dowiedz się więcej', 'vc_ase') ?></a>

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
            $('.house-posts-carousel').owlCarousel({

        loop: true,

        nav: true,

        margin: 22,

        responsive: {

            0: {

                items: 1

            },

            600: {

                items: 1

            },

            1350: {

                items: 2

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
add_shortcode( 'as_houses_slider', 'vc_ase_as_houses_slider' );
?>

