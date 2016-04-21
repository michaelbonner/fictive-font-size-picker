<?php
function fictive_font_size_picker(){
	$html = '<div id="font-size-picker">';
		$html .= '<a href="#" data-size="font-large" class="font-large">A</a>';
		$html .= '<a href="#" data-size="font-regular" class="font-regular">A</a>';
		$html .= '<a href="#" data-size="font-small" class="font-small">A</a>';
	$html .= '</div>';
	return $html;
}
add_shortcode( 'font_size_picker', 'fictive_font_size_picker' );
