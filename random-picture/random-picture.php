<?php
/*
Plugin Name: Random Picture
Description: Zufallsbild als Widget wobei die Bilder in der Photo Gallerie von WebDorado sein müssen.
Author: Kevin Landolt
Version: 1.0

*/
setlocale(LC_ALL,'de_DE.UTF-8');
define( 'RP_PLUGIN_FILE', __FILE__ );
 
register_activation_hook( RP_PLUGIN_FILE, 'rp_activation' );
 
function rp_activation(){
	//Check Photo-Gallery Plugin exist
	if ( !is_plugin_active( 'photo-gallery/photo-gallery.php' ) ) {
		
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( __( 'Please install and activate Photo-Gallery Plugin', 'Random-Picture' ), 'Plugin dependency check', array( 'back_link' => true ) );

} 
	
}


require_once('widget/widget.php');
?>