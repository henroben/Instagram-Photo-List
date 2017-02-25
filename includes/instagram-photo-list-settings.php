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
	// Init Global Options
	global $ipl_options;

	$redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	?>
	<div class="wrap">
		<h2>Instagram Photo List Settings</h2>
		<p>Settings for the IPL Plugin</p>
		<form method="post" action="options.php">
			<?php settings_fields('ipl_settings_group'); ?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="ipl_settings[redirect_url]">
								<?php _e('Redirect URL', 'ipl-domain'); ?>
							</label>
						</th>
						<td>
							<input name="ipl_settings[redirect_url]"
							       id="ipl_settings[redirect_url]"
							       type="text"
							       value="<?php echo $redirect_url; ?>"
							       class="widefat"
							       disabled
							>
							<p class="description" id="ipl_settings[redirect_url]">
								<?php _e('Add this URL into your Instagram client redirect url field', 'ipl-domain'); ?>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="ipl_settings[client_id]">
								<?php _e('Client ID', 'ipl-domain'); ?>
							</label>
						</th>
						<td>
							<input name="ipl_settings[client_id]"
							       id="ipl_settings[client_id]"
							       type="text"
							       value="<?php echo $ipl_options['client_id']; ?>"
							       class="widefat"
							>
							<p class="description" id="ipl_settings[client_id]">
								<?php _e('Get the client ID from your Instagram App and add it here', 'ipl-domain'); ?>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="authenticate">
								<?php _e('Authenticate', 'ipl-domain'); ?>
							</label>
						</th>
						<td>
							<a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo $ipl_options['client_id']; ?>&redirect_uri=<?php echo $redirect_url; ?>&response_type=token&scope=public_content" class="button">Authenticate</a>
							<p class="description" id="authenticate">
								<?php _e('IMPORTANT: Click this AFTER you have added the redirect url and the client id', 'ipl-domain'); ?>
							</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="ipl_settings[access_token]">
								<?php _e('Access Token', 'ipl-domain'); ?>
							</label>
						</th>
						<td>
							<input name="ipl_settings[access_token]"
							       id="ipl_settings[access_token]"
							       type="text"
							       value="<?php echo $ipl_options['access_token']; ?>"
							       class="widefat"
							>
							<p class="description" id="ipl_settings[access_token]">
								<?php _e('Get this from the URL after Authentication', 'ipl-domain'); ?>
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button" value="<?php _e('Save Changes', 'ipl-domain'); ?>">
			</p>
		</form>
	</div>
	<?php
}

add_action('admin_menu', 'ipl_options_menu_link');

// Register Settings
function ipl_register_settings() {
	register_setting('ipl_settings_group', 'ipl_settings');
}

add_action('admin_init', 'ipl_register_settings');