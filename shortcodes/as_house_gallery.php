<?php
function vc_ase_as_house_gallery_func( $atts, $content = null ) {

	extract(
		shortcode_atts(
			array(
			
				'images'              => '',
				'titles'              => '',
				
				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts
		)
	);

	####################  HTML STARTS HERE: #########################

	ob_start();
	echo $css_classes ? '<div class="' . esc_attr( $css_classes ) . '">' : null;

	echo '<div id="image-slides-' . esc_attr( $block_id ) . '" class="vc-ase-element image-slides-block w-100 h-100">';

	do_action( 'vc_ase_block_heading', $title, $subtitle, $title_style, $sub_position, $title_custom_css, $subtitle_custom_css, $title_color, $subtitle_color, $title_size, $heading_css );
    wp_enqueue_script( 'lightbox2' );
	wp_enqueue_style( 'lightbox2' );
    
    ?>

	<?php
	  global $post;
      $cacheDir = ABSPATH.'wp-content/cache_custom/';
      $cacheFile = "$cacheDir/domek_galeria_{$post->post_name}.json";
	
       if((get_current_blog_id()==1 && $post->post_type=='house')){
            $img_links=[];
            $img_arr= explode( ',', $images );

            foreach (  $img_arr as $image ) {
                $item=wp_get_attachment_image_src( $image , 'full', false );
                array_push($img_links, $item[0] );
            }
            //update_site_meta( 1 ,'house_gallery', $img_links );
           file_put_contents($cacheFile, json_encode($img_links));
       }

    //$img_arr = array_reverse(json_decode(file_get_contents($cacheFile), true));


//echo(is_site_meta_supported());
	$content  = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
	$desc_arr = preg_split( "/\r\n|\n|\r/", $content );
    
	?>
    <style>
    .image-slides a[role="button"] img:last-child {
   pointer-events:none;
}

    </style>
<div class="image-slides <?php echo ( ( count( $img_arr ) > 1 ) ? '' : '' ) ?>">

	<?php
	$i      = 0;
    $img_url_0 =  $img_arr[ 0 ];
	$output = '';
	add_action( 'save_post_house', 'house_page_updated' );

    $output.= '<a class="button-yellow house-gallery-btn " style=" position: absolute; bottom: 80px; right: 40%;" href="' . esc_url( $img_url_0 ) . '" data-lightbox="models">'. __('Galeria', 'vc_ase'). '</a>';
    
    foreach (  $images as  $k => $link ) {

      

		// clean up description from paragraphs
		$paragraphs  = array( '<p>', '</p>' );
		$description = str_replace( $paragraphs, '', $description );

		$output .= '<div class="single-image">';
        
		if ( $link && $k >= 1 ) {

			$output .= '<div class="anim-wrap ' . esc_attr( $e_anim ) . '" data-i="' . esc_attr( $i ) . '"><div class="item-img">';

			$output .= '<div class="back">';

				$output .= '<div class="item-overlay"></div>';

				$output .= '<div class="table"><div class="tablerow"><div class="tablecell">';

				$output .= '</div></div></div>'; // table divs

			$output .= '</div>'; // .back

			$output .= '<div class="image"><div class="image-container">';

				$attr = array(
					'class' => 'd-none',
					'title' => $title ? esc_attr( $title ) : '',
					'alt'   => $title ? esc_attr( $title ) : '',
				);
                if($i==0){
                    $attr = array(
                        'class' => 'd-block',
                        'title' => $title ? esc_attr( $title ) : '',
                        'alt'   => $title ? esc_attr( $title ) : '',
                    ); 
                }
                else{
                    $attr = array(
                        'class' => 'd-none position-absolute',
                        'title' => $title ? esc_attr( $title ) : '',
                        'alt'   => $title ? esc_attr( $title ) : '',
                    );
                }
             
                $link_start = '<a class="disabled" role="button" aria-disabled="true" href="' . esc_url( $link ) . '" data-lightbox="models">
                <img class="house-image-item" src="' . esc_url( $link ) . '"/>';
                $link_end = '</a>';
           
				$output .= $link_start;
                $output .= $link_end;

			$output .= '</div></div>'; // .image-container .image

			$output .= '</div></div>'; // .it.anim-wrap
		}

		$output .= '</div>'; // .single-slide
		$i++;
	}



	echo wp_kses_post( $output );
	?>

</div>
<script>

    

// (function( $ ){
// 	$.fn.anim_waypoints_img_tests = function(blockId, enter_anim) {
		
// 		var thisBlock = $('#image-slides-'+ blockId );
// 		if ( !window.vcase_isMobile && !window.isIE9 ) {
// 			var item		= thisBlock.find('.single-slide'),
// 				anim_wrap	= item.find(".anim-wrap");
			
// 			anim_wrap.waypoint(
// 				function(direction) {
// 					var item_ = $(this);
// 					if( direction === "up" ) {	
// 						item_.removeClass('animated '+ enter_anim).addClass('to-anim');
// 					}else if( direction === "down" ) {
// 						var i =  $(this).attr('data-i');
// 						setTimeout(function(){
// 						   item_.addClass('animated '+ enter_anim).removeClass('to-anim');
// 						}, 50 * i);
// 					}
// 				}
				
// 			,{ offset: "98%" });
// 		}else{
// 			anim_wrap.each( function() {
// 				$(this).removeClass('to-anim');
// 			});
// 		}
		
// 	}
// })( jQuery );


</script>

	<?php

	echo '</div>'; // #testimonial-slides

	echo $css_classes ? '</div>' : null;

	$output_string = ob_get_contents();

	ob_end_clean();

	return $output_string;
	####################  HTML ENDS HERE: ###########################

}

add_shortcode( 'as_house_gallery', 'vc_ase_as_house_gallery_func' );
?>
