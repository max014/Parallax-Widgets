<?php
/*
Plugin Name: My Custom Widgets
Description: A couple of widgets I made
Version: 0.1.0
Author: Max
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
	exit;
}
// Load scripts
require_once(plugin_dir_path(__FILE__).'/inc/mywidget-scripts.php');

// Load class
require_once(plugin_dir_path(__FILE__).'/inc/MaxParallax.php');
require_once(plugin_dir_path(__FILE__).'/inc/MaxFloatingDiv.php');

// Register widget
function register_mywidget(){
	register_widget('MaxParallax');
	register_widget('MaxFloatingDiv');
}

// Hook in function
add_action('widgets_init', 'register_mywidget');