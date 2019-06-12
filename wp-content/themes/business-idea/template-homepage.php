<?php 
/**
 * Template Name: Front Page
 *
 *
 */

if ( is_page_template() ) {
	
	get_header();

		if( function_exists('webdzierc_init') ){
			$data = array('service','about','shop','team','testimonial','contact','gallery','blog','social');
		}else{
			$data = array('service','about','shop','contact','gallery','blog','social');
		}
		
		if($data){
			foreach($data as $key=>$value){
				if($value=='team'){
					do_action( 'business_idea_sections', false );
				}else{
					business_idea_load_section( $value );
				}				
			}
		}
		
	get_footer();
	
} else {
	include( get_page_template() );
}

?>