<html>

	<head>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/event.css">
	</head>

	<body>
	</body>

</html>

<?php

if (!isset($_REQUEST['id'])) {
	echo 'event id not set!';
} else {
	$event = query_event($_REQUEST['id']);
	print_r($event);
}

/* draws a calendar */

function query_event($eventid){
	// Connecting, selecting database
	$link = mysql_connect('localhost', 'root', '')
		or die('Could not connect: ' . mysql_error());
	//echo 'Connected successfully';
	mysql_select_db('firstpastafarian') or die('Could not select database');

	// Performing SQL query
	$query = 'SELECT * FROM events WHERE id='.$eventid;
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	$event = mysql_fetch_assoc($result);

	// Free resultset
	mysql_free_result($result);

	// Closing connection
	mysql_close($link);

	return $event;
}

?>