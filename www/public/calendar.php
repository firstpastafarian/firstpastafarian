<?php

/*
require_once __DIR__ . '/fb.php';

$request = $fb->get(
  'GET',
  '/firstpastafarian/events'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
*/

if(isset($_REQUEST['month'])){
	$month = $_REQUEST['month'];
} else {
	$month = date('m');
}

$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F');

if(isset($_REQUEST['year'])){
	$year = $_REQUEST['year'];
} else {
	$year = date('Y');
}

/* draws a calendar */
function draw_calendar($month,$year){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('SUN','MON','TUE','WED','THU','FRI','SAT');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;

	$events = query_events($month,$year);
	//print_r($events);
	$dates = array();
	foreach ($events as $key => $event) {
		$dates[$event['date']] = array();
		$dates[$event['date']][] = $event;
	}

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	$days_in_last_month = date('t',mktime(0,0,0,$month-1,1,$year));
	for($x = 0; $x < $running_day; $x++){
		$calendar.= '<td class="calendar-day-np"><div class="day-number">'.($days_in_last_month-($running_day-$x-1)).'</div></td>';
		$days_in_this_week++;
	}

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++){
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			if(array_key_exists($year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-'.$list_day, $dates)) {
				foreach ($dates[$year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-'.$list_day] as $event) {
					$calendar.= '<p><a href="/event.php?id='.$event['id'].'">' . $event['title'] . '</a></p>';
				}
			} else {
				$calendar.= str_repeat('<p> </p>',2);
			}

		$calendar.= '</td>';
		if($running_day == 6){
			$calendar.= '</tr>';
			if(($day_counter+1) < $days_in_month){
				$calendar.= '<tr class="calendar-row">';
			}
			$running_day = -1;
			$days_in_this_week = 0;
		}
		$days_in_this_week++; $running_day++; $day_counter++;
	}

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8 && $days_in_this_week > 1){
		for($x = 1; $x <= (8 - $days_in_this_week); $x++){
			$calendar.= '<td class="calendar-day-np"><div class="day-number">'.($x).'</div></td>';
		}
	}

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

function query_events($month,$year){
	// Connecting, selecting database
	$link = mysql_connect('localhost', 'root', '')
		or die('Could not connect: ' . mysql_error());
	//echo 'Connected successfully';
	mysql_select_db('firstpastafarian') or die('Could not select database');

	// Performing SQL query
	$start_date = $year . '-' . $month . '-0';
	$end_date = date("Y-m-t", strtotime($year . '-' . ($month+1) . '-0'));

	$query = 'SELECT * FROM events WHERE date >= "' . $start_date . '" AND date <= "' . $end_date . '"';
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	$events = array();

	while(($row =  mysql_fetch_assoc($result))) {
		$events[] = $row;
	}

	// Free resultset
	mysql_free_result($result);

	// Closing connection
	mysql_close($link);

	return $events;
}

/*
echo '<h2>March 2016</h2>';
echo draw_calendar(3,2016);

echo '<h2>April 2016</h2>';
echo draw_calendar(4,2016);

echo '<h2>May 2016</h2>';
echo draw_calendar(5,2016);

echo '<h2>June 2016</h2>';
echo draw_calendar(6,2016);
*/

?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/calendar.css">
	</head>

	<body>
		<?php
		if($month==1){
			echo '<a href="?month=12&year='.($year-1).'">&laquo;</a>'.$monthName.' '.$year.'<a href="?month='.($month+1).'">&raquo;</a>';
		} elseif($month==12){
			echo '<a href="?month='.($month-1).'">&laquo;</a>'.$monthName.' '.$year.'<a href="?month=1&year='.($year+1).'">&raquo;</a>';
		} else {
			echo '<a href="?month='.($month-1).'">&laquo;</a>'.$monthName.' '.$year.'<a href="?month='.($month+1).'">&raquo;</a>';
		}
		echo draw_calendar($month,$year);
		?>
	</body>

</html>