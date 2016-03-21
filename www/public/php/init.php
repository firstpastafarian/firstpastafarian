<?php

// Basic site settings
$_SITE['captcha'] = TRUE;
$_SITE['Private'] = TRUE;
$_SITE['Debug'] = TRUE; // Leaks server setup details during password hashing, disables captchas, session timeouts, and invitation codes, and disables PHP error reporting
if( !$_SITE['Debug'] ) {
	error_reporting( 0 );
	@ini_set( 'display_errors', 0 );
}

session_start();

?>