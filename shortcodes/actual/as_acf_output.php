<?php



function vc_ase_as_acf_output( $atts, $content = '' ) {



	extract(

		shortcode_atts(

			array(

                'title_text'          => '',

                'custom_styles'        => '',

				'block_id'            => apply_filters( 'vc_ase_randomString', 10 ),



			), $atts

		)

	);


	####################  HTML STARTS HERE: ###########################
	ob_start();
    $output = '';
    $output .= '<span class="acf-'.$title_text.'">';
    switch_to_blog( 1 );
    if($title_text=='cena'){
        $value = get_field('cena');
        $output .=$value;
    }
    elseif($title_text=='price_terms_from_date'){
        $value = get_field('price_terms_from_date');
        if(get_locale() ==='pl_PL'){
            $output .= '<span>za noc od</span> '.$value; 
        }
        if(get_locale() ==='en_US'){
            $output .= '<span>per night from</span> '.$value; 
        }
        if(get_locale() ==='ru_RU'){
            $output .= '<span>за ночь от</span> '.$value; 
        }
        if(get_locale() ==='it_IT'){
            $output .= '<span>a notte dal</span> '.$value; 
        }
        if(get_locale() ==='fr_FR'){
            $output .= '<span>prix à partir de</span> '.$value; 
        }
        if(get_locale() ==='de_DE'){
            $output .= '<span>pro Nacht vom</span> '.$value; 
        }
        if(get_locale() ==='cs_CZ'){
            $output .= '<span>za noc od</span> '.$value; 
        }
    }
    elseif($title_text=='price_terms_till_date'){
        $value = get_field('price_terms_till_date');
        if(get_locale() ==='pl_PL'){
                    $output .= ' <span>do</span> '.$value; 
                }
                if(get_locale() ==='en_US'){
                    $output .= ' <span>till</span> '.$value; 
                }
                if(get_locale() ==='ru_RU'){
                    $output .= ' <span>до</span> '.$value; 
                }
                if(get_locale() ==='it_IT'){
                    $output .= ' <span>al</span> '.$value; 
                }
                if(get_locale() ==='fr_FR'){
                    $output .= ' <span>au</span> '.$value; 
                }
                if(get_locale() ==='de_DE'){
                    $output .= ' <span>bis</span> '.$value; 
                }
                if(get_locale() ==='cs_CZ'){
                    $output .= ' <span>do</span> '.$value; 
                }  
    }
    else{
        $output .= $update_value;
    }
    $output .= '</span>';
    restore_current_blog();
	?>
	<?php
	####################  HTML ENDS HERE: ###########################
	?>
	<?php

	####################  HTML OUTPUT ENDS HERE: ###########################
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output ;
}



add_shortcode( 'as_acf_output', 'vc_ase_as_acf_output' );

?>

