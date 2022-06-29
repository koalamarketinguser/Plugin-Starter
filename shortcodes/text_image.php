<?php

function vc_ase_as_text_image( $atts, $content = '' ) {

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
    'orderby' => array( 'name' => 'ASC' ),
    
);
$query = new WP_Query;
$my_posts = $query->query($args);


foreach( $my_posts as $key => $my_post ){
    $url_link_btn = '<a href="'. get_permalink($my_post->ID).'"  class="button-yellow">'. __( 'Dowiedz się więcej', 'vc_ase' )."</a>";

 if(($key +1) % 2 == 0){
	echo '<div class="row padding-y custom-row">
    <div class="col-12 px-0 px-md-3">
        <div class="preview-single">
            <div class="preview-info">
                <h2>'.$my_post->post_title.'</h2>
                <p>'.$my_post->post_excerpt.'</p>
            '.$url_link_btn.'
            </div>
            <div class="preview-bg-right">
                <img src="'.get_the_post_thumbnail_url($my_post->ID).'" alt="Klenovica, Kvarner, Chorwacja">
            </div>
        </div>
    </div>
</div>';

}
if(($key +1) % 2 != 0){
    $x =(($key +1) % 2 != 0);
	echo ' <div class="row padding-y custom-row ">
    <div class="col-12 px-0 px-md-3">
        <div class="preview-single custom-single">
        <div class="preview-bg-left">
                <img src="'.get_the_post_thumbnail_url($my_post->ID).'" alt="Klenovica, Kvarner, Chorwacja">
            </div>
            <div class="preview-info ms-auto">
           
                <h2>'.$my_post->post_title.'</h2>
                <p>'.$my_post->post_excerpt.'</p>
                '.$url_link_btn.'
              
            </div>
            
        </div>
    </div>
</div>';
}

$count ++;

}

		?>
		
	</div>
	
	
	
	

		
	<?php
	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();

	ob_end_clean();

	return $output_string;

}

add_shortcode( 'as_text_image', 'vc_ase_as_text_image' );
?>
