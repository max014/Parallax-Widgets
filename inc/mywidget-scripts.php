<?php
// Add scripts
function mw_add_scripts(){
	// Add main CSS
	wp_enqueue_style('mw-main-style', plugins_url().'/mywidget/css/style.css');
	// Add main js
	wp_enqueue_script('parallax', plugins_url().'/mywidget/js/parallax.js');
}
function admin_scripts(){
	// Add admin js
	wp_enqueue_script('mw-main-script', plugins_url().'/mywidget/js/admin.js');
}

add_action('wp_enqueue_scripts', mw_add_scripts());
add_action('admin_enqueue_scripts', mw_add_scripts());