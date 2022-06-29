<?php

function vc_ase_as_banner_func( $atts, $content = '' ) {

	extract(
		shortcode_atts(
			array(

				'house_single_image'                 => '',
				'css_classes'         => '',
				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),

			), $atts
		)
	);

	$button     = vc_build_link( $link_button );
	$but_url    = $button['url'];
	$but_title  = $button['title'];
	$but_target = $button['target'];

	$vc_css_class = vc_shortcode_custom_css_class( $css, ' ' );

	$text = wpb_js_remove_wpautop( $content, true );

	####################  HTML STARTS HERE: ###########################
	ob_start();
	echo $css_classes ? '<div class="' . esc_attr( $css_classes ) . '">' : null;

    wp_enqueue_script( 'lightbox2' );
	wp_enqueue_style( 'lightbox2' );
	?>

	<style>
.banner-block.content-wrapper.custom-banner .gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}
.banner-block.content-wrapper.custom-banner .img-box img {
  width: 98.5%;
  height: 100%;
  object-fit: contain;
  cursor: pointer;
  margin-top:35px;
}
.banner-block.content-wrapper.custom-banner .modal {
  background-color: rgba(20, 45, 115, 0.384);
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease-in-out;
  display:block!important;
  z-index: 9999999999;
}
body{
    overflow-x:none!important;
}
.banner-block.content-wrapper.custom-banner .full-img {
  position: absolute;
  height: 85%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(.8);
  transition: all 0.3s ease-in-out;
  
}
/* Dynamic Classes */
.banner-block.content-wrapper.custom-banner .full-img.open {
  transform: translate(-50%, -50%) scale(1);
}

.banner-block.content-wrapper.custom-banner .modal.open {
  opacity: 1;
  pointer-events: all;
 overflow:hidden;
}
.banner-block.content-wrapper.custom-banner .modal img{
  transform: translate(-50%, -50%) scale(45.8)!important;
}

    </style>
<?php  
 global $post;
      $cacheDir = ABSPATH.'wp-content/cache_custom/';
      $cacheFile = "$cacheDir/pojedynczy_obrazek_{$post->post_name}.json";
	
       if((get_current_blog_id()==1 && $post->post_type=='house')){
        $img_links=[];
        $img_link_md=wp_get_attachment_image_src( $house_single_image, 'medium', false );
        $img_link_full=wp_get_attachment_image_src( $house_single_image, 'full', false );
        array_push($img_links,   $img_link_md );
        array_push($img_links,  $img_link_full );
      
        file_put_contents($cacheFile, json_encode($img_links));
       }

    $img_link_ref = array_reverse(json_decode(file_get_contents($cacheFile)), true); 
?>
	
	<div id="banner-block-<?php echo esc_attr( $block_id ); ?>" class="vc-ase-element banner-block content-wrapper custom-banner <?php echo ( $enter_anim != 'none' ) ? ' to-anim' : ''; ?><?php echo $disable_invert ? ' disable-invert' : null; ?>  table">			
    <!-- <div class="gallery">
      <div class="img-box">
          <a>
          <img src=""/>
          </a>
    
      </div>

    </div> -->
    <a class="disabled" role="button" aria-disabled="true" href="<?php  echo $img_link_ref[0][0]?>" data-lightbox="model-single">
                <img class="house-image-item w-100" src="<?php  echo $img_link_ref[0][0]?>"/>
               </a>
    <!-- <div class="modal">
      <img src="<?php  echo $img_link_ref[0][0]?>" alt="" class="full-img" />
    </div> -->


</div>
<script>
const fullImg = document.querySelector(".full-img");
const smallImg = document.querySelector(".gallery a");
const modal = document.querySelector(".modal");

console.log(smallImg);

smallImg.addEventListener("click", function () {
    modal.classList.add("open");
    fullImg.classList.add("open");
  });


modal.addEventListener("click", function (e) {
  if (e.target.classList.contains("modal")) {
    modal.classList.remove("open");
    fullImg.classList.remove("open");
  }
});


</script>	
	<?php
	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();

	ob_end_clean();

	return $output_string;

}

add_shortcode( 'as_banner', 'vc_ase_as_banner_func' );
?>
