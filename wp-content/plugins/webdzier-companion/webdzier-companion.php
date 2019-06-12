<?php
/*
Plugin Name: Webdzier Companion
Description: Enhances webdzier themes with additional functionality.
Version: 1.0.8
Author: webdzier
Author URI: https://webdzier.com
Text Domain: webdzier-companion
*/

define( 'webdzierc_plugin_url', plugin_dir_url( __FILE__ ) );
define( 'webdzierc_plugin_dir', plugin_dir_path( __FILE__ ) );

if( !function_exists('webdzierc_init') ){
	function webdzierc_init(){
		$current_theme_data = wp_get_theme(); // getting current theme data
		$current_theme = $current_theme_data->name;
		$current_theme = strtolower( $current_theme );
		$current_theme = str_replace( ' ','-', $current_theme );
		
		if(file_exists( webdzierc_plugin_dir . "include/$current_theme/init.php")){
			require("include/$current_theme/init.php");
		}		
		if($current_theme=='construct-line'){
			require("include/business-idea/init.php");
		}
	}
}
add_action( 'init', 'webdzierc_init' );