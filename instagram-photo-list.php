<?php
/**
 * Plugin Name: Instagram Photo List
 * Description: Display latest Instagram photos in widget
 * Version: 1.0
 * Author: Benjamin Mercer
 *
 **/

// Exit if Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Global Options variable
$ipl_options = get_option('ipl_settings');

// Include Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/instagram-photo-list-scripts.php');

// Include Shortcodes
require_once(plugin_dir_path(__FILE__) . '/includes/instagram-photo-list-shortcodes.php');

// Check if admin and load admin scripts
if(is_admin()) {
	// load settings page
	require_once(plugin_dir_path(__FILE__) . '/includes/instagram-photo-list-settings.php');
};