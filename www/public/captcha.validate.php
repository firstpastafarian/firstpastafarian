<?php

// Validate form submission data, if any
if( !empty( $_REQUEST['captcha'] ) ) {
	if( $_REQUEST['captcha'] == $_SESSION['captcha'] ) {
		$_SESSION['expire'] = ( empty( $_SESSION['expire'] ) ? strtotime( '+1 hour' ) : $_SESSION['expire'] );

		header('Location: /');
	} else {
		alert( 'wrong captcha entered' );
	}
} else {
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		//alert( 'enter the captcha above' );
	}
}

?>