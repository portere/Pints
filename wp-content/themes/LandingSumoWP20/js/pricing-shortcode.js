jQuery(document).ready(function($) {
	//Add button to post editor
    tinymce.create('tinymce.plugins.bswp_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('bswp_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[sumo_pricing]'+selected+'[/sumo_pricing]';
                    }else{
                        content =  '[sumo_pricing_table]<br />[sumo_pricing  size="4" plan="Basic" cur="$" cost="9.99" per="per month" button_url="#" button_text="Sign Up"  button_target="self" button_rel="nofollow"]<br /><ul class="features"><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/sumo_pricing]<br />[sumo_pricing featured="yes" size="4" plan="Best" cur="$" cost="19.99" per="per month" button_url="#" button_text="Sign Up" button_target="self" button_rel="nofollow"]<br /><ul class="features"><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/sumo_pricing]<br />[sumo_pricing  size="4" plan="Great" cur="$" cost="29.99" per="per month" button_url="#" button_text="Sign Up" button_target="self" button_rel="nofollow"]<br /><ul class="features"><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/sumo_pricing]<br />[/sumo_pricing_table]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('bswp_button', {title : 'Pricing Tables', cmd : 'bswp_insert_shortcode', image: url + '/images/pricing-shortcode.png' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('bswp_button', tinymce.plugins.bswp_plugin);
});