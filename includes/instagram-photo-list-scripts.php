<?php

// Check if admin
if(is_admin()){
	// Add Scripts
	function ipl_add_admin_scripts(){
		wp_register_script( 'ipl_admin',  plugins_url().'/instagram-photo-list/js/main_admin.js', array('jquery') );

		wp_enqueue_script('ipl_admin');
	}

	add_action('admin_init', 'ipl_add_admin_scripts');
}

// Add scripts
function ipl_add_scripts(){
	wp_enqueue_style('ipl-main-style', plugins_url() . '/instagram-photo-list/css/style.css');
	wp_enqueue_script('ipl-todos-script', plugins_url() . '/instagram-photo-list/js/main.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'ipl_add_scripts');