<?php
function vc_ase_as_house_gallery_short( $atts, $content = null ) {

	extract(
		shortcode_atts(
			array(
			
				'images'              => '',	
				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts
		)
	);

	####################  HTML STARTS HERE: #########################

	ob_start();
	echo '<div id="image-slides-' . esc_attr( $block_id ) . '" class="vc-ase-element home-short-gallery w-100 h-100">';  
    ?>

	<?php
	   global $post;
	   $cacheDir = ABSPATH.'wp-content/cache_custom/';
	   $cacheFile = "$cacheDir domek_short_galeria_{$post->post_name}.json";
       if((get_current_blog_id()==1 && $post->post_type=='house')){
        $img_links=[];
        $img_arr= explode( ',', $images );
     
        foreach (  $img_arr as $image ) {
            $item=wp_get_attachment_image_src( $image , 'full', false );

            array_push($img_links,   $item[0] );
            
        } 
		file_put_contents($cacheFile, json_encode($img_links));
    }
	$img_arr = array_reverse(json_decode(file_get_contents($cacheFile), true));
	?>
<div class="image-slides<?php echo ( ( count( $img_arr ) > 1 ) ? 'image' : 'images' ) ?>">

	<?php
	$i      = 0;
	$output = '';
   
	$output .= '<div class="container">';
	$output .= '<div class="row">';
    foreach ( $img_arr as $key => $link ) {

		if($key == 2 || $key == 3 ){
			$output .= '<div class="col-md-6 mb-0 px-1">';

                $img_output = '<img src="' . esc_url( $link ) . '"/>';
           
				$output .=  $img_output;

			$output .= '</div>';

		}
		else{
			$output .= '<div class="col-md-6 mb-2 px-1">';

			$img_output = '<img src="' . esc_url( $link ) . '"/>';
	   
			$output .=  $img_output;

			$output .= '</div>';

		}
		

	
		$i++;
	}
	$output .= '</div>'; 
	$output .= '</div>'; 
	echo wp_kses_post( $output );
	?>

</div>
<style>
.home-short-gallery img{
height:232px;
width: 100%;
object-fit: cover;
}

</style>
	<?php

	echo '</div>'; // #testimonial-slides

	echo $css_classes ? '</div>' : null;

	$output_string = ob_get_contents();

	ob_end_clean();

	return $output_string;
	####################  HTML ENDS HERE: ###########################

}

add_shortcode( 'as_house_gallery_short', 'vc_ase_as_house_gallery_short' );
?>
