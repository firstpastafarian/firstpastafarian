<?php

/**
 * Convert an RGB array to HEX
 *
 * @param array $_SESSION['color'][0,1,2]
 * @return string
 */
function hex( $rgb = array( ) ) {
    return sprintf('%02X%02X%02X', $rgb[0], $rgb[1], $rgb[2]);
}

?>