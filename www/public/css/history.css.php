<?php header("Content-type: text/html"); include '../php/init.php'; include '../php/css.php'; ?>
header {
	position: fixed;
	top: 13px;
	left: 0px;
	width: 100%;
	height: 57px;
	background-color: #000;
	z-index: -1;
}

header h1 {
	z-index: 2 !important;
	margin: 0;
	padding: 10px 0;
	border: 0;
	text-align: center;
}

#wrapper {
	height: 100%;
	width: 100%;
	z-index: 3;
}

#nmf-logo {
	float: right;
	padding: 7px;
}

h2 {
	font-size: 1.2em;
	padding-left: 13px;
}

#candy th {
	font-weight: bold;
	text-align: left;
	padding: 7px 0px 3px 7px !important;
} #candy th:nth-child(5) { padding: 0px !important; }

#candy td {
	padding: 3px 7px;
	text-shadow: 1px 1px 0 #000, 2px 2px 1px #<?php print hex($_SESSION['color'][0]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>;
}

.square {
	width: 24px;
	height: 24px;
	padding: 0px !important;
}
.confirmed {
 	background-color: #000;
	box-shadow: 1px 1px 7px #<?php print hex($_SESSION['color'][0]); ?>;
 }
.unconfirmed {
	background-color: #333;
	background-image: url("../img/bg-stripe.png");
	background-repeat: both;
	box-shadow: 1px 1px 7px #<?php print hex($_SESSION['color'][0]); ?>;
}
.spacer {
	box-shadow: none !important;
}

#schedule tr td { 
	white-space: nowrap;
	box-shadow: 1px 1px 3px #<?php print hex($_SESSION['color'][0]); ?>;
}

#schedule tr td:nth-child(1) {
	text-align: center;
	font-weight: bold;
	padding: 7px 6px;
}
#schedule tr td:nth-child(3) {
	font-weight: bold;
}
#schedule tr td:nth-child(5) {
	text-align: center;
	padding: 0px !important;
}
#schedule tr td:nth-child(5) a {
	display: block;
	padding: 5px;
}

.block {
	padding: 7px 13px;

	font-size: 2em;
	text-shadow: 1px 1px 0 #000, -1px -1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>;
	color: #<?php print hex($_SESSION['color'][3]); ?>;

	background: #000;
} h1 { color: #fff !important; }

#stage {
	position: fixed;
	top: 10px;
	left: 10px;
	z-index: -1;
}

ul {
	list-style: none;
	margin-left: 0;
	padding-left: 1em;
}

li {
	display: inline-block;
	background: #000;
	padding: 13px 17px;
	margin: 3px 1px;
	font-size: 1.3em;
}