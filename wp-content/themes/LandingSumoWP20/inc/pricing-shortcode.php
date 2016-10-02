<?php
// init process for registering our button
 add_action('init', 'bswp_shortcode_button_init');
 function bswp_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "bswp_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'bswp_add_tinymce_button');
}


//This callback registers our plug-in
function bswp_register_tinymce_plugin($plugin_array) {
    $plugin_array['bswp_button'] = get_template_directory_uri().'/js/pricing-shortcode.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function bswp_add_tinymce_button($buttons) {
            //Add the button ID to the $button array
    $buttons[] = "bswp_button";
    return $buttons;
}


/*
 * Pricing Table
 * @since v1.0
 *
 */

/*main*/
if( !function_exists('sumo_pricing_table_shortcode') ) {
  function sumo_pricing_table_shortcode( $atts, $content = null  ) {
    return '<div class="sumo-pricing-table"><div class="row">' . do_shortcode($content) . '</div></div><div class="sumo-clear-floats"></div>';
  }
  add_shortcode( 'sumo_pricing_table', 'sumo_pricing_table_shortcode' );
}

/*section*/
if( !function_exists('sumo_pricing_shortcode') ) {
  function sumo_pricing_shortcode( $atts, $content = null  ) {
    
    extract( shortcode_atts( array(
      'size' => '4',
      'position' => '',
      'featured' => 'no',
      'plan' => 'Basic',
      'cur' => '$',
      'cost' => '20',
      'per' => 'month',
      'button_url' => 'http://#.com',
      'button_text' => 'Purchase',
      'button_target' => 'self',
      'button_rel' => 'nofollow'
      ), $atts ) );
    
    //start content  
    $pricing_content ='';
    $pricing_content .= '<div class="col-md-'. $size .'">';
    $pricing_content .= '<div class="price-table">';
    $pricing_content .= '<div class="p-head">';
    $pricing_content .=  $plan;
    $pricing_content .= '</div>';
    $pricing_content .= '<div class="p-body">';
    $pricing_content .= $content;
    $pricing_content .= '<div class="price"><span class="sub">'. $cur .'</span><span class="detail">'. $cost .'</span><span class="sub">'. $per .'</span></div>';
    if( $button_text ) {
      $pricing_content .= '<div class="sumo-pricing-button"><a href="'. $button_url .'" class="btn btn-conf-2 btn-green" target="_'. $button_target .'" rel="'. $button_rel .'">'. $button_text .'</a></div>';
    }
    $pricing_content .= '</div>';
    $pricing_content .= '</div>'; 
    $pricing_content .= '</div>'; 
    return $pricing_content;
  }
  
  add_shortcode( 'sumo_pricing', 'sumo_pricing_shortcode' );
}