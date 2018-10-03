<?php
/*
Plugin Name: My widget
Plugin URI: https:/programmermax.com
Description: pending
Version: 0.1.0
Author: Max
Author URI: http://progremmermax.com
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
	exit;
}
// Load scripts
require_once(plugin_dir_path(__FILE__).'/inc/mywidget-scripts.php');

// Load class
require_once(plugin_dir_path(__FILE__).'/inc/mywidget-class.php');

// Register widget
function register_mywidget(){
	register_widget('My_Widget');
}

// Hook in function
add_action('widgets_init', 'register_mywidget');