<?php

// Throw error
function error( $string = NULL, $fatal = 1, $silent = 0, $log = 0 ) {
	if( !isset( $_SESSION['error'] ) )
		$_SESSION['error'] = array();
	
	if( isset( $string ) ) {
		$_SESSION['error'][] = $string;
	} else {
		$_SESSION['error'][] = TRUE;
	}
		
	if( !$silent ) {
		if( isset( $string ) ) {
			alert( 'error: '.$string );
		} else {
			alert( 'an unidentified error has occured.' );
		}
	}
	
	if( $log ) {
		// TODO finish logging
	}
}

// Check if an error has been thrown
function error_thrown() {
	if( isset( $_SESSION['error'] ) ) {
		if( !empty( $_SESSION['error'] ) ) {
			return TRUE;
		}
	}
	
	return FALSE;
}

// Force-clear all errors (and alerts)
function errors_clear() {
	if( isset( $_SESSION['error'] ) )
		unset( $_SESSION['error'] );
	
	alerts_clear();
}

// Log an alert (message to user)
function alert( $string = NULL, $log = 0 ) {
	if( !$string || empty( $string ) ) {
		return NULL;
	}
	
	if( !isset( $_SESSION['alert'] ) ) {
		$_SESSION['alert'] = array();
	}

	$_SESSION['alert'][] = $string;
	
	if( $log ) {
	
	}
}

function alert_exists() {
	if( isset( $_SESSION['alert'] ) ) {
		if( !empty( $_SESSION['alert'] ) ) {
			return TRUE;
		}
	}
	
	global $_SITE;
	if( isset( $_SITE['alert'] ) ) {
		if( !empty( $_SITE['alert'] ) ) {
			return TRUE;
		}
	}
	
	return FALSE;
}

function alerts_collate( $destructive = 1 ) {
	if( !alert_exists() ) {
		return NULL;
	}
	
	$results = array();
	
	if( isset( $_SESSION['alert'] ) ) {
		if( !empty( $_SESSION['alert'] ) ) {
			$results = array_merge( $results, $_SESSION['alert'] );
		}
	}
	
	if( $destructive ) {
		alerts_clear();
		errors_clear();
	}
	
	return array_unique( $results );
}

function alert_get( $index = 0 ) {
	if( !alert_exists() ) {
		return NULL;
	}
	
	$results = alerts_collate( 0 );
	
	return $results[$index];
}

function alerts_clear() {
	if( isset( $_SESSION['alert'] ) )
		unset( $_SESSION['alert'] );
}

// Base-62 / Base-10 conversion functions for order idents etc.
function toBase( $num, $b = 62 ) {
  $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $r = $num  % $b ;
  $res = $base[$r];
  $q = floor( $num/$b );
  while( $q ) {
    $r = $q % $b;
    $q =floor( $q/$b );
    $res = $base[$r].$res;
  }
  return $res;
}

function to10( $num, $b = 62 ) {
  $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $limit = strlen( $num );
  $res=strpos( $base, $num[0] );
  for( $i = 1; $i < $limit; $i++ ) {
    $res = $b * $res + strpos( $base, $num[$i] );
  }
  return $res;
}

// Sanitize request variables
// Used on: login, register, post
function sanitize_request( $var ) {
	$val = $_REQUEST[$var];
	if( get_magic_quotes_gpc( ) )
		$val = stripslashes( $val );
	$val = htmlspecialchars( $val, ENT_QUOTES );
	# @todo FIXME: use HTML Purifier library to santitize this input
	return $val;
}

function sanitize( $val ) {
	if( get_magic_quotes_gpc( ) )
		$val = stripslashes( $val );
	$val = htmlspecialchars( $val, ENT_QUOTES );
	return $val;
}

?>