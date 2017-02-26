<?php
// List Photos
function ipl_list_photos($atts, $content = null) {
	global $ipl_options;
	$atts = shortcode_atts(
		array(
			'title' =>  'Instagram Photo List',
			'count' =>  20,
		), $atts);

	$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $ipl_options['access_token'] . '&count=' . $atts['count'];
	$options = array('http' => array(
		'user_agent' => $_SERVER['HTTP_USER_AGENT']
	));
	$context = stream_context_create($options);
	$response = file_get_contents($url, false, $context);
	$data = json_decode($response)->data;

	$output = '<div class="ipl-photos">';
	$output .= '<p>' . $ipl_options['page_caption'] . '</p>';

	foreach ($data as $photo) {
		$output .= '<div class="photo-col">';
		if(!empty($ipl_options['linked'])) {
			$output .= '<a href="' . $photo->link . '" target="_blank" title="' . $photo->caption->text . '">';
			$output .= '<img src="' . $photo->images->thumbnail->url . '">';
			$output .= '</a>';
		} else {
			$output .= '<img src="' . $photo->images->thumbnail->url . '">';
		}
		$output .= '</div>';
	}

	$output .= '</div>';

	echo $output;
}

// Add Shortcode
add_shortcode('photos', 'ipl_list_photos');