<?php

// Add scripts
function ipl_add_scripts(){
	wp_enqueue_style('ipl-main-style', plugins_url() . '/instagram-photo-list/css/style.css');
	wp_enqueue_script('ipl-todos-script', plugins_url() . '/instagram-photo-list/js/main.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'ipl_add_scripts');