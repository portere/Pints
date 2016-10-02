<?php
/**
 * Adds custom CSS to the wp_head() hook.
 *
 *
 * @package WordPress
 */


if ( !function_exists( 'bspwp_custom_css' ) ) {
	
	add_action('wp_head', 'bswp_custom_css');
	function bswp_custom_css() {
			
			$custom_css ='';

			/**custom css field**/
			if(bswp_option('custom_css_box')) {
				$custom_css .= bswp_option('custom_css_box');
			}	

			if(bswp_option('h_bg', false, 'url') !== '' ) {
				$h_image = bswp_option("h_bg", false, "url");
				$custom_css .= '#h { background: url("'.$h_image.'") no-repeat center top; }';
			}

			if(bswp_option('sep_bg', false, 'url') !== '' ) {
				$sep_image = bswp_option("sep_bg", false, "url");
				$custom_css .= '#sep { background: url("'.$sep_image.'") no-repeat center top; }';
			}	
			
			//trim white space for faster page loading
			$custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
		
			//echo css
			$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
			
			if(!empty($custom_css)) {
				echo $css_output;
			}
	}
	
}