<?php

// Create Options Menu Link
function ipl_options_menu_link() {
	add_options_page(
		'Instagram Photo List Options',
		'Instagram Photo List',
		'manage_options',
		'ipl-options',
		'ipl_options_content'
	);
}

// Create Content
function ipl_options_content() {
	?>
	Test
	<?php
}

add_action('admin_menu', 'ipl_options_menu_link');

// Register Settings
function ipl_register_settings() {
	register_setting('ipl_settings_group', 'ipl_settings');
}

add_action('admin_init', 'ipl_register_settings');