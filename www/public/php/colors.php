<?php
/*
	php/colors
	basic color palette
*/

// Color schemes in triple-nested array
// Label color at top and include at least 5 colors in ascending brightness
$colors = array(
	// Blue #0A5FA0
	array(
		array(0,27,48),
		array(43,64,80),
		array(37,125,200), #257DC8
		array(136,203,255),
		array(231,245,255),
	),
	// Purple #510EA9
	array(
		array(22,0,51),
		array(62,46,84),
		array(128,65,214),
		array(188,138,255),
		array(242,232,255),
	),
	// Magenta #A200A2
	array(
		array(49,0,49),
		array(81,40,81),
		array(162,0,162),
		array(255,128,255),
		array(255,230,255),
	),
	// Hot Red #DF0043
	array(
		array(67,0,20),
		array(112,56,73),
		array(223,0,68),
		array(255,128,166),
		array(255,230,237),
	),
	// Burnt Orange #F94300
	#array(
	#	array(75,20,0),
	#	array(125,79,62),
	#	array(249,6,0),
	#	array(255,162,128),
	#	array(255,236,230),
	#),
	// Green #A1C800
	array(
		array(59,72,0),
		array(109,120,60),
		array(161,200,0), #A1C800
		array(232,255,128),
		array(250,255,230),
	),
	// Green-Blue #00AB62
	array(
		array(0,51,29),
		array(43,86,67),
		array(0,171,98),
		array(128,255,200),
		array(230,255,244),
	),
	// Blue-Green #009595
	array(
		array(0,45,45),
		array(37,75,75),
		array(0,149,149),
		array(128,255,255),
		array(230,255,255),
	)
);

if( session_id() != '' || isset($_SESSION) ) { // make sure that the session has started... unnecessary?
	$_SESSION['colors'] = $colors;

	// uncomment to disable background color randomization
	//if( !isset( $_SESSION['color'] ) ) {
		$_SESSION['color'] = $_SESSION['colors'][mt_rand(0,sizeof($_SESSION['colors'])-1)];
		$_SESSION['colorhex'] = array(
			hex( $_SESSION['color'][0] ),
			hex( $_SESSION['color'][1] ),
			hex( $_SESSION['color'][2] ),
			hex( $_SESSION['color'][3] ),
			hex( $_SESSION['color'][4] )
		);
	//}
}

// -----START HELPER FUNCTIONS-----

/**
 * Convert an RGB array to HEX
 *
 * @param array $_SESSION['color'][0,1,2]
 * @return string
 */
function hex( $rgb = array( ) ) {
    return sprintf('%02X%02X%02X', $rgb[0], $rgb[1], $rgb[2]);
}

// -----END HELPER FUNCTIONS-----

?>